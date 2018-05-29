-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: biblioteca
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.29-MariaDB-6

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
-- Table structure for table `autores`
--

DROP TABLE IF EXISTS `autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autores` (
  `id_autores` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_au` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  PRIMARY KEY (`id_autores`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autores`
--

LOCK TABLES `autores` WRITE;
/*!40000 ALTER TABLE `autores` DISABLE KEYS */;
INSERT INTO `autores` VALUES (1,'paulo','cohelo'),(2,'Mario','Mendoza'),(3,'Julio','Verne'),(4,'oscar','willder'),(5,'prueba','nuevo'),(6,'Gabriel','García Márquez'),(7,'J. K.','Rowling'),(8,'Anne','Rice'),(9,'Michael','Ende'),(10,'Chuck','Palahniuk'),(11,'Charles','Bukowski'),(12,'John Kennedy','Toole'),(13,'Philip K.','Dick'),(14,'Haruki','Murakami'),(15,'Irvine','Welsh'),(16,'Kurt','Vonnegut'),(17,'George R-R.','Martin'),(18,'yeison','ramirez'),(19,'prueba2','nadie');
/*!40000 ALTER TABLE `autores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependencias`
--

DROP TABLE IF EXISTS `dependencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependencias` (
  `id_dependencias` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_dependencias`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependencias`
--

LOCK TABLES `dependencias` WRITE;
/*!40000 ALTER TABLE `dependencias` DISABLE KEYS */;
INSERT INTO `dependencias` VALUES (1,'Sistemas'),(2,'Administración'),(3,'Economia'),(4,'Sociología'),(5,'Artes'),(6,'Literatura');
/*!40000 ALTER TABLE `dependencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devoluciones`
--

DROP TABLE IF EXISTS `devoluciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devoluciones` (
  `id_devoluciones` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `prestamos_id` int(11) NOT NULL,
  PRIMARY KEY (`id_devoluciones`),
  KEY `devoluciones_prestamos_idx` (`prestamos_id`),
  CONSTRAINT `devoluciones_prestamos` FOREIGN KEY (`prestamos_id`) REFERENCES `prestamos` (`id_prestamos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devoluciones`
--

LOCK TABLES `devoluciones` WRITE;
/*!40000 ALTER TABLE `devoluciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `devoluciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editorial`
--

DROP TABLE IF EXISTS `editorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editorial` (
  `id_editorial` int(11) NOT NULL AUTO_INCREMENT,
  `editorial` varchar(45) NOT NULL,
  PRIMARY KEY (`id_editorial`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editorial`
--

LOCK TABLES `editorial` WRITE;
/*!40000 ALTER TABLE `editorial` DISABLE KEYS */;
INSERT INTO `editorial` VALUES (1,'Cometa'),(2,'Planeta'),(3,'Oveja Negra'),(4,'RANDOM HOUSE MONDADORI COLOMBIA'),(5,'SALAMADRA'),(6,'PENGUIN RANDOM HOUSE'),(7,'BOOKET'),(8,'CIRCULO ROJO'),(9,'CILIGRAMA');
/*!40000 ALTER TABLE `editorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materiales`
--

DROP TABLE IF EXISTS `materiales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materiales` (
  `id_materiales` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ejemplar` varchar(45) NOT NULL,
  `cantidad` smallint(45) NOT NULL,
  `precio` decimal(45,2) DEFAULT NULL,
  `fecha_publicacion` date NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `autor_id` int(11) NOT NULL,
  `editorial_id` int(11) NOT NULL,
  `tipo_materiales_id` int(11) NOT NULL,
  `tema_libro_id` int(11) NOT NULL,
  PRIMARY KEY (`id_materiales`),
  KEY `materiales_autor_idx` (`autor_id`),
  KEY `materiales_editorial_idx` (`editorial_id`),
  KEY `materiales_tipo_materiales_idx` (`tipo_materiales_id`),
  KEY `materiales_tema_libro_idx1` (`tema_libro_id`),
  CONSTRAINT `materiales_autor` FOREIGN KEY (`autor_id`) REFERENCES `autores` (`id_autores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `materiales_editorial` FOREIGN KEY (`editorial_id`) REFERENCES `editorial` (`id_editorial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `materiales_tema_libro` FOREIGN KEY (`tema_libro_id`) REFERENCES `tema_libro` (`id_tema_libro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `materiales_tipo_materiales` FOREIGN KEY (`tipo_materiales_id`) REFERENCES `tipo_materiales` (`id_tipo_materiales`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materiales`
--

LOCK TABLES `materiales` WRITE;
/*!40000 ALTER TABLE `materiales` DISABLE KEYS */;
INSERT INTO `materiales` VALUES (1,1,'satanas','Cuarta',4,20000.00,'2004-05-01','2018-05-28',2,1,1,1),(3,978949877,'Harry Potter y la piedra filosofal','Segunda',4,45.00,'1997-06-26','2018-05-28',2,2,1,3),(4,467754366,'Entrevista con el vampiro','Tercera',1,67.44,'1976-05-05','2018-05-28',3,4,1,1),(5,465754366,'La historia interminable','Primera',2,56.79,'1979-09-01','2018-05-28',4,5,1,3),(6,456892359,'El club de la lucha','Primera',1,43.00,'1996-08-17','2018-05-08',5,4,1,1),(7,467892359,'Memorias de un viejo indecente','Primera',3,67.00,'2006-07-12','2018-02-14',6,6,1,2),(8,567923,'La conjura de los necios ','Primera',1,45.60,'1980-05-01','2018-05-28',7,4,1,1),(9,5798345,'Sueñas los androides con ovejas eléctricas','Primera',1,45.00,'1969-03-15','2017-11-13',8,7,1,3),(10,55678903,'Tokio Blues','Primera',1,36.00,'1987-05-08','2018-05-17',9,4,1,1),(11,978958877,'Cien años de Soledad','Primera',1,37.00,'1967-05-30','2018-05-29',6,6,1,1);
/*!40000 ALTER TABLE `materiales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestamos` (
  `id_prestamos` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_entrega` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `material_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id_prestamos`),
  KEY `prestamos_usuario_idx` (`usuario_id`),
  KEY `prestamos_material_idx` (`material_id`),
  CONSTRAINT `prestamos_material` FOREIGN KEY (`material_id`) REFERENCES `materiales` (`id_materiales`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `prestamos_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamos`
--

LOCK TABLES `prestamos` WRITE;
/*!40000 ALTER TABLE `prestamos` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestamos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas` (
  `id_reservas` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `materiales_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id_reservas`),
  KEY `reservas_materiales_idx` (`materiales_id`),
  KEY `reservas_usuarios_idx` (`usuarios_id`),
  CONSTRAINT `reservas_materiales` FOREIGN KEY (`materiales_id`) REFERENCES `materiales` (`id_materiales`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reservas_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (3,'2018-05-29',1,3,1),(4,'2018-05-05',1,6,1);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tema_libro`
--

DROP TABLE IF EXISTS `tema_libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tema_libro` (
  `id_tema_libro` int(11) NOT NULL AUTO_INCREMENT,
  `tema_libro` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tema_libro`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tema_libro`
--

LOCK TABLES `tema_libro` WRITE;
/*!40000 ALTER TABLE `tema_libro` DISABLE KEYS */;
INSERT INTO `tema_libro` VALUES (1,'Literatura'),(2,'Romántica'),(3,'Fantasía'),(4,'Infantil & Juvenil'),(5,'Bienestar'),(6,'Pensamiento'),(7,'Actualidad'),(8,'Tiempo libre');
/*!40000 ALTER TABLE `tema_libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documento`
--

LOCK TABLES `tipo_documento` WRITE;
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` VALUES (1,'Cédula de Ciudadanía'),(2,'Tarjeta de Identidad'),(3,'Registro Civil'),(4,'Cédula de Extranjería');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_materiales`
--

DROP TABLE IF EXISTS `tipo_materiales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_materiales` (
  `id_tipo_materiales` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_material` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_materiales`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_materiales`
--

LOCK TABLES `tipo_materiales` WRITE;
/*!40000 ALTER TABLE `tipo_materiales` DISABLE KEYS */;
INSERT INTO `tipo_materiales` VALUES (1,'Libro'),(2,'Revista'),(3,'Audiovisual');
/*!40000 ALTER TABLE `tipo_materiales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Estudiantes'),(2,'Docentes'),(3,'Empleados'),(4,'Administrador');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `informacion` longtext,
  `tipo_documento_id` int(11) NOT NULL,
  `tipo_usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id_usuarios`),
  KEY `usuarios_tipo_documento_idx` (`tipo_documento_id`),
  KEY `usuarios_tipo_usuarios_idx` (`tipo_usuario_id`),
  CONSTRAINT `usuarios_tipo_documento` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuarios_tipo_usuarios` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Andres Camilo','Gil Serna','70330434','Circular 2 # 74-16','3207160022','yeramirez5@gmail.com','f865b53623b121fd34ee5426c792e5c33af8c227','Primer usuario del sistema',1,4),(2,'Yeison','Ramirez Lopez','67564350','Calle 56 # 56-30','329876543','yeison.lopez@gmail.com','29424c2d535db69da6778b17637c97205bca699f','Usuario del sistema',1,1),(3,'Natalia','Correa Fierro','89543765','Circular 34 # 56-32','389678543','natalia.correa@gmail.com','29424c2d535db69da6778b17637c97205bca699f','Usuario del sistema',1,2),(4,'Sergio Alexander','Lucena Arenas','986753456','Calle 89 # 89-34','987456324','sergio.lucena@gmail.com','29424c2d535db69da6778b17637c97205bca699f','Usuario del sistema',4,3);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_dependencia`
--

DROP TABLE IF EXISTS `usuarios_dependencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_dependencia` (
  `id_usuarios_programa` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `dependencias_id` int(11) NOT NULL,
  PRIMARY KEY (`id_usuarios_programa`),
  KEY `usuarios_programa_usuarios_idx` (`usuarios_id`),
  KEY `usuarios_programa_dependencias_idx` (`dependencias_id`),
  CONSTRAINT `usuarios_programa_dependencias` FOREIGN KEY (`dependencias_id`) REFERENCES `dependencias` (`id_dependencias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuarios_programa_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_dependencia`
--

LOCK TABLES `usuarios_dependencia` WRITE;
/*!40000 ALTER TABLE `usuarios_dependencia` DISABLE KEYS */;
INSERT INTO `usuarios_dependencia` VALUES (1,1,2),(2,1,1),(3,2,5),(4,3,4),(5,3,3),(6,4,1),(7,2,1);
/*!40000 ALTER TABLE `usuarios_dependencia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-29 17:26:30
