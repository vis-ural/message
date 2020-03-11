<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = Yii::t('frontend','Contact');
$this->params['breadcrumbs'][] = $this->title;
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\DemoAsset')->baseUrl;

?>
<section class="iq-contactbox">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="site-contact">
                    <h1><?php echo Html::encode($this->title) ?></h1>

                    <div class="row">
                        <div class="col-lg-5">
                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                            <?php echo $form->field($model, 'name') ?>
                            <?php echo $form->field($model, 'email') ?>
                            <?php echo $form->field($model, 'subject') ?>
                            <?php echo $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                            <?php echo $form->field($model, 'verifyCode')->widget(Captcha::class, [
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            ]) ?>
                            <div class="form-group">
                                <?php echo Html::submitButton(Yii::t('frontend', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                </div>

                <div class="contact-box">
                    <h3>Get in Touch</h3>
                    <form class="p-0" id="contact">
                        <div class="contact-form mt-4">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-2">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-2">Email</label>
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-2">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 mb-3">
                                    <div class="form-group section-field textarea wow fadeInUp animated" data-wow-duration="2.5s" style="visibility: visible; animation-duration: 2.5s;">
                                        <label class="mb-2">Message</label>
                                        <textarea class="input-message w-100" name="message" id="message" placeholder="Type Your Message Here" rows="5"></textarea>
                                    </div>
                                    <input type="hidden" name="action" value="sendEmail">
                                    <div class="section-field iq-mt-20">
                                        <div class="g-recaptcha" data-sitekey="6LdA3mYUAAAAANpUuZTLbKM_s23tTHlcdJ7dYfgI"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LdA3mYUAAAAANpUuZTLbKM_s23tTHlcdJ7dYfgI&amp;co=ZmlsZTo.&amp;hl=ru&amp;v=v1559543665173&amp;size=normal&amp;cb=m0pa4y2cniky" width="304" height="78" role="presentation" name="a-attug36yoeud" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div></div>
                                    </div>
                                    <button id="submit" name="submit" type="submit" value="Send" class="button pull-right wow fadeInUp mt-3 animated" data-wow-duration="1.0s" style="visibility: visible; animation-duration: 1s;">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 r-mt3">
                <div class="contact-bg">
                    <h2>Contact Info</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="iq-contact text-white">
                                <li>
                                    <i class="fas fa-phone"></i>
                                    <p>+0123 456 789</p>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <p><a href="../../../cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="c8b0b1b288afa5a9a1a4e6aba7a5">[email&nbsp;protected]</a></p>
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p>Carol J. Stephens 1635 Franklin, Montgomery, AL 36104 USA</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12">
                            <iframe class="w-100 mt-3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.840289118572!2d144.95373631550405!3d-37.81720974201396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1543402448828" style="border:0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


