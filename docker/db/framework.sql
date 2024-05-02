-- MySQL dump 10.13  Distrib 5.5.62, for linux-glibc2.12 (x86_64)
--
-- Host: localhost    Database: framework
-- ------------------------------------------------------
-- Server version	5.5.62

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=896 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (685,'Set of Apple',0,'set_of_apple'),(691,'Details for IPad',685,'details_to_ipad'),(692,'Details to iPhone',685,'details_to_iphone'),(693,'Details to iPod',685,'details_ipod'),(694,'Details to iMac',685,'details_imac'),(695,'iPad',691,'ipad'),(696,'iPad 2',691,'ipad_2'),(697,'iPad NEW (iPad 3)',691,'ipad_new_ipad_3'),(698,'iPad 4',691,'ipad_4'),(699,'iPad mini',691,'ipad_mini'),(700,'iPhone',692,'iphone'),(701,'iPhone 3g/3gs',692,'iphone_3g_3gs'),(702,'iPhone 4',692,'iphone_4'),(703,'iPhone 4s',692,'iphone_4s'),(704,'iPhone 5',692,'iphone_5'),(705,'Motherboards iPhone',685,'motherboards_iphone'),(836,'Secure screens Apple',0,'secure_screens_apple'),(840,'iPad',836,'ipad_840'),(841,'iPhone',836,'iphone_841'),(842,'iPod',836,'ipod_842'),(843,'Mac',836,'mac'),(853,'Hardware to fix Apple',0,'hardware_to_fix_apple'),(876,'Accessories Apple',0,'accessories_apple'),(877,'Accessories iPad',876,'accessories_ipad'),(878,'Accessories iPhone',876,'accessories_iphone'),(879,'Accessories iPod',876,'accessories_ipod'),(880,'Accessories iMac',876,'accessories_imac'),(881,'iPad',877,'ipad_881'),(882,'iPad 2',877,'ipad_2_882'),(883,'iPad NEW 3 / iPad 4',877,'ipad_new_3_ipad_4'),(884,'iPad mini',877,'ipad_mini_884'),(885,'iPhone 3G/3GS',878,'iphone_3g_3gs_885'),(886,'iPhone 4/4S',878,'iphone_4_4s'),(887,'iPhone 5',878,'iphone_5_887'),(888,'Accessories for Apple',876,'accessories_for_apple_888'),(895,'iPhone 5 Lamborgini',878,'iphone_5_lamborgini');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Laptops'),(2,'Mouses'),(3,'Keyboards'),(4,'Printers'),(5,'Screens');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` mediumtext NOT NULL,
  `text` mediumtext NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,2,'Adaptive design and its basic strategy','Adaptive design is a new way','Lorem ipsum dolor sit amet','adaptive design','Adaptive design and its basic strategy'),(2,2,'Posts to compare icons into text','Icons is very popular right now','Lorem ipsum dolor sit amet','keywords','meta-description'),(3,1,'It is rarely used JQuery selectors','JQuery selectors is very important','Lorem ipsum dolor sit amet','',''),(4,4,'Text post','Short description for post','Lorem ipsum dolor sit amet','','');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-02 12:34:47
