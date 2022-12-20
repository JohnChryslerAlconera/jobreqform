-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221213.9e31295234
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 04:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

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
  `req_name` varchar(225) NOT NULL,
  `req_dept` varchar(225) NOT NULL,
  `dept_acc_id` varchar(225) NOT NULL,
  `contact` varchar(225) NOT NULL,
  `dept_head_fullname` varchar(225) NOT NULL,
  `position` varchar(225) NOT NULL,
  `euser_fullname` varchar(255) NOT NULL,
  `equip_type` varchar(225) NOT NULL,
  `equip_num` varchar(225) NOT NULL,
  `equip_issues` varchar(225) NOT NULL,
  `required_services` varchar(225) NOT NULL,
  `date_added` datetime NOT NULL,
  `changed_status_by` varchar(225) DEFAULT NULL,
  `form_status` varchar(225) NOT NULL DEFAULT 'pending',
  `reason` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `account_id` varchar(225) NOT NULL,
  `contact` int(11) NOT NULL,
  `department` varchar(225) NOT NULL,
  `dept_head_fullname` varchar(225) NOT NULL,
  `position` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `access` varchar(225) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `account_id`, `contact`, `department`, `dept_head_fullname`, `position`, `password`, `access`) VALUES
(39, 'joshua', 'dionio', '1234', 124, 'agri', 'kaira pamoceno', 'clerk', '$2y$10$lADSJVi0pc3/O.lC5BdZjeta1rm7mJZK833wkGkosAcNvEHXbuhoK', 'user'),
(40, 'awd', 'awd', '5555', 0, 'awdwad', 'adad ad', 'awd', '$2y$10$n.Qoq0aUNBDKo/yVHNik..FGj6QCcRCOgpZcI6.HNdrruaHHjjc7W', 'user'),
(41, 'awd', 'awd', '5555', 0, 'awdwad', 'adad ad', 'awd', '$2y$10$79ytZQ.nv1qi7JltJchlo.kPuEsY1JBpBVdr9OnoRvcLQ.1zCsyca', 'user'),
(42, 'josh', 'awd', '2121', 0, 'wdawd', 'awdaw awd', 'dawd', 'pass', 'administrator'),
(43, 'patrick', 'dionio', '1212', 12344, 'awda', 'dawd awdaw', 'dawawd', 'pass', 'user'),
(44, 'dawd', 'adaw', '4321', 112, 'da', 'awd adad', 'adwaw', '$2y$10$yf5dzBJzg5JY/n/imDxjuOZamJnF1plE1rlO.6nhFHD6ZxZe4HuM2', 'user');

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
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
