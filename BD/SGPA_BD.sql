CREATE DATABASE  IF NOT EXISTS `sgpa` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sgpa`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sgpa
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `idAlumno` int(11) NOT NULL,
  `nombreAlumno` varchar(45) NOT NULL,
  `ap_paterno` varchar(45) NOT NULL,
  `ap_materno` varchar(45) NOT NULL,
  `fechaNacimiento` datetime NOT NULL,
  `dni` varchar(8) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `_idUbigeo` int(11) NOT NULL,
  `flg_estado` int(11) NOT NULL,
  PRIMARY KEY (`idAlumno`),
  KEY `fk_Cliente_Localizacion1_idx` (`_idUbigeo`),
  CONSTRAINT `fk_Cliente_Localizacion1` FOREIGN KEY (`_idUbigeo`) REFERENCES `ubigeo` (`idUbigeo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno_has_asistencia`
--

DROP TABLE IF EXISTS `alumno_has_asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno_has_asistencia` (
  `alumno_idAlumno` int(11) NOT NULL,
  `asistencia_idAsistencia` int(11) NOT NULL,
  `estado_asistencia_idEstadoAsistencia` int(11) NOT NULL,
  PRIMARY KEY (`alumno_idAlumno`,`asistencia_idAsistencia`),
  KEY `fk_alumno_has_asistencia_asistencia1_idx` (`asistencia_idAsistencia`),
  KEY `fk_alumno_has_asistencia_alumno1_idx` (`alumno_idAlumno`),
  KEY `fk_alumno_has_asistencia_estado_asistencia1_idx` (`estado_asistencia_idEstadoAsistencia`),
  CONSTRAINT `fk_alumno_has_asistencia_alumno1` FOREIGN KEY (`alumno_idAlumno`) REFERENCES `alumno` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_has_asistencia_asistencia1` FOREIGN KEY (`asistencia_idAsistencia`) REFERENCES `asistencia` (`idAsistencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_has_asistencia_estado_asistencia1` FOREIGN KEY (`estado_asistencia_idEstadoAsistencia`) REFERENCES `estado_asistencia` (`idEstadoAsistencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_has_asistencia`
--

LOCK TABLES `alumno_has_asistencia` WRITE;
/*!40000 ALTER TABLE `alumno_has_asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno_has_asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno_has_licencia`
--

DROP TABLE IF EXISTS `alumno_has_licencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno_has_licencia` (
  `alumno_idAlumno` int(11) NOT NULL,
  `licencia_idLicencia` int(11) NOT NULL,
  `fecha_matricula` datetime NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`alumno_idAlumno`,`licencia_idLicencia`),
  KEY `fk_alumno_has_licencia_licencia1_idx` (`licencia_idLicencia`),
  KEY `fk_alumno_has_licencia_alumno1_idx` (`alumno_idAlumno`),
  CONSTRAINT `fk_alumno_has_licencia_alumno1` FOREIGN KEY (`alumno_idAlumno`) REFERENCES `alumno` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_has_licencia_licencia1` FOREIGN KEY (`licencia_idLicencia`) REFERENCES `licencia` (`idLicencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_has_licencia`
--

LOCK TABLES `alumno_has_licencia` WRITE;
/*!40000 ALTER TABLE `alumno_has_licencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno_has_licencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistencia` (
  `idAsistencia` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `nombreAsistencia` varchar(150) NOT NULL,
  `clase_idClase` int(11) NOT NULL,
  PRIMARY KEY (`idAsistencia`),
  KEY `fk_asistencia_clase2_idx` (`clase_idClase`),
  CONSTRAINT `fk_asistencia_clase2` FOREIGN KEY (`clase_idClase`) REFERENCES `clase` (`idClase`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auto`
--

DROP TABLE IF EXISTS `auto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auto` (
  `idAuto` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `placa` varchar(45) NOT NULL,
  PRIMARY KEY (`idAuto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auto`
--

LOCK TABLES `auto` WRITE;
/*!40000 ALTER TABLE `auto` DISABLE KEYS */;
/*!40000 ALTER TABLE `auto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase`
--

DROP TABLE IF EXISTS `clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase` (
  `idClase` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(45) DEFAULT NULL,
  `salom` varchar(45) DEFAULT NULL,
  `flg_tipo` varchar(45) NOT NULL,
  `_idCurso` int(11) NOT NULL,
  PRIMARY KEY (`idClase`),
  KEY `fk_clase_curso2_idx` (`_idCurso`),
  CONSTRAINT `fk_clase_curso2` FOREIGN KEY (`_idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase`
--

LOCK TABLES `clase` WRITE;
/*!40000 ALTER TABLE `clase` DISABLE KEYS */;
/*!40000 ALTER TABLE `clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase_has_auto`
--

DROP TABLE IF EXISTS `clase_has_auto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase_has_auto` (
  `_idClase` int(11) NOT NULL,
  `_idAuto` int(11) NOT NULL,
  `hora_inicio` varchar(45) NOT NULL,
  `hora_fin` varchar(45) NOT NULL,
  `fecha_clase` varchar(45) NOT NULL,
  PRIMARY KEY (`_idClase`,`_idAuto`),
  KEY `fk_clase_has_auto_auto1_idx` (`_idAuto`),
  KEY `fk_clase_has_auto_clase1_idx` (`_idClase`),
  CONSTRAINT `fk_clase_has_auto_auto1` FOREIGN KEY (`_idAuto`) REFERENCES `auto` (`idAuto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_clase_has_auto_clase1` FOREIGN KEY (`_idClase`) REFERENCES `clase` (`idClase`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase_has_auto`
--

LOCK TABLES `clase_has_auto` WRITE;
/*!40000 ALTER TABLE `clase_has_auto` DISABLE KEYS */;
/*!40000 ALTER TABLE `clase_has_auto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprobante`
--

DROP TABLE IF EXISTS `comprobante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprobante` (
  `idComprobante` int(11) NOT NULL AUTO_INCREMENT,
  `nro_serie` varchar(45) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `ruc` varchar(45) NOT NULL,
  `flg_tipo` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `motivo` varchar(45) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idTrabajador` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`idComprobante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprobante`
--

LOCK TABLES `comprobante` WRITE;
/*!40000 ALTER TABLE `comprobante` DISABLE KEYS */;
/*!40000 ALTER TABLE `comprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `abvr` varchar(5) NOT NULL,
  `area` varchar(45) NOT NULL,
  `trabajador_idTrabajador` int(11) NOT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso_has_licencia`
--

DROP TABLE IF EXISTS `curso_has_licencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso_has_licencia` (
  `curso_idCurso` int(11) NOT NULL,
  `licencia_idLicencia` int(11) NOT NULL,
  `hora_inicio` varchar(45) NOT NULL,
  `hora_fin` varchar(45) NOT NULL,
  `dia_semana` varchar(45) NOT NULL,
  PRIMARY KEY (`curso_idCurso`,`licencia_idLicencia`),
  KEY `fk_curso_has_licencia_licencia1_idx` (`licencia_idLicencia`),
  KEY `fk_curso_has_licencia_curso1_idx` (`curso_idCurso`),
  CONSTRAINT `fk_curso_has_licencia_curso1` FOREIGN KEY (`curso_idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_curso_has_licencia_licencia1` FOREIGN KEY (`licencia_idLicencia`) REFERENCES `licencia` (`idLicencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso_has_licencia`
--

LOCK TABLES `curso_has_licencia` WRITE;
/*!40000 ALTER TABLE `curso_has_licencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `curso_has_licencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_asistencia`
--

DROP TABLE IF EXISTS `estado_asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_asistencia` (
  `idEstadoAsistencia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstadoAsistencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_asistencia`
--

LOCK TABLES `estado_asistencia` WRITE;
/*!40000 ALTER TABLE `estado_asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado_asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licencia`
--

DROP TABLE IF EXISTS `licencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licencia` (
  `idLicencia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `hrsTotal` int(11) NOT NULL,
  `costo` varchar(45) NOT NULL,
  PRIMARY KEY (`idLicencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licencia`
--

LOCK TABLES `licencia` WRITE;
/*!40000 ALTER TABLE `licencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `licencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreModulo` varchar(80) NOT NULL,
  `iconoModulo` varchar(80) NOT NULL,
  `rutaModulo` varchar(50) NOT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` VALUES (1,'Trabajadores','group_work','trabajadores'),(2,'Clientes','group_work','clientes');
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacion` (
  `idNotificacion` int(11) NOT NULL AUTO_INCREMENT,
  `remitente` varchar(200) NOT NULL,
  `detalle` varchar(450) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idNotificacion`),
  KEY `fk_Notificacion_Usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_Notificacion_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacion`
--

LOCK TABLES `notificacion` WRITE;
/*!40000 ALTER TABLE `notificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso` (
  `idRol` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  PRIMARY KEY (`idRol`,`idModulo`),
  KEY `fk_Rol_has_Modulo_Modulo1_idx` (`idModulo`),
  KEY `fk_Rol_has_Modulo_Rol1_idx` (`idRol`),
  CONSTRAINT `fk_Rol_has_Modulo_Modulo1` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rol_has_Modulo_Rol1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` VALUES (1,1),(1,2);
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remuneracion`
--

DROP TABLE IF EXISTS `remuneracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remuneracion` (
  `idRemuneracion` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) NOT NULL,
  `_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idRemuneracion`,`_idUsuario`),
  KEY `fk_remuneracion_trabajador1_idx` (`_idUsuario`),
  CONSTRAINT `fk_remuneracion_trabajador1` FOREIGN KEY (`_idUsuario`) REFERENCES `trabajador` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remuneracion`
--

LOCK TABLES `remuneracion` WRITE;
/*!40000 ALTER TABLE `remuneracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `remuneracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(100) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipodocumento`
--

DROP TABLE IF EXISTS `tipodocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipodocumento` (
  `idTipoDocumento` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `descripcionCorta` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipoDocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodocumento`
--

LOCK TABLES `tipodocumento` WRITE;
/*!40000 ALTER TABLE `tipodocumento` DISABLE KEYS */;
INSERT INTO `tipodocumento` VALUES (1,'LIBRETA ELECTORAL O DNI','L.E / DNI'),(4,'CARNET DE EXTRANJERIA','CARNET EXT.'),(6,'REG. UNICO DE CONTRIBUYENTES','RUC'),(7,'PASAPORTE','PASAPORTE'),(11,'PART. DE NACIMIENTO-IDENTIDAD','P. NAC.');
/*!40000 ALTER TABLE `tipodocumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajador` (
  `idUsuario` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `ap_paterno` varchar(45) NOT NULL,
  `ap_materno` varchar(45) NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `_idTipoDocumento` int(11) NOT NULL,
  `numDocumento` char(20) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `celular` int(11) NOT NULL,
  `fechaNacimiento` datetime NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `_idUbigeo` int(11) NOT NULL,
  `estadoCivil` varchar(45) NOT NULL,
  `flg_estado` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`,`_idTipoDocumento`),
  KEY `fk_Trabajador_Usuario1_idx` (`idUsuario`),
  KEY `fk_Trabajador_Localizacion1_idx` (`_idUbigeo`),
  KEY `fk_trabajador_tipoDocumento1_idx` (`_idTipoDocumento`),
  CONSTRAINT `fk_Trabajador_Localizacion1` FOREIGN KEY (`_idUbigeo`) REFERENCES `ubigeo` (`idUbigeo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Trabajador_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabajador_tipoDocumento1` FOREIGN KEY (`_idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador`
--

LOCK TABLES `trabajador` WRITE;
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT INTO `trabajador` VALUES (1,'frank','villanueva','ore',1,1,'12345678','2587414',789456123,'1996-11-05 00:00:00','calle',1,'s',1);
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubigeo`
--

DROP TABLE IF EXISTS `ubigeo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubigeo` (
  `idUbigeo` int(11) NOT NULL,
  `flag_Departamento` int(11) NOT NULL,
  `flag_Provincia` int(11) NOT NULL,
  `flag_Distrito` int(11) DEFAULT NULL,
  `departamento` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `distrito` varchar(45) NOT NULL,
  PRIMARY KEY (`idUbigeo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubigeo`
--

LOCK TABLES `ubigeo` WRITE;
/*!40000 ALTER TABLE `ubigeo` DISABLE KEYS */;
INSERT INTO `ubigeo` VALUES (1,1,1,2,'Amazonas','Chachapoyas','Asuncion'),(2,1,1,3,'Amazonas','Chachapoyas','Balsas'),(3,1,1,4,'Amazonas','Chachapoyas','Cheto'),(4,1,1,5,'Amazonas','Chachapoyas','Chiliquin'),(5,1,1,6,'Amazonas','Chachapoyas','Chuquibamba'),(6,1,1,7,'Amazonas','Chachapoyas','Granada'),(7,1,1,8,'Amazonas','Chachapoyas','Huancas'),(8,1,1,9,'Amazonas','Chachapoyas','La Jalca'),(9,1,1,10,'Amazonas','Chachapoyas','Leimebamba'),(10,1,1,11,'Amazonas','Chachapoyas','Levanto'),(11,1,1,12,'Amazonas','Chachapoyas','Magdalena'),(12,1,1,13,'Amazonas','Chachapoyas','Mariscal Castilla'),(13,1,1,14,'Amazonas','Chachapoyas','Molinopampa'),(14,1,1,15,'Amazonas','Chachapoyas','Montevideo'),(15,1,1,16,'Amazonas','Chachapoyas','Olleros'),(16,1,1,17,'Amazonas','Chachapoyas','Quinjalca'),(17,1,1,18,'Amazonas','Chachapoyas','San Francisco De Daguas'),(18,1,1,19,'Amazonas','Chachapoyas','San Isidro De Maino'),(19,1,1,20,'Amazonas','Chachapoyas','Soloco'),(20,1,1,21,'Amazonas','Chachapoyas','Sonche'),(21,1,2,1,'Amazonas','Bagua','La Peca'),(22,1,2,2,'Amazonas','Bagua','Aramango'),(23,1,2,3,'Amazonas','Bagua','Copallin'),(24,1,2,4,'Amazonas','Bagua','El Parco'),(25,1,2,5,'Amazonas','Bagua','Bagua'),(26,1,2,6,'Amazonas','Bagua','Imaza'),(27,1,3,1,'Amazonas','Bongara','Jumbilla'),(28,1,3,2,'Amazonas','Bongara','Corosha'),(29,1,3,3,'Amazonas','Bongara','Cuispes'),(30,1,3,4,'Amazonas','Bongara','Chisquilla'),(31,1,3,5,'Amazonas','Bongara','Churuja'),(32,1,3,6,'Amazonas','Bongara','Florida'),(33,1,3,7,'Amazonas','Bongara','Recta'),(34,1,3,8,'Amazonas','Bongara','San Carlos'),(35,1,3,9,'Amazonas','Bongara','Shipasbamba'),(36,1,2,4,'Amazonas','Bagua','El Parco'),(37,1,2,5,'Amazonas','Bagua','Bagua'),(38,1,2,6,'Amazonas','Bagua','Imaza'),(39,1,3,1,'Amazonas','Bongara','Jumbilla'),(40,1,3,2,'Amazonas','Bongara','Corosha'),(41,1,3,3,'Amazonas','Bongara','Cuispes'),(42,1,3,4,'Amazonas','Bongara','Chisquilla'),(43,1,3,5,'Amazonas','Bongara','Churuja'),(44,1,3,6,'Amazonas','Bongara','Florida'),(45,1,3,7,'Amazonas','Bongara','Recta'),(46,1,3,8,'Amazonas','Bongara','San Carlos'),(47,1,3,9,'Amazonas','Bongara','Shipasbamba'),(48,1,4,10,'Amazonas','Luya','Luya Viejo'),(49,1,4,11,'Amazonas','Luya','Maria'),(50,1,4,12,'Amazonas','Luya','Ocalli'),(51,1,4,13,'Amazonas','Luya','Ocumal'),(52,1,4,14,'Amazonas','Luya','Pisuquia'),(53,1,4,15,'Amazonas','Luya','San Cristobal'),(54,1,4,16,'Amazonas','Luya','San Francisco De Yeso'),(55,1,4,17,'Amazonas','Luya','San Jeronimo'),(56,1,4,18,'Amazonas','Luya','San Juan De Lopecancha'),(57,1,4,19,'Amazonas','Luya','Santa Catalina'),(58,1,4,20,'Amazonas','Luya','Santo Tomas'),(59,1,4,21,'Amazonas','Luya','Tingo'),(60,1,4,22,'Amazonas','Luya','Trita'),(61,1,4,23,'Amazonas','Luya','Providencia'),(62,1,5,1,'Amazonas','Rodriguez De Mendoza','San Nicolas'),(63,1,5,2,'Amazonas','Rodriguez De Mendoza','Cochamal'),(64,1,5,3,'Amazonas','Rodriguez De Mendoza','Chirimoto'),(65,1,5,4,'Amazonas','Rodriguez De Mendoza','Huambo'),(66,1,5,5,'Amazonas','Rodriguez De Mendoza','Limabamba'),(67,1,5,6,'Amazonas','Rodriguez De Mendoza','Longar'),(68,1,5,7,'Amazonas','Rodriguez De Mendoza','Milpucc'),(69,1,5,8,'Amazonas','Rodriguez De Mendoza','Mariscal Benavides'),(70,1,5,9,'Amazonas','Rodriguez De Mendoza','Omia'),(71,1,5,10,'Amazonas','Rodriguez De Mendoza','Santa Rosa'),(72,1,5,11,'Amazonas','Rodriguez De Mendoza','Totora'),(73,1,5,12,'Amazonas','Rodriguez De Mendoza','Vista Alegre'),(74,1,6,1,'Amazonas','Condorcanqui','Nieva'),(75,1,6,2,'Amazonas','Condorcanqui','Rio Santiago'),(76,1,6,3,'Amazonas','Condorcanqui','El Cenepa'),(77,1,7,1,'Amazonas','Utcubamba','Bagua Grande'),(78,1,7,2,'Amazonas','Utcubamba','Cajaruro'),(79,1,7,3,'Amazonas','Utcubamba','Cumba'),(80,1,7,4,'Amazonas','Utcubamba','El Milagro'),(81,1,7,5,'Amazonas','Utcubamba','Jamalca'),(82,1,7,6,'Amazonas','Utcubamba','Lonya Grande'),(83,1,7,7,'Amazonas','Utcubamba','Yamon'),(84,2,1,1,'Ancash','Huaraz','Huaraz'),(85,2,1,2,'Ancash','Huaraz','Independencia'),(86,2,1,3,'Ancash','Huaraz','Cochabamba'),(87,2,1,4,'Ancash','Huaraz','Colcabamba'),(88,2,1,5,'Ancash','Huaraz','Huanchay'),(89,2,1,6,'Ancash','Huaraz','Jangas'),(90,2,1,7,'Ancash','Huaraz','La Libertad'),(91,2,1,8,'Ancash','Huaraz','Olleros'),(92,2,1,9,'Ancash','Huaraz','Pampas Grande'),(93,2,1,10,'Ancash','Huaraz','Pariacoto'),(94,2,1,11,'Ancash','Huaraz','Pira'),(95,2,1,12,'Ancash','Huaraz','Tarica'),(96,2,2,1,'Ancash','Aija','Aija'),(97,2,2,3,'Ancash','Aija','Coris'),(98,2,2,5,'Ancash','Aija','Huacllan'),(99,2,2,6,'Ancash','Aija','La Merced'),(100,2,2,8,'Ancash','Aija','Succha'),(101,2,3,1,'Ancash','Bolognesi','Chiquian'),(102,2,3,2,'Ancash','Bolognesi','Abelardo Pardo Lezameta'),(103,2,3,4,'Ancash','Bolognesi','Aquia'),(104,2,3,5,'Ancash','Bolognesi','Cajacay'),(105,2,3,10,'Ancash','Bolognesi','Huayllacayan'),(106,2,3,11,'Ancash','Bolognesi','Huasta'),(107,2,3,13,'Ancash','Bolognesi','Mangas'),(108,2,3,15,'Ancash','Bolognesi','Pacllon'),(109,2,3,17,'Ancash','Bolognesi','San Miguel De Corpanqui'),(110,2,3,20,'Ancash','Bolognesi','Ticllos'),(111,2,3,21,'Ancash','Bolognesi','Antonio Raimondi'),(112,2,3,22,'Ancash','Bolognesi','Canis'),(113,2,3,23,'Ancash','Bolognesi','Colquioc'),(114,2,3,24,'Ancash','Bolognesi','La Primavera'),(115,2,3,25,'Ancash','Bolognesi','Huallanca'),(116,2,4,1,'Ancash','Carhuaz','Carhuaz'),(117,2,4,2,'Ancash','Carhuaz','Acopampa'),(118,2,4,3,'Ancash','Carhuaz','Amashca'),(119,2,4,4,'Ancash','Carhuaz','Anta'),(120,2,4,5,'Ancash','Carhuaz','Ataquero'),(121,2,4,6,'Ancash','Carhuaz','Marcara'),(122,2,4,7,'Ancash','Carhuaz','Pariahuanca'),(123,2,4,8,'Ancash','Carhuaz','San Miguel De Aco'),(124,2,4,9,'Ancash','Carhuaz','Shilla'),(125,2,4,10,'Ancash','Carhuaz','Tinco'),(126,2,4,11,'Ancash','Carhuaz','Yungar'),(127,2,5,1,'Ancash','Casma','Casma'),(128,2,5,2,'Ancash','Casma','Buena Vista Alta'),(129,2,5,3,'Ancash','Casma','Comandante Noel'),(130,2,5,5,'Ancash','Casma','Yautan'),(131,2,6,1,'Ancash','Corongo','Corongo'),(132,2,6,2,'Ancash','Corongo','Aco'),(133,2,6,3,'Ancash','Corongo','Bambas'),(134,2,6,4,'Ancash','Corongo','Cusca'),(135,2,6,5,'Ancash','Corongo','La Pampa'),(136,2,6,6,'Ancash','Corongo','Yanac'),(137,2,6,7,'Ancash','Corongo','Yupan'),(138,2,7,1,'Ancash','Huaylas','Caraz'),(139,2,7,2,'Ancash','Huaylas','Huallanca'),(140,2,7,3,'Ancash','Huaylas','Huata'),(141,2,7,4,'Ancash','Huaylas','Huaylas'),(142,2,7,5,'Ancash','Huaylas','Mato'),(143,2,7,6,'Ancash','Huaylas','Pamparomas'),(144,2,7,7,'Ancash','Huaylas','Pueblo Libre'),(145,2,7,8,'Ancash','Huaylas','Santa Cruz'),(146,2,7,9,'Ancash','Huaylas','Yuracmarca'),(147,2,7,10,'Ancash','Huaylas','Santo Toribio'),(148,2,8,1,'Ancash','Huari','Huari'),(149,2,8,2,'Ancash','Huari','Cajay'),(150,2,8,3,'Ancash','Huari','Chavin De Huantar'),(151,2,8,4,'Ancash','Huari','Huacachi'),(152,2,8,5,'Ancash','Huari','Huachis'),(153,2,8,6,'Ancash','Huari','Huacchis'),(154,2,8,7,'Ancash','Huari','Huantar'),(155,2,8,8,'Ancash','Huari','Masin'),(156,2,8,9,'Ancash','Huari','Paucas'),(157,2,8,10,'Ancash','Huari','Ponto'),(158,2,8,11,'Ancash','Huari','Rahuapampa'),(159,2,8,12,'Ancash','Huari','Rapayan'),(160,2,8,13,'Ancash','Huari','San Marcos'),(161,2,8,14,'Ancash','Huari','San Pedro De Chana'),(162,2,8,15,'Ancash','Huari','Uco'),(163,2,8,16,'Ancash','Huari','Anra'),(164,2,9,1,'Ancash','Mariscal Luzuriaga','Piscobamba'),(165,2,9,2,'Ancash','Mariscal Luzuriaga','Casca'),(166,2,9,3,'Ancash','Mariscal Luzuriaga','Lucma'),(167,2,9,4,'Ancash','Mariscal Luzuriaga','Fidel Olivas Escudero'),(168,2,9,5,'Ancash','Mariscal Luzuriaga','Llama'),(169,2,9,6,'Ancash','Mariscal Luzuriaga','Llumpa'),(170,2,9,7,'Ancash','Mariscal Luzuriaga','Musga'),(171,2,9,8,'Ancash','Mariscal Luzuriaga','Eleazar Guzman Barron'),(172,2,10,1,'Ancash','Pallasca','Cabana'),(173,2,10,2,'Ancash','Pallasca','Bolognesi'),(174,2,10,3,'Ancash','Pallasca','Conchucos'),(175,2,10,4,'Ancash','Pallasca','Huacaschuque'),(176,2,10,5,'Ancash','Pallasca','Huandoval'),(177,2,10,6,'Ancash','Pallasca','Lacabamba'),(178,2,10,7,'Ancash','Pallasca','Llapo'),(179,2,10,8,'Ancash','Pallasca','Pallasca'),(180,2,10,9,'Ancash','Pallasca','Pampas'),(181,2,10,10,'Ancash','Pallasca','Santa Rosa'),(182,2,10,11,'Ancash','Pallasca','Tauca'),(183,2,11,1,'Ancash','Pomabamba','Pomabamba'),(184,2,11,2,'Ancash','Pomabamba','Huayllan'),(185,2,11,3,'Ancash','Pomabamba','Parobamba'),(186,2,11,4,'Ancash','Pomabamba','Quinuabamba'),(187,2,12,1,'Ancash','Recuay','Recuay'),(188,2,12,2,'Ancash','Recuay','Cotaparaco'),(189,2,12,3,'Ancash','Recuay','Huayllapampa'),(190,2,12,4,'Ancash','Recuay','Marca'),(191,2,12,5,'Ancash','Recuay','Pampas Chico'),(192,2,12,6,'Ancash','Recuay','Pararin'),(193,2,12,7,'Ancash','Recuay','Tapacocha'),(194,2,12,8,'Ancash','Recuay','Ticapampa'),(195,2,12,9,'Ancash','Recuay','Llacllin'),(196,2,12,10,'Ancash','Recuay','Catac'),(197,2,13,1,'Ancash','Santa','Chimbote'),(198,2,13,2,'Ancash','Santa','Caceres Del Peru'),(199,2,13,3,'Ancash','Santa','Macate'),(200,2,13,4,'Ancash','Santa','Moro'),(201,2,13,5,'Ancash','Santa','Nepeña'),(202,2,13,6,'Ancash','Santa','Samanco'),(203,2,13,7,'Ancash','Santa','Santa'),(204,2,13,8,'Ancash','Santa','Coishco'),(205,2,13,9,'Ancash','Santa','Nuevo Chimbote'),(206,2,14,1,'Ancash','Sihuas','Sihuas'),(207,2,14,2,'Ancash','Sihuas','Alfonso Ugarte'),(208,2,14,3,'Ancash','Sihuas','Chingalpo'),(209,2,14,4,'Ancash','Sihuas','Huayllabamba'),(210,2,14,5,'Ancash','Sihuas','Quiches'),(211,2,14,6,'Ancash','Sihuas','Sicsibamba'),(212,2,14,7,'Ancash','Sihuas','Acobamba'),(213,2,14,8,'Ancash','Sihuas','Cashapampa'),(214,2,14,9,'Ancash','Sihuas','Ragash'),(215,2,14,10,'Ancash','Sihuas','San Juan'),(216,2,15,1,'Ancash','Yungay','Yungay'),(217,2,15,2,'Ancash','Yungay','Cascapara'),(218,2,15,3,'Ancash','Yungay','Mancos'),(219,2,15,4,'Ancash','Yungay','Matacoto'),(220,2,15,5,'Ancash','Yungay','Quillo'),(221,2,15,6,'Ancash','Yungay','Ranrahirca'),(222,2,15,7,'Ancash','Yungay','Shupluy'),(223,2,15,8,'Ancash','Yungay','Yanama'),(224,2,16,1,'Ancash','Antonio Raimondi','Llamellin'),(225,2,16,2,'Ancash','Antonio Raimondi','Aczo'),(226,2,16,3,'Ancash','Antonio Raimondi','Chaccho'),(227,2,16,4,'Ancash','Antonio Raimondi','Chingas'),(228,2,16,5,'Ancash','Antonio Raimondi','Mirgas'),(229,2,16,6,'Ancash','Antonio Raimondi','San Juan De Rontoy'),(230,2,17,1,'Ancash','Carlos Fermin Fitzcarrald','San Luis'),(231,2,17,2,'Ancash','Carlos Fermin Fitzcarrald','Yauya'),(232,2,17,3,'Ancash','Carlos Fermin Fitzcarrald','San Nicolas'),(233,2,18,1,'Ancash','Asuncion','Chacas'),(234,2,18,2,'Ancash','Asuncion','Acochaca'),(235,2,19,1,'Ancash','Huarmey','Huarmey'),(236,2,19,2,'Ancash','Huarmey','Cochapeti'),(237,2,19,3,'Ancash','Huarmey','Huayan'),(238,2,19,4,'Ancash','Huarmey','Malvas'),(239,2,19,5,'Ancash','Huarmey','Culebras'),(240,2,20,1,'Ancash','Ocros','Acas'),(241,2,20,2,'Ancash','Ocros','Cajamarquilla'),(242,2,20,3,'Ancash','Ocros','Carhuapampa'),(243,2,20,4,'Ancash','Ocros','Cochas'),(244,2,20,5,'Ancash','Ocros','Congas'),(245,2,20,6,'Ancash','Ocros','Llipa'),(246,2,20,7,'Ancash','Ocros','Ocros'),(247,2,20,8,'Ancash','Ocros','San Cristobal De Rajan'),(248,2,20,9,'Ancash','Ocros','San Pedro'),(249,2,20,10,'Ancash','Ocros','Santiago De Chilcas'),(250,3,1,1,'Apurimac','Abancay','Abancay'),(251,3,1,2,'Apurimac','Abancay','Circa'),(252,3,1,3,'Apurimac','Abancay','Curahuasi'),(253,3,1,4,'Apurimac','Abancay','Chacoche'),(254,3,1,5,'Apurimac','Abancay','Huanipaca'),(255,3,1,6,'Apurimac','Abancay','Lambrama'),(256,3,1,7,'Apurimac','Abancay','Pichirhua'),(257,3,1,8,'Apurimac','Abancay','San Pedro De Cachora'),(258,3,1,9,'Apurimac','Abancay','Tamburco'),(259,3,2,1,'Apurimac','Aymaraes','Chalhuanca'),(260,3,2,2,'Apurimac','Aymaraes','Capaya'),(261,3,2,3,'Apurimac','Aymaraes','Caraybamba'),(262,3,2,4,'Apurimac','Aymaraes','Colcabamba'),(263,3,2,5,'Apurimac','Aymaraes','Cotaruse'),(264,3,2,6,'Apurimac','Aymaraes','Chapimarca'),(265,3,2,7,'Apurimac','Aymaraes','Huayllo'),(266,3,2,8,'Apurimac','Aymaraes','Lucre'),(267,3,2,9,'Apurimac','Aymaraes','Pocohuanca'),(268,3,2,10,'Apurimac','Aymaraes','Sañayca'),(269,3,2,11,'Apurimac','Aymaraes','Soraya'),(270,3,2,12,'Apurimac','Aymaraes','Tapairihua'),(271,3,2,13,'Apurimac','Aymaraes','Tintay'),(272,3,2,14,'Apurimac','Aymaraes','Toraya'),(273,3,2,15,'Apurimac','Aymaraes','Yanaca'),(274,3,2,16,'Apurimac','Aymaraes','San Juan De Chacña'),(275,3,2,17,'Apurimac','Aymaraes','Justo Apu Sahuaraura'),(276,3,3,1,'Apurimac','Andahuaylas','Andahuaylas'),(277,3,3,2,'Apurimac','Andahuaylas','Andarapa'),(278,3,3,3,'Apurimac','Andahuaylas','Chiara'),(279,3,3,4,'Apurimac','Andahuaylas','Huancarama'),(280,3,3,5,'Apurimac','Andahuaylas','Huancaray'),(281,3,3,6,'Apurimac','Andahuaylas','Kishuara'),(282,3,3,7,'Apurimac','Andahuaylas','Pacobamba'),(283,3,3,8,'Apurimac','Andahuaylas','Pampachiri'),(284,3,3,9,'Apurimac','Andahuaylas','San Antonio De Cachi'),(285,3,3,10,'Apurimac','Andahuaylas','San Jeronimo'),(286,3,3,11,'Apurimac','Andahuaylas','Talavera'),(287,3,3,12,'Apurimac','Andahuaylas','Turpo'),(288,3,3,13,'Apurimac','Andahuaylas','Pacucha'),(289,3,3,14,'Apurimac','Andahuaylas','Pomacocha'),(290,3,3,15,'Apurimac','Andahuaylas','Santa Maria De Chicmo'),(291,3,3,16,'Apurimac','Andahuaylas','Tumay Huaraca'),(292,3,3,17,'Apurimac','Andahuaylas','Huayana'),(293,3,3,18,'Apurimac','Andahuaylas','San Miguel De Chaccrampa'),(294,3,3,19,'Apurimac','Andahuaylas','Kaquiabamba'),(295,3,4,1,'Apurimac','Antabamba','Antabamba'),(296,3,4,2,'Apurimac','Antabamba','El Oro'),(297,3,4,3,'Apurimac','Antabamba','Huaquirca'),(298,3,4,4,'Apurimac','Antabamba','Juan Espinoza Medrano'),(299,3,4,5,'Apurimac','Antabamba','Oropesa'),(300,3,4,6,'Apurimac','Antabamba','Pachaconas'),(301,3,4,7,'Apurimac','Antabamba','Sabaino'),(302,3,5,1,'Apurimac','Cotabambas','Tambobamba'),(303,3,5,2,'Apurimac','Cotabambas','Coyllurqui'),(304,3,5,3,'Apurimac','Cotabambas','Cotabambas'),(305,3,5,4,'Apurimac','Cotabambas','Haquira'),(306,3,5,5,'Apurimac','Cotabambas','Mara'),(307,3,5,6,'Apurimac','Cotabambas','Challhuahuacho'),(308,3,6,1,'Apurimac','Grau','Chuquibambilla'),(309,3,6,2,'Apurimac','Grau','Curpahuasi'),(310,3,6,3,'Apurimac','Grau','Huaillati'),(311,3,6,4,'Apurimac','Grau','Mamara'),(312,3,6,5,'Apurimac','Grau','Mariscal Gamarra'),(313,3,6,6,'Apurimac','Grau','Micaela Bastidas'),(314,3,6,7,'Apurimac','Grau','Progreso'),(315,3,6,8,'Apurimac','Grau','Pataypampa'),(316,3,6,9,'Apurimac','Grau','San Antonio'),(317,3,6,10,'Apurimac','Grau','Turpay'),(318,3,6,11,'Apurimac','Grau','Vilcabamba'),(319,3,6,12,'Apurimac','Grau','Virundo'),(320,3,6,13,'Apurimac','Grau','Santa Rosa'),(321,3,6,14,'Apurimac','Grau','Curasco'),(322,3,7,1,'Apurimac','Chincheros','Chincheros'),(323,3,7,2,'Apurimac','Chincheros','Ongoy'),(324,3,7,3,'Apurimac','Chincheros','Ocobamba'),(325,3,7,4,'Apurimac','Chincheros','Cocharcas'),(326,3,7,5,'Apurimac','Chincheros','Anco Huallo'),(327,3,7,6,'Apurimac','Chincheros','Huaccana'),(328,3,7,7,'Apurimac','Chincheros','Uranmarca'),(329,3,7,8,'Apurimac','Chincheros','Ranracancha'),(330,4,1,1,'Arequipa','Arequipa','Arequipa'),(331,4,1,2,'Arequipa','Arequipa','Cayma'),(332,4,1,3,'Arequipa','Arequipa','Cerro Colorado'),(333,4,1,4,'Arequipa','Arequipa','Characato'),(334,4,1,5,'Arequipa','Arequipa','Chiguata'),(335,4,1,6,'Arequipa','Arequipa','La Joya'),(336,4,1,7,'Arequipa','Arequipa','Miraflores'),(337,4,1,8,'Arequipa','Arequipa','Mollebaya'),(338,4,1,9,'Arequipa','Arequipa','Paucarpata'),(339,4,1,10,'Arequipa','Arequipa','Pocsi'),(340,4,1,11,'Arequipa','Arequipa','Polobaya'),(341,4,1,12,'Arequipa','Arequipa','Quequeña'),(342,4,1,13,'Arequipa','Arequipa','Sabandia'),(343,4,1,14,'Arequipa','Arequipa','Sachaca'),(344,4,1,15,'Arequipa','Arequipa','San Juan De Siguas'),(345,4,1,16,'Arequipa','Arequipa','San Juan De Tarucani'),(346,4,1,17,'Arequipa','Arequipa','Santa Isabel De Siguas'),(347,4,1,18,'Arequipa','Arequipa','Santa Rita De Sihuas'),(348,4,1,19,'Arequipa','Arequipa','Socabaya'),(349,4,1,20,'Arequipa','Arequipa','Tiabaya'),(350,4,1,21,'Arequipa','Arequipa','Uchumayo'),(351,4,1,22,'Arequipa','Arequipa','Vitor'),(352,4,1,23,'Arequipa','Arequipa','Yanahuara'),(353,4,1,24,'Arequipa','Arequipa','Yarabamba'),(354,4,1,25,'Arequipa','Arequipa','Yura'),(355,4,1,26,'Arequipa','Arequipa','Mariano Melgar'),(356,4,1,27,'Arequipa','Arequipa','Jacobo Hunter'),(357,4,1,28,'Arequipa','Arequipa','Alto Selva Alegre'),(358,4,1,29,'Arequipa','Arequipa','Jose Luis Bustamante Y Rivero'),(359,4,2,1,'Arequipa','Caylloma','Chivay'),(360,4,2,2,'Arequipa','Caylloma','Achoma'),(361,4,2,3,'Arequipa','Caylloma','Cabanaconde'),(362,4,2,4,'Arequipa','Caylloma','Caylloma'),(363,4,2,5,'Arequipa','Caylloma','Callalli'),(364,4,2,6,'Arequipa','Caylloma','Coporaque'),(365,4,2,7,'Arequipa','Caylloma','Huambo'),(366,4,2,8,'Arequipa','Caylloma','Huanca'),(367,4,2,9,'Arequipa','Caylloma','Ichupampa'),(368,4,2,10,'Arequipa','Caylloma','Lari'),(369,4,2,11,'Arequipa','Caylloma','Lluta'),(370,4,2,12,'Arequipa','Caylloma','Maca'),(371,4,2,13,'Arequipa','Caylloma','Madrigal'),(372,4,2,14,'Arequipa','Caylloma','San Antonio De Chuca'),(373,4,2,15,'Arequipa','Caylloma','Sibayo'),(374,4,2,16,'Arequipa','Caylloma','Tapay'),(375,4,2,17,'Arequipa','Caylloma','Tisco'),(376,4,2,18,'Arequipa','Caylloma','Tuti'),(377,4,2,19,'Arequipa','Caylloma','Yanque'),(378,4,2,20,'Arequipa','Caylloma','Majes'),(379,4,3,1,'Arequipa','Camana','Camana'),(380,4,3,2,'Arequipa','Camana','Jose Maria Quimper'),(381,4,3,3,'Arequipa','Camana','Mariano Nicolas Valcarcel'),(382,4,3,4,'Arequipa','Camana','Mariscal Caceres'),(383,4,3,5,'Arequipa','Camana','Nicolas De Pierola'),(384,4,3,6,'Arequipa','Camana','Ocoña'),(385,4,3,7,'Arequipa','Camana','Quilca'),(386,4,3,8,'Arequipa','Camana','Samuel Pastor'),(387,4,4,1,'Arequipa','Caraveli','Caraveli'),(388,4,4,2,'Arequipa','Caraveli','Acari'),(389,4,4,3,'Arequipa','Caraveli','Atico'),(390,4,4,4,'Arequipa','Caraveli','Atiquipa'),(391,4,4,5,'Arequipa','Caraveli','Bella Union'),(392,4,4,6,'Arequipa','Caraveli','Cahuacho'),(393,4,4,7,'Arequipa','Caraveli','Chala'),(394,4,4,8,'Arequipa','Caraveli','Chaparra'),(395,4,4,9,'Arequipa','Caraveli','Huanuhuanu'),(396,4,4,10,'Arequipa','Caraveli','Jaqui'),(397,4,4,11,'Arequipa','Caraveli','Lomas'),(398,4,4,12,'Arequipa','Caraveli','Quicacha'),(399,4,4,13,'Arequipa','Caraveli','Yauca'),(400,4,5,1,'Arequipa','Castilla','Aplao'),(401,4,5,2,'Arequipa','Castilla','Andagua'),(402,4,5,3,'Arequipa','Castilla','Ayo'),(403,4,5,4,'Arequipa','Castilla','Chachas'),(404,4,5,5,'Arequipa','Castilla','Chilcaymarca'),(405,4,5,6,'Arequipa','Castilla','Choco'),(406,4,5,7,'Arequipa','Castilla','Huancarqui'),(407,4,5,8,'Arequipa','Castilla','Machaguay'),(408,4,5,9,'Arequipa','Castilla','Orcopampa'),(409,4,5,10,'Arequipa','Castilla','Pampacolca'),(410,4,5,11,'Arequipa','Castilla','Tipan'),(411,4,5,12,'Arequipa','Castilla','Uraca'),(412,4,5,13,'Arequipa','Castilla','Uñon'),(413,4,5,14,'Arequipa','Castilla','Viraco'),(414,4,6,1,'Arequipa','Condesuyos','Chuquibamba'),(415,4,6,2,'Arequipa','Condesuyos','Andaray'),(416,4,6,3,'Arequipa','Condesuyos','Cayarani'),(417,4,6,4,'Arequipa','Condesuyos','Chichas'),(418,4,6,5,'Arequipa','Condesuyos','Iray'),(419,4,6,6,'Arequipa','Condesuyos','Salamanca'),(420,4,6,7,'Arequipa','Condesuyos','Yanaquihua'),(421,4,6,8,'Arequipa','Condesuyos','Rio Grande'),(422,4,7,1,'Arequipa','Islay','Mollendo'),(423,4,7,2,'Arequipa','Islay','Cocachacra'),(424,4,7,3,'Arequipa','Islay','Dean Valdivia'),(425,4,7,4,'Arequipa','Islay','Islay'),(426,4,7,5,'Arequipa','Islay','Mejia'),(427,4,7,6,'Arequipa','Islay','Punta De Bombon'),(428,4,8,1,'Arequipa','La Union','Cotahuasi'),(429,4,8,2,'Arequipa','La Union','Alca'),(430,4,8,3,'Arequipa','La Union','Charcana'),(431,4,8,4,'Arequipa','La Union','Huaynacotas'),(432,4,8,5,'Arequipa','La Union','Pampamarca'),(433,4,8,6,'Arequipa','La Union','Puyca'),(434,4,8,7,'Arequipa','La Union','Quechualla'),(435,4,8,8,'Arequipa','La Union','Sayla'),(436,4,8,9,'Arequipa','La Union','Tauria'),(437,4,8,10,'Arequipa','La Union','Tomepampa'),(438,4,8,11,'Arequipa','La Union','Toro'),(439,5,1,1,'Ayacucho','Huamanga','Ayacucho'),(440,5,1,2,'Ayacucho','Huamanga','Acos Vinchos'),(441,5,1,3,'Ayacucho','Huamanga','Carmen Alto'),(442,5,1,4,'Ayacucho','Huamanga','Chiara'),(443,5,1,5,'Ayacucho','Huamanga','Quinua'),(444,5,1,6,'Ayacucho','Huamanga','San Jose De Ticllas'),(445,5,1,7,'Ayacucho','Huamanga','San Juan Bautista'),(446,5,1,8,'Ayacucho','Huamanga','Santiago De Pischa'),(447,5,1,9,'Ayacucho','Huamanga','Vinchos'),(448,5,1,10,'Ayacucho','Huamanga','Tambillo'),(449,5,1,11,'Ayacucho','Huamanga','Acocro'),(450,5,1,12,'Ayacucho','Huamanga','Socos'),(451,5,1,13,'Ayacucho','Huamanga','Ocros'),(452,5,1,14,'Ayacucho','Huamanga','Pacaycasa'),(453,5,1,15,'Ayacucho','Huamanga','Jesus Nazareno'),(454,5,2,1,'Ayacucho','Cangallo','Cangallo'),(455,5,2,4,'Ayacucho','Cangallo','Chuschi'),(456,5,2,6,'Ayacucho','Cangallo','Los Morochucos'),(457,5,2,7,'Ayacucho','Cangallo','Paras'),(458,5,2,8,'Ayacucho','Cangallo','Totos'),(459,5,2,11,'Ayacucho','Cangallo','Maria Parado De Bellido'),(460,5,3,1,'Ayacucho','Huanta','Huanta'),(461,5,3,2,'Ayacucho','Huanta','Ayahuanco'),(462,5,3,3,'Ayacucho','Huanta','Huamanguilla'),(463,5,3,4,'Ayacucho','Huanta','Iguain'),(464,5,3,5,'Ayacucho','Huanta','Luricocha'),(465,5,3,7,'Ayacucho','Huanta','Santillana'),(466,5,3,8,'Ayacucho','Huanta','Sivia'),(467,5,3,9,'Ayacucho','Huanta','Llochegua'),(468,5,4,1,'Ayacucho','La Mar','San Miguel'),(469,5,4,2,'Ayacucho','La Mar','Anco'),(470,5,4,3,'Ayacucho','La Mar','Ayna'),(471,5,4,4,'Ayacucho','La Mar','Chilcas'),(472,5,4,5,'Ayacucho','La Mar','Chungui'),(473,5,4,6,'Ayacucho','La Mar','Tambo'),(474,5,4,7,'Ayacucho','La Mar','Luis Carranza'),(475,5,4,8,'Ayacucho','La Mar','Santa Rosa'),(476,5,4,9,'Ayacucho','La Mar','Samugari'),(477,5,5,1,'Ayacucho','Lucanas','Puquio'),(478,5,5,2,'Ayacucho','Lucanas','Aucara'),(479,5,5,3,'Ayacucho','Lucanas','Cabana'),(480,5,5,4,'Ayacucho','Lucanas','Carmen Salcedo'),(481,5,5,6,'Ayacucho','Lucanas','Chaviña'),(482,5,5,8,'Ayacucho','Lucanas','Chipao'),(483,5,5,10,'Ayacucho','Lucanas','Huac-Huas'),(484,5,5,11,'Ayacucho','Lucanas','Laramate'),(485,5,5,12,'Ayacucho','Lucanas','Leoncio Prado'),(486,5,5,13,'Ayacucho','Lucanas','Lucanas'),(487,5,5,14,'Ayacucho','Lucanas','Llauta'),(488,5,5,16,'Ayacucho','Lucanas','Ocaña'),(489,5,5,17,'Ayacucho','Lucanas','Otoca'),(490,5,5,20,'Ayacucho','Lucanas','Sancos'),(491,5,5,21,'Ayacucho','Lucanas','San Juan'),(492,5,5,22,'Ayacucho','Lucanas','San Pedro'),(493,5,5,24,'Ayacucho','Lucanas','Santa Ana De Huaycahuacho'),(494,5,5,25,'Ayacucho','Lucanas','Santa Lucia'),(495,5,5,29,'Ayacucho','Lucanas','Saisa'),(496,5,5,31,'Ayacucho','Lucanas','San Pedro De Palco'),(497,5,5,32,'Ayacucho','Lucanas','San Cristobal'),(498,5,6,1,'Ayacucho','Parinacochas','Coracora'),(499,5,6,4,'Ayacucho','Parinacochas','Coronel Castañeda'),(500,5,6,5,'Ayacucho','Parinacochas','Chumpi'),(501,5,6,8,'Ayacucho','Parinacochas','Pacapausa'),(502,5,6,11,'Ayacucho','Parinacochas','Pullo'),(503,5,6,12,'Ayacucho','Parinacochas','Puyusca'),(504,5,6,15,'Ayacucho','Parinacochas','San Francisco De Ravacayco'),(505,5,6,16,'Ayacucho','Parinacochas','Upahuacho'),(506,5,7,1,'Ayacucho','Victor Fajardo','Huancapi'),(507,5,7,2,'Ayacucho','Victor Fajardo','Alcamenca'),(508,5,7,3,'Ayacucho','Victor Fajardo','Apongo'),(509,5,7,4,'Ayacucho','Victor Fajardo','Canaria'),(510,5,7,6,'Ayacucho','Victor Fajardo','Cayara'),(511,5,7,7,'Ayacucho','Victor Fajardo','Colca'),(512,5,7,8,'Ayacucho','Victor Fajardo','Hualla'),(513,5,7,9,'Ayacucho','Victor Fajardo','Huamanquiquia'),(514,5,7,10,'Ayacucho','Victor Fajardo','Huancaraylla'),(515,5,7,13,'Ayacucho','Victor Fajardo','Sarhua'),(516,5,7,14,'Ayacucho','Victor Fajardo','Vilcanchos'),(517,5,7,15,'Ayacucho','Victor Fajardo','Asquipata'),(518,5,8,1,'Ayacucho','Huanca Sancos','Sancos'),(519,5,8,2,'Ayacucho','Huanca Sancos','Sacsamarca'),(520,5,8,3,'Ayacucho','Huanca Sancos','Santiago De Lucanamarca'),(521,5,8,4,'Ayacucho','Huanca Sancos','Carapo'),(522,5,9,1,'Ayacucho','Vilcas Huaman','Vilcas Huaman'),(523,5,9,2,'Ayacucho','Vilcas Huaman','Vischongo'),(524,5,9,3,'Ayacucho','Vilcas Huaman','Accomarca'),(525,5,9,4,'Ayacucho','Vilcas Huaman','Carhuanca'),(526,5,9,5,'Ayacucho','Vilcas Huaman','Concepcion'),(527,5,9,6,'Ayacucho','Vilcas Huaman','Huambalpa'),(528,5,9,7,'Ayacucho','Vilcas Huaman','Saurama'),(529,5,9,8,'Ayacucho','Vilcas Huaman','Independencia'),(530,5,10,1,'Ayacucho','Paucar Del Sara Sara','Pausa'),(531,5,10,2,'Ayacucho','Paucar Del Sara Sara','Colta'),(532,5,10,3,'Ayacucho','Paucar Del Sara Sara','Corculla'),(533,5,10,4,'Ayacucho','Paucar Del Sara Sara','Lampa'),(534,5,10,5,'Ayacucho','Paucar Del Sara Sara','Marcabamba'),(535,5,10,6,'Ayacucho','Paucar Del Sara Sara','Oyolo'),(536,5,10,7,'Ayacucho','Paucar Del Sara Sara','Pararca'),(537,5,10,8,'Ayacucho','Paucar Del Sara Sara','San Javier De Alpabamba'),(538,5,10,9,'Ayacucho','Paucar Del Sara Sara','San Jose De Ushua'),(539,5,10,10,'Ayacucho','Paucar Del Sara Sara','Sara Sara'),(540,5,11,1,'Ayacucho','Sucre','Querobamba'),(541,5,11,2,'Ayacucho','Sucre','Belen'),(542,5,11,3,'Ayacucho','Sucre','Chalcos'),(543,5,11,4,'Ayacucho','Sucre','San Salvador De Quije'),(544,5,11,5,'Ayacucho','Sucre','Paico'),(545,5,11,6,'Ayacucho','Sucre','Santiago De Paucaray'),(546,5,11,7,'Ayacucho','Sucre','San Pedro De Larcay'),(547,5,11,8,'Ayacucho','Sucre','Soras'),(548,5,11,9,'Ayacucho','Sucre','Huacaña'),(549,5,11,10,'Ayacucho','Sucre','Chilcayoc'),(550,5,11,11,'Ayacucho','Sucre','Morcolla'),(551,6,1,1,'Cajamarca','Cajamarca','Cajamarca'),(552,6,1,2,'Cajamarca','Cajamarca','Asuncion'),(553,6,1,3,'Cajamarca','Cajamarca','Cospan'),(554,6,1,4,'Cajamarca','Cajamarca','Chetilla'),(555,6,1,5,'Cajamarca','Cajamarca','Encañada'),(556,6,1,6,'Cajamarca','Cajamarca','Jesus'),(557,6,1,7,'Cajamarca','Cajamarca','Los Baños Del Inca'),(558,6,1,8,'Cajamarca','Cajamarca','Llacanora'),(559,6,1,9,'Cajamarca','Cajamarca','Magdalena'),(560,6,1,10,'Cajamarca','Cajamarca','Matara'),(561,6,1,11,'Cajamarca','Cajamarca','Namora'),(562,6,1,12,'Cajamarca','Cajamarca','San Juan'),(563,6,2,1,'Cajamarca','Cajabamba','Cajabamba'),(564,6,2,2,'Cajamarca','Cajabamba','Cachachi'),(565,6,2,3,'Cajamarca','Cajabamba','Condebamba'),(566,6,2,5,'Cajamarca','Cajabamba','Sitacocha'),(567,6,3,1,'Cajamarca','Celendin','Celendin'),(568,6,3,2,'Cajamarca','Celendin','Cortegana'),(569,6,3,3,'Cajamarca','Celendin','Chumuch'),(570,6,3,4,'Cajamarca','Celendin','Huasmin'),(571,6,3,5,'Cajamarca','Celendin','Jorge Chavez'),(572,6,3,6,'Cajamarca','Celendin','Jose Galvez'),(573,6,3,7,'Cajamarca','Celendin','Miguel Iglesias'),(574,6,3,8,'Cajamarca','Celendin','Oxamarca'),(575,6,3,9,'Cajamarca','Celendin','Sorochuco'),(576,6,3,10,'Cajamarca','Celendin','Sucre'),(577,6,3,11,'Cajamarca','Celendin','Utco'),(578,6,3,12,'Cajamarca','Celendin','La Libertad De Pallan'),(579,6,4,1,'Cajamarca','Contumaza','Contumaza'),(580,6,4,3,'Cajamarca','Contumaza','Chilete'),(581,6,4,4,'Cajamarca','Contumaza','Guzmango'),(582,6,4,5,'Cajamarca','Contumaza','San Benito'),(583,6,4,6,'Cajamarca','Contumaza','Cupisnique'),(584,6,4,7,'Cajamarca','Contumaza','Tantarica'),(585,6,4,8,'Cajamarca','Contumaza','Yonan'),(586,6,4,9,'Cajamarca','Contumaza','Santa Cruz De Toled'),(587,6,5,1,'Cajamarca','Cutervo','Cutervo'),(588,6,5,2,'Cajamarca','Cutervo','Callayuc'),(589,6,5,3,'Cajamarca','Cutervo','Cujillo'),(590,6,5,4,'Cajamarca','Cutervo','Choros'),(591,6,5,5,'Cajamarca','Cutervo','La Ramada'),(592,6,5,6,'Cajamarca','Cutervo','Pimpingos'),(593,6,5,7,'Cajamarca','Cutervo','Querocotillo'),(594,6,5,8,'Cajamarca','Cutervo','San Andres De Cutervo'),(595,6,5,9,'Cajamarca','Cutervo','San Juan De Cutervo'),(596,6,5,10,'Cajamarca','Cutervo','San Luis De Lucma'),(597,6,5,11,'Cajamarca','Cutervo','Santa Cruz'),(598,6,5,12,'Cajamarca','Cutervo','Santo Domingo De La Capilla'),(599,6,5,13,'Cajamarca','Cutervo','Santo Tomas'),(600,6,5,14,'Cajamarca','Cutervo','Socota'),(601,6,5,15,'Cajamarca','Cutervo','Toribio Casanova'),(602,6,6,1,'Cajamarca','Chota','Chota'),(603,6,6,2,'Cajamarca','Chota','Anguia'),(604,6,6,3,'Cajamarca','Chota','Cochabamba'),(605,6,6,4,'Cajamarca','Chota','Conchan'),(606,6,6,5,'Cajamarca','Chota','Chadin'),(607,6,6,6,'Cajamarca','Chota','Chiguirip'),(608,6,6,7,'Cajamarca','Chota','Chimban'),(609,6,6,8,'Cajamarca','Chota','Huambos'),(610,6,6,9,'Cajamarca','Chota','Lajas'),(611,6,6,10,'Cajamarca','Chota','Llama'),(612,6,6,11,'Cajamarca','Chota','Miracosta'),(613,6,6,12,'Cajamarca','Chota','Paccha'),(614,6,6,13,'Cajamarca','Chota','Pion'),(615,6,6,14,'Cajamarca','Chota','Querocoto'),(616,6,6,15,'Cajamarca','Chota','Tacabamba'),(617,6,6,16,'Cajamarca','Chota','Tocmoche'),(618,6,6,17,'Cajamarca','Chota','San Juan De Licupis'),(619,6,6,18,'Cajamarca','Chota','Choropampa'),(620,6,6,19,'Cajamarca','Chota','Chalamarca'),(621,6,7,1,'Cajamarca','Hualgayoc','Bambamarca'),(622,6,7,2,'Cajamarca','Hualgayoc','Chugur'),(623,6,7,3,'Cajamarca','Hualgayoc','Hualgayoc'),(624,6,8,1,'Cajamarca','Jaen','Jaen'),(625,6,8,2,'Cajamarca','Jaen','Bellavista'),(626,6,8,3,'Cajamarca','Jaen','Colasay'),(627,6,8,4,'Cajamarca','Jaen','Chontali'),(628,6,8,5,'Cajamarca','Jaen','Pomahuaca'),(629,6,8,6,'Cajamarca','Jaen','Pucara'),(630,6,8,7,'Cajamarca','Jaen','Sallique'),(631,6,8,8,'Cajamarca','Jaen','San Felipe'),(632,6,8,9,'Cajamarca','Jaen','San Jose Del Alto'),(633,6,8,10,'Cajamarca','Jaen','Santa Rosa'),(634,6,8,11,'Cajamarca','Jaen','Las Pirias'),(635,6,8,12,'Cajamarca','Jaen','Huabal'),(636,6,9,1,'Cajamarca','Santa Cruz','Santa Cruz'),(637,6,9,2,'Cajamarca','Santa Cruz','Catache'),(638,6,9,3,'Cajamarca','Santa Cruz','Chancaybaños'),(639,6,9,4,'Cajamarca','Santa Cruz','La Esperanza'),(640,6,9,5,'Cajamarca','Santa Cruz','Ninabamba'),(641,6,9,6,'Cajamarca','Santa Cruz','Pulan'),(642,6,9,7,'Cajamarca','Santa Cruz','Sexi'),(643,6,9,8,'Cajamarca','Santa Cruz','Uticyacu'),(644,6,9,9,'Cajamarca','Santa Cruz','Yauyucan'),(645,6,9,10,'Cajamarca','Santa Cruz','Andabamba'),(646,6,9,11,'Cajamarca','Santa Cruz','Saucepampa'),(647,6,10,1,'Cajamarca','San Miguel','San Miguel'),(648,6,10,2,'Cajamarca','San Miguel','Calquis'),(649,6,10,3,'Cajamarca','San Miguel','La Florida'),(650,6,10,4,'Cajamarca','San Miguel','Llapa'),(651,6,10,5,'Cajamarca','San Miguel','Nanchoc'),(652,6,10,6,'Cajamarca','San Miguel','Niepos'),(653,6,10,7,'Cajamarca','San Miguel','San Gregorio'),(654,6,10,8,'Cajamarca','San Miguel','San Silvestre De Cochan'),(655,6,10,9,'Cajamarca','San Miguel','El Prado'),(656,6,10,10,'Cajamarca','San Miguel','Union Agua Blanca'),(657,6,10,11,'Cajamarca','San Miguel','Tongod'),(658,6,10,12,'Cajamarca','San Miguel','Catilluc'),(659,6,10,13,'Cajamarca','San Miguel','Bolivar'),(660,6,11,1,'Cajamarca','San Ignacio','San Ignacio'),(661,6,11,2,'Cajamarca','San Ignacio','Chirinos'),(662,6,11,3,'Cajamarca','San Ignacio','Huarango'),(663,6,11,4,'Cajamarca','San Ignacio','Namballe'),(664,6,11,5,'Cajamarca','San Ignacio','La Coipa'),(665,6,11,6,'Cajamarca','San Ignacio','San Jose De Lourdes'),(666,6,11,7,'Cajamarca','San Ignacio','Tabaconas'),(667,6,12,1,'Cajamarca','San Marcos','Pedro Galvez'),(668,6,12,2,'Cajamarca','San Marcos','Ichocan'),(669,6,12,3,'Cajamarca','San Marcos','Gregorio Pita'),(670,6,12,4,'Cajamarca','San Marcos','Jose Manuel Quiroz'),(671,6,12,5,'Cajamarca','San Marcos','Eduardo Villanueva'),(672,6,12,6,'Cajamarca','San Marcos','Jose Sabogal'),(673,6,12,7,'Cajamarca','San Marcos','Chancay'),(674,6,13,1,'Cajamarca','San Pablo','San Pablo'),(675,6,13,2,'Cajamarca','San Pablo','San Bernardino'),(676,6,13,3,'Cajamarca','San Pablo','San Luis'),(677,6,13,4,'Cajamarca','San Pablo','Tumbaden'),(678,7,1,1,'Cusco','Cusco','Cusco'),(679,7,1,2,'Cusco','Cusco','Ccorca'),(680,7,1,3,'Cusco','Cusco','Poroy'),(681,7,1,4,'Cusco','Cusco','San Jeronimo'),(682,7,1,5,'Cusco','Cusco','San Sebastian'),(683,7,1,6,'Cusco','Cusco','Santiago'),(684,7,1,7,'Cusco','Cusco','Saylla'),(685,7,1,8,'Cusco','Cusco','Wanchaq'),(686,7,2,1,'Cusco','Acomayo','Acomayo'),(687,7,2,2,'Cusco','Acomayo','Acopia'),(688,7,2,3,'Cusco','Acomayo','Acos'),(689,7,2,4,'Cusco','Acomayo','Pomacanchi'),(690,7,2,5,'Cusco','Acomayo','Rondocan'),(691,7,2,6,'Cusco','Acomayo','Sangarara'),(692,7,2,7,'Cusco','Acomayo','Mosoc Llacta'),(693,7,3,1,'Cusco','Anta','Anta'),(694,7,3,2,'Cusco','Anta','Chinchaypujio'),(695,7,3,3,'Cusco','Anta','Huarocondo'),(696,7,3,4,'Cusco','Anta','Limatambo'),(697,7,3,5,'Cusco','Anta','Mollepata'),(698,7,3,6,'Cusco','Anta','Pucyura'),(699,7,3,7,'Cusco','Anta','Zurite'),(700,7,3,8,'Cusco','Anta','Cachimayo'),(701,7,3,9,'Cusco','Anta','Ancahuasi'),(702,7,4,1,'Cusco','Calca','Calca'),(703,7,4,2,'Cusco','Calca','Coya'),(704,7,4,3,'Cusco','Calca','Lamay'),(705,7,4,4,'Cusco','Calca','Lares'),(706,7,4,5,'Cusco','Calca','Pisac'),(707,7,4,6,'Cusco','Calca','San Salvador'),(708,7,4,7,'Cusco','Calca','Taray'),(709,7,4,8,'Cusco','Calca','Yanatile'),(710,7,5,1,'Cusco','Canas','Yanaoca'),(711,7,5,2,'Cusco','Canas','Checca'),(712,7,5,3,'Cusco','Canas','Kunturkanki'),(713,7,5,4,'Cusco','Canas','Langui'),(714,7,5,5,'Cusco','Canas','Layo'),(715,7,5,6,'Cusco','Canas','Pampamarca'),(716,7,5,7,'Cusco','Canas','Quehue'),(717,7,5,8,'Cusco','Canas','Tupac Amaru'),(718,7,6,1,'Cusco','Canchis','Sicuani'),(719,7,6,2,'Cusco','Canchis','Combapata'),(720,7,6,3,'Cusco','Canchis','Checacupe'),(721,7,6,4,'Cusco','Canchis','Marangani'),(722,7,6,5,'Cusco','Canchis','Pitumarca'),(723,7,6,6,'Cusco','Canchis','San Pablo'),(724,7,6,7,'Cusco','Canchis','San Pedro'),(725,7,6,8,'Cusco','Canchis','Tinta'),(726,7,7,1,'Cusco','Chumbivilcas','Santo Tomas'),(727,7,7,2,'Cusco','Chumbivilcas','Capacmarca'),(728,7,7,3,'Cusco','Chumbivilcas','Colquemarca'),(729,7,7,4,'Cusco','Chumbivilcas','Chamaca'),(730,7,7,5,'Cusco','Chumbivilcas','Livitaca'),(731,7,7,6,'Cusco','Chumbivilcas','Llusco'),(732,7,7,7,'Cusco','Chumbivilcas','Quiñota'),(733,7,7,8,'Cusco','Chumbivilcas','Velille'),(734,7,8,1,'Cusco','Espinar','Espinar'),(735,7,8,2,'Cusco','Espinar','Condoroma'),(736,7,8,3,'Cusco','Espinar','Coporaque'),(737,7,8,4,'Cusco','Espinar','Ocoruro'),(738,7,8,5,'Cusco','Espinar','Pallpata'),(739,7,8,6,'Cusco','Espinar','Pichigua'),(740,7,8,7,'Cusco','Espinar','Suyckutambo'),(741,7,8,8,'Cusco','Espinar','Alto Pichigua'),(742,7,9,1,'Cusco','La Convencion','Santa Ana'),(743,7,9,2,'Cusco','La Convencion','Echarate'),(744,7,9,3,'Cusco','La Convencion','Huayopata'),(745,7,9,4,'Cusco','La Convencion','Maranura'),(746,7,9,5,'Cusco','La Convencion','Ocobamba'),(747,7,9,6,'Cusco','La Convencion','Santa Teresa'),(748,7,9,7,'Cusco','La Convencion','Vilcabamba'),(749,7,9,8,'Cusco','La Convencion','Quellouno'),(750,7,9,9,'Cusco','La Convencion','Kimbiri'),(751,7,9,10,'Cusco','La Convencion','Pichari'),(752,7,10,1,'Cusco','Paruro','Paruro'),(753,7,10,2,'Cusco','Paruro','Accha'),(754,7,10,3,'Cusco','Paruro','Ccapi'),(755,7,10,4,'Cusco','Paruro','Colcha'),(756,7,10,5,'Cusco','Paruro','Huanoquite'),(757,7,10,6,'Cusco','Paruro','Omacha'),(758,7,10,7,'Cusco','Paruro','Yaurisque'),(759,7,10,8,'Cusco','Paruro','Paccaritambo'),(760,7,10,9,'Cusco','Paruro','Pillpinto'),(761,7,11,1,'Cusco','Paucartambo','Paucartambo'),(762,7,11,2,'Cusco','Paucartambo','Caicay'),(763,7,11,3,'Cusco','Paucartambo','Colquepata'),(764,7,11,4,'Cusco','Paucartambo','Challabamba'),(765,7,11,5,'Cusco','Paucartambo','Kosñipata'),(766,7,11,6,'Cusco','Paucartambo','Huancarani'),(767,7,12,1,'Cusco','Quispicanchi','Urcos'),(768,7,12,2,'Cusco','Quispicanchi','Andahuaylillas'),(769,7,12,3,'Cusco','Quispicanchi','Camanti'),(770,7,12,4,'Cusco','Quispicanchi','Ccarhuayo'),(771,7,12,5,'Cusco','Quispicanchi','Ccatca'),(772,7,12,6,'Cusco','Quispicanchi','Cusipata'),(773,7,12,7,'Cusco','Quispicanchi','Huaro'),(774,7,12,8,'Cusco','Quispicanchi','Lucre'),(775,7,12,9,'Cusco','Quispicanchi','Marcapata'),(776,7,12,10,'Cusco','Quispicanchi','Ocongate'),(777,7,12,11,'Cusco','Quispicanchi','Oropesa'),(778,7,12,12,'Cusco','Quispicanchi','Quiquijana'),(779,7,13,1,'Cusco','Urubamba','Urubamba'),(780,7,13,2,'Cusco','Urubamba','Chinchero'),(781,7,13,3,'Cusco','Urubamba','Huayllabamba'),(782,7,13,4,'Cusco','Urubamba','Machupicchu'),(783,7,13,5,'Cusco','Urubamba','Maras'),(784,7,13,6,'Cusco','Urubamba','Ollantaytambo'),(785,7,13,7,'Cusco','Urubamba','Yucay'),(786,8,1,1,'Huancavelica','Huancavelica','Huancavelica'),(787,8,1,2,'Huancavelica','Huancavelica','Acobambilla'),(788,8,1,3,'Huancavelica','Huancavelica','Acoria'),(789,8,1,4,'Huancavelica','Huancavelica','Conayca'),(790,8,1,5,'Huancavelica','Huancavelica','Cuenca'),(791,8,1,6,'Huancavelica','Huancavelica','Huachocolpa'),(792,8,1,8,'Huancavelica','Huancavelica','Huayllahuara'),(793,8,1,9,'Huancavelica','Huancavelica','Izcuchaca'),(794,8,1,10,'Huancavelica','Huancavelica','Laria'),(795,8,1,11,'Huancavelica','Huancavelica','Manta'),(796,8,1,12,'Huancavelica','Huancavelica','Mariscal Caceres'),(797,8,1,13,'Huancavelica','Huancavelica','Moya'),(798,8,1,14,'Huancavelica','Huancavelica','Nuevo Occoro'),(799,8,1,15,'Huancavelica','Huancavelica','Palca'),(800,8,1,16,'Huancavelica','Huancavelica','Pilchaca'),(801,8,1,17,'Huancavelica','Huancavelica','Vilca'),(802,8,1,18,'Huancavelica','Huancavelica','Yauli'),(803,8,1,19,'Huancavelica','Huancavelica','Ascension'),(804,8,1,20,'Huancavelica','Huancavelica','Huando'),(805,8,2,1,'Huancavelica','Acobamba','Acobamba'),(806,8,2,2,'Huancavelica','Acobamba','Anta'),(807,8,2,3,'Huancavelica','Acobamba','Andabamba'),(808,8,2,4,'Huancavelica','Acobamba','Caja'),(809,8,2,5,'Huancavelica','Acobamba','Marcas'),(810,8,2,6,'Huancavelica','Acobamba','Paucara'),(811,8,2,7,'Huancavelica','Acobamba','Pomacocha'),(812,8,2,8,'Huancavelica','Acobamba','Rosario'),(813,8,3,1,'Huancavelica','Angaraes','Lircay'),(814,8,3,2,'Huancavelica','Angaraes','Anchonga'),(815,8,3,3,'Huancavelica','Angaraes','Callanmarca'),(816,8,3,4,'Huancavelica','Angaraes','Congalla'),(817,8,3,5,'Huancavelica','Angaraes','Chincho'),(818,8,3,6,'Huancavelica','Angaraes','Huallay-Grande'),(819,8,3,7,'Huancavelica','Angaraes','Huanca-Huanca'),(820,8,3,8,'Huancavelica','Angaraes','Julcamarca'),(821,8,3,9,'Huancavelica','Angaraes','San Antonio De Antaparco'),(822,8,3,10,'Huancavelica','Angaraes','Santo Tomas De Pata'),(823,8,3,11,'Huancavelica','Angaraes','Secclla'),(824,8,3,12,'Huancavelica','Angaraes','Ccochaccasa'),(825,8,4,1,'Huancavelica','Castrovirreyna','Castrovirreyna'),(826,8,4,2,'Huancavelica','Castrovirreyna','Arma'),(827,8,4,3,'Huancavelica','Castrovirreyna','Aurahua'),(828,8,4,5,'Huancavelica','Castrovirreyna','Capillas'),(829,8,4,6,'Huancavelica','Castrovirreyna','Cocas'),(830,8,4,8,'Huancavelica','Castrovirreyna','Chupamarca'),(831,8,4,9,'Huancavelica','Castrovirreyna','Huachos'),(832,8,4,10,'Huancavelica','Castrovirreyna','Huamatambo'),(833,8,4,14,'Huancavelica','Castrovirreyna','Mollepampa'),(834,8,4,22,'Huancavelica','Castrovirreyna','San Juan'),(835,8,4,27,'Huancavelica','Castrovirreyna','Tantara'),(836,8,4,28,'Huancavelica','Castrovirreyna','Ticrapo'),(837,8,4,29,'Huancavelica','Castrovirreyna','Santa Ana'),(838,8,5,1,'Huancavelica','Tayacaja','Pampas'),(839,8,5,2,'Huancavelica','Tayacaja','Acostambo'),(840,8,5,3,'Huancavelica','Tayacaja','Acraquia'),(841,8,5,4,'Huancavelica','Tayacaja','Ahuaycha'),(842,8,5,6,'Huancavelica','Tayacaja','Colcabamba'),(843,8,5,9,'Huancavelica','Tayacaja','Daniel Hernandez'),(844,8,5,11,'Huancavelica','Tayacaja','Huachocolpa'),(845,8,5,12,'Huancavelica','Tayacaja','Huaribamba'),(846,8,5,15,'Huancavelica','Tayacaja','Ñahuimpuquio'),(847,8,5,17,'Huancavelica','Tayacaja','Pazos'),(848,8,5,18,'Huancavelica','Tayacaja','Quishuar'),(849,8,5,19,'Huancavelica','Tayacaja','Salcabamba'),(850,8,5,20,'Huancavelica','Tayacaja','San Marcos De Rocchac'),(851,8,5,23,'Huancavelica','Tayacaja','Surcubamba'),(852,8,5,25,'Huancavelica','Tayacaja','Tintay Puncu'),(853,8,5,26,'Huancavelica','Tayacaja','Salcahuasi'),(854,8,6,1,'Huancavelica','Huaytara','Ayavi'),(855,8,6,2,'Huancavelica','Huaytara','Cordova'),(856,8,6,3,'Huancavelica','Huaytara','Huayacundo Arma'),(857,8,6,4,'Huancavelica','Huaytara','Huaytara'),(858,8,6,5,'Huancavelica','Huaytara','Laramarca'),(859,8,6,6,'Huancavelica','Huaytara','Ocoyo'),(860,8,6,7,'Huancavelica','Huaytara','Pilpichaca'),(861,8,6,8,'Huancavelica','Huaytara','Querco'),(862,8,6,9,'Huancavelica','Huaytara','Quito Arma'),(863,8,6,10,'Huancavelica','Huaytara','San Antonio De Cusicancha'),(864,8,6,11,'Huancavelica','Huaytara','San Francisco De Sangayaico'),(865,8,6,12,'Huancavelica','Huaytara','San Isidro'),(866,8,6,13,'Huancavelica','Huaytara','Santiago De Chocorvos'),(867,8,6,14,'Huancavelica','Huaytara','Santiago De Quirahuara'),(868,8,6,15,'Huancavelica','Huaytara','Santo Domingo De Capillas'),(869,8,6,16,'Huancavelica','Huaytara','Tambo'),(870,8,7,1,'Huancavelica','Churcampa','Churcampa'),(871,8,7,2,'Huancavelica','Churcampa','Anco'),(872,8,7,3,'Huancavelica','Churcampa','Chinchihuasi'),(873,8,7,4,'Huancavelica','Churcampa','El Carmen'),(874,8,7,5,'Huancavelica','Churcampa','La Merced'),(875,8,7,6,'Huancavelica','Churcampa','Locroja'),(876,8,7,7,'Huancavelica','Churcampa','Paucarbamba'),(877,8,7,8,'Huancavelica','Churcampa','San Miguel De Mayocc'),(878,8,7,9,'Huancavelica','Churcampa','San Pedro De Coris'),(879,8,7,10,'Huancavelica','Churcampa','Pachamarca'),(880,8,7,11,'Huancavelica','Churcampa','Cosme'),(881,9,1,1,'Huanuco','Huanuco','Huanuco'),(882,9,1,2,'Huanuco','Huanuco','Chinchao'),(883,9,1,3,'Huanuco','Huanuco','Churubamba'),(884,9,1,4,'Huanuco','Huanuco','Margos'),(885,9,1,5,'Huanuco','Huanuco','Quisqui'),(886,9,1,6,'Huanuco','Huanuco','San Francisco De Cayran'),(887,9,1,7,'Huanuco','Huanuco','San Pedro De Chaulan'),(888,9,1,8,'Huanuco','Huanuco','Santa Maria Del Valle'),(889,9,1,9,'Huanuco','Huanuco','Yarumayo'),(890,9,1,10,'Huanuco','Huanuco','Amarilis'),(891,9,1,11,'Huanuco','Huanuco','Pillco Marca'),(892,9,1,12,'Huanuco','Huanuco','Yacus'),(893,9,2,1,'Huanuco','Ambo','Ambo'),(894,9,2,2,'Huanuco','Ambo','Cayna'),(895,9,2,3,'Huanuco','Ambo','Colpas'),(896,9,2,4,'Huanuco','Ambo','Conchamarca'),(897,9,2,5,'Huanuco','Ambo','Huacar'),(898,9,2,6,'Huanuco','Ambo','San Francisco'),(899,9,2,7,'Huanuco','Ambo','San Rafael'),(900,9,2,8,'Huanuco','Ambo','Tomay-Kichwa'),(901,9,3,1,'Huanuco','Dos De Mayo','La Union'),(902,9,3,7,'Huanuco','Dos De Mayo','Chuquis'),(903,9,3,12,'Huanuco','Dos De Mayo','Marias'),(904,9,3,14,'Huanuco','Dos De Mayo','Pachas'),(905,9,3,16,'Huanuco','Dos De Mayo','Quivilla'),(906,9,3,17,'Huanuco','Dos De Mayo','Ripan'),(907,9,3,21,'Huanuco','Dos De Mayo','Shunqui'),(908,9,3,22,'Huanuco','Dos De Mayo','Sillapata'),(909,9,3,23,'Huanuco','Dos De Mayo','Yanas'),(910,9,4,1,'Huanuco','Huamalies','Llata'),(911,9,4,2,'Huanuco','Huamalies','Arancay'),(912,9,4,3,'Huanuco','Huamalies','Chavin De Pariarca'),(913,9,4,4,'Huanuco','Huamalies','Jacas Grande'),(914,9,4,5,'Huanuco','Huamalies','Jircan'),(915,9,4,6,'Huanuco','Huamalies','Miraflores'),(916,9,4,7,'Huanuco','Huamalies','Monzon'),(917,9,4,8,'Huanuco','Huamalies','Punchao'),(918,9,4,9,'Huanuco','Huamalies','Puños'),(919,9,4,10,'Huanuco','Huamalies','Singa'),(920,9,4,11,'Huanuco','Huamalies','Tantamayo'),(921,9,5,1,'Huanuco','Marañon','Huacrachuco'),(922,9,5,2,'Huanuco','Marañon','Cholon'),(923,9,5,5,'Huanuco','Marañon','San Buenaventura'),(924,9,6,1,'Huanuco','Leoncio Prado','Rupa-Rupa'),(925,9,6,2,'Huanuco','Leoncio Prado','Daniel Alomia Robles'),(926,9,6,3,'Huanuco','Leoncio Prado','Hermilio Valdizan'),(927,9,6,4,'Huanuco','Leoncio Prado','Luyando'),(928,9,6,5,'Huanuco','Leoncio Prado','Mariano Damaso Beraun'),(929,9,6,6,'Huanuco','Leoncio Prado','Jose Crespo Y Castillo'),(930,9,7,1,'Huanuco','Pachitea','Panao'),(931,9,7,2,'Huanuco','Pachitea','Chaglla'),(932,9,7,4,'Huanuco','Pachitea','Molino'),(933,9,7,6,'Huanuco','Pachitea','Umari'),(934,9,8,1,'Huanuco','Puerto Inca','Honoria'),(935,9,8,2,'Huanuco','Puerto Inca','Puerto Inca'),(936,9,8,3,'Huanuco','Puerto Inca','Codo Del Pozuzo'),(937,9,8,4,'Huanuco','Puerto Inca','Tournavista'),(938,9,8,5,'Huanuco','Puerto Inca','Yuyapichis'),(939,9,9,1,'Huanuco','Huacaybamba','Huacaybamba'),(940,9,9,2,'Huanuco','Huacaybamba','Pinra'),(941,9,9,3,'Huanuco','Huacaybamba','Canchabamba'),(942,9,9,4,'Huanuco','Huacaybamba','Cochabamba'),(943,9,10,1,'Huanuco','Lauricocha','Jesus'),(944,9,10,2,'Huanuco','Lauricocha','Baños'),(945,9,10,3,'Huanuco','Lauricocha','San Francisco De Asis'),(946,9,10,4,'Huanuco','Lauricocha','Queropalca'),(947,9,10,5,'Huanuco','Lauricocha','San Miguel De Cauri'),(948,9,10,6,'Huanuco','Lauricocha','Rondos'),(949,9,10,7,'Huanuco','Lauricocha','Jivia'),(950,9,11,1,'Huanuco','Yarowilca','Chavinillo'),(951,9,11,2,'Huanuco','Yarowilca','Aparicio Pomares'),(952,9,11,3,'Huanuco','Yarowilca','Cahuac'),(953,9,11,4,'Huanuco','Yarowilca','Chacabamba'),(954,9,11,5,'Huanuco','Yarowilca','Jacas Chico'),(955,9,11,6,'Huanuco','Yarowilca','Obas'),(956,9,11,7,'Huanuco','Yarowilca','Pampamarca'),(957,9,11,8,'Huanuco','Yarowilca','Choras'),(958,10,1,1,'Ica','Ica','Ica'),(959,10,1,2,'Ica','Ica','La Tinguiña'),(960,10,1,3,'Ica','Ica','Los Aquijes'),(961,10,1,4,'Ica','Ica','Parcona'),(962,10,1,5,'Ica','Ica','Pueblo Nuevo'),(963,10,1,6,'Ica','Ica','Salas'),(964,10,1,7,'Ica','Ica','San Jose De Los Molinos'),(965,10,1,8,'Ica','Ica','San Juan Bautista'),(966,10,1,9,'Ica','Ica','Santiago'),(967,10,1,10,'Ica','Ica','Subtanjalla'),(968,10,1,11,'Ica','Ica','Yauca Del Rosario'),(969,10,1,12,'Ica','Ica','Tate'),(970,10,1,13,'Ica','Ica','Pachacutec'),(971,10,1,14,'Ica','Ica','Ocucaje'),(972,10,2,1,'Ica','Chincha','Chincha Alta'),(973,10,2,2,'Ica','Chincha','Chavin'),(974,10,2,3,'Ica','Chincha','Chincha Baja'),(975,10,2,4,'Ica','Chincha','El Carmen'),(976,10,2,5,'Ica','Chincha','Grocio Prado'),(977,10,2,6,'Ica','Chincha','San Pedro De Huacarpana'),(978,10,2,7,'Ica','Chincha','Sunampe'),(979,10,2,8,'Ica','Chincha','Tambo De Mora'),(980,10,2,9,'Ica','Chincha','Alto Laran'),(981,10,2,10,'Ica','Chincha','Pueblo Nuevo'),(982,10,2,11,'Ica','Chincha','San Juan De Yanac'),(983,10,3,1,'Ica','Nazca','Nazca'),(984,10,3,2,'Ica','Nazca','Changuillo'),(985,10,3,3,'Ica','Nazca','El Ingenio'),(986,10,3,4,'Ica','Nazca','Marcona'),(987,10,3,5,'Ica','Nazca','Vista Alegre'),(988,10,4,1,'Ica','Pisco','Pisco'),(989,10,4,2,'Ica','Pisco','Huancano'),(990,10,4,3,'Ica','Pisco','Humay'),(991,10,4,4,'Ica','Pisco','Independencia'),(992,10,4,5,'Ica','Pisco','Paracas'),(993,10,4,6,'Ica','Pisco','San Andres'),(994,10,4,7,'Ica','Pisco','San Clemente'),(995,10,4,8,'Ica','Pisco','Tupac Amaru Inca'),(996,10,5,1,'Ica','Palpa','Palpa'),(997,10,5,2,'Ica','Palpa','Llipata'),(998,10,5,3,'Ica','Palpa','Rio Grande'),(999,10,5,4,'Ica','Palpa','Santa Cruz'),(1000,10,5,5,'Ica','Palpa','Tibillo');
/*!40000 ALTER TABLE `ubigeo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(45) NOT NULL,
  `claveUsuario` varchar(16) NOT NULL,
  `fechaRegistro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idRol` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_Usuario_Rol1_idx` (`idRol`),
  CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'frank','123','2016-10-03 00:00:00',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sgpa'
--

--
-- Dumping routines for database 'sgpa'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-20 15:55:31
