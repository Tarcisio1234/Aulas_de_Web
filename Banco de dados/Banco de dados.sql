CREATE DATABASE  IF NOT EXISTS `tintas_web` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tintas_web`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: tintas_web
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cadcliente`
--

DROP TABLE IF EXISTS `cadcliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadcliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` double DEFAULT NULL,
  `cnpj` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `rua` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `numero` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `bairro` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `cidade` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `complemento` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadcliente`
--

LOCK TABLES `cadcliente` WRITE;
/*!40000 ALTER TABLE `cadcliente` DISABLE KEYS */;
INSERT INTO `cadcliente` VALUES (1,'Luiz Alverto',12345678910,NULL,'123456789','rua colorida','405','Tiguera','Juiz de Fora','MG',NULL),(2,'Lucina Carmo',12345678910,NULL,'123456789','Alpha Vile','1000','São Pedro','Juiz de Fora','MG',NULL),(3,'Igor Aparecido',12345678910,NULL,'123456789','Alpha Vile','1000','São Pedro','Juiz de Fora','MG',NULL),(4,'Mario Bros',10987654321,NULL,'123456789','Alpha Vile','1000','Japão','Juiz de Fora','MG',NULL);
/*!40000 ALTER TABLE `cadcliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cadfornecedor`
--

DROP TABLE IF EXISTS `cadfornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadfornecedor` (
  `idFornecedor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `cnpj` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `celular` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `rua` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `numero` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `bairro` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `cidade` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idFornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadfornecedor`
--

LOCK TABLES `cadfornecedor` WRITE;
/*!40000 ALTER TABLE `cadfornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `cadfornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerenciamento`
--

DROP TABLE IF EXISTS `gerenciamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gerenciamento` (
  `idProduto` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(18) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci NOT NULL,
  `marca` varchar(18) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cor` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `unidadeMedida` double NOT NULL,
  `precoCusto` double NOT NULL,
  `precoVenda` double NOT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerenciamento`
--

LOCK TABLES `gerenciamento` WRITE;
/*!40000 ALTER TABLE `gerenciamento` DISABLE KEYS */;
INSERT INTO `gerenciamento` VALUES (1,'Coral','Dinta para o exterior','Coral','Branca','Exterior',1,100,150),(2,'Multi cololor','Dinta para o interior','Multi','Verde','Interior',1,100,150);
/*!40000 ALTER TABLE `gerenciamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendas` (
  `idVenda` int NOT NULL AUTO_INCREMENT,
  `idCliente` int DEFAULT NULL,
  `idProduto` int DEFAULT NULL,
  `dataVenda` date DEFAULT NULL,
  `qtdVenda` int DEFAULT NULL,
  `formaPagamento` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valorTotal` double DEFAULT NULL,
  `numeNF` double DEFAULT NULL,
  `descricao` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idVenda`),
  KEY `fkCliente` (`idCliente`),
  KEY `fkProduto` (`idProduto`),
  CONSTRAINT `fkCliente` FOREIGN KEY (`idCliente`) REFERENCES `cadcliente` (`idCliente`),
  CONSTRAINT `fkProduto` FOREIGN KEY (`idProduto`) REFERENCES `gerenciamento` (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (1,1,2,'2024-07-15',3,'Dinhero',350,1000,'tinta'),(2,1,2,'2024-07-15',3,'Dinhero',350,1000,'tinta');
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'tintas_web'
--

--
-- Dumping routines for database 'tintas_web'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-15 11:40:04
