<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @var $model common\models\TimelineEvent
 */
?>
<div class="timeline-item">
    <span class="time">
        <i class="fa fa-clock-o"></i>
        <?php echo Yii::$app->formatter->asRelativeTime($model->created) ?>
    </span>

    <h3 class="timeline-header  ">
       <span class="label label-success">SLACK</span>
    </h3>

    <div class="timeline-body ">
        <?php echo Yii::t('backend', 'New user ({identity}) was registered at {created_at}', [
            'identity' => $model->getBody(),
            'created_at' => Yii::$app->formatter->asDatetime($model->created)
        ]) ?>
    </div>

    <div class="timeline-footer">

    </div>
</div>