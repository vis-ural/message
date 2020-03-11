<?php
namespace common\modules\queuemanager\components;
use common\modules\queuemanager\QueueManager;

/**
 * Created by PhpStorm.
 * User: romario
 * Date: 28.01.19
 * Time: 1:53
 */

class DownloadJob extends QueueManager implements \yii\queue\JobInterface
{
    public $url;
    public $file;

    public function execute($queue)
    {
        file_put_contents($this->file, file_get_contents($this->url));
    }
}
?>