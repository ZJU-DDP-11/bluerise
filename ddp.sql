-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2013 at 11:17 PM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ddp`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `deviceid` int(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `data` double DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deviceid` (`deviceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `deviceid`, `description`, `data`, `time`, `unit`) VALUES
(1, 1, 'Tempurature', 28, '2013-05-10 00:17:33', 'C'),
(2, 1, 'Humidity', 18, '2013-05-10 00:17:34', '%'),
(3, 1, 'Tempurature', 28, '2013-05-10 00:17:50', 'C'),
(4, 1, 'Humidity', 18, '2013-05-10 00:17:51', '%'),
(5, 1, 'Tempurature', 28, '2013-05-10 00:18:07', 'C'),
(6, 1, 'Humidity', 19, '2013-05-10 00:18:08', '%'),
(7, 1, 'Tempurature', 28, '2013-05-10 00:20:30', 'C'),
(8, 1, 'Humidity', 19, '2013-05-10 00:20:31', '%'),
(9, 1, 'Tempurature', 28, '2013-05-10 00:20:48', 'C'),
(10, 1, 'Humidity', 18, '2013-05-10 00:20:49', '%'),
(11, 1, 'Tempurature', 28, '2013-05-10 00:21:05', 'C'),
(12, 1, 'Humidity', 18, '2013-05-10 00:21:06', '%'),
(13, 1, 'Tempurature', 28, '2013-05-10 00:21:22', 'C'),
(14, 1, 'Humidity', 19, '2013-05-10 00:21:23', '%'),
(15, 1, 'Tempurature', 28, '2013-05-10 00:21:39', 'C'),
(16, 1, 'Humidity', 18, '2013-05-10 00:21:40', '%'),
(17, 1, 'Tempurature', 28, '2013-05-10 00:21:56', 'C'),
(18, 1, 'Humidity', 18, '2013-05-10 00:21:57', '%'),
(19, 1, 'Tempurature', 28, '2013-05-10 00:22:13', 'C'),
(20, 1, 'Humidity', 18, '2013-05-10 00:22:14', '%'),
(21, 1, 'Tempurature', 28, '2013-05-10 00:22:31', 'C'),
(22, 1, 'Humidity', 19, '2013-05-10 00:22:32', '%'),
(23, 1, 'Tempurature', 28, '2013-05-10 00:22:48', 'C'),
(24, 1, 'Humidity', 18, '2013-05-10 00:22:49', '%'),
(25, 1, 'Tempurature', 28, '2013-05-10 00:23:05', 'C'),
(26, 1, 'Humidity', 19, '2013-05-10 00:23:06', '%'),
(27, 1, 'Tempurature', 28, '2013-05-10 00:23:22', 'C'),
(28, 1, 'Humidity', 19, '2013-05-10 00:23:23', '%'),
(29, 1, 'Tempurature', 28, '2013-05-10 00:23:39', 'C'),
(30, 1, 'Humidity', 19, '2013-05-10 00:23:40', '%');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE IF NOT EXISTS `device` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `deviceName` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `userid` int(10) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `altitude` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `deviceName`, `description`, `userid`, `latitude`, `longitude`, `altitude`) VALUES
(1, 'arduino', 'Li Kaiyuan', 1, 30.06909396443887, 120.3662109375, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testjson`
--

CREATE TABLE IF NOT EXISTS `testjson` (
  `json` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testjson`
--

INSERT INTO `testjson` (`json`) VALUES
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "18.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "18.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "19.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "19.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "18.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "18.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "19.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "18.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "18.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "18.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "19.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "18.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "19.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "19.00", "unit" : "%" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Tempurature", "current_value" : "28.00", "unit" : "C" }\r\n]\r\n}\r\n'),
('{\r\n"apikey":"00000000000000000001",\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "description" : "Humidity", "current_value" : "19.00", "unit" : "%" }\r\n]\r\n}\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varbinary(255) NOT NULL,
  `gender` enum('F','M') NOT NULL,
  `registerTime` datetime NOT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `about` text,
  `receive_notification` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `gender`, `registerTime`, `organization`, `website`, `about`, `receive_notification`, `active`) VALUES
(-1, 'cesczju@gmail.com', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 'M', '2013-05-21 00:00:00', NULL, NULL, NULL, 0, 1),
(0, 'liu.dongyuan@gmail.com', '*2464E9281B641942C62E0DAC38B6A7315293CCF7', 'M', '2013-05-21 00:00:00', '', '', '', 1, 1),
(1, 'yeluyupt@gmail.com', '4V', 'M', '2013-05-21 00:00:00', NULL, NULL, NULL, 0, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`deviceid`) REFERENCES `device` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
