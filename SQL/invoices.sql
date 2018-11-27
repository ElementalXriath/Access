-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 04:49 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoices_users_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
