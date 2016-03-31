-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2016 at 10:34 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `angon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(5) NOT NULL,
  `admin_full_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_address` text CHARACTER SET utf8 NOT NULL,
  `admin_zip` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_city` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_country` varchar(255) CHARACTER SET utf32 NOT NULL,
  `admin_status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inactive',
  `admin_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_updated_by` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_full_name`, `admin_email`, `admin_password`, `admin_phone`, `admin_address`, `admin_zip`, `admin_city`, `admin_country`, `admin_status`, `admin_updated_on`, `admin_updated_by`) VALUES
(1, 'ADMIN', 'admin@angon.com', '21232f297a57a5a74#kkrdf#3894a0e4a801fc3', '01717940150', 'Nikunja', '1229', 'Dhaka', '20', 'active', '2016-03-30 09:12:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `angon_event`
--

CREATE TABLE IF NOT EXISTS `angon_event` (
  `angon_event_id` int(11) NOT NULL,
  `angon_event_title` varchar(255) NOT NULL,
  `angon_event_image` varchar(255) NOT NULL,
  `angon_event_short_details` text NOT NULL,
  `angon_event_details` text NOT NULL,
  `angon_event_date` date NOT NULL,
  `angon_event_time` time NOT NULL,
  `angon_event_venue` text NOT NULL,
  `angon_event_is_upcoming` enum('Yes','No') NOT NULL,
  `angon_event_status` enum('Active','Inactive') NOT NULL,
  `angon_event_created_by` int(11) NOT NULL,
  `angon_event_created_on` datetime NOT NULL,
  `angon_event_updated_by` int(11) NOT NULL,
  `angon_event_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `angon_event`
--

INSERT INTO `angon_event` (`angon_event_id`, `angon_event_title`, `angon_event_image`, `angon_event_short_details`, `angon_event_details`, `angon_event_date`, `angon_event_time`, `angon_event_venue`, `angon_event_is_upcoming`, `angon_event_status`, `angon_event_created_by`, `angon_event_created_on`, `angon_event_updated_by`, `angon_event_updated_on`) VALUES
(1, 'Event Title 1', 'PIMG_20160331124043.jpg', 'Opening Asrayon-2 at Barisal', '', '2016-03-31', '02:00:00', '', 'Yes', 'Active', 1, '2016-03-31 12:40:43', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_status` enum('Active','Inactive') NOT NULL,
  `banner_created_on` datetime NOT NULL,
  `banner_created_by` int(11) NOT NULL,
  `banner_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `banner_updated_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_title`, `banner_image`, `banner_status`, `banner_created_on`, `banner_created_by`, `banner_updated_on`, `banner_updated_by`) VALUES
(5, 'Title 1', 'PIMG_20160330155740.png', 'Active', '2016-03-30 15:57:40', 1, '2016-03-30 22:08:26', 0),
(6, 'Title 2', 'PIMG_20160330161753.png', 'Active', '2016-03-30 16:17:53', 1, '2016-03-30 22:08:31', 0),
(7, 'Title 3', 'PIMG_20160330161827.png', 'Active', '2016-03-30 16:18:27', 1, '2016-03-30 22:08:36', 0),
(8, 'Title 4', 'PIMG_20160331041836.png', 'Active', '2016-03-31 04:18:36', 1, '2016-03-30 22:18:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_short_details` varchar(255) NOT NULL,
  `news_details` text NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_date` date NOT NULL,
  `news_status` enum('Active','Inactive','Archive') NOT NULL,
  `news_created_by` int(11) NOT NULL,
  `news_created_on` datetime NOT NULL,
  `news_updated_by` int(11) NOT NULL,
  `news_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_short_details`, `news_details`, `news_image`, `news_date`, `news_status`, `news_created_by`, `news_created_on`, `news_updated_by`, `news_updated_on`) VALUES
(1, 'Title 1', 'short demo', 'short demo', 'PIMG_20160331100618.jpg', '2016-03-15', 'Active', 1, '2016-03-31 10:06:18', 0, '2016-03-31 04:06:18'),
(2, 'Title 2', 'short demo short demo', 'short demo short demo', 'PIMG_20160331100655.jpg', '2016-03-01', 'Active', 1, '2016-03-31 10:06:55', 0, '2016-03-31 04:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_image` varchar(255) NOT NULL,
  `project_status` enum('Active','Inactive') NOT NULL,
  `project_created_on` datetime NOT NULL,
  `project_created_by` int(11) NOT NULL,
  `project_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_updated_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_title`, `project_image`, `project_status`, `project_created_on`, `project_created_by`, `project_updated_on`, `project_updated_by`) VALUES
(1, 'Project 1', 'PIMG_20160331042454.jpg', 'Active', '2016-03-31 04:24:54', 1, '2016-03-30 22:38:41', 1),
(2, 'Project 2', 'PIMG_20160331043855.jpg', 'Active', '2016-03-31 04:38:55', 1, '2016-03-30 22:38:55', 0),
(3, 'Project 3', 'PIMG_20160331043930.jpg', 'Active', '2016-03-31 04:39:30', 1, '2016-03-30 22:39:30', 0),
(4, 'Project 4', 'PIMG_20160331043942.jpg', 'Active', '2016-03-31 04:39:42', 1, '2016-03-30 22:39:43', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `angon_event`
--
ALTER TABLE `angon_event`
  ADD PRIMARY KEY (`angon_event_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `angon_event`
--
ALTER TABLE `angon_event`
  MODIFY `angon_event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
