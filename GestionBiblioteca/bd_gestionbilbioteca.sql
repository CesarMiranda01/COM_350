-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2023 a las 05:24:01
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
-- Base de datos: `bd_gestionbilbioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busqueda`
--

CREATE TABLE `busqueda` (
  `idbusqueda` int(11) NOT NULL,
  `busquedas` varchar(200) NOT NULL,
  `numerobusquedas` int(11) NOT NULL DEFAULT 1,
  `estado` tinyint(4) NOT NULL,
  `idlibro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `nombre` varchar(100) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `celular` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `titulo` varchar(100) NOT NULL,
  `idlibro` int(11) NOT NULL,
  `editorial` varchar(100) NOT NULL,
  `edicion` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `favorito` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla_principal';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_prestados`
--

CREATE TABLE `libros_prestados` (
  `prestado` tinyint(4) NOT NULL,
  `fecha_prestado` date NOT NULL,
  `idlibro` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `busqueda`
--
ALTER TABLE `busqueda`
  ADD PRIMARY KEY (`idbusqueda`),
  ADD KEY `idlibro` (`idlibro`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idlibro`);

--
-- Indices de la tabla `libros_prestados`
--
ALTER TABLE `libros_prestados`
  ADD KEY `idlibro` (`idlibro`),
  ADD KEY `idcliente` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `busqueda`
--
ALTER TABLE `busqueda`
  MODIFY `idbusqueda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idlibro` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `busqueda`
--
ALTER TABLE `busqueda`
  ADD CONSTRAINT `busqueda_ibfk_1` FOREIGN KEY (`idlibro`) REFERENCES `libros` (`idlibro`);

--
-- Filtros para la tabla `libros_prestados`
--
ALTER TABLE `libros_prestados`
  ADD CONSTRAINT `libros_prestados_ibfk_1` FOREIGN KEY (`idlibro`) REFERENCES `libros` (`idlibro`),
  ADD CONSTRAINT `libros_prestados_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
