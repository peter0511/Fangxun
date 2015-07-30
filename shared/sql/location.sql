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
