-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2016 at 05:34 PM
-- Server version: 5.5.48-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arkhairu_angon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
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
  `admin_updated_by` int(5) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

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
  `angon_event_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `angon_event_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`angon_event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `angon_event`
--

INSERT INTO `angon_event` (`angon_event_id`, `angon_event_title`, `angon_event_image`, `angon_event_short_details`, `angon_event_details`, `angon_event_date`, `angon_event_time`, `angon_event_venue`, `angon_event_is_upcoming`, `angon_event_status`, `angon_event_created_by`, `angon_event_created_on`, `angon_event_updated_by`, `angon_event_updated_on`) VALUES
(1, 'Public awareness', 'PIMG_20160331162424.jpg', 'Public awareness regarding the facilities provided by the centre is created and enhanced through advertising programs over different forms of media.', '&lt;span style="color:#646464;font-family:Arial, Helvetica, sans-serif;font-size:13.3333px;line-height:18px;text-align:justify;background-color:#f4f5f6;"&gt;Public awareness regarding the facilities provided by the centre is created and enhanced through advertising programs over different forms of media. The facilities provided by the centre and the thoughts of the residing elderly are made known to the public by different TV channels either talk shows or by direct video telecast. Leaflets summarizing all of the centre&amp;rsquo;s features and facilities are often distributed at different mosques and social functions. As and when the centre is informed of any helpless elderly over the age of sixty, it brings that person at centre&amp;rsquo;s own cost for giving shelter in the centre. At present there are accommodation facilities for about 1200 old people in the centre.&lt;/span&gt;', '2016-03-31', '02:00:00', 'Dhaka,Gazipur.', 'Yes', 'Active', 1, '2016-03-31 16:24:24', 0, '2016-03-31 10:24:24'),
(3, 'Angon Will Celebrate World Environment Day', 'PIMG_20160331155423.jpg', 'Dedicated volunteers of our Angon  performed an extremely commendable job during the World Environment Day. The team took initiative to clean Dhaka.', '&lt;p&gt;Dedicated volunteers of our Angon &amp;nbsp;performed an extremely commendable job during the World Environment Day. The team took initiative to clean Dhaka.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Dedicated volunteers of our Angon &amp;nbsp;performed an extremely commendable job during the World Environment Day. The team took initiative to clean Dhaka.&amp;nbsp;&lt;/p&gt;', '2016-05-25', '13:30:00', 'Dhaka', 'Yes', 'Active', 1, '2016-03-31 15:54:23', 0, '2016-03-31 09:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_status` enum('Active','Inactive') NOT NULL,
  `banner_created_on` datetime NOT NULL,
  `banner_created_by` int(11) NOT NULL,
  `banner_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `banner_updated_by` int(11) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_title`, `banner_image`, `banner_status`, `banner_created_on`, `banner_created_by`, `banner_updated_on`, `banner_updated_by`) VALUES
(5, 'Title 1', 'PIMG_20160330155740.png', 'Active', '2016-03-30 15:57:40', 1, '2016-03-30 22:08:26', 0),
(6, 'Title 2', 'PIMG_20160330161753.png', 'Active', '2016-03-30 16:17:53', 1, '2016-03-30 22:08:31', 0),
(7, 'Title 3', 'PIMG_20160330161827.png', 'Active', '2016-03-30 16:18:27', 1, '2016-03-30 22:08:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_short_details` varchar(255) NOT NULL,
  `news_details` text NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_date` date NOT NULL,
  `news_status` enum('Active','Inactive','Archive') NOT NULL,
  `news_created_by` int(11) NOT NULL,
  `news_created_on` datetime NOT NULL,
  `news_updated_by` int(11) NOT NULL,
  `news_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_short_details`, `news_details`, `news_image`, `news_date`, `news_status`, `news_created_by`, `news_created_on`, `news_updated_by`, `news_updated_on`) VALUES
(1, 'Dementia Day Care', 'short demo', '&lt;p&gt;&lt;span style="color:#282828;font-family:''Open Sans'', sans-serif;font-size:13px;line-height:22px;text-align:justify;"&gt;Dementia is a progressive brain dysfunction that affects memory, thinking, behaviour and ability to perform everyday activities. Alzheimer&amp;rsquo;s disease is the most common type of dementia. After age 65, the likelihood of developing dementia roughly doubles every five years.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style="color:#282828;font-family:''Open Sans'', sans-serif;font-size:13px;line-height:22px;text-align:justify;"&gt;The aim of the centre is to provide a stimulating and conducive environment where the persons with Dementia can benefit from various occupational therapies and tender care with a good amount of rest and relaxation. The thrust is on therapeutic and remedial activities. The centre also provides tremendous relief to family members / care givers and time to do their own work as taking care of persons with dementia is a 24/7 responsibility and causes a lot of stress.&lt;/span&gt;&lt;span style="color:#282828;font-family:''Open Sans'', sans-serif;font-size:13px;line-height:22px;text-align:justify;"&gt;&lt;/span&gt;&lt;/p&gt;', 'NEIMG_20160331154615.jpg', '2016-03-15', 'Active', 1, '2016-03-31 10:06:18', 0, '2016-03-31 09:46:15'),
(2, 'Old Age Home for homeless abandoned senior citizens', 'short demo short demo', '&lt;p&gt;&lt;span style="font-family:Arial, Helvetica, sans-serif;font-size:13.44px;line-height:20.16px;"&gt;By the grace of God all the basic facilities are completely free of charge including dormitory accommodation, hygienically prepared meals, medical facilities and &amp;nbsp;day to day needs for such deprived people.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style="font-family:Arial, Helvetica, sans-serif;font-size:13.44px;line-height:20.16px;"&gt;The name of our old age home is Angon. We have yoga classes and kirtan (prayers) everyday for senior citizens. We are very concerned for their health, we regularly take them to hospitals for checkups. If they need to be admitted in hospital for any operation or treatment, we make sure the best care and treatment are provided to them. Our volunteers and committed staff work day and night to look after these senior citizens.&lt;/span&gt;&lt;span style="font-family:Arial, Helvetica, sans-serif;font-size:13.44px;line-height:20.16px;"&gt;&lt;/span&gt;&lt;/p&gt;', 'NEIMG_20160331153343.jpg', '2016-03-01', 'Active', 1, '2016-03-31 10:06:55', 0, '2016-03-31 09:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(255) NOT NULL,
  `project_image` varchar(255) NOT NULL,
  `project_status` enum('Active','Inactive') NOT NULL,
  `project_created_on` datetime NOT NULL,
  `project_created_by` int(11) NOT NULL,
  `project_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_updated_by` int(11) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_title`, `project_image`, `project_status`, `project_created_on`, `project_created_by`, `project_updated_on`, `project_updated_by`) VALUES
(1, 'Project 1', 'PIMG_20160331042454.jpg', 'Active', '2016-03-31 04:24:54', 1, '2016-03-30 22:38:41', 1),
(2, 'Project 2', 'PIMG_20160331043855.jpg', 'Active', '2016-03-31 04:38:55', 1, '2016-03-30 22:38:55', 0),
(3, 'Project 3', 'PIMG_20160331043930.jpg', 'Active', '2016-03-31 04:39:30', 1, '2016-03-30 22:39:30', 0),
(4, 'Project 4', 'PIMG_20160331162756.jpg', 'Active', '2016-03-31 04:39:42', 1, '2016-03-31 10:27:56', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
