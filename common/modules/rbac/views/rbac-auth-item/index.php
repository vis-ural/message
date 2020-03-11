<?php

use common\grid\EnumColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\rbac\Item;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Rbac Auth Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-auth-item-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create Rbac Auth Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'class' => EnumColumn::class,
                'attribute' => 'type',
                'enum' => [
                        Item::TYPE_ROLE => 'role',
                        Item::TYPE_PERMISSION => 'permission',
                ]
            ],
            [
                'class'     => \yii\grid\DataColumn::className(),
                'label'     => Yii::t('db_rbac', 'Разрешенные доступы'),
                'format'    => ['html'],
                'value'     => function($data) { return implode('<br>',array_keys(\yii\helpers\ArrayHelper::map(Yii::$app->authManager->getPermissionsByRole($data->name), 'description', 'description')));}
            ],
            'description:ntext',
            'rule_name',
            'data',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
