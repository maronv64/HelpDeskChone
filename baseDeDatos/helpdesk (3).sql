-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2018 a las 17:11:46
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `helpdesk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `idusuario` int(10) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tamano` varchar(45) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `estado_del` varchar(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idarea` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `extencion` varchar(100) NOT NULL,
  `siglas` varchar(100) NOT NULL,
  `estado_del` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `nombre`, `correo`, `extencion`, `siglas`, `estado_del`) VALUES
(1, 'Rentas', 'hola@hola.com', 'nose', 'hola', '1'),
(2, 'Tecnología', 'leonardo@homail', '1256', 'LAS', '1'),
(3, 'edas', 'asdas@hotma', 'asd', 'asd', '1'),
(4, 'Ventas', 'ventas@hotmail.com', '54621', 'VGC', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `idasignacion` int(11) NOT NULL,
  `Ficha_idFicha` int(11) NOT NULL,
  `peticion_idpeticion` int(11) NOT NULL,
  `FechaRegistro` date DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaLimite` date DEFAULT NULL,
  `Observacion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`idasignacion`, `Ficha_idFicha`, `peticion_idpeticion`, `FechaRegistro`, `FechaInicio`, `FechaLimite`, `Observacion`) VALUES
(1, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'dsads'),
(2, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'hjhg'),
(3, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'hjhg'),
(4, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'sad'),
(5, 1, 11, '1999-11-30', '2018-09-17', '2018-09-17', 'sds'),
(6, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'dasds'),
(7, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'das'),
(8, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'sdsasd'),
(9, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'dsa'),
(10, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'vcxv'),
(11, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'sadas'),
(12, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'sadas'),
(13, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'cvds'),
(14, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'sadas'),
(15, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'dasds'),
(16, 1, 11, '1999-11-30', '2018-09-17', '2018-09-17', 'fdgfdgdf'),
(17, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'qwe'),
(18, 1, 12, '1999-11-30', '2018-09-17', '2018-09-17', 'dsfs'),
(19, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', NULL),
(20, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'ds'),
(21, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'ds'),
(22, 1, 2, '1999-11-30', '2018-09-17', '2018-09-06', 'afsdgfgafdg'),
(23, 1, 11, '1999-11-30', '2018-09-17', '2018-09-17', 'sfds'),
(24, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'asgfgafdg'),
(25, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'gyhrt'),
(26, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'gyhrt'),
(27, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'gyhrt'),
(28, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'nbgcvgh'),
(29, 1, 11, '1999-11-30', '2018-09-17', '2018-09-17', 'hgfdghfd'),
(30, 1, 12, '1999-11-30', '2018-09-17', '2018-09-17', 'sdas'),
(31, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'sd'),
(32, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'dsad'),
(33, 1, 11, '1999-11-30', '2018-09-17', '2018-09-17', 'dasd'),
(34, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'fxdgdsfzrgdsfgcxfvdszfgf'),
(35, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', 'fxdgdsfzrgdsfgcxfvdszfgf'),
(36, 1, 2, '1999-11-30', '2018-09-17', '2018-09-17', '41041'),
(37, 1, 2, '1999-11-30', '2018-09-06', '2018-09-14', 'sdasd'),
(38, 1, 12, '1999-11-30', '2018-09-18', '2018-09-18', 'GFFDSFDS'),
(39, 1, 11, '1999-11-30', '2018-09-06', '2018-09-14', '12321'),
(40, 1, 2, '1999-11-30', '2018-09-18', '2018-09-18', 'sdfgfdsgds'),
(41, 1, 13, '1999-11-30', '2018-09-18', '2018-09-18', 'dsad'),
(42, 1, 12, '1999-11-30', '2018-09-18', '2018-09-18', 'das'),
(43, 1, 2, '1999-11-30', '2018-09-11', '2018-09-13', 'REALIZAR A LA BREVEDAD POSIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

CREATE TABLE `dispositivos` (
  `iddispositivos` int(11) NOT NULL,
  `idtipodispositivos` int(11) NOT NULL,
  `nombredispositivo` varchar(100) NOT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `color` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `cod_activo` varchar(100) NOT NULL,
  `asignado` varchar(1) DEFAULT '0',
  `num_activo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dispositivos`
--

INSERT INTO `dispositivos` (`iddispositivos`, `idtipodispositivos`, `nombredispositivo`, `serie`, `color`, `modelo`, `marca`, `cod_activo`, `asignado`, `num_activo`) VALUES
(21, 3, 'Computador', '32546423', 'Azul', 'lm73', 'Intel', 'Inactivo', '0', 5456),
(22, 3, 'Impresora', '54987987', 'Negro', 'lm750', 'Epson', 'Activo', '1', 984654),
(23, 3, 'aaaaa', '123456', 'asdf', 'asdf', 'asdf', 'Activo', '0', 78894),
(24, 2, 'Computer', '456456', 'black', '735645', 'Hola', 'Activo', '1', 0),
(25, 1, 'asdfsad', 'asdf', 'asdfsad', 'asdfsda', 'asdf', 'Activo', '1', 0),
(26, 3, 'asdfsda', 'sadfsad', 'asdfsadf', 'asdfsadf', 'asdfsaf', 'Activo', '0', 0),
(27, 3, 'da', 'sda', 'da', 'dsa', 'da', 'Activo', '1', 0),
(28, 1, 'dsfgsdfg', 'dfsg', 'dsfg', 'sdfg', 'dfgssdffg', 'Activo', '0', 0),
(29, 1, 'fdsg', 'sdfg', 'sdfg', 'gdsfg', 'sdfg', 'Activo', '1', 0),
(30, 3, 'numero de activo', '55', 'ghjj', 'yhgf', 'hfg', 'Activo', '0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idespecialidad` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idespecialidad`, `descripcion`) VALUES
(2, 'Sistemas'),
(3, 'Tecnología'),
(4, 'Redes'),
(5, 'Pruebas'),
(6, 'Prueba2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado_del` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `descripcion`, `estado_del`) VALUES
(1, 'Asignada', '1'),
(2, 'Pendiente', '1'),
(3, 'Finalizada', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra_tecnico`
--

CREATE TABLE `extra_tecnico` (
  `idextra_tecnico` int(11) NOT NULL,
  `idusuario` int(10) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `extra_tecnico`
--

INSERT INTO `extra_tecnico` (`idextra_tecnico`, `idusuario`, `especialidad`) VALUES
(39, 148, 'Sistemas'),
(72, 193, 'Mantenimiento'),
(77, 197, 'Mantenimiento'),
(78, 204, 'Sistemas'),
(79, 206, 'Tecnología'),
(80, 207, 'Redes'),
(81, 209, 'Sistemas'),
(82, 210, 'Sistemas'),
(83, 211, 'Sistemas'),
(84, 212, 'Sistemas'),
(85, 213, 'Sistemas'),
(86, 214, 'Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `idFicha` int(11) NOT NULL,
  `detalle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`idFicha`, `detalle`) VALUES
(1, 'ghjytjytejtyejyutejytjtyjty');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticion`
--

CREATE TABLE `peticion` (
  `idpeticion` int(11) NOT NULL,
  `idprioridad` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  `idtipopeticion` int(11) NOT NULL,
  `idusuario` int(10) NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `estado_del` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peticion`
--

INSERT INTO `peticion` (`idpeticion`, `idprioridad`, `idestado`, `idtipopeticion`, `idusuario`, `descripcion`, `estado_del`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 1, 144, 'hola que tal', '0', '2018-09-18 20:12:35', NULL),
(26, 1, 1, 2, 152, 'maron', '1', '2018-09-18 20:12:35', NULL),
(27, 1, 1, 1, 152, 'maron', '1', '2018-09-18 20:12:35', NULL),
(44, 2, 1, 1, 152, 'hola que haces', '1', '2018-09-18 20:12:35', NULL),
(45, 2, 2, 2, 203, 'prueba maron vera', '0', '2018-09-18 20:12:35', NULL),
(46, 3, 2, 1, 152, 'se me daño la pc tgthtrhththrtwr6h6ryuwr57yuj6rw3ure7nji7b7r5uivf6fu6ri7uiuthfergregreg5rgregregregrgrgyrhbytjh6hthrthrehrthgnhgfngfdhj6bu7tc v7tckf7kvj7t767g7t', '0', '2018-09-18 20:27:04', NULL),
(47, 2, 2, 1, 144, 'hola como estan todos', '0', '2018-09-19 20:15:36', NULL),
(48, 2, 2, 1, 144, 'moshi moshi', '0', '2018-09-19 20:22:35', NULL),
(49, 2, 1, 1, 144, 'wwwwwww', '1', '2018-09-19 22:03:03', NULL),
(50, 1, 2, 1, 199, 'hola hola', '0', '2018-09-19 22:42:26', NULL),
(51, 2, 1, 2, 199, 'Un formato de solicitud de mantenimiento es una solicitud que se hace por escrito  para  exponer las fallas, o defectos técnicos de algún  objeto, producto o aparato y solicitar su reparación, dirigido a la entidad responsable de ello, ya sea esta gubernamental, (en casos de mantenimientos de calles, escuelas o edificios públicos), a una fábrica o empresa, (en caso de productos defectuosos o incompletos), a una persona o empresa especializada (como en el caso del mantenimiento de edificios privados por parte de empresas que prestan el servicio de mantenimiento, o de parte de trabajadores individuales como fontaneros o electricistas).  URL del artículo: https://www.ejemplode.com/11-escritos/2766-ejemplo_de_formato_de_solicitud_de_mantenimiento.html Nota completa: Ejemplo de Formato de solicitud de mantenimiento', '1', '2018-09-20 02:34:21', NULL),
(52, 1, 1, 1, 200, 'dfsdfsdfsdfsdf', '1', '2018-09-22 00:10:27', NULL),
(53, 2, 1, 2, 213, 'fsadfsd', '1', '2018-09-25 18:42:44', NULL),
(54, 1, 1, 2, 213, 'fsadfsd', '1', '2018-09-25 18:42:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad`
--

CREATE TABLE `prioridad` (
  `idprioridad` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado_del` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prioridad`
--

INSERT INTO `prioridad` (`idprioridad`, `descripcion`, `estado_del`) VALUES
(1, 'Alta', '1'),
(2, 'Media', '1'),
(3, 'Baja', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE `software` (
  `idsoftware` int(11) NOT NULL,
  `idtiposoftware` int(11) NOT NULL,
  `nombre` varchar(200) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodispositivos`
--

CREATE TABLE `tipodispositivos` (
  `idtipodispositivos` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodispositivos`
--

INSERT INTO `tipodispositivos` (`idtipodispositivos`, `descripcion`) VALUES
(1, 'Tipo uno'),
(2, 'Tipo dos'),
(3, 'Tipo tres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopeticion`
--

CREATE TABLE `tipopeticion` (
  `idtipopeticion` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado_del` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipopeticion`
--

INSERT INTO `tipopeticion` (`idtipopeticion`, `descripcion`, `estado_del`) VALUES
(1, 'Mantenimiento Correctivo', '1'),
(2, 'Mantenimiento Preventivo', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_software`
--

CREATE TABLE `tipo_software` (
  `idtipo_software` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idtipo_Usuario` int(10) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipo_Usuario`, `descripcion`) VALUES
(1, 'Usuario Normal'),
(2, 'Administrador'),
(3, 'Secretaria'),
(4, 'Jefe Tecnología'),
(5, 'Técnico'),
(6, 'Municipal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtipousuario` int(10) NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idarea` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellidos`, `cedula`, `sexo`, `celular`, `email`, `password`, `idtipousuario`, `estado`, `idarea`, `remember_token`, `created_at`, `updated_at`, `img`) VALUES
(144, 'Luis', 'Coaboy', '1315700631', 'Masculino', '0982284179', 'luis@hotmail.com', '$2y$10$DbcPyiYIusYpKxPVC80o1.PHKHYmobZ/fIqpZrbeqdPHiHcAj6zl6', 4, 'Activo', 1, 'g2PLc3YI4e14qBCaKDKfhI01qLN0BsMVUgl6GbfoPcH5wzHhDguLe5GDB6fw', NULL, NULL, ''),
(148, 'junior', 'parraga', '1313402925', 'Masculino', '0990987071', 'junior_pg1995@hotmail.com', '$2y$10$q/4.N8wqEBttpnjbOoBJoO3qmlTj2fC1TMK/nTqyrFSZDJfhqdvdy', 5, 'Activo', 1, 'HBJc2f9AIH3oGrIcQzCod7irP0XpodFUsQqjIKBzQ5k1lCX3VwUh6xNbCeHg', NULL, NULL, ''),
(150, 'Gabriel', 'Pachard', '1315221562', 'Femenino', '0979932503', 'pachard@hotmail.com', '$2y$10$OQCetQywbKScrk.IDYjDKea7LuRBk5VXD2.IuM/w8msiuyYEBCe/2', 3, 'Inactivo', 1, NULL, NULL, NULL, ''),
(152, 'Cesar', 'Andrade', '1311190027', 'Masculino', '0989873765', 'cesar@hotmail.com', '$2y$10$RNbK.WDTzhVQgdtodQT9quWNCHuSbBvYCSdjc8s5p1CJAVPoAf2Jy', 1, 'Activo', 1, 'rgZQqBM7Ah02pc7nmvh6WtUybf2mmLZ9cemx8CEp9DyoBLtrpquhMoWqKoXz', NULL, NULL, ''),
(161, 'jose', 'sabando', '1315221562', 'Femenino', '0979932503', 'leonardo21@hotmail.com', '$2y$10$DHp9jij809P.71K5jeMXq.jjIS9eOOf0nB/9l2qtc1zYfBtKIiYwa', 5, 'Inactivo', 2, 'q4eHTwIIGLNHv7OCaaJXoee6dyECaPs8esHB8E3XeWGnE6s6ZHCZhu7ti42o', NULL, NULL, ''),
(162, 'jose', '1', '1315221562', 'Masculino', '0979932503', 'leonardo31@hotmail.com', '$2y$10$kOWuW2lzFPUmNsWL54Ckw.w2PhjHRnDW5d0XiCq.OyIWgay9nl40y', 5, 'Inactivo', 1, NULL, NULL, NULL, ''),
(193, '2', '2', '2', 'Femenino', '0979932503', 'leonardo13@hotmail.com', '$2y$10$CMnUCzo2n2uaelv.daTuPOqHHQp/l5A.cnf6hoLv4CYO9CgF.eyg2', 5, 'Inactivo', 1, NULL, NULL, NULL, ''),
(197, 'jose', 'sabando', 'q', 'Femenino', '0979932503', 'cesar@hotmail.com', '$2y$10$A2tGMiUBra2dNvT2yy.VxexeqXhxI7eKuRlByqPy4d0fRtg7OEigO', 5, 'Inactivo', 1, NULL, NULL, NULL, ''),
(198, 'Leonardo', 'Sabando', '131522', 'Femenino', '0979932503', 'leonardo1@hotmail.com', '$2y$10$J5uC5dZa0ajf177mbg6yjOodPFThy/hBedmkd6PMHCcXRKPe6YfF6', 2, 'Inactivo', 1, NULL, NULL, NULL, ''),
(199, 'Leonardo', 'Sabando', '1315221562', 'Masculino', '0979932503', 'leonardo@hotmail.com', '$2y$10$sRmon2bdqGgd5zXGkxrk1eM0j/mjBTDd8aUm46Tpw5Wgk2KmyiA72', 2, 'Activo', 2, 'nVt3imM2qS70kGyIc6ARJiiiGsFmlRp8Wcqtz1zq425oZjHhRHwi9CYDbNev', NULL, NULL, ''),
(200, 'stefy', 'kuffo', '1313909025', 'Femenino', '0982456179', 'stefy@hotmail.com', '$2y$10$x9x.sf61LK77a9LOa3r8Y.6CU1o7jxg/cDxOEzbS2u4HVKu8b5IRW', 1, 'Activo', 2, 'Rb64PwPD52dYKKYbGwj7GLGCiAUMWFqGBTRHYmCVwyd1vWYebYil5IjKv49n', NULL, NULL, ''),
(201, 'Gabriel', 'Pachard', '1313808027', 'Masculino', '0546856179', 'gabriel@hotmail.com', '$2y$10$2OGWOjxhyb5Q.Kqaxivmau/wWbIhhN50OMqn6ynzMw4aXe.5ywVBq', 2, 'Activo', 2, NULL, NULL, NULL, ''),
(202, 'Maron', 'Vera', '1312929124', 'Masculino', '0945862187', 'maron@hotmail.com', '$2y$10$3qzXQ.FjB3ZnNkjLfWOXEuNhB6n9k1.iKNVmwdwxPP/wEGxUdZU4q', 4, 'Activo', 2, NULL, NULL, NULL, ''),
(203, 'Sara', 'Zambrano', '1375486213', 'Femenino', '0982445821', 'sara@hotmail.com', '$2y$10$C8/88N9zVe1GEaprfi1n9ur2murmZiT7m5.Hf8fLV84KIRBKdUeme', 1, 'Activo', 2, NULL, NULL, NULL, ''),
(204, 'Adrian', 'Alcívar', '1375487594', 'Masculino', '0982454578', 'adrian@hotmail.com', '$2y$10$3ViIhkRs7qIjp.r2lZs22eY9AbxhUx2v5DPY45mXQ7TxLCfEzf0ie', 5, 'Activo', 2, NULL, NULL, NULL, ''),
(205, 'Joselin', 'Loor', '1375486542', 'Femenino', '0982475694', 'joselin@hotmail.com', '$2y$10$4grcXSSDaWAe8vro/AitSO6xaeVABgI6m9fbRgPstrS8DbLpojPZe', 3, 'Activo', 2, NULL, NULL, NULL, ''),
(206, 'Pamela', 'Zambrano', '1313904216', 'Femenino', '0945215821', 'pamela@hotmail.com', '$2y$10$PrSrW0SeMBXKOd7pKsmbPOKuUsCAWgcDbnM4eVgQqfUrg9LBW.YQ.', 5, 'Activo', 2, NULL, NULL, NULL, ''),
(207, 'Daniela', 'Loor', '1374213613', 'Femenino', '0982444521', 'daniela@hotmail.com', '$2y$10$ncbh6zjijEMgoeG2NkGU5OBafG.hd9F5n1LeinT/t5g.K6/w47oJy', 5, 'Inactivo', 2, NULL, NULL, NULL, ''),
(208, 'marona', 'dsa', 'das', 'Masculino', 'das', 'leonardo@hotmail.com', '$2y$10$cuEXjoch3p6uK/t3zBhn3u5duVKs/bAn6IqzKk36Ezj9gRUiEJMz.', 1, 'Activo', 1, NULL, NULL, NULL, ''),
(209, 'Yesenia', 'Zambrano', '1375484527', 'Femenino', '0982412563', 'yesenia@hotmail.com', '$2y$10$V2RRnIRmARVdW2kKe6/MpOL.nEQNBzFVHb3xWz.M1GhkGgVtKNa4K', 5, 'Activo', 1, NULL, NULL, NULL, ''),
(210, 'Luis', 'Alcívar', '1374245213', 'Masculino', '0982442779', 'luis@hotmail.com', '$2y$10$pme4BC0nAAoTRHKSQjS/qOHg99l8A33TyI5z1CkrcTY2EcuME0SLG', 5, 'Activo', 1, NULL, NULL, NULL, ''),
(211, 'Servio', 'Zambrano', '1375486457', 'Masculino', '0982445452', 'servio@hotmail.com', '$2y$10$ncnBWW0Hny/D8aHyaMp95ufjzFYLYz23vzU3ijyFT41iInt7sCt3W', 5, 'Activo', 1, NULL, NULL, NULL, ''),
(212, 'Juan', 'Loor', '1375487542', 'Masculino', '0982445452', 'juan@hotmail.com', '$2y$10$qN0RfoHehjXjG2/10HI9YuBg/TXNN23yEDPQslMaeWM66dPtHCmUW', 5, 'Activo', 1, NULL, NULL, NULL, ''),
(213, 'Rosa', 'Alcívar', '1375487452', 'Femenino', '0982445412', 'rosa@hotmail.com', '$2y$10$arPEBrPnpEbwAAwsVj1FsO7msgxW9F4Q6bwlbY5gtsncaxoF/zwbG', 5, 'Activo', 1, 'WeBbZvNXXqhwnQ9xUfLT7yTYqiMwqlsch9OsaFajGKPtLxNinY1NsJPluNQn', NULL, NULL, ''),
(214, 'Mario', 'Alcívar', '1375484562', 'Masculino', '0982444521', 'mario@hotmail.com', '$2y$10$PrTTEcNYPp6FlKkl6hDwTu.ZrP5AFvnakwsx2EHLIg0sFhFYKz0uO', 5, 'Activo', 1, 'D2ZjbDWQ19q15n3eDrLnLQIaXf9rBiyms6BYBFtsR9hyr9ly9riZ5cYmIrxe', NULL, NULL, ''),
(215, 'Valentina', 'Pachard', '1313909452', 'Femenino', '0982456452', 'valentina@hotmail.com', '$2y$10$F6h75UeRX2DSV3sn6n9v9egLY9NBJ3wvuM9TNqmNGgBDjPD8P7d6u', 1, 'Activo', 1, '4hNvZWPJ1XaUTQR1grh7nTxx2Jb9iXgq6VlgfFEXcerEtMJ4k13gbZ4C82RD', NULL, NULL, 'img/avatar3.png'),
(216, 'Jose', 'Loor', '1313904521', 'Masculino', '0982445412', 'jose@hotmail.com', '$2y$10$RMJflloO2MQypGuJ1VMfwu38mR9rE8vOVfHbxCWGh7hcMRCEZgJmG', 1, 'Activo', 1, NULL, NULL, NULL, 'img/avatar5.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_asignacion`
--

CREATE TABLE `user_asignacion` (
  `iduser_asignacion` int(11) NOT NULL,
  `usuario_idUsuario` int(11) DEFAULT NULL,
  `peticion_idpeticion` int(11) DEFAULT NULL,
  `FechaRegistro` date DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaLimite` date DEFAULT NULL,
  `Observacion` varchar(3000) DEFAULT NULL,
  `HoraInicial` time NOT NULL,
  `HoraLimite` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_asignacion`
--

INSERT INTO `user_asignacion` (`iduser_asignacion`, `usuario_idUsuario`, `peticion_idpeticion`, `FechaRegistro`, `FechaInicio`, `FechaLimite`, `Observacion`, `HoraInicial`, `HoraLimite`) VALUES
(197, 148, 49, '2018-09-19', '2018-09-19', '2018-09-14', 'Dolor de Cabeza', '20:26:00', '03:02:00'),
(198, 204, 49, '2018-09-19', '2018-09-21', '2018-09-29', 'Para Reparar', '10:20:00', '13:25:00'),
(199, 209, 49, '2018-09-19', '2018-09-19', '2018-09-21', 'Dolor en la pierna', '20:40:00', '05:59:00'),
(200, 148, 44, '2018-09-19', '2018-09-19', '2018-09-15', 'Un formato de solicitud de mantenimiento es una solicitud que se hace por escrito  para  exponer las fallas, o defectos técnicos de algún  objeto, producto o aparato y solicitar su reparación, dirigido a la entidad responsable de ello, ya sea esta gubernamental, (en casos de mantenimientos de calles, escuelas o edificios públicos), a una fábrica o empresa, (en caso de productos defectuosos o incompletos), a una persona o empresa especializada (como en el caso del mantenimiento de edificios privados por parte de empresas que prestan el servicio de mantenimiento, o de parte de trabajadores individuales como fontaneros o electricistas).\n\nURL del artículo: https://www.ejemplode.com/11-escritos/2766-ejemplo_de_formato_de_solicitud_de_mantenimiento.html\nNota completa: Ejemplo de Formato de solicitud de mantenimiento', '21:14:00', '04:23:00'),
(201, 204, 27, '2018-09-19', '2018-09-01', '2018-09-05', '$(\"#actualizarclave\").on(\'change\', function(e){\n    if (this.checked) {\n        $(\"#passwordupdiv\").prop(\'hidden\',false);\n        $(\"#passwordup\").prop(\'disabled\',false);\n        $(\"#passwordup\").prop(\'required\',true);\n        $(\"#actualizarclave\").val(\'1\');\n\n    } else {\n        $(\"#passwordupdiv\").prop(\'hidden\',true);\n        $(\"#passwordup\").prop(\'disabled\',true);\n        $(\"#passwordup\").prop(\'required\',false);\n        $(\"#actualizarclave\").val(\'0\');\n    \n    }\n});', '03:21:00', '03:21:00'),
(202, 206, 27, '2018-09-19', '2018-09-08', '2018-09-09', 'dasdasdasdasd', '03:42:00', '23:04:00'),
(203, 210, 51, '2018-09-20', '2018-09-20', '2018-09-13', 'Hola que tal', '14:04:00', '03:02:00'),
(204, 213, 52, '2018-09-25', '2018-09-24', '2018-09-25', 'fsd', '14:30:00', '17:00:00'),
(205, 213, 27, '2018-09-25', '2018-09-24', '2018-09-25', '´piuouo', '14:30:00', '17:00:00'),
(206, 213, 51, '2018-09-25', '2018-09-25', '2018-09-25', 'yrtyhrt', '14:30:00', '17:00:00'),
(207, 213, 49, '2018-09-25', '2018-09-24', '2018-09-25', 'dsfdsf', '14:30:00', '17:00:00'),
(208, 204, 26, '2018-09-25', '2018-09-25', '2018-09-13', 'hgjgh', '15:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_dispositivo`
--

CREATE TABLE `usuario_dispositivo` (
  `idusuario_dispositivo` int(11) NOT NULL,
  `fecha_inicio` varchar(100) DEFAULT NULL,
  `fecha_fin` varchar(100) DEFAULT NULL,
  `usuario_idUsuario` int(11) DEFAULT NULL,
  `dispositivos_iddispositivos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_dispositivo`
--

INSERT INTO `usuario_dispositivo` (`idusuario_dispositivo`, `fecha_inicio`, `fecha_fin`, `usuario_idUsuario`, `dispositivos_iddispositivos`) VALUES
(32, '2018-09-20', '2018-09-30', 148, 24),
(46, '2018-09-25', '2018-09-22', 144, 27),
(47, '2018-09-25', '2018-09-15', 144, 29),
(49, '2018-09-25', '2018-09-22', 144, 22),
(50, '2018-09-25', '2018-09-22', 144, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_software`
--

CREATE TABLE `usuario_software` (
  `idusuario_software` int(11) NOT NULL,
  `idusuario` int(10) NOT NULL,
  `idsoftware` int(11) NOT NULL,
  `estado` varchar(45) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`idasignacion`,`Ficha_idFicha`,`peticion_idpeticion`);

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`iddispositivos`,`idtipodispositivos`),
  ADD KEY `fk_dispositivos_tipodispositivos1_idx` (`idtipodispositivos`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idespecialidad`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `extra_tecnico`
--
ALTER TABLE `extra_tecnico`
  ADD PRIMARY KEY (`idextra_tecnico`),
  ADD KEY `fk_extra_tecnico_11_idx` (`idusuario`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`idFicha`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peticion`
--
ALTER TABLE `peticion`
  ADD PRIMARY KEY (`idpeticion`,`idprioridad`,`idestado`,`idtipopeticion`,`idusuario`),
  ADD KEY `fk_peticion_prioridad1_idx` (`idprioridad`),
  ADD KEY `fk_peticion_estado1_idx` (`idestado`),
  ADD KEY `fk_peticion_tipopeticion1_idx` (`idtipopeticion`),
  ADD KEY `fk_peticion_usuario1_idx` (`idusuario`);

--
-- Indices de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  ADD PRIMARY KEY (`idprioridad`);

--
-- Indices de la tabla `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`idsoftware`),
  ADD KEY `idtiposoftware_idx` (`idtiposoftware`);

--
-- Indices de la tabla `tipodispositivos`
--
ALTER TABLE `tipodispositivos`
  ADD PRIMARY KEY (`idtipodispositivos`);

--
-- Indices de la tabla `tipopeticion`
--
ALTER TABLE `tipopeticion`
  ADD PRIMARY KEY (`idtipopeticion`);

--
-- Indices de la tabla `tipo_software`
--
ALTER TABLE `tipo_software`
  ADD PRIMARY KEY (`idtipo_software`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idtipo_Usuario`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipousuario_111_idx` (`idtipousuario`),
  ADD KEY `fk_area_111_idx` (`idarea`);

--
-- Indices de la tabla `user_asignacion`
--
ALTER TABLE `user_asignacion`
  ADD PRIMARY KEY (`iduser_asignacion`),
  ADD KEY `fk_usuario_asig1111_idx` (`usuario_idUsuario`),
  ADD KEY `fk_peticion_asig_idx` (`peticion_idpeticion`);

--
-- Indices de la tabla `usuario_dispositivo`
--
ALTER TABLE `usuario_dispositivo`
  ADD PRIMARY KEY (`idusuario_dispositivo`),
  ADD KEY `fk_dispositivo_use_idx` (`dispositivos_iddispositivos`),
  ADD KEY `fk_usuario_dis_idx` (`usuario_idUsuario`);

--
-- Indices de la tabla `usuario_software`
--
ALTER TABLE `usuario_software`
  ADD PRIMARY KEY (`idusuario_software`),
  ADD KEY `usuario_software_fk2_idx` (`idsoftware`),
  ADD KEY `usuario_software_fk1_idx` (`idusuario`),
  ADD KEY `usuario_software_fk11_idx` (`idusuario`),
  ADD KEY `usuario_software_fk111_idx` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `idasignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `iddispositivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idespecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `extra_tecnico`
--
ALTER TABLE `extra_tecnico`
  MODIFY `idextra_tecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `idFicha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `peticion`
--
ALTER TABLE `peticion`
  MODIFY `idpeticion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  MODIFY `idprioridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `idsoftware` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipodispositivos`
--
ALTER TABLE `tipodispositivos`
  MODIFY `idtipodispositivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipopeticion`
--
ALTER TABLE `tipopeticion`
  MODIFY `idtipopeticion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_software`
--
ALTER TABLE `tipo_software`
  MODIFY `idtipo_software` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idtipo_Usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT de la tabla `user_asignacion`
--
ALTER TABLE `user_asignacion`
  MODIFY `iduser_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de la tabla `usuario_dispositivo`
--
ALTER TABLE `usuario_dispositivo`
  MODIFY `idusuario_dispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `usuario_software`
--
ALTER TABLE `usuario_software`
  MODIFY `idusuario_software` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD CONSTRAINT `fk_dispositivos_tipodispositivos1` FOREIGN KEY (`idtipodispositivos`) REFERENCES `tipodispositivos` (`idtipodispositivos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `extra_tecnico`
--
ALTER TABLE `extra_tecnico`
  ADD CONSTRAINT `fk_extra_tecnico_11` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `peticion`
--
ALTER TABLE `peticion`
  ADD CONSTRAINT `fk_peticion_estado1` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peticion_prioridad1` FOREIGN KEY (`idprioridad`) REFERENCES `prioridad` (`idprioridad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peticion_tipopeticion1` FOREIGN KEY (`idtipopeticion`) REFERENCES `tipopeticion` (`idtipopeticion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peticion_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `software`
--
ALTER TABLE `software`
  ADD CONSTRAINT `idtiposoftware_fk` FOREIGN KEY (`idtiposoftware`) REFERENCES `tipo_software` (`idtipo_software`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_area_111` FOREIGN KEY (`idarea`) REFERENCES `area` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipousuario_111` FOREIGN KEY (`idtipousuario`) REFERENCES `tipo_usuario` (`idtipo_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user_asignacion`
--
ALTER TABLE `user_asignacion`
  ADD CONSTRAINT `fk_peticion_asig` FOREIGN KEY (`peticion_idpeticion`) REFERENCES `peticion` (`idpeticion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_asig1111` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_dispositivo`
--
ALTER TABLE `usuario_dispositivo`
  ADD CONSTRAINT `fk_dispositivo_use` FOREIGN KEY (`dispositivos_iddispositivos`) REFERENCES `dispositivos` (`iddispositivos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_dis` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_software`
--
ALTER TABLE `usuario_software`
  ADD CONSTRAINT `usuario_software_fk111` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_software_fk2` FOREIGN KEY (`idsoftware`) REFERENCES `software` (`idsoftware`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
