<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 * @var $model common\models\TimelineEvent
 */
?>
<div class="timeline-item  ">
    <span class="time">
        <i class="fa fa-clock-o"></i>
        <?php echo Yii::$app->formatter->asDatetime($model->created) ?>
    </span>

    <h2 class="timeline-header text">
        <span class="label label-primary">SOCKET</span>
    </h2>

    <div class="timeline-body">
        <?php echo Yii::t('backend', '({identity}) создано  {created}', [
            'identity' => $model->getBody(),
            'created' => Yii::$app->formatter->asDatetime($model->created)
        ]) ?>
    </div>

    <div class="timeline-footer">

    </div>
</div>