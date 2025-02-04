-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2025 at 09:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `role` enum('admin','user','') NOT NULL,
  `profile_picture` varchar(255) DEFAULT 'default_images_account.jpg',
  `signature` varchar(255) DEFAULT 'default_images_signature.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `password`, `position`, `department`, `role`, `profile_picture`, `signature`) VALUES
('1234', 'นายอธิป คำตั้งหน้า', '$2y$10$XAZ3ha55SMkgpbdEHMtGSOnZuyHUCZJ7mS/5Xv331/ZqU2u8WGQ2q', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'user', '1234.gif', '1234.png'),
('12345', 'นายศิริณรงค์ เรืองศักดิ์', '$2y$10$62Co0ZCUdadYFrEZSz3UuOZJsimSUgCJ/DcfklndAJoowUCccLHDa', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'admin', 'default_images_account.jpg', 'default_images_signature.png'),
('66309010025', 'นายศิริณรงค์ เรืองศักดิ์', '$2y$10$.666nftJpZrx8JwdO9CmkOeeB/2sQL5ZVdDUPp7rruWHjSF0MWrJW', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'user', 'default_images_account.jpg', 'default_images_signature.png');

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
