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
-- Table structure for table `kupovina`
--

DROP TABLE IF EXISTS `kupovina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kupovina` (
  `SifKup` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Kupac` int(10) unsigned DEFAULT NULL,
  `Primalac` int(10) unsigned DEFAULT NULL,
  `Status_` varchar(20) DEFAULT 'NIJE_OBAVLJENA',
  PRIMARY KEY (`SifKup`),
  KEY `FK_SifKor_Kupac_idx` (`Kupac`),
  KEY `FK_SifKor_Primalac_idx` (`Primalac`),
  CONSTRAINT `FK_SifKor_Kupac` FOREIGN KEY (`Kupac`) REFERENCES `igrac` (`SifKor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_SifKor_Primalac` FOREIGN KEY (`Primalac`) REFERENCES `igrac` (`SifKor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabela koja cuva podatke o tome koji Igrac kupuje poklon';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kupovina`
--

LOCK TABLES `kupovina` WRITE;
/*!40000 ALTER TABLE `kupovina` DISABLE KEYS */;
INSERT INTO `kupovina` VALUES (1,1,4,'NIJE_OBAVLJENA'),(2,4,1,'OBAVLJENA');
/*!40000 ALTER TABLE `kupovina` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tajanstveni_deda_mraz`.`kupovina_BEFORE_INSERT` BEFORE INSERT ON `kupovina` FOR EACH ROW
BEGIN
	IF (NEW.Status_ IS NOT NULL AND NEW.Status_ != 'OTKAZANA' AND NEW.Status_ != 'OBAVLJENA' AND NEW.Status_ != 'NIJE_OBAVLJENA') then        
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'invalid data inserted into column Status_';
        set NEW.SifKup = NULL;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tajanstveni_deda_mraz`.`kupovina_BEFORE_UPDATE` BEFORE UPDATE ON `kupovina` FOR EACH ROW
BEGIN
	IF (NEW.Status_ IS NOT NULL AND NEW.Status_ != 'OTKAZANA' AND NEW.Status_ != 'OBAVLJENA' AND NEW.Status_ != 'NIJE_OBAVLJENA') then        
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'invalid data inserted into column Status_';
        set NEW.SifKup = NULL;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-19 15:26:18
