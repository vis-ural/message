<?php
$config = [
    'name' => 'ViziOn',
    'vendorPath' => __DIR__ . '/../../vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'sourceLanguage' => 'en-US',
    'language' => 'en-US',
    'bootstrap' => ['log'],//,'queue','common\modules\shop\modules\order\Bootstrap'
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'modules' => [

    ],
    'components' => [
        'amqp' => [
            'class' => \devmustafa\amqp\components\Amqp::class,
            'host' =>       getenv('HOST_RABBITMQ'),
            'port' =>       getenv('PORT_RABBITMQ'),
            'user' =>       getenv('USER_RABBITMQ'),
            'password' =>   getenv('PASSWORD_RABBITMQ'),
            'vhost' =>      getenv('VHOST_RABBITMQ'),

        ],
        'ajax' => ['class' => common\modules\integration\components\ajax\AsyncResponse::class],
        'authManager' => [
            'class' => yii\rbac\DbManager::class,
            'itemTable' => '{{%rbac_auth_item}}',
            'itemChildTable' => '{{%rbac_auth_item_child}}',
            'assignmentTable' => '{{%rbac_auth_assignment}}',
            'ruleTable' => '{{%rbac_auth_rule}}'
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6Lfe8YwUAAAAAI4Q63KZT3ZPyVPEWRC-4UOldjwU',
            'secret' => '6Lfe8YwUAAAAAE9BBiHRu8ieHDNxyXG9BXsMyX4v',
        ],

        'commandBus' => [
            'class' => '\trntv\tactician\Tactician',
            'commandNameExtractor' => '\League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor',
            'methodNameInflector' => '\League\Tactician\Handler\MethodNameInflector\HandleInflector',
            'commandToHandlerMap' => [
                'common\modules\queuemanager\commands\command\SendEmailCommand' => '\common\modules\queuemanager\commands\handler\SendEmailHandler',
                'common\modules\queuemanager\commands\command\SendSMSCommand' => '\common\modules\queuemanager\commands\handler\SendSMSHandler',
                'common\modules\queuemanager\commands\command\SendSlackCommand' => '\common\modules\queuemanager\commands\handler\SendSlackHandler',
                'common\modules\queuemanager\commands\command\SendCommand' => '\common\modules\queuemanager\commands\handler\SendHandler',
                'common\modules\queuemanager\commands\command\SendSocketCommand' => '\common\modules\queuemanager\commands\handler\SendSocketHandler',
                'common\modules\queuemanager\commands\command\AddToTimelineCommand' => '\common\modules\queuemanager\commands\handler\AddToTimelineHandler',
                'common\modules\queuemanager\commands\command\AddLeadCommand' => '\common\modules\queuemanager\commands\handler\AddLeadHandler',
            ]
        ],
        'formatter' => [ //for the showing of date datetime
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'CNY',
        ],
        'glide' => [
            'class' => trntv\glide\components\Glide::class,
            'sourcePath' => '@storage/web/source',
            'cachePath' => '@storage/cache',
            'urlManager' => 'urlManagerStorage',
            'maxImageSize' => env('GLIDE_MAX_IMAGE_SIZE'),
            'signKey' => env('GLIDE_SIGN_KEY')
        ],
        'mailer' => [
            'class' => \yii\swiftmailer\Mailer::className(),
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => getenv('ADMIN_EMAIL_HOST'),
                'username' =>  getenv('ADMIN_EMAIL'),
                'password' =>  getenv('ADMIN_EMAIL_PASS'),
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'db' => [
            'class' => yii\db\Connection::class,
            'dsn' => env('DB_DSN'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'tablePrefix' => env('DB_TABLE_PREFIX'),
            'charset' => env('DB_CHARSET', 'utf8'),
            'enableSchemaCache' => YII_ENV_PROD,
        ],
        'log' => [
            'traceLevel' =>  0,
            'flushInterval' => 1,
            'targets' => [
                'db' => [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'except' => ['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                    'prefix' => function () {
                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                        return sprintf('[%s][%s]', Yii::$app->id, $url);
                    },
                    'logVars' => [],
                    'logTable' => '{{%system_log}}'
                ],
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'exportInterval' => 1,
                    'categories' => ['chat'],
                    'levels' => ['error', 'warning','info'],
                    'logVars' => [],
                    'logFile' => '@frontend/runtime/logs/log.log',
                ],
                'email' => [
                     'class' => yii\log\EmailTarget::class,
                     'except' => ['yii\web\HttpException:*'],
                    'categories' => ['chat'],
                     'levels' => ['error', 'warning','info'],
                     'message' => ['from' => env('ROBOT_EMAIL'), 'to' => env('ADMIN_EMAIL')]
                ],


            ],
        ],
        'i18n' => [
            'translations' => [
                    'frontend' => [
                        'class' => yii\i18n\PhpMessageSource::class,
                        'basePath' => '@common/messages',
                    ],
                     'backend' => [
                      'class' => yii\i18n\PhpMessageSource::class,
                      'basePath' => '@common/messages',
                      'fileMap' => [
                          'common' => 'common.php',
                          'backend' => 'backend.php',
                          'frontend' => 'frontend.php',
                      ],
                      'on missingTranslation' => [common\modules\translation\Module::class, 'missingTranslation']
                  ],
                  /* Uncomment this code to use DbMessageSource*/
                 '*'=> [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceMessageTable'=>'{{%i18n_source_message}}',
                    'messageTable'=>'{{%i18n_message}}',
                    'enableCaching' => YII_ENV_DEV,
                    'cachingDuration' => 3600,
                    'on missingTranslation' => [common\modules\translation\Module::class, 'missingTranslation']
                ],

            ],
        ],
        'fileStorage' => [
            'class' => trntv\filekit\Storage::class,
            'baseUrl' => '@storageUrl/source',
            'filesystem'=> function() {
                $adapter = new \League\Flysystem\Adapter\Local(dirname(dirname(__DIR__)).'/storage/web/source');
                return new League\Flysystem\Filesystem($adapter);
            },
        ],
        'keyStorage' => [
            'class' => common\modules\system\components\keyStorage\KeyStorage::class
        ],
        'urlManagerBackend' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => env('BACKEND_HOST_INFO'),
                'baseUrl' => env('BACKEND_BASE_URL'),
            ],
            require(Yii::getAlias('@backend/config/_urlManager.php'))
        ),
        'urlManagerFrontend' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => env('FRONTEND_HOST_INFO'),
                'baseUrl' => env('FRONTEND_BASE_URL'),
            ],
            require(Yii::getAlias('@frontend/config/_urlManager.php'))
        ),
        'urlManagerStorage' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => env('STORAGE_HOST_INFO'),
                'baseUrl' => env('STORAGE_BASE_URL'),
            ],
            require(Yii::getAlias('@storage/config/_urlManager.php'))
        ),
        'queue' => [
            'class' => \yii\queue\redis\Queue::class,
            'redis' => 'redis', // connection ID
            'channel' => 'queue', // queue channel
        ],


    ],
    'params' => [
        'adminEmail' => env('ADMIN_EMAIL'),
        'robotEmail' => env('ROBOT_EMAIL'),
        'theme'=>'demo',
        'availableLocales' => [
            'en-US' => 'English (US)',
            'ru-RU' => 'Русский (РФ)',
            'uk-UA' => 'Українська (Україна)',
            'es' => 'Español',
            'vi' => 'Tiếng Việt',
            'zh-CN' => '简体中文',
            'pl-PL' => 'Polski (PL)',
        ],
        'blogTitle' => 'Infomarket',
        'blogTitleSeo' => 'Simple Blog based by Infomarket',
        'blogFooter' => 'Copyright &copy; ' . date('Y') . ' by rlogachev on Yii2. All Rights Reserved.',
        'blogPostPageCount' => '10',
        'blogLinks' => [
            'Infomarket' => 'https://infomarketstudio.ru',

        ],
        'blogUploadPath' => 'upload/', //default to frontend/web/upload
    ],

];

if (YII_ENV_PROD) {
    $config['components']['log']['targets']['email'] = [
        'class' => yii\log\EmailTarget::class,
        'except' => ['yii\web\HttpException:*'],
        'levels' => ['error', 'warning'],
        'message' => ['from' => env('ROBOT_EMAIL'), 'to' => env('ADMIN_EMAIL')]
    ];
}

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            'job' => [
                'class' => \yii\queue\gii\Generator::class,
            ],
        ],
    ];

    $config['components']['cache'] = [
        'class' => yii\caching\DummyCache::class
    ];

}

return $config;
