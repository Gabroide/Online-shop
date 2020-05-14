-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-03-2017 a las 15:54:47
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda2017`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcaracteristica`
--

CREATE TABLE IF NOT EXISTS `tblcaracteristica` (
  `idCaracteristica` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(150) NOT NULL,
  `refPadre` int(11) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `intOrden` int(11) NOT NULL,
  PRIMARY KEY (`idCaracteristica`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `tblcaracteristica`
--

INSERT INTO `tblcaracteristica` (`idCaracteristica`, `strNombre`, `refPadre`, `intEstado`, `intOrden`) VALUES
(1, 'Motor', 0, 1, 1),
(2, 'Cilindrada', 0, 1, 2),
(3, 'Tipo Retrovisor', 0, 1, 3),
(4, 'Cambio de marchas', 0, 1, 4),
(5, 'Automático', 4, 1, 1),
(6, 'Manual', 4, 1, 2),
(7, '200CV', 2, 1, 1),
(8, '300CV', 2, 1, 2),
(9, '400CV', 2, 1, 3),
(10, '500CV', 2, 1, 4),
(11, '1200CV', 2, 1, 5),
(12, 'Diesel', 1, 1, 1),
(13, 'Gasolina', 1, 1, 2),
(14, 'GLP', 1, 1, 3),
(15, 'Standard', 3, 1, 1),
(16, 'Guía láser', 3, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcarrito`
--

CREATE TABLE IF NOT EXISTS `tblcarrito` (
  `idContador` int(11) NOT NULL AUTO_INCREMENT,
  `refUsuario` int(11) NOT NULL,
  `refProducto` int(11) NOT NULL,
  `intCantidad` int(11) NOT NULL,
  `intTransaccionEfectuada` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idContador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `tblcarrito`
--

INSERT INTO `tblcarrito` (`idContador`, `refUsuario`, `refProducto`, `intCantidad`, `intTransaccionEfectuada`) VALUES
(36, 14, 6, 3, 3),
(37, 5, 1, 1, 4),
(39, 5, 1, 2, 5),
(40, 5, 1, 3, 5),
(41, 5, 5, 1, 6),
(42, 5, 4, 1, 7),
(43, 5, 1, 1, 0),
(44, 1, 1, 1, 0),
(45, 1, 6, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcarritodetalle`
--

CREATE TABLE IF NOT EXISTS `tblcarritodetalle` (
  `idContadorDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `refCarrito` int(11) NOT NULL,
  `refOpcion` int(11) NOT NULL,
  `refOpcionSeleccionada` int(11) NOT NULL,
  PRIMARY KEY (`idContadorDetalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `tblcarritodetalle`
--

INSERT INTO `tblcarritodetalle` (`idContadorDetalle`, `refCarrito`, `refOpcion`, `refOpcionSeleccionada`) VALUES
(12, 17, 2, 5),
(13, 17, 8, 9),
(14, 18, 2, 6),
(15, 18, 8, 9),
(18, 20, 2, 5),
(19, 20, 8, 10),
(20, 22, 2, 5),
(21, 22, 8, 9),
(22, 23, 2, 5),
(23, 23, 8, 9),
(24, 25, 2, 6),
(25, 25, 8, 9),
(26, 26, 2, 5),
(27, 26, 8, 9),
(28, 27, 2, 6),
(29, 27, 8, 10),
(30, 31, 2, 5),
(31, 31, 8, 9),
(32, 32, 2, 5),
(33, 32, 8, 9),
(34, 33, 2, 5),
(35, 33, 8, 9),
(36, 35, 2, 5),
(37, 35, 8, 9),
(38, 37, 2, 5),
(39, 37, 8, 9),
(40, 38, 2, 5),
(41, 38, 8, 9),
(42, 39, 2, 5),
(43, 39, 8, 9),
(44, 40, 2, 5),
(45, 40, 8, 10),
(46, 43, 2, 5),
(47, 43, 8, 9),
(48, 44, 2, 5),
(49, 44, 8, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoria`
--

CREATE TABLE IF NOT EXISTS `tblcategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `strSEO` varchar(50) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `refPadre` int(11) NOT NULL,
  `intOrden` int(11) NOT NULL,
  `intPrincipal` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tblcategoria`
--

INSERT INTO `tblcategoria` (`idCategoria`, `strNombre`, `strSEO`, `intEstado`, `refPadre`, `intOrden`, `intPrincipal`) VALUES
(1, 'Baratos', 'baratos', 1, 0, 1, 0),
(3, 'Outlet', 'outlet', 1, 0, 2, 0),
(4, 'Rápidos', 'rapidos', 1, 0, 54, 0),
(5, 'Último modelo', 'ultimo-modelo', 1, 0, 22222, 1),
(6, 'Volante a la izquierda', 'volante-a-la-izquierda', 1, 1, 2, 0),
(11, 'Volante a la derecha', 'volante-a-la-derecha', 1, 1, 2, 0),
(12, 'Coche Japonés', 'coche-japones', 1, 11, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcomentario`
--

CREATE TABLE IF NOT EXISTS `tblcomentario` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `refProducto` int(11) NOT NULL,
  `intEstado` int(11) NOT NULL DEFAULT '0',
  `strNombreComentador` varchar(50) NOT NULL,
  `strFecha` datetime NOT NULL,
  `refUsuario` int(11) NOT NULL DEFAULT '0',
  `txtComentario` text NOT NULL,
  PRIMARY KEY (`idComentario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tblcomentario`
--

INSERT INTO `tblcomentario` (`idComentario`, `refProducto`, `intEstado`, `strNombreComentador`, `strFecha`, `refUsuario`, `txtComentario`) VALUES
(1, 1, 1, '0', '2017-03-29 09:44:19', 0, 'wrg ewrgf wf ewf '),
(2, 1, 1, 'Prueba', '2017-03-29 09:45:10', 0, 'Me gusta mucho este producto'),
(3, 1, 1, 'Jorge', '2017-03-29 11:40:16', 0, 'No me gusta mucho'),
(8, 1, 1, 'Registrado', '2017-03-29 11:58:59', 5, 'Pues ahora si que si'),
(9, 1, 1, 'Registrado', '2017-03-29 12:11:29', 5, 'Me parece un buen producto\r\nPero me parece muy caro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcomparar`
--

CREATE TABLE IF NOT EXISTS `tblcomparar` (
  `idComparar` int(11) NOT NULL AUTO_INCREMENT,
  `refUsuario` int(11) NOT NULL,
  `refProducto` int(11) NOT NULL,
  PRIMARY KEY (`idComparar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tblcomparar`
--

INSERT INTO `tblcomparar` (`idComparar`, `refUsuario`, `refProducto`) VALUES
(8, 5, 8),
(9, 5, 2),
(10, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcompra`
--

CREATE TABLE IF NOT EXISTS `tblcompra` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `fchCompra` datetime NOT NULL,
  `intTipoPago` int(11) NOT NULL,
  `dblTotalIVA` double(8,2) NOT NULL,
  `dblTotalsinIVA` double(8,2) NOT NULL,
  `intFacturacion` int(11) NOT NULL,
  `intEnvio` int(11) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `intZona` int(11) NOT NULL,
  `strNombre` varchar(50) NOT NULL,
  `strDireccion` varchar(50) NOT NULL,
  `strProvincia` varchar(50) NOT NULL,
  `strPais` varchar(50) NOT NULL,
  `strCP` varchar(10) NOT NULL,
  `strEmail` varchar(100) NOT NULL,
  `strTelefono` varchar(50) NOT NULL,
  PRIMARY KEY (`idCompra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tblcompra`
--

INSERT INTO `tblcompra` (`idCompra`, `idUsuario`, `fchCompra`, `intTipoPago`, `dblTotalIVA`, `dblTotalsinIVA`, `intFacturacion`, `intEnvio`, `intEstado`, `intZona`, `strNombre`, `strDireccion`, `strProvincia`, `strPais`, `strCP`, `strEmail`, `strTelefono`) VALUES
(3, 14, '2017-03-21 18:07:36', 1, 181600.00, 150000.00, 0, 0, 0, 2, 'Jorge', 'C/ Pato, 3', 'Valencia', 'España', '46776', 'jorvidu@gmail.com', '123456789'),
(4, 5, '2017-03-22 12:29:11', 1, 9830.00, 9800.00, 0, 0, 0, 2, 'Pepe', 'Lopez', 'Valencia', 'España', '2343', 'pepe@pdpd.com', '879879'),
(5, 5, '2017-03-27 18:22:39', 1, 49023.00, 49000.00, 0, 0, 0, 1, 'Pepe', 'Lopez', 'Valencia', 'España', '2343', 'pepe@pdpd.com', '879879'),
(6, 5, '2017-03-27 18:22:59', 1, 6799.00, 5600.00, 0, 0, 0, 1, 'Pepe', 'Lopez', 'Valencia', 'España', '2343', 'pepe@pdpd.com', '879879'),
(7, 5, '2017-03-27 18:24:39', 1, 306.00, 234.00, 0, 0, 0, 1, 'Pepe', 'Lopez', 'Valencia', 'España', '2343', 'pepe@pdpd.com', '879879');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconfiguracion`
--

CREATE TABLE IF NOT EXISTS `tblconfiguracion` (
  `idConfiguracion` int(11) NOT NULL AUTO_INCREMENT,
  `strTelefono` varchar(50) NOT NULL,
  `strEmail` varchar(50) NOT NULL,
  `strLogo` varchar(50) NOT NULL,
  `intMarcas` int(11) NOT NULL,
  `intImpuesto` int(11) NOT NULL,
  `strPAYPAL_url` varchar(200) NOT NULL,
  `strPAYPAL_email` varchar(100) NOT NULL,
  `strCAIXA_url` varchar(200) NOT NULL,
  `strCAIXA_fuc` varchar(100) NOT NULL,
  `strCAIXA_terminal` varchar(10) NOT NULL,
  `strCAIXA_version` varchar(100) NOT NULL,
  `strCAIXA_clave` varchar(100) NOT NULL,
  `strSANTANDER_url` varchar(200) NOT NULL,
  `strSANTANDER_merchantid` varchar(100) NOT NULL,
  `strSANTANDER_secret` varchar(100) NOT NULL,
  `strSANTANDER_account` varchar(100) NOT NULL,
  `intTransferencia` int(11) NOT NULL,
  `intPaypal` int(11) NOT NULL,
  `intCaixa` int(11) NOT NULL,
  `intSantander` int(11) NOT NULL,
  `strURL` varchar(100) NOT NULL,
  `dblDescuento` double NOT NULL,
  PRIMARY KEY (`idConfiguracion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tblconfiguracion`
--

INSERT INTO `tblconfiguracion` (`idConfiguracion`, `strTelefono`, `strEmail`, `strLogo`, `intMarcas`, `intImpuesto`, `strPAYPAL_url`, `strPAYPAL_email`, `strCAIXA_url`, `strCAIXA_fuc`, `strCAIXA_terminal`, `strCAIXA_version`, `strCAIXA_clave`, `strSANTANDER_url`, `strSANTANDER_merchantid`, `strSANTANDER_secret`, `strSANTANDER_account`, `intTransferencia`, `intPaypal`, `intCaixa`, `intSantander`, `strURL`, `dblDescuento`) VALUES
(1, '', 'jorvidu@gmail.com', 'logo.png', 1, 1, '', '', '', '22222', '', '', '', '', '356345634', '42353459834urfj3hf3kijf', 'rrr', 1, 1, 0, 0, 'http://localhost/tienda2017', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldeseo`
--

CREATE TABLE IF NOT EXISTS `tbldeseo` (
  `idDeseo` int(11) NOT NULL AUTO_INCREMENT,
  `refUsuario` int(11) NOT NULL,
  `refProducto` int(11) NOT NULL,
  PRIMARY KEY (`idDeseo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `tbldeseo`
--

INSERT INTO `tbldeseo` (`idDeseo`, `refUsuario`, `refProducto`) VALUES
(11, 5, 8),
(12, 5, 1),
(13, 5, 2),
(14, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblimpuesto`
--

CREATE TABLE IF NOT EXISTS `tblimpuesto` (
  `idImpuesto` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `dblImpuesto` double NOT NULL,
  PRIMARY KEY (`idImpuesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tblimpuesto`
--

INSERT INTO `tblimpuesto` (`idImpuesto`, `strNombre`, `dblImpuesto`) VALUES
(1, 'IVA 21%', 21),
(2, 'IVA 7%', 7),
(3, 'IVA 2%', 2),
(4, 'IVA 10%', 10),
(5, 'Sin impuesto', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmarca`
--

CREATE TABLE IF NOT EXISTS `tblmarca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `strMarca` varchar(50) NOT NULL,
  `intOrden` int(11) NOT NULL,
  `intEstado` int(11) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tblmarca`
--

INSERT INTO `tblmarca` (`idMarca`, `strMarca`, `intOrden`, `intEstado`) VALUES
(1, 'Peugeot X', 1, 1),
(2, 'Opel', 2, 1),
(3, 'Mercedes', 3, 1),
(4, 'Saab', 4, 1),
(5, 'BMW', 5, 1),
(6, 'Ferrari 23', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmoneda`
--

CREATE TABLE IF NOT EXISTS `tblmoneda` (
  `idMoneda` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `dblValor` double NOT NULL,
  `intPrincipal` int(11) NOT NULL,
  `strSimbolo` varchar(10) NOT NULL,
  PRIMARY KEY (`idMoneda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tblmoneda`
--

INSERT INTO `tblmoneda` (`idMoneda`, `strNombre`, `dblValor`, `intPrincipal`, `strSimbolo`) VALUES
(1, 'Euro', 1, 1, '€'),
(2, 'Dólar Americano', 1.06, 0, '$'),
(3, 'Dólar Canadiense', 1.43, 0, '$');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblopcion`
--

CREATE TABLE IF NOT EXISTS `tblopcion` (
  `idOpcion` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `refPadre` int(11) NOT NULL DEFAULT '0',
  `intEstado` int(11) NOT NULL,
  `intOrden` int(11) NOT NULL,
  `dblIncremento` double(8,2) NOT NULL,
  PRIMARY KEY (`idOpcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tblopcion`
--

INSERT INTO `tblopcion` (`idOpcion`, `strNombre`, `refPadre`, `intEstado`, `intOrden`, `dblIncremento`) VALUES
(1, 'Color', 0, 1, 1, 0.00),
(2, 'Número de Puertas', 0, 1, 10000, 0.00),
(3, 'Rojo 2', 1, 1, 1, 1.99),
(4, 'Azul', 1, 1, 2, 0.00),
(5, '3', 2, 1, 1, 1000.00),
(6, '5', 2, 1, 2, 1500.00),
(7, 'Plateado', 1, 1, 3, 100.00),
(8, 'Color Opel', 0, 1, 1, 0.00),
(9, 'Gris Opel', 8, 1, 1, 0.00),
(10, 'Beige Opel', 8, 1, 2, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpreciogrupo`
--

CREATE TABLE IF NOT EXISTS `tblpreciogrupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `refPadre` int(11) NOT NULL,
  `dblInferior` double NOT NULL,
  `dblSuperior` double NOT NULL,
  `dblCoste` double NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tblpreciogrupo`
--

INSERT INTO `tblpreciogrupo` (`idGrupo`, `strNombre`, `intEstado`, `refPadre`, `dblInferior`, `dblSuperior`, `dblCoste`) VALUES
(1, 'Pack 10 Opel', 1, 0, 0, 0, 0),
(2, 'De 10 a 1000', 1, 1, 10, 1000, 15),
(3, 'De 1000 a 5000', 1, 1, 1001, 5000, 50),
(4, 'Pack General', 1, 0, 0, 0, 0),
(5, 'De 10 a 100', 1, 4, 10, 100, 5),
(6, 'De 11 a 25', 1, 4, 11, 25, 8),
(7, 'De 26 hasta 1000000', 1, 4, 26, 1000000, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproducto`
--

CREATE TABLE IF NOT EXISTS `tblproducto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `strSEO` varchar(100) NOT NULL,
  `refCategoria1` int(11) NOT NULL,
  `strImagen1` varchar(50) DEFAULT NULL,
  `strDescripcion` text NOT NULL,
  `dblPrecio` double(8,2) NOT NULL,
  `dblPrecioAnterior` int(11) NOT NULL DEFAULT '0',
  `intEstado` int(11) NOT NULL,
  `refMarca` int(11) NOT NULL,
  `refCategoria2` int(11) NOT NULL,
  `refCategoria3` int(11) NOT NULL,
  `refCategoria4` int(11) NOT NULL,
  `refCategoria5` int(11) NOT NULL,
  `strImagen2` varchar(50) DEFAULT NULL,
  `strImagen3` varchar(50) DEFAULT NULL,
  `strImagen4` varchar(50) DEFAULT NULL,
  `strImagen5` varchar(50) DEFAULT NULL,
  `intPrincipal` int(11) NOT NULL DEFAULT '0',
  `intStock` int(11) NOT NULL DEFAULT '10',
  `refImpuesto` int(11) NOT NULL,
  `dblPeso` int(11) NOT NULL,
  `refGrupo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `tblproducto`
--

INSERT INTO `tblproducto` (`idProducto`, `strNombre`, `strSEO`, `refCategoria1`, `strImagen1`, `strDescripcion`, `dblPrecio`, `dblPrecioAnterior`, `intEstado`, `refMarca`, `refCategoria2`, `refCategoria3`, `refCategoria4`, `refCategoria5`, `strImagen2`, `strImagen3`, `strImagen4`, `strImagen5`, `intPrincipal`, `intStock`, `refImpuesto`, `dblPeso`, `refGrupo`) VALUES
(1, 'Opel África', 'opel-africa', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 9800.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', NULL, NULL, 1, 8, 1, 8, 1),
(2, 'Seat América ', 'seat-america', 1, NULL, '<p>Coche muy espacioso</p>', 8100.00, 0, 1, 6, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 1, 10, 2, 0, 0),
(3, '867', '345345', 1, NULL, '87', 87.00, 0, 1, 5, 6, 0, 0, 0, NULL, NULL, NULL, NULL, 1, 10, 3, 0, 0),
(4, 'xxxx', 'xxxx', 1, NULL, '<p>xscwecfwef</p>', 234.00, 0, 1, 6, 6, 3, 0, 0, NULL, NULL, NULL, NULL, 1, 10, 1, 0, 0),
(5, 'Peugueot Frontera', 'peugueot-frontera', 1, 'coche2.jpg', '<p>Coche muy interesante</p>', 5600.00, 0, 1, 6, 5, 6, 5, 0, NULL, 'sale.png', 'new.png', NULL, 0, 10, 1, 0, 0),
(6, 'Cabriolo', 'cabriolo', 1, 'coche4.jpg', '<p>Potencia sin control</p>', 50000.00, 0, 1, 6, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 1, 10, 1, 10, 0),
(7, 'f2e', 'f2e', 1, NULL, 'f2f', 24.00, 0, 1, 0, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 1, 10, 1, 0, 0),
(8, 'Mercedes Calixto', 'mercedes-calixto', 1, 'coche3.jpg', '<p>Escribir Descripci&oacute;n</p>', 20000.00, 0, 1, 3, 6, 12, 0, 0, NULL, NULL, NULL, NULL, 1, 10, 1, 0, 0),
(9, 'Seat América', 'seat-america-2', 11, NULL, '<p>Coche muy espacioso</p>', 125.00, 0, 1, 0, 0, 6, 0, 0, NULL, NULL, NULL, NULL, 1, 10, 1, 0, 0),
(10, 'Seat África 2', 'seat-africa-2', 6, '0', '<p>Coche grande y espacioso</p>', 123.00, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 1, 10, 1, 0, 0),
(11, 'Opel África 3', 'opel-africa3', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 9800.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', 1, 8, 5, 8, 0),
(12, 'Opel África 4', 'opel-africa4', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 7800.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', 1, 8, 5, 8, 0),
(13, 'Opel África 5', 'opel-africa5', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 5000.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', 1, 8, 5, 8, 0),
(14, 'Opel África 6', 'opel-africa6', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 4000.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', 1, 8, 5, 8, 0),
(15, 'Opel África 7', 'opel-africa7', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 3000.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', 1, 8, 5, 8, 0),
(16, 'Opel África 8', 'opel-africa8', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 2000.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', 1, 8, 5, 8, 0),
(17, 'Opel África 9', 'opel-africa9', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 1500.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', 1, 8, 5, 8, 0),
(18, 'Opel África 10', 'opel-africa10', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 1254.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', 1, 8, 5, 8, 0),
(19, 'Opel África 11', 'opel-africa11', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 4454.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', 1, 8, 5, 8, 0),
(20, 'Opel África 12', 'opel-africa12', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 454.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', 1, 8, 5, 8, 0),
(21, 'Opel África 13', 'opel-africa13', 1, 'coche1.jpg', '<p>Coche grande y espacioso</p>', 5554.00, 10500, 1, 6, 6, 0, 0, 0, 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', 1, 8, 5, 8, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductocaracteristica`
--

CREATE TABLE IF NOT EXISTS `tblproductocaracteristica` (
  `idProductocaracteristica` int(11) NOT NULL AUTO_INCREMENT,
  `refProducto` int(11) NOT NULL,
  `refCaracteristica` int(11) NOT NULL,
  `refSeleccionada` int(11) NOT NULL,
  PRIMARY KEY (`idProductocaracteristica`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `tblproductocaracteristica`
--

INSERT INTO `tblproductocaracteristica` (`idProductocaracteristica`, `refProducto`, `refCaracteristica`, `refSeleccionada`) VALUES
(16, 8, 1, 13),
(17, 8, 2, 8),
(18, 8, 3, 15),
(22, 11, 1, 12),
(23, 11, 2, 7),
(24, 1, 1, 14),
(25, 1, 2, 7),
(26, 1, 3, 15),
(27, 12, 1, 12),
(28, 12, 2, 7),
(29, 13, 1, 12),
(30, 13, 2, 7),
(31, 14, 1, 12),
(32, 14, 2, 7),
(33, 15, 1, 12),
(34, 15, 2, 7),
(39, 5, 1, 13),
(40, 5, 2, 10),
(41, 5, 3, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductoopcion`
--

CREATE TABLE IF NOT EXISTS `tblproductoopcion` (
  `idProductoOpcion` int(11) NOT NULL AUTO_INCREMENT,
  `refProducto` int(11) NOT NULL,
  `refOpcion` int(11) NOT NULL,
  PRIMARY KEY (`idProductoOpcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tblproductoopcion`
--

INSERT INTO `tblproductoopcion` (`idProductoOpcion`, `refProducto`, `refOpcion`) VALUES
(7, 2, 1),
(8, 1, 8),
(9, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductovisita`
--

CREATE TABLE IF NOT EXISTS `tblproductovisita` (
  `idProductovisita` int(11) NOT NULL AUTO_INCREMENT,
  `refUsuario` int(11) NOT NULL,
  `refProducto` int(11) NOT NULL,
  `fchFecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idProductovisita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `tblproductovisita`
--

INSERT INTO `tblproductovisita` (`idProductovisita`, `refUsuario`, `refProducto`, `fchFecha`) VALUES
(20, 5, 6, '2017-03-26 20:04:07'),
(21, 5, 6, '2017-03-26 20:04:14'),
(22, 5, 1, '2017-03-26 20:04:18'),
(23, 5, 2, '2017-03-26 20:04:28'),
(24, 5, 3, '2017-03-26 20:04:32'),
(25, 5, 6, '2017-03-26 20:05:28'),
(26, 5, 8, '2017-03-26 20:39:34'),
(27, 5, 1, '2017-03-26 21:23:53'),
(28, 5, 1, '2017-03-26 21:44:29'),
(29, 5, 1, '2017-03-26 21:44:50'),
(30, 5, 1, '2017-03-26 21:44:53'),
(31, 5, 1, '2017-03-26 21:45:51'),
(32, 5, 1, '2017-03-26 21:45:55'),
(33, 5, 8, '2017-03-27 09:32:12'),
(34, 5, 1, '2017-03-27 09:48:34'),
(35, 5, 8, '2017-03-27 10:03:20'),
(36, 5, 5, '2017-03-27 14:08:25'),
(37, 5, 1, '2017-03-27 14:13:35'),
(38, 5, 8, '2017-03-27 14:49:27'),
(39, 5, 5, '2017-03-27 14:49:30'),
(40, 5, 15, '2017-03-27 14:49:47'),
(41, 5, 12, '2017-03-27 14:49:51'),
(42, 5, 1, '2017-03-27 15:44:36'),
(43, 5, 1, '2017-03-27 15:44:48'),
(44, 5, 5, '2017-03-27 16:22:49'),
(45, 5, 4, '2017-03-27 16:24:31'),
(46, 5, 1, '2017-03-29 09:51:41'),
(47, 5, 1, '2017-03-29 09:51:55'),
(48, 5, 1, '2017-03-29 09:57:14'),
(49, 5, 1, '2017-03-29 09:58:36'),
(50, 5, 1, '2017-03-29 09:58:37'),
(51, 5, 1, '2017-03-29 09:58:59'),
(52, 5, 1, '2017-03-29 10:11:29'),
(53, 5, 1, '2017-03-29 11:30:37'),
(54, 5, 1, '2017-03-29 11:32:46'),
(55, 5, 1, '2017-03-29 11:33:04'),
(56, 5, 1, '2017-03-29 11:40:58'),
(57, 5, 1, '2017-03-29 11:42:04'),
(58, 5, 1, '2017-03-29 14:11:12'),
(59, 5, 1, '2017-03-29 14:24:26'),
(60, 1, 1, '2017-03-29 14:46:53'),
(61, 1, 6, '2017-03-29 14:46:59'),
(62, 1, 6, '2017-03-29 14:47:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblslider`
--

CREATE TABLE IF NOT EXISTS `tblslider` (
  `idSlider` int(11) NOT NULL AUTO_INCREMENT,
  `strTexto` text NOT NULL,
  `strImagen` varchar(100) NOT NULL,
  `strLink` varchar(200) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `intOrden` int(11) NOT NULL,
  PRIMARY KEY (`idSlider`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tblslider`
--

INSERT INTO `tblslider` (`idSlider`, `strTexto`, `strImagen`, `strLink`, `intEstado`, `intOrden`) VALUES
(1, '<h1>El mejor coche</h1>\r\n<h2>Con las mejores caracter&iacute;sticas</h2>\r\n<p>Esto es un coche de verdad, y lo dem&aacute;s intentos baratos.</p>', 'slide2.jpg', '/baratos/opel-africa.html', 1, 1),
(2, '<h1>Ahora es el momento</h1>\r\n<h2>Por fin veh&iacute;culos de lujo</h2>\r\n<p>Las mejores caracter&iacute;sticas.</p>', 'slide3.jpg', '/baratos/volante-a-la-derecha/coche-japones/', 1, 2),
(3, '<h1>Y los mejores recambios</h1>\r\n<h2>Precios imposibles</h2>\r\n<p>Cons&uacute;ltenos sin compromiso.</p>', 'slide1.jpg', '/baratos/volante-a-la-derecha/coche-japones/', 1, 3),
(4, '<h1>El mejor coche</h1>\r\n<h2>Con las mejores caracter&iacute;sticas</h2>\r\n<p>Esto es un coche de verdad, y lo dem&aacute;s intentos baratos.</p>', 'slide2.jpg', '/baratos/volante-a-la-derecha/coche-japones/', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE IF NOT EXISTS `tblusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `strEmail` varchar(50) DEFAULT NULL,
  `strPassword` varchar(50) DEFAULT NULL,
  `strNombre` varchar(30) DEFAULT NULL,
  `intNivel` int(11) NOT NULL DEFAULT '0',
  `intEstado` int(11) NOT NULL DEFAULT '1',
  `strImagen` varchar(50) DEFAULT NULL,
  `fchAlta` datetime NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `strEmail` (`strEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`idUsuario`, `strEmail`, `strPassword`, `strNombre`, `intNivel`, `intEstado`, `strImagen`, `fchAlta`) VALUES
(1, 'sdfrrdsf@333fsd.com', '26fe0cdfe99bfa306e31733c4e2b17dc', 'Pepe López', 0, 1, 'face2.jpg', '0000-00-00 00:00:00'),
(2, 'jorvidu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Jorge', 1, 1, '', '0000-00-00 00:00:00'),
(3, 'wdfdes@fsdf.com', '42be65bff2c5725e883a43de69147c85', '0980', 10, 1, '', '0000-00-00 00:00:00'),
(4, '345345@dsgftd.comn', 'a06cef7b78ecfb2461fe6ab2ac847fa0', '876', 100, 1, '', '0000-00-00 00:00:00'),
(5, 'publico@fsdf.com', '4ede4fbf6e52d6dd0f25ad91c016db82', 'Felipe', 0, 1, NULL, '0000-00-00 00:00:00'),
(6, 'dksjf@sdfdsf.com', 'df6d2338b2b8fce1ec2f6dda0a630eb0', 'Luis José', 0, 1, 'facerisas.jpg', '0000-00-00 00:00:00'),
(8, 'wefwf', '5f9a177892f1e4ecb3484ba5a82fb813', 'fewfe', 0, 1, NULL, '0000-00-00 00:00:00'),
(9, 'ergerg@dsfgf.com', '92daa86ad43a42f28f4bf58e94667c95', '09u', 0, 1, NULL, '0000-00-00 00:00:00'),
(10, NULL, NULL, NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(11, NULL, NULL, NULL, 0, 1, NULL, '2017-03-11 16:45:34'),
(12, NULL, NULL, NULL, 0, 1, NULL, '2017-03-13 19:46:31'),
(13, NULL, NULL, NULL, 0, 1, NULL, '2017-03-15 12:56:56'),
(14, NULL, NULL, NULL, 0, 1, NULL, '2017-03-21 15:45:18'),
(15, NULL, NULL, NULL, 0, 1, NULL, '2017-03-22 12:25:18'),
(16, 'rrr@rrr.com', 'f41594481f23b99efd7a3b4b6a4f8fdc', 'Pepe', 0, 1, NULL, '0000-00-00 00:00:00'),
(17, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(18, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(19, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(20, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(21, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(22, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(23, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(24, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(25, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(26, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(27, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(28, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(29, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(30, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(31, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(32, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(33, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(34, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(35, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(36, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(37, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(38, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, 1, NULL, '0000-00-00 00:00:00'),
(39, 'xxx@xxx.xom', '9dc096e5ba9292ce87406d1be59c2358', 'xxx', 0, 1, NULL, '0000-00-00 00:00:00'),
(40, 'telefonico-1@tienda.com', '6f9554abfb0b3daab56f933fc71abb42', 'Usuario Telefónico 1', 0, 1, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblzona`
--

CREATE TABLE IF NOT EXISTS `tblzona` (
  `idZona` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `refPadre` int(11) NOT NULL,
  `dblInferior` double NOT NULL,
  `dblSuperior` double NOT NULL,
  `dblCoste` double NOT NULL,
  PRIMARY KEY (`idZona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tblzona`
--

INSERT INTO `tblzona` (`idZona`, `strNombre`, `intEstado`, `refPadre`, `dblInferior`, `dblSuperior`, `dblCoste`) VALUES
(1, 'Europa', 1, 0, 0, 0, 0),
(2, 'EEUU', 1, 0, 0, 0, 0),
(3, 'Peso minimo', 1, 2, -1, 10, 30),
(4, 'Peso Medio', 1, 2, 10, 50, 100),
(5, 'Peso Grande', 1, 2, 50, 100, 120),
(6, 'Peso Gigante', 1, 2, 100, 999999, 125),
(7, 'Zona Única', 1, 1, -1, 999999, 23);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
