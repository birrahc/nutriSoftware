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
-- Table structure for table `afirmacao`
--

DROP TABLE IF EXISTS `afirmacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afirmacao` (
  `id_afirmacao` int(11) NOT NULL AUTO_INCREMENT,
  `afirmacao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_afirmacao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afirmacao`
--

LOCK TABLES `afirmacao` WRITE;
/*!40000 ALTER TABLE `afirmacao` DISABLE KEYS */;
INSERT INTO `afirmacao` VALUES (1,'Não'),(2,'Sim');
/*!40000 ALTER TABLE `afirmacao` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `dietas`
--

DROP TABLE IF EXISTS `dietas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dietas` (
  `id_dieta` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` int(11) DEFAULT NULL,
  `data_dieta` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `alimentos` text,
  `quantidade` varchar(45) DEFAULT NULL,
  `substituicao` text,
  PRIMARY KEY (`id_dieta`),
  KEY `paciente` (`paciente`),
  CONSTRAINT `dietas_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dietas`
--

LOCK TABLES `dietas` WRITE;
/*!40000 ALTER TABLE `dietas` DISABLE KEYS */;
/*!40000 ALTER TABLE `dietas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `permissao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_login`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (8,'carline','81dc9bdb52d04dc20036dbd8313ed055',3);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `sexo`
--

DROP TABLE IF EXISTS `sexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
  `sexo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexo`
--

LOCK TABLES `sexo` WRITE;
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-22  1:18:49
