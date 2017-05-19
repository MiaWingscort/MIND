CREATE DATABASE  IF NOT EXISTS `tajanstveni_deda_mraz` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tajanstveni_deda_mraz`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: tajanstveni_deda_mraz
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `slika_u_galeriji`
--

DROP TABLE IF EXISTS `slika_u_galeriji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slika_u_galeriji` (
  `SifSlika` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SifKor` int(10) unsigned DEFAULT NULL,
  `PutanjaDoSlike` varchar(100) NOT NULL,
  PRIMARY KEY (`SifSlika`),
  KEY `FK_SifKor_SlikaUGaleriji_idx` (`SifKor`),
  CONSTRAINT `FK_SifKor_SlikaUGaleriji` FOREIGN KEY (`SifKor`) REFERENCES `igrac` (`SifKor`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Predstavlja slike poslatih ili primljenih poklona (u galeriji) koje postavlja Igrac';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slika_u_galeriji`
--

LOCK TABLES `slika_u_galeriji` WRITE;
/*!40000 ALTER TABLE `slika_u_galeriji` DISABLE KEYS */;
INSERT INTO `slika_u_galeriji` VALUES (1,1,'/slika1.jpg'),(2,4,'/slika2.jpg');
/*!40000 ALTER TABLE `slika_u_galeriji` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-19 15:26:18
