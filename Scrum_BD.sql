-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-11-2018 a las 16:50:07
-- Versión del servidor: 5.7.23-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Scrum_BD`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupos`
--

CREATE TABLE `Grupos` (
  `ID_Grupo_Grupos` int(11) NOT NULL COMMENT 'Nº Identificador del Grupo',
  `Nombre_Grupo_Grupos` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del Grupo',
  `ID_Proyecto_Grupos` int(11) NOT NULL COMMENT 'Nº Identificador del Proyecto asignado al Grupo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Grupos`
--

INSERT INTO `Grupos` (`ID_Grupo_Grupos`, `Nombre_Grupo_Grupos`, `ID_Proyecto_Grupos`) VALUES
(1, 'Grupo1_test', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proyectos`
--

CREATE TABLE `Proyectos` (
  `ID_Proyecto_Proyectos` int(11) NOT NULL COMMENT 'Nº Identificador del Proyecto',
  `Nombre_Proyecto_Proyectos` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del Proyecto (Descriptivo)',
  `Fecha_Inicio_Proyectos` date NOT NULL COMMENT 'Fecha de Inicio del Proyecto',
  `Fecha_Final_Proyectos` date NOT NULL COMMENT 'Fecha de Finalización del Proyecto',
  `Descripción_Proyectos` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Breve Descripción del Proyecto'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Proyectos`
--

INSERT INTO `Proyectos` (`ID_Proyecto_Proyectos`, `Nombre_Proyecto_Proyectos`, `Fecha_Inicio_Proyectos`, `Fecha_Final_Proyectos`, `Descripción_Proyectos`) VALUES
(1, 'Proyecto1_test', '2018-11-29', '2018-12-05', 'primer testeo proyecto1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sprints`
--

CREATE TABLE `Sprints` (
  `ID_Sprint_Sprints` int(11) NOT NULL COMMENT 'Nº Identificador del Sprint',
  `Nombre_Sprint_Sprints` varchar(30) NOT NULL COMMENT 'Nombre del Sprint',
  `ID_Proyecto_Sprints` int(11) NOT NULL COMMENT 'Nº Identificador de Proyecto',
  `Fecha_Inicio_Sprints` date NOT NULL COMMENT 'Fecha Inicio del Sprint',
  `Fecha_Entrega_Sprints` date NOT NULL COMMENT 'Fecha Límite del Sprint',
  `Duracion_Sprint_Sprints` int(11) NOT NULL COMMENT 'Nº Total de Horas',
  `Estado_Sprints` varchar(15) NOT NULL COMMENT 'Estado del Sprint (En Curso, Hecho)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Sprints`
--

INSERT INTO `Sprints` (`ID_Sprint_Sprints`, `Nombre_Sprint_Sprints`, `ID_Proyecto_Sprints`, `Fecha_Inicio_Sprints`, `Fecha_Entrega_Sprints`, `Duracion_Sprint_Sprints`, `Estado_Sprints`) VALUES
(1, 'Sprint1_test', 1, '2018-11-29', '2018-12-05', 20, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `ID_Usuario_Usuarios` int(11) NOT NULL COMMENT 'Nº Identificador del Usuario',
  `Usuario_Usuarios` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de Usuario',
  `Password_Usuarios` varchar(512) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Contraseña del Usuario (SHA2(512))',
  `ID_Grupo_Usuarios` int(2) NOT NULL COMMENT 'ID del Grupo al que pertenece',
  `Perfil_Usuarios` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Tipo (SM, PO, D)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`ID_Usuario_Usuarios`, `Usuario_Usuarios`, `Password_Usuarios`, `ID_Grupo_Usuarios`, `Perfil_Usuarios`) VALUES
(1, 'test', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', 1, 'SM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Grupos`
--
ALTER TABLE `Grupos`
  ADD PRIMARY KEY (`ID_Grupo_Grupos`),
  ADD KEY `ID_Proyecto_Grupos` (`ID_Proyecto_Grupos`);

--
-- Indices de la tabla `Proyectos`
--
ALTER TABLE `Proyectos`
  ADD PRIMARY KEY (`ID_Proyecto_Proyectos`);

--
-- Indices de la tabla `Sprints`
--
ALTER TABLE `Sprints`
  ADD PRIMARY KEY (`ID_Sprint_Sprints`),
  ADD UNIQUE KEY `ID_Proyecto_Sprints` (`ID_Proyecto_Sprints`),
  ADD KEY `ID_Proyecto_Sprints_2` (`ID_Proyecto_Sprints`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`ID_Usuario_Usuarios`),
  ADD UNIQUE KEY `Usuario` (`Usuario_Usuarios`),
  ADD KEY `ID_Grupo_Usuarios` (`ID_Grupo_Usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Grupos`
--
ALTER TABLE `Grupos`
  MODIFY `ID_Grupo_Grupos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Nº Identificador del Grupo', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Proyectos`
--
ALTER TABLE `Proyectos`
  MODIFY `ID_Proyecto_Proyectos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Nº Identificador del Proyecto', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Sprints`
--
ALTER TABLE `Sprints`
  MODIFY `ID_Sprint_Sprints` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Nº Identificador del Sprint', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `ID_Usuario_Usuarios` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Nº Identificador del Usuario', AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Grupos`
--
ALTER TABLE `Grupos`
  ADD CONSTRAINT `Grupos_ibfk_1` FOREIGN KEY (`ID_Grupo_Grupos`) REFERENCES `Usuarios` (`ID_Grupo_Usuarios`),
  ADD CONSTRAINT `Grupos_ibfk_2` FOREIGN KEY (`ID_Proyecto_Grupos`) REFERENCES `Proyectos` (`ID_Proyecto_Proyectos`);

--
-- Filtros para la tabla `Sprints`
--
ALTER TABLE `Sprints`
  ADD CONSTRAINT `Sprints_ibfk_1` FOREIGN KEY (`ID_Proyecto_Sprints`) REFERENCES `Proyectos` (`ID_Proyecto_Proyectos`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
