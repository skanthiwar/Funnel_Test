-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 01:05 PM
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
-- Database: `nadsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `first_name`, `last_name`, `address`) VALUES
(1, 'Sandip', 'Mahato', 'P No-16, hingna road, nagpur , MH'),
(2, 'Ashhab', 'Siddiqui', 'Q.no DM-87 sillewara nagpur MH'),
(3, 'shakti', 'gautam', 'walani nagpur '),
(4, 'rajesh', 'gupta', 'IT Park Nagpur');

-- --------------------------------------------------------

--
-- Table structure for table `member_orders`
--

CREATE TABLE `member_orders` (
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_orders`
--

INSERT INTO `member_orders` (`order_id`, `product_name`, `product_price`, `member_id`) VALUES
(1, 'Hard Disk', 4000.00, 1),
(2, 'Hard Disk Cover', 500.00, 1),
(3, 'DDR4 RAM', 1650.00, 1),
(4, 'Hard Disk', 4000.00, 2),
(5, 'Hard Disk Cover', 500.00, 2),
(6, 'DDR4 RAM', 1650.00, 2),
(7, 'Hard Disk', 4000.00, 3),
(8, 'DDR4 RAM', 1650.00, 3),
(9, 'Hard Disk', 4000.00, 4),
(10, 'Hard Disk Cover', 500.00, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_orders`
--
ALTER TABLE `member_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_orders`
--
ALTER TABLE `member_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member_orders`
--
ALTER TABLE `member_orders`
  ADD CONSTRAINT `member_orders_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
