-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2021 a las 22:56:28
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atlas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cedula_pasaporte` varchar(50) NOT NULL,
  `huella_digital` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pais_nacimiento` varchar(50) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `correo` varchar(25) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion1` varchar(50) NOT NULL,
  `direccion2` varchar(50) NOT NULL,
  `posicion` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido`, `cedula_pasaporte`, `huella_digital`, `fecha_nacimiento`, `pais_nacimiento`, `fecha_entrada`, `correo`, `telefono`, `direccion1`, `direccion2`, `posicion`, `estado`) VALUES
(1, 'Gregory', 'Burgos', '12345678', 'sdyasdtasrdtsadradas4', '2013-02-17', 'republica dominicana', '2021-08-19', 'gregoryburgos12@gmail.com', '12334343435', 'calle16 buena terrena', 'villa mella 28', 'Gerente', 1),
(2, 'Wayner', 'De La Cruz', '67987887', '', '2024-01-01', 'Republica Dominicana', '2024-01-01', 'Prueba', '1234543', 'Prueba', 'Prueba', 'Administrador', 1),
(4, 'Jesus', 'Sama', '4054556', 'ADGMJKN,N.,', '2021-08-04', 'RD', '2021-08-14', 'hoal@hola', '2344455645', 'CALLE1323', 'VILAA23435', 'Obrero', 1),
(23, 'Juan', 'Perez', '123231231231', '', '2021-03-28', 'Republica Dominicana', '2021-08-16', 'juan@juan', '12323123', 'direccion 1', 'direccion 2', 'Secretario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_salida`
--

CREATE TABLE `entrada_salida` (
  `id_registro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time DEFAULT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada_salida`
--

INSERT INTO `entrada_salida` (`id_registro`, `fecha`, `hora_entrada`, `hora_salida`, `id_empleado`) VALUES
(1, '2018-08-08', '08:00:00', NULL, 1),
(2, '2021-08-08', '08:00:00', '17:00:00', 1),
(3, '2021-08-08', '08:00:00', NULL, 1),
(4, '2021-08-08', '08:00:00', NULL, 1),
(5, '2021-08-08', '08:00:00', NULL, 1),
(6, '2021-08-08', '08:00:00', NULL, 1),
(7, '2021-08-08', '08:00:00', '17:00:00', 5),
(8, '2021-08-08', '08:00:00', '17:00:00', 4),
(9, '2021-08-08', '08:00:00', '17:00:00', 4),
(10, '2021-08-08', '08:00:00', NULL, 1),
(11, '2021-08-08', '08:00:00', NULL, 5),
(12, '2021-08-11', '09:35:00', NULL, 1),
(13, '2021-08-11', '09:35:00', NULL, 4),
(14, '2021-08-14', '08:00:00', '17:00:00', 4),
(15, '2021-08-14', '08:00:00', '17:00:00', 4),
(16, '2021-08-14', '08:00:00', '17:00:00', 22),
(17, '2021-08-14', '08:00:00', '17:00:00', 4),
(18, '2021-08-14', '08:00:00', NULL, 1),
(19, '2021-08-14', '08:00:00', '17:00:00', 22),
(20, '2021-08-14', '08:00:00', NULL, 22),
(21, '2021-08-14', '17:00:00', NULL, 4),
(22, '2021-08-16', '09:17:15', NULL, 4),
(23, '2021-08-16', '09:33:31', NULL, 22),
(24, '2021-08-16', '11:02:35', NULL, 1),
(25, '2021-08-16', '15:23:12', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `id_empleado` varchar(50) NOT NULL,
  `admin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_usuario`, `nombre`, `pass`, `id_empleado`, `admin`) VALUES
(1, 'gerente@atlas.com', 'gerente1234', '1', b'1'),
(2, 'admin@atlas.com', 'admin1234', '2', b'1'),
(3, 'jesus@atlas.com', 'jesus1234', '4', b'0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `entrada_salida`
--
ALTER TABLE `entrada_salida`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `entrada_salida`
--
ALTER TABLE `entrada_salida`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
