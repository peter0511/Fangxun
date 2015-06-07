CREATE TABLE `houses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '员工编号',
  `landlord_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '房东编号',
  `area_id` tinyint(11) unsigned NOT NULL COMMENT '区的编号',
  `street_id` tinyint(11) unsigned NOT NULL COMMENT '街的编号',
  `community_id` tinyint(11) unsigned NOT NULL COMMENT '小区的编号',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '房源地址',
  `expect` int(11) NOT NULL DEFAULT '0' COMMENT '房东期望价格',
  `condition` varchar(255) DEFAULT '无' COMMENT '房屋条件是否有家具精装简装',
  `status` tinyint(11) unsigned NOT NULL DEFAULT '0',
  `created` int(11) unsigned NOT NULL,
  `updated` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
