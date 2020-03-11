<?php
$config = [
    'homeUrl' => Yii::getAlias('@backendUrl'),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'chat/chat-alerts/index',
    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'cookieValidationKey' => env('BACKEND_COOKIE_VALIDATION_KEY'),
            'baseUrl' => env('BACKEND_BASE_URL'),
        ],
        'user' => [
            'class' => yii\web\User::class,
            'identityClass' => common\models\User::class,
            'loginUrl' => ['sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin' => common\behaviors\LoginTimestampBehavior::class,
        ],
        'queue' => [
            'class' => \yii\queue\redis\Queue::class,
            'as log' => \yii\queue\LogBehavior::class,
           // 'as quuemanager' => common\modules\queuemanager\behaviors\QueueManagerBehavior::class
            // Other driver options
        ],
    ],
    'modules' => [
        'content' => [
            'class' => common\modules\content\Module::class,
            'controllerNamespace' =>  'common\modules\content\controllers\backend'
        ],
        'widget' => [
            'class' => common\modules\widget\Module::class,
        ],
        'chat' => [
            'class' => common\modules\chat\ChatModule::class,
            'controllerNamespace' =>  'common\modules\chat\controllers\backend'
        ],
//        'miniland' => [
//            'class' => 'common\modules\miniland\Module',
//            'controllerNamespace' =>  'common\modules\miniland\controllers\backend'
//        ],
//        'tunel' => [
//            'class' => 'common\modules\tunel\Module',
//            'controllerNamespace' =>  'common\modules\tunel\controllers\backend'
//        ],
        'crm' => [
            'class' => 'common\modules\crm\Module',
            'controllerNamespace' =>  'common\modules\crm\controllers\backend'
        ],
        'permit' => [
            'class' => \common\modules\permit\PermitModule::className(),
            //Если нужно передать layout это можно сделать так:
            //'layout' => '//admin',
            'params' => [
                'userClass' => \common\models\User::className(),
            ]
        ],
        'rbac' => [
            'class' => common\modules\rbac\Module::class,
            'defaultRoute' => 'rbac-auth-item/index',
        ],
        'file' => [
            'class' => common\modules\file\Module::class,
        ],
        'system' => [
            'class' => common\modules\system\Module::class,
        ],
        'translation' => [
            'class' => common\modules\translation\Module::class,
        ],
//        'queuemanager' => [
//            'class' => common\modules\queuemanager\QueueManager::class
//        ],
//        'stat' => [
//            'class' => common\modules\stat\Module::class,
//            'yandexMetrika' => [ // false by default
//                'id' => 13788753,
//                'params' => [
//                    'clickmap' => true,
//                    'trackLinks' => true,
//                    'accurateTrackBounce' => true,
//                    'webvisor' => true
//                ]
//            ],
//            'googleAnalytics' => [ // false by default
//                'id' => 'UA-114443409-2',
//            ],
//            'ownStat' => true, //false by default
//            'ownStatCookieId' => 'yii2_counter_id', // 'yii2_counter_id' default
//            'onlyGuestUsers' => true, // true default
//            'countBot' => false, // false default
//            'appId' => ['app-frontend'], // by default count visits only from Frontend App (in backend app we dont need it)
//            'blackIpList' => [], // ['127.0.0.1'] by default
//
//            // размещаем нашу админ панель на backend с проверкой доступа или ролями (здесь используется dektrium/user)
//            'controllerMap' => [
//                'dashboard' => [
//                    'class' => 'backend\modules\stat\controllers\DashboardController',
//                    'as access' => [
//                        'class' => \yii\filters\AccessControl::class,
//                        'rules' => [
//                            [
//                                'allow' => true,
//                                'roles' => ['@'],
//                                'matchCallback' => function () {
//                                    return Yii::$app->user->identity->getIsAdmin();
//                                },
//                            ],
//                        ],
//                    ],
//                ],
//            ]
//        ],
//        'crm' => [
//            'class' => common\modules\crm\Module::class,
//            'controllerNamespace' => 'common\modules\crm\controllers\backend'
//        ],
        'prpart'=> [
            'class' => 'common\modules\prpart\Module',
            'controllerNamespace' => 'common\modules\prpart\controllers\backend'
        ],
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],

//        'modulemanager' => [
//            'class' => common\modules\modulemanager\Module::class,
//        ],
//        'zadarma' => [
//            'class' => common\modules\zadarma\Zadarma::class,
//        ],
        'blog' => [
            'class' => common\modules\blog\Module::class,
            'controllerNamespace' => 'common\modules\blog\controllers\backend'
        ],
//        'tunel' => [
//            'class' => 'common\modules\tunel\Module',
//        ],
        'bot' => [
            'class' => common\modules\bot\BotModule::class,

        ],
    ],
//    'as globalAccess' => [
//        'class' => common\behaviors\GlobalAccessBehavior::class,
//        'rules' => [
//            [
//                'controllers' => ['sign-in'],
//                'allow' => true,
//                'roles' => ['?'],
//                'actions' => ['login'],
//            ],
//            [
//                'controllers' => ['sign-in'],
//                'allow' => true,
//                'roles' => ['@'],
//                'actions' => ['logout'],
//            ],
//            [
//                'controllers' => ['site'],
//                'allow' => true,
//                'roles' => ['?', '@'],
//                'actions' => ['error'],
//            ],
//
//            [
//                'controllers' => ['debug/default'],
//                'allow' => true,
//                'roles' => ['?'],
//            ],
//

//            [
//                'allow' => true,
//                'roles' => ['manager', 'administrator'],
//            ],
//        ],
//    ],
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            'crud' => [
                'class' => yii\gii\generators\crud\Generator::class,
                'templates' => [
                    'yii2-starter-kit' => Yii::getAlias('@backend/views/_gii/templates'),
                ],
                'template' => 'yii2-starter-kit',
                'messageCategory' => 'backend',
            ],
        ],
    ];
}

return $config;
