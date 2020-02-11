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
-- Table structure for table `m_ms_admin_range`
--

DROP TABLE IF EXISTS `m_ms_admin_range`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_ms_admin_range` (
  `intRangeId` int(11) NOT NULL AUTO_INCREMENT,
  `vchRangeName` varchar(128) DEFAULT NULL,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  `dtmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`intRangeId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_ms_admin_range`
--

LOCK TABLES `m_ms_admin_range` WRITE;
/*!40000 ALTER TABLE `m_ms_admin_range` DISABLE KEYS */;
INSERT INTO `m_ms_admin_range` VALUES (1,'Central Range Cuttack',_binary '\0','2019-10-11 05:38:47'),(2,'Eastern Range Balasore',_binary '\0','2019-10-11 05:38:47'),(3,'Northern Range Sambalpur',_binary '\0','2019-10-11 05:38:47'),(4,'Southern Range Berhampur',_binary '\0','2019-10-11 05:38:47'),(5,'Western Range Rourkela',_binary '\0','2019-10-11 05:38:47'),(6,'South Western Range Koraput',_binary '\0','2019-10-11 05:38:47'),(7,'North Central Range Talcher',_binary '\0','2019-10-11 05:38:47'),(8,'Railway Range Cuttack ',_binary '\0','2019-10-11 05:38:47'),(9,'Commissionerate Police',_binary '\0','2019-10-16 09:30:42');
/*!40000 ALTER TABLE `m_ms_admin_range` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:20
