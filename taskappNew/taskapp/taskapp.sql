-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 04:13 PM
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
  `deleted` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `taskname`, `start_date`, `deadline`, `deleted`, `userid`) VALUES
(23, 'buy some chips', '2021-04-19', '2021-04-20', 0, 6),
(24, 'my assignments', '2021-04-20', '2021-04-23', 0, 6),
(25, 'take a stroll', '2021-04-21', '2021-04-22', 0, 6),
(26, 'i want to go play football', '2021-04-19', '2021-04-21', 0, 8),
(27, 'basketball with friends', '2021-04-20', '2021-04-23', 0, 8),
(28, 'casino games', '2021-04-20', '2021-04-13', 0, 2);

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
(8, 'Mayor Emmanuel', 'mayor123', 'mayowame@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
