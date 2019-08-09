-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2019 a las 08:01:17
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bellasulamita`
--
create database bellasulamita;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `username`, `password`) VALUES
(1, 'usuario', 'df0e634d89fc1c14a44f513aed85e2c4'),
(2, 'usuario', 'f8032d5cae3de20fcec887f395ec9a6a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `imagen`) VALUES
(1, 'Invierno', 'multimedia/sueteres.jpg'),
(2, 'Trajes', 'multimedia/trajes.jpg'),
(3, 'Vestidos', 'multimedia/random2.jpg'),
(4, 'Faldas', 'multimedia/falda.jpg'),
(5, 'Sudaderas', 'multimedia/sudaderas2.jpg'),
(6, 'Pantalones', 'multimedia/pmezclilla.jpg'),
(7, 'Blusas', 'multimedia/blusa3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `asunto` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id`, `nombre`, `telefono`, `asunto`, `mensaje`) VALUES
(1, 'osvado fabian', 2381495751, 'aclaracion', 'todos los productos mostrados estÃ¡n disponibles en su tienda fÃ­sica?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `talla` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `imagen`, `nombre`, `description`, `precio`, `marca`, `color`, `talla`) VALUES
(1, 1, 'multimedia/abrigo_invierno.jpg', 'Abrigo con peluche', 'Abrigo blanco con gris', 499, 'De La Roca', 'Blanco', 'Mediano'),
(2, 1, 'multimedia/abrigo2.jpg', 'Abrigo con felpa', 'Abrigo negro con felpa de color blanco', 689, 'Esprit', 'Negro', 'Mediano'),
(3, 1, 'multimedia/abrigo3.jpg', 'Abrigo impermeable', 'Abrigo azul impermeable doble capa', 799, 'Esprit', 'Azul Marino', 'Mediano'),
(4, 1, 'multimedia/abrigo4.jpg', 'Abrigo', 'Abrigo café con cuello de felpa', 629, 'Only', 'Café', 'Mediana'),
(5, 1, 'multimedia/abrigo5.jpg', 'Abrigo con peluche invierno', 'Abrigo azul cielo con peluche café', 689, 'Only', 'Azul cielo', 'Mediano'),
(6, 1, 'multimedia/abrigo6.jpg', 'Abrigo negro', 'Abrigo negro con felpa negra en el cuello', 849, 'Esprit', 'Negro', 'Mediano'),
(7, 2, 'multimedia/traje.jpg', 'Traje negro completo', 'Traje negro saco y pantalón', 749, 'Emporio Armani', 'Negro', 'Mediano'),
(8, 2, 'multimedia/traje2.jpg', 'Traje negro rayado', 'Traje negro saco y pantalón rayado', 639, 'Emporio Armani', 'Negro', 'Grande'),
(9, 2, 'multimedia/traje3.jpg', 'Traje azul marino', 'Traje azul marino liso completo saco y pantalón', 749, 'Emporio Armani', 'Azul Marino', 'Mediano'),
(10, 2, 'multimedia/traje4.jpg', 'Traje completo pastel', 'Traje liso saco y pantalón', 839, 'Emporio Armani', 'Pastel', 'Grande'),
(11, 2, 'multimedia/traje5.jpg', 'Traje completo blanco', 'Traje liso saco y pantalón blanco', 729, 'Emporio Armani', 'Blanco', 'Pequeño'),
(12, 3, 'multimedia/vestido_p.jpg', 'Vestido primavera', 'Vestido blanco floreado', 429, 'Adrianna Papell', 'Blanco', 'Pequeño'),
(13, 3, 'multimedia/vestido_p2.jpg', 'Vestido primavera Adrianna Papell', 'Vestido blanco con mariposas', 479, 'Adrianna Papell', 'Blanco', 'Grande'),
(14, 3, 'multimedia/vestido_p3.jpg', 'Vestido primavera japonés', 'Vestido blanco floreado estilo japonés', 669, 'Adrianna Papell', 'Blanco', 'Mediano'),
(15, 3, 'multimedia/vestido_p4.jpg', 'Vestido flores primavera', 'Vestido blanco floreado sin mangas', 329, 'Adrianna Papell', 'Blanco', 'Pequeño'),
(16, 3, 'multimedia/vestido_p5.jpg', 'Vestido flores negro', 'Vestido primaveral negro floreado', 379, 'Adrianna Papell', 'Negro', 'Grande'),
(17, 3, 'multimedia/vestido_p6.jpg', 'Vestido primavera negro', 'Vestido primavera negro con escote', 549, 'Adrianna Papell', 'Negro', 'Mediano'),
(18, 3, 'multimedia/vestido_v.jpg', 'Vestido verano abstracto', 'Vestido verano azul con amarillo', 539, 'Altonadock', 'Azul y Amarillo', 'Grande'),
(19, 3, 'multimedia/vestido_v2.jpg', 'Vestido verano hippie', 'Vestido hippie verano azul marino', 329, 'Altonadock', 'Azul Marino', 'Mediano'),
(20, 3, 'multimedia/vestido_v3.jpg', 'Vestido verano abstracto escote', 'Vestido verano azul cielo con escote', 419, 'Altonadock', 'Azul Cielo', 'Grande'),
(21, 3, 'multimedia/vestido_v4.jpg', 'Vestido corto verano con escote', 'Vestido café con escote floreado', 749, 'Altonadock', 'Café', 'Mediano'),
(22, 3, 'multimedia/vestido_v5.jpg', 'Vestido verano abstracto', 'Vestido verano azul con amarillo', 539, 'Altonadock', 'Azul y Amarillo', 'Mediano'),
(23, 3, 'multimedia/vestido_v6.jpg', 'Vestido largo verano', 'Vestido liso verano blanco y café', 339, 'Altonadock', 'Blanco y Café', 'Grande'),
(24, 3, 'multimedia/vestido_g.jpg', 'Vestido liso rojo', 'Vestido liso largo rojo de gala', 849, 'Brave Soul', 'Rojo', 'Grande'),
(25, 3, 'multimedia/vestido_g2.jpg', 'Vestido rojo oscuro', 'Vestido liso largo rojo oscuro de gala escotado', 989, 'Fórmula Joven', 'Rojo Oscuro', 'Mediano'),
(26, 3, 'multimedia/vestido_g3.jpg', 'Vestido rojo bordado', 'Vestido bordado largo rojo de gala', 939, 'Almatrichi', 'Rojo', 'Grande'),
(27, 3, 'multimedia/vestido_g4.jpg', 'Vestido azul bordado', 'Vestido bordado largo azul de gala', 939, 'Almatrichi', 'Azul', 'Mediano'),
(28, 3, 'multimedia/vestido_g5.jpg', 'Vestido verde bordado', 'Vestido bordado largo verde de gala', 919, 'Almatrichi', 'Verde', 'Pequeño'),
(29, 3, 'multimedia/vestido_g6.jpg', 'Vestido liso negro', 'Vestido liso corto negro de gala', 999, 'Elogy', 'Negro', 'Mediano'),
(30, 4, 'multimedia/falda1.jpg', 'Falda azul lisa', 'Falda larga lisa azul elegante', 219, 'Esprit', 'Azul', 'Grande'),
(31, 4, 'multimedia/falda2.jpg', 'Falda azul corta', 'Falda corta lisa azul cielo deportiva', 329, 'Wilson', 'Azul Cielo', 'Pequeño'),
(32, 4, 'multimedia/falda3.jpg', 'Falda azul marino lisa', 'Falda lisa azul marina elegante', 249, 'Amichi', 'Azul Marino', 'Mediano'),
(33, 4, 'multimedia/falda4.jpg', 'Falda amarilla lisa', 'Falda corta lisa amarilla deportiva', 239, 'Esprit', 'Brownie', 'Pequeño'),
(34, 4, 'multimedia/falda5.jpg', 'Falda verde lisa', 'Falda larga lisa verde gruesa', 319, 'Brownie', 'Verde', 'Grande'),
(35, 4, 'multimedia/falda6.jpg', 'Falda azul mezclilla', 'Falda corta mezclilla azul', 299, 'Amichi', 'Azul', 'Mediano'),
(36, 5, 'multimedia/sudadera.jpg', 'Sudadera corta gris', 'Sudadera gris mangas negras con capucha', 420, 'Noisy May', 'Gris', 'Pequeño'),
(37, 5, 'multimedia/sudadera2.jpg', 'Sudadera blanca musica', 'Sudadera blanca estampado musica', 349, 'Only', 'Blanco', 'Pequeño'),
(38, 5, 'multimedia/sudadera3.jpg', 'Sudadera corta amarilla', 'Sudadera amarilla con capucha estampado mangas', 329, 'Brownie', 'Amarillo', 'Mediano'),
(39, 5, 'multimedia/sudadera4.jpg', 'Sudadera rosa estampado', 'Sudadera rosa estampado negro chasquido', 450, 'Noisy May', 'Rosa', 'Grande'),
(40, 5, 'multimedia/sudadera5.jpg', 'Sudadera rosa lisa', 'Sudadera rosa con capucha estampado gato', 370, 'Noisy May', 'Rosa', 'Pequeño'),
(41, 5, 'multimedia/sudadera6.jpg', 'Sudadera verde', 'Sudadera verde con capucha estampado Harry Potter', 449, 'Noisy May', 'Verde', 'Mediano'),
(42, 6, 'multimedia/pantalones_formales2.jpg', 'Pantalon formal gris', 'Pantalon formal liso elegante gris', 219, 'Kookai', 'Gris', 'Pequeño'),
(43, 6, 'multimedia/pantalones_formales3.jpg', 'Pantalon formal palatzzo', 'Pantalon formal tipo palatzoo elegante', 249, 'Only', 'Rojo y Negro', 'Grande'),
(44, 6, 'multimedia/pantalones_formales4.jpg', 'Pantalon formal negro', 'Pantalon formal liso elegante negro', 239, 'Morgan', 'Negro', 'Mediano'),
(45, 6, 'multimedia/pantalones_formales5.jpg', 'Pantalon formal rayado', 'Pantalon formal rayado elegante negro', 269, 'Morgan', 'Negro', 'Pequeño'),
(46, 6, 'multimedia/pantalones_formales6.jpg', 'Pantalon formal rayado azul', 'Pantalon formal liso elegante rayado azul marino', 259, 'Morgan', 'Azul Marino', 'Mediano'),
(47, 7, 'multimedia/blusa1.jpg', 'Blusa roja estampado', 'Blusa roja con estampado elegante', 129, 'Pepe Jeans', 'Rojo', 'Mediano'),
(48, 7, 'multimedia/blusa2.jpg', 'Blusa negra', 'Blusa negra rayada elegante', 149, 'Easy Wear', 'Negro', 'Mediano'),
(49, 7, 'multimedia/blusa3.jpg', 'Blusa roja escote', 'Blusa roja con escote elegante sin mangas', 139, 'Fórmula Joven', 'Rojo', 'Mediano'),
(50, 7, 'multimedia/blusa4.jpg', 'Blusa mezclilla estampado', 'Blusa mezclilla con estampado elegante manda larga', 169, 'Pepe Jeans', 'Azul', 'Mediano'),
(51, 7, 'multimedia/blusa5.jpg', 'Blusa blanca', 'Blusa lisa blanca elegante manga corta', 119, 'Kookai', 'Blanco', 'Mediano'),
(52, 7, 'multimedia/blusa6.jpg', 'Blusa negra polo', 'Blusa negra lisa sin manga', 129, 'Pepe Jeans', 'Negro', 'Mediano'),
(54, 1, 'multimedia/bufanda1.jpg', 'Bufanda RR', 'Bufanda con rayas rojas', 130, 'Espirit', 'Blanco', 'Unitalla'),
(55, 1, 'multimedia/bufanda2.jpg', 'Bufanda ES', 'Bufanda simple', 130, 'Espirit', 'Rojo', 'Unitalla'),
(56, 1, 'multimedia/bufanda3.jpg', 'Bufanda AN', 'Bufanda simple flecos', 130, 'Espirit', 'Negro', 'Unitalla'),
(57, 1, 'multimedia/gorro1.jpg', 'Gorro Gu', 'Gorro moderno 2019', 2000, 'Easy Wear', 'Azul', 'Mediano'),
(58, 1, 'multimedia/gorro2.jpg', 'Gorro Girls', 'Gorro femenino cotidiano', 200, 'Morgan', 'Negro', 'Mediano'),
(59, 1, 'multimedia/gorro3.jpg', 'Gorro Basico', 'Gorro Converse gris 2019', 100, 'Easy Wear', 'Gris', 'Mediano'),
(60, 1, 'multimedia/abrigo7.jpg', 'Abrigo Tela', 'Abrigo 2019', 999, 'Esprit', 'Negro', 'Grande'),
(61, 1, 'multimedia/abrigo8.jpg', 'Abrigo Casual', 'Abrigo cotidiano', 2999, 'Kookai', 'Turquesa', 'Mediano'),
(62, 2, 'multimedia/traje10.jpg', 'Traje Casual', 'Traje femenino casual ', 969, 'Emporio Armani', 'Rojo', 'Pequeño'),
(63, 2, 'multimedia/traje11.jpg', 'Traje Casual R', 'Bussiness ', 1069, 'Emporio Armani', 'Rosa', 'Mediano'),
(64, 2, 'multimedia/traje12.jpg', 'Traje Mayor R', 'Milf ', 569, 'Emporio Armani', 'Negro', 'Mediano'),
(65, 2, 'multimedia/traje14.jpg', 'Traje NN', 'Traje completo ', 1500, 'Emporio Armani', 'Negro', 'Mediano'),
(66, 2, 'multimedia/traje15.jpg', 'Traje Juvenil', 'Vestido y Blusa', 1000, 'Emporio Armani', 'Naranja', 'Mediano'),
(67, 2, 'multimedia/traje16.jpg', 'Traje Truq', 'Oufit Truq', 969, 'Emporio Armani', 'Verde agua', 'Mediano'),
(68, 2, 'multimedia/traje17.jpg', 'Traje Joven', 'Bussiness Negro', 1069, 'Emporio Armani', 'Negro', 'Mediano'),
(69, 2, 'multimedia/traje18.jpg', 'Traje MM', 'Negocios blanco', 569, 'Emporio Armani', 'Blanco', 'Mediano'),
(70, 3, 'multimedia/ves1.jpg', 'Vestido Fiesta', 'Vestido coctel', 899, 'Adrianna Papell', 'Azul', 'Mediano'),
(71, 3, 'multimedia/ves2.jpg', 'Vestido Juvenil', 'Vestido chicas 2019', 529, 'Altonadock', 'Negro', 'Mediano'),
(72, 3, 'multimedia/ves3.jpg', 'Vestido Oufit', 'Vestido Rojo joven', 999, 'Adrianna Papell', 'Rojo', 'Mediano'),
(73, 3, 'multimedia/ves4.jpg', 'Vestido SetS', 'Vestido Año modelar', 749, 'Altonadock', 'Azul ', 'Mediano'),
(74, 3, 'multimedia/ves5.jpg', 'Vestido Comple', 'Vestido Casual ', 990, 'Adrianna Papell', 'Azul', 'Mediano'),
(75, 3, 'multimedia/ves6.jpg', 'Vestido Colores', 'Vestido con estampados', 1000, 'Altonadock', 'Negro', 'Mediano'),
(76, 3, 'multimedia/ves7.jpg', 'Vestido Mezclilla', 'Vestido 100 mezclilla', 529, 'Altonadock', 'Azul', 'Mediano'),
(77, 4, 'multimedia/falda10.jpg', 'Falda azul A', 'Falda en linea A', 819, 'Esprit', 'Azul', 'Grande'),
(78, 4, 'multimedia/falda11.jpg', 'Falda Empleo', 'Falda Entallada', 779, 'Wilson', 'Negro', 'Pequeño'),
(79, 4, 'multimedia/falda12.jpg', 'Falda mezclilla', 'Falda mezclilla antigua', 555, 'Amichi', 'Azul', 'Mediano'),
(80, 4, 'multimedia/falda13.jpg', 'Falda mez juvenil', 'Falda corta mezclilla', 219, 'Esprit', 'Azul', 'Grande'),
(81, 4, 'multimedia/falda14.jpg', 'Falda estampada', 'Falda estampada con flores', 100, 'Wilson', 'Negro', 'Pequeño'),
(82, 4, 'multimedia/falda15.jpg', 'Falda Suelta', 'Falda larga suelta', 320, 'Amichi', 'Gris', 'Grande'),
(83, 4, 'multimedia/falda16.jpg', 'Falta entallada', 'Entallada con rayas de colores', 150, 'Amichi', 'Azul', 'Mediano'),
(84, 5, 'multimedia/sudadera10.jpg', 'Sudadera Bicolor', 'Sudadera de dos colores mediana', 400, 'Noisy May', 'Blanco', 'Pequeño'),
(85, 5, 'multimedia/sudadera11.jpg', 'Sudadera Yes', 'Sudadera amarilla yes', 500, 'Only', 'Amarillo', 'Mediano'),
(86, 5, 'multimedia/sudadera12.jpg', 'Sudadera Nike', 'Sudadera rosa nike original', 300, 'Brownie', 'Rosa', 'Mediano'),
(87, 5, 'multimedia/sudadera13.jpg', 'Sudadera Estampado', 'Sudadera de colores', 410, 'Noisy May', 'Morado y Azul', 'Pequeño'),
(88, 5, 'multimedia/sudadera14.jpg', 'Sudadera Gato', 'Sudadera gris estampado gato', 869, 'Only', 'Gris', 'Pequeño'),
(89, 5, 'multimedia/sudadera15.jpg', 'Sudadera Gato Orejas', 'Sudadera capucha orejas', 420, 'Brownie', 'Gris', 'Mediano'),
(90, 5, 'multimedia/sudadera16.jpg', 'Sudadera Patitas', 'Sudadera estampado patitas', 350, 'Brownie', 'Gris y azul', 'Mediano'),
(91, 6, 'multimedia/pantalon1.jpg', 'Pantalon casual', 'Pantalon casual mezclilla flores', 500, 'Kookai', 'Gris', 'Pequeño'),
(92, 6, 'multimedia/pantalon2.jpg', 'Pantalon mezclilla', 'Pantalon casual basico', 400, 'Only', 'Azul', 'Mediano'),
(93, 6, 'multimedia/pantalon3.jpg', 'Pantalon militar', 'Pantalon casula militar', 600, 'Morgan', 'Verde', 'Mediano'),
(94, 6, 'multimedia/pantalon4.jpg', 'Pantalon Militar Clasico', 'Pantalon militar casual femenino', 890, 'Kookai', 'Verde', 'Pequeño'),
(95, 6, 'multimedia/pantalon5.jpg', 'Jean Deporte CS', 'Jean tipo deporte moderno', 100, 'Only', 'Gris', 'Grande'),
(96, 6, 'multimedia/pantalon6.jpg', 'Pantalon Cotidiano', 'Pantalon informal moderno', 200, 'Morgan', 'Gris', 'Mediano'),
(97, 6, 'multimedia/pantalon7.jpg', 'Pantalon Lunares', 'Pantalon con lunares blancos', 150, 'Only', 'Azul con puntos', 'Grande'),
(98, 7, 'multimedia/blusa10.jpg', 'Blusa roja simple', 'Blusa roja simple', 200, 'Pepe Jeans', 'Rojo', 'Mediano'),
(99, 7, 'multimedia/blusa11.jpg', 'Blusa Jovenes', 'Blusa blanca juvenil 2019', 560, 'Easy Wear', 'Blanco', 'Mediano'),
(100, 7, 'multimedia/blusa12.jpg', 'Blusa Rayada', 'Blusa rayada sin mangas', 300, 'Fórmula Joven', 'Azul', 'Mediano'),
(101, 7, 'multimedia/blusa13.jpg', 'Blusa Azul', 'Blusa azul para seÃ±ora', 459, 'Pepe Jeans', 'Azul', 'Mediano'),
(102, 7, 'multimedia/blusa14.jpg', 'Blusa cuello', 'Blusa casual blanca jovenes', 479, 'Kookai', 'Blanco', 'Mediano'),
(103, 7, 'multimedia/blusa15.jpg', 'Blusa Rosa 2019', 'Blusa Lisa con listones', 220, 'Pepe Jeans', 'Rosa', 'Mediano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `imagen` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `informacion` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `imagen`, `titulo`, `informacion`) VALUES
(1, 'multimedia/slider.jpg', 'Estilo formal', 'Trajes, sacos y pantalones'),
(2, 'multimedia/slider2.jpg', 'Ropa fresca', 'Playeras, blusas y faldas'),
(3, 'multimedia/slider3.jpg', 'Vestidos', 'Para primavera, verano y cualquier ocasiÃ³n');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
