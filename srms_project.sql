-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2022 at 11:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `subject`, `status`) VALUES
(20, 'CS3031', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE `questionbank` (
  `id` int(11) NOT NULL,
  `sub_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `option01` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option02` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option03` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option04` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`id`, `sub_id`, `status`, `question`, `option01`, `option02`, `option03`, `option04`, `answer`, `author`) VALUES
(14, '45', 'approved', 'Which version of PHP introduced Try/catch Exception?', 'PHP 4', 'PHP 4', 'PHP 4', 'PHP 5 and later', 'PHP 5 and later', 'Admin '),
(15, 'C0001', 'approved', 'Q', 'A', 'B', 'C', 'D', 'B', 'Admin '),
(16, 'C0001', 'approved', 'q2', '1', '2', '3', '4', '4', 'Admin '),
(17, 'CS3031', 'approved', 'PHP stands for', 'Hypertext Preprocessor', 'Pretext Hypertext Preprocessor', 'Personal Home Processor', 'None of the above', 'Hypertext Preprocessor', 'Admin '),
(18, 'CS3031', 'approved', 'Who is known as the father of PHP?', 'Drek Kolkevi', 'List Barely', 'Rasmus Lerdrof', 'None of the above', 'Rasmus Lerdrof', 'Admin '),
(19, 'CS3031', 'approved', 'Variable name in PHP starts with', '! (Exclamation)', '$ (Dollar)', '& (Ampersand)', '# (Hash)', '$ (Dollar)', 'Admin '),
(20, 'CS3031', 'rejected', 'Which of the following is the default file extension of PHP?', '.php', '.hphp', '.xml', '.html', '.php', 'Admin '),
(21, 'CS3031', 'approved', 'Which of the following is not a variable scope in PHP?', 'Extern', 'Local', 'Static', 'Global', 'Extern', 'Admin '),
(22, 'CS3031', 'approved', 'Which of the following is used to display the output in PHP?', 'echo', 'write', 'print', 'Both (a) and (c)', 'Both (a) and (c)', 'Admin '),
(23, 'CS3031', 'approved', 'Which of the following is the use of strlen() function in PHP?', 'The strlen() function returns the type of string', 'The strlen() function returns the length of string', 'The strlen() function returns the value of string', 'The strlen() function returns both value and type of string', 'The strlen() function returns the length of string', 'Admin '),
(24, 'CS3031', 'approved', 'Which of the following starts with __ (double underscore) in PHP?', 'Inbuilt constants', 'User-defined constants', 'Magic constants', 'Default constants', 'Magic constants', 'Admin '),
(25, 'CS3031', 'approved', 'Which of the following is the use of strpos() function in PHP?', 'The strpos() function is used to search for the spaces in a string', 'The strpos() function is used to search for a number in a string', 'The strpos() function is used to search for a character/text in a string', 'The strpos() function is used to search for a capitalize character in a string', 'The strpos() function is used to search for a character/text in a string', 'Admin '),
(26, 'CS3031', 'approved', 'What does PEAR stands for?', 'PHP extension and application repository', 'PHP enhancement and application reduce', 'PHP event and application repository', 'None of the above', 'PHP extension and application repository', 'Admin '),
(27, 'CS3031', 'approved', 'Which of the following is the correct way to create a function in PHP?', 'Create myFunction()', 'New_function myFunction()', 'function myFunction()', 'None of the above', 'function myFunction()', 'Admin '),
(28, 'CS3031', 'pending', 'Q', 'A', 'B', 'C', 'D', 'A', 'Administrator ');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marks` float NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `username`, `sub_id`, `marks`, `status`, `name`, `date`) VALUES
(23, 'student', 'CS3031', 50, 'pass', '', '2021-12-19 20:11:53'),
(24, 'ashish', 'CS3031', 50, 'pass', '', '2021-12-20 13:41:08'),
(25, 'student', 'CS3031', 70, 'pass', '', '2021-12-29 09:49:41'),
(26, 'student', 'CS3031', 50, 'pass', '', '2021-12-29 10:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `sub_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `sub_id`, `subject`) VALUES
(25, 'CS3022', 'Java'),
(1, 'CS3031', 'PHP'),
(2, 'CS3032', 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactNo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `contactNo`, `password`, `date`) VALUES
(1, 'Administrator', '', 'admin@qms.edu', 'admin', '9876543210', 'admin123', '2021-12-19 14:24:38'),
(2, 'Anubhav', 'Gond', 'anubhavgond01@gmail.com', 'anubhav01', '9898656532', 'anubhav01', '2021-12-19 14:29:53'),
(3, 'Chandradip Kr', 'Poddar', 'chandu@gmail.com', 'chandu01', '8787656532', 'chandu01', '2021-12-19 14:30:50'),
(4, 'Sumit ', 'Kumar', 'sumit@gmail.com', 'sumit01', '6532653287', 'sumit01', '2021-12-19 14:32:51'),
(5, 'Student', 'Name', 'student@gmail.com', 'student', '1234567890', 'student01', '2021-12-19 14:35:37'),
(27, 'asish', 'kr', 'asish@gmail.com', 'ashish', '7894561230', '123456789', '2021-12-20 08:09:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionbank`
--
ALTER TABLE `questionbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questionbank`
--
ALTER TABLE `questionbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
