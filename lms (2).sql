-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 03:41 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `stfname` varchar(30) NOT NULL,
  `stmname` varchar(30) NOT NULL,
  `stlname` varchar(30) NOT NULL,
  `class` varchar(10) NOT NULL,
  `division` varchar(2) NOT NULL,
  `trfname` varchar(30) NOT NULL,
  `trmname` varchar(30) NOT NULL,
  `trlname` varchar(30) NOT NULL,
  `type` varchar(15) NOT NULL,
  `days` int(2) NOT NULL,
  `startDate` date NOT NULL,
  `file` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `stfname`, `stmname`, `stlname`, `class`, `division`, `trfname`, `trmname`, `trlname`, `type`, `days`, `startDate`, `file`, `status`) VALUES
(1, 'Sneha', 'Ramprasad', 'Adep', 'te', 'A', 'Ayushi', 'Rajesh', 'Agrawal', 'medical', 5, '2017-10-21', 'car.jpg', 'Not Granted');

-- --------------------------------------------------------

--
-- Table structure for table `cc`
--

CREATE TABLE `cc` (
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `class` varchar(5) NOT NULL,
  `division` varchar(2) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ccid` int(11) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc`
--

INSERT INTO `cc` (`lname`, `fname`, `mname`, `class`, `division`, `address`, `contact`, `email`, `ccid`, `password`) VALUES
('a', 'a', 'a', 'b', 'a', 'cdef', 9665425632, 'ayu.agr2011@gmail.com', 1, 'aa'),
('Agrawal', 'Ayushi', 'Rajesh', 'te', 'A', 'abcd apar', 9820957580, 'ayu.agr2011@gmail.com', 2, 'ayushi');

-- --------------------------------------------------------

--
-- Table structure for table `ccc`
--

CREATE TABLE `ccc` (
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `class` varchar(5) NOT NULL,
  `cccid` int(11) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `division` varchar(2) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ccc`
--

INSERT INTO `ccc` (`lname`, `fname`, `mname`, `class`, `cccid`, `mail`, `address`, `contact`, `division`, `password`) VALUES
('b', 'b', 'b', 'te', 4, 'snehaadep@gmail.com', 'bce', 789, 'A', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `lname` varchar(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `mname` varchar(15) NOT NULL,
  `class` varchar(10) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `division` varchar(2) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`lname`, `fname`, `mname`, `class`, `rollno`, `email`, `division`, `address`, `password`, `contact`) VALUES
('Adep', 'Sneha', 'Ramprasad', 'te', '15CE1084', 'snehaadep@gmail.com', 'A', 'ab complex', 'sne', 8624003361);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cc`
--
ALTER TABLE `cc`
  ADD PRIMARY KEY (`ccid`);

--
-- Indexes for table `ccc`
--
ALTER TABLE `ccc`
  ADD PRIMARY KEY (`cccid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollno`(10)),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
