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
-- Table structure for table `t_ms_call_information`
--

DROP TABLE IF EXISTS `t_ms_call_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ms_call_information` (
  `intCallInfoId` int(11) NOT NULL AUTO_INCREMENT,
  `intOutboundDataId` int(11) DEFAULT '0',
  `intFeedbackRecId` int(11) DEFAULT '0',
  `intMobile` bigint(20) DEFAULT '0',
  `intType` int(11) DEFAULT '0' COMMENT '2. Inbound, 1. OutBound',
  `dtmCallStart` datetime DEFAULT NULL,
  `dtmCallEnd` datetime DEFAULT NULL,
  `intFeedbackStatus` int(11) DEFAULT '0' COMMENT '1.Received,2.not reachable,3. Invalid number,4.phone not picked, 5.not interested',
  `dtmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `intCreatedBy` int(11) DEFAULT '0',
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  PRIMARY KEY (`intCallInfoId`),
  KEY `Mobile` (`intMobile`,`bitDeletedFlag`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_ms_call_information`
--

LOCK TABLES `t_ms_call_information` WRITE;
/*!40000 ALTER TABLE `t_ms_call_information` DISABLE KEYS */;
INSERT INTO `t_ms_call_information` VALUES (1,13,4,9776733490,2,'2019-11-14 14:37:26','2019-11-14 14:37:30',1,'2019-11-14 09:06:18',4,_binary '\0'),(2,1,5,9938457637,2,'2019-11-14 15:49:46','2019-11-14 15:49:58',1,'2019-11-14 10:18:46',4,_binary '\0'),(3,11,8,9668568471,2,'2019-11-14 16:04:49','2019-11-14 16:04:51',1,'2019-11-14 10:33:38',4,_binary '\0'),(4,6,9,9556512462,2,'2019-11-14 16:06:30','2019-11-14 16:06:44',1,'2019-11-14 10:35:32',4,_binary '\0'),(5,7,10,9777943216,2,'2019-11-15 12:11:28','2019-11-15 12:11:33',1,'2019-11-15 06:42:20',4,_binary '\0'),(6,8,11,7873308894,2,'2019-11-15 12:28:55','2019-11-15 12:28:58',1,'2019-11-15 06:59:46',4,_binary '\0'),(7,18,12,7873802017,2,'2019-11-15 12:30:01','2019-11-15 12:30:16',1,'2019-11-15 07:01:04',4,_binary '\0'),(8,17,13,8018304612,2,'2019-11-15 12:30:34','2019-11-15 12:30:37',1,'2019-11-15 07:01:25',4,_binary '\0'),(9,1,17,9938457637,1,NULL,NULL,1,'2019-11-19 05:01:20',3,_binary '\0'),(10,1,18,9938457637,1,NULL,NULL,1,'2019-11-19 05:02:17',5,_binary '\0'),(11,5,19,9437900015,2,'2019-11-19 10:41:25','2019-11-19 10:41:57',1,'2019-11-19 05:13:41',4,_binary '\0'),(12,398,22,9938623519,2,'2019-11-29 15:43:03','2019-11-29 16:08:59',1,'2019-11-29 10:40:36',1,_binary '\0'),(13,1192,33,8456014343,2,'2019-11-29 17:25:55','2019-11-29 17:25:57',1,'2019-11-29 11:57:33',7,_binary '\0'),(14,1258,34,9938023831,2,'2019-11-29 17:27:28','2019-11-29 17:27:31',7,'2019-11-29 11:59:07',7,_binary '\0'),(15,3511,35,7381541448,2,'2019-11-30 12:15:42','2019-11-30 12:15:45',1,'2019-11-30 06:47:20',7,_binary '\0'),(16,3512,36,9937312262,2,'2019-11-30 12:15:48','2019-11-30 12:15:49',1,'2019-11-30 06:47:25',7,_binary '\0'),(17,3513,37,9853822351,2,'2019-11-30 12:15:52','2019-11-30 12:15:54',1,'2019-11-30 06:47:30',7,_binary '\0'),(18,1736,38,8018913175,2,'2019-11-30 12:31:49','2019-11-30 12:31:58',1,'2019-11-30 07:03:33',7,_binary '\0'),(19,2214,39,7682023423,2,'2019-11-30 12:38:23','2019-11-30 12:38:24',1,'2019-11-30 07:09:59',7,_binary '\0'),(20,3373,40,9040767368,2,'2019-11-30 12:39:50','2019-11-30 12:39:52',1,'2019-11-30 07:11:27',7,_binary '\0'),(21,1861,43,9777404604,2,'2019-12-03 11:26:46','2019-12-03 11:26:47',1,'2019-12-03 05:58:20',1,_binary '\0'),(22,2087,44,7894649255,2,'2019-12-03 11:52:41','2019-12-03 11:52:47',1,'2019-12-03 06:24:19',1,_binary '\0'),(23,1831,49,8594893983,2,'2019-12-03 12:56:00','2019-12-03 12:56:05',1,'2019-12-03 07:27:38',1,_binary '\0');
/*!40000 ALTER TABLE `t_ms_call_information` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:23
