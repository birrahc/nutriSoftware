CREATE DATABASE  IF NOT EXISTS `nutri` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `nutri`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: nutri
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `avalicao_antropometrica`
--

DROP TABLE IF EXISTS `avalicao_antropometrica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avalicao_antropometrica` (
  `id_avalicao` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` int(11) NOT NULL,
  `consulta` int(11) DEFAULT NULL,
  `data_avalicao` date DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `c_cintura` float DEFAULT NULL,
  `c_abdominal` float DEFAULT NULL,
  `c_quadril` float DEFAULT NULL,
  `c_peito` float DEFAULT NULL,
  `c_braco_d` float DEFAULT NULL,
  `c_braco_e` float DEFAULT NULL,
  `c_coxa_d` float DEFAULT NULL,
  `c_coxa_e` float DEFAULT NULL,
  `dc_triceps` float DEFAULT NULL,
  `dc_escapular` float DEFAULT NULL,
  `dc_supra_iliaca` float DEFAULT NULL,
  `dc_abdominal` float DEFAULT NULL,
  `dc_axilar` float DEFAULT NULL,
  `dc_peitoral` float DEFAULT NULL,
  `dc_coxa` float DEFAULT NULL,
  `percentual_gordura` float DEFAULT NULL,
  `massa_muscular` float DEFAULT NULL,
  `gordura` float DEFAULT NULL,
  PRIMARY KEY (`id_avalicao`),
  KEY `avalicao_antropometrica_ibfk_1` (`paciente`),
  CONSTRAINT `avalicao_antropometrica_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avalicao_antropometrica`
--

LOCK TABLES `avalicao_antropometrica` WRITE;
/*!40000 ALTER TABLE `avalicao_antropometrica` DISABLE KEYS */;
INSERT INTO `avalicao_antropometrica` VALUES (4,1,1,'2018-03-14',78,55,45,33,44,77,76,23,88,45,76,78,65,44,45,44,45,33,70),(6,1,2,'2018-04-07',50,80,76,81,70,33,32,59,61,77,29,47,23,24,68,52,24,40,45),(8,1,3,'2018-06-03',56,44,33,45,55,44,22,22,22,44,55,55,55,55,55,55,55,55,55),(9,1,4,'2018-06-03',76,44,33,45,55,44,22,22,22,44,55,55,55,55,55,55,55,55,55),(11,1,5,'2018-06-03',44,44,33,33,55,33,24,44,52,25,12,25,66,33,33,33,33,33,33),(13,26,1,'2018-06-16',79,43,33,23,34,55,67,22,33,44,55,55,55,55,55,55,55,55,55),(14,1,6,'2018-07-04',66,44,33,23,55,44,22,22,55,44,55,55,55,55,55,55,55,55,55),(15,1,7,'2018-07-04',77,44,33,23,55,55,22,22,22,44,55,55,55,55,55,55,55,55,55),(16,1,8,'2018-07-04',66,44,33,23,55,44,22,22,22,44,55,55,55,55,66,64,34,46,46),(17,1,9,'2018-07-04',67,22,33,45,55,44,67,22,33,44,55,34,54,65,55,25,51,62,26),(18,1,10,'2018-07-04',88,54,63,35,66,45,25,22,36,63,62,23,32,23,45,44,53,33,35),(19,1,11,'2018-07-04',78,44,63,35,66,45,25,22,56,63,62,23,32,23,33,33,53,33,35),(20,1,12,'2018-07-04',55,65,63,35,66,45,25,22,56,63,62,23,32,23,33,33,33,33,35),(21,27,1,'2018-07-09',78,44,45,56,44,27,25,44,45,63,62,23,32,44,45,44,45,33,70),(22,1,13,'2018-08-03',77,44,33,23,55,44,22,22,22,44,55,55,55,55,55,55,55,55,55),(23,1,14,'2018-08-07',52.9,78,98,110,89,31,32,58,56,9,15,21,28,17,11,30,0,0,0);
/*!40000 ALTER TABLE `avalicao_antropometrica` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-22  1:20:28
