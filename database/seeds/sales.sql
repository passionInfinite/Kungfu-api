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
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `type`, `message`, `date`, `student_id`, `amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Membership', 'Membership Fee', '2018-06-19', 1, 100, NULL, '2018-06-19 06:08:09', '2018-06-19 06:08:09'),
(2, 'Membership', 'Membership fee', '2018-06-19', 2, 100, NULL, '2018-06-19 06:09:18', '2018-06-19 06:09:18'),
(3, 'Membership', 'Membership Fee', '2018-06-19', 3, 100, NULL, '2018-06-19 06:14:19', '2018-06-19 06:14:19'),
(4, 'Membership', 'Membership Fee', '2018-06-19', 4, 100, NULL, '2018-06-19 06:14:41', '2018-06-19 06:14:41'),
(5, 'Membership', 'Membership Fee', '2018-06-19', 5, 100, NULL, '2018-06-19 06:15:02', '2018-06-19 06:15:02'),
(6, 'Membership', 'Membership Fee', '2018-06-19', 6, 100, NULL, '2018-06-19 06:15:23', '2018-06-19 06:15:23'),
(7, 'Membership', 'Membersh', '2018-06-19', 7, 100, NULL, '2018-06-19 06:17:10', '2018-06-19 06:17:10'),
(8, 'Membership', 'Test 1', '2018-06-19', 1, 50, NULL, '2018-06-19 06:41:11', '2018-06-19 06:41:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_student_id_foreign` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
