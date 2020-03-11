<?php
/* @var $this \yii\web\View */
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

/* @var $content string */
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\DemoAsset')->baseUrl;

$this->beginContent('@frontend/themes/demo/views/layouts/base.php');

?>

    <div class="main-content">


        <div id="banner" class="banner">
            <div class="banner-text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <h1 class="text-uppercase">ADD CHATBOT & AI TO YOUR WEBSITE</h1>
                            <h3 class="mt-4">Free Try for 30 Days. <span>Let’s Start</span></h3>
                            <form>
                                <div class="form-row align-items-center justify-content-lg-start justify-content-center">
                                    <div class="col-auto">
                                        <input type="text" class="form-control mb-2" id="inlineFormInput"
                                               placeholder="you@example.com">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="button mb-2"><i class="ion-ios-paperplane"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 text-right">
                            <img class="img-fluid banner-img" src="<?=$bundlePath;?>/images/banner/banner-img.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <img class="img-fluid banner-after" src="<?=$bundlePath;?>/images/banner/banner-after.png" alt="image">
        </div>

        <?php echo  \common\modules\widget\widgets\DbText::widget([
            'key' => 'ads-example'
        ]) ?>


        <?php echo $content ?>

    </div>

<?php $this->endContent() ?>