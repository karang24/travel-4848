-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2016 at 09:16 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_travel4848`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `keberangkatan` varchar(25) NOT NULL,
  `nama_kendaraan` varchar(25) NOT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `jam_keberangkatan` time DEFAULT NULL,
  `kelas` varchar(25) NOT NULL,
  `harga` varchar(25) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `keberangkatan`, `nama_kendaraan`, `tujuan`, `jam_keberangkatan`, `kelas`, `harga`) VALUES
(2, 'Bandung', 'Keramat Jati', 'Jakarta', '21:00:00', 'Ekonomi', 'Rp. 250.000,-'),
(4, 'Bandung', 'Lorena', 'Palembang', '21:00:00', 'Eksekutf', 'Rp. 200.000,-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kursi`
--

CREATE TABLE IF NOT EXISTS `tb_kursi` (
  `id_kursi` int(11) NOT NULL AUTO_INCREMENT,
  `no_kursi` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_kursi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_kursi`
--

INSERT INTO `tb_kursi` (`id_kursi`, `no_kursi`) VALUES
(2, 'jamal'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE IF NOT EXISTS `tb_mobil` (
  `flat_travel` varchar(50) NOT NULL,
  `nama_travel` varchar(100) DEFAULT NULL,
  `jenis_travel` varchar(50) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL,
  `jumlah_kursi` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`flat_travel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`flat_travel`, `nama_travel`, `jenis_travel`, `keterangan`, `jumlah_kursi`, `image`) VALUES
('1', 'hak', 'hamzah', '<p>sjflsdjl</p>', '25', 'doa-acara-walimatul-khitan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE IF NOT EXISTS `tb_pemesanan` (
  `id_pemesan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `nama_kendaraan` varchar(25) NOT NULL,
  `tujuan` varchar(25) NOT NULL,
  `jam_keberangkatan` time NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `no_kursi` varchar(25) NOT NULL,
  PRIMARY KEY (`id_pemesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesan`, `nama_lengkap`, `alamat`, `email`, `no_rekening`, `nama_kendaraan`, `tujuan`, `jam_keberangkatan`, `kelas`, `harga`, `no_kursi`) VALUES
(22, 'Anita', 'Tasik Malaya', 'Anita@gmail,com', '5343248238', 'Lorena', 'Palembang', '21:00:00', 'Eksekutf', 'Rp. 200.000,-', ''),
(23, 'Hamzah', '<ol>\r\n<li>Bandung</li>\r\n<li>Palembang</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'hamzahkerenz43@gmail.com', '5343248238', 'Keramat Jati', 'Jakarta', '21:00:00', 'Ekonomi', 'Rp. 250.000,-', ''),
(24, 'heru', '<p>bandung jalan sarijadi</p>', 'heru@gmail.com', '1234567890', 'Lorena', 'Palembang', '21:00:00', 'Eksekutf', 'Rp. 200.000,-', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE IF NOT EXISTS `tb_pengguna` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(25) NOT NULL,
  PRIMARY KEY (`user_id`,`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`user_id`, `user`, `user_email`, `password`, `level`) VALUES
(1, 'admin', 'sumith.harshan@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(6, 'anita', '', '83349cbdac695f3943635a4fd1aaa7d0', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
