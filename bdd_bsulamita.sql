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
(1, 'Invierno', 'Abrigos, suéteres', 'multimedia/invierno.jpeg'),
(2, 'Primavera','Vestidos','multimedia/primavera.jpeg'),
(3, 'Verano', 'Vestidos', 'multimedia/verano.jpeg'),
(4, 'Trajes', 'Conjuntos, pantalones, sacos y más', 'multimedia/trajes.jpeg'),
(5, 'Vestidos', 'Para cualquier ocasión', 'multimedia/vestidos.jpeg'),
(6, 'Vestidos de gala', 'Lo más elegante', 'multimedia/gala.jpeg'),
(7, 'Faldas', 'Para verano y primavera', 'multimedia/faldas.jpeg'),
(8, 'Sudaderas', 'Sudaderas', 'multimedia/sudaderas.jpeg'),
(9, 'Playeras y blusas', 'Diseños únicos', 'multimedia/playeras.jpeg'),
(10, 'Pantalones', 'Pantalones de mezclilla y formales', 'multimedia/pantalones.jpeg');

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
(1, 1, 'multimedia/abrigo_invierno.jpeg', 'Abrigo con peluche', 'Abrigo blanco con gris', 499, 'De La Roca', 'Blanco', 'Mediano'),
(2, 1, 'multiedia/abrigo2.jpeg', 'Abrigo con felpa', 'Abrigo negro con felpa de color blanco', 689, 'Esprit', 'Negro', 'Mediano'),
(3, 1, 'multiedia/abrigo3.jpeg', 'Abrigo impermeable', 'Abrigo azul impermeable doble capa', 799, 'Esprit', 'Aazul Marino', 'Mediano'),
(4, 1, 'multiedia/abrigo4.jpeg', 'Abrigo', 'Abrigo café con cuello de felpa', 629, 'Only', 'Café', 'Mediana'),
(5, 1, 'multiedia/abrigo5.jpeg', 'Abrigo con peluche invierno', 'Abrigo azul cielo con peluche café', 689, 'Only', 'Azul cielo', 'Mediano'),
(6, 1, 'multiedia/abrigo6.jpeg', 'Abrigo negro', 'Abrigo negro con felpa negra en el cuello', 849, 'Esprit', 'Negro', 'Mediano'),
(7, 2, 'multiedia/traje.jpeg', 'Traje negro completo', 'Traje negro saco y pantalón', 749, 'Emporio Armani', 'Negro', 'Mediano'),
(8, 2, 'multiedia/traje2.jpeg', 'Traje negro rayado', 'Traje negro saco y pantalón rayado', 639, 'Emporio Armani', 'Negro', 'Grande'),
(9, 2, 'multiedia/traje3.jpeg', 'Traje azul marino', 'Traje azul marino liso completo saco y pantalón', 749, 'Emporio Armani', 'Azul Marino', 'Mediano'),
(10, 2, 'multiedia/traje4.jpeg', 'Traje completo pastel', 'Traje liso saco y pantalón', 839, 'Emporio Armani', 'Pastel', 'Grande'),
(11, 2, 'multiedia/traje5.jpeg', 'Traje completo blanco', 'Traje liso saco y pantalón blanco', 729, 'Emporio Armani', 'Blanco', 'Pequeño'),
(12, 3, 'multiedia/vestido_p.jpeg', 'Vestido primavera', 'Vestido blanco floreado', 429, 'Adrianna Papell', 'Blanco', 'Pequeño'),
(13, 3, 'multiedia/vestido_p2.jpeg', 'Vestido primavera Adrianna Papell', 'Vestido blanco con mariposas', 479, 'Adrianna Papell', 'Blanco', 'Grande'),
(14, 3, 'multiedia/vestido_p3.jpeg', 'Vestido primavera japonés', 'Vestido blanco floreado estilo japonés', 669, 'Adrianna Papell', 'Blanco', 'Mediano'),
(15, 3, 'multiedia/vestido_p4.jpeg', 'Vestido flores primavera', 'Vestido blanco floreado sin mangas', 329, 'Adrianna Papell', 'Blanco', 'Pequeño'),
(16, 3, 'multiedia/vestido_p5.jpeg', 'Vestido flores negro', 'Vestido primaveral negro floreado', 379, 'Adrianna Papell', 'Negro', 'Grande'),
(17, 3, 'multiedia/vestido_p6.jpeg', 'Vestido primavera negro', 'Vestido primavera negro con escote', 549, 'Adrianna Papell', 'Negro', 'Mediano'),
(18, 3, 'multiedia/vestido_v.jpeg', 'Vestido verano abstracto', 'Vestido verano azul con amarillo', 539, 'Altonadock', 'Azul y Amarillo', 'Grande'),
(19, 3, 'multiedia/vestido_v2.jpeg', 'Vestido verano hippie', 'Vestido hippie verano azul marino', 329, 'Altonadock', 'Azul Marino', 'Mediano'),
(20, 3, 'multiedia/vestido_v3.jpeg', 'Vestido verano abstracto escote', 'Vestido verano azul cielo con escote', 419, 'Altonadock', 'Azul Cielo', 'Grande'),
(21, 3, 'multiedia/vestido_v4.jpeg', 'Vestido corto verano con escote', 'Vestido café con escote floreado', 749, 'Altonadock', 'Café', 'Mediano'),
(22, 3, 'multiedia/vestido_v5.jpeg', 'Vestido verano abstracto', 'Vestido verano azul con amarillo', 539, 'Altonadock', 'Azul y Amarillo', 'Mediano'),
(23, 3, 'multiedia/vestido_v6.jpeg', 'Vestido largo verano', 'Vestido liso verano blanco y café', 339, 'Altonadock', 'Blanco y Café', 'Grande'),
(24, 3, 'multiedia/vestido_g.jpeg', 'Vestido liso rojo', 'Vestido liso largo rojo de gala', 849, 'Brave Soul', 'Rojo', 'Grande'),
(25, 3, 'multiedia/vestido_g2.jpeg', 'Vestido rojo oscuro', 'Vestido liso largo rojo oscuro de gala escotado', 989, 'Fórmula Joven', 'Rojo Oscuro', 'Mediano'),
(26, 3, 'multiedia/vestido_g3.jpeg', 'Vestido rojo bordado', 'Vestido bordado largo rojo de gala', 939, 'Almatrichi', 'Rojo', 'Grande'),
(27, 3, 'multiedia/vestido_g4.jpeg', 'Vestido azul bordado', 'Vestido bordado largo azul de gala', 939, 'Almatrichi', 'Azul', 'Mediano'),
(28, 3, 'multiedia/vestido_g5.jpeg', 'Vestido verde bordado', 'Vestido bordado largo verde de gala', 919, 'Almatrichi', 'Verde', 'Pequeño'),
(29, 3, 'multiedia/vestido_g6.jpeg', 'Vestido liso negro', 'Vestido liso corto negro de gala', 999, 'Elogy', 'Negro', 'Mediano'),
(30, 4, 'multiedia/falda1.jpeg', 'Falda azul lisa', 'Falda larga lisa azul elegante', 219, 'Esprit', 'Azul', 'Grande'),
(31, 4, 'multiedia/falda2.jpeg', 'Falda azul corta', 'Falda corta lisa azul cielo deportiva', 329, 'Wilson', 'Azul Cielo', 'Pequeño'),
(32, 4, 'multiedia/falda3.jpeg', 'Falda azul marino lisa', 'Falda lisa azul marina elegante', 249, 'Amichi', 'Azul Marino', 'Mediano'),
(33, 4, 'multiedia/falda4.jpeg', 'Falda amarilla lisa', 'Falda corta lisa amarilla deportiva', 239, 'Esprit', 'Brownie', 'Pequeño'),
(34, 4, 'multiedia/falda5.jpeg', 'Falda verde lisa', 'Falda larga lisa verde gruesa', 319, 'Brownie', 'Verde', 'Grande'),
(35, 4, 'multiedia/falda6.jpeg', 'Falda azul mezclilla', 'Falda corta mezclilla azul', 299, 'Amichi', 'Azul', 'Mediano'),
(36, 5, 'multiedia/sudadera.jpeg', 'Sudadera corta gris', 'Sudadera gris mangas negras con capucha', 420, 'Noisy May', 'Gris', 'Pequeño'),
(37, 5, 'multiedia/sudadera2.jpeg', 'Sudadera blanca musica', 'Sudadera blanca estampado musica', 349, 'Only', 'Blanco', 'Pequeño'),
(38, 5, 'multiedia/sudadera3.jpeg', 'Sudadera corta amarilla', 'Sudadera amarilla con capucha estampado mangas', 329, 'Brownie', 'Amarillo', 'Mediano'),
(39, 5, 'multiedia/sudadera4.jpeg', 'Sudadera rosa estampado', 'Sudadera rosa estampado negro chasquido', 450, 'Noisy May', 'Rosa', 'Grande'),
(40, 5, 'multiedia/sudadera5.jpeg', 'Sudadera rosa lisa', 'Sudadera rosa con capucha estampado gato', 370, 'Noisy May', 'Rosa', 'Pequeño'),
(41, 5, 'multiedia/sudadera6.jpeg', 'Sudadera verde', 'Sudadera verde con capucha estampado Harry Potter', 449, 'Noisy May', 'Verde', 'Mediano'),
(42, 6, 'multiedia/pantalones_formales2.jpeg', 'Pantalon formal gris', 'Pantalon formal liso elegante gris', 219, 'Kookai', 'Gris', 'Pequeño'),
(43, 6, 'multiedia/pantalones_formales3.jpeg', 'Pantalon formal palatzzo', 'Pantalon formal tipo palatzoo elegante', 249, 'Only', 'Rojo y Negro', 'Grande'),
(44, 6, 'multiedia/pantalones_formales4.jpeg', 'Pantalon formal negro', 'Pantalon formal liso elegante negro', 239, 'Morgan', 'Negro', 'Mediano'),
(45, 6, 'multiedia/pantalones_formales5.jpeg', 'Pantalon formal rayado', 'Pantalon formal rayado elegante negro', 269, 'Morgan', 'Negro', 'Pequeño'),
(46, 6, 'multiedia/pantalones_formales6.jpeg', 'Pantalon formal rayado azul', 'Pantalon formal liso elegante rayado azul marino', 259, 'Morgan', 'Azul Marino', 'Mediano'),
(47, 7, 'multiedia/blusa1.jpeg', 'Blusa roja estampado', 'Blusa roja con estampado elegante', 129, 'Pepe Jeans', 'Rojo', 'Mediano'),
(48, 7, 'multiedia/blusa2.jpeg', 'Blusa negra', 'Blusa negra rayada elegante', 149, 'Easy Wear', 'Negro', 'Mediano'),
(49, 7, 'multiedia/blusa3.jpeg', 'Blusa roja escote', 'Blusa roja con escote elegante sin mangas', 139, 'Fórmula Joven', 'Rojo', 'Mediano'),
(50, 7, 'multiedia/blusa4.jpeg', 'Blusa mezclilla estampado', 'Blusa mezclilla con estampado elegante manda larga', 169, 'Pepe Jeans', 'Azul', 'Mediano'),
(51, 7, 'multiedia/blusa5.jpeg', 'Blusa blanca', 'Blusa lisa blanca elegante manga corta', 119, 'Kookai', 'Blanco', 'Mediano'),
(52, 7, 'multiedia/blusa6.jpeg', 'Blusa negra polo', 'Blusa negra lisa sin manga', 129, 'Pepe Jeans', 'Negro', 'Mediano');

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
(1, 'multimedia/slider.jpeg', 'Estilo formal', 'Trajes, sacos y pantalones'),
(2, 'multimedia/slider2.jpeg', 'Ropa fresca', 'Playeras, blusas y faldas'),
(3, 'multimedia/slider3.jpeg', 'Vestidos', 'Para primavera, verano y cualquier ocasión');
  
