-- phpMyAdmin SQL Dump
-- version 2.11.3deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2008 at 04:57 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.4-2ubuntu5.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `fpbatis`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL auto_increment,
  `city` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY  (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city`, `state_id`) VALUES
(1, 'Lawrence', 1),
(2, 'Topeka', 1),
(3, 'Wichita', 1),
(4, 'Seattle', 2),
(5, 'Redmond', 2),
(6, 'Spokane', 2),
(7, 'Dallas', 3),
(8, 'Austin', 3),
(9, 'San Antonio', 3),
(10, 'Toronto', 4),
(11, 'Sudbury', 4),
(12, 'Golden Horseshoe', 4),
(13, 'Quebec City', 5),
(14, 'Montreal', 5),
(15, 'Port Cartier', 5),
(16, 'Victoria', 6),
(17, 'Vancouver', 6),
(18, 'Prince George', 6),
(19, 'Durango', 7),
(20, 'El Salto', 7),
(21, 'Lerdo', 7),
(22, 'Puebla', 8),
(23, 'Atlixco', 8),
(24, 'Cholula', 8),
(25, 'Xalapa', 9),
(26, 'Poza Rica', 9),
(27, 'Coatepec', 9);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL auto_increment,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY  (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country`) VALUES
(1, 'United States of America'),
(2, 'Canada'),
(3, 'Mexico');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `state_id` int(11) NOT NULL auto_increment,
  `state` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY  (`state_id`),
  KEY `country_id` (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state`, `country_id`) VALUES
(1, 'Kansas', 1),
(2, 'Washington', 1),
(3, 'Texas', 1),
(4, 'Ontario', 2),
(5, 'Quebec', 2),
(6, 'British Columbia', 2),
(7, 'Durango', 3),
(8, 'Puebla', 3),
(9, 'Veracruz', 3);
