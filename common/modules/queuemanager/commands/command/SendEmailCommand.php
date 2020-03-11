<?php

namespace common\modules\queuemanager\commands\command;

use trntv\tactician\base\BaseCommand;
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class SendEmailCommand extends BaseCommand
{
    /**
     * @var mixed
     */
    public $from;
    /**
     * @var mixed
     */
    public $to;
    /**
     * @var string
     */
    public $subject;
    /**
     * @var string
     */
    public $view;
    /**
     * @var array
     */
    public $params;
    /**
     * @var string
     */
    public $body;
    /**
     * @var bool
     */
    public $html = true;

    public $order_id;

    /**
     * Command init
     */
    public function init()
    {
        $this->from = $this->from ?: \Yii::$app->params['robotEmail'];

    }

    /**
     * @return bool
     */
    public function isHtml()
    {
        return (bool) $this->html;
    }
}
