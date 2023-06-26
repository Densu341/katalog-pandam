/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - katalog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`katalog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `katalog`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `banner` varchar(256) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_name`,`banner`) values 
(1,'Bags','Bags.png'),
(6,'Binder','binder.png');

/*Table structure for table `material` */

DROP TABLE IF EXISTS `material`;

CREATE TABLE `material` (
  `mat_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(100) NOT NULL,
  `mat_code` varchar(100) NOT NULL,
  PRIMARY KEY (`mat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `material` */

insert  into `material`(`mat_id`,`material_name`,`mat_code`) values 
(1,'Rekta Pandan','RTPD'),
(2,'Embroider Lurik','EBLRK');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NOT NULL,
  `mat_id` int(11) DEFAULT NULL,
  `product_name` varchar(256) NOT NULL,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `product_code` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `sub_id` (`sub_id`),
  KEY `mat_id` (`mat_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subcategory` (`sub_id`),
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`mat_id`) REFERENCES `material` (`mat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `product` */

insert  into `product`(`product_id`,`sub_id`,`mat_id`,`product_name`,`length`,`width`,`height`,`picture`,`description`,`price`,`product_code`) values 
(1,2,1,'Purana Handbag',21,15,17,'Purana_Handbag.jpeg','Est distinctio voluptatem molestiae deleniti fuga, odio sunt nam nihil minima expedita possimus perspiciatis sed mollitia dolorum ad atque amet magni voluptatum adipisci?',1000000,'54'),
(4,2,2,'Hand Bag Natural',25,15,17,'Hand_Bag_Natural.jpeg','Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit, tempora obcaecati omnis quod accusamus ea et rem nam quibusdam labore?',400000,''),
(5,2,2,'Hand Bag Natural (Tas Jinjing)',25,15,18,'Hampers_Bags.png','lorem ipsum',150000,''),
(9,1,1,'Testing2',50,32,10,'default.jpg','fgh',342,'001'),
(11,1,2,'Testing32',50,32,10,'default.jpg','dfe',50000,'002');

/*Table structure for table `subcategory` */

DROP TABLE IF EXISTS `subcategory`;

CREATE TABLE `subcategory` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `image` varchar(256) NOT NULL,
  `sub_code` varchar(100) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `subcategory` */

insert  into `subcategory`(`sub_id`,`category_id`,`subcategory_name`,`image`,`sub_code`) values 
(1,1,'Tote Bags','Totebags.png','TB'),
(2,1,'Hand Bag','Hand_Bags1.png','HB'),
(4,6,'Ecofriendly Binder','Binder_Mix1.png','EB'),
(5,1,'Hampers Bag','Hampers_Bags.png','HPB');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `user` */

insert  into `user`(`no`,`email`,`username`,`password`,`role`,`image`) values 
(1,'pandamadiwastrajanaloka@gmail.com','admin','21232f297a57a5a743894a0e4a801fc3','administrator','default.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
