-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2016 at 09:24 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_99sound`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio_song`
--


ALTER TABLE `audio_song`
CHANGE  `audio_file` `audio_file1` VARCHAR(32) DEFAULT NULL,
CHANGE  `video_file` `video_file1` VARCHAR(32) DEFAULT NULL,
ADD `audio_file2` varchar(32) DEFAULT NULL,
ADD  `audio_file3` varchar(32) DEFAULT NULL,
ADD `audio_file4` varchar(32) DEFAULT NULL,
ADD `audio_file5` varchar(32) DEFAULT NULL,
ADD `audio_file6` varchar(32) DEFAULT NULL,
ADD  `video_file2` varchar(32) DEFAULT NULL,
ADD  `video_file3` varchar(32) DEFAULT NULL;

-
