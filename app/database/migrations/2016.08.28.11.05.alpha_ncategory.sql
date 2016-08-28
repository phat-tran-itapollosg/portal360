-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2016 at 06:05 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbsugarcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `alpha_ncategory`
--

CREATE TABLE IF NOT EXISTS `alpha_ncategory` (
`nid` int(11) NOT NULL,
  `ccontents` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `cdelete` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `alpha_ncategory`
--

INSERT INTO `alpha_ncategory` (`nid`, `ccontents`, `cdelete`) VALUES
(1, 'Cách Đăng Ký', 0),
(2, 'Tin cho phụ huynh', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alpha_ncategory`
--
ALTER TABLE `alpha_ncategory`
 ADD PRIMARY KEY (`nid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alpha_ncategory`
--
ALTER TABLE `alpha_ncategory`
MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
