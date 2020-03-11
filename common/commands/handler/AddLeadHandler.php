<?php

namespace common\commands\handler;

use trntv\tactician\base\BaseHandler;
use yii\helpers\Console;
use yii\helpers\VarDumper;
use yii\swiftmailer\Message;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class AddLeadHandler extends BaseHandler
{
    /**
     * @param \common\commands\command\SendEmailCommand $command
     * @return bool
     */
    public function handle($command)
    {

      //  VarDumper::dump($command,10,true); die;

        $dataArray = [
            'type' => 'new_lead',
            'title'=>$command->title,
            'body'=>$command->body,
            'phone'=>$command->phone,
            'email'=>'',
            'url'=>$command->myurl,
            'cookie'=>$command->cookie,
            'data_send'=>$command->data_send,
            'miniland_id'=>$command->miniland_id,
            'chenel'=>$command->chenel,
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
