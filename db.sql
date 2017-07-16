-- MySQL dump 10.16  Distrib 10.1.23-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bpolnet
-- ------------------------------------------------------
-- Server version	10.1.23-MariaDB-9+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subscription_shipping_address_id` int(11) DEFAULT NULL,
  `subscription_billing_address_id` int(11) DEFAULT NULL,
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `subscription_pack_id` int(11) NOT NULL,
  `started_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
INSERT INTO `subscription` VALUES (1,1,1,1,'active',5,NULL,NULL,'2017-07-16 14:16:31'),(2,2,2,2,'canceled',2,'2017-04-01 00:00:00',NULL,'2017-07-16 14:16:31'),(3,3,3,3,'canceled',7,'2017-04-15 00:00:00',NULL,'2017-07-16 14:16:31');
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_payment`
--

DROP TABLE IF EXISTS `subscription_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_id` int(11) DEFAULT NULL,
  `charged_amount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_payment`
--

LOCK TABLES `subscription_payment` WRITE;
/*!40000 ALTER TABLE `subscription_payment` DISABLE KEYS */;
INSERT INTO `subscription_payment` VALUES (1,1,2400,'2017-07-16 23:01:58',NULL,'2017-07-16 14:19:57'),(2,2,1700,'2017-05-01 00:00:00',NULL,'2017-07-16 14:19:57'),(3,3,3600,'2017-04-15 00:00:00',NULL,'2017-07-16 14:19:57');
/*!40000 ALTER TABLE `subscription_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'marek','marek','marek@localhost','marek@localhost',1,NULL,'$2y$13$jdFLqJD.02i1AaBCn40bceuhgeUDmhErISEvXLKJSQssBoSZuiPgG','2017-07-16 21:48:55',NULL,NULL,'a:0:{}'),(2,'marek2','marek2','marek2@localhost','marek2@localhost',1,NULL,'$2y$13$2QVK3RnWnb5PDTk1kXpoguuN8jvUvDsRgH8oEiQ0oH63Hhwzs6by2','2017-07-16 21:34:08',NULL,NULL,'a:0:{}'),(3,'marek3','marek3','marek3@localhost','marek3@localhost',1,NULL,'$2y$13$Zv7OitsYGZC0EQg7o9dCaOg32XrPf0xzbB9btadb9Go8T1rluUjIW','2017-07-16 21:27:56',NULL,NULL,'a:0:{}');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-16 23:58:24
