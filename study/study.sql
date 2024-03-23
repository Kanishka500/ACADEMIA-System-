-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 03:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `study`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `eno` varchar(25) NOT NULL,
  `email` varchar(128) NOT NULL,
  `year` varchar(11) NOT NULL,
  `semester` varchar(28) NOT NULL,
  `subject` varchar(28) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `review` varchar(28) NOT NULL,
  `filerealname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `eno`, `email`, `year`, `semester`, `subject`, `filename`, `review`, `filerealname`) VALUES
(9, 'UWU/ICT/20/100', '100@gmail.com', 'fst', 'sem1', 'ICT132-2fst_sem1', '65f43903db7382.85377165.pdf', 'Approved', 'Group_05.pdf'),
(10, 'UWU/ICT/20/100', '100@gmail.com', 'fst', 'sem1', 'ICT132-2fst_sem1', '65f439d1a44f89.09876265.pdf', 'Approved', 'presentation QA.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `eno` varchar(28) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `eno`, `name`, `email`, `password`, `role`) VALUES
(5, 'UWU/ADMIN/100', 'Admin admin', 'admin@gmail.com', '$2y$10$etoM8DODSw69vEVNnYExZeb58SXeToC87PV/RmACVXJpwmRP5IkYW', 'Admin'),
(6, 'UWU/ICT/20/100', 'TEST test', '100@gmail.com', '$2y$10$6qd/nzGmOlM7G0E10iCZ2uRDrpk8LLDvts/Q419b1OZAz8v6YXxKG', 'student'),
(7, 'UWU/ICT/20/101', 'TEST test', '101@gmail.com', '$2y$10$/mF3zbRG64zdURvZZroux.dW4WX4guxv9nDMbGOC/PghfRA.Onn9.', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
