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
