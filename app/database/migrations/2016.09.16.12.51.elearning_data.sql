-- phpMyAdmin SQL Dump
-- version 4.0.10.16
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2016 at 12:50 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 5.6.25-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `apollo_survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `alpha_classroom`
--

CREATE TABLE IF NOT EXISTS `alpha_classroom` (
  `classroom_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `total_pages` int(10) DEFAULT NULL,
  `per_page` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`classroom_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `alpha_courses`
--

CREATE TABLE IF NOT EXISTS `alpha_courses` (
  `alpha_course_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `linking` int(11) DEFAULT NULL,
  `course_type` varchar(20) DEFAULT NULL,
  `access_start_date` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `registration_item_id` int(20) DEFAULT NULL,
  `alpha_student_id` int(11) DEFAULT NULL,
  `alpha_classroom_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`alpha_course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `alpha_lessons`
--

CREATE TABLE IF NOT EXISTS `alpha_lessons` (
  `graded` text CHARACTER SET utf8,
  `score` int(11) DEFAULT NULL,
  `skill` text CHARACTER SET utf8,
  `passed` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `session_id` text CHARACTER SET utf8,
  `unit_type` text CHARACTER SET utf8,
  `id` int(11) DEFAULT NULL,
  `level` text CHARACTER SET utf8,
  `created_at` datetime DEFAULT NULL,
  `time` text CHARACTER SET utf8,
  `grade` text CHARACTER SET utf8,
  `unit_id` text CHARACTER SET utf8,
  `updated_at` datetime DEFAULT NULL,
  `submitted` datetime DEFAULT NULL,
  `title` text CHARACTER SET utf8,
  `title_local` text CHARACTER SET utf8,
  `passed_in_course` int(11) NOT NULL DEFAULT '0',
  `lesson_id` int(11) NOT NULL AUTO_INCREMENT,
  `alpha_course_id` int(11) DEFAULT NULL,
  `alpha_student_id` int(11) DEFAULT NULL,
  `alpha_classroom_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`lesson_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `alpha_students`
--

CREATE TABLE IF NOT EXISTS `alpha_students` (
  `student_id` int(10) NOT NULL AUTO_INCREMENT,
  `login` text CHARACTER SET utf8,
  `first_name` text CHARACTER SET utf8,
  `last_name` text CHARACTER SET utf8,
  `email` text CHARACTER SET utf8,
  `alpha_classroom_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
