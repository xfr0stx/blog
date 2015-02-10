CREATE DATABASE  IF NOT EXISTS `blog` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `blog`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eintrag`
--

LOCK TABLES `eintrag` WRITE;
/*!40000 ALTER TABLE `eintrag` DISABLE KEYS */;
INSERT INTO `eintrag` VALUES (23,'bla','dsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eif','2015-02-09 19:44:31',26),(24,'hans','dsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eif','2015-02-09 19:45:43',30),(25,'Peter',' eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh dff hfieurier nvjkdnb eifdsjkfah dsjfh','2015-02-09 20:08:32',32);
/*!40000 ALTER TABLE `eintrag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kommentar`
--

DROP TABLE IF EXISTS `kommentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kommentar` (
  `idanswere` int(11) NOT NULL,
  `eintrag` text NOT NULL,
  `datum` datetime NOT NULL,
  `eintrag_ideintrag` int(11) NOT NULL,
  `user_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idanswere`),
  KEY `fk_answere_eintrag1_idx` (`eintrag_ideintrag`),
  KEY `fk_kommentar_user1_idx` (`user_idUser`),
  CONSTRAINT `fk_answere_eintrag1` FOREIGN KEY (`eintrag_ideintrag`) REFERENCES `eintrag` (`ideintrag`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_kommentar_user1` FOREIGN KEY (`user_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kommentar`
--

LOCK TABLES `kommentar` WRITE;
/*!40000 ALTER TABLE `kommentar` DISABLE KEYS */;
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
  `passwort` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (25,'1999-12-12','rot@blau.de','1234'),(26,'1988-08-12','bla@blubb.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),(27,'1988-08-12','bla@blubffffb.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),(28,'1988-08-12','bla@blubffffb.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),(29,'1988-08-12','bla@bla.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),(30,'1988-08-12','hans@wurst.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),(31,'1988-08-12','bla1@blubb.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),(32,'1988-08-12','peter@lustig.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),(33,'1988-08-12','bla@blubb.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),(34,'1988-08-12','bla@blubb.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),(35,'1988-08-12','bla11@blubb.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),(36,'1988-08-12','bla12@blubb.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-09 20:42:37