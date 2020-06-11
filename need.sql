-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2017 at 05:18 AM
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
(10, 2, 'Pets', 'cat', 'White color Male', '1Malappuram', 'Manjeri', '2017-01-15', '2017-01-17', 'a@gmail.com', ' Admin Aproved');

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
(7, NULL, 'm', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`user_id`, `name`, `address`, `state`, `district`, `gender`, `contact`, `email`, `image`, `password`, `dob`) VALUES
(1, 'Muhammed Faisal . TP', 'thayyil', '1', 'Malappuram', 'Male', 9562793946, 'faisaltptri@gmail.com', 'faisalimage.jpg', '123', '05/08/1993'),
(2, NULL, NULL, NULL, NULL, NULL, 1234567890, 'a@gmail.com', NULL, '123', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
