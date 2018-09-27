-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2018 at 10:49 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_help_it1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1ad722b4152dac95b25ef0391367ba36', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36', 1428339021, ''),
('6b6478c492b0fe2e504f291750a24d1c', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0', 1428344604, 'a:3:{s:9:"user_data";s:0:"";s:7:"id_user";s:1:"2";s:4:"user";s:1:"2";}'),
('f19d98e1408babe7700aead53737bebf', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.101 Safari/537.36', 1428345373, 'a:3:{s:9:"user_data";s:0:"";s:7:"id_user";s:1:"1";s:5:"admin";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

CREATE TABLE IF NOT EXISTS `tb_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `akses` varchar(50) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`id`, `akses`, `aktif`) VALUES
(1, 'LANTAI 5', 'Y'),
(2, 'LANTAI 3', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktivasi_kartu`
--

CREATE TABLE IF NOT EXISTS `tb_aktivasi_kartu` (
  `id_aktivasi` int(11) NOT NULL AUTO_INCREMENT,
  `by` varchar(200) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id_aktivasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_aktivasi_kartu`
--

INSERT INTO `tb_aktivasi_kartu` (`id_aktivasi`, `by`, `from_date`, `to_date`, `qty`) VALUES
(1, 'tes', '2018-08-23', '0000-00-00', 20),
(3, 'astika', '2018-08-24', '0000-00-00', 30),
(4, 'astika', '2018-08-24', '0000-00-00', 30),
(5, 'Admin', '2018-08-23', '2018-08-24', 20),
(6, 'Admin', '2018-08-23', '2018-08-28', 200),
(7, 'Admin', '2018-09-10', '2018-09-10', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_card`
--

CREATE TABLE IF NOT EXISTS `tb_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fridnum` varchar(100) NOT NULL,
  `pasien` varchar(100) NOT NULL,
  `room` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `status` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `akses` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_card`
--

INSERT INTO `tb_card` (`id`, `fridnum`, `pasien`, `room`, `tgl`, `jam`, `status`, `user`, `akses`) VALUES
(1, '4061607172', '', '', '2018-09-18', '07:01:14', 1, 'admin', 1),
(2, '3258528772', '', '', '2018-09-18', '07:12:04', 1, 'admin', 1),
(3, '2111015110', '', '', '2018-09-18', '07:12:32', 1, 'admin', 1),
(4, '3258528772', '', '', '2018-09-18', '07:12:39', 1, 'admin', 1),
(5, '3258528772', '', '', '2018-09-18', '07:19:48', 1, 'admin', 1),
(6, '4066651396', '', '', '2018-09-18', '07:23:43', 1, 'admin', 1),
(7, '2143887478', '', '', '2018-09-18', '09:29:50', 1, 'admin', 1),
(8, '0442199781', '', '', '2018-09-18', '09:35:35', 1, 'admin', 1),
(9, '0495191092', '', '', '2018-09-18', '09:35:40', 1, 'admin', 1),
(10, '0732208713', '', '', '2018-09-18', '09:35:51', 1, 'admin', 1),
(11, '0725421129', '', '', '2018-09-18', '09:35:56', 1, 'admin', 1),
(12, '2108768678', '', '', '2018-09-18', '09:36:27', 1, 'admin', 1),
(13, '2109175574', '', '', '2018-09-18', '09:36:32', 1, 'admin', 1),
(14, '2110790806', '', '', '2018-09-18', '09:59:50', 1, 'admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_departemen`
--

CREATE TABLE IF NOT EXISTS `tb_departemen` (
  `id_departemen` int(3) NOT NULL AUTO_INCREMENT,
  `nama_departemen` varchar(50) NOT NULL,
  PRIMARY KEY (`id_departemen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_departemen`
--

INSERT INTO `tb_departemen` (`id_departemen`, `nama_departemen`) VALUES
(1, 'IT'),
(2, 'Operation'),
(3, 'Engineering'),
(4, 'Production Facilities'),
(5, 'Marketing Communication'),
(6, 'Sales Corporate'),
(7, 'Sales Edutainment'),
(8, 'Creative and Show'),
(9, 'Food and Beverages'),
(10, 'Finance'),
(11, 'HR & GA'),
(12, 'Wardrobe'),
(13, 'Purchasing');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penerimaan_kartu`
--

CREATE TABLE IF NOT EXISTS `tb_detail_penerimaan_kartu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penerimaan` int(11) NOT NULL,
  `id_aktivasi` int(11) NOT NULL,
  `no_kartu` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `tb_detail_penerimaan_kartu`
--

INSERT INTO `tb_detail_penerimaan_kartu` (`id`, `id_penerimaan`, `id_aktivasi`, `no_kartu`, `tanggal`, `status`) VALUES
(100, 10, 1, '123', '2018-08-23 08:55:16', 'Active'),
(101, 10, 1, '1234', '2018-08-23 08:55:24', 'Active'),
(102, 10, 0, '12345', '2018-08-13 00:45:09', 'Active'),
(103, 10, 0, '12', '2018-08-22 23:07:35', 'Receive'),
(104, 1, 0, '1', '2018-08-23 02:02:47', 'Receive'),
(105, 12, 0, '2109714550', '2018-09-10 00:31:54', 'Receive'),
(106, 12, 0, '2143887478', '2018-09-10 00:32:02', 'Receive'),
(107, 12, 0, '2144326390', '2018-09-10 00:32:10', 'Receive'),
(108, 12, 0, '2110546582', '2018-09-10 00:32:16', 'Receive'),
(109, 12, 0, '2147202934', '2018-09-10 00:32:24', 'Receive');

-- --------------------------------------------------------

--
-- Table structure for table `tb_identifikasi`
--

CREATE TABLE IF NOT EXISTS `tb_identifikasi` (
  `id_identifikasi` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `identifikasi` text NOT NULL,
  `status` enum('On Progress','Finished') NOT NULL,
  `persentase` enum('25%','50%','75%','100%') NOT NULL,
  `oleh` varchar(50) NOT NULL,
  PRIMARY KEY (`id_identifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_identifikasi`
--

INSERT INTO `tb_identifikasi` (`id_identifikasi`, `tanggal`, `identifikasi`, `status`, `persentase`, `oleh`) VALUES
('PK-00008', '2018-02-19', 'Slot LAN card masalah', 'Finished', '100%', 'user'),
('PK-00009', '2018-02-19', 'Test print hasilnya ok', 'Finished', '100%', 'fajri'),
('PK-00010', '2018-02-19', 'test pakai kabel power baru ternyata tetap belum mau nyala', 'Finished', '100%', 'fajri'),
('PK-00011', '2018-02-20', 'unregistered', 'Finished', '100%', 'fajri'),
('PK-00012', '2018-02-20', 'crimping kabel LAN rusak', 'Finished', '100%', 'fajri'),
('PK-00013', '2018-02-20', 'Photoshop sudah ada tinggal diaktifkan karena softwarenya trial', 'Finished', '100%', 'fajri'),
('PK-00014', '2018-02-21', 'power supply pada CPU bermasalah', 'On Progress', '25%', 'fajri'),
('PK-00015', '2018-02-21', 'laptop belum tersambung ke jaringan LAN jadi otomatis tidak bisa konek ke printernya admin edu', 'Finished', '100%', 'fajri'),
('PK-00016', '2018-02-24', 'tinta berkurang', 'Finished', '100%', 'fajri'),
('PK-00017', '2018-02-27', 'tes kabel lan pakai lan tester hasilnya normal, restart switch yang terhubung ke pc di 2 titik (ruangan bos farid dan ruangan pf)', 'Finished', '100%', 'fajri'),
('PK-00018', '2018-02-27', 'setting pengaturan scanner lalu scan ulang', 'Finished', '100%', 'fajri'),
('PK-00019', '2018-03-01', 'mengganti password', 'Finished', '100%', 'fajri'),
('PK-00020', '2018-03-01', 'laptop sudah ada ipnya tinggal sambungkan ke printer lewat koneksi lan', 'Finished', '100%', 'fajri'),
('PK-00021', '2018-03-01', ' map network drive ulang karena pc rara (admin edu)ganti password', 'Finished', '100%', 'fajri'),
('PK-00022', '2018-03-01', 'map network drive ke pc rara edu', 'Finished', '100%', 'fajri'),
('PK-00023', '2018-03-01', 'masalah pada kabel lan sehingga koneksi tidak stabil', 'Finished', '100%', 'fajri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(7) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `allDay` varchar(10) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `title`, `description`, `color`, `start`, `end`, `allDay`) VALUES
(1, 'fajri', ' oo', '#091B37', '2018-02-04 00:00:00', '2018-02-04 00:00:00', 'true'),
(2, 'fajri', ' ', '#091B37', '2018-02-06 00:00:00', '2018-02-06 00:00:00', 'true'),
(3, 'fajri', ' ', '#091B37', '2018-02-11 00:00:00', NULL, 'true'),
(4, 'fajri', ' ', '#091B37', '2018-02-18 00:00:00', NULL, 'true'),
(5, 'fajri', ' ', '#091B37', '2018-02-25 00:00:00', NULL, 'true'),
(8, 'dino', ' ', '#091B37', '2018-02-05 00:00:00', NULL, 'true'),
(9, 'dino', ' ', '#091B37', '2018-02-12 00:00:00', NULL, 'true'),
(10, 'dino', ' ', '#091B37', '2018-02-19 00:00:00', NULL, 'true'),
(13, 'dino', ' ', '#091B37', '2018-02-26 00:00:00', NULL, 'true'),
(14, 'dino', ' ', '#091B37', '2018-02-27 00:00:00', NULL, 'true'),
(15, 'Libur Nasional', 'Hari Raya Nyepi', '#dd4b39', '2018-03-17 00:00:00', NULL, 'true'),
(16, 'Libur Nasional', 'Wafat Isa Al-Masih', '#dd4b39', '2018-03-30 00:00:00', NULL, 'true'),
(17, 'dino', ' cuti', '#00a65a', '2018-02-28 00:00:00', NULL, 'true'),
(18, 'dino', ' cuti', '#00a65a', '2018-03-01 00:00:00', NULL, 'true'),
(19, 'dino', ' cuti', '#00a65a', '2018-03-02 00:00:00', NULL, 'true'),
(20, 'dino', 'Off', '#091B37', '2018-03-05 00:00:00', NULL, 'true'),
(21, 'dino', 'Off', '#091B37', '2018-03-12 00:00:00', NULL, 'true'),
(22, 'dino', 'Off', '#091B37', '2018-03-19 00:00:00', NULL, 'true'),
(23, 'dino', 'Off', '#091B37', '2018-03-26 00:00:00', NULL, 'true'),
(24, 'dino', 'Off', '#091B37', '2018-03-27 00:00:00', NULL, 'true'),
(25, 'fajri', 'Off', '#091B37', '2018-03-03 00:00:00', NULL, 'true'),
(26, 'fajri', 'Off', '#091B37', '2018-03-11 00:00:00', NULL, 'true'),
(27, 'fajri', 'Off', '#091B37', '2018-03-18 00:00:00', NULL, 'true'),
(28, 'fajri', 'Off', '#091B37', '2018-03-25 00:00:00', NULL, 'true'),
(30, 'fajri', 'Off', '#091B37', '2018-03-04 00:00:00', NULL, 'true'),
(32, 'eewrwer', 'ZzX', '#00c0ef', '2018-08-11 00:00:00', NULL, 'true'),
(33, '21313', 'ZzX', '#00c0ef', '2018-08-11 00:00:00', NULL, 'true'),
(34, 'Libur Nasional', 'Libur Nasional', '#f39c12', '2018-08-16 00:00:00', NULL, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logcard`
--

CREATE TABLE IF NOT EXISTS `tb_logcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rfid` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `keterangn` text NOT NULL,
  `user` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerimaan_kartu`
--

CREATE TABLE IF NOT EXISTS `tb_penerimaan_kartu` (
  `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT,
  `dari` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id_penerimaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_penerimaan_kartu`
--

INSERT INTO `tb_penerimaan_kartu` (`id_penerimaan`, `dari`, `status`, `tanggal`, `qty`) VALUES
(10, 'Purchasing', 'Active', '2018-08-25', 20),
(11, 'Fitri', 'Active', '2018-08-23', 20),
(12, 'dian', 'Active', '2018-09-10', 400);

-- --------------------------------------------------------

--
-- Table structure for table `tb_permintaan`
--

CREATE TABLE IF NOT EXISTS `tb_permintaan` (
  `id_permintaan` varchar(8) NOT NULL,
  `dari` varchar(200) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `status` enum('Waiting','On Progress','Finished') NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_permintaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_permintaan`
--

INSERT INTO `tb_permintaan` (`id_permintaan`, `dari`, `departemen`, `catatan`, `status`, `tanggal`) VALUES
('PK-00001', 'fitri', 'IT', 'test1', 'Waiting', '2018-08-06'),
('PK-00008', 'Hendra', 'Finance', 'Jaringan LAN masalah di salah satu pc', 'Finished', '2018-02-19'),
('PK-00009', 'Karin', 'HR & GA', 'Printer masalah', 'Finished', '2018-02-19'),
('PK-00010', 'Karin', 'HR & GA', 'Monitor pc reny tidak menyala', 'Finished', '2018-02-19'),
('PK-00011', 'Luisito GM', 'IT', 'Install office laptop', 'Finished', '2018-02-20'),
('PK-00012', 'Gunadi M, SM operation', 'Operation', 'jaringan LAN masalah', 'Finished', '2018-02-20'),
('PK-00013', 'Teten ', 'Sales Edutainment', 'Installkan photoshop', 'Finished', '2018-02-20'),
('PK-00014', 'Andika spv ', 'Operation', 'CPU pc tidak bisa menyala', 'On Progress', '2018-02-21'),
('PK-00015', 'mas rudi spv edu', 'Sales Edutainment', 'sambungkan laptop ke printer LAN', 'Finished', '2018-02-21'),
('PK-00016', 'fajri', 'Sales Edutainment', 'Isi tinta printer', 'Finished', '2018-02-24'),
('PK-00017', 'Rini', 'Production Facilities', 'jaringan lan bermasalah', 'Finished', '2018-02-27'),
('PK-00018', 'reny', 'HR & GA', 'hasil scan bermasalah', 'Finished', '2018-02-27'),
('PK-00019', 'rara', 'Sales Edutainment', 'ganti password pc', 'Finished', '2018-03-01'),
('PK-00020', 'wawan', 'Marketing Communication', 'koneksikan laptop pribadi ke printer edutainment', 'Finished', '2018-03-01'),
('PK-00021', 'tenri spv edu', 'Sales Edutainment', 'sharing folder', 'Finished', '2018-03-01'),
('PK-00022', 'rudi spv edu', 'Sales Edutainment', 'sharing folder ke admin rara', 'Finished', '2018-03-01'),
('PK-00023', 'rudi', 'Sales Edutainment', 'koneksikan ke printer rara edu', 'Finished', '2018-03-01'),
('PK-00024', 'Mardino Santosa', 'Engineering', 'tes', 'Waiting', '2018-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_refill`
--

CREATE TABLE IF NOT EXISTS `tb_refill` (
  `id_refill` int(3) NOT NULL AUTO_INCREMENT,
  `printer` varchar(50) NOT NULL,
  `departemen` varchar(25) NOT NULL,
  `refill_terakhir` date DEFAULT NULL,
  `oleh` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_refill`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_refill`
--

INSERT INTO `tb_refill` (`id_refill`, `printer`, `departemen`, `refill_terakhir`, `oleh`) VALUES
(2, 'Epson L220', 'Creative and Show', '2018-02-10', 'fajri'),
(4, 'Canon IP1980', 'Food and Beverages', '2018-02-10', 'fajri'),
(6, 'Canon IP1980', 'Production Facilities', '2018-02-10', 'fajri'),
(7, 'Canon IP1980', 'Engineering', '2018-02-10', 'fajri'),
(8, 'Canon IP1980', 'HR & GA', '2018-02-10', 'fajri'),
(9, 'Canon IP1980', 'Wardrobe', '2018-02-10', 'fajri'),
(10, 'Epson L220', 'Finance', '2018-02-10', 'fajri'),
(11, 'Epson L220', 'Purchasing', '2018-02-10', 'fajri'),
(12, 'Epson L320', 'Sales Edutainment', '2018-02-10', 'fajri'),
(13, 'Canon IP1980', 'Marketing Communication', '2018-02-10', 'fajri'),
(14, 'Canon IP1980', 'Operation', '2018-02-10', 'fajri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_solusi`
--

CREATE TABLE IF NOT EXISTS `tb_solusi` (
  `id_solusi` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `solusi` text NOT NULL,
  `status` enum('Finished') NOT NULL,
  `oleh` varchar(50) NOT NULL,
  PRIMARY KEY (`id_solusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_solusi`
--

INSERT INTO `tb_solusi` (`id_solusi`, `tanggal`, `solusi`, `status`, `oleh`) VALUES
('PK-00008', '2018-02-19', 'Pemasangan yg benar', 'Finished', 'user'),
('PK-00009', '2018-02-19', 'restart kemudian test print ulang.\r\ndone', 'Finished', 'fajri'),
('PK-00010', '2018-02-19', 'masalah ada pada switch on off yang sudah mulai bermasalah.\r\nDone', 'Finished', 'fajri'),
('PK-00011', '2018-02-20', 'Uninstalling office 2016, Installing office 2010', 'Finished', 'fajri'),
('PK-00012', '2018-02-20', 'Crimping ulang kabel LAN', 'Finished', 'fajri'),
('PK-00013', '2018-02-20', 'Diaktifkan pakai serial number. \r\nDone', 'Finished', 'fajri'),
('PK-00015', '2018-02-21', 'IP pc yang dipakai sebelumnya oleh mas rudi dialihkan ke laptop pribadi karena pc tersebut tidak digunakan lagi (terganti oleh laptop) setelah itu dikoneksikan ke printer admin edu.', 'Finished', 'fajri'),
('PK-00016', '2018-02-24', 'isi tinta sampai indikator full', 'Finished', 'fajri'),
('PK-00017', '2018-02-27', 'setelah direstart plus lan tester hasilnya normal kembali', 'Finished', 'fajri'),
('PK-00018', '2018-02-27', 'restart scan', 'Finished', 'fajri'),
('PK-00019', '2018-03-01', 'ganti password lewat akun IT', 'Finished', 'fajri'),
('PK-00020', '2018-03-01', 'sharing printer edu lalu koneksikan laptop ke printer tersebut.', 'Finished', 'fajri'),
('PK-00021', '2018-03-01', ' map network drive ulang karena pc rara (admin edu)ganti password lalu restart', 'Finished', 'fajri'),
('PK-00022', '2018-03-01', 'map network lalu restart', 'Finished', 'fajri'),
('PK-00023', '2018-03-01', 'kabel lan di crimping ulang', 'Finished', 'fajri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE IF NOT EXISTS `tb_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id`, `status`, `aktif`) VALUES
(1, 'READY', 'Y'),
(2, 'AKTIFASI', 'Y'),
(3, 'USE', 'Y'),
(4, 'NON AKTIF', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(2) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(20) NOT NULL,
  `pass_user` varchar(40) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL,
  `avatar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `pass_user`, `nama_lengkap`, `level`, `avatar`) VALUES
(1, 'admin', 'b246ff693d453c3b1a3049752da2bc75', 'Admin', '1', './avatar/user2-160x160.jpg'),
(2, 'fajri', 'c50abf382228ef317ffe892e7c8a91ec', 'fajri', '2', './avatar/avatar5.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
