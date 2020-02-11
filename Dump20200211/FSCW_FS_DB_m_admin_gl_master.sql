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
-- Table structure for table `m_admin_gl_master`
--

DROP TABLE IF EXISTS `m_admin_gl_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_admin_gl_master` (
  `INT_GL_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `VCH_LOC_ID` varchar(200) NOT NULL,
  `VCH_GL_NAME` varchar(50) NOT NULL,
  `INT_SL_NO` int(5) unsigned DEFAULT NULL,
  `INT_STATUS` int(10) unsigned DEFAULT NULL,
  `INT_SHOW_ON_HOME` int(10) unsigned DEFAULT NULL,
  `VCH_ICON_NAME` varchar(25) DEFAULT NULL,
  `INT_CREATED_BY` int(10) unsigned DEFAULT NULL,
  `INT_UPDATED_BY` int(10) unsigned DEFAULT NULL,
  `DTM_CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DTM_UPDATED_ON` datetime DEFAULT NULL,
  `BIT_DELETED_FLAG` bit(1) DEFAULT b'0',
  `VCH_ICON_CLASS` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`INT_GL_ID`),
  KEY `IND_GL_NAME` (`VCH_GL_NAME`),
  KEY `IND_GL_STATUS` (`INT_STATUS`),
  KEY `IND_GL_SL_NO` (`INT_SL_NO`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_admin_gl_master`
--

LOCK TABLES `m_admin_gl_master` WRITE;
/*!40000 ALTER TABLE `m_admin_gl_master` DISABLE KEYS */;
INSERT INTO `m_admin_gl_master` VALUES (7,'All','Setting',4,1,1,'',1,1,'2016-04-25 05:20:14','2019-09-26 23:18:15',_binary '\0','menu-icon icon-settings1'),(21,'All','In Bound',14,2,1,'',1,1,'2019-09-20 07:34:20','2019-09-20 15:49:19',_binary '\0','menu-icon icon-phone-incoming1'),(22,'All','Out Bound',15,2,1,'',1,1,'2019-09-20 07:34:47','2019-09-20 15:49:19',_binary '\0','menu-icon icon-phone-outgoing1'),(23,'All','Calls',2,1,1,'',1,1,'2019-09-20 10:10:23','2019-10-22 12:49:24',_binary '\0','menu-icon icon-phone-call1 new'),(24,'All','Reports',5,1,1,'',1,NULL,'2019-09-28 09:40:28',NULL,_binary '\0','menu-icon icon-document'),(25,'All','Dashboard',1,1,1,'',151,1,'2019-10-01 04:54:46','2019-10-01 10:52:22',_binary '\0','menu-icon icon-dashboard');
/*!40000 ALTER TABLE `m_admin_gl_master` ENABLE KEYS */;
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
