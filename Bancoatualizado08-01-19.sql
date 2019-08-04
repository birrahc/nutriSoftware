-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: softnutricao
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
  `afirmacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_afirmacao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afirmacao`
--

LOCK TABLES `afirmacao` WRITE;
/*!40000 ALTER TABLE `afirmacao` DISABLE KEYS */;
INSERT INTO `afirmacao` VALUES (1,'Sim'),(2,'Não'),(3,'Nenhum');
/*!40000 ALTER TABLE `afirmacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` int(11) DEFAULT NULL,
  `data_consulta` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `Obs` text,
  PRIMARY KEY (`id_agenda`),
  KEY `paciente` (`paciente`),
  KEY `tipo` (`tipo`),
  KEY `status` (`status`),
  CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id_paciente`),
  CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id_tipo`),
  CONSTRAINT `agenda_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda`
--

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alimentos`
--

DROP TABLE IF EXISTS `alimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alimentos` (
  `id_alimento` int(11) NOT NULL AUTO_INCREMENT,
  `alimento` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_alimento`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimentos`
--

LOCK TABLES `alimentos` WRITE;
/*!40000 ALTER TABLE `alimentos` DISABLE KEYS */;
INSERT INTO `alimentos` VALUES (1,'Arroz'),(2,'Feijão'),(3,'Batata'),(4,'Saladas'),(5,'Macarrão'),(6,'Carne Vermelha'),(7,'Frango'),(8,'Peixe'),(9,'Ovos'),(10,'Pão'),(11,'Biscoitos');
/*!40000 ALTER TABLE `alimentos` ENABLE KEYS */;
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
  `objetivo` varchar(60) DEFAULT NULL,
  `diagnostico_medico` int(11) DEFAULT NULL,
  `obs_diag_medico` varchar(100) DEFAULT NULL,
  `exames` int(11) DEFAULT NULL,
  `obs_exames` varchar(100) DEFAULT NULL,
  `medicamentos` int(11) DEFAULT NULL,
  `obs_medicamentos` varchar(100) DEFAULT NULL,
  `suplementos` int(11) DEFAULT NULL,
  `obs_suplementos` varchar(100) DEFAULT NULL,
  `historico_familiar` int(11) DEFAULT NULL,
  `obs_hist_familiar` varchar(100) DEFAULT NULL,
  `sinais_sintomas` int(11) DEFAULT NULL,
  `obs_sinais_sintomas` varchar(100) DEFAULT NULL,
  `habito_intestinal` int(11) DEFAULT NULL,
  `obs_hab_intestinal` varchar(100) DEFAULT NULL,
  `tabagismo` int(11) DEFAULT NULL,
  `obs_tabagismo` varchar(100) DEFAULT NULL,
  `etilismo` int(11) DEFAULT NULL,
  `obs_etilismo` varchar(100) DEFAULT NULL,
  `Atividades_fisicas` int(11) DEFAULT NULL,
  `obs_atividades` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_anaminese`),
  UNIQUE KEY `paciente` (`paciente`),
  KEY `diagnostico_medico` (`diagnostico_medico`),
  KEY `exames` (`exames`),
  KEY `medicamentos` (`medicamentos`),
  KEY `suplementos` (`suplementos`),
  KEY `historico_familiar` (`historico_familiar`),
  KEY `sinais_sintomas` (`sinais_sintomas`),
  KEY `habito_intestinal` (`habito_intestinal`),
  KEY `tabagismo` (`tabagismo`),
  KEY `etilismo` (`etilismo`),
  KEY `Atividades_fisicas` (`Atividades_fisicas`),
  CONSTRAINT `anaminese_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id_paciente`),
  CONSTRAINT `anaminese_ibfk_10` FOREIGN KEY (`etilismo`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `anaminese_ibfk_11` FOREIGN KEY (`Atividades_fisicas`) REFERENCES `atividades_fisicas` (`id_atividade`),
  CONSTRAINT `anaminese_ibfk_2` FOREIGN KEY (`diagnostico_medico`) REFERENCES `doencas` (`id_doenca`),
  CONSTRAINT `anaminese_ibfk_3` FOREIGN KEY (`exames`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `anaminese_ibfk_4` FOREIGN KEY (`medicamentos`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `anaminese_ibfk_5` FOREIGN KEY (`suplementos`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `anaminese_ibfk_6` FOREIGN KEY (`historico_familiar`) REFERENCES `doencas` (`id_doenca`),
  CONSTRAINT `anaminese_ibfk_7` FOREIGN KEY (`sinais_sintomas`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `anaminese_ibfk_8` FOREIGN KEY (`habito_intestinal`) REFERENCES `habitos` (`id_habito`),
  CONSTRAINT `anaminese_ibfk_9` FOREIGN KEY (`tabagismo`) REFERENCES `afirmacao` (`id_afirmacao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anaminese`
--

LOCK TABLES `anaminese` WRITE;
/*!40000 ALTER TABLE `anaminese` DISABLE KEYS */;
/*!40000 ALTER TABLE `anaminese` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anotacoes`
--

DROP TABLE IF EXISTS `anotacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anotacoes` (
  `id_anotacao` int(11) NOT NULL AUTO_INCREMENT,
  `data_antocao` date DEFAULT NULL,
  `paciente_anot` int(11) DEFAULT NULL,
  `decricao` text,
  PRIMARY KEY (`id_anotacao`),
  KEY `paciente_anot` (`paciente_anot`),
  CONSTRAINT `anotacoes_ibfk_1` FOREIGN KEY (`paciente_anot`) REFERENCES `pacientes` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anotacoes`
--

LOCK TABLES `anotacoes` WRITE;
/*!40000 ALTER TABLE `anotacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `anotacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atividades_fisicas`
--

DROP TABLE IF EXISTS `atividades_fisicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividades_fisicas` (
  `id_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_atividade`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividades_fisicas`
--

LOCK TABLES `atividades_fisicas` WRITE;
/*!40000 ALTER TABLE `atividades_fisicas` DISABLE KEYS */;
INSERT INTO `atividades_fisicas` VALUES (1,'nenhuma'),(2,'Academia'),(3,'Atletismo'),(4,'Ciclismo'),(5,'Futebol'),(6,'Volei'),(7,'Outros');
/*!40000 ALTER TABLE `atividades_fisicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao_antropometrica`
--

DROP TABLE IF EXISTS `avaliacao_antropometrica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao_antropometrica` (
  `id_avalicao` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_aval` int(11) DEFAULT NULL,
  `paciente` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`id_avalicao`),
  KEY `tipo_aval` (`tipo_aval`),
  KEY `paciente` (`paciente`),
  CONSTRAINT `avaliacao_antropometrica_ibfk_1` FOREIGN KEY (`tipo_aval`) REFERENCES `tipo` (`id_tipo`),
  CONSTRAINT `avaliacao_antropometrica_ibfk_2` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao_antropometrica`
--

LOCK TABLES `avaliacao_antropometrica` WRITE;
/*!40000 ALTER TABLE `avaliacao_antropometrica` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao_antropometrica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bebidas`
--

DROP TABLE IF EXISTS `bebidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bebidas` (
  `id_bebida` int(11) NOT NULL AUTO_INCREMENT,
  `bebida` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id_bebida`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bebidas`
--

LOCK TABLES `bebidas` WRITE;
/*!40000 ALTER TABLE `bebidas` DISABLE KEYS */;
INSERT INTO `bebidas` VALUES (1,'Àgua'),(2,'Chá');
/*!40000 ALTER TABLE `bebidas` ENABLE KEYS */;
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
  `agua` int(11) DEFAULT NULL,
  `obs_agua` varchar(45) DEFAULT NULL,
  `sucos` int(11) DEFAULT NULL,
  `obs_sucos` varchar(45) DEFAULT NULL,
  `durante_refeicoes` int(11) DEFAULT NULL,
  `obs_refeicoes` varchar(45) DEFAULT NULL,
  `acucares` int(11) DEFAULT NULL,
  `obs_acucares` varchar(45) DEFAULT NULL,
  `sodio` int(11) DEFAULT NULL,
  `obs_sodio` varchar(45) DEFAULT NULL,
  `refrigerantes` int(11) DEFAULT NULL,
  `obs_refri` varchar(45) DEFAULT NULL,
  `cereais` int(11) DEFAULT NULL,
  `obs_cereais` varchar(45) DEFAULT NULL,
  `frutas` int(11) DEFAULT NULL,
  `obs_frutas` varchar(45) DEFAULT NULL,
  `verduras` int(11) DEFAULT NULL,
  `obs_verduras` varchar(45) DEFAULT NULL,
  `local_almoco` int(11) DEFAULT NULL,
  `preferencias` varchar(45) DEFAULT NULL,
  `aversoes` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_consumo`),
  UNIQUE KEY `paciente_id` (`paciente_id`),
  KEY `agua` (`agua`),
  KEY `sucos` (`sucos`),
  KEY `durante_refeicoes` (`durante_refeicoes`),
  KEY `acucares` (`acucares`),
  KEY `sodio` (`sodio`),
  KEY `refrigerantes` (`refrigerantes`),
  KEY `cereais` (`cereais`),
  KEY `frutas` (`frutas`),
  KEY `verduras` (`verduras`),
  KEY `local_almoco` (`local_almoco`),
  CONSTRAINT `consumos_ibfk_1` FOREIGN KEY (`agua`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `consumos_ibfk_10` FOREIGN KEY (`local_almoco`) REFERENCES `local_almoco` (`id_local_alm`),
  CONSTRAINT `consumos_ibfk_2` FOREIGN KEY (`sucos`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `consumos_ibfk_3` FOREIGN KEY (`durante_refeicoes`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `consumos_ibfk_4` FOREIGN KEY (`acucares`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `consumos_ibfk_5` FOREIGN KEY (`sodio`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `consumos_ibfk_6` FOREIGN KEY (`refrigerantes`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `consumos_ibfk_7` FOREIGN KEY (`cereais`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `consumos_ibfk_8` FOREIGN KEY (`frutas`) REFERENCES `afirmacao` (`id_afirmacao`),
  CONSTRAINT `consumos_ibfk_9` FOREIGN KEY (`verduras`) REFERENCES `afirmacao` (`id_afirmacao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consumos`
--

LOCK TABLES `consumos` WRITE;
/*!40000 ALTER TABLE `consumos` DISABLE KEYS */;
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
  `linha` int(11) DEFAULT NULL,
  `dieta_numero` int(11) DEFAULT NULL,
  `plano_alimentar` varchar(60) DEFAULT NULL,
  `paciente` int(11) DEFAULT NULL,
  `data_dieta` date DEFAULT NULL,
  `horario` int(11) DEFAULT NULL,
  `alimento` int(11) DEFAULT NULL,
  `quantidade` varchar(100) DEFAULT NULL,
  `substituicao` int(11) DEFAULT NULL,
  `intervalos` int(11) DEFAULT NULL,
  `anotacoes` text,
  PRIMARY KEY (`id_dieta`),
  KEY `paciente` (`paciente`),
  KEY `alimento` (`alimento`),
  KEY `substituicao` (`substituicao`),
  KEY `intervalos` (`intervalos`),
  KEY `horario` (`horario`),
  CONSTRAINT `dietas_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id_paciente`),
  CONSTRAINT `dietas_ibfk_2` FOREIGN KEY (`alimento`) REFERENCES `alimentos` (`id_alimento`),
  CONSTRAINT `dietas_ibfk_3` FOREIGN KEY (`substituicao`) REFERENCES `alimentos` (`id_alimento`),
  CONSTRAINT `dietas_ibfk_4` FOREIGN KEY (`intervalos`) REFERENCES `bebidas` (`id_bebida`),
  CONSTRAINT `dietas_ibfk_5` FOREIGN KEY (`horario`) REFERENCES `horarios` (`id_horarios`)
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
-- Table structure for table `doencas`
--

DROP TABLE IF EXISTS `doencas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doencas` (
  `id_doenca` int(11) NOT NULL AUTO_INCREMENT,
  `doenca` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_doenca`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doencas`
--

LOCK TABLES `doencas` WRITE;
/*!40000 ALTER TABLE `doencas` DISABLE KEYS */;
INSERT INTO `doencas` VALUES (1,'Nenhum'),(2,'Diabets'),(3,'Cancer'),(4,'Alzheimer'),(5,'Asma'),(6,'Pressão Alta'),(7,'Pressão Baixa'),(8,'Colesterol'),(9,'Outras');
/*!40000 ALTER TABLE `doencas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habitos`
--

DROP TABLE IF EXISTS `habitos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habitos` (
  `id_habito` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_habito`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitos`
--

LOCK TABLES `habitos` WRITE;
/*!40000 ALTER TABLE `habitos` DISABLE KEYS */;
INSERT INTO `habitos` VALUES (1,'Bom'),(2,'Ruim'),(3,'1x ao dia'),(4,'2x ao dia'),(5,'3x ao dia'),(6,'1x a cada 2 dias');
/*!40000 ALTER TABLE `habitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `id_horarios` int(11) NOT NULL AUTO_INCREMENT,
  `hora` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_horarios`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (1,'00:00'),(2,'00:30'),(3,'01:00'),(4,'01:30'),(5,'02:00'),(6,'02:30'),(7,'03:00'),(8,'03:30'),(9,'04:00'),(10,'04:30'),(11,'05:00'),(12,'05:30'),(13,'06:00'),(14,'06:30'),(15,'07:00'),(16,'07:30'),(17,'08:00'),(18,'08:30'),(19,'09:00'),(20,'09:30'),(21,'10:00'),(22,'10:30'),(23,'11:00'),(24,'11:30'),(25,'12:00'),(26,'12:30'),(27,'13:00'),(28,'13:30'),(29,'14:00'),(30,'14:30'),(31,'15:00'),(32,'15:30'),(33,'16:00'),(34,'16:30'),(35,'17:00'),(36,'17:30'),(37,'18:00'),(38,'18:30'),(39,'19:00'),(40,'19:30'),(41,'18:00'),(42,'18:30'),(43,'19:00'),(44,'19:30'),(45,'20:00'),(46,'20:30'),(47,'21:00'),(48,'21:30'),(49,'22:00'),(50,'22:30'),(51,'23:00'),(52,'23:30');
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local_almoco`
--

DROP TABLE IF EXISTS `local_almoco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local_almoco` (
  `id_local_alm` int(11) NOT NULL AUTO_INCREMENT,
  `local_almoco` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_local_alm`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local_almoco`
--

LOCK TABLES `local_almoco` WRITE;
/*!40000 ALTER TABLE `local_almoco` DISABLE KEYS */;
INSERT INTO `local_almoco` VALUES (1,'Trabalho'),(2,'Em Casa'),(3,'Restaurante');
/*!40000 ALTER TABLE `local_almoco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local_atendimento`
--

DROP TABLE IF EXISTS `local_atendimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local_atendimento` (
  `id_local` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id_local`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local_atendimento`
--

LOCK TABLES `local_atendimento` WRITE;
/*!40000 ALTER TABLE `local_atendimento` DISABLE KEYS */;
INSERT INTO `local_atendimento` VALUES (1,'Ajustar',NULL,NULL),(2,'Consultorio Campinas SJ',NULL,NULL),(3,'Consultório Palhoça',NULL,NULL),(4,'Soma Palhoça',NULL,NULL),(5,'GD Acessoria',NULL,NULL),(6,'A Domicilio',NULL,NULL);
/*!40000 ALTER TABLE `local_atendimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(60) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL,
  `permissao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_login`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'carline','b3376a40bb5efb64c14a11576f7207be',NULL);
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
  `nome` varchar(45) DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `tp_sanguineo` int(11) DEFAULT NULL,
  `profissao` varchar(45) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`),
  KEY `sexo` (`sexo`),
  KEY `tp_sanguineo` (`tp_sanguineo`),
  CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`id_sexo`),
  CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`tp_sanguineo`) REFERENCES `tipo_sanguineo` (`id_tp_sangue`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamentos` (
  `id_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `data_cons` date DEFAULT NULL,
  `referencia` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `plano` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `qtd_vezes` int(11) DEFAULT NULL,
  `valor_parcelas` double DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL,
  `l_atendimento` int(11) DEFAULT NULL,
  `observacao` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_pagamento`),
  KEY `referencia` (`referencia`),
  KEY `tipo` (`tipo`),
  KEY `plano` (`plano`),
  KEY `situacao` (`situacao`),
  KEY `l_atendimento` (`l_atendimento`),
  CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`referencia`) REFERENCES `avaliacao_antropometrica` (`id_avalicao`),
  CONSTRAINT `pagamentos_ibfk_3` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id_tipo`),
  CONSTRAINT `pagamentos_ibfk_4` FOREIGN KEY (`plano`) REFERENCES `planos` (`id_plano`),
  CONSTRAINT `pagamentos_ibfk_5` FOREIGN KEY (`situacao`) REFERENCES `status` (`id_status`),
  CONSTRAINT `pagamentos_ibfk_6` FOREIGN KEY (`l_atendimento`) REFERENCES `local_atendimento` (`id_local`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamentos`
--

LOCK TABLES `pagamentos` WRITE;
/*!40000 ALTER TABLE `pagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planos`
--

DROP TABLE IF EXISTS `planos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planos` (
  `id_plano` int(11) NOT NULL AUTO_INCREMENT,
  `planos` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_plano`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planos`
--

LOCK TABLES `planos` WRITE;
/*!40000 ALTER TABLE `planos` DISABLE KEYS */;
INSERT INTO `planos` VALUES (1,'Consulta normal'),(2,'Pacote'),(3,'Gratuito'),(4,'convênio');
/*!40000 ALTER TABLE `planos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexo`
--

DROP TABLE IF EXISTS `sexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
  `sexo` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexo`
--

LOCK TABLES `sexo` WRITE;
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` VALUES (1,'M'),(2,'F');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'A pagar'),(2,'Pago'),(3,'Confirmado'),(4,'Cancelado');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,'Consulta'),(2,'Retorno'),(3,'Consulta Pacote'),(4,'Retorno Pacote'),(5,'Desafio');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_sanguineo`
--

DROP TABLE IF EXISTS `tipo_sanguineo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_sanguineo` (
  `id_tp_sangue` int(11) NOT NULL AUTO_INCREMENT,
  `sangues` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_tp_sangue`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_sanguineo`
--

LOCK TABLES `tipo_sanguineo` WRITE;
/*!40000 ALTER TABLE `tipo_sanguineo` DISABLE KEYS */;
INSERT INTO `tipo_sanguineo` VALUES (1,'A+'),(2,'A-'),(3,'B+'),(4,'B-'),(5,'AB+'),(6,'AB-'),(7,'O+'),(8,'O-');
/*!40000 ALTER TABLE `tipo_sanguineo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'softnutricao'
--

--
-- Dumping routines for database 'softnutricao'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-08 22:14:33
