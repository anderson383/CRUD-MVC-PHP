-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2019 a las 02:41:13
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adsi`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarBd` (`nombre` VARCHAR(60), `apellido` VARCHAR(60), `telefono` VARCHAR(60), `correo` VARCHAR(60), `idSco` INT)  INSERT INTO `usuarios`(`nombreUsuario`, `apellidoUsuario`, `telefonoUsuario`, `correoUsuario`, `idScopeUsu`) VALUES (nombre,apellido,telefono,correo,idSco)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `paConsulta` ()  SELECT `idUsuario`, `nombreUsuario`, `apellidoUsuario`, `telefonoUsuario`, `correoUsuario`, `idScopeUsu`,`idScope`,`nombreScope` FROM `usuarios`INNER JOIN `scope` ON usuarios.idScopeUsu = scope.idScope ORDER BY idUsuario ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `paConsultaId` (IN `idUsu` INT(11))  SELECT `idUsuario`, `nombreUsuario`, `apellidoUsuario`, `telefonoUsuario`, `correoUsuario`, `idScopeUsu`,`nombreScope` FROM `usuarios` INNER JOIN `scope` ON usuarios.idScopeUsu = scope.idScope WHERE idUsuario = idUsu$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `paEliminar` (IN `idUsu` INT(11))  DELETE FROM `usuarios` WHERE idUsuario = idUsu$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `paModificar` (IN `nombre` VARCHAR(60), IN `apellido` VARCHAR(60), IN `telefono` VARCHAR(60), IN `correo` VARCHAR(60), IN `idUsuSco` INT(11), IN `idUsu` INT(11))  UPDATE `usuarios` SET `nombreUsuario`=nombre,`apellidoUsuario`=apellido,`telefonoUsuario`=telefono,`correoUsuario`=correo,`idScopeUsu`=idUsuSco WHERE idUsuario = idUsu$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scope`
--

CREATE TABLE `scope` (
  `idScope` int(11) NOT NULL,
  `nombreScope` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `scope`
--

INSERT INTO `scope` (`idScope`, `nombreScope`) VALUES
(1, 'Instructor'),
(2, 'Vocero'),
(3, 'Aprendiz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(60) DEFAULT NULL,
  `apellidoUsuario` varchar(60) DEFAULT NULL,
  `telefonoUsuario` varchar(12) DEFAULT NULL,
  `correoUsuario` varchar(100) DEFAULT NULL,
  `idScopeUsu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `telefonoUsuario`, `correoUsuario`, `idScopeUsu`) VALUES
(89, 'Anderson', 'Vargas', '232323', 'asdad@asdad', 3),
(90, 'asdad', 'asdasd', '232323', 'asdad@asdad', 1),
(91, 'Hola', 'asdasd', '2232323', 'asdads@asdads', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `scope`
--
ALTER TABLE `scope`
  ADD PRIMARY KEY (`idScope`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idScop` (`idScopeUsu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `scope`
--
ALTER TABLE `scope`
  MODIFY `idScope` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idScopeUsu`) REFERENCES `scope` (`idScope`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
