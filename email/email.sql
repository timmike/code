CREATE DATABASE  IF NOT EXISTS `sandbox` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sandbox`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: sandbox
-- ------------------------------------------------------
-- Server version	5.5.25

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
-- Table structure for table `advertiser`
--

DROP TABLE IF EXISTS `advertiser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advertiser` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertiser`
--

LOCK TABLES `advertiser` WRITE;
/*!40000 ALTER TABLE `advertiser` DISABLE KEYS */;
INSERT INTO `advertiser` VALUES (1,'b'),(2,'2'),(3,'222'),(4,'eee'),(5,'bbb'),(6,'123'),(7,'adf'),(8,'22'),(9,'2222'),(10,'eef'),(11,'ccc'),(12,'ee'),(13,'ffadf'),(14,'asdf'),(15,'aer'),(16,'dfasf'),(17,'erawer'),(18,'dfg'),(19,'ff'),(20,'tt'),(21,'yy'),(22,'est'),(23,'dd'),(24,'111'),(25,'206'),(26,'333'),(27,'garnett'),(28,'garneet'),(29,'990'),(30,'bbn'),(31,'love'),(32,'martin'),(33,'espn'),(34,'ttttttt'),(35,'oop'),(36,'667'),(37,'fasdfasdf');
/*!40000 ALTER TABLE `advertiser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domain`
--

DROP TABLE IF EXISTS `domain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domain`
--

LOCK TABLES `domain` WRITE;
/*!40000 ALTER TABLE `domain` DISABLE KEYS */;
INSERT INTO `domain` VALUES (1,'e'),(2,'5'),(3,'http://www.espn.com'),(4,'http://www.espns.com'),(5,'1'),(6,'eeeeee'),(7,'aeeee'),(8,'ff'),(9,'55'),(10,'5555'),(11,'555'),(12,'asdf'),(13,'eee'),(14,'fff'),(15,'aaa'),(16,'eerasdf'),(17,'ee'),(18,'adsf'),(19,'adf'),(20,'asf'),(21,'adfsdee'),(22,'tt'),(23,'yy'),(24,'eeeppook'),(25,'dd'),(26,'oo'),(27,'111'),(28,'33'),(29,'kevin '),(30,'990'),(31,'lop'),(32,'love 99'),(33,'love'),(34,'martin'),(35,'lllk'),(36,'ttttttt'),(37,'oop'),(38,'667'),(39,'fasd');
/*!40000 ALTER TABLE `domain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `network`
--

DROP TABLE IF EXISTS `network`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `network` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `network` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `network`
--

LOCK TABLES `network` WRITE;
/*!40000 ALTER TABLE `network` DISABLE KEYS */;
INSERT INTO `network` VALUES (1,'c'),(2,'3'),(3,'dda'),(4,'ccc'),(5,'df'),(6,'eee'),(7,'33'),(8,'3333'),(9,'333'),(10,'eaf'),(11,'bbb'),(12,'ff'),(13,'fff'),(14,'eers'),(15,'eradf'),(16,'asdf'),(17,'adf'),(18,'ewaraewr'),(19,'awer'),(20,'adfa'),(21,'fadf'),(22,'ee'),(23,'tt'),(24,'yy'),(25,'erasd'),(26,'dd'),(27,'cc'),(28,'ss'),(29,'111'),(30,'erea'),(31,'kobe'),(32,'990'),(33,'test'),(34,'lovel'),(35,'love'),(36,'martin'),(37,'espn'),(38,'ttttttt'),(39,'oop'),(40,'667'),(41,'sdaf');
/*!40000 ALTER TABLE `network` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campagin`
--

DROP TABLE IF EXISTS `campagin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campagin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advertiser_id` int(11) NOT NULL,
  `network_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `domain_id` int(11) NOT NULL,
  `cluster_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_submitted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campagin`
--

LOCK TABLES `campagin` WRITE;
/*!40000 ALTER TABLE `campagin` DISABLE KEYS */;
INSERT INTO `campagin` VALUES (1,2,2,3,3,2,'3',NULL),(2,2,2,3,3,2,'3',NULL),(3,2,2,3,3,2,'3',NULL),(4,2,2,3,3,2,'3',NULL),(5,2,2,3,4,2,'3',NULL),(6,3,2,3,4,2,'111',NULL),(7,3,2,4,4,2,'111',NULL),(8,3,2,4,4,2,'111',NULL),(9,7,6,9,8,6,'eee',NULL),(10,9,8,11,10,10,'1111',NULL),(11,9,8,11,10,9,'1111',NULL),(12,3,9,4,11,11,'111',NULL),(13,2,2,3,10,2,'111',NULL),(14,9,8,11,10,9,'111',NULL),(15,2,2,3,2,2,'1',NULL),(16,2,2,3,2,2,'1',NULL),(17,9,8,11,10,9,'111',NULL),(18,2,8,3,10,9,'111',NULL),(19,9,8,4,4,2,'111',NULL),(20,5,4,6,13,4,'aaa',NULL),(21,13,14,15,16,17,'2442',NULL),(22,15,17,8,18,18,'2442',NULL),(23,7,16,12,19,20,'2123',NULL),(24,12,22,13,17,6,'ee',NULL),(25,12,22,13,17,6,'ee',NULL),(26,20,23,19,22,22,'tt',NULL),(27,21,24,20,23,23,'yy',NULL),(28,22,25,21,24,24,'i lvoe',NULL),(29,12,26,13,25,14,'sdf',NULL),(30,23,27,22,26,25,'tian',NULL),(31,7,28,13,8,7,'123',NULL),(32,7,16,8,17,14,'adsf',NULL),(33,12,22,23,12,20,'ee',NULL),(34,14,16,8,12,20,'awer',NULL),(35,24,29,24,27,26,'111',NULL),(36,24,29,24,27,26,'206','2014-01-21 13:22:21'),(37,24,29,24,27,26,'206','2014-01-21 13:24:33'),(38,8,7,10,9,8,'11','2014-01-21 13:24:52'),(39,8,7,10,9,8,'11','2014-01-21 13:25:00'),(40,31,34,30,32,31,'kevin love','2014-01-21 13:31:21'),(41,32,36,32,34,33,'martin','2014-01-21 13:36:59'),(42,34,38,34,36,35,'ttttttt','2014-01-21 13:40:19'),(43,35,39,35,37,36,'oop','2014-01-21 13:40:44'),(44,36,40,36,38,37,'667','2014-01-21 14:01:15'),(45,37,41,37,39,38,'adfasd','2014-01-21 14:24:58');
/*!40000 ALTER TABLE `campagin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ipdomains`
--

DROP TABLE IF EXISTS `ipdomains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ipdomains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server` varchar(20) NOT NULL,
  `nb` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `dns` varchar(30) NOT NULL,
  `vmta` varchar(20) NOT NULL,
  `is_selected` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ipdomains`
--

LOCK TABLES `ipdomains` WRITE;
/*!40000 ALTER TABLE `ipdomains` DISABLE KEYS */;
INSERT INTO `ipdomains` VALUES (1,'1','1','198.154.212.226','ice1.mydealstoday.info','postfix',NULL),(2,'1','1','198.154.212.227','ice2.mydealstoday.info','postfix-227',NULL),(3,'1','1','198.154.212.228','ice3.mydealstoday.info','postfix-228',NULL),(4,'1','1','198.154.212.229','ice4.mydealstoday.info','postfix-229',NULL);
/*!40000 ALTER TABLE `ipdomains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer`
--

LOCK TABLES `offer` WRITE;
/*!40000 ALTER TABLE `offer` DISABLE KEYS */;
INSERT INTO `offer` VALUES (1,'d'),(2,'f'),(3,'4'),(4,'444'),(5,'eda'),(6,'ddd'),(7,'dd'),(8,'asdf'),(9,'eee'),(10,'44'),(11,'4444'),(12,'adf'),(13,'ee'),(14,'eeee'),(15,'ssasdf'),(16,'aaa'),(17,'adfdfadf'),(18,'ff'),(19,'tt'),(20,'yy'),(21,'easdf'),(22,'ll'),(23,'fasdf'),(24,'111'),(25,'fasdfas'),(26,'bryany'),(27,'bry'),(28,'990'),(29,'yyy'),(30,'love1'),(31,'love'),(32,'martin'),(33,'lllk'),(34,'ttttttt'),(35,'oop'),(36,'667'),(37,'asdfas');
/*!40000 ALTER TABLE `offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creative`
--

DROP TABLE IF EXISTS `creative`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creative` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campagin_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `date_submitted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creative`
--

LOCK TABLES `creative` WRITE;
/*!40000 ALTER TABLE `creative` DISABLE KEYS */;
INSERT INTO `creative` VALUES (1,28,'fg',NULL),(2,28,'eefa',NULL),(3,26,'adf',NULL),(4,29,'rrr',NULL),(5,31,'dfas',NULL),(6,31,'est',NULL),(7,31,'daf',NULL),(8,31,'ddaweee',NULL),(9,31,'ddaweee',NULL),(10,31,'ff',NULL),(11,31,'ee',NULL),(12,31,'ddd',NULL),(13,31,'ee',NULL),(14,32,'ee',NULL),(15,32,'ee',NULL),(16,28,'ee',NULL),(17,32,'ee',NULL),(18,32,'ee',NULL),(19,45,'fff',NULL),(20,45,'ffe','2014-01-21 14:27:00');
/*!40000 ALTER TABLE `creative` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cluster`
--

DROP TABLE IF EXISTS `cluster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cluster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cluster` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cluster`
--

LOCK TABLES `cluster` WRITE;
/*!40000 ALTER TABLE `cluster` DISABLE KEYS */;
INSERT INTO `cluster` VALUES (1,'f'),(2,'6'),(3,'21'),(4,'fff'),(5,'adf'),(6,'ee'),(7,'dd'),(8,'66'),(9,'6666'),(10,'6663'),(11,'666'),(12,'ffdee'),(13,'123'),(14,'ff'),(15,'ddd'),(16,'ggg'),(17,'adfee'),(18,'af'),(19,'eee'),(20,'asdf'),(21,'eefasefc'),(22,'tt'),(23,'yy'),(24,'look'),(25,'pp'),(26,'111'),(27,'33'),(28,'garneet'),(29,'860'),(30,'like'),(31,'love 330'),(32,'love'),(33,'martin'),(34,'llllk'),(35,'ttttttt'),(36,'oop'),(37,'667'),(38,'fadsfadsf');
/*!40000 ALTER TABLE `cluster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fromdomains`
--

DROP TABLE IF EXISTS `fromdomains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fromdomains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_selected` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fromdomains`
--

LOCK TABLES `fromdomains` WRITE;
/*!40000 ALTER TABLE `fromdomains` DISABLE KEYS */;
INSERT INTO `fromdomains` VALUES (1,'mydealstoday.info','2013-02-24 22:36:33','1'),(2,'yahoo.com','2013-02-24 22:36:33','1'),(3,'chichionline.net','2013-02-24 22:37:03','0'),(4,'dog.com','2013-02-24 22:37:03','0'),(5,'cat.com','2013-02-24 22:37:11','0'),(6,'monkey.net','2013-02-24 22:37:11','1');
/*!40000 ALTER TABLE `fromdomains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creative_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
INSERT INTO `template` VALUES (1,3,'asdf',NULL),(2,3,'fff',NULL),(3,2,'eee',NULL),(4,2,'eee',NULL),(5,4,'asdfasdf',NULL),(6,4,'asdfasdf',NULL),(7,4,'asdfasdf',NULL),(8,4,'asdfasdf',NULL),(9,4,'asdfasdf',NULL),(10,12,'asdfasdf',NULL),(11,12,'asdfasdf',NULL),(12,2,'asdfasdf',NULL),(13,2,'asdfasdf',NULL),(14,1,'asdfasdf',NULL),(15,1,'asdfasdf',NULL),(16,1,'asdfasdf',NULL),(17,1,'asdfasdf',NULL),(18,14,'asdfasdf',NULL),(19,7,'eeradf',NULL),(20,6,'adf',NULL),(21,14,'ffff',NULL),(22,14,'dddaee',NULL),(23,14,'',NULL),(24,14,'ttt',NULL),(25,1,'uiio',NULL),(26,1,'',NULL),(27,1,'',NULL),(28,2,'dd',NULL),(29,2,'test',NULL),(30,2,'test',NULL),(31,2,'martin',NULL),(32,2,'mm',NULL),(33,2,'john',NULL);
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creative_id` int(11) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `date_submitted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link`
--

LOCK TABLES `link` WRITE;
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
INSERT INTO `link` VALUES (1,1,'asdf','adf',NULL),(2,1,'asdf','c:\\windows\\temp\\php67f.tmp',NULL),(3,1,'asdf','c:\\windows\\temp\\php682.tmp',NULL),(4,1,'asdf','c:\\windows\\temp\\php68a.tmp',NULL),(5,2,'ee','c:\\windows\\temp\\php68e.tmp',NULL),(6,2,'ee','',NULL),(7,2,'ee','c:\\windows\\temp\\php6a1.tmp',NULL),(8,2,'adf','c:\\windows\\temp\\php6ab.tmp',NULL),(9,2,'adf','c:\\windows\\temp\\php6c3.tmp',NULL),(10,2,'fff','c:windows	empphp6cd.tmp',NULL),(11,2,'adf','c:windows	empphp6d5.tmp',NULL),(12,2,'adf','c:windows	empphp6d6.tmp',NULL),(13,2,'adf','c:windows	empphp6da.tmp',NULL),(14,2,'adf','c:windows	empphp6dc.tmp',NULL),(15,2,'adf','c:windows	empphp6e0.tmp',NULL),(16,2,'adf','c:windows	empphp6e3.tmp',NULL),(17,2,'adf','c:windows	empphp6e7.tmp',NULL),(18,2,'adf','c:windows	empphp6eb.tmp',NULL),(19,2,'adf','c:windows	empphp6ec.tmp',NULL),(20,2,'adf','c:windows	empphp6f4.tmp',NULL),(21,2,'adf','c:windows	empphp6fe.tmp',NULL),(22,2,'adf','c:windows	empphp707.tmp',NULL),(23,2,'adf','c:windows	empphp708.tmp',NULL),(24,2,'adf','c:windows	empphp710.tmp',NULL),(25,2,'adf','pix.jpg',NULL),(26,2,'adf','pix.jpg',NULL),(27,2,'adf','pix.jpg',NULL),(28,2,'adf','pix.jpg',NULL),(29,2,'adf','pix.jpg',NULL),(30,2,'ddeerr','pix.jpg',NULL),(31,4,'eeee','pix.jpg',NULL),(32,4,'eardf','pix.jpg',NULL),(33,4,'adfasdf','pix2.jpg',NULL),(34,4,'adfadf','laura.jpg',NULL),(35,6,'sadfasf','multi-site.jpg',NULL),(36,7,'asdfasdf','laura.jpg',NULL),(37,13,'asdfasdf','laura.jpg',NULL),(38,13,'adsfasdf','multi-site.jpg',NULL),(39,15,'fff','img_0441.jpg',NULL),(40,15,'rr','laura.jpg',NULL),(41,19,'eee','multi-site.jpg',NULL),(42,19,'feesdf','','2014-01-21 14:51:03'),(43,19,'feesdf','pix.jpg','2014-01-21 14:51:38'),(44,19,'test','blue hills.jpg','2014-01-21 14:52:27'),(45,19,'test','blue hills.jpg','2014-01-21 14:53:18'),(46,19,'edadf','pix.jpg','2014-01-21 14:54:06'),(47,19,'hire','','2014-01-21 14:54:30'),(48,19,'hire','ehire_screen_shot.png','2014-01-21 14:54:42'),(49,19,'dafadf','img_0441.jpg','2014-01-21 14:56:29'),(50,19,'adfadsf','img_0441.jpg','2014-01-21 14:57:45'),(51,19,'adfadsf','img_0441.jpg','2014-01-21 14:58:16'),(52,19,'adfadsf','img_0441.jpg','2014-01-21 14:58:40'),(53,19,'adfadsf','img_0441.jpg','2014-01-21 14:58:48'),(54,19,'adfadsf','img_0441.jpg','2014-01-21 14:59:45'),(55,19,'adfadsf','img_0441.jpg','2014-01-21 14:59:55'),(56,19,'adfadsf','img_0441.jpg','2014-01-21 15:01:42'),(57,19,'adfadsf','img_0441.jpg','2014-01-21 15:02:02'),(58,28,'ffff','pix.jpg','2014-01-21 18:50:54'),(59,28,'ffff','pix.jpg','2014-01-21 18:51:25'),(60,28,'ffff','pix.jpg','2014-01-21 18:52:55'),(61,28,'ffff','pix.jpg','2014-01-21 18:53:32'),(62,28,'ffff','pix.jpg','2014-01-21 18:54:31'),(63,28,'ffff','pix.jpg','2014-01-21 18:56:06'),(64,28,'ffff','pix2.jpg','2014-01-21 18:56:22'),(65,28,'ffff','pix2.jpg','2014-01-21 18:56:46'),(66,28,'ffff','pix2.jpg','2014-01-21 18:57:20'),(67,28,'ffff','pix2.jpg','2014-01-21 18:57:29');
/*!40000 ALTER TABLE `link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redirdomains`
--

DROP TABLE IF EXISTS `redirdomains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `redirdomains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_selected` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redirdomains`
--

LOCK TABLES `redirdomains` WRITE;
/*!40000 ALTER TABLE `redirdomains` DISABLE KEYS */;
INSERT INTO `redirdomains` VALUES (1,'yahoo.com','2013-02-24 22:31:32','1'),(2,'mydealstoday.info','2013-02-24 22:32:35','1'),(3,'facebook.com','2013-02-24 22:33:18','0'),(4,'juice.com','2013-02-24 22:33:18','1'),(5,'apple.com','2013-02-24 22:34:11','0'),(6,'sleep.net','2013-02-24 22:34:11','1');
/*!40000 ALTER TABLE `redirdomains` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-21 19:01:17
