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
-- Table structure for table `progresses`
--

CREATE TABLE `progresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `from_rank_id` int(10) UNSIGNED NOT NULL,
  `to_rank_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progresses`
--

INSERT INTO `progresses` (`id`, `student_id`, `from_rank_id`, `to_rank_id`, `date`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 4, '2018-06-19', '2018-06-19 06:34:27', '2018-06-19 06:34:27'),
(6, 1, 4, 6, '2018-06-19', '2018-06-19 06:34:39', '2018-06-19 06:34:39'),
(7, 1, 6, 14, '2018-06-19', '2018-06-19 06:34:57', '2018-06-19 06:34:57'),
(8, 1, 14, 15, '2018-06-19', '2018-06-19 06:35:08', '2018-06-19 06:35:08'),
(9, 1, 15, 16, '2018-06-19', '2018-06-19 06:35:16', '2018-06-19 06:35:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `progresses`
--
ALTER TABLE `progresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `progresses_student_id_foreign` (`student_id`),
  ADD KEY `progresses_from_rank_id_foreign` (`from_rank_id`),
  ADD KEY `progresses_to_rank_id_foreign` (`to_rank_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `progresses`
--
ALTER TABLE `progresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `progresses`
--
ALTER TABLE `progresses`
  ADD CONSTRAINT `progresses_from_rank_id_foreign` FOREIGN KEY (`from_rank_id`) REFERENCES `ranks` (`id`),
  ADD CONSTRAINT `progresses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `progresses_to_rank_id_foreign` FOREIGN KEY (`to_rank_id`) REFERENCES `ranks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
