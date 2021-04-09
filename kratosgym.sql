-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2021 a las 23:31:59
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kratosgym`
--
CREATE DATABASE IF NOT EXISTS `kratosgym` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kratosgym`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasecolectiva`
--

CREATE TABLE `clasecolectiva` (
  `cod_clase` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clasecolectiva`
--

INSERT INTO `clasecolectiva` (`cod_clase`, `nombre`, `capacidad`) VALUES
(1, 'Clase1', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `cod_ejercicio` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`cod_ejercicio`, `nombre`, `descripcion`) VALUES
(1, 'Ejer1', 'EjerDesc1'),
(2, 'Ejer2', 'EjerDesc2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientos`
--

CREATE TABLE `entrenamientos` (
  `cod_entrenamiento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrenamientos`
--

INSERT INTO `entrenamientos` (`cod_entrenamiento`, `nombre`, `descripcion`) VALUES
(1, 'Entrena1', 'DescEntrena1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamientos_ejercicios`
--

CREATE TABLE `entrenamientos_ejercicios` (
  `codigoEE` int(11) NOT NULL,
  `cod_entrenamiento` int(11) NOT NULL,
  `cod_ejercicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrenamientos_ejercicios`
--

INSERT INTO `entrenamientos_ejercicios` (`codigoEE`, `cod_entrenamiento`, `cod_ejercicio`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cod_clase` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `nombre`, `cod_clase`) VALUES
(2, 'Agustin', NULL),
(3, 'Juan Antonio', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ejercicio`
--

CREATE TABLE `usuario_ejercicio` (
  `codigoUE` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_ejercicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_ejercicio`
--

INSERT INTO `usuario_ejercicio` (`codigoUE`, `cod_usuario`, `cod_ejercicio`) VALUES
(1, 2, 1),
(2, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasecolectiva`
--
ALTER TABLE `clasecolectiva`
  ADD PRIMARY KEY (`cod_clase`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`cod_ejercicio`);

--
-- Indices de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  ADD PRIMARY KEY (`cod_entrenamiento`);

--
-- Indices de la tabla `entrenamientos_ejercicios`
--
ALTER TABLE `entrenamientos_ejercicios`
  ADD PRIMARY KEY (`codigoEE`),
  ADD KEY `cod_entrenamiento` (`cod_entrenamiento`,`cod_ejercicio`),
  ADD KEY `cod_ejercicio` (`cod_ejercicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD UNIQUE KEY `cod_clase` (`cod_clase`);

--
-- Indices de la tabla `usuario_ejercicio`
--
ALTER TABLE `usuario_ejercicio`
  ADD PRIMARY KEY (`codigoUE`),
  ADD KEY `cod_usuario` (`cod_usuario`,`cod_ejercicio`),
  ADD KEY `cod_ejercicio` (`cod_ejercicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clasecolectiva`
--
ALTER TABLE `clasecolectiva`
  MODIFY `cod_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `cod_ejercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entrenamientos`
--
ALTER TABLE `entrenamientos`
  MODIFY `cod_entrenamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entrenamientos_ejercicios`
--
ALTER TABLE `entrenamientos_ejercicios`
  MODIFY `codigoEE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario_ejercicio`
--
ALTER TABLE `usuario_ejercicio`
  MODIFY `codigoUE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrenamientos_ejercicios`
--
ALTER TABLE `entrenamientos_ejercicios`
  ADD CONSTRAINT `entrenamientos_ejercicios_ibfk_1` FOREIGN KEY (`cod_ejercicio`) REFERENCES `ejercicios` (`cod_ejercicio`),
  ADD CONSTRAINT `entrenamientos_ejercicios_ibfk_2` FOREIGN KEY (`cod_entrenamiento`) REFERENCES `entrenamientos` (`cod_entrenamiento`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`cod_clase`) REFERENCES `clasecolectiva` (`cod_clase`);

--
-- Filtros para la tabla `usuario_ejercicio`
--
ALTER TABLE `usuario_ejercicio`
  ADD CONSTRAINT `usuario_ejercicio_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`),
  ADD CONSTRAINT `usuario_ejercicio_ibfk_2` FOREIGN KEY (`cod_ejercicio`) REFERENCES `ejercicios` (`cod_ejercicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
