-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-04-2018 a las 05:27:15
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistematis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `au_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `au_identificacion` text CHARACTER SET latin1 NOT NULL,
  `au_nombre` text CHARACTER SET latin1 NOT NULL,
  `au_nombre_guion` text CHARACTER SET latin1 NOT NULL,
  `au_telefono` text CHARACTER SET latin1 NOT NULL,
  `au_email` text CHARACTER SET latin1 NOT NULL,
  `au_organizacion` text CHARACTER SET latin1,
  `au_ciudad` text CHARACTER SET latin1 NOT NULL,
  `au_direccion` text CHARACTER SET latin1,
  `au_profesion` text CHARACTER SET latin1 NOT NULL,
  `au_descripcion` text CHARACTER SET latin1,
  `au_redes_sociales` text CHARACTER SET latin1,
  `au_foto` text COLLATE utf8_spanish_ci,
  `au_fecha_creacion` date NOT NULL,
  `au_fecha_update` timestamp NOT NULL,
  PRIMARY KEY (`au_id`),
  UNIQUE KEY `au_id` (`au_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor_enviado`
--

DROP TABLE IF EXISTS `autor_enviado`;
CREATE TABLE IF NOT EXISTS `autor_enviado` (
  `aue_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `aue_identificacion` int(11) NOT NULL,
  `aue_nombre` text NOT NULL,
  `aue_nombre_guion` text NOT NULL,
  `aue_telefono` text NOT NULL,
  `aue_email` text NOT NULL,
  `aue_organizacion` text,
  `aue_ciudad` text NOT NULL,
  `aue_direccion` text NOT NULL,
  `aue_profesion` text NOT NULL,
  `aue_fecha_envio` timestamp NOT NULL,
  `aue_id_envio` text NOT NULL,
  `aue_estado` text NOT NULL,
  PRIMARY KEY (`aue_id`),
  UNIQUE KEY `aue_id` (`aue_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_descripcion` text NOT NULL,
  `cat_color` text NOT NULL,
  `cat_fecha_creacion` timestamp NOT NULL,
  `cat_fecha_update` timestamp NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
CREATE TABLE IF NOT EXISTS `ciudades` (
  `ciu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ciu_ciudad` text NOT NULL,
  PRIMARY KEY (`ciu_id`),
  UNIQUE KEY `ciu_id` (`ciu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`ciu_id`, `ciu_ciudad`) VALUES
(1, 'Bogotá'),
(2, 'Medellín'),
(3, 'Cali'),
(4, 'Barranquilla'),
(5, 'Cartagena'),
(6, 'Cúcuta'),
(7, 'Soledad'),
(8, 'Ibagué'),
(9, 'Soacha'),
(10, 'Bucaramanga'),
(11, 'Villavicencio'),
(12, 'Santa Marta'),
(13, 'Valledupar'),
(14, 'Bello'),
(15, 'Pereira'),
(16, 'Montería'),
(17, 'Pasto'),
(18, 'Buenaventura'),
(19, 'Manizales'),
(20, 'Neiva'),
(21, 'Palmira'),
(22, 'Armenia'),
(23, 'Riohacha'),
(24, 'Sincelejo'),
(25, 'Popayán'),
(26, 'Itaguí'),
(27, 'Floridablanca'),
(28, 'Envigado'),
(29, 'Tuluá'),
(30, 'Tumaco'),
(31, 'Dosquebradas'),
(32, 'Tunja'),
(33, 'Girón'),
(34, 'Apartadó'),
(35, 'Uribia'),
(36, 'Barrancabermeja'),
(37, 'Florencia'),
(38, 'Turbo'),
(39, 'Maicao'),
(40, 'Piedecuesta'),
(41, 'Yopal'),
(42, 'Ipiales'),
(43, 'Fusagasugá'),
(44, 'Facatativá'),
(45, 'Chía'),
(46, 'Cartago'),
(47, 'Pitalito'),
(48, 'Zipaquirá'),
(49, 'Malambo'),
(50, 'Jamundí'),
(51, 'Rionegro'),
(52, 'Yumbo'),
(53, 'Magangué'),
(54, 'Lorica'),
(55, 'Caucasia'),
(56, 'Manaure'),
(57, 'Quibdó'),
(58, 'Buga'),
(59, 'Duitama'),
(60, 'Sogamoso'),
(61, 'Tierralta'),
(62, 'Girardot'),
(63, 'Ciénaga'),
(64, 'Sabanalarga'),
(65, 'Ocaña'),
(66, 'Santander de Quilichao'),
(67, 'Aguachica'),
(68, 'Villa del Rosario'),
(69, 'Garzón'),
(70, 'Cereté'),
(71, 'Arauca'),
(72, 'Sahagún'),
(73, 'Mosquera'),
(74, 'Montelíbano'),
(75, 'Candelaria'),
(76, 'Chigorodó'),
(77, 'Madrid'),
(78, 'Caldas'),
(79, 'Funza'),
(80, 'Los Patios'),
(81, 'Calarcá'),
(82, 'La Dorada'),
(83, 'El Carmen de Bolívar'),
(84, 'Arjona'),
(85, 'Espinal'),
(86, 'Turbaco'),
(87, 'Acacías'),
(88, 'San Andrés'),
(89, 'Santa Rosa de Cabal'),
(90, 'Copacabana'),
(91, 'San Vicente del Caguán'),
(92, 'Planeta Rica'),
(93, 'Chiquinquirá'),
(94, 'Ciénaga de Oro'),
(95, 'San José del Guaviare'),
(96, 'Necoclí'),
(97, 'La Plata'),
(98, 'Granada'),
(99, 'La Estrella'),
(100, 'Riosucio'),
(101, 'Corozal'),
(102, 'Puerto Asís'),
(103, 'Zona Bananera'),
(104, 'Plato'),
(105, 'Cajicá'),
(106, 'Carepa'),
(107, 'Villamaría'),
(108, 'Baranoa'),
(109, 'San Marcos'),
(110, 'Florida'),
(111, 'Pamplona'),
(112, 'El Cerrito'),
(113, 'Girardota'),
(114, 'Fundación'),
(115, 'Pradera'),
(116, 'Puerto Boyacá'),
(117, 'Orito'),
(118, 'El Banco'),
(119, 'Marinilla'),
(120, 'La Ceja'),
(121, 'Tame'),
(122, 'Ayapel'),
(123, 'Sabaneta'),
(124, 'Valle del Guamuez'),
(125, 'Barbosa'),
(126, 'Puerto Libertador'),
(127, 'San Onofre'),
(128, 'Chinchiná'),
(129, 'El Bagre'),
(130, 'Guarne');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `come_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `come_id_proyecto` int(11) NOT NULL,
  `come_nombre` text NOT NULL,
  `come_email` text NOT NULL,
  `come_comentario` text NOT NULL,
  `come_fecha_publicacion` timestamp NOT NULL,
  PRIMARY KEY (`come_id`),
  UNIQUE KEY `come_id` (`come_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
CREATE TABLE IF NOT EXISTS `proyecto` (
  `pro_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pro_fecha_creacion` timestamp NOT NULL,
  `pro_fecha_alta` date NOT NULL,
  `pro_titulo` text NOT NULL,
  `pro_titulo_guiones` text NOT NULL,
  `pro_url_video` text,
  `pro_url_img` text NOT NULL,
  `pro_url_documento` text,
  `pro_descripcion` text NOT NULL,
  `pro_parrafo_12` text,
  `pro_parrafo_6a` text,
  `pro_parrafo_6b` text,
  `pro_id_autor` int(11) NOT NULL,
  `pro_id_categoria` int(11) NOT NULL,
  `pro_contador_visitas` int(11) NOT NULL,
  `pro_estado` text NOT NULL,
  PRIMARY KEY (`pro_id`),
  UNIQUE KEY `pro_id` (`pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_enviado`
--

DROP TABLE IF EXISTS `proyecto_enviado`;
CREATE TABLE IF NOT EXISTS `proyecto_enviado` (
  `proe_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `proe_titulo` text NOT NULL,
  `proe_titulo_guiones` text NOT NULL,
  `proe_id_envio` text NOT NULL,
  `proe_url_documento` text NOT NULL,
  `proe_id_categoria` int(11) NOT NULL,
  `proe_descripcion` text NOT NULL,
  `proe_fecha_enviado` timestamp NOT NULL,
  `proe_estado` text NOT NULL,
  PRIMARY KEY (`proe_id`),
  UNIQUE KEY `proe_id` (`proe_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
