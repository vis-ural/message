<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Добавить сообщение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [

                'attribute' => 'category',
                'format'=>'html',
                'value'=>function($data){
                    $cat = [];
                    foreach (explode(',',$data->category) as $item){
                        $modelCat=\common\models\Category::findOne(trim($item));
                        if($modelCat){
                            $cat[]=$modelCat->title;
                        }
                    }
                    return implode('<br>',$cat);
                }
            ],

            'title',
            'text:ntext',


            [
                'class' => \common\grid\EnumColumn::class,
                'attribute' => 'status',
                'enum' => \common\models\Message::statuses(),
                'filter' => \common\models\Message::statuses()
            ],
              'created_at:date',
              'counter',
            // 'logged_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
