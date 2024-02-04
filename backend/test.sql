-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 11:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `charity`
--

INSERT INTO `charity` (`charityid`, `password`, `name`) VALUES
('chintimothy45@gmail.com', 'makhijau', 'Persatuan Pengakap Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `event_id` varchar(255) DEFAULT NULL,
  `volunteer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `event_id`, `volunteer_id`) VALUES
(2, 'Hello World', 'E0', 'chintimothy45@gmail.com'),
(4, 'Hello World', 'E0', 'chintimothy45@gmail.com'),
(5, 'Your mother is a whore', 'E0', 'chintimothy45@gmail.com'),
(6, 'Weeeeee', 'E0', 'chintimothy45@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` varchar(255) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `charityid` varchar(255) DEFAULT NULL,
  `event_desc` text NOT NULL,
  `event_req` text NOT NULL,
  `event_fee` int(11) NOT NULL,
  `event_tags` varchar(255) NOT NULL,
  `signup_link` varchar(255) NOT NULL,
  `event_state` varchar(50) NOT NULL,
  `event_updates` text NOT NULL,
  `available` tinyint(1) NOT NULL,
  `start_time` varchar(64) NOT NULL,
  `end_time` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `charityid`, `event_desc`, `event_req`, `event_fee`, `event_tags`, `signup_link`, `event_state`, `event_updates`, `available`, `start_time`, `end_time`) VALUES
('E0', 'Testing', '2024-01-03', 'chintimothy45@gmail.com', 'desc', 'req', 90, 'Recreation', 'link', 'Kuala Lumpur', 'dwqdwqd', 0, '12:21am', '12:12am'),
('E1', 'New Event', '2024-02-08', 'chintimothy45@gmail.com', 'Kedah Event', 'Nothing', 90, 'soup kitchen, cleanup, disaster relief', 'google.com', 'Kedah', 'Hello', 0, '12:00am', '12:00pm'),
('E2', 'New Event', '2024-02-21', 'chintimothy45@gmail.com', 'We are here', 'Nothing', 100, 'homeless, education, reforestation', 'google.com', 'Johor', '', 0, '12:00pm', '12:00am');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `update_id` int(11) NOT NULL,
  `update_text` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`email`, `password`, `name`, `state`, `age`, `gender`, `bio`, `preferences`) VALUES
('charlie123@gmail.com', 'goodjob', 'Charlie', 'KL', 0, '', 'I love men', ''),
('chintimothy45@gmail.com', '123456', 'Yong Sheng', 'Kuala Lumpur', 20, 'Male', 'I love walks.', ',dog shelter,reforestation,cleanup,education,animal shelter,clinic,orphanage,river,cat shelter,old folks home'),
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
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`update_id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
