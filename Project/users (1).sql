-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 03:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udtechcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `role` enum('admin','user','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `password`, `position`, `department`, `role`) VALUES
('1234', '1234', '$2y$10$7u2JmUKHkZQVnnC022JF8ukK13/po/wgVT8U13lsuU3x3dhV9aSxS', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'user'),
('12345678910', 'นายศิริณรงค์ เรืองศักดิ์', '$2y$10$12hbQZS72MVyVhlG7YJyceqrjcWo.VQ8e3vqtPdTYd/hLQsAmhTbq', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'user'),
('66309010025', 'นายศิริณรงค์ เรืองศักดิ์', '$2y$10$DZDarDLkNIb7eRfJFw4nXeNpvyDhLrBsSqZQUSm/1i9gdewfitvP.', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'admin'),
('66309010046', 'นายอธิป คำตั้งหน้า', '$2y$10$EQKt7mdhblHurAO55cIrxuZos4nyqLm61bKtgXSHF5OJaojGYGwxa', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'admin'),
('66309010099', 'นายศิริณรงค์ เรืองศักดิ์', '$2y$10$DibGrXKYW/NBfjuiMQW9zu8lSw7qOVOpNrcPdShXcFUbPkth.vtri', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
