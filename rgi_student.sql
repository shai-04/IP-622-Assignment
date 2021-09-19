-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 04:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgi_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `block_login`
--

CREATE TABLE `block_login` (
  `CREDENTIAL` varchar(30) NOT NULL,
  `UNBLOCK_TIME` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `MODULEID` int(4) NOT NULL,
  `MODULENAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`MODULEID`, `MODULENAME`) VALUES
(1, 'Information Systems 622'),
(2, 'Programming 622'),
(3, 'Big Data and IoT 600'),
(4, 'Machine Learning 600'),
(5, 'Internet Programming 622'),
(6, 'M-Commerce 522'),
(7, 'Database Systems 522'),
(8, 'Intro to  IT 500'),
(9, 'Service Desk 500'),
(10, 'e-Commerce 512'),
(11, 'Business Communication 500'),
(12, 'WIL 500');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `STID` int(4) NOT NULL,
  `ATTENDANCE` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`STID`, `ATTENDANCE`) VALUES
(6, 61);

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `STID` int(4) NOT NULL,
  `BALANCE` float NOT NULL,
  `DUEDATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`STID`, `BALANCE`, `DUEDATE`) VALUES
(6, 16212, '2021-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `STID` int(4) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(128) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `EMAIL` text NOT NULL,
  `QUALIFICATION` varchar(15) NOT NULL,
  `CELLNUMBER` varchar(10) NOT NULL,
  `GENDER` varchar(6) NOT NULL,
  `NATIONALITY` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`STID`, `USERNAME`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `QUALIFICATION`, `CELLNUMBER`, `GENDER`, `NATIONALITY`) VALUES
(6, 'shai101', '9214cd2e3b3a3eb9038feb7e349e5090', 'Shaiyur', 'Dooken', 'shai@gmail.com', 'BSc IT', '0611239463', 'Male', 'South African');

-- --------------------------------------------------------

--
-- Table structure for table `student_results`
--

CREATE TABLE `student_results` (
  `STID` int(4) NOT NULL,
  `MODULEID` int(4) NOT NULL,
  `FINAL_MARK` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_results`
--

INSERT INTO `student_results` (`STID`, `MODULEID`, `FINAL_MARK`) VALUES
(6, 1, 67),
(6, 2, 57),
(6, 3, 78),
(6, 4, 79),
(6, 5, 96);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block_login`
--
ALTER TABLE `block_login`
  ADD PRIMARY KEY (`CREDENTIAL`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`MODULEID`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`STID`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`STID`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`STID`);

--
-- Indexes for table `student_results`
--
ALTER TABLE `student_results`
  ADD KEY `MODULEID` (`MODULEID`),
  ADD KEY `STID` (`STID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `MODULEID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_reg`
--
ALTER TABLE `student_reg`
  MODIFY `STID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_ibfk_1` FOREIGN KEY (`STID`) REFERENCES `student_reg` (`STID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD CONSTRAINT `student_fees_ibfk_1` FOREIGN KEY (`STID`) REFERENCES `student_reg` (`STID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_results`
--
ALTER TABLE `student_results`
  ADD CONSTRAINT `student_results_ibfk_1` FOREIGN KEY (`STID`) REFERENCES `student_reg` (`STID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_results_ibfk_2` FOREIGN KEY (`MODULEID`) REFERENCES `modules` (`MODULEID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
