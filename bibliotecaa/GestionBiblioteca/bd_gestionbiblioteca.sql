-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2023 a las 14:05:18
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
-- Base de datos: `bd_gestionbiblioteca`
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
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `celular` int(11) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`nombres`, `apellidos`, `idcliente`, `direccion`, `celular`, `contrasena`) VALUES
('Jhamil', 'Diaz', 123, 'zona campero', 56897423, '1213'),
('carlos', 'terrazas', 159, 'plaza campero nro 54', 5698748, '159'),
('Pablo ', 'Gomez', 321, 'cercania al puente', 65893248, '321'),
('liz', 'paucar', 369, 'plaza campero nro 54', 98653248, '369'),
('Ovidio', 'Paucar', 456, 'plaza campero nro 54', 65984832, '456'),
('Benito', 'Choque', 789, 'hospital  ases', 98654723, '789'),
('CESAR ALVARO ', 'MIRANDA GUTIERREZ', 8529, 'Mercado Campesino', 63776985, '8529');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `nombres` varchar(100) NOT NULL,
  `ci` int(11) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `celular` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`nombres`, `ci`, `apellidos`, `celular`, `direccion`, `fecha_nacimiento`, `cargo`, `nivel`, `contrasena`) VALUES
('gerson', 5632458, 'gutierrez murillo', 96324587, 'cerca a facultad tecnologia', '2000-10-10', 'manager of foreign relasionship', 1, '123'),
('cesar', 5632489, 'miranda gutierrez', 63776985, 'cerca a plaza reloj', '2000-10-10', 'master', 1, '123'),
('juan', 5986324, 'perez', 85623548, 'en todas partes', '2014-08-12', 'secretario', 2, '321'),
('rodrigo', 8456321, 'Molina', 65324507, 'proximaciones a facultad de tecnologia', '2000-10-10', 'manager of bunisess', 1, '123');

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
  `favorito` tinyint(4) NOT NULL,
  `prestado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla_principal';

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`titulo`, `idlibro`, `editorial`, `edicion`, `autor`, `favorito`, `prestado`) VALUES
('Pulgarsito', 123, 'Don Bosco.', '2do', 'Romel Rojas', 0, 1),
('Internet de las cosas', 147, 'CHERRY', '5ft', 'Rolando Zanchez', 1, 0),
('INTRODUCCION A LA PROGRAMACION ORIENTADA A OBJETOS.', 159, 'AICheI', '3rd', 'Marcos de la Quintana', 1, 1),
('Introduction to Python', 456, 'Usfx', '1st', 'Walter Pacheco', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_prestados`
--

CREATE TABLE `libros_prestados` (
  `fecha_prestamo` date NOT NULL,
  `idlibro` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libros_prestados`
--

INSERT INTO `libros_prestados` (`fecha_prestamo`, `idlibro`, `fecha_entrega`, `idcliente`) VALUES
('2023-08-28', 123, '2023-10-31', 123);

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
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`ci`);

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
  MODIFY `idbusqueda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idlibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

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
