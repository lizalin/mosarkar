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
-- Table structure for table `m_admin_pl_master`
--

DROP TABLE IF EXISTS `m_admin_pl_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_admin_pl_master` (
  `INT_PL_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `INT_GL_ID` int(10) unsigned NOT NULL,
  `VCH_PL_NAME` varchar(50) NOT NULL,
  `INT_SL_NO` int(5) unsigned NOT NULL,
  `VCH_FUNC_FILE` varchar(100) NOT NULL,
  `INT_STATUS` int(10) unsigned NOT NULL,
  `INT_SHOW_ON_HOME` int(10) unsigned DEFAULT NULL,
  `VCH_LOC_ID` varchar(200) DEFAULT NULL,
  `INT_LINK_TYPE` int(10) unsigned DEFAULT NULL,
  `INT_CREATED_BY` int(10) unsigned DEFAULT NULL,
  `INT_UPDATED_BY` int(10) unsigned DEFAULT NULL,
  `DTM_CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DTM_UPDATED_ON` varchar(45) DEFAULT NULL,
  `BIT_DELETED_FLAG` bit(1) DEFAULT b'0',
  `VCH_RELATED_PAGES` varchar(528) DEFAULT NULL,
  PRIMARY KEY (`INT_PL_ID`),
  KEY `FK_GL_ID` (`INT_GL_ID`),
  KEY `IND_PL_NAME` (`VCH_PL_NAME`),
  KEY `IND_PL_STATUS` (`INT_STATUS`),
  KEY `IND_PL_SL_NO` (`INT_SL_NO`),
  CONSTRAINT `FK_GL_ID` FOREIGN KEY (`INT_GL_ID`) REFERENCES `m_admin_gl_master` (`INT_GL_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_admin_pl_master`
--

LOCK TABLES `m_admin_pl_master` WRITE;
/*!40000 ALTER TABLE `m_admin_pl_master` DISABLE KEYS */;
INSERT INTO `m_admin_pl_master` VALUES (118,22,'Feedback',1,'110',1,1,'All',1,1,1,'2019-09-20 08:06:47','2019-09-20 14:27:43',_binary '\0',NULL),(119,7,'Service Registration',2,'111',1,1,'All',1,1,NULL,'2019-09-20 09:34:54',NULL,_binary '\0',NULL),(120,7,'Service Transaction',3,'112',1,1,'All',1,1,1,'2019-09-20 09:54:12','2019-09-20 18:08:15',_binary '\0',NULL),(121,23,'In Bound',4,'110',2,1,'All',1,1,1,'2019-09-20 10:18:49','2019-09-20 18:07:31',_binary '\0',NULL),(122,23,'Outbound Call Registration',5,'110',1,1,'All',1,1,1,'2019-09-20 10:19:03','2019-10-01 13:14:48',_binary '\0',NULL),(123,7,'FAQ Management',6,'113',1,1,'All',1,1,NULL,'2019-09-20 10:29:36',NULL,_binary '\0',NULL),(124,7,'Survey Questionnaire',7,'114',1,1,'All',1,1,NULL,'2019-09-20 10:53:38',NULL,_binary '\0',NULL),(125,23,'Inbound Call Registration',11,'115',2,1,'All',1,1,1,'2019-09-20 13:16:25','2019-10-28 13:47:35',_binary '\0',NULL),(126,23,'Profile Details',9,'116',2,1,'All',1,1,1,'2019-09-23 06:10:11','2019-09-26 11:45:12',_binary '\0',NULL),(127,23,'Inbound Call Summary',12,'117',2,1,'All',1,1,1,'2019-09-28 09:20:15','2019-10-28 13:47:35',_binary '\0',NULL),(128,23,'Outbound Call Summary',10,'119',1,1,'All',1,1,1,'2019-09-28 09:20:31','2019-10-05 18:21:09',_binary '\0',NULL),(129,24,'Inbound Call Report',13,'120',2,1,'All',1,1,1,'2019-09-29 09:36:22','2019-10-05 18:02:35',_binary '\0',NULL),(130,24,'Outbound Call Report',14,'118',1,1,'All',1,1,1,'2019-09-29 09:36:37','2019-09-29 15:11:07',_binary '\0',NULL),(131,24,'Mo Sarkar Regd. Report',15,'121',2,1,'All',1,1,1,'2019-09-30 11:32:13','2019-10-05 18:02:35',_binary '\0',NULL),(132,25,'Agent Dashboard',16,'122',1,1,'All',1,1,1,'2019-10-01 05:22:38','2019-10-01 10:53:13',_binary '\0',NULL),(133,24,'Authority Feedback Report',17,'124',1,1,'All',1,1,NULL,'2019-10-08 10:18:52',NULL,_binary '\0',NULL),(134,24,'Outbound BPO MIS Report',18,'125',1,1,'All',1,1,1,'2019-10-09 09:23:44','2019-10-09 16:50:08',_binary '',NULL),(135,24,'Inbound BPO MIS Report',19,'126',2,1,'All',1,1,1,'2019-10-09 11:19:50','2019-10-28 13:49:06',_binary '\0',NULL),(136,23,'Offline Feedback',20,'127',1,1,'All',1,1,NULL,'2019-10-17 12:14:58',NULL,_binary '\0',NULL),(137,24,'Institution Feedback Report',21,'128',1,1,'All',1,1,NULL,'2019-10-21 03:55:16',NULL,_binary '',NULL),(138,23,'Out Bound Call Summary - CC',22,'129',1,1,'All',1,1,NULL,'2019-10-21 05:25:38',NULL,_binary '\0',NULL),(139,7,'Cronjob Config',23,'130',1,1,'All',1,1,NULL,'2019-10-22 10:16:25',NULL,_binary '\0',NULL),(140,24,'District Feedback Report',24,'131',1,1,'All',1,1,NULL,'2019-10-24 10:55:23',NULL,_binary '\0',NULL),(141,7,'Service Data',25,'132',2,1,'All',1,1,1,'2020-02-10 07:31:29','2020-02-10 13:43:38',_binary '\0',NULL),(142,23,'Visitor Registration',26,'133',1,1,'All',1,1,NULL,'2020-02-11 05:57:52',NULL,_binary '\0',NULL);
/*!40000 ALTER TABLE `m_admin_pl_master` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:16
