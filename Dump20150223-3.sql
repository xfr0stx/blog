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
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adresse`
--

LOCK TABLES `adresse` WRITE;
/*!40000 ALTER TABLE `adresse` DISABLE KEYS */;
INSERT INTO `adresse` VALUES (64,'Engelstraße',57,545290,'Trier'),(65,'Engelstraße',15,54529,'Trier'),(66,'Haupstraße',55,54290,'Trier'),(67,'Haupstraße',55,54290,'Trier'),(68,'Haupstraße',55,54290,'Trier'),(69,'Haupstraße',55,54290,'Trier'),(70,'Haupstraße',55,54290,'Trier'),(71,'Haupstraße',55,54290,'Trier'),(72,'Haupstraße',55,54290,'Trier'),(73,'Haupstraße',55,54290,'Trier'),(74,'Haupstraße',55,54290,'Trier'),(75,'Haupstraße',55,54290,'Trier'),(76,'Haupstraße',55,54290,'Trier'),(77,'Haupstraße',55,54290,'Trier'),(78,'Haupstraße',55,54290,'Trier'),(79,'Haupstraße',55,54290,'Trier'),(80,'Haupstraße',55,54290,'Trier'),(81,'saf',12,1222,'asdsd'),(82,'safasfd',1,11111,'fsdd'),(83,'safasfd',1,11111,'fsdd'),(84,'safasfd',1,11111,'fsdd'),(85,'safasfd',1,11111,'fsdd'),(86,'safasfd',1,11111,'fsdd'),(87,'sdfa',1,123,'safsdf'),(88,'sdfa',1,123,'safsdf'),(89,'aaaaa',121,1111,'asdf'),(90,'dsfafd',1,111,'sdf'),(91,'Engelstraße',57,11111,'Trier'),(92,'Hauptstraße',11,11111,'Trier');
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eintrag`
--

LOCK TABLES `eintrag` WRITE;
/*!40000 ALTER TABLE `eintrag` DISABLE KEYS */;
INSERT INTO `eintrag` VALUES (57,'Der beste Topic','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','2015-02-20 15:35:55',100),(58,'Test','1234','2015-02-20 19:37:27',100),(59,'asdfsa','asdfaf','2015-02-20 21:28:49',103),(60,'Das ist ein Test :)','son mist hier','2015-02-20 23:17:12',104),(61,'Ich bin da!','asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf asdfsadf sadf dsaf sdaf ','2015-02-23 07:33:51',100);
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kommentar`
--

LOCK TABLES `kommentar` WRITE;
/*!40000 ALTER TABLE `kommentar` DISABLE KEYS */;
INSERT INTO `kommentar` VALUES (23,'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.a','2015-02-20 15:36:14',57,100),(24,'Testestsetest','2015-02-20 19:42:06',58,100),(25,'ffff','2015-02-20 19:42:39',58,100),(26,'ddfasdf','2015-02-20 19:46:19',58,100),(27,'asdfasdfasdfasdfasdf','2015-02-20 21:28:59',59,103),(28,'123123sdfsadf asdf asdf','2015-02-23 11:05:27',61,100);
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
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (100,'1986-08-16','blubb@bla.de','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','img/100.jpg',92),(101,'1999-03-15','blubb1@bla.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db','img/101.jpg',65),(102,'1989-01-02','test@test.de','4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a','img/102.jpg',88),(103,'1989-08-04','aaa@bbb.de','4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a','img/103.jpg',89),(104,'1989-11-11','a@b.de','4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a','img/104.jpg',90);
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

-- Dump completed on 2015-02-23 15:23:33
