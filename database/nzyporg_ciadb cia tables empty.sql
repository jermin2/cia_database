-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 14, 2019 at 10:56 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

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
(47, 'Post graduate');

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
(0, 'Primary'),
(1, 'Intermediate'),
(2, 'Highschool'),
(3, 'Campus'),
(4, 'Community');

-- --------------------------------------------------------

--
-- Table structure for table `cia12_events`
--

DROP TABLE IF EXISTS `cia12_events`;
CREATE TABLE IF NOT EXISTS `cia12_events` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `event_type_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `hall` int(10) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `events_event_type_id_idx` (`event_type_id`),
  KEY `category_events_fk` (`category_id`),
  KEY `halls_events_fk` (`hall`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='s';

-- --------------------------------------------------------

--
-- Table structure for table `cia12_event_people`
--

DROP TABLE IF EXISTS `cia12_event_people`;
CREATE TABLE IF NOT EXISTS `cia12_event_people` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `people_id` int(10) DEFAULT NULL,
  `events_id` int(10) DEFAULT NULL,
  `registered` tinyint(10) DEFAULT NULL,
  `attended` tinyint(10) DEFAULT NULL,
  `paid` tinyint(10) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `people_event_people_fk` (`people_id`),
  KEY `events_event_people_fk` (`events_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
  `hall` int(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`people_id`),
  KEY `halls_people_fk` (`hall`),
  KEY `age_group_people_fk` (`age_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cia12_people`
--

INSERT INTO `cia12_people` (`people_id`, `first_name`, `last_name`, `gender`, `dob`, `age_group_id`, `hall`, `email`, `mobile`, `address`) VALUES
(1, 'Jermin', 'Tiu', 'Male', '1989-01-18', 35, 1, 'jermin2@gmail.com', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cia12_events`
--
ALTER TABLE `cia12_events`
  ADD CONSTRAINT `cia12_events_ibfk_1` FOREIGN KEY (`event_type_id`) REFERENCES `cia12_event_type` (`event_type_id`),
  ADD CONSTRAINT `cia12_events_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `cia12_category` (`category_id`),
  ADD CONSTRAINT `cia12_events_ibfk_3` FOREIGN KEY (`hall`) REFERENCES `cia12_halls` (`hall_id`);

--
-- Constraints for table `cia12_event_people`
--
ALTER TABLE `cia12_event_people`
  ADD CONSTRAINT `cia12_event_people_ibfk_1` FOREIGN KEY (`people_id`) REFERENCES `cia12_people` (`people_id`),
  ADD CONSTRAINT `cia12_event_people_ibfk_2` FOREIGN KEY (`events_id`) REFERENCES `cia12_events` (`event_id`);

--
-- Constraints for table `cia12_ncm_comment`
--
ALTER TABLE `cia12_ncm_comment`
  ADD CONSTRAINT `cia12_ncm_comment_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `cia12_events` (`event_id`);

--
-- Constraints for table `cia12_people`
--
ALTER TABLE `cia12_people`
  ADD CONSTRAINT `cia12_people_ibfk_1` FOREIGN KEY (`hall`) REFERENCES `cia12_halls` (`hall_id`),
  ADD CONSTRAINT `cia12_people_ibfk_2` FOREIGN KEY (`age_group_id`) REFERENCES `cia12_age_group` (`age_group_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
