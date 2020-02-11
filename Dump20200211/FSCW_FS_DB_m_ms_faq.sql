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
-- Table structure for table `m_ms_faq`
--

DROP TABLE IF EXISTS `m_ms_faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_ms_faq` (
  `intFaqId` int(11) NOT NULL AUTO_INCREMENT,
  `intDepartmentId` int(11) NOT NULL,
  `intServiceRegistrationId` int(11) NOT NULL,
  `intServiceTranscationId` int(11) NOT NULL,
  `vchFaqQuestion` varchar(128) DEFAULT NULL,
  `vchFaqAnswer` varchar(526) DEFAULT NULL,
  `intCreatedBy` int(11) DEFAULT NULL,
  `stmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `intUpdatedBy` int(11) DEFAULT NULL,
  `dtmUpdatedOn` datetime DEFAULT NULL,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  `tinPublishStatus` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`intFaqId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_ms_faq`
--

LOCK TABLES `m_ms_faq` WRITE;
/*!40000 ALTER TABLE `m_ms_faq` DISABLE KEYS */;
INSERT INTO `m_ms_faq` VALUES (1,1,29,0,'test','test',1,'2019-09-24 06:44:08',NULL,NULL,_binary '\0',0),(2,1,14,0,'demo test','demo test',1,'2019-09-24 06:44:22',NULL,NULL,_binary '\0',0),(3,3,14,0,'demo cooperation','demo cooperation',1,'2019-09-24 06:44:46',NULL,NULL,_binary '\0',0),(5,4,14,0,'What is A NOR gate','The gate which yadda yadda yadda',1,'2019-09-24 13:54:11',NULL,NULL,_binary '\0',0),(6,1,14,0,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy te','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,',1,'2019-09-24 14:35:42',NULL,NULL,_binary '\0',0);
/*!40000 ALTER TABLE `m_ms_faq` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:18
