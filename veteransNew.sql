-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2015 at 06:22 AM
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
  `Category_Desc` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Desc`) VALUES
(1, '1- Prevention (Perm Housed and'),
(2, '2- Literally Homeless (Homeless to Perm in 90 Day)'),
(3, '3- Literally Homeless (Left Perm Housing within Last 90 Days)');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE IF NOT EXISTS `destination` (
`Destination_ID` int(10) NOT NULL,
  `Destination_Type` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`Destination_ID`, `Destination_Type`) VALUES
(1, 'Permanent'),
(2, 'Temporary'),
(3, 'Institutional'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `ethinicity`
--

CREATE TABLE IF NOT EXISTS `ethinicity` (
`Ethinicity_ID` int(10) NOT NULL,
  `Ethinicity_Desc` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ethinicity`
--

INSERT INTO `ethinicity` (`Ethinicity_ID`, `Ethinicity_Desc`) VALUES
(1, 'Non-Hispanic/Non-Latino'),
(2, 'Hispanic/Latino'),
(3, 'Not Known'),
(4, 'Refused');

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

--
-- Dumping data for table `housing_subsidy`
--

INSERT INTO `housing_subsidy` (`H_Sub_ID`, `H_Sub_Type`) VALUES
(1, 'GPD'),
(2, 'Section 8'),
(3, 'VASH'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `income_source`
--

CREATE TABLE IF NOT EXISTS `income_source` (
`Income_ID` int(10) NOT NULL,
  `IncomeSource_Type` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_source`
--

INSERT INTO `income_source` (`Income_ID`, `IncomeSource_Type`) VALUES
(1, 'Earned Income'),
(2, 'UI'),
(3, 'SSI'),
(4, 'SSDI'),
(5, 'Veterans Disability'),
(6, 'Private Disability'),
(7, 'Worker''s Comp'),
(8, 'TANF'),
(9, 'GA'),
(10, 'SS Retirement'),
(11, 'Veteran''s Pension'),
(12, 'Pension, Former Job'),
(13, 'Child Support'),
(14, 'Alimony/Support'),
(15, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `ineligibility`
--

CREATE TABLE IF NOT EXISTS `ineligibility` (
`Ineligibility_ID` int(10) NOT NULL,
  `Ineligibility_Desc` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ineligibility`
--

INSERT INTO `ineligibility` (`Ineligibility_ID`, `Ineligibility_Desc`) VALUES
(1, 'Above 50% AMI'),
(2, 'Already enrolled in another SS'),
(3, 'Dishonorable Discharge'),
(4, 'No Active Duty'),
(5, 'Mortgage not foreclosed'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Race_Desc` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `race`
--

INSERT INTO `race` (`Race_ID`, `Race_Desc`) VALUES
(1, 'American Indian or Alaskan Nat'),
(2, 'Asian'),
(3, 'Black or AA'),
(4, 'Native/Hawaiian'),
(5, 'White'),
(6, 'unknown'),
(7, 'Refused');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE IF NOT EXISTS `referral` (
`Referral_ID` int(10) NOT NULL,
  `Referral_Type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`Referral_ID`, `Referral_Type`) VALUES
(1, 'Veteran Service Officer'),
(2, 'Vocational Rehab'),
(3, 'Veterans Affairs'),
(4, 'Friends of Vets'),
(5, 'Donations Clearinghouse'),
(6, 'Department of Transitional Assistance'),
(7, 'Community Action'),
(8, 'Food Bank'),
(9, 'Upper Valley Haven'),
(10, 'Economic Services-DCF-Reach Up'),
(11, 'ESD- Good News Garage'),
(12, 'Montpelier and Barre Food Banks'),
(13, 'SEVCA'),
(14, 'Taxpayer Advocate of VT'),
(15, 'Other');

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
) ENGINE=InnoDB AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `S_First_Name`, `S_Last_Name`, `username`, `password`, `Office_ID`, `Staff_Type_ID`) VALUES
(1001, 'Manjiri', 'Virkar', 'admin', 'admin', 123, 123),
(1002, 'Qiulin', 'Li', 'staff', '12345', 12, 0),
(1003, 'Qiulin', 'Li', 'qq', '123', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE IF NOT EXISTS `staff_type` (
  `Staff` int(11) NOT NULL,
`Staff_Type_ID` int(10) NOT NULL,
  `Staff_Type_Desc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `State_ID` int(10) NOT NULL,
  `State_Desc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`State_ID`, `State_Desc`) VALUES
(1, 'MA'),
(2, 'CT'),
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
  `SSN` char(15) DEFAULT NULL,
  `State` char(15) DEFAULT NULL,
  `City` char(30) DEFAULT NULL,
  `Contact_No` char(15) DEFAULT NULL,
  `Gender` char(10) DEFAULT NULL,
  `Vet_Status` char(10) DEFAULT NULL,
  `OIF_OEF` char(10) DEFAULT NULL,
  `Less_AMI` char(10) DEFAULT NULL,
  `Head_HH` char(10) DEFAULT NULL,
  `Children` char(10) DEFAULT NULL,
  `Eligible_SSVF` char(10) DEFAULT NULL,
  `Entry_Dt` char(10) DEFAULT NULL,
  `Exit_Dt` char(20) DEFAULT NULL,
  `Ineligibility_ID` char(10) DEFAULT NULL,
  `Destination_ID` char(10) DEFAULT NULL,
  `H_Sub_ID` char(10) DEFAULT NULL,
  `Area_ID` char(10) DEFAULT NULL,
  `Staff_ID` char(10) DEFAULT NULL,
  `Ethinicity_ID` char(10) DEFAULT NULL,
  `Race_ID` char(10) DEFAULT NULL,
  `Category_ID` char(10) DEFAULT NULL,
  `Income_ID` char(10) DEFAULT NULL,
  `Operation_ID` char(10) DEFAULT NULL,
  `Referral_ID` char(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veterans_details`
--

INSERT INTO `veterans_details` (`Veteran_ID`, `Last_Name`, `First_Name`, `SSN`, `State`, `City`, `Contact_No`, `Gender`, `Vet_Status`, `OIF_OEF`, `Less_AMI`, `Head_HH`, `Children`, `Eligible_SSVF`, `Entry_Dt`, `Exit_Dt`, `Ineligibility_ID`, `Destination_ID`, `H_Sub_ID`, `Area_ID`, `Staff_ID`, `Ethinicity_ID`, `Race_ID`, `Category_ID`, `Income_ID`, `Operation_ID`, `Referral_ID`) VALUES
(25, 'JOYETA', 'CHATERRJEE', '54321', 'MA', 'Worcester', '8768765678', 'F', 'Q', 'W', 'Y', 'N', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', ''),
(73, 'Depalo', 'Lucas', '123450987', '2', 'Springfield', '4137798869', 'male', 'no', 'no', 'no', 'no', 'no', 'no', '04/04/2014', '04/04/2015', '5', '1', '2', '3', '123', '1', '1', '2', '1', '3', '1'),
(74, 'Thompson', 'Mareimy', '123321222', '1', 'Worcester', '4136675467', 'male', 'yes', 'no', 'no', 'no', 'no', 'yes', '01/01/14', '01/01/15', '2', '4', '3', '3', '1234', '1', '6', '2', '3', '5', '3'),
(75, 'Jones', 'Frank', '123321222111', '6', 'Worcester', '4136675488', 'male', 'yes', 'no', 'no', 'no', 'no', 'yes', '01/01/14', '01/01/15', '2', '4', '3', '3', '1234', '1', '4', '2', '3', '7', '3'),
(76, 'Madinas', 'Betty', '123321222222', '3', 'Worcester', '4136675400', 'female', 'yes', 'yes', 'yes', 'no', 'no', 'no', '01/01/14', '01/01/15', '5', '3', '1', '3', '1230', '3', '4', '1', '3', '3', '3'),
(77, 'Majors', 'Lee', '12332129999', '5', 'Worcester', '4136675433', 'female', 'yes', 'no', 'yes', 'no', 'no', 'no', '01/01/14', '01/01/15', '2', '1', '4', '1', '1230', '2', '3', '3', '3', '3', '3'),
(78, 'Smith ', 'Logan', '12332129789', '6', 'Springfield', '4136675123', 'female', 'yes', 'no', 'no', 'yes', 'no', 'no', '02/03/14', '01/01/15', '7', '3', '1', '3', '12', '3', '4', '3', '3', '3', '3'),
(80, 'Ciborowski', 'Bill', '445532129789', '3', 'Springfield', '4126675321', 'female', 'yes', 'no', 'no', 'yes', 'no', 'no', '05/03/14', '01/01/15', '7', '3', '1', '3', '12', '3', '4', '2', '3', '3', '3'),
(81, 'Lynde', 'Jim', '789532129789', '4', 'Springfield', '4128975321', 'female', 'yes', 'no', 'no', 'yes', 'no', 'no', '05/03/14', '01/01/15', '7', '3', '1', '3', '12', '3', '4', '2', '3', '3', '3'),
(82, 'Depalo', 'Lucas', '789532129000', '4', 'Springfield', '4128975000', 'female', 'yes', 'no', 'no', 'yes', 'no', 'no', '05/03/14', '01/01/15', '7', '3', '1', '3', '12', '3', '4', '2', '3', '3', '3'),
(83, 'Smith', 'Thomas', '789532129456', '4', 'Springfield', '4128975456', 'female', 'yes', 'no', 'no', 'yes', 'no', 'no', '05/03/14', '01/01/15', '7', '3', '1', '2', '12', '3', '4', '2', '3', '3', '3'),
(84, 'Younger', 'Tracy', '78953212945690', '4', 'Springfield', '4125435456', 'female', 'yes', 'no', 'no', 'yes', 'no', 'no', '05/03/14', '01/01/15', '8', '1', '1', '2', '12', '3', '4', '3', '3', '3', '3'),
(85, 'Thompson', 'Yampiel', '789532123945690', '4', 'Springfield', '4126785456', 'male', 'no', 'no', 'no', 'yes', 'no', 'no', '05/03/14', '01/01/15', '8', '1', '2', '2', '12', '3', '5', '1', '`1', '3', '2'),
(86, 'Ciborowski', 'Bill', '78953212394760', '4', 'Springfield', '4126785809', 'male', 'no', 'no', 'no', 'yes', 'no', 'no', '08/12/14', '01/01/15', '8', '1', '2', '2', '12', '4', '5', '2', '`1', '8', '2'),
(87, 'Charles', 'Clifford', '78953212360', '5', 'Springfield', '4126785102', 'male', 'no', 'yes', 'no', 'yes', 'no', 'no', '08/12/14', '01/01/15', '8', '1', '2', '2', '12', '4', '5', '2', '`1', '4', '2'),
(88, 'Ryan', 'Clifford', '78953212361', '5', 'Springfield', '4126785103', 'male', 'no', 'yes', 'no', 'yes', 'no', 'no', '08/12/14', '01/01/15', '8', '1', '2', '2', '12', '4', '5', '2', '`1', '4', '2'),
(89, 'Ryan', 'Kristine', '78953212362', '6', 'Springfield', '4126785104', 'male', 'no', 'yes', 'no', 'yes', 'no', 'no', '08/12/14', '01/01/15', '8', '2', '3', '3', '12', '2', '5', '3', '`1', '4', '2'),
(90, 'Ryan', 'Kristine', '78953212363', '6', 'Agawam', '4126785105', 'female', 'no', 'yes', 'no', 'yes', 'no', 'no', '08/12/14', '01/01/15', '8', '2', '3', '3', '12', '2', '5', '3', '`1', '4', '2'),
(91, 'Wilson', 'Tony', '78953212364', '4', 'Agawam', '4126785106', 'female', 'no', 'yes', 'no', 'yes', 'no', 'no', '08/12/14', '01/01/15', '8', '2', '3', '3', '12', '2', '5', '3', '`1', '4', '2'),
(92, 'Smith', 'Thomas', '78953212365', '4', 'Agawam', '4126785107', 'female', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '8', '2', '3', '3', '12', '2', '5', '3', '`1', '4', '2'),
(93, 'Lynde', 'Jim', '78953212366', '4', 'Agawam', '4126785108', 'female', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '8', '2', '3', '3', '12', '2', '5', '3', '`1', '4', '2'),
(94, 'Madinas', 'Betty', '78953212367', '4', 'Agawam', '4126785109', 'female', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(95, 'Thompson', 'Mareimy', '78953212368', '4', 'Agawam', '4126785119', 'female', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(96, 'Thompson', 'Yampiel', '78953212369', '4', 'Agawam', '4126785120', 'female', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(97, 'Bell', 'James', '78953212370', '4', 'Agawam', '4126785121', 'female', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(98, 'Jones', 'Frank', '78953212371', '2', 'West Springfield', '4126785122', 'female', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(99, 'Pressley', 'Samia', '78953212372', '2', 'West Springfield', '4126785123', 'female', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(100, 'Sarkis', 'Samia', '78953212373', '2', 'West Springfield', '4126785124', 'male', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(101, 'Joseph', 'Sarkis', '78953212374', '2', 'West Springfield', '4126785125', 'male', 'no', 'no', 'no', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(102, 'Amy', 'Zeng', '78953212375', '2', 'West Springfield', '4126785126', 'female', 'no', 'no', 'no', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(103, 'Soussan', 'Djamasbi', '78953212376', '4', 'West Springfield', '4126785127', 'female', 'no', 'no', 'no', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(104, 'Soussan', 'Djamasbi', '78953212377', '4', 'West Springfield', '4126785128', 'female', 'no', 'no', 'no', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(105, 'Michael', 'Elmes', '78953212378', '4', 'Chicopee', '4126785129', 'female', 'no', 'no', 'no', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(106, 'Michael', 'Elmes', '78953212379', '4', 'Chicopee', '4126785130', 'female', 'no', 'no', 'no', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(107, 'Arthur', 'Gerstenfeld', '78953212380', '4', 'Chicopee', '4126785131', 'male', 'no', 'no', 'no', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(108, 'Arthur', 'Gerstenfeld', '78953212381', '4', 'Chicopee', '4126785132', 'male', 'no', 'no', 'no', 'yes', 'yes', 'yes', '10/09/13', '03/03/15', '1', '2', '4', '1', '09', '1', '5', '1', '`2', '4', '1'),
(109, 'Huong N. ', 'Higgins', '78953212382', '4', 'Chicopee', '4126785133', 'male', 'no', 'no', 'no', 'yes', 'yes', 'yes', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(110, 'Huong N. ', 'Higgins', '78953212383', '4', 'Chicopee', '4126785134', 'female', 'no', 'no', 'no', 'yes', 'yes', 'yes', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(111, 'Frank', 'Hoy', '78953212384', '4', 'Chicopee', '4126785135', 'female', 'no', 'no', 'no', 'yes', 'yes', 'yes', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(112, 'Frank', 'Hoy', '78953212385', '4', 'Chicopee', '4126785136', 'female', 'no', 'no', 'no', 'yes', 'yes', 'yes', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(113, 'Sharon A. ', 'Johnson', '78953212386', '6', 'Chicopee', '4126785137', 'female', 'no', 'no', 'no', 'yes', 'yes', 'yes', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(114, 'Sharon A. ', 'Johnson', '78953212387', '6', 'Chicopee', '4126785138', 'female', 'no', 'no', 'no', 'yes', 'yes', 'yes', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(115, 'Chickery J. ', 'Kasouf', '78953212390', '6', 'Holyoke', '4126785140', 'male', 'yes', 'yes', 'yes', 'no', 'no', 'no', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(116, 'Chickery J. ', 'Kasouf', '78953212391', '6', 'Holyoke', '4126785141', 'male', 'yes', 'yes', 'yes', 'no', 'no', 'no', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(117, 'Renata', 'Konrad', '78953212392', '6', 'Holyoke', '4126785142', 'male', 'yes', 'yes', 'yes', 'no', 'no', 'no', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(118, 'Renata', 'Konrad', '78953212393', '1', 'Holyoke', '4126785143', 'male', 'yes', 'yes', 'yes', 'no', 'no', 'no', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(119, 'Dimitrios', 'Koutmos', '78953212394', '1', 'Holyoke', '4126785144', 'male', 'yes', 'yes', 'yes', 'no', 'no', 'no', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(120, 'Dimitrios', 'Koutmos', '78953212395', '1', 'Holyoke', '4126785145', 'male', 'yes', 'yes', 'yes', 'no', 'no', 'no', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(121, 'Eleanor T. ', 'Loiacono', '78953212396', '1', 'Holyoke', '4126785146', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(122, 'Eleanor T. ', 'Loiacono', '78953212397', '1', 'Worcester', '4126785147', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(123, 'Karla Abarca', 'Mendoza', '78953212398', '1', 'Worcester', '4126785148', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(124, 'Abarca', 'Mendoza', '78953212399', '1', 'Worcester', '4126785149', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '07/10/13', '11/11/15', '3', '3', '1', '3', '11', '3', '4', '3', '`1', '7', '2'),
(125, 'Fabienne', 'Miller', '78953212300', '1', 'Worcester', '4126785150', 'male', 'no', 'yes', 'no', 'yes', 'no', 'yes', '08/01/14', '05/01/15', '1', '1', '2', '2', '01', '2', '2', '2', '`1', '3', '2'),
(126, 'Adrienne', 'Miller', '78953212301', '1', 'Worcester', '4126785151', 'male', 'no', 'yes', 'no', 'yes', 'no', 'yes', '08/01/14', '05/01/15', '1', '1', '2', '2', '01', '2', '2', '2', '`1', '3', '2'),
(127, 'Hall', 'Phillips', '78953212302', '1', 'Worcester', '4126785152', 'male', 'no', 'yes', 'no', 'yes', 'no', 'yes', '08/01/14', '05/01/15', '1', '1', '2', '2', '01', '2', '2', '2', '`1', '3', '2'),
(128, 'Phillips', 'Phillips', '78953212303', '1', 'Worcester', '4126785153', 'female', 'no', 'yes', 'no', 'yes', 'no', 'yes', '08/01/14', '05/01/15', '1', '1', '2', '2', '01', '2', '2', '2', '`1', '3', '2'),
(129, 'Mark P. ', 'Rice', '78953212304', '1', 'Worcester', '4126785154', 'female', 'no', 'yes', 'no', 'yes', 'no', 'yes', '08/01/14', '05/01/15', '1', '1', '2', '2', '01', '2', '2', '2', '`1', '3', '2'),
(130, 'Mark P. ', 'Rice', '78953212305', '1', 'Worcester', '4126785155', 'female', 'no', 'yes', 'no', 'yes', 'no', 'yes', '08/01/14', '05/01/15', '1', '1', '2', '2', '01', '2', '2', '2', '`1', '3', '2'),
(131, 'Jerome J. ', 'Schaufeld', '78953212306', '1', 'Worcester', '4126785156', 'female', 'no', 'yes', 'no', 'yes', 'no', 'yes', '08/01/14', '05/01/15', '1', '1', '2', '2', '01', '2', '2', '2', '`1', '3', '2'),
(132, 'Jerome J. ', 'Schaufeld', '78953212307', '1', 'Worcester', '4126785157', 'female', 'no', 'yes', 'no', 'yes', 'no', 'yes', '08/01/14', '05/01/15', '1', '1', '2', '2', '01', '2', '2', '2', '`1', '3', '2'),
(133, 'Purvi', 'Shah', '78953212308', '3', 'Worcester', '4126785158', 'female', 'no', 'yes', 'no', 'yes', 'no', 'yes', '08/01/14', '05/01/15', '1', '1', '2', '2', '01', '2', '2', '2', '`1', '3', '2'),
(134, 'Purvi', 'Shah', '78953212309', '3', 'Worcester', '4126785159', 'female', 'no', 'yes', 'no', 'yes', 'no', 'yes', '08/01/14', '05/01/15', '1', '1', '2', '2', '01', '2', '2', '2', '`1', '3', '2'),
(135, 'William C. ', 'Stitt', '78953212310', '3', 'Worcester', '4126785160', 'female', 'no', 'yes', 'no', 'yes', 'no', 'yes', '08/01/14', '05/01/15', '1', '1', '2', '2', '01', '2', '2', '2', '`1', '3', '2'),
(136, 'William ', 'Stitt', '78953212311', '3', 'Worcester', '4126785161', 'male', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(137, 'William ', 'Stitt', '78953212312', '3', 'Worcester', '4126785162', 'male', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(138, 'Diane M ', 'Strong', '78953212313', '3', 'Worcester', '4126785163', 'male', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(139, 'Diane M ', 'Strong', '78953212314', '3', 'Worcester', '4126785164', 'male', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(140, 'Kevin M. ', 'Sweeney', '78953212315', '3', 'Worcester', '4126785165', 'male', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(141, 'Kevin M. ', 'Sweeney', '78953212316', '3', 'Worcester', '4126785166', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(142, 'Steven S. ', 'Taylor', '78953212317', '4', 'Worcester', '4126785167', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(143, 'Steven S. ', 'Taylor', '78953212318', '4', 'Worcester', '4126785168', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(144, 'Towner', 'Taylor', '78953212319', '4', 'Worcester', '4126785169', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(145, 'Walter ', 'Towner', '78953212320', '4', 'Worcester', '4126785170', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(146, 'Walter ', 'Towner', '78953212321', '4', 'Worcester', '4126785171', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(147, 'Andrew', 'Trapp', '78953212322', '4', 'Worcester', '4126785172', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(148, 'Andrew', 'Trapp', '78953212323', '4', 'Worcester', '4126785173', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(149, 'Bengisu ', 'Tulu', '78953212324', '4', 'Worcester', '4126785174', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(150, 'Bengisu ', 'Tulu', '78953212325', '4', 'Worcester', '4126785175', 'male', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '`1', '3', '2'),
(151, 'Helen', 'Vassallo', '78953212326', '4', 'Worcester', '4126785176', 'male', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(152, 'Helen', 'Vassallo', '78953212327', '4', 'Worcester', '4126785177', 'male', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(153, 'Justin ', 'Wang', '78953212328', '4', 'Worcester', '4126785178', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(154, 'Justin ', 'Wang', '78953212329', '4', 'Worcester', '4126785179', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(155, 'Sharon', 'Wulf', '78953212330', '4', 'Worcester', '4126785180', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(156, 'Sharon', 'Wulf', '78953212331', '4', 'Worcester', '4126785181', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '08/01/14', '05/01/15', '3', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(157, 'Joe ', 'Zhu', '78953212332', '4', 'Worcester', '4126785182', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '12/12/14', '06/06/15', '2', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(158, 'Joe ', 'Zhu', '78953212333', '4', 'Worcester', '4126785183', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '12/12/14', '06/06/15', '2', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(159, 'Paul ', 'Delvy', '78953212334', '4', 'Worcester', '4126785184', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '12/12/14', '06/06/15', '2', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(160, 'Paul ', 'Delvy', '789532123345', '4', 'Worcester', '4126785185', 'female', 'yes', 'no', 'yes', 'no', 'yes', 'no', '12/12/14', '06/06/15', '2', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(161, 'Scott ', 'Doremus', '789532123346', '4', 'Worcester', '4126785186', 'male', 'yes', 'yes', 'no', 'no', 'no', 'no', '12/12/14', '06/06/15', '2', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(162, 'Scott ', 'Doremus', '789532123347', '4', 'Worcester', '4126785187', 'male', 'yes', 'yes', 'no', 'no', 'no', 'no', '12/12/14', '06/06/15', '2', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(163, 'Brent', 'French', '789532123348', '4', 'Worcester', '4126785188', 'male', 'yes', 'yes', 'no', 'no', 'no', 'no', '12/12/14', '06/06/15', '2', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(164, 'Brent', 'French', '789532123349', '4', 'Worcester', '4126785189', 'male', 'yes', 'yes', 'no', 'no', 'no', 'no', '12/12/14', '06/06/15', '2', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(165, 'Edward', 'Gonsalves', '789532123350', '5', 'Springfield', '4126785190', 'male', 'yes', 'yes', 'no', 'no', 'no', 'no', '12/12/14', '06/06/15', '2', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(166, 'Edward', 'Gonsalves', '789532123351', '5', 'Springfield', '4126785191', 'male', 'yes', 'yes', 'no', 'no', 'no', 'no', '12/12/14', '06/06/15', '2', '3', '2', '1', '01', '3', '2', '3', '11', '3', '2'),
(168, 'Richard ', 'Gram', '123123123', '2', 'Worcester', '4132212345', 'male', 'yes', 'no', 'yes', 'yes', 'no', 'no', '11/11/11', '12/12/12', '3', '2', '2', '3', '1002', '3', '3', '1', '1', '4', '1'),
(169, 'John', 'Hedly', '9876543', '4', 'Springfield', '4132212121', 'male', 'no', 'no', 'yes', 'yes', 'no', 'yes', '01/01/14', '05/05/15', '1', '1', '1', '3', '1003', '2', '4', '3', '3', '4', '9'),
(170, 'William', 'Krein', '123421223', '4', 'Springfield', '4132216678', 'male', 'no', 'yes', 'no', 'no', 'yes', 'yes', '12/12/12', '11/11/13', '1', '3', '1', '1', '1001', '2', '2', '1', '2', '3', '8'),
(171, 'Jed', 'Lindholm', '1234567890', '5', 'Springfield', '4132210988', 'male', 'no', 'no', 'yes', 'yes', 'no', 'no', '09/09/14', '09/09/15', '4', '1', '1', '1', '1002', '2', '1', '1', '1', '2', '5'),
(172, 'Robert', 'Lombardi', '1234543212', '2', 'Springfield', '4132324567', 'male', 'no', 'no', 'yes', 'no', 'yes', 'no', '08/08/14', '07/07/15', '6', '2', '1', '2', '1002', '2', '3', '2', '4', '7', '11'),
(173, 'Robert', 'Lombardi', '1234543213', '2', 'Springfield', '4132324568', 'male', 'no', 'no', 'yes', 'no', 'yes', 'no', '08/08/14', '07/07/15', '6', '2', '1', '2', '1002', '2', '3', '2', '4', '7', '11');

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
-- Indexes for table `veterans_details`
--
ALTER TABLE `veterans_details`
 ADD PRIMARY KEY (`Veteran_ID`), ADD UNIQUE KEY `Contact_No` (`Contact_No`), ADD UNIQUE KEY `SSN` (`SSN`);

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
MODIFY `Destination_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ethinicity`
--
ALTER TABLE `ethinicity`
MODIFY `Ethinicity_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `family_details`
--
ALTER TABLE `family_details`
MODIFY `Family_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `income_source`
--
ALTER TABLE `income_source`
MODIFY `Income_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ineligibility`
--
ALTER TABLE `ineligibility`
MODIFY `Ineligibility_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
MODIFY `Office_ID` int(10) NOT NULL AUTO_INCREMENT;
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
MODIFY `Staff_ID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1004;
--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
MODIFY `Staff_Type_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `veterans_details`
--
ALTER TABLE `veterans_details`
MODIFY `Veteran_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=174;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
