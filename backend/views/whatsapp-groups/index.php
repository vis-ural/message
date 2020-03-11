<?php

use common\models\WhatsappPhones;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WhatsappGroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Whatsapp Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whatsapp-groups-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Whatsapp Groups',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                    'header'=>'участников',
                    'value'=>function($data){
                            return WhatsappPhones::find()->where(['group_id'=>$data->id])->count();
                    },
            ],
            'desc:ntext',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
