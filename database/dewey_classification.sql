-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 03:01 PM
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
-- Table structure for table `dewey_classification`
--

CREATE TABLE `dewey_classification` (
  `id` int(50) NOT NULL,
  `dewey_number` int(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `parent_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dewey_classification`
--

INSERT INTO `dewey_classification` (`id`, `dewey_number`, `description`, `parent_id`) VALUES
(1, 0, 'Generalities', 0),
(2, 100, 'Philosophy & psychology', 0),
(3, 200, 'Religion', 0),
(4, 300, 'Social sciences', 0),
(5, 400, 'Language', 0),
(6, 500, 'Natural sciences & mathematics', 0),
(7, 600, 'Technology', 0),
(8, 700, 'Arts & recreation', 0),
(9, 800, 'Literature', 0),
(10, 900, 'Geography & history', 0),
(26, 1000, 'sample', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dewey_classification`
--
ALTER TABLE `dewey_classification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dewey_classification`
--
ALTER TABLE `dewey_classification`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
