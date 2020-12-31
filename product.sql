-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 02:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--
CREATE DATABASE IF NOT EXISTS `product` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `product`;

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `id` int(11) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `destination` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL,
  `orderMin` int(5) NOT NULL,
  `level` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`id`, `alias`, `product_id`, `name`, `destination`, `type`, `stock`, `orderMin`, `level`) VALUES
(1, 'Fitt', 1, '212-46467-0003A01', 'SCB ', 'FPS', 979, 10, '7'),
(2, 'GGGG', 1, '212-46467-0003A044', 'SCB ', 'FPS', 424, 10, '7');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `watch` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `visible` int(11) NOT NULL,
  `actual_start` date DEFAULT NULL,
  `actual_finish` date DEFAULT NULL,
  `done` int(11) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `component_id`, `quantity`, `start_date`, `end_date`, `status`, `visible`, `actual_start`, `actual_finish`, `done`, `level`) VALUES
(30, 1, 3, '2020-12-29', '2021-01-07', 'finish', 1, '2020-12-31', '2020-12-31', 0, '5'),
(47, 1, 10, '2020-12-26', '2021-01-18', 'on-progress', 1, '2020-12-31', NULL, 1, '7'),
(48, 1, 10, '2020-12-31', '2021-01-12', 'waiting', 1, NULL, NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_to_fabrication`
--

CREATE TABLE `orders_to_fabrication` (
  `id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `visible` int(11) NOT NULL,
  `done` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_to_fabrication`
--

INSERT INTO `orders_to_fabrication` (`id`, `component_id`, `quantity`, `status`, `visible`, `done`) VALUES
(27, 2, 100, 'finish', 0, 0),
(28, 2, 2, 'waiting', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`) VALUES
(1, 'Aileron'),
(2, 'Rudder'),
(3, 'Elevator');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'store', 'store', '8cd892b7b97ef9489ae4479d3f4ef0fc', 'store'),
(2, 'assembly', 'assembly', '08d5f9e9048e2000531c3170f4b833b1', 'assembly'),
(3, 'fabrication', 'fabrication', '3d4e3103ddc7b9de516d68b37ad39f1d', 'fabrication');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_to_fabrication`
--
ALTER TABLE `orders_to_fabrication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `orders_to_fabrication`
--
ALTER TABLE `orders_to_fabrication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
