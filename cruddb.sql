-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 08:20 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cruddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `examine` varchar(400) NOT NULL,
  `symptoms` varchar(400) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `patient_id`, `doctor_id`, `examine`, `symptoms`, `created_at`, `updated_at`) VALUES
(11, 14, 12, 'hgjfhgjqjh', 'jhjhjh', '2018-06-21 09:11:33', '2018-06-21 17:35:31'),
(12, 15, 13, '', '', '2018-06-21 09:29:36', '2018-06-21 16:29:36'),
(15, 0, 14, '', '', '2018-06-21 10:27:07', '2018-06-21 17:27:07'),
(17, 12, 12, 'xanuun', 'xanuun', '2018-06-21 10:41:35', '2018-06-21 20:37:08'),
(18, 15, 12, '', '', '2018-06-21 10:42:02', '2018-06-21 17:42:02'),
(19, 16, 12, '', '', '2018-06-21 10:42:54', '2018-06-21 17:42:54'),
(20, 12, 15, '', '', '2018-06-21 10:50:19', '2018-06-21 17:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `id` int(11) NOT NULL,
  `bed_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, '#abc123');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_name`) VALUES
(1, 'skin specialist'),
(2, 'pediatric'),
(3, 'orthopedic'),
(4, 'psychiatry'),
(5, 'general medicine'),
(6, 'ENT surgeon'),
(7, 'gynaecologist'),
(8, 'opthzmology'),
(9, 'dentist'),
(10, 'Gardiologist'),
(11, 'endodontist');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(100) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(16) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `status` enum('single','marriage') NOT NULL,
  `title` varchar(30) NOT NULL,
  `dep` int(11) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'floor 1', '2018-06-08 17:47:20', '2018-06-08 14:47:20'),
(2, 'floor 2', '2018-06-08 17:47:20', '2018-06-08 14:47:20'),
(3, 'floor 3', '2018-06-08 17:47:36', '2018-06-08 14:47:36'),
(4, 'floor 4', '2018-06-08 17:47:36', '2018-06-08 14:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `gender` enum('male','female','child','') NOT NULL,
  `age` int(5) NOT NULL,
  `status` enum('single','marriage','','') NOT NULL,
  `address` varchar(100) NOT NULL,
  `examine` varchar(400) NOT NULL,
  `symptoms` varchar(400) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `patient_id`, `doctor_id`, `gender`, `age`, `status`, `address`, `examine`, `symptoms`, `created_at`) VALUES
(8, 14, 12, 'male', 0, 'single', '', 'kk', 'kk', '2018-06-21 09:22:19'),
(9, 15, 14, 'male', 0, 'single', '', 'gfg', 'hjhj', '2018-06-21 10:26:47'),
(10, 14, 12, 'male', 0, 'single', '', 'hgjfhgjqjh', 'jhjhjh', '2018-06-21 10:35:31'),
(11, 12, 12, 'male', 0, 'single', '', 'xanuun', 'xanuun', '2018-06-21 13:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(16) NOT NULL,
  `gender` enum('male','female','','') NOT NULL,
  `status` enum('single','marriage') NOT NULL,
  `shift` varchar(40) NOT NULL,
  `dep` varchar(100) NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `name`, `phone`, `gender`, `status`, `shift`, `dep`, `salary`, `created_at`, `updated_at`) VALUES
(9, 'mouse jamac', 2147483647, 'male', 'single', 'afternoon', 'pharmacy', '7888888', '2018-06-06 23:30:43', '2018-06-06 20:30:43'),
(10, 'muuse', 907667788, 'male', 'marriage', 'morning ', '12', '1600', '2018-06-21 10:52:18', '2018-06-21 17:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(16) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `age` int(10) NOT NULL,
  `status` enum('single','married') NOT NULL,
  `address` varchar(100) NOT NULL,
  `field` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `phone`, `gender`, `age`, `status`, `address`, `field`, `created_at`, `updated_at`) VALUES
(12, 'anas osman', 2147483647, 'male', 21, 'single', 'bosaso', 0, '2018-06-05 22:49:35', '2018-06-21 20:37:08'),
(15, 'marwo aamino', 90878769, 'female', 23, 'single', 'bosaso', 1, '2018-06-21 09:29:26', '2018-06-21 17:40:01'),
(16, 'ayuub', 7878888, 'male', 87, 'single', 'bosaso', 1, '2018-06-21 10:42:47', '2018-06-21 17:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `itemdescription` varchar(255) NOT NULL,
  `itemimage` varchar(255) NOT NULL,
  `itemstatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `itemname`, `itemdescription`, `itemimage`, `itemstatus`) VALUES
(4, '', '', 'uploads/twitter_corner_blue.png', 'Available'),
(5, 'computer', 'computer description', 'uploads/admin.jpg', 'Disabled'),
(6, '', '', 'uploads/.gitignore', 'Available'),
(7, 'computer', 'fds', 'uploads/placeholder.png', 'Available'),
(8, 'computer', 's', 'uploads/placeholder.png', 'Available'),
(9, 'mobile', 'some mobile description', 'uploads/twitter_corner_black.png', 'Available'),
(10, 'mouse', 'mouse description here', 'uploads/a321-big.jpg', 'Available'),
(11, 'Shaah', 'Shaah weeye dee', 'uploads/somalideveloper.jpg', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `floor_id`, `beds`, `created_at`, `updated_at`) VALUES
(2, 101, 2, 8, '2018-06-08 18:02:12', '2018-06-08 15:02:12'),
(3, 100, 4, 3, '2018-06-08 18:48:48', '2018-06-08 15:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(450) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(3, 'abdo', '900', 'user@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_patient_assign` (`patient_id`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dep_id` (`dep_id`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room_floor` (`floor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `fk_dep_id` FOREIGN KEY (`dep_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_room_floor` FOREIGN KEY (`floor_id`) REFERENCES `floor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
