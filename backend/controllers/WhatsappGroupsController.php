<?php

namespace backend\controllers;

use backend\models\LoadfileForm;
use common\models\WhatsappPhonesSearch;
use Yii;
use common\models\WhatsappGroups;
use common\models\WhatsappGroupsSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WhatsappGroupsController implements the CRUD actions for WhatsappGroups model.
 */
class WhatsappGroupsController extends Controller
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
     * Lists all WhatsappGroups models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WhatsappGroupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WhatsappGroups model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {



        $searchModelPhones = WhatsappPhonesSearch::find()->where(['group_id'=>$id]);
        $dataProviderPhones = new ActiveDataProvider([
            'query' => $searchModelPhones,
        ]);


        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelFile' => new LoadfileForm(),
            'searchModelPhones' => $searchModelPhones,
            'dataProviderPhones' =>$dataProviderPhones,


        ]);
    }

    /**
     * Creates a new WhatsappGroups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WhatsappGroups();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing WhatsappGroups model.
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
     * Deletes an existing WhatsappGroups model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = WhatsappGroups::findOne($id);


        $this->findModel($id)->delete();




        return $this->redirect(['index']);
    }

    /**
     * Finds the WhatsappGroups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return WhatsappGroups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WhatsappGroups::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
