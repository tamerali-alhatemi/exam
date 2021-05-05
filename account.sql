-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2021 at 07:20 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `account`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_number` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `father_account` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_num` (`account_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_number`, `account_name`, `father_account`) VALUES
(1, 345243, 'ØªÙˆÙÙŠØ±', 1),
(3, 32523425, 'Ø¬Ø§Ø±ÙŠ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `account_currencies`
--

CREATE TABLE IF NOT EXISTS `account_currencies` (
  `account_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_currencies`
--

INSERT INTO `account_currencies` (`account_id`, `currency_id`) VALUES
(3, 2),
(4, 2),
(3, 1),
(2, 3),
(1, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`) VALUES
(1, 'Saudi rial', 'SAR'),
(2, 'Dollar', '$');

-- --------------------------------------------------------

--
-- Table structure for table `main_accounts`
--

CREATE TABLE IF NOT EXISTS `main_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `main_accounts`
--

INSERT INTO `main_accounts` (`id`, `name`) VALUES
(1, 'father 1'),
(2, 'father2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `U_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Type` varchar(10) NOT NULL,
  PRIMARY KEY (`U_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_id`, `Name`, `Email`, `Password`, `Type`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
