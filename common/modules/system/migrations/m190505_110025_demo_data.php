<?php

use yii\db\Migration;

/**
 * Class m190505_110025_demo_data
 */
class m190505_110025_demo_data extends Migration
{

    public function safeUp()
    {
        $this->batchInsert(
            '{{%system_timeline_event}}',
            ['application', 'category', 'event', 'data', 'created_at'],
            [
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'webmaster', 'user_id' => 1, 'created_at' => time()]), time()],
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'manager', 'user_id' => 2, 'created_at' => time()]), time()],
                ['frontend', 'user', 'signup', json_encode(['public_identity' => 'user', 'user_id' => 3, 'created_at' => time()]), time()]
            ]
        );
        $this->insert('{{%system_key_storage_item}}', [
            'key' => 'backend.theme-skin',
            'value' => 'skin-blue',
            'comment' => 'skin-blue, skin-black, skin-purple, skin-green, skin-red, skin-yellow'
        ]);

        $this->insert('{{%system_key_storage_item}}', [
            'key' => 'backend.layout-fixed',
            'value' => 0
        ]);

        $this->insert('{{%system_key_storage_item}}', [
            'key' => 'backend.layout-boxed',
            'value' => 0
        ]);

        $this->insert('{{%system_key_storage_item}}', [
            'key' => 'backend.layout-collapsed-sidebar',
            'value' => 0
        ]);

        $this->insert('{{%system_key_storage_item}}', [
            'key' => 'frontend.maintenance',
            'value' => 'disabled',
            'comment' => 'Set it to "enabled" to turn on maintenance mode'
        ]);
    }


    public function safeDown()
    {
        $this->delete('{{%system_timeline_event}}', [
            'application' => 'frontend',
            'category' => 'user',
            'event' => 'signup'
        ]);

        $this->delete('{{%system_key_storage_item}}', [
            'key' => 'frontend.maintenance'
        ]);

        $this->delete('{{%system_key_storage_item}}', [
            'key' => [
                'backend.theme-skin',
                'backend.layout-fixed',
                'backend.layout-boxed',
                'backend.layout-collapsed-sidebar',
            ],
        ]);
    }


}
