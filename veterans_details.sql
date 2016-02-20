-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2015 at 01:37 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `veterans`
--

-- --------------------------------------------------------

--
-- Table structure for table `veterans_details`
--

CREATE TABLE IF NOT EXISTS `veterans_details` (
`Veteran_ID` int(10) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `SSN` char(15) NOT NULL,
  `State` char(15) NOT NULL,
  `City` char(30) NOT NULL,
  `Contact_No` char(15) NOT NULL,
  `Gender` char(10) NOT NULL,
  `Vet_Status` char(10) NOT NULL,
  `OIF_OEF` char(10) NOT NULL,
  `Less_AMI` char(10) NOT NULL,
  `Head_HH` char(10) NOT NULL,
  `Children` char(10) NOT NULL,
  `Eligible_SSVF` char(10) NOT NULL,
  `Entry_Dt` char(10) NOT NULL,
  `Exit_Dt` char(20) NOT NULL,
  `Ineligibility_ID` char(10) NOT NULL,
  `Destination_ID` char(10) NOT NULL,
  `H_Sub_ID` char(10) NOT NULL,
  `Area_ID` char(10) NOT NULL,
  `Staff_ID` char(10) NOT NULL,
  `Ethinicity_ID` char(10) NOT NULL,
  `Race_ID` char(10) NOT NULL,
  `Category_ID` char(10) NOT NULL,
  `Income_ID` char(10) NOT NULL,
  `Operation_ID` char(10) NOT NULL,
  `Referral_ID` char(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veterans_details`
--

INSERT INTO `veterans_details` (`Veteran_ID`, `Last_Name`, `First_Name`, `SSN`, `State`, `City`, `Contact_No`, `Gender`, `Vet_Status`, `OIF_OEF`, `Less_AMI`, `Head_HH`, `Children`, `Eligible_SSVF`, `Entry_Dt`, `Exit_Dt`, `Ineligibility_ID`, `Destination_ID`, `H_Sub_ID`, `Area_ID`, `Staff_ID`, `Ethinicity_ID`, `Race_ID`, `Category_ID`, `Income_ID`, `Operation_ID`, `Referral_ID`) VALUES
(1, 'abc', 'abc', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Lohiya', 'Sumant', 'aa', 'MA', 'Boston', '20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Virkar', 'Janhavi', 'sss', 'California', 'Milpitas', '45678', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'bbb', 'daodhfh', 'jfsjfhjf', 'djkvsjn', 'fndjfn', 'djfdjlf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Virkar', 'Janhavi', 'bb', 'California', 'Milpitas', 'bb', 'F', 'S', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'qqq', 'qq', 'qq', 'qq', 'qqqq', 'qq', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'K', 'K', 'K', 'K', 'KK', 'K', 'K', 'K', 'K', 'K', 'K', 'K', 'K', 'K', 'K', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', '', '', '', '', '', '', ''),
(20, 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', '', '', '', '', '', ''),
(21, 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', '', '', '', '', ''),
(23, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', '', '', '', ''),
(24, 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', 'C', ''),
(25, 'JOYETA', 'CHATERRJEE', '54321', 'MA', 'Worcester', '8768765678', 'F', 'Q', 'W', 'Y', 'N', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `veterans_details`
--
ALTER TABLE `veterans_details`
 ADD PRIMARY KEY (`Veteran_ID`), ADD UNIQUE KEY `SSN` (`SSN`), ADD UNIQUE KEY `Contact_No` (`Contact_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `veterans_details`
--
ALTER TABLE `veterans_details`
MODIFY `Veteran_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
