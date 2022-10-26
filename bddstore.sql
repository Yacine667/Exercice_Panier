-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour store
CREATE DATABASE IF NOT EXISTS `store` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `store`;

-- Listage de la structure de la table store. product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `available` tinyint(1) DEFAULT '1',
  `stock` int(11) DEFAULT NULL,
  `uniqueOrder` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table store.product : ~6 rows (environ)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `available`, `stock`, `uniqueOrder`) VALUES
	(26, 'Megadrive', 'Une console Sega', 50, NULL, 1, NULL, 0),
	(27, 'Commodore 64', 'qsdfhj', 25, NULL, 1, NULL, 0),
	(28, 'Megadrive2', 'fzfzgr', 25, NULL, 1, NULL, 0),
	(29, 'Super Nintendo', 'Trop bien !', 109.99, NULL, 1, NULL, 0),
	(30, 'GameBoy', 'Console potable !', 25, NULL, 1, NULL, 0),
	(31, 'VirtualBoy', 'Punaise !', 1450, NULL, 1, NULL, 0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
