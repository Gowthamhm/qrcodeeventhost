-- MariaDB dump 10.19  Distrib 10.4.19-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: qrcode
-- ------------------------------------------------------
-- Server version	10.4.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `feedback` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `eventname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'Gowtham','H M','lionmonkey001@gmail.com',4,'dfvgbfrsd','4',NULL),(2,'Gowtham','H M','lionmonkey001@gmail.com',4,'demo','4',NULL),(3,'Gowtham','H M','lionmonkey001@gmail.com',4,'dfrew','4',NULL),(4,'Gowtham','H M','lionmonkey001@gmail.com',4,'sdfdf','4','demo');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `folders`
--

DROP TABLE IF EXISTS `folders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `folders` (
  `sl_no` int(11) NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(30) DEFAULT NULL,
  `creator` varchar(30) DEFAULT NULL,
  `Date` varchar(20) DEFAULT NULL,
  `Time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `folders`
--

LOCK TABLES `folders` WRITE;
/*!40000 ALTER TABLE `folders` DISABLE KEYS */;
INSERT INTO `folders` VALUES (21,'demo','admin','2021-07-03','04:03:07pm'),(22,'demo-3','admin','2021-07-03','09:13:41pm');
/*!40000 ALTER TABLE `folders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qrcode`
--

DROP TABLE IF EXISTS `qrcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qrcode` (
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(20) DEFAULT NULL,
  `text` varchar(300) DEFAULT NULL,
  `Qoute` varchar(300) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  `infilename` varchar(200) DEFAULT NULL,
  `outfilename` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `intext` varchar(200) DEFAULT NULL,
  `outtext` varchar(200) DEFAULT NULL,
  `eventname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qrcode`
--

LOCK TABLES `qrcode` WRITE;
/*!40000 ALTER TABLE `qrcode` DISABLE KEYS */;
INSERT INTO `qrcode` VALUES (39,'demo','<p>demo check&nbsp;</p>\r\n',' ','9483621844','./resource/demo',' 9483621844in.png',' 9483621844out.png',1,'Welcome<p>demo check&nbsp;</p>\r\n','Thank You<p>demo check&nbsp;</p>\r\n',NULL),(40,'demo','<p>bfhdbfkjdbfjsbf &quot;gdhgsdnG&quot;</p>\r\n','gdhgsdnG','9483621844','./resource/demo','gdhgsdnG9483621844in.png','gdhgsdnG9483621844out.png',1,'Welcome<p>bfhdbfkjdbfjsbf &quot;gdhgsdnG&quot;</p>\r\n','Thank You<p>bfhdbfkjdbfjsbf &quot;gdhgsdnG&quot;</p>\r\n',NULL),(41,'demo','<p>demo &quot;check&quot; of create qrcode</p>\r\n','check','9483621844','./resource/demo','check9483621844in.png','check9483621844out.png',1,'Welcome<p>demo &quot;check&quot; of create qrcode</p>\r\n','Thank You<p>demo &quot;check&quot; of create qrcode</p>\r\n',NULL);
/*!40000 ALTER TABLE `qrcode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qrscannedinfo`
--

DROP TABLE IF EXISTS `qrscannedinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qrscannedinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(50) DEFAULT NULL,
  `scannedby` varchar(50) DEFAULT NULL,
  `folder_name` varchar(30) DEFAULT NULL,
  `filename` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qrscannedinfo`
--

LOCK TABLES `qrscannedinfo` WRITE;
/*!40000 ALTER TABLE `qrscannedinfo` DISABLE KEYS */;
INSERT INTO `qrscannedinfo` VALUES (1,'1625358875','admin','demo','gdhgsdnG9483621844in.png');
/*!40000 ALTER TABLE `qrscannedinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `sl_no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user','u','9686116760','gowthamhm002@gmail.com','user'),(2,'admin','a','8095642067','lionmonkey001@gmail.com','admin'),(3,'Gowtham','g','8095642067','gowthamhm002@gmail.com','user'),(4,'Anamika','b','8095642067','lionmonkey001@gmail.com','user'),(5,'demo',NULL,'8095642067','gowthamhm002@gmail.com','user'),(6,'demo1',NULL,'8095642067','abc@gmail.com','user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-08 16:05:20
