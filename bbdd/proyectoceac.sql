-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2015 a las 16:58:08
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyectoceac`
--
CREATE DATABASE IF NOT EXISTS `proyectoceac` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `proyectoceac`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`idcliente` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `phone` int(9) DEFAULT NULL,
  `phonemovil` int(9) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `addresss` varchar(20) DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `ciudad` text,
  `provincia` text,
  `pais` text,
  `nif` varchar(9) DEFAULT NULL,
  `edad` int(2) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
`facturaId` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fechaFactura` date NOT NULL,
  `totalFactura` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturadetalle`
--

CREATE TABLE IF NOT EXISTS `facturadetalle` (
`facturadetalleid` int(11) NOT NULL,
  `facturaId` int(11) NOT NULL,
  `productoId` int(11) NOT NULL,
  `nombreproducto` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioVenta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineapedido`
--

CREATE TABLE IF NOT EXISTS `lineapedido` (
`detallepedidoid` int(11) NOT NULL,
  `pedidoid` int(11) NOT NULL,
  `productoid` int(11) NOT NULL,
  `nombreproducto` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
`idpedido` int(11) NOT NULL,
  `situacionpedido` varchar(50) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fechapedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`productoId` int(11) NOT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `imagenProducto` varchar(50) NOT NULL,
  `precioVenta` decimal(10,2) NOT NULL,
  `stock` int(4) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`productoId`, `nombreProducto`, `descripcion`, `imagenProducto`, `precioVenta`, `stock`, `fecha`) VALUES
(1, 'Vino denominacion de origen', ' bullas', 'img/cesta-servir-vinos.jpg', '49.99', 10, '2015-05-28'),
(2, 'vino denominacion origen jumilla', 'jumilla', 'img/Copa-vino.jpg', '59.99', 52, '2015-05-03'),
(3, 'Vinos denominación de origen galicia', 'galicia', 'img/dos_copas.jpg', '199.99', 4, '2015-05-03'),
(4, 'vino expumoso', 'expumoso', 'img/c.jpg', '2000.00', 10, '2015-05-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idusuario` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
 ADD PRIMARY KEY (`facturaId`), ADD KEY `idCliente` (`idCliente`), ADD KEY `facturaId` (`facturaId`), ADD KEY `facturaId_2` (`facturaId`), ADD KEY `facturaId_3` (`facturaId`);

--
-- Indices de la tabla `facturadetalle`
--
ALTER TABLE `facturadetalle`
 ADD PRIMARY KEY (`facturadetalleid`), ADD KEY `facturaId` (`facturaId`), ADD KEY `productoId` (`productoId`), ADD KEY `facturaId_2` (`facturaId`);

--
-- Indices de la tabla `lineapedido`
--
ALTER TABLE `lineapedido`
 ADD PRIMARY KEY (`detallepedidoid`), ADD KEY `productoid` (`productoid`), ADD KEY `pedidoid` (`pedidoid`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
 ADD PRIMARY KEY (`idpedido`), ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`productoId`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idusuario`), ADD KEY `clienet_idx` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
MODIFY `facturaId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facturadetalle`
--
ALTER TABLE `facturadetalle`
MODIFY `facturadetalleid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lineapedido`
--
ALTER TABLE `lineapedido`
MODIFY `detallepedidoid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `productoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturadetalle`
--
ALTER TABLE `facturadetalle`
ADD CONSTRAINT `facturadetalle_ibfk_1` FOREIGN KEY (`facturaId`) REFERENCES `factura` (`facturaId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `facturadetalle_ibfk_2` FOREIGN KEY (`productoId`) REFERENCES `producto` (`productoId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lineapedido`
--
ALTER TABLE `lineapedido`
ADD CONSTRAINT `lineapedido_ibfk_1` FOREIGN KEY (`pedidoid`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `lineapedido_ibfk_2` FOREIGN KEY (`productoid`) REFERENCES `producto` (`productoId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
