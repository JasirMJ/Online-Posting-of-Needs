-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2017 at 04:46 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `need`
--

-- --------------------------------------------------------

--
-- Table structure for table `chattable`
--

CREATE TABLE IF NOT EXISTS `chattable` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `msg` varchar(100) DEFAULT NULL,
  `fromid` int(50) DEFAULT NULL,
  `toid` int(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `attime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `chattable`
--

INSERT INTO `chattable` (`id`, `msg`, `fromid`, `toid`, `status`, `attime`) VALUES
(69, 'hellooo iam faisal iwant your need cat', 1, 2, 'off', '2017-01-18 10:53:39'),
(70, 'ok how many amount', 2, 1, 'off', '2017-01-18 10:55:28'),
(71, '2000 below', 1, 2, 'off', '2017-01-18 11:24:02'),
(72, 'thanks', 2, 1, 'off', '2017-01-18 11:24:45'),
(73, 'hii', 1, 2, 'off', '2017-01-18 16:35:53'),
(74, 'Contact Me', 1, 2, 'off', '2017-01-18 20:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `cityregistration`
--

CREATE TABLE IF NOT EXISTS `cityregistration` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) DEFAULT NULL,
  `district_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cityregistration`
--

INSERT INTO `cityregistration` (`id`, `city_name`, `district_id`) VALUES
(1, 'Manjeri', 1),
(2, 'Malappuram', 1),
(3, 'Perinthalmanna', 1);

-- --------------------------------------------------------

--
-- Table structure for table `districtregistration`
--

CREATE TABLE IF NOT EXISTS `districtregistration` (
  `district_id` int(50) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(50) DEFAULT NULL,
  `state_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `districtregistration`
--

INSERT INTO `districtregistration` (`district_id`, `district_name`, `state_id`) VALUES
(1, 'Malappuram', 1),
(2, 'calicut', 1),
(3, 'palakkad', 1),
(4, 'Kanichipuram', 2),
(5, 'Erode', 2),
(6, 'Coimbatore', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`, `date`) VALUES
(15, 'Our Team', 'D VISIT.jpg', '2017-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `needregistration`
--

CREATE TABLE IF NOT EXISTS `needregistration` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `Descriptions` varchar(100) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `post_date` varchar(50) DEFAULT NULL,
  `with_date` varchar(50) DEFAULT NULL,
  `owner_mail` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `needregistration`
--

INSERT INTO `needregistration` (`id`, `user_id`, `category`, `p_name`, `Descriptions`, `district`, `city`, `post_date`, `with_date`, `owner_mail`, `status`) VALUES
(9, 1, 'Electricals', 'bb', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '1Malappuram', 'Perinthalmanna', '2017-01-15', '2017-01-24', 'faisaltptri@gmail.com', ' Admin Aproved'),
(10, 2, 'Pets', 'cat', 'White color Male', '1Malappuram', 'Manjeri', '2017-01-15', '2017-01-20', 'a@gmail.com', ' Admin Aproved');

-- --------------------------------------------------------

--
-- Table structure for table `stateregistration`
--

CREATE TABLE IF NOT EXISTS `stateregistration` (
  `state_id` int(50) NOT NULL AUTO_INCREMENT,
  `state` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stateregistration`
--

INSERT INTO `stateregistration` (`state_id`, `state`) VALUES
(1, 'kerala'),
(2, 'Tamil Nadu'),
(3, 'Punjab'),
(4, 'Sikkim');

-- --------------------------------------------------------

--
-- Table structure for table `userfeedback`
--

CREATE TABLE IF NOT EXISTS `userfeedback` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) DEFAULT NULL,
  `feedback` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `userfeedback`
--

INSERT INTO `userfeedback` (`id`, `user_id`, `feedback`, `date`) VALUES
(3, 1, 'cx', '2017-01-15'),
(4, 2, 'kkk', '2017-01-15'),
(7, NULL, 'm', NULL),
(8, 1, 'good', '2017-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE IF NOT EXISTS `userregistration` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`user_id`, `name`, `address`, `state`, `district`, `gender`, `contact`, `email`, `image`, `password`, `dob`) VALUES
(1, 'Muhammed Faisal . TP', 'thayyil', '1', 'Malappuram', 'Male', 9562793946, 'faisaltptri@gmail.com', 'faisalimage.jpg', '123', '05/08/1993'),
(2, 'fas', 'tRIPPPPANCHI', '1', 'calicut', 'Male', 9562793946, 'A@GMAIL.COM', 'DSC_2293.JPG', '123', NULL),
(3, 'Unnikrishnana', 'thaj   kalathathi', '2', 'Kanichipuram', 'Male', 1472583690, 'b@gmail.com', 'adminstratorUnnikrishnan.jpg', '123', '2017-01-18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
