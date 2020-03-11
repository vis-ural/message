<?php

use yii\db\Migration;

/**
 * Class m190529_125009_queue_task
 */
class m190529_125009_queue_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
        CREATE TABLE `queue_task` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(250) NULL DEFAULT NULL,
            `status` INT(11) NULL DEFAULT NULL,
            `job_name` TEXT NULL,
            `command` TEXT NOT NULL,
            `order_id` INT(11) NULL DEFAULT NULL,
            `subcatid` INT(11) NULL DEFAULT NULL,
            `key` VARCHAR(250) NOT NULL,
            `pid` INT(11) NOT NULL,
            `created` DATETIME NULL DEFAULT NULL,
            `updated` DATETIME NULL DEFAULT NULL,
            `queue` VARCHAR(50) NULL DEFAULT NULL,
            `exchange` VARCHAR(50) NULL DEFAULT NULL,
            `tag` VARCHAR(50) NULL DEFAULT NULL,
            `data_send` DATETIME NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            INDEX `Индекс 2` (`key`)
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
        $this->dropTable('queue_task' );
    }

}
