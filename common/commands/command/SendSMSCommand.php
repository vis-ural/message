<?php

namespace common\commands\command;

use trntv\tactician\base\BaseCommand;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendSMSCommand extends BaseCommand
{
    /**
     * @var mixed
     */
    public $phone;
    /**
     * @var mixed
     */
    public $text;
    /**
     * @var string
     */
    public $view;


    /**
     * Command init
     */
    public function init()
    {

    }


}
