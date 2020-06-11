-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2017 at 04:18 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `adsid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`adsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`adsid`, `title`, `description`, `domain`, `image`) VALUES
(1, 'amazon', 'amazon', 'https://www.amazon.com', '2b.jpg'),
(2, 'flipcart', 'flip cart', 'https://www.flipkart.com', '1a.jpg'),
(3, 'snapdeal', 'snapdeal', 'https://www.snapdeal.com', '3a.jpg'),
(4, 'amazone', '', 'http://www.amazon.in/', '2b.jpg'),
(5, 'Flipkart', '', 'https://www.flipkart.com/', '1a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `msg` varchar(100) DEFAULT NULL,
  `fromid` int(50) DEFAULT NULL,
  `toid` int(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `attime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `msg`, `fromid`, `toid`, `status`, `attime`) VALUES
(1, 'ASD', 10, 11, 'off', '2017-03-13 20:49:28'),
(2, 'SALAM', 10, 11, 'off', '2017-03-13 20:49:34'),
(3, 'ALAIHI SALAAM', 10, 11, 'off', '2017-03-13 20:49:43'),
(4, 'HABEEBE', 10, 11, 'off', '2017-03-13 20:49:50'),
(5, 'HABEEBE', 10, 11, 'off', '2017-03-13 20:49:52'),
(6, 'IBNI ABDILLAH..', 10, 11, 'off', '2017-03-13 20:50:02'),
(7, 'hi', 13, 10, 'off', '2017-03-18 16:57:10'),
(8, 'hi', 10, 11, 'off', '2017-03-24 12:29:44'),
(9, 'hi', 10, 11, 'off', '2017-03-24 12:30:05'),
(10, 'hi', 22, 20, 'off', '2017-03-30 22:49:42'),
(11, 'hello', 23, 22, 'off', '2017-04-10 12:12:37'),
(12, 'i can approve your need within 1000 rupees', 23, 22, 'off', '2017-04-10 12:13:01'),
(13, 'sorry.. can you bring in 900', 22, 23, 'off', '2017-04-10 12:14:34'),
(14, 'i have similar product', 20, 23, 'off', '2017-04-10 12:46:45'),
(15, 'hi afeef , i can help you to get the car for u', 20, 21, 'off', '2017-04-24 14:35:06'),
(16, 'ok thanks , i will call you', 21, 20, 'off', '2017-04-24 14:36:36'),
(17, 'ok call me between 4:00 pm and 8:00 pm', 20, 21, 'off', '2017-04-24 14:37:05'),
(18, 'ok', 21, 20, 'off', '2017-04-24 14:37:21'),
(19, 'hi,', 20, 27, 'off', '2017-05-06 12:46:33'),
(20, 'i have that knife', 20, 27, 'off', '2017-05-06 12:48:35'),
(21, 'ok tell me your details', 27, 20, 'off', '2017-05-06 12:48:57'),
(22, 'jasir , ph no is 7736663588', 20, 27, 'off', '2017-05-06 12:49:22'),
(23, 'hii', 20, 28, 'off', '2017-05-06 13:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) DEFAULT NULL,
  `district_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `district_id`) VALUES
(1, 'Manjeri', 1),
(2, 'Malappuram', 1),
(3, 'Perinthalmanna', 1),
(4, 'valiyangadi', 1),
(5, 'angadipuram', 1),
(7, 'pulamanthol', 1),
(8, 'keeyaattoor', 1),
(9, 'valiyangadi', 2),
(10, 'mittayitheruvu', 2),
(11, 'calicut', 2),
(12, 'bepoor', 2),
(13, 'vaikom', 2),
(14, 'cheriyangadi', 2),
(15, 'kanakapuram', 4),
(16, 'devanaadu', 4),
(17, 'eravipuram', 4),
(18, 'kedharinadu', 4),
(19, 'mannarkad', 3),
(20, 'beemanad', 3),
(21, 'palakkad', 3),
(22, 'pattambi', 3),
(23, 'olokod', 3),
(24, 'shornoor', 3),
(25, 'kakanjeri', 5),
(26, 'kodalapalam', 5),
(27, 'devipuram', 5),
(28, 'kalapakkam', 5),
(29, 'koimbathoor', 6),
(30, 'kodapakkam', 6),
(31, 'pettanadu', 6),
(32, 'peetharikappam', 6);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(50) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(50) DEFAULT NULL,
  `state_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `state_id`) VALUES
(1, 'Malappuram', 1),
(2, 'calicut', 1),
(3, 'palakkad', 1),
(4, 'Kanichipuram', 2),
(5, 'Erode', 2),
(6, 'Coimbatore', 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) DEFAULT NULL,
  `feedback` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `feedback`, `date`, `status`) VALUES
(3, 1, 'cx', '2017-01-15', ''),
(4, 2, 'kkk', '2017-01-15', ''),
(7, NULL, 'm', NULL, ''),
(8, 1, 'good', '2017-01-18', ''),
(9, 10, 'hi admin how r u . \r\nthis is a wonderfull web site', '2017-03-21', 'solved'),
(10, 19, 'good web site', '2017-03-21', 'solved'),
(11, 19, 'hi admin\r\nhow are u', '2017-03-21', 'solved'),
(12, 19, 'nice app', '2017-03-21', 'solved'),
(13, 19, 'faaaaaaaaaaaaasdasasd', '2017-03-21', 'solved'),
(14, 19, 'asdassad', '2017-03-21', 'solved'),
(15, 19, 'good\r\n', '2017-03-21', 'solved'),
(16, 19, 'nice ', '2017-03-21', 'solved'),
(17, 19, 'kk feedbcak', '2017-03-21', 'solved'),
(18, 10, 'jasir feebak', '2017-03-21', 'solved'),
(19, 10, 'Please add an option to search users', '2017-03-21', 'unsolved'),
(20, 23, 'it will very easy to use. And also simple to understand', '2017-04-10', 'unsolved'),
(21, 27, 'Show Remaning days before expire', '2017-05-06', 'unsolved');

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
-- Table structure for table `need`
--

CREATE TABLE IF NOT EXISTS `need` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `need`
--

INSERT INTO `need` (`id`, `user_id`, `category`, `p_name`, `Descriptions`, `district`, `city`, `post_date`, `with_date`, `owner_mail`, `status`) VALUES
(22, 20, 'Electronics', 'laptop', 'lenovo', '1Malappuram', 'Perinthalmanna', '2017-04-24', '2017-05-14', 'jasirmj@gmail.com', 'Under Admin Veryfications'),
(23, 20, 'Electronics', 'laptop', 'lenovo laptop\r\noperating system like Windows 10\r\nblack colour\r\n', '1Malappuram', 'Perinthalmanna', '2017-04-24', '2017-05-23', 'jasirmj@gmail.com', ' Admin Aproved'),
(24, 26, 'Mobiles & Tablets', 'mobilephone', 'samsung\r\nbalck colour', '3palakkad', 'mannarkad', '2017-04-24', '2017-03-21', 'majidafarsana@gmail.com', ' Admin Aproved'),
(25, 21, 'Vehicles', 'i20', 'Hundai', '2calicut', 'calicut', '2017-04-24', '2017-07-24', 'afeef@gmail.com', ' Admin Aproved'),
(26, 27, 'Kitchen', 'Knife', 'Sharp', '3palakkad', 'palakkad', '2017-05-06', '2017-05-31', 'teamopn@gmail.com', ' Admin Aproved'),
(27, 28, 'Vehicles', 'car', 'alto\r\nblack color', '2calicut', 'valiyangadi', '2017-05-06', '6-5-2017', 'farsana@gmail.com', ' Admin Aproved');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(50) NOT NULL AUTO_INCREMENT,
  `state` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state`) VALUES
(1, 'kerala'),
(2, 'Tamil Nadu'),
(3, 'Punjab'),
(4, 'Sikkim');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `dob` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regdate` varchar(50) NOT NULL,
  `extdate` varchar(400) NOT NULL,
  `ign` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `address`, `state`, `district`, `gender`, `contact`, `email`, `image`, `password`, `dob`, `status`, `regdate`, `extdate`, `ign`) VALUES
(20, 'Mohammed Jasir Kp', 'Kalathumpadiyan', '', '', '', 7736663588, 'jasirmj@gmail.com', 'IMG_20170214_164039.jpg', '12345', '', 'extended', '30-03-2017', '2017-06-05', 'no'),
(21, 'Afeef K', 'Kutinmeel', '', '', '', 7736663231, 'afeef@gmail.com', 'f74efae5b1ae2ee2d5c8877538bdd7f7.jpg', '12345', '', 'extended', '30-02-2017', '2017-05-24', 'no'),
(22, 'aslamiya', 'manammal(h)\r\nthirurkad(po)\r\nmalapuram(dt)', '', '', '', 9989248691, 'aslamiya@gmail.com', '2017-03-04.png', '12345', '', 'free', '30-03-2017', '', 'no'),
(23, 'Majida', 'Keedath', '', '', '', 9845673421, 'majida@gmail.com', 'majida.jpg', '12345', '', 'free', '10-04-2017', '', 'no'),
(24, NULL, NULL, '', '', '', 4536726112, 'majida@gmail.com', NULL, '12345', '', 'free', '10-04-2017', '', 'no'),
(25, NULL, NULL, '', '', '', 1324567812, 'majida@gmail.com', NULL, '12345', '', 'free', '10-04-2017', '', 'no'),
(26, 'majidafarsana', 'keedath(h)\r\nalanallur', '', '', '', 9834251678, 'majidafarsana@gmail.com', '8521032_orig.jpg', '123', '', 'free', '24-04-2017', '', 'no'),
(27, 'TEAM OPN', 'OPN', '', '', '', 7894561230, 'teamopn@gmail.com', '116-13.jpg', '12345', '', 'free', '06-05-2017', '', 'no'),
(28, 'farsana', 'keedath(h)\r\nalanallur(po)', '', '', '', 7345234532, 'farsana@gmail.com', 'IMG-20150422-WA0030.jpg', '12345', '', 'free', '06-05-2017', '', 'no');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
