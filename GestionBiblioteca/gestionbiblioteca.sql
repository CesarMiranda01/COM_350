-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2023 a las 05:17:13
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
-- Base de datos: `gestionbiblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biblioteca`
--

CREATE TABLE `biblioteca` (
  `nombreBiblioteca` char(255) NOT NULL,
  `direccion` char(255) NOT NULL,
  `telefono` int(8) NOT NULL,
  `email` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `biblioteca`
--

INSERT INTO `biblioteca` (`nombreBiblioteca`, `direccion`, `telefono`, `email`) VALUES
('Biblioteca Virtual', 'Colon 126', 6443972, 'biblioVirtual@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busqueda`
--

CREATE TABLE `busqueda` (
  `idBusqueda` int(11) NOT NULL,
  `busquedas` varchar(200) NOT NULL,
  `numeroBusquedas` int(11) NOT NULL DEFAULT 1,
  `estado` tinyint(4) NOT NULL,
  `idLibro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `busqueda`
--

INSERT INTO `busqueda` (`idBusqueda`, `busquedas`, `numeroBusquedas`, `estado`, `idLibro`) VALUES
(1, 'La paloma heroe', 1, 1, NULL),
(2, 'a', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `idLibro` int(11) NOT NULL,
  `titulo` char(100) NOT NULL,
  `editorial` char(50) NOT NULL,
  `edicion` char(50) NOT NULL,
  `autor` char(255) NOT NULL,
  `favorito` tinyint(4) NOT NULL,
  `nombreBiblioteca` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`idLibro`, `titulo`, `editorial`, `edicion`, `autor`, `favorito`, `nombreBiblioteca`) VALUES
(1, 'Cien años de soledad', 'Santillana', 'Segunda', 'Gabriel García Márquez', 0, 'Biblioteca Virtual'),
(2, 'Un mundo feliz', 'Hoguera', 'Primera', 'Aldous Huxley', 0, 'Biblioteca Virtual'),
(3, 'Pulgarsito', 'Don Bosco', 'cuarto', 'Jhon Milan', 1, 'Biblioteca Virtual'),
(4, 'La noche fria', 'cherry', 'tercero', 'Francisco Paucar', 1, 'Biblioteca Virtual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libroprestado`
--

CREATE TABLE `libroprestado` (
  `prestado` tinyint(4) NOT NULL,
  `fechaPrestado` date NOT NULL,
  `fechaEntrega` date NOT NULL,
  `idLibro` int(11) NOT NULL,
  `ci` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libroprestado`
--

INSERT INTO `libroprestado` (`prestado`, `fechaPrestado`, `fechaEntrega`, `idLibro`, `ci`) VALUES
(1, '2023-09-01', '2023-09-21', 1, 8529001),
(1, '2023-09-05', '2023-09-18', 2, 5632480),
(1, '2023-09-03', '2023-09-15', 4, 8456234),
(1, '2023-09-11', '2023-09-27', 3, 5632009);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` int(8) NOT NULL,
  `nombres` char(255) NOT NULL,
  `apellidos` char(255) NOT NULL,
  `edad` int(2) NOT NULL,
  `password` char(255) NOT NULL,
  `privilegio` int(5) NOT NULL,
  `email` char(255) NOT NULL,
  `nombreBiblioteca` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombres`, `apellidos`, `edad`, `password`, `privilegio`, `email`, `nombreBiblioteca`) VALUES
(5632009, 'Xavier', 'Medina', 20, '123', 3, 'xaviersitomedina222@gmail.com', 'Biblioteca Virtual'),
(5632458, 'Alexander', 'Diaz', 21, '123', 1, 'alexddiazdiaz@gmail.com', 'Biblioteca Virtual'),
(5632480, 'Alexa', 'Barron', 24, '123', 3, 'alexabarron123@gmail.com', 'Biblioteca Virtual'),
(5637165, 'Gerson', 'Gutierrez', 32, '$2y$10$LDfDe.2WQpyZ/KeeuD1XT.TxSjsosL6ocAPaYwlrIgoftycuz67CK', 1, 'gutierrezmurillogerson@gmail.com', 'Biblioteca Virtual'),
(5986324, 'Joel', 'Yucra Mamani', 25, '123', 2, 'mamanijoel444@gmail.com', 'Biblioteca Virtual'),
(8456234, 'Juan', 'Perez', 21, '123', 3, 'perezjuan0001@gmail.com', 'Biblioteca Virtual'),
(8529001, 'Alejandra', 'Padilla', 23, '123', 3, 'alejandra123@gmail.com', 'Biblioteca Virtual'),
(8529207, 'Cesar', 'Miranda', 22, '$2y$10$LDfDe.2WQpyZ/KeeuD1XT.TxSjsosL6ocAPaYwlrIgoftycuz67CK', 1, 'miranda.gutierrez.cesaralvaro@usfx.bo', 'Biblioteca Virtual'),
(8529208, 'Rodrigo', 'Molina', 22, '123', 1, 'molina.rodrigo@usfx.bo', 'Biblioteca Virtual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `nombre` varchar(100) NOT NULL,
  `ci` int(25) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `privilegio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`nombre`, `ci`, `contrasena`, `privilegio`) VALUES
('cesar', 8529207, '123', 1),
('cesar', 8529208, '123', 2),
('cesar', 8529209, '123', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`nombreBiblioteca`);

--
-- Indices de la tabla `busqueda`
--
ALTER TABLE `busqueda`
  ADD PRIMARY KEY (`idBusqueda`),
  ADD KEY `idlibro` (`idLibro`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `nombreBiblioteca` (`nombreBiblioteca`);

--
-- Indices de la tabla `libroprestado`
--
ALTER TABLE `libroprestado`
  ADD KEY `ci` (`ci`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`),
  ADD KEY `nombreBiblioteca` (`nombreBiblioteca`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `busqueda`
--
ALTER TABLE `busqueda`
  MODIFY `idBusqueda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `busqueda`
--
ALTER TABLE `busqueda`
  ADD CONSTRAINT `busqueda_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`nombreBiblioteca`) REFERENCES `biblioteca` (`nombreBiblioteca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libroprestado`
--
ALTER TABLE `libroprestado`
  ADD CONSTRAINT `libroprestado_ibfk_1` FOREIGN KEY (`ci`) REFERENCES `persona` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libroprestado_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`nombreBiblioteca`) REFERENCES `biblioteca` (`nombreBiblioteca`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
