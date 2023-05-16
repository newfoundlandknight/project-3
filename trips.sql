-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2023 at 01:39 PM
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
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(10) NOT NULL,
  `header` text COLLATE utf8_unicode_ci NOT NULL,
  `tripDate` date NOT NULL,
  `duration` int(3) NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `trip_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tripCost` int(12) NOT NULL,
  `skillLevel` float NOT NULL,
  `distance` int(11) NOT NULL,
  `riverClass` int(10) NOT NULL,
  `googleMaps` text COLLATE utf8_unicode_ci NOT NULL,
  `maxSeats` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `header`, `tripDate`, `duration`, `summary`, `trip_image`, `tripCost`, `skillLevel`, `distance`, `riverClass`, `googleMaps`, `maxSeats`) VALUES
(3, 'KEELE RIVER', '2023-05-31', 3, 'Without a doubt, paddling the Keele River is a world-class adventure. A Canadian Signature Experience, its turquoise waters wind their way 310 km through the towering Mackenzie Mountains and some of the most remote and pristine wilderness left on the planet. The river is fast but fun and friendly, with exciting but manageable whitewater and no portages. Jaw-dropping spectacular scenery, superb fly-fishing, hiking opportunities and excellent wildlife viewing make this trip one of our favorite mountain rivers, and our most popular expedition. The Keele River is suitable for novice to intermediate paddlers, but more skilled paddlers will still have lots to enjoy!', 'Keele_6-1.jpg', 6000, 5, 1234, 2, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d209907.03739879545!2d-127.8511765816367!3d63.76163731603377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x515e18305b318b2b%3A0x521fa594d3fab336!2sKeele%20River!5e1!3m2!1sen!2sca!4v1683650985829!5m2!1sen!2sca', 15),
(5, 'MOUNTAIN RIVER', '2023-05-31', 3, 'With six stunning canyons, the Mountain River is considered the most coveted whitewater canoe trip in Canada by seasoned river-guides. Its remote setting and lightning fast water with jaw-dropping mountain scenery will thrill you right to the confluence with the Mackenzie River. The canyons are defined by vaulted sheer cliff walls guarded by mysterious “gates” and challenging white-water suitable for intermediate or advanced canoeists.', 'Mountain_3.jpg', 2950, 3, 290, 3, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13142.352516198735!2d-128.86804908916014!3d65.6854002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x51687d25581ff4ff%3A0x2808dc9e118073ec!2sMountain%20River!5e0!3m2!1sen!2sca!4v1683739526677!5m2!1sen!2sca', 12),
(6, 'GANDER RIVER', '2023-06-15', 3, 'The Gander River is a river in eastern Newfoundland, Canada. It is 110 miles (177 km) long and originates at Partridgeberry Hill, south of Grand Falls-Windsor. The river then flows northeast to Gander Lake and on to Gander Bay on the Atlantic Ocean.', 'Mountain_16.jpg', 999, 2, 200, 4, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19613.900426650733!2d-54.52293727165318!3d49.25108983187713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b765023445a828d%3A0x4cdb808bb4e62bf!2sGander%20River!5e1!3m2!1sen!2sca!4v1683738066685!5m2!1sen!2sca', 20),
(7, 'BIG RIVER LODGE', '2023-07-01', 3, 'If you are looking for world-class Atlantic Salmon fishing, easy wading, comfortable and luxurious accommodations – then Big River Lodge is the place for you! The runs of salmon on this river are legendary and they also have Char and Brook Trout which come up from the Atlantic Ocean which is less than five miles away. They have lots of good pools for swinging a fly and best of all, they are the only lodge on the river. Outstanding in every way, this lodge needs to be on your “to-do” list!', '210824_FURNEAUX_3367-1024x767.jpg', 3999, 4, 130, 4, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31403.862647876882!2d-59.01424169540405!3d54.83543211223328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4c7047bd7ebde3d5%3A0xe6078bc671cae544!2sBig%20River!5e1!3m2!1sen!2sca!4v1683739732816!5m2!1sen!2sca', 8),
(34, 'Exploits River', '2023-06-30', 3, 'The Exploits River (Mi\'kmaq: Sple\'tk; Tenenigeg)[1] is a river in the province of Newfoundland and Labrador, Canada. It flows through the Exploits Valley in the central part of Newfoundland.\r\n\r\nIncluding the Lloyds River, which discharges in Beothuk Lake, the Exploits river has a length of 246 km, making it the longest river on the island draining an area of 1,100 km2[2] and is the second longest in the province after the Churchill River.\r\n\r\nThe river drains Beothuk Lake at its source and discharges into the Bay of Exploits near the port town of Botwood.\r\n\r\nThe Exploits River provides habitat for spawning Atlantic Salmon and other species of fish. The salmon population increased dramatically when fish ladders were installed, opening up sections of the river that had been previously inaccessible.', '1024px-Exploits_River,_Newfoundland._Canada.jpg', 1250, 3, 190, 4, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d299627.06954111694!2d-55.72583392958348!3d48.9412045478263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b7719f41c6ec0b3%3A0x8e863078dbdcb722!2sExploits%20River!5e1!3m2!1sen!2sca!4v1684021708671!5m2!1sen!2sca', 20),
(35, 'Humber River', '2023-07-14', 3, 'The Humber River is a river on Newfoundland in the Canadian province of Newfoundland and Labrador. It is approximately 120 kilometres long; it flows through the Long Range Mountains, southeast then southwest, through Deer Lake, to the Bay of Islands at Corner Brook. It begins near the town of Hampden. Taylor\'s Brook, Aidies Stream and Dead Water Brook run into the upper Humber. The Humber is one of Newfoundland\'s longest rivers.\r\n\r\nJames Cook first charted the Humber in the summer of 1767.[1] It was named for its English counterpart the Humber (estuary).[2]\r\n\r\nThe Humber is rich in Atlantic Salmon, and was from the 1800s used as a waterway for European trappers and loggers.[3] It is one of the world\'s best recreational salmon fishing rivers', 'Humber_River_in_2007.jpg', 1899, 2, 180, 2, 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5548394.334363702!2d-57.93856492806963!3d47.232685122378705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sca!4v1683810716392!5m2!1sen!2sca', 10),
(40, 'THIS IS A TEST TRIP', '2023-01-01', 6, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias unde pariatur vitae fugiat, sit dolore inventore consectetur eveniet? Corrupti quae voluptatibus sed saepe quaerat perspiciatis molestias dolores tempora iste dolore.', 'clockwork.jpg', 100, 1, 1234, 2, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d209907.03739879545!2d-127.8511765816367!3d63.76163731603377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x515e18305b318b2b%3A0x521fa594d3fab336!2sKeele%20River!5e1!3m2!1sen!2sca!4v1683650985829!5m2!1sen!2sca', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
