-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2016 at 06:13 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsugarcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `alpha_category`
--

CREATE TABLE `alpha_category` (
  `cid` int(11) NOT NULL,
  `ccontent` varchar(300) COLLATE utf16_unicode_ci NOT NULL,
  `cdelete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `alpha_category`
--

INSERT INTO `alpha_category` (`cid`, `ccontent`, `cdelete`) VALUES
(1, 'Tin hệ thống', 0),
(2, 'Giao thông cao cấp thông gió, mát béo 2               ', 1),
(3, 'thích thịt chuột', 1),
(4, '5555 phục hồi                               ', 1),
(5, 'sử thành công id=5', 1),
(6, 'thích thịt heo\r\n', 1),
(7, 'thích thịt gà', 1),
(8, 'Tin cho dành cho học viên', 0),
(9, 'Tin cho cán bộ, giáo viên', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alpha_category`
--
ALTER TABLE `alpha_category`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alpha_category`
--
ALTER TABLE `alpha_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
