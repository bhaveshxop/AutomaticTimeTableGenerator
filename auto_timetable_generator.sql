-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 08:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `period_id` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `staff_short_name` varchar(20) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `total_in_week` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigned`
--

INSERT INTO `assigned` (`period_id`, `dept_id`, `year`, `section`, `sub_id`, `staff_short_name`, `duration`, `total_in_week`) VALUES
(19, 2, 1, '1', 8, 'ASP', 1, 3),
(20, 2, 1, '1', 8, 'ASP', 1, 3),
(21, 2, 2, '1', 8, 'DAC', 2, 6),
(22, 8, 2, '2', 10, 'DAC', 2, 5),
(23, 8, 2, '2', 10, 'DAC', 2, 5),
(24, 8, 1, '1', 8, 'ASP', 1, 3),
(25, 32, 2, '2', 10, 'DAC', 2, 4),
(26, 8, 1, '1', 8, 'ASP', 1, 3),
(27, 8, 3, '1', 12, 'ASP', 2, 2),
(28, 27, 2, '1', 15, 'ABD', 2, 3),
(29, 8, 3, '1', 11, 'ASP', 1, 4),
(30, 8, 3, '1', 16, 'DAC', 1, 4),
(31, 8, 3, '2', 18, 'SNP', 1, 4),
(32, 8, 3, '2', 17, 'HSB', 2, 2),
(35, 27, 1, '1', 10, 'ABD', 1, 4),
(38, 27, 1, '1', 18, 'BNP', 1, 6),
(39, 27, 1, '1', 17, 'SNP', 2, 7),
(40, 27, 1, '1', 14, 'DAC', 1, 4),
(41, 27, 1, '1', 16, 'ASP', 1, 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `class_list`
-- (See below for the actual view)
--
CREATE TABLE `class_list` (
`Department_Name` varchar(255)
,`Department_ID` int(11)
,`section_no` varchar(10)
,`Year` int(11)
,`Section` varchar(10)
);

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
(32, 'Mechanical Engineering ', 'ME', 2, 2);

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
('Prof. Amit Barde', 'ABD'),
('Prof. Amey S. Pathe', 'ASP'),
('Dr. Bhavesh Patil', 'BNP'),
('Dr. Durvesh A. Chaudhari', 'DAC'),
('Prof. Heramb Bhoodhar', 'HSB'),
('Prof. Sonu Patil', 'SNP');

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
(10, 'FC0205', 'Programming in C', 'Theory'),
(11, 'FC5572', 'Java', 'Theory'),
(12, 'FC7676', 'Android', 'Lab'),
(13, 'FC5656', 'Php', 'Theory'),
(14, 'FC5657', 'Php', 'Lab'),
(15, 'FC8989', 'Signal and circuit', 'Lab'),
(16, 'FC6565', 'Microprocessor', 'Theory'),
(17, 'FC6565', 'Microprocessor', 'Lab'),
(18, 'FC9898', 'Data scinece', 'Theory');

-- --------------------------------------------------------

--
-- Stand-in structure for view `timetable_view`
-- (See below for the actual view)
--
CREATE TABLE `timetable_view` (
`Day` varchar(50)
,`Start_Time` time
,`End_Time` time
,`Department_ID` int(11)
,`Department_Name` varchar(255)
,`Year` int(11)
,`Section` varchar(10)
,`Subject_ID` int(11)
,`Subject_Code` varchar(20)
,`Subject_Name` varchar(255)
,`Staff_Short_Name` varchar(10)
,`Staff_Name` varchar(255)
,`recess` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `period_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `recess` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `day`, `period_id`, `start_time`, `end_time`, `recess`) VALUES
(1, 'Monday', 19, '09:00:00', '10:00:00', 0),
(2, 'Tuesday', 19, '09:00:00', '10:00:00', 0),
(3, 'Wednesday', 19, '09:00:00', '10:00:00', 0),
(4, 'Thursday', 20, '09:00:00', '10:00:00', 0),
(5, 'Friday', 20, '09:00:00', '10:00:00', 0),
(6, 'Saturday', 20, '09:00:00', '10:00:00', 0),
(7, 'Monday', 21, '09:00:00', '11:00:00', 0),
(8, 'Tuesday', 21, '09:00:00', '11:00:00', 0),
(9, 'Wednesday', 21, '09:00:00', '11:00:00', 0),
(10, 'Thursday', 21, '09:00:00', '11:00:00', 0),
(11, 'Friday', 21, '09:00:00', '11:00:00', 0),
(12, 'Saturday', 21, '09:00:00', '11:00:00', 0),
(13, 'Monday', 22, '09:00:00', '11:00:00', 0),
(14, 'Tuesday', 22, '09:00:00', '11:00:00', 0),
(15, 'Wednesday', 22, '09:00:00', '11:00:00', 0),
(16, 'Thursday', 22, '09:00:00', '11:00:00', 0),
(17, 'Friday', 22, '09:00:00', '11:00:00', 0),
(18, 'Saturday', 23, '09:00:00', '11:00:00', 0),
(19, 'Monday', 23, '11:00:00', '13:00:00', 0),
(20, 'Tuesday', 23, '11:00:00', '13:00:00', 0),
(21, 'Wednesday', 23, '11:00:00', '13:00:00', 0),
(22, 'Thursday', 23, '11:00:00', '13:00:00', 0),
(23, 'Friday', 24, '09:00:00', '10:00:00', 0),
(24, 'Saturday', 24, '09:00:00', '10:00:00', 0),
(25, 'Monday', 24, '09:00:00', '10:00:00', 0),
(26, 'Tuesday', 25, '09:00:00', '11:00:00', 0),
(27, 'Wednesday', 25, '09:00:00', '11:00:00', 0),
(28, 'Thursday', 25, '09:00:00', '11:00:00', 0),
(29, 'Friday', 25, '09:00:00', '11:00:00', 0),
(30, 'Saturday', 26, '10:00:00', '11:00:00', 0),
(31, 'Monday', 26, '10:00:00', '11:00:00', 0),
(32, 'Tuesday', 26, '09:00:00', '10:00:00', 0),
(33, 'Wednesday', 27, '09:00:00', '11:00:00', 0),
(34, 'Thursday', 27, '09:00:00', '11:00:00', 0),
(35, 'Friday', 28, '09:00:00', '11:00:00', 0),
(36, 'Saturday', 28, '09:00:00', '11:00:00', 0),
(37, 'Monday', 28, '09:00:00', '11:00:00', 0),
(38, 'Tuesday', 29, '09:00:00', '10:00:00', 0),
(39, 'Wednesday', 29, '11:00:00', '12:00:00', 0),
(40, 'Thursday', 29, '11:00:00', '12:00:00', 0),
(41, 'Friday', 29, '09:00:00', '10:00:00', 0),
(42, 'Saturday', 30, '09:00:00', '10:00:00', 0),
(43, 'Monday', 30, '09:00:00', '10:00:00', 0),
(44, 'Tuesday', 30, '10:00:00', '11:00:00', 0),
(45, 'Wednesday', 30, '12:00:00', '13:00:00', 0),
(46, 'Thursday', 31, '09:00:00', '10:00:00', 0),
(47, 'Friday', 31, '09:00:00', '10:00:00', 0),
(48, 'Saturday', 31, '09:00:00', '10:00:00', 0),
(49, 'Monday', 31, '09:00:00', '10:00:00', 0),
(50, 'Tuesday', 32, '09:00:00', '11:00:00', 0),
(51, 'Wednesday', 32, '09:00:00', '11:00:00', 0),
(52, 'Thursday', 35, '09:00:00', '10:00:00', 0),
(53, 'Friday', 35, '09:00:00', '10:00:00', 0),
(54, 'Saturday', 35, '09:00:00', '10:00:00', 0),
(55, 'Monday', 35, '09:00:00', '10:00:00', 0),
(56, 'Tuesday', 38, '09:00:00', '10:00:00', 0),
(57, 'Wednesday', 38, '09:00:00', '10:00:00', 0),
(58, 'Thursday', 38, '10:00:00', '11:00:00', 0),
(59, 'Friday', 38, '10:00:00', '11:00:00', 0),
(60, 'Saturday', 38, '10:00:00', '11:00:00', 0),
(61, 'Monday', 38, '10:00:00', '11:00:00', 0),
(62, 'Tuesday', 39, '10:00:00', '12:00:00', 0),
(63, 'Wednesday', 39, '10:00:00', '12:00:00', 0),
(64, 'Thursday', 39, '11:00:00', '13:00:00', 0),
(65, 'Friday', 39, '11:00:00', '13:00:00', 0),
(66, 'Saturday', 39, '11:00:00', '13:00:00', 0),
(67, 'Monday', 39, '11:00:00', '13:00:00', 0),
(68, 'Tuesday', 39, '12:00:00', '14:00:00', 0),
(69, 'Wednesday', 40, '12:00:00', '13:00:00', 0),
(70, 'Thursday', 40, '13:00:00', '14:00:00', 1),
(71, 'Thursday', 40, '14:00:00', '15:00:00', 0),
(72, 'Friday', 40, '13:00:00', '14:00:00', 1),
(73, 'Friday', 40, '14:00:00', '15:00:00', 0),
(74, 'Saturday', 40, '13:00:00', '14:00:00', 1),
(75, 'Saturday', 40, '14:00:00', '15:00:00', 0),
(76, 'Monday', 41, '13:00:00', '14:00:00', 1),
(77, 'Monday', 41, '14:00:00', '15:00:00', 0),
(78, 'Tuesday', 41, '14:00:00', '15:00:00', 1),
(79, 'Tuesday', 41, '15:00:00', '16:00:00', 0),
(80, 'Wednesday', 41, '13:00:00', '14:00:00', 1),
(81, 'Wednesday', 41, '14:00:00', '15:00:00', 0),
(82, 'Thursday', 41, '15:00:00', '16:00:00', 0),
(83, 'Friday', 41, '15:00:00', '16:00:00', 0),
(84, 'Saturday', 41, '15:00:00', '16:00:00', 0);

-- --------------------------------------------------------

--
-- Structure for view `class_list`
--
DROP TABLE IF EXISTS `class_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `class_list`  AS SELECT DISTINCT `timetable_view`.`Department_Name` AS `Department_Name`, `timetable_view`.`Department_ID` AS `Department_ID`, `timetable_view`.`Section` AS `section_no`, `timetable_view`.`Year` AS `Year`, CASE WHEN `timetable_view`.`Section` = 1 THEN 'A' WHEN `timetable_view`.`Section` = 2 THEN 'B' WHEN `timetable_view`.`Section` = 3 THEN 'C' WHEN `timetable_view`.`Section` = 4 THEN 'D' WHEN `timetable_view`.`Section` = 5 THEN 'E' WHEN `timetable_view`.`Section` = 6 THEN 'F' WHEN `timetable_view`.`Section` = 7 THEN 'G' WHEN `timetable_view`.`Section` = 8 THEN 'H' WHEN `timetable_view`.`Section` = 9 THEN 'I' WHEN `timetable_view`.`Section` = 10 THEN 'J' WHEN `timetable_view`.`Section` = 11 THEN 'K' ELSE `timetable_view`.`Section` END AS `Section` FROM `timetable_view` ;

-- --------------------------------------------------------

--
-- Structure for view `timetable_view`
--
DROP TABLE IF EXISTS `timetable_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `timetable_view`  AS SELECT `tt`.`day` AS `Day`, `tt`.`start_time` AS `Start_Time`, `tt`.`end_time` AS `End_Time`, `d`.`id` AS `Department_ID`, `d`.`dept_name` AS `Department_Name`, `a`.`year` AS `Year`, `a`.`section` AS `Section`, `s`.`sub_id` AS `Subject_ID`, `s`.`scode` AS `Subject_Code`, `s`.`sname` AS `Subject_Name`, `st`.`short_name` AS `Staff_Short_Name`, `st`.`staff_name` AS `Staff_Name`, `tt`.`recess` AS `recess` FROM ((((`time_table` `tt` join `assigned` `a` on(`tt`.`period_id` = `a`.`period_id`)) join `subjects` `s` on(`a`.`sub_id` = `s`.`sub_id`)) join `staff` `st` on(`a`.`staff_short_name` = `st`.`short_name`)) join `departments` `d` on(`a`.`dept_id` = `d`.`id`)) ORDER BY field(`tt`.`day`,'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') ASC, `tt`.`start_time` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned`
--
ALTER TABLE `assigned`
  ADD PRIMARY KEY (`period_id`),
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
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_period_tt` (`period_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned`
--
ALTER TABLE `assigned`
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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

--
-- Constraints for table `time_table`
--
ALTER TABLE `time_table`
  ADD CONSTRAINT `fk_period_tt` FOREIGN KEY (`period_id`) REFERENCES `assigned` (`period_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
