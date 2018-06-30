-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 07:45 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `userType` int(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `userType`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vaibhav', 'vaibhav@gmail.com', '$2y$10$MYwIOgTSVcB8N4e.Xg0rI.nZTGvN/./9WnF7AzmKA0VxfzfabROTW', 1, 'nG0wbdgtJxP96IFfdJd1dGuxIpNdZyxgY1ldwUiE4fon5y7Lz2aAiddwDqFp', '2018-06-28 04:32:46', '2018-06-29 05:47:19'),
(8, 'saurav1', 'saurav@gmail.com', '$2y$10$MYwIOgTSVcB8N4e.Xg0rI.nZTGvN/./9WnF7AzmKA0VxfzfabROTW', 0, NULL, '2018-06-29 00:24:21', '2018-06-29 01:27:15'),
(9, 'Toy Story 3', 'toy@gmail.com', '$2y$10$MYwIOgTSVcB8N4e.Xg0rI.nZTGvN/./9WnF7AzmKA0VxfzfabROTW', 0, 'SWLEfUnd5golwOhuQ3TKrz9SIpI0TT2HG8AU5fxFNCcn7JQi7fEAsC8zrtWt', '2018-06-29 01:30:40', '2018-06-29 05:13:06'),
(10, 'Toy Story 2', 'toy2@gmail.com', '$2y$10$MYwIOgTSVcB8N4e.Xg0rI.nZTGvN/./9WnF7AzmKA0VxfzfabROTW', 0, NULL, '2018-06-29 01:30:58', '2018-06-29 01:30:58'),
(12, 'bobby', 'bobby@gmail.com', '$2y$10$sHjC7EscImsw5AT3s3ri3.NU/4SiDiOdYfYni8uBFPUMLNPbJzpNy', 0, NULL, '2018-06-29 03:43:26', '2018-06-29 03:43:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
