-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2020 a las 19:56:34
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_notas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administrador`
--

CREATE TABLE `tbl_administrador` (
  `id_admin` int(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `pass_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`id_admin`, `email_admin`, `pass_admin`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin2@gmail.com', 'admin2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alumno`
--

CREATE TABLE `tbl_alumno` (
  `id_alumno` int(255) NOT NULL,
  `nombre_alumno` varchar(255) NOT NULL,
  `apellido_paterno` varchar(255) NOT NULL,
  `apellido_materno` varchar(255) NOT NULL,
  `grupo_alumno` varchar(255) NOT NULL,
  `email_alumno` varchar(255) NOT NULL,
  `pass_alumno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_alumno`
--

INSERT INTO `tbl_alumno` (`id_alumno`, `nombre_alumno`, `apellido_paterno`, `apellido_materno`, `grupo_alumno`, `email_alumno`, `pass_alumno`) VALUES
(20, 'Xavier', 'Jaramillo', 'Vives', 'DAW2', 'xavijvives@gmail.com', 'jaramillo'),
(21, 'Marta', 'Arroyo', 'Esparza', 'IntegracionSocial', 'marta@gmail.com', 'arroyo'),
(22, 'Aida', 'Jaramillo', 'Vives', 'Magisterio', 'aida@gmail.com', 'jaraida'),
(25, 'Montse', 'Vives', 'Cabello', 'Administrativa', 'montse@gmail.com', 'montse'),
(26, 'Javier', 'Jaramillo', 'Ibañez', 'Sanidad', 'fj.jaramillo@gmail.com', 'jaramillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_notas`
--

CREATE TABLE `tbl_notas` (
  `id_nota` int(255) NOT NULL,
  `nombre_asignatura` varchar(255) NOT NULL,
  `id_alumno` int(255) NOT NULL,
  `nota_alumno` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_notas`
--

INSERT INTO `tbl_notas` (`id_nota`, `nombre_asignatura`, `id_alumno`, `nota_alumno`) VALUES
(14, 'Mates', 20, 6),
(15, 'Fisica', 20, 8),
(16, 'Programacion', 20, 3),
(17, 'Mates', 21, 0),
(18, 'Fisica', 21, 0),
(19, 'Programacion', 21, 0),
(20, 'Mates', 22, 7),
(21, 'Fisica', 22, 6),
(22, 'Programacion', 22, 9),
(29, 'Mates', 25, 6),
(30, 'Fisica', 25, 7),
(31, 'Programacion', 25, 8),
(32, 'Mates', 26, 0),
(33, 'Fisica', 26, 0),
(34, 'Programacion', 26, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `tbl_alumno`
--
ALTER TABLE `tbl_alumno`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `tbl_notas`
--
ALTER TABLE `tbl_notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  MODIFY `id_admin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_alumno`
--
ALTER TABLE `tbl_alumno`
  MODIFY `id_alumno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tbl_notas`
--
ALTER TABLE `tbl_notas`
  MODIFY `id_nota` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_notas`
--
ALTER TABLE `tbl_notas`
  ADD CONSTRAINT `FK_NOTA_ALUMNO` FOREIGN KEY (`id_alumno`) REFERENCES `tbl_alumno` (`id_alumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
