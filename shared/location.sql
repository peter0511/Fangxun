CREATE TABLE `location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `upid` int(10) unsigned NOT NULL COMMENT '父级id',
  `path` varchar(64) NOT NULL COMMENT 'id路径',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `status` tinyint(11) unsigned NOT NULL DEFAULT '0',
  `created` int(11) unsigned NOT NULL,
  `updated` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
