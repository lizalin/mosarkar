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
-- Table structure for table `t_ms_notification_logs`
--

DROP TABLE IF EXISTS `t_ms_notification_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ms_notification_logs` (
  `intNotificationLogId` int(11) NOT NULL AUTO_INCREMENT,
  `intCreatedBy` int(11) DEFAULT NULL,
  `intTotalCalls` int(11) DEFAULT '0',
  `intStatus` int(11) DEFAULT '0',
  `dtmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dtmUpdatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `callType` int(11) DEFAULT '1' COMMENT '1.Call Notification\n2. End Calls',
  PRIMARY KEY (`intNotificationLogId`),
  KEY `index1` (`intNotificationLogId`,`intCreatedBy`,`intTotalCalls`,`intStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_ms_notification_logs`
--

LOCK TABLES `t_ms_notification_logs` WRITE;
/*!40000 ALTER TABLE `t_ms_notification_logs` DISABLE KEYS */;
INSERT INTO `t_ms_notification_logs` VALUES (1,2,1,1,'2019-11-30 06:46:43','2019-11-30 06:46:43',1),(2,2,1,1,'2019-11-30 06:50:03','2019-11-30 06:50:03',1),(3,2,1,1,'2019-11-30 06:50:07','2019-11-30 06:50:07',2),(4,2,1,1,'2019-11-30 06:50:33','2019-11-30 06:50:33',1),(5,2,1,1,'2019-11-30 06:50:43','2019-11-30 06:50:43',2),(6,2,1,1,'2019-11-30 06:57:26','2019-11-30 06:57:26',1),(7,2,1,1,'2019-11-30 07:09:51','2019-11-30 07:09:51',1),(8,2,1,1,'2019-11-30 07:11:20','2019-11-30 07:11:20',1),(9,5,2,1,'2019-12-03 05:58:08','2019-12-03 05:58:08',1),(10,5,1,1,'2019-12-03 07:27:05','2019-12-03 07:27:05',1),(11,1,1,1,'2020-02-10 05:41:06','2020-02-10 05:41:06',1),(12,1,1,1,'2020-02-10 05:41:21','2020-02-10 05:41:21',2);
/*!40000 ALTER TABLE `t_ms_notification_logs` ENABLE KEYS */;
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
