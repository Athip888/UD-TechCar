-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2025 at 05:11 PM
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
  `status` enum('รออนุมัติ','อนุมัติ','ปฏิเสธ','ยกเลิก') DEFAULT 'รออนุมัติ',
  `user_id` varchar(255) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `admin_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `destination`, `province`, `travel_type`, `purpose`, `departure_date`, `departure_time`, `return_date`, `return_time`, `passengers`, `request_date`, `status`, `user_id`, `driver_id`, `car_id`, `admin_id`) VALUES
('UDTC20250201001', 'ฟกฟหกฟหก', 'กรุงเทพมหานคร', 'ต่างจังหวัด', 'ฟหกฟหกฟหก', '2025-02-01', '16:37:00', '2025-02-01', '17:37:00', 6, '2025-02-01 16:37:34', 'อนุมัติ', '66309010025', 3, 2, '1234'),
('UDTC20250201002', 'ฟหกฟหก', 'กระบี่', 'ต่างจังหวัด', 'ฟหกฟหก', '2025-02-01', '16:57:00', '2025-02-01', '17:37:00', 3, '2025-02-01 16:38:09', 'อนุมัติ', '66309010025', 2, 1, '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_driver` (`driver_id`),
  ADD KEY `fk_car` (`car_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_driver` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`driver_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
