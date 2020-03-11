<?php
/**
 * Created by PhpStorm.
 * User: visural
 * Date: 11.03.20
 * Time: 19:57
 */

namespace common\components;


use common\models\Message;

class Helper
{


    public static function sendSocket($message,$cat='',$message_id) {
        $localsocket ="tcp://".env('FRONTEND_DOMAIN').":1235";
        $instance = stream_socket_client($localsocket, $errno, $errstr);//соединямся с вебсокет-сервером
        fwrite($instance, json_encode(['message' => $message, 'cat'=>$cat]) . "\n");//отправляем сообщение

        $model = Message::findOne($message_id);
        if($model){
            $model->counter = $model->counter +1;
            if(!$model->update(false)){
                print_r($model->getErrors());
            }
        }

    }


}