<?php
$arr = array(

'DROP TABLE IF EXISTS `goods`;',

'CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT \'商品名称\',
  `typeid` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `store` int(11) NOT NULL,
  `xiaoliang` int(11) NOT NULL DEFAULT \'0\',
  `company` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT \'0\',
  `descr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;',




'DROP TABLE IF EXISTS `type`;',

'CREATE TABLE `type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `display` tinyint(4) NOT NULL DEFAULT \'0\',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;',






'DROP TABLE IF EXISTS `user`;',

'CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT \'用户名\',
  `password` char(32) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT \'0\',
  `status` tinyint(4) NOT NULL DEFAULT \'0\',
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;'

);
