<?php

use yii\db\Migration;

/**
 * Class m190430_123603_system_log
 */
class m190430_123603_system_log extends Migration
{
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
        CREATE TABLE `system_log` (
    `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`level` INT(11) NULL DEFAULT NULL,
	`category` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`log_time` DOUBLE NULL DEFAULT NULL,
	`prefix` TEXT NULL COLLATE 'utf8_unicode_ci',
	`message` TEXT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`id`),
	INDEX `idx_log_level` (`level`),
	INDEX `idx_log_category` (`category`)
)
COLLATE='utf8_unicode_ci'
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
        $this->dropTable('system_log');
    }
}
