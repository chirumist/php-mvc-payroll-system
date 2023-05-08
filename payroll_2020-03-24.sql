# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.17)
# Database: payroll
# Generation Time: 2023-03-24 15:02:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table activity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activity`;

CREATE TABLE `activity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_users_id_fk` (`user_id`),
  CONSTRAINT `activity_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;

INSERT INTO `activity` (`id`, `type`, `created_at`, `user_id`)
VALUES
	(1,'login','2023-04-01 02:22:43',13);

/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table department
# ------------------------------------------------------------

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;

INSERT INTO `department` (`id`, `name`)
VALUES
	(1,'Account Department'),
	(2,'Marketing Department'),
	(3,'Web Department'),
	(4,'Android Department'),
	(5,'Support Department'),
	(6,'Billing Department'),
	(7,'Project Department'),
	(8,'Sales Department'),
	(9,'Keychain Department'),
	(10,'Event Department'),
	(11,'asdasdasdasdasdqwertyu');

/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employee
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `address` longtext,
  `gender` varchar(55) DEFAULT NULL,
  `basic_salary` float DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `account_no` bigint(20) DEFAULT NULL,
  `contact_no` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_department_id_fk` (`dept_id`),
  KEY `employee_users_id_fk` (`user_id`),
  CONSTRAINT `employee_department_id_fk` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employee_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;

INSERT INTO `employee` (`id`, `dept_id`, `user_id`, `last_name`, `middle_name`, `first_name`, `address`, `gender`, `basic_salary`, `dob`, `account_no`, `contact_no`)
VALUES
	(1,NULL,4,'mistry','dilip','chirag','avenger mention','male',30000,'1997-06-1',196192349,9820398458),
  (2,NULL,5,'kadam','bhura bhai','sanket','gokuldham','male',50000,'1994-04-05',168129350,7620398458);

/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table leave
# ------------------------------------------------------------

DROP TABLE IF EXISTS `leave`;

CREATE TABLE `leave` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) unsigned DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `comment` longtext,
  PRIMARY KEY (`id`),
  KEY `leave_employee_id_fk` (`emp_id`),
  CONSTRAINT `leave_employee_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table salary
# ------------------------------------------------------------

DROP TABLE IF EXISTS `salary`;

CREATE TABLE `salary` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) unsigned DEFAULT NULL,
  `leave_days` int(11) DEFAULT NULL,
  `hr` float DEFAULT NULL,
  `da` float DEFAULT NULL,
  `expense` json DEFAULT NULL,
  `total` float DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `salary_employee_id_fk` (`emp_id`),
  CONSTRAINT `salary_employee_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT 'employee',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`)
VALUES
-- $2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe - 12345678
	(1,'admin','admin@demo.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','admin'),
	(2,'user','user@demo.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
  (3,'agent','agent@demo.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
  (4,'chirag','chirag@demo.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
  (5,'sanket','sanket@demo.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
