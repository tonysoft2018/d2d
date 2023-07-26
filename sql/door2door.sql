-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 74.208.28.66:3306
-- Tiempo de generación: 26-07-2023 a las 19:55:54
-- Versión del servidor: 5.5.68-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `door2door`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajusteCuestionario`
--

CREATE TABLE `ajusteCuestionario` (
  `idACuestionarios` int(11) NOT NULL,
  `idCuestionariosVisitante` int(11) NOT NULL,
  `idCuestionariosCliente` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ajusteCuestionario`
--

INSERT INTO `ajusteCuestionario` (`idACuestionarios`, `idCuestionariosVisitante`, `idCuestionariosCliente`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(3, 13, 3, '2023-02-16 09:18:33', '2023-07-12 02:20:34', ' [ UPFATE 2023-07-12 02:20:34 ], [ idUser  ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivosxsolicitud`
--

CREATE TABLE `archivosxsolicitud` (
  `idAxS` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `archivo` text NOT NULL,
  `tipoArchivo` varchar(30) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivosxsolicitud`
--

INSERT INTO `archivosxsolicitud` (`idAxS`, `idSolicitud`, `archivo`, `tipoArchivo`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(2, 11, '/door2door/Modules/ModulesImage/Test/ine1.jpg', 'INE FRENTE', '2023-02-14 18:15:26', '2023-02-14 18:15:26', 'Test', 1),
(3, 11, '/door2door/Modules/ModulesImage/Test/ine2.jpg', 'INE ATRAS', '2023-02-14 18:15:26', '2023-02-14 18:15:26', 'Test', 1),
(4, 11, '/door2door/Modules/ModulesImage/Test/cfe1.png', 'COMPREBATE DE DOMICILIO', '2023-02-14 18:15:26', '2023-02-14 18:15:26', 'Test', 1),
(5, 11, '/door2door/Modules/ModulesImage/Test/cfe2.png', 'TARJETA DE CIRCULACION', '2023-02-14 18:15:26', '2023-02-14 18:15:26', 'Test', 1),
(6, 11, '/door2door/Modules/ModulesImage/Test/cfe3.png', 'TARJETA BANCARIA', '2023-02-14 18:15:26', '2023-02-14 18:15:26', 'Test', 1),
(8, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421072555.wc1674576.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 07:25:56', '2023-04-21 07:25:56', ' [ INSERT 2023-04-21 07:25:56 ], [ idUser 30 ] ', 1),
(9, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421074822.wc1674576.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 07:48:23', '2023-04-21 07:48:23', ' [ INSERT 2023-04-21 07:48:23 ], [ idUser 30 ] ', 1),
(10, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421074918.wc1674576.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 07:49:18', '2023-04-21 07:49:18', ' [ INSERT 2023-04-21 07:49:18 ], [ idUser 30 ] ', 1),
(11, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421074950.wc1674576.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 07:49:50', '2023-04-21 07:49:50', ' [ INSERT 2023-04-21 07:49:50 ], [ idUser 30 ] ', 1),
(12, 36, 'd2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421075107.wc1674576.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 07:51:08', '2023-04-21 07:51:08', ' [ INSERT 2023-04-21 07:51:08 ], [ idUser 30 ] ', 1),
(13, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421075122.wc1674576.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 07:51:22', '2023-04-21 07:51:22', ' [ INSERT 2023-04-21 07:51:22 ], [ idUser 30 ] ', 1),
(14, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421075628.wallpaper.png', 'COMPREBATE DE DOMICILIO', '2023-04-21 07:56:28', '2023-04-21 07:56:28', ' [ INSERT 2023-04-21 07:56:28 ], [ idUser 30 ] ', 1),
(15, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421080003.17045832.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 08:00:03', '2023-04-21 08:00:03', ' [ INSERT 2023-04-21 08:00:03 ], [ idUser 30 ] ', 1),
(16, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421080041.17045832.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 08:00:41', '2023-04-21 08:00:41', ' [ INSERT 2023-04-21 08:00:41 ], [ idUser 30 ] ', 1),
(17, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421080118.17045832.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 08:01:18', '2023-04-21 08:01:18', ' [ INSERT 2023-04-21 08:01:18 ], [ idUser 30 ] ', 1),
(18, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421080206.17045832.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 08:02:07', '2023-04-21 08:02:07', ' [ INSERT 2023-04-21 08:02:07 ], [ idUser 30 ] ', 1),
(19, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421080446.wc1674576.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 08:04:47', '2023-04-21 08:04:47', ' [ INSERT 2023-04-21 08:04:47 ], [ idUser 30 ] ', 1),
(20, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421080547.311482604_230746842644692_3436332382040546959_n.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-21 08:05:47', '2023-04-21 08:05:47', ' [ INSERT 2023-04-21 08:05:47 ], [ idUser 30 ] ', 1),
(21, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421081433.311482604_230746842644692_3436332382040546959_n.jpg', 'INE FRENTE', '2023-04-21 08:14:33', '2023-04-21 08:14:33', ' [ INSERT 2023-04-21 08:14:33 ], [ idUser 30 ] ', 1),
(22, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421081725.311600429_230218702697506_4882221298542333759_n.jpg', 'INE ATRAS', '2023-04-21 08:17:25', '2023-04-21 08:17:25', ' [ INSERT 2023-04-21 08:17:25 ], [ idUser 30 ] ', 1),
(23, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421082206.330305570_168309099366167_8366181669121522556_n.jpg', 'TARJETA DE CIRCULACION', '2023-04-21 08:22:06', '2023-04-21 08:22:06', ' [ INSERT 2023-04-21 08:22:06 ], [ idUser 30 ] ', 1),
(24, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421082209.330305570_168309099366167_8366181669121522556_n.jpg', 'TARJETA DE CIRCULACION', '2023-04-21 08:22:10', '2023-04-21 08:22:10', ' [ INSERT 2023-04-21 08:22:10 ], [ idUser 30 ] ', 1),
(25, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421082332.330305570_168309099366167_8366181669121522556_n.jpg', 'TARJETA DE CIRCULACION', '2023-04-21 08:23:33', '2023-04-21 08:23:33', ' [ INSERT 2023-04-21 08:23:33 ], [ idUser 30 ] ', 1),
(26, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421082406.330305570_168309099366167_8366181669121522556_n.jpg', 'TARJETA DE CIRCULACION', '2023-04-21 08:24:06', '2023-04-21 08:24:06', ' [ INSERT 2023-04-21 08:24:06 ], [ idUser 30 ] ', 1),
(27, 36, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarBravo3020230421085035.313998036_232848312434545_8074563557823102891_n.jpg', 'TARJETA BANCARIA', '2023-04-21 08:50:36', '2023-04-21 08:50:36', ' [ INSERT 2023-04-21 08:50:36 ], [ idUser 30 ] ', 1),
(28, 38, '', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:26:48', '2023-04-25 12:26:48', ' [ INSERT 2023-04-25 12:26:48 ], [ idUser 32 ] ', 1),
(29, 38, '', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:28:11', '2023-04-25 12:28:11', ' [ INSERT 2023-04-25 12:28:11 ], [ idUser 32 ] ', 1),
(30, 38, '', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:29:02', '2023-04-25 12:29:02', ' [ INSERT 2023-04-25 12:29:02 ], [ idUser 32 ] ', 1),
(31, 38, '', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:29:03', '2023-04-25 12:29:03', ' [ INSERT 2023-04-25 12:29:03 ], [ idUser 32 ] ', 1),
(32, 38, '', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:29:37', '2023-04-25 12:29:37', ' [ INSERT 2023-04-25 12:29:37 ], [ idUser 32 ] ', 1),
(33, 38, '', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:30:11', '2023-04-25 12:30:11', ' [ INSERT 2023-04-25 12:30:11 ], [ idUser 32 ] ', 1),
(34, 38, '', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:30:59', '2023-04-25 12:30:59', ' [ INSERT 2023-04-25 12:30:59 ], [ idUser 32 ] ', 1),
(35, 38, '', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:33:10', '2023-04-25 12:33:10', ' [ INSERT 2023-04-25 12:33:10 ], [ idUser 32 ] ', 1),
(36, 38, '-', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:34:12', '2023-04-25 12:34:12', ' [ INSERT 2023-04-25 12:34:12 ], [ idUser 32 ] ', 1),
(37, 38, 'nada', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:35:03', '2023-04-25 12:35:03', ' [ INSERT 2023-04-25 12:35:03 ], [ idUser 32 ] ', 1),
(38, 38, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarDelagado3220230425123544.16505570751332.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:35:44', '2023-04-25 12:35:44', ' [ INSERT 2023-04-25 12:35:44 ], [ idUser 32 ] ', 1),
(39, 38, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarDelagado3220230425123555.16505570751332.jpg', 'INE FRENTE', '2023-04-25 12:35:55', '2023-04-25 12:35:55', ' [ INSERT 2023-04-25 12:35:55 ], [ idUser 32 ] ', 1),
(40, 38, '', 'INE ATRAS', '2023-04-25 12:37:45', '2023-04-25 12:37:45', ' [ INSERT 2023-04-25 12:37:45 ], [ idUser 32 ] ', 1),
(41, 38, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarDelagado3220230425123834.16505570751332.jpg', 'INE ATRAS', '2023-04-25 12:38:34', '2023-04-25 12:38:34', ' [ INSERT 2023-04-25 12:38:34 ], [ idUser 32 ] ', 1),
(42, 38, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarDelagado3220230425123846.16505570751332.jpg', 'TARJETA DE CIRCULACION', '2023-04-25 12:38:46', '2023-04-25 12:38:46', ' [ INSERT 2023-04-25 12:38:46 ], [ idUser 32 ] ', 1),
(43, 38, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarDelagado3220230425123856.halo-infinite-halo-hd-wallpaper-preview.jpg', 'TARJETA BANCARIA', '2023-04-25 12:38:56', '2023-04-25 12:38:56', ' [ INSERT 2023-04-25 12:38:56 ], [ idUser 32 ] ', 1),
(44, 38, '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarDelagado3220230425124400.wallpaper.png', 'COMPREBATE DE DOMICILIO', '2023-04-25 12:44:00', '2023-04-25 12:44:00', ' [ INSERT 2023-04-25 12:44:00 ], [ idUser 32 ] ', 1),
(45, 39, '/d2dVisitador/Perfil/Perfil/api/Documentos/AlejandroDaniel3320230425013505.wc1674576.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-25 01:35:05', '2023-04-25 01:35:05', ' [ INSERT 2023-04-25 01:35:05 ], [ idUser 33 ] ', 1),
(46, 39, '/d2dVisitador/Perfil/Perfil/api/Documentos/AlejandroDaniel3320230425013600.wallpaper.png', 'INE ATRAS', '2023-04-25 01:36:01', '2023-04-25 01:36:01', ' [ INSERT 2023-04-25 01:36:01 ], [ idUser 33 ] ', 1),
(47, 39, '/d2dVisitador/Perfil/Perfil/api/Documentos/AlejandroDaniel3320230425013609.halo-infinite-halo-hd-wallpaper-preview.jpg', 'TARJETA DE CIRCULACION', '2023-04-25 01:36:09', '2023-04-25 01:36:09', ' [ INSERT 2023-04-25 01:36:09 ], [ idUser 33 ] ', 1),
(48, 39, '/d2dVisitador/Perfil/Perfil/api/Documentos/AlejandroDaniel3320230425013618.halo-infinite-halo-hd-wallpaper-preview.jpg', 'TARJETA BANCARIA', '2023-04-25 01:36:18', '2023-04-25 01:36:18', ' [ INSERT 2023-04-25 01:36:18 ], [ idUser 33 ] ', 1),
(49, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230425101548.IMG-20230425-WA0004.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-25 10:15:48', '2023-05-15 09:26:47', ' [ DELETE 2023-05-15 09:26:47 ], [ idUser 43 ] ', 0),
(50, 46, '/d2dVisitador/Perfil/Perfil/api/Documentos/anderson4020230427115756.IMG-20230424-WA0000.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-27 11:57:56', '2023-04-27 11:57:56', ' [ INSERT 2023-04-27 11:57:56 ], [ idUser 40 ] ', 1),
(51, 46, '/d2dVisitador/Perfil/Perfil/api/Documentos/anderson4020230427115810.Jesus Rio.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-27 11:58:10', '2023-04-27 11:58:10', ' [ INSERT 2023-04-27 11:58:10 ], [ idUser 40 ] ', 1),
(52, 46, '/d2dVisitador/Perfil/Perfil/api/Documentos/anderson4020230428084745.Screenshot_2023-04-26-11-00-32-614.jpg', 'COMPREBATE DE DOMICILIO', '2023-04-28 08:47:45', '2023-04-28 08:47:45', ' [ INSERT 2023-04-28 08:47:45 ], [ idUser 40 ] ', 1),
(53, 46, '/d2dVisitador/Perfil/Perfil/api/Documentos/anderson4020230428084819.Screenshot_2023-04-27-15-07-38-199.jpg', 'INE ATRAS', '2023-04-28 08:48:19', '2023-04-28 08:48:19', ' [ INSERT 2023-04-28 08:48:19 ], [ idUser 40 ] ', 1),
(54, 46, '/d2dVisitador/Perfil/Perfil/api/Documentos/anderson4020230428084840.Screenshot_2023-04-27-15-07-38-199.jpg', 'TARJETA DE CIRCULACION', '2023-04-28 08:48:40', '2023-04-28 08:48:40', ' [ INSERT 2023-04-28 08:48:40 ], [ idUser 40 ] ', 1),
(55, 46, '/d2dVisitador/Perfil/Perfil/api/Documentos/anderson4020230428084913.Screenshot_2023-04-27-15-07-38-199.jpg', 'TARJETA BANCARIA', '2023-04-28 08:49:13', '2023-04-28 08:49:13', ' [ INSERT 2023-04-28 08:49:13 ], [ idUser 40 ] ', 1),
(56, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511014414.16505570751332.jpg', 'COMPREBATE DE DOMICILIO', '2023-05-11 01:44:14', '2023-05-15 09:26:47', ' [ DELETE 2023-05-15 09:26:47 ], [ idUser 43 ] ', 0),
(57, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511014850.wc1674576.jpg', 'COMPREBATE DE DOMICILIO', '2023-05-11 01:48:51', '2023-05-15 09:26:47', ' [ DELETE 2023-05-15 09:26:47 ], [ idUser 43 ] ', 0),
(58, 43, '', 'INE FRENTE', '2023-05-11 01:48:59', '2023-05-15 09:26:58', ' [ DELETE 2023-05-15 09:26:58 ], [ idUser 43 ] ', 0),
(59, 43, '', 'INE FRENTE', '2023-05-11 01:49:00', '2023-05-15 09:26:58', ' [ DELETE 2023-05-15 09:26:58 ], [ idUser 43 ] ', 0),
(60, 43, '', 'INE FRENTE', '2023-05-11 01:49:01', '2023-05-15 09:26:58', ' [ DELETE 2023-05-15 09:26:58 ], [ idUser 43 ] ', 0),
(61, 43, '', 'INE FRENTE', '2023-05-11 01:49:02', '2023-05-15 09:26:58', ' [ DELETE 2023-05-15 09:26:58 ], [ idUser 43 ] ', 0),
(62, 43, '', 'INE FRENTE', '2023-05-11 01:49:09', '2023-05-15 09:26:58', ' [ DELETE 2023-05-15 09:26:58 ], [ idUser 43 ] ', 0),
(63, 43, '', 'INE FRENTE', '2023-05-11 01:50:38', '2023-05-15 09:26:58', ' [ DELETE 2023-05-15 09:26:58 ], [ idUser 43 ] ', 0),
(64, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015125.16505570751332.jpg', 'INE FRENTE', '2023-05-11 01:51:25', '2023-05-15 09:26:58', ' [ DELETE 2023-05-15 09:26:58 ], [ idUser 43 ] ', 0),
(65, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015144.16505570751332.jpg', 'INE ATRAS', '2023-05-11 01:51:45', '2023-05-15 09:27:11', ' [ DELETE 2023-05-15 09:27:11 ], [ idUser 43 ] ', 0),
(66, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015415.16505570751332.jpg', 'TARJETA DE CIRCULACION', '2023-05-11 01:54:15', '2023-05-15 09:27:29', ' [ DELETE 2023-05-15 09:27:29 ], [ idUser 43 ] ', 0),
(67, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015437.wc1674576.jpg', 'TARJETA BANCARIA', '2023-05-11 01:54:38', '2023-05-15 09:27:49', ' [ DELETE 2023-05-15 09:27:49 ], [ idUser 43 ] ', 0),
(68, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015438.wc1674576.jpg', 'TARJETA BANCARIA', '2023-05-11 01:54:39', '2023-05-15 09:27:49', ' [ DELETE 2023-05-15 09:27:49 ], [ idUser 43 ] ', 0),
(69, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015439.wc1674576.jpg', 'TARJETA BANCARIA', '2023-05-11 01:54:40', '2023-05-15 09:27:49', ' [ DELETE 2023-05-15 09:27:49 ], [ idUser 43 ] ', 0),
(70, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015441.wc1674576.jpg', 'TARJETA BANCARIA', '2023-05-11 01:54:41', '2023-05-15 09:27:49', ' [ DELETE 2023-05-15 09:27:49 ], [ idUser 43 ] ', 0),
(71, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015442.wc1674576.jpg', 'TARJETA BANCARIA', '2023-05-11 01:54:42', '2023-05-15 09:27:49', ' [ DELETE 2023-05-15 09:27:49 ], [ idUser 43 ] ', 0),
(72, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015443.wc1674576.jpg', 'TARJETA BANCARIA', '2023-05-11 01:54:43', '2023-05-15 09:27:49', ' [ DELETE 2023-05-15 09:27:49 ], [ idUser 43 ] ', 0),
(73, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015444.wc1674576.jpg', 'TARJETA BANCARIA', '2023-05-11 01:54:44', '2023-05-15 09:27:49', ' [ DELETE 2023-05-15 09:27:49 ], [ idUser 43 ] ', 0),
(74, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015935.16505570751332.jpg', 'INE FRENTE', '2023-05-11 01:59:35', '2023-05-15 09:26:58', ' [ DELETE 2023-05-15 09:26:58 ], [ idUser 43 ] ', 0),
(75, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015936.16505570751332.jpg', 'INE FRENTE', '2023-05-11 01:59:36', '2023-05-15 09:26:58', ' [ DELETE 2023-05-15 09:26:58 ], [ idUser 43 ] ', 0),
(76, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015943.16505570751332.jpg', 'INE ATRAS', '2023-05-11 01:59:43', '2023-05-15 09:27:11', ' [ DELETE 2023-05-15 09:27:11 ], [ idUser 43 ] ', 0),
(77, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015951.16505570751332.jpg', 'TARJETA DE CIRCULACION', '2023-05-11 01:59:51', '2023-05-15 09:27:29', ' [ DELETE 2023-05-15 09:27:29 ], [ idUser 43 ] ', 0),
(78, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511015959.wc1674576.jpg', 'TARJETA BANCARIA', '2023-05-11 01:59:59', '2023-05-15 09:27:49', ' [ DELETE 2023-05-15 09:27:49 ], [ idUser 43 ] ', 0),
(79, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511020008.halo-infinite-halo-hd-wallpaper-preview.jpg', 'TARJETA BANCARIA', '2023-05-11 02:00:08', '2023-05-15 09:27:49', ' [ DELETE 2023-05-15 09:27:49 ], [ idUser 43 ] ', 0),
(80, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511020009.halo-infinite-halo-hd-wallpaper-preview.jpg', 'TARJETA BANCARIA', '2023-05-11 02:00:10', '2023-05-15 09:27:49', ' [ DELETE 2023-05-15 09:27:49 ], [ idUser 43 ] ', 0),
(81, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511020410.wallpaper.png', 'COMPREBATE DE DOMICILIO', '2023-05-11 02:04:10', '2023-05-15 09:26:47', ' [ DELETE 2023-05-15 09:26:47 ], [ idUser 43 ] ', 0),
(82, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511020418.17045832.jpg', 'INE FRENTE', '2023-05-11 02:04:18', '2023-05-15 09:26:58', ' [ DELETE 2023-05-15 09:26:58 ], [ idUser 43 ] ', 0),
(83, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511020428.wc1674576.jpg', 'INE ATRAS', '2023-05-11 02:04:28', '2023-05-15 09:27:11', ' [ DELETE 2023-05-15 09:27:11 ], [ idUser 43 ] ', 0),
(84, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511020436.wallpaper.png', 'TARJETA DE CIRCULACION', '2023-05-11 02:04:37', '2023-05-15 09:27:29', ' [ DELETE 2023-05-15 09:27:29 ], [ idUser 43 ] ', 0),
(85, 43, '/d2dVisitador/Perfil/Perfil/api/Documentos/Ricardo3720230511020444.wc1674576.jpg', 'TARJETA BANCARIA', '2023-05-11 02:04:44', '2023-05-15 09:27:49', ' [ DELETE 2023-05-15 09:27:49 ], [ idUser 43 ] ', 0),
(86, 11, '/d2dSocio/Perfil/Perfil/api/Documentos/Mariana220230511031813.16505570751332.jpg', 'COMPREBATE DE DOMICILIO', '2023-05-11 03:18:13', '2023-05-11 03:18:13', ' [ INSERT 2023-05-11 03:18:13 ], [ idUser 2 ] ', 1),
(87, 11, '/d2dSocio/Perfil/Perfil/api/Documentos/Mariana220230511031820.16505570751332.jpg', 'INE FRENTE', '2023-05-11 03:18:20', '2023-05-11 03:18:20', ' [ INSERT 2023-05-11 03:18:20 ], [ idUser 2 ] ', 1),
(88, 11, '/d2dSocio/Perfil/Perfil/api/Documentos/Mariana220230511031826.16505570751332.jpg', 'INE ATRAS', '2023-05-11 03:18:26', '2023-05-11 03:18:26', ' [ INSERT 2023-05-11 03:18:26 ], [ idUser 2 ] ', 1),
(89, 11, '/d2dSocio/Perfil/Perfil/api/Documentos/Mariana220230511031835.wc1674576.jpg', 'TARJETA DE CIRCULACION', '2023-05-11 03:18:36', '2023-05-11 03:18:36', ' [ INSERT 2023-05-11 03:18:36 ], [ idUser 2 ] ', 1),
(90, 48, '/d2dVisitador/Perfil/Perfil/api/Documentos/Vardy4220230515091006.Screenshot_2023-05-14-17-25-13-700.jpg', 'COMPREBATE DE DOMICILIO', '2023-05-15 09:10:06', '2023-05-15 11:30:17', ' [ DELETE 2023-05-15 11:30:17 ], [ idUser 48 ] ', 0),
(91, 48, '/d2dVisitador/Perfil/Perfil/api/Documentos/Vardy4220230515091027.IMG-20230513-WA0001.jpg', 'INE FRENTE', '2023-05-15 09:10:27', '2023-05-15 11:30:24', ' [ DELETE 2023-05-15 11:30:24 ], [ idUser 48 ] ', 0),
(92, 48, '/d2dVisitador/Perfil/Perfil/api/Documentos/Vardy4220230515091041.Screenshot_2023-05-13-19-20-27-719.jpg', 'INE ATRAS', '2023-05-15 09:10:41', '2023-05-15 11:30:31', ' [ DELETE 2023-05-15 11:30:31 ], [ idUser 48 ] ', 0),
(93, 48, '/d2dVisitador/Perfil/Perfil/api/Documentos/Vardy4220230515091058.Screenshot_2023-05-13-19-53-40-387.jpg', 'TARJETA DE CIRCULACION', '2023-05-15 09:10:58', '2023-05-15 11:30:40', ' [ DELETE 2023-05-15 11:30:40 ], [ idUser 48 ] ', 0),
(94, 48, '/d2dVisitador/Perfil/Perfil/api/Documentos/Vardy4220230515091132.IMG-20230513-WA0002.jpg', 'TARJETA BANCARIA', '2023-05-15 09:11:32', '2023-05-15 11:30:59', ' [ DELETE 2023-05-15 11:30:59 ], [ idUser 48 ] ', 0),
(95, 49, '/d2dVisitador/Perfil/Perfil/api/Documentos/Maddison4320230515092647.IMG-20230514-WA0003.jpg', 'COMPREBATE DE DOMICILIO', '2023-05-15 09:26:47', '2023-05-15 09:26:47', ' [ INSERT 2023-05-15 09:26:47 ], [ idUser 43 ] ', 1),
(96, 49, '/d2dVisitador/Perfil/Perfil/api/Documentos/Maddison4320230515092658.IMG-20230514-WA0004.jpg', 'INE FRENTE', '2023-05-15 09:26:58', '2023-05-15 09:26:58', ' [ INSERT 2023-05-15 09:26:58 ], [ idUser 43 ] ', 1),
(97, 49, '/d2dVisitador/Perfil/Perfil/api/Documentos/Maddison4320230515092711.IMG-20230514-WA0001.jpg', 'INE ATRAS', '2023-05-15 09:27:11', '2023-05-15 09:27:11', ' [ INSERT 2023-05-15 09:27:11 ], [ idUser 43 ] ', 1),
(98, 49, '/d2dVisitador/Perfil/Perfil/api/Documentos/Maddison4320230515092729.IMG-20230514-WA0004.jpg', 'TARJETA DE CIRCULACION', '2023-05-15 09:27:29', '2023-05-15 09:27:29', ' [ INSERT 2023-05-15 09:27:29 ], [ idUser 43 ] ', 1),
(99, 49, '/d2dVisitador/Perfil/Perfil/api/Documentos/Maddison4320230515092749.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-15 09:27:49', '2023-05-15 09:27:49', ' [ INSERT 2023-05-15 09:27:49 ], [ idUser 43 ] ', 1),
(100, 50, '/d2dVisitador/Perfil/Perfil/api/Documentos/Almiron 4420230515093319.IMG-20230513-WA0001.jpg', 'COMPREBATE DE DOMICILIO', '2023-05-15 09:33:19', '2023-05-16 09:56:38', ' [ DELETE 2023-05-16 09:56:38 ], [ idUser 50 ] ', 0),
(101, 50, '/d2dVisitador/Perfil/Perfil/api/Documentos/Almiron 4420230515093330.IMG-20230513-WA0001.jpg', 'INE FRENTE', '2023-05-15 09:33:30', '2023-05-16 09:56:54', ' [ DELETE 2023-05-16 09:56:54 ], [ idUser 50 ] ', 0),
(102, 50, '/d2dVisitador/Perfil/Perfil/api/Documentos/Almiron 4420230515093353.IMG-20230513-WA0000.jpg', 'INE ATRAS', '2023-05-15 09:33:53', '2023-05-16 09:57:09', ' [ DELETE 2023-05-16 09:57:09 ], [ idUser 50 ] ', 0),
(103, 50, '/d2dVisitador/Perfil/Perfil/api/Documentos/Almiron 4420230515093409.IMG-20230513-WA0002.jpg', 'TARJETA DE CIRCULACION', '2023-05-15 09:34:09', '2023-05-16 09:57:34', ' [ DELETE 2023-05-16 09:57:34 ], [ idUser 50 ] ', 0),
(104, 50, '/d2dVisitador/Perfil/Perfil/api/Documentos/Almiron 4420230515093425.IMG-20230513-WA0000.jpg', 'TARJETA BANCARIA', '2023-05-15 09:34:25', '2023-05-16 09:57:52', ' [ DELETE 2023-05-16 09:57:52 ], [ idUser 50 ] ', 0),
(105, 54, '/d2dVisitador/Perfil/Perfil/api/Documentos/mikelantonio4820230515113017.IMG-20230515-WA0007.jpg', 'COMPREBATE DE DOMICILIO', '2023-05-15 11:30:17', '2023-05-16 10:13:11', ' [ DELETE 2023-05-16 10:13:11 ], [ idUser 54 ] ', 0),
(106, 54, '/d2dVisitador/Perfil/Perfil/api/Documentos/mikelantonio4820230515113024.IMG-20230515-WA0007.jpg', 'INE FRENTE', '2023-05-15 11:30:24', '2023-05-16 10:13:33', ' [ DELETE 2023-05-16 10:13:33 ], [ idUser 54 ] ', 0),
(107, 54, '/d2dVisitador/Perfil/Perfil/api/Documentos/mikelantonio4820230515113031.IMG-20230515-WA0007.jpg', 'INE ATRAS', '2023-05-15 11:30:31', '2023-05-16 10:14:28', ' [ DELETE 2023-05-16 10:14:28 ], [ idUser 54 ] ', 0),
(108, 54, '/d2dVisitador/Perfil/Perfil/api/Documentos/mikelantonio4820230515113040.IMG-20230515-WA0007.jpg', 'TARJETA DE CIRCULACION', '2023-05-15 11:30:40', '2023-05-16 10:15:04', ' [ DELETE 2023-05-16 10:15:04 ], [ idUser 54 ] ', 0),
(109, 54, '/d2dVisitador/Perfil/Perfil/api/Documentos/mikelantonio4820230515113059.IMG-20230514-WA0004.jpg', 'TARJETA BANCARIA', '2023-05-15 11:30:59', '2023-05-16 10:16:17', ' [ DELETE 2023-05-16 10:16:17 ], [ idUser 54 ] ', 0),
(110, 56, '/d2dVisitador/Perfil/Perfil/api/Documentos/tyson5020230516095638.Screenshot_2023-05-14-17-25-13-700.jpg', 'COMPREBATE DE DOMICILIO', '2023-05-16 09:56:38', '2023-05-16 09:56:38', ' [ INSERT 2023-05-16 09:56:38 ], [ idUser 50 ] ', 1),
(111, 56, '/d2dVisitador/Perfil/Perfil/api/Documentos/tyson5020230516095654.Screenshot_2023-05-14-17-25-13-700.jpg', 'INE FRENTE', '2023-05-16 09:56:54', '2023-05-16 09:56:54', ' [ INSERT 2023-05-16 09:56:54 ], [ idUser 50 ] ', 1),
(112, 56, '/d2dVisitador/Perfil/Perfil/api/Documentos/tyson5020230516095709.Screenshot_2023-05-13-12-56-46-827.jpg', 'INE ATRAS', '2023-05-16 09:57:09', '2023-05-16 09:57:09', ' [ INSERT 2023-05-16 09:57:09 ], [ idUser 50 ] ', 1),
(113, 56, '/d2dVisitador/Perfil/Perfil/api/Documentos/tyson5020230516095734.IMG-20230514-WA0003.jpg', 'TARJETA DE CIRCULACION', '2023-05-16 09:57:34', '2023-05-16 09:57:34', ' [ INSERT 2023-05-16 09:57:34 ], [ idUser 50 ] ', 1),
(114, 56, '/d2dVisitador/Perfil/Perfil/api/Documentos/tyson5020230516095752.IMG-20230514-WA0000.jpg', 'TARJETA BANCARIA', '2023-05-16 09:57:52', '2023-05-16 09:57:52', ' [ INSERT 2023-05-16 09:57:52 ], [ idUser 50 ] ', 1),
(115, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101311.IMG-20230515-WA0007.jpg', 'COMPREBATE DE DOMICILIO', '2023-05-16 10:13:11', '2023-05-16 10:13:11', ' [ INSERT 2023-05-16 10:13:11 ], [ idUser 54 ] ', 1),
(116, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101333.IMG-20230514-WA0004.jpg', 'INE FRENTE', '2023-05-16 10:13:33', '2023-05-16 10:13:33', ' [ INSERT 2023-05-16 10:13:33 ], [ idUser 54 ] ', 1),
(117, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101428.IMG-20230515-WA0007.jpg', 'INE ATRAS', '2023-05-16 10:14:28', '2023-05-16 10:14:28', ' [ INSERT 2023-05-16 10:14:28 ], [ idUser 54 ] ', 1),
(118, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101501.Screenshot_2023-05-14-17-25-13-700.jpg', 'TARJETA DE CIRCULACION', '2023-05-16 10:15:01', '2023-05-16 10:15:01', ' [ INSERT 2023-05-16 10:15:01 ], [ idUser 54 ] ', 1),
(119, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101504.Screenshot_2023-05-14-17-25-13-700.jpg', 'TARJETA DE CIRCULACION', '2023-05-16 10:15:04', '2023-05-16 10:15:04', ' [ INSERT 2023-05-16 10:15:04 ], [ idUser 54 ] ', 1),
(120, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101527.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:15:27', '2023-05-16 10:15:27', ' [ INSERT 2023-05-16 10:15:27 ], [ idUser 54 ] ', 1),
(121, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101531.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:15:31', '2023-05-16 10:15:31', ' [ INSERT 2023-05-16 10:15:31 ], [ idUser 54 ] ', 1),
(122, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101535.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:15:35', '2023-05-16 10:15:35', ' [ INSERT 2023-05-16 10:15:35 ], [ idUser 54 ] ', 1),
(123, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101540.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:15:40', '2023-05-16 10:15:40', ' [ INSERT 2023-05-16 10:15:40 ], [ idUser 54 ] ', 1),
(124, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101544.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:15:44', '2023-05-16 10:15:44', ' [ INSERT 2023-05-16 10:15:44 ], [ idUser 54 ] ', 1),
(125, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101547.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:15:47', '2023-05-16 10:15:47', ' [ INSERT 2023-05-16 10:15:47 ], [ idUser 54 ] ', 1),
(126, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101552.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:15:52', '2023-05-16 10:15:52', ' [ INSERT 2023-05-16 10:15:52 ], [ idUser 54 ] ', 1),
(127, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101556.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:15:56', '2023-05-16 10:15:56', ' [ INSERT 2023-05-16 10:15:56 ], [ idUser 54 ] ', 1),
(128, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101559.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:15:59', '2023-05-16 10:15:59', ' [ INSERT 2023-05-16 10:15:59 ], [ idUser 54 ] ', 1),
(129, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101603.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:16:03', '2023-05-16 10:16:03', ' [ INSERT 2023-05-16 10:16:03 ], [ idUser 54 ] ', 1),
(130, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101607.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:16:07', '2023-05-16 10:16:07', ' [ INSERT 2023-05-16 10:16:07 ], [ idUser 54 ] ', 1),
(131, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101610.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:16:10', '2023-05-16 10:16:10', ' [ INSERT 2023-05-16 10:16:10 ], [ idUser 54 ] ', 1),
(132, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101613.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:16:13', '2023-05-16 10:16:13', ' [ INSERT 2023-05-16 10:16:13 ], [ idUser 54 ] ', 1),
(133, 60, '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101617.Screenshot_2023-05-13-12-56-46-827.jpg', 'TARJETA BANCARIA', '2023-05-16 10:16:17', '2023-05-16 10:16:17', ' [ INSERT 2023-05-16 10:16:17 ], [ idUser 54 ] ', 1),
(134, 64, '/d2dVisitador/Perfil/Perfil/api/Documentos/kobebryant5820230607065904.IMG-20230605-WA0014.jpg', 'COMPREBATE DE DOMICILIO', '2023-06-07 06:59:04', '2023-06-07 06:59:04', ' [ INSERT 2023-06-07 06:59:04 ], [ idUser 58 ] ', 1),
(135, 64, '/d2dVisitador/Perfil/Perfil/api/Documentos/kobebryant5820230607065922.IMG-20230605-WA0014.jpg', 'INE FRENTE', '2023-06-07 06:59:22', '2023-06-07 06:59:22', ' [ INSERT 2023-06-07 06:59:22 ], [ idUser 58 ] ', 1),
(136, 64, '/d2dVisitador/Perfil/Perfil/api/Documentos/kobebryant5820230607065931.IMG-20230606-WA0006.jpg', 'INE ATRAS', '2023-06-07 06:59:31', '2023-06-07 06:59:31', ' [ INSERT 2023-06-07 06:59:31 ], [ idUser 58 ] ', 1),
(137, 64, '/d2dVisitador/Perfil/Perfil/api/Documentos/kobebryant5820230607065943.images.jpeg', 'TARJETA DE CIRCULACION', '2023-06-07 06:59:43', '2023-06-07 06:59:43', ' [ INSERT 2023-06-07 06:59:43 ], [ idUser 58 ] ', 1),
(138, 64, '/d2dVisitador/Perfil/Perfil/api/Documentos/kobebryant5820230607070004.IMG-20230606-WA0006.jpg', 'TARJETA BANCARIA', '2023-06-07 07:00:04', '2023-06-07 07:00:04', ' [ INSERT 2023-06-07 07:00:04 ], [ idUser 58 ] ', 1),
(139, 65, '/d2dVisitador/Perfil/Perfil/api/Documentos/lebronjames5920230607094840.IMG-20230607-WA0002.jpg', 'COMPREBATE DE DOMICILIO', '2023-06-07 09:48:40', '2023-06-07 09:48:40', ' [ INSERT 2023-06-07 09:48:40 ], [ idUser 59 ] ', 1),
(140, 65, '/d2dVisitador/Perfil/Perfil/api/Documentos/lebronjames5920230607094850.IMG-20230607-WA0002.jpg', 'INE FRENTE', '2023-06-07 09:48:50', '2023-06-07 09:48:50', ' [ INSERT 2023-06-07 09:48:50 ], [ idUser 59 ] ', 1),
(141, 65, '/d2dVisitador/Perfil/Perfil/api/Documentos/lebronjames5920230607094859.IMG-20230607-WA0002.jpg', 'INE ATRAS', '2023-06-07 09:48:59', '2023-06-07 09:48:59', ' [ INSERT 2023-06-07 09:48:59 ], [ idUser 59 ] ', 1),
(142, 65, '/d2dVisitador/Perfil/Perfil/api/Documentos/lebronjames5920230607094914.IMG-20230607-WA0002.jpg', 'TARJETA DE CIRCULACION', '2023-06-07 09:49:14', '2023-06-07 09:49:14', ' [ INSERT 2023-06-07 09:49:14 ], [ idUser 59 ] ', 1),
(143, 65, '/d2dVisitador/Perfil/Perfil/api/Documentos/lebronjames5920230607094932.IMG-20230607-WA0002.jpg', 'TARJETA BANCARIA', '2023-06-07 09:49:32', '2023-06-07 09:49:32', ' [ INSERT 2023-06-07 09:49:32 ], [ idUser 59 ] ', 1),
(144, 89, '/d2dSocio/Perfil/Perfil/api/Documentos/MarianaMariana8320230712103437.IMG-20230712-WA0006.jpg', 'COMPREBATE DE DOMICILIO', '2023-07-12 10:34:37', '2023-07-12 10:34:37', ' [ INSERT 2023-07-12 10:34:37 ], [ idUser 83 ] ', 1),
(145, 89, '/d2dSocio/Perfil/Perfil/api/Documentos/MarianaMariana8320230712103446.IMG-20230712-WA0006.jpg', 'INE FRENTE', '2023-07-12 10:34:46', '2023-07-12 10:34:46', ' [ INSERT 2023-07-12 10:34:46 ], [ idUser 83 ] ', 1),
(146, 89, '/d2dSocio/Perfil/Perfil/api/Documentos/MarianaMariana8320230712103455.IMG-20230712-WA0006.jpg', 'INE ATRAS', '2023-07-12 10:34:55', '2023-07-12 10:34:55', ' [ INSERT 2023-07-12 10:34:55 ], [ idUser 83 ] ', 1),
(147, 90, '/d2dSocio/Perfil/Perfil/api/Documentos/Mariana218420230712105622.IMG-20230712-WA0006.jpg', 'COMPREBATE DE DOMICILIO', '2023-07-12 10:56:22', '2023-07-12 10:56:22', ' [ INSERT 2023-07-12 10:56:22 ], [ idUser 84 ] ', 1),
(148, 90, '/d2dSocio/Perfil/Perfil/api/Documentos/Mariana218420230712105631.IMG-20230712-WA0006.jpg', 'INE FRENTE', '2023-07-12 10:56:31', '2023-07-12 10:56:31', ' [ INSERT 2023-07-12 10:56:31 ], [ idUser 84 ] ', 1),
(149, 90, '/d2dSocio/Perfil/Perfil/api/Documentos/Mariana218420230712105646.IMG-20230712-WA0006.jpg', 'INE ATRAS', '2023-07-12 10:56:46', '2023-07-12 10:56:46', ' [ INSERT 2023-07-12 10:56:46 ], [ idUser 84 ] ', 1),
(150, 109, '/d2dVisitador/Perfil/Perfil/api/Documentos/michaelvick10320230712124309.Screenshot_2023-07-11-16-31-00-033.jpg', 'COMPREBATE DE DOMICILIO', '2023-07-12 12:43:09', '2023-07-12 12:43:09', ' [ INSERT 2023-07-12 12:43:09 ], [ idUser 103 ] ', 1),
(151, 109, '/d2dVisitador/Perfil/Perfil/api/Documentos/michaelvick10320230712124321.FB_IMG_1688956018846.jpg', 'INE FRENTE', '2023-07-12 12:43:21', '2023-07-12 12:43:21', ' [ INSERT 2023-07-12 12:43:21 ], [ idUser 103 ] ', 1),
(152, 109, '/d2dVisitador/Perfil/Perfil/api/Documentos/michaelvick10320230712124332.IMG_20230709_101206.jpg', 'INE ATRAS', '2023-07-12 12:43:32', '2023-07-12 12:43:32', ' [ INSERT 2023-07-12 12:43:32 ], [ idUser 103 ] ', 1),
(153, 109, '/d2dVisitador/Perfil/Perfil/api/Documentos/michaelvick10320230712124346.FB_IMG_1688956032992.jpg', 'TARJETA DE CIRCULACION', '2023-07-12 12:43:46', '2023-07-12 12:43:46', ' [ INSERT 2023-07-12 12:43:46 ], [ idUser 103 ] ', 1),
(154, 109, '/d2dVisitador/Perfil/Perfil/api/Documentos/michaelvick10320230712124407.IMG_20230709_101206.jpg', 'TARJETA BANCARIA', '2023-07-12 12:44:07', '2023-07-12 12:44:07', ' [ INSERT 2023-07-12 12:44:07 ], [ idUser 103 ] ', 1),
(155, 110, '/d2dSocio/Perfil/Perfil/api/Documentos/kylemurray10520230713073100.Screenshot_2023-07-12-21-04-53-962.jpg', 'INE FRENTE', '2023-07-13 07:31:00', '2023-07-13 07:31:00', ' [ INSERT 2023-07-13 07:31:00 ], [ idUser 105 ] ', 1),
(156, 110, '/d2dSocio/Perfil/Perfil/api/Documentos/kylemurray10520230713073112.Screenshot_2023-07-12-21-04-53-962.jpg', 'INE ATRAS', '2023-07-13 07:31:12', '2023-07-13 07:31:12', ' [ INSERT 2023-07-13 07:31:12 ], [ idUser 105 ] ', 1),
(157, 110, '/d2dSocio/Perfil/Perfil/api/Documentos/kylemurray10520230713103054.314413304_233049779081065_5994367404084881320_n.jpg', 'COMPREBATE DE DOMICILIO', '2023-07-13 10:30:54', '2023-07-13 10:30:54', ' [ INSERT 2023-07-13 10:30:54 ], [ idUser 105 ] ', 1),
(158, 112, '/d2dSocio/Perfil/Perfil/api/Documentos/BaboCartel10720230713103647.Screenshot_2023-07-12-08-17-50-54_e307a3f9df9f380ebaf106e1dc980bb6.jpg', 'COMPREBATE DE DOMICILIO', '2023-07-13 10:36:47', '2023-07-13 10:36:47', ' [ INSERT 2023-07-13 10:36:47 ], [ idUser 107 ] ', 1),
(159, 112, '/d2dSocio/Perfil/Perfil/api/Documentos/BaboCartel10720230713103705.IMG-20230709-WA0078.jpg', 'INE FRENTE', '2023-07-13 10:37:05', '2023-07-13 10:37:05', ' [ INSERT 2023-07-13 10:37:05 ], [ idUser 107 ] ', 1),
(160, 112, '/d2dSocio/Perfil/Perfil/api/Documentos/BaboCartel10720230713103715.IMG-20230712-WA0006.jpg', 'INE ATRAS', '2023-07-13 10:37:15', '2023-07-13 10:37:15', ' [ INSERT 2023-07-13 10:37:15 ], [ idUser 107 ] ', 1),
(161, 113, '/d2dVisitador/Perfil/Perfil/api/Documentos/jordanlove10820230714022615.Screenshot_2023-07-14-13-16-27-987.jpg', 'TARJETA BANCARIA', '2023-07-14 02:26:15', '2023-07-14 02:26:15', ' [ INSERT 2023-07-14 02:26:15 ], [ idUser 108 ] ', 1),
(162, 120, '/d2dSocio/Perfil/Perfil/api/Documentos/Carlosandres4711520230717110638.IMG-20230703-WA0007.jpg', 'COMPREBATE DE DOMICILIO', '2023-07-17 11:06:38', '2023-07-17 11:06:38', ' [ INSERT 2023-07-17 11:06:38 ], [ idUser 115 ] ', 1),
(163, 120, '/d2dSocio/Perfil/Perfil/api/Documentos/Carlosandres4711520230717110648.IMG-20230703-WA0007.jpg', 'INE FRENTE', '2023-07-17 11:06:48', '2023-07-17 11:06:48', ' [ INSERT 2023-07-17 11:06:48 ], [ idUser 115 ] ', 1),
(164, 120, '/d2dSocio/Perfil/Perfil/api/Documentos/Carlosandres4711520230717110706.IMG-20230703-WA0007.jpg', 'INE ATRAS', '2023-07-17 11:07:06', '2023-07-17 11:07:06', ' [ INSERT 2023-07-17 11:07:06 ], [ idUser 115 ] ', 1),
(165, 121, '/d2dSocio/Perfil/Perfil/api/Documentos/Gerardo Cardoso11620230718112012.IMG_1689701698286.jpg', 'COMPREBATE DE DOMICILIO', '2023-07-18 11:20:12', '2023-07-18 11:20:12', ' [ INSERT 2023-07-18 11:20:12 ], [ idUser 116 ] ', 1),
(166, 121, '/d2dSocio/Perfil/Perfil/api/Documentos/Gerardo Cardoso11620230718112013.IMG_1689701698286.jpg', 'COMPREBATE DE DOMICILIO', '2023-07-18 11:20:13', '2023-07-18 11:20:13', ' [ INSERT 2023-07-18 11:20:13 ], [ idUser 116 ] ', 1),
(167, 121, '/d2dSocio/Perfil/Perfil/api/Documentos/Gerardo Cardoso11620230718112015.IMG_1689701698286.jpg', 'COMPREBATE DE DOMICILIO', '2023-07-18 11:20:15', '2023-07-18 11:20:15', ' [ INSERT 2023-07-18 11:20:15 ], [ idUser 116 ] ', 1),
(168, 121, '/d2dSocio/Perfil/Perfil/api/Documentos/Gerardo Cardoso11620230718112017.IMG_1689701698286.jpg', 'COMPREBATE DE DOMICILIO', '2023-07-18 11:20:17', '2023-07-18 11:20:17', ' [ INSERT 2023-07-18 11:20:17 ], [ idUser 116 ] ', 1),
(169, 121, '/d2dSocio/Perfil/Perfil/api/Documentos/Gerardo Cardoso11620230718112649.IMG_1689702143137.jpg', 'INE FRENTE', '2023-07-18 11:26:49', '2023-07-18 11:26:49', ' [ INSERT 2023-07-18 11:26:49 ], [ idUser 116 ] ', 1),
(170, 121, '/d2dSocio/Perfil/Perfil/api/Documentos/Gerardo Cardoso11620230718112650.IMG_1689702143137.jpg', 'INE FRENTE', '2023-07-18 11:26:50', '2023-07-18 11:26:50', ' [ INSERT 2023-07-18 11:26:50 ], [ idUser 116 ] ', 1),
(171, 121, '/d2dSocio/Perfil/Perfil/api/Documentos/Gerardo Cardoso11620230718112724.IMG_1689702175645.jpg', 'INE ATRAS', '2023-07-18 11:27:24', '2023-07-18 11:27:24', ' [ INSERT 2023-07-18 11:27:24 ], [ idUser 116 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campana`
--

CREATE TABLE `campana` (
  `idCampana` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `folio` int(11) NOT NULL,
  `fecha` varchar(60) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(60) CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1,
  `tipoCampana` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `instrucciones` text,
  `fechaCierre` date DEFAULT NULL,
  `fechaCancelacion` date DEFAULT NULL,
  `descripcionRecoleccion` text CHARACTER SET latin1,
  `estatus` text CHARACTER SET latin1,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text CHARACTER SET latin1 NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `campana`
--

INSERT INTO `campana` (`idCampana`, `idUsuario`, `folio`, `fecha`, `nombre`, `descripcion`, `tipoCampana`, `instrucciones`, `fechaCierre`, `fechaCancelacion`, `descripcionRecoleccion`, `estatus`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 11, 3, '2023-02-23 01:25:29', 'Campaña # 2', '', 'VISITA', NULL, NULL, NULL, 'Campaña # 2', 'PAUSADA', '2023-02-23 01:25:29', '2023-06-06 04:55:28', ' [ UPFATE 2023-06-06 04:55:28 ], [ idUser 1 ] ', 1),
(9, 11, 2, '2023-02-23 01:20:51', 'asd', 'asd', 'RECOLECCIÓN', NULL, NULL, NULL, '', 'BORRADOR', '2023-02-23 01:20:51', '2023-02-23 01:25:35', ' [ DELETE 2023-02-23 01:25:35 ], [ idUser 1 ] ', 0),
(11, 11, 4, '2023-02-23 01:25:50', 'Campaña # 3', 'Campaña # 3', 'RECOLECCIÓN', NULL, NULL, NULL, 'Campaña # 3', 'PAUSADA', '2023-02-23 01:25:50', '2023-06-06 04:55:32', ' [ UPFATE 2023-06-06 04:55:32 ], [ idUser 1 ] ', 1),
(12, 11, 5, '2023-02-23 01:26:05', 'Campaña # 4', 'Campaña # 4', 'VISITA', NULL, NULL, NULL, 'Campaña # 4', 'PAUSADA', '2023-02-23 01:26:05', '2023-06-06 04:55:35', ' [ UPFATE 2023-06-06 04:55:35 ], [ idUser 1 ] ', 1),
(13, 11, 6, '2023-02-23 01:26:17', 'Campaña # 5', 'Campaña # 5', 'VISITA', NULL, NULL, NULL, 'Campaña # 5', 'CERRADA', '2023-02-23 01:26:17', '2023-02-23 01:26:17', ' [ INSERT 2023-02-23 01:26:17 ], [ idUser 1 ] ', 1),
(14, 11, 7, '2023-02-23 01:26:31', 'Campaña # 6', 'Campaña # 6', 'COBRANZA', NULL, '2023-07-12', NULL, 'Campaña # 6', 'CERRADA', '2023-02-23 01:26:31', '2023-07-12 02:02:02', ' [ UPFATE 2023-07-12 02:02:02 ], [ idUser 1 ] ', 1),
(15, 11, 8, '2023-02-23 01:26:58', 'Campaña # 7', 'Campaña # 7', 'VISITA', NULL, NULL, NULL, 'Campaña # 7', 'CERRADA', '2023-02-23 01:26:58', '2023-02-23 01:26:58', ' [ INSERT 2023-02-23 01:26:58 ], [ idUser 1 ] ', 1),
(16, 11, 9, '2023-02-23 01:27:20', 'Campaña # 8', 'Campaña # 8', 'VISITA', NULL, NULL, NULL, 'Campaña # 8', 'CERRADA', '2023-02-23 01:27:20', '2023-02-23 01:27:20', ' [ INSERT 2023-02-23 01:27:20 ], [ idUser 1 ] ', 1),
(17, 11, 10, '2023-02-23 01:27:51', 'Campaña # 9', 'Campaña # 9', 'VISITA', NULL, '2023-07-03', NULL, 'Campaña # 9', 'CERRADA', '2023-02-23 01:27:51', '2023-07-03 10:07:13', ' [ UPFATE 2023-07-03 10:07:13 ], [ idUser 1 ] ', 1),
(18, 11, 11, '2023-02-23 01:28:08', 'Campaña # 11', 'Campaña # 11', 'VISITA', NULL, NULL, NULL, 'Campaña # 11', 'PAUSADA', '2023-02-23 01:28:08', '2023-04-11 02:36:17', ' [ DELETE 2023-04-11 02:36:17 ], [ idUser 1 ] ', 0),
(19, 11, 12, '2023-02-23 01:28:23', 'Campaña # 12', 'Campaña # 12', 'COBRANZA', NULL, NULL, NULL, 'Campaña # 12', 'PAUSADA', '2023-02-23 01:28:23', '2023-04-11 02:36:11', ' [ DELETE 2023-04-11 02:36:11 ], [ idUser 1 ] ', 0),
(20, 11, 13, '2023-02-23 01:28:39', 'Campaña # 13', 'Campaña # 13', 'COBRANZA', NULL, NULL, NULL, 'Campaña # 13', 'PAUSADA', '2023-02-23 01:28:39', '2023-02-23 06:55:12', ' [ DELETE 2023-02-23 06:55:12 ], [ idUser 1 ] ', 0),
(21, 11, 14, '2023-04-11 02:41:08', 'Dops', 'Dops', 'VISITA', NULL, NULL, NULL, 'Dops', 'PAUSADA', '2023-04-11 02:41:08', '2023-07-18 07:48:01', ' [ UPFATE 2023-07-18 07:48:01 ], [ idUser 1 ] ', 1),
(22, 11, 15, '2023-04-11 04:06:17', 'CrearCrear', 'CrearCrearCrear', 'VISITA', NULL, NULL, NULL, 'CrearCrearCrear', 'BORRADOR', '2023-04-11 04:06:17', '2023-04-13 10:26:18', ' [ DELETE 2023-04-13 10:26:18 ], [ idUser 1 ] ', 0),
(23, 11, 16, '2023-04-12 02:36:15', 'CarlosAndres12', 'CarlosAndres1', 'COBRANZA', NULL, NULL, NULL, 'CarlosAndres1', 'PAUSADA', '2023-04-12 02:36:15', '2023-04-14 01:48:50', ' [ UPFATE 2023-04-14 01:48:50 ], [ idUser 1 ] ', 1),
(24, 11, 17, '2023-04-12 03:10:27', 'CELTA', 'CETLA', 'VISITA', NULL, NULL, NULL, 'CELTA CELTA CELTA', 'BORRADOR', '2023-04-12 03:10:27', '2023-04-12 09:36:30', ' [ DELETE 2023-04-12 09:36:30 ], [ idUser 1 ] ', 0),
(25, 11, 18, '2023-04-12 09:32:44', 'CAMPAÑA PRUEBA  # 1  DANIEL ', 'CAMPAÑA PRUEBA  # DANIEL ', 'COBRANZA', NULL, NULL, NULL, 'CAMPAÑA PRUEBA  # DANIEL ', 'PAUSADA', '2023-04-12 09:32:44', '2023-04-14 01:48:32', ' [ UPFATE 2023-04-14 01:48:32 ], [ idUser 1 ] ', 1),
(26, 1, 19, '2023-04-13 10:25:19', 'Campana A', 'DESCRIPCION GENERICA', 'RECOLECCIÓN', NULL, NULL, NULL, 'DESCRIPCION GENERICA', 'PAUSADA', '2023-04-13 10:25:19', '2023-07-18 07:48:06', ' [ UPFATE 2023-07-18 07:48:06 ], [ idUser 1 ] ', 1),
(27, 1, 20, '2023-04-17 01:50:30', 'Fulanitos', 'Fulanitos', 'VISITA', NULL, NULL, NULL, 'Fulanitos', 'PAUSADA', '2023-04-17 01:50:30', '2023-06-06 04:55:57', ' [ UPFATE 2023-06-06 04:55:57 ], [ idUser 1 ] ', 1),
(28, 2, 21, '2023-04-28 04:17:44', 'Campña wer', 'Campña wer', 'VISITA', NULL, '2023-06-29', NULL, 'Campña wer', 'CERRADA', '2023-04-28 04:17:44', '2023-06-29 01:09:29', ' [ UPFATE 2023-06-29 01:09:29 ], [ idUser 2 ] ', 1),
(29, 2, 22, '2023-05-04 08:35:08', 'CAMPANA TEST', 'TEST GENERICO', 'RECOLECCIÓN', NULL, NULL, NULL, 'TEST GENERICO', 'PAUSADA', '2023-05-04 08:35:08', '2023-07-05 10:16:13', ' [ UPFATE 2023-07-05 10:16:13 ], [ idUser 2 ] ', 1),
(30, 2, 23, '2023-05-04 08:42:52', 'Campana test Mobile ', 'Just test', 'COBRANZA', NULL, '2023-06-06', NULL, 'Genric Description ', 'CERRADA', '2023-05-04 08:42:52', '2023-06-06 12:38:02', ' [ UPFATE 2023-06-06 12:38:02 ], [ idUser 2 ] ', 1),
(31, 2, 24, '2023-06-06 12:39:14', 'Campaña Delta', 'Delta', 'RECOLECCIÓN', NULL, NULL, '2023-06-06', 'Delta', 'CANCELADA', '2023-06-06 12:39:14', '2023-06-06 01:00:57', ' [ UPFATE 2023-06-06 01:00:57 ], [ idUser 2 ] ', 1),
(32, 2, 25, '2023-06-06 01:01:19', 'Nueva Campaña', 'Nueva Campaña', 'VISITA', NULL, NULL, NULL, 'Nueva Campaña', 'PAUSADA', '2023-06-06 01:01:19', '2023-07-18 07:46:23', ' [ UPFATE 2023-07-18 07:46:23 ], [ idUser 2 ] ', 1),
(33, 2, 26, '2023-06-06 04:41:15', 'Campana Test #1 ', 'Campana Test #1 ', 'VISITA', NULL, '2023-07-18', NULL, 'Campana Test #1 ', 'CERRADA', '2023-06-06 04:41:15', '2023-07-18 07:46:19', ' [ UPFATE 2023-07-18 07:46:19 ], [ idUser 2 ] ', 1),
(34, 2, 27, '2023-06-06 08:32:10', 'Campaña 2', 'Campaña 2', 'VISITA', NULL, NULL, '2023-06-29', 'Campaña 2', 'CANCELADA', '2023-06-06 08:32:10', '2023-06-29 01:16:12', ' [ UPFATE 2023-06-29 01:16:12 ], [ idUser 2 ] ', 1),
(35, 2, 28, '2023-06-06 08:51:20', 'Test # 4', 'Test # 4', 'VISITA', NULL, NULL, '2023-06-06', 'Test # 4', 'CANCELADA', '2023-06-06 08:51:20', '2023-06-06 08:51:24', ' [ UPFATE 2023-06-06 08:51:24 ], [ idUser 2 ] ', 1),
(36, 2, 29, '2023-06-07 06:14:57', 'Campana # 12', 'Campana # 12', 'VISITA', NULL, NULL, NULL, 'Campana # 12', 'PAUSADA', '2023-06-07 06:14:57', '2023-07-18 07:46:16', ' [ UPFATE 2023-07-18 07:46:16 ], [ idUser 2 ] ', 1),
(37, 1, 30, '2023-06-07 12:44:30', 'Delta 123', 'Delta 123', 'VISITA', NULL, NULL, NULL, 'Delta 123', 'PAUSADA', '2023-06-07 12:44:30', '2023-07-18 07:48:09', ' [ UPFATE 2023-07-18 07:48:09 ], [ idUser 1 ] ', 1),
(38, 11, 31, '2023-06-07 01:03:01', 'Omega', 'Omega', 'COBRANZA', NULL, NULL, NULL, 'Omega', 'BORRADOR', '2023-06-07 01:03:01', '2023-06-07 01:03:01', ' [ INSERT 2023-06-07 01:03:01 ], [ idUser 11 ] ', 1),
(39, 2, 32, '2023-06-07 07:10:20', 'MasterChif 117', 'MasterChif 117', 'VISITA', NULL, NULL, NULL, 'MasterChif 117', 'PAUSADA', '2023-06-07 07:10:20', '2023-07-18 07:46:13', ' [ UPFATE 2023-07-18 07:46:13 ], [ idUser 2 ] ', 1),
(40, 2, 33, '2023-06-07 10:41:26', 'Campaña Prueba # 1', 'Campaña Prueba # 1', 'VISITA', NULL, NULL, NULL, 'Campaña Prueba # 1', 'PAUSADA', '2023-06-07 10:41:26', '2023-07-18 07:46:10', ' [ UPFATE 2023-07-18 07:46:10 ], [ idUser 2 ] ', 1),
(41, 2, 34, '2023-06-19 05:20:33', 'Nueva campana', 'campana', 'VISITA', NULL, NULL, '2023-06-19', 'campana', 'CANCELADA', '2023-06-19 05:20:33', '2023-06-19 05:23:28', ' [ UPFATE 2023-06-19 05:23:28 ], [ idUser 2 ] ', 1),
(42, 2, 35, '2023-06-26 11:56:49', 'CAMPANA ANDERLECHT', 'A RECOLECTAR TODO', 'RECOLECCIÓN', NULL, NULL, NULL, 'Recoleccion', 'PAUSADA', '2023-06-26 11:56:49', '2023-07-18 07:46:06', ' [ UPFATE 2023-07-18 07:46:06 ], [ idUser 2 ] ', 1),
(43, 2, 36, '2023-07-05 01:02:26', 'Campaña muestra ', 'Campaña muestra ', 'RECOLECCIÓN', NULL, NULL, NULL, 'Campaña muestra ', 'BORRADOR', '2023-07-05 01:02:26', '2023-07-05 01:02:26', ' [ INSERT 2023-07-05 01:02:26 ], [ idUser 2 ] ', 1),
(44, 2, 37, '2023-07-12 12:51:57', 'Recolctar sky', '', 'RECOLECCIÓN', NULL, NULL, NULL, 'Recolecta mis antenas sky', 'ABIERTA', '2023-07-12 12:51:57', '2023-07-26 06:23:09', ' [ UPFATE 2023-07-26 06:23:09 ], [ idUser 2 ] ', 1),
(45, 2, 38, '2023-07-18 07:49:12', 'nuevaCapañaPrueba3', 'nuevaCapañaPrueba3', 'VISITA', NULL, NULL, NULL, 'nuevaCapañaPrueba3', 'ABIERTA', '2023-07-18 07:49:12', '2023-07-26 06:16:58', ' [ UPFATE 2023-07-26 06:16:58 ], [ idUser 2 ] ', 1),
(46, 2, 39, '2023-07-18 11:53:52', 'CarlosAndresss', 'CarlosAndresss', 'VISITA', NULL, NULL, NULL, 'CarlosAndresss', 'BORRADOR', '2023-07-18 11:53:52', '2023-07-18 11:53:52', ' [ INSERT 2023-07-18 11:53:52 ], [ idUser 2 ] ', 1),
(47, 116, 40, '2023-07-26 09:36:27', 'styar tv', 'vp', 'VISITA', NULL, NULL, NULL, 'vp', 'BORRADOR', '2023-07-26 09:36:27', '2023-07-26 09:36:27', ' [ INSERT 2023-07-26 09:36:27 ], [ idUser 116 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coneptoCobro`
--

CREATE TABLE `coneptoCobro` (
  `idCCobro` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coneptoCobro`
--

INSERT INTO `coneptoCobro` (`idCCobro`, `nombre`, `descripcion`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'ConceptsPayment ', '', '2023-02-08 07:38:31', '2023-02-08 07:39:24', ' [ DELETE 2023-02-08 07:39:24 ], [ idUser 1 ] ', 0),
(2, 'ConceptsPayment', 'ConceptsPayment', '2023-02-08 07:39:29', '2023-02-08 07:41:51', ' [ DELETE 2023-02-08 07:41:51 ], [ idUser 1 ] ', 0),
(3, 'descripciondescripcion', 'descripciondescripciondescripciondescripciondescripcion', '2023-02-08 07:41:07', '2023-02-08 07:43:29', ' [ DELETE 2023-02-08 07:43:29 ], [ idUser 1 ] ', 0),
(4, 'idTVehiculo', 'idTVehiculo', '2023-02-08 07:50:43', '2023-02-08 07:53:00', ' [ DELETE 2023-02-08 07:53:00 ], [ idUser 1 ] ', 0),
(5, 'Deuda', 'Descripcion Generica', '2023-02-09 04:12:12', '2023-04-12 07:24:16', ' [ UPFATE 2023-04-12 07:24:16 ], [ idUser 1 ] ', 1),
(6, 'Pago fijo', '', '2023-02-09 04:12:27', '2023-02-09 04:12:27', ' [ INSERT 2023-02-09 04:12:27 ], [ idUser  ] ', 1),
(7, 'Mes sin interes', '', '2023-02-09 04:12:42', '2023-04-12 07:23:53', ' [ DELETE 2023-04-12 07:23:53 ], [ idUser 1 ] ', 0),
(8, 'Interes', '', '2023-02-09 04:12:50', '2023-02-09 04:12:50', ' [ INSERT 2023-02-09 04:12:50 ], [ idUser  ] ', 1),
(9, 'Concepto A MODIFICADP', 'DESCRIPCION GENERICA MODIFICADA', '2023-04-13 09:40:38', '2023-04-13 09:40:56', ' [ DELETE 2023-04-13 09:40:56 ], [ idUser 1 ] ', 0),
(10, 'Pago Concepto 4', '', '2023-07-12 01:52:04', '2023-07-12 01:52:04', ' [ INSERT 2023-07-12 01:52:04 ], [ idUser 1 ] ', 1),
(11, 'Pago Concepto 5', 'Pagos Conceptuales', '2023-07-12 01:52:24', '2023-07-12 01:52:24', ' [ INSERT 2023-07-12 01:52:24 ], [ idUser 1 ] ', 1),
(12, 'Pago Concepto 7', '', '2023-07-12 01:52:35', '2023-07-12 01:52:35', ' [ INSERT 2023-07-12 01:52:35 ], [ idUser 1 ] ', 1),
(13, 'Pago Concepto 8', '', '2023-07-12 01:52:44', '2023-07-12 01:52:44', ' [ INSERT 2023-07-12 01:52:44 ], [ idUser 1 ] ', 1),
(14, 'Pago Concepto 9', '', '2023-07-12 01:52:54', '2023-07-12 01:52:54', ' [ INSERT 2023-07-12 01:52:54 ], [ idUser 1 ] ', 1),
(15, 'Pago Concepto 10', 'Pago concepto 10', '2023-07-12 01:53:10', '2023-07-12 01:53:10', ' [ INSERT 2023-07-12 01:53:10 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coneptoComicion`
--

CREATE TABLE `coneptoComicion` (
  `idCComicion` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `idZona` int(11) NOT NULL,
  `comision` decimal(18,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coneptoComicion`
--

INSERT INTO `coneptoComicion` (`idCComicion`, `nombre`, `tipo`, `idZona`, `comision`, `cantidad`, `descripcion`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'Adam', 'VISITA', 2, '21.00', 1, '', '2023-02-08 07:23:56', '2023-05-31 02:08:55', ' [ UPFATE 2023-05-31 02:08:55 ], [ idUser 1 ] ', 1),
(2, 'Visita', 'COBRANZA', 2, '10.00', 1, '', '2023-02-09 04:13:15', '2023-05-31 02:08:48', ' [ UPFATE 2023-05-31 02:08:48 ], [ idUser 1 ] ', 1),
(3, 'CarlosAndres', 'RECOLECCIÓN', 2, '11.00', 1, 'CarlosAndres', '2023-03-31 04:57:04', '2023-05-31 02:08:28', ' [ DELETE 2023-05-31 02:08:28 ], [ idUser 1 ] ', 0),
(4, 'Nueva comicion', 'RECOLECCIÓN', 2, '10.00', 1, 'Nueva comicion', '2023-03-31 09:37:14', '2023-05-31 02:08:25', ' [ DELETE 2023-05-31 02:08:25 ], [ idUser 1 ] ', 0),
(5, 'Comision A', 'RECOLECCIÓN', 2, '10.00', 1, 'Descripcion Gnerica', '2023-04-13 09:41:44', '2023-05-31 02:08:41', ' [ UPFATE 2023-05-31 02:08:41 ], [ idUser 1 ] ', 1),
(6, 'VISA 1', 'VALIDACION', 3, '21.00', 21, '', '2023-07-12 01:53:39', '2023-07-12 01:53:39', ' [ INSERT 2023-07-12 01:53:39 ], [ idUser 1 ] ', 1),
(7, 'VIDA4', 'VALIDACION', 3, '21.00', 21, '', '2023-07-12 01:54:33', '2023-07-12 01:54:33', ' [ INSERT 2023-07-12 01:54:33 ], [ idUser 1 ] ', 1),
(8, 'VISADO', 'VALIDACION', 3, '21.00', 21, '', '2023-07-12 01:54:41', '2023-07-12 01:54:41', ' [ INSERT 2023-07-12 01:54:41 ], [ idUser 1 ] ', 1),
(9, 'VISADO4', 'VALIDACION', 3, '21.00', 21, '', '2023-07-12 01:54:49', '2023-07-12 01:54:49', ' [ INSERT 2023-07-12 01:54:49 ], [ idUser 1 ] ', 1),
(10, 'VISADO8', 'VALIDACION', 3, '21.00', 21, '', '2023-07-12 01:54:57', '2023-07-12 01:54:57', ' [ INSERT 2023-07-12 01:54:57 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `idContacto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCampana` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `calle` varchar(60) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `email` text,
  `noInterior` varchar(10) DEFAULT NULL,
  `noExterior` varchar(10) DEFAULT NULL,
  `codigoPostal` varchar(10) DEFAULT NULL,
  `colonia` varchar(60) DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL,
  `entreCalle` text,
  `fechaCierre` date DEFAULT NULL,
  `fechaCancelacion` date DEFAULT NULL,
  `comentario` date DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `idMunicipio` int(11) DEFAULT NULL,
  `deuda` decimal(18,2) DEFAULT NULL,
  `latitud` varchar(20) DEFAULT NULL,
  `longitud` varchar(20) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT '',
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idContacto`, `idUsuario`, `idCampana`, `nombre`, `calle`, `telefono`, `email`, `noInterior`, `noExterior`, `codigoPostal`, `colonia`, `idPais`, `entreCalle`, `fechaCierre`, `fechaCancelacion`, `comentario`, `idEstado`, `idMunicipio`, `deuda`, `latitud`, `longitud`, `estatus`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-06-01 01:14:25', ' [ UPFATE 2023-06-01 01:14:25 ], [ idUser 37 ] ', 1),
(2, 11, 3, 'Facundo', 'qeq', '1232', '', '', '12', '', '12', 0, NULL, NULL, NULL, NULL, 0, 0, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:46', '2023-02-22 01:03:46', ' [ INSERT 2023-02-22 01:03:46 ], [ idUser 1 ] ', 1),
(3, 11, 17, 'Alejandro Gomez Ramirez', '8 de julio ', '3354345667', '', '2', '788', '45560', 'Medrano', 2, NULL, NULL, NULL, NULL, 2, 1, '8000.00', '20.652684681069186', '-103.45285311189987', 'SELECCIONADO', '2023-02-23 06:21:12', '2023-06-01 03:20:11', ' [ UPFATE 2023-06-01 03:20:11 ], [ idUser 37 ] ', 1),
(4, 11, 17, 'Omar salcedo Gutirrez', '8 de Julio', '3434342345', '', '', '', '', 'Medrano', 2, NULL, NULL, NULL, NULL, 2, 1, '4000.00', '20.652684681069186', '-103.45285311189987', 'SELECCIONADO', '2023-02-23 06:22:59', '2023-06-01 07:58:35', ' [ UPFATE 2023-06-01 07:58:35 ], [ idUser 37 ] ', 1),
(5, 11, 17, 'Omar salcedo Gutirrez	', '', '', '', '', '', '', '', 2, NULL, NULL, NULL, NULL, 2, 1, '222.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-23 06:24:20', '2023-02-23 06:57:29', ' [ DELETE 2023-02-23 06:57:29 ], [ idUser 1 ] ', 0),
(6, 11, 20, 'adasdd', '', '', '', '', '', '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, '234.00', '20.652684681069186', '-103.45285311189987', 'SELECCIONADO', '2023-02-23 06:28:39', '2023-06-02 07:28:56', ' [ UPFATE 2023-06-02 07:28:56 ], [ idUser 37 ] ', 1),
(7, 11, 17, 'asdasd', '', '', '', '', '', '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2344.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-23 06:29:10', '2023-02-23 06:56:25', ' [ DELETE 2023-02-23 06:56:25 ], [ idUser 1 ] ', 0),
(8, 11, 17, 'asd', '1123', '123', '', '13', '123', '13', '123', 2, NULL, NULL, NULL, NULL, 2, 1, '123.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-23 06:30:28', '2023-02-23 06:55:30', ' [ DELETE 2023-02-23 06:55:30 ], [ idUser 1 ] ', 0),
(9, 11, 17, '123', '123', '123', '', '123', '123', '1123', '123', 2, NULL, NULL, NULL, NULL, 2, 1, '1123.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-23 06:30:43', '2023-02-23 06:58:08', ' [ DELETE 2023-02-23 06:58:08 ], [ idUser 1 ] ', 0),
(10, 11, 25, 'AURORA', 'AURORA', '3434343434', '', '12', '12', '454545', 'AURORA', 2, NULL, NULL, NULL, NULL, 2, 1, '10.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-04-12 09:34:55', '2023-04-12 09:34:55', ' [ INSERT 2023-04-12 09:34:55 ], [ idUser 1 ] ', 1),
(11, 1, 1, 'Omar', 'Omar', '1212121212', '', '12', '12', '121212', 'Omar', 2, NULL, NULL, NULL, NULL, 2, 1, '200.00', '20.652684681069186', '-103.45285311189987', 'SELECCIONADO', '2023-04-13 01:46:20', '2023-06-02 07:46:03', ' [ UPFATE 2023-06-02 07:46:03 ], [ idUser 37 ] ', 1),
(12, 1, 1, 'Omar salzar', 'Omar salzar', '1221211212', '', '21', '12', '121212', 'Omar salzar', 2, NULL, NULL, NULL, NULL, 2, 1, '300.00', '20.652684681069186', '-103.45285311189987', 'SELECCIONADO', '2023-04-13 01:47:09', '2023-06-03 11:37:06', ' [ UPFATE 2023-06-03 11:37:06 ], [ idUser 37 ] ', 1),
(13, 1, 1, 'Javier delgado', 'Javier delgado', '2323232332', '', '23', '23', '233223', 'Javier delgado', 2, NULL, NULL, NULL, NULL, 2, 1, '500.00', '20.652684681069186', '-103.45285311189987', 'SELECCIONADO', '2023-04-13 01:47:34', '2023-06-06 10:30:56', ' [ UPFATE 2023-06-06 10:30:56 ], [ idUser 37 ] ', 1),
(14, 1, 1, 'Rafael varan', 'Rafael varan', '4545454545', '', '12', '12', '454545', 'Rafael varan', 2, NULL, NULL, NULL, NULL, 2, 1, '600.00', '20.652684681069186', '-103.45285311189987', 'SELECCIONADO', '2023-04-13 01:47:57', '2023-06-06 10:52:56', ' [ UPFATE 2023-06-06 10:52:56 ], [ idUser 37 ] ', 1),
(15, 1, 1, 'Javier ', 'Javier ', '5654344556', '', '', '', '455634', 'Javier ', 2, NULL, NULL, NULL, NULL, 2, 1, '500.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-04-13 01:48:16', '2023-04-13 01:48:16', ' [ INSERT 2023-04-13 01:48:16 ], [ idUser 1 ] ', 1),
(16, 1, 1, 'varan', '', '2332232323', '', '', '', '232323', '', 2, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.652684681069186', '-103.45285311189987', 'SELECCIONADO', '2023-04-13 01:48:32', '2023-06-06 04:43:24', ' [ UPFATE 2023-06-06 04:43:24 ], [ idUser 57 ] ', 1),
(17, 1, 1, 'Rafael ', '', '3434343434', '', '', '', '343443', '', 2, NULL, NULL, NULL, NULL, 2, 1, '8900.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-04-13 01:48:48', '2023-04-13 01:48:48', ' [ INSERT 2023-04-13 01:48:48 ], [ idUser 1 ] ', 1),
(18, 1, 1, 'Rodrigo', '', '9845678990', '', '', '', '', '', 2, NULL, NULL, NULL, NULL, 2, 1, '899.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-04-13 01:49:14', '2023-04-13 01:49:14', ' [ INSERT 2023-04-13 01:49:14 ], [ idUser 1 ] ', 1),
(19, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(20, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(21, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(22, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(23, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(24, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(25, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'SELECCIONADO', '2023-02-22 01:03:23', '2023-06-06 10:34:24', ' [ UPFATE 2023-06-06 10:34:24 ], [ idUser 37 ] ', 1),
(26, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(27, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(28, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(29, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(30, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(31, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(32, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(33, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(34, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(35, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(36, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(37, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(38, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(39, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(40, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(41, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(42, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(43, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(44, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(45, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(46, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(47, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(48, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(49, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(50, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(51, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(52, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(53, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(54, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(55, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(56, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(57, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(58, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(59, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(60, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(61, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(62, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(63, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(64, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(65, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(66, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(67, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(68, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(69, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(70, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(71, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(72, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(73, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(74, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(75, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(76, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(77, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(78, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(79, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(80, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(81, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(82, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(83, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(84, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(85, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(86, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(87, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(88, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(89, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(90, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(91, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(92, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(93, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(94, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(95, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(96, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(97, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(98, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(99, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(100, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(101, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(102, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(103, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(104, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(105, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(106, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(107, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(108, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(109, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(110, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(111, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'PENDIENTE', '2023-02-22 01:03:23', '2023-02-22 01:03:23', ' [ INSERT 2023-02-22 01:03:23 ], [ idUser 1 ] ', 1),
(112, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'SELECCIONADO', '2023-02-22 01:03:23', '2023-06-03 03:55:56', ' [ UPFATE 2023-06-03 03:55:56 ], [ idUser 37 ] ', 1),
(113, 11, 1, 'Daniel', 'qeq', '1232', '', '', '12', '', '12', 2, NULL, NULL, NULL, NULL, 3, 3, '12.00', '20.652684681069186', '-103.45285311189987', 'SELECCIONADO', '2023-02-22 01:03:23', '2023-06-01 01:01:49', ' [ UPFATE 2023-06-01 01:01:49 ], [ idUser 37 ] ', 1),
(138, 2, 29, 'Ana', 'Medrano', '2121211212', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6650161', '-103.3268985', 'PENDIENTE', '2023-05-31 12:33:51', '2023-05-31 12:35:14', ' [ DELETE 2023-05-31 12:35:14 ], [ idUser 2 ] ', 0),
(139, 2, 29, 'Alejandro', 'Medrano', '2121211212', '', '2', '728', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.666928', '-103.3329717', 'PENDIENTE', '2023-05-31 12:33:52', '2023-05-31 12:35:26', ' [ DELETE 2023-05-31 12:35:26 ], [ idUser 2 ] ', 0),
(140, 2, 29, 'Antonio', 'Medrano', '2121211212', '', '2', '309', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6696723', '-103.3392735', 'PENDIENTE', '2023-05-31 12:33:54', '2023-05-31 12:34:57', ' [ DELETE 2023-05-31 12:34:57 ], [ idUser 2 ] ', 0),
(141, 2, 29, 'Ana', 'Medrano', '2121211212', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6650161', '-103.3268985', 'SELECCIONADO', '2023-05-31 12:35:47', '2023-05-31 10:50:18', ' [ UPFATE 2023-05-31 10:50:18 ], [ idUser 37 ] ', 1),
(142, 2, 29, 'Alejandro', 'Medrano', '2121211212', '', '2', '728', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.666928', '-103.3329717', 'SELECCIONADO', '2023-05-31 12:35:49', '2023-06-03 01:43:24', ' [ UPFATE 2023-06-03 01:43:24 ], [ idUser 37 ] ', 1),
(154, 2, 29, 'Marian', 'Bahia de Banderas', '3328068169', 'Medreno', '', '2729-60', '45069', 'parque de santamaria', 2, NULL, NULL, NULL, NULL, 2, 5, '5667.00', '20.5977752', '-103.416344', 'SELECCIONADO', '2023-05-31 01:13:29', '2023-06-01 01:02:27', ' [ UPFATE 2023-06-01 01:02:27 ], [ idUser 37 ] ', 1),
(155, 2, 30, 'Ana', 'Medrano', '2121211212', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6650161', '-103.3268985', 'PENDIENTE', '2023-05-31 01:31:08', '2023-05-31 01:31:08', ' [ INSERT 2023-05-31 01:31:08 ], [ idUser 2 ] ', 1),
(156, 2, 30, 'Alejandro', 'Medrano', '2121211212', '', '2', '728', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.666928', '-103.3329717', 'PENDIENTE', '2023-05-31 01:31:09', '2023-05-31 01:31:09', ' [ INSERT 2023-05-31 01:31:09 ], [ idUser 2 ] ', 1),
(157, 2, 30, 'Antonio', 'Medrano', '2121211212', '', '2', '309', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6696723', '-103.3392735', 'PENDIENTE', '2023-05-31 01:31:11', '2023-05-31 01:31:11', ' [ INSERT 2023-05-31 01:31:11 ], [ idUser 2 ] ', 1),
(158, 2, 33, 'Ana', 'Medrano', '2121211212', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6696723', '-103.3392735\n', 'SELECCIONADO', '2023-06-06 04:41:45', '2023-06-06 08:24:58', ' [ UPFATE 2023-06-06 08:24:58 ], [ idUser 57 ] ', 1),
(159, 2, 33, 'Alejandro', 'Medrano', '2121211212', '', '2', '728', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6696723', '-103.3392735\n', 'PENDIENTE', '2023-06-06 04:41:45', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 57 ] ', 1),
(160, 2, 33, 'Antonio', 'Medrano', '2121211212', '', '2', '309', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6696723', '-103.3392735\n', 'PENDIENTE', '2023-06-06 04:41:45', '2023-06-06 04:41:45', ' [ INSERT 2023-06-06 04:41:45 ], [ idUser 2 ] ', 1),
(161, 2, 32, 'Ana', 'Medrano', '2121211212', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6650161', '-103.3268985', 'SELECCIONADO', '2023-06-06 08:52:05', '2023-07-14 03:05:13', ' [ UPFATE 2023-07-14 03:05:13 ], [ idUser 37 ] ', 1),
(162, 2, 32, 'Alejandro', 'Medrano', '2121211212', '', '2', '728', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.666928', '-103.3329717', 'PENDIENTE', '2023-06-06 08:52:05', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 37 ] ', 1),
(163, 2, 32, 'Antonio', 'Medrano', '2121211212', '', '2', '309', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6696723', '-103.3392735', 'PENDIENTE', '2023-06-06 08:52:05', '2023-06-06 08:52:05', ' [ INSERT 2023-06-06 08:52:05 ], [ idUser 2 ] ', 1),
(164, 2, 34, 'Ana', 'Medrano', '2121211212', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6650161', '-103.3268985', 'PENDIENTE', '2023-06-07 05:58:45', '2023-06-07 05:58:45', ' [ INSERT 2023-06-07 05:58:45 ], [ idUser 2 ] ', 1),
(165, 2, 34, 'Alejandro', 'Medrano', '2121211212', '', '2', '728', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.666928', '-103.3329717', 'PENDIENTE', '2023-06-07 05:58:45', '2023-06-07 05:58:45', ' [ INSERT 2023-06-07 05:58:45 ], [ idUser 2 ] ', 1),
(166, 2, 34, 'Antonio', 'Medrano', '2121211212', '', '2', '309', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6696723', '-103.3392735', 'PENDIENTE', '2023-06-07 05:58:45', '2023-06-07 05:58:45', ' [ INSERT 2023-06-07 05:58:45 ], [ idUser 2 ] ', 1),
(167, 2, 34, 'Ana', 'Av Hidalgo', '3354544531', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6772125', '-103.3590156', 'PENDIENTE', '2023-06-07 06:02:33', '2023-06-07 06:02:33', ' [ INSERT 2023-06-07 06:02:33 ], [ idUser 2 ] ', 1),
(168, 2, 34, 'Alejandro', 'Av Hidalgo', '3354544524', '', '2', '2027', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.676474', '-103.3822091', 'PENDIENTE', '2023-06-07 06:02:34', '2023-06-07 06:02:34', ' [ INSERT 2023-06-07 06:02:34 ], [ idUser 2 ] ', 1),
(169, 2, 34, 'Antonio', 'Av Hidalgo', '3354544536', '', '2', '1899', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6766867', '-103.3786421', 'PENDIENTE', '2023-06-07 06:02:34', '2023-06-07 06:02:34', ' [ INSERT 2023-06-07 06:02:34 ], [ idUser 2 ] ', 1),
(170, 2, 36, 'Ana', 'Av Hidalgo', '3354544531', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6772125', '-103.3590156', 'PENDIENTE', '2023-06-07 06:15:08', '2023-06-07 06:15:08', ' [ INSERT 2023-06-07 06:15:08 ], [ idUser 2 ] ', 1),
(171, 2, 36, 'Alejandro', 'Av Hidalgo', '3354544524', '', '2', '2027', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.676474', '-103.3822091', 'SELECCIONADO', '2023-06-07 06:15:08', '2023-06-07 07:21:51', ' [ UPFATE 2023-06-07 07:21:51 ], [ idUser 2 ] ', 1),
(172, 2, 36, 'Antonio', 'Av Hidalgo', '3354544536', '', '2', '1899', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6766867', '-103.3786421', 'PENDIENTE', '2023-06-07 06:15:08', '2023-06-07 06:15:08', ' [ INSERT 2023-06-07 06:15:08 ], [ idUser 2 ] ', 1),
(173, 1, 37, 'Ana', 'Av Hidalgo', '3354544531', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6772125', '-103.3590156', 'SELECCIONADO', '2023-06-07 12:44:53', '2023-07-12 02:30:37', ' [ UPFATE 2023-07-12 02:30:37 ], [ idUser 103 ] ', 1),
(174, 1, 37, 'Alejandro', 'Av Hidalgo', '3354544524', '', '2', '2027', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.676474', '-103.3822091', 'PENDIENTE', '2023-06-07 12:44:55', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 37 ] ', 1),
(175, 1, 37, 'Antonio', 'Av Hidalgo', '3354544536', '', '2', '1899', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6766867', '-103.3786421', 'PENDIENTE', '2023-06-07 12:44:57', '2023-06-07 12:44:57', ' [ INSERT 2023-06-07 12:44:57 ], [ idUser 1 ] ', 1),
(176, 1, 39, 'Ana', 'Av Hidalgo', '3354544531', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6772125', '-103.3590156', 'PENDIENTE', '2023-06-07 07:13:40', '2023-06-07 07:13:40', ' [ INSERT 2023-06-07 07:13:40 ], [ idUser 1 ] ', 1),
(177, 1, 39, 'Alejandro', 'Av Hidalgo', '3354544524', '', '2', '2027', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.676474', '-103.3822091', 'PENDIENTE', '2023-06-07 07:13:40', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 37 ] ', 1),
(178, 1, 39, 'Antonio', 'Av Hidalgo', '3354544536', '', '2', '1899', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6766867', '-103.3786421', 'PENDIENTE', '2023-06-07 07:13:40', '2023-06-07 07:13:40', ' [ INSERT 2023-06-07 07:13:40 ], [ idUser 1 ] ', 1),
(179, 2, 40, 'Ana', 'Av Hidalgo', '3354544531', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6772125', '-103.3590156', 'PENDIENTE', '2023-06-07 10:42:18', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 37 ] ', 1),
(180, 2, 40, 'Alejandro', 'Av Hidalgo', '3354544524', '', '2', '2027', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.676474', '-103.3822091', 'PENDIENTE', '2023-06-07 10:42:18', '2023-06-07 10:42:18', ' [ INSERT 2023-06-07 10:42:18 ], [ idUser 2 ] ', 1),
(181, 2, 40, 'Antonio', 'Av Hidalgo', '3354544536', '', '2', '1899', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6766867', '-103.3786421', 'PENDIENTE', '2023-06-07 10:42:18', '2023-06-07 10:42:18', ' [ INSERT 2023-06-07 10:42:18 ], [ idUser 2 ] ', 1),
(182, 2, 44, 'Ana', 'Av Hidalgo', '3354544531', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6772125', '-103.3590156', 'PENDIENTE', '2023-07-17 12:06:06', '2023-07-17 12:06:06', ' [ INSERT 2023-07-17 12:06:06 ], [ idUser 2 ] ', 1),
(183, 2, 44, 'Alejandro', 'Av Hidalgo', '3354544524', '', '2', '2027', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6764745', '-103.3821984', 'PENDIENTE', '2023-07-17 12:06:06', '2023-07-17 12:06:06', ' [ INSERT 2023-07-17 12:06:06 ], [ idUser 2 ] ', 1),
(184, 2, 44, 'Antonio', 'Av Hidalgo', '3354544536', '', '2', '1899', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6766867', '-103.3786421', 'PENDIENTE', '2023-07-17 12:06:06', '2023-07-17 12:06:06', ' [ INSERT 2023-07-17 12:06:06 ], [ idUser 2 ] ', 1),
(185, 1, 45, 'Ana', 'Av Hidalgo', '3354544531', '', '2', '988', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6772125', '-103.3590156', 'PENDIENTE', '2023-07-18 07:50:27', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 37 ] ', 1),
(186, 1, 45, 'Alejandro', 'Av Hidalgo', '3354544524', '', '2', '2027', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6764745', '-103.3821984', 'SELECCIONADO', '2023-07-18 07:50:27', '2023-07-20 02:10:31', ' [ UPFATE 2023-07-20 02:10:31 ], [ idUser 37 ] ', 1),
(187, 1, 45, 'Antonio', 'Av Hidalgo', '3354544536', '', '2', '1899', '44400', 'Medrano', 0, NULL, NULL, NULL, NULL, 2, 1, '7000.00', '20.6766867', '-103.3786421', 'PENDIENTE', '2023-07-18 07:50:27', '2023-07-18 07:50:27', ' [ INSERT 2023-07-18 07:50:27 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `idContrato` int(11) NOT NULL,
  `contrato` text,
  `tipoContrato` varchar(40) DEFAULT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`idContrato`, `contrato`, `tipoContrato`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, '/door2door/Modules/ModuleSettingsContrato/api/Documentos/D2D_File_20230216072123__9788491230557.pdf', 'SOCIO VISITADOR', '2023-02-16 07:21:23', '2023-02-16 07:21:23', ' [ INSERT 2023-02-16 07:21:23 ], [ idUser  ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_deta`
--

CREATE TABLE `corte_deta` (
  `idCorteD` int(11) NOT NULL,
  `estatus` varchar(40) DEFAULT NULL,
  `idCorte` int(11) NOT NULL,
  `idVista` int(11) NOT NULL,
  `idComision` int(11) NOT NULL,
  `idContacto` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `corte_deta`
--

INSERT INTO `corte_deta` (`idCorteD`, `estatus`, `idCorte`, `idVista`, `idComision`, `idContacto`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, NULL, 10, 0, 0, 0, '2023-03-31 11:04:02', '2023-03-31 11:04:02', ' [ INSERT 2023-03-31 11:04:02 ], [ idUser 1 ] ', 1),
(2, NULL, 14, 0, 0, 0, '2023-03-31 11:13:10', '2023-03-31 11:13:10', ' [ INSERT 2023-03-31 11:13:10 ], [ idUser 1 ] ', 1),
(3, NULL, 15, 0, 0, 0, '2023-03-31 11:14:23', '2023-03-31 11:14:23', ' [ INSERT 2023-03-31 11:14:23 ], [ idUser 1 ] ', 1),
(4, NULL, 16, 0, 0, 0, '2023-03-31 11:15:01', '2023-03-31 11:15:01', ' [ INSERT 2023-03-31 11:15:01 ], [ idUser 1 ] ', 1),
(5, NULL, 17, 1, 11, 1, '2023-03-31 11:15:23', '2023-03-31 11:15:23', ' [ INSERT 2023-03-31 11:15:23 ], [ idUser 1 ] ', 1),
(6, NULL, 17, 2, 11, 1, '2023-03-31 11:15:24', '2023-03-31 11:15:24', ' [ INSERT 2023-03-31 11:15:24 ], [ idUser 1 ] ', 1),
(7, NULL, 17, 3, 11, 1, '2023-03-31 11:15:24', '2023-03-31 11:15:24', ' [ INSERT 2023-03-31 11:15:24 ], [ idUser 1 ] ', 1),
(8, NULL, 17, 4, 11, 1, '2023-03-31 11:15:25', '2023-03-31 11:15:25', ' [ INSERT 2023-03-31 11:15:25 ], [ idUser 1 ] ', 1),
(9, NULL, 17, 5, 11, 1, '2023-03-31 11:15:25', '2023-03-31 11:15:25', ' [ INSERT 2023-03-31 11:15:25 ], [ idUser 1 ] ', 1),
(10, NULL, 17, 6, 11, 1, '2023-03-31 11:15:26', '2023-03-31 11:15:26', ' [ INSERT 2023-03-31 11:15:26 ], [ idUser 1 ] ', 1),
(11, NULL, 17, 7, 11, 1, '2023-03-31 11:15:27', '2023-03-31 11:15:27', ' [ INSERT 2023-03-31 11:15:27 ], [ idUser 1 ] ', 1),
(12, NULL, 17, 8, 11, 1, '2023-03-31 11:15:27', '2023-03-31 11:15:27', ' [ INSERT 2023-03-31 11:15:27 ], [ idUser 1 ] ', 1),
(13, NULL, 17, 9, 11, 1, '2023-03-31 11:15:28', '2023-03-31 11:15:28', ' [ INSERT 2023-03-31 11:15:28 ], [ idUser 1 ] ', 1),
(14, NULL, 17, 10, 11, 1, '2023-03-31 11:15:29', '2023-03-31 11:15:29', ' [ INSERT 2023-03-31 11:15:29 ], [ idUser 1 ] ', 1),
(15, NULL, 17, 11, 11, 1, '2023-03-31 11:15:29', '2023-03-31 11:15:29', ' [ INSERT 2023-03-31 11:15:29 ], [ idUser 1 ] ', 1),
(16, NULL, 17, 12, 11, 1, '2023-03-31 11:15:30', '2023-03-31 11:15:30', ' [ INSERT 2023-03-31 11:15:30 ], [ idUser 1 ] ', 1),
(17, NULL, 17, 13, 11, 1, '2023-03-31 11:15:30', '2023-03-31 11:15:30', ' [ INSERT 2023-03-31 11:15:30 ], [ idUser 1 ] ', 1),
(18, NULL, 17, 14, 11, 1, '2023-03-31 11:15:31', '2023-03-31 11:15:31', ' [ INSERT 2023-03-31 11:15:31 ], [ idUser 1 ] ', 1),
(19, NULL, 17, 15, 11, 1, '2023-03-31 11:15:32', '2023-03-31 11:15:32', ' [ INSERT 2023-03-31 11:15:32 ], [ idUser 1 ] ', 1),
(20, NULL, 17, 16, 11, 1, '2023-03-31 11:15:32', '2023-03-31 11:15:32', ' [ INSERT 2023-03-31 11:15:32 ], [ idUser 1 ] ', 1),
(21, NULL, 17, 17, 11, 1, '2023-03-31 11:15:33', '2023-03-31 11:15:33', ' [ INSERT 2023-03-31 11:15:33 ], [ idUser 1 ] ', 1),
(22, NULL, 17, 18, 11, 1, '2023-03-31 11:15:34', '2023-03-31 11:15:34', ' [ INSERT 2023-03-31 11:15:34 ], [ idUser 1 ] ', 1),
(23, NULL, 17, 19, 11, 1, '2023-03-31 11:15:34', '2023-03-31 11:15:34', ' [ INSERT 2023-03-31 11:15:34 ], [ idUser 1 ] ', 1),
(24, NULL, 17, 20, 11, 1, '2023-03-31 11:15:35', '2023-03-31 11:15:35', ' [ INSERT 2023-03-31 11:15:35 ], [ idUser 1 ] ', 1),
(25, NULL, 17, 21, 11, 1, '2023-03-31 11:15:35', '2023-03-31 11:15:35', ' [ INSERT 2023-03-31 11:15:35 ], [ idUser 1 ] ', 1),
(26, NULL, 17, 22, 11, 1, '2023-03-31 11:15:36', '2023-03-31 11:15:36', ' [ INSERT 2023-03-31 11:15:36 ], [ idUser 1 ] ', 1),
(27, NULL, 17, 23, 11, 1, '2023-03-31 11:15:37', '2023-03-31 11:15:37', ' [ INSERT 2023-03-31 11:15:37 ], [ idUser 1 ] ', 1),
(28, NULL, 17, 24, 11, 1, '2023-03-31 11:15:37', '2023-03-31 11:15:37', ' [ INSERT 2023-03-31 11:15:37 ], [ idUser 1 ] ', 1),
(29, NULL, 17, 25, 11, 1, '2023-03-31 11:15:38', '2023-03-31 11:15:38', ' [ INSERT 2023-03-31 11:15:38 ], [ idUser 1 ] ', 1),
(30, NULL, 17, 26, 11, 1, '2023-03-31 11:15:39', '2023-03-31 11:15:39', ' [ INSERT 2023-03-31 11:15:39 ], [ idUser 1 ] ', 1),
(31, NULL, 17, 27, 11, 1, '2023-03-31 11:15:39', '2023-03-31 11:15:39', ' [ INSERT 2023-03-31 11:15:39 ], [ idUser 1 ] ', 1),
(32, NULL, 17, 28, 11, 1, '2023-03-31 11:15:40', '2023-03-31 11:15:40', ' [ INSERT 2023-03-31 11:15:40 ], [ idUser 1 ] ', 1),
(33, NULL, 17, 29, 11, 1, '2023-03-31 11:15:40', '2023-03-31 11:15:40', ' [ INSERT 2023-03-31 11:15:40 ], [ idUser 1 ] ', 1),
(34, NULL, 17, 30, 11, 1, '2023-03-31 11:15:41', '2023-03-31 11:15:41', ' [ INSERT 2023-03-31 11:15:41 ], [ idUser 1 ] ', 1),
(35, NULL, 17, 31, 11, 1, '2023-03-31 11:15:42', '2023-03-31 11:15:42', ' [ INSERT 2023-03-31 11:15:42 ], [ idUser 1 ] ', 1),
(36, NULL, 17, 32, 11, 1, '2023-03-31 11:15:42', '2023-03-31 11:15:42', ' [ INSERT 2023-03-31 11:15:42 ], [ idUser 1 ] ', 1),
(37, NULL, 17, 33, 11, 1, '2023-03-31 11:15:43', '2023-03-31 11:15:43', ' [ INSERT 2023-03-31 11:15:43 ], [ idUser 1 ] ', 1),
(38, NULL, 17, 34, 11, 1, '2023-03-31 11:15:44', '2023-03-31 11:15:44', ' [ INSERT 2023-03-31 11:15:44 ], [ idUser 1 ] ', 1),
(39, NULL, 17, 35, 11, 1, '2023-03-31 11:15:44', '2023-03-31 11:15:44', ' [ INSERT 2023-03-31 11:15:44 ], [ idUser 1 ] ', 1),
(40, NULL, 17, 36, 11, 1, '2023-03-31 11:15:45', '2023-03-31 11:15:45', ' [ INSERT 2023-03-31 11:15:45 ], [ idUser 1 ] ', 1),
(41, NULL, 17, 37, 11, 1, '2023-03-31 11:15:45', '2023-03-31 11:15:45', ' [ INSERT 2023-03-31 11:15:45 ], [ idUser 1 ] ', 1),
(42, NULL, 17, 38, 11, 1, '2023-03-31 11:15:46', '2023-03-31 11:15:46', ' [ INSERT 2023-03-31 11:15:46 ], [ idUser 1 ] ', 1),
(43, NULL, 17, 39, 11, 1, '2023-03-31 11:15:47', '2023-03-31 11:15:47', ' [ INSERT 2023-03-31 11:15:47 ], [ idUser 1 ] ', 1),
(44, NULL, 17, 40, 11, 1, '2023-03-31 11:15:47', '2023-03-31 11:15:47', ' [ INSERT 2023-03-31 11:15:47 ], [ idUser 1 ] ', 1),
(45, NULL, 17, 41, 11, 1, '2023-03-31 11:15:48', '2023-03-31 11:15:48', ' [ INSERT 2023-03-31 11:15:48 ], [ idUser 1 ] ', 1),
(46, NULL, 17, 42, 11, 1, '2023-03-31 11:15:49', '2023-03-31 11:15:49', ' [ INSERT 2023-03-31 11:15:49 ], [ idUser 1 ] ', 1),
(47, NULL, 17, 43, 11, 1, '2023-03-31 11:15:49', '2023-03-31 11:15:49', ' [ INSERT 2023-03-31 11:15:49 ], [ idUser 1 ] ', 1),
(48, NULL, 17, 44, 11, 1, '2023-03-31 11:15:50', '2023-03-31 11:15:50', ' [ INSERT 2023-03-31 11:15:50 ], [ idUser 1 ] ', 1),
(49, NULL, 17, 45, 11, 1, '2023-03-31 11:15:50', '2023-03-31 11:15:50', ' [ INSERT 2023-03-31 11:15:50 ], [ idUser 1 ] ', 1),
(50, NULL, 17, 46, 11, 1, '2023-03-31 11:15:51', '2023-03-31 11:15:51', ' [ INSERT 2023-03-31 11:15:51 ], [ idUser 1 ] ', 1),
(51, NULL, 17, 47, 11, 1, '2023-03-31 11:15:52', '2023-03-31 11:15:52', ' [ INSERT 2023-03-31 11:15:52 ], [ idUser 1 ] ', 1),
(52, NULL, 17, 48, 11, 1, '2023-03-31 11:15:52', '2023-03-31 11:15:52', ' [ INSERT 2023-03-31 11:15:52 ], [ idUser 1 ] ', 1),
(53, NULL, 17, 49, 11, 1, '2023-03-31 11:15:53', '2023-03-31 11:15:53', ' [ INSERT 2023-03-31 11:15:53 ], [ idUser 1 ] ', 1),
(54, NULL, 17, 50, 11, 1, '2023-03-31 11:15:54', '2023-03-31 11:15:54', ' [ INSERT 2023-03-31 11:15:54 ], [ idUser 1 ] ', 1),
(55, NULL, 17, 51, 11, 1, '2023-03-31 11:15:54', '2023-03-31 11:15:54', ' [ INSERT 2023-03-31 11:15:54 ], [ idUser 1 ] ', 1),
(56, NULL, 17, 52, 11, 1, '2023-03-31 11:15:55', '2023-03-31 11:15:55', ' [ INSERT 2023-03-31 11:15:55 ], [ idUser 1 ] ', 1),
(57, NULL, 17, 53, 11, 1, '2023-03-31 11:15:55', '2023-03-31 11:15:55', ' [ INSERT 2023-03-31 11:15:55 ], [ idUser 1 ] ', 1),
(58, NULL, 17, 54, 11, 1, '2023-03-31 11:15:56', '2023-03-31 11:15:56', ' [ INSERT 2023-03-31 11:15:56 ], [ idUser 1 ] ', 1),
(59, NULL, 17, 55, 11, 1, '2023-03-31 11:15:57', '2023-03-31 11:15:57', ' [ INSERT 2023-03-31 11:15:57 ], [ idUser 1 ] ', 1),
(60, NULL, 17, 56, 11, 1, '2023-03-31 11:15:57', '2023-03-31 11:15:57', ' [ INSERT 2023-03-31 11:15:57 ], [ idUser 1 ] ', 1),
(61, NULL, 17, 57, 11, 1, '2023-03-31 11:15:58', '2023-03-31 11:15:58', ' [ INSERT 2023-03-31 11:15:58 ], [ idUser 1 ] ', 1),
(62, NULL, 17, 58, 11, 1, '2023-03-31 11:15:59', '2023-03-31 11:15:59', ' [ INSERT 2023-03-31 11:15:59 ], [ idUser 1 ] ', 1),
(63, NULL, 17, 59, 11, 1, '2023-03-31 11:15:59', '2023-03-31 11:15:59', ' [ INSERT 2023-03-31 11:15:59 ], [ idUser 1 ] ', 1),
(64, NULL, 17, 60, 11, 1, '2023-03-31 11:16:00', '2023-03-31 11:16:00', ' [ INSERT 2023-03-31 11:16:00 ], [ idUser 1 ] ', 1),
(65, NULL, 17, 61, 11, 1, '2023-03-31 11:16:00', '2023-03-31 11:16:00', ' [ INSERT 2023-03-31 11:16:00 ], [ idUser 1 ] ', 1),
(66, NULL, 17, 62, 11, 1, '2023-03-31 11:16:01', '2023-03-31 11:16:01', ' [ INSERT 2023-03-31 11:16:01 ], [ idUser 1 ] ', 1),
(67, NULL, 17, 63, 11, 1, '2023-03-31 11:16:02', '2023-03-31 11:16:02', ' [ INSERT 2023-03-31 11:16:02 ], [ idUser 1 ] ', 1),
(68, NULL, 18, 1, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(69, NULL, 18, 2, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(70, NULL, 18, 3, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(71, NULL, 18, 4, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(72, NULL, 18, 5, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(73, NULL, 18, 6, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(74, NULL, 18, 7, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(75, NULL, 18, 8, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(76, NULL, 18, 9, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(77, NULL, 18, 10, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(78, NULL, 18, 11, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(79, NULL, 18, 12, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(80, NULL, 18, 13, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(81, NULL, 18, 14, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(82, NULL, 18, 15, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(83, NULL, 18, 16, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(84, NULL, 18, 17, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(85, NULL, 18, 18, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(86, NULL, 18, 19, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(87, NULL, 18, 20, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(88, NULL, 18, 21, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(89, NULL, 18, 22, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(90, NULL, 18, 23, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(91, NULL, 18, 24, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(92, NULL, 18, 25, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(93, NULL, 18, 26, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(94, NULL, 18, 27, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(95, NULL, 18, 28, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(96, NULL, 18, 29, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(97, NULL, 18, 30, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(98, NULL, 18, 31, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(99, NULL, 18, 32, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(100, NULL, 18, 33, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(101, NULL, 18, 34, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(102, NULL, 18, 35, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(103, NULL, 18, 36, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(104, NULL, 18, 37, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(105, NULL, 18, 38, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(106, NULL, 18, 39, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(107, NULL, 18, 40, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(108, NULL, 18, 41, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(109, NULL, 18, 42, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(110, NULL, 18, 43, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(111, NULL, 18, 44, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(112, NULL, 18, 45, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(113, NULL, 18, 46, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(114, NULL, 18, 47, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(115, NULL, 18, 48, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(116, NULL, 18, 49, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(117, NULL, 18, 50, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(118, NULL, 18, 51, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(119, NULL, 18, 52, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(120, NULL, 18, 53, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(121, NULL, 18, 54, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(122, NULL, 18, 55, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(123, NULL, 18, 56, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(124, NULL, 18, 57, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(125, NULL, 18, 58, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(126, NULL, 18, 59, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(127, NULL, 18, 60, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(128, NULL, 18, 61, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(129, NULL, 18, 62, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(130, NULL, 18, 63, 11, 1, '2023-03-31 11:20:44', '2023-03-31 11:20:44', ' [ INSERT 2023-03-31 11:20:44 ], [ idUser 1 ] ', 1),
(131, NULL, 20, 1, 11, 1, '2023-03-31 11:22:45', '2023-03-31 11:22:45', ' [ INSERT 2023-03-31 11:22:45 ], [ idUser 1 ] ', 1),
(132, NULL, 20, 2, 11, 1, '2023-03-31 11:22:45', '2023-03-31 11:22:45', ' [ INSERT 2023-03-31 11:22:45 ], [ idUser 1 ] ', 1),
(133, NULL, 21, 1, 11, 1, '2023-03-31 11:29:47', '2023-03-31 11:29:47', ' [ INSERT 2023-03-31 11:29:47 ], [ idUser 1 ] ', 1),
(134, NULL, 21, 2, 11, 1, '2023-03-31 11:29:47', '2023-03-31 11:29:47', ' [ INSERT 2023-03-31 11:29:47 ], [ idUser 1 ] ', 1),
(135, NULL, 21, 3, 11, 1, '2023-03-31 11:29:47', '2023-03-31 11:29:47', ' [ INSERT 2023-03-31 11:29:47 ], [ idUser 1 ] ', 1),
(136, NULL, 22, 1, 11, 1, '2023-03-31 12:04:42', '2023-03-31 12:04:42', ' [ INSERT 2023-03-31 12:04:42 ], [ idUser 1 ] ', 1),
(137, NULL, 22, 2, 11, 1, '2023-03-31 12:04:42', '2023-03-31 12:04:42', ' [ INSERT 2023-03-31 12:04:42 ], [ idUser 1 ] ', 1),
(138, NULL, 23, 1, 11, 1, '2023-03-31 12:08:04', '2023-03-31 12:08:04', ' [ INSERT 2023-03-31 12:08:04 ], [ idUser 1 ] ', 1),
(139, NULL, 23, 2, 11, 1, '2023-03-31 12:08:04', '2023-03-31 12:08:04', ' [ INSERT 2023-03-31 12:08:04 ], [ idUser 1 ] ', 1),
(140, NULL, 23, 3, 11, 1, '2023-03-31 12:08:04', '2023-03-31 12:08:04', ' [ INSERT 2023-03-31 12:08:04 ], [ idUser 1 ] ', 1),
(141, NULL, 24, 4, 11, 1, '2023-03-31 12:08:56', '2023-03-31 12:08:56', ' [ INSERT 2023-03-31 12:08:56 ], [ idUser 1 ] ', 1),
(142, NULL, 24, 5, 11, 1, '2023-03-31 12:08:56', '2023-03-31 12:08:56', ' [ INSERT 2023-03-31 12:08:56 ], [ idUser 1 ] ', 1),
(143, NULL, 24, 6, 11, 1, '2023-03-31 12:08:56', '2023-03-31 12:08:56', ' [ INSERT 2023-03-31 12:08:56 ], [ idUser 1 ] ', 1),
(144, NULL, 24, 7, 11, 1, '2023-03-31 12:08:56', '2023-03-31 12:08:56', ' [ INSERT 2023-03-31 12:08:56 ], [ idUser 1 ] ', 1),
(145, NULL, 24, 8, 11, 1, '2023-03-31 12:08:56', '2023-03-31 12:08:56', ' [ INSERT 2023-03-31 12:08:56 ], [ idUser 1 ] ', 1),
(146, NULL, 24, 9, 11, 1, '2023-03-31 12:08:56', '2023-03-31 12:08:56', ' [ INSERT 2023-03-31 12:08:56 ], [ idUser 1 ] ', 1),
(147, NULL, 24, 10, 11, 1, '2023-03-31 12:08:56', '2023-03-31 12:08:56', ' [ INSERT 2023-03-31 12:08:56 ], [ idUser 1 ] ', 1),
(148, NULL, 24, 11, 11, 1, '2023-03-31 12:08:56', '2023-03-31 12:08:56', ' [ INSERT 2023-03-31 12:08:56 ], [ idUser 1 ] ', 1),
(149, NULL, 24, 12, 11, 1, '2023-03-31 12:08:56', '2023-03-31 12:08:56', ' [ INSERT 2023-03-31 12:08:56 ], [ idUser 1 ] ', 1),
(150, NULL, 24, 13, 11, 1, '2023-03-31 12:08:56', '2023-03-31 12:08:56', ' [ INSERT 2023-03-31 12:08:56 ], [ idUser 1 ] ', 1),
(151, 'ORDEN DE PAGO', 25, 14, 11, 1, '2023-03-31 01:32:49', '2023-04-14 11:35:09', ' [ UPFATE 2023-04-14 11:35:09 ], [ idUser 1 ] ', 1),
(152, 'ORDEN DE PAGO', 25, 15, 11, 1, '2023-03-31 01:32:49', '2023-04-14 11:35:09', ' [ UPFATE 2023-04-14 11:35:09 ], [ idUser 1 ] ', 1),
(153, 'ORDEN DE PAGO', 25, 16, 11, 1, '2023-03-31 01:32:49', '2023-04-14 11:35:09', ' [ UPFATE 2023-04-14 11:35:09 ], [ idUser 1 ] ', 1),
(154, 'ORDEN DE PAGO', 25, 17, 11, 1, '2023-03-31 01:32:49', '2023-04-14 11:35:09', ' [ UPFATE 2023-04-14 11:35:09 ], [ idUser 1 ] ', 1),
(155, 'ORDEN DE PAGO', 26, 18, 1, 1, '2023-03-31 10:21:19', '2023-04-14 01:35:07', ' [ UPFATE 2023-04-14 01:35:07 ], [ idUser 1 ] ', 1),
(156, 'ORDEN DE PAGO', 26, 19, 1, 1, '2023-03-31 10:21:19', '2023-04-14 01:35:07', ' [ UPFATE 2023-04-14 01:35:07 ], [ idUser 1 ] ', 1),
(157, 'ORDEN DE PAGO', 26, 20, 1, 1, '2023-03-31 10:21:19', '2023-04-14 01:35:07', ' [ UPFATE 2023-04-14 01:35:07 ], [ idUser 1 ] ', 1),
(158, NULL, 27, 21, 1, 1, '2023-03-31 10:23:23', '2023-03-31 10:23:23', ' [ INSERT 2023-03-31 10:23:23 ], [ idUser 1 ] ', 1),
(159, NULL, 27, 22, 1, 1, '2023-03-31 10:23:23', '2023-03-31 10:23:23', ' [ INSERT 2023-03-31 10:23:23 ], [ idUser 1 ] ', 1),
(160, NULL, 27, 23, 1, 1, '2023-03-31 10:23:23', '2023-03-31 10:23:23', ' [ INSERT 2023-03-31 10:23:23 ], [ idUser 1 ] ', 1),
(161, 'ORDEN DE PAGO', 28, 25, 1, 1, '2023-04-12 09:38:08', '2023-04-14 11:40:15', ' [ UPFATE 2023-04-14 11:40:15 ], [ idUser 1 ] ', 1),
(162, 'ORDEN DE PAGO', 28, 26, 1, 1, '2023-04-12 09:38:09', '2023-04-14 11:40:15', ' [ UPFATE 2023-04-14 11:40:15 ], [ idUser 1 ] ', 1),
(163, 'ORDEN DE PAGO', 28, 27, 1, 1, '2023-04-12 09:38:10', '2023-04-14 11:40:15', ' [ UPFATE 2023-04-14 11:40:15 ], [ idUser 1 ] ', 1),
(164, 'ORDEN DE PAGO', 29, 16, 1, 16, '2023-04-17 01:21:52', '2023-04-17 01:22:16', ' [ UPFATE 2023-04-17 01:22:16 ], [ idUser 1 ] ', 1),
(165, 'ORDEN DE PAGO', 30, 14, 1, 14, '2023-04-17 01:48:24', '2023-04-17 01:48:48', ' [ UPFATE 2023-04-17 01:48:48 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_enca`
--

CREATE TABLE `corte_enca` (
  `idCorte` int(11) NOT NULL,
  `folio` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `noVisitas` int(11) NOT NULL,
  `noProcesados` int(11) NOT NULL,
  `noAceptados` int(11) NOT NULL,
  `noPagados` int(11) NOT NULL,
  `fechaRevicion` datetime NOT NULL,
  `fechaPago` datetime NOT NULL,
  `totalComiciones` decimal(18,2) NOT NULL,
  `estatus` varchar(20) NOT NULL,
  `idCreador` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `corte_enca`
--

INSERT INTO `corte_enca` (`idCorte`, `folio`, `fecha`, `noVisitas`, `noProcesados`, `noAceptados`, `noPagados`, `fechaRevicion`, `fechaPago`, `totalComiciones`, `estatus`, `idCreador`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(23, 1, '2023-03-31 12:08:04', 3, 3, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '297.00', 'CANCELADO', 1, '2023-03-31 12:08:04', '2023-04-13 10:52:47', ' [ DELETE 2023-04-13 10:52:47 ], [ idUser 1 ] ', 1),
(24, 2, '2023-03-31 12:08:56', 10, 10, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '990.00', 'PROCESADO', 1, '2023-03-31 12:08:56', '2023-04-14 11:06:33', ' [ UPFATE 2023-04-14 11:06:33 ], [ idUser 1 ] ', 1),
(25, 3, '2023-03-31 01:32:49', 4, 4, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '396.00', 'ORDEN DE PAGO', 1, '2023-03-31 01:32:49', '2023-04-14 11:35:09', ' [ UPFATE 2023-04-14 11:35:09 ], [ idUser 1 ] ', 1),
(26, 4, '2023-03-31 10:21:19', 3, 3, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '297.00', 'ORDEN DE PAGO', 1, '2023-03-31 10:21:19', '2023-04-14 01:35:07', ' [ UPFATE 2023-04-14 01:35:07 ], [ idUser 1 ] ', 1),
(27, 5, '2023-03-31 10:23:23', 3, 3, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '297.00', 'CANCELADO', 1, '2023-03-31 10:23:23', '2023-04-03 12:53:17', ' [ DELETE 2023-04-03 12:53:17 ], [ idUser 1 ] ', 1),
(28, 6, '2023-04-12 09:38:07', 3, 3, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '297.00', 'ORDEN DE PAGO', 1, '2023-04-12 09:38:07', '2023-04-14 11:40:15', ' [ UPFATE 2023-04-14 11:40:15 ], [ idUser 1 ] ', 1),
(29, 7, '2023-04-17 01:21:51', 1, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '99.00', 'ORDEN DE PAGO', 1, '2023-04-17 01:21:51', '2023-04-17 01:22:16', ' [ UPFATE 2023-04-17 01:22:16 ], [ idUser 1 ] ', 1),
(30, 8, '2023-04-17 01:48:23', 1, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '99.00', 'ORDEN DE PAGO', 1, '2023-04-17 01:48:23', '2023-04-17 01:48:48', ' [ UPFATE 2023-04-17 01:48:48 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionarios`
--

CREATE TABLE `cuestionarios` (
  `idCuestionario` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `tipoCuestionario` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT '',
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuestionarios`
--

INSERT INTO `cuestionarios` (`idCuestionario`, `nombre`, `tipoCuestionario`, `descripcion`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'ResultName', 'SOCIO CLIENTE', '', '2023-02-08 10:01:05', '2023-02-08 10:11:25', ' [ DELETE 2023-02-08 10:11:25 ], [ idUser 1 ] ', 0),
(2, 'Cuestionario visitantes # 1', 'SOCIO VISITANTE', '', '2023-02-08 10:11:19', '2023-07-11 04:15:13', ' [ UPFATE 2023-07-11 04:15:13 ], [ idUser 1 ] ', 1),
(3, 'Cuestionario  Clientes # 1', 'SOCIO CLIENTE', '', '2023-02-16 12:37:12', '2023-02-16 12:37:21', ' [ UPFATE 2023-02-16 12:37:21 ], [ idUser 1 ] ', 1),
(4, 'Cuentionario  visitantes # 2', 'SOCIO VISITANTE', '', '2023-02-16 12:37:32', '2023-02-16 12:37:32', ' [ INSERT 2023-02-16 12:37:32 ], [ idUser 1 ] ', 1),
(5, 'Cuestionario  visitantes # 3', 'SOCIO VISITANTE', '', '2023-02-16 12:37:43', '2023-02-16 12:37:43', ' [ INSERT 2023-02-16 12:37:43 ], [ idUser 1 ] ', 1),
(6, 'Cuestionario  visitantes # 4', 'SOCIO VISITANTE', '', '2023-02-16 12:37:53', '2023-02-16 12:37:53', ' [ INSERT 2023-02-16 12:37:53 ], [ idUser 1 ] ', 1),
(7, 'Cuestionario Clientes # 2', 'SOCIO CLIENTE', '', '2023-02-16 12:38:07', '2023-02-16 12:38:16', ' [ UPFATE 2023-02-16 12:38:16 ], [ idUser 1 ] ', 1),
(8, 'Cuestionario Clientes # 3', 'SOCIO CLIENTE', '', '2023-02-16 12:38:24', '2023-07-11 03:36:54', ' [ DELETE 2023-07-11 03:36:54 ], [ idUser 1 ] ', 1),
(9, 'Cuenstionario de entrada para socios', 'SOCIO CLIENTE', '', '2023-03-23 10:53:21', '2023-07-11 03:36:50', ' [ DELETE 2023-07-11 03:36:50 ], [ idUser 1 ] ', 0),
(10, 'CUESTIONARIO A', 'SOCIO CLIENTE', '', '2023-04-13 10:00:12', '2023-04-13 10:01:27', ' [ DELETE 2023-04-13 10:01:27 ], [ idUser 1 ] ', 0),
(11, 'SDFFFSDFF', 'SOCIO VISITANTE', '', '2023-07-11 03:36:37', '2023-07-11 03:36:46', ' [ DELETE 2023-07-11 03:36:46 ], [ idUser 1 ] ', 0),
(12, 'Cuestionario', 'SOCIO VISITANTE', 'aasd', '2023-07-11 04:12:38', '2023-07-11 01:47:46', ' [ UPFATE 2023-07-11 01:47:46 ], [ idUser 1 ] ', 1),
(13, 'CUESTIONARIO TESTEO#', 'SOCIO VISITANTE', 'JUST A DESCRIPTION', '2023-07-12 01:58:58', '2023-07-12 01:58:58', ' [ INSERT 2023-07-12 01:58:58 ], [ idUser 1 ] ', 1),
(14, 'Cuestionario Delta ', 'SOCIO VISITANTE', 'Cuestionario Delta ', '2023-07-15 04:21:37', '2023-07-15 04:21:37', ' [ INSERT 2023-07-15 04:21:37 ], [ idUser 1 ] ', 1),
(15, 'Cuestionario 23', 'SOCIO VISITANTE', '', '2023-07-16 05:35:31', '2023-07-16 05:35:31', ' [ INSERT 2023-07-16 05:35:31 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emailserver`
--

CREATE TABLE `emailserver` (
  `idEServer` int(11) NOT NULL,
  `user` text NOT NULL,
  `passwords` text NOT NULL,
  `servidorSalida` text NOT NULL,
  `puertoSalida` int(11) NOT NULL,
  `asunto` text,
  `cuerpo` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `razonSocial` varchar(200) NOT NULL,
  `rfc` varchar(50) NOT NULL,
  `domicilio` text,
  `noExterior` varchar(50) DEFAULT NULL,
  `noInterior` varchar(50) DEFAULT NULL,
  `colonia` varchar(200) DEFAULT NULL,
  `ciudad` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `codigoPostal` varchar(10) DEFAULT NULL,
  `telefono` varchar(200) DEFAULT NULL,
  `celular` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `imagen` text,
  `terminosCondiciones` text,
  `fechaModificacion` datetime NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `razonSocial`, `rfc`, `domicilio`, `noExterior`, `noInterior`, `colonia`, `ciudad`, `estado`, `pais`, `codigoPostal`, `telefono`, `celular`, `email`, `imagen`, `terminosCondiciones`, `fechaModificacion`, `fechaCreacion`, `observacion`, `bstate`) VALUES
(1, 'asds', '', '', '', '', '', '', '', '', '', '', 'asd', '', '', '', '2023-02-16 03:16:28', '2023-02-16 03:16:28', ' [ INSERT 2023-02-16 03:16:28 ], [ idUser  ] ', 1),
(2, 'Door 2 Door', 'RFCERETYTUYT', '', '12', '112', 'Medrano', 'Guadalajara', 'Jalisco', 'Mexico', '', '', '3320995678', 'd2d@gmail.com', '/door2door/Modules/ModuleSettingsCompanies/api/Documentos//D2D_File_20230216033326__door2door.png', '', '2023-02-16 04:23:12', '2023-02-16 03:20:40', ' [ UPFATE 2023-02-16 04:23:12 ], [ idUser  ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estados`
--

CREATE TABLE `Estados` (
  `idEstado` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `idPais` int(11) DEFAULT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Estados`
--

INSERT INTO `Estados` (`idEstado`, `nombre`, `idPais`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'Jalisco', 2, '2023-02-22 12:26:37', '2023-02-22 12:26:49', ' [ DELETE 2023-02-22 12:26:49 ], [ idUser 1 ] ', 0),
(2, 'Jalisco', 2, '2023-02-22 12:27:13', '2023-02-22 12:27:13', ' [ INSERT 2023-02-22 12:27:13 ], [ idUser 1 ] ', 1),
(3, 'Mexico', 2, '2023-02-22 12:27:45', '2023-02-22 12:27:45', ' [ INSERT 2023-02-22 12:27:45 ], [ idUser 1 ] ', 1),
(4, 'Queretaro', 2, '2023-02-22 12:27:52', '2023-02-22 12:27:52', ' [ INSERT 2023-02-22 12:27:52 ], [ idUser 1 ] ', 1),
(5, 'Colima', 2, '2023-02-22 12:27:59', '2023-02-22 12:27:59', ' [ INSERT 2023-02-22 12:27:59 ], [ idUser 1 ] ', 1),
(6, 'Zacatecas', 2, '2023-02-22 12:28:06', '2023-02-22 12:28:06', ' [ INSERT 2023-02-22 12:28:06 ], [ idUser 1 ] ', 1),
(7, 'Yucatan', 2, '2023-02-22 12:28:14', '2023-02-22 12:28:14', ' [ INSERT 2023-02-22 12:28:14 ], [ idUser 1 ] ', 1),
(8, 'Puebla', 2, '2023-02-22 12:28:24', '2023-02-22 12:28:24', ' [ INSERT 2023-02-22 12:28:24 ], [ idUser 1 ] ', 1),
(9, 'Veracruz', 2, '2023-02-22 12:28:34', '2023-02-22 12:28:34', ' [ INSERT 2023-02-22 12:28:34 ], [ idUser 1 ] ', 1),
(10, 'Texas', 3, '2023-02-23 03:23:55', '2023-02-23 03:25:29', ' [ UPFATE 2023-02-23 03:25:29 ], [ idUser 1 ] ', 1),
(11, 'Buenos Aires', 4, '2023-02-23 03:30:44', '2023-02-23 03:30:44', ' [ INSERT 2023-02-23 03:30:44 ], [ idUser 1 ] ', 1),
(12, 'TEST', 3, '2023-04-13 09:58:39', '2023-04-13 09:58:39', ' [ INSERT 2023-04-13 09:58:39 ], [ idUser 1 ] ', 1),
(13, 'TEST', 3, '2023-04-13 09:58:40', '2023-04-13 09:58:40', ' [ INSERT 2023-04-13 09:58:40 ], [ idUser 1 ] ', 1),
(14, 'wsh', 3, '2023-04-13 09:59:13', '2023-04-13 09:59:13', ' [ INSERT 2023-04-13 09:59:13 ], [ idUser 1 ] ', 1),
(15, 'cin', 3, '2023-04-13 09:59:29', '2023-04-13 09:59:29', ' [ INSERT 2023-04-13 09:59:29 ], [ idUser 1 ] ', 1),
(16, 'CALIFORNIA', 2, '2023-07-12 01:57:06', '2023-07-12 01:57:06', ' [ INSERT 2023-07-12 01:57:06 ], [ idUser 1 ] ', 1),
(17, 'OHIO', 2, '2023-07-12 01:57:15', '2023-07-12 01:57:15', ' [ INSERT 2023-07-12 01:57:15 ], [ idUser 1 ] ', 1),
(18, 'ALABAMA', 2, '2023-07-12 01:57:22', '2023-07-12 01:57:22', ' [ INSERT 2023-07-12 01:57:22 ], [ idUser 1 ] ', 1),
(19, 'WYOMING', 2, '2023-07-12 01:57:29', '2023-07-12 01:57:29', ' [ INSERT 2023-07-12 01:57:29 ], [ idUser 1 ] ', 1),
(20, 'MISSOURI', 3, '2023-07-12 01:57:39', '2023-07-12 01:57:39', ' [ INSERT 2023-07-12 01:57:39 ], [ idUser 1 ] ', 1),
(21, 'FLORIDA', 3, '2023-07-12 01:57:51', '2023-07-12 01:57:51', ' [ INSERT 2023-07-12 01:57:51 ], [ idUser 1 ] ', 1),
(22, 'ARIZONA', 3, '2023-07-12 01:58:06', '2023-07-12 01:58:06', ' [ INSERT 2023-07-12 01:58:06 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidecias`
--

CREATE TABLE `evidecias` (
  `idEvidecias` int(11) NOT NULL,
  `idVisita` int(11) NOT NULL,
  `archivo` text NOT NULL,
  `tipoArchivo` varchar(40) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evidecias`
--

INSERT INTO `evidecias` (`idEvidecias`, `idVisita`, `archivo`, `tipoArchivo`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 213, '', 'quinta-evidencia', '2023-06-01 04:16:34', '2023-06-01 07:52:43', ' [ DELETE 2023-06-01 07:52:43 ], [ idUser 37 ] ', 0),
(2, 213, '', 'quinta-evidencia', '2023-06-01 04:22:40', '2023-06-01 07:52:43', ' [ DELETE 2023-06-01 07:52:43 ], [ idUser 37 ] ', 0),
(3, 213, '', 'quinta-evidencia', '2023-06-01 04:39:30', '2023-06-01 07:52:43', ' [ DELETE 2023-06-01 07:52:43 ], [ idUser 37 ] ', 0),
(4, 213, '', 'quinta-evidencia', '2023-06-01 04:40:13', '2023-06-01 07:52:43', ' [ DELETE 2023-06-01 07:52:43 ], [ idUser 37 ] ', 0),
(5, 214, '', 'primera-evidencia', '2023-06-01 08:14:43', '2023-06-01 08:28:20', ' [ DELETE 2023-06-01 08:28:20 ], [ idUser 37 ] ', 0),
(6, 214, '', 'primera-evidencia', '2023-06-01 08:14:52', '2023-06-01 08:28:20', ' [ DELETE 2023-06-01 08:28:20 ], [ idUser 37 ] ', 0),
(7, 214, '', 'primera-evidencia', '2023-06-01 08:23:56', '2023-06-01 08:28:20', ' [ DELETE 2023-06-01 08:28:20 ], [ idUser 37 ] ', 0),
(8, 214, '', 'primera-evidencia', '2023-06-01 08:25:24', '2023-06-01 08:28:20', ' [ DELETE 2023-06-01 08:28:20 ], [ idUser 37 ] ', 0),
(9, 214, '', 'primera-evidencia', '2023-06-01 08:26:22', '2023-06-01 08:28:20', ' [ DELETE 2023-06-01 08:28:20 ], [ idUser 37 ] ', 0),
(10, 214, '', 'primera-evidencia', '2023-06-01 08:26:31', '2023-06-01 08:28:20', ' [ DELETE 2023-06-01 08:28:20 ], [ idUser 37 ] ', 0),
(11, 214, '', 'primera-evidencia', '2023-06-01 08:27:43', '2023-06-01 08:28:20', ' [ DELETE 2023-06-01 08:28:20 ], [ idUser 37 ] ', 0),
(12, 214, '', 'primera-evidencia', '2023-06-01 08:29:33', '2023-06-01 08:29:33', ' [ INSERT 2023-06-01 08:29:33 ], [ idUser 37 ] ', 1),
(13, 214, '', 'quinta-evidencia', '2023-06-01 08:30:35', '2023-06-01 08:30:35', ' [ INSERT 2023-06-01 08:30:35 ], [ idUser 37 ] ', 1),
(14, 214, '', 'primera-evidencia', '2023-06-01 08:32:44', '2023-06-01 08:32:44', ' [ INSERT 2023-06-01 08:32:44 ], [ idUser 37 ] ', 1),
(15, 214, '', 'segunda-evidencia', '2023-06-01 08:33:59', '2023-06-01 08:33:59', ' [ INSERT 2023-06-01 08:33:59 ], [ idUser 37 ] ', 1),
(16, 214, '', 'cuarta-evidencia', '2023-06-01 08:34:18', '2023-06-01 08:34:18', ' [ INSERT 2023-06-01 08:34:18 ], [ idUser 37 ] ', 1),
(17, 214, '', 'tercera-evidencia', '2023-06-01 08:34:37', '2023-06-01 08:55:12', ' [ DELETE 2023-06-01 08:55:12 ], [ idUser 37 ] ', 0),
(18, 214, '', 'quinta-evidencia', '2023-06-01 08:34:48', '2023-06-01 08:34:48', ' [ INSERT 2023-06-01 08:34:48 ], [ idUser 37 ] ', 1),
(19, 214, '', 'primera-evidencia', '2023-06-01 08:35:00', '2023-06-01 08:35:00', ' [ INSERT 2023-06-01 08:35:00 ], [ idUser 37 ] ', 1),
(20, 214, '', 'segunda-evidencia', '2023-06-01 08:44:39', '2023-06-01 08:44:39', ' [ INSERT 2023-06-01 08:44:39 ], [ idUser 37 ] ', 1),
(21, 214, '', 'segunda-evidencia', '2023-06-01 08:52:30', '2023-06-01 08:52:30', ' [ INSERT 2023-06-01 08:52:30 ], [ idUser 37 ] ', 1),
(22, 214, '', 'segunda-evidencia', '2023-06-01 08:54:10', '2023-06-01 08:54:10', ' [ INSERT 2023-06-01 08:54:10 ], [ idUser 37 ] ', 1),
(23, 214, '', 'primera-evidencia', '2023-06-01 09:19:11', '2023-06-01 09:19:11', ' [ INSERT 2023-06-01 09:19:11 ], [ idUser 37 ] ', 1),
(24, 214, '', 'primera-evidencia', '2023-06-02 07:19:50', '2023-06-02 07:19:50', ' [ INSERT 2023-06-02 07:19:50 ], [ idUser 37 ] ', 1),
(25, 214, '', 'segunda-evidencia', '2023-06-02 07:20:45', '2023-06-02 07:20:45', ' [ INSERT 2023-06-02 07:20:45 ], [ idUser 37 ] ', 1),
(26, 214, '', 'cuarta-evidencia', '2023-06-02 07:24:23', '2023-06-02 07:24:23', ' [ INSERT 2023-06-02 07:24:23 ], [ idUser 37 ] ', 1),
(27, 214, '', 'quinta-evidencia', '2023-06-02 07:25:51', '2023-06-02 07:25:51', ' [ INSERT 2023-06-02 07:25:51 ], [ idUser 37 ] ', 1),
(28, 216, '', 'primera-evidencia', '2023-06-02 03:44:02', '2023-06-02 03:44:02', ' [ INSERT 2023-06-02 03:44:02 ], [ idUser 37 ] ', 1),
(29, 216, '', 'segunda-evidencia', '2023-06-02 03:44:40', '2023-06-02 03:44:40', ' [ INSERT 2023-06-02 03:44:40 ], [ idUser 37 ] ', 1),
(30, 216, '', 'cuarta-evidencia', '2023-06-02 03:44:49', '2023-06-02 03:44:49', ' [ INSERT 2023-06-02 03:44:49 ], [ idUser 37 ] ', 1),
(31, 216, '', 'quinta-evidencia', '2023-06-02 03:45:13', '2023-06-02 03:45:13', ' [ INSERT 2023-06-02 03:45:13 ], [ idUser 37 ] ', 1),
(32, 223, '', 'primera-evidencia', '2023-06-06 04:44:11', '2023-06-06 04:44:11', ' [ INSERT 2023-06-06 04:44:11 ], [ idUser 57 ] ', 1),
(33, 223, '', 'tercera-evidencia', '2023-06-06 04:44:53', '2023-06-06 04:44:53', ' [ INSERT 2023-06-06 04:44:53 ], [ idUser 57 ] ', 1),
(34, 223, '', 'segunda-evidencia', '2023-06-06 04:47:36', '2023-06-06 04:47:36', ' [ INSERT 2023-06-06 04:47:36 ], [ idUser 57 ] ', 1),
(35, 231, '', 'primera-evidencia', '2023-06-06 08:11:47', '2023-06-06 08:11:47', ' [ INSERT 2023-06-06 08:11:47 ], [ idUser 57 ] ', 1),
(36, 231, '', 'primera-evidencia', '2023-06-06 08:12:18', '2023-06-06 08:12:18', ' [ INSERT 2023-06-06 08:12:18 ], [ idUser 57 ] ', 1),
(37, 231, '', 'primera-evidencia', '2023-06-06 08:15:23', '2023-06-06 08:15:23', ' [ INSERT 2023-06-06 08:15:23 ], [ idUser 57 ] ', 1),
(38, 231, '', 'segunda-evidencia', '2023-06-06 08:16:10', '2023-06-06 08:16:10', ' [ INSERT 2023-06-06 08:16:10 ], [ idUser 57 ] ', 1),
(39, 231, '', 'primera-evidencia', '2023-06-06 08:19:24', '2023-06-06 08:19:24', ' [ INSERT 2023-06-06 08:19:24 ], [ idUser 57 ] ', 1),
(40, 231, '', 'primera-evidencia', '2023-06-06 08:21:48', '2023-06-06 08:21:48', ' [ INSERT 2023-06-06 08:21:48 ], [ idUser 57 ] ', 1),
(41, 231, '', 'primera-evidencia', '2023-06-06 08:23:47', '2023-06-06 08:23:47', ' [ INSERT 2023-06-06 08:23:47 ], [ idUser 57 ] ', 1),
(42, 231, '', 'segunda-evidencia', '2023-06-06 08:24:01', '2023-06-06 08:24:01', ' [ INSERT 2023-06-06 08:24:01 ], [ idUser 57 ] ', 1),
(43, 246, '', 'primera-evidencia', '2023-07-12 02:33:58', '2023-07-12 02:33:58', ' [ INSERT 2023-07-12 02:33:58 ], [ idUser 103 ] ', 1),
(44, 246, '', 'segunda-evidencia', '2023-07-12 02:34:07', '2023-07-12 02:34:07', ' [ INSERT 2023-07-12 02:34:07 ], [ idUser 103 ] ', 1),
(45, 246, '', 'cuarta-evidencia', '2023-07-12 02:34:16', '2023-07-12 02:34:16', ' [ INSERT 2023-07-12 02:34:16 ], [ idUser 103 ] ', 1),
(46, 246, '', 'quinta-evidencia', '2023-07-12 02:34:25', '2023-07-12 02:34:25', ' [ INSERT 2023-07-12 02:34:25 ], [ idUser 103 ] ', 1),
(47, 247, '', 'primera-evidencia', '2023-07-14 06:46:50', '2023-07-14 06:46:50', ' [ INSERT 2023-07-14 06:46:50 ], [ idUser 37 ] ', 1),
(48, 247, '', 'tercera-evidencia', '2023-07-14 06:47:38', '2023-07-14 06:47:38', ' [ INSERT 2023-07-14 06:47:38 ], [ idUser 37 ] ', 1),
(49, 247, '', 'quinta-evidencia', '2023-07-14 06:48:06', '2023-07-14 06:48:06', ' [ INSERT 2023-07-14 06:48:06 ], [ idUser 37 ] ', 1),
(50, 247, '', 'cuarta-evidencia', '2023-07-14 06:48:20', '2023-07-14 06:48:20', ' [ INSERT 2023-07-14 06:48:20 ], [ idUser 37 ] ', 1),
(51, 247, '', 'segunda-evidencia', '2023-07-14 06:48:38', '2023-07-14 06:48:38', ' [ INSERT 2023-07-14 06:48:38 ], [ idUser 37 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gatewaySMS`
--

CREATE TABLE `gatewaySMS` (
  `idGSMS` int(11) NOT NULL,
  `user` text NOT NULL,
  `passwords` text NOT NULL,
  `tocken` text NOT NULL,
  `url` text NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gatewaySMS`
--

INSERT INTO `gatewaySMS` (`idGSMS`, `user`, `passwords`, `tocken`, `url`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'd2d@d2d.com', 'd2d@d2d.com', 'd2d@d2d.com', 'd2d@d2d.com', '2023-02-16 06:24:41', '2023-02-16 06:30:08', ' [ UPFATE 2023-02-16 06:30:08 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gruposMensajes`
--

CREATE TABLE `gruposMensajes` (
  `idGMensaje` int(11) NOT NULL,
  `idCreador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gruposMensajes`
--

INSERT INTO `gruposMensajes` (`idGMensaje`, `idCreador`, `nombre`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(10, 2, 'Desarrolladores ', '2023-06-28 07:11:35', '2023-06-28 07:11:35', ' [ INSERT 2023-06-28 07:11:35 ], [ idUser 2 ] ', 1),
(11, 2, 'Tecnicos', '2023-06-28 07:13:06', '2023-06-28 07:13:06', ' [ INSERT 2023-06-28 07:13:06 ], [ idUser 2 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gruposMensajesUsuarios`
--

CREATE TABLE `gruposMensajesUsuarios` (
  `idGMUsuario` int(11) NOT NULL,
  `idGMensaje` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gruposMensajesUsuarios`
--

INSERT INTO `gruposMensajesUsuarios` (`idGMUsuario`, `idGMensaje`, `idUsuario`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(107, 10, 1, '2023-06-28 07:11:36', '2023-06-28 07:11:36', ' [ INSERT 2023-06-28 07:11:36 ], [ idUser 2 ] ', 1),
(108, 10, 3, '2023-06-28 07:11:36', '2023-06-28 07:11:36', ' [ INSERT 2023-06-28 07:11:36 ], [ idUser 2 ] ', 1),
(109, 10, 20, '2023-06-28 07:11:37', '2023-06-28 07:11:37', ' [ INSERT 2023-06-28 07:11:37 ], [ idUser 2 ] ', 1),
(110, 10, 2, '2023-06-28 07:11:37', '2023-06-28 07:11:37', ' [ INSERT 2023-06-28 07:11:37 ], [ idUser 2 ] ', 1),
(111, 11, 1, '2023-06-28 07:13:07', '2023-06-28 07:13:07', ' [ INSERT 2023-06-28 07:13:07 ], [ idUser 2 ] ', 1),
(112, 11, 25, '2023-06-28 07:13:07', '2023-06-28 07:13:07', ' [ INSERT 2023-06-28 07:13:07 ], [ idUser 2 ] ', 1),
(113, 11, 26, '2023-06-28 07:13:07', '2023-06-28 07:13:07', ' [ INSERT 2023-06-28 07:13:07 ], [ idUser 2 ] ', 1),
(114, 11, 27, '2023-06-28 07:13:08', '2023-06-28 07:13:08', ' [ INSERT 2023-06-28 07:13:08 ], [ idUser 2 ] ', 1),
(115, 11, 28, '2023-06-28 07:13:08', '2023-06-28 07:13:08', ' [ INSERT 2023-06-28 07:13:08 ], [ idUser 2 ] ', 1),
(116, 11, 2, '2023-06-28 07:13:08', '2023-06-28 07:13:08', ' [ INSERT 2023-06-28 07:13:08 ], [ idUser 2 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idModulo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `urlModulo` text NOT NULL,
  `descripcion` text,
  `icono` text NOT NULL,
  `tipoModulo` varchar(30) NOT NULL,
  `idModuloPadre` int(11) NOT NULL,
  `tipoSocio` varchar(30) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idModulo`, `nombre`, `urlModulo`, `descripcion`, `icono`, `tipoModulo`, `idModuloPadre`, `tipoSocio`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'Usuarios', 'Usuarios', '', '', 'PRIMER NIVEL', 0, '', '2023-02-03 06:38:10', '2023-02-03 06:38:10', ' [ INSERT 2023-02-03 06:38:10 ], [ idUser  ] ', 1),
(2, 'Usuarios', '/door2door/Modules/ModuleUsersModel/', '', '', 'SEGUNDO NIVEL', 1, '', '2023-02-03 06:40:24', '2023-02-03 06:40:24', ' [ INSERT 2023-02-03 06:40:24 ], [ idUser  ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Municipios`
--

CREATE TABLE `Municipios` (
  `idMunicipio` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Municipios`
--

INSERT INTO `Municipios` (`idMunicipio`, `nombre`, `idEstado`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'Guadalajara', 2, '2023-02-22 12:29:52', '2023-02-22 12:29:52', ' [ INSERT 2023-02-22 12:29:52 ], [ idUser 1 ] ', 1),
(2, 'Zapopan', 2, '2023-02-22 12:30:04', '2023-02-22 12:30:04', ' [ INSERT 2023-02-22 12:30:04 ], [ idUser 1 ] ', 1),
(3, 'Chappala', 2, '2023-02-22 12:30:15', '2023-02-22 12:30:15', ' [ INSERT 2023-02-22 12:30:15 ], [ idUser 1 ] ', 1),
(4, 'Xalisco', 2, '2023-02-22 12:30:30', '2023-02-22 12:30:30', ' [ INSERT 2023-02-22 12:30:30 ], [ idUser 1 ] ', 1),
(5, 'Tlaquepaque', 2, '2023-02-22 12:30:41', '2023-02-22 12:30:41', ' [ INSERT 2023-02-22 12:30:41 ], [ idUser 1 ] ', 1),
(6, 'Puerto Vallarta', 2, '2023-02-22 12:30:56', '2023-02-22 12:30:56', ' [ INSERT 2023-02-22 12:30:56 ], [ idUser 1 ] ', 1),
(7, 'Dallas', 10, '2023-02-22 12:31:07', '2023-02-23 04:32:58', ' [ UPFATE 2023-02-23 04:32:58 ], [ idUser 1 ] ', 1),
(8, 'Buenos Aires Ciudad', 11, '2023-02-22 10:21:38', '2023-02-22 10:21:38', ' [ INSERT 2023-02-22 10:21:38 ], [ idUser 1 ] ', 1),
(9, 'JEREZ GS', 10, '2023-04-13 09:57:15', '2023-04-13 09:57:37', ' [ DELETE 2023-04-13 09:57:37 ], [ idUser 1 ] ', 0),
(10, 'SAN FRANCISCO', 10, '2023-07-12 01:56:51', '2023-07-12 01:56:51', ' [ INSERT 2023-07-12 01:56:51 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `idPais` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idPais`, `nombre`, `descripcion`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'Mexico', 'Mexico', '2023-02-08 08:36:01', '2023-02-08 08:36:48', ' [ DELETE 2023-02-08 08:36:48 ], [ idUser 1 ] ', 0),
(2, 'Mexico', '', '2023-02-09 04:12:02', '2023-02-09 04:12:02', ' [ INSERT 2023-02-09 04:12:02 ], [ idUser 1 ] ', 1),
(3, 'Estados Unidos', '', '2023-02-23 03:01:09', '2023-02-23 03:01:09', ' [ INSERT 2023-02-23 03:01:09 ], [ idUser 1 ] ', 1),
(4, 'Argentina', '', '2023-02-23 03:01:19', '2023-02-23 03:01:19', ' [ INSERT 2023-02-23 03:01:19 ], [ idUser 1 ] ', 1),
(5, 'Colombia', '', '2023-02-23 03:01:26', '2023-02-23 03:01:26', ' [ INSERT 2023-02-23 03:01:26 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasxcuesntionario`
--

CREATE TABLE `preguntasxcuesntionario` (
  `idPxC` int(11) NOT NULL,
  `idCuestionario` int(11) NOT NULL,
  `pregunta` text,
  `tipoPregunta` varchar(100) DEFAULT '',
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntasxcuesntionario`
--

INSERT INTO `preguntasxcuesntionario` (`idPxC`, `idCuestionario`, `pregunta`, `tipoPregunta`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(9, 9, '¿como estas?                 ', '', '2023-03-23 10:56:53', '2023-03-23 10:56:53', ' [ INSERT 2023-03-23 10:56:53 ], [ idUser 1 ] ', 1),
(16, 10, '                                        PREGUNTA B', '', '2023-04-13 10:01:19', '2023-04-13 10:01:19', ' [ INSERT 2023-04-13 10:01:19 ], [ idUser 1 ] ', 1),
(17, 10, '                                        PREGUNTA C', '', '2023-04-13 10:01:19', '2023-04-13 10:01:19', ' [ INSERT 2023-04-13 10:01:19 ], [ idUser 1 ] ', 1),
(34, 2, '¿Cómo te llamas?                                        ', 'CERRADA', '2023-07-11 05:51:14', '2023-07-11 05:51:14', ' [ INSERT 2023-07-11 05:51:14 ], [ idUser 1 ] ', 1),
(35, 2, '¿Cómo te llamas?                                        ', 'ABIERTA', '2023-07-11 05:51:15', '2023-07-11 05:51:15', ' [ INSERT 2023-07-11 05:51:15 ], [ idUser 1 ] ', 1),
(36, 2, '¿Cómo te llamas?                                         ', 'ABIERTA', '2023-07-11 05:51:15', '2023-07-11 05:51:15', ' [ INSERT 2023-07-11 05:51:15 ], [ idUser 1 ] ', 1),
(41, 7, '¿Que edad tienes?                        ', 'ABIERTA', '2023-07-11 12:40:24', '2023-07-11 12:40:24', ' [ INSERT 2023-07-11 12:40:24 ], [ idUser 1 ] ', 1),
(42, 7, '¿Cómo estás?                            ', 'ABIERTA', '2023-07-11 12:40:24', '2023-07-11 12:40:24', ' [ INSERT 2023-07-11 12:40:24 ], [ idUser 1 ] ', 1),
(43, 6, '            ¿Cómo estás?                                                        ', 'ABIERTA', '2023-07-11 12:40:34', '2023-07-11 12:40:34', ' [ INSERT 2023-07-11 12:40:34 ], [ idUser 1 ] ', 1),
(44, 6, '          ¿Cómo estás?                                                          ', 'ABIERTA', '2023-07-11 12:40:34', '2023-07-11 12:40:34', ' [ INSERT 2023-07-11 12:40:34 ], [ idUser 1 ] ', 1),
(45, 6, '       ¿Cómo estás?                                                             ', 'ABIERTA', '2023-07-11 12:40:34', '2023-07-11 12:40:34', ' [ INSERT 2023-07-11 12:40:34 ], [ idUser 1 ] ', 1),
(46, 4, '                 ¿Cómo estás?                                                   ', 'ABIERTA', '2023-07-11 12:40:45', '2023-07-11 12:40:45', ' [ INSERT 2023-07-11 12:40:45 ], [ idUser 1 ] ', 1),
(47, 4, '             ¿Cómo estás?                                                       ', 'ABIERTA', '2023-07-11 12:40:45', '2023-07-11 12:40:45', ' [ INSERT 2023-07-11 12:40:45 ], [ idUser 1 ] ', 1),
(48, 4, '         ¿Cómo estás?                                                           ', 'ABIERTA', '2023-07-11 12:40:45', '2023-07-11 12:40:45', ' [ INSERT 2023-07-11 12:40:45 ], [ idUser 1 ] ', 1),
(49, 4, '             ¿Cómo estás?                                                       ', 'ABIERTA', '2023-07-11 12:40:45', '2023-07-11 12:40:45', ' [ INSERT 2023-07-11 12:40:45 ], [ idUser 1 ] ', 1),
(50, 4, '         ¿Cómo estás?                                                           ', 'ABIERTA', '2023-07-11 12:40:45', '2023-07-11 12:40:45', ' [ INSERT 2023-07-11 12:40:45 ], [ idUser 1 ] ', 1),
(51, 3, '                      ¿Cómo estás?                                              ', 'ABIERTA', '2023-07-11 12:40:55', '2023-07-11 12:40:55', ' [ INSERT 2023-07-11 12:40:55 ], [ idUser 1 ] ', 1),
(52, 3, '                 ¿Cómo estás?                                                   ', 'ABIERTA', '2023-07-11 12:40:55', '2023-07-11 12:40:55', ' [ INSERT 2023-07-11 12:40:55 ], [ idUser 1 ] ', 1),
(53, 3, '            ¿Cómo estás?                                                       ', 'ABIERTA', '2023-07-11 12:40:55', '2023-07-11 12:40:55', ' [ INSERT 2023-07-11 12:40:55 ], [ idUser 1 ] ', 1),
(54, 3, '         ¿Cómo estás?                                                           ', 'ABIERTA', '2023-07-11 12:40:55', '2023-07-11 12:40:55', ' [ INSERT 2023-07-11 12:40:55 ], [ idUser 1 ] ', 1),
(55, 12, '¿Cómo estás?              ', 'ABIERTA', '2023-07-11 01:51:26', '2023-07-11 01:51:26', ' [ INSERT 2023-07-11 01:51:26 ], [ idUser 1 ] ', 1),
(56, 12, '¿Cómo estás?                            ', 'ABIERTA', '2023-07-11 01:51:26', '2023-07-11 01:51:26', ' [ INSERT 2023-07-11 01:51:26 ], [ idUser 1 ] ', 1),
(58, 14, '¿COMO ESTAS?                   ', 'ABIERTA', '2023-07-15 10:56:52', '2023-07-15 10:56:52', ' [ INSERT 2023-07-15 10:56:52 ], [ idUser 1 ] ', 1),
(59, 14, '¿COMO ESTAS?                                                   ', 'ABIERTA', '2023-07-15 10:56:52', '2023-07-15 10:56:52', ' [ INSERT 2023-07-15 10:56:52 ], [ idUser 1 ] ', 1),
(60, 14, '¿COMO ESTAS?', 'ABIERTA', '2023-07-15 10:56:53', '2023-07-15 10:56:53', ' [ INSERT 2023-07-15 10:56:53 ], [ idUser 1 ] ', 1),
(61, 15, '¿Como esta?       ', 'CERRADA', '2023-07-16 05:36:18', '2023-07-16 05:36:18', ' [ INSERT 2023-07-16 05:36:18 ], [ idUser 1 ] ', 1),
(62, 13, ' ¿Como esta?       ', '', '2023-07-17 07:08:55', '2023-07-17 07:08:55', ' [ INSERT 2023-07-17 07:08:55 ], [ idUser 1 ] ', 1),
(63, 5, ' ¿Como esta?       ', 'ABIERTA', '2023-07-17 07:09:22', '2023-07-17 07:09:22', ' [ INSERT 2023-07-17 07:09:22 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntosxruta`
--

CREATE TABLE `puntosxruta` (
  `idPxR` int(11) NOT NULL,
  `idRuta` int(11) NOT NULL,
  `punto` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntosxzona`
--

CREATE TABLE `puntosxzona` (
  `idPxZ` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `punto` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queuseCorreos`
--

CREATE TABLE `queuseCorreos` (
  `idQNotificaciones` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `asunto` varchar(60) NOT NULL,
  `cuerpo` text NOT NULL,
  `archivoAdjunto` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL,
  `idUsuarioReseptor` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `queuseCorreos`
--

INSERT INTO `queuseCorreos` (`idQNotificaciones`, `idUsuario`, `fecha`, `asunto`, `cuerpo`, `archivoAdjunto`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`, `idUsuarioReseptor`) VALUES
(1, 2, '2023-04-27 09:45:29', '', 'Hola como estas', NULL, '2023-04-27 09:45:29', '2023-04-27 09:45:29', '1', 1, 37),
(2, 2, '2023-04-27 09:45:29', '', 'Hola como estas', NULL, '2023-04-27 09:45:29', '2023-04-27 09:45:29', '1', 1, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queuseMensaje`
--

CREATE TABLE `queuseMensaje` (
  `idQMensaje` int(11) NOT NULL,
  `idGMensaje` int(11) DEFAULT '0',
  `idUsuarioEmisor` int(11) NOT NULL,
  `idUsuarioReceptor` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `mensaje` text NOT NULL,
  `archivoAdjunto` text,
  `visto` int(11) DEFAULT '1',
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `queuseMensaje`
--

INSERT INTO `queuseMensaje` (`idQMensaje`, `idGMensaje`, `idUsuarioEmisor`, `idUsuarioReceptor`, `fecha`, `mensaje`, `archivoAdjunto`, `visto`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(20, 0, 37, 1, '2023-04-26 08:27:24', 'Hola como estas \n', NULL, 0, '2023-04-26 08:27:24', '2023-06-22 01:40:28', ' [ DELETE 2023-06-22 01:40:28 ], [ idUser 1 ] ', 1),
(21, 0, 1, 37, '2023-04-26 08:27:43', 'Bien chat', NULL, 0, '2023-04-26 08:27:43', '2023-06-22 07:15:41', ' [ DELETE 2023-06-22 07:15:41 ], [ idUser 37 ] ', 1),
(22, 0, 37, 1, '2023-04-26 08:28:03', 'ok mucho  gusto ', NULL, 0, '2023-04-26 08:28:03', '2023-06-22 01:40:28', ' [ DELETE 2023-06-22 01:40:28 ], [ idUser 1 ] ', 1),
(23, 0, 1, 37, '2023-04-26 08:28:21', 'sale dale ', NULL, 0, '2023-04-26 08:28:21', '2023-06-22 07:15:41', ' [ DELETE 2023-06-22 07:15:41 ], [ idUser 37 ] ', 1),
(24, 0, 37, 1, '2023-04-27 01:59:13', 'Hola', NULL, 0, '2023-04-27 01:59:13', '2023-06-22 01:40:28', ' [ DELETE 2023-06-22 01:40:28 ], [ idUser 1 ] ', 1),
(25, 0, 2, 10, '2023-05-04 08:53:57', 'hi', NULL, 1, '2023-05-04 08:53:57', '2023-05-04 08:53:57', ' [ INSERT 2023-05-04 08:53:57 ], [ idUser 2 ] ', 1),
(26, 0, 2, 10, '2023-05-04 08:54:19', 'Hola\n', NULL, 1, '2023-05-04 08:54:19', '2023-05-04 08:54:19', ' [ INSERT 2023-05-04 08:54:19 ], [ idUser 2 ] ', 1),
(27, 0, 2, 12, '2023-05-04 08:54:52', 'Hi', NULL, 1, '2023-05-04 08:54:52', '2023-05-04 08:54:52', ' [ INSERT 2023-05-04 08:54:52 ], [ idUser 2 ] ', 1),
(28, 0, 1, 2, '2023-05-10 01:21:25', 'Hola', NULL, 0, '2023-05-10 01:21:25', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(29, 0, 37, 1, '2023-05-27 10:07:20', 'Hola cómo estas', NULL, 0, '2023-05-27 10:07:20', '2023-06-22 01:40:28', ' [ DELETE 2023-06-22 01:40:28 ], [ idUser 1 ] ', 1),
(30, 0, 2, 1, '2023-06-05 10:25:27', 'Hi', NULL, 0, '2023-06-05 10:25:27', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(31, 0, 2, 1, '2023-06-05 10:25:59', 'Hola beo', NULL, 0, '2023-06-05 10:25:59', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(32, 0, 2, 1, '2023-06-05 10:26:06', 'Hola bro ', NULL, 0, '2023-06-05 10:26:06', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(33, 0, 1, 2, '2023-06-05 10:26:24', 'como estas\n', NULL, 0, '2023-06-05 10:26:24', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(34, 0, 2, 2, '2023-06-05 10:29:15', 'hi', NULL, 1, '2023-06-05 10:29:15', '2023-06-05 10:29:15', ' [ INSERT 2023-06-05 10:29:15 ], [ idUser 2 ] ', 1),
(35, 0, 2, 2, '2023-06-05 10:29:33', 'y\n', NULL, 1, '2023-06-05 10:29:33', '2023-06-05 10:29:33', ' [ INSERT 2023-06-05 10:29:33 ], [ idUser 2 ] ', 1),
(36, 0, 1, 2, '2023-06-05 10:32:08', 'Bien\n', NULL, 0, '2023-06-05 10:32:08', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(37, 0, 2, 1, '2023-06-05 10:32:23', 'Chido ', NULL, 0, '2023-06-05 10:32:23', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(38, 0, 1, 2, '2023-06-05 10:32:34', 'ok', NULL, 0, '2023-06-05 10:32:34', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(39, 0, 2, 1, '2023-06-05 10:32:43', 'Nice', NULL, 0, '2023-06-05 10:32:43', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(40, 0, 2, 1, '2023-06-05 10:37:39', 'No ', NULL, 0, '2023-06-05 10:37:39', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(41, 0, 2, 1, '2023-06-05 10:37:58', 'Tested ', NULL, 0, '2023-06-05 10:37:58', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(42, 0, 1, 2, '2023-06-05 10:38:05', 'como esta carnal \n', NULL, 0, '2023-06-05 10:38:05', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(43, 0, 1, 2, '2023-06-05 10:38:26', 'ya realizaste las visitas ', NULL, 0, '2023-06-05 10:38:26', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(44, 0, 1, 2, '2023-06-05 10:38:30', 'o no\n', NULL, 0, '2023-06-05 10:38:30', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(45, 0, 2, 1, '2023-06-05 10:38:43', 'Nel ', NULL, 0, '2023-06-05 10:38:43', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(46, 0, 1, 2, '2023-06-05 10:38:51', 'u entonces', NULL, 0, '2023-06-05 10:38:51', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(47, 0, 1, 2, '2023-06-05 10:38:55', 'para que', NULL, 0, '2023-06-05 10:38:55', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(48, 0, 1, 2, '2023-06-05 10:39:00', 'te pago', NULL, 0, '2023-06-05 10:39:00', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(49, 0, 2, 1, '2023-06-05 10:39:42', 'Ya ves', NULL, 0, '2023-06-05 10:39:42', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(50, 0, 2, 1, '2023-06-05 10:40:23', 'como la vez', NULL, 0, '2023-06-05 10:40:23', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(51, 0, 1, 2, '2023-06-05 10:40:35', 'que te puedo decir ', NULL, 0, '2023-06-05 10:40:35', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(52, 0, 2, 1, '2023-06-05 10:40:56', 'Kaka ', NULL, 0, '2023-06-05 10:40:56', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(53, 0, 1, 2, '2023-06-21 07:42:42', 'Hola', NULL, 0, '2023-06-21 07:42:42', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(54, 0, 1, 2, '2023-06-21 08:06:57', 'hi\n', NULL, 0, '2023-06-21 08:06:57', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(55, 0, 1, 2, '2023-06-21 08:10:50', 'hi', NULL, 0, '2023-06-21 08:10:50', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(56, 0, 1, 2, '2023-06-21 08:15:04', 'hi\n', NULL, 0, '2023-06-21 08:15:04', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(57, 0, 1, 2, '2023-06-21 08:15:47', 'hi', NULL, 0, '2023-06-21 08:15:47', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(58, 0, 1, 2, '2023-06-21 08:23:55', 'hi', NULL, 0, '2023-06-21 08:23:55', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(59, 0, 1, 2, '2023-06-21 08:24:45', 'asd', NULL, 0, '2023-06-21 08:24:45', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(60, 0, 1, 2, '2023-06-21 08:25:28', 'd\n', NULL, 0, '2023-06-21 08:25:28', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(61, 0, 2, 1, '2023-06-21 08:25:45', 'Hola', NULL, 0, '2023-06-21 08:25:45', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(62, 0, 1, 2, '2023-06-21 08:28:04', 'como estas', NULL, 0, '2023-06-21 08:28:04', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(63, 0, 2, 1, '2023-06-21 08:28:19', 'Bien y tu que tal ', NULL, 0, '2023-06-21 08:28:19', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(64, 0, 1, 2, '2023-06-21 08:29:43', 'excelente', NULL, 0, '2023-06-21 08:29:43', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(65, 0, 1, 2, '2023-06-21 08:30:54', 'asd', NULL, 0, '2023-06-21 08:30:54', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(66, 0, 1, 2, '2023-06-21 08:31:40', 'asd', NULL, 0, '2023-06-21 08:31:40', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(67, 0, 2, 1, '2023-06-21 08:31:55', 'Com estas', NULL, 0, '2023-06-21 08:31:55', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(68, 0, 2, 1, '2023-06-21 08:32:38', 'muy bien y tui', NULL, 0, '2023-06-21 08:32:38', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(69, 0, 1, 2, '2023-06-21 08:35:55', 'muy bu¿ien y tu \n', NULL, 0, '2023-06-21 08:35:55', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(70, 0, 2, 1, '2023-06-21 08:38:14', 'Como estas', NULL, 0, '2023-06-21 08:38:14', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(71, 0, 1, 2, '2023-06-21 08:39:17', 'hi', NULL, 0, '2023-06-21 08:39:17', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(72, 0, 2, 1, '2023-06-21 08:39:43', 'ji', NULL, 0, '2023-06-21 08:39:43', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(73, 0, 1, 2, '2023-06-21 08:40:44', 'que onda como estas ', NULL, 0, '2023-06-21 08:40:44', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(74, 0, 2, 1, '2023-06-21 08:41:01', 'Muy bien', NULL, 0, '2023-06-21 08:41:01', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(75, 0, 1, 2, '2023-06-21 08:41:37', 'asd', NULL, 0, '2023-06-21 08:41:37', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(76, 0, 2, 1, '2023-06-21 08:42:06', 'no te entiendo ', NULL, 0, '2023-06-21 08:42:06', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(77, 0, 1, 2, '2023-06-21 08:42:23', 'nada ', NULL, 0, '2023-06-21 08:42:23', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(78, 0, 2, 1, '2023-06-21 08:42:40', 'Bueno ya termiastes de trabajar', NULL, 0, '2023-06-21 08:42:40', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(79, 0, 1, 2, '2023-06-21 08:42:55', 'nel mañana se sigo', NULL, 0, '2023-06-21 08:42:55', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(80, 0, 2, 1, '2023-06-21 08:45:23', 'ok', NULL, 0, '2023-06-21 08:45:23', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(81, 0, 1, 2, '2023-06-21 08:45:35', 'muy bien', NULL, 0, '2023-06-21 08:45:35', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(82, 0, 2, 1, '2023-06-21 08:56:49', 'hola', NULL, 0, '2023-06-21 08:56:49', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(83, 0, 1, 2, '2023-06-21 08:56:56', 'bioen', NULL, 0, '2023-06-21 08:56:56', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(84, 0, 2, 1, '2023-06-21 09:00:47', 'hi', NULL, 0, '2023-06-21 09:00:47', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(85, 0, 1, 2, '2023-06-21 09:00:54', 'hola', NULL, 0, '2023-06-21 09:00:54', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(86, 0, 2, 1, '2023-06-21 09:01:10', 'Como estas', NULL, 0, '2023-06-21 09:01:10', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(87, 0, 1, 2, '2023-06-21 09:01:36', 'Bien y tu ', NULL, 0, '2023-06-21 09:01:36', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(88, 0, 1, 2, '2023-06-21 09:03:29', 'dd', NULL, 0, '2023-06-21 09:03:29', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(89, 0, 2, 1, '2023-06-21 09:03:41', 'd', NULL, 0, '2023-06-21 09:03:41', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(90, 0, 1, 2, '2023-06-21 09:06:51', 'zxcz<xc', NULL, 0, '2023-06-21 09:06:51', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(91, 0, 2, 1, '2023-06-21 09:07:05', 'sdfsfd', NULL, 0, '2023-06-21 09:07:05', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(92, 0, 1, 2, '2023-06-21 09:07:51', 'asd', NULL, 0, '2023-06-21 09:07:51', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(93, 0, 2, 1, '2023-06-21 09:07:58', 'asd', NULL, 0, '2023-06-21 09:07:58', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(94, 0, 1, 2, '2023-06-21 09:08:05', 'aasd', NULL, 0, '2023-06-21 09:08:05', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(95, 0, 1, 2, '2023-06-21 09:08:58', 'asd', NULL, 0, '2023-06-21 09:08:58', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(96, 0, 2, 1, '2023-06-21 09:10:57', 'asd', NULL, 0, '2023-06-21 09:10:57', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(97, 0, 1, 2, '2023-06-21 09:11:13', 'asd', NULL, 0, '2023-06-21 09:11:13', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(98, 0, 2, 1, '2023-06-21 09:11:24', 'sdf', NULL, 0, '2023-06-21 09:11:24', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(99, 0, 1, 2, '2023-06-21 09:13:19', 'Buenas trades', NULL, 0, '2023-06-21 09:13:19', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(100, 0, 1, 2, '2023-06-22 03:56:50', 'asd', NULL, 0, '2023-06-22 03:56:50', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(101, 0, 1, 2, '2023-06-22 03:59:31', 'xvc', NULL, 0, '2023-06-22 03:59:31', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(102, 0, 1, 2, '2023-06-22 03:59:37', 'dfsf', NULL, 0, '2023-06-22 03:59:37', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(103, 0, 2, 1, '2023-06-21 09:49:14', 'Que pasa?', NULL, 0, '2023-06-21 09:49:14', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(104, 0, 2, 1, '2023-06-21 09:49:42', 'Que pas broo', NULL, 0, '2023-06-21 09:49:42', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(105, 0, 1, 37, '2023-06-22 12:27:56', 'Hola', NULL, 0, '2023-06-22 12:27:56', '2023-06-22 07:15:41', ' [ DELETE 2023-06-22 07:15:41 ], [ idUser 37 ] ', 1),
(106, 0, 1, 2, '2023-06-22 12:34:54', 'Hola', NULL, 0, '2023-06-22 12:34:54', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(107, 0, 1, 2, '2023-06-22 12:35:15', 'como estas', NULL, 0, '2023-06-22 12:35:15', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(108, 0, 1, 2, '2023-06-22 12:35:23', '?', NULL, 0, '2023-06-22 12:35:23', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(109, 0, 1, 2, '2023-06-22 12:44:04', 'Buenas tardes', NULL, 0, '2023-06-22 12:44:04', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(110, 0, 1, 37, '2023-06-22 12:45:02', 'Como  estas\n', NULL, 0, '2023-06-22 12:45:02', '2023-06-22 07:15:41', ' [ DELETE 2023-06-22 07:15:41 ], [ idUser 37 ] ', 1),
(111, 0, 37, 1, '2023-06-22 12:45:21', 'Muy bien gracias', NULL, 0, '2023-06-22 12:45:21', '2023-06-22 01:40:28', ' [ DELETE 2023-06-22 01:40:28 ], [ idUser 1 ] ', 1),
(112, 0, 1, 37, '2023-06-22 12:45:32', 'Excelente', NULL, 0, '2023-06-22 12:45:32', '2023-06-22 07:15:41', ' [ DELETE 2023-06-22 07:15:41 ], [ idUser 37 ] ', 1),
(113, 0, 37, 1, '2023-06-22 12:45:43', 'en que te puedo ayudar buen amigo', NULL, 0, '2023-06-22 12:45:43', '2023-06-22 01:40:28', ' [ DELETE 2023-06-22 01:40:28 ], [ idUser 1 ] ', 1),
(114, 0, 1, 37, '2023-06-22 12:45:54', 'en mucho ', NULL, 0, '2023-06-22 12:45:54', '2023-06-22 07:15:41', ' [ DELETE 2023-06-22 07:15:41 ], [ idUser 37 ] ', 1),
(115, 0, 1, 37, '2023-06-22 12:46:10', 'bueno deja te cuento', NULL, 0, '2023-06-22 12:46:10', '2023-06-22 07:15:41', ' [ DELETE 2023-06-22 07:15:41 ], [ idUser 37 ] ', 1),
(116, 0, 37, 1, '2023-06-22 06:37:36', 'Ok cuentame', NULL, 0, '2023-06-22 06:37:36', '2023-06-22 01:40:28', ' [ DELETE 2023-06-22 01:40:28 ], [ idUser 1 ] ', 1),
(117, 0, 1, 37, '2023-06-22 01:18:27', 'ok\n', NULL, 0, '2023-06-22 01:18:27', '2023-06-22 07:15:41', ' [ DELETE 2023-06-22 07:15:41 ], [ idUser 37 ] ', 1),
(118, 0, 1, 2, '2023-06-22 07:05:26', 'Buenas tardes', NULL, 0, '2023-06-22 07:05:26', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(119, 0, 2, 1, '2023-06-22 07:06:11', 'Hola', NULL, 0, '2023-06-22 07:06:11', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(120, 0, 2, 1, '2023-06-22 07:06:43', 'Hola', NULL, 0, '2023-06-22 07:06:43', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(121, 0, 37, 1, '2023-06-22 07:07:29', 'Hola amigo', NULL, 0, '2023-06-22 07:07:29', '2023-06-22 01:40:28', ' [ DELETE 2023-06-22 01:40:28 ], [ idUser 1 ] ', 1),
(122, 0, 37, 1, '2023-06-22 07:08:03', 'Hola amigo', NULL, 0, '2023-06-22 07:08:03', '2023-06-22 01:40:28', ' [ DELETE 2023-06-22 01:40:28 ], [ idUser 1 ] ', 1),
(123, 0, 37, 1, '2023-06-22 07:15:45', 'Hdhdbd', NULL, 0, '2023-06-22 07:15:45', '2023-06-22 01:40:28', ' [ DELETE 2023-06-22 01:40:28 ], [ idUser 1 ] ', 1),
(124, 0, 2, 1, '2023-06-23 03:47:24', 'asdsd', NULL, 0, '2023-06-23 03:47:24', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(125, 0, 1, 2, '2023-06-23 01:49:33', 'Hola', NULL, 0, '2023-06-23 01:49:33', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(126, 10, 2, 10, '2023-06-28 07:22:43', 'ASDSD', NULL, 1, '2023-06-28 07:22:43', '2023-06-28 07:22:43', ' [ INSERT 2023-06-28 07:22:43 ], [ idUser 2 ] ', 1),
(127, 11, 2, 11, '2023-06-28 07:23:55', 'dfd', NULL, 1, '2023-06-28 07:23:55', '2023-06-28 07:23:55', ' [ INSERT 2023-06-28 07:23:55 ], [ idUser 2 ] ', 1),
(128, 10, 2, 10, '2023-06-28 07:29:02', 'asdfasdf', NULL, 1, '2023-06-28 07:29:02', '2023-06-28 07:29:02', ' [ INSERT 2023-06-28 07:29:02 ], [ idUser 2 ] ', 1),
(129, 10, 2, 10, '2023-06-28 07:29:48', 'asd', NULL, 1, '2023-06-28 07:29:48', '2023-06-28 07:29:48', ' [ INSERT 2023-06-28 07:29:48 ], [ idUser 2 ] ', 1),
(130, 0, 1, 2, '2023-06-28 09:43:04', 'Hola', NULL, 0, '2023-06-28 09:43:04', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(131, 0, 1, 3, '2023-06-28 09:43:28', 'hola', NULL, 1, '2023-06-28 09:43:28', '2023-06-28 09:43:28', ' [ INSERT 2023-06-28 09:43:28 ], [ idUser 1 ] ', 1),
(132, 0, 2, 3, '2023-06-28 04:03:47', 'Hola', NULL, 1, '2023-06-28 04:03:47', '2023-06-28 04:03:47', ' [ INSERT 2023-06-28 04:03:47 ], [ idUser 2 ] ', 1),
(133, 0, 2, 4, '2023-06-28 10:32:28', 'hOLA', NULL, 1, '2023-06-28 10:32:28', '2023-06-28 10:32:28', ' [ INSERT 2023-06-28 10:32:28 ], [ idUser 2 ] ', 1),
(134, 0, 2, 4, '2023-06-28 10:32:36', 'cOMO ESTAS', NULL, 1, '2023-06-28 10:32:36', '2023-06-28 10:32:36', ' [ INSERT 2023-06-28 10:32:36 ], [ idUser 2 ] ', 1),
(135, 10, 2, 10, '2023-06-28 10:32:49', 'cOMO ESTAS', NULL, 1, '2023-06-28 10:32:49', '2023-06-28 10:32:49', ' [ INSERT 2023-06-28 10:32:49 ], [ idUser 2 ] ', 1),
(136, 0, 2, 1, '2023-06-28 05:40:58', 'Hola', NULL, 0, '2023-06-28 05:40:58', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(137, 0, 2, 1, '2023-06-28 05:41:09', 'Como estas', NULL, 0, '2023-06-28 05:41:09', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(138, 10, 2, 10, '2023-06-28 05:41:38', 'Bien o mal', NULL, 1, '2023-06-28 05:41:38', '2023-06-28 05:41:38', ' [ INSERT 2023-06-28 05:41:38 ], [ idUser 2 ] ', 1),
(139, 10, 2, 10, '2023-06-28 05:43:04', 'asd', NULL, 1, '2023-06-28 05:43:04', '2023-06-28 05:43:04', ' [ INSERT 2023-06-28 05:43:04 ], [ idUser 2 ] ', 1),
(140, 10, 2, 10, '2023-06-28 05:43:12', 'asdasd', NULL, 1, '2023-06-28 05:43:12', '2023-06-28 05:43:12', ' [ INSERT 2023-06-28 05:43:12 ], [ idUser 2 ] ', 1),
(141, 10, 1, 10, '2023-06-29 01:17:39', 'Hola', NULL, 1, '2023-06-29 01:17:39', '2023-06-29 01:17:39', ' [ INSERT 2023-06-29 01:17:39 ], [ idUser 1 ] ', 1),
(142, 0, 1, 1, '2023-07-03 07:49:55', 'Ho everyone\n', NULL, 1, '2023-07-03 07:49:55', '2023-07-03 07:49:55', ' [ INSERT 2023-07-03 07:49:55 ], [ idUser 1 ] ', 1),
(143, 0, 1, 2, '2023-07-04 11:28:02', 'hi', NULL, 0, '2023-07-04 11:28:02', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(144, 0, 2, 1, '2023-07-05 12:51:00', 'sd', NULL, 0, '2023-07-05 12:51:00', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(145, 0, 2, 1, '2023-07-04 06:37:49', 'fhd', NULL, 0, '2023-07-04 06:37:49', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(146, 0, 2, 53, '2023-07-12 01:11:19', 'hi', NULL, 1, '2023-07-12 01:11:19', '2023-07-12 01:11:19', ' [ INSERT 2023-07-12 01:11:19 ], [ idUser 2 ] ', 1),
(147, 0, 1, 103, '2023-07-12 02:10:07', 'hi michael how are you man', NULL, 0, '2023-07-12 02:10:07', '2023-07-12 02:16:22', ' [ DELETE 2023-07-12 02:16:22 ], [ idUser 103 ] ', 1),
(148, 0, 1, 103, '2023-07-12 02:16:13', 'fuck you', NULL, 0, '2023-07-12 02:16:13', '2023-07-12 02:16:22', ' [ DELETE 2023-07-12 02:16:22 ], [ idUser 103 ] ', 1),
(149, 0, 2, 101, '2023-07-16 06:02:16', 'Hola', NULL, 1, '2023-07-16 06:02:16', '2023-07-16 06:02:16', ' [ INSERT 2023-07-16 06:02:16 ], [ idUser 2 ] ', 1),
(150, 0, 2, 1, '2023-07-16 06:02:40', 'Hola', NULL, 0, '2023-07-16 06:02:40', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(151, 0, 2, 1, '2023-07-16 06:03:51', 'Hola', NULL, 0, '2023-07-16 06:03:51', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(152, 2, 1, 2, '2023-07-16 12:20:17', 'Hola', NULL, 0, '2023-07-16 12:20:17', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(153, 0, 2, 1, '2023-07-16 06:11:54', 'Hola', NULL, 0, '2023-07-16 06:11:54', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(154, 0, 2, 1, '2023-07-16 07:26:36', 'Hi', NULL, 0, '2023-07-16 07:26:36', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(155, 0, 2, 1, '2023-07-16 07:26:48', 'Hola', NULL, 0, '2023-07-16 07:26:48', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(156, 0, 2, 1, '2023-07-16 07:27:11', 'Buenas tardes', NULL, 0, '2023-07-16 07:27:11', '2023-07-16 01:43:14', ' [ DELETE 2023-07-16 01:43:14 ], [ idUser 1 ] ', 1),
(157, 0, 1, 2, '2023-07-16 10:04:41', 'hola', NULL, 0, '2023-07-16 10:04:41', '2023-07-16 10:04:50', ' [ DELETE 2023-07-16 10:04:50 ], [ idUser 2 ] ', 1),
(158, 0, 2, 3, '2023-07-16 10:07:11', 'Hola', NULL, 1, '2023-07-16 10:07:11', '2023-07-16 10:07:11', ' [ INSERT 2023-07-16 10:07:11 ], [ idUser 2 ] ', 1),
(159, 0, 2, 25, '2023-07-16 10:07:27', 'Hola', NULL, 1, '2023-07-16 10:07:27', '2023-07-16 10:07:27', ' [ INSERT 2023-07-16 10:07:27 ], [ idUser 2 ] ', 1),
(160, 0, 37, 5, '2023-07-17 04:52:58', 'sd', NULL, 1, '2023-07-17 04:52:58', '2023-07-17 04:52:58', ' [ INSERT 2023-07-17 04:52:58 ], [ idUser 37 ] ', 1),
(161, 0, 37, 1, '2023-07-17 05:02:22', 'sdf', NULL, 1, '2023-07-17 05:02:22', '2023-07-17 05:02:22', ' [ INSERT 2023-07-17 05:02:22 ], [ idUser 37 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queuseNotificaciones`
--

CREATE TABLE `queuseNotificaciones` (
  `idQNotificacion` int(11) NOT NULL,
  `idUsuarioEmisor` int(11) NOT NULL,
  `idUsuarioReceptor` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `mensaje` text NOT NULL,
  `archivoAdjunto` text,
  `visto` int(11) DEFAULT '1',
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `queuseNotificaciones`
--

INSERT INTO `queuseNotificaciones` (`idQNotificacion`, `idUsuarioEmisor`, `idUsuarioReceptor`, `fecha`, `mensaje`, `archivoAdjunto`, `visto`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 1, 2, '2023-02-13 04:03:31', 'Advanced Micro Devices, Inc. es una compañía estadounidense de semiconductores con sede en Santa Clara, California, que desarrolla procesadores de computación y productos tecnológicos similares de consumo.', '', 0, '2023-02-13 04:03:31', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(2, 1, 2, '2023-06-29 03:22:45', '', NULL, 0, '2023-06-29 03:22:45', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(3, 1, 2, '2023-06-29 03:27:41', 'asdf', NULL, 0, '2023-06-29 03:27:41', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(4, 1, 2, '2023-06-29 03:49:36', 'asd', NULL, 0, '2023-06-29 03:49:36', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(5, 1, 2, '2023-06-29 04:09:52', 'asd', NULL, 0, '2023-06-29 04:09:52', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(6, 1, 2, '2023-06-29 04:10:21', 'asd', NULL, 0, '2023-06-29 04:10:21', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(7, 2, 1, '2023-06-29 04:16:54', 'er', NULL, 0, '2023-06-29 04:16:54', '2023-07-20 01:04:53', ' [ UPDATE 2023-07-20 01:04:53 ], [ idUser 1 ] ', 1),
(8, 2, 1, '2023-06-28 10:03:10', 'sdfasdf', NULL, 0, '2023-06-28 10:03:10', '2023-07-20 01:04:53', ' [ UPDATE 2023-07-20 01:04:53 ], [ idUser 1 ] ', 1),
(9, 1, 2, '2023-07-03 10:06:03', 'hi', NULL, 0, '2023-07-03 10:06:03', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(10, 1, 37, '2023-07-04 02:34:52', 'Hola Prueba 1', NULL, 0, '2023-07-04 02:34:52', '2023-07-18 05:13:14', ' [ UPDATE 2023-07-18 05:13:14 ], [ idUser 37 ] ', 1),
(11, 1, 37, '2023-07-04 02:35:01', 'hhola', NULL, 0, '2023-07-04 02:35:01', '2023-07-18 05:13:14', ' [ UPDATE 2023-07-18 05:13:14 ], [ idUser 37 ] ', 1),
(12, 2, 12, '2023-07-04 07:45:13', 'fuvk you', NULL, 1, '2023-07-04 07:45:13', '2023-07-04 07:45:13', ' [ INSERT 2023-07-04 07:45:13 ], [ idUser 2 ] ', 1),
(13, 1, 2, '2023-07-04 11:22:49', 'Hola', NULL, 0, '2023-07-04 11:22:49', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(14, 1, 2, '2023-07-05 06:58:30', 'Pruba', NULL, 0, '2023-07-05 06:58:30', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(15, 1, 2, '2023-07-05 07:00:19', 'Prueba 2', NULL, 0, '2023-07-05 07:00:19', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(16, 1, 2, '2023-07-05 07:00:48', 'Hola bbbroo', NULL, 0, '2023-07-05 07:00:48', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(17, 1, 2, '2023-07-05 07:01:52', 'hola broo 2', NULL, 0, '2023-07-05 07:01:52', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(18, 1, 103, '2023-07-12 02:19:05', 'fsafsa', NULL, 1, '2023-07-12 02:19:05', '2023-07-12 02:19:05', ' [ INSERT 2023-07-12 02:19:05 ], [ idUser 1 ] ', 1),
(19, 1, 2, '2023-07-16 05:36:37', 'Hola', NULL, 0, '2023-07-16 05:36:37', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(20, 1, 2, '2023-07-16 09:04:44', 'Hola', NULL, 0, '2023-07-16 09:04:44', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1),
(21, 1, 2, '2023-07-16 09:07:47', 'hola', NULL, 0, '2023-07-16 09:07:47', '2023-07-19 11:56:18', ' [ UPDATE 2023-07-19 11:56:18 ], [ idUser 2 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `idRuta` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientoxvisita`
--

CREATE TABLE `seguimientoxvisita` (
  `idSxV` int(11) NOT NULL,
  `idVisita` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `lat` text,
  `lng` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguimientoxvisita`
--

INSERT INTO `seguimientoxvisita` (`idSxV`, `idVisita`, `fecha`, `lat`, `lng`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 214, '2023-06-01 09:56:49', '20.709376', '-103.4092544', '2023-06-01 09:56:49', '2023-06-01 09:56:49', ' [ INSERT 2023-06-01 09:56:49 ], [ idUser 37 ] ', 1),
(2, 214, '2023-06-01 09:57:05', '20.709376', '-103.4092544', '2023-06-01 09:57:05', '2023-06-01 09:57:05', ' [ INSERT 2023-06-01 09:57:05 ], [ idUser 37 ] ', 1),
(3, 214, '2023-06-01 09:57:15', '20.709376', '-103.4092544', '2023-06-01 09:57:15', '2023-06-01 09:57:15', ' [ INSERT 2023-06-01 09:57:15 ], [ idUser 37 ] ', 1),
(4, 214, '2023-06-01 09:57:25', '20.709376', '-103.4092544', '2023-06-01 09:57:25', '2023-06-01 09:57:25', ' [ INSERT 2023-06-01 09:57:25 ], [ idUser 37 ] ', 1),
(5, 214, '2023-06-01 09:57:35', '20.709376', '-103.4092544', '2023-06-01 09:57:35', '2023-06-01 09:57:35', ' [ INSERT 2023-06-01 09:57:35 ], [ idUser 37 ] ', 1),
(6, 214, '2023-06-01 09:57:48', '20.709376', '-103.4092544', '2023-06-01 09:57:48', '2023-06-01 09:57:48', ' [ INSERT 2023-06-01 09:57:48 ], [ idUser 37 ] ', 1),
(7, 214, '2023-06-01 10:04:55', '20.6526813', '-103.4529517', '2023-06-01 10:04:55', '2023-06-01 10:04:55', ' [ INSERT 2023-06-01 10:04:55 ], [ idUser 37 ] ', 1),
(8, 214, '2023-06-01 10:07:02', '20.709376', '-103.4092544', '2023-06-01 10:07:02', '2023-06-01 10:07:02', ' [ INSERT 2023-06-01 10:07:02 ], [ idUser 37 ] ', 1),
(9, 214, '2023-06-01 10:09:03', '20.709376', '-103.4092544', '2023-06-01 10:09:03', '2023-06-01 10:09:03', ' [ INSERT 2023-06-01 10:09:03 ], [ idUser 37 ] ', 1),
(10, 214, '2023-06-01 10:09:57', '20.652681', '-103.4529431', '2023-06-01 10:09:57', '2023-06-01 10:09:57', ' [ INSERT 2023-06-01 10:09:57 ], [ idUser 37 ] ', 1),
(11, 214, '2023-06-01 10:11:03', '20.709376', '-103.4092544', '2023-06-01 10:11:03', '2023-06-01 10:11:03', ' [ INSERT 2023-06-01 10:11:03 ], [ idUser 37 ] ', 1),
(12, 214, '2023-06-01 10:15:37', '20.709376', '-103.4092544', '2023-06-01 10:15:37', '2023-06-01 10:15:37', ' [ INSERT 2023-06-01 10:15:37 ], [ idUser 37 ] ', 1),
(13, 214, '2023-06-01 10:17:37', '20.709376', '-103.4092544', '2023-06-01 10:17:37', '2023-06-01 10:17:37', ' [ INSERT 2023-06-01 10:17:37 ], [ idUser 37 ] ', 1),
(14, 214, '2023-06-01 10:21:16', '20.709376', '-103.4092544', '2023-06-01 10:21:16', '2023-06-01 10:21:16', ' [ INSERT 2023-06-01 10:21:16 ], [ idUser 37 ] ', 1),
(15, 214, '2023-06-01 10:26:18', '20.709376', '-103.4092544', '2023-06-01 10:26:18', '2023-06-01 10:26:18', ' [ INSERT 2023-06-01 10:26:18 ], [ idUser 37 ] ', 1),
(16, 214, '2023-06-02 07:19:14', '20.709376', '-103.4092544', '2023-06-02 07:19:14', '2023-06-02 07:19:14', ' [ INSERT 2023-06-02 07:19:14 ], [ idUser 37 ] ', 1),
(17, 214, '2023-06-02 07:24:23', '20.709376', '-103.4092544', '2023-06-02 07:24:23', '2023-06-02 07:24:23', ' [ INSERT 2023-06-02 07:24:23 ], [ idUser 37 ] ', 1),
(18, 214, '2023-06-02 07:25:13', '20.709376', '-103.4092544', '2023-06-02 07:25:13', '2023-06-02 07:25:13', ' [ INSERT 2023-06-02 07:25:13 ], [ idUser 37 ] ', 1),
(19, 214, '2023-06-02 07:27:13', '20.709376', '-103.4092544', '2023-06-02 07:27:13', '2023-06-02 07:27:13', ' [ INSERT 2023-06-02 07:27:13 ], [ idUser 37 ] ', 1),
(20, 216, '2023-06-02 07:48:05', '20.709376', '-103.4092544', '2023-06-02 07:48:05', '2023-06-02 07:48:05', ' [ INSERT 2023-06-02 07:48:05 ], [ idUser 37 ] ', 1),
(21, 216, '2023-06-02 07:50:05', '20.709376', '-103.4092544', '2023-06-02 07:50:05', '2023-06-02 07:50:05', ' [ INSERT 2023-06-02 07:50:05 ], [ idUser 37 ] ', 1),
(22, 216, '2023-06-02 07:52:06', '20.709376', '-103.4092544', '2023-06-02 07:52:06', '2023-06-02 07:52:06', ' [ INSERT 2023-06-02 07:52:06 ], [ idUser 37 ] ', 1),
(23, 216, '2023-06-02 07:54:35', '20.709376', '-103.4092544', '2023-06-02 07:54:35', '2023-06-02 07:54:35', ' [ INSERT 2023-06-02 07:54:35 ], [ idUser 37 ] ', 1),
(24, 216, '2023-06-02 07:56:35', '20.709376', '-103.4092544', '2023-06-02 07:56:35', '2023-06-02 07:56:35', ' [ INSERT 2023-06-02 07:56:35 ], [ idUser 37 ] ', 1),
(25, 216, '2023-06-02 07:58:36', '20.709376', '-103.4092544', '2023-06-02 07:58:36', '2023-06-02 07:58:36', ' [ INSERT 2023-06-02 07:58:36 ], [ idUser 37 ] ', 1),
(26, 216, '2023-06-02 08:00:35', '20.709376', '-103.4092544', '2023-06-02 08:00:35', '2023-06-02 08:00:35', ' [ INSERT 2023-06-02 08:00:35 ], [ idUser 37 ] ', 1),
(27, 216, '2023-06-02 08:02:35', '20.709376', '-103.4092544', '2023-06-02 08:02:35', '2023-06-02 08:02:35', ' [ INSERT 2023-06-02 08:02:35 ], [ idUser 37 ] ', 1),
(28, 216, '2023-06-02 08:04:35', '20.709376', '-103.4092544', '2023-06-02 08:04:35', '2023-06-02 08:04:35', ' [ INSERT 2023-06-02 08:04:35 ], [ idUser 37 ] ', 1),
(29, 216, '2023-06-02 08:06:35', '20.709376', '-103.4092544', '2023-06-02 08:06:35', '2023-06-02 08:06:35', ' [ INSERT 2023-06-02 08:06:35 ], [ idUser 37 ] ', 1),
(30, 216, '2023-06-02 08:08:05', '20.709376', '-103.4092544', '2023-06-02 08:08:05', '2023-06-02 08:08:05', ' [ INSERT 2023-06-02 08:08:05 ], [ idUser 37 ] ', 1),
(31, 216, '2023-06-02 08:10:06', '20.709376', '-103.4092544', '2023-06-02 08:10:06', '2023-06-02 08:10:06', ' [ INSERT 2023-06-02 08:10:06 ], [ idUser 37 ] ', 1),
(32, 216, '2023-06-02 08:12:35', '20.709376', '-103.4092544', '2023-06-02 08:12:35', '2023-06-02 08:12:35', ' [ INSERT 2023-06-02 08:12:35 ], [ idUser 37 ] ', 1),
(33, 216, '2023-06-02 08:14:35', '20.709376', '-103.4092544', '2023-06-02 08:14:35', '2023-06-02 08:14:35', ' [ INSERT 2023-06-02 08:14:35 ], [ idUser 37 ] ', 1),
(34, 216, '2023-06-02 08:16:35', '20.709376', '-103.4092544', '2023-06-02 08:16:35', '2023-06-02 08:16:35', ' [ INSERT 2023-06-02 08:16:35 ], [ idUser 37 ] ', 1),
(35, 216, '2023-06-02 08:18:35', '20.709376', '-103.4092544', '2023-06-02 08:18:35', '2023-06-02 08:18:35', ' [ INSERT 2023-06-02 08:18:35 ], [ idUser 37 ] ', 1),
(36, 216, '2023-06-02 08:20:35', '20.709376', '-103.4092544', '2023-06-02 08:20:35', '2023-06-02 08:20:35', ' [ INSERT 2023-06-02 08:20:35 ], [ idUser 37 ] ', 1),
(37, 216, '2023-06-02 08:22:35', '20.709376', '-103.4092544', '2023-06-02 08:22:35', '2023-06-02 08:22:35', ' [ INSERT 2023-06-02 08:22:35 ], [ idUser 37 ] ', 1),
(38, 216, '2023-06-02 08:24:35', '20.709376', '-103.4092544', '2023-06-02 08:24:35', '2023-06-02 08:24:35', ' [ INSERT 2023-06-02 08:24:35 ], [ idUser 37 ] ', 1),
(39, 216, '2023-06-02 08:26:35', '20.709376', '-103.4092544', '2023-06-02 08:26:35', '2023-06-02 08:26:35', ' [ INSERT 2023-06-02 08:26:35 ], [ idUser 37 ] ', 1),
(40, 216, '2023-06-02 08:28:35', '20.709376', '-103.4092544', '2023-06-02 08:28:35', '2023-06-02 08:28:35', ' [ INSERT 2023-06-02 08:28:35 ], [ idUser 37 ] ', 1),
(41, 216, '2023-06-02 08:30:35', '20.709376', '-103.4092544', '2023-06-02 08:30:35', '2023-06-02 08:30:35', ' [ INSERT 2023-06-02 08:30:35 ], [ idUser 37 ] ', 1),
(42, 216, '2023-06-02 08:32:35', '20.709376', '-103.4092544', '2023-06-02 08:32:35', '2023-06-02 08:32:35', ' [ INSERT 2023-06-02 08:32:35 ], [ idUser 37 ] ', 1),
(43, 216, '2023-06-02 08:34:35', '20.709376', '-103.4092544', '2023-06-02 08:34:35', '2023-06-02 08:34:35', ' [ INSERT 2023-06-02 08:34:35 ], [ idUser 37 ] ', 1),
(44, 216, '2023-06-02 08:36:35', '20.709376', '-103.4092544', '2023-06-02 08:36:35', '2023-06-02 08:36:35', ' [ INSERT 2023-06-02 08:36:35 ], [ idUser 37 ] ', 1),
(45, 216, '2023-06-02 08:38:35', '20.709376', '-103.4092544', '2023-06-02 08:38:35', '2023-06-02 08:38:35', ' [ INSERT 2023-06-02 08:38:35 ], [ idUser 37 ] ', 1),
(46, 216, '2023-06-02 08:40:35', '20.709376', '-103.4092544', '2023-06-02 08:40:35', '2023-06-02 08:40:35', ' [ INSERT 2023-06-02 08:40:35 ], [ idUser 37 ] ', 1),
(47, 216, '2023-06-02 08:42:35', '20.709376', '-103.4092544', '2023-06-02 08:42:35', '2023-06-02 08:42:35', ' [ INSERT 2023-06-02 08:42:35 ], [ idUser 37 ] ', 1),
(48, 216, '2023-06-02 08:44:35', '20.709376', '-103.4092544', '2023-06-02 08:44:35', '2023-06-02 08:44:35', ' [ INSERT 2023-06-02 08:44:35 ], [ idUser 37 ] ', 1),
(49, 216, '2023-06-02 08:46:35', '20.709376', '-103.4092544', '2023-06-02 08:46:35', '2023-06-02 08:46:35', ' [ INSERT 2023-06-02 08:46:35 ], [ idUser 37 ] ', 1),
(50, 216, '2023-06-02 08:48:35', '20.709376', '-103.4092544', '2023-06-02 08:48:35', '2023-06-02 08:48:35', ' [ INSERT 2023-06-02 08:48:35 ], [ idUser 37 ] ', 1),
(51, 216, '2023-06-02 08:50:35', '20.709376', '-103.4092544', '2023-06-02 08:50:35', '2023-06-02 08:50:35', ' [ INSERT 2023-06-02 08:50:35 ], [ idUser 37 ] ', 1),
(52, 216, '2023-06-02 08:52:35', '20.709376', '-103.4092544', '2023-06-02 08:52:35', '2023-06-02 08:52:35', ' [ INSERT 2023-06-02 08:52:35 ], [ idUser 37 ] ', 1),
(53, 216, '2023-06-02 08:54:35', '20.709376', '-103.4092544', '2023-06-02 08:54:35', '2023-06-02 08:54:35', ' [ INSERT 2023-06-02 08:54:35 ], [ idUser 37 ] ', 1),
(54, 216, '2023-06-02 08:56:35', '20.709376', '-103.4092544', '2023-06-02 08:56:35', '2023-06-02 08:56:35', ' [ INSERT 2023-06-02 08:56:35 ], [ idUser 37 ] ', 1),
(55, 216, '2023-06-02 08:58:35', '20.709376', '-103.4092544', '2023-06-02 08:58:35', '2023-06-02 08:58:35', ' [ INSERT 2023-06-02 08:58:35 ], [ idUser 37 ] ', 1),
(56, 216, '2023-06-02 09:00:35', '20.709376', '-103.4092544', '2023-06-02 09:00:35', '2023-06-02 09:00:35', ' [ INSERT 2023-06-02 09:00:35 ], [ idUser 37 ] ', 1),
(57, 216, '2023-06-02 09:02:35', '20.709376', '-103.4092544', '2023-06-02 09:02:35', '2023-06-02 09:02:35', ' [ INSERT 2023-06-02 09:02:35 ], [ idUser 37 ] ', 1),
(58, 216, '2023-06-02 09:04:35', '20.709376', '-103.4092544', '2023-06-02 09:04:35', '2023-06-02 09:04:35', ' [ INSERT 2023-06-02 09:04:35 ], [ idUser 37 ] ', 1),
(59, 216, '2023-06-02 09:06:35', '20.709376', '-103.4092544', '2023-06-02 09:06:35', '2023-06-02 09:06:35', ' [ INSERT 2023-06-02 09:06:35 ], [ idUser 37 ] ', 1),
(60, 216, '2023-06-02 09:08:35', '20.709376', '-103.4092544', '2023-06-02 09:08:35', '2023-06-02 09:08:35', ' [ INSERT 2023-06-02 09:08:35 ], [ idUser 37 ] ', 1),
(61, 216, '2023-06-02 09:10:35', '20.709376', '-103.4092544', '2023-06-02 09:10:35', '2023-06-02 09:10:35', ' [ INSERT 2023-06-02 09:10:35 ], [ idUser 37 ] ', 1),
(62, 216, '2023-06-02 09:12:35', '20.709376', '-103.4092544', '2023-06-02 09:12:35', '2023-06-02 09:12:35', ' [ INSERT 2023-06-02 09:12:35 ], [ idUser 37 ] ', 1),
(63, 216, '2023-06-02 09:14:35', '20.709376', '-103.4092544', '2023-06-02 09:14:35', '2023-06-02 09:14:35', ' [ INSERT 2023-06-02 09:14:35 ], [ idUser 37 ] ', 1),
(64, 216, '2023-06-02 09:16:35', '20.709376', '-103.4092544', '2023-06-02 09:16:35', '2023-06-02 09:16:35', ' [ INSERT 2023-06-02 09:16:35 ], [ idUser 37 ] ', 1),
(65, 216, '2023-06-02 09:18:35', '20.709376', '-103.4092544', '2023-06-02 09:18:35', '2023-06-02 09:18:35', ' [ INSERT 2023-06-02 09:18:35 ], [ idUser 37 ] ', 1),
(66, 216, '2023-06-02 09:20:35', '20.709376', '-103.4092544', '2023-06-02 09:20:35', '2023-06-02 09:20:35', ' [ INSERT 2023-06-02 09:20:35 ], [ idUser 37 ] ', 1),
(67, 216, '2023-06-02 09:22:35', '20.709376', '-103.4092544', '2023-06-02 09:22:35', '2023-06-02 09:22:35', ' [ INSERT 2023-06-02 09:22:35 ], [ idUser 37 ] ', 1),
(68, 216, '2023-06-02 09:24:35', '20.709376', '-103.4092544', '2023-06-02 09:24:35', '2023-06-02 09:24:35', ' [ INSERT 2023-06-02 09:24:35 ], [ idUser 37 ] ', 1),
(69, 216, '2023-06-02 09:26:35', '20.709376', '-103.4092544', '2023-06-02 09:26:35', '2023-06-02 09:26:35', ' [ INSERT 2023-06-02 09:26:35 ], [ idUser 37 ] ', 1),
(70, 216, '2023-06-02 09:28:35', '20.709376', '-103.4092544', '2023-06-02 09:28:35', '2023-06-02 09:28:35', ' [ INSERT 2023-06-02 09:28:35 ], [ idUser 37 ] ', 1),
(71, 216, '2023-06-02 09:30:35', '20.709376', '-103.4092544', '2023-06-02 09:30:35', '2023-06-02 09:30:35', ' [ INSERT 2023-06-02 09:30:35 ], [ idUser 37 ] ', 1),
(72, 216, '2023-06-02 09:32:35', '20.709376', '-103.4092544', '2023-06-02 09:32:35', '2023-06-02 09:32:35', ' [ INSERT 2023-06-02 09:32:35 ], [ idUser 37 ] ', 1),
(73, 216, '2023-06-02 11:57:33', '20.6544852', '-103.4527061', '2023-06-02 11:57:33', '2023-06-02 11:57:33', ' [ INSERT 2023-06-02 11:57:33 ], [ idUser 37 ] ', 1),
(74, 216, '2023-06-02 12:08:49', '20.6564386', '-103.4524187', '2023-06-02 12:08:49', '2023-06-02 12:08:49', ' [ INSERT 2023-06-02 12:08:49 ], [ idUser 37 ] ', 1),
(75, 216, '2023-06-02 01:13:12', '20.6636072', '-103.401832', '2023-06-02 01:13:12', '2023-06-02 01:13:12', ' [ INSERT 2023-06-02 01:13:12 ], [ idUser 37 ] ', 1),
(76, 216, '2023-06-02 01:15:30', '20.6638954', '-103.4017235', '2023-06-02 01:15:30', '2023-06-02 01:15:30', ' [ INSERT 2023-06-02 01:15:30 ], [ idUser 37 ] ', 1),
(77, 216, '2023-06-02 01:19:07', '20.6633403', '-103.4019593', '2023-06-02 01:19:07', '2023-06-02 01:19:07', ' [ INSERT 2023-06-02 01:19:07 ], [ idUser 37 ] ', 1),
(78, 216, '2023-06-02 01:40:05', '20.6633694', '-103.401922', '2023-06-02 01:40:05', '2023-06-02 01:40:05', ' [ INSERT 2023-06-02 01:40:05 ], [ idUser 37 ] ', 1),
(79, 216, '2023-06-02 01:50:44', '20.6659521', '-103.4034832', '2023-06-02 01:50:44', '2023-06-02 01:50:44', ' [ INSERT 2023-06-02 01:50:44 ], [ idUser 37 ] ', 1),
(80, 216, '2023-06-02 02:25:49', '20.664843', '-103.4117261', '2023-06-02 02:25:49', '2023-06-02 02:25:49', ' [ INSERT 2023-06-02 02:25:49 ], [ idUser 37 ] ', 1),
(81, 216, '2023-06-02 02:29:31', '20.6638227', '-103.4152021', '2023-06-02 02:29:31', '2023-06-02 02:29:31', ' [ INSERT 2023-06-02 02:29:31 ], [ idUser 37 ] ', 1),
(82, 216, '2023-06-02 02:31:31', '20.6634898', '-103.416242', '2023-06-02 02:31:31', '2023-06-02 02:31:31', ' [ INSERT 2023-06-02 02:31:31 ], [ idUser 37 ] ', 1),
(83, 216, '2023-06-02 02:33:31', '20.6629361', '-103.4180197', '2023-06-02 02:33:31', '2023-06-02 02:33:31', ' [ INSERT 2023-06-02 02:33:31 ], [ idUser 37 ] ', 1),
(84, 216, '2023-06-02 02:35:33', '20.6627316', '-103.4197221', '2023-06-02 02:35:33', '2023-06-02 02:35:33', ' [ INSERT 2023-06-02 02:35:33 ], [ idUser 37 ] ', 1),
(85, 216, '2023-06-02 02:37:33', '20.6625791', '-103.4212988', '2023-06-02 02:37:33', '2023-06-02 02:37:33', ' [ INSERT 2023-06-02 02:37:33 ], [ idUser 37 ] ', 1),
(86, 216, '2023-06-02 02:39:32', '20.6622771', '-103.4226755', '2023-06-02 02:39:32', '2023-06-02 02:39:32', ' [ INSERT 2023-06-02 02:39:32 ], [ idUser 37 ] ', 1),
(87, 216, '2023-06-02 02:41:33', '20.6618381', '-103.4242141', '2023-06-02 02:41:33', '2023-06-02 02:41:33', ' [ INSERT 2023-06-02 02:41:33 ], [ idUser 37 ] ', 1),
(88, 216, '2023-06-02 02:43:50', '20.6617336', '-103.4259185', '2023-06-02 02:43:50', '2023-06-02 02:43:50', ' [ INSERT 2023-06-02 02:43:50 ], [ idUser 37 ] ', 1),
(89, 216, '2023-06-02 02:45:50', '20.6616158', '-103.4274439', '2023-06-02 02:45:50', '2023-06-02 02:45:50', ' [ INSERT 2023-06-02 02:45:50 ], [ idUser 37 ] ', 1),
(90, 216, '2023-06-02 02:48:00', '20.6612543', '-103.4291619', '2023-06-02 02:48:00', '2023-06-02 02:48:00', ' [ INSERT 2023-06-02 02:48:00 ], [ idUser 37 ] ', 1),
(91, 216, '2023-06-02 02:51:07', '20.6603569', '-103.4309563', '2023-06-02 02:51:07', '2023-06-02 02:51:07', ' [ INSERT 2023-06-02 02:51:07 ], [ idUser 37 ] ', 1),
(92, 216, '2023-06-02 02:53:04', '20.6592273', '-103.4318288', '2023-06-02 02:53:04', '2023-06-02 02:53:04', ' [ INSERT 2023-06-02 02:53:04 ], [ idUser 37 ] ', 1),
(93, 216, '2023-06-02 02:55:05', '20.6584773', '-103.4327395', '2023-06-02 02:55:05', '2023-06-02 02:55:05', ' [ INSERT 2023-06-02 02:55:05 ], [ idUser 37 ] ', 1),
(94, 216, '2023-06-02 02:57:29', '20.658762', '-103.4350678', '2023-06-02 02:57:29', '2023-06-02 02:57:29', ' [ INSERT 2023-06-02 02:57:29 ], [ idUser 37 ] ', 1),
(95, 216, '2023-06-02 02:59:30', '20.658584', '-103.4364056', '2023-06-02 02:59:30', '2023-06-02 02:59:30', ' [ INSERT 2023-06-02 02:59:30 ], [ idUser 37 ] ', 1),
(96, 216, '2023-06-02 03:05:46', '20.6590658', '-103.4393807', '2023-06-02 03:05:46', '2023-06-02 03:05:46', ' [ INSERT 2023-06-02 03:05:46 ], [ idUser 37 ] ', 1),
(97, 216, '2023-06-02 03:16:43', '20.659095', '-103.440743', '2023-06-02 03:16:43', '2023-06-02 03:16:43', ' [ INSERT 2023-06-02 03:16:43 ], [ idUser 37 ] ', 1),
(98, 216, '2023-06-02 03:28:05', '20.6578608', '-103.4488223', '2023-06-02 03:28:05', '2023-06-02 03:28:05', ' [ INSERT 2023-06-02 03:28:05 ], [ idUser 37 ] ', 1),
(99, 216, '2023-06-02 03:36:43', '20.6581367', '-103.450392', '2023-06-02 03:36:43', '2023-06-02 03:36:43', ' [ INSERT 2023-06-02 03:36:43 ], [ idUser 37 ] ', 1),
(100, 216, '2023-06-02 03:38:32', '20.6539927', '-103.4526501', '2023-06-02 03:38:32', '2023-06-02 03:38:32', ' [ INSERT 2023-06-02 03:38:32 ], [ idUser 37 ] ', 1),
(101, 216, '2023-06-02 03:40:32', '20.652722', '-103.4516349', '2023-06-02 03:40:32', '2023-06-02 03:40:32', ' [ INSERT 2023-06-02 03:40:32 ], [ idUser 37 ] ', 1),
(102, 216, '2023-06-02 03:44:03', '20.6526821', '-103.4529505', '2023-06-02 03:44:03', '2023-06-02 03:44:03', ' [ INSERT 2023-06-02 03:44:03 ], [ idUser 37 ] ', 1),
(103, 216, '2023-06-02 03:45:16', '20.6526816', '-103.4529537', '2023-06-02 03:45:16', '2023-06-02 03:45:16', ' [ INSERT 2023-06-02 03:45:16 ], [ idUser 37 ] ', 1),
(104, 217, '2023-06-03 11:39:08', '20.6622199', '-103.4245163', '2023-06-03 11:39:08', '2023-06-03 11:39:08', ' [ INSERT 2023-06-03 11:39:08 ], [ idUser 37 ] ', 1),
(105, 218, '2023-06-03 01:45:38', '20.6750862', '-103.3518914', '2023-06-03 01:45:38', '2023-06-03 01:45:38', ' [ INSERT 2023-06-03 01:45:38 ], [ idUser 37 ] ', 1),
(106, 218, '2023-06-03 01:49:45', '20.6750862', '-103.3518914', '2023-06-03 01:49:45', '2023-06-03 01:49:45', ' [ INSERT 2023-06-03 01:49:45 ], [ idUser 37 ] ', 1),
(107, 219, '2023-06-03 03:57:59', '20.6657749', '-103.4052192', '2023-06-03 03:57:59', '2023-06-03 03:57:59', ' [ INSERT 2023-06-03 03:57:59 ], [ idUser 37 ] ', 1),
(108, 219, '2023-06-03 03:59:58', '20.6655116', '-103.4083299', '2023-06-03 03:59:58', '2023-06-03 03:59:58', ' [ INSERT 2023-06-03 03:59:58 ], [ idUser 37 ] ', 1),
(109, 219, '2023-06-03 04:01:58', '20.6644051', '-103.4117546', '2023-06-03 04:01:58', '2023-06-03 04:01:58', ' [ INSERT 2023-06-03 04:01:58 ], [ idUser 37 ] ', 1),
(110, 219, '2023-06-03 04:03:59', '20.662405', '-103.420449', '2023-06-03 04:03:59', '2023-06-03 04:03:59', ' [ INSERT 2023-06-03 04:03:59 ], [ idUser 37 ] ', 1),
(111, 219, '2023-06-03 04:05:58', '20.6624107', '-103.4221474', '2023-06-03 04:05:58', '2023-06-03 04:05:58', ' [ INSERT 2023-06-03 04:05:58 ], [ idUser 37 ] ', 1),
(112, 219, '2023-06-03 04:07:58', '20.6621668', '-103.4229051', '2023-06-03 04:07:58', '2023-06-03 04:07:58', ' [ INSERT 2023-06-03 04:07:58 ], [ idUser 37 ] ', 1),
(113, 219, '2023-06-03 04:15:03', '20.6617201', '-103.4255611', '2023-06-03 04:15:03', '2023-06-03 04:15:03', ' [ INSERT 2023-06-03 04:15:03 ], [ idUser 37 ] ', 1),
(114, 219, '2023-06-03 04:22:41', '20.6546081', '-103.4535725', '2023-06-03 04:22:41', '2023-06-03 04:22:41', ' [ INSERT 2023-06-03 04:22:41 ], [ idUser 37 ] ', 1),
(115, 219, '2023-06-03 04:27:01', '20.6526823', '-103.4529541', '2023-06-03 04:27:01', '2023-06-03 04:27:01', ' [ INSERT 2023-06-03 04:27:01 ], [ idUser 37 ] ', 1),
(116, 219, '2023-06-03 06:55:05', '20.6526827', '-103.4529535', '2023-06-03 06:55:05', '2023-06-03 06:55:05', ' [ INSERT 2023-06-03 06:55:05 ], [ idUser 37 ] ', 1),
(117, 219, '2023-06-06 10:09:02', '20.6526818', '-103.4529259', '2023-06-06 10:09:02', '2023-06-06 10:09:02', ' [ INSERT 2023-06-06 10:09:02 ], [ idUser 37 ] ', 1),
(118, 219, '2023-06-06 10:15:32', '20.6526818', '-103.4529259', '2023-06-06 10:15:32', '2023-06-06 10:15:32', ' [ INSERT 2023-06-06 10:15:32 ], [ idUser 37 ] ', 1),
(119, 219, '2023-06-06 10:21:47', '20.6526728', '-103.4529503', '2023-06-06 10:21:47', '2023-06-06 10:21:47', ' [ INSERT 2023-06-06 10:21:47 ], [ idUser 37 ] ', 1),
(120, 220, '2023-06-06 10:34:05', '20.6526842', '-103.4529394', '2023-06-06 10:34:05', '2023-06-06 10:34:05', ' [ INSERT 2023-06-06 10:34:05 ], [ idUser 37 ] ', 1),
(121, 220, '2023-06-06 10:36:05', '20.6526842', '-103.4529394', '2023-06-06 10:36:05', '2023-06-06 10:36:05', ' [ INSERT 2023-06-06 10:36:05 ], [ idUser 37 ] ', 1),
(122, 221, '2023-06-06 10:37:48', '20.6526737', '-103.4529509', '2023-06-06 10:37:48', '2023-06-06 10:37:48', ' [ INSERT 2023-06-06 10:37:48 ], [ idUser 37 ] ', 1),
(123, 221, '2023-06-06 10:42:00', '20.6526737', '-103.4529509', '2023-06-06 10:42:00', '2023-06-06 10:42:00', ' [ INSERT 2023-06-06 10:42:00 ], [ idUser 37 ] ', 1),
(124, 222, '2023-06-06 10:59:31', '20.6881833', '-103.2910603', '2023-06-06 10:59:31', '2023-06-06 10:59:31', ' [ INSERT 2023-06-06 10:59:31 ], [ idUser 37 ] ', 1),
(125, 222, '2023-06-06 12:26:50', '20.6526829', '-103.4529417', '2023-06-06 12:26:50', '2023-06-06 12:26:50', ' [ INSERT 2023-06-06 12:26:50 ], [ idUser 37 ] ', 1),
(126, 222, '2023-06-06 03:26:33', '20.6471168', '-103.4584064', '2023-06-06 03:26:33', '2023-06-06 03:26:33', ' [ INSERT 2023-06-06 03:26:33 ], [ idUser 37 ] ', 1),
(127, 222, '2023-06-06 03:28:33', '20.6471168', '-103.4584064', '2023-06-06 03:28:33', '2023-06-06 03:28:33', ' [ INSERT 2023-06-06 03:28:33 ], [ idUser 37 ] ', 1),
(128, 222, '2023-06-06 03:30:32', '20.6471168', '-103.4584064', '2023-06-06 03:30:32', '2023-06-06 03:30:32', ' [ INSERT 2023-06-06 03:30:32 ], [ idUser 37 ] ', 1),
(129, 222, '2023-06-06 03:34:34', '20.6471168', '-103.4584064', '2023-06-06 03:34:34', '2023-06-06 03:34:34', ' [ INSERT 2023-06-06 03:34:34 ], [ idUser 37 ] ', 1),
(130, 222, '2023-06-06 03:36:34', '20.6471168', '-103.4584064', '2023-06-06 03:36:34', '2023-06-06 03:36:34', ' [ INSERT 2023-06-06 03:36:34 ], [ idUser 37 ] ', 1),
(131, 222, '2023-06-06 03:40:23', '20.6471168', '-103.4584064', '2023-06-06 03:40:23', '2023-06-06 03:40:23', ' [ INSERT 2023-06-06 03:40:23 ], [ idUser 37 ] ', 1),
(132, 222, '2023-06-06 03:42:23', '20.6471168', '-103.4584064', '2023-06-06 03:42:23', '2023-06-06 03:42:23', ' [ INSERT 2023-06-06 03:42:23 ], [ idUser 37 ] ', 1),
(133, 222, '2023-06-06 03:44:23', '20.6471168', '-103.4584064', '2023-06-06 03:44:23', '2023-06-06 03:44:23', ' [ INSERT 2023-06-06 03:44:23 ], [ idUser 37 ] ', 1),
(134, 222, '2023-06-06 03:46:44', '20.6471168', '-103.4584064', '2023-06-06 03:46:44', '2023-06-06 03:46:44', ' [ INSERT 2023-06-06 03:46:44 ], [ idUser 37 ] ', 1),
(135, 222, '2023-06-06 03:48:44', '20.6471168', '-103.4584064', '2023-06-06 03:48:44', '2023-06-06 03:48:44', ' [ INSERT 2023-06-06 03:48:44 ], [ idUser 37 ] ', 1),
(136, 222, '2023-06-06 03:50:23', '20.6471168', '-103.4584064', '2023-06-06 03:50:23', '2023-06-06 03:50:23', ' [ INSERT 2023-06-06 03:50:23 ], [ idUser 37 ] ', 1),
(137, 222, '2023-06-06 03:52:44', '20.6471168', '-103.4584064', '2023-06-06 03:52:44', '2023-06-06 03:52:44', ' [ INSERT 2023-06-06 03:52:44 ], [ idUser 37 ] ', 1),
(138, 222, '2023-06-06 03:54:23', '20.6471168', '-103.4584064', '2023-06-06 03:54:23', '2023-06-06 03:54:23', ' [ INSERT 2023-06-06 03:54:23 ], [ idUser 37 ] ', 1),
(139, 222, '2023-06-06 03:56:44', '20.6471168', '-103.4584064', '2023-06-06 03:56:44', '2023-06-06 03:56:44', ' [ INSERT 2023-06-06 03:56:44 ], [ idUser 37 ] ', 1),
(140, 222, '2023-06-06 03:58:44', '20.6471168', '-103.4584064', '2023-06-06 03:58:44', '2023-06-06 03:58:44', ' [ INSERT 2023-06-06 03:58:44 ], [ idUser 37 ] ', 1),
(141, 222, '2023-06-06 04:00:44', '20.6471168', '-103.4584064', '2023-06-06 04:00:44', '2023-06-06 04:00:44', ' [ INSERT 2023-06-06 04:00:44 ], [ idUser 37 ] ', 1),
(142, 222, '2023-06-06 04:02:44', '20.6471168', '-103.4584064', '2023-06-06 04:02:44', '2023-06-06 04:02:44', ' [ INSERT 2023-06-06 04:02:44 ], [ idUser 37 ] ', 1),
(143, 222, '2023-06-06 04:04:44', '20.6471168', '-103.4584064', '2023-06-06 04:04:44', '2023-06-06 04:04:44', ' [ INSERT 2023-06-06 04:04:44 ], [ idUser 37 ] ', 1),
(144, 222, '2023-06-06 04:06:44', '20.6471168', '-103.4584064', '2023-06-06 04:06:44', '2023-06-06 04:06:44', ' [ INSERT 2023-06-06 04:06:44 ], [ idUser 37 ] ', 1),
(145, 222, '2023-06-06 04:08:44', '20.6471168', '-103.4584064', '2023-06-06 04:08:44', '2023-06-06 04:08:44', ' [ INSERT 2023-06-06 04:08:44 ], [ idUser 37 ] ', 1),
(146, 222, '2023-06-06 04:10:44', '20.6471168', '-103.4584064', '2023-06-06 04:10:44', '2023-06-06 04:10:44', ' [ INSERT 2023-06-06 04:10:44 ], [ idUser 37 ] ', 1),
(147, 222, '2023-06-06 04:12:44', '20.6471168', '-103.4584064', '2023-06-06 04:12:44', '2023-06-06 04:12:44', ' [ INSERT 2023-06-06 04:12:44 ], [ idUser 37 ] ', 1),
(148, 223, '2023-06-06 04:47:37', '20.6471168', '-103.4584064', '2023-06-06 04:47:37', '2023-06-06 04:47:37', ' [ INSERT 2023-06-06 04:47:37 ], [ idUser 57 ] ', 1),
(149, 231, '2023-06-06 08:17:04', '20.6471168', '-103.4584064', '2023-06-06 08:17:04', '2023-06-06 08:17:04', ' [ INSERT 2023-06-06 08:17:04 ], [ idUser 57 ] ', 1),
(150, 231, '2023-06-06 08:24:49', '20.6471168', '-103.4584064', '2023-06-06 08:24:49', '2023-06-06 08:24:49', ' [ INSERT 2023-06-06 08:24:49 ], [ idUser 57 ] ', 1),
(151, 234, '2023-06-07 07:55:17', '20.6526732', '-103.4529271', '2023-06-07 07:55:17', '2023-06-07 07:55:17', ' [ INSERT 2023-06-07 07:55:17 ], [ idUser 37 ] ', 1),
(152, 234, '2023-06-07 07:57:18', '20.6526732', '-103.4529271', '2023-06-07 07:57:18', '2023-06-07 07:57:18', ' [ INSERT 2023-06-07 07:57:18 ], [ idUser 37 ] ', 1),
(153, 234, '2023-06-07 07:59:17', '20.6526732', '-103.4529271', '2023-06-07 07:59:17', '2023-06-07 07:59:17', ' [ INSERT 2023-06-07 07:59:17 ], [ idUser 37 ] ', 1),
(154, 234, '2023-06-07 08:36:41', '20.6590667', '-103.4448057', '2023-06-07 08:36:41', '2023-06-07 08:36:41', ' [ INSERT 2023-06-07 08:36:41 ], [ idUser 37 ] ', 1),
(155, 234, '2023-06-07 08:39:20', '20.6590765', '-103.44017', '2023-06-07 08:39:20', '2023-06-07 08:39:20', ' [ INSERT 2023-06-07 08:39:20 ], [ idUser 37 ] ', 1),
(156, 234, '2023-06-07 08:41:20', '20.6583743', '-103.4332227', '2023-06-07 08:41:20', '2023-06-07 08:41:20', ' [ INSERT 2023-06-07 08:41:20 ], [ idUser 37 ] ', 1),
(157, 234, '2023-06-07 08:46:36', '20.6621436', '-103.4255022', '2023-06-07 08:46:36', '2023-06-07 08:46:36', ' [ INSERT 2023-06-07 08:46:36 ], [ idUser 37 ] ', 1),
(158, 235, '2023-06-07 09:36:48', '20.6770006', '-103.382005', '2023-06-07 09:36:48', '2023-06-07 09:36:48', ' [ INSERT 2023-06-07 09:36:48 ], [ idUser 37 ] ', 1),
(159, 235, '2023-06-07 10:17:51', '20.6770006', '-103.382005', '2023-06-07 10:17:51', '2023-06-07 10:17:51', ' [ INSERT 2023-06-07 10:17:51 ], [ idUser 37 ] ', 1),
(160, 236, '2023-06-07 10:48:24', '20.6769839', '-103.3820447', '2023-06-07 10:48:24', '2023-06-07 10:48:24', ' [ INSERT 2023-06-07 10:48:24 ], [ idUser 37 ] ', 1),
(161, 236, '2023-06-14 07:27:52', '20.6503936', '-103.4551296', '2023-06-14 07:27:52', '2023-06-14 07:27:52', ' [ INSERT 2023-06-14 07:27:52 ], [ idUser 37 ] ', 1),
(162, 236, '2023-06-14 07:29:52', '20.6503936', '-103.4551296', '2023-06-14 07:29:52', '2023-06-14 07:29:52', ' [ INSERT 2023-06-14 07:29:52 ], [ idUser 37 ] ', 1),
(163, 236, '2023-06-14 07:31:52', '20.6503936', '-103.4551296', '2023-06-14 07:31:52', '2023-06-14 07:31:52', ' [ INSERT 2023-06-14 07:31:52 ], [ idUser 37 ] ', 1),
(164, 236, '2023-06-14 07:34:15', '20.6503936', '-103.4551296', '2023-06-14 07:34:15', '2023-06-14 07:34:15', ' [ INSERT 2023-06-14 07:34:15 ], [ idUser 37 ] ', 1),
(165, 236, '2023-06-14 07:36:15', '20.6503936', '-103.4551296', '2023-06-14 07:36:15', '2023-06-14 07:36:15', ' [ INSERT 2023-06-14 07:36:15 ], [ idUser 37 ] ', 1),
(166, 236, '2023-06-14 07:38:15', '20.6503936', '-103.4551296', '2023-06-14 07:38:15', '2023-06-14 07:38:15', ' [ INSERT 2023-06-14 07:38:15 ], [ idUser 37 ] ', 1),
(167, 236, '2023-06-14 07:40:15', '20.6503936', '-103.4551296', '2023-06-14 07:40:15', '2023-06-14 07:40:15', ' [ INSERT 2023-06-14 07:40:15 ], [ idUser 37 ] ', 1),
(168, 236, '2023-06-14 07:42:15', '20.6503936', '-103.4551296', '2023-06-14 07:42:15', '2023-06-14 07:42:15', ' [ INSERT 2023-06-14 07:42:15 ], [ idUser 37 ] ', 1),
(169, 236, '2023-06-14 07:44:15', '20.6503936', '-103.4551296', '2023-06-14 07:44:15', '2023-06-14 07:44:15', ' [ INSERT 2023-06-14 07:44:15 ], [ idUser 37 ] ', 1),
(170, 236, '2023-06-14 07:46:15', '20.6503936', '-103.4551296', '2023-06-14 07:46:15', '2023-06-14 07:46:15', ' [ INSERT 2023-06-14 07:46:15 ], [ idUser 37 ] ', 1),
(171, 236, '2023-06-14 07:48:15', '20.6503936', '-103.4551296', '2023-06-14 07:48:15', '2023-06-14 07:48:15', ' [ INSERT 2023-06-14 07:48:15 ], [ idUser 37 ] ', 1),
(172, 236, '2023-06-14 07:50:15', '20.6503936', '-103.4551296', '2023-06-14 07:50:15', '2023-06-14 07:50:15', ' [ INSERT 2023-06-14 07:50:15 ], [ idUser 37 ] ', 1),
(173, 236, '2023-06-14 07:52:15', '20.6503936', '-103.4551296', '2023-06-14 07:52:15', '2023-06-14 07:52:15', ' [ INSERT 2023-06-14 07:52:15 ], [ idUser 37 ] ', 1),
(174, 236, '2023-06-14 07:54:15', '20.6503936', '-103.4551296', '2023-06-14 07:54:15', '2023-06-14 07:54:15', ' [ INSERT 2023-06-14 07:54:15 ], [ idUser 37 ] ', 1),
(175, 236, '2023-06-14 07:56:15', '20.6503936', '-103.4551296', '2023-06-14 07:56:15', '2023-06-14 07:56:15', ' [ INSERT 2023-06-14 07:56:15 ], [ idUser 37 ] ', 1),
(176, 236, '2023-06-14 07:58:15', '20.6503936', '-103.4551296', '2023-06-14 07:58:15', '2023-06-14 07:58:15', ' [ INSERT 2023-06-14 07:58:15 ], [ idUser 37 ] ', 1),
(177, 236, '2023-06-14 08:00:15', '20.6503936', '-103.4551296', '2023-06-14 08:00:15', '2023-06-14 08:00:15', ' [ INSERT 2023-06-14 08:00:15 ], [ idUser 37 ] ', 1),
(178, 236, '2023-06-14 08:02:15', '20.6503936', '-103.4551296', '2023-06-14 08:02:15', '2023-06-14 08:02:15', ' [ INSERT 2023-06-14 08:02:15 ], [ idUser 37 ] ', 1),
(179, 236, '2023-06-14 08:04:15', '20.6503936', '-103.4551296', '2023-06-14 08:04:15', '2023-06-14 08:04:15', ' [ INSERT 2023-06-14 08:04:15 ], [ idUser 37 ] ', 1),
(180, 236, '2023-06-14 08:06:15', '20.6503936', '-103.4551296', '2023-06-14 08:06:15', '2023-06-14 08:06:15', ' [ INSERT 2023-06-14 08:06:15 ], [ idUser 37 ] ', 1),
(181, 236, '2023-06-14 08:08:15', '20.6503936', '-103.4551296', '2023-06-14 08:08:15', '2023-06-14 08:08:15', ' [ INSERT 2023-06-14 08:08:15 ], [ idUser 37 ] ', 1),
(182, 236, '2023-06-14 08:10:15', '20.6503936', '-103.4551296', '2023-06-14 08:10:15', '2023-06-14 08:10:15', ' [ INSERT 2023-06-14 08:10:15 ], [ idUser 37 ] ', 1),
(183, 236, '2023-06-14 08:12:15', '20.6503936', '-103.4551296', '2023-06-14 08:12:15', '2023-06-14 08:12:15', ' [ INSERT 2023-06-14 08:12:15 ], [ idUser 37 ] ', 1),
(184, 236, '2023-06-14 08:14:15', '20.6503936', '-103.4551296', '2023-06-14 08:14:15', '2023-06-14 08:14:15', ' [ INSERT 2023-06-14 08:14:15 ], [ idUser 37 ] ', 1),
(185, 236, '2023-06-14 08:16:15', '20.6503936', '-103.4551296', '2023-06-14 08:16:15', '2023-06-14 08:16:15', ' [ INSERT 2023-06-14 08:16:15 ], [ idUser 37 ] ', 1),
(186, 236, '2023-06-14 08:18:15', '20.6503936', '-103.4551296', '2023-06-14 08:18:15', '2023-06-14 08:18:15', ' [ INSERT 2023-06-14 08:18:15 ], [ idUser 37 ] ', 1),
(187, 236, '2023-06-14 08:20:15', '20.6503936', '-103.4551296', '2023-06-14 08:20:15', '2023-06-14 08:20:15', ' [ INSERT 2023-06-14 08:20:15 ], [ idUser 37 ] ', 1),
(188, 236, '2023-06-14 08:22:15', '20.6503936', '-103.4551296', '2023-06-14 08:22:15', '2023-06-14 08:22:15', ' [ INSERT 2023-06-14 08:22:15 ], [ idUser 37 ] ', 1),
(189, 236, '2023-06-14 08:24:15', '20.6503936', '-103.4551296', '2023-06-14 08:24:15', '2023-06-14 08:24:15', ' [ INSERT 2023-06-14 08:24:15 ], [ idUser 37 ] ', 1),
(190, 236, '2023-06-14 08:26:15', '20.6503936', '-103.4551296', '2023-06-14 08:26:15', '2023-06-14 08:26:15', ' [ INSERT 2023-06-14 08:26:15 ], [ idUser 37 ] ', 1),
(191, 236, '2023-06-14 08:28:15', '20.6503936', '-103.4551296', '2023-06-14 08:28:15', '2023-06-14 08:28:15', ' [ INSERT 2023-06-14 08:28:15 ], [ idUser 37 ] ', 1),
(192, 236, '2023-06-14 08:30:15', '20.6503936', '-103.4551296', '2023-06-14 08:30:15', '2023-06-14 08:30:15', ' [ INSERT 2023-06-14 08:30:15 ], [ idUser 37 ] ', 1),
(193, 236, '2023-06-14 08:32:15', '20.6503936', '-103.4551296', '2023-06-14 08:32:15', '2023-06-14 08:32:15', ' [ INSERT 2023-06-14 08:32:15 ], [ idUser 37 ] ', 1),
(194, 236, '2023-06-14 08:34:15', '20.6503936', '-103.4551296', '2023-06-14 08:34:15', '2023-06-14 08:34:15', ' [ INSERT 2023-06-14 08:34:15 ], [ idUser 37 ] ', 1),
(195, 236, '2023-06-14 08:36:15', '20.6503936', '-103.4551296', '2023-06-14 08:36:15', '2023-06-14 08:36:15', ' [ INSERT 2023-06-14 08:36:15 ], [ idUser 37 ] ', 1),
(196, 236, '2023-06-14 08:38:15', '20.6503936', '-103.4551296', '2023-06-14 08:38:15', '2023-06-14 08:38:15', ' [ INSERT 2023-06-14 08:38:15 ], [ idUser 37 ] ', 1),
(197, 236, '2023-06-14 08:40:15', '20.6503936', '-103.4551296', '2023-06-14 08:40:15', '2023-06-14 08:40:15', ' [ INSERT 2023-06-14 08:40:15 ], [ idUser 37 ] ', 1),
(198, 236, '2023-06-14 08:42:15', '20.6503936', '-103.4551296', '2023-06-14 08:42:15', '2023-06-14 08:42:15', ' [ INSERT 2023-06-14 08:42:15 ], [ idUser 37 ] ', 1),
(199, 236, '2023-06-14 08:44:15', '20.6503936', '-103.4551296', '2023-06-14 08:44:15', '2023-06-14 08:44:15', ' [ INSERT 2023-06-14 08:44:15 ], [ idUser 37 ] ', 1),
(200, 236, '2023-06-14 08:46:15', '20.6503936', '-103.4551296', '2023-06-14 08:46:15', '2023-06-14 08:46:15', ' [ INSERT 2023-06-14 08:46:15 ], [ idUser 37 ] ', 1),
(201, 238, '2023-06-20 05:43:00', '20.7074188', '-103.4151198', '2023-06-20 05:43:00', '2023-06-20 05:43:00', ' [ INSERT 2023-06-20 05:43:00 ], [ idUser 37 ] ', 1),
(202, 238, '2023-06-20 05:46:47', '20.7074188', '-103.4151198', '2023-06-20 05:46:47', '2023-06-20 05:46:47', ' [ INSERT 2023-06-20 05:46:47 ], [ idUser 37 ] ', 1),
(203, 238, '2023-06-20 05:49:39', '20.7074188', '-103.4151198', '2023-06-20 05:49:39', '2023-06-20 05:49:39', ' [ INSERT 2023-06-20 05:49:39 ], [ idUser 37 ] ', 1),
(204, 241, '2023-06-27 07:43:06', '20.6526639', '-103.4529464', '2023-06-27 07:43:06', '2023-06-27 07:43:06', ' [ INSERT 2023-06-27 07:43:06 ], [ idUser 37 ] ', 1),
(205, 241, '2023-06-27 07:45:06', '20.6526639', '-103.4529464', '2023-06-27 07:45:06', '2023-06-27 07:45:06', ' [ INSERT 2023-06-27 07:45:06 ], [ idUser 37 ] ', 1),
(206, 241, '2023-07-02 08:03:03', '20.5954628', '-103.4202906', '2023-07-02 08:03:03', '2023-07-02 08:03:03', ' [ INSERT 2023-07-02 08:03:03 ], [ idUser 37 ] ', 1),
(207, 241, '2023-07-02 08:20:50', '20.5954628', '-103.4202906', '2023-07-02 08:20:50', '2023-07-02 08:20:50', ' [ INSERT 2023-07-02 08:20:50 ], [ idUser 37 ] ', 1),
(208, 241, '2023-07-03 07:36:42', '20.6526622', '-103.4529497', '2023-07-03 07:36:42', '2023-07-03 07:36:42', ' [ INSERT 2023-07-03 07:36:42 ], [ idUser 37 ] ', 1),
(209, 241, '2023-07-03 07:37:34', '20.6471168', '-103.4584064', '2023-07-03 07:37:34', '2023-07-03 07:37:34', ' [ INSERT 2023-07-03 07:37:34 ], [ idUser 37 ] ', 1),
(210, 241, '2023-07-03 07:40:08', '20.6471168', '-103.4584064', '2023-07-03 07:40:08', '2023-07-03 07:40:08', ' [ INSERT 2023-07-03 07:40:08 ], [ idUser 37 ] ', 1),
(211, 241, '2023-07-03 07:43:03', '20.6471168', '-103.4584064', '2023-07-03 07:43:03', '2023-07-03 07:43:03', ' [ INSERT 2023-07-03 07:43:03 ], [ idUser 37 ] ', 1),
(212, 241, '2023-07-03 07:44:40', '20.6471168', '-103.4584064', '2023-07-03 07:44:40', '2023-07-03 07:44:40', ' [ INSERT 2023-07-03 07:44:40 ], [ idUser 37 ] ', 1),
(213, 241, '2023-07-03 07:46:43', '20.6526622', '-103.4529497', '2023-07-03 07:46:43', '2023-07-03 07:46:43', ' [ INSERT 2023-07-03 07:46:43 ], [ idUser 37 ] ', 1),
(214, 241, '2023-07-03 07:46:52', '20.6471168', '-103.4584064', '2023-07-03 07:46:52', '2023-07-03 07:46:52', ' [ INSERT 2023-07-03 07:46:52 ], [ idUser 1 ] ', 1),
(215, 241, '2023-07-03 07:48:50', '20.6471168', '-103.4584064', '2023-07-03 07:48:50', '2023-07-03 07:48:50', ' [ INSERT 2023-07-03 07:48:50 ], [ idUser 1 ] ', 1),
(216, 241, '2023-07-03 07:50:50', '20.6471168', '-103.4584064', '2023-07-03 07:50:50', '2023-07-03 07:50:50', ' [ INSERT 2023-07-03 07:50:50 ], [ idUser 1 ] ', 1),
(217, 241, '2023-07-03 07:52:49', '20.6471168', '-103.4584064', '2023-07-03 07:52:49', '2023-07-03 07:52:49', ' [ INSERT 2023-07-03 07:52:49 ], [ idUser 1 ] ', 1),
(218, 241, '2023-07-03 07:54:48', '20.6471168', '-103.4584064', '2023-07-03 07:54:48', '2023-07-03 07:54:48', ' [ INSERT 2023-07-03 07:54:48 ], [ idUser 1 ] ', 1),
(219, 241, '2023-07-03 07:56:47', '20.6471168', '-103.4584064', '2023-07-03 07:56:47', '2023-07-03 07:56:47', ' [ INSERT 2023-07-03 07:56:47 ], [ idUser 1 ] ', 1),
(220, 241, '2023-07-03 07:58:46', '20.6471168', '-103.4584064', '2023-07-03 07:58:46', '2023-07-03 07:58:46', ' [ INSERT 2023-07-03 07:58:46 ], [ idUser 1 ] ', 1),
(221, 241, '2023-07-03 08:00:46', '20.6471168', '-103.4584064', '2023-07-03 08:00:46', '2023-07-03 08:00:46', ' [ INSERT 2023-07-03 08:00:46 ], [ idUser 1 ] ', 1),
(222, 241, '2023-07-03 08:02:46', '20.6471168', '-103.4584064', '2023-07-03 08:02:46', '2023-07-03 08:02:46', ' [ INSERT 2023-07-03 08:02:46 ], [ idUser 1 ] ', 1),
(223, 241, '2023-07-03 08:04:46', '20.6471168', '-103.4584064', '2023-07-03 08:04:46', '2023-07-03 08:04:46', ' [ INSERT 2023-07-03 08:04:46 ], [ idUser 1 ] ', 1),
(224, 241, '2023-07-03 08:06:46', '20.6471168', '-103.4584064', '2023-07-03 08:06:46', '2023-07-03 08:06:46', ' [ INSERT 2023-07-03 08:06:46 ], [ idUser 1 ] ', 1),
(225, 241, '2023-07-03 08:08:46', '20.6471168', '-103.4584064', '2023-07-03 08:08:46', '2023-07-03 08:08:46', ' [ INSERT 2023-07-03 08:08:46 ], [ idUser 1 ] ', 1),
(226, 241, '2023-07-03 08:10:46', '20.6471168', '-103.4584064', '2023-07-03 08:10:46', '2023-07-03 08:10:46', ' [ INSERT 2023-07-03 08:10:46 ], [ idUser 1 ] ', 1),
(227, 241, '2023-07-03 08:12:46', '20.6471168', '-103.4584064', '2023-07-03 08:12:46', '2023-07-03 08:12:46', ' [ INSERT 2023-07-03 08:12:46 ], [ idUser 1 ] ', 1),
(228, 241, '2023-07-03 08:14:46', '20.6471168', '-103.4584064', '2023-07-03 08:14:46', '2023-07-03 08:14:46', ' [ INSERT 2023-07-03 08:14:46 ], [ idUser 1 ] ', 1),
(229, 241, '2023-07-03 08:16:46', '20.6471168', '-103.4584064', '2023-07-03 08:16:46', '2023-07-03 08:16:46', ' [ INSERT 2023-07-03 08:16:46 ], [ idUser 1 ] ', 1),
(230, 241, '2023-07-03 08:18:46', '20.6471168', '-103.4584064', '2023-07-03 08:18:46', '2023-07-03 08:18:46', ' [ INSERT 2023-07-03 08:18:46 ], [ idUser 1 ] ', 1),
(231, 241, '2023-07-03 08:20:46', '20.6471168', '-103.4584064', '2023-07-03 08:20:46', '2023-07-03 08:20:46', ' [ INSERT 2023-07-03 08:20:46 ], [ idUser 1 ] ', 1),
(232, 241, '2023-07-03 08:22:46', '20.6471168', '-103.4584064', '2023-07-03 08:22:46', '2023-07-03 08:22:46', ' [ INSERT 2023-07-03 08:22:46 ], [ idUser 1 ] ', 1),
(233, 241, '2023-07-03 08:24:46', '20.6471168', '-103.4584064', '2023-07-03 08:24:46', '2023-07-03 08:24:46', ' [ INSERT 2023-07-03 08:24:46 ], [ idUser 1 ] ', 1),
(234, 241, '2023-07-03 08:26:46', '20.6471168', '-103.4584064', '2023-07-03 08:26:46', '2023-07-03 08:26:46', ' [ INSERT 2023-07-03 08:26:46 ], [ idUser 1 ] ', 1),
(235, 241, '2023-07-03 08:28:46', '20.6471168', '-103.4584064', '2023-07-03 08:28:46', '2023-07-03 08:28:46', ' [ INSERT 2023-07-03 08:28:46 ], [ idUser 1 ] ', 1),
(236, 241, '2023-07-03 08:30:46', '20.6471168', '-103.4584064', '2023-07-03 08:30:46', '2023-07-03 08:30:46', ' [ INSERT 2023-07-03 08:30:46 ], [ idUser 1 ] ', 1),
(237, 241, '2023-07-03 08:32:46', '20.6471168', '-103.4584064', '2023-07-03 08:32:46', '2023-07-03 08:32:46', ' [ INSERT 2023-07-03 08:32:46 ], [ idUser 1 ] ', 1),
(238, 241, '2023-07-03 08:34:46', '20.6471168', '-103.4584064', '2023-07-03 08:34:46', '2023-07-03 08:34:46', ' [ INSERT 2023-07-03 08:34:46 ], [ idUser 1 ] ', 1),
(239, 241, '2023-07-03 08:36:46', '20.6471168', '-103.4584064', '2023-07-03 08:36:46', '2023-07-03 08:36:46', ' [ INSERT 2023-07-03 08:36:46 ], [ idUser 1 ] ', 1),
(240, 241, '2023-07-03 08:38:46', '20.6471168', '-103.4584064', '2023-07-03 08:38:46', '2023-07-03 08:38:46', ' [ INSERT 2023-07-03 08:38:46 ], [ idUser 1 ] ', 1),
(241, 241, '2023-07-03 08:40:46', '20.6471168', '-103.4584064', '2023-07-03 08:40:46', '2023-07-03 08:40:46', ' [ INSERT 2023-07-03 08:40:46 ], [ idUser 1 ] ', 1),
(242, 241, '2023-07-03 08:42:46', '20.6471168', '-103.4584064', '2023-07-03 08:42:46', '2023-07-03 08:42:46', ' [ INSERT 2023-07-03 08:42:46 ], [ idUser 1 ] ', 1),
(243, 241, '2023-07-03 08:43:44', '20.6526622', '-103.4529497', '2023-07-03 08:43:44', '2023-07-03 08:43:44', ' [ INSERT 2023-07-03 08:43:44 ], [ idUser 37 ] ', 1),
(244, 241, '2023-07-03 08:44:46', '20.6471168', '-103.4584064', '2023-07-03 08:44:46', '2023-07-03 08:44:46', ' [ INSERT 2023-07-03 08:44:46 ], [ idUser 1 ] ', 1),
(245, 241, '2023-07-03 08:46:46', '20.6471168', '-103.4584064', '2023-07-03 08:46:46', '2023-07-03 08:46:46', ' [ INSERT 2023-07-03 08:46:46 ], [ idUser 1 ] ', 1),
(246, 241, '2023-07-03 08:48:46', '20.6471168', '-103.4584064', '2023-07-03 08:48:46', '2023-07-03 08:48:46', ' [ INSERT 2023-07-03 08:48:46 ], [ idUser 1 ] ', 1),
(247, 241, '2023-07-03 08:50:46', '20.6471168', '-103.4584064', '2023-07-03 08:50:46', '2023-07-03 08:50:46', ' [ INSERT 2023-07-03 08:50:46 ], [ idUser 1 ] ', 1),
(248, 241, '2023-07-03 08:52:46', '20.6471168', '-103.4584064', '2023-07-03 08:52:46', '2023-07-03 08:52:46', ' [ INSERT 2023-07-03 08:52:46 ], [ idUser 1 ] ', 1),
(249, 241, '2023-07-03 08:54:46', '20.6471168', '-103.4584064', '2023-07-03 08:54:46', '2023-07-03 08:54:46', ' [ INSERT 2023-07-03 08:54:46 ], [ idUser 1 ] ', 1),
(250, 241, '2023-07-03 08:56:46', '20.6471168', '-103.4584064', '2023-07-03 08:56:46', '2023-07-03 08:56:46', ' [ INSERT 2023-07-03 08:56:46 ], [ idUser 1 ] ', 1),
(251, 241, '2023-07-03 08:58:46', '20.6471168', '-103.4584064', '2023-07-03 08:58:46', '2023-07-03 08:58:46', ' [ INSERT 2023-07-03 08:58:46 ], [ idUser 1 ] ', 1),
(252, 241, '2023-07-03 09:00:46', '20.6471168', '-103.4584064', '2023-07-03 09:00:46', '2023-07-03 09:00:46', ' [ INSERT 2023-07-03 09:00:46 ], [ idUser 1 ] ', 1),
(253, 241, '2023-07-03 09:02:46', '20.6471168', '-103.4584064', '2023-07-03 09:02:46', '2023-07-03 09:02:46', ' [ INSERT 2023-07-03 09:02:46 ], [ idUser 1 ] ', 1),
(254, 241, '2023-07-03 09:04:46', '20.6471168', '-103.4584064', '2023-07-03 09:04:46', '2023-07-03 09:04:46', ' [ INSERT 2023-07-03 09:04:46 ], [ idUser 1 ] ', 1),
(255, 241, '2023-07-03 09:06:46', '20.6471168', '-103.4584064', '2023-07-03 09:06:46', '2023-07-03 09:06:46', ' [ INSERT 2023-07-03 09:06:46 ], [ idUser 1 ] ', 1),
(256, 241, '2023-07-03 09:08:46', '20.6471168', '-103.4584064', '2023-07-03 09:08:46', '2023-07-03 09:08:46', ' [ INSERT 2023-07-03 09:08:46 ], [ idUser 1 ] ', 1),
(257, 241, '2023-07-03 09:10:46', '20.6471168', '-103.4584064', '2023-07-03 09:10:46', '2023-07-03 09:10:46', ' [ INSERT 2023-07-03 09:10:46 ], [ idUser 1 ] ', 1),
(258, 241, '2023-07-03 09:12:46', '20.6471168', '-103.4584064', '2023-07-03 09:12:46', '2023-07-03 09:12:46', ' [ INSERT 2023-07-03 09:12:46 ], [ idUser 1 ] ', 1),
(259, 241, '2023-07-03 09:14:46', '20.6471168', '-103.4584064', '2023-07-03 09:14:46', '2023-07-03 09:14:46', ' [ INSERT 2023-07-03 09:14:46 ], [ idUser 1 ] ', 1),
(260, 241, '2023-07-03 09:16:46', '20.6471168', '-103.4584064', '2023-07-03 09:16:46', '2023-07-03 09:16:46', ' [ INSERT 2023-07-03 09:16:46 ], [ idUser 1 ] ', 1),
(261, 241, '2023-07-03 09:18:46', '20.6471168', '-103.4584064', '2023-07-03 09:18:46', '2023-07-03 09:18:46', ' [ INSERT 2023-07-03 09:18:46 ], [ idUser 1 ] ', 1),
(262, 241, '2023-07-03 09:20:46', '20.6471168', '-103.4584064', '2023-07-03 09:20:46', '2023-07-03 09:20:46', ' [ INSERT 2023-07-03 09:20:46 ], [ idUser 1 ] ', 1),
(263, 241, '2023-07-03 09:22:46', '20.6471168', '-103.4584064', '2023-07-03 09:22:46', '2023-07-03 09:22:46', ' [ INSERT 2023-07-03 09:22:46 ], [ idUser 1 ] ', 1),
(264, 241, '2023-07-03 09:24:46', '20.6471168', '-103.4584064', '2023-07-03 09:24:46', '2023-07-03 09:24:46', ' [ INSERT 2023-07-03 09:24:46 ], [ idUser 1 ] ', 1),
(265, 241, '2023-07-03 09:26:46', '20.6471168', '-103.4584064', '2023-07-03 09:26:46', '2023-07-03 09:26:46', ' [ INSERT 2023-07-03 09:26:46 ], [ idUser 1 ] ', 1),
(266, 241, '2023-07-03 09:28:46', '20.6471168', '-103.4584064', '2023-07-03 09:28:46', '2023-07-03 09:28:46', ' [ INSERT 2023-07-03 09:28:46 ], [ idUser 1 ] ', 1),
(267, 241, '2023-07-03 09:30:46', '20.6471168', '-103.4584064', '2023-07-03 09:30:46', '2023-07-03 09:30:46', ' [ INSERT 2023-07-03 09:30:46 ], [ idUser 1 ] ', 1),
(268, 241, '2023-07-03 09:32:46', '20.6471168', '-103.4584064', '2023-07-03 09:32:46', '2023-07-03 09:32:46', ' [ INSERT 2023-07-03 09:32:46 ], [ idUser 1 ] ', 1),
(269, 241, '2023-07-03 09:34:46', '20.6471168', '-103.4584064', '2023-07-03 09:34:46', '2023-07-03 09:34:46', ' [ INSERT 2023-07-03 09:34:46 ], [ idUser 1 ] ', 1),
(270, 241, '2023-07-03 09:36:46', '20.6471168', '-103.4584064', '2023-07-03 09:36:46', '2023-07-03 09:36:46', ' [ INSERT 2023-07-03 09:36:46 ], [ idUser 1 ] ', 1),
(271, 241, '2023-07-03 09:38:46', '20.6471168', '-103.4584064', '2023-07-03 09:38:46', '2023-07-03 09:38:46', ' [ INSERT 2023-07-03 09:38:46 ], [ idUser 1 ] ', 1),
(272, 241, '2023-07-03 09:40:46', '20.6471168', '-103.4584064', '2023-07-03 09:40:46', '2023-07-03 09:40:46', ' [ INSERT 2023-07-03 09:40:46 ], [ idUser 1 ] ', 1),
(273, 241, '2023-07-03 09:42:46', '20.6471168', '-103.4584064', '2023-07-03 09:42:46', '2023-07-03 09:42:46', ' [ INSERT 2023-07-03 09:42:46 ], [ idUser 1 ] ', 1),
(274, 241, '2023-07-03 09:44:46', '20.6471168', '-103.4584064', '2023-07-03 09:44:46', '2023-07-03 09:44:46', ' [ INSERT 2023-07-03 09:44:46 ], [ idUser 1 ] ', 1),
(275, 241, '2023-07-03 09:46:46', '20.6471168', '-103.4584064', '2023-07-03 09:46:46', '2023-07-03 09:46:46', ' [ INSERT 2023-07-03 09:46:46 ], [ idUser 1 ] ', 1),
(276, 241, '2023-07-03 09:48:46', '20.6471168', '-103.4584064', '2023-07-03 09:48:46', '2023-07-03 09:48:46', ' [ INSERT 2023-07-03 09:48:46 ], [ idUser 1 ] ', 1),
(277, 241, '2023-07-03 09:50:46', '20.6471168', '-103.4584064', '2023-07-03 09:50:46', '2023-07-03 09:50:46', ' [ INSERT 2023-07-03 09:50:46 ], [ idUser 1 ] ', 1),
(278, 241, '2023-07-03 09:52:46', '20.6471168', '-103.4584064', '2023-07-03 09:52:46', '2023-07-03 09:52:46', ' [ INSERT 2023-07-03 09:52:46 ], [ idUser 1 ] ', 1),
(279, 241, '2023-07-03 09:54:46', '20.6471168', '-103.4584064', '2023-07-03 09:54:46', '2023-07-03 09:54:46', ' [ INSERT 2023-07-03 09:54:46 ], [ idUser 1 ] ', 1),
(280, 241, '2023-07-03 09:56:46', '20.6471168', '-103.4584064', '2023-07-03 09:56:46', '2023-07-03 09:56:46', ' [ INSERT 2023-07-03 09:56:46 ], [ idUser 1 ] ', 1),
(281, 241, '2023-07-03 09:58:46', '20.6471168', '-103.4584064', '2023-07-03 09:58:46', '2023-07-03 09:58:46', ' [ INSERT 2023-07-03 09:58:46 ], [ idUser 1 ] ', 1),
(282, 241, '2023-07-03 10:00:46', '20.6471168', '-103.4584064', '2023-07-03 10:00:46', '2023-07-03 10:00:46', ' [ INSERT 2023-07-03 10:00:46 ], [ idUser 1 ] ', 1),
(283, 241, '2023-07-03 10:02:46', '20.6471168', '-103.4584064', '2023-07-03 10:02:46', '2023-07-03 10:02:46', ' [ INSERT 2023-07-03 10:02:46 ], [ idUser 1 ] ', 1),
(284, 241, '2023-07-03 10:04:46', '20.6471168', '-103.4584064', '2023-07-03 10:04:46', '2023-07-03 10:04:46', ' [ INSERT 2023-07-03 10:04:46 ], [ idUser 1 ] ', 1),
(285, 241, '2023-07-03 10:06:46', '20.6471168', '-103.4584064', '2023-07-03 10:06:46', '2023-07-03 10:06:46', ' [ INSERT 2023-07-03 10:06:46 ], [ idUser 1 ] ', 1),
(286, 241, '2023-07-03 10:08:46', '20.6471168', '-103.4584064', '2023-07-03 10:08:46', '2023-07-03 10:08:46', ' [ INSERT 2023-07-03 10:08:46 ], [ idUser 1 ] ', 1),
(287, 241, '2023-07-03 10:10:46', '20.6471168', '-103.4584064', '2023-07-03 10:10:46', '2023-07-03 10:10:46', ' [ INSERT 2023-07-03 10:10:46 ], [ idUser 1 ] ', 1),
(288, 241, '2023-07-03 10:12:46', '20.6471168', '-103.4584064', '2023-07-03 10:12:46', '2023-07-03 10:12:46', ' [ INSERT 2023-07-03 10:12:46 ], [ idUser 1 ] ', 1),
(289, 241, '2023-07-03 10:14:46', '20.6471168', '-103.4584064', '2023-07-03 10:14:46', '2023-07-03 10:14:46', ' [ INSERT 2023-07-03 10:14:46 ], [ idUser 1 ] ', 1),
(290, 241, '2023-07-03 10:16:46', '20.6471168', '-103.4584064', '2023-07-03 10:16:46', '2023-07-03 10:16:46', ' [ INSERT 2023-07-03 10:16:46 ], [ idUser 1 ] ', 1),
(291, 241, '2023-07-03 10:18:46', '20.6471168', '-103.4584064', '2023-07-03 10:18:46', '2023-07-03 10:18:46', ' [ INSERT 2023-07-03 10:18:46 ], [ idUser 1 ] ', 1),
(292, 241, '2023-07-03 10:20:46', '20.6471168', '-103.4584064', '2023-07-03 10:20:46', '2023-07-03 10:20:46', ' [ INSERT 2023-07-03 10:20:46 ], [ idUser 1 ] ', 1),
(293, 241, '2023-07-03 10:22:46', '20.6471168', '-103.4584064', '2023-07-03 10:22:46', '2023-07-03 10:22:46', ' [ INSERT 2023-07-03 10:22:46 ], [ idUser 1 ] ', 1),
(294, 241, '2023-07-03 10:24:46', '20.6471168', '-103.4584064', '2023-07-03 10:24:46', '2023-07-03 10:24:46', ' [ INSERT 2023-07-03 10:24:46 ], [ idUser 1 ] ', 1),
(295, 241, '2023-07-03 10:26:46', '20.6471168', '-103.4584064', '2023-07-03 10:26:46', '2023-07-03 10:26:46', ' [ INSERT 2023-07-03 10:26:46 ], [ idUser 1 ] ', 1),
(296, 241, '2023-07-03 10:28:46', '20.6471168', '-103.4584064', '2023-07-03 10:28:46', '2023-07-03 10:28:46', ' [ INSERT 2023-07-03 10:28:46 ], [ idUser 1 ] ', 1),
(297, 241, '2023-07-03 10:30:46', '20.6471168', '-103.4584064', '2023-07-03 10:30:46', '2023-07-03 10:30:46', ' [ INSERT 2023-07-03 10:30:46 ], [ idUser 1 ] ', 1),
(298, 241, '2023-07-03 10:32:46', '20.6471168', '-103.4584064', '2023-07-03 10:32:46', '2023-07-03 10:32:46', ' [ INSERT 2023-07-03 10:32:46 ], [ idUser 1 ] ', 1),
(299, 241, '2023-07-03 10:34:46', '20.6471168', '-103.4584064', '2023-07-03 10:34:46', '2023-07-03 10:34:46', ' [ INSERT 2023-07-03 10:34:46 ], [ idUser 1 ] ', 1),
(300, 241, '2023-07-03 10:36:46', '20.6471168', '-103.4584064', '2023-07-03 10:36:46', '2023-07-03 10:36:46', ' [ INSERT 2023-07-03 10:36:46 ], [ idUser 1 ] ', 1),
(301, 241, '2023-07-03 10:38:46', '20.6471168', '-103.4584064', '2023-07-03 10:38:46', '2023-07-03 10:38:46', ' [ INSERT 2023-07-03 10:38:46 ], [ idUser 1 ] ', 1),
(302, 241, '2023-07-03 10:40:46', '20.6471168', '-103.4584064', '2023-07-03 10:40:46', '2023-07-03 10:40:46', ' [ INSERT 2023-07-03 10:40:46 ], [ idUser 1 ] ', 1),
(303, 241, '2023-07-03 10:42:46', '20.6471168', '-103.4584064', '2023-07-03 10:42:46', '2023-07-03 10:42:46', ' [ INSERT 2023-07-03 10:42:46 ], [ idUser 1 ] ', 1),
(304, 241, '2023-07-03 10:44:46', '20.6471168', '-103.4584064', '2023-07-03 10:44:46', '2023-07-03 10:44:46', ' [ INSERT 2023-07-03 10:44:46 ], [ idUser 1 ] ', 1),
(305, 241, '2023-07-03 10:46:46', '20.6471168', '-103.4584064', '2023-07-03 10:46:46', '2023-07-03 10:46:46', ' [ INSERT 2023-07-03 10:46:46 ], [ idUser 1 ] ', 1),
(306, 241, '2023-07-03 10:48:46', '20.6471168', '-103.4584064', '2023-07-03 10:48:46', '2023-07-03 10:48:46', ' [ INSERT 2023-07-03 10:48:46 ], [ idUser 1 ] ', 1),
(307, 241, '2023-07-03 10:50:46', '20.6471168', '-103.4584064', '2023-07-03 10:50:46', '2023-07-03 10:50:46', ' [ INSERT 2023-07-03 10:50:46 ], [ idUser 1 ] ', 1);
INSERT INTO `seguimientoxvisita` (`idSxV`, `idVisita`, `fecha`, `lat`, `lng`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(308, 241, '2023-07-03 10:52:46', '20.6471168', '-103.4584064', '2023-07-03 10:52:46', '2023-07-03 10:52:46', ' [ INSERT 2023-07-03 10:52:46 ], [ idUser 1 ] ', 1),
(309, 241, '2023-07-03 10:54:46', '20.6471168', '-103.4584064', '2023-07-03 10:54:46', '2023-07-03 10:54:46', ' [ INSERT 2023-07-03 10:54:46 ], [ idUser 1 ] ', 1),
(310, 241, '2023-07-03 10:56:46', '20.6471168', '-103.4584064', '2023-07-03 10:56:46', '2023-07-03 10:56:46', ' [ INSERT 2023-07-03 10:56:46 ], [ idUser 1 ] ', 1),
(311, 241, '2023-07-03 10:58:46', '20.6471168', '-103.4584064', '2023-07-03 10:58:46', '2023-07-03 10:58:46', ' [ INSERT 2023-07-03 10:58:46 ], [ idUser 1 ] ', 1),
(312, 241, '2023-07-03 11:00:46', '20.6471168', '-103.4584064', '2023-07-03 11:00:46', '2023-07-03 11:00:46', ' [ INSERT 2023-07-03 11:00:46 ], [ idUser 1 ] ', 1),
(313, 241, '2023-07-03 11:02:46', '20.6471168', '-103.4584064', '2023-07-03 11:02:46', '2023-07-03 11:02:46', ' [ INSERT 2023-07-03 11:02:46 ], [ idUser 1 ] ', 1),
(314, 241, '2023-07-03 11:04:46', '20.6471168', '-103.4584064', '2023-07-03 11:04:46', '2023-07-03 11:04:46', ' [ INSERT 2023-07-03 11:04:46 ], [ idUser 1 ] ', 1),
(315, 241, '2023-07-03 11:06:46', '20.6471168', '-103.4584064', '2023-07-03 11:06:46', '2023-07-03 11:06:46', ' [ INSERT 2023-07-03 11:06:46 ], [ idUser 1 ] ', 1),
(316, 241, '2023-07-03 11:08:46', '20.6471168', '-103.4584064', '2023-07-03 11:08:46', '2023-07-03 11:08:46', ' [ INSERT 2023-07-03 11:08:46 ], [ idUser 1 ] ', 1),
(317, 241, '2023-07-03 11:10:46', '20.6471168', '-103.4584064', '2023-07-03 11:10:46', '2023-07-03 11:10:46', ' [ INSERT 2023-07-03 11:10:46 ], [ idUser 1 ] ', 1),
(318, 241, '2023-07-03 11:12:46', '20.6471168', '-103.4584064', '2023-07-03 11:12:46', '2023-07-03 11:12:46', ' [ INSERT 2023-07-03 11:12:46 ], [ idUser 1 ] ', 1),
(319, 241, '2023-07-03 11:14:46', '20.6471168', '-103.4584064', '2023-07-03 11:14:46', '2023-07-03 11:14:46', ' [ INSERT 2023-07-03 11:14:46 ], [ idUser 1 ] ', 1),
(320, 241, '2023-07-03 11:16:46', '20.6471168', '-103.4584064', '2023-07-03 11:16:46', '2023-07-03 11:16:46', ' [ INSERT 2023-07-03 11:16:46 ], [ idUser 1 ] ', 1),
(321, 241, '2023-07-03 11:18:46', '20.6471168', '-103.4584064', '2023-07-03 11:18:46', '2023-07-03 11:18:46', ' [ INSERT 2023-07-03 11:18:46 ], [ idUser 1 ] ', 1),
(322, 241, '2023-07-03 11:20:46', '20.6471168', '-103.4584064', '2023-07-03 11:20:46', '2023-07-03 11:20:46', ' [ INSERT 2023-07-03 11:20:46 ], [ idUser 1 ] ', 1),
(323, 241, '2023-07-03 11:22:46', '20.6471168', '-103.4584064', '2023-07-03 11:22:46', '2023-07-03 11:22:46', ' [ INSERT 2023-07-03 11:22:46 ], [ idUser 1 ] ', 1),
(324, 241, '2023-07-03 11:24:46', '20.6471168', '-103.4584064', '2023-07-03 11:24:46', '2023-07-03 11:24:46', ' [ INSERT 2023-07-03 11:24:46 ], [ idUser 1 ] ', 1),
(325, 241, '2023-07-03 11:26:46', '20.6471168', '-103.4584064', '2023-07-03 11:26:46', '2023-07-03 11:26:46', ' [ INSERT 2023-07-03 11:26:46 ], [ idUser 1 ] ', 1),
(326, 241, '2023-07-03 11:28:46', '20.6471168', '-103.4584064', '2023-07-03 11:28:46', '2023-07-03 11:28:46', ' [ INSERT 2023-07-03 11:28:46 ], [ idUser 1 ] ', 1),
(327, 241, '2023-07-03 11:30:46', '20.6471168', '-103.4584064', '2023-07-03 11:30:46', '2023-07-03 11:30:46', ' [ INSERT 2023-07-03 11:30:46 ], [ idUser 1 ] ', 1),
(328, 241, '2023-07-03 11:32:46', '20.6471168', '-103.4584064', '2023-07-03 11:32:46', '2023-07-03 11:32:46', ' [ INSERT 2023-07-03 11:32:46 ], [ idUser 1 ] ', 1),
(329, 241, '2023-07-03 11:34:46', '20.6471168', '-103.4584064', '2023-07-03 11:34:46', '2023-07-03 11:34:46', ' [ INSERT 2023-07-03 11:34:46 ], [ idUser 1 ] ', 1),
(330, 241, '2023-07-03 11:36:46', '20.6471168', '-103.4584064', '2023-07-03 11:36:46', '2023-07-03 11:36:46', ' [ INSERT 2023-07-03 11:36:46 ], [ idUser 1 ] ', 1),
(331, 241, '2023-07-03 11:38:46', '20.6471168', '-103.4584064', '2023-07-03 11:38:46', '2023-07-03 11:38:46', ' [ INSERT 2023-07-03 11:38:46 ], [ idUser 1 ] ', 1),
(332, 241, '2023-07-03 11:40:46', '20.6471168', '-103.4584064', '2023-07-03 11:40:46', '2023-07-03 11:40:46', ' [ INSERT 2023-07-03 11:40:46 ], [ idUser 1 ] ', 1),
(333, 241, '2023-07-03 11:42:46', '20.6471168', '-103.4584064', '2023-07-03 11:42:46', '2023-07-03 11:42:46', ' [ INSERT 2023-07-03 11:42:46 ], [ idUser 1 ] ', 1),
(334, 241, '2023-07-03 11:44:46', '20.6471168', '-103.4584064', '2023-07-03 11:44:46', '2023-07-03 11:44:46', ' [ INSERT 2023-07-03 11:44:46 ], [ idUser 1 ] ', 1),
(335, 241, '2023-07-03 11:46:46', '20.6471168', '-103.4584064', '2023-07-03 11:46:46', '2023-07-03 11:46:46', ' [ INSERT 2023-07-03 11:46:46 ], [ idUser 1 ] ', 1),
(336, 241, '2023-07-03 11:48:46', '20.6471168', '-103.4584064', '2023-07-03 11:48:46', '2023-07-03 11:48:46', ' [ INSERT 2023-07-03 11:48:46 ], [ idUser 1 ] ', 1),
(337, 241, '2023-07-03 11:50:46', '20.6471168', '-103.4584064', '2023-07-03 11:50:46', '2023-07-03 11:50:46', ' [ INSERT 2023-07-03 11:50:46 ], [ idUser 1 ] ', 1),
(338, 241, '2023-07-03 11:52:46', '20.6471168', '-103.4584064', '2023-07-03 11:52:46', '2023-07-03 11:52:46', ' [ INSERT 2023-07-03 11:52:46 ], [ idUser 1 ] ', 1),
(339, 241, '2023-07-03 11:54:46', '20.6471168', '-103.4584064', '2023-07-03 11:54:46', '2023-07-03 11:54:46', ' [ INSERT 2023-07-03 11:54:46 ], [ idUser 1 ] ', 1),
(340, 241, '2023-07-03 11:56:46', '20.6471168', '-103.4584064', '2023-07-03 11:56:46', '2023-07-03 11:56:46', ' [ INSERT 2023-07-03 11:56:46 ], [ idUser 1 ] ', 1),
(341, 241, '2023-07-03 11:58:46', '20.6471168', '-103.4584064', '2023-07-03 11:58:46', '2023-07-03 11:58:46', ' [ INSERT 2023-07-03 11:58:46 ], [ idUser 1 ] ', 1),
(342, 241, '2023-07-03 12:00:46', '20.6471168', '-103.4584064', '2023-07-03 12:00:46', '2023-07-03 12:00:46', ' [ INSERT 2023-07-03 12:00:46 ], [ idUser 1 ] ', 1),
(343, 241, '2023-07-03 12:02:46', '20.6471168', '-103.4584064', '2023-07-03 12:02:46', '2023-07-03 12:02:46', ' [ INSERT 2023-07-03 12:02:46 ], [ idUser 1 ] ', 1),
(344, 241, '2023-07-03 12:04:46', '20.6471168', '-103.4584064', '2023-07-03 12:04:46', '2023-07-03 12:04:46', ' [ INSERT 2023-07-03 12:04:46 ], [ idUser 1 ] ', 1),
(345, 241, '2023-07-03 12:06:46', '20.6471168', '-103.4584064', '2023-07-03 12:06:46', '2023-07-03 12:06:46', ' [ INSERT 2023-07-03 12:06:46 ], [ idUser 1 ] ', 1),
(346, 241, '2023-07-03 12:08:46', '20.6471168', '-103.4584064', '2023-07-03 12:08:46', '2023-07-03 12:08:46', ' [ INSERT 2023-07-03 12:08:46 ], [ idUser 1 ] ', 1),
(347, 241, '2023-07-03 12:10:46', '20.6471168', '-103.4584064', '2023-07-03 12:10:46', '2023-07-03 12:10:46', ' [ INSERT 2023-07-03 12:10:46 ], [ idUser 1 ] ', 1),
(348, 241, '2023-07-03 12:12:46', '20.6471168', '-103.4584064', '2023-07-03 12:12:46', '2023-07-03 12:12:46', ' [ INSERT 2023-07-03 12:12:46 ], [ idUser 1 ] ', 1),
(349, 241, '2023-07-03 12:14:46', '20.6471168', '-103.4584064', '2023-07-03 12:14:46', '2023-07-03 12:14:46', ' [ INSERT 2023-07-03 12:14:46 ], [ idUser 1 ] ', 1),
(350, 241, '2023-07-03 12:16:46', '20.6471168', '-103.4584064', '2023-07-03 12:16:46', '2023-07-03 12:16:46', ' [ INSERT 2023-07-03 12:16:46 ], [ idUser 1 ] ', 1),
(351, 241, '2023-07-03 12:18:46', '20.6471168', '-103.4584064', '2023-07-03 12:18:46', '2023-07-03 12:18:46', ' [ INSERT 2023-07-03 12:18:46 ], [ idUser 1 ] ', 1),
(352, 241, '2023-07-03 12:20:46', '20.6471168', '-103.4584064', '2023-07-03 12:20:46', '2023-07-03 12:20:46', ' [ INSERT 2023-07-03 12:20:46 ], [ idUser 1 ] ', 1),
(353, 241, '2023-07-03 12:22:46', '20.6471168', '-103.4584064', '2023-07-03 12:22:46', '2023-07-03 12:22:46', ' [ INSERT 2023-07-03 12:22:46 ], [ idUser 1 ] ', 1),
(354, 241, '2023-07-03 12:24:46', '20.6471168', '-103.4584064', '2023-07-03 12:24:46', '2023-07-03 12:24:46', ' [ INSERT 2023-07-03 12:24:46 ], [ idUser 1 ] ', 1),
(355, 241, '2023-07-03 12:26:46', '20.6471168', '-103.4584064', '2023-07-03 12:26:46', '2023-07-03 12:26:46', ' [ INSERT 2023-07-03 12:26:46 ], [ idUser 1 ] ', 1),
(356, 241, '2023-07-03 12:28:46', '20.6471168', '-103.4584064', '2023-07-03 12:28:46', '2023-07-03 12:28:46', ' [ INSERT 2023-07-03 12:28:46 ], [ idUser 1 ] ', 1),
(357, 241, '2023-07-03 12:30:46', '20.6471168', '-103.4584064', '2023-07-03 12:30:46', '2023-07-03 12:30:46', ' [ INSERT 2023-07-03 12:30:46 ], [ idUser 1 ] ', 1),
(358, 241, '2023-07-03 12:32:46', '20.6471168', '-103.4584064', '2023-07-03 12:32:46', '2023-07-03 12:32:46', ' [ INSERT 2023-07-03 12:32:46 ], [ idUser 1 ] ', 1),
(359, 241, '2023-07-03 12:34:46', '20.6471168', '-103.4584064', '2023-07-03 12:34:46', '2023-07-03 12:34:46', ' [ INSERT 2023-07-03 12:34:46 ], [ idUser 1 ] ', 1),
(360, 241, '2023-07-03 12:36:46', '20.6471168', '-103.4584064', '2023-07-03 12:36:46', '2023-07-03 12:36:46', ' [ INSERT 2023-07-03 12:36:46 ], [ idUser 1 ] ', 1),
(361, 241, '2023-07-03 12:38:46', '20.6471168', '-103.4584064', '2023-07-03 12:38:46', '2023-07-03 12:38:46', ' [ INSERT 2023-07-03 12:38:46 ], [ idUser 1 ] ', 1),
(362, 241, '2023-07-03 12:40:46', '20.6471168', '-103.4584064', '2023-07-03 12:40:46', '2023-07-03 12:40:46', ' [ INSERT 2023-07-03 12:40:46 ], [ idUser 1 ] ', 1),
(363, 241, '2023-07-03 12:42:46', '20.6471168', '-103.4584064', '2023-07-03 12:42:46', '2023-07-03 12:42:46', ' [ INSERT 2023-07-03 12:42:46 ], [ idUser 1 ] ', 1),
(364, 241, '2023-07-03 12:44:46', '20.6471168', '-103.4584064', '2023-07-03 12:44:46', '2023-07-03 12:44:46', ' [ INSERT 2023-07-03 12:44:46 ], [ idUser 1 ] ', 1),
(365, 241, '2023-07-03 12:46:46', '20.6471168', '-103.4584064', '2023-07-03 12:46:46', '2023-07-03 12:46:46', ' [ INSERT 2023-07-03 12:46:46 ], [ idUser 1 ] ', 1),
(366, 241, '2023-07-03 12:48:46', '20.6471168', '-103.4584064', '2023-07-03 12:48:46', '2023-07-03 12:48:46', ' [ INSERT 2023-07-03 12:48:46 ], [ idUser 1 ] ', 1),
(367, 241, '2023-07-03 12:50:46', '20.6471168', '-103.4584064', '2023-07-03 12:50:46', '2023-07-03 12:50:46', ' [ INSERT 2023-07-03 12:50:46 ], [ idUser 1 ] ', 1),
(368, 241, '2023-07-03 12:52:46', '20.6471168', '-103.4584064', '2023-07-03 12:52:46', '2023-07-03 12:52:46', ' [ INSERT 2023-07-03 12:52:46 ], [ idUser 1 ] ', 1),
(369, 241, '2023-07-03 12:54:46', '20.6471168', '-103.4584064', '2023-07-03 12:54:46', '2023-07-03 12:54:46', ' [ INSERT 2023-07-03 12:54:46 ], [ idUser 1 ] ', 1),
(370, 241, '2023-07-03 12:56:46', '20.6471168', '-103.4584064', '2023-07-03 12:56:46', '2023-07-03 12:56:46', ' [ INSERT 2023-07-03 12:56:46 ], [ idUser 1 ] ', 1),
(371, 241, '2023-07-03 12:58:46', '20.6471168', '-103.4584064', '2023-07-03 12:58:46', '2023-07-03 12:58:46', ' [ INSERT 2023-07-03 12:58:46 ], [ idUser 1 ] ', 1),
(372, 241, '2023-07-03 01:00:46', '20.6471168', '-103.4584064', '2023-07-03 01:00:46', '2023-07-03 01:00:46', ' [ INSERT 2023-07-03 01:00:46 ], [ idUser 1 ] ', 1),
(373, 241, '2023-07-03 01:02:46', '20.6471168', '-103.4584064', '2023-07-03 01:02:46', '2023-07-03 01:02:46', ' [ INSERT 2023-07-03 01:02:46 ], [ idUser 1 ] ', 1),
(374, 241, '2023-07-03 01:04:46', '20.6471168', '-103.4584064', '2023-07-03 01:04:46', '2023-07-03 01:04:46', ' [ INSERT 2023-07-03 01:04:46 ], [ idUser 1 ] ', 1),
(375, 241, '2023-07-03 01:06:46', '20.6471168', '-103.4584064', '2023-07-03 01:06:46', '2023-07-03 01:06:46', ' [ INSERT 2023-07-03 01:06:46 ], [ idUser 1 ] ', 1),
(376, 241, '2023-07-03 01:08:46', '20.6471168', '-103.4584064', '2023-07-03 01:08:46', '2023-07-03 01:08:46', ' [ INSERT 2023-07-03 01:08:46 ], [ idUser 1 ] ', 1),
(377, 241, '2023-07-03 01:10:46', '20.6471168', '-103.4584064', '2023-07-03 01:10:46', '2023-07-03 01:10:46', ' [ INSERT 2023-07-03 01:10:46 ], [ idUser 1 ] ', 1),
(378, 241, '2023-07-03 01:12:46', '20.6471168', '-103.4584064', '2023-07-03 01:12:46', '2023-07-03 01:12:46', ' [ INSERT 2023-07-03 01:12:46 ], [ idUser 1 ] ', 1),
(379, 241, '2023-07-03 01:14:46', '20.6471168', '-103.4584064', '2023-07-03 01:14:46', '2023-07-03 01:14:46', ' [ INSERT 2023-07-03 01:14:46 ], [ idUser 1 ] ', 1),
(380, 241, '2023-07-03 01:16:46', '20.6471168', '-103.4584064', '2023-07-03 01:16:46', '2023-07-03 01:16:46', ' [ INSERT 2023-07-03 01:16:46 ], [ idUser 1 ] ', 1),
(381, 241, '2023-07-03 01:18:46', '20.6471168', '-103.4584064', '2023-07-03 01:18:46', '2023-07-03 01:18:46', ' [ INSERT 2023-07-03 01:18:46 ], [ idUser 1 ] ', 1),
(382, 241, '2023-07-03 01:19:37', '20.6471168', '-103.4584064', '2023-07-03 01:19:37', '2023-07-03 01:19:37', ' [ INSERT 2023-07-03 01:19:37 ], [ idUser 1 ] ', 1),
(383, 246, '2023-07-12 02:34:14', '20.6866075', '-103.2880925', '2023-07-12 02:34:14', '2023-07-12 02:34:14', ' [ INSERT 2023-07-12 02:34:14 ], [ idUser 103 ] ', 1),
(384, 247, '2023-07-14 06:47:19', '20.6525887', '-103.4529588', '2023-07-14 06:47:19', '2023-07-14 06:47:19', ' [ INSERT 2023-07-14 06:47:19 ], [ idUser 37 ] ', 1),
(385, 233, '2023-07-14 11:41:17', '9', '9', '2023-07-14 11:41:17', '2023-07-14 11:41:17', ' [ INSERT 2023-07-14 11:41:17 ], [ idUser 2 ] ', 1),
(386, 250, '2023-07-17 08:36:27', '20.6526337', '-103.4529294', '2023-07-17 08:36:27', '2023-07-17 08:36:27', ' [ INSERT 2023-07-17 08:36:27 ], [ idUser 37 ] ', 1),
(387, 251, '2023-07-17 02:53:32', '20.6526984', '-103.4534018', '2023-07-17 02:53:32', '2023-07-17 02:53:32', ' [ INSERT 2023-07-17 02:53:32 ], [ idUser 37 ] ', 1),
(388, 251, '2023-07-17 03:07:31', '20.6526984', '-103.4534018', '2023-07-17 03:07:31', '2023-07-17 03:07:31', ' [ INSERT 2023-07-17 03:07:31 ], [ idUser 37 ] ', 1),
(389, 251, '2023-07-17 03:07:54', '20.6526984', '-103.4534018', '2023-07-17 03:07:54', '2023-07-17 03:07:54', ' [ INSERT 2023-07-17 03:07:54 ], [ idUser 37 ] ', 1),
(390, 251, '2023-07-17 03:13:54', '20.6526984', '-103.4534018', '2023-07-17 03:13:54', '2023-07-17 03:13:54', ' [ INSERT 2023-07-17 03:13:54 ], [ idUser 37 ] ', 1),
(391, 251, '2023-07-18 05:17:52', '20.652684681069186', '-103.45285311189987', '2023-07-18 05:17:52', '2023-07-18 05:17:52', ' [ INSERT 2023-07-18 05:17:52 ], [ idUser 37 ] ', 1),
(392, 255, '2023-07-19 10:00:31', '20.6471168', '-103.4551296', '2023-07-19 10:00:31', '2023-07-19 10:00:31', ' [ INSERT 2023-07-19 10:00:31 ], [ idUser 37 ] ', 1),
(393, 255, '2023-07-19 10:05:31', '20.6471168', '-103.4551296', '2023-07-19 10:05:31', '2023-07-19 10:05:31', ' [ INSERT 2023-07-19 10:05:31 ], [ idUser 37 ] ', 1),
(394, 255, '2023-07-19 10:08:35', '20.6471168', '-103.4551296', '2023-07-19 10:08:35', '2023-07-19 10:08:35', ' [ INSERT 2023-07-19 10:08:35 ], [ idUser 37 ] ', 1),
(395, 255, '2023-07-19 10:13:35', '20.6471168', '-103.4551296', '2023-07-19 10:13:35', '2023-07-19 10:13:35', ' [ INSERT 2023-07-19 10:13:35 ], [ idUser 37 ] ', 1),
(396, 255, '2023-07-19 10:16:33', '20.6471168', '-103.4551296', '2023-07-19 10:16:33', '2023-07-19 10:16:33', ' [ INSERT 2023-07-19 10:16:33 ], [ idUser 37 ] ', 1),
(397, 255, '2023-07-19 10:21:35', '20.6471168', '-103.4551296', '2023-07-19 10:21:35', '2023-07-19 10:21:35', ' [ INSERT 2023-07-19 10:21:35 ], [ idUser 37 ] ', 1),
(398, 255, '2023-07-19 10:24:36', '20.6471168', '-103.4551296', '2023-07-19 10:24:36', '2023-07-19 10:24:36', ' [ INSERT 2023-07-19 10:24:36 ], [ idUser 37 ] ', 1),
(399, 255, '2023-07-19 10:29:34', '20.6471168', '-103.4551296', '2023-07-19 10:29:34', '2023-07-19 10:29:34', ' [ INSERT 2023-07-19 10:29:34 ], [ idUser 37 ] ', 1),
(400, 255, '2023-07-19 10:32:30', '20.6471168', '-103.4551296', '2023-07-19 10:32:30', '2023-07-19 10:32:30', ' [ INSERT 2023-07-19 10:32:30 ], [ idUser 37 ] ', 1),
(401, 255, '2023-07-19 10:37:31', '20.6471168', '-103.4551296', '2023-07-19 10:37:31', '2023-07-19 10:37:31', ' [ INSERT 2023-07-19 10:37:31 ], [ idUser 37 ] ', 1),
(402, 255, '2023-07-19 10:40:34', '20.6471168', '-103.4551296', '2023-07-19 10:40:34', '2023-07-19 10:40:34', ' [ INSERT 2023-07-19 10:40:34 ], [ idUser 37 ] ', 1),
(403, 255, '2023-07-19 10:46:16', '20.6471168', '-103.4551296', '2023-07-19 10:46:16', '2023-07-19 10:46:16', ' [ INSERT 2023-07-19 10:46:16 ], [ idUser 37 ] ', 1),
(404, 255, '2023-07-19 10:51:16', '20.6471168', '-103.4551296', '2023-07-19 10:51:16', '2023-07-19 10:51:16', ' [ INSERT 2023-07-19 10:51:16 ], [ idUser 37 ] ', 1),
(405, 255, '2023-07-19 10:52:05', '20.6471168', '-103.4551296', '2023-07-19 10:52:05', '2023-07-19 10:52:05', ' [ INSERT 2023-07-19 10:52:05 ], [ idUser 37 ] ', 1),
(406, 255, '2023-07-19 10:57:20', '20.6471168', '-103.4551296', '2023-07-19 10:57:20', '2023-07-19 10:57:20', ' [ INSERT 2023-07-19 10:57:20 ], [ idUser 37 ] ', 1),
(407, 255, '2023-07-19 11:00:17', '20.6471168', '-103.4551296', '2023-07-19 11:00:17', '2023-07-19 11:00:17', ' [ INSERT 2023-07-19 11:00:17 ], [ idUser 37 ] ', 1),
(408, 255, '2023-07-19 11:05:21', '20.6471168', '-103.4551296', '2023-07-19 11:05:21', '2023-07-19 11:05:21', ' [ INSERT 2023-07-19 11:05:21 ], [ idUser 37 ] ', 1),
(409, 255, '2023-07-19 11:08:36', '20.6471168', '-103.4551296', '2023-07-19 11:08:36', '2023-07-19 11:08:36', ' [ INSERT 2023-07-19 11:08:36 ], [ idUser 37 ] ', 1),
(410, 255, '2023-07-19 11:13:42', '20.6471168', '-103.4551296', '2023-07-19 11:13:42', '2023-07-19 11:13:42', ' [ INSERT 2023-07-19 11:13:42 ], [ idUser 37 ] ', 1),
(411, 255, '2023-07-19 11:16:37', '20.6471168', '-103.4551296', '2023-07-19 11:16:37', '2023-07-19 11:16:37', ' [ INSERT 2023-07-19 11:16:37 ], [ idUser 37 ] ', 1),
(412, 255, '2023-07-19 11:21:37', '20.6471168', '-103.4551296', '2023-07-19 11:21:37', '2023-07-19 11:21:37', ' [ INSERT 2023-07-19 11:21:37 ], [ idUser 37 ] ', 1),
(413, 255, '2023-07-19 11:24:38', '20.6471168', '-103.4551296', '2023-07-19 11:24:38', '2023-07-19 11:24:38', ' [ INSERT 2023-07-19 11:24:38 ], [ idUser 37 ] ', 1),
(414, 255, '2023-07-19 11:29:45', '20.6471168', '-103.4551296', '2023-07-19 11:29:45', '2023-07-19 11:29:45', ' [ INSERT 2023-07-19 11:29:45 ], [ idUser 37 ] ', 1),
(415, 255, '2023-07-19 11:32:46', '20.6471168', '-103.4551296', '2023-07-19 11:32:46', '2023-07-19 11:32:46', ' [ INSERT 2023-07-19 11:32:46 ], [ idUser 37 ] ', 1),
(416, 255, '2023-07-19 11:37:52', '20.6471168', '-103.4551296', '2023-07-19 11:37:52', '2023-07-19 11:37:52', ' [ INSERT 2023-07-19 11:37:52 ], [ idUser 37 ] ', 1),
(417, 255, '2023-07-19 11:40:51', '20.6471168', '-103.4551296', '2023-07-19 11:40:51', '2023-07-19 11:40:51', ' [ INSERT 2023-07-19 11:40:51 ], [ idUser 37 ] ', 1),
(418, 257, '2023-07-19 11:44:10', 'no ha nada 1', 'no ha nada 1', '2023-07-19 11:44:10', '2023-07-19 11:44:10', ' [ INSERT 2023-07-19 11:44:10 ], [ idUser 37 ] ', 1),
(419, 255, '2023-07-19 11:45:57', '20.6471168', '-103.4551296', '2023-07-19 11:45:57', '2023-07-19 11:45:57', ' [ INSERT 2023-07-19 11:45:57 ], [ idUser 37 ] ', 1),
(420, 255, '2023-07-19 11:49:05', '20.6471168', '-103.4551296', '2023-07-19 11:49:05', '2023-07-19 11:49:05', ' [ INSERT 2023-07-19 11:49:05 ], [ idUser 37 ] ', 1),
(421, 255, '2023-07-19 11:52:06', '20.6471168', '-103.4551296', '2023-07-19 11:52:06', '2023-07-19 11:52:06', ' [ INSERT 2023-07-19 11:52:06 ], [ idUser 37 ] ', 1),
(422, 255, '2023-07-19 11:57:11', '20.6471168', '-103.4551296', '2023-07-19 11:57:11', '2023-07-19 11:57:11', ' [ INSERT 2023-07-19 11:57:11 ], [ idUser 37 ] ', 1),
(423, 255, '2023-07-19 12:00:15', '20.6471168', '-103.4551296', '2023-07-19 12:00:15', '2023-07-19 12:00:15', ' [ INSERT 2023-07-19 12:00:15 ], [ idUser 37 ] ', 1),
(424, 255, '2023-07-19 12:05:15', '20.6471168', '-103.4551296', '2023-07-19 12:05:15', '2023-07-19 12:05:15', ' [ INSERT 2023-07-19 12:05:15 ], [ idUser 37 ] ', 1),
(425, 255, '2023-07-19 12:08:10', '20.6471168', '-103.4551296', '2023-07-19 12:08:10', '2023-07-19 12:08:10', ' [ INSERT 2023-07-19 12:08:10 ], [ idUser 37 ] ', 1),
(426, 255, '2023-07-19 12:13:10', '20.6471168', '-103.4551296', '2023-07-19 12:13:10', '2023-07-19 12:13:10', ' [ INSERT 2023-07-19 12:13:10 ], [ idUser 37 ] ', 1),
(427, 255, '2023-07-19 12:15:11', '20.6471168', '-103.4551296', '2023-07-19 12:15:11', '2023-07-19 12:15:11', ' [ INSERT 2023-07-19 12:15:11 ], [ idUser 37 ] ', 1),
(428, 255, '2023-07-19 12:19:19', '20.6471168', '-103.4551296', '2023-07-19 12:19:19', '2023-07-19 12:19:19', ' [ INSERT 2023-07-19 12:19:19 ], [ idUser 37 ] ', 1),
(429, 255, '2023-07-19 12:22:22', '20.6471168', '-103.4551296', '2023-07-19 12:22:22', '2023-07-19 12:22:22', ' [ INSERT 2023-07-19 12:22:22 ], [ idUser 37 ] ', 1),
(430, 255, '2023-07-19 12:27:22', '20.6471168', '-103.4551296', '2023-07-19 12:27:22', '2023-07-19 12:27:22', ' [ INSERT 2023-07-19 12:27:22 ], [ idUser 37 ] ', 1),
(431, 255, '2023-07-19 12:30:18', '20.6471168', '-103.4551296', '2023-07-19 12:30:18', '2023-07-19 12:30:18', ' [ INSERT 2023-07-19 12:30:18 ], [ idUser 37 ] ', 1),
(432, 255, '2023-07-19 12:35:19', '20.6471168', '-103.4551296', '2023-07-19 12:35:19', '2023-07-19 12:35:19', ' [ INSERT 2023-07-19 12:35:19 ], [ idUser 37 ] ', 1),
(433, 255, '2023-07-19 12:38:21', '20.6471168', '-103.4551296', '2023-07-19 12:38:21', '2023-07-19 12:38:21', ' [ INSERT 2023-07-19 12:38:21 ], [ idUser 37 ] ', 1),
(434, 260, '2023-07-19 12:41:01', 'no ha nada 1', 'no ha nada 1', '2023-07-19 12:41:01', '2023-07-19 12:41:01', ' [ INSERT 2023-07-19 12:41:01 ], [ idUser 37 ] ', 1),
(435, 255, '2023-07-19 12:43:17', '20.6471168', '-103.4551296', '2023-07-19 12:43:17', '2023-07-19 12:43:17', ' [ INSERT 2023-07-19 12:43:17 ], [ idUser 37 ] ', 1),
(436, 255, '2023-07-19 12:46:18', '20.6471168', '-103.4551296', '2023-07-19 12:46:18', '2023-07-19 12:46:18', ' [ INSERT 2023-07-19 12:46:18 ], [ idUser 37 ] ', 1),
(437, 261, '2023-07-20 02:15:14', 'no ha nada 1', 'no ha nada 1', '2023-07-20 02:15:14', '2023-07-20 02:15:14', ' [ INSERT 2023-07-20 02:15:14 ], [ idUser 37 ] ', 1),
(438, 261, '2023-07-20 02:16:43', 'no ha nada 1', 'no ha nada 1', '2023-07-20 02:16:43', '2023-07-20 02:16:43', ' [ INSERT 2023-07-20 02:16:43 ], [ idUser 37 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idServicio` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `imagen` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServicio`, `nombre`, `descripcion`, `imagen`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'SKY', '', '/door2door/Modules/ModuleCatalogsServices/api/Documentos/CAGG_File_20230208071046__pefiles.png', '2023-02-08 07:04:36', '2023-02-08 07:12:11', ' [ DELETE 2023-02-08 07:12:11 ], [ idUser 1 ] ', 0),
(2, 'SKY', '', '/door2door/Modules/ModuleCatalogsServices/api/Documentos/CAGG_File_20230209041412__pefiles.png', '2023-02-09 04:14:12', '2023-02-09 04:14:12', ' [ INSERT 2023-02-09 04:14:12 ], [ idUser  ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servidorCorreo`
--

CREATE TABLE `servidorCorreo` (
  `idSCorreo` int(11) NOT NULL,
  `usuarios` text NOT NULL,
  `contrasena` text NOT NULL,
  `servidor` varchar(60) NOT NULL,
  `puerto` varchar(12) NOT NULL,
  `asunto` varchar(60) DEFAULT NULL,
  `cuerpo` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servidorCorreo`
--

INSERT INTO `servidorCorreo` (`idSCorreo`, `usuarios`, `contrasena`, `servidor`, `puerto`, `asunto`, `cuerpo`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'carlos.andres.g.g.desarrollo@gmail.com', 'noepewmuutuikulw', 'smtp.gmail.com', '587', 'door2door', 'door2door', '0000-00-00 00:00:00', '2023-02-16 03:27:13', ' [ UPFATE 2023-02-16 03:27:13 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `idSesion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `sesion` text NOT NULL,
  `ip` varchar(100) NOT NULL,
  `fechaEntrada` datetime NOT NULL,
  `fechaSalida` datetime DEFAULT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`idSesion`, `idUsuario`, `sesion`, `ip`, `fechaEntrada`, `fechaSalida`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 20, 'Ip:172.20.0.1&usuario:MarianaC&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-19 01:49:26', NULL, '2023-04-19 01:49:26', '2023-04-19 01:49:26', ' [ INSERT 2023-04-19 01:49:26 ], [ login ] ', 1),
(2, 21, 'Ip:172.20.0.1&usuario:Leonardo&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-19 01:58:57', NULL, '2023-04-19 01:58:57', '2023-04-19 01:58:57', ' [ INSERT 2023-04-19 01:58:57 ], [ login ] ', 1),
(3, 22, 'Ip:172.20.0.1&usuario:Oswaldo&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-19 01:52:22', NULL, '2023-04-19 01:52:22', '2023-04-19 01:52:22', ' [ INSERT 2023-04-19 01:52:22 ], [ login ] ', 1),
(4, 23, 'Ip:172.20.0.1&usuario:OmarB&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-19 07:57:15', NULL, '2023-04-19 07:57:15', '2023-04-19 07:57:15', ' [ INSERT 2023-04-19 07:57:15 ], [ login ] ', 1),
(5, 24, 'Ip:172.20.0.1&usuario:RESPUETA_CREAR_SOLICITUD&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-19 07:58:45', NULL, '2023-04-19 07:58:45', '2023-04-19 07:58:45', ' [ INSERT 2023-04-19 07:58:45 ], [ login ] ', 1),
(6, 25, 'Ip:172.20.0.1&usuario:OmarE&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-19 10:04:05', NULL, '2023-04-19 10:04:05', '2023-04-19 10:04:05', ' [ INSERT 2023-04-19 10:04:05 ], [ login ] ', 1),
(7, 26, 'Ip:172.20.0.1&usuario:Dreymon&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-20 11:01:38', NULL, '2023-04-20 11:01:38', '2023-04-20 11:01:38', ' [ INSERT 2023-04-20 11:01:38 ], [ login ] ', 1),
(8, 27, 'Ip:172.20.0.1&usuario:Omar&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-20 11:19:42', NULL, '2023-04-20 11:19:42', '2023-04-20 11:19:42', ' [ INSERT 2023-04-20 11:19:42 ], [ login ] ', 1),
(9, 28, 'Ip:172.20.0.1&usuario:AlejandroRamires&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-20 01:45:00', NULL, '2023-04-20 01:45:00', '2023-04-20 01:45:00', ' [ INSERT 2023-04-20 01:45:00 ], [ login ] ', 1),
(10, 29, 'Ip:172.20.0.1&usuario:OmarBV&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-21 06:36:12', NULL, '2023-04-21 06:36:12', '2023-04-21 06:36:12', ' [ INSERT 2023-04-21 06:36:12 ], [ login ] ', 1),
(11, 30, 'Ip:172.20.0.1&usuario:OmarBravo&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-21 07:01:37', NULL, '2023-04-21 07:01:37', '2023-04-21 07:01:37', ' [ INSERT 2023-04-21 07:01:37 ], [ login ] ', 1),
(12, 31, 'Ip:172.20.0.1&usuario:FaliciaDelTimpo&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-24 01:55:58', NULL, '2023-04-24 01:55:58', '2023-04-24 01:55:58', ' [ INSERT 2023-04-24 01:55:58 ], [ login ] ', 1),
(13, 32, 'Ip:172.20.0.1&usuario:OmarDelagado&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-25 12:18:07', NULL, '2023-04-25 12:18:07', '2023-04-25 12:18:07', ' [ INSERT 2023-04-25 12:18:07 ], [ login ] ', 1),
(14, 33, 'Ip:172.20.0.1&usuario:AlejandroDaniel&tipoUsuario:SOCIO', '172.20.0.1', '2023-04-25 01:34:00', NULL, '2023-04-25 01:34:00', '2023-04-25 01:34:00', ' [ INSERT 2023-04-25 01:34:00 ], [ login ] ', 1),
(15, 34, 'Ip:2806:2f0:51c0:a214:fc03:138a:b136:a6f4&usuario:Espana &tipoUsuario:SOCIO', '2806:2f0:51c0:a214:fc03:138a:b136:a6f4', '2023-04-25 09:45:58', NULL, '2023-04-25 09:45:58', '2023-04-25 09:45:58', ' [ INSERT 2023-04-25 09:45:58 ], [ login ] ', 1),
(16, 35, 'Ip:2806:2f0:51c0:a214:fc03:138a:b136:a6f4&usuario:Espana&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:fc03:138a:b136:a6f4', '2023-04-25 09:55:31', NULL, '2023-04-25 09:55:31', '2023-04-25 09:55:31', ' [ INSERT 2023-04-25 09:55:31 ], [ login ] ', 1),
(17, 36, 'Ip:2806:2f0:51c0:a214:fc03:138a:b136:a6f4&usuario:Espana &tipoUsuario:SOCIO', '2806:2f0:51c0:a214:fc03:138a:b136:a6f4', '2023-04-25 10:09:18', NULL, '2023-04-25 10:09:18', '2023-04-25 10:09:18', ' [ INSERT 2023-04-25 10:09:18 ], [ login ] ', 1),
(18, 37, 'Ip:2806:2f0:51c1:d399:7913:fbc4:a6d4:36b4&usuario:Ricardo&tipoUsuario:SOCIO', '2806:2f0:51c1:d399:7913:fbc4:a6d4:36b4', '2023-04-25 10:14:09', NULL, '2023-04-25 10:14:09', '2023-04-25 10:14:09', ' [ INSERT 2023-04-25 10:14:09 ], [ login ] ', 1),
(19, 38, 'Ip:2806:2f0:51c0:a214:fc03:138a:b136:a6f4&usuario:chester&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:fc03:138a:b136:a6f4', '2023-04-25 10:48:01', NULL, '2023-04-25 10:48:01', '2023-04-25 10:48:01', ' [ INSERT 2023-04-25 10:48:01 ], [ login ] ', 1),
(20, 39, 'Ip:2806:2f0:51c1:d399:b193:5eb8:115c:3158&usuario:chente1&tipoUsuario:SOCIO', '2806:2f0:51c1:d399:b193:5eb8:115c:3158', '2023-04-25 10:56:40', NULL, '2023-04-25 10:56:40', '2023-04-25 10:56:40', ' [ INSERT 2023-04-25 10:56:40 ], [ login ] ', 1),
(21, 40, 'Ip:2806:2f0:51c0:a214:fc03:138a:b136:a6f4&usuario:anderson&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:fc03:138a:b136:a6f4', '2023-04-25 10:57:36', NULL, '2023-04-25 10:57:36', '2023-04-25 10:57:36', ' [ INSERT 2023-04-25 10:57:36 ], [ login ] ', 1),
(22, 41, 'Ip:2806:2f0:51c0:a214:fc03:138a:b136:a6f4&usuario:george&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:fc03:138a:b136:a6f4', '2023-04-25 11:07:01', NULL, '2023-04-25 11:07:01', '2023-04-25 11:07:01', ' [ INSERT 2023-04-25 11:07:01 ], [ login ] ', 1),
(23, 42, 'Ip:2806:2f0:51c0:a214:4131:53d0:5961:40b7&usuario:Vardy&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:4131:53d0:5961:40b7', '2023-05-15 09:08:26', NULL, '2023-05-15 09:08:26', '2023-05-15 09:08:26', ' [ INSERT 2023-05-15 09:08:26 ], [ login ] ', 1),
(24, 43, 'Ip:2806:2f0:51c0:a214:4131:53d0:5961:40b7&usuario:Maddison&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:4131:53d0:5961:40b7', '2023-05-15 09:25:46', NULL, '2023-05-15 09:25:46', '2023-05-15 09:25:46', ' [ INSERT 2023-05-15 09:25:46 ], [ login ] ', 1),
(25, 44, 'Ip:2806:2f0:51c0:a214:4131:53d0:5961:40b7&usuario:Almiron &tipoUsuario:SOCIO', '2806:2f0:51c0:a214:4131:53d0:5961:40b7', '2023-05-15 09:32:40', NULL, '2023-05-15 09:32:40', '2023-05-15 09:32:40', ' [ INSERT 2023-05-15 09:32:40 ], [ login ] ', 1),
(26, 45, 'Ip:2806:2f0:51c0:a214:4131:53d0:5961:40b7&usuario:Pope&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:4131:53d0:5961:40b7', '2023-05-15 09:38:04', NULL, '2023-05-15 09:38:04', '2023-05-15 09:38:04', ' [ INSERT 2023-05-15 09:38:04 ], [ login ] ', 1),
(27, 46, 'Ip:172.20.0.1&usuario:Delgado&tipoUsuario:SOCIO', '172.20.0.1', '2023-05-15 04:29:18', NULL, '2023-05-15 04:29:18', '2023-05-15 04:29:18', ' [ INSERT 2023-05-15 04:29:18 ], [ login ] ', 1),
(28, 47, 'Ip:2806:2f0:51c1:d399:7417:cf19:f5:1ff5&usuario:Delgados&tipoUsuario:SOCIO', '2806:2f0:51c1:d399:7417:cf19:f5:1ff5', '2023-05-15 11:13:35', NULL, '2023-05-15 11:13:35', '2023-05-15 11:13:35', ' [ INSERT 2023-05-15 11:13:35 ], [ login ] ', 1),
(29, 48, 'Ip:2806:2f0:51c0:a214:4131:53d0:5961:40b7&usuario:mikelantonio&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:4131:53d0:5961:40b7', '2023-05-15 11:27:56', NULL, '2023-05-15 11:27:56', '2023-05-15 11:27:56', ' [ INSERT 2023-05-15 11:27:56 ], [ login ] ', 1),
(30, 49, 'Ip:2806:2f0:51c1:d399:c9f9:6df8:f4bd:3f71&usuario:Renevalverde&tipoUsuario:SOCIO', '2806:2f0:51c1:d399:c9f9:6df8:f4bd:3f71', '2023-05-16 09:51:49', NULL, '2023-05-16 09:51:49', '2023-05-16 09:51:49', ' [ INSERT 2023-05-16 09:51:49 ], [ login ] ', 1),
(31, 50, 'Ip:2806:2f0:51c0:a214:d966:2ee6:e132:11cf&usuario:tyson&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:d966:2ee6:e132:11cf', '2023-05-16 09:52:53', NULL, '2023-05-16 09:52:53', '2023-05-16 09:52:53', ' [ INSERT 2023-05-16 09:52:53 ], [ login ] ', 1),
(32, 51, 'Ip:172.20.0.1&usuario:Gone1&tipoUsuario:SOCIO', '172.20.0.1', '2023-05-16 04:19:51', NULL, '2023-05-16 04:19:51', '2023-05-16 04:19:51', ' [ INSERT 2023-05-16 04:19:51 ], [ login ] ', 1),
(33, 52, 'Ip:2806:2f0:51c1:d399:c9f9:6df8:f4bd:3f71&usuario:Gone12&tipoUsuario:SOCIO', '2806:2f0:51c1:d399:c9f9:6df8:f4bd:3f71', '2023-05-16 10:08:34', NULL, '2023-05-16 10:08:34', '2023-05-16 10:08:34', ' [ INSERT 2023-05-16 10:08:34 ], [ login ] ', 1),
(34, 53, 'Ip:2806:2f0:51c1:d399:c9f9:6df8:f4bd:3f71&usuario:Gone123&tipoUsuario:SOCIO', '2806:2f0:51c1:d399:c9f9:6df8:f4bd:3f71', '2023-05-16 10:09:32', NULL, '2023-05-16 10:09:32', '2023-05-16 10:09:32', ' [ INSERT 2023-05-16 10:09:32 ], [ login ] ', 1),
(35, 54, 'Ip:2806:2f0:51c0:a214:d966:2ee6:e132:11cf&usuario:jaredbowen&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:d966:2ee6:e132:11cf', '2023-05-16 10:12:16', NULL, '2023-05-16 10:12:16', '2023-05-16 10:12:16', ' [ INSERT 2023-05-16 10:12:16 ], [ login ] ', 1),
(36, 55, 'Ip:2806:2f0:51c0:a214:8639:2aab:c456:a138&usuario:peterparker&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:8639:2aab:c456:a138', '2023-05-31 06:18:50', NULL, '2023-05-31 06:18:50', '2023-05-31 06:18:50', ' [ INSERT 2023-05-31 06:18:50 ], [ login ] ', 1),
(37, 56, 'Ip:2806:2f0:51c0:a214:9ea6:d057:4efb:6f0a&usuario:vince&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:9ea6:d057:4efb:6f0a', '2023-06-05 09:31:41', NULL, '2023-06-05 09:31:41', '2023-06-05 09:31:41', ' [ INSERT 2023-06-05 09:31:41 ], [ login ] ', 1),
(38, 57, 'Ip:2806:2f0:51c1:543d:b573:b045:10e8:75f4&usuario:dany&tipoUsuario:SOCIO', '2806:2f0:51c1:543d:b573:b045:10e8:75f4', '2023-06-06 04:35:32', NULL, '2023-06-06 04:35:32', '2023-06-06 04:35:32', ' [ INSERT 2023-06-06 04:35:32 ], [ login ] ', 1),
(39, 58, 'Ip:2806:2f0:51c0:a214:14fa:8b7a:d4d6:f2a1&usuario:kobebryant&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:14fa:8b7a:d4d6:f2a1', '2023-06-07 06:56:57', NULL, '2023-06-07 06:56:57', '2023-06-07 06:56:57', ' [ INSERT 2023-06-07 06:56:57 ], [ login ] ', 1),
(40, 59, 'Ip:200.68.167.36&usuario:lebronjames&tipoUsuario:SOCIO', '200.68.167.36', '2023-06-07 09:45:16', NULL, '2023-06-07 09:45:16', '2023-06-07 09:45:16', ' [ INSERT 2023-06-07 09:45:16 ], [ login ] ', 1),
(41, 60, 'Ip:187.248.72.166&usuario:Juan&tipoUsuario:SOCIO', '187.248.72.166', '2023-06-13 10:46:51', NULL, '2023-06-13 10:46:51', '2023-06-13 10:46:51', ' [ INSERT 2023-06-13 10:46:51 ], [ login ] ', 1),
(42, 63, 'Ip:2806:2f0:51c0:a214:71f8:31fe:7d69:2e08&usuario:raulgonzalez&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:71f8:31fe:7d69:2e08', '2023-07-10 02:04:27', NULL, '2023-07-10 02:04:27', '2023-07-10 02:04:27', ' [ INSERT 2023-07-10 02:04:27 ], [ login ] ', 1),
(43, 64, 'Ip:2806:2f0:51c0:a214:71f8:31fe:7d69:2e08&usuario:patricio&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:71f8:31fe:7d69:2e08', '2023-07-10 02:10:05', NULL, '2023-07-10 02:10:05', '2023-07-10 02:10:05', ' [ INSERT 2023-07-10 02:10:05 ], [ login ] ', 1),
(44, 70, 'Ip:187.190.205.50&usuario:Yolanda1&tipoUsuario:SOCIO', '187.190.205.50', '2023-07-10 03:20:16', NULL, '2023-07-10 03:20:16', '2023-07-10 03:20:16', ' [ INSERT 2023-07-10 03:20:16 ], [ login ] ', 1),
(45, 73, 'Ip:2806:2f0:53e0:e706:208b:afb:1c2b:9436&usuario:AnastaciaRamirez&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:208b:afb:1c2b:9436', '2023-07-10 03:27:01', NULL, '2023-07-10 03:27:01', '2023-07-10 03:27:01', ' [ INSERT 2023-07-10 03:27:01 ], [ login ] ', 1),
(46, 74, 'Ip:2806:2f0:53e0:e706:208b:afb:1c2b:9436&usuario:AnastaciaRamirez2&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:208b:afb:1c2b:9436', '2023-07-10 03:32:38', NULL, '2023-07-10 03:32:38', '2023-07-10 03:32:38', ' [ INSERT 2023-07-10 03:32:38 ], [ login ] ', 1),
(47, 75, 'Ip:2806:2f0:51c0:a214:71f8:31fe:7d69:2e08&usuario:marcusrashford&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:71f8:31fe:7d69:2e08', '2023-07-10 03:34:49', NULL, '2023-07-10 03:34:49', '2023-07-10 03:34:49', ' [ INSERT 2023-07-10 03:34:49 ], [ login ] ', 1),
(48, 76, 'Ip:187.190.205.50&usuario:Raulmendoza1&tipoUsuario:SOCIO', '187.190.205.50', '2023-07-10 03:34:53', NULL, '2023-07-10 03:34:53', '2023-07-10 03:34:53', ' [ INSERT 2023-07-10 03:34:53 ], [ login ] ', 1),
(49, 77, 'Ip:2806:2f0:51c0:a214:71f8:31fe:7d69:2e08&usuario:Sancho&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:71f8:31fe:7d69:2e08', '2023-07-10 03:36:35', NULL, '2023-07-10 03:36:35', '2023-07-10 03:36:35', ' [ INSERT 2023-07-10 03:36:35 ], [ login ] ', 1),
(50, 78, 'Ip:172.20.0.1&usuario:MarianaAvila&tipoUsuario:SOCIO', '172.20.0.1', '2023-07-11 12:49:02', NULL, '2023-07-11 12:49:02', '2023-07-11 12:49:02', ' [ INSERT 2023-07-11 12:49:02 ], [ login ] ', 1),
(51, 79, 'Ip:172.20.0.1&usuario:organizar12&tipoUsuario:SOCIO', '172.20.0.1', '2023-07-11 12:51:01', NULL, '2023-07-11 12:51:01', '2023-07-11 12:51:01', ' [ INSERT 2023-07-11 12:51:01 ], [ login ] ', 1),
(52, 80, 'Ip:172.20.0.1&usuario:organizar123&tipoUsuario:SOCIO', '172.20.0.1', '2023-07-11 12:52:52', NULL, '2023-07-11 12:52:52', '2023-07-11 12:52:52', ' [ INSERT 2023-07-11 12:52:52 ], [ login ] ', 1),
(53, 81, 'Ip:2806:2f0:53e0:e706:5529:36fe:8955:8d25&usuario:Radamel&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:5529:36fe:8955:8d25', '2023-07-11 10:19:20', NULL, '2023-07-11 10:19:20', '2023-07-11 10:19:20', ' [ INSERT 2023-07-11 10:19:20 ], [ login ] ', 1),
(54, 82, 'Ip:2806:2f0:53e0:e706:5529:36fe:8955:8d25&usuario:Andrea&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:5529:36fe:8955:8d25', '2023-07-12 07:37:20', NULL, '2023-07-12 07:37:20', '2023-07-12 07:37:20', ' [ INSERT 2023-07-12 07:37:20 ], [ login ] ', 1),
(55, 83, 'Ip:2806:2f0:53e0:e706:5529:36fe:8955:8d25&usuario:MarianaMariana&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:5529:36fe:8955:8d25', '2023-07-12 10:33:25', NULL, '2023-07-12 10:33:25', '2023-07-12 10:33:25', ' [ INSERT 2023-07-12 10:33:25 ], [ login ] ', 1),
(56, 84, 'Ip:2806:2f0:53e0:e706:5529:36fe:8955:8d25&usuario:Mariana21&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:5529:36fe:8955:8d25', '2023-07-12 10:55:05', NULL, '2023-07-12 10:55:05', '2023-07-12 10:55:05', ' [ INSERT 2023-07-12 10:55:05 ], [ login ] ', 1),
(57, 85, 'Ip:2806:2f0:51c0:a214:ae74:43f2:8df7:9465&usuario:robinho&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:ae74:43f2:8df7:9465', '2023-07-12 11:32:58', NULL, '2023-07-12 11:32:58', '2023-07-12 11:32:58', ' [ INSERT 2023-07-12 11:32:58 ], [ login ] ', 1),
(58, 86, 'Ip:2806:2f0:51c0:a214:ae74:43f2:8df7:9465&usuario:Dos Santos &tipoUsuario:SOCIO', '2806:2f0:51c0:a214:ae74:43f2:8df7:9465', '2023-07-12 11:37:59', NULL, '2023-07-12 11:37:59', '2023-07-12 11:37:59', ' [ INSERT 2023-07-12 11:37:59 ], [ login ] ', 1),
(59, 87, 'Ip:2806:2f0:51c0:a214:ae74:43f2:8df7:9465&usuario:aaronrodgers&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:ae74:43f2:8df7:9465', '2023-07-12 11:40:03', NULL, '2023-07-12 11:40:03', '2023-07-12 11:40:03', ' [ INSERT 2023-07-12 11:40:03 ], [ login ] ', 1),
(60, 88, 'Ip:2806:2f0:53e0:e706:5529:36fe:8955:8d25&usuario:Gabbyjdabyd&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:5529:36fe:8955:8d25', '2023-07-12 11:45:42', NULL, '2023-07-12 11:45:42', '2023-07-12 11:45:42', ' [ INSERT 2023-07-12 11:45:42 ], [ login ] ', 1),
(61, 89, 'Ip:2806:2f0:51c0:a214:ae74:43f2:8df7:9465&usuario:tombrady&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:ae74:43f2:8df7:9465', '2023-07-12 11:47:26', NULL, '2023-07-12 11:47:26', '2023-07-12 11:47:26', ' [ INSERT 2023-07-12 11:47:26 ], [ login ] ', 1),
(62, 90, 'Ip:2806:2f0:51c0:a214:ae74:43f2:8df7:9465&usuario:lamarjackson&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:ae74:43f2:8df7:9465', '2023-07-12 11:49:37', NULL, '2023-07-12 11:49:37', '2023-07-12 11:49:37', ' [ INSERT 2023-07-12 11:49:37 ], [ login ] ', 1),
(63, 91, 'Ip:2806:2f0:53e0:e706:6190:7230:a246:2f22&usuario:tombrady&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:6190:7230:a246:2f22', '2023-07-12 11:55:40', NULL, '2023-07-12 11:55:40', '2023-07-12 11:55:40', ' [ INSERT 2023-07-12 11:55:40 ], [ login ] ', 1),
(64, 92, 'Ip:2806:2f0:53e0:e706:6190:7230:a246:2f22&usuario:tombrady&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:6190:7230:a246:2f22', '2023-07-12 11:57:57', NULL, '2023-07-12 11:57:57', '2023-07-12 11:57:57', ' [ INSERT 2023-07-12 11:57:57 ], [ login ] ', 1),
(65, 93, 'Ip:2806:2f0:53e0:e706:6190:7230:a246:2f22&usuario:tombrady@&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:6190:7230:a246:2f22', '2023-07-12 12:01:30', NULL, '2023-07-12 12:01:30', '2023-07-12 12:01:30', ' [ INSERT 2023-07-12 12:01:30 ], [ login ] ', 1),
(66, 94, 'Ip:2806:2f0:53e0:e706:6190:7230:a246:2f22&usuario:tombrady@&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:6190:7230:a246:2f22', '2023-07-12 12:05:29', NULL, '2023-07-12 12:05:29', '2023-07-12 12:05:29', ' [ INSERT 2023-07-12 12:05:29 ], [ login ] ', 1),
(67, 95, 'Ip:2806:2f0:51c0:a214:ae74:43f2:8df7:9465&usuario:rusellwilson&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:ae74:43f2:8df7:9465', '2023-07-12 12:10:15', NULL, '2023-07-12 12:10:15', '2023-07-12 12:10:15', ' [ INSERT 2023-07-12 12:10:15 ], [ login ] ', 1),
(68, 96, 'Ip:2806:2f0:51c0:a214:ae74:43f2:8df7:9465&usuario:nickfoles&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:ae74:43f2:8df7:9465', '2023-07-12 12:12:39', NULL, '2023-07-12 12:12:39', '2023-07-12 12:12:39', ' [ INSERT 2023-07-12 12:12:39 ], [ login ] ', 1),
(69, 97, 'Ip:2806:2f0:53e0:e706:6190:7230:a246:2f22&usuario:AdrianaRa&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:6190:7230:a246:2f22', '2023-07-12 12:13:54', NULL, '2023-07-12 12:13:54', '2023-07-12 12:13:54', ' [ INSERT 2023-07-12 12:13:54 ], [ login ] ', 1),
(70, 98, 'Ip:2806:2f0:53e0:e706:6190:7230:a246:2f22&usuario:VisitadorD&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:6190:7230:a246:2f22', '2023-07-12 12:16:39', NULL, '2023-07-12 12:16:39', '2023-07-12 12:16:39', ' [ INSERT 2023-07-12 12:16:39 ], [ login ] ', 1),
(71, 99, 'Ip:2806:2f0:53e0:e706:6190:7230:a246:2f22&usuario:newPassword&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:6190:7230:a246:2f22', '2023-07-12 12:26:28', NULL, '2023-07-12 12:26:28', '2023-07-12 12:26:28', ' [ INSERT 2023-07-12 12:26:28 ], [ login ] ', 1),
(72, 100, 'Ip:2806:2f0:53e0:e706:6190:7230:a246:2f22&usuario:CarlosAnCarlosAn&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:6190:7230:a246:2f22', '2023-07-12 12:32:07', NULL, '2023-07-12 12:32:07', '2023-07-12 12:32:07', ' [ INSERT 2023-07-12 12:32:07 ], [ login ] ', 1),
(73, 101, 'Ip:2806:2f0:53e0:e706:6190:7230:a246:2f22&usuario:CarlosAnCarlosAn&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:6190:7230:a246:2f22', '2023-07-12 12:34:50', NULL, '2023-07-12 12:34:50', '2023-07-12 12:34:50', ' [ INSERT 2023-07-12 12:34:50 ], [ login ] ', 1),
(74, 102, 'Ip:2806:2f0:53e0:e706:6190:7230:a246:2f22&usuario:$contrasena&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:6190:7230:a246:2f22', '2023-07-12 12:37:01', NULL, '2023-07-12 12:37:01', '2023-07-12 12:37:01', ' [ INSERT 2023-07-12 12:37:01 ], [ login ] ', 1),
(75, 103, 'Ip:2806:2f0:51c0:a214:ae74:43f2:8df7:9465&usuario:michaelvick&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:ae74:43f2:8df7:9465', '2023-07-12 12:41:06', NULL, '2023-07-12 12:41:06', '2023-07-12 12:41:06', ' [ INSERT 2023-07-12 12:41:06 ], [ login ] ', 1),
(76, 105, 'Ip:2806:2f0:51c0:a214:830f:15d9:68f1:9a64&usuario:kylemurray&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:830f:15d9:68f1:9a64', '2023-07-13 07:29:31', NULL, '2023-07-13 07:29:31', '2023-07-13 07:29:31', ' [ INSERT 2023-07-13 07:29:31 ], [ login ] ', 1),
(77, 106, 'Ip:2806:2f0:53e0:e706:a56c:935d:bda2:d800&usuario:tombaider&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:a56c:935d:bda2:d800', '2023-07-13 09:24:00', NULL, '2023-07-13 09:24:00', '2023-07-13 09:24:00', ' [ INSERT 2023-07-13 09:24:00 ], [ login ] ', 1),
(78, 107, 'Ip:2806:2f0:53e0:e706:8e3:9e83:12af:5973&usuario:BaboCartel&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:8e3:9e83:12af:5973', '2023-07-13 10:35:23', NULL, '2023-07-13 10:35:23', '2023-07-13 10:35:23', ' [ INSERT 2023-07-13 10:35:23 ], [ login ] ', 1),
(79, 108, 'Ip:2806:2f0:51c0:a214:25a5:ead2:f3f0:52eb&usuario:jordanlove&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:25a5:ead2:f3f0:52eb', '2023-07-14 02:22:14', NULL, '2023-07-14 02:22:14', '2023-07-14 02:22:14', ' [ INSERT 2023-07-14 02:22:14 ], [ login ] ', 1),
(80, 109, 'Ip:2806:2f0:51c0:a214:25a5:ead2:f3f0:52eb&usuario:juliojones&tipoUsuario:SOCIO', '2806:2f0:51c0:a214:25a5:ead2:f3f0:52eb', '2023-07-14 02:53:32', NULL, '2023-07-14 02:53:32', '2023-07-14 02:53:32', ' [ INSERT 2023-07-14 02:53:32 ], [ login ] ', 1),
(81, 110, 'Ip:2806:2f0:53e0:e706:c81f:8c0c:43ee:4e11&usuario:MarinaCervantes&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:c81f:8c0c:43ee:4e11', '2023-07-16 09:15:41', NULL, '2023-07-16 09:15:41', '2023-07-16 09:15:41', ' [ INSERT 2023-07-16 09:15:41 ], [ login ] ', 1),
(82, 111, 'Ip:2806:2f0:53e0:e706:c81f:8c0c:43ee:4e11&usuario:Alejandra1&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:c81f:8c0c:43ee:4e11', '2023-07-17 08:12:15', NULL, '2023-07-17 08:12:15', '2023-07-17 08:12:15', ' [ INSERT 2023-07-17 08:12:15 ], [ login ] ', 1),
(83, 112, 'Ip:2806:2f0:53e0:e706:c81f:8c0c:43ee:4e11&usuario:alejandra2&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:c81f:8c0c:43ee:4e11', '2023-07-17 08:39:07', NULL, '2023-07-17 08:39:07', '2023-07-17 08:39:07', ' [ INSERT 2023-07-17 08:39:07 ], [ login ] ', 1),
(84, 113, 'Ip:2806:2f0:53e0:e706:5cdf:bfc0:cbac:4cb7&usuario:Carlosandres45&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:5cdf:bfc0:cbac:4cb7', '2023-07-17 10:56:32', NULL, '2023-07-17 10:56:32', '2023-07-17 10:56:32', ' [ INSERT 2023-07-17 10:56:32 ], [ login ] ', 1),
(85, 114, 'Ip:2806:2f0:53e0:e706:5cdf:bfc0:cbac:4cb7&usuario:Carlosandres46&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:5cdf:bfc0:cbac:4cb7', '2023-07-17 11:00:26', NULL, '2023-07-17 11:00:26', '2023-07-17 11:00:26', ' [ INSERT 2023-07-17 11:00:26 ], [ login ] ', 1),
(86, 115, 'Ip:2806:2f0:53e0:e706:c81f:8c0c:43ee:4e11&usuario:Carlosandres47&tipoUsuario:SOCIO', '2806:2f0:53e0:e706:c81f:8c0c:43ee:4e11', '2023-07-17 11:04:45', NULL, '2023-07-17 11:04:45', '2023-07-17 11:04:45', ' [ INSERT 2023-07-17 11:04:45 ], [ login ] ', 1),
(87, 116, 'Ip:2806:102e:12:309d:3560:164f:dc5b:b14f&usuario:Gerardo Cardoso&tipoUsuario:SOCIO', '2806:102e:12:309d:3560:164f:dc5b:b14f', '2023-07-18 11:03:41', NULL, '2023-07-18 11:03:41', '2023-07-18 11:03:41', ' [ INSERT 2023-07-18 11:03:41 ], [ login ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` int(11) NOT NULL,
  `folio` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `estatus` varchar(20) NOT NULL,
  `idAprobacion` int(11) NOT NULL,
  `idRechazo` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idSolicitud`, `folio`, `fecha`, `idUsuario`, `estatus`, `idAprobacion`, `idRechazo`, `comentario`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(11, 11, '2023-02-13 04:24:59', 2, 'ACTIVO', 0, 1, 'Rechazada', '2023-02-13 04:24:59', '2023-07-17 10:46:34', ' [ UPDATE 2023-07-17 10:46:34 ], [ idUser  ] ', 1),
(12, 2, '2023-02-14 02:38:04', 5, 'CONFIRMADA', 0, 0, 'deleted', '2023-02-14 02:38:04', '2023-04-12 01:03:05', ' [ UPDATE 2023-04-12 01:03:05 ], [ idUser 1 ] ', 1),
(13, 3, '2023-02-14 02:38:50', 6, 'CONFIRMADA', 0, 0, 'valverde', '2023-02-14 02:38:50', '2023-04-12 01:04:34', ' [ UPDATE 2023-04-12 01:04:34 ], [ idUser 1 ] ', 1),
(14, 4, '2023-02-14 02:39:31', 7, 'RECHAZADA', 0, 1, 'ES', '2023-02-14 02:39:31', '2023-06-26 09:31:40', ' [ UPDATE 2023-06-26 09:31:40 ], [ idUser 1 ] ', 1),
(15, 5, '2023-02-14 02:40:03', 8, 'ACTIVO', 0, 1, 'valverde', '2023-02-14 02:40:03', '2023-04-17 01:14:30', ' [ UPDATE 2023-04-17 01:14:30 ], [ idUser 1 ] ', 1),
(16, 12, '2023-04-12 10:25:48', 10, 'INACTIVO', 1, 0, 'eded', '2023-02-14 02:40:03', '2023-04-17 01:49:49', ' [ UPDATE 2023-04-17 01:49:49 ], [ idUser 1 ] ', 1),
(17, 13, '0000-00-00 00:00:00', 11, 'PENDIENTE', 1, 1, '', '2023-02-14 02:40:03', '2023-04-12 03:41:54', ' [ DELETE 2023-04-12 03:41:54 ], [ idUser 1 ] ', 1),
(18, 14, '2023-04-12 10:25:48', 18, 'PENDIENTE', 0, 0, 'Pendiente', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ' [ UPDATE 2023-04-12 01:01:29 ], [ idUser 1 ] ', 1),
(19, 9, '2023-04-19 01:19:16', 13, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 01:19:16', '2023-04-19 01:19:16', ' [ INSERT 2023-04-19 01:19:16 ], [ NUEVO SOLICITUD  ] ', 1),
(20, 10, '2023-04-19 01:37:25', 14, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 01:37:25', '2023-04-19 01:37:25', ' [ INSERT 2023-04-19 01:37:25 ], [ NUEVO SOLICITUD  ] ', 1),
(21, 15, '2023-04-19 01:38:56', 15, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 01:38:56', '2023-04-19 01:38:56', ' [ INSERT 2023-04-19 01:38:56 ], [ NUEVO SOLICITUD  ] ', 1),
(22, 16, '2023-04-19 01:43:30', 16, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 01:43:30', '2023-04-19 01:43:30', ' [ INSERT 2023-04-19 01:43:30 ], [ NUEVO SOLICITUD  ] ', 1),
(23, 17, '2023-04-19 01:45:19', 17, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 01:45:19', '2023-04-19 01:45:19', ' [ INSERT 2023-04-19 01:45:19 ], [ NUEVO SOLICITUD  ] ', 1),
(24, 18, '2023-04-19 01:47:10', 18, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 01:47:10', '2023-04-19 01:47:10', ' [ INSERT 2023-04-19 01:47:10 ], [ NUEVO SOLICITUD  ] ', 1),
(25, 19, '2023-04-19 01:47:36', 19, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 01:47:36', '2023-04-19 01:47:36', ' [ INSERT 2023-04-19 01:47:36 ], [ NUEVO SOLICITUD  ] ', 1),
(26, 20, '2023-04-19 01:49:26', 20, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 01:49:26', '2023-04-19 01:49:26', ' [ INSERT 2023-04-19 01:49:26 ], [ NUEVO SOLICITUD  ] ', 1),
(27, 21, '2023-04-19 01:58:56', 21, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 01:58:56', '2023-04-19 01:58:56', ' [ INSERT 2023-04-19 01:58:56 ], [ NUEVO SOLICITUD  ] ', 1),
(28, 22, '2023-04-19 01:52:21', 22, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 01:52:21', '2023-04-19 01:52:21', ' [ INSERT 2023-04-19 01:52:21 ], [ NUEVO SOLICITUD  ] ', 1),
(29, 23, '2023-04-19 07:57:15', 23, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 07:57:15', '2023-04-19 07:57:15', ' [ INSERT 2023-04-19 07:57:15 ], [ NUEVO SOLICITUD  ] ', 1),
(30, 24, '2023-04-19 07:58:44', 24, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 07:58:44', '2023-04-19 07:58:44', ' [ INSERT 2023-04-19 07:58:44 ], [ NUEVO SOLICITUD  ] ', 1),
(31, 25, '2023-04-19 10:04:05', 25, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-19 10:04:05', '2023-04-19 10:04:05', ' [ INSERT 2023-04-19 10:04:05 ], [ NUEVO SOLICITUD  ] ', 1),
(32, 26, '2023-04-20 11:01:37', 26, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-20 11:01:37', '2023-04-20 11:01:37', ' [ INSERT 2023-04-20 11:01:37 ], [ NUEVO SOLICITUD  ] ', 1),
(33, 27, '2023-04-20 11:19:42', 27, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-20 11:19:42', '2023-04-20 11:19:42', ' [ INSERT 2023-04-20 11:19:42 ], [ NUEVO SOLICITUD  ] ', 1),
(34, 28, '2023-04-20 01:44:59', 28, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-20 01:44:59', '2023-04-20 01:44:59', ' [ INSERT 2023-04-20 01:44:59 ], [ NUEVO SOLICITUD  ] ', 1),
(35, 29, '2023-04-21 06:36:11', 29, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-21 06:36:11', '2023-04-21 06:36:11', ' [ INSERT 2023-04-21 06:36:11 ], [ NUEVO SOLICITUD  ] ', 1),
(36, 30, '2023-04-21 07:01:36', 30, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-21 07:01:36', '2023-04-21 07:01:36', ' [ INSERT 2023-04-21 07:01:36 ], [ NUEVO SOLICITUD  ] ', 1),
(37, 31, '2023-04-24 01:55:57', 31, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-24 01:55:57', '2023-04-24 01:55:57', ' [ INSERT 2023-04-24 01:55:57 ], [ NUEVO SOLICITUD  ] ', 1),
(38, 32, '2023-04-25 12:18:06', 32, 'CONFIRMADA', 0, 0, 'SIN COMENTARIOS', '2023-04-25 12:18:06', '2023-05-11 01:38:31', ' [ UPDATE 2023-05-11 01:38:31 ], [ idUser  ] ', 1),
(39, 33, '2023-04-25 01:34:00', 33, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-25 01:34:00', '2023-04-25 01:34:00', ' [ INSERT 2023-04-25 01:34:00 ], [ NUEVO SOLICITUD  ] ', 1),
(40, 34, '2023-04-25 09:45:58', 34, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-25 09:45:58', '2023-04-25 09:45:58', ' [ INSERT 2023-04-25 09:45:58 ], [ NUEVO SOLICITUD  ] ', 1),
(41, 35, '2023-04-25 09:55:31', 35, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-25 09:55:31', '2023-04-25 09:55:31', ' [ INSERT 2023-04-25 09:55:31 ], [ NUEVO SOLICITUD  ] ', 1),
(42, 36, '2023-04-25 10:09:18', 36, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-25 10:09:18', '2023-04-25 10:09:18', ' [ INSERT 2023-04-25 10:09:18 ], [ NUEVO SOLICITUD  ] ', 1),
(43, 37, '2023-04-25 10:14:09', 37, 'ACTIVO', 0, 0, 'SIN COMENTARIOS', '2023-04-25 10:14:09', '2023-06-20 05:39:12', ' [ UPDATE 2023-06-20 05:39:12 ], [ idUser  ] ', 1),
(44, 38, '2023-04-25 10:48:01', 38, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-25 10:48:01', '2023-04-25 10:48:01', ' [ INSERT 2023-04-25 10:48:01 ], [ NUEVO SOLICITUD  ] ', 1),
(45, 39, '2023-04-25 10:56:40', 39, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-25 10:56:40', '2023-04-25 10:56:40', ' [ INSERT 2023-04-25 10:56:40 ], [ NUEVO SOLICITUD  ] ', 1),
(46, 40, '2023-04-25 10:57:36', 40, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-25 10:57:36', '2023-04-25 10:57:36', ' [ INSERT 2023-04-25 10:57:36 ], [ NUEVO SOLICITUD  ] ', 1),
(47, 41, '2023-04-25 11:07:01', 41, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-04-25 11:07:01', '2023-04-25 11:07:01', ' [ INSERT 2023-04-25 11:07:01 ], [ NUEVO SOLICITUD  ] ', 1),
(48, 42, '2023-05-15 09:08:26', 42, 'INCOMPLETA', 0, 0, 'Ponte al tiro', '2023-05-15 09:08:26', '2023-05-15 09:21:24', ' [ UPDATE 2023-05-15 09:21:24 ], [ idUser 1 ] ', 1),
(49, 43, '2023-05-15 09:25:46', 43, 'RECHAZADA', 0, 0, 'NOPE', '2023-05-15 09:25:46', '2023-05-15 09:28:40', ' [ UPDATE 2023-05-15 09:28:40 ], [ idUser 1 ] ', 1),
(50, 44, '2023-05-15 09:32:40', 44, 'CONTRATO', 0, 0, 'SIN COMENTARIOS', '2023-05-15 09:32:40', '2023-05-15 09:34:57', ' [ UPDATE 2023-05-15 09:34:57 ], [ idUser 1 ] ', 1),
(51, 45, '2023-05-15 09:38:04', 45, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-05-15 09:38:04', '2023-05-15 09:38:04', ' [ INSERT 2023-05-15 09:38:04 ], [ NUEVO SOLICITUD  ] ', 1),
(52, 46, '2023-05-15 04:29:18', 46, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-05-15 04:29:18', '2023-05-15 04:29:18', ' [ INSERT 2023-05-15 04:29:18 ], [ NUEVO SOLICITUD  ] ', 1),
(53, 47, '2023-05-15 11:13:35', 47, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-05-15 11:13:35', '2023-05-15 11:13:35', ' [ INSERT 2023-05-15 11:13:35 ], [ NUEVO SOLICITUD  ] ', 1),
(54, 48, '2023-05-15 11:27:56', 48, 'ACTIVO', 0, 0, 'SIN COMENTARIOS', '2023-05-15 11:27:56', '2023-05-16 11:41:40', ' [ UPDATE 2023-05-16 11:41:40 ], [ idUser  ] ', 1),
(55, 49, '2023-05-16 09:51:49', 49, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-05-16 09:51:49', '2023-05-16 09:51:49', ' [ INSERT 2023-05-16 09:51:49 ], [ NUEVO SOLICITUD  ] ', 1),
(56, 50, '2023-05-16 09:52:53', 50, 'RECHAZADA', 0, 0, 'TEST', '2023-05-16 09:52:53', '2023-06-26 09:08:03', ' [ UPDATE 2023-06-26 09:08:03 ], [ idUser 1 ] ', 1),
(57, 51, '2023-05-16 04:19:51', 51, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-05-16 04:19:51', '2023-05-16 04:19:51', ' [ INSERT 2023-05-16 04:19:51 ], [ NUEVO SOLICITUD  ] ', 1),
(58, 52, '2023-05-16 10:08:34', 52, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-05-16 10:08:34', '2023-05-16 10:08:34', ' [ INSERT 2023-05-16 10:08:34 ], [ NUEVO SOLICITUD  ] ', 1),
(59, 53, '2023-05-16 10:09:32', 53, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-05-16 10:09:32', '2023-05-16 10:09:32', ' [ INSERT 2023-05-16 10:09:32 ], [ NUEVO SOLICITUD  ] ', 1),
(60, 54, '2023-05-16 10:12:16', 54, 'ACTIVO', 0, 0, 'SIN COMENTARIOS', '2023-05-16 10:12:16', '2023-05-16 11:48:22', ' [ UPDATE 2023-05-16 11:48:22 ], [ idUser  ] ', 1),
(61, 55, '2023-05-31 06:18:50', 55, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-05-31 06:18:50', '2023-05-31 06:18:50', ' [ INSERT 2023-05-31 06:18:50 ], [ NUEVO SOLICITUD  ] ', 1),
(62, 56, '2023-06-05 09:31:41', 56, 'RECHAZADA', 0, 0, 'TEST', '2023-06-05 09:31:41', '2023-06-26 09:07:57', ' [ UPDATE 2023-06-26 09:07:57 ], [ idUser 1 ] ', 1),
(63, 57, '2023-06-06 04:35:32', 57, 'ACTIVO', 0, 0, 'SIN COMENTARIOS', '2023-06-06 04:35:32', '2023-06-06 04:38:33', ' [ UPDATE 2023-06-06 04:38:33 ], [ idUser  ] ', 1),
(64, 58, '2023-06-07 06:56:57', 58, 'ACTIVO', 0, 0, 'SIN COMENTARIOS', '2023-06-07 06:56:57', '2023-06-07 07:08:13', ' [ UPDATE 2023-06-07 07:08:13 ], [ idUser  ] ', 1),
(65, 59, '2023-06-07 09:45:16', 59, 'ACTIVO', 0, 0, 'SIN COMENTARIOS', '2023-06-07 09:45:16', '2023-06-07 10:39:38', ' [ UPDATE 2023-06-07 10:39:38 ], [ idUser  ] ', 1),
(66, 60, '2023-06-13 10:46:51', 60, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-06-13 10:46:51', '2023-06-13 10:46:51', ' [ INSERT 2023-06-13 10:46:51 ], [ NUEVO SOLICITUD  ] ', 1),
(67, 61, '2023-07-10 01:52:18', 61, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 01:52:18', '2023-07-10 01:52:18', ' [ INSERT 2023-07-10 01:52:18 ], [ NUEVO SOLICITUD  ] ', 1),
(68, 62, '2023-07-10 01:58:25', 62, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 01:58:25', '2023-07-10 01:58:25', ' [ INSERT 2023-07-10 01:58:25 ], [ NUEVO SOLICITUD  ] ', 1),
(69, 63, '2023-07-10 02:04:27', 63, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 02:04:27', '2023-07-10 02:04:27', ' [ INSERT 2023-07-10 02:04:27 ], [ NUEVO SOLICITUD  ] ', 1),
(70, 64, '2023-07-10 02:10:05', 64, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 02:10:05', '2023-07-10 02:10:05', ' [ INSERT 2023-07-10 02:10:05 ], [ NUEVO SOLICITUD  ] ', 1),
(71, 65, '2023-07-10 02:12:07', 65, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 02:12:07', '2023-07-10 02:12:07', ' [ INSERT 2023-07-10 02:12:07 ], [ NUEVO SOLICITUD  ] ', 1),
(72, 66, '2023-07-10 02:12:41', 66, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 02:12:41', '2023-07-10 02:12:41', ' [ INSERT 2023-07-10 02:12:41 ], [ NUEVO SOLICITUD  ] ', 1),
(73, 67, '2023-07-10 02:18:53', 67, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 02:18:53', '2023-07-10 02:18:53', ' [ INSERT 2023-07-10 02:18:53 ], [ NUEVO SOLICITUD  ] ', 1),
(74, 68, '2023-07-10 02:28:15', 68, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 02:28:15', '2023-07-10 02:28:15', ' [ INSERT 2023-07-10 02:28:15 ], [ NUEVO SOLICITUD  ] ', 1),
(75, 69, '2023-07-10 03:19:22', 69, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 03:19:22', '2023-07-10 03:19:22', ' [ INSERT 2023-07-10 03:19:22 ], [ NUEVO SOLICITUD  ] ', 1),
(76, 70, '2023-07-10 03:20:16', 70, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 03:20:16', '2023-07-10 03:20:16', ' [ INSERT 2023-07-10 03:20:16 ], [ NUEVO SOLICITUD  ] ', 1),
(77, 71, '2023-07-10 03:21:56', 71, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 03:21:56', '2023-07-10 03:21:56', ' [ INSERT 2023-07-10 03:21:56 ], [ NUEVO SOLICITUD  ] ', 1),
(78, 72, '2023-07-10 03:22:55', 72, 'RECHAZADA', 0, 0, 'byte', '2023-07-10 03:22:55', '2023-07-12 02:01:07', ' [ UPDATE 2023-07-12 02:01:07 ], [ idUser 1 ] ', 1),
(79, 73, '2023-07-10 03:27:01', 73, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 03:27:01', '2023-07-10 03:27:01', ' [ INSERT 2023-07-10 03:27:01 ], [ NUEVO SOLICITUD  ] ', 1),
(80, 74, '2023-07-10 03:32:38', 74, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 03:32:38', '2023-07-10 03:32:38', ' [ INSERT 2023-07-10 03:32:38 ], [ NUEVO SOLICITUD  ] ', 1),
(81, 75, '2023-07-10 03:34:49', 75, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 03:34:49', '2023-07-10 03:34:49', ' [ INSERT 2023-07-10 03:34:49 ], [ NUEVO SOLICITUD  ] ', 1),
(82, 76, '2023-07-10 03:34:53', 76, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 03:34:53', '2023-07-10 03:34:53', ' [ INSERT 2023-07-10 03:34:53 ], [ NUEVO SOLICITUD  ] ', 1),
(83, 77, '2023-07-10 03:36:35', 77, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-10 03:36:35', '2023-07-10 03:36:35', ' [ INSERT 2023-07-10 03:36:35 ], [ NUEVO SOLICITUD  ] ', 1),
(84, 78, '2023-07-11 12:49:02', 78, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-11 12:49:02', '2023-07-11 12:49:02', ' [ INSERT 2023-07-11 12:49:02 ], [ NUEVO SOLICITUD  ] ', 1),
(85, 79, '2023-07-11 12:51:01', 79, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-11 12:51:01', '2023-07-11 12:51:01', ' [ INSERT 2023-07-11 12:51:01 ], [ NUEVO SOLICITUD  ] ', 1),
(86, 80, '2023-07-11 12:52:52', 80, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-11 12:52:52', '2023-07-11 12:52:52', ' [ INSERT 2023-07-11 12:52:52 ], [ NUEVO SOLICITUD  ] ', 1),
(87, 81, '2023-07-11 10:19:20', 81, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-11 10:19:20', '2023-07-11 10:19:20', ' [ INSERT 2023-07-11 10:19:20 ], [ NUEVO SOLICITUD  ] ', 1),
(88, 82, '2023-07-12 07:37:20', 82, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 07:37:20', '2023-07-12 07:37:20', ' [ INSERT 2023-07-12 07:37:20 ], [ NUEVO SOLICITUD  ] ', 1),
(89, 83, '2023-07-12 10:33:25', 83, 'CONTRATO', 0, 0, 'SIN COMENTARIOS', '2023-07-12 10:33:25', '2023-07-12 10:35:48', ' [ UPDATE 2023-07-12 10:35:48 ], [ idUser 1 ] ', 1),
(90, 84, '2023-07-12 10:55:05', 84, 'ACTIVO', 0, 0, 'SIN COMENTARIOS', '2023-07-12 10:55:05', '2023-07-12 11:04:08', ' [ UPDATE 2023-07-12 11:04:08 ], [ idUser  ] ', 1),
(91, 85, '2023-07-12 11:32:58', 85, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 11:32:58', '2023-07-12 11:32:58', ' [ INSERT 2023-07-12 11:32:58 ], [ NUEVO SOLICITUD  ] ', 1),
(92, 86, '2023-07-12 11:37:59', 86, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 11:37:59', '2023-07-12 11:37:59', ' [ INSERT 2023-07-12 11:37:59 ], [ NUEVO SOLICITUD  ] ', 1),
(93, 87, '2023-07-12 11:40:03', 87, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 11:40:03', '2023-07-12 11:40:03', ' [ INSERT 2023-07-12 11:40:03 ], [ NUEVO SOLICITUD  ] ', 1),
(94, 88, '2023-07-12 11:45:42', 88, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 11:45:42', '2023-07-12 11:45:42', ' [ INSERT 2023-07-12 11:45:42 ], [ NUEVO SOLICITUD  ] ', 1),
(95, 89, '2023-07-12 11:47:26', 89, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 11:47:26', '2023-07-12 11:47:26', ' [ INSERT 2023-07-12 11:47:26 ], [ NUEVO SOLICITUD  ] ', 1),
(96, 90, '2023-07-12 11:49:37', 90, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 11:49:37', '2023-07-12 11:49:37', ' [ INSERT 2023-07-12 11:49:37 ], [ NUEVO SOLICITUD  ] ', 1),
(97, 91, '2023-07-12 11:55:40', 91, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 11:55:40', '2023-07-12 11:55:40', ' [ INSERT 2023-07-12 11:55:40 ], [ NUEVO SOLICITUD  ] ', 1),
(98, 92, '2023-07-12 11:57:57', 92, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 11:57:57', '2023-07-12 11:57:57', ' [ INSERT 2023-07-12 11:57:57 ], [ NUEVO SOLICITUD  ] ', 1),
(99, 93, '2023-07-12 12:01:30', 93, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 12:01:30', '2023-07-12 12:01:30', ' [ INSERT 2023-07-12 12:01:30 ], [ NUEVO SOLICITUD  ] ', 1),
(100, 94, '2023-07-12 12:05:29', 94, 'RECHAZADA', 0, 0, 'bye', '2023-07-12 12:05:29', '2023-07-12 02:01:26', ' [ UPDATE 2023-07-12 02:01:26 ], [ idUser 1 ] ', 1),
(101, 95, '2023-07-12 12:10:15', 95, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 12:10:15', '2023-07-12 12:10:15', ' [ INSERT 2023-07-12 12:10:15 ], [ NUEVO SOLICITUD  ] ', 1),
(102, 96, '2023-07-12 12:12:39', 96, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 12:12:39', '2023-07-12 12:12:39', ' [ INSERT 2023-07-12 12:12:39 ], [ NUEVO SOLICITUD  ] ', 1),
(103, 97, '2023-07-12 12:13:54', 97, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 12:13:54', '2023-07-12 12:13:54', ' [ INSERT 2023-07-12 12:13:54 ], [ NUEVO SOLICITUD  ] ', 1),
(104, 98, '2023-07-12 12:16:39', 98, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 12:16:39', '2023-07-12 12:16:39', ' [ INSERT 2023-07-12 12:16:39 ], [ NUEVO SOLICITUD  ] ', 1),
(105, 99, '2023-07-12 12:26:28', 99, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 12:26:28', '2023-07-12 12:26:28', ' [ INSERT 2023-07-12 12:26:28 ], [ NUEVO SOLICITUD  ] ', 1),
(106, 100, '2023-07-12 12:32:07', 100, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 12:32:07', '2023-07-12 12:32:07', ' [ INSERT 2023-07-12 12:32:07 ], [ NUEVO SOLICITUD  ] ', 1),
(107, 101, '2023-07-12 12:34:50', 101, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 12:34:50', '2023-07-12 12:34:50', ' [ INSERT 2023-07-12 12:34:50 ], [ NUEVO SOLICITUD  ] ', 1),
(108, 102, '2023-07-12 12:37:01', 102, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-12 12:37:01', '2023-07-12 12:37:01', ' [ INSERT 2023-07-12 12:37:01 ], [ NUEVO SOLICITUD  ] ', 1),
(109, 103, '2023-07-12 12:41:06', 103, 'ACTIVO', 0, 0, 'SIN COMENTARIOS', '2023-07-12 12:41:06', '2023-07-12 12:47:04', ' [ UPDATE 2023-07-12 12:47:04 ], [ idUser  ] ', 1),
(110, 104, '2023-07-13 07:29:31', 105, 'ACTIVO', 0, 0, 'SIN COMENTARIOS', '2023-07-13 07:29:31', '2023-07-13 10:24:57', ' [ UPDATE 2023-07-13 10:24:57 ], [ idUser  ] ', 1),
(111, 105, '2023-07-13 09:24:00', 106, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-13 09:24:00', '2023-07-13 09:24:00', ' [ INSERT 2023-07-13 09:24:00 ], [ NUEVO SOLICITUD  ] ', 1),
(112, 106, '2023-07-13 10:35:23', 107, 'CONFIRMADA', 0, 0, 'SIN COMENTARIOS', '2023-07-13 10:35:23', '2023-07-13 10:37:28', ' [ UPDATE 2023-07-13 10:37:28 ], [ idUser  ] ', 1),
(113, 107, '2023-07-14 02:22:14', 108, 'CONTRATO', 0, 0, 'SIN COMENTARIOS', '2023-07-14 02:22:14', '2023-07-14 02:47:54', ' [ UPDATE 2023-07-14 02:47:54 ], [ idUser 1 ] ', 1),
(114, 108, '2023-07-14 02:53:32', 109, 'CONTRATO', 0, 0, 'SIN COMENTARIOS', '2023-07-14 02:53:32', '2023-07-14 02:56:20', ' [ UPDATE 2023-07-14 02:56:20 ], [ idUser 1 ] ', 1),
(115, 109, '2023-07-16 09:15:41', 110, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-16 09:15:41', '2023-07-16 09:15:41', ' [ INSERT 2023-07-16 09:15:41 ], [ NUEVO SOLICITUD  ] ', 1),
(116, 110, '2023-07-17 08:12:15', 111, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-17 08:12:15', '2023-07-17 08:12:15', ' [ INSERT 2023-07-17 08:12:15 ], [ NUEVO SOLICITUD  ] ', 1),
(117, 111, '2023-07-17 08:39:07', 112, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-17 08:39:07', '2023-07-17 08:39:07', ' [ INSERT 2023-07-17 08:39:07 ], [ NUEVO SOLICITUD  ] ', 1),
(118, 112, '2023-07-17 10:56:32', 113, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-17 10:56:32', '2023-07-17 10:56:32', ' [ INSERT 2023-07-17 10:56:32 ], [ NUEVO SOLICITUD  ] ', 1),
(119, 113, '2023-07-17 11:00:26', 114, 'PENDIENTE', 0, 0, 'SIN COMENTARIOS', '2023-07-17 11:00:26', '2023-07-17 11:00:26', ' [ INSERT 2023-07-17 11:00:26 ], [ NUEVO SOLICITUD  ] ', 1),
(120, 114, '2023-07-17 11:04:45', 115, 'ACTIVO', 0, 0, 'SIN COMENTARIOS', '2023-07-17 11:04:45', '2023-07-17 11:08:58', ' [ UPDATE 2023-07-17 11:08:58 ], [ idUser  ] ', 1),
(121, 115, '2023-07-18 11:03:41', 116, 'ACTIVO', 0, 0, 'SIN COMENTARIOS', '2023-07-18 11:03:41', '2023-07-18 11:48:15', ' [ UPDATE 2023-07-18 11:48:15 ], [ idUser  ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudComentarios`
--

CREATE TABLE `solicitudComentarios` (
  `idSComentario` int(11) NOT NULL,
  `idSolicitud` int(11) DEFAULT NULL,
  `comentario` text NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitudComentarios`
--

INSERT INTO `solicitudComentarios` (`idSComentario`, `idSolicitud`, `comentario`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 14, 'asdasdasdasd', '2023-04-10 10:10:27', '2023-04-10 10:10:27', ' [ INSERT 2023-04-10 10:10:27 ], [ idUser 1 ] ', 1),
(2, 15, 'IncompletoIncompletoIncompletoIncompletoIncompletoIncompletoIncompletoIncompletoIncompleto', '2023-04-10 10:11:21', '2023-04-10 10:11:21', ' [ INSERT 2023-04-10 10:11:21 ], [ idUser 1 ] ', 1),
(3, 15, 'sdfgfg', '2023-04-10 10:33:54', '2023-04-10 10:33:54', ' [ INSERT 2023-04-10 10:33:54 ], [ idUser 1 ] ', 1),
(4, 15, 'dsfgdfg', '2023-04-10 10:34:05', '2023-04-10 10:34:05', ' [ INSERT 2023-04-10 10:34:05 ], [ idUser 1 ] ', 1),
(5, 16, 'eded', '2023-04-12 12:56:42', '2023-04-12 12:56:42', ' [ INSERT 2023-04-12 12:56:42 ], [ idUser 1 ] ', 1),
(6, 17, 'Rechazado desde la interfaz', '2023-04-12 01:01:29', '2023-04-12 01:01:29', ' [ INSERT 2023-04-12 01:01:29 ], [ idUser 1 ] ', 1),
(7, 12, 'deleted', '2023-04-12 01:03:05', '2023-04-12 01:03:05', ' [ INSERT 2023-04-12 01:03:05 ], [ idUser 1 ] ', 1),
(8, 15, 'valverde', '2023-04-12 01:04:20', '2023-04-12 01:04:20', ' [ INSERT 2023-04-12 01:04:20 ], [ idUser 1 ] ', 1),
(9, 11, 'valverde\r\n', '2023-04-12 01:04:27', '2023-04-12 01:04:27', ' [ INSERT 2023-04-12 01:04:27 ], [ idUser 1 ] ', 1),
(10, 13, 'valverde', '2023-04-12 01:04:34', '2023-04-12 01:04:34', ' [ INSERT 2023-04-12 01:04:34 ], [ idUser 1 ] ', 1),
(11, 14, 'INCOMPLETA', '2023-04-17 01:14:14', '2023-04-17 01:14:14', ' [ INSERT 2023-04-17 01:14:14 ], [ idUser 1 ] ', 1),
(12, 11, 'Rechazada', '2023-04-17 01:50:07', '2023-04-17 01:50:07', ' [ INSERT 2023-04-17 01:50:07 ], [ idUser 1 ] ', 1),
(13, 48, 'Ponte al tiro', '2023-05-15 09:21:24', '2023-05-15 09:21:24', ' [ INSERT 2023-05-15 09:21:24 ], [ idUser 1 ] ', 1),
(14, 49, 'NOPE', '2023-05-15 09:28:40', '2023-05-15 09:28:40', ' [ INSERT 2023-05-15 09:28:40 ], [ idUser 1 ] ', 1),
(15, 62, 'TEST', '2023-06-26 09:07:57', '2023-06-26 09:07:57', ' [ INSERT 2023-06-26 09:07:57 ], [ idUser 1 ] ', 1),
(16, 56, 'TEST', '2023-06-26 09:08:03', '2023-06-26 09:08:03', ' [ INSERT 2023-06-26 09:08:03 ], [ idUser 1 ] ', 1),
(17, 14, 'ES', '2023-06-26 09:31:40', '2023-06-26 09:31:40', ' [ INSERT 2023-06-26 09:31:40 ], [ idUser 1 ] ', 1),
(18, 78, 'byte', '2023-07-12 02:01:07', '2023-07-12 02:01:07', ' [ INSERT 2023-07-12 02:01:07 ], [ idUser 1 ] ', 1),
(19, 100, 'bye', '2023-07-12 02:01:26', '2023-07-12 02:01:26', ' [ INSERT 2023-07-12 02:01:26 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solictudVisita`
--

CREATE TABLE `solictudVisita` (
  `idSVisita` int(11) NOT NULL,
  `idUsuarioSV` int(11) NOT NULL,
  `idUsuarioSC` int(11) NOT NULL,
  `idCampana` int(11) NOT NULL,
  `folio` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idServideo` int(11) NOT NULL,
  `idComicion` int(11) NOT NULL,
  `idTVehidculo` int(11) NOT NULL,
  `idCCobro` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `estatus` varchar(20) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoVehiculo`
--

CREATE TABLE `tipoVehiculo` (
  `idTVehiculo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoVehiculo`
--

INSERT INTO `tipoVehiculo` (`idTVehiculo`, `nombre`, `descripcion`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'ModuleCatalogsVehicles', 'ModuleCatalogsVehicles', '2023-02-08 07:52:43', '2023-02-08 07:52:51', ' [ DELETE 2023-02-08 07:52:51 ], [ idUser 1 ] ', 0),
(2, 'Mexico', 'Mexico Mexico', '2023-02-08 08:31:16', '2023-02-08 08:31:27', ' [ DELETE 2023-02-08 08:31:27 ], [ idUser 1 ] ', 0),
(3, 'Moto', '', '2023-02-09 04:14:26', '2023-02-09 04:14:26', ' [ INSERT 2023-02-09 04:14:26 ], [ idUser  ] ', 1),
(4, 'Carro', '', '2023-02-09 04:14:32', '2023-02-09 04:14:32', ' [ INSERT 2023-02-09 04:14:32 ], [ idUser  ] ', 1),
(5, 'Camion', '', '2023-02-09 04:14:41', '2023-02-09 04:14:41', ' [ INSERT 2023-02-09 04:14:41 ], [ idUser  ] ', 1),
(6, 'TRAILER MODIFICADO', 'DESRIPCION GENERICA MODIFICADA', '2023-04-13 09:56:28', '2023-04-13 09:56:42', ' [ DELETE 2023-04-13 09:56:42 ], [ idUser 1 ] ', 0),
(7, 'PICKUP', '', '2023-07-12 01:55:20', '2023-07-12 01:55:20', ' [ INSERT 2023-07-12 01:55:20 ], [ idUser 1 ] ', 1),
(8, 'TRAILR', '', '2023-07-12 01:55:38', '2023-07-12 01:55:38', ' [ INSERT 2023-07-12 01:55:38 ], [ idUser 1 ] ', 1),
(9, 'FERRZR', '', '2023-07-12 01:55:47', '2023-07-12 01:55:47', ' [ INSERT 2023-07-12 01:55:47 ], [ idUser 1 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tockenRecuperacion`
--

CREATE TABLE `tockenRecuperacion` (
  `idTRecuperacion` int(11) NOT NULL,
  `idUsuario` varchar(60) NOT NULL,
  `fechaPeticion` varchar(60) NOT NULL,
  `email` varchar(12) NOT NULL,
  `tocken` text NOT NULL,
  `status` text NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tockenRecuperacion`
--

INSERT INTO `tockenRecuperacion` (`idTRecuperacion`, `idUsuario`, `fechaPeticion`, `email`, `tocken`, `status`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, '1', '2023-06-29 09:33:54', 'CarlosAndres', 'JDJ5JDEwJFJXVUd4cjdwWHJMTHNJMXBvRG1JdWVhTFByT1FRWldtMjRqTmk1ZlpUdGZyYTA4MVhkL2xH', 'PENDIENTE', '2023-06-29 09:33:54', '2023-06-29 09:33:54', ' [ INSERT 2023-06-29 09:33:54 ], [ idUser 1 ] ', 1),
(2, '1', '2023-06-29 09:37:36', 'CarlosAndres', 'JDJ5JDEwJDF2ZFBxRXV3Vi92ZzFyRkQ2RmFkai5oZ2hNT3NPNS85cTRkajgxMldVLzZ2TGtGY3VITldl', 'PENDIENTE', '2023-06-29 09:37:36', '2023-06-29 09:37:36', ' [ INSERT 2023-06-29 09:37:36 ], [ idUser 1 ] ', 1),
(3, '1', '2023-06-29 09:39:09', 'CarlosAndres', 'JDJ5JDEwJDF5SkhBc2dYaG9XZ1ZDMkwxS2pjdU81a3UxdU1PVXNubnhzcTV6d08wblpPdVN5R2tieDYu', 'PENDIENTE', '2023-06-29 09:39:09', '2023-06-29 09:39:09', ' [ INSERT 2023-06-29 09:39:09 ], [ idUser 1 ] ', 1),
(4, '1', '2023-06-29 09:39:51', 'CarlosAndres', 'JDJ5JDEwJFEwaURELlFVNzcxM1pBYUl5ei9nd3VTclN0YVJERThkTzZvd0NkVEx5blVsSkFPS2htR1Nl', 'PENDIENTE', '2023-06-29 09:39:51', '2023-06-29 09:39:51', ' [ INSERT 2023-06-29 09:39:51 ], [ idUser 1 ] ', 1),
(5, '1', '2023-06-29 09:40:20', 'CarlosAndres', 'JDJ5JDEwJFIvRmxqQ3VZLlM5Nk1admtEQmlLL2VwQ3FidzhONnFnZTZEY2NnSFk3QkFTaTNVSGg3Z3h5', 'PENDIENTE', '2023-06-29 09:40:20', '2023-06-29 09:40:20', ' [ INSERT 2023-06-29 09:40:20 ], [ idUser 1 ] ', 1),
(6, '1', '2023-06-29 09:40:30', 'CarlosAndres', 'JDJ5JDEwJGZ5WnU1Umh0bGwvR3Q3cTN0RHg0RU9zUlNoQS9oYlF0QjNMYzVWLjNVTkdvN3pZaS8zNkdP', 'PENDIENTE', '2023-06-29 09:40:30', '2023-06-29 09:40:30', ' [ INSERT 2023-06-29 09:40:30 ], [ idUser 1 ] ', 1),
(7, '1', '2023-06-29 09:40:41', 'CarlosAndres', 'JDJ5JDEwJGIuaUxyaVhDN1UvWC5sMTlvTW9CUS4vcVBXZG1vbVpBeFFmQ0ZDVWtVeWQ5TmtKekFoRi5p', 'PENDIENTE', '2023-06-29 09:40:41', '2023-06-29 09:40:41', ' [ INSERT 2023-06-29 09:40:41 ], [ idUser 1 ] ', 1),
(8, '1', '2023-06-29 09:40:50', 'CarlosAndres', 'JDJ5JDEwJDdvYzBvRTMzQld0cEpRa2ttZjlmMHUxaFIuWWVVVEc0VUNXRXFGOXBHNnE3alFhRHZlZ1dP', 'PENDIENTE', '2023-06-29 09:40:50', '2023-06-29 09:40:50', ' [ INSERT 2023-06-29 09:40:50 ], [ idUser 1 ] ', 1),
(9, '1', '2023-06-29 09:40:52', 'CarlosAndres', 'JDJ5JDEwJG8vMUxFL0ZCLlhXT21UT3FiYTVJNmVCd2xvcnJFaG1sdmx2RWtsSnlOdFA1Q0g1Q0duVTVH', 'PENDIENTE', '2023-06-29 09:40:52', '2023-06-29 09:40:52', ' [ INSERT 2023-06-29 09:40:52 ], [ idUser 1 ] ', 1),
(10, '1', '2023-06-29 09:40:53', 'CarlosAndres', 'JDJ5JDEwJFpOM0pMU05VUGcyNDRlZGJzd1BGMU9YU3FjNXhmdGpPVTBXSUNvZmtaOGo3Z2ExV28zdjBL', 'PENDIENTE', '2023-06-29 09:40:53', '2023-06-29 09:40:53', ' [ INSERT 2023-06-29 09:40:53 ], [ idUser 1 ] ', 1),
(11, '1', '2023-06-29 09:42:35', 'CarlosAndres', 'JDJ5JDEwJEhmVWJTMTI0YUpaeHFxN3Q3VnhiZGVGSVhtazZ0R3lHM01VNEFBSW90LnNUY0hmYXRSazdX', 'PENDIENTE', '2023-06-29 09:42:35', '2023-06-29 09:42:35', ' [ INSERT 2023-06-29 09:42:35 ], [ idUser 1 ] ', 1),
(12, '1', '2023-06-29 09:45:05', 'CarlosAndres', 'JDJ5JDEwJFpDZ3hJcGowcExWRVdFeFBLMVdDZmVBOGJBblBZN3N6bXRXWi9heU5FVHNmMS43eENjMW1H', 'PENDIENTE', '2023-06-29 09:45:05', '2023-06-29 09:45:05', ' [ INSERT 2023-06-29 09:45:05 ], [ idUser 1 ] ', 1),
(13, '1', '2023-06-29 09:48:21', 'CarlosAndres', 'JDJ5JDEwJHI4aWlPTzRzaTJqem51dmVidk5FQWV5WVdYUlNYS3FsUTduWEJJczdDVDVUUmpuUEpsM0xP', 'PENDIENTE', '2023-06-29 09:48:21', '2023-06-29 09:48:21', ' [ INSERT 2023-06-29 09:48:21 ], [ idUser 1 ] ', 1),
(14, '1', '2023-06-29 09:49:15', 'CarlosAndres', 'JDJ5JDEwJGZuOXNoS0o4dUNnQ0pmOFpnUU9xci53TUpGMUtDdE1mZEhtem01dzhrdGJ3T29rSHY3Y3lP', 'PENDIENTE', '2023-06-29 09:49:15', '2023-06-29 09:49:15', ' [ INSERT 2023-06-29 09:49:15 ], [ idUser 1 ] ', 1),
(15, '1', '2023-06-29 09:50:43', 'CarlosAndres', 'JDJ5JDEwJGN2WHhEVzlFOGZXT1lmcmpxdEVhWHVEMDVYQjYueWR6WXhGbGQwdU1VYXM0STlId0V5R0J1', 'PENDIENTE', '2023-06-29 09:50:43', '2023-06-29 09:50:43', ' [ INSERT 2023-06-29 09:50:43 ], [ idUser 1 ] ', 1),
(16, '1', '2023-06-29 09:51:29', 'CarlosAndres', 'JDJ5JDEwJHZkMFdBek44UE5rclVHRTU5N0xBUXU0R05Ia1BJTzlvQjZHc2QxenlCSEJjaS51LldPeUht', 'PENDIENTE', '2023-06-29 09:51:29', '2023-06-29 09:51:29', ' [ INSERT 2023-06-29 09:51:29 ], [ idUser 1 ] ', 1),
(17, '1', '2023-06-29 09:52:25', 'CarlosAndres', 'JDJ5JDEwJG1HSG9rVVY2MHJ4aGVwWERZeWhjUC4vZ3B2OEFOOWVTVkM3TDVISVQwRnpyQlJjZnR6ei9t', 'PENDIENTE', '2023-06-29 09:52:25', '2023-06-29 09:52:25', ' [ INSERT 2023-06-29 09:52:25 ], [ idUser 1 ] ', 1),
(18, '1', '2023-06-29 09:54:06', 'CarlosAndres', 'JDJ5JDEwJGljdXlnLm04emIyY01rQ0ZRWk03RnVObm1sQXdMQ0x3RGo1R3RsTVpZdlVxdlEyNHJ2aURL', 'PENDIENTE', '2023-06-29 09:54:06', '2023-06-29 09:54:06', ' [ INSERT 2023-06-29 09:54:06 ], [ idUser 1 ] ', 1),
(19, '1', '2023-06-29 09:54:59', 'CarlosAndres', 'JDJ5JDEwJFg0dWFCWWkyenZ1bTFGVmxwR2dVdGU3bmlvdS9FNlZsOHdCaklyMkE1UzlzREtCN3g2ejJx', 'PENDIENTE', '2023-06-29 09:54:59', '2023-06-29 09:54:59', ' [ INSERT 2023-06-29 09:54:59 ], [ idUser 1 ] ', 1),
(20, '1', '2023-06-29 09:56:08', 'CarlosAndres', 'JDJ5JDEwJDYuTXVtVGJGNmhERlhjWVFmYWVEZGV5Q0lMYlNMeFUyanU5SEZNQU9ONTN2MHY2WVBGNVVT', 'PENDIENTE', '2023-06-29 09:56:08', '2023-06-29 09:56:08', ' [ INSERT 2023-06-29 09:56:08 ], [ idUser 1 ] ', 1),
(21, '1', '2023-06-29 09:56:13', 'CarlosAndres', 'JDJ5JDEwJFdiSmp4bnRWd3Y1SUdzcXIwMXVueXVZcGVqak9qS05vZ2xNSmtRVnFnYXVtZ0FMNFdxM28u', 'PENDIENTE', '2023-06-29 09:56:13', '2023-06-29 09:56:13', ' [ INSERT 2023-06-29 09:56:13 ], [ idUser 1 ] ', 1),
(22, '1', '2023-06-29 09:56:17', 'CarlosAndres', 'JDJ5JDEwJHpvWjhCUnBBNjFWZHhmODJILjMvQ3VBSEVmY1lhUVhyV0lZZ0NCWThTbjlBcHFQbk4vMjRx', 'PENDIENTE', '2023-06-29 09:56:17', '2023-06-29 09:56:17', ' [ INSERT 2023-06-29 09:56:17 ], [ idUser 1 ] ', 1),
(23, '1', '2023-06-29 09:56:18', 'CarlosAndres', 'JDJ5JDEwJG9mQmo3SFNlbXNhYlcvVUl3akFjUGVuTW82RmN1S0lVTHVuWVI0OXhkVEwzMW9NMDVNc0px', 'PENDIENTE', '2023-06-29 09:56:18', '2023-06-29 09:56:18', ' [ INSERT 2023-06-29 09:56:18 ], [ idUser 1 ] ', 1),
(24, '1', '2023-06-29 09:56:19', 'CarlosAndres', 'JDJ5JDEwJG5wOGZqNGU3dXFvNEw2RE4zLnJldk9wNndma25rUUx2UU5QaUhndy5uNkYxc0dUdEM3SVd1', 'PENDIENTE', '2023-06-29 09:56:19', '2023-06-29 09:56:19', ' [ INSERT 2023-06-29 09:56:19 ], [ idUser 1 ] ', 1),
(25, '1', '2023-06-29 09:58:06', 'CarlosAndres', 'JDJ5JDEwJHhlaWF1TkJHdlUxUGRmOElrU20xY09rL3VLWjhtb1VZWFB3QkhKcC5Gek9FdHBPbGN5Ty5l', 'PENDIENTE', '2023-06-29 09:58:06', '2023-06-29 09:58:06', ' [ INSERT 2023-06-29 09:58:06 ], [ idUser 1 ] ', 1),
(26, '1', '2023-06-29 10:00:00', 'CarlosAndres', 'JDJ5JDEwJEF4U3VWeGw5NU5lMTNkOUhNMkZLMk9uUHZWbkhKVzJmT1lhTnhxa3dycm9lYTg5V0RlY1NX', 'PENDIENTE', '2023-06-29 10:00:00', '2023-06-29 10:00:00', ' [ INSERT 2023-06-29 10:00:00 ], [ idUser 1 ] ', 1),
(27, '1', '2023-06-29 10:03:46', 'CarlosAndres', 'JDJ5JDEwJEFneGFGNDRPSFRKa1hOYmNnTUxhRXUzRFdQaWI5TkQvWktBQ0I4Z05nRElBREtCYzlZYnRD', 'PENDIENTE', '2023-06-29 10:03:46', '2023-06-29 10:03:46', ' [ INSERT 2023-06-29 10:03:46 ], [ idUser 1 ] ', 1),
(28, '1', '2023-06-29 10:03:58', 'CarlosAndres', 'JDJ5JDEwJGpuLnVQbW1WZ1dLWWVqeVJDMk1MbC5waW0yYVR5NjVjVTJjemtnd2FwN1YwZ0hSR1hNNzBt', 'PENDIENTE', '2023-06-29 10:03:58', '2023-06-29 10:03:58', ' [ INSERT 2023-06-29 10:03:58 ], [ idUser 1 ] ', 1),
(29, '1', '2023-06-29 10:29:17', 'CarlosAndres', 'JDJ5JDEwJGNyWW03ZjBBRWZDT2lYYlNLd3pVZU9NekVkVk9HWkFZeFpxdlFFay9RMXJYT01XZENBVzky', 'PENDIENTE', '2023-06-29 10:29:17', '2023-06-29 10:29:17', ' [ INSERT 2023-06-29 10:29:17 ], [ idUser 1 ] ', 1),
(30, '1', '2023-06-29 10:32:43', 'CarlosAndres', 'JDJ5JDEwJGI4dmZyU3NFMjdnb003aXlVdmJ4ei5OMHZsUUs3blNkZUNtZkttbFJmLy4wd25SdTRCSXQy', 'PENDIENTE', '2023-06-29 10:32:43', '2023-06-29 10:32:43', ' [ INSERT 2023-06-29 10:32:43 ], [ idUser 1 ] ', 1),
(31, '1', '2023-06-29 10:37:48', 'CarlosAndres', 'JDJ5JDEwJHd1Z1IwY3FPTUkya0M2VFg1cWlmbXU1ejF5NHhacDNGMlNJTFguMHp3T2dyUnFlbVJlQWo2', 'PENDIENTE', '2023-06-29 10:37:48', '2023-06-29 10:37:48', ' [ INSERT 2023-06-29 10:37:48 ], [ idUser 1 ] ', 1),
(32, '1', '2023-06-30 12:51:19', 'CarlosAndres', 'JDJ5JDEwJFNVNVo1SW5CR2xiNWhhNTV5NFNHSi5sY3A2U0NjLkx3TFN1dnVpWlgwTGNzVVpkbjcyOE0u', 'USADA', '2023-06-30 12:51:19', '2023-06-30 10:15:10', ' [ UPFATE 2023-06-30 10:15:10 ], [ idUser  ] ', 1),
(33, '1', '2023-06-30 12:55:33', 'CarlosAndres', 'JDJ5JDEwJFFPcm5XRzhaMDI5em94Njdra2lYQ3VBOGJ0U0JtLjdzWjBUL3VZTXFIZ2VDdXhlYkhuRFZt', 'PENDIENTE', '2023-06-30 12:55:33', '2023-06-30 12:55:33', ' [ INSERT 2023-06-30 12:55:33 ], [ idUser 1 ] ', 1),
(34, '1', '2023-06-30 12:55:47', 'CarlosAndres', 'JDJ5JDEwJGouSHV0dUZLRmRrdm9qY3BOZnhOSWVpMFA0b2lsV0VaTG8uQ21icU15UzVaUEpYRmoyZmhH', 'PENDIENTE', '2023-06-30 12:55:47', '2023-06-30 12:55:47', ' [ INSERT 2023-06-30 12:55:47 ], [ idUser 1 ] ', 1),
(35, '1', '2023-06-30 12:59:38', 'CarlosAndres', 'JDJ5JDEwJEl3Y2gzMzA4SmVuWGtuRHFnZGhPRHVQQlBBa0VKcXpuNDhoVlNGL3dzQVEwc3BkWW4waDQu', 'PENDIENTE', '2023-06-30 12:59:38', '2023-06-30 12:59:38', ' [ INSERT 2023-06-30 12:59:38 ], [ idUser 1 ] ', 1),
(36, '1', '2023-06-30 01:09:17', 'CarlosAndres', 'JDJ5JDEwJEJMV0Y5cTJ5dDNTQUhXTHdaNy9VWnVCN2Z4VklldGw2QldSbVVqc1ZTazlvcWhvUC9URjRl', 'PENDIENTE', '2023-06-30 01:09:17', '2023-06-30 01:09:17', ' [ INSERT 2023-06-30 01:09:17 ], [ idUser 1 ] ', 1),
(37, '1', '2023-06-30 01:15:24', 'CarlosAndres', 'JDJ5JDEwJFpLSjhJYWhyRGJqNGhFWnVIVFVYdWVPdnQud2F4NEI2dHphQktzYklZSEUxUEFIU3VHcC9x', 'PENDIENTE', '2023-06-30 01:15:24', '2023-06-30 01:15:24', ' [ INSERT 2023-06-30 01:15:24 ], [ idUser 1 ] ', 1),
(38, '1', '2023-06-30 01:16:05', 'CarlosAndres', 'JDJ5JDEwJGNUYW41MWxDMDljSHNrZ0xsL1pkVC4wOUVRVlRVZ2pucVA0bE5ZbkNIVmN5QktSWnI2bENp', 'PENDIENTE', '2023-06-30 01:16:05', '2023-06-30 01:16:05', ' [ INSERT 2023-06-30 01:16:05 ], [ idUser 1 ] ', 1),
(39, '1', '2023-06-30 01:16:38', 'CarlosAndres', 'JDJ5JDEwJFNtbGVFdmE2c0dFM0tFOTZoMTlmNC5YYjhWc3h3SUFuRHBuMmFHNHhsM0dlZEpNWi9nS0Nt', 'PENDIENTE', '2023-06-30 01:16:38', '2023-06-30 01:16:38', ' [ INSERT 2023-06-30 01:16:38 ], [ idUser 1 ] ', 1),
(40, '1', '2023-06-30 01:17:01', 'CarlosAndres', 'JDJ5JDEwJHV1bXBKdWMweUJUSDZBdGZ6VVhEZGUvZ2wwL0l3WHp5a3ZCYWlKM0diZTN1WFVUMkNsWTE2', 'PENDIENTE', '2023-06-30 01:17:01', '2023-06-30 01:17:01', ' [ INSERT 2023-06-30 01:17:01 ], [ idUser 1 ] ', 1),
(41, '1', '2023-06-30 01:18:11', 'CarlosAndres', 'JDJ5JDEwJDhIaC5XNDlnWnlGeHJSN0ZlLzFKU2U0eWlWRy45SVlYR3kxSnJlYWdTV3BQNE1Cc3hxVlBh', 'PENDIENTE', '2023-06-30 01:18:11', '2023-06-30 01:18:11', ' [ INSERT 2023-06-30 01:18:11 ], [ idUser 1 ] ', 1),
(42, '2', '2023-07-03 07:52:17', 'carlos.andre', 'JDJ5JDEwJEFTcENyT0gybmRiNXNRQTdVZ1J2M2VOMkwyR1ZzNVYzamVTUUVXdzB0MWpzVTh1OUJJRjdX', 'USADA', '2023-07-03 07:52:17', '2023-07-03 07:56:01', ' [ UPFATE 2023-07-03 07:56:01 ], [ idUser  ] ', 1),
(43, '2', '2023-07-03 07:57:22', 'carlos.andre', 'JDJ5JDEwJFNUYmU4WmU1TzdJUkpDZ3Zra01uMnUweS5LdHNMWklCUXNYdmlxU1gzeHBCZjgyU1NkMU55', 'USADA', '2023-07-03 07:57:22', '2023-07-03 07:57:48', ' [ UPFATE 2023-07-03 07:57:48 ], [ idUser  ] ', 1),
(44, '2', '2023-07-03 08:10:15', 'carlos.andre', 'JDJ5JDEwJFlYcDBCVXRKclVzQm82UnhGdDJJNC5wUDJ1TGQuQlNlRmhBQUxhOE0uem5CMkxtcTliaTJx', 'USADA', '2023-07-03 08:10:15', '2023-07-03 08:11:33', ' [ UPFATE 2023-07-03 08:11:33 ], [ idUser  ] ', 1),
(45, '2', '2023-07-03 08:12:46', 'carlos.andre', 'JDJ5JDEwJHdDRFM5M2t5UzRDVHFJQ094bkhLd2VlRlFkUUNidS8wMmdRU2dleGNUc2d4YTBCZHQwVjBl', 'USADA', '2023-07-03 08:12:46', '2023-07-03 08:13:11', ' [ UPFATE 2023-07-03 08:13:11 ], [ idUser  ] ', 1),
(46, '2', '2023-07-03 02:14:08', 'carlos.andre', 'JDJ5JDEwJHBHTmpMekt5UFFyYjJucHhVSTV2L09tNi5wVGlTdlJoRVg1bGtiRnJXZ1dMTzVlbHA4WWxx', 'USADA', '2023-07-03 02:14:08', '2023-07-03 02:14:42', ' [ UPFATE 2023-07-03 02:14:42 ], [ idUser  ] ', 1),
(47, '1', '2023-07-03 03:10:57', 'carlos.andre', 'JDJ5JDEwJHFiM2hsTlN1anZ5ZFVLRE9VcUFPdnUvSk9Rd2xiRjNYLjAvTGs1OWhTMnNQT09wemdNMmxX', 'USADA', '2023-07-03 03:10:57', '2023-07-03 03:11:28', ' [ UPFATE 2023-07-03 03:11:28 ], [ idUser  ] ', 1),
(48, '1', '2023-07-03 03:16:21', 'carlos.andre', 'JDJ5JDEwJE4wLkh3UTJwalNnRk96Wm5NZS81V2VqcU5xMTQyTDFEV3pvMUx4dk1lMnRvcFFRUVZXS3Ey', 'USADA', '2023-07-03 03:16:21', '2023-07-03 03:17:05', ' [ UPFATE 2023-07-03 03:17:05 ], [ idUser  ] ', 1),
(49, '2', '2023-07-03 03:33:59', 'carlos.andre', 'JDJ5JDEwJGF5czRjTEU4SjFsVzJTWlJFT2RtVk9ybFpmQnZLd2hXR20vMlpPMWNDM0ZQeFFJVFcyUDdD', 'USADA', '2023-07-03 03:33:59', '2023-07-03 03:34:30', ' [ UPFATE 2023-07-03 03:34:30 ], [ idUser  ] ', 1),
(50, '2', '2023-07-03 03:35:07', 'carlos.andre', 'JDJ5JDEwJGVCdkdQZGJrUFN3QzY2QnVvMThybk9SSHZFLnRxcGpOM2o1eTB0eXJNTGVsb3NtVXpoYVl1', 'USADA', '2023-07-03 03:35:07', '2023-07-03 03:35:34', ' [ UPFATE 2023-07-03 03:35:34 ], [ idUser  ] ', 1),
(51, '37', '2023-07-03 03:45:42', 'carlos.andre', 'JDJ5JDEwJGYzTkpwemxsM3ZhUEQwSERWNmJTOS5HYy54U3Z6WnYudmNYNGs3Zm92WE8ud0xtV3NmbGdl', 'USADA', '2023-07-03 03:45:42', '2023-07-03 03:46:22', ' [ UPFATE 2023-07-03 03:46:22 ], [ idUser  ] ', 1),
(52, '37', '2023-07-03 03:47:18', 'carlos.andre', 'JDJ5JDEwJC5tY0FFZ2pqSFV4aXdTV09yTmtKQU9xZ1Y5TnJLcDBlS3JCeXI1clZEL0g4RGdPT2ptb05p', 'USADA', '2023-07-03 03:47:18', '2023-07-03 03:47:57', ' [ UPFATE 2023-07-03 03:47:57 ], [ idUser  ] ', 1),
(53, '84', '2023-07-12 11:02:09', 'ixoyecasadeo', 'JDJ5JDEwJEtlLm9za3QuUjRGRUpXM21UNUoxT3V6NGhHRnp0R3VJUXVVWUdJOGFHcHdnZy5Rb0lYMXht', 'USADA', '2023-07-12 11:02:09', '2023-07-12 11:02:38', ' [ UPFATE 2023-07-12 11:02:38 ], [ idUser  ] ', 1),
(54, '37', '2023-07-13 09:46:20', 'carlos.andre', 'JDJ5JDEwJGE2b1JFVC5aM09DNFpEeUZXNmtYQnVqRTBsd1RtendaU3c1Q1lRSlczelp1NWVDNVVlSjVt', 'USADA', '2023-07-13 09:46:20', '2023-07-13 09:46:58', ' [ UPFATE 2023-07-13 09:46:58 ], [ idUser  ] ', 1),
(55, '2', '2023-07-19 03:52:08', 'Mariana', 'JDJ5JDEwJC5nRWxlS3gyTVhWMFdUUE1oYXlZck9BUjJWMjgzeG5rR0h1aktoOXR2ekJiSWZJRllJZC42', 'PENDIENTE', '2023-07-19 03:52:08', '2023-07-19 03:52:08', ' [ INSERT 2023-07-19 03:52:08 ], [ idUser 2 ] ', 1),
(56, '2', '2023-07-19 03:52:33', 'Mariana', 'JDJ5JDEwJHpOc0VhUk5RYnFvN2pZemxCMllGRmUwR0lRVFpzLlVuTlJ4UHlibmhiblNjbS9lZlMzVUhl', 'PENDIENTE', '2023-07-19 03:52:33', '2023-07-19 03:52:33', ' [ INSERT 2023-07-19 03:52:33 ], [ idUser 2 ] ', 1),
(57, '2', '2023-07-19 03:52:43', 'Mariana', 'JDJ5JDEwJGs3by80ZDZqLklSYlN1QjB1WTlEeC45NHcvTFZhVHdSNk5TN1NhQ0RzcE1GRng2cVRSLnZl', 'PENDIENTE', '2023-07-19 03:52:43', '2023-07-19 03:52:43', ' [ INSERT 2023-07-19 03:52:43 ], [ idUser 2 ] ', 1),
(58, '2', '2023-07-19 03:52:51', 'Mariana', 'JDJ5JDEwJFJyWGg1Y0c5d3FQcGxvLjVhV3QwUi54Vy5UT3BJY3NFL2E4RkpJQlY0VUtEb09TY2d4UXZh', 'PENDIENTE', '2023-07-19 03:52:51', '2023-07-19 03:52:51', ' [ INSERT 2023-07-19 03:52:51 ], [ idUser 2 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `folioSolicitud` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `tipoUsuario` varchar(20) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `tipoPerfil` varchar(20) NOT NULL,
  `imagen` text NOT NULL,
  `domicilio` text,
  `colonia` varchar(100) DEFAULT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `rfc` varchar(15) DEFAULT NULL,
  `noInterior` varchar(10) DEFAULT NULL,
  `noExterior` varchar(10) DEFAULT NULL,
  `idMunicipio` int(11) DEFAULT NULL,
  `idPaises` int(11) DEFAULT NULL,
  `idEstados` int(11) DEFAULT NULL,
  `ciudad` varchar(60) DEFAULT NULL,
  `codigoPostal` varchar(10) DEFAULT NULL,
  `idCuestionario` int(11) NOT NULL,
  `estatus` varchar(20) NOT NULL,
  `numeroCuenta` text,
  `banco` varchar(100) DEFAULT NULL,
  `nombrePropietario` varchar(100) DEFAULT NULL,
  `idTVehiculo` int(11) DEFAULT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `folioSolicitud`, `usuario`, `password`, `nombres`, `apellidos`, `email`, `tipoUsuario`, `rol`, `tipoPerfil`, `imagen`, `domicilio`, `colonia`, `calle`, `telefono`, `celular`, `rfc`, `noInterior`, `noExterior`, `idMunicipio`, `idPaises`, `idEstados`, `ciudad`, `codigoPostal`, `idCuestionario`, `estatus`, `numeroCuenta`, `banco`, `nombrePropietario`, `idTVehiculo`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 0, 'CarlosAndres', '$2y$10$oRyt2q.TVud9sZpT9l5R1OQt1DU8vesHd76rYO61tkEJOIbPCtz1m', 'Alejandro Luis', 'Mandonado Ortega', 'andres@gmail.com', 'ADMINISTRATIVO', 'ADMINISTRADOR', 'nada2', '/door2door/Modules/ModulePerfil/api/Documentos/20230712082152.17045832.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'NINGUNO', '2345223434234234', NULL, NULL, NULL, '2023-02-13 04:03:31', '2023-07-16 09:11:59', ' [ UPFATE 2023-07-16 09:11:59 ], [ idUser 1 ] ', 1),
(2, 11, 'Mariana', '$2y$10$ZKQ4SbrVRTH77kana1edK.cGLgHC2KLYqc.zbFSqT1iVgZorWzZrq', 'Mariana ', 'Nautista ', 'Mariana', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Perfil/Perfil/api/Documentos/Mariana220230712124958.IMG_20230709_101206.jpg', NULL, 'Medrano', 'O de julio', NULL, NULL, NULL, '2', '12', 1, 2, 2, NULL, '44000', 0, 'RECHAZADA', '', '', '', NULL, '2023-02-13 04:24:59', '2023-07-17 10:46:24', ' [ UPDATE 2023-07-17 10:46:24 ], [ idUser 2 ] ', 1),
(3, 0, 'danielcoeficiente2021', '$2y$10$wx.YsZtTc/tBntwpEMgwM.tj8ahLnSnr9/2zpTliJxBzlkS.7c0OW', 'Daniel', 'Espana', 'danielcoeficiente2021@gmail.com', 'ADMINISTRATIVO', 'OPERADOR', 'nada', '/door2door/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'NINGUNO', '2345223434234234', NULL, NULL, NULL, '2023-02-13 06:05:43', '2023-02-13 06:59:35', ' [ DELETE 2023-02-13 06:59:35 ], [ idUser 1 ] ', 1),
(4, 0, 'chentechester', '$2y$10$ZRvrXS1Jo72UP21F80ePtuBgAziomHrrjkVnLBsjEVPWntJm234la', 'Chente', 'Chester', 'chentechester@gmail.com', 'ADMINISTRATIVO', 'OPERADOR', 'nada1', '/door2door/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'NINGUNO', '2345223434234234', NULL, NULL, NULL, '2023-02-13 07:04:48', '2023-02-13 07:04:48', ' [ INSERT 2023-02-13 07:04:48 ], [ idUser  ] ', 1),
(5, 2, 'Ramirez', '$2y$10$I3bVxSUwsuDCc/RNZ8gaqe0DTTOLxrutQI5CXNs9VYAlZ7vBaXzQ2', 'Aleverto ', 'Rodriges', 'alverto@alverto', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/door2door/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', '2345223434234234', NULL, NULL, NULL, '2023-02-14 02:38:03', '2023-02-14 02:38:03', ' [ INSERT 2023-02-14 02:38:03 ], [ idUser  ] ', 1),
(6, 3, 'OMAAAAAAAAAAR', '$2y$10$G7zKCUAfsvRfulMFNNwlJuG4b89SxTkNlNFAKYgyO/k/SRR06eIva', 'Alejandro Martines', 'Otega Espana', 'alex@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/door2door/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', '2345223434234234', NULL, NULL, NULL, '2023-02-14 02:38:50', '2023-02-14 02:38:50', ' [ INSERT 2023-02-14 02:38:50 ], [ idUser  ] ', 1),
(7, 4, 'Nazzario ', '$2y$10$f7/DHrTWFjOCAlOVVkZPZOg12F7fdGhCKAASoDVFDlmgZDi4H8pGC', 'Crisstiano Ronaldo', 'Nazario', 'cr7@gmail..com', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/door2door/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'RECHAZADA', '2345223434234234', NULL, NULL, NULL, '2023-02-14 02:39:30', '2023-04-12 03:53:41', ' [ DELETE 2023-04-12 03:53:41 ], [ idUser 1 ] ', 1),
(8, 5, 'Salcedo ', '$2y$10$YqgpF23JXyB9LLyRwrC7BewZ1dKf4E7brhCpn42qY7dxEcf5iWjbq', 'Alfonzo ', 'Guerrero', 'salcedo@gmaill.com', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/door2door/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', '2345223434234234', NULL, NULL, NULL, '2023-02-14 02:40:03', '2023-02-14 02:40:03', ' [ INSERT 2023-02-14 02:40:03 ], [ idUser  ] ', 1),
(10, 13, 'MesutOzil', 'MesutOzil', 'Rafael Ricardo', 'Varane Varane', 'mesut@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/door2door/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'NINGUNO', NULL, NULL, NULL, NULL, '2023-02-14 02:40:03', '2023-04-13 02:25:59', ' [ UPFATE 2023-04-13 02:25:59 ], [ idUser 1 ] ', 1),
(11, 14, 'MauroIcardi', 'MauroIcardi', 'Mauro', 'Icardi', 'mauro@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/door2door/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'RECHAZADA', NULL, NULL, NULL, NULL, '2023-02-14 02:40:03', '2023-04-19 07:46:04', ' [ UPFATE 2023-04-19 07:46:04 ], [ idUser 1 ] ', 1),
(12, 0, 'EnnerValencia', 'EnnerValencia', 'Enner', 'Valencia', 'enner@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/door2door/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'NINGUNO', NULL, NULL, NULL, NULL, '2023-02-14 02:40:03', '2023-02-14 02:40:03', ' [ INSERT 2023-02-14 02:40:03 ], [ idUser  ] ', 1),
(20, 20, 'MarianaC', '$2y$10$HS6I/1rVn3DcTLrFPhn0qea8ec02VW4pOBwOVxPUlzJ1IdVFF5FCC', 'MarianaC', '', 'carlos.andres.g.g.12@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'INACTIVO', NULL, NULL, NULL, NULL, '2023-04-19 01:49:25', '2023-07-13 10:09:40', ' [ DELETE 2023-07-13 10:09:40 ], [ idUser 20 DESDE LA PAGUINA DE ELIMINACION  ] ', 0),
(21, 21, 'Leonardo', '$2y$10$wTyfaNYOrsZIeo9HjNfAKuzRLDq.H.cchNrRvMg0FtjhRrsYU3D0S', 'Leonardo', '', 'Leonardo@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-19 01:58:56', '2023-04-19 01:58:56', ' [ INSERT 2023-04-19 01:58:56 ], [ idUser  ] ', 1),
(22, 22, 'Oswaldo', '$2y$10$YdnzSotAQ0mNPDhieN8mA.qYeWnQHjanNbCXsFATZxHcJWzWzlssG', 'Oswaldo', '', 'Oswaldo@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-19 01:52:21', '2023-04-19 01:52:21', ' [ INSERT 2023-04-19 01:52:21 ], [ idUser  ] ', 1),
(23, 23, 'OmarB', '$2y$10$03OH1nZSzS7lyxGcEG80BeHNuzsBoOAZtTJga.O8yiDRaIKdwcGpC', 'OmarB', '', 'OmarB@OmarB', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-19 07:57:14', '2023-04-19 07:57:14', ' [ INSERT 2023-04-19 07:57:14 ], [ idUser  ] ', 1),
(24, 24, 'RESPUETA_CREAR_SOLICITUD', '$2y$10$Y6JCfWCuTHA/WGxfeKTx4.m/m1T1cFBKwk/TRWVGCsWL24DXvcTHC', 'RESPUETA_CREAR_SOLICITUD', '', 'RESPUETA_CREAR_SOLICITUD@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/door2door/Modules/ModulePerfilesSocio/api/Documentos/D2D_File_20230421073150__wc1674576.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-19 07:58:43', '2023-04-21 07:31:50', ' [ DELETE 2023-04-21 07:31:50 ], [ idUser 1 ] ', 1),
(25, 25, 'OmarE', '$2y$10$OD6VnCuwh54tQjFtu2HsYeLk0SizwMrQeK0jXF0f5qfNvJbLBJJzW', 'OmarE', '', 'OmarE@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarE2520230419100937.wc1674576.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-19 10:04:04', '2023-04-19 10:09:37', ' [ UPDATE 2023-04-19 10:09:37 ], [ idUser 25 ] ', 1),
(26, 26, 'Dreymon', '$2y$10$a//LXY9fNiCgCpEHDj0gvuzzuDOrV8ilhhPcvuy1mksLz5KNMD6XS', 'Dreymon', '', 'Dreymon@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/Dreymon2620230420111709.wallpaper.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-20 11:01:37', '2023-04-20 11:17:09', ' [ UPDATE 2023-04-20 11:17:09 ], [ idUser 26 ] ', 1),
(27, 27, 'Omar', '$2y$10$YnG9saFWUflkxZoyGgPvF.rK4BpdP70HB3ZzGTJzIZ7Lu5O8xup/W', 'Omar', '', 'Omar@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-20 11:19:41', '2023-04-20 11:19:41', ' [ INSERT 2023-04-20 11:19:41 ], [ idUser  ] ', 1),
(28, 28, 'AlejandroRamires', '$2y$10$O1A3vdWB78KV1NMmePP3vequK9tN0OyYjxNTRO/5KMEoDEdpOi0sm', 'AlejandroRamires', '', 'AlejandroRamires@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/AlejandroRamires2820230420014511.wc1674576.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-20 01:44:58', '2023-04-20 01:45:11', ' [ UPDATE 2023-04-20 01:45:11 ], [ idUser 28 ] ', 1),
(29, 29, 'OmarBV', '$2y$10$9In7kbZiuXCgX7eg1fF5p.Kv93dpfmTT3XfYC4uM0mDx/uagGlbRu', 'OmarBV', '', 'OmarBV@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, 'Colon', 'Colon', NULL, NULL, NULL, '12', '1', 1, 2, 2, NULL, '3443', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-21 06:36:10', '2023-04-21 06:36:46', ' [ UPDATE 2023-04-21 06:36:46 ], [ idUser 29 ] ', 1),
(30, 30, 'OmarBravo', '$2y$10$gumWWzMXqNA.h3Ng0nbKD.aC3HX4K8Vkgh.pg.gZxm5pBuAUmblo6', 'OmarBravo', '', 'OmarBravo@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/door2door/Modules/ModulesImage/usuario.png', NULL, 'Milan', 'Av revolucion', NULL, NULL, NULL, '12', '12', 1, 2, 2, NULL, '45678', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-21 07:01:35', '2023-04-21 09:44:24', ' [ UPDATE 2023-04-21 09:44:24 ], [ idUser 30 ] ', 1),
(31, 31, 'FaliciaDelTimpo', '$2y$10$zMyt1beDOe.XegH.N6a5DOkZ/EGaKJIVJC1kgx2mEEFd4S9n0.uwq', 'FaliciaDelTimpo', '', 'FaliciaDelTimpo@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-24 01:55:57', '2023-04-24 01:55:57', ' [ INSERT 2023-04-24 01:55:57 ], [ idUser  ] ', 1),
(32, 32, 'OmarDelagado', '$2y$10$PBQUrxjtQmtq59IITCDmWuqewFFwPljPxSxdO2bBOxYWkkolgT07y', 'OmarDelagado', '', 'OmarDelagado@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/OmarDelagado3220230425124346.16505570751332.jpg', NULL, '23', '2323', NULL, NULL, NULL, '2', '323', 1, 2, 2, NULL, '23', 0, 'PENDIENTE', '23442343245435', 'Bancomer', 'Andres', NULL, '2023-04-25 12:18:06', '2023-05-11 01:38:31', ' [ UPDATE 2023-05-11 01:38:31 ], [ idUser  ] ', 1),
(33, 33, 'AlejandroDaniel', '$2y$10$V7IT2mDxYL0dMqesVTH6cuNJxbDj/zlDNQngd3DiPXThnJBb1M6Rq', 'AlejandroDaniel', '', 'AlejandroDaniel@AlejandroDaniel.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/AlejandroDaniel3320230425013412.16505570751332.jpg', NULL, 'Medrano', 'Medrano', NULL, NULL, NULL, '34', '12', 1, 2, 2, NULL, '456700', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-25 01:33:59', '2023-04-25 01:44:17', ' [ UPDATE 2023-04-25 01:44:17 ], [ idUser 33 ] ', 1),
(34, 34, 'Espana ', '$2y$10$9PHmFFH8zb90TbcdExvTDOz3VRd/JS9AdxFV6PSXXRQ5DLQoTBdDW', 'Daniel', '', 'spainchester@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-25 09:45:58', '2023-04-25 09:45:58', ' [ INSERT 2023-04-25 09:45:58 ], [ idUser  ] ', 1),
(35, 35, 'Espana', '$2y$10$exVfhSXXkNUw3utJPoT/R.rCC48Wm./7to/TCpijkDo1DDD.qqFOy', 'Daniel ', '', 'vivalarazad@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-25 09:55:31', '2023-04-25 09:55:31', ' [ INSERT 2023-04-25 09:55:31 ], [ idUser  ] ', 1),
(36, 36, 'Espana ', '$2y$10$eUZyMrk.vc95Wq6crP168uGKzHdA7ywNUt2mnqvhyRAErDUWxEWlq', 'Daniel', '', 'danykakano@hotmail.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-25 10:09:18', '2023-04-25 10:09:18', ' [ INSERT 2023-04-25 10:09:18 ], [ idUser  ] ', 1),
(37, 37, 'Ricardo', '$2y$10$qBP91WaL9JGi1LJBKOD/NeG89R.rlplIFnU7PlUqDN14BuH9PKLyq', 'Daniel Alejandro', 'España', 'carlos.andres.g.g.12@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dSocioWeb/Modules/ModulePerfil/api/Documentos/20230716091936.17045832.jpg', NULL, '1', '8 de mazo', NULL, NULL, NULL, '12', '12', 1, 2, 2, NULL, '12', 0, 'PENDIENTE', '', '3', '', NULL, '2023-04-25 10:14:09', '2023-07-19 03:01:24', ' [ UPFATE 2023-07-19 03:01:24 ], [ idUser 37 ] ', 1),
(38, 38, 'chester', '$2y$10$vy2jFkxp7pYW4y1D2vnYpeiu2H3Er2KV708kXoEnmoDvaoFhrM5ke', 'chente', '', 'chester@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-25 10:48:01', '2023-04-25 10:48:01', ' [ INSERT 2023-04-25 10:48:01 ], [ idUser  ] ', 1),
(39, 39, 'chente1', '$2y$10$F8xJZ42bmaHkvsBEnUAmROyq/odX8CBmjlq5WNmB76ZOW3bAd7Hpi', 'chente1', '', 'chente1@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-25 10:56:40', '2023-04-25 10:56:40', ' [ INSERT 2023-04-25 10:56:40 ], [ idUser  ] ', 1),
(40, 40, 'anderson', '$2y$10$MrsQHA.vBplAZGSmWkxevOGtZv0L3iHYZAh6EX6w22LtAqI12Gcky', 'anderson', '', 'anderson@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/anderson4020230428014649.IMG_1682712079792.jpg', NULL, '1', '1', NULL, NULL, NULL, '1', '1', 7, 3, 10, NULL, '1', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-25 10:57:36', '2023-05-04 09:13:55', ' [ UPDATE 2023-05-04 09:13:55 ], [ idUser 40 ] ', 1),
(41, 41, 'george', '$2y$10$cdj/NFgD19W6wisTA3sdievUVegHotavOCjM13EpjJKEQ6lljK1we', 'george', '', 'george@outlooo.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-04-25 11:07:01', '2023-04-25 11:07:01', ' [ INSERT 2023-04-25 11:07:01 ], [ idUser  ] ', 1),
(42, 42, 'Vardy', '$2y$10$7/HguQOWZxb4UUanRCsB/utkj6xPRBftWGScmmynQKipaJcNqk33a', 'Jamie', '', 'jamievardy@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/Vardy4220230515090859.Screenshot_2023-05-13-12-56-46-827.jpg', NULL, '2', '2', NULL, NULL, NULL, '2', '2', 7, 3, 10, NULL, '2', 0, 'PENDIENTE', '222', 'Santander ', 'Jamie vardyw', NULL, '2023-05-15 09:08:26', '2023-05-15 09:11:42', ' [ UPDATE 2023-05-15 09:11:42 ], [ idUser  ] ', 1),
(43, 43, 'Maddison', '$2y$10$Puw638uu8GIVOVtRtIOh.euy/huLNrPfRU2x3yIp0QYf8bHk1aPpy', 'James', '', 'jamesmaddison@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/Maddison4320230515092603.IMG_1684165258793.jpg', NULL, '1', '1', NULL, NULL, NULL, '1', '1', 7, 3, 10, NULL, '1', 0, 'PENDIENTE', '1', '1', '1', NULL, '2023-05-15 09:25:46', '2023-05-15 09:27:54', ' [ UPDATE 2023-05-15 09:27:54 ], [ idUser  ] ', 1),
(44, 44, 'Almiron ', '$2y$10$pY29W0hRd0bynTBmK55hGesukACzFMsJ9iz2voSC70Rbkd2yR8ngK', 'Miguel', '', 'miguelalmiron@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/Almiron 4420230515093251.IMG-20230513-WA0002.jpg', NULL, 'Q', '2', NULL, NULL, NULL, '2', 'Q', 7, 3, 10, NULL, 'Q', 0, 'PENDIENTE', 'Q', 'Q', 'Q', NULL, '2023-05-15 09:32:40', '2023-05-15 09:34:36', ' [ UPDATE 2023-05-15 09:34:36 ], [ idUser  ] ', 1),
(45, 45, 'Pope', '$2y$10$IzyP4BfI3wY2z0nj.96JsurixPSQI/p7Q1qbKAiRAYhXiBZOdqJOq', 'Nick', '', 'nickpope@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-05-15 09:38:04', '2023-05-15 09:38:04', ' [ INSERT 2023-05-15 09:38:04 ], [ idUser  ] ', 1),
(46, 46, 'Delgado', '$2y$10$GcIPnz75AVzYSfT9PI8XCOl1Cj.J9xatBRURtgoAK3MXZaw2Igrca', 'Delgado', '', 'Delgado@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-05-15 04:29:17', '2023-05-15 04:29:17', ' [ INSERT 2023-05-15 04:29:17 ], [ idUser  ] ', 1),
(47, 47, 'Delgados', '$2y$10$NpHX1dK95fYv6kHiOb3hOu/serOhsHR7y6mc0c/YsmBwmuDYrc4M6', 'Delgados', '', 'Delgados@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-05-15 11:13:35', '2023-05-15 11:13:35', ' [ INSERT 2023-05-15 11:13:35 ], [ idUser  ] ', 1),
(48, 48, 'mikelantonio', '$2y$10$GbMn4tV5jVojSzOVQxcive2gilZ2Il3mmlx8sLS4SUTcLn8IysshG', 'mikelantonio', '', 'mikelantonio@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/mikelantonio4820230515112943.IMG-20230515-WA0007.jpg', NULL, 'A', 'A', NULL, NULL, NULL, 'A', 'A', 7, 3, 10, NULL, 'A', 0, 'PENDIENTE', '1', '1', '1', NULL, '2023-05-15 11:27:56', '2023-05-15 11:31:02', ' [ UPDATE 2023-05-15 11:31:02 ], [ idUser  ] ', 1),
(49, 49, 'Renevalverde', '$2y$10$2CvZhap7FQ8xDwk6fVohmeHXTS7ixUGEd4qMMtJZ5TSRSlrzIqMFC', 'Renevalverde', '', 'Renevalverde@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-05-16 09:51:49', '2023-05-16 09:51:49', ' [ INSERT 2023-05-16 09:51:49 ], [ idUser  ] ', 1),
(50, 50, 'tyson', '$2y$10$rsWVqMxSyGD8IvmdT19sjOzpA3OqraKPHKK4B05rch5PTTNUd7s.a', 'tyson', '', 'tyson@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, '1', '1', NULL, NULL, NULL, '1', '1', 7, 3, 10, NULL, '1', 0, 'PENDIENTE', 'Q', 'Q', 'Q', NULL, '2023-05-16 09:52:53', '2023-05-16 09:59:37', ' [ UPDATE 2023-05-16 09:59:37 ], [ idUser  ] ', 1),
(51, 51, 'Gone1', '$2y$10$aqzYUp8beFTfIAqWtB7bVeGP9dX6HBjKVnAAkzEtBCR8Yc.jcituW', 'Gone1', 'Gone1', 'Gone1@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-05-16 04:19:50', '2023-05-16 04:19:50', ' [ INSERT 2023-05-16 04:19:50 ], [ idUser  ] ', 1),
(52, 52, 'Gone12', '$2y$10$XP1T/PHPVE5mI/7XA03ik.fywxp4hUvomy9G2wf2kkE4qt7Zm/2Vm', 'Gone12', 'Gone12', 'Gone12@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-05-16 10:08:34', '2023-05-16 10:08:34', ' [ INSERT 2023-05-16 10:08:34 ], [ idUser  ] ', 1),
(53, 53, 'Gone123', '$2y$10$8Cr8Cu4il39y0U2.LJijqO81WA9dafx/ddhMtz4buRNsQso6A8mXS', 'Daniel', 'España Mandonado ', 'Gone123@Gone12', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-05-16 10:09:32', '2023-05-16 10:09:32', ' [ INSERT 2023-05-16 10:09:32 ], [ idUser  ] ', 1),
(54, 54, 'jaredbowen', '$2y$10$9LnY1k19fIRbzRsk4hfreuoiMgaV3dPRAhM9cTUHR/z3QqGsDR1KK', 'jaredbowen', 'jaredbowen', 'jaredbowen@oitlool.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/jaredbowen5420230516101238.IMG_1684254452071.jpg', NULL, 'Q', 'Q', NULL, NULL, NULL, 'Q', 'Q', 7, 3, 10, NULL, 'Q', 0, 'PENDIENTE', 'Q', 'Q', 'Q', NULL, '2023-05-16 10:12:16', '2023-05-16 10:17:50', ' [ UPDATE 2023-05-16 10:17:50 ], [ idUser  ] ', 1),
(55, 55, 'peterparker', '$2y$10$VtqPIXCSXvs5FfRWeW0YUebM35x5kZvcvxRt6U6pJtTFw9oMVYNQe', 'peterparker', 'peterparker', 'peterparker@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-05-31 06:18:50', '2023-05-31 06:18:50', ' [ INSERT 2023-05-31 06:18:50 ], [ idUser  ] ', 1),
(56, 56, 'vince', '$2y$10$Cc6aceJlP5qhRgQzvDkxS.k2HFztBIW7h/mYdt7N0TPIMgGgBvgS2', 'vince', 'vince', 'vince@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-06-05 09:31:41', '2023-06-05 09:31:41', ' [ INSERT 2023-06-05 09:31:41 ], [ idUser  ] ', 1),
(57, 57, 'dany', '$2y$10$SfG5NtXkhh8fAd63O1cNW.7I.DxIjUu/PRQ6uf87tUUo7IXto4oOe', 'dany', 'dany', 'dany@dany.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/dany5720230606043602.16505570751332.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-06-06 04:35:32', '2023-06-06 04:36:02', ' [ UPDATE 2023-06-06 04:36:02 ], [ idUser 57 ] ', 1),
(58, 58, 'kobebryant', '$2y$10$XgXGaBRvrp8hZLMq9DoAP.wjp/0NrQcDRJbcJ14n8eCu4U.IyYclm', 'Kobe', 'Bryant ', 'kobe@ootlook.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/kobebryant5820230607065809.IMG_1686143595724.jpg', NULL, 'La', 'La', NULL, NULL, NULL, 'La', 'La', 7, 3, 10, NULL, 'La', 0, 'PENDIENTE', 'La', 'La', 'La', NULL, '2023-06-07 06:56:56', '2023-06-07 07:01:04', ' [ UPDATE 2023-06-07 07:01:04 ], [ idUser  ] ', 1),
(59, 59, 'lebronjames', '$2y$10$lF7J5Xr8fZW2URF1yyWGSuuH71txbxn5PI1N6laXTsq/Ej3GBedka', 'Lebron', 'James', 'lebronjames@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/lebronjames5920230607094631.IMG_1685983901306.jpg', NULL, 'Cleveland ', 'Cleveland ', NULL, NULL, NULL, 'Cleveland ', 'Cleveland ', 7, 3, 10, NULL, 'Cleveland ', 0, 'PENDIENTE', 'A', 'A', 'A', NULL, '2023-06-07 09:45:16', '2023-06-07 09:58:36', ' [ UPDATE 2023-06-07 09:58:36 ], [ idUser  ] ', 1),
(60, 60, 'Juan', '$2y$10$IjefpMhrKFYcWLd8m8uiZuKMCmlP0ittAPNbGghT/sbF0ajV5CJYe', 'Juan', 'Juan', 'Juan@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-06-13 10:46:51', '2023-06-13 10:46:51', ' [ INSERT 2023-06-13 10:46:51 ], [ idUser  ] ', 1),
(61, 61, 'DonOmarDonOmar', '$2y$10$S1Je/CzQDcmSNWC53BXQSOnpGlDGd1RcO7mmMz5.BdrRyzhqDg64K', 'DonOmarDonOmar', '', 'DonOmarDonOmar@DonOmarDonOmar', 'SOCIO', 'SOCIO', 'DonOmarDonOmar', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 01:52:18', '2023-07-10 01:52:18', ' [ INSERT 2023-07-10 01:52:18 ], [ idUser  ] ', 1),
(62, 62, 'CarlosAndres2', '$2y$10$e3GxgJauU8BM3unBvQIqJunKs5nQ8N8SjgKYQ59W4hj6m8VN37qE.', 'CarlosAndres2', '', 'CarlosAndres2@CarlosAndres2', 'SOCIO', 'SOCIO', 'CarlosAndres2', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 01:58:25', '2023-07-10 01:58:25', ' [ INSERT 2023-07-10 01:58:25 ], [ idUser  ] ', 1),
(63, 63, 'raulgonzalez', '$2y$10$W4k2Gzj2J90QJJ93GyGJJOzubrD1u.zDaQCYq9E6OWDdUBg4KbQX2', 'raul', 'gonzalez ', 'raulgonzalez@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 02:04:27', '2023-07-10 02:04:27', ' [ INSERT 2023-07-10 02:04:27 ], [ idUser  ] ', 1),
(64, 64, 'patricio', '$2y$10$qGsLvQOFO1Lbql4y6XCqbOpHelzWfxQsYBXZYr7aTVrxVLJv5/fmm', 'patricio', 'patricio', 'patricio@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 02:10:05', '2023-07-10 02:10:05', ' [ INSERT 2023-07-10 02:10:05 ], [ idUser  ] ', 1),
(65, 65, 'Cardozo211', '$2y$10$8VG7dgNrHn0mCk4NMRsr2OcwWgO17gFGru/OfHM6pZ7wXLPQrYOey', 'Cardozo211', '', 'Cardozo211@', 'SOCIO', 'SOCIO', 'Cardozo211', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 02:12:06', '2023-07-10 02:12:06', ' [ INSERT 2023-07-10 02:12:06 ], [ idUser  ] ', 1),
(66, 66, 'Cardozo2111', '$2y$10$/WEieF6EPVyyQaM9/iJCoeNUGyGSq0OnrxopCkrOFS4kJnGfzagb6', 'Cardozo2111', '', 'Cardozo2111@', 'SOCIO', 'SOCIO', 'Cardozo2111', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 02:12:41', '2023-07-10 02:12:41', ' [ INSERT 2023-07-10 02:12:41 ], [ idUser  ] ', 1),
(67, 67, 'kylianmbappe', '$2y$10$613qKCPuYMniZB6ApIgZ.e6QouI9zAGeV9r9g.CPu/rL6fd.yghHy', 'kylianmbappe', '', 'kylianmbappe@', 'SOCIO', 'SOCIO', 'kylianmbappe', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 02:18:53', '2023-07-10 02:18:53', ' [ INSERT 2023-07-10 02:18:53 ], [ idUser  ] ', 1),
(68, 68, 'alddooo', '$2y$10$i7P8H0migx8HIQvRV0jzc.TIxCi7tWHLCuwgEaYlWjQgUeExgsI9W', 'alddooo', '', 'alddooo@', 'SOCIO', 'SOCIO', 'alddooo', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 02:28:14', '2023-07-10 02:28:14', ' [ INSERT 2023-07-10 02:28:14 ], [ idUser  ] ', 1),
(69, 69, 'CarlosAndresCarlosAndres', '$2y$10$g6ewhX08.bFD6VWae2coeeFgdarRSAtMhc0VB1VK/ct9YxJPJ4DYW', 'CarlosAndresCarlosAndres', '', 'CarlosAndres@CarlosAndresCarlosAndres', 'SOCIO', 'SOCIO', 'CarlosAndresCarlosAn', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 03:19:22', '2023-07-10 03:19:22', ' [ INSERT 2023-07-10 03:19:22 ], [ idUser  ] ', 1),
(70, 70, 'Yolanda1', '$2y$10$ku663BoaH2lsoscBU0Of8u3UTcsmjpulgiAMNkLd4GHmGDEWkuefi', 'Yolanda1', 'Yolanda1', 'Yolanda1@Yolanda1', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 03:20:15', '2023-07-10 03:20:15', ' [ INSERT 2023-07-10 03:20:15 ], [ idUser  ] ', 1),
(71, 71, 'YolandaAndrea', '$2y$10$jYgqAXizNMrDzXEVtGXMBOa5C/zb2XKmlNZX/bZ.QsCvlO7WpvMxW', 'YolandaAndrea', '', 'YolandaAndrea@', 'SOCIO', 'SOCIO', 'YolandaAndrea', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 03:21:56', '2023-07-10 03:21:56', ' [ INSERT 2023-07-10 03:21:56 ], [ idUser  ] ', 1),
(72, 72, 'YolandaAndrea1', '$2y$10$h6HqIVzZDtLkDGMLxLplzO0CxRjPDzpiONxWqvgpgTvuTr71/w8ky', 'YolandaAndrea1', '', 'YolandaAndrea1@', 'SOCIO', 'SOCIO', 'YolandaAndrea1', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 03:22:55', '2023-07-10 03:22:55', ' [ INSERT 2023-07-10 03:22:55 ], [ idUser  ] ', 1),
(73, 73, 'AnastaciaRamirez', '$2y$10$ARv6csbGPGruALPkrrwQO.kFr3HjPkUZM/PmRLfHp4GAikRpzto9q', 'AnastaciaRamirez', '', 'AnastaciaRamirez@', 'SOCIO', 'SOCIO', 'AnastaciaRamirez', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 03:27:01', '2023-07-10 03:27:01', ' [ INSERT 2023-07-10 03:27:01 ], [ idUser  ] ', 1),
(74, 74, 'AnastaciaRamirez2', '$2y$10$U7gOcPWPXuTKbjpq4hkCK.GPQcGcmEPXpBFyHxdLggUZtPV/YgMvS', 'AnastaciaRamirez2', '', 'AnastaciaRamirez2@', 'SOCIO', 'SOCIO', 'AnastaciaRamirez2', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 03:32:37', '2023-07-10 03:32:37', ' [ INSERT 2023-07-10 03:32:37 ], [ idUser  ] ', 1),
(75, 75, 'marcusrashford', '$2y$10$piiJ/u3SXFZgYJo3cOAesO./pXnX9VhkE6NpWGYXgZ13.KrKtq192', 'marcusrashford', '', 'marcusrashford@outlook.com', 'SOCIO', 'SOCIO', 'marcusrashford', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 03:34:49', '2023-07-10 03:34:49', ' [ INSERT 2023-07-10 03:34:49 ], [ idUser  ] ', 1),
(76, 76, 'Raulmendoza1', '$2y$10$fC757JpB1w9ShVQIFuyKB.H4JLzBOD5wQp6gi47rhyj7KC1FS8xvm', 'Raulmendoza1', '', 'Raulmendoza1@', 'SOCIO', 'SOCIO', 'Raulmendoza1', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 03:34:53', '2023-07-10 03:34:53', ' [ INSERT 2023-07-10 03:34:53 ], [ idUser  ] ', 1),
(77, 77, 'Sancho', '$2y$10$gzHDdXdijHYKe6lrTEz3ke65pQoGgjt7T80DQUcattBQnrPhGMqaO', 'Jadon', '', 'jadonsancho@outlook.com', 'SOCIO', 'SOCIO', 'jadonsancho', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-10 03:36:35', '2023-07-10 03:36:35', ' [ INSERT 2023-07-10 03:36:35 ], [ idUser  ] ', 1),
(78, 78, 'MarianaAvila', '$2y$10$e/SHNdHJTwMh2wXN0hQMGeuX1dkshTbkFPZOX8XVubs.Bgzj2NlPi', 'MarianaAvila', '', 'MarianaAvila@MarianaAvila', 'SOCIO', 'SOCIO', '1234', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-11 12:49:01', '2023-07-11 12:49:01', ' [ INSERT 2023-07-11 12:49:01 ], [ idUser  ] ', 1),
(79, 79, 'organizar12', '$2y$10$35Y59F7NZiWJQGUSCpqdIuimeAVMkXv6SnUIzBwQp9AIrb/RypenO', 'organizar12', '', 'organizar12@organizar12', 'SOCIO', 'SOCIO', '123', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-11 12:51:00', '2023-07-11 12:51:00', ' [ INSERT 2023-07-11 12:51:00 ], [ idUser  ] ', 1),
(80, 80, 'organizar123', '$2y$10$74pvT6CQaO.S0kXsxBxH1eQbktRp8f5zmKETMMd20oYuNdeNQhXfO', 'organizar123', '', 'organizar123@organizar123', 'SOCIO', 'SOCIO', 'organizar123', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-11 12:52:51', '2023-07-11 12:52:51', ' [ INSERT 2023-07-11 12:52:51 ], [ idUser  ] ', 1),
(81, 81, 'Radamel', '$2y$10$K2ApA5XP80aoaptL9mxmP.NDGjosJhQLw.AC90h2bvO8pBgwxrh0i', 'Radamel', '', 'Radamel@', 'SOCIO', 'SOCIO', 'Radamel', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-11 10:19:20', '2023-07-11 10:19:20', ' [ INSERT 2023-07-11 10:19:20 ], [ idUser  ] ', 1),
(82, 82, 'Andrea', '$2y$10$7laIzBUkGo6rKTmo6n7f6uybzBZ/OBf6Yi4WF0vN0eYVrVMDs1kBm', 'Andreaandrea', 'Andreaandrea', 'Andreaandrea@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 07:37:19', '2023-07-12 07:37:19', ' [ INSERT 2023-07-12 07:37:19 ], [ idUser  ] ', 1),
(83, 83, 'Mariana34', '$2y$10$1E6sNe5BHolNxOYuDLqWdOlEtDWJKt7BmJT.Zg/o8EDAhBwa0IIDy', 'Mariana34', '', 'Mariana34', 'SOCIO', 'SOCIO', 'MarianaMariana', '/d2dSocio/Perfil/Perfil/api/Documentos/MarianaMariana8320230712103338.IMG-20230712-WA0006.jpg', NULL, 'Jalisco', 'Medrano ', NULL, NULL, NULL, '12', '12', 1, 2, 2, NULL, '44400', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 10:33:25', '2023-07-12 10:34:12', ' [ UPDATE 2023-07-12 10:34:12 ], [ idUser 83 ] ', 1),
(84, 84, 'Mariana21', '$2y$10$hxLTYxrean3WAzc0g8YbHuOS8hEJ2JlVEOVpXnUuN5x8kInC2dc/C', 'Mariana21', 'Ana', 'ixoyecasadeoracion@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Perfil/Perfil/api/Documentos/Mariana218420230712105526.IMG-20230712-WA0006.jpg', NULL, 'Medrano ', 'Medrano ', NULL, NULL, NULL, '12', '12', 1, 2, 2, NULL, '44400', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 10:55:05', '2023-07-12 11:20:00', ' [ UPFATE 2023-07-12 11:20:00 ], [ idUser 84 ] ', 1),
(86, 86, 'Dos Santos ', '$2y$10$HfNnC7ymdm7i2OeZz00hOeQS6ZA2cNVA2lB3GeSt7jWOoZ4yA9WY2', 'robinho', '', 'robinho@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 11:37:59', '2023-07-12 11:37:59', ' [ INSERT 2023-07-12 11:37:59 ], [ idUser  ] ', 1),
(87, 87, 'aaronrodgers', '$2y$10$9fs4.PPltcqdE2sMzmxMCO1HFcvMFsLIYRc0Xdsy5cQLj04.g1MVy', 'Aaron', 'Rodgers', 'aaronrodgers@outlool.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 11:40:03', '2023-07-12 11:40:03', ' [ INSERT 2023-07-12 11:40:03 ], [ idUser  ] ', 1),
(88, 88, 'Gabbyjdabyd', '$2y$10$066LxDN1PBxJcCTOZ5r4beiRuJYTM4vDnqcgRZ9G.ld3DgdzpJ4VO', 'Gabbyjdabyd', '', 'Gabbyjdabyd@', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 11:45:42', '2023-07-12 11:45:42', ' [ INSERT 2023-07-12 11:45:42 ], [ idUser  ] ', 1),
(90, 90, 'lamarjackson', '$2y$10$wpVNHylb82lvzuxdwTuD0ujswb/vE7JMDgB9EtBzFfauRXeSiHPVG', 'Lamar', 'Jackson', 'lamarjackson@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 11:49:37', '2023-07-12 11:49:37', ' [ INSERT 2023-07-12 11:49:37 ], [ idUser  ] ', 1),
(94, 94, 'tombrady@', '$2y$10$b3gPR082K59eX0Nsm7frjuQzJJ5rdoMii8A9UFClnTfCL.teZpP3C', 'tombrady@', '', 'tombrady@', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 12:05:29', '2023-07-12 12:05:29', ' [ INSERT 2023-07-12 12:05:29 ], [ idUser  ] ', 1),
(95, 95, 'rusellwilson', '$2y$10$cKpu.cXh8Tquaka9KYvLi.GH9V5GRkjKaHPUzwIMhqRXdDEcE6jR.', 'Rusell', 'Wilson', 'rusellwilson@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 12:10:15', '2023-07-12 12:10:15', ' [ INSERT 2023-07-12 12:10:15 ], [ idUser  ] ', 1),
(96, 96, 'nickfoles', '$2y$10$DIWlZzbrjZ2OaOOlwL6M/O8ZfwDHBpasFEwrx8dUyCBt0h2fbJHMK', 'Nick', 'Foles', 'nickfoles@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 12:12:39', '2023-07-12 12:12:39', ' [ INSERT 2023-07-12 12:12:39 ], [ idUser  ] ', 1),
(97, 97, 'AdrianaRa', '$2y$10$8mHqx/..PkFY01WGPx9lBOMZYZ8Fbuq6JNWdPVNKP18XhaBW.I3qS', 'AdrianaRa', '', 'AdrianaRa@', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 12:13:54', '2023-07-12 12:13:54', ' [ INSERT 2023-07-12 12:13:54 ], [ idUser  ] ', 1),
(98, 98, 'VisitadorD', '$2y$10$QtDcIUMtdVD798T0WNpMf.y.Lro2HXrkegd6/vKyPFtR6hNZf0Kbe', 'VisitadorD', 'VisitadorD', 'VisitadorD@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 12:16:39', '2023-07-12 12:16:39', ' [ INSERT 2023-07-12 12:16:39 ], [ idUser  ] ', 1),
(99, 99, 'newPassword', '$2y$10$Dv3QASe8wnvfX2bPN22YY.0Z/Yse2IVnPqCfQBq6mCD9tW8CNLEVW', 'newPassword', 'newPassword', 'newPassword@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 12:26:28', '2023-07-12 12:26:28', ' [ INSERT 2023-07-12 12:26:28 ], [ idUser  ] ', 1),
(101, 101, 'CarlosAnCarlosAn', '$2y$10$QQcqvc9ZOWEMoHjcwhTC8u8p/dHQ3F3XnneOIXt9i/.Z8jRL6wnAO', 'CarlosAn w', 'CarlosAn d', 'CarlosAn@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 12:34:50', '2023-07-12 12:34:50', ' [ INSERT 2023-07-12 12:34:50 ], [ idUser  ] ', 1),
(102, 102, '$contrasena', '$2y$10$Uof4gZfKenYmqOgbpwxdVe9vXf2P8.u.tocbeQWR83st5gGsczhWC', '$contrasena', '$contrasena', '$contrasena@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-12 12:37:01', '2023-07-12 12:37:01', ' [ INSERT 2023-07-12 12:37:01 ], [ idUser  ] ', 1),
(103, 103, 'michaelvick', '$2y$10$CEzrpp5AEV7OIfYzcXCwKOhy9PpfIXnwzO65LADkCZIhlS9fDnCFS', 'Michael', 'Vick', 'michaelvick@outlook.con', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Perfil/Perfil/api/Documentos/michaelvick10320230712124208.Screenshot_2023-07-11-08-21-36-680.jpg', NULL, 'Philadelphia', 'Philadelphia', NULL, NULL, NULL, '11', '12', 7, 3, 10, NULL, '2932', 0, 'PENDIENTE', '1', '1', '1', NULL, '2023-07-12 12:41:06', '2023-07-12 12:44:18', ' [ UPDATE 2023-07-12 12:44:18 ], [ idUser  ] ', 1),
(104, 0, 'MarcoAurelio', '$2y$10$t6tSyrqIHu.PFXZ5GedVy.QmdVUTdSz5iZyW9MuwXmXQJPpVoLq2e', 'Marco', 'Aurelio', 'marcoaurelio@gmail.com', 'ADMINISTRATIVO', 'ADMINISTRADOR', '', '/door2door/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'NINGUNO', NULL, NULL, NULL, NULL, '2023-07-12 02:06:41', '2023-07-12 02:07:20', ' [ UPFATE 2023-07-12 02:07:20 ], [ idUser 1 ] ', 1),
(105, 104, 'kylemurray', '$2y$10$odKugtbTXRRcJqbO0MNx4OIMswUbQgOwHFC13rpxKiAxVNiRmuqFS', 'Kyle', 'Murray', 'kylemurray@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Perfil/Perfil/api/Documentos/kylemurray10520230713072956.Screenshot_2023-07-12-21-04-53-962.jpg', NULL, '#', 'Street', NULL, NULL, NULL, '#', '#', 7, 3, 10, NULL, '#', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-13 07:29:31', '2023-07-13 10:30:27', ' [ UPDATE 2023-07-13 10:30:27 ], [ idUser 105 ] ', 1),
(106, 105, 'tombaider', '$2y$10$w5x9lug8poqgt99N1sHdTe6A0DRMAZBo2hV1NIKJiUy3TVwqR9ywK', 'tombaider', 'tombaider', 'tombaider@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-13 09:24:00', '2023-07-13 09:24:00', ' [ INSERT 2023-07-13 09:24:00 ], [ idUser  ] ', 1),
(107, 106, 'BaboCartel', '$2y$10$3chBSLRSzlHzAf7TQIvqt.nuhhr5RLccaaekkPvd/ESCfEaQSvpja', 'BaboCartel', '', 'BaboCartel@', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Perfil/Perfil/api/Documentos/BaboCartel10720230713103549.IMG_1689180293996.jpg', NULL, 'Medrano ', 'Medrano ', NULL, NULL, NULL, '12', '12', 1, 2, 2, NULL, '44400', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-13 10:35:23', '2023-07-13 10:36:31', ' [ UPDATE 2023-07-13 10:36:31 ], [ idUser 107 ] ', 1),
(108, 107, 'jordanlove', '$2y$10$Etgsu487Nct8RPlT5fC3mOkg8owJ4gw5glmN9Adhm7x/iW9xViTd6', 'Jordan', 'Love', 'jordanlove@outlool.com', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, '1', '1', NULL, NULL, NULL, '1', '1', 7, 3, 10, NULL, '1', 0, 'PENDIENTE', '1', '1', '1', NULL, '2023-07-14 02:22:14', '2023-07-14 02:26:20', ' [ UPDATE 2023-07-14 02:26:20 ], [ idUser  ] ', 1),
(109, 108, 'juliojones', '$2y$10$wp3qjck2xc73SP2EZmY9o.Sl2FYKdJa9OIWvMjLq702Rh70fZI/i6', 'juliojones', '', 'juliojones@outlook.com', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, '1', '1', NULL, NULL, NULL, '1', '1', 7, 3, 10, NULL, '1', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-14 02:53:32', '2023-07-14 02:54:59', ' [ UPDATE 2023-07-14 02:54:59 ], [ idUser 109 ] ', 1),
(110, 109, 'MarinaCervantes', '$2y$10$bSvMtx9alQyilBNmPADmV.Y9wTAVoBgTB1wHpmoFJWnY.a1vWTM0O', 'MarinaCervantes', 'MarinaCervantes', 'MarinaCervantes@', 'SOCIO', 'SOCIO', 'SOCIO VISITADOR', '/d2dVisitador/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-16 09:15:41', '2023-07-16 09:15:41', ' [ INSERT 2023-07-16 09:15:41 ], [ idUser  ] ', 1),
(111, 110, 'Alejandra1', '$2y$10$.WzM1R9cuHbHXrlQhQy2cOXVGPysuroaJHTE9uo0OSEatolCAc1PO', 'Alejandra1', '', 'Alejandra1@gmail.com', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-17 08:12:15', '2023-07-17 08:12:15', ' [ INSERT 2023-07-17 08:12:15 ], [ idUser  ] ', 1),
(112, 111, 'alejandra2', '$2y$10$QOsRxN4iqButgci4OaE0IO7IRvqZTsDUmk0iyHI18vLQDDMlpVyhu', 'alejandra2', '', 'alejandra2@', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, 'Medrano ', 'Medrano ', NULL, NULL, NULL, '12', '12', 1, 2, 2, NULL, '44400', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-17 08:39:07', '2023-07-17 09:02:09', ' [ UPDATE 2023-07-17 09:02:09 ], [ idUser 112 ] ', 1),
(113, 112, 'Carlosandres45', '$2y$10$bpO4GlTHnmSN6fCMHg2LG.HhYSuxpkLsazxO8T2WQARgimk2RwORC', 'Carlosandres45', '', 'Carlosandres45@', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-17 10:56:32', '2023-07-17 10:56:32', ' [ INSERT 2023-07-17 10:56:32 ], [ idUser  ] ', 1),
(114, 113, 'Carlosandres46', '$2y$10$juws9akKS5ToTaS7G89Co.AH6XAxFvXp095M.hKWBVxaPDD33n.9u', 'Carlosandres46', '', '@sdf', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-17 11:00:26', '2023-07-17 11:00:26', ' [ INSERT 2023-07-17 11:00:26 ], [ idUser  ] ', 1),
(115, 114, 'Carlosandres47', '$2y$10$GRAfGBkDMCriCF534sDyPur8rmGPMCFMbxk95amIwcsyyn9wm.53W', 'Carlosandres47', '', 'Carlosandres47@', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Modules/ModulesImage/usuario.png', NULL, 'Medrano ', 'Medrano ', NULL, NULL, NULL, '12', '12', 1, 2, 2, NULL, '44400', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-17 11:04:45', '2023-07-17 11:06:09', ' [ UPDATE 2023-07-17 11:06:09 ], [ idUser 115 ] ', 1),
(116, 115, 'Gerardo Cardoso', '$2y$10$aYB8g0qaeDSJUYSsIZQeQuSqWdqqNy/t5i7WxtTfA/FpgeMhvdgfe', 'Salvador Gerardo', '', 'Gerardocardoso@cardosok.com ', 'SOCIO', 'SOCIO', 'SOCIO CLIENTE', '/d2dSocio/Perfil/Perfil/api/Documentos/Gerardo Cardoso11620230718110717.20230713_185630.jpg', NULL, 'Ladrón de Guevara', 'Hidalgo ', NULL, NULL, NULL, '0', '2024 ', 1, 2, 2, NULL, '44600', 0, 'PENDIENTE', NULL, NULL, NULL, NULL, '2023-07-18 11:03:41', '2023-07-18 11:26:01', ' [ UPDATE 2023-07-18 11:26:01 ], [ idUser 116 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_respuesta`
--

CREATE TABLE `usuario_respuesta` (
  `idUsuario_Respuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `respuesta` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_respuesta`
--

INSERT INTO `usuario_respuesta` (`idUsuario_Respuesta`, `idUsuario`, `idPregunta`, `respuesta`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(6, 83, 41, 'Bdhdhd', '2023-07-12 10:35:04', '2023-07-12 10:35:04', ' [ INSERT 2023-07-12 10:35:04 ], [ idUser 83 ] ', 1),
(7, 83, 42, 'Bdbdbd', '2023-07-12 10:35:04', '2023-07-12 10:35:04', ' [ INSERT 2023-07-12 10:35:04 ], [ idUser 83 ] ', 1),
(8, 84, 41, 'Jdjd', '2023-07-12 10:56:55', '2023-07-12 10:56:55', ' [ INSERT 2023-07-12 10:56:55 ], [ idUser 84 ] ', 1),
(9, 84, 42, 'Hdhd', '2023-07-12 10:56:55', '2023-07-12 10:56:55', ' [ INSERT 2023-07-12 10:56:55 ], [ idUser 84 ] ', 1),
(18, 105, 51, 'Test', '2023-07-13 07:34:26', '2023-07-13 07:34:26', ' [ INSERT 2023-07-13 07:34:26 ], [ idUser 105 ] ', 1),
(19, 105, 52, 'Test', '2023-07-13 07:34:26', '2023-07-13 07:34:26', ' [ INSERT 2023-07-13 07:34:26 ], [ idUser 105 ] ', 1),
(20, 105, 53, 'Test', '2023-07-13 07:34:26', '2023-07-13 07:34:26', ' [ INSERT 2023-07-13 07:34:26 ], [ idUser 105 ] ', 1),
(21, 105, 54, 'Test', '2023-07-13 07:34:26', '2023-07-13 07:34:26', ' [ INSERT 2023-07-13 07:34:26 ], [ idUser 105 ] ', 1),
(22, 107, 51, 'Bien ', '2023-07-13 10:37:28', '2023-07-13 10:37:28', ' [ INSERT 2023-07-13 10:37:28 ], [ idUser 107 ] ', 1),
(23, 107, 52, 'Bien', '2023-07-13 10:37:28', '2023-07-13 10:37:28', ' [ INSERT 2023-07-13 10:37:28 ], [ idUser 107 ] ', 1),
(24, 107, 53, 'Bien', '2023-07-13 10:37:28', '2023-07-13 10:37:28', ' [ INSERT 2023-07-13 10:37:28 ], [ idUser 107 ] ', 1),
(25, 107, 54, 'Bien', '2023-07-13 10:37:28', '2023-07-13 10:37:28', ' [ INSERT 2023-07-13 10:37:28 ], [ idUser 107 ] ', 1),
(30, 109, 51, 'Y', '2023-07-14 02:55:15', '2023-07-14 02:55:15', ' [ INSERT 2023-07-14 02:55:15 ], [ idUser 109 ] ', 1),
(31, 109, 52, 'U', '2023-07-14 02:55:15', '2023-07-14 02:55:15', ' [ INSERT 2023-07-14 02:55:15 ], [ idUser 109 ] ', 1),
(32, 109, 53, 'U', '2023-07-14 02:55:15', '2023-07-14 02:55:15', ' [ INSERT 2023-07-14 02:55:15 ], [ idUser 109 ] ', 1),
(33, 109, 54, 'U', '2023-07-14 02:55:15', '2023-07-14 02:55:15', ' [ INSERT 2023-07-14 02:55:15 ], [ idUser 109 ] ', 1),
(34, 2, 51, '', '2023-07-17 10:46:34', '2023-07-17 10:46:34', ' [ INSERT 2023-07-17 10:46:34 ], [ idUser 2 ] ', 1),
(35, 2, 52, '', '2023-07-17 10:46:34', '2023-07-17 10:46:34', ' [ INSERT 2023-07-17 10:46:34 ], [ idUser 2 ] ', 1),
(36, 2, 53, '', '2023-07-17 10:46:34', '2023-07-17 10:46:34', ' [ INSERT 2023-07-17 10:46:34 ], [ idUser 2 ] ', 1),
(37, 2, 54, '', '2023-07-17 10:46:34', '2023-07-17 10:46:34', ' [ INSERT 2023-07-17 10:46:34 ], [ idUser 2 ] ', 1),
(38, 115, 51, 'Bien', '2023-07-17 11:07:21', '2023-07-17 11:07:21', ' [ INSERT 2023-07-17 11:07:21 ], [ idUser 115 ] ', 1),
(39, 115, 52, 'Bien', '2023-07-17 11:07:21', '2023-07-17 11:07:21', ' [ INSERT 2023-07-17 11:07:21 ], [ idUser 115 ] ', 1),
(40, 115, 53, 'Bien', '2023-07-17 11:07:21', '2023-07-17 11:07:21', ' [ INSERT 2023-07-17 11:07:21 ], [ idUser 115 ] ', 1),
(41, 115, 54, 'Bien', '2023-07-17 11:07:21', '2023-07-17 11:07:21', ' [ INSERT 2023-07-17 11:07:21 ], [ idUser 115 ] ', 1),
(58, 116, 51, '', '2023-07-18 11:29:21', '2023-07-18 11:29:21', ' [ INSERT 2023-07-18 11:29:21 ], [ idUser 116 ] ', 1),
(59, 116, 52, '', '2023-07-18 11:29:21', '2023-07-18 11:29:21', ' [ INSERT 2023-07-18 11:29:21 ], [ idUser 116 ] ', 1),
(60, 116, 53, '', '2023-07-18 11:29:21', '2023-07-18 11:29:21', ' [ INSERT 2023-07-18 11:29:21 ], [ idUser 116 ] ', 1),
(61, 116, 54, '', '2023-07-18 11:29:22', '2023-07-18 11:29:22', ' [ INSERT 2023-07-18 11:29:22 ], [ idUser 116 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `idVisita` int(11) NOT NULL,
  `idUsuarioSV` int(11) NOT NULL,
  `idUsuarioSC` int(11) NOT NULL,
  `idContacto` int(11) NOT NULL,
  `idCampana` int(11) NOT NULL,
  `folio` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idCComicion` text,
  `idTVehiculo` int(11) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT NULL,
  `comentarios` text,
  `comentarios_Visitador` text,
  `comentarios_Validador` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`idVisita`, `idUsuarioSV`, `idUsuarioSC`, `idContacto`, `idCampana`, `folio`, `fecha`, `idCComicion`, `idTVehiculo`, `estatus`, `comentarios`, `comentarios_Visitador`, `comentarios_Validador`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(4, 37, 11, 4, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(5, 37, 11, 5, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(6, 37, 11, 6, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(7, 2, 11, 7, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(8, 2, 11, 8, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(9, 2, 11, 9, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(10, 2, 11, 10, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(11, 2, 11, 11, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(12, 2, 11, 12, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(13, 2, 11, 13, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(14, 2, 11, 14, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(15, 2, 11, 15, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 01:32:49', ' [ UPFATE 2023-03-31 01:32:49 ], [ idUser 1 ] ', 1),
(16, 2, 11, 16, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(17, 2, 11, 17, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 01:32:49', ' [ UPFATE 2023-03-31 01:32:49 ], [ idUser 1 ] ', 1),
(18, 2, 11, 18, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(19, 2, 11, 19, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(20, 2, 11, 20, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(21, 2, 11, 21, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 10:23:23', ' [ UPFATE 2023-03-31 10:23:23 ], [ idUser 1 ] ', 1),
(22, 2, 11, 22, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 10:23:23', ' [ UPFATE 2023-03-31 10:23:23 ], [ idUser 1 ] ', 1),
(23, 2, 11, 23, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 10:23:23', ' [ UPFATE 2023-03-31 10:23:23 ], [ idUser 1 ] ', 1),
(24, 2, 11, 24, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(25, 2, 11, 25, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(26, 2, 11, 26, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(27, 2, 11, 27, 1, 11, '2023-03-31 09:36:30', '1', 1, 'ACEPTADOS', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '0000-00-00 00:00:00', ' [ UPFATE  ], [ idUser 1 ] ', 1),
(28, 2, 11, 28, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(29, 2, 11, 29, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(30, 2, 11, 30, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(31, 2, 11, 31, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(32, 2, 11, 32, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(33, 2, 11, 33, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(34, 2, 11, 34, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(35, 2, 11, 35, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(36, 2, 11, 36, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(37, 2, 11, 37, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(38, 2, 11, 38, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(39, 2, 11, 39, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(40, 2, 11, 40, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(41, 2, 11, 41, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(42, 2, 11, 42, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(43, 2, 11, 43, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(44, 2, 11, 44, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(45, 2, 11, 45, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(46, 2, 11, 46, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(47, 2, 11, 47, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(48, 2, 11, 48, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(49, 2, 11, 49, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(50, 2, 11, 50, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(51, 2, 11, 51, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(52, 2, 11, 52, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(53, 2, 11, 53, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(54, 2, 11, 54, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(55, 2, 11, 55, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(56, 2, 11, 56, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(57, 2, 11, 57, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(58, 2, 11, 58, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(59, 2, 11, 59, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(60, 2, 11, 60, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(61, 2, 11, 61, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(62, 2, 11, 62, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(63, 2, 11, 63, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(64, 2, 11, 64, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(65, 2, 11, 65, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(66, 2, 11, 66, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(67, 2, 11, 67, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(68, 2, 11, 68, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(69, 2, 11, 69, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(70, 2, 11, 70, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(71, 2, 11, 71, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(72, 2, 11, 72, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(73, 2, 11, 73, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(74, 2, 11, 74, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(75, 2, 11, 75, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(76, 2, 11, 76, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(77, 2, 11, 77, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(78, 2, 11, 77, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(79, 2, 11, 78, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(80, 2, 11, 79, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(81, 2, 11, 80, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(82, 2, 11, 81, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(83, 2, 11, 81, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(84, 2, 11, 82, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(85, 2, 11, 83, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(86, 2, 11, 84, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(87, 2, 11, 85, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(88, 2, 11, 86, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(89, 2, 11, 87, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(90, 2, 11, 88, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(91, 2, 11, 89, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(92, 2, 11, 90, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(93, 2, 11, 91, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(94, 2, 11, 92, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(95, 2, 11, 93, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(96, 2, 11, 94, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(97, 2, 11, 95, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(98, 2, 11, 96, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(99, 2, 11, 97, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(100, 2, 11, 98, 1, 11, '2023-03-31 09:36:30', '1', 1, 'VISITADO', 'SI COMENTARIOS', NULL, NULL, '2023-03-31 09:36:30', '2023-03-31 09:36:30', 'TEST', 1),
(209, 37, 2, 141, 29, 98, '2023-05-31 10:50:19', '3', 0, 'CANCELADA', NULL, NULL, NULL, '2023-05-31 10:50:19', '2023-06-01 01:01:10', ' [ DELETE 2023-06-01 01:01:10 ], [ idUser 37 ] ', 1),
(210, 37, 11, 113, 1, 99, '2023-06-01 01:01:49', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-01 01:01:49', '2023-06-01 01:02:18', ' [ DELETE 2023-06-01 01:02:18 ], [ idUser 37 ] ', 1),
(211, 37, 2, 154, 29, 100, '2023-06-01 01:02:27', '3', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-01 01:02:27', '2023-06-01 01:13:40', ' [ DELETE 2023-06-01 01:13:40 ], [ idUser 37 ] ', 1),
(212, 37, 11, 1, 1, 101, '2023-06-01 01:14:25', '1', 0, 'VISITADO', NULL, NULL, NULL, '2023-06-01 01:14:25', '2023-06-01 01:16:45', ' [ DELETE 2023-06-01 01:16:45 ], [ idUser 37 ] ', 1),
(213, 37, 11, 3, 17, 102, '2023-06-01 03:20:11', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-01 03:20:11', '2023-06-01 07:58:22', ' [ DELETE 2023-06-01 07:58:22 ], [ idUser 37 ] ', 1),
(214, 37, 11, 4, 17, 103, '2023-06-01 07:58:35', '1', 0, 'VISITADO', '', NULL, NULL, '2023-06-01 07:58:35', '2023-06-02 07:28:47', ' [ DELETE 2023-06-02 07:28:47 ], [ idUser 37 ] ', 1),
(215, 37, 11, 6, 20, 104, '2023-06-02 07:28:56', '2', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-02 07:28:56', '2023-06-02 07:30:42', ' [ DELETE 2023-06-02 07:30:42 ], [ idUser 37 ] ', 1),
(216, 37, 11, 11, 1, 105, '2023-06-02 07:46:03', '1', 0, 'VISITADO', '', NULL, NULL, '2023-06-02 07:46:03', '2023-06-02 03:45:30', ' [ DELETE 2023-06-02 03:45:30 ], [ idUser 37 ] ', 1),
(217, 37, 11, 12, 1, 106, '2023-06-03 11:37:06', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-03 11:37:06', '2023-06-03 01:43:06', ' [ DELETE 2023-06-03 01:43:06 ], [ idUser 37 ] ', 1),
(218, 37, 2, 142, 29, 107, '2023-06-03 01:43:24', '3', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-03 01:43:24', '2023-06-03 03:55:32', ' [ DELETE 2023-06-03 03:55:32 ], [ idUser 37 ] ', 1),
(219, 37, 11, 112, 1, 108, '2023-06-03 03:55:56', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-03 03:55:56', '2023-06-06 10:22:41', ' [ DELETE 2023-06-06 10:22:41 ], [ idUser 37 ] ', 1),
(220, 37, 11, 13, 1, 109, '2023-06-06 10:30:56', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-06 10:30:56', '2023-06-06 10:34:07', ' [ DELETE 2023-06-06 10:34:07 ], [ idUser 37 ] ', 1),
(221, 37, 11, 25, 1, 110, '2023-06-06 10:34:24', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-06 10:34:24', '2023-06-06 10:39:36', ' [ DELETE 2023-06-06 10:39:36 ], [ idUser 37 ] ', 1),
(222, 37, 11, 14, 1, 111, '2023-06-06 10:52:56', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-06 10:52:56', '2023-06-06 04:54:13', ' [ DELETE 2023-06-06 04:54:13 ], [ idUser 37 ] ', 1),
(223, 57, 11, 16, 1, 112, '2023-06-06 04:43:24', '1', 0, 'VISITADO', '', NULL, NULL, '2023-06-06 04:43:24', '2023-06-06 04:48:00', ' [ DELETE 2023-06-06 04:48:00 ], [ idUser 57 ] ', 1),
(224, 57, 2, 158, 33, 113, '2023-06-06 05:40:39', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-06 05:40:39', '2023-06-06 05:41:25', ' [ DELETE 2023-06-06 05:41:25 ], [ idUser 57 ] ', 1),
(225, 57, 2, 158, 33, 114, '2023-06-06 05:52:18', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-06 05:52:18', '2023-06-06 05:52:26', ' [ DELETE 2023-06-06 05:52:26 ], [ idUser 57 ] ', 1),
(226, 57, 2, 159, 33, 115, '2023-06-06 05:53:34', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-06 05:53:34', '2023-06-06 05:53:42', ' [ DELETE 2023-06-06 05:53:42 ], [ idUser 57 ] ', 1),
(227, 57, 2, 158, 33, 116, '2023-06-06 06:02:01', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-06 06:02:01', '2023-06-06 06:02:09', ' [ DELETE 2023-06-06 06:02:09 ], [ idUser 57 ] ', 1),
(228, 57, 2, 159, 33, 117, '2023-06-06 06:03:24', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-06 06:03:24', '2023-06-06 06:03:33', ' [ DELETE 2023-06-06 06:03:33 ], [ idUser 57 ] ', 1),
(229, 57, 2, 158, 33, 118, '2023-06-06 06:04:44', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-06 06:04:44', '2023-06-06 06:05:33', ' [ DELETE 2023-06-06 06:05:33 ], [ idUser 57 ] ', 1),
(230, 57, 2, 158, 33, 119, '2023-06-06 08:06:03', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-06 08:06:03', '2023-06-06 08:06:36', ' [ DELETE 2023-06-06 08:06:36 ], [ idUser 57 ] ', 1),
(231, 57, 2, 158, 33, 120, '2023-06-06 08:09:43', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-06 08:09:43', '2023-06-06 08:24:51', ' [ DELETE 2023-06-06 08:24:51 ], [ idUser 57 ] ', 1),
(232, 57, 2, 158, 33, 121, '2023-06-06 08:24:58', '1', 0, 'VISITADO', '', NULL, NULL, '2023-06-06 08:24:58', '2023-06-06 08:25:08', ' [ DELETE 2023-06-06 08:25:08 ], [ idUser 57 ] ', 1),
(233, 2, 2, 171, 36, 122, '2023-06-07 07:21:51', '1', 0, 'SELECCIONADO', NULL, NULL, NULL, '2023-06-07 07:21:51', '2023-06-07 07:21:51', ' [ INSERT 2023-06-07 07:21:51 ], [ idUser 2 ] ', 1),
(234, 37, 1, 174, 37, 123, '2023-06-07 07:32:30', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-07 07:32:30', '2023-06-07 09:33:31', ' [ DELETE 2023-06-07 09:33:31 ], [ idUser 37 ] ', 1),
(235, 37, 1, 173, 37, 124, '2023-06-07 09:33:45', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-07 09:33:45', '2023-06-07 10:17:54', ' [ DELETE 2023-06-07 10:17:54 ], [ idUser 37 ] ', 1),
(236, 37, 1, 174, 37, 125, '2023-06-07 10:39:32', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-07 10:39:32', '2023-06-14 08:46:24', ' [ DELETE 2023-06-14 08:46:24 ], [ idUser 37 ] ', 1),
(237, 37, 1, 174, 37, 126, '2023-06-14 09:18:27', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-14 09:18:27', '2023-06-14 04:25:30', ' [ DELETE 2023-06-14 04:25:30 ], [ idUser 37 ] ', 1),
(238, 37, 1, 174, 37, 127, '2023-06-20 05:39:50', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-20 05:39:50', '2023-06-22 06:40:26', ' [ DELETE 2023-06-22 06:40:26 ], [ idUser 37 ] ', 1),
(239, 37, 1, 174, 37, 128, '2023-06-26 05:37:34', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-26 05:37:34', '2023-06-26 05:37:50', ' [ DELETE 2023-06-26 05:37:50 ], [ idUser 37 ] ', 1),
(240, 37, 1, 173, 37, 129, '2023-06-27 07:36:28', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-27 07:36:28', '2023-06-27 07:38:19', ' [ DELETE 2023-06-27 07:38:19 ], [ idUser 37 ] ', 1),
(241, 37, 2, 161, 32, 130, '2023-06-27 07:41:02', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-06-27 07:41:02', '2023-07-03 04:22:06', ' [ DELETE 2023-07-03 04:22:06 ], [ idUser 37 ] ', 1),
(242, 37, 2, 162, 32, 131, '2023-07-05 10:53:16', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-05 10:53:16', '2023-07-05 11:13:19', ' [ DELETE 2023-07-05 11:13:19 ], [ idUser 37 ] ', 1),
(243, 37, 2, 179, 40, 132, '2023-07-05 12:12:17', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-05 12:12:17', '2023-07-05 12:12:36', ' [ DELETE 2023-07-05 12:12:36 ], [ idUser 37 ] ', 1),
(244, 37, 1, 174, 37, 133, '2023-07-10 07:42:09', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-10 07:42:09', '2023-07-10 08:16:12', ' [ DELETE 2023-07-10 08:16:12 ], [ idUser 37 ] ', 1),
(245, 37, 1, 174, 37, 134, '2023-07-12 09:10:14', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-12 09:10:14', '2023-07-13 10:39:40', ' [ DELETE 2023-07-13 10:39:40 ], [ idUser 37 ] ', 1),
(246, 103, 1, 173, 37, 135, '2023-07-12 02:30:37', '1', 0, 'VISITADO', '', NULL, NULL, '2023-07-12 02:30:37', '2023-07-12 02:34:44', ' [ DELETE 2023-07-12 02:34:44 ], [ idUser 103 ] ', 1),
(247, 37, 2, 177, 39, 136, '2023-07-14 06:44:10', '1', 0, 'VISITADO', '', NULL, NULL, '2023-07-14 06:44:10', '2023-07-14 06:48:59', ' [ DELETE 2023-07-14 06:48:59 ], [ idUser 37 ] ', 1),
(248, 37, 2, 177, 39, 137, '2023-07-14 06:44:10', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-14 06:44:10', '2023-07-14 01:07:27', ' [ DELETE 2023-07-14 01:07:27 ], [ idUser 37 ] ', 1),
(249, 37, 2, 161, 32, 138, '2023-07-14 03:05:13', '1', 0, 'VISITADO', '', NULL, NULL, '2023-07-14 03:05:13', '2023-07-14 03:07:14', ' [ DELETE 2023-07-14 03:07:14 ], [ idUser 37 ] ', 1),
(250, 37, 2, 162, 32, 139, '2023-07-14 06:25:07', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-14 06:25:07', '2023-07-17 02:47:23', ' [ DELETE 2023-07-17 02:47:23 ], [ idUser 37 ] ', 1),
(251, 37, 1, 174, 37, 140, '2023-07-17 02:49:30', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-17 02:49:30', '2023-07-18 07:48:47', ' [ DELETE 2023-07-18 07:48:47 ], [ idUser 37 ] ', 1),
(252, 37, 2, 185, 45, 141, '2023-07-18 12:07:02', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-18 12:07:02', '2023-07-18 12:27:40', ' [ DELETE 2023-07-18 12:27:40 ], [ idUser 37 ] ', 1),
(253, 37, 2, 186, 45, 142, '2023-07-19 08:35:51', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-19 08:35:51', '2023-07-19 08:37:05', ' [ DELETE 2023-07-19 08:37:05 ], [ idUser 37 ] ', 1),
(254, 37, 2, 186, 45, 143, '2023-07-19 09:16:19', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-19 09:16:19', '2023-07-19 09:32:01', ' [ DELETE 2023-07-19 09:32:01 ], [ idUser 37 ] ', 1),
(255, 37, 2, 186, 45, 144, '2023-07-19 09:33:29', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-19 09:33:29', '2023-07-19 11:32:51', ' [ DELETE 2023-07-19 11:32:51 ], [ idUser 37 ] ', 1),
(256, 37, 2, 186, 45, 145, '2023-07-19 11:33:00', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-19 11:33:00', '2023-07-19 11:39:02', ' [ DELETE 2023-07-19 11:39:02 ], [ idUser 37 ] ', 1),
(257, 37, 2, 186, 45, 146, '2023-07-19 11:40:04', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-19 11:40:04', '2023-07-19 11:48:23', ' [ DELETE 2023-07-19 11:48:23 ], [ idUser 37 ] ', 1),
(258, 37, 2, 186, 45, 147, '2023-07-19 11:48:31', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-19 11:48:31', '2023-07-19 11:49:42', ' [ DELETE 2023-07-19 11:49:42 ], [ idUser 37 ] ', 1),
(259, 37, 2, 186, 45, 148, '2023-07-19 11:59:11', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-19 11:59:11', '2023-07-19 12:02:16', ' [ DELETE 2023-07-19 12:02:16 ], [ idUser 37 ] ', 1),
(260, 37, 2, 186, 45, 149, '2023-07-19 12:03:09', '1', 0, 'CANCELADA', NULL, NULL, NULL, '2023-07-19 12:03:09', '2023-07-19 03:37:09', ' [ DELETE 2023-07-19 03:37:09 ], [ idUser 37 ] ', 1),
(261, 37, 2, 186, 45, 150, '2023-07-20 02:10:31', '1', 0, 'SELECCIONADO', NULL, NULL, NULL, '2023-07-20 02:10:31', '2023-07-20 02:10:31', ' [ INSERT 2023-07-20 02:10:31 ], [ idUser 37 ] ', 1),
(262, 37, 2, 186, 45, 151, '2023-07-20 02:10:31', '1', 0, 'SELECCIONADO', NULL, NULL, NULL, '2023-07-20 02:10:31', '2023-07-20 02:10:31', ' [ INSERT 2023-07-20 02:10:31 ], [ idUser 37 ] ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `idZona` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text,
  `fechaCreacion` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `observacion` text NOT NULL,
  `bstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`idZona`, `nombre`, `descripcion`, `fechaCreacion`, `fechaModificacion`, `observacion`, `bstate`) VALUES
(1, 'assd', '', '2023-02-09 12:38:23', '2023-02-09 12:39:55', ' [ DELETE 2023-02-09 12:39:55 ], [ idUser 1 ] ', 0),
(2, 'Zona # 1', '', '2023-03-31 04:33:58', '2023-03-31 04:34:33', ' [ UPFATE 2023-03-31 04:34:33 ], [ idUser 1 ] ', 1),
(3, 'Zona # 2', '', '2023-03-31 04:34:08', '2023-03-31 04:34:08', ' [ INSERT 2023-03-31 04:34:08 ], [ idUser 1 ] ', 1),
(4, 'Zona # 3', '', '2023-03-31 04:34:17', '2023-03-31 04:34:17', ' [ INSERT 2023-03-31 04:34:17 ], [ idUser 1 ] ', 1),
(5, 'Zona # 4', '', '2023-03-31 04:34:25', '2023-03-31 04:34:25', ' [ INSERT 2023-03-31 04:34:25 ], [ idUser 1 ] ', 1),
(6, 'ZONA ZERO MODIFICADA', 'GENERICO MODIFICADO', '2023-04-13 10:01:47', '2023-04-13 10:02:02', ' [ DELETE 2023-04-13 10:02:02 ], [ idUser 1 ] ', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ajusteCuestionario`
--
ALTER TABLE `ajusteCuestionario`
  ADD PRIMARY KEY (`idACuestionarios`);

--
-- Indices de la tabla `archivosxsolicitud`
--
ALTER TABLE `archivosxsolicitud`
  ADD PRIMARY KEY (`idAxS`);

--
-- Indices de la tabla `campana`
--
ALTER TABLE `campana`
  ADD PRIMARY KEY (`idCampana`);

--
-- Indices de la tabla `coneptoCobro`
--
ALTER TABLE `coneptoCobro`
  ADD PRIMARY KEY (`idCCobro`);

--
-- Indices de la tabla `coneptoComicion`
--
ALTER TABLE `coneptoComicion`
  ADD PRIMARY KEY (`idCComicion`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`idContrato`);

--
-- Indices de la tabla `corte_deta`
--
ALTER TABLE `corte_deta`
  ADD PRIMARY KEY (`idCorteD`);

--
-- Indices de la tabla `corte_enca`
--
ALTER TABLE `corte_enca`
  ADD PRIMARY KEY (`idCorte`);

--
-- Indices de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD PRIMARY KEY (`idCuestionario`);

--
-- Indices de la tabla `emailserver`
--
ALTER TABLE `emailserver`
  ADD PRIMARY KEY (`idEServer`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `Estados`
--
ALTER TABLE `Estados`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `evidecias`
--
ALTER TABLE `evidecias`
  ADD PRIMARY KEY (`idEvidecias`);

--
-- Indices de la tabla `gatewaySMS`
--
ALTER TABLE `gatewaySMS`
  ADD PRIMARY KEY (`idGSMS`);

--
-- Indices de la tabla `gruposMensajes`
--
ALTER TABLE `gruposMensajes`
  ADD PRIMARY KEY (`idGMensaje`);

--
-- Indices de la tabla `gruposMensajesUsuarios`
--
ALTER TABLE `gruposMensajesUsuarios`
  ADD PRIMARY KEY (`idGMUsuario`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idModulo`);

--
-- Indices de la tabla `Municipios`
--
ALTER TABLE `Municipios`
  ADD PRIMARY KEY (`idMunicipio`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `preguntasxcuesntionario`
--
ALTER TABLE `preguntasxcuesntionario`
  ADD PRIMARY KEY (`idPxC`);

--
-- Indices de la tabla `puntosxruta`
--
ALTER TABLE `puntosxruta`
  ADD PRIMARY KEY (`idPxR`);

--
-- Indices de la tabla `puntosxzona`
--
ALTER TABLE `puntosxzona`
  ADD PRIMARY KEY (`idPxZ`);

--
-- Indices de la tabla `queuseCorreos`
--
ALTER TABLE `queuseCorreos`
  ADD PRIMARY KEY (`idQNotificaciones`);

--
-- Indices de la tabla `queuseMensaje`
--
ALTER TABLE `queuseMensaje`
  ADD PRIMARY KEY (`idQMensaje`);

--
-- Indices de la tabla `queuseNotificaciones`
--
ALTER TABLE `queuseNotificaciones`
  ADD PRIMARY KEY (`idQNotificacion`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`idRuta`);

--
-- Indices de la tabla `seguimientoxvisita`
--
ALTER TABLE `seguimientoxvisita`
  ADD PRIMARY KEY (`idSxV`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idServicio`);

--
-- Indices de la tabla `servidorCorreo`
--
ALTER TABLE `servidorCorreo`
  ADD PRIMARY KEY (`idSCorreo`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`idSesion`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`);

--
-- Indices de la tabla `solicitudComentarios`
--
ALTER TABLE `solicitudComentarios`
  ADD PRIMARY KEY (`idSComentario`);

--
-- Indices de la tabla `solictudVisita`
--
ALTER TABLE `solictudVisita`
  ADD PRIMARY KEY (`idSVisita`);

--
-- Indices de la tabla `tipoVehiculo`
--
ALTER TABLE `tipoVehiculo`
  ADD PRIMARY KEY (`idTVehiculo`);

--
-- Indices de la tabla `tockenRecuperacion`
--
ALTER TABLE `tockenRecuperacion`
  ADD PRIMARY KEY (`idTRecuperacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `usuario_respuesta`
--
ALTER TABLE `usuario_respuesta`
  ADD PRIMARY KEY (`idUsuario_Respuesta`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`idVisita`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`idZona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ajusteCuestionario`
--
ALTER TABLE `ajusteCuestionario`
  MODIFY `idACuestionarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `archivosxsolicitud`
--
ALTER TABLE `archivosxsolicitud`
  MODIFY `idAxS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT de la tabla `campana`
--
ALTER TABLE `campana`
  MODIFY `idCampana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `coneptoCobro`
--
ALTER TABLE `coneptoCobro`
  MODIFY `idCCobro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `coneptoComicion`
--
ALTER TABLE `coneptoComicion`
  MODIFY `idCComicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `corte_deta`
--
ALTER TABLE `corte_deta`
  MODIFY `idCorteD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT de la tabla `corte_enca`
--
ALTER TABLE `corte_enca`
  MODIFY `idCorte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `idCuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `emailserver`
--
ALTER TABLE `emailserver`
  MODIFY `idEServer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Estados`
--
ALTER TABLE `Estados`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `evidecias`
--
ALTER TABLE `evidecias`
  MODIFY `idEvidecias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `gatewaySMS`
--
ALTER TABLE `gatewaySMS`
  MODIFY `idGSMS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `gruposMensajes`
--
ALTER TABLE `gruposMensajes`
  MODIFY `idGMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `gruposMensajesUsuarios`
--
ALTER TABLE `gruposMensajesUsuarios`
  MODIFY `idGMUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Municipios`
--
ALTER TABLE `Municipios`
  MODIFY `idMunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `preguntasxcuesntionario`
--
ALTER TABLE `preguntasxcuesntionario`
  MODIFY `idPxC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `puntosxruta`
--
ALTER TABLE `puntosxruta`
  MODIFY `idPxR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puntosxzona`
--
ALTER TABLE `puntosxzona`
  MODIFY `idPxZ` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `queuseCorreos`
--
ALTER TABLE `queuseCorreos`
  MODIFY `idQNotificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `queuseMensaje`
--
ALTER TABLE `queuseMensaje`
  MODIFY `idQMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT de la tabla `queuseNotificaciones`
--
ALTER TABLE `queuseNotificaciones`
  MODIFY `idQNotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `idRuta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguimientoxvisita`
--
ALTER TABLE `seguimientoxvisita`
  MODIFY `idSxV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=439;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servidorCorreo`
--
ALTER TABLE `servidorCorreo`
  MODIFY `idSCorreo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `idSesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `solicitudComentarios`
--
ALTER TABLE `solicitudComentarios`
  MODIFY `idSComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `solictudVisita`
--
ALTER TABLE `solictudVisita`
  MODIFY `idSVisita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoVehiculo`
--
ALTER TABLE `tipoVehiculo`
  MODIFY `idTVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tockenRecuperacion`
--
ALTER TABLE `tockenRecuperacion`
  MODIFY `idTRecuperacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `usuario_respuesta`
--
ALTER TABLE `usuario_respuesta`
  MODIFY `idUsuario_Respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `idVisita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `idZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
