<?php

namespace backend\controllers;

use common\models\WhatsappGroups;
use Yii;
use common\models\WhatsappPhones;
use common\models\WhatsappPhonesSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WhatsappPhonesController implements the CRUD actions for WhatsappPhones model.
 */
class WhatsappPhonesController extends Controller
{

    /** @inheritdoc */
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
     * Lists all WhatsappPhones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WhatsappPhonesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WhatsappPhones model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WhatsappPhones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($gr)
    {
        $model = new WhatsappPhones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {



            $Group = WhatsappGroups::findOne($gr);
            if($Group &&  $Group->group_id){
               $res = WhatsappController::addGroupParticipant($model->phone,$Group->group_id);
            }


            return $this->redirect(['/whatsapp-groups/view', 'id' => $gr]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'gr' => $gr,
            ]);
        }
    }

    /**
     * Updates an existing WhatsappPhones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing WhatsappPhones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WhatsappPhones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return WhatsappPhones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WhatsappPhones::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
