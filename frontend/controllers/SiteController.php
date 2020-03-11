<?php

namespace frontend\controllers;

use frontend\models\ContactForm;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = '@frontend/themes/demo/views/layouts/page';
    /**
     * @inheritdoc
     */
    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            // change layout for error action
            if ($action->id=='error')
                $this->layout ='@frontend/themes/demo/views/layouts/page';
            return true;
        } else {
            return false;
        }
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',

            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales' => array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }


    public function actionIndex()
    {

        $this->layout = '@frontend/themes/demo/views/layouts/main';
        return $this->render('@frontend/themes/demo/views/site/index');
    }

    public function actionAbout()
    {

        return $this->render('@frontend/themes/demo/views/site/about');
    }
    public function actionPricing()
    {

        return $this->render('@frontend/themes/demo/views/site/pricing');
    }
    public function actionPrivacyPolicy()
    {

        return $this->render('@frontend/themes/demo/views/site/privacy-policy');
    }
    public function actionFeatures()
    {

        return $this->render('@frontend/themes/demo/views/site/features');
    }
    public function actionContact()
    {
        $this->layout = '@frontend/themes/demo/views/layouts/page';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options' => ['class' => 'alert-success']
                ]);
                return $this->refresh();
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => \Yii::t('frontend', 'There was an error sending email.'),
                    'options' => ['class' => 'alert-danger']
                ]);
            }
        }

        return $this->render('@frontend/themes/demo/views/site/contact', [
            'model' => $model
        ]);
    }
}
