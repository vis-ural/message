<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\LoginForm */

$this->title = Yii::t('frontend', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="iq-login-regi">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <h2><?php echo Html::encode($this->title) ?></h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>

                <h5><?php echo Yii::t('frontend', 'Log in with')  ?>:</h5>
                <div class="form-group">
                    <?php echo yii\authclient\widgets\AuthChoice::widget([
                        'baseAuthUrl' => ['/user/sign-in/oauth']
                    ]) ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 r-mt3">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="form-group">
                    <?php echo $form->field($model, 'identity')->textInput(['id'=>'exampleInputEmail1',' class'=>'form-control','placeholder'=>'Email']) ?>
                </div>
                <div class="form-group">
                    <?php echo $form->field($model, 'password')->passwordInput() ?>
                </div>
<!--                <div class="form-group">-->
<!--                    --><?php //echo $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::className()) ?>
<!--                </div>-->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-check">
                            <?php echo $form->field($model, 'rememberMe')->checkbox() ?>
                        </div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="<?= yii\helpers\Url::to(['sign-in/request-password-reset']);?>" class="link">Забыли пароль?</a>
                    </div>
                </div>

                <?php echo Html::submitButton(Yii::t('frontend', 'Login'), ['class' => 'button mt-2 mb-2 w-100', 'name' => 'login-button']) ?>
                <div class="text-center">
                    <?php echo Yii::t('frontend', "Don't Have an Account?").' '. Html::a(Yii::t('frontend', "Register Now"), ['signup'],['class'=>'button mt-2 mb-2 w-100']) ?>
                </div>


                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</section>


