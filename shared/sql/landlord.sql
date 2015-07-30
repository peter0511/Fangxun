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
