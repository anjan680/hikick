-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2014 at 12:41 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_karate`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_participant`
--

CREATE TABLE IF NOT EXISTS `t_participant` (
  `participant_id` int(11) NOT NULL AUTO_INCREMENT,
  `tournament_id` int(11) NOT NULL,
  `participant_name` varchar(80) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state_code` varchar(4) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `club_name` varchar(80) NOT NULL,
  `dob` varchar(12) NOT NULL,
  `weight` float NOT NULL,
  `choice_event_kata` tinyint(1) NOT NULL,
  `choice_event_kumite` tinyint(1) NOT NULL,
  `choice_event_weapons` tinyint(1) NOT NULL,
  `choice_event_team_kata` tinyint(1) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `picture_ext` varchar(10) NOT NULL,
  PRIMARY KEY (`participant_id`),
  UNIQUE KEY `uniq_part` (`participant_name`,`email_id`),
  KEY `tournament_id` (`tournament_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `t_participant`
--

INSERT INTO `t_participant` (`participant_id`, `tournament_id`, `participant_name`, `country`, `state_code`, `gender`, `club_name`, `dob`, `weight`, `choice_event_kata`, `choice_event_kumite`, `choice_event_weapons`, `choice_event_team_kata`, `email_id`, `contact_no`, `address`, `picture_ext`) VALUES
(1, 1, 'gyhgtvyhg', 'India', 'CH', 'M', 'clb1', '16/10/2014', 676, 0, 0, 1, 0, '6767@dfd.yuy', '787', 'gygtfuhghj', ''),
(22, 1, 'hgfhygf', 'Bangladesh', '', 'M', '', '16/10/2014', 45.78, 1, 0, 0, 1, '6767@dfd.yuy', '7567', 'hjihkh', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_tournament`
--

CREATE TABLE IF NOT EXISTS `t_tournament` (
  `tournament_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date_of_comencement` date NOT NULL,
  `hosted_events` varchar(100) NOT NULL,
  PRIMARY KEY (`tournament_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_tournament`
--

INSERT INTO `t_tournament` (`tournament_id`, `name`, `location`, `date_of_comencement`, `hosted_events`) VALUES
(1, 'Trinational National Championship', 'kolkata', '2014-12-17', 'gbhsd,fdsf,fdfsdf');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_participant`
--
ALTER TABLE `t_participant`
  ADD CONSTRAINT `t_participant_ibfk_1` FOREIGN KEY (`tournament_id`) REFERENCES `t_tournament` (`tournament_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
