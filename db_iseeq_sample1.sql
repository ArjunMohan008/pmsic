-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2019 at 06:13 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iseeq_sample1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE `tbl_province` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`pro_id`, `pro_name`) VALUES
(1, 'Central province'),
(2, 'Eastern province'),
(3, 'Northern province'),
(4, 'Southern province'),
(5, 'Western province'),
(6, 'North western province'),
(7, 'North central province'),
(8, 'Uva province'),
(9, 'Sabaragamuwa province');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `std_id` varchar(100) NOT NULL,
  `std_name` varchar(200) NOT NULL,
  `std_address` longtext NOT NULL,
  `std_province` int(11) NOT NULL,
  `std_gender` tinyint(4) NOT NULL,
  `std_tel` int(10) NOT NULL,
  `std_tel_opt` int(10) DEFAULT NULL,
  `std_email` varchar(200) NOT NULL,
  `std_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`std_id`, `std_name`, `std_address`, `std_province`, `std_gender`, `std_tel`, `std_tel_opt`, `std_email`, `std_status`) VALUES
('S0001', 'aa', 'aaaaa', 1, 0, 78954, 444, 'asasdsad', 0),
('S0002', 'shaini', 'kandy', 1, 2, 776777878, 0, 'sha@gmai.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `std_province` (`std_province`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`std_province`) REFERENCES `tbl_province` (`pro_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
