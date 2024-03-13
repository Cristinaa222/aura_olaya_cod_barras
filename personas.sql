-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2024 a las 21:14:11
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
-- Base de datos: `personas`
--
CREATE DATABASE IF NOT EXISTS `personas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `personas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `documento` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `codigo_barras` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`documento`, `nombre`, `correo`, `codigo_barras`) VALUES
(1110172890, 'Carlos Gomez', 'carlos@gmail.com', '65f20500352032558'),
(1110986433, 'valentina mendoza', 'valen28@gmail.com', '65f2049560e263158'),
(1119283763, 'Aura Cristina Olaya', 'cristina@gmail.com', '65f201ab40b283997'),
(1129238373, 'Yenny Ramirez', 'yenny@gmail.com', '65f205de3c2773050'),
(1239484774, 'Adriana Campos', 'adriana@gmail.com', '65f2052dd54a59694'),
(1292837373, 'Santiago', 'santiago3@gmail.com', '65f2087e8e44c9347');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`documento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
