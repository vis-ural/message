<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WhatsappGroups */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Whatsapp Groups',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Whatsapp Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whatsapp-groups-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
