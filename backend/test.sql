-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 08:20 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `event_id`, `volunteer_id`) VALUES
(2, 'Hello World', 'E0', 'chintimothy45@gmail.com'),
(4, 'Hello World', 'E0', 'chintimothy45@gmail.com'),
(5, 'Your mother is a whore', 'E0', 'chintimothy45@gmail.com'),
(6, 'Weeeeee', 'E0', 'chintimothy45@gmail.com'),
(7, 'Hello world', 'E2', 'lolman@gmail.com');

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
  `end_time` varchar(64) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `charityid`, `event_desc`, `event_req`, `event_fee`, `event_tags`, `signup_link`, `event_state`, `event_updates`, `available`, `start_time`, `end_time`, `date_created`) VALUES
('E1', 'New Event', '2024-02-08', 'chintimothy45@gmail.com', 'Kedah Event', 'Nothing', 90, 'soup kitchen, cleanup, disaster relief', 'google.com', 'Kedah', 'Hello', 0, '12:00am', '12:00pm', '2024-02-19'),
('E2', 'New Event', '2024-02-21', 'chintimothy45@gmail.com', 'We are here', 'Nothing', 100, 'homeless, education, reforestation', 'google.com', 'Johor', '', 0, '12:00pm', '12:00am', '2024-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `update_id` int(11) NOT NULL,
  `update_text` varchar(255) NOT NULL,
  `event_id` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`update_id`, `update_text`, `event_id`, `date`) VALUES
(4, 'jaden is a maire', 'E0', 'February 6, 2024'),
(5, 'This is an update', 'E0', 'February 18, 2024'),
(6, 'This is an update', 'E0', 'February 15, 2024');

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
('charlie123@gmail.com', 'goodjob', 'Charlie', 'Kuala Lumpur', 0, '', 'I love men', ''),
('lolman@gmail.com', '123456', 'Lolman', 'Kuala Lumpur', 20, 'Other', 'This is my biography.', ''),
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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
