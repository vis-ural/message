<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\rbac\models\RbacAuthItem */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Rbac Auth Item',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Rbac Auth Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="rbac-auth-item-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
        'role_permit' => $role_permit,
        'permissions' => $permissions,
    ]) ?>

</div>
