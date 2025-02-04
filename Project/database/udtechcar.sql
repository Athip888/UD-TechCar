-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 03:36 PM
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
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `plate_number` varchar(15) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `car_type` varchar(30) NOT NULL,
  `province` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `car_pic` varchar(255) DEFAULT 'default_images_car.png',
  `seats` int(11) NOT NULL,
  `status` enum('ใช้ได้ปกติ','ยกเลิกการใช้งาน','บำรุงรักษา') DEFAULT 'ใช้ได้ปกติ',
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `plate_number`, `brand`, `model`, `car_type`, `province`, `color`, `car_pic`, `seats`, `status`, `create_date`, `update_date`) VALUES
(1, 'กข-1234', 'Toyota', 'Corolla', 'รถเก๋ง', 'กรุงเทพมหานคร', 'สีทอง', 'car_1.jfif', 6, 'ใช้ได้ปกติ', '2025-01-27 05:18:08', '2025-02-03 01:58:54'),
(2, 'ขก-5678', 'Honda', 'Civic', 'รถเก๋ง', 'เชียงใหม่', 'สีขาว', 'car_2.jfif', 5, 'ใช้ได้ปกติ', '2025-01-27 05:18:08', '2025-02-02 16:25:26'),
(14, '', 'กดเกดเกด', 'กดเกดเ', 'กดเกดเ', 'กรุงเทพมหานคร', 'กดเกดเ', 'default_images_car.png', 5, 'ใช้ได้ปกติ', '2025-02-03 02:01:19', '2025-02-03 02:01:19'),
(15, 'กดเกดเ', 'กดกดเกดดด', 'กดเกดเ', 'กดเกดเกเ', 'กรุงเทพมหานคร', 'กดเกดเ', 'default_images_car.png', 6, 'ใช้ได้ปกติ', '2025-02-03 02:01:19', '2025-02-03 02:01:19'),
(16, 'หกดหกดหหหหห', 'หกดหกดหกด', 'หดกหดกห', 'ดหกดหด', 'กระบี่', 'กดหกด', 'default_images_car.png', 5, 'ใช้ได้ปกติ', '2025-02-03 02:01:19', '2025-02-03 02:01:19'),
(17, 'าาาาาาาาาาาาาาา', '่่เ้่เ้่', 'เ้่เ้่', 'เ้่เ้่', 'กรุงเทพมหานคร', '้้้่เ่่่เเเเ', 'default_images_car.png', 6, 'ใช้ได้ปกติ', '2025-02-03 02:01:19', '2025-02-03 02:01:19'),
(18, 'ฟหกหฟหหห', 'ฟหกฟกฟกฟฟ', 'หกฟหกฟ', 'กฟหกฟ', 'อุดรธานี', 'ฟหกฟหก', 'default_images_car.png', 6, 'ใช้ได้ปกติ', '2025-02-03 02:04:39', '2025-02-03 02:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `work_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `name`, `phone_number`, `work_date`) VALUES
(2, 'นายสมชาย ทองหล่อ', '0812345678', '2025-01-27'),
(3, 'นางสมหญิง สกิบิดี้', '0912345678', '2025-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `request_id` varchar(20) DEFAULT NULL,
  `note_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `request_id`, `note_text`, `created_at`) VALUES
(2, 'asdasd', 'asdasdasd', '2025-02-01 09:14:46'),
(3, 'UDTC20250201003', 'asdas', '2025-02-01 09:26:31'),
(4, 'UDTC20250201002', '', '2025-02-01 09:40:22'),
(5, 'UDTC20250201001', '99', '2025-02-01 09:40:40'),
(6, 'UDTC20250201001', '', '2025-02-01 09:40:40'),
(7, 'UDTC20250201001', '', '0000-00-00 00:00:00'),
(8, 'UDTC20250201001', '', '2025-02-01 10:37:15'),
(9, 'UDTC20250201002', 'asdasd', '2025-02-01 10:41:50'),
(10, 'UDTC20250201002', 'asdasd', '2025-02-01 10:42:06'),
(11, 'UDTC20250201002', 'asdasd', '2025-02-01 10:42:42'),
(12, 'UDTC20250201002', 'asdasd', '2025-02-01 10:42:44'),
(13, 'UDTC20250201002', 'asdasd', '2025-02-01 10:45:57'),
(14, 'UDTC20250201002', 'asdasd', '2025-02-01 10:45:59'),
(15, 'UDTC20250201002', 'asdasd', '2025-02-01 10:50:34'),
(16, 'UDTC20250201002', 'asdasd', '2025-02-01 11:02:32'),
(17, 'UDTC20250201002', '99999', '2025-02-01 11:02:43'),
(18, 'UDTC20250201002', 'kkkk', '2025-02-01 11:03:31'),
(19, 'UDTC20250201002', '999', '2025-02-01 11:10:36'),
(20, 'UDTC20250201002', '', '2025-02-01 15:59:28'),
(21, 'UDTC20250202002', '', '2025-02-02 05:54:23'),
(22, 'UDTC20250202001', '', '2025-02-02 08:38:43'),
(23, 'UDTC20250202001', '', '2025-02-02 08:38:53'),
(24, 'UDTC20250203001', '', '2025-02-03 04:47:11');

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
('UDTC20250201002', 'ฟหกฟหก', 'กระบี่', 'ต่างจังหวัด', 'ฟหกฟหก', '2025-02-01', '16:57:00', '2025-02-01', '17:37:00', 3, '2025-02-01 16:38:09', 'อนุมัติ', '66309010025', 2, 1, '1234'),
('UDTC20250202001', 'ฟหดหก', 'กระบี่', 'ต่างจังหวัด', 'ดหกหกหก', '2025-02-02', '12:39:00', '2025-02-03', '12:40:00', 5, '2025-02-02 12:39:21', 'ปฏิเสธ', '66309010025', NULL, NULL, '1234'),
('UDTC20250202002', 'add', 'กรุงเทพมหานคร', 'ต่างจังหวัด', 'adad', '2025-02-02', '12:40:00', '2025-02-02', '12:40:00', 5, '2025-02-02 12:40:56', 'อนุมัติ', '66309010025', 2, 1, '1234'),
('UDTC20250202003', 'กดกดกด', 'กรุงเทพมหานคร', 'ต่างจังหวัด', 'กดกดกด', '2025-02-03', '01:38:00', '2025-02-03', '02:38:00', 3, '2025-02-03 01:38:42', 'รออนุมัติ', '66309010025', NULL, NULL, NULL),
('UDTC20250203001', 'วิทยาลัยเทคนิคเลย', 'เลย', 'ต่างจังหวัด', 'ไปศึกษาดูงาน', '2025-02-03', '09:19:00', '2025-02-03', '09:21:00', 6, '2025-02-03 09:19:42', 'อนุมัติ', '66309010025', 3, 2, '1234');

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
('1234', 'นายศิริณรงค์ เรืองศักดิ์', '$2y$10$XAZ3ha55SMkgpbdEHMtGSOnZuyHUCZJ7mS/5Xv331/ZqU2u8WGQ2q', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'admin', '1234.gif', '1234.png'),
('66309010025', 'นายศิริณรงค์ เรืองศักดิ์', '$2y$10$NoE.3SY8U7se56beREAE5eF6JFlGrpnmHqE5cRw1TEYeqGiz4Cc0m', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'user', 'default_images_account.jpg', 'default_images_signature.png'),
('66309010046', 'นายอธิป คำตั้งหน้า', '$2y$10$U3RIo8z04VIQckx3D5gIk.XJEG1XOAmZHZynN4OZJiI/wVQfYAoIC', 'นักศึกษา', 'เทคโนโลยีสารสนเทศ', 'admin', 'default_images_account.jpg', 'default_images_signature.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
