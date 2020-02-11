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
-- Table structure for table `t_ms_feedback_received`
--

DROP TABLE IF EXISTS `t_ms_feedback_received`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ms_feedback_received` (
  `intFeedbackRecId` int(11) NOT NULL AUTO_INCREMENT,
  `intOutboundDataId` int(11) DEFAULT '0',
  `dtmFeedbackRcvTime` datetime DEFAULT NULL,
  `intFeedbackStatus` int(11) DEFAULT '0' COMMENT '1.Received,2.not reachable,3. Invalid number,4.phone not picked, 5.not interested,6.DND',
  `intOverallRating` decimal(3,2) DEFAULT '0.00',
  `vchAdditionalInfo` varchar(256) DEFAULT NULL,
  `vchQuery` varchar(256) DEFAULT NULL,
  `intFeedbackReceivedBy` int(11) DEFAULT '0' COMMENT 'use to store the user id of agent who submit the particular request.',
  `intByDesignationId` int(11) DEFAULT '0' COMMENT 'To store the officer designation  at the time of call back request or store the agent designation id  ',
  `intRequestedById` int(11) DEFAULT '0' COMMENT 'To store the officer User Id  at the time of call back request.',
  `intCallBackRequest` int(11) DEFAULT '0' COMMENT 'To store the officer designation  at the time of call back request.',
  `intFeedbackCollectedBy` varchar(45) DEFAULT NULL COMMENT '1- Department, 2- Contact Center 3-Authority',
  `dtmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `intCreatedBy` int(11) DEFAULT '0',
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  `intCallType` int(11) DEFAULT '1' COMMENT '1.Outbound , 2.Inbound call type',
  `intCallThrough` int(11) DEFAULT '1' COMMENT '1. By Call Center\n2. Self',
  `intDirectCallFeedbackStatus` int(11) DEFAULT '0' COMMENT '1. Bad\n2. Average\n3. Good',
  `intDepartmentId` int(11) DEFAULT '0',
  `intServiceId` int(11) DEFAULT '0',
  `intDistrictId` int(11) DEFAULT '0',
  `int_hs_ps_id` int(11) DEFAULT '0',
  `intMobile` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`intFeedbackRecId`),
  KEY `intFeedbackRecId` (`intFeedbackRecId`),
  KEY `intOutboundDataId` (`intOutboundDataId`),
  KEY `intFeedbackStatus` (`intFeedbackStatus`),
  KEY `intByDesignationId` (`intByDesignationId`),
  KEY `intFeedbackReceivedBy` (`intFeedbackReceivedBy`),
  KEY `intRequestedById` (`intRequestedById`),
  KEY `intCallBackRequest` (`intCallBackRequest`),
  KEY `intCreatedBy` (`intCreatedBy`),
  KEY `intCallType` (`intCallType`),
  KEY `intCallThrough` (`intCallThrough`),
  KEY `intDirectCallFeedbackStatus` (`intCallThrough`),
  KEY `CallingScreen` (`intOutboundDataId`,`intCallType`,`intFeedbackStatus`,`intRequestedById`,`dtmCreatedOn`),
  KEY `CallingScreen1` (`intOutboundDataId`,`intRequestedById`,`dtmCreatedOn`),
  KEY `InstitutionWiseReport` (`intOutboundDataId`,`intCallType`,`intRequestedById`,`bitDeletedFlag`,`intFeedbackStatus`,`intDirectCallFeedbackStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_ms_feedback_received`
--

LOCK TABLES `t_ms_feedback_received` WRITE;
/*!40000 ALTER TABLE `t_ms_feedback_received` DISABLE KEYS */;
INSERT INTO `t_ms_feedback_received` VALUES (1,12,'2019-11-14 12:04:59',1,0.00,NULL,NULL,0,0,3,2,'3','2019-11-14 06:34:59',3,_binary '\0',1,2,0,1,1,20,0,9776740539),(2,15,'2019-11-14 12:04:59',1,0.00,NULL,NULL,0,0,3,2,'3','2019-11-14 06:34:59',3,_binary '\0',1,2,0,1,1,20,0,9777062271),(4,13,'2019-11-14 14:37:30',1,0.00,'','',4,3,3,2,'3','2019-11-14 09:06:18',4,_binary '\0',2,1,0,1,1,20,0,NULL),(5,1,'2019-11-14 15:49:58',1,3.00,'Test','',4,3,0,0,'2','2019-11-14 10:18:46',4,_binary '\0',2,1,0,1,1,20,0,NULL),(6,19,'2019-11-14 16:00:24',1,0.00,NULL,NULL,0,0,3,2,'3','2019-11-14 10:30:24',3,_binary '\0',1,2,0,1,1,20,0,9090401478),(7,20,'2019-11-14 16:00:24',2,0.00,NULL,NULL,0,0,3,2,'3','2019-11-14 10:30:24',3,_binary '\0',1,2,0,1,1,20,0,9938330702),(8,11,'2019-11-14 16:04:51',1,0.00,'','',4,3,3,2,'3','2019-11-14 10:33:38',4,_binary '\0',2,1,0,1,1,20,0,NULL),(9,6,'2019-11-14 16:06:44',1,0.00,'','',4,3,3,2,'3','2019-11-14 10:35:32',4,_binary '\0',2,1,0,1,1,20,0,NULL),(10,7,'2019-11-15 12:11:33',1,0.00,'','',4,3,3,2,'3','2019-11-15 06:42:20',4,_binary '\0',2,1,0,1,1,20,0,NULL),(11,8,'2019-11-15 12:28:58',1,0.00,'','',4,3,3,2,'3','2019-11-15 06:59:46',4,_binary '\0',2,1,0,1,1,20,0,NULL),(12,18,'2019-11-15 12:30:16',1,0.00,'','',4,3,3,2,'3','2019-11-15 07:01:04',4,_binary '\0',2,1,0,1,1,20,0,NULL),(13,17,'2019-11-15 12:30:37',1,0.00,'','',4,3,3,2,'3','2019-11-15 07:01:25',4,_binary '\0',2,1,0,1,1,20,0,NULL),(14,10,'2019-11-18 15:54:02',1,0.00,NULL,NULL,0,0,3,2,'3','2019-11-18 10:24:02',3,_binary '\0',1,2,0,1,1,20,0,9938595335),(15,2,'2019-11-18 15:54:02',0,0.00,NULL,NULL,0,0,3,2,'3','2019-11-18 10:24:02',3,_binary '\0',1,2,0,1,1,20,0,9938865092),(16,14,'2019-11-18 15:54:02',0,0.00,NULL,NULL,0,0,3,2,'3','2019-11-18 10:24:02',3,_binary '\0',1,2,0,1,1,20,0,9938490184),(17,1,'2019-11-19 10:31:20',1,0.00,NULL,NULL,0,0,3,2,'3','2019-11-19 05:01:20',3,_binary '\0',1,2,0,1,1,20,0,NULL),(18,1,'2019-11-19 10:32:17',1,0.00,NULL,NULL,0,0,5,2,'3','2019-11-19 05:02:17',5,_binary '\0',1,2,0,1,1,20,0,NULL),(19,5,'2019-11-19 10:41:57',1,4.00,'','',4,3,0,0,'2','2019-11-19 05:13:41',4,_binary '\0',2,1,0,1,1,20,0,NULL),(20,14,'2019-11-26 11:58:21',1,0.00,NULL,NULL,0,0,2,1,'3','2019-11-26 06:28:21',2,_binary '\0',1,2,0,1,1,20,0,9938490184),(21,16,'2019-11-26 11:58:21',2,0.00,NULL,NULL,0,0,2,1,'3','2019-11-26 06:28:21',2,_binary '\0',1,2,0,1,1,20,0,9777010640),(22,398,'2019-11-29 16:08:59',1,3.00,'ok','',1,0,0,0,'2','2019-11-29 10:40:35',1,_binary '\0',2,1,0,1,1,3,0,NULL),(23,3635,'2019-11-29 16:36:10',2,0.00,NULL,NULL,0,0,2,1,'3','2019-11-29 11:06:10',2,_binary '\0',1,2,0,1,1,14,0,7681842737),(24,1826,'2019-11-29 16:36:10',1,0.00,NULL,NULL,0,0,2,1,'3','2019-11-29 11:06:10',2,_binary '\0',1,2,0,1,1,8,0,9583956826),(25,3566,'2019-11-29 16:36:10',1,0.00,NULL,NULL,0,0,2,1,'3','2019-11-29 11:06:10',2,_binary '\0',1,2,0,1,1,13,0,7377121659),(26,3721,'2019-11-29 16:36:10',0,0.00,NULL,NULL,0,0,2,1,'3','2019-11-29 11:06:10',2,_binary '\0',1,2,0,1,1,14,0,9937581824),(27,3760,'2019-11-29 16:36:10',0,0.00,NULL,NULL,0,0,2,1,'3','2019-11-29 11:06:10',2,_binary '\0',1,2,0,1,1,14,0,9833813378),(28,4335,'2019-11-29 16:36:10',0,0.00,NULL,NULL,0,0,2,1,'3','2019-11-29 11:06:10',2,_binary '\0',1,2,0,1,1,16,0,8018209425),(29,3220,'2019-11-29 16:36:10',0,0.00,NULL,NULL,0,0,2,1,'3','2019-11-29 11:06:10',2,_binary '\0',1,2,0,1,1,12,0,9658615861),(30,2948,'2019-11-29 16:36:10',0,0.00,NULL,NULL,0,0,2,1,'3','2019-11-29 11:06:10',2,_binary '\0',1,2,0,1,1,11,0,8895161407),(31,926,'2019-11-29 16:36:10',0,0.00,NULL,NULL,0,0,2,1,'3','2019-11-29 11:06:10',2,_binary '\0',1,2,0,1,1,5,0,9556960344),(32,2711,'2019-11-29 16:36:10',0,0.00,NULL,NULL,0,0,2,1,'3','2019-11-29 11:06:10',2,_binary '\0',1,2,0,1,1,11,0,9438047146),(33,1192,'2019-11-29 17:25:57',1,0.00,'','',7,3,2,1,'3','2019-11-29 11:57:33',7,_binary '\0',2,1,0,1,1,5,0,NULL),(34,1258,'2019-11-29 17:27:31',7,0.00,'','',7,3,2,1,'3','2019-11-29 11:59:07',7,_binary '\0',2,1,0,1,1,6,0,NULL),(35,3511,'2019-11-30 12:15:45',1,0.00,'','',7,3,2,1,'3','2019-11-30 06:47:20',7,_binary '\0',2,1,0,1,1,13,0,NULL),(36,3512,'2019-11-30 12:15:49',1,0.00,'','',7,3,2,1,'3','2019-11-30 06:47:25',7,_binary '\0',2,1,0,1,1,13,0,NULL),(37,3513,'2019-11-30 12:15:54',1,0.00,'','',7,3,2,1,'3','2019-11-30 06:47:30',7,_binary '\0',2,1,0,1,1,13,0,NULL),(38,1736,'2019-11-30 12:31:58',1,0.00,'','',7,3,2,1,'3','2019-11-30 07:03:33',7,_binary '\0',2,1,0,1,1,7,0,NULL),(39,2214,'2019-11-30 12:38:24',1,0.00,'','',7,3,2,1,'3','2019-11-30 07:09:59',7,_binary '\0',2,1,0,1,1,9,0,NULL),(40,3373,'2019-11-30 12:39:52',1,0.00,'','',7,3,2,1,'3','2019-11-30 07:11:27',7,_binary '\0',2,1,0,1,1,13,0,NULL),(41,1962,'2019-12-03 10:50:31',1,0.00,NULL,NULL,0,0,5,2,'3','2019-12-03 05:20:31',5,_binary '\0',1,2,0,1,1,8,0,8908841360),(42,2043,'2019-12-03 10:50:31',1,0.00,NULL,NULL,0,0,5,2,'3','2019-12-03 05:20:31',5,_binary '\0',1,2,0,1,1,8,0,9583673796),(43,1861,'2019-12-03 11:26:47',1,0.00,'','',1,0,5,2,'3','2019-12-03 05:58:20',1,_binary '\0',2,1,0,1,1,8,0,NULL),(44,2087,'2019-12-03 11:52:47',1,0.00,'','',1,0,5,2,'3','2019-12-03 06:24:19',1,_binary '\0',2,1,0,1,1,8,0,NULL),(45,1879,'2019-12-03 12:24:49',1,0.00,NULL,NULL,0,0,5,2,'3','2019-12-03 06:54:49',5,_binary '\0',1,2,0,1,1,8,0,7873700380),(46,1807,'2019-12-03 12:24:49',1,0.00,NULL,NULL,0,0,5,2,'3','2019-12-03 06:54:49',5,_binary '\0',1,2,0,1,1,8,0,8908267017),(47,1984,'2019-12-03 12:24:49',1,0.00,NULL,NULL,0,0,5,2,'3','2019-12-03 06:54:49',5,_binary '\0',1,2,0,1,1,8,0,8458011018),(48,1965,'2019-12-03 12:56:39',0,0.00,NULL,NULL,0,0,5,2,'3','2019-12-03 07:26:39',5,_binary '\0',1,2,0,1,1,8,0,7064642342),(49,1831,'2019-12-03 12:56:05',1,0.00,'','',1,0,5,2,'3','2019-12-03 07:27:37',1,_binary '\0',2,1,0,1,1,8,0,NULL);
/*!40000 ALTER TABLE `t_ms_feedback_received` ENABLE KEYS */;
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
