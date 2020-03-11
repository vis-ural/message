<?php

namespace common\commands\handler;

use trntv\tactician\base\BaseHandler;
use yii\swiftmailer\Message;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendSlackHandler extends BaseHandler
{
    /**
     * @param \common\commands\command\SendEmailCommand $command
     * @return bool
     */
    public function handle($command)
    {

        return  \Yii::$app->slack->send($command->text,$command->chenal);
    }
}
