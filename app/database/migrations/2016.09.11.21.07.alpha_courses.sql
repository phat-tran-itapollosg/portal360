-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2016 at 03:25 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apollo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alpha_courses`
--

CREATE TABLE `alpha_courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `access_end_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `course_session_id` int(10) DEFAULT NULL,
  `id` int(10) DEFAULT NULL,
  `payment_status` int(10) DEFAULT NULL,
  `classroom_id` int(10) DEFAULT NULL,
  `member_id` int(10) DEFAULT NULL,
  `linking` datetime(5) DEFAULT NULL,
  `course_type` varchar(20) DEFAULT NULL,
  `access_start_date` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `parent_id` int(10) NOT NULL,
  `registration_item_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alpha_courses`
--
ALTER TABLE `alpha_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alpha_courses`
--
ALTER TABLE `alpha_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
