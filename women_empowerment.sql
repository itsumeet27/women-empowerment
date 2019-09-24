-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 09:15 PM
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
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `ngo_id` int(11) NOT NULL,
  `applied` tinyint(4) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `step_id`, `course_id`, `ngo_id`, `applied`, `date`) VALUES
(1, 3, 1, 1, 1, '2019-09-25 00:39:47'),
(2, 3, 5, 4, 1, '2019-09-25 00:40:11'),
(3, 1, 2, 2, 1, '2019-09-25 00:41:30'),
(4, 1, 3, 2, 1, '2019-09-25 00:41:42'),
(5, 1, 5, 4, 1, '2019-09-25 00:41:55'),
(6, 2, 4, 3, 1, '2019-09-25 00:42:38'),
(7, 2, 1, 1, 1, '2019-09-25 00:42:48'),
(8, 2, 3, 2, 1, '2019-09-25 00:42:57');

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
(1, 1, 'Natural Resources', 'Agriculture', 'A natural resources course covers topics pertaining to forestry, soils, and wildlife. Students learn about power sources, such as electric motors and combustion engines, as well as government regulations and programs that relate to natural resource conservation. Natural resource courses also address the effects that current power sources have on the agriculture industry and what it means for the future of natural resources and power.', 3, 'Kisan Mitras would be trained resource persons who work with farmers to help them shift towards agro-ecological approaches to sustain their farming, organize themselves into producer cooperatives, understand the issues in public policy and improve the support systems. They will undergo a foundation course and can specialize in any of the areas of ecological farming, farmers&rsquo; institutions and marketing or public policy support.', 'English, Hindi', 0, 0, '2019-09-20 12:03:30'),
(2, 2, 'Basic Horticulture', 'Agriculture', 'Horticulture is a science that studies plants, gardening, and natural growth. This course helps students develop skills in controlling plant growth and development. Specific topics of study may include plant production, pruning, regulations of plant growth, and storage processes. Horticulture courses may also cover marketing concepts related to the field.', 3, 'Kisan Mitras would be trained resource persons who work with farmers to help them shift towards agro-ecological approaches to sustain their farming, organize themselves into producer cooperatives, understand the issues in public policy and improve the support systems. They will undergo a foundation course and can specialize in any of the areas of ecological farming, farmers&rsquo; institutions and marketing or public policy support.', 'Hindi, English, Marathi', 0, 0, '2019-09-20 13:30:46'),
(3, 2, 'Soils and Pesticides', 'Agriculture', 'Agriculture students learn about soils and pesticides to understand the chemical makeup and effect that these elements have on crop growth. A soils and pesticides course covers conservation of water and soil, fertilizer use, and soil formation. It is a course that is delivered in lecture and lab format so that students may apply their skills to live scenarios. This course may also cover soil types specific to the state in which the agriculture program is taught.', 2, 'Kisan Mitras would be trained resource persons who work with farmers to help them shift towards agro-ecological approaches to sustain their farming, organise themselves into producer cooperatives, understand the issues in public policy and improve the support systems. They will undergo a foundation course and can specialise in any of the areas of ecological farming, farmers&rsquo; institutions and marketing or public policy support.', 'Hindi, Marathi, English', 0, 0, '2019-09-20 13:45:04'),
(4, 3, 'Tailoring', 'Tailoring &amp; Stitching', 'In this course, students learn how to open and run a tailoring business for private clients. They study proper stitching, threads, materials and patterns, while learning varied tailoring techniques for difficult materials and fabric cuts.', 6, 'The main object of the scheme is to rehabilitate the poor and destitute girls and women of the society both economically and socially through the training in cutting and tailoring and knitting.', 'English, Hindi', 0, 0, '2019-09-20 13:47:47'),
(5, 4, 'Clothing and Fashion', 'Tailoring &amp; Stitching', 'The focus of this course is to design and create wearable items for personal or industry use. These may include shirts, skirts, pants and other clothing items. Students learn how to iron or sew on appliqu&eacute;s, gems, buttons, zippers and extra embellishments. A primary focus is fitting clothing to body shapes.', 3, 'To teach the trainees on how to perform stitiching from basic and with time how can it be improved for the betterment and develop as a skill for earning', 'Hindi, Marathi', 0, 0, '2019-09-20 13:48:48');

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
(1, 'Pratham Education Foundation', 'The leading learning organization is one of the top 10 NGOs in India. It was created with the purpose of improving the quality of education in India. It is one of the leading non-governmental organizations in-country. Pratham was established in 1995 for providing education to children in the slums of Mumbai. The motive behind the Pratham Education is to improve the quality of education.', 'Y.B. Chavan Center, 4th Floor, Gen. J. Bhosale Marg. Nariman Point, Mumbai Maharashtra , 400021', 'Industry Top', 'prathameducation@gmail.com', 'Shar8286', '022 22819561', 'Mumbai', 'Maharashtra', 400021, 'Sumeet Sharma', '2019-09-25 00:21:51', '::1'),
(2, 'K C Mahindra Education Trust', 'The K.C Mahindra Education Trust was founded in the year 1953 by late Mr K.C Mahindra. It was founded with the aim of promotion higher learning and literacy in the country.\r\n\r\nIt is known for its many initiatives in the field of education which is making huge impact in the lives of needy and deserving students. The trust is providing money in the form of loans, scholarships and grants.  It various initiatives are as follows-\r\n\r\nScholarships &amp; Grants\r\nLivelihood Training- Mahindra Pride School\r\nGirl Child Education- Project Nanhi Kali', 'K. C. Mahindra Education Trust Cecil Court Near Re Mahakavi Bhushan Marg, Mumbai Maharashtra , 400001', 'SME\'s', 'kcmahindra@gmail.com', 'Shar8850', '(022) 22895500', 'Mumbai', 'Maharashtra', 400001, 'K.C. Mahindra', '2019-09-25 00:25:19', '::1'),
(3, 'Child Rights and You (CRY)', 'It is one of the top 10 NGOs in India. CRY was started in the year 1979 by Rippan Kapoor. The NGO is located in Mumbai, Bangalore, Chennai, Kolkata and Delhi. It is dealing with many issues like Child Labour, Girl Child, Malnutrition, Poverty, Education and Illiteracy, Child Marriage, Child Trafficking, Gender Inequality.', '632, 2nd floor, Lane No.3, Westend Marg Saiyad-ul-Ajaib, New Delhi, Delhi , 110030', 'Industry Top', 'cryngo@gmail.com', 'Shar9870', '(011) 29531835', 'New Delhi', 'Delhi', 110030, 'Amit Sharma', '2019-09-25 00:27:05', '::1'),
(4, 'Give Foundation', 'Give Foundation was founded in the year 1999. It is located in Mumbai, Maharashtra.  It is an online donation platform and aims to channel and provide resources to credible non-governmental organisations across India. It helps in raising funds and contribution from individuals and then distribute it to credible NGOs.', '91 Springboard, B Wing, 5th Floor Ackruti Trade Centre, MIDC, Mumbai Maharashtra , 400093', 'SME\'s', 'givefoundation@gmail.com', 'Shar9768', '+91 8850948655', 'Mumbai', 'Maharashtra', 400093, 'Dilip Sharma', '2019-09-25 00:29:33', '::1');

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
  `dateOfRegistration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `step`
--

INSERT INTO `step` (`id`, `firstname`, `lastname`, `email`, `password`, `address`, `city`, `state`, `zipcode`, `dateOfBirth`, `phone`, `noOfMembers`, `noOfChildren`, `income`, `dateOfRegistration`, `ip`) VALUES
(1, 'Simran', 'Sharma', 'simran2902@gmail.com', 'Shar9029', '302, B-7, Sector-9, Shanti Nagar, Mira Road East, Thane - 401107', 'Mumbai', 'Maharashtra', 401107, '1996-02-27', '8286864601', 4, 1, 1000, '2019-09-25 00:32:53', '::1'),
(2, 'Sneha', 'Sawant', 'sneha.sawant@gmail.com', 'Sneha9029', '204, C-15, Sector-7, Shanti Nagar, Mira Road East, Thane - 401107', 'Mumbai', 'Maharashtra', 401107, '1997-03-21', '8850948655', 5, 2, 0, '2019-09-25 00:35:17', '::1'),
(3, 'Surabhi', 'Tak', 'tak.surabhi@gmail.com', 'Tak828686', '1303, Sumit Proxima, Rajendra Nagar, Borivali East, Mumbai - 400023', 'Mumbai', 'Maharashtra', 400023, '1992-01-19', '9029220049', 6, 3, 700, '2019-09-25 00:36:48', '::1');

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
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `step`
--
ALTER TABLE `step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
