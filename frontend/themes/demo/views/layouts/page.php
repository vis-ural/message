<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

/* @var $content string */
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\DemoAsset')->baseUrl;

$this->beginContent('@frontend/themes/demo/views/layouts/base.php');

?>

    <div class="main-content">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-12">
                        <h1 class="title"><?=$this->title;?></h1>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <?php echo Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'options' => ['class' => ''],
                            'itemTemplate' => "<li class='d-inline'>{link}</li>\n",
                            'activeItemTemplate' => "<li class='d-inline active'>{link}</li>\n"
                        ]) ?>
                    </div>
                </div>
            </div>
            <img class="img-fluid breadcrumbs-after" src="<?=$bundlePath;?>/images/banner/banner-after.png" alt="image">
        </div>
        <?php if(Yii::$app->session->hasFlash('alert')):?>
                    <?php echo \yii\bootstrap\Alert::widget([
                        'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                        'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                    ])?>
                <?php endif; ?>
        <?php echo  \common\modules\widget\widgets\DbText::widget([
            'key' => 'ads-example'
        ]) ?>


        <?php echo $content ?>

    </div>

<?php $this->endContent() ?>