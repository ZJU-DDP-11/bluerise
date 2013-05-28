-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 05 月 10 日 18:43
-- 服务器版本: 5.5.31-0ubuntu0.13.04.1
-- PHP 版本: 5.4.9-4ubuntu2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ddp`
--

-- --------------------------------------------------------

--
-- 表的结构 `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `deviceid` int(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `data` double DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deviceid` (`deviceid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `device`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `testjson`
--

CREATE TABLE IF NOT EXISTS `testjson` (
  `json` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `testjson`
--

INSERT INTO `testjson` (`json`) VALUES
('{\n"version":"1.0.0",\n"datastreams" : [\n{ "id" : "Tempurature", "current_value" : "29.00" }\n]\n}\n'),
('{\n"version":"1.0.0",\n"datastreams" : [\n{ "id" : "Humidity", "current_value" : "18.00" }\n]\n}\n'),
('{\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "id" : "Tempurature", "current_value" : "29.00" }\r\n]\r\n}\r\n'),
('{\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "id" : "Humidity", "current_value" : "19.00" }\r\n]\r\n}\r\n'),
('{\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "id" : "Tempurature", "current_value" : "29.00" }\r\n]\r\n}\r\n'),
('{\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "id" : "Humidity", "current_value" : "19.00" }\r\n]\r\n}\r\n'),
('{\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "id" : "Tempurature", "current_value" : "29.00" }\r\n]\r\n}\r\n'),
('{\r\n"version":"1.0.0",\r\n"datastreams" : [\r\n{ "id" : "Humidity", "current_value" : "18.00" }\r\n]\r\n}\r\n');

-- --------------------------------------------------------

--
-- 表的结构 `user`
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `gender`, `registerTime`, `organization`, `website`, `about`) VALUES
(-1, 'cesczju@gmail.com', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 'M', '2013-05-21 00:00:00', NULL, NULL, NULL),
(0, 'liu.dongyuan@gmail.com', '*FA1357133B2CB7EB2E13B364939C09CBB10C464F', 'M', '2013-05-21 00:00:00', NULL, NULL, NULL),
(1, 'yeluyupt@gmail.com', '4V', 'M', '2013-05-21 00:00:00', NULL, NULL, NULL);

--
-- 限制导出的表
--

--
-- 限制表 `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`deviceid`) REFERENCES `device` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
