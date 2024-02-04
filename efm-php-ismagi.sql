-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 10:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efm-php-ismagi`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `reciever_id` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `reciever_id`, `message`) VALUES
(53, '1361691443', '824231856', 'hello'),
(54, '824231856', '1361691443', 'hi'),
(55, '1621862441', '1361691443', 'hi'),
(56, '1361691443', '824231856', 'how are you ?'),
(57, '1361691443', '1621862441', 'Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu\'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.'),
(58, '1361691443', '1621862441', 'I\'m good, and you ?'),
(59, '1361691443', '1621862441', 'can you give me something ?'),
(60, '1621862441', '1361691443', 'yes'),
(61, '1621862441', '1361691443', 'what is it ?'),
(62, '1621862441', '1361691443', 'Where are you ?'),
(63, '1361691443', '824231856', 'hello'),
(64, '1361691443', '824231856', 'hello'),
(65, '1361691443', '1621862441', 'hi'),
(66, '1361691443', '1621862441', 'Okay.. I will tell you'),
(67, '1361691443', '1621862441', 'hahahaha'),
(68, '1361691443', '1621862441', 'fen'),
(69, '1361691443', '1621862441', 'hahahahahaha'),
(70, '1361691443', '1621862441', 'good'),
(71, '1361691443', '1621862441', 'hellllo'),
(72, '1361691443', '1621862441', 'i understand..'),
(73, '1361691443', '824231856', 'fen'),
(74, '1361691443', '824231856', 'wash'),
(75, '1361691443', '824231856', 'haha'),
(76, '1361691443', '1621862441', 'coool my friend'),
(77, '1361691443', '1621862441', 'test'),
(78, '1361691443', '1621862441', 'test'),
(79, '1361691443', '824231856', 'haha'),
(80, '824231856', '1361691443', 'fen asat'),
(81, '1361691443', '824231856', 'hhhhhhhhhhhh'),
(82, '1361691443', '824231856', 'ggggg'),
(83, '1361691443', '590188529', 'hhh'),
(84, '590188529', '1621862441', 'hello'),
(85, '1361691443', '824231856', 'hahah');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `username`, `email`, `password`, `image`, `status`) VALUES
(26, 1361691443, 'Ayoub Chater', 'ayoub@gmail.com', '$2y$10$PU1uZBox1ak0Z79cnuun7.Gq5G9Wsc/FIb5FF0uBtezauozYJuw8K', '1706102167-user1.jpg', 'Online'),
(27, 824231856, 'Hamza Karrassi', 'hamza@gmail.com', '$2y$10$XB4Q72a8D9aCq4RR/aAo9e/w/nzIW9OiT7PE5/9I0yyU1D1qEl3s.', '1706102233-user2.jpeg', 'Online'),
(28, 1621862441, 'Anass Barik', 'anass@gmail.com', '$2y$10$rSJ4xARHzX4hvjmo7JGFJ.P5SLXytBppbksUNzhpeC9brH/2rhMIC', '1706105407-user5.jpeg', 'Offline'),
(29, 590188529, 'yassmine', 'yass@gmail.com', '$2y$10$kVhVCOavM6JMRgMm.iyieuHicfPab9D575b50iHuyoWOkfeyiWeFi', '1706118642-user4.jpg', 'Offline'),
(30, 864304110, 'Amine', 'amine@gmail.com', '$2y$10$BjE22nCoJFpgRR32fwgOtuhUn0GRCfuPGJCPkrfiE4JGuMfOZfnYe', '1706119345-BB45A5BB-EE82-411B-BFE9-45B050C08DD1.jpeg', 'Offline'),
(31, 1441977487, 'aymane', 'aymane@gmail.com', '$2y$10$rSIWrbP7nt5emEU34CHNQuOuGCmqDQVuThieYwTWDgBExggkjym6y', '1706307424-desktop-wallpaper-n-e-o-t-o-k-y-o-neon-aesthetic-tokyo-night-neon-noir-tokyo-purple.jpg', 'Offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
