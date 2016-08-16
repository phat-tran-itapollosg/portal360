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
-- Table structure for table `alpha_faq`
--

CREATE TABLE `alpha_faq` (
  `id` int(11) NOT NULL,
  `faqquestion` varchar(10000) COLLATE utf16_unicode_ci NOT NULL,
  `faqreply` mediumtext COLLATE utf16_unicode_ci NOT NULL,
  `faqdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `faqdelete` tinyint(4) NOT NULL DEFAULT '0',
  `iduser` int(11) DEFAULT NULL,
  `idcate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `alpha_faq`
--

INSERT INTO `alpha_faq` (`id`, `faqquestion`, `faqreply`, `faqdate`, `faqdelete`, `iduser`, `idcate`) VALUES
(1, '                            Apollo là gì?                        ', '                            Là trung tâm dạy tiếng anh tiên tiến và hiệu quả nhất!                ', '2016-08-16 20:59:45', 0, NULL, 8),
(2, '                                                        Hệ thống đăng ký có hoàn toàn tự động???                                                ', '                                                        Hệ thống đăng ký hoàn toàn tự động như:<br>\r\n - Đăng ký lớp học.<br>\r\n - Bài test.<br>\r\n - Thanh toán.\r\n                                ', '2016-08-16 21:15:13', 0, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alpha_faq`
--
ALTER TABLE `alpha_faq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alpha_faq`
--
ALTER TABLE `alpha_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
