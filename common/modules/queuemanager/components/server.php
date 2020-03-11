<?php
namespace common\modules\queuemanager\components;
require_once __DIR__ . './../../../../vendor/autoload.php';
require_once __DIR__ . '/domain.php';

use Workerman\Worker;
use Workerman\Connection\AsyncTcpConnection;
use yii\BaseYii;
use Yii;

if (SSL) {
    //SSL context.
    $context = array(
        'ssl' => array(
            'local_cert'  => '/etc/nginx/ssl/leaderssl/ssl-bundle.crt',
            'local_pk'    => '/etc/nginx/ssl/leaderssl/infomarketstudio.key',
            'verify_peer' => false,
        )
    );

// create a ws-server. all your users will connect to it
    $ws_worker = new Worker("websocket://".DOMAIN.":".PORT,$context);
} else {
    $ws_worker = new Worker("websocket://".DOMAIN.":".PORT );
}





$ws_worker::$logFile = '../../../runtime/websocket.log';
if (SSL) {
    $ws_worker->transport = 'ssl';
}
$ws_worker->count = 1;// it will create 4 process
// storage of user-connection link

$ws_worker->onConnect = function($connection) use (&$users)
{
    $connection->onWebSocketConnect = function($connection) use (&$users)
    {


        // put get-parameter into $users collection when a new user is connected
        // you can set any parameter on site page. for example client.html: ws = new WebSocket("ws://127.0.0.1:8000/?user=tester01");
        $users[$_GET['user']] = $connection;
        // or you can use another parameter for user identification, for example $_COOKIE['PHPSESSID']



    };
};
$ws_worker->onClose = function($connection) use(&$users)
{
    if(isset($users[$connection->uid]))
    {
        // unset parameter when user is disconnected
        unset($users[$connection->uid]);
    }
};
// it will start once for each of the 4 ws-servers when you start server.php:
$ws_worker->onWorkerStart = function() use (&$users)
{
    //each ws-server connects to the local tcp-server
    $connection = new AsyncTcpConnection("tcp://".DOMAIN.":1235");
    $connection->onMessage = function($connection, $data) use (&$users) {
        // you have to use json_decode for $data because send.php uses json_encode
        $data = json_decode($data); // but you can use another protocol for send data send.php to
        // local tcp-server


        // send a message to the user by userId
        if (is_object($data)) {
            foreach ($users as $key=>$val){
                if (isset($users[$key])) {
                    $webconnection = $users[$key];
                    $webconnection->send(json_encode($data),false);

                }
            }

        }

    };
    $connection->connect();
};
// create a local tcp-server. it will receive messages from your site code (for example from send.php)
$tcp_worker = new Worker("tcp://".DOMAIN.":1235");
// create a handler that will be called when a local tcp-socket receives a message (for example from send.php)
$tcp_worker->onMessage = function($connection, $data) use ($tcp_worker)
{


  //  print_r($tcp_worker->connections);

    // forward message to all other process (you have 4 ws-servers)
    foreach ($tcp_worker->connections as $id => $webconnection) {

            echo "Send ".$id." ".$data;
            $webconnection->send($data);


    }
};
// Run worker
Worker::runAll();
