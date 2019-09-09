-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2019 at 07:32 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

DROP TABLE IF EXISTS `tbl_ans`;
CREATE TABLE IF NOT EXISTS `tbl_ans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(1, 1, 0, 'Lala Lajpat Rai'),
(2, 1, 0, 'Gopal Krishna Gokhale'),
(3, 1, 1, 'Bal Gangadhar Tilak'),
(4, 1, 0, 'Madan Mohan Malviya'),
(5, 2, 0, 'Article 280'),
(6, 2, 1, 'Article 352'),
(7, 2, 0, 'Article 356'),
(8, 2, 0, 'Article 370'),
(9, 3, 0, 'Bharat Muni'),
(10, 3, 1, 'Kapil Muni'),
(11, 3, 0, 'Adi Shankaracharya'),
(12, 3, 0, 'Agastya Rishi'),
(13, 4, 0, 'Mrinal Sen'),
(14, 4, 0, 'Shyam Bengal'),
(15, 4, 1, 'Satyajit Ray'),
(16, 4, 0, 'Mira Nair'),
(23, 5, 1, 'checkbox'),
(22, 5, 0, 'textarea'),
(21, 5, 0, 'radio button'),
(24, 5, 0, 'radio or checkbox'),
(25, 6, 1, 'Content Management System'),
(26, 6, 0, 'Creative Management System'),
(27, 6, 0, 'Content Mixing System'),
(28, 6, 0, 'Creatives Managerial System');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

DROP TABLE IF EXISTS `tbl_ques`;
CREATE TABLE IF NOT EXISTS `tbl_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`) VALUES
(1, 1, 'The Maratha and The Kesri were the two main newspapers started by….'),
(2, 2, 'National emergency arising out of the war, armed rebellion or external aggression is dealt under….'),
(3, 3, 'Which of the following personalities is considered to be the originator of Sankhya philosophy?'),
(4, 4, 'Which of the following personalities from India is the only winner of Special Oscar in the history of Indian Cinema so far?'),
(6, 5, 'Which input control is better suited for allowing users to make multiple selections?'),
(7, 6, 'What is a CMS in web design');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `username`, `password`, `email`, `status`) VALUES
(1, 'Mahmudul Hassan', 'mahmudul', '202cb962ac59075b964b07152d234b70', 'mahmudul@gmail.com', 1),
(2, 'Delowar Jahan Imran JH', 'delowar', '202cb962ac59075b964b07152d234b70', 'delowar@gmail.com', 0),
(4, 'MMG Faisal', 'faisal', '202cb962ac59075b964b07152d234b70', 'faisal@gmail.com', 0),
(5, 'Atiqur Rahman', 'atiqur', '202cb962ac59075b964b07152d234b70', 'atiqur@gmail.com', 0),
(6, 'Ashikur Rahman', 'ashik', '202cb962ac59075b964b07152d234b70', 'ashik@gmail.com', 0),
(7, 'Shakib Monshe', 'shakib', '202cb962ac59075b964b07152d234b70', 'shakib@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
