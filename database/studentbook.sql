-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 03:02 PM
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
-- Table structure for table `studentbook`
--

CREATE TABLE `studentbook` (
  `id` int(50) NOT NULL,
  `book_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `published_date` varchar(50) NOT NULL,
  `date_borrowed` date NOT NULL,
  `date_returned` date NOT NULL,
  `number_of_books` int(30) NOT NULL,
  `penalty` varchar(50) NOT NULL,
  `paid_penalty` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `borrow_type` varchar(30) NOT NULL,
  `approved` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentbook`
--

INSERT INTO `studentbook` (`id`, `book_id`, `student_id`, `book_title`, `book_author`, `published_date`, `date_borrowed`, `date_returned`, `number_of_books`, `penalty`, `paid_penalty`, `status`, `borrow_type`, `approved`) VALUES
(1, 19, 3, 'Demon Slayer', 'koyoho ruyu', '2016', '2024-05-27', '2024-05-30', 1, '500', '0', 'pending', '', '1'),
(26, 15, 1, 'Naruto Anime Profiles, Vol. 2: Episodes 38-80', '', '', '2024-09-23', '2024-09-24', 0, '', '', 'ready', 'inside', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentbook`
--
ALTER TABLE `studentbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentbook`
--
ALTER TABLE `studentbook`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentbook`
--
ALTER TABLE `studentbook`
  ADD CONSTRAINT `studentbook_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `studentbook_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
