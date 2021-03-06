-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-01-2019 a las 18:10:00
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
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
  `Especificacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_Sprint` int(11) DEFAULT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `ID_Proyecto` int(11) NOT NULL,
  `Descripcion_Especificacion` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Duracion_Especificacion` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Dificultad_Especificacion` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Estado_Especificacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Especificaciones`
--

INSERT INTO `Especificaciones` (`ID_Especificacion`, `Especificacion`, `ID_Sprint`, `ID_Usuario`, `ID_Proyecto`, `Descripcion_Especificacion`, `Duracion_Especificacion`, `Dificultad_Especificacion`, `Estado_Especificacion`) VALUES
(1, 'Botón Crear Proyecto', 1, 2, 1, 'Botón con imagen PNG para crear Proyecto', '4', '3', 'Pendiente'),
(2, 'Esqueleto Página', 1, 1, 1, 'Prueba', '4', '3', 'Pendiente'),
(3, 'Screen Administración Proyecto', 1, 3, 1, 'Un marc per tota la informació general (la introduida quan es crea el projecte)', '4', '3', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupos`
--

CREATE TABLE `Grupos` (
  `ID_Grupo` int(11) NOT NULL,
  `ID_Proyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Grupos`
--

INSERT INTO `Grupos` (`ID_Grupo`, `ID_Proyecto`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proyectos`
--

CREATE TABLE `Proyectos` (
  `ID_Proyecto` int(11) NOT NULL,
  `Nombre_Proyecto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Inicio_Proyecto` date NOT NULL,
  `Fecha_Final_Proyecto` date NOT NULL,
  `Descripcion_Proyecto` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `PO_Proyecto` varchar(100) NOT NULL,
  `SM_Proyecto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Proyectos`
--

INSERT INTO `Proyectos` (`ID_Proyecto`, `Nombre_Proyecto`, `Fecha_Inicio_Proyecto`, `Fecha_Final_Proyecto`, `Descripcion_Proyecto`, `PO_Proyecto`, `SM_Proyecto`) VALUES
(1, 'Proyecto YLW TPV', '2018-11-29', '2018-11-30', 'Aplicación TPV con control de usuarios y terminal de venta', 'Enric Mieza', 'Leandro Zabala'),
(2, 'Proyecto Gestor SCRUM', '2018-12-03', '2018-12-20', 'Aplicación Web para la gestión de proyectos mediante la metodología de SCRUM', 'Enric Mieza', 'Leandro Zabala'),
(3, 'Proyecto SMSend', '2018-12-11', '2018-12-17', 'Aplicación para el envío de SMS a gran escala mediante PHP', 'Enric Mieza', 'Leandro Zabala'),
(5, 'Proyecto Oauth2', '2018-12-14', '2019-04-10', 'Implementación del procolo Oauth2 (Google) para el formulario de Login', 'Enric Mieza', 'Leandro Zabala');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sprints`
--

CREATE TABLE `Sprints` (
  `ID_Sprint` int(11) NOT NULL,
  `ID_Proyecto` int(11) NOT NULL,
  `Fecha_Inicio_Sprint` date NOT NULL,
  `Fecha_Final_Sprint` date NOT NULL,
  `Duracion_Sprint` int(11) NOT NULL,
  `Estado_Sprint` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Sprints`
--

INSERT INTO `Sprints` (`ID_Sprint`, `ID_Proyecto`, `Fecha_Inicio_Sprint`, `Fecha_Final_Sprint`, `Duracion_Sprint`, `Estado_Sprint`) VALUES
(1, 1, '2018-12-11', '2019-01-11', 90, 'Acabado'),
(2, 1, '2019-01-14', '2019-02-14', 90, 'En curso'),
(3, 1, '2019-02-16', '2019-03-16', 90, 'Por empezar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre_Usuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_Apellidos` varchar(100) DEFAULT NULL,
  `Password_Usuario` varchar(512) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Perfil_Usuario` varchar(3) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ID_Grupo` int(11) DEFAULT NULL,
  `Correo_Usuario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`ID_Usuario`, `Nombre_Usuario`, `Nombre_Apellidos`, `Password_Usuario`, `Perfil_Usuario`, `ID_Grupo`, `Correo_Usuario`) VALUES
(1, 'lzabala', 'Leandro Zabala', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', 'SM', 1, 'Master@scrum.com'),
(2, 'emieza', 'Enric Mieza', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', 'PO', 1, 'ProductOwner@scrum.com'),
(3, 'dencina', 'David Encina', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', 'D', 1, 'dencinamartinez@iesesteveterradas.cat'),
(4, 'psort', 'Pep Sort', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', 'D', 1, 'pepsort7@gmail.com'),
(5, 'nil', 'Nil Llibert Delshorts', '6bfcc4026b5f162799a6dc8305c09db9c1674ac616bd5c7422a45fbb6d0816ac163047c47a1f426f4f4c6b5b5042c671eabc4fdc7310fd5b183eef59dc274604', 'D', 1, 'ngarciadelshorts@gmail.com');

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
  MODIFY `ID_Especificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Grupos`
--
ALTER TABLE `Grupos`
  MODIFY `ID_Grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Proyectos`
--
ALTER TABLE `Proyectos`
  MODIFY `ID_Proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Sprints`
--
ALTER TABLE `Sprints`
  MODIFY `ID_Sprint` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
