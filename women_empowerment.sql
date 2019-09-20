-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 09:56 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `women_empowerment`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `ngo_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_category` varchar(100) NOT NULL,
  `course_description` text NOT NULL,
  `course_duration` int(100) NOT NULL,
  `course_objective` text NOT NULL,
  `course_medium` text NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `ngo_id`, `course_name`, `course_category`, `course_description`, `course_duration`, `course_objective`, `course_medium`, `featured`, `deleted`, `date`) VALUES
(1, 1, 'Natural Resources', 'Agriculture', 'A natural resources course covers topics pertaining to forestry, soils, and wildlife. Students learn about power sources, such as electric motors and combustion engines, as well as government regulations and programs that relate to natural resource conservation. Natural resource courses also address the effects that current power sources have on the agriculture industry and what it means for the future of natural resources and power.', 3, 'Kisan Mitras would be trained resource persons who work with farmers to help them shift towards agro-ecological approaches to sustain their farming, organize themselves into producer cooperatives, understand the issues in public policy and improve the support systems. They will undergo a foundation course and can specialize in any of the areas of ecological farming, farmers&rsquo; institutions and marketing or public policy support.', 'English, Hindi', 0, 0, '2019-09-20 12:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `id` int(11) NOT NULL,
  `ngo_name` varchar(100) NOT NULL,
  `ngo_description` text NOT NULL,
  `ngo_address` text NOT NULL,
  `organization_type` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` int(100) NOT NULL,
  `ngo_head` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`id`, `ngo_name`, `ngo_description`, `ngo_address`, `organization_type`, `email`, `password`, `phone`, `city`, `state`, `zipcode`, `ngo_head`, `date`, `ip`) VALUES
(1, 'First NGO', 'First description of NGO', '403, B-9, Sector-6, Shanti Nagar, Mira Road East', 'Self-funded', 'sksksharma0@gmail.com', 'Shar8286', '8286864601', 'Mumbai', 'Maharashtra', 401107, 'Sumeet Sharma', '2019-09-20 09:18:42', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `step`
--

CREATE TABLE `step` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zipcode` int(10) NOT NULL,
  `dateOfBirth` text NOT NULL,
  `phone` text NOT NULL,
  `noOfMembers` int(100) NOT NULL,
  `noOfChildren` int(100) NOT NULL,
  `income` int(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `dateOfRegistration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `step`
--

INSERT INTO `step` (`id`, `firstname`, `lastname`, `email`, `password`, `address`, `city`, `state`, `zipcode`, `dateOfBirth`, `phone`, `noOfMembers`, `noOfChildren`, `income`, `course_id`, `dateOfRegistration`, `ip`) VALUES
(1, 'Sumitra', 'Sharma', 'sksksharma0@gmail.com', 'Shar8286', '302, B-7, Sector-9, Shanti Nagar, Mira Road East', 'Mumbai', 'Maharashtra', 401107, '1996-02-27', '8286864601', 4, 2, 25000, 0, '2019-09-18 02:37:26', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `permission`, `join_date`, `last_login`) VALUES
(1, 'Sumeet Sharma', 'sksksharma0@gmail.com', 'Shar8286', 'admin,editor', '2019-09-18 00:28:08', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `step`
--
ALTER TABLE `step`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `step`
--
ALTER TABLE `step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
