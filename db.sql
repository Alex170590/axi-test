-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.29 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.0.0.5958
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных axi-test
CREATE DATABASE IF NOT EXISTS `axi-test` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `axi-test`;

-- Дамп структуры для таблица axi-test.axi_questionnaires
CREATE TABLE IF NOT EXISTS `axi_questionnaires` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_birth` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_qualities` text COLLATE utf8mb4_unicode_ci,
  `skills` longtext COLLATE utf8mb4_unicode_ci,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы axi-test.axi_questionnaires: ~3 rows (приблизительно)
DELETE FROM `axi_questionnaires`;
/*!40000 ALTER TABLE `axi_questionnaires` DISABLE KEYS */;
INSERT INTO `axi_questionnaires` (`id`, `gender`, `surname`, `name`, `middle`, `data_birth`, `color`, `personal_qualities`, `skills`, `date`) VALUES
	(2, 'мужской', '12312321', '', '', '3213213', 'Бордовый', '', '["усидчивость","опрятность","самообучаемость"]', '2020-10-01 20:12:37'),
	(3, 'мужской', '12312321', '', '', '3213213', 'Бордовый', '', '["усидчивость","опрятность","самообучаемость"]', '2020-10-01 20:22:21'),
	(4, 'мужской', '12312321', '', '', '3213213', 'Бордовый', '', '["усидчивость","опрятность","самообучаемость"]', '2020-10-01 20:25:39');
/*!40000 ALTER TABLE `axi_questionnaires` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
