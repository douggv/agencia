-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2025 a las 22:17:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditorias`
--

CREATE TABLE `auditorias` (
  `id` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

CREATE TABLE `avion` (
  `id` int(11) NOT NULL,
  `aerolinea` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `capacidad_pasajeros` int(11) DEFAULT NULL,
  `estado` enum('Activo','En mantenimiento','Retirado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `estrellas` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `id_notificacion` int(11) NOT NULL,
  `id_usuario_fk` int(11) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_de_creacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id_notificacion`, `id_usuario_fk`, `mensaje`, `fecha_de_creacion`) VALUES
(1, NULL, 'Saludos pedro@gmail.com Su Reserva para el vuelo de maracaibo a Margarita ha sido aceptada fecha de salida: 2025-01-05 17:18:00 fecha de regreso: 2025-01-29 17:18:00 por favor no olvide el comprobante de pago adjunto. Gracias', NULL),
(2, NULL, 'Saludos pedro@gmail.com Su Reserva para el vuelo de maracaibo a Margarita ha sido aceptada fecha de salida: 2025-01-05 17:18:00 fecha de regreso: 2025-01-29 17:18:00 por favor no olvide el comprobante de pago adjunto. Gracias', NULL),
(3, 6, 'Saludos pedro@gmail.com Su Reserva para el vuelo de maracaibo a Margarita ha sido aceptada fecha de salida: 2025-01-05 17:18:00 fecha de regreso: 2025-01-29 17:18:00 por favor no olvide el comprobante de pago adjunto. Gracias', NULL),
(4, 6, 'Saludos pedro@gmail.com Su Reserva para el vuelo de caracas a margarita ha sido aceptada fecha de salida: 2025-01-07 20:01:00 fecha de regreso: 2025-01-29 20:02:00 por favor no olvide el comprobante de pago adjunto. Gracias', NULL),
(5, 8, 'Saludos pedro@gmail.com Su Reserva para el vuelo de maracaibo a Margarita ha sido aceptada fecha de salida: 2025-01-05 17:18:00 fecha de regreso: 2025-01-29 17:18:00 por favor no olvide el comprobante de pago adjunto. Gracias', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas_viajes`
--

CREATE TABLE `programas_viajes` (
  `id` int(11) NOT NULL,
  `id_viaje` int(11) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `actividad` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_vuelo` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'pendiente',
  `fecha_de_creacion` timestamp NULL DEFAULT current_timestamp(),
  `fecha_de_actualizacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `imagen2` text NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `forma_de_pago` varchar(45) NOT NULL,
  `persona_pago` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_usuario`, `id_vuelo`, `estado`, `fecha_de_creacion`, `fecha_de_actualizacion`, `imagen2`, `referencia`, `forma_de_pago`, `persona_pago`) VALUES
(1, 6, 2, 'aceptada', '2025-01-09 21:13:22', '2025-01-12 14:50:28', '2025-01-09-05-13-22fotografia-lateral-editor-codigo-que-utiliza-react-js_181624-61842.jpg', '1234', 'pago_movil', 'pedro'),
(2, 6, 4, 'pendiente', '2025-01-09 23:31:01', '2025-01-12 14:48:46', '2025-01-09-07-31-01fotografia-lateral-editor-codigo-que-utiliza-react-js_181624-61842.jpg', '123', 'pago_movil', 'asdasd'),
(3, 6, 4, 'pendiente', '2025-01-09 23:33:55', '2025-01-12 14:48:46', 'http://localhost/agencia/public/images/comprobantes/2025-01-09-07-33-55fotografia-lateral-editor-codigo-que-utiliza-react-js_181624-61842.jpg', '1234', 'pago_movil', 'asdasd'),
(4, 6, 2, 'aceptada', '2025-01-09 23:36:45', '2025-01-12 14:50:38', '2025-01-09-07-36-45fotografia-lateral-editor-codigo-que-utiliza-react-js_181624-61842.jpg', '1234', 'Binace', 'asdasd'),
(5, 8, 2, 'aceptada', '2025-01-13 01:28:13', '2025-01-13 01:28:59', '2025-01-12-09-28-13computadora-portatil-icono-isometrico-codigo-programa-desarrollo-software-aplicaciones-programacion-neon-oscuro_39422-971.avif', '231341', 'zelle', 'pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `cedula` int(11) NOT NULL,
  `edad` tinyint(4) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `rol` varchar(45) NOT NULL,
  `imagen` text DEFAULT NULL,
  `fecha_de_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_de_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `contrasena`, `cedula`, `edad`, `telefono`, `rol`, `imagen`, `fecha_de_creacion`, `fecha_de_actualizacion`, `token`) VALUES
(5, 'Nataly', 'Urribarry', 'natalyurribarri23@gmail.com', '$2y$10$qR8.8Yhym0zCnmc.pNq31eQEQOHDk4h470iY.B8jAekYVaA29eXbO', 27284908, NULL, '04127122987', 'agente', NULL, '2024-12-07 22:35:56', '2025-01-19 20:32:23', 121166),
(6, 'Maria', 'Perez', 'maria@gmail.com', '$2y$10$kc6zh6F8OW/WOCF0e.xBJeDWDvGeWvmTsuhWz9nPpuj.GAkrjWa5.', 12354515, NULL, '051651516516', 'cliente', NULL, '2025-01-09 01:59:31', '2025-01-12 14:31:08', NULL),
(7, 'Sergio', 'Rojas', 'sergio@gmaiol.com', '$2y$10$WXv4N8P0m3qnYZVeVdEJ4.7C4xflJsklrXzjWM9z65tdW/QxSQq0W', 11111111, NULL, '123213123123', 'cliente', NULL, '2025-01-09 16:10:00', '2025-01-12 14:31:08', NULL),
(8, 'nataly', 'Urribarri', 'nataly@gmail.com', '$2y$10$uqJ1JysywamcMYTOEMvo9uRr51MZFCIVbnsfFGScNEKIkYSbSx8Di', 12121212, NULL, '123213123123', 'cliente', NULL, '2025-01-09 16:10:41', '2025-01-18 02:57:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `precio` decimal(11,2) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id` int(11) NOT NULL,
  `origen` varchar(100) DEFAULT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `fecha_regreso` datetime DEFAULT NULL,
  `aerolinea` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `puestos_totales` int(11) DEFAULT NULL,
  `puestos_vendidos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `origen`, `destino`, `fecha_salida`, `fecha_regreso`, `aerolinea`, `nombre`, `descripcion`, `tipo`, `precio`, `imagen`, `puestos_totales`, `puestos_vendidos`) VALUES
(2, 'maracaibo', 'Margarita', '2025-01-05 17:18:00', '2025-01-29 17:18:00', 'Conviasa', 'Maracaibo Margarita', 'vuelos ida y regreso mas transporte incluido al hotel Ecoland Margarita con ospedaje incluido', 'comun', 600, '2025-01-09-12-19-10ala-avion-puesta-sol-cielo-azul_1150-11083.avif', 40, 0),
(3, 'caracas', 'maracaibo', '2025-01-07 20:01:00', '2025-01-22 20:01:00', 'venezolana', 'Caracas Maracaibo', 'vuelo desde caracas hasta maracaibo', 'comun', 100, '2025-01-09-03-01-23ala-avion-puesta-sol-cielo-azul_1150-11083.avif', 50, 0),
(4, 'Caracas', 'margarita', '2025-01-07 20:01:00', '2025-01-29 20:02:00', 'venezolana', 'Caracas Margarita', 'vuelo desde caracas hasta margarita ida y vuelta', 'paquete', 500, '2025-01-09-03-02-14ala-avion-puesta-sol-cielo-azul_1150-11083.avif', 50, 0),
(6, 'Caracas', 'Madrid', '2025-01-14 04:30:00', '2025-01-27 02:29:00', 'Conviasa', 'Caracas Madrid', 'vuelos ida y regreso mas transporte incluido al hotel Ecoland Margarita con ospedaje incluido', 'paquete', 700, '2025-01-12-09-25-34ala-avion-puesta-sol-cielo-azul_1150-11083.avif', 80, 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditorias`
--
ALTER TABLE `auditorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `fk_notificaciones_usuarios` (`id_usuario_fk`);

--
-- Indices de la tabla `programas_viajes`
--
ALTER TABLE `programas_viajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_id_viaje` (`id_viaje`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `idx_id_vuelo` (`id_vuelo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditorias`
--
ALTER TABLE `auditorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `avion`
--
ALTER TABLE `avion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `programas_viajes`
--
ALTER TABLE `programas_viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_notificaciones_usuarios` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `programas_viajes`
--
ALTER TABLE `programas_viajes`
  ADD CONSTRAINT `programas_viajes_ibfk_1` FOREIGN KEY (`id_viaje`) REFERENCES `viajes` (`id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
