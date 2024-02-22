-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 05:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_timetable_generator`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

CREATE TABLE `assigned` (
  `dept_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `staff_short_name` varchar(20) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `total_in_week` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `d_code` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `sections` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `d_code`, `year`, `sections`) VALUES
(2, 'Information technology', 'IF', 3, 1),
(8, 'Computer Engineering', 'CM', 3, 2),
(27, 'Electrical ', 'EE', 3, 1),
(32, 'Mechanical Engineering ', 'ME', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_name` varchar(255) NOT NULL,
  `short_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_name`, `short_name`) VALUES
('Prof. Amey S. Pathe', 'ASP'),
('Dr. Durvesh A. Chaudhari', 'DAC');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(11) NOT NULL,
  `scode` varchar(20) NOT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `stype` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `scode`, `sname`, `stype`) VALUES
(8, 'FC0205', 'Programming in C', 'Lab'),
(10, 'FC0205', 'Programming in C', 'Theory');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned`
--
ALTER TABLE `assigned`
  ADD KEY `fk_dept` (`dept_id`),
  ADD KEY `fk_sub` (`sub_id`),
  ADD KEY `fk_staff` (`staff_short_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`short_name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `unique_subject_type` (`scode`,`stype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned`
--
ALTER TABLE `assigned`
  ADD CONSTRAINT `fk_dept` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_staff` FOREIGN KEY (`staff_short_name`) REFERENCES `staff` (`short_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sub` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
