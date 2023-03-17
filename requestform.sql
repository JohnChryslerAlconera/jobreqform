-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 04:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `requestform`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(225) NOT NULL,
  `form_id` varchar(255) NOT NULL,
  `req_name` varchar(225) NOT NULL,
  `req_dept` varchar(225) NOT NULL,
  `employee_id` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `dept_head_fullname` varchar(225) NOT NULL,
  `division` varchar(255) DEFAULT NULL,
  `position` varchar(225) NOT NULL,
  `euser_fullname` varchar(255) NOT NULL,
  `equip_type` varchar(225) NOT NULL,
  `equip_num` varchar(225) NOT NULL,
  `equip_issues` varchar(225) NOT NULL,
  `required_services` varchar(225) NOT NULL,
  `date_added` datetime NOT NULL,
  `changed_status_by` varchar(225) DEFAULT NULL,
  `form_status` varchar(225) NOT NULL DEFAULT 'pending',
  `reason` longtext NOT NULL DEFAULT 'Waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(225) DEFAULT NULL,
  `lastname` varchar(225) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `suffix` varchar(225) DEFAULT NULL,
  `employee_id` varchar(225) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `department` varchar(225) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `dept_head_fullname` varchar(225) DEFAULT NULL,
  `position` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `access` varchar(225) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `middlename`, `suffix`, `employee_id`, `contact`, `department`, `division`, `dept_head_fullname`, `position`, `password`, `access`) VALUES
(82, 'Admin', 'Admin', '', '', '1111', NULL, NULL, NULL, NULL, NULL, '$2y$10$W.ho.g065e3OnKynp./SVutxQUOGc9aO5uwrXd4PBqVDJP0a8pgSi', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
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
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
