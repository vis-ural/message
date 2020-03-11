<?php

use yii\db\Migration;

class m150414_195800_timeline_event extends Migration
{
    /**
     * @return bool|void
     */
    public function safeUp()
    {
        $this->createTable('{{%system_timeline_event}}', [
            'id' => $this->primaryKey(),
            'application' => $this->string(64)->notNull(),
            'category' => $this->string(64)->notNull(),
            'event' => $this->string(64)->notNull(),
            'data' => $this->text(),
            'created_at' => $this->integer()->notNull()
        ]);

        $this->createIndex('idx_created_at', '{{%system_timeline_event}}', 'created_at');


    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropTable('{{%timeline_event}}');
    }
}
