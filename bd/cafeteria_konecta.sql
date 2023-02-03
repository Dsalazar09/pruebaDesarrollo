-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2023 a las 19:26:53
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria_konecta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL,
  `peso` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha_creacion`) VALUES
(1, '00', '00', '00', '00', '00', 0, '0000-00-00 00:00:00'),
(2, 'Cocacola', '001', '2500', '0,3kg', 'Bebida', 11, '2023-02-03 17:27:28'),
(3, 'Sandwiche', 'Comida', '4500', '0,3kg', 'Comida', 8, '2023-02-03 17:29:39'),
(4, 'Chocolatina', 'Jet', '1500', '0.2kg', 'Chocolates', 3, '2023-02-03 17:30:19'),
(5, 'Hit', '003', '3000', '0,3kg', 'Bebida', 3, '2023-02-03 17:32:02'),
(6, 'Galletas festivas', '002', '1500', '0.2kg', 'Comida', 1, '2023-02-03 17:33:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ventas`
--

CREATE TABLE `tbl_ventas` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_venta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_ventas`
--

INSERT INTO `tbl_ventas` (`id_venta`, `id_producto`, `cantidad`, `fecha_venta`) VALUES
(1, 2, 3, '2023-02-03 17:45:58'),
(2, 4, 20, '2023-02-03 17:46:07'),
(3, 5, 3, '2023-02-03 17:46:11'),
(4, 5, 2, '2023-02-03 17:46:17'),
(5, 6, 8, '2023-02-03 17:46:21'),
(6, 3, 3, '2023-02-03 17:46:26'),
(7, 4, 2, '2023-02-03 17:46:28'),
(8, 4, 1, '2023-02-03 17:46:34'),
(9, 6, 1, '2023-02-03 17:46:38'),
(10, 3, 4, '2023-02-03 17:46:50'),
(11, 2, 2, '2023-02-03 17:46:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
