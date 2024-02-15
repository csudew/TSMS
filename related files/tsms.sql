-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2024 at 03:53 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `name`, `userName`, `email`, `gender`, `password`, `category`, `phonenumber`) VALUES
(2, 'Charitha Sudewa', 'Sudewa', 'charithasudewa@gmail.com', 'male', '123456', 'general', 705799233),
(3, 'tharusha', 'tharusha', 'tharushanawod777@gmail.com', 'female', '56489', 'ads', 705799233),
(4, 'asasa', '', '', 'male', '', 'general', 1457),
(5, 'asasas', 'asaa', 'asass', 'male', '1234', 'ads', 157),
(6, 'Charitha Sudewa', 'Sudewa', 'charithasudewa@gmail.com', 'female', 'jkh', 'ads', 705799233);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int(3) NOT NULL AUTO_INCREMENT,
  `Category Type` varchar(20) NOT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerId` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `name`, `userName`, `email`, `Gender`) VALUES
(1, 'test name', 'TN', 'testname@test.com', 'male'),
(2, 'Manilka', 'manilka', 'testname@test.com', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `faqId` int(4) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `adminid` int(5) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`faqId`),
  KEY `adminid` (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faqId`, `title`, `content`, `adminid`, `type`) VALUES
(1, 'testing2', 'content testing 2', NULL, 'general'),
(2, 'hgasAS', 'SDADASD', NULL, 'support'),
(3, 'asdadasfdfs', 'sdfvsdfihasdad', NULL, 'ads');

-- --------------------------------------------------------

--
-- Table structure for table `faqfile`
--

DROP TABLE IF EXISTS `faqfile`;
CREATE TABLE IF NOT EXISTS `faqfile` (
  `faqId` int(4) NOT NULL,
  `fileId` int(6) NOT NULL AUTO_INCREMENT,
  `file` varbinary(65350) NOT NULL,
  PRIMARY KEY (`fileId`),
  KEY `faqId` (`faqId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqfile`
--

INSERT INTO `faqfile` (`faqId`, `fileId`, `file`) VALUES
(3, 1, 0x61);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE IF NOT EXISTS `reply` (
  `replyid` int(8) NOT NULL AUTO_INCREMENT,
  `ticketid` int(8) NOT NULL,
  `customerid` int(5) NOT NULL,
  `adminid` int(5) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`replyid`),
  KEY `adminid` (`adminid`),
  KEY `customerid` (`customerid`),
  KEY `ticketid` (`ticketid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `replyfile`
--

DROP TABLE IF EXISTS `replyfile`;
CREATE TABLE IF NOT EXISTS `replyfile` (
  `fileId` int(8) NOT NULL AUTO_INCREMENT,
  `replyid` int(8) NOT NULL,
  `file` varbinary(65350) NOT NULL,
  PRIMARY KEY (`fileId`),
  KEY `replyid` (`replyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ticketId` int(8) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `priority` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `adminId` int(11) DEFAULT NULL,
  `customerId` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticketId`),
  KEY `adminId` (`adminId`),
  KEY `customerId` (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketId`, `category`, `subject`, `message`, `priority`, `status`, `adminId`, `customerId`, `date`) VALUES
(1, 'general', 'asdasdasd', 'xzaxz', 'low', 'new', NULL, 1, '2024-02-14 01:59:45'),
(2, 'general', 'asdasdasd', 'xzaxz', 'low', 'new', NULL, 1, '2024-02-14 01:59:45'),
(3, 'general', 'asdasdasd', 'asdasd', 'low', 'new', NULL, 1, '2024-02-14 01:59:45'),
(4, 'general', 'asdasdasd', 'sdsdsf', 'low', 'new', NULL, 1, '2024-02-14 01:59:45'),
(5, 'general', 'asdasdasd', 'adasdasd4567454654', 'low', 'new', NULL, 1, '2024-02-14 01:59:45'),
(6, 'general', 'next', '14565654665', 'low', 'new', NULL, 1, '2024-02-14 01:59:45'),
(7, 'general', 'next', 'sdsafdafzddz545646854Sd', 'low', 'new', NULL, 1, '2024-02-14 01:59:45'),
(8, 'general', 'next', 'asdsdaffsf1654', 'low', 'new', NULL, 1, '2024-02-14 01:59:45'),
(9, 'general', 'next', 'sadxsacdc4565', 'low', 'new', NULL, 1, '2024-02-14 01:59:45'),
(10, 'general', 'next', 'zdsds', 'low', 'new', NULL, 1, '2024-02-14 01:59:45'),
(11, 'general', 'new1', 'bcvbvcx', 'low', 'waitingreply', NULL, 1, '2024-02-14 02:01:28'),
(12, 'ads', 'adsadad', 'asdacazfa', 'high', 'replied', NULL, 1, '2024-02-14 03:24:10'),
(13, 'general', 'test manilka', 'kugjkhg', 'high', 'inprogress', NULL, 2, '2024-02-14 03:29:46'),
(14, 'ads', 'test manilka22222', 'asdada', 'high', 'waitingreply', NULL, 2, '2024-02-14 03:34:55'),
(15, 'bill', 'test manilka22222saxasdxdxas', 'sdazsdd', 'low', 'new', NULL, 2, '2024-02-14 03:36:25'),
(16, 'support', 'test manilka', 'sxzxzxx', 'low', 'new', NULL, 2, '2024-02-14 03:36:50'),
(17, 'general', 'manilka', 'mani', 'low', 'new', NULL, 1, '2024-02-14 03:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `ticketfile`
--

DROP TABLE IF EXISTS `ticketfile`;
CREATE TABLE IF NOT EXISTS `ticketfile` (
  `fileId` int(8) NOT NULL AUTO_INCREMENT,
  `ticketid` int(8) NOT NULL,
  `file` varbinary(65350) NOT NULL,
  PRIMARY KEY (`fileId`),
  KEY `ticketid` (`ticketid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`adminId`);

--
-- Constraints for table `faqfile`
--
ALTER TABLE `faqfile`
  ADD CONSTRAINT `faqfile_ibfk_1` FOREIGN KEY (`faqId`) REFERENCES `faq` (`faqId`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`adminId`),
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerId`),
  ADD CONSTRAINT `reply_ibfk_3` FOREIGN KEY (`ticketid`) REFERENCES `ticket` (`ticketId`);

--
-- Constraints for table `replyfile`
--
ALTER TABLE `replyfile`
  ADD CONSTRAINT `replyfile_ibfk_1` FOREIGN KEY (`replyid`) REFERENCES `reply` (`replyid`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`);

--
-- Constraints for table `ticketfile`
--
ALTER TABLE `ticketfile`
  ADD CONSTRAINT `ticketfile_ibfk_1` FOREIGN KEY (`ticketid`) REFERENCES `ticket` (`ticketId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
