-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2014 a las 16:01:53
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador_restaurant`
--

CREATE TABLE IF NOT EXISTS `administrador_restaurant` (
`idAdministrador_restaurant` int(11) NOT NULL,
  `Adm_nombre` varchar(45) NOT NULL,
  `Adm_apellidoPaterno` varchar(45) DEFAULT NULL,
  `Adm_apellidoMaterno` varchar(45) DEFAULT NULL,
  `Adm_rut` varchar(45) NOT NULL,
  `Adm_email` varchar(45) NOT NULL,
  `Adm_direccion` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `administrador_restaurant`
--

INSERT INTO `administrador_restaurant` (`idAdministrador_restaurant`, `Adm_nombre`, `Adm_apellidoPaterno`, `Adm_apellidoMaterno`, `Adm_rut`, `Adm_email`, `Adm_direccion`) VALUES
(1, 'a', 'q', 'q', 'q', 'q', 'q'),
(2, 'a', 'a', 'a', '1', 'a', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidas`
--

CREATE TABLE IF NOT EXISTS `bebidas` (
`idBebidas` int(11) NOT NULL,
  `Bebidas_nombre` varchar(45) NOT NULL,
  `Bebidas_descripcion` varchar(45) DEFAULT NULL,
  `Bebidas_precio` int(11) NOT NULL,
  `Restaurant_idRestaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`idCliente` int(11) NOT NULL,
  `Cliente_nombre` varchar(45) NOT NULL,
  `Cliente_apellidoPaterno` varchar(45) NOT NULL,
  `Cliente_apellidoMaterno` varchar(45) NOT NULL,
  `Cliente_rut` varchar(45) NOT NULL,
  `Cliente_email` varchar(45) NOT NULL,
  `Cliente_direccion` varchar(400) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `Cliente_nombre`, `Cliente_apellidoPaterno`, `Cliente_apellidoMaterno`, `Cliente_rut`, `Cliente_email`, `Cliente_direccion`) VALUES
(1, 'a', 'a', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ensaladas`
--

CREATE TABLE IF NOT EXISTS `ensaladas` (
`idEnsaladas` int(11) NOT NULL,
  `Ensaladas_nombre` varchar(45) NOT NULL,
  `Ensaladas_descripcion` varchar(45) DEFAULT NULL,
  `Ensaladas_precio` int(11) NOT NULL,
  `Restaurant_idRestaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE IF NOT EXISTS `mesa` (
`Nro_mesa` int(11) NOT NULL,
  `Mesa_fecha` date NOT NULL,
  `Mesa_hora` time NOT NULL,
  `Mesa_cantPersonas` int(11) NOT NULL,
  `Restaurant_idRestaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE IF NOT EXISTS `platos` (
`idPlatos` int(11) NOT NULL,
  `Platos_nombre` varchar(45) NOT NULL,
  `Platos_descripcion` varchar(100) DEFAULT NULL,
  `Platos_precio` int(11) NOT NULL,
  `Restaurant_idRestaurant` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`idPlatos`, `Platos_nombre`, `Platos_descripcion`, `Platos_precio`, `Restaurant_idRestaurant`) VALUES
(6, 'SAKANATATAKI', 'Cubitos de pescado con aceite de sesamo, jeng', 5900, 6),
(7, 'SAKANATATAKI ESPECIAL', 'Cubitos de pescado y pulpo con jengibre, cebo', 6200, 6),
(8, 'CARPACCIO PULPO', 'Laminas de pulpo con salsa de aceitunas', 6200, 6),
(9, 'IKA FURAY', 'calamar apanado en panko con salsa tonkatsu', 5900, 6),
(10, 'SAKE FURAY', 'Salmon apanado en panko con salsa tonkatsu', 5900, 6),
(11, 'EBI FURAY', 'camaron ecuatoriano apanado en pankocon salsa', 6200, 6),
(12, 'TATAKY SAKE SALAD', '9 cortes de salmon sellado sobre mix de verde', 6900, 6),
(13, 'MASAGO SPICY', 'Salmon, camaron y cebollin, topping de srirach', 3800, 6),
(14, 'SAMURAI ROLL', 'Camaron, pulpo y cebollin, topping de srirach', 4000, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
`idReserva` int(11) NOT NULL,
  `Reserva_fecha` date NOT NULL,
  `Reserva_hora` time NOT NULL,
  `Reserva_cantPersonas` int(11) NOT NULL,
  `Mesa_Nro_mesa` int(11) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
`idRestaurant` int(11) NOT NULL,
  `Rest_nombre` varchar(45) NOT NULL,
  `Rest_tipo` varchar(45) NOT NULL,
  `Rest_descripcion` varchar(400) NOT NULL,
  `Rest_caracteristicas` varchar(400) NOT NULL,
  `Rest_email` varchar(45) NOT NULL,
  `Rest_direccion` varchar(45) NOT NULL,
  `Administrador_restaurant_idAdministrador_restaurant` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `restaurant`
--

INSERT INTO `restaurant` (`idRestaurant`, `Rest_nombre`, `Rest_tipo`, `Rest_descripcion`, `Rest_caracteristicas`, `Rest_email`, `Rest_direccion`, `Administrador_restaurant_idAdministrador_restaurant`) VALUES
(6, 'SUSHIHOME', 'Comida japonesa', '"En sushihome te sentiras de verdad en japon, nuestros platos son el fundamento perfecto para vivir el lejano oriente', '', 'daniel18.df@gmail.com', 'Avenida centrar 191, Reñaca bajo, Viña del ma', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador_restaurant`
--
ALTER TABLE `administrador_restaurant`
 ADD PRIMARY KEY (`idAdministrador_restaurant`), ADD UNIQUE KEY `idAdministrador_restaurant_UNIQUE` (`idAdministrador_restaurant`), ADD UNIQUE KEY `Adm-rut_UNIQUE` (`Adm_rut`), ADD UNIQUE KEY `Adm_email_UNIQUE` (`Adm_email`);

--
-- Indices de la tabla `bebidas`
--
ALTER TABLE `bebidas`
 ADD PRIMARY KEY (`idBebidas`), ADD KEY `fk_Bebidas_Restaurant1_idx` (`Restaurant_idRestaurant`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`idCliente`), ADD UNIQUE KEY `Cliente_rut_UNIQUE` (`Cliente_rut`), ADD UNIQUE KEY `Cliente_email_UNIQUE` (`Cliente_email`);

--
-- Indices de la tabla `ensaladas`
--
ALTER TABLE `ensaladas`
 ADD PRIMARY KEY (`idEnsaladas`), ADD KEY `fk_Ensaladas_Restaurant1_idx` (`Restaurant_idRestaurant`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
 ADD PRIMARY KEY (`Nro_mesa`), ADD KEY `fk_Mesa_Restaurant1_idx` (`Restaurant_idRestaurant`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
 ADD PRIMARY KEY (`idPlatos`), ADD KEY `fk_Platos_Restaurant1_idx` (`Restaurant_idRestaurant`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
 ADD PRIMARY KEY (`idReserva`), ADD KEY `fk_Reserva_Mesa1_idx` (`Mesa_Nro_mesa`), ADD KEY `fk_Reserva_Cliente1_idx` (`Cliente_idCliente`);

--
-- Indices de la tabla `restaurant`
--
ALTER TABLE `restaurant`
 ADD PRIMARY KEY (`idRestaurant`), ADD UNIQUE KEY `idRestaurant_UNIQUE` (`idRestaurant`), ADD UNIQUE KEY `Rest_nombre_UNIQUE` (`Rest_nombre`), ADD UNIQUE KEY `Rest_email_UNIQUE` (`Rest_email`), ADD KEY `fk_Restaurant_Administrador_restaurant_idx` (`Administrador_restaurant_idAdministrador_restaurant`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador_restaurant`
--
ALTER TABLE `administrador_restaurant`
MODIFY `idAdministrador_restaurant` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `bebidas`
--
ALTER TABLE `bebidas`
MODIFY `idBebidas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ensaladas`
--
ALTER TABLE `ensaladas`
MODIFY `idEnsaladas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
MODIFY `Nro_mesa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
MODIFY `idPlatos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `restaurant`
--
ALTER TABLE `restaurant`
MODIFY `idRestaurant` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bebidas`
--
ALTER TABLE `bebidas`
ADD CONSTRAINT `fk_Bebidas_Restaurant1` FOREIGN KEY (`Restaurant_idRestaurant`) REFERENCES `restaurant` (`idRestaurant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ensaladas`
--
ALTER TABLE `ensaladas`
ADD CONSTRAINT `fk_Ensaladas_Restaurant1` FOREIGN KEY (`Restaurant_idRestaurant`) REFERENCES `restaurant` (`idRestaurant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mesa`
--
ALTER TABLE `mesa`
ADD CONSTRAINT `fk_Mesa_Restaurant1` FOREIGN KEY (`Restaurant_idRestaurant`) REFERENCES `restaurant` (`idRestaurant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
ADD CONSTRAINT `fk_Platos_Restaurant1` FOREIGN KEY (`Restaurant_idRestaurant`) REFERENCES `restaurant` (`idRestaurant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
ADD CONSTRAINT `fk_Reserva_Cliente1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Reserva_Mesa1` FOREIGN KEY (`Mesa_Nro_mesa`) REFERENCES `mesa` (`Nro_mesa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `restaurant`
--
ALTER TABLE `restaurant`
ADD CONSTRAINT `fk_Restaurant_Administrador_restaurant` FOREIGN KEY (`Administrador_restaurant_idAdministrador_restaurant`) REFERENCES `administrador_restaurant` (`idAdministrador_restaurant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
