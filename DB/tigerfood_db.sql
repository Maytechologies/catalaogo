-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2022 a las 17:43:46
-- Versión del servidor: 5.7.33
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tigerfood_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id_data` int(11) NOT NULL,
  `name_data` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `address_data` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone_data` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `email_data` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `logo_data` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `create_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `manager` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id_data`, `name_data`, `address_data`, `phone_data`, `email_data`, `logo_data`, `create_data`, `manager`) VALUES
(1, 'TIGER FOOD', 'AV CUATRO ESQUINA, DIAGONAL CON UNIVERSIDAD DEL ALBA', '+56948483195', 'tigerfoodcl@gmail.com', 'd7f513f77c5851655614045bd5f3ec0b.webp', '2022-05-23 12:24:56', 'Freddy y Maria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_status` int(2) NOT NULL,
  `name_status` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_status`, `name_status`) VALUES
(0, 'chequeo'),
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modal_producto`
--

CREATE TABLE `modal_producto` (
  `id_modal` int(11) NOT NULL,
  `nombre_modal` char(150) COLLATE utf8_spanish_ci NOT NULL,
  `img_modal` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modal_producto`
--

INSERT INTO `modal_producto` (`id_modal`, `nombre_modal`, `img_modal`, `estado`) VALUES
(1, 'MODAL-PERRO NORMAL', '4172f0e6daf6a25680bce149d6106db4.webp', 1),
(2, 'MODAL-PERRO ESPECIAL', '4139115bbe80489c58d48f6470d97f91.webp', 1),
(3, 'MODAL-HAMBURGESA NORMAL', 'ad61789627355b51c7dea35cdaed4dc7.webp', 1),
(4, 'MODAL-HAMBURGUESA ESPECIAL', '055e4842e714bbd81bd513877b1245a8.webp', 1),
(5, 'MODAL-HAMBURGUESA TIGER BURGER', '2694d48219536ad9bd4577e77efac3fe.webp', 1),
(6, 'MODAL PEPITO MIXTO', '761e256630ec98fff65e7028b355ce71.webp', 1),
(7, 'MODAL - AS ITALIANO', 'dc78a3d78da458c7dd59c364288fb4c9.webp', 1),
(8, 'MODAL-COMPLETO ITALIANO', 'd0be66902f52a1fdb66775b4d1cc5818.webp', 1),
(9, 'MODAL-CHURRASCO ITALIANO', '6b05d651a8c1d37681134b477447593c.webp', 1),
(10, 'MODAL-PAPAS FRITAS', '491edfd1a64f3c8e9a4eb65f9337e115.webp', 1),
(11, 'MODAL-SALCHIPAPAS', '790be578112758a94f69cf5486dd26c0.webp', 1),
(12, 'MODAL-BEBIDA-350ML', '5cc28bc31d3d68d19fdde27a3184ebe8.webp', 1),
(13, 'MODAL-BEBIDA 1.5LT', '54e02fccb59398459535229aa366784d.webp', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` tinyint(4) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `small_img` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` float(10,2) NOT NULL,
  `ingredientes` text COLLATE utf8_spanish_ci NOT NULL,
  `modal_img_id` int(11) DEFAULT NULL,
  `tipo_id` tinyint(4) NOT NULL,
  `estado_id` int(1) NOT NULL DEFAULT '1',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `small_img`, `precio`, `ingredientes`, `modal_img_id`, `tipo_id`, `estado_id`, `creado`) VALUES
(1, 'PERRO CALIENTE NORMAL', 'c732784b54a97366585ea110807553b3.webp', 2000.00, 'PAN, VIANESA, CEBOLLA, ENSALADA, PAPAS HILO, QUESO RAYADO,  SALSAS', 1, 1, 1, '2022-05-23 04:00:00'),
(2, 'PERRO CALIENTE ESPECIAL', 'ef4bc1f315dee470ed5aef7c2e713934.webp', 3000.00, 'PAN, VIANESA, CEBOLLA, ENSALADA, CARNE, POLLO, PASPAS HILO, QUESO RAYADO Y SALSAS', 2, 1, 1, '2022-05-23 04:00:00'),
(3, 'COMPLETO ITALIANO', '70dc754cbe4344adba83924a7a787355.webp', 2000.00, 'PAN, VIANESA, PALTA, SALSAS, TOMATE', 8, 4, 1, '2022-05-23 04:00:00'),
(4, 'AS ITALIANO', '616bf59fc972a3056dccaf89cf73dccc.webp', 2000.00, 'PAN, VIANESA, CARNE, TOMATE, SALSAS', 7, 4, 1, '2022-05-23 04:00:00'),
(5, 'CHURASCO ITALIANO', '901fb90296e283eecc9174adcaa569a0.webp', 3000.00, 'PAN, PALTA, TOMATE, CARNE, SALSAS ', 9, 5, 1, '2022-05-23 04:00:00'),
(6, 'PEPITO MIXTO', 'e716f53a71515f35fe5efeee46c899bf.webp', 10000.00, 'PAN, CARNE, POLLO, PAPAS HILOS, ENSALADA, QUESO RAYADO, SALSAS', 6, 3, 1, '2022-05-23 04:00:00'),
(7, 'HAMBURGUESA  NORMAL', '34b852d68d5f859abbd449361a22b2e0.webp', 4000.00, 'PAN, CARNE, ENSALADA, PAPAS HILO, SALSAS', 3, 2, 1, '2022-05-23 04:00:00'),
(8, 'HAMBURGUESA ESPECIAL', '5a144076d5dc3d85a120be6fe96d0fb1.webp', 6000.00, 'PAN, CARNE, POLLO, ENSALADAS, PAPAS HILO, SALSAS', 4, 2, 1, '2022-05-23 04:00:00'),
(9, 'HAMBURGUESA  TIGER FOOD', '742686d2653e5de69d08571e9d650917.webp', 8000.00, 'PAN, CARNE, POLLO, CHULETA, ENSALADA, PAPAS HILO, TOCINO, SALSAS', 5, 2, 1, '2022-05-23 04:00:00'),
(10, 'PAPAS FRITAS CHICAS', 'eee48cb457e122ed959abbdeab9e49bf.webp', 2000.00, 'PAPAS, SAL, SALSAS', 10, 6, 1, '2022-05-23 04:00:00'),
(11, 'PAPAS FRITAS MEDIANAS', '0ceeaf549b2dc8ebb75dada38611f28c.webp', 3000.00, 'PAPAS, SAL, SALSAS', 10, 6, 1, '2022-05-23 04:00:00'),
(12, 'SALCHI PAPAS', 'f6a399594f59ab1f9aa9a027633fc0b3.webp', 4000.00, 'PAPAS, VIANESA, SAL, SALSAS', 11, 6, 1, '2022-05-23 04:00:00'),
(13, 'BEBIDA LATA 350ML', 'bad6a7f446a8c5c3f8334cc7c7429a86.webp', 1000.00, 'BEBIDAS VARIADAS (PREGUNTAR)', 12, 7, 1, '2022-05-23 04:00:00'),
(14, 'BEBIDA   1.5LTS', '579c665e56db379567dc55400a321af7.webp', 2000.00, 'BEBIDAS VARIADAS (PREGUNTAR)', 13, 7, 1, '2022-05-23 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promosion`
--

CREATE TABLE `promosion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `price` double(10,2) DEFAULT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `date` timestamp NULL DEFAULT NULL,
  `user` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `publisher` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `promosion`
--

INSERT INTO `promosion` (`id`, `name`, `price`, `description`, `date`, `user`, `photo`, `publisher`) VALUES
(1, 'PERRO CALIENTE ESPACIAL', NULL, 'PAN EN BAÃ‘O MARIA, ENSALADA, PAPAS HILOS Y SALSAS', '2022-05-23 23:14:16', 'FREDDY-MARIA', '482a9378b9e46254de6e94e4eeab95b5.webp', 1),
(2, 'HAMBURGESA ESPECIAL ', NULL, ' MAGESTUAL HABURGUESA CON DOBLE CARNE, HUEVO, TOCINETA', '2022-05-23 23:17:04', 'FREDDY-MARIA', 'b91c70321a7e8d20b264358055286179.webp', 1),
(3, 'PEPITO MIXTO', NULL, '30 CENTIMETROS DE SABOR, FULL RELLENOS (2 PERSONAS)', '2022-05-23 23:19:00', 'FREDDY-MARIA', '7efea22514293cbcd9f5426e460a5f38.webp', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` tinyint(4) NOT NULL,
  `tipo_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_img` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `tipo_nombre`, `tipo_img`, `estado`) VALUES
(1, 'PERROS CALIENTES', 'af0319b32f420086c649a515e8f8f036.webp', 1),
(2, 'HAMBURGESAS', 'e754fb83f8852b62b06ed8d64fee3e23.webp', 1),
(3, 'PEPITOS', '4396444c7c3eea5b615443a461c9373f.webp', 1),
(4, 'COMPLETOS Y AS', '66ba838cdf1c831e13a05ad445c3bebf.webp', 1),
(5, 'CHURRASCOS', 'f3b8432dc2a79ebd1e5988bc335eb1a8.webp', 1),
(6, 'PAPAS FRITAS', '910cced115dade055eb26fb40748b9b4.webp', 1),
(7, 'BEBIDAS', 'e86db982dc45f1dc863c008969a4a09e.webp', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `name_tip_user` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `createDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `name_tip_user`, `createDate`) VALUES
(1, 'root', '2022-03-03 12:13:09'),
(2, 'admin', '2022-03-29 10:47:23'),
(3, 'usuario', '2022-03-29 10:47:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user_name` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `password` char(60) COLLATE utf8_spanish_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT 'status user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user_name`, `email`, `password`, `photo`, `tipo_id`, `status`) VALUES
(1, 'Marco A. Yanez', 'staroffic@gmail.com', '$2y$10$2YURFFqe.8J4Qr6D4BEopODVIM1rlMV7WyOsFE13d8POibVUlF56C', 'f8df6948e794d1d2a1adb0d9e4e0af17.webp', 1, 1),
(7, 'FREDDY-MARIA', 'tigerfoodcl@gmail.com', '$2y$10$pybxosf0de1rqXyad1z32ufWRJTkPRfnb071oeZzk2LmsJqnL4znm', '528426d5d362f3853acc01d32f3d0064.webp', 2, 1),
(8, 'ASISTENTE', 'tigerfoodcl@gmail.com', '$2y$10$2DK2NB6Pf5pIpg6U1n3lAeviYR6/ZfelAtDzMs2P/sY8UJKIkYGUq', 'ddb9abdd0ccf22736e7c8888dbbab0ec.webp', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id`, `ip`, `fecha`) VALUES
(1, '127.0.0.1', '2022-05-23 12:21:28'),
(2, '127.0.0.1', '2022-05-23 14:11:40'),
(3, '127.0.0.1', '2022-05-23 15:19:14'),
(4, '127.0.0.1', '2022-05-23 17:17:20'),
(5, '127.0.0.1', '2022-05-23 18:22:29'),
(6, '127.0.0.1', '2022-05-24 08:19:27'),
(7, '127.0.0.1', '2022-05-24 11:34:16'),
(8, '127.0.0.1', '2022-05-24 12:45:41'),
(9, '127.0.0.1', '2022-05-25 14:03:18'),
(10, '127.0.0.1', '2022-05-25 18:26:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id_data`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `modal_producto`
--
ALTER TABLE `modal_producto`
  ADD PRIMARY KEY (`id_modal`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `estado` (`estado_id`),
  ADD KEY `modal_img_id` (`modal_img_id`);

--
-- Indices de la tabla `promosion`
--
ALTER TABLE `promosion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_status` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modal_producto`
--
ALTER TABLE `modal_producto`
  MODIFY `id_modal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `promosion`
--
ALTER TABLE `promosion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modal_producto`
--
ALTER TABLE `modal_producto`
  ADD CONSTRAINT `modal_producto_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_producto` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_status`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`modal_img_id`) REFERENCES `modal_producto` (`id_modal`);

--
-- Filtros para la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD CONSTRAINT `tipo_producto_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
