-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2017 at 03:19 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0c7540eb7e65b553ec1ba6b20de79608');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`id` int(11) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `title` varchar(10) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `guarantor_name` varchar(30) NOT NULL,
  `guarantor_no` varchar(20) NOT NULL,
  `joined` datetime NOT NULL,
  `employee_no` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `surname`, `lastname`, `password`, `title`, `dept`, `position`, `address`, `phoneno`, `guarantor_name`, `guarantor_no`, `joined`, `employee_no`) VALUES
(1, 'Billy', 'John', 'a625c254b169bb8d5be7ca122c5ae079', 'Sir', 'IT', 'Web Designer', '10, Memilla Way', '08141160412', 'Meee', '00000000', '2016-06-19 00:00:00', 34),
(3, 'Alfred', 'Kendra', 'bca3fc12e8bb3a7a85136fd496ceaefc', 'Miss', 'IT', 'Graphic Designer', '10, Sudani Way, Off Lane Avenue', '08141160412', 'Weezykon', '08141160412', '2016-06-22 00:00:00', 20),
(4, 'Alfred', 'Lanre', 'a57faafdc22cc7a50d45c14a7bae653f', 'Mr', 'Marketing', 'Social Marketer', '79, Lone Road.', '08141160412', 'Weezykon', '08141160412', '2016-06-22 00:00:00', 22),
(5, 'Tuna', 'Williams', 'ac1f8d73fc2989920c6ca3edeaa85776', 'Sir', 'Marketing', 'Marketing Supervisor', '23, Loreen Way', '08141160412', 'Jaguar Will', '0841160412', '2016-07-02 00:00:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
`id` int(11) NOT NULL,
  `worked_days` int(20) NOT NULL,
  `exception` int(10) DEFAULT NULL,
  `allowance` varchar(20) DEFAULT NULL,
  `overtime` varchar(20) DEFAULT NULL,
  `tax` varchar(20) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `paid_by` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `employee_no` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `worked_days`, `exception`, `allowance`, `overtime`, `tax`, `salary`, `paid_by`, `date`, `employee_no`) VALUES
(3, 25, 0, '2000', '1000', '4.0', '150000', 'admin', '2016-05-20', 34),
(4, 26, 0, '5000', '2000', '10.0', '200000', 'admin', '2016-06-22', 34),
(5, 20, 6, '3000', '', '7.0', '160000', 'admin', '2016-06-22', 20),
(6, 23, 0, '5000', '10000', '6.0', '110000', 'admin', '2016-07-02', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
