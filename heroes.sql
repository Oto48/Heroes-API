-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 03:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heroes_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `heroes`
--

CREATE TABLE `heroes` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `race` varchar(191) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `durability` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  `combat` int(11) NOT NULL,
  `occupation` text NOT NULL,
  `group_affiliation` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heroes`
--

INSERT INTO `heroes` (`id`, `name`, `gender`, `race`, `intelligence`, `strength`, `speed`, `durability`, `power`, `combat`, `occupation`, `group_affiliation`, `image`) VALUES
(1, 'Ghost Rider', 'Male', 'Demon', 50, 55, 25, 100, 100, 60, 'Former stunt motorcyclist', 'Quentin Carnival Formerly Midnight Sons, Legion of Monsters, The Champions', 'https://www.superherodb.com/pictures2/portraits/10/100/67.jpg'),
(2, 'Lobo', 'Male', 'Czarnian', 94, 100, 54, 100, 100, 85, 'Assassin, Bounty Hunter, Priest', 'Formerly LEGION, Young Justice; First Celestial Church of the Triple Fish-God', 'https://www.superherodb.com/pictures2/portraits/10/100/1127.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
