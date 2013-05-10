-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2013 at 02:31 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laboratorio`
--

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORIA`
--

CREATE TABLE IF NOT EXISTS `CATEGORIA` (
  `IDCATEGORIA` int(8) NOT NULL AUTO_INCREMENT,
  `IDSECCION` int(11) NOT NULL,
  `NOMBRECATEGORIA` varchar(50) NOT NULL,
  `COSTO` float NOT NULL,
  `DESCRIPCIONCATEGORIA` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`IDCATEGORIA`),
  KEY `FK_SECCION_CATEGORIA` (`IDSECCION`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `CATEGORIA`
--

INSERT INTO `CATEGORIA` (`IDCATEGORIA`, `IDSECCION`, `NOMBRECATEGORIA`, `COSTO`, `DESCRIPCIONCATEGORIA`) VALUES
(1, 1, 'Glicemia', 30, ''),
(2, 1, 'Hemoglobina Glicosilada', 10, 'Consta del conteo de globulos rojos'),
(3, 2, 'Colesterol', 50, 'Analisis del porcentaje de colesterol en sangre'),
(4, 3, 'Fosfata Alcalina', 25, 'Analisis del porcentaje de fosfato en sangre'),
(9, 4, 'urea', 20, ''),
(5, 4, 'glicemia', 15, 'azucar en la sangre'),
(6, 4, 'hemoglobina glucosidada', 15, 'nivel de emoglobina en sangre'),
(7, 4, 'creatinina', 20, ''),
(8, 4, 'acido urico', 25, ''),
(10, 4, 'N urico', 15, ''),
(11, 5, 'Colesterol', 30, ''),
(12, 5, 'Trigliceridos', 15, ''),
(13, 5, 'HDL Colesterol', 10, 'colesterol  en sangre'),
(14, 5, 'LDL colesterol', 10, 'colesterol  en sangre'),
(15, 5, 'VLDL', 20, 'colesterol  en sangre'),
(16, 6, 'fosfata alcalina', 10, ''),
(17, 6, 'GOT', 20, ''),
(18, 6, 'GPT', 20, ''),
(19, 6, 'Bilirrubina Directa', 10, ''),
(20, 6, 'Bilirrubina Total', 10, ''),
(21, 6, 'proteinas totales', 30, ''),
(22, 6, 'Albuminas', 20, ''),
(23, 6, 'gloobulina', 20, ''),
(24, 7, 'insulina', 30, ''),
(25, 7, 'TSH', 15, ''),
(26, 7, 'T libre', 18, ''),
(27, 8, 'PCR', 15, ''),
(28, 8, 'latex', 18, ''),
(29, 8, 'ASTO', 35, ''),
(30, 9, 'Sodio', 10, ''),
(31, 9, 'Potasio', 10, ''),
(32, 9, 'Calcio', 10, 'nivel de calcio en sangre'),
(33, 9, 'Cloro', 10, 'cantidad de cloro en sangre'),
(34, 10, 'eritrocitos', 10, 'nivel de globulos rojos en sangre'),
(35, 10, 'hemoglobina', 0, 'nivel de globulos rojos en sangre'),
(36, 10, 'hematrocitos', 0, 'nivel de globulos rojos en sangre'),
(37, 10, 'plaquetas', 0, 'numero de plaquetas en seccion de globulos'),
(38, 10, 'Leucocitos', 0, 'cantidad de globulos blancos en sangre'),
(39, 11, 'cayados', 0, ''),
(40, 11, 'segmentados', 0, ''),
(41, 11, 'linfocitos', 0, ''),
(42, 11, 'Monocitos', 0, ''),
(43, 11, 'eosinofilos', 0, ''),
(44, 11, 'basofilos', 0, ''),
(45, 12, 'primera hora', 0, ''),
(46, 12, 'segunda hora', 0, '2Ã?Â° hora'),
(47, 12, 'I k', 0, '2Ã?Â° hora');

-- --------------------------------------------------------

--
-- Table structure for table `COSTO`
--

CREATE TABLE IF NOT EXISTS `COSTO` (
  `IDCOBRO` int(8) NOT NULL AUTO_INCREMENT,
  `IDORDEN` int(11) NOT NULL,
  `FECHA` datetime NOT NULL,
  `CANTIDAD` float NOT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`IDCOBRO`),
  KEY `FK_ORDEN_COSTO` (`IDORDEN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `COSTO`
--


-- --------------------------------------------------------

--
-- Table structure for table `INSUMO`
--

CREATE TABLE IF NOT EXISTS `INSUMO` (
  `IDINSUMO` int(8) NOT NULL AUTO_INCREMENT,
  `IDORDEN` int(11) NOT NULL,
  `IDPROVEEDOR` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `FECHA` datetime NOT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`IDINSUMO`),
  KEY `FK_INSUMO_PROVEEDOR` (`IDPROVEEDOR`),
  KEY `FK_ORDEN_INSUMO` (`IDORDEN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `INSUMO`
--


-- --------------------------------------------------------

--
-- Table structure for table `MEDICO`
--

CREATE TABLE IF NOT EXISTS `MEDICO` (
  `IDMEDICO` int(8) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(1024) NOT NULL,
  PRIMARY KEY (`IDMEDICO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `MEDICO`
--

INSERT INTO `MEDICO` (`IDMEDICO`, `NOMBRE`, `EMAIL`, `TELEFONO`) VALUES
(1, 'Juan Perez', 'prueba@prueba.com', '4123456'),
(2, 'Fernado Nogales', 'fernandonogales@gmail.com', '4123456'),
(3, 'Patricia Soliz', 'patriciasoliz@gmail.com', '4123456');

-- --------------------------------------------------------

--
-- Table structure for table `ORDEN`
--

CREATE TABLE IF NOT EXISTS `ORDEN` (
  `IDORDEN` int(8) NOT NULL AUTO_INCREMENT,
  `IDUSUARIO` int(11) NOT NULL,
  `IDMEDICO` int(11) NOT NULL,
  `IDPACIENTE` int(11) NOT NULL,
  `FECHAPEDIDO` datetime NOT NULL,
  `DESCRIPCIONORDEN` varchar(1024) DEFAULT NULL,
  `MATERIAL` varchar(255) DEFAULT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `FECHAENTREGA` date DEFAULT NULL,
  PRIMARY KEY (`IDORDEN`),
  KEY `FK_MEDICO_ORDEN` (`IDMEDICO`),
  KEY `FK_ORDEN_PACIENTE` (`IDPACIENTE`),
  KEY `FK_USUARIO_ORDEN` (`IDUSUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ORDEN`
--


-- --------------------------------------------------------

--
-- Table structure for table `PACIENTE`
--

CREATE TABLE IF NOT EXISTS `PACIENTE` (
  `IDPACIENTE` int(8) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `EDAD` int(11) NOT NULL,
  `SEXO` varchar(1) NOT NULL,
  `TELEFONO` varchar(1024) NOT NULL,
  `DESCRIPCION` varchar(1024) NOT NULL,
  PRIMARY KEY (`IDPACIENTE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `PACIENTE`
--

INSERT INTO `PACIENTE` (`IDPACIENTE`, `NOMBRE`, `EDAD`, `SEXO`, `TELEFONO`, `DESCRIPCION`) VALUES
(1, 'Mario Solares', 15, 'M', '1', ''),
(2, 'Fernanda Ramirez', 24, 'F', '4123456', ''),
(3, 'Fernanda Gonzales', 24, 'F', '4123456', ''),
(4, 'Patricia Rocabado', 34, 'F', '4123456', ''),
(5, 'Roberto Aguilar', 40, 'M', '4123456', ''),
(6, 'Gabriel Machia', 40, 'M', '4123456', '');

-- --------------------------------------------------------

--
-- Table structure for table `PROVEEDOR`
--

CREATE TABLE IF NOT EXISTS `PROVEEDOR` (
  `IDPROVEEDOR` int(8) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `DIRECCION` varchar(150) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(1024) DEFAULT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`IDPROVEEDOR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `PROVEEDOR`
--


-- --------------------------------------------------------

--
-- Table structure for table `RANGO`
--

CREATE TABLE IF NOT EXISTS `RANGO` (
  `IDRANGO` int(8) NOT NULL AUTO_INCREMENT,
  `IDCATEGORIA` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  `MINIMO` float DEFAULT NULL,
  `MAXIMO` float DEFAULT NULL,
  `UNIDAD` varchar(5) NOT NULL,
  PRIMARY KEY (`IDRANGO`),
  KEY `FK_RANGO_CATEGORIA` (`IDCATEGORIA`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `RANGO`
--

INSERT INTO `RANGO` (`IDRANGO`, `IDCATEGORIA`, `NOMBRE`, `DESCRIPCION`, `MINIMO`, `MAXIMO`, `UNIDAD`) VALUES
(1, 1, 'Hombre En Condiciones Normales', 'Sexo Masculino, Independiente de Edad, En condiciones normales', 74, 106, 'mg/dl'),
(2, 1, 'Mujer En Condiciones Normales', 'Sexo Femenino, Independiente de Edad, En condiciones normales', 74, 106, 'mg/dl'),
(3, 2, 'Mujer En Condiciones Normales', 'Sexo Femenino, Independiente de Edad, En condiciones normales', 6.6, 8.6, '%'),
(4, 3, 'Mujer En Condiciones Normales', 'Sexo Femenino, Independiente de Edad, En condiciones normales', NULL, 200, 'mg/dl'),
(5, 3, 'Hombre En Condiciones Normales', '', 0, 200, 'mg/dl'),
(9, 8, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 2.6, 6, 'mg/dl'),
(8, 7, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0.6, 1.2, 'mg/dl'),
(7, 6, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 6.6, 8.6, '%'),
(6, 5, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 74, 106, 'mg/dl'),
(10, 9, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 13, 43, 'mg/dl'),
(11, 10, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 4.5, 23, 'mg/dl'),
(12, 11, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 200, 'mg/dl'),
(13, 12, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 150, 'mg/dl'),
(14, 13, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 40, 60, 'mg/dl'),
(15, 14, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 140, 'mg/dl'),
(16, 16, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 240, 'U/L'),
(17, 17, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 40, 'U/L'),
(18, 18, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 40, 'U/L'),
(19, 20, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 1, 'mg/dl'),
(20, 19, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 0.2, 'mg/dl'),
(21, 21, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 0.8, 'mg/dl'),
(22, 22, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 6.4, 8.3, 'g/dl'),
(23, 23, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 3.5, 4.8, 'g/dl'),
(24, 24, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 2, 25, 'ulU/m'),
(25, 24, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0.8, 2.2, 'ng/dl'),
(26, 27, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 6, 'mg/L'),
(27, 28, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 8, 'IU/ml'),
(28, 29, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 0, 200, 'IU/ml'),
(29, 30, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 135, 153, 'mEq/L'),
(30, 31, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 3.4, 5.3, 'mEq/L'),
(31, 33, 'Mujer   en condiciones normales', 'mujer en condiciones normales  independiente de edad', 98, 106, 'mEq/L'),
(32, 34, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 4.5, 5.6, '/mm3'),
(33, 35, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 13, 18, 'g/dl'),
(34, 36, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 40, 52, '%'),
(35, 37, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 150, 450, '/mm3'),
(36, 38, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 4.5, 10, '/mm3'),
(37, 39, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 0, 3, '%'),
(38, 40, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 50, 60, '%'),
(39, 44, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 0, 1, '%'),
(40, 43, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 1, 4, '%'),
(41, 42, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 12, 8, '%'),
(42, 41, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 25, 40, '%'),
(43, 45, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 0, 20, 'mm');

-- --------------------------------------------------------

--
-- Table structure for table `RESULTADO`
--

CREATE TABLE IF NOT EXISTS `RESULTADO` (
  `IDRESULTADO` int(8) NOT NULL AUTO_INCREMENT,
  `IDRANGO` int(11) NOT NULL,
  `IDORDEN` int(11) NOT NULL,
  `IDCATEGORIA` int(11) NOT NULL,
  `RESULTADO` float NOT NULL,
  `DESCRIPCION` varchar(1024) NOT NULL,
  PRIMARY KEY (`IDRESULTADO`),
  KEY `FK_ORDEN_RESULTADO` (`IDORDEN`),
  KEY `FK_RESULTADO_CATEGORIA` (`IDCATEGORIA`),
  KEY `FK_RESULTADO_RANGO` (`IDRANGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `RESULTADO`
--


-- --------------------------------------------------------

--
-- Table structure for table `SECCION`
--

CREATE TABLE IF NOT EXISTS `SECCION` (
  `IDSECCION` int(8) NOT NULL AUTO_INCREMENT,
  `NOMBRESECCION` varchar(50) NOT NULL,
  PRIMARY KEY (`IDSECCION`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `SECCION`
--

INSERT INTO `SECCION` (`IDSECCION`, `NOMBRESECCION`) VALUES
(1, 'Quimica Sanguinea'),
(2, 'Perfil Lipidico'),
(3, 'Perfil Hepatico'),
(5, 'perfil lipidico'),
(4, 'quimica sanguinea'),
(6, 'perfil hepatico'),
(7, 'Hormonas'),
(8, 'perfil reumatoide'),
(9, 'Electrolitos'),
(10, 'Hemograma'),
(11, 'Recuento diferencial'),
(12, 'VES');

-- --------------------------------------------------------

--
-- Table structure for table `USUARIO`
--

CREATE TABLE IF NOT EXISTS `USUARIO` (
  `IDUSUARIO` int(8) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO` varchar(50) NOT NULL,
  `CI` int(11) NOT NULL,
  `TELEFONO` varchar(1024) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `TIPOUSUARIO` int(11) NOT NULL,
  PRIMARY KEY (`IDUSUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `USUARIO`
--

INSERT INTO `USUARIO` (`IDUSUARIO`, `NOMBRE`, `APELLIDO`, `CI`, `TELEFONO`, `LOGIN`, `PASSWORD`, `TIPOUSUARIO`) VALUES
(1, 'diego', 'landa', 4529947, '4281228', 'diego', '.diego', 0),
(2, 'Administrador', 'Administrador', 1234567, '', 'admin', '.admin', 0),
(3, '', '', 0, '', 'secretaria1', '.secretaria1', 1),
(4, 'Secretaria', 'Secretaria', 1234567, '4281228', 'secretaria', '.secretaria', 1),
(5, 'tecnico', 'tecnico', 1234567, '4281228', 'tecnico', '.tecnico', 2),
(6, 'Prueba', 'Prueba', 1234567, '4123456', 'prueba', '.prueba', 0);
