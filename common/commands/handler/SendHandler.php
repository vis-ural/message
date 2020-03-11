<?php

namespace common\commands\handler;

use trntv\tactician\base\BaseHandler;
use yii\helpers\Console;
use yii\helpers\VarDumper;
use yii\swiftmailer\Message;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendHandler extends BaseHandler
{
    /**
     * @param \common\commands\command\SendEmailCommand $command
     * @return bool
     */
    public function handle($command)
    {

      //  VarDumper::dump($command,10,true); die;

        $dataArray = [
            'type' =>$command->type,
            'title'=>$command->title,
            'body'=>$command->body,
            'phone'=>$command->phone,
            'email'=>$command->email,
            'order_id'=>$command->order_id,
            'data_send'=>$command->data_send,
            'chenel'=>$command->chenel,
            'cookie'=>$command->cookie,
            'client'=>$command->client
        ];
        $exchange = 'exchange';
        $queue =getenv('QUEUE');


        $message = serialize($dataArray);
        \Yii::$app->amqp->declareExchange($exchange, $type = 'direct', $passive = false, $durable = true, $auto_delete = false);
        \Yii::$app->amqp->declareQueue($queue, $passive = false, $durable = true, $exclusive = false, $auto_delete = false);
        \Yii::$app->amqp->bindQueueExchanger($queue, $exchange, $routingKey = $queue);
        \Yii::$app->amqp->publish_message($message, $exchange, $routingKey = $queue, $content_type = 'applications/json', $app_id = isset($_GET['alias'])?$_GET['alias']:\Yii::$app->name);



        return true;
    }
}
