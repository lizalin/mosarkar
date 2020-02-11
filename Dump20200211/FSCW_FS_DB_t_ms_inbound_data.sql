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
-- Table structure for table `t_ms_inbound_data`
--

DROP TABLE IF EXISTS `t_ms_inbound_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ms_inbound_data` (
  `intInboundDataId` int(11) NOT NULL AUTO_INCREMENT,
  `varReferenceNo` varchar(45) DEFAULT NULL,
  `intCreatedBy` int(11) DEFAULT NULL,
  `intMobile` bigint(20) DEFAULT NULL,
  `vchName` varchar(128) DEFAULT NULL,
  `intServiceId` int(11) DEFAULT '0',
  `intDistrictId` int(11) DEFAULT NULL,
  `intBlockId` int(11) DEFAULT '0',
  `intGPId` int(11) DEFAULT '0',
  `intVillageId` int(11) DEFAULT '0',
  `vchAddress` text,
  `intGender` int(11) DEFAULT NULL COMMENT '1.Male, 2.Female, 3. Transgender',
  `dtmCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dtmUpdatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  `vchComplain` text,
  `intAge` int(11) DEFAULT NULL,
  `int_hs_ps_id` int(11) DEFAULT NULL,
  `intDepartmentId` int(11) DEFAULT NULL,
  `intLocation` varchar(45) DEFAULT NULL,
  `intBookmark` int(11) DEFAULT '0',
  `intAssignedTo` int(11) DEFAULT '0',
  `dtmAssignedTime` datetime DEFAULT NULL,
  `dtmFeedbackRcvTime` datetime DEFAULT NULL,
  `intFeedbackStatus` int(11) DEFAULT '0',
  `intRequestStatus` int(11) DEFAULT '0',
  `intAnonymousStatus` int(11) DEFAULT '0',
  `intMoSarkarRegistrationStatus` int(11) DEFAULT '1',
  `vchServiceDate` datetime DEFAULT NULL,
  `vchOther` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`intInboundDataId`),
  KEY `index1` (`intInboundDataId`,`intDepartmentId`,`intServiceId`,`intDistrictId`,`int_hs_ps_id`),
  KEY `intInboundDataId` (`intInboundDataId`),
  KEY `intCreatedBy` (`intCreatedBy`),
  KEY `intMobile` (`intMobile`),
  KEY `intServiceId` (`intServiceId`),
  KEY `intDistrictId` (`intDistrictId`),
  KEY `intBlockId` (`intBlockId`),
  KEY `intGPId` (`intGPId`),
  KEY `intVillageId` (`intVillageId`),
  KEY `bitDeletedFlag` (`bitDeletedFlag`),
  KEY `int_hs_ps_id` (`int_hs_ps_id`),
  KEY `intDepartmentId` (`intDepartmentId`),
  KEY `intLocation` (`intLocation`),
  KEY `intAssignedTo` (`intAssignedTo`),
  KEY `intFeedbackStatus` (`intFeedbackStatus`),
  KEY `intRequestStatus` (`intRequestStatus`),
  KEY `intMoSarkarRegistrationStatus` (`intMoSarkarRegistrationStatus`),
  KEY `authorityCallingScreen` (`bitDeletedFlag`,`intRequestStatus`,`dtmAssignedTime`,`intInboundDataId`,`intAssignedTo`),
  KEY `InstitutionWiseReport` (`intInboundDataId`,`int_hs_ps_id`,`intDepartmentId`,`bitDeletedFlag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_ms_inbound_data`
--

LOCK TABLES `t_ms_inbound_data` WRITE;
/*!40000 ALTER TABLE `t_ms_inbound_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_ms_inbound_data` ENABLE KEYS */;
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
