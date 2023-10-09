-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 09, 2023 at 05:58 AM
-- Server version: 10.5.21-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sagartech_atlas_haj`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hajj_package_detail`
--

INSERT INTO `hajj_package_detail` (`id`, `package_name`, `notes`, `includes`, `requirements`, `tnc`) VALUES
(2, 'Hajj Package 1', '<ul>\r\n	<li>Azka Al Safa Makkah 5.0 Star Hotel Is 5 Minutes Walking Distance From Haram.</li>\r\n	<li>Le Meridian Towers 5.0 Star Hotel Operates with 24 Hrs Bus Service To/From Haram.</li>\r\n	<li>Mukhtara International 3.0 Star Hotel Is 5 Minutes Walking Distance From Haram.</li>\r\n	<li>Infant Below 2 Years Rs. 30,000.</li>\r\n	<li>Child Below 12 Years Without Bed @ Rs. 78,000.</li>\r\n	<li>Child Below 12 Years With Bed @ Rs. 6,000 Less From Adult Cost.</li>\r\n</ul>', '<p>\r\n</p>\r\n\r\n\r\n<ul>\r\n	<li>Return Airfare With Saudi Airlines.</li>\r\n	<li>14 Nights Accommodation.</li>\r\n	<li>Daily Breakfast, lunch &amp; Dinner.</li>\r\n	<li>Complimentary Umrah Kit.</li>\r\n	<li>5 Liters Zam Zam &amp;&nbsp;Inclusive Of 5% GST &amp;&nbsp;Inclusive of 5% TCS.</li>\r\n	<li>Umrah Visa With Insurance.</li>\r\n	<li>Round Trip Transportation.</li>\r\n	<li>Local Ziyarat in Makkah &amp; Madinah.</li>\r\n	<li>Unlimited Daily Laundry</li>\r\n	<li>Baggage allowance: 23 Kgs + 23 Kgs + 7 Kgs.<br />\r\n	</li>\r\n</ul>', '<ul>\r\n	<li><span>Original Passport with 6 Months Validity</span></li>\r\n	<li><span>2 Photos (4 CM X 6 CM) with White Background</span></li>\r\n	<li><span>PAN Card Copy</span></li>\r\n	<li>Rs. 35,000/- Booking Amount By Cash, Cheque, NEFT, RTGS</li></ul>', '<ul>\r\n	<li>Any other Items / Services which are not mentioned in Package.</li>\r\n	<li>Any Increase in the Tour Cost or Airfare, difference will be taken by the Passenger.</li>\r\n	<li>All Payments Should be received 15 Days Prior to Departure Date.</li>\r\n	<li>If any change in Hotels mentioned in brochure, Similar alternative will be Provided.</li>\r\n	<li>Booking Is Non Refundable Within 25 Days of Departure</li>\r\n	<li>Tour Cost Calculated @ Rs. 22.15 = 1 SAR.</li>\r\n</ul>');

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
