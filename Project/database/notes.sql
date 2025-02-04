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
(21, 'UDTC20250204001', '', '2025-02-04 08:21:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
