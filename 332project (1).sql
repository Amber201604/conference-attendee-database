-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 02:47 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `332project`
--

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `subcommittee_name` varchar(100) NOT NULL,
  `Chair_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`subcommittee_name`, `Chair_name`) VALUES
('Professional Committee', 'Bacon Francis'),
('Registration Committee', 'Baker Jack'),
('Sponsorship Committee', 'Bangs Lester');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_name` varchar(50) NOT NULL,
  `sponsor_level` varchar(10) DEFAULT NULL,
  `total_email` char(1) DEFAULT NULL,
  `sent_email` char(1) DEFAULT NULL,
  `fee` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `housing_list`
--

CREATE TABLE `housing_list` (
  `room_number` char(4) NOT NULL,
  `beds` char(1) DEFAULT NULL,
  `num_students` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housing_list`
--

INSERT INTO `housing_list` (`room_number`, `beds`, `num_students`) VALUES
('', '2', '1'),
('123', '2', '1'),
('1234', '1', '1'),
('1302', '1', '3'),
('7896', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `job_ads`
--

CREATE TABLE `job_ads` (
  `job_ID` char(5) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_location` varchar(50) NOT NULL,
  `pay_rate` varchar(10) DEFAULT NULL,
  `company` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `professionals`
--

CREATE TABLE `professionals` (
  `ID` char(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fee` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professionals`
--

INSERT INTO `professionals` (`ID`, `name`, `fee`) VALUES
('100', 'James Kevin', '100'),
('194', 'Zack Mark', '100'),
('202', 'Jackson Hayley', '100'),
('233', 'Godwin Mike', '100'),
('273', 'Gay John', '100'),
('382', 'Gates Bill', '100'),
('443', 'Banks Robert', '100'),
('666', 'Gril Eric', '100'),
('777', 'James Donald', '100'),
('888', 'Fawkeys Guy', '100');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_name` varchar(100) NOT NULL,
  `the_date` varchar(10) NOT NULL,
  `start_time` varchar(5) NOT NULL,
  `end_time` varchar(5) NOT NULL,
  `location` varchar(50) NOT NULL,
  `speaker` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_name`, `the_date`, `start_time`, `end_time`, `location`, `speaker`) VALUES
('Intro of Advanced Search Algorithm', 'Saturday', '12', '15', 'Stirling AUD A', '443'),
('Intro of C++', 'Sunday', '16', '18', 'Stirling AUD A', '100'),
('Intro of Compiler', 'Sunday', '13', '16', 'Stirling AUD A', '233'),
('Intro of Neural Network', 'Saturday', '9', '12', 'Stirling AUD A', '202'),
('Intro of OS', 'Sunday', '11', '13', 'Stauffer 110', '666'),
('Intro of Python', 'Sunday', '10', '12', 'Stirling AUD B', '888');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `ID` char(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` char(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fee` varchar(4) DEFAULT NULL,
  `room_number` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `name`, `fee`, `room_number`) VALUES
('1895', 'tony sharper', '', '123'),
('2996', 'Victory Sharp', '50', '1234'),
('4948', 'Hank Aaron', '50', '1302'),
('5367', 'Jane Ace', '50', '7896'),
('5759', 'Jane Ace', '50', '1302'),
('5855', 'Abby', '', ''),
('7793', 'John Halberd', '50', '1302');

-- --------------------------------------------------------

--
-- Table structure for table `subcommittee`
--

CREATE TABLE `subcommittee` (
  `ID` char(4) NOT NULL,
  `Subcommittee_name` varchar(100) NOT NULL,
  `Person_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcommittee`
--

INSERT INTO `subcommittee` (`ID`, `Subcommittee_name`, `Person_name`) VALUES
('1234', 'Registration Committee', 'Jack Franklin'),
('2140', 'Sponsorship Committee', 'Bangs Lester'),
('2345', 'Professional Committee', 'Bacon Francis'),
('2349', 'Registration Committee', 'Baker Jack'),
('4321', 'Professional Committee', 'Miller Walter'),
('5200', 'Professional Committee', 'Geoffrey Hinton'),
('5555', 'Sponsorship Committee', 'Miller Henry'),
('6666', 'Sponsorship Committee', 'Moore Tim'),
('7878', 'Registration Committee', 'Sowell Tomas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`subcommittee_name`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_name`);

--
-- Indexes for table `housing_list`
--
ALTER TABLE `housing_list`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `job_ads`
--
ALTER TABLE `job_ads`
  ADD PRIMARY KEY (`job_ID`),
  ADD KEY `company` (`company`);

--
-- Indexes for table `professionals`
--
ALTER TABLE `professionals`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_name`),
  ADD KEY `speaker` (`speaker`),
  ADD KEY `speaker_2` (`speaker`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `company` (`company`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `room_number` (`room_number`);

--
-- Indexes for table `subcommittee`
--
ALTER TABLE `subcommittee`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Subcommittee_name` (`Subcommittee_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_ads`
--
ALTER TABLE `job_ads`
  ADD CONSTRAINT `job_ads_ibfk_1` FOREIGN KEY (`company`) REFERENCES `companies` (`company_name`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`speaker`) REFERENCES `professionals` (`ID`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD CONSTRAINT `sponsors_ibfk_1` FOREIGN KEY (`company`) REFERENCES `companies` (`company_name`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`room_number`) REFERENCES `housing_list` (`room_number`) ON DELETE SET NULL;

--
-- Constraints for table `subcommittee`
--
ALTER TABLE `subcommittee`
  ADD CONSTRAINT `subcommittee_ibfk_1` FOREIGN KEY (`Subcommittee_name`) REFERENCES `committee` (`subcommittee_name`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
