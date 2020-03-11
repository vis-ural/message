<?php

namespace common\commands\command;

use trntv\tactician\base\BaseCommand;
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendCommand extends BaseCommand
{
    /**
     * @var mixed
     */
    public $phone;
    /**
     * @var mixed
     */
    public $type;
    /**
     * @var string
     */
    public $title;
    public $chenel;
    public $body;
    public $order_id;
    public $email;
    public $_csrf;
    public $Form;
    public $MessageForm;
    public $data_send; //дата отправки сообщения
    public $client; //клиент для сокета
    public $cookie; //клиент для сокета
    public $myurl;
    public $miniland_id;


    /**
     * Command init
     */
    public function init()
    {

        if (!$this->title){
            $this->title = 'case-shop';
        }
        if (!$this->order_id){
            $this->order_id = '';
        }
        if (!$this->data_send){
            $this->data_send = date("Y-m-d");
        }
        if(!$this->client){
            $this->client = 'backend'; //set to default
        }
        if(!$this->chenel){
            $this->chenel = 'general'; //set to default
        }
    }


}
