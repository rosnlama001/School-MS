-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2020 at 02:36 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `adpf`
--

CREATE TABLE `adpf` (
  `pfId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stpf`
--

CREATE TABLE `stpf` (
  `pfId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trpf`
--

CREATE TABLE `trpf` (
  `pfId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `eMail` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `regDate` datetime NOT NULL,
  `otpDate` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `eMail`, `pass`, `status`, `otp`, `regDate`, `otpDate`, `flag`) VALUES
(6, 'rlama', '', '', 'teacher', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'rlama', 'rlama@sms.com', '123456', 'teacher', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'rosnlama', 'rosnlama@sms.com', '123456', 'teacher', '', '2020-10-11 18:10:24', '0000-00-00 00:00:00', 0),
(9, 'deepak', 'deepak@sms.com', '$2y$10$ECv75.cIquugET6eNfYpteRVUfTSjjnJAABgBjTKisjyZVY9G.aKy', 'teacher', '', '2020-10-11 18:13:00', '0000-00-00 00:00:00', 0),
(10, 'student', 'student@sms.com', '$2y$10$NyZza/oswENucnQUFET88.drpvhe/lHeEhcu0bSJV.Jntadg6EBHu', 'student', '', '2020-10-11 18:13:51', '0000-00-00 00:00:00', 0),
(11, 'admin', 'admin@sms.com', '$2y$10$BfOlXPzDJV47DAza1VHgXeLfP7eCu9khDBB4Jqd4Fouc2j2ldSo9S', 'admin', '', '2020-10-11 18:14:27', '0000-00-00 00:00:00', 0),
(12, 'tanaka', 'tanaka@sms.com', '$2y$10$vS6VwoPSoXr.1HcUaWEO4ex6tS/Uapi6TGmN9Hes5d13VVe/gWt2S', 'teacher', '', '2020-10-11 18:18:49', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stpf`
--
ALTER TABLE `stpf`
  ADD PRIMARY KEY (`pfId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stpf`
--
ALTER TABLE `stpf`
  MODIFY `pfId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
