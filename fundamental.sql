-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2023 a las 15:01:31
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
-- Base de datos: `fundamental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriia`
--

CREATE TABLE `categoriia` (
  `id_categoria` int(2) NOT NULL,
  `nombre_categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoriia`
--

INSERT INTO `categoriia` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Funda'),
(2, 'Cristal'),
(3, 'Tecnología'),
(4, 'Accesorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cli` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `nombre_cli` varchar(15) NOT NULL,
  `apellidos_cli` varchar(40) NOT NULL,
  `telefono_cli` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cli`, `usuario`, `pass`, `nombre_cli`, `apellidos_cli`, `telefono_cli`) VALUES
(1, 'soofiiii', '81dc9bdb52d04dc20036dbd8313ed055', 'Sofia', 'Reina Moreno', '601201654'),
(2, '24_eme', '81dc9bdb52d04dc20036dbd8313ed055', 'Emiliano', 'Mitre', '609620518');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

CREATE TABLE `concepto` (
  `id_concepto` int(15) NOT NULL,
  `id_producto` int(13) NOT NULL,
  `id_venta` int(13) NOT NULL,
  `cantidad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_emp` int(2) NOT NULL,
  `nombre_emp` varchar(15) NOT NULL,
  `apellidos_emp` varchar(40) NOT NULL,
  `telefono_emp` int(11) NOT NULL,
  `fecha_comienzo` date NOT NULL,
  `cuenta_adm` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_emp`, `nombre_emp`, `apellidos_emp`, `telefono_emp`, `fecha_comienzo`, `cuenta_adm`, `pass`) VALUES
(1, 'Emiliano', 'Mitre Pezzola', 609620518, '2020-09-27', 'mitreemiliano', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(13) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `stock` int(3) NOT NULL,
  `precio_producto` double NOT NULL,
  `descripcion_producto` varchar(500) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(25) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `color` varchar(15) DEFAULT NULL,
  `con_borde` tinyint(4) DEFAULT NULL,
  `id_categoria` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `stock`, `precio_producto`, `descripcion_producto`, `marca`, `modelo`, `tipo`, `color`, `con_borde`, `id_categoria`) VALUES
(1, 'funda', 4, 5, 'Funda de gel roja para Samsung Galaxy S22', 'samsung', 's22', 'gel', 'rojo', NULL, 1),
(2, 'cristal', 2, 8, 'Cristal templado con borde para Samsung Galaxy S22', 'samsung', 's22', NULL, NULL, 2, 2),
(3, 'funda', 4, 10, 'Funda antideslizante suave para Samsung Galaxy S20 FE', 'samsung', 's20fe', 'antideslizante', 'morado', 1, 1),
(7, 'funda', 10, 10, 'Funda antigolpes transparente para IPhone 11', 'iphone', '11', 'antigolpes', 'transparente', NULL, 1),
(8, 'funda', 10, 7, 'Funda de libro para IPhone 14 PRO MAX azul', 'iphone', '14promax', 'libro', 'azul', NULL, 1),
(9, 'cristal', 9, 8, 'Cristal templado para proteger pantalla', 'iphone', '14', NULL, NULL, 1, 2),
(10, 'funda', 10, 10, 'Funda antigolpes transparente para IPhone 11', 'iphone', '11', 'antigolpes', 'transparente', NULL, 1),
(11, 'cristal', 10, 8, 'Iphone 11 / XR', 'iphone', '11/XR', NULL, NULL, 2, 2),
(12, 'funda', 6, 10, 'Funda antigolpes transparente para Xiaomi Redmi 9C', 'xiaomi', 'redmi9c', 'antigolpes', 'transparente', NULL, 1),
(13, 'funda', 6, 10, 'Funda antigolpes transparente para Xiaomi Redmi 9C', 'xiaomi', 'redmi9c', 'antigolpes', 'transparente', NULL, 1),
(14, 'funda', 3, 5, 'Funda de gel negra para Samsung Galaxy A51', 'samsung', 'a51', 'gel', 'negro', NULL, 1),
(15, 'funda', 3, 5, 'Funda de gel negra para Samsung Galaxy A51', 'samsung', 'a51', 'gel', 'negro', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(13) NOT NULL,
  `fecha_hora_venta` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_empleado` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriia`
--
ALTER TABLE `categoriia`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cli`),
  ADD UNIQUE KEY `id_cli` (`id_cli`),
  ADD UNIQUE KEY `id_cli_2` (`id_cli`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD PRIMARY KEY (`id_concepto`),
  ADD UNIQUE KEY `id_producto` (`id_producto`,`id_venta`),
  ADD KEY `FK_VENTA` (`id_venta`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_emp`),
  ADD UNIQUE KEY `id_emp` (`id_emp`),
  ADD KEY `id_emp_2` (`id_emp`),
  ADD KEY `id_emp_3` (`id_emp`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_producto_categoria` (`id_categoria`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `FK_EMPLEADO_V2` (`id_empleado`),
  ADD KEY `FK_CLIENTE` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriia`
--
ALTER TABLE `categoriia`
  MODIFY `id_categoria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `concepto`
--
ALTER TABLE `concepto`
  MODIFY `id_concepto` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_emp` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD CONSTRAINT `FK_PRODUCTO_V` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_VENTA` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoriia` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `FK_CLIENTE` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cli`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_EMPLEADO_V2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_emp`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
