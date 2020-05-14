/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : tienda2017

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2017-05-15 13:02:55
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tblcaracteristica`
-- ----------------------------
DROP TABLE IF EXISTS `tblcaracteristica`;
CREATE TABLE `tblcaracteristica` (
  `idCaracteristica` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre_1` varchar(150) NOT NULL,
  `refPadre` int(11) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `intOrden` int(11) NOT NULL,
  `strNombre_2` varchar(150) DEFAULT NULL,
  `strNombre_3` varchar(150) DEFAULT NULL,
  `strNombre_4` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idCaracteristica`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblcaracteristica
-- ----------------------------
INSERT INTO `tblcaracteristica` VALUES ('1', 'Motor', '0', '1', '1', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('2', 'Cilindrada', '0', '1', '2', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('3', 'Tipo Retrovisor', '0', '1', '3', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('4', 'Cambio de marchas', '0', '1', '4', 'Change', null, null);
INSERT INTO `tblcaracteristica` VALUES ('5', 'Automático', '4', '1', '1', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('6', 'Manual', '4', '1', '2', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('7', '200CV', '2', '1', '1', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('8', '300CV', '2', '1', '2', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('9', '400CV', '2', '1', '3', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('10', '500CV', '2', '1', '4', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('11', '1200CV', '2', '1', '5', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('12', 'Diesel', '1', '1', '1', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('13', 'Gasolina', '1', '1', '2', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('14', 'GLP', '1', '1', '3', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('15', 'Standard', '3', '1', '1', null, null, null);
INSERT INTO `tblcaracteristica` VALUES ('16', 'Guía láser', '3', '1', '2', null, null, null);

-- ----------------------------
-- Table structure for `tblcarrito`
-- ----------------------------
DROP TABLE IF EXISTS `tblcarrito`;
CREATE TABLE `tblcarrito` (
  `idContador` int(11) NOT NULL AUTO_INCREMENT,
  `refUsuario` int(11) NOT NULL,
  `refProducto` int(11) NOT NULL,
  `intCantidad` int(11) NOT NULL,
  `intTransaccionEfectuada` int(11) NOT NULL DEFAULT '0',
  `dblTotalProducto` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`idContador`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblcarrito
-- ----------------------------
INSERT INTO `tblcarrito` VALUES ('36', '14', '6', '3', '3', null);
INSERT INTO `tblcarrito` VALUES ('37', '5', '1', '1', '4', null);
INSERT INTO `tblcarrito` VALUES ('39', '5', '1', '2', '5', null);
INSERT INTO `tblcarrito` VALUES ('40', '5', '1', '3', '5', null);
INSERT INTO `tblcarrito` VALUES ('41', '5', '5', '1', '6', null);
INSERT INTO `tblcarrito` VALUES ('42', '5', '4', '1', '7', null);
INSERT INTO `tblcarrito` VALUES ('43', '5', '1', '1', '0', null);
INSERT INTO `tblcarrito` VALUES ('44', '1', '1', '1', '0', null);
INSERT INTO `tblcarrito` VALUES ('45', '1', '6', '1', '0', null);
INSERT INTO `tblcarrito` VALUES ('46', '41', '1', '10', '0', null);
INSERT INTO `tblcarrito` VALUES ('47', '41', '6', '1', '0', null);
INSERT INTO `tblcarrito` VALUES ('48', '42', '1', '1', '0', null);

-- ----------------------------
-- Table structure for `tblcarritodetalle`
-- ----------------------------
DROP TABLE IF EXISTS `tblcarritodetalle`;
CREATE TABLE `tblcarritodetalle` (
  `idContadorDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `refCarrito` int(11) NOT NULL,
  `refOpcion` int(11) NOT NULL,
  `refOpcionSeleccionada` int(11) NOT NULL,
  PRIMARY KEY (`idContadorDetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblcarritodetalle
-- ----------------------------
INSERT INTO `tblcarritodetalle` VALUES ('12', '17', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('13', '17', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('14', '18', '2', '6');
INSERT INTO `tblcarritodetalle` VALUES ('15', '18', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('18', '20', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('19', '20', '8', '10');
INSERT INTO `tblcarritodetalle` VALUES ('20', '22', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('21', '22', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('22', '23', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('23', '23', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('24', '25', '2', '6');
INSERT INTO `tblcarritodetalle` VALUES ('25', '25', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('26', '26', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('27', '26', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('28', '27', '2', '6');
INSERT INTO `tblcarritodetalle` VALUES ('29', '27', '8', '10');
INSERT INTO `tblcarritodetalle` VALUES ('30', '31', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('31', '31', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('32', '32', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('33', '32', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('34', '33', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('35', '33', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('36', '35', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('37', '35', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('38', '37', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('39', '37', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('40', '38', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('41', '38', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('42', '39', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('43', '39', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('44', '40', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('45', '40', '8', '10');
INSERT INTO `tblcarritodetalle` VALUES ('46', '43', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('47', '43', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('48', '44', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('49', '44', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('50', '46', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('51', '46', '8', '9');
INSERT INTO `tblcarritodetalle` VALUES ('52', '48', '2', '5');
INSERT INTO `tblcarritodetalle` VALUES ('53', '48', '8', '9');

-- ----------------------------
-- Table structure for `tblcategoria`
-- ----------------------------
DROP TABLE IF EXISTS `tblcategoria`;
CREATE TABLE `tblcategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre_1` varchar(50) NOT NULL,
  `strSEO_1` varchar(50) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `refPadre` int(11) NOT NULL,
  `intOrden` int(11) NOT NULL,
  `intPrincipal` int(11) NOT NULL DEFAULT '0',
  `strNombre_2` varchar(50) DEFAULT NULL,
  `strSEO_2` varchar(50) DEFAULT NULL,
  `strNombre_3` varchar(50) DEFAULT NULL,
  `strSEO_3` varchar(50) DEFAULT NULL,
  `strNombre_4` varchar(50) DEFAULT NULL,
  `strSEO_4` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblcategoria
-- ----------------------------
INSERT INTO `tblcategoria` VALUES ('1', 'Baratos', 'baratos', '1', '0', '1', '0', 'Cheap', 'cheap', null, null, null, null);
INSERT INTO `tblcategoria` VALUES ('3', 'Outlet', 'outlet', '1', '0', '2', '0', null, null, null, null, null, null);
INSERT INTO `tblcategoria` VALUES ('4', 'Rápidos', 'rapidos', '1', '0', '54', '0', null, null, null, null, null, null);
INSERT INTO `tblcategoria` VALUES ('5', 'Último modelo', 'ultimo-modelo', '1', '0', '22222', '1', null, null, null, null, null, null);
INSERT INTO `tblcategoria` VALUES ('6', 'Volante a la izquierda', 'volante-a-la-izquierda', '1', '1', '2', '0', null, null, null, null, null, null);
INSERT INTO `tblcategoria` VALUES ('11', 'Volante a la derecha', 'volante-a-la-derecha', '1', '1', '2', '0', null, null, null, null, null, null);
INSERT INTO `tblcategoria` VALUES ('12', 'Coche Japonés', 'coche-japones', '1', '11', '1', '1', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `tblcomentario`
-- ----------------------------
DROP TABLE IF EXISTS `tblcomentario`;
CREATE TABLE `tblcomentario` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `refProducto` int(11) NOT NULL,
  `intEstado` int(11) NOT NULL DEFAULT '0',
  `strNombreComentador` varchar(50) NOT NULL,
  `strFecha` datetime NOT NULL,
  `refUsuario` int(11) NOT NULL DEFAULT '0',
  `txtComentario` text NOT NULL,
  PRIMARY KEY (`idComentario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblcomentario
-- ----------------------------
INSERT INTO `tblcomentario` VALUES ('1', '1', '1', '0', '2017-03-29 09:44:19', '0', 'wrg ewrgf wf ewf ');
INSERT INTO `tblcomentario` VALUES ('2', '1', '1', 'Prueba', '2017-03-29 09:45:10', '0', 'Me gusta mucho este producto');
INSERT INTO `tblcomentario` VALUES ('3', '1', '1', 'Jorge', '2017-03-29 11:40:16', '0', 'No me gusta mucho');
INSERT INTO `tblcomentario` VALUES ('8', '1', '1', 'Registrado', '2017-03-29 11:58:59', '5', 'Pues ahora si que si');
INSERT INTO `tblcomentario` VALUES ('9', '1', '1', 'Registrado', '2017-03-29 12:11:29', '5', 'Me parece un buen producto\r\nPero me parece muy caro');

-- ----------------------------
-- Table structure for `tblcomparar`
-- ----------------------------
DROP TABLE IF EXISTS `tblcomparar`;
CREATE TABLE `tblcomparar` (
  `idComparar` int(11) NOT NULL AUTO_INCREMENT,
  `refUsuario` int(11) NOT NULL,
  `refProducto` int(11) NOT NULL,
  PRIMARY KEY (`idComparar`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblcomparar
-- ----------------------------
INSERT INTO `tblcomparar` VALUES ('8', '5', '8');
INSERT INTO `tblcomparar` VALUES ('9', '5', '2');
INSERT INTO `tblcomparar` VALUES ('10', '5', '4');

-- ----------------------------
-- Table structure for `tblcompra`
-- ----------------------------
DROP TABLE IF EXISTS `tblcompra`;
CREATE TABLE `tblcompra` (
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
  `refMoneda` int(11) DEFAULT NULL,
  `txtEmail` text,
  PRIMARY KEY (`idCompra`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblcompra
-- ----------------------------
INSERT INTO `tblcompra` VALUES ('3', '14', '2017-03-21 18:07:36', '1', '181600.00', '150000.00', '0', '0', '0', '2', 'Jorge', 'C/ Pato, 3', 'Valencia', 'España', '46776', 'jorvidu@gmail.com', '123456789', null, null);
INSERT INTO `tblcompra` VALUES ('4', '5', '2017-03-22 12:29:11', '1', '9830.00', '9800.00', '0', '0', '0', '2', 'Pepe', 'Lopez', 'Valencia', 'España', '2343', 'pepe@pdpd.com', '879879', null, null);
INSERT INTO `tblcompra` VALUES ('5', '5', '2017-03-27 18:22:39', '1', '49023.00', '49000.00', '0', '0', '0', '1', 'Pepe', 'Lopez', 'Valencia', 'España', '2343', 'pepe@pdpd.com', '879879', null, null);
INSERT INTO `tblcompra` VALUES ('6', '5', '2017-03-27 18:22:59', '1', '6799.00', '5600.00', '0', '0', '0', '1', 'Pepe', 'Lopez', 'Valencia', 'España', '2343', 'pepe@pdpd.com', '879879', null, null);
INSERT INTO `tblcompra` VALUES ('7', '5', '2017-03-27 18:24:39', '1', '306.00', '234.00', '0', '0', '0', '1', 'Pepe', 'Lopez', 'Valencia', 'España', '2343', 'pepe@pdpd.com', '879879', null, null);

-- ----------------------------
-- Table structure for `tblconfiguracion`
-- ----------------------------
DROP TABLE IF EXISTS `tblconfiguracion`;
CREATE TABLE `tblconfiguracion` (
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
  `strEmailEnvios` varchar(50) DEFAULT NULL,
  `strPassEMailEnvios` varchar(50) DEFAULT NULL,
  `strServidorCorreo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idConfiguracion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblconfiguracion
-- ----------------------------
INSERT INTO `tblconfiguracion` VALUES ('1', '+34 669126284', 'jorvidu@gmail.com', 'logo.png', '1', '1', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'vendedorhigo@gmail.com', '', '22222', '', '', '', '', '356345634', '42353459834urfj3hf3kijf', 'rrr', '1', '1', '0', '0', 'http://localhost/tienda2017', '0', null, null, null);

-- ----------------------------
-- Table structure for `tbldeseo`
-- ----------------------------
DROP TABLE IF EXISTS `tbldeseo`;
CREATE TABLE `tbldeseo` (
  `idDeseo` int(11) NOT NULL AUTO_INCREMENT,
  `refUsuario` int(11) NOT NULL,
  `refProducto` int(11) NOT NULL,
  PRIMARY KEY (`idDeseo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbldeseo
-- ----------------------------
INSERT INTO `tbldeseo` VALUES ('11', '5', '8');
INSERT INTO `tbldeseo` VALUES ('12', '5', '1');
INSERT INTO `tbldeseo` VALUES ('13', '5', '2');
INSERT INTO `tbldeseo` VALUES ('14', '5', '3');
INSERT INTO `tbldeseo` VALUES ('15', '5', '4');
INSERT INTO `tbldeseo` VALUES ('16', '5', '6');

-- ----------------------------
-- Table structure for `tblidioma`
-- ----------------------------
DROP TABLE IF EXISTS `tblidioma`;
CREATE TABLE `tblidioma` (
  `idIdioma` int(11) NOT NULL AUTO_INCREMENT,
  `strIdioma` varchar(20) NOT NULL,
  PRIMARY KEY (`idIdioma`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblidioma
-- ----------------------------
INSERT INTO `tblidioma` VALUES ('1', 'Español');
INSERT INTO `tblidioma` VALUES ('2', 'Inglés');
INSERT INTO `tblidioma` VALUES ('3', 'Francés');
INSERT INTO `tblidioma` VALUES ('4', 'Portugués');

-- ----------------------------
-- Table structure for `tblimpuesto`
-- ----------------------------
DROP TABLE IF EXISTS `tblimpuesto`;
CREATE TABLE `tblimpuesto` (
  `idImpuesto` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `dblImpuesto` double NOT NULL,
  PRIMARY KEY (`idImpuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblimpuesto
-- ----------------------------
INSERT INTO `tblimpuesto` VALUES ('1', 'IVA 21%', '21');
INSERT INTO `tblimpuesto` VALUES ('2', 'IVA 7%', '7');
INSERT INTO `tblimpuesto` VALUES ('3', 'IVA 2%', '2');
INSERT INTO `tblimpuesto` VALUES ('4', 'IVA 10%', '10');
INSERT INTO `tblimpuesto` VALUES ('5', 'Sin impuesto', '0');

-- ----------------------------
-- Table structure for `tblmarca`
-- ----------------------------
DROP TABLE IF EXISTS `tblmarca`;
CREATE TABLE `tblmarca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `strMarca` varchar(50) NOT NULL,
  `intOrden` int(11) NOT NULL,
  `intEstado` int(11) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblmarca
-- ----------------------------
INSERT INTO `tblmarca` VALUES ('1', 'Peugeot X', '1', '1');
INSERT INTO `tblmarca` VALUES ('2', 'Opel', '2', '1');
INSERT INTO `tblmarca` VALUES ('3', 'Mercedes', '3', '1');
INSERT INTO `tblmarca` VALUES ('4', 'Saab', '4', '1');
INSERT INTO `tblmarca` VALUES ('5', 'BMW', '5', '1');
INSERT INTO `tblmarca` VALUES ('6', 'Ferrari 23', '6', '1');

-- ----------------------------
-- Table structure for `tblmoneda`
-- ----------------------------
DROP TABLE IF EXISTS `tblmoneda`;
CREATE TABLE `tblmoneda` (
  `idMoneda` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `dblValor` double NOT NULL,
  `intPrincipal` int(11) NOT NULL,
  `strSimbolo` varchar(10) NOT NULL,
  `strCodificacion` varchar(10) NOT NULL,
  `strHTML` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idMoneda`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblmoneda
-- ----------------------------
INSERT INTO `tblmoneda` VALUES ('1', 'Euro', '1', '1', '€', 'EUR', null);
INSERT INTO `tblmoneda` VALUES ('2', 'Dólar Americano', '1.06', '0', '$', 'USD', null);
INSERT INTO `tblmoneda` VALUES ('3', 'Dólar Canadiense', '1.43', '0', '$', 'CAD', null);

-- ----------------------------
-- Table structure for `tblopcion`
-- ----------------------------
DROP TABLE IF EXISTS `tblopcion`;
CREATE TABLE `tblopcion` (
  `idOpcion` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre_1` varchar(50) NOT NULL,
  `refPadre` int(11) NOT NULL DEFAULT '0',
  `intEstado` int(11) NOT NULL,
  `intOrden` int(11) NOT NULL,
  `dblIncremento` double(8,2) NOT NULL,
  `strNombre_2` varchar(50) DEFAULT NULL,
  `strNombre_3` varchar(50) DEFAULT NULL,
  `strNombre_4` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idOpcion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblopcion
-- ----------------------------
INSERT INTO `tblopcion` VALUES ('1', 'Color', '0', '1', '1', '0.00', null, null, null);
INSERT INTO `tblopcion` VALUES ('2', 'Número de Puertas', '0', '1', '10000', '0.00', '', '', '');
INSERT INTO `tblopcion` VALUES ('3', 'Rojo 2', '1', '1', '1', '1.99', '', '', '');
INSERT INTO `tblopcion` VALUES ('4', 'Azul', '1', '1', '2', '0.00', '', '', '');
INSERT INTO `tblopcion` VALUES ('5', '3', '2', '1', '1', '1000.00', '', '', '');
INSERT INTO `tblopcion` VALUES ('6', '5', '2', '1', '2', '1500.00', '', '', '');
INSERT INTO `tblopcion` VALUES ('7', 'Plateado', '1', '1', '3', '100.00', '', '', '');
INSERT INTO `tblopcion` VALUES ('8', 'Color Super Opel', '0', '1', '1', '0.00', null, null, null);
INSERT INTO `tblopcion` VALUES ('9', 'Gris Opel', '8', '1', '1', '0.00', '', '', '');
INSERT INTO `tblopcion` VALUES ('10', 'Beige Opel', '8', '1', '2', '0.00', '', '', '');

-- ----------------------------
-- Table structure for `tblpreciogrupo`
-- ----------------------------
DROP TABLE IF EXISTS `tblpreciogrupo`;
CREATE TABLE `tblpreciogrupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `refPadre` int(11) NOT NULL,
  `dblInferior` double NOT NULL,
  `dblSuperior` double NOT NULL,
  `dblCoste` double NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblpreciogrupo
-- ----------------------------
INSERT INTO `tblpreciogrupo` VALUES ('1', 'Pack 10 Opel', '1', '0', '0', '0', '0');
INSERT INTO `tblpreciogrupo` VALUES ('2', 'De 10 a 1000', '1', '1', '10', '1000', '15');
INSERT INTO `tblpreciogrupo` VALUES ('3', 'De 1000 a 5000', '1', '1', '1001', '1000000', '50');
INSERT INTO `tblpreciogrupo` VALUES ('4', 'Pack General', '1', '0', '0', '0', '0');
INSERT INTO `tblpreciogrupo` VALUES ('5', 'De 5 a 10', '1', '4', '5', '10', '5');
INSERT INTO `tblpreciogrupo` VALUES ('6', 'De 11 a 25', '1', '4', '11', '25', '8');
INSERT INTO `tblpreciogrupo` VALUES ('7', 'De 26 hasta 1000000', '1', '4', '26', '1000000', '10');

-- ----------------------------
-- Table structure for `tblproducto`
-- ----------------------------
DROP TABLE IF EXISTS `tblproducto`;
CREATE TABLE `tblproducto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre_1` varchar(50) NOT NULL,
  `strSEO_1` varchar(100) NOT NULL,
  `refCategoria1` int(11) NOT NULL,
  `strImagen1` varchar(50) DEFAULT NULL,
  `strDescripcion_1` text NOT NULL,
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
  `strNombre_2` varchar(50) DEFAULT NULL,
  `strDescripcion_2` text,
  `strNombre_3` varchar(50) DEFAULT NULL,
  `strDescripcion_3` text,
  `strNombre_4` varchar(50) DEFAULT NULL,
  `strDescripcion_4` text,
  `strSEO_2` varchar(100) DEFAULT NULL,
  `strSEO_3` varchar(100) DEFAULT NULL,
  `strSEO_4` varchar(100) DEFAULT NULL,
  `strTitleSEO_1` varchar(100) DEFAULT NULL,
  `strTitleSEO_2` varchar(100) DEFAULT NULL,
  `strTitleSEO_3` varchar(100) DEFAULT NULL,
  `strTitleSEO_4` varchar(100) DEFAULT NULL,
  `strDesSEO_1` varchar(200) DEFAULT NULL,
  `strDesSEO_2` varchar(200) DEFAULT NULL,
  `strDesSEO_3` varchar(200) DEFAULT NULL,
  `strDesSEO_4` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblproducto
-- ----------------------------
INSERT INTO `tblproducto` VALUES ('1', 'Opel África', 'opel-africa', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '10000.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', null, null, '1', '8', '1', '8', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('2', 'Seat América ', 'seat-america', '1', null, '<p>Coche muy espacioso</p>', '8100.00', '0', '1', '6', '0', '0', '0', '0', null, null, null, null, '1', '10', '2', '0', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('3', '867', '345345', '1', null, '87', '87.00', '0', '1', '5', '6', '0', '0', '0', null, null, null, null, '1', '10', '3', '0', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('4', 'xxxx', 'xxxx', '1', null, '<p>xscwecfwef</p>', '234.00', '0', '1', '6', '6', '3', '0', '0', null, null, null, null, '1', '10', '1', '0', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('5', 'Peugueot Frontera', 'peugueot-frontera', '1', 'coche2.jpg', '<p>Coche muy interesante</p>', '5600.00', '0', '1', '6', '5', '6', '5', '0', null, 'sale.png', 'new.png', null, '0', '10', '1', '0', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('6', 'Cabriolo', 'cabriolo', '1', 'coche4.jpg', '<p>Potencia sin control</p>', '50000.00', '0', '1', '6', '0', '0', '0', '0', null, null, null, null, '1', '10', '1', '10', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('7', 'f2e', 'f2e', '1', null, 'f2f', '24.00', '0', '1', '0', '1', '0', '0', '0', null, null, null, null, '1', '10', '1', '0', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('8', 'Mercedes Calixto', 'mercedes-calixto', '1', 'coche3.jpg', '<p>Escribir Descripci&oacute;n</p>', '20000.00', '0', '1', '3', '6', '12', '0', '0', null, null, null, null, '1', '10', '1', '0', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('9', 'Seat América', 'seat-america-2', '11', null, '<p>Coche muy espacioso</p>', '125.00', '0', '1', '0', '0', '6', '0', '0', null, null, null, null, '1', '10', '1', '0', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('10', 'Seat África 2', 'seat-africa-2', '6', '0', '<p>Coche grande y espacioso</p>', '123.00', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, '1', '10', '1', '0', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('11', 'Opel África 3', 'opel-africa3', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '9800.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', '1', '8', '5', '8', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('12', 'Opel África 4', 'opel-africa4', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '7800.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', '1', '8', '5', '8', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('13', 'Opel África 5', 'opel-africa5', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '5000.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', '1', '8', '5', '8', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('14', 'Opel África 6', 'opel-africa6', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '4000.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', '1', '8', '5', '8', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('15', 'Opel África 7', 'opel-africa7', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '3000.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', '1', '8', '5', '8', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('16', 'Opel África 8', 'opel-africa8', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '2000.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', '1', '8', '5', '8', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('17', 'Opel África 9', 'opel-africa9', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '1500.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', '1', '8', '5', '8', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('18', 'Opel África 10', 'opel-africa10', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '1254.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', '1', '8', '5', '8', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('19', 'Opel África 11', 'opel-africa11', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '4454.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', '1', '8', '5', '8', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('20', 'Opel África 12', 'opel-africa12', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '454.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', '1', '8', '5', '8', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);
INSERT INTO `tblproducto` VALUES ('21', 'Opel África 13', 'opel-africa13', '1', 'coche1.jpg', '<p>Coche grande y espacioso</p>', '5554.00', '10500', '1', '6', '6', '0', '0', '0', 'cochedetalle.jpg', 'cochedetalle2.jpg', '', '', '1', '8', '5', '8', '0', null, null, null, null, null, null, '', '', '', null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `tblproductocaracteristica`
-- ----------------------------
DROP TABLE IF EXISTS `tblproductocaracteristica`;
CREATE TABLE `tblproductocaracteristica` (
  `idProductocaracteristica` int(11) NOT NULL AUTO_INCREMENT,
  `refProducto` int(11) NOT NULL,
  `refCaracteristica` int(11) NOT NULL,
  `refSeleccionada` int(11) NOT NULL,
  PRIMARY KEY (`idProductocaracteristica`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblproductocaracteristica
-- ----------------------------
INSERT INTO `tblproductocaracteristica` VALUES ('16', '8', '1', '13');
INSERT INTO `tblproductocaracteristica` VALUES ('17', '8', '2', '8');
INSERT INTO `tblproductocaracteristica` VALUES ('18', '8', '3', '15');
INSERT INTO `tblproductocaracteristica` VALUES ('22', '11', '1', '12');
INSERT INTO `tblproductocaracteristica` VALUES ('23', '11', '2', '7');
INSERT INTO `tblproductocaracteristica` VALUES ('24', '1', '1', '14');
INSERT INTO `tblproductocaracteristica` VALUES ('25', '1', '2', '7');
INSERT INTO `tblproductocaracteristica` VALUES ('26', '1', '3', '15');
INSERT INTO `tblproductocaracteristica` VALUES ('27', '12', '1', '12');
INSERT INTO `tblproductocaracteristica` VALUES ('28', '12', '2', '7');
INSERT INTO `tblproductocaracteristica` VALUES ('29', '13', '1', '12');
INSERT INTO `tblproductocaracteristica` VALUES ('30', '13', '2', '7');
INSERT INTO `tblproductocaracteristica` VALUES ('31', '14', '1', '12');
INSERT INTO `tblproductocaracteristica` VALUES ('32', '14', '2', '7');
INSERT INTO `tblproductocaracteristica` VALUES ('33', '15', '1', '12');
INSERT INTO `tblproductocaracteristica` VALUES ('34', '15', '2', '7');
INSERT INTO `tblproductocaracteristica` VALUES ('39', '5', '1', '13');
INSERT INTO `tblproductocaracteristica` VALUES ('40', '5', '2', '10');
INSERT INTO `tblproductocaracteristica` VALUES ('41', '5', '3', '16');

-- ----------------------------
-- Table structure for `tblproductoopcion`
-- ----------------------------
DROP TABLE IF EXISTS `tblproductoopcion`;
CREATE TABLE `tblproductoopcion` (
  `idProductoOpcion` int(11) NOT NULL AUTO_INCREMENT,
  `refProducto` int(11) NOT NULL,
  `refOpcion` int(11) NOT NULL,
  PRIMARY KEY (`idProductoOpcion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblproductoopcion
-- ----------------------------
INSERT INTO `tblproductoopcion` VALUES ('7', '2', '1');
INSERT INTO `tblproductoopcion` VALUES ('8', '1', '8');
INSERT INTO `tblproductoopcion` VALUES ('9', '1', '2');

-- ----------------------------
-- Table structure for `tblproductovisita`
-- ----------------------------
DROP TABLE IF EXISTS `tblproductovisita`;
CREATE TABLE `tblproductovisita` (
  `idProductovisita` int(11) NOT NULL AUTO_INCREMENT,
  `refUsuario` int(11) NOT NULL,
  `refProducto` int(11) NOT NULL,
  `fchFecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idProductovisita`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblproductovisita
-- ----------------------------
INSERT INTO `tblproductovisita` VALUES ('20', '5', '6', '2017-03-26 22:04:07');
INSERT INTO `tblproductovisita` VALUES ('21', '5', '6', '2017-03-26 22:04:14');
INSERT INTO `tblproductovisita` VALUES ('22', '5', '1', '2017-03-26 22:04:18');
INSERT INTO `tblproductovisita` VALUES ('23', '5', '2', '2017-03-26 22:04:28');
INSERT INTO `tblproductovisita` VALUES ('24', '5', '3', '2017-03-26 22:04:32');
INSERT INTO `tblproductovisita` VALUES ('25', '5', '6', '2017-03-26 22:05:28');
INSERT INTO `tblproductovisita` VALUES ('26', '5', '8', '2017-03-26 22:39:34');
INSERT INTO `tblproductovisita` VALUES ('27', '5', '1', '2017-03-26 23:23:53');
INSERT INTO `tblproductovisita` VALUES ('28', '5', '1', '2017-03-26 23:44:29');
INSERT INTO `tblproductovisita` VALUES ('29', '5', '1', '2017-03-26 23:44:50');
INSERT INTO `tblproductovisita` VALUES ('30', '5', '1', '2017-03-26 23:44:53');
INSERT INTO `tblproductovisita` VALUES ('31', '5', '1', '2017-03-26 23:45:51');
INSERT INTO `tblproductovisita` VALUES ('32', '5', '1', '2017-03-26 23:45:55');
INSERT INTO `tblproductovisita` VALUES ('33', '5', '8', '2017-03-27 11:32:12');
INSERT INTO `tblproductovisita` VALUES ('34', '5', '1', '2017-03-27 11:48:34');
INSERT INTO `tblproductovisita` VALUES ('35', '5', '8', '2017-03-27 12:03:20');
INSERT INTO `tblproductovisita` VALUES ('36', '5', '5', '2017-03-27 16:08:25');
INSERT INTO `tblproductovisita` VALUES ('37', '5', '1', '2017-03-27 16:13:35');
INSERT INTO `tblproductovisita` VALUES ('38', '5', '8', '2017-03-27 16:49:27');
INSERT INTO `tblproductovisita` VALUES ('39', '5', '5', '2017-03-27 16:49:30');
INSERT INTO `tblproductovisita` VALUES ('40', '5', '15', '2017-03-27 16:49:47');
INSERT INTO `tblproductovisita` VALUES ('41', '5', '12', '2017-03-27 16:49:51');
INSERT INTO `tblproductovisita` VALUES ('42', '5', '1', '2017-03-27 17:44:36');
INSERT INTO `tblproductovisita` VALUES ('43', '5', '1', '2017-03-27 17:44:48');
INSERT INTO `tblproductovisita` VALUES ('44', '5', '5', '2017-03-27 18:22:49');
INSERT INTO `tblproductovisita` VALUES ('45', '5', '4', '2017-03-27 18:24:31');
INSERT INTO `tblproductovisita` VALUES ('46', '5', '1', '2017-03-29 11:51:41');
INSERT INTO `tblproductovisita` VALUES ('47', '5', '1', '2017-03-29 11:51:55');
INSERT INTO `tblproductovisita` VALUES ('48', '5', '1', '2017-03-29 11:57:14');
INSERT INTO `tblproductovisita` VALUES ('49', '5', '1', '2017-03-29 11:58:36');
INSERT INTO `tblproductovisita` VALUES ('50', '5', '1', '2017-03-29 11:58:37');
INSERT INTO `tblproductovisita` VALUES ('51', '5', '1', '2017-03-29 11:58:59');
INSERT INTO `tblproductovisita` VALUES ('52', '5', '1', '2017-03-29 12:11:29');
INSERT INTO `tblproductovisita` VALUES ('53', '5', '1', '2017-03-29 13:30:37');
INSERT INTO `tblproductovisita` VALUES ('54', '5', '1', '2017-03-29 13:32:46');
INSERT INTO `tblproductovisita` VALUES ('55', '5', '1', '2017-03-29 13:33:04');
INSERT INTO `tblproductovisita` VALUES ('56', '5', '1', '2017-03-29 13:40:58');
INSERT INTO `tblproductovisita` VALUES ('57', '5', '1', '2017-03-29 13:42:04');
INSERT INTO `tblproductovisita` VALUES ('58', '5', '1', '2017-03-29 16:11:12');
INSERT INTO `tblproductovisita` VALUES ('59', '5', '1', '2017-03-29 16:24:26');
INSERT INTO `tblproductovisita` VALUES ('60', '1', '1', '2017-03-29 16:46:53');
INSERT INTO `tblproductovisita` VALUES ('61', '1', '6', '2017-03-29 16:46:59');
INSERT INTO `tblproductovisita` VALUES ('62', '1', '6', '2017-03-29 16:47:08');
INSERT INTO `tblproductovisita` VALUES ('63', '40', '1', '2017-03-29 18:08:25');
INSERT INTO `tblproductovisita` VALUES ('64', '40', '1', '2017-03-29 18:10:07');
INSERT INTO `tblproductovisita` VALUES ('65', '40', '1', '2017-03-29 18:10:13');
INSERT INTO `tblproductovisita` VALUES ('66', '40', '1', '2017-03-29 18:10:20');
INSERT INTO `tblproductovisita` VALUES ('67', '40', '1', '2017-03-29 18:10:38');
INSERT INTO `tblproductovisita` VALUES ('68', '40', '1', '2017-03-29 18:10:46');
INSERT INTO `tblproductovisita` VALUES ('69', '40', '1', '2017-03-29 18:10:59');
INSERT INTO `tblproductovisita` VALUES ('70', '40', '1', '2017-03-29 18:11:07');
INSERT INTO `tblproductovisita` VALUES ('71', '40', '1', '2017-03-29 18:12:22');
INSERT INTO `tblproductovisita` VALUES ('72', '40', '1', '2017-03-29 18:12:45');
INSERT INTO `tblproductovisita` VALUES ('73', '40', '1', '2017-03-29 18:18:27');
INSERT INTO `tblproductovisita` VALUES ('74', '40', '1', '2017-03-29 18:18:52');
INSERT INTO `tblproductovisita` VALUES ('75', '40', '1', '2017-03-29 18:18:54');
INSERT INTO `tblproductovisita` VALUES ('76', '40', '1', '2017-03-29 18:19:26');
INSERT INTO `tblproductovisita` VALUES ('77', '40', '1', '2017-03-29 18:20:15');
INSERT INTO `tblproductovisita` VALUES ('78', '40', '1', '2017-03-29 18:20:23');
INSERT INTO `tblproductovisita` VALUES ('79', '40', '1', '2017-03-29 18:20:34');
INSERT INTO `tblproductovisita` VALUES ('80', '5', '1', '2017-04-01 20:17:03');
INSERT INTO `tblproductovisita` VALUES ('81', '5', '5', '2017-04-01 20:17:12');

-- ----------------------------
-- Table structure for `tblslider`
-- ----------------------------
DROP TABLE IF EXISTS `tblslider`;
CREATE TABLE `tblslider` (
  `idSlider` int(11) NOT NULL AUTO_INCREMENT,
  `strTexto_1` text NOT NULL,
  `strImagen` varchar(100) NOT NULL,
  `strLink_1` varchar(200) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `intOrden` int(11) NOT NULL,
  `strTexto_2` text,
  `strLink_2` varchar(200) DEFAULT NULL,
  `strTexto_3` text,
  `strLink_3` varchar(200) DEFAULT NULL,
  `strTexto_4` text,
  `strLink_4` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idSlider`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblslider
-- ----------------------------
INSERT INTO `tblslider` VALUES ('1', '<h1>El mejor coche</h1>\r\n<h2>Con las mejores caracter&iacute;sticas</h2>\r\n<p>Esto es un coche de verdad, y lo dem&aacute;s intentos baratos.</p>', 'slide2.jpg', '/baratos/opel-africa.html', '1', '1', null, '/baratos/opel-africa.html', null, null, null, null);
INSERT INTO `tblslider` VALUES ('2', '<h1>Ahora es el momento</h1>\r\n<h2>Por fin veh&iacute;culos de lujo</h2>\r\n<p>Las mejores caracter&iacute;sticas.</p>', 'slide3.jpg', '/baratos/volante-a-la-derecha/coche-japones/', '1', '2', null, null, null, null, null, null);
INSERT INTO `tblslider` VALUES ('3', '<h1>Y los mejores recambios</h1>\r\n<h2>Precios imposibles</h2>\r\n<p>Cons&uacute;ltenos sin compromiso.</p>', 'slide1.jpg', '/baratos/volante-a-la-derecha/coche-japones/', '1', '3', null, null, null, null, null, null);
INSERT INTO `tblslider` VALUES ('4', '<h1>El mejor coche</h1>\r\n<h2>Con las mejores caracter&iacute;sticas</h2>\r\n<p>Esto es un coche de verdad, y lo dem&aacute;s intentos baratos.</p>', 'slide2.jpg', '/baratos/volante-a-la-derecha/coche-japones/', '1', '4', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `tblusuario`
-- ----------------------------
DROP TABLE IF EXISTS `tblusuario`;
CREATE TABLE `tblusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `strEmail` varchar(50) DEFAULT NULL,
  `strPassword` varchar(50) DEFAULT NULL,
  `strNombre` varchar(30) DEFAULT NULL,
  `intNivel` int(11) NOT NULL DEFAULT '0',
  `intEstado` int(11) NOT NULL DEFAULT '1',
  `strImagen` varchar(50) DEFAULT NULL,
  `fchAlta` datetime NOT NULL,
  `strCookie` varchar(50) DEFAULT NULL,
  `strRecuperar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `strEmail` (`strEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblusuario
-- ----------------------------
INSERT INTO `tblusuario` VALUES ('1', 'sdfrrdsf@333fsd.com', '26fe0cdfe99bfa306e31733c4e2b17dc', 'Pepe López', '0', '1', 'face2.jpg', '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('2', 'jorvidu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Jorge', '1', '1', '', '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('3', 'wdfdes@fsdf.com', '42be65bff2c5725e883a43de69147c85', '0980', '10', '1', '', '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('4', '345345@dsgftd.comn', 'a06cef7b78ecfb2461fe6ab2ac847fa0', '876', '100', '1', '', '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('5', 'publico@fsdf.com', '4ede4fbf6e52d6dd0f25ad91c016db82', 'Felipe', '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('6', 'dksjf@sdfdsf.com', 'df6d2338b2b8fce1ec2f6dda0a630eb0', 'Luis José', '0', '1', 'facerisas.jpg', '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('8', 'wefwf', '5f9a177892f1e4ecb3484ba5a82fb813', 'fewfe', '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('9', 'ergerg@dsfgf.com', '92daa86ad43a42f28f4bf58e94667c95', '09u', '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('10', null, null, null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('11', null, null, null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('12', null, null, null, '0', '1', null, '2017-03-13 19:46:31', null, null);
INSERT INTO `tblusuario` VALUES ('13', null, null, null, '0', '1', null, '2017-03-15 12:56:56', null, null);
INSERT INTO `tblusuario` VALUES ('14', null, null, null, '0', '1', null, '2017-03-21 15:45:18', null, null);
INSERT INTO `tblusuario` VALUES ('15', null, null, null, '0', '1', null, '2017-03-22 12:25:18', null, null);
INSERT INTO `tblusuario` VALUES ('16', 'rrr@rrr.com', 'f41594481f23b99efd7a3b4b6a4f8fdc', 'Pepe', '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('17', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('18', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('19', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('20', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('21', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('22', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('23', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('24', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('25', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('26', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('27', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('28', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('29', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('30', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('31', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('32', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('33', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('34', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('35', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('36', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('37', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('38', null, 'd41d8cd98f00b204e9800998ecf8427e', null, '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('39', 'xxx@xxx.xom', '9dc096e5ba9292ce87406d1be59c2358', 'xxx', '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('40', 'telefonico-1@tienda.com', '6f9554abfb0b3daab56f933fc71abb42', 'Usuario Telefónico 1', '0', '1', null, '2017-03-11 16:45:34', null, null);
INSERT INTO `tblusuario` VALUES ('41', null, null, null, '0', '1', null, '2017-03-30 17:31:14', null, null);
INSERT INTO `tblusuario` VALUES ('42', null, null, null, '0', '1', null, '2017-04-03 11:56:10', null, null);

-- ----------------------------
-- Table structure for `tblzona`
-- ----------------------------
DROP TABLE IF EXISTS `tblzona`;
CREATE TABLE `tblzona` (
  `idZona` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `intEstado` int(11) NOT NULL,
  `refPadre` int(11) NOT NULL,
  `dblInferior` double NOT NULL,
  `dblSuperior` double NOT NULL,
  `dblCoste` double NOT NULL,
  PRIMARY KEY (`idZona`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblzona
-- ----------------------------
INSERT INTO `tblzona` VALUES ('1', 'Europa', '1', '0', '0', '0', '0');
INSERT INTO `tblzona` VALUES ('2', 'EEUU', '1', '0', '0', '0', '0');
INSERT INTO `tblzona` VALUES ('3', 'Peso minimo', '1', '2', '-1', '10', '30');
INSERT INTO `tblzona` VALUES ('4', 'Peso Medio', '1', '2', '10', '50', '100');
INSERT INTO `tblzona` VALUES ('5', 'Peso Grande', '1', '2', '50', '100', '120');
INSERT INTO `tblzona` VALUES ('6', 'Peso Gigante', '1', '2', '100', '999999', '125');
INSERT INTO `tblzona` VALUES ('7', 'Zona Única', '1', '1', '-1', '999999', '23');
