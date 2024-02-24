-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 24, 2024 at 03:34 PM
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
  `password` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `name`, `userName`, `email`, `gender`, `password`, `category`, `phonenumber`) VALUES
(12, 'UOC', 'UOC', 'UOC@gmail.com', 'male', '$2y$10$/346o6yhnM/mbUZ6OXx5juCb2yhjElDX9JOUHu98sao40fOw/Xcze', 'Call', 112581245);

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
  `customerId` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `password` varchar(200) NOT NULL,
  `regDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customerId`),
  UNIQUE KEY `userName` (`userName`,`email`,`phonenumber`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `name`, `userName`, `email`, `phonenumber`, `Gender`, `password`, `regDate`) VALUES
(8, 'dilki hansika', 'dilki', 'dilkihansika97@gmail.com', 726835015, 'female', '$2y$10$6VGss9Ypby.CgKnnQ6bRK.e0D6gW4sFMYXt1wnXCOYw/LMMW.6ZfG', '2024-02-22 21:03:41'),
(9, 'charitha sudewa', 'sudewa', 'charithasudewa@gmail.com', 705799233, 'male', '$2y$10$qXkW3FclfUDCKyYU4dU9f.TeV72VhA6G9r1yyZUo9mmuH3QXCmJ3e', '2024-02-24 16:23:27');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faqId`, `title`, `content`, `adminid`, `type`) VALUES
(1, 'testing2', 'content testing 2', NULL, 'general'),
(2, 'hgasAS', 'SDADASD', NULL, 'support'),
(3, 'asdadasfdfs', 'sdfvsdfihasdad', NULL, 'ads'),
(4, 'testting 4', 'testing 4', NULL, 'ads'),
(5, 'newfaq test', 'new faq test content', NULL, 'general'),
(6, 'newfaq test', 'new faq test content', NULL, 'general');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE IF NOT EXISTS `reply` (
  `replyid` int(8) NOT NULL AUTO_INCREMENT,
  `ticketid` int(8) NOT NULL,
  `adminid` int(5) DEFAULT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`replyid`),
  KEY `adminid` (`adminid`),
  KEY `ticketid` (`ticketid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`replyid`, `ticketid`, `adminid`, `subject`, `message`, `date`) VALUES
(17, 51, NULL, 'sdsadasd', 'asdasdas', '2024-02-21 18:52:55');

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
  `priority` varchar(20) NOT NULL DEFAULT 'Low',
  `status` varchar(20) NOT NULL DEFAULT 'New',
  `adminId` int(11) DEFAULT NULL,
  `customerId` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticketId`),
  KEY `adminId` (`adminId`),
  KEY `customerId` (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketId`, `category`, `subject`, `message`, `priority`, `status`, `adminId`, `customerId`, `date`) VALUES
(51, 'general', 'bjaskjhdSDLASKJDS', 'DASKDLKASJDKASHDASD', 'Critical', 'Replied', NULL, 9, '2024-02-24 12:48:21'),
(52, 'general', 'asdasdasd', 'asdadfadfdas', 'Low', 'New', NULL, 9, '2024-02-24 12:48:43'),
(53, 'HBB', 'asdadasd', 'asdasdasdas', 'Low', 'New', NULL, 9, '2024-02-24 12:48:43'),
(54, 'Call', 'call a friend', 'call a friend', 'Low', 'New', NULL, 9, '2024-02-24 12:48:43'),
(55, 'Call', 'asdasd', 'asdasdas', 'Medium', 'New', NULL, 9, '2024-02-24 15:31:41');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`adminId`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`adminId`),
  ADD CONSTRAINT `reply_ibfk_3` FOREIGN KEY (`ticketid`) REFERENCES `ticket` (`ticketId`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
