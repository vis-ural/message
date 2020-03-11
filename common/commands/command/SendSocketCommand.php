<?php

namespace common\commands\command;

use trntv\tactician\base\BaseCommand;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendSocketCommand extends BaseCommand
{

    /**
     * @var mixed
     */
    public $text;
    public $client;
    public $body;
    public $title;
    public $user;
    public $message;
    public $type;



    /**
     * Command init
     */
    public function init()
    {


        $this->type = 5;

        if(!$this->client){
            $this->client = 'backend'; //set to default
        }
    }


}
