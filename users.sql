-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2023 at 01:45 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20552514_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lvl` int(11) NOT NULL DEFAULT 1,
  `firstName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `lvl`, `firstName`, `lastName`, `email`, `password`, `created_at`) VALUES
(8, 'testing', 5, 'Jack', 'Lanphear', 'newfoundlandknight@gmail.com', '$2y$10$Q9FL92HIQfQxDyQI8cix5eQ.fzIFXd8qtVrPSUhNNhCQ5NIg3M/rS', '2023-04-06 14:27:21'),
(10, 'witnit', 5, 'David', 'Bowie', 'Ziggy@stardust.com', '$2y$10$PSalGn5oQgu5QfkfwaKaNO7gpFTIf0ELj6IUnND7t5B8/U9UZFGL.', '2023-04-08 16:42:48'),
(11, 'q', 1, 'Jack', 'Lanphear', 'newfoundlandknight@gmail.com', '$2y$10$7HazC9glkk5VbYDJic19quoiFL/An1NjFDYQtt7DPgt4YBhnZ35y6', '2023-05-13 22:48:34'),
(12, 'user', 1, 'regular', 'user', 'regular.user@gmail.com', '$2y$10$VAi5kOflLI6pTLbttOFfWeq/6vzLg2YHrL1zNdI7/X69Vqq7pQsu.', '2023-05-14 17:59:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
