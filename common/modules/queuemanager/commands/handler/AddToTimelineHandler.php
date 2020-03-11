<?php

namespace common\modules\queuemanager\commands\handler;

use common\commands\command\AddToTimelineCommand;
use common\modules\system\models\TimelineEvent;
use trntv\tactician\base\BaseHandler;
use Yii;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class AddToTimelineHandler extends BaseHandler
{
    /**
     * @param AddToTimelineCommand $command
     * @return bool
     */
    public function handle($command)
    {
        $model = new \common\modules\system\models\TimelineEvent();
        $model->application = Yii::$app->id;
        $model->category = $command->category;
        $model->event = $command->event;
        $model->data = json_encode($command->data, JSON_UNESCAPED_UNICODE);
        return $model->save(false);
    }
}
