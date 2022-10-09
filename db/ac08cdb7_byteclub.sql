-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 06:05 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ac08cdb7_byteclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `registration_code` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `c_1` varchar(255) NOT NULL,
  `c_1_email` varchar(255) NOT NULL,
  `c_2` varchar(255) NOT NULL,
  `c_2_email` varchar(255) NOT NULL,
  `c_3` varchar(255) NOT NULL,
  `c_3_email` varchar(255) NOT NULL,
  `p_1` varchar(255) NOT NULL,
  `p_1_email` varchar(255) NOT NULL,
  `p_2` varchar(255) NOT NULL,
  `p_2_email` varchar(255) NOT NULL,
  `q_1` varchar(255) NOT NULL,
  `q_1_email` varchar(255) NOT NULL,
  `q_2` varchar(255) NOT NULL,
  `q_2_email` varchar(255) NOT NULL,
  `q_3` varchar(255) NOT NULL,
  `q_3_email` varchar(255) NOT NULL,
  `q_4` varchar(255) NOT NULL,
  `q_4_email` varchar(255) NOT NULL,
  `gd_1` varchar(255) NOT NULL,
  `gd_1_email` varchar(255) NOT NULL,
  `r_1` varchar(255) NOT NULL,
  `r_1_email` varchar(255) NOT NULL,
  `r_2` varchar(255) NOT NULL,
  `r_2_email` varchar(255) NOT NULL,
  `f_1` varchar(255) NOT NULL,
  `f_1_email` varchar(255) NOT NULL,
  `f_2` varchar(255) NOT NULL,
  `f_2_email` varchar(255) NOT NULL,
  `f_3` varchar(255) NOT NULL,
  `f_3_email` varchar(255) NOT NULL,
  `f_4` varchar(255) NOT NULL,
  `f_4_email` varchar(255) NOT NULL,
  `f_5` varchar(255) NOT NULL,
  `f_5_email` varchar(255) NOT NULL,
  `g_1` varchar(255) NOT NULL,
  `g_1_email` varchar(255) NOT NULL,
  `g_2` varchar(255) NOT NULL,
  `g_2_email` varchar(255) NOT NULL,
  `s_1` varchar(255) NOT NULL,
  `s_1_email` varchar(255) NOT NULL,
  `s_2` varchar(255) NOT NULL,
  `s_2_email` varchar(255) NOT NULL,
  `h_1` varchar(255) NOT NULL,
  `h_1_email` varchar(255) NOT NULL,
  `h_2` varchar(255) NOT NULL,
  `h_2_email` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `sent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_invite`
--

CREATE TABLE `request_invite` (
  `id` int(11) NOT NULL,
  `school` varchar(256) NOT NULL,
  `semail` varchar(255) NOT NULL,
  `pemail` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `registration_code` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `school_email_id` varchar(255) NOT NULL,
  `teacher_email_id` varchar(255) NOT NULL,
  `teacher_mobile` varchar(10) NOT NULL,
  `student_incharge_name` varchar(255) NOT NULL,
  `student_incharge_email_id` varchar(255) NOT NULL,
  `student_incharge_mobile` varchar(10) NOT NULL,
  `attendance` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `registration_code`, `school_name`, `teacher_name`, `school_email_id`, `teacher_email_id`, `teacher_mobile`, `student_incharge_name`, `student_incharge_email_id`, `student_incharge_mobile`, `attendance`) VALUES
(5, '773F-42AC-903A-1C41', 'sdvfbxg', 'jhugytfrydetryftgyh', 'grsfhxcgh@gmail.com', 'mah.ansh564@gmail.com', '9953780472', 'hvjgftjykhujl', 'mah.ansh564@gmail.com', '9953780472', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`registration_code`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `request_invite`
--
ALTER TABLE `request_invite`
  ADD PRIMARY KEY (`time`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_code_2` (`registration_code`),
  ADD KEY `registration_code` (`registration_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_invite`
--
ALTER TABLE `request_invite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
