CREATE DATABASE  IF NOT EXISTS `smarty` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `smarty`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: smarty
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `avisos`
--

DROP TABLE IF EXISTS `avisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(40) NOT NULL,
  `msg` varchar(400) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avisos`
--

LOCK TABLES `avisos` WRITE;
/*!40000 ALTER TABLE `avisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `avisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infors`
--

DROP TABLE IF EXISTS `infors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `infors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `abbr` varchar(10) NOT NULL,
  `divisao` enum('M','B','T','S') NOT NULL,
  `diretor` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` char(11) NOT NULL,
  `whatsapp` char(11) NOT NULL,
  `facebook` varchar(60) NOT NULL,
  `grupoprofs` varchar(50) DEFAULT NULL,
  `maps` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infors`
--

LOCK TABLES `infors` WRITE;
/*!40000 ALTER TABLE `infors` DISABLE KEYS */;
INSERT INTO `infors` VALUES (1,'Smarty Pro Demo','SPD','B','KauÃ£ Landi Fernando','suporte@smarty.com','11940028922','21999222644','https://www.facebook.com/groups/suporteti','https://chat.whatsapp.com/HEumJxRqg7t8UUAvZdpfCV','https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7377.360709075382!2d-43.0076355!3d-22.4034045!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x984d51f792ffcf%3A0xa53e1f32ad746858!2zMjLCsDI0JzEwLjQiUyA0M8KwMDAnMzcuNSJX!5e0!3m2!1spt-BR!2sbr!4v1629720483694!5m2!1spt-BR!2sbr');
/*!40000 ALTER TABLE `infors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(50) NOT NULL,
  `disciplina` varchar(40) NOT NULL,
  `nota` decimal(4,2) NOT NULL,
  `freq` decimal(5,2) NOT NULL,
  `divisao` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `matricula` (`matricula`),
  CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `users` (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `matricula` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nascimento` date NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `nivel` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`matricula`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('001','supersu@smarty.com','02102005ka','KauÃ£ Landi Fernando','2005-10-02','21999222644','78945612312','4'),('002','aluno@smarty.com','123','Aluno Smarty','1999-09-09','12312312312','12312312312','1'),('003','professor@smarty.com','123','Professor Smarty','1999-09-09','21999998888','12312312312','2'),('004','moderador@smarty.com','123','Moderador Smarty','1999-09-09','21999998888','12312312312','3');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-23 19:09:42
