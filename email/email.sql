-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2013 at 06:26 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sandbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertiser`
--

CREATE TABLE `advertiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advertiser` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `advertiser`
--

INSERT INTO `advertiser` (`id`, `advertiser`) VALUES
(1, 'b'),
(2, '2'),
(3, '222'),
(4, 'eee'),
(5, 'bbb'),
(6, '123'),
(7, 'adf'),
(8, '22'),
(9, '2222'),
(10, 'eef'),
(11, 'ccc'),
(12, 'ee'),
(13, 'ffadf'),
(14, 'asdf'),
(15, 'aer'),
(16, 'dfasf'),
(17, 'erawer'),
(18, 'dfg'),
(19, 'ff'),
(20, 'tt'),
(21, 'yy'),
(22, 'est');

-- --------------------------------------------------------

--
-- Table structure for table `campagin`
--

CREATE TABLE `campagin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advertiser_id` int(11) NOT NULL,
  `network_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `domain_id` int(11) NOT NULL,
  `cluster_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `campagin`
--

INSERT INTO `campagin` (`id`, `advertiser_id`, `network_id`, `offer_id`, `domain_id`, `cluster_id`, `name`) VALUES
(1, 2, 2, 3, 3, 2, '3'),
(2, 2, 2, 3, 3, 2, '3'),
(3, 2, 2, 3, 3, 2, '3'),
(4, 2, 2, 3, 3, 2, '3'),
(5, 2, 2, 3, 4, 2, '3'),
(6, 3, 2, 3, 4, 2, '111'),
(7, 3, 2, 4, 4, 2, '111'),
(8, 3, 2, 4, 4, 2, '111'),
(9, 7, 6, 9, 8, 6, 'eee'),
(10, 9, 8, 11, 10, 10, '1111'),
(11, 9, 8, 11, 10, 9, '1111'),
(12, 3, 9, 4, 11, 11, '111'),
(13, 2, 2, 3, 10, 2, '111'),
(14, 9, 8, 11, 10, 9, '111'),
(15, 2, 2, 3, 2, 2, '1'),
(16, 2, 2, 3, 2, 2, '1'),
(17, 9, 8, 11, 10, 9, '111'),
(18, 2, 8, 3, 10, 9, '111'),
(19, 9, 8, 4, 4, 2, '111'),
(20, 5, 4, 6, 13, 4, 'aaa'),
(21, 13, 14, 15, 16, 17, '2442'),
(22, 15, 17, 8, 18, 18, '2442'),
(23, 7, 16, 12, 19, 20, '2123'),
(24, 12, 22, 13, 17, 6, 'ee'),
(25, 12, 22, 13, 17, 6, 'ee'),
(26, 20, 23, 19, 22, 22, 'tt'),
(27, 21, 24, 20, 23, 23, 'yy'),
(28, 22, 25, 21, 24, 24, 'i lvoe'),
(29, 4, 13, 13, 8, 6, 'ddd');

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE `cluster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cluster` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`id`, `cluster`) VALUES
(1, 'f'),
(2, '6'),
(3, '21'),
(4, 'fff'),
(5, 'adf'),
(6, 'ee'),
(7, 'dd'),
(8, '66'),
(9, '6666'),
(10, '6663'),
(11, '666'),
(12, 'ffdee'),
(13, '123'),
(14, 'ff'),
(15, 'ddd'),
(16, 'ggg'),
(17, 'adfee'),
(18, 'af'),
(19, 'eee'),
(20, 'asdf'),
(21, 'eefasefc'),
(22, 'tt'),
(23, 'yy'),
(24, 'look');

-- --------------------------------------------------------

--
-- Table structure for table `creative`
--

CREATE TABLE `creative` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campagin_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `creative`
--

INSERT INTO `creative` (`id`, `campagin_id`, `name`) VALUES
(1, 29, 'eee'),
(2, 0, ''),
(3, 29, 'oop'),
(4, 29, 'adsf'),
(5, 24, 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`id`, `domain`) VALUES
(1, 'e'),
(2, '5'),
(3, 'http://www.espn.com'),
(4, 'http://www.espns.com'),
(5, '1'),
(6, 'eeeeee'),
(7, 'aeeee'),
(8, 'ff'),
(9, '55'),
(10, '5555'),
(11, '555'),
(12, 'asdf'),
(13, 'eee'),
(14, 'fff'),
(15, 'aaa'),
(16, 'eerasdf'),
(17, 'ee'),
(18, 'adsf'),
(19, 'adf'),
(20, 'asf'),
(21, 'adfsdee'),
(22, 'tt'),
(23, 'yy'),
(24, 'eeeppook');

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` int(11) NOT NULL,
  `domain` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `domain`) VALUES
(1, 'http://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creative_id` int(11) DEFAULT NULL,
  `img` blob,
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE `network` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `network` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `network`
--

INSERT INTO `network` (`id`, `network`) VALUES
(1, 'c'),
(2, '3'),
(3, 'dda'),
(4, 'ccc'),
(5, 'df'),
(6, 'eee'),
(7, '33'),
(8, '3333'),
(9, '333'),
(10, 'eaf'),
(11, 'bbb'),
(12, 'ff'),
(13, 'fff'),
(14, 'eers'),
(15, 'eradf'),
(16, 'asdf'),
(17, 'adf'),
(18, 'ewaraewr'),
(19, 'awer'),
(20, 'adfa'),
(21, 'fadf'),
(22, 'ee'),
(23, 'tt'),
(24, 'yy'),
(25, 'erasd');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `offer`) VALUES
(1, 'd'),
(2, 'f'),
(3, '4'),
(4, '444'),
(5, 'eda'),
(6, 'ddd'),
(7, 'dd'),
(8, 'asdf'),
(9, 'eee'),
(10, '44'),
(11, '4444'),
(12, 'adf'),
(13, 'ee'),
(14, 'eeee'),
(15, 'ssasdf'),
(16, 'aaa'),
(17, 'adfdfadf'),
(18, 'ff'),
(19, 'tt'),
(20, 'yy'),
(21, 'easdf');
