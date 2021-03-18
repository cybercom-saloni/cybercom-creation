-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 10:41 AM
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
-- Database: `cybercomproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `userName`, `password`, `status`, `createdDate`) VALUES
(1, 'a', 'a1', 1, '2021-02-04 00:00:00'),
(3, 'saloni', 'saloni', 0, '2021-02-26 16:23:39'),
(5, '2', '2', 0, '2021-03-03 02:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentId`, `name`, `status`, `description`) VALUES
(5, 1, 'a1', 1, 'a1'),
(7, 0, 'a1', 0, 'a2'),
(8, 0, 'a1', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `pageId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `identifier` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`pageId`, `title`, `identifier`, `content`, `status`, `createDate`) VALUES
(12, '1', 0, '', 0, '0000-00-00 00:00:00'),
(13, '1', 1, '<p>1</p>', 0, '2021-03-18 06:58:50'),
(14, '1', 1, '<p>1</p>', 0, '2021-03-18 06:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `groupId` int(11) DEFAULT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL,
  `mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `groupId`, `firstName`, `lastName`, `email`, `password`, `status`, `createdDate`, `updatedDate`, `mobile`) VALUES
(1, 1, '1', 'a1', 'dd', '8a8bb7cd343aa2ad99b7d762030857a2', '1', '2021-02-17 12:00:00', '2021-03-11 07:35:10', 123),
(17, 1, '1', '1', '1@gmail.xom', 'c4ca4238a0b923820dcc509a6f75849b', '1', '2021-03-04 04:48:43', '0000-00-00 00:00:00', 1),
(18, 1, 'saloni', 'saloni', 'saloni@gmail.com', '5e36c9f741aac0be6250faecf38e9c7a', '0', '2021-03-04 05:04:58', '0000-00-00 00:00:00', 12345),
(19, NULL, '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', '2021-03-16 06:02:59', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipCode` int(6) NOT NULL,
  `country` varchar(50) NOT NULL,
  `AddressType` varchar(20) NOT NULL,
  `customerId` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `address`, `city`, `state`, `zipCode`, `country`, `AddressType`, `customerId`, `createdDate`, `updateDate`) VALUES
(1, 'xyz', 'x', 'x', 1234, 'x', '2', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '1', '1', '1', 1, '1', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'a1', 'ban', 'rj', 32, 'in', 'billing', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'a1', 'ban', 'rj', 32, 'in', 'billing', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'a', 'ban', 'rj', 327001, 'in', 'billing', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '1', '1', '1', 1, '1', 'billing', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '1', '1', '1', 45, '1', 'billing', 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'a1', 'ban', 'rj', 32, 'in', 'billing', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'a1', 'ban', 'rj', 32, 'in', 'billing', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '3', 'baroda', 'guj', 1234, 'india', 'shipping', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'a1', 'ban', 'rj', 32, 'in', 'billing', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '3', 'baroda', 'guj', 1235, 'india', 'shipping', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '1', '1', '1', 1, '1', 'billing', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '', '', '', 0, '', 'shipping', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '1', '1', '1', 1, '1', 'billing', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '', '', '', 0, '', 'shipping', 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`groupId`, `name`, `status`, `createdDate`) VALUES
(1, 'wholeseller', 1, '2021-03-02 08:24:00'),
(2, 'retailers', 0, '2021-03-11 08:17:55'),
(3, '100', 0, '2021-03-13 08:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(1, 'a1', 'a1', 'a2', '1', '2021-02-26 07:55:03'),
(2, '12', '12', '12', '0', '2021-02-26 16:10:27'),
(3, 'a1', 'a2', 'a1', '1', '2021-03-01 17:56:05'),
(4, '1', '1', '1', '1', '2021-03-03 03:18:18'),
(5, '1', '1', '1', '1', '2021-03-11 08:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` tinytext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`) VALUES
(1, '111wwww', 'a1', '100.00', '10.00', 1, 'a1', 0, '2014-02-21 06:02:11', '2021-03-17 09:30:05'),
(3, '#12345A', 'white rose', '100.00', '10.00', 2, 'nice', 0, '2015-02-21 02:02:49', '2021-02-22 07:46:41'),
(5, '#12345', 'xy1', '18.00', '2.00', 3, 'hrllo', 0, '2015-02-21 02:02:02', '2021-02-22 07:02:13'),
(21, '', 'saa', '12.00', '0.00', 12, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '', 'saa', '12.00', '0.00', 12, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '', '', '0.00', '0.00', 0, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '', 'a1', '100.00', '0.00', 10, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '', '11', '11.00', '0.00', 11, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '', 'qq', '11.00', '0.00', 1, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'a1', 'a1', '12.00', '1.00', 1, 'a1', 0, '2016-02-21 05:02:12', '2016-02-21 05:02:12'),
(48, 'a1', 'a1', '12.00', '1.00', 1, 'a1', 0, '2016-02-21 05:02:34', '2016-02-21 05:02:34'),
(49, 'a2', 'a2', '12.00', '10.00', 3, 'ss', 0, '2016-02-21 05:02:44', '2016-02-21 05:02:44'),
(51, 'xyz', 'xyz', '100.00', '10.00', 1, 'x', 0, '2017-02-21 06:02:54', '2017-02-21 06:02:54'),
(52, 'xyz', 'xy1', '100.00', '10.00', 2, 'x1', 0, '2017-02-21 06:02:05', '2021-02-21 11:38:25'),
(53, 'a1', 'a1', '100.00', '10.00', 1, '10', 0, '2017-02-21 06:02:42', '2017-02-21 06:02:42'),
(54, '11', '111', '2122.00', '222.00', 1, '11', 0, '2017-02-21 08:02:38', '2017-02-21 08:02:38'),
(55, '111', '111', '111.00', '111.00', 1, '11', 0, '2017-02-21 08:02:53', '2017-02-21 08:02:53'),
(56, '11', '11', '11.00', '111.00', 1, '1111', 0, '2017-02-21 13:02:28', '2017-02-21 13:02:28'),
(58, '11', '11', '11.00', '111.00', 1, '1111', 0, '2017-02-21 13:02:14', '2017-02-21 13:02:14'),
(59, 'a1', 'a1', '100.00', '10.00', 1, 'a1', 0, '2021-02-19 06:46:33', '2021-02-19 06:46:33'),
(60, 'a1', 'a1', '100.00', '10.00', 1, 'a1', 0, '2021-02-19 06:58:42', '2021-02-19 06:58:42'),
(62, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '11', '11', '11.00', '11.00', 10, '11', 0, '2021-02-20 05:35:42', '2021-02-20 05:35:43'),
(68, '11', '11', '11.00', '11.00', 10, '11', 0, '2021-02-20 05:38:23', '2021-02-20 05:38:23'),
(69, 'sa', 'sa', '100.00', '100.00', 3, 'as1', 0, '0000-00-00 00:00:00', '2021-02-21 07:09:26'),
(70, 'sa', 'sa', '100.00', '100.00', 3, 'as222', 0, '0000-00-00 00:00:00', '2021-02-21 07:11:19'),
(71, 'sa', 'sa', '100.00', '100.00', 3, 'as', 0, '0000-00-00 00:00:00', '2021-02-20 18:11:05'),
(72, 'sa', 'sa', '100.00', '100.00', 3, 'as', 0, '0000-00-00 00:00:00', '2021-02-22 05:48:00'),
(73, 'qwe', 'qwr', '100.00', '10.00', 1, '', 0, '2021-02-21 07:02:39', '2021-02-21 09:34:45'),
(74, 'a1111', 'a1', '1.00', '1.00', 1, 'as', 0, '2021-02-21 09:39:21', '0000-00-00 00:00:00'),
(75, '', '', '0.00', '0.00', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'a2', 'a2', '11.00', '1.00', 10, '1', 0, '2021-02-21 17:15:09', '0000-00-00 00:00:00'),
(79, 'a21', 'a2', '11.00', '1.00', 10, '1', 0, '2021-02-21 17:17:02', '2021-02-21 17:17:57'),
(81, '1', '1', '1.00', '1.00', 1, '1', 0, '2021-02-22 07:03:31', '0000-00-00 00:00:00'),
(82, '1', '1', '1.00', '1.00', 1, '1', 0, '2021-02-22 07:05:08', '0000-00-00 00:00:00'),
(83, '111', '11', '1.00', '1.00', 1, '1', 0, '2021-02-22 07:59:23', '0000-00-00 00:00:00'),
(84, '111', '11', '1.00', '1.00', 1, '1', 0, '2021-02-22 08:10:32', '0000-00-00 00:00:00'),
(85, '111', '11', '1.00', '1.00', 1, '1', 0, '2021-02-22 08:10:32', '0000-00-00 00:00:00'),
(88, '1', '1', '1.00', '11.00', 1, '2', 0, '2021-02-22 08:29:18', '0000-00-00 00:00:00'),
(89, '1', '1', '1.00', '11.00', 1, '2', 0, '2021-02-22 08:34:47', '0000-00-00 00:00:00'),
(90, '1', '1', '1.00', '11.00', 1, '2', 0, '2021-02-22 08:35:37', '0000-00-00 00:00:00'),
(91, '1', '1', '1.00', '11.00', 1, '2', 0, '2021-02-22 08:36:21', '0000-00-00 00:00:00'),
(92, '1', '1', '1.00', '11.00', 1, '2', 0, '2021-02-22 08:37:29', '0000-00-00 00:00:00'),
(93, '1', '1', '1.00', '11.00', 1, '2', 0, '2021-02-22 08:37:48', '0000-00-00 00:00:00'),
(96, '1', '1', '1.00', '1.00', 1, '1', 0, '2021-03-01 08:19:26', '0000-00-00 00:00:00'),
(99, '1233', '123', '123.00', '123.00', 123, '123', 1, '2021-03-04 07:58:08', '0000-00-00 00:00:00'),
(100, '1', '1', '1.00', '1.00', 1, '1', 1, '2021-03-10 16:04:21', '0000-00-00 00:00:00'),
(101, '3', '1', '1.00', '1.00', 1, '1', 1, '2021-03-11 06:33:47', '2021-03-11 06:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(44, 21, 1, '333.00'),
(45, 21, 2, '200.00'),
(46, 21, 3, '300.00'),
(47, 3, 1, '100.00'),
(48, 3, 2, '0.00'),
(49, 3, 3, '0.00'),
(50, 1, 1, '700.00'),
(51, 1, 2, '0.00'),
(52, 1, 3, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `imageId` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `label` varchar(50) NOT NULL,
  `small` tinyint(1) NOT NULL,
  `thumb` tinyint(1) NOT NULL,
  `base` tinyint(1) NOT NULL,
  `gallery` tinyint(1) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`imageId`, `image`, `label`, `small`, `thumb`, `base`, `gallery`, `productId`) VALUES
(28, 'feedback.png', '', 0, 0, 0, 0, 1),
(29, 'feedback.png', '', 0, 0, 0, 0, 0),
(56, '', '', 1, 0, 0, 0, 0),
(57, '', '', 0, 1, 0, 0, 0),
(58, '', '', 0, 0, 1, 0, 0),
(59, '', '', 1, 0, 0, 0, 0),
(60, '', '', 0, 1, 0, 0, 0),
(61, '', '', 0, 0, 1, 0, 0),
(62, '', '', 0, 1, 0, 0, 0),
(63, '', '', 0, 0, 0, 1, 0),
(64, '', '', 0, 0, 0, 1, 0),
(65, '', '', 0, 0, 0, 0, 1),
(66, '', '', 0, 0, 0, 0, 1),
(67, '1.png', '', 0, 0, 0, 0, 1),
(68, '1.png', '', 0, 0, 0, 0, 1),
(69, 'application (1).sql', 'asasas', 1, 0, 1, 1, 5),
(70, '1.png', 'asas', 1, 1, 0, 1, 5),
(71, '', '', 0, 0, 0, 0, 0),
(72, '', '12', 0, 0, 0, 0, 0),
(73, '', '', 0, 0, 0, 0, 0),
(74, '', '122', 0, 0, 0, 0, 0),
(75, '', '', 0, 0, 0, 0, 0),
(76, '', '', 0, 0, 0, 0, 0),
(77, '', '', 0, 0, 0, 0, 0),
(78, '', '', 0, 0, 0, 0, 0),
(79, '', '', 1, 0, 0, 0, 0),
(80, '', '', 0, 1, 0, 0, 0),
(81, '', '', 0, 0, 0, 0, 0),
(82, '', '', 0, 0, 0, 0, 0),
(83, '', '', 1, 0, 0, 0, 0),
(84, '', '', 0, 1, 0, 0, 0),
(85, '', '', 0, 0, 0, 0, 0),
(86, '', '', 0, 0, 0, 0, 0),
(87, '', '', 1, 0, 0, 0, 0),
(88, '', '', 0, 1, 0, 0, 0),
(89, '1.png', '12212122121', 0, 1, 0, 1, 5),
(90, '', '', 0, 0, 0, 0, 0),
(91, '', '', 0, 0, 0, 0, 0),
(92, '', '', 0, 0, 0, 0, 0),
(93, '', '', 1, 0, 0, 0, 0),
(94, '', '', 0, 1, 0, 0, 0),
(95, '', '', 0, 0, 1, 0, 0),
(96, '1.png', '1212121212', 1, 0, 1, 0, 5),
(97, '', '', 0, 0, 0, 0, 0),
(98, '', 'asas', 0, 0, 0, 0, 0),
(99, '', '', 0, 0, 0, 0, 0),
(100, '', '', 0, 0, 0, 0, 0),
(101, '', '', 1, 0, 0, 0, 0),
(102, '', '', 0, 1, 0, 0, 0),
(103, '', '', 0, 0, 0, 0, 0),
(104, '', 'asas', 0, 0, 0, 0, 0),
(105, '', '', 0, 0, 0, 0, 0),
(106, '', '', 0, 0, 0, 0, 0),
(107, '', '', 1, 0, 0, 0, 0),
(108, '', '', 0, 1, 0, 0, 0),
(109, '', '', 0, 0, 0, 0, 0),
(110, '', 'asas', 0, 0, 0, 0, 0),
(111, '', '', 0, 0, 0, 0, 0),
(112, '', '', 0, 0, 0, 0, 0),
(113, '', '', 1, 0, 0, 0, 0),
(114, '', '', 0, 1, 0, 0, 0),
(116, '', '', 0, 0, 0, 0, 0),
(117, '', '', 0, 0, 0, 0, 0),
(118, '', '', 1, 0, 0, 0, 0),
(119, '', '', 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `shipmentId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`shipmentId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(1, 'saloni', 'as123', '123.00', 'as', 1, '2021-02-26 00:00:00'),
(2, 'a1', 'a3', '100.00', '100', 0, '2021-03-01 17:54:52'),
(3, '1', '1', '1.00', '1', 1, '2021-03-03 03:32:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`shipmentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `shipmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `customer_group` (`groupId`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
