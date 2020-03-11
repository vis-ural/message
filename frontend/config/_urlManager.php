<?php
return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'suffix' => '/',
    'rules' => [
        //Users
        '/profile'=>'/user/default/index',
        '/register'=>'/user/sign-in/signup',

        '/login'=>'/user/sign-in/login',
        '/logout'=>'/user/sign-in/logout',

        '/user/sign-in/oauth'=>'/user/sign-in/oauth',
        '/user/sign-in/request-password-reset' => '/user/sign-in/request-password-reset',
        '/user/default/index'=>'/user/default/index',
        '/user/default/avatar-upload'=>'/user/default/avatar-upload',

        ['pattern' => 'about', 'route' => 'site/about'],
        ['pattern' => 'features', 'route' => 'site/features'],
        ['pattern' => 'pricing', 'route' => 'site/pricing'],
        ['pattern' => 'privacy-policy', 'route' => 'site/privacy-policy'],



        'chat' =>'chat/default/index',

        // Pages

       // ['pattern' => 'page/<slug:>', 'route' => 'content/page/view'],

        ['pattern' => 'about/<slug:vakansia>', 'route' => 'content/page/view'],

        'uslugi' =>'site/service',

        ['pattern' => 'uslugi/<slug:site-visitka|site-corporate|landing-page|site-promo|internet-magazin>', 'route' => 'content/page/view'],
        ['pattern' => 'uslugi/<slug:kompleksnoe-prodvizhenie|digital-strategiya|kontekstnaya-reklama|targetirovannaya-reklama|prodvizhenie-v-socsetyah|razrabotka-chatbot>', 'route' => 'content/page/view'],
        ['pattern' => 'uslugi/<slug:napolnenie-sajta|podderjka-sajta|audit-sajta|optimizacia-sajta|razvitie-proektov>', 'route' => 'content/page/view'],
        ['pattern' => 'uslugi/<slug:tunel-prodaj|seo-prodvizhenie|email-marketing>', 'route' => 'content/page/view'],


        ['pattern' => 'portfolio', 'route' => 'prpart/cases/index'],
        ['pattern' => 'portfolio/<slug: website|chatbot|reklama>', 'route' => 'content/page/view'],
        ['pattern' => 'portfolio/<id:\d+>/<slug:[\w_-]+>', 'route' => 'prpart/cases/view'],

        // Блог
        //      'blog/<category:.+>/page/<page:\w+>'=>'blog/default/category',
        //      'blog/<category:[\w_\/-]+>/sort/<sort:[\w\.]+>/page/<page:\d+>/per-page/<per-page:\d+>'=>'blog/default/category',
        //      'blog/<category:[\w_\/-]+>/sort/<sort:[\w\.]+>/page/<page:\d+>'=>'blog/default/category',
        //      'blog/<category:[\w_\/-]+>/sort/<sort:[\w\.]+>'=>'blog/default/category',
        'blog/<category:[\w_\/-]+>/page/<page:\w+>/per-page/<per-page:\w+>'=>'blog/default/category',
        'blog/<category:[\w_\/-]+>/page/<page:\w+>'=>'blog/default/category',
        'blog/<category:[\w_\/-]+>'=>'blog/default/category',
        'blog'=>'blog/default/index',


        '/terms-of-use' => '/site/terms-of-use',

        '/politica' => '/site/politica',


        ['pattern' => 'news', 'route' => 'content/article/index'],
        ['pattern' => 'contact', 'route' => 'site/contact'],



        // landing
        'chatbot' => 'site/chatbot',
        'webdev' => 'site/webdev',
        'analytics' => 'site/analytics',
        'analytic' => 'site/analytic',
        'messenger' => 'site/messenger',


        // Контакты
        'contact'=>'site/contact',
        'site/success'=>'site/success',
        'site/captcha'=>'site/captcha',


        '/telegram/default/init-chat'=>'/telegram/default/init-chat',
        '/telegram/chat/get-all-messages'=>'/telegram/chat/get-all-messages',
        '/telegram/chat/send-msg'=>'/telegram/chat/send-msg',
        '/telegram/chat/get-last-messages'=>'/telegram/chat/get-last-messages',
        '/telegram/default/hook'=>'/telegram/default/hook',
        '/telegram/default/destroy-chat'=>'/telegram/default/destroy-chat',

        // Api
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/article', 'only' => ['index', 'view', 'options']],
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/user', 'only' => ['index', 'view', 'options']],



        ['pattern' => 'sitemap', 'route' => 'sitemap/default/index', 'suffix' => '.xml'],
        ['pattern' => 'yandex_turbo', 'route' => 'yandexTurbo/yandex-turbo/index', 'suffix' => '.xml'],




    ]
];
