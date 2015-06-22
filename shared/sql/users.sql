CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `password` int(11) NOT NULL COMMENT '密码',
  `age` tinyint(11) NOT NULL COMMENT '年龄',
  `sex` tinyint(11) NOT NULL COMMENT '性别,0:女,1:男',
  `native` varchar(11) NOT NULL COMMENT '籍贯',
  `avatar` varchar(255) DEFAULT '' COMMENT '头像',
  `education` tinyint(11) NOT NULL DEFAULT '0' COMMENT '学历,0:本科,1:大专,2:中专,3:高中,4:初中,5:小学',
  `moblie` tinyint(11) NOT NULL DEFAULT '0' COMMENT '电话号码',
  `address` varchar(255) NOT NULL DEFAULT '0' COMMENT '地址',
  `phone` tinyint(11) NOT NULL DEFAULT '0' COMMENT '应急电话',
  `position` tinyint(11) NOT NULL DEFAULT '0' COMMENT '员工职务,0:技术,1:老板,2:经理,3:外勤',
  `status` tinyint(11) NOT NULL DEFAULT '0' COMMENT '员工状态,0:在职,1:离职',
  `created` int(11) unsigned NOT NULL,
  `updated` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
