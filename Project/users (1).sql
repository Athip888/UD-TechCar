-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 04:38 PM
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
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `role` enum('admin','user','') NOT NULL,
  `prefix` enum('นาย','นาง','นางสาว','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `password`, `position`, `department`, `role`, `prefix`) VALUES
('12345678910', 'sssss', 'sssss', '$2y$10$12hbQZS72MVyVhlG7YJyceqrjcWo.VQ8e3vqtPdTYd/hLQsAmhTbq', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'user', 'นาย'),
('66309010025', 'ศิริณรงค์', 'เรืองศักดิ์', '$2y$10$DZDarDLkNIb7eRfJFw4nXeNpvyDhLrBsSqZQUSm/1i9gdewfitvP.', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'admin', 'นาย'),
('66309010046', 'อธิป', 'คำตั้งหน้า', '$2y$10$SHjBBkwHEYh4exAcEvcU0u17GR4nL9moEZbz0G4bvDf3NSraSHiVu', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'user', 'นาย');

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
