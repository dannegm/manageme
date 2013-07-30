-- Adminer 3.3.0 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `dnn_activity`;
CREATE TABLE `dnn_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` text NOT NULL,
  `type` text NOT NULL,
  `author` text NOT NULL,
  `ref` text NOT NULL,
  `content` text NOT NULL,
  `users` text NOT NULL,
  `date` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `dnn_content`;
CREATE TABLE `dnn_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` text NOT NULL,
  `type` text NOT NULL,
  `author` text NOT NULL,
  `link` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `tags` text NOT NULL,
  `category` text NOT NULL,
  `date` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `dnn_users`;
CREATE TABLE `dnn_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL,
  `rol` text NOT NULL,
  `status` text NOT NULL,
  `login` text NOT NULL,
  `token` text NOT NULL,
  `bio` text NOT NULL,
  `avatar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dnn_users` (`id`, `uid`, `username`, `email`, `password`, `name`, `date`, `rol`, `status`, `login`, `token`, `bio`, `avatar`) VALUES
(1,	'uid_Qbzr2hJx',	'dannegm',	'danneg.m@gmail.com',	'3cb78e8370d2ace3377962269c6d043b',	'Daniel GarcÃ­a',	'0 21-07-2013 5:40:23:am',	'god',	'active',	'yep',	'dWlkX1FienIyaEp4fGRhbm5lZ218M2NiNzhlODM3MGQyYWNlMzM3Nzk2MjI2OWM2ZDA0M2J8NSAyNi0wNy0yMDEzIDc6Mjg6NDg6cG18MTkyLjE2OC4xLjcxfERlc2t0b3B8V2luZG93cyA3fEdvb2dsZSBDaHJvbWU=',	'Desarrollador del sistema Manageme y administrador de &eacute;ste sitio.',	'dannegm.jpg'),
(3,	'uid_uHmB2NYC',	'demo',	'demo@dannegm.com',	'fe01ce2a7fbac8fafaed7c982a04e229',	'Usuario demo',	'3 24-07-2013 2:41:43:am',	'demo',	'active',	'yep',	'dWlkX3VIbUIyTllDfGRlbW98ZmUwMWNlMmE3ZmJhYzhmYWZhZWQ3Yzk4MmEwNGUyMjl8NSAyNi0wNy0yMDEzIDc6NDM6NDg6cG18MTkyLjE2OC4xLjcxfERlc2t0b3B8V2luZG93cyA3fEdvb2dsZSBDaHJvbWU=',	'&Eacute;ste usuario s&oacute;lo sirve para la demostraci&oacute;n de &eacute;ste sistema',	'avatarPlaceholder.png'),
(4,	'uid_7z1ny8lg',	'admin',	'admin@dannegm.com',	'5f4dcc3b5aa765d61d8327deb882cf99',	'Administrador',	'3 24-07-2013 2:42:07:am',	'admin',	'active',	'yep',	'dWlkXzd6MW55OGxnfGFkbWlufDVmNGRjYzNiNWFhNzY1ZDYxZDgzMjdkZWI4ODJjZjk5fDUgMjYtMDctMjAxMyAzOjUwOjM1OmFtfDo6MXxEZXNrdG9wfFdpbmRvd3MgN3xHb29nbGUgQ2hyb21l',	'Usuario que administra',	'avatarPlaceholder.png');

-- 2013-07-29 21:45:38
