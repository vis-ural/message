<?php

use yii\db\Migration;

/**
 * Class m190430_122835_init_rbac_tables
 */
class m190430_122835_init_rbac_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $res = \Yii::$app->db->createCommand("
-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.26-0ubuntu0.18.04.1 - (Ubuntu)
-- Операционная система:         Linux
-- HeidiSQL Версия:              9.5.0.5280
-- --------------------------------------------------------

    /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
    /*!40101 SET NAMES utf8 */;
    /*!50503 SET NAMES utf8mb4 */;
    /*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
    /*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица newinfomarket.rbac_auth_assignment
DROP TABLE IF EXISTS `rbac_auth_assignment`;
CREATE TABLE IF NOT EXISTS `rbac_auth_assignment` (
`item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
`user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
`created_at` int(11) DEFAULT NULL,
PRIMARY KEY (`item_name`,`user_id`),
CONSTRAINT `rbac_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы newinfomarket.rbac_auth_assignment: ~7 rows (приблизительно)
DELETE FROM `rbac_auth_assignment`;
    /*!40000 ALTER TABLE `rbac_auth_assignment` DISABLE KEYS */;
INSERT INTO `rbac_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrator', '1', 1551608167),
('manager', '1', 1551608167),
('manager', '2', 1531822221),
('translator', '1', 1551608167),
('translator', '4', 1549122970),
('user', '1', 1551608167),
('user', '3', 1548761905);
    /*!40000 ALTER TABLE `rbac_auth_assignment` ENABLE KEYS */;

-- Дамп структуры для таблица newinfomarket.rbac_auth_item
DROP TABLE IF EXISTS `rbac_auth_item`;
CREATE TABLE IF NOT EXISTS `rbac_auth_item` (
`name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
`type` smallint(6) NOT NULL,
`description` text COLLATE utf8_unicode_ci,
`rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
`data` blob,
`created_at` int(11) DEFAULT NULL,
`updated_at` int(11) DEFAULT NULL,
PRIMARY KEY (`name`),
KEY `rule_name` (`rule_name`),
KEY `idx-auth_item-type` (`type`),
CONSTRAINT `rbac_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `rbac_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы newinfomarket.rbac_auth_item: ~22 rows (приблизительно)
DELETE FROM `rbac_auth_item`;
    /*!40000 ALTER TABLE `rbac_auth_item` DISABLE KEYS */;
INSERT INTO `rbac_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrator', 1, '', NULL, NULL, 1531822221, 1551720028),
('blog-module', 2, 'Модуль блога', NULL, NULL, 1548759140, 1548761512),
('content-module', 2, 'Модуль контента', NULL, NULL, 1548761621, 1548761632),
('content/category/index', 2, 'Список категорий новостей', NULL, NULL, 1548762424, 1548762424),
('crm-module', 2, 'Модуль CRM', NULL, NULL, 1549378584, 1549378584),
('debug', 2, 'debug', NULL, NULL, 1549632547, 1549632547),
('editOwnModel', 2, 'Редактирование своей модели', 'ownModelRule', NULL, 1531822221, 1548761580),
('file-module', 2, 'Модуль файлов', NULL, NULL, 1548764282, 1548764425),
('integration-module', 2, 'Модуль интеграции', NULL, NULL, 1549553745, 1549553745),
('loginToBackend', 2, 'Админ панель', NULL, NULL, 1531822221, 1548761595),
('manager', 1, '', NULL, NULL, 1531822221, 1548761888),
('miniland-module', 2, 'Модуль минилендингов', NULL, NULL, 1551720011, 1551720011),
('modulemanager-module', 2, 'Модуль управления модулями', NULL, NULL, 1549205212, 1549205212),
('permit-module', 2, 'Модуль доступы', NULL, NULL, 1548760429, 1548761563),
('queuemanager-module', 2, 'Модуль очередей', NULL, NULL, 1548627570, 1548761550),
('stat-module', 2, 'Модуль аналитики', NULL, NULL, 1548761846, 1548761846),
('system-module', 2, 'Модуль системный', NULL, NULL, 1548761817, 1548761817),
('translation-module', 2, 'Модуль переводов', NULL, NULL, 1548764324, 1548764324),
('translator', 1, 'Переводчик', NULL, NULL, 1549122715, 1549123004),
('user', 1, NULL, NULL, NULL, 1531822221, 1531822221),
('user/sign-in/login-by-pass', 2, 'Вход по логину', NULL, NULL, 1549122852, 1549122852),
('zadarma-module', 2, 'Модуль телефонии', NULL, NULL, 1548761862, 1548761862);
    /*!40000 ALTER TABLE `rbac_auth_item` ENABLE KEYS */;

-- Дамп структуры для таблица newinfomarket.rbac_auth_item_child
DROP TABLE IF EXISTS `rbac_auth_item_child`;
CREATE TABLE IF NOT EXISTS `rbac_auth_item_child` (
`parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
`child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`parent`,`child`),
KEY `child` (`child`),
CONSTRAINT `rbac_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT `rbac_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `rbac_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы newinfomarket.rbac_auth_item_child: ~26 rows (приблизительно)
DELETE FROM `rbac_auth_item_child`;
    /*!40000 ALTER TABLE `rbac_auth_item_child` DISABLE KEYS */;
INSERT INTO `rbac_auth_item_child` (`parent`, `child`) VALUES
('administrator', 'blog-module'),
('administrator', 'content-module'),
('manager', 'content-module'),
('administrator', 'content/category/index'),
 
('administrator', 'debug'),
('administrator', 'editOwnModel'),
('manager', 'editOwnModel'),
('user', 'editOwnModel'), 
('administrator', 'loginToBackend'),
('manager', 'loginToBackend'),
('translator', 'loginToBackend'),
('administrator', 'manager'),    
('administrator', 'system-module'),
('administrator', 'translation-module'),
('translator', 'translation-module'),
('manager', 'user'),
('administrator', 'user/sign-in/login-by-pass') ;
    /*!40000 ALTER TABLE `rbac_auth_item_child` ENABLE KEYS */;

-- Дамп структуры для таблица newinfomarket.rbac_auth_rule
DROP TABLE IF EXISTS `rbac_auth_rule`;
CREATE TABLE IF NOT EXISTS `rbac_auth_rule` (
`name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
`data` blob,
`created_at` int(11) DEFAULT NULL,
`updated_at` int(11) DEFAULT NULL,
PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы newinfomarket.rbac_auth_rule: ~0 rows (приблизительно)
DELETE FROM `rbac_auth_rule`;
    /*!40000 ALTER TABLE `rbac_auth_rule` DISABLE KEYS */;
    /*!40000 ALTER TABLE `rbac_auth_rule` ENABLE KEYS */;

    /*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
    /*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
    /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

  
        ");
        $res->query();
    }


    public function safeDown()
    {
        $this->dropTable('rbac_auth_rule');
        $this->dropTable('rbac_auth_item_child');
        $this->dropTable('rbac_auth_item');
        $this->dropTable('rbac_auth_assignment');
    }




}
