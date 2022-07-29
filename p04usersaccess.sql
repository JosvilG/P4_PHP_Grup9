-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-01-2020 a las 21:05:50
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
-- Estructura de tabla para la tabla `p04usersaccess`
--

CREATE TABLE IF NOT EXISTS `p04usersaccess` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `pais` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `p04usersaccess`
--

INSERT INTO `p04usersaccess` (`id`, `ip`, `date`, `pais`, `userid`) VALUES
(2, '83.55.234.182', '2020-01-09 22:05:13', 'Spain', 3),
(3, '83.55.234.182', '2020-01-09 22:11:17', 'Spain', 3),
(4, '83.55.234.182', '2020-01-12 18:57:49', 'Spain', 3),
(5, '83.55.234.182', '2020-01-12 19:02:48', 'Spain', 3),
(6, '83.55.234.182', '2020-02-12 19:03:02', 'Spain', 3),
(7, '83.55.234.182', '2019-01-12 18:57:49', 'Spain', 3),
(8, '83.55.234.182', '2020-01-12 20:02:48', 'Spain', 3),
(9, '67.55.234.182', '2020-01-12 19:57:49', 'Spain', 2),
(10, '67.55.234.182', '2020-01-23 09:57:49', 'Spain', 2),
(11, '67.55.234.182', '2020-01-24 13:57:49', 'Spain', 2),
(12, '67.55.234.182', '2020-01-24 16:57:49', 'Spain', 2),
(13, '67.55.234.182', '2020-01-24 20:57:49', 'Spain', 2),
(14, '83.55.234.182', '2020-01-12 19:36:28', 'Spain', 3),
(15, '83.55.234.182', '2020-02-20 11:36:28', 'Spain', 3),
(16, '67.55.234.182', '2020-06-08 08:57:49', 'Spain', 2),
(17, '67.55.234.182', '2020-06-10 11:27:49', 'Spain', 2),
(18, '67.55.234.182', '2020-06-11 15:13:16', 'Spain', 2),
(19, '83.55.234.182', '2019-05-14 08:57:49', 'Spain', 3),
(20, '83.55.234.182', '2019-05-16 12:25:49', 'Spain', 3),
(21, '83.55.234.182', '2020-01-12 22:46:05', 'Spain', 3),
(22, '88.4.158.93', '2020-01-12 22:47:48', 'Spain', 3),
(23, '2.138.141.117', '2020-01-12 22:47:55', 'Spain', 3),
(24, '83.55.234.182', '2020-01-12 22:47:58', 'Spain', 3),
(25, '2.138.12.121', '2020-01-12 22:49:33', 'Spain', 3),
(26, '83.55.234.182', '2020-01-13 00:33:46', 'Spain', 3),
(27, '83.55.234.182', '2020-01-13 00:51:44', 'Spain', 3),
(28, '83.55.234.182', '2020-01-13 01:00:53', 'Spain', 3),
(29, '83.55.234.182', '2020-01-13 20:54:52', 'Spain', 3),
(30, '79.155.56.29', '2020-01-13 21:02:07', 'Spain', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
