<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WhatsappPhones */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Whatsapp Phones',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Whatsapp Phones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="whatsapp-phones-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
