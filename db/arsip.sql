-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `petugas` (`id`, `nama_depan`, `nama_belakang`) VALUES
(1,	'yes',	'yes'),
(2,	'yes',	'yes'),
(3,	'yes',	'yes'),
(4,	'yesss',	'yes'),
(5,	'Hari',	'Hira'),
(6,	'',	'yes'),
(7,	'John',	'Wick'),
(8,	'Maya',	'Estianti'),
(9,	'Hari',	'Hira'),
(10,	'Harisss',	'Hirasss'),
(11,	'yes',	'yes');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `username` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2019-07-15 02:11:16
