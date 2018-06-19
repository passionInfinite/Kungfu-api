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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrolled` tinyint(1) NOT NULL,
  `rank_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `birthday`, `mobile_no`, `email`, `relation`, `address`, `enrolled`, `rank_id`, `created_at`, `updated_at`) VALUES
(1, 'Hardik Patel', '1995-07-01', '5199912435', 'patel1re@uwindsor.ca', NULL, '687 Bridge Avenue, Windsor, ON. N9B2M5', 1, 16, '2018-05-14 21:31:22', '2018-06-19 06:35:16'),
(2, 'Sureshbhai Patel', '1965-09-24', '9904221357', 'skpatel@gmail.com', 'Father', '687 Bridge Avenue, Windsor, ON. N9B2M5', 1, 1, '2018-05-14 21:31:22', '2018-06-19 21:09:05'),
(3, 'Parth Patel', '1994-07-24', '2269614774', 'parth7676@gmail.com', NULL, '679 Partington Avenue', 1, 1, '2018-06-19 04:17:00', '2018-06-19 04:17:00'),
(4, 'Jashoda Patel', NULL, '9409584691', 'jashoda7676@gmail.com', 'Mother', '679 Partington Avenue', 0, 1, '2018-06-19 04:17:00', '2018-06-19 04:17:00'),
(5, 'Harita Cocha', '1993-11-07', '6478338542', 'harita.chocha@gmail.com', NULL, 'Sandwich street', 1, 1, '2018-06-19 04:22:07', '2018-06-19 04:22:07'),
(6, 'RanjendraKumar Cocha', NULL, '9979408841', 'rajendra.chocha@gmail.com', 'Father', 'Sandwich street', 1, 1, '2018-06-19 04:22:07', '2018-06-19 04:22:07'),
(7, 'Pravinaben', NULL, '9426626131', 'pravina.chocha@gmail.com', 'Mother', 'Sandwich street', 1, 1, '2018-06-19 04:22:07', '2018-06-19 04:22:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_id_unique` (`id`),
  ADD UNIQUE KEY `students_mobile_no_unique` (`mobile_no`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_rank_id_foreign` (`rank_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_rank_id_foreign` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
