/* CREAR BASE DE DATOS CON NOMBRE "ingweb" */

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2023 a las 03:47:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ingweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(20) NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `año` int(20) NOT NULL,
  `precio` int(20) NOT NULL,
  `categoria` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `modelo`, `marca`, `año`, `precio`, `categoria`) VALUES
(1, 'TOYOTA BOSCH', 'Frenosa', 2020, 100, 'pastillas'),
(2, 'TOYOTA RIDEX', 'Frenosa', 2018, 200, 'pastillas'),
(3, 'Toyota Corola Azul', 'Frenosa', 2019, 41, 'pastillas'),
(4, 'Toyota Corola Hq', 'Frenosa', 2019, 49, 'pastillas'),
(5, 'Hyundai Accent Azul', 'Frenosa', 2019, 47, 'pastillas'),
(6, 'Daewo Racer', 'Frenosa', 2019, 50, 'pastillas'),
(7, 'Hyundai Sonata Azul', 'Frenosa', 2019, 68, 'pastillas'),
(8, 'Hyundai Sonata Hq', 'Frenosa', 2019, 65, 'pastillas'),
(9, 'Nissan Sentra AD Azul', 'Frenosa', 2019, 46, 'pastillas'),
(10, 'Toyota Caldina', 'Frenosa', 2019, 51, 'pastillas'),
(11, 'Toyota Probox EX', 'Frenosa', 2019, 60, 'pastillas'),
(12, 'Toyota Probox Hq', 'Frenosa', 2019, 54, 'pastillas'),
(13, 'Hyundai H-1', 'King', 2020, 85, 'discos'),
(14, 'Hyundai H-1 STAREK', 'King', 2018, 200, 'discos'),
(15, ' Hyundai H-1 H350 15 UP', 'King', 2019, 41, 'discos'),
(16, ' Nissan Sentra SUNNY', 'King', 2019, 49, 'discos'),
(17, 'Nissan AD Honda', 'King', 2019, 47, 'discos'),
(18, 'Nissan  Frontier 2.5 NP300', 'King', 2019, 50, 'discos'),
(19, ' Toyota Yaris D-1184', 'King', 2019, 68, 'discos'),
(20, ' Toyota Rav 4', 'King', 2019, 65, 'discos'),
(21, ' Toyota Corolla', 'King', 2019, 46, 'discos'),
(22, ' Toyota HILUX (D-976)', 'King', 2019, 51, 'discos'),
(23, ' Toyota HILUX (D-436)', 'King', 2019, 60, 'discos'),
(24, ' Toyota Coaster', 'King', 2019, 54, 'discos'),
(25, 'CHV Aveo/Spark GT t200/T250', 'Wurt', 2020, 150, 'tamboras'),
(26, 'CHV Spark/Matiz 0.8', 'Wurt', 2018, 120, 'discos'),
(27, 'Daewo Racer Cielo Lemans', 'Wurt', 2019, 100, 'tamboras'),
(28, 'Toyota Hiace 5L  04/16 Post', 'Wurt', 2019, 180, 'tamboras'),
(29, 'Toyoyta Hilux/Hiace 3L/3RZ, 4 Runner', 'Wurt', 2019, 220, 'tamboras'),
(30, 'Toyota probox, succeed 02/13 post', 'Wurt', 2019, 130, 'tamboras'),
(31, 'Toyota Yaris 1.5 /1.3 06 post', 'Wurt', 2019, 120, 'tamboras'),
(32, 'NS VERSA/MARCH 1.6 11/18 WURTEX', 'Wurt', 2019, 240, 'tamboras'),
(33, ' HY ACCENT/RIO 11/18 POST WURTEX', 'Wurt', 2019, 120, 'tamboras'),
(34, ' HY ACCENT/RIO/I10/GRAND I10 05/19 WURTE', 'Wurt', 2019, 100, 'tamboras'),
(35, 'HY H1 D4BH/G4KG 08/19 POST WURTEX', 'Wurt', 2019, 250, 'tamboras'),
(36, 'TOYOTA Corolla Brasil 4 HUECOS (F-277) P', 'Wurt', 2019, 230, 'tamboras'),
(37, 'CHV Aveo/Spark GT t200/T250', 'Wurt', 2020, 150, 'tamboras'),
(38, 'CHV Spark/Matiz 0.8', 'Wurt', 2018, 120, 'discos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(20) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `currentDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `detail`, `total`, `currentDate`) VALUES
(1, 'Cotización de produc', 100, '18/06/2023 19:23'),
(2, 'Cotización de produc', 100, '18/06/2023 19:43'),
(3, 'Cotización de productos:\n\nModelo: TOYOTA BOSCH\nMarca: Frenosa\nAño: 2020\nPrecio: S/.100\n\n', 100, '18/06/2023 19:44'),
(4, 'Cotización de productos:\n\nModelo: TOYOTA BOSCH\nMarca: Frenosa\nAño: 2020\nPrecio: S/.100\n\nModelo: TOYOTA RIDEX\nMarca: Frenosa\nAño: 2018\nPrecio: S/.200\n\nModelo: Toyota Corola Hq\nMarca: Frenosa\nAño: 2019\n', 602, '18/06/2023 19:45'),
(5, 'Cotización de productos:\n\nModelo: TOYOTA BOSCH\nMarca: Frenosa\nAño: 2020\nPrecio: S/.100\n\n', 100, '18/06/2023 19:51'),
(6, 'Cotización de productos:\n\nModelo: TOYOTA BOSCH\nMarca: Frenosa\nAño: 2020\nPrecio: S/.100\n\n', 100, '18/06/2023 19:52'),
(7, 'Cotización de productos:\n\nModelo: TOYOTA BOSCH\nMarca: Frenosa\nAño: 2020\nPrecio: S/.100\n\n', 100, '18/06/2023 19:52'),
(8, 'Cotización de productos:\n\nModelo: TOYOTA BOSCH\nMarca: Frenosa\nAño: 2020\nPrecio: S/.100\n\nModelo: TOYOTA RIDEX\nMarca: Frenosa\nAño: 2018\nPrecio: S/.200\n\n', 300, '18/06/2023 19:54'),
(9, 'Cotización de productos:\n\nModelo: TOYOTA BOSCH\nMarca: Frenosa\nAño: 2020\nPrecio: S/.100\n\nModelo: TOYOTA RIDEX\nMarca: Frenosa\nAño: 2018\nPrecio: S/.200\n\nModelo: Toyota Corola Azul\nMarca: Frenosa\nAño: 2019\nPrecio: S/.41\n\n', 341, '18/06/2023 19:55'),
(10, 'Cotización de productos:\n\nModelo: Hyundai Accent Azul\nMarca: Frenosa\nAño: 2019\nPrecio: S/.47\n\nModelo: Nissan AD Honda\nMarca: King\nAño: 2019\nPrecio: S/.47\n\nModelo: Daewo Racer Cielo Lemans\nMarca: Wurt\nAño: 2019\nPrecio: S/.100\n\n', 194, '18/06/2023 20:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `rol` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pass`, `rol`) VALUES
(1, 'Jhean', '123', 'cliente'),
(2, 'Angeles', '123', 'vendedor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
