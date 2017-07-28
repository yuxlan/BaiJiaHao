-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-28 11:21:18
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `baijiahao`
--

-- --------------------------------------------------------

--
-- 表的结构 `ad`
--

CREATE TABLE IF NOT EXISTS `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(200) NOT NULL COMMENT '标题',
  `link` varchar(150) NOT NULL COMMENT '链接',
  `pic` varchar(120) NOT NULL COMMENT '图片',
  `decs` varchar(200) NOT NULL COMMENT '描述',
  `state` int(1) NOT NULL COMMENT '状态',
  `date` datetime NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ad`
--

INSERT INTO `ad` (`id`, `title`, `link`, `pic`, `decs`, `state`, `date`) VALUES
(1, 'ad', 'adad', '2017072811151926.jpg', 'adadadadadad', 1, '2017-07-28 11:15:19');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL COMMENT '文章标题',
  `nid` int(11) NOT NULL COMMENT '文章类型对应的导航ID',
  `author` varchar(30) NOT NULL COMMENT '作者',
  `apic` varchar(150) NOT NULL COMMENT '作者头像',
  `lead` varchar(300) NOT NULL COMMENT '作者导语简介',
  `pic` varchar(150) NOT NULL COMMENT '文章配图',
  `source` varchar(50) NOT NULL COMMENT '文章来源',
  `pageview` int(11) NOT NULL COMMENT '阅读量',
  `state` int(1) NOT NULL COMMENT '状态是否展示',
  `content` mediumtext NOT NULL COMMENT '文章内容',
  `date` datetime NOT NULL COMMENT '创建文章的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `nav`
--

CREATE TABLE IF NOT EXISTS `nav` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '导航id',
  `name` varchar(30) NOT NULL COMMENT '导航名字',
  `decs` varchar(120) NOT NULL COMMENT '对导航的描述',
  `state` int(1) NOT NULL COMMENT '导航的状态',
  `sort` int(10) NOT NULL COMMENT '导航排序',
  `date` datetime NOT NULL COMMENT '创建的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='导航' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `nav`
--

INSERT INTO `nav` (`id`, `name`, `decs`, `state`, `sort`, `date`) VALUES
(1, '首页', '首页导航', 1, 1, '2017-07-26 15:32:32'),
(2, '科技', '科技导航', 1, 2, '2017-07-26 15:42:35'),
(3, '影视娱乐', '影视娱乐导航', 1, 3, '2017-07-26 15:43:28'),
(4, '财经', '财经导航', 1, 4, '2017-07-26 15:44:55'),
(5, '体育', '体育导航', 1, 5, '2017-07-26 15:45:19'),
(6, '文化', '文化导航', 1, 6, '2017-07-26 15:45:58');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(120) NOT NULL,
  `pwd` varchar(120) NOT NULL,
  `last_ip` varchar(100) NOT NULL,
  `last_time` datetime NOT NULL,
  `login_num` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `user`, `pwd`, `last_ip`, `last_time`, `login_num`, `level_id`, `date`) VALUES
(1, 'admin', '123456', '', '2017-07-28 16:50:00', 18, 0, '2017-07-27 17:39:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
