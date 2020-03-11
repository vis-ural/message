<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\SignupForm */

$this->title = Yii::t('frontend', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="iq-login-regi">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h2><?php echo Html::encode($this->title) ?></h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                <h2><?php echo Yii::t('frontend', 'Sign up with')  ?>:</h2>
                <div class="form-group">
                    <?php echo yii\authclient\widgets\AuthChoice::widget([
                        'baseAuthUrl' => ['/user/sign-in/oauth']
                    ]) ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 r-mt3">

                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>


                <form>
                    <div class="form-group">

                        <?php echo $form->field($model, 'username')->textInput(['id'=>'exampleInputName','class'=>'form-control','placeholder'=>'Имя пользователя']) ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->field($model, 'email')->textInput(['id'=>'exampleInputEmail','class'=>'form-control','placeholder'=>'Email']) ?>
                    </div>
                    <div class="form-group">
                         <?php echo $form->field($model, 'password')->passwordInput(['id'=>'exampleInputPassword1','class'=>'form-control','placeholder'=>'Пароль']) ?>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label class="mb-0" for="exampleInputPassword1">Confirm Password</label>-->
<!--                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password">-->
<!--                    </div>-->

                    <div class="form-check">

                        <?php echo $form->field($model, 'agree')->checkbox(['id'=>'exampleCheck1','class'=>'form-check-input' ])->label(false) ?>

                        <label class="form-check-label" for="exampleCheck1"><?= Yii::t('frontend','By signing up for ViziOn, you agree to our');?> <a href="/terms-of-use"><?= Yii::t('frontend','Terms of Service');?></a>
                            <?= Yii::t('frontend','and');?> <a href="/privacy-policy">  <?= Yii::t('frontend','Privacy Policy');?>.</a></label>

                    </div>

                    <?php echo Html::submitButton(Yii::t('frontend', 'Signup'), ['class' => 'button mt-2 mb-2 w-100', 'name' => 'signup-button']) ?>

                    <?php ActiveForm::end(); ?>
                </form>
            </div>
        </div>
    </div>
</section>

