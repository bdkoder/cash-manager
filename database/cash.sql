-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2018 at 01:15 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cash`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `login_id` int(11) NOT NULL,
  `fullName` varchar(200) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`login_id`, `fullName`, `profession`, `email`, `password`, `date`) VALUES
(1, 'Main Shahidul', 'Main Admin', 'mainadmin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-01-21 10:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL,
  `fullName` varchar(200) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `package` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `repassword` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reference_id` varchar(11) NOT NULL,
  `img` varchar(1200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `fullName`, `profession`, `phone`, `country`, `package`, `email`, `password`, `repassword`, `date`, `reference_id`, `img`) VALUES
(3, 'Money Hossain', 'Diploma Engineer', '01793330005', 'Bangladesh', 3, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2018-02-17 10:03:16', '6', './assets/user_img/katy-perry-beauty-woman-singer-make-up-photo-music-colored-hair-style-hd-wallpaper.jpg'),
(6, 'Arif Hossain', 'Diploma Engineer', '01793330005', 'Bangladesh', 3, 'arif@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2018-02-17 09:56:06', '3', './assets/user_img/view.png'),
(9, 'Money Hossain', 'Diploma Engineer', '01793330005', 'Bangladesh', 3, 'ddd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2018-02-14 10:52:12', '3', ''),
(10, 'Money Hossain', 'Diploma Engineer', '01793330005', 'Bangladesh', 3, 'fff@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2018-02-14 08:26:32', '6', ''),
(11, 'New Member', 'Member', '017', 'Bangladesh', 2, 'm@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2018-02-17 04:36:16', '6', '');

-- --------------------------------------------------------

--
-- Table structure for table `recoverpass`
--

CREATE TABLE IF NOT EXISTS `recoverpass` (
  `id` int(11) NOT NULL,
  `fullName` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `country` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recoverpass`
--

INSERT INTO `recoverpass` (`id`, `fullName`, `phone`, `email`, `country`, `date`) VALUES
(6, 'Arif Hossain', '102222', 'arif@gmail.com', 'California', '2018-01-21 10:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `totalwithdrawuser`
--

CREATE TABLE IF NOT EXISTS `totalwithdrawuser` (
  `id` int(11) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `success_amount` varchar(10000) NOT NULL,
  `ac_details` varchar(600) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totalwithdrawuser`
--

INSERT INTO `totalwithdrawuser` (`id`, `login_id`, `amount`, `success_amount`, `ac_details`, `status`, `date`) VALUES
(8, '6', '500', '5465464', 'just withdraw  done                                                  ', '1', '2018-02-17 11:24:53'),
(9, '3', '1000', '1000', 'wITSDAS                                                    ', '1', '2018-02-16 16:41:18'),
(10, '3', '1000', '1000', 'just withdraw                                                    ', '1', '2018-02-16 16:41:05'),
(11, '6', '3000', '30005555', 'just withdraw                                                    ', '1', '2018-02-17 11:24:46'),
(12, '6', '500', '50056', 'kll                                                    ', '1', '2018-02-17 11:25:04'),
(13, '11', '100', '5000', '                       bdsdhasdas bdsdkhhasdk                             ', '1', '2018-02-17 11:24:37'),
(14, '3', '250', '', '                          bgggg                          ', '1', '2018-03-14 09:25:16'),
(15, '3', '200', '', '                            \r\n                        ', '', '2018-03-19 04:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_active_request`
--

CREATE TABLE IF NOT EXISTS `user_active_request` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `des` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_active_request`
--

INSERT INTO `user_active_request` (`id`, `login_id`, `des`, `date`, `active_status`) VALUES
(18, 3, 'aaa', '2018-02-14 05:04:27', 1),
(19, 6, 'aa', '2018-02-14 06:45:54', 1),
(23, 11, 'aa', '2018-02-17 04:43:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_total_balance`
--

CREATE TABLE IF NOT EXISTS `user_total_balance` (
  `id` int(11) NOT NULL,
  `login_id` varchar(200) NOT NULL,
  `total_balance` varchar(50) NOT NULL,
  `total_ref` varchar(10) NOT NULL,
  `total_withdraw` varchar(100) NOT NULL,
  `total_current_balance` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_total_balance`
--

INSERT INTO `user_total_balance` (`id`, `login_id`, `total_balance`, `total_ref`, `total_withdraw`, `total_current_balance`) VALUES
(9, '6', '1000', '3', '35521075', '-35520075'),
(16, '3', '500', '2', '2000', '-1500'),
(19, '11', '1000', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`login_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `recoverpass`
--
ALTER TABLE `recoverpass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totalwithdrawuser`
--
ALTER TABLE `totalwithdrawuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_active_request`
--
ALTER TABLE `user_active_request`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Indexes for table `user_total_balance`
--
ALTER TABLE `user_total_balance`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login_id` (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `recoverpass`
--
ALTER TABLE `recoverpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `totalwithdrawuser`
--
ALTER TABLE `totalwithdrawuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_active_request`
--
ALTER TABLE `user_active_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user_total_balance`
--
ALTER TABLE `user_total_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
