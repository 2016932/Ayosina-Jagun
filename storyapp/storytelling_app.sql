-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 04:57 PM
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
-- Database: `storytelling_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'Admin', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(20) NOT NULL,
  `stories_id` int(20) NOT NULL,
  `comments` text NOT NULL,
  `viewers` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments_id`, `stories_id`, `comments`, `viewers`, `created_at`) VALUES
(17, 1, 'Hello birdies', 'Ay Jags', '2021-03-22 20:41:32'),
(18, 1, 'Should not be angry', 'Samson', '2021-03-22 20:42:03'),
(19, 1, 'Hello people', 'Ay Jags', '2021-03-22 20:48:05'),
(20, 6, 'Heyo football', 'Sam', '2021-03-22 20:49:09'),
(21, 6, 'thank you\r\n', 'ayo', '2021-03-23 16:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `stories_id` int(20) NOT NULL,
  `users_id` int(20) NOT NULL,
  `title` varchar(25) NOT NULL,
  `image` text NOT NULL,
  `image_text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `approved` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`stories_id`, `users_id`, `title`, `image`, `image_text`, `created_at`, `approved`) VALUES
(1, 8, 'Camera', 'DSLR.jpg', 'This is a story about Cameras', '2021-03-22 09:13:10', 1),
(6, 8, 'Football', 'football.jpg', 'Hello football, thank you', '2021-03-22 09:48:54', 1),
(8, 8, 'Ways to Help the Poor', 'poor.jpg', '1. Donate\r\n2. Fundraising\r\n3. Arrange Events\r\n4. Volunteer', '2021-03-22 10:16:30', 1),
(11, 11, 'Ay', 'ay 1.png', 'Ay shaa', '2021-03-22 23:49:40', 1),
(15, 12, 'Poems', '142939000_167131508206532_2105726438758409378_n.jpg', 'Yello SISi', '2021-03-23 10:01:05', 1),
(16, 12, 'Joy', 'STICKER 01.jpg', 'Hello Joy', '2021-03-23 10:07:24', 1),
(18, 13, 'Merry Christmas', 'Merry Christmas.jpg', 'Merry Christmas to you all', '2021-03-23 16:01:02', 1),
(19, 8, 'poems', '142939000_167131508206532_2105726438758409378_n.jpg', 'it is a good poem', '2021-03-23 16:40:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(8, 'Ay', '$2y$10$/53gN8.5A667/G9Ueav30uf2Vuak9tn2SLP0/wCw1d01w6BJUoNci'),
(11, 'Sam', '$2y$10$TcZfpKgQLyOL39Z.NjgRguL06RwMk2rQ2kt.4/b3UsjzonM4xSvwu'),
(12, 'zyge', '$2y$10$R5oZ3kDwiweaanIeUV0kseIWbtVT3Xv6CX83CDz30FT0j0TO0L.5y'),
(13, 'Ayo', '$2y$10$S/q0gvkpWoJl5LVX3FboXenTR1EOQYxEvu2F7Er0/3bqrGb8TRTaS');

-- --------------------------------------------------------

--
-- Table structure for table `viewers`
--

CREATE TABLE `viewers` (
  `id` int(50) NOT NULL,
  `view_location` varchar(20) NOT NULL,
  `view_category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`stories_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `viewers`
--
ALTER TABLE `viewers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `stories_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `viewers`
--
ALTER TABLE `viewers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
