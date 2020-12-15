-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: 192.168.10.46    Database: schoolSystem
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.25-MariaDB-0+deb10u1

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
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `action` varchar(100) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `who` varchar(100) DEFAULT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `log_FK` (`stud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES ('CREATE','2020-12-06 11:56:17','mark',15,1,NULL),('CREATE','2020-12-06 11:58:28','mark',16,2,NULL),('EDIT','2020-12-06 12:22:11','mark',4,3,NULL),('EDIT','2020-12-06 12:55:48','mark',4,4,NULL),('CREATE','2020-12-06 15:05:53','mark',17,5,NULL),('REMOVE','2020-12-06 15:06:21','mark',17,6,NULL),('EDIT','2020-12-07 00:35:40','mark',13,7,NULL),('EDIT','2020-12-08 16:44:57','mark',4,8,NULL),('CREATE','2020-12-09 11:49:00','admin',18,9,NULL),('EDIT','2020-12-10 12:04:57','admin',13,10,NULL),('EDIT','2020-12-10 12:05:00','admin',2,11,NULL),('EDIT','2020-12-10 12:05:05','admin',7,12,NULL),('CREATE','2020-12-10 21:28:12','mark',19,13,NULL),('EDIT','2020-12-10 21:28:36','mark',19,14,NULL),('REMOVE','2020-12-10 21:29:11','mark',19,15,NULL),('EDIT','2020-12-10 21:40:10','admin',20,16,'Testing'),('REMOVE','2020-12-10 21:41:41','admin',20,17,''),('CREATE','2020-12-10 21:43:10','admin',21,18,'NewName'),('EDIT','2020-12-10 21:43:25','admin',21,19,'NewNameAgain'),('REMOVE','2020-12-10 21:46:18','admin',21,20,'NewNameAgain');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `user` varchar(100) NOT NULL,
  `unixcreationtime` bigint(20) unsigned DEFAULT NULL,
  `password` longtext DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('admin',1607775973,'7ae15d5662d0281553235d5b4ff0775772fec80826c11004510af6ea0b09ce3a283a5bb221fafdcafbcb0fc5a0c2783cda9994c414ad7e08a196641882243256'),('mark',1607776827,'965d0498bc0792adf2ade6200c98228315e65ccee140b81af62837e0f856e473295c4c9d33c75f3c616c523a476e23bb483e95a997b3a07698ae4d599f9a04b0');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `records` (
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `paid` tinyint(1) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `records`
--

LOCK TABLES `records` WRITE;
/*!40000 ALTER TABLE `records` DISABLE KEYS */;
INSERT INTO `records` VALUES ('Mark','Ruzinov','2000-07-17',1,1,'mark@ruzinov.com',3),('Mateja','Miteva','1999-03-23',2,1,'mitevamateja@gmail.com',3),('Marko','Stojmenovski','2000-08-24',3,1,'mstoj24@gmail.com',3),('Anya','Melfissa','1999-01-12',4,1,'mel@gmail.id',1),('Nouh','Sobbi','1999-05-25',7,1,'sobbi@gmail.com',3),('Leeroy','Jenkinsss','2005-05-11',8,0,'letsdothis@gmail.com',1),('Legosi','Wolfson','2002-04-09',9,0,'legosi@gmail.com',2),('Trent','Kohlson','2000-11-08',10,1,'kohlsontrent@outlook.com',2),('Korone','Inugami','2000-04-13',11,1,'korofunk@gmail.jp',3),('Bjorn','Allenson','1998-08-22',12,0,'bjorn@gmail.se',1),('Amelia','Watson','1998-07-23',13,1,'ame@yahoo.com',3),('Test','Test','2020-12-07',18,1,'testing@email.com',1);
/*!40000 ALTER TABLE `records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'schoolSystem'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-12 14:50:34
