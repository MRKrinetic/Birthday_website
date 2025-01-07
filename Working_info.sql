-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql112.byetcluster.com
-- Generation Time: Jan 06, 2025 at 10:03 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_38042314_Birthdaywish`
--

-- --------------------------------------------------------

--
-- Table structure for table `Working_info`
--

CREATE TABLE `Working_info` (
  `id` int(11) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Type` enum('Student','Working') NOT NULL,
  `Organization` varchar(255) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `DoB` date NOT NULL,
  `Photograph` blob DEFAULT NULL,
  `contactno` bigint(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Working_info`
--

INSERT INTO `Working_info` (`id`, `First_Name`, `Last_Name`, `Type`, `Organization`, `Designation`, `DoB`, `Photograph`, `contactno`) VALUES
(1, 'Yash', 'Gaware', 'Working', 'KSE', 'HOD', '2025-01-01', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Working_info`
--
ALTER TABLE `Working_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Working_info`
--
ALTER TABLE `Working_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
