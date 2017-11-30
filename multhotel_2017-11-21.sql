-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.21-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para multhotel
CREATE DATABASE IF NOT EXISTS `multhotel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `multhotel`;

-- Volcando estructura para tabla multhotel.mlt_cliente
CREATE TABLE IF NOT EXISTS `mlt_cliente` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nombre` varchar(80) DEFAULT NULL,
  `cli_apellido` varchar(80) DEFAULT NULL,
  `cli_dni` varchar(10) DEFAULT NULL,
  `cli_sexo` tinyint(1) DEFAULT NULL,
  `cli_empresa` varchar(80) DEFAULT NULL,
  `cli_ciudad` varchar(50) DEFAULT NULL,
  `cli_pais` varchar(50) DEFAULT NULL,
  `cli_codigopostal` varchar(20) DEFAULT NULL,
  `cli_fechanacimiento` date DEFAULT NULL,
  `cli_telefono` int(15) DEFAULT NULL,
  `cli_email` varchar(80) DEFAULT NULL,
  `cli_pass` varchar(250) DEFAULT NULL,
  `cli_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_cliente` DISABLE KEYS */;
INSERT INTO `mlt_cliente` (`cli_id`, `cli_nombre`, `cli_apellido`, `cli_dni`, `cli_sexo`, `cli_empresa`, `cli_ciudad`, `cli_pais`, `cli_codigopostal`, `cli_fechanacimiento`, `cli_telefono`, `cli_email`, `cli_pass`, `cli_estado`) VALUES
	(1, 'NESTOR', 'VEGA', '123', 1, 'ASD', 'TACNA', 'PERU', 'TCQ10', '2017-10-18', 564132, 'NVEGA@HOTMAIL.COM', '123456', 1),
	(2, 'ARTUROLAS', 'CHAVEZ', '72472748', 1, 'GOOGLE', 'TACNA', 'PILU', 'TCQ10', '1992-07-14', 564, 'ARTUROLAS@HOTMAIL.COM', '123456', 1);
/*!40000 ALTER TABLE `mlt_cliente` ENABLE KEYS */;

-- Volcando estructura para tabla multhotel.mlt_cuenta
CREATE TABLE IF NOT EXISTS `mlt_cuenta` (
  `cue_id` int(11) NOT NULL AUTO_INCREMENT,
  `hot_id` int(11) DEFAULT NULL,
  `cli_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `cue_fechainicio` datetime DEFAULT NULL,
  `cue_fechafin` datetime DEFAULT NULL,
  `cue_pagado` tinyint(1) DEFAULT NULL,
  `cue_monto_total` double(8,2) DEFAULT NULL,
  `cue_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cue_id`),
  KEY `hot_id` (`hot_id`),
  KEY `cli_id` (`cli_id`),
  KEY `emp_id` (`emp_id`),
  CONSTRAINT `mlt_cuenta_ibfk_1` FOREIGN KEY (`hot_id`) REFERENCES `mlt_hotel` (`hot_id`),
  CONSTRAINT `mlt_cuenta_ibfk_2` FOREIGN KEY (`cli_id`) REFERENCES `mlt_cliente` (`cli_id`),
  CONSTRAINT `mlt_cuenta_ibfk_3` FOREIGN KEY (`emp_id`) REFERENCES `mlt_empleado` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_cuenta: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_cuenta` DISABLE KEYS */;
INSERT INTO `mlt_cuenta` (`cue_id`, `hot_id`, `cli_id`, `emp_id`, `cue_fechainicio`, `cue_fechafin`, `cue_pagado`, `cue_monto_total`, `cue_estado`) VALUES
	(1, 1, 1, 1, '2017-10-10 00:00:00', '2017-10-11 00:00:00', 0, 0.00, 1),
	(2, 3, 2, 4, '2017-10-31 00:00:00', '2017-11-02 00:00:00', 1, 0.00, 1),
	(3, 3, 2, 4, '2017-10-31 00:00:00', '2017-11-01 00:00:00', 1, 0.00, 1),
	(4, 3, 2, 4, '2017-10-31 00:00:00', '2017-11-01 00:00:00', 1, 0.00, 1),
	(5, 3, 2, 4, '2017-10-31 00:00:00', '2017-11-02 00:00:00', 1, 0.00, 1);
/*!40000 ALTER TABLE `mlt_cuenta` ENABLE KEYS */;

-- Volcando estructura para tabla multhotel.mlt_cuenta_detalle
CREATE TABLE IF NOT EXISTS `mlt_cuenta_detalle` (
  `dcu_id` int(11) NOT NULL AUTO_INCREMENT,
  `cue_id` int(11) DEFAULT NULL,
  `ext_id` int(11) DEFAULT NULL,
  `dcu_cantidad` decimal(8,2) DEFAULT NULL,
  `dcu_preciounitario` decimal(8,2) DEFAULT NULL,
  `dcu_total` decimal(8,2) DEFAULT NULL,
  `dcu_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`dcu_id`),
  KEY `cue_id` (`cue_id`),
  KEY `ext_id` (`ext_id`),
  CONSTRAINT `mlt_cuenta_detalle_ibfk_1` FOREIGN KEY (`cue_id`) REFERENCES `mlt_cuenta` (`cue_id`),
  CONSTRAINT `mlt_cuenta_detalle_ibfk_2` FOREIGN KEY (`ext_id`) REFERENCES `mlt_extras` (`ext_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_cuenta_detalle: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_cuenta_detalle` DISABLE KEYS */;
INSERT INTO `mlt_cuenta_detalle` (`dcu_id`, `cue_id`, `ext_id`, `dcu_cantidad`, `dcu_preciounitario`, `dcu_total`, `dcu_estado`) VALUES
	(1, 2, 2, 3.00, 3.00, 9.00, 1);
/*!40000 ALTER TABLE `mlt_cuenta_detalle` ENABLE KEYS */;

-- Volcando estructura para tabla multhotel.mlt_empleado
CREATE TABLE IF NOT EXISTS `mlt_empleado` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `hot_id` int(11) DEFAULT NULL,
  `emp_nombre` varchar(80) DEFAULT NULL,
  `emp_apellido` varchar(80) DEFAULT NULL,
  `emp_dni` varchar(10) DEFAULT NULL,
  `emp_sexo` tinyint(1) DEFAULT NULL,
  `emp_ciudad` varchar(50) DEFAULT NULL,
  `emp_pais` varchar(50) DEFAULT NULL,
  `emp_codigopostal` varchar(20) DEFAULT NULL,
  `emp_fechanacimiento` date DEFAULT NULL,
  `emp_telefono` int(15) DEFAULT NULL,
  `emp_email` varchar(80) DEFAULT NULL,
  `emp_fechacontrato` date DEFAULT NULL,
  `emp_usuario` varchar(80) DEFAULT NULL,
  `emp_pass` varchar(250) DEFAULT NULL,
  `emp_cargo` tinyint(1) DEFAULT NULL,
  `emp_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `hot_id` (`hot_id`),
  CONSTRAINT `mlt_empleado_ibfk_1` FOREIGN KEY (`hot_id`) REFERENCES `mlt_hotel` (`hot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_empleado: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_empleado` DISABLE KEYS */;
INSERT INTO `mlt_empleado` (`emp_id`, `hot_id`, `emp_nombre`, `emp_apellido`, `emp_dni`, `emp_sexo`, `emp_ciudad`, `emp_pais`, `emp_codigopostal`, `emp_fechanacimiento`, `emp_telefono`, `emp_email`, `emp_fechacontrato`, `emp_usuario`, `emp_pass`, `emp_cargo`, `emp_estado`) VALUES
	(1, 1, 'ADMIN', 'ADMIN', '12345678', 1, 'ADMIN', 'ADMIN', 'ADMIN', '2017-10-18', 123456789, 'ADMIN', '2017-10-18', 'webmaster', '123456', 0, 1),
	(2, 1, 'GERENTE', 'GERENTE', '72472748', 1, 'GERENTE', 'GERENTE', 'GERENTE', '1992-07-14', 99999, 'GERENTE', '2017-01-01', 'gerente', '123456', 0, 1),
	(3, 3, 'NESTOR', 'VEGA', '654654', 0, 'TACNA', 'PERU', 'TCQ10', '1994-01-01', 123456, 'nvega@gmail.com', '2017-01-01', 'recepcionista', '123456', 2, 1),
	(4, 3, 'ADMINISTRADOR', 'ADMINISTRADOR', '654', 1, 'TACNA', 'PERU', 'TCQ10', '2017-10-28', 12365465, 'asda@gmail.com', '2017-10-28', 'administrador', '123456', 1, 1);
/*!40000 ALTER TABLE `mlt_empleado` ENABLE KEYS */;

-- Volcando estructura para tabla multhotel.mlt_extras
CREATE TABLE IF NOT EXISTS `mlt_extras` (
  `ext_id` int(11) NOT NULL AUTO_INCREMENT,
  `hot_id` int(11) DEFAULT NULL,
  `ext_nombre` varchar(80) DEFAULT NULL,
  `ext_descripcion` text,
  `ext_precio` decimal(8,2) DEFAULT NULL,
  `ext_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ext_id`),
  KEY `hot_id` (`hot_id`),
  CONSTRAINT `mlt_extras_ibfk_1` FOREIGN KEY (`hot_id`) REFERENCES `mlt_hotel` (`hot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_extras: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_extras` DISABLE KEYS */;
INSERT INTO `mlt_extras` (`ext_id`, `hot_id`, `ext_nombre`, `ext_descripcion`, `ext_precio`, `ext_estado`) VALUES
	(2, 3, 'HAMBURGUESA CON QUESO', 'CARNE SELECCIONADA', 21.00, 1),
	(3, 2, 'KILOMETRICO', 'SANGUCHE GIGANTE', 500.00, 1);
/*!40000 ALTER TABLE `mlt_extras` ENABLE KEYS */;

-- Volcando estructura para tabla multhotel.mlt_habitacion
CREATE TABLE IF NOT EXISTS `mlt_habitacion` (
  `hab_id` int(11) NOT NULL AUTO_INCREMENT,
  `hot_id` int(11) DEFAULT NULL,
  `hab_nombre` varchar(50) DEFAULT NULL,
  `hab_imagen` varchar(255) DEFAULT NULL,
  `hab_precio` decimal(8,2) DEFAULT NULL,
  `hab_ocupacion` tinyint(1) DEFAULT NULL,
  `hab_descripcion` text,
  `hab_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`hab_id`),
  KEY `hot_id` (`hot_id`),
  CONSTRAINT `mlt_habitacion_ibfk_1` FOREIGN KEY (`hot_id`) REFERENCES `mlt_hotel` (`hot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_habitacion: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_habitacion` DISABLE KEYS */;
INSERT INTO `mlt_habitacion` (`hab_id`, `hot_id`, `hab_nombre`, `hab_imagen`, `hab_precio`, `hab_ocupacion`, `hab_descripcion`, `hab_estado`) VALUES
	(3, 3, 'CUADRUPLE', '0', 600.00, 0, 'ENTRAN 4 PERSONAS COMODAMENTE', 1),
	(5, 3, 'porongapi', '0', 22.00, 0, 'adasdasd', 1),
	(6, 3, 'dooosh', '1', 50.00, 1, 'asd', 1),
	(7, 2, 'OTRA HABITACION', '0', 500.00, 1, 'ASD', 1);
/*!40000 ALTER TABLE `mlt_habitacion` ENABLE KEYS */;

-- Volcando estructura para tabla multhotel.mlt_habitacion_facilitys
CREATE TABLE IF NOT EXISTS `mlt_habitacion_facilitys` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `hab_id` int(11) DEFAULT NULL,
  `fac_nombre` varchar(50) DEFAULT NULL,
  `fac_imagen` varchar(255) DEFAULT NULL,
  `fac_descripcion` text,
  `fac_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`fac_id`),
  KEY `hab_id` (`hab_id`),
  CONSTRAINT `mlt_habitacion_facilitys_ibfk_1` FOREIGN KEY (`hab_id`) REFERENCES `mlt_habitacion` (`hab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_habitacion_facilitys: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_habitacion_facilitys` DISABLE KEYS */;
INSERT INTO `mlt_habitacion_facilitys` (`fac_id`, `hab_id`, `fac_nombre`, `fac_imagen`, `fac_descripcion`, `fac_estado`) VALUES
	(1, 3, 'Acceso Piscina  ASDASDASDASD', '0', 'asdasdasdasd', 1),
	(4, 3, 'uyuuuuu', '0', 'dfdfd', 1);
/*!40000 ALTER TABLE `mlt_habitacion_facilitys` ENABLE KEYS */;

-- Volcando estructura para tabla multhotel.mlt_hotel
CREATE TABLE IF NOT EXISTS `mlt_hotel` (
  `hot_id` int(11) NOT NULL AUTO_INCREMENT,
  `idi_id` int(11) DEFAULT NULL,
  `hot_nombre` varchar(80) DEFAULT NULL,
  `hot_direccion` varchar(255) DEFAULT NULL,
  `hot_ciudad` varchar(50) DEFAULT NULL,
  `hot_pais` varchar(50) DEFAULT NULL,
  `hot_ejex` varchar(20) DEFAULT NULL,
  `hot_ejey` varchar(20) DEFAULT NULL,
  `hot_email` varchar(80) DEFAULT NULL,
  `hot_telefono` int(15) DEFAULT NULL,
  `hot_estrellas` tinyint(1) DEFAULT NULL,
  `hot_imagen` varchar(255) DEFAULT NULL,
  `hot_descripcion` text,
  `hot_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`hot_id`),
  KEY `idi_id` (`idi_id`),
  CONSTRAINT `mlt_hotel_ibfk_1` FOREIGN KEY (`idi_id`) REFERENCES `mlt_idioma` (`idi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_hotel: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_hotel` DISABLE KEYS */;
INSERT INTO `mlt_hotel` (`hot_id`, `idi_id`, `hot_nombre`, `hot_direccion`, `hot_ciudad`, `hot_pais`, `hot_ejex`, `hot_ejey`, `hot_email`, `hot_telefono`, `hot_estrellas`, `hot_imagen`, `hot_descripcion`, `hot_estado`) VALUES
	(1, 1, 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', '0', '0', 'ADMIN', 123456, 5, '0', 'ADMIN', 1),
	(2, 2, 'HOTEL ARTUROLAS', 'PIURA CON CORONEL MENDOZA', 'TACNA', 'PERU', '0', '0', 'asd@asd.com', 123, 5, '0', '2222', 1),
	(3, 3, 'HOTEL PELUCA INN', 'URBANIZACION TACNA1', 'TACNA', 'PAIS', '0', '0', 'PELUCA@GMAIL.COM', 987654321, 3, '0', 'asdasd', 1);
/*!40000 ALTER TABLE `mlt_hotel` ENABLE KEYS */;

-- Volcando estructura para tabla multhotel.mlt_hotel_servicios
CREATE TABLE IF NOT EXISTS `mlt_hotel_servicios` (
  `seh_id` int(11) NOT NULL AUTO_INCREMENT,
  `hot_id` int(11) DEFAULT NULL,
  `seh_nombre` varchar(80) DEFAULT NULL,
  `seh_imagen` varchar(255) DEFAULT NULL,
  `seh_descripcion` text,
  `seh_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`seh_id`),
  KEY `hot_id` (`hot_id`),
  CONSTRAINT `mlt_hotel_servicios_ibfk_1` FOREIGN KEY (`hot_id`) REFERENCES `mlt_hotel` (`hot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_hotel_servicios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_hotel_servicios` DISABLE KEYS */;
INSERT INTO `mlt_hotel_servicios` (`seh_id`, `hot_id`, `seh_nombre`, `seh_imagen`, `seh_descripcion`, `seh_estado`) VALUES
	(2, 2, 'TRAGO', '0', 'MUCHO MAS TRAGOOO', 1),
	(3, 2, 'SPA', '0', 'SPA LAS 24 HORAS DEL DIA', 1),
	(4, 3, 'GIMNASION 123', '0', 'GINMASIO LAS 24 HORAS', 1);
/*!40000 ALTER TABLE `mlt_hotel_servicios` ENABLE KEYS */;

-- Volcando estructura para tabla multhotel.mlt_idioma
CREATE TABLE IF NOT EXISTS `mlt_idioma` (
  `idi_id` int(11) NOT NULL AUTO_INCREMENT,
  `idi_nombre` varchar(50) DEFAULT NULL,
  `idi_abreviatura` varchar(3) DEFAULT NULL,
  `idi_descripcion` varchar(100) DEFAULT NULL,
  `idi_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_idioma: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_idioma` DISABLE KEYS */;
INSERT INTO `mlt_idioma` (`idi_id`, `idi_nombre`, `idi_abreviatura`, `idi_descripcion`, `idi_estado`) VALUES
	(1, 'ESPANOL', 'ESP', 'IDIOMA ESPANOL', 1),
	(2, 'INGLES', 'ING', 'INGLES NORTEAMERICANO', 1),
	(3, 'FRANCES', 'FRA', 'FRANCES DE FRANCIA :V ', 1);
/*!40000 ALTER TABLE `mlt_idioma` ENABLE KEYS */;

-- Volcando estructura para tabla multhotel.mlt_planing
CREATE TABLE IF NOT EXISTS `mlt_planing` (
  `pla_id` int(11) NOT NULL AUTO_INCREMENT,
  `hab_id` int(11) DEFAULT NULL,
  `cli_id` int(11) DEFAULT NULL,
  `pla_fecha` date DEFAULT NULL,
  `pla_tipo` tinyint(1) DEFAULT NULL,
  `pla_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`pla_id`),
  KEY `hab_id` (`hab_id`),
  KEY `cli_id` (`cli_id`),
  CONSTRAINT `mlt_planing_ibfk_1` FOREIGN KEY (`hab_id`) REFERENCES `mlt_habitacion` (`hab_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_planing: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_planing` DISABLE KEYS */;
/*!40000 ALTER TABLE `mlt_planing` ENABLE KEYS */;

-- Volcando estructura para tabla multhotel.mlt_reserva
CREATE TABLE IF NOT EXISTS `mlt_reserva` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `hot_id` int(11) DEFAULT NULL,
  `hab_id` int(11) DEFAULT NULL,
  `cli_id` int(11) DEFAULT NULL,
  `res_fechainicio` date DEFAULT NULL,
  `res_fechafin` date DEFAULT NULL,
  `res_nombrebanco` varchar(80) DEFAULT NULL,
  `res_numerotransaccion` int(11) DEFAULT NULL,
  `res_adelanto` varchar(11) DEFAULT NULL,
  `res_pago` tinyint(1) DEFAULT NULL,
  `res_recepcionadopago` tinyint(1) DEFAULT NULL,
  `res_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`res_id`),
  KEY `hot_id` (`hot_id`),
  KEY `hab_id` (`hab_id`),
  KEY `cli_id` (`cli_id`),
  CONSTRAINT `mlt_reserva_ibfk_1` FOREIGN KEY (`hot_id`) REFERENCES `mlt_hotel` (`hot_id`),
  CONSTRAINT `mlt_reserva_ibfk_2` FOREIGN KEY (`hab_id`) REFERENCES `mlt_habitacion` (`hab_id`),
  CONSTRAINT `mlt_reserva_ibfk_3` FOREIGN KEY (`cli_id`) REFERENCES `mlt_cliente` (`cli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla multhotel.mlt_reserva: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `mlt_reserva` DISABLE KEYS */;
INSERT INTO `mlt_reserva` (`res_id`, `hot_id`, `hab_id`, `cli_id`, `res_fechainicio`, `res_fechafin`, `res_nombrebanco`, `res_numerotransaccion`, `res_adelanto`, `res_pago`, `res_recepcionadopago`, `res_estado`) VALUES
	(1, 2, 3, 1, NULL, NULL, 'PAYPAL', 56564654, '888.00', 1, 1, 1),
	(2, 3, 5, 1, NULL, NULL, 'PAYPAL', 123, '1123', 1, 1, 1);
/*!40000 ALTER TABLE `mlt_reserva` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
