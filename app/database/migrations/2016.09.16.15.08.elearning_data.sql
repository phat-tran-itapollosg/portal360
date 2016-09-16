-- phpMyAdmin SQL Dump
-- version 4.0.10.16
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2016 at 03:08 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 5.6.25-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `apollo_survey`
--

--
-- Dumping data for table `alpha_classroom`
--

INSERT INTO `alpha_classroom` (`classroom_id`, `name`, `updated_at`, `created_at`, `total_pages`, `per_page`, `id`) VALUES
(1, 'TEST_GROUP', '2016-08-04 08:34:56', '2016-08-04 08:34:56', 1, 100, 20130);

--
-- Dumping data for table `alpha_courses`
--

INSERT INTO `alpha_courses` (`alpha_course_id`, `course_name`, `updated_at`, `access_end_date`, `created_at`, `end_date`, `course_session_id`, `id`, `payment_status`, `classroom_id`, `member_id`, `linking`, `course_type`, `access_start_date`, `start_date`, `parent_id`, `registration_item_id`, `alpha_student_id`, `alpha_classroom_id`) VALUES
(1, 'Practical English 6', '2016-08-04 08:34:56', '2016-12-31 00:00:00', '2016-08-04 08:34:56', '2016-12-31 00:00:00', 15612, 720285, 0, 20130, 313750, 1, 'PE6', '2016-08-01 00:00:00', '2016-08-01 00:00:00', NULL, 408395, 1, 1),
(2, 'Practical English 6', '2016-09-08 08:32:26', '2016-12-31 00:00:00', '2016-09-08 08:32:26', '2016-12-31 00:00:00', 15612, 726020, 0, 20130, 317034, 1, 'PE6', '2016-08-01 00:00:00', '2016-08-01 00:00:00', NULL, 419029, 2, 1),
(3, 'Practical English 6', '2016-09-09 10:08:32', '2016-12-31 00:00:00', '2016-09-09 10:08:32', '2016-12-31 00:00:00', 15612, 726267, 0, 20130, 317138, 1, 'PE6', '2016-08-01 00:00:00', '2016-08-01 00:00:00', NULL, 419315, 3, 1),
(4, 'Practical English 6', '2016-09-14 08:40:56', '2016-12-31 00:00:00', '2016-09-14 08:40:56', '2016-12-31 00:00:00', 15612, 728197, 0, 20130, 317966, 1, 'PE6', '2016-08-01 00:00:00', '2016-08-01 00:00:00', NULL, 419924, 4, 1);

--
-- Dumping data for table `alpha_lessons`
--

INSERT INTO `alpha_lessons` (`graded`, `score`, `skill`, `passed`, `status`, `session_id`, `unit_type`, `id`, `level`, `created_at`, `time`, `grade`, `unit_id`, `updated_at`, `submitted`, `title`, `title_local`, `passed_in_course`, `lesson_id`, `alpha_course_id`, `alpha_student_id`, `alpha_classroom_id`) VALUES
(NULL, 80, 'Listening', 1, 0, 'febf-95df-0bc9-cc210@html_57d12567fe23bf0cee00bf11', 'Lesson', 23925040, '1', '2016-09-08 09:03:28', NULL, NULL, '50191e505ce5587fef000096', '2016-09-08 09:03:28', '2016-09-08 09:03:27', 'My working day', 'My working day', 1, 1, 2, 2, 1),
(NULL, 30, 'Listening', 0, 0, '7253-b86d-f2710-cedb@html_57d1300a19e3f043ae00b4ad', 'Lesson', 23925300, '2', '2016-09-08 09:49:42', NULL, NULL, '50191e4f5ce5587fef000001', '2016-09-08 09:49:42', '2016-09-08 09:49:42', 'Enjoying the weekend', 'Enjoying the weekend', 0, 2, 2, 2, 1),
(NULL, 10, 'Listening', 0, 0, '26a9-5dda-b566-653e@html_57d1344019e3f043a500ba8a', 'Lesson', 23925338, '3', '2016-09-08 09:57:46', NULL, NULL, '50191e4f5ce5587fef000002', '2016-09-08 09:57:46', '2016-09-08 09:57:46', 'Social networking: protecting yourself', 'Social networking: protecting yourself', 0, 3, 2, 2, 1),
(NULL, 30, 'Listening', 0, 0, '3954-69e9-4d7e-e36b@html_57d1362300753b257500c472', 'Lesson', 23925366, '4', '2016-09-08 10:04:29', NULL, NULL, '50191e4f5ce5587fef000003', '2016-09-08 10:04:29', '2016-09-08 10:04:28', 'Memorable flights', 'Memorable flights', 0, 4, 2, 2, 1),
(NULL, 40, 'Listening', 0, 0, 'c944-47cb-9f58-7ef6@html_57d1362dfe23bf0ce200c03d', 'Lesson', 23925431, '4', '2016-09-08 10:14:33', NULL, NULL, '50191e4f5ce5587fef000003', '2016-09-08 10:14:33', '2016-09-08 10:14:33', 'Memorable flights', 'Memorable flights', 0, 5, 2, 2, 1),
(NULL, 0, 'Listening', 0, 0, '77106-a32d-6ab6-4557@html_57d137b9fe23bf0cf600bb7b', 'Lesson', 23925548, '4', '2016-09-08 10:36:17', NULL, NULL, '50191e4f5ce5587fef000003', '2016-09-08 10:36:17', '2016-09-08 10:36:17', 'Memorable flights', 'Memorable flights', 0, 6, 2, 2, 1),
(NULL, 20, 'Listening', 0, 0, '33cb-51021-a73f-2107b@html_', 'Lesson', 23927702, '2', '2016-09-08 16:13:35', NULL, NULL, '50191e4f5ce5587fef000001', '2016-09-08 16:13:35', '2016-09-08 16:13:30', 'Enjoying the weekend', 'Enjoying the weekend', 0, 7, 2, 2, 1),
(NULL, 40, 'Listening', 0, 0, '4ec4-82f1-c78d-8a0b@html_57d1884c0dfe4b0126008805', 'Lesson', 23927683, '2', '2016-09-08 16:05:54', NULL, NULL, '50191e4f5ce5587fef000001', '2016-09-08 16:05:54', '2016-09-08 16:05:54', 'Enjoying the weekend', 'Enjoying the weekend', 0, 8, 2, 2, 1),
(NULL, 100, 'Listening', 1, 0, '67bc-f1fc-f2a2-1d4f@html_', 'Lesson', 23931419, '2', '2016-09-09 09:45:10', NULL, NULL, '50191e4f5ce5587fef000001', '2016-09-09 09:45:10', '2016-09-09 09:45:10', 'Enjoying the weekend', 'Enjoying the weekend', 1, 9, 2, 2, 1),
(NULL, 40, 'Listening', 0, 0, '8373-a362-b343-b591@html_', 'Lesson', 23931613, '4', '2016-09-09 10:21:18', NULL, NULL, '50191e4f5ce5587fef000003', '2016-09-09 10:21:18', '2016-09-09 10:21:18', 'Memorable flights', 'Memorable flights', 0, 10, 2, 2, 1),
(NULL, 80, 'Listening', 1, 0, '6e43-1f97-cf910-51f3@html_', 'Lesson', 23931549, '3', '2016-09-09 10:07:42', NULL, NULL, '50191e4f5ce5587fef000002', '2016-09-09 10:07:42', '2016-09-09 10:07:42', 'Social networking: protecting yourself', 'Social networking: protecting yourself', 1, 11, 2, 2, 1),
(NULL, 40, 'Listening', 0, 0, 'd534-3abf-7da3-c516@html_', 'Lesson', 23931596, '4', '2016-09-09 10:17:53', NULL, NULL, '50191e4f5ce5587fef000003', '2016-09-09 10:17:53', '2016-09-09 10:17:52', 'Memorable flights', 'Memorable flights', 0, 12, 2, 2, 1),
(NULL, 80, 'Listening', 1, 0, 'db19-76e9-2eff-cb5d@html_57d28c640dfe4b226300c5cb', 'Lesson', 23931633, '4', '2016-09-09 10:25:20', NULL, NULL, '50191e4f5ce5587fef000003', '2016-09-09 10:25:20', '2016-09-09 10:25:20', 'Memorable flights', 'Memorable flights', 1, 13, 2, 2, 1),
(NULL, 93, 'Listening', 1, 0, '2b69-6fb6-1979-1051a@html_', 'Lesson', 23970641, '2', '2016-09-14 04:10:42', NULL, NULL, '50191e4f5ce5587fef000004', '2016-09-14 04:10:42', '2016-09-14 04:10:41', 'At the post office', 'At the post office', 1, 14, 2, 2, 1),
(NULL, 80, 'Listening', 1, 0, '46c5-f3f3-4466-cb2f@html_', 'Lesson', 23970698, '3', '2016-09-14 04:17:12', NULL, NULL, '50191e4f5ce5587fef000005', '2016-09-14 04:17:12', '2016-09-14 04:17:11', 'Family trees', 'Family trees', 1, 15, 2, 2, 1),
(NULL, 100, 'Listening', 1, 0, '8b87-4122-0eb3-1b3c@html_', 'Lesson', 23970784, '3', '2016-09-14 04:26:39', NULL, NULL, '50191e4f5ce5587fef000006', '2016-09-14 04:26:39', '2016-09-14 04:26:39', 'College education', 'College education', 1, 16, 2, 2, 1),
(NULL, 100, 'Grammar', 1, 0, '64c3-b7a9-225e-576e@html_57d8d2b90dfe4bcf940052b0', 'Lesson', 23971030, '1', '2016-09-14 04:46:21', NULL, NULL, '50191e515ce5587fef0000bc', '2016-09-14 04:46:21', '2016-09-14 04:46:21', 'A boring weekend', 'A boring weekend', 1, 17, 2, 2, 1),
(NULL, 80, 'Grammar', 1, 0, 'd583-876b-5478-7c09@html_', 'Lesson', 23971159, '4', '2016-09-14 04:55:58', NULL, NULL, '50191e525ce5587fef000140', '2016-09-14 04:55:58', '2016-09-14 04:55:58', 'Working overseas', 'Working overseas', 1, 18, 2, 2, 1);

--
-- Dumping data for table `alpha_students`
--

INSERT INTO `alpha_students` (`student_id`, `login`, `first_name`, `last_name`, `email`, `alpha_classroom_id`) VALUES
(1, 'yoshin', 'Michael', 'Schenker', 'yoshin+apollo@reallyenglish.com', 1),
(2, 'hn61609a0001', 'Bảo', 'Phùng Gia', 'no_reply@apollo.edu.vn', 1),
(3, 'hn61609a0002', 'Khanh', 'Tran Minh', 'khanh.tranminh@apollo.edu.vn', 1),
(4, 'yoshin_test', 'Bảo', 'Phùng Gia', 'yoshin+test@reallyenglish.com', 1);
