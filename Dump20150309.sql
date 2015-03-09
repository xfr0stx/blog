-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: blog
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adresse` (
  `idadresse` int(11) NOT NULL AUTO_INCREMENT,
  `strasse` varchar(45) DEFAULT NULL,
  `hausnummer` int(11) DEFAULT NULL,
  `plz` int(5) DEFAULT NULL,
  `ort` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idadresse`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adresse`
--

LOCK TABLES `adresse` WRITE;
/*!40000 ALTER TABLE `adresse` DISABLE KEYS */;
INSERT INTO `adresse` VALUES (93,'Haupstraße',55,54290,'Trier'),(94,'Engel',12,54290,'Dudeldorf'),(95,'Engel',55,54290,'Trier'),(96,'Haupstraße11',55,54290,'Trier'),(97,'Haupstraßee',55,54290,'Trier'),(98,'Haupstraßes',1,54290,'Trier'),(99,'Haupstraßeee',55,54290,'Trier'),(100,'Engelstraßeew',12,54290,'Trier'),(101,'Haupstraßeeee',55,54290,'Trier');
/*!40000 ALTER TABLE `adresse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eintrag`
--

DROP TABLE IF EXISTS `eintrag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eintrag` (
  `ideintrag` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(45) NOT NULL,
  `eintrag` text NOT NULL,
  `eintragdatum` datetime NOT NULL,
  `user_idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`ideintrag`),
  KEY `fk_eintrag_user1_idx` (`user_idUser`),
  CONSTRAINT `fk_eintrag_user1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eintrag`
--

LOCK TABLES `eintrag` WRITE;
/*!40000 ALTER TABLE `eintrag` DISABLE KEYS */;
INSERT INTO `eintrag` VALUES (65,'blubb','Text TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText Text','2015-02-24 07:53:40',108),(66,'blub3','Text TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText Text TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText Text TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText TextText ','2015-02-24 07:56:24',110),(67,'blubb2','dskfjlasdkjf Textdskfjlasdkjf Textdskfjlasdkjf Textdskfjlasdkjf Textdskfjlasdkjf Text','2015-02-24 15:33:25',113),(68,'Test','adsfadsf','2015-02-25 14:30:19',108),(69,'Doing','Doing!1','2015-02-25 14:36:05',114),(70,'blubb2','alksdjfsakldjflksad sdaf mklsdajf asdf asd fsadf','2015-02-25 14:40:01',113),(71,'mauri','Mauri rockz like hell!','2015-03-04 07:27:16',115),(72,'Dingens','dsakfjaklsdfj asdlkfj asdlkfj asdf asd fsadf asdf ','2015-03-05 08:36:41',108);
/*!40000 ALTER TABLE `eintrag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kommentar`
--

DROP TABLE IF EXISTS `kommentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kommentar` (
  `idanswere` int(11) NOT NULL AUTO_INCREMENT,
  `kommentar` text NOT NULL,
  `datum` datetime NOT NULL,
  `eintrag_ideintrag` int(11) NOT NULL,
  `user_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idanswere`),
  KEY `fk_answere_eintrag1_idx` (`eintrag_ideintrag`),
  KEY `fk_kommentar_user1_idx` (`user_idUser`),
  CONSTRAINT `fk_answere_eintrag1` FOREIGN KEY (`eintrag_ideintrag`) REFERENCES `eintrag` (`ideintrag`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_kommentar_user1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kommentar`
--

LOCK TABLES `kommentar` WRITE;
/*!40000 ALTER TABLE `kommentar` DISABLE KEYS */;
INSERT INTO `kommentar` VALUES (30,'Testi :)','2015-03-04 07:28:08',71,115),(31,'Dingens!','2015-03-04 07:28:33',71,108);
/*!40000 ALTER TABLE `kommentar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `geburtsdatum` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `passwort` varchar(128) NOT NULL,
  `avatar` varchar(45) DEFAULT NULL,
  `adresse_idadresse` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `fk_user_adresse1_idx` (`adresse_idadresse`),
  CONSTRAINT `fk_user_adresse1` FOREIGN KEY (`adresse_idadresse`) REFERENCES `adresse` (`idadresse`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (108,'1986-08-16','blubb@bla.de','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','img/108.jpg',101),(109,'1989-11-11','blubb1@bla.de','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','img/109.jpg',94),(110,'1986-08-16','blub3@bla.de','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','img/110.jpg',93),(111,'1986-08-16','blub4@bla.de','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','img/111.jpg',95),(112,'1986-08-16','blub5@bla.de','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2',NULL,96),(113,'1986-08-16','blubb2@bla.de','3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79','img/113.jpg',97),(114,'1986-08-16','blubb6@bla.de','3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79','img/114.jpg',98),(115,'1986-08-16','sal@mauri.de','3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79','img/115.jpg',100);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_kommentare`
--

DROP TABLE IF EXISTS `v_kommentare`;
/*!50001 DROP VIEW IF EXISTS `v_kommentare`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_kommentare` (
  `ideintrag` tinyint NOT NULL,
  `titel` tinyint NOT NULL,
  `eintrag` tinyint NOT NULL,
  `eintragdatum` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `iduser` tinyint NOT NULL,
  `kommentare` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_kommentare`
--

/*!50001 DROP TABLE IF EXISTS `v_kommentare`*/;
/*!50001 DROP VIEW IF EXISTS `v_kommentare`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_kommentare` AS select `eintrag`.`ideintrag` AS `ideintrag`,`eintrag`.`titel` AS `titel`,`eintrag`.`eintrag` AS `eintrag`,`eintrag`.`eintragdatum` AS `eintragdatum`,`user`.`email` AS `email`,`user`.`idUser` AS `iduser`,count(`kommentar`.`idanswere`) AS `kommentare` from ((`eintrag` join `user` on((`eintrag`.`user_idUser` = `user`.`idUser`))) left join `kommentar` on((`eintrag`.`ideintrag` = `kommentar`.`eintrag_ideintrag`))) group by `eintrag`.`ideintrag` order by `eintrag`.`ideintrag` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-09 13:47:52
