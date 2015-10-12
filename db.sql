-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 10:37 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `course_lecturer`
--

DROP TABLE IF EXISTS `course_lecturer`;
CREATE TABLE IF NOT EXISTS `course_lecturer` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_lecturer`
--

INSERT INTO `course_lecturer` (`id`, `name`) VALUES
(1, 'Lecturer A'),
(2, 'Lecturer B');

-- --------------------------------------------------------

--
-- Table structure for table `course_master`
--

DROP TABLE IF EXISTS `course_master`;
CREATE TABLE IF NOT EXISTS `course_master` (
`id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_duration` int(11) NOT NULL,
  `course_price` decimal(10,2) NOT NULL,
  `lecturer_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_master`
--

INSERT INTO `course_master` (`id`, `course_name`, `course_duration`, `course_price`, `lecturer_id`) VALUES
(1, 'PHP course', 2, '4000.00', 1),
(2, 'Mysql Course', 1, '3000.00', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
 ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `user_U_1` (`username`);

--
-- Indexes for table `course_lecturer`
--
ALTER TABLE `course_lecturer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_master`
--
ALTER TABLE `course_master`
 ADD PRIMARY KEY (`id`), ADD KEY `lecturer_id` (`lecturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User ID',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course_lecturer`
--
ALTER TABLE `course_lecturer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course_master`
--
ALTER TABLE `course_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_master`
--
ALTER TABLE `course_master`
ADD CONSTRAINT `course_master_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `course_lecturer` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
