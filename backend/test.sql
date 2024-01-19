-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 04:44 AM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminid` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminid`, `password`) VALUES
('A001', 'autistic');

-- --------------------------------------------------------

--
-- Table structure for table `charity`
--

CREATE TABLE `charity` (
  `charityid` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charity`
--

INSERT INTO `charity` (`charityid`, `password`, `name`) VALUES
('C001', 'makhijau', 'persatuan mak hijau malaysia'),
('C002', 'lgbtftw', 'persatuan lgbt islam malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `eventid` varchar(255) DEFAULT NULL,
  `volunteerid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventid` varchar(255) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `charityid` varchar(255) DEFAULT NULL,
  `event_desc` text NOT NULL,
  `event_req` text NOT NULL,
  `event_fee` int(11) NOT NULL,
  `event_tags` varchar(255) NOT NULL,
  `signup_link` varchar(255) NOT NULL,
  `event_state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `event_name`, `event_date`, `charityid`, `event_desc`, `event_req`, `event_fee`, `event_tags`, `signup_link`, `event_state`) VALUES
('C001', 'Larian Gey', '2024-02-10', 'C001', 'This is a description', 'These are the requirements', 10, 'charity,river,cleanup', 'bit.ly/signup/', 'KL'),
('E002', 'isreal ', '2025-10-25', 'C001', 'This is a description', 'These are the requirements', 10, 'charity,river,cleanup', 'bit.ly/signup/', 'Perak');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `state` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `bio` text NOT NULL,
  `preferences` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`email`, `password`, `name`, `state`, `age`, `gender`, `bio`, `preferences`) VALUES
('charlie123@gmail.com', 'goodjob', 'Charlie', 'KL', 0, '', 'I love men', ''),
('chintimothy45@gmail.com', '123', 'Yong Sheng', 'Kuala Lumpur', 20, 'Male', 'I love walks.', ',food bank,dog shelter,reforestation,cleanup,education,animal shelter,clinic,orphanage'),
('lolman@gmail.com', '123', '99999', 'KL', 20, 'Male', 'Hello', ''),
('V001@gmail.com', 'supbro', 'jason', '', 0, '', '', ''),
('V002', 'besboi', 'shan', '', 0, '', '', ''),
('V003', 'babi', 'peppa babi', '', 0, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `charity`
--
ALTER TABLE `charity`
  ADD PRIMARY KEY (`charityid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`),
  ADD KEY `eventid` (`eventid`),
  ADD KEY `volunteerid` (`volunteerid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventid`),
  ADD KEY `charityid` (`charityid`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `events` (`eventid`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`volunteerid`) REFERENCES `volunteer` (`email`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`charityid`) REFERENCES `charity` (`charityid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
