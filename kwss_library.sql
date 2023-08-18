-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 07:06 AM
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
  `column_no` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `Author`, `shelf`, `row_no`, `column_no`) VALUES
(5506, 'The Power of Your Subconscious Mind', 'http://localhost/assets/images/books/tpoysm.jpg', 'DR Jospeph Murphy', 2, 1, 5),
(5509, 'Atomic Habits', 'https://www.biblionepal.com/cdn/shop/files/9781847941831.jpg?v=1685521594', 'James Clear', 5, 1, 2),
(5511, 'Adventures of Tom Sawyer', 'https://mpd-biblio-covers.imgix.net/9781429959278.jpg?w=300', 'Mark Twain', 1, 3, 3),
(5512, 'Ben Hur', 'https://images.penguinrandomhouse.com/cover/9780451532091', 'Lewis Wallace', 2, 4, 5),
(5513, 'Time Machine', 'https://m.media-amazon.com/images/I/81HifkpAdNL._AC_UF1000,1000_QL80_.jpg', 'H.G. Wells', 3, 1, 2),
(5514, 'To Kill a mockingbird', 'http://localhost/assets/images/books/tkamb.webp', 'Harper Lee', 4, 3, 1);

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
('crquor', 'To Kill a mockingbird', '2023-08-08', '2023-08-31'),
('crquor', 'Atomic Habits', '2023-08-29', '2023-08-31');

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
  `book_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`username`, `book_name`) VALUES
('lorem ipsum', 'atomic habits'),
('crquor', 'raa'),
('aadipshres', 'talking to the moon');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(4) NOT NULL,
  `student_photo` varchar(210) NOT NULL,
  `email` varchar(210) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pass_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_photo`, `email`, `username`, `pass_code`) VALUES
(1234, 'https://avatars.githubusercontent.com/u/89701791?v=4', 'm@ghimiresijan.com.np', 'crquor', 'sijan'),
(5678, 'https://pereaclinic.com/wp-content/uploads/2019/12/270x270-male-avatar.png', 'lorem@ipsumc.om', 'lorem', 'lorem');

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
  ADD PRIMARY KEY (`username`,`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5515;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
