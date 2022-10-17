-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 06:24 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `movieId` int(10) NOT NULL,
  `imdbId` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `tmdbId` varchar(256) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`movieId`, `imdbId`, `tmdbId`) VALUES
(1, '0114709', '862'),
(2, '0113497', '8844'),
(3, '0113228', '15602'),
(4, '0114885', '31357'),
(5, '0113041', '11862'),
(6, '0113277', '949'),
(7, '0114319', '11860'),
(8, '0112302', '45325'),
(9, '0114576', '9091'),
(10, '0113189', '710');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieId` int(10) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `genres` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `year` int(4) DEFAULT 0,
  `Accept` int(1) NOT NULL DEFAULT 1,
  `poster` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieId`, `title`, `genres`, `description`, `year`, `Accept`, `poster`) VALUES
(1, 'Toy Story (1995)', 'Adventure|Animation|Children|Comedy|Fantasy', NULL, 0, 1, ''),
(2, 'Jumanji (1995)', 'Adventure|Children|Fantasy', NULL, 0, 1, ''),
(3, 'Grumpier Old Men (1995)', 'Comedy|Romance', NULL, 0, 1, ''),
(4, 'Waiting to Exhale (1995)', 'Comedy|Drama|Romance', NULL, 0, 1, ''),
(5, 'Father of the Bride Part II (1995)', 'Comedy', NULL, 0, 1, ''),
(6, 'Heat (1995)', 'Action|Crime|Thriller', NULL, 0, 1, ''),
(7, 'Sabrina (1995)', 'Comedy|Romance', NULL, 0, 1, ''),
(8, 'Tom and Huck (1995)', 'Adventure|Children', NULL, 0, 1, ''),
(9, 'Sudden Death (1995)', 'Action', NULL, 0, 1, ''),
(10, 'GoldenEye (1995)', 'Action|Adventure|Thriller', NULL, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `userId` int(10) DEFAULT NULL,
  `movieId` int(10) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `isvirtual` int(1) NOT NULL DEFAULT 0,
  `comment` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`userId`, `movieId`, `rating`, `isvirtual`, `comment`) VALUES
(3, 2, '3.0', 0, 'Good movie !!							   \r\n						   '),
(2, 1, '5.0', 0, NULL),
(2, 2, '5.0', 0, NULL),
(2, 3, '5.0', 0, NULL),
(2, 4, '5.0', 0, NULL),
(2, 5, '5.0', 0, NULL),
(2, 6, '5.0', 0, NULL),
(2, 7, '5.0', 0, NULL),
(2, 8, '5.0', 0, NULL),
(2, 9, '5.0', 0, NULL),
(2, 10, '5.0', 0, NULL),
(3, 9, '3.0', 0, 'i love it							   \r\n						   '),
(0, 1, '5.0', 1, NULL),
(0, 2, '5.0', 1, NULL),
(0, 3, '5.0', 1, NULL),
(0, 4, '5.0', 1, NULL),
(0, 5, '5.0', 1, NULL),
(0, 6, '5.0', 1, NULL),
(0, 7, '5.0', 1, NULL),
(0, 8, '5.0', 1, NULL),
(0, 9, '5.0', 1, NULL),
(0, 10, '5.0', 1, NULL),
(1, 1, '5.0', 1, NULL),
(1, 2, '4.0', 1, NULL),
(1, 3, '5.0', 1, NULL),
(1, 4, '5.0', 1, NULL),
(1, 5, '5.0', 1, NULL),
(1, 6, '5.0', 1, NULL),
(1, 7, '5.0', 1, NULL),
(1, 8, '5.0', 1, NULL),
(1, 9, '4.0', 1, NULL),
(1, 10, '5.0', 1, NULL),
(3, 1, '5.0', 1, NULL),
(3, 3, '5.0', 1, NULL),
(3, 4, '5.0', 1, NULL),
(3, 5, '5.0', 1, NULL),
(3, 6, '5.0', 1, NULL),
(3, 7, '5.0', 1, NULL),
(3, 8, '5.0', 1, NULL),
(3, 10, '5.0', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(10) NOT NULL,
  `email` varchar(64) ,
  `password` varchar(64) ,
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `Size` int(2) NOT NULL DEFAULT 4,
  `gender` varchar(16) NOT NULL,
  `pyear` int(4) NOT NULL DEFAULT 2121,
  `pcast` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `email`, `password`, `username`, `Size`, `gender`, `pyear`, `pcast`) VALUES
(0, '439101936@student.ksu.edu.sa', '123456', 'ibrahim', 0, 'Male', 0, 'khalid'),
(1, '439102188@Student.Ksu.edu.sa', '123', 'Fahad1', 5, 'Male', 2021, 'ibrahim'),
(2, '439102023@student.ksu.edu.sa', '123', 'khalid', 4, 'Male', 1995, 'ahmed'),
(3, '438106759@student.ksu.edu.sa', '123', 'Ahmed', 6, 'Male', 2021, 'fahad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193611;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=612;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
