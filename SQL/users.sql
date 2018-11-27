-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 04:52 PM
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_idx` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
