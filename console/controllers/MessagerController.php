<?php
namespace console\controllers;


use common\modules\queuemanager\commands\command\AddLeadCommand;

use common\modules\queuemanager\commands\command\SendEmailCommand;
use common\modules\queuemanager\commands\command\SendSlackCommand;
use common\modules\queuemanager\commands\command\SendSMSCommand;
use common\modules\queuemanager\commands\command\SendSocketCommand;

use common\modules\integration\components\AmocrmHelper;
use common\components\Process;

use common\modules\queuemanager\models\MessagePlan;
use common\modules\crm\models\Contact;
use common\modules\crm\models\Deal;
use common\modules\crm\models\DealContact;
use common\modules\integration\components\DialogflowHelper;
use common\modules\queuemanager\models\Task;
use devmustafa\amqp\PhpAmqpLib\Connection\AMQPConnection;




use Yii;
use yii\console\Controller;

use yii\helpers\Console;



set_time_limit(0);
error_reporting(E_ALL);


class MessagerController extends Controller
{

    /*
     * Статусы сообщений
     */
    const ACTIVE_STATUS = 1;
    const COMPLIT_STATUS = 2;
    const ERROR_STATUS = 3;
    const REPLASE_STATUS = 4;

    /*
     * Максимальное количество процессов
     */
    public $maxProcesses = 2;


    protected $currentJobs = [];


    public function actionSend($type, $title, $body, $email = 'info@infomarketstudio.ru', $order_id = 0, $phone = '',$client='backend')
    {

        $dataArray = [
            'type' => $type,
            'title' => $title,
            'body' => $body,
            'phone' => $phone,
            'order_id' => $order_id,
            'email' => $email,
            'client' => $client,
            'data_send' => date("Y-m-d"),
        ];
        $exchange = 'exchange';
        $queue = 'newinfomarket';

        $this->stdout("Starting ...SendQueue \n", Console::FG_YELLOW);
        $message = serialize($dataArray);
        Yii::$app->amqp->declareExchange($exchange, $type = 'direct', $passive = false, $durable = true, $auto_delete = false);


        Yii::$app->amqp->declareQueue($queue, $passive = false, $durable = true, $exclusive = false, $auto_delete = false);
        Yii::$app->amqp->bindQueueExchanger($queue, $exchange, $routingKey = $queue);
        Yii::$app->amqp->publish_message($message, $exchange, $routingKey = $queue, $content_type = 'applications/json', $app_id = isset($_GET['alias']) ? $_GET['alias'] : Yii::$app->name);
    }


    public function actionRun($exchange = 'direct', $queue = 'messages', $consumer_tag = '')
    {

        $queue = getenv('QUEUE');
        $this->stdout("Starting ... server messages \n", Console::FG_YELLOW);
        $conn = new AMQPConnection(getenv('HOST_RABBITMQ'), getenv('PORT_RABBITMQ'), getenv('USER_RABBITMQ'), getenv('PASSWORD_RABBITMQ'), getenv('VHOST_RABBITMQ'));

        $ch = $conn->channel();
        $ch->exchange_declare($exchange, 'direct', false, true, false);
        $ch->queue_bind($queue, $exchange);
        $process_message = function ($msg) {

            $body = unserialize($msg->body);
            while (count($this->currentJobs) >= $this->maxProcesses) {
                echo "Maximum children  allowed, current , waiting...\r\n" . PHP_EOL;
                sleep(1);
                foreach ($this->currentJobs as $k => $currentJob) {
                    $process = new Process();
                    $process->setPid($currentJob['pid']);
                    if (!$process->status()) {

                        unset($this->currentJobs[$k]);


                    }

                }
            }



            Yii::info('Message server body   '.print_r($body,true),'chat');


            if (isset($body['type']) && isset($body['user']) && isset($body['message']) && !is_array($body['message'])) {

                $key = md5($body['type'] . $body['user'] . $body['message'] . time());

//                if (is_array($body['email'])) {
//                    $email = implode(",", $body['email']);
//                } else {
//                    $email = $body['email'];
//                }


                $command = false;
                switch ($body['type']) {
                    case MessagePlan::TYPE_EMAL:
                        $command = "php " . Yii::$app->basePath . "/yii  messager/ressive-email '{$key}' '{$body['title']}' '{$body['message']}' '{$email}' ";
                        break;
                    case MessagePlan::TYPE_SLACK:
                        $command = "php " . Yii::$app->basePath . "/yii  messager/ressive-slack '{$key}' '{$body['message']}' '{$body['chenel']}'";
                        break;
                    case MessagePlan::TYPE_SMS:
                        $command = "php " . Yii::$app->basePath . "/yii  messager/ressive-sms '{$key}.' '{$body['phone']}' '{$body['message']}'";
                        break;
                    case MessagePlan::TYPE_SOCKET:
                        $command = "php " . Yii::$app->basePath . "/yii  messager/ressive-socket '{$key}.' '{$body['message']}' '{$body['user']}'";
                        break;
                    case MessagePlan::TYPE_ADD_LEAD:

                        $command = "php " . Yii::$app->basePath . "/yii  messager/new-lead '{$key}.' '{$body['message']}' '{$body['cookie']}' '{$body['phone']} ' '{$body['url']} ' '{$body['miniland_id']} ' '{$body['title']} '";

                        break;
                    case MessagePlan::TYPE_ADD_LEAD_AMO:
                        $command = "php " . Yii::$app->basePath . "/yii  messager/add-lead-amo '{$key}.' '{$body['message']}' '{$body['cookie']} '";
                        break;
                }

                $processId = 0;
                if (isset($body['data_send']) && $command && $body['data_send'] == date("Y-m-d")) {
                    $process = new Process($command);
                    $processId = $process->getPid();
                    $this->currentJobs[]['pid'] = $processId;
                    $this->stdout("Отправлено сообщение  pid = " . $processId . " type: " . $body['type'] . " текст: " . $body['message'] . " key: " . $key . "\r\n", Console::FG_GREEN);
                } else {

                    $this->stdout("Подготовлено сообщение  pid = " . $processId . " type: " . $body['type'] . " текст: " . $body['message'] . " key: " . $key . "\r\n", Console::FG_GREEN);
                }

                if (!Yii::$app->db->getIsActive()) {
                    Yii::$app->db->open();
                }


                try {
                    $model = new Task();
                    $model->name = $body['type'];
                    $model->order_id = isset($body['order_id']) ? $body['order_id'] : null;
                    $model->command = $command ? $command : 'no command';
                    $model->created = date("Y-m-d H:s:i");
                    $model->updated = date("Y-m-d H:s:i");
                    $model->pid = $processId ? $processId : 0;
                    $model->job_name = json_encode($body);

                    $model->status = $command && $body['data_send'] == date("Y-m-d") ? self::COMPLIT_STATUS : self::ACTIVE_STATUS;
                    $model->key = $key;
                    $model->data_send = $body['data_send'];
                    if (!$model->save()) {
                        print_r($model->getErrors());
                        print_r('Task');
                        Yii::error(print_r($model->getErrors(), true), 'console');
                    }
                } catch (\Exception $e) {
                    Yii::error(print_r($model->getErrors(), true), 'console');
                    print_r('Task');
                    throw $e;

                }


            }

//            // acknowledge message
            $channel = $msg->delivery_info['channel'];
            $channel->basic_ack($msg->delivery_info['delivery_tag']);
        };
        $ch->basic_consume($queue, $consumer_tag, false, false, false, false, $process_message);

        $shutdown = function ($ch, $conn) {
            $ch->close();
            $conn->close();
        };
        register_shutdown_function($shutdown, $ch, $conn);
        while (count($ch->callbacks)) {
            $ch->wait();
        }
    }

    public function actionGetKeysFromQueue($task)
    {
        echo "Получено новое задание из очереди \n";
        $e = new ManagerController('manager', 'mapmanager');
        $e->actionSetDefaultCros($task);
        echo "Stoping ... \n";

    }

    public function actionRessiveSms($key, $phone, $body)
    {


        Yii::$app->commandBus->handle(new SendSMSCommand([
            'text' => $body,
            'phone' => $phone

        ]));


        $model = Task::find()->where(['key' => $key])->one();
        if ($model) {
            $model->status = self::COMPLIT_STATUS;
            $model->updated = date("Y-m-d H:i:s");
            if (!$model->update()) {
                print_r($model->getErrors());
            }
        }


    }

    public function actionRessiveSlack($key, $txt, $chenel = 'general')
    {


        Yii::$app->commandBus->handle(new SendSlackCommand([
            'text' => $txt,
            'chenal' => $chenel

        ]));


        $model = Task::find()->where(['key' => $key])->one();
        if ($model) {
            $model->status = self::COMPLIT_STATUS;
            $model->updated = date("Y-m-d H:i:s");
            if (!$model->update()) {
                print_r($model->getErrors());
            }
        }


    }

    public function actionRessiveEmail($key, $subject, $body, $to = 'info@infomarketstudio.ru', $view = '@common/views/mail/sendmail_client')
    {
        $model = Task::find()->where(['key' => $key])->one();

        $tmp = explode(",", $to);
        if (count($tmp) > 1) {
            $to = $tmp;
        }

        $sentSuccess = Yii::$app->commandBus->handle(new SendEmailCommand([
            'view' => $view,
            'params' => ['body' => $body],
            'subject' => $subject,
            'to' => $to,
            'order_id' => $model->order_id
        ]));


        if ($model) {
            $model->status = self::COMPLIT_STATUS;
            $model->updated = date("Y-m-d H:i:s");
            if (!$model->update()) {
                print_r($model->getErrors());
            }
        }


    }


    public function actionRessiveSocket($key, $message, $user)
    {
        $model =  Task::find()->where(['key' => $key])->one();

        $localsocket ="tcp://".env('FRONTEND_DOMAIN').":1236";

        $instance = stream_socket_client($localsocket, $errno, $errstr);//соединямся с вебсокет-сервером
        fwrite($instance, json_encode(['message' => $message, 'user' => $user]) . "\n");//отправляем сообщение

       // Yii::info('handle socket errno: '.print_r($errno,true),'chat');
        //Yii::info('handle socket errstr: '.print_r($errstr,true),'chat');



        if ($model) {
            $model->status = self::COMPLIT_STATUS;
            $model->updated = date("Y-m-d H:i:s");
            if (!$model->update()) {
                print_r($model->getErrors());
            }
        }


    }

    public function actionNewLead($key, $body, $cookie,$phone,$url,$miniland_id,$title)

    {
        $crmclient = Contact::find()->where(['phone'=>$phone])->one();
        if ($crmclient) {
            if ($crmclient->cookie != $cookie) {
                $crmclient->cookie = $cookie;
                if (!$crmclient->update()) {

                    \Yii::info('DB ERROR  Contact update '.print_r($crmclient->getErrors(),true),'chat');
                }
            }

            $dealcontact = DealContact::find()->rightJoin('crm_deal','crm_deal.id = crm_deal_contact.deals_id')
                ->where(['crm_deal_contact.contact_id'=>$crmclient->id,'crm_deal.status'=>1])->orderBy(['crm_deal.created_at'=>SORT_DESC])->one();

            if ($dealcontact) {
                $deals = Deal::findOne($dealcontact->deals_id);

            } else {
                $model = new Deal();
                $model->title =$title;
                $model->amount = 0;
                $model->column_id = 379;
                $model->board_id = 1;
                $model->created_by = 1;
                $model->updated_by = 1;
                $model->description ='Новый лид с минилендинга'.$miniland_id;;
                if(!$model->save()){

                    \Yii::info('Db ERROR create deal  '.print_r($model->getErrors(),true),'chat');
                } else {
                    $newdealcontact = new DealContact();

                    $newdealcontact->deals_id = $model->id;
                    $newdealcontact->contact_id = $crmclient->id;
                    if(!$newdealcontact->save()){
                        \Yii::info('Db ERROR create newdealcontact  '.print_r($newdealcontact->getErrors(),true),'chat');
                    }
                }


            }
            

        } else {
            $contact = new Contact();
            $contact->cookie = $cookie;
            $contact->phone = $phone;
            $contact->notes = 'Клиент создан по переходу с лендинга';
            if (!$contact->save()) {
                \Yii::info('Db ERROR create contact  '.print_r($contact->getErrors(),true),'chat');
            } else {
                $model = new Deal();
                $model->title =$title;
                $model->amount = 0;
                $model->column_id = 379;
                $model->board_id = 1;
                $model->created_by = 1;
                $model->updated_by = 1;
                $model->description ='Новый лид с минилендинга'.$miniland_id;;
                if(!$model->save()){
                    \Yii::info('Db ERROR create deal landing  '.print_r($model->getErrors(),true),'chat');
                } else {
                    $newdealcontact = new DealContact();
                    $newdealcontact->deals_id = $model->id;
                    $newdealcontact->contact_id = $contact->id;
                    if(!$newdealcontact->save()){
                        \Yii::info('Db ERROR create newdealcontact  '.print_r($newdealcontact->getErrors(),true),'chat');
                    }
                }
            }


        }


        $model =  Task::find()->where(['key' => $key])->one();
        if ($model) {
            $model->status = self::COMPLIT_STATUS;
            $model->updated = date("Y-m-d H:i:s");
            if (!$model->update()) {
                \Yii::info('Db ERROR update task  '.print_r($model->getErrors(),true),'chat');
            }
        }
    }

    public function actionAddLeadAmo($key, $body, $cookie)
    {


        $model = new Deal();
        $model->title ='add_lead';
        $model->amount =0;
        $model->column_id =379;
        $model->board_id =1;
        $model->created_by =1;
        $model->updated_by =1;
        $model->description ='dasdasdasdwadwadwdwdw';
        if(!$model->save()){
            print_r($model->getErrors());
        }


    }


    public function actionTest()
    {


        $sentSuccess = Yii::$app->commandBus->handle(new AddLeadCommand([

            'type' => 'new_lead',
            'title' => '',
            'body' => '',
            'phone' => '',
            'email' => '',
            'order_id' => '',
            'data_send' => date("Y-m-d")

        ]));


//        $event = new ActionsEvent();
//        $event->params = $_SERVER;
//        $this->attachBehavior('EventsBehavior', new EventsBehavior());
//        $this->trigger(ActionsEvent::ADD_LEAD, $event);


    }

    public function actionTest1()
    {


        \Yii::$app->commandBus->handle(new AddLeadCommand([
            'title' => 'Новый лид',
            'body' => '',
            'phone' => '',
            'email' => '',
            'order_id' => '',
            'cookie' => 'sasasas',
            'data_send' => date("Y-m-d")
        ]));
        \Yii::info('Add Trigger ','chat');

    }

    public function actionTest2(){

        //$cookie = AmocrmHelper::AuthorizeAmo();

       // $amocrm = AmocrmHelper::AddLead();
//        try {
//            // Получение экземпляра модели для работы с аккаунтом
//            $amo = Yii::$app->amocrm->getClient();
//            $account = $amo->account;
//
//            // или прямо
//            $account = Yii::$app->amocrm->account;
//
//            // Вывод информации об аккаунте
//            print_r($account->apiCurrent());
//
//            // Получение экземпляра модели для работы с контактами
//            $contact = $amo->contact;
//
//            // Заполнение полей модели
//            $contact['name'] = 'ФИО';
//            $contact['request_id'] = '123456789';
//            $contact['date_create'] = '-2 DAYS';
//            $contact['responsible_user_id'] = $amo->fields['ResponsibleUserId'];
//            $contact['company_name'] = 'ООО Тестовая компания';
//            $contact['tags'] = ['тест1', 'тест2'];
//            $contact->addCustomField(448, [
//                ['+79261112233', 'WORK'],
//            ]);
//
//            // Добавление нового контакта и получение его ID
//            print_r($contact->apiAdd());
//
//        } catch (\AmoCRM\Exception $e) {
//            printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
//        }

        try {
           // $amo = new \AmoCRM\Client(getenv('DOMAIN'), getenv('LOGIN'), getenv('HASH'));
            // Список сделок
            // Метод для получения списка сделок с возможностью фильтрации и постраничной выборки.
            // Ограничение по возвращаемым на одной странице (offset) данным - 500 сделок.
            print_r(Yii::$app->amocrm->lead->apiList([
                'query' => 'Илья',
            ]));
            // С доп. фильтрацией по (изменено с)
            print_r(Yii::$app->amocrm->lead->apiList([
                'query' => 'Илья',
                'limit_rows' => 1,
            ], '-100 DAYS'));
            // Добавление и обновление сделок
            // Метод позволяет добавлять сделки по одному или пакетно,
            // а также обновлять данные по уже существующим сделкам.
            $lead = Yii::$app->amocrm->lead;
            $lead->debug(true); // Режим отладки
            $lead['name'] = 'Тестовая сделка';
            $lead['date_create'] = '-2 DAYS';
            $lead['status_id'] = 10525225;
            $lead['price'] = 3000;
            $lead['responsible_user_id'] = 697344;
            $lead['tags'] = ['тест1', 'тест2'];
            $lead['visitor_uid'] = '12345678-52d2-44c2-9e16-ba0052d9f6d6';
            $lead->addCustomField(167379, [
                [388733, 'Стартап'],
            ]);
            $lead->addCustomField(167381, [
                [388743, '6 месяцев'],
            ]);
            $lead->addCustomField(167411, 'Спецпроект');
            $id = $lead->apiAdd();
            print_r($id);
            // Или массовое добавление:
            $lead1 = clone $lead;
            $lead1['name'] = 'Тестовая сделка 1';
            $lead2 = clone $lead;
            $lead2['name'] = 'Тестовая сделка 2';
            $ids = Yii::$app->amocrm->lead->apiAdd([$lead1, $lead2]);
            print_r($ids);
            // Обновление сделок
            $lead = Yii::$app->amocrm->lead;
            $lead->debug(true); // Режим отладки
            $lead['name'] = 'Тестовая сделка 3';
            $lead->apiUpdate((int)$id, 'now');
        } catch (\AmoCRM\Exception $e) {
            printf('Error (%d): %s', $e->getCode(), $e->getMessage());
        }


    }


    public function actionAmotest() {


        $result =  AmocrmHelper::findLeads(false,'Тестов');

        print_r($result);
    }

    public function actionTestt() {
        $arr=false;
        $question = 'Вопрос';
        $arr [] = [
            "type"=> 0,
            "lang"=> "ru",
            "speech"=> 'Ответ 1'
        ];
        $arr [] = [
            "type"=> 0,
            "lang"=> "ru",
            "speech"=> 'Ответ 2'
        ];
        $arr [] = [
            "type"=> 0,
            "lang"=> "ru",
            "speech"=> 'Ответ 3'
        ];
        $arr [] = [
            "type"=> 0,
            "lang"=> "ru",
            "speech"=> 'Ответ 4'
        ];
        DialogflowHelper::dialogFlowAddIntents($question, $arr);
    }
}