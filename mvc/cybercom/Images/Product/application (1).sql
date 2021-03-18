-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 08:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` int(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipcode`, `country`, `type`) VALUES
(1, 1, '73SHKTI SHYAM NAGAR SOCIETY JUNAGADHROAD', 'VISAVADER', 'Goa', 362130, 'India', 'Billing'),
(3, 1, '', '', '', 0, '', 'Shipping'),
(4, 0, '', '', '', 0, '', 'Billing'),
(5, 0, '', '', '', 0, '', 'Billing'),
(6, 0, '', '', '', 0, '', 'Billing'),
(7, 0, '', '', '', 0, '', 'Shipping'),
(8, 0, '302,Shivam Avenue Near Madhav Mall RatnabaRoad Thakkarnagar Ahmedabad', 'Ahmedabad', 'Gujarat', 382350, 'India', 'Billing'),
(9, 0, '302,Shivam Avenue Near Madhav Mall RatnabaRoad Thakkarnagar Ahmedabad', 'Ahmedabad', 'Gujarat', 382350, 'India', 'Shipping'),
(10, 4, '', '', '', 0, '', 'Billing'),
(11, 4, '', '', '', 0, '', 'Shipping'),
(12, 6, '', '', '', 0, '', 'Billing'),
(13, 6, '', '', '', 0, '', 'Shipping'),
(14, 4, '', '', '', 0, '', 'Billing'),
(15, 4, '', '', '', 0, '', 'Shipping'),
(16, 0, '', '', '', 0, '', 'Billing'),
(17, 0, '', '', '', 0, '', 'Shipping');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Enable',
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `status`, `createdDate`) VALUES
(2, 'Ravi.savaliya', '32250170a0dca92d53ec9624f336ca24', 'Enable', '2021-03-10 10:34:00'),
(4, '', '', 'Enable', '0000-00-00 00:00:00'),
(5, 'jalpa', 'bha@111', 'Disable', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` enum('Product','Category') NOT NULL,
  `name` varchar(25) NOT NULL,
  `code` int(20) NOT NULL,
  `inputType` varchar(60) NOT NULL,
  `backendType` varchar(60) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(1, 'Product', 'color', 12, 'text', 'varchar', 1, 'hello'),
(2, 'Product', '', 0, 'text', 'varchar', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(1, 'blue', 1, 1),
(2, 'green', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `pathId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentId`, `name`, `status`, `description`, `pathId`) VALUES
(1, 0, 'Bedroom', 'Enable', '', '1'),
(3, 1, 'Panelbed', 'Enable', '', '1/3'),
(4, 3, 'header', 'Enable', '', '1/4'),
(5, 1, 'footer', 'Enable', '', '1/5'),
(6, 0, 'Livingroom', 'Enable', '', '6'),
(7, 6, 'Bed', 'Enable', '', '6/7'),
(8, 6, 'Table', 'Enable', '', '6/8'),
(9, 1, 'Bed', 'Enable', '', '1/9');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `pageId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `indentifier` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`pageId`, `title`, `indentifier`, `content`, `status`, `createdDate`) VALUES
(2, 'Php', '452', '<p><a href=\"tel:8238751325\"><strong><em>echo</em></strong></a></p>', 1, '2021-03-08 13:34:11'),
(7, 'php', 'gello', '<p>hello, Bhargavi<a href=\"mailto:bhargaveep@gmail.com?subject=Helllo%20&amp;body=php\">Bhargavii</a></p>', 1, '2021-03-15 11:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `customergroup`
--

CREATE TABLE `customergroup` (
  `groupId` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customergroup`
--

INSERT INTO `customergroup` (`groupId`, `groupName`, `status`, `createdDate`) VALUES
(1, 'Retail', 'Enable', '2021-03-10 20:26:46'),
(2, 'Wholesale', 'Enable', '2021-03-10 22:53:44'),
(5, 'Group 3', 'Enable', '2021-03-11 22:19:32'),
(6, 'Group  4', 'Enable', '2021-03-11 22:19:35'),
(8, 'General', 'Enable', '2021-03-12 20:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `groupId` int(11) DEFAULT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `mobilenu` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(7) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `groupId`, `firstname`, `lastname`, `mobilenu`, `email`, `password`, `status`, `createdDate`, `updatedDate`) VALUES
(4, 2, 'bhargavi', 'prajapati', '08238751325', 'bhargaveep@gmail.com', '202cb962ac59075b964b07152d234b70', 'Disable', '2021-03-15 10:17:01', '2021-03-16 11:37:46'),
(5, 5, 'mansi', 'prajapati', '4332434', 'piya@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'Disable', '2021-03-15 10:17:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `methodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(700) NOT NULL,
  `status` varchar(15) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`methodId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(1, 'Bhargavi', '015078', 'Smart Watches', 'Disable', '2021-02-18 12:13:07'),
(2, 'Ravi Patel', '01578', 'Mobile Phone', 'Enable', '2021-02-24 10:17:49'),
(8, 'Aryan Kanani', '78458', 'Suitcase', 'Disable', '2021-03-10 23:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(50) NOT NULL,
  `discount` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`) VALUES
(14, '9', 'Laptop', 120000, 1200, 3, 'Dell,Lenovo,Hp,Asus', 'Disable', '2021-02-19 07:01:00', '2021-03-15 06:24:29'),
(55, '200', 'Footwear', 1200, 120, 10, 'Nike, Adidas,Puma', 'Enable', '2021-03-09 19:26:26', '2021-03-11 01:09:28'),
(57, '10', 'NoteBook', 750, 120, 6, 'amzon ', 'Enable', '2021-03-10 10:30:31', '2021-03-10 04:53:16'),
(60, '10', 'teddy bear', 20, 10, 2, 'TV', 'Disable', '2021-03-15 18:24:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `productmedia`
--

CREATE TABLE `productmedia` (
  `imageId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `small` tinyint(1) NOT NULL,
  `thumb` tinyint(1) NOT NULL,
  `base` tinyint(1) NOT NULL,
  `gallary` tinyint(1) NOT NULL,
  `productId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productmedia`
--

INSERT INTO `productmedia` (`imageId`, `image`, `label`, `small`, `thumb`, `base`, `gallary`, `productId`) VALUES
(4, 'MSD.jpg', 'MSD', 1, 1, 0, 1, 14),
(7, 'model1.jpg', 'HATTT', 0, 0, 1, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(1, 14, 1, '1400'),
(2, 14, 2, '950'),
(3, 14, 6, '1100'),
(4, 14, 7, '900'),
(5, 55, 1, '950'),
(6, 55, 2, '600'),
(7, 55, 5, '750'),
(8, 55, 7, '0'),
(9, 14, 5, '9500'),
(10, 55, 6, '1100'),
(11, 55, 8, '450'),
(12, 0, 0, '1400'),
(13, 0, 0, '950'),
(14, 0, 0, '1100'),
(15, 0, 0, '9500'),
(16, 14, 8, '0'),
(17, 0, 0, '1400'),
(18, 0, 0, '950'),
(19, 0, 0, '1100'),
(20, 0, 0, '9500'),
(21, 0, 0, '0'),
(22, 57, 1, '1200'),
(23, 57, 2, '1200'),
(24, 57, 5, '1200'),
(25, 57, 6, '1200'),
(26, 57, 8, '1200'),
(27, 0, 0, '1200'),
(28, 0, 0, '1200'),
(29, 0, 0, '1200'),
(30, 0, 0, '1200'),
(31, 0, 0, '1200'),
(32, 0, 0, '1200'),
(33, 0, 0, '1200'),
(34, 0, 0, '1200'),
(35, 0, 0, '0'),
(36, 0, 0, '0'),
(37, 0, 0, '1200'),
(38, 0, 0, '1200'),
(39, 0, 0, '1200'),
(40, 0, 0, '1200'),
(41, 0, 0, '1200'),
(42, 0, 0, '1200'),
(43, 0, 0, '1200'),
(44, 0, 0, '1200'),
(45, 0, 0, '1200'),
(46, 0, 0, '1200'),
(47, 0, 0, '1200'),
(48, 0, 0, '1200'),
(49, 0, 0, '1200'),
(50, 0, 0, '1200'),
(51, 0, 0, '1200'),
(52, 0, 0, '1200'),
(53, 0, 0, '1200'),
(54, 0, 0, '1200'),
(55, 0, 0, '1200'),
(56, 0, 0, '1200'),
(57, 0, 0, '1200'),
(58, 0, 0, '1200'),
(59, 0, 0, '1200'),
(60, 0, 0, '1200'),
(61, 0, 0, '1200');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `methodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`methodId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(1, 'Rons', 15078, 40000, 'Smart Watches', 'Enable', '2021-02-17 11:37:35'),
(2, 'bhargavi', 15748, 54200, 'Laptop', 'Disable', '2021-02-17 11:48:19'),
(4, 'Ravi', 882703, 54200, 'Mobile Phone', 'Enable', '2021-02-18 10:19:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressId`);

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `indentifier` (`indentifier`);

--
-- Indexes for table `customergroup`
--
ALTER TABLE `customergroup`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `productmedia`
--
ALTER TABLE `productmedia`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`methodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customergroup`
--
ALTER TABLE `customergroup`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `productmedia`
--
ALTER TABLE `productmedia`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `customergroup` (`groupId`) ON DELETE CASCADE ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
