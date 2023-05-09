# ************************************************************
# Sequel Ace SQL dump
# Version 20046
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.0.19)
# Database: payroll
# Generation Time: 2023-05-09 18:49:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table activity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activity`;

CREATE TABLE `activity` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_users_id_fk` (`user_id`),
  CONSTRAINT `activity_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;

INSERT INTO `activity` (`id`, `type`, `created_at`, `user_id`)
VALUES
	(1,'login','2023-04-01 02:22:43',13),
	(2,'login','2023-05-02 05:17:06',1),
	(3,'login','2023-05-08 03:17:25',1);

/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table department
# ------------------------------------------------------------

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
	(9,'MobileDepartment'),
	(10,'Event Department');

/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employee
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `dept_id` int unsigned DEFAULT NULL,
  `user_id` int unsigned NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `address` longtext,
  `gender` varchar(55) DEFAULT NULL,
  `basic_salary` float DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `account_no` bigint DEFAULT NULL,
  `contact_no` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_department_id_fk` (`dept_id`),
  KEY `employee_users_id_fk` (`user_id`),
  CONSTRAINT `employee_department_id_fk` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employee_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;

INSERT INTO `employee` (`id`, `dept_id`, `user_id`, `last_name`, `middle_name`, `first_name`, `address`, `gender`, `basic_salary`, `dob`, `account_no`, `contact_no`)
VALUES
	(1,1,4,'mistry','dilip','chirag','avenger mention','male',30000,'1997-06-01',196192349,9820398458),
	(2,2,5,'kadam','bhura bhai','sanket','gokuldham','male',50000,'1994-04-05',168129350,7620398458),
	(3,2,6,'zuhyvilaxo','genekosavu','xativ','Est proident aliqui','male',4500,'1985-06-01',96,71),
	(4,3,7,'sozofojog','qalope','tapuhybu','Excepturi dolor quib','female',9400,'2015-04-26',80,59),
	(5,1,8,'konybuc','nysaromexi','bijycelak','Enim dolore quos num','female',9000,'2004-03-13',59,85),
	(6,5,9,'mihygige','gowyxipupa','kohum','Ex tempora dolor non','male',8700,'2014-10-28',40,56),
	(7,4,10,'vahacef','pyqyjemeve','tevufajub','Officiis dolore sit','male',8600,'1977-11-25',89,33),
	(8,4,11,'wewalinuxo','xutoni','redoda','Magnam ut ex omnis m','female',9700,'1978-06-14',2,94),
	(9,3,12,'jaroqop','syfub','vytig','Suscipit alias et bl','male',15000,'2002-07-03',47,28),
	(10,3,13,'pafeneky','nezesim','gerype','Ipsum cumque eiusmod','female',70000,'2009-08-22',94,15),
	(11,4,14,'vylyhefu','vyzopiqe','kyxys','Et dolore quas saepe','female',60000,'1980-08-13',86,43),
	(12,5,15,'wolivom','hesywucoro','manel','Porro culpa invento','male',29000,'2004-09-05',70,71),
	(13,6,16,'sinir','nulygeseto','tozohanoju','Lorem et saepe expli','female',9040,'1986-03-13',83,54),
	(14,6,17,'pywof','pycyzepuhy','baroge','Laborum quia qui ut ','female',21000,'2016-08-22',25,25),
	(15,7,18,'xatupypumu','zyroporesu','dumenyjas','Ex quia a voluptatem','male',40000,'2005-06-16',18,10),
	(16,8,19,'cyfoke','pyzyjafi','cokyzebiha','Consequatur qui sit','male',19000,'2019-01-12',79,55),
	(17,8,20,'magujyw','libetusa','cafuqupiz','Esse expedita qui v','male',910000,'1983-02-08',80,50),
	(18,10,21,'penilymyc','jimoc','zaxowubu','Aute voluptas ad sim','male',45000,'2005-04-03',20,9),
	(19,10,22,'pifytoco','kerimypeb','hutet','Repudiandae atque ni','male',44000,'2018-02-13',87,25),
	(20,9,23,'kojobac','qovob','zadyby','Laborum Ad qui veni','male',99000,'1976-06-01',45,66),
	(21,9,24,'motoje','mojazaty','jonino','Veritatis dolores et','female',68000,'2008-05-19',13,41),
	(22,7,25,'qybazazeri','moharo','nojugymoqi','Autem nostrum rerum ','male',7000,'1995-06-24',60,84),
	(23,8,26,'hoqydo','debure','bojogofuw','Voluptate natus veri','male',30000,'2021-04-02',93,45),
	(24,9,27,'ninodehala','huwyruzup','jevavyxu','Ad non aut tempor qu','male',18000,'2005-04-27',38,29),
	(25,10,28,'ryjisivuga','guxenahuny','lunypyv','In pariatur Consect','male',12000,'2007-02-18',27,12);

/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table leave
# ------------------------------------------------------------

DROP TABLE IF EXISTS `leave`;

CREATE TABLE `leave` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int unsigned DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `comment` longtext,
  `total_days` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leave_employee_id_fk` (`emp_id`),
  CONSTRAINT `leave_employee_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `leave` WRITE;
/*!40000 ALTER TABLE `leave` DISABLE KEYS */;

INSERT INTO `leave` (`id`, `emp_id`, `start_date`, `end_date`, `comment`, `total_days`, `status`)
VALUES
	(1,1,'2023-02-01','2023-02-01','Sick Leave',1,1),
	(2,3,'2023-05-09','2023-05-12','I am going for check up',4,1);

/*!40000 ALTER TABLE `leave` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table salary
# ------------------------------------------------------------

DROP TABLE IF EXISTS `salary`;

CREATE TABLE `salary` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int unsigned DEFAULT NULL,
  `leave_days` int DEFAULT NULL,
  `hr` float DEFAULT NULL,
  `da` float DEFAULT NULL,
  `expense` json DEFAULT NULL,
  `total` float DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `salary_employee_id_fk` (`emp_id`),
  CONSTRAINT `salary_employee_id_fk` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `salary` WRITE;
/*!40000 ALTER TABLE `salary` DISABLE KEYS */;

INSERT INTO `salary` (`id`, `emp_id`, `leave_days`, `hr`, `da`, `expense`, `total`, `issue_date`)
VALUES
	(2,1,1,NULL,NULL,'{\"fule\": \"100\", \"tea_lunch\": \"100\", \"travelling\": \"100\"}',29550,'2023-05-09'),
	(3,2,NULL,NULL,NULL,'{\"fule\": \"3000\", \"tea_lunch\": \"1000\", \"travelling\": \"1000\"}',50000,'2023-05-09'),
	(4,3,4,NULL,NULL,'{\"fule\": \"100\", \"tea_lunch\": \"100\", \"travelling\": \"100\"}',1800,'2023-05-09');

/*!40000 ALTER TABLE `salary` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT 'employee',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`)
VALUES
	(1,'admin','admin@demo.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','admin'),
	(2,'user','user@demo.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(3,'agent','agent@demo.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(4,'chirag','chirag@demo.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(5,'sanket','sanket@demo.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(6,'walucu','qixahoqiji@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(7,'byxyvotuwi','qudovog@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(8,'zadyci','gojohuj@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(9,'bixewuju','tufysola@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(10,'xejizikamu','wiqiraxyla@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(11,'zesypoce','zivytyn@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(12,'xiqypuwe','zehamav@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(13,'kazukixyme','kodu@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(14,'xydipu','daha@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(15,'somijymoli','xubejokyk@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(16,'gawenany','regesityf@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(17,'nizoto','lugi@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(18,'mycizunep','gezoboduqo@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(19,'kogygy','wobafeq@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(20,'nuniwegi','qoboxe@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(21,'zoqakosori','wusikywo@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(22,'wybejifuwe','mawekor@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(23,'tuxamyq','gina@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(24,'sucynyfo','davupaxa@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(25,'wadek','xykuxalogy@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(26,'gigefafu','lamyqyd@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(27,'renymu','daxexu@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee'),
	(28,'xixigit','quhetoset@mailinator.com','$2y$10$PVhORvHg1sf0ex50Ge0peOunUY5/.UWRIne1b25cmH8LSrd/xRMfe','employee');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
