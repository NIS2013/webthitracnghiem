-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: ilab.vn
-- Generation Time: Jul 24, 2017 at 02:21 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilab`
--

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `sessionid` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device` varchar(255) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `sessionid`, `user_id`, `device`, `ip`, `datetime`) VALUES
(63, '1bfb5c346694ba9', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', '::1', '2016-10-29 00:45:13'),
(67, 'd57cafc2f478797', 0, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.87 Safari/537.36', '::1', '2016-11-10 13:34:54'),
(69, 'a53dd3a2572c611', 0, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.87 Safari/537.36', '::1', '2016-11-10 13:37:17'),
(70, 'f2aa11d470873aa', 0, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.87 Safari/537.36', '::1', '2016-11-10 13:37:22'),
(78, 'e8af334e4e7205b', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.87 Safari/537.36', '::1', '2016-11-11 17:37:25'),
(89, '3003624030adf65', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.87 Safari/537.36', '::1', '2016-11-12 13:52:19'),
(109, '7978f738a385c98', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '::1', '2016-11-22 06:01:26'),
(114, 'd60c37df0a', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '::1', '2016-12-01 07:09:10'),
(115, '95a689fee08', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '::1', '2016-12-01 07:27:46'),
(134, 'd18335d26ae443', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '::1', '2016-12-06 11:53:02'),
(137, 'f2a000df63a9f22', 25, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '::1', '2016-12-06 13:19:14'),
(141, '64c4a52b', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '::1', '2016-12-08 03:38:22'),
(142, '11d4ece556357', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '::1', '2016-12-09 13:55:43'),
(143, '177e8630d44091e', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '::1', '2016-12-10 15:13:18'),
(144, '579b0bd', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '::1', '2016-12-13 05:29:50'),
(153, 'ad2e2c47ff19757', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2016-12-16 00:13:59'),
(167, '13092c9708f9', 25, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', '::1', '2016-12-16 02:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `username` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `tempid` varchar(255) DEFAULT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `name`, `password`, `email`, `location`, `gender`, `tempid`, `join_date`) VALUES
(23, 1, 'tahongtrung', 'tahongtrung', '714d071e82a18534744caebea91b6eb9', 'tahongtrung@localhost', 'vietnam', 'Male', NULL, '2016-10-28 10:59:36'),
(24, 1, 'tahongnghia', 'tahongnghia', '714d071e82a18534744caebea91b6eb9', 'tahongtrung9x@gamail.com', 'VN', 'Male', '48c9088d1', '2016-10-28 11:09:07'),
(25, 0, 'admin', 'Trung', '714d071e82a18534744caebea91b6eb9', 'tahongtrung@hotmail.com', 'vn', 'Male', '6daa6b6cbbc4f11', '2016-10-28 11:40:13'),
(26, 1, 'doannghuyen', 'Doan', '714d071e82a18534744caebea91b6eb9', 'doannguyen@gmail.com', 'VN', 'Male', NULL, '2016-10-28 12:35:52'),
(27, 1, 'kingdole', 'KingOCCHO', 'dc18de22bf9106654ddd4272cfc12d4e', 'phucbinh@gmail.com', 'agdahsjdasd', 'Male', NULL, '2016-12-16 01:32:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
