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
-- Table structure for table `t_ms_feedback_ans_submited`
--

DROP TABLE IF EXISTS `t_ms_feedback_ans_submited`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ms_feedback_ans_submited` (
  `intFeedbackSubmitedId` int(11) NOT NULL AUTO_INCREMENT,
  `intOutboundDataId` int(11) DEFAULT '0' COMMENT 'This id is related to intFeedbackRecId of t_ms_feedback_received',
  `intQuestionId` int(11) DEFAULT '0',
  `intAnswerId` varchar(128) DEFAULT '0',
  `dtmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `intCreatedBy` int(11) DEFAULT '0',
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  `intType` int(11) DEFAULT '0' COMMENT '0. OutBound\n1. Department',
  `vchRemarks` varchar(256) DEFAULT NULL,
  `vchAnswerWritten` varchar(524) DEFAULT NULL,
  PRIMARY KEY (`intFeedbackSubmitedId`),
  KEY `ForenKey` (`intOutboundDataId`),
  KEY `Type` (`intOutboundDataId`,`intType`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_ms_feedback_ans_submited`
--

LOCK TABLES `t_ms_feedback_ans_submited` WRITE;
/*!40000 ALTER TABLE `t_ms_feedback_ans_submited` DISABLE KEYS */;
INSERT INTO `t_ms_feedback_ans_submited` VALUES (2,1,1,'1','2019-11-14 05:48:26',3,_binary '\0',0,'',NULL),(4,2,1,'1','2019-11-14 06:40:06',3,_binary '\0',0,'',NULL),(5,4,1,'1','2019-11-14 09:11:11',3,_binary '\0',0,'',NULL),(6,5,1,'1','2019-11-14 10:18:46',4,_binary '\0',0,'',NULL),(7,6,1,'1','2019-11-14 10:30:43',3,_binary '\0',0,'',NULL),(8,8,1,'1','2019-11-14 10:37:43',3,_binary '\0',0,'',NULL),(9,9,1,'2','2019-11-14 10:37:58',3,_binary '\0',0,'',NULL),(10,10,1,'1','2019-11-15 06:53:50',3,_binary '\0',0,'',NULL),(11,10,2,'4','2019-11-15 06:53:50',3,_binary '\0',0,'',NULL),(12,10,3,'6','2019-11-15 06:53:50',3,_binary '\0',0,'',NULL),(13,10,4,'7','2019-11-15 06:53:50',3,_binary '\0',0,'',NULL),(14,11,1,'1','2019-11-15 07:00:08',3,_binary '\0',0,'',NULL),(15,11,2,'4','2019-11-15 07:00:08',3,_binary '\0',0,'',NULL),(16,11,3,'5','2019-11-15 07:00:08',3,_binary '\0',0,'',NULL),(17,11,4,'8','2019-11-15 07:00:08',3,_binary '\0',0,'',NULL),(18,17,1,'1','2019-11-19 05:01:20',3,_binary '\0',0,'',NULL),(19,17,2,'3','2019-11-19 05:01:20',3,_binary '\0',0,'',NULL),(20,17,3,'6','2019-11-19 05:01:20',3,_binary '\0',0,'',NULL),(21,17,4,'7','2019-11-19 05:01:20',3,_binary '\0',0,'',NULL),(22,18,1,'1','2019-11-19 05:02:17',5,_binary '\0',0,'',NULL),(23,18,2,'3','2019-11-19 05:02:17',5,_binary '\0',0,'',NULL),(24,18,3,'6','2019-11-19 05:02:17',5,_binary '\0',0,'',NULL),(25,18,4,'7','2019-11-19 05:02:17',5,_binary '\0',0,'',NULL),(26,19,1,'1','2019-11-19 05:13:41',4,_binary '\0',0,'',NULL),(27,19,2,'3','2019-11-19 05:13:41',4,_binary '\0',0,'',NULL),(28,20,1,'1','2019-11-26 06:28:33',2,_binary '\0',0,'',NULL),(29,20,2,'4','2019-11-26 06:28:33',2,_binary '\0',0,'',NULL),(30,20,3,'5','2019-11-26 06:28:33',2,_binary '\0',0,'',NULL),(31,20,4,'8','2019-11-26 06:28:33',2,_binary '\0',0,'',NULL),(32,22,1,'1','2019-11-29 10:40:36',1,_binary '\0',0,'',''),(33,22,2,'4','2019-11-29 10:40:36',1,_binary '\0',0,'',''),(34,22,3,'6','2019-11-29 10:40:36',1,_binary '\0',0,'','3'),(35,22,4,'7,8','2019-11-29 10:40:36',1,_binary '\0',0,'','5 kg~::~5 kg'),(36,22,5,'9,10','2019-11-29 10:40:36',1,_binary '\0',0,'','6 kg~::~8 kg'),(37,22,6,'11','2019-11-29 10:40:36',1,_binary '\0',0,'',''),(38,22,7,'13','2019-11-29 10:40:36',1,_binary '\0',0,'',''),(39,22,8,'17','2019-11-29 10:40:36',1,_binary '\0',0,'',''),(40,22,9,'18','2019-11-29 10:40:36',1,_binary '\0',0,'',''),(41,24,1,'1','2019-11-29 11:50:23',2,_binary '\0',0,'',''),(42,24,2,'3','2019-11-29 11:50:23',2,_binary '\0',0,'',''),(43,24,6,'11','2019-11-29 11:50:23',2,_binary '\0',0,'',''),(44,24,7,'13','2019-11-29 11:50:23',2,_binary '\0',0,'',''),(45,24,8,'17','2019-11-29 11:50:23',2,_binary '\0',0,'',''),(46,24,9,'18','2019-11-29 11:50:23',2,_binary '\0',0,'',''),(47,33,3,'6','2019-11-29 11:57:33',7,_binary '\0',0,'',''),(48,33,4,'7,8','2019-11-29 11:57:33',7,_binary '\0',0,'',''),(49,33,5,'9,10','2019-11-29 11:57:33',7,_binary '\0',0,'',''),(50,35,3,'6','2019-11-30 06:47:20',7,_binary '\0',0,'',''),(51,35,4,'7,8','2019-11-30 06:47:20',7,_binary '\0',0,'',''),(52,35,5,'9,10','2019-11-30 06:47:20',7,_binary '\0',0,'',''),(53,36,3,'6','2019-11-30 06:47:25',7,_binary '\0',0,'',''),(54,36,4,'7,8','2019-11-30 06:47:25',7,_binary '\0',0,'',''),(55,36,5,'9,10','2019-11-30 06:47:25',7,_binary '\0',0,'',''),(56,37,3,'6','2019-11-30 06:47:30',7,_binary '\0',0,'',''),(57,37,4,'7,8','2019-11-30 06:47:30',7,_binary '\0',0,'',''),(58,37,5,'9,10','2019-11-30 06:47:30',7,_binary '\0',0,'',''),(59,40,1,'2','2019-11-30 07:11:43',2,_binary '\0',0,'',''),(60,40,2,'3','2019-11-30 07:11:43',2,_binary '\0',0,'',''),(61,40,6,'11','2019-11-30 07:11:43',2,_binary '\0',0,'',''),(62,40,7,'14','2019-11-30 07:11:43',2,_binary '\0',0,'',''),(63,40,8,'17','2019-11-30 07:11:43',2,_binary '\0',0,'',''),(64,40,9,'18','2019-11-30 07:11:43',2,_binary '\0',0,'',''),(65,41,1,'2','2019-12-03 05:43:37',5,_binary '\0',0,'',''),(66,41,2,'3','2019-12-03 05:43:37',5,_binary '\0',0,'',''),(67,41,6,'12','2019-12-03 05:43:37',5,_binary '\0',0,'',''),(68,41,7,'13','2019-12-03 05:43:37',5,_binary '\0',0,'',''),(69,41,8,'17','2019-12-03 05:43:37',5,_binary '\0',0,'',''),(70,41,9,'19','2019-12-03 05:43:37',5,_binary '\0',0,'',''),(71,43,1,'2','2019-12-03 06:11:37',5,_binary '\0',0,'',''),(72,43,2,'4','2019-12-03 06:11:37',5,_binary '\0',0,'',''),(73,43,6,'11','2019-12-03 06:11:37',5,_binary '\0',0,'',''),(74,43,7,'14','2019-12-03 06:11:37',5,_binary '\0',0,'',''),(75,43,8,'17','2019-12-03 06:11:37',5,_binary '\0',0,'',''),(76,43,9,'18','2019-12-03 06:11:37',5,_binary '\0',0,'',''),(77,42,1,'2','2019-12-03 06:19:47',5,_binary '\0',0,'',''),(78,42,2,'3','2019-12-03 06:19:47',5,_binary '\0',0,'',''),(79,42,6,'12','2019-12-03 06:19:47',5,_binary '\0',0,'',''),(80,42,7,'14','2019-12-03 06:19:47',5,_binary '\0',0,'',''),(81,42,8,'17','2019-12-03 06:19:47',5,_binary '\0',0,'',''),(82,42,9,'18','2019-12-03 06:19:47',5,_binary '\0',0,'',''),(83,44,1,'2','2019-12-03 06:27:10',5,_binary '\0',0,'',''),(84,44,2,'4','2019-12-03 06:27:10',5,_binary '\0',0,'',''),(85,44,3,'6','2019-12-03 06:27:10',5,_binary '\0',0,'','adf'),(86,44,4,'7,8','2019-12-03 06:27:10',5,_binary '\0',0,'','asdf~::~asdf'),(87,44,5,'9,10','2019-12-03 06:27:10',5,_binary '\0',0,'','asdf~::~asdf'),(88,44,6,'12','2019-12-03 06:27:10',5,_binary '\0',0,'',''),(89,44,7,'13','2019-12-03 06:27:10',5,_binary '\0',0,'',''),(90,44,8,'17','2019-12-03 06:27:10',5,_binary '\0',0,'',''),(91,44,9,'18','2019-12-03 06:27:10',5,_binary '\0',0,'',''),(92,45,1,'1','2019-12-03 06:56:13',5,_binary '\0',0,'',''),(93,45,2,'4','2019-12-03 06:56:13',5,_binary '\0',0,'',''),(94,45,3,'6','2019-12-03 06:56:13',5,_binary '\0',0,'','3 members'),(95,45,4,'7,8','2019-12-03 06:56:13',5,_binary '\0',0,'','5 kg q~::~quantity'),(96,45,5,'9,10','2019-12-03 06:56:13',5,_binary '\0',0,'','4 kg price~::~prices'),(97,45,6,'11','2019-12-03 06:56:13',5,_binary '\0',0,'',''),(98,45,7,'14','2019-12-03 06:56:13',5,_binary '\0',0,'',''),(99,45,8,'16','2019-12-03 06:56:13',5,_binary '\0',0,'',''),(100,45,9,'18','2019-12-03 06:56:13',5,_binary '\0',0,'','');
/*!40000 ALTER TABLE `t_ms_feedback_ans_submited` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:12
