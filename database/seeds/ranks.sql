-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2018 at 09:30 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kungfu_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `belt_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `level_id`, `belt_color`, `created_at`, `updated_at`) VALUES
(1, 1, 'white', '2018-05-14 21:31:06', '2018-05-14 21:31:06'),
(4, 1, 'yellow', '2018-06-19 03:51:25', '2018-06-19 03:51:25'),
(6, 1, 'halfgreen', '2018-06-19 03:53:23', '2018-06-19 03:57:29'),
(14, 2, 'green', '2018-06-19 06:32:38', '2018-06-19 06:32:38'),
(15, 2, 'halfblue', '2018-06-19 06:32:51', '2018-06-19 06:32:51'),
(16, 2, 'blue', '2018-06-19 06:33:02', '2018-06-19 06:33:02'),
(17, 2, 'halfred', '2018-06-19 06:33:28', '2018-06-19 06:33:28'),
(18, 3, 'red', '2018-06-19 06:33:38', '2018-06-19 06:33:38'),
(19, 3, 'halfblack', '2018-06-19 06:33:49', '2018-06-19 06:33:49'),
(20, 3, 'black', '2018-06-19 06:34:06', '2018-06-19 06:34:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ranks_belt_color_unique` (`belt_color`),
  ADD KEY `ranks_level_id_foreign` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ranks`
--
ALTER TABLE `ranks`
  ADD CONSTRAINT `ranks_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
