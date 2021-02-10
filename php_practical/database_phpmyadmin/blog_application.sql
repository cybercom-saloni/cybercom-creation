-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 02:02 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `blogid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `publishAt` datetime NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`blogid`, `userid`, `title`, `url`, `content`, `image`, `publishAt`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'education', 'http://wwww', 'nice', 'upload/apikeyimage.png', '2021-02-09 07:00:00', '2021-02-10 10:12:13', '2021-02-10 09:00:16'),
(2, 21, 'edu', 'http://www', 'try', 'upload/apikeyimage.png', '2021-02-10 01:02:23', '2021-02-10 01:02:23', '2021-02-10 01:02:23'),
(3, 21, 'edu', 'http://www', 'try', 'upload/apikeyimage.png', '2021-02-10 01:02:26', '2021-02-10 01:02:26', '2021-02-10 01:02:26'),
(4, 21, 'edu', 'http://web', 'edu', 'upload/apikeyimage.png', '2021-02-10 01:02:08', '2021-02-10 01:02:08', '2021-02-10 01:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `parentcatid` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `meta title` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `content` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `parentcatid`, `name`, `title`, `meta title`, `url`, `content`, `createdAt`, `updatedAt`, `status`) VALUES
(2, 1, 'edu', 'edu', 'edu', 'http://wwww', 'edu', '2021-02-17 00:00:00', '2021-02-09 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`post_id`, `category_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `prefix` varchar(5) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login_at` datetime NOT NULL,
  `information` tinytext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `prefix`, `firstname`, `lastname`, `mobile`, `email`, `password`, `last_login_at`, `information`, `created_at`, `updated_at`, `status`) VALUES
(12, 'Miss.', 'saloni', 'maheshwari', 2147483647, 'saloni@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2021-02-10 08:02:22', 'hiiii', '2021-02-10 08:02:22', '2021-02-10 08:02:22', 1),
(13, 'Miss.', 'assassa', 'sddsdsd', 2147483647, 'sasas@gmail.com', 'cdb81ae0894604ec989736fa01e99ccd', '2021-02-10 09:02:50', 'ggg', '2021-02-10 09:02:50', '2021-02-10 09:02:50', 1),
(14, 'Mrs.', 'anuj', 'jain', 2147483647, 'jain@gmail.com', '72808d54c8f7f1c93f17f93db7253e48', '2021-02-10 09:02:16', 'good', '2021-02-10 09:02:16', '2021-02-10 09:02:16', 1),
(15, 'Mrs.', 'siya', 'jain', 2147483647, 'siya@gmail.com', '9664970ff0a6fa9a0f776dd4deddebe3', '2021-02-10 09:02:52', 'good ', '2021-02-10 09:02:52', '2021-02-10 09:02:52', 1),
(16, 'Miss.', 'saloni', 'jain', 2147483647, 'saloni33@gmail.com', 'beedd97b88b18ae9ce0b8116e5932c37', '2021-02-10 09:02:27', 'right', '2021-02-10 09:02:27', '2021-02-10 09:02:27', 1),
(17, 'Mrs.', 'lalita', 'smith', 2147483647, 'smith12@gmail.com', '8bff75aab6624c28282a851bf7cef6eb', '2021-02-10 09:02:36', 'yups', '2021-02-10 09:02:36', '2021-02-10 09:02:36', 1),
(18, 'Miss.', 'helly', 'jain', 2147483647, 'jain88@gmail.com', '4ce3535a10ba0454e2b00d0ffba81a79', '2021-02-10 09:02:46', 'yups', '2021-02-10 09:02:46', '2021-02-10 09:02:46', 1),
(19, 'Miss.', 'abc', 'def', 2147483647, 'abc@gmail.com', '528d5825a35d33f3e6fd3a857d18746b', '2021-02-10 09:02:45', 'yups', '2021-02-10 09:02:45', '2021-02-10 09:02:45', 1),
(20, 'Miss.', 'abc', 'def', 2147483647, 'abc1@gmail.com', 'cdb81ae0894604ec989736fa01e99ccd', '2021-02-10 10:02:12', 'yups', '2021-02-10 10:02:53', '2021-02-10 10:02:53', 1),
(21, 'Mrs.', 'saloni', 'maheshwari', 2147483647, 'saloni123@gmail.com', 'cdb81ae0894604ec989736fa01e99ccd', '2021-02-10 01:02:32', 'er', '2021-02-10 10:02:31', '2021-02-10 11:02:38', 1),
(22, 'Mr.', 'aaaa', 'ssss', 2147483647, 'aaa@gmail.com', '964b153610572109fb5be7a4e91b4a85', '2021-02-10 10:02:24', 'rrrr', '2021-02-10 10:02:24', '2021-02-10 10:02:24', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `blogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
