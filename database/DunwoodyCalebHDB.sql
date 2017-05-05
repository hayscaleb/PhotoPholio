-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 05, 2017 at 08:23 AM
-- Server version: 5.6.35-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Table structure for table `PP_users`
--

CREATE TABLE IF NOT EXISTS `PP_users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePic` varchar(100) DEFAULT NULL,
  `myDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Table structure for table `PP_images`
--

CREATE TABLE IF NOT EXISTS `PP_images` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `userid` int(100) NOT NULL,
  `imagePath` varchar(250) NOT NULL,
  `imageName` varchar(250) NOT NULL,
  `imageDescription` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userid`)
      REFERENCES `PP_users`(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;



