-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2024 a las 23:08:28
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventary`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computo`
--

CREATE TABLE `computo` (
  `id_computo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id_item`, `item`, `date`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2024-09-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mobiliario`
--

CREATE TABLE `mobiliario` (
  `id_mobiliario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `activo` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mobiliario`
--

INSERT INTO `mobiliario` (`id_mobiliario`, `nombre`, `descripcion`, `tipo`, `estado`, `fecha_registro`, `activo`, `codigo`) VALUES
(1, 'Escritorio de madera', '2 metros x 2 metros ', 1, 1, '2023-03-20 13:01:15', 1, 'utp_mobil12'),
(2, 'Escritorio de madera', '4 metros x 4 metros ', 1, 2, '2023-04-21 11:01:19', 1, 'utp_mobil13'),
(3, 'Mesa', '1x1 metros', 1, 1, '2024-09-26 22:29:43', 1, 'UTP09MESA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apaterno` varchar(100) NOT NULL,
  `amaterno` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre`, `apaterno`, `amaterno`, `matricula`, `telefono`, `correo`) VALUES
(1, 'Dana', 'Monfil ', 'Rosales', 'UTP0153406', '2225139206', 'UTP0153406@GMAIL.COM'),
(2, 'Sandra', 'Neri ', 'Molina', 'UTP0149702', '2223771315', 'UTP0149702@GMAIL.COM'),
(3, 'Juan Pablo', 'Gomez', 'Leon', 'UTP0198765', '2223141689', 'Juanpablo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resguardo`
--

CREATE TABLE `resguardo` (
  `id_resguardo` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_mobiliario` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resguardo`
--

INSERT INTO `resguardo` (`id_resguardo`, `id_persona`, `id_mobiliario`, `fecha_asignacion`) VALUES
(0, 1, 1, '2023-04-21 11:01:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `edificio` varchar(100) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubicacion`, `edificio`, `departamento`, `area`) VALUES
(1, 'k5 ', 'TICS', 'laboratorio 104'),
(2, 'D5 ', 'TICS', 'laboratorio 211');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indices de la tabla `mobiliario`
--
ALTER TABLE `mobiliario`
  ADD PRIMARY KEY (`id_mobiliario`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `resguardo`
--
ALTER TABLE `resguardo`
  ADD PRIMARY KEY (`id_resguardo`),
  ADD KEY `id_mobiliario` (`id_mobiliario`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mobiliario`
--
ALTER TABLE `mobiliario`
  MODIFY `id_mobiliario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `resguardo`
--
ALTER TABLE `resguardo`
  ADD CONSTRAINT `resguardo_ibfk_1` FOREIGN KEY (`id_mobiliario`) REFERENCES `mobiliario` (`id_mobiliario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resguardo_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
