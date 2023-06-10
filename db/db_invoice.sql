-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2018 at 09:24 AM
-- Server version: 10.2.16-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roommatebd_invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `phone`, `username`, `email`, `password`, `role`, `status`, `image`) VALUES
(1, 'Admin', '01819081185', 'admin', 'admin@example.com', '$2y$10$B0LReoTW.pIUw7IW4EmYDew.3PD1u1Ilnsne..KIZo5S57akk3iyW', 'admin', 1, 'image/61433ba806da5019e71990612c32cff0.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `business` varchar(155) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `name`, `email`, `phone`, `business`, `address1`, `address2`, `country`, `zip_code`) VALUES
(1, 'Mr. X', 'kalyan@yahoo.com', '01712440471', 'IT Business', 'Chittagong, Bangladesh', '', 'Bangladesh', '4217');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_no` varchar(155) NOT NULL,
  `date` date NOT NULL,
  `subtotal` double(18,3) NOT NULL,
  `vat` double(18,3) NOT NULL,
  `total` double(18,3) NOT NULL,
  `total_paid` double(18,3) NOT NULL,
  `total_due` double(18,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `client_id`, `invoice_no`, `date`, `subtotal`, `vat`, `total`, `total_paid`, `total_due`) VALUES
(8, 1, '17148', '2018-09-19', 500000.000, 10.000, 550000.000, 750000.000, -200000.000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_item`
--

CREATE TABLE `tbl_invoice_item` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` double(18,3) NOT NULL,
  `qty` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_invoice_item`
--

INSERT INTO `tbl_invoice_item` (`id`, `item_id`, `description`, `price`, `qty`, `invoice_id`) VALUES
(11, 1, '', 50000.000, 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `price` double(18,3) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `name`, `price`, `description`) VALUES
(1, 'Laptop', 50000.000, 'Dell Laptop'),
(2, 'Mouse', 890.000, 'Logitech Mouse');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `logo` varchar(155) NOT NULL,
  `currency` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `name`, `email`, `address`, `phone`, `logo`, `currency`) VALUES
(1, 'Synchronise IT', 'info@synchronisebd.com', 'GEC, Chittagong', '01712440471', 'image/db18e797f04dab17bea71b3d3c8bf3e4.png', '$');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice_item`
--
ALTER TABLE `tbl_invoice_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_invoice_item`
--
ALTER TABLE `tbl_invoice_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
