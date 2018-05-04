-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: tecsup_transport
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Current Database: `tecsup_transport`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `tecsup_transport` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tecsup_transport`;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `idalumno` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `paterno` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idalumno`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (1,'108183','Bruno','Leon','gerardo.leon@tecsup.edu.pe');
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno_posicion`
--

DROP TABLE IF EXISTS `alumno_posicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno_posicion` (
  `idalumno_posicion` int(11) NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(45) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `alumno_idalumno` int(11) NOT NULL,
  PRIMARY KEY (`idalumno_posicion`),
  KEY `fk_alumno_posicion_alumno_idx` (`alumno_idalumno`),
  CONSTRAINT `fk_alumno_posicion_alumno` FOREIGN KEY (`alumno_idalumno`) REFERENCES `alumno` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_posicion`
--

LOCK TABLES `alumno_posicion` WRITE;
/*!40000 ALTER TABLE `alumno_posicion` DISABLE KEYS */;
INSERT INTO `alumno_posicion` VALUES (1,'-12.04547655 -77.02241494','2018-04-15 22:44:58',1),(2,'-12.04547529 -77.02241575','2018-04-15 22:45:40',1),(3,'-12.04547993 -77.02241391','2018-04-15 22:45:43',1),(4,'-12.04547939 -77.02241417','2018-04-15 22:45:45',1),(5,'-12.0454785 -77.0224148','2018-04-15 22:45:47',1),(6,'-12.0454785 -77.02241557','2018-04-15 22:45:49',1),(7,'-12.04547878 -77.02241587','2018-04-15 22:45:51',1),(8,'-12.045479 -77.02241608','2018-04-15 22:45:53',1),(9,'-12.04547915 -77.02241626','2018-04-15 22:45:55',1),(10,'-12.04547997 -77.02241687','2018-04-15 22:45:57',1),(11,'-12.745689 -77.461325','2018-04-15 22:53:58',1),(12,'-12.745689 -77.461325','2018-04-15 22:54:47',1),(13,'-12.745689 -77.461325','2018-04-15 22:55:54',1),(14,'-12.745689 -77.461325','2018-04-15 22:56:24',1),(15,'-12.745689 -77.461325','2018-04-15 22:56:36',1),(16,'-12.745689 -77.461325','2018-04-15 22:56:45',1),(17,'-12.745689 -77.461325','2018-04-15 22:57:05',1),(18,'-12.745689 -77.461325','2018-04-15 22:57:17',1),(19,'-12.04554661 -77.02212575','2018-04-15 23:05:45',1),(20,'-12.0454483 -77.022498','2018-04-15 23:08:01',1),(21,'-12.04547561 -77.02243249','2018-04-15 23:10:57',1),(22,'-12.0454929 -77.02243275','2018-04-15 23:13:30',1),(23,'-12.04550668 -77.02243215','2018-04-15 23:14:11',1),(24,'-12.04551208 -77.02243351','2018-04-15 23:17:38',1),(25,'-12.04552991 -77.02243304','2018-04-15 23:18:49',1),(26,'-12.04553841 -77.02243307','2018-04-15 23:20:54',1),(27,'-12.04448606 -76.95266678','2018-04-16 11:40:35',1),(28,'-12.04430806 -76.95257936','2018-04-16 12:09:21',1),(29,'-12.04336729 -76.95213598','2018-04-16 12:09:57',1),(30,'-12.04336729 -76.95213598','2018-04-16 12:09:57',1),(31,'-12.04446056 -76.95261088','2018-04-16 12:14:05',1),(32,'-12.04445921 -76.9526426','2018-04-16 12:16:10',1),(33,'-12.04445767 -76.95264643','2018-04-16 12:16:26',1),(34,'-12.04446146 -76.95264235','2018-04-16 12:18:23',1),(35,'-12.04446169 -76.95264088','2018-04-16 12:23:53',1),(36,'-12.04450625 -76.95266088','2018-04-16 12:24:21',1),(37,'-12.04450464 -76.95266225','2018-04-16 12:27:24',1),(38,'-12.04449946 -76.95265524','2018-04-16 12:32:28',1),(39,'-12.04441254 -76.95249544','2018-04-16 12:35:07',1),(40,'-74.66666 -12.66666','2018-05-01 22:59:48',1);
/*!40000 ALTER TABLE `alumno_posicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bus`
--

DROP TABLE IF EXISTS `bus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bus` (
  `idbus` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idbus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bus`
--

LOCK TABLES `bus` WRITE;
/*!40000 ALTER TABLE `bus` DISABLE KEYS */;
/*!40000 ALTER TABLE `bus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bus_posicion`
--

DROP TABLE IF EXISTS `bus_posicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bus_posicion` (
  `idbus_posicion` int(11) NOT NULL AUTO_INCREMENT,
  `inicio` datetime DEFAULT NULL,
  `fina` datetime DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `hora_ubicacion` datetime DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `bus_idbus` int(11) NOT NULL,
  `paradero_idparadero` int(11) NOT NULL,
  PRIMARY KEY (`idbus_posicion`),
  KEY `fk_bus_posicion_bus1_idx` (`bus_idbus`),
  KEY `fk_bus_posicion_paradero1_idx` (`paradero_idparadero`),
  CONSTRAINT `fk_bus_posicion_bus1` FOREIGN KEY (`bus_idbus`) REFERENCES `bus` (`idbus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bus_posicion_paradero1` FOREIGN KEY (`paradero_idparadero`) REFERENCES `paradero` (`idparadero`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bus_posicion`
--

LOCK TABLES `bus_posicion` WRITE;
/*!40000 ALTER TABLE `bus_posicion` DISABLE KEYS */;
/*!40000 ALTER TABLE `bus_posicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paradero`
--

DROP TABLE IF EXISTS `paradero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paradero` (
  `idparadero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `hora_partida` time DEFAULT NULL,
  PRIMARY KEY (`idparadero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paradero`
--

LOCK TABLES `paradero` WRITE;
/*!40000 ALTER TABLE `paradero` DISABLE KEYS */;
INSERT INTO `paradero` VALUES (1,'Puente Nuevo','-12.029788 -76.998393','07:10:00'),(2,'Aviacion','-12.112096 -77.007647','07:10:00'),(3,'Santa Anita','-12.056543 -76.974657','07:20:00');
/*!40000 ALTER TABLE `paradero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasantia`
--

DROP TABLE IF EXISTS `pasantia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasantia` (
  `idpasantia` int(11) NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(45) DEFAULT NULL,
  `nombre_empresa` varchar(45) DEFAULT NULL,
  `alumno_idalumno` int(11) NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`idpasantia`),
  KEY `fk_pasantia_alumno1_idx` (`alumno_idalumno`),
  CONSTRAINT `fk_pasantia_alumno1` FOREIGN KEY (`alumno_idalumno`) REFERENCES `alumno` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasantia`
--

LOCK TABLES `pasantia` WRITE;
/*!40000 ALTER TABLE `pasantia` DISABLE KEYS */;
INSERT INTO `pasantia` VALUES (1,'-12.045455 -76.952297','TECSUP',1,'2018-04-08 16:59:47');
/*!40000 ALTER TABLE `pasantia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-04 13:20:54
