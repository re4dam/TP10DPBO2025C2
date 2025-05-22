CREATE DATABASE IF NOT EXISTS db_jodoh;
USE db_jodoh;

--
-- Table structure for table `degenerate`
--

DROP TABLE IF EXISTS `degenerate`;
CREATE TABLE `degenerate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degenerate`
--

LOCK TABLES `degenerate` WRITE;
INSERT INTO `degenerate` VALUES
(3,'Muhammad Fathan',200,100,'Laki-laki'),
(4,'Ningsih',160,60,'Perempuan'),
(5,'Zaki Adam',170,65,'Laki-laki');
UNLOCK TABLES;

--
-- Table structure for table `haluan`
--

DROP TABLE IF EXISTS `haluan`;
CREATE TABLE `haluan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `stereotipe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `haluan`
--

LOCK TABLES `haluan` WRITE;
INSERT INTO `haluan` VALUES
(3,'IJN Atago','Azur Lane','Perempuan','Onee san'),
(4,'Arataki Itto','Genshin Impact','Laki-laki','Oni Oni'),
(5,'HMS Belfast','Azur Lane','Perempuan','Head Maid'),
(6,'USS New Jersey','Azur Lane','Perempuan','Idol'),
(7,'Minamoto No Raikou','Fate Grand Order','Perempuan','Mommy');
UNLOCK TABLES;

--
-- Table structure for table `jodoh`
--

DROP TABLE IF EXISTS `jodoh`;
CREATE TABLE `jodoh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_degenerate` int(11) NOT NULL,
  `id_haluan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_degenerate` (`id_degenerate`),
  KEY `id_haluan` (`id_haluan`),
  CONSTRAINT `jodoh_ibfk_1` FOREIGN KEY (`id_degenerate`) REFERENCES `degenerate` (`id`),
  CONSTRAINT `jodoh_ibfk_2` FOREIGN KEY (`id_haluan`) REFERENCES `haluan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jodoh`
--

LOCK TABLES `jodoh` WRITE;
INSERT INTO `jodoh` VALUES
(4,4,4),
(5,3,3),
(6,5,6),
(7,5,7);
UNLOCK TABLES;
