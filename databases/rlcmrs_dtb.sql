-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 02:38 AM
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
-- Database: `rlcmrs_dtb`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_registration_tbl`
--

CREATE TABLE `faculty_registration_tbl` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_registration_tbl`
--

INSERT INTO `faculty_registration_tbl` (`id`, `first_name`, `last_name`, `email`, `course`, `username`, `password`) VALUES
(0, 'Joshua Alen', 'Lopez', 'lopezjoshuaalen@gmail.com', 'DICT 3-1', 'Joshua', '021418');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_registration_tbl`
--

CREATE TABLE `maintenance_registration_tbl` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `task` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance_registration_tbl`
--

INSERT INTO `maintenance_registration_tbl` (`id`, `first_name`, `last_name`, `email`, `task`, `username`, `password`) VALUES
(0, 'Sofia Bianca', 'Lopez', 'sofia@gmail.com', 'Cleaner', 'Sofia', '021418');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration_tbl`
--

CREATE TABLE `student_registration_tbl` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_registration_tbl`
--

INSERT INTO `student_registration_tbl` (`id`, `first_name`, `last_name`, `email`, `course`, `student_number`, `password`) VALUES
(0, 'Joshua Alen', 'Lopez', 'lopezjoshuaalen@gmail.com', 'DICT 3-1', '2021-00161-BN-0', '021419'),
(0, 'JESSALYN', 'MACARIOLA', 'jess@gmail.com', 'DICT 3-1', '2021-00162-BN-0', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `student_report_tbl`
--

CREATE TABLE `student_report_tbl` (
  `id` int(11) NOT NULL,
  `building` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `problem` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `comment_type` varchar(20) NOT NULL,
  `comment_text` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Date End` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_report_tbl`
--

INSERT INTO `student_report_tbl` (`id`, `building`, `room`, `state`, `problem`, `course`, `professor`, `comment_type`, `comment_text`, `timestamp`, `Date End`) VALUES
(1, 'New Building', '203', 'fixing', 'Electricity', 'DICT 3 - 1', 'Ms. Indaleen', 'none', '', '2024-02-07 15:53:05', '2024-02-09'),
(2, 'Old Building', 'Comlab 2', 'cleaning', 'Ceiling', 'BSIT 4 - 1', 'Mr. Maravilla', 'none', '', '2024-02-07 15:53:18', '2024-02-09'),
(3, 'New Building', '201', 'cleaning', 'Chemical', 'BSIT 3 - 1', 'Mr. Maravilla', 'none', '', '2024-02-07 15:53:27', '2024-02-09'),
(4, 'Old Building', 'Comlab 1', 'fixing', 'Floor', 'BSIT 3 - 1', 'Mr. Miguel', 'none', '', '2024-02-07 15:53:55', '2024-02-09'),
(5, 'New Building', '203', 'fixing', 'Defective', 'BSIT 4 - 1', 'Mr. Miguel', 'none', '', '2024-02-07 15:54:03', '2024-02-09'),
(6, 'New Building', 'AVR2', 'replacing', 'Damaged', 'BSIT 3 - 1', 'Mr. Miguel', 'none', '', '2024-02-07 19:16:44', '2024-02-09'),
(7, 'Old Building', '404', 'cleaning', 'Defective', 'BSIT 4 - 1', 'Mr. Maravilla', 'none', '', '2024-02-09 15:03:38', '2024-02-09'),
(8, 'New Building', '405', 'cleaning', 'Dirty', 'BSIT 1 - 1', 'Ms. Indaleen', 'comment', 'It so Dirty', '2024-02-09 15:17:01', '2024-02-09'),
(9, 'Old Building', 'AVR1', 'fixing', 'Wall', 'DICT 3 - 1', 'Mr. Galgo', 'comment', 'Sir Galgo Haduken The Wall', '2024-02-09 15:17:44', '2024-02-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_report_tbl`
--
ALTER TABLE `student_report_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_report_tbl`
--
ALTER TABLE `student_report_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
