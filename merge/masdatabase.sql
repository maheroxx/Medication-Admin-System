-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2023 at 12:49 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `nric` varchar(9) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `age` varchar(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `address` varchar(50) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `username` varchar(30) NOT NULL,
  `acctype` enum('DOCTOR') NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nric` (`nric`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `surname`, `nric`, `dob`, `age`, `email`, `phone`, `address`, `bloodgroup`, `gender`, `username`, `acctype`, `password`, `image`, `date_created`) VALUES
(16, 'Steph', 'Lee', 'S8905788D', '1989-10-19', '33', 'maylee@mail.com', '90367896', 'Blk 1 Teck Whye', 'O+', 'FEMALE', 'maylee', 'DOCTOR', '25d55ad283aa400af464c76d713c07ad', 'download.jpg', '2023-01-04'),
(15, 'John', 'Lee', 'S9856789U', '1998-11-17', '25', 'johnlee@mail.com', '89047893', 'Blk 555 Ang Mo Kio', 'A-', 'MALE', 'johnlee', 'DOCTOR', '25d55ad283aa400af464c76d713c07ad', '', '2023-01-04'),
(17, 'Dave', 'Tan', 'S7890478H', '1978-11-01', '40', 'davetan@mail.com', '86790478', 'Blk 67 Tampines', 'A-', 'MALE', 'davetan', 'DOCTOR', '25d55ad283aa400af464c76d713c07ad', 'photo.jpg', '2023-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `drug_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `dose` varchar(30) NOT NULL,
  `route` varchar(30) NOT NULL,
  `exp_date` varchar(8) NOT NULL,
  `side_effect` varchar(50) NOT NULL,
  PRIMARY KEY (`drug_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

DROP TABLE IF EXISTS `nurse`;
CREATE TABLE IF NOT EXISTS `nurse` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `nric` varchar(9) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `age` varchar(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `address` varchar(50) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `username` varchar(30) NOT NULL,
  `acctype` enum('NURSE') NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `name`, `surname`, `nric`, `dob`, `age`, `email`, `phone`, `address`, `bloodgroup`, `gender`, `username`, `acctype`, `password`, `image`) VALUES
(1, 'Kin', 'Chin', 'S8967400G', '16/5/1995', '27', 'kinchin@mail.com', '89465790', 'Blk 4 Bedok', 'A-', 'FEMALE', 'kin', 'NURSE', '87fa4eaaf3698e1b1e2caadabbc8ca60', 'download.jpg'),
(3, 'as', 'as', 'as', 'as', 'as', 'as', 'asas', 'as', 'O-', 'FEMALE', 'as', 'NURSE', 'f970e2767d0cfe75876ea857f92e319b', 'handsome-male-doctor-against-gray-wall-in-hospital-GIOF11522.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `emergency_contact` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `surname`, `dob`, `email`, `phone`, `address`, `bloodgroup`, `gender`, `emergency_contact`) VALUES
(1, 'Patient', 'patient', '2000-01-22', 'patient@email.com', '08168012', 'Blk 456 Tampines East', 'A-', 'MALE', '11068012'),
(2, 'Barack', 'Obama', '1997-09-05', 'obama@email.com', '61099019', 'Washington DC', 'B-', 'MALE', '99567812'),
(3, 'Joe', 'Biden', '1950-02-09', 'JBiden@email.com', '1198012', 'New York', 'O', 'MALE', '33368012'),
(4, 'Leonardo', 'Kho', '2005-06-01', 'lkho@gmail.com', '2306412', 'Bukit timah', 'A-', 'FEMALE', '99900012'),
(5, 'Dora', 'The explorer', '2001-09-11', 'boots@gmail.com', '9444012', 'Mexico', 'AB+', 'FEMALE', '88888012');

-- --------------------------------------------------------

--
-- Table structure for table `prescribe`
--

DROP TABLE IF EXISTS `prescribe`;
CREATE TABLE IF NOT EXISTS `prescribe` (
  `prescribeID` int(50) NOT NULL AUTO_INCREMENT,
  `doctorID` int(50) NOT NULL,
  `patientID` int(50) NOT NULL,
  `medname` varchar(50) NOT NULL,
  `dose` varchar(100) NOT NULL,
  `route` varchar(30) NOT NULL,
  `sideEffect` varchar(30) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  PRIMARY KEY (`prescribeID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescribe`
--

INSERT INTO `prescribe` (`prescribeID`, `doctorID`, `patientID`, `medname`, `dose`, `route`, `sideEffect`, `frequency`, `duration`) VALUES
(1, 5, 2, 'Ibuprofen', '50mg', 'Oral', 'Dizzy', 'twice daily', '7 days'),
(2, 5, 2, 'Paracetamol', 'tablet', 'Oral', 'Tiredness', 'Once daily', '3 days');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `nric` varchar(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `acctype` enum('ADMINISTRATOR') NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `phone`, `nric`, `email`, `username`, `acctype`, `password`) VALUES
(1, 'Hugo', 'Wong ', '94948801', 'S7465093F', 'admin@admin.com', 'admin', 'ADMINISTRATOR', 'admin'),
(24, 'Jayden', 'Chin', '90577951', 'S8790344D', 'jaydenchin@email.com', 'jaydenchin', 'ADMINISTRATOR', 'jaydenchin'),
(25, 'gh', 'gh', 'gh', 'gh', 'gh', 'gh', 'ADMINISTRATOR', 'gh');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
