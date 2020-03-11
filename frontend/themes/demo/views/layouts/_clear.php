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


        <?php echo $content ?>


<?php $this->endBody() ?>





</body>
</html>



<?php $this->endPage() ?>
