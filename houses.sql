-- MySQL dump 10.13  Distrib 5.6.23, for osx10.10 (x86_64)
--
-- Host: localhost    Database: qhfangxun
-- ------------------------------------------------------
-- Server version	5.1.63

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
-- Table structure for table `houses`
--

DROP TABLE IF EXISTS `houses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `houses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '员工编号',
  `location` varchar(255) NOT NULL DEFAULT '' COMMENT '城区.街道.小区',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '房源地址',
  `h_expect` int(11) NOT NULL DEFAULT '0' COMMENT '房东最高报价',
  `d_expect` int(11) NOT NULL COMMENT '房东最低报价',
  `agency` varchar(255) NOT NULL DEFAULT '' COMMENT '押金+中介费',
  `decoration` tinyint(11) NOT NULL COMMENT '房屋的装修情况',
  `appliance` tinyint(11) NOT NULL COMMENT '房屋的家具家电',
  `birth` int(11) NOT NULL COMMENT '房屋年代',
  `area` int(11) NOT NULL COMMENT '房屋面积',
  `house_type` varchar(255) NOT NULL DEFAULT '' COMMENT '房屋户型',
  `orientation` varchar(255) NOT NULL DEFAULT '' COMMENT '房屋朝向',
  `storey` varchar(255) NOT NULL DEFAULT '' COMMENT '楼层',
  `condition` varchar(255) DEFAULT '无' COMMENT '房屋的其他备注条件',
  `status` tinyint(11) NOT NULL DEFAULT '0',
  `created` int(11) unsigned NOT NULL,
  `updated` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `houses`
--

LOCK TABLES `houses` WRITE;
/*!40000 ALTER TABLE `houses` DISABLE KEYS */;
INSERT INTO `houses` VALUES (1,1,'9.19.20','9-3-401',1221,0,'0',0,0,0,0,'2_1_1','','','精装,提包入住',0,1436640827,1436640827),(2,2,'9.17.18','2-1-101',232,0,'0',0,0,0,0,'3_2_2','','','简装,有网',0,1436643830,1436643830),(3,1,'9.17.18','10-4-202',0,0,'',0,0,0,0,'1_1_1','','','无',0,0,0),(4,2,'9.17.18','10-2-301',0,0,'800元',1,2,2014,80,'2_1_1','坐北朝南','6/12','有好几辆公交经过.',0,1436766755,1436766755),(5,1,'9.21.22','1-2-102',0,0,'1000元',0,2,1986,120,'3_2_2','坐北朝南','6/11','没有公交',1,1436768396,1436768396),(6,2,'9.19.20','15-3-1205',1200,1000,'500+800',1,0,2014,90,'2_1_1','坐北朝南','12/22','有公交有汽车',0,1436770699,1436770699),(7,2,'9.19.20','1-1-1',1,1,'1+1',0,0,1,1,'1_1_1','1','1','1',0,1436771194,1436771194),(8,2,'9.17.18','1-1-201',40000,10000,'5000+10000',1,2,1999,40,'1_1_1','南','2/12','好了什么都没有了',0,1437303386,1437303386);
/*!40000 ALTER TABLE `houses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-19 19:33:27
