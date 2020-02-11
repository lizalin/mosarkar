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
-- Table structure for table `m_admin_function_master`
--

DROP TABLE IF EXISTS `m_admin_function_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_admin_function_master` (
  `INT_FUN_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `VCH_FUN_NAME` varchar(100) NOT NULL,
  `VCH_FILE_NAME` varchar(100) NOT NULL,
  `VCH_DESCRIPTION` varchar(500) DEFAULT NULL,
  `VCH_ACTION1` varchar(20) DEFAULT NULL,
  `VCH_ACTION2` varchar(20) DEFAULT NULL,
  `VCH_ACTION3` varchar(20) DEFAULT NULL,
  `INT_MAIL` int(10) unsigned NOT NULL,
  `INT_FREEBEES` int(10) unsigned NOT NULL,
  `VCH_PORTLET_NAME` varchar(50) DEFAULT NULL,
  `INT_STATUS` int(10) unsigned NOT NULL,
  `INT_CREATED_BY` int(10) unsigned NOT NULL,
  `INT_UPDATED_BY` int(10) unsigned DEFAULT NULL,
  `DTM_CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DTM_UPDATED_ON` varchar(50) DEFAULT NULL,
  `BIT_DELETED_FLAG` bit(1) DEFAULT b'0',
  `VCH_RELATED_PAGES` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`INT_FUN_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_admin_function_master`
--

LOCK TABLES `m_admin_function_master` WRITE;
/*!40000 ALTER TABLE `m_admin_function_master` DISABLE KEYS */;
INSERT INTO `m_admin_function_master` VALUES (110,'View Feedback','viewfeedback','','Add','View','Manage',2,2,'',1,1,1,'2019-09-20 08:06:12','2019-09-20 14:26:58',_binary '\0',''),(111,'Service Registration','viewService','','Add','Edit','Modify',2,2,'',1,1,NULL,'2019-09-20 09:34:41',NULL,_binary '\0',''),(112,'Service Transaction Excel Import ','serviceTranscationExcelImport','','Add','Edit','Manage',2,2,'',1,1,NULL,'2019-09-20 09:53:58',NULL,_binary '\0',''),(113,'FAQ Management','viewFAQ','','Add','Edit','Modify',2,2,'',1,1,NULL,'2019-09-20 10:29:11',NULL,_binary '\0',''),(114,'Survey Questionnaire','addSurveyQuestionnaire','','Add','Edit','Modify',2,2,'',1,1,NULL,'2019-09-20 10:53:11',NULL,_binary '\0',''),(115,'Add InBound','addInBound','','Add','Edit','Modify',2,2,'',1,1,NULL,'2019-09-20 13:16:01',NULL,_binary '\0',''),(116,'Profile Details','profileDetails','','add','edit','madify',2,2,'',1,1,NULL,'2019-09-23 06:00:07',NULL,_binary '\0',''),(117,'Inbound call summary','viewInbound','','add','view','manage',2,2,'',1,1,NULL,'2019-09-28 09:15:25',NULL,_binary '\0',''),(118,'Outbound Call Report','outboundMisReport','','add','view','manage',2,2,'',1,1,1,'2019-09-28 09:16:35','2019-10-05 18:02:19',_binary '\0',''),(119,'Outbound Call Summary','outboundDataMis','','add','view','Manage',2,2,'',1,1,1,'2019-09-28 09:17:31','2019-10-05 18:22:26',_binary '\0',''),(120,'Inbound Call Report','viewDetails','','add','view','manage',2,2,'',1,1,NULL,'2019-09-28 09:18:06',NULL,_binary '\0',''),(121,'mosarkar_regd_report','mosarkarRegistrationReport','','add','view','manage',2,2,'',1,1,NULL,'2019-09-30 11:31:36',NULL,_binary '\0','mosarkar_regd_report'),(122,'Agent Dashboard','agentdashboard','','add','view','manage',2,2,'',1,1,NULL,'2019-10-01 05:21:51',NULL,_binary '\0',''),(123,'Out Bound Call Summary','outboundDataMis','','add','view','Manage',2,2,'',1,1,NULL,'2019-10-05 12:50:51',NULL,_binary '\0',''),(124,'Authority Feedback Report','authorityFeedbackReport','','Add','Edit','Modify',2,2,'',1,1,NULL,'2019-10-08 10:18:16',NULL,_binary '\0',''),(125,'Outbound BPO Mis Report','outboundBPOMisReport','','Add','Edit','Modify',2,2,'',1,1,NULL,'2019-10-09 09:23:20',NULL,_binary '\0',''),(126,'Inbound BPO MIS Report','inboundBPOMisReport','','Add','Edit','Modify',2,2,'',1,1,NULL,'2019-10-09 11:19:23',NULL,_binary '\0',''),(127,'Collect Offline Feedback','collectOfflineFeedback','','Add','Edit','Modify',2,2,'',1,1,NULL,'2019-10-17 12:14:16',NULL,_binary '\0',''),(128,'Institution Feedback Report','institutionFeedbackReport','','Add','Edit','Modify',2,2,'',1,1,NULL,'2019-10-21 03:54:55',NULL,_binary '\0',''),(129,'Outboud Call Summary - CC','outboundDataCC','outboundDataCC','add','view','manage',2,2,'',1,1,NULL,'2019-10-21 05:24:58',NULL,_binary '\0','outboundDataCC'),(130,'Cron Log Confugration','addCronConfig','','add','view','manage',2,2,'',1,1,NULL,'2019-10-22 10:15:40',NULL,_binary '\0',''),(131,'districtFeedbackReport','districtFeedbackReport','','add','view','edit',2,2,'',1,1,NULL,'2019-10-24 10:53:53',NULL,_binary '\0',''),(132,'Service Data Excel Import','serviceDataExcelImport','','Add','Edit','Manage',2,2,'',2,1,1,'2020-02-10 07:30:46','2020-02-10 13:43:05',_binary '\0',''),(133,'Visitor Registration','visitorRegistration','','Add','Edit','Modify',2,2,'',1,1,NULL,'2020-02-11 05:56:26',NULL,_binary '\0','');
/*!40000 ALTER TABLE `m_admin_function_master` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:21
