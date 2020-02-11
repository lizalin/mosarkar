-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: 192.168.10.69    Database: FSCW_FS_DB
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `m_fs_card_type`
--

DROP TABLE IF EXISTS `m_fs_card_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_fs_card_type` (
  `intCardTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `vchCardName` varchar(128) DEFAULT NULL,
  `intCreatedBy` int(11) DEFAULT NULL,
  `stmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `intUpdatedBy` int(11) DEFAULT NULL,
  `dtmUpdatedOn` datetime DEFAULT NULL,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  `tinPublishStatus` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`intCardTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_fs_card_type`
--

LOCK TABLES `m_fs_card_type` WRITE;
/*!40000 ALTER TABLE `m_fs_card_type` DISABLE KEYS */;
INSERT INTO `m_fs_card_type` VALUES (1,'PHH',1,'2019-10-28 08:12:19',NULL,NULL,_binary '\0',0),(2,'AAY',1,'2019-10-28 08:12:19',NULL,NULL,_binary '\0',0),(3,'Annapurna',NULL,'2019-11-22 15:07:48',NULL,NULL,_binary '\0',0),(4,'SFSS',NULL,'2019-11-22 15:07:48',NULL,NULL,_binary '\0',0);
/*!40000 ALTER TABLE `m_fs_card_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:19
