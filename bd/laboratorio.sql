-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-07-2012 a las 14:37:12
-- Versión del servidor: 5.0.67
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `LABORATORIO`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE IF NOT EXISTS `analisis` (
  `idanalisis` int(8) NOT NULL auto_increment,
  `idorden` int(8) default NULL,
  `nombreanalisis` varchar(50) collate latin1_general_ci NOT NULL,
  `descripcionanalisis` text collate latin1_general_ci,
  PRIMARY KEY  (`idanalisis`),
  KEY `fk_relationship_2` (`idorden`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `analisis`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_analisis`
--

CREATE TABLE IF NOT EXISTS `categoria_analisis` (
  `idcategoria` int(8) NOT NULL auto_increment,
  `idanalisis` int(8) default NULL,
  `nombrecategoria` varchar(50) collate latin1_general_ci NOT NULL,
  `descripcioncategoria` text collate latin1_general_ci,
  PRIMARY KEY  (`idcategoria`),
  KEY `fk_relationship_3` (`idanalisis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `categoria_analisis`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cobro`
--

CREATE TABLE IF NOT EXISTS `detalle_cobro` (
  `idcobro` int(8) NOT NULL auto_increment,
  `idorden` int(8) default NULL,
  `fechacobro` date NOT NULL,
  `cantidadcobro` int(11) default NULL,
  `descripcioncobro` text collate latin1_general_ci,
  PRIMARY KEY  (`idcobro`),
  KEY `fk_relationship_8` (`idorden`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `detalle_cobro`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_insumo`
--

CREATE TABLE IF NOT EXISTS `detalle_insumo` (
  `iddetalle` int(8) NOT NULL auto_increment,
  `idorden` int(8) default NULL,
  `nombredetalle` varchar(100) collate latin1_general_ci NOT NULL,
  `fechadetalle` date default NULL,
  `cantidaddetalle` int(11) default NULL,
  `descripciondetalle` text collate latin1_general_ci,
  `costodetalle` int(11) default NULL,
  PRIMARY KEY  (`iddetalle`),
  KEY `fk_relationship_11` (`idorden`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `detalle_insumo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_resultados`
--

CREATE TABLE IF NOT EXISTS `entrega_resultados` (
  `identrega` int(8) NOT NULL auto_increment,
  `idorden` int(8) default NULL,
  `estadoentrega` varchar(50) collate latin1_general_ci default NULL,
  `fechaentrega` date default NULL,
  `descripcionentrega` text collate latin1_general_ci,
  PRIMARY KEY  (`identrega`),
  KEY `fk_relationship_5` (`idorden`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `entrega_resultados`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE IF NOT EXISTS `medico` (
  `idmedico` int(8) NOT NULL auto_increment,
  `nombremedico` varchar(100) collate latin1_general_ci NOT NULL,
  `emailmedico` varchar(50) collate latin1_general_ci default NULL,
  `descripcionmedico` text collate latin1_general_ci,
  PRIMARY KEY  (`idmedico`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `medico`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_analisis`
--

CREATE TABLE IF NOT EXISTS `orden_analisis` (
  `idorden` int(8) NOT NULL auto_increment,
  `idpaciente` int(8) default NULL,
  `idusuario` int(8) default NULL,
  `idmedico` int(8) default NULL,
  `numeroorden` int(11) NOT NULL,
  `fechaorden` date NOT NULL,
  `material` varchar(30) collate latin1_general_ci default NULL,
  `estadoorden` varchar(50) collate latin1_general_ci default NULL,
  `descripcionorden` text collate latin1_general_ci,
  PRIMARY KEY  (`idorden`),
  KEY `fk_relationship_1` (`idpaciente`),
  KEY `fk_relationship_9` (`idmedico`),
  KEY `fk_relationship_12` (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `orden_analisis`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `idpaciente` int(8) NOT NULL auto_increment,
  `idreserva` int(8) default NULL,
  `nombrepaciente` varchar(100) collate latin1_general_ci NOT NULL,
  `edadpaciente` int(11) default NULL,
  `sexopaciente` tinyint(1) default NULL,
  `telefonopaciente` int(11) default NULL,
  `descripcionpaciente` text collate latin1_general_ci,
  PRIMARY KEY  (`idpaciente`),
  KEY `fk_relationship_7` (`idreserva`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `paciente`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `idproveedor` int(8) NOT NULL auto_increment,
  `iddetalle` int(8) default NULL,
  `nombreproveedor` varchar(100) collate latin1_general_ci NOT NULL,
  `direccionproveedor` varchar(150) collate latin1_general_ci default NULL,
  `emailproveedor` varchar(50) collate latin1_general_ci default NULL,
  `telefonoproveedor` int(11) default NULL,
  `descripcionproveedor` text collate latin1_general_ci,
  PRIMARY KEY  (`idproveedor`),
  KEY `fk_relationship_10` (`iddetalle`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `proveedor`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `idreserva` int(8) NOT NULL auto_increment,
  `nombrereserva` varchar(50) collate latin1_general_ci NOT NULL,
  `fechareserva` date default NULL,
  PRIMARY KEY  (`idreserva`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `reserva`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categoria`
--

CREATE TABLE IF NOT EXISTS `sub_categoria` (
  `idsubcategoria` int(8) NOT NULL auto_increment,
  `idcategoria` int(8) default NULL,
  `nombresubcategoria` varchar(50) collate latin1_general_ci NOT NULL,
  `subfuerarango` float default NULL,
  `subdentrorango` float default NULL,
  `valorreferencia` decimal(8,0) default NULL,
  `descripcionsubcategoria` text collate latin1_general_ci,
  PRIMARY KEY  (`idsubcategoria`),
  KEY `fk_relationship_4` (`idcategoria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `sub_categoria`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(8) NOT NULL auto_increment,
  `nombreusuario` varchar(50) collate latin1_general_ci default NULL,
  `ciusuario` int(11) default NULL,
  `telefonousuario` int(11) default NULL,
  `login` varchar(50) collate latin1_general_ci NOT NULL,
  `password` varchar(50) collate latin1_general_ci NOT NULL,
  `tipousuario` int(11) NOT NULL,
  PRIMARY KEY  (`idusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombreusuario`, `ciusuario`, `telefonousuario`, `login`, `password`, `tipousuario`) VALUES
(1, 'paola hinojosa', NULL, NULL, 'andrea', 'f5b92f13ce6739b1715486b5434ef66d', 0);
