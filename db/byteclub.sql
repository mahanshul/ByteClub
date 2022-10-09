-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 02:44 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `byteclub`
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
  `p_1_hr` varchar(255) NOT NULL,
  `p_2` varchar(255) NOT NULL,
  `p_2_email` varchar(255) NOT NULL,
  `p_2_hr` varchar(255) NOT NULL,
  `p_3` varchar(255) NOT NULL,
  `p_3_email` varchar(255) NOT NULL,
  `p_3_hr` varchar(255) NOT NULL,
  `p_4` varchar(255) NOT NULL,
  `p_4_email` varchar(255) NOT NULL,
  `p_4_hr` varchar(255) NOT NULL,
  `q_1` varchar(255) NOT NULL,
  `q_1_email` varchar(255) NOT NULL,
  `q_2` varchar(255) NOT NULL,
  `q_2_email` varchar(255) NOT NULL,
  `r_1` varchar(255) NOT NULL,
  `r_1_email` varchar(255) NOT NULL,
  `r_2` varchar(255) NOT NULL,
  `r_2_email` varchar(255) NOT NULL,
  `g_1` varchar(255) NOT NULL,
  `g_1_email` varchar(255) NOT NULL,
  `g_2` varchar(255) NOT NULL,
  `g_2_email` varchar(255) NOT NULL,
  `s_1` varchar(255) NOT NULL,
  `s_1_email` varchar(255) NOT NULL,
  `s_2` varchar(255) NOT NULL,
  `s_2_email` varchar(255) NOT NULL,
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
  `email` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_invite`
--

INSERT INTO `request_invite` (`id`, `school`, `email`, `time`, `ip`) VALUES
(1, 'BAL BHARARTI PUBLIC SCHOOL SECTOR 14 ROHINI', 'bbpsrh@gmail.com', '2018-07-06 09:49:37', '141.101.107.159'),
(2, 'Bal Bharati Public School, Noida', 'bbpsnd@yahoo.co.in', '2018-07-06 13:41:19', '162.158.154.130'),
(3, 'Manav Sthali School', 'info@manavsthalischool.com', '2018-07-09 09:17:00', '122.160.26.187');

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
(1, '8A81-4201-A77D-06D8', 'BAL BHARARTI PUBLIC SCHOOL SECTOR 14 ROHINI', 'SHIKHA THAKUR', 'bbpsrh@gmail.com', 'thakurshikhahere@gmail.com', '9871657028', 'Bhavya Bhatia', '', '', 0),
(2, '773C-4B14-9630-1800', 'Bal Bharati Public School, Noida', 'Meetu Tripathi', 'bbpsnd@yahoo.co.in', 'meetu.bbps@gmail.com', '9818751479', 'Ojas Ankit', '', '', 0),
(3, '29F9-4551-9304-28F8', '', '', '', '', '', '', '', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
