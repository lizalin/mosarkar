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
-- Table structure for table `m_admin_desg_master`
--

DROP TABLE IF EXISTS `m_admin_desg_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_admin_desg_master` (
  `INT_DESG_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `VCH_LOC_ID` varchar(32) DEFAULT NULL,
  `VCH_DESG_NAME` varchar(32) DEFAULT NULL,
  `VCH_ALIAS_NAME` varchar(32) DEFAULT NULL,
  `INT_TYPE` int(10) unsigned NOT NULL,
  `INT_CREATED_BY` int(10) unsigned DEFAULT NULL,
  `DTM_CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DTM_UPDATED_ON` datetime DEFAULT NULL,
  `INT_UPDATED_BY` int(10) unsigned DEFAULT NULL,
  `BIT_DELETED_FLAG` bit(1) DEFAULT b'0',
  `INT_RANK_ID` int(11) DEFAULT '1',
  PRIMARY KEY (`INT_DESG_ID`),
  KEY `IND_DESG_LOC` (`VCH_LOC_ID`),
  KEY `IND_DESG_NAME` (`VCH_DESG_NAME`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_admin_desg_master`
--

LOCK TABLES `m_admin_desg_master` WRITE;
/*!40000 ALTER TABLE `m_admin_desg_master` DISABLE KEYS */;
INSERT INTO `m_admin_desg_master` VALUES (1,'All','Secretary','Secretary',1,1,'2017-04-10 06:24:56','2019-12-03 13:11:04',NULL,_binary '\0',1),(2,'All','CSO','CSO',1,1,'2019-11-12 10:37:47',NULL,NULL,_binary '\0',3),(3,'All','Operator','Operator',1,1,'2019-11-12 10:40:12',NULL,NULL,_binary '\0',4),(4,'All','PA','PA',1,1,'2019-11-28 06:12:35','2019-11-28 11:42:49',NULL,_binary '\0',2);
/*!40000 ALTER TABLE `m_admin_desg_master` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:16
