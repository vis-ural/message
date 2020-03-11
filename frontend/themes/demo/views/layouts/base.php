<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\DemoAsset')->baseUrl;

$this->beginContent('@frontend/themes/demo/views/layouts/_clear.php')
?>




    <header id="header"  >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">

                    <!--                    --><?php
                    //                    NavBar::begin([
                    //                        'brandLabel' => '<img class="logo" src="'. $bundlePath.'/images/logo.png" alt="image">',
                    //                        'brandUrl' => Yii::$app->homeUrl,
                    //                        'options' => [
                    //                            'class' => '  navbar navbar-expand-lg navbar-light',
                    //                        ],
                    //                    ]); ?>
                    <!--                    --><?php //echo Nav::widget([
                    //                        'options' => ['class' => ' navbar-nav ml-auto'],
                    //                        'items' => [
                    //                            [
                    //                                    'label' => Yii::t('frontend', 'Home'),
                    //                                'url' => ['/site/index' ],
                    //                                'options'=>[ 'class'=>'nav-item' ]
                    //                            ],
                    //                            ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
                    //                            ['label' => Yii::t('frontend', 'Articles'), 'url' => ['/article/index']],
                    //                            ['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']],
                    //                            ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest],
                    //                            ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login'], 'visible'=>Yii::$app->user->isGuest],
                    //                            [
                    //                                'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                    //                                'visible'=>!Yii::$app->user->isGuest,
                    //                                'items'=>[
                    //                                    [
                    //                                        'label' => Yii::t('frontend', 'Settings'),
                    //                                        'url' => ['/user/default/index']
                    //                                    ],
                    //                                    [
                    //                                        'label' => Yii::t('frontend', 'Backend'),
                    //                                        'url' => Yii::getAlias('@backendUrl'),
                    //                                        'visible'=>Yii::$app->user->can('manager')
                    //                                    ],
                    //                                    [
                    //                                        'label' => Yii::t('frontend', 'Logout'),
                    //                                        'url' => ['/user/sign-in/logout'],
                    //                                        'linkOptions' => ['data-method' => 'post']
                    //                                    ]
                    //                                ]
                    //                            ],
                    //                            [
                    //                                'label'=>Yii::t('frontend', 'Language'),
                    //                                'items'=>array_map(function ($code) {
                    //                                    return [
                    //                                        'label' => Yii::$app->params['availableLocales'][$code],
                    //                                        'url' => ['/site/set-locale', 'locale'=>$code],
                    //                                        'active' => Yii::$app->language === $code
                    //                                    ];
                    //                                }, array_keys(Yii::$app->params['availableLocales']))
                    //                            ]
                    //                        ]
                    //                    ]); ?>
                    <!--                    --><?php //NavBar::end(); ?>

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="/">
                            <img class="logo" src="<?= $bundlePath;?>/images/logo.png" alt="image">
                            <img class="logo-stiky" src="<?= $bundlePath;?>/images/logo-stiky.png" alt="image">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= \yii\helpers\Url::to('/');?>">Главная</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= \yii\helpers\Url::to('/about/');?>">О нас</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= \yii\helpers\Url::to('/features/');?>">Инструменты</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= \yii\helpers\Url::to('/contact/');?>">Контакты</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= \yii\helpers\Url::to('/pricing/');?>">Цены</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-3 text-right">
                    <ul class="login">
                        <?php if (Yii::$app->user->isGuest): ?>
                            <li class="d-inline"><a href="<?= \yii\helpers\Url::to('/login/');?>"><?= Yii::t('frontend','Login');?></a></li>
                        <?php endif; ?>
                        <?php if (!Yii::$app->user->isGuest): ?>
                            <li class="d-inline"><a  data-method='post' href="<?= \yii\helpers\Url::to('/logout/');?>"><?= Yii::t('frontend','Logout');?></a></li>
                        <?php endif; ?>
                        <?php if (Yii::$app->user->isGuest): ?>
                            <li class="d-inline active"><a href="<?= \yii\helpers\Url::to('/register/');?>"><?= Yii::t('frontend','Register');?></a></li>
                        <?php endif; ?>
                        <?php if (!Yii::$app->user->isGuest): ?>
                            <li class="d-inline active"><a href="<?= \yii\helpers\Url::to('/profile/');?>"><?= Yii::t('frontend','Profile');?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>





        <?php echo $content ?>




    <footer>
        <img class="img-fluid footer-before" src="<?= $bundlePath;?>/images/footer-before.png" alt="image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-12 re-center">
                    <a href="/"><img class="img-fluid logo" alt="#" src="<?= $bundlePath;?>/images/footer-logo.png"></a>
                    <div class="link mt-2">&copy; Design By <a href="https://infomarketstudio.ru?utm_source=botvizion">infomarket</a> 2018 - <?php echo date('Y') ?> </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 text-center text-uppercase">
                    <ul class="copyright">
                        <li class="d-inline ml-4 mr-4"><a href="<?= \yii\helpers\Url::to('/privacy-policy/');?>"><?= Yii::t('frontend','Privacy Policy');?></a></li>
                        <li class="d-inline ml-4 mr-4"><a href="<?= \yii\helpers\Url::to('/contact/');?>"><?= Yii::t('frontend','Contact');?></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 text-right r-mt3">
                    <ul class="media-box">
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="back-to-top">
            <a class="top" id="top" href="#top"><i class="ion-ios-arrow-thin-up"></i></a>
        </div>

    </footer>


<?php $this->endContent() ?>