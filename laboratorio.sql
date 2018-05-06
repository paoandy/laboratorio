-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2013 a las 23:45:18
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `laboratorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `IDCATEGORIA` int(8) NOT NULL AUTO_INCREMENT,
  `IDSECCION` int(11) NOT NULL,
  `NOMBRECATEGORIA` varchar(50) NOT NULL,
  `COSTO` float NOT NULL,
  `DESCRIPCIONCATEGORIA` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`IDCATEGORIA`),
  KEY `FK_SECCION_CATEGORIA` (`IDSECCION`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IDCATEGORIA`, `IDSECCION`, `NOMBRECATEGORIA`, `COSTO`, `DESCRIPCIONCATEGORIA`) VALUES
(1, 1, 'Glicemia', 30, ''),
(2, 1, 'Hemoglobina Glicosilada', 10, 'Consta del conteo de globulos rojos'),
(3, 2, 'Colesterol', 50, 'Analisis del porcentaje de colesterol en sangre'),
(4, 3, 'Fosfata Alcalina', 25, 'Analisis del porcentaje de fosfato en sangre'),
(9, 1, 'urea', 20, ''),
(5, 1, 'glicemia', 15, 'azucar en la sangre'),
(6, 1, 'hemoglobina glucosidada', 15, 'nivel de emoglobina en sangre'),
(7, 1, 'creatinina', 20, ''),
(8, 1, 'acido urico', 25, ''),
(10, 1, 'N urico', 15, ''),
(11, 2, 'Colesterol', 30, ''),
(12, 2, 'Trigliceridos', 15, ''),
(13, 2, 'HDL Colesterol', 10, 'colesterol  en sangre'),
(14, 2, 'LDL colesterol', 10, 'colesterol  en sangre'),
(15, 2, 'VLDL', 20, 'colesterol  en sangre'),
(16, 3, 'fosfata alcalina', 10, ''),
(17, 3, 'GOT', 20, ''),
(18, 3, 'GPT', 20, ''),
(19, 3, 'Bilirrubina Directa', 10, ''),
(20, 3, 'Bilirrubina Total', 10, ''),
(21, 3, 'proteinas totales', 30, ''),
(22, 3, 'Albuminas', 20, ''),
(23, 3, 'gloobulina', 20, ''),
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
(35, 10, 'hemoglobina', 45, 'nivel de globulos rojos en sangre'),
(36, 10, 'hematrocitos', 35, 'nivel de globulos rojos en sangre'),
(37, 10, 'plaquetas', 20, 'numero de plaquetas en seccion de globulos'),
(38, 10, 'Leucocitos', 5, 'cantidad de globulos blancos en sangre'),
(39, 11, 'cayados', 12, ''),
(40, 11, 'segmentados', 15, ''),
(41, 11, 'linfocitos', 15, ''),
(42, 11, 'Monocitos', 20, ''),
(43, 11, 'eosinofilos', 20, ''),
(44, 11, 'basofilos', 10, ''),
(45, 12, 'primera hora', 10, ''),
(46, 12, 'segunda hora', 15, '2da hora'),
(47, 12, 'I k', 5, '1ra hora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro`
--

CREATE TABLE IF NOT EXISTS `cobro` (
  `IDCOBRO` int(8) NOT NULL AUTO_INCREMENT,
  `IDORDEN` int(11) NOT NULL,
  `FECHA` datetime NOT NULL,
  `CANTIDAD` float NOT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`IDCOBRO`),
  KEY `FK_ORDEN_COSTO` (`IDORDEN`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cobro`
--

INSERT INTO `cobro` (`IDCOBRO`, `IDORDEN`, `FECHA`, `CANTIDAD`, `DESCRIPCION`) VALUES
(1, 1, '2013-05-23 09:32:04', 0, 'Primer Cobro'),
(2, 2, '2013-05-23 09:34:08', 35.5, 'Adelanto Pagado, Saldo 20Bs'),
(3, 3, '2013-05-23 09:34:43', 20, 'Saldo Cancelado'),
(4, 3, '2013-05-23 09:35:28', 100, 'Motivo de adelanto, saldo 50Bs.'),
(5, 2, '2013-05-23 09:35:39', 50, 'Total Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE IF NOT EXISTS `insumo` (
  `IDINSUMO` int(8) NOT NULL AUTO_INCREMENT,
  `IDORDEN` int(11) NOT NULL,
  `IDPROVEEDOR` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `FECHA` datetime NOT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`IDINSUMO`),
  KEY `FK_INSUMO_PROVEEDOR` (`IDPROVEEDOR`),
  KEY `FK_ORDEN_INSUMO` (`IDORDEN`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`IDINSUMO`, `IDORDEN`, `IDPROVEEDOR`, `NOMBRE`, `FECHA`, `DESCRIPCION`) VALUES
(1, 0, 0, 'Reactivos', '0000-00-00 00:00:00', 'Para el analisis de Rutina'),
(2, 1, 0, 'Material A', '0000-00-00 00:00:00', 'Para Rutina'),
(3, 2, 1, 'Material A', '0000-00-00 00:00:00', ''),
(4, 1, 1, 'Insumo A', '2013-05-23 00:00:00', 'Poca cantidad'),
(5, 1, 1, 'Reactivo C', '2013-05-23 00:00:00', 'Usado apra hemoglobina '),
(6, 2, 1, 'ReactvivoB', '2013-05-23 20:31:35', 'Descric'),
(7, 2, 1, 'asd', '2013-05-23 08:32:09', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE IF NOT EXISTS `medico` (
  `IDMEDICO` int(8) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(1024) NOT NULL,
  PRIMARY KEY (`IDMEDICO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`IDMEDICO`, `NOMBRE`, `EMAIL`, `TELEFONO`) VALUES
(1, 'Juan Perez', 'prueba@prueba.com', '4123456'),
(2, 'Fernado Nogales', 'fernandonogales@gmail.com', '4123456'),
(3, 'Patricia Soliz', 'patriciasoliz@gmail.com', '4123456'),
(4, 'Pedro Garcia', 'garcia@gmail.com', '4123456'),
(5, 'Maria Peredo', 'peredo@gmail.com', '4123456'),
(6, 'Martha Aguilar', 'aguilar@gmail.com', '4123456'),
(7, 'Daniel Peredo', 'peredo@gmail.com', '4123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE IF NOT EXISTS `orden` (
  `IDORDEN` int(8) NOT NULL AUTO_INCREMENT,
  `IDUSUARIO` int(11) NOT NULL,
  `IDMEDICO` int(11) NOT NULL,
  `IDPACIENTE` int(11) NOT NULL,
  `FECHAPEDIDO` datetime NOT NULL,
  `DESCRIPCIONORDEN` varchar(1024) DEFAULT NULL,
  `MATERIAL` varchar(255) DEFAULT NULL,
  `ESTADO` int(1) DEFAULT NULL,
  `FECHAENTREGA` date DEFAULT NULL,
  `TOTAL` float NOT NULL,
  `SALDO` float NOT NULL,
  PRIMARY KEY (`IDORDEN`),
  KEY `FK_MEDICO_ORDEN` (`IDMEDICO`),
  KEY `FK_ORDEN_PACIENTE` (`IDPACIENTE`),
  KEY `FK_USUARIO_ORDEN` (`IDUSUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`IDORDEN`, `IDUSUARIO`, `IDMEDICO`, `IDPACIENTE`, `FECHAPEDIDO`, `DESCRIPCIONORDEN`, `MATERIAL`, `ESTADO`, `FECHAENTREGA`, `TOTAL`, `SALDO`) VALUES
(1, 4, 1, 1, '2013-05-14 09:00:00', 'Analisis de Rutina', 'Sangre', 0, NULL, 30, 30),
(2, 4, 2, 9, '2013-05-14 14:00:00', 'Analisis de Rutina', 'Sangre', 0, NULL, 20, 20),
(3, 4, 3, 10, '2013-05-14 16:30:00', 'N/A', 'Sangre', 1, NULL, 100, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `IDPACIENTE` int(8) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO` varchar(20) NOT NULL,
  `EDAD` int(11) NOT NULL,
  `SEXO` varchar(1) NOT NULL,
  `TELEFONO` varchar(1024) NOT NULL,
  `DESCRIPCION` varchar(1024) NOT NULL,
  PRIMARY KEY (`IDPACIENTE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`IDPACIENTE`, `NOMBRE`, `APELLIDO`, `EDAD`, `SEXO`, `TELEFONO`, `DESCRIPCION`) VALUES
(10, 'Jose', 'Gonzales', 45, 'M', '4560638', ''),
(9, 'Marcela', 'Sainz', 18, 'F', '44264456', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `IDPROVEEDOR` int(8) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `DIRECCION` varchar(150) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(1024) DEFAULT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`IDPROVEEDOR`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IDPROVEEDOR`, `NOMBRE`, `DIRECCION`, `EMAIL`, `TELEFONO`, `DESCRIPCION`) VALUES
(1, 'Inti', 'Quillacollo', 'inti@inti.com', '4123456', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango`
--

CREATE TABLE IF NOT EXISTS `rango` (
  `IDRANGO` int(8) NOT NULL AUTO_INCREMENT,
  `IDCATEGORIA` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  `MINIMO` float DEFAULT NULL,
  `MAXIMO` float DEFAULT NULL,
  `UNIDAD` varchar(5) NOT NULL,
  PRIMARY KEY (`IDRANGO`),
  KEY `FK_RANGO_CATEGORIA` (`IDCATEGORIA`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `rango`
--

INSERT INTO `rango` (`IDRANGO`, `IDCATEGORIA`, `NOMBRE`, `DESCRIPCION`, `MINIMO`, `MAXIMO`, `UNIDAD`) VALUES
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
(43, 45, 'hombre en condiciones normales', 'hombre en condiciones normales  independiente de edad', 0, 20, 'mm'),
(44, 36, 'Mujer En COndiciones Normales', NULL, 1, 5, 'mg'),
(45, 36, 'Adulto Con Diabetes', NULL, 1, 10, 'mg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE IF NOT EXISTS `resultado` (
  `IDRESULTADO` int(8) NOT NULL AUTO_INCREMENT,
  `IDRANGO` int(11) DEFAULT NULL,
  `IDORDEN` int(11) NOT NULL,
  `IDCATEGORIA` int(11) NOT NULL,
  `RESULTADO` float DEFAULT NULL,
  `DESCRIPCION` varchar(1024) DEFAULT NULL,
  `COSTO` float NOT NULL,
  PRIMARY KEY (`IDRESULTADO`),
  KEY `FK_ORDEN_RESULTADO` (`IDORDEN`),
  KEY `FK_RESULTADO_CATEGORIA` (`IDCATEGORIA`),
  KEY `FK_RESULTADO_RANGO` (`IDRANGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`IDRESULTADO`, `IDRANGO`, `IDORDEN`, `IDCATEGORIA`, `RESULTADO`, `DESCRIPCION`, `COSTO`) VALUES
(1, NULL, 1, 30, NULL, NULL, 10),
(2, NULL, 1, 31, NULL, NULL, 10),
(3, NULL, 1, 32, NULL, NULL, 10),
(4, 30, 2, 31, 0, 'wd', 10),
(5, NULL, 2, 32, NULL, NULL, 10),
(6, 33, 3, 35, 12, '', 45),
(7, 34, 3, 36, 23, 'Todo Ok!', 35),
(8, 35, 3, 37, 40, 'ok!', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `IDSECCION` int(8) NOT NULL AUTO_INCREMENT,
  `NOMBRESECCION` varchar(50) NOT NULL,
  PRIMARY KEY (`IDSECCION`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`IDSECCION`, `NOMBRESECCION`) VALUES
(1, 'Quimica Sanguinea'),
(2, 'Perfil Lipidico'),
(3, 'Perfil Hepatico'),
(7, 'Hormonas'),
(8, 'perfil reumatoide'),
(9, 'Electrolitos'),
(10, 'Hemograma'),
(11, 'Recuento diferencial'),
(12, 'VES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `IDUSUARIO` int(8) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO` varchar(50) NOT NULL,
  `CI` int(11) NOT NULL,
  `TELEFONO` varchar(1024) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `TIPOUSUARIO` int(11) NOT NULL,
  PRIMARY KEY (`IDUSUARIO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDUSUARIO`, `NOMBRE`, `APELLIDO`, `CI`, `TELEFONO`, `EMAIL`, `LOGIN`, `PASSWORD`, `TIPOUSUARIO`) VALUES
(1, 'diego', 'landa', 4529947, '4281228', '', 'diego', '.diego', 0),
(2, 'Administrador', 'Administrador', 1234567, '', '', 'admin', '.admin', 0),
(4, 'Secretaria', 'Secretaria', 1234567, '4281228', '', 'secretaria', '.secretaria', 1),
(5, 'tecnico', 'tecnico', 1234567, '4281228', '', 'tecnico', '.tecnico', 2),
(8, 'Paola', 'Escobar', 4538881, '4426440', 'paolaandrehe@gmail.com', 'andrea', 'secretaria', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
