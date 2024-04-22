-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 07:34 AM
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
-- Database: `student_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `id` int(30) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(30) NOT NULL,
  `usn_number` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp(),
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`id`, `first_name`, `last_name`, `email`, `age`, `usn_number`, `course`, `added_at`, `password`) VALUES
(1, 'isabel', 'gatongay', 'gatongaymariaisabel@gmail.com', 30, '21006709210', 'BSIT', '2024-03-23 22:36:14', 'ididit_2023'),
(3, 'John Clints ', 'Delos Santos', 'johnclints@yahoo.com', 22, '098765432', 'BSIT', '2024-04-22 13:33:12', 'studentpass123'),
(4, 'Karrel', 'Aragase', 'karrelaragase@yahoo.com', 22, '567894876', 'BSIT', '2024-04-22 13:33:12', 'karrelpass123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
