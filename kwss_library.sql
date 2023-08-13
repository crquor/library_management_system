-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 09:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kwss_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `shelf` int(10) NOT NULL,
  `row_no` int(2) NOT NULL,
  `column_no` int(2) NOT NULL,
  `avail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `Author`, `shelf`, `row_no`, `column_no`, `avail`) VALUES
(28, 'The Power of Your Subconcious Mind', 'http://localhost/assets/images/books/tpoysm.jpg', 'DR. Joseph Murphy', 5, 3, 1, 'Yes'),
(5505, 'To Kill a Mockingbird', 'http://localhost/assets/images/books/tkamb.webp', 'Harper Lee', 1, 2, 1, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `books_issued`
--

CREATE TABLE `books_issued` (
  `username` varchar(210) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `issued_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_issued`
--

INSERT INTO `books_issued` (`username`, `book_name`, `issued_date`, `return_date`) VALUES
('crquor', 'To Kill a mockingbird', '2023-08-08', '2023-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` varchar(10) NOT NULL,
  `email` varchar(210) NOT NULL,
  `ausername` varchar(210) NOT NULL,
  `apass_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `email`, `ausername`, `apass_code`) VALUES
('55', 'libra@libra.com', 'libra', 'hehe');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `username` varchar(255) NOT NULL,
  `stud_id` varchar(10) NOT NULL,
  `email` varchar(210) NOT NULL,
  `book_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`username`, `stud_id`, `email`, `book_name`) VALUES
('lorem ipsum', 'lorem#001', 'lorem@ipsum.com', 'atomic habits'),
('crquor', 'crq', 'crq@cr.com', 'raa');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `email` varchar(210) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pass_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `email`, `username`, `pass_code`) VALUES
(3435, 'aadip@gmail.com', 'aadipshres', 'aadip123'),
(124554, 'm@ghimiresijan.com.np', 'crquor', 'sijan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_issued`
--
ALTER TABLE `books_issued`
  ADD PRIMARY KEY (`issued_date`,`return_date`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`ausername`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`book_name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
