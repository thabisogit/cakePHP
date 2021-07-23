-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 23, 2021 at 03:22 PM
-- Server version: 5.7.31
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nect`
--

-- --------------------------------------------------------

--
-- Table structure for table `learners`
--

DROP TABLE IF EXISTS `learners`;
CREATE TABLE IF NOT EXISTS `learners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_number` varchar(255) COLLATE utf8_bin NOT NULL,
  `dob` date DEFAULT NULL,
  `home_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_bin NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `learners`
--

INSERT INTO `learners` (`id`, `first_name`, `last_name`, `id_number`, `dob`, `home_address`, `contact_number`, `created`, `modified`) VALUES
(2, 'Thabiso0', 'Ngubane', '9203015425086', '2021-07-13', 'Emaqeleni Imbali', '087325552', '2021-07-20 14:49:03', '2021-07-21 11:27:10'),
(3, 'test', 'test surname', '123456789', '2021-07-22', '1231 Imbali Uini', '0215666789', '2021-07-21 17:44:53', '2021-07-21 17:44:53'),
(4, 'Alondwe', 'Ngubane', '20166665552554', '2021-07-16', 'lhudsfhjfhg', '098765445', '2021-07-23 08:29:50', '2021-07-23 08:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `learner_school`
--

DROP TABLE IF EXISTS `learner_school`;
CREATE TABLE IF NOT EXISTS `learner_school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leaner_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `leaner_id` (`leaner_id`),
  KEY `school_id` (`school_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learner_school`
--

INSERT INTO `learner_school` (`id`, `leaner_id`, `school_id`) VALUES
(4, 2, 3),
(5, 2, 3),
(6, 3, 4),
(7, 3, 3),
(8, 3, 3),
(9, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20210721070802, 'CreateTables', '2021-07-21 05:08:38', '2021-07-21 05:08:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`) VALUES
(1, 'KwaZulu - Natal');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `province_id` (`province_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `province_id`, `area`) VALUES
(4, 'Sinamuva', 1, NULL),
(3, 'Pata', 1, 'Msunduzi'),
(5, 'Zibuke', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_history`
--

DROP TABLE IF EXISTS `transfer_history`;
CREATE TABLE IF NOT EXISTS `transfer_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leaner_id` int(11) NOT NULL,
  `from_school_id` int(11) NOT NULL,
  `to_school_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `leaner_id` (`leaner_id`),
  KEY `from_school_id` (`from_school_id`),
  KEY `to_school_id` (`to_school_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_history`
--

INSERT INTO `transfer_history` (`id`, `leaner_id`, `from_school_id`, `to_school_id`) VALUES
(1, 3, 3, 4),
(2, 3, 4, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
