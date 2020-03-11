<?php

namespace common\commands\handler;

use trntv\tactician\base\BaseHandler;
use yii\helpers\VarDumper;
use yii\swiftmailer\Message;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendEmailHandler extends BaseHandler
{
    /**
     * @param \common\commands\command\SendEmailCommand $command
     * @return bool
     */
    public function handle($command)
    {
       // VarDumper::dump($command,10,true); die;
        $message = \Yii::$app->mailer->compose();

        $message->setHtmlBody(\Yii::$app->controller->renderPartial($command->view,array_merge($command->params,[
            'message'=>$message,
            'order_id'=>$command->order_id,
        ])));
        $message->setFrom($command->from);
        $message->setTo($command->to ?: \Yii::$app->params['robotEmail']);
        $message->setSubject($command->subject);
        $message->attach(
            \Yii::getAlias('@common').'/views/mail/infomarket_kp_chatbot.pdf',
            ['contentType'=>'application/pdf']
        );
        return $message->send();
    }
}
