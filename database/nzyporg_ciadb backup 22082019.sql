-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 22, 2019 at 08:43 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nzyporg_ciadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cia12_age_group`
--

DROP TABLE IF EXISTS `cia12_age_group`;
CREATE TABLE IF NOT EXISTS `cia12_age_group` (
  `age_group_id` int(10) NOT NULL AUTO_INCREMENT,
  `age_group_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`age_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cia12_age_group`
--

INSERT INTO `cia12_age_group` (`age_group_id`, `age_group_name`) VALUES
(1, 'Baby'),
(10, 'primary'),
(11, 'Year 1'),
(12, 'Year 2'),
(13, 'Year 3'),
(14, 'Year 4'),
(15, 'Year 5'),
(16, 'Year 6'),
(20, 'Intermediate'),
(21, 'Year 7'),
(22, 'Year 8'),
(30, 'Highschool'),
(31, 'Year 9'),
(32, 'Year 10'),
(33, 'Year 11'),
(34, 'Year 12'),
(35, 'Year 13'),
(40, 'University'),
(41, 'University preparation'),
(42, '1st Year'),
(43, '2nd Year'),
(44, '3rd Year'),
(45, '4th Year'),
(46, '5th Year'),
(47, 'Post graduate'),
(50, 'Young Working'),
(51, 'Community'),
(52, 'Full-timer / part-timer');

-- --------------------------------------------------------

--
-- Table structure for table `cia12_category`
--

DROP TABLE IF EXISTS `cia12_category`;
CREATE TABLE IF NOT EXISTS `cia12_category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cia12_category`
--

INSERT INTO `cia12_category` (`category_id`, `category_name`) VALUES
(10, 'Primary'),
(20, 'Intermediate'),
(30, 'Highschool'),
(40, 'Campus'),
(50, 'Community');

-- --------------------------------------------------------

--
-- Table structure for table `cia12_events`
--

DROP TABLE IF EXISTS `cia12_events`;
CREATE TABLE IF NOT EXISTS `cia12_events` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `event_type_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `hall_id` int(10) DEFAULT '0',
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `events_event_type_id_idx` (`event_type_id`),
  KEY `category_events_fk` (`category_id`),
  KEY `halls_events_fk` (`hall_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COMMENT='s';

--
-- Dumping data for table `cia12_events`
--

INSERT INTO `cia12_events` (`event_id`, `event_name`, `date`, `location`, `event_type_id`, `category_id`, `hall_id`, `comments`) VALUES
(58, '2019-08-22', '2019-08-22 17:50:44', '', 2, 40, 3, ''),
(59, '2019-08-22', '2019-08-22 17:51:27', '', 1, 10, 3, ''),
(65, 'asdfasdfasdf', '2019-08-22 18:17:00', '', 0, 10, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `cia12_event_people`
--

DROP TABLE IF EXISTS `cia12_event_people`;
CREATE TABLE IF NOT EXISTS `cia12_event_people` (
  `event_people_id` int(10) NOT NULL AUTO_INCREMENT,
  `people_id` int(10) DEFAULT NULL,
  `event_id` int(10) DEFAULT NULL,
  `registered` tinyint(1) DEFAULT '0',
  `attended` tinyint(1) DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`event_people_id`),
  UNIQUE KEY `people_event_unique` (`people_id`,`event_id`),
  KEY `events_event_people_fk` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cia12_event_people`
--

INSERT INTO `cia12_event_people` (`event_people_id`, `people_id`, `event_id`, `registered`, `attended`, `paid`, `comment`) VALUES
(45, 1, 58, 0, 1, NULL, NULL),
(46, 1, 59, 0, 1, NULL, NULL),
(52, 1, 65, 0, 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cia12_event_type`
--

DROP TABLE IF EXISTS `cia12_event_type`;
CREATE TABLE IF NOT EXISTS `cia12_event_type` (
  `event_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`event_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cia12_event_type`
--

INSERT INTO `cia12_event_type` (`event_type_id`, `event_type`) VALUES
(0, 'Appointment'),
(1, 'Small Group'),
(2, 'Group meeting'),
(3, 'Church meeting'),
(4, 'Auckland event'),
(5, 'National event');

-- --------------------------------------------------------

--
-- Table structure for table `cia12_halls`
--

DROP TABLE IF EXISTS `cia12_halls`;
CREATE TABLE IF NOT EXISTS `cia12_halls` (
  `hall_id` int(10) NOT NULL AUTO_INCREMENT,
  `hall_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`hall_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cia12_halls`
--

INSERT INTO `cia12_halls` (`hall_id`, `hall_name`) VALUES
(0, 'No Hall'),
(1, 'Hall 1'),
(2, 'Hall 2'),
(3, 'Hall 3'),
(4, 'Hall 4'),
(5, 'Hall 5');

-- --------------------------------------------------------

--
-- Table structure for table `cia12_ncm_comment`
--

DROP TABLE IF EXISTS `cia12_ncm_comment`;
CREATE TABLE IF NOT EXISTS `cia12_ncm_comment` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) DEFAULT NULL,
  `songs` varchar(255) DEFAULT NULL,
  `brief report` varchar(255) DEFAULT NULL,
  `notes for improvements` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `events_ncm_comment_fk` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cia12_people`
--

DROP TABLE IF EXISTS `cia12_people`;
CREATE TABLE IF NOT EXISTS `cia12_people` (
  `people_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age_group_id` int(10) DEFAULT NULL,
  `hall_id` int(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`people_id`),
  KEY `halls_people_fk` (`hall_id`),
  KEY `age_group_people_fk` (`age_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cia12_people`
--

INSERT INTO `cia12_people` (`people_id`, `first_name`, `last_name`, `gender`, `dob`, `age_group_id`, `hall_id`, `email`, `mobile`, `address`) VALUES
(1, 'Jermin', 'Tiu', 'Male', '1989-01-18', 52, 3, 'jermin2@gmail.com', '', ''),
(6, 'Ian', 'Chen', 'Male', '0000-00-00', 42, 3, '', '', ''),
(7, 'Christian', 'Tan', 'Male', '0000-00-00', 52, 3, '', '', ''),
(8, 'Timmy', 'Chiew', 'Male', '1990-01-01', 32, 1, '', '', ''),
(9, 'Isikeli', 'Nasau', 'Male', '0000-00-00', 52, 1, '', '', ''),
(10, 'Ivy', 'Hu', 'Female', '0000-00-00', 34, 5, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cia12_user_profiles`
--

DROP TABLE IF EXISTS `cia12_user_profiles`;
CREATE TABLE IF NOT EXISTS `cia12_user_profiles` (
  `user_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `people_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `serving_primary` tinyint(4) NOT NULL DEFAULT '0',
  `serving_hs` tinyint(4) NOT NULL DEFAULT '0',
  `serving_int` tinyint(4) NOT NULL DEFAULT '0',
  `serving_campus` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_profile_id`),
  KEY `user_profile_person` (`people_id`),
  KEY `user_profile_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cia12_user_profiles`
--

INSERT INTO `cia12_user_profiles` (`user_profile_id`, `people_id`, `user_id`, `first_name`, `last_name`, `serving_primary`, `serving_hs`, `serving_int`, `serving_campus`) VALUES
(1, 1, 284242305, 'Jermin', 'Tiu', 1, 0, 1, 1),
(2, 6, 2224977364, 'dont', 'usethis', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cia12_events`
--
ALTER TABLE `cia12_events`
  ADD CONSTRAINT `cia12_events_ibfk_1` FOREIGN KEY (`event_type_id`) REFERENCES `cia12_event_type` (`event_type_id`),
  ADD CONSTRAINT `cia12_events_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `cia12_category` (`category_id`),
  ADD CONSTRAINT `cia12_events_ibfk_3` FOREIGN KEY (`hall_id`) REFERENCES `cia12_halls` (`hall_id`);

--
-- Constraints for table `cia12_event_people`
--
ALTER TABLE `cia12_event_people`
  ADD CONSTRAINT `cia12_event_people_ibfk_1` FOREIGN KEY (`people_id`) REFERENCES `cia12_people` (`people_id`),
  ADD CONSTRAINT `cia12_event_people_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `cia12_events` (`event_id`);

--
-- Constraints for table `cia12_ncm_comment`
--
ALTER TABLE `cia12_ncm_comment`
  ADD CONSTRAINT `cia12_ncm_comment_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `cia12_events` (`event_id`);

--
-- Constraints for table `cia12_people`
--
ALTER TABLE `cia12_people`
  ADD CONSTRAINT `cia12_people_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `cia12_halls` (`hall_id`),
  ADD CONSTRAINT `cia12_people_ibfk_2` FOREIGN KEY (`age_group_id`) REFERENCES `cia12_age_group` (`age_group_id`);

--
-- Constraints for table `cia12_user_profiles`
--
ALTER TABLE `cia12_user_profiles`
  ADD CONSTRAINT `user_profile_person` FOREIGN KEY (`people_id`) REFERENCES `cia12_people` (`people_id`),
  ADD CONSTRAINT `user_profile_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
