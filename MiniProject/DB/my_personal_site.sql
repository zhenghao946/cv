-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 04:27 AM
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
-- Database: `my_personal_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUS_ID` int(11) NOT NULL,
  `CUS_NAME` varchar(30) NOT NULL,
  `PWD_HASH` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUS_ID`, `CUS_NAME`, `PWD_HASH`) VALUES
(20, 'ZhengHao', '$2y$10$206pXfKkL1Qu0CDtduDqoeZ6qc.JUofK92kkdcK/BWNufWK/fHJFy'),
(21, 'ZhengHao946', '$2y$10$e1sIth0D7dEoEFDDVlplyuL2HlBTevEKdf1Do0TJfjgJazoLcrLLy'),
(33, 'TestID', '$2y$10$i3BDMccnUGn1CjpyyGfU/OMvx0lAPqw2hcAKIId/6PzSPdyJzGdKG'),
(34, 'TestID2', '$2y$10$C9fm2QyM6SdGzXlrabn.QeYzT2gaJMePQknt6YT65YqAzHDMmctmq'),
(35, 'TestID5', '$2y$10$MQUL3CwJFv6U/EiGJoeLNezRoQD7i6uZhtHokR7zybGQsxyRU466i'),
(36, 'TestID7', '$2y$10$mGM1KKawPxdPT5QfWE6UWel.dBCgWcXax3vfHMpyChJo.KZBbtRq.'),
(37, 'TestID8', '$2y$10$qtqCb3TCQvNfu5a.Vgg7ReNc7VvBl.QhzRoNl1AplegGaCDi4Mjxu');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `REV_ID` int(5) NOT NULL,
  `CUS_NAME` varchar(30) NOT NULL,
  `CUS_EMAIL` varchar(40) NOT NULL,
  `CUS_RATING` int(2) NOT NULL,
  `CUS_REVIEW` varchar(300) NOT NULL,
  `CUS_RECOM` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`REV_ID`, `CUS_NAME`, `CUS_EMAIL`, `CUS_RATING`, `CUS_REVIEW`, `CUS_RECOM`) VALUES
(0, 'TestID5', 'liewzh19990406@gmail.com', 6, 'haha', 0),
(1, 'ZhengHao', 'liewzh19990406@gmail.com', 4, 'haha', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUS_ID`),
  ADD UNIQUE KEY `CUS_ID` (`CUS_ID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`REV_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
