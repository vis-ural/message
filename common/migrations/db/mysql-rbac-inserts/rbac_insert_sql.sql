-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.25-0ubuntu0.18.04.2 - (Ubuntu)
-- Операционная система:         Linux
-- HeidiSQL Версия:              9.5.0.5280
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп данных таблицы shablon.rbac_auth_assignment: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `rbac_auth_assignment` DISABLE KEYS */;
INSERT INTO `rbac_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('administrator', '1', 1531822221),
	('manager', '2', 1531822221),
	('translator', '4', 1549122970),
	('user', '3', 1548761905);
/*!40000 ALTER TABLE `rbac_auth_assignment` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;


-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.25-0ubuntu0.18.04.2 - (Ubuntu)
-- Операционная система:         Linux
-- HeidiSQL Версия:              9.5.0.5280
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп данных таблицы shablon.rbac_auth_item: ~18 rows (приблизительно)
/*!40000 ALTER TABLE `rbac_auth_item` DISABLE KEYS */;
INSERT INTO `rbac_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('administrator', 1, '', NULL, NULL, 1531822221, 1549205222),
	('blog-module', 2, 'Модуль блога', NULL, NULL, 1548759140, 1548761512),
	('content-module', 2, 'Модуль контента', NULL, NULL, 1548761621, 1548761632),
	('content/category/index', 2, 'Список категорий новостей', NULL, NULL, 1548762424, 1548762424),
	('editOwnModel', 2, 'Редактирование своей модели', 'ownModelRule', NULL, 1531822221, 1548761580),
	('file-module', 2, 'Модуль файлов', NULL, NULL, 1548764282, 1548764425),
	('loginToBackend', 2, 'Админ панель', NULL, NULL, 1531822221, 1548761595),
	('manager', 1, '', NULL, NULL, 1531822221, 1548761888),
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.25-0ubuntu0.18.04.2 - (Ubuntu)
-- Операционная система:         Linux
-- HeidiSQL Версия:              9.5.0.5280
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп данных таблицы shablon.rbac_auth_item_child: ~22 rows (приблизительно)
/*!40000 ALTER TABLE `rbac_auth_item_child` DISABLE KEYS */;
INSERT INTO `rbac_auth_item_child` (`parent`, `child`) VALUES
	('administrator', 'blog-module'),
	('administrator', 'content-module'),
	('manager', 'content-module'),
	('administrator', 'content/category/index'),
	('administrator', 'editOwnModel'),
	('manager', 'editOwnModel'),
	('user', 'editOwnModel'),
	('administrator', 'file-module'),
	('administrator', 'loginToBackend'),
	('manager', 'loginToBackend'),
	('translator', 'loginToBackend'),
	('administrator', 'manager'),
	('administrator', 'modulemanager-module'),
	('administrator', 'permit-module'),
	('administrator', 'queuemanager-module'),
	('administrator', 'stat-module'),
	('administrator', 'system-module'),
	('administrator', 'translation-module'),
	('translator', 'translation-module'),
	('manager', 'user'),
	('administrator', 'user/sign-in/login-by-pass'),
	('administrator', 'zadarma-module');
/*!40000 ALTER TABLE `rbac_auth_item_child` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.25-0ubuntu0.18.04.2 - (Ubuntu)
-- Операционная система:         Linux
-- HeidiSQL Версия:              9.5.0.5280
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп данных таблицы shablon.rbac_auth_rule: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `rbac_auth_rule` DISABLE KEYS */;
INSERT INTO `rbac_auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
	('ownModelRule', _binary 0x4F3A32393A22636F6D6D6F6E5C726261635C72756C655C4F776E4D6F64656C52756C65223A333A7B733A343A226E616D65223B733A31323A226F776E4D6F64656C52756C65223B733A393A22637265617465644174223B693A313533313832323232313B733A393A22757064617465644174223B693A313533313832323232313B7D, 1531822221, 1531822221);
/*!40000 ALTER TABLE `rbac_auth_rule` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
