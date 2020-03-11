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







    ]
];
