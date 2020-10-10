-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2019 a las 15:53:42
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `si_visitantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
`id` int(11) NOT NULL,
  `cod_area` int(11) NOT NULL,
  `desc_area` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `cod_area`, `desc_area`) VALUES
(1, 1, 'Mantenimiento'),
(2, 2, 'Almacen'),
(3, 3, 'Edif. Administrativo'),
(4, 4, 'Administración'),
(5, 5, 'CCO'),
(6, 6, 'Transporte Subterráneo'),
(10, 7, 'Estacionamiento Visitantes'),
(14, 8, 'Auditorio'),
(15, 9, 'Presidencia'),
(16, 10, 'Centro de Información'),
(17, 11, 'Serivicio Médico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas2`
--

CREATE TABLE IF NOT EXISTS `areas2` (
  `id` int(11) NOT NULL,
  `cod_area` int(11) NOT NULL,
  `desc_area` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas2`
--

INSERT INTO `areas2` (`id`, `cod_area`, `desc_area`) VALUES
(1, 1, 'Almacén'),
(2, 2, 'TIM'),
(3, 3, 'Puerta 1'),
(4, 4, 'Puerta 2'),
(5, 5, 'Puerta 3'),
(6, 6, 'Centro de Información'),
(10, 7, 'Administración'),
(11, 8, 'CCO'),
(12, 9, 'Sede'),
(13, 10, 'CCS'),
(14, 11, 'CCF'),
(15, 12, 'Estacionamiento Ejecutivo'),
(16, 13, 'Estacionamiento Visitantes'),
(17, 14, 'Estacionamiento CCO'),
(18, 15, 'Área de Anclaje'),
(19, 16, 'Paso de Nivel'),
(20, 17, 'Taller de Transporte Superficial'),
(21, 18, 'Boca de Túnel'),
(22, 19, 'STP'),
(23, 20, 'Monumental'),
(24, 21, 'Ferias'),
(25, 22, 'Palotal'),
(26, 23, 'Santa Rosa'),
(27, 24, 'Michelena'),
(28, 25, 'Lara'),
(29, 26, 'Cedeño'),
(30, 27, 'Urdaneta'),
(31, 28, 'Miranda'),
(32, 29, 'Fuera de las instalaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aut_mar`
--

CREATE TABLE IF NOT EXISTS `aut_mar` (
`id` int(11) NOT NULL,
  `cod_mar` int(11) NOT NULL,
  `tip_mar` varchar(200) NOT NULL,
  `tip` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aut_mar`
--

INSERT INTO `aut_mar` (`id`, `cod_mar`, `tip_mar`, `tip`) VALUES
(2, 1, 'Chevrolet', 2),
(3, 2, 'Ford', 2),
(4, 3, 'Renault', 2),
(5, 4, 'Mitsubishi', 2),
(6, 5, 'Toyota', 2),
(7, 6, 'Fiat', 2),
(8, 7, 'Hyundai', 2),
(9, 8, 'Volkswagen', 2),
(10, 9, 'Arauca', 2),
(11, 10, 'Daewoo', 2),
(12, 11, 'Orinoco', 2),
(13, 12, 'Dodge', 2),
(14, 13, 'Jeep', 2),
(15, 14, 'Chrysler', 2),
(16, 15, 'Mercedes Benz', 2),
(17, 16, 'BMW', 2),
(18, 17, 'Civetchi', 2),
(19, 18, 'Honda', 2),
(20, 19, 'Izusu', 2),
(21, 20, 'Mazda', 2),
(22, 21, 'Kia', 2),
(23, 22, 'Nissan', 2),
(24, 23, 'Peugeot', 2),
(25, 24, 'Daihatsu', 2),
(26, 25, 'Otro Sedan', 2),
(27, 26, 'Honda', 3),
(28, 27, 'Kawasaki', 3),
(29, 28, 'Unico', 3),
(30, 29, 'Skygo', 3),
(31, 30, 'Yamaha', 3),
(32, 31, 'Susuki', 3),
(33, 32, 'Otra Moto', 3),
(34, 33, 'Renault', 4),
(35, 34, 'Fiat', 4),
(36, 35, 'Hyundai', 4),
(37, 36, 'Volkswagen', 4),
(38, 37, 'Jeep', 4),
(39, 38, 'Chrysler', 4),
(40, 39, 'Chrysler', 4),
(41, 40, 'Chevrolet', 4),
(42, 41, 'Ford', 4),
(43, 42, 'Toyota', 4),
(44, 43, 'Dodge', 4),
(45, 44, 'Civetchi', 4),
(46, 45, 'Susuki', 4),
(47, 46, 'Daihatsu', 4),
(48, 47, 'Nissan', 4),
(49, 48, 'Otra camioneta', 4),
(50, 49, 'Blue Bird', 5),
(51, 50, 'Yutong', 5),
(52, 51, 'Encava', 5),
(53, 52, 'Mercedes Benz', 5),
(54, 53, 'Volvo', 5),
(55, 54, 'Iveco', 5),
(56, 55, 'Man', 5),
(57, 56, 'Civetchi', 5),
(58, 57, 'Otro Autobus', 5),
(59, 58, 'Chevrolet', 6),
(60, 59, 'Ford', 6),
(61, 60, 'Toyota', 6),
(62, 61, 'Dodge', 6),
(63, 62, 'Civetchi', 6),
(64, 63, 'Jac', 6),
(65, 64, 'Yutong', 6),
(66, 65, 'Man', 6),
(67, 66, 'Volvo', 6),
(68, 67, 'Nissan', 6),
(69, 68, 'izusu', 6),
(70, 69, 'Otro Camion', 6),
(71, 70, 'Mack', 7),
(72, 71, 'Iveco', 7),
(73, 72, 'Man', 7),
(74, 73, 'Jac', 7),
(75, 74, 'kenworth', 7),
(76, 75, 'Mercedes Benz', 7),
(77, 76, 'Daf', 7),
(78, 77, 'Otra Gandola', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aut_mar2`
--

CREATE TABLE IF NOT EXISTS `aut_mar2` (
`id` int(11) NOT NULL,
  `cod_mar` int(11) NOT NULL,
  `tip_mar` varchar(200) NOT NULL,
  `tip` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aut_mar2`
--

INSERT INTO `aut_mar2` (`id`, `cod_mar`, `tip_mar`, `tip`) VALUES
(1, 1, 'Chevrolet', 1),
(2, 2, 'Ford', 1),
(3, 3, 'Renault', 1),
(4, 4, 'Mitsubishi', 1),
(5, 5, 'Toyota', 1),
(6, 6, 'Fiat', 1),
(7, 7, 'Hyundai', 1),
(8, 8, 'Volkswagen', 1),
(9, 9, 'Arauca', 1),
(10, 10, 'Daewoo', 1),
(11, 11, 'Orinoco', 1),
(12, 12, 'Yutong', 1),
(13, 13, 'Dodge', 1),
(14, 14, 'Jeep', 1),
(15, 15, 'Chrysler', 1),
(19, 17, 'Bera', 2),
(20, 18, 'Empire', 2),
(21, 19, 'Honda', 2),
(22, 20, 'Kawasaki', 2),
(23, 21, 'Unico', 2),
(24, 22, 'Skygo', 2),
(25, 23, 'Yamaha', 2),
(16, 16, 'Otro Vehiculo', 1),
(26, 24, 'Otra Moto', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carnet`
--

CREATE TABLE IF NOT EXISTS `carnet` (
`id` int(11) NOT NULL,
  `cod_car` varchar(11) NOT NULL,
  `tip_car` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carnet`
--

INSERT INTO `carnet` (`id`, `cod_car`, `tip_car`, `estado`) VALUES
(1, 'V001', 'visitante', 1),
(2, 'V002', 'visitante', 1),
(3, 'V003', 'visitante', 1),
(4, 'V004', 'visitante', 1),
(5, 'V005', 'visitante', 1),
(6, 'V006', 'visitante', 1),
(7, 'V007', 'visitante', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_obj`
--

CREATE TABLE IF NOT EXISTS `cat_obj` (
`id` int(11) NOT NULL,
  `cat_obj` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_obj`
--

INSERT INTO `cat_obj` (`id`, `cat_obj`) VALUES
(1, 'C.A. Metro de Valencia'),
(2, 'Empleados C.A. Metro de Valencia'),
(3, 'Visitantes C.A. Metro de Valencia'),
(4, 'Contratados C.A. Metro de Valencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE IF NOT EXISTS `color` (
`id` int(11) NOT NULL,
  `cod_veh` int(11) NOT NULL,
  `cod_col` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `cod_veh`, `cod_col`) VALUES
(1, 1, 'Blanco'),
(2, 2, 'Azul'),
(3, 3, 'Rojo'),
(4, 4, 'Verde'),
(5, 5, 'Amarillo'),
(6, 6, 'Naranja'),
(7, 7, 'Negro'),
(8, 8, 'Gris'),
(9, 9, 'Plateado'),
(10, 10, 'Vinotinto'),
(11, 11, 'Beige'),
(12, 12, 'Rosado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_obj`
--

CREATE TABLE IF NOT EXISTS `mov_obj` (
`id` int(11) NOT NULL,
  `tip_mov` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mov_obj`
--

INSERT INTO `mov_obj` (`id`, `tip_mov`) VALUES
(1, 'Entrada'),
(2, 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
`id` int(11) NOT NULL,
  `cod_nivel` int(11) NOT NULL,
  `desc_nivel` varchar(300) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id`, `cod_nivel`, `desc_nivel`) VALUES
(1, 1, 'Super Administrador'),
(2, 2, 'Administrador'),
(3, 3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetos`
--

CREATE TABLE IF NOT EXISTS `objetos` (
`id` int(11) NOT NULL,
  `nom_obj` varchar(30) NOT NULL,
  `cod_int` varchar(100) NOT NULL,
  `cat_obj` varchar(30) NOT NULL,
  `ser_obj` varchar(100) NOT NULL,
  `mar_obj` text NOT NULL,
  `mod_obj` varchar(30) NOT NULL,
  `ndb_obj` int(11) NOT NULL,
  `des_obj` varchar(50) NOT NULL,
  `pro_obj` text NOT NULL,
  `com_obj` varchar(50) NOT NULL,
  `est_obj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables_obj`
--

CREATE TABLE IF NOT EXISTS `responsables_obj` (
`id` int(11) NOT NULL,
  `cdv_int` varchar(100) NOT NULL,
  `cod_int` varchar(100) NOT NULL,
  `cod_vis` varchar(100) NOT NULL,
  `ced_res` int(11) NOT NULL,
  `nya_res` text NOT NULL,
  `tip_per` int(11) NOT NULL,
  `pro_res` varchar(150) NOT NULL,
  `ent_obj` int(11) NOT NULL,
  `sal_obj` int(11) NOT NULL,
  `dst_obj` varchar(100) NOT NULL,
  `coment_sal` varchar(100) NOT NULL,
  `hor_reg` varchar(100) NOT NULL,
  `fec_reg` date NOT NULL,
  `hor_sal` varchar(100) NOT NULL,
  `fec_sal` date NOT NULL,
  `fec_de_reg` datetime NOT NULL,
  `fec_de_sal` datetime NOT NULL,
  `ced_seg` int(11) NOT NULL,
  `est_obj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sel_opc`
--

CREATE TABLE IF NOT EXISTS `sel_opc` (
  `id` int(11) NOT NULL,
  `sel_opc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sel_opc`
--

INSERT INTO `sel_opc` (`id`, `sel_opc`) VALUES
(0, 'NO'),
(1, 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdv`
--

CREATE TABLE IF NOT EXISTS `tdv` (
`id` int(11) NOT NULL,
  `cod_tipovisita` int(11) NOT NULL,
  `desc_tipovisita` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tdv`
--

INSERT INTO `tdv` (`id`, `cod_tipovisita`, `desc_tipovisita`) VALUES
(1, 1, 'Personal'),
(2, 2, 'Laboral'),
(3, 3, 'Comercial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_per`
--

CREATE TABLE IF NOT EXISTS `tip_per` (
`id` int(11) NOT NULL,
  `tip_per` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tip_per`
--

INSERT INTO `tip_per` (`id`, `tip_per`) VALUES
(1, 'Empleado'),
(2, 'Contratado'),
(3, 'Comisión de Servicios'),
(4, 'Externo'),
(5, 'Honorarios Profesionales'),
(6, 'Pasantes'),
(7, 'Servicios Prestados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_pro`
--

CREATE TABLE IF NOT EXISTS `tip_pro` (
`id` int(11) NOT NULL,
  `cod_propietario` varchar(11) NOT NULL,
  `desc_propietario` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tip_pro`
--

INSERT INTO `tip_pro` (`id`, `cod_propietario`, `desc_propietario`) VALUES
(1, 'M', 'Metro'),
(2, 'T', 'Trabajador'),
(3, 'C', 'Contratista'),
(4, 'P', 'Proveedor'),
(5, 'O', 'Oficial'),
(6, 'V', 'Visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` smallint(5) unsigned NOT NULL,
  `usuario` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `clave` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `cedula` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nombre` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `apellido` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `gerencia` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `cedula`, `nombre`, `apellido`, `gerencia`, `nivel`) VALUES
(22, 'lasv', '3b712de48137572f3849aabd5666a4e3', '24290349', 'Luis Alfredo', 'Sarabia Valera', 13, 1),
(24, 'jvillegas', '3b712de48137572f3849aabd5666a4e3', '20729220', 'José Antonio', 'Villegas Hernández', 22, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
`id` int(11) NOT NULL,
  `cod_veh` int(11) NOT NULL,
  `tip_veh` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `cod_veh`, `tip_veh`) VALUES
(1, 0, 'No'),
(2, 2, 'Sedan'),
(3, 3, 'Moto'),
(4, 4, 'Camioneta'),
(5, 5, 'Autobús'),
(6, 6, 'Camión'),
(7, 7, 'Gandola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitantes`
--

CREATE TABLE IF NOT EXISTS `visitantes` (
`id` int(11) NOT NULL,
  `cod_vis` varchar(50) NOT NULL,
  `cedula` int(8) NOT NULL,
  `nom_ape` text NOT NULL,
  `tip_per` int(11) NOT NULL,
  `ced_emp` varchar(100) NOT NULL,
  `tip_vis` int(11) NOT NULL,
  `are_vis` int(11) NOT NULL,
  `fec_ent` date NOT NULL,
  `hor_ent` varchar(100) NOT NULL,
  `hor_fv` varchar(100) NOT NULL,
  `fec_sal` date NOT NULL,
  `hor_sal` varchar(100) NOT NULL,
  `obs_vis` text NOT NULL,
  `ced_seg` varchar(100) NOT NULL,
  `carnet` int(11) NOT NULL,
  `ent_cnt` int(11) NOT NULL,
  `proc` varchar(200) NOT NULL,
  `vehiculo` text NOT NULL,
  `placa` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `color` text NOT NULL,
  `obs_veh` varchar(200) NOT NULL,
  `met_reg` int(11) NOT NULL,
  `met_act` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visitantes`
--

INSERT INTO `visitantes` (`id`, `cod_vis`, `cedula`, `nom_ape`, `tip_per`, `ced_emp`, `tip_vis`, `are_vis`, `fec_ent`, `hor_ent`, `hor_fv`, `fec_sal`, `hor_sal`, `obs_vis`, `ced_seg`, `carnet`, `ent_cnt`, `proc`, `vehiculo`, `placa`, `marca`, `color`, `obs_veh`, `met_reg`, `met_act`) VALUES
(1, 'VIS-MTV-00001', 24290349, 'Luis Alfredo  Sarabia Valera', 1, '15490625', 1, 9, '2018-03-14', '02:10:35 P.M.', '10:00 A.M.', '2018-09-20', '09:56:24 A.M.', 'hi', '20729220', 1, 1, 'por hay', '0', '', '', '', '', 0, 0),
(2, 'VIS-MTV-00002', 24290349, 'Luis Alfredo  Sarabia Valera', 1, '15746348', 1, 1, '2018-03-20', '01:15:42 P.M.', '10:00 A.M.', '2018-09-20', '09:54:54 A.M.', 'hi', '20729220', 7, 1, 'scscsc', '0', '', '', '', '', 0, 0),
(3, 'VIS-MTV-00003', 24290349, 'Luis Alfredo  Sarabia Valera', 1, '22205292', 1, 0, '2018-03-20', '01:18:18 P.M.', '', '0000-00-00', '', 'scacs', '20729220', 1, 0, 'cscs', '0', '', '', '', '', 0, 0),
(5, 'VIS-MTV-00004', 24290349, 'Luis Alfredo  Sarabia Valera', 1, '15337872', 1, 2, '2018-03-20', '01:57:33 P.M.', '08:18 A.M.', '2018-12-06', '08:18:40 A.M.', 'cscscs', '20729220', 2, 1, 'sdvdvdv', '0', '', '', '', '', 0, 0),
(6, 'VIS-MTV-00005', 24290349, 'Luis Alfredo  Sarabia Valera', 1, '21030563', 1, 1, '2018-03-20', '02:00:05 P.M.', '10:00 A.M.', '2018-09-20', '09:57:57 A.M.', 'cs', '20729220', 3, 1, '', '0', '', '', '', '', 0, 0),
(9, 'VIS-MTV-00006', 24290349, 'Luis Alfredo  Sarabia Valera', 1, '21030563', 1, 1, '2018-03-20', '02:00:54 P.M.', '08:17 A.M.', '2018-12-06', '08:18:00 A.M.', 'dvdv', '20729220', 4, 1, 'dvsdvsdv', '0', '', '', '', '', 0, 0),
(10, '', 0, '', 0, '', 0, 0, '0000-00-00', '', '', '0000-00-00', '', '', '', 0, 0, '', '', '', '', '', '', 0, 0),
(11, 'VIS-MTV-00007', 24290349, 'Luis Alfredo  Sarabia Valera', 1, '15746348', 1, 5, '2018-07-18', '08:13:07 A.M.', '08:18 A.M.', '2018-12-06', '08:18:54 A.M.', 'hi', '20729220', 5, 1, 'bnbbn', '0', '', '', '', '', 0, 0),
(12, 'VIS-MTV-00008', 24290349, 'Luis Alfredo  Sarabia Valera', 1, '15746348', 1, 1, '2018-11-27', '03:54:56 P.M.', '08:18 A.M.', '2018-12-06', '08:18:18 A.M.', '', '24290349', 1, 1, 'MI CASA', '0', '', '', '', '', 0, 0),
(13, 'VIS-MTV-00009', 24290349, 'Luis Alfredo Sanabria Valera', 6, '17665786', 1, 1, '2018-12-06', '08:39:28 A.M.', '09:56 A.M.', '2018-12-06', '09:56:36 A.M.', 'ninguna', '24290349', 1, 1, 'Boqueron', '2', 'AA001', '4', 'Verde', 'ninguna', 0, 0),
(14, 'VIS-MTV-00010', 24290349, 'Luis Alfredo Sanabria Valera', 6, '15337872', 1, 1, '2018-12-06', '09:53:27 A.M.', '09:53 A.M.', '2018-12-06', '09:53:50 A.M.', 'hi', '24290349', 2, 1, 'por hay', '0', '', '', '', '', 0, 0),
(15, 'VIS-MTV-00011', 15746348, 'Belkys De Lourdes Parra RodrÃ­guez', 1, '21215222', 1, 1, '2018-12-06', '09:57:55 A.M.', '09:59 A.M.', '2018-12-06', '09:59:32 A.M.', 'hi', '24290349', 1, 1, '', '0', '', '', '', '', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aut_mar`
--
ALTER TABLE `aut_mar`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aut_mar2`
--
ALTER TABLE `aut_mar2`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carnet`
--
ALTER TABLE `carnet`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cat_obj`
--
ALTER TABLE `cat_obj`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mov_obj`
--
ALTER TABLE `mov_obj`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `objetos`
--
ALTER TABLE `objetos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cod_int` (`cod_int`);

--
-- Indices de la tabla `responsables_obj`
--
ALTER TABLE `responsables_obj`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cdv_int` (`cdv_int`);

--
-- Indices de la tabla `sel_opc`
--
ALTER TABLE `sel_opc`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tdv`
--
ALTER TABLE `tdv`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tip_per`
--
ALTER TABLE `tip_per`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tip_pro`
--
ALTER TABLE `tip_pro`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visitantes`
--
ALTER TABLE `visitantes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cod_vis` (`cod_vis`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `aut_mar`
--
ALTER TABLE `aut_mar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de la tabla `aut_mar2`
--
ALTER TABLE `aut_mar2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `carnet`
--
ALTER TABLE `carnet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `cat_obj`
--
ALTER TABLE `cat_obj`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `mov_obj`
--
ALTER TABLE `mov_obj`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `objetos`
--
ALTER TABLE `objetos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `responsables_obj`
--
ALTER TABLE `responsables_obj`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tdv`
--
ALTER TABLE `tdv`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `tip_per`
--
ALTER TABLE `tip_per`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tip_pro`
--
ALTER TABLE `tip_pro`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `visitantes`
--
ALTER TABLE `visitantes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
