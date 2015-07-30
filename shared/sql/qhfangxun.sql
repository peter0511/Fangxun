# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.1.63)
# Database: qhfangxun
# Generation Time: 2015-07-30 15:24:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `last_activity_idx` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dump of table houses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `houses`;

CREATE TABLE `houses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '员工编号',
  `location` varchar(255) NOT NULL DEFAULT '' COMMENT '城区.街道.小区',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '房源地址',
  `h_expect` int(11) NOT NULL COMMENT '房东最高报价',
  `d_expect` int(11) NOT NULL COMMENT '房东最低报价',
  `agency` varchar(255) NOT NULL DEFAULT '' COMMENT '押金+中介费',
  `decoration` tinyint(11) NOT NULL COMMENT '房屋的装修情况',
  `appliance` tinyint(11) NOT NULL COMMENT '房屋的家具家电',
  `birth` int(11) NOT NULL COMMENT '房屋年代',
  `area` int(11) NOT NULL COMMENT '房屋面积',
  `j_area` int(11) NOT NULL COMMENT '房屋建筑面积',
  `house_type` varchar(255) NOT NULL DEFAULT '' COMMENT '房屋户型',
  `property_structure` varchar(255) NOT NULL DEFAULT '' COMMENT '房屋产权及建筑类型',
  `orientation` varchar(255) NOT NULL DEFAULT '' COMMENT '房屋朝向',
  `storey` varchar(255) NOT NULL DEFAULT '' COMMENT '楼层',
  `loan` tinyint(11) NOT NULL DEFAULT '0' COMMENT '贷款与否',
  `condition` varchar(255) DEFAULT '无' COMMENT '房屋的其他备注条件',
  `contract` varchar(255) DEFAULT '' COMMENT '房屋合同编号',
  `status` tinyint(11) NOT NULL,
  `created` int(11) unsigned NOT NULL,
  `updated` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# Dump of table landlord
# ------------------------------------------------------------

DROP TABLE IF EXISTS `landlord`;

CREATE TABLE `landlord` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '房东编号',
  `landlord_name` varchar(255) NOT NULL DEFAULT '0' COMMENT '房东编号',
  `identity` varchar(255) DEFAULT '0' COMMENT '房东身份证号',
  `mobile` varchar(255) NOT NULL DEFAULT '0' COMMENT '房东电话',
  `site` varchar(255) DEFAULT '' COMMENT '房东家地址',
  `house_id` varchar(255) NOT NULL DEFAULT '' COMMENT '房源id',
  `type` tinyint(11) NOT NULL COMMENT '房屋是租是售',
  `status` tinyint(11) unsigned NOT NULL DEFAULT '0' COMMENT '房东状态',
  `created` int(11) unsigned NOT NULL,
  `updated` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid_mobile` (`user_id`,`mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


# Dump of table location
# ------------------------------------------------------------

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `upid` int(10) NOT NULL COMMENT '父级id',
  `path` varchar(64) NOT NULL COMMENT 'id路径',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `user_id` varchar(255) DEFAULT NULL COMMENT '谁填写的',
  `status` tinyint(11) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;

INSERT INTO `location` (`id`, `upid`, `path`, `name`, `user_id`, `status`, `created`, `updated`)
VALUES
	(1,0,'0','城东区',NULL,0,0,0),
	(2,0,'0','城中区',NULL,0,0,0),
	(3,0,'0','城西区',NULL,0,0,0),
	(4,0,'0','城北区',NULL,0,0,0),
	(5,0,'0','海湖新区',NULL,0,0,0),
	(6,0,'0','城南新区',NULL,0,0,0),
	(7,0,'0','国家经济开发区',NULL,0,0,0),
	(8,0,'0','湟中县',NULL,0,0,0),
	(9,0,'0','湟源县',NULL,0,0,0),
	(10,0,'0','大通县',NULL,0,0,0);

/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '0' COMMENT '登陆账号',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `age` tinyint(11) NOT NULL COMMENT '年龄',
  `sex` tinyint(11) NOT NULL COMMENT '性别,0:女,1:男',
  `native` varchar(11) NOT NULL COMMENT '籍贯',
  `avatar` varchar(255) DEFAULT '' COMMENT '头像',
  `education` tinyint(11) NOT NULL DEFAULT '0' COMMENT '学历,0:本科,1:大专,2:中专,3:高中,4:初中,5:小学',
  `identity` varchar(255) NOT NULL DEFAULT '0' COMMENT '身份证号',
  `mobile` varchar(255) NOT NULL DEFAULT '0' COMMENT '电话号码',
  `address` varchar(255) NOT NULL DEFAULT '0' COMMENT '地址',
  `phone` varchar(255) NOT NULL DEFAULT '0' COMMENT '应急电话',
  `position` tinyint(11) NOT NULL DEFAULT '0' COMMENT '员工职务,0:技术,1:老板,2:经理,3:外勤',
  `status` tinyint(11) NOT NULL DEFAULT '0' COMMENT '员工状态,0:在职,1:离职',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `name`, `password`, `age`, `sex`, `native`, `avatar`, `education`, `identity`, `mobile`, `address`, `phone`, `position`, `status`, `created`, `updated`)
VALUES
	(1,'peter0511','曾攀','JWwjRFzFzgoCKkeSnX/YC8x/UfT0eyBBmLa8YTBpPeVWWZq9L0XrfJKYfw+A9uIftv3siSU9yHyOJo8FoQLEze4rxVFcq8o7s6R0+3DhPUhtMyN+HpFeHu4F7o+Vmebf',127,1,'青海省西宁市','',1,'630104198605111518','18519742361','青海省西宁市昆仑路35号','13519742361',0,0,1435903570,1435903570);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
