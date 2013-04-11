-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2013 at 10:39 PM
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
  `DESCRIPCIONCATEGORIA` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`IDCATEGORIA`),
  KEY `FK_SECCION_CATEGORIA` (`IDSECCION`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `CATEGORIA`
--

INSERT INTO `CATEGORIA` (`IDCATEGORIA`, `IDSECCION`, `NOMBRECATEGORIA`, `DESCRIPCIONCATEGORIA`) VALUES
(1, 1, 'Glicemia', ''),
(2, 1, 'Hemoglobina Glicosilada', 'Consta del conteo de globulos rojos'),
(3, 2, 'Colesterol', 'Analisis del porcentaje de colesterol en sangre'),
(4, 3, 'Fosfata Alcalina', 'Analisis del porcentaje de fosfato en sangre');

-- --------------------------------------------------------

--
-- Table structure for table `COSTO`
--

CREATE TABLE IF NOT EXISTS `COSTO` (
  `IDCOBRO` int(8) NOT NULL AUTO_INCREMENT,
  `IDORDEN` int(11) DEFAULT NULL,
  `FECHA` datetime NOT NULL,
  `CANTIDAD` float NOT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`IDCOBRO`),
  KEY `FK_RELATIONSHIP_10` (`IDORDEN`)
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `MEDICO`
--


-- --------------------------------------------------------

--
-- Table structure for table `ORDEN`
--

CREATE TABLE IF NOT EXISTS `ORDEN` (
  `IDORDEN` int(8) NOT NULL AUTO_INCREMENT,
  `IDUSUARIO` int(11) NOT NULL,
  `IDMEDICO` int(11) NOT NULL,
  `FECHAPEDIDO` datetime NOT NULL,
  `DESCRIPCIONORDEN` varchar(1024) DEFAULT NULL,
  `MATERIAL` varchar(255) DEFAULT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `FECHAENTREGA` date DEFAULT NULL,
  PRIMARY KEY (`IDORDEN`),
  KEY `FK_MEDICO_ORDEN` (`IDMEDICO`),
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
  `IDORDEN` int(11) DEFAULT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `EDAD` int(11) NOT NULL,
  `SEXO` varchar(1) NOT NULL,
  `TELEFONO` varchar(1024) NOT NULL,
  `DESCRIPCION` varchar(1024) NOT NULL,
  PRIMARY KEY (`IDPACIENTE`),
  KEY `FK_RELATIONSHIP_9` (`IDORDEN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `PACIENTE`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `RANGO`
--

INSERT INTO `RANGO` (`IDRANGO`, `IDCATEGORIA`, `NOMBRE`, `DESCRIPCION`, `MINIMO`, `MAXIMO`, `UNIDAD`) VALUES
(1, 1, 'Hombre En Condiciones Normales', 'Sexo Masculino, Independiente de Edad, En condiciones normales', 74, 106, 'mg/dl'),
(2, 1, 'Mujer En Condiciones Normales', 'Sexo Femenino, Independiente de Edad, En condiciones normales', 74, 106, 'mg/dl'),
(3, 2, 'Mujer En Condiciones Normales', 'Sexo Femenino, Independiente de Edad, En condiciones normales', 6.6, 8.6, '%'),
(4, 3, 'Mujer En Condiciones Normales', 'Sexo Femenino, Independiente de Edad, En condiciones normales', NULL, 200, 'mg/dl'),
(5, 3, 'Hombre En Condiciones Normales', '', 0, 200, 'mg/dl');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `SECCION`
--

INSERT INTO `SECCION` (`IDSECCION`, `NOMBRESECCION`) VALUES
(1, 'Quimica Sanguinea'),
(2, 'Perfil Lipidico'),
(3, 'Perfil Hepatico');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `USUARIO`
--

INSERT INTO `USUARIO` (`IDUSUARIO`, `NOMBRE`, `APELLIDO`, `CI`, `TELEFONO`, `LOGIN`, `PASSWORD`, `TIPOUSUARIO`) VALUES
(1, 'diego', 'landa', 4529947, '4281228', 'diego', '.diego', 0),
(2, 'Administrador', 'Administrador', 1234567, '', 'admin', '.admin', 0),
(3, '', '', 0, '', 'secretaria', '.secretaria', 1),
(4, 'Secretaria', 'Secretaria', 1234567, '4281228', 'secretaria', '.secretaria', 1),
(5, 'tecnico', 'tecnico', 1234567, '4281228', 'tecnico', '.tecnico', 2);
