-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2023 at 06:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SNK&VAN`
--

-- --------------------------------------------------------

--
-- Table structure for table `carritos_de_compras`
--

CREATE TABLE `carritos_de_compras` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `talla` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carritos_de_compras`
--

INSERT INTO `carritos_de_compras` (`id`, `usuario_id`, `producto_id`, `talla`, `cantidad`, `creado_en`, `actualizado_en`) VALUES
(3, 1, 1, 36, 1, '2023-05-13 09:33:47', '2023-05-13 09:33:47'),
(4, 1, 6, 44, 1, '2023-05-14 09:49:17', '2023-05-14 09:49:17');

-- --------------------------------------------------------

--
-- Stand-in structure for view `carritos_de_compras_products_`
-- (See below for the actual view)
--
CREATE TABLE `carritos_de_compras_products_` (
`id` int(11)
,`usuario_id` int(11)
,`producto_id` int(11)
,`talla` int(11)
,`cantidad` int(11)
,`creado_en` timestamp
,`actualizado_en` timestamp
,`product_id` int(11)
,`nombre` varchar(255)
,`descripcion` text
,`precio` decimal(10,2)
,`imagen` varchar(255)
,`categoria` varchar(255)
,`product_creado_en` timestamp
,`product_actualizado_en` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `direcciones_de_envio`
--

CREATE TABLE `direcciones_de_envio` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `direccion_id` int(11) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `codigo` varchar(25) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `valoracion` decimal(5,2) DEFAULT 0.00 COMMENT 'se puede hacer reseñas y valoracion de 0-5',
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `codigo`, `imagen`, `categoria`, `valoracion`, `creado_en`, `actualizado_en`) VALUES
(1, 'Nike Aie Force 1', 'El fulgor sigue vivo en las Nike Air Force 1 \\07, un modelo original de baloncesto que introduce un nuevo giro a sus ya caracteru00edsticos revestimientos con costuras duraderas, sus acabados impecables y la cantidad perfecta de reflectante.', '120.00', 'DSSDDS', 'NOCTA_x_Nike_Air_Force_1_Low_Certified_Lover_Boy.png', 'nike', '0.00', '2023-04-08 12:22:19', '2023-05-14 15:54:09'),
(2, 'Adidas', 'El fulgor sigue vivo con un diseño de baloncesto original. Con un diseño que combina la comodidad para la cancha con un estilo urbano, estas zapatillas dan un nuevo giro a su ya característico estilo, su confección inspirada en los 80, sus detalles llamativos y su estilo impecable.', '130.00', 'ASDA52-DS', 'adidas1.png', NULL, '0.00', '2023-04-08 12:23:03', '2023-05-13 23:09:42'),
(3, 'Adidas 2', 'Hola', '130.00', 'DHF74', 'Nike_Dunk_Low_Retro_White_Black_2021(W).png', 'asdasd', '1.00', '2023-04-23 17:56:05', '2023-05-14 16:01:35'),
(4, 'Nike Air Max 97 \"Black Royal\" 2', '<p><span style=\"color: #212529; font-family: Roboto, sans-serif; font-size: 16px; background-color: #f9f9fa;\">Las Nike Air Max 97 cuentan con el mismo dise&ntilde;o ondulado original, inspirado en los trenes de bala japoneses, para ofrecer un look que impulsa tu estilo a toda velocidad. Con la innovadora unidad Nike Air completa que revolucion&oacute; el mundo del running y nuevos colores y detalles impecables, te permiten disfrutar de la comodidad de primera clase.</span></p>', '200.00', '', 'NikeAirMax97BlackRoyal.png', 'Nike Air Max', '0.00', '2023-05-13 21:37:27', '2023-05-13 22:22:21'),
(6, 'Nike Dunk Low Retro White Black 2021 (W)', '<p class=\"p1\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: Helvetica;\">Las Nike Dunk Low, creadas para la pista pero que dominaron las calles, vuelven con elegantes revestimientos y los colores originales del equipo. Estas zapatillas de baloncesto ic&oacute;nicas canalizan el estilo de los a&ntilde;os 80 con piel premium en la parte superior que presenta un look impecable y se adapta a la perfecci&oacute;n. La tecnolog&iacute;a del calzado moderno ofrece la comodidad del siglo XXI</p>', '190.99', '', 'Nike Dunk_Low_Retro_White_Black_2021(W).png', 'Nike Dunk Low', '0.00', '2023-05-13 22:17:20', '2023-05-13 22:17:20'),
(7, 'Air Jordan 1 High Zoom Comfort 2 \"Bleached Aqua Citrus\"', '<p><span style=\"color: #212529; font-family: Roboto, sans-serif; font-size: 16px; background-color: #f9f9fa;\">La Air Jordan 1 arrasa. Es la zapatilla Air Jordan m&aacute;s vendida en la historia de la marca. Sobre todo los lanzamientos con un gui&ntilde;o a la carrera baloncest&iacute;stica de Michael Jordan est&aacute;n teniendo mucho &eacute;xito.</span></p>', '300.99', 'DV1307-408', 'Air_Jordan_1_High_Zoom_Comfort_2Bleached_Aqua_Citrus.png', 'Air Jordan', '3.50', '2023-05-14 10:56:37', '2023-05-14 12:06:38'),
(8, 'Adidas Y-3 Black Slide', '<p><span style=\"color: #212529; font-family: Roboto, sans-serif; font-size: 16px; background-color: #f9f9fa;\">Desde 1924, el mundo del deporte ya no se concibe sin la marca Adidas. La marca est&aacute; en la cima absoluta del mercado deportivo y hace tiempo que su envergadura llega mucho m&aacute;s all&aacute; que del mundo del deporte. Todas las creaciones de Adidas se emplean en diferentes deportes y se llevan en la calle con un aspecto desenfadado, pero tambi&eacute;n por las grandes estrellas en todo el mundo.</span></p>', '525.88', 'FZ6423', 'adidas Y-3 Black Slide.png', 'Slide Adidas', '3.40', '2023-05-14 10:59:03', '2023-05-14 12:06:33'),
(9, 'Air Jordan 1 Elevate High Soft Pink Black Toe (W)', '<p><span style=\"color: #212529; font-family: Roboto, sans-serif; font-size: 16px; background-color: #f9f9fa;\">La Air Jordan 1 arrasa. Es la zapatilla Air Jordan m&aacute;s vendida en la historia de la marca. Sobre todo los lanzamientos con un gui&ntilde;o a la carrera baloncest&iacute;stica de Michael Jordan est&aacute;n teniendo mucho &eacute;xito.</span></p>', '215.99', 'DN3253-061', 'Air Jordan 1 Elevate High Soft Pink Black Toe (W).png', 'Air Jordan', '4.60', '2023-05-14 11:01:41', '2023-05-14 12:06:27'),
(10, 'Solebox Ultra 4D x adidas Consortium Tribute to 2016', '<p><span style=\"color: #212529; font-family: Roboto, sans-serif; font-size: 16px; background-color: #f9f9fa;\">Desde 1924, el mundo del deporte ya no se concibe sin la marca Adidas. La marca est&aacute; en la cima absoluta del mercado deportivo y hace tiempo que su envergadura llega mucho m&aacute;s all&aacute; que del mundo del deporte. Todas las creaciones de Adidas se emplean en diferentes deportes y se llevan en la calle con un aspecto desenfadado, pero tambi&eacute;n por las grandes estrellas en todo el mundo.</span></p>', '350.33', 'IE4825', 'Solebox Ultra 4D x adidas Consortium Tribute to 2016.png', 'Adidas', '5.00', '2023-05-14 11:20:07', '2023-05-14 12:04:29'),
(15, 'Nike Air Zoom Vomero 5 \"Worn Blue\"', '<p><span style=\"background-color: #f9f9fa; color: #212529; font-family: Roboto, sans-serif; font-size: 16px;\">El estilo legendario de Nike ha sido un hecho desde 1972. &iexcl;Crea un look ic&oacute;nico y experimenta una innovaci&oacute;n revolucionaria en ropa, accesorios y zapatillas! Compre ahora las Air Max 270 react, 720, 90 y 95 hasta las &uacute;ltimas React Element, Air Force 1 y</span> Vapormax&rdquo;.</p>', '300.99', 'FB9149-400', 'Nike_Air_Zoom_Vomero_5_Worn_Blue.png', 'Nike', '4.80', '2023-05-14 11:50:57', '2023-05-14 12:06:50'),
(16, 'Air Jordan 12 Retro Black University Gold', '<p><span style=\"font-family: Roboto, sans-serif; background-color: rgb(249, 249, 250);\">Michael Jordan llevó el primer par de zapatillas Air Jordan durante un partido de la NBA en 1985, cuando acababa de fichar por los Chicago Bulls y los grandes éxitos aún estaban por llegar. Fue Peter Moore quien desarrollo las zapatillas y el resto ya forma parte de la historia. El par en cuestión que se subasta en Sotheby\'s fue confeccionado a medida para “Su Aireza” en las tallas 48 y 49.</span><br></p>', '345.87', '130690-070', 'Air_Jordan_12_Retro_Black_University_Gold.png', 'Air Jordan', '0.00', '2023-05-14 14:42:14', '2023-05-14 14:42:14');

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_pago`
-- (See below for the actual view)
--
CREATE TABLE `total_pago` (
`total` decimal(42,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `rol` int(11) NOT NULL COMMENT 'admin=1\r\nusuario=0',
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol`, `creado_en`, `actualizado_en`, `likes`) VALUES
(1, 'Jemmy', 'jemmyjin30@gmail.com', 'Jinwoaini123', 1, '2023-04-06 13:09:30', '2023-05-13 23:11:31', 17),
(2, 'hola', 'jemmy@gmail.com', '156165', 0, '2023-05-11 21:36:40', '2023-05-11 21:36:40', NULL),
(3, '123', 'jj@gmail.com', '165156', 0, '2023-05-11 21:41:26', '2023-05-11 21:41:26', NULL),
(4, '', '', '', 0, '2023-05-12 21:34:01', '2023-05-12 21:34:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `direccion_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `carritos_de_compras_products_`
--
DROP TABLE IF EXISTS `carritos_de_compras_products_`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `snk&van`.`carritos_de_compras_products_`  AS SELECT `snk&van`.`carritos_de_compras`.`id` AS `id`, `snk&van`.`carritos_de_compras`.`usuario_id` AS `usuario_id`, `snk&van`.`carritos_de_compras`.`producto_id` AS `producto_id`, `snk&van`.`carritos_de_compras`.`talla` AS `talla`, `snk&van`.`carritos_de_compras`.`cantidad` AS `cantidad`, `snk&van`.`carritos_de_compras`.`creado_en` AS `creado_en`, `snk&van`.`carritos_de_compras`.`actualizado_en` AS `actualizado_en`, `snk&van`.`productos`.`id` AS `product_id`, `snk&van`.`productos`.`nombre` AS `nombre`, `snk&van`.`productos`.`descripcion` AS `descripcion`, `snk&van`.`productos`.`precio` AS `precio`, `snk&van`.`productos`.`imagen` AS `imagen`, `snk&van`.`productos`.`categoria` AS `categoria`, `snk&van`.`productos`.`creado_en` AS `product_creado_en`, `snk&van`.`productos`.`actualizado_en` AS `product_actualizado_en` FROM (`snk&van`.`carritos_de_compras` left join `snk&van`.`productos` on(`snk&van`.`carritos_de_compras`.`producto_id` = `snk&van`.`productos`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `total_pago`
--
DROP TABLE IF EXISTS `total_pago`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `snk&van`.`total_pago`  AS SELECT sum(`carritos_de_compras_products_`.`precio` * `carritos_de_compras_products_`.`cantidad`) AS `total` FROM `snk&van`.`carritos_de_compras_products_``carritos_de_compras_products_`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carritos_de_compras`
--
ALTER TABLE `carritos_de_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `idx_producto_talla` (`producto_id`,`talla`);

--
-- Indexes for table `direcciones_de_envio`
--
ALTER TABLE `direcciones_de_envio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `direccion_id` (`direccion_id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carritos_de_compras`
--
ALTER TABLE `carritos_de_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `direcciones_de_envio`
--
ALTER TABLE `direcciones_de_envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carritos_de_compras`
--
ALTER TABLE `carritos_de_compras`
  ADD CONSTRAINT `carritos_de_compras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `carritos_de_compras_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`direccion_id`) REFERENCES `direcciones_de_envio` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
