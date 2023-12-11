-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2023 at 03:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timeo`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `ID_Detail` int(11) NOT NULL,
  `det_Nom_Du_Serveur` varchar(50) NOT NULL,
  `det_Adresse_Ip_Du_Serveur` varchar(50) NOT NULL,
  `det_Image_Du_Serveur` varchar(50) DEFAULT NULL,
  `det_Description_Du_Serveur` varchar(255) DEFAULT NULL,
  `det_version` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`ID_Detail`, `det_Nom_Du_Serveur`, `det_Adresse_Ip_Du_Serveur`, `det_Image_Du_Serveur`, `det_Description_Du_Serveur`, `det_version`) VALUES
(104, 'azertytrez', 'zertrez', 'uploads/20231205_133524.jpg', 'zertrezz', ''),
(105, 'cv c', 'c dvc dv', 'uploads/téléchargement.jpg', 'cvc vdc  ', NULL),
(106, 'éa\"zerfgazerfg', 'ezrf', 'uploads/20231205_133524.jpg', 'aezr', NULL),
(107, 'sdxcfvb', 'q<swdcv', 'uploads/téléchargement.jpg', 'swdxcvb', NULL),
(108, 'qSDFCVB', 'QDSF', 'uploads/téléchargement.jpg', 'QSDFG', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `ID_Tag` int(11) NOT NULL,
  `Tag_Nom_du_tag` varchar(50) NOT NULL,
  `serveur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`ID_Tag`, `Tag_Nom_du_tag`, `serveur_id`) VALUES
(177, 'Crack', 104),
(178, 'Prenium', 104),
(179, 'Version.1.15', 104),
(180, 'Prenium', 105),
(181, 'Mini_jeux', 105),
(182, 'Plot_Build', 105),
(183, 'SMP', 105),
(184, 'Version.1.16', 105),
(185, 'Version.1.17', 105),
(186, 'Prenium', 106),
(187, 'Rp', 106),
(188, 'Version.1.16', 106),
(189, 'Mini_jeux', 107),
(190, 'Version.1.15', 107),
(191, 'Version.1.16', 107),
(192, 'Semi_Rp', 108),
(193, 'Mini_jeux', 108),
(194, 'Version.1.17', 108),
(195, 'Version.1.18', 108);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`ID_Detail`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`ID_Tag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `ID_Detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `ID_Tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
