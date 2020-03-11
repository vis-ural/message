<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => \common\grid\EnumColumn::className(),
        'attribute' => 'name',
        'enum' => \common\modules\queuemanager\models\TaskSearch::getTypes(),
        'filter' => \common\modules\queuemanager\models\TaskSearch::getTypes()
    ],
    [
        'class' => \common\grid\EnumColumn::className(),
        'attribute' => 'status',
        'enum' =>\common\modules\queuemanager\models\TaskSearch::getStatuses(),
        'filter' => \common\modules\queuemanager\models\TaskSearch::getStatuses()
    ],

//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'job_name',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'command',
        'value'=>function($data){

            return $data->command;
        },
        'options'=>[
            'style'=>'width:450px;'
        ]
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'pid',
        'options'=>[
            'style'=>'width:50px;'
        ]
    ],
        'created:datetime',
        'data_send:datetime',
        'updated:datetime',

//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'queue',
//     ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'exchange',
//     ],
//     [
//         'class'=>'\kartik\grid\DataColumn',
//         'attribute'=>'tag',
//     ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   