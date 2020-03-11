<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */


$this->title = \common\modules\widget\widgets\DbText::widget(['key' => 'seo.title.site.about']);
$this->registerMetaTag(['name' => 'keywords', 'content' => \common\modules\widget\widgets\DbText::widget(['key' => 'seo.keywords.site.about'])]);
$this->registerMetaTag(['name' => 'description', 'content' => \common\modules\widget\widgets\DbText::widget(['key' => 'seo.description.site.about'])]);
$this -> params['breadcrumbs'][] = $this -> title;

$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\DemoAsset')->baseUrl;

?>
<section class="iq-about">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="about-manu text-center">
                    <li class="d-inline"><a href="#values" class="active">Our Values</a></li>
                    <li class="d-inline"><a href="#team">Our Team</a></li>
                    <li class="d-inline"><a href="#partners">Our Partners</a></li>
                </ul>
                <div class="about-content mt-5">
                    <div id="values" class="mb-0">
                        <div class="row mt-5 pt-3">
                            <div class="col-lg-6 col-md-12">
                                <div class="title-box">
                                    <h2 class="title-light text-dark">Our Company <span>Values</span></h2>
                                </div>
                                <p class="mt-4"><strong>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</strong></p>
                                <p class="mt-4">The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            </div>
                            <div class="col-lg-6 col-md-12 r-mt3">
                                <img class="img-fluid" src="<?= $bundlePath;?>/images/about/about-img.gif" alt="image">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mt-5">
                                <div class="title-box">
                                    <h3 class="title-light text-dark">Long Term <span> Company Thinking</span></h3>
                                </div>
                                <p class="mt-2">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                <ul class="iq-list mt-4">
                                    <li class="mt-4">There are many variations of passages of Lorem Ipsum available.</li>
                                    <li class="mt-4">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-12 mt-5">
                                <div class="title-box">
                                    <h3 class="title-light text-dark"><span>Creativity</span></h3>
                                </div>
                                <p class="mt-2">It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                <ul class="iq-list mt-4">
                                    <li class="mt-4">There are many variations of passages of Lorem Ipsum available.</li>
                                    <li class="mt-4">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="team" class="text-center">
                        <div class="row justify-content-md-center mt-5">
                            <div class="col-lg-8 col-md-12 text-center">
                                <div class="title-box">
                                    <h2 class="title text-dark"><span>Our Team</span></h2>
                                    <p class="mt-2">Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-box mt-5">
                                    <div class="team-img position-relative">
                                        <img class="img-fluid team-1" src="<?= $bundlePath;?>/images/team/team-1.jpg" alt="">
                                        <img class="img-fluid team-2" src="<?= $bundlePath;?>/images/team/team-1hover.jpg" alt="">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h5 class="title">Peter Deo</h5>
                                        <p>CEO-Vizion</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-box mt-5">
                                    <div class="team-img position-relative">
                                        <img class="img-fluid team-1" src="<?= $bundlePath;?>/images/team/team-2.jpg" alt="">
                                        <img class="img-fluid team-2" src="<?= $bundlePath;?>/images/team/team-2hover.jpg" alt="">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h5 class="title">Rose Parker</h5>
                                        <p>CEO-Vizion</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-box mt-5">
                                    <div class="team-img position-relative">
                                        <img class="img-fluid team-1" src="<?= $bundlePath;?>/images/team/team-3.jpg" alt="">
                                        <img class="img-fluid team-2" src="<?= $bundlePath;?>/images/team/team-3hover.jpg" alt="">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h5 class="title">Jack White</h5>
                                        <p>CEO-Vizion</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-box mt-5">
                                    <div class="team-img position-relative">
                                        <img class="img-fluid team-1" src="<?= $bundlePath;?>/images/team/team-4.jpg" alt="">
                                        <img class="img-fluid team-2" src="<?= $bundlePath;?>/images/team/team-4hover.jpg" alt="">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h5 class="title">Black John</h5>
                                        <p>CEO-Vizion</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-box mt-5">
                                    <div class="team-img position-relative">
                                        <img class="img-fluid team-1" src="<?= $bundlePath;?>/images/team/team-3.jpg" alt="">
                                        <img class="img-fluid team-2" src="<?= $bundlePath;?>/images/team/team-3hover.jpg" alt="">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h5 class="title">Hulk Man</h5>
                                        <p>CEO-Vizion</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-box mt-5">
                                    <div class="team-img position-relative">
                                        <img class="img-fluid team-1" src="<?= $bundlePath;?>/images/team/team-4.jpg" alt="">
                                        <img class="img-fluid team-2" src="<?= $bundlePath;?>/images/team/team-4hover.jpg" alt="">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h5 class="title">Nick Jorden</h5>
                                        <p>CEO-Vizion</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-box mt-5">
                                    <div class="team-img position-relative">
                                        <img class="img-fluid team-1" src="<?= $bundlePath;?>/images/team/team-1.jpg" alt="">
                                        <img class="img-fluid team-2" src="<?= $bundlePath;?>/images/team/team-1hover.jpg" alt="">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h5 class="title">Pepper Fury</h5>
                                        <p>CEO-Vizion</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-box mt-5">
                                    <div class="team-img position-relative">
                                        <img class="img-fluid team-1" src="<?= $bundlePath;?>/images/team/team-2.jpg" alt="">
                                        <img class="img-fluid team-2" src="<?= $bundlePath;?>/images/team/team-2hover.jpg" alt="">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <h5 class="title">Rose Parker</h5>
                                        <p>CEO-Vizion</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="partners" class="d-block">
                        <div class="row justify-content-md-center">
                            <div class="col-lg-8 col-md-12 text-center">
                                <div class="title-box">
                                    <h2 class="title text-dark">Meet Our <span>Partners</span></h2>
                                    <p class="mt-2">Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"><img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img1.png" alt="image" data-toggle="tooltip" title="HTML"> </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"><img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img2.png" alt="image" data-toggle="tooltip" title="Wordpress"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"><img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img3.png" alt="image" data-toggle="tooltip" title="Shopify"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"><img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img4.png" alt="image" data-toggle="tooltip" title="CSS"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"><img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img5.png" alt="image" data-toggle="tooltip" title="Jquery"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"> <img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img6.png" alt="image" data-toggle="tooltip" title="Bootstrap"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"><img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img3.png" alt="image" data-toggle="tooltip" title="Shopify"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"><img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img1.png" alt="image" data-toggle="tooltip" title="HTML"> </a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"> <img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img6.png" alt="image" data-toggle="tooltip" title="Bootstrap"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"><img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img2.png" alt="image" data-toggle="tooltip" title="Wordpress"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"><img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img5.png" alt="image" data-toggle="tooltip" title="Jquery"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 mt-5">
                                <div class="clients-box text-center">
                                    <a href="#"><img class="img-fluid" src="<?= $bundlePath;?>/images/clients/clients-img4.png" alt="image" data-toggle="tooltip" title="CSS"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


