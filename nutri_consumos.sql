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
-- Table structure for table `consumos`
--

DROP TABLE IF EXISTS `consumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consumos` (
  `id_consumo` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_id` int(11) DEFAULT NULL,
  `agua` varchar(60) DEFAULT NULL,
  `sucos` varchar(60) DEFAULT NULL,
  `durante_refeicoes` varchar(60) DEFAULT NULL,
  `acucares` varchar(60) DEFAULT NULL,
  `sodio` varchar(60) DEFAULT NULL,
  `refrigerantes` varchar(60) DEFAULT NULL,
  `cereais` varchar(60) DEFAULT NULL,
  `frutas` varchar(60) DEFAULT NULL,
  `verduras` varchar(60) DEFAULT NULL,
  `local_almoco` varchar(70) DEFAULT NULL,
  `preferencias` varchar(70) DEFAULT NULL,
  `aversoes` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id_consumo`),
  UNIQUE KEY `paciente_id_UNIQUE` (`paciente_id`),
  CONSTRAINT `consumos_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumos`
--

LOCK TABLES `consumos` WRITE;
/*!40000 ALTER TABLE `consumos` DISABLE KEYS */;
INSERT INTO `consumos` VALUES (1,1,'Durante o dia','Pouco','Sim','Café','Almoço e Janta','Durante o Almoço','Não','Café da manhã e tarde','Tomate e Alface','Trabaho','Carne e frango','Peixe, frango cozido'),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,NULL,'pouco','Pouco','cachaça','nao','almoço','sim','Não','nao','Tomate e Alface','na obra','Carne','saladas'),(18,7,'pouco','Pouco','cachaça','nao','almoço','sim','nao','nao','nao','na obra','Carne','saladas'),(19,26,'Não','pouco ','Agua','Sim no café','pouco','Não','Não','pouco','pouco nas refeições','Trabalho','Carnes','Peixe'),(20,27,'pouco','Pouco','cachaça','nao','almoço','Durante o Almoço','Não','nao','Tomate e Alface','Trabaho','Carne e frango','saladas');
/*!40000 ALTER TABLE `consumos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-22  1:20:25
