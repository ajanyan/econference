-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 02:34 PM
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
('Ajanyan', 'ajanyan@gmail.com', 'asdf', 'admin'),
('aaa', 'aa@a.com', 'asdf', 'subadmin'),
('konchitha', 'konchitha@gmail.com', 'asdf', 'subadmin'),
('aaaaa', 'aaaaaa@gmail.com', 'asdf', 'subadmin'),
('DEMO1', 'demo1@gmail.com', 'asdf', 'subadmin'),
('DEMO2', 'demo2@gmail.com', 'asdf', 'subadmin'),
('demo', 'demo@gmail.com', 'asdf', 'subadmin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Upload` varchar(100) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `Review1` decimal(10,0) DEFAULT NULL,
  `Review2` decimal(10,0) DEFAULT NULL,
  `sub1` varchar(100) DEFAULT NULL,
  `sub2` varchar(100) DEFAULT NULL,
  `Status` varchar(5) DEFAULT NULL,
  `substatus1` varchar(10) DEFAULT NULL,
  `substatus2` varchar(10) DEFAULT NULL,
  `decision` varchar(10) DEFAULT NULL,
  `r11` float DEFAULT NULL,
  `r21` float DEFAULT NULL,
  `r31` float DEFAULT NULL,
  `r41` float DEFAULT NULL,
  `r51` float DEFAULT NULL,
  `r61` float DEFAULT NULL,
  `r12` float DEFAULT NULL,
  `r22` float DEFAULT NULL,
  `r32` float DEFAULT NULL,
  `r42` float DEFAULT NULL,
  `r52` float DEFAULT NULL,
  `r62` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Email`, `Upload`, `title`, `Review1`, `Review2`, `sub1`, `sub2`, `Status`, `substatus1`, `substatus2`, `decision`, `r11`, `r21`, `r31`, `r41`, `r51`, `r61`, `r12`, `r22`, `r32`, `r42`, `r52`, `r62`) VALUES
(1, 'Ajanyan P Pradeep', 'ajanyan@gmail.com', 'doc1', 'demo', NULL, '10', 'aaa', 'konchitha', NULL, NULL, 'Accept', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3.9, 5, 5, 5, 5, 5),
(2, 'a', 'a@gmail.com', 'doc2', 'demo', '10', '10', 'aaa', 'konchitha', 'Yes', 'Accept', 'Accept', 'Accept', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(3, 'a', 'a@gmail.com', 'doc3', 'demo', '10', '10', 'aaa', 'konchitha', 'Yes', 'Accept', 'Accept', 'Accept', 5, 5, 5, 5, 5, 5, 5, 5, 3, 5, 5, 5),
(4, 'Aja', 'ajanyan@gmail.com', 'doc4', 'T', '10', '9', 'DEMO1', 'DEMO2', 'Yes', 'Accept', 'Reject', 'Reject', 5, 5, 5, 5, 5, 5, 2, 2, 2, 2, 2, 2),
(5, 'Aja', 'ajanyan@gmail.com', 'doc5', 'T', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Aja', 'ajanyan@gmail.com', 'doc6', 'T', '10', '9', 'DEMO1', 'DEMO2', NULL, 'Accept', 'Accept', NULL, 3, 5, 5, 5, 5, 5, 3, 3, 3, 3, 3, 3),
(7, 'Aja', 'ajanyan@gmail.com', 'doc7', 'T', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Aja', 'ajanyan@gmail.com', 'doc8', 'T', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Aja', 'ajanyan@gmail.com', 'doc9', 'T', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Aja', 'ajanyan@gmail.com', 'doc10', 'T', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Aja', 'ajanyan@gmail.com', 'doc11', 'T', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
