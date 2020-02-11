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
-- Table structure for table `m_ms_cronjob_type`
--

DROP TABLE IF EXISTS `m_ms_cronjob_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_ms_cronjob_type` (
  `intJobTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `vchJobName` varchar(128) DEFAULT NULL,
  `vchJobDesc` varchar(256) DEFAULT NULL,
  `intAccountType` int(11) DEFAULT NULL,
  `stmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `intCreatedBy` int(11) DEFAULT NULL,
  `dtmUpdatedOn` datetime DEFAULT NULL,
  `intUpdatedBy` int(11) DEFAULT NULL,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  PRIMARY KEY (`intJobTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPRESSED COMMENT='table to store the master job types.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_ms_cronjob_type`
--

LOCK TABLES `m_ms_cronjob_type` WRITE;
/*!40000 ALTER TABLE `m_ms_cronjob_type` DISABLE KEYS */;
INSERT INTO `m_ms_cronjob_type` VALUES (1,'Data Mining Health',NULL,4,'2019-10-22 10:03:55',NULL,NULL,NULL,_binary '\0'),(2,'Data Mining Home',NULL,5,'2019-10-22 13:05:40',NULL,NULL,NULL,_binary '\0');
/*!40000 ALTER TABLE `m_ms_cronjob_type` ENABLE KEYS */;
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
