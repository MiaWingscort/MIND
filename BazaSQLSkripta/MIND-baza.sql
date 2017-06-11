CREATE DATABASE  IF NOT EXISTS `tajanstveni_deda_mraz` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tajanstveni_deda_mraz`;
-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: tajanstveni_deda_mraz
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrator` (
  `SifKor` int(10) unsigned NOT NULL,
  `Ime` varchar(45) NOT NULL,
  `Prezime` varchar(45) NOT NULL,
  PRIMARY KEY (`SifKor`),
  CONSTRAINT `FK_SifKor_Administrator` FOREIGN KEY (`SifKor`) REFERENCES `korisnik` (`SifKor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Administrator naseg sistema; korisnik sa svim privilegijama';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (3,'Mina','Granić');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ideja`
--

DROP TABLE IF EXISTS `ideja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ideja` (
  `SifIdeja` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SifKor` int(10) unsigned DEFAULT NULL,
  `Naziv` varchar(45) NOT NULL,
  `Tekst` varchar(500) NOT NULL,
  `PutanjaDoSlike` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`SifIdeja`),
  KEY `FK_SifKor_Ideja_idx` (`SifKor`),
  CONSTRAINT `FK_SifKor_Ideja` FOREIGN KEY (`SifKor`) REFERENCES `administrator` (`SifKor`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabela ideja sa poklone koje postavlja Administrator';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ideja`
--

LOCK TABLES `ideja` WRITE;
/*!40000 ALTER TABLE `ideja` DISABLE KEYS */;
INSERT INTO `ideja` VALUES (1,3,'Knjiga uspomena sa putovanja','Često puno vremena na putovanju provedemo skupljajući suvenire, \"uspomene\", međutim one nakon odmora stoje u nekoj kutiji u uglu sobe, nikada ne otvorene. Jedan od načina na koji da aranžirate slike, razglednice i slične suvenire je da napravite svoju knjigu sa putovanja. Sve što Vam treba je malo mašte i kreativnosti, i može služiti kao idealan poklon osobi koja je delila te uspomene sa Vama.','http://localhost:8080/ci/uploads/ideje/ourAdvBook.jpg'),(2,3,'Ručno pravljena čestitka','Poklon ne mora uvek biti skup. Ponekad je dovoljno samo pokazati da Vam je stalo! Za praznike možete poslati svojoj dragoj osobi čestitku, u koju možete uneti puno ljubavi i truda, ako je napravite sami.','http://localhost:8080/ci/uploads/ideje/cestitka.jpg');
/*!40000 ALTER TABLE `ideja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `igrac`
--

DROP TABLE IF EXISTS `igrac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `igrac` (
  `SifKor` int(10) unsigned NOT NULL,
  `Ime` varchar(45) NOT NULL,
  `Prezime` varchar(45) NOT NULL,
  `Adresa` varchar(45) NOT NULL,
  `Telefon` varchar(45) DEFAULT NULL,
  `DatumRodjenja` date DEFAULT NULL,
  `Pol` char(1) DEFAULT NULL,
  PRIMARY KEY (`SifKor`),
  CONSTRAINT `FK_SifKor_Igrac` FOREIGN KEY (`SifKor`) REFERENCES `korisnik` (`SifKor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Igrac u nasem sistemu; onaj koji prima i kupuje poklon';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `igrac`
--

LOCK TABLES `igrac` WRITE;
/*!40000 ALTER TABLE `igrac` DISABLE KEYS */;
INSERT INTO `igrac` VALUES (1,'Danijela','Mijailović','Marka Čelebonovića 55','0651234567','2015-02-03','Z'),(4,'Nikola','Jevremović','Blok 21','0631234567','1995-11-01','Z'),(5,'Suzana','Mijailović','Blok 22','0641234567','2000-01-01','Z'),(6,'Pera','Perić','Blok 23','0650987654','1990-02-02',NULL);
/*!40000 ALTER TABLE `igrac` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tajanstveni_deda_mraz`.`igrac_BEFORE_INSERT` BEFORE INSERT ON `igrac` FOR EACH ROW
BEGIN
	IF (NEW.Pol IS NOT NULL AND NEW.Pol != 'M' AND NEW.Pol != 'Z') then        
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'invalid data inserted into column Pol';
        set NEW.Ime = NULL;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tajanstveni_deda_mraz`.`igrac_BEFORE_UPDATE` BEFORE UPDATE ON `igrac` FOR EACH ROW
BEGIN
	IF (NEW.Pol IS NOT NULL AND NEW.Pol != 'M' AND NEW.Pol != 'Z') then        
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'invalid data inserted into column Pol';
        set NEW.Ime = NULL;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ima`
--

DROP TABLE IF EXISTS `ima`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ima` (
  `SifKor` int(10) unsigned NOT NULL,
  `SifInt` int(10) unsigned NOT NULL,
  KEY `FK_SifInt_Ima_idx` (`SifInt`),
  KEY `FK_SifKor_Ima_idx` (`SifKor`),
  CONSTRAINT `FK_SifInt_Ima` FOREIGN KEY (`SifInt`) REFERENCES `interesovanje` (`SifInt`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_SifKor_Ima` FOREIGN KEY (`SifKor`) REFERENCES `korisnik` (`SifKor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tablela koja predstavljam povezanost Igraca sa svojim Interesovanjima';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ima`
--

LOCK TABLES `ima` WRITE;
/*!40000 ALTER TABLE `ima` DISABLE KEYS */;
INSERT INTO `ima` VALUES (1,4),(1,10),(1,5),(4,8),(4,7),(4,1),(2,4);
/*!40000 ALTER TABLE `ima` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interesovanje`
--

DROP TABLE IF EXISTS `interesovanje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interesovanje` (
  `SifInt` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(45) NOT NULL COMMENT 'Dodat UNIQUE indeks radi lakseg pretrazivanja',
  PRIMARY KEY (`SifInt`),
  UNIQUE KEY `Naziv_UNIQUE` (`Naziv`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Predstavlja kolekciju interesovanja koje Igrac ima; uneta interesovanja za Igraca pomazu pri odabiru poklona';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interesovanje`
--

LOCK TABLES `interesovanje` WRITE;
/*!40000 ALTER TABLE `interesovanje` DISABLE KEYS */;
INSERT INTO `interesovanje` VALUES (12,'Alkoholna pića'),(9,'Automobili'),(11,'Cveće'),(4,'Film'),(10,'Hrana'),(5,'Muzika'),(8,'Pozorište'),(2,'Putovanja'),(7,'Računari'),(1,'Slikanje'),(3,'Sport'),(6,'Video igrice');
/*!40000 ALTER TABLE `interesovanje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `korisnik` (
  `SifKor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `E-mail` varchar(45) NOT NULL,
  `Lozinka` varchar(45) NOT NULL,
  `Zabranjen` char(1) DEFAULT 'N',
  `TipKorisnika` char(1) NOT NULL,
  `PutanjaDoProfilSlike` varchar(100) DEFAULT '/slike/profilnaSlika.png',
  `PonistavaoSifru` char(1) DEFAULT 'N',
  PRIMARY KEY (`SifKor`),
  UNIQUE KEY `E-mail_UNIQUE` (`E-mail`),
  UNIQUE KEY `SifKor_Tip_UNIQUE` (`TipKorisnika`,`SifKor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Generalizacija svih korisnika naseg sistema; specijalizuje se na Igraca, Administratora i Prodavca';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
INSERT INTO `korisnik` VALUES (1,'danijelamijailovic5@gmail.com','daca123','N','I','slike/1_profilna.png','N'),(2,'igluma95@gmail.com','igor123','N','P','uploads/profilne/gigi.jpg','N'),(3,'granicmina95@gmail.com','mina123','N','A','uploads/profilne/mina.jpg','N'),(4,'nikolajevremovic95@gmail.com','jele123','N','I','uploads/profilne/jele.jpg','N'),(5,'pera@etf.rs','pera123','N','I','/slike/profilnaSlika.png','N'),(6,'suzanam@gmail.com','suzana123','N','I','/slike/profilnaSlika.png','N');
/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tajanstveni_deda_mraz`.`korisnik_BEFORE_UPDATE` BEFORE UPDATE ON `korisnik` FOR EACH ROW
BEGIN
	IF (NEW.Zabranjen != 'N' AND NEW.Zabranjen != 'D') then        
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'invalid data inserted into column Zabranjen';
        set NEW.Lozinka = NULL;
    END IF;
    
    IF (NEW.TipKorisnika != 'I' AND NEW.TipKorisnika != 'P'  AND NEW.TipKorisnika != 'A') then        
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'invalid data inserted into column Tip_korisnika';
        set NEW.Lozinka = NULL;
    END IF;
    
    IF (NEW.PonistavaoSifru != 'N' AND NEW.PonistavaoSifru != 'D') then        
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'invalid data inserted into column PonistavaoSifru';
        set NEW.Lozinka = NULL;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
  UNIQUE KEY `Kupac_Primalac_Status_Unique` (`Kupac`,`Primalac`,`Status_`),
  KEY `FK_SifKor_Kupac_idx` (`Kupac`),
  KEY `FK_SifKor_Primalac_idx` (`Primalac`),
  CONSTRAINT `FK_SifKor_Kupac` FOREIGN KEY (`Kupac`) REFERENCES `igrac` (`SifKor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_SifKor_Primalac` FOREIGN KEY (`Primalac`) REFERENCES `igrac` (`SifKor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Tabela koja cuva podatke o tome koji Igrac kupuje poklon';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kupovina`
--

LOCK TABLES `kupovina` WRITE;
/*!40000 ALTER TABLE `kupovina` DISABLE KEYS */;
INSERT INTO `kupovina` VALUES (1,1,4,'OTKAZANA'),(2,4,1,'OBAVLJENA'),(3,4,5,'NIJE_OBAVLJENA');
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

--
-- Table structure for table `oglas`
--

DROP TABLE IF EXISTS `oglas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oglas` (
  `SifOglas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SifKor` int(10) unsigned NOT NULL,
  `PutanjaOdSlike` varchar(100) NOT NULL,
  `PutanjaDoSlike` varchar(100) NOT NULL,
  `Cena` decimal(10,2) NOT NULL,
  `DatumPocetka` date DEFAULT NULL,
  `DatumKraja` date DEFAULT NULL,
  PRIMARY KEY (`SifOglas`),
  KEY `FK_SifKor_Oglas_idx` (`SifKor`),
  CONSTRAINT `FK_SifKor_Oglas` FOREIGN KEY (`SifKor`) REFERENCES `prodavac` (`SifKor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Tabela oglasa koje postavljaju Prodavci';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oglas`
--

LOCK TABLES `oglas` WRITE;
/*!40000 ALTER TABLE `oglas` DISABLE KEYS */;
INSERT INTO `oglas` VALUES (1,2,'https://www.gifts.com/','http://localhost:8080/ci/uploads/oglasi/648.jpg',250.00,NULL,NULL),(2,2,'http://www.ludpoklon.com/','http://localhost:8080/ci/uploads/oglasi/lud-poklon.jpg',500.00,NULL,NULL),(3,2,'https://www.swarovski.com','http://localhost:8080/ci/uploads/oglasi/swarovski.png',750.00,NULL,NULL),(4,2,'http://www.wonderland.rs/about','http://localhost:8080/ci/uploads/oglasi/veleprodaja-poklona.png',100.00,NULL,NULL),(5,2,'https://www.hocuto.rs/','http://localhost:8080/ci/uploads/oglasi/yoda.png',100.00,NULL,NULL),(6,2,'http://www.britto.com/','http://localhost:8080/ci/uploads/oglasi/brito.jpg',100.00,NULL,NULL);
/*!40000 ALTER TABLE `oglas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodavac`
--

DROP TABLE IF EXISTS `prodavac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodavac` (
  `SifKor` int(10) unsigned NOT NULL,
  `Naziv` varchar(45) NOT NULL,
  `PIB` varchar(45) NOT NULL,
  `Adresa` varchar(45) NOT NULL,
  `Telefon` varchar(45) NOT NULL,
  `Website` varchar(100) NOT NULL,
  PRIMARY KEY (`SifKor`),
  UNIQUE KEY `PIB_UNIQUE` (`PIB`),
  CONSTRAINT `FK_SifKor_Prodavac` FOREIGN KEY (`SifKor`) REFERENCES `korisnik` (`SifKor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Prodavac u nasem sistemu; predstavlja firmu koja moze da se oglasava';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodavac`
--

LOCK TABLES `prodavac` WRITE;
/*!40000 ALTER TABLE `prodavac` DISABLE KEYS */;
INSERT INTO `prodavac` VALUES (2,'Gigi komerc1','140117','Lisičji Potok 3','0641234567','http://winestyle.rs/2010/roze-vina/');
/*!40000 ALTER TABLE `prodavac` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Dumping events for database 'tajanstveni_deda_mraz'
--

--
-- Dumping routines for database 'tajanstveni_deda_mraz'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-11 23:24:32
