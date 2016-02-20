-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2015 at 06:05 AM
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
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
`Area_ID` int(10) NOT NULL,
  `Area_Desc` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`Area_ID`, `Area_Desc`) VALUES
(1, 'Rural'),
(2, 'Urban'),
(3, 'Tribal');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`Category_ID` int(2) NOT NULL,
  `Category_Desc` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Desc`) VALUES
(1, '1- Prevention (Perm Housed and at Risk)'),
(2, '2- Literally Homeless (Homeless to Perm in 90 Day)'),
(3, '3- Literally Homeless (Left Perm Housing within Last 90 Days)');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE IF NOT EXISTS `destination` (
`Destination_ID` int(10) NOT NULL,
  `Destination_Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ethinicity`
--

CREATE TABLE IF NOT EXISTS `ethinicity` (
`Ethinicity_ID` int(10) NOT NULL,
  `Ethinicity_Desc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family_details`
--

CREATE TABLE IF NOT EXISTS `family_details` (
`Family_ID` int(10) NOT NULL,
  `F_First_Name` char(30) NOT NULL,
  `F_Last_Name` char(30) NOT NULL,
  `F_Relationship` varchar(30) NOT NULL,
  `Veteran_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `housing_subsidy`
--

CREATE TABLE IF NOT EXISTS `housing_subsidy` (
  `H_Sub_ID` int(10) NOT NULL,
  `H_Sub_Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income_source`
--

CREATE TABLE IF NOT EXISTS `income_source` (
`Income_ID` int(10) NOT NULL,
  `IncomeSource_Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ineligibility`
--

CREATE TABLE IF NOT EXISTS `ineligibility` (
`Ineligibility_ID` int(10) NOT NULL,
  `Ineligibility_Desc` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ineligibility`
--

INSERT INTO `ineligibility` (`Ineligibility_ID`, `Ineligibility_Desc`) VALUES
(1, 'Above 50% AMI'),
(2, 'Already enrolled in another SSVF Program'),
(3, 'Dishonorable Discharge'),
(4, 'Mortgage not foreclosed'),
(5, 'No Active Duty'),
(6, 'Not at risk of losing housing'),
(7, 'Not ready for SSVF services'),
(8, 'Widow');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE IF NOT EXISTS `office` (
`Office_ID` int(10) NOT NULL,
  `Office_Desc` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`Office_ID`, `Office_Desc`) VALUES
(1, 'MA-1'),
(2, 'MA-2'),
(3, 'CT-1'),
(4, 'CT-2'),
(5, 'RI-1'),
(6, 'RI-2'),
(7, 'ME-1'),
(8, 'ME-2'),
(9, 'VT-1'),
(10, 'VT-2');

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
`Operation_ID` int(10) NOT NULL,
  `Operation_Location` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`Operation_ID`, `Operation_Location`) VALUES
(1, 'WWI'),
(2, 'Desert Storm'),
(3, 'Granada'),
(4, 'Korea'),
(5, 'OEF/OIF'),
(6, 'Panama'),
(7, 'Peacetime'),
(8, 'Vietnam');

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE IF NOT EXISTS `race` (
`Race_ID` int(10) NOT NULL,
  `Race_Desc` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `race`
--

INSERT INTO `race` (`Race_ID`, `Race_Desc`) VALUES
(1, 'American Indian or Alaskan Native'),
(2, 'Asian'),
(3, 'Black or AA'),
(4, 'Native/Hawaiian'),
(5, 'White'),
(6, 'Not Known'),
(7, 'Refused');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE IF NOT EXISTS `referral` (
`Referral_ID` int(10) NOT NULL,
  `Referral_Type` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`Referral_ID`, `Referral_Type`) VALUES
(1, 'Veteran Service Officer\r\n'),
(2, 'Vocational Rehab\r\n'),
(3, 'Veterans Affairs \r\n'),
(4, 'Friends of Vets\r\n'),
(5, 'Donations Clearinghouse\r\n'),
(6, 'Department of Transitional Assistance\r\n'),
(7, 'Community Action\r\n'),
(8, 'Food Bank\r\n'),
(9, 'Upper Valley Haven\r\n'),
(10, 'Economic Services-DCF-Reach Up\r\n'),
(11, 'ESD- Good News Garage\r\n'),
(12, 'Montpelier and Barre Food Banks\r\n'),
(13, 'SEVCA\r\n'),
(14, 'Taxpayer Advocate of VT\r\n'),
(15, 'Other\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`Staff_ID` int(20) NOT NULL,
  `S_First_Name` char(30) NOT NULL,
  `S_Last_Name` char(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Office_ID` int(10) NOT NULL,
  `Staff_Type_ID` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `S_First_Name`, `S_Last_Name`, `username`, `password`, `Office_ID`, `Staff_Type_ID`) VALUES
(1001, 'Manjiri', 'Virkar', 'admin', 'admin', 1, 1),
(1002, 'Joyeta', 'Chatterjee', 'admin1', 'admin1', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE IF NOT EXISTS `staff_type` (
  `Staff_ID` int(10) NOT NULL,
`Staff_Type_ID` int(10) NOT NULL,
  `Staff_Type_Desc` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`Staff_ID`, `Staff_Type_ID`, `Staff_Type_Desc`) VALUES
(0, 1, 'Management'),
(0, 2, 'Data Entry Staff');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
`State_ID` int(10) NOT NULL,
  `State_Desc` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`State_ID`, `State_Desc`) VALUES
(1, 'CT'),
(2, 'MA'),
(3, 'ME'),
(4, 'NH'),
(5, 'RI'),
(6, 'VT');

-- --------------------------------------------------------

--
-- Table structure for table `veterans_details`
--

CREATE TABLE IF NOT EXISTS `veterans_details` (
`Veteran_ID` int(10) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `SSN` char(15) NOT NULL,
  `State_ID` int(10) NOT NULL,
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
  `Ineligibility_ID` int(10) NOT NULL,
  `Destination_ID` int(10) NOT NULL,
  `H_Sub_ID` int(10) NOT NULL,
  `Area_ID` int(10) NOT NULL,
  `Staff_ID` int(10) NOT NULL,
  `Ethinicity_ID` int(10) NOT NULL,
  `Race_ID` int(10) NOT NULL,
  `Category_ID` int(10) NOT NULL,
  `Income_ID` int(10) NOT NULL,
  `Operation_ID` int(10) NOT NULL,
  `Referral_ID` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veterans_details`
--

INSERT INTO `veterans_details` (`Veteran_ID`, `Last_Name`, `First_Name`, `SSN`, `State_ID`, `City`, `Contact_No`, `Gender`, `Vet_Status`, `OIF_OEF`, `Less_AMI`, `Head_HH`, `Children`, `Eligible_SSVF`, `Entry_Dt`, `Exit_Dt`, `Ineligibility_ID`, `Destination_ID`, `H_Sub_ID`, `Area_ID`, `Staff_ID`, `Ethinicity_ID`, `Race_ID`, `Category_ID`, `Income_ID`, `Operation_ID`, `Referral_ID`) VALUES
(1, 'abc', 'abc', '', 2, '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Lohiya', 'Sumant', 'aa', 3, 'Boston', '20', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Virkar', 'Janhavi', 'sss', 5, 'Milpitas', '45678', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'bbb', 'daodhfh', 'jfsjfhjf', 3, 'fndjfn', 'djfdjlf', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Virkar', 'Janhavi', 'bb', 5, 'Milpitas', 'bb', 'F', 'S', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 'qqq', 'qq', 'qq', 4, 'qqqq', 'qq', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 'L', 'L', 'L', 6, 'L', 'L', 'L', 'L', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 'P', 'P', 'P', 3, 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 'K', 'K', 'K', 3, 'KK', 'K', 'K', 'K', 'K', 'K', 'K', 'K', 'K', 'K', 'K', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 'M', 'M', 'M', 4, 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 'J', 'J', 'J', 1, 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 'J', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 'I', 'I', 'I', 1, 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'Y', 'Y', 'Y', 3, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 'C', 'C', 'C', 4, 'C', 'C', 'C', 'C', 'C', 'C', 'D', 'C', 'C', 'C', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 'JOYETA', 'CHATERRJEE', '54321', 3, 'Worcester', '8768765678', 'F', 'Q', 'W', 'Y', 'N', 'Y', 'Y', 'Y', 'Y', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 'Sarkar', 'sougata', 'rt', 2, 'po', 'th', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 'lop', 'hyu', 'uyh', 3, 'jui', 'yht', 'hy', 'uj', 'tg', 'uj', 'ju', 'ik', 'yh', 'th', 'tg', 1, 1, 1, 2, 1, 2, 2, 1, 2, 1, 2),
(29, 'rfg', 'edf', 'trf', 2, 'rft', 'thy', 'male', 'ghj', 'tgh', 'fgh', 'abc', 'def', 'edf', 'ed', 'er', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
 ADD PRIMARY KEY (`Area_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
 ADD PRIMARY KEY (`Destination_ID`);

--
-- Indexes for table `ethinicity`
--
ALTER TABLE `ethinicity`
 ADD PRIMARY KEY (`Ethinicity_ID`);

--
-- Indexes for table `family_details`
--
ALTER TABLE `family_details`
 ADD PRIMARY KEY (`Family_ID`);

--
-- Indexes for table `housing_subsidy`
--
ALTER TABLE `housing_subsidy`
 ADD PRIMARY KEY (`H_Sub_ID`);

--
-- Indexes for table `income_source`
--
ALTER TABLE `income_source`
 ADD PRIMARY KEY (`Income_ID`);

--
-- Indexes for table `ineligibility`
--
ALTER TABLE `ineligibility`
 ADD PRIMARY KEY (`Ineligibility_ID`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
 ADD PRIMARY KEY (`Office_ID`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
 ADD PRIMARY KEY (`Operation_ID`);

--
-- Indexes for table `race`
--
ALTER TABLE `race`
 ADD PRIMARY KEY (`Race_ID`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
 ADD PRIMARY KEY (`Referral_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
 ADD PRIMARY KEY (`Staff_Type_ID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
 ADD PRIMARY KEY (`State_ID`);

--
-- Indexes for table `veterans_details`
--
ALTER TABLE `veterans_details`
 ADD PRIMARY KEY (`Veteran_ID`), ADD UNIQUE KEY `SSN` (`SSN`), ADD UNIQUE KEY `Contact_No` (`Contact_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
MODIFY `Area_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `Category_ID` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
MODIFY `Destination_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ethinicity`
--
ALTER TABLE `ethinicity`
MODIFY `Ethinicity_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `family_details`
--
ALTER TABLE `family_details`
MODIFY `Family_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `income_source`
--
ALTER TABLE `income_source`
MODIFY `Income_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ineligibility`
--
ALTER TABLE `ineligibility`
MODIFY `Ineligibility_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
MODIFY `Office_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
MODIFY `Operation_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `race`
--
ALTER TABLE `race`
MODIFY `Race_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
MODIFY `Referral_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `Staff_ID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1003;
--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
MODIFY `Staff_Type_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
MODIFY `State_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `veterans_details`
--
ALTER TABLE `veterans_details`
MODIFY `Veteran_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
