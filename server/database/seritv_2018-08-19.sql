# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.19)
# Database: seritv
# Generation Time: 2018-08-19 11:09:10 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table crews
# ------------------------------------------------------------

DROP TABLE IF EXISTS `crews`;

CREATE TABLE `crews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `crews` WRITE;
/*!40000 ALTER TABLE `crews` DISABLE KEYS */;

INSERT INTO `crews` (`id`, `name`, `description`, `images`, `seri`, `birthdate`, `created_at`, `updated_at`)
VALUES
	(1,'Chris Pat','This is Chris.','','','2017-12-04','2017-12-04 09:13:22','2017-12-04 09:13:22'),
	(2,'numba 2','numba 2','','','2017-12-04','2017-12-04 10:38:16','2017-12-04 10:38:16'),
	(3,'numb 3','numba 3','','','2017-12-04','2017-12-04 10:38:30','2017-12-04 10:38:30'),
	(4,'numba 4','numba 4','','','2017-12-04','2017-12-04 10:38:57','2017-12-04 10:38:57'),
	(5,'numba 5','numba 5','','','2017-12-04','2017-12-04 10:39:17','2017-12-04 10:39:17'),
	(6,'numba 6','numba 6','','','2017-12-04','2017-12-04 10:39:30','2017-12-04 10:39:30'),
	(7,'numba 7','numba 7','','','2017-12-04','2017-12-04 10:39:47','2017-12-04 10:39:47'),
	(8,'numba 8','numba 8 ','','','2017-12-04','2017-12-04 10:40:03','2017-12-04 10:40:03');

/*!40000 ALTER TABLE `crews` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table genres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genres`;

CREATE TABLE `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;

INSERT INTO `genres` (`id`, `genre`, `created_at`, `updated_at`)
VALUES
	(1,'Action','2017-12-01 15:31:24','2017-12-01 15:31:24'),
	(2,'Horror','2017-12-01 12:24:43','2017-12-01 12:27:05'),
	(3,'Thriller','2017-12-01 12:24:59','2017-12-01 12:27:05'),
	(4,'fdesasdf','2017-12-01 12:28:01','2017-12-01 12:29:34'),
	(5,'sdfa','2017-12-01 12:28:11','2017-12-01 14:35:44');

/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(21,'2014_10_12_000000_create_users_table',1),
	(22,'2014_10_12_100000_create_password_resets_table',1),
	(23,'2017_12_01_083025_create_permissions_table',1),
	(24,'2017_12_01_092239_create_seris_table',1),
	(25,'2017_12_01_095043_create_seri_genres_table',1),
	(26,'2017_12_01_095120_create_seri_crews_table',1),
	(27,'2017_12_01_095126_create_seri_types_table',1),
	(28,'2017_12_04_102847_create_seri_genres_xrefs_table',2),
	(29,'2017_12_04_104627_create_seri_genres_xrefs_table',3),
	(30,'2017_12_04_105931_create_seri_genres_xrefs_table',4);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_group` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table seri_cast
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seri_cast`;

CREATE TABLE `seri_cast` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seri_id` int(11) unsigned NOT NULL,
  `seri_crew_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `seri_cast` WRITE;
/*!40000 ALTER TABLE `seri_cast` DISABLE KEYS */;

INSERT INTO `seri_cast` (`id`, `seri_id`, `seri_crew_id`)
VALUES
	(1,1,1),
	(2,1,5),
	(3,1,8),
	(4,14,2),
	(5,14,3),
	(6,14,4),
	(7,14,5),
	(8,14,6),
	(9,14,7),
	(10,14,8);

/*!40000 ALTER TABLE `seri_cast` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table seri_directors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seri_directors`;

CREATE TABLE `seri_directors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seri_id` int(11) unsigned NOT NULL,
  `seri_crew_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `seri_directors` WRITE;
/*!40000 ALTER TABLE `seri_directors` DISABLE KEYS */;

INSERT INTO `seri_directors` (`id`, `seri_id`, `seri_crew_id`)
VALUES
	(1,1,7),
	(2,14,2);

/*!40000 ALTER TABLE `seri_directors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table seri_genre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seri_genre`;

CREATE TABLE `seri_genre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seri_id` int(11) NOT NULL,
  `seri_genres_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `seri_genre` WRITE;
/*!40000 ALTER TABLE `seri_genre` DISABLE KEYS */;

INSERT INTO `seri_genre` (`id`, `seri_id`, `seri_genres_id`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,11,3),
	(4,11,4),
	(5,11,5),
	(6,12,3),
	(7,12,4),
	(8,12,5),
	(9,14,3),
	(10,14,4),
	(11,14,5);

/*!40000 ALTER TABLE `seri_genre` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table seri_stars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seri_stars`;

CREATE TABLE `seri_stars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seri_id` int(11) unsigned NOT NULL,
  `seri_crew_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `seri_stars` WRITE;
/*!40000 ALTER TABLE `seri_stars` DISABLE KEYS */;

INSERT INTO `seri_stars` (`id`, `seri_id`, `seri_crew_id`)
VALUES
	(1,1,1),
	(2,1,5),
	(3,13,1),
	(4,13,2),
	(5,13,3),
	(6,14,7),
	(7,14,8);

/*!40000 ALTER TABLE `seri_stars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table seri_writers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seri_writers`;

CREATE TABLE `seri_writers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seri_id` int(11) unsigned NOT NULL,
  `seri_crew_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `seri_writers` WRITE;
/*!40000 ALTER TABLE `seri_writers` DISABLE KEYS */;

INSERT INTO `seri_writers` (`id`, `seri_id`, `seri_crew_id`)
VALUES
	(1,1,2),
	(2,14,2),
	(3,14,3);

/*!40000 ALTER TABLE `seri_writers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table seris
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seris`;

CREATE TABLE `seris` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `release_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `seris` WRITE;
/*!40000 ALTER TABLE `seris` DISABLE KEYS */;

INSERT INTO `seris` (`id`, `image`, `images`, `name`, `type`, `short_description`, `description`, `release_date`, `created_at`, `updated_at`)
VALUES
	(1,'pexels-photo(1).jpg','pexels-photo(1).jpg,test.png','Avengers',1,NULL,'Dit is een test','2017-12-01','2017-12-01 15:39:21','2017-12-01 15:39:21'),
	(2,NULL,NULL,'Fairy tail',1,NULL,'This is the best anime with a lot of episodes by far.','2018-01-02','2018-01-02 13:47:58','2018-01-02 13:47:58'),
	(3,NULL,NULL,'Fairy tail',1,NULL,'This is the best anime with a lot of episodes by far.','2018-01-02','2018-01-02 13:48:47','2018-01-02 13:48:47'),
	(4,NULL,NULL,'Fairy tail',1,NULL,'This is the best anime with a lot of episodes by far.','2018-01-02','2018-01-02 13:50:24','2018-01-02 13:50:24'),
	(5,NULL,NULL,'Fairy tail',1,NULL,'This is the best anime with a lot of episodes by far.','2018-01-02','2018-01-02 13:51:41','2018-01-02 13:51:41'),
	(6,NULL,NULL,'Fairy tail',1,NULL,'This is the best anime with a lot of episodes by far.','2018-01-02','2018-01-02 13:51:42','2018-01-02 13:51:42'),
	(7,NULL,NULL,'Fairy tail',1,NULL,'This is the best anime with a lot of episodes by far.','2018-01-02','2018-01-02 13:51:49','2018-01-02 13:51:49'),
	(8,NULL,NULL,'Fairy tail',1,NULL,'This is the best anime with a lot of episodes by far.','2018-01-02','2018-01-02 13:51:50','2018-01-02 13:51:50'),
	(9,NULL,NULL,'Fairy tail',1,NULL,'This is the best anime with a lot of episodes by far.','2018-01-02','2018-01-02 13:53:00','2018-01-02 13:53:00'),
	(10,NULL,NULL,'Fairy tail',1,NULL,'This is the best anime with a lot of episodes by far.','2018-01-02','2018-01-02 13:57:03','2018-01-02 13:57:03'),
	(11,NULL,NULL,'Fairy tail',1,NULL,'This is the best anime with a lot of episodes by far.','2018-01-02','2018-01-02 13:57:08','2018-01-02 13:57:08'),
	(12,NULL,NULL,'Fairy tail',1,NULL,'This is the best anime with a lot of episodes by far.','2018-01-02','2018-01-02 13:57:22','2018-01-02 13:57:22'),
	(13,NULL,NULL,'Fariy',2,NULL,'fdsaf','2018-01-02','2018-01-02 14:00:11','2018-01-02 14:00:11'),
	(14,NULL,NULL,'test',1,NULL,'asdf','2018-01-02','2018-01-02 14:20:53','2018-01-02 14:20:53');

/*!40000 ALTER TABLE `seris` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`)
VALUES
	(1,'Animated','2017-12-01 11:05:15','2017-12-06 07:56:45'),
	(2,'Film','2017-12-01 11:05:09','2017-12-01 14:35:52');

/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `permission`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Kevin Ernst','kevin@laveto.nl','$2y$10$OJkluhzbUSzFM6j9jdjgleKInXv60yCeBgPqOjzcB8cxFqGxdHdlG',0,'1e7xDFdO77Rmj8ZF74A3c7WazC72BbcWzVscIoFQGnBH0P6wE6ai6B1sbXFY','2017-12-01 09:59:50','2017-12-01 09:59:50');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
