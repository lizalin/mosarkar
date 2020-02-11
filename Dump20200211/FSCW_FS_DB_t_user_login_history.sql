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
-- Table structure for table `t_user_login_history`
--

DROP TABLE IF EXISTS `t_user_login_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_user_login_history` (
  `intId` int(11) NOT NULL AUTO_INCREMENT,
  `intUserId` int(11) DEFAULT NULL,
  `dtmLoginTime` datetime DEFAULT NULL,
  `intLoginMode` int(11) DEFAULT NULL COMMENT '1-Web,2-Mob,3-OTP',
  `vchLocalIpAddress` varchar(32) DEFAULT NULL,
  `vchPublicIpAddress` varchar(32) DEFAULT NULL,
  `vchUserAgent` varchar(256) DEFAULT NULL,
  `vchDeviceId` varchar(256) DEFAULT NULL,
  `vchDeviceName` varchar(256) DEFAULT NULL,
  `vchAppVersion` varchar(32) DEFAULT NULL,
  `vchPhone` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`intId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_user_login_history`
--

LOCK TABLES `t_user_login_history` WRITE;
/*!40000 ALTER TABLE `t_user_login_history` DISABLE KEYS */;
INSERT INTO `t_user_login_history` VALUES (1,1,'2020-01-13 11:29:22',1,'127.0.1.1','::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36','','','',NULL),(2,3,'2020-01-13 11:30:51',1,'127.0.1.1','::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36','','','',NULL),(3,1,'2020-02-07 17:30:38',1,'127.0.1.1','::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36','','','',NULL),(4,1,'2020-02-10 11:02:08',1,'127.0.1.1','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0','','','',NULL),(5,1,'2020-02-10 11:09:30',1,'127.0.1.1','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0','','','',NULL),(6,1,'2020-02-10 11:36:47',1,'127.0.1.1','::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36','','','',NULL),(7,1,'2020-02-11 09:13:54',1,'127.0.1.1','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0','','','',NULL),(8,1,'2020-02-11 10:07:12',1,'127.0.1.1','::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36','','','',NULL),(9,15,'2020-02-11 10:08:37',1,'127.0.1.1','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0','','','',NULL),(10,1,'2020-02-11 10:23:40',1,'127.0.1.1','::1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36','','','',NULL),(11,16,'2020-02-11 10:26:15',1,'127.0.1.1','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0','','','',NULL),(12,16,'2020-02-11 10:27:08',1,'127.0.1.1','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0','','','',NULL),(13,5,'2020-02-11 10:28:03',1,'127.0.1.1','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0','','','',NULL),(14,1,'2020-02-11 11:21:28',1,'192.168.103.82','::1','Mozilla/5.0 (Windows NT 10.0; WOW64; rv:65.0) Gecko/20100101 Firefox/65.0','','','',NULL),(15,1,'2020-02-11 13:31:53',1,'127.0.1.1','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0','','','',NULL);
/*!40000 ALTER TABLE `t_user_login_history` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:18
