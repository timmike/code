-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2013 at 06:35 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sandbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creative_id` int(11) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `creative_id`, `name`, `file_name`) VALUES
(1, 1, 'asdf', 'adf'),
(2, 1, 'test1/test', 'c:\\windows\\temp\\php67f.tmp'),
(3, 1, 'asdf', 'c:\\windows\\temp\\php682.tmp'),
(4, 1, 'asdf', 'c:\\windows\\temp\\php68a.tmp'),
(5, 2, 'ee', 'c:\\windows\\temp\\php68e.tmp'),
(6, 2, 'ee', ''),
(7, 2, 'ee', 'c:\\windows\\temp\\php6a1.tmp'),
(8, 2, 'adf', 'c:\\windows\\temp\\php6ab.tmp'),
(9, 2, 'adf', 'c:\\windows\\temp\\php6c3.tmp'),
(10, 2, 'fff', 'c:windows	empphp6cd.tmp'),
(11, 2, 'adf', 'c:windows	empphp6d5.tmp'),
(12, 2, 'adf', 'c:windows	empphp6d6.tmp'),
(13, 2, 'adf', 'c:windows	empphp6da.tmp'),
(14, 2, 'adf', 'c:windows	empphp6dc.tmp'),
(15, 2, 'adf', 'c:windows	empphp6e0.tmp'),
(16, 2, 'adf', 'c:windows	empphp6e3.tmp'),
(17, 2, 'adf', 'c:windows	empphp6e7.tmp'),
(18, 2, 'adf', 'c:windows	empphp6eb.tmp'),
(19, 2, 'adf', 'c:windows	empphp6ec.tmp'),
(20, 2, 'adf', 'c:windows	empphp6f4.tmp'),
(21, 2, 'adf', 'c:windows	empphp6fe.tmp'),
(22, 2, 'adf', 'c:windows	empphp707.tmp'),
(23, 2, 'adf', 'c:windows	empphp708.tmp'),
(24, 2, 'adf', 'c:windows	empphp710.tmp'),
(25, 2, 'adf', 'pix.jpg'),
(26, 2, 'adf', 'pix.jpg'),
(27, 2, 'adf', 'pix.jpg'),
(28, 2, 'adf', 'pix.jpg'),
(29, 2, 'adf', 'pix.jpg'),
(30, 2, 'ddeerr', 'pix.jpg'),
(31, 4, 'eeee', 'pix.jpg'),
(32, 4, 'eardf', 'pix.jpg'),
(33, 4, 'adfasdf', 'pix2.jpg'),
(34, 4, 'adfadf', 'laura.jpg'),
(35, 6, 'sadfasf', 'multi-site.jpg'),
(36, 7, 'asdfasdf', 'laura.jpg'),
(37, 13, 'asdfasdf', 'laura.jpg'),
(38, 13, 'adsfasdf', 'multi-site.jpg'),
(39, 15, 'fff', 'img_0441.jpg'),
(40, 15, 'rr', 'laura.jpg'),
(41, 18, 'eee', 'multi-site.jpg');
