-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2016 at 03:00 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `tkaryawan`
--

CREATE TABLE IF NOT EXISTS `tkaryawan` (
  `kode` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `password` text,
  `jk` text,
  `kode_provinsi` int(5) NOT NULL,
  `kode_kota` int(5) NOT NULL,
  `photo` text NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkaryawan`
--

INSERT INTO `tkaryawan` (`kode`, `nama`, `email`, `password`, `jk`, `kode_provinsi`, `kode_kota`, `photo`, `tgl_lahir`) VALUES
(123, 'a', 'a@gmail.com', '$2y$10$HhKa7kpjdTBmttLu3uiIdeOM.f36F5n4pBzY2zmF8jUpoRwm4sn8m', 'pria', 0, 0, 'foto/123.jpg', '0000-00-00'),
(234, 'b', 'b@gmaiil.com', '$2y$10$eBk2K2wZkRA6tDo1S6jfuO9UNuEy2icqM/hRxC9iAWuftCmmjj.uu', 'pria', 0, 0, 'foto/234.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tkota`
--

CREATE TABLE IF NOT EXISTS `tkota` (
  `kode_provinsi` int(5) NOT NULL,
  `kode_kota` int(5) NOT NULL,
  `nama_kota` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tprovinsi`
--

CREATE TABLE IF NOT EXISTS `tprovinsi` (
  `kode_provinsi` int(5) NOT NULL,
  `nama_provinsi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tkaryawan`
--
ALTER TABLE `tkaryawan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tkota`
--
ALTER TABLE `tkota`
  ADD PRIMARY KEY (`kode_kota`),
  ADD KEY `kode_provinsi` (`kode_provinsi`);

--
-- Indexes for table `tprovinsi`
--
ALTER TABLE `tprovinsi`
  ADD PRIMARY KEY (`kode_provinsi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tkota`
--
ALTER TABLE `tkota`
  ADD CONSTRAINT `tkota_ibfk_1` FOREIGN KEY (`kode_provinsi`) REFERENCES `tprovinsi` (`kode_provinsi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
