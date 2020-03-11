<?php

namespace common\commands\handler;

use trntv\tactician\base\BaseHandler;
use yii\base\Exception;
use yii\swiftmailer\Message;
use yii;
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendSocketHandler extends BaseHandler
{
    /**
     * @param \common\commands\command\SendEmailCommand $command
     * @return bool
     */
    public function handle($command)
    {

        try {

            Yii::info('handle socket send: '.print_r($command,true),'chat');



            $dataArray = [
                'type' => $command->type,
                'message' => $command->message,
                'user' => $command->user,
                'data_send' => date("Y-m-d")

            ];
            $exchange = 'exchange';
            $queue = 'newinfomarket';


            $message = serialize($dataArray);
            Yii::$app->amqp->declareExchange($exchange, $type = 'direct', $passive = false, $durable = true, $auto_delete = false);


            Yii::$app->amqp->declareQueue($queue, $passive = false, $durable = true, $exclusive = false, $auto_delete = false);
            Yii::$app->amqp->bindQueueExchanger($queue, $exchange, $routingKey = $queue);
            Yii::$app->amqp->publish_message($message, $exchange, $routingKey = $queue, $content_type = 'applications/json', $app_id = isset($_GET['alias']) ? $_GET['alias'] : Yii::$app->name);





        } catch (Exception $e) {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";

            Yii::error('Выброшено исключение: '.print_r($e->getMessage(),true),'chat');

        }finally{
           // Yii::error('handle socket send end ','chat');
        }

        return true;
    }
}
