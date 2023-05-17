CREATE DATABASE  IF NOT EXISTS `snk&van` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `snk&van`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: snk&van
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carritos_de_compras`
--

DROP TABLE IF EXISTS `carritos_de_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carritos_de_compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `talla` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `idx_producto_talla` (`producto_id`,`talla`),
  CONSTRAINT `carritos_de_compras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `carritos_de_compras_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `fk_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carritos_de_compras`
--

LOCK TABLES `carritos_de_compras` WRITE;
/*!40000 ALTER TABLE `carritos_de_compras` DISABLE KEYS */;
INSERT INTO `carritos_de_compras` VALUES (3,1,1,36,1,'2023-05-13 09:33:47','2023-05-13 09:33:47'),(4,1,6,44,1,'2023-05-14 09:49:17','2023-05-14 09:49:17');
/*!40000 ALTER TABLE `carritos_de_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `carritos_de_compras_products_`
--

DROP TABLE IF EXISTS `carritos_de_compras_products_`;
/*!50001 DROP VIEW IF EXISTS `carritos_de_compras_products_`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `carritos_de_compras_products_` AS SELECT 
 1 AS `id`,
 1 AS `usuario_id`,
 1 AS `producto_id`,
 1 AS `talla`,
 1 AS `cantidad`,
 1 AS `creado_en`,
 1 AS `actualizado_en`,
 1 AS `product_id`,
 1 AS `nombre`,
 1 AS `descripcion`,
 1 AS `precio`,
 1 AS `imagen`,
 1 AS `categoria`,
 1 AS `product_creado_en`,
 1 AS `product_actualizado_en`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `direcciones_de_envio`
--

DROP TABLE IF EXISTS `direcciones_de_envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direcciones_de_envio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones_de_envio`
--

LOCK TABLES `direcciones_de_envio` WRITE;
/*!40000 ALTER TABLE `direcciones_de_envio` DISABLE KEYS */;
/*!40000 ALTER TABLE `direcciones_de_envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `direccion_id` int(11) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `direccion_id` (`direccion_id`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`direccion_id`) REFERENCES `direcciones_de_envio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `precio` decimal(10,2) DEFAULT NULL,
  `codigo` varchar(25) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `valoracion` decimal(5,2) DEFAULT '0.00' COMMENT 'se puede hacer reseñas y valoracion de 0-5',
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Nike Aie Force 1','El fulgor sigue vivo en las Nike Air Force 1 \\07, un modelo original de baloncesto que introduce un nuevo giro a sus ya caracteru00edsticos revestimientos con costuras duraderas, sus acabados impecables y la cantidad perfecta de reflectante.',120.00,'DSSDDS','NOCTA_x_Nike_Air_Force_1_Low_Certified_Lover_Boy.png','nike',0.00,'2023-04-08 12:22:19','2023-05-14 15:54:09'),(2,'Adidas','El fulgor sigue vivo con un diseño de baloncesto original. Con un diseño que combina la comodidad para la cancha con un estilo urbano, estas zapatillas dan un nuevo giro a su ya característico estilo, su confección inspirada en los 80, sus detalles llamativos y su estilo impecable.',130.00,'ASDA52-DS','adidas1.png',NULL,0.00,'2023-04-08 12:23:03','2023-05-13 23:09:42'),(3,'Adidas 2','Hola',130.00,'DHF74','Nike_Dunk_Low_Retro_White_Black_2021(W).png','asdasd',1.00,'2023-04-23 17:56:05','2023-05-14 16:01:35'),(4,'Nike Air Max 97 \"Black Royal\" 2','<p><span style=\"color: #212529; font-family: Roboto, sans-serif; font-size: 16px; background-color: #f9f9fa;\">Las Nike Air Max 97 cuentan con el mismo dise&ntilde;o ondulado original, inspirado en los trenes de bala japoneses, para ofrecer un look que impulsa tu estilo a toda velocidad. Con la innovadora unidad Nike Air completa que revolucion&oacute; el mundo del running y nuevos colores y detalles impecables, te permiten disfrutar de la comodidad de primera clase.</span></p>',200.00,'','NikeAirMax97BlackRoyal.png','Nike Air Max',0.00,'2023-05-13 21:37:27','2023-05-13 22:22:21'),(6,'Nike Dunk Low Retro White Black 2021 (W)','<p class=\"p1\" style=\"margin: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: Helvetica;\">Las Nike Dunk Low, creadas para la pista pero que dominaron las calles, vuelven con elegantes revestimientos y los colores originales del equipo. Estas zapatillas de baloncesto ic&oacute;nicas canalizan el estilo de los a&ntilde;os 80 con piel premium en la parte superior que presenta un look impecable y se adapta a la perfecci&oacute;n. La tecnolog&iacute;a del calzado moderno ofrece la comodidad del siglo XXI</p>',190.99,'','Nike Dunk_Low_Retro_White_Black_2021(W).png','Nike Dunk Low',0.00,'2023-05-13 22:17:20','2023-05-13 22:17:20'),(7,'Air Jordan 1 High Zoom Comfort 2 \"Bleached Aqua Citrus\"','<p><span style=\"color: #212529; font-family: Roboto, sans-serif; font-size: 16px; background-color: #f9f9fa;\">La Air Jordan 1 arrasa. Es la zapatilla Air Jordan m&aacute;s vendida en la historia de la marca. Sobre todo los lanzamientos con un gui&ntilde;o a la carrera baloncest&iacute;stica de Michael Jordan est&aacute;n teniendo mucho &eacute;xito.</span></p>',300.99,'DV1307-408','Air_Jordan_1_High_Zoom_Comfort_2Bleached_Aqua_Citrus.png','Air Jordan',3.50,'2023-05-14 10:56:37','2023-05-14 12:06:38'),(8,'Adidas Y-3 Black Slide','<p><span style=\"color: #212529; font-family: Roboto, sans-serif; font-size: 16px; background-color: #f9f9fa;\">Desde 1924, el mundo del deporte ya no se concibe sin la marca Adidas. La marca est&aacute; en la cima absoluta del mercado deportivo y hace tiempo que su envergadura llega mucho m&aacute;s all&aacute; que del mundo del deporte. Todas las creaciones de Adidas se emplean en diferentes deportes y se llevan en la calle con un aspecto desenfadado, pero tambi&eacute;n por las grandes estrellas en todo el mundo.</span></p>',525.88,'FZ6423','adidas Y-3 Black Slide.png','Slide Adidas',3.40,'2023-05-14 10:59:03','2023-05-14 12:06:33'),(9,'Air Jordan 1 Elevate High Soft Pink Black Toe (W)','<p><span style=\"color: #212529; font-family: Roboto, sans-serif; font-size: 16px; background-color: #f9f9fa;\">La Air Jordan 1 arrasa. Es la zapatilla Air Jordan m&aacute;s vendida en la historia de la marca. Sobre todo los lanzamientos con un gui&ntilde;o a la carrera baloncest&iacute;stica de Michael Jordan est&aacute;n teniendo mucho &eacute;xito.</span></p>',215.99,'DN3253-061','Air Jordan 1 Elevate High Soft Pink Black Toe (W).png','Air Jordan',4.60,'2023-05-14 11:01:41','2023-05-14 12:06:27'),(10,'Solebox Ultra 4D x adidas Consortium Tribute to 2016','<p><span style=\"color: #212529; font-family: Roboto, sans-serif; font-size: 16px; background-color: #f9f9fa;\">Desde 1924, el mundo del deporte ya no se concibe sin la marca Adidas. La marca est&aacute; en la cima absoluta del mercado deportivo y hace tiempo que su envergadura llega mucho m&aacute;s all&aacute; que del mundo del deporte. Todas las creaciones de Adidas se emplean en diferentes deportes y se llevan en la calle con un aspecto desenfadado, pero tambi&eacute;n por las grandes estrellas en todo el mundo.</span></p>',350.33,'IE4825','Solebox Ultra 4D x adidas Consortium Tribute to 2016.png','Adidas',5.00,'2023-05-14 11:20:07','2023-05-14 12:04:29'),(15,'Nike Air Zoom Vomero 5 \"Worn Blue\"','<p><span style=\"background-color: #f9f9fa; color: #212529; font-family: Roboto, sans-serif; font-size: 16px;\">El estilo legendario de Nike ha sido un hecho desde 1972. &iexcl;Crea un look ic&oacute;nico y experimenta una innovaci&oacute;n revolucionaria en ropa, accesorios y zapatillas! Compre ahora las Air Max 270 react, 720, 90 y 95 hasta las &uacute;ltimas React Element, Air Force 1 y</span> Vapormax&rdquo;.</p>',300.99,'FB9149-400','Nike_Air_Zoom_Vomero_5_Worn_Blue.png','Nike',4.80,'2023-05-14 11:50:57','2023-05-14 12:06:50'),(16,'Air Jordan 12 Retro Black University Gold','<p><span style=\"font-family: Roboto, sans-serif; background-color: rgb(249, 249, 250);\">Michael Jordan llevó el primer par de zapatillas Air Jordan durante un partido de la NBA en 1985, cuando acababa de fichar por los Chicago Bulls y los grandes éxitos aún estaban por llegar. Fue Peter Moore quien desarrollo las zapatillas y el resto ya forma parte de la historia. El par en cuestión que se subasta en Sotheby\'s fue confeccionado a medida para “Su Aireza” en las tallas 48 y 49.</span><br></p>',345.87,'130690-070','Air_Jordan_12_Retro_Black_University_Gold.png','Air Jordan',0.00,'2023-05-14 14:42:14','2023-05-14 14:42:14');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `total_pago`
--

DROP TABLE IF EXISTS `total_pago`;
/*!50001 DROP VIEW IF EXISTS `total_pago`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `total_pago` AS SELECT 
 1 AS `total`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `rol` int(11) NOT NULL COMMENT 'admin=1\r\nusuario=0',
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `likes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Jemmy','jemmyjin30@gmail.com','Jinwoaini123',1,'2023-04-06 13:09:30','2023-05-13 23:11:31',17),(2,'hola','jemmy@gmail.com','156165',0,'2023-05-11 21:36:40','2023-05-11 21:36:40',NULL),(3,'123','jj@gmail.com','165156',0,'2023-05-11 21:41:26','2023-05-11 21:41:26',NULL),(4,'','','',0,'2023-05-12 21:34:01','2023-05-12 21:34:01',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `direccion_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'snk&van'
--

--
-- Dumping routines for database 'snk&van'
--

--
-- Final view structure for view `carritos_de_compras_products_`
--

/*!50001 DROP VIEW IF EXISTS `carritos_de_compras_products_`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `carritos_de_compras_products_` AS select `carritos_de_compras`.`id` AS `id`,`carritos_de_compras`.`usuario_id` AS `usuario_id`,`carritos_de_compras`.`producto_id` AS `producto_id`,`carritos_de_compras`.`talla` AS `talla`,`carritos_de_compras`.`cantidad` AS `cantidad`,`carritos_de_compras`.`creado_en` AS `creado_en`,`carritos_de_compras`.`actualizado_en` AS `actualizado_en`,`productos`.`id` AS `product_id`,`productos`.`nombre` AS `nombre`,`productos`.`descripcion` AS `descripcion`,`productos`.`precio` AS `precio`,`productos`.`imagen` AS `imagen`,`productos`.`categoria` AS `categoria`,`productos`.`creado_en` AS `product_creado_en`,`productos`.`actualizado_en` AS `product_actualizado_en` from (`carritos_de_compras` left join `productos` on((`carritos_de_compras`.`producto_id` = `productos`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `total_pago`
--

/*!50001 DROP VIEW IF EXISTS `total_pago`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `total_pago` AS select sum((`carritos_de_compras_products_`.`precio` * `carritos_de_compras_products_`.`cantidad`)) AS `total` from `carritos_de_compras_products_` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-17 16:15:31
