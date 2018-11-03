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
-- Table structure for table `anaminese`
--

DROP TABLE IF EXISTS `anaminese`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anaminese` (
  `id_anaminese` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` int(11) DEFAULT NULL,
  `objetivo` varchar(100) DEFAULT NULL,
  `diagnostico_medico` varchar(100) DEFAULT NULL,
  `exames` varchar(200) DEFAULT NULL,
  `medicamentos` varchar(100) DEFAULT NULL,
  `suplementos` varchar(100) DEFAULT NULL,
  `historico_familiar` varchar(200) DEFAULT NULL,
  `sinais_sintomas` varchar(100) DEFAULT NULL,
  `habito_intestinal` varchar(100) DEFAULT NULL,
  `tabagismo` varchar(100) DEFAULT NULL,
  `etilismo` varchar(100) DEFAULT NULL,
  `Atividades_fisicas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_anaminese`),
  UNIQUE KEY `paciente_UNIQUE` (`paciente`),
  CONSTRAINT `anaminese_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anaminese`
--

LOCK TABLES `anaminese` WRITE;
/*!40000 ALTER TABLE `anaminese` DISABLE KEYS */;
INSERT INTO `anaminese` VALUES (1,1,'Emagrecer 20k','nada','nenhum','nenhum','Criatina','Cancer','Dores de Cabeça','3x ao dia','Não','Não','Corrida e Bike'),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,7,'Emagrecer para manter a sude','Diabets','nenhum','Viagra','Criatiana','catapora','Cirrose','5x ao dia','Derbi','sim','Levantameto de Massa'),(20,26,'ficar perecido com uma nuvem','nenhum','prostata','Cardenal','nenhum','','dor nas coxta','Banana e maça','nenhum','Trabalho','recobar parede'),(21,27,'Emagrecer para manter a sude','Diabets','nenhum','nenhum','Criatiana','catapora','Cirrose','5x ao dia','Não','sim','Levantameto de Massa');
/*!40000 ALTER TABLE `anaminese` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-22  1:20:27
