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
-- Table structure for table `m_department`
--

DROP TABLE IF EXISTS `m_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_department` (
  `intDeptId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vchDeptName` varchar(64) DEFAULT NULL,
  `vchShrtDeptName` varchar(64) DEFAULT NULL,
  `vchDeptAlias` varchar(64) DEFAULT NULL,
  `intCreatedBy` int(10) unsigned DEFAULT NULL,
  `intUpdatedBy` int(10) unsigned DEFAULT NULL,
  `stmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dtmUpdatedOn` datetime DEFAULT NULL,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  `social_dept_id` int(11) DEFAULT NULL,
  `vchemail` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`intDeptId`),
  KEY `INNNN_m_department 4:55 PM 9/22/2017 01-0723` (`intDeptId`,`bitDeletedFlag`,`vchDeptName`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_department`
--

LOCK TABLES `m_department` WRITE;
/*!40000 ALTER TABLE `m_department` DISABLE KEYS */;
INSERT INTO `m_department` VALUES (1,'Food Supplies and Consumer Welfare Department','FSCW',NULL,NULL,NULL,'2016-02-26 07:37:16','2018-06-22 13:01:26',_binary '\0',1,'ashishkumar.patra20@gmail.com');
/*!40000 ALTER TABLE `m_department` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:14
