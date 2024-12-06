-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: universodown
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atividade`
--

DROP TABLE IF EXISTS `atividade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atividade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_atividade` varchar(255) NOT NULL,
  `profissional` int(11) DEFAULT NULL,
  `dias_atividade` varchar(255) NOT NULL,
  `horarios` varchar(255) NOT NULL,
  `numero_vagas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profissional_id` (`profissional`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividade`
--

LOCK TABLES `atividade` WRITE;
/*!40000 ALTER TABLE `atividade` DISABLE KEYS */;
INSERT INTO `atividade` VALUES (7,'Futebol',17,'Ter, Qui','10:00, 11:00, 12:00',8),(8,'Volei',18,'Seg, Qua, Sex','08:00, 18:00',8);
/*!40000 ALTER TABLE `atividade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `cduser` int(11) NOT NULL AUTO_INCREMENT,
  `NM_ASSOCIADO` text DEFAULT NULL,
  `NM_RESPONSAVEL_ASSOCIADO` text DEFAULT NULL,
  `CPF` text DEFAULT NULL,
  `DT_NASCIMENTO` date DEFAULT NULL,
  `TELEFONE01` text DEFAULT NULL,
  `TELEFONE02` text DEFAULT NULL,
  `CEP` text DEFAULT NULL,
  `BAIRRO` text DEFAULT NULL,
  `RUA` text DEFAULT NULL,
  `SN_ADMIN` tinyint(1) DEFAULT 0,
  `SENHA` text DEFAULT NULL,
  `CARGO` text DEFAULT NULL,
  PRIMARY KEY (`cduser`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Pai','DERECK WILLWOCK CONINK','104.734.689-30','2005-01-27','47991661329','','89216-430','Glória','Rua Afonso Meister',1,'Dereck270105','Administrador'),(17,'Professor de Futebol','Professor de Futebol','32161956151','2024-12-01','47991661329','','89216-430','GLORIA','114',1,'oi','Administrador'),(18,'Professor de Volei','Professor de Volei','321','2024-12-11','47991661329','','89216430','GLORIA','aaa',1,'321','Administrador');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_atividades`
--

DROP TABLE IF EXISTS `usuarios_atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios_atividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cduser` int(11) NOT NULL,
  `atividade_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cduser` (`cduser`),
  KEY `atividade_id` (`atividade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_atividades`
--

LOCK TABLES `usuarios_atividades` WRITE;
/*!40000 ALTER TABLE `usuarios_atividades` DISABLE KEYS */;
INSERT INTO `usuarios_atividades` VALUES (10,13,6),(11,1,7),(12,1,7),(13,1,8);
/*!40000 ALTER TABLE `usuarios_atividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'universodown'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-06  0:25:40
