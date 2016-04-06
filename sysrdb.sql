-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2015 a las 13:55:28
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sysrdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_user`) VALUES
(3),
(15),
(16),
(17),
(18),
(20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camion`
--

CREATE TABLE IF NOT EXISTS `camion` (
  `placa` varchar(10) NOT NULL,
  `distancia_optima` int(11) DEFAULT NULL,
  `peso_max` double NOT NULL COMMENT 'kilos',
  `alto` double NOT NULL COMMENT 'metros',
  `mantenimiento` tinyint(1) NOT NULL,
  `fragil` tinyint(1) NOT NULL,
  `refrigerado` tinyint(1) NOT NULL,
  `vivo` tinyint(1) NOT NULL,
  `peligroso` tinyint(1) NOT NULL,
  `id_chofer` int(11) DEFAULT NULL,
  `ancho` double NOT NULL COMMENT 'metros'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camion`
--

INSERT INTO `camion` (`placa`, `distancia_optima`, `peso_max`, `alto`, `mantenimiento`, `fragil`, `refrigerado`, `vivo`, `peligroso`, `id_chofer`, `ancho`) VALUES
('11', 131, 11, 11, 0, 0, 0, 0, 0, 8, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer`
--

CREATE TABLE IF NOT EXISTS `chofer` (
  `id_user` int(11) NOT NULL,
  `numero_licencia` int(11) NOT NULL,
  `fecha_fin_licencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chofer`
--

INSERT INTO `chofer` (`id_user`, `numero_licencia`, `fecha_fin_licencia`) VALUES
(5, 0, ''),
(6, 12121, ''),
(7, 1231, ''),
(8, 123, ''),
(14, 1324655, '22-01-2015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
`numero` int(11) NOT NULL,
  `NombreMiEmpresa` varchar(100) DEFAULT NULL,
  `LogoMiEmpresa` varchar(150) DEFAULT NULL,
  `EmailMilEmpresa` varchar(100) DEFAULT NULL,
  `SloganMiEmpresa` varchar(100) DEFAULT NULL,
  `ReportSpam` int(11) NOT NULL COMMENT 'numero de meses entre reportes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE IF NOT EXISTS `datos_personales` (
  `nombre` varchar(25) DEFAULT NULL COMMENT 'nombre real del usuario',
  `apellido` varchar(25) DEFAULT NULL COMMENT 'apellido real del usuario',
  `cedula` int(10) unsigned DEFAULT NULL COMMENT 'cedula de la persona',
  `correo` varchar(30) DEFAULT NULL COMMENT 'correo del usuario',
  `RIF` varchar(20) DEFAULT NULL COMMENT 'rif de la persona o empresa',
  `numero_telefono` int(10) unsigned DEFAULT NULL COMMENT 'telefono de la persona o empresa',
  `id_user` int(11) NOT NULL COMMENT 'codigo interno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`nombre`, `apellido`, `cedula`, `correo`, `RIF`, `numero_telefono`, `id_user`) VALUES
(NULL, NULL, NULL, NULL, NULL, NULL, 1),
(NULL, NULL, NULL, NULL, NULL, NULL, 2),
(NULL, NULL, NULL, NULL, NULL, NULL, 3),
(NULL, NULL, NULL, NULL, NULL, NULL, 4),
(NULL, NULL, NULL, NULL, NULL, NULL, 5),
(NULL, NULL, NULL, NULL, NULL, NULL, 6),
(NULL, NULL, NULL, NULL, NULL, NULL, 7),
(NULL, NULL, NULL, NULL, NULL, NULL, 8),
(NULL, NULL, NULL, NULL, NULL, NULL, 9),
('gol', NULL, NULL, 'asdasd', 'asd55', 10243421, 10),
(NULL, NULL, NULL, NULL, NULL, NULL, 11),
(NULL, NULL, NULL, NULL, NULL, NULL, 12),
(NULL, NULL, NULL, NULL, NULL, NULL, 13),
(NULL, NULL, NULL, NULL, NULL, NULL, 14),
(NULL, NULL, NULL, NULL, NULL, NULL, 15),
(NULL, NULL, NULL, NULL, NULL, NULL, 16),
(NULL, NULL, NULL, NULL, NULL, NULL, 17),
(NULL, NULL, NULL, NULL, NULL, NULL, 18),
(NULL, NULL, NULL, NULL, NULL, NULL, 19),
(NULL, NULL, NULL, NULL, NULL, NULL, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_user`) VALUES
(2),
(4),
(9),
(10),
(11),
(12),
(13),
(19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargo`
--

CREATE TABLE IF NOT EXISTS `encargo` (
`cod_encargo` int(11) NOT NULL,
  `cod_envio` int(11) NOT NULL,
  `id_chofer` int(11) DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `fecha_inicio` varchar(25) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `encargo`
--

INSERT INTO `encargo` (`cod_encargo`, `cod_envio`, `id_chofer`, `placa`, `fecha_inicio`) VALUES
(1, 1, 5, '11', '01-02-2015'),
(2, 1, 5, '11', '01-02-2015'),
(3, 1, 5, '11', '30-12-2014'),
(4, 1, 5, '11', '23-01-2015'),
(5, 1, 5, '11', '24-01-2015'),
(6, 1, 5, '11', '06-01-2015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE IF NOT EXISTS `envio` (
`cod_envio` int(11) NOT NULL,
  `estado` enum('Aprobado','Pendiente','Negado','Fallido','Cancelado','Completado') NOT NULL DEFAULT 'Pendiente',
  `id_empresa` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `cod_presupuesto` int(11) NOT NULL,
  `fecha` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`cod_envio`, `estado`, `id_empresa`, `id_operador`, `cod_presupuesto`, `fecha`) VALUES
(1, 'Negado', 2, 1, 66, NULL),
(2, 'Pendiente', 2, 1, 66, NULL),
(3, 'Pendiente', 2, 1, 66, NULL),
(4, 'Pendiente', 2, 1, 66, NULL),
(5, 'Pendiente', 2, 1, 67, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operador`
--

CREATE TABLE IF NOT EXISTS `operador` (
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `operador`
--

INSERT INTO `operador` (`id_user`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
`cod_pago` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `fecha_realizacion` varchar(10) NOT NULL,
  `monto` double NOT NULL,
  `cod_boucher` bigint(20) NOT NULL,
  `factura` varchar(600) NOT NULL,
  `cod_envio` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`cod_pago`, `id_empresa`, `fecha_realizacion`, `monto`, `cod_boucher`, `factura`, `cod_envio`) VALUES
(1, 2, 'g', 11, 122, 'fsdfdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE IF NOT EXISTS `paquete` (
`cod_paquete` int(11) NOT NULL,
  `peso` double NOT NULL,
  `cod_producto` int(11) NOT NULL,
  `cod_presupuesto` int(11) NOT NULL,
  `alto` double NOT NULL,
  `ancho` double NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `cod_encargo` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`cod_paquete`, `peso`, `cod_producto`, `cod_presupuesto`, `alto`, `ancho`, `descripcion`, `cod_encargo`) VALUES
(2, 4, 6, 67, 6, 8, 'j', NULL),
(3, 4, 6, 67, 6, 8, 'j', NULL),
(4, 4, 6, 67, 6, 8, 'j', NULL),
(5, 4, 6, 67, 6, 8, 'j', 1),
(6, 4, 6, 67, 6, 8, 'j', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE IF NOT EXISTS `presupuesto` (
`cod_presupuesto` int(11) NOT NULL,
  `fecha_tope` varchar(30) NOT NULL,
  `fecha_solicitud` varchar(30) NOT NULL,
  `cod_ruta` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `Apendice` varchar(500) DEFAULT NULL,
  `Numero_de_paquetes` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`cod_presupuesto`, `fecha_tope`, `fecha_solicitud`, `cod_ruta`, `id_empresa`, `Apendice`, `Numero_de_paquetes`) VALUES
(66, '10-12-2014', '31-12-2014 16:42:15', 1, 2, '*Su Presupuesto Ha Sido Aprobado* ', 2),
(67, '25-01-2015', '23-01-2015 23:48:37', 1, 2, '*Su Presupuesto Ha Sido Aprobado* \r\n*Su Presupuesto Ha Sido Aprobado* \r\npopo', 6),
(68, '25-01-2015', '23-01-2015 23:51:12', 1, 2, '', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`cod_producto` int(11) NOT NULL,
  `fragil` tinyint(1) NOT NULL,
  `refrigerado` tinyint(1) NOT NULL,
  `vivo` tinyint(1) NOT NULL,
  `peligroso` tinyint(1) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `nombre` varchar(200) NOT NULL,
  `Id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_producto`, `fragil`, `refrigerado`, `vivo`, `peligroso`, `descripcion`, `nombre`, `Id_empresa`) VALUES
(1, 0, 0, 0, 0, 'producto 1', 'producto 1', NULL),
(2, 0, 0, 0, 0, 'producto 2', 'producto 2', NULL),
(3, 0, 0, 0, 0, 'producto 3', 'producto 3', NULL),
(4, 0, 0, 0, 0, 'producto 4', 'producto 4', NULL),
(5, 0, 0, 0, 0, 'producto 5', 'producto 5', NULL),
(6, 0, 0, 0, 0, 'Mantiene a flote el sistema productivo mundial y es el pilar fundamental del sistema de esclavitud moderna.', 'Cafe', NULL),
(7, 1, 0, 1, 0, 'dsadas', 'sadasd', NULL),
(8, 1, 0, 1, 0, 'dd', 'dd', 2),
(9, 1, 0, 0, 1, 'sdsasaf', 'sdfsdafsdafsda', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE IF NOT EXISTS `reporte` (
  `fecha_inicio` int(50) NOT NULL,
  `fecha_cierre` int(50) DEFAULT NULL,
  `text` longtext NOT NULL,
`numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
`cod_ruta` int(11) NOT NULL,
  `ciudad_a` varchar(50) NOT NULL,
  `ciudad_b` varchar(50) NOT NULL,
  `distancia` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`cod_ruta`, `ciudad_a`, `ciudad_b`, `distancia`) VALUES
(1, 'Lecheria', 'Puerto la cruz', 0),
(2, 'Puerto la cruz', 'Barcelona', 0),
(3, 'Barcelona', 'Anaco', 0),
(4, 'El Tigre', 'Barcelona', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE IF NOT EXISTS `sede` (
  `ciudad` varchar(50) NOT NULL,
  `coordenada` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`ciudad`, `coordenada`) VALUES
('Puerto la cruz', '(00,00,00)'),
('Maturin', '(00,00,10)'),
('Anaco', '(00,08,00)'),
('Lecheria', '(01,00,00)'),
('Barcelona', '(02,00,00)'),
('Caracas', '(03,00,00)'),
('Maracaibo', '(04,00,00)'),
('Valencia', '(05,00,00)'),
('Pampatar', '(06,00,00)'),
('El Tigre', '(07,00,00)'),
('Puerto Ordaz', '(90,00,00)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_user` int(11) NOT NULL COMMENT 'codigo interno',
  `clave` varchar(25) NOT NULL COMMENT 'clave de ingreso',
  `nombre_usuario` varchar(25) NOT NULL COMMENT 'nombre de ingreso',
  `fecha_de_registro` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `clave`, `nombre_usuario`, `fecha_de_registro`) VALUES
(1, 'op', 'ope1', '27-12-2014 13:34'),
(2, 'emp1', 'emp1', '27-12-2014 14:28'),
(3, 'asd', 'admin2', '27-12-2014 14:45'),
(4, 'emp3', 'emp2', '27-12-2014 15:21'),
(5, 'chofer1', 'chofer1', '27-12-2014 15:28'),
(6, 'asdas', 'sads', '27-12-2014 15:44'),
(7, 'dsadsa', 'asdasd', '27-12-2014 16:07'),
(8, 'dsadsasdsd', 'asdasdsds', '27-12-2014 16:08'),
(9, 'ddd', 'empresa 1000', '30-12-2014 17:52'),
(10, 'sadsa', 'hola', '30-12-2014 17:56'),
(11, 'adsfsdf', 'dsafsdf', '31-12-2014 19:49:37'),
(12, 'asdasdasd', 'asdasdasdsad', '31-12-2014 19:56:22'),
(13, 'dfsds', 'ssw', '31-12-2014 19:57:26'),
(14, '1234', 'chofer inventado', '19-01-2015 19:05:38'),
(15, 'admin', 'admin4', '28-01-2015 13:03:16'),
(16, 'ass', 'admin5', '28-01-2015 15:17:28'),
(17, 'ass', 'admin6', '28-01-2015 15:18:58'),
(18, 'ass', 'admin7', '28-01-2015 15:26:08'),
(19, 'sssss', 'empresa1000s', '28-01-2015 15:42:21'),
(20, 'sad', 'admin14', '28-01-2015 15:50:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`id_user`), ADD KEY `admin user` (`id_user`);

--
-- Indices de la tabla `camion`
--
ALTER TABLE `camion`
 ADD PRIMARY KEY (`placa`), ADD KEY `camion chofer` (`id_chofer`);

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `numero_licencia` (`numero_licencia`), ADD KEY `chofer user` (`id_user`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
 ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `cedula` (`cedula`), ADD KEY `datos usuario` (`id_user`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
 ADD PRIMARY KEY (`id_user`), ADD KEY `empresa user` (`id_user`);

--
-- Indices de la tabla `encargo`
--
ALTER TABLE `encargo`
 ADD PRIMARY KEY (`cod_encargo`), ADD KEY `encargo envio` (`cod_envio`), ADD KEY `encargo camion` (`placa`), ADD KEY `encargo chofer` (`id_chofer`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
 ADD PRIMARY KEY (`cod_envio`), ADD KEY `envio-presupuesto` (`cod_presupuesto`);

--
-- Indices de la tabla `operador`
--
ALTER TABLE `operador`
 ADD PRIMARY KEY (`id_user`), ADD KEY `operador user` (`id_user`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
 ADD PRIMARY KEY (`cod_pago`), ADD KEY `envio pago` (`cod_envio`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
 ADD PRIMARY KEY (`cod_paquete`), ADD KEY `paquete producto` (`cod_producto`), ADD KEY `paquete presupuesto` (`cod_presupuesto`), ADD KEY `paquete encargo` (`cod_encargo`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
 ADD PRIMARY KEY (`cod_presupuesto`), ADD KEY `presupuesto empresa` (`id_empresa`), ADD KEY `presupuesto ruta` (`cod_ruta`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`cod_producto`), ADD UNIQUE KEY `nombre` (`nombre`), ADD KEY `producto-empresa` (`Id_empresa`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
 ADD PRIMARY KEY (`fecha_inicio`), ADD UNIQUE KEY `Numero` (`numero`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
 ADD PRIMARY KEY (`cod_ruta`), ADD KEY `sede ciudad A` (`ciudad_a`), ADD KEY `sede ciudad B` (`ciudad_b`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
 ADD PRIMARY KEY (`ciudad`), ADD UNIQUE KEY `coordenada` (`coordenada`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `encargo`
--
ALTER TABLE `encargo`
MODIFY `cod_encargo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
MODIFY `cod_envio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
MODIFY `cod_pago` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
MODIFY `cod_paquete` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
MODIFY `cod_presupuesto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `cod_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
MODIFY `cod_ruta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo interno',AUTO_INCREMENT=21;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `camion`
--
ALTER TABLE `camion`
ADD CONSTRAINT `camion_ibfk_1` FOREIGN KEY (`id_chofer`) REFERENCES `chofer` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `chofer`
--
ALTER TABLE `chofer`
ADD CONSTRAINT `chofer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
ADD CONSTRAINT `datos_personales_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `encargo`
--
ALTER TABLE `encargo`
ADD CONSTRAINT `encargo_ibfk_1` FOREIGN KEY (`id_chofer`) REFERENCES `chofer` (`id_user`) ON DELETE CASCADE,
ADD CONSTRAINT `encargo_ibfk_2` FOREIGN KEY (`placa`) REFERENCES `camion` (`placa`) ON DELETE CASCADE,
ADD CONSTRAINT `encargo_ibfk_3` FOREIGN KEY (`cod_envio`) REFERENCES `envio` (`cod_envio`) ON DELETE CASCADE;

--
-- Filtros para la tabla `envio`
--
ALTER TABLE `envio`
ADD CONSTRAINT `envio_ibfk_1` FOREIGN KEY (`cod_presupuesto`) REFERENCES `presupuesto` (`cod_presupuesto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `operador`
--
ALTER TABLE `operador`
ADD CONSTRAINT `operador_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`cod_envio`) REFERENCES `envio` (`cod_envio`) ON DELETE CASCADE;

--
-- Filtros para la tabla `paquete`
--
ALTER TABLE `paquete`
ADD CONSTRAINT `paquete_ibfk_2` FOREIGN KEY (`cod_producto`) REFERENCES `producto` (`cod_producto`) ON DELETE CASCADE,
ADD CONSTRAINT `paquete_ibfk_3` FOREIGN KEY (`cod_presupuesto`) REFERENCES `presupuesto` (`cod_presupuesto`) ON DELETE CASCADE,
ADD CONSTRAINT `paquete_ibfk_4` FOREIGN KEY (`cod_encargo`) REFERENCES `encargo` (`cod_encargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
ADD CONSTRAINT `presupuesto_ibfk_1` FOREIGN KEY (`cod_ruta`) REFERENCES `ruta` (`cod_ruta`) ON DELETE CASCADE,
ADD CONSTRAINT `presupuesto_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Id_empresa`) REFERENCES `empresa` (`id_user`) ON DELETE SET NULL;

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
ADD CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`ciudad_a`) REFERENCES `sede` (`ciudad`) ON DELETE CASCADE,
ADD CONSTRAINT `ruta_ibfk_2` FOREIGN KEY (`ciudad_b`) REFERENCES `sede` (`ciudad`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
