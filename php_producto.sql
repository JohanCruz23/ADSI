-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2022 a las 18:46:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_producto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_details`
--

CREATE TABLE `product_details` (
  `id` int(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `price` int(8) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `storage` varchar(50) NOT NULL,
  `imagen` longblob NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product_details`
--

INSERT INTO `product_details` (`id`, `name`, `brand`, `price`, `ram`, `storage`, `imagen`, `status`) VALUES
(1, '54 AÑOS CENIGRAF', 'Cumpleaños Cenigraf', 2004, 'Bienestar Aprendiz', 'JPG', 0x48312e4a5047, '1'),
(2, 'PREMIACIÓN TORNEO', 'Premiaciones', 2008, 'Aprendices', 'JPG', 0x48322e4a5047, '1'),
(3, 'Día de la madre', 'Día de la madre', 2012, 'Bienestar Aprendiz', 'JPG', 0x48332e4a5047, '1'),
(4, 'Día del padre', 'Día del padre', 2016, 'Aprendices', 'JPG', 0x48342e4a5047, '1'),
(5, 'Graduación Diseño', 'Graduación', 2020, 'Aprendices', 'JPG', 0x48352e4a5047, '1'),
(6, 'Graduación Programación', 'Graduación', 2021, 'Aprendices', 'JPG', 0x48362e4a5047, '1'),
(7, '54 AÑOS CENIGRAF', 'Cumpleaños Cenigraf', 2021, 'Egresados', 'JPG', 0x48372e4a5047, '1'),
(8, 'GRADO SERIGRAFIA', 'Impresión', 2022, 'Impresion', 'JPG', 0x48382e4a5047, '1'),
(9, 'PROYECTO MULTIMEDIA', 'Entrega proyecto', 2022, 'Aprendices', 'JPG', 0x48392e4a5047, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
