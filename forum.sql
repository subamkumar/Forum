-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2016 at 11:15 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `p_id` bigint(20) NOT NULL,
  `p_title` varchar(500) NOT NULL,
  `p_desc` varchar(500) NOT NULL,
  `p_time` datetime(6) NOT NULL,
  `p_author` bigint(20) NOT NULL,
  `author_branch` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `p_title`, `p_desc`, `p_time`, `p_author`, `author_branch`) VALUES
(81, 'subam', 'sas', '2016-02-10 07:57:15.000000', 7, 'Computer'),
(82, 'ashuah', 'hsdiuahdfadf', '2016-02-10 08:00:12.000000', 7, 'Computer'),
(83, 'sdfsdfsgfgsh', 'sgfrfgargreg', '2016-02-10 08:00:21.000000', 7, 'Computer'),
(84, 'suban', 'kumar', '2016-02-10 08:05:27.000000', 7, 'Computer'),
(85, 'asasa', 'sadasd', '2016-02-10 08:05:33.000000', 7, 'Computer'),
(86, 'sdjagy', 'hgbjysdfsdf', '2016-02-10 08:06:24.000000', 7, 'Computer'),
(87, 'ghfdshjy', 'jgfjysdfjf', '2016-02-10 08:06:35.000000', 7, 'Computer'),
(88, 'subam', 'subam', '2016-02-11 10:27:02.000000', 7, 'Computer'),
(89, 'yogi is here', 'whats up dude', '2016-02-11 10:31:48.000000', 10, 'ENTC'),
(90, 'asa', 'sasasa', '2016-02-11 12:44:00.000000', 7, 'Computer'),
(91, 'subam', 'sdsd', '2016-02-11 12:44:16.000000', 7, 'Computer'),
(92, 'helloo', 'shagddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddsssssssssssssssssssssssssssssssss', '2016-02-11 12:44:47.000000', 7, 'Computer'),
(93, 'dsfsdf', 'sdfsdfds', '2016-02-11 01:04:43.000000', 7, 'IT'),
(94, 'asasjhkas', 'jhaksdfdf\nadfakdhfgf\nadfadjkfgdaf\ndfdajfghf\nadfadfgadhf\nadfdalfgaf', '2016-02-11 01:12:43.000000', 7, 'IT'),
(95, 'sdasdas', 'dasdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff ddddddddddddddddddddddddddddddddddddddd dddddddddddddd\nddddddddddddddddddd \nddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2016-02-11 01:14:55.000000', 7, 'Computer'),
(96, 'asa', 'asa\nas\nasa\nsas\nas', '2016-02-11 01:15:10.000000', 7, 'Computer'),
(97, 'dfs', 'sdfsdfsd\nghk\ngjf\njgfj', '2016-02-11 01:18:06.000000', 7, 'Computer'),
(98, 'sds', 'dadad<br />Sadsa<br />dsadasd', '2016-02-11 01:20:52.000000', 7, 'Computer'),
(99, 'sasas', 'subam<br />suba is hyrasg', '2016-02-11 01:21:08.000000', 7, 'Computer'),
(100, 'sasas', 'asasasas', '2016-02-11 01:22:07.000000', 7, 'Computer'),
(101, 'heeloo', 'hello world<br />hnjdbgsa', '2016-02-17 11:01:14.000000', 7, 'Computer'),
(102, 'gsdahdg', 'hsdfgsdjbhsdjf', '2016-02-17 11:01:31.000000', 7, 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `r_id` bigint(20) NOT NULL,
  `p_id` bigint(20) NOT NULL,
  `r_author` bigint(20) NOT NULL,
  `r_desc` varchar(255) NOT NULL,
  `r_time` datetime(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`r_id`, `p_id`, `r_author`, `r_desc`, `r_time`) VALUES
(49, 97, 7, 'sybam<br />sya', '2016-02-11 01:19:37.000000'),
(50, 90, 7, 'hello nuddy', '2016-02-15 05:32:24.000000'),
(51, 100, 8, 'hello buddy', '2016-02-15 05:32:52.000000'),
(52, 94, 11, 'hey buddy i know about this type of answers kindlu contact me or mail i will get back tot you as quickly as possible', '2016-02-16 06:16:49.000000'),
(53, 100, 7, 'suba is jhsjd', '2016-02-17 11:00:53.000000'),
(54, 102, 7, 'djkfhsfds', '2016-02-17 11:01:56.000000'),
(55, 102, 7, 'dsfsdfs', '2016-02-17 11:01:57.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `branch`, `username`, `password`, `user_img`) VALUES
(7, 'subam kumar', 'IT', 'subamkumar1997', 'e2264e37bb645453adf1dc700d0b28c1', 'Derp-thinking.jpg'),
(8, 'sandra', 'Computer', 'ashish_kumar', '202cb962ac59075b964b07152d234b70', 'Mumbai_Skyline_at_Night.jpg'),
(10, 'yogesh', 'ENTC', 'yogi_k', '202cb962ac59075b964b07152d234b70', 'abc3862.jpg'),
(11, 'abhishek ghotekar', 'IT', 'abhicool@gmail.com', 'e2264e37bb645453adf1dc700d0b28c1', 'mypic.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `r_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
