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
-- Table structure for table `t_ms_corn_job`
--

DROP TABLE IF EXISTS `t_ms_corn_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ms_corn_job` (
  `intJobId` int(11) NOT NULL AUTO_INCREMENT,
  `IntJobType` int(11) DEFAULT NULL COMMENT '1-TW mining, 2-FB mining',
  `intAccountId` int(11) DEFAULT NULL,
  `vchDuration` varchar(16) DEFAULT NULL,
  `bitActive` tinyint(1) DEFAULT '0',
  `dtmLastExcution` datetime DEFAULT NULL,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  `stmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dtmUpdatedOn` datetime DEFAULT NULL,
  `intMode` tinyint(2) DEFAULT NULL,
  `vchJobName` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `vchlastMessage` varchar(1024) CHARACTER SET latin1 DEFAULT NULL,
  `intTotalFeatchedcnt` int(11) DEFAULT NULL,
  `intValidRecCnt` int(11) DEFAULT NULL,
  `intInvalidRecCnt` int(11) DEFAULT NULL,
  `intduplicateRecCnt` int(11) DEFAULT NULL,
  PRIMARY KEY (`intJobId`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPRESSED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_ms_corn_job`
--

LOCK TABLES `t_ms_corn_job` WRITE;
/*!40000 ALTER TABLE `t_ms_corn_job` DISABLE KEYS */;
INSERT INTO `t_ms_corn_job` VALUES (14,1,41,'00:01',1,'2019-10-24 18:04:16',_binary '\0','2019-10-22 11:08:08',NULL,2,'HEALTH DATA CH','Nothing Inserted',1731,0,57,1674),(15,2,44,'00:01',1,'2019-10-24 17:57:38',_binary '\0','2019-10-22 13:25:46',NULL,2,'FIR API','Nothing Inserted',312,0,0,312),(16,2,46,'00:01',1,'2019-10-24 17:59:55',_binary '\0','2019-10-22 13:27:09',NULL,2,'CITEZEN SERVICE API','Record added successfully ',727,6,2,719),(17,2,45,'24:00',1,'2019-10-24 18:05:50',_binary '\0','2019-10-23 09:56:33',NULL,2,'PETITION API','Record added successfully ',206,2,201,3);
/*!40000 ALTER TABLE `t_ms_corn_job` ENABLE KEYS */;
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
