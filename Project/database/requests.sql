-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 02:34 PM
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
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` varchar(20) NOT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `travel_type` enum('ในจังหวัด','ต่างจังหวัด') DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_time` time DEFAULT NULL,
  `passengers` int(11) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `status` enum('รออนุมัติ','อนุมัติ','ปฏิเสธ') DEFAULT 'รออนุมัติ',
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `destination`, `province`, `travel_type`, `purpose`, `departure_date`, `departure_time`, `return_date`, `return_time`, `passengers`, `request_date`, `status`, `user_id`) VALUES
('UDTC20230101001', 'วิทยาลัยเทคนิคอุดรธานี', 'กระบี่', 'ต่างจังหวัด', 'ไปเรียน', '2025-01-01', '12:23:00', '2025-01-01', '14:23:00', 5, '2025-01-01 20:24:55', 'รออนุมัติ', '1234'),
('UDTC20240101001', 'วิทยาลัยเทคนิคอุดรธานี', 'กรุงเทพมหานคร', 'ต่างจังหวัด', 'ไปเรียน', '2025-01-01', '21:17:00', '2025-01-01', '13:17:00', 4, '2025-01-01 20:23:31', 'รออนุมัติ', '1234'),
('UDTC20240101002', 'วิทยาลัยเทคนิคอุดรธานี', 'กระบี่', 'ต่างจังหวัด', 'ไปเรียน', '2025-01-01', '12:23:00', '2025-01-01', '14:23:00', 5, '2025-01-01 20:23:49', 'รออนุมัติ', '1234'),
('UDTC20240101003', 'วิทยาลัยเทคนิคอุดรธานี', 'กระบี่', 'ต่างจังหวัด', 'ไปเรียน', '2025-01-01', '12:23:00', '2025-01-01', '14:23:00', 5, '2025-01-01 20:24:35', 'รออนุมัติ', '1234'),
('UDTC20250101001', 'วิทยาลัยเทคนิคอุดรธานี', 'กรุงเทพมหานคร', 'ต่างจังหวัด', 'ไปเรียน', '2025-01-01', '19:36:00', '2025-01-01', '20:36:00', 3, '2025-01-01 19:38:20', 'รออนุมัติ', '1234'),
('UDTC20250101002', 'วิทยาลัยเทคนิคอุดรธานี', 'กระบี่', 'ต่างจังหวัด', 'ไปเรียน', '2025-01-01', '21:17:00', '2025-01-01', '13:17:00', 4, '2025-01-01 20:20:53', 'รออนุมัติ', '1234'),
('UDTC20250101003', 'วิทยาลัยเทคนิคอุดรธานี', 'กระบี่', 'ต่างจังหวัด', 'ไปเรียน', '2025-01-01', '21:17:00', '2025-01-01', '13:17:00', 4, '2025-01-01 20:20:58', 'รออนุมัติ', '1234'),
('UDTC20250101004', 'วิทยาลัยเทคนิคอุดรธานี', 'กระบี่', 'ต่างจังหวัด', 'ไปเรียน', '2025-01-01', '21:17:00', '2025-01-01', '13:17:00', 4, '2025-01-01 20:21:12', 'รออนุมัติ', '1234'),
('UDTC20250101005', 'วิทยาลัยเทคนิคอุดรธานี', 'กระบี่', 'ต่างจังหวัด', 'ไปเรียน', '2025-01-01', '21:17:00', '2025-01-01', '13:17:00', 4, '2025-01-01 20:21:15', 'รออนุมัติ', '1234'),
('UDTC20250101006', 'วิทยาลัยเทคนิคอุดรธานี', 'กรุงเทพมหานคร', 'ต่างจังหวัด', 'ไปเรียน', '2025-01-01', '21:17:00', '2025-01-01', '13:17:00', 4, '2025-01-01 20:21:30', 'รออนุมัติ', '1234'),
('UDTC20250101007', 'วิทยาลัยเทคนิคอุดรธานี', 'อุดรธานี', 'ในจังหวัด', 'ไปเรียน', '2025-01-02', '20:30:00', '2025-01-03', '22:30:00', 5, '2025-01-01 20:33:17', 'รออนุมัติ', '1234'),
('UDTC20250101008', 'วิทยาลัยเทคนิคอุดรธานี', 'อุดรธานี', 'ในจังหวัด', 'ไปเรียน', '2025-01-02', '08:30:00', '2025-01-03', '22:30:00', 5, '2025-01-01 20:34:25', 'รออนุมัติ', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
