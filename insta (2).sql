-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 05:19 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insta`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grams`
--

CREATE TABLE `grams` (
  `user_id` int(255) NOT NULL,
  `MNE` varchar(500) NOT NULL,
  `fname` varchar(500) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `Uname` varchar(500) NOT NULL,
  `Pass` varchar(500) NOT NULL,
  `Pimage` varchar(500) NOT NULL DEFAULT 'images/pimage.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grams`
--

INSERT INTO `grams` (`user_id`, `MNE`, `fname`, `active`, `Uname`, `Pass`, `Pimage`) VALUES
(4, 'as', 'asd', 0, 'a', '0cc175b9c0f1b6a831c399e269772661', 'images/17-06-2018-1529246790-qwe.jpg'),
(5, 'asd', 'dsd', 0, 'sf', '751d023ac5dca3ef03d26db83de3ca14', 'images/pimage.png'),
(6, 'asdasd', 'asd', 0, 'hey', '0cc175b9c0f1b6a831c399e269772661', 'images/pimage.png'),
(7, 'asdasd', 'asd', 0, 'as', '0cc175b9c0f1b6a831c399e269772661', 'images/pimage.png'),
(8, 'dsa', 'asd', 1, 'da', '5ca2aa845c8cd5ace6b016841f100d82', 'images/pimage.png'),
(9, '12345', 'jaycel alarcon', 1, 'jayceehere', '202cb962ac59075b964b07152d234b70', 'images/pimage.png'),
(10, 'try', 'heysample', 1, 'as', '080f651e3fcca17df3a47c2cecfcb880', 'images/pimage.png'),
(11, 'atmagpantay@gmail.com', 'Abraham Magpantay', 1, 'atmagpantay', '93279e3308bdbbeed946fc965017f67a', 'images/pimage.png'),
(12, 'atmagpantay@gmail.com', 'Ian Howell Yangco', 1, 'atmagpantay', '93279e3308bdbbeed946fc965017f67a', 'images/pimage.png');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(20) NOT NULL,
  `image` varchar(500) NOT NULL,
  `image_text` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `image_text`, `user_id`) VALUES
(1, 'back.jpg', 'asda', 0),
(2, 'back.jpg', 'asdas', 0),
(3, 'Untitled-2.jpg', 'adasadf', 0),
(4, 'images.png', 'asdafsa', 0),
(5, 'back.jpg', 'asdads', 0),
(6, 'back.jpg', 'asd', 0),
(7, 'back.jpg', 'ad', 0),
(8, 'images.png', 'sad', 0),
(9, '', '', 0),
(10, 'back.jpg', 'asd', 0),
(11, '2017-Honda-Civic-Sedan.png', 'try', 0),
(12, '2017-Honda-Civic-Sedan.png', 'here\r\n', 0),
(13, 'images.png', '', 0),
(14, '35077207_174296269897900_7542240851297042432_n.png', 'lksflkds', 0),
(15, '35077207_174296269897900_7542240851297042432_n.png', 'lksflkds', 0),
(16, 'pimage.png', 'adsfasdfdsf', 0),
(17, 'pimage.png', 'adsfasdfdsf', 0),
(18, '02-07-2018-1530527463-02-07-2018-1530527360-11-06-2018-1528741262-cliffhanger.png', 'MIGGY ', 4),
(19, '02-07-2018-1530527690-17-06-2018-1529242736-himura_kenshin_de_gozaru_by_kagesatsuki-d7ysj8d.jpg', 'Mrs. Militante', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grams`
--
ALTER TABLE `grams`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grams`
--
ALTER TABLE `grams`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
