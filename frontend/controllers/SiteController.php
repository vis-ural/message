<?php

namespace frontend\controllers;

use frontend\models\ContactForm;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Cookie;

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


}
