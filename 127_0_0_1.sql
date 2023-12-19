-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 05:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qurbani`
--
CREATE DATABASE IF NOT EXISTS `qurbani` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `qurbani`;

-- --------------------------------------------------------

--
-- Table structure for table `bepari`
--

CREATE TABLE `bepari` (
  `bepari_id` int(11) NOT NULL,
  `cow_name` varchar(64) DEFAULT NULL,
  `cow_price` int(11) DEFAULT NULL,
  `cow_image` varchar(64) DEFAULT NULL,
  `contactno` int(11) DEFAULT NULL,
  `b_email` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bepari`
--

INSERT INTO `bepari` (`bepari_id`, `cow_name`, `cow_price`, `cow_image`, `contactno`, `b_email`) VALUES
(1, 'golu', 150000, 'cow_pic/p_4.jpg', 21548441, 'abul@gmail.com'),
(2, 'chulbul', 250000, 'cow_pic/p_5.jpg', 1215656, 'abul@gmail.com'),
(4, 'janu', 350000, 'cow_pic/p9.jpg', 1215656473, 'jaber@gmail'),
(5, 'laluka', 250000, 'cow_pic/p12.jpg', 2147483647, 'abul@gmail.com'),
(6, 'kalluji', 35000, 'cow_pic/p8.jpg', 2147483647, 'abul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `b_email` varchar(64) NOT NULL,
  `b_name` varchar(20) DEFAULT NULL,
  `b_location` varchar(20) DEFAULT NULL,
  `b_pass` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`b_email`, `b_name`, `b_location`, `b_pass`) VALUES
('abul@gmail.com', 'abul', 'gaibandha', 'abul'),
('jaber@gmail', 'jaber', 'chagolbandha', 'jaber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bepari`
--
ALTER TABLE `bepari`
  ADD PRIMARY KEY (`bepari_id`),
  ADD KEY `b_email` (`b_email`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`b_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bepari`
--
ALTER TABLE `bepari`
  MODIFY `bepari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bepari`
--
ALTER TABLE `bepari`
  ADD CONSTRAINT `bepari_ibfk_1` FOREIGN KEY (`b_email`) REFERENCES `register` (`b_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
