-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 12:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lushpetals`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `NoPhone` varchar(25) NOT NULL,
  `role` varchar(25) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `Name`, `Email`, `password`, `NoPhone`, `role`, `image`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', '0123456783', 'admin', NULL),
(3, 'Amira', 'ami@gmail.com', 'zxc123', '0165543242', 'User', 'images/person_4.jpg'),
(7, 'haha', 'haha@gmail.com', 'qqq111', '0125643456', 'User', NULL),
(14, 'Hafiz', 'Hafiz@gmail.com', 'Hafiz_000', '0198876543', 'User', NULL),
(15, 'Mira', 'amiRA@gmail.com', 'Amira_2009', '0176654345', 'User', NULL),
(16, 'Syamil', 'syamil@gmail.com', 'Syamil_30', '0137656585', 'User', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `ProductName` varchar(25) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `deliveryStatus` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `SubscriptionType` varchar(255) DEFAULT NULL,
  `ServiceType` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `AccountID`, `ProductID`, `ProductName`, `quantity`, `price`, `deliveryStatus`, `date`, `SubscriptionType`, `ServiceType`, `image`) VALUES
(164, 3, 3, 'Marilyn Pink Carnation Bo', 3, 135, NULL, '2024-01-14', 'Premium', 'flowerb', 'b3.jpg'),
(165, 3, 3, 'Marilyn Pink Carnation Bo', 3, 135, NULL, '2024-01-14', 'Premium', 'flowerb', 'b3.jpg'),
(167, 3, 8, 'Naomi Pink Gerbera Bouque', 2, 135, NULL, '2024-01-15', 'Premium', 'flowerb', 'b8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) UNSIGNED NOT NULL,
  `ProductName` varchar(25) NOT NULL,
  `Price` float NOT NULL,
  `ServiceType` varchar(25) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Price`, `ServiceType`, `image`, `quantity`) VALUES
(1, 'Sweet Roses', 167, 'flowerb', 'b1.jpg', 1),
(2, 'Casabella Pink Hydrangea', 229, 'flowerb', 'b2.jpg', 1),
(3, 'Marilyn Pink Carnation Bo', 135, 'flowerb', 'b3.jpg', 1),
(4, 'Annabeth Pink Lily Bouque', 159, 'flowerb', 'b4.jpg', 1),
(5, 'Maryane Red Carnation Bou', 165, 'flowerb', 'b5.jpg', 1),
(6, 'Constance', 249, 'flowerb', 'b6.jpg', 1),
(7, 'Freye Gerbera Bouquet', 169, 'flowerb', 'b7.jpg', 1),
(8, 'Naomi Pink Gerbera Bouque', 135, 'flowerb', 'b8.jpg', 1),
(9, 'Diana', 200, 'flowerb', 'b9.jpg', 1),
(10, 'Pastel Candy Helium Ballo', 199, 'SurpriseDelivery', 's1.jpg', 1),
(11, 'Rose Gold Helium Birthday', 189, 'SurpriseDelivery', 's2.jpg', 1),
(12, ' Vespa Mint Helium Party ', 189, 'SurpriseDelivery', 's3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `SubscriptionID` int(10) UNSIGNED NOT NULL,
  `SubscriptionType` varchar(100) NOT NULL,
  `AccountID` int(10) UNSIGNED DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`SubscriptionID`, `SubscriptionType`, `AccountID`, `Email`, `status`) VALUES
(91, 'Premium', 14, 'Hafiz@gmail.com', 'Active'),
(135, 'Premium', 7, 'haha@gmail.com', 'Active'),
(345, 'Standard', 3, 'ami@gmail.com', 'Unsubscribe'),
(422, 'Premium', 3, '', 'Active'),
(452, 'Premium', 3, '', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`SubscriptionID`),
  ADD KEY `AccountID` (`AccountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `SubscriptionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
