<?php

namespace common\modules\queuemanager\commands\command;


use backend\modules\benbot\Bot;
use backend\modules\benbot\components\facebook\FbBotApp;
use backend\modules\benbot\components\facebook\Menu\LocalizedMenu;
use backend\modules\benbot\components\facebook\Menu\MenuItem;
use backend\modules\benbot\components\facebook\Messages\ImageMessage;
use backend\modules\benbot\components\facebook\Messages\MessageButton;
use backend\modules\benbot\components\facebook\Messages\StructuredMessage;
use backend\modules\benbot\components\Helper;
use backend\modules\benbot\components\viber\Api\Keyboard;
use backend\modules\benbot\components\viber\Api\Message\Picture;
use backend\modules\benbot\components\viber\Api\Message\Text;
use backend\modules\benbot\components\viber\Api\Sender;
use backend\modules\benbot\Request;
use Codeception\Module\Cli;
use common\models\Article;
use common\models\BotUser;
use common\models\Clients;
use Yii;
use yii\base\BaseObject;
use common\models\TimelineEvent;
use trntv\bus\interfaces\SelfHandlingCommand;
use yii\bootstrap\Button;
use yii\helpers\Console;
use yii\helpers\VarDumper;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendQueueCommand extends BaseObject implements SelfHandlingCommand
{
    /**
     * @var string
     */
    public $category;
    /**
     * @var string
     */
    public $event;
    /**
     * @var mixed
     */
    public $data;

    public $user_id;
    public $phone;

    public $platform;
    public $user_platform_id;
    public $user_platform_id_viber;

    public $title;
    public $body;
    public $type;
    public $data_send;
    /**
     * @param AddToTimelineCommand $command
     * @return bool
     */
    public function handle($command)
    {

           $dataArray = [
            'type' => $command->type,
            'title' => $command->title?$command->title:'title',
            'body' => $command->body?$command->body:'body',
            'phone' => $command->phone,
            'user_id' => $command->user_id,
            'data_send' =>$command->data_send,
             'data'=> json_encode($command->data, JSON_UNESCAPED_UNICODE)

        ];

        \Yii::info("Starting ...SendQueue \n" . print_r($dataArray, true), 'infostudiobot');
        \Yii::$app->sms->send('79250111405', 'Публикация статьи ');

        $exchange = 'exchange';
        $queue = getenv('QUEUE');


        $message = serialize($dataArray);
        Yii::$app->amqp->declareExchange($exchange, $type = 'direct', $passive = false, $durable = true, $auto_delete = false);


        Yii::$app->amqp->declareQueue($queue, $passive = false, $durable = true, $exclusive = false, $auto_delete = false);
        Yii::$app->amqp->bindQueueExchanger($queue, $exchange, $routingKey = $queue);
        Yii::$app->amqp->publish_message($message, $exchange, $routingKey = $queue, $content_type = 'applications/json', $app_id = isset($_GET['alias'])?$_GET['alias']:Yii::$app->name);

        \Yii::info("Send  ...amqp  \n" , 'infostudiobot');


    }
}
