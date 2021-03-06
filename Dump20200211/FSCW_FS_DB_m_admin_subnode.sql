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
-- Table structure for table `m_admin_subnode`
--

DROP TABLE IF EXISTS `m_admin_subnode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_admin_subnode` (
  `INT_SUBNODE_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `VCH_SUBNODE_NAME` varchar(50) NOT NULL,
  `VCH_SUBALIAS_NAME` varchar(50) NOT NULL,
  `INT_SUB_LEVEL` int(10) unsigned NOT NULL,
  `INT_NODE_ID` int(10) unsigned NOT NULL,
  `INT_CREATED_BY` int(10) unsigned NOT NULL,
  `DTM_CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `INT_UPDATED_BY` int(10) unsigned DEFAULT NULL,
  `DTM_UPDATED_ON` datetime DEFAULT NULL,
  `BIT_DELETED_FLAG` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`INT_SUBNODE_ID`),
  KEY `FK_NODE_ID_idx` (`INT_NODE_ID`),
  KEY `IND_NODE_ID` (`INT_NODE_ID`),
  KEY `IND_SUBNODE_NAME` (`VCH_SUBNODE_NAME`),
  KEY `IND_SUBNODE_LEVEL` (`INT_SUB_LEVEL`),
  CONSTRAINT `FK_NODE_ID` FOREIGN KEY (`INT_NODE_ID`) REFERENCES `m_admin_hierarchy` (`INT_NODE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_admin_subnode`
--

LOCK TABLES `m_admin_subnode` WRITE;
/*!40000 ALTER TABLE `m_admin_subnode` DISABLE KEYS */;
INSERT INTO `m_admin_subnode` VALUES (1,'District','',1,1,1,'2016-02-24 06:39:24',0,'2017-07-19 12:13:00',_binary '\0'),(2,'Block','',2,1,1,'2016-02-24 06:39:24',81,'2017-10-12 16:36:46',_binary '\0'),(3,'GP','',3,1,0,'2017-07-19 06:43:00',NULL,NULL,_binary '\0'),(4,'Village','',4,1,0,'2017-07-19 06:43:00',NULL,NULL,_binary '\0');
/*!40000 ALTER TABLE `m_admin_subnode` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:11
