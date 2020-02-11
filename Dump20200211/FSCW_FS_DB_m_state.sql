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
-- Table structure for table `m_state`
--

DROP TABLE IF EXISTS `m_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_state` (
  `intStateId` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `vchStateName` varchar(64) NOT NULL,
  `vchStateCode` varchar(8) DEFAULT NULL,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  PRIMARY KEY (`intStateId`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_state`
--

LOCK TABLES `m_state` WRITE;
/*!40000 ALTER TABLE `m_state` DISABLE KEYS */;
INSERT INTO `m_state` VALUES (1,'Andaman and Nicobar','AN',_binary '\0'),(2,'Andhra Pradesh','AP',_binary '\0'),(3,'Arunachal Pradesh','AR',_binary '\0'),(4,'Assam','AS',_binary '\0'),(5,'Bihar','BR',_binary '\0'),(6,'Chandigarh','CH',_binary '\0'),(7,'Chhattisgarh','CG',_binary '\0'),(8,'Dadra and Nagar Haveli','DN',_binary '\0'),(9,'Daman and Diu','DD',_binary '\0'),(10,'Delhi','DL',_binary '\0'),(11,'Goa','GA',_binary '\0'),(12,'Gujarat','GJ',_binary '\0'),(13,'Haryana','HR',_binary '\0'),(14,'Himachal Pradesh','HP',_binary '\0'),(15,'Jammu and Kashmir','JK',_binary '\0'),(16,'Jharkhand','JH',_binary '\0'),(17,'Karnataka','KA',_binary '\0'),(18,'Kerala','KL',_binary '\0'),(19,'Lakshdweep','LD',_binary '\0'),(20,'Madhya Pradesh','MP',_binary '\0'),(21,'Maharashtra','MH',_binary '\0'),(22,'Manipur','MN',_binary '\0'),(23,'Meghalaya','ML',_binary '\0'),(24,'Mizoram','MZ',_binary '\0'),(25,'Nagaland','NL',_binary '\0'),(26,'Odisha','OD',_binary '\0'),(27,'Puducherry','PY',_binary '\0'),(28,'Punjab','PB',_binary '\0'),(29,'Rajasthan','RJ',_binary '\0'),(30,'Sikkim','SK',_binary '\0'),(31,'Tamil Nadu','TN',_binary '\0'),(32,'Telangana','TS',_binary '\0'),(33,'Tripura','TR',_binary '\0'),(34,'Uttar Pradesh','UP',_binary '\0'),(35,'Uttarakhand','UK',_binary '\0'),(36,'West Bengal','WB',_binary '\0');
/*!40000 ALTER TABLE `m_state` ENABLE KEYS */;
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
