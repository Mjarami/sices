-- MariaDB dump 10.19  Distrib 10.5.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sices
-- ------------------------------------------------------
-- Server version	10.5.18-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Accesos`
--

DROP TABLE IF EXISTS `Accesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Accesos` (
  `idacc` int(11) NOT NULL AUTO_INCREMENT,
  `idrol` int(11) DEFAULT NULL,
  `idest` int(11) DEFAULT NULL,
  `idper` int(11) DEFAULT NULL,
  `usuacc` varchar(100) DEFAULT NULL,
  `conacc` varchar(100) DEFAULT NULL,
  `codacc` text DEFAULT NULL,
  PRIMARY KEY (`idacc`),
  KEY `idrol` (`idrol`),
  KEY `idest` (`idest`),
  KEY `idper` (`idper`),
  CONSTRAINT `Accesos_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `Roles` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Accesos_ibfk_2` FOREIGN KEY (`idest`) REFERENCES `Estatus` (`idest`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Accesos_ibfk_3` FOREIGN KEY (`idper`) REFERENCES `Personas` (`idper`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Accesos`
--

LOCK TABLES `Accesos` WRITE;
/*!40000 ALTER TABLE `Accesos` DISABLE KEYS */;
INSERT INTO `Accesos` VALUES (2,1,1,1,'admin','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',NULL);
/*!40000 ALTER TABLE `Accesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Acciones`
--

DROP TABLE IF EXISTS `Acciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Acciones` (
  `idaci` int(11) NOT NULL AUTO_INCREMENT,
  `nomaci` text DEFAULT NULL,
  PRIMARY KEY (`idaci`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Acciones`
--

LOCK TABLES `Acciones` WRITE;
/*!40000 ALTER TABLE `Acciones` DISABLE KEYS */;
INSERT INTO `Acciones` VALUES (1,'entrada'),(2,'salida'),(3,'modificacion');
/*!40000 ALTER TABLE `Acciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Auditorias`
--

DROP TABLE IF EXISTS `Auditorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Auditorias` (
  `idaud` int(11) NOT NULL AUTO_INCREMENT,
  `idpro` int(11) DEFAULT NULL,
  `idmot` int(11) DEFAULT NULL,
  `lugaud` text DEFAULT NULL,
  PRIMARY KEY (`idaud`),
  KEY `idpro` (`idpro`),
  KEY `idmot` (`idmot`),
  CONSTRAINT `Auditorias_ibfk_1` FOREIGN KEY (`idpro`) REFERENCES `Procesos` (`idpro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Auditorias_ibfk_2` FOREIGN KEY (`idmot`) REFERENCES `Motivos` (`idmot`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Auditorias`
--

LOCK TABLES `Auditorias` WRITE;
/*!40000 ALTER TABLE `Auditorias` DISABLE KEYS */;
INSERT INTO `Auditorias` VALUES (1,1,5,'Pase'),(2,2,6,'Pase'),(3,3,6,'Pase');
/*!40000 ALTER TABLE `Auditorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CompaniaCorreo`
--

DROP TABLE IF EXISTS `CompaniaCorreo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CompaniaCorreo` (
  `idcco` int(11) NOT NULL AUTO_INCREMENT,
  `nomcco` text DEFAULT NULL,
  PRIMARY KEY (`idcco`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CompaniaCorreo`
--

LOCK TABLES `CompaniaCorreo` WRITE;
/*!40000 ALTER TABLE `CompaniaCorreo` DISABLE KEYS */;
INSERT INTO `CompaniaCorreo` VALUES (1,'hotmail'),(2,'gmail'),(3,'yahoo'),(4,'aviacion');
/*!40000 ALTER TABLE `CompaniaCorreo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Departamentos`
--

DROP TABLE IF EXISTS `Departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Departamentos` (
  `iddep` int(11) NOT NULL AUTO_INCREMENT,
  `idgru` int(11) DEFAULT NULL,
  `nomdep` text DEFAULT NULL,
  PRIMARY KEY (`iddep`),
  KEY `idgru` (`idgru`),
  CONSTRAINT `Departamentos_ibfk_1` FOREIGN KEY (`idgru`) REFERENCES `Grupos` (`idgru`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Departamentos`
--

LOCK TABLES `Departamentos` WRITE;
/*!40000 ALTER TABLE `Departamentos` DISABLE KEYS */;
INSERT INTO `Departamentos` VALUES (1,1,'coordinacion de extension'),(2,1,'servicios estudiantiles'),(3,1,'curriculo'),(4,1,'instruccion academica'),(5,1,'investigacion'),(6,1,'tic'),(7,1,'desarrollo docente'),(8,1,'control de estudio y evaluacion'),(9,1,'comando del grupo academico'),(10,1,'visitantes'),(11,1,'militares'),(12,6,'subdireccion'),(13,4,'planes'),(14,1,'rrii');
/*!40000 ALTER TABLE `Departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Estatus`
--

DROP TABLE IF EXISTS `Estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Estatus` (
  `idest` int(11) NOT NULL AUTO_INCREMENT,
  `nomest` text DEFAULT NULL,
  PRIMARY KEY (`idest`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Estatus`
--

LOCK TABLES `Estatus` WRITE;
/*!40000 ALTER TABLE `Estatus` DISABLE KEYS */;
INSERT INTO `Estatus` VALUES (1,'activo'),(2,'inactivo');
/*!40000 ALTER TABLE `Estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Grados`
--

DROP TABLE IF EXISTS `Grados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Grados` (
  `idgra` int(11) NOT NULL AUTO_INCREMENT,
  `nomgra` text DEFAULT NULL,
  PRIMARY KEY (`idgra`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Grados`
--

LOCK TABLES `Grados` WRITE;
/*!40000 ALTER TABLE `Grados` DISABLE KEYS */;
INSERT INTO `Grados` VALUES (1,'GJ'),(2,'MG'),(3,'GD'),(4,'GB'),(5,'CNEL'),(6,'TCNEL'),(7,'MAY'),(8,'CAP'),(9,'1TTE'),(10,'TTE'),(11,'SS'),(12,'SA'),(13,'SM1'),(14,'SM2'),(15,'SM3'),(16,'S1'),(17,'S2'),(18,'C/1'),(19,'C/2'),(20,'S/D'),(21,'S/R'),(22,'S/A'),(23,'ING'),(24,'LIC'),(25,'MSC. SOC.'),(26,'PROF'),(27,'TSU'),(28,'ABOG'),(29,'CDDNO/A');
/*!40000 ALTER TABLE `Grados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Grupos`
--

DROP TABLE IF EXISTS `Grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Grupos` (
  `idgru` int(11) NOT NULL AUTO_INCREMENT,
  `nomgru` text DEFAULT NULL,
  PRIMARY KEY (`idgru`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Grupos`
--

LOCK TABLES `Grupos` WRITE;
/*!40000 ALTER TABLE `Grupos` DISABLE KEYS */;
INSERT INTO `Grupos` VALUES (1,'academico'),(2,'apoyo'),(3,'cadetes'),(4,'planes'),(5,'visitantes'),(6,'direccion');
/*!40000 ALTER TABLE `Grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Motivos`
--

DROP TABLE IF EXISTS `Motivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Motivos` (
  `idmot` int(11) NOT NULL AUTO_INCREMENT,
  `nommot` text DEFAULT NULL,
  PRIMARY KEY (`idmot`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Motivos`
--

LOCK TABLES `Motivos` WRITE;
/*!40000 ALTER TABLE `Motivos` DISABLE KEYS */;
INSERT INTO `Motivos` VALUES (1,'registrar'),(2,'insertar'),(3,'editar'),(4,'eliminar'),(5,'iniciar_sices'),(6,'ingresar_menu_administrativo');
/*!40000 ALTER TABLE `Motivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Partes`
--

DROP TABLE IF EXISTS `Partes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Partes` (
  `idpar` int(11) NOT NULL AUTO_INCREMENT,
  `idpro` int(11) DEFAULT NULL,
  `haspar` date DEFAULT NULL,
  `obspar` text DEFAULT NULL,
  PRIMARY KEY (`idpar`),
  KEY `idpro` (`idpro`),
  CONSTRAINT `Partes_ibfk_1` FOREIGN KEY (`idpro`) REFERENCES `Procesos` (`idpro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Partes`
--

LOCK TABLES `Partes` WRITE;
/*!40000 ALTER TABLE `Partes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Partes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Personas`
--

DROP TABLE IF EXISTS `Personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Personas` (
  `idper` int(11) NOT NULL AUTO_INCREMENT,
  `iddep` int(11) DEFAULT NULL,
  `cedper` varchar(9) DEFAULT NULL,
  `apeper` varchar(100) DEFAULT NULL,
  `nomper` varchar(100) DEFAULT NULL,
  `anoper` int(4) DEFAULT NULL,
  `mesper` int(2) DEFAULT NULL,
  `diaper` int(2) DEFAULT NULL,
  `telper` varchar(11) DEFAULT NULL,
  `celper` varchar(11) DEFAULT NULL,
  `corper` varchar(100) DEFAULT NULL,
  `idcco` int(11) DEFAULT NULL,
  `idtco` int(11) DEFAULT NULL,
  `dirper` text DEFAULT NULL,
  `idgra` int(11) DEFAULT NULL,
  `fotper` text DEFAULT NULL,
  PRIMARY KEY (`idper`),
  KEY `iddep` (`iddep`),
  KEY `idcco` (`idcco`),
  KEY `idtco` (`idtco`),
  KEY `idgra` (`idgra`),
  CONSTRAINT `Personas_ibfk_1` FOREIGN KEY (`iddep`) REFERENCES `Departamentos` (`iddep`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Personas_ibfk_2` FOREIGN KEY (`idcco`) REFERENCES `CompaniaCorreo` (`idcco`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Personas_ibfk_3` FOREIGN KEY (`idtco`) REFERENCES `TipoCorreo` (`idtco`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Personas_ibfk_4` FOREIGN KEY (`idgra`) REFERENCES `Grados` (`idgra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Personas`
--

LOCK TABLES `Personas` WRITE;
/*!40000 ALTER TABLE `Personas` DISABLE KEYS */;
INSERT INTO `Personas` VALUES (1,6,'admin','admin','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Procesos`
--

DROP TABLE IF EXISTS `Procesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Procesos` (
  `idpro` int(11) NOT NULL AUTO_INCREMENT,
  `idaci` int(11) DEFAULT NULL,
  `idsit` int(11) DEFAULT NULL,
  `idacc` int(11) DEFAULT NULL,
  `idper` int(11) DEFAULT NULL,
  `fecpro` date DEFAULT NULL,
  `horpro` time DEFAULT NULL,
  PRIMARY KEY (`idpro`),
  KEY `idaci` (`idaci`),
  KEY `idsit` (`idsit`),
  KEY `idacc` (`idacc`),
  KEY `idper` (`idper`),
  CONSTRAINT `Procesos_ibfk_1` FOREIGN KEY (`idaci`) REFERENCES `Acciones` (`idaci`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Procesos_ibfk_2` FOREIGN KEY (`idsit`) REFERENCES `Situaciones` (`idsit`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Procesos_ibfk_3` FOREIGN KEY (`idacc`) REFERENCES `Accesos` (`idacc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Procesos_ibfk_4` FOREIGN KEY (`idper`) REFERENCES `Personas` (`idper`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Procesos`
--

LOCK TABLES `Procesos` WRITE;
/*!40000 ALTER TABLE `Procesos` DISABLE KEYS */;
INSERT INTO `Procesos` VALUES (1,1,1,NULL,1,'2023-01-29','04:37:33'),(2,1,1,NULL,1,'2023-01-29','04:38:17'),(3,1,1,NULL,1,'2023-01-29','05:09:02');
/*!40000 ALTER TABLE `Procesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Roles`
--

DROP TABLE IF EXISTS `Roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nomrol` text DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Roles`
--

LOCK TABLES `Roles` WRITE;
/*!40000 ALTER TABLE `Roles` DISABLE KEYS */;
INSERT INTO `Roles` VALUES (1,'administrador'),(2,'guardia academico'),(3,'trabajador'),(4,'invitado');
/*!40000 ALTER TABLE `Roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Situaciones`
--

DROP TABLE IF EXISTS `Situaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Situaciones` (
  `idsit` int(11) NOT NULL AUTO_INCREMENT,
  `nomsit` text DEFAULT NULL,
  `codsit` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsit`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Situaciones`
--

LOCK TABLES `Situaciones` WRITE;
/*!40000 ALTER TABLE `Situaciones` DISABLE KEYS */;
INSERT INTO `Situaciones` VALUES (1,'presente',0),(2,'permiso exterior',1),(3,'permiso pais',2),(4,'permiso local',3),(5,'permiso por horas',4),(6,'comision exterior',5),(7,'comision pais',6),(8,'comision local',7),(9,'comision estudios',8),(10,'comision servicios',9),(11,'destacado',10),(12,'licencia',11),(13,'curso',12),(14,'retardado',13),(15,'alta',14),(16,'baja',15),(17,'vacaciones',16),(18,'proceso militar',17),(19,'consulta medica',18),(20,'hospitalizacion',19),(21,'reposo',20),(22,'control anual',21),(23,'inasistente',22),(24,'turno tarde',23),(25,'desertor',24),(26,'guardia',25),(27,'centro penitenciario',26),(28,'arresto severo',27),(29,'arresto simple',28),(30,'enfermo en casa',29),(31,'rehabilitacion',30),(32,'permiso no remunerado',31);
/*!40000 ALTER TABLE `Situaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TipoCorreo`
--

DROP TABLE IF EXISTS `TipoCorreo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TipoCorreo` (
  `idtco` int(11) NOT NULL AUTO_INCREMENT,
  `nomtco` text DEFAULT NULL,
  PRIMARY KEY (`idtco`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TipoCorreo`
--

LOCK TABLES `TipoCorreo` WRITE;
/*!40000 ALTER TABLE `TipoCorreo` DISABLE KEYS */;
INSERT INTO `TipoCorreo` VALUES (1,'com'),(2,'ve'),(3,'com.ve');
/*!40000 ALTER TABLE `TipoCorreo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VisitaMilitar`
--

DROP TABLE IF EXISTS `VisitaMilitar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VisitaMilitar` (
  `idvis` int(11) NOT NULL AUTO_INCREMENT,
  `idper` int(11) DEFAULT NULL,
  `univis` text DEFAULT NULL,
  PRIMARY KEY (`idvis`),
  KEY `idper` (`idper`),
  CONSTRAINT `VisitaMilitar_ibfk_1` FOREIGN KEY (`idper`) REFERENCES `Personas` (`idper`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VisitaMilitar`
--

LOCK TABLES `VisitaMilitar` WRITE;
/*!40000 ALTER TABLE `VisitaMilitar` DISABLE KEYS */;
/*!40000 ALTER TABLE `VisitaMilitar` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-29  5:54:47
