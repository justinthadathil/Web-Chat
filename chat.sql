-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2018 at 04:54 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 1, 2, 'hieee', '2018-09-30 03:10:10', 0),
(2, 1, 2, 'hw r you ?', '2018-09-30 03:10:19', 0),
(3, 2, 1, 'hiee dear', '2018-09-30 03:10:39', 0),
(4, 2, 1, 'i am fine....', '2018-09-30 03:11:18', 0),
(5, 2, 1, 'what r u doing\n?', '2018-09-30 03:24:24', 0),
(6, 2, 1, 'by the way', '2018-09-30 03:36:54', 0),
(7, 1, 2, 'sorry for late reply.......i am working😉', '2018-09-30 04:04:41', 0),
(8, 2, 1, '😁', '2018-09-30 04:05:00', 0),
(9, 1, 2, '😅😅😅', '2018-09-30 04:18:20', 0),
(10, 2, 1, '😁', '2018-09-30 04:24:45', 0),
(11, 2, 1, '😄', '2018-09-30 04:24:54', 0),
(12, 0, 2, 'hieee', '2018-09-30 05:28:18', 1),
(13, 0, 1, 'hiee', '2018-09-30 05:28:27', 1),
(14, 0, 1, 'group\n', '2018-09-30 05:28:34', 1),
(15, 0, 1, 'chat', '2018-09-30 05:28:43', 1),
(16, 0, 3, 'how are you all', '2018-09-30 05:30:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'Justin_Thadathil', 'MTIzNDU=', 'justinrocks809@gmail.com'),
(2, 'Shemmy_Soman', 'anVzdGlu', 'Shemmy_Soman@gmail.com'),
(3, 'Melvin_joesph', 'bWVsdmlu', 'Melvin_joesph@gmail.com'),
(4, 'Princy_David', 'cHJpbmN5', 'Princy_David@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 1, '2018-07-29 16:29:41', 'no'),
(2, 1, '2018-08-11 03:57:23', 'no'),
(3, 1, '2018-09-30 03:41:37', 'no'),
(4, 2, '2018-09-30 03:11:46', 'no'),
(5, 1, '2018-09-30 04:24:58', 'no'),
(6, 2, '2018-09-30 04:25:09', 'no'),
(7, 1, '2018-09-30 04:32:02', 'no'),
(8, 1, '2018-09-30 05:35:11', 'no'),
(9, 2, '2018-09-30 05:35:16', 'no'),
(10, 3, '2018-09-30 05:35:15', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
