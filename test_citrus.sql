-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 02:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_citrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '7a567f9ea5ec2fc13c4f557ef593dbd1b2381d90f449ceffa24f4375fc5516342e1878fe49cc9adeaf702d7897f88dfa');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `isApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `email`, `name`, `comment`, `isApproved`) VALUES
(1, 'meil@gmail.com', 'person 1', 'Great comapany', 1),
(2, 'meil2@gmail.com', 'grumpy', 'Hate everything.', 0),
(4, 'alekp111@gmail.com', 'Alek', 'Komentar :)', 1),
(5, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'Komentar 2', 1),
(6, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'Komentar 3', 1),
(7, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'ewdsqwdwdwed', 0),
(9, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'wdwqdwqdwqdwq', 0),
(10, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'ewfewfefe', 1),
(12, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'dfdfdsfd', 1),
(13, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'Komentar', 1),
(14, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'New comment', 0),
(15, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'uggggg', 0),
(16, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'bfbgfbgb', 0),
(17, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'dwdwedewd', 0),
(18, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'ewefewfef', 0),
(19, 'alekp111@gmail.com', 'Aleksandar Petrovic', 'ffdfd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `title`, `description`) VALUES
(1, 'images\\citrus.jpg', 'Citrus 1', 'Description 1'),
(2, 'images\\citrus.jpg', 'Citrus 2', 'Description 2'),
(3, 'images\\citrus.jpg', 'Ctrus 3', 'Description 3'),
(4, 'images\\citrus.jpg', 'Citrus 4', 'Description 4'),
(5, 'images\\citrus.jpg', 'Citrus 5', 'Description 5'),
(6, 'images\\citrus.jpg', 'Citrus 6', 'Description 6'),
(7, 'images\\citrus.jpg', 'Citrus 7', 'Description 7'),
(8, 'images\\citrus.jpg', 'Citrus 8 ', 'Description 8'),
(9, 'images\\citrus.jpg', 'Citrus 9', 'Description 9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
