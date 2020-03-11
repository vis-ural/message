<?php

use yii\db\Migration;

/**
 * Class m190430_083055_key_storage
 */
class m190430_083055_key_storage extends Migration
{
    /**
     * @return bool|void
     */
    public function safeUp()
    {
        $this->createTable('{{%system_key_storage_item}}', [
            'key' => $this->string(128)->notNull(),
            'value' => $this->text()->notNull(),
            'comment' => $this->text(),
            'updated_at' => $this->integer(),
            'created_at' => $this->integer()
        ]);

        $this->addPrimaryKey('pk_key_storage_item_key', '{{%system_key_storage_item}}', 'key');
        $this->createIndex('idx_key_storage_item_key', '{{%system_key_storage_item}}', 'key', true);
    }

    /**
     * @return bool|void
     */
    public function down()
    {

        $this->dropTable('{{%system_key_storage_item}}');

    }
}
