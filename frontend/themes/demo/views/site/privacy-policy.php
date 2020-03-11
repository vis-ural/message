<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = Yii::t('frontend','Privacy Policy');
$this->params['breadcrumbs'][] = $this->title;
$bundlePath = Yii::$app->getAssetManager()->getBundle('\frontend\assets\DemoAsset')->baseUrl;

?>
<section class="privacy-policy">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-2">
                    <h4 class="iq-tw-7">Terms of Use - Vizion Installment</h4>
                    <p>Nulla enim justo, elementum iaculis commodo et, feugiat fermentum quam. In quis lorem tempor, porta nunc a, malesuada dui. Integer venenatis leo sit amet mi tincidunt, sit amet pharetra mauris efficitur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent vestibulum eros vitae magna iaculis.</p>
                </div>
                <div class="mt-5">
                    <h4 class="iq-tw-7">General</h4>
                    <p>Suspendisse eu neque sit amet mi fermentum viverra. Nullam venenatis feugiat odio nec tincidunt. Suspendisse molestie ipsum ac molestie maximus. </p>
                </div>
                <div class="mt-5">
                    <h4 class="iq-tw-7">Permitted Use and Restrictions</h4>
                    <p>Sed id tellus orci. Donec congue tellus dignissim molestie fermentum. Duis cursus in mi id cursus. Sed egestas mi quis semper feugiat. Donec laoreet porta velit. Duis eros orci, lacinia a mollis quis, vestibulum ut elit. Sed vitae justo sapien. Duis ultricies ante non tortor sollicitudin, vel mattis lacus venenatis. Nam non tincidunt mauris, a tincidunt diam. Sed pulvinar lorem pellentesque faucibus ornare. Donec eu dui urna. Cras porta porta enim, nec congue tellus hendrerit vitae. Fusce rhoncus vel lorem.</p>
                </div>
                <div class="mt-5">
                    <h4 class="iq-tw-7">Your Access to the Site</h4>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                </div>
                <div class="mt-5">
                    <h4 class="iq-tw-7">Accounts & Passwords</h4>
                    <p>Nunc quam dui, aliquam ut lacus non, congue rutrum tortor. Maecenas mi quam, lacinia sed tortor nec, cursus accumsan lorem. Pellentesque a quam non nibh tincidunt congue.</p>
                </div>
                <div class="mt-5">
                    <h4 class="iq-tw-7">Security</h4>
                    <p>Phasellus semper malesuada arcu a posuere. Vestibulum tortor nisi, pellentesque eget nibh tristique, scelerisque bibendum ex. Integer malesuada bibendum ante ut molestie. Praesent sed ex laoreet, cursus justo vel, sodales quam. Nam a odio eu ex pulvinar euismod.</p>
                </div>
                <div class="mt-5">
                    <h4 class="iq-tw-7">Unauthorized Use of the Site</h4>
                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose.</p>
                </div>
                <div class="mt-5">
                    <h4 class="iq-tw-7">No Financial Advice Provided</h4>
                    <p>Fusce rutrum mauris eros, at iaculis orci vestibulum non. Morbi sit amet blandit tortor. Integer quis nisi eu augue maximus tincidunt ut vel enim. Ut malesuada massa nec sollicitudin dapibus.</p>
                </div>
                <div class="mt-5">
                    <h4 class="iq-tw-7">Cookies</h4>
                    <p>Vestibulum laoreet vehicula eros, et rutrum purus auctor et. Praesent rutrum erat ut nisi hendrerit, vitae dapibus mi blandit. Fusce eu ultricies tortor. Integer sed finibus nulla, nec iaculis ex. Suspendisse lacinia magna sit amet turpis rhoncus, a accumsan ex porttitor. Donec at quam vitae enim maximus accumsan. Curabitur nec posuere turpis. Curabitur a metus gravida, fermentum nisi id, rhoncus nulla. Pellentesque at erat sed nibh tempus mollis. Quisque tempor viverra erat, quis semper orci imperdiet a. Sed eu laoreet lacus, eget bibendum dolor. Praesent luctus justo non molestie rutrum.</p>
                </div>
            </div>
        </div>
    </div>
</section>
