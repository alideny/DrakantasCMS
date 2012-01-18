/*Table structure for table `drak_index_slideshow` */

DROP TABLE IF EXISTS `drak_index_slideshow`;

CREATE TABLE `drak_index_slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `desc` tinytext CHARACTER SET utf8,
  PRIMARY KEY (`id`,`title`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `drak_news` */

DROP TABLE IF EXISTS `drak_news`;

CREATE TABLE `drak_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `drak_users` */
DROP TABLE IF EXISTS `drak_users`;

CREATE TABLE `drak_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identifier',
  `username` varchar(32) NOT NULL DEFAULT '',
  `email` text NOT NULL,
  `points` tinyint(10) NOT NULL DEFAULT '0',
  `coins` tinyint(10) NOT NULL DEFAULT '0',
  `level` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_gmlevel` (`level`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Account System';

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `drak_news_comments`
-- ----------------------------
DROP TABLE IF EXISTS `drak_news_comments`;
CREATE TABLE `drak_news_comments` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `id_news` int(20) NOT NULL,
  `user` varchar(50) NOT NULL,
  `date` varchar(60) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
