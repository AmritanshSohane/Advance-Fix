-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 10:01 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vn-room-chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `ban_list`
--

CREATE TABLE `ban_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ban_reason` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `banned_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE `chat_room` (
  `room_id` int(11) NOT NULL,
  `room_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `room_description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `owner` int(11) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_room`
--

INSERT INTO `chat_room` (`room_id`, `room_name`, `room_description`, `owner`, `created_time`) VALUES
(1, '121', 'Phone', 2, '2023-06-24 08:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sent_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `room_id`, `message`, `sent_time`) VALUES
(1, 2, 1, 'hi', '2023-06-24 08:35:27'),
(2, 2, 1, 'how are you', '2023-06-24 08:35:37'),
(3, 3, 1, 'ji', '2023-06-24 08:39:15'),
(4, 3, 1, 'iji', '2023-06-24 08:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `request_join`
--

CREATE TABLE `request_join` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_member`
--

CREATE TABLE `room_member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `join_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_member`
--

INSERT INTO `room_member` (`id`, `user_id`, `room_id`, `join_date`) VALUES
(3, 3, 1, '2023-06-24 09:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `profilePicture` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `session` text NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `joinned_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `profilePicture`, `username`, `password`, `session`, `admin`, `verified`, `joinned_time`) VALUES
(1, 'Vy', 'Nghia ', 'https://nghia.org/project/chat/assets/img/default.jpg', 'vynghia', '1151985611', '36abd83f011d92b06c801c99f1884c6c', 1, 0, '2019-07-05 20:52:10'),
(2, 'ij', 'jij ', 'https://nghia.org/project/chat/assets/img/default.jpg', 'jjj', '111111', 'b3543751103263dcab3bddfba613428a', 0, 0, '2023-06-24 08:30:58'),
(3, 'mmm', 'mmm ', 'https://nghia.org/project/chat/assets/img/default.jpg', 'm', '222222', '64e34782682146fbdcc58e6b9d2bd282', 0, 0, '2023-06-24 08:34:44'),
(4, 'as', 'as ', 'https://nghia.org/project/chat/assets/img/default.jpg', 'asas', '222222', '8ea24956abf6b3c565d36e7b2e589697', 0, 0, '2023-06-28 14:26:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ban_list`
--
ALTER TABLE `ban_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_join`
--
ALTER TABLE `request_join`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_member`
--
ALTER TABLE `room_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ban_list`
--
ALTER TABLE `ban_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request_join`
--
ALTER TABLE `request_join`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `room_member`
--
ALTER TABLE `room_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
