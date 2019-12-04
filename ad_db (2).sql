-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2019 at 02:42 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ad_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

DROP TABLE IF EXISTS `advertisement`;
CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `type` int(11) NOT NULL,
  `cena` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `user_id`, `description`, `type`, `cena`) VALUES
(1, 3, 'FUCK YOU', 1, 20),
(2, 3, 'Great book for intelectuals', 1, 2000),
(3, 5, 'sfomkvks', 1, 12),
(9, 7, '1111', 1, 1),
(10, 7, 'TUPO HOROR', 1, 100),
(12, 7, 'Dedok', 3, 1),
(13, 7, 'MOSNAJA', 2, 1),
(18, 7, 'MASHINKA', 2, 100),
(19, 7, 'Dlya mazorov', 3, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `ad_books`
--

DROP TABLE IF EXISTS `ad_books`;
CREATE TABLE IF NOT EXISTS `ad_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `page_count` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_id` (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_books`
--

INSERT INTO `ad_books` (`id`, `name`, `author`, `page_count`, `ad_id`) VALUES
(1, '1984', 'Dzordz Oruels', 900, 1),
(2, '1984', 'Dzordz Oruels', 1233, 2),
(3, 'akamfkpamckp', 'pa,pcl,aopc,apo', 1234567890, 3),
(4, '1', '1', 1, 9),
(5, 'MYSQL documentation', 'GENIJ', 666, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ad_car`
--

DROP TABLE IF EXISTS `ad_car`;
CREATE TABLE IF NOT EXISTS `ad_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `release_year` year(4) NOT NULL,
  `mileage` int(11) NOT NULL,
  `car_mark` varchar(30) NOT NULL,
  `car_model` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_id` (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_car`
--

INSERT INTO `ad_car` (`id`, `ad_id`, `release_year`, `mileage`, `car_mark`, `car_model`) VALUES
(1, 13, 1990, 10000, 'Ziga', 'SOVETSKAJA'),
(2, 18, 2010, 100101010, 'BMW', 'x5');

-- --------------------------------------------------------

--
-- Table structure for table `ad_phones`
--

DROP TABLE IF EXISTS `ad_phones`;
CREATE TABLE IF NOT EXISTS `ad_phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `release_year` year(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_id` (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_phones`
--

INSERT INTO `ad_phones` (`id`, `ad_id`, `brand`, `model`, `release_year`) VALUES
(1, 12, 'Nokia', '3310', 1995),
(2, 19, 'Apple', 'Iphone 11 max', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `ad_type`
--

DROP TABLE IF EXISTS `ad_type`;
CREATE TABLE IF NOT EXISTS `ad_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_type`
--

INSERT INTO `ad_type` (`id`, `name`) VALUES
(1, 'books'),
(2, 'cars'),
(3, 'phones');

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

DROP TABLE IF EXISTS `galery`;
CREATE TABLE IF NOT EXISTS `galery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `img_link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_id` (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galery`
--

INSERT INTO `galery` (`id`, `ad_id`, `img_link`) VALUES
(1, 19, 'https://www.euronics.lv/UserFiles/Products/Images/232330-354094-medium.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `phone`, `password`) VALUES
(3, 'tejlor25@gmail.com', 'Hokkly', '12345678', '0c551e1bc889ade3fc85e20f147d87ac'),
(5, 'a@a.a', 'sergej', '202020202', '22d448ec971da6eb462346122cfe66c6'),
(7, '4@4.4', '1234', 'SASUNG', '0af3697ce22959b8e86c38c894a0d6c9');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `advertisement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `advertisement_ibfk_2` FOREIGN KEY (`type`) REFERENCES `ad_type` (`id`);

--
-- Constraints for table `ad_books`
--
ALTER TABLE `ad_books`
  ADD CONSTRAINT `ad_books_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `advertisement` (`id`);

--
-- Constraints for table `ad_car`
--
ALTER TABLE `ad_car`
  ADD CONSTRAINT `ad_car_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `advertisement` (`id`);

--
-- Constraints for table `ad_phones`
--
ALTER TABLE `ad_phones`
  ADD CONSTRAINT `ad_phones_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `advertisement` (`id`);

--
-- Constraints for table `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `advertisement` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
