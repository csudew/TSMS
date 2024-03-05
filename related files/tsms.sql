-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 05, 2024 at 09:36 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `name`, `userName`, `email`, `gender`, `password`, `category`, `phonenumber`) VALUES
(13, 'UCSC', 'UCSC', 'UCSC@gmail.com', 'male', '$2y$10$gj.gUbTPQMdSfQSJh8I31OsU.OKaXO2G9nXfsoXkbF0qL3VWUMuFW', 'Call', 112587239),
(14, 'Saneesha Tharindi', 'Saneesha', 'saneeshatharindi@gmail.com', 'female', '$2y$10$5IiKjDuhmt53mYMvz/wKXOj8pcGiOtXXSA93letFInDcioil1Yo8S', 'Call', 74095638),
(15, 'Shakila Thathsara', 'Shakila', 'Kstgalle@gmail.com', 'male', '$2y$10$Lj4IK5oFkLVLou6RMUlPsuG1QllXl0bn2/o18Q3PSKKUHZh2dSgGK', 'Internet', 702284211),
(16, 'Anbashayan', 'Anbashayan', 'anbashayan12@gmail.com', 'male', '$2y$10$oByzYEBh7ACpXKlvMVSYAeUTCGZG7IkTnDTNTbANoyR.69EKITBZK', 'HBB', 705689123),
(17, 'Thagshan', 'Thagshan', 'arulthags01@gmail.com', 'male', '$2y$10$z.L0zLcsdYaD4yw4tCZs..YHnCBxkOD2JlomRWkh7zvHehqwuFAPm', 'TV', 704558945),
(18, 'Dilki Hansika', 'Dilki', 'dilkihansika97@gmail.com', 'female', '$2y$10$UV8YmBpXyNFQicki.mhd8.2hWI6rScWPvhM8vT13O1piF1oqizdQm', 'HBB', 726835015),
(20, 'Charitha Sudewa', 'Charitha', 'charithasudewa22@gmail.com', 'male', '$2y$10$Gv8BlgWhOHSa2rv791aohuoDufxuTCNKpjqeku2TcKAzamGmgpiDy', 'Web Admin', 705799233);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `name`, `userName`, `email`, `phonenumber`, `Gender`, `password`, `regDate`) VALUES
(8, 'dilki hansika', 'dilki', 'dilkihansika97@gmail.com', 726835015, 'female', '$2y$10$6VGss9Ypby.CgKnnQ6bRK.e0D6gW4sFMYXt1wnXCOYw/LMMW.6ZfG', '2024-02-22 21:03:41'),
(9, 'charitha sudewa', 'sudewa', 'charithasudewa@gmail.com', 705799233, 'male', '$2y$10$qXkW3FclfUDCKyYU4dU9f.TeV72VhA6G9r1yyZUo9mmuH3QXCmJ3e', '2024-02-24 16:23:27'),
(10, 'Manilka Rajapaksha', 'Manilka', 'melisdakendrick1983@gmail.com', 707894561, 'male', '$2y$10$N22vPXkFKMgKQXVRZrcole3fF4FPApj6G5OCk/fAgIffcqXj7zSoe', '2024-03-05 08:21:53'),
(11, 'uoc', 'uoc', 'uoc@gmail.com', 112581245, 'male', '$2y$10$TahxS84Ho32l3D/T0JSda.n7h1U/3uoPh6ateKdJ/cKlVL093ujJS', '2024-03-05 15:05:15');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faqId`, `title`, `content`, `adminid`, `type`) VALUES
(7, ' What is HSPA?', 'HSPA (High Speed Packet Access) combines the features of HSDPA (High Speed Downlink Packet Access) and HSUPA (High Speed Uplink Packet Access) enabling you to access data at speeds up to 14.4 Mbps Downlink and up to 1.98 Mbps Uplink, on devices supporting HSPA.', NULL, 'HBB'),
(9, 'Will I have to pay for the time I am logged on to the network or only for the actual data usage?', 'You will only have to pay for the actual data usage, irrespective of the time you have spent logged on.', NULL, 'HBB'),
(10, 'The data usage is calculated for Downloading or Uploading or for both?', 'On selected packages, rental will be charged from the date of connection, up to the date of your bill. The data usage is calculated both for uploading and downloading', NULL, 'HBB'),
(11, 'How do I increase my credit limit?', 'Your initial credit limit on a post-paid connection is equal to the Refundable Deposit. However the credit limit can be enhanced by:\r\nKeeping an additional deposit (refundable) at the time of subscription or laterProviding any of the following financial statements within the last 3 months: Current account statement, Salary slip, Credit card statement, Your last 3 months\' mobile bills with your previous service provider', NULL, 'Call');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`replyid`, `ticketid`, `adminid`, `subject`, `message`, `date`) VALUES
(23, 61, 13, 'Visit Our Store', 'to activate your e-sim again, you have to visit our store at working days', '2024-02-27 07:16:18');

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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketId`, `category`, `subject`, `message`, `priority`, `status`, `adminId`, `customerId`, `date`) VALUES
(59, 'TV', 'Credit spark loan app customer numbar 8981906323.', 'Credit spark loan app customer numbar 8981906323.Credit spark loan app customer numbar 8981906323.', 'Low', 'New', NULL, 9, '2024-02-27 01:31:33'),
(60, 'HBB', 'How do i reset router password', 'How do i reset router password\r\n\r\n', 'Low', 'New', NULL, 9, '2024-02-27 01:34:23'),
(61, 'Call', 'My e sim is deactivate', 'I changed my original phone so i need to get e sim card for new phone please deactivate e sim card or give other solution', 'Low', 'Replied', NULL, 9, '2024-02-27 01:46:18'),
(62, 'Call', 'Signal Issue', 'There is lack of signal in my area. Location : Horopathana', 'Low', 'New', NULL, 9, '2024-02-27 01:51:51'),
(63, 'HBB', 'doesnt work', 'doesnt work my hbb', 'Low', 'New', NULL, 10, '2024-03-05 02:52:28');

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
