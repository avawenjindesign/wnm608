/*
SQLyog Ultimate
MySQL - 10.4.13-MariaDB : Database - 20567
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`20567` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `20567`;

/*Table structure for table `products` */

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `other_image` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 10,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `products` */

insert  into `products`(`id`,`image`,`other_image`,`price`,`type`,`quantity`,`name`) values 
(1,'images/4.jpg','images/4.jpg;images/9.jpg;images/10.jpg',1195.00,'CHAIRS',101,'AERON CHAIR'),
(2,'images/1.jpg','images/1.jpg',995.00,'CHAIRS',101,'MIRRA 23'),
(3,'images/2.jpg','images/2.jpg',595.00,'CHAIRS',0,'LINO CHAIR'),
(4,'images/3.jpg','images/3.jpg',1745.00,'CHAIRS',0,'EMBODY CHAIR'),
(5,'images/5.jpg','images/5.jpg',3295.00,'CHAIRS',0,'EAMES SOFT PAD CHAIR'),
(6,'images/8.jpg','images/8.jpg',1095.00,'TABLES',0,'MODA DESK'),
(7,'images/7.jpg','images/7.jpg',373.00,'ACCESSORY',0,'INPUT ORGANIZER'),
(8,'images/6.jpg','images/6.jpg',3295.00,'TABLES',0,'RENEW DESK WITH EMBEDDED POWER'),
(9,'images/11.jpg','images/11.jpg;images/9.jpg;images/10.jpg',100.00,'CHAIRS',100,'AERON CHAIR WHITE');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
