<?php

use yii\db\Migration;

/**
 * Class m190718_152117_alter_user_widget_id
 */
class m190718_152117_alter_user_widget_id extends Migration
{
    public function safeUp()
    {
        \Yii::$app->db->createCommand("
                    
            ALTER TABLE `base_user`
            ADD COLUMN `widget_id` INT NULL AFTER `board_id`;
        ")->query();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('base_user','widget_id');
    }



}
