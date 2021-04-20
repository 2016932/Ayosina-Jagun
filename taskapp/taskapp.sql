-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 08:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `taskname` longtext NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `taskname`, `start_date`, `deadline`, `deleted`) VALUES
(4, 'Play PS5', '2021-03-11', '2021-03-12', 1),
(5, 'Pack my loads', '2021-03-11', '2021-03-13', 1),
(6, 'Gabriel\\\'s Assignment', '2021-03-16', '2021-03-28', 1),
(7, 'Gabriel\\\'s Assignment', '2021-03-16', '2021-03-28', 1),
(8, 'Gabriel\\\'s Assignment', '2021-03-05', '2021-03-20', 1),
(9, 'Doing my assignment', '2021-03-11', '2021-03-13', 1),
(10, 'Writing codes', '2021-03-17', '2021-03-20', 1),
(11, 'Play PS5', '2021-03-13', '2021-03-28', 0),
(12, 'grinding pepper', '2021-03-17', '2021-03-26', 1),
(13, 'Gabriel\\\'s Assignment', '2021-03-13', '2021-03-14', 1),
(14, 'Gabriel\\\'s Assignment', '2021-03-11', '2021-03-12', 1),
(15, 'Gabriel\\\'s Assignment', '2021-03-07', '2021-03-21', 1),
(16, 'Gabriel\\\'s Assignment', '2021-03-06', '2021-03-21', 1),
(17, 'Mayor\\\'s Assignment', '2021-03-06', '2021-03-20', 1),
(18, 'Mayor\'s Assignment', '2021-03-14', '2021-03-21', 1),
(19, 'Gabriel\'s Assignment', '2021-03-13', '2021-03-14', 0),
(20, 'Ayo match', '2021-04-15', '2021-04-17', 1),
(21, 'Ayo party', '2021-04-14', '2021-04-17', 0),
(22, 'Food', '2021-04-09', '2021-04-15', 0),
(23, 'Party', '2021-04-02', '2021-04-16', 0),
(24, 'Indomie', '2021-04-09', '2021-04-17', 1),
(25, 'Indomie', '2021-04-09', '2021-04-17', 1),
(26, 'Indomie', '2021-04-09', '2021-04-17', 1),
(27, 'Indomie', '2021-04-09', '2021-04-17', 0),
(28, 'Rice', '2021-04-08', '2021-05-02', 0),
(29, 'Dodo', '2021-04-02', '2021-04-30', 0),
(30, 'Dodo', '2021-04-02', '2021-04-30', 1),
(31, 'Dodo', '2021-04-02', '2021-04-30', 1),
(32, 'Dodo', '2021-04-02', '2021-04-30', 1),
(33, 'Dodo', '2021-04-02', '2021-04-30', 1),
(34, 'tACO', '2021-04-28', '2021-04-30', 1),
(35, 'tACO', '2021-04-28', '2021-04-30', 1),
(36, 'tACO', '2021-04-28', '2021-04-30', 1),
(37, 'uuuu', '2021-03-31', '2021-04-30', 1),
(38, 'kk', '2021-04-23', '2021-05-02', 1),
(39, 'kk', '2021-04-23', '2021-05-02', 1),
(40, 'kk', '2021-04-23', '2021-05-02', 1),
(41, 'kk', '2021-04-23', '2021-05-02', 1),
(42, 'kk', '2021-04-23', '2021-05-02', 1),
(43, 'fvv', '2021-04-02', '2021-04-30', 1),
(44, 'fvv', '2021-04-02', '2021-04-30', 1),
(45, 'fvv', '2021-04-02', '2021-04-30', 1),
(46, 'fvv', '2021-04-02', '2021-04-30', 1),
(47, 'khfo', '2021-04-01', '2021-04-16', 1),
(48, 'jdbfjb', '2021-04-02', '2021-04-24', 1),
(49, 'jdbfjb', '2021-04-02', '2021-04-24', 1),
(50, 'rkewo', '2021-04-24', '2021-05-09', 1),
(51, 'rkewo', '2021-04-24', '2021-05-09', 1),
(52, 'rkewo', '2021-04-24', '2021-05-09', 1),
(53, 'rkewo', '2021-04-24', '2021-05-09', 1),
(54, 'jjk', '2021-04-01', '2021-04-30', 1),
(55, 'jjk', '2021-04-01', '2021-04-30', 1),
(56, 'kwk', '2021-04-04', '2021-04-25', 1),
(57, 'kwk', '2021-04-04', '2021-04-25', 1),
(58, 'kwk', '2021-04-04', '2021-04-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(1, 'Ayoshina Jagun', 'Ay', 'ayoshinajagun@gmail.com', 'ayo123'),
(2, 'Ayo', 'Ay', 'ayo@gmail.com', 'ayo'),
(3, 'Jajwj', 'kjjj', 'hhsb@fg', 'at'),
(4, 'iwiwi', 'wiwi', 'wjwu@sjs', 'ayo'),
(5, 'Ayo Peters', 'Pete', 'pete@yahoo.com', 'pete123'),
(6, 'jagun Ayo', 'ay', 'ayo@yahoo.com', 'ayo'),
(7, 'kfkffkfk', 'dkdk', 'dkdk@kdnd', 'dolnvk'),
(8, 'Ayo Jagun', 'Ayo', 'ayo@mail.com', 'ayo1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
