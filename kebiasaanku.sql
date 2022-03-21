-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for kebiasaanku
DROP DATABASE IF EXISTS `kebiasaanku`;
CREATE DATABASE IF NOT EXISTS `kebiasaanku` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `kebiasaanku`;

-- Dumping structure for table kebiasaanku.hasil_kebiasaan
DROP TABLE IF EXISTS `hasil_kebiasaan`;
CREATE TABLE IF NOT EXISTS `hasil_kebiasaan` (
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kebiasaan` varchar(255) NOT NULL,
  `checkout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  PRIMARY KEY (`id_hasil`),
  KEY `id_kebiasaan` (`kode_kebiasaan`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kebiasaanku.hasil_kebiasaan: ~0 rows (approximately)
/*!40000 ALTER TABLE `hasil_kebiasaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `hasil_kebiasaan` ENABLE KEYS */;

-- Dumping structure for table kebiasaanku.tbl_kebiasaan
DROP TABLE IF EXISTS `tbl_kebiasaan`;
CREATE TABLE IF NOT EXISTS `tbl_kebiasaan` (
  `kode_kebiasaan` varchar(255) NOT NULL DEFAULT '',
  `nama_kebiasaan` varchar(255) NOT NULL,
  `durasi_pembiasaan` varchar(255) NOT NULL,
  `kategori_pelaksanaan` varchar(255) NOT NULL,
  `jam_mulai_pelaksanaan` varchar(255) NOT NULL,
  `jam_selesai_pelaksanaan` varchar(255) NOT NULL,
  `nada_alarm` varchar(255) NOT NULL,
  `snooze` int(1) NOT NULL DEFAULT '0',
  `tgl_mulai` date NOT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`kode_kebiasaan`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kebiasaanku.tbl_kebiasaan: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_kebiasaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_kebiasaan` ENABLE KEYS */;

-- Dumping structure for table kebiasaanku.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kebiasaanku.tbl_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
