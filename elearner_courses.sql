-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2016 at 12:27 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearner_courses`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `email` varchar(10000) NOT NULL,
  `name` varchar(10000) NOT NULL,
  `message_details` varchar(10000) NOT NULL,
  `is_closed` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_codes`
--

CREATE TABLE `coupon_codes` (
  `id` int(11) NOT NULL,
  `id_coupon` varchar(20000) NOT NULL,
  `coupon_percent` varchar(20000) NOT NULL,
  `coupon_for` int(255) DEFAULT '0',
  `user_ids` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_tutorial_key`
--

CREATE TABLE `course_tutorial_key` (
  `id` int(11) NOT NULL,
  `course_name` varchar(2000) NOT NULL,
  `course_description` longtext NOT NULL,
  `course_intro_video` varchar(2000) NOT NULL,
  `course_intro_image` varchar(2000) NOT NULL,
  `course_price` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_setting`
--

CREATE TABLE `paypal_setting` (
  `id` int(11) NOT NULL,
  `secret_id` int(255) NOT NULL,
  `public_id` int(255) NOT NULL,
  `type` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_apps`
--

CREATE TABLE `user_apps` (
  `id` int(11) NOT NULL,
  `first_name` varchar(2000) NOT NULL,
  `second_name` varchar(2000) NOT NULL,
  `email` varchar(2000) NOT NULL,
  `mobile` varchar(2000) NOT NULL,
  `curr_activation_code` varchar(1500) DEFAULT NULL,
  `is_admin` int(255) NOT NULL DEFAULT '0',
  `is_disabled` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_apps`
--

INSERT INTO `user_apps` (`id`, `first_name`, `second_name`, `email`, `mobile`, `curr_activation_code`, `is_admin`, `is_disabled`) VALUES
(2, 'Ahmed', 'Nagi', 'montasser@gmail.com', '0181788445', NULL, 0, 0),
(3, 'Seleem', 'Talat', 'montasser@gmail.com', '0154842112', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_course_transactions`
--

CREATE TABLE `user_course_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `is_paid` int(255) NOT NULL DEFAULT '0',
  `created_on` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_setting`
--

CREATE TABLE `user_setting` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `last_login` varchar(10000) DEFAULT NULL,
  `browser_name` varchar(10000) DEFAULT NULL,
  `os_type` varchar(10000) DEFAULT NULL,
  `device_name` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video_inprogress`
--

CREATE TABLE `video_inprogress` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `video_tut_id` int(255) NOT NULL,
  `video_related_id` int(255) NOT NULL,
  `video_progress_minute` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video_tuts`
--

CREATE TABLE `video_tuts` (
  `id` int(11) NOT NULL,
  `course_id` int(255) NOT NULL,
  `lesson_name` varchar(2000) NOT NULL,
  `lesson_description` varchar(2000) NOT NULL,
  `lesson_video_data` longblob NOT NULL,
  `lesson_video_url` varchar(2000) NOT NULL,
  `lesson_video_size` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `website_setting`
--

CREATE TABLE `website_setting` (
  `id` int(11) NOT NULL,
  `website_name` varchar(10000) NOT NULL,
  `website_logo` varchar(10000) NOT NULL,
  `website_status` int(255) NOT NULL DEFAULT '1',
  `website_description` varchar(10000) NOT NULL,
  `website_keywords` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_codes`
--
ALTER TABLE `coupon_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tutorial_key`
--
ALTER TABLE `course_tutorial_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_setting`
--
ALTER TABLE `paypal_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_apps`
--
ALTER TABLE `user_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_course_transactions`
--
ALTER TABLE `user_course_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_setting`
--
ALTER TABLE `user_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_inprogress`
--
ALTER TABLE `video_inprogress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_tuts`
--
ALTER TABLE `video_tuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_setting`
--
ALTER TABLE `website_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupon_codes`
--
ALTER TABLE `coupon_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course_tutorial_key`
--
ALTER TABLE `course_tutorial_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paypal_setting`
--
ALTER TABLE `paypal_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_apps`
--
ALTER TABLE `user_apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_course_transactions`
--
ALTER TABLE `user_course_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_setting`
--
ALTER TABLE `user_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_inprogress`
--
ALTER TABLE `video_inprogress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video_tuts`
--
ALTER TABLE `video_tuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `website_setting`
--
ALTER TABLE `website_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
