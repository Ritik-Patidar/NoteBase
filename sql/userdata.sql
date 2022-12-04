-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 09:30 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `teacher1`
--

CREATE TABLE `teacher1` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher1`
--

INSERT INTO `teacher1` (`id`, `title`, `document`) VALUES
(1, 'Aptitude', 'db/teacher1/aptitude.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `teacher1_assignment`
--

CREATE TABLE `teacher1_assignment` (
  `assign_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `due_date` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher1_assignment`
--

INSERT INTO `teacher1_assignment` (`assign_id`, `title`, `description`, `due_date`, `file`) VALUES
(6, 'Assignment 1', 'description of assignment 1', '2021-04-22', 'db/teacher1/teacher1_assignment/CS-501-CBGS020221051124.pdf'),
(11, 'Assignment 2', 'afasvbab', '2021-04-30', 'db/teacher1/teacher1_assignment/InfosysCertificationExaminationGuidelines.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `teacher1_assignment6_submission`
--

CREATE TABLE `teacher1_assignment6_submission` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `enrollment_number` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher1_assignment6_submission`
--

INSERT INTO `teacher1_assignment6_submission` (`id`, `name`, `enrollment_number`, `class`, `subject`, `subject_code`, `email`, `mobile_number`, `file`) VALUES
(1, 'student 1', '1', '1', 'Computer Science', 'CS-001', 'student1@gmail.com', '9876543210', 'db/teacher1/teacher1_assignment/teacher1_assignment6_submission/DBMS.pdf'),
(2, 'student 2', '2', '2', 'Computer Science', 'CS-002', 'student2@gmail.com', '9876543210', 'db/teacher1/teacher1_assignment/teacher1_assignment6_submission/Sorting.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `teacher2`
--

CREATE TABLE `teacher2` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher2`
--

INSERT INTO `teacher2` (`id`, `title`, `document`) VALUES
(1, 'DBMS', 'db/teacher2/DBMS.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `teacher2_assignment`
--

CREATE TABLE `teacher2_assignment` (
  `assign_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `due_date` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher2_assignment`
--

INSERT INTO `teacher2_assignment` (`assign_id`, `title`, `description`, `due_date`, `file`) VALUES
(1, 'Assignment 1', 'this is description of assignment 1', '2021-05-03', 'db/teacher2/teacher2_assignment/INTRODUTION TO COMPUTER NETWORK.pptx');

-- --------------------------------------------------------

--
-- Table structure for table `teacher3`
--

CREATE TABLE `teacher3` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher3_assignment`
--

CREATE TABLE `teacher3_assignment` (
  `assign_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `due_date` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher4`
--

CREATE TABLE `teacher4` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher4_assignment`
--

CREATE TABLE `teacher4_assignment` (
  `assign_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `due_date` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacherdata`
--

CREATE TABLE `teacherdata` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `encrypt_password` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherdata`
--

INSERT INTO `teacherdata` (`id`, `user`, `email`, `subject`, `subject_code`, `encrypt_password`, `password`, `token`) VALUES
(1, 'Teacher 1', 'teacher1@gmail.com', 'civil engineering', 'CE-601', '$2y$10$yVtsnR7i8Z7fp7Zkk9ZGFOnE.2N5YjhC.VFS.p12vbif45M.Qu5lG', '12345', 'd3460c79c973ed546777d5c7ddf624'),
(2, 'teacher 2', 'teacher2@gmail.com', 'Computer Science', 'CS-001', '$2y$10$Fv5ktXQd351KHz.Sby7i5eHFBE9sSeWk6/nK3hrFwjkD.IhVo1SL6', 'teacher2', '1e9239dfc5d60a164452f639a63845'),
(3, 'Teacher 3', 'teacher3@gmail.com', 'Civil Engineering', 'CE-602', '$2y$10$7eM.t.IdyZK3G/Eq.Ws.z.cBvI/VP1f5xdTqEQav4haqXBvBEeAKi', 'teacher3', '3df70f35528595c46128a6be90bd74'),
(4, 'Ritik Patidar', 'ritikpatidar029@gmail.com', 'Computer Science', 'CS-000', '$2y$10$wz8jvn4wFROpfAV3Yd9QZu8yigzZog78pZog7LamhO0liP4J.LZ3S', 'ritik', 'd240c6092e7794da419ae535fe7e37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher1`
--
ALTER TABLE `teacher1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher1_assignment`
--
ALTER TABLE `teacher1_assignment`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `teacher1_assignment6_submission`
--
ALTER TABLE `teacher1_assignment6_submission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher2`
--
ALTER TABLE `teacher2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher2_assignment`
--
ALTER TABLE `teacher2_assignment`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `teacher3`
--
ALTER TABLE `teacher3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher3_assignment`
--
ALTER TABLE `teacher3_assignment`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `teacher4`
--
ALTER TABLE `teacher4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher4_assignment`
--
ALTER TABLE `teacher4_assignment`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `teacherdata`
--
ALTER TABLE `teacherdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher1`
--
ALTER TABLE `teacher1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher1_assignment`
--
ALTER TABLE `teacher1_assignment`
  MODIFY `assign_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher1_assignment6_submission`
--
ALTER TABLE `teacher1_assignment6_submission`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher2`
--
ALTER TABLE `teacher2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher2_assignment`
--
ALTER TABLE `teacher2_assignment`
  MODIFY `assign_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher3`
--
ALTER TABLE `teacher3`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher3_assignment`
--
ALTER TABLE `teacher3_assignment`
  MODIFY `assign_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher4`
--
ALTER TABLE `teacher4`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher4_assignment`
--
ALTER TABLE `teacher4_assignment`
  MODIFY `assign_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacherdata`
--
ALTER TABLE `teacherdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
