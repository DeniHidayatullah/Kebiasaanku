-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 06:22 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kebiasaanku`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_kebiasaan`
--

CREATE TABLE `hasil_kebiasaan` (
  `id_hasil` int(11) NOT NULL,
  `id_kebiasaan` int(11) NOT NULL,
  `checkout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kebiasaan`
--

CREATE TABLE `tbl_kebiasaan` (
  `id_kebiasaan` int(11) NOT NULL,
  `nama_kebiasaan` varchar(255) NOT NULL,
  `durasi_pembiasaan` varchar(255) NOT NULL,
  `pelaksanaan` varchar(255) NOT NULL,
  `jam_pelaksanaan` varchar(255) NOT NULL,
  `alarm` varchar(255) NOT NULL,
  `nada_alaram` varchar(255) NOT NULL,
  `snooze` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_kebiasaan`
--
ALTER TABLE `hasil_kebiasaan`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_kebiasaan` (`id_kebiasaan`);

--
-- Indexes for table `tbl_kebiasaan`
--
ALTER TABLE `tbl_kebiasaan`
  ADD PRIMARY KEY (`id_kebiasaan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_kebiasaan`
--
ALTER TABLE `hasil_kebiasaan`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kebiasaan`
--
ALTER TABLE `tbl_kebiasaan`
  MODIFY `id_kebiasaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
