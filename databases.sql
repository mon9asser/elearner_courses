-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2016 at 10:23 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elearner_courses`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(4, 'Programming'),
(5, 'Web Design');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE IF NOT EXISTS `contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(10000) NOT NULL,
  `name` varchar(10000) NOT NULL,
  `message_details` varchar(10000) NOT NULL,
  `is_closed` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_codes`
--

CREATE TABLE IF NOT EXISTS `coupon_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_coupon` varchar(20000) NOT NULL,
  `coupon_percent` varchar(20000) NOT NULL,
  `coupon_for` int(255) DEFAULT '0',
  `user_ids` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course_tutorial_key`
--

CREATE TABLE IF NOT EXISTS `course_tutorial_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(255) NOT NULL,
  `course_name` varchar(2000) DEFAULT NULL,
  `course_description` longtext,
  `course_intro_video` varchar(2000) DEFAULT NULL,
  `course_intro_image` varchar(2000) DEFAULT NULL,
  `course_price` varchar(2000) DEFAULT NULL,
  `course_for` varchar(3500) DEFAULT NULL,
  `course_will_learn` longtext,
  `is_feature` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `course_tutorial_key`
--

INSERT INTO `course_tutorial_key` (`id`, `category_id`, `course_name`, `course_description`, `course_intro_video`, `course_intro_image`, `course_price`, `course_for`, `course_will_learn`, `is_feature`) VALUES
(32, 5, 'Prograamming Item', 'WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v ', NULL, 'courses_covers/462500slide1.jpg', '995', 'WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v ', 'WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v WordPress Blugin Prograamming Item v ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_setting`
--

CREATE TABLE IF NOT EXISTS `paypal_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` mediumtext NOT NULL,
  `client_secret` varchar(25500) NOT NULL,
  `mode` varchar(2000) NOT NULL DEFAULT 'sandbox',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `paypal_setting`
--

INSERT INTO `paypal_setting` (`id`, `client_id`, `client_secret`, `mode`) VALUES
(1, 'AYunim8oK_OJv2g8FBExMV6J4EuDOiEatb3oFBLJnDnCr0J1bLwqcLPHQCaVYBMCsdpEowmYnG4jVrpQ', 'EIPOvufsWBa98B_v2Qn2g4_exelEgf9uo1D96Aq2NbaGPVTmUT4JMLLUivp89NZw3NrN49R90ekiVWSG', 'sandbox');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(1000) NOT NULL,
  `course_id` varchar(1000) NOT NULL,
  `payment_id` varchar(1000) NOT NULL,
  `payer_id` varchar(1000) NOT NULL,
  `course_price` varchar(1000) NOT NULL,
  `payment_email` varchar(1000) NOT NULL,
  `first_name` varchar(1000) NOT NULL,
  `last_name` varchar(1000) NOT NULL,
  `recipient_name` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `country_code` varchar(1000) NOT NULL,
  `datemade` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `course_id`, `payment_id`, `payer_id`, `course_price`, `payment_email`, `first_name`, `last_name`, `recipient_name`, `city`, `country_code`, `datemade`) VALUES
(1, '12', '28', 'PAY-46L97268RS601313MK5EKRCY', 'TLXECTHPVH4L2', '28', 'ben@pay-pal.com', 'Ben', 'Nash', 'Ben Nash', 'San Jose', 'US', ''),
(2, '12', '28', 'PAY-1KJ930873U429132JK5EKSRQ', 'TLXECTHPVH4L2', '28', 'ben@pay-pal.com', 'Ben', 'Nash', 'Ben Nash', 'San Jose', 'US', ''),
(3, '12', '28', 'PAY-3VS53794XY409211NK5EKVQQ', 'TLXECTHPVH4L2', '28', 'ben@pay-pal.com', 'Ben', 'Nash', 'Ben Nash', 'San Jose', 'US', ''),
(4, '12', '28', 'PAY-99T16051A1193772KK5ED53I', 'TLXECTHPVH4L2', '28', 'ben@pay-pal.com', 'Ben', 'Nash', 'Ben Nash', 'San Jose', 'US', '1464382113'),
(5, '12', '31', 'PAY-4J959409CK536245SK5EMMNQ', 'TLXECTHPVH4L2', '31', 'ben@pay-pal.com', 'Ben', 'Nash', 'Ben Nash', 'San Jose', 'US', '1464387177'),
(6, '12', '32', 'PAY-4U797956CX999291XK5E6P3Q', 'TLXECTHPVH4L2', '32', 'ben@pay-pal.com', 'Ben', 'Nash', 'Ben Nash', 'San Jose', 'US', '1464461333'),
(7, '13', '32', 'PAY-7MP23134UP9692245K5FSXZY', 'TLXECTHPVH4L2', '32', 'ben@pay-pal.com', 'Ben', 'Nash', 'Ben Nash', 'San Jose', 'US', '1464544260'),
(8, '13', '32', 'PAY-450293438A372850BK5FT3IY', 'TLXECTHPVH4L2', '32', 'ben@pay-pal.com', 'Ben', 'Nash', 'Ben Nash', 'San Jose', 'US', '1464548847'),
(9, '13', '32', 'PAY-3EC36325DM262672SK5FT73I', 'TLXECTHPVH4L2', '32', 'ben@pay-pal.com', 'Ben', 'Nash', 'Ben Nash', 'San Jose', 'US', '1464549381');

-- --------------------------------------------------------

--
-- Table structure for table `user_apps`
--

CREATE TABLE IF NOT EXISTS `user_apps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(2000) DEFAULT NULL,
  `second_name` varchar(2000) DEFAULT NULL,
  `email` varchar(2000) DEFAULT NULL,
  `password` varchar(2000) DEFAULT NULL,
  `mobile` varchar(2000) DEFAULT NULL,
  `avatar` longblob,
  `curr_activation_code` varchar(1500) DEFAULT NULL,
  `is_admin` int(255) NOT NULL DEFAULT '0',
  `is_disabled` int(255) NOT NULL DEFAULT '0',
  `is_deleted` int(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_apps`
--

INSERT INTO `user_apps` (`id`, `first_name`, `second_name`, `email`, `password`, `mobile`, `avatar`, `curr_activation_code`, `is_admin`, `is_disabled`, `is_deleted`) VALUES
(7, 'Moneer', 'Khatab', 'Khatab@gmail.com', 'f379eaf3c831b04de153469d1bec345e', '0101654', NULL, NULL, 1, 0, 0),
(8, 'Islam', 'Labeeb', 'Islam@gmail.com', 'f379eaf3c831b04de153469d1bec345e', '0101654', NULL, NULL, 0, 0, 0),
(9, 'Moneer', 'Salem', 'Moneer@gmail.com', 'f379eaf3c831b04de153469d1bec345e', '012365823665', NULL, NULL, 1, 0, 0),
(10, 'Khaled', 'El sami', 'khaled@yaho.com', 'f379eaf3c831b04de153469d1bec345e', '023154559', NULL, NULL, 0, 0, 0),
(11, 'Nasef', 'Khaled', 'khaled_2000@yaho.com', '4297f44b13955235245b2497399d7a93', '023154559', NULL, NULL, 0, 0, 0),
(13, 'Montasser', 'Mossallem', 'moun2030@gmail.com', 'f379eaf3c831b04de153469d1bec345e', '666666', NULL, NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_course_transactions`
--

CREATE TABLE IF NOT EXISTS `user_course_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `is_paid` int(255) NOT NULL DEFAULT '0',
  `created_on` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_definations`
--

CREATE TABLE IF NOT EXISTS `user_definations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `avatar` varchar(1000) DEFAULT NULL,
  `job_title` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_setting`
--

CREATE TABLE IF NOT EXISTS `user_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `last_login` varchar(10000) DEFAULT NULL,
  `browser_name` varchar(10000) DEFAULT NULL,
  `os_type` varchar(10000) DEFAULT NULL,
  `device_name` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `video_inprogress`
--

CREATE TABLE IF NOT EXISTS `video_inprogress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `video_tut_id` int(255) NOT NULL,
  `video_related_id` int(255) NOT NULL,
  `video_progress_minute` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `video_tuts`
--

CREATE TABLE IF NOT EXISTS `video_tuts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(255) NOT NULL,
  `lesson_name` varchar(2000) DEFAULT NULL,
  `lesson_description` varchar(2000) DEFAULT NULL,
  `lesson_video_url` varchar(2000) DEFAULT NULL,
  `lesson_video_data` blob NOT NULL,
  `file_type` varchar(2000) DEFAULT NULL,
  `file_name` varchar(2000) DEFAULT NULL,
  `size` varchar(2550) DEFAULT NULL,
  `extension` varchar(2550) DEFAULT NULL,
  `date` varchar(2550) DEFAULT NULL,
  `lesson_video_size` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `video_tuts`
--

INSERT INTO `video_tuts` (`id`, `course_id`, `lesson_name`, `lesson_description`, `lesson_video_url`, `lesson_video_data`, `file_type`, `file_name`, `size`, `extension`, `date`, `lesson_video_size`) VALUES
(27, 28, 'inreduce', '', 'inreduce.mp4', '', 'video', 'mp4', '22.84 MB', 'mp4', 'Fri, 27 May 2016 10:04:09 +0200', '23952408'),
(28, 28, 'Zooming Into Earth From Space. Burning Up In Atmosphere. Stock Footage Video 21574 - Shutterstock', '', 'Zooming Into Earth From Space. Burning Up In Atmosphere. Stock Footage Video 21574 - Shutterstock.mp4', '', 'video', 'mp4', '1.16 MB', 'mp4', 'Fri, 27 May 2016 10:27:01 +0200', '1214903'),
(29, 28, '?????-????-????-?????-??-???-??????-??-???????-?????-??-?????-????????? - 10Youtube.com', '', '?????-????-????-?????-??-???-??????-??-???????-?????-??-?????-????????? - 10Youtube.com.mp4', '', 'video', 'mp4', '44.51 MB', 'mp4', 'Fri, 27 May 2016 10:27:04 +0200', '46676014'),
(30, 28, 'Upload-multiple-files-using-ajax-PHP - 10Youtube.com', '', 'Upload-multiple-files-using-ajax-PHP - 10Youtube.com.mp4', '', 'video', 'mp4', '56.41 MB', 'mp4', 'Fri, 27 May 2016 10:27:04 +0200', '59152023'),
(31, 31, 'Zooming Into Earth From Space. Burning Up In Atmosphere. Stock Footage Video 21574 - Shutterstock', '', 'Zooming Into Earth From Space. Burning Up In Atmosphere. Stock Footage Video 21574 - Shutterstock.mp4', '', 'video', 'mp4', '1.16 MB', 'mp4', 'Sat, 28 May 2016 00:10:49 +0200', '1214903'),
(32, 31, 'How-to-protect-and-prevent-download-html5-video-using-php - 10Youtube.com', '', 'How-to-protect-and-prevent-download-html5-video-using-php - 10Youtube.com.mp4', '', 'video', 'mp4', '12.49 MB', 'mp4', 'Sat, 28 May 2016 00:11:01 +0200', '13092628'),
(33, 31, 'Bootstrap 101 Template', '', 'Bootstrap 101 Template.mp4', '', 'video', 'mp4', '22.84 MB', 'mp4', 'Sat, 28 May 2016 00:11:03 +0200', '23952408'),
(34, 31, 'PHP-Video-Upload-Playback-Using-Database - 10Youtube.com', '', 'PHP-Video-Upload-Playback-Using-Database - 10Youtube.com.mp4', '', 'video', 'mp4', '71.44 MB', 'mp4', 'Sat, 28 May 2016 00:11:14 +0200', '74906908'),
(35, 31, 'Upload-multiple-files-using-ajax-PHP - 10Youtube.com', '', 'Upload-multiple-files-using-ajax-PHP - 10Youtube.com.mp4', '', 'video', 'mp4', '56.41 MB', 'mp4', 'Sat, 28 May 2016 00:11:14 +0200', '59152023'),
(36, 31, 'PHP-Upload-Multiple-Files-Array-Programming-Tutorial - 10Youtube.com', '', 'PHP-Upload-Multiple-Files-Array-Programming-Tutorial - 10Youtube.com.mp4', '', 'video', 'mp4', '65.98 MB', 'mp4', 'Sat, 28 May 2016 00:11:15 +0200', '69181474'),
(37, 32, 'inreduce_2', '', 'inreduce_2.mp4', '', 'video', 'mp4', '22.84 MB', 'mp4', 'Sat, 28 May 2016 00:21:14 +0200', '23952408'),
(38, 32, 'inreduce', '', 'inreduce.mp4', '', 'video', 'mp4', '22.84 MB', 'mp4', 'Sat, 28 May 2016 00:21:16 +0200', '23952408'),
(39, 32, 'PHP-Video-Upload-Playback-Using-Database - 10Youtube.com', '', 'PHP-Video-Upload-Playback-Using-Database - 10Youtube.com.mp4', '', 'video', 'mp4', '71.44 MB', 'mp4', 'Sat, 28 May 2016 00:21:22 +0200', '74906908');

-- --------------------------------------------------------

--
-- Table structure for table `website_setting`
--

CREATE TABLE IF NOT EXISTS `website_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website_name` varchar(10000) DEFAULT NULL,
  `website_logo` varchar(10000) DEFAULT NULL,
  `is_offline` int(255) NOT NULL DEFAULT '0',
  `website_description` varchar(10000) DEFAULT NULL,
  `website_keywords` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `website_setting`
--

INSERT INTO `website_setting` (`id`, `website_name`, `website_logo`, `is_offline`, `website_description`, `website_keywords`) VALUES
(16, NULL, NULL, 0, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
