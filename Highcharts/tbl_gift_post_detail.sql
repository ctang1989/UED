-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2016 at 07:50 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thinkshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gift_post_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_gift_post_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `post_address` varchar(80) NOT NULL COMMENT '邮寄地址',
  `post_date` char(40) NOT NULL COMMENT '邮寄日期',
  `post_time` char(40) NOT NULL COMMENT '邮寄时间段',
  `telephone` varchar(20) NOT NULL COMMENT '//联系电话',
  `card_number` varchar(16) NOT NULL COMMENT '卡号',
  `exchange_date` date NOT NULL COMMENT '//兑换日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_gift_post_detail`
--

INSERT INTO `tbl_gift_post_detail` (`id`, `name`, `post_address`, `post_date`, `post_time`, `telephone`, `card_number`, `exchange_date`) VALUES
(1, '唐超', '上海', '不限日期', '晚上17点至19点', '15995869332', 'S20160400002', '2016-04-07'),
(2, 'ctang', '江苏省苏州市吴中区', '周末', '中午11点至13点', '15995869332', 'S20160400003', '2016-04-07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
