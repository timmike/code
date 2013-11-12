-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2013 at 01:24 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sendmail`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign_advertiser`
--

CREATE TABLE IF NOT EXISTS `campaign_advertiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `campaign_advertiser`
--

INSERT INTO `campaign_advertiser` (`id`, `name`, `note`) VALUES
(1, 'ader 1', ''),
(2, 'ader 2', ''),
(3, 'advertiser #3', ''),
(4, 'Money', '');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_campaign`
--

CREATE TABLE IF NOT EXISTS `campaign_campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `advertiser` varchar(20) NOT NULL,
  `network` varchar(20) NOT NULL,
  `offer` varchar(20) NOT NULL,
  `domain` varchar(20) NOT NULL,
  `cluster` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `campaign_campaign`
--

INSERT INTO `campaign_campaign` (`id`, `name`, `date`, `advertiser`, `network`, `offer`, `domain`, `cluster`) VALUES
(4, 'Demo 1', '2013-03-03 02:12:04', '3', '2', '3', '3', '1'),
(5, 'camp2', '2013-03-03 02:12:14', '2', '2', '3', '2', '1'),
(6, 'camp3', '2013-03-03 02:12:24', '3', '1', '3', '3', '1'),
(7, 'camp4', '2013-03-03 02:19:53', '1', '2', '1', '2', '1'),
(8, 'camp5', '2013-03-03 02:27:50', '3', '1', '5', '2', '1'),
(10, '1', '2013-03-03 06:43:50', '1', '1', '1', '1', '1'),
(11, '1', '2013-03-03 06:44:18', '1', '1', '1', '2', '1'),
(12, '1', '2013-03-03 06:45:23', '', '', '', '', ''),
(13, 'Bestbuy', '2013-03-03 09:22:45', '2', '2', '3', '2', '1'),
(14, 'Worse Buy', '2013-03-03 18:57:21', '1', '2', '2', '2', '1'),
(15, 'Another Worse Buy', '2013-03-03 19:08:37', '2', '1', '2', '1', '1'),
(16, 'Macy''s 1', '2013-03-03 20:31:11', '2', '1', '2', '3', '1'),
(17, 'Target', '2013-03-04 17:31:19', '1', '1', '4', '1', '1'),
(18, 'Mery''s Offers1', '2013-03-04 17:41:00', '3', '2', '2', '1', '1'),
(19, '', '2013-03-05 16:17:38', '1', '', '', '', ''),
(20, 'My cam', '2013-03-05 16:17:58', '1', '2', '8', '3', '2'),
(21, 'Credit Reporting CPC', '2013-03-05 17:00:27', '2', '1', '7', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_cluster`
--

CREATE TABLE IF NOT EXISTS `campaign_cluster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `campaign_cluster`
--

INSERT INTO `campaign_cluster` (`id`, `name`, `note`) VALUES
(1, '1xx', ''),
(2, '2xx', '');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_creative`
--

CREATE TABLE IF NOT EXISTS `campaign_creative` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `campaign_creative`
--

INSERT INTO `campaign_creative` (`id`, `campaign`, `name`, `date`) VALUES
(1, 18, 'Trial', '2013-03-05 03:16:03'),
(2, 18, 'Changed #1', '2013-03-05 03:37:09'),
(3, 18, 'jil', '2013-03-05 05:21:39'),
(4, 18, 'Peter', '2013-03-05 05:23:01'),
(5, 18, 'Chu', '2013-03-05 05:24:09'),
(6, 17, 'Chow', '2013-03-05 05:24:20'),
(7, 17, 'Maybol', '2013-03-05 05:24:29'),
(8, 16, 'Sunny Cr1', '2013-03-05 05:24:48'),
(9, 15, 'Benlow', '2013-03-05 05:26:04'),
(10, 16, 'Raining', '2013-03-05 05:29:24'),
(11, 18, 'ddg', '2013-03-05 06:39:09'),
(12, 18, 'EeG', '2013-03-05 06:40:09'),
(13, 15, 'Cathwy', '2013-03-05 06:40:21'),
(14, 15, '', '2013-03-05 06:41:52'),
(15, 5, 'Cr1', '2013-03-05 06:42:06'),
(16, 18, '4g', '2013-03-05 06:44:28'),
(17, 18, '', '2013-03-05 06:44:57'),
(18, 18, '', '2013-03-05 06:45:29'),
(19, 18, '', '2013-03-05 06:45:43'),
(20, 18, 'f4g', '2013-03-05 06:50:19'),
(21, 17, 'Marco', '2013-03-05 06:50:50'),
(22, 18, 'PUrple', '2013-03-05 06:58:56'),
(23, 18, 'Hooking', '2013-03-05 07:03:55'),
(24, 16, '24 #cr', '2013-03-05 07:04:11'),
(25, 17, '25 Cr2', '2013-03-05 07:04:21'),
(26, 18, '', '2013-03-05 07:08:22'),
(27, 18, '', '2013-03-05 07:08:31'),
(28, 14, 'empy 1', '2013-03-05 07:09:47'),
(29, 14, 'empty 2', '2013-03-05 07:09:57'),
(30, 18, 'Beep', '2013-03-05 07:54:00'),
(31, 15, 'Big Fish', '2013-03-05 09:51:18'),
(32, 13, 'First time CR', '2013-03-05 09:52:35'),
(33, 13, '2nd time cr id=33', '2013-03-05 09:52:59'),
(34, 14, 'Empty 3', '2013-03-05 16:50:51'),
(35, 10, 'CC1', '2013-03-05 16:08:26'),
(36, 20, '56', '2013-03-05 16:31:48'),
(37, 20, 'Sail 3', '2013-03-05 16:58:34'),
(38, 20, 'ChiTai', '2013-03-05 16:04:18'),
(39, 8, 'Change1', '2013-03-05 16:36:30'),
(40, 8, '2', '2013-03-05 16:37:02'),
(41, 21, '3/5 CR1', '2013-03-05 17:00:49'),
(42, 21, 'c3', '2013-03-07 16:37:09'),
(43, 21, '2', '2013-03-07 16:54:44'),
(44, 21, 'Cr 3/11th', '2013-03-11 16:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_domain`
--

CREATE TABLE IF NOT EXISTS `campaign_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `campaign_domain`
--

INSERT INTO `campaign_domain` (`id`, `name`, `note`) VALUES
(1, 'Yahoo', ''),
(2, 'Gmail', ''),
(3, 'AT&T', '');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_linkid`
--

CREATE TABLE IF NOT EXISTS `campaign_linkid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creative` int(11) NOT NULL,
  `description` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `campaign_linkid`
--

INSERT INTO `campaign_linkid` (`id`, `creative`, `description`, `address`, `image`) VALUES
(1, 30, 'System Optout', 'http://www.google.com', 'http://localhost/php/email/Upload_Files/1.png'),
(2, 30, 'my optout', 'Http://www.yahoo.com', 'http://localhost/php/email/Upload_Files/rainbow.jpg'),
(3, 25, 'Advertiser Optout', 'Http://www.chichi.com', 'http://localhost/php/email/Upload_Files/loading.gif'),
(44, 30, 'Advertiser Page', 'df', 'http://localhost/php/email/Upload_Files/44.png'),
(45, 27, 'Advertiser Optout', 'hksddsfsd', 'http://localhost/php/email/Upload_Files/45.gif'),
(46, 27, 'Advertiser Optout', 'hksddsfsd', ''),
(47, 26, 'Advertiser Optout', 'hksddsfsd', 'http://localhost/php/email/Upload_Files/47.gif'),
(48, 26, 'Advertiser Optout', 'hksddsfsd', 'http://localhost/php/email/Upload_Files/48.gif'),
(49, 30, 'Advertiser Optout', '', 'http://localhost/php/email/Upload_Files/49.png'),
(50, 30, 'Other', 'seal', 'http://localhost/php/email/Upload_Files/50.gif'),
(51, 0, 'Advertiser Page', 'cd', 'http://localhost/php/email/Upload_Files/51.gif'),
(52, 0, 'Advertiser Optout', '', 'http://localhost/php/email/Upload_Files/52.gif'),
(53, 30, 'Advertiser Page', '5333', 'http://localhost/php/email/Upload_Files/53.gif'),
(54, 27, 'System Optout', '47', 'http://localhost/php/email/Upload_Files/54.png'),
(55, 27, '55', 'dffff', 'http://localhost/php/email/Upload_Files/55.gif'),
(56, 35, 'Advertiser Page', '', ''),
(57, 36, 'Advertiser Optout', 'ff', 'http://localhost/php/email/Upload_Files/57.png'),
(58, 36, 'Advertiser Optout', 'fg', 'http://localhost/php/email/Upload_Files/58.png'),
(59, 36, 'Advertiser Page', 'cc3', ''),
(60, 12, 'Advertiser Page', 'cc3', ''),
(61, 12, 'Advertiser Page', 'cc3', ''),
(62, 12, 'Advertiser Page', 'cc3', ''),
(63, 12, 'Advertiser Page', 'cc3', ''),
(64, 36, 'Advertiser Page', 'df', ''),
(65, 36, 'Advertiser Page', 'df', ''),
(66, 36, 'Advertiser Page', 'df', ''),
(67, 36, 'Advertiser Page', 'df', 'http://localhost/php/email/Upload_Files/67.png'),
(68, 36, 'Advertiser Page', 'df', 'http://localhost/php/email/Upload_Files/68.png'),
(69, 37, 'System Optout', 'yahoo.com3', 'http://localhost/php/email/Upload_Files/69.gif'),
(70, 37, 'System Optout', 'Http://www.yahoo.com', 'http://localhost/php/email/Upload_Files/70.gif'),
(71, 37, 'Advertiser Page', 'google.com/eby', 'http://localhost/php/email/Upload_Files/71.png'),
(72, 37, 'System Optout', 'd', 'http://localhost/php/email/Upload_Files/72.gif'),
(73, 36, 'Advertiser Page', '4', 'http://localhost/php/email/Upload_Files/73.gif'),
(74, 39, 'Advertiser Page', 'cd', 'http://localhost/php/email/Upload_Files/74.png'),
(75, 40, 'Advertiser Optout', 'f', 'http://localhost/php/email/Upload_Files/75.gif'),
(76, 40, 'Advertiser Optout', 'dfg', 'http://localhost/php/email/Upload_Files/76.png'),
(77, 40, 'Advertiser Page', 'dsf', 'http://localhost/php/email/Upload_Files/77.gif'),
(78, 37, 'Advertiser Optout', '', 'http://localhost/php/email/Upload_Files/78.jpg'),
(79, 36, '', '', ''),
(80, 37, 'Advertiser Optout', '', 'http://localhost/php/email/Upload_Files/80.gif'),
(81, 37, 'System Optout', '', 'http://localhost/php/email/Upload_Files/81.gif'),
(82, 37, 'System Optout', 'g', 'http://localhost/php/email/Upload_Files/82.jpg'),
(83, 41, 'Advertiser Page', 'http://11163558.p.waymailtracker.com/email.php?sid=11163558&said=[sid]', 'http://localhost/php/email/Upload_Files/83.png'),
(84, 41, 'Advertiser Optout', 'http://www.optout-flfc.net/o-qnml-f91-f8858c348d00b4ee17b734a1004df6bf', 'http://localhost/php/email/Upload_Files/84.jpg'),
(85, 41, 'System Optout', 'http://www.facebook.com', 'http://localhost/php/email/Upload_Files/85.jpg'),
(86, 44, 'Advertiser Page', '1', 'http://localhost/php/email/Upload_Files/86.jpg'),
(87, 44, 'Advertiser Optout', '2', 'http://localhost/php/email/Upload_Files/87.png'),
(88, 44, 'System Optout', '3', 'http://localhost/php/email/Upload_Files/88.gif');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_network`
--

CREATE TABLE IF NOT EXISTS `campaign_network` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `campaign_network`
--

INSERT INTO `campaign_network` (`id`, `name`, `note`) VALUES
(1, 'Dollar', ''),
(2, 'Golden', '');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_offer`
--

CREATE TABLE IF NOT EXISTS `campaign_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `note` text NOT NULL,
  `suppfile` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `campaign_offer`
--

INSERT INTO `campaign_offer` (`id`, `name`, `note`, `suppfile`) VALUES
(1, 'Hair', 'Buy Hair Solution\r\n\r\nsolution 1.0a\r\nsolution #2', ''),
(2, 'Pet', 'Save guard your dog\r\npick up the pooop', ''),
(3, 'Relief', 'relief', ''),
(4, '4', '4', ''),
(5, '51', '', ''),
(6, '', '', ''),
(7, 'Credit Reporting CPC - Ad.net', 'Credit Reporting CPC - Ad.net\r\n\r\n\r\nRedirect Link:\r\n\r\nhttp://11163558.p.waymailtracker.com/email.php?sid=11163558&said=[sid]\r\n\r\n\r\nOpt-Out Link:\r\n\r\nhttp://www.optout-flfc.net/o-qnml-f91-f8858c348d00b4ee17b734a1004df6bf\r\n\r\n\r\nAdvertiser Opt-Out Language:\r\n\r\n1158 26th St., Suite 464\r\nSanta Monica, CA 90403\r\n\r\n\r\n\r\n*****APPROVED SUBJECT LINES ONLY*****\r\n\r\n*****FROM LINES OK TO MODIFY AS LONG AS NO BRANDED COMPANY NAMES ARE USED*****\r\n\r\n\r\nFrom Lines:\r\n\r\n[SENDING DBA NAME]\r\n[LIST NAME]\r\ncredit Score\r\nCredit Report\r\nCredit Reporting\r\nCredit Monitoring\r\nCredit Center\r\n\r\n\r\nSubject Lines:\r\n\r\nTransUnion, Equifax, Experian Credit Scores Available \r\nGet Your 2012 Credit Score Online \r\nGet Your 2012 Credit Score Online Today \r\nGet Your 2012 Credit Score Online Now \r\nGet Your 3 Credit Scores Today \r\n2012 TransUnion, Experian & Equifax Scores \r\nGet Your Latest Credit Score \r\nView Your Latest Credit Score \r\nView Your 2012 Credit Scores \r\nSee Whoâ€™s Checking Your Credit \r\nYour Free Credit Score Can Help You \r\nHelp Yourself: Get Your Credit Scores Now \r\nView Your Credit History Fast \r\nCurious? Check Your Free Credit Scores Today! \r\nWhat Is Your Credit Score? \r\nView Your Credit Score! \r\nView Your Complimentary Credit Score \r\nGet Your Credit Score \r\nThe U.S. Average Credit Score Is 696. What Is Yours? \r\nYou Could Get A Credit Score \r\nNeed A Loan? Find Out Your Credit Score First \r\nCredit Score Fast \r\nCredit Scores Fast \r\nFind Out Your Credit Score \r\nGet Your Credit Score Now \r\nView Your Credit Score Now \r\nFast Access To Your Credit Score \r\nView Your Credit Score Fast \r\nYour Credit-Score Is Waiting For You \r\nTime For A Credit Check Up 	Email Subject Lines, continued: \r\nYour Credit Score May Have Just Been Updated \r\nYour Credit Score May Have Just Changed \r\nYour Credit Score May Have Been Updated \r\nYour Credit Score May Have Changed \r\nView Your 3 Credit Scores Fast \r\nView Your Credit Scores Fast \r\nReceive Complimentary Credit-Scores \r\nYour Complimentary Credit Scores Are Waiting For You \r\n**Inserting the recipientâ€™s name into the subject line is allowed \r\nFor example: \r\nJane Doe, Find Out Your Credit Score \r\nJane Doe, What Is Your Credit Score \r\n', ''),
(8, 'OurTime(Two)', 'OurTime (TWO) - People Media\r\n\r\n\r\nRedirect Link:\r\nhttp://vpjump.com/?a=1000001&l=6698&s1=[sid]\r\n\r\n\r\nOpt-Out Link:\r\nhttp://vpjump.com/?a=1000001&l=6699\r\n\r\n\r\nAdvertiser Opt-Out to append to creatives:\r\nPO Box 12627, Dallas, TX 75225\r\n\r\n\r\n\r\n*****From/Subject Lines must be Approved!*****\r\n\r\nFrom Lines:\r\nOurTime.com Dating\r\nOurTime Dating\r\n\r\n\r\nSubject Lines:\r\nWant to meet singles over 50? Click Here!\r\nWant to meet singles over 50? See photos!\r\nMeet local singles over 50 at OurTime.com - Click Here!\r\nMeet local singles over 50 at OurTime.com - See photos!\r\nTry Americaâ€™s #1 site for singles over 50 - See photos!\r\nTry Americaâ€™s #1 site for singles over 50 - Click Here!\r\nInterested in singles over 50? See photos!\r\nInterested in singles over 50? Click Here!\r\nJoin OurTime.com & meet singles over 50 - Click Here!\r\nJoin OurTime.com & meet singles over 50 - See Photos!\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_template`
--

CREATE TABLE IF NOT EXISTS `campaign_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `campaign_template`
--

INSERT INTO `campaign_template` (`id`, `name`, `note`) VALUES
(1, '8 bit', 'To: Undisclosed*\r\nFrom: [fromline]<[fromUser]@[from]>\r\nSubject: [subjectline]\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=iso-8859-1\r\n\r\n<!DOCTYPE HTML>\r\n<html>\r\n<head><title>Mike</title></head>\r\n<body>\r\n<center>\r\n<a href="[redir]/[link1]-1">\r\n<img src="[redir]/[link1]-1" alt="[subjectline]">\r\n</a><br>\r\n\r\n<a href="[redir]/[link2]">\r\n<img src="[redir]/[link1]-1">\r\n</a><br>\r\n\r\n<a href="[redir]/[link3]">\r\n<img src="[redir]/[link1]-1">\r\n</a><br>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `fromdomains`
--

CREATE TABLE IF NOT EXISTS `fromdomains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fromdomains`
--

INSERT INTO `fromdomains` (`id`, `name`, `created`) VALUES
(1, 'mydealstoday.info', '2013-02-24 14:36:33'),
(2, 'yahoo.com', '2013-02-24 14:36:33'),
(3, 'chichionline.net', '2013-02-24 14:37:03'),
(4, 'dog.com', '2013-02-24 14:37:03'),
(5, 'cat.com', '2013-02-24 14:37:11'),
(6, 'monkey.net', '2013-02-24 14:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `ipdomains`
--

CREATE TABLE IF NOT EXISTS `ipdomains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server` varchar(20) NOT NULL,
  `nb` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `dns` varchar(30) NOT NULL,
  `vmta` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ipdomains`
--

INSERT INTO `ipdomains` (`id`, `server`, `nb`, `ip`, `dns`, `vmta`) VALUES
(1, '1', '1', '198.154.212.226', 'ice1.mydealstoday.info', 'postfix'),
(2, '1', '1', '198.154.212.227', 'ice2.mydealstoday.info', 'postfix-227'),
(3, '1', '1', '198.154.212.228', 'ice3.mydealstoday.info', 'postfix-228'),
(4, '1', '1', '198.154.212.229', 'ice4.mydealstoday.info', 'postfix-229');

-- --------------------------------------------------------

--
-- Table structure for table `redirdomains`
--

CREATE TABLE IF NOT EXISTS `redirdomains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `redirdomains`
--

INSERT INTO `redirdomains` (`id`, `name`, `created`) VALUES
(1, 'yahoo.com', '2013-02-24 14:31:32'),
(2, 'mydealstoday.info', '2013-02-24 14:32:35'),
(3, 'facebook.com', '2013-02-24 14:33:18'),
(4, 'juice.com', '2013-02-24 14:33:18'),
(5, 'apple.com', '2013-02-24 14:34:11'),
(6, 'sleep.net', '2013-02-24 14:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `selected_from`
--

CREATE TABLE IF NOT EXISTS `selected_from` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `used` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `selected_from`
--

INSERT INTO `selected_from` (`id`, `name`, `used`) VALUES
(1, 'mydealstoday.info', '2013-03-12 17:45:36'),
(2, 'yahoo.com', '2013-03-12 17:45:37'),
(3, 'cat.com', '2013-03-12 17:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `selected_ip`
--

CREATE TABLE IF NOT EXISTS `selected_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `used` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `selected_ip`
--

INSERT INTO `selected_ip` (`id`, `name`, `used`) VALUES
(1, '198.154.212.226', '2013-03-12 18:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `selected_redir`
--

CREATE TABLE IF NOT EXISTS `selected_redir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `used` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `selected_redir`
--

INSERT INTO `selected_redir` (`id`, `name`, `used`) VALUES
(1, 'facebook.com', '2013-03-12 18:41:50'),
(2, 'juice.com', '2013-03-12 18:41:50'),
(3, 'apple.com', '2013-03-12 18:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `send_request`
--

CREATE TABLE IF NOT EXISTS `send_request` (
  `crid` int(11) NOT NULL,
  `linkid` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `address` text NOT NULL,
  `hash` text NOT NULL,
  `open` int(11) NOT NULL,
  `click` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
