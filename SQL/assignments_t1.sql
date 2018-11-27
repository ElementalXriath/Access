-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 04:46 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments_t1`
--
ALTER TABLE `assignments_t1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments_t1`
--
ALTER TABLE `assignments_t1`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
