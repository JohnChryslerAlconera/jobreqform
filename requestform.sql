-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221213.9e31295234
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 12:20 PM
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
-- Table structure for table `formdata`
--

CREATE TABLE `formdata` (
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
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `changed_status_by` varchar(225) NOT NULL,
  `form_status` varchar(225) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formdata`
--

INSERT INTO `formdata` (`id`, `req_name`, `req_dept`, `dept_acc_id`, `contact`, `dept_head_fullname`, `position`, `euser_fullname`, `equip_type`, `equip_num`, `equip_issues`, `required_services`, `date_added`, `changed_status_by`, `form_status`) VALUES
(33, 'aefesf', 'marketing', '0815', '123', 'awd awd', 'awda', 'binyang  taso ', 'dell computer', '1223', 'ga blue ang screen', 'Diagnostic,Computer upgrade', '2022-12-14', '', 'approved'),
(34, 'fsefsef', 'agri', '1111', '123', 'waa waaa', 'ojteee', 'densed  ggg ', 'cpu', '0945sfse', 'Application crash or OS blue screen,Printer bunking,', 'Diagnostic', '2022-12-14', 'josh awd', 'denied'),
(43, 'kiara', 'dawawd', '5544', '23231', '2awdawd', 'adaw', '', '', '', 'dawdaw', 'dawd', '2022-12-15', 'josh awd', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
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
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `account_id`, `contact`, `department`, `dept_head_fullname`, `position`, `password`, `access`) VALUES
(39, 'joshua', 'dionio', '1234', 124, 'agri', 'kaira pamoceno', 'clerk', '$2y$10$lADSJVi0pc3/O.lC5BdZjeta1rm7mJZK833wkGkosAcNvEHXbuhoK', 'user'),
(40, 'awd', 'awd', '5555', 0, 'awdwad', 'adad ad', 'awd', '$2y$10$n.Qoq0aUNBDKo/yVHNik..FGj6QCcRCOgpZcI6.HNdrruaHHjjc7W', 'user'),
(41, 'awd', 'awd', '5555', 0, 'awdwad', 'adad ad', 'awd', '$2y$10$79ytZQ.nv1qi7JltJchlo.kPuEsY1JBpBVdr9OnoRvcLQ.1zCsyca', 'user'),
(42, 'josh', 'awd', '2121', 0, 'wdawd', 'awdaw awd', 'dawd', 'pass', 'administrator'),
(43, 'patrick', 'dionio', '1212', 12344, 'awda', 'dawd awdaw', 'dawawd', '$2y$10$uD.ZLppFw6qh0aHz9/9nK.mAdkk95dw1LTgZQJQZ9dSjtz5HbZjQi', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formdata`
--
ALTER TABLE `formdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formdata`
--
ALTER TABLE `formdata`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
