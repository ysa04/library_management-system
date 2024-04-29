-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 01:02 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `book_count` int(11) NOT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `status` enum('Available','Borrowed') DEFAULT 'Available',
  `image_name` varchar(255) NOT NULL,
  `image_data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `genre`, `book_count`, `publication_year`, `status`, `image_name`, `image_data`) VALUES
(11, 'Software Engineering\r\nPRINCIPLES AND PRACTICES', 'DEEPAK JAIN', 'SE Summary', 'IT', 1, 2008, 'Available', 'Software Engineering', '/frontend/img/a1.jpg');

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `genre`, `book_count`, `publication_year`, `status`, `image_name`, `image_data`) VALUES
(12, 'Pearson Guide To The B.Sc. ( Nursing ) Entrance Examination, Third Edition', 'Dr Saroj Parwez', 'Nursing Sum', 'Nursing', 0, 2015, 'Available', 'nursing', '/frontend/img/a1.jpg');

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `genre`, `book_count`, `publication_year`, `status`, `image_name`, `image_data`) VALUES
(13, 'Modern Software Engineering', 'David Farley', 'MSE sum', 'IT', 0, 2023, 'Borrowed', 'MSE', '/frontend/img/a1.jpg');

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `genre`, `book_count`, `publication_year`, `status`, `image_name`, `image_data`) VALUES
(14, "Lewis\'s Medical-Surgical Nursing: Assessment and Management of Clinical Problems", 'Harding Kwong Roberts Hagler Reinisch', 'Surgical Sum', 'Nursing', 0, 2019, 'Available', 'Surg nur', '/frontend/img/a1.jpg');

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `genre`, `book_count`, `publication_year`, `status`, `image_name`, `image_data`) VALUES
(15, 'Naruto Anime Profiles, Vol. 2: Episodes 38-80', 'Masashi Kishimoto', 'naruto sum', 'Fantasy', 1, 2007, 'Available', 'naruto', '/frontend/img/a1.jpg');

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `genre`, `book_count`, `publication_year`, `status`, `image_name`, `image_data`) VALUES
(16, 'Business Management B.Com. I Semester II', 'Archana Singhal & Shelly Goel', 'Bm sum', 'Business', 1, 2017, 'Borrowed', 'bm sum', '/frontend/img/a1.jpg');

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `genre`, `book_count`, `publication_year`, `status`, `image_name`, `image_data`) VALUES
(17, 'Adventure of the theater version ONE PIECE dead end', 'Eiichiro Oda', 'one piece sum', 'Comedy', 1, 2003, 'Available', 'one piece', '/frontend/img/a1.jpg');

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `genre`, `book_count`, `publication_year`, `status`, `image_name`, `image_data`) VALUES
(18, 'Skills for Business and Management', 'Martin Sedgley', 'SBm sum', 'Business', 1, 2020, 'Available', 'SBm sum', '/frontend/img/a1.jpg');

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `genre`, `book_count`, `publication_year`, `status`, `image_name`, `image_data`) VALUES
(19, 'Demon Slayer', 'Koyoharu Gotouge', 'Demon slayer summary', 'Fantasy', 1, 2016, 'Borrowed', 'Demon Slayer', '/frontend/img/a1.jpg');

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `genre`, `book_count`, `publication_year`, `status`, `image_name`, `image_data`) VALUES
(20, 'Small Business Management: Essential Ingredients for Success (Best Business Books)', 'Meir Liraz\r\n', 'SBM Summary', 'Business', 1, 2017, 'Available', 'SBM image', '/frontend/img/a1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
