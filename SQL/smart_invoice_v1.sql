-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 05:03 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_invoice_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments_t1`
--

CREATE TABLE `assignments_t1` (
  `id` int(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_type` varchar(100) NOT NULL,
  `file_number` varchar(100) NOT NULL,
  `ass_jr` varchar(20) NOT NULL,
  `ass_catagory` varchar(100) NOT NULL,
  `ass_date` varchar(10) NOT NULL,
  `con_name` varchar(10) NOT NULL,
  `con_phone` varchar(10) NOT NULL,
  `con_fax` varchar(10) NOT NULL,
  `con_ext` varchar(1) NOT NULL,
  `con_email` varchar(30) NOT NULL,
  `con_address` varchar(100) NOT NULL,
  `ins_name` varchar(20) NOT NULL,
  `ins_number` varchar(20) NOT NULL,
  `ins_auto` varchar(20) NOT NULL,
  `ins_att` varchar(20) NOT NULL,
  `ins_email` varchar(20) NOT NULL,
  `ins_address` varchar(20) NOT NULL,
  `claimant_name` varchar(50) NOT NULL,
  `claimant_number` varchar(20) NOT NULL,
  `claimant_auto` varchar(20) NOT NULL,
  `claimant_att` varchar(50) NOT NULL,
  `claimant_email` varchar(50) NOT NULL,
  `claimant_address` varchar(50) NOT NULL,
  `loss_date` varchar(9) NOT NULL,
  `loss_time` varchar(20) NOT NULL,
  `loss_location` varchar(20) NOT NULL,
  `loss_description` varchar(100) NOT NULL,
  `sn_policenumber` varchar(18) NOT NULL,
  `sn_casenumber` varchar(20) NOT NULL,
  `sn_policelocation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments_t1`
--

INSERT INTO `assignments_t1` (`id`, `client_name`, `client_type`, `file_number`, `ass_jr`, `ass_catagory`, `ass_date`, `con_name`, `con_phone`, `con_fax`, `con_ext`, `con_email`, `con_address`, `ins_name`, `ins_number`, `ins_auto`, `ins_att`, `ins_email`, `ins_address`, `claimant_name`, `claimant_number`, `claimant_auto`, `claimant_att`, `claimant_email`, `claimant_address`, `loss_date`, `loss_time`, `loss_location`, `loss_description`, `sn_policenumber`, `sn_casenumber`, `sn_policelocation`) VALUES
(1, 'Jim', 'Bob', '123412', 'Georgia', 'Insurance Claim', '1/2/33', 'JOHNNY MOO', '', '', '', 'slumerican300@gmail.com', '6900 ROSWELL RD APT K2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Jim', 'Bob', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `uuid` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customerName`, `phone`, `addressLine1`, `addressLine2`, `city`, `state`, `country`, `uuid`) VALUES
(4, 'Muni Ayothi', '9942865203', 'No:32, Lakshmi Colony', 'T Nagar , North Cresent Road', 'Chennai', 'Tamil Nadu', 'India', '54f164e1e8665'),
(5, 'Lime Corp', '9944465203', 'No:32, New Street,', 'Usman Road,\r\nChennai -171', 'Chennai', 'Tamil Nadu', 'India', '54f496969b19c'),
(6, 'JOHNNY MOORE', '333-333-3333', '6900 ROSWELL RD APT K2', '6900 ROSWELL RD APT K2', 'ATLANTA', 'Georgia', 'Yugoslavia', '5b58a2d516b2d'),
(7, 'Ryedr', '11222982379', '6900 ROSWELL RD APT K2', '6900 ROSWELL RD APT K2', 'ATLANTA', 'Georgia', 'Australia', '5b5f0c2ea8189');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `company_file_number` varchar(100) NOT NULL,
  `your_file_number` varchar(100) NOT NULL,
  `invoice_total` varchar(45) DEFAULT NULL,
  `invoice` longtext NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `uuid` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `client_name`, `company_file_number`, `your_file_number`, `invoice_total`, `invoice`, `user_id`, `created`, `uuid`) VALUES
(1, 'Lime Corp', '123344', '2342003', '147.00', '{\"data\":{\"id\":\"1\",\"your_file_number\":\"2342003\",\"company_file_number\":\"123344\",\"clientCompanyName\":\"Lime Corp\",\"clientAddress\":\"No:32, New Street,, <br />Usman Road,<br />Chennai -171, <br />Chennai,Tamil Nadu, <br />India, <br /> 9944465203.\",\"Invoice\":{\"itemNo\":[\"1/54/2018\",\"1/23/2121\"],\"itemName\":[\"i called  bob\",\"i call sam sent mail\"],\"price\":[\"70\",\"70\"],\"quantity\":[\"1.2\",\".9\"],\"total\":[\"84.00\",\"63.00\"]},\"notes\":\"\",\"subTotal\":\"147.00\",\"tax\":\"\",\"taxAmount\":\"0\",\"totalAftertax\":\"147.00\",\"amountPaid\":\"\",\"amountDue\":\"147.00\",\"companyAddress\":\"\"},\"invoice_btn\":\"Save Invoice\"}', 8, '2018-07-26 21:01:10', '5b5a6ed6c8fad'),
(3, 'Lime Corp', '', '1/20/1251', '210.00', '{\"data\":{\"id\":\"3\",\"your_file_number\":\"1/20/1251\",\"company_file_number\":\"\",\"clientCompanyName\":\"Lime Corp\",\"clientAddress\":\"No:32, New Street,, <br />Usman Road,<br />Chennai -171, <br />Chennai,Tamil Nadu, <br />India, <br /> 9944465203.\",\"Invoice\":{\"itemNo\":[\"\",\"1/2/2018\",\"\",\"\",\"\"],\"itemName\":[\"12\",\"12\",\"\",\"\",\"\"],\"price\":[\"70\",\"\",\"\",\"\",\"\"],\"quantity\":[\"3\",\"\",\"\",\"\",\"\"],\"total\":[\"210.00\",\"\",\"\",\"\",\"\"]},\"notes\":\"\",\"subTotal\":\"210.00\",\"tax\":\"\",\"taxAmount\":\"0\",\"totalAftertax\":\"210.00\",\"amountPaid\":\"100.00\",\"amountDue\":\"110.00\",\"companyAddress\":\"\"},\"invoice_btn\":\"Save Invoice\"}', 7, '2018-07-30 08:55:37', '5b5f0ac972518'),
(5, 'Ryedr', '123344', '', '119.00', '{\"data\":{\"id\":\"5\",\"your_file_number\":\"\",\"company_file_number\":\"123344\",\"clientCompanyName\":\"Ryedr\",\"clientAddress\":\"6900 ROSWELL RD APT K2, <br />6900 ROSWELL RD APT K2, <br />ATLANTA,Georgia, <br />Australia, <br /> 11222982379.\",\"Invoice\":{\"itemNo\":[\"1/3/2712 nill\",\"1/37526 \"],\"itemName\":[\"bill to sam\",\"call to ben for asshe\"],\"price\":[\"70\",\"70\"],\"quantity\":[\"1.2\",\".5\"],\"total\":[\"84.00\",\"35.00\"]},\"notes\":\"Same was seen driving . ...a<br />f\",\"subTotal\":\"119.00\",\"tax\":\"\",\"taxAmount\":\"0\",\"totalAftertax\":\"119.00\",\"amountPaid\":\"\",\"amountDue\":\"119.00\",\"companyAddress\":\"\"},\"invoice_btn\":\"Save Invoice\"}', 5, '2018-07-31 20:09:51', '5b60fa4f6d707'),
(6, 'Ryedr', '1-2--3321', '2342003', '910.00', '{\"data\":{\"id\":\"6\",\"your_file_number\":\"2342003\",\"company_file_number\":\"1-2--3321\",\"clientCompanyName\":\"Ryedr\",\"clientAddress\":\"6900 ROSWELL RD APT K2, <br />6900 ROSWELL RD APT K2, <br />ATLANTA,Georgia, <br />Australia, <br /> 11222982379.\",\"Invoice\":{\"itemNo\":[\"1/2/1213\"],\"itemName\":[\"called\"],\"price\":[\"70\"],\"quantity\":[\"13\"],\"total\":[\"910.00\"]},\"notes\":\"\",\"subTotal\":\"910.00\",\"tax\":\"\",\"taxAmount\":\"0\",\"totalAftertax\":\"910.00\",\"amountPaid\":\"100\",\"amountDue\":\"810.00\",\"companyAddress\":\"\"},\"invoice_btn\":\"Save Invoice\"}', 5, '2018-08-02 10:40:56', '5b6317f8b515b');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productCode` varchar(15) NOT NULL,
  `productName` varchar(70) NOT NULL,
  `productDescription` text NOT NULL,
  `quantityInStock` smallint(6) NOT NULL,
  `buyPrice` double NOT NULL,
  `mrp` double NOT NULL,
  `uuid` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `meta_key` varchar(100) NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `meta_key`, `meta_value`) VALUES
(43, 'companyLogo', 'smart-invoice.png'),
(52, 'companyLogo', 'logo.png'),
(67, 'companyLogo', 'html_logo.png'),
(78, 'companyLogo', 'meteor_logo.png'),
(79, 'companyName', 'Claims Advantage'),
(80, 'address', '1513 Panther Creek Court'),
(81, 'phone', '9942865203'),
(82, 'contactEmail', 'muni@smarttutorials.net'),
(83, 'currency', '?'),
(84, 'companyLogo', 'angular_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tasks_board`
--

CREATE TABLE `tasks_board` (
  `id` int(11) NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `employee` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks_board`
--

INSERT INTO `tasks_board` (`id`, `date`, `deadline`, `description`, `employee`) VALUES
(1, '2018-07-13', '1/23/2-18', 'Call Ryder to Adrees the new asswigments,', 'Me');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `social_id` varchar(45) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `uuid` varchar(70) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `social_id`, `picture`, `gender`, `created`, `updated`, `uuid`, `status`) VALUES
(1, 'muni', NULL, 'muni2explore@gmail.com', 'd05207c137a4efa4dd33779d954446bfee42fa6b', NULL, NULL, NULL, '2015-02-04 00:16:33', '2015-02-04 00:16:33', '54d11789-2c88-42e2-a2de-08888d8ed5d3', NULL),
(2, 'Muni', NULL, 'muni2elvis@gmail.com', NULL, '987673737911408', 'https://graph.facebook.com/987673737911408/picture?width=100', NULL, '2015-02-04 11:46:11', '2015-02-04 11:46:12', '54d1b92b-4f1c-425b-a219-0e2c8d8ed5d3', NULL),
(4, 'muni', 'ayothi', 'muni@smart.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, '2015-02-27 16:04:35', NULL, '54f10613ac4c2', NULL),
(5, 'JOHNNY', 'MOORE', 'slumerican300@gmail.com', '4780c6342161aeaab3629660a90764c8', NULL, NULL, NULL, '2018-07-23 19:08:03', NULL, '5b565fd325e27', NULL),
(6, 'Anthony', 'Cerrito', 'slumerican3000@gmail.com', '4780c6342161aeaab3629660a90764c8', NULL, NULL, NULL, '2018-07-24 15:46:40', NULL, '5b57822012639', NULL),
(7, 'James', 'Barbieri', 'jbarbieri@claimsadvantage.com', 'f4b2eb7610276b0c4b52c980fa5b4e7f', NULL, NULL, NULL, '2018-07-25 12:08:48', NULL, '5b58a09091654', NULL),
(8, 'alyssa', 'moore', 'slumerican30000@gmail.com', '4780c6342161aeaab3629660a90764c8', NULL, NULL, NULL, '2018-07-26 20:59:03', NULL, '5b5a6e5755164', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments_t1`
--
ALTER TABLE `assignments_t1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoices_users_idx` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meta_key` (`meta_key`);

--
-- Indexes for table `tasks_board`
--
ALTER TABLE `tasks_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_idx` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments_t1`
--
ALTER TABLE `assignments_t1`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tasks_board`
--
ALTER TABLE `tasks_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_invoices_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
