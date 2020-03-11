<?php

use common\components\Html;


/* @var $this yii\web\View */
/* @var $model direct\modules\direct\models\Task */

?>
<div class="task-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
