-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2018 at 09:29 PM
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
-- Table structure for table `parents_children`
--

CREATE TABLE `parents_children` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `child_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents_children`
--

INSERT INTO `parents_children` (`id`, `parent_id`, `child_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 4, 3, NULL, NULL),
(3, 6, 5, NULL, NULL),
(4, 7, 5, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parents_children`
--
ALTER TABLE `parents_children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parents_children_parent_id_foreign` (`parent_id`),
  ADD KEY `parents_children_child_id_foreign` (`child_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parents_children`
--
ALTER TABLE `parents_children`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parents_children`
--
ALTER TABLE `parents_children`
  ADD CONSTRAINT `parents_children_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parents_children_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
