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
-- Table structure for table `m_ms_api_account`
--

DROP TABLE IF EXISTS `m_ms_api_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_ms_api_account` (
  `intId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vchAccountType` varchar(16) DEFAULT NULL,
  `vchAccountName` varchar(32) DEFAULT NULL,
  `vchScreenName` varchar(32) DEFAULT NULL,
  `vchUserName` varchar(32) DEFAULT NULL,
  `vchPhoto` varchar(240) DEFAULT NULL,
  `tinDisplayStatus` tinyint(2) DEFAULT '0',
  `tinReplyStatus` tinyint(2) DEFAULT '0',
  `vchAccessToken` varchar(512) DEFAULT NULL,
  `vchAccessSecret` varchar(128) DEFAULT NULL,
  `intCreatedBy` int(11) DEFAULT NULL,
  `dtmCreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  `vchUsedMethod` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`intId`),
  KEY `INNNN_m_social_account 4:41 PM 9/22/2017 01-0723` (`intId`,`bitDeletedFlag`,`vchAccountType`,`vchAccountName`,`vchScreenName`,`vchUserName`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_ms_api_account`
--

LOCK TABLES `m_ms_api_account` WRITE;
/*!40000 ALTER TABLE `m_ms_api_account` DISABLE KEYS */;
INSERT INTO `m_ms_api_account` VALUES (41,'HEALTHAPI',NULL,'Capital Hospital API',NULL,'http://eswasthya.odisha.gov.in/HISUtilities/services/restful/DataService/getFilterWiseDataJSON/2',1,0,NULL,NULL,NULL,'2019-10-22 13:03:45',_binary '\0',NULL),(44,'HOMEAPI',NULL,'Home Dept. FIR Data API',NULL,'https://citizenportalaudit.com/Feedbackservice/api/FIR/GetRandomFeedbackDetails',1,0,NULL,'Lf7Nw5q3xqfF85QYvUEKgrqhmkC6WlXjFxUQM1c18SV0G59KTrCw9Mev%2FBMyrHuO',NULL,'2019-10-23 06:07:17',_binary '\0','GET'),(45,'HOMEAPI',NULL,'Home Dept. Petition Data API',NULL,'https://citizenportalaudit.com/Feedbackservice/api/FIR/GetRandomFeedbackDetails',1,0,NULL,'Lf7Nw5q3xqfF85QYvUEKgrqhmkC6WlXjFxUQM1c18SV0G59KTrCw9Mev%2FBMyrHuO',NULL,'2019-10-23 06:07:17',_binary '\0','GET'),(46,'HOMEAPI',NULL,'Home Dept. Service Data API',NULL,'https://citizenportalaudit.com/Feedbackservice/api/FIR/GetRandomFeedbackDetails',1,0,NULL,'Lf7Nw5q3xqfF85QYvUEKgrqhmkC6WlXjFxUQM1c18SV0G59KTrCw9Mev%2FBMyrHuO',NULL,'2019-10-23 06:07:17',_binary '\0','GET');
/*!40000 ALTER TABLE `m_ms_api_account` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:13
