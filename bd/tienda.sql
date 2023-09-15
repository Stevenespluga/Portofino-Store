-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2022 a las 14:02:00
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `id_registro`, `categoria`) VALUES
(7, 7, 'Franelas'),
(8, 7, 'Gorras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id_registro` int(11) NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` text NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id_registro`, `cedula`, `apellido`, `nombre`, `correo`, `telefono`, `direccion`, `fecha_registro`) VALUES
(7, '', 'Administrador', '', 'admin@gmail.com', '', '', '2022-11-25'),
(9, '27665049', 'Pinto Requena', 'Yervi Yoel', 'yervi@gmail.com', '04243698523', 'San Juan de los Morros, Estado Guarico', '2022-11-27'),
(10, '15392001', 'Pereira', 'Joel', 'joel@gmail.com', '04243224668', 'San Juan de los Morros, Estado Guarico', '2022-11-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `num` varchar(20) NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `monto_factura` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_registro`, `num`, `estatus`, `fecha_factura`, `fecha_entrega`, `monto_factura`) VALUES
(1, 9, '00000000001', 2, '2022-11-27', '2022-11-27', '10.5'),
(2, 10, '00000000002', 2, '2022-11-27', '2022-11-27', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedidos` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `precio_unidad` int(11) NOT NULL,
  `total` varchar(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `status` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedidos`, `id_registro`, `id_producto`, `cant`, `precio_unidad`, `total`, `fecha_pedido`, `status`, `numero`) VALUES
(1, 9, 6, 1, 5, '4.5', '2022-11-27', 2, '00000000001'),
(3, 9, 3, 1, 6, '6', '2022-11-27', 2, '00000000001'),
(4, 10, 4, 1, 10, '10', '2022-11-27', 2, '00000000002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `precio` varchar(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_registro`, `categoria`, `producto`, `precio`, `cantidad`, `img`, `fecha_registro`) VALUES
(1, 7, 8, 'Gorras Planas Negras', '5.5', 100, '1.jpg', '2022-11-27'),
(2, 7, 8, 'Gorras Planas Rojas', '5', 100, '2.jpg', '2022-11-27'),
(3, 7, 7, 'Franela de Mujeres Tricolor', '6', 100, '3.jpg', '2022-11-27'),
(4, 7, 7, 'Franela de Caballero Nautica', '10', 100, '4.jpg', '2022-11-27'),
(5, 7, 8, 'Gorras Llaneras', '7', 100, '5.jpg', '2022-11-27'),
(6, 7, 7, 'Franelas de Algodon', '4.5', 100, '6.jpg', '2022-11-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_registro`, `email`, `password`, `tipo`, `estatus`, `fecha_registro`) VALUES
(6, 7, 'admin@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1, 0, '2022-11-25'),
(8, 9, 'yervi@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 2, 0, '2022-11-27'),
(9, 10, 'joel@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 2, 0, '2022-11-27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`id_registro`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedidos`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
