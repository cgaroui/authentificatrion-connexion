-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
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


-- Listage de la structure de la base pour authentification_chaima
CREATE DATABASE IF NOT EXISTS `authentification_chaima` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `authentification_chaima`;

-- Listage de la structure de table authentification_chaima. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table authentification_chaima.user : ~5 rows (environ)
INSERT INTO `user` (`id_user`, `username`, `email`, `password`) VALUES
	(2, 'chai', 'chai@gmail.com', '$2y$10$nuW1URSCN1ub5yv7ijapxeo7CmIk6XBCVJ2JxIwpETBsjEBQyoSbm'),
	(3, 'chaima', 'chaima@gmail.com', '$2y$10$0NR4HeF2Sl157JJ9tSj2XeQcyTw07C..ziaQJ3Kv2.i2Djxccwio2'),
	(4, 'asma', 'asma@gmail.com', '$2y$10$tRPTCXPkhnOiVQ3fHHO1g.bPCqME.X6qWsR8hCY1gzsuevjdDGoRu'),
	(5, 'ilyes', 'ilyes@exemple.com', '$2y$10$.nwsvH0DjGzvK2NTVTSt7u.ekkuNfMfesPjc0rD/F7A3Iq/rmAZlC'),
	(6, 'kew', 'kew@exemple.com', '$2y$10$D7nDSNWIMLI1YQ/tMykPC.Yvf7RI5b03MzRfJb3FeuEVlrL6v2IQu');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
