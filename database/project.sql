-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 06:43 AM
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
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `aid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `aid` int(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `conid` int(11) NOT NULL,
  `conname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`conid`, `conname`) VALUES
(1, 'ネパール'),
(2, '日本');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`, `fid`) VALUES
(1, 'ネットワーク', 1),
(2, 'IoT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `examcat`
--

CREATE TABLE `examcat` (
  `catid` int(11) NOT NULL,
  `catname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`) VALUES
(1, '情報処理システム'),
(2, 'ITスペシャリスト');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `question` text NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentpf`
--

CREATE TABLE `studentpf` (
  `pfId` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `userId` int(11) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `mobile` int(20) NOT NULL,
  `postcode` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `image` longtext NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `hobby` tinytext NOT NULL,
  `regNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `cid`, `subname`) VALUES
(1, 1, 'WebSystem'),
(2, 2, 'WebSystem'),
(3, 1, 'JavaScript'),
(4, 2, 'JavaScript'),
(5, 1, 'CSS'),
(6, 2, 'CSS'),
(7, 1, 'CCNA'),
(8, 1, 'RUBY'),
(9, 2, 'AI'),
(10, 2, 'PYTHON'),
(11, 2, 'Raspberry');

-- --------------------------------------------------------

--
-- Table structure for table `teacherpf`
--

CREATE TABLE `teacherpf` (
  `pfId` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `userId` int(11) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `postcode` int(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `course` varchar(20) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `hobby` text NOT NULL,
  `image` longtext NOT NULL,
  `mobile` int(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherpf`
--

INSERT INTO `teacherpf` (`pfId`, `fullName`, `userId`, `nationality`, `postcode`, `address`, `birthdate`, `course`, `faculty`, `hobby`, `image`, `mobile`, `sex`, `subject`, `skill`) VALUES
(1, '', 2, '', 5400022, '', '2015-05-13', '1', '', '', '', 902345698, '男性', '', '');

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
(14, 'admin', 'admin@sms.com', '$2y$10$E7X16/eE7tGPrVyPNUy.SOMitQBGOyWNgbPWxmWoiXu4taThS.8Ii', 'admin', '', '2020-10-23 09:49:07', '0000-00-00 00:00:00', 0),
(51, 'otera', 'otera@sms.com', '$2y$10$06iZ94W5nqKdsaBvevNtTeQEtP25Gg9aru8hTzdMRVHuAxeC9.BDa', 'teacher', '', '2020-10-25 05:07:23', '0000-00-00 00:00:00', 0),
(52, 'deep', 'deep@sms.com', '$2y$10$nga/iBHvHiNmvN.uyO6L7OP0ZAzFf3iDy2zSRfK.rxJBi/6tlykzO', 'teacher', '', '2020-10-26 02:48:03', '0000-00-00 00:00:00', 0),
(55, 'asd', 'asdf@s', '$2y$10$WOHJnPSJExVkXolOfp.taOv2l1rs7d1XDMyQK3qu.HDWNDj/PfnhW', 'teacher', '59366', '2020-11-01 07:27:59', '2020-11-01 07:27:59', 0),
(56, 'rosh', 'rosh@sms.com', '$2y$10$UKg9jGegaV05zpXTYSXvAupLnWMq6YjZDUU3s7TeyE6dGjrFtKGQe', 'teacher', '', '2020-11-02 09:14:48', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`conid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `examcat`
--
ALTER TABLE `examcat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `studentpf`
--
ALTER TABLE `studentpf`
  ADD PRIMARY KEY (`pfId`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `teacherpf`
--
ALTER TABLE `teacherpf`
  ADD PRIMARY KEY (`pfId`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `aid` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `conid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `examcat`
--
ALTER TABLE `examcat`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentpf`
--
ALTER TABLE `studentpf`
  MODIFY `pfId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacherpf`
--
ALTER TABLE `teacherpf`
  MODIFY `pfId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
