-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 07:49 AM
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
-- Database: `fish_feeding_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `sensor_data`
--

CREATE TABLE `sensor_data` (
  `id` int(100) NOT NULL,
  `ph` float NOT NULL,
  `turbidity` float NOT NULL,
  `temperature` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sensor_data`
--

INSERT INTO `sensor_data` (`id`, `ph`, `turbidity`, `temperature`, `timestamp`) VALUES
(1, 0, 0, 0, '2024-11-20 23:32:57'),
(2, 0, 0, 0, '2024-11-20 23:37:40'),
(3, 0, 0, 0, '2024-11-20 23:42:39'),
(4, 0, 0, 0, '2024-11-20 23:42:46'),
(5, 0, 0, 0, '2024-11-20 23:42:48'),
(6, 0, 0, 0, '2024-11-20 23:42:50'),
(7, 0, 0, 0, '2024-11-20 23:42:52'),
(8, 0, 0, 0, '2024-11-20 23:42:53'),
(9, 0, 0, 0, '2024-11-20 23:42:55'),
(10, 0, 0, 0, '2024-11-20 23:43:53'),
(11, 0, 0, 0, '2024-11-20 23:43:55'),
(12, 0, 0, 0, '2024-11-20 23:43:56'),
(13, 0, 0, 0, '2024-11-20 23:44:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sensor_data`
--
ALTER TABLE `sensor_data`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
