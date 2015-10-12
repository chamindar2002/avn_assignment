-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 09:09 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `avn_assignment_db`
--
CREATE DATABASE IF NOT EXISTS `avn_assignment_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `avn_assignment_db`;

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

DROP TABLE IF EXISTS `auth_user`;
CREATE TABLE IF NOT EXISTS `auth_user` (
`uid` int(11) NOT NULL COMMENT 'User ID',
  `enabled` tinyint(4) NOT NULL COMMENT 'User is enabled',
  `username` varchar(200) NOT NULL COMMENT 'User Name',
  `last_name` varchar(200) NOT NULL COMMENT 'Family Name',
  `first_name` varchar(200) NOT NULL COMMENT 'First Name',
  `password` varchar(200) NOT NULL COMMENT 'Password'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='User';

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`uid`, `enabled`, `username`, `last_name`, `first_name`, `password`) VALUES
(1, 1, 'admin', 'Admin', 'Admin', '24b0712e91489671013c3bc67d4ec894');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
 ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `user_U_1` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User ID',AUTO_INCREMENT=4;