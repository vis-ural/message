<?php
/* @var $this yii\web\View */
$this->title = 'Vizion - онлайн-чат с обучаемым искуственным интеллектом';
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\DemoAsset')->baseUrl;

?>



<section class="iq-features">
    <div class="bg"><img src="<?=$bundlePath;?>/images/works/work-bg.png" alt="img"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 text-center">
                <img class="img-fluid top-img1" src="<?=$bundlePath;?>/images/works/01.gif" alt="image">
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="holderCircle">
                    <div class="round"></div>
                    <div class="dotCircle">
                                <span class="itemDot active itemDot1" data-tab="1">
                                <i class="ion-ios-timer-outline"></i>
                                <span class="forActive"></span>
                                </span>
                        <span class="itemDot itemDot2" data-tab="2">
                                <i class="ion-ios-chatboxes-outline"></i>
                                <span class="forActive"></span>
                                </span>
                        <span class="itemDot itemDot3" data-tab="3">
                                <i class="ion-ios-person-outline"></i>
                                <span class="forActive"></span>
                                </span>
                        <span class="itemDot itemDot4" data-tab="4">
                                <i class="ion-ios-pricetags-outline"></i>
                                <span class="forActive"></span>
                                </span>
                        <span class="itemDot itemDot5" data-tab="5">
                                <i class="ion-ios-upload-outline"></i>
                                <span class="forActive"></span>
                                </span>
                        <span class="itemDot itemDot6" data-tab="6">
                                    <i class="ion-ios-briefcase-outline"></i>
                                    <span class="forActive"></span>
                                 </span>
                    </div>
                    <div class="contentCircle">
                        <div class="CirItem title-box active CirItem1">
                            <h2 class="title"><span><?= Yii::t('frontend','Automate');?></span></h2>
                            <p><?= Yii::t('frontend','Automate business process organization management');?></p>
                            <i class="ion-ios-timer-outline"></i>
                        </div>
                        <div class="CirItem title-box CirItem2">
                            <h2 class="title"><span><?= Yii::t('frontend','Chat');?></span></h2>
                            <p><?= Yii::t('frontend','Vizion widget give good services for your clients');?></p>
                            <i class="ion-ios-chatboxes-outline"></i>
                        </div>
                        <div class="CirItem title-box CirItem3">
                            <h2 class="title"><span><?= Yii::t('frontend','Responses');?></span></h2>
                            <p><?= Yii::t('frontend','All of responses save in one window');?></p>
                            <i class="ion-ios-person-outline"></i>
                        </div>
                        <div class="CirItem title-box CirItem4">
                            <h2 class="title"><span><?= Yii::t('frontend','Tags');?></span></h2>
                            <p><?= Yii::t('frontend','You can to tag your conversation for find later');?></p>
                            <i class="ion-ios-pricetags-outline"></i>
                        </div>
                        <div class="CirItem title-box CirItem5">
                            <h2 class="title"><span><?= Yii::t('frontend','Integrations');?></span></h2>
                            <p><?= Yii::t('frontend','Responses');?></p>
                            <i class="ion-ios-upload-outline"></i>
                        </div>
                        <div class="CirItem title-box CirItem6">
                            <h2 class="title"><span><?= Yii::t('frontend','Support');?></span></h2>
                            <p><?= Yii::t('frontend','Responses');?></p>
                            <i class="ion-ios-briefcase-outline"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="iq-works mt-3">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8 col-sm-12 text-center">
                <div class="title-box">
                    <h2 class="title text-dark"><?= Yii::t('frontend','Simple Platform to');?> <span><?= Yii::t('frontend','Build & Deploy');?></span></h2>
                    <p class="mt-2">Contrary to popular belief, Lorem Ipsum.</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center works-arrow1 m-top">
            <div class="col-lg-6 col-sm-12">
                <div class="title-box">
                    <h2 class="title-light text-dark">Great Way to add Little Fun to Your
                        <span>Corporate World</span></h2>
                </div>
                <p class="mt-4">It is a long established fact that a reader will be distracted by the readable roots
                    in a piece.</p>
                <ul class="mt-4">
                    <li class="mt-2"><i class="fas fa-check-circle"></i>Contrary to popular belief</li>
                    <li class="mt-2"><i class="fas fa-check-circle"></i>The standard chunk of Lorem Ipsum used since
                    </li>
                    <li class="mt-2"><i class="fas fa-check-circle"></i>There are many variations of passages</li>
                    <li class="mt-2"><i class="fas fa-check-circle"></i>Many desktop publishing packages</li>
                </ul>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="works-box">
                    <img class="img-fluid top-bg" src="<?=$bundlePath;?>/images/works/work-bg.png" alt="image">
                    <img class="img-fluid works-img1" src="<?=$bundlePath;?>/images/works/works-img1.png" alt="image">
                    <img class="img-fluid top-img1 i-size" src="<?=$bundlePath;?>/images/works/02.gif" alt="image">
                </div>
            </div>
        </div>
        <div class="row align-items-center works-arrow2 m-top">
            <div class="col-lg-6 col-sm-12 order-lg-2 order-1">
                <div class="title-box">
                    <h2 class="title-light text-dark">Chatbots are Just Another Way for
                        <span>Millennials to Chat</span></h2>
                </div>
                <p class="mt-4">It is a long established fact that a reader will be distracted by the readable
                    content of a page.</p>
            </div>
            <div class="col-lg-6 col-sm-12 order-lg-1 order-2">
                <div class="works-box">
                    <img class="img-fluid top-bg" src="<?=$bundlePath;?>/images/works/work-bg.png" alt="image">
                    <img class="img-fluid works-img1" src="<?=$bundlePath;?>/images/works/works-img1.png" alt="image">
                    <img class="img-fluid top-img1 i-size" src="<?=$bundlePath;?>/images/works/01.gif" alt="image">
                </div>
            </div>
        </div>
        <div class="row align-items-center m-top">
            <div class="col-lg-6 col-sm-12">
                <div class="title-box">
                    <h2 class="title-light text-dark">Positive Feelings + Reduced Friction =
                        <span>Fun & Conversions</span></h2>
                </div>
                <p class="mt-4">It is a long established fact that a reader will be distracted by the readable
                    content of a page.</p>
                <a class="button grey mt-2" href="index.html#" role="button">Read More</a>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="works-box">
                    <img class="img-fluid top-bg" src="<?=$bundlePath;?>/images/works/work-bg.png" alt="image">
                    <img class="img-fluid works-img1" src="<?=$bundlePath;?>/images/works/works-img1.png" alt="image">
                    <img class="img-fluid top-img1 i-size" src="<?=$bundlePath;?>/images/works/02.gif" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="iq-about mt-1">
    <div class="bg"><img src="<?=$bundlePath;?>/images/works/work-bg.png" alt="img"></div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8 col-sm-12 text-center">
                <div class="title-box">
                    <h2 class="title text-dark">The Best Way to know What They Want is
                        <span>Through a Chatbot.</span></h2>
                    <p class="mt-4">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                        in a piece of classical Latin literature from a Latin professor.</p>
                </div>
                <div class="mt-4">
                    <a href="about-us.html" class="read-more mt-5">Learn More</a>
                </div>
                <img class="img-fluid about-img mt-5" src="<?=$bundlePath;?>/images/about/about-img.gif" alt="image">
            </div>
        </div>
    </div>
</section>


<section class="iq-blog mt-2">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-8 text-center">
                <div class="title-box">
                    <h2 class="title text-dark">Recent <span>Stories </span></h2>
                    <p class="mt-2">Contrary to popular belief, Lorem Ipsum.</p>
                </div>
            </div>
        </div>
        <div class="owl-carousel mt-5" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true"
             data-items="2" data-items-laptop="2" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1">
            <div class="item">
                <div class="blog-box">
                    <div class="row no-gutters row-eq-height">
                        <div class="col-sm-6 iq-shadow">
                            <div class="content">
                                <h5 class="mb-2"><a href="blog-detail.html">Established fact that a reader will
                                        be</a></h5>
                                <ul>
                                    <li><span>By:</span> <a href="index.html#">Admin</a></li>
                                    <li>May 10, 2018</li>
                                </ul>
                                <p class="mt-4">Build virtual agents to automate business processes such as front
                                    desk customer engagement.</p>
                                <ul class="iq-tag mt-4">
                                    <li><a href="index.html#">Design</a></li>
                                    <li><a href="index.html#">Style</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid" src="<?=$bundlePath;?>/images/blog/blog-img1.jpg" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="blog-box">
                    <div class="row no-gutters row-eq-height">
                        <div class="col-sm-6 iq-shadow">
                            <div class="content">
                                <h5 class="mb-2"><a href="blog-detail.html">Established fact that a reader will
                                        be</a></h5>
                                <ul>
                                    <li><span>By:</span> <a href="index.html#">Admin</a></li>
                                    <li>May 10, 2018</li>
                                </ul>
                                <p class="mt-4">Build virtual agents to automate business processes such as front
                                    desk customer engagement.</p>
                                <ul class="iq-tag mt-4">
                                    <li><a href="index.html#">Design</a></li>
                                    <li><a href="index.html#">Style</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid" src="<?=$bundlePath;?>/images/blog/blog-img2.jpg" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="blog-box">
                    <div class="row no-gutters row-eq-height">
                        <div class="col-sm-6 iq-shadow">
                            <div class="content">
                                <h5 class="mb-2"><a href="blog-detail.html">Established fact that a reader will
                                        be</a></h5>
                                <ul>
                                    <li><span>By:</span> <a href="index.html#">Admin</a></li>
                                    <li>May 10, 2018</li>
                                </ul>
                                <p class="mt-4">Build virtual agents to automate business processes such as front
                                    desk customer engagement.</p>
                                <ul class="iq-tag mt-4">
                                    <li><a href="index.html#">Design</a></li>
                                    <li><a href="index.html#">Style</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid" src="<?=$bundlePath;?>/images/blog/blog-img1.jpg" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="blog-box">
                    <div class="row no-gutters row-eq-height">
                        <div class="col-sm-6 iq-shadow">
                            <div class="content">
                                <h5 class="mb-2"><a href="blog-detail.html">Established fact that a reader will
                                        be</a></h5>
                                <ul>
                                    <li><span>By:</span> <a href="index.html#">Admin</a></li>
                                    <li>May 10, 2018</li>
                                </ul>
                                <p class="mt-4">Build virtual agents to automate business processes such as front
                                    desk customer engagement.</p>
                                <ul class="iq-tag mt-4">
                                    <li><a href="index.html#">Design</a></li>
                                    <li><a href="index.html#">Style</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid" src="<?=$bundlePath;?>/images/blog/blog-img2.jpg" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="iq-clients">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="title-box">
                    <h3 class="title text-dark">Worldwide Our <span class="timer" data-to="6000" data-speed="5000">6000 +</span>
                        Satisfied Client Using Chatbot</h3>
                    <p class="mt-2">Contrary to popular belief, Lorem Ipsum.</p>
                </div>
            </div>
        </div>
        <div class="owl-carousel mt-4" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true"
             data-items="5" data-items-laptop="5" data-items-tab="4" data-items-mobile="2" data-items-mobile-sm="1">
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"><img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img1.png" alt="image"
                                               data-toggle="tooltip" title="HTML"> </a>
                </div>
            </div>
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"><img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img2.png" alt="image"
                                               data-toggle="tooltip" title="Wordpress"></a>
                </div>
            </div>
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"><img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img3.png" alt="image"
                                               data-toggle="tooltip" title="Shopify"></a>
                </div>
            </div>
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"><img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img4.png" alt="image"
                                               data-toggle="tooltip" title="CSS"></a>
                </div>
            </div>
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"><img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img5.png" alt="image"
                                               data-toggle="tooltip" title="Jquery"></a>
                </div>
            </div>
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"> <img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img6.png" alt="image"
                                                data-toggle="tooltip" title="Bootstrap"></a>
                </div>
            </div>
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"><img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img1.png" alt="image"
                                               data-toggle="tooltip" title="HTML"> </a>
                </div>
            </div>
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"><img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img2.png" alt="image"
                                               data-toggle="tooltip" title="Wordpress"></a>
                </div>
            </div>
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"><img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img3.png" alt="image"
                                               data-toggle="tooltip" title="Shopify"></a>
                </div>
            </div>
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"><img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img4.png" alt="image"
                                               data-toggle="tooltip" title="CSS"></a>
                </div>
            </div>
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"><img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img5.png" alt="image"
                                               data-toggle="tooltip" title="Jquery"></a>
                </div>
            </div>
            <div class="item">
                <div class="clients-box text-center">
                    <a href="index.html#"> <img class="img-fluid" src="<?=$bundlePath;?>/images/clients/clients-img6.png" alt="image"
                                                data-toggle="tooltip" title="Bootstrap"></a>
                </div>
            </div>
        </div>
    </div>
</section>


<div id="body">
    <div id="chat-circle" class="btn btn-raised">
        <i class="ion-chatbubble-working"></i>
    </div>
    <div class="chat-box" >

        <!--        <iframe name="intercom-messenger-sheet-proxy" class="intercom-messenger-sheet-proxy-frame"-->
        <!--                sandbox="allow-scripts allow-forms allow-same-origin allow-popups"-->
        <!--                src="https://demo.infomarketstudio.ru/chat/default/onesignal3/" allowfullscreen="" title="Messenger app"-->
        <!--                allow="microphone *; camera *; autoplay *"-->
        <!--                ></iframe>-->
        <?php //  $this->renderPartial('@common/modules/chat/views/frontend/onesignal/chat');?>
        <div class="chat-box-header">
            <h5 class="title">ChatBot</h5>
            <span class="chat-box-toggle"><i class="ion-close-round"></i></span>
        </div>
        <div class="chat-box-body">
            <div class="chat-box-overlay">
            </div>
            <div class="chat-logs">
            </div>

        </div>
        <div class="chat-input">
            <form>
                <input type="text" id="chat-input" placeholder="Send a message..."/>
                <button type="submit" class="chat-submit" id="chat-submit"><i class="ion-ios-paperplane"></i></button>
            </form>
        </div>
    </div>
</div>