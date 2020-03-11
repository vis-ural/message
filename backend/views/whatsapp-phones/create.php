<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WhatsappPhones */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Whatsapp Phones',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Whatsapp Phones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whatsapp-phones-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'gr' => $gr,
    ]) ?>

</div>
