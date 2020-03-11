<?php

namespace backend\controllers;

use backend\models\search\UserSearch;
use backend\models\UserForm;
use common\models\Marks;
use common\models\User;
use common\models\UserToken;
use common\models\WhatsappGroups;
use common\models\WhatsappPhones;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * UserController implements the CRUD actions for User model.
 */
class WhatsappController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'roles' => [ 'whatsapp']
//                        //'roles' => '?'
//                    ]
//                ]
//            ]

        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {


        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex2()
    {


        \Yii::info(" API POST " . print_r($_POST, true), 'chat');

        return $this->render('index');
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws \yii\base\Exception
     * @throws NotFoundHttpException
     */
    public function actionLogin($id)
    {
        $model = $this->findModel($id);
        $tokenModel = UserToken::create(
            $model->getId(),
            UserToken::TYPE_LOGIN_PASS,
            60
        );

        return $this->redirect(
            Yii::$app->urlManagerFrontend->createAbsoluteUrl(['user/sign-in/login-by-pass', 'token' => $tokenModel->token])
        );
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_group)
    {

        Yii::$app->response->format = Response::FORMAT_JSON;

        $responce = [];
        $gr = WhatsappGroups::findOne($id_group);
        if ($gr) {
            $phone = WhatsappPhones::find()->where(['group_id' => $id_group])->all();
            $phones = [];
            foreach ($phone as $ph) {

                $phones[] = $ph->phone;
            }


            Yii::info("createGroup " . print_r($phones, true), 'chat');


            $responce = $this->createGroup($gr->name, $phones, $gr->desc);
            //   "{
            //\"created\":true,
            //\"message\":null,
            //\"chatId\":\"79164872323-1569490581@g.us\",
            //\"groupInviteLink\":\"https:\\/\\/chat.whatsapp.com\\/EzkdWhgWRKUEDND1QAaGsN\"
            //}"

        }


        $chatid = '';
        if ($responce['created'] == true) {
            $chatid = $responce['chatId'];

            Yii::info("createGroup " . print_r($phones, true), 'chat');
            Yii::info("chatId " . print_r($chatid, true), 'chat');
            $model = WhatsappGroups::findOne($id_group);
            if ($model) {
                $model->group_id = $chatid;
                $model->desc = $responce['groupInviteLink'];
                if (!$model->update()) {

                    json_encode($model->getErrors());
                }
            }

        }

        return json_encode($responce);


    }


    public function actionDelphone($id_group, $phone)

    {

        Yii::$app->response->format = Response::FORMAT_JSON;

        $responce = [];

        $gr = WhatsappGroups::findOne($id_group);
        if ($gr) {

            $responce = $this->removeGroupParticipant($phone, $gr->group_id);


        }
        $model = WhatsappPhones::find()->where(['phone' => $phone])->one();

        if ($model) {

            $model->delete();

            return json_encode($model);

        }

        return json_encode($responce);

    }


    public function actionAdmin($id_group, $phone)
    {

        Yii::$app->response->format = Response::FORMAT_JSON;

        $responce = [];
        $gr = WhatsappGroups::findOne($id_group);
        if ($gr) {
            $responce = $this->promoteGroupParticipant($phone, $gr->group_id);
        }

        $model = WhatsappPhones::find()->where(['phone' => $phone])->one();
        if ($model) {
            $model->desc = 'admin';
            if (!$model->update()) {
                json_encode($model->getErrors());
            }

            return json_encode($model);
        }

        return false;
    }


    public function actionDeladmin($id_group, $phone)
    {

        Yii::$app->response->format = Response::FORMAT_JSON;
        $responce = [];
        $gr = WhatsappGroups::findOne($id_group);
        if ($gr) {
            $responce = $this->demoteGroupParticipant($phone, $gr->group_id);
        }

        $model = WhatsappPhones::find()->where(['phone' => $phone])->one();
        if ($model) {
            $model->desc = '';
            if (!$model->update()) {
                json_encode($model->getErrors());
            }

            return json_encode($model);
        }

        return false;
    }


    public function actionMes($id_group, $mes)
    {

        Yii::$app->response->format = Response::FORMAT_JSON;
        $responce = [];
        $gr = WhatsappGroups::findOne($id_group);
        if ($gr) {
            $responce = $this->sendMessage($gr->group_id, $mes);
        }

        return json_encode(['mes' => $mes]);


    }


    /**
     * Updates an existing User model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new UserForm();
        $model->setModel($this->findModel($id));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Yii::$app->authManager->revokeAll($id);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionViewchat()
    {

        $responce = $this->dialogs();


        return json_encode($responce);

    }


    public function actionLoadfile()
    {


        Yii::info("data ".print_r( $_POST, true), 'chat');

//                [path] => 1/-XUK_YhyUkf97fVKzo0woZSqQ77cT8sa.docx
//                [name] => КП Институт.docx
//                [size] => 1045052
//                [type] => application/vnd.openxmlformats-officedocument.wordprocessingml.document
//                [order] =>
//                [base_url] => http://demo.infomarketstudio.ru/storage/web/source

        $gr = $_POST['LoadfileForm']['gr'];



        $path = Yii::getAlias("@storage")."/web/source";

        $file  = $path."/".$_POST['LoadfileForm']['attachments'][0]['path'];

            Yii::info("data ".print_r( $file, true), 'chat');

        $mgr= WhatsappGroups::find()->where(['group_id'=>$gr])->one();
        $responce = '';
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);

                Yii::info("data ".print_r($data , true), 'chat');

                $pthone = WhatsappPhones::find()->where(['group_id'=>$mgr->id,'phone'=>trim($data[0])])->one();


                if(!$pthone){
                    $res = WhatsappController::addGroupParticipant($data[0],$gr);
                    $model = New WhatsappPhones();
                    $model->phone=$data[0];
                    $model->group_id=$mgr->id;
                    if(!$model->save()){
                        Yii::info("ERROR  ".print_r( $model->getErrors(), true), 'chat');

                    }
                }






            }
            fclose($handle);
        }



        return $this->redirect('/backend/web/whatsapp-groups/view?id='.$mgr->id);

    }
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function createGroup($name, $phones = ['79164872323', '79250111405', '79264218984'], $description, $token = 'qgquag6rv1feds6x', $instance = '67711')
    {

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://api.chat-api.com/instance' . $instance . '/group?token=' . $token)
            ->setData(['groupName' => $name, 'messageText' => $description, 'phones' => $phones])
            ->send();
        if ($response->isOk) {
            Yii::info("data ".print_r( $response->data, true), 'chat');

            return $response->data;
        } else {
            return false;
        }

    }

    public function dialogs($token = 'qgquag6rv1feds6x', $instance = '67711')
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://api.chat-api.com/instance' . $instance . '/dialogs?token=' . $token)
            ->send();
        if ($response->isOk) {
            return $response->data['dialogs'];
        } else {
            return false;
        }
    }

    public function removeGroupParticipant($phone, $group_id = '79164872323-1569427795@g.us', $token = 'qgquag6rv1feds6x', $instance = '67711')
    {

        Yii::info("removeGroupParticipant " . print_r($phone, true), 'chat');

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://api.chat-api.com/instance' . $instance . '/removeGroupParticipant?token=' . $token)
            ->setData(['groupId' => $group_id, 'participantPhone' => [$phone]])
            ->send();
        if ($response->isOk) {
            return $response->data;

        } else {
            return false;
        }
    }


    public static function addGroupParticipant($phone, $group_id = '79164872323-1569427795@g.us', $token = 'qgquag6rv1feds6x', $instance = '67711')
    {

        Yii::info("addGroupParticipant " . print_r($phone, true), 'chat');

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://api.chat-api.com/instance' . $instance . '/addGroupParticipant?token=' . $token)
            ->setData(['groupId' => $group_id, 'participantPhone' => [$phone]])
            ->send();
        if ($response->isOk) {
            return $response->data;

        } else {
            return false;
        }
    }

    public function promoteGroupParticipant($phone, $group_id = '79164872323-1569427795@g.us', $token = 'qgquag6rv1feds6x', $instance = '67711')
    {

        Yii::info("promoteGroupParticipant " . print_r($phone, true), 'chat');

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://api.chat-api.com/instance' . $instance . '/promoteGroupParticipant?token=' . $token)
            ->setData(['groupId' => $group_id, 'participantPhone' => [$phone]])
            ->send();
        if ($response->isOk) {
            return $response->data;

        } else {
            return false;
        }
    }

    public function demoteGroupParticipant($phone, $group_id = '79164872323-1569427795@g.us', $token = 'qgquag6rv1feds6x', $instance = '67711')
    {


        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://api.chat-api.com/instance' . $instance . '/demoteGroupParticipant?token=' . $token)
            ->setData(['groupId' => $group_id, 'participantPhone' => [$phone]])
            ->send();
        if ($response->isOk) {
            Yii::info("demoteGroupParticipant " . print_r($response->data, true), 'chat');
            return $response->data;

        } else {
            return false;
        }
    }

    public function readChat($group_id, $phone, $token = 'qgquag6rv1feds6x', $instance = '67711')
    {


        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://api.chat-api.com/instance' . $instance . '/readChat?token=' . $token)
            ->setData(['chatId' => $group_id, 'phone' => $phone])
            ->send();
        if ($response->isOk) {
            Yii::info("readChat " . print_r($response->data, true), 'chat');
            return $response->data;

        } else {
            return false;
        }
    }

    public function banSettings($token = 'qgquag6rv1feds6x', $instance = '67711')
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://api.chat-api.com/instance' . $instance . '/banSettings?token=' . $token)
            ->send();
        if ($response->isOk) {
            return $response->data;

        } else {
            return false;
        }
    }

    public function sendMessage($group_id, $body, $token = 'qgquag6rv1feds6x', $instance = '67711')
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://api.chat-api.com/instance' . $instance . '/sendMessage?token=' . $token)
            ->setData(['chatId' => $group_id, 'body' => $body])
            ->send();
        if ($response->isOk) {
            return $response->data;

        } else {
            return false;
        }
    }

    public static function messages($group_id, $last = true, $token = 'qgquag6rv1feds6x', $instance = '67711')
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://api.chat-api.com/instance' . $instance . '/messages?token=' . $token)
            ->setData(['chatId' => $group_id, 'last' => $last])
            ->send();


        if ($response->isOk) {
            return $response->data;

        } else {
            return false;
        }
    }


    public static function getStatus($group_id, $token = 't4iop3rbdem8y6gi', $instance = '68526')
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://api.chat-api.com/instance' . $instance . '/messages?token=' . $token)
            ->setData(['chatId' => $group_id, 'last' => $last])
            ->send();


        if ($response->isOk) {
            return $response->data;

        } else {
            return false;
        }
    }


    public function sendLink($group_id, $title_url, $url, $previewBase64, $description = false, $token = 'qgquag6rv1feds6x', $instance = '67711')
    {

        $client = new Client();

        if ($description) {
            $response = $client->createRequest()
                ->setMethod('post')
                ->setUrl('https://api.chat-api.com/instance' . $instance . '/sendMessage?token=' . $token)
                ->setData(['chatId' => $group_id, 'body' => $url, 'previewBase64' => $previewBase64, 'title' => $title_url, 'description' => $description])
                ->send();
        } else {
            $response = $client->createRequest()
                ->setMethod('post')
                ->setUrl('https://api.chat-api.com/instance' . $instance . '/sendMessage?token=' . $token)
                ->setData(['chatId' => $group_id, 'body' => $url, 'previewBase64' => $previewBase64, 'title' => $title_url])
                ->send();
        }

        if ($response->isOk) {
            return $response->data;

        } else {
            return false;
        }
    }

    public function sendFile($group_id, $url, $filename, $caption = false, $token = 'qgquag6rv1feds6x', $instance = '67711')
    {
        $client = new Client();

        if ($caption) {
            $response = $client->createRequest()
                ->setMethod('post')
                ->setUrl('https://api.chat-api.com/instance' . $instance . '/sendMessage?token=' . $token)
                ->setData(['chatId' => $group_id, 'body' => $url, 'filename' => $filename, 'caption' => $caption])
                ->send();
        } else {
            $response = $client->createRequest()
                ->setMethod('post')
                ->setUrl('https://api.chat-api.com/instance' . $instance . '/sendMessage?token=' . $token)
                ->setData(['chatId' => $group_id, 'body' => $url, 'filename' => $filename])
                ->send();
        }

        if ($response->isOk) {
            return $response->data;

        } else {
            return false;
        }
    }

}
