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
-- Table structure for table `m_ms_hospital`
--

DROP TABLE IF EXISTS `m_ms_hospital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_ms_hospital` (
  `intHospitalId` int(11) NOT NULL AUTO_INCREMENT,
  `vchHospitalName` varchar(128) DEFAULT NULL,
  `intDistrictId` int(11) DEFAULT NULL,
  `vchEmail` varchar(64) DEFAULT NULL,
  `bigContactNo` bigint(20) DEFAULT '0',
  `intBlockId` int(11) DEFAULT NULL,
  `intGPId` int(11) DEFAULT NULL,
  `bitDeletedFlag` bit(1) DEFAULT b'0',
  `intCreatedBy` int(11) DEFAULT NULL,
  `dtmCreatedOn` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`intHospitalId`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_ms_hospital`
--

LOCK TABLES `m_ms_hospital` WRITE;
/*!40000 ALTER TABLE `m_ms_hospital` DISABLE KEYS */;
INSERT INTO `m_ms_hospital` VALUES (1,'Angul DHH',2,'cdmoang@gmail.com',9439981331,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(2,'Balasore DHH',4,'cdmobalasore14@gmail.com',9439981999,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(3,'Bargarh DHH',5,'cdmo.baragarh@gmail.com',9439982249,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(4,'Bhadrak DHH',6,'cdmobdk@rediffmail.com',9439994310,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(5,'Bolangir DHH',3,'cdmobalangir@gmail.com',9439987100,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(6,'Boudh DHH',7,'cdmobdh@gmail.com',9439990996,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(7,'Cuttack-City-Hosp. DHH',8,'cdmocuttack@gmail.com',9439990009,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(8,'Deogarh DHH',9,'cdmodeogarh@gmail.com',9437218895,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(9,'Dhenkanal DHH',10,'cdmodkl2012@gmail.com',9439981081,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(10,'Paralakhemundi DHH',12,'gajapaticdmo@gmail.com',9439984004,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(11,'Ganjam DHH',12,'cdmoganjam@rediffmail.com',9439985006,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(12,'Jagatsingpur DHH',13,'cdmojagatsinghpur@gmail.com',9439991868,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(13,'Jajpur DHH',14,'cdmojajpur@gmail.com',9439992257,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(14,'Jharsuguda DHH',15,'cdmojharsuguda@gmail.com',9439986890,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(15,'Bhawanipatna DHH',16,'dpmukalahandi@gmail.com',9439980000,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(16,'Phulbani DHH',17,'cdmophulbani@gmail.com',9439988000,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(17,'Kendrapara DHH',18,'cdmokendrapara@gmail.com',9439988886,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(18,'Keonjhar DHH',19,'keonjharcdmo@gmail.com',9439987004,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(19,'Capital-Hosp_BBSR DHH',20,'cdmokhordha@gmail.com',9439994500,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(20,'Khurda DHH',20,'cdmokhordha@gmail.com',9439994500,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(21,'Jeypore DHH',21,'cdmo.kpt@gmail.com',9439990495,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(22,'Malkangiri DHH',22,'cdmomkg@gmail.com',9439983250,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(23,'Baripada DHH',23,'cdmombj@gmail.com',9439995496,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(24,'Nawarngpur DHH',24,'cdmonabarangpur@gmail.com',9439988885,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(25,'Nayagarh DHH',25,'cdmonayagarh@gmail.com',9439991499,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(26,'Nuapada DHH',26,'cdmocumdmdnuapada@gmail.cm',9439989988,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(27,'Puri DHH',27,'cdmopuri2012@gmail.com',9439994708,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(28,'Rayagada DHH',28,'cdmorayagada@gmail.com',9439983501,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(29,'Sambalpur DHH',29,'cdmosambalpur@gmail.com',9439986001,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(30,'Soenpur DHH',30,'cdmphosubarnapur@gmail.com',9439987555,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(31,'RGH-Rourkela DHH',31,'sngcdmo@gmail.com',9439993000,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(32,'Sundargarh DHH',31,'sngcdmo@gmail.com',9439993000,0,0,_binary '\0',0,'2019-09-29 13:58:23'),(33,'Basta CHC',4,'bpmsubasta@gmail.com  ',9439980925,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(34,'Adaspur CHC',8,'bpmuadaspur123@gmail.com',9439995222,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(35,'Kantabanjhi CHC',3,'chckantabanji@gmail.com',9439987090,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(36,'GKB-Hospital CHC',4,'gkbhospital@gmail.com',9437188221,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(37,'Soro CHC',4,'bpmsusoro123@gmail.com',9439982050,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(38,'Sohela CHC',5,'bpmusohela1@gmail.com',9439755215,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(39,'Laxmipur CHC',21,'nhm.laxmipur2018@gmail.com',9439990525,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(40,'Basudevpur CHC',6,'bpobasu@gmail.com',9439994361,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(41,'Agarpada CHC',6,'bpmu.bonth@gmail.com',9439994245,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(43,'Kodala CHC',12,'kodalabpmu1@gmail.com',9439983168,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(44,'Khalikot CHC',12,'bpmukhallikote1@gmail.com',9439983872,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(45,'Polasara CHC',12,'bpmupolosaraunit@gmail.com',9439984361,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(46,'Balikuda CHC',13,'mougphcbalikuda@gmail.com',9439991995,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(47,'Ersama CHC',13,'mougphcerasama@gmail.com',9439991486,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(48,'Barachana CHC',14,'bpmsubarchana@gmail.com',9439998027,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(49,'Dangadi CHC',14,'bpmudangadi@gmail.com',9439992561,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(50,'Jajpur-Road CHC',14,'mochcjkroad1@gmail.com',9439999889,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(51,'Kesinga CHC',16,'ah.kesinga@gmail.com',7008905136,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(52,'Patakura CHC',18,'bpmugara@gmail.com',9439996372,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(53,'Ghatagaon CHC',19,'bpmu.ghatgaon@gmail.com',9439986433,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(54,'Banapur CHC',20,'reportschcbanpur@gmail.com',9439997200,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(55,'Jatani CHC',20,'chcjatni2@gmail.com',9439997467,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(56,'Tangi1 CHC',20,'tangichc@gmail.com',9439997040,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(57,'Unit -4 UCHC',20,'unit4uchc@gmail.com',6372180273,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(58,'Kalimela CHC',22,'chckalimela@gmail.com',9937985877,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(59,'Jasipur CHC',23,'bpojash@gmail.com',7008527330,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(60,'Papadahandi CHC',24,'bpo.papadahandi@gmail.com',9439999416,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(61,'Dasapalla CHC',25,'nhmdaspalla@gmail.com',9937453965,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(62,'Charichhak CHC',27,'bpmucharichhak1@gmail.com',8763797642,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(63,'Niamapara CHC',27,'ahnimapara@gmail.com',8763797642,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(64,'Sakhigopal CHC',27,'ahsakhigopal@gmail.com',9439985369,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(65,'Dunguripalli CHC',30,'bpmu.dunguripali@gmail.com',9439987197,0,0,_binary '\0',0,'2019-10-15 13:00:23'),(66,'Rajgangpur-Hospital CHC',31,'rajgangpurchc@gmail.com',9438350131,0,0,_binary '\0',0,'2019-10-15 13:00:23');
/*!40000 ALTER TABLE `m_ms_hospital` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-11 15:48:13
