-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 08:24 AM
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
-- Database: `questecom`
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
(3, 'salon', 'saloni', 1, '2021-02-26 16:23:39'),
(6, '111', '11', 0, '2021-03-22 08:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` enum('Product','Category') NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` int(11) NOT NULL,
  `inputType` varchar(50) NOT NULL,
  `backendType` varchar(50) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(1, 'Product', 'p1', 123, 'varchar', 'v', 1, 's'),
(2, 'Product', 'p1', 123, 'varchar', 'v', 1, 's');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `sessionId` varchar(32) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `shippingMethodId` int(11) NOT NULL,
  `shippingAmount` decimal(10,2) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `customerId`, `sessionId`, `total`, `discount`, `paymentMethodId`, `shippingMethodId`, `shippingAmount`, `createdDate`) VALUES
(1, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-06 21:06:22'),
(3, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-06 21:55:04'),
(4, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-06 21:55:09'),
(5, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-06 21:55:14'),
(7, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 07:31:24'),
(8, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 07:36:20'),
(9, 17, '', '0.00', '0.00', 0, 1, '200.00', '2021-04-07 07:36:26'),
(11, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:03:21'),
(12, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:03:21'),
(13, 24, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:03:50'),
(14, 25, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:05:17'),
(15, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:10:15'),
(16, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:10:19'),
(17, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:04'),
(18, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:04'),
(19, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:07'),
(20, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:07'),
(21, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:08'),
(22, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:09'),
(23, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:09'),
(24, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:09'),
(25, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:10'),
(26, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:10'),
(27, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:12'),
(28, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:13'),
(29, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:13'),
(30, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:13'),
(31, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:14'),
(32, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:14'),
(33, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:14'),
(34, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:15'),
(35, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:18'),
(36, 0, '', '0.00', '0.00', 0, 2, '0.00', '2021-04-07 08:11:40'),
(37, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:40'),
(38, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:40'),
(39, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:11:40'),
(40, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:12:46'),
(41, 0, '', '0.00', '0.00', 0, 2, '0.00', '2021-04-07 08:13:04'),
(42, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:13:04'),
(43, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:13:04'),
(44, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:13:05'),
(47, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:25:48'),
(48, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:25:48'),
(50, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:28:43'),
(51, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 08:29:29'),
(53, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 11:42:00'),
(54, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 11:42:00'),
(56, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 14:12:36'),
(57, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 14:14:12'),
(59, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 14:40:05'),
(60, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 14:40:29'),
(61, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 14:40:30'),
(63, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 14:47:40'),
(64, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 14:47:41'),
(66, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 15:02:11'),
(67, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 15:02:11'),
(69, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 15:14:11'),
(70, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 15:14:11'),
(72, 0, '', '0.00', '0.00', 0, 0, '0.00', '2021-04-07 15:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `cart_address`
--

CREATE TABLE `cart_address` (
  `cartAddressId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `addressId` int(11) NOT NULL,
  `addressType` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `sameAsBilling` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_address`
--

INSERT INTO `cart_address` (`cartAddressId`, `cartId`, `addressId`, `addressType`, `address`, `city`, `state`, `country`, `zipCode`, `sameAsBilling`, `createdDate`) VALUES
(3, 0, 0, 'billing', 'surat', 'surat', 'guj', 'in', '124', 0, '0000-00-00 00:00:00'),
(4, 0, 0, 'shipping', '', '', '', '', '', 0, '0000-00-00 00:00:00'),
(7, 0, 0, 'shipping', '', '', '', '', '', 0, '0000-00-00 00:00:00'),
(8, 0, 0, 'shipping', '', '', '', '', '', 0, '0000-00-00 00:00:00'),
(9, 0, 0, 'shipping', 'saloni', 'abc', 'guj', 'in', '124', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cartItemId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `basePrice` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cartItemId`, `cartId`, `productId`, `quantity`, `basePrice`, `price`, `discount`, `createdDate`) VALUES
(1, 2, 1, 5, '0.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(2, 2, 3, 1, '0.00', '100.00', '10.00', '0000-00-00 00:00:00'),
(4, 6, 1, 2, '0.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(5, 0, 33, 1, '0.00', '0.00', '0.00', '0000-00-00 00:00:00'),
(6, 0, 1, 6, '0.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(7, 10, 1, 1, '0.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(8, 11, 1, 1, '0.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(9, 9, 5, 1, '0.00', '18.00', '2.00', '0000-00-00 00:00:00'),
(10, 45, 1, 2, '0.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(11, 46, 1, 1, '0.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(12, 47, 5, 1, '0.00', '18.00', '2.00', '0000-00-00 00:00:00'),
(13, 49, 5, 1, '0.00', '18.00', '2.00', '0000-00-00 00:00:00'),
(14, 52, 1, 1, '0.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(15, 52, 3, 3, '0.00', '100.00', '10.00', '0000-00-00 00:00:00'),
(16, 53, 1, 1, '0.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(17, 55, 1, 8, '0.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(18, 55, 3, 4, '0.00', '100.00', '10.00', '0000-00-00 00:00:00'),
(19, 55, 5, 2, '18.00', '18.00', '2.00', '0000-00-00 00:00:00'),
(20, 58, 1, 1, '200.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(21, 60, 1, 1, '200.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(22, 62, 1, 1, '200.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(23, 62, 3, 2, '100.00', '100.00', '10.00', '0000-00-00 00:00:00'),
(24, 63, 1, 1, '200.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(25, 65, 1, 1, '200.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(26, 66, 1, 1, '200.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(27, 68, 1, 2, '200.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(28, 69, 1, 1, '200.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(29, 71, 1, 1, '200.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(30, 71, 3, 2, '100.00', '100.00', '10.00', '0000-00-00 00:00:00'),
(31, 73, 1, 1, '200.00', '200.00', '0.00', '0000-00-00 00:00:00'),
(32, 73, 3, 3, '100.00', '100.00', '10.00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `description` tinytext NOT NULL,
  `pathId` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentId`, `name`, `status`, `description`, `pathId`) VALUES
(24, 0, 'a1', 0, '', '24'),
(25, 28, 'a1111', 0, '', '24=27=28=25'),
(26, 24, 'a11', 1, '', NULL),
(27, 0, 'a19', 0, '', '27'),
(29, 25, 'a11111', 0, '', '24=27=28=25=29'),
(31, 0, '', 0, '', '31'),
(32, 27, 'a21', 0, '', '24=27=32'),
(33, 24, 'a21', 0, '', NULL),
(34, 24, 'a222', 0, '', NULL),
(35, 24, 'a2', 0, '', '24=35'),
(36, 0, '', 1, '', NULL),
(37, 0, '', 1, '', NULL),
(38, 0, '', 1, '', NULL),
(39, 24, 'a1', 0, 'a1', '24=39'),
(40, 0, 'bedroom', 0, 'a1', '40'),
(41, 40, 'bed', 0, 'a1', '40=41'),
(42, 0, 'panelbed12', 0, 'a1', '42'),
(43, 41, 'panelbed2', 1, '', '40=41=43');

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
(13, '1', 1, '<p>1</p>', 1, '2021-03-18 06:58:50'),
(14, 'hello', 4, '<p>hii<strong> hello</strong><i> hiii</i></p>', 1, '2021-03-24 02:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `configId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL,
  `value` varchar(40) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`configId`, `groupId`, `title`, `code`, `value`, `createdDate`) VALUES
(1, 2, 'config1', 'con1', '1', '0000-00-00 00:00:00'),
(2, 2, 'config2', 'con2', '2', '0000-00-00 00:00:00'),
(11, 2, 'config3', 'con3', '3', '0000-00-00 00:00:00'),
(12, 2, 'config4', 'con4', '4', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `config_group`
--

CREATE TABLE `config_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_group`
--

INSERT INTO `config_group` (`groupId`, `name`, `createdDate`) VALUES
(2, 'config2', '0000-00-00 00:00:00'),
(4, '123', '0000-00-00 00:00:00');

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
(1, 1, 'a12', 'a1', 'dd', 'd7ec69302574b46eec3aad211384264b', '1', '2021-02-17 12:00:00', '2021-04-01 15:32:50', 123),
(17, 1, 'b', '1', '1@gmail.xom', 'c4ca4238a0b923820dcc509a6f75849b', '1', '2021-03-04 04:48:43', '0000-00-00 00:00:00', 1),
(23, NULL, 'a12', 'a1', 'dd', 'd7ec69302574b46eec3aad211384264b', '1', '0000-00-00 00:00:00', '2021-04-01 11:05:13', 123),
(24, NULL, 'a1', '12', '12', 'c4ca4238a0b923820dcc509a6f75849b', '', '2021-04-02 06:56:49', '0000-00-00 00:00:00', 1),
(25, NULL, 'a1', 'a1', 'a1@gmail.com', '5e36c9f741aac0be6250faecf38e9c7a', '0', '2021-04-02 12:47:30', '0000-00-00 00:00:00', 2147483647),
(26, NULL, 'saloni', 'maheshwari', 'saloni@gmail.com', '398c9ad58086298e01d04ee8709d0cd0', '1', '2021-04-07 04:46:26', '0000-00-00 00:00:00', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `addressType` varchar(10) NOT NULL,
  `saveInAddressBook` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipCode`, `country`, `addressType`, `saveInAddressBook`) VALUES
(1, 1, 'surat', 'surat', 'guj', '124', 'in', 'billing', 0),
(2, 1, 'saloni', 'abc', 'guj', '124', 'in', 'shipping', 0),
(3, 25, 'a1333', 'a3', 'a3', '3', 'a3', 'billing', 0),
(4, 25, '122', 'a2', 'a2', '2', 'a2', 'shipping', 0),
(5, 0, '', '', '', '', '', '', 0),
(6, 25, 'a21', 'a3', 'a3', '3', 'a3', '', 0),
(7, 25, 'a21', 'a3', 'a3', '3', 'a3', 'billing', 0),
(8, 25, '122', 'a3', 'a3', '3', 'a3', 'billing', 0),
(9, 25, 'a1333', 'a3', 'a3', '3', 'a3', 'billing', 0),
(10, 1, 'saloni', 'abc', 'guj', '124', 'in', 'shipping', 0),
(11, 1, 'saloni', 'abc', 'guj', '124', 'in', 'shipping', 0),
(12, 23, 'ratitali', 'banswara', 'rj', '327001', 'in', 'billing', 0);

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
(1, 'wholesellers', 1, '2021-04-01 15:36:01'),
(2, 'retailers', 1, '2021-03-11 08:17:55'),
(3, '100', 1, '2021-03-13 08:30:21'),
(4, 'a1', 0, '2021-03-23 14:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `shippingMethodId` int(11) NOT NULL,
  `shippingAmount` decimal(10,2) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `customerId`, `total`, `shippingMethodId`, `shippingAmount`, `paymentMethodId`, `discount`, `createdDate`) VALUES
(10, 26, '700.00', 1, '200.00', 0, '0.00', '2021-04-07 16:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `orderAddressId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `addressId` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `zipCode` varchar(20) NOT NULL,
  `sameAsBilling` tinyint(1) NOT NULL,
  `addressType` varchar(10) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`orderAddressId`, `orderId`, `addressId`, `address`, `city`, `state`, `country`, `zipCode`, `sameAsBilling`, `addressType`, `createdDate`) VALUES
(5, 2, 0, 'ban', 'banswara', 'raj', 'in', '1234', 1, 'shipping', '2021-04-07 08:30:19'),
(6, 2, 0, 'ban', 'banswara', 'raj', 'in', '1234', 0, 'billing', '2021-04-07 08:30:19'),
(7, 3, 0, 'saloni', 'abc', 'guj', 'in', '124', 0, 'shipping', '2021-04-07 14:06:44'),
(8, 3, 0, 'surat', 'surat', 'guj', 'in', '124', 0, 'billing', '2021-04-07 14:06:45'),
(9, 2, 0, 'ratitalai', 'banswara', 'rajasthan', 'india', '327001', 1, 'shipping', '2021-04-07 14:13:36'),
(10, 2, 0, 'ratitalai', 'banswara', 'rajasthan', 'india', '327001', 0, 'billing', '2021-04-07 14:13:36'),
(11, 5, 0, 'ratiTalai', 'banswara', 'raj', 'india', '327001', 1, 'shipping', '2021-04-07 14:17:53'),
(12, 5, 0, 'ratiTalai', 'banswara', 'raj', 'india', '327001', 0, 'billing', '2021-04-07 14:17:53'),
(13, 5, 0, 'ahmedabad', 'ahmedabad', 'guj', 'india', '12345', 1, 'shipping', '2021-04-07 14:41:53'),
(14, 5, 0, 'ahmedabad', 'ahmedabad', 'guj', 'india', '12345', 0, 'billing', '2021-04-07 14:41:53'),
(15, 7, 0, 'ahmedabad', 'ahmedabad', 'guj', 'india', '327001', 0, 'shipping', '2021-04-07 14:52:04'),
(16, 7, 0, 'ahmedabad', 'ahmedabad', 'guj', 'india', '327001', 0, 'billing', '2021-04-07 14:52:04'),
(17, 7, 0, 'ban', 'banwara', 'rj', 'in', '1234', 0, 'shipping', '2021-04-07 15:08:14'),
(18, 7, 0, 'ban', 'banwara', 'rj', 'in', '1234', 0, 'billing', '2021-04-07 15:08:14'),
(19, 8, 0, 'ban', 'banswara', 'raj', 'india', '327001', 1, 'shipping', '2021-04-07 15:15:12'),
(20, 8, 0, 'ban', 'banswara', 'raj', 'india', '327001', 0, 'billing', '2021-04-07 15:15:12'),
(21, 10, 0, 'b', 'c', 'd', 'e', 'f', 1, 'shipping', '2021-04-07 16:40:45'),
(22, 10, 0, 'b', 'c', 'd', 'e', 'f', 0, 'billing', '2021-04-07 16:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `orderItemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `basePrice` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`orderItemId`, `orderId`, `productId`, `basePrice`, `quantity`, `price`, `discount`, `createdDate`) VALUES
(3, 2, 1, '0.00', 1, '200.00', '0.00', '2021-04-07 08:30:19'),
(4, 2, 3, '0.00', 3, '100.00', '10.00', '2021-04-07 08:30:19'),
(5, 3, 1, '0.00', 2, '200.00', '0.00', '2021-04-07 14:06:45'),
(6, 2, 1, '0.00', 8, '200.00', '0.00', '2021-04-07 14:13:36'),
(7, 2, 3, '0.00', 4, '100.00', '10.00', '2021-04-07 14:13:36'),
(8, 2, 5, '18.00', 2, '18.00', '2.00', '2021-04-07 14:13:36'),
(9, 5, 1, '200.00', 1, '200.00', '0.00', '2021-04-07 14:17:54'),
(10, 5, 1, '200.00', 1, '200.00', '0.00', '2021-04-07 14:41:54'),
(11, 5, 3, '100.00', 2, '100.00', '10.00', '2021-04-07 14:41:54'),
(12, 7, 1, '200.00', 1, '200.00', '0.00', '2021-04-07 14:52:05'),
(13, 7, 1, '200.00', 2, '200.00', '0.00', '2021-04-07 15:08:14'),
(14, 8, 1, '200.00', 1, '200.00', '0.00', '2021-04-07 15:15:13'),
(15, 8, 3, '100.00', 2, '100.00', '10.00', '2021-04-07 15:15:13'),
(16, 10, 1, '200.00', 1, '200.00', '0.00', '2021-04-07 16:40:45'),
(17, 10, 3, '100.00', 3, '100.00', '10.00', '2021-04-07 16:40:45');

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
(1, 'cash on delivery', 'cod', 'cod', '1', '2021-04-04 06:05:49');

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
(1, '#abc', 'panelBed', '200.00', '0.00', 1, 'abc', 1, '2014-02-21 06:02:11', '2021-04-01 15:29:51'),
(3, '#12345A', 'white rose', '100.00', '10.00', 2, 'nice', 1, '2015-02-21 02:02:49', '2021-02-22 07:46:41'),
(5, '#12345', 'xy1', '18.00', '2.00', 3, 'hrllo', 0, '2015-02-21 02:02:02', '2021-02-22 07:02:13'),
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
(101, '3', '1', '1.00', '1.00', 1, '1', 1, '2021-03-11 06:33:47', '2021-03-11 06:34:00'),
(102, 'neq', 'new', '100.00', '10.00', 1, '10', 1, '2021-03-20 11:56:11', '0000-00-00 00:00:00'),
(103, '1', '1', '1.00', '1.00', 1, '', 1, '2021-03-25 07:11:12', '0000-00-00 00:00:00'),
(104, '1', '1', '1.00', '1.00', 1, '1', 0, '2021-04-01 10:45:36', '0000-00-00 00:00:00'),
(105, 'ne', 'new', '100.00', '10.00', 1, '10', 1, '0000-00-00 00:00:00', '2021-04-01 10:46:51'),
(106, 'ne', 'new', '100.00', '10.00', 1, '10', 1, '0000-00-00 00:00:00', '2021-04-01 10:47:14'),
(107, '', '', '0.00', '0.00', 0, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, '', '', '0.00', '0.00', 0, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, '', '', '0.00', '0.00', 0, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, '', '', '0.00', '0.00', 0, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, '', '', '0.00', '0.00', 0, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, '', '', '0.00', '0.00', 0, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, '#12345', 'white rose', '100.00', '10.00', 2, 'nice', 1, '0000-00-00 00:00:00', '2021-04-01 11:01:44'),
(114, '111', 'a1', '100.00', '10.00', 1, 'a1', 1, '0000-00-00 00:00:00', '2021-04-01 11:02:32'),
(115, '11234', 'a1', '100.00', '10.00', 1, 'a1', 1, '0000-00-00 00:00:00', '2021-04-01 11:02:52'),
(116, '', '', '0.00', '0.00', 0, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, '11', 'a1', '100.00', '10.00', 1, 'a1', 1, '0000-00-00 00:00:00', '2021-04-01 14:42:18'),
(118, '1122222', 'a1', '100.00', '10.00', 1, 'a1', 1, '0000-00-00 00:00:00', '2021-04-01 14:42:30');

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
(28, 'feedback.png', '123', 1, 1, 1, 1, 1),
(120, 'Nutri.jpg', '567', 1, 1, 0, 1, 1),
(121, 'Ammonium.jpg', '', 1, 1, 0, 1, 24),
(122, '', '', 0, 0, 1, 1, 24),
(123, 'bio.jpg', '', 0, 0, 0, 1, 24),
(124, 'ROM.jpg', '', 0, 0, 0, 0, 24);

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
(1, 'Express Delivery', '#exp', '200.00', 'Express', 1, '2021-02-26 00:00:00'),
(2, 'Platinum Delivery', '#fast', '100.00', 'fast', 1, '2021-03-01 17:54:52'),
(3, 'Free Delivery', '#normal', '0.00', 'normal', 1, '2021-03-03 03:32:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `cart_address`
--
ALTER TABLE `cart_address`
  ADD PRIMARY KEY (`cartAddressId`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cartItemId`);

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
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`configId`);

--
-- Indexes for table `config_group`
--
ALTER TABLE `config_group`
  ADD PRIMARY KEY (`groupId`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`orderAddressId`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`orderItemId`);

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
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `cart_address`
--
ALTER TABLE `cart_address`
  MODIFY `cartAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `configId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `config_group`
--
ALTER TABLE `config_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `orderAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `shipmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `customer_group` (`groupId`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
