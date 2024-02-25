-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 06:06 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `generateTimeTable` (IN `college_start_time` TIME, IN `college_end_time` TIME)   BEGIN
    -- loop through all the assigned rows
    DECLARE done INT DEFAULT FALSE;
    DECLARE period_id INT;
    DECLARE dept_id INT;
    DECLARE year INT;
    DECLARE section VARCHAR(10);
    DECLARE sub_id INT;
    DECLARE staff_short_name VARCHAR(20);
    DECLARE duration INT;
    DECLARE total_in_week INT;
    DECLARE current_day VARCHAR(50);
    DECLARE cur_time TIME;

    DECLARE cur CURSOR FOR
        SELECT `period_id`, `dept_id`, `year`, `section`, `sub_id`, `staff_short_name`, `duration`, `total_in_week`
        FROM `assigned`;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    OPEN cur;

    read_loop: LOOP
        FETCH cur INTO period_id, dept_id, year, section, sub_id, staff_short_name, duration, total_in_week;

        IF done THEN
            LEAVE read_loop;
        END IF;

        -- print the values
        SELECT period_id, dept_id, year, section, sub_id, staff_short_name, duration, total_in_week;

    END LOOP;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `generate_timetable` (IN `college_start_time` TIME, IN `college_end_time` TIME)   BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE period_id INT;
    DECLARE dept_id INT;
    DECLARE year INT;
    DECLARE section VARCHAR(10);
    DECLARE sub_id INT;
    DECLARE staff_short_name VARCHAR(20);
    DECLARE duration INT;
    DECLARE total_in_week INT DEFAULT 1;
    DECLARE current_day VARCHAR(50);
    DECLARE cur_time TIME;
    
    DECLARE cur CURSOR FOR
        SELECT `period_id`, `dept_id`, `year`, `section`, `sub_id`, `staff_short_name`, `duration`, `total_in_week`
        FROM `assigned`;
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    
    OPEN cur;
    
    read_loop: LOOP
        FETCH cur INTO period_id, dept_id, year, section, sub_id, staff_short_name, duration, total_in_week;
        IF done THEN
            LEAVE read_loop;
        END IF;
        
        SET current_day = 'Monday'; 
        SET cur_time = college_start_time;

        SET total_in_week = total_in_week;

        WHILE total_in_week > 0 DO
            IF cur_time >= college_end_time THEN
                SET cur_time = college_start_time;
                SET current_day = CASE
                    WHEN current_day = 'Monday' THEN 'Tuesday'
                    WHEN current_day = 'Tuesday' THEN 'Wednesday'
                    WHEN current_day = 'Wednesday' THEN 'Thursday'
                    WHEN current_day = 'Thursday' THEN 'Friday'
                    WHEN current_day = 'Friday' THEN 'Saturday'
                    ELSE 'Monday'
                END;
            END IF;
            
            INSERT INTO `time_table` (`day`, `period_id`, `start_time`, `end_time`)
            VALUES (current_day, period_id, cur_time, ADDTIME(cur_time, SEC_TO_TIME(duration * 60)));
            
            SET cur_time = ADDTIME(cur_time, SEC_TO_TIME(duration * 60));
            SET total_in_week = total_in_week - 1;
        END WHILE;
    END LOOP;
    
    CLOSE cur;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAssignedRowsByDeptYearSection` (IN `p_dept_id` INT, IN `p_year` INT, IN `p_section` VARCHAR(10))   BEGIN
    SELECT *
    FROM assigned
    WHERE dept_id = p_dept_id AND year = p_year AND section = p_section;
END$$

DELIMITER ;

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
(32, 8, 3, '2', 17, 'HSB', 2, 2);

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
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `day`, `period_id`, `start_time`, `end_time`) VALUES
(1, 'Tuesday', 26, '09:00:00', '10:00:00'),
(2, 'Monday', 19, '09:00:00', '10:00:00'),
(3, 'Wednesday', 27, '09:00:00', '11:00:00'),
(4, 'Tuesday', 19, '09:00:00', '10:00:00'),
(5, 'Thursday', 27, '09:00:00', '11:00:00'),
(6, 'Wednesday', 19, '09:00:00', '10:00:00'),
(7, 'Friday', 28, '09:00:00', '11:00:00'),
(8, 'Thursday', 20, '09:00:00', '10:00:00'),
(9, 'Saturday', 28, '09:00:00', '11:00:00'),
(10, 'Friday', 20, '09:00:00', '10:00:00'),
(11, 'Monday', 28, '09:00:00', '11:00:00'),
(12, 'Saturday', 20, '09:00:00', '10:00:00'),
(13, 'Tuesday', 29, '09:00:00', '10:00:00'),
(14, 'Monday', 21, '09:00:00', '11:00:00'),
(15, 'Wednesday', 29, '11:00:00', '12:00:00'),
(16, 'Tuesday', 21, '09:00:00', '11:00:00'),
(17, 'Thursday', 29, '11:00:00', '12:00:00'),
(18, 'Wednesday', 21, '09:00:00', '11:00:00'),
(19, 'Friday', 29, '09:00:00', '10:00:00'),
(20, 'Thursday', 21, '09:00:00', '11:00:00'),
(21, 'Saturday', 30, '09:00:00', '10:00:00'),
(22, 'Friday', 21, '09:00:00', '11:00:00'),
(23, 'Monday', 30, '09:00:00', '10:00:00'),
(24, 'Saturday', 21, '09:00:00', '11:00:00'),
(25, 'Tuesday', 30, '10:00:00', '11:00:00'),
(26, 'Monday', 22, '09:00:00', '11:00:00'),
(27, 'Wednesday', 30, '12:00:00', '13:00:00'),
(28, 'Tuesday', 22, '09:00:00', '11:00:00'),
(29, 'Thursday', 31, '09:00:00', '10:00:00'),
(30, 'Wednesday', 22, '09:00:00', '11:00:00'),
(31, 'Friday', 31, '09:00:00', '10:00:00'),
(32, 'Thursday', 22, '09:00:00', '11:00:00'),
(33, 'Saturday', 31, '09:00:00', '10:00:00'),
(34, 'Friday', 22, '09:00:00', '11:00:00'),
(35, 'Monday', 31, '09:00:00', '10:00:00'),
(36, 'Saturday', 23, '09:00:00', '11:00:00'),
(37, 'Tuesday', 32, '09:00:00', '11:00:00'),
(38, 'Monday', 23, '11:00:00', '13:00:00'),
(39, 'Wednesday', 32, '09:00:00', '11:00:00'),
(40, 'Tuesday', 23, '11:00:00', '13:00:00'),
(41, 'Wednesday', 23, '11:00:00', '13:00:00'),
(42, 'Thursday', 23, '11:00:00', '13:00:00'),
(43, 'Friday', 24, '09:00:00', '10:00:00'),
(44, 'Saturday', 24, '09:00:00', '10:00:00'),
(45, 'Monday', 24, '09:00:00', '10:00:00'),
(46, 'Tuesday', 25, '09:00:00', '11:00:00'),
(47, 'Wednesday', 25, '09:00:00', '11:00:00'),
(48, 'Thursday', 25, '09:00:00', '11:00:00'),
(49, 'Friday', 25, '09:00:00', '11:00:00'),
(50, 'Saturday', 26, '10:00:00', '11:00:00'),
(51, 'Monday', 26, '10:00:00', '11:00:00'),
(52, 'Tuesday', 26, '10:00:00', '11:00:00'),
(53, 'Wednesday', 27, '13:00:00', '15:00:00'),
(54, 'Thursday', 27, '12:00:00', '14:00:00'),
(55, 'Friday', 28, '11:00:00', '13:00:00'),
(56, 'Saturday', 28, '11:00:00', '13:00:00'),
(57, 'Monday', 28, '11:00:00', '13:00:00'),
(58, 'Tuesday', 29, '11:00:00', '12:00:00'),
(59, 'Wednesday', 29, '15:00:00', '16:00:00'),
(60, 'Thursday', 29, '14:00:00', '15:00:00'),
(61, 'Friday', 29, '10:00:00', '11:00:00'),
(62, 'Saturday', 30, '10:00:00', '11:00:00'),
(63, 'Monday', 30, '10:00:00', '11:00:00'),
(64, 'Tuesday', 30, '12:00:00', '13:00:00'),
(65, 'Wednesday', 30, '16:00:00', '17:00:00'),
(66, 'Thursday', 31, '10:00:00', '11:00:00'),
(67, 'Friday', 31, '10:00:00', '11:00:00'),
(68, 'Saturday', 31, '10:00:00', '11:00:00'),
(69, 'Monday', 31, '10:00:00', '11:00:00'),
(70, 'Tuesday', 32, '11:00:00', '13:00:00'),
(71, 'Wednesday', 32, '11:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Structure for view `timetable_view`
--
DROP TABLE IF EXISTS `timetable_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `timetable_view`  AS SELECT `tt`.`day` AS `Day`, `tt`.`start_time` AS `Start_Time`, `tt`.`end_time` AS `End_Time`, `d`.`id` AS `Department_ID`, `d`.`dept_name` AS `Department_Name`, `a`.`year` AS `Year`, `a`.`section` AS `Section`, `s`.`sub_id` AS `Subject_ID`, `s`.`scode` AS `Subject_Code`, `s`.`sname` AS `Subject_Name`, `st`.`short_name` AS `Staff_Short_Name`, `st`.`staff_name` AS `Staff_Name` FROM ((((`time_table` `tt` join `assigned` `a` on(`tt`.`period_id` = `a`.`period_id`)) join `subjects` `s` on(`a`.`sub_id` = `s`.`sub_id`)) join `staff` `st` on(`a`.`staff_short_name` = `st`.`short_name`)) join `departments` `d` on(`a`.`dept_id` = `d`.`id`)) ORDER BY field(`tt`.`day`,'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') ASC, `tt`.`start_time` ASC ;

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
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
