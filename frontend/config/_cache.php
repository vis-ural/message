<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */

$cache = [
    'class' => 'yii\caching\MemCache',
    'useMemcached' => false,
    'servers' => [
        [
            'host' => 'localhost',
            'port' => 11211,
            'weight' => 40,
        ]
    ],
];

//if (env('YII_DEBUG')) {
//    $cache = [
//        'class' => 'yii\caching\DummyCache'
//    ];
//}

return $cache;
