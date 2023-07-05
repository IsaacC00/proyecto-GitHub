/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.28-MariaDB : Database - bddsuper
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bddsuper` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;

USE `bddsuper`;

/*Table structure for table `tab_categoria` */

DROP TABLE IF EXISTS `tab_categoria`;

CREATE TABLE `tab_categoria` (
  `cat_id` int(11) NOT NULL,
  `cat_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

/*Data for the table `tab_categoria` */

insert  into `tab_categoria`(`cat_id`,`cat_desc`) values (0,'deportivo'),(2,'productos_Limpieza'),(3,'Licores'),(4,'confites'),(5,'enlatados');

/*Table structure for table `tab_marcas` */

DROP TABLE IF EXISTS `tab_marcas`;

CREATE TABLE `tab_marcas` (
  `mar_id` int(11) NOT NULL,
  `mar_nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`mar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

/*Data for the table `tab_marcas` */

insert  into `tab_marcas`(`mar_id`,`mar_nombre`) values (1,'Nestle'),(2,'Favorita'),(3,'Pronaca'),(4,'Colombina'),(5,'Vanish');

/*Table structure for table `tab_productos` */

DROP TABLE IF EXISTS `tab_productos`;

CREATE TABLE `tab_productos` (
  `id_prod` int(11) NOT NULL,
  `prod_desc` varchar(50) DEFAULT NULL,
  `prod_precio_c` float DEFAULT NULL,
  `prod_precio_v` double DEFAULT NULL,
  `prod_stock` decimal(10,2) DEFAULT NULL,
  `prod_fecha_elab` date DEFAULT NULL,
  `prod_nivel_azucar` char(1) DEFAULT NULL,
  `prod_aplica_iva` tinyint(1) DEFAULT NULL,
  `prod_especificacion` text DEFAULT NULL,
  `prod_imagen` varchar(50) DEFAULT NULL,
  `mar_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prod`),
  KEY `mar_id` (`mar_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `tab_productos_ibfk_1` FOREIGN KEY (`mar_id`) REFERENCES `tab_marcas` (`mar_id`),
  CONSTRAINT `tab_productos_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `tab_categoria` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

/*Data for the table `tab_productos` */

insert  into `tab_productos`(`id_prod`,`prod_desc`,`prod_precio_c`,`prod_precio_v`,`prod_stock`,`prod_fecha_elab`,`prod_nivel_azucar`,`prod_aplica_iva`,`prod_especificacion`,`prod_imagen`,`mar_id`,`cat_id`) values (1,'cafe Nescafe',7.25,8.25,10.00,'2023-06-12','M',1,'Cafe 200 gramos ... 100% ecuatoriano de vainilla','nescafe.jpg',1,5),(2,'aceite LaFavorita',5.5,7.5,50.00,'2023-06-12','N',1,'Aceite la Favorita de 300ml','lafavorita.jpg',2,5),(3,'Vanish OxlAction',3.25,5.25,60.00,'2023-06-13','N',1,' Viene en un kit de tres recipientes con triple acción: elimina el mal olor, limpia las partes internas y protege la lavadora.','vanish.jpg',5,2),(4,'Trident',0.25,0.75,90.00,'2023-06-12','A',1,'es la marca de chicles nº1 del mundo. ¡Nº1! Trident comenzó a brillar ya desde sus propios inicios, en los cuales logró transformar la industria de su sector. ','trident.jpg',4,4),(5,'Jägermeister',8.25,10.25,50.00,'2023-06-12','M',1,'Jägermeister es un licor de hierbas endulzado, pero con un toque amargo, el cual tiene 34,5% de contenido alcohólico. Es muy popular en Baja Sajonia en la ciudad de Wolfenbüttel (Alemania). ','jaegermeister.jpg',1,3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
