-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 02:46 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `design`
--

-- --------------------------------------------------------

--
-- Table structure for table `des`
--

CREATE TABLE `des` (
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `des`
--

INSERT INTO `des` (`Name`, `Email`, `Password`, `Role`) VALUES
('RACIS18', 'racis18@gmail.com', 'racis18', 'admin'),
('VIJI RAJENDRAN', 'vijirajv@gmail.com', 'racis18', 'subadmin'),
('ANURAJ MOHAN', 'anurajmohan@gmail.com', 'racis18', 'subadmin'),
('SYAM SANKAR', 'syam.sankar8@gmail.com', 'racis18', 'subadmin'),
('S SINDHU', 'sindhu.nss@gmail.com', 'racis18', 'subadmin'),
('USHA K', 'usha.dileep@gmail.com', 'racis18', 'subadmin'),
('MAYA MOHAN', 'mayajeevan@gmail.com', 'racis18', 'subadmin'),
('Sruthy Manmadhan', 'sruthym.88@gmail.com', 'racis18', 'subadmin'),
('KIRAN V K', 'kiranvk.nss@gmail.com', 'racis18', 'subadmin'),
('Pillai Praveen Thulasidharan', 'praveentpillai@gmail.com', 'racis18', 'subadmin'),
('BALAGOPAL N', 'balagopaln89@gmail.com', 'racis18', 'subadmin'),
('CHITRA S NAIR', 'chitranairis@gmail.com', 'racis18', 'subadmin'),
('REMYA G', 'gremyanair@gmail.com', 'racis18', 'subadmin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Upload` varchar(100) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `Review1` decimal(10,0) DEFAULT NULL,
  `Review2` decimal(10,0) DEFAULT NULL,
  `sub1` varchar(100) DEFAULT NULL,
  `sub2` varchar(100) DEFAULT NULL,
  `Status` varchar(5) DEFAULT NULL,
  `substatus1` varchar(20) DEFAULT NULL,
  `substatus2` varchar(20) DEFAULT NULL,
  `decision` varchar(10) DEFAULT NULL,
  `r11` float DEFAULT NULL,
  `r21` float DEFAULT NULL,
  `r31` float DEFAULT NULL,
  `r41` float DEFAULT NULL,
  `r51` float DEFAULT NULL,
  `r61` float DEFAULT NULL,
  `r71` varchar(500) DEFAULT NULL,
  `r12` float DEFAULT NULL,
  `r22` float DEFAULT NULL,
  `r32` float DEFAULT NULL,
  `r42` float DEFAULT NULL,
  `r52` float DEFAULT NULL,
  `r62` float DEFAULT NULL,
  `r72` varchar(500) DEFAULT NULL,
  `plagiarism` int(11) DEFAULT NULL,
  `subdecision` varchar(20) DEFAULT NULL,
  `trash` int(11) NOT NULL DEFAULT '0',
  `ext` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `des`
--
ALTER TABLE `des`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `Upload` (`Upload`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
