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
-- Table structure for table `t_ms_survey_questionnaire`
--

DROP TABLE IF EXISTS `t_ms_survey_questionnaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ms_survey_questionnaire` (
  `intSurveyQuestId` int(11) NOT NULL AUTO_INCREMENT,
  `intDepartmentId` int(11) DEFAULT '0',
  `intServicesId` int(11) DEFAULT '0',
  `intType` int(11) DEFAULT '0' COMMENT '1. Qualitative, 2. Quantitative',
  `intQuestionSlNo` int(11) DEFAULT NULL,
  `vchQuestionEnglish` varchar(256) DEFAULT NULL,
  `vchQuestionOdia` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `vchShortName` varchar(156) DEFAULT NULL,
  `intOptionSelection` int(11) DEFAULT '0' COMMENT '1. Single, 2. Multiple',
  `vchDescription` varchar(556) DEFAULT NULL,
  `intCreatedBy` int(11) DEFAULT '0',
  `dtmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `intUpdatedBy` int(11) DEFAULT '0',
  `dtmUpdateOn` datetime DEFAULT NULL,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  `intRemarksStatus` int(11) DEFAULT '0' COMMENT '0. Not Remarks\n1. Remarks Required',
  PRIMARY KEY (`intSurveyQuestId`),
  KEY `FK_DEPARTMENT_ID` (`intDepartmentId`),
  KEY `FK_SERVICE_ID` (`intServicesId`),
  KEY `FK_DEPARTMENT_SERVICE` (`intDepartmentId`,`intServicesId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_ms_survey_questionnaire`
--

LOCK TABLES `t_ms_survey_questionnaire` WRITE;
/*!40000 ALTER TABLE `t_ms_survey_questionnaire` DISABLE KEYS */;
INSERT INTO `t_ms_survey_questionnaire` VALUES (1,1,1,2,NULL,'Have you received a ration card ?','Have you received a ration card ?','Have you received a ration card',1,'Have you received a ration card',1,'2019-11-29 09:46:01',0,NULL,_binary '\0',0),(2,1,1,2,NULL,'Which category of ration card you have ?','Which category of ration card you have ?','Which category of ration card you have ?',1,'Which category of ration card you have ?',1,'2019-11-29 09:46:01',0,NULL,_binary '\0',0),(3,1,1,2,NULL,'How many family members enrolled in the ration card ?','How many family members enrolled in the ration card ?','How many family members enrolled in the ration card ?',3,'How many family members enrolled in the ration card ?',1,'2019-11-29 09:53:10',0,NULL,_binary '\0',0),(4,1,1,2,NULL,'What quantity of foodgrain you get every month (in KG) ?','What quantity of foodgrain you get every month (in KG) ?','What quantity of foodgrain you get every month ?',3,'What quantity of foodgrain you get every month ?',1,'2019-11-29 09:53:11',0,NULL,_binary '\0',0),(5,1,1,2,NULL,'What is the price of foodgrain you pay per Kg (in Rs.) ?','What is the price of foodgrain you pay per Kg (in Rs.) ?','What is the price of foodgrain you pay per Kg ?',3,'What is the price of foodgrain you pay per Kg ?',1,'2019-11-29 09:53:11',0,NULL,_binary '\0',0),(6,1,1,2,NULL,'Do you receive foodgrains from Dealer on proper weighment ?','Do you receive foodgrains from Dealer on proper weighment ?','Do you receive foodgrains from Dealer on proper weighment ?',1,'Do you receive foodgrains from Dealer on proper weighment ?',1,'2019-11-29 09:53:11',0,NULL,_binary '\0',0),(7,1,1,2,NULL,'Are you satisfied with quality of foodgrains supplied to you ?','Are you satisfied with quality of foodgrains supplied to you ?','Are you satisfied with quality of foodgrains supplied to you ?',1,'Are you satisfied with quality of foodgrains supplied to you ?',1,'2019-11-29 09:53:11',0,NULL,_binary '\0',0),(8,1,1,2,NULL,'How many times you have to go to the Dealer to get entitlement ?','How many times you have to go to the Dealer to get entitlement ?','How many times you have to go to the Dealer to get entitlement ?',1,'How many times you have to go to the Dealer to get entitlement ?',1,'2019-11-29 09:53:11',0,NULL,_binary '\0',0),(9,1,1,2,NULL,'How is the behaviour of the Dealer ?','How is the behaviour of the Dealer ?','How is the behaviour of the Dealer ?',1,'How is the behaviour of the Dealer ?',1,'2019-11-29 09:53:11',0,NULL,_binary '\0',0),(10,1,2,2,NULL,'Have You received the payment ?','Have You received the payment ?','Have You received the payment ?',2,'Have You received the payment ?',1,'2020-02-10 12:13:11',0,NULL,_binary '\0',0),(11,1,2,2,NULL,'Do you faced any diffcuties during selling of paddy?','Do you faced any diffcuties during selling of paddy?','Do you faced any diffcuties during selling of paddy?',1,'Do you faced any diffcuties during selling of paddy?',1,'2020-02-10 12:29:30',0,NULL,_binary '\0',0),(12,1,2,2,NULL,'Have you recived token for the selling of paddy?','Have you recived token for the selling of paddy?','Have you recived token for the selling of paddy?',1,'Have you recived token for the selling of paddy?',1,'2020-02-10 12:30:15',0,NULL,_binary '\0',0);
/*!40000 ALTER TABLE `t_ms_survey_questionnaire` ENABLE KEYS */;
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
