-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2024 at 07:32 AM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saga_bm`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_information`
--

CREATE TABLE `basic_information` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `business_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip_code` varchar(100) DEFAULT NULL,
  `est_month` text DEFAULT NULL,
  `est_year` text DEFAULT NULL,
  `short_goal` text DEFAULT NULL,
  `long_goal` text DEFAULT NULL,
  `mission_stm` text DEFAULT NULL,
  `market_place` varchar(100) DEFAULT NULL,
  `pitch` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_contact`
--

CREATE TABLE `business_contact` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_formation`
--

CREATE TABLE `business_formation` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `entity_type` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_formation`
--

INSERT INTO `business_formation` (`id`, `uid`, `entity_type`, `status`) VALUES
(1, 0, 'Private_Limited_Company', 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_operation`
--

CREATE TABLE `business_operation` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `state_of_opt` varchar(100) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_partner`
--

CREATE TABLE `business_partner` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name_one` varchar(100) DEFAULT NULL,
  `importance_one` text DEFAULT NULL,
  `activity_one` text DEFAULT NULL,
  `name_two` varchar(100) DEFAULT NULL,
  `importance_two` text DEFAULT NULL,
  `activity_two` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `competitive_analysis`
--

CREATE TABLE `competitive_analysis` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `com1` varchar(100) DEFAULT NULL,
  `com2` varchar(100) DEFAULT NULL,
  `com3` varchar(100) DEFAULT NULL,
  `q1` text DEFAULT NULL,
  `q2` text DEFAULT NULL,
  `q3` text DEFAULT NULL,
  `q4` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_segment`
--

CREATE TABLE `customer_segment` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `target_customer` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `q1` text DEFAULT NULL,
  `q2` text DEFAULT NULL,
  `q3` text DEFAULT NULL,
  `q4` text DEFAULT NULL,
  `q5` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distribution_channel`
--

CREATE TABLE `distribution_channel` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `q1` text DEFAULT NULL,
  `q2` text DEFAULT NULL,
  `q3` text DEFAULT NULL,
  `distribution_method` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `founders`
--

CREATE TABLE `founders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `founder_name` varchar(100) DEFAULT NULL,
  `founder_background` text DEFAULT NULL,
  `co_name_one` varchar(100) DEFAULT NULL,
  `co_background_one` text DEFAULT NULL,
  `co_name_two` varchar(100) DEFAULT NULL,
  `co_background_two` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `key_activity`
--

CREATE TABLE `key_activity` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `q1` text NOT NULL,
  `q2` text NOT NULL,
  `q3` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `key_resources`
--

CREATE TABLE `key_resources` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `q1` text NOT NULL,
  `q2` text NOT NULL,
  `q3` text NOT NULL,
  `q4` text NOT NULL,
  `q5` text NOT NULL,
  `q6` text NOT NULL,
  `q7` text NOT NULL,
  `q8` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricing_strategy`
--

CREATE TABLE `pricing_strategy` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `q1` text DEFAULT NULL,
  `q2` text DEFAULT NULL,
  `q3` text DEFAULT NULL,
  `q4` text DEFAULT NULL,
  `q5` text DEFAULT NULL,
  `q6` text DEFAULT NULL,
  `q7` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promoters_advisor`
--

CREATE TABLE `promoters_advisor` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name_one` varchar(100) DEFAULT NULL,
  `role_one` varchar(100) DEFAULT NULL,
  `name_two` varchar(100) DEFAULT NULL,
  `role_two` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenue_model`
--

CREATE TABLE `revenue_model` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `model` text NOT NULL,
  `q1` text DEFAULT NULL,
  `q2` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `value_propositions`
--

CREATE TABLE `value_propositions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `industry` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `q1` varchar(100) DEFAULT NULL,
  `q2` varchar(100) DEFAULT NULL,
  `q3` varchar(100) DEFAULT NULL,
  `q4` varchar(100) DEFAULT NULL,
  `q5` varchar(100) DEFAULT NULL,
  `q6` varchar(100) DEFAULT NULL,
  `offer` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_information`
--
ALTER TABLE `basic_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_contact`
--
ALTER TABLE `business_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_formation`
--
ALTER TABLE `business_formation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_operation`
--
ALTER TABLE `business_operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_partner`
--
ALTER TABLE `business_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competitive_analysis`
--
ALTER TABLE `competitive_analysis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_segment`
--
ALTER TABLE `customer_segment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribution_channel`
--
ALTER TABLE `distribution_channel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `founders`
--
ALTER TABLE `founders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_activity`
--
ALTER TABLE `key_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_resources`
--
ALTER TABLE `key_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing_strategy`
--
ALTER TABLE `pricing_strategy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promoters_advisor`
--
ALTER TABLE `promoters_advisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenue_model`
--
ALTER TABLE `revenue_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `value_propositions`
--
ALTER TABLE `value_propositions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_information`
--
ALTER TABLE `basic_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_contact`
--
ALTER TABLE `business_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_formation`
--
ALTER TABLE `business_formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_operation`
--
ALTER TABLE `business_operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_partner`
--
ALTER TABLE `business_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `competitive_analysis`
--
ALTER TABLE `competitive_analysis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_segment`
--
ALTER TABLE `customer_segment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distribution_channel`
--
ALTER TABLE `distribution_channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `founders`
--
ALTER TABLE `founders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `key_activity`
--
ALTER TABLE `key_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `key_resources`
--
ALTER TABLE `key_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricing_strategy`
--
ALTER TABLE `pricing_strategy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promoters_advisor`
--
ALTER TABLE `promoters_advisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenue_model`
--
ALTER TABLE `revenue_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `value_propositions`
--
ALTER TABLE `value_propositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
