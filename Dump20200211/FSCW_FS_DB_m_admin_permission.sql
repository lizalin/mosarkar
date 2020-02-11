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
-- Table structure for table `m_admin_permission`
--

DROP TABLE IF EXISTS `m_admin_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_admin_permission` (
  `INT_PID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `INT_USER_ID` int(10) NOT NULL,
  `INT_GL_ID` int(10) unsigned NOT NULL,
  `INT_PL_ID` int(10) unsigned NOT NULL,
  `INT_PERMISSION` int(10) unsigned NOT NULL,
  `INT_GROUP` int(10) DEFAULT NULL,
  `DTM_CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `INT_CREATED_BY` int(10) unsigned DEFAULT NULL,
  `DTM_UPDATED_ON` datetime DEFAULT NULL,
  `INT_UPDATED_BY` int(10) unsigned DEFAULT NULL,
  `BIT_DELETED_FLAG` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`INT_PID`)
) ENGINE=InnoDB AUTO_INCREMENT=1456 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_admin_permission`
--

LOCK TABLES `m_admin_permission` WRITE;
/*!40000 ALTER TABLE `m_admin_permission` DISABLE KEYS */;
INSERT INTO `m_admin_permission` VALUES (166,35,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(167,36,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(169,38,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(170,39,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(171,40,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(172,41,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(173,42,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(174,70,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(175,45,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(176,43,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(177,46,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(179,44,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(180,48,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(181,49,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(182,50,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(183,51,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(184,52,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(185,54,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(186,53,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(187,55,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(188,57,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(189,58,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(190,56,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(191,59,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(192,60,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(193,61,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(194,62,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(195,63,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(196,65,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(197,64,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(198,66,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(199,68,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(200,67,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(201,69,3,5,3,NULL,'2017-08-03 10:26:26',1,NULL,NULL,_binary '\0'),(229,71,3,5,3,NULL,'2017-08-07 07:06:43',1,NULL,NULL,_binary '\0'),(230,73,3,5,3,NULL,'2017-08-07 07:06:43',1,NULL,NULL,_binary '\0'),(231,74,3,5,3,NULL,'2017-08-07 07:06:43',1,NULL,NULL,_binary '\0'),(232,75,3,5,3,NULL,'2017-08-07 07:06:43',1,NULL,NULL,_binary '\0'),(267,6,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(268,7,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(269,8,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(270,9,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(271,10,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(272,11,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(273,12,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(274,13,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(276,15,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(277,16,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(278,17,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(279,18,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(280,19,3,5,3,NULL,'2017-08-07 09:43:53',1,NULL,NULL,_binary '\0'),(282,21,3,5,3,NULL,'2017-08-07 09:43:54',1,NULL,NULL,_binary '\0'),(283,22,3,5,3,NULL,'2017-08-07 09:43:54',1,NULL,NULL,_binary '\0'),(284,23,3,5,3,NULL,'2017-08-07 09:43:54',1,NULL,NULL,_binary '\0'),(285,24,3,5,3,NULL,'2017-08-07 09:43:54',1,NULL,NULL,_binary '\0'),(286,25,3,5,3,NULL,'2017-08-07 09:43:54',1,NULL,NULL,_binary '\0'),(287,26,3,5,3,NULL,'2017-08-07 09:43:54',1,NULL,NULL,_binary '\0'),(289,28,3,5,3,NULL,'2017-08-07 09:43:54',1,NULL,NULL,_binary '\0'),(291,30,3,5,3,NULL,'2017-08-07 09:43:54',1,NULL,NULL,_binary '\0'),(292,31,3,5,3,NULL,'2017-08-07 09:43:54',1,NULL,NULL,_binary '\0'),(293,47,3,5,3,NULL,'2017-08-17 12:28:20',1,NULL,NULL,_binary '\0'),(295,34,3,5,3,NULL,'2017-08-18 12:03:08',1,NULL,NULL,_binary '\0'),(296,33,3,5,3,NULL,'2017-08-18 12:03:10',1,NULL,NULL,_binary '\0'),(415,88,3,53,3,NULL,'2017-09-19 06:12:57',1,NULL,NULL,_binary '\0'),(418,90,3,53,3,NULL,'2017-09-19 09:53:08',1,NULL,NULL,_binary '\0'),(419,91,3,53,3,NULL,'2017-09-19 09:53:08',1,NULL,NULL,_binary '\0'),(420,92,3,53,3,NULL,'2017-09-19 09:53:08',1,NULL,NULL,_binary '\0'),(440,93,3,5,3,NULL,'2017-09-25 10:02:37',1,NULL,NULL,_binary '\0'),(441,94,3,5,3,NULL,'2017-09-25 10:22:20',1,NULL,NULL,_binary '\0'),(442,95,3,5,3,NULL,'2017-09-25 10:35:25',1,NULL,NULL,_binary '\0'),(443,96,3,5,3,NULL,'2017-09-25 10:38:47',1,NULL,NULL,_binary '\0'),(444,97,3,5,2,NULL,'2017-09-25 10:41:43',1,NULL,NULL,_binary '\0'),(445,98,3,5,3,NULL,'2017-09-25 10:44:01',1,NULL,NULL,_binary '\0'),(446,99,3,5,3,NULL,'2017-09-25 10:45:53',1,NULL,NULL,_binary '\0'),(447,100,3,5,3,NULL,'2017-09-25 10:47:33',1,NULL,NULL,_binary '\0'),(448,101,3,5,3,NULL,'2017-09-25 11:11:38',1,NULL,NULL,_binary '\0'),(449,102,3,5,3,NULL,'2017-09-25 11:13:57',1,NULL,NULL,_binary '\0'),(450,103,3,5,3,NULL,'2017-09-25 11:16:00',1,NULL,NULL,_binary '\0'),(451,104,3,5,3,NULL,'2017-09-25 11:18:05',1,NULL,NULL,_binary '\0'),(452,14,3,5,3,NULL,'2017-09-25 11:22:34',1,NULL,NULL,_binary '\0'),(453,106,3,5,3,NULL,'2017-09-25 11:26:53',1,NULL,NULL,_binary '\0'),(454,107,3,5,3,NULL,'2017-09-25 11:29:17',1,NULL,NULL,_binary '\0'),(455,108,3,5,3,NULL,'2017-09-25 11:31:03',1,NULL,NULL,_binary '\0'),(456,109,3,5,3,NULL,'2017-09-25 11:33:29',1,NULL,NULL,_binary '\0'),(457,110,3,5,3,NULL,'2017-09-25 11:35:12',1,NULL,NULL,_binary '\0'),(458,112,3,5,3,NULL,'2017-09-25 11:40:10',1,NULL,NULL,_binary '\0'),(459,113,3,5,3,NULL,'2017-09-25 11:42:44',1,NULL,NULL,_binary '\0'),(460,114,3,5,3,NULL,'2017-09-25 11:44:24',1,NULL,NULL,_binary '\0'),(461,115,3,5,3,NULL,'2017-09-25 11:46:13',1,NULL,NULL,_binary '\0'),(462,116,3,5,3,NULL,'2017-09-25 11:48:02',1,NULL,NULL,_binary '\0'),(463,117,3,5,3,NULL,'2017-09-25 11:49:48',1,NULL,NULL,_binary '\0'),(464,118,3,5,3,NULL,'2017-09-25 11:51:28',1,NULL,NULL,_binary '\0'),(465,119,3,5,3,NULL,'2017-09-25 11:54:37',1,NULL,NULL,_binary '\0'),(466,120,3,5,3,NULL,'2017-09-25 11:56:32',1,NULL,NULL,_binary '\0'),(467,121,3,5,3,NULL,'2017-09-25 11:59:06',1,NULL,NULL,_binary '\0'),(468,123,3,5,3,NULL,'2017-09-25 12:03:03',1,NULL,NULL,_binary '\0'),(469,124,3,5,3,NULL,'2017-09-25 12:08:47',1,NULL,NULL,_binary '\0'),(472,72,3,5,3,NULL,'2017-09-27 07:18:06',1,NULL,NULL,_binary '\0'),(475,32,3,5,3,NULL,'2017-09-27 11:47:49',81,NULL,NULL,_binary '\0'),(476,32,3,60,3,NULL,'2017-09-27 11:47:49',81,NULL,NULL,_binary '\0'),(495,29,3,5,2,NULL,'2017-10-06 04:19:49',1,NULL,NULL,_binary '\0'),(496,29,3,60,2,NULL,'2017-10-06 04:19:49',1,NULL,NULL,_binary '\0'),(873,81,3,18,3,NULL,'2017-11-01 05:28:19',1,NULL,NULL,_binary '\0'),(875,81,3,39,3,NULL,'2017-11-01 05:28:19',1,NULL,NULL,_binary '\0'),(877,81,3,53,3,NULL,'2017-11-01 05:28:19',1,NULL,NULL,_binary '\0'),(879,81,3,5,3,NULL,'2017-11-01 05:28:19',1,NULL,NULL,_binary '\0'),(881,81,3,60,3,NULL,'2017-11-01 05:28:19',1,NULL,NULL,_binary '\0'),(883,81,3,58,3,NULL,'2017-11-01 05:28:19',1,NULL,NULL,_binary '\0'),(885,81,3,65,3,NULL,'2017-11-01 05:28:19',1,NULL,NULL,_binary '\0'),(887,81,3,66,3,NULL,'2017-11-01 05:28:19',1,NULL,NULL,_binary '\0'),(889,81,3,67,3,NULL,'2017-11-01 05:28:19',1,NULL,NULL,_binary '\0'),(921,89,3,53,3,NULL,'2017-12-19 08:07:51',1,NULL,NULL,_binary '\0'),(923,89,3,66,3,NULL,'2017-12-19 08:07:51',1,NULL,NULL,_binary '\0'),(993,27,3,99,2,NULL,'2018-01-06 09:07:53',1,NULL,NULL,_binary '\0'),(995,27,3,101,2,NULL,'2018-01-06 09:07:53',1,NULL,NULL,_binary '\0'),(997,20,3,99,2,NULL,'2018-01-06 09:07:57',1,NULL,NULL,_binary '\0'),(999,20,3,101,2,NULL,'2018-01-06 09:07:57',1,NULL,NULL,_binary '\0'),(1001,37,3,99,3,NULL,'2018-01-11 05:20:49',1,NULL,NULL,_binary '\0'),(1003,37,3,101,3,NULL,'2018-01-11 05:20:49',1,NULL,NULL,_binary '\0'),(1007,85,5,61,2,NULL,'2018-02-03 09:06:51',1,NULL,NULL,_binary '\0'),(1011,84,5,61,2,NULL,'2018-02-09 12:13:47',1,NULL,NULL,_binary '\0'),(1013,83,3,53,2,NULL,'2018-03-23 05:24:18',1,NULL,NULL,_binary '\0'),(1014,86,3,53,2,NULL,'2018-03-23 05:24:19',1,NULL,NULL,_binary '\0'),(1018,87,3,65,2,NULL,'2018-05-08 06:42:06',1,NULL,NULL,_binary '\0'),(1019,87,5,81,2,NULL,'2018-05-08 06:42:06',1,NULL,NULL,_binary '\0'),(1038,82,7,38,3,NULL,'2018-07-23 11:31:46',1,NULL,NULL,_binary '\0'),(1039,82,7,40,3,NULL,'2018-07-23 11:31:46',1,NULL,NULL,_binary '\0'),(1040,82,3,39,3,NULL,'2018-07-23 11:31:46',1,NULL,NULL,_binary '\0'),(1041,82,13,48,1,NULL,'2018-07-23 11:31:46',1,NULL,NULL,_binary '\0'),(1096,202,23,128,2,NULL,'2019-09-30 11:33:31',1,NULL,NULL,_binary '\0'),(1097,202,23,127,2,NULL,'2019-09-30 11:33:31',1,NULL,NULL,_binary '\0'),(1098,202,24,129,2,NULL,'2019-09-30 11:33:31',1,NULL,NULL,_binary '\0'),(1099,202,24,130,2,NULL,'2019-09-30 11:33:31',1,NULL,NULL,_binary '\0'),(1100,202,24,131,2,NULL,'2019-09-30 11:33:31',1,NULL,NULL,_binary '\0'),(1101,204,23,128,2,NULL,'2019-09-30 11:34:26',1,NULL,NULL,_binary '\0'),(1102,204,23,127,2,NULL,'2019-09-30 11:34:26',1,NULL,NULL,_binary '\0'),(1103,204,24,129,2,NULL,'2019-09-30 11:34:26',1,NULL,NULL,_binary '\0'),(1104,204,24,130,2,NULL,'2019-09-30 11:34:26',1,NULL,NULL,_binary '\0'),(1105,204,24,131,2,NULL,'2019-09-30 11:34:26',1,NULL,NULL,_binary '\0'),(1117,151,25,132,2,NULL,'2019-10-01 07:54:45',1,NULL,NULL,_binary '\0'),(1118,151,23,122,3,NULL,'2019-10-01 07:54:45',1,NULL,NULL,_binary '\0'),(1119,151,23,128,2,NULL,'2019-10-01 07:54:45',1,NULL,NULL,_binary '\0'),(1120,151,23,125,3,NULL,'2019-10-01 07:54:45',1,NULL,NULL,_binary '\0'),(1121,151,23,127,2,NULL,'2019-10-01 07:54:45',1,NULL,NULL,_binary '\0'),(1122,212,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1123,212,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1124,212,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1125,212,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1126,224,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1127,224,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1128,224,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1129,224,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1130,215,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1131,215,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1132,215,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1133,215,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1134,219,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1135,219,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1136,219,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1137,219,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1138,209,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1139,209,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1140,209,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1141,209,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1142,208,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1143,208,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1144,208,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1145,208,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1146,218,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1147,218,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1148,218,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1149,218,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1150,245,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1151,245,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1152,245,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1153,245,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1154,253,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1155,253,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1156,253,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1157,253,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1158,250,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1159,250,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1160,250,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1161,250,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1162,249,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1163,249,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1164,249,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1165,249,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1166,246,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1167,246,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1168,246,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1169,246,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1170,252,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1171,252,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1172,252,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1173,252,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1174,251,23,122,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1175,251,23,128,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1176,251,23,125,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1177,251,23,127,2,NULL,'2019-10-01 08:09:28',1,NULL,NULL,_binary '\0'),(1178,247,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1179,247,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1180,247,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1181,247,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1182,248,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1183,248,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1184,248,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1185,248,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1186,233,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1187,233,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1188,233,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1189,233,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1190,234,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1191,234,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1192,234,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1193,234,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1194,213,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1195,213,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1196,213,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1197,213,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1198,225,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1199,225,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1200,225,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1201,225,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1202,205,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1203,205,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1204,205,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1205,205,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1206,211,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1207,211,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1208,211,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1209,211,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1210,223,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1211,223,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1212,223,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1213,223,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1214,210,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1215,210,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1216,210,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1217,210,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1218,222,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1219,222,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1220,222,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1221,222,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1222,214,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1223,214,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1224,214,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1225,214,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1226,217,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1227,217,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1228,217,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1229,217,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1234,239,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1235,239,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1236,239,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1237,239,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1238,243,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1239,243,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1240,243,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1241,243,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1242,240,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1243,240,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1244,240,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1245,240,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1246,244,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1247,244,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1248,244,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1249,244,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1250,236,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1251,236,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1252,236,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1253,236,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1254,242,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1255,242,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1256,242,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1257,242,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1258,241,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1259,241,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1260,241,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1261,241,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1262,238,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1263,238,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1264,238,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1265,238,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1266,237,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1267,237,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1268,237,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1269,237,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1270,207,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1271,207,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1272,207,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1273,207,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1274,226,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1275,226,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1276,226,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1277,226,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1278,231,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1279,231,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1280,231,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1281,231,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1282,230,23,122,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1283,230,23,128,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1284,230,23,125,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1285,230,23,127,2,NULL,'2019-10-01 08:09:29',1,NULL,NULL,_binary '\0'),(1286,227,23,122,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1287,227,23,128,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1288,227,23,125,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1289,227,23,127,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1290,232,23,122,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1291,232,23,128,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1292,232,23,125,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1293,232,23,127,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1294,229,23,122,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1295,229,23,128,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1296,229,23,125,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1297,229,23,127,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1298,228,23,122,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1299,228,23,128,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1300,228,23,125,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1301,228,23,127,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1302,216,23,122,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1303,216,23,128,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1304,216,23,125,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1305,216,23,127,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1306,206,23,122,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1307,206,23,128,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1308,206,23,125,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1309,206,23,127,2,NULL,'2019-10-01 08:09:30',1,NULL,NULL,_binary '\0'),(1337,235,23,122,2,NULL,'2019-10-03 11:53:31',1,NULL,NULL,_binary '\0'),(1338,235,23,128,2,NULL,'2019-10-03 11:53:31',1,NULL,NULL,_binary '\0'),(1339,235,23,125,2,NULL,'2019-10-03 11:53:31',1,NULL,NULL,_binary '\0'),(1340,235,23,127,2,NULL,'2019-10-03 11:53:31',1,NULL,NULL,_binary '\0'),(1343,269,23,128,2,NULL,'2019-10-03 14:08:01',1,NULL,NULL,_binary '\0'),(1344,269,23,127,2,NULL,'2019-10-03 14:08:01',1,NULL,NULL,_binary '\0'),(1345,261,23,128,2,NULL,'2019-10-03 14:10:33',1,NULL,NULL,_binary '\0'),(1346,262,23,128,2,NULL,'2019-10-03 14:11:00',1,NULL,NULL,_binary '\0'),(1348,264,23,128,2,NULL,'2019-10-03 14:12:33',1,NULL,NULL,_binary '\0'),(1349,265,23,128,2,NULL,'2019-10-03 14:12:46',1,NULL,NULL,_binary '\0'),(1350,266,23,128,2,NULL,'2019-10-03 14:12:54',1,NULL,NULL,_binary '\0'),(1352,268,23,128,2,NULL,'2019-10-03 14:13:30',1,NULL,NULL,_binary '\0'),(1353,258,23,128,3,NULL,'2019-10-03 14:13:50',1,NULL,NULL,_binary '\0'),(1354,259,23,128,2,NULL,'2019-10-03 14:14:30',1,NULL,NULL,_binary '\0'),(1355,260,23,128,2,NULL,'2019-10-03 14:14:43',1,NULL,NULL,_binary '\0'),(1356,203,23,128,2,NULL,'2019-10-03 14:27:32',1,NULL,NULL,_binary '\0'),(1357,203,24,129,2,NULL,'2019-10-03 14:27:32',1,NULL,NULL,_binary '\0'),(1358,203,24,130,2,NULL,'2019-10-03 14:27:32',1,NULL,NULL,_binary '\0'),(1359,203,24,131,2,NULL,'2019-10-03 14:27:32',1,NULL,NULL,_binary '\0'),(1380,271,23,128,2,NULL,'2019-10-16 09:57:02',1,NULL,NULL,_binary '\0'),(1381,271,23,127,2,NULL,'2019-10-16 09:57:02',1,NULL,NULL,_binary '\0'),(1382,271,24,130,2,NULL,'2019-10-16 09:57:02',1,NULL,NULL,_binary '\0'),(1383,267,23,128,2,NULL,'2019-10-16 10:01:29',1,NULL,NULL,_binary '\0'),(1384,267,24,130,2,NULL,'2019-10-16 10:01:29',1,NULL,NULL,_binary '\0'),(1385,267,24,133,2,NULL,'2019-10-16 10:01:29',1,NULL,NULL,_binary '\0'),(1386,263,23,128,2,NULL,'2019-10-16 10:11:28',1,NULL,NULL,_binary '\0'),(1387,263,24,130,2,NULL,'2019-10-16 10:11:28',1,NULL,NULL,_binary '\0'),(1388,263,24,133,2,NULL,'2019-10-16 10:11:28',1,NULL,NULL,_binary '\0'),(1389,201,23,128,2,NULL,'2019-10-21 10:50:45',1,NULL,NULL,_binary '\0'),(1390,201,23,127,2,NULL,'2019-10-21 10:50:45',1,NULL,NULL,_binary '\0'),(1391,201,23,136,2,NULL,'2019-10-21 10:50:45',1,NULL,NULL,_binary '\0'),(1392,201,24,130,2,NULL,'2019-10-21 10:50:45',1,NULL,NULL,_binary '\0'),(1393,200,23,128,2,NULL,'2019-10-24 10:55:57',1,NULL,NULL,_binary '\0'),(1394,200,23,127,2,NULL,'2019-10-24 10:55:57',1,NULL,NULL,_binary '\0'),(1395,200,24,130,2,NULL,'2019-10-24 10:55:57',1,NULL,NULL,_binary '\0'),(1396,200,24,133,2,NULL,'2019-10-24 10:55:57',1,NULL,NULL,_binary '\0'),(1397,200,24,140,2,NULL,'2019-10-24 10:55:57',1,NULL,NULL,_binary '\0'),(1398,270,23,128,3,NULL,'2019-10-24 10:56:11',1,NULL,NULL,_binary '\0'),(1399,270,23,127,3,NULL,'2019-10-24 10:56:11',1,NULL,NULL,_binary '\0'),(1400,270,24,130,3,NULL,'2019-10-24 10:56:11',1,NULL,NULL,_binary '\0'),(1401,270,24,133,2,NULL,'2019-10-24 10:56:11',1,NULL,NULL,_binary '\0'),(1402,270,24,140,2,NULL,'2019-10-24 10:56:11',1,NULL,NULL,_binary '\0'),(1433,3,23,128,2,NULL,'2019-11-12 10:52:46',1,NULL,NULL,_binary '\0'),(1434,3,23,136,2,NULL,'2019-11-12 10:52:46',1,NULL,NULL,_binary '\0'),(1435,3,24,130,2,NULL,'2019-11-12 10:52:46',1,NULL,NULL,_binary '\0'),(1436,3,24,133,2,NULL,'2019-11-12 10:52:46',1,NULL,NULL,_binary '\0'),(1437,3,24,134,2,NULL,'2019-11-12 10:52:46',1,NULL,NULL,_binary '\0'),(1438,3,24,137,2,NULL,'2019-11-12 10:52:46',1,NULL,NULL,_binary '\0'),(1439,3,24,140,2,NULL,'2019-11-12 10:52:46',1,NULL,NULL,_binary '\0'),(1440,2,23,128,2,NULL,'2019-11-12 10:53:07',1,NULL,NULL,_binary '\0'),(1441,2,23,136,2,NULL,'2019-11-12 10:53:07',1,NULL,NULL,_binary '\0'),(1442,2,24,130,2,NULL,'2019-11-12 10:53:07',1,NULL,NULL,_binary '\0'),(1443,2,24,133,2,NULL,'2019-11-12 10:53:07',1,NULL,NULL,_binary '\0'),(1444,2,24,134,2,NULL,'2019-11-12 10:53:07',1,NULL,NULL,_binary '\0'),(1445,2,24,137,2,NULL,'2019-11-12 10:53:07',1,NULL,NULL,_binary '\0'),(1446,2,24,140,2,NULL,'2019-11-12 10:53:07',1,NULL,NULL,_binary '\0'),(1448,4,25,132,2,NULL,'2019-11-14 10:01:33',1,NULL,NULL,_binary '\0'),(1449,4,23,122,2,NULL,'2019-11-14 10:01:33',1,NULL,NULL,_binary '\0'),(1450,4,23,128,2,NULL,'2019-11-14 10:01:33',1,NULL,NULL,_binary '\0'),(1451,5,23,128,2,NULL,'2019-11-19 04:52:00',1,NULL,NULL,_binary '\0'),(1452,5,23,136,2,NULL,'2019-11-19 04:52:00',1,NULL,NULL,_binary '\0'),(1453,5,24,130,2,NULL,'2019-11-19 04:52:00',1,NULL,NULL,_binary '\0'),(1454,5,24,133,2,NULL,'2019-11-19 04:52:00',1,NULL,NULL,_binary '\0'),(1455,5,24,140,2,NULL,'2019-11-19 04:52:00',1,NULL,NULL,_binary '\0');
/*!40000 ALTER TABLE `m_admin_permission` ENABLE KEYS */;
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