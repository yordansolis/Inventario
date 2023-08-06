-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2023 a las 07:47:57
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `add_products`
--

CREATE TABLE `add_products` (
  `id_produc` int(11) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `talla` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `add_products`
--

INSERT INTO `add_products` (`id_produc`, `name_product`, `talla`, `cantidad`, `precio`, `filename`, `id_user`) VALUES
(66, 'Tenis J balvin', '4', 5, 250000, '5a87ea165d8e7c.png', 16),
(67, 'Tenis Jordan', '4', 0, 300000, 'e55169ef823f87.webp', 16),
(68, 'Tenis convert', '6', 0, 500000, '65df66ccfdbce5.png', 16),
(69, 'sudadera adidas azul', 'L', 5, 290000, '5276a75dd14f55.png', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudores`
--

CREATE TABLE `deudores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `direcion` varchar(100) NOT NULL,
  `nota` varchar(100) NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `fecha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deudores`
--

INSERT INTO `deudores` (`id`, `nombre`, `tel`, `direcion`, `nota`, `precio`, `fecha`) VALUES
(46, 'popeye', '3113636669', 'Barrio cristo rey ', 'debe 2 sudaderas adidas rojas', 300000, '2023-08-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `id` int(11) NOT NULL,
  `name_client` varchar(50) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `direc` varchar(100) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `fecha` varchar(250) NOT NULL,
  `vendedor` varchar(100) NOT NULL,
  `nota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`id`, `name_client`, `tel`, `direc`, `precio`, `fecha`, `vendedor`, `nota`) VALUES
(6, 'jose', '3113636669', 'Barrio kennedy', 300000, '2023-08-05', 'sandra', 'sudadera adidas roja talla s \r\nunidad 2.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fechaingreso` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `fechaingreso`) VALUES
(8, 'nancy', 'nancy@example.com', '$2y$04$vY.phITaumgcK0eHzHSCUOm2KL3Sbeua9SWuEDfs92A/ia.qu22QS', '2023-07-31 20:49:06'),
(9, 'alez', 'alex@gmail.com', '$2y$04$ld.UvHqiWYV2S2GJ/6Rn7e9S1j.JIdT/XgkP6Gs7f.Mx7bVhtSbqS', '2023-07-31 20:50:22'),
(10, 'orlando', 'orlando@gmail.com', '$2y$04$Cxd3fAX2UVRwDDWE2eOaJ.faErxayZEEEaPWOSeApkw4IqVeDVagC', '2023-07-31 20:53:17'),
(11, 'maria', 'maria@example.com', '$2y$04$kBqBuB8t4DS3NzAjg1gv4uPL5MqkDhRV/zj4HAHZpIYqlr77/vhsm', '2023-07-31 20:59:59'),
(12, 'martha', 'mar@email.com', '$2y$04$bJG9gmy.9L1FKPiFSH0N2OfZwFaen3JYqLT.RKpZePNM7.UbB8Z4.', '2023-07-31 21:02:56'),
(13, 'copete', 'copete@email.com', '$2y$04$BRTChbxITUG2cFbJtWLOIur.Rptb5t/b3BtAS8LomR9..9B1XWR52', '2023-07-31 21:03:26'),
(14, 'capo', 'paco@example.com', '$2y$04$qhEALau/BOH57E.c8i0wXeuJu/tQxx.pGXOAfuQag0Jp5H27whvqm', '2023-07-31 21:04:28'),
(15, 'jasprilla@miuniclaretiana.edu.co', 'jasprilla@miuniclaretiana.edu.co', '$2y$04$mL.af85UW0sJzblM4E22AO77j1Jgv5jUyYIh.2iF7xanvFXYBODVG', '2023-07-31 21:04:37'),
(16, 'sandra', 'sandra@gmail.com', '$2y$04$CQIkxwDHGW0BNqi5MhiWVOl5UNxjuTMCR.iLaw9gOs8AKfME3oVzG', '2023-07-31 21:13:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vender`
--

CREATE TABLE `vender` (
  `id_venta` int(11) NOT NULL,
  `name_client` varchar(255) DEFAULT NULL,
  `pagar` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produc` int(11) DEFAULT NULL,
  `fecha_venta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vender`
--

INSERT INTO `vender` (`id_venta`, `name_client`, `pagar`, `id_user`, `id_produc`, `fecha_venta`) VALUES
(32, 'Nancy ', 2500000, 16, 68, '2023-08-06 04:44:59'),
(33, 'Josen cuesta', 1200000, 16, 67, '2023-08-06 04:45:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `add_products`
--
ALTER TABLE `add_products`
  ADD PRIMARY KEY (`id_produc`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `deudores`
--
ALTER TABLE `deudores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `vender`
--
ALTER TABLE `vender`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `vender_ibfk_2` (`id_produc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `add_products`
--
ALTER TABLE `add_products`
  MODIFY `id_produc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `deudores`
--
ALTER TABLE `deudores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `vender`
--
ALTER TABLE `vender`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `add_products`
--
ALTER TABLE `add_products`
  ADD CONSTRAINT `add_products_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Filtros para la tabla `vender`
--
ALTER TABLE `vender`
  ADD CONSTRAINT `vender_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `vender_ibfk_2` FOREIGN KEY (`id_produc`) REFERENCES `add_products` (`id_produc`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
