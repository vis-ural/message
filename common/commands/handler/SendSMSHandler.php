<?php

namespace common\commands\handler;

use trntv\tactician\base\BaseHandler;
use yii\swiftmailer\Message;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendSMSHandler extends BaseHandler
{
    /**
     * @param \common\commands\command\SendEmailCommand $command
     * @return bool
     */
    public function handle($command)
    {
        return \Yii::$app->sms->send($command->phone, $command->text);
    }
}
