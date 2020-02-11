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
-- Table structure for table `m_package_pl`
--

DROP TABLE IF EXISTS `m_package_pl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_package_pl` (
  `INT_P_PL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INT_P_GL_ID` int(11) NOT NULL,
  `VCH_P_PL_NAME` varchar(50) NOT NULL,
  `INT_SL_NO` int(11) NOT NULL,
  `VCH_URL_NAME` varchar(100) NOT NULL,
  `BIT_DELETED_FLAG` bit(1) NOT NULL DEFAULT b'0',
  `DTM_CREATED_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`INT_P_PL_ID`),
  KEY `FL_PACKAGE_GL_idx` (`INT_P_GL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_package_pl`
--

LOCK TABLES `m_package_pl` WRITE;
/*!40000 ALTER TABLE `m_package_pl` DISABLE KEYS */;
INSERT INTO `m_package_pl` VALUES (1,1,'Function Master',1,'functionmaster',_binary '\0','2016-02-24 05:33:11'),(2,1,'Global Link',2,'addGL',_binary '\0','2016-02-24 05:33:11'),(3,1,'Primary Link',3,'addPL',_binary '\0','2016-02-24 05:33:11'),(5,2,'Designation',7,'addDesignation',_binary '\0','2016-02-24 05:33:11'),(6,2,'User Profile',10,'addUser',_binary '\0','2016-02-24 05:33:11'),(7,2,'Set Permission',11,'setPermission',_binary '\0','2016-02-24 05:33:11'),(8,2,'Agency Master',9,'addGroup',_binary '','2016-02-24 05:33:11'),(9,3,'Theme Master',18,'colorScheme',_binary '\0','2016-02-24 05:33:11'),(10,3,'Header Footer',19,'headerFooter',_binary '\0','2016-02-24 05:33:11'),(11,2,'Tag Police Station',20,'tagPolicestationRange',_binary '\0','2019-10-11 07:35:45');
/*!40000 ALTER TABLE `m_package_pl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:17
