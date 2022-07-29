-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-01-2020 a las 21:05:16
-- Versión del servidor: 5.5.46
-- Versión de PHP: 5.4.45-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `martipb1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p04users`
--

CREATE TABLE IF NOT EXISTS `p04users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `surname1` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `surname2` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `registerdate` datetime NOT NULL,
  `blockeduser` tinyint(1) NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `profile` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `userft` (`name`,`surname1`,`surname2`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `p04users`
--

INSERT INTO `p04users` (`id`, `name`, `surname1`, `surname2`, `registerdate`, `blockeduser`, `email`, `password`, `profile`) VALUES
(1, 'David', 'Sánchez', 'Carreras', '2019-12-01 00:00:00', 0, 'david@citm.edu', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'Pepe', 'Llopis', 'Prova', '2019-12-10 08:31:40', 0, 'pepe@llopis.cat', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(3, 'marti', 'pena', 'bernils', '2020-01-03 00:00:00', 0, 'marti@gmail.com', 'abc123', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
