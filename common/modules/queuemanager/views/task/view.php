<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model direct\modules\direct\models\Task */
?>
<div class="task-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'status',
            'job_name',
            'command',
            'pid',
            'created',
            'updated',
            'queue',
            'exchange',
            'tag',
        ],
    ]) ?>

</div>
