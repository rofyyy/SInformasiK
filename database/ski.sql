-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ski
CREATE DATABASE IF NOT EXISTS `ski` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ski`;

-- Dumping structure for table ski.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ski.migration: ~2 rows (approximately)
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1742193680),
	('m151024_072453_create_route_table', 1742195144);

-- Dumping structure for table ski.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `author` varchar(50) NOT NULL DEFAULT '',
  `tag` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ski.news: ~0 rows (approximately)
INSERT INTO `news` (`id`, `title`, `author`, `tag`, `created_at`, `content`, `image`) VALUES
	(15, 'Lorem Ipsum', 'Me', 'Lorem ipsum domeri', '2025', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent accumsan massa et lorem auctor, vitae fringilla augue feugiat. Proin eu tortor est. Ut tincidunt ut est eu aliquam. Mauris pharetra, magna in suscipit scelerisque, arcu arcu efficitur massa, eget rutrum diam ante nec purus. Phasellus eu fringilla sapien. Nunc ut sem vel magna laoreet pharetra. Suspendisse nec tortor eros.\r\n\r\nMauris posuere posuere nulla sed lacinia. Mauris rhoncus eleifend mi a vehicula. Suspendisse sodales aliquet mi eget venenatis. Nam erat nunc, feugiat eget lacinia rutrum, tempor ut orci. Proin et tellus ac dolor consectetur pharetra non nec nisi. Morbi pellentesque risus quis interdum vehicula. Integer lacinia molestie sem, id faucibus turpis rhoncus quis. Vivamus et ornare quam, non ornare tellus.', 'desain grafis barber dengan tema elegan dan simple beserta kata-kata promosinya, resolusi 1920X1080.png'),
	(16, 'Lorem Ipsum', 'Me', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2025', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent accumsan massa et lorem auctor, vitae fringilla augue feugiat. Proin eu tortor est. Ut tincidunt ut est eu aliquam. Mauris pharetra, magna in suscipit scelerisque, arcu arcu efficitur massa, eget rutrum diam ante nec purus. Phasellus eu fringilla sapien. Nunc ut sem vel magna laoreet pharetra. Suspendisse nec tortor eros.\r\n\r\nMauris posuere posuere nulla sed lacinia. Mauris rhoncus eleifend mi a vehicula. Suspendisse sodales aliquet mi eget venenatis. Nam erat nunc, feugiat eget lacinia rutrum, tempor ut orci. Proin et tellus ac dolor consectetur pharetra non nec nisi. Morbi pellentesque risus quis interdum vehicula. Integer lacinia molestie sem, id faucibus turpis rhoncus quis. Vivamus et ornare quam, non ornare tellus.\r\n\r\nSuspendisse pellentesque posuere libero, in varius dolor posuere at. In dignissim ex at congue vehicula. Nunc ultrices sapien nisl, in sodales risus ultrices ultrices. Quisque at nisl laoreet, tempor nibh sit amet, dapibus tortor. In lacus ex, sollicitudin ac magna finibus, mollis congue ligula. Aliquam nulla nunc, cursus in mi at, pulvinar eleifend mi. Maecenas ac semper eros, efficitur vehicula lorem. In eu tellus nec nibh pellentesque faucibus. Praesent congue vestibulum ligula, ultricies aliquam quam.\r\n\r\nPraesent lobortis magna sit amet faucibus dapibus. Nulla porttitor lorem urna, vitae ', 'Tahun Baru 2025 dengan tema barber yang simpel, minim objek, tanpa teks, dengan latar belakang gelap dan elegan.png');

-- Dumping structure for table ski.patient
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL DEFAULT '0',
  `symtomp` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ski.patient: ~0 rows (approximately)

-- Dumping structure for table ski.route
CREATE TABLE IF NOT EXISTS `route` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `alias` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '1',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table ski.route: ~0 rows (approximately)

-- Dumping structure for table ski.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` bigint DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` enum('man','woman') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `age` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` enum('master','employee','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `action` enum('notinprogress','inqueue','proses','payment','complete') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `medicine` varchar(250) DEFAULT NULL,
  `receipt` varchar(250) DEFAULT NULL,
  `complaint` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=360 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ski.user: ~4 rows (approximately)
INSERT INTO `user` (`id`, `username`, `name`, `email`, `phone`, `address`, `gender`, `age`, `password`, `role`, `created_at`, `action`, `medicine`, `receipt`, `complaint`) VALUES
	(324, 'master', NULL, 'master@gmail.com', NULL, NULL, 'man', '20 tahun', '$2y$13$pS7NIkDKlJ.IHhpS.Ilzt.VDN2gkCyiw/h8U7.VRMwXEcDvm8fE3q', 'master', '2025-03-16 08:04:28', NULL, NULL, NULL, NULL),
	(325, 'pegawai', NULL, 'pegawai@gmail.com', NULL, NULL, 'woman', '7 tahun', '$2y$13$KJRIG/OvMQF5aimJUIke/.suA8C4D3S29Ehta3adneSFyEVg03rSe', 'employee', '2025-03-16 08:04:30', NULL, NULL, NULL, NULL),
	(328, 'user', NULL, 'user@gmail.com', NULL, NULL, 'man', '200 tahun', '$2y$13$nbn7Wjk/pDXmRUu2GoKYCuU1GfMbSBxfQFzso9WkBS6eu1PkFkAJy', 'user', '2025-03-16 09:56:33', NULL, NULL, NULL, NULL),
	(329, 'rofy', 'Muhammad Rofy', 'rofy@gmail.com', 83865037255, 'Buninagara I, RT 003 RW 004, kel. Nagarasari, Kec. Cipedes, Kota Tasikmalaya', 'man', '200 tahun', '$2y$13$p3rU98qfqsE2/yqJoLSVxOBOkmKP.Vk6u/n.09ApKWdLU26PYJmwi', 'user', NULL, NULL, NULL, NULL, NULL),
	(358, 'mah', 'mahmud', 'mahmud@gmail.com', 83865037255, 'Buninagara I, RT 003 RW 004, kel. Nagarasari, Kec. Cipedes, Kota Tasikmalaya', 'man', '123', '$2y$13$4hez4vx5P6dRr.RSZii5CeSKyJFm/KcfhrDmBE8HsZl6ieWBvFVXu', 'user', NULL, NULL, NULL, NULL, NULL),
	(359, 'employee', 'employee', 'employee@gmail.com', 83865037255, 'Buninagara I, RT 003 RW 004, kel. Nagarasari, Kec. Cipedes, Kota Tasikmalaya', 'man', '123', '$2y$13$II7unkmAJ6I2ws5ZkJViLe6Q2y2rnF3RilZdKmE.reDoD2WBvtO.a', 'employee', 'Today', NULL, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
