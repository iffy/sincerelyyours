-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2015 at 05:50 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `story`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `tbl_guests`
--

CREATE TABLE IF NOT EXISTS `tbl_guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE ascii_bin NOT NULL,
  `firstname` varchar(20) COLLATE ascii_bin NOT NULL,
  `lastname` varchar(20) COLLATE ascii_bin NOT NULL,
  `email` varchar(40) COLLATE ascii_bin NOT NULL,
  `relation` varchar(20) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE IF NOT EXISTS `tbl_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE ascii_bin NOT NULL,
  `type` varchar(40) COLLATE ascii_bin NOT NULL,
  `images_path` varchar(200) COLLATE ascii_bin NOT NULL,
  `submission_date` date DEFAULT NULL,
  `size` varchar(40) COLLATE ascii_bin NOT NULL,
  `storyname` varchar(60) COLLATE ascii_bin NOT NULL,
  `image_name` varchar(255) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_story`
--

CREATE TABLE IF NOT EXISTS `tbl_story` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE ascii_bin NOT NULL,
  `storyname` varchar(50) COLLATE ascii_bin NOT NULL,
  `stories` longtext COLLATE ascii_bin NOT NULL,
  `date` varchar(20) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=1 ;

