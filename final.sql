-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2021 m. Geg 09 d. 20:53
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `ID` int(8) NOT NULL,
  `name` varchar(64) COLLATE utf32_swedish_ci NOT NULL,
  `description` varchar(256) COLLATE utf32_swedish_ci DEFAULT NULL,
  `status` varchar(32) COLLATE utf32_swedish_ci NOT NULL,
  `taskQuantity` int(8) NOT NULL,
  `taskLeft` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Sukurta duomenų kopija lentelei `projects`
--

INSERT INTO `projects` (`ID`, `name`, `description`, `status`, `taskQuantity`, `taskLeft`) VALUES
(1, 'Laisez Faire', 'It\'s all about money, kaa ching kaa ching cash, my blood money and my little stash.', 'in progress', 10, 4),
(2, 'Barbarossa', 'Gott mit uns.', 'finish', 6, 0),
(3, 'Vaccination', 'That will hurt just a little...', 'start', 18, 18),
(4, 'In-Fidelity?', 'I did not have any sexual relations with that woman!', '', 0, 0),
(6, 'Touch that leather', 'Leather to leather.', '', 0, 0),
(7, 'Veryga', 'Take all drinks from baryga.', '', 0, 0),
(8, 'Sultan', 'Erdogan strikes back.', '', 0, 0),
(9, 'Christmas', 'Satan Klaus is comming.', '', 0, 0),
(10, 'Biker Girl', 'She rode into town. She rode the town.', '', 0, 0),
(11, 'Bangkok Nights', 'Ladyboys Delight, ft. DJ Vedaras.', '', 0, 0),
(13, 'Test', 'What test !?', '', 0, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `projectID` int(8) DEFAULT NULL,
  `ID` int(8) NOT NULL,
  `name` varchar(64) COLLATE utf32_swedish_ci NOT NULL,
  `description` varchar(256) COLLATE utf32_swedish_ci DEFAULT NULL,
  `priority` varchar(32) COLLATE utf32_swedish_ci NOT NULL,
  `status` varchar(32) COLLATE utf32_swedish_ci NOT NULL,
  `startDate` date DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Sukurta duomenų kopija lentelei `tasks`
--

INSERT INTO `tasks` (`projectID`, `ID`, `name`, `description`, `priority`, `status`, `startDate`, `modifiedDate`) VALUES
(1, 1, 'first', 'desription desription desription', 'low', 'todo', NULL, NULL),
(1, 2, 'second', 'desription desription desription', 'hight', 'completed', NULL, NULL),
(2, 3, 'third', 'desription desription desription', 'medium', 'in progress', NULL, NULL),
(3, 4, '4-th', 'desription desription desription', 'low', 'todo', NULL, NULL),
(3, 5, '5-th', 'desription desription desription', 'low', 'completed', NULL, NULL),
(3, 6, '6-th', 'desription desription desription', 'low', 'todo', NULL, NULL),
(3, 7, '7-th', 'desription desription desription', 'medium', 'todo', NULL, NULL),
(4, 8, '8-th', 'desription desription desription', 'hight', 'todo', NULL, NULL),
(4, 9, '9-th', 'desription desription desription', 'medium', 'completed', NULL, NULL),
(4, 10, '10-th', 'desription desription desription', 'low', 'completed', NULL, NULL);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID` int(8) NOT NULL,
  `login` varchar(64) COLLATE utf32_swedish_ci NOT NULL,
  `password` varchar(64) COLLATE utf32_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`ID`, `login`, `password`) VALUES
(1, 'test@gmail.com', '2ec31a37dffab3bc8bf189775fcb8b64');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
