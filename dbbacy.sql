-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2016 at 11:17 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbbacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id_about` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `isi_about` text NOT NULL,
  PRIMARY KEY (`id_about`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id_about`, `judul`, `gambar`, `isi_about`) VALUES
(4, 'Tentang Kami', '4-motor-motor-berparas-cafe-racer-karya-darizt-dari-yogyakarta-13.jpeg', 'kami adalah kustom motor terbaik di yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_admin`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Sistem');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE IF NOT EXISTS `biaya` (
  `id_biaya` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `biaya_material` double NOT NULL,
  `biaya_jasa` double NOT NULL,
  `DP` double NOT NULL,
  `tgl_dp` date NOT NULL,
  `tgl_lunas` date NOT NULL,
  `status_biaya` enum('Proses','DP','Lunas') NOT NULL DEFAULT 'Proses',
  `bukti_dp` varchar(200) NOT NULL,
  `pelunasan` double NOT NULL,
  `bukti_lunas` varchar(200) NOT NULL,
  PRIMARY KEY (`id_biaya`),
  KEY `id_order` (`id_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `id_order`, `biaya_material`, `biaya_jasa`, `DP`, `tgl_dp`, `tgl_lunas`, `status_biaya`, `bukti_dp`, `pelunasan`, `bukti_lunas`) VALUES
(1, 2, 20000000, 7000000, 14000000, '2016-12-04', '2016-12-04', 'Lunas', '2-Chrysanthemum.jpg', 13000000, '2-Lighthouse.jpg'),
(2, 4, 15000000, 5000000, 0, '0000-00-00', '0000-00-00', 'Proses', '', 0, ''),
(3, 7, 4000000, 540000, 2270000, '2016-12-19', '2016-12-20', 'DP', '7-Koala.jpg', 2270000, '7-Koala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `judul_galeri` varchar(200) NOT NULL,
  `gbr_galeri` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `judul_galeri`, `gbr_galeri`, `keterangan`) VALUES
(1, 'Mega Pro 2004', '1-Modifikasi-custom-bike-classic-cafe-racer-street-tracker-basic-honda-mega-pro-2004.jpg', 'Modifikasi-custom-bike-classic-cafe-racer-street-tracker-basic-honda-mega-pro-2004'),
(2, 'asdfadf', '2-image3-1024x768.jpg', 'asdf ads asd fadf'),
(3, 'Motor Klasik Gaya Asik', '3-AFA_4980-1024x690.jpg', 'cocok untuk jalan sore'),
(4, 'Cafe Racer', '4-modifikasi-motor-honda-cb200-gaya-cafe-racer.jpg', 'modifikasi-motor-honda-cb200-gaya-cafe-racer'),
(5, 'Motor berparas Cafe', '5-motor-motor-berparas-cafe-racer-karya-darizt-dari-yogyakarta-7.jpeg', 'motor-motor-berparas-cafe-racer-karya-darizt-dari-yogyakarta-7');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `id_kontak` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_kontak` date NOT NULL,
  `nama_kontak` varchar(50) NOT NULL,
  `email_kontak` varchar(50) NOT NULL,
  `pesan_kontak` text NOT NULL,
  `respon_admin` text NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `tgl_kontak`, `nama_kontak`, `email_kontak`, `pesan_kontak`, `respon_admin`) VALUES
(2, '2016-11-25', 'sdfasdaf', 'asdfasd asdfasd', ' asd asd asd adf', ''),
(3, '2016-11-25', 'sdfasdaf', 'asdfasd asdfasd', ' asd asd asd adf', ''),
(4, '2016-12-03', 'Desi Ratnasari', 'desi@yahoo.com', 'bagus banget. puas dengan hasil kustom bacy ', 'oke banget ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_order` date NOT NULL,
  `modifikasi` text NOT NULL,
  `gambar_asli` varchar(200) NOT NULL,
  `gambar_modifikasi` varchar(200) NOT NULL,
  `status_order` enum('Order','Proses','Selesai') NOT NULL DEFAULT 'Order',
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `nama`, `telepon`, `alamat`, `email`, `tgl_order`, `modifikasi`, `gambar_asli`, `gambar_modifikasi`, `status_order`) VALUES
(2, 'Paramitha Bunga', '09384523', 'kacer 5', 'laatansa0616@gmail.com', '2016-12-03', 'tolong gan dibuat seperti gambar modifikasi', '2-motor-motor-berparas-cafe-racer-karya-darizt-dari-yogyakarta-7.jpeg', '2-modifikasi-motor-honda-cb200-gaya-cafe-racer.jpg', 'Proses'),
(3, 'Paramitha Bunga', '08345324543', 'Jl. Turi Km. 5', 'supintoster@gmail.com', '2016-12-04', 'saya ingin di buat knalbot 2', '3-Koala.jpg', '3-Penguins.jpg', 'Order'),
(4, 'op[o[p', 'p[o[po[p', '[po[', 'a@a.a', '2016-12-10', 'sdfadsfadfadsfadf', '', '', 'Proses'),
(5, '', '', '', '', '2016-12-13', '', '', '', 'Order'),
(6, 'asddadsf', 'a3rt5', '', '', '2016-12-13', '', '', '', 'Order'),
(7, 'asdfadf', 'q2', '', '', '2016-12-13', '', '', '', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status_pekerjaan` enum('Proses','Selesai') NOT NULL DEFAULT 'Proses',
  PRIMARY KEY (`id_pekerjaan`),
  KEY `id_order` (`id_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `id_order`, `tgl_mulai`, `tgl_selesai`, `status_pekerjaan`) VALUES
(1, 2, '2016-12-04', '2016-12-04', 'Selesai'),
(2, 7, '0000-00-00', '0000-00-00', 'Proses');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
