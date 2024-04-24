-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 09:24 PM
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
-- Database: `users_category`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(30) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `usn_number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `added_at` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `first_name`, `last_name`, `email`, `age`, `contact_number`, `usn_number`, `password`, `added_at`) VALUES
(1, 'argene', 'santiago', 'santiago@gmail.com', 35, '09452349078', '56994560912', 'itworks2024', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(30) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(30) NOT NULL,
  `usn_number` varchar(30) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `number_visit` int(50) NOT NULL,
  `no_books_barrowed` int(50) NOT NULL,
  `no_books_returned` int(50) NOT NULL,
  `penalty` int(50) NOT NULL,
  `paid_penalty` int(50) NOT NULL,
  `added_at` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `first_name`, `last_name`, `email`, `age`, `usn_number`, `contact_number`, `number_visit`, `no_books_barrowed`, `no_books_returned`, `penalty`, `paid_penalty`, `added_at`, `password`) VALUES
(1, 'isabel', 'gatongay', 'gatongaymariaisabel@gmail.com', 22, '21006709210', '09452349078', 0, 0, 0, 0, 0, 'current_timestamp()', 'itworks2024'),
(4, 'sample', 'Dela Cruz', 'jane@yahoo.com', 23, '21006906709', '', 0, 0, 0, 0, 0, '2024-04-25 03:06:36', 'itworks2024'),
(5, 'sample', 'Dela Cruz', 'jane@yahoo.com', 23, '098765', '', 0, 0, 0, 0, 0, '2024-04-25 03:22:54', '12345asdfg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `id` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(30) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `usn_number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `added_at` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`id`, `first_name`, `last_name`, `email`, `age`, `contact_number`, `usn_number`, `password`, `added_at`) VALUES
(1, 'argene', 'santiago', 'santiago@gmail.com', 35, '09452349078', '21006709210', 'itworks2024', 'current_timestamp()');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
