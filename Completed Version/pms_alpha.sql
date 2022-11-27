-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 08:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms_alpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `rollno` varchar(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(257) NOT NULL,
  `gender` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `rollno`, `username`, `password`, `gender`) VALUES
(1, 'Admin', '101', 'admin', 'admin123.', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `proj_id` int(11) NOT NULL,
  `proj_name` varchar(35) NOT NULL,
  `proj_desc` text NOT NULL,
  `username` varchar(35) NOT NULL,
  `rollno` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`proj_id`, `proj_name`, `proj_desc`, `username`, `rollno`) VALUES
(29, 'Project Management System', 'To create web based application that will in project management. This project is created to help the student during there senior project management.', 'exc33ded', '20CAB006'),
(30, 'Smart Contract using Blockchain', 'Creating a web application and import smart contract with the help of blockchain.', 'bilal', '20CAB008'),
(31, 'Attendance Management System ', 'To manage Attendance ', 'Aryamann', '20CAB115'),
(33, 'CatChat', 'To create android based application for social media chatting.', 'iHamza135', '20CAB130');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `rollno` varchar(11) NOT NULL,
  `password` varchar(257) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `name`, `username`, `rollno`, `password`) VALUES
(13, 'Mohammed Sarim', 'exc33ded', '20CAB006', '2212017962'),
(14, 'Khushnood Bilal', 'bilal', '20CAB008', 'bilal123.'),
(15, 'Aryamann', 'Aryamann', '20CAB115', '123'),
(16, 'Syed Mohammed Hamza Hussain', 'iHamza135', '20CAB130', 'qwerty123.');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(35) NOT NULL,
  `task_num` int(5) NOT NULL,
  `date` varchar(20) NOT NULL,
  `task_desc` text NOT NULL,
  `state` int(4) DEFAULT NULL,
  `proj_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_num`, `date`, `task_desc`, `state`, `proj_name`) VALUES
(21, 'Creating SRS', 1, '2022-11-03', 'Creating the first draft of srs.', 1, 'Smart Contract using Blockchain'),
(22, 'Creating SRS', 1, '2022-11-04', 'Some functionality\r\ninterface\r\ndesign model', 4, 'Attendance Management System'),
(23, 'adding analysis model', 2, '2022-11-05', 'dfd, erd', 4, 'Attendance Management System'),
(25, 'Creating SRS', 1, '2023-01-01', 'something related to srs', 2, 'Project Management System'),
(26, 'srs relation', 2, '2023-01-02', 'sdew f', 2, 'Project Management System'),
(27, 'Login page', 1, '2022-11-20', 'Create login page with registration functionality.', 1, 'CatChat'),
(28, 'index page', 2, '2022-11-21', 'creating basic info page', 4, 'CatChat'),
(29, 'creating frontend', 2, '2022-11-30', 'html, css', 3, 'Smart Contract using Blockchain');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `rollno` (`rollno`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`proj_id`),
  ADD UNIQUE KEY `proj_name` (`proj_name`),
  ADD KEY `FK_STUD_PROJ_ROLL` (`rollno`),
  ADD KEY `FK_STUD_PROJ_USERNAME` (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`),
  ADD UNIQUE KEY `rollno` (`rollno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `FK_STUD_TASK_PROJ` (`proj_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `proj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_STUD_PROJ_ROLL` FOREIGN KEY (`rollno`) REFERENCES `student` (`rollno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_STUD_PROJ_USERNAME` FOREIGN KEY (`username`) REFERENCES `student` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `FK_STUD_TASK_PROJ` FOREIGN KEY (`proj_name`) REFERENCES `project` (`proj_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
