-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2023 at 12:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hajj`
--

-- --------------------------------------------------------

--
-- Table structure for table `hajj_categories`
--

CREATE TABLE `hajj_categories` (
  `id` int(11) NOT NULL,
  `package_name` varchar(191) NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `makkah` varchar(191) NOT NULL,
  `madina` varchar(191) NOT NULL,
  `4_in_room` double NOT NULL,
  `3_in_room` double NOT NULL,
  `2_in_room` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hajj_categories`
--

INSERT INTO `hajj_categories` (`id`, `package_name`, `category_name`, `makkah`, `madina`, `4_in_room`, `3_in_room`, `2_in_room`) VALUES
(1, 'Hajj Package 1', 'Premium', 'AZKA AL  SAFA', 'MUKHTARA  INTERNATIONAL', 106000, 11300, 106000),
(2, 'Hajj Package 1', 'Budget', 'AZKA AL  SAFA', 'MUKHTARA  INTERNATIONAL', 106000, 113000, 124000),
(3, 'Hajj Package 2', 'Premium', 'AZKA AL  SAFA', 'MUKHTARA  INTERNATIONAL', 106000, 113000, 124000),
(5, 'Hajj Package 3', 'Premium', 'AZKA AL  SAFA', 'MUKHTARA  INTERNATIONAL', 106000, 113000, 124000);

-- --------------------------------------------------------

--
-- Table structure for table `hajj_category`
--

CREATE TABLE `hajj_category` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hajj_category`
--

INSERT INTO `hajj_category` (`id`, `name`, `created_at`) VALUES
(1, 'Premium', '2023-01-05 13:48:16'),
(2, 'Budget', '2023-01-05 13:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `hajj_package`
--

CREATE TABLE `hajj_package` (
  `id` int(11) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `days` varchar(191) NOT NULL,
  `price` double NOT NULL,
  `dates` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hajj_package`
--

INSERT INTO `hajj_package` (`id`, `slug`, `name`, `days`, `price`, `dates`, `image`) VALUES
(1, 'Hajj_Package_1', 'Hajj Package 1', '14 NIGHTS', 106000, '12 DEC / 21 DEC / 26 DEC', '1.jpg'),
(2, 'Hajj_Package_2', 'Hajj Package 2', '14 NIGHTS', 148000, '09 JAN / 23 JAN', '2.jpg'),
(3, 'Hajj_Package_3', 'Hajj Package 3', '14 NIGHTS', 148000, '06 FEB / 20 FEB / 27 FEB', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hajj_package_detail`
--

CREATE TABLE `hajj_package_detail` (
  `id` int(11) NOT NULL,
  `package_name` varchar(191) NOT NULL,
  `notes` text NOT NULL,
  `includes` text NOT NULL,
  `requirements` text NOT NULL,
  `tnc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hajj_package_detail`
--

INSERT INTO `hajj_package_detail` (`id`, `package_name`, `notes`, `includes`, `requirements`, `tnc`) VALUES
(2, 'Hajj Package 1', '<p>sadsadads</p>', '<p>asdasdsad</p>', '<p>dasdasdasd</p>', '<p>sas</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hajj_categories`
--
ALTER TABLE `hajj_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hajj_category`
--
ALTER TABLE `hajj_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hajj_package`
--
ALTER TABLE `hajj_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hajj_package_detail`
--
ALTER TABLE `hajj_package_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hajj_categories`
--
ALTER TABLE `hajj_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hajj_category`
--
ALTER TABLE `hajj_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hajj_package`
--
ALTER TABLE `hajj_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hajj_package_detail`
--
ALTER TABLE `hajj_package_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
