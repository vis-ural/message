<?php

namespace common\commands\command;

use trntv\tactician\base\BaseCommand;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendSlackCommand extends BaseCommand
{
    /**
     * @var mixed
     */
    public $text;
    /**
     * @var mixed
     */
    public $chenal;
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
