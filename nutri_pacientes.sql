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
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `profissao` varchar(45) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,'Júnior César de Oliveira','1984-08-14','Aux. de Estoque Logistica','991480381','jrcjuniorcesar@gmail.com'),(7,'Carlos José','1999-09-14','Servente de pedreiro','48991480381','carlos@gmail.com'),(8,'Joana Vieira','1988-07-21','Faxineira','48991480381','joana@hotmail.com'),(9,'Joaquim soares','1985-07-09','Pedreiro','489984567','Joaq@gmail.com'),(23,'Carline Moesch','1987-10-21','Nutricionista','48991480381','carline.moesch@hotmail.com'),(25,'Fredolato Souza','2000-05-11','Operador de estoque','48991480381','carline.moesch@hotmail.com'),(26,'Josenildo da Coluna','1995-09-26','Servente de pedreiro','48991480381','jse@gmail.com'),(27,'Daniale Santos Oliveira','1980-07-05','Telefonista','48999776655','dani@gmail.com'),(28,'Elizeu Sagaz Souza','1998-07-16','Garson','48991480381','elizzz@hotmail.com'),(29,'Ferdinando','0000-00-00','','48991480381','carline.moesch@hotmail.com'),(30,'Paulo','0000-00-00','','',''),(31,'Andre','0000-00-00','','',''),(32,'Gustavo','0000-00-00','','',''),(33,'Antoniele','0000-00-00','','',''),(34,'Jucelene','0000-00-00','','',''),(35,'Fabricio Amaral','0000-00-00','','',''),(36,'Otavio','0000-00-00','','',''),(37,'Raimundo','0000-00-00','','',''),(38,'Rosa Maria','0000-00-00','','',''),(39,'Natalia','2008-08-08','','',''),(40,'Leonor Souza','0000-00-00','','',''),(41,'Aldo Siqueira','0000-00-00','','',''),(42,'Eleonor Silva','0000-00-00','','',''),(43,'Davi','0000-00-00','','48991480381','carline.moesch@hotmail.com'),(44,'Jair','0000-00-00','','',''),(45,'Suzana','0000-00-00','','',''),(46,'Amarildo','0000-00-00','','',''),(47,'Cintia ','0000-00-00','','',''),(48,'Matilde','0000-00-00','','',''),(49,'Yonis','0000-00-00','','',''),(51,'Roselvaldo','1999-08-08','','',''),(52,'Carlao','0000-00-00','','',''),(53,'Leonardo Lima Cordeiro','0000-00-00','','',''),(54,'Fredolato Souza','0000-00-00','','','');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
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
