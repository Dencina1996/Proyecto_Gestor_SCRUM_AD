-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-11-2018 a las 17:32:35
-- Versión del servidor: 5.7.23-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `BD_Scrum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Especificaciones`
--

CREATE TABLE `Especificaciones` (
  `ID_Especificacion` int(11) NOT NULL,
  `Nombre_Especificacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_Proyecto` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Sprint` int(11) NOT NULL,
  `Descripcion_Especificacion` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Duracion_Especificacion` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Dificultad_Especificacion` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Estado_Especificacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupos`
--

CREATE TABLE `Grupos` (
  `ID_Grupo` int(11) NOT NULL,
  `Nombre_Grupo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_Proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proyectos`
--

CREATE TABLE `Proyectos` (
  `ID_Proyecto` int(11) NOT NULL,
  `Nombre_Proyecto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Inicio_Proyecto` date NOT NULL,
  `Fecha_Final_Proyecto` date NOT NULL,
  `Descripcion_Proyecto` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sprints`
--

CREATE TABLE `Sprints` (
  `ID_Sprint` int(11) NOT NULL,
  `Nombre_Sprint` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_Proyecto` int(11) NOT NULL,
  `Fecha_Inicio_Sprint` date NOT NULL,
  `Fecha_Final_Sprint` date NOT NULL,
  `Duracion_Sprint` int(11) NOT NULL,
  `Estado_Sprint` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre_Usuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Password_Usuario` varchar(512) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Perfil_Usuario` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_Grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Especificaciones`
--
ALTER TABLE `Especificaciones`
  ADD PRIMARY KEY (`ID_Especificacion`),
  ADD KEY `ID_Proyecto` (`ID_Proyecto`,`ID_Usuario`,`ID_Sprint`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_Sprint` (`ID_Sprint`);

--
-- Indices de la tabla `Grupos`
--
ALTER TABLE `Grupos`
  ADD PRIMARY KEY (`ID_Grupo`),
  ADD KEY `ID_Proyecto` (`ID_Proyecto`);

--
-- Indices de la tabla `Proyectos`
--
ALTER TABLE `Proyectos`
  ADD PRIMARY KEY (`ID_Proyecto`);

--
-- Indices de la tabla `Sprints`
--
ALTER TABLE `Sprints`
  ADD PRIMARY KEY (`ID_Sprint`),
  ADD KEY `ID_Proyecto` (`ID_Proyecto`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD KEY `ID_Grupo` (`ID_Grupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Especificaciones`
--
ALTER TABLE `Especificaciones`
  MODIFY `ID_Especificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Grupos`
--
ALTER TABLE `Grupos`
  MODIFY `ID_Grupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Proyectos`
--
ALTER TABLE `Proyectos`
  MODIFY `ID_Proyecto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Sprints`
--
ALTER TABLE `Sprints`
  MODIFY `ID_Sprint` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Especificaciones`
--
ALTER TABLE `Especificaciones`
  ADD CONSTRAINT `Especificaciones_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `Usuarios` (`ID_Usuario`),
  ADD CONSTRAINT `Especificaciones_ibfk_2` FOREIGN KEY (`ID_Sprint`) REFERENCES `Sprints` (`ID_Sprint`),
  ADD CONSTRAINT `Especificaciones_ibfk_3` FOREIGN KEY (`ID_Proyecto`) REFERENCES `Proyectos` (`ID_Proyecto`);

--
-- Filtros para la tabla `Grupos`
--
ALTER TABLE `Grupos`
  ADD CONSTRAINT `Grupos_ibfk_1` FOREIGN KEY (`ID_Proyecto`) REFERENCES `Proyectos` (`ID_Proyecto`);

--
-- Filtros para la tabla `Sprints`
--
ALTER TABLE `Sprints`
  ADD CONSTRAINT `Sprints_ibfk_1` FOREIGN KEY (`ID_Proyecto`) REFERENCES `Proyectos` (`ID_Proyecto`);

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`ID_Grupo`) REFERENCES `Grupos` (`ID_Grupo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
