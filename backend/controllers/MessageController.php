<?php

namespace backend\controllers;

use common\components\Helper;
use common\models\Category;
use Yii;
use common\models\Message;
use common\models\MessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends Controller
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
        ];
    }

    /**
     * Lists all Message models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Message model.
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
     * Creates a new Message model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $in = Yii::$app->request->post();
        $model = new Message();
        if(isset($in['Message']) &&  ($in['Message']['category']!='')){
            $in['Message']['category'] = implode(", ",$in['Message']['category']);

        }
        if ($model->load($in) && $model->save()) {
            $cat = [];
            foreach (explode(',',$model->category) as $item){
                $modelCat=Category::findOne(trim($item));
                if($modelCat){
                    $cat[]=$modelCat->title;
                }
            }
            Helper::sendSocket($model->title."<br><b>Сообщение: </b>".$model->text,implode(", ",$cat),$model->id);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $in = Yii::$app->request->post();
        $model = $this->findModel($id);
        if(isset($in['Message']) &&  ($in['Message']['category']!='')){
            $in['Message']['category'] = implode(", ",$in['Message']['category']);

        }
        if ($model->load($in) && $model->save()) {
            $cat = [];
            foreach (explode(',',$model->category) as $item){
                $modelCat=Category::findOne(trim($item));
                if($modelCat){
                    $cat[]=$modelCat->title;
                }
            }
            Helper::sendSocket($model->title."<br><b>Сообщение: </b>".$model->text,implode(", ",$cat),$model->id);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Message model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
