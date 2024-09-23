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
-- Table structure for table `sub_dewey_classification`
--

CREATE TABLE `sub_dewey_classification` (
  `id` int(11) NOT NULL,
  `generalities` varchar(100) NOT NULL,
  `philosophy & psychology` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `social sciences` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `natural sciences & mathematics` varchar(100) NOT NULL,
  `technology` varchar(100) NOT NULL,
  `arts & recreation` varchar(100) NOT NULL,
  `literature` varchar(100) NOT NULL,
  `geography & history` varchar(100) NOT NULL,
  `sample` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_dewey_classification`
--

INSERT INTO `sub_dewey_classification` (`id`, `generalities`, `philosophy & psychology`, `religion`, `social sciences`, `language`, `natural sciences & mathematics`, `technology`, `arts & recreation`, `literature`, `geography & history`, `sample`) VALUES
(1, 'Bibliographies', 'Metaphysics', 'Doctrines', 'Statistics', 'Linguistics', 'Mathematics', 'Medicine & Health', 'Civic & Landscape Art', 'American Literature in English', 'Geography & Travel', NULL),
(2, 'Library & Information Sciences', 'Epistemology', 'The Bible', 'Political Science', 'English & Old English', 'Astronomy & Astrophysics', 'Engineering & Applied Operations', 'Architecture', 'English & Old English Literature', 'Biography & Genealogy', NULL),
(3, 'Encyclopedias & General Reference Works', 'Parapsychology & Occultism', 'Christianity', 'Economics', 'Germanic Languages', 'Physics', 'Agriculture', 'Sculpture & Carvings', 'Germanic Literatures', 'Ancient History', NULL),
(4, 'Unassigned', 'Philosophical Schools of Thought', 'Christian Moral & Devotional Theology', 'Law', 'Romance Languages', 'Chemistry', 'Chemical Engineering & Industrial Chemistry', 'Drawing & Decorative Arts', 'Romance Literatures', 'General European History', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_dewey_classification`
--
ALTER TABLE `sub_dewey_classification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_dewey_classification`
--
ALTER TABLE `sub_dewey_classification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
