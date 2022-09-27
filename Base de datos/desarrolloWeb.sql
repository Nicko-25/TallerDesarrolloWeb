-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-09-2022 a las 02:30:42
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desarrolloWeb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla1`
--

CREATE TABLE `tabla1` (
  `id` int(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `telefono` bigint(200) NOT NULL,
  `codigo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla1`
--

INSERT INTO `tabla1` (`id`, `nombre`, `ciudad`, `telefono`, `codigo`) VALUES
(2, 'Andrea', 'Mocari', 3205951581, 222),
(34, 'Miguel', 'Barranquilla', 3205954875, 999),
(35, 'Jose', 'Monteria', 3205923875, 865);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla2`
--

CREATE TABLE `tabla2` (
  `id` int(20) NOT NULL,
  `codigo` int(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `correo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla2`
--

INSERT INTO `tabla2` (`id`, `codigo`, `nombre`, `apellido`, `fechaNacimiento`, `correo`) VALUES
(14, 222, 'Jennifer', 'Pestana', '2022-09-22', 'pestana@gmail.com'),
(17, 999, 'Dina', 'Almanza', '2022-09-14', 'fp@gmail.com'),
(18, 865, 'Angel', 'Taborda', '2022-09-15', 'ataborda@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla1`
--
ALTER TABLE `tabla1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `tabla2`
--
ALTER TABLE `tabla2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo` (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla1`
--
ALTER TABLE `tabla1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tabla2`
--
ALTER TABLE `tabla2`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tabla2`
--
ALTER TABLE `tabla2`
  ADD CONSTRAINT `tabla2_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `tabla1` (`codigo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
