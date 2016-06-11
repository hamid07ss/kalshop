-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2016 at 10:53 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kal`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(100) NOT NULL AUTO_INCREMENT,
  `un` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `up` varchar(40) COLLATE utf8_persian_ci NOT NULL,
  `ue` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `ui` varchar(1000) COLLATE utf8_persian_ci NOT NULL DEFAULT 'image.jpg',
  `ut` int(10) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`uid`),
  UNIQUE KEY `un` (`un`),
  UNIQUE KEY `ue` (`ue`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `un`, `up`, `ue`, `ui`, `ut`) VALUES
(1, 'hamid07', 'farhad07ss', 'hamid.sarani@yahoo.com', 'image.jpg', 1),
(9, 'hamid07sasasasa', 'farhad07ss', 'h.sarani75@gmail.comsasasasa', 'image.jpg', 0),
(8, 'hamid07sasasa', 'farhad07ss', 'h.sarani75@gmail.comsasasa', 'image.jpg', 0),
(10, 'hamid07fd', 'farhad07ss', 'h.sarani75@gmail.comfd', 'image.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
