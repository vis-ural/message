<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */

\frontend\assets\DemoAsset::register($this);
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\DemoAsset')->baseUrl;


?>
<?php $this->beginPage() ?>





<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>

    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo Html::encode($this->title) ?></title>

    <link rel="shortcut icon" href="<?= $bundlePath;?>/images/favicon.ico">

    <?php $this->head() ?>
    <?php echo Html::csrfMetaTags() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--<div id="mainwrapper" data-uk-grid-match="">-->
<!--     widget -->
<!--    <div class="stickleftpadding"  ></div>-->
<!--    <div id="content-wrap"  style="    padding-left: 85px;">-->
<!--        --><?php //echo $content ?>
<!--    </div>-->
<!--</div>-->
<?= \common\modules\widget\widgets\Sidebar\SidebarWidget::widget(['content'=>$content]);?>
<?php $this->endBody() ?>


<div id="loading">
    <div id="loading-center">
        <img src="<?= $bundlePath;?>/images/loader.gif" alt="loder">
    </div>
</div>





<div id="cookie_div" class="align-items-center" style="text-align: center;"> Мы используем cookie...
    <a class="button grey text-center ml-3" href="#" role="button" id="cookie">Принимаю </a>
</div>




</body>
</html>



<?php $this->endPage() ?>
