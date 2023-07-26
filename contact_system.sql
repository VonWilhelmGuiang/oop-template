-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 03:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `middle_name` varchar(60) NOT NULL,
  `company` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `user_id`, `first_name`, `last_name`, `middle_name`, `company`, `phone`, `email`) VALUES
(1, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(6, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(9, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(10, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(11, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(12, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(13, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(14, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(15, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(16, 3, 'vonnnn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'test@email.com'),
(17, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(18, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(19, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(20, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(21, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(22, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(23, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(24, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(25, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(26, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(27, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(28, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(29, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(30, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(31, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(32, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(33, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(34, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(35, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(36, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(37, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(38, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(39, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(40, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(41, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(42, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(43, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(44, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(45, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(46, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(47, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(48, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(49, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(50, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(51, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(52, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(53, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(54, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(55, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(56, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(57, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(58, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(59, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(60, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(61, 3, 'contact2fn', 'contact2ln', 'contact2mn', 'contact2co', '2222222222', 'contact2@gmail.com'),
(62, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(63, 3, 'contact1fn', 'contact1ln', 'contact1mn', 'contact1co', '1111111111111', 'contact1@gmail.com'),
(64, 3, '123', '1231', '123', '123', '123', '123'),
(65, 3, 'f', 'l', 'm', 'mm', 'p', 'e'),
(66, 3, 'f', 'l', 'm', 'mm', 'p', 'e'),
(67, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(68, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(69, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(70, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(71, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(72, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(73, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(74, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(75, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(76, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(77, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(78, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(79, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(80, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(81, 3, 'f', 'l', 'm', 'c', 'p', 'e'),
(82, 3, 'asdf', 'ouiy', 'oi', 'uoi', 'uo', 'iu'),
(83, 3, '123', 'ku', 'hk', 'uh', 'uh', 'kuh'),
(84, 3, 'iuy', 'iu', 'y', 'iuy', 'iu', 'y'),
(85, 3, 'test', 'stest', 'test', 'test', 'test', 'test'),
(86, 3, 'asdf', 'loi', 'oiu', 'oi', 'oiu', 'oiu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `middle_name`) VALUES
(3, 'test@email.com', '$2y$10$C/EU9GG7JqH3guQVy197zOTuaD6bmt4LEI5ug8mHb1y.oO5d0oFNu', 'test', 'test', 'test'),
(6, 'test1@email.com', 'test', 'test', 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
