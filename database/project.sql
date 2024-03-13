-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2024 at 02:05 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `auther_name` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `auther_name`, `price`, `quantity`, `image`) VALUES
(91, 5, 'adani', 'prit', 200, 2, 'adani.jpg'),
(93, 5, 'sidhu', 'prit', 277777, 1, 'sidhu.jpg'),
(94, 5, 'shark', 'deep', 3030, 1, 'shark.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact-us`
--

DROP TABLE IF EXISTS `contact-us`;
CREATE TABLE IF NOT EXISTS `contact-us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact-us`
--

INSERT INTO `contact-us` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(15, 5, 'prit', 'p@gmail.com', '232323', 'dfsf\r\n'),
(16, 5, 'prit22', 'prit55@gmail.com', '121', 'hello ji jese ho\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `image` varchar(100) NOT NULL,
  `auther_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `auther_name`) VALUES
(1, 'sidhu', 277777, 'sidhu.jpg', 'prit'),
(10, 'adani', 200, 'adani.jpg', 'prit'),
(12, 'shark', 3030, 'shark.jpg', 'deep'),
(13, 'ffff', 3000, 'kher.jpg', 'deep'),
(14, 'ss', 200, 'darknet.jpg', 'deep'),
(15, 'bbb', 3030, 'shattered.jpg', 'prit'),
(19, 'lloyd', 300, 'lloyd.jpg', 'prit'),
(20, 'holy_ghosts', 3000, 'holy_ghosts.jpg', 'deep');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ph_no` varchar(15) NOT NULL,
  `usertype` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ph_no` (`ph_no`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `ph_no`, `usertype`) VALUES
(1, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '1112223334', 'admin'),
(2, 'prit', 'pritpatel@gmail.com', 'a7becfc3b9343c012c0c9b2a81969bb0', '295295295', 'user'),
(5, 'prit', 'p@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '12121211', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
