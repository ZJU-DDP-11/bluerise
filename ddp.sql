-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 06 月 03 日 09:07
-- 服务器版本: 5.6.10
-- PHP 版本: 5.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `device`
--

INSERT INTO `device` (`id`, `deviceName`, `description`, `userid`, `latitude`, `longitude`, `altitude`, `active`) VALUES
(1, 'AlienKKK', 'aaaaa', 1, 52.96187505907603, -8.3056640625, NULL, 0),
(2, 'hello~ å“Žå“Ÿï¼Œä¸é”™å“¦', 'my name is, slim shady', 1, 29.53522956294847, 35.33203125, NULL, 1);

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
  `receive_notification` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `gender`, `registerTime`, `organization`, `website`, `about`, `receive_notification`, `active`) VALUES
(1, 'yeluyupt@gmail.com', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 'M', '2013-05-21 00:00:00', NULL, NULL, NULL, NULL, 1);

--
-- 限制导出的表
--

--
-- 限制表 `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
