/*Table structure for table `drak_index_slideshow` */

CREATE TABLE `drak_index_slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `desc` tinytext CHARACTER SET utf8,
  PRIMARY KEY (`id`,`title`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `drak_index_slideshow` */

insert  into `drak_index_slideshow`(`id`,`title`,`desc`) values (1,'DrakantasCMS','DrakantasCMS, solo tu sabes su poder =)');

/*Table structure for table `drak_news` */

CREATE TABLE `drak_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `drak_news` */

insert  into `drak_news`(`id`,`title`,`slug`,`text`) values (1,'DrakantasCMS','drakantascms','DrakantasCMS v.0.0.2 ya revelada!!<br />\r\nChangelog:<br />\r\n. Agregado sistema de login.<br />\r\n. Fixeado sistema de registro de cuentas y de noticias.<br />\r\n. Panel de cuenta (Obtenci&oacute;n de informaci&oacute;n terminado).<br />\r\nPara v.0.0.3:<br />\r\n. Se agregar&aacute; seguridad para todas las query\'s del sitio.<br />\r\n. Creación de Libreria de Wow(Telnet y SHA1 Encryption).<br />\r\n. Sistema de Comentarios para las noticias.');
insert  into `drak_news`(`id`,`title`,`slug`,`text`) values (2,'DrakantasCMS UPDATE','drakantascms-update','DrakantasCMS v.0.0.3 ya revelada!!<br />\r\nChangelog:<br />\r\n. Se agregar&aacute; seguridad para todas las query\'s del sitio.<br />\r\n. Creación de Libreria Personalizada(Telnet y SHA1 Encryption).<br />\r\n. Sistema de Comentarios para las noticias.<br />\r\nPara v.0.0.4:<br />\r\n. Se agregar&aacute; seguridad para todas las query\'s del sitio.<br />\r\n. Creación de Libreria de Wow(Telnet y SHA1 Encryption).<br />\r\n. Sistema de Comentarios para las noticias.');

/*Table structure for table `drak_users` */

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