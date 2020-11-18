-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 11:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `current_balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `current_balance`) VALUES
(1, 'Shreema Shetty', 'shreema@gmail.com', 100),
(2, 'Shreya Shetty', 'shreya@gmail.com', 100),
(3, 'Faiz Shaikh', 'faiz@gmail.com', 100),
(4, 'Akanksh Shetty', 'akanksh@gmail.com', 100),
(5, 'Prasad Patil', 'prasad@gmail.com', 100),
(6, 'Ashwathy Marath', 'ashwathy@gmail.com', 100),
(7, 'Prasanna Bhansode', 'prasanna@gmail.com', 100),
(8, 'Anisha Mishra', 'anisha@gmail.com', 100),
(9, 'Vedhas Kudtarkar', 'vedhas@gmail.com', 100),
(10, 'Tania Das', 'tania@gmail.com', 100);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `trans_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(30) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_name` varchar(30) NOT NULL,
  `transfer_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`trans_id`, `sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `transfer_amount`) VALUES
(1, 1, 'Shreema Shetty', 2, 'Shreya Shetty', 50),
(2, 3, 'Faiz Shaikh', 1, 'Shreema Shetty', 50),
(3, 2, 'Shreya Shetty', 3, 'Faiz Shaikh', 50),
(4, 1, 'Shreema Shetty', 8, 'Anisha Mishra', 50),
(5, 8, 'Anisha Mishra', 1, 'Shreema Shetty', 50),
(6, 8, 'Anisha Mishra', 9, 'Vedhas Kudtarkar', 100),
(7, 9, 'Vedhas Kudtarkar', 8, 'Anisha Mishra', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
