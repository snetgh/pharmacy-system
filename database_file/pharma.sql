-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: pharma
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `order_table`
--

DROP TABLE IF EXISTS `order_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_table` (
  `order_table_id` int(100) NOT NULL AUTO_INCREMENT,
  `order_supplier_name` int(50) NOT NULL,
  `order_product_name` int(50) NOT NULL,
  `order_unit_cost` float NOT NULL,
  `order_quantity_buying` int(50) NOT NULL,
  `order_item_description` mediumtext NOT NULL,
  `order_total_cost` float NOT NULL,
  `order_amount_payed` float DEFAULT '0',
  `order_amount_due` float NOT NULL,
  `order_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_table_id`),
  KEY `order_supplier_name` (`order_supplier_name`),
  KEY `order_product_name` (`order_product_name`),
  CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`order_supplier_name`) REFERENCES `tblsuppliers` (`supplierid`),
  CONSTRAINT `order_table_ibfk_2` FOREIGN KEY (`order_product_name`) REFERENCES `stock_product_table` (`stock_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_table`
--

LOCK TABLES `order_table` WRITE;
/*!40000 ALTER TABLE `order_table` DISABLE KEYS */;
INSERT INTO `order_table` VALUES (1,1,1,5,10,'Benzel',50,50,0,'2018-12-31 20:16:58');
/*!40000 ALTER TABLE `order_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `product_category_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_category_name` varchar(50) NOT NULL,
  `product_category_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,'Capsule','2018-12-31 19:48:02'),(2,'Dewormer','2018-12-31 19:48:09'),(3,'Condoms','2018-12-31 19:48:20');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_table`
--

DROP TABLE IF EXISTS `sales_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_table` (
  `sales_id` int(100) NOT NULL AUTO_INCREMENT,
  `button_id` int(10) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `item_description` mediumtext NOT NULL,
  `item_quantity` int(100) NOT NULL,
  `item_price` int(25) NOT NULL,
  `total_amount` int(100) NOT NULL,
  `item_id` int(25) NOT NULL,
  `discount_given` int(10) DEFAULT NULL,
  `amount_payed` int(100) NOT NULL,
  `sales_person` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sales_id`),
  KEY `sales_table_ibfk_1` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_table`
--

LOCK TABLES `sales_table` WRITE;
/*!40000 ALTER TABLE `sales_table` DISABLE KEYS */;
INSERT INTO `sales_table` VALUES (1,1,'ZeXzJ1','Stephen Kewabena','Benzel 400Â -Â Capsule',3,2,6,1,0,6,'John Doe','2019-01-10 22:55:17'),(2,1,'lAPy3G','Stephen Kwabena','Benzel 400Â -Â Capsule',1,2,2,1,0,20,'John Doe','2019-01-12 00:45:30'),(3,1,'CsyMOE','Stephen Kwabena','Benzel 400Â -Â Capsule',1,2,2,1,0,2,'John Doe','2019-01-12 00:52:29');
/*!40000 ALTER TABLE `sales_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_product_table`
--

DROP TABLE IF EXISTS `stock_product_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_product_table` (
  `stock_product_id` int(100) NOT NULL AUTO_INCREMENT,
  `stock_product_name` varchar(50) NOT NULL,
  `stock_product_category` int(20) NOT NULL,
  `stock_product_unit_price` double NOT NULL DEFAULT '0',
  `stock_product_items_avail` int(50) NOT NULL DEFAULT '0',
  `stock_product_expiry_date` varchar(50) NOT NULL,
  `stock_product_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stock_product_id`),
  KEY `stock_product_category` (`stock_product_category`),
  CONSTRAINT `stock_product_table_ibfk_1` FOREIGN KEY (`stock_product_category`) REFERENCES `product_category` (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_product_table`
--

LOCK TABLES `stock_product_table` WRITE;
/*!40000 ALTER TABLE `stock_product_table` DISABLE KEYS */;
INSERT INTO `stock_product_table` VALUES (1,'Benzel 400',2,2,27,'2019-12-30','2018-12-31 19:49:58'),(2,'Kiss',1,2.5,240,'2019-02-01','2018-12-31 19:50:58'),(3,'Rough Rider',3,6,50,'2019-11-25','2018-12-31 19:51:42'),(4,'Tramdol',1,50,100,'2019-03-02','2018-12-31 19:52:05');
/*!40000 ALTER TABLE `stock_product_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers_table`
--

DROP TABLE IF EXISTS `suppliers_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers_table` (
  `supplier_id` int(100) NOT NULL AUTO_INCREMENT,
  `supplier_name` int(50) NOT NULL,
  `supplier_product` int(50) NOT NULL,
  `supplier_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`supplier_id`),
  KEY `supplier_product` (`supplier_product`),
  KEY `suppliers_table_ibfk_1` (`supplier_name`),
  CONSTRAINT `suppliers_table_ibfk_1` FOREIGN KEY (`supplier_name`) REFERENCES `tblsuppliers` (`supplierid`),
  CONSTRAINT `suppliers_table_ibfk_2` FOREIGN KEY (`supplier_product`) REFERENCES `stock_product_table` (`stock_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers_table`
--

LOCK TABLES `suppliers_table` WRITE;
/*!40000 ALTER TABLE `suppliers_table` DISABLE KEYS */;
INSERT INTO `suppliers_table` VALUES (1,1,1,'2018-12-31 19:54:08'),(4,1,2,'2018-12-31 19:55:03');
/*!40000 ALTER TABLE `suppliers_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsuppliers`
--

DROP TABLE IF EXISTS `tblsuppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsuppliers` (
  `supplierid` int(11) NOT NULL AUTO_INCREMENT,
  `orgname` varchar(250) NOT NULL,
  `contact_person` varchar(150) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `website` varchar(350) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`supplierid`),
  UNIQUE KEY `uniquename` (`orgname`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsuppliers`
--

LOCK TABLES `tblsuppliers` WRITE;
/*!40000 ALTER TABLE `tblsuppliers` DISABLE KEYS */;
INSERT INTO `tblsuppliers` VALUES (1,'Ernest Chemist','Manager','0247732082','man@gmail.com','Kasoa - Oblogo Manchester\nPost Office Box 992;','www.johndoe.com','2018-12-31 19:54:08');
/*!40000 ALTER TABLE `tblsuppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_table`
--

DROP TABLE IF EXISTS `users_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_table` (
  `users_table_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) NOT NULL,
  `user_pass` mediumtext NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`users_table_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_table`
--

LOCK TABLES `users_table` WRITE;
/*!40000 ALTER TABLE `users_table` DISABLE KEYS */;
INSERT INTO `users_table` VALUES (1,'john','$2y$10$2udu41KbHYbRlGWUdKcNc.qLB0dr0M7txhGAaNk7CVoE1AASQLy52','John Doe','2018-12-27 08:24:14'),(2,'peter','$2y$10$S3NZJCfhUtU9besThElBP.dtc.x/7baYC3WE8CYLvvvidWo1tZ/7y','Peter','2019-01-02 17:16:50');
/*!40000 ALTER TABLE `users_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'pharma'
--

--
-- Dumping routines for database 'pharma'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-29 18:36:09
