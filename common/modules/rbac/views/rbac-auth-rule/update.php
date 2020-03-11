<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\rbac\models\RbacAuthRule */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Rbac Auth Rule',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Rbac Auth Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="rbac-auth-rule-update">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
