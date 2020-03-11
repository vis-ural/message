<?php

use yii\db\Migration;

/**
 * Class m190529_125301_message_plan
 */
class m190529_125301_message_plan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
        CREATE TABLE `queue_message_plan` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(1024) NOT NULL COMMENT 'Название плана',
            `category` VARCHAR(1024) NOT NULL,
            `event_id` INT(11) NOT NULL COMMENT 'событие ',
            `time` INT(11) NOT NULL COMMENT 'время после события',
            `view` VARCHAR(50) NOT NULL,
            `script` TEXT NULL,
            `type` VARCHAR(50) NULL DEFAULT NULL COMMENT 'phone sms email',
            `status` SMALLINT(6) NULL DEFAULT '1',
            `desc` TEXT NULL,
            `template_id` INT(11) NULL DEFAULT NULL,
            `order` INT(11) NULL DEFAULT NULL,
            PRIMARY KEY (`id`)
        )
        COLLATE='utf8_general_ci'
        ENGINE=InnoDB 
        ;
 ");
        $res->query();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('queue_message_plan' );
    }


}
