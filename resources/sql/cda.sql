-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: cda
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary table structure for view `all_plots_status_report_view`
--

DROP TABLE IF EXISTS `all_plots_status_report_view`;
/*!50001 DROP VIEW IF EXISTS `all_plots_status_report_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `all_plots_status_report_view` (
  `areaid` tinyint NOT NULL,
  `areaname` tinyint NOT NULL,
  `areatypeid` tinyint NOT NULL,
  `areatypename` tinyint NOT NULL,
  `blockid` tinyint NOT NULL,
  `blockname` tinyint NOT NULL,
  `plotid` tinyint NOT NULL,
  `plotno` tinyint NOT NULL,
  `size` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `price` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `area_assignment`
--

DROP TABLE IF EXISTS `area_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_assignment` (
  `areas_type_id` int(10) unsigned NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`area_id`,`areas_type_id`),
  KEY `area_assignment_areas_type_id_foreign` (`areas_type_id`),
  CONSTRAINT `area_assignment_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`area_id`) ON DELETE CASCADE,
  CONSTRAINT `area_assignment_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `area_types` (`areas_type_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_assignment`
--

LOCK TABLES `area_assignment` WRITE;
/*!40000 ALTER TABLE `area_assignment` DISABLE KEYS */;
INSERT INTO `area_assignment` VALUES (1,1,'5500'),(2,1,'3500'),(3,1,'6300'),(4,1,'5700'),(5,1,'4900'),(6,1,'4700'),(1,2,'4500'),(2,2,'3700'),(3,2,'5000'),(4,2,'3000'),(5,2,'5200'),(6,2,'4800');
/*!40000 ALTER TABLE `area_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area_image`
--

DROP TABLE IF EXISTS `area_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(10) unsigned NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `area_image_area_id_foreign` (`area_id`),
  CONSTRAINT `area_image_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`area_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_image`
--

LOCK TABLES `area_image` WRITE;
/*!40000 ALTER TABLE `area_image` DISABLE KEYS */;
INSERT INTO `area_image` VALUES (1,1,'1474435246 - image.jpg','2016-09-21 05:20:46','2016-09-21 05:20:46'),(2,2,'1474438309 - PJ000310_map_1.jpg','2016-09-21 06:11:49','2016-09-21 06:11:49'),(3,3,'1474438325 - map.jpg','2016-09-21 06:12:05','2016-09-21 06:12:05'),(4,4,'1474438336 - image.jpg','2016-09-21 06:12:17','2016-09-21 06:12:17'),(5,5,'1474438353 - 13533_Image.jpg','2016-09-21 06:12:33','2016-09-21 06:12:33');
/*!40000 ALTER TABLE `area_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area_types`
--

DROP TABLE IF EXISTS `area_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_types` (
  `areas_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`areas_type_id`),
  UNIQUE KEY `area_types_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_types`
--

LOCK TABLES `area_types` WRITE;
/*!40000 ALTER TABLE `area_types` DISABLE KEYS */;
INSERT INTO `area_types` VALUES (1,'Makazi','2016-09-20 15:55:36','2016-09-20 15:55:36'),(2,'Taasisi','2016-09-21 06:06:48','2016-09-21 06:06:48'),(3,'Biashara','2016-09-21 06:06:55','2016-09-21 06:06:55'),(4,'Makazi na Biashara','2016-09-21 06:07:05','2016-09-21 06:07:05'),(5,'Pastoralism','2016-09-21 06:07:16','2016-09-21 06:07:16'),(6,'Open Spaces','2016-09-21 06:07:24','2016-09-21 06:07:24');
/*!40000 ALTER TABLE `area_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `area_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`area_id`),
  UNIQUE KEY `areas_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'Kisasa West','2016-09-20 15:53:59','2016-09-21 05:29:18'),(2,'Mtumba','2016-09-21 06:06:07','2016-09-21 06:06:07'),(3,'Nkuhungu','2016-09-21 06:06:16','2016-09-21 06:06:16'),(4,'Area D','2016-09-21 06:06:26','2016-09-21 06:06:26'),(5,'Majengo','2016-09-21 06:06:38','2016-09-21 06:06:38');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `block_assignment`
--

DROP TABLE IF EXISTS `block_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `block_assignment` (
  `area_id` int(10) unsigned NOT NULL,
  `areas_type_id` int(10) unsigned NOT NULL,
  `block_id` int(10) unsigned NOT NULL,
  `file_name` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`area_id`,`areas_type_id`,`block_id`),
  KEY `block_assignment_areas_type_id_foreign` (`areas_type_id`),
  KEY `block_assignment_block_id_foreign` (`block_id`),
  CONSTRAINT `block_assignment_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `area_assignment` (`area_id`) ON DELETE CASCADE,
  CONSTRAINT `block_assignment_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `area_assignment` (`areas_type_id`) ON DELETE CASCADE,
  CONSTRAINT `block_assignment_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `blocks` (`block_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `block_assignment`
--

LOCK TABLES `block_assignment` WRITE;
/*!40000 ALTER TABLE `block_assignment` DISABLE KEYS */;
INSERT INTO `block_assignment` VALUES (1,1,1,'1474435275 - JiHZoyePnloDqJSRIvb8location-map.jpg'),(1,1,2,'1474438393 - JiHZoyePnloDqJSRIvb8location-map.jpg'),(1,3,1,'1474438375 - 13533_Image.jpg'),(1,3,2,'1474438413 - map.jpg'),(1,3,3,'1474438423 - image.jpg'),(1,3,4,'1474438437 - 13533_Image.jpg'),(2,2,1,'1474438476 - map.jpg'),(2,3,1,'1474438452 - map.jpg'),(2,6,1,'1474438500 - image.jpg');
/*!40000 ALTER TABLE `block_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blocks`
--

DROP TABLE IF EXISTS `blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocks` (
  `block_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`block_id`),
  UNIQUE KEY `blocks_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocks`
--

LOCK TABLES `blocks` WRITE;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` VALUES (1,'A','2016-09-20 15:56:41','2016-09-20 15:56:41'),(2,'B','2016-09-21 06:07:34','2016-09-21 06:07:34'),(3,'C','2016-09-21 06:07:37','2016-09-21 06:07:37'),(4,'D','2016-09-21 06:07:40','2016-09-21 06:07:40');
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_08_15_172631_create_plots_table',1),('2016_08_15_203738_create_areas_table',1),('2016_08_16_003009_create_area_types_table',1),('2016_08_16_003218_create_blocks_table',1),('2016_08_16_135243_area_assignment',1),('2016_08_16_135253_block_assignment',1),('2016_08_16_135304_plot_assignment',1),('2016_08_19_170045_create_user_details_table',1),('2016_08_19_171102_create_user_credentials_table',1),('2016_08_19_172025_create_plot_reservation_table',1),('2016_08_27_091528_create_plot_status_table',1),('2016_08_27_092156_create_plot_transactions_table',1),('2016_08_27_145945_create_transaction_numbers_table',1),('2016_08_28_080050_create_user_credentials_trigger',1),('2016_09_01_151127_create_plot_reservation_view',1),('2016_09_05_083423_create_clears_out_plot_status_event',1),('2016_09_05_084626_create_update_plot_plot_assigment_trigger',1),('2016_09_05_084627_create_area_image',1),('2016_09_06_082951_create_plots_selection_main_view',1),('2016_09_10_063712_entrust_setup_tables',1),('2016_09_10_071747_create_all_plots_status_report_view_table',1),('2016_09_10_075127_create_reserved_plots_status_view_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'add-plots','Add Plots','User can add plots','2016-09-21 05:26:46','2016-09-21 05:37:47'),(2,'print-letters','print-letters','Registry can print letters','2016-09-23 11:20:52','2016-09-23 11:21:12');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plot_assignment`
--

DROP TABLE IF EXISTS `plot_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plot_assignment` (
  `area_id` int(10) unsigned NOT NULL,
  `areas_type_id` int(10) unsigned NOT NULL,
  `block_id` int(10) unsigned NOT NULL,
  `plot_id` int(10) unsigned NOT NULL,
  `size` double NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`area_id`,`areas_type_id`,`plot_id`,`block_id`),
  KEY `plot_assignment_areas_type_id_foreign` (`areas_type_id`),
  KEY `plot_assignment_block_id_foreign` (`block_id`),
  KEY `plot_assignment_plot_id_foreign` (`plot_id`),
  CONSTRAINT `plot_assignment_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `block_assignment` (`area_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_assignment_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `block_assignment` (`areas_type_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_assignment_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `block_assignment` (`block_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_assignment_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plots` (`plot_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plot_assignment`
--

LOCK TABLES `plot_assignment` WRITE;
/*!40000 ALTER TABLE `plot_assignment` DISABLE KEYS */;
INSERT INTO `plot_assignment` VALUES (1,1,1,1,572,0,0,NULL,NULL),(1,1,1,2,327,1,0,NULL,NULL),(1,1,1,3,475,0,0,NULL,NULL),(1,1,1,4,530,0,0,NULL,NULL),(1,1,1,5,380,0,0,NULL,NULL),(1,1,1,6,650,0,0,NULL,NULL),(1,1,1,7,430,0,0,NULL,NULL),(1,1,1,8,100,1,0,NULL,NULL),(1,1,1,9,150,0,0,NULL,NULL),(1,1,1,10,400,0,0,NULL,NULL),(2,2,1,1,572,1,0,NULL,NULL),(2,2,1,2,327,0,0,NULL,NULL),(2,2,1,3,475,0,0,NULL,NULL),(2,2,1,4,530,0,0,NULL,NULL),(2,2,1,5,380,0,0,NULL,NULL),(2,2,1,6,650,0,0,NULL,NULL),(2,2,1,7,430,0,0,NULL,NULL),(2,2,1,8,100,0,0,NULL,NULL),(2,2,1,9,150,0,0,NULL,NULL),(2,2,1,10,400,1,0,NULL,NULL),(2,3,1,1,572,0,0,NULL,NULL),(2,3,1,2,327,0,0,NULL,NULL),(2,3,1,3,475,0,0,NULL,NULL),(2,3,1,4,530,0,0,NULL,NULL),(2,3,1,5,380,0,0,NULL,NULL),(2,3,1,6,650,1,0,NULL,NULL),(2,3,1,7,430,0,0,NULL,NULL),(2,3,1,8,100,0,0,NULL,NULL),(2,3,1,9,150,0,0,NULL,NULL),(2,3,1,10,400,0,0,NULL,NULL);
/*!40000 ALTER TABLE `plot_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plot_reservation`
--

DROP TABLE IF EXISTS `plot_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plot_reservation` (
  `area_id` int(10) unsigned NOT NULL,
  `areas_type_id` int(10) unsigned NOT NULL,
  `block_id` int(10) unsigned NOT NULL,
  `plot_id` int(10) unsigned NOT NULL,
  `user_detail_id` int(10) unsigned NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`area_id`,`areas_type_id`,`plot_id`,`block_id`),
  KEY `plot_reservation_areas_type_id_foreign` (`areas_type_id`),
  KEY `plot_reservation_block_id_foreign` (`block_id`),
  KEY `plot_reservation_plot_id_foreign` (`plot_id`),
  KEY `plot_reservation_user_detail_id_foreign` (`user_detail_id`),
  CONSTRAINT `plot_reservation_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `plot_assignment` (`area_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_reservation_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `plot_assignment` (`areas_type_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_reservation_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `plot_assignment` (`block_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_reservation_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plot_assignment` (`plot_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_reservation_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`user_detail_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plot_reservation`
--

LOCK TABLES `plot_reservation` WRITE;
/*!40000 ALTER TABLE `plot_reservation` DISABLE KEYS */;
INSERT INTO `plot_reservation` VALUES (1,1,1,2,1,'2016-09-21 05:46:38','2016-09-21 05:45:37',1),(1,1,1,8,1,'2016-09-21 05:46:42','2016-09-21 05:45:43',1),(2,2,1,1,2,'2016-09-21 06:32:38','2016-09-21 06:29:33',1),(2,2,1,10,6,'2016-09-27 12:12:30','2016-09-27 07:12:30',0),(2,3,1,6,5,'2016-09-26 11:07:24','2016-09-26 11:06:15',1);
/*!40000 ALTER TABLE `plot_reservation` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER tr_plot_assignment_rollback BEFORE DELETE ON plot_reservation FOR EACH ROW
            BEGIN
                UPDATE plot_assignment SET plot_assignment.status = 0
                WHERE plot_assignment.area_id = OLD.area_id
                AND plot_assignment.areas_type_id = OLD.areas_type_id
                AND plot_assignment.block_id=OLD.block_id
                AND plot_assignment.plot_id=OLD.plot_id;
            END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary table structure for view `plot_reservation_view`
--

DROP TABLE IF EXISTS `plot_reservation_view`;
/*!50001 DROP VIEW IF EXISTS `plot_reservation_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `plot_reservation_view` (
  `plot_no` tinyint NOT NULL,
  `block` tinyint NOT NULL,
  `location` tinyint NOT NULL,
  `land_use` tinyint NOT NULL,
  `size` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `total_price` tinyint NOT NULL,
  `deadline` tinyint NOT NULL,
  `first_name` tinyint NOT NULL,
  `middle_name` tinyint NOT NULL,
  `last_name` tinyint NOT NULL,
  `address` tinyint NOT NULL,
  `region` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `user_credential_id` tinyint NOT NULL,
  `photo` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `plot_status`
--

DROP TABLE IF EXISTS `plot_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plot_status` (
  `area_id` int(10) unsigned NOT NULL,
  `areas_type_id` int(10) unsigned NOT NULL,
  `block_id` int(10) unsigned NOT NULL,
  `plot_id` int(10) unsigned NOT NULL,
  `balance` double NOT NULL,
  `user_detail_id` int(10) unsigned NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`area_id`,`areas_type_id`,`plot_id`,`block_id`),
  KEY `plot_status_areas_type_id_foreign` (`areas_type_id`),
  KEY `plot_status_block_id_foreign` (`block_id`),
  KEY `plot_status_plot_id_foreign` (`plot_id`),
  KEY `plot_status_user_detail_id_foreign` (`user_detail_id`),
  CONSTRAINT `plot_status_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `plot_assignment` (`area_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_status_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `plot_assignment` (`areas_type_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_status_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `plot_assignment` (`block_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_status_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plot_assignment` (`plot_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_status_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`user_detail_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plot_status`
--

LOCK TABLES `plot_status` WRITE;
/*!40000 ALTER TABLE `plot_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `plot_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plot_transactions`
--

DROP TABLE IF EXISTS `plot_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plot_transactions` (
  `area_id` int(10) unsigned NOT NULL,
  `areas_type_id` int(10) unsigned NOT NULL,
  `block_id` int(10) unsigned NOT NULL,
  `plot_id` int(10) unsigned NOT NULL,
  `transaction_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `user_detail_id` int(10) unsigned NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `plot_transactions_transaction_number_unique` (`transaction_number`),
  KEY `plot_transactions_area_id_foreign` (`area_id`),
  KEY `plot_transactions_areas_type_id_foreign` (`areas_type_id`),
  KEY `plot_transactions_block_id_foreign` (`block_id`),
  KEY `plot_transactions_plot_id_foreign` (`plot_id`),
  KEY `plot_transactions_user_detail_id_foreign` (`user_detail_id`),
  CONSTRAINT `plot_transactions_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `plot_reservation` (`area_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_transactions_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `plot_reservation` (`areas_type_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_transactions_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `plot_reservation` (`block_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_transactions_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plot_reservation` (`plot_id`) ON DELETE CASCADE,
  CONSTRAINT `plot_transactions_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`user_detail_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plot_transactions`
--

LOCK TABLES `plot_transactions` WRITE;
/*!40000 ALTER TABLE `plot_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `plot_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plots`
--

DROP TABLE IF EXISTS `plots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plots` (
  `plot_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plot_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`plot_id`),
  UNIQUE KEY `plots_plot_no_unique` (`plot_no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plots`
--

LOCK TABLES `plots` WRITE;
/*!40000 ALTER TABLE `plots` DISABLE KEYS */;
INSERT INTO `plots` VALUES (1,1,'2016-09-21 05:41:52','2016-09-21 05:41:52'),(2,2,'2016-09-21 05:41:52','2016-09-21 05:41:52'),(3,3,'2016-09-21 05:41:52','2016-09-21 05:41:52'),(4,4,'2016-09-21 05:41:52','2016-09-21 05:41:52'),(5,5,'2016-09-21 05:41:52','2016-09-21 05:41:52'),(6,6,'2016-09-21 05:41:53','2016-09-21 05:41:53'),(7,7,'2016-09-21 05:41:53','2016-09-21 05:41:53'),(8,8,'2016-09-21 05:41:53','2016-09-21 05:41:53'),(9,9,'2016-09-21 05:41:53','2016-09-21 05:41:53'),(10,10,'2016-09-21 05:41:53','2016-09-21 05:41:53');
/*!40000 ALTER TABLE `plots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `plots_selection_main_view`
--

DROP TABLE IF EXISTS `plots_selection_main_view`;
/*!50001 DROP VIEW IF EXISTS `plots_selection_main_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `plots_selection_main_view` (
  `areaid` tinyint NOT NULL,
  `areaname` tinyint NOT NULL,
  `areatypeid` tinyint NOT NULL,
  `areatypename` tinyint NOT NULL,
  `blockid` tinyint NOT NULL,
  `blockname` tinyint NOT NULL,
  `plotid` tinyint NOT NULL,
  `plotno` tinyint NOT NULL,
  `size` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `blockfilename` tinyint NOT NULL,
  `areafilename` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `reserved_plots_status_view`
--

DROP TABLE IF EXISTS `reserved_plots_status_view`;
/*!50001 DROP VIEW IF EXISTS `reserved_plots_status_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `reserved_plots_status_view` (
  `areaid` tinyint NOT NULL,
  `areaname` tinyint NOT NULL,
  `areatypeid` tinyint NOT NULL,
  `areatypename` tinyint NOT NULL,
  `blockid` tinyint NOT NULL,
  `blockname` tinyint NOT NULL,
  `plotid` tinyint NOT NULL,
  `plotno` tinyint NOT NULL,
  `size` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  `price` tinyint NOT NULL,
  `total_price` tinyint NOT NULL,
  `userdetailid` tinyint NOT NULL,
  `fname` tinyint NOT NULL,
  `mname` tinyint NOT NULL,
  `lname` tinyint NOT NULL,
  `photo` tinyint NOT NULL,
  `region` tinyint NOT NULL,
  `address` tinyint NOT NULL,
  `deadline` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `registration_status` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_detail_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1),(2,1),(3,1);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Admin','System admini','2016-09-21 05:24:43','2016-09-21 05:34:49');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_numbers`
--

DROP TABLE IF EXISTS `transaction_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_numbers` (
  `transaction_number_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`transaction_number_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_numbers`
--

LOCK TABLES `transaction_numbers` WRITE;
/*!40000 ALTER TABLE `transaction_numbers` DISABLE KEYS */;
INSERT INTO `transaction_numbers` VALUES (1,'1',1,NULL,'2016-09-21 05:46:04'),(2,'2',1,NULL,'2016-09-21 05:46:10'),(3,'3',1,NULL,'2016-09-21 05:46:15'),(4,'4',1,NULL,'2016-09-26 11:07:23'),(5,'5',1,NULL,'2016-09-21 05:46:25'),(6,'6',1,NULL,'2016-09-21 05:46:29'),(7,'7',1,NULL,'2016-09-21 05:46:34'),(8,'8',0,NULL,'2016-09-21 05:46:38'),(9,'9',1,NULL,'2016-09-21 05:46:42'),(10,'10',1,NULL,'2016-09-21 06:32:38');
/*!40000 ALTER TABLE `transaction_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_credentials`
--

DROP TABLE IF EXISTS `user_credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_credentials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_detail_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_credentials_user_detail_id_foreign` (`user_detail_id`),
  CONSTRAINT `user_credentials_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`user_detail_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_credentials`
--

LOCK TABLES `user_credentials` WRITE;
/*!40000 ALTER TABLE `user_credentials` DISABLE KEYS */;
INSERT INTO `user_credentials` VALUES (1,'0719961077','$2y$10$2iu1qxpaCpn.lJsK6mqlXOCfVsymE./aVHZEoTj1q/RsE0GvtVOgO',1,'2016-09-20 04:49:27','2016-09-20 04:49:27'),(2,'0683005051','$2y$10$Sir9wvBS3G6nRBlOvjt.y.qgLEp4UvptDxVgtyvs5ZMK6gB1zLRES',2,'2016-09-21 06:29:13','2016-09-21 06:29:13'),(3,'0769370256','$2y$10$T5clgtm/zg8lup8l99hi4.lk.9EE/uvJuyKsRPIYoykp6kR0bh/lG',3,'2016-09-21 07:02:28','2016-09-21 07:02:28'),(4,'0769121212','$2y$10$zRDsvX6NGA7wstGcHEtatuffDb.9Yf1G8AW.qh8Gm0bpI9qOasiua',4,'2016-09-22 09:24:05','2016-09-22 09:24:05'),(5,'0683005052','$2y$10$iMk/EhLIL1CnnojAZlHsuewont2qB.H/70talrKrrxYZp2dh8n1Le',5,'2016-09-26 10:33:00','2016-09-26 11:11:14'),(6,'0769370257','$2y$10$ZGyZeZtn9Jd51EpV0i0/6ONtdyQJ00hHZ4Fb/TBHVxDeb8dUk/8bS',6,'2016-09-27 07:07:08','2016-09-27 07:07:08');
/*!40000 ALTER TABLE `user_credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_details` (
  `user_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `house_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_detail_id`),
  UNIQUE KEY `user_details_email_address_unique` (`email_address`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (1,'Joseph','Peter','Mtinangi','josephmtinangi@gmail.com','0719961077','$2y$10$2iu1qxpaCpn.lJsK6mqlXOCfVsymE./aVHZEoTj1q/RsE0GvtVOgO','Urambo','Tabora','Urambo Mashariki','4u2','02','1 @ 1474437280 - Joseph Mtinangi.JPG',1,'2016-09-20 14:49:27','2016-09-21 05:54:40'),(2,'GOTIFRIDI','FESTO','TARIMO','tarimo@live.com','0683005051','$2y$10$Sir9wvBS3G6nRBlOvjt.y.qgLEp4UvptDxVgtyvs5ZMK6gB1zLRES','DOM','DOM','GDF','23','32 DOM','2 @ 1474439622 - Joseph Mtinangi.JPG',1,'2016-09-21 06:29:13','2016-09-21 06:33:42'),(3,'Jeffrey','','Way','jeff_way@laracasts.com','0769370256','$2y$10$T5clgtm/zg8lup8l99hi4.lk.9EE/uvJuyKsRPIYoykp6kR0bh/lG',NULL,NULL,NULL,NULL,NULL,NULL,0,'2016-09-21 07:02:28','2016-09-21 07:02:28'),(4,'Taylor','','Otwell','taylor@laravel.com','0769121212','$2y$10$zRDsvX6NGA7wstGcHEtatuffDb.9Yf1G8AW.qh8Gm0bpI9qOasiua',NULL,NULL,NULL,NULL,NULL,NULL,0,'2016-09-22 09:24:05','2016-09-22 09:24:05'),(5,'Abhh','U hlbetoblbw ta','W','abhh@aol.com','0683005052','$2y$10$l4q2OQeJi6Q1z8yfxFeZAu8UDAF6Phki9s7UlMXUhTCo7k5YWO/rS',NULL,NULL,NULL,NULL,NULL,NULL,0,'2016-09-26 10:33:00','2016-09-26 10:33:00'),(6,'Yt lhgh','El','Ampao hC tmw','taylor_otwell@laracasts.com','0769370257','$2y$10$ZGyZeZtn9Jd51EpV0i0/6ONtdyQJ00hHZ4Fb/TBHVxDeb8dUk/8bS',NULL,NULL,NULL,NULL,NULL,NULL,0,'2016-09-27 07:07:08','2016-09-27 07:07:08');
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER tr_User_Credentials AFTER INSERT ON user_details FOR EACH ROW
            BEGIN
                INSERT INTO user_credentials (username, password, user_detail_id, created_at, updated_at) VALUES(NEW.phone_number, NEW.password, NEW.user_detail_id, NOW(), NOW());
            END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `all_plots_status_report_view`
--

/*!50001 DROP TABLE IF EXISTS `all_plots_status_report_view`*/;
/*!50001 DROP VIEW IF EXISTS `all_plots_status_report_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `all_plots_status_report_view` AS (select `areas`.`area_id` AS `areaid`,`areas`.`name` AS `areaname`,`area_types`.`areas_type_id` AS `areatypeid`,`area_types`.`name` AS `areatypename`,`blocks`.`block_id` AS `blockid`,`blocks`.`name` AS `blockname`,`plots`.`plot_id` AS `plotid`,`plots`.`plot_no` AS `plotno`,`plot_assignment`.`size` AS `size`,`plot_assignment`.`status` AS `status`,`area_assignment`.`price` AS `price` from ((((((`areas` join `area_assignment`) join `area_types`) join `blocks`) join `block_assignment`) join `plots`) join `plot_assignment`) where ((`areas`.`area_id` = `area_assignment`.`area_id`) and (`area_types`.`areas_type_id` = `area_assignment`.`areas_type_id`) and (`areas`.`area_id` = `area_assignment`.`area_id`) and (`area_types`.`areas_type_id` = `area_assignment`.`areas_type_id`) and (`blocks`.`block_id` = `block_assignment`.`block_id`) and (`area_assignment`.`area_id` = `block_assignment`.`area_id`) and (`area_assignment`.`areas_type_id` = `block_assignment`.`areas_type_id`) and (`plots`.`plot_id` = `plot_assignment`.`plot_id`) and (`block_assignment`.`area_id` = `plot_assignment`.`area_id`) and (`block_assignment`.`areas_type_id` = `plot_assignment`.`areas_type_id`) and (`block_assignment`.`block_id` = `plot_assignment`.`block_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `plot_reservation_view`
--

/*!50001 DROP TABLE IF EXISTS `plot_reservation_view`*/;
/*!50001 DROP VIEW IF EXISTS `plot_reservation_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `plot_reservation_view` AS (select `plots`.`plot_no` AS `plot_no`,`blocks`.`name` AS `block`,`areas`.`name` AS `location`,`area_types`.`name` AS `land_use`,`plot_assignment`.`size` AS `size`,`area_assignment`.`price` AS `price`,(`plot_assignment`.`size` * `area_assignment`.`price`) AS `total_price`,`plot_reservation`.`deadline` AS `deadline`,`user_details`.`first_name` AS `first_name`,`user_details`.`middle_name` AS `middle_name`,`user_details`.`last_name` AS `last_name`,`user_details`.`address` AS `address`,`user_details`.`region` AS `region`,`plot_reservation`.`created_at` AS `created_at`,`plot_reservation`.`user_detail_id` AS `user_credential_id`,`user_details`.`photo` AS `photo` from (((((((`user_details` join `plots`) join `blocks`) join `areas`) join `area_types`) join `plot_assignment`) join `area_assignment`) join `plot_reservation`) where ((`user_details`.`user_detail_id` = `plot_reservation`.`user_detail_id`) and (`plots`.`plot_id` = `plot_reservation`.`plot_id`) and (`blocks`.`block_id` = `plot_reservation`.`block_id`) and (`areas`.`area_id` = `plot_reservation`.`area_id`) and (`area_types`.`areas_type_id` = `plot_reservation`.`areas_type_id`) and (`plot_assignment`.`area_id` = `plot_reservation`.`area_id`) and (`plot_assignment`.`areas_type_id` = `plot_reservation`.`areas_type_id`) and (`plot_assignment`.`block_id` = `plot_reservation`.`block_id`) and (`plot_assignment`.`plot_id` = `plot_reservation`.`plot_id`) and (`area_assignment`.`areas_type_id` = `plot_reservation`.`areas_type_id`) and (`area_assignment`.`area_id` = `plot_reservation`.`area_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `plots_selection_main_view`
--

/*!50001 DROP TABLE IF EXISTS `plots_selection_main_view`*/;
/*!50001 DROP VIEW IF EXISTS `plots_selection_main_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `plots_selection_main_view` AS (select `areas`.`area_id` AS `areaid`,`areas`.`name` AS `areaname`,`area_types`.`areas_type_id` AS `areatypeid`,`area_types`.`name` AS `areatypename`,`blocks`.`block_id` AS `blockid`,`blocks`.`name` AS `blockname`,`plots`.`plot_id` AS `plotid`,`plots`.`plot_no` AS `plotno`,`plot_assignment`.`size` AS `size`,`plot_assignment`.`status` AS `status`,`area_assignment`.`price` AS `price`,`block_assignment`.`file_name` AS `blockfilename`,`area_image`.`file_name` AS `areafilename` from (((((((`areas` join `area_assignment`) join `area_types`) join `blocks`) join `block_assignment`) join `plots`) join `plot_assignment`) join `area_image`) where ((`areas`.`area_id` = `area_assignment`.`area_id`) and (`area_types`.`areas_type_id` = `area_assignment`.`areas_type_id`) and (`areas`.`area_id` = `area_assignment`.`area_id`) and (`area_types`.`areas_type_id` = `area_assignment`.`areas_type_id`) and (`blocks`.`block_id` = `block_assignment`.`block_id`) and (`area_assignment`.`area_id` = `block_assignment`.`area_id`) and (`area_assignment`.`areas_type_id` = `block_assignment`.`areas_type_id`) and (`plots`.`plot_id` = `plot_assignment`.`plot_id`) and (`block_assignment`.`area_id` = `plot_assignment`.`area_id`) and (`block_assignment`.`areas_type_id` = `plot_assignment`.`areas_type_id`) and (`block_assignment`.`block_id` = `plot_assignment`.`block_id`) and (`plot_assignment`.`status` = 0) and (`area_image`.`area_id` = `areas`.`area_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `reserved_plots_status_view`
--

/*!50001 DROP TABLE IF EXISTS `reserved_plots_status_view`*/;
/*!50001 DROP VIEW IF EXISTS `reserved_plots_status_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `reserved_plots_status_view` AS (select `areas`.`area_id` AS `areaid`,`areas`.`name` AS `areaname`,`area_types`.`areas_type_id` AS `areatypeid`,`area_types`.`name` AS `areatypename`,`blocks`.`block_id` AS `blockid`,`blocks`.`name` AS `blockname`,`plots`.`plot_id` AS `plotid`,`plots`.`plot_no` AS `plotno`,`plot_assignment`.`size` AS `size`,`plot_reservation`.`status` AS `status`,`area_assignment`.`price` AS `price`,(`plot_assignment`.`size` * `area_assignment`.`price`) AS `total_price`,`plot_reservation`.`user_detail_id` AS `userdetailid`,`user_details`.`first_name` AS `fname`,`user_details`.`middle_name` AS `mname`,`user_details`.`last_name` AS `lname`,`user_details`.`photo` AS `photo`,`user_details`.`region` AS `region`,`user_details`.`address` AS `address`,`plot_reservation`.`deadline` AS `deadline`,`plot_reservation`.`created_at` AS `created_at`,`user_details`.`registration_status` AS `registration_status` from ((((((((`areas` join `area_assignment`) join `area_types`) join `blocks`) join `block_assignment`) join `plots`) join `plot_assignment`) join `user_details`) join `plot_reservation`) where ((`areas`.`area_id` = `area_assignment`.`area_id`) and (`area_types`.`areas_type_id` = `area_assignment`.`areas_type_id`) and (`areas`.`area_id` = `area_assignment`.`area_id`) and (`area_types`.`areas_type_id` = `area_assignment`.`areas_type_id`) and (`blocks`.`block_id` = `block_assignment`.`block_id`) and (`area_assignment`.`area_id` = `block_assignment`.`area_id`) and (`area_assignment`.`areas_type_id` = `block_assignment`.`areas_type_id`) and (`plots`.`plot_id` = `plot_assignment`.`plot_id`) and (`block_assignment`.`area_id` = `plot_assignment`.`area_id`) and (`block_assignment`.`areas_type_id` = `plot_assignment`.`areas_type_id`) and (`block_assignment`.`block_id` = `plot_assignment`.`block_id`) and (`plot_reservation`.`user_detail_id` = `user_details`.`user_detail_id`) and (`plot_reservation`.`area_id` = `plot_assignment`.`area_id`) and (`plot_reservation`.`areas_type_id` = `plot_assignment`.`areas_type_id`) and (`plot_reservation`.`block_id` = `plot_assignment`.`block_id`) and (`plot_reservation`.`plot_id` = `plot_assignment`.`plot_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-27 10:19:23
