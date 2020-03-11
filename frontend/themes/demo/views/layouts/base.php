<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\DemoAsset')->baseUrl;

$this->beginContent('@frontend/themes/demo/views/layouts/_clear.php')
?>





        <?php echo $content ?>






<?php $this->endContent() ?>