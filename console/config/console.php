<?php
return [
    'id' => 'console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'console\controllers',
    'bootstrap' => [
        'log',
        //'queuemanager'
    ],
    'controllerMap' => [
        'command-bus' => [
            'class' => trntv\bus\console\BackgroundBusController::class,
        ],
        'message' => [
            'class' => console\controllers\ExtendedMessageController::class
        ],
        'migrate-base' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/migrations/db',
            'migrationTable' => '{{%system_base_migration}}'
        ],
        'migrate-blog' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/blog/migrations',
            'migrationTable' => '{{%system_blog_migration}}'
        ],
        'migrate-file' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/file/migrations',
            'migrationTable' => '{{%system_file_migration}}'
        ],
        'migrate-rbac' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/rbac/migrations',
            'migrationTable' => '{{%system_rbac_migration}}'
        ],
        'migrate-system' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/system/migrations',
            'migrationTable' => '{{%system_system_migration}}'
        ],
        'migrate-translation' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/translation/migrations',
            'migrationTable' => '{{%system_translation_migration}}'
        ],
        'migrate-widget' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/widget/migrations',
            'migrationTable' => '{{%system_widget_migration}}'
        ],
        'migrate-content' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/content/migrations',
            'migrationTable' => '{{%system_content_migration}}'
        ],
        'migrate-prpart' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/prpart/migrations',
            'migrationTable' => '{{%system_prpart_migration}}'
        ],
        'migrate-chat' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/chat/migrations',
            'migrationTable' => '{{%system_chat_migration}}'
        ],
        'migrate-queue' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/queuemanager/migrations',
            'migrationTable' => '{{%system_queuemanager_migration}}'
        ],
        'migrate-bot' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/bot/migrations',
            'migrationTable' => '{{%system_bot_migration}}'
        ],
        'migrate-integration' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/integration/migrations',
            'migrationTable' => '{{%system_integration_migration}}'
        ],
        'migrate-crm' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/crm/migrations',
            'migrationTable' => '{{%system_crm_migration}}'
        ],
    ],
    'modules'=>[

//        'queuemanager' => [
//            'class' => \common\modules\queuemanager\QueueManager::class,
//
//        ],

    ]
];
