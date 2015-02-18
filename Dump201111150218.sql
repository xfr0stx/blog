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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adresse`
--

LOCK TABLES `adresse` WRITE;
/*!40000 ALTER TABLE `adresse` DISABLE KEYS */;
INSERT INTO `adresse` VALUES (3,'HaupstraÃŸe',55,54290,'Trier'),(4,'HaupstraÃŸe',55,54290,'Trier'),(5,'HaupstraÃŸe',55,54290,'Trier'),(6,'EngelstraÃŸe',55,54260,'Trier'),(7,'Engel',11,5555,'Trier'),(8,'Haupt',1,5555,'Trier'),(9,'haupt',1,54222,'Trier');
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eintrag`
--

LOCK TABLES `eintrag` WRITE;
/*!40000 ALTER TABLE `eintrag` DISABLE KEYS */;
INSERT INTO `eintrag` VALUES (30,'Test','dafasdfasdf','2015-02-17 13:18:25',48),(31,'blubb','askldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkasdjflkasdjf','2015-02-17 13:34:26',50),(32,'blubb@','lkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkaslkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkaslkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkaslkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkaslkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkaslkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkaslkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkaslkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkaslkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkaslkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkaslkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkaslkasdjfaskldjfaklsdjflkasdjflkasdjfaskldjfaklsdjflkas','2015-02-18 07:27:08',50),(33,'ddd','jflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflkjflkaslkasdjfaskldjfaklsdjflkasdjflk','2015-02-18 07:49:15',50),(34,'Blubb','kdlsfjaklsdfjasdklfj asdlkfj saldkjf lksadjf klsadjf lksadjf lkasdjf aksldjf lksadjf lksadjf ','2015-02-18 09:25:20',50),(35,'sal@','ksdlfjaskldjf asdjf lsd sadf sadf sadf ','2015-02-18 09:26:01',52),(36,'asdfadsf','sadfdsafsaf','2015-02-18 10:04:42',50),(37,'fgfdgdg','dsfgsdgdfg','2015-02-18 10:05:55',50),(38,'Test','123123123123','2015-02-18 10:08:08',50),(39,'Blubbs0n','1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf 1dsfasdf asdf asdf sadf asdf sadf asdf ','2015-02-18 10:14:14',50),(40,'sal@mauuuu','INSERT INTO eintrag(titel,eintrag,eintragdatum,user_idUser) VALUES (\'$escaped_titel\',\'$escaped_eintrag\',NOW(),$usersession)INSERT INTO eintrag(titel,eintrag,eintragdatum,user_idUser) VALUES (\'$escaped_titel\',\'$escaped_eintrag\',NOW(),$usersession)INSERT INTO eintrag(titel,eintrag,eintragdatum,user_idUser) VALUES (\'$escaped_titel\',\'$escaped_eintrag\',NOW(),$usersession)INSERT INTO eintrag(titel,eintrag,eintragdatum,user_idUser) VALUES (\'$escaped_titel\',\'$escaped_eintrag\',NOW(),$usersession)','2015-02-18 10:19:06',52);
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
  `passwort` varchar(128) NOT NULL,
  `adresse_idadresse` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `fk_user_adresse1_idx` (`adresse_idadresse`),
  CONSTRAINT `fk_user_adresse1` FOREIGN KEY (`adresse_idadresse`) REFERENCES `adresse` (`idadresse`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (47,'1999-08-08','bla@blubb.de','3434',NULL),(48,'1986-08-16','hans@wurst.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db',NULL),(50,'1999-03-15','blubb@bla.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db',7),(51,'1999-08-16','mauro@salvatore.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db',8),(52,'1950-11-11','sal@mau.de','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db',9);
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

-- Dump completed on 2015-02-18 13:41:46
