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
    <h3 class="timeline-header">
        <?php echo Yii::t('backend', 'You have new event') ?>
    </h3>

    <div class="timeline-body">
        <dl>
            <dt><?php echo Yii::t('backend', 'Application') ?>:</dt>
            <dd><?php echo $model->getTypeView() ?></dd>

            <dt><?php echo Yii::t('backend', 'Category') ?>:</dt>
            <dd><?php echo $model->getView() ?></dd>



            <dt><?php echo Yii::t('backend', 'Date') ?>:</dt>
            <dd><?php echo Yii::$app->formatter->asDatetime($model->created) ?></dd>
        </dl>
    </div>
</div>