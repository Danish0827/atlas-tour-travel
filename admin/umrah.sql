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
-- Database: `umrah`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
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
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `package_name`, `category_name`, `makkah`, `madina`, `4_in_room`, `3_in_room`, `2_in_room`) VALUES
(1, 'Package 1', 'Budget', 'LE  MERIDIEN  TOWERS', 'MUKHTARA  INTERNATIONAL', 106000, 113000, 124000),
(2, 'Package 1', 'Premium', 'AZKA AL SAFA', 'MUKHTARA INTERNATIONAL', 121000, 134000, 155000),
(3, 'Package 2', 'Premium', 'AZKA AL  SAFA', 'MUKHTARA  INTERNATIONAL', 118000, 125000, 148000),
(4, 'Package 3', 'Premium', 'AZKA AL  SAFA', 'MUKHTARA  INTERNATIONAL', 118000, 125000, 148000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`) VALUES
(1, 'Premium', '2023-01-05 07:12:37'),
(2, 'Budget', '2023-01-05 07:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `days` varchar(191) NOT NULL,
  `price` double NOT NULL,
  `dates` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `slug`, `name`, `days`, `price`, `dates`, `image`) VALUES
(1, 'Package_1', 'Package 1', '14 days', 106000, '12 DEC / 21 DEC / 26 DEC', '1.jpg'),
(2, 'Package_2', 'Package 2', '14 NIGHTS', 148000, '09 JAN / 23 JAN', '2.jpg'),
(3, 'Package_3', 'Package 3', '14 NIGHTS', 148000, '06 FEB / 20 FEB / 27 FEB', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `package_detail`
--

CREATE TABLE `package_detail` (
  `id` int(11) NOT NULL,
  `package_name` varchar(191) NOT NULL,
  `notes` text NOT NULL,
  `includes` text NOT NULL,
  `requirements` text NOT NULL,
  `tnc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_detail`
--

INSERT INTO `package_detail` (`id`, `package_name`, `notes`, `includes`, `requirements`, `tnc`) VALUES
(1, 'Package 1', '<ul>\r\n	<li>Azka Al Safa Makkah 5.0 Star Hotel Is 5 Minutes Walking Distance From Haram.</li>\r\n	<li>Le Meridian Towers 5.0 Star Hotel Operates with 24 Hrs Bus Service To/From Haram.</li>\r\n	<li>Mukhtara International 3.0 Star Hotel Is 5 Minutes Walking Distance From Haram.</li>\r\n	<li>Infant Below 2 Years Rs. 30,000.</li>\r\n	<li>Child Below 12 Years Without Bed @ Rs. 78,000.</li>\r\n	<li>Child Below 12 Years With Bed @ Rs. 6,000 Less From Adult Cost.</li>\r\n</ul>', '<p>\r\n</p>\r\n\r\n\r\n<ul>\r\n	<li>Return Airfare With Saudi Airlines.</li>\r\n	<li>14 Nights Accommodation.</li>\r\n	<li>Daily Breakfast, lunch &amp; Dinner.</li>\r\n	<li>Complimentary Umrah Kit.</li>\r\n	<li>5 Liters Zam Zam &amp;&nbsp;Inclusive Of 5% GST &amp;&nbsp;Inclusive of 5% TCS.</li>\r\n	<li>Umrah Visa With Insurance.</li>\r\n	<li>Round Trip Transportation.</li>\r\n	<li>Local Ziyarat in Makkah &amp; Madinah.</li>\r\n	<li>Unlimited Daily Laundry</li>\r\n	<li>Baggage allowance: 23 Kgs + 23 Kgs + 7 Kgs.<br />\r\n	</li>\r\n</ul>', '<ul>\r\n	<li><span>Original Passport with 6 Months Validity</span></li>\r\n	<li><span>2 Photos (4 CM X 6 CM) with White Background</span></li>\r\n	<li><span>PAN Card Copy</span></li>\r\n	<li>Rs. 35,000/- Booking Amount By Cash, Cheque, NEFT, RTGS</li>\r\n</ul>', '<ul>\r\n	<li>Any other Items / Services which are not mentioned in Package.</li>\r\n	<li>Any Increase in the Tour Cost or Airfare, difference will be taken by the Passenger.</li>\r\n	<li>All Payments Should be received 15 Days Prior to Departure Date.</li>\r\n	<li>If any change in Hotels mentioned in brochure, Similar alternative will be Provided.</li>\r\n	<li>Booking Is Non Refundable Within 25 Days of Departure</li>\r\n	<li>Tour Cost Calculated @ Rs. 22.15 = 1 SAR.</li>\r\n</ul>'),
(2, 'Package 2', '<ul>\r\n	<li>Azka Al Safa Makkah 5.0 Star Hotel Is 5 Minutes Walking Distance From Haram.</li>\r\n	<li>Le Meridian Towers 5.0 Star Hotel Operates with 24 Hrs Bus Service To/From Haram.</li>\r\n	<li>Mukhtara International 3.0 Star Hotel Is 5 Minutes Walking Distance From Haram.</li>\r\n	<li>Infant Below 2 Years Rs. 30,000.</li>\r\n	<li>Child Below 12 Years Without Bed @ Rs. 78,000.</li>\r\n	<li>Child Below 12 Years With Bed @ Rs. 6,000 Less From Adult Cost.</li>\r\n</ul>', '<p>\r\n</p>\r\n\r\n\r\n<ul>\r\n	<li>Return Airfare With Saudi Airlines.</li>\r\n	<li>14 Nights Accommodation.</li>\r\n	<li>Daily Breakfast, lunch & Dinner.</li>\r\n	<li>Complimentary Umrah Kit.</li>\r\n	<li>5 Liters Zam Zam & Inclusive Of 5% GST & Inclusive of 5% TCS.</li>\r\n	<li>Umrah Visa With Insurance.</li>\r\n	<li>Round Trip Transportation.</li>\r\n	<li>Local Ziyarat in Makkah & Madinah.</li>\r\n	<li>Unlimited Daily Laundry</li>\r\n	<li>Baggage allowance: 23 Kgs + 23 Kgs + 7 Kgs.<br />\r\n	</li>\r\n</ul>', '<ul>\r\n	<li><span>Original Passport with 6 Months Validity</span></li>\r\n	<li><span>2 Photos (4 CM X 6 CM) with White Background</span></li>\r\n	<li><span>PAN Card Copy</span></li>\r\n	<li>Rs. 35,000/- Booking Amount By Cash, Cheque, NEFT, RTGS</li>\r\n</ul>', '<ul>\r\n	<li>Any other Items / Services which are not mentioned in Package.</li>\r\n	<li>Any Increase in the Tour Cost or Airfare, difference will be taken by the Passenger.</li>\r\n	<li>All Payments Should be received 15 Days Prior to Departure Date.</li>\r\n	<li>If any change in Hotels mentioned in brochure, Similar alternative will be Provided.</li>\r\n	<li>Booking Is Non Refundable Within 25 Days of Departure</li>\r\n	<li>Tour Cost Calculated @ Rs. 22.15 = 1 SAR.</li>\r\n</ul>'),
(3, 'Package 3', '<meta charset=\"utf-8\" />\r\n<ul><li>Azka Al Safa Makkah 5.0 Star Hotel Is 5 Minutes Walking Distance From Haram.</li><li>Le Meridian Towers 5.0 Star Hotel Operates with 24 Hrs Bus Service To/From Haram.</li><li>Mukhtara International 3.0 Star Hotel Is 5 Minutes Walking Distance From Haram.</li><li>Infant Below 2 Years Rs. 30,000.</li><li>Child Below 12 Years Without Bed @ Rs. 78,000.</li><li>Child Below 12 Years With Bed @ Rs. 6,000 Less From Adult Cost.</li></ul>\r\n<br />', '<meta charset=\"utf-8\" />\r\n<ul><li>Return Airfare With Saudi Airlines.</li><li>14 Nights Accommodation.</li><li>Daily Breakfast, lunch &amp; Dinner.</li><li>Complimentary Umrah Kit.</li><li>5 Liters Zam Zam &amp;&nbsp;Inclusive Of 5% GST &amp;&nbsp;Inclusive of 5% TCS.</li><li>Umrah Visa With Insurance.</li><li>Round Trip Transportation.</li><li>Local Ziyarat in Makkah &amp; Madinah.</li><li>Unlimited Daily Laundry</li><li>Baggage allowance: 23 Kgs + 23 Kgs + 7 Kgs.</li></ul>\r\n<br />', '<meta charset=\"utf-8\" />\r\n<p 1><br /></p>\r\n<ul><li><span>Original Passport with 6 Months Validity</span></li><li><span>2 Photos (4 CM X 6 CM) with White Background</span></li><li><span>PAN Card Copy</span></li><li>Rs. 35,000/- Booking Amount By Cash, Cheque, NEFT, RTGS</li></ul>\r\n<br />', '<meta charset=\"utf-8\" />\r\n<ul><li>Any other Items / Services which are not mentioned in Package.</li><li>Any Increase in the Tour Cost or Airfare, difference will be taken by the Passenger.</li><li>All Payments Should be received 15 Days Prior to Departure Date.</li><li>If any change in Hotels mentioned in brochure, Similar alternative will be Provided.</li><li>Booking Is Non Refundable Within 25 Days of Departure</li><li>Tour Cost Calculated @ Rs. 22.15 = 1 SAR.</li></ul>\r\n<br />');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `Email` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `Password` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `usertype` varchar(90) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Password`, `usertype`) VALUES
(1, 'Safwan', 'safwanmirza.st@gmail.com', 'Safwan123', 'admin'),
(2, 'atlas', 'info@atlas.com', 'info@atlas.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_detail`
--
ALTER TABLE `package_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_detail`
--
ALTER TABLE `package_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
