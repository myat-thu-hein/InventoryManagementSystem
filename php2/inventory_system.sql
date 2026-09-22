-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2025 at 04:18 PM
-- Server version: 11.2.6-MariaDB
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `quantity`) VALUES
(2, 'Smartphone', 800.00, 25),
(3, 'Headphones', 150.00, 30),
(4, 'Monitor', 350.00, 10),
(10, 'Laptop', 1200.00, 14),
(11, 'Keyboard', 75.00, 35),
(12, 'Tablet', 600.00, 20),
(14, 'Bluetooth Speaker', 120.00, 25),
(15, 'Wireless Mouse', 50.00, 50),
(16, 'Webcam', 90.00, 22),
(20, 'VR Headset	', 450.00, 8),
(21, 'Smartwatch', 200.00, 18),
(24, 'Banana', 10.00, 30);

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id` int(11) NOT NULL,
  `type` enum('ADD','REMOVE') NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id`, `type`, `item_id`, `item_name`, `item_price`, `item_quantity`, `position`, `timestamp`) VALUES
(1, 'REMOVE', 5, 'Keyboard', 80.00, 40, 4, '2025-04-21 03:07:04'),
(3, 'ADD', 7, 'Kyaw Hein', 5.00, 10, -1, '2025-04-21 03:11:38'),
(7, 'REMOVE', 7, 'Kyaw Hein', 5.00, 13, 3, '2025-04-21 12:52:52'),
(8, 'ADD', 11, 'Keyboard', 75.00, 35, -1, '2025-04-22 11:37:36'),
(9, 'ADD', 12, 'Tablet', 600.00, 20, -1, '2025-04-22 11:38:03'),
(10, 'ADD', 13, 'Smartwatch', 200.00, 18, -1, '2025-04-22 11:38:20'),
(11, 'ADD', 14, 'Bluetooth Speaker', 120.00, 25, -1, '2025-04-22 11:38:44'),
(12, 'ADD', 15, 'Wireless Mouse', 50.00, 50, -1, '2025-04-22 11:39:00'),
(13, 'ADD', 16, 'Webcam', 90.00, 22, -1, '2025-04-22 11:40:06'),
(21, 'REMOVE', 23, 'Kyaw Hein', 5.00, 10, 11, '2025-04-23 13:51:08'),
(22, 'ADD', 24, 'Banana', 10.00, 10, -1, '2025-04-23 13:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `type` enum('RESTOCK','ORDER') NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('PENDING','PROCESSED') DEFAULT 'PENDING',
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `type`, `item_name`, `quantity`, `status`, `timestamp`) VALUES
(1, 'RESTOCK', 'Kyaw Hein', 9, 'PROCESSED', '2025-04-21 03:10:31'),
(2, 'RESTOCK', 'Kyaw Hein', 8, 'PROCESSED', '2025-04-21 03:11:50'),
(3, 'ORDER', 'Kyaw Hein', 5, 'PROCESSED', '2025-04-21 03:12:32'),
(4, 'RESTOCK', 'Laptop', 5, 'PROCESSED', '2025-04-21 03:13:41'),
(5, 'ORDER', 'Laptop', 6, 'PROCESSED', '2025-04-21 03:13:57'),
(6, 'RESTOCK', 'Hugo', 5, 'PROCESSED', '2025-04-21 12:51:31'),
(7, 'ORDER', 'Hugo ', 5, 'PROCESSED', '2025-04-21 12:52:03'),
(8, 'RESTOCK', 'Kyaw Hein', 8, 'PROCESSED', '2025-04-22 15:05:15'),
(9, 'RESTOCK', 'Banana', 9, 'PROCESSED', '2025-04-23 13:49:42'),
(10, 'RESTOCK', 'Banana', 10, 'PROCESSED', '2025-04-23 13:50:10'),
(11, 'RESTOCK', 'Banana', 5, 'PROCESSED', '2025-04-23 13:50:36'),
(12, 'RESTOCK', ' Banana', 10, 'PROCESSED', '2025-04-23 13:51:34'),
(13, 'RESTOCK', 'Banana', 10, 'PROCESSED', '2025-04-23 13:51:55'),
(14, 'RESTOCK', 'Banana', 20, 'PROCESSED', '2025-04-23 13:52:21'),
(15, 'ORDER', 'Banana', 10, 'PROCESSED', '2025-04-23 13:56:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
