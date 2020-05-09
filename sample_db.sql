-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2020 at 05:45 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_info`
--

CREATE TABLE `article_info` (
  `article_id` int NOT NULL,
  `article_name` varchar(50) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_info`
--

INSERT INTO `article_info` (`article_id`, `article_name`, `creation_date`, `user_id`) VALUES
(2, 'Final Fantasy VII: everything you need to know', '2020-05-05', 2),
(3, 'Официально: выставка E3 2020 отменена', '2020-05-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `last_reg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `reg_date`, `last_reg_date`) VALUES
(1, 'Tilda', 'Formula@google.com', '2020-05-03', '2020-05-03'),
(2, 'Brian', 'Kuprin@mail.ru', '2020-05-03', '2020-05-03'),
(3, 'Jason', 'Brwse@yahoo.com', '2020-05-06', '2020-05-06'),
(4, 'Bob', 'Kenpac@google.com', '2020-05-09', '2020-05-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_info`
--
ALTER TABLE `article_info`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `article_name` (`article_name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_info`
--
ALTER TABLE `article_info`
  MODIFY `article_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_info`
--
ALTER TABLE `article_info`
  ADD CONSTRAINT `article_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `article_info_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
