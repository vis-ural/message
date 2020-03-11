<?php
use himiklab\sitemap\behaviors\SitemapBehavior;
$config = [
    'homeUrl' => Yii::getAlias('@frontendUrl'),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',
    'bootstrap' => ['maintenance'],
    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
        'request' => [
            'cookieValidationKey' => env('FRONTEND_COOKIE_VALIDATION_KEY')
        ],
        'user' => [
            'class' => yii\web\User::class,
            'identityClass' => 'common\models\User',
            'loginUrl' => ['/user/sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin' => common\behaviors\LoginTimestampBehavior::class
        ],
        'maintenance' => [
            'class' => common\components\maintenance\Maintenance::class,
            'enabled' => function ($app) {
                if (env('APP_MAINTENANCE') === '1') {
                    return true;
                }
                return $app->keyStorage->get('frontend.maintenance') === 'enabled';
            }
        ],
        'authClientCollection' => [
            'class' => yii\authclient\Collection::class,
            'clients' => [
                'github' => [
                    'class' => yii\authclient\clients\GitHub::class,
                    'clientId' => env('GITHUB_CLIENT_ID'),
                    'clientSecret' => env('GITHUB_CLIENT_SECRET')
                ],
                'facebook' => [
                    'class' => yii\authclient\clients\Facebook::class,
                    'clientId' => env('FACEBOOK_CLIENT_ID'),
                    'clientSecret' => env('FACEBOOK_CLIENT_SECRET'),
                    'scope' => 'email,public_profile',
                    'attributeNames' => [
                        'name',
                        'email',
                        'first_name',
                        'last_name',
                    ]
                ]
            ]
        ],

        'assetManager' => [

//            'bundles' => [
//                'yii\web\JqueryAsset' => [
//                    'sourcePath' => null,
//                    'basePath' => '@webroot',
//                    'baseUrl' => '@web',
//                    'js' => [
//                        'lib/jquery-3.3.1.min.js',
//                    ]
//                ],
//            ],
        ],
        'view' => [
            'theme' => [
                'basePath' => '@frontend/themes/demo',
                'baseUrl' => '@web/themes/demo',
                'pathMap' => [
                    '@frontend/views' => '@frontend/themes/demo',
                ],
            ],
        ],





    ],
    'modules' => [
        'user' => [
            'class' => frontend\modules\user\Module::class,
            'shouldBeActivated' => false,
            'enableLoginByPass' => false,
        ],
        'content' => [
            'class' => common\modules\content\Module::class,
            'controllerNamespace' =>  'common\modules\content\controllers\frontend'
        ],
        'sitemap' => [
            'class' => himiklab\sitemap\Sitemap::class,
            'models' => [
                [
                    'class' => \common\modules\blog\models\BlogCatalog::class,
                    'behaviors' => [
                        'sitemap' => [
                            'class' => SitemapBehavior::class,
                            'scope' => function ($model) {
                                /** @var \yii\db\ActiveQuery $model */
                                $model->select([ 'id','surname','created_at']);
                                $model->andWhere(['status' => 1]);
                            },
                            'dataClosure' => function ($model) {
                                /** @var self $model */


                                $model = \common\modules\blog\models\BlogCatalog::findOne($model->id);

                                return [
                                    'loc' => Yii::$app->urlManager->createUrl('/blog/'.$model->getPath($model->id)),
                                    'lastmod' => strtotime($model->created_at),
                                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                                    'priority' => 0.8
                                ];
                            }
                        ],
                    ],
                ],
                [
                    'class' => \common\modules\blog\models\BlogPost::class,
                    'behaviors' => [
                        'sitemap' => [
                            'class' => SitemapBehavior::class,
                            'scope' => function ($model) {
                                /** @var \yii\db\ActiveQuery $model */
                                $model->select([ 'id','surname','created_at','catalog_id']);
                                $model->andWhere(['status' => 1]);
                            },
                            'dataClosure' => function ($model) {
                                /** @var self $model */
                                $model = \common\modules\blog\models\BlogPost::findOne($model->id);
                                return [
                                    'loc' => Yii::$app->urlManager->createUrl('/blog/'.$model->catalog->getPath($model->catalog_id).'/'.$model->surname),
                                    'lastmod' => strtotime($model->created_at),
                                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                                    'priority' => 0.8
                                ];
                            }
                        ],
                    ],
                ],

            ],
            'urls'=> [
                // your additional urls
                [
                    'loc' => '/',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                    'articles' => [
                        'publication'   => [
                            'name'          => 'Digital-агенство "Инфомаркет"',
                            'language'      => 'ru',
                        ],
                        'access'            => 'Подписаться',
                        'publication_date'  => 'YYYY-MM-DDThh:mm:ssTZD',
                        'title'             => 'Веб-агенство полного цикла',
                        'keywords'          => 'чатботы, маркетинг, платформа автоматизации, тунели продаж, мессенджер-маркетинг',
                        'stock_tickers'     => 'NASDAQ:A, NASDAQ:B',
                    ],
                    'images' => [
                        [
                            'loc'           => 'https://infomarketstudio.ru/img/logo.png',
                            'caption'       => 'Digital-агенство "Инфомаркет"',
                            'geo_location'  => 'Moscow, Russia',
                            'title'         => 'Веб-агенство Инфомаркет',
                            'license'       => 'https://infomarketstudio.ru/condition',
                        ],
                    ],
                ],
                [
                    'loc' => '/about',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/partners',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/about/vakansia',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/site-visitka',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/site-corporate',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/landing-page',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/internet-magazin',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/razrabotka-chatbot',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/tunel-prodaj',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/kompleksnoe-prodvizhenie',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/digital-strategiya',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/kontekstnaya-reklama',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/targetirovannaya-reklama',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/seo-prodvizhenie',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/email-marketing',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/napolnenie-sajta',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/podderjka-sajta',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/audit-sajta',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/optimizacia-sajta',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/uslugi/razvitie-proektov',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],



                [
                    'loc' => '/portfolio',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/blog',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/news',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
                [
                    'loc' => '/contact',
                    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                ],
            ],
            'enableGzip' => true, // default is false
            'cacheExpire' => 1, // 1 second. Default is 24 hours
        ],
        'yandexTurbo' => [
            'class' => \common\components\yandex_turbo\YandexTurbo::class,
            'title' => 'Digital-агенство "Инфомаркет"', // not required, default Application name
            'link' => 'https://infomarketstudio.ru', // not required, default Url::home
            'description' => 'Сложный цифровой многоцелевой продукт РозторБот позволяет его владельцу контактировать с пользователями по всему миру за плату.', // default empty
            //'language' => 'en-us', // not required, default Application language
            'elements' => [

                [
                    'class' => \common\modules\blog\models\BlogPost::class,
                    'behaviors' => [
                        'yandexTurbo' => [
                            'class' => \common\components\yandex_turbo\YandexTurboBehavior::class,
                            'scope' => function (\yii\db\ActiveQuery $query) {
                                $query->select([ 'id', 'content','surname','title','created_at','published_at','created_by','base_url','path']);
                                $query->where(['status'=>1]);
                                $query->orderBy(['created_at' => SORT_DESC]);
                            },
                            'dataClosure' => function (\common\modules\blog\models\BlogPost $model) {

                                $model = \common\modules\blog\models\BlogPost::findOne($model->id);

                                return [
                                    'title' => htmlspecialchars($model->title),
                                    'link' => env('FRONTEND_HOST_INFO').htmlspecialchars(Yii::$app->urlManager->createUrl('/blog/'.$model->catalog->getPath($model->catalog->id).'/'.$model->surname)),
                                    'description' => htmlspecialchars($model->content),
                                    'content' => Yii::$app->getModule('yandexTurbo')->generateContent($model ),
                                    'pubDate' => htmlspecialchars((new \DateTime(date('Y-m-d',$model->created_at)))->format(\DateTime::RFC822)),
                                ];


                            }
                        ],
                    ],
                ],
                // or configure static content
//                [
//                    'title' => 'О проекте',
//                    'link' => ['/about'],
//                    'description' => 'Страница о компании Розторбот',
//                    'content' => 'Группа Компаний «РОЗТОР» приветствует Вас! <br>
//                                Нашей основной деятельностью является комплексная поставка ХозОхотПромТоваров от различных производителей по конкурентным ценам. В настоящий момент насчитывается более 25000 наименований предлагаемого нами товара.
//                                <br>В Группу Компаний «РОЗТОР» входит более 100 партнеров по всей Республике Саха (Якутия), что обеспечивает спрос в данном направлении и дает потребителям самое нужное и лучшее.
//                                <br>Мы постоянно развиваемся, повышаем свой профессионализм, устанавливаем и укрепляем взаимовыгодные отношения.
//                                <br>С уважением, ГК «РОЗТОР»',
//                    'pubDate' => (new \DateTime('2018-01-26 18:57:00'))->format(\DateTime::RFC822)
//                ],
//                [
//                    'title' => 'Контакты',
//                    'link' => ['/contact'],
//                    'description' => 'Страница о компании Розторбот',
//                    'content' => 'Тел: 84951331649 <br>С уважением, ГК «РОЗТОР»',
//                    'pubDate' => (new \DateTime('2018-01-26 18:57:00'))->format(\DateTime::RFC822)
//                ],
            ],
            'cacheExpire' => 1, // 1 second. Default is 15 minutes
        ],
        'prpart' => [
            'class' => common\modules\prpart\Module::class,
            'controllerNamespace' => 'common\modules\prpart\controllers\frontend'
        ],
        'chat' => [
            'class' => common\modules\chat\ChatModule::class,
            'controllerNamespace' =>  'common\modules\chat\controllers\frontend'
        ],
        'blog' => [
            'class' => common\modules\blog\Module::class,
            'controllerNamespace' => 'common\modules\blog\controllers\frontend'
        ],
        'crm' => [
            'class' => 'common\modules\crm\Module',
            'controllerNamespace' =>  'common\modules\crm\controllers\frontend'
        ],
    ]

];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            'crud' => [
                'class' => yii\gii\generators\crud\Generator::class,
                'messageCategory' => 'frontend'
            ]
        ]
    ];
}

return $config;
