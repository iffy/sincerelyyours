-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2015 at 11:47 AM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `story`
--
CREATE DATABASE IF NOT EXISTS `story` DEFAULT CHARACTER SET ascii COLLATE ascii_bin;
USE `story`;

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE ascii_bin NOT NULL,
  `password` varchar(40) COLLATE ascii_bin NOT NULL,
  `email` varchar(40) COLLATE ascii_bin NOT NULL,
  `firstname` varchar(20) COLLATE ascii_bin NOT NULL,
  `lastname` varchar(20) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `story_id` int(20) NOT NULL,
  `guest_id` int(20) NOT NULL,
  `comment` varchar(255) COLLATE ascii_bin NOT NULL,
  `keep` int(2) NOT NULL,
  `date` varchar(40) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guests`
--

CREATE TABLE IF NOT EXISTS `tbl_guests` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE ascii_bin NOT NULL,
  `firstname` varchar(20) COLLATE ascii_bin NOT NULL,
  `lastname` varchar(20) COLLATE ascii_bin NOT NULL,
  `email` varchar(40) COLLATE ascii_bin NOT NULL,
  `relation` varchar(20) COLLATE ascii_bin NOT NULL,
  `password` varchar(40) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE IF NOT EXISTS `tbl_images` (
  `image_id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE ascii_bin NOT NULL,
  `type` varchar(40) COLLATE ascii_bin NOT NULL,
  `images_path` varchar(200) COLLATE ascii_bin NOT NULL,
  `submission_date` date DEFAULT NULL,
  `size` varchar(40) COLLATE ascii_bin NOT NULL,
  `storyname` varchar(60) COLLATE ascii_bin NOT NULL,
  `image_name` varchar(255) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_story`
--

CREATE TABLE IF NOT EXISTS `tbl_story` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE ascii_bin NOT NULL,
  `storyname` varchar(50) COLLATE ascii_bin NOT NULL,
  `stories` longtext COLLATE ascii_bin NOT NULL,
  `date` varchar(20) COLLATE ascii_bin NOT NULL,
  `image_id` int(20) NOT NULL,
  `comments` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name_2` (`name`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_story_guest`
--

CREATE TABLE IF NOT EXISTS `tbl_story_guest` (
  `story_id` int(20) NOT NULL,
  `email_sent` int(2) NOT NULL,
  `guest_id` int(20) NOT NULL,
  PRIMARY KEY (`story_id`,`guest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;