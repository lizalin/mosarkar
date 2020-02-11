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
-- Table structure for table `t_ms_survey_questionnaire_option`
--

DROP TABLE IF EXISTS `t_ms_survey_questionnaire_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ms_survey_questionnaire_option` (
  `intSurveyOptionId` int(11) NOT NULL AUTO_INCREMENT,
  `intSurveyQuestId` int(11) NOT NULL DEFAULT '0',
  `intOptionSlNo` int(11) DEFAULT NULL,
  `vchOptionEnglish` varchar(128) DEFAULT NULL,
  `vchOptionOdia` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `intOptionValue` varchar(28) DEFAULT NULL,
  `intCreatedBy` int(11) DEFAULT '0',
  `dtmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `intUpdatedBy` int(11) DEFAULT '0',
  `dtmUpdateOn` datetime DEFAULT NULL,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  PRIMARY KEY (`intSurveyOptionId`),
  KEY `FK_SURVEY_QUEST_ID` (`intSurveyQuestId`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_ms_survey_questionnaire_option`
--

LOCK TABLES `t_ms_survey_questionnaire_option` WRITE;
/*!40000 ALTER TABLE `t_ms_survey_questionnaire_option` DISABLE KEYS */;
INSERT INTO `t_ms_survey_questionnaire_option` VALUES (1,1,NULL,'Yes','Yes','1',1,'2019-11-29 09:46:01',0,NULL,_binary '\0'),(2,1,NULL,'No','No','0',1,'2019-11-29 09:46:01',0,NULL,_binary '\0'),(3,2,NULL,'PHH (NFSA)','PHH (NFSA)','0',1,'2019-11-29 09:46:01',0,NULL,_binary '\0'),(4,2,NULL,'AAY (NFSA)','AAY (NFSA)','0',1,'2019-11-29 09:46:01',0,NULL,_binary '\0'),(5,2,NULL,'SFSS','SFSS','0',1,'2019-11-29 09:46:01',0,NULL,_binary '\0'),(6,3,NULL,'Please enter family members','Please enter family members','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(7,4,NULL,'Rice','Rice','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(8,4,NULL,'Wheat','Wheat','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(9,5,NULL,'Rice','Rice','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(10,5,NULL,'Wheat','Wheat','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(11,6,NULL,'Yes','Yes','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(12,6,NULL,'No','No','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(13,7,NULL,'Yes','Yes','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(14,7,NULL,'No','No','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(15,8,NULL,'1','1','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(16,8,NULL,'2','2','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(17,8,NULL,'MORE THAN 3','MORE THAN 3','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(18,9,NULL,'GOOD','GOOD','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(19,9,NULL,'AVERAGE','AVERAGE','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(20,9,NULL,'BAD','BAD','0',1,'2019-11-29 09:53:11',0,NULL,_binary '\0'),(21,10,NULL,'Yes','Yes','1',1,'2020-02-10 12:13:11',0,NULL,_binary '\0'),(22,10,NULL,'No','No','0',1,'2020-02-10 12:13:11',0,NULL,_binary '\0'),(23,11,NULL,'Yes','Yes','1',1,'2020-02-10 12:29:30',0,NULL,_binary '\0'),(24,11,NULL,'No','No','0',1,'2020-02-10 12:29:30',0,NULL,_binary '\0'),(25,12,NULL,'Yes','Yes','1',1,'2020-02-10 12:30:15',0,NULL,_binary '\0'),(26,12,NULL,'No','No','0',1,'2020-02-10 12:30:15',0,NULL,_binary '\0');
/*!40000 ALTER TABLE `t_ms_survey_questionnaire_option` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:15
