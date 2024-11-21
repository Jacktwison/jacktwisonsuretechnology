-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 07:47 AM
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
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'PACIFIQUE MUTABAZI', 'pacificmutabazi@gmail.com', '$2y$10$PlnxD.vmQyXREZhKnoeDx.OwzI0mrj9Xdidhz7f25tJDxE0eZc9/G', ''),
(2, 'MUTABAZI', 'webgenius834@gmail.com', '$2y$10$269M3ruGJbginpENTenbsu3bX5xt9iSwzOXxDrGT6cgOZWmdcQPwy', ''),
(3, 'MUTABAZI', 'webgenius834@gmail.com', '$2y$10$Tu3fXoV0bV/rIA8xkagpUOS4g2VTp46RgfIxhEbx.ina490YhoArW', ''),
(4, 'PACIFIQUE MUTABAZI', 'pacificmutabazi@gmail.com', '$2y$10$CvV6n2k0HRaJhYwS/OWbW.q8LUUQt5zf.axSbSp77qWhy7H1F7dT6', ''),
(5, 'MUTABAZI', 'pacificmutabazi@gmail.com', '$2y$10$e2Yh/rPfM2CiDLXyBDEAiepGFrTEyyV4D2iAj5S0swupqEFM5rg2a', 'admin'),
(6, 'PETER', 'sande@gmail.com', '$2y$10$yjWmryu4cvqR.ZrOiw5S.OfXENFwaf2VSWbk2eHX3vlge2jS1VgU2', 'admin'),
(7, 'TUYIZERE', 'admin@gmail.com', '$2y$10$sGD1pwGm31hozX652R//K.5/7dv5rSc5Lsvx8LzlwFnMll6nRIKL6', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
