-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `disposisi`;
CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tujuan` varchar(250) NOT NULL,
  `isi_disposisi` mediumtext NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL,
  `surat_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `disposisi` (`id`, `tujuan`, `isi_disposisi`, `sifat`, `batas_waktu`, `catatan`, `surat_id`) VALUES
(1,	'bag. teknis',	'mohon segera dilaksanakan',	'Segera',	'2019-07-16',	'cepetan',	2);

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `petugas` (`id`, `nama_depan`, `nama_belakang`) VALUES
(4,	'john',	'wick');

DROP TABLE IF EXISTS `surat_keluar`;
CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `pengirim` varchar(150) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `penerima` varchar(150) NOT NULL,
  `tgl_terima` date NOT NULL,
  `perihal` varchar(150) NOT NULL,
  `jenis_surat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `surat_masuk`;
CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `pengirim` varchar(150) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `penerima` varchar(150) NOT NULL,
  `tgl_terima` date NOT NULL,
  `perihal` varchar(150) NOT NULL,
  `jenis_surat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `username` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2019-07-16 08:34:42
