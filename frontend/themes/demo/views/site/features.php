<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = Yii::t('frontend','Features');
$this->params['breadcrumbs'][] = $this->title;
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\DemoAsset')->baseUrl;

?>
<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 mt-5">
                <div class="title-box">
                    <h2 class="title-light text-dark">Conversational <span>Maturity</span></h2>
                </div>
                <p class="mt-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Accompanied by English versions from the 1914 translation by H. Rackham.</p>
            </div>
            <div class="col-lg-6 col-md-12 mt-5">
                <img class="img-fluid top-img1 w-100" src="<?=$bundlePath;?>/images/works/screen-1.png" alt="image">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 order-lg-2 order-2 mt-5 pt-5">
                <div class="title-box">
                    <h2 class="title-light text-dark">Emotionally <span>Intelligent</span></h2>
                </div>
                <p class="mt-4">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <p class="mt-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            </div>
            <div class="col-lg-6 col-md-12 order-lg-1 order-2 mt-5 pt-5">
                <img class="img-fluid top-img1 w-100" src="<?=$bundlePath;?>/images/works/screen-1.png" alt="image">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 mt-5 pt-5">
                <div class="title-box">
                    <h2 class="title-light text-dark">3rd Party <span>Integrations</span></h2>
                </div>
                <p class="mt-4">It is a long established fact that a reader will be distracted by the readable content.</p>
                <div class="features-arrow">
                    <ul>
                        <li><i class="fas fa-check-circle"></i>Contrary to popular belief</li>
                        <li><i class="fas fa-check-circle"></i>There are many variations of passages</li>
                        <li><i class="fas fa-check-circle"></i>Many desktop publishing packages</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mt-5 pt-5">
                <img class="img-fluid top-img1 w-100" src="<?=$bundlePath;?>/images/works/screen-1.png" alt="image">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 mb-lg-0 mb-md-5 order-lg-2 order-1 mt-5 pt-5">
                <div class="title-box">
                    <h2 class="title-light text-dark">Free to <span>Explore</span></h2>
                </div>
                <p class="mt-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Accompanied by English versions from the 1914 translation by H. Rackham.</p>
                <p class="mt-4">It is a long established fact that a reader will be distracted.</p>
            </div>
            <div class="col-lg-6 col-md-12 mb-lg-0 mb-md-5 order-lg-1 order-2 mt-5 pt-5">
                <img class="img-fluid top-img1 w-100" src="<?=$bundlePath;?>/images/works/screen-1.png" alt="image">
            </div>
        </div>
    </div>
</section>
