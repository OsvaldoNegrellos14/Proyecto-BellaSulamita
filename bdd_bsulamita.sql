create database bellasulamita;
use bellasulamita;

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
);

ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
  
INSERT INTO `administrador` (`id`, `username`, `password`) VALUES
(1, 'usuario', 'df0e634d89fc1c14a44f513aed85e2c4'),
(2, 'usuario', 'f8032d5cae3de20fcec887f395ec9a6a');

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `imagen` varchar(600) NOT NULL
);

ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `banner` (`id`, `titulo`, `descripcion`, `imagen`) VALUES
(1, 'Invierno', 'Abrigos, suéteres', 'multimedia/invierno.jpg'),
(2, 'Primavera','Vestidos','multimedia/primavera.jpg'),
(3, 'Verano', 'Vestidos', 'multimedia/verano.jpg'),
(4, 'Trajes', 'Conjuntos, pantalones, sacos y más', 'multimedia/trajes.jpg'),
(5, 'Vestidos', 'Para cualquier ocasión', 'multimedia/vestidos.jpg'),
(6, 'Vestidos de gala', 'Lo más elegante', 'multimedia/gala.jpg'),
(7, 'Faldas', 'Para verano y primavera', 'multimedia/faldas.jpg'),
(8, 'Sudaderas', 'Sudaderas', 'multimedia/sudaderas.jpg'),
(9, 'Playeras y blusas', 'Diseños únicos', 'multimedia/playeras.jpg'),
(10, 'Pantalones', 'Pantalones de mezclilla y formales', 'multimedia/pantalones.jpg');

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
);

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `categoria`(`id`, `categoria`) VALUES
(1, 'Invierno'),
(2, 'Trajes'),
(3, 'Vestidos'),
(4, 'Faldas'),
(5, 'Sudaderas'),
(6, 'Pantalones'),
(7, 'Blusas');

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `asunto` varchar(80) NOT NULL,
  `mensaje` text NOT NULL
);

ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(600) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `precio` float NOT NULL,
  `marca` varchar(50) NOT NULL,
  `color` varchar(100) NOT NULL,
  `talla` varchar(50) NOT NULL,
  foreign key (id_categoria) references categoria(id)
);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
INSERT INTO `productos` (`id`, `id_categoria`, `imagen`, `nombre`, `description`, `precio`, `marca`, `color`, `talla`) VALUES
(1, 1, 'multimedia/abrigo_invierno.jpg', 'Abrigo con peluche', 'Abrigo blanco con gris', 499, 'De La Roca', 'Blanco', 'Mediano'),
(2, 1, 'multimedia/abrigo2.jpg', 'Abrigo con felpa', 'Abrigo negro con felpa de color blanco', 689, 'Esprit', 'Negro', 'Mediano'),
(3, 1, 'multimedia/abrigo3.jpg', 'Abrigo impermeable', 'Abrigo azul impermeable doble capa', 799, 'Esprit', 'Aazul Marino', 'Mediano'),
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
(52, 7, 'multimedia/blusa6.jpg', 'Blusa negra polo', 'Blusa negra lisa sin manga', 129, 'Pepe Jeans', 'Negro', 'Mediano');

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `imagen` varchar(300) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `informacion` varchar(300) NOT NULL
);

ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `slider` (`id`, `imagen`, `titulo`, `informacion`) VALUES 
(1, 'multimedia/slider.jpg', 'Estilo formal', 'Trajes, sacos y pantalones'),
(2, 'multimedia/slider2.jpg', 'Ropa fresca', 'Playeras, blusas y faldas'),
(3, 'multimedia/slider3.jpg', 'Vestidos', 'Para primavera, verano y cualquier ocasión');
  
