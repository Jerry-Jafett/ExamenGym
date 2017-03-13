-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2017 a las 07:47:22
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gymlocochon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `Id_alumnos` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Apellido_paterno` varchar(10) NOT NULL,
  `Apellido_materno` varchar(10) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Domicilio` varchar(50) NOT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Celular` int(11) DEFAULT NULL,
  `Fecha_inscripcion` date DEFAULT NULL,
  `Tutor` varchar(40) DEFAULT NULL,
  `Id_disciplina` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`Id_alumnos`, `Nombre`, `Apellido_paterno`, `Apellido_materno`, `Edad`, `Domicilio`, `Telefono`, `Celular`, `Fecha_inscripcion`, `Tutor`, `Id_disciplina`) VALUES
(5, 'mierda', ' seca', ' aguada', 13, ' asdasd', 123, 321, '2017-03-22', 'dsfsdf', 1),
(6, 'Beny', ' Alfa', ' Bravo', 18, ' Calle casa num', 0, 0, '2017-03-17', 'sdfsd', 2),
(7, 'Beny', ' Alfa', ' Bravo', 18, ' Calle casa num', 0, 0, '2017-03-22', 'jfdjg dfg', 4),
(8, 'Beny', ' Alfa', ' Bravo', 18, ' Calle casa num', 0, 0, '2017-03-21', 'hjsdjhdfshj', 5),
(9, 'Beny', ' Alfa', ' Bravo', 18, ' Calle casa num', 0, 0, '2017-03-12', 'dsdf vv v', 6),
(10, '1', ' 1', ' 1', 1, ' 1', 1, 1, '0001-01-01', ' 1', 3),
(12, '2', ' 2', ' 2', 2, ' 2', 2, 2, '0002-02-02', ' 2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE IF NOT EXISTS `clases` (
  `Id_clase` int(11) NOT NULL,
  `Id_disciplina` int(11) NOT NULL,
  `Id_horario` int(11) NOT NULL,
  `Id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `Id_disciplina` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `disciplina`
--

INSERT INTO `disciplina` (`Id_disciplina`, `Nombre`) VALUES
(1, 'Fitness Cross'),
(2, 'TRX'),
(3, 'Insanity'),
(4, 'Bellydance'),
(5, 'Ballet'),
(6, 'Yoga'),
(7, 'Taekwondo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `Id_horarios` int(11) NOT NULL,
  `Id_maestro` int(11) NOT NULL,
  `Id_sucursal` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1126 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`Id_horarios`, `Id_maestro`, `Id_sucursal`, `id_disciplina`) VALUES
(1, 9, 9, 9),
(4, 1, 1, 1),
(5, 1, 1, 1),
(1123, 99, 9999, 999),
(1124, 99, 9999, 999),
(1125, 3, 4, 555555555);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE IF NOT EXISTS `maestros` (
  `Id_maestro` int(11) NOT NULL,
  `Nombre` varchar(10) NOT NULL,
  `Apellido_paterno` varchar(15) NOT NULL,
  `Apellido_materno` varchar(15) NOT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Celular` int(11) NOT NULL,
  `RFC` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`Id_maestro`, `Nombre`, `Apellido_paterno`, `Apellido_materno`, `Telefono`, `Celular`, `RFC`) VALUES
(1, 'nom', 'papa', 'mama', 1231, 0, 'RFCASDASDASD'),
(2, 'pedro', 'pica', 'pierda', 123, 345, 'adasdRFCLOKO'),
(3, 'ddgdg', 'bnbn', 'bvnbnm', 1234, 456789, 'asdsf454678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prospectos`
--

CREATE TABLE IF NOT EXISTS `prospectos` (
  `Id_prospectos` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Apellido_paterno` varchar(10) NOT NULL,
  `Apellido_materno` varchar(10) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Domicilio` varchar(50) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Celulcar` int(11) NOT NULL,
  `Tutor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_entrante`
--

CREATE TABLE IF NOT EXISTS `recibos_entrante` (
  `Id_reciboE` int(11) NOT NULL,
  `Id_alumno` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recibos_entrante`
--

INSERT INTO `recibos_entrante` (`Id_reciboE`, `Id_alumno`, `Cantidad`, `Fecha`) VALUES
(1, 10, 1, '0001-01-01'),
(2, 7, 500, '2017-12-31'),
(4, 11, 2, '0002-02-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_saliente`
--

CREATE TABLE IF NOT EXISTS `recibos_saliente` (
  `Id_reciboS` int(11) NOT NULL,
  `Id_maestro` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recibos_saliente`
--

INSERT INTO `recibos_saliente` (`Id_reciboS`, `Id_maestro`, `Cantidad`, `Fecha`) VALUES
(1, 1, 600, '2016-12-01'),
(2, 3, 600, '2010-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE IF NOT EXISTS `sucursales` (
  `Nombre` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`Nombre`, `Direccion`, `Telefono`, `Id_sucursal`) VALUES
('Santa Anita', 'Av. Santa Anita #254', 458741852, 1),
('Trojes', 'Av. Trojes de Alonso #741', 458963852, 2),
('Miradores', 'Av. Miradores de las Culturas #852', 458196325, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidades`
--

CREATE TABLE IF NOT EXISTS `universidades` (
  `Id_universidad` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`Id_alumnos`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`Id_clase`);

--
-- Indices de la tabla `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`Id_disciplina`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`Id_horarios`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`Id_maestro`);

--
-- Indices de la tabla `prospectos`
--
ALTER TABLE `prospectos`
  ADD PRIMARY KEY (`Id_prospectos`);

--
-- Indices de la tabla `recibos_entrante`
--
ALTER TABLE `recibos_entrante`
  ADD PRIMARY KEY (`Id_reciboE`);

--
-- Indices de la tabla `recibos_saliente`
--
ALTER TABLE `recibos_saliente`
  ADD PRIMARY KEY (`Id_reciboS`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`Id_sucursal`);

--
-- Indices de la tabla `universidades`
--
ALTER TABLE `universidades`
  ADD PRIMARY KEY (`Id_universidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `Id_alumnos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `Id_clase` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `Id_disciplina` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `Id_horarios` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1126;
--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `Id_maestro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `prospectos`
--
ALTER TABLE `prospectos`
  MODIFY `Id_prospectos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recibos_entrante`
--
ALTER TABLE `recibos_entrante`
  MODIFY `Id_reciboE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `recibos_saliente`
--
ALTER TABLE `recibos_saliente`
  MODIFY `Id_reciboS` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `Id_sucursal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `universidades`
--
ALTER TABLE `universidades`
  MODIFY `Id_universidad` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
