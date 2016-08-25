-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2016 at 10:58 PM
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
-- Table structure for table `alpha_news`
--

CREATE TABLE IF NOT EXISTS `alpha_news` (
`id` int(11) NOT NULL,
  `img` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `ntitle` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `ncontent` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `idcate` int(11) NOT NULL DEFAULT '1',
  `ndate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ndelete` tinyint(4) NOT NULL DEFAULT '0',
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `alpha_news`
--

INSERT INTO `alpha_news` (`id`, `img`, `ntitle`, `ncontent`, `idcate`, `ndate`, `ndelete`, `iduser`) VALUES
(1, '', 'test news title', 'test news content', 1, '2016-08-25 19:48:19', 0, NULL),
(2, '', 'tiêu đề 2', 'Nội dung 2', 2, '2016-08-25 20:12:46', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alpha_news`
--
ALTER TABLE `alpha_news`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alpha_news`
--
ALTER TABLE `alpha_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
