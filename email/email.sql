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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertiser`
--

LOCK TABLES `advertiser` WRITE;
/*!40000 ALTER TABLE `advertiser` DISABLE KEYS */;
INSERT INTO `advertiser` VALUES (1,'b'),(2,'2'),(3,'222'),(4,'eee'),(5,'bbb'),(6,'123'),(7,'adf'),(8,'22'),(9,'2222'),(10,'eef'),(11,'ccc'),(12,'ee'),(13,'ffadf'),(14,'asdf'),(15,'aer'),(16,'dfasf'),(17,'erawer'),(18,'dfg'),(19,'ff'),(20,'tt'),(21,'yy'),(22,'est');
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domain`
--

LOCK TABLES `domain` WRITE;
/*!40000 ALTER TABLE `domain` DISABLE KEYS */;
INSERT INTO `domain` VALUES (1,'e'),(2,'5'),(3,'http://www.espn.com'),(4,'http://www.espns.com'),(5,'1'),(6,'eeeeee'),(7,'aeeee'),(8,'ff'),(9,'55'),(10,'5555'),(11,'555'),(12,'asdf'),(13,'eee'),(14,'fff'),(15,'aaa'),(16,'eerasdf'),(17,'ee'),(18,'adsf'),(19,'adf'),(20,'asf'),(21,'adfsdee'),(22,'tt'),(23,'yy'),(24,'eeeppook');
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `network`
--

LOCK TABLES `network` WRITE;
/*!40000 ALTER TABLE `network` DISABLE KEYS */;
INSERT INTO `network` VALUES (1,'c'),(2,'3'),(3,'dda'),(4,'ccc'),(5,'df'),(6,'eee'),(7,'33'),(8,'3333'),(9,'333'),(10,'eaf'),(11,'bbb'),(12,'ff'),(13,'fff'),(14,'eers'),(15,'eradf'),(16,'asdf'),(17,'adf'),(18,'ewaraewr'),(19,'awer'),(20,'adfa'),(21,'fadf'),(22,'ee'),(23,'tt'),(24,'yy'),(25,'erasd');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campagin`
--

LOCK TABLES `campagin` WRITE;
/*!40000 ALTER TABLE `campagin` DISABLE KEYS */;
INSERT INTO `campagin` VALUES (1,2,2,3,3,2,'3'),(2,2,2,3,3,2,'3'),(3,2,2,3,3,2,'3'),(4,2,2,3,3,2,'3'),(5,2,2,3,4,2,'3'),(6,3,2,3,4,2,'111'),(7,3,2,4,4,2,'111'),(8,3,2,4,4,2,'111'),(9,7,6,9,8,6,'eee'),(10,9,8,11,10,10,'1111'),(11,9,8,11,10,9,'1111'),(12,3,9,4,11,11,'111'),(13,2,2,3,10,2,'111'),(14,9,8,11,10,9,'111'),(15,2,2,3,2,2,'1'),(16,2,2,3,2,2,'1'),(17,9,8,11,10,9,'111'),(18,2,8,3,10,9,'111'),(19,9,8,4,4,2,'111'),(20,5,4,6,13,4,'aaa'),(21,13,14,15,16,17,'2442'),(22,15,17,8,18,18,'2442'),(23,7,16,12,19,20,'2123'),(24,12,22,13,17,6,'ee'),(25,12,22,13,17,6,'ee'),(26,20,23,19,22,22,'tt'),(27,21,24,20,23,23,'yy'),(28,22,25,21,24,24,'i lvoe');
/*!40000 ALTER TABLE `campagin` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer`
--

LOCK TABLES `offer` WRITE;
/*!40000 ALTER TABLE `offer` DISABLE KEYS */;
INSERT INTO `offer` VALUES (1,'d'),(2,'f'),(3,'4'),(4,'444'),(5,'eda'),(6,'ddd'),(7,'dd'),(8,'asdf'),(9,'eee'),(10,'44'),(11,'4444'),(12,'adf'),(13,'ee'),(14,'eeee'),(15,'ssasdf'),(16,'aaa'),(17,'adfdfadf'),(18,'ff'),(19,'tt'),(20,'yy'),(21,'easdf');
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
  `campaign_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creative`
--

LOCK TABLES `creative` WRITE;
/*!40000 ALTER TABLE `creative` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cluster`
--

LOCK TABLES `cluster` WRITE;
/*!40000 ALTER TABLE `cluster` DISABLE KEYS */;
INSERT INTO `cluster` VALUES (1,'f'),(2,'6'),(3,'21'),(4,'fff'),(5,'adf'),(6,'ee'),(7,'dd'),(8,'66'),(9,'6666'),(10,'6663'),(11,'666'),(12,'ffdee'),(13,'123'),(14,'ff'),(15,'ddd'),(16,'ggg'),(17,'adfee'),(18,'af'),(19,'eee'),(20,'asdf'),(21,'eefasefc'),(22,'tt'),(23,'yy'),(24,'look');
/*!40000 ALTER TABLE `cluster` ENABLE KEYS */;
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
  `img` blob,
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link`
--

LOCK TABLES `link` WRITE;
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
/*!40000 ALTER TABLE `link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domains`
--

DROP TABLE IF EXISTS `domains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domains` (
  `id` int(11) NOT NULL,
  `domain` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domains`
--

LOCK TABLES `domains` WRITE;
/*!40000 ALTER TABLE `domains` DISABLE KEYS */;
INSERT INTO `domains` VALUES (1,'http://www.google.com');
/*!40000 ALTER TABLE `domains` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-18 16:37:14
