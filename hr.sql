-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 06:43 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `emp_id` int(50) NOT NULL,
  `log_in_time` time NOT NULL,
  `log_out_time` time NOT NULL,
  `duration` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `emp_id`, `log_in_time`, `log_out_time`, `duration`, `date`) VALUES
(275, 16103119, '08:00:00', '20:00:00', '40:00:00', '2018-11-22'),
(276, 16103119, '08:00:00', '19:00:00', '40:00:00', '2018-11-23'),
(279, 16103119, '08:01:00', '14:00:00', '50:00:00', '2018-10-01'),
(282, 16103119, '08:00:00', '17:00:00', '54:00:00', '2018-11-01'),
(283, 16103119, '17:00:00', '18:00:00', '50:00:00', '2018-10-31'),
(284, 16103119, '08:00:00', '14:00:00', '26:00:00', '2018-11-02'),
(285, 16103119, '08:00:00', '24:00:00', '40:00:00', '2018-11-03'),
(286, 16103119, '07:01:00', '19:00:00', '50:00:00', '2018-11-04'),
(287, 16103119, '17:00:00', '10:00:00', '40:00:00', '2018-12-02'),
(288, 16103119, '08:00:00', '14:00:00', '40:00:00', '2018-12-01'),
(289, 16103119, '08:00:00', '08:00:00', '40:00:00', '2018-11-30'),
(290, 16103119, '16:24:52', '16:25:12', '00:00:20', '2018-12-03'),
(291, 16103119, '17:39:38', '09:44:21', '-07:55:17', '2018-12-03'),
(292, 16103119, '09:46:00', '09:46:07', '00:00:07', '2018-12-04'),
(293, 16103140, '09:50:23', '09:50:28', '00:00:05', '2018-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `emp_id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `cur_add` varchar(150) NOT NULL,
  `addr` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `dept` varchar(150) NOT NULL,
  `salary` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `profile` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `emp_id`, `email`, `sex`, `bday`, `phone_number`, `cur_add`, `addr`, `category`, `dept`, `salary`, `country`, `profile`) VALUES
(93, 'Tanvir', 'Ahmed', 16103119, 'tanvir59@outlook.com', 'Male', '2018-11-28', '01631102838', 'Mirpur-11', 'Same', 'Supervisor', 'taylor', 15000, 'Bangladesh', 'interior-garment-factory-shop-closes-260nw-724014595.jpg'),
(94, 'pinto', 'kahet', 16103140, 'pinto@gmail.com', 'Male', '1996-01-10', '01516154051', 'Dhaka', 'Dhaka', 'Labour', 'cutting', 10000, 'Bangladesh', 'Capture.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `man_fname` varchar(150) NOT NULL,
  `man_lname` varchar(50) NOT NULL,
  `man_dept` varchar(50) NOT NULL,
  `file` longblob NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` varchar(150) NOT NULL,
  `given_date` date NOT NULL,
  `sub_date` date NOT NULL,
  `status` enum('Not Yet Done','Done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `man_fname`, `man_lname`, `man_dept`, `file`, `type`, `size`, `given_date`, `sub_date`, `status`) VALUES
(15, 'Tanvir', 'Ahmed', 'cutting', 0x70726f6a6563742f4d69645f5465726d5f436c6173735f4e6f7465732e706466, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '0', '2018-11-27', '2019-01-26', 'Done'),
(16, 'Pinto', 'Kahet', 'washing', 0x70726f6a6563742f73756c61696d6f6e5f6164656e696a692e646f63, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '0', '2018-11-27', '2019-01-28', 'Done'),
(17, 'Tanvir', 'Ahmed', 'cutting', 0x656d7064662e706466, 'application/pdf', '66.64453125', '2018-12-03', '2018-12-31', 'Done'),
(18, 'Tanvir', 'Ahmed', 'cutting', 0x6e65772d6d6963726f736f66742d776f72642d646f63756d656e742e646f6378, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '418.4638671875', '2018-12-03', '2018-12-31', 'Done'),
(19, 'Tanvir', 'Ahmed', 'cutting', 0x6e65772d6d6963726f736f66742d776f72642d646f63756d656e742e646f6378, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '418.4638671875', '2018-12-03', '2019-01-01', 'Not Yet Done');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(43, 'saria', '1234', 'manager'),
(38, 'tanvir', '1234', 'admin'),
(39, 'pinto', '1234', 'registry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
