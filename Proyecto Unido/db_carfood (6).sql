-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-01-2016 a las 18:54:59
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_carfood`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLIENTE`
--

CREATE TABLE IF NOT EXISTS `CLIENTE` (
  `CEDULA` int(11) NOT NULL,
  `NOMBRES` varchar(45) NOT NULL,
  `APELLIDOS` varchar(45) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `EMAIL` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `CLIENTE`
--

INSERT INTO `CLIENTE` (`CEDULA`, `NOMBRES`, `APELLIDOS`, `TELEFONO`, `EMAIL`) VALUES
(1104198294, 'Roger', 'Jimbo', 2577616, 'rijimbo@utpl.edu.ec'),
(1105583494, 'Anabel ', 'Quinche', 2611189, 'anabelqg@gmail.com'),
(1105679748, 'Vanessa', 'Narvaez', 2677945, 'vlnarvaez'),
(1106778923, 'Marco', 'Guarnizo', 2677671, 'mguarnizo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DETALLE`
--

CREATE TABLE IF NOT EXISTS `DETALLE` (
  `ID_PEDIDOS` int(11) NOT NULL,
  `ID_PLATOS` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `DETALLE`
--

INSERT INTO `DETALLE` (`ID_PEDIDOS`, `ID_PLATOS`) VALUES
(1, 1),
(2, 6),
(3, 13),
(4, 5),
(4, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MESA`
--

CREATE TABLE IF NOT EXISTS `MESA` (
  `ID_MESA` varchar(5) NOT NULL,
  `ESTADO` varchar(25) NOT NULL,
  `CAPACIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `MESA`
--

INSERT INTO `MESA` (`ID_MESA`, `ESTADO`, `CAPACIDAD`) VALUES
('1', 'ocupada', 8),
('2', 'Ocupada', 5),
('3', 'Ocuapada', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PEDIDOS`
--

CREATE TABLE IF NOT EXISTS `PEDIDOS` (
  `ID_PEDIDOS` int(11) NOT NULL,
  `ID_MESA` int(11) NOT NULL,
  `CEDULA` int(11) NOT NULL,
  `TOTAL` float NOT NULL,
  `OBSERVACIONES` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `PEDIDOS`
--

INSERT INTO `PEDIDOS` (`ID_PEDIDOS`, `ID_MESA`, `CEDULA`, `TOTAL`, `OBSERVACIONES`) VALUES
(1, 1, 1105583494, 10, ''),
(2, 3, 1105679748, 20, 'Sin cebolla'),
(3, 2, 1106778923, 40, 'Con limon'),
(4, 3, 1104198294, 9.3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PLATOS`
--

CREATE TABLE IF NOT EXISTS `PLATOS` (
  `ID_PLATOS` varchar(5) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `DETALLE` varchar(100) NOT NULL,
  `PRECIO` float NOT NULL,
  `TIPO_PLATO` varchar(45) NOT NULL,
  `IMAGEN` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `PLATOS`
--

INSERT INTO `PLATOS` (`ID_PLATOS`, `NOMBRE`, `DETALLE`, `PRECIO`, `TIPO_PLATO`, `IMAGEN`) VALUES
('001', 'crema de choclo', 'choclos frescos de la localidad', 2.25, 'desayuno', ''),
('0010', 'Seco de chancho', 'arroz, carne de chancho, ensalada', 4.4, 'merienda', ''),
('0011', 'Dualidad de secos', 'Seco de pollo, seco de chancho, papas, ensalada', 13.9, 'merienda', ''),
('0012', 'Guatita', 'La típica guatita ecuatoriana', 2.75, 'merienda', ''),
('0013', 'Churrasco', 'arroz, huevo, carne frita, pechuga de pollo, papas fritas, ensalada, plátanos fritos', 8.65, 'plato a la carta', ''),
('0014', 'Parrillada de mi tierra (dos personas)', 'carne de chancho, de res, pechuga de pollo, chorizo, papas cocinadas, mote pillo,ensalada', 30, 'plato a la carta', ''),
('0015', '1/4 de pollo a la parrilla', 'ensalada y papas fritas', 9.5, 'plato a la carta', ''),
('0016', 'Cuy Asado', 'papa cocinada, lechuga, tomate, salsa de maní', 26, 'plato a la carta', ''),
('0017', 'Patacones con salsa de queso', '10 patacones ', 4.6, 'entradas', ''),
('0018', 'Muchines de yuca', '2 por orden', 3.9, 'entradas', ''),
('0019', 'Humitas', '', 0.9, 'entradas', ''),
('002', 'Enrollado de pollo', 'pechuga de pollo enrollada en tortilla de harina', 2.5, 'desayuno', ''),
('0020', 'Empanadas de Harina', 'rellenas de queso (10 unidades)', 3.49, 'entradas', ''),
('0021', 'Café filtrado', 'café artesanal de la localidad', 0.5, 'bebidas calientes', ''),
('0022', 'café expreso', 'sabor concentrado (rápida prepración)', 1.3, 'bebidas calientes', ''),
('0023', 'capuchino', 'café expreso y leche montada con el vapor para crear la espuma.', 2, 'bebidas calientes', ''),
('0024', 'TÉ', '(manzanilla, menta, cedrón, herba luisa, anís)', 0.45, 'bebidas calientes', ''),
('0025', 'jugos naturales', 'tomate de árbol, mango, naranjilla, naranja, mora, fresa', 1.75, 'bebidas frías', ''),
('0026', 'Batidos', 'tomate de árbol, mango, naranjilla, naranja, mora,...', 2.25, 'bebidas frías', ''),
('0027', 'Limonada', 'Jarra', 2, 'bebidas frías', ''),
('0028', 'Colas', 'coca cola, sprite, fanta, fiora vanti', 0.35, 'bebidas frías', ''),
('003', 'Empanada de verde', 'Empanada plátano verda rellena de pollo y verduras', 1.5, 'desayuno', ''),
('004', 'Empanada de morocho', 'De maíz rellena de carne', 1.5, 'desayuno', ''),
('005', 'Caldo de bola', 'Bolas de plátanos verdes', 8.85, 'almuerzo', ''),
('006', 'Locro de papa', 'papas frescas de la localidad', 6.89, 'almuerzo', ''),
('007', 'Sopa marinera', 'incluye todos los mariscos comunes', 13.99, 'almuerzo', ''),
('008', 'Caldo de gallina criolla', 'con buena presa', 6.9, 'almuerzo', ''),
('009', 'Seco de pollo', 'presa de pollo, arroz, ensalada', 3, 'merienda', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

CREATE TABLE IF NOT EXISTS `USUARIOS` (
  `ID_USUARIO` int(11) NOT NULL,
  `USUARIO` varchar(20) NOT NULL,
  `CONTRASENIA` varchar(45) NOT NULL,
  `TIPO_USUARIO` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `USUARIOS`
--

INSERT INTO `USUARIOS` (`ID_USUARIO`, `USUARIO`, `CONTRASENIA`, `TIPO_USUARIO`) VALUES
(1, 'admin', 'admin', '1'),
(2, 'chef', 'chef', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CLIENTE`
--
ALTER TABLE `CLIENTE`
 ADD PRIMARY KEY (`CEDULA`);

--
-- Indices de la tabla `DETALLE`
--
ALTER TABLE `DETALLE`
 ADD PRIMARY KEY (`ID_PEDIDOS`,`ID_PLATOS`);

--
-- Indices de la tabla `MESA`
--
ALTER TABLE `MESA`
 ADD PRIMARY KEY (`ID_MESA`);

--
-- Indices de la tabla `PEDIDOS`
--
ALTER TABLE `PEDIDOS`
 ADD PRIMARY KEY (`ID_PEDIDOS`), ADD KEY `mesa` (`ID_MESA`);

--
-- Indices de la tabla `PLATOS`
--
ALTER TABLE `PLATOS`
 ADD PRIMARY KEY (`ID_PLATOS`);

--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
 ADD PRIMARY KEY (`ID_USUARIO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
