-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2023 at 01:43 PM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `first` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `middle` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `last` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `addr_line1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `addr_line2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `postal` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tripId` int(11) NOT NULL,
  `tripName` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `first`, `middle`, `last`, `suffix`, `addr_line1`, `addr_line2`, `city`, `state`, `postal`, `country`, `email`, `area`, `phone`, `tripId`, `tripName`, `created`) VALUES
(1, 'Jack', 'Lee', 'Lanphear', '', '87 pleasant st', '', 'St. john\'s', 'Newfoundland', 'a1a1a1', 'Canada', 'email@screech.com', '709', '690-1280', 3, 'Some trip', '2023-05-12 20:10:11'),
(2, 'Jack', '', 'Lanphear', '', '87 Pleasant St.', '', 'St. John\'s', 'Newfoundland &amp; Labrador', 'A1E 1L5', 'Canada', 'jacklrlanphear@gmail.com', '709', '6901280', 3, 'KEELE RIVER', '2023-05-13 00:28:55'),
(3, 'Jack', 'leeeee', 'Lanphear', 'jr', '87 Pleasant St.', 'apt 2', 'St. John\'s', 'Newfoundland &amp; Labrador', 'A1E 1L5', 'Canada', 'jacklrlanphear@gmail.com', '709', '6901280', 3, 'KEELE RIVER', '2023-05-13 00:50:23'),
(4, 'Jack', 'leeeee', 'Lanphear', 'jr', '87 Pleasant St.', 'apt 2', 'St. John\'s', 'Newfoundland &amp; Labrador', 'A1E 1L5', 'Canada', 'jacklrlanphear@gmail.com', '709', '6901280', 3, 'KEELE RIVER', '2023-05-13 00:53:54'),
(5, 'Jack', 'leeeee', 'Lanphear', 'jr', '87 Pleasant St.', 'apt 2', 'St. John\'s', 'Newfoundland &amp; Labrador', 'A1E 1L5', 'Canada', 'jacklrlanphear@gmail.com', '709', '6901280', 3, 'KEELE RIVER', '2023-05-13 00:59:32'),
(6, 'Jack', 'leeeee', 'Lanphear', 'jr', '87 Pleasant St.', 'apt 2', 'St. John\'s', 'Newfoundland &amp; Labrador', 'A1E 1L5', 'Canada', 'jacklrlanphear@gmail.com', '709', '6901280', 3, 'KEELE RIVER', '2023-05-13 01:03:05'),
(7, 'Jack', 'leeeee', 'Lanphear', 'jr', '87 Pleasant St.', 'apt 2', 'St. John\'s', 'Newfoundland &amp; Labrador', 'A1E 1L5', 'Canada', 'jacklrlanphear@gmail.com', '709', '6901280', 3, 'KEELE RIVER', '2023-05-13 01:05:38'),
(14, 'Jack', '', 'Lanphear', '', '87 Pleasant St.', '', 'St. John\'s', 'Newfoundland &amp; Labrador', 'A1E 1L5', 'Canada', 'jacklrlanphear@gmail.com', '709', '6901280', 6, 'GANDER RIVER', '2023-05-13 01:22:52'),
(15, 'Jack', '', 'Lanphear', '', '87', 'PLEASANT ST', 'St. John\'s', 'NL', 'A1E1L5', 'Canada', 'newfoundlandknight@gmail.com', '709', '6901280', 40, 'THIS IS A TEST TRIP', '2023-05-16 10:57:07'),
(16, 'Jack', '', 'Lanphear', '', '87 Pleasant St.', '', 'St. John\'s', 'Newfoundland &amp; Labrador', 'A1E 1L5', 'Canada', 'jacklrlanphear@gmail.com', '709', '6901280', 3, 'KEELE RIVER', '2023-05-16 11:51:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
