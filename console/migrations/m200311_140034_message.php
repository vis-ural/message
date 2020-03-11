<?php

use yii\db\Migration;

/**
 * Class m200311_140034_message
 */
class m200311_140034_message extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(240),
            'text' => $this->text()->notNull(),
            'category' => $this->json()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'logged_at' => $this->integer()
        ]);

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(250),
            'text' => $this->text()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'logged_at' => $this->integer()
        ]);


    }

    /**
     * @return bool|void
     */
    public function safeDown()
    {

        $this->dropTable('{{%message}}');
        $this->dropTable('{{%category}}');

    }
}
