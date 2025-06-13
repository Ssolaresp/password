-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2025 a las 22:37:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `password`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_general`
--

CREATE TABLE `info_general` (
  `id` int(11) NOT NULL,
  `nombre_cuenta` varchar(100) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `creado_en` datetime DEFAULT current_timestamp(),
  `actualizado_en` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `info_general`
--

INSERT INTO `info_general` (`id`, `nombre_cuenta`, `categoria`, `descripcion`, `creado_en`, `actualizado_en`) VALUES
(1, 'Cuentas Personales', 'Personal', 'Todas mis cuentas personales.', '2025-05-29 10:56:55', '2025-06-13 12:52:44'),
(2, 'Cuentas de Trabajo', 'Laboral', 'Accesos a herramientas del trabajo y correos laborales', '2025-05-29 10:56:56', '2025-06-10 12:45:57'),
(3, 'Cuentas Variadas', 'Varios', 'Cuentas de suscripciones, juegos, y otros sitios', '2025-05-29 10:56:56', '2025-06-10 12:45:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_sitio`
--

CREATE TABLE `nombre_sitio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `creado_en` datetime DEFAULT current_timestamp(),
  `actualizado_en` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nombre_sitio`
--

INSERT INTO `nombre_sitio` (`id`, `nombre`, `creado_en`, `actualizado_en`) VALUES
(1, 'TEAMS', '2025-06-10 12:46:13', '2025-06-10 12:46:13'),
(2, 'FORTICLIENT', '2025-06-10 12:46:13', '2025-06-10 12:46:13'),
(3, 'PC', '2025-06-11 10:18:32', '2025-06-11 10:18:32'),
(4, 'GOOGLE', '2025-06-13 12:58:18', '2025-06-13 12:58:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios`
--

CREATE TABLE `sitios` (
  `id` int(11) NOT NULL,
  `info_general_id` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena_encriptada` text NOT NULL,
  `notas` text DEFAULT NULL,
  `creado_en` datetime DEFAULT current_timestamp(),
  `nombre_sitio_id` int(11) DEFAULT NULL,
  `actualizado_en` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sitios`
--

INSERT INTO `sitios` (`id`, `info_general_id`, `Nombre`, `usuario`, `contrasena_encriptada`, `notas`, `creado_en`, `nombre_sitio_id`, `actualizado_en`) VALUES
(1, 2, NULL, 'informaticaasistente3@gmail.com', 'Umg$2023', NULL, '2025-05-29 11:51:41', 1, '2025-06-10 12:46:29'),
(2, 2, '', 'ssolares', 'Umg$2025', NULL, '2025-06-10 11:10:02', 2, '2025-06-10 12:46:29'),
(3, 2, '192.168.2.222/horarios', 'CENTRO_OCCIDENTE', 'Savona25$@@', NULL, '2025-06-10 12:20:11', 2, '2025-06-10 12:46:29'),
(4, 2, '192.168.2.222/horarios', 'CENTRO_SUR', 'Savona25%@@', NULL, '2025-06-10 12:20:11', 2, '2025-06-10 12:46:29'),
(5, 2, '192.168.2.222/horarios', 'CENTRO_SUR_2', 'Savona25#@@', NULL, '2025-06-10 12:20:11', 2, '2025-06-10 12:46:29'),
(6, 2, '192.168.2.222/horarios', 'NOR_ORIENTE', 'Savona25/@@', NULL, '2025-06-10 12:20:11', 2, '2025-06-10 12:46:29'),
(7, 2, '192.168.2.222/horarios', 'OCCIDENTE', 'Savona25_@@', NULL, '2025-06-10 12:20:11', 2, '2025-06-10 12:46:29'),
(8, 2, NULL, 'TOD_01', 'Savona25*@@', NULL, '2025-06-10 14:04:33', 2, '2025-06-10 14:04:33'),
(10, 2, '', 'TOD_02', 'Savona25-@@', NULL, '2025-06-10 14:05:13', 2, '2025-06-10 14:05:13'),
(11, 2, 'PC Horarios', 'Administrador', 'Savona123$$', NULL, '2025-06-11 10:18:56', 3, '2025-06-11 10:18:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `info_general_id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `contrasena` text NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `notas` text DEFAULT NULL,
  `creado_en` datetime DEFAULT current_timestamp(),
  `actualizado_en` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `info_general_id`, `nombre_usuario`, `telefono`, `contrasena`, `correo`, `notas`, `creado_en`, `actualizado_en`) VALUES
(2, 2, 'Administrador', NULL, 'Umg$2025', 'admin@password.com', NULL, '2025-06-10 11:28:24', '2025-06-10 12:46:49'),
(3, 2, 'Operador', '12345679', 'admin', 'operador@example.com', '', '2025-06-13 14:36:03', '2025-06-13 14:36:50');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_info_general`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_info_general` (
`id` int(11)
,`nombre_cuenta` varchar(100)
,`categoria` varchar(50)
,`descripcion` text
,`creado_en` datetime
,`actualizado_en` datetime
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_info_general`
--
DROP TABLE IF EXISTS `vista_info_general`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_info_general`  AS SELECT `ig`.`id` AS `id`, `ig`.`nombre_cuenta` AS `nombre_cuenta`, `ig`.`categoria` AS `categoria`, `ig`.`descripcion` AS `descripcion`, `ig`.`creado_en` AS `creado_en`, `ig`.`actualizado_en` AS `actualizado_en` FROM `info_general` AS `ig` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `info_general`
--
ALTER TABLE `info_general`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nombre_sitio`
--
ALTER TABLE `nombre_sitio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sitios`
--
ALTER TABLE `sitios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_general_id` (`info_general_id`),
  ADD KEY `fk_nombre_sitio` (`nombre_sitio_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_general_id` (`info_general_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `info_general`
--
ALTER TABLE `info_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `nombre_sitio`
--
ALTER TABLE `nombre_sitio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sitios`
--
ALTER TABLE `sitios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sitios`
--
ALTER TABLE `sitios`
  ADD CONSTRAINT `fk_nombre_sitio` FOREIGN KEY (`nombre_sitio_id`) REFERENCES `nombre_sitio` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sitios_ibfk_1` FOREIGN KEY (`info_general_id`) REFERENCES `info_general` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`info_general_id`) REFERENCES `info_general` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
