-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 08:29 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spm`
--
CREATE DATABASE IF NOT EXISTS `spm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `spm`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Id` int(10) NOT NULL,
  `a_userid` int(10) NOT NULL DEFAULT '0',
  `a_dogid` int(10) NOT NULL DEFAULT '0',
  `a_breed` varchar(50) NOT NULL DEFAULT '',
  `a_date` varchar(20) NOT NULL DEFAULT '',
  `a_time` varchar(50) NOT NULL DEFAULT '',
  `a_options` varchar(20) NOT NULL DEFAULT '',
  `a_description` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Id`, `a_userid`, `a_dogid`, `a_breed`, `a_date`, `a_time`, `a_options`, `a_description`) VALUES
(29, 5, 6, 'test', '2018-05-16', '10am-11.30am', 'wash only', ''),
(30, 5, 6, 'test', '2018-05-16', '10am-11.30am', 'wash only', 'qq');

-- --------------------------------------------------------

--
-- Table structure for table `dinfo`
--

CREATE TABLE `dinfo` (
  `Id` int(10) NOT NULL,
  `d_ownerid` int(10) NOT NULL DEFAULT '0',
  `d_name` varchar(50) NOT NULL DEFAULT '',
  `d_breed` varchar(20) NOT NULL DEFAULT '',
  `d_date_of_birth` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dinfo`
--

INSERT INTO `dinfo` (`Id`, `d_ownerid`, `d_name`, `d_breed`, `d_date_of_birth`) VALUES
(6, 5, 'Hulk', 'zc', '2018-01-01'),
(7, 5, 'zc', 'German Shepherd', '2018-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `uinfo`
--

CREATE TABLE `uinfo` (
  `Id` int(10) NOT NULL,
  `u_name` varchar(50) NOT NULL DEFAULT '',
  `u_email` varchar(50) NOT NULL DEFAULT '',
  `u_password` varchar(20) NOT NULL DEFAULT '',
  `u_address` varchar(100) NOT NULL DEFAULT '',
  `u_state` char(3) NOT NULL DEFAULT '',
  `u_postcode` varchar(10) NOT NULL DEFAULT '0',
  `u_mobile` varchar(11) NOT NULL DEFAULT '0',
  `u_homenumber` varchar(11) NOT NULL DEFAULT '0',
  `u_worknumber` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uinfo`
--

INSERT INTO `uinfo` (`Id`, `u_name`, `u_email`, `u_password`, `u_address`, `u_state`, `u_postcode`, `u_mobile`, `u_homenumber`, `u_worknumber`) VALUES
(5, 'Tony Stark', 'tonystark@gmail.com', 'tony', 'New York City', 'NY', '10001', '10001', '10002', '10003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `a_userid` (`a_userid`),
  ADD KEY `a_dogid` (`a_dogid`);

--
-- Indexes for table `dinfo`
--
ALTER TABLE `dinfo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `d_ownerid` (`d_ownerid`);

--
-- Indexes for table `uinfo`
--
ALTER TABLE `uinfo`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `dinfo`
--
ALTER TABLE `dinfo`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `uinfo`
--
ALTER TABLE `uinfo`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`a_userid`) REFERENCES `uinfo` (`Id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`a_dogid`) REFERENCES `dinfo` (`Id`);

--
-- Constraints for table `dinfo`
--
ALTER TABLE `dinfo`
  ADD CONSTRAINT `dinfo_ibfk_1` FOREIGN KEY (`d_ownerid`) REFERENCES `uinfo` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
