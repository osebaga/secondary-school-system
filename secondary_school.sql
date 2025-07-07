-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2025 at 01:14 PM
-- Server version: 8.0.42-0ubuntu0.22.04.1
-- PHP Version: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secondary_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` bigint UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT '0',
  `options` json DEFAULT NULL,
  `scope` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `options`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'users-manage', 'Users manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 12:09:41', '2021-01-05 12:09:41'),
(2, 'Users-view', 'None', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:21:55', '2021-01-05 13:25:38'),
(3, 'users-create', 'Users create', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:26:18', '2021-01-05 13:26:18'),
(4, 'users-edit', 'Users edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:26:59', '2021-01-05 13:26:59'),
(5, 'users-delete', 'Users edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:27:04', '2021-01-05 13:27:32'),
(6, 'roles-manage', 'Roles manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:45:44', '2021-01-05 13:45:44'),
(7, 'roles-view', 'Roles create', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:46:07', '2021-01-05 13:46:47'),
(8, 'roles-create', 'Roles create', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:46:32', '2021-01-05 13:46:32'),
(9, 'roles-edit', 'Roles edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:47:06', '2021-01-05 13:47:06'),
(10, 'roles-delete', 'Roles delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:47:27', '2021-01-05 13:47:27'),
(11, 'abilities-manage', 'Abilities manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:48:05', '2021-01-05 13:48:05'),
(12, 'abilities-view', 'Abilities view', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:48:32', '2021-01-05 13:48:32'),
(13, 'abilities-create', 'Ablities view', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:53:57', '2021-01-05 16:00:41'),
(14, 'abilities-edit', 'Abilities edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:54:39', '2021-01-05 13:54:39'),
(15, 'abilities-delete', 'Abilities delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:55:17', '2021-01-05 13:55:17'),
(16, 'staffs-manage', 'Staffs manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:55:34', '2021-01-05 13:55:34'),
(17, 'staffs-view', 'Staffs view', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:55:48', '2021-01-05 13:55:48'),
(18, 'staffs-create', 'Staffs create', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:56:02', '2021-01-05 13:56:02'),
(19, 'staffs-edit', 'Staffs edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:56:25', '2021-01-05 13:56:25'),
(20, 'staffs-delete', 'Staffs delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:56:45', '2021-01-05 13:56:45'),
(21, 'settings-manage', 'Settings manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 13:58:06', '2021-01-05 13:58:06'),
(22, 'institutions-manage', 'Institutions manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:01:16', '2021-01-05 14:01:16'),
(23, 'institutions-view', 'Institutions view', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:01:33', '2021-01-05 14:01:33'),
(24, 'institutions-create', 'Institutions create', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:02:10', '2021-01-05 14:02:10'),
(25, 'institutions-edit', 'Institutions edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:03:13', '2021-01-05 14:03:13'),
(26, 'institutions-delete', 'Institutions delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:04:12', '2021-01-05 14:04:12'),
(27, 'campus-manage', 'Campus manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:04:45', '2021-01-05 14:04:45'),
(28, 'campus-view', 'Campus view', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:05:20', '2021-01-05 14:05:20'),
(29, 'campus-create', 'Campus create', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:06:09', '2021-01-05 14:06:09'),
(30, 'campus-edit', 'Campus edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:06:26', '2021-01-05 14:06:26'),
(31, 'campus-delete', 'Campus delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:06:40', '2021-01-05 14:06:40'),
(32, 'faculties-manage', 'Faculties create', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:08:28', '2021-01-05 14:08:50'),
(33, 'faculties-view', 'Faculties view', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:09:14', '2021-01-05 14:09:14'),
(34, 'faculties-create', 'Faculties create', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:09:22', '2021-01-05 14:09:22'),
(35, 'faculties-edit', 'Faculties edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:09:34', '2021-01-05 14:09:34'),
(36, 'faculties-delete', 'Faculties delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 14:09:47', '2021-01-05 14:09:47'),
(37, 'study_levels-manage', 'Study levels manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:15:24', '2021-01-05 15:15:24'),
(38, 'study_levels-view', 'Study levels view', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:16:02', '2021-01-05 15:16:02'),
(39, 'study_levels-create', 'Study levels create', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:16:18', '2021-01-05 15:16:18'),
(40, 'study_levels-edit', 'Study levels edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:16:36', '2021-01-05 15:16:36'),
(41, 'study_levels-delete', 'Study levels delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:16:53', '2021-01-05 15:16:53'),
(42, 'intake_categories-manage', 'Intake categories manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:17:45', '2021-01-05 15:17:45'),
(43, 'intake_categories-view', 'Intake categories view', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:17:57', '2021-01-05 15:17:57'),
(44, 'intake_categories-create', 'Intake categories create', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:18:12', '2021-01-05 15:18:12'),
(45, 'intake_categories-edit', 'Intake categories edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:18:22', '2021-01-05 15:18:22'),
(46, 'intake_categories-delete', 'Intake categories delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:18:33', '2021-01-05 15:18:33'),
(47, 'semesters-manage', 'Semester manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:18:51', '2021-01-08 09:37:04'),
(48, 'semesters-view', 'Semester view', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:19:19', '2021-01-08 09:36:50'),
(49, 'semesters-create', 'Semester create', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:19:33', '2021-01-08 09:36:37'),
(50, 'semesters-edit', 'Semester edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:20:01', '2021-01-08 09:36:24'),
(51, 'semesters-delete', 'Semester delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:20:22', '2021-01-08 09:36:12'),
(52, 'enrollment-panel-manage', 'Admission manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:22:19', '2025-04-18 04:00:18'),
(53, 'admissions-import_student', 'Admission import student', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:24:09', '2021-01-05 18:01:32'),
(54, 'admissions-view', 'Admission class list view', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:25:26', '2021-01-05 18:01:14'),
(55, 'students-manage', 'Students manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:26:16', '2021-01-05 15:26:16'),
(56, 'students-view', 'Students view', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:26:54', '2021-01-05 15:26:54'),
(57, 'students-edit', 'Students edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:27:11', '2021-01-05 15:27:11'),
(58, 'students-delete', 'Students delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:27:24', '2021-01-05 15:27:24'),
(59, 'students-restore', 'Students restoe', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:27:38', '2021-03-09 10:26:05'),
(60, 'programs-manage', 'Programs manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:30:28', '2021-01-05 15:30:28'),
(61, 'programs-view', 'Programs view', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:30:45', '2021-01-05 15:30:45'),
(62, 'programs-create', 'Programs create', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:30:59', '2021-01-05 15:30:59'),
(63, 'programs-edit', 'Programs edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:31:13', '2021-01-05 15:31:13'),
(64, 'programs-delete', 'Programs delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:31:25', '2021-01-05 15:31:25'),
(65, 'courses-manage', 'Courses manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:33:17', '2021-01-05 15:33:17'),
(66, 'courses-view', 'Courses view', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:33:44', '2021-01-05 15:33:44'),
(67, 'courses-create', 'Courses create', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:34:02', '2021-01-05 15:34:02'),
(68, 'courses-edit', 'Courses edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:34:14', '2021-01-05 15:34:14'),
(69, 'courses-delete', 'Courses detete', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:34:37', '2021-01-10 03:28:00'),
(70, 'courses-register_core_subjects', 'Courses register core subjects', NULL, NULL, 0, NULL, NULL, '2021-01-05 15:36:14', '2021-01-05 15:36:14'),
(71, 'staffs-change_year', 'Staffs change year', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:08:35', '2021-01-05 17:08:35'),
(72, 'academic_years-manage', 'Academic years manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:44:18', '2021-01-05 17:44:18'),
(73, 'academic_years-view', 'Academic years view', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:44:31', '2021-01-05 17:44:31'),
(74, 'academic_years-create', 'Academic years create', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:44:45', '2021-01-05 17:44:45'),
(75, 'academic_years-edit', 'Academic years edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:44:58', '2021-01-05 17:44:58'),
(76, 'academic_years-delete', 'Academic years delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:45:10', '2021-01-05 17:45:10'),
(77, 'sponsors-manage', 'Sponsors manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:49:12', '2021-01-05 17:49:12'),
(78, 'sponsors-view', 'Sponsors view', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:49:37', '2021-01-05 17:49:37'),
(79, 'sponsors-create', 'Sponsors create', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:49:50', '2021-01-05 17:49:50'),
(80, 'sponsors-edit', 'Sponsors edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:50:02', '2021-01-05 17:50:02'),
(81, 'sponsors-delete', 'Sponsors delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:50:12', '2021-01-05 17:50:12'),
(82, 'departments-manage', 'Departments manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:53:54', '2021-01-05 17:53:54'),
(83, 'departments-view', 'Departments view', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:54:03', '2021-01-05 17:54:03'),
(84, 'departments-create', 'Departments edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:54:28', '2021-01-05 17:54:42'),
(85, 'departments-edit', 'Departments edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:54:52', '2021-01-05 17:54:52'),
(86, 'departments-delete', 'Departments delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 17:55:01', '2021-01-05 17:55:01'),
(87, 'exam-categories-manage', 'Exam categories manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 18:05:50', '2021-01-05 18:05:50'),
(88, 'exam-categories-view', 'Exam categories view', NULL, NULL, 0, NULL, NULL, '2021-01-05 18:06:02', '2021-01-05 18:06:02'),
(89, 'exam-categories-create', 'Exam categories create', NULL, NULL, 0, NULL, NULL, '2021-01-05 18:06:20', '2021-01-05 18:06:20'),
(90, 'exam-categories-edit', 'Exam categories edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 18:06:33', '2021-01-05 18:06:33'),
(91, 'exam-categories-delete', 'Exam categories delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 18:06:47', '2021-01-05 18:06:47'),
(92, 'payments-manage', 'Payments manage', NULL, NULL, 0, NULL, NULL, '2021-01-05 18:09:58', '2021-01-05 18:09:58'),
(93, 'payments-view', 'Payments view', NULL, NULL, 0, NULL, NULL, '2021-01-05 18:10:21', '2021-01-05 18:10:21'),
(94, 'payments-create', 'Payments create', NULL, NULL, 0, NULL, NULL, '2021-01-05 18:10:30', '2021-01-05 18:10:30'),
(95, 'payments-edit', 'Payments edit', NULL, NULL, 0, NULL, NULL, '2021-01-05 18:10:39', '2021-01-05 18:10:39'),
(96, 'payments-delete', 'Payments delete', NULL, NULL, 0, NULL, NULL, '2021-01-05 18:10:49', '2021-01-05 18:10:49'),
(97, 'positions-manage', 'Positions manage', NULL, NULL, 0, NULL, NULL, '2021-01-07 10:26:16', '2021-01-07 10:26:16'),
(98, 'positions-create', 'Positions create', NULL, NULL, 0, NULL, NULL, '2021-01-07 10:26:28', '2021-01-07 10:26:28'),
(99, 'positions-view', 'Positions view', NULL, NULL, 0, NULL, NULL, '2021-01-07 10:26:40', '2021-01-07 10:26:40'),
(100, 'positions-delete', 'Positions delete', NULL, NULL, 0, NULL, NULL, '2021-01-07 10:26:51', '2021-01-07 10:26:51'),
(101, 'positions-edit', 'Positions edit', NULL, NULL, 0, NULL, NULL, '2021-01-07 10:27:01', '2021-01-07 10:27:01'),
(102, 'database-manage', 'Database query', NULL, NULL, 0, NULL, NULL, '2021-01-08 07:31:31', '2021-01-08 07:31:55'),
(103, 'database-query', 'Database query', NULL, NULL, 0, NULL, NULL, '2021-01-08 07:31:43', '2021-01-08 07:31:43'),
(104, 'admissions-search_students', 'Admissions search students', NULL, NULL, 0, NULL, NULL, '2021-01-10 07:18:44', '2021-01-10 07:18:44'),
(105, 'dashboard-view', 'Dashboard view', NULL, NULL, 0, NULL, NULL, '2021-01-11 03:30:28', '2021-01-11 03:30:28'),
(107, 'timetable-manage', 'Timetable manage', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:01:22', '2021-01-12 05:01:22'),
(108, 'timetable-create', 'Timetable create', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:01:39', '2021-01-12 05:01:39'),
(109, 'timetable-view', 'Timetable view', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:01:52', '2021-01-12 05:01:52'),
(110, 'timetable-edit', 'Timetable edit', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:02:12', '2021-01-12 05:02:12'),
(111, 'timetable-edit', 'Timetable edit', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:02:12', '2021-01-12 05:02:12'),
(112, 'timetable-delete', 'Timetable delete', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:02:29', '2021-01-12 05:02:29'),
(113, 'administrations-manage', 'Administrations manage', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:41:18', '2021-01-12 05:41:18'),
(114, 'administrations-create', 'Administrations create', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:41:27', '2021-01-12 05:41:27'),
(115, 'administrations-view', 'Administrations view', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:41:38', '2021-01-12 05:41:38'),
(116, 'administrations-edit', 'Administrations edit', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:41:49', '2021-01-12 05:41:49'),
(117, 'administrations-delete', 'Administrations delete', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:43:29', '2021-01-12 05:43:29'),
(118, 'examinations-manage', 'Examinations manage', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:43:42', '2021-01-12 05:43:42'),
(119, 'examinations-create', 'Examinations create', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:43:51', '2021-01-12 05:43:51'),
(120, 'examinations-view', 'Examinations view', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:44:01', '2021-01-12 05:44:01'),
(121, 'examinations-edit', 'Examinations edit', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:44:16', '2021-01-12 05:44:16'),
(122, 'examinations-delete', 'Examinations delete', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:44:26', '2021-01-12 05:44:26'),
(123, 'examinations-search_student_results', 'Examinations search student results', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:44:33', '2021-01-12 05:44:33'),
(124, 'communications-manage', 'Communications manage', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:44:48', '2021-01-12 05:44:48'),
(125, 'communications-create', 'Communications create', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:44:58', '2021-01-12 05:44:58'),
(126, 'communications-view', 'Communications view', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:45:07', '2021-01-12 05:45:07'),
(127, 'communications-delete', 'Communications delete', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:45:17', '2021-01-12 05:45:17'),
(128, 'communications-edit', 'Communications edit', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:45:34', '2021-01-12 05:45:34'),
(129, 'e-voting-manage', 'E voting manage', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:46:10', '2021-01-12 05:46:10'),
(130, 'e-voting-create', 'E voting create', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:46:20', '2021-01-12 05:46:20'),
(131, 'e-voting-view', 'E voting view', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:47:46', '2021-01-12 05:47:46'),
(132, 'e-voting-edit', 'E voting edit', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:47:55', '2021-01-12 05:47:55'),
(133, 'e-voting-delete', 'E voting delete', NULL, NULL, 0, NULL, NULL, '2021-01-12 05:48:04', '2021-01-12 05:48:04'),
(134, 'student_panel-manage', 'Student panel manage', NULL, NULL, 0, NULL, NULL, '2021-01-12 15:57:23', '2021-01-12 15:57:23'),
(135, 'courses-assign_to_instructor', 'Courses assign to instructor', NULL, NULL, 0, NULL, NULL, '2021-01-12 18:29:19', '2021-01-12 18:29:19'),
(136, 'administrations-manage', 'Administrations manage', NULL, NULL, 0, NULL, NULL, '2021-01-16 11:51:36', '2021-01-16 11:51:36'),
(137, 'staffs-profile-manage', 'Staffs profile manage', NULL, NULL, 0, NULL, NULL, '2021-01-17 05:43:24', '2021-01-17 05:43:24'),
(138, 'grades-manage', 'Grades manage', NULL, NULL, 0, NULL, NULL, '2021-02-15 07:43:26', '2021-02-15 07:43:26'),
(139, 'grades-view', 'Grades view', NULL, NULL, 0, NULL, NULL, '2021-02-15 07:43:51', '2021-02-15 07:43:51'),
(140, 'grades-create', 'Grades create', NULL, NULL, 0, NULL, NULL, '2021-02-15 07:44:05', '2021-02-15 07:44:05'),
(141, 'grades-edit', 'Grades edit', NULL, NULL, 0, NULL, NULL, '2021-02-15 07:44:18', '2021-02-15 07:44:18'),
(142, 'grades-delete', 'Grades delete', NULL, NULL, 0, NULL, NULL, '2021-02-15 07:44:32', '2021-02-15 07:44:32'),
(143, 'administrations-manage', 'Administrations manage', NULL, NULL, 0, NULL, NULL, '2021-02-15 07:44:43', '2021-02-15 07:44:43'),
(144, 'gpa-classifications-manage', 'Gpa classifications manage', NULL, NULL, 0, NULL, NULL, '2021-02-15 07:45:01', '2021-02-15 07:45:01'),
(145, 'gpa_classifications-view', 'Gpa classifications view', NULL, NULL, 0, NULL, NULL, '2021-02-15 07:45:13', '2021-02-15 07:45:13'),
(146, 'gpa_classifications-create', 'Gpa classifications create', NULL, NULL, 0, NULL, NULL, '2021-02-15 07:45:27', '2021-02-15 07:45:27'),
(147, 'gpa_classifications-edit', 'Gpa classifications edit', NULL, NULL, 0, NULL, NULL, '2021-02-15 07:45:41', '2021-02-15 07:45:41'),
(148, 'gpa_classifications-delete', 'Gpa classifications delete', NULL, NULL, 0, NULL, NULL, '2021-02-15 07:45:57', '2021-02-15 07:45:57'),
(149, 'usermanual-view', 'Usermanual view', NULL, NULL, 0, NULL, NULL, '2021-03-02 11:07:24', '2021-03-03 06:05:17'),
(150, 'user-login-history', 'Students logs', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:47:21', '2025-04-21 07:14:27'),
(151, 'Student-Remark', 'Student remark', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:47:56', '2021-03-09 06:47:56'),
(152, 'limit-registration', 'Limit registration', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:49:02', '2021-03-09 06:49:02'),
(153, 'limit-upload', 'Limit upload', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:49:26', '2021-03-09 06:49:26'),
(154, 'change-semester-exam', 'Change semester exam', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:49:46', '2021-03-09 06:49:46'),
(155, 'module-allocation', 'Module allocation', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:50:33', '2021-03-09 06:50:33'),
(156, 'class-list-view', 'Class list view', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:50:52', '2021-03-09 06:50:52'),
(157, 'update-class-list', 'Update class list', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:51:09', '2021-03-09 06:51:09'),
(158, 'student-search', 'Student search', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:51:28', '2021-03-09 06:51:28'),
(159, 'grade-book-view', 'Grade book view', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:51:58', '2021-03-09 06:51:58'),
(160, 'course-results-view', 'Course results view', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:52:17', '2021-03-09 06:52:17'),
(161, 'semester-results-view', 'Semester results view', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:52:39', '2021-03-09 06:52:39'),
(162, 'NTA-semester-results-view', 'N t a semester results view', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:53:09', '2021-03-09 06:53:09'),
(163, 'annual-results-view', 'Annual results view', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:53:29', '2021-03-09 06:53:29'),
(164, 'candidate-transcript-view', 'Candidate transcript view', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:53:48', '2021-03-09 06:53:48'),
(165, 'candidate-statement', 'Candidate statement', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:54:11', '2021-03-09 06:54:11'),
(166, 'elective-course-view', 'Elective course view', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:54:28', '2021-03-09 06:54:28'),
(167, 'supplementary-report-view', 'Supplementary report view', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:54:51', '2021-03-09 06:54:51'),
(168, 'special-report-view', 'Special report view', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:55:25', '2021-03-09 06:55:25'),
(169, 'student-register', 'Student register', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:55:43', '2021-03-09 06:55:43'),
(170, 'publish-exam', 'Publish exam', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:56:03', '2021-03-09 06:56:03'),
(171, 'assigned-module-list', 'My module list', NULL, NULL, 0, NULL, NULL, '2021-03-09 06:56:21', '2025-04-16 07:50:06'),
(172, 'module-offering-view', 'Module offering view', NULL, NULL, 0, NULL, NULL, '2021-03-10 06:42:08', '2021-03-10 06:42:08'),
(173, 'module-config-view', 'Module config view', NULL, NULL, 0, NULL, NULL, '2021-03-10 06:42:20', '2021-03-10 06:42:20'),
(174, 'staff-modules-view', 'Staff modules view', NULL, NULL, 0, NULL, NULL, '2021-03-10 18:04:46', '2021-03-10 18:04:46'),
(175, 'coursework-results-view', 'Coursework results view', NULL, NULL, 0, NULL, NULL, '2021-03-11 05:23:57', '2021-03-11 05:23:57'),
(176, 'blocked-students', 'Blocked students', NULL, NULL, 0, NULL, NULL, '2021-04-15 04:32:34', '2021-04-15 04:32:34'),
(177, 'hostel-manage', 'Hostel manage', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:37:41', '2021-05-06 06:37:41'),
(178, 'hostel-create', 'Hostel create', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:37:58', '2021-05-06 06:37:58'),
(179, 'hostel-view', 'Hostel view', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:38:19', '2021-05-06 06:38:19'),
(180, 'block-create', 'Block create', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:38:37', '2021-05-06 06:38:37'),
(181, 'room-create', 'Room create', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:38:56', '2021-05-06 06:38:56'),
(182, 'room-view', 'Room view', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:39:22', '2021-05-06 06:39:22'),
(183, 'accommodation-manage', 'Accommodation manage', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:39:42', '2021-05-06 06:39:42'),
(184, 'class-list-view', 'Class list view', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:39:56', '2021-05-06 06:39:56'),
(185, 'application-create', 'Application create', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:40:12', '2021-05-06 06:40:12'),
(186, 'application-view', 'Application view', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:40:23', '2021-05-06 06:40:23'),
(187, 'allocation-create', 'Allocation create', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:40:40', '2021-05-06 06:40:40'),
(188, 'allocation-view', 'Allocation view', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:41:08', '2021-05-06 06:41:08'),
(189, 'vacant-room-view', 'Vacant room view', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:41:30', '2021-05-06 06:41:30'),
(190, 'current-allocation-view', 'Current allocation view', NULL, NULL, 0, NULL, NULL, '2021-05-06 06:41:43', '2021-05-06 06:41:43'),
(191, 'fee-structure-view', 'Fee structure view', NULL, NULL, 0, NULL, NULL, '2025-03-27 08:33:14', '2025-03-27 08:33:14'),
(192, 'fee-straucture-create', 'Fee straucture create', NULL, NULL, 0, NULL, NULL, '2025-03-27 08:33:24', '2025-03-27 08:33:24'),
(193, 'manage-overall-reports', 'Report manage', NULL, NULL, 0, NULL, NULL, '2025-03-27 08:42:12', '2025-04-21 07:38:48'),
(194, 'center-view', 'Center view', NULL, NULL, 0, NULL, NULL, '2025-03-27 09:26:16', '2025-03-27 09:26:16'),
(195, 'center-create', 'Center create', NULL, NULL, 0, NULL, NULL, '2025-03-27 09:35:07', '2025-03-27 09:35:07'),
(196, 'center-edit', 'Center edit', NULL, NULL, 0, NULL, NULL, '2025-03-27 09:35:21', '2025-03-27 09:35:21'),
(197, 'center-delete', 'Center delete', NULL, NULL, 0, NULL, NULL, '2025-03-27 09:35:30', '2025-03-27 09:35:30'),
(199, 'examinations-settings', 'Examinations settings', NULL, NULL, 0, NULL, NULL, '2025-04-16 08:01:17', '2025-04-16 08:01:17'),
(200, 'debtors-view', 'Debtors view', NULL, NULL, 0, NULL, NULL, '2025-04-21 04:44:38', '2025-04-21 04:44:38'),
(201, 'accounting-manage', 'Accounting manage', NULL, NULL, 0, NULL, NULL, '2025-04-21 04:44:51', '2025-04-21 04:44:51'),
(202, 'ageing-analysis', 'Ageing analysis', NULL, NULL, 0, NULL, NULL, '2025-04-21 04:45:17', '2025-04-21 04:45:17'),
(203, 'billing-view', 'Billing view', NULL, NULL, 0, NULL, NULL, '2025-04-21 05:28:35', '2025-04-21 05:28:35'),
(204, 'fee_types-view', 'Fee types view', NULL, NULL, 0, NULL, NULL, '2025-04-21 05:34:47', '2025-04-21 05:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint UNSIGNED NOT NULL,
  `year` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0:inactive,1:active',
  `last_reg_no` bigint UNSIGNED NOT NULL DEFAULT '0',
  `last_reg_no_graduate` bigint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `year`, `status`, `last_reg_no`, `last_reg_no_graduate`, `created_at`, `updated_at`) VALUES
(11, '2021', '0', 0, 0, '2021-03-11 09:54:32', '2025-07-07 10:29:11'),
(12, '2022', '0', 0, 0, '2025-04-09 23:53:53', '2025-07-07 10:29:04'),
(13, '2023', '0', 0, 0, '2025-04-09 23:54:07', '2025-07-07 10:28:53'),
(14, '2024', '0', 0, 0, '2025-04-09 23:54:19', '2025-07-07 10:28:44'),
(15, '2025', '1', 0, 0, '2025-07-07 10:28:35', '2025-07-07 10:28:35'),
(16, '2026', '0', 0, 0, '2025-07-07 10:29:24', '2025-07-07 10:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

CREATE TABLE `allocations` (
  `id` bigint UNSIGNED NOT NULL,
  `hostel_id` bigint UNSIGNED DEFAULT NULL,
  `room_id` bigint UNSIGNED DEFAULT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` bigint UNSIGNED DEFAULT NULL,
  `check_out` timestamp NOT NULL,
  `check_in` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `annual_report_remarks`
--

CREATE TABLE `annual_report_remarks` (
  `id` bigint UNSIGNED NOT NULL,
  `gender` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` bigint UNSIGNED DEFAULT NULL,
  `program_id` bigint UNSIGNED DEFAULT NULL,
  `batch_no` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `annual_results`
--

CREATE TABLE `annual_results` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `total_credits` decimal(8,0) NOT NULL,
  `total_points` decimal(8,0) NOT NULL,
  `gpa` decimal(8,1) NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year_of_study` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annual_results`
--

INSERT INTO `annual_results` (`id`, `reg_no`, `year_id`, `total_credits`, `total_points`, `gpa`, `remarks`, `classification`, `created_at`, `updated_at`, `year_of_study`) VALUES
(1, 'NS0772/0099/2020', 14, '63', '246', '3.9', 'Pass', 'Pass', '2025-04-13 19:15:36', '2025-04-19 22:20:08', 1),
(2, 'NS5289/0024/2023', 14, '63', '246', '3.9', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:08', 1),
(3, 'NP1153/0013/2023', 14, '63', '196', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:08', 1),
(4, 'NS5357/0001/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:08', 1),
(5, 'NS0672/0001/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:08', 1),
(6, 'NS2367/0005/2023', 14, '63', '199', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:08', 1),
(7, 'NS0294/0005/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:09', 1),
(8, 'NS0916/0003/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:09', 1),
(9, 'NS1375/0002/2023', 14, '63', '199', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:09', 1),
(10, 'NS0547/0015/2023', 14, '63', '197', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:09', 1),
(11, 'NS0345/0172/2023', 14, '63', '208', '3.3', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:09', 1),
(12, 'NS1394/0007/2023', 14, '63', '197', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:09', 1),
(13, 'NS4740/0008/2023', 14, '63', '225', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:09', 1),
(14, 'NEQ2022001913/2020', 14, '63', '193', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(15, 'NS3371/0102/2023', 14, '63', '218', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(16, 'NS3897/0088/2023', 14, '63', '219', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(17, 'NS3757/0023/2023', 14, '63', '205', '3.3', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(18, 'NS3981/0011/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(19, 'NS3453/0010/2023', 14, '63', '178', '2.8', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(20, 'NS5156/0084/2023', 14, '63', '223', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(21, 'NS2510/0010/2023', 14, '63', '252', '4.0', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(22, 'NS0970/0015/2023', 14, '63', '230', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(23, 'NS3834/0019/2018', 14, '63', '246', '3.9', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(24, 'NS0850/0022/2022', 14, '63', '203', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(25, 'NS1027/0179/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(26, 'NS4569/0030/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(27, 'NS4740/0041/2023', 14, '63', '209', '3.3', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:11', 1),
(28, 'NS1618/0012/2023', 14, '63', '207', '3.3', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(29, 'NS1060/0017/2023', 14, '63', '219', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(30, 'NS5033/0020/2022', 14, '63', '230', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(31, 'NS0722/0031/2023', 14, '63', '192', '3.0', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(32, 'NS4740/0048/2023', 14, '63', '196', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(33, 'NS4498/0051/2020', 14, '63', '220', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(34, 'NS0241/0039/2020', 14, '63', '229', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(35, 'NS0414/0019/2023', 14, '63', '246', '3.9', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(36, 'NS0197/0009/2020', 14, '63', '221', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:13', 1),
(37, 'NS3893/0156/2023', 14, '63', '201', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:13', 1),
(38, 'NS0672/0057/2023', 14, '63', '223', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:13', 1),
(39, 'NS4816/0040/2021', 14, '63', '229', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:13', 1),
(40, 'NS1633/0164/2023', 14, '63', '201', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:13', 1),
(41, 'NS4208/0008/2022', 14, '63', '208', '3.3', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:13', 1),
(42, 'NS3897/0105/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:13', 1),
(43, 'NS0526/0115/2021', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(44, 'NS0274/0046/2023', 14, '63', '230', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(45, 'NS6048/0056/2023', 14, '63', '219', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(46, 'NS4006/0030/2021', 14, '63', '229', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(47, 'NS2505/0044/2017', 14, '63', '214', '3.4', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(48, 'NS4238/0026/2021', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(49, 'NS3351/0179/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:14', 1),
(50, 'NS4117/0256/2022', 14, '63', '179', '2.8', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(51, 'NS3321/0044/2021', 14, '63', '189', '3.0', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(52, 'NS5551/0011/2021', 14, '63', '229', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(53, 'NS0345/0088/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(54, 'NS4710/0030/2023', 14, '63', '196', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(55, 'NS5822/0117/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(56, 'NS1097/0129/2021', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(57, 'NS1633/0136/2021', 14, '63', '240', '3.8', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:16', 1),
(58, 'NS0672/0094/2021', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:16', 1),
(59, 'NS2521/0024/2021', 14, '63', '246', '3.9', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(60, 'NS1581/0075/2023', 14, '63', '223', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(61, 'NS2315/0115/2021', 14, '63', '215', '3.4', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(62, 'NS2171/0052/2023', 14, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(63, 'NS2424/0074/2023', 14, '63', '163', '2.6', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(64, 'NS0632/0053/2023', 14, '63', '180', '2.9', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(65, 'NS0672/0135/2023', 14, '63', '186', '3.0', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:17', 1),
(66, 'NS5376/0082/2023', 14, '63', '202', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:17', 1),
(67, 'NS3228/0285/2022', 14, '63', '201', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:17', 1),
(68, 'NS0541/0100/2023', 14, '63', '220', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:17', 1),
(69, 'NS3534/0025/2023', 14, '63', '239', '3.8', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:17', 1),
(70, 'NS5251/0066/2023', 14, '63', '203', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:17', 1),
(71, 'NS5298/0057/2023', 14, '63', '189', '3.0', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:17', 1),
(72, 'NS4897/0091/2023', 14, '63', '200', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `annual_result_summaries`
--

CREATE TABLE `annual_result_summaries` (
  `id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `total_male_pass` int UNSIGNED NOT NULL,
  `total_male_fail` int UNSIGNED NOT NULL,
  `total_female_pass` int UNSIGNED NOT NULL,
  `total_female_fail` int UNSIGNED NOT NULL,
  `total_pass` int UNSIGNED NOT NULL,
  `total_fail` int UNSIGNED NOT NULL,
  `grand_total` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annual_result_summaries`
--

INSERT INTO `annual_result_summaries` (`id`, `program_id`, `year_id`, `total_male_pass`, `total_male_fail`, `total_female_pass`, `total_female_fail`, `total_pass`, `total_fail`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 8, 14, 35, 0, 37, 0, 72, 0, 72, '2025-04-13 19:15:36', '2025-04-19 22:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `entity_id` bigint UNSIGNED NOT NULL,
  `entity_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `restricted_to_id` bigint UNSIGNED DEFAULT NULL,
  `restricted_to_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `role_id`, `entity_id`, `entity_type`, `restricted_to_id`, `restricted_to_type`, `scope`) VALUES
(15, 2, 21, 'App\\Models\\User', NULL, NULL, NULL),
(16, 2, 22, 'App\\Models\\User', NULL, NULL, NULL),
(17, 2, 23, 'App\\Models\\User', NULL, NULL, NULL),
(18, 2, 24, 'App\\Models\\User', NULL, NULL, NULL),
(19, 2, 25, 'App\\Models\\User', NULL, NULL, NULL),
(20, 2, 26, 'App\\Models\\User', NULL, NULL, NULL),
(22, 2, 28, 'App\\Models\\User', NULL, NULL, NULL),
(33, 2, 18, 'App\\Models\\User', NULL, NULL, NULL),
(37, 2, 20, 'App\\Models\\User', NULL, NULL, NULL),
(46, 2, 40, 'App\\Models\\User', NULL, NULL, NULL),
(49, 2, 43, 'App\\Models\\User', NULL, NULL, NULL),
(50, 2, 44, 'App\\Models\\User', NULL, NULL, NULL),
(52, 2, 41, 'App\\Models\\User', NULL, NULL, NULL),
(55, 2, 45, 'App\\Models\\User', NULL, NULL, NULL),
(59, 2, 49, 'App\\Models\\User', NULL, NULL, NULL),
(63, 2, 46, 'App\\Models\\User', NULL, NULL, NULL),
(64, 2, 47, 'App\\Models\\User', NULL, NULL, NULL),
(65, 2, 48, 'App\\Models\\User', NULL, NULL, NULL),
(68, 2, 55, 'App\\Models\\User', NULL, NULL, NULL),
(73, 2, 42, 'App\\Models\\User', NULL, NULL, NULL),
(82, 2, 35, 'App\\Models\\User', NULL, NULL, NULL),
(84, 2, 54, 'App\\Models\\User', NULL, NULL, NULL),
(100, 2, 72, 'App\\Models\\User', NULL, NULL, NULL),
(101, 2, 73, 'App\\Models\\User', NULL, NULL, NULL),
(102, 2, 74, 'App\\Models\\User', NULL, NULL, NULL),
(106, 2, 78, 'App\\Models\\User', NULL, NULL, NULL),
(107, 2, 79, 'App\\Models\\User', NULL, NULL, NULL),
(108, 2, 80, 'App\\Models\\User', NULL, NULL, NULL),
(110, 2, 82, 'App\\Models\\User', NULL, NULL, NULL),
(111, 2, 83, 'App\\Models\\User', NULL, NULL, NULL),
(112, 2, 84, 'App\\Models\\User', NULL, NULL, NULL),
(113, 2, 85, 'App\\Models\\User', NULL, NULL, NULL),
(114, 2, 86, 'App\\Models\\User', NULL, NULL, NULL),
(115, 2, 87, 'App\\Models\\User', NULL, NULL, NULL),
(116, 2, 88, 'App\\Models\\User', NULL, NULL, NULL),
(117, 2, 89, 'App\\Models\\User', NULL, NULL, NULL),
(118, 2, 90, 'App\\Models\\User', NULL, NULL, NULL),
(119, 2, 91, 'App\\Models\\User', NULL, NULL, NULL),
(120, 2, 92, 'App\\Models\\User', NULL, NULL, NULL),
(121, 2, 93, 'App\\Models\\User', NULL, NULL, NULL),
(122, 2, 94, 'App\\Models\\User', NULL, NULL, NULL),
(123, 2, 95, 'App\\Models\\User', NULL, NULL, NULL),
(124, 2, 96, 'App\\Models\\User', NULL, NULL, NULL),
(125, 2, 97, 'App\\Models\\User', NULL, NULL, NULL),
(126, 2, 98, 'App\\Models\\User', NULL, NULL, NULL),
(127, 2, 99, 'App\\Models\\User', NULL, NULL, NULL),
(128, 2, 100, 'App\\Models\\User', NULL, NULL, NULL),
(129, 2, 101, 'App\\Models\\User', NULL, NULL, NULL),
(130, 2, 102, 'App\\Models\\User', NULL, NULL, NULL),
(131, 2, 103, 'App\\Models\\User', NULL, NULL, NULL),
(132, 2, 104, 'App\\Models\\User', NULL, NULL, NULL),
(133, 2, 105, 'App\\Models\\User', NULL, NULL, NULL),
(134, 2, 106, 'App\\Models\\User', NULL, NULL, NULL),
(135, 2, 107, 'App\\Models\\User', NULL, NULL, NULL),
(136, 2, 108, 'App\\Models\\User', NULL, NULL, NULL),
(137, 2, 109, 'App\\Models\\User', NULL, NULL, NULL),
(150, 2, 122, 'App\\Models\\User', NULL, NULL, NULL),
(151, 2, 123, 'App\\Models\\User', NULL, NULL, NULL),
(152, 2, 124, 'App\\Models\\User', NULL, NULL, NULL),
(153, 2, 125, 'App\\Models\\User', NULL, NULL, NULL),
(154, 2, 126, 'App\\Models\\User', NULL, NULL, NULL),
(155, 2, 127, 'App\\Models\\User', NULL, NULL, NULL),
(156, 2, 128, 'App\\Models\\User', NULL, NULL, NULL),
(157, 2, 129, 'App\\Models\\User', NULL, NULL, NULL),
(158, 2, 130, 'App\\Models\\User', NULL, NULL, NULL),
(159, 2, 131, 'App\\Models\\User', NULL, NULL, NULL),
(160, 2, 132, 'App\\Models\\User', NULL, NULL, NULL),
(161, 2, 133, 'App\\Models\\User', NULL, NULL, NULL),
(162, 2, 134, 'App\\Models\\User', NULL, NULL, NULL),
(163, 2, 135, 'App\\Models\\User', NULL, NULL, NULL),
(164, 2, 136, 'App\\Models\\User', NULL, NULL, NULL),
(165, 2, 137, 'App\\Models\\User', NULL, NULL, NULL),
(166, 2, 138, 'App\\Models\\User', NULL, NULL, NULL),
(167, 2, 139, 'App\\Models\\User', NULL, NULL, NULL),
(168, 2, 140, 'App\\Models\\User', NULL, NULL, NULL),
(169, 2, 141, 'App\\Models\\User', NULL, NULL, NULL),
(171, 2, 143, 'App\\Models\\User', NULL, NULL, NULL),
(172, 2, 144, 'App\\Models\\User', NULL, NULL, NULL),
(173, 2, 145, 'App\\Models\\User', NULL, NULL, NULL),
(174, 2, 146, 'App\\Models\\User', NULL, NULL, NULL),
(175, 2, 147, 'App\\Models\\User', NULL, NULL, NULL),
(176, 2, 148, 'App\\Models\\User', NULL, NULL, NULL),
(177, 2, 149, 'App\\Models\\User', NULL, NULL, NULL),
(178, 2, 150, 'App\\Models\\User', NULL, NULL, NULL),
(179, 2, 151, 'App\\Models\\User', NULL, NULL, NULL),
(180, 2, 152, 'App\\Models\\User', NULL, NULL, NULL),
(181, 2, 153, 'App\\Models\\User', NULL, NULL, NULL),
(182, 2, 154, 'App\\Models\\User', NULL, NULL, NULL),
(183, 2, 155, 'App\\Models\\User', NULL, NULL, NULL),
(184, 2, 156, 'App\\Models\\User', NULL, NULL, NULL),
(185, 2, 157, 'App\\Models\\User', NULL, NULL, NULL),
(186, 2, 158, 'App\\Models\\User', NULL, NULL, NULL),
(187, 2, 159, 'App\\Models\\User', NULL, NULL, NULL),
(188, 2, 160, 'App\\Models\\User', NULL, NULL, NULL),
(189, 2, 161, 'App\\Models\\User', NULL, NULL, NULL),
(190, 2, 162, 'App\\Models\\User', NULL, NULL, NULL),
(191, 2, 163, 'App\\Models\\User', NULL, NULL, NULL),
(192, 2, 164, 'App\\Models\\User', NULL, NULL, NULL),
(193, 2, 165, 'App\\Models\\User', NULL, NULL, NULL),
(194, 2, 166, 'App\\Models\\User', NULL, NULL, NULL),
(195, 2, 167, 'App\\Models\\User', NULL, NULL, NULL),
(196, 2, 168, 'App\\Models\\User', NULL, NULL, NULL),
(197, 2, 169, 'App\\Models\\User', NULL, NULL, NULL),
(198, 2, 170, 'App\\Models\\User', NULL, NULL, NULL),
(199, 2, 171, 'App\\Models\\User', NULL, NULL, NULL),
(200, 2, 172, 'App\\Models\\User', NULL, NULL, NULL),
(201, 2, 173, 'App\\Models\\User', NULL, NULL, NULL),
(202, 2, 174, 'App\\Models\\User', NULL, NULL, NULL),
(203, 2, 175, 'App\\Models\\User', NULL, NULL, NULL),
(204, 2, 176, 'App\\Models\\User', NULL, NULL, NULL),
(205, 2, 177, 'App\\Models\\User', NULL, NULL, NULL),
(206, 2, 71, 'App\\Models\\User', NULL, NULL, NULL),
(207, 2, 178, 'App\\Models\\User', NULL, NULL, NULL),
(208, 2, 179, 'App\\Models\\User', NULL, NULL, NULL),
(209, 2, 180, 'App\\Models\\User', NULL, NULL, NULL),
(210, 2, 81, 'App\\Models\\User', NULL, NULL, NULL),
(262, 2, 228, 'App\\Models\\User', NULL, NULL, NULL),
(263, 2, 229, 'App\\Models\\User', NULL, NULL, NULL),
(264, 2, 230, 'App\\Models\\User', NULL, NULL, NULL),
(265, 2, 231, 'App\\Models\\User', NULL, NULL, NULL),
(266, 2, 232, 'App\\Models\\User', NULL, NULL, NULL),
(267, 2, 233, 'App\\Models\\User', NULL, NULL, NULL),
(268, 2, 234, 'App\\Models\\User', NULL, NULL, NULL),
(269, 2, 235, 'App\\Models\\User', NULL, NULL, NULL),
(270, 2, 236, 'App\\Models\\User', NULL, NULL, NULL),
(273, 5, 181, 'App\\Models\\User', NULL, NULL, NULL),
(279, 2, 142, 'App\\Models\\User', NULL, NULL, NULL),
(280, 2, 76, 'App\\Models\\User', NULL, NULL, NULL),
(283, 2, 240, 'App\\Models\\User', NULL, NULL, NULL),
(284, 2, 241, 'App\\Models\\User', NULL, NULL, NULL),
(285, 2, 242, 'App\\Models\\User', NULL, NULL, NULL),
(286, 2, 243, 'App\\Models\\User', NULL, NULL, NULL),
(287, 2, 244, 'App\\Models\\User', NULL, NULL, NULL),
(288, 2, 245, 'App\\Models\\User', NULL, NULL, NULL),
(289, 2, 246, 'App\\Models\\User', NULL, NULL, NULL),
(290, 2, 247, 'App\\Models\\User', NULL, NULL, NULL),
(291, 2, 248, 'App\\Models\\User', NULL, NULL, NULL),
(292, 2, 249, 'App\\Models\\User', NULL, NULL, NULL),
(293, 2, 250, 'App\\Models\\User', NULL, NULL, NULL),
(294, 2, 251, 'App\\Models\\User', NULL, NULL, NULL),
(295, 2, 252, 'App\\Models\\User', NULL, NULL, NULL),
(296, 2, 253, 'App\\Models\\User', NULL, NULL, NULL),
(297, 2, 254, 'App\\Models\\User', NULL, NULL, NULL),
(298, 2, 255, 'App\\Models\\User', NULL, NULL, NULL),
(299, 2, 256, 'App\\Models\\User', NULL, NULL, NULL),
(300, 2, 257, 'App\\Models\\User', NULL, NULL, NULL),
(301, 2, 258, 'App\\Models\\User', NULL, NULL, NULL),
(302, 2, 259, 'App\\Models\\User', NULL, NULL, NULL),
(303, 2, 260, 'App\\Models\\User', NULL, NULL, NULL),
(304, 2, 261, 'App\\Models\\User', NULL, NULL, NULL),
(305, 2, 262, 'App\\Models\\User', NULL, NULL, NULL),
(306, 2, 263, 'App\\Models\\User', NULL, NULL, NULL),
(307, 2, 264, 'App\\Models\\User', NULL, NULL, NULL),
(308, 2, 265, 'App\\Models\\User', NULL, NULL, NULL),
(309, 2, 266, 'App\\Models\\User', NULL, NULL, NULL),
(310, 2, 267, 'App\\Models\\User', NULL, NULL, NULL),
(311, 2, 268, 'App\\Models\\User', NULL, NULL, NULL),
(312, 2, 269, 'App\\Models\\User', NULL, NULL, NULL),
(313, 2, 270, 'App\\Models\\User', NULL, NULL, NULL),
(314, 2, 271, 'App\\Models\\User', NULL, NULL, NULL),
(315, 2, 272, 'App\\Models\\User', NULL, NULL, NULL),
(316, 2, 273, 'App\\Models\\User', NULL, NULL, NULL),
(317, 2, 274, 'App\\Models\\User', NULL, NULL, NULL),
(318, 2, 275, 'App\\Models\\User', NULL, NULL, NULL),
(319, 2, 276, 'App\\Models\\User', NULL, NULL, NULL),
(320, 2, 277, 'App\\Models\\User', NULL, NULL, NULL),
(321, 2, 278, 'App\\Models\\User', NULL, NULL, NULL),
(322, 2, 279, 'App\\Models\\User', NULL, NULL, NULL),
(323, 2, 280, 'App\\Models\\User', NULL, NULL, NULL),
(324, 2, 281, 'App\\Models\\User', NULL, NULL, NULL),
(325, 2, 282, 'App\\Models\\User', NULL, NULL, NULL),
(326, 2, 283, 'App\\Models\\User', NULL, NULL, NULL),
(327, 2, 284, 'App\\Models\\User', NULL, NULL, NULL),
(328, 2, 285, 'App\\Models\\User', NULL, NULL, NULL),
(329, 2, 286, 'App\\Models\\User', NULL, NULL, NULL),
(330, 2, 287, 'App\\Models\\User', NULL, NULL, NULL),
(331, 2, 288, 'App\\Models\\User', NULL, NULL, NULL),
(332, 2, 289, 'App\\Models\\User', NULL, NULL, NULL),
(333, 2, 290, 'App\\Models\\User', NULL, NULL, NULL),
(334, 2, 291, 'App\\Models\\User', NULL, NULL, NULL),
(335, 2, 292, 'App\\Models\\User', NULL, NULL, NULL),
(336, 2, 293, 'App\\Models\\User', NULL, NULL, NULL),
(337, 2, 294, 'App\\Models\\User', NULL, NULL, NULL),
(338, 2, 295, 'App\\Models\\User', NULL, NULL, NULL),
(339, 2, 296, 'App\\Models\\User', NULL, NULL, NULL),
(340, 2, 297, 'App\\Models\\User', NULL, NULL, NULL),
(341, 2, 298, 'App\\Models\\User', NULL, NULL, NULL),
(342, 2, 299, 'App\\Models\\User', NULL, NULL, NULL),
(343, 2, 300, 'App\\Models\\User', NULL, NULL, NULL),
(344, 2, 301, 'App\\Models\\User', NULL, NULL, NULL),
(345, 2, 302, 'App\\Models\\User', NULL, NULL, NULL),
(346, 2, 303, 'App\\Models\\User', NULL, NULL, NULL),
(347, 2, 304, 'App\\Models\\User', NULL, NULL, NULL),
(348, 2, 305, 'App\\Models\\User', NULL, NULL, NULL),
(349, 2, 306, 'App\\Models\\User', NULL, NULL, NULL),
(350, 2, 307, 'App\\Models\\User', NULL, NULL, NULL),
(351, 2, 308, 'App\\Models\\User', NULL, NULL, NULL),
(352, 2, 309, 'App\\Models\\User', NULL, NULL, NULL),
(353, 2, 310, 'App\\Models\\User', NULL, NULL, NULL),
(354, 2, 311, 'App\\Models\\User', NULL, NULL, NULL),
(355, 2, 312, 'App\\Models\\User', NULL, NULL, NULL),
(356, 2, 313, 'App\\Models\\User', NULL, NULL, NULL),
(357, 2, 314, 'App\\Models\\User', NULL, NULL, NULL),
(358, 2, 315, 'App\\Models\\User', NULL, NULL, NULL),
(359, 2, 316, 'App\\Models\\User', NULL, NULL, NULL),
(360, 2, 317, 'App\\Models\\User', NULL, NULL, NULL),
(361, 2, 318, 'App\\Models\\User', NULL, NULL, NULL),
(362, 2, 319, 'App\\Models\\User', NULL, NULL, NULL),
(363, 2, 320, 'App\\Models\\User', NULL, NULL, NULL),
(364, 2, 321, 'App\\Models\\User', NULL, NULL, NULL),
(365, 2, 322, 'App\\Models\\User', NULL, NULL, NULL),
(366, 2, 323, 'App\\Models\\User', NULL, NULL, NULL),
(367, 2, 324, 'App\\Models\\User', NULL, NULL, NULL),
(368, 2, 325, 'App\\Models\\User', NULL, NULL, NULL),
(369, 2, 326, 'App\\Models\\User', NULL, NULL, NULL),
(370, 2, 327, 'App\\Models\\User', NULL, NULL, NULL),
(371, 2, 328, 'App\\Models\\User', NULL, NULL, NULL),
(372, 2, 329, 'App\\Models\\User', NULL, NULL, NULL),
(373, 2, 330, 'App\\Models\\User', NULL, NULL, NULL),
(374, 2, 331, 'App\\Models\\User', NULL, NULL, NULL),
(375, 2, 332, 'App\\Models\\User', NULL, NULL, NULL),
(376, 2, 333, 'App\\Models\\User', NULL, NULL, NULL),
(377, 2, 334, 'App\\Models\\User', NULL, NULL, NULL),
(378, 2, 335, 'App\\Models\\User', NULL, NULL, NULL),
(379, 2, 336, 'App\\Models\\User', NULL, NULL, NULL),
(380, 2, 337, 'App\\Models\\User', NULL, NULL, NULL),
(381, 2, 338, 'App\\Models\\User', NULL, NULL, NULL),
(382, 2, 339, 'App\\Models\\User', NULL, NULL, NULL),
(383, 2, 340, 'App\\Models\\User', NULL, NULL, NULL),
(384, 2, 341, 'App\\Models\\User', NULL, NULL, NULL),
(385, 2, 342, 'App\\Models\\User', NULL, NULL, NULL),
(386, 2, 343, 'App\\Models\\User', NULL, NULL, NULL),
(387, 2, 344, 'App\\Models\\User', NULL, NULL, NULL),
(388, 2, 345, 'App\\Models\\User', NULL, NULL, NULL),
(389, 2, 346, 'App\\Models\\User', NULL, NULL, NULL),
(390, 2, 347, 'App\\Models\\User', NULL, NULL, NULL),
(391, 2, 348, 'App\\Models\\User', NULL, NULL, NULL),
(392, 2, 349, 'App\\Models\\User', NULL, NULL, NULL),
(393, 2, 350, 'App\\Models\\User', NULL, NULL, NULL),
(394, 2, 351, 'App\\Models\\User', NULL, NULL, NULL),
(395, 2, 352, 'App\\Models\\User', NULL, NULL, NULL),
(396, 2, 353, 'App\\Models\\User', NULL, NULL, NULL),
(397, 2, 354, 'App\\Models\\User', NULL, NULL, NULL),
(398, 2, 355, 'App\\Models\\User', NULL, NULL, NULL),
(399, 2, 356, 'App\\Models\\User', NULL, NULL, NULL),
(400, 2, 357, 'App\\Models\\User', NULL, NULL, NULL),
(401, 2, 358, 'App\\Models\\User', NULL, NULL, NULL),
(402, 2, 359, 'App\\Models\\User', NULL, NULL, NULL),
(403, 2, 360, 'App\\Models\\User', NULL, NULL, NULL),
(404, 2, 361, 'App\\Models\\User', NULL, NULL, NULL),
(405, 2, 362, 'App\\Models\\User', NULL, NULL, NULL),
(406, 2, 363, 'App\\Models\\User', NULL, NULL, NULL),
(407, 2, 364, 'App\\Models\\User', NULL, NULL, NULL),
(408, 2, 365, 'App\\Models\\User', NULL, NULL, NULL),
(409, 2, 366, 'App\\Models\\User', NULL, NULL, NULL),
(410, 2, 367, 'App\\Models\\User', NULL, NULL, NULL),
(411, 2, 368, 'App\\Models\\User', NULL, NULL, NULL),
(412, 2, 369, 'App\\Models\\User', NULL, NULL, NULL),
(413, 2, 370, 'App\\Models\\User', NULL, NULL, NULL),
(414, 2, 371, 'App\\Models\\User', NULL, NULL, NULL),
(415, 2, 372, 'App\\Models\\User', NULL, NULL, NULL),
(416, 2, 373, 'App\\Models\\User', NULL, NULL, NULL),
(417, 2, 374, 'App\\Models\\User', NULL, NULL, NULL),
(418, 2, 375, 'App\\Models\\User', NULL, NULL, NULL),
(419, 2, 376, 'App\\Models\\User', NULL, NULL, NULL),
(420, 2, 377, 'App\\Models\\User', NULL, NULL, NULL),
(421, 2, 378, 'App\\Models\\User', NULL, NULL, NULL),
(422, 2, 379, 'App\\Models\\User', NULL, NULL, NULL),
(423, 2, 380, 'App\\Models\\User', NULL, NULL, NULL),
(424, 2, 381, 'App\\Models\\User', NULL, NULL, NULL),
(425, 2, 382, 'App\\Models\\User', NULL, NULL, NULL),
(426, 2, 383, 'App\\Models\\User', NULL, NULL, NULL),
(427, 2, 384, 'App\\Models\\User', NULL, NULL, NULL),
(428, 2, 385, 'App\\Models\\User', NULL, NULL, NULL),
(429, 2, 386, 'App\\Models\\User', NULL, NULL, NULL),
(430, 2, 387, 'App\\Models\\User', NULL, NULL, NULL),
(431, 2, 388, 'App\\Models\\User', NULL, NULL, NULL),
(432, 2, 389, 'App\\Models\\User', NULL, NULL, NULL),
(433, 2, 390, 'App\\Models\\User', NULL, NULL, NULL),
(434, 2, 391, 'App\\Models\\User', NULL, NULL, NULL),
(435, 2, 392, 'App\\Models\\User', NULL, NULL, NULL),
(436, 2, 393, 'App\\Models\\User', NULL, NULL, NULL),
(437, 2, 394, 'App\\Models\\User', NULL, NULL, NULL),
(438, 2, 395, 'App\\Models\\User', NULL, NULL, NULL),
(439, 2, 396, 'App\\Models\\User', NULL, NULL, NULL),
(440, 2, 397, 'App\\Models\\User', NULL, NULL, NULL),
(441, 2, 398, 'App\\Models\\User', NULL, NULL, NULL),
(442, 2, 399, 'App\\Models\\User', NULL, NULL, NULL),
(443, 2, 400, 'App\\Models\\User', NULL, NULL, NULL),
(445, 2, 402, 'App\\Models\\User', NULL, NULL, NULL),
(446, 2, 403, 'App\\Models\\User', NULL, NULL, NULL),
(447, 2, 404, 'App\\Models\\User', NULL, NULL, NULL),
(448, 2, 405, 'App\\Models\\User', NULL, NULL, NULL),
(449, 2, 406, 'App\\Models\\User', NULL, NULL, NULL),
(450, 2, 407, 'App\\Models\\User', NULL, NULL, NULL),
(451, 2, 408, 'App\\Models\\User', NULL, NULL, NULL),
(452, 2, 409, 'App\\Models\\User', NULL, NULL, NULL),
(453, 2, 410, 'App\\Models\\User', NULL, NULL, NULL),
(454, 2, 411, 'App\\Models\\User', NULL, NULL, NULL),
(455, 2, 412, 'App\\Models\\User', NULL, NULL, NULL),
(456, 2, 413, 'App\\Models\\User', NULL, NULL, NULL),
(457, 2, 414, 'App\\Models\\User', NULL, NULL, NULL),
(458, 2, 415, 'App\\Models\\User', NULL, NULL, NULL),
(459, 2, 416, 'App\\Models\\User', NULL, NULL, NULL),
(460, 2, 417, 'App\\Models\\User', NULL, NULL, NULL),
(461, 2, 418, 'App\\Models\\User', NULL, NULL, NULL),
(462, 2, 419, 'App\\Models\\User', NULL, NULL, NULL),
(463, 2, 420, 'App\\Models\\User', NULL, NULL, NULL),
(464, 2, 421, 'App\\Models\\User', NULL, NULL, NULL),
(465, 2, 422, 'App\\Models\\User', NULL, NULL, NULL),
(466, 2, 423, 'App\\Models\\User', NULL, NULL, NULL),
(467, 2, 424, 'App\\Models\\User', NULL, NULL, NULL),
(468, 2, 425, 'App\\Models\\User', NULL, NULL, NULL),
(469, 2, 426, 'App\\Models\\User', NULL, NULL, NULL),
(470, 2, 427, 'App\\Models\\User', NULL, NULL, NULL),
(471, 2, 428, 'App\\Models\\User', NULL, NULL, NULL),
(472, 2, 429, 'App\\Models\\User', NULL, NULL, NULL),
(473, 2, 430, 'App\\Models\\User', NULL, NULL, NULL),
(474, 2, 431, 'App\\Models\\User', NULL, NULL, NULL),
(475, 2, 432, 'App\\Models\\User', NULL, NULL, NULL),
(476, 2, 433, 'App\\Models\\User', NULL, NULL, NULL),
(477, 2, 434, 'App\\Models\\User', NULL, NULL, NULL),
(478, 2, 435, 'App\\Models\\User', NULL, NULL, NULL),
(479, 2, 436, 'App\\Models\\User', NULL, NULL, NULL),
(480, 2, 437, 'App\\Models\\User', NULL, NULL, NULL),
(481, 2, 438, 'App\\Models\\User', NULL, NULL, NULL),
(482, 2, 439, 'App\\Models\\User', NULL, NULL, NULL),
(483, 2, 440, 'App\\Models\\User', NULL, NULL, NULL),
(484, 2, 441, 'App\\Models\\User', NULL, NULL, NULL),
(485, 2, 442, 'App\\Models\\User', NULL, NULL, NULL),
(486, 2, 443, 'App\\Models\\User', NULL, NULL, NULL),
(487, 2, 444, 'App\\Models\\User', NULL, NULL, NULL),
(488, 2, 445, 'App\\Models\\User', NULL, NULL, NULL),
(489, 2, 446, 'App\\Models\\User', NULL, NULL, NULL),
(490, 2, 447, 'App\\Models\\User', NULL, NULL, NULL),
(491, 2, 448, 'App\\Models\\User', NULL, NULL, NULL),
(492, 2, 449, 'App\\Models\\User', NULL, NULL, NULL),
(493, 2, 450, 'App\\Models\\User', NULL, NULL, NULL),
(494, 2, 451, 'App\\Models\\User', NULL, NULL, NULL),
(495, 2, 452, 'App\\Models\\User', NULL, NULL, NULL),
(496, 2, 453, 'App\\Models\\User', NULL, NULL, NULL),
(497, 2, 454, 'App\\Models\\User', NULL, NULL, NULL),
(498, 2, 455, 'App\\Models\\User', NULL, NULL, NULL),
(499, 2, 456, 'App\\Models\\User', NULL, NULL, NULL),
(500, 2, 457, 'App\\Models\\User', NULL, NULL, NULL),
(501, 2, 458, 'App\\Models\\User', NULL, NULL, NULL),
(502, 2, 459, 'App\\Models\\User', NULL, NULL, NULL),
(503, 2, 460, 'App\\Models\\User', NULL, NULL, NULL),
(504, 2, 461, 'App\\Models\\User', NULL, NULL, NULL),
(505, 2, 462, 'App\\Models\\User', NULL, NULL, NULL),
(506, 2, 463, 'App\\Models\\User', NULL, NULL, NULL),
(507, 2, 464, 'App\\Models\\User', NULL, NULL, NULL),
(508, 2, 465, 'App\\Models\\User', NULL, NULL, NULL),
(509, 2, 466, 'App\\Models\\User', NULL, NULL, NULL),
(510, 2, 467, 'App\\Models\\User', NULL, NULL, NULL),
(511, 2, 468, 'App\\Models\\User', NULL, NULL, NULL),
(512, 2, 469, 'App\\Models\\User', NULL, NULL, NULL),
(513, 11, 470, 'App\\Models\\User', NULL, NULL, NULL),
(514, 2, 401, 'App\\Models\\User', NULL, NULL, NULL),
(518, 11, 474, 'App\\Models\\User', NULL, NULL, NULL),
(520, 11, 476, 'App\\Models\\User', NULL, NULL, NULL),
(521, 11, 477, 'App\\Models\\User', NULL, NULL, NULL),
(523, 11, 479, 'App\\Models\\User', NULL, NULL, NULL),
(526, 11, 472, 'App\\Models\\User', NULL, NULL, NULL),
(628, 2, 567, 'App\\Models\\User', NULL, NULL, NULL),
(629, 2, 568, 'App\\Models\\User', NULL, NULL, NULL),
(630, 2, 569, 'App\\Models\\User', NULL, NULL, NULL),
(631, 2, 570, 'App\\Models\\User', NULL, NULL, NULL),
(632, 2, 571, 'App\\Models\\User', NULL, NULL, NULL),
(633, 2, 572, 'App\\Models\\User', NULL, NULL, NULL),
(634, 2, 573, 'App\\Models\\User', NULL, NULL, NULL),
(635, 2, 574, 'App\\Models\\User', NULL, NULL, NULL),
(636, 2, 575, 'App\\Models\\User', NULL, NULL, NULL),
(637, 2, 576, 'App\\Models\\User', NULL, NULL, NULL),
(639, 2, 578, 'App\\Models\\User', NULL, NULL, NULL),
(640, 2, 579, 'App\\Models\\User', NULL, NULL, NULL),
(642, 2, 581, 'App\\Models\\User', NULL, NULL, NULL),
(643, 2, 582, 'App\\Models\\User', NULL, NULL, NULL),
(644, 2, 583, 'App\\Models\\User', NULL, NULL, NULL),
(645, 2, 584, 'App\\Models\\User', NULL, NULL, NULL),
(647, 2, 586, 'App\\Models\\User', NULL, NULL, NULL),
(648, 2, 587, 'App\\Models\\User', NULL, NULL, NULL),
(649, 2, 588, 'App\\Models\\User', NULL, NULL, NULL),
(650, 2, 589, 'App\\Models\\User', NULL, NULL, NULL),
(651, 2, 590, 'App\\Models\\User', NULL, NULL, NULL),
(652, 2, 591, 'App\\Models\\User', NULL, NULL, NULL),
(653, 2, 592, 'App\\Models\\User', NULL, NULL, NULL),
(654, 2, 593, 'App\\Models\\User', NULL, NULL, NULL),
(655, 2, 594, 'App\\Models\\User', NULL, NULL, NULL),
(656, 2, 595, 'App\\Models\\User', NULL, NULL, NULL),
(657, 2, 596, 'App\\Models\\User', NULL, NULL, NULL),
(658, 2, 597, 'App\\Models\\User', NULL, NULL, NULL),
(659, 2, 598, 'App\\Models\\User', NULL, NULL, NULL),
(660, 2, 599, 'App\\Models\\User', NULL, NULL, NULL),
(662, 2, 601, 'App\\Models\\User', NULL, NULL, NULL),
(663, 2, 602, 'App\\Models\\User', NULL, NULL, NULL),
(664, 2, 603, 'App\\Models\\User', NULL, NULL, NULL),
(668, 2, 607, 'App\\Models\\User', NULL, NULL, NULL),
(669, 2, 608, 'App\\Models\\User', NULL, NULL, NULL),
(670, 2, 609, 'App\\Models\\User', NULL, NULL, NULL),
(671, 2, 610, 'App\\Models\\User', NULL, NULL, NULL),
(672, 2, 611, 'App\\Models\\User', NULL, NULL, NULL),
(673, 2, 612, 'App\\Models\\User', NULL, NULL, NULL),
(674, 2, 613, 'App\\Models\\User', NULL, NULL, NULL),
(675, 2, 614, 'App\\Models\\User', NULL, NULL, NULL),
(677, 2, 616, 'App\\Models\\User', NULL, NULL, NULL),
(678, 2, 617, 'App\\Models\\User', NULL, NULL, NULL),
(679, 2, 618, 'App\\Models\\User', NULL, NULL, NULL),
(680, 2, 619, 'App\\Models\\User', NULL, NULL, NULL),
(681, 2, 620, 'App\\Models\\User', NULL, NULL, NULL),
(682, 2, 621, 'App\\Models\\User', NULL, NULL, NULL),
(683, 2, 622, 'App\\Models\\User', NULL, NULL, NULL),
(684, 2, 623, 'App\\Models\\User', NULL, NULL, NULL),
(685, 2, 624, 'App\\Models\\User', NULL, NULL, NULL),
(686, 2, 625, 'App\\Models\\User', NULL, NULL, NULL),
(688, 2, 627, 'App\\Models\\User', NULL, NULL, NULL),
(689, 2, 628, 'App\\Models\\User', NULL, NULL, NULL),
(690, 2, 629, 'App\\Models\\User', NULL, NULL, NULL),
(691, 2, 630, 'App\\Models\\User', NULL, NULL, NULL),
(692, 2, 631, 'App\\Models\\User', NULL, NULL, NULL),
(693, 2, 632, 'App\\Models\\User', NULL, NULL, NULL),
(694, 2, 633, 'App\\Models\\User', NULL, NULL, NULL),
(695, 2, 634, 'App\\Models\\User', NULL, NULL, NULL),
(696, 2, 635, 'App\\Models\\User', NULL, NULL, NULL),
(697, 2, 636, 'App\\Models\\User', NULL, NULL, NULL),
(698, 2, 637, 'App\\Models\\User', NULL, NULL, NULL),
(699, 2, 638, 'App\\Models\\User', NULL, NULL, NULL),
(700, 2, 639, 'App\\Models\\User', NULL, NULL, NULL),
(701, 2, 640, 'App\\Models\\User', NULL, NULL, NULL),
(702, 2, 641, 'App\\Models\\User', NULL, NULL, NULL),
(703, 2, 642, 'App\\Models\\User', NULL, NULL, NULL),
(704, 2, 643, 'App\\Models\\User', NULL, NULL, NULL),
(705, 2, 644, 'App\\Models\\User', NULL, NULL, NULL),
(706, 2, 645, 'App\\Models\\User', NULL, NULL, NULL),
(707, 2, 646, 'App\\Models\\User', NULL, NULL, NULL),
(708, 2, 647, 'App\\Models\\User', NULL, NULL, NULL),
(709, 2, 648, 'App\\Models\\User', NULL, NULL, NULL),
(710, 2, 649, 'App\\Models\\User', NULL, NULL, NULL),
(711, 2, 650, 'App\\Models\\User', NULL, NULL, NULL),
(712, 2, 651, 'App\\Models\\User', NULL, NULL, NULL),
(713, 2, 652, 'App\\Models\\User', NULL, NULL, NULL),
(714, 2, 653, 'App\\Models\\User', NULL, NULL, NULL),
(715, 2, 654, 'App\\Models\\User', NULL, NULL, NULL),
(716, 2, 655, 'App\\Models\\User', NULL, NULL, NULL),
(717, 2, 656, 'App\\Models\\User', NULL, NULL, NULL),
(718, 2, 657, 'App\\Models\\User', NULL, NULL, NULL),
(719, 2, 658, 'App\\Models\\User', NULL, NULL, NULL),
(720, 2, 659, 'App\\Models\\User', NULL, NULL, NULL),
(721, 2, 660, 'App\\Models\\User', NULL, NULL, NULL),
(722, 2, 661, 'App\\Models\\User', NULL, NULL, NULL),
(723, 2, 662, 'App\\Models\\User', NULL, NULL, NULL),
(724, 2, 663, 'App\\Models\\User', NULL, NULL, NULL),
(725, 2, 664, 'App\\Models\\User', NULL, NULL, NULL),
(726, 2, 665, 'App\\Models\\User', NULL, NULL, NULL),
(727, 2, 666, 'App\\Models\\User', NULL, NULL, NULL),
(728, 2, 667, 'App\\Models\\User', NULL, NULL, NULL),
(729, 2, 668, 'App\\Models\\User', NULL, NULL, NULL),
(730, 2, 669, 'App\\Models\\User', NULL, NULL, NULL),
(731, 2, 670, 'App\\Models\\User', NULL, NULL, NULL),
(732, 2, 671, 'App\\Models\\User', NULL, NULL, NULL),
(733, 2, 672, 'App\\Models\\User', NULL, NULL, NULL),
(734, 2, 673, 'App\\Models\\User', NULL, NULL, NULL),
(735, 2, 674, 'App\\Models\\User', NULL, NULL, NULL),
(736, 2, 675, 'App\\Models\\User', NULL, NULL, NULL),
(737, 2, 676, 'App\\Models\\User', NULL, NULL, NULL),
(749, 2, 679, 'App\\Models\\User', NULL, NULL, NULL),
(750, 2, 680, 'App\\Models\\User', NULL, NULL, NULL),
(751, 2, 681, 'App\\Models\\User', NULL, NULL, NULL),
(753, 1, 1, 'App\\Models\\User', NULL, NULL, NULL),
(754, 2, 577, 'App\\Models\\User', NULL, NULL, NULL),
(755, 2, 580, 'App\\Models\\User', NULL, NULL, NULL),
(756, 2, 600, 'App\\Models\\User', NULL, NULL, NULL),
(758, 2, 605, 'App\\Models\\User', NULL, NULL, NULL),
(759, 2, 606, 'App\\Models\\User', NULL, NULL, NULL),
(760, 2, 615, 'App\\Models\\User', NULL, NULL, NULL),
(761, 2, 626, 'App\\Models\\User', NULL, NULL, NULL),
(762, 2, 604, 'App\\Models\\User', NULL, NULL, NULL),
(763, 2, 585, 'App\\Models\\User', NULL, NULL, NULL),
(767, 2, 682, 'App\\Models\\User', NULL, NULL, NULL),
(768, 2, 683, 'App\\Models\\User', NULL, NULL, NULL),
(769, 2, 684, 'App\\Models\\User', NULL, NULL, NULL),
(770, 2, 685, 'App\\Models\\User', NULL, NULL, NULL),
(771, 2, 686, 'App\\Models\\User', NULL, NULL, NULL),
(772, 2, 687, 'App\\Models\\User', NULL, NULL, NULL),
(773, 2, 688, 'App\\Models\\User', NULL, NULL, NULL),
(774, 2, 689, 'App\\Models\\User', NULL, NULL, NULL),
(775, 2, 690, 'App\\Models\\User', NULL, NULL, NULL),
(776, 2, 691, 'App\\Models\\User', NULL, NULL, NULL),
(777, 2, 692, 'App\\Models\\User', NULL, NULL, NULL),
(778, 2, 693, 'App\\Models\\User', NULL, NULL, NULL),
(779, 2, 694, 'App\\Models\\User', NULL, NULL, NULL),
(780, 2, 695, 'App\\Models\\User', NULL, NULL, NULL),
(781, 2, 696, 'App\\Models\\User', NULL, NULL, NULL),
(782, 2, 697, 'App\\Models\\User', NULL, NULL, NULL),
(783, 2, 698, 'App\\Models\\User', NULL, NULL, NULL),
(784, 2, 699, 'App\\Models\\User', NULL, NULL, NULL),
(785, 2, 700, 'App\\Models\\User', NULL, NULL, NULL),
(786, 2, 701, 'App\\Models\\User', NULL, NULL, NULL),
(787, 2, 702, 'App\\Models\\User', NULL, NULL, NULL),
(788, 2, 703, 'App\\Models\\User', NULL, NULL, NULL),
(789, 2, 704, 'App\\Models\\User', NULL, NULL, NULL),
(790, 2, 705, 'App\\Models\\User', NULL, NULL, NULL),
(791, 2, 706, 'App\\Models\\User', NULL, NULL, NULL),
(792, 2, 707, 'App\\Models\\User', NULL, NULL, NULL),
(793, 2, 708, 'App\\Models\\User', NULL, NULL, NULL),
(794, 2, 709, 'App\\Models\\User', NULL, NULL, NULL),
(795, 2, 710, 'App\\Models\\User', NULL, NULL, NULL),
(796, 2, 711, 'App\\Models\\User', NULL, NULL, NULL),
(797, 2, 712, 'App\\Models\\User', NULL, NULL, NULL),
(798, 2, 713, 'App\\Models\\User', NULL, NULL, NULL),
(799, 2, 714, 'App\\Models\\User', NULL, NULL, NULL),
(800, 2, 715, 'App\\Models\\User', NULL, NULL, NULL),
(801, 2, 716, 'App\\Models\\User', NULL, NULL, NULL),
(802, 2, 717, 'App\\Models\\User', NULL, NULL, NULL),
(803, 2, 718, 'App\\Models\\User', NULL, NULL, NULL),
(804, 2, 719, 'App\\Models\\User', NULL, NULL, NULL),
(805, 2, 720, 'App\\Models\\User', NULL, NULL, NULL),
(806, 2, 721, 'App\\Models\\User', NULL, NULL, NULL),
(807, 2, 722, 'App\\Models\\User', NULL, NULL, NULL),
(808, 2, 723, 'App\\Models\\User', NULL, NULL, NULL),
(809, 2, 724, 'App\\Models\\User', NULL, NULL, NULL),
(810, 2, 725, 'App\\Models\\User', NULL, NULL, NULL),
(811, 2, 726, 'App\\Models\\User', NULL, NULL, NULL),
(812, 2, 727, 'App\\Models\\User', NULL, NULL, NULL),
(813, 2, 728, 'App\\Models\\User', NULL, NULL, NULL),
(814, 2, 729, 'App\\Models\\User', NULL, NULL, NULL),
(815, 2, 730, 'App\\Models\\User', NULL, NULL, NULL),
(816, 2, 731, 'App\\Models\\User', NULL, NULL, NULL),
(817, 2, 732, 'App\\Models\\User', NULL, NULL, NULL),
(818, 2, 733, 'App\\Models\\User', NULL, NULL, NULL),
(819, 2, 734, 'App\\Models\\User', NULL, NULL, NULL),
(820, 2, 735, 'App\\Models\\User', NULL, NULL, NULL),
(821, 2, 736, 'App\\Models\\User', NULL, NULL, NULL),
(822, 2, 737, 'App\\Models\\User', NULL, NULL, NULL),
(824, 2, 738, 'App\\Models\\User', NULL, NULL, NULL),
(825, 2, 739, 'App\\Models\\User', NULL, NULL, NULL),
(826, 2, 740, 'App\\Models\\User', NULL, NULL, NULL),
(827, 2, 741, 'App\\Models\\User', NULL, NULL, NULL),
(828, 2, 742, 'App\\Models\\User', NULL, NULL, NULL),
(829, 2, 743, 'App\\Models\\User', NULL, NULL, NULL),
(830, 2, 744, 'App\\Models\\User', NULL, NULL, NULL),
(831, 2, 745, 'App\\Models\\User', NULL, NULL, NULL),
(832, 2, 746, 'App\\Models\\User', NULL, NULL, NULL),
(833, 2, 747, 'App\\Models\\User', NULL, NULL, NULL),
(834, 2, 748, 'App\\Models\\User', NULL, NULL, NULL),
(835, 2, 749, 'App\\Models\\User', NULL, NULL, NULL),
(836, 2, 750, 'App\\Models\\User', NULL, NULL, NULL),
(837, 2, 751, 'App\\Models\\User', NULL, NULL, NULL),
(838, 2, 752, 'App\\Models\\User', NULL, NULL, NULL),
(839, 2, 753, 'App\\Models\\User', NULL, NULL, NULL),
(840, 2, 754, 'App\\Models\\User', NULL, NULL, NULL),
(841, 2, 755, 'App\\Models\\User', NULL, NULL, NULL),
(842, 2, 756, 'App\\Models\\User', NULL, NULL, NULL),
(843, 2, 757, 'App\\Models\\User', NULL, NULL, NULL),
(844, 2, 758, 'App\\Models\\User', NULL, NULL, NULL),
(845, 2, 759, 'App\\Models\\User', NULL, NULL, NULL),
(846, 2, 760, 'App\\Models\\User', NULL, NULL, NULL),
(847, 2, 761, 'App\\Models\\User', NULL, NULL, NULL),
(848, 2, 762, 'App\\Models\\User', NULL, NULL, NULL),
(849, 2, 763, 'App\\Models\\User', NULL, NULL, NULL),
(850, 2, 764, 'App\\Models\\User', NULL, NULL, NULL),
(851, 2, 765, 'App\\Models\\User', NULL, NULL, NULL),
(852, 2, 766, 'App\\Models\\User', NULL, NULL, NULL),
(853, 2, 767, 'App\\Models\\User', NULL, NULL, NULL),
(854, 2, 768, 'App\\Models\\User', NULL, NULL, NULL),
(855, 2, 769, 'App\\Models\\User', NULL, NULL, NULL),
(856, 2, 770, 'App\\Models\\User', NULL, NULL, NULL),
(857, 2, 771, 'App\\Models\\User', NULL, NULL, NULL),
(858, 2, 772, 'App\\Models\\User', NULL, NULL, NULL),
(859, 2, 773, 'App\\Models\\User', NULL, NULL, NULL),
(860, 2, 774, 'App\\Models\\User', NULL, NULL, NULL),
(861, 2, 775, 'App\\Models\\User', NULL, NULL, NULL),
(862, 2, 776, 'App\\Models\\User', NULL, NULL, NULL),
(863, 2, 777, 'App\\Models\\User', NULL, NULL, NULL),
(864, 2, 778, 'App\\Models\\User', NULL, NULL, NULL),
(865, 2, 779, 'App\\Models\\User', NULL, NULL, NULL),
(866, 2, 780, 'App\\Models\\User', NULL, NULL, NULL),
(867, 2, 781, 'App\\Models\\User', NULL, NULL, NULL),
(868, 2, 782, 'App\\Models\\User', NULL, NULL, NULL),
(869, 2, 783, 'App\\Models\\User', NULL, NULL, NULL),
(870, 2, 784, 'App\\Models\\User', NULL, NULL, NULL),
(871, 2, 785, 'App\\Models\\User', NULL, NULL, NULL),
(872, 2, 786, 'App\\Models\\User', NULL, NULL, NULL),
(873, 2, 787, 'App\\Models\\User', NULL, NULL, NULL),
(874, 2, 788, 'App\\Models\\User', NULL, NULL, NULL),
(875, 2, 789, 'App\\Models\\User', NULL, NULL, NULL),
(876, 2, 790, 'App\\Models\\User', NULL, NULL, NULL),
(877, 2, 791, 'App\\Models\\User', NULL, NULL, NULL),
(986, 11, 473, 'App\\Models\\User', NULL, NULL, NULL),
(989, 11, 482, 'App\\Models\\User', NULL, NULL, NULL),
(1023, 2, 933, 'App\\Models\\User', NULL, NULL, NULL),
(1024, 2, 934, 'App\\Models\\User', NULL, NULL, NULL),
(1025, 2, 935, 'App\\Models\\User', NULL, NULL, NULL),
(1026, 2, 936, 'App\\Models\\User', NULL, NULL, NULL),
(1027, 2, 937, 'App\\Models\\User', NULL, NULL, NULL),
(1028, 2, 938, 'App\\Models\\User', NULL, NULL, NULL),
(1029, 2, 939, 'App\\Models\\User', NULL, NULL, NULL),
(1030, 2, 940, 'App\\Models\\User', NULL, NULL, NULL),
(1031, 2, 941, 'App\\Models\\User', NULL, NULL, NULL),
(1032, 2, 942, 'App\\Models\\User', NULL, NULL, NULL),
(1035, 11, 475, 'App\\Models\\User', NULL, NULL, NULL),
(1036, 11, 478, 'App\\Models\\User', NULL, NULL, NULL),
(1038, 2, 943, 'App\\Models\\User', NULL, NULL, NULL),
(1127, 2, 1032, 'App\\Models\\User', NULL, NULL, NULL),
(1128, 2, 1033, 'App\\Models\\User', NULL, NULL, NULL),
(1129, 2, 1034, 'App\\Models\\User', NULL, NULL, NULL),
(1130, 2, 1035, 'App\\Models\\User', NULL, NULL, NULL),
(1131, 2, 1036, 'App\\Models\\User', NULL, NULL, NULL),
(1132, 2, 1037, 'App\\Models\\User', NULL, NULL, NULL),
(1133, 2, 1038, 'App\\Models\\User', NULL, NULL, NULL),
(1134, 2, 1039, 'App\\Models\\User', NULL, NULL, NULL),
(1135, 2, 1040, 'App\\Models\\User', NULL, NULL, NULL),
(1136, 2, 1041, 'App\\Models\\User', NULL, NULL, NULL),
(1137, 2, 1042, 'App\\Models\\User', NULL, NULL, NULL),
(1138, 2, 1043, 'App\\Models\\User', NULL, NULL, NULL),
(1139, 2, 1044, 'App\\Models\\User', NULL, NULL, NULL),
(1140, 2, 1045, 'App\\Models\\User', NULL, NULL, NULL),
(1141, 2, 1046, 'App\\Models\\User', NULL, NULL, NULL),
(1142, 2, 1047, 'App\\Models\\User', NULL, NULL, NULL),
(1143, 2, 1048, 'App\\Models\\User', NULL, NULL, NULL),
(1144, 2, 1049, 'App\\Models\\User', NULL, NULL, NULL),
(1145, 2, 1050, 'App\\Models\\User', NULL, NULL, NULL),
(1146, 2, 1051, 'App\\Models\\User', NULL, NULL, NULL),
(1147, 2, 1052, 'App\\Models\\User', NULL, NULL, NULL),
(1148, 2, 1053, 'App\\Models\\User', NULL, NULL, NULL),
(1149, 2, 1054, 'App\\Models\\User', NULL, NULL, NULL),
(1150, 2, 1055, 'App\\Models\\User', NULL, NULL, NULL),
(1151, 2, 1056, 'App\\Models\\User', NULL, NULL, NULL),
(1152, 2, 1057, 'App\\Models\\User', NULL, NULL, NULL),
(1153, 2, 1058, 'App\\Models\\User', NULL, NULL, NULL),
(1154, 2, 1059, 'App\\Models\\User', NULL, NULL, NULL),
(1155, 2, 1060, 'App\\Models\\User', NULL, NULL, NULL),
(1157, 2, 1061, 'App\\Models\\User', NULL, NULL, NULL),
(1158, 5, 239, 'App\\Models\\User', NULL, NULL, NULL),
(1159, 15, 238, 'App\\Models\\User', NULL, NULL, NULL),
(1160, 11, 1062, 'App\\Models\\User', NULL, NULL, NULL),
(1161, 2, 1063, 'App\\Models\\User', NULL, NULL, NULL),
(1162, 2, 1064, 'App\\Models\\User', NULL, NULL, NULL),
(1163, 2, 1065, 'App\\Models\\User', NULL, NULL, NULL),
(1164, 2, 1066, 'App\\Models\\User', NULL, NULL, NULL),
(1165, 2, 1067, 'App\\Models\\User', NULL, NULL, NULL),
(1166, 2, 1068, 'App\\Models\\User', NULL, NULL, NULL),
(1167, 2, 1069, 'App\\Models\\User', NULL, NULL, NULL),
(1168, 2, 1070, 'App\\Models\\User', NULL, NULL, NULL),
(1169, 2, 1071, 'App\\Models\\User', NULL, NULL, NULL),
(1170, 2, 1072, 'App\\Models\\User', NULL, NULL, NULL),
(1171, 2, 1073, 'App\\Models\\User', NULL, NULL, NULL),
(1172, 2, 1074, 'App\\Models\\User', NULL, NULL, NULL),
(1173, 2, 1075, 'App\\Models\\User', NULL, NULL, NULL),
(1174, 2, 1076, 'App\\Models\\User', NULL, NULL, NULL),
(1175, 2, 1077, 'App\\Models\\User', NULL, NULL, NULL),
(1176, 2, 1078, 'App\\Models\\User', NULL, NULL, NULL),
(1177, 2, 1079, 'App\\Models\\User', NULL, NULL, NULL),
(1178, 2, 1080, 'App\\Models\\User', NULL, NULL, NULL),
(1179, 2, 1081, 'App\\Models\\User', NULL, NULL, NULL),
(1180, 2, 1082, 'App\\Models\\User', NULL, NULL, NULL),
(1181, 2, 1083, 'App\\Models\\User', NULL, NULL, NULL),
(1182, 2, 1084, 'App\\Models\\User', NULL, NULL, NULL),
(1183, 2, 1085, 'App\\Models\\User', NULL, NULL, NULL),
(1184, 2, 1086, 'App\\Models\\User', NULL, NULL, NULL),
(1185, 2, 1087, 'App\\Models\\User', NULL, NULL, NULL),
(1186, 2, 1088, 'App\\Models\\User', NULL, NULL, NULL),
(1187, 2, 1089, 'App\\Models\\User', NULL, NULL, NULL),
(1188, 2, 1090, 'App\\Models\\User', NULL, NULL, NULL),
(1189, 2, 1091, 'App\\Models\\User', NULL, NULL, NULL),
(1190, 2, 1092, 'App\\Models\\User', NULL, NULL, NULL),
(1191, 2, 1093, 'App\\Models\\User', NULL, NULL, NULL),
(1192, 2, 1094, 'App\\Models\\User', NULL, NULL, NULL),
(1193, 2, 1095, 'App\\Models\\User', NULL, NULL, NULL),
(1194, 2, 1096, 'App\\Models\\User', NULL, NULL, NULL),
(1195, 2, 1097, 'App\\Models\\User', NULL, NULL, NULL),
(1196, 2, 1098, 'App\\Models\\User', NULL, NULL, NULL),
(1197, 2, 1099, 'App\\Models\\User', NULL, NULL, NULL),
(1198, 2, 1100, 'App\\Models\\User', NULL, NULL, NULL),
(1199, 2, 1101, 'App\\Models\\User', NULL, NULL, NULL),
(1200, 2, 1102, 'App\\Models\\User', NULL, NULL, NULL),
(1201, 2, 1103, 'App\\Models\\User', NULL, NULL, NULL),
(1202, 2, 1104, 'App\\Models\\User', NULL, NULL, NULL),
(1203, 2, 1105, 'App\\Models\\User', NULL, NULL, NULL),
(1204, 2, 1106, 'App\\Models\\User', NULL, NULL, NULL),
(1205, 2, 1107, 'App\\Models\\User', NULL, NULL, NULL),
(1206, 2, 1108, 'App\\Models\\User', NULL, NULL, NULL),
(1207, 2, 1109, 'App\\Models\\User', NULL, NULL, NULL),
(1208, 2, 1110, 'App\\Models\\User', NULL, NULL, NULL),
(1209, 2, 1111, 'App\\Models\\User', NULL, NULL, NULL),
(1210, 2, 1112, 'App\\Models\\User', NULL, NULL, NULL),
(1211, 2, 1113, 'App\\Models\\User', NULL, NULL, NULL),
(1212, 2, 1114, 'App\\Models\\User', NULL, NULL, NULL),
(1213, 2, 1115, 'App\\Models\\User', NULL, NULL, NULL),
(1214, 2, 1116, 'App\\Models\\User', NULL, NULL, NULL),
(1215, 2, 1117, 'App\\Models\\User', NULL, NULL, NULL),
(1216, 2, 1118, 'App\\Models\\User', NULL, NULL, NULL),
(1217, 2, 1119, 'App\\Models\\User', NULL, NULL, NULL),
(1218, 2, 1120, 'App\\Models\\User', NULL, NULL, NULL),
(1219, 2, 1121, 'App\\Models\\User', NULL, NULL, NULL),
(1220, 2, 1122, 'App\\Models\\User', NULL, NULL, NULL),
(1221, 2, 1123, 'App\\Models\\User', NULL, NULL, NULL),
(1222, 2, 1124, 'App\\Models\\User', NULL, NULL, NULL),
(1223, 2, 1125, 'App\\Models\\User', NULL, NULL, NULL),
(1224, 2, 1126, 'App\\Models\\User', NULL, NULL, NULL),
(1225, 2, 1127, 'App\\Models\\User', NULL, NULL, NULL),
(1226, 2, 1128, 'App\\Models\\User', NULL, NULL, NULL),
(1227, 2, 1129, 'App\\Models\\User', NULL, NULL, NULL),
(1228, 2, 1130, 'App\\Models\\User', NULL, NULL, NULL),
(1229, 2, 1131, 'App\\Models\\User', NULL, NULL, NULL),
(1230, 2, 1132, 'App\\Models\\User', NULL, NULL, NULL),
(1231, 2, 1133, 'App\\Models\\User', NULL, NULL, NULL),
(1232, 2, 1134, 'App\\Models\\User', NULL, NULL, NULL),
(1233, 2, 1135, 'App\\Models\\User', NULL, NULL, NULL),
(1234, 2, 1136, 'App\\Models\\User', NULL, NULL, NULL),
(1235, 2, 1137, 'App\\Models\\User', NULL, NULL, NULL),
(1236, 2, 1138, 'App\\Models\\User', NULL, NULL, NULL),
(1237, 2, 1139, 'App\\Models\\User', NULL, NULL, NULL),
(1238, 2, 1140, 'App\\Models\\User', NULL, NULL, NULL),
(1239, 2, 1141, 'App\\Models\\User', NULL, NULL, NULL),
(1240, 2, 1142, 'App\\Models\\User', NULL, NULL, NULL),
(1241, 2, 1143, 'App\\Models\\User', NULL, NULL, NULL),
(1242, 2, 1144, 'App\\Models\\User', NULL, NULL, NULL),
(1243, 2, 1145, 'App\\Models\\User', NULL, NULL, NULL),
(1244, 2, 1146, 'App\\Models\\User', NULL, NULL, NULL),
(1245, 2, 1147, 'App\\Models\\User', NULL, NULL, NULL),
(1246, 2, 1148, 'App\\Models\\User', NULL, NULL, NULL),
(1247, 2, 1149, 'App\\Models\\User', NULL, NULL, NULL),
(1248, 2, 1150, 'App\\Models\\User', NULL, NULL, NULL),
(1249, 2, 1151, 'App\\Models\\User', NULL, NULL, NULL),
(1250, 2, 1152, 'App\\Models\\User', NULL, NULL, NULL),
(1280, 2, 1182, 'App\\Models\\User', NULL, NULL, NULL),
(1281, 2, 1183, 'App\\Models\\User', NULL, NULL, NULL),
(1282, 2, 1184, 'App\\Models\\User', NULL, NULL, NULL),
(1283, 2, 1185, 'App\\Models\\User', NULL, NULL, NULL),
(1284, 2, 1186, 'App\\Models\\User', NULL, NULL, NULL),
(1285, 2, 1187, 'App\\Models\\User', NULL, NULL, NULL),
(1286, 2, 1188, 'App\\Models\\User', NULL, NULL, NULL),
(1287, 2, 1189, 'App\\Models\\User', NULL, NULL, NULL),
(1288, 2, 1190, 'App\\Models\\User', NULL, NULL, NULL),
(1289, 2, 1191, 'App\\Models\\User', NULL, NULL, NULL),
(1290, 2, 1192, 'App\\Models\\User', NULL, NULL, NULL),
(1291, 2, 1193, 'App\\Models\\User', NULL, NULL, NULL),
(1292, 2, 1194, 'App\\Models\\User', NULL, NULL, NULL),
(1293, 2, 1195, 'App\\Models\\User', NULL, NULL, NULL),
(1294, 2, 1196, 'App\\Models\\User', NULL, NULL, NULL),
(1295, 2, 1197, 'App\\Models\\User', NULL, NULL, NULL),
(1296, 2, 1198, 'App\\Models\\User', NULL, NULL, NULL),
(1297, 2, 1199, 'App\\Models\\User', NULL, NULL, NULL),
(1298, 2, 1200, 'App\\Models\\User', NULL, NULL, NULL),
(1299, 2, 1201, 'App\\Models\\User', NULL, NULL, NULL),
(1300, 2, 1202, 'App\\Models\\User', NULL, NULL, NULL),
(1301, 2, 1203, 'App\\Models\\User', NULL, NULL, NULL),
(1302, 2, 1204, 'App\\Models\\User', NULL, NULL, NULL),
(1303, 2, 1205, 'App\\Models\\User', NULL, NULL, NULL),
(1304, 2, 1206, 'App\\Models\\User', NULL, NULL, NULL),
(1305, 2, 1207, 'App\\Models\\User', NULL, NULL, NULL),
(1306, 2, 1208, 'App\\Models\\User', NULL, NULL, NULL),
(1307, 2, 1209, 'App\\Models\\User', NULL, NULL, NULL),
(1308, 2, 1210, 'App\\Models\\User', NULL, NULL, NULL),
(1309, 2, 1211, 'App\\Models\\User', NULL, NULL, NULL),
(1310, 11, 1212, 'App\\Models\\User', NULL, NULL, NULL),
(1324, 2, 9, 'App\\Models\\User', NULL, NULL, NULL),
(1325, 2, 2, 'App\\Models\\User', NULL, NULL, NULL),
(1326, 2, 3, 'App\\Models\\User', NULL, NULL, NULL),
(1328, 2, 5, 'App\\Models\\User', NULL, NULL, NULL),
(1331, 2, 8, 'App\\Models\\User', NULL, NULL, NULL),
(1332, 2, 10, 'App\\Models\\User', NULL, NULL, NULL),
(1333, 2, 11, 'App\\Models\\User', NULL, NULL, NULL),
(1334, 2, 12, 'App\\Models\\User', NULL, NULL, NULL),
(1335, 2, 13, 'App\\Models\\User', NULL, NULL, NULL),
(1336, 2, 14, 'App\\Models\\User', NULL, NULL, NULL),
(1337, 2, 15, 'App\\Models\\User', NULL, NULL, NULL),
(1342, 2, 29, 'App\\Models\\User', NULL, NULL, NULL),
(1343, 2, 30, 'App\\Models\\User', NULL, NULL, NULL),
(1344, 2, 31, 'App\\Models\\User', NULL, NULL, NULL),
(1345, 2, 32, 'App\\Models\\User', NULL, NULL, NULL),
(1349, 2, 37, 'App\\Models\\User', NULL, NULL, NULL),
(1352, 2, 50, 'App\\Models\\User', NULL, NULL, NULL),
(1353, 2, 51, 'App\\Models\\User', NULL, NULL, NULL),
(1357, 2, 57, 'App\\Models\\User', NULL, NULL, NULL),
(1358, 2, 58, 'App\\Models\\User', NULL, NULL, NULL),
(1359, 2, 59, 'App\\Models\\User', NULL, NULL, NULL),
(1360, 2, 60, 'App\\Models\\User', NULL, NULL, NULL),
(1361, 2, 61, 'App\\Models\\User', NULL, NULL, NULL),
(1362, 2, 62, 'App\\Models\\User', NULL, NULL, NULL),
(1363, 2, 63, 'App\\Models\\User', NULL, NULL, NULL),
(1364, 2, 64, 'App\\Models\\User', NULL, NULL, NULL),
(1365, 2, 65, 'App\\Models\\User', NULL, NULL, NULL),
(1366, 2, 66, 'App\\Models\\User', NULL, NULL, NULL),
(1367, 2, 67, 'App\\Models\\User', NULL, NULL, NULL),
(1368, 2, 68, 'App\\Models\\User', NULL, NULL, NULL),
(1369, 2, 69, 'App\\Models\\User', NULL, NULL, NULL),
(1370, 2, 70, 'App\\Models\\User', NULL, NULL, NULL),
(1372, 4, 75, 'App\\Models\\User', NULL, NULL, NULL),
(1373, 2, 4, 'App\\Models\\User', NULL, NULL, NULL),
(1374, 2, 6, 'App\\Models\\User', NULL, NULL, NULL),
(1375, 2, 7, 'App\\Models\\User', NULL, NULL, NULL),
(1376, 2, 16, 'App\\Models\\User', NULL, NULL, NULL),
(1377, 2, 17, 'App\\Models\\User', NULL, NULL, NULL),
(1378, 2, 36, 'App\\Models\\User', NULL, NULL, NULL),
(1379, 2, 19, 'App\\Models\\User', NULL, NULL, NULL),
(1380, 2, 27, 'App\\Models\\User', NULL, NULL, NULL),
(1381, 2, 33, 'App\\Models\\User', NULL, NULL, NULL),
(1382, 2, 52, 'App\\Models\\User', NULL, NULL, NULL),
(1383, 2, 34, 'App\\Models\\User', NULL, NULL, NULL),
(1384, 2, 38, 'App\\Models\\User', NULL, NULL, NULL),
(1385, 2, 56, 'App\\Models\\User', NULL, NULL, NULL),
(1386, 2, 39, 'App\\Models\\User', NULL, NULL, NULL),
(1387, 2, 53, 'App\\Models\\User', NULL, NULL, NULL),
(1389, 7, 77, 'App\\Models\\User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint UNSIGNED NOT NULL,
  `hostel_id` bigint UNSIGNED DEFAULT NULL,
  `block_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `block_capacity` int NOT NULL,
  `number_of_floor` int NOT NULL,
  `number_of_room` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint UNSIGNED NOT NULL,
  `building_name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campuses`
--

CREATE TABLE `campuses` (
  `id` bigint UNSIGNED NOT NULL,
  `institution_id` bigint UNSIGNED NOT NULL,
  `campus_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `campus_acronym` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campuses`
--

INSERT INTO `campuses` (`id`, `institution_id`, `campus_name`, `campus_acronym`, `address`, `tel`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kange Secondary School', 'KSS', NULL, NULL, NULL, '2020-12-30 15:35:32', '2025-07-07 08:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` bigint UNSIGNED NOT NULL,
  `campus_id` bigint UNSIGNED NOT NULL,
  `center_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `campus_id`, `center_name`, `address`, `telephone`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'LINDI', 'LINDI', '0621799978', 'dosebaga@gmail.com', '2025-03-27 09:37:16', '2025-03-27 09:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `year_id` bigint UNSIGNED DEFAULT NULL,
  `course_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_cw` decimal(15,2) NOT NULL DEFAULT '16.00',
  `score_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_level_id` bigint UNSIGNED DEFAULT NULL,
  `pass_grade` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` decimal(15,2) NOT NULL,
  `cw` decimal(15,2) NOT NULL,
  `final` decimal(15,2) NOT NULL,
  `min_ue` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department_id`, `year_id`, `course_code`, `course_name`, `course_category`, `min_cw`, `score_type`, `study_level_id`, `pass_grade`, `unit`, `cw`, `final`, `min_ue`, `created_at`, `updated_at`, `course_status`) VALUES
(1, NULL, NULL, 'CMT 04101', 'Communication Skills and Customer Care', 'Certificate Module', '20.00', 'Mark', 3, 'C', '6.00', '40.00', '60.00', '30.00', '2025-04-10 08:03:00', '2025-04-10 08:03:00', 0),
(2, NULL, NULL, 'CMT 04102', 'Human Anatomy', 'Certificate Module', '20.00', 'Mark', 3, 'C', '12.00', '40.00', '60.00', '30.00', '2025-04-10 08:04:12', '2025-04-10 08:04:12', 1),
(3, NULL, NULL, 'CMT 04103', 'Human Physiology', 'Certificate Module', '20.00', 'Mark', 3, 'C', '10.00', '40.00', '60.00', '30.00', '2025-04-10 08:05:37', '2025-04-10 08:05:37', 0),
(4, NULL, NULL, 'CMT 04104', 'Epidemiology and Biostatistics', 'Certificate Module', '20.00', 'Mark', 3, 'C', '13.00', '40.00', '60.00', '30.00', '2025-04-10 08:07:13', '2025-04-10 08:07:13', 1),
(5, NULL, NULL, 'CMT 04105', 'Computer Applications', 'Certificate Module', '20.00', 'Mark', 3, 'C', '7.00', '40.00', '60.00', '30.00', '2025-04-10 08:08:58', '2025-04-10 08:08:58', 1),
(6, NULL, NULL, 'CMT 04106', 'Medical Ethics and Professionalism', 'Certificate Module', '20.00', 'Mark', 3, 'C', '5.00', '40.00', '60.00', '30.00', '2025-04-10 08:13:23', '2025-04-10 08:13:23', 0),
(8, NULL, 14, 'ENG', 'ENGLISH LANGUAGE', '', '16.00', 'Mark', 3, 'C', '0.00', '0.00', '0.00', NULL, '2025-07-07 12:45:54', '2025-07-07 12:52:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_exam_categories`
--

CREATE TABLE `course_exam_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `course_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `semester_id` bigint UNSIGNED NOT NULL,
  `exam_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_program`
--

CREATE TABLE `course_program` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `program_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` bigint UNSIGNED DEFAULT NULL,
  `year` int UNSIGNED NOT NULL,
  `core` tinyint NOT NULL,
  `semester` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stream` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_program`
--

INSERT INTO `course_program` (`id`, `course_id`, `program_id`, `program_code`, `year_id`, `year`, `core`, `semester`, `created_at`, `updated_at`, `stream`) VALUES
(168, 1, 8, NULL, 14, 1, 1, 1, '2025-04-12 08:41:37', '2025-04-12 08:41:37', 'A'),
(169, 2, 8, NULL, 14, 1, 1, 1, '2025-04-12 08:41:46', '2025-04-12 08:41:46', 'A'),
(170, 3, 8, NULL, 14, 1, 1, 1, '2025-04-12 09:11:59', '2025-04-12 09:11:59', 'A'),
(171, 4, 8, NULL, 14, 1, 1, 1, '2025-04-12 09:12:09', '2025-04-12 09:12:09', 'A'),
(172, 5, 8, NULL, 14, 1, 1, 1, '2025-04-12 09:12:18', '2025-04-12 09:12:18', 'A'),
(173, 6, 8, NULL, 14, 1, 1, 1, '2025-04-12 09:12:27', '2025-04-12 09:12:27', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `course_results`
--

CREATE TABLE `course_results` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `semester_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `credits` decimal(8,0) NOT NULL,
  `ca_score` decimal(8,1) NOT NULL,
  `se_score` decimal(8,1) NOT NULL,
  `total_score` decimal(8,1) NOT NULL,
  `grade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` decimal(8,0) NOT NULL,
  `gpa` decimal(8,1) NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year_of_study` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_results`
--

INSERT INTO `course_results` (`id`, `reg_no`, `year_id`, `semester_id`, `course_id`, `credits`, `ca_score`, `se_score`, `total_score`, `grade`, `points`, `gpa`, `remarks`, `created_at`, `updated_at`, `year_of_study`) VALUES
(1, 'NS0772/0099/2020', 14, 1, 1, '6', '27.4', '45.6', '73.0', 'B', '18', '3.0', 'PASS', '2025-04-13 19:15:36', '2025-04-19 19:33:43', 1),
(2, 'NS0772/0099/2020', 14, 1, 2, '12', '31.5', '58.2', '89.7', 'A', '48', '4.0', 'PASS', '2025-04-13 23:14:11', '2025-04-19 19:58:57', 1),
(3, 'NS5289/0024/2023', 14, 1, 1, '6', '30.4', '45.0', '75.4', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:27', '2025-04-19 19:33:43', 1),
(4, 'NP1153/0013/2023', 14, 1, 1, '6', '28.0', '36.9', '64.9', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:27', '2025-04-19 19:33:44', 1),
(5, 'NS5357/0001/2023', 14, 1, 1, '6', '27.3', '41.4', '68.7', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:27', '2025-04-19 19:33:44', 1),
(6, 'NS0672/0001/2023', 14, 1, 1, '6', '31.1', '44.7', '75.8', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:27', '2025-04-19 19:33:44', 1),
(7, 'NS2367/0005/2023', 14, 1, 1, '6', '22.5', '42.9', '65.4', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:27', '2025-04-19 19:33:44', 1),
(8, 'NS0294/0005/2023', 14, 1, 1, '6', '30.5', '37.5', '68.0', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:27', '2025-04-19 19:33:44', 1),
(9, 'NS0916/0003/2023', 14, 1, 1, '6', '31.1', '35.4', '66.5', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:27', '2025-04-19 19:33:44', 1),
(10, 'NS1375/0002/2023', 14, 1, 1, '6', '29.6', '38.4', '68.0', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:27', '2025-04-19 19:33:44', 1),
(11, 'NS0547/0015/2023', 14, 1, 1, '6', '28.9', '45.9', '74.8', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:44', 1),
(12, 'NS0345/0172/2023', 14, 1, 1, '6', '26.8', '35.4', '62.2', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:45', 1),
(13, 'NS1394/0007/2023', 14, 1, 1, '6', '25.8', '41.4', '67.2', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:45', 1),
(14, 'NS4740/0008/2023', 14, 1, 1, '6', '26.8', '37.2', '64.0', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:45', 1),
(15, 'NEQ2022001913/2020', 14, 1, 1, '6', '26.4', '34.2', '60.6', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:45', 1),
(16, 'NS3371/0102/2023', 14, 1, 1, '6', '25.7', '38.1', '63.8', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:45', 1),
(17, 'NS3897/0088/2023', 14, 1, 1, '6', '25.2', '42.3', '67.5', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:45', 1),
(18, 'NS3757/0023/2023', 14, 1, 1, '6', '24.6', '37.8', '62.4', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:45', 1),
(19, 'NS3981/0011/2023', 14, 1, 1, '6', '28.8', '45.3', '74.1', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:46', 1),
(20, 'NS3453/0010/2023', 14, 1, 1, '6', '24.4', '39.6', '64.0', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:46', 1),
(21, 'NS5156/0084/2023', 14, 1, 1, '6', '25.4', '36.0', '61.4', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:46', 1),
(22, 'NS2510/0010/2023', 14, 1, 1, '6', '27.9', '52.5', '80.4', 'A', '24', '4.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:46', 1),
(23, 'NS0970/0015/2023', 14, 1, 1, '6', '25.9', '34.8', '60.7', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:46', 1),
(24, 'NS3834/0019/2018', 14, 1, 1, '6', '27.8', '39.6', '67.4', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:46', 1),
(25, 'NS0850/0022/2022', 14, 1, 1, '6', '27.0', '34.2', '61.2', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:46', 1),
(26, 'NS1027/0179/2023', 14, 1, 1, '6', '27.3', '43.8', '71.1', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:46', 1),
(27, 'NS4569/0030/2023', 14, 1, 1, '6', '27.6', '38.1', '65.7', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:47', 1),
(28, 'NS4740/0041/2023', 14, 1, 1, '6', '26.0', '39.3', '65.3', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:28', '2025-04-19 19:33:47', 1),
(29, 'NS1618/0012/2023', 14, 1, 1, '6', '31.0', '36.6', '67.6', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:47', 1),
(30, 'NS1060/0017/2023', 14, 1, 1, '6', '26.5', '41.4', '67.9', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:47', 1),
(31, 'NS5033/0020/2022', 14, 1, 1, '6', '28.7', '34.2', '62.9', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:47', 1),
(32, 'NS0722/0031/2023', 14, 1, 1, '6', '27.2', '38.4', '65.6', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:47', 1),
(33, 'NS4740/0048/2023', 14, 1, 1, '6', '22.9', '30.3', '53.2', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:47', 1),
(34, 'NS4498/0051/2020', 14, 1, 1, '6', '24.5', '36.3', '60.8', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:48', 1),
(35, 'NS0241/0039/2020', 14, 1, 1, '6', '25.9', '44.1', '70.0', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:48', 1),
(36, 'NS0414/0019/2023', 14, 1, 1, '6', '32.9', '43.2', '76.1', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:48', 1),
(37, 'NS0197/0009/2020', 14, 1, 1, '6', '25.0', '40.2', '65.2', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:48', 1),
(38, 'NS3893/0156/2023', 14, 1, 1, '6', '24.6', '36.0', '60.6', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:48', 1),
(39, 'NS0672/0057/2023', 14, 1, 1, '6', '26.2', '35.4', '61.6', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:48', 1),
(40, 'NS4816/0040/2021', 14, 1, 1, '6', '26.5', '39.0', '65.5', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:29', '2025-04-19 19:33:48', 1),
(41, 'NS1633/0164/2023', 14, 1, 1, '6', '25.3', '37.5', '62.8', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:30', '2025-04-19 19:33:48', 1),
(42, 'NS4208/0008/2022', 14, 1, 1, '6', '24.8', '37.2', '62.0', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:30', '2025-04-19 19:33:49', 1),
(43, 'NS3897/0105/2023', 14, 1, 1, '6', '29.1', '50.7', '79.8', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:30', '2025-04-19 19:33:49', 1),
(44, 'NS0526/0115/2021', 14, 1, 1, '6', '24.5', '49.8', '74.3', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:30', '2025-04-19 19:33:49', 1),
(45, 'NS0274/0046/2023', 14, 1, 1, '6', '25.1', '31.8', '56.9', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:30', '2025-04-19 19:33:49', 1),
(46, 'NS6048/0056/2023', 14, 1, 1, '6', '24.8', '40.2', '65.0', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:30', '2025-04-19 19:33:49', 1),
(47, 'NS4006/0030/2021', 14, 1, 1, '6', '30.0', '40.8', '70.8', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:30', '2025-04-19 19:33:49', 1),
(48, 'NS2505/0044/2017', 14, 1, 1, '6', '26.7', '49.5', '76.2', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:30', '2025-04-19 19:33:49', 1),
(49, 'NS4238/0026/2021', 14, 1, 1, '6', '26.8', '38.4', '65.2', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:30', '2025-04-19 19:33:50', 1),
(50, 'NS3351/0179/2023', 14, 1, 1, '6', '29.1', '43.8', '72.9', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:30', '2025-04-19 19:33:50', 1),
(51, 'NS4117/0256/2022', 14, 1, 1, '6', '23.7', '36.6', '60.3', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:31', '2025-04-19 19:33:50', 1),
(52, 'NS3321/0044/2021', 14, 1, 1, '6', '21.1', '33.3', '54.4', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:31', '2025-04-19 19:33:50', 1),
(53, 'NS5551/0011/2021', 14, 1, 1, '6', '32.2', '38.4', '70.6', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:31', '2025-04-19 19:33:50', 1),
(54, 'NS0345/0088/2023', 14, 1, 1, '6', '28.8', '40.8', '69.6', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:31', '2025-04-19 19:33:50', 1),
(55, 'NS4710/0030/2023', 14, 1, 1, '6', '27.8', '36.0', '63.8', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:31', '2025-04-19 19:33:50', 1),
(56, 'NS5822/0117/2023', 14, 1, 1, '6', '29.7', '46.8', '76.5', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:31', '2025-04-19 19:33:50', 1),
(57, 'NS1097/0129/2021', 14, 1, 1, '6', '26.2', '48.6', '74.8', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:31', '2025-04-19 19:33:51', 1),
(58, 'NS1633/0136/2021', 14, 1, 1, '6', '26.0', '37.8', '63.8', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:31', '2025-04-19 19:33:51', 1),
(59, 'NS0672/0094/2021', 14, 1, 1, '6', '28.4', '37.5', '65.9', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:31', '2025-04-19 19:33:51', 1),
(60, 'NS2521/0024/2021', 14, 1, 1, '6', '30.2', '40.2', '70.4', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:31', '2025-04-19 19:33:51', 1),
(61, 'NS1581/0075/2023', 14, 1, 1, '6', '24.7', '35.1', '59.8', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:32', '2025-04-19 19:33:51', 1),
(62, 'NS2315/0115/2021', 14, 1, 1, '6', '27.8', '35.4', '63.2', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:32', '2025-04-19 19:33:51', 1),
(63, 'NS2171/0052/2023', 14, 1, 1, '6', '28.9', '42.6', '71.5', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:32', '2025-04-19 19:33:51', 1),
(64, 'NS2424/0074/2023', 14, 1, 1, '6', '23.3', '32.7', '56.0', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:32', '2025-04-19 19:33:52', 1),
(65, 'NS0632/0053/2023', 14, 1, 1, '6', '23.3', '36.3', '59.6', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:32', '2025-04-19 19:33:52', 1),
(66, 'NS0672/0135/2023', 14, 1, 1, '6', '23.7', '33.6', '57.3', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:32', '2025-04-19 19:33:52', 1),
(67, 'NS5376/0082/2023', 14, 1, 1, '6', '26.4', '37.8', '64.2', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:32', '2025-04-19 19:33:52', 1),
(68, 'NS3228/0285/2022', 14, 1, 1, '6', '23.8', '36.3', '60.1', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:32', '2025-04-19 19:33:52', 1),
(69, 'NS0541/0100/2023', 14, 1, 1, '6', '26.7', '37.2', '63.9', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:33', '2025-04-19 19:33:52', 1),
(70, 'NS3534/0025/2023', 14, 1, 1, '6', '29.8', '39.3', '69.1', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:33', '2025-04-19 19:33:52', 1),
(71, 'NS5251/0066/2023', 14, 1, 1, '6', '23.3', '33.0', '56.3', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:33', '2025-04-19 19:33:52', 1),
(72, 'NS5298/0057/2023', 14, 1, 1, '6', '26.4', '39.6', '66.0', 'B', '18', '3.0', 'PASS', '2025-04-19 19:06:33', '2025-04-19 19:33:53', 1),
(73, 'NS4897/0091/2023', 14, 1, 1, '6', '23.1', '33.6', '56.7', 'C', '12', '2.0', 'PASS', '2025-04-19 19:06:33', '2025-04-19 19:33:53', 1),
(74, 'NS5289/0024/2023', 14, 1, 2, '12', '34.3', '57.6', '91.9', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:57', 1),
(75, 'NP1153/0013/2023', 14, 1, 2, '12', '22.8', '56.0', '78.8', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:58', 1),
(76, 'NS5357/0001/2023', 14, 1, 2, '12', '33.4', '54.8', '88.2', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:58', 1),
(77, 'NS0672/0001/2023', 14, 1, 2, '12', '32.4', '53.7', '86.1', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:58', 1),
(78, 'NS2367/0005/2023', 14, 1, 2, '12', '28.9', '51.0', '79.9', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:58', 1),
(79, 'NS0294/0005/2023', 14, 1, 2, '12', '28.4', '56.4', '84.8', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:58', 1),
(80, 'NS0916/0003/2023', 14, 1, 2, '12', '26.0', '54.8', '80.8', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:58', 1),
(81, 'NS1375/0002/2023', 14, 1, 2, '12', '26.9', '51.8', '78.7', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:58', 1),
(82, 'NS0547/0015/2023', 14, 1, 2, '12', '24.7', '53.4', '78.1', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:59', 1),
(83, 'NS0345/0172/2023', 14, 1, 2, '12', '31.3', '51.3', '82.6', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:59', 1),
(84, 'NS1394/0007/2023', 14, 1, 2, '12', '21.9', '56.4', '78.3', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:59', 1),
(85, 'NS4740/0008/2023', 14, 1, 2, '12', '27.1', '57.9', '85.0', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:59', 1),
(86, 'NEQ2022001913/2020', 14, 1, 2, '12', '23.7', '55.7', '79.4', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:59', 1),
(87, 'NS3371/0102/2023', 14, 1, 2, '12', '24.3', '55.4', '79.7', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:44', '2025-04-19 19:58:59', 1),
(88, 'NS3897/0088/2023', 14, 1, 2, '12', '27.7', '56.9', '84.6', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:58:59', 1),
(89, 'NS3757/0023/2023', 14, 1, 2, '12', '25.6', '56.9', '82.5', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:00', 1),
(90, 'NS3981/0011/2023', 14, 1, 2, '12', '31.4', '50.7', '82.1', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:00', 1),
(91, 'NS3453/0010/2023', 14, 1, 2, '12', '21.4', '56.1', '77.5', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:00', 1),
(92, 'NS5156/0084/2023', 14, 1, 2, '12', '27.5', '56.7', '84.2', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:00', 1),
(93, 'NS2510/0010/2023', 14, 1, 2, '12', '34.4', '55.4', '89.8', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:00', 1),
(94, 'NS0970/0015/2023', 14, 1, 2, '12', '25.1', '56.0', '81.1', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:00', 1),
(95, 'NS3834/0019/2018', 14, 1, 2, '12', '33.9', '59.0', '92.9', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:00', 1),
(96, 'NS0850/0022/2022', 14, 1, 2, '12', '27.3', '55.4', '82.7', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:01', 1),
(97, 'NS1027/0179/2023', 14, 1, 2, '12', '29.2', '57.3', '86.5', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:01', 1),
(98, 'NS4569/0030/2023', 14, 1, 2, '12', '28.0', '57.0', '85.0', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:01', 1),
(99, 'NS4740/0041/2023', 14, 1, 2, '12', '21.5', '46.2', '67.7', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:01', 1),
(100, 'NS1618/0012/2023', 14, 1, 2, '12', '25.1', '52.7', '77.8', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:01', 1),
(101, 'NS1060/0017/2023', 14, 1, 2, '12', '26.8', '57.3', '84.1', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:01', 1),
(102, 'NS5033/0020/2022', 14, 1, 2, '12', '33.7', '57.3', '91.0', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:01', 1),
(103, 'NS0722/0031/2023', 14, 1, 2, '12', '21.6', '56.3', '77.9', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:45', '2025-04-19 19:59:02', 1),
(104, 'NS4740/0048/2023', 14, 1, 2, '12', '21.5', '54.2', '75.7', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:46', '2025-04-19 19:59:02', 1),
(105, 'NS4498/0051/2020', 14, 1, 2, '12', '25.2', '56.3', '81.5', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:46', '2025-04-19 19:59:02', 1),
(106, 'NS0241/0039/2020', 14, 1, 2, '12', '31.5', '49.2', '80.7', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:46', '2025-04-19 19:59:02', 1),
(107, 'NS0414/0019/2023', 14, 1, 2, '12', '34.0', '58.7', '92.7', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:46', '2025-04-19 19:59:02', 1),
(108, 'NS0197/0009/2020', 14, 1, 2, '12', '28.6', '54.3', '82.9', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:46', '2025-04-19 19:59:02', 1),
(109, 'NS3893/0156/2023', 14, 1, 2, '12', '23.7', '52.7', '76.4', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:46', '2025-04-19 19:59:02', 1),
(110, 'NS0672/0057/2023', 14, 1, 2, '12', '27.9', '56.7', '84.6', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:46', '2025-04-19 19:59:03', 1),
(111, 'NS4816/0040/2021', 14, 1, 2, '12', '30.4', '56.4', '86.8', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:46', '2025-04-19 19:59:03', 1),
(112, 'NS1633/0164/2023', 14, 1, 2, '12', '24.8', '48.8', '73.6', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:46', '2025-04-19 19:59:03', 1),
(113, 'NS4208/0008/2022', 14, 1, 2, '12', '23.9', '53.7', '77.6', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:46', '2025-04-19 19:59:03', 1),
(114, 'NS3897/0105/2023', 14, 1, 2, '12', '32.6', '57.6', '90.2', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:46', '2025-04-19 19:59:03', 1),
(115, 'NS0526/0115/2021', 14, 1, 2, '12', '33.3', '54.5', '87.8', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:47', '2025-04-19 19:59:03', 1),
(116, 'NS0274/0046/2023', 14, 1, 2, '12', '32.2', '58.2', '90.4', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:47', '2025-04-19 19:59:03', 1),
(117, 'NS6048/0056/2023', 14, 1, 2, '12', '27.8', '52.1', '79.9', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:47', '2025-04-19 19:59:03', 1),
(118, 'NS4006/0030/2021', 14, 1, 2, '12', '30.9', '57.6', '88.5', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:47', '2025-04-19 19:59:04', 1),
(119, 'NS2505/0044/2017', 14, 1, 2, '12', '25.6', '51.2', '76.8', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:47', '2025-04-19 19:59:04', 1),
(120, 'NS4238/0026/2021', 14, 1, 2, '12', '28.3', '54.8', '83.1', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:47', '2025-04-19 19:59:04', 1),
(121, 'NS3351/0179/2023', 14, 1, 2, '12', '30.2', '55.4', '85.6', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:47', '2025-04-19 19:59:04', 1),
(122, 'NS4117/0256/2022', 14, 1, 2, '12', '20.9', '47.0', '67.9', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:47', '2025-04-19 19:59:04', 1),
(123, 'NS3321/0044/2021', 14, 1, 2, '12', '25.1', '48.5', '73.6', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:47', '2025-04-19 19:59:04', 1),
(124, 'NS5551/0011/2021', 14, 1, 2, '12', '32.0', '56.6', '88.6', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:47', '2025-04-19 19:59:04', 1),
(125, 'NS0345/0088/2023', 14, 1, 2, '12', '30.4', '57.6', '88.0', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:47', '2025-04-19 19:59:04', 1),
(126, 'NS4710/0030/2023', 14, 1, 2, '12', '24.0', '54.5', '78.5', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:48', '2025-04-19 19:59:05', 1),
(127, 'NS5822/0117/2023', 14, 1, 2, '12', '34.1', '55.1', '89.2', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:48', '2025-04-19 19:59:05', 1),
(128, 'NS1097/0129/2021', 14, 1, 2, '12', '28.5', '58.8', '87.3', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:48', '2025-04-19 19:59:05', 1),
(129, 'NS1633/0136/2021', 14, 1, 2, '12', '34.2', '55.2', '89.4', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:48', '2025-04-19 19:59:05', 1),
(130, 'NS0672/0094/2021', 14, 1, 2, '12', '32.3', '56.9', '89.2', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:48', '2025-04-19 19:59:05', 1),
(131, 'NS2521/0024/2021', 14, 1, 2, '12', '34.3', '57.0', '91.3', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:48', '2025-04-19 19:59:05', 1),
(132, 'NS1581/0075/2023', 14, 1, 2, '12', '29.5', '57.2', '86.7', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:48', '2025-04-19 19:59:05', 1),
(133, 'NS2315/0115/2021', 14, 1, 2, '12', '30.1', '56.6', '86.7', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:48', '2025-04-19 19:59:06', 1),
(134, 'NS2171/0052/2023', 14, 1, 2, '12', '30.8', '58.4', '89.2', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:49', '2025-04-19 19:59:06', 1),
(135, 'NS2424/0074/2023', 14, 1, 2, '12', '21.0', '53.1', '74.1', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:49', '2025-04-19 19:59:06', 1),
(136, 'NS0632/0053/2023', 14, 1, 2, '12', '22.3', '55.5', '77.8', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:49', '2025-04-19 19:59:06', 1),
(137, 'NS0672/0135/2023', 14, 1, 2, '12', '26.6', '47.4', '74.0', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:49', '2025-04-19 19:59:06', 1),
(138, 'NS5376/0082/2023', 14, 1, 2, '12', '26.8', '53.4', '80.2', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:49', '2025-04-19 19:59:06', 1),
(139, 'NS3228/0285/2022', 14, 1, 2, '12', '23.3', '51.9', '75.2', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:49', '2025-04-19 19:59:06', 1),
(140, 'NS0541/0100/2023', 14, 1, 2, '12', '30.8', '55.2', '86.0', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:49', '2025-04-19 19:59:07', 1),
(141, 'NS3534/0025/2023', 14, 1, 2, '12', '30.0', '56.7', '86.7', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:49', '2025-04-19 19:59:07', 1),
(142, 'NS5251/0066/2023', 14, 1, 2, '12', '22.8', '53.9', '76.7', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:50', '2025-04-19 19:59:07', 1),
(143, 'NS5298/0057/2023', 14, 1, 2, '12', '22.3', '51.5', '73.8', 'B', '36', '3.0', 'PASS', '2025-04-19 19:55:50', '2025-04-19 19:59:07', 1),
(144, 'NS4897/0091/2023', 14, 1, 2, '12', '32.3', '56.1', '88.4', 'A', '48', '4.0', 'PASS', '2025-04-19 19:55:50', '2025-04-19 19:59:07', 1),
(145, 'NS0772/0099/2020', 14, 1, 3, '10', '32.8', '52.8', '85.6', 'A', '40', '4.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:40', 1),
(146, 'NS5289/0024/2023', 14, 1, 3, '10', '32.5', '51.0', '83.5', 'A', '40', '4.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:40', 1),
(147, 'NP1153/0013/2023', 14, 1, 3, '10', '25.3', '39.0', '64.3', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:41', 1),
(148, 'NS5357/0001/2023', 14, 1, 3, '10', '27.6', '46.2', '73.8', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:41', 1),
(149, 'NS0672/0001/2023', 14, 1, 3, '10', '28.5', '44.4', '72.9', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:41', 1),
(150, 'NS2367/0005/2023', 14, 1, 3, '10', '26.4', '36.9', '63.3', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:41', 1),
(151, 'NS0294/0005/2023', 14, 1, 3, '10', '29.0', '45.0', '74.0', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:41', 1),
(152, 'NS0916/0003/2023', 14, 1, 3, '10', '27.9', '41.7', '69.6', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:41', 1),
(153, 'NS1375/0002/2023', 14, 1, 3, '10', '21.7', '35.7', '57.4', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:41', 1),
(154, 'NS0547/0015/2023', 14, 1, 3, '10', '24.5', '39.9', '64.4', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:41', 1),
(155, 'NS0345/0172/2023', 14, 1, 3, '10', '25.9', '43.8', '69.7', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:42', 1),
(156, 'NS1394/0007/2023', 14, 1, 3, '10', '20.7', '40.8', '61.5', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:42', 1),
(157, 'NS4740/0008/2023', 14, 1, 3, '10', '27.6', '44.4', '72.0', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:42', 1),
(158, 'NEQ2022001913/2020', 14, 1, 3, '10', '26.3', '36.6', '62.9', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:41', '2025-04-19 20:14:42', 1),
(159, 'NS3371/0102/2023', 14, 1, 3, '10', '26.3', '43.5', '69.8', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:42', 1),
(160, 'NS3897/0088/2023', 14, 1, 3, '10', '21.9', '42.6', '64.5', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:42', 1),
(161, 'NS3757/0023/2023', 14, 1, 3, '10', '22.3', '41.1', '63.4', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:42', 1),
(162, 'NS3981/0011/2023', 14, 1, 3, '10', '31.2', '46.5', '77.7', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:43', 1),
(163, 'NS3453/0010/2023', 14, 1, 3, '10', '22.7', '32.7', '55.4', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:43', 1),
(164, 'NS5156/0084/2023', 14, 1, 3, '10', '28.8', '39.9', '68.7', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:43', 1),
(165, 'NS2510/0010/2023', 14, 1, 3, '10', '31.4', '48.6', '80.0', 'A', '40', '4.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:43', 1),
(166, 'NS0970/0015/2023', 14, 1, 3, '10', '28.1', '48.3', '76.4', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:43', 1),
(167, 'NS3834/0019/2018', 14, 1, 3, '10', '31.6', '48.9', '80.5', 'A', '40', '4.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:43', 1),
(168, 'NS0850/0022/2022', 14, 1, 3, '10', '25.3', '38.7', '64.0', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:43', 1),
(169, 'NS1027/0179/2023', 14, 1, 3, '10', '29.8', '47.7', '77.5', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:44', 1),
(170, 'NS4569/0030/2023', 14, 1, 3, '10', '32.4', '45.0', '77.4', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:44', 1),
(171, 'NS4740/0041/2023', 14, 1, 3, '10', '25.3', '41.7', '67.0', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:44', 1),
(172, 'NS1618/0012/2023', 14, 1, 3, '10', '25.0', '42.6', '67.6', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:44', 1),
(173, 'NS1060/0017/2023', 14, 1, 3, '10', '29.7', '41.4', '71.1', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:44', 1),
(174, 'NS5033/0020/2022', 14, 1, 3, '10', '32.0', '44.1', '76.1', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:42', '2025-04-19 20:14:44', 1),
(175, 'NS0722/0031/2023', 14, 1, 3, '10', '22.8', '38.1', '60.9', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:44', 1),
(176, 'NS4740/0048/2023', 14, 1, 3, '10', '21.6', '41.4', '63.0', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:44', 1),
(177, 'NS4498/0051/2020', 14, 1, 3, '10', '27.8', '42.3', '70.1', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:45', 1),
(178, 'NS0241/0039/2020', 14, 1, 3, '10', '29.0', '46.5', '75.5', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:45', 1),
(179, 'NS0414/0019/2023', 14, 1, 3, '10', '35.2', '46.2', '81.4', 'A', '40', '4.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:45', 1),
(180, 'NS0197/0009/2020', 14, 1, 3, '10', '27.7', '37.5', '65.2', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:45', 1),
(181, 'NS3893/0156/2023', 14, 1, 3, '10', '27.9', '40.2', '68.1', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:45', 1),
(182, 'NS0672/0057/2023', 14, 1, 3, '10', '29.4', '37.2', '66.6', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:45', 1),
(183, 'NS4816/0040/2021', 14, 1, 3, '10', '29.2', '47.7', '76.9', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:45', 1),
(184, 'NS1633/0164/2023', 14, 1, 3, '10', '27.0', '40.2', '67.2', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:46', 1),
(185, 'NS4208/0008/2022', 14, 1, 3, '10', '29.4', '39.0', '68.4', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:46', 1),
(186, 'NS3897/0105/2023', 14, 1, 3, '10', '30.2', '49.2', '79.4', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:43', '2025-04-19 20:14:46', 1),
(187, 'NS0526/0115/2021', 14, 1, 3, '10', '29.7', '49.2', '78.9', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:44', '2025-04-19 20:14:46', 1),
(188, 'NS0274/0046/2023', 14, 1, 3, '10', '29.9', '45.9', '75.8', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:44', '2025-04-19 20:14:46', 1),
(189, 'NS6048/0056/2023', 14, 1, 3, '10', '26.7', '41.4', '68.1', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:44', '2025-04-19 20:14:46', 1),
(190, 'NS4006/0030/2021', 14, 1, 3, '10', '32.4', '46.5', '78.9', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:44', '2025-04-19 20:14:46', 1),
(191, 'NS2505/0044/2017', 14, 1, 3, '10', '24.7', '42.9', '67.6', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:44', '2025-04-19 20:14:46', 1),
(192, 'NS4238/0026/2021', 14, 1, 3, '10', '30.8', '46.8', '77.6', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:44', '2025-04-19 20:14:47', 1),
(193, 'NS3351/0179/2023', 14, 1, 3, '10', '28.7', '49.8', '78.5', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:44', '2025-04-19 20:14:47', 1),
(194, 'NS4117/0256/2022', 14, 1, 3, '10', '23.6', '39.6', '63.2', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:44', '2025-04-19 20:14:47', 1),
(195, 'NS3321/0044/2021', 14, 1, 3, '10', '20.4', '42.0', '62.4', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:44', '2025-04-19 20:14:47', 1),
(196, 'NS5551/0011/2021', 14, 1, 3, '10', '31.8', '43.5', '75.3', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:44', '2025-04-19 20:14:47', 1),
(197, 'NS0345/0088/2023', 14, 1, 3, '10', '30.9', '47.1', '78.0', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:45', '2025-04-19 20:14:47', 1),
(198, 'NS4710/0030/2023', 14, 1, 3, '10', '24.1', '44.1', '68.2', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:45', '2025-04-19 20:14:47', 1),
(199, 'NS5822/0117/2023', 14, 1, 3, '10', '29.8', '43.8', '73.6', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:45', '2025-04-19 20:14:48', 1),
(200, 'NS1097/0129/2021', 14, 1, 3, '10', '29.3', '48.3', '77.6', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:45', '2025-04-19 20:14:48', 1),
(201, 'NS1633/0136/2021', 14, 1, 3, '10', '33.4', '46.8', '80.2', 'A', '40', '4.0', 'PASS', '2025-04-19 20:13:45', '2025-04-19 20:14:48', 1),
(202, 'NS0672/0094/2021', 14, 1, 3, '10', '29.5', '44.7', '74.2', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:45', '2025-04-19 20:14:48', 1),
(203, 'NS2521/0024/2021', 14, 1, 3, '10', '34.1', '48.0', '82.1', 'A', '40', '4.0', 'PASS', '2025-04-19 20:13:45', '2025-04-19 20:14:48', 1),
(204, 'NS1581/0075/2023', 14, 1, 3, '10', '29.7', '39.9', '69.6', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:45', '2025-04-19 20:14:48', 1),
(205, 'NS2315/0115/2021', 14, 1, 3, '10', '30.8', '45.9', '76.7', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:45', '2025-04-19 20:14:48', 1),
(206, 'NS2171/0052/2023', 14, 1, 3, '10', '31.7', '43.8', '75.5', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:46', '2025-04-19 20:14:49', 1),
(207, 'NS2424/0074/2023', 14, 1, 3, '10', '25.2', '39.0', '64.2', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:46', '2025-04-19 20:14:49', 1),
(208, 'NS0632/0053/2023', 14, 1, 3, '10', '22.9', '40.2', '63.1', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:46', '2025-04-19 20:14:49', 1),
(209, 'NS0672/0135/2023', 14, 1, 3, '10', '21.1', '43.8', '64.9', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:46', '2025-04-19 20:14:49', 1),
(210, 'NS5376/0082/2023', 14, 1, 3, '10', '22.6', '41.7', '64.3', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:46', '2025-04-19 20:14:49', 1),
(211, 'NS3228/0285/2022', 14, 1, 3, '10', '24.3', '41.7', '66.0', 'B', '30', '3.0', 'PASS', '2025-04-19 20:13:46', '2025-04-19 20:14:49', 1),
(212, 'NS0541/0100/2023', 14, 1, 3, '10', '23.7', '38.1', '61.8', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:46', '2025-04-19 20:14:49', 1),
(213, 'NS3534/0025/2023', 14, 1, 3, '10', '29.7', '50.4', '80.1', 'A', '40', '4.0', 'PASS', '2025-04-19 20:13:47', '2025-04-19 20:14:49', 1),
(214, 'NS5251/0066/2023', 14, 1, 3, '10', '22.8', '35.1', '57.9', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:47', '2025-04-19 20:14:50', 1),
(215, 'NS5298/0057/2023', 14, 1, 3, '10', '22.8', '36.3', '59.1', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:47', '2025-04-19 20:14:50', 1),
(216, 'NS4897/0091/2023', 14, 1, 3, '10', '21.8', '40.5', '62.3', 'C', '20', '2.0', 'PASS', '2025-04-19 20:13:47', '2025-04-19 20:14:50', 1),
(217, 'NS0772/0099/2020', 14, 1, 4, '13', '34.8', '57.6', '92.4', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:51', 1),
(218, 'NS5289/0024/2023', 14, 1, 4, '13', '34.0', '57.8', '91.8', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:51', 1),
(219, 'NP1153/0013/2023', 14, 1, 4, '13', '27.4', '58.7', '86.1', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:51', 1),
(220, 'NS5357/0001/2023', 14, 1, 4, '13', '33.0', '53.7', '86.7', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:51', 1),
(221, 'NS0672/0001/2023', 14, 1, 4, '13', '29.5', '54.3', '83.8', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:51', 1),
(222, 'NS2367/0005/2023', 14, 1, 4, '13', '30.4', '54.2', '84.6', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:51', 1),
(223, 'NS0294/0005/2023', 14, 1, 4, '13', '33.9', '55.2', '89.1', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:52', 1),
(224, 'NS0916/0003/2023', 14, 1, 4, '13', '30.5', '54.0', '84.5', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:52', 1),
(225, 'NS1375/0002/2023', 14, 1, 4, '13', '29.1', '55.7', '84.8', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:52', 1),
(226, 'NS0547/0015/2023', 14, 1, 4, '13', '31.8', '52.4', '84.2', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:52', 1),
(227, 'NS0345/0172/2023', 14, 1, 4, '13', '33.2', '57.2', '90.4', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:52', 1),
(228, 'NS1394/0007/2023', 14, 1, 4, '13', '31.8', '56.0', '87.8', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:52', 1),
(229, 'NS4740/0008/2023', 14, 1, 4, '13', '31.2', '57.6', '88.8', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:28', '2025-04-19 21:10:52', 1),
(230, 'NEQ2022001913/2020', 14, 1, 4, '13', '30.6', '51.2', '81.8', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:53', 1),
(231, 'NS3371/0102/2023', 14, 1, 4, '13', '31.9', '56.4', '88.3', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:53', 1),
(232, 'NS3897/0088/2023', 14, 1, 4, '13', '28.3', '52.2', '80.5', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:53', 1),
(233, 'NS3757/0023/2023', 14, 1, 4, '13', '29.5', '55.7', '85.2', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:53', 1),
(234, 'NS3981/0011/2023', 14, 1, 4, '13', '30.1', '55.4', '85.5', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:53', 1),
(235, 'NS3453/0010/2023', 14, 1, 4, '13', '28.0', '49.7', '77.7', 'B', '39', '3.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:53', 1),
(236, 'NS5156/0084/2023', 14, 1, 4, '13', '30.2', '55.2', '85.4', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:53', 1),
(237, 'NS2510/0010/2023', 14, 1, 4, '13', '32.7', '57.3', '90.0', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:54', 1),
(238, 'NS0970/0015/2023', 14, 1, 4, '13', '32.2', '56.1', '88.3', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:54', 1),
(239, 'NS3834/0019/2018', 14, 1, 4, '13', '33.5', '57.2', '90.7', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:54', 1),
(240, 'NS0850/0022/2022', 14, 1, 4, '13', '30.2', '55.4', '85.6', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:54', 1),
(241, 'NS1027/0179/2023', 14, 1, 4, '13', '34.1', '55.1', '89.2', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:54', 1),
(242, 'NS4569/0030/2023', 14, 1, 4, '13', '33.0', '52.1', '85.1', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:54', 1),
(243, 'NS4740/0041/2023', 14, 1, 4, '13', '29.5', '54.6', '84.1', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:54', 1),
(244, 'NS1618/0012/2023', 14, 1, 4, '13', '31.1', '56.1', '87.2', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:55', 1),
(245, 'NS1060/0017/2023', 14, 1, 4, '13', '29.0', '57.3', '86.3', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:55', 1),
(246, 'NS5033/0020/2022', 14, 1, 4, '13', '34.0', '52.7', '86.7', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:29', '2025-04-19 21:10:55', 1),
(247, 'NS0722/0031/2023', 14, 1, 4, '13', '30.4', '53.1', '83.5', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:30', '2025-04-19 21:10:55', 1),
(248, 'NS4740/0048/2023', 14, 1, 4, '13', '29.2', '54.0', '83.2', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:30', '2025-04-19 21:10:55', 1),
(249, 'NS4498/0051/2020', 14, 1, 4, '13', '32.2', '49.7', '81.9', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:30', '2025-04-19 21:10:55', 1),
(250, 'NS0241/0039/2020', 14, 1, 4, '13', '31.7', '57.5', '89.2', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:30', '2025-04-19 21:10:55', 1),
(251, 'NS0414/0019/2023', 14, 1, 4, '13', '33.8', '57.6', '91.4', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:30', '2025-04-19 21:10:55', 1),
(252, 'NS0197/0009/2020', 14, 1, 4, '13', '29.7', '55.1', '84.8', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:30', '2025-04-19 21:10:56', 1),
(253, 'NS3893/0156/2023', 14, 1, 4, '13', '28.5', '55.1', '83.6', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:30', '2025-04-19 21:10:56', 1),
(254, 'NS0672/0057/2023', 14, 1, 4, '13', '31.3', '54.3', '85.6', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:30', '2025-04-19 21:10:56', 1),
(255, 'NS4816/0040/2021', 14, 1, 4, '13', '31.9', '54.8', '86.7', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:30', '2025-04-19 21:10:56', 1),
(256, 'NS1633/0164/2023', 14, 1, 4, '13', '31.2', '56.1', '87.3', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:30', '2025-04-19 21:10:56', 1),
(257, 'NS4208/0008/2022', 14, 1, 4, '13', '30.6', '52.1', '82.7', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:30', '2025-04-19 21:10:56', 1),
(258, 'NS3897/0105/2023', 14, 1, 4, '13', '33.0', '57.6', '90.6', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:31', '2025-04-19 21:10:56', 1),
(259, 'NS0526/0115/2021', 14, 1, 4, '13', '32.1', '51.6', '83.7', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:31', '2025-04-19 21:10:57', 1),
(260, 'NS0274/0046/2023', 14, 1, 4, '13', '33.2', '55.7', '88.9', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:31', '2025-04-19 21:10:57', 1),
(261, 'NS6048/0056/2023', 14, 1, 4, '13', '33.4', '56.7', '90.1', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:31', '2025-04-19 21:10:57', 1),
(262, 'NS4006/0030/2021', 14, 1, 4, '13', '32.3', '56.0', '88.3', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:31', '2025-04-19 21:10:57', 1),
(263, 'NS2505/0044/2017', 14, 1, 4, '13', '30.1', '53.7', '83.8', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:31', '2025-04-19 21:10:57', 1),
(264, 'NS4238/0026/2021', 14, 1, 4, '13', '31.2', '55.5', '86.7', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:31', '2025-04-19 21:10:57', 1),
(265, 'NS3351/0179/2023', 14, 1, 4, '13', '32.0', '57.8', '89.8', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:31', '2025-04-19 21:10:57', 1),
(266, 'NS4117/0256/2022', 14, 1, 4, '13', '29.2', '55.5', '84.7', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:31', '2025-04-19 21:10:58', 1),
(267, 'NS3321/0044/2021', 14, 1, 4, '13', '30.7', '53.9', '84.6', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:31', '2025-04-19 21:10:58', 1),
(268, 'NS5551/0011/2021', 14, 1, 4, '13', '33.7', '54.0', '87.7', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:31', '2025-04-19 21:10:58', 1),
(269, 'NS0345/0088/2023', 14, 1, 4, '13', '31.0', '55.1', '86.1', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:32', '2025-04-19 21:10:58', 1),
(270, 'NS4710/0030/2023', 14, 1, 4, '13', '27.8', '55.5', '83.3', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:32', '2025-04-19 21:10:58', 1),
(271, 'NS5822/0117/2023', 14, 1, 4, '13', '33.0', '56.0', '89.0', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:32', '2025-04-19 21:10:58', 1),
(272, 'NS1097/0129/2021', 14, 1, 4, '13', '34.5', '57.9', '92.4', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:32', '2025-04-19 21:10:58', 1),
(273, 'NS1633/0136/2021', 14, 1, 4, '13', '34.2', '57.2', '91.4', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:32', '2025-04-19 21:10:58', 1),
(274, 'NS0672/0094/2021', 14, 1, 4, '13', '33.3', '56.1', '89.4', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:32', '2025-04-19 21:10:59', 1),
(275, 'NS2521/0024/2021', 14, 1, 4, '13', '34.5', '57.9', '92.4', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:32', '2025-04-19 21:10:59', 1),
(276, 'NS1581/0075/2023', 14, 1, 4, '13', '28.5', '54.8', '83.3', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:33', '2025-04-19 21:10:59', 1),
(277, 'NS2315/0115/2021', 14, 1, 4, '13', '30.8', '54.9', '85.7', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:33', '2025-04-19 21:10:59', 1),
(278, 'NS2171/0052/2023', 14, 1, 4, '13', '31.9', '53.6', '85.5', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:33', '2025-04-19 21:10:59', 1),
(279, 'NS2424/0074/2023', 14, 1, 4, '13', '27.5', '50.1', '77.6', 'B', '39', '3.0', 'PASS', '2025-04-19 21:09:33', '2025-04-19 21:10:59', 1),
(280, 'NS0632/0053/2023', 14, 1, 4, '13', '27.0', '51.9', '78.9', 'B', '39', '3.0', 'PASS', '2025-04-19 21:09:33', '2025-04-19 21:10:59', 1),
(281, 'NS0672/0135/2023', 14, 1, 4, '13', '32.1', '51.6', '83.7', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:33', '2025-04-19 21:11:00', 1),
(282, 'NS5376/0082/2023', 14, 1, 4, '13', '30.4', '43.2', '73.6', 'B', '39', '3.0', 'PASS', '2025-04-19 21:09:33', '2025-04-19 21:11:00', 1),
(283, 'NS3228/0285/2022', 14, 1, 4, '13', '32.2', '54.0', '86.2', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:33', '2025-04-19 21:11:00', 1),
(284, 'NS0541/0100/2023', 14, 1, 4, '13', '32.5', '56.9', '89.4', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:34', '2025-04-19 21:11:00', 1),
(285, 'NS3534/0025/2023', 14, 1, 4, '13', '32.7', '56.1', '88.8', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:34', '2025-04-19 21:11:00', 1),
(286, 'NS5251/0066/2023', 14, 1, 4, '13', '27.9', '52.2', '80.1', 'A', '52', '4.0', 'PASS', '2025-04-19 21:09:34', '2025-04-19 21:11:00', 1),
(287, 'NS5298/0057/2023', 14, 1, 4, '13', '28.6', '51.0', '79.6', 'B', '39', '3.0', 'PASS', '2025-04-19 21:09:34', '2025-04-19 21:11:00', 1),
(288, 'NS4897/0091/2023', 14, 1, 4, '13', '25.3', '51.9', '77.2', 'B', '39', '3.0', 'PASS', '2025-04-19 21:09:34', '2025-04-19 21:11:00', 1),
(289, 'NS0772/0099/2020', 14, 1, 5, '7', '31.2', '56.4', '87.6', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:20', 1),
(290, 'NS5289/0024/2023', 14, 1, 5, '7', '33.3', '58.5', '91.8', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:20', 1),
(291, 'NP1153/0013/2023', 14, 1, 5, '7', '28.8', '49.2', '78.0', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:20', 1),
(292, 'NS5357/0001/2023', 14, 1, 5, '7', '35.3', '57.5', '92.8', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:20', 1),
(293, 'NS0672/0001/2023', 14, 1, 5, '7', '32.9', '58.2', '91.1', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:21', 1),
(294, 'NS2367/0005/2023', 14, 1, 5, '7', '30.8', '52.8', '83.6', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:21', 1),
(295, 'NS0294/0005/2023', 14, 1, 5, '7', '28.4', '59.3', '87.7', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:21', 1),
(296, 'NS0916/0003/2023', 14, 1, 5, '7', '28.1', '55.4', '83.5', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:21', 1),
(297, 'NS1375/0002/2023', 14, 1, 5, '7', '26.2', '53.9', '80.1', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:21', 1),
(298, 'NS0547/0015/2023', 14, 1, 5, '7', '29.1', '47.1', '76.2', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:21', 1),
(299, 'NS0345/0172/2023', 14, 1, 5, '7', '24.2', '52.5', '76.7', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:21', 1),
(300, 'NS1394/0007/2023', 14, 1, 5, '7', '28.4', '46.4', '74.8', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:22', 1),
(301, 'NS4740/0008/2023', 14, 1, 5, '7', '27.6', '56.1', '83.7', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:22', 1),
(302, 'NEQ2022001913/2020', 14, 1, 5, '7', '30.2', '51.0', '81.2', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:22', 1),
(303, 'NS3371/0102/2023', 14, 1, 5, '7', '30.1', '59.1', '89.2', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:22', 1),
(304, 'NS3897/0088/2023', 14, 1, 5, '7', '23.7', '50.0', '73.7', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:22', 1),
(305, 'NS3757/0023/2023', 14, 1, 5, '7', '28.1', '52.4', '80.5', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:21', '2025-04-19 21:26:22', 1),
(306, 'NS3981/0011/2023', 14, 1, 5, '7', '31.5', '57.0', '88.5', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:22', 1),
(307, 'NS3453/0010/2023', 14, 1, 5, '7', '29.4', '48.5', '77.9', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:22', 1),
(308, 'NS5156/0084/2023', 14, 1, 5, '7', '29.4', '48.3', '77.7', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:23', 1),
(309, 'NS2510/0010/2023', 14, 1, 5, '7', '31.0', '56.1', '87.1', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:23', 1),
(310, 'NS0970/0015/2023', 14, 1, 5, '7', '33.0', '51.8', '84.8', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:23', 1),
(311, 'NS3834/0019/2018', 14, 1, 5, '7', '34.5', '60.0', '94.5', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:23', 1),
(312, 'NS0850/0022/2022', 14, 1, 5, '7', '25.0', '45.6', '70.6', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:23', 1),
(313, 'NS1027/0179/2023', 14, 1, 5, '7', '32.6', '54.0', '86.6', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:23', 1),
(314, 'NS4569/0030/2023', 14, 1, 5, '7', '32.5', '51.5', '84.0', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:23', 1),
(315, 'NS4740/0041/2023', 14, 1, 5, '7', '30.4', '56.9', '87.3', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:24', 1),
(316, 'NS1618/0012/2023', 14, 1, 5, '7', '26.3', '50.9', '77.2', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:24', 1),
(317, 'NS1060/0017/2023', 14, 1, 5, '7', '26.1', '49.5', '75.6', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:24', 1),
(318, 'NS5033/0020/2022', 14, 1, 5, '7', '32.1', '53.7', '85.8', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:24', 1),
(319, 'NS0722/0031/2023', 14, 1, 5, '7', '26.5', '49.1', '75.6', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:24', 1),
(320, 'NS4740/0048/2023', 14, 1, 5, '7', '29.2', '49.5', '78.7', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:22', '2025-04-19 21:26:24', 1),
(321, 'NS4498/0051/2020', 14, 1, 5, '7', '30.9', '55.5', '86.4', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:23', '2025-04-19 21:26:24', 1),
(322, 'NS0241/0039/2020', 14, 1, 5, '7', '26.9', '42.3', '69.2', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:23', '2025-04-19 21:26:24', 1),
(323, 'NS0414/0019/2023', 14, 1, 5, '7', '34.7', '55.2', '89.9', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:23', '2025-04-19 21:26:25', 1),
(324, 'NS0197/0009/2020', 14, 1, 5, '7', '32.3', '60.0', '92.3', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:23', '2025-04-19 21:26:25', 1),
(325, 'NS3893/0156/2023', 14, 1, 5, '7', '25.5', '50.4', '75.9', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:23', '2025-04-19 21:26:25', 1),
(326, 'NS0672/0057/2023', 14, 1, 5, '7', '29.0', '47.6', '76.6', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:23', '2025-04-19 21:26:25', 1),
(327, 'NS4816/0040/2021', 14, 1, 5, '7', '30.3', '46.4', '76.7', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:23', '2025-04-19 21:26:25', 1),
(328, 'NS1633/0164/2023', 14, 1, 5, '7', '23.5', '53.1', '76.6', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:23', '2025-04-19 21:26:25', 1),
(329, 'NS4208/0008/2022', 14, 1, 5, '7', '31.4', '50.1', '81.5', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:23', '2025-04-19 21:26:25', 1),
(330, 'NS3897/0105/2023', 14, 1, 5, '7', '31.1', '56.4', '87.5', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:23', '2025-04-19 21:26:26', 1),
(331, 'NS0526/0115/2021', 14, 1, 5, '7', '31.8', '49.7', '81.5', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:23', '2025-04-19 21:26:26', 1),
(332, 'NS0274/0046/2023', 14, 1, 5, '7', '31.7', '55.4', '87.1', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:24', '2025-04-19 21:26:26', 1),
(333, 'NS6048/0056/2023', 14, 1, 5, '7', '35.3', '56.3', '91.6', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:24', '2025-04-19 21:26:26', 1),
(334, 'NS4006/0030/2021', 14, 1, 5, '7', '26.0', '47.3', '73.3', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:24', '2025-04-19 21:26:26', 1),
(335, 'NS2505/0044/2017', 14, 1, 5, '7', '31.0', '58.1', '89.1', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:24', '2025-04-19 21:26:26', 1),
(336, 'NS4238/0026/2021', 14, 1, 5, '7', '30.7', '54.2', '84.9', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:24', '2025-04-19 21:26:26', 1),
(337, 'NS3351/0179/2023', 14, 1, 5, '7', '29.2', '52.7', '81.9', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:24', '2025-04-19 21:26:27', 1),
(338, 'NS4117/0256/2022', 14, 1, 5, '7', '23.9', '40.5', '64.4', 'C', '14', '2.0', 'PASS', '2025-04-19 21:23:24', '2025-04-19 21:26:27', 1),
(339, 'NS3321/0044/2021', 14, 1, 5, '7', '27.6', '36.0', '63.6', 'C', '14', '2.0', 'PASS', '2025-04-19 21:23:24', '2025-04-19 21:26:27', 1),
(340, 'NS5551/0011/2021', 14, 1, 5, '7', '25.4', '49.1', '74.5', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:24', '2025-04-19 21:26:27', 1),
(341, 'NS0345/0088/2023', 14, 1, 5, '7', '33.1', '58.5', '91.6', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:24', '2025-04-19 21:26:27', 1),
(342, 'NS4710/0030/2023', 14, 1, 5, '7', '23.3', '49.5', '72.8', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:24', '2025-04-19 21:26:27', 1),
(343, 'NS5822/0117/2023', 14, 1, 5, '7', '35.8', '52.4', '88.2', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:25', '2025-04-19 21:26:27', 1),
(344, 'NS1097/0129/2021', 14, 1, 5, '7', '30.3', '53.4', '83.7', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:25', '2025-04-19 21:26:27', 1),
(345, 'NS1633/0136/2021', 14, 1, 5, '7', '36.5', '55.1', '91.6', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:25', '2025-04-19 21:26:28', 1),
(346, 'NS0672/0094/2021', 14, 1, 5, '7', '30.0', '54.8', '84.8', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:25', '2025-04-19 21:26:28', 1),
(347, 'NS2521/0024/2021', 14, 1, 5, '7', '31.3', '59.7', '91.0', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:25', '2025-04-19 21:26:28', 1),
(348, 'NS1581/0075/2023', 14, 1, 5, '7', '24.9', '51.3', '76.2', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:25', '2025-04-19 21:26:28', 1),
(349, 'NS2315/0115/2021', 14, 1, 5, '7', '31.0', '49.7', '80.7', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:25', '2025-04-19 21:26:28', 1),
(350, 'NS2171/0052/2023', 14, 1, 5, '7', '25.3', '55.4', '80.7', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:25', '2025-04-19 21:26:28', 1),
(351, 'NS2424/0074/2023', 14, 1, 5, '7', '23.6', '46.4', '70.0', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:25', '2025-04-19 21:26:28', 1),
(352, 'NS0632/0053/2023', 14, 1, 5, '7', '29.9', '53.1', '83.0', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:26', '2025-04-19 21:26:29', 1),
(353, 'NS0672/0135/2023', 14, 1, 5, '7', '27.4', '42.9', '70.3', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:26', '2025-04-19 21:26:29', 1),
(354, 'NS5376/0082/2023', 14, 1, 5, '7', '30.5', '56.4', '86.9', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:26', '2025-04-19 21:26:29', 1),
(355, 'NS3228/0285/2022', 14, 1, 5, '7', '27.6', '52.2', '79.8', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:26', '2025-04-19 21:26:29', 1),
(356, 'NS0541/0100/2023', 14, 1, 5, '7', '33.2', '54.6', '87.8', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:26', '2025-04-19 21:26:29', 1),
(357, 'NS3534/0025/2023', 14, 1, 5, '7', '24.3', '48.3', '72.6', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:26', '2025-04-19 21:26:29', 1);
INSERT INTO `course_results` (`id`, `reg_no`, `year_id`, `semester_id`, `course_id`, `credits`, `ca_score`, `se_score`, `total_score`, `grade`, `points`, `gpa`, `remarks`, `created_at`, `updated_at`, `year_of_study`) VALUES
(358, 'NS5251/0066/2023', 14, 1, 5, '7', '29.0', '57.3', '86.3', 'A', '28', '4.0', 'PASS', '2025-04-19 21:23:26', '2025-04-19 21:26:29', 1),
(359, 'NS5298/0057/2023', 14, 1, 5, '7', '27.8', '50.7', '78.5', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:26', '2025-04-19 21:26:29', 1),
(360, 'NS4897/0091/2023', 14, 1, 5, '7', '25.4', '48.6', '74.0', 'B', '21', '3.0', 'PASS', '2025-04-19 21:23:27', '2025-04-19 21:26:30', 1),
(361, 'NS0772/0099/2020', 14, 1, 6, '5', '34.6', '56.7', '91.3', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:56', 1),
(362, 'NS5289/0024/2023', 14, 1, 6, '5', '34.6', '57.6', '92.2', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:56', 1),
(363, 'NP1153/0013/2023', 14, 1, 6, '5', '23.2', '55.8', '79.0', 'B', '15', '3.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:56', 1),
(364, 'NS5357/0001/2023', 14, 1, 6, '5', '36.4', '56.1', '92.5', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:56', 1),
(365, 'NS0672/0001/2023', 14, 1, 6, '5', '32.9', '50.7', '83.6', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:56', 1),
(366, 'NS2367/0005/2023', 14, 1, 6, '5', '23.7', '42.9', '66.6', 'B', '15', '3.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:56', 1),
(367, 'NS0294/0005/2023', 14, 1, 6, '5', '29.5', '55.5', '85.0', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:56', 1),
(368, 'NS0916/0003/2023', 14, 1, 6, '5', '30.7', '55.8', '86.5', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:57', 1),
(369, 'NS1375/0002/2023', 14, 1, 6, '5', '23.7', '54.9', '78.6', 'B', '15', '3.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:57', 1),
(370, 'NS0547/0015/2023', 14, 1, 6, '5', '30.0', '51.3', '81.3', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:57', 1),
(371, 'NS0345/0172/2023', 14, 1, 6, '5', '25.0', '53.1', '78.1', 'B', '15', '3.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:57', 1),
(372, 'NS1394/0007/2023', 14, 1, 6, '5', '25.0', '57.3', '82.3', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:57', 1),
(373, 'NS4740/0008/2023', 14, 1, 6, '5', '33.5', '41.7', '75.2', 'B', '15', '3.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:57', 1),
(374, 'NEQ2022001913/2020', 14, 1, 6, '5', '22.3', '55.5', '77.8', 'B', '15', '3.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:57', 1),
(375, 'NS3371/0102/2023', 14, 1, 6, '5', '29.2', '55.8', '85.0', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:58', 1),
(376, 'NS3897/0088/2023', 14, 1, 6, '5', '31.3', '56.4', '87.7', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:58', '2025-04-19 22:08:58', 1),
(377, 'NS3757/0023/2023', 14, 1, 6, '5', '24.8', '53.1', '77.9', 'B', '15', '3.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:58', 1),
(378, 'NS3981/0011/2023', 14, 1, 6, '5', '33.8', '55.8', '89.6', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:58', 1),
(379, 'NS3453/0010/2023', 14, 1, 6, '5', '25.7', '58.5', '84.2', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:58', 1),
(380, 'NS5156/0084/2023', 14, 1, 6, '5', '26.5', '53.7', '80.2', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:58', 1),
(381, 'NS2510/0010/2023', 14, 1, 6, '5', '32.9', '52.8', '85.7', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:58', 1),
(382, 'NS0970/0015/2023', 14, 1, 6, '5', '29.9', '58.2', '88.1', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:58', 1),
(383, 'NS3834/0019/2018', 14, 1, 6, '5', '33.0', '60.0', '93.0', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:59', 1),
(384, 'NS0850/0022/2022', 14, 1, 6, '5', '25.5', '54.9', '80.4', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:59', 1),
(385, 'NS1027/0179/2023', 14, 1, 6, '5', '31.0', '57.3', '88.3', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:59', 1),
(386, 'NS4569/0030/2023', 14, 1, 6, '5', '35.2', '52.2', '87.4', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:59', 1),
(387, 'NS4740/0041/2023', 14, 1, 6, '5', '25.7', '49.8', '75.5', 'B', '15', '3.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:59', 1),
(388, 'NS1618/0012/2023', 14, 1, 6, '5', '30.0', '51.9', '81.9', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:59', 1),
(389, 'NS1060/0017/2023', 14, 1, 6, '5', '24.8', '55.2', '80.0', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:08:59', 1),
(390, 'NS5033/0020/2022', 14, 1, 6, '5', '31.9', '57.0', '88.9', 'A', '20', '4.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:09:00', 1),
(391, 'NS0722/0031/2023', 14, 1, 6, '5', '22.0', '53.1', '75.1', 'B', '15', '3.0', 'PASS', '2025-04-19 22:07:59', '2025-04-19 22:09:00', 1),
(392, 'NS4740/0048/2023', 14, 1, 6, '5', '21.9', '56.4', '78.3', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:00', 1),
(393, 'NS4498/0051/2020', 14, 1, 6, '5', '27.7', '54.3', '82.0', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:00', 1),
(394, 'NS0241/0039/2020', 14, 1, 6, '5', '29.4', '54.6', '84.0', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:00', 1),
(395, 'NS0414/0019/2023', 14, 1, 6, '5', '34.9', '57.3', '92.2', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:00', 1),
(396, 'NS0197/0009/2020', 14, 1, 6, '5', '24.3', '54.0', '78.3', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:00', 1),
(397, 'NS3893/0156/2023', 14, 1, 6, '5', '24.3', '56.7', '81.0', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:01', 1),
(398, 'NS0672/0057/2023', 14, 1, 6, '5', '28.8', '55.8', '84.6', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:01', 1),
(399, 'NS4816/0040/2021', 14, 1, 6, '5', '28.3', '52.8', '81.1', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:01', 1),
(400, 'NS1633/0164/2023', 14, 1, 6, '5', '23.5', '57.3', '80.8', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:01', 1),
(401, 'NS4208/0008/2022', 14, 1, 6, '5', '28.2', '55.8', '84.0', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:01', 1),
(402, 'NS3897/0105/2023', 14, 1, 6, '5', '33.7', '57.3', '91.0', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:01', 1),
(403, 'NS0526/0115/2021', 14, 1, 6, '5', '34.0', '49.8', '83.8', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:01', 1),
(404, 'NS0274/0046/2023', 14, 1, 6, '5', '28.3', '57.9', '86.2', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:00', '2025-04-19 22:09:01', 1),
(405, 'NS6048/0056/2023', 14, 1, 6, '5', '32.0', '46.8', '78.8', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:01', '2025-04-19 22:09:02', 1),
(406, 'NS4006/0030/2021', 14, 1, 6, '5', '35.0', '56.4', '91.4', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:01', '2025-04-19 22:09:02', 1),
(407, 'NS2505/0044/2017', 14, 1, 6, '5', '28.9', '54.0', '82.9', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:01', '2025-04-19 22:09:02', 1),
(408, 'NS4238/0026/2021', 14, 1, 6, '5', '28.9', '54.0', '82.9', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:01', '2025-04-19 22:09:02', 1),
(409, 'NS3351/0179/2023', 14, 1, 6, '5', '33.5', '55.2', '88.7', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:01', '2025-04-19 22:09:02', 1),
(410, 'NS4117/0256/2022', 14, 1, 6, '5', '25.3', '54.0', '79.3', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:01', '2025-04-19 22:09:02', 1),
(411, 'NS3321/0044/2021', 14, 1, 6, '5', '26.4', '44.4', '70.8', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:01', '2025-04-19 22:09:02', 1),
(412, 'NS5551/0011/2021', 14, 1, 6, '5', '32.7', '51.6', '84.3', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:01', '2025-04-19 22:09:03', 1),
(413, 'NS0345/0088/2023', 14, 1, 6, '5', '33.1', '50.7', '83.8', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:01', '2025-04-19 22:09:03', 1),
(414, 'NS4710/0030/2023', 14, 1, 6, '5', '29.9', '46.8', '76.7', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:01', '2025-04-19 22:09:03', 1),
(415, 'NS5822/0117/2023', 14, 1, 6, '5', '32.9', '57.0', '89.9', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:02', '2025-04-19 22:09:03', 1),
(416, 'NS1097/0129/2021', 14, 1, 6, '5', '30.9', '57.3', '88.2', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:02', '2025-04-19 22:09:03', 1),
(417, 'NS1633/0136/2021', 14, 1, 6, '5', '33.6', '56.1', '89.7', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:02', '2025-04-19 22:09:03', 1),
(418, 'NS0672/0094/2021', 14, 1, 6, '5', '34.1', '53.7', '87.8', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:02', '2025-04-19 22:09:03', 1),
(419, 'NS2521/0024/2021', 14, 1, 6, '5', '31.2', '56.4', '87.6', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:02', '2025-04-19 22:09:03', 1),
(420, 'NS1581/0075/2023', 14, 1, 6, '5', '28.4', '54.3', '82.7', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:02', '2025-04-19 22:09:04', 1),
(421, 'NS2315/0115/2021', 14, 1, 6, '5', '31.8', '47.7', '79.5', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:02', '2025-04-19 22:09:04', 1),
(422, 'NS2171/0052/2023', 14, 1, 6, '5', '32.7', '56.1', '88.8', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:02', '2025-04-19 22:09:04', 1),
(423, 'NS2424/0074/2023', 14, 1, 6, '5', '21.5', '49.5', '71.0', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:03', '2025-04-19 22:09:04', 1),
(424, 'NS0632/0053/2023', 14, 1, 6, '5', '23.2', '50.1', '73.3', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:03', '2025-04-19 22:09:04', 1),
(425, 'NS0672/0135/2023', 14, 1, 6, '5', '25.0', '54.6', '79.6', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:03', '2025-04-19 22:09:04', 1),
(426, 'NS5376/0082/2023', 14, 1, 6, '5', '26.5', '51.6', '78.1', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:03', '2025-04-19 22:09:04', 1),
(427, 'NS3228/0285/2022', 14, 1, 6, '5', '29.7', '55.2', '84.9', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:03', '2025-04-19 22:09:04', 1),
(428, 'NS0541/0100/2023', 14, 1, 6, '5', '30.0', '55.8', '85.8', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:03', '2025-04-19 22:09:05', 1),
(429, 'NS3534/0025/2023', 14, 1, 6, '5', '32.8', '58.5', '91.3', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:03', '2025-04-19 22:09:05', 1),
(430, 'NS5251/0066/2023', 14, 1, 6, '5', '22.9', '56.1', '79.0', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:03', '2025-04-19 22:09:05', 1),
(431, 'NS5298/0057/2023', 14, 1, 6, '5', '23.9', '54.3', '78.2', 'B', '15', '3.0', 'PASS', '2025-04-19 22:08:04', '2025-04-19 22:09:05', 1),
(432, 'NS4897/0091/2023', 14, 1, 6, '5', '24.4', '56.7', '81.1', 'A', '20', '4.0', 'PASS', '2025-04-19 22:08:04', '2025-04-19 22:09:05', 1),
(433, 'NS0772/0099/2020', 14, 1, 7, '10', '34.5', '52.7', '87.2', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:08', 1),
(434, 'NS5289/0024/2023', 14, 1, 7, '10', '36.2', '53.1', '89.3', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:08', 1),
(435, 'NP1153/0013/2023', 14, 1, 7, '10', '33.0', '52.7', '85.7', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:08', 1),
(436, 'NS5357/0001/2023', 14, 1, 7, '10', '31.2', '52.1', '83.3', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:08', 1),
(437, 'NS0672/0001/2023', 14, 1, 7, '10', '34.4', '52.8', '87.2', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:08', 1),
(438, 'NS2367/0005/2023', 14, 1, 7, '10', '30.8', '48.5', '79.3', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:08', 1),
(439, 'NS0294/0005/2023', 14, 1, 7, '10', '30.7', '52.1', '82.8', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:08', 1),
(440, 'NS0916/0003/2023', 14, 1, 7, '10', '32.3', '48.0', '80.3', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:09', 1),
(441, 'NS1375/0002/2023', 14, 1, 7, '10', '25.7', '46.4', '72.1', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:09', 1),
(442, 'NS0547/0015/2023', 14, 1, 7, '10', '27.9', '48.5', '76.4', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:09', 1),
(443, 'NS0345/0172/2023', 14, 1, 7, '10', '26.8', '51.0', '77.8', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:09', 1),
(444, 'NS1394/0007/2023', 14, 1, 7, '10', '22.7', '50.3', '73.0', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:09', 1),
(445, 'NS4740/0008/2023', 14, 1, 7, '10', '31.2', '50.4', '81.6', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:09', 1),
(446, 'NEQ2022001913/2020', 14, 1, 7, '10', '31.3', '37.2', '68.5', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:47', '2025-04-19 22:20:10', 1),
(447, 'NS3371/0102/2023', 14, 1, 7, '10', '30.7', '50.0', '80.7', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:10', 1),
(448, 'NS3897/0088/2023', 14, 1, 7, '10', '31.7', '52.1', '83.8', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:10', 1),
(449, 'NS3757/0023/2023', 14, 1, 7, '10', '23.8', '50.4', '74.2', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:10', 1),
(450, 'NS3981/0011/2023', 14, 1, 7, '10', '32.2', '53.4', '85.6', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:10', 1),
(451, 'NS3453/0010/2023', 14, 1, 7, '10', '28.4', '43.7', '72.1', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:10', 1),
(452, 'NS5156/0084/2023', 14, 1, 7, '10', '32.9', '51.3', '84.2', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:10', 1),
(453, 'NS2510/0010/2023', 14, 1, 7, '10', '36.4', '54.8', '91.2', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:10', 1),
(454, 'NS0970/0015/2023', 14, 1, 7, '10', '32.4', '51.2', '83.6', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:11', 1),
(455, 'NS3834/0019/2018', 14, 1, 7, '10', '35.4', '53.0', '88.4', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:11', 1),
(456, 'NS0850/0022/2022', 14, 1, 7, '10', '29.1', '48.3', '77.4', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:11', 1),
(457, 'NS1027/0179/2023', 14, 1, 7, '10', '34.7', '52.4', '87.1', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:11', 1),
(458, 'NS4569/0030/2023', 14, 1, 7, '10', '35.6', '49.4', '85.0', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:11', 1),
(459, 'NS4740/0041/2023', 14, 1, 7, '10', '27.8', '46.7', '74.5', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:11', 1),
(460, 'NS1618/0012/2023', 14, 1, 7, '10', '32.1', '45.9', '78.0', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:11', 1),
(461, 'NS1060/0017/2023', 14, 1, 7, '10', '30.4', '49.5', '79.9', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:12', 1),
(462, 'NS5033/0020/2022', 14, 1, 7, '10', '36.2', '53.4', '89.6', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:48', '2025-04-19 22:20:12', 1),
(463, 'NS0722/0031/2023', 14, 1, 7, '10', '31.7', '45.0', '76.7', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:12', 1),
(464, 'NS4740/0048/2023', 14, 1, 7, '10', '31.4', '50.7', '82.1', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:12', 1),
(465, 'NS4498/0051/2020', 14, 1, 7, '10', '29.6', '42.5', '72.1', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:12', 1),
(466, 'NS0241/0039/2020', 14, 1, 7, '10', '32.5', '52.1', '84.6', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:12', 1),
(467, 'NS0414/0019/2023', 14, 1, 7, '10', '36.1', '54.9', '91.0', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:12', 1),
(468, 'NS0197/0009/2020', 14, 1, 7, '10', '26.8', '42.5', '69.3', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:12', 1),
(469, 'NS3893/0156/2023', 14, 1, 7, '10', '31.5', '48.0', '79.5', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:13', 1),
(470, 'NS0672/0057/2023', 14, 1, 7, '10', '34.2', '52.4', '86.6', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:13', 1),
(471, 'NS4816/0040/2021', 14, 1, 7, '10', '32.3', '51.6', '83.9', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:13', 1),
(472, 'NS1633/0164/2023', 14, 1, 7, '10', '29.7', '50.1', '79.8', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:13', 1),
(473, 'NS4208/0008/2022', 14, 1, 7, '10', '27.4', '49.7', '77.1', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:13', 1),
(474, 'NS3897/0105/2023', 14, 1, 7, '10', '34.0', '54.5', '88.5', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:13', 1),
(475, 'NS0526/0115/2021', 14, 1, 7, '10', '34.7', '58.7', '93.4', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:49', '2025-04-19 22:20:13', 1),
(476, 'NS0274/0046/2023', 14, 1, 7, '10', '35.1', '59.0', '94.1', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:50', '2025-04-19 22:20:14', 1),
(477, 'NS6048/0056/2023', 14, 1, 7, '10', '33.7', '51.3', '85.0', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:50', '2025-04-19 22:20:14', 1),
(478, 'NS4006/0030/2021', 14, 1, 7, '10', '37.3', '53.1', '90.4', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:50', '2025-04-19 22:20:14', 1),
(479, 'NS2505/0044/2017', 14, 1, 7, '10', '23.4', '49.1', '72.5', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:50', '2025-04-19 22:20:14', 1),
(480, 'NS4238/0026/2021', 14, 1, 7, '10', '32.0', '49.1', '81.1', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:50', '2025-04-19 22:20:14', 1),
(481, 'NS3351/0179/2023', 14, 1, 7, '10', '32.5', '53.7', '86.2', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:50', '2025-04-19 22:20:14', 1),
(482, 'NS4117/0256/2022', 14, 1, 7, '10', '26.2', '48.8', '75.0', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:50', '2025-04-19 22:20:14', 1),
(483, 'NS3321/0044/2021', 14, 1, 7, '10', '33.6', '51.9', '85.5', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:50', '2025-04-19 22:20:15', 1),
(484, 'NS5551/0011/2021', 14, 1, 7, '10', '34.0', '53.3', '87.3', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:50', '2025-04-19 22:20:15', 1),
(485, 'NS0345/0088/2023', 14, 1, 7, '10', '37.2', '56.3', '93.5', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:50', '2025-04-19 22:20:15', 1),
(486, 'NS4710/0030/2023', 14, 1, 7, '10', '25.2', '41.3', '66.5', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:51', '2025-04-19 22:20:15', 1),
(487, 'NS5822/0117/2023', 14, 1, 7, '10', '34.1', '55.2', '89.3', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:51', '2025-04-19 22:20:15', 1),
(488, 'NS1097/0129/2021', 14, 1, 7, '10', '33.1', '53.4', '86.5', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:51', '2025-04-19 22:20:15', 1),
(489, 'NS1633/0136/2021', 14, 1, 7, '10', '35.0', '52.5', '87.5', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:51', '2025-04-19 22:20:15', 1),
(490, 'NS0672/0094/2021', 14, 1, 7, '10', '33.9', '52.5', '86.4', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:51', '2025-04-19 22:20:16', 1),
(491, 'NS2521/0024/2021', 14, 1, 7, '10', '34.3', '54.0', '88.3', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:51', '2025-04-19 22:20:16', 1),
(492, 'NS1581/0075/2023', 14, 1, 7, '10', '32.6', '50.6', '83.2', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:51', '2025-04-19 22:20:16', 1),
(493, 'NS2315/0115/2021', 14, 1, 7, '10', '33.1', '46.2', '79.3', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:51', '2025-04-19 22:20:16', 1),
(494, 'NS2171/0052/2023', 14, 1, 7, '10', '35.3', '54.8', '90.1', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:52', '2025-04-19 22:20:16', 1),
(495, 'NS2424/0074/2023', 14, 1, 7, '10', '21.3', '43.4', '64.7', 'C', '20', '2.0', 'PASS', '2025-04-19 22:17:52', '2025-04-19 22:20:16', 1),
(496, 'NS0632/0053/2023', 14, 1, 7, '10', '24.1', '41.3', '65.4', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:52', '2025-04-19 22:20:16', 1),
(497, 'NS0672/0135/2023', 14, 1, 7, '10', '22.9', '44.0', '66.9', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:52', '2025-04-19 22:20:16', 1),
(498, 'NS5376/0082/2023', 14, 1, 7, '10', '34.1', '47.4', '81.5', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:52', '2025-04-19 22:20:17', 1),
(499, 'NS3228/0285/2022', 14, 1, 7, '10', '31.8', '38.0', '69.8', 'B', '30', '3.0', 'PASS', '2025-04-19 22:17:52', '2025-04-19 22:20:17', 1),
(500, 'NS0541/0100/2023', 14, 1, 7, '10', '30.3', '56.3', '86.6', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:52', '2025-04-19 22:20:17', 1),
(501, 'NS3534/0025/2023', 14, 1, 7, '10', '32.3', '56.3', '88.6', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:52', '2025-04-19 22:20:17', 1),
(502, 'NS5251/0066/2023', 14, 1, 7, '10', '28.6', '54.5', '83.1', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:53', '2025-04-19 22:20:17', 1),
(503, 'NS5298/0057/2023', 14, 1, 7, '10', '31.0', '54.6', '85.6', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:53', '2025-04-19 22:20:17', 1),
(504, 'NS4897/0091/2023', 14, 1, 7, '10', '32.5', '50.6', '83.1', 'A', '40', '4.0', 'PASS', '2025-04-19 22:17:53', '2025-04-19 22:20:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_result_summaries`
--

CREATE TABLE `course_result_summaries` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `semester_id` bigint UNSIGNED NOT NULL,
  `total_male_pass` int UNSIGNED NOT NULL,
  `total_male_fail` int UNSIGNED NOT NULL,
  `total_female_pass` int UNSIGNED NOT NULL,
  `total_female_fail` int UNSIGNED NOT NULL,
  `total_pass` int UNSIGNED NOT NULL,
  `total_fail` int UNSIGNED NOT NULL,
  `grand_total` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_A_male` int NOT NULL DEFAULT '0',
  `total_A_female` int NOT NULL DEFAULT '0',
  `total_A` int NOT NULL DEFAULT '0',
  `total_B_plus_male` int NOT NULL DEFAULT '0',
  `total_B_plus_female` int NOT NULL DEFAULT '0',
  `total_B_plus` int NOT NULL DEFAULT '0',
  `total_B_male` int NOT NULL DEFAULT '0',
  `total_B_female` int NOT NULL DEFAULT '0',
  `total_B` int NOT NULL DEFAULT '0',
  `total_C_male` int NOT NULL DEFAULT '0',
  `total_C_female` int NOT NULL DEFAULT '0',
  `total_C` int NOT NULL DEFAULT '0',
  `total_D_male` int NOT NULL DEFAULT '0',
  `total_D_female` int NOT NULL DEFAULT '0',
  `total_D` int NOT NULL DEFAULT '0',
  `total_F_male` int NOT NULL DEFAULT '0',
  `total_F_female` int NOT NULL DEFAULT '0',
  `total_F` int NOT NULL DEFAULT '0',
  `total_ABSC_female` int NOT NULL DEFAULT '0',
  `total_ABSC_male` int NOT NULL DEFAULT '0',
  `total_ABSC` int NOT NULL DEFAULT '0',
  `totalstudentcourse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalgradeApercent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalgradeBpluspercent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalgradeBpercent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalgradeCpercent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalgradeDpercent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalgradeFpercent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalgradeABSCpercent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalstudentcoursefemale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalstudentcoursemale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_result_summaries`
--

INSERT INTO `course_result_summaries` (`id`, `course_id`, `year_id`, `semester_id`, `total_male_pass`, `total_male_fail`, `total_female_pass`, `total_female_fail`, `total_pass`, `total_fail`, `grand_total`, `created_at`, `updated_at`, `total_A_male`, `total_A_female`, `total_A`, `total_B_plus_male`, `total_B_plus_female`, `total_B_plus`, `total_B_male`, `total_B_female`, `total_B`, `total_C_male`, `total_C_female`, `total_C`, `total_D_male`, `total_D_female`, `total_D`, `total_F_male`, `total_F_female`, `total_F`, `total_ABSC_female`, `total_ABSC_male`, `total_ABSC`, `totalstudentcourse`, `totalgradeApercent`, `totalgradeBpluspercent`, `totalgradeBpercent`, `totalgradeCpercent`, `totalgradeDpercent`, `totalgradeFpercent`, `totalgradeABSCpercent`, `totalstudentcoursefemale`, `totalstudentcoursemale`) VALUES
(1, 1, 14, 1, 35, 0, 37, 0, 72, 0, 72, '2025-04-13 19:15:36', '2025-04-19 19:33:49', 1, 0, 1, 0, 0, 0, 17, 22, 39, 17, 15, 32, 0, 0, 0, 0, 0, 0, 1, 0, 1, '73', '1.3698630136986', '0', '53.424657534247', '43.835616438356', '0', '0', '1.3698630136986', '38', '35'),
(2, 2, 14, 1, 35, 0, 37, 0, 72, 0, 72, '2025-04-13 23:14:11', '2025-04-19 19:59:07', 19, 27, 46, 0, 0, 0, 16, 10, 26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, '73', '63.013698630137', '0', '35.616438356164', '0', '0', '0', '1.3698630136986', '38', '35'),
(3, 3, 14, 1, 35, 0, 37, 0, 72, 0, 72, '2025-04-19 20:13:41', '2025-04-19 20:14:50', 5, 3, 8, 0, 0, 0, 19, 23, 42, 11, 11, 22, 0, 0, 0, 0, 0, 0, 1, 0, 1, '73', '10.958904109589', '0', '57.534246575342', '30.13698630137', '0', '0', '1.3698630136986', '38', '35'),
(4, 4, 14, 1, 35, 0, 37, 0, 72, 0, 72, '2025-04-19 21:09:28', '2025-04-19 21:11:01', 30, 36, 66, 0, 0, 0, 5, 1, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, '73', '90.41095890411', '0', '8.2191780821918', '0', '0', '0', '1.3698630136986', '38', '35'),
(5, 5, 14, 1, 35, 0, 37, 0, 72, 0, 72, '2025-04-19 21:23:21', '2025-04-19 21:26:30', 20, 23, 43, 0, 0, 0, 14, 13, 27, 1, 1, 2, 0, 0, 0, 0, 0, 0, 1, 0, 1, '73', '58.904109589041', '0', '36.986301369863', '2.7397260273973', '0', '0', '1.3698630136986', '38', '35'),
(6, 6, 14, 1, 35, 0, 37, 0, 72, 0, 72, '2025-04-19 22:07:58', '2025-04-19 22:09:05', 21, 29, 50, 0, 0, 0, 14, 8, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, '73', '68.493150684932', '0', '30.13698630137', '0', '0', '0', '1.3698630136986', '38', '35'),
(7, 7, 14, 1, 35, 0, 37, 0, 72, 0, 72, '2025-04-19 22:17:47', '2025-04-19 22:20:17', 21, 25, 46, 0, 0, 0, 13, 12, 25, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, '73', '63.013698630137', '0', '34.246575342466', '1.3698630136986', '0', '0', '1.3698630136986', '38', '35');

-- --------------------------------------------------------

--
-- Table structure for table `course_staff`
--

CREATE TABLE `course_staff` (
  `id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `staff_id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `assigned_by` bigint UNSIGNED NOT NULL,
  `stream` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_staff`
--

INSERT INTO `course_staff` (`id`, `course_id`, `staff_id`, `year_id`, `assigned_by`, `stream`, `created_at`, `updated_at`) VALUES
(22, 1, 76, 14, 1, 'A', '2025-04-13 05:59:21', '2025-04-13 07:33:00'),
(23, 2, 76, 14, 1, 'A', '2025-04-13 06:40:45', '2025-04-13 07:33:27'),
(24, 3, 76, 14, 1, 'A', '2025-04-13 06:43:19', '2025-04-13 07:33:42'),
(25, 4, 76, 14, 1, 'A', '2025-04-13 06:43:39', '2025-04-13 07:33:54'),
(26, 5, 76, 14, 1, 'A', '2025-04-13 06:44:19', '2025-04-13 07:34:07'),
(30, 6, 76, 14, 1, 'A', '2025-04-13 08:02:37', '2025-04-13 08:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `carry_over` tinyint NOT NULL DEFAULT '0',
  `display` tinyint NOT NULL DEFAULT '1',
  `change_access` tinyint NOT NULL DEFAULT '0',
  `cs_status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Progress',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`id`, `student_id`, `course_id`, `reg_no`, `semester`, `year_id`, `carry_over`, `display`, `change_access`, `cs_status`, `created_at`, `updated_at`) VALUES
(3377, 1, 1, 'NS0772/0099/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3378, 2, 1, 'NS5289/0024/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3379, 3, 1, 'NP1153/0013/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3380, 4, 1, 'NS5357/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3381, 5, 1, 'NS0672/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3382, 6, 1, 'NS2367/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3383, 7, 1, 'NS0294/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3384, 8, 1, 'NS0916/0003/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3385, 9, 1, 'NS1375/0002/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3386, 10, 1, 'NS0547/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3387, 11, 1, 'NS0345/0172/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3388, 12, 1, 'NS1394/0007/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3389, 13, 1, 'NS4740/0008/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3390, 14, 1, 'NEQ2022001913/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3391, 15, 1, 'NS3371/0102/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3392, 16, 1, 'NS3897/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3393, 17, 1, 'NS3757/0023/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3394, 18, 1, 'NS3981/0011/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3395, 19, 1, 'NS3453/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3396, 20, 1, 'NS5156/0084/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3397, 21, 1, 'NS2510/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3398, 22, 1, 'NS0970/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3399, 23, 1, 'NS3834/0019/2018', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3400, 24, 1, 'NS0850/0022/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3401, 25, 1, 'NS0418/0004/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3402, 26, 1, 'NS1027/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3403, 27, 1, 'NS4569/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3404, 28, 1, 'NS4740/0041/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3405, 29, 1, 'NS1618/0012/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3406, 30, 1, 'NS1060/0017/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3407, 31, 1, 'NS5033/0020/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3408, 32, 1, 'NS0722/0031/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3409, 33, 1, 'NS4740/0048/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3410, 34, 1, 'NS4498/0051/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3411, 35, 1, 'NS0241/0039/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3412, 36, 1, 'NS0414/0019/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3413, 37, 1, 'NS0197/0009/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3414, 38, 1, 'NS3893/0156/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3415, 39, 1, 'NS0672/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3416, 40, 1, 'NS4816/0040/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3417, 41, 1, 'NS1633/0164/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3418, 42, 1, 'NS4208/0008/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3419, 43, 1, 'NS3897/0105/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3420, 44, 1, 'NS0526/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:46', '2025-04-13 05:26:46'),
(3421, 45, 1, 'NS0274/0046/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3422, 46, 1, 'NS6048/0056/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3423, 47, 1, 'NS4006/0030/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3424, 48, 1, 'NS2505/0044/2017', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3425, 49, 1, 'NS4238/0026/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3426, 50, 1, 'NS3351/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3427, 51, 1, 'NS4117/0256/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3428, 52, 1, 'NS3321/0044/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3429, 53, 1, 'NS5551/0011/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3430, 54, 1, 'NS0345/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3431, 55, 1, 'NS4710/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3432, 56, 1, 'NS5822/0117/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3433, 57, 1, 'NS1097/0129/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3434, 58, 1, 'NS1633/0136/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3435, 59, 1, 'NS0672/0094/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3436, 60, 1, 'NS2521/0024/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3437, 61, 1, 'NS1581/0075/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3438, 62, 1, 'NS2315/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3439, 63, 1, 'NS2171/0052/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3440, 64, 1, 'NS2424/0074/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3441, 65, 1, 'NS0632/0053/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3442, 66, 1, 'NS0672/0135/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3443, 67, 1, 'NS5376/0082/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3444, 68, 1, 'NS3228/0285/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3445, 69, 1, 'NS0541/0100/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3446, 70, 1, 'NS3534/0025/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3447, 71, 1, 'NS5251/0066/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3448, 72, 1, 'NS5298/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3449, 73, 1, 'NS4897/0091/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3450, 1, 2, 'NS0772/0099/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3451, 2, 2, 'NS5289/0024/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3452, 3, 2, 'NP1153/0013/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3453, 4, 2, 'NS5357/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3454, 5, 2, 'NS0672/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3455, 6, 2, 'NS2367/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3456, 7, 2, 'NS0294/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3457, 8, 2, 'NS0916/0003/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3458, 9, 2, 'NS1375/0002/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3459, 10, 2, 'NS0547/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3460, 11, 2, 'NS0345/0172/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3461, 12, 2, 'NS1394/0007/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3462, 13, 2, 'NS4740/0008/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3463, 14, 2, 'NEQ2022001913/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3464, 15, 2, 'NS3371/0102/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3465, 16, 2, 'NS3897/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3466, 17, 2, 'NS3757/0023/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3467, 18, 2, 'NS3981/0011/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3468, 19, 2, 'NS3453/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3469, 20, 2, 'NS5156/0084/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3470, 21, 2, 'NS2510/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3471, 22, 2, 'NS0970/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3472, 23, 2, 'NS3834/0019/2018', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3473, 24, 2, 'NS0850/0022/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3474, 25, 2, 'NS0418/0004/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3475, 26, 2, 'NS1027/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3476, 27, 2, 'NS4569/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3477, 28, 2, 'NS4740/0041/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3478, 29, 2, 'NS1618/0012/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3479, 30, 2, 'NS1060/0017/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3480, 31, 2, 'NS5033/0020/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3481, 32, 2, 'NS0722/0031/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3482, 33, 2, 'NS4740/0048/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3483, 34, 2, 'NS4498/0051/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3484, 35, 2, 'NS0241/0039/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3485, 36, 2, 'NS0414/0019/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3486, 37, 2, 'NS0197/0009/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3487, 38, 2, 'NS3893/0156/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3488, 39, 2, 'NS0672/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3489, 40, 2, 'NS4816/0040/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3490, 41, 2, 'NS1633/0164/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3491, 42, 2, 'NS4208/0008/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3492, 43, 2, 'NS3897/0105/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3493, 44, 2, 'NS0526/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3494, 45, 2, 'NS0274/0046/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3495, 46, 2, 'NS6048/0056/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3496, 47, 2, 'NS4006/0030/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3497, 48, 2, 'NS2505/0044/2017', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3498, 49, 2, 'NS4238/0026/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3499, 50, 2, 'NS3351/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3500, 51, 2, 'NS4117/0256/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3501, 52, 2, 'NS3321/0044/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3502, 53, 2, 'NS5551/0011/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3503, 54, 2, 'NS0345/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3504, 55, 2, 'NS4710/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3505, 56, 2, 'NS5822/0117/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3506, 57, 2, 'NS1097/0129/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3507, 58, 2, 'NS1633/0136/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3508, 59, 2, 'NS0672/0094/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3509, 60, 2, 'NS2521/0024/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3510, 61, 2, 'NS1581/0075/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3511, 62, 2, 'NS2315/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3512, 63, 2, 'NS2171/0052/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3513, 64, 2, 'NS2424/0074/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3514, 65, 2, 'NS0632/0053/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3515, 66, 2, 'NS0672/0135/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3516, 67, 2, 'NS5376/0082/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3517, 68, 2, 'NS3228/0285/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3518, 69, 2, 'NS0541/0100/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3519, 70, 2, 'NS3534/0025/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:47', '2025-04-13 05:26:47'),
(3520, 71, 2, 'NS5251/0066/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3521, 72, 2, 'NS5298/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3522, 73, 2, 'NS4897/0091/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3523, 1, 3, 'NS0772/0099/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3524, 2, 3, 'NS5289/0024/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3525, 3, 3, 'NP1153/0013/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3526, 4, 3, 'NS5357/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3527, 5, 3, 'NS0672/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3528, 6, 3, 'NS2367/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3529, 7, 3, 'NS0294/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3530, 8, 3, 'NS0916/0003/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3531, 9, 3, 'NS1375/0002/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3532, 10, 3, 'NS0547/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3533, 11, 3, 'NS0345/0172/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3534, 12, 3, 'NS1394/0007/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3535, 13, 3, 'NS4740/0008/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3536, 14, 3, 'NEQ2022001913/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3537, 15, 3, 'NS3371/0102/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3538, 16, 3, 'NS3897/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3539, 17, 3, 'NS3757/0023/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3540, 18, 3, 'NS3981/0011/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3541, 19, 3, 'NS3453/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3542, 20, 3, 'NS5156/0084/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3543, 21, 3, 'NS2510/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3544, 22, 3, 'NS0970/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3545, 23, 3, 'NS3834/0019/2018', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3546, 24, 3, 'NS0850/0022/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3547, 25, 3, 'NS0418/0004/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3548, 26, 3, 'NS1027/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3549, 27, 3, 'NS4569/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3550, 28, 3, 'NS4740/0041/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3551, 29, 3, 'NS1618/0012/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3552, 30, 3, 'NS1060/0017/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3553, 31, 3, 'NS5033/0020/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3554, 32, 3, 'NS0722/0031/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3555, 33, 3, 'NS4740/0048/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3556, 34, 3, 'NS4498/0051/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3557, 35, 3, 'NS0241/0039/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3558, 36, 3, 'NS0414/0019/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3559, 37, 3, 'NS0197/0009/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3560, 38, 3, 'NS3893/0156/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3561, 39, 3, 'NS0672/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3562, 40, 3, 'NS4816/0040/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3563, 41, 3, 'NS1633/0164/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3564, 42, 3, 'NS4208/0008/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3565, 43, 3, 'NS3897/0105/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3566, 44, 3, 'NS0526/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3567, 45, 3, 'NS0274/0046/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3568, 46, 3, 'NS6048/0056/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3569, 47, 3, 'NS4006/0030/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3570, 48, 3, 'NS2505/0044/2017', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3571, 49, 3, 'NS4238/0026/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3572, 50, 3, 'NS3351/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3573, 51, 3, 'NS4117/0256/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3574, 52, 3, 'NS3321/0044/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3575, 53, 3, 'NS5551/0011/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3576, 54, 3, 'NS0345/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3577, 55, 3, 'NS4710/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3578, 56, 3, 'NS5822/0117/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3579, 57, 3, 'NS1097/0129/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3580, 58, 3, 'NS1633/0136/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3581, 59, 3, 'NS0672/0094/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3582, 60, 3, 'NS2521/0024/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3583, 61, 3, 'NS1581/0075/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3584, 62, 3, 'NS2315/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3585, 63, 3, 'NS2171/0052/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3586, 64, 3, 'NS2424/0074/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3587, 65, 3, 'NS0632/0053/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3588, 66, 3, 'NS0672/0135/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3589, 67, 3, 'NS5376/0082/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3590, 68, 3, 'NS3228/0285/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3591, 69, 3, 'NS0541/0100/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3592, 70, 3, 'NS3534/0025/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3593, 71, 3, 'NS5251/0066/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3594, 72, 3, 'NS5298/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3595, 73, 3, 'NS4897/0091/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3596, 1, 4, 'NS0772/0099/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3597, 2, 4, 'NS5289/0024/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3598, 3, 4, 'NP1153/0013/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3599, 4, 4, 'NS5357/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3600, 5, 4, 'NS0672/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3601, 6, 4, 'NS2367/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3602, 7, 4, 'NS0294/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3603, 8, 4, 'NS0916/0003/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3604, 9, 4, 'NS1375/0002/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3605, 10, 4, 'NS0547/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3606, 11, 4, 'NS0345/0172/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3607, 12, 4, 'NS1394/0007/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3608, 13, 4, 'NS4740/0008/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3609, 14, 4, 'NEQ2022001913/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3610, 15, 4, 'NS3371/0102/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3611, 16, 4, 'NS3897/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3612, 17, 4, 'NS3757/0023/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3613, 18, 4, 'NS3981/0011/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3614, 19, 4, 'NS3453/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3615, 20, 4, 'NS5156/0084/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3616, 21, 4, 'NS2510/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3617, 22, 4, 'NS0970/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3618, 23, 4, 'NS3834/0019/2018', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:48', '2025-04-13 05:26:48'),
(3619, 24, 4, 'NS0850/0022/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3620, 25, 4, 'NS0418/0004/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3621, 26, 4, 'NS1027/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3622, 27, 4, 'NS4569/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3623, 28, 4, 'NS4740/0041/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3624, 29, 4, 'NS1618/0012/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3625, 30, 4, 'NS1060/0017/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3626, 31, 4, 'NS5033/0020/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3627, 32, 4, 'NS0722/0031/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3628, 33, 4, 'NS4740/0048/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3629, 34, 4, 'NS4498/0051/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3630, 35, 4, 'NS0241/0039/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3631, 36, 4, 'NS0414/0019/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3632, 37, 4, 'NS0197/0009/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3633, 38, 4, 'NS3893/0156/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3634, 39, 4, 'NS0672/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3635, 40, 4, 'NS4816/0040/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3636, 41, 4, 'NS1633/0164/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3637, 42, 4, 'NS4208/0008/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3638, 43, 4, 'NS3897/0105/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3639, 44, 4, 'NS0526/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3640, 45, 4, 'NS0274/0046/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3641, 46, 4, 'NS6048/0056/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3642, 47, 4, 'NS4006/0030/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3643, 48, 4, 'NS2505/0044/2017', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3644, 49, 4, 'NS4238/0026/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3645, 50, 4, 'NS3351/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3646, 51, 4, 'NS4117/0256/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3647, 52, 4, 'NS3321/0044/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3648, 53, 4, 'NS5551/0011/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3649, 54, 4, 'NS0345/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3650, 55, 4, 'NS4710/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3651, 56, 4, 'NS5822/0117/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3652, 57, 4, 'NS1097/0129/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3653, 58, 4, 'NS1633/0136/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3654, 59, 4, 'NS0672/0094/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3655, 60, 4, 'NS2521/0024/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3656, 61, 4, 'NS1581/0075/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3657, 62, 4, 'NS2315/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3658, 63, 4, 'NS2171/0052/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3659, 64, 4, 'NS2424/0074/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3660, 65, 4, 'NS0632/0053/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3661, 66, 4, 'NS0672/0135/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3662, 67, 4, 'NS5376/0082/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3663, 68, 4, 'NS3228/0285/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3664, 69, 4, 'NS0541/0100/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3665, 70, 4, 'NS3534/0025/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3666, 71, 4, 'NS5251/0066/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3667, 72, 4, 'NS5298/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3668, 73, 4, 'NS4897/0091/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3669, 1, 5, 'NS0772/0099/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3670, 2, 5, 'NS5289/0024/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3671, 3, 5, 'NP1153/0013/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3672, 4, 5, 'NS5357/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3673, 5, 5, 'NS0672/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3674, 6, 5, 'NS2367/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3675, 7, 5, 'NS0294/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3676, 8, 5, 'NS0916/0003/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3677, 9, 5, 'NS1375/0002/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3678, 10, 5, 'NS0547/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3679, 11, 5, 'NS0345/0172/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3680, 12, 5, 'NS1394/0007/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3681, 13, 5, 'NS4740/0008/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3682, 14, 5, 'NEQ2022001913/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3683, 15, 5, 'NS3371/0102/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3684, 16, 5, 'NS3897/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3685, 17, 5, 'NS3757/0023/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3686, 18, 5, 'NS3981/0011/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3687, 19, 5, 'NS3453/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3688, 20, 5, 'NS5156/0084/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3689, 21, 5, 'NS2510/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3690, 22, 5, 'NS0970/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3691, 23, 5, 'NS3834/0019/2018', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3692, 24, 5, 'NS0850/0022/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3693, 25, 5, 'NS0418/0004/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3694, 26, 5, 'NS1027/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3695, 27, 5, 'NS4569/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3696, 28, 5, 'NS4740/0041/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3697, 29, 5, 'NS1618/0012/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3698, 30, 5, 'NS1060/0017/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3699, 31, 5, 'NS5033/0020/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3700, 32, 5, 'NS0722/0031/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3701, 33, 5, 'NS4740/0048/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3702, 34, 5, 'NS4498/0051/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3703, 35, 5, 'NS0241/0039/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3704, 36, 5, 'NS0414/0019/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3705, 37, 5, 'NS0197/0009/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3706, 38, 5, 'NS3893/0156/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3707, 39, 5, 'NS0672/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3708, 40, 5, 'NS4816/0040/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3709, 41, 5, 'NS1633/0164/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3710, 42, 5, 'NS4208/0008/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3711, 43, 5, 'NS3897/0105/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3712, 44, 5, 'NS0526/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3713, 45, 5, 'NS0274/0046/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3714, 46, 5, 'NS6048/0056/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3715, 47, 5, 'NS4006/0030/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3716, 48, 5, 'NS2505/0044/2017', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:49', '2025-04-13 05:26:49'),
(3717, 49, 5, 'NS4238/0026/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3718, 50, 5, 'NS3351/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3719, 51, 5, 'NS4117/0256/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3720, 52, 5, 'NS3321/0044/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3721, 53, 5, 'NS5551/0011/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3722, 54, 5, 'NS0345/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3723, 55, 5, 'NS4710/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3724, 56, 5, 'NS5822/0117/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3725, 57, 5, 'NS1097/0129/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3726, 58, 5, 'NS1633/0136/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3727, 59, 5, 'NS0672/0094/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3728, 60, 5, 'NS2521/0024/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3729, 61, 5, 'NS1581/0075/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3730, 62, 5, 'NS2315/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3731, 63, 5, 'NS2171/0052/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3732, 64, 5, 'NS2424/0074/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3733, 65, 5, 'NS0632/0053/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3734, 66, 5, 'NS0672/0135/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3735, 67, 5, 'NS5376/0082/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3736, 68, 5, 'NS3228/0285/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3737, 69, 5, 'NS0541/0100/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3738, 70, 5, 'NS3534/0025/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3739, 71, 5, 'NS5251/0066/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3740, 72, 5, 'NS5298/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3741, 73, 5, 'NS4897/0091/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3742, 1, 6, 'NS0772/0099/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3743, 2, 6, 'NS5289/0024/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3744, 3, 6, 'NP1153/0013/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3745, 4, 6, 'NS5357/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3746, 5, 6, 'NS0672/0001/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3747, 6, 6, 'NS2367/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3748, 7, 6, 'NS0294/0005/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3749, 8, 6, 'NS0916/0003/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3750, 9, 6, 'NS1375/0002/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3751, 10, 6, 'NS0547/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3752, 11, 6, 'NS0345/0172/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3753, 12, 6, 'NS1394/0007/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3754, 13, 6, 'NS4740/0008/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3755, 14, 6, 'NEQ2022001913/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3756, 15, 6, 'NS3371/0102/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3757, 16, 6, 'NS3897/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3758, 17, 6, 'NS3757/0023/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3759, 18, 6, 'NS3981/0011/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3760, 19, 6, 'NS3453/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3761, 20, 6, 'NS5156/0084/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3762, 21, 6, 'NS2510/0010/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3763, 22, 6, 'NS0970/0015/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3764, 23, 6, 'NS3834/0019/2018', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3765, 24, 6, 'NS0850/0022/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3766, 25, 6, 'NS0418/0004/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3767, 26, 6, 'NS1027/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3768, 27, 6, 'NS4569/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3769, 28, 6, 'NS4740/0041/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3770, 29, 6, 'NS1618/0012/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3771, 30, 6, 'NS1060/0017/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3772, 31, 6, 'NS5033/0020/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3773, 32, 6, 'NS0722/0031/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3774, 33, 6, 'NS4740/0048/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3775, 34, 6, 'NS4498/0051/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3776, 35, 6, 'NS0241/0039/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3777, 36, 6, 'NS0414/0019/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3778, 37, 6, 'NS0197/0009/2020', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3779, 38, 6, 'NS3893/0156/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3780, 39, 6, 'NS0672/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3781, 40, 6, 'NS4816/0040/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3782, 41, 6, 'NS1633/0164/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3783, 42, 6, 'NS4208/0008/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3784, 43, 6, 'NS3897/0105/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3785, 44, 6, 'NS0526/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3786, 45, 6, 'NS0274/0046/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3787, 46, 6, 'NS6048/0056/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3788, 47, 6, 'NS4006/0030/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3789, 48, 6, 'NS2505/0044/2017', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3790, 49, 6, 'NS4238/0026/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3791, 50, 6, 'NS3351/0179/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3792, 51, 6, 'NS4117/0256/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3793, 52, 6, 'NS3321/0044/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3794, 53, 6, 'NS5551/0011/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3795, 54, 6, 'NS0345/0088/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3796, 55, 6, 'NS4710/0030/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3797, 56, 6, 'NS5822/0117/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3798, 57, 6, 'NS1097/0129/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3799, 58, 6, 'NS1633/0136/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3800, 59, 6, 'NS0672/0094/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3801, 60, 6, 'NS2521/0024/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3802, 61, 6, 'NS1581/0075/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3803, 62, 6, 'NS2315/0115/2021', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3804, 63, 6, 'NS2171/0052/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3805, 64, 6, 'NS2424/0074/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3806, 65, 6, 'NS0632/0053/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3807, 66, 6, 'NS0672/0135/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3808, 67, 6, 'NS5376/0082/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3809, 68, 6, 'NS3228/0285/2022', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3810, 69, 6, 'NS0541/0100/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3811, 70, 6, 'NS3534/0025/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3812, 71, 6, 'NS5251/0066/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3813, 72, 6, 'NS5298/0057/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50'),
(3814, 73, 6, 'NS4897/0091/2023', 1, 14, 0, 1, 0, 'In Progress', '2025-04-13 05:26:50', '2025-04-13 05:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `debtors`
--

CREATE TABLE `debtors` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(100,2) NOT NULL,
  `side` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `std_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prog_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prog_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nta_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intake` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `std_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `department_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faculty_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `faculty_id`, `created_at`, `updated_at`) VALUES
(1, 'Department of Clinical Medicine', NULL, '2025-04-15 08:29:39', '2025-04-15 08:29:39'),
(2, 'Department of Nursing and Midwifery', NULL, '2025-04-15 08:30:08', '2025-04-15 08:30:08'),
(3, 'Department of Pharmaceutical Sciences', NULL, '2025-04-15 08:33:50', '2025-04-15 08:33:50'),
(4, 'Department of Medical Laboratory Sciences', NULL, '2025-04-15 08:35:00', '2025-04-15 08:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `dependants`
--

CREATE TABLE `dependants` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_histories`
--

CREATE TABLE `education_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `index_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `election_candidates`
--

CREATE TABLE `election_candidates` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int NOT NULL,
  `campus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `election_candidates`
--

INSERT INTO `election_candidates` (`id`, `name`, `post_id`, `campus`, `period`, `created_at`, `updated_at`) VALUES
(4, 'ABDUL,K TUMBO', 1, 'KANGE MAIN CAMPUS', '2024/2025', '2025-04-16 04:50:52', '2025-04-16 04:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `election_posts`
--

CREATE TABLE `election_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `post` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enddate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `election_posts`
--

INSERT INTO `election_posts` (`id`, `post`, `period`, `startdate`, `enddate`, `created_at`, `updated_at`) VALUES
(1, 'PRESIDENT', '2024/2025', '2025-04-17', '2025-04-17', '2025-04-16 04:50:36', '2025-04-16 04:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `election_votes`
--

CREATE TABLE `election_votes` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_categories`
--

CREATE TABLE `exam_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'AS=>Assignment, GA=>Group Assignment,Q0->Quiz 1,T1=Test 1',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'CA=>Continuous Assessment, SE=>Semester Exam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_categories`
--

INSERT INTO `exam_categories` (`id`, `code`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'WKT', 'Weekly Test', 'CA', '2025-04-10 01:04:50', '2025-07-07 12:12:08'),
(2, 'MT', 'Monthly Test', 'CA', '2025-04-10 01:05:23', '2025-07-07 12:12:35'),
(3, 'March-MDTT', 'March MidTerm Test', 'CA', '2025-04-10 01:03:43', '2025-07-07 12:17:37'),
(4, 'Sep-MDTT', 'September MidTerm Test', 'CA', '2025-04-10 01:04:11', '2025-07-07 12:18:29'),
(5, 'TE', 'Terminal Exam', 'ESE', '2025-04-13 10:51:37', '2025-07-07 12:18:50'),
(10, 'AE', 'Annual Exam', 'ESE', '2025-07-07 12:19:05', '2025-07-07 12:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `exam_category_results`
--

CREATE TABLE `exam_category_results` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_study` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `semester_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `exam_category_id` bigint UNSIGNED NOT NULL,
  `exam_score` decimal(6,2) NOT NULL DEFAULT '0.00',
  `uploadedby` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_category_results`
--

INSERT INTO `exam_category_results` (`id`, `reg_no`, `year_of_study`, `year_id`, `semester_id`, `course_id`, `exam_category_id`, `exam_score`, `uploadedby`, `created_at`, `updated_at`) VALUES
(1, 'NS0772/0099/2020', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-13 19:00:46', '2025-04-19 19:00:38'),
(2, 'NS0772/0099/2020', '1', 14, 1, 1, 2, '80.00', 'superadmin', '2025-04-13 19:01:48', '2025-04-19 19:02:46'),
(3, 'NS0772/0099/2020', '1', 14, 1, 1, 3, '60.00', 'superadmin', '2025-04-13 19:03:27', '2025-04-19 19:05:55'),
(4, 'NS0772/0099/2020', '1', 14, 1, 1, 4, '69.50', 'superadmin', '2025-04-13 19:08:08', '2025-04-19 19:06:27'),
(5, 'NS0772/0099/2020', '1', 14, 1, 1, 5, '76.00', 'superadmin', '2025-04-13 19:39:43', '2025-04-19 19:33:43'),
(6, 'NS0772/0099/2020', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-13 23:12:22', '2025-04-19 19:52:09'),
(7, 'NS0772/0099/2020', '1', 14, 1, 2, 2, '66.00', 'superadmin', '2025-04-13 23:13:02', '2025-04-19 19:53:08'),
(8, 'NS0772/0099/2020', '1', 14, 1, 2, 3, '81.50', 'superadmin', '2025-04-13 23:13:41', '2025-04-19 19:53:43'),
(9, 'NS0772/0099/2020', '1', 14, 1, 2, 4, '81.50', 'superadmin', '2025-04-13 23:14:11', '2025-04-19 19:54:16'),
(10, 'NS0772/0099/2020', '1', 14, 1, 2, 6, '77.00', 'superadmin', '2025-04-13 23:19:19', '2025-04-19 19:55:44'),
(19, 'NS0772/0099/2020', '1', 14, 1, 2, 5, '94.00', 'superadmin', '2025-04-13 23:37:35', '2025-04-19 19:58:08'),
(20, 'NS0772/0099/2020', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-13 23:38:11', '2025-04-19 19:58:57'),
(21, 'NS5289/0024/2023', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(22, 'NP1153/0013/2023', '1', 14, 1, 1, 1, '50.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(23, 'NS5357/0001/2023', '1', 14, 1, 1, 1, '65.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(24, 'NS0672/0001/2023', '1', 14, 1, 1, 1, '65.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(25, 'NS2367/0005/2023', '1', 14, 1, 1, 1, '60.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(26, 'NS0294/0005/2023', '1', 14, 1, 1, 1, '95.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(27, 'NS0916/0003/2023', '1', 14, 1, 1, 1, '90.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(28, 'NS1375/0002/2023', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(29, 'NS0547/0015/2023', '1', 14, 1, 1, 1, '90.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(30, 'NS0345/0172/2023', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(31, 'NS1394/0007/2023', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(32, 'NS4740/0008/2023', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(33, 'NEQ2022001913/2020', '1', 14, 1, 1, 1, '55.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(34, 'NS3371/0102/2023', '1', 14, 1, 1, 1, '60.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(35, 'NS3897/0088/2023', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(36, 'NS3757/0023/2023', '1', 14, 1, 1, 1, '85.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(37, 'NS3981/0011/2023', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(38, 'NS3453/0010/2023', '1', 14, 1, 1, 1, '65.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(39, 'NS5156/0084/2023', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(40, 'NS2510/0010/2023', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(41, 'NS0970/0015/2023', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(42, 'NS3834/0019/2018', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(43, 'NS0850/0022/2022', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(44, 'NS1027/0179/2023', '1', 14, 1, 1, 1, '75.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(45, 'NS4569/0030/2023', '1', 14, 1, 1, 1, '55.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(46, 'NS4740/0041/2023', '1', 14, 1, 1, 1, '90.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(47, 'NS1618/0012/2023', '1', 14, 1, 1, 1, '85.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(48, 'NS1060/0017/2023', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(49, 'NS5033/0020/2022', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(50, 'NS0722/0031/2023', '1', 14, 1, 1, 1, '100.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(51, 'NS4740/0048/2023', '1', 14, 1, 1, 1, '60.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(52, 'NS4498/0051/2020', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(53, 'NS0241/0039/2020', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(54, 'NS0414/0019/2023', '1', 14, 1, 1, 1, '90.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(55, 'NS0197/0009/2020', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(56, 'NS3893/0156/2023', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(57, 'NS0672/0057/2023', '1', 14, 1, 1, 1, '65.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(58, 'NS4816/0040/2021', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(59, 'NS1633/0164/2023', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(60, 'NS4208/0008/2022', '1', 14, 1, 1, 1, '75.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(61, 'NS3897/0105/2023', '1', 14, 1, 1, 1, '65.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(62, 'NS0526/0115/2021', '1', 14, 1, 1, 1, '15.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(63, 'NS0274/0046/2023', '1', 14, 1, 1, 1, '65.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(64, 'NS6048/0056/2023', '1', 14, 1, 1, 1, '40.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(65, 'NS4006/0030/2021', '1', 14, 1, 1, 1, '90.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(66, 'NS2505/0044/2017', '1', 14, 1, 1, 1, '55.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(67, 'NS4238/0026/2021', '1', 14, 1, 1, 1, '60.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(68, 'NS3351/0179/2023', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(69, 'NS4117/0256/2022', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(70, 'NS3321/0044/2021', '1', 14, 1, 1, 1, '75.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(71, 'NS5551/0011/2021', '1', 14, 1, 1, 1, '65.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(72, 'NS0345/0088/2023', '1', 14, 1, 1, 1, '85.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(73, 'NS4710/0030/2023', '1', 14, 1, 1, 1, '50.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(74, 'NS5822/0117/2023', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(75, 'NS1097/0129/2021', '1', 14, 1, 1, 1, '75.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(76, 'NS1633/0136/2021', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(77, 'NS0672/0094/2021', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(78, 'NS2521/0024/2021', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(79, 'NS1581/0075/2023', '1', 14, 1, 1, 1, '65.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(80, 'NS2315/0115/2021', '1', 14, 1, 1, 1, '90.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(81, 'NS2171/0052/2023', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(82, 'NS2424/0074/2023', '1', 14, 1, 1, 1, '65.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(83, 'NS0632/0053/2023', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(84, 'NS0672/0135/2023', '1', 14, 1, 1, 1, '70.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(85, 'NS5376/0082/2023', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(86, 'NS3228/0285/2022', '1', 14, 1, 1, 1, '80.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(87, 'NS0541/0100/2023', '1', 14, 1, 1, 1, '75.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(88, 'NS3534/0025/2023', '1', 14, 1, 1, 1, '75.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(89, 'NS5251/0066/2023', '1', 14, 1, 1, 1, '75.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(90, 'NS5298/0057/2023', '1', 14, 1, 1, 1, '75.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(91, 'NS4897/0091/2023', '1', 14, 1, 1, 1, '90.00', 'superadmin', '2025-04-19 19:00:38', '2025-04-19 19:00:38'),
(92, 'NS5289/0024/2023', '1', 14, 1, 1, 2, '80.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(93, 'NP1153/0013/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(94, 'NS5357/0001/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(95, 'NS0672/0001/2023', '1', 14, 1, 1, 2, '85.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(96, 'NS2367/0005/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(97, 'NS0294/0005/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(98, 'NS0916/0003/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(99, 'NS1375/0002/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(100, 'NS0547/0015/2023', '1', 14, 1, 1, 2, '70.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(101, 'NS0345/0172/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(102, 'NS1394/0007/2023', '1', 14, 1, 1, 2, '85.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(103, 'NS4740/0008/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(104, 'NEQ2022001913/2020', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(105, 'NS3371/0102/2023', '1', 14, 1, 1, 2, '85.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(106, 'NS3897/0088/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(107, 'NS3757/0023/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(108, 'NS3981/0011/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(109, 'NS3453/0010/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(110, 'NS5156/0084/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(111, 'NS2510/0010/2023', '1', 14, 1, 1, 2, '70.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(112, 'NS0970/0015/2023', '1', 14, 1, 1, 2, '90.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(113, 'NS3834/0019/2018', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(114, 'NS0850/0022/2022', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(115, 'NS1027/0179/2023', '1', 14, 1, 1, 2, '80.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(116, 'NS4569/0030/2023', '1', 14, 1, 1, 2, '70.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(117, 'NS4740/0041/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(118, 'NS1618/0012/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(119, 'NS1060/0017/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(120, 'NS5033/0020/2022', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(121, 'NS0722/0031/2023', '1', 14, 1, 1, 2, '85.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(122, 'NS4740/0048/2023', '1', 14, 1, 1, 2, '80.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(123, 'NS4498/0051/2020', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(124, 'NS0241/0039/2020', '1', 14, 1, 1, 2, '80.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(125, 'NS0414/0019/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(126, 'NS0197/0009/2020', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(127, 'NS3893/0156/2023', '1', 14, 1, 1, 2, '85.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(128, 'NS0672/0057/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(129, 'NS4816/0040/2021', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(130, 'NS1633/0164/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(131, 'NS4208/0008/2022', '1', 14, 1, 1, 2, '80.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(132, 'NS3897/0105/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(133, 'NS0526/0115/2021', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(134, 'NS0274/0046/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(135, 'NS6048/0056/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(136, 'NS4006/0030/2021', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(137, 'NS2505/0044/2017', '1', 14, 1, 1, 2, '85.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(138, 'NS4238/0026/2021', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(139, 'NS3351/0179/2023', '1', 14, 1, 1, 2, '80.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(140, 'NS4117/0256/2022', '1', 14, 1, 1, 2, '60.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(141, 'NS3321/0044/2021', '1', 14, 1, 1, 2, '80.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(142, 'NS5551/0011/2021', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(143, 'NS0345/0088/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(144, 'NS4710/0030/2023', '1', 14, 1, 1, 2, '70.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(145, 'NS5822/0117/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(146, 'NS1097/0129/2021', '1', 14, 1, 1, 2, '90.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(147, 'NS1633/0136/2021', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(148, 'NS0672/0094/2021', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(149, 'NS2521/0024/2021', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(150, 'NS1581/0075/2023', '1', 14, 1, 1, 2, '80.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(151, 'NS2315/0115/2021', '1', 14, 1, 1, 2, '75.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(152, 'NS2171/0052/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(153, 'NS2424/0074/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(154, 'NS0632/0053/2023', '1', 14, 1, 1, 2, '85.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(155, 'NS0672/0135/2023', '1', 14, 1, 1, 2, '100.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(156, 'NS5376/0082/2023', '1', 14, 1, 1, 2, '90.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(157, 'NS3228/0285/2022', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(158, 'NS0541/0100/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(159, 'NS3534/0025/2023', '1', 14, 1, 1, 2, '95.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(160, 'NS5251/0066/2023', '1', 14, 1, 1, 2, '85.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(161, 'NS5298/0057/2023', '1', 14, 1, 1, 2, '85.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(162, 'NS4897/0091/2023', '1', 14, 1, 1, 2, '70.00', 'superadmin', '2025-04-19 19:02:46', '2025-04-19 19:02:46'),
(163, 'NS5289/0024/2023', '1', 14, 1, 1, 3, '75.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(164, 'NP1153/0013/2023', '1', 14, 1, 1, 3, '58.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(165, 'NS5357/0001/2023', '1', 14, 1, 1, 3, '65.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(166, 'NS0672/0001/2023', '1', 14, 1, 1, 3, '82.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(167, 'NS2367/0005/2023', '1', 14, 1, 1, 3, '42.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(168, 'NS0294/0005/2023', '1', 14, 1, 1, 3, '62.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(169, 'NS0916/0003/2023', '1', 14, 1, 1, 3, '65.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(170, 'NS1375/0002/2023', '1', 14, 1, 1, 3, '55.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(171, 'NS0547/0015/2023', '1', 14, 1, 1, 3, '66.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(172, 'NS0345/0172/2023', '1', 14, 1, 1, 3, '58.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(173, 'NS1394/0007/2023', '1', 14, 1, 1, 3, '63.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(174, 'NS4740/0008/2023', '1', 14, 1, 1, 3, '56.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(175, 'NEQ2022001913/2020', '1', 14, 1, 1, 3, '61.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(176, 'NS3371/0102/2023', '1', 14, 1, 1, 3, '56.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(177, 'NS3897/0088/2023', '1', 14, 1, 1, 3, '64.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(178, 'NS3757/0023/2023', '1', 14, 1, 1, 3, '59.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(179, 'NS3981/0011/2023', '1', 14, 1, 1, 3, '54.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(180, 'NS3453/0010/2023', '1', 14, 1, 1, 3, '56.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(181, 'NS5156/0084/2023', '1', 14, 1, 1, 3, '48.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(182, 'NS2510/0010/2023', '1', 14, 1, 1, 3, '64.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(183, 'NS0970/0015/2023', '1', 14, 1, 1, 3, '69.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(184, 'NS3834/0019/2018', '1', 14, 1, 1, 3, '66.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(185, 'NS0850/0022/2022', '1', 14, 1, 1, 3, '62.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(186, 'NS1027/0179/2023', '1', 14, 1, 1, 3, '65.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(187, 'NS4569/0030/2023', '1', 14, 1, 1, 3, '75.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(188, 'NS4740/0041/2023', '1', 14, 1, 1, 3, '52.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(189, 'NS1618/0012/2023', '1', 14, 1, 1, 3, '62.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(190, 'NS1060/0017/2023', '1', 14, 1, 1, 3, '66.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(191, 'NS5033/0020/2022', '1', 14, 1, 1, 3, '56.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(192, 'NS0722/0031/2023', '1', 14, 1, 1, 3, '54.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(193, 'NS4740/0048/2023', '1', 14, 1, 1, 3, '54.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(194, 'NS4498/0051/2020', '1', 14, 1, 1, 3, '72.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(195, 'NS0241/0039/2020', '1', 14, 1, 1, 3, '76.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(196, 'NS0414/0019/2023', '1', 14, 1, 1, 3, '79.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(197, 'NS0197/0009/2020', '1', 14, 1, 1, 3, '53.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(198, 'NS3893/0156/2023', '1', 14, 1, 1, 3, '62.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(199, 'NS0672/0057/2023', '1', 14, 1, 1, 3, '63.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(200, 'NS4816/0040/2021', '1', 14, 1, 1, 3, '61.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(201, 'NS1633/0164/2023', '1', 14, 1, 1, 3, '67.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(202, 'NS4208/0008/2022', '1', 14, 1, 1, 3, '64.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(203, 'NS3897/0105/2023', '1', 14, 1, 1, 3, '63.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(204, 'NS0526/0115/2021', '1', 14, 1, 1, 3, '66.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(205, 'NS0274/0046/2023', '1', 14, 1, 1, 3, '42.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(206, 'NS6048/0056/2023', '1', 14, 1, 1, 3, '57.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(207, 'NS4006/0030/2021', '1', 14, 1, 1, 3, '63.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(208, 'NS2505/0044/2017', '1', 14, 1, 1, 3, '65.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(209, 'NS4238/0026/2021', '1', 14, 1, 1, 3, '65.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(210, 'NS3351/0179/2023', '1', 14, 1, 1, 3, '68.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(211, 'NS4117/0256/2022', '1', 14, 1, 1, 3, '58.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(212, 'NS3321/0044/2021', '1', 14, 1, 1, 3, '54.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(213, 'NS5551/0011/2021', '1', 14, 1, 1, 3, '75.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(214, 'NS0345/0088/2023', '1', 14, 1, 1, 3, '54.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(215, 'NS4710/0030/2023', '1', 14, 1, 1, 3, '65.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(216, 'NS5822/0117/2023', '1', 14, 1, 1, 3, '68.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(217, 'NS1097/0129/2021', '1', 14, 1, 1, 3, '61.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(218, 'NS1633/0136/2021', '1', 14, 1, 1, 3, '67.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(219, 'NS0672/0094/2021', '1', 14, 1, 1, 3, '71.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(220, 'NS2521/0024/2021', '1', 14, 1, 1, 3, '69.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(221, 'NS1581/0075/2023', '1', 14, 1, 1, 3, '53.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(222, 'NS2315/0115/2021', '1', 14, 1, 1, 3, '70.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(223, 'NS2171/0052/2023', '1', 14, 1, 1, 3, '62.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(224, 'NS2424/0074/2023', '1', 14, 1, 1, 3, '30.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(225, 'NS0632/0053/2023', '1', 14, 1, 1, 3, '49.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(226, 'NS0672/0135/2023', '1', 14, 1, 1, 3, '53.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(227, 'NS5376/0082/2023', '1', 14, 1, 1, 3, '66.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(228, 'NS3228/0285/2022', '1', 14, 1, 1, 3, '46.00', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(229, 'NS0541/0100/2023', '1', 14, 1, 1, 3, '64.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(230, 'NS3534/0025/2023', '1', 14, 1, 1, 3, '61.50', 'superadmin', '2025-04-19 19:05:55', '2025-04-19 19:05:55'),
(231, 'NS5251/0066/2023', '1', 14, 1, 1, 3, '61.00', 'superadmin', '2025-04-19 19:05:56', '2025-04-19 19:05:56'),
(232, 'NS5298/0057/2023', '1', 14, 1, 1, 3, '56.50', 'superadmin', '2025-04-19 19:05:56', '2025-04-19 19:05:56'),
(233, 'NS4897/0091/2023', '1', 14, 1, 1, 3, '58.50', 'superadmin', '2025-04-19 19:05:56', '2025-04-19 19:05:56'),
(234, 'NS5289/0024/2023', '1', 14, 1, 1, 4, '74.50', 'superadmin', '2025-04-19 19:06:27', '2025-04-19 19:06:27'),
(235, 'NP1153/0013/2023', '1', 14, 1, 1, 4, '80.00', 'superadmin', '2025-04-19 19:06:27', '2025-04-19 19:06:27'),
(236, 'NS5357/0001/2023', '1', 14, 1, 1, 4, '63.50', 'superadmin', '2025-04-19 19:06:27', '2025-04-19 19:06:27'),
(237, 'NS0672/0001/2023', '1', 14, 1, 1, 4, '75.00', 'superadmin', '2025-04-19 19:06:27', '2025-04-19 19:06:27'),
(238, 'NS2367/0005/2023', '1', 14, 1, 1, 4, '56.50', 'superadmin', '2025-04-19 19:06:27', '2025-04-19 19:06:27'),
(239, 'NS0294/0005/2023', '1', 14, 1, 1, 4, '76.50', 'superadmin', '2025-04-19 19:06:27', '2025-04-19 19:06:27'),
(240, 'NS0916/0003/2023', '1', 14, 1, 1, 4, '80.50', 'superadmin', '2025-04-19 19:06:27', '2025-04-19 19:06:27'),
(241, 'NS1375/0002/2023', '1', 14, 1, 1, 4, '82.00', 'superadmin', '2025-04-19 19:06:27', '2025-04-19 19:06:27'),
(242, 'NS0547/0015/2023', '1', 14, 1, 1, 4, '73.50', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(243, 'NS0345/0172/2023', '1', 14, 1, 1, 4, '60.50', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(244, 'NS1394/0007/2023', '1', 14, 1, 1, 4, '57.00', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(245, 'NS4740/0008/2023', '1', 14, 1, 1, 4, '65.50', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(246, 'NEQ2022001913/2020', '1', 14, 1, 1, 4, '64.50', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(247, 'NS3371/0102/2023', '1', 14, 1, 1, 4, '67.00', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(248, 'NS3897/0088/2023', '1', 14, 1, 1, 4, '45.00', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(249, 'NS3757/0023/2023', '1', 14, 1, 1, 4, '44.50', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(250, 'NS3981/0011/2023', '1', 14, 1, 1, 4, '78.00', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(251, 'NS3453/0010/2023', '1', 14, 1, 1, 4, '51.00', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(252, 'NS5156/0084/2023', '1', 14, 1, 1, 4, '66.00', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(253, 'NS2510/0010/2023', '1', 14, 1, 1, 4, '75.50', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(254, 'NS0970/0015/2023', '1', 14, 1, 1, 4, '50.50', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(255, 'NS3834/0019/2018', '1', 14, 1, 1, 4, '61.00', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(256, 'NS0850/0022/2022', '1', 14, 1, 1, 4, '63.00', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(257, 'NS1027/0179/2023', '1', 14, 1, 1, 4, '65.50', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(258, 'NS4569/0030/2023', '1', 14, 1, 1, 4, '67.50', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(259, 'NS4740/0041/2023', '1', 14, 1, 1, 4, '58.00', 'superadmin', '2025-04-19 19:06:28', '2025-04-19 19:06:28'),
(260, 'NS1618/0012/2023', '1', 14, 1, 1, 4, '83.00', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(261, 'NS1060/0017/2023', '1', 14, 1, 1, 4, '52.50', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(262, 'NS5033/0020/2022', '1', 14, 1, 1, 4, '76.50', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(263, 'NS0722/0031/2023', '1', 14, 1, 1, 4, '65.50', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(264, 'NS4740/0048/2023', '1', 14, 1, 1, 4, '52.00', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(265, 'NS4498/0051/2020', '1', 14, 1, 1, 4, '36.00', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(266, 'NS0241/0039/2020', '1', 14, 1, 1, 4, '43.00', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(267, 'NS0414/0019/2023', '1', 14, 1, 1, 4, '76.50', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(268, 'NS0197/0009/2020', '1', 14, 1, 1, 4, '56.50', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(269, 'NS3893/0156/2023', '1', 14, 1, 1, 4, '50.00', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(270, 'NS0672/0057/2023', '1', 14, 1, 1, 4, '58.50', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(271, 'NS4816/0040/2021', '1', 14, 1, 1, 4, '57.00', 'superadmin', '2025-04-19 19:06:29', '2025-04-19 19:06:29'),
(272, 'NS1633/0164/2023', '1', 14, 1, 1, 4, '45.00', 'superadmin', '2025-04-19 19:06:30', '2025-04-19 19:06:30'),
(273, 'NS4208/0008/2022', '1', 14, 1, 1, 4, '49.50', 'superadmin', '2025-04-19 19:06:30', '2025-04-19 19:06:30'),
(274, 'NS3897/0105/2023', '1', 14, 1, 1, 4, '77.50', 'superadmin', '2025-04-19 19:06:30', '2025-04-19 19:06:30'),
(275, 'NS0526/0115/2021', '1', 14, 1, 1, 4, '60.00', 'superadmin', '2025-04-19 19:06:30', '2025-04-19 19:06:30'),
(276, 'NS0274/0046/2023', '1', 14, 1, 1, 4, '70.50', 'superadmin', '2025-04-19 19:06:30', '2025-04-19 19:06:30'),
(277, 'NS6048/0056/2023', '1', 14, 1, 1, 4, '63.50', 'superadmin', '2025-04-19 19:06:30', '2025-04-19 19:06:30'),
(278, 'NS4006/0030/2021', '1', 14, 1, 1, 4, '75.50', 'superadmin', '2025-04-19 19:06:30', '2025-04-19 19:06:30'),
(279, 'NS2505/0044/2017', '1', 14, 1, 1, 4, '66.00', 'superadmin', '2025-04-19 19:06:30', '2025-04-19 19:06:30'),
(280, 'NS4238/0026/2021', '1', 14, 1, 1, 4, '60.00', 'superadmin', '2025-04-19 19:06:30', '2025-04-19 19:06:30'),
(281, 'NS3351/0179/2023', '1', 14, 1, 1, 4, '75.50', 'superadmin', '2025-04-19 19:06:30', '2025-04-19 19:06:30'),
(282, 'NS4117/0256/2022', '1', 14, 1, 1, 4, '56.00', 'superadmin', '2025-04-19 19:06:31', '2025-04-19 19:06:31'),
(283, 'NS3321/0044/2021', '1', 14, 1, 1, 4, '35.00', 'superadmin', '2025-04-19 19:06:31', '2025-04-19 19:06:31'),
(284, 'NS5551/0011/2021', '1', 14, 1, 1, 4, '84.50', 'superadmin', '2025-04-19 19:06:31', '2025-04-19 19:06:31'),
(285, 'NS0345/0088/2023', '1', 14, 1, 1, 4, '75.50', 'superadmin', '2025-04-19 19:06:31', '2025-04-19 19:06:31'),
(286, 'NS4710/0030/2023', '1', 14, 1, 1, 4, '80.00', 'superadmin', '2025-04-19 19:06:31', '2025-04-19 19:06:31'),
(287, 'NS5822/0117/2023', '1', 14, 1, 1, 4, '71.50', 'superadmin', '2025-04-19 19:06:31', '2025-04-19 19:06:31'),
(288, 'NS1097/0129/2021', '1', 14, 1, 1, 4, '58.00', 'superadmin', '2025-04-19 19:06:31', '2025-04-19 19:06:31'),
(289, 'NS1633/0136/2021', '1', 14, 1, 1, 4, '50.50', 'superadmin', '2025-04-19 19:06:31', '2025-04-19 19:06:31'),
(290, 'NS0672/0094/2021', '1', 14, 1, 1, 4, '63.00', 'superadmin', '2025-04-19 19:06:31', '2025-04-19 19:06:31'),
(291, 'NS2521/0024/2021', '1', 14, 1, 1, 4, '77.00', 'superadmin', '2025-04-19 19:06:31', '2025-04-19 19:06:31'),
(292, 'NS1581/0075/2023', '1', 14, 1, 1, 4, '63.00', 'superadmin', '2025-04-19 19:06:32', '2025-04-19 19:06:32'),
(293, 'NS2315/0115/2021', '1', 14, 1, 1, 4, '60.00', 'superadmin', '2025-04-19 19:06:32', '2025-04-19 19:06:32'),
(294, 'NS2171/0052/2023', '1', 14, 1, 1, 4, '72.00', 'superadmin', '2025-04-19 19:06:32', '2025-04-19 19:06:32'),
(295, 'NS2424/0074/2023', '1', 14, 1, 1, 4, '70.00', 'superadmin', '2025-04-19 19:06:32', '2025-04-19 19:06:32'),
(296, 'NS0632/0053/2023', '1', 14, 1, 1, 4, '51.00', 'superadmin', '2025-04-19 19:06:32', '2025-04-19 19:06:32'),
(297, 'NS0672/0135/2023', '1', 14, 1, 1, 4, '48.50', 'superadmin', '2025-04-19 19:06:32', '2025-04-19 19:06:32'),
(298, 'NS5376/0082/2023', '1', 14, 1, 1, 4, '53.50', 'superadmin', '2025-04-19 19:06:32', '2025-04-19 19:06:32'),
(299, 'NS3228/0285/2022', '1', 14, 1, 1, 4, '54.00', 'superadmin', '2025-04-19 19:06:32', '2025-04-19 19:06:32'),
(300, 'NS0541/0100/2023', '1', 14, 1, 1, 4, '56.50', 'superadmin', '2025-04-19 19:06:33', '2025-04-19 19:06:33'),
(301, 'NS3534/0025/2023', '1', 14, 1, 1, 4, '80.50', 'superadmin', '2025-04-19 19:06:33', '2025-04-19 19:06:33'),
(302, 'NS5251/0066/2023', '1', 14, 1, 1, 4, '41.00', 'superadmin', '2025-04-19 19:06:33', '2025-04-19 19:06:33'),
(303, 'NS5298/0057/2023', '1', 14, 1, 1, 4, '66.00', 'superadmin', '2025-04-19 19:06:33', '2025-04-19 19:06:33'),
(304, 'NS4897/0091/2023', '1', 14, 1, 1, 4, '42.00', 'superadmin', '2025-04-19 19:06:33', '2025-04-19 19:06:33'),
(305, 'NS5289/0024/2023', '1', 14, 1, 1, 5, '75.00', 'superadmin', '2025-04-19 19:14:37', '2025-04-19 19:33:43'),
(306, 'NP1153/0013/2023', '1', 14, 1, 1, 5, '61.50', 'superadmin', '2025-04-19 19:14:37', '2025-04-19 19:33:44'),
(307, 'NS5357/0001/2023', '1', 14, 1, 1, 5, '69.00', 'superadmin', '2025-04-19 19:14:37', '2025-04-19 19:33:44'),
(308, 'NS0672/0001/2023', '1', 14, 1, 1, 5, '74.50', 'superadmin', '2025-04-19 19:14:38', '2025-04-19 19:33:44'),
(309, 'NS2367/0005/2023', '1', 14, 1, 1, 5, '71.50', 'superadmin', '2025-04-19 19:14:38', '2025-04-19 19:33:44'),
(310, 'NS0294/0005/2023', '1', 14, 1, 1, 5, '62.50', 'superadmin', '2025-04-19 19:14:38', '2025-04-19 19:33:44'),
(311, 'NS0916/0003/2023', '1', 14, 1, 1, 5, '59.00', 'superadmin', '2025-04-19 19:14:38', '2025-04-19 19:33:44'),
(312, 'NS1375/0002/2023', '1', 14, 1, 1, 5, '64.00', 'superadmin', '2025-04-19 19:14:38', '2025-04-19 19:33:44'),
(313, 'NS0547/0015/2023', '1', 14, 1, 1, 5, '76.50', 'superadmin', '2025-04-19 19:14:38', '2025-04-19 19:33:44'),
(314, 'NS0345/0172/2023', '1', 14, 1, 1, 5, '59.00', 'superadmin', '2025-04-19 19:14:38', '2025-04-19 19:33:45'),
(315, 'NS1394/0007/2023', '1', 14, 1, 1, 5, '69.00', 'superadmin', '2025-04-19 19:14:39', '2025-04-19 19:33:45'),
(316, 'NS4740/0008/2023', '1', 14, 1, 1, 5, '62.00', 'superadmin', '2025-04-19 19:14:39', '2025-04-19 19:33:45'),
(317, 'NEQ2022001913/2020', '1', 14, 1, 1, 5, '57.00', 'superadmin', '2025-04-19 19:14:39', '2025-04-19 19:33:45'),
(318, 'NS3371/0102/2023', '1', 14, 1, 1, 5, '63.50', 'superadmin', '2025-04-19 19:14:39', '2025-04-19 19:33:45'),
(319, 'NS3897/0088/2023', '1', 14, 1, 1, 5, '70.50', 'superadmin', '2025-04-19 19:14:39', '2025-04-19 19:33:45'),
(320, 'NS3757/0023/2023', '1', 14, 1, 1, 5, '63.00', 'superadmin', '2025-04-19 19:14:39', '2025-04-19 19:33:45'),
(321, 'NS3981/0011/2023', '1', 14, 1, 1, 5, '75.50', 'superadmin', '2025-04-19 19:14:39', '2025-04-19 19:33:46'),
(322, 'NS3453/0010/2023', '1', 14, 1, 1, 5, '66.00', 'superadmin', '2025-04-19 19:14:40', '2025-04-19 19:33:46'),
(323, 'NS5156/0084/2023', '1', 14, 1, 1, 5, '60.00', 'superadmin', '2025-04-19 19:14:40', '2025-04-19 19:33:46'),
(324, 'NS2510/0010/2023', '1', 14, 1, 1, 5, '87.50', 'superadmin', '2025-04-19 19:14:40', '2025-04-19 19:33:46'),
(325, 'NS0970/0015/2023', '1', 14, 1, 1, 5, '58.00', 'superadmin', '2025-04-19 19:14:40', '2025-04-19 19:33:46'),
(326, 'NS3834/0019/2018', '1', 14, 1, 1, 5, '66.00', 'superadmin', '2025-04-19 19:14:40', '2025-04-19 19:33:46'),
(327, 'NS0850/0022/2022', '1', 14, 1, 1, 5, '57.00', 'superadmin', '2025-04-19 19:14:40', '2025-04-19 19:33:46'),
(328, 'NS1027/0179/2023', '1', 14, 1, 1, 5, '73.00', 'superadmin', '2025-04-19 19:14:40', '2025-04-19 19:33:46'),
(329, 'NS4569/0030/2023', '1', 14, 1, 1, 5, '63.50', 'superadmin', '2025-04-19 19:14:41', '2025-04-19 19:33:47'),
(330, 'NS4740/0041/2023', '1', 14, 1, 1, 5, '65.50', 'superadmin', '2025-04-19 19:14:41', '2025-04-19 19:33:47'),
(331, 'NS1618/0012/2023', '1', 14, 1, 1, 5, '61.00', 'superadmin', '2025-04-19 19:14:41', '2025-04-19 19:33:47'),
(332, 'NS1060/0017/2023', '1', 14, 1, 1, 5, '69.00', 'superadmin', '2025-04-19 19:14:41', '2025-04-19 19:33:47'),
(333, 'NS5033/0020/2022', '1', 14, 1, 1, 5, '57.00', 'superadmin', '2025-04-19 19:14:41', '2025-04-19 19:33:47'),
(334, 'NS0722/0031/2023', '1', 14, 1, 1, 5, '64.00', 'superadmin', '2025-04-19 19:14:41', '2025-04-19 19:33:47'),
(335, 'NS4740/0048/2023', '1', 14, 1, 1, 5, '50.50', 'superadmin', '2025-04-19 19:14:41', '2025-04-19 19:33:47'),
(336, 'NS4498/0051/2020', '1', 14, 1, 1, 5, '60.50', 'superadmin', '2025-04-19 19:14:42', '2025-04-19 19:33:48'),
(337, 'NS0241/0039/2020', '1', 14, 1, 1, 5, '73.50', 'superadmin', '2025-04-19 19:14:42', '2025-04-19 19:33:48'),
(338, 'NS0414/0019/2023', '1', 14, 1, 1, 5, '72.00', 'superadmin', '2025-04-19 19:14:42', '2025-04-19 19:33:48'),
(339, 'NS0197/0009/2020', '1', 14, 1, 1, 5, '67.00', 'superadmin', '2025-04-19 19:14:42', '2025-04-19 19:33:48'),
(340, 'NS3893/0156/2023', '1', 14, 1, 1, 5, '60.00', 'superadmin', '2025-04-19 19:14:42', '2025-04-19 19:33:48'),
(341, 'NS0672/0057/2023', '1', 14, 1, 1, 5, '59.00', 'superadmin', '2025-04-19 19:14:42', '2025-04-19 19:33:48'),
(342, 'NS4816/0040/2021', '1', 14, 1, 1, 5, '65.00', 'superadmin', '2025-04-19 19:14:43', '2025-04-19 19:33:48'),
(343, 'NS1633/0164/2023', '1', 14, 1, 1, 5, '62.50', 'superadmin', '2025-04-19 19:14:43', '2025-04-19 19:33:48'),
(344, 'NS4208/0008/2022', '1', 14, 1, 1, 5, '62.00', 'superadmin', '2025-04-19 19:14:43', '2025-04-19 19:33:49'),
(345, 'NS3897/0105/2023', '1', 14, 1, 1, 5, '84.50', 'superadmin', '2025-04-19 19:14:43', '2025-04-19 19:33:49'),
(346, 'NS0526/0115/2021', '1', 14, 1, 1, 5, '83.00', 'superadmin', '2025-04-19 19:14:43', '2025-04-19 19:33:49'),
(347, 'NS0274/0046/2023', '1', 14, 1, 1, 5, '53.00', 'superadmin', '2025-04-19 19:14:43', '2025-04-19 19:33:49'),
(348, 'NS6048/0056/2023', '1', 14, 1, 1, 5, '67.00', 'superadmin', '2025-04-19 19:14:43', '2025-04-19 19:33:49'),
(349, 'NS4006/0030/2021', '1', 14, 1, 1, 5, '68.00', 'superadmin', '2025-04-19 19:14:44', '2025-04-19 19:33:49'),
(350, 'NS2505/0044/2017', '1', 14, 1, 1, 5, '82.50', 'superadmin', '2025-04-19 19:14:44', '2025-04-19 19:33:49'),
(351, 'NS4238/0026/2021', '1', 14, 1, 1, 5, '64.00', 'superadmin', '2025-04-19 19:14:44', '2025-04-19 19:33:50'),
(352, 'NS3351/0179/2023', '1', 14, 1, 1, 5, '73.00', 'superadmin', '2025-04-19 19:14:44', '2025-04-19 19:33:50'),
(353, 'NS4117/0256/2022', '1', 14, 1, 1, 5, '61.00', 'superadmin', '2025-04-19 19:14:44', '2025-04-19 19:33:50'),
(354, 'NS3321/0044/2021', '1', 14, 1, 1, 5, '55.50', 'superadmin', '2025-04-19 19:14:44', '2025-04-19 19:33:50'),
(355, 'NS5551/0011/2021', '1', 14, 1, 1, 5, '64.00', 'superadmin', '2025-04-19 19:14:44', '2025-04-19 19:33:50'),
(356, 'NS0345/0088/2023', '1', 14, 1, 1, 5, '68.00', 'superadmin', '2025-04-19 19:14:44', '2025-04-19 19:33:50'),
(357, 'NS4710/0030/2023', '1', 14, 1, 1, 5, '60.00', 'superadmin', '2025-04-19 19:14:45', '2025-04-19 19:33:50'),
(358, 'NS5822/0117/2023', '1', 14, 1, 1, 5, '78.00', 'superadmin', '2025-04-19 19:14:45', '2025-04-19 19:33:50'),
(359, 'NS1097/0129/2021', '1', 14, 1, 1, 5, '81.00', 'superadmin', '2025-04-19 19:14:45', '2025-04-19 19:33:51'),
(360, 'NS1633/0136/2021', '1', 14, 1, 1, 5, '63.00', 'superadmin', '2025-04-19 19:14:45', '2025-04-19 19:33:51'),
(361, 'NS0672/0094/2021', '1', 14, 1, 1, 5, '62.50', 'superadmin', '2025-04-19 19:14:45', '2025-04-19 19:33:51'),
(362, 'NS2521/0024/2021', '1', 14, 1, 1, 5, '67.00', 'superadmin', '2025-04-19 19:14:45', '2025-04-19 19:33:51'),
(363, 'NS1581/0075/2023', '1', 14, 1, 1, 5, '58.50', 'superadmin', '2025-04-19 19:14:45', '2025-04-19 19:33:51'),
(364, 'NS2315/0115/2021', '1', 14, 1, 1, 5, '59.00', 'superadmin', '2025-04-19 19:14:46', '2025-04-19 19:33:51'),
(365, 'NS2171/0052/2023', '1', 14, 1, 1, 5, '71.00', 'superadmin', '2025-04-19 19:14:46', '2025-04-19 19:33:51'),
(366, 'NS2424/0074/2023', '1', 14, 1, 1, 5, '54.50', 'superadmin', '2025-04-19 19:14:46', '2025-04-19 19:33:52'),
(367, 'NS0632/0053/2023', '1', 14, 1, 1, 5, '60.50', 'superadmin', '2025-04-19 19:14:46', '2025-04-19 19:33:52'),
(368, 'NS0672/0135/2023', '1', 14, 1, 1, 5, '56.00', 'superadmin', '2025-04-19 19:14:46', '2025-04-19 19:33:52'),
(369, 'NS5376/0082/2023', '1', 14, 1, 1, 5, '63.00', 'superadmin', '2025-04-19 19:14:46', '2025-04-19 19:33:52'),
(370, 'NS3228/0285/2022', '1', 14, 1, 1, 5, '60.50', 'superadmin', '2025-04-19 19:14:46', '2025-04-19 19:33:52'),
(371, 'NS0541/0100/2023', '1', 14, 1, 1, 5, '62.00', 'superadmin', '2025-04-19 19:14:47', '2025-04-19 19:33:52'),
(372, 'NS3534/0025/2023', '1', 14, 1, 1, 5, '65.50', 'superadmin', '2025-04-19 19:14:47', '2025-04-19 19:33:52'),
(373, 'NS5251/0066/2023', '1', 14, 1, 1, 5, '55.00', 'superadmin', '2025-04-19 19:14:47', '2025-04-19 19:33:52'),
(374, 'NS5298/0057/2023', '1', 14, 1, 1, 5, '66.00', 'superadmin', '2025-04-19 19:14:47', '2025-04-19 19:33:53'),
(375, 'NS4897/0091/2023', '1', 14, 1, 1, 5, '56.00', 'superadmin', '2025-04-19 19:14:47', '2025-04-19 19:33:53'),
(447, 'NS5289/0024/2023', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(448, 'NP1153/0013/2023', '1', 14, 1, 2, 1, '97.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(449, 'NS5357/0001/2023', '1', 14, 1, 2, 1, '97.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(450, 'NS0672/0001/2023', '1', 14, 1, 2, 1, '90.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(451, 'NS2367/0005/2023', '1', 14, 1, 2, 1, '70.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(452, 'NS0294/0005/2023', '1', 14, 1, 2, 1, '97.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(453, 'NS0916/0003/2023', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(454, 'NS1375/0002/2023', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(455, 'NS0547/0015/2023', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(456, 'NS0345/0172/2023', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(457, 'NS1394/0007/2023', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(458, 'NS4740/0008/2023', '1', 14, 1, 2, 1, '80.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(459, 'NEQ2022001913/2020', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(460, 'NS3371/0102/2023', '1', 14, 1, 2, 1, '77.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(461, 'NS3897/0088/2023', '1', 14, 1, 2, 1, '97.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(462, 'NS3757/0023/2023', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(463, 'NS3981/0011/2023', '1', 14, 1, 2, 1, '83.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(464, 'NS3453/0010/2023', '1', 14, 1, 2, 1, '100.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(465, 'NS5156/0084/2023', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(466, 'NS2510/0010/2023', '1', 14, 1, 2, 1, '90.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(467, 'NS0970/0015/2023', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(468, 'NS3834/0019/2018', '1', 14, 1, 2, 1, '100.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(469, 'NS0850/0022/2022', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(470, 'NS1027/0179/2023', '1', 14, 1, 2, 1, '100.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(471, 'NS4569/0030/2023', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(472, 'NS4740/0041/2023', '1', 14, 1, 2, 1, '83.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(473, 'NS1618/0012/2023', '1', 14, 1, 2, 1, '77.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(474, 'NS1060/0017/2023', '1', 14, 1, 2, 1, '100.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(475, 'NS5033/0020/2022', '1', 14, 1, 2, 1, '100.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(476, 'NS0722/0031/2023', '1', 14, 1, 2, 1, '67.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(477, 'NS4740/0048/2023', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(478, 'NS4498/0051/2020', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(479, 'NS0241/0039/2020', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(480, 'NS0414/0019/2023', '1', 14, 1, 2, 1, '80.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(481, 'NS0197/0009/2020', '1', 14, 1, 2, 1, '73.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(482, 'NS3893/0156/2023', '1', 14, 1, 2, 1, '80.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(483, 'NS0672/0057/2023', '1', 14, 1, 2, 1, '83.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(484, 'NS4816/0040/2021', '1', 14, 1, 2, 1, '83.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(485, 'NS1633/0164/2023', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(486, 'NS4208/0008/2022', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(487, 'NS3897/0105/2023', '1', 14, 1, 2, 1, '77.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(488, 'NS0526/0115/2021', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(489, 'NS0274/0046/2023', '1', 14, 1, 2, 1, '80.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(490, 'NS6048/0056/2023', '1', 14, 1, 2, 1, '90.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(491, 'NS4006/0030/2021', '1', 14, 1, 2, 1, '100.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(492, 'NS2505/0044/2017', '1', 14, 1, 2, 1, '100.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(493, 'NS4238/0026/2021', '1', 14, 1, 2, 1, '60.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(494, 'NS3351/0179/2023', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(495, 'NS4117/0256/2022', '1', 14, 1, 2, 1, '83.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(496, 'NS3321/0044/2021', '1', 14, 1, 2, 1, '80.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(497, 'NS5551/0011/2021', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(498, 'NS0345/0088/2023', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(499, 'NS4710/0030/2023', '1', 14, 1, 2, 1, '80.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(500, 'NS5822/0117/2023', '1', 14, 1, 2, 1, '100.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(501, 'NS1097/0129/2021', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(502, 'NS1633/0136/2021', '1', 14, 1, 2, 1, '83.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(503, 'NS0672/0094/2021', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(504, 'NS2521/0024/2021', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(505, 'NS1581/0075/2023', '1', 14, 1, 2, 1, '77.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(506, 'NS2315/0115/2021', '1', 14, 1, 2, 1, '67.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(507, 'NS2171/0052/2023', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(508, 'NS2424/0074/2023', '1', 14, 1, 2, 1, '87.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(509, 'NS0632/0053/2023', '1', 14, 1, 2, 1, '80.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(510, 'NS0672/0135/2023', '1', 14, 1, 2, 1, '90.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(511, 'NS5376/0082/2023', '1', 14, 1, 2, 1, '80.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(512, 'NS3228/0285/2022', '1', 14, 1, 2, 1, '80.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(513, 'NS0541/0100/2023', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(514, 'NS3534/0025/2023', '1', 14, 1, 2, 1, '93.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(515, 'NS5251/0066/2023', '1', 14, 1, 2, 1, '77.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(516, 'NS5298/0057/2023', '1', 14, 1, 2, 1, '77.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(517, 'NS4897/0091/2023', '1', 14, 1, 2, 1, '83.00', 'superadmin', '2025-04-19 19:52:09', '2025-04-19 19:52:09'),
(518, 'NS5289/0024/2023', '1', 14, 1, 2, 2, '90.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(519, 'NP1153/0013/2023', '1', 14, 1, 2, 2, '60.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(520, 'NS5357/0001/2023', '1', 14, 1, 2, 2, '76.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(521, 'NS0672/0001/2023', '1', 14, 1, 2, 2, '92.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(522, 'NS2367/0005/2023', '1', 14, 1, 2, 2, '76.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(523, 'NS0294/0005/2023', '1', 14, 1, 2, 2, '84.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(524, 'NS0916/0003/2023', '1', 14, 1, 2, 2, '72.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08');
INSERT INTO `exam_category_results` (`id`, `reg_no`, `year_of_study`, `year_id`, `semester_id`, `course_id`, `exam_category_id`, `exam_score`, `uploadedby`, `created_at`, `updated_at`) VALUES
(525, 'NS1375/0002/2023', '1', 14, 1, 2, 2, '60.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(526, 'NS0547/0015/2023', '1', 14, 1, 2, 2, '50.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(527, 'NS0345/0172/2023', '1', 14, 1, 2, 2, '74.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(528, 'NS1394/0007/2023', '1', 14, 1, 2, 2, '80.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(529, 'NS4740/0008/2023', '1', 14, 1, 2, 2, '92.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(530, 'NEQ2022001913/2020', '1', 14, 1, 2, 2, '78.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(531, 'NS3371/0102/2023', '1', 14, 1, 2, 2, '84.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(532, 'NS3897/0088/2023', '1', 14, 1, 2, 2, '68.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(533, 'NS3757/0023/2023', '1', 14, 1, 2, 2, '80.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(534, 'NS3981/0011/2023', '1', 14, 1, 2, 2, '84.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(535, 'NS3453/0010/2023', '1', 14, 1, 2, 2, '88.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(536, 'NS5156/0084/2023', '1', 14, 1, 2, 2, '76.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(537, 'NS2510/0010/2023', '1', 14, 1, 2, 2, '84.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(538, 'NS0970/0015/2023', '1', 14, 1, 2, 2, '80.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(539, 'NS3834/0019/2018', '1', 14, 1, 2, 2, '92.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(540, 'NS0850/0022/2022', '1', 14, 1, 2, 2, '76.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(541, 'NS1027/0179/2023', '1', 14, 1, 2, 2, '80.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(542, 'NS4569/0030/2023', '1', 14, 1, 2, 2, '84.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(543, 'NS4740/0041/2023', '1', 14, 1, 2, 2, '76.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(544, 'NS1618/0012/2023', '1', 14, 1, 2, 2, '76.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(545, 'NS1060/0017/2023', '1', 14, 1, 2, 2, '76.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(546, 'NS5033/0020/2022', '1', 14, 1, 2, 2, '94.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(547, 'NS0722/0031/2023', '1', 14, 1, 2, 2, '62.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(548, 'NS4740/0048/2023', '1', 14, 1, 2, 2, '68.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(549, 'NS4498/0051/2020', '1', 14, 1, 2, 2, '94.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(550, 'NS0241/0039/2020', '1', 14, 1, 2, 2, '86.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(551, 'NS0414/0019/2023', '1', 14, 1, 2, 2, '82.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(552, 'NS0197/0009/2020', '1', 14, 1, 2, 2, '82.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(553, 'NS3893/0156/2023', '1', 14, 1, 2, 2, '82.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(554, 'NS0672/0057/2023', '1', 14, 1, 2, 2, '80.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(555, 'NS4816/0040/2021', '1', 14, 1, 2, 2, '84.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(556, 'NS1633/0164/2023', '1', 14, 1, 2, 2, '74.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(557, 'NS4208/0008/2022', '1', 14, 1, 2, 2, '82.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(558, 'NS3897/0105/2023', '1', 14, 1, 2, 2, '64.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(559, 'NS0526/0115/2021', '1', 14, 1, 2, 2, '80.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(560, 'NS0274/0046/2023', '1', 14, 1, 2, 2, '84.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(561, 'NS6048/0056/2023', '1', 14, 1, 2, 2, '74.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(562, 'NS4006/0030/2021', '1', 14, 1, 2, 2, '78.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(563, 'NS2505/0044/2017', '1', 14, 1, 2, 2, '76.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(564, 'NS4238/0026/2021', '1', 14, 1, 2, 2, '86.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(565, 'NS3351/0179/2023', '1', 14, 1, 2, 2, '80.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(566, 'NS4117/0256/2022', '1', 14, 1, 2, 2, '54.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(567, 'NS3321/0044/2021', '1', 14, 1, 2, 2, '68.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(568, 'NS5551/0011/2021', '1', 14, 1, 2, 2, '82.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(569, 'NS0345/0088/2023', '1', 14, 1, 2, 2, '72.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(570, 'NS4710/0030/2023', '1', 14, 1, 2, 2, '62.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(571, 'NS5822/0117/2023', '1', 14, 1, 2, 2, '80.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(572, 'NS1097/0129/2021', '1', 14, 1, 2, 2, '76.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(573, 'NS1633/0136/2021', '1', 14, 1, 2, 2, '86.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(574, 'NS0672/0094/2021', '1', 14, 1, 2, 2, '66.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(575, 'NS2521/0024/2021', '1', 14, 1, 2, 2, '82.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(576, 'NS1581/0075/2023', '1', 14, 1, 2, 2, '74.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(577, 'NS2315/0115/2021', '1', 14, 1, 2, 2, '84.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(578, 'NS2171/0052/2023', '1', 14, 1, 2, 2, '78.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(579, 'NS2424/0074/2023', '1', 14, 1, 2, 2, '68.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(580, 'NS0632/0053/2023', '1', 14, 1, 2, 2, '72.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(581, 'NS0672/0135/2023', '1', 14, 1, 2, 2, '90.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(582, 'NS5376/0082/2023', '1', 14, 1, 2, 2, '68.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(583, 'NS3228/0285/2022', '1', 14, 1, 2, 2, '62.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(584, 'NS0541/0100/2023', '1', 14, 1, 2, 2, '76.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(585, 'NS3534/0025/2023', '1', 14, 1, 2, 2, '88.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(586, 'NS5251/0066/2023', '1', 14, 1, 2, 2, '78.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(587, 'NS5298/0057/2023', '1', 14, 1, 2, 2, '72.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(588, 'NS4897/0091/2023', '1', 14, 1, 2, 2, '82.00', 'superadmin', '2025-04-19 19:53:08', '2025-04-19 19:53:08'),
(589, 'NS5289/0024/2023', '1', 14, 1, 2, 3, '89.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(590, 'NP1153/0013/2023', '1', 14, 1, 2, 3, '76.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(591, 'NS5357/0001/2023', '1', 14, 1, 2, 3, '74.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(592, 'NS0672/0001/2023', '1', 14, 1, 2, 3, '60.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(593, 'NS2367/0005/2023', '1', 14, 1, 2, 3, '52.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(594, 'NS0294/0005/2023', '1', 14, 1, 2, 3, '58.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(595, 'NS0916/0003/2023', '1', 14, 1, 2, 3, '58.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(596, 'NS1375/0002/2023', '1', 14, 1, 2, 3, '44.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(597, 'NS0547/0015/2023', '1', 14, 1, 2, 3, '60.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(598, 'NS0345/0172/2023', '1', 14, 1, 2, 3, '75.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(599, 'NS1394/0007/2023', '1', 14, 1, 2, 3, '61.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(600, 'NS4740/0008/2023', '1', 14, 1, 2, 3, '70.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(601, 'NEQ2022001913/2020', '1', 14, 1, 2, 3, '49.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(602, 'NS3371/0102/2023', '1', 14, 1, 2, 3, '59.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(603, 'NS3897/0088/2023', '1', 14, 1, 2, 3, '59.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(604, 'NS3757/0023/2023', '1', 14, 1, 2, 3, '61.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(605, 'NS3981/0011/2023', '1', 14, 1, 2, 3, '82.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(606, 'NS3453/0010/2023', '1', 14, 1, 2, 3, '50.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(607, 'NS5156/0084/2023', '1', 14, 1, 2, 3, '63.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(608, 'NS2510/0010/2023', '1', 14, 1, 2, 3, '87.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(609, 'NS0970/0015/2023', '1', 14, 1, 2, 3, '63.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(610, 'NS3834/0019/2018', '1', 14, 1, 2, 3, '85.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(611, 'NS0850/0022/2022', '1', 14, 1, 2, 3, '64.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(612, 'NS1027/0179/2023', '1', 14, 1, 2, 3, '80.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(613, 'NS4569/0030/2023', '1', 14, 1, 2, 3, '77.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(614, 'NS4740/0041/2023', '1', 14, 1, 2, 3, '54.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(615, 'NS1618/0012/2023', '1', 14, 1, 2, 3, '66.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(616, 'NS1060/0017/2023', '1', 14, 1, 2, 3, '59.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(617, 'NS5033/0020/2022', '1', 14, 1, 2, 3, '87.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(618, 'NS0722/0031/2023', '1', 14, 1, 2, 3, '49.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(619, 'NS4740/0048/2023', '1', 14, 1, 2, 3, '58.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(620, 'NS4498/0051/2020', '1', 14, 1, 2, 3, '66.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(621, 'NS0241/0039/2020', '1', 14, 1, 2, 3, '75.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(622, 'NS0414/0019/2023', '1', 14, 1, 2, 3, '89.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(623, 'NS0197/0009/2020', '1', 14, 1, 2, 3, '57.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(624, 'NS3893/0156/2023', '1', 14, 1, 2, 3, '52.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(625, 'NS0672/0057/2023', '1', 14, 1, 2, 3, '58.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(626, 'NS4816/0040/2021', '1', 14, 1, 2, 3, '82.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(627, 'NS1633/0164/2023', '1', 14, 1, 2, 3, '60.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(628, 'NS4208/0008/2022', '1', 14, 1, 2, 3, '66.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(629, 'NS3897/0105/2023', '1', 14, 1, 2, 3, '84.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(630, 'NS0526/0115/2021', '1', 14, 1, 2, 3, '73.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(631, 'NS0274/0046/2023', '1', 14, 1, 2, 3, '70.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(632, 'NS6048/0056/2023', '1', 14, 1, 2, 3, '70.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(633, 'NS4006/0030/2021', '1', 14, 1, 2, 3, '81.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(634, 'NS2505/0044/2017', '1', 14, 1, 2, 3, '64.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(635, 'NS4238/0026/2021', '1', 14, 1, 2, 3, '81.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(636, 'NS3351/0179/2023', '1', 14, 1, 2, 3, '70.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(637, 'NS4117/0256/2022', '1', 14, 1, 2, 3, '63.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(638, 'NS3321/0044/2021', '1', 14, 1, 2, 3, '53.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(639, 'NS5551/0011/2021', '1', 14, 1, 2, 3, '72.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(640, 'NS0345/0088/2023', '1', 14, 1, 2, 3, '82.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(641, 'NS4710/0030/2023', '1', 14, 1, 2, 3, '57.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(642, 'NS5822/0117/2023', '1', 14, 1, 2, 3, '80.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(643, 'NS1097/0129/2021', '1', 14, 1, 2, 3, '68.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(644, 'NS1633/0136/2021', '1', 14, 1, 2, 3, '83.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(645, 'NS0672/0094/2021', '1', 14, 1, 2, 3, '72.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(646, 'NS2521/0024/2021', '1', 14, 1, 2, 3, '83.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(647, 'NS1581/0075/2023', '1', 14, 1, 2, 3, '67.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(648, 'NS2315/0115/2021', '1', 14, 1, 2, 3, '68.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(649, 'NS2171/0052/2023', '1', 14, 1, 2, 3, '72.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(650, 'NS2424/0074/2023', '1', 14, 1, 2, 3, '48.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(651, 'NS0632/0053/2023', '1', 14, 1, 2, 3, '66.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(652, 'NS0672/0135/2023', '1', 14, 1, 2, 3, '25.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(653, 'NS5376/0082/2023', '1', 14, 1, 2, 3, '65.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(654, 'NS3228/0285/2022', '1', 14, 1, 2, 3, '65.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(655, 'NS0541/0100/2023', '1', 14, 1, 2, 3, '62.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(656, 'NS3534/0025/2023', '1', 14, 1, 2, 3, '61.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(657, 'NS5251/0066/2023', '1', 14, 1, 2, 3, '54.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(658, 'NS5298/0057/2023', '1', 14, 1, 2, 3, '52.00', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(659, 'NS4897/0091/2023', '1', 14, 1, 2, 3, '68.50', 'superadmin', '2025-04-19 19:53:43', '2025-04-19 19:53:43'),
(660, 'NS5289/0024/2023', '1', 14, 1, 2, 4, '79.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(661, 'NP1153/0013/2023', '1', 14, 1, 2, 4, '38.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(662, 'NS5357/0001/2023', '1', 14, 1, 2, 4, '68.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(663, 'NS0672/0001/2023', '1', 14, 1, 2, 4, '68.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(664, 'NS2367/0005/2023', '1', 14, 1, 2, 4, '49.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(665, 'NS0294/0005/2023', '1', 14, 1, 2, 4, '47.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(666, 'NS0916/0003/2023', '1', 14, 1, 2, 4, '47.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(667, 'NS1375/0002/2023', '1', 14, 1, 2, 4, '49.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(668, 'NS0547/0015/2023', '1', 14, 1, 2, 4, '38.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(669, 'NS0345/0172/2023', '1', 14, 1, 2, 4, '59.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(670, 'NS1394/0007/2023', '1', 14, 1, 2, 4, '41.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(671, 'NS4740/0008/2023', '1', 14, 1, 2, 4, '47.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(672, 'NEQ2022001913/2020', '1', 14, 1, 2, 4, '52.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(673, 'NS3371/0102/2023', '1', 14, 1, 2, 4, '46.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(674, 'NS3897/0088/2023', '1', 14, 1, 2, 4, '33.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(675, 'NS3757/0023/2023', '1', 14, 1, 2, 4, '33.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(676, 'NS3981/0011/2023', '1', 14, 1, 2, 4, '64.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(677, 'NS3453/0010/2023', '1', 14, 1, 2, 4, '26.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(678, 'NS5156/0084/2023', '1', 14, 1, 2, 4, '58.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(679, 'NS2510/0010/2023', '1', 14, 1, 2, 4, '70.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(680, 'NS0970/0015/2023', '1', 14, 1, 2, 4, '48.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(681, 'NS3834/0019/2018', '1', 14, 1, 2, 4, '68.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(682, 'NS0850/0022/2022', '1', 14, 1, 2, 4, '47.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(683, 'NS1027/0179/2023', '1', 14, 1, 2, 4, '76.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(684, 'NS4569/0030/2023', '1', 14, 1, 2, 4, '45.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(685, 'NS4740/0041/2023', '1', 14, 1, 2, 4, '40.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(686, 'NS1618/0012/2023', '1', 14, 1, 2, 4, '49.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(687, 'NS1060/0017/2023', '1', 14, 1, 2, 4, '50.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(688, 'NS5033/0020/2022', '1', 14, 1, 2, 4, '63.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(689, 'NS0722/0031/2023', '1', 14, 1, 2, 4, '52.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(690, 'NS4740/0048/2023', '1', 14, 1, 2, 4, '43.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(691, 'NS4498/0051/2020', '1', 14, 1, 2, 4, '44.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(692, 'NS0241/0039/2020', '1', 14, 1, 2, 4, '60.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(693, 'NS0414/0019/2023', '1', 14, 1, 2, 4, '73.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(694, 'NS0197/0009/2020', '1', 14, 1, 2, 4, '43.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(695, 'NS3893/0156/2023', '1', 14, 1, 2, 4, '38.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(696, 'NS0672/0057/2023', '1', 14, 1, 2, 4, '49.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(697, 'NS4816/0040/2021', '1', 14, 1, 2, 4, '54.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(698, 'NS1633/0164/2023', '1', 14, 1, 2, 4, '44.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(699, 'NS4208/0008/2022', '1', 14, 1, 2, 4, '29.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(700, 'NS3897/0105/2023', '1', 14, 1, 2, 4, '63.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(701, 'NS0526/0115/2021', '1', 14, 1, 2, 4, '65.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(702, 'NS0274/0046/2023', '1', 14, 1, 2, 4, '55.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(703, 'NS6048/0056/2023', '1', 14, 1, 2, 4, '67.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(704, 'NS4006/0030/2021', '1', 14, 1, 2, 4, '37.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(705, 'NS2505/0044/2017', '1', 14, 1, 2, 4, '44.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(706, 'NS4238/0026/2021', '1', 14, 1, 2, 4, '58.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(707, 'NS3351/0179/2023', '1', 14, 1, 2, 4, '53.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(708, 'NS4117/0256/2022', '1', 14, 1, 2, 4, '34.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(709, 'NS3321/0044/2021', '1', 14, 1, 2, 4, '44.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(710, 'NS5551/0011/2021', '1', 14, 1, 2, 4, '53.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(711, 'NS0345/0088/2023', '1', 14, 1, 2, 4, '54.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(712, 'NS4710/0030/2023', '1', 14, 1, 2, 4, '52.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(713, 'NS5822/0117/2023', '1', 14, 1, 2, 4, '61.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(714, 'NS1097/0129/2021', '1', 14, 1, 2, 4, '52.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(715, 'NS1633/0136/2021', '1', 14, 1, 2, 4, '66.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(716, 'NS0672/0094/2021', '1', 14, 1, 2, 4, '48.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(717, 'NS2521/0024/2021', '1', 14, 1, 2, 4, '75.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(718, 'NS1581/0075/2023', '1', 14, 1, 2, 4, '44.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(719, 'NS2315/0115/2021', '1', 14, 1, 2, 4, '46.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(720, 'NS2171/0052/2023', '1', 14, 1, 2, 4, '62.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(721, 'NS2424/0074/2023', '1', 14, 1, 2, 4, '46.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(722, 'NS0632/0053/2023', '1', 14, 1, 2, 4, '31.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(723, 'NS0672/0135/2023', '1', 14, 1, 2, 4, '77.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(724, 'NS5376/0082/2023', '1', 14, 1, 2, 4, '35.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(725, 'NS3228/0285/2022', '1', 14, 1, 2, 4, '35.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(726, 'NS0541/0100/2023', '1', 14, 1, 2, 4, '57.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(727, 'NS3534/0025/2023', '1', 14, 1, 2, 4, '48.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(728, 'NS5251/0066/2023', '1', 14, 1, 2, 4, '48.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(729, 'NS5298/0057/2023', '1', 14, 1, 2, 4, '38.00', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(730, 'NS4897/0091/2023', '1', 14, 1, 2, 4, '51.50', 'superadmin', '2025-04-19 19:54:16', '2025-04-19 19:54:16'),
(731, 'NS5289/0024/2023', '1', 14, 1, 2, 6, '86.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(732, 'NP1153/0013/2023', '1', 14, 1, 2, 6, '51.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(733, 'NS5357/0001/2023', '1', 14, 1, 2, 6, '92.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(734, 'NS0672/0001/2023', '1', 14, 1, 2, 6, '91.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(735, 'NS2367/0005/2023', '1', 14, 1, 2, 6, '88.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(736, 'NS0294/0005/2023', '1', 14, 1, 2, 6, '80.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(737, 'NS0916/0003/2023', '1', 14, 1, 2, 6, '70.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(738, 'NS1375/0002/2023', '1', 14, 1, 2, 6, '81.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(739, 'NS0547/0015/2023', '1', 14, 1, 2, 6, '69.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(740, 'NS0345/0172/2023', '1', 14, 1, 2, 6, '86.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(741, 'NS1394/0007/2023', '1', 14, 1, 2, 6, '50.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(742, 'NS4740/0008/2023', '1', 14, 1, 2, 6, '70.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(743, 'NEQ2022001913/2020', '1', 14, 1, 2, 6, '60.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(744, 'NS3371/0102/2023', '1', 14, 1, 2, 6, '62.00', 'superadmin', '2025-04-19 19:55:44', '2025-04-19 19:55:44'),
(745, 'NS3897/0088/2023', '1', 14, 1, 2, 6, '83.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(746, 'NS3757/0023/2023', '1', 14, 1, 2, 6, '71.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(747, 'NS3981/0011/2023', '1', 14, 1, 2, 6, '81.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(748, 'NS3453/0010/2023', '1', 14, 1, 2, 6, '55.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(749, 'NS5156/0084/2023', '1', 14, 1, 2, 6, '71.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(750, 'NS2510/0010/2023', '1', 14, 1, 2, 6, '91.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(751, 'NS0970/0015/2023', '1', 14, 1, 2, 6, '62.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(752, 'NS3834/0019/2018', '1', 14, 1, 2, 6, '88.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(753, 'NS0850/0022/2022', '1', 14, 1, 2, 6, '74.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(754, 'NS1027/0179/2023', '1', 14, 1, 2, 6, '65.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(755, 'NS4569/0030/2023', '1', 14, 1, 2, 6, '72.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(756, 'NS4740/0041/2023', '1', 14, 1, 2, 6, '52.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(757, 'NS1618/0012/2023', '1', 14, 1, 2, 6, '63.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(758, 'NS1060/0017/2023', '1', 14, 1, 2, 6, '71.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(759, 'NS5033/0020/2022', '1', 14, 1, 2, 6, '88.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(760, 'NS0722/0031/2023', '1', 14, 1, 2, 6, '54.00', 'superadmin', '2025-04-19 19:55:45', '2025-04-19 19:55:45'),
(761, 'NS4740/0048/2023', '1', 14, 1, 2, 6, '50.00', 'superadmin', '2025-04-19 19:55:46', '2025-04-19 19:55:46'),
(762, 'NS4498/0051/2020', '1', 14, 1, 2, 6, '62.00', 'superadmin', '2025-04-19 19:55:46', '2025-04-19 19:55:46'),
(763, 'NS0241/0039/2020', '1', 14, 1, 2, 6, '84.00', 'superadmin', '2025-04-19 19:55:46', '2025-04-19 19:55:46'),
(764, 'NS0414/0019/2023', '1', 14, 1, 2, 6, '89.00', 'superadmin', '2025-04-19 19:55:46', '2025-04-19 19:55:46'),
(765, 'NS0197/0009/2020', '1', 14, 1, 2, 6, '86.00', 'superadmin', '2025-04-19 19:55:46', '2025-04-19 19:55:46'),
(766, 'NS3893/0156/2023', '1', 14, 1, 2, 6, '64.00', 'superadmin', '2025-04-19 19:55:46', '2025-04-19 19:55:46'),
(767, 'NS0672/0057/2023', '1', 14, 1, 2, 6, '79.00', 'superadmin', '2025-04-19 19:55:46', '2025-04-19 19:55:46'),
(768, 'NS4816/0040/2021', '1', 14, 1, 2, 6, '80.00', 'superadmin', '2025-04-19 19:55:46', '2025-04-19 19:55:46'),
(769, 'NS1633/0164/2023', '1', 14, 1, 2, 6, '65.00', 'superadmin', '2025-04-19 19:55:46', '2025-04-19 19:55:46'),
(770, 'NS4208/0008/2022', '1', 14, 1, 2, 6, '62.00', 'superadmin', '2025-04-19 19:55:46', '2025-04-19 19:55:46'),
(771, 'NS3897/0105/2023', '1', 14, 1, 2, 6, '90.00', 'superadmin', '2025-04-19 19:55:46', '2025-04-19 19:55:46'),
(772, 'NS0526/0115/2021', '1', 14, 1, 2, 6, '93.00', 'superadmin', '2025-04-19 19:55:47', '2025-04-19 19:55:47'),
(773, 'NS0274/0046/2023', '1', 14, 1, 2, 6, '93.00', 'superadmin', '2025-04-19 19:55:47', '2025-04-19 19:55:47'),
(774, 'NS6048/0056/2023', '1', 14, 1, 2, 6, '67.00', 'superadmin', '2025-04-19 19:55:47', '2025-04-19 19:55:47'),
(775, 'NS4006/0030/2021', '1', 14, 1, 2, 6, '88.00', 'superadmin', '2025-04-19 19:55:47', '2025-04-19 19:55:47'),
(776, 'NS2505/0044/2017', '1', 14, 1, 2, 6, '65.00', 'superadmin', '2025-04-19 19:55:47', '2025-04-19 19:55:47'),
(777, 'NS4238/0026/2021', '1', 14, 1, 2, 6, '71.00', 'superadmin', '2025-04-19 19:55:47', '2025-04-19 19:55:47'),
(778, 'NS3351/0179/2023', '1', 14, 1, 2, 6, '84.00', 'superadmin', '2025-04-19 19:55:47', '2025-04-19 19:55:47'),
(779, 'NS4117/0256/2022', '1', 14, 1, 2, 6, '51.00', 'superadmin', '2025-04-19 19:55:47', '2025-04-19 19:55:47'),
(780, 'NS3321/0044/2021', '1', 14, 1, 2, 6, '70.00', 'superadmin', '2025-04-19 19:55:47', '2025-04-19 19:55:47'),
(781, 'NS5551/0011/2021', '1', 14, 1, 2, 6, '92.00', 'superadmin', '2025-04-19 19:55:47', '2025-04-19 19:55:47'),
(782, 'NS0345/0088/2023', '1', 14, 1, 2, 6, '80.00', 'superadmin', '2025-04-19 19:55:47', '2025-04-19 19:55:47'),
(783, 'NS4710/0030/2023', '1', 14, 1, 2, 6, '61.00', 'superadmin', '2025-04-19 19:55:48', '2025-04-19 19:55:48'),
(784, 'NS5822/0117/2023', '1', 14, 1, 2, 6, '95.00', 'superadmin', '2025-04-19 19:55:48', '2025-04-19 19:55:48'),
(785, 'NS1097/0129/2021', '1', 14, 1, 2, 6, '76.00', 'superadmin', '2025-04-19 19:55:48', '2025-04-19 19:55:48'),
(786, 'NS1633/0136/2021', '1', 14, 1, 2, 6, '94.00', 'superadmin', '2025-04-19 19:55:48', '2025-04-19 19:55:48'),
(787, 'NS0672/0094/2021', '1', 14, 1, 2, 6, '97.00', 'superadmin', '2025-04-19 19:55:48', '2025-04-19 19:55:48'),
(788, 'NS2521/0024/2021', '1', 14, 1, 2, 6, '91.00', 'superadmin', '2025-04-19 19:55:48', '2025-04-19 19:55:48'),
(789, 'NS1581/0075/2023', '1', 14, 1, 2, 6, '87.00', 'superadmin', '2025-04-19 19:55:48', '2025-04-19 19:55:48'),
(790, 'NS2315/0115/2021', '1', 14, 1, 2, 6, '89.00', 'superadmin', '2025-04-19 19:55:48', '2025-04-19 19:55:48'),
(791, 'NS2171/0052/2023', '1', 14, 1, 2, 6, '82.00', 'superadmin', '2025-04-19 19:55:49', '2025-04-19 19:55:49'),
(792, 'NS2424/0074/2023', '1', 14, 1, 2, 6, '50.00', 'superadmin', '2025-04-19 19:55:49', '2025-04-19 19:55:49'),
(793, 'NS0632/0053/2023', '1', 14, 1, 2, 6, '56.00', 'superadmin', '2025-04-19 19:55:49', '2025-04-19 19:55:49'),
(794, 'NS0672/0135/2023', '1', 14, 1, 2, 6, '72.00', 'superadmin', '2025-04-19 19:55:49', '2025-04-19 19:55:49'),
(795, 'NS5376/0082/2023', '1', 14, 1, 2, 6, '78.00', 'superadmin', '2025-04-19 19:55:49', '2025-04-19 19:55:49'),
(796, 'NS3228/0285/2022', '1', 14, 1, 2, 6, '61.00', 'superadmin', '2025-04-19 19:55:49', '2025-04-19 19:55:49'),
(797, 'NS0541/0100/2023', '1', 14, 1, 2, 6, '88.00', 'superadmin', '2025-04-19 19:55:49', '2025-04-19 19:55:49'),
(798, 'NS3534/0025/2023', '1', 14, 1, 2, 6, '86.00', 'superadmin', '2025-04-19 19:55:49', '2025-04-19 19:55:49'),
(799, 'NS5251/0066/2023', '1', 14, 1, 2, 6, '56.00', 'superadmin', '2025-04-19 19:55:50', '2025-04-19 19:55:50'),
(800, 'NS5298/0057/2023', '1', 14, 1, 2, 6, '59.00', 'superadmin', '2025-04-19 19:55:50', '2025-04-19 19:55:50'),
(801, 'NS4897/0091/2023', '1', 14, 1, 2, 6, '96.00', 'superadmin', '2025-04-19 19:55:50', '2025-04-19 19:55:50'),
(802, 'NS5289/0024/2023', '1', 14, 1, 2, 5, '92.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(803, 'NP1153/0013/2023', '1', 14, 1, 2, 5, '94.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(804, 'NS5357/0001/2023', '1', 14, 1, 2, 5, '82.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(805, 'NS0672/0001/2023', '1', 14, 1, 2, 5, '81.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(806, 'NS2367/0005/2023', '1', 14, 1, 2, 5, '82.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(807, 'NS0294/0005/2023', '1', 14, 1, 2, 5, '94.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(808, 'NS0916/0003/2023', '1', 14, 1, 2, 5, '86.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(809, 'NS1375/0002/2023', '1', 14, 1, 2, 5, '76.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(810, 'NS0547/0015/2023', '1', 14, 1, 2, 5, '86.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(811, 'NS0345/0172/2023', '1', 14, 1, 2, 5, '71.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(812, 'NS1394/0007/2023', '1', 14, 1, 2, 5, '94.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(813, 'NS4740/0008/2023', '1', 14, 1, 2, 5, '97.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(814, 'NEQ2022001913/2020', '1', 14, 1, 2, 5, '85.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(815, 'NS3371/0102/2023', '1', 14, 1, 2, 5, '90.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(816, 'NS3897/0088/2023', '1', 14, 1, 2, 5, '91.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(817, 'NS3757/0023/2023', '1', 14, 1, 2, 5, '89.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(818, 'NS3981/0011/2023', '1', 14, 1, 2, 5, '69.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(819, 'NS3453/0010/2023', '1', 14, 1, 2, 5, '89.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(820, 'NS5156/0084/2023', '1', 14, 1, 2, 5, '93.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(821, 'NS2510/0010/2023', '1', 14, 1, 2, 5, '94.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(822, 'NS0970/0015/2023', '1', 14, 1, 2, 5, '92.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(823, 'NS3834/0019/2018', '1', 14, 1, 2, 5, '96.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(824, 'NS0850/0022/2022', '1', 14, 1, 2, 5, '86.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(825, 'NS1027/0179/2023', '1', 14, 1, 2, 5, '93.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(826, 'NS4569/0030/2023', '1', 14, 1, 2, 5, '94.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(827, 'NS4740/0041/2023', '1', 14, 1, 2, 5, '80.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(828, 'NS1618/0012/2023', '1', 14, 1, 2, 5, '79.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(829, 'NS1060/0017/2023', '1', 14, 1, 2, 5, '91.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(830, 'NS5033/0020/2022', '1', 14, 1, 2, 5, '93.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(831, 'NS0722/0031/2023', '1', 14, 1, 2, 5, '91.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(832, 'NS4740/0048/2023', '1', 14, 1, 2, 5, '82.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(833, 'NS4498/0051/2020', '1', 14, 1, 2, 5, '95.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(834, 'NS0241/0039/2020', '1', 14, 1, 2, 5, '90.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(835, 'NS0414/0019/2023', '1', 14, 1, 2, 5, '95.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(836, 'NS0197/0009/2020', '1', 14, 1, 2, 5, '83.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(837, 'NS3893/0156/2023', '1', 14, 1, 2, 5, '81.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(838, 'NS0672/0057/2023', '1', 14, 1, 2, 5, '91.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(839, 'NS4816/0040/2021', '1', 14, 1, 2, 5, '92.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(840, 'NS1633/0164/2023', '1', 14, 1, 2, 5, '88.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(841, 'NS4208/0008/2022', '1', 14, 1, 2, 5, '81.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(842, 'NS3897/0105/2023', '1', 14, 1, 2, 5, '92.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(843, 'NS0526/0115/2021', '1', 14, 1, 2, 5, '85.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(844, 'NS0274/0046/2023', '1', 14, 1, 2, 5, '94.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(845, 'NS6048/0056/2023', '1', 14, 1, 2, 5, '81.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(846, 'NS4006/0030/2021', '1', 14, 1, 2, 5, '92.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(847, 'NS2505/0044/2017', '1', 14, 1, 2, 5, '86.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(848, 'NS4238/0026/2021', '1', 14, 1, 2, 5, '86.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(849, 'NS3351/0179/2023', '1', 14, 1, 2, 5, '88.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(850, 'NS4117/0256/2022', '1', 14, 1, 2, 5, '76.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(851, 'NS3321/0044/2021', '1', 14, 1, 2, 5, '86.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(852, 'NS5551/0011/2021', '1', 14, 1, 2, 5, '88.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(853, 'NS0345/0088/2023', '1', 14, 1, 2, 5, '94.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(854, 'NS4710/0030/2023', '1', 14, 1, 2, 5, '91.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(855, 'NS5822/0117/2023', '1', 14, 1, 2, 5, '87.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(856, 'NS1097/0129/2021', '1', 14, 1, 2, 5, '96.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(857, 'NS1633/0136/2021', '1', 14, 1, 2, 5, '88.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(858, 'NS0672/0094/2021', '1', 14, 1, 2, 5, '91.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(859, 'NS2521/0024/2021', '1', 14, 1, 2, 5, '90.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(860, 'NS1581/0075/2023', '1', 14, 1, 2, 5, '90.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(861, 'NS2315/0115/2021', '1', 14, 1, 2, 5, '88.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(862, 'NS2171/0052/2023', '1', 14, 1, 2, 5, '94.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(863, 'NS2424/0074/2023', '1', 14, 1, 2, 5, '83.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(864, 'NS0632/0053/2023', '1', 14, 1, 2, 5, '85.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(865, 'NS0672/0135/2023', '1', 14, 1, 2, 5, '80.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(866, 'NS5376/0082/2023', '1', 14, 1, 2, 5, '86.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(867, 'NS3228/0285/2022', '1', 14, 1, 2, 5, '79.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(868, 'NS0541/0100/2023', '1', 14, 1, 2, 5, '84.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(869, 'NS3534/0025/2023', '1', 14, 1, 2, 5, '89.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(870, 'NS5251/0066/2023', '1', 14, 1, 2, 5, '89.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(871, 'NS5298/0057/2023', '1', 14, 1, 2, 5, '73.50', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(872, 'NS4897/0091/2023', '1', 14, 1, 2, 5, '93.00', 'superadmin', '2025-04-19 19:58:08', '2025-04-19 19:58:08'),
(873, 'NS5289/0024/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:58:57', '2025-04-19 19:58:57'),
(874, 'NP1153/0013/2023', '1', 14, 1, 2, 7, '92.00', 'superadmin', '2025-04-19 19:58:58', '2025-04-19 19:58:58'),
(875, 'NS5357/0001/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:58:58', '2025-04-19 19:58:58'),
(876, 'NS0672/0001/2023', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:58:58', '2025-04-19 19:58:58'),
(877, 'NS2367/0005/2023', '1', 14, 1, 2, 7, '88.00', 'superadmin', '2025-04-19 19:58:58', '2025-04-19 19:58:58'),
(878, 'NS0294/0005/2023', '1', 14, 1, 2, 7, '94.00', 'superadmin', '2025-04-19 19:58:58', '2025-04-19 19:58:58'),
(879, 'NS0916/0003/2023', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:58:58', '2025-04-19 19:58:58'),
(880, 'NS1375/0002/2023', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:58:58', '2025-04-19 19:58:58'),
(881, 'NS0547/0015/2023', '1', 14, 1, 2, 7, '92.00', 'superadmin', '2025-04-19 19:58:59', '2025-04-19 19:58:59'),
(882, 'NS0345/0172/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:58:59', '2025-04-19 19:58:59'),
(883, 'NS1394/0007/2023', '1', 14, 1, 2, 7, '94.00', 'superadmin', '2025-04-19 19:58:59', '2025-04-19 19:58:59'),
(884, 'NS4740/0008/2023', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:58:59', '2025-04-19 19:58:59'),
(885, 'NEQ2022001913/2020', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:58:59', '2025-04-19 19:58:59'),
(886, 'NS3371/0102/2023', '1', 14, 1, 2, 7, '94.00', 'superadmin', '2025-04-19 19:58:59', '2025-04-19 19:58:59'),
(887, 'NS3897/0088/2023', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:58:59', '2025-04-19 19:58:59'),
(888, 'NS3757/0023/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:00', '2025-04-19 19:59:00'),
(889, 'NS3981/0011/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:00', '2025-04-19 19:59:00'),
(890, 'NS3453/0010/2023', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:59:00', '2025-04-19 19:59:00'),
(891, 'NS5156/0084/2023', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:59:00', '2025-04-19 19:59:00'),
(892, 'NS2510/0010/2023', '1', 14, 1, 2, 7, '90.00', 'superadmin', '2025-04-19 19:59:00', '2025-04-19 19:59:00'),
(893, 'NS0970/0015/2023', '1', 14, 1, 2, 7, '94.00', 'superadmin', '2025-04-19 19:59:00', '2025-04-19 19:59:00'),
(894, 'NS3834/0019/2018', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:00', '2025-04-19 19:59:00'),
(895, 'NS0850/0022/2022', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:59:01', '2025-04-19 19:59:01'),
(896, 'NS1027/0179/2023', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:59:01', '2025-04-19 19:59:01'),
(897, 'NS4569/0030/2023', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:59:01', '2025-04-19 19:59:01'),
(898, 'NS4740/0041/2023', '1', 14, 1, 2, 7, '74.00', 'superadmin', '2025-04-19 19:59:01', '2025-04-19 19:59:01'),
(899, 'NS1618/0012/2023', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:59:01', '2025-04-19 19:59:01'),
(900, 'NS1060/0017/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:01', '2025-04-19 19:59:01'),
(901, 'NS5033/0020/2022', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:59:01', '2025-04-19 19:59:01'),
(902, 'NS0722/0031/2023', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:59:02', '2025-04-19 19:59:02'),
(903, 'NS4740/0048/2023', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:59:02', '2025-04-19 19:59:02'),
(904, 'NS4498/0051/2020', '1', 14, 1, 2, 7, '92.00', 'superadmin', '2025-04-19 19:59:02', '2025-04-19 19:59:02'),
(905, 'NS0241/0039/2020', '1', 14, 1, 2, 7, '74.00', 'superadmin', '2025-04-19 19:59:02', '2025-04-19 19:59:02'),
(906, 'NS0414/0019/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:02', '2025-04-19 19:59:02'),
(907, 'NS0197/0009/2020', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:59:02', '2025-04-19 19:59:02'),
(908, 'NS3893/0156/2023', '1', 14, 1, 2, 7, '94.00', 'superadmin', '2025-04-19 19:59:02', '2025-04-19 19:59:02'),
(909, 'NS0672/0057/2023', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:59:03', '2025-04-19 19:59:03'),
(910, 'NS4816/0040/2021', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:59:03', '2025-04-19 19:59:03'),
(911, 'NS1633/0164/2023', '1', 14, 1, 2, 7, '74.00', 'superadmin', '2025-04-19 19:59:03', '2025-04-19 19:59:03'),
(912, 'NS4208/0008/2022', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:59:03', '2025-04-19 19:59:03'),
(913, 'NS3897/0105/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:03', '2025-04-19 19:59:03'),
(914, 'NS0526/0115/2021', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:59:03', '2025-04-19 19:59:03'),
(915, 'NS0274/0046/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:03', '2025-04-19 19:59:03'),
(916, 'NS6048/0056/2023', '1', 14, 1, 2, 7, '92.00', 'superadmin', '2025-04-19 19:59:03', '2025-04-19 19:59:03'),
(917, 'NS4006/0030/2021', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:04', '2025-04-19 19:59:04'),
(918, 'NS2505/0044/2017', '1', 14, 1, 2, 7, '84.00', 'superadmin', '2025-04-19 19:59:04', '2025-04-19 19:59:04'),
(919, 'NS4238/0026/2021', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:59:04', '2025-04-19 19:59:04'),
(920, 'NS3351/0179/2023', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:59:04', '2025-04-19 19:59:04'),
(921, 'NS4117/0256/2022', '1', 14, 1, 2, 7, '80.00', 'superadmin', '2025-04-19 19:59:04', '2025-04-19 19:59:04'),
(922, 'NS3321/0044/2021', '1', 14, 1, 2, 7, '75.00', 'superadmin', '2025-04-19 19:59:04', '2025-04-19 19:59:04'),
(923, 'NS5551/0011/2021', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:04', '2025-04-19 19:59:04'),
(924, 'NS0345/0088/2023', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:59:04', '2025-04-19 19:59:04'),
(925, 'NS4710/0030/2023', '1', 14, 1, 2, 7, '90.00', 'superadmin', '2025-04-19 19:59:05', '2025-04-19 19:59:05'),
(926, 'NS5822/0117/2023', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:59:05', '2025-04-19 19:59:05'),
(927, 'NS1097/0129/2021', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:05', '2025-04-19 19:59:05'),
(928, 'NS1633/0136/2021', '1', 14, 1, 2, 7, '96.00', 'superadmin', '2025-04-19 19:59:05', '2025-04-19 19:59:05'),
(929, 'NS0672/0094/2021', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:59:05', '2025-04-19 19:59:05'),
(930, 'NS2521/0024/2021', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:05', '2025-04-19 19:59:05'),
(931, 'NS1581/0075/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:05', '2025-04-19 19:59:05'),
(932, 'NS2315/0115/2021', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:06', '2025-04-19 19:59:06'),
(933, 'NS2171/0052/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:06', '2025-04-19 19:59:06'),
(934, 'NS2424/0074/2023', '1', 14, 1, 2, 7, '94.00', 'superadmin', '2025-04-19 19:59:06', '2025-04-19 19:59:06'),
(935, 'NS0632/0053/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:06', '2025-04-19 19:59:06'),
(936, 'NS0672/0135/2023', '1', 14, 1, 2, 7, '78.00', 'superadmin', '2025-04-19 19:59:06', '2025-04-19 19:59:06'),
(937, 'NS5376/0082/2023', '1', 14, 1, 2, 7, '92.00', 'superadmin', '2025-04-19 19:59:06', '2025-04-19 19:59:06'),
(938, 'NS3228/0285/2022', '1', 14, 1, 2, 7, '94.00', 'superadmin', '2025-04-19 19:59:06', '2025-04-19 19:59:06'),
(939, 'NS0541/0100/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:06', '2025-04-19 19:59:06'),
(940, 'NS3534/0025/2023', '1', 14, 1, 2, 7, '100.00', 'superadmin', '2025-04-19 19:59:07', '2025-04-19 19:59:07'),
(941, 'NS5251/0066/2023', '1', 14, 1, 2, 7, '90.00', 'superadmin', '2025-04-19 19:59:07', '2025-04-19 19:59:07'),
(942, 'NS5298/0057/2023', '1', 14, 1, 2, 7, '98.00', 'superadmin', '2025-04-19 19:59:07', '2025-04-19 19:59:07'),
(943, 'NS4897/0091/2023', '1', 14, 1, 2, 7, '94.00', 'superadmin', '2025-04-19 19:59:07', '2025-04-19 19:59:07'),
(944, 'NS0772/0099/2020', '1', 14, 1, 3, 1, '85.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(945, 'NS5289/0024/2023', '1', 14, 1, 3, 1, '95.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(946, 'NP1153/0013/2023', '1', 14, 1, 3, 1, '40.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(947, 'NS5357/0001/2023', '1', 14, 1, 3, 1, '85.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(948, 'NS0672/0001/2023', '1', 14, 1, 3, 1, '60.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(949, 'NS2367/0005/2023', '1', 14, 1, 3, 1, '60.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(950, 'NS0294/0005/2023', '1', 14, 1, 3, 1, '70.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(951, 'NS0916/0003/2023', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(952, 'NS1375/0002/2023', '1', 14, 1, 3, 1, '45.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(953, 'NS0547/0015/2023', '1', 14, 1, 3, 1, '50.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(954, 'NS0345/0172/2023', '1', 14, 1, 3, 1, '70.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(955, 'NS1394/0007/2023', '1', 14, 1, 3, 1, '25.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(956, 'NS4740/0008/2023', '1', 14, 1, 3, 1, '85.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(957, 'NEQ2022001913/2020', '1', 14, 1, 3, 1, '30.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(958, 'NS3371/0102/2023', '1', 14, 1, 3, 1, '95.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(959, 'NS3897/0088/2023', '1', 14, 1, 3, 1, '40.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(960, 'NS3757/0023/2023', '1', 14, 1, 3, 1, '10.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(961, 'NS3981/0011/2023', '1', 14, 1, 3, 1, '90.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(962, 'NS3453/0010/2023', '1', 14, 1, 3, 1, '25.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(963, 'NS5156/0084/2023', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(964, 'NS2510/0010/2023', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(965, 'NS0970/0015/2023', '1', 14, 1, 3, 1, '55.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(966, 'NS3834/0019/2018', '1', 14, 1, 3, 1, '55.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(967, 'NS0850/0022/2022', '1', 14, 1, 3, 1, '60.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(968, 'NS1027/0179/2023', '1', 14, 1, 3, 1, '70.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04');
INSERT INTO `exam_category_results` (`id`, `reg_no`, `year_of_study`, `year_id`, `semester_id`, `course_id`, `exam_category_id`, `exam_score`, `uploadedby`, `created_at`, `updated_at`) VALUES
(969, 'NS4569/0030/2023', '1', 14, 1, 3, 1, '85.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(970, 'NS4740/0041/2023', '1', 14, 1, 3, 1, '60.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(971, 'NS1618/0012/2023', '1', 14, 1, 3, 1, '20.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(972, 'NS1060/0017/2023', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(973, 'NS5033/0020/2022', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(974, 'NS0722/0031/2023', '1', 14, 1, 3, 1, '65.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(975, 'NS4740/0048/2023', '1', 14, 1, 3, 1, '45.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(976, 'NS4498/0051/2020', '1', 14, 1, 3, 1, '50.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(977, 'NS0241/0039/2020', '1', 14, 1, 3, 1, '40.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(978, 'NS0414/0019/2023', '1', 14, 1, 3, 1, '90.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(979, 'NS0197/0009/2020', '1', 14, 1, 3, 1, '60.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(980, 'NS3893/0156/2023', '1', 14, 1, 3, 1, '70.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(981, 'NS0672/0057/2023', '1', 14, 1, 3, 1, '75.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(982, 'NS4816/0040/2021', '1', 14, 1, 3, 1, '85.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(983, 'NS1633/0164/2023', '1', 14, 1, 3, 1, '75.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(984, 'NS4208/0008/2022', '1', 14, 1, 3, 1, '100.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(985, 'NS3897/0105/2023', '1', 14, 1, 3, 1, '90.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(986, 'NS0526/0115/2021', '1', 14, 1, 3, 1, '90.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(987, 'NS0274/0046/2023', '1', 14, 1, 3, 1, '60.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(988, 'NS6048/0056/2023', '1', 14, 1, 3, 1, '50.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(989, 'NS4006/0030/2021', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(990, 'NS2505/0044/2017', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(991, 'NS4238/0026/2021', '1', 14, 1, 3, 1, '95.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(992, 'NS3351/0179/2023', '1', 14, 1, 3, 1, '90.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(993, 'NS4117/0256/2022', '1', 14, 1, 3, 1, '10.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(994, 'NS3321/0044/2021', '1', 14, 1, 3, 1, '30.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(995, 'NS5551/0011/2021', '1', 14, 1, 3, 1, '90.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(996, 'NS0345/0088/2023', '1', 14, 1, 3, 1, '85.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(997, 'NS4710/0030/2023', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(998, 'NS5822/0117/2023', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(999, 'NS1097/0129/2021', '1', 14, 1, 3, 1, '90.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1000, 'NS1633/0136/2021', '1', 14, 1, 3, 1, '95.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1001, 'NS0672/0094/2021', '1', 14, 1, 3, 1, '75.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1002, 'NS2521/0024/2021', '1', 14, 1, 3, 1, '85.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1003, 'NS1581/0075/2023', '1', 14, 1, 3, 1, '85.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1004, 'NS2315/0115/2021', '1', 14, 1, 3, 1, '100.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1005, 'NS2171/0052/2023', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1006, 'NS2424/0074/2023', '1', 14, 1, 3, 1, '45.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1007, 'NS0632/0053/2023', '1', 14, 1, 3, 1, '5.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1008, 'NS0672/0135/2023', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1009, 'NS5376/0082/2023', '1', 14, 1, 3, 1, '20.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1010, 'NS3228/0285/2022', '1', 14, 1, 3, 1, '45.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1011, 'NS0541/0100/2023', '1', 14, 1, 3, 1, '90.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1012, 'NS3534/0025/2023', '1', 14, 1, 3, 1, '80.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1013, 'NS5251/0066/2023', '1', 14, 1, 3, 1, '30.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1014, 'NS5298/0057/2023', '1', 14, 1, 3, 1, '30.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1015, 'NS4897/0091/2023', '1', 14, 1, 3, 1, '40.00', 'superadmin', '2025-04-19 20:10:04', '2025-04-19 20:10:04'),
(1016, 'NS0772/0099/2020', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1017, 'NS5289/0024/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1018, 'NP1153/0013/2023', '1', 14, 1, 3, 2, '50.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1019, 'NS5357/0001/2023', '1', 14, 1, 3, 2, '70.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1020, 'NS0672/0001/2023', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1021, 'NS2367/0005/2023', '1', 14, 1, 3, 2, '60.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1022, 'NS0294/0005/2023', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1023, 'NS0916/0003/2023', '1', 14, 1, 3, 2, '75.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1024, 'NS1375/0002/2023', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1025, 'NS0547/0015/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1026, 'NS0345/0172/2023', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1027, 'NS1394/0007/2023', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1028, 'NS4740/0008/2023', '1', 14, 1, 3, 2, '85.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1029, 'NEQ2022001913/2020', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1030, 'NS3371/0102/2023', '1', 14, 1, 3, 2, '55.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1031, 'NS3897/0088/2023', '1', 14, 1, 3, 2, '60.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1032, 'NS3757/0023/2023', '1', 14, 1, 3, 2, '70.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1033, 'NS3981/0011/2023', '1', 14, 1, 3, 2, '60.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1034, 'NS3453/0010/2023', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1035, 'NS5156/0084/2023', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1036, 'NS2510/0010/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1037, 'NS0970/0015/2023', '1', 14, 1, 3, 2, '85.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1038, 'NS3834/0019/2018', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1039, 'NS0850/0022/2022', '1', 14, 1, 3, 2, '85.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1040, 'NS1027/0179/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1041, 'NS4569/0030/2023', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1042, 'NS4740/0041/2023', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1043, 'NS1618/0012/2023', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1044, 'NS1060/0017/2023', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1045, 'NS5033/0020/2022', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1046, 'NS0722/0031/2023', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1047, 'NS4740/0048/2023', '1', 14, 1, 3, 2, '85.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1048, 'NS4498/0051/2020', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1049, 'NS0241/0039/2020', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1050, 'NS0414/0019/2023', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1051, 'NS0197/0009/2020', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1052, 'NS3893/0156/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1053, 'NS0672/0057/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1054, 'NS4816/0040/2021', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1055, 'NS1633/0164/2023', '1', 14, 1, 3, 2, '85.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1056, 'NS4208/0008/2022', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1057, 'NS3897/0105/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1058, 'NS0526/0115/2021', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1059, 'NS0274/0046/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1060, 'NS6048/0056/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1061, 'NS4006/0030/2021', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1062, 'NS2505/0044/2017', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1063, 'NS4238/0026/2021', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1064, 'NS3351/0179/2023', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1065, 'NS4117/0256/2022', '1', 14, 1, 3, 2, '85.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1066, 'NS3321/0044/2021', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1067, 'NS5551/0011/2021', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1068, 'NS0345/0088/2023', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1069, 'NS4710/0030/2023', '1', 14, 1, 3, 2, '55.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1070, 'NS5822/0117/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1071, 'NS1097/0129/2021', '1', 14, 1, 3, 2, '85.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1072, 'NS1633/0136/2021', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1073, 'NS0672/0094/2021', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1074, 'NS2521/0024/2021', '1', 14, 1, 3, 2, '95.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1075, 'NS1581/0075/2023', '1', 14, 1, 3, 2, '100.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1076, 'NS2315/0115/2021', '1', 14, 1, 3, 2, '85.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1077, 'NS2171/0052/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1078, 'NS2424/0074/2023', '1', 14, 1, 3, 2, '75.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1079, 'NS0632/0053/2023', '1', 14, 1, 3, 2, '75.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1080, 'NS0672/0135/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1081, 'NS5376/0082/2023', '1', 14, 1, 3, 2, '65.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1082, 'NS3228/0285/2022', '1', 14, 1, 3, 2, '60.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1083, 'NS0541/0100/2023', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1084, 'NS3534/0025/2023', '1', 14, 1, 3, 2, '90.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1085, 'NS5251/0066/2023', '1', 14, 1, 3, 2, '80.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1086, 'NS5298/0057/2023', '1', 14, 1, 3, 2, '35.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1087, 'NS4897/0091/2023', '1', 14, 1, 3, 2, '65.00', 'superadmin', '2025-04-19 20:10:43', '2025-04-19 20:10:43'),
(1088, 'NS0772/0099/2020', '1', 14, 1, 3, 3, '76.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1089, 'NS5289/0024/2023', '1', 14, 1, 3, 3, '75.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1090, 'NP1153/0013/2023', '1', 14, 1, 3, 3, '57.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1091, 'NS5357/0001/2023', '1', 14, 1, 3, 3, '60.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1092, 'NS0672/0001/2023', '1', 14, 1, 3, 3, '63.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1093, 'NS2367/0005/2023', '1', 14, 1, 3, 3, '48.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1094, 'NS0294/0005/2023', '1', 14, 1, 3, 3, '61.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1095, 'NS0916/0003/2023', '1', 14, 1, 3, 3, '57.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1096, 'NS1375/0002/2023', '1', 14, 1, 3, 3, '47.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1097, 'NS0547/0015/2023', '1', 14, 1, 3, 3, '54.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1098, 'NS0345/0172/2023', '1', 14, 1, 3, 3, '61.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1099, 'NS1394/0007/2023', '1', 14, 1, 3, 3, '50.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1100, 'NS4740/0008/2023', '1', 14, 1, 3, 3, '51.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1101, 'NEQ2022001913/2020', '1', 14, 1, 3, 3, '50.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1102, 'NS3371/0102/2023', '1', 14, 1, 3, 3, '47.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1103, 'NS3897/0088/2023', '1', 14, 1, 3, 3, '51.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1104, 'NS3757/0023/2023', '1', 14, 1, 3, 3, '46.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1105, 'NS3981/0011/2023', '1', 14, 1, 3, 3, '72.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1106, 'NS3453/0010/2023', '1', 14, 1, 3, 3, '48.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1107, 'NS5156/0084/2023', '1', 14, 1, 3, 3, '54.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1108, 'NS2510/0010/2023', '1', 14, 1, 3, 3, '72.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1109, 'NS0970/0015/2023', '1', 14, 1, 3, 3, '54.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1110, 'NS3834/0019/2018', '1', 14, 1, 3, 3, '78.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1111, 'NS0850/0022/2022', '1', 14, 1, 3, 3, '53.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1112, 'NS1027/0179/2023', '1', 14, 1, 3, 3, '78.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1113, 'NS4569/0030/2023', '1', 14, 1, 3, 3, '72.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1114, 'NS4740/0041/2023', '1', 14, 1, 3, 3, '40.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1115, 'NS1618/0012/2023', '1', 14, 1, 3, 3, '50.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1116, 'NS1060/0017/2023', '1', 14, 1, 3, 3, '51.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1117, 'NS5033/0020/2022', '1', 14, 1, 3, 3, '68.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1118, 'NS0722/0031/2023', '1', 14, 1, 3, 3, '34.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1119, 'NS4740/0048/2023', '1', 14, 1, 3, 3, '34.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1120, 'NS4498/0051/2020', '1', 14, 1, 3, 3, '61.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1121, 'NS0241/0039/2020', '1', 14, 1, 3, 3, '74.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1122, 'NS0414/0019/2023', '1', 14, 1, 3, 3, '81.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1123, 'NS0197/0009/2020', '1', 14, 1, 3, 3, '51.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1124, 'NS3893/0156/2023', '1', 14, 1, 3, 3, '53.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1125, 'NS0672/0057/2023', '1', 14, 1, 3, 3, '61.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1126, 'NS4816/0040/2021', '1', 14, 1, 3, 3, '72.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1127, 'NS1633/0164/2023', '1', 14, 1, 3, 3, '55.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1128, 'NS4208/0008/2022', '1', 14, 1, 3, 3, '74.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1129, 'NS3897/0105/2023', '1', 14, 1, 3, 3, '69.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1130, 'NS0526/0115/2021', '1', 14, 1, 3, 3, '56.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1131, 'NS0274/0046/2023', '1', 14, 1, 3, 3, '68.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1132, 'NS6048/0056/2023', '1', 14, 1, 3, 3, '51.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1133, 'NS4006/0030/2021', '1', 14, 1, 3, 3, '77.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1134, 'NS2505/0044/2017', '1', 14, 1, 3, 3, '61.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1135, 'NS4238/0026/2021', '1', 14, 1, 3, 3, '66.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1136, 'NS3351/0179/2023', '1', 14, 1, 3, 3, '59.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1137, 'NS4117/0256/2022', '1', 14, 1, 3, 3, '47.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1138, 'NS3321/0044/2021', '1', 14, 1, 3, 3, '43.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1139, 'NS5551/0011/2021', '1', 14, 1, 3, 3, '64.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1140, 'NS0345/0088/2023', '1', 14, 1, 3, 3, '69.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1141, 'NS4710/0030/2023', '1', 14, 1, 3, 3, '42.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1142, 'NS5822/0117/2023', '1', 14, 1, 3, 3, '71.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1143, 'NS1097/0129/2021', '1', 14, 1, 3, 3, '56.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1144, 'NS1633/0136/2021', '1', 14, 1, 3, 3, '77.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1145, 'NS0672/0094/2021', '1', 14, 1, 3, 3, '59.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1146, 'NS2521/0024/2021', '1', 14, 1, 3, 3, '77.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1147, 'NS1581/0075/2023', '1', 14, 1, 3, 3, '59.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1148, 'NS2315/0115/2021', '1', 14, 1, 3, 3, '68.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1149, 'NS2171/0052/2023', '1', 14, 1, 3, 3, '73.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1150, 'NS2424/0074/2023', '1', 14, 1, 3, 3, '55.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1151, 'NS0632/0053/2023', '1', 14, 1, 3, 3, '47.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1152, 'NS0672/0135/2023', '1', 14, 1, 3, 3, '44.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1153, 'NS5376/0082/2023', '1', 14, 1, 3, 3, '44.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1154, 'NS3228/0285/2022', '1', 14, 1, 3, 3, '48.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1155, 'NS0541/0100/2023', '1', 14, 1, 3, 3, '59.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1156, 'NS3534/0025/2023', '1', 14, 1, 3, 3, '57.00', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1157, 'NS5251/0066/2023', '1', 14, 1, 3, 3, '40.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1158, 'NS5298/0057/2023', '1', 14, 1, 3, 3, '53.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1159, 'NS4897/0091/2023', '1', 14, 1, 3, 3, '38.50', 'superadmin', '2025-04-19 20:12:54', '2025-04-19 20:12:54'),
(1160, 'NS0772/0099/2020', '1', 14, 1, 3, 4, '80.50', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1161, 'NS5289/0024/2023', '1', 14, 1, 3, 4, '80.00', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1162, 'NP1153/0013/2023', '1', 14, 1, 3, 4, '81.00', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1163, 'NS5357/0001/2023', '1', 14, 1, 3, 4, '72.00', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1164, 'NS0672/0001/2023', '1', 14, 1, 3, 4, '73.50', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1165, 'NS2367/0005/2023', '1', 14, 1, 3, 4, '88.00', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1166, 'NS0294/0005/2023', '1', 14, 1, 3, 4, '82.00', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1167, 'NS0916/0003/2023', '1', 14, 1, 3, 4, '77.50', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1168, 'NS1375/0002/2023', '1', 14, 1, 3, 4, '55.50', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1169, 'NS0547/0015/2023', '1', 14, 1, 3, 4, '62.50', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1170, 'NS0345/0172/2023', '1', 14, 1, 3, 4, '61.50', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1171, 'NS1394/0007/2023', '1', 14, 1, 3, 4, '53.00', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1172, 'NS4740/0008/2023', '1', 14, 1, 3, 4, '76.50', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1173, 'NEQ2022001913/2020', '1', 14, 1, 3, 4, '85.00', 'superadmin', '2025-04-19 20:13:41', '2025-04-19 20:13:41'),
(1174, 'NS3371/0102/2023', '1', 14, 1, 3, 4, '78.00', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1175, 'NS3897/0088/2023', '1', 14, 1, 3, 4, '61.50', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1176, 'NS3757/0023/2023', '1', 14, 1, 3, 4, '75.50', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1177, 'NS3981/0011/2023', '1', 14, 1, 3, 4, '86.00', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1178, 'NS3453/0010/2023', '1', 14, 1, 3, 4, '68.00', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1179, 'NS5156/0084/2023', '1', 14, 1, 3, 4, '78.00', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1180, 'NS2510/0010/2023', '1', 14, 1, 3, 4, '80.00', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1181, 'NS0970/0015/2023', '1', 14, 1, 3, 4, '86.50', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1182, 'NS3834/0019/2018', '1', 14, 1, 3, 4, '84.00', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1183, 'NS0850/0022/2022', '1', 14, 1, 3, 4, '67.50', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1184, 'NS1027/0179/2023', '1', 14, 1, 3, 4, '67.50', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1185, 'NS4569/0030/2023', '1', 14, 1, 3, 4, '82.00', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1186, 'NS4740/0041/2023', '1', 14, 1, 3, 4, '74.50', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1187, 'NS1618/0012/2023', '1', 14, 1, 3, 4, '76.00', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1188, 'NS1060/0017/2023', '1', 14, 1, 3, 4, '87.00', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1189, 'NS5033/0020/2022', '1', 14, 1, 3, 4, '84.50', 'superadmin', '2025-04-19 20:13:42', '2025-04-19 20:13:42'),
(1190, 'NS0722/0031/2023', '1', 14, 1, 3, 4, '69.50', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1191, 'NS4740/0048/2023', '1', 14, 1, 3, 4, '66.50', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1192, 'NS4498/0051/2020', '1', 14, 1, 3, 4, '77.50', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1193, 'NS0241/0039/2020', '1', 14, 1, 3, 4, '79.00', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1194, 'NS0414/0019/2023', '1', 14, 1, 3, 4, '90.00', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1195, 'NS0197/0009/2020', '1', 14, 1, 3, 4, '83.00', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1196, 'NS3893/0156/2023', '1', 14, 1, 3, 4, '79.00', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1197, 'NS0672/0057/2023', '1', 14, 1, 3, 4, '80.00', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1198, 'NS4816/0040/2021', '1', 14, 1, 3, 4, '64.00', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1199, 'NS1633/0164/2023', '1', 14, 1, 3, 4, '71.00', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1200, 'NS4208/0008/2022', '1', 14, 1, 3, 4, '62.00', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1201, 'NS3897/0105/2023', '1', 14, 1, 3, 4, '72.00', 'superadmin', '2025-04-19 20:13:43', '2025-04-19 20:13:43'),
(1202, 'NS0526/0115/2021', '1', 14, 1, 3, 4, '82.00', 'superadmin', '2025-04-19 20:13:44', '2025-04-19 20:13:44'),
(1203, 'NS0274/0046/2023', '1', 14, 1, 3, 4, '81.00', 'superadmin', '2025-04-19 20:13:44', '2025-04-19 20:13:44'),
(1204, 'NS6048/0056/2023', '1', 14, 1, 3, 4, '80.50', 'superadmin', '2025-04-19 20:13:44', '2025-04-19 20:13:44'),
(1205, 'NS4006/0030/2021', '1', 14, 1, 3, 4, '79.00', 'superadmin', '2025-04-19 20:13:44', '2025-04-19 20:13:44'),
(1206, 'NS2505/0044/2017', '1', 14, 1, 3, 4, '50.50', 'superadmin', '2025-04-19 20:13:44', '2025-04-19 20:13:44'),
(1207, 'NS4238/0026/2021', '1', 14, 1, 3, 4, '74.00', 'superadmin', '2025-04-19 20:13:44', '2025-04-19 20:13:44'),
(1208, 'NS3351/0179/2023', '1', 14, 1, 3, 4, '75.00', 'superadmin', '2025-04-19 20:13:44', '2025-04-19 20:13:44'),
(1209, 'NS4117/0256/2022', '1', 14, 1, 3, 4, '78.50', 'superadmin', '2025-04-19 20:13:44', '2025-04-19 20:13:44'),
(1210, 'NS3321/0044/2021', '1', 14, 1, 3, 4, '56.00', 'superadmin', '2025-04-19 20:13:44', '2025-04-19 20:13:44'),
(1211, 'NS5551/0011/2021', '1', 14, 1, 3, 4, '84.00', 'superadmin', '2025-04-19 20:13:44', '2025-04-19 20:13:44'),
(1212, 'NS0345/0088/2023', '1', 14, 1, 3, 4, '75.00', 'superadmin', '2025-04-19 20:13:45', '2025-04-19 20:13:45'),
(1213, 'NS4710/0030/2023', '1', 14, 1, 3, 4, '73.00', 'superadmin', '2025-04-19 20:13:45', '2025-04-19 20:13:45'),
(1214, 'NS5822/0117/2023', '1', 14, 1, 3, 4, '70.50', 'superadmin', '2025-04-19 20:13:45', '2025-04-19 20:13:45'),
(1215, 'NS1097/0129/2021', '1', 14, 1, 3, 4, '80.50', 'superadmin', '2025-04-19 20:13:45', '2025-04-19 20:13:45'),
(1216, 'NS1633/0136/2021', '1', 14, 1, 3, 4, '83.50', 'superadmin', '2025-04-19 20:13:45', '2025-04-19 20:13:45'),
(1217, 'NS0672/0094/2021', '1', 14, 1, 3, 4, '78.50', 'superadmin', '2025-04-19 20:13:45', '2025-04-19 20:13:45'),
(1218, 'NS2521/0024/2021', '1', 14, 1, 3, 4, '90.00', 'superadmin', '2025-04-19 20:13:45', '2025-04-19 20:13:45'),
(1219, 'NS1581/0075/2023', '1', 14, 1, 3, 4, '77.00', 'superadmin', '2025-04-19 20:13:45', '2025-04-19 20:13:45'),
(1220, 'NS2315/0115/2021', '1', 14, 1, 3, 4, '75.00', 'superadmin', '2025-04-19 20:13:45', '2025-04-19 20:13:45'),
(1221, 'NS2171/0052/2023', '1', 14, 1, 3, 4, '81.00', 'superadmin', '2025-04-19 20:13:46', '2025-04-19 20:13:46'),
(1222, 'NS2424/0074/2023', '1', 14, 1, 3, 4, '73.00', 'superadmin', '2025-04-19 20:13:46', '2025-04-19 20:13:46'),
(1223, 'NS0632/0053/2023', '1', 14, 1, 3, 4, '79.00', 'superadmin', '2025-04-19 20:13:46', '2025-04-19 20:13:46'),
(1224, 'NS0672/0135/2023', '1', 14, 1, 3, 4, '40.00', 'superadmin', '2025-04-19 20:13:46', '2025-04-19 20:13:46'),
(1225, 'NS5376/0082/2023', '1', 14, 1, 3, 4, '77.50', 'superadmin', '2025-04-19 20:13:46', '2025-04-19 20:13:46'),
(1226, 'NS3228/0285/2022', '1', 14, 1, 3, 4, '79.00', 'superadmin', '2025-04-19 20:13:46', '2025-04-19 20:13:46'),
(1227, 'NS0541/0100/2023', '1', 14, 1, 3, 4, '42.50', 'superadmin', '2025-04-19 20:13:46', '2025-04-19 20:13:46'),
(1228, 'NS3534/0025/2023', '1', 14, 1, 3, 4, '84.00', 'superadmin', '2025-04-19 20:13:47', '2025-04-19 20:13:47'),
(1229, 'NS5251/0066/2023', '1', 14, 1, 3, 4, '74.50', 'superadmin', '2025-04-19 20:13:47', '2025-04-19 20:13:47'),
(1230, 'NS5298/0057/2023', '1', 14, 1, 3, 4, '77.00', 'superadmin', '2025-04-19 20:13:47', '2025-04-19 20:13:47'),
(1231, 'NS4897/0091/2023', '1', 14, 1, 3, 4, '71.50', 'superadmin', '2025-04-19 20:13:47', '2025-04-19 20:13:47'),
(1232, 'NS0772/0099/2020', '1', 14, 1, 3, 5, '88.00', 'superadmin', '2025-04-19 20:14:40', '2025-04-19 20:14:40'),
(1233, 'NS5289/0024/2023', '1', 14, 1, 3, 5, '85.00', 'superadmin', '2025-04-19 20:14:40', '2025-04-19 20:14:40'),
(1234, 'NP1153/0013/2023', '1', 14, 1, 3, 5, '65.00', 'superadmin', '2025-04-19 20:14:41', '2025-04-19 20:14:41'),
(1235, 'NS5357/0001/2023', '1', 14, 1, 3, 5, '77.00', 'superadmin', '2025-04-19 20:14:41', '2025-04-19 20:14:41'),
(1236, 'NS0672/0001/2023', '1', 14, 1, 3, 5, '74.00', 'superadmin', '2025-04-19 20:14:41', '2025-04-19 20:14:41'),
(1237, 'NS2367/0005/2023', '1', 14, 1, 3, 5, '61.50', 'superadmin', '2025-04-19 20:14:41', '2025-04-19 20:14:41'),
(1238, 'NS0294/0005/2023', '1', 14, 1, 3, 5, '75.00', 'superadmin', '2025-04-19 20:14:41', '2025-04-19 20:14:41'),
(1239, 'NS0916/0003/2023', '1', 14, 1, 3, 5, '69.50', 'superadmin', '2025-04-19 20:14:41', '2025-04-19 20:14:41'),
(1240, 'NS1375/0002/2023', '1', 14, 1, 3, 5, '59.50', 'superadmin', '2025-04-19 20:14:41', '2025-04-19 20:14:41'),
(1241, 'NS0547/0015/2023', '1', 14, 1, 3, 5, '66.50', 'superadmin', '2025-04-19 20:14:41', '2025-04-19 20:14:41'),
(1242, 'NS0345/0172/2023', '1', 14, 1, 3, 5, '73.00', 'superadmin', '2025-04-19 20:14:42', '2025-04-19 20:14:42'),
(1243, 'NS1394/0007/2023', '1', 14, 1, 3, 5, '68.00', 'superadmin', '2025-04-19 20:14:42', '2025-04-19 20:14:42'),
(1244, 'NS4740/0008/2023', '1', 14, 1, 3, 5, '74.00', 'superadmin', '2025-04-19 20:14:42', '2025-04-19 20:14:42'),
(1245, 'NEQ2022001913/2020', '1', 14, 1, 3, 5, '61.00', 'superadmin', '2025-04-19 20:14:42', '2025-04-19 20:14:42'),
(1246, 'NS3371/0102/2023', '1', 14, 1, 3, 5, '72.50', 'superadmin', '2025-04-19 20:14:42', '2025-04-19 20:14:42'),
(1247, 'NS3897/0088/2023', '1', 14, 1, 3, 5, '71.00', 'superadmin', '2025-04-19 20:14:42', '2025-04-19 20:14:42'),
(1248, 'NS3757/0023/2023', '1', 14, 1, 3, 5, '68.50', 'superadmin', '2025-04-19 20:14:42', '2025-04-19 20:14:42'),
(1249, 'NS3981/0011/2023', '1', 14, 1, 3, 5, '77.50', 'superadmin', '2025-04-19 20:14:43', '2025-04-19 20:14:43'),
(1250, 'NS3453/0010/2023', '1', 14, 1, 3, 5, '54.50', 'superadmin', '2025-04-19 20:14:43', '2025-04-19 20:14:43'),
(1251, 'NS5156/0084/2023', '1', 14, 1, 3, 5, '66.50', 'superadmin', '2025-04-19 20:14:43', '2025-04-19 20:14:43'),
(1252, 'NS2510/0010/2023', '1', 14, 1, 3, 5, '81.00', 'superadmin', '2025-04-19 20:14:43', '2025-04-19 20:14:43'),
(1253, 'NS0970/0015/2023', '1', 14, 1, 3, 5, '80.50', 'superadmin', '2025-04-19 20:14:43', '2025-04-19 20:14:43'),
(1254, 'NS3834/0019/2018', '1', 14, 1, 3, 5, '81.50', 'superadmin', '2025-04-19 20:14:43', '2025-04-19 20:14:43'),
(1255, 'NS0850/0022/2022', '1', 14, 1, 3, 5, '64.50', 'superadmin', '2025-04-19 20:14:43', '2025-04-19 20:14:43'),
(1256, 'NS1027/0179/2023', '1', 14, 1, 3, 5, '79.50', 'superadmin', '2025-04-19 20:14:43', '2025-04-19 20:14:43'),
(1257, 'NS4569/0030/2023', '1', 14, 1, 3, 5, '75.00', 'superadmin', '2025-04-19 20:14:44', '2025-04-19 20:14:44'),
(1258, 'NS4740/0041/2023', '1', 14, 1, 3, 5, '69.50', 'superadmin', '2025-04-19 20:14:44', '2025-04-19 20:14:44'),
(1259, 'NS1618/0012/2023', '1', 14, 1, 3, 5, '71.00', 'superadmin', '2025-04-19 20:14:44', '2025-04-19 20:14:44'),
(1260, 'NS1060/0017/2023', '1', 14, 1, 3, 5, '69.00', 'superadmin', '2025-04-19 20:14:44', '2025-04-19 20:14:44'),
(1261, 'NS5033/0020/2022', '1', 14, 1, 3, 5, '73.50', 'superadmin', '2025-04-19 20:14:44', '2025-04-19 20:14:44'),
(1262, 'NS0722/0031/2023', '1', 14, 1, 3, 5, '63.50', 'superadmin', '2025-04-19 20:14:44', '2025-04-19 20:14:44'),
(1263, 'NS4740/0048/2023', '1', 14, 1, 3, 5, '69.00', 'superadmin', '2025-04-19 20:14:44', '2025-04-19 20:14:44'),
(1264, 'NS4498/0051/2020', '1', 14, 1, 3, 5, '70.50', 'superadmin', '2025-04-19 20:14:45', '2025-04-19 20:14:45'),
(1265, 'NS0241/0039/2020', '1', 14, 1, 3, 5, '77.50', 'superadmin', '2025-04-19 20:14:45', '2025-04-19 20:14:45'),
(1266, 'NS0414/0019/2023', '1', 14, 1, 3, 5, '77.00', 'superadmin', '2025-04-19 20:14:45', '2025-04-19 20:14:45'),
(1267, 'NS0197/0009/2020', '1', 14, 1, 3, 5, '62.50', 'superadmin', '2025-04-19 20:14:45', '2025-04-19 20:14:45'),
(1268, 'NS3893/0156/2023', '1', 14, 1, 3, 5, '67.00', 'superadmin', '2025-04-19 20:14:45', '2025-04-19 20:14:45'),
(1269, 'NS0672/0057/2023', '1', 14, 1, 3, 5, '62.00', 'superadmin', '2025-04-19 20:14:45', '2025-04-19 20:14:45'),
(1270, 'NS4816/0040/2021', '1', 14, 1, 3, 5, '79.50', 'superadmin', '2025-04-19 20:14:45', '2025-04-19 20:14:45'),
(1271, 'NS1633/0164/2023', '1', 14, 1, 3, 5, '67.00', 'superadmin', '2025-04-19 20:14:46', '2025-04-19 20:14:46'),
(1272, 'NS4208/0008/2022', '1', 14, 1, 3, 5, '65.00', 'superadmin', '2025-04-19 20:14:46', '2025-04-19 20:14:46'),
(1273, 'NS3897/0105/2023', '1', 14, 1, 3, 5, '82.00', 'superadmin', '2025-04-19 20:14:46', '2025-04-19 20:14:46'),
(1274, 'NS0526/0115/2021', '1', 14, 1, 3, 5, '82.00', 'superadmin', '2025-04-19 20:14:46', '2025-04-19 20:14:46'),
(1275, 'NS0274/0046/2023', '1', 14, 1, 3, 5, '76.50', 'superadmin', '2025-04-19 20:14:46', '2025-04-19 20:14:46'),
(1276, 'NS6048/0056/2023', '1', 14, 1, 3, 5, '69.00', 'superadmin', '2025-04-19 20:14:46', '2025-04-19 20:14:46'),
(1277, 'NS4006/0030/2021', '1', 14, 1, 3, 5, '77.50', 'superadmin', '2025-04-19 20:14:46', '2025-04-19 20:14:46'),
(1278, 'NS2505/0044/2017', '1', 14, 1, 3, 5, '71.50', 'superadmin', '2025-04-19 20:14:46', '2025-04-19 20:14:46'),
(1279, 'NS4238/0026/2021', '1', 14, 1, 3, 5, '78.00', 'superadmin', '2025-04-19 20:14:47', '2025-04-19 20:14:47'),
(1280, 'NS3351/0179/2023', '1', 14, 1, 3, 5, '83.00', 'superadmin', '2025-04-19 20:14:47', '2025-04-19 20:14:47'),
(1281, 'NS4117/0256/2022', '1', 14, 1, 3, 5, '66.00', 'superadmin', '2025-04-19 20:14:47', '2025-04-19 20:14:47'),
(1282, 'NS3321/0044/2021', '1', 14, 1, 3, 5, '70.00', 'superadmin', '2025-04-19 20:14:47', '2025-04-19 20:14:47'),
(1283, 'NS5551/0011/2021', '1', 14, 1, 3, 5, '72.50', 'superadmin', '2025-04-19 20:14:47', '2025-04-19 20:14:47'),
(1284, 'NS0345/0088/2023', '1', 14, 1, 3, 5, '78.50', 'superadmin', '2025-04-19 20:14:47', '2025-04-19 20:14:47'),
(1285, 'NS4710/0030/2023', '1', 14, 1, 3, 5, '73.50', 'superadmin', '2025-04-19 20:14:47', '2025-04-19 20:14:47'),
(1286, 'NS5822/0117/2023', '1', 14, 1, 3, 5, '73.00', 'superadmin', '2025-04-19 20:14:48', '2025-04-19 20:14:48'),
(1287, 'NS1097/0129/2021', '1', 14, 1, 3, 5, '80.50', 'superadmin', '2025-04-19 20:14:48', '2025-04-19 20:14:48'),
(1288, 'NS1633/0136/2021', '1', 14, 1, 3, 5, '78.00', 'superadmin', '2025-04-19 20:14:48', '2025-04-19 20:14:48'),
(1289, 'NS0672/0094/2021', '1', 14, 1, 3, 5, '74.50', 'superadmin', '2025-04-19 20:14:48', '2025-04-19 20:14:48'),
(1290, 'NS2521/0024/2021', '1', 14, 1, 3, 5, '80.00', 'superadmin', '2025-04-19 20:14:48', '2025-04-19 20:14:48'),
(1291, 'NS1581/0075/2023', '1', 14, 1, 3, 5, '66.50', 'superadmin', '2025-04-19 20:14:48', '2025-04-19 20:14:48'),
(1292, 'NS2315/0115/2021', '1', 14, 1, 3, 5, '76.50', 'superadmin', '2025-04-19 20:14:48', '2025-04-19 20:14:48'),
(1293, 'NS2171/0052/2023', '1', 14, 1, 3, 5, '73.00', 'superadmin', '2025-04-19 20:14:49', '2025-04-19 20:14:49'),
(1294, 'NS2424/0074/2023', '1', 14, 1, 3, 5, '65.00', 'superadmin', '2025-04-19 20:14:49', '2025-04-19 20:14:49'),
(1295, 'NS0632/0053/2023', '1', 14, 1, 3, 5, '67.00', 'superadmin', '2025-04-19 20:14:49', '2025-04-19 20:14:49'),
(1296, 'NS0672/0135/2023', '1', 14, 1, 3, 5, '73.00', 'superadmin', '2025-04-19 20:14:49', '2025-04-19 20:14:49'),
(1297, 'NS5376/0082/2023', '1', 14, 1, 3, 5, '69.50', 'superadmin', '2025-04-19 20:14:49', '2025-04-19 20:14:49'),
(1298, 'NS3228/0285/2022', '1', 14, 1, 3, 5, '69.50', 'superadmin', '2025-04-19 20:14:49', '2025-04-19 20:14:49'),
(1299, 'NS0541/0100/2023', '1', 14, 1, 3, 5, '63.50', 'superadmin', '2025-04-19 20:14:49', '2025-04-19 20:14:49'),
(1300, 'NS3534/0025/2023', '1', 14, 1, 3, 5, '84.00', 'superadmin', '2025-04-19 20:14:49', '2025-04-19 20:14:49'),
(1301, 'NS5251/0066/2023', '1', 14, 1, 3, 5, '58.50', 'superadmin', '2025-04-19 20:14:50', '2025-04-19 20:14:50'),
(1302, 'NS5298/0057/2023', '1', 14, 1, 3, 5, '60.50', 'superadmin', '2025-04-19 20:14:50', '2025-04-19 20:14:50'),
(1303, 'NS4897/0091/2023', '1', 14, 1, 3, 5, '67.50', 'superadmin', '2025-04-19 20:14:50', '2025-04-19 20:14:50'),
(1304, 'NS0772/0099/2020', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1305, 'NS5289/0024/2023', '1', 14, 1, 4, 1, '85.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1306, 'NP1153/0013/2023', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1307, 'NS5357/0001/2023', '1', 14, 1, 4, 1, '85.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1308, 'NS0672/0001/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1309, 'NS2367/0005/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1310, 'NS0294/0005/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1311, 'NS0916/0003/2023', '1', 14, 1, 4, 1, '65.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1312, 'NS1375/0002/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1313, 'NS0547/0015/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1314, 'NS0345/0172/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1315, 'NS1394/0007/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1316, 'NS4740/0008/2023', '1', 14, 1, 4, 1, '85.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1317, 'NEQ2022001913/2020', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1318, 'NS3371/0102/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1319, 'NS3897/0088/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1320, 'NS3757/0023/2023', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1321, 'NS3981/0011/2023', '1', 14, 1, 4, 1, '75.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1322, 'NS3453/0010/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1323, 'NS5156/0084/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1324, 'NS2510/0010/2023', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1325, 'NS0970/0015/2023', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1326, 'NS3834/0019/2018', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1327, 'NS0850/0022/2022', '1', 14, 1, 4, 1, '85.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1328, 'NS1027/0179/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1329, 'NS4569/0030/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1330, 'NS4740/0041/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1331, 'NS1618/0012/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1332, 'NS1060/0017/2023', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1333, 'NS5033/0020/2022', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1334, 'NS0722/0031/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1335, 'NS4740/0048/2023', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1336, 'NS4498/0051/2020', '1', 14, 1, 4, 1, '92.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1337, 'NS0241/0039/2020', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1338, 'NS0414/0019/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1339, 'NS0197/0009/2020', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1340, 'NS3893/0156/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1341, 'NS0672/0057/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1342, 'NS4816/0040/2021', '1', 14, 1, 4, 1, '85.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1343, 'NS1633/0164/2023', '1', 14, 1, 4, 1, '80.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1344, 'NS4208/0008/2022', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1345, 'NS3897/0105/2023', '1', 14, 1, 4, 1, '80.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1346, 'NS0526/0115/2021', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1347, 'NS0274/0046/2023', '1', 14, 1, 4, 1, '100.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1348, 'NS6048/0056/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1349, 'NS4006/0030/2021', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1350, 'NS2505/0044/2017', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1351, 'NS4238/0026/2021', '1', 14, 1, 4, 1, '80.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1352, 'NS3351/0179/2023', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1353, 'NS4117/0256/2022', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1354, 'NS3321/0044/2021', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1355, 'NS5551/0011/2021', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1356, 'NS0345/0088/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1357, 'NS4710/0030/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1358, 'NS5822/0117/2023', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1359, 'NS1097/0129/2021', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1360, 'NS1633/0136/2021', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1361, 'NS0672/0094/2021', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1362, 'NS2521/0024/2021', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1363, 'NS1581/0075/2023', '1', 14, 1, 4, 1, '90.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1364, 'NS2315/0115/2021', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1365, 'NS2171/0052/2023', '1', 14, 1, 4, 1, '75.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1366, 'NS2424/0074/2023', '1', 14, 1, 4, 1, '65.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1367, 'NS0632/0053/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1368, 'NS0672/0135/2023', '1', 14, 1, 4, 1, '85.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1369, 'NS5376/0082/2023', '1', 14, 1, 4, 1, '99.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1370, 'NS3228/0285/2022', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1371, 'NS0541/0100/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1372, 'NS3534/0025/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1373, 'NS5251/0066/2023', '1', 14, 1, 4, 1, '40.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1374, 'NS5298/0057/2023', '1', 14, 1, 4, 1, '85.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1375, 'NS4897/0091/2023', '1', 14, 1, 4, 1, '95.00', 'superadmin', '2025-04-19 21:07:24', '2025-04-19 21:07:24'),
(1376, 'NS0772/0099/2020', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1377, 'NS5289/0024/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1378, 'NP1153/0013/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1379, 'NS5357/0001/2023', '1', 14, 1, 4, 2, '80.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1380, 'NS0672/0001/2023', '1', 14, 1, 4, 2, '75.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1381, 'NS2367/0005/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1382, 'NS0294/0005/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1383, 'NS0916/0003/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1384, 'NS1375/0002/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1385, 'NS0547/0015/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1386, 'NS0345/0172/2023', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1387, 'NS1394/0007/2023', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1388, 'NS4740/0008/2023', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1389, 'NEQ2022001913/2020', '1', 14, 1, 4, 2, '60.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1390, 'NS3371/0102/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1391, 'NS3897/0088/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1392, 'NS3757/0023/2023', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1393, 'NS3981/0011/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1394, 'NS3453/0010/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1395, 'NS5156/0084/2023', '1', 14, 1, 4, 2, '80.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1396, 'NS2510/0010/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:51', '2025-04-19 21:07:51'),
(1397, 'NS0970/0015/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1398, 'NS3834/0019/2018', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1399, 'NS0850/0022/2022', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1400, 'NS1027/0179/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1401, 'NS4569/0030/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1402, 'NS4740/0041/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1403, 'NS1618/0012/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1404, 'NS1060/0017/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1405, 'NS5033/0020/2022', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1406, 'NS0722/0031/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1407, 'NS4740/0048/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1408, 'NS4498/0051/2020', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52');
INSERT INTO `exam_category_results` (`id`, `reg_no`, `year_of_study`, `year_id`, `semester_id`, `course_id`, `exam_category_id`, `exam_score`, `uploadedby`, `created_at`, `updated_at`) VALUES
(1409, 'NS0241/0039/2020', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1410, 'NS0414/0019/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1411, 'NS0197/0009/2020', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1412, 'NS3893/0156/2023', '1', 14, 1, 4, 2, '80.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1413, 'NS0672/0057/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1414, 'NS4816/0040/2021', '1', 14, 1, 4, 2, '80.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1415, 'NS1633/0164/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1416, 'NS4208/0008/2022', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1417, 'NS3897/0105/2023', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1418, 'NS0526/0115/2021', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1419, 'NS0274/0046/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1420, 'NS6048/0056/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1421, 'NS4006/0030/2021', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1422, 'NS2505/0044/2017', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1423, 'NS4238/0026/2021', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1424, 'NS3351/0179/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1425, 'NS4117/0256/2022', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1426, 'NS3321/0044/2021', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1427, 'NS5551/0011/2021', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1428, 'NS0345/0088/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1429, 'NS4710/0030/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1430, 'NS5822/0117/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1431, 'NS1097/0129/2021', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1432, 'NS1633/0136/2021', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1433, 'NS0672/0094/2021', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1434, 'NS2521/0024/2021', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1435, 'NS1581/0075/2023', '1', 14, 1, 4, 2, '80.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1436, 'NS2315/0115/2021', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1437, 'NS2171/0052/2023', '1', 14, 1, 4, 2, '80.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1438, 'NS2424/0074/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1439, 'NS0632/0053/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1440, 'NS0672/0135/2023', '1', 14, 1, 4, 2, '80.50', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1441, 'NS5376/0082/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1442, 'NS3228/0285/2022', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1443, 'NS0541/0100/2023', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1444, 'NS3534/0025/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1445, 'NS5251/0066/2023', '1', 14, 1, 4, 2, '85.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1446, 'NS5298/0057/2023', '1', 14, 1, 4, 2, '95.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1447, 'NS4897/0091/2023', '1', 14, 1, 4, 2, '90.00', 'superadmin', '2025-04-19 21:07:52', '2025-04-19 21:07:52'),
(1448, 'NS0772/0099/2020', '1', 14, 1, 4, 3, '81.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1449, 'NS5289/0024/2023', '1', 14, 1, 4, 3, '77.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1450, 'NP1153/0013/2023', '1', 14, 1, 4, 3, '62.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1451, 'NS5357/0001/2023', '1', 14, 1, 4, 3, '80.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1452, 'NS0672/0001/2023', '1', 14, 1, 4, 3, '61.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1453, 'NS2367/0005/2023', '1', 14, 1, 4, 3, '52.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1454, 'NS0294/0005/2023', '1', 14, 1, 4, 3, '66.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1455, 'NS0916/0003/2023', '1', 14, 1, 4, 3, '66.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1456, 'NS1375/0002/2023', '1', 14, 1, 4, 3, '57.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1457, 'NS0547/0015/2023', '1', 14, 1, 4, 3, '59.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1458, 'NS0345/0172/2023', '1', 14, 1, 4, 3, '66.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1459, 'NS1394/0007/2023', '1', 14, 1, 4, 3, '61.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1460, 'NS4740/0008/2023', '1', 14, 1, 4, 3, '60.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1461, 'NEQ2022001913/2020', '1', 14, 1, 4, 3, '61.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1462, 'NS3371/0102/2023', '1', 14, 1, 4, 3, '63.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1463, 'NS3897/0088/2023', '1', 14, 1, 4, 3, '61.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1464, 'NS3757/0023/2023', '1', 14, 1, 4, 3, '49.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1465, 'NS3981/0011/2023', '1', 14, 1, 4, 3, '70.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1466, 'NS3453/0010/2023', '1', 14, 1, 4, 3, '51.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1467, 'NS5156/0084/2023', '1', 14, 1, 4, 3, '51.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1468, 'NS2510/0010/2023', '1', 14, 1, 4, 3, '70.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1469, 'NS0970/0015/2023', '1', 14, 1, 4, 3, '64.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1470, 'NS3834/0019/2018', '1', 14, 1, 4, 3, '70.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1471, 'NS0850/0022/2022', '1', 14, 1, 4, 3, '55.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1472, 'NS1027/0179/2023', '1', 14, 1, 4, 3, '73.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1473, 'NS4569/0030/2023', '1', 14, 1, 4, 3, '61.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1474, 'NS4740/0041/2023', '1', 14, 1, 4, 3, '72.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1475, 'NS1618/0012/2023', '1', 14, 1, 4, 3, '60.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1476, 'NS1060/0017/2023', '1', 14, 1, 4, 3, '55.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1477, 'NS5033/0020/2022', '1', 14, 1, 4, 3, '66.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1478, 'NS0722/0031/2023', '1', 14, 1, 4, 3, '53.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1479, 'NS4740/0048/2023', '1', 14, 1, 4, 3, '53.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1480, 'NS4498/0051/2020', '1', 14, 1, 4, 3, '69.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1481, 'NS0241/0039/2020', '1', 14, 1, 4, 3, '63.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1482, 'NS0414/0019/2023', '1', 14, 1, 4, 3, '75.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1483, 'NS0197/0009/2020', '1', 14, 1, 4, 3, '55.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1484, 'NS3893/0156/2023', '1', 14, 1, 4, 3, '58.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1485, 'NS0672/0057/2023', '1', 14, 1, 4, 3, '63.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1486, 'NS4816/0040/2021', '1', 14, 1, 4, 3, '68.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1487, 'NS1633/0164/2023', '1', 14, 1, 4, 3, '60.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1488, 'NS4208/0008/2022', '1', 14, 1, 4, 3, '58.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1489, 'NS3897/0105/2023', '1', 14, 1, 4, 3, '79.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1490, 'NS0526/0115/2021', '1', 14, 1, 4, 3, '72.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1491, 'NS0274/0046/2023', '1', 14, 1, 4, 3, '66.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1492, 'NS6048/0056/2023', '1', 14, 1, 4, 3, '62.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1493, 'NS4006/0030/2021', '1', 14, 1, 4, 3, '64.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1494, 'NS2505/0044/2017', '1', 14, 1, 4, 3, '54.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1495, 'NS4238/0026/2021', '1', 14, 1, 4, 3, '61.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1496, 'NS3351/0179/2023', '1', 14, 1, 4, 3, '65.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1497, 'NS4117/0256/2022', '1', 14, 1, 4, 3, '33.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1498, 'NS3321/0044/2021', '1', 14, 1, 4, 3, '68.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1499, 'NS5551/0011/2021', '1', 14, 1, 4, 3, '71.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1500, 'NS0345/0088/2023', '1', 14, 1, 4, 3, '64.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1501, 'NS4710/0030/2023', '1', 14, 1, 4, 3, '50.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1502, 'NS5822/0117/2023', '1', 14, 1, 4, 3, '77.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1503, 'NS1097/0129/2021', '1', 14, 1, 4, 3, '76.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1504, 'NS1633/0136/2021', '1', 14, 1, 4, 3, '67.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1505, 'NS0672/0094/2021', '1', 14, 1, 4, 3, '63.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1506, 'NS2521/0024/2021', '1', 14, 1, 4, 3, '72.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1507, 'NS1581/0075/2023', '1', 14, 1, 4, 3, '52.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1508, 'NS2315/0115/2021', '1', 14, 1, 4, 3, '63.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1509, 'NS2171/0052/2023', '1', 14, 1, 4, 3, '65.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1510, 'NS2424/0074/2023', '1', 14, 1, 4, 3, '50.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1511, 'NS0632/0053/2023', '1', 14, 1, 4, 3, '43.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1512, 'NS0672/0135/2023', '1', 14, 1, 4, 3, '58.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1513, 'NS5376/0082/2023', '1', 14, 1, 4, 3, '63.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1514, 'NS3228/0285/2022', '1', 14, 1, 4, 3, '69.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1515, 'NS0541/0100/2023', '1', 14, 1, 4, 3, '66.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1516, 'NS3534/0025/2023', '1', 14, 1, 4, 3, '65.50', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1517, 'NS5251/0066/2023', '1', 14, 1, 4, 3, '41.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1518, 'NS5298/0057/2023', '1', 14, 1, 4, 3, '60.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1519, 'NS4897/0091/2023', '1', 14, 1, 4, 3, '77.00', 'superadmin', '2025-04-19 21:08:20', '2025-04-19 21:08:20'),
(1520, 'NS0772/0099/2020', '1', 14, 1, 4, 4, '84.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1521, 'NS5289/0024/2023', '1', 14, 1, 4, 4, '75.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1522, 'NP1153/0013/2023', '1', 14, 1, 4, 4, '66.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1523, 'NS5357/0001/2023', '1', 14, 1, 4, 4, '75.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1524, 'NS0672/0001/2023', '1', 14, 1, 4, 4, '59.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1525, 'NS2367/0005/2023', '1', 14, 1, 4, 4, '60.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1526, 'NS0294/0005/2023', '1', 14, 1, 4, 4, '69.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1527, 'NS0916/0003/2023', '1', 14, 1, 4, 4, '66.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1528, 'NS1375/0002/2023', '1', 14, 1, 4, 4, '40.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1529, 'NS0547/0015/2023', '1', 14, 1, 4, 4, '58.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1530, 'NS0345/0172/2023', '1', 14, 1, 4, 4, '65.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1531, 'NS1394/0007/2023', '1', 14, 1, 4, 4, '68.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1532, 'NS4740/0008/2023', '1', 14, 1, 4, 4, '56.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1533, 'NEQ2022001913/2020', '1', 14, 1, 4, 4, '52.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1534, 'NS3371/0102/2023', '1', 14, 1, 4, 4, '58.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1535, 'NS3897/0088/2023', '1', 14, 1, 4, 4, '58.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1536, 'NS3757/0023/2023', '1', 14, 1, 4, 4, '56.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1537, 'NS3981/0011/2023', '1', 14, 1, 4, 4, '76.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1538, 'NS3453/0010/2023', '1', 14, 1, 4, 4, '55.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1539, 'NS5156/0084/2023', '1', 14, 1, 4, 4, '60.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1540, 'NS2510/0010/2023', '1', 14, 1, 4, 4, '73.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1541, 'NS0970/0015/2023', '1', 14, 1, 4, 4, '67.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1542, 'NS3834/0019/2018', '1', 14, 1, 4, 4, '65.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1543, 'NS0850/0022/2022', '1', 14, 1, 4, 4, '58.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1544, 'NS1027/0179/2023', '1', 14, 1, 4, 4, '73.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1545, 'NS4569/0030/2023', '1', 14, 1, 4, 4, '73.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1546, 'NS4740/0041/2023', '1', 14, 1, 4, 4, '62.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1547, 'NS1618/0012/2023', '1', 14, 1, 4, 4, '63.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1548, 'NS1060/0017/2023', '1', 14, 1, 4, 4, '65.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1549, 'NS5033/0020/2022', '1', 14, 1, 4, 4, '74.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1550, 'NS0722/0031/2023', '1', 14, 1, 4, 4, '50.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1551, 'NS4740/0048/2023', '1', 14, 1, 4, 4, '38.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1552, 'NS4498/0051/2020', '1', 14, 1, 4, 4, '67.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1553, 'NS0241/0039/2020', '1', 14, 1, 4, 4, '58.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1554, 'NS0414/0019/2023', '1', 14, 1, 4, 4, '69.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1555, 'NS0197/0009/2020', '1', 14, 1, 4, 4, '49.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1556, 'NS3893/0156/2023', '1', 14, 1, 4, 4, '53.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1557, 'NS0672/0057/2023', '1', 14, 1, 4, 4, '61.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1558, 'NS4816/0040/2021', '1', 14, 1, 4, 4, '59.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1559, 'NS1633/0164/2023', '1', 14, 1, 4, 4, '55.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1560, 'NS4208/0008/2022', '1', 14, 1, 4, 4, '52.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1561, 'NS3897/0105/2023', '1', 14, 1, 4, 4, '71.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1562, 'NS0526/0115/2021', '1', 14, 1, 4, 4, '72.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1563, 'NS0274/0046/2023', '1', 14, 1, 4, 4, '71.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1564, 'NS6048/0056/2023', '1', 14, 1, 4, 4, '81.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1565, 'NS4006/0030/2021', '1', 14, 1, 4, 4, '59.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1566, 'NS2505/0044/2017', '1', 14, 1, 4, 4, '69.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1567, 'NS4238/0026/2021', '1', 14, 1, 4, 4, '64.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1568, 'NS3351/0179/2023', '1', 14, 1, 4, 4, '70.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1569, 'NS4117/0256/2022', '1', 14, 1, 4, 4, '52.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1570, 'NS3321/0044/2021', '1', 14, 1, 4, 4, '50.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1571, 'NS5551/0011/2021', '1', 14, 1, 4, 4, '74.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1572, 'NS0345/0088/2023', '1', 14, 1, 4, 4, '58.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1573, 'NS4710/0030/2023', '1', 14, 1, 4, 4, '54.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1574, 'NS5822/0117/2023', '1', 14, 1, 4, 4, '71.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1575, 'NS1097/0129/2021', '1', 14, 1, 4, 4, '79.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1576, 'NS1633/0136/2021', '1', 14, 1, 4, 4, '75.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1577, 'NS0672/0094/2021', '1', 14, 1, 4, 4, '67.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1578, 'NS2521/0024/2021', '1', 14, 1, 4, 4, '72.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1579, 'NS1581/0075/2023', '1', 14, 1, 4, 4, '51.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1580, 'NS2315/0115/2021', '1', 14, 1, 4, 4, '57.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1581, 'NS2171/0052/2023', '1', 14, 1, 4, 4, '65.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1582, 'NS2424/0074/2023', '1', 14, 1, 4, 4, '65.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1583, 'NS0632/0053/2023', '1', 14, 1, 4, 4, '45.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1584, 'NS0672/0135/2023', '1', 14, 1, 4, 4, '83.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1585, 'NS5376/0082/2023', '1', 14, 1, 4, 4, '50.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1586, 'NS3228/0285/2022', '1', 14, 1, 4, 4, '60.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1587, 'NS0541/0100/2023', '1', 14, 1, 4, 4, '53.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1588, 'NS3534/0025/2023', '1', 14, 1, 4, 4, '69.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1589, 'NS5251/0066/2023', '1', 14, 1, 4, 4, '52.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1590, 'NS5298/0057/2023', '1', 14, 1, 4, 4, '64.50', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1591, 'NS4897/0091/2023', '1', 14, 1, 4, 4, '65.00', 'superadmin', '2025-04-19 21:08:51', '2025-04-19 21:08:51'),
(1592, 'NS0772/0099/2020', '1', 14, 1, 4, 6, '90.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1593, 'NS5289/0024/2023', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1594, 'NP1153/0013/2023', '1', 14, 1, 4, 6, '66.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1595, 'NS5357/0001/2023', '1', 14, 1, 4, 6, '86.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1596, 'NS0672/0001/2023', '1', 14, 1, 4, 6, '81.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1597, 'NS2367/0005/2023', '1', 14, 1, 4, 6, '87.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1598, 'NS0294/0005/2023', '1', 14, 1, 4, 6, '95.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1599, 'NS0916/0003/2023', '1', 14, 1, 4, 6, '83.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1600, 'NS1375/0002/2023', '1', 14, 1, 4, 6, '86.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1601, 'NS0547/0015/2023', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1602, 'NS0345/0172/2023', '1', 14, 1, 4, 6, '94.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1603, 'NS1394/0007/2023', '1', 14, 1, 4, 6, '88.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1604, 'NS4740/0008/2023', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:28', '2025-04-19 21:09:28'),
(1605, 'NEQ2022001913/2020', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1606, 'NS3371/0102/2023', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1607, 'NS3897/0088/2023', '1', 14, 1, 4, 6, '73.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1608, 'NS3757/0023/2023', '1', 14, 1, 4, 6, '86.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1609, 'NS3981/0011/2023', '1', 14, 1, 4, 6, '75.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1610, 'NS3453/0010/2023', '1', 14, 1, 4, 6, '76.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1611, 'NS5156/0084/2023', '1', 14, 1, 4, 6, '87.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1612, 'NS2510/0010/2023', '1', 14, 1, 4, 6, '87.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1613, 'NS0970/0015/2023', '1', 14, 1, 4, 6, '89.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1614, 'NS3834/0019/2018', '1', 14, 1, 4, 6, '94.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1615, 'NS0850/0022/2022', '1', 14, 1, 4, 6, '87.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1616, 'NS1027/0179/2023', '1', 14, 1, 4, 6, '92.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1617, 'NS4569/0030/2023', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1618, 'NS4740/0041/2023', '1', 14, 1, 4, 6, '74.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1619, 'NS1618/0012/2023', '1', 14, 1, 4, 6, '86.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1620, 'NS1060/0017/2023', '1', 14, 1, 4, 6, '77.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1621, 'NS5033/0020/2022', '1', 14, 1, 4, 6, '95.00', 'superadmin', '2025-04-19 21:09:29', '2025-04-19 21:09:29'),
(1622, 'NS0722/0031/2023', '1', 14, 1, 4, 6, '90.00', 'superadmin', '2025-04-19 21:09:30', '2025-04-19 21:09:30'),
(1623, 'NS4740/0048/2023', '1', 14, 1, 4, 6, '89.00', 'superadmin', '2025-04-19 21:09:30', '2025-04-19 21:09:30'),
(1624, 'NS4498/0051/2020', '1', 14, 1, 4, 6, '87.00', 'superadmin', '2025-04-19 21:09:30', '2025-04-19 21:09:30'),
(1625, 'NS0241/0039/2020', '1', 14, 1, 4, 6, '90.00', 'superadmin', '2025-04-19 21:09:30', '2025-04-19 21:09:30'),
(1626, 'NS0414/0019/2023', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:30', '2025-04-19 21:09:30'),
(1627, 'NS0197/0009/2020', '1', 14, 1, 4, 6, '86.00', 'superadmin', '2025-04-19 21:09:30', '2025-04-19 21:09:30'),
(1628, 'NS3893/0156/2023', '1', 14, 1, 4, 6, '79.00', 'superadmin', '2025-04-19 21:09:30', '2025-04-19 21:09:30'),
(1629, 'NS0672/0057/2023', '1', 14, 1, 4, 6, '86.00', 'superadmin', '2025-04-19 21:09:30', '2025-04-19 21:09:30'),
(1630, 'NS4816/0040/2021', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:30', '2025-04-19 21:09:30'),
(1631, 'NS1633/0164/2023', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:30', '2025-04-19 21:09:30'),
(1632, 'NS4208/0008/2022', '1', 14, 1, 4, 6, '89.00', 'superadmin', '2025-04-19 21:09:30', '2025-04-19 21:09:30'),
(1633, 'NS3897/0105/2023', '1', 14, 1, 4, 6, '88.00', 'superadmin', '2025-04-19 21:09:31', '2025-04-19 21:09:31'),
(1634, 'NS0526/0115/2021', '1', 14, 1, 4, 6, '83.00', 'superadmin', '2025-04-19 21:09:31', '2025-04-19 21:09:31'),
(1635, 'NS0274/0046/2023', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:31', '2025-04-19 21:09:31'),
(1636, 'NS6048/0056/2023', '1', 14, 1, 4, 6, '90.00', 'superadmin', '2025-04-19 21:09:31', '2025-04-19 21:09:31'),
(1637, 'NS4006/0030/2021', '1', 14, 1, 4, 6, '92.00', 'superadmin', '2025-04-19 21:09:31', '2025-04-19 21:09:31'),
(1638, 'NS2505/0044/2017', '1', 14, 1, 4, 6, '81.00', 'superadmin', '2025-04-19 21:09:31', '2025-04-19 21:09:31'),
(1639, 'NS4238/0026/2021', '1', 14, 1, 4, 6, '88.00', 'superadmin', '2025-04-19 21:09:31', '2025-04-19 21:09:31'),
(1640, 'NS3351/0179/2023', '1', 14, 1, 4, 6, '87.00', 'superadmin', '2025-04-19 21:09:31', '2025-04-19 21:09:31'),
(1641, 'NS4117/0256/2022', '1', 14, 1, 4, 6, '92.00', 'superadmin', '2025-04-19 21:09:31', '2025-04-19 21:09:31'),
(1642, 'NS3321/0044/2021', '1', 14, 1, 4, 6, '86.00', 'superadmin', '2025-04-19 21:09:31', '2025-04-19 21:09:31'),
(1643, 'NS5551/0011/2021', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:31', '2025-04-19 21:09:31'),
(1644, 'NS0345/0088/2023', '1', 14, 1, 4, 6, '86.00', 'superadmin', '2025-04-19 21:09:32', '2025-04-19 21:09:32'),
(1645, 'NS4710/0030/2023', '1', 14, 1, 4, 6, '76.00', 'superadmin', '2025-04-19 21:09:32', '2025-04-19 21:09:32'),
(1646, 'NS5822/0117/2023', '1', 14, 1, 4, 6, '87.00', 'superadmin', '2025-04-19 21:09:32', '2025-04-19 21:09:32'),
(1647, 'NS1097/0129/2021', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:32', '2025-04-19 21:09:32'),
(1648, 'NS1633/0136/2021', '1', 14, 1, 4, 6, '95.00', 'superadmin', '2025-04-19 21:09:32', '2025-04-19 21:09:32'),
(1649, 'NS0672/0094/2021', '1', 14, 1, 4, 6, '94.00', 'superadmin', '2025-04-19 21:09:32', '2025-04-19 21:09:32'),
(1650, 'NS2521/0024/2021', '1', 14, 1, 4, 6, '95.00', 'superadmin', '2025-04-19 21:09:32', '2025-04-19 21:09:32'),
(1651, 'NS1581/0075/2023', '1', 14, 1, 4, 6, '82.00', 'superadmin', '2025-04-19 21:09:33', '2025-04-19 21:09:33'),
(1652, 'NS2315/0115/2021', '1', 14, 1, 4, 6, '86.00', 'superadmin', '2025-04-19 21:09:33', '2025-04-19 21:09:33'),
(1653, 'NS2171/0052/2023', '1', 14, 1, 4, 6, '91.00', 'superadmin', '2025-04-19 21:09:33', '2025-04-19 21:09:33'),
(1654, 'NS2424/0074/2023', '1', 14, 1, 4, 6, '75.00', 'superadmin', '2025-04-19 21:09:33', '2025-04-19 21:09:33'),
(1655, 'NS0632/0053/2023', '1', 14, 1, 4, 6, '79.00', 'superadmin', '2025-04-19 21:09:33', '2025-04-19 21:09:33'),
(1656, 'NS0672/0135/2023', '1', 14, 1, 4, 6, '87.00', 'superadmin', '2025-04-19 21:09:33', '2025-04-19 21:09:33'),
(1657, 'NS5376/0082/2023', '1', 14, 1, 4, 6, '86.00', 'superadmin', '2025-04-19 21:09:33', '2025-04-19 21:09:33'),
(1658, 'NS3228/0285/2022', '1', 14, 1, 4, 6, '90.00', 'superadmin', '2025-04-19 21:09:33', '2025-04-19 21:09:33'),
(1659, 'NS0541/0100/2023', '1', 14, 1, 4, 6, '95.00', 'superadmin', '2025-04-19 21:09:34', '2025-04-19 21:09:34'),
(1660, 'NS3534/0025/2023', '1', 14, 1, 4, 6, '89.00', 'superadmin', '2025-04-19 21:09:34', '2025-04-19 21:09:34'),
(1661, 'NS5251/0066/2023', '1', 14, 1, 4, 6, '89.00', 'superadmin', '2025-04-19 21:09:34', '2025-04-19 21:09:34'),
(1662, 'NS5298/0057/2023', '1', 14, 1, 4, 6, '74.00', 'superadmin', '2025-04-19 21:09:34', '2025-04-19 21:09:34'),
(1663, 'NS4897/0091/2023', '1', 14, 1, 4, 6, '50.00', 'superadmin', '2025-04-19 21:09:34', '2025-04-19 21:09:34'),
(1664, 'NS0772/0099/2020', '1', 14, 1, 4, 5, '98.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1665, 'NS5289/0024/2023', '1', 14, 1, 4, 5, '96.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1666, 'NP1153/0013/2023', '1', 14, 1, 4, 5, '96.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1667, 'NS5357/0001/2023', '1', 14, 1, 4, 5, '88.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1668, 'NS0672/0001/2023', '1', 14, 1, 4, 5, '88.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1669, 'NS2367/0005/2023', '1', 14, 1, 4, 5, '87.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1670, 'NS0294/0005/2023', '1', 14, 1, 4, 5, '90.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1671, 'NS0916/0003/2023', '1', 14, 1, 4, 5, '90.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1672, 'NS1375/0002/2023', '1', 14, 1, 4, 5, '92.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1673, 'NS0547/0015/2023', '1', 14, 1, 4, 5, '80.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1674, 'NS0345/0172/2023', '1', 14, 1, 4, 5, '91.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1675, 'NS1394/0007/2023', '1', 14, 1, 4, 5, '90.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1676, 'NS4740/0008/2023', '1', 14, 1, 4, 5, '95.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1677, 'NEQ2022001913/2020', '1', 14, 1, 4, 5, '75.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1678, 'NS3371/0102/2023', '1', 14, 1, 4, 5, '94.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1679, 'NS3897/0088/2023', '1', 14, 1, 4, 5, '95.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1680, 'NS3757/0023/2023', '1', 14, 1, 4, 5, '96.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1681, 'NS3981/0011/2023', '1', 14, 1, 4, 5, '90.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1682, 'NS3453/0010/2023', '1', 14, 1, 4, 5, '86.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1683, 'NS5156/0084/2023', '1', 14, 1, 4, 5, '95.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1684, 'NS2510/0010/2023', '1', 14, 1, 4, 5, '97.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1685, 'NS0970/0015/2023', '1', 14, 1, 4, 5, '96.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1686, 'NS3834/0019/2018', '1', 14, 1, 4, 5, '95.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1687, 'NS0850/0022/2022', '1', 14, 1, 4, 5, '89.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1688, 'NS1027/0179/2023', '1', 14, 1, 4, 5, '92.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1689, 'NS4569/0030/2023', '1', 14, 1, 4, 5, '83.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1690, 'NS4740/0041/2023', '1', 14, 1, 4, 5, '92.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1691, 'NS1618/0012/2023', '1', 14, 1, 4, 5, '92.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1692, 'NS1060/0017/2023', '1', 14, 1, 4, 5, '98.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1693, 'NS5033/0020/2022', '1', 14, 1, 4, 5, '93.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1694, 'NS0722/0031/2023', '1', 14, 1, 4, 5, '92.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1695, 'NS4740/0048/2023', '1', 14, 1, 4, 5, '90.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1696, 'NS4498/0051/2020', '1', 14, 1, 4, 5, '87.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1697, 'NS0241/0039/2020', '1', 14, 1, 4, 5, '95.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1698, 'NS0414/0019/2023', '1', 14, 1, 4, 5, '97.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1699, 'NS0197/0009/2020', '1', 14, 1, 4, 5, '90.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1700, 'NS3893/0156/2023', '1', 14, 1, 4, 5, '93.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1701, 'NS0672/0057/2023', '1', 14, 1, 4, 5, '86.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1702, 'NS4816/0040/2021', '1', 14, 1, 4, 5, '88.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1703, 'NS1633/0164/2023', '1', 14, 1, 4, 5, '91.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1704, 'NS4208/0008/2022', '1', 14, 1, 4, 5, '80.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1705, 'NS3897/0105/2023', '1', 14, 1, 4, 5, '96.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1706, 'NS0526/0115/2021', '1', 14, 1, 4, 5, '89.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1707, 'NS0274/0046/2023', '1', 14, 1, 4, 5, '96.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1708, 'NS6048/0056/2023', '1', 14, 1, 4, 5, '94.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1709, 'NS4006/0030/2021', '1', 14, 1, 4, 5, '94.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1710, 'NS2505/0044/2017', '1', 14, 1, 4, 5, '84.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1711, 'NS4238/0026/2021', '1', 14, 1, 4, 5, '93.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1712, 'NS3351/0179/2023', '1', 14, 1, 4, 5, '97.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1713, 'NS4117/0256/2022', '1', 14, 1, 4, 5, '92.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1714, 'NS3321/0044/2021', '1', 14, 1, 4, 5, '86.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1715, 'NS5551/0011/2021', '1', 14, 1, 4, 5, '89.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1716, 'NS0345/0088/2023', '1', 14, 1, 4, 5, '94.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1717, 'NS4710/0030/2023', '1', 14, 1, 4, 5, '93.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1718, 'NS5822/0117/2023', '1', 14, 1, 4, 5, '89.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1719, 'NS1097/0129/2021', '1', 14, 1, 4, 5, '96.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1720, 'NS1633/0136/2021', '1', 14, 1, 4, 5, '98.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1721, 'NS0672/0094/2021', '1', 14, 1, 4, 5, '92.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1722, 'NS2521/0024/2021', '1', 14, 1, 4, 5, '96.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1723, 'NS1581/0075/2023', '1', 14, 1, 4, 5, '91.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1724, 'NS2315/0115/2021', '1', 14, 1, 4, 5, '90.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1725, 'NS2171/0052/2023', '1', 14, 1, 4, 5, '83.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1726, 'NS2424/0074/2023', '1', 14, 1, 4, 5, '92.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1727, 'NS0632/0053/2023', '1', 14, 1, 4, 5, '97.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1728, 'NS0672/0135/2023', '1', 14, 1, 4, 5, '77.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1729, 'NS5376/0082/2023', '1', 14, 1, 4, 5, '90.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1730, 'NS3228/0285/2022', '1', 14, 1, 4, 5, '86.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1731, 'NS0541/0100/2023', '1', 14, 1, 4, 5, '95.50', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1732, 'NS3534/0025/2023', '1', 14, 1, 4, 5, '100.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1733, 'NS5251/0066/2023', '1', 14, 1, 4, 5, '86.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1734, 'NS5298/0057/2023', '1', 14, 1, 4, 5, '91.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1735, 'NS4897/0091/2023', '1', 14, 1, 4, 5, '79.00', 'superadmin', '2025-04-19 21:10:18', '2025-04-19 21:10:18'),
(1736, 'NS0772/0099/2020', '1', 14, 1, 4, 7, '94.00', 'superadmin', '2025-04-19 21:10:51', '2025-04-19 21:10:51'),
(1737, 'NS5289/0024/2023', '1', 14, 1, 4, 7, '96.00', 'superadmin', '2025-04-19 21:10:51', '2025-04-19 21:10:51'),
(1738, 'NP1153/0013/2023', '1', 14, 1, 4, 7, '99.00', 'superadmin', '2025-04-19 21:10:51', '2025-04-19 21:10:51'),
(1739, 'NS5357/0001/2023', '1', 14, 1, 4, 7, '91.00', 'superadmin', '2025-04-19 21:10:51', '2025-04-19 21:10:51'),
(1740, 'NS0672/0001/2023', '1', 14, 1, 4, 7, '93.00', 'superadmin', '2025-04-19 21:10:51', '2025-04-19 21:10:51'),
(1741, 'NS2367/0005/2023', '1', 14, 1, 4, 7, '93.00', 'superadmin', '2025-04-19 21:10:51', '2025-04-19 21:10:51'),
(1742, 'NS0294/0005/2023', '1', 14, 1, 4, 7, '94.00', 'superadmin', '2025-04-19 21:10:52', '2025-04-19 21:10:52'),
(1743, 'NS0916/0003/2023', '1', 14, 1, 4, 7, '90.00', 'superadmin', '2025-04-19 21:10:52', '2025-04-19 21:10:52'),
(1744, 'NS1375/0002/2023', '1', 14, 1, 4, 7, '93.00', 'superadmin', '2025-04-19 21:10:52', '2025-04-19 21:10:52'),
(1745, 'NS0547/0015/2023', '1', 14, 1, 4, 7, '94.00', 'superadmin', '2025-04-19 21:10:52', '2025-04-19 21:10:52'),
(1746, 'NS0345/0172/2023', '1', 14, 1, 4, 7, '99.00', 'superadmin', '2025-04-19 21:10:52', '2025-04-19 21:10:52'),
(1747, 'NS1394/0007/2023', '1', 14, 1, 4, 7, '96.00', 'superadmin', '2025-04-19 21:10:52', '2025-04-19 21:10:52'),
(1748, 'NS4740/0008/2023', '1', 14, 1, 4, 7, '97.00', 'superadmin', '2025-04-19 21:10:52', '2025-04-19 21:10:52'),
(1749, 'NEQ2022001913/2020', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:10:53', '2025-04-19 21:10:53'),
(1750, 'NS3371/0102/2023', '1', 14, 1, 4, 7, '94.00', 'superadmin', '2025-04-19 21:10:53', '2025-04-19 21:10:53'),
(1751, 'NS3897/0088/2023', '1', 14, 1, 4, 7, '79.00', 'superadmin', '2025-04-19 21:10:53', '2025-04-19 21:10:53'),
(1752, 'NS3757/0023/2023', '1', 14, 1, 4, 7, '89.00', 'superadmin', '2025-04-19 21:10:53', '2025-04-19 21:10:53'),
(1753, 'NS3981/0011/2023', '1', 14, 1, 4, 7, '94.00', 'superadmin', '2025-04-19 21:10:53', '2025-04-19 21:10:53'),
(1754, 'NS3453/0010/2023', '1', 14, 1, 4, 7, '79.00', 'superadmin', '2025-04-19 21:10:53', '2025-04-19 21:10:53'),
(1755, 'NS5156/0084/2023', '1', 14, 1, 4, 7, '89.00', 'superadmin', '2025-04-19 21:10:53', '2025-04-19 21:10:53'),
(1756, 'NS2510/0010/2023', '1', 14, 1, 4, 7, '94.00', 'superadmin', '2025-04-19 21:10:54', '2025-04-19 21:10:54'),
(1757, 'NS0970/0015/2023', '1', 14, 1, 4, 7, '91.00', 'superadmin', '2025-04-19 21:10:54', '2025-04-19 21:10:54'),
(1758, 'NS3834/0019/2018', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:10:54', '2025-04-19 21:10:54'),
(1759, 'NS0850/0022/2022', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:10:54', '2025-04-19 21:10:54'),
(1760, 'NS1027/0179/2023', '1', 14, 1, 4, 7, '91.00', 'superadmin', '2025-04-19 21:10:54', '2025-04-19 21:10:54'),
(1761, 'NS4569/0030/2023', '1', 14, 1, 4, 7, '90.00', 'superadmin', '2025-04-19 21:10:54', '2025-04-19 21:10:54'),
(1762, 'NS4740/0041/2023', '1', 14, 1, 4, 7, '90.00', 'superadmin', '2025-04-19 21:10:54', '2025-04-19 21:10:54'),
(1763, 'NS1618/0012/2023', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:10:55', '2025-04-19 21:10:55'),
(1764, 'NS1060/0017/2023', '1', 14, 1, 4, 7, '93.00', 'superadmin', '2025-04-19 21:10:55', '2025-04-19 21:10:55'),
(1765, 'NS5033/0020/2022', '1', 14, 1, 4, 7, '82.00', 'superadmin', '2025-04-19 21:10:55', '2025-04-19 21:10:55'),
(1766, 'NS0722/0031/2023', '1', 14, 1, 4, 7, '85.00', 'superadmin', '2025-04-19 21:10:55', '2025-04-19 21:10:55'),
(1767, 'NS4740/0048/2023', '1', 14, 1, 4, 7, '90.00', 'superadmin', '2025-04-19 21:10:55', '2025-04-19 21:10:55'),
(1768, 'NS4498/0051/2020', '1', 14, 1, 4, 7, '78.00', 'superadmin', '2025-04-19 21:10:55', '2025-04-19 21:10:55'),
(1769, 'NS0241/0039/2020', '1', 14, 1, 4, 7, '96.00', 'superadmin', '2025-04-19 21:10:55', '2025-04-19 21:10:55'),
(1770, 'NS0414/0019/2023', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:10:55', '2025-04-19 21:10:55'),
(1771, 'NS0197/0009/2020', '1', 14, 1, 4, 7, '93.00', 'superadmin', '2025-04-19 21:10:56', '2025-04-19 21:10:56'),
(1772, 'NS3893/0156/2023', '1', 14, 1, 4, 7, '90.00', 'superadmin', '2025-04-19 21:10:56', '2025-04-19 21:10:56'),
(1773, 'NS0672/0057/2023', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:10:56', '2025-04-19 21:10:56'),
(1774, 'NS4816/0040/2021', '1', 14, 1, 4, 7, '94.00', 'superadmin', '2025-04-19 21:10:56', '2025-04-19 21:10:56'),
(1775, 'NS1633/0164/2023', '1', 14, 1, 4, 7, '96.00', 'superadmin', '2025-04-19 21:10:56', '2025-04-19 21:10:56'),
(1776, 'NS4208/0008/2022', '1', 14, 1, 4, 7, '93.00', 'superadmin', '2025-04-19 21:10:56', '2025-04-19 21:10:56'),
(1777, 'NS3897/0105/2023', '1', 14, 1, 4, 7, '96.00', 'superadmin', '2025-04-19 21:10:56', '2025-04-19 21:10:56'),
(1778, 'NS0526/0115/2021', '1', 14, 1, 4, 7, '83.00', 'superadmin', '2025-04-19 21:10:57', '2025-04-19 21:10:57'),
(1779, 'NS0274/0046/2023', '1', 14, 1, 4, 7, '89.00', 'superadmin', '2025-04-19 21:10:57', '2025-04-19 21:10:57'),
(1780, 'NS6048/0056/2023', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:10:57', '2025-04-19 21:10:57'),
(1781, 'NS4006/0030/2021', '1', 14, 1, 4, 7, '92.00', 'superadmin', '2025-04-19 21:10:57', '2025-04-19 21:10:57'),
(1782, 'NS2505/0044/2017', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:10:57', '2025-04-19 21:10:57'),
(1783, 'NS4238/0026/2021', '1', 14, 1, 4, 7, '92.00', 'superadmin', '2025-04-19 21:10:57', '2025-04-19 21:10:57'),
(1784, 'NS3351/0179/2023', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:10:57', '2025-04-19 21:10:57'),
(1785, 'NS4117/0256/2022', '1', 14, 1, 4, 7, '93.00', 'superadmin', '2025-04-19 21:10:58', '2025-04-19 21:10:58'),
(1786, 'NS3321/0044/2021', '1', 14, 1, 4, 7, '93.00', 'superadmin', '2025-04-19 21:10:58', '2025-04-19 21:10:58'),
(1787, 'NS5551/0011/2021', '1', 14, 1, 4, 7, '91.00', 'superadmin', '2025-04-19 21:10:58', '2025-04-19 21:10:58'),
(1788, 'NS0345/0088/2023', '1', 14, 1, 4, 7, '89.00', 'superadmin', '2025-04-19 21:10:58', '2025-04-19 21:10:58'),
(1789, 'NS4710/0030/2023', '1', 14, 1, 4, 7, '92.00', 'superadmin', '2025-04-19 21:10:58', '2025-04-19 21:10:58'),
(1790, 'NS5822/0117/2023', '1', 14, 1, 4, 7, '97.00', 'superadmin', '2025-04-19 21:10:58', '2025-04-19 21:10:58'),
(1791, 'NS1097/0129/2021', '1', 14, 1, 4, 7, '97.00', 'superadmin', '2025-04-19 21:10:58', '2025-04-19 21:10:58'),
(1792, 'NS1633/0136/2021', '1', 14, 1, 4, 7, '92.00', 'superadmin', '2025-04-19 21:10:58', '2025-04-19 21:10:58'),
(1793, 'NS0672/0094/2021', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:10:59', '2025-04-19 21:10:59'),
(1794, 'NS2521/0024/2021', '1', 14, 1, 4, 7, '97.00', 'superadmin', '2025-04-19 21:10:59', '2025-04-19 21:10:59'),
(1795, 'NS1581/0075/2023', '1', 14, 1, 4, 7, '91.00', 'superadmin', '2025-04-19 21:10:59', '2025-04-19 21:10:59'),
(1796, 'NS2315/0115/2021', '1', 14, 1, 4, 7, '93.00', 'superadmin', '2025-04-19 21:10:59', '2025-04-19 21:10:59'),
(1797, 'NS2171/0052/2023', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:10:59', '2025-04-19 21:10:59'),
(1798, 'NS2424/0074/2023', '1', 14, 1, 4, 7, '75.00', 'superadmin', '2025-04-19 21:10:59', '2025-04-19 21:10:59'),
(1799, 'NS0632/0053/2023', '1', 14, 1, 4, 7, '76.00', 'superadmin', '2025-04-19 21:10:59', '2025-04-19 21:10:59'),
(1800, 'NS0672/0135/2023', '1', 14, 1, 4, 7, '95.00', 'superadmin', '2025-04-19 21:11:00', '2025-04-19 21:11:00'),
(1801, 'NS5376/0082/2023', '1', 14, 1, 4, 7, '54.00', 'superadmin', '2025-04-19 21:11:00', '2025-04-19 21:11:00'),
(1802, 'NS3228/0285/2022', '1', 14, 1, 4, 7, '94.00', 'superadmin', '2025-04-19 21:11:00', '2025-04-19 21:11:00'),
(1803, 'NS0541/0100/2023', '1', 14, 1, 4, 7, '94.00', 'superadmin', '2025-04-19 21:11:00', '2025-04-19 21:11:00'),
(1804, 'NS3534/0025/2023', '1', 14, 1, 4, 7, '87.00', 'superadmin', '2025-04-19 21:11:00', '2025-04-19 21:11:00'),
(1805, 'NS5251/0066/2023', '1', 14, 1, 4, 7, '88.00', 'superadmin', '2025-04-19 21:11:00', '2025-04-19 21:11:00'),
(1806, 'NS5298/0057/2023', '1', 14, 1, 4, 7, '79.00', 'superadmin', '2025-04-19 21:11:00', '2025-04-19 21:11:00'),
(1807, 'NS4897/0091/2023', '1', 14, 1, 4, 7, '94.00', 'superadmin', '2025-04-19 21:11:00', '2025-04-19 21:11:00'),
(1808, 'NS0772/0099/2020', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1809, 'NS5289/0024/2023', '1', 14, 1, 5, 1, '85.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1810, 'NP1153/0013/2023', '1', 14, 1, 5, 1, '90.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1811, 'NS5357/0001/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1812, 'NS0672/0001/2023', '1', 14, 1, 5, 1, '100.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1813, 'NS2367/0005/2023', '1', 14, 1, 5, 1, '60.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1814, 'NS0294/0005/2023', '1', 14, 1, 5, 1, '60.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1815, 'NS0916/0003/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1816, 'NS1375/0002/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1817, 'NS0547/0015/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1818, 'NS0345/0172/2023', '1', 14, 1, 5, 1, '65.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1819, 'NS1394/0007/2023', '1', 14, 1, 5, 1, '85.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1820, 'NS4740/0008/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1821, 'NEQ2022001913/2020', '1', 14, 1, 5, 1, '85.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1822, 'NS3371/0102/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1823, 'NS3897/0088/2023', '1', 14, 1, 5, 1, '50.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1824, 'NS3757/0023/2023', '1', 14, 1, 5, 1, '85.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1825, 'NS3981/0011/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1826, 'NS3453/0010/2023', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1827, 'NS5156/0084/2023', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1828, 'NS2510/0010/2023', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1829, 'NS0970/0015/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1830, 'NS3834/0019/2018', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1831, 'NS0850/0022/2022', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1832, 'NS1027/0179/2023', '1', 14, 1, 5, 1, '65.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1833, 'NS4569/0030/2023', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1834, 'NS4740/0041/2023', '1', 14, 1, 5, 1, '65.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1835, 'NS1618/0012/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1836, 'NS1060/0017/2023', '1', 14, 1, 5, 1, '90.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1837, 'NS5033/0020/2022', '1', 14, 1, 5, 1, '60.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1838, 'NS0722/0031/2023', '1', 14, 1, 5, 1, '90.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1839, 'NS4740/0048/2023', '1', 14, 1, 5, 1, '85.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1840, 'NS4498/0051/2020', '1', 14, 1, 5, 1, '100.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1841, 'NS0241/0039/2020', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1842, 'NS0414/0019/2023', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1843, 'NS0197/0009/2020', '1', 14, 1, 5, 1, '90.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1844, 'NS3893/0156/2023', '1', 14, 1, 5, 1, '35.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1845, 'NS0672/0057/2023', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1846, 'NS4816/0040/2021', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1847, 'NS1633/0164/2023', '1', 14, 1, 5, 1, '75.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1848, 'NS4208/0008/2022', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10');
INSERT INTO `exam_category_results` (`id`, `reg_no`, `year_of_study`, `year_id`, `semester_id`, `course_id`, `exam_category_id`, `exam_score`, `uploadedby`, `created_at`, `updated_at`) VALUES
(1849, 'NS3897/0105/2023', '1', 14, 1, 5, 1, '60.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1850, 'NS0526/0115/2021', '1', 14, 1, 5, 1, '85.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1851, 'NS0274/0046/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1852, 'NS6048/0056/2023', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1853, 'NS4006/0030/2021', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1854, 'NS2505/0044/2017', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1855, 'NS4238/0026/2021', '1', 14, 1, 5, 1, '85.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1856, 'NS3351/0179/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1857, 'NS4117/0256/2022', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1858, 'NS3321/0044/2021', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1859, 'NS5551/0011/2021', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1860, 'NS0345/0088/2023', '1', 14, 1, 5, 1, '75.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1861, 'NS4710/0030/2023', '1', 14, 1, 5, 1, '50.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1862, 'NS5822/0117/2023', '1', 14, 1, 5, 1, '90.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1863, 'NS1097/0129/2021', '1', 14, 1, 5, 1, '100.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1864, 'NS1633/0136/2021', '1', 14, 1, 5, 1, '90.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1865, 'NS0672/0094/2021', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1866, 'NS2521/0024/2021', '1', 14, 1, 5, 1, '90.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1867, 'NS1581/0075/2023', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1868, 'NS2315/0115/2021', '1', 14, 1, 5, 1, '100.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1869, 'NS2171/0052/2023', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1870, 'NS2424/0074/2023', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1871, 'NS0632/0053/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1872, 'NS0672/0135/2023', '1', 14, 1, 5, 1, '85.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1873, 'NS5376/0082/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1874, 'NS3228/0285/2022', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1875, 'NS0541/0100/2023', '1', 14, 1, 5, 1, '90.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1876, 'NS3534/0025/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1877, 'NS5251/0066/2023', '1', 14, 1, 5, 1, '70.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1878, 'NS5298/0057/2023', '1', 14, 1, 5, 1, '80.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1879, 'NS4897/0091/2023', '1', 14, 1, 5, 1, '100.00', 'superadmin', '2025-04-19 21:20:10', '2025-04-19 21:20:10'),
(1880, 'NS0772/0099/2020', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1881, 'NS5289/0024/2023', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1882, 'NP1153/0013/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1883, 'NS5357/0001/2023', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1884, 'NS0672/0001/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1885, 'NS2367/0005/2023', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1886, 'NS0294/0005/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1887, 'NS0916/0003/2023', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1888, 'NS1375/0002/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1889, 'NS0547/0015/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1890, 'NS0345/0172/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1891, 'NS1394/0007/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1892, 'NS4740/0008/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1893, 'NEQ2022001913/2020', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1894, 'NS3371/0102/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1895, 'NS3897/0088/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1896, 'NS3757/0023/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1897, 'NS3981/0011/2023', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1898, 'NS3453/0010/2023', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1899, 'NS5156/0084/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1900, 'NS2510/0010/2023', '1', 14, 1, 5, 2, '68.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1901, 'NS0970/0015/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1902, 'NS3834/0019/2018', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1903, 'NS0850/0022/2022', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1904, 'NS1027/0179/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1905, 'NS4569/0030/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1906, 'NS4740/0041/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1907, 'NS1618/0012/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1908, 'NS1060/0017/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1909, 'NS5033/0020/2022', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1910, 'NS0722/0031/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1911, 'NS4740/0048/2023', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1912, 'NS4498/0051/2020', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1913, 'NS0241/0039/2020', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1914, 'NS0414/0019/2023', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1915, 'NS0197/0009/2020', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1916, 'NS3893/0156/2023', '1', 14, 1, 5, 2, '84.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1917, 'NS0672/0057/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1918, 'NS4816/0040/2021', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1919, 'NS1633/0164/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1920, 'NS4208/0008/2022', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1921, 'NS3897/0105/2023', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1922, 'NS0526/0115/2021', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1923, 'NS0274/0046/2023', '1', 14, 1, 5, 2, '90.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1924, 'NS6048/0056/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1925, 'NS4006/0030/2021', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1926, 'NS2505/0044/2017', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1927, 'NS4238/0026/2021', '1', 14, 1, 5, 2, '66.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1928, 'NS3351/0179/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1929, 'NS4117/0256/2022', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1930, 'NS3321/0044/2021', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1931, 'NS5551/0011/2021', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1932, 'NS0345/0088/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1933, 'NS4710/0030/2023', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1934, 'NS5822/0117/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1935, 'NS1097/0129/2021', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1936, 'NS1633/0136/2021', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1937, 'NS0672/0094/2021', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1938, 'NS2521/0024/2021', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1939, 'NS1581/0075/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1940, 'NS2315/0115/2021', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1941, 'NS2171/0052/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1942, 'NS2424/0074/2023', '1', 14, 1, 5, 2, '66.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1943, 'NS0632/0053/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1944, 'NS0672/0135/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1945, 'NS5376/0082/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1946, 'NS3228/0285/2022', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1947, 'NS0541/0100/2023', '1', 14, 1, 5, 2, '92.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1948, 'NS3534/0025/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1949, 'NS5251/0066/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1950, 'NS5298/0057/2023', '1', 14, 1, 5, 2, '84.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1951, 'NS4897/0091/2023', '1', 14, 1, 5, 2, '100.00', 'superadmin', '2025-04-19 21:20:37', '2025-04-19 21:20:37'),
(1952, 'NS0772/0099/2020', '1', 14, 1, 5, 3, '67.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1953, 'NS5289/0024/2023', '1', 14, 1, 5, 3, '85.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1954, 'NP1153/0013/2023', '1', 14, 1, 5, 3, '66.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1955, 'NS5357/0001/2023', '1', 14, 1, 5, 3, '73.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1956, 'NS0672/0001/2023', '1', 14, 1, 5, 3, '66.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1957, 'NS2367/0005/2023', '1', 14, 1, 5, 3, '58.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1958, 'NS0294/0005/2023', '1', 14, 1, 5, 3, '46.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1959, 'NS0916/0003/2023', '1', 14, 1, 5, 3, '58.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1960, 'NS1375/0002/2023', '1', 14, 1, 5, 3, '37.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1961, 'NS0547/0015/2023', '1', 14, 1, 5, 3, '74.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1962, 'NS0345/0172/2023', '1', 14, 1, 5, 3, '57.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1963, 'NS1394/0007/2023', '1', 14, 1, 5, 3, '47.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1964, 'NS4740/0008/2023', '1', 14, 1, 5, 3, '60.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1965, 'NEQ2022001913/2020', '1', 14, 1, 5, 3, '52.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1966, 'NS3371/0102/2023', '1', 14, 1, 5, 3, '66.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1967, 'NS3897/0088/2023', '1', 14, 1, 5, 3, '59.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1968, 'NS3757/0023/2023', '1', 14, 1, 5, 3, '51.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1969, 'NS3981/0011/2023', '1', 14, 1, 5, 3, '80.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1970, 'NS3453/0010/2023', '1', 14, 1, 5, 3, '49.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1971, 'NS5156/0084/2023', '1', 14, 1, 5, 3, '51.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1972, 'NS2510/0010/2023', '1', 14, 1, 5, 3, '67.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1973, 'NS0970/0015/2023', '1', 14, 1, 5, 3, '69.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1974, 'NS3834/0019/2018', '1', 14, 1, 5, 3, '86.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1975, 'NS0850/0022/2022', '1', 14, 1, 5, 3, '63.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1976, 'NS1027/0179/2023', '1', 14, 1, 5, 3, '57.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1977, 'NS4569/0030/2023', '1', 14, 1, 5, 3, '71.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1978, 'NS4740/0041/2023', '1', 14, 1, 5, 3, '56.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1979, 'NS1618/0012/2023', '1', 14, 1, 5, 3, '48.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1980, 'NS1060/0017/2023', '1', 14, 1, 5, 3, '53.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1981, 'NS5033/0020/2022', '1', 14, 1, 5, 3, '74.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1982, 'NS0722/0031/2023', '1', 14, 1, 5, 3, '38.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1983, 'NS4740/0048/2023', '1', 14, 1, 5, 3, '35.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1984, 'NS4498/0051/2020', '1', 14, 1, 5, 3, '70.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1985, 'NS0241/0039/2020', '1', 14, 1, 5, 3, '56.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1986, 'NS0414/0019/2023', '1', 14, 1, 5, 3, '66.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1987, 'NS0197/0009/2020', '1', 14, 1, 5, 3, '51.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1988, 'NS3893/0156/2023', '1', 14, 1, 5, 3, '53.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1989, 'NS0672/0057/2023', '1', 14, 1, 5, 3, '52.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1990, 'NS4816/0040/2021', '1', 14, 1, 5, 3, '63.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1991, 'NS1633/0164/2023', '1', 14, 1, 5, 3, '40.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1992, 'NS4208/0008/2022', '1', 14, 1, 5, 3, '61.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1993, 'NS3897/0105/2023', '1', 14, 1, 5, 3, '59.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1994, 'NS0526/0115/2021', '1', 14, 1, 5, 3, '76.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1995, 'NS0274/0046/2023', '1', 14, 1, 5, 3, '59.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1996, 'NS6048/0056/2023', '1', 14, 1, 5, 3, '81.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1997, 'NS4006/0030/2021', '1', 14, 1, 5, 3, '53.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1998, 'NS2505/0044/2017', '1', 14, 1, 5, 3, '44.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(1999, 'NS4238/0026/2021', '1', 14, 1, 5, 3, '68.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2000, 'NS3351/0179/2023', '1', 14, 1, 5, 3, '60.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2001, 'NS4117/0256/2022', '1', 14, 1, 5, 3, '53.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2002, 'NS3321/0044/2021', '1', 14, 1, 5, 3, '57.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2003, 'NS5551/0011/2021', '1', 14, 1, 5, 3, '57.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2004, 'NS0345/0088/2023', '1', 14, 1, 5, 3, '77.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2005, 'NS4710/0030/2023', '1', 14, 1, 5, 3, '63.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2006, 'NS5822/0117/2023', '1', 14, 1, 5, 3, '81.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2007, 'NS1097/0129/2021', '1', 14, 1, 5, 3, '63.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2008, 'NS1633/0136/2021', '1', 14, 1, 5, 3, '81.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2009, 'NS0672/0094/2021', '1', 14, 1, 5, 3, '45.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2010, 'NS2521/0024/2021', '1', 14, 1, 5, 3, '71.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2011, 'NS1581/0075/2023', '1', 14, 1, 5, 3, '56.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2012, 'NS2315/0115/2021', '1', 14, 1, 5, 3, '67.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2013, 'NS2171/0052/2023', '1', 14, 1, 5, 3, '56.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2014, 'NS2424/0074/2023', '1', 14, 1, 5, 3, '39.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2015, 'NS0632/0053/2023', '1', 14, 1, 5, 3, '63.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2016, 'NS0672/0135/2023', '1', 14, 1, 5, 3, '53.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2017, 'NS5376/0082/2023', '1', 14, 1, 5, 3, '45.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2018, 'NS3228/0285/2022', '1', 14, 1, 5, 3, '59.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2019, 'NS0541/0100/2023', '1', 14, 1, 5, 3, '70.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2020, 'NS3534/0025/2023', '1', 14, 1, 5, 3, '39.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2021, 'NS5251/0066/2023', '1', 14, 1, 5, 3, '60.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2022, 'NS5298/0057/2023', '1', 14, 1, 5, 3, '51.00', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2023, 'NS4897/0091/2023', '1', 14, 1, 5, 3, '61.50', 'superadmin', '2025-04-19 21:22:03', '2025-04-19 21:22:03'),
(2024, 'NS0772/0099/2020', '1', 14, 1, 5, 4, '72.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2025, 'NS5289/0024/2023', '1', 14, 1, 5, 4, '81.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2026, 'NP1153/0013/2023', '1', 14, 1, 5, 4, '41.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2027, 'NS5357/0001/2023', '1', 14, 1, 5, 4, '74.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2028, 'NS0672/0001/2023', '1', 14, 1, 5, 4, '71.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2029, 'NS2367/0005/2023', '1', 14, 1, 5, 4, '35.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2030, 'NS0294/0005/2023', '1', 14, 1, 5, 4, '50.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2031, 'NS0916/0003/2023', '1', 14, 1, 5, 4, '46.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2032, 'NS1375/0002/2023', '1', 14, 1, 5, 4, '44.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2033, 'NS0547/0015/2023', '1', 14, 1, 5, 4, '56.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2034, 'NS0345/0172/2023', '1', 14, 1, 5, 4, '55.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2035, 'NS1394/0007/2023', '1', 14, 1, 5, 4, '46.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2036, 'NS4740/0008/2023', '1', 14, 1, 5, 4, '55.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2037, 'NEQ2022001913/2020', '1', 14, 1, 5, 4, '48.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2038, 'NS3371/0102/2023', '1', 14, 1, 5, 4, '57.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2039, 'NS3897/0088/2023', '1', 14, 1, 5, 4, '47.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2040, 'NS3757/0023/2023', '1', 14, 1, 5, 4, '43.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2041, 'NS3981/0011/2023', '1', 14, 1, 5, 4, '75.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2042, 'NS3453/0010/2023', '1', 14, 1, 5, 4, '49.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2043, 'NS5156/0084/2023', '1', 14, 1, 5, 4, '60.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2044, 'NS2510/0010/2023', '1', 14, 1, 5, 4, '65.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2045, 'NS0970/0015/2023', '1', 14, 1, 5, 4, '68.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2046, 'NS3834/0019/2018', '1', 14, 1, 5, 4, '50.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2047, 'NS0850/0022/2022', '1', 14, 1, 5, 4, '40.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2048, 'NS1027/0179/2023', '1', 14, 1, 5, 4, '55.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2049, 'NS4569/0030/2023', '1', 14, 1, 5, 4, '59.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2050, 'NS4740/0041/2023', '1', 14, 1, 5, 4, '49.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2051, 'NS1618/0012/2023', '1', 14, 1, 5, 4, '40.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2052, 'NS1060/0017/2023', '1', 14, 1, 5, 4, '44.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2053, 'NS5033/0020/2022', '1', 14, 1, 5, 4, '49.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2054, 'NS0722/0031/2023', '1', 14, 1, 5, 4, '43.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2055, 'NS4740/0048/2023', '1', 14, 1, 5, 4, '55.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2056, 'NS4498/0051/2020', '1', 14, 1, 5, 4, '70.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2057, 'NS0241/0039/2020', '1', 14, 1, 5, 4, '48.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2058, 'NS0414/0019/2023', '1', 14, 1, 5, 4, '76.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2059, 'NS0197/0009/2020', '1', 14, 1, 5, 4, '49.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2060, 'NS3893/0156/2023', '1', 14, 1, 5, 4, '49.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2061, 'NS0672/0057/2023', '1', 14, 1, 5, 4, '48.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2062, 'NS4816/0040/2021', '1', 14, 1, 5, 4, '48.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2063, 'NS1633/0164/2023', '1', 14, 1, 5, 4, '39.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2064, 'NS4208/0008/2022', '1', 14, 1, 5, 4, '56.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2065, 'NS3897/0105/2023', '1', 14, 1, 5, 4, '80.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2066, 'NS0526/0115/2021', '1', 14, 1, 5, 4, '62.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2067, 'NS0274/0046/2023', '1', 14, 1, 5, 4, '67.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2068, 'NS6048/0056/2023', '1', 14, 1, 5, 4, '77.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2069, 'NS4006/0030/2021', '1', 14, 1, 5, 4, '54.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2070, 'NS2505/0044/2017', '1', 14, 1, 5, 4, '58.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2071, 'NS4238/0026/2021', '1', 14, 1, 5, 4, '67.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2072, 'NS3351/0179/2023', '1', 14, 1, 5, 4, '61.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2073, 'NS4117/0256/2022', '1', 14, 1, 5, 4, '38.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2074, 'NS3321/0044/2021', '1', 14, 1, 5, 4, '32.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2075, 'NS5551/0011/2021', '1', 14, 1, 5, 4, '53.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2076, 'NS0345/0088/2023', '1', 14, 1, 5, 4, '55.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2077, 'NS4710/0030/2023', '1', 14, 1, 5, 4, '67.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2078, 'NS5822/0117/2023', '1', 14, 1, 5, 4, '74.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2079, 'NS1097/0129/2021', '1', 14, 1, 5, 4, '64.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2080, 'NS1633/0136/2021', '1', 14, 1, 5, 4, '76.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2081, 'NS0672/0094/2021', '1', 14, 1, 5, 4, '57.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2082, 'NS2521/0024/2021', '1', 14, 1, 5, 4, '69.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2083, 'NS1581/0075/2023', '1', 14, 1, 5, 4, '80.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2084, 'NS2315/0115/2021', '1', 14, 1, 5, 4, '47.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2085, 'NS2171/0052/2023', '1', 14, 1, 5, 4, '69.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2086, 'NS2424/0074/2023', '1', 14, 1, 5, 4, '48.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2087, 'NS0632/0053/2023', '1', 14, 1, 5, 4, '25.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2088, 'NS0672/0135/2023', '1', 14, 1, 5, 4, '50.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2089, 'NS5376/0082/2023', '1', 14, 1, 5, 4, '60.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2090, 'NS3228/0285/2022', '1', 14, 1, 5, 4, '36.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2091, 'NS0541/0100/2023', '1', 14, 1, 5, 4, '55.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2092, 'NS3534/0025/2023', '1', 14, 1, 5, 4, '54.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2093, 'NS5251/0066/2023', '1', 14, 1, 5, 4, '62.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2094, 'NS5298/0057/2023', '1', 14, 1, 5, 4, '40.50', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2095, 'NS4897/0091/2023', '1', 14, 1, 5, 4, '50.00', 'superadmin', '2025-04-19 21:22:45', '2025-04-19 21:22:45'),
(2096, 'NS0772/0099/2020', '1', 14, 1, 5, 6, '82.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2097, 'NS5289/0024/2023', '1', 14, 1, 5, 6, '82.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2098, 'NP1153/0013/2023', '1', 14, 1, 5, 6, '80.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2099, 'NS5357/0001/2023', '1', 14, 1, 5, 6, '100.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2100, 'NS0672/0001/2023', '1', 14, 1, 5, 6, '88.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2101, 'NS2367/0005/2023', '1', 14, 1, 5, 6, '100.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2102, 'NS0294/0005/2023', '1', 14, 1, 5, 6, '86.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2103, 'NS0916/0003/2023', '1', 14, 1, 5, 6, '80.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2104, 'NS1375/0002/2023', '1', 14, 1, 5, 6, '78.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2105, 'NS0547/0015/2023', '1', 14, 1, 5, 6, '74.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2106, 'NS0345/0172/2023', '1', 14, 1, 5, 6, '58.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2107, 'NS1394/0007/2023', '1', 14, 1, 5, 6, '84.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2108, 'NS4740/0008/2023', '1', 14, 1, 5, 6, '72.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2109, 'NEQ2022001913/2020', '1', 14, 1, 5, 6, '90.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2110, 'NS3371/0102/2023', '1', 14, 1, 5, 6, '82.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2111, 'NS3897/0088/2023', '1', 14, 1, 5, 6, '60.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2112, 'NS3757/0023/2023', '1', 14, 1, 5, 6, '82.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2113, 'NS3981/0011/2023', '1', 14, 1, 5, 6, '78.00', 'superadmin', '2025-04-19 21:23:21', '2025-04-19 21:23:21'),
(2114, 'NS3453/0010/2023', '1', 14, 1, 5, 6, '90.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2115, 'NS5156/0084/2023', '1', 14, 1, 5, 6, '84.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2116, 'NS2510/0010/2023', '1', 14, 1, 5, 6, '88.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2117, 'NS0970/0015/2023', '1', 14, 1, 5, 6, '91.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2118, 'NS3834/0019/2018', '1', 14, 1, 5, 6, '100.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2119, 'NS0850/0022/2022', '1', 14, 1, 5, 6, '66.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2120, 'NS1027/0179/2023', '1', 14, 1, 5, 6, '100.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2121, 'NS4569/0030/2023', '1', 14, 1, 5, 6, '92.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2122, 'NS4740/0041/2023', '1', 14, 1, 5, 6, '92.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2123, 'NS1618/0012/2023', '1', 14, 1, 5, 6, '76.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2124, 'NS1060/0017/2023', '1', 14, 1, 5, 6, '70.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2125, 'NS5033/0020/2022', '1', 14, 1, 5, 6, '94.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2126, 'NS0722/0031/2023', '1', 14, 1, 5, 6, '78.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2127, 'NS4740/0048/2023', '1', 14, 1, 5, 6, '90.00', 'superadmin', '2025-04-19 21:23:22', '2025-04-19 21:23:22'),
(2128, 'NS4498/0051/2020', '1', 14, 1, 5, 6, '78.00', 'superadmin', '2025-04-19 21:23:23', '2025-04-19 21:23:23'),
(2129, 'NS0241/0039/2020', '1', 14, 1, 5, 6, '74.00', 'superadmin', '2025-04-19 21:23:23', '2025-04-19 21:23:23'),
(2130, 'NS0414/0019/2023', '1', 14, 1, 5, 6, '100.00', 'superadmin', '2025-04-19 21:23:23', '2025-04-19 21:23:23'),
(2131, 'NS0197/0009/2020', '1', 14, 1, 5, 6, '100.00', 'superadmin', '2025-04-19 21:23:23', '2025-04-19 21:23:23'),
(2132, 'NS3893/0156/2023', '1', 14, 1, 5, 6, '74.00', 'superadmin', '2025-04-19 21:23:23', '2025-04-19 21:23:23'),
(2133, 'NS0672/0057/2023', '1', 14, 1, 5, 6, '86.00', 'superadmin', '2025-04-19 21:23:23', '2025-04-19 21:23:23'),
(2134, 'NS4816/0040/2021', '1', 14, 1, 5, 6, '88.00', 'superadmin', '2025-04-19 21:23:23', '2025-04-19 21:23:23'),
(2135, 'NS1633/0164/2023', '1', 14, 1, 5, 6, '66.00', 'superadmin', '2025-04-19 21:23:23', '2025-04-19 21:23:23'),
(2136, 'NS4208/0008/2022', '1', 14, 1, 5, 6, '90.00', 'superadmin', '2025-04-19 21:23:23', '2025-04-19 21:23:23'),
(2137, 'NS3897/0105/2023', '1', 14, 1, 5, 6, '84.00', 'superadmin', '2025-04-19 21:23:23', '2025-04-19 21:23:23'),
(2138, 'NS0526/0115/2021', '1', 14, 1, 5, 6, '84.00', 'superadmin', '2025-04-19 21:23:23', '2025-04-19 21:23:23'),
(2139, 'NS0274/0046/2023', '1', 14, 1, 5, 6, '90.00', 'superadmin', '2025-04-19 21:23:24', '2025-04-19 21:23:24'),
(2140, 'NS6048/0056/2023', '1', 14, 1, 5, 6, '96.00', 'superadmin', '2025-04-19 21:23:24', '2025-04-19 21:23:24'),
(2141, 'NS4006/0030/2021', '1', 14, 1, 5, 6, '68.00', 'superadmin', '2025-04-19 21:23:24', '2025-04-19 21:23:24'),
(2142, 'NS2505/0044/2017', '1', 14, 1, 5, 6, '94.00', 'superadmin', '2025-04-19 21:23:24', '2025-04-19 21:23:24'),
(2143, 'NS4238/0026/2021', '1', 14, 1, 5, 6, '84.00', 'superadmin', '2025-04-19 21:23:24', '2025-04-19 21:23:24'),
(2144, 'NS3351/0179/2023', '1', 14, 1, 5, 6, '78.00', 'superadmin', '2025-04-19 21:23:24', '2025-04-19 21:23:24'),
(2145, 'NS4117/0256/2022', '1', 14, 1, 5, 6, '64.00', 'superadmin', '2025-04-19 21:23:24', '2025-04-19 21:23:24'),
(2146, 'NS3321/0044/2021', '1', 14, 1, 5, 6, '84.00', 'superadmin', '2025-04-19 21:23:24', '2025-04-19 21:23:24'),
(2147, 'NS5551/0011/2021', '1', 14, 1, 5, 6, '64.00', 'superadmin', '2025-04-19 21:23:24', '2025-04-19 21:23:24'),
(2148, 'NS0345/0088/2023', '1', 14, 1, 5, 6, '94.00', 'superadmin', '2025-04-19 21:23:24', '2025-04-19 21:23:24'),
(2149, 'NS4710/0030/2023', '1', 14, 1, 5, 6, '50.00', 'superadmin', '2025-04-19 21:23:24', '2025-04-19 21:23:24'),
(2150, 'NS5822/0117/2023', '1', 14, 1, 5, 6, '97.00', 'superadmin', '2025-04-19 21:23:25', '2025-04-19 21:23:25'),
(2151, 'NS1097/0129/2021', '1', 14, 1, 5, 6, '80.00', 'superadmin', '2025-04-19 21:23:25', '2025-04-19 21:23:25'),
(2152, 'NS1633/0136/2021', '1', 14, 1, 5, 6, '100.00', 'superadmin', '2025-04-19 21:23:25', '2025-04-19 21:23:25'),
(2153, 'NS0672/0094/2021', '1', 14, 1, 5, 6, '90.00', 'superadmin', '2025-04-19 21:23:25', '2025-04-19 21:23:25'),
(2154, 'NS2521/0024/2021', '1', 14, 1, 5, 6, '80.00', 'superadmin', '2025-04-19 21:23:25', '2025-04-19 21:23:25'),
(2155, 'NS1581/0075/2023', '1', 14, 1, 5, 6, '52.00', 'superadmin', '2025-04-19 21:23:25', '2025-04-19 21:23:25'),
(2156, 'NS2315/0115/2021', '1', 14, 1, 5, 6, '88.00', 'superadmin', '2025-04-19 21:23:25', '2025-04-19 21:23:25'),
(2157, 'NS2171/0052/2023', '1', 14, 1, 5, 6, '58.00', 'superadmin', '2025-04-19 21:23:25', '2025-04-19 21:23:25'),
(2158, 'NS2424/0074/2023', '1', 14, 1, 5, 6, '68.00', 'superadmin', '2025-04-19 21:23:25', '2025-04-19 21:23:25'),
(2159, 'NS0632/0053/2023', '1', 14, 1, 5, 6, '94.00', 'superadmin', '2025-04-19 21:23:26', '2025-04-19 21:23:26'),
(2160, 'NS0672/0135/2023', '1', 14, 1, 5, 6, '75.00', 'superadmin', '2025-04-19 21:23:26', '2025-04-19 21:23:26'),
(2161, 'NS5376/0082/2023', '1', 14, 1, 5, 6, '90.00', 'superadmin', '2025-04-19 21:23:26', '2025-04-19 21:23:26'),
(2162, 'NS3228/0285/2022', '1', 14, 1, 5, 6, '80.00', 'superadmin', '2025-04-19 21:23:26', '2025-04-19 21:23:26'),
(2163, 'NS0541/0100/2023', '1', 14, 1, 5, 6, '96.00', 'superadmin', '2025-04-19 21:23:26', '2025-04-19 21:23:26'),
(2164, 'NS3534/0025/2023', '1', 14, 1, 5, 6, '64.00', 'superadmin', '2025-04-19 21:23:26', '2025-04-19 21:23:26'),
(2165, 'NS5251/0066/2023', '1', 14, 1, 5, 6, '78.00', 'superadmin', '2025-04-19 21:23:26', '2025-04-19 21:23:26'),
(2166, 'NS5298/0057/2023', '1', 14, 1, 5, 6, '84.00', 'superadmin', '2025-04-19 21:23:26', '2025-04-19 21:23:26'),
(2167, 'NS4897/0091/2023', '1', 14, 1, 5, 6, '60.00', 'superadmin', '2025-04-19 21:23:27', '2025-04-19 21:23:27'),
(2168, 'NS0772/0099/2020', '1', 14, 1, 5, 5, '94.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2169, 'NS5289/0024/2023', '1', 14, 1, 5, 5, '99.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2170, 'NP1153/0013/2023', '1', 14, 1, 5, 5, '94.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2171, 'NS5357/0001/2023', '1', 14, 1, 5, 5, '91.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2172, 'NS0672/0001/2023', '1', 14, 1, 5, 5, '94.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2173, 'NS2367/0005/2023', '1', 14, 1, 5, 5, '88.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2174, 'NS0294/0005/2023', '1', 14, 1, 5, 5, '97.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2175, 'NS0916/0003/2023', '1', 14, 1, 5, 5, '88.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2176, 'NS1375/0002/2023', '1', 14, 1, 5, 5, '85.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2177, 'NS0547/0015/2023', '1', 14, 1, 5, 5, '89.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2178, 'NS0345/0172/2023', '1', 14, 1, 5, 5, '87.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2179, 'NS1394/0007/2023', '1', 14, 1, 5, 5, '88.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2180, 'NS4740/0008/2023', '1', 14, 1, 5, 5, '99.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2181, 'NEQ2022001913/2020', '1', 14, 1, 5, 5, '88.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2182, 'NS3371/0102/2023', '1', 14, 1, 5, 5, '97.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2183, 'NS3897/0088/2023', '1', 14, 1, 5, 5, '82.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2184, 'NS3757/0023/2023', '1', 14, 1, 5, 5, '94.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2185, 'NS3981/0011/2023', '1', 14, 1, 5, 5, '98.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2186, 'NS3453/0010/2023', '1', 14, 1, 5, 5, '91.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2187, 'NS5156/0084/2023', '1', 14, 1, 5, 5, '91.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2188, 'NS2510/0010/2023', '1', 14, 1, 5, 5, '87.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2189, 'NS0970/0015/2023', '1', 14, 1, 5, 5, '82.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2190, 'NS3834/0019/2018', '1', 14, 1, 5, 5, '100.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2191, 'NS0850/0022/2022', '1', 14, 1, 5, 5, '86.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2192, 'NS1027/0179/2023', '1', 14, 1, 5, 5, '98.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2193, 'NS4569/0030/2023', '1', 14, 1, 5, 5, '77.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2194, 'NS4740/0041/2023', '1', 14, 1, 5, 5, '97.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2195, 'NS1618/0012/2023', '1', 14, 1, 5, 5, '87.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2196, 'NS1060/0017/2023', '1', 14, 1, 5, 5, '95.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2197, 'NS5033/0020/2022', '1', 14, 1, 5, 5, '79.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2198, 'NS0722/0031/2023', '1', 14, 1, 5, 5, '91.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2199, 'NS4740/0048/2023', '1', 14, 1, 5, 5, '99.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2200, 'NS4498/0051/2020', '1', 14, 1, 5, 5, '89.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2201, 'NS0241/0039/2020', '1', 14, 1, 5, 5, '69.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2202, 'NS0414/0019/2023', '1', 14, 1, 5, 5, '94.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2203, 'NS0197/0009/2020', '1', 14, 1, 5, 5, '100.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2204, 'NS3893/0156/2023', '1', 14, 1, 5, 5, '90.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2205, 'NS0672/0057/2023', '1', 14, 1, 5, 5, '84.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2206, 'NS4816/0040/2021', '1', 14, 1, 5, 5, '64.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2207, 'NS1633/0164/2023', '1', 14, 1, 5, 5, '85.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2208, 'NS4208/0008/2022', '1', 14, 1, 5, 5, '81.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2209, 'NS3897/0105/2023', '1', 14, 1, 5, 5, '96.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2210, 'NS0526/0115/2021', '1', 14, 1, 5, 5, '81.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2211, 'NS0274/0046/2023', '1', 14, 1, 5, 5, '84.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2212, 'NS6048/0056/2023', '1', 14, 1, 5, 5, '87.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2213, 'NS4006/0030/2021', '1', 14, 1, 5, 5, '87.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2214, 'NS2505/0044/2017', '1', 14, 1, 5, 5, '95.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2215, 'NS4238/0026/2021', '1', 14, 1, 5, 5, '88.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2216, 'NS3351/0179/2023', '1', 14, 1, 5, 5, '93.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2217, 'NS4117/0256/2022', '1', 14, 1, 5, 5, '77.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2218, 'NS3321/0044/2021', '1', 14, 1, 5, 5, '52.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2219, 'NS5551/0011/2021', '1', 14, 1, 5, 5, '89.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2220, 'NS0345/0088/2023', '1', 14, 1, 5, 5, '95.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2221, 'NS4710/0030/2023', '1', 14, 1, 5, 5, '75.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2222, 'NS5822/0117/2023', '1', 14, 1, 5, 5, '78.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2223, 'NS1097/0129/2021', '1', 14, 1, 5, 5, '86.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2224, 'NS1633/0136/2021', '1', 14, 1, 5, 5, '83.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2225, 'NS0672/0094/2021', '1', 14, 1, 5, 5, '92.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2226, 'NS2521/0024/2021', '1', 14, 1, 5, 5, '99.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2227, 'NS1581/0075/2023', '1', 14, 1, 5, 5, '85.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2228, 'NS2315/0115/2021', '1', 14, 1, 5, 5, '75.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2229, 'NS2171/0052/2023', '1', 14, 1, 5, 5, '92.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2230, 'NS2424/0074/2023', '1', 14, 1, 5, 5, '72.50', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2231, 'NS0632/0053/2023', '1', 14, 1, 5, 5, '81.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2232, 'NS0672/0135/2023', '1', 14, 1, 5, 5, '51.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2233, 'NS5376/0082/2023', '1', 14, 1, 5, 5, '92.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2234, 'NS3228/0285/2022', '1', 14, 1, 5, 5, '78.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2235, 'NS0541/0100/2023', '1', 14, 1, 5, 5, '90.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2236, 'NS3534/0025/2023', '1', 14, 1, 5, 5, '77.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2237, 'NS5251/0066/2023', '1', 14, 1, 5, 5, '93.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2238, 'NS5298/0057/2023', '1', 14, 1, 5, 5, '87.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2239, 'NS4897/0091/2023', '1', 14, 1, 5, 5, '88.00', 'superadmin', '2025-04-19 21:24:13', '2025-04-19 21:25:23'),
(2240, 'NS0772/0099/2020', '1', 14, 1, 5, 7, '94.00', 'superadmin', '2025-04-19 21:26:20', '2025-04-19 21:26:20'),
(2241, 'NS5289/0024/2023', '1', 14, 1, 5, 7, '96.00', 'superadmin', '2025-04-19 21:26:20', '2025-04-19 21:26:20'),
(2242, 'NP1153/0013/2023', '1', 14, 1, 5, 7, '70.00', 'superadmin', '2025-04-19 21:26:20', '2025-04-19 21:26:20'),
(2243, 'NS5357/0001/2023', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:20', '2025-04-19 21:26:20'),
(2244, 'NS0672/0001/2023', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:21', '2025-04-19 21:26:21'),
(2245, 'NS2367/0005/2023', '1', 14, 1, 5, 7, '88.00', 'superadmin', '2025-04-19 21:26:21', '2025-04-19 21:26:21'),
(2246, 'NS0294/0005/2023', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:21', '2025-04-19 21:26:21'),
(2247, 'NS0916/0003/2023', '1', 14, 1, 5, 7, '96.00', 'superadmin', '2025-04-19 21:26:21', '2025-04-19 21:26:21'),
(2248, 'NS1375/0002/2023', '1', 14, 1, 5, 7, '94.00', 'superadmin', '2025-04-19 21:26:21', '2025-04-19 21:26:21'),
(2249, 'NS0547/0015/2023', '1', 14, 1, 5, 7, '68.00', 'superadmin', '2025-04-19 21:26:21', '2025-04-19 21:26:21'),
(2250, 'NS0345/0172/2023', '1', 14, 1, 5, 7, '88.00', 'superadmin', '2025-04-19 21:26:21', '2025-04-19 21:26:21'),
(2251, 'NS1394/0007/2023', '1', 14, 1, 5, 7, '66.00', 'superadmin', '2025-04-19 21:26:22', '2025-04-19 21:26:22'),
(2252, 'NS4740/0008/2023', '1', 14, 1, 5, 7, '88.00', 'superadmin', '2025-04-19 21:26:22', '2025-04-19 21:26:22'),
(2253, 'NEQ2022001913/2020', '1', 14, 1, 5, 7, '82.00', 'superadmin', '2025-04-19 21:26:22', '2025-04-19 21:26:22'),
(2254, 'NS3371/0102/2023', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:22', '2025-04-19 21:26:22'),
(2255, 'NS3897/0088/2023', '1', 14, 1, 5, 7, '84.00', 'superadmin', '2025-04-19 21:26:22', '2025-04-19 21:26:22'),
(2256, 'NS3757/0023/2023', '1', 14, 1, 5, 7, '80.00', 'superadmin', '2025-04-19 21:26:22', '2025-04-19 21:26:22'),
(2257, 'NS3981/0011/2023', '1', 14, 1, 5, 7, '92.00', 'superadmin', '2025-04-19 21:26:22', '2025-04-19 21:26:22'),
(2258, 'NS3453/0010/2023', '1', 14, 1, 5, 7, '70.00', 'superadmin', '2025-04-19 21:26:22', '2025-04-19 21:26:22'),
(2259, 'NS5156/0084/2023', '1', 14, 1, 5, 7, '70.00', 'superadmin', '2025-04-19 21:26:23', '2025-04-19 21:26:23'),
(2260, 'NS2510/0010/2023', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:23', '2025-04-19 21:26:23'),
(2261, 'NS0970/0015/2023', '1', 14, 1, 5, 7, '90.00', 'superadmin', '2025-04-19 21:26:23', '2025-04-19 21:26:23'),
(2262, 'NS3834/0019/2018', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:23', '2025-04-19 21:26:23'),
(2263, 'NS0850/0022/2022', '1', 14, 1, 5, 7, '66.00', 'superadmin', '2025-04-19 21:26:23', '2025-04-19 21:26:23'),
(2264, 'NS1027/0179/2023', '1', 14, 1, 5, 7, '82.00', 'superadmin', '2025-04-19 21:26:23', '2025-04-19 21:26:23'),
(2265, 'NS4569/0030/2023', '1', 14, 1, 5, 7, '94.00', 'superadmin', '2025-04-19 21:26:23', '2025-04-19 21:26:23'),
(2266, 'NS4740/0041/2023', '1', 14, 1, 5, 7, '92.00', 'superadmin', '2025-04-19 21:26:24', '2025-04-19 21:26:24'),
(2267, 'NS1618/0012/2023', '1', 14, 1, 5, 7, '82.00', 'superadmin', '2025-04-19 21:26:24', '2025-04-19 21:26:24'),
(2268, 'NS1060/0017/2023', '1', 14, 1, 5, 7, '70.00', 'superadmin', '2025-04-19 21:26:24', '2025-04-19 21:26:24'),
(2269, 'NS5033/0020/2022', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:24', '2025-04-19 21:26:24'),
(2270, 'NS0722/0031/2023', '1', 14, 1, 5, 7, '72.00', 'superadmin', '2025-04-19 21:26:24', '2025-04-19 21:26:24'),
(2271, 'NS4740/0048/2023', '1', 14, 1, 5, 7, '66.00', 'superadmin', '2025-04-19 21:26:24', '2025-04-19 21:26:24'),
(2272, 'NS4498/0051/2020', '1', 14, 1, 5, 7, '96.00', 'superadmin', '2025-04-19 21:26:24', '2025-04-19 21:26:24'),
(2273, 'NS0241/0039/2020', '1', 14, 1, 5, 7, '72.00', 'superadmin', '2025-04-19 21:26:24', '2025-04-19 21:26:24'),
(2274, 'NS0414/0019/2023', '1', 14, 1, 5, 7, '90.00', 'superadmin', '2025-04-19 21:26:25', '2025-04-19 21:26:25'),
(2275, 'NS0197/0009/2020', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:25', '2025-04-19 21:26:25'),
(2276, 'NS3893/0156/2023', '1', 14, 1, 5, 7, '78.00', 'superadmin', '2025-04-19 21:26:25', '2025-04-19 21:26:25'),
(2277, 'NS0672/0057/2023', '1', 14, 1, 5, 7, '74.00', 'superadmin', '2025-04-19 21:26:25', '2025-04-19 21:26:25'),
(2278, 'NS4816/0040/2021', '1', 14, 1, 5, 7, '90.00', 'superadmin', '2025-04-19 21:26:25', '2025-04-19 21:26:25'),
(2279, 'NS1633/0164/2023', '1', 14, 1, 5, 7, '92.00', 'superadmin', '2025-04-19 21:26:25', '2025-04-19 21:26:25'),
(2280, 'NS4208/0008/2022', '1', 14, 1, 5, 7, '86.00', 'superadmin', '2025-04-19 21:26:25', '2025-04-19 21:26:25'),
(2281, 'NS3897/0105/2023', '1', 14, 1, 5, 7, '92.00', 'superadmin', '2025-04-19 21:26:26', '2025-04-19 21:26:26'),
(2282, 'NS0526/0115/2021', '1', 14, 1, 5, 7, '84.00', 'superadmin', '2025-04-19 21:26:26', '2025-04-19 21:26:26'),
(2283, 'NS0274/0046/2023', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:26', '2025-04-19 21:26:26'),
(2284, 'NS6048/0056/2023', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:26', '2025-04-19 21:26:26'),
(2285, 'NS4006/0030/2021', '1', 14, 1, 5, 7, '70.00', 'superadmin', '2025-04-19 21:26:26', '2025-04-19 21:26:26'),
(2286, 'NS2505/0044/2017', '1', 14, 1, 5, 7, '98.00', 'superadmin', '2025-04-19 21:26:26', '2025-04-19 21:26:26'),
(2287, 'NS4238/0026/2021', '1', 14, 1, 5, 7, '92.00', 'superadmin', '2025-04-19 21:26:26', '2025-04-19 21:26:26'),
(2288, 'NS3351/0179/2023', '1', 14, 1, 5, 7, '82.00', 'superadmin', '2025-04-19 21:26:27', '2025-04-19 21:26:27');
INSERT INTO `exam_category_results` (`id`, `reg_no`, `year_of_study`, `year_id`, `semester_id`, `course_id`, `exam_category_id`, `exam_score`, `uploadedby`, `created_at`, `updated_at`) VALUES
(2289, 'NS4117/0256/2022', '1', 14, 1, 5, 7, '58.00', 'superadmin', '2025-04-19 21:26:27', '2025-04-19 21:26:27'),
(2290, 'NS3321/0044/2021', '1', 14, 1, 5, 7, '68.00', 'superadmin', '2025-04-19 21:26:27', '2025-04-19 21:26:27'),
(2291, 'NS5551/0011/2021', '1', 14, 1, 5, 7, '74.00', 'superadmin', '2025-04-19 21:26:27', '2025-04-19 21:26:27'),
(2292, 'NS0345/0088/2023', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:27', '2025-04-19 21:26:27'),
(2293, 'NS4710/0030/2023', '1', 14, 1, 5, 7, '90.00', 'superadmin', '2025-04-19 21:26:27', '2025-04-19 21:26:27'),
(2294, 'NS5822/0117/2023', '1', 14, 1, 5, 7, '96.00', 'superadmin', '2025-04-19 21:26:27', '2025-04-19 21:26:27'),
(2295, 'NS1097/0129/2021', '1', 14, 1, 5, 7, '92.00', 'superadmin', '2025-04-19 21:26:27', '2025-04-19 21:26:27'),
(2296, 'NS1633/0136/2021', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:28', '2025-04-19 21:26:28'),
(2297, 'NS0672/0094/2021', '1', 14, 1, 5, 7, '90.00', 'superadmin', '2025-04-19 21:26:28', '2025-04-19 21:26:28'),
(2298, 'NS2521/0024/2021', '1', 14, 1, 5, 7, '100.00', 'superadmin', '2025-04-19 21:26:28', '2025-04-19 21:26:28'),
(2299, 'NS1581/0075/2023', '1', 14, 1, 5, 7, '86.00', 'superadmin', '2025-04-19 21:26:28', '2025-04-19 21:26:28'),
(2300, 'NS2315/0115/2021', '1', 14, 1, 5, 7, '90.00', 'superadmin', '2025-04-19 21:26:28', '2025-04-19 21:26:28'),
(2301, 'NS2171/0052/2023', '1', 14, 1, 5, 7, '92.00', 'superadmin', '2025-04-19 21:26:28', '2025-04-19 21:26:28'),
(2302, 'NS2424/0074/2023', '1', 14, 1, 5, 7, '82.00', 'superadmin', '2025-04-19 21:26:28', '2025-04-19 21:26:28'),
(2303, 'NS0632/0053/2023', '1', 14, 1, 5, 7, '96.00', 'superadmin', '2025-04-19 21:26:29', '2025-04-19 21:26:29'),
(2304, 'NS0672/0135/2023', '1', 14, 1, 5, 7, '92.00', 'superadmin', '2025-04-19 21:26:29', '2025-04-19 21:26:29'),
(2305, 'NS5376/0082/2023', '1', 14, 1, 5, 7, '96.00', 'superadmin', '2025-04-19 21:26:29', '2025-04-19 21:26:29'),
(2306, 'NS3228/0285/2022', '1', 14, 1, 5, 7, '96.00', 'superadmin', '2025-04-19 21:26:29', '2025-04-19 21:26:29'),
(2307, 'NS0541/0100/2023', '1', 14, 1, 5, 7, '92.00', 'superadmin', '2025-04-19 21:26:29', '2025-04-19 21:26:29'),
(2308, 'NS3534/0025/2023', '1', 14, 1, 5, 7, '84.00', 'superadmin', '2025-04-19 21:26:29', '2025-04-19 21:26:29'),
(2309, 'NS5251/0066/2023', '1', 14, 1, 5, 7, '98.00', 'superadmin', '2025-04-19 21:26:29', '2025-04-19 21:26:29'),
(2310, 'NS5298/0057/2023', '1', 14, 1, 5, 7, '82.00', 'superadmin', '2025-04-19 21:26:29', '2025-04-19 21:26:29'),
(2311, 'NS4897/0091/2023', '1', 14, 1, 5, 7, '74.00', 'superadmin', '2025-04-19 21:26:30', '2025-04-19 21:26:30'),
(2312, 'NS0772/0099/2020', '1', 14, 1, 6, 1, '73.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2313, 'NS5289/0024/2023', '1', 14, 1, 6, 1, '93.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2314, 'NP1153/0013/2023', '1', 14, 1, 6, 1, '80.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2315, 'NS5357/0001/2023', '1', 14, 1, 6, 1, '93.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2316, 'NS0672/0001/2023', '1', 14, 1, 6, 1, '86.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2317, 'NS2367/0005/2023', '1', 14, 1, 6, 1, '60.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2318, 'NS0294/0005/2023', '1', 14, 1, 6, 1, '80.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2319, 'NS0916/0003/2023', '1', 14, 1, 6, 1, '60.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2320, 'NS1375/0002/2023', '1', 14, 1, 6, 1, '86.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2321, 'NS0547/0015/2023', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2322, 'NS0345/0172/2023', '1', 14, 1, 6, 1, '80.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2323, 'NS1394/0007/2023', '1', 14, 1, 6, 1, '60.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2324, 'NS4740/0008/2023', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2325, 'NEQ2022001913/2020', '1', 14, 1, 6, 1, '60.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2326, 'NS3371/0102/2023', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2327, 'NS3897/0088/2023', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2328, 'NS3757/0023/2023', '1', 14, 1, 6, 1, '73.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2329, 'NS3981/0011/2023', '1', 14, 1, 6, 1, '86.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2330, 'NS3453/0010/2023', '1', 14, 1, 6, 1, '73.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2331, 'NS5156/0084/2023', '1', 14, 1, 6, 1, '93.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2332, 'NS2510/0010/2023', '1', 14, 1, 6, 1, '70.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2333, 'NS0970/0015/2023', '1', 14, 1, 6, 1, '80.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2334, 'NS3834/0019/2018', '1', 14, 1, 6, 1, '86.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2335, 'NS0850/0022/2022', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2336, 'NS1027/0179/2023', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2337, 'NS4569/0030/2023', '1', 14, 1, 6, 1, '86.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2338, 'NS4740/0041/2023', '1', 14, 1, 6, 1, '80.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2339, 'NS1618/0012/2023', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2340, 'NS1060/0017/2023', '1', 14, 1, 6, 1, '60.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2341, 'NS5033/0020/2022', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2342, 'NS0722/0031/2023', '1', 14, 1, 6, 1, '86.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2343, 'NS4740/0048/2023', '1', 14, 1, 6, 1, '66.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2344, 'NS4498/0051/2020', '1', 14, 1, 6, 1, '93.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2345, 'NS0241/0039/2020', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2346, 'NS0414/0019/2023', '1', 14, 1, 6, 1, '80.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2347, 'NS0197/0009/2020', '1', 14, 1, 6, 1, '80.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2348, 'NS3893/0156/2023', '1', 14, 1, 6, 1, '86.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2349, 'NS0672/0057/2023', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2350, 'NS4816/0040/2021', '1', 14, 1, 6, 1, '73.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2351, 'NS1633/0164/2023', '1', 14, 1, 6, 1, '66.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2352, 'NS4208/0008/2022', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2353, 'NS3897/0105/2023', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2354, 'NS0526/0115/2021', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2355, 'NS0274/0046/2023', '1', 14, 1, 6, 1, '93.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2356, 'NS6048/0056/2023', '1', 14, 1, 6, 1, '93.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2357, 'NS4006/0030/2021', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2358, 'NS2505/0044/2017', '1', 14, 1, 6, 1, '86.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2359, 'NS4238/0026/2021', '1', 14, 1, 6, 1, '53.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2360, 'NS3351/0179/2023', '1', 14, 1, 6, 1, '60.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2361, 'NS4117/0256/2022', '1', 14, 1, 6, 1, '53.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2362, 'NS3321/0044/2021', '1', 14, 1, 6, 1, '73.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2363, 'NS5551/0011/2021', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2364, 'NS0345/0088/2023', '1', 14, 1, 6, 1, '93.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2365, 'NS4710/0030/2023', '1', 14, 1, 6, 1, '66.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2366, 'NS5822/0117/2023', '1', 14, 1, 6, 1, '93.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2367, 'NS1097/0129/2021', '1', 14, 1, 6, 1, '66.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2368, 'NS1633/0136/2021', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2369, 'NS0672/0094/2021', '1', 14, 1, 6, 1, '93.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2370, 'NS2521/0024/2021', '1', 14, 1, 6, 1, '93.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2371, 'NS1581/0075/2023', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2372, 'NS2315/0115/2021', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2373, 'NS2171/0052/2023', '1', 14, 1, 6, 1, '86.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2374, 'NS2424/0074/2023', '1', 14, 1, 6, 1, '86.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2375, 'NS0632/0053/2023', '1', 14, 1, 6, 1, '66.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2376, 'NS0672/0135/2023', '1', 14, 1, 6, 1, '100.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2377, 'NS5376/0082/2023', '1', 14, 1, 6, 1, '60.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2378, 'NS3228/0285/2022', '1', 14, 1, 6, 1, '73.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2379, 'NS0541/0100/2023', '1', 14, 1, 6, 1, '66.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2380, 'NS3534/0025/2023', '1', 14, 1, 6, 1, '86.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2381, 'NS5251/0066/2023', '1', 14, 1, 6, 1, '66.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2382, 'NS5298/0057/2023', '1', 14, 1, 6, 1, '93.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2383, 'NS4897/0091/2023', '1', 14, 1, 6, 1, '60.00', 'superadmin', '2025-04-19 22:06:05', '2025-04-19 22:06:05'),
(2384, 'NS0772/0099/2020', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2385, 'NS5289/0024/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2386, 'NP1153/0013/2023', '1', 14, 1, 6, 2, '80.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2387, 'NS5357/0001/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2388, 'NS0672/0001/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2389, 'NS2367/0005/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2390, 'NS0294/0005/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2391, 'NS0916/0003/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2392, 'NS1375/0002/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2393, 'NS0547/0015/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2394, 'NS0345/0172/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2395, 'NS1394/0007/2023', '1', 14, 1, 6, 2, '73.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2396, 'NS4740/0008/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2397, 'NEQ2022001913/2020', '1', 14, 1, 6, 2, '86.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2398, 'NS3371/0102/2023', '1', 14, 1, 6, 2, '86.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2399, 'NS3897/0088/2023', '1', 14, 1, 6, 2, '93.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2400, 'NS3757/0023/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2401, 'NS3981/0011/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2402, 'NS3453/0010/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2403, 'NS5156/0084/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2404, 'NS2510/0010/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2405, 'NS0970/0015/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2406, 'NS3834/0019/2018', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2407, 'NS0850/0022/2022', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2408, 'NS1027/0179/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2409, 'NS4569/0030/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2410, 'NS4740/0041/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2411, 'NS1618/0012/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2412, 'NS1060/0017/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2413, 'NS5033/0020/2022', '1', 14, 1, 6, 2, '93.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2414, 'NS0722/0031/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2415, 'NS4740/0048/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2416, 'NS4498/0051/2020', '1', 14, 1, 6, 2, '73.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2417, 'NS0241/0039/2020', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2418, 'NS0414/0019/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2419, 'NS0197/0009/2020', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2420, 'NS3893/0156/2023', '1', 14, 1, 6, 2, '73.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2421, 'NS0672/0057/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2422, 'NS4816/0040/2021', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2423, 'NS1633/0164/2023', '1', 14, 1, 6, 2, '73.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2424, 'NS4208/0008/2022', '1', 14, 1, 6, 2, '73.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2425, 'NS3897/0105/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2426, 'NS0526/0115/2021', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2427, 'NS0274/0046/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2428, 'NS6048/0056/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2429, 'NS4006/0030/2021', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2430, 'NS2505/0044/2017', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2431, 'NS4238/0026/2021', '1', 14, 1, 6, 2, '86.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2432, 'NS3351/0179/2023', '1', 14, 1, 6, 2, '86.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2433, 'NS4117/0256/2022', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2434, 'NS3321/0044/2021', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2435, 'NS5551/0011/2021', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2436, 'NS0345/0088/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2437, 'NS4710/0030/2023', '1', 14, 1, 6, 2, '86.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2438, 'NS5822/0117/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2439, 'NS1097/0129/2021', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2440, 'NS1633/0136/2021', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2441, 'NS0672/0094/2021', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2442, 'NS2521/0024/2021', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2443, 'NS1581/0075/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2444, 'NS2315/0115/2021', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2445, 'NS2171/0052/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2446, 'NS2424/0074/2023', '1', 14, 1, 6, 2, '66.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2447, 'NS0632/0053/2023', '1', 14, 1, 6, 2, '93.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2448, 'NS0672/0135/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2449, 'NS5376/0082/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2450, 'NS3228/0285/2022', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2451, 'NS0541/0100/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2452, 'NS3534/0025/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2453, 'NS5251/0066/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2454, 'NS5298/0057/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2455, 'NS4897/0091/2023', '1', 14, 1, 6, 2, '100.00', 'superadmin', '2025-04-19 22:06:29', '2025-04-19 22:06:29'),
(2456, 'NS0772/0099/2020', '1', 14, 1, 6, 3, '93.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2457, 'NS5289/0024/2023', '1', 14, 1, 6, 3, '85.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2458, 'NP1153/0013/2023', '1', 14, 1, 6, 3, '56.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2459, 'NS5357/0001/2023', '1', 14, 1, 6, 3, '93.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2460, 'NS0672/0001/2023', '1', 14, 1, 6, 3, '85.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2461, 'NS2367/0005/2023', '1', 14, 1, 6, 3, '52.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2462, 'NS0294/0005/2023', '1', 14, 1, 6, 3, '80.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2463, 'NS0916/0003/2023', '1', 14, 1, 6, 3, '75.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2464, 'NS1375/0002/2023', '1', 14, 1, 6, 3, '66.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2465, 'NS0547/0015/2023', '1', 14, 1, 6, 3, '76.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2466, 'NS0345/0172/2023', '1', 14, 1, 6, 3, '51.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2467, 'NS1394/0007/2023', '1', 14, 1, 6, 3, '57.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2468, 'NS4740/0008/2023', '1', 14, 1, 6, 3, '85.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2469, 'NEQ2022001913/2020', '1', 14, 1, 6, 3, '44.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2470, 'NS3371/0102/2023', '1', 14, 1, 6, 3, '68.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2471, 'NS3897/0088/2023', '1', 14, 1, 6, 3, '64.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2472, 'NS3757/0023/2023', '1', 14, 1, 6, 3, '57.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2473, 'NS3981/0011/2023', '1', 14, 1, 6, 3, '83.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2474, 'NS3453/0010/2023', '1', 14, 1, 6, 3, '70.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2475, 'NS5156/0084/2023', '1', 14, 1, 6, 3, '59.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2476, 'NS2510/0010/2023', '1', 14, 1, 6, 3, '85.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2477, 'NS0970/0015/2023', '1', 14, 1, 6, 3, '71.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2478, 'NS3834/0019/2018', '1', 14, 1, 6, 3, '78.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2479, 'NS0850/0022/2022', '1', 14, 1, 6, 3, '43.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2480, 'NS1027/0179/2023', '1', 14, 1, 6, 3, '67.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2481, 'NS4569/0030/2023', '1', 14, 1, 6, 3, '84.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2482, 'NS4740/0041/2023', '1', 14, 1, 6, 3, '65.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2483, 'NS1618/0012/2023', '1', 14, 1, 6, 3, '82.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2484, 'NS1060/0017/2023', '1', 14, 1, 6, 3, '61.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2485, 'NS5033/0020/2022', '1', 14, 1, 6, 3, '70.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2486, 'NS0722/0031/2023', '1', 14, 1, 6, 3, '51.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2487, 'NS4740/0048/2023', '1', 14, 1, 6, 3, '56.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2488, 'NS4498/0051/2020', '1', 14, 1, 6, 3, '83.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2489, 'NS0241/0039/2020', '1', 14, 1, 6, 3, '70.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2490, 'NS0414/0019/2023', '1', 14, 1, 6, 3, '88.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2491, 'NS0197/0009/2020', '1', 14, 1, 6, 3, '50.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2492, 'NS3893/0156/2023', '1', 14, 1, 6, 3, '52.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2493, 'NS0672/0057/2023', '1', 14, 1, 6, 3, '72.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2494, 'NS4816/0040/2021', '1', 14, 1, 6, 3, '74.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2495, 'NS1633/0164/2023', '1', 14, 1, 6, 3, '51.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2496, 'NS4208/0008/2022', '1', 14, 1, 6, 3, '69.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2497, 'NS3897/0105/2023', '1', 14, 1, 6, 3, '82.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2498, 'NS0526/0115/2021', '1', 14, 1, 6, 3, '83.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2499, 'NS0274/0046/2023', '1', 14, 1, 6, 3, '63.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2500, 'NS6048/0056/2023', '1', 14, 1, 6, 3, '84.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2501, 'NS4006/0030/2021', '1', 14, 1, 6, 3, '93.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2502, 'NS2505/0044/2017', '1', 14, 1, 6, 3, '55.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2503, 'NS4238/0026/2021', '1', 14, 1, 6, 3, '80.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2504, 'NS3351/0179/2023', '1', 14, 1, 6, 3, '90.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2505, 'NS4117/0256/2022', '1', 14, 1, 6, 3, '67.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2506, 'NS3321/0044/2021', '1', 14, 1, 6, 3, '50.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2507, 'NS5551/0011/2021', '1', 14, 1, 6, 3, '81.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2508, 'NS0345/0088/2023', '1', 14, 1, 6, 3, '87.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2509, 'NS4710/0030/2023', '1', 14, 1, 6, 3, '57.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2510, 'NS5822/0117/2023', '1', 14, 1, 6, 3, '74.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2511, 'NS1097/0129/2021', '1', 14, 1, 6, 3, '85.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2512, 'NS1633/0136/2021', '1', 14, 1, 6, 3, '80.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2513, 'NS0672/0094/2021', '1', 14, 1, 6, 3, '81.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2514, 'NS2521/0024/2021', '1', 14, 1, 6, 3, '77.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2515, 'NS1581/0075/2023', '1', 14, 1, 6, 3, '61.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2516, 'NS2315/0115/2021', '1', 14, 1, 6, 3, '74.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2517, 'NS2171/0052/2023', '1', 14, 1, 6, 3, '85.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2518, 'NS2424/0074/2023', '1', 14, 1, 6, 3, '50.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2519, 'NS0632/0053/2023', '1', 14, 1, 6, 3, '36.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2520, 'NS0672/0135/2023', '1', 14, 1, 6, 3, '50.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2521, 'NS5376/0082/2023', '1', 14, 1, 6, 3, '70.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2522, 'NS3228/0285/2022', '1', 14, 1, 6, 3, '76.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2523, 'NS0541/0100/2023', '1', 14, 1, 6, 3, '76.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2524, 'NS3534/0025/2023', '1', 14, 1, 6, 3, '80.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2525, 'NS5251/0066/2023', '1', 14, 1, 6, 3, '56.00', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2526, 'NS5298/0057/2023', '1', 14, 1, 6, 3, '58.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2527, 'NS4897/0091/2023', '1', 14, 1, 6, 3, '52.50', 'superadmin', '2025-04-19 22:07:05', '2025-04-19 22:07:05'),
(2528, 'NS0772/0099/2020', '1', 14, 1, 6, 4, '80.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2529, 'NS5289/0024/2023', '1', 14, 1, 6, 4, '81.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2530, 'NP1153/0013/2023', '1', 14, 1, 6, 4, '45.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2531, 'NS5357/0001/2023', '1', 14, 1, 6, 4, '85.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2532, 'NS0672/0001/2023', '1', 14, 1, 6, 4, '72.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2533, 'NS2367/0005/2023', '1', 14, 1, 6, 4, '52.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2534, 'NS0294/0005/2023', '1', 14, 1, 6, 4, '56.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2535, 'NS0916/0003/2023', '1', 14, 1, 6, 4, '76.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2536, 'NS1375/0002/2023', '1', 14, 1, 6, 4, '30.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2537, 'NS0547/0015/2023', '1', 14, 1, 6, 4, '57.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2538, 'NS0345/0172/2023', '1', 14, 1, 6, 4, '55.50', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2539, 'NS1394/0007/2023', '1', 14, 1, 6, 4, '65.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2540, 'NS4740/0008/2023', '1', 14, 1, 6, 4, '71.50', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2541, 'NEQ2022001913/2020', '1', 14, 1, 6, 4, '56.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2542, 'NS3371/0102/2023', '1', 14, 1, 6, 4, '64.00', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2543, 'NS3897/0088/2023', '1', 14, 1, 6, 4, '80.50', 'superadmin', '2025-04-19 22:07:58', '2025-04-19 22:07:58'),
(2544, 'NS3757/0023/2023', '1', 14, 1, 6, 4, '50.00', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2545, 'NS3981/0011/2023', '1', 14, 1, 6, 4, '80.00', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2546, 'NS3453/0010/2023', '1', 14, 1, 6, 4, '43.50', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2547, 'NS5156/0084/2023', '1', 14, 1, 6, 4, '53.00', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2548, 'NS2510/0010/2023', '1', 14, 1, 6, 4, '77.50', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2549, 'NS0970/0015/2023', '1', 14, 1, 6, 4, '68.50', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2550, 'NS3834/0019/2018', '1', 14, 1, 6, 4, '80.00', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2551, 'NS0850/0022/2022', '1', 14, 1, 6, 4, '60.00', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2552, 'NS1027/0179/2023', '1', 14, 1, 6, 4, '73.00', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2553, 'NS4569/0030/2023', '1', 14, 1, 6, 4, '88.50', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2554, 'NS4740/0041/2023', '1', 14, 1, 6, 4, '45.50', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2555, 'NS1618/0012/2023', '1', 14, 1, 6, 4, '50.50', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2556, 'NS1060/0017/2023', '1', 14, 1, 6, 4, '51.00', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2557, 'NS5033/0020/2022', '1', 14, 1, 6, 4, '78.00', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2558, 'NS0722/0031/2023', '1', 14, 1, 6, 4, '33.00', 'superadmin', '2025-04-19 22:07:59', '2025-04-19 22:07:59'),
(2559, 'NS4740/0048/2023', '1', 14, 1, 6, 4, '34.50', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2560, 'NS4498/0051/2020', '1', 14, 1, 6, 4, '46.00', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2561, 'NS0241/0039/2020', '1', 14, 1, 6, 4, '58.50', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2562, 'NS0414/0019/2023', '1', 14, 1, 6, 4, '84.00', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2563, 'NS0197/0009/2020', '1', 14, 1, 6, 4, '51.50', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2564, 'NS3893/0156/2023', '1', 14, 1, 6, 4, '57.00', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2565, 'NS0672/0057/2023', '1', 14, 1, 6, 4, '53.00', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2566, 'NS4816/0040/2021', '1', 14, 1, 6, 4, '56.50', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2567, 'NS1633/0164/2023', '1', 14, 1, 6, 4, '59.00', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2568, 'NS4208/0008/2022', '1', 14, 1, 6, 4, '60.50', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2569, 'NS3897/0105/2023', '1', 14, 1, 6, 4, '75.50', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2570, 'NS0526/0115/2021', '1', 14, 1, 6, 4, '76.50', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2571, 'NS0274/0046/2023', '1', 14, 1, 6, 4, '61.00', 'superadmin', '2025-04-19 22:08:00', '2025-04-19 22:08:00'),
(2572, 'NS6048/0056/2023', '1', 14, 1, 6, 4, '65.00', 'superadmin', '2025-04-19 22:08:01', '2025-04-19 22:08:01'),
(2573, 'NS4006/0030/2021', '1', 14, 1, 6, 4, '73.00', 'superadmin', '2025-04-19 22:08:01', '2025-04-19 22:08:01'),
(2574, 'NS2505/0044/2017', '1', 14, 1, 6, 4, '75.00', 'superadmin', '2025-04-19 22:08:01', '2025-04-19 22:08:01'),
(2575, 'NS4238/0026/2021', '1', 14, 1, 6, 4, '65.50', 'superadmin', '2025-04-19 22:08:01', '2025-04-19 22:08:01'),
(2576, 'NS3351/0179/2023', '1', 14, 1, 6, 4, '84.00', 'superadmin', '2025-04-19 22:08:01', '2025-04-19 22:08:01'),
(2577, 'NS4117/0256/2022', '1', 14, 1, 6, 4, '50.00', 'superadmin', '2025-04-19 22:08:01', '2025-04-19 22:08:01'),
(2578, 'NS3321/0044/2021', '1', 14, 1, 6, 4, '68.00', 'superadmin', '2025-04-19 22:08:01', '2025-04-19 22:08:01'),
(2579, 'NS5551/0011/2021', '1', 14, 1, 6, 4, '70.00', 'superadmin', '2025-04-19 22:08:01', '2025-04-19 22:08:01'),
(2580, 'NS0345/0088/2023', '1', 14, 1, 6, 4, '69.50', 'superadmin', '2025-04-19 22:08:01', '2025-04-19 22:08:01'),
(2581, 'NS4710/0030/2023', '1', 14, 1, 6, 4, '91.50', 'superadmin', '2025-04-19 22:08:01', '2025-04-19 22:08:01'),
(2582, 'NS5822/0117/2023', '1', 14, 1, 6, 4, '81.00', 'superadmin', '2025-04-19 22:08:02', '2025-04-19 22:08:02'),
(2583, 'NS1097/0129/2021', '1', 14, 1, 6, 4, '65.00', 'superadmin', '2025-04-19 22:08:02', '2025-04-19 22:08:02'),
(2584, 'NS1633/0136/2021', '1', 14, 1, 6, 4, '77.50', 'superadmin', '2025-04-19 22:08:02', '2025-04-19 22:08:02'),
(2585, 'NS0672/0094/2021', '1', 14, 1, 6, 4, '82.00', 'superadmin', '2025-04-19 22:08:02', '2025-04-19 22:08:02'),
(2586, 'NS2521/0024/2021', '1', 14, 1, 6, 4, '66.50', 'superadmin', '2025-04-19 22:08:02', '2025-04-19 22:08:02'),
(2587, 'NS1581/0075/2023', '1', 14, 1, 6, 4, '61.00', 'superadmin', '2025-04-19 22:08:02', '2025-04-19 22:08:02'),
(2588, 'NS2315/0115/2021', '1', 14, 1, 6, 4, '71.50', 'superadmin', '2025-04-19 22:08:02', '2025-04-19 22:08:02'),
(2589, 'NS2171/0052/2023', '1', 14, 1, 6, 4, '71.00', 'superadmin', '2025-04-19 22:08:02', '2025-04-19 22:08:02'),
(2590, 'NS2424/0074/2023', '1', 14, 1, 6, 4, '42.50', 'superadmin', '2025-04-19 22:08:03', '2025-04-19 22:08:03'),
(2591, 'NS0632/0053/2023', '1', 14, 1, 6, 4, '65.50', 'superadmin', '2025-04-19 22:08:03', '2025-04-19 22:08:03'),
(2592, 'NS0672/0135/2023', '1', 14, 1, 6, 4, '50.00', 'superadmin', '2025-04-19 22:08:03', '2025-04-19 22:08:03'),
(2593, 'NS5376/0082/2023', '1', 14, 1, 6, 4, '53.50', 'superadmin', '2025-04-19 22:08:03', '2025-04-19 22:08:03'),
(2594, 'NS3228/0285/2022', '1', 14, 1, 6, 4, '64.00', 'superadmin', '2025-04-19 22:08:03', '2025-04-19 22:08:03'),
(2595, 'NS0541/0100/2023', '1', 14, 1, 6, 4, '68.00', 'superadmin', '2025-04-19 22:08:03', '2025-04-19 22:08:03'),
(2596, 'NS3534/0025/2023', '1', 14, 1, 6, 4, '76.50', 'superadmin', '2025-04-19 22:08:03', '2025-04-19 22:08:03'),
(2597, 'NS5251/0066/2023', '1', 14, 1, 6, 4, '41.00', 'superadmin', '2025-04-19 22:08:03', '2025-04-19 22:08:03'),
(2598, 'NS5298/0057/2023', '1', 14, 1, 6, 4, '36.50', 'superadmin', '2025-04-19 22:08:04', '2025-04-19 22:08:04'),
(2599, 'NS4897/0091/2023', '1', 14, 1, 6, 4, '56.50', 'superadmin', '2025-04-19 22:08:04', '2025-04-19 22:08:04'),
(2600, 'NS0772/0099/2020', '1', 14, 1, 6, 5, '94.50', 'superadmin', '2025-04-19 22:08:56', '2025-04-19 22:08:56'),
(2601, 'NS5289/0024/2023', '1', 14, 1, 6, 5, '96.00', 'superadmin', '2025-04-19 22:08:56', '2025-04-19 22:08:56'),
(2602, 'NP1153/0013/2023', '1', 14, 1, 6, 5, '93.00', 'superadmin', '2025-04-19 22:08:56', '2025-04-19 22:08:56'),
(2603, 'NS5357/0001/2023', '1', 14, 1, 6, 5, '93.50', 'superadmin', '2025-04-19 22:08:56', '2025-04-19 22:08:56'),
(2604, 'NS0672/0001/2023', '1', 14, 1, 6, 5, '84.50', 'superadmin', '2025-04-19 22:08:56', '2025-04-19 22:08:56'),
(2605, 'NS2367/0005/2023', '1', 14, 1, 6, 5, '71.50', 'superadmin', '2025-04-19 22:08:56', '2025-04-19 22:08:56'),
(2606, 'NS0294/0005/2023', '1', 14, 1, 6, 5, '92.50', 'superadmin', '2025-04-19 22:08:56', '2025-04-19 22:08:56'),
(2607, 'NS0916/0003/2023', '1', 14, 1, 6, 5, '93.00', 'superadmin', '2025-04-19 22:08:57', '2025-04-19 22:08:57'),
(2608, 'NS1375/0002/2023', '1', 14, 1, 6, 5, '91.50', 'superadmin', '2025-04-19 22:08:57', '2025-04-19 22:08:57'),
(2609, 'NS0547/0015/2023', '1', 14, 1, 6, 5, '85.50', 'superadmin', '2025-04-19 22:08:57', '2025-04-19 22:08:57'),
(2610, 'NS0345/0172/2023', '1', 14, 1, 6, 5, '88.50', 'superadmin', '2025-04-19 22:08:57', '2025-04-19 22:08:57'),
(2611, 'NS1394/0007/2023', '1', 14, 1, 6, 5, '95.50', 'superadmin', '2025-04-19 22:08:57', '2025-04-19 22:08:57'),
(2612, 'NS4740/0008/2023', '1', 14, 1, 6, 5, '69.50', 'superadmin', '2025-04-19 22:08:57', '2025-04-19 22:08:57'),
(2613, 'NEQ2022001913/2020', '1', 14, 1, 6, 5, '92.50', 'superadmin', '2025-04-19 22:08:57', '2025-04-19 22:08:57'),
(2614, 'NS3371/0102/2023', '1', 14, 1, 6, 5, '93.00', 'superadmin', '2025-04-19 22:08:58', '2025-04-19 22:08:58'),
(2615, 'NS3897/0088/2023', '1', 14, 1, 6, 5, '94.00', 'superadmin', '2025-04-19 22:08:58', '2025-04-19 22:08:58'),
(2616, 'NS3757/0023/2023', '1', 14, 1, 6, 5, '88.50', 'superadmin', '2025-04-19 22:08:58', '2025-04-19 22:08:58'),
(2617, 'NS3981/0011/2023', '1', 14, 1, 6, 5, '93.00', 'superadmin', '2025-04-19 22:08:58', '2025-04-19 22:08:58'),
(2618, 'NS3453/0010/2023', '1', 14, 1, 6, 5, '97.50', 'superadmin', '2025-04-19 22:08:58', '2025-04-19 22:08:58'),
(2619, 'NS5156/0084/2023', '1', 14, 1, 6, 5, '89.50', 'superadmin', '2025-04-19 22:08:58', '2025-04-19 22:08:58'),
(2620, 'NS2510/0010/2023', '1', 14, 1, 6, 5, '88.00', 'superadmin', '2025-04-19 22:08:58', '2025-04-19 22:08:58'),
(2621, 'NS0970/0015/2023', '1', 14, 1, 6, 5, '97.00', 'superadmin', '2025-04-19 22:08:58', '2025-04-19 22:08:58'),
(2622, 'NS3834/0019/2018', '1', 14, 1, 6, 5, '100.00', 'superadmin', '2025-04-19 22:08:59', '2025-04-19 22:08:59'),
(2623, 'NS0850/0022/2022', '1', 14, 1, 6, 5, '91.50', 'superadmin', '2025-04-19 22:08:59', '2025-04-19 22:08:59'),
(2624, 'NS1027/0179/2023', '1', 14, 1, 6, 5, '95.50', 'superadmin', '2025-04-19 22:08:59', '2025-04-19 22:08:59'),
(2625, 'NS4569/0030/2023', '1', 14, 1, 6, 5, '87.00', 'superadmin', '2025-04-19 22:08:59', '2025-04-19 22:08:59'),
(2626, 'NS4740/0041/2023', '1', 14, 1, 6, 5, '83.00', 'superadmin', '2025-04-19 22:08:59', '2025-04-19 22:08:59'),
(2627, 'NS1618/0012/2023', '1', 14, 1, 6, 5, '86.50', 'superadmin', '2025-04-19 22:08:59', '2025-04-19 22:08:59'),
(2628, 'NS1060/0017/2023', '1', 14, 1, 6, 5, '92.00', 'superadmin', '2025-04-19 22:08:59', '2025-04-19 22:08:59'),
(2629, 'NS5033/0020/2022', '1', 14, 1, 6, 5, '95.00', 'superadmin', '2025-04-19 22:09:00', '2025-04-19 22:09:00'),
(2630, 'NS0722/0031/2023', '1', 14, 1, 6, 5, '88.50', 'superadmin', '2025-04-19 22:09:00', '2025-04-19 22:09:00'),
(2631, 'NS4740/0048/2023', '1', 14, 1, 6, 5, '94.00', 'superadmin', '2025-04-19 22:09:00', '2025-04-19 22:09:00'),
(2632, 'NS4498/0051/2020', '1', 14, 1, 6, 5, '90.50', 'superadmin', '2025-04-19 22:09:00', '2025-04-19 22:09:00'),
(2633, 'NS0241/0039/2020', '1', 14, 1, 6, 5, '91.00', 'superadmin', '2025-04-19 22:09:00', '2025-04-19 22:09:00'),
(2634, 'NS0414/0019/2023', '1', 14, 1, 6, 5, '95.50', 'superadmin', '2025-04-19 22:09:00', '2025-04-19 22:09:00'),
(2635, 'NS0197/0009/2020', '1', 14, 1, 6, 5, '90.00', 'superadmin', '2025-04-19 22:09:00', '2025-04-19 22:09:00'),
(2636, 'NS3893/0156/2023', '1', 14, 1, 6, 5, '94.50', 'superadmin', '2025-04-19 22:09:01', '2025-04-19 22:09:01'),
(2637, 'NS0672/0057/2023', '1', 14, 1, 6, 5, '93.00', 'superadmin', '2025-04-19 22:09:01', '2025-04-19 22:09:01'),
(2638, 'NS4816/0040/2021', '1', 14, 1, 6, 5, '88.00', 'superadmin', '2025-04-19 22:09:01', '2025-04-19 22:09:01'),
(2639, 'NS1633/0164/2023', '1', 14, 1, 6, 5, '95.50', 'superadmin', '2025-04-19 22:09:01', '2025-04-19 22:09:01'),
(2640, 'NS4208/0008/2022', '1', 14, 1, 6, 5, '93.00', 'superadmin', '2025-04-19 22:09:01', '2025-04-19 22:09:01'),
(2641, 'NS3897/0105/2023', '1', 14, 1, 6, 5, '95.50', 'superadmin', '2025-04-19 22:09:01', '2025-04-19 22:09:01'),
(2642, 'NS0526/0115/2021', '1', 14, 1, 6, 5, '83.00', 'superadmin', '2025-04-19 22:09:01', '2025-04-19 22:09:01'),
(2643, 'NS0274/0046/2023', '1', 14, 1, 6, 5, '96.50', 'superadmin', '2025-04-19 22:09:01', '2025-04-19 22:09:01'),
(2644, 'NS6048/0056/2023', '1', 14, 1, 6, 5, '78.00', 'superadmin', '2025-04-19 22:09:02', '2025-04-19 22:09:02'),
(2645, 'NS4006/0030/2021', '1', 14, 1, 6, 5, '94.00', 'superadmin', '2025-04-19 22:09:02', '2025-04-19 22:09:02'),
(2646, 'NS2505/0044/2017', '1', 14, 1, 6, 5, '90.00', 'superadmin', '2025-04-19 22:09:02', '2025-04-19 22:09:02'),
(2647, 'NS4238/0026/2021', '1', 14, 1, 6, 5, '90.00', 'superadmin', '2025-04-19 22:09:02', '2025-04-19 22:09:02'),
(2648, 'NS3351/0179/2023', '1', 14, 1, 6, 5, '92.00', 'superadmin', '2025-04-19 22:09:02', '2025-04-19 22:09:02'),
(2649, 'NS4117/0256/2022', '1', 14, 1, 6, 5, '90.00', 'superadmin', '2025-04-19 22:09:02', '2025-04-19 22:09:02'),
(2650, 'NS3321/0044/2021', '1', 14, 1, 6, 5, '74.00', 'superadmin', '2025-04-19 22:09:02', '2025-04-19 22:09:02'),
(2651, 'NS5551/0011/2021', '1', 14, 1, 6, 5, '86.00', 'superadmin', '2025-04-19 22:09:03', '2025-04-19 22:09:03'),
(2652, 'NS0345/0088/2023', '1', 14, 1, 6, 5, '84.50', 'superadmin', '2025-04-19 22:09:03', '2025-04-19 22:09:03'),
(2653, 'NS4710/0030/2023', '1', 14, 1, 6, 5, '78.00', 'superadmin', '2025-04-19 22:09:03', '2025-04-19 22:09:03'),
(2654, 'NS5822/0117/2023', '1', 14, 1, 6, 5, '95.00', 'superadmin', '2025-04-19 22:09:03', '2025-04-19 22:09:03'),
(2655, 'NS1097/0129/2021', '1', 14, 1, 6, 5, '95.50', 'superadmin', '2025-04-19 22:09:03', '2025-04-19 22:09:03'),
(2656, 'NS1633/0136/2021', '1', 14, 1, 6, 5, '93.50', 'superadmin', '2025-04-19 22:09:03', '2025-04-19 22:09:03'),
(2657, 'NS0672/0094/2021', '1', 14, 1, 6, 5, '89.50', 'superadmin', '2025-04-19 22:09:03', '2025-04-19 22:09:03'),
(2658, 'NS2521/0024/2021', '1', 14, 1, 6, 5, '94.00', 'superadmin', '2025-04-19 22:09:03', '2025-04-19 22:09:03'),
(2659, 'NS1581/0075/2023', '1', 14, 1, 6, 5, '90.50', 'superadmin', '2025-04-19 22:09:04', '2025-04-19 22:09:04'),
(2660, 'NS2315/0115/2021', '1', 14, 1, 6, 5, '79.50', 'superadmin', '2025-04-19 22:09:04', '2025-04-19 22:09:04'),
(2661, 'NS2171/0052/2023', '1', 14, 1, 6, 5, '93.50', 'superadmin', '2025-04-19 22:09:04', '2025-04-19 22:09:04'),
(2662, 'NS2424/0074/2023', '1', 14, 1, 6, 5, '82.50', 'superadmin', '2025-04-19 22:09:04', '2025-04-19 22:09:04'),
(2663, 'NS0632/0053/2023', '1', 14, 1, 6, 5, '83.50', 'superadmin', '2025-04-19 22:09:04', '2025-04-19 22:09:04'),
(2664, 'NS0672/0135/2023', '1', 14, 1, 6, 5, '91.00', 'superadmin', '2025-04-19 22:09:04', '2025-04-19 22:09:04'),
(2665, 'NS5376/0082/2023', '1', 14, 1, 6, 5, '86.00', 'superadmin', '2025-04-19 22:09:04', '2025-04-19 22:09:04'),
(2666, 'NS3228/0285/2022', '1', 14, 1, 6, 5, '92.00', 'superadmin', '2025-04-19 22:09:04', '2025-04-19 22:09:04'),
(2667, 'NS0541/0100/2023', '1', 14, 1, 6, 5, '93.00', 'superadmin', '2025-04-19 22:09:05', '2025-04-19 22:09:05'),
(2668, 'NS3534/0025/2023', '1', 14, 1, 6, 5, '97.50', 'superadmin', '2025-04-19 22:09:05', '2025-04-19 22:09:05'),
(2669, 'NS5251/0066/2023', '1', 14, 1, 6, 5, '93.50', 'superadmin', '2025-04-19 22:09:05', '2025-04-19 22:09:05'),
(2670, 'NS5298/0057/2023', '1', 14, 1, 6, 5, '90.50', 'superadmin', '2025-04-19 22:09:05', '2025-04-19 22:09:05'),
(2671, 'NS4897/0091/2023', '1', 14, 1, 6, 5, '94.50', 'superadmin', '2025-04-19 22:09:05', '2025-04-19 22:09:05'),
(2672, 'NS0772/0099/2020', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2673, 'NS5289/0024/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2674, 'NP1153/0013/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2675, 'NS5357/0001/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2676, 'NS0672/0001/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2677, 'NS2367/0005/2023', '1', 14, 1, 7, 1, '90.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2678, 'NS0294/0005/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2679, 'NS0916/0003/2023', '1', 14, 1, 7, 1, '90.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2680, 'NS1375/0002/2023', '1', 14, 1, 7, 1, '90.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2681, 'NS0547/0015/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2682, 'NS0345/0172/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2683, 'NS1394/0007/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2684, 'NS4740/0008/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2685, 'NEQ2022001913/2020', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2686, 'NS3371/0102/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2687, 'NS3897/0088/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2688, 'NS3757/0023/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2689, 'NS3981/0011/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2690, 'NS3453/0010/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2691, 'NS5156/0084/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2692, 'NS2510/0010/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2693, 'NS0970/0015/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2694, 'NS3834/0019/2018', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2695, 'NS0850/0022/2022', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2696, 'NS1027/0179/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2697, 'NS4569/0030/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2698, 'NS4740/0041/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2699, 'NS1618/0012/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2700, 'NS1060/0017/2023', '1', 14, 1, 7, 1, '90.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2701, 'NS5033/0020/2022', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2702, 'NS0722/0031/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2703, 'NS4740/0048/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2704, 'NS4498/0051/2020', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2705, 'NS0241/0039/2020', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2706, 'NS0414/0019/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2707, 'NS0197/0009/2020', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2708, 'NS3893/0156/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2709, 'NS0672/0057/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2710, 'NS4816/0040/2021', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2711, 'NS1633/0164/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2712, 'NS4208/0008/2022', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2713, 'NS3897/0105/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2714, 'NS0526/0115/2021', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2715, 'NS0274/0046/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2716, 'NS6048/0056/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2717, 'NS4006/0030/2021', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2718, 'NS2505/0044/2017', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2719, 'NS4238/0026/2021', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2720, 'NS3351/0179/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2721, 'NS4117/0256/2022', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2722, 'NS3321/0044/2021', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2723, 'NS5551/0011/2021', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2724, 'NS0345/0088/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2725, 'NS4710/0030/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2726, 'NS5822/0117/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2727, 'NS1097/0129/2021', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38');
INSERT INTO `exam_category_results` (`id`, `reg_no`, `year_of_study`, `year_id`, `semester_id`, `course_id`, `exam_category_id`, `exam_score`, `uploadedby`, `created_at`, `updated_at`) VALUES
(2728, 'NS1633/0136/2021', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2729, 'NS0672/0094/2021', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2730, 'NS2521/0024/2021', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2731, 'NS1581/0075/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2732, 'NS2315/0115/2021', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2733, 'NS2171/0052/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2734, 'NS2424/0074/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2735, 'NS0632/0053/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2736, 'NS0672/0135/2023', '1', 14, 1, 7, 1, '60.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2737, 'NS5376/0082/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2738, 'NS3228/0285/2022', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2739, 'NS0541/0100/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2740, 'NS3534/0025/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2741, 'NS5251/0066/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2742, 'NS5298/0057/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2743, 'NS4897/0091/2023', '1', 14, 1, 7, 1, '100.00', 'superadmin', '2025-04-19 22:15:38', '2025-04-19 22:15:38'),
(2744, 'NS0772/0099/2020', '1', 14, 1, 7, 2, '80.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2745, 'NS5289/0024/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2746, 'NP1153/0013/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2747, 'NS5357/0001/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2748, 'NS0672/0001/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2749, 'NS2367/0005/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2750, 'NS0294/0005/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2751, 'NS0916/0003/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2752, 'NS1375/0002/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2753, 'NS0547/0015/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2754, 'NS0345/0172/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2755, 'NS1394/0007/2023', '1', 14, 1, 7, 2, '80.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2756, 'NS4740/0008/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2757, 'NEQ2022001913/2020', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2758, 'NS3371/0102/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2759, 'NS3897/0088/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2760, 'NS3757/0023/2023', '1', 14, 1, 7, 2, '80.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2761, 'NS3981/0011/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2762, 'NS3453/0010/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2763, 'NS5156/0084/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2764, 'NS2510/0010/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2765, 'NS0970/0015/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2766, 'NS3834/0019/2018', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2767, 'NS0850/0022/2022', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2768, 'NS1027/0179/2023', '1', 14, 1, 7, 2, '80.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2769, 'NS4569/0030/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2770, 'NS4740/0041/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2771, 'NS1618/0012/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2772, 'NS1060/0017/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2773, 'NS5033/0020/2022', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2774, 'NS0722/0031/2023', '1', 14, 1, 7, 2, '70.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2775, 'NS4740/0048/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2776, 'NS4498/0051/2020', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2777, 'NS0241/0039/2020', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2778, 'NS0414/0019/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2779, 'NS0197/0009/2020', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2780, 'NS3893/0156/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2781, 'NS0672/0057/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2782, 'NS4816/0040/2021', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2783, 'NS1633/0164/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2784, 'NS4208/0008/2022', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2785, 'NS3897/0105/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2786, 'NS0526/0115/2021', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2787, 'NS0274/0046/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2788, 'NS6048/0056/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2789, 'NS4006/0030/2021', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2790, 'NS2505/0044/2017', '1', 14, 1, 7, 2, '70.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2791, 'NS4238/0026/2021', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2792, 'NS3351/0179/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2793, 'NS4117/0256/2022', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2794, 'NS3321/0044/2021', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2795, 'NS5551/0011/2021', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2796, 'NS0345/0088/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2797, 'NS4710/0030/2023', '1', 14, 1, 7, 2, '80.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2798, 'NS5822/0117/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2799, 'NS1097/0129/2021', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2800, 'NS1633/0136/2021', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2801, 'NS0672/0094/2021', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2802, 'NS2521/0024/2021', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2803, 'NS1581/0075/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2804, 'NS2315/0115/2021', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2805, 'NS2171/0052/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2806, 'NS2424/0074/2023', '1', 14, 1, 7, 2, '70.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2807, 'NS0632/0053/2023', '1', 14, 1, 7, 2, '50.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2808, 'NS0672/0135/2023', '1', 14, 1, 7, 2, '70.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2809, 'NS5376/0082/2023', '1', 14, 1, 7, 2, '100.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2810, 'NS3228/0285/2022', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2811, 'NS0541/0100/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2812, 'NS3534/0025/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2813, 'NS5251/0066/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2814, 'NS5298/0057/2023', '1', 14, 1, 7, 2, '90.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2815, 'NS4897/0091/2023', '1', 14, 1, 7, 2, '80.00', 'superadmin', '2025-04-19 22:16:00', '2025-04-19 22:16:00'),
(2816, 'NS0772/0099/2020', '1', 14, 1, 7, 3, '59.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2817, 'NS5289/0024/2023', '1', 14, 1, 7, 3, '76.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2818, 'NP1153/0013/2023', '1', 14, 1, 7, 3, '66.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2819, 'NS5357/0001/2023', '1', 14, 1, 7, 3, '72.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2820, 'NS0672/0001/2023', '1', 14, 1, 7, 3, '61.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2821, 'NS2367/0005/2023', '1', 14, 1, 7, 3, '44.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2822, 'NS0294/0005/2023', '1', 14, 1, 7, 3, '53.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2823, 'NS0916/0003/2023', '1', 14, 1, 7, 3, '50.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2824, 'NS1375/0002/2023', '1', 14, 1, 7, 3, '44.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2825, 'NS0547/0015/2023', '1', 14, 1, 7, 3, '50.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2826, 'NS0345/0172/2023', '1', 14, 1, 7, 3, '37.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2827, 'NS1394/0007/2023', '1', 14, 1, 7, 3, '48.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2828, 'NS4740/0008/2023', '1', 14, 1, 7, 3, '65.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2829, 'NEQ2022001913/2020', '1', 14, 1, 7, 3, '56.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2830, 'NS3371/0102/2023', '1', 14, 1, 7, 3, '49.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2831, 'NS3897/0088/2023', '1', 14, 1, 7, 3, '52.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2832, 'NS3757/0023/2023', '1', 14, 1, 7, 3, '45.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2833, 'NS3981/0011/2023', '1', 14, 1, 7, 3, '74.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2834, 'NS3453/0010/2023', '1', 14, 1, 7, 3, '54.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2835, 'NS5156/0084/2023', '1', 14, 1, 7, 3, '53.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2836, 'NS2510/0010/2023', '1', 14, 1, 7, 3, '71.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2837, 'NS0970/0015/2023', '1', 14, 1, 7, 3, '68.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2838, 'NS3834/0019/2018', '1', 14, 1, 7, 3, '77.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2839, 'NS0850/0022/2022', '1', 14, 1, 7, 3, '61.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2840, 'NS1027/0179/2023', '1', 14, 1, 7, 3, '66.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2841, 'NS4569/0030/2023', '1', 14, 1, 7, 3, '77.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2842, 'NS4740/0041/2023', '1', 14, 1, 7, 3, '52.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2843, 'NS1618/0012/2023', '1', 14, 1, 7, 3, '62.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2844, 'NS1060/0017/2023', '1', 14, 1, 7, 3, '49.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2845, 'NS5033/0020/2022', '1', 14, 1, 7, 3, '70.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2846, 'NS0722/0031/2023', '1', 14, 1, 7, 3, '55.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2847, 'NS4740/0048/2023', '1', 14, 1, 7, 3, '42.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2848, 'NS4498/0051/2020', '1', 14, 1, 7, 3, '58.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2849, 'NS0241/0039/2020', '1', 14, 1, 7, 3, '60.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2850, 'NS0414/0019/2023', '1', 14, 1, 7, 3, '84.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2851, 'NS0197/0009/2020', '1', 14, 1, 7, 3, '46.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2852, 'NS3893/0156/2023', '1', 14, 1, 7, 3, '44.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2853, 'NS0672/0057/2023', '1', 14, 1, 7, 3, '80.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2854, 'NS4816/0040/2021', '1', 14, 1, 7, 3, '64.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2855, 'NS1633/0164/2023', '1', 14, 1, 7, 3, '43.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2856, 'NS4208/0008/2022', '1', 14, 1, 7, 3, '55.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2857, 'NS3897/0105/2023', '1', 14, 1, 7, 3, '68.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2858, 'NS0526/0115/2021', '1', 14, 1, 7, 3, '59.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2859, 'NS0274/0046/2023', '1', 14, 1, 7, 3, '60.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2860, 'NS6048/0056/2023', '1', 14, 1, 7, 3, '61.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2861, 'NS4006/0030/2021', '1', 14, 1, 7, 3, '84.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2862, 'NS2505/0044/2017', '1', 14, 1, 7, 3, '59.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2863, 'NS4238/0026/2021', '1', 14, 1, 7, 3, '57.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2864, 'NS3351/0179/2023', '1', 14, 1, 7, 3, '56.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2865, 'NS4117/0256/2022', '1', 14, 1, 7, 3, '43.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2866, 'NS3321/0044/2021', '1', 14, 1, 7, 3, '71.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2867, 'NS5551/0011/2021', '1', 14, 1, 7, 3, '68.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2868, 'NS0345/0088/2023', '1', 14, 1, 7, 3, '80.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2869, 'NS4710/0030/2023', '1', 14, 1, 7, 3, '49.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2870, 'NS5822/0117/2023', '1', 14, 1, 7, 3, '66.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2871, 'NS1097/0129/2021', '1', 14, 1, 7, 3, '56.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2872, 'NS1633/0136/2021', '1', 14, 1, 7, 3, '63.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2873, 'NS0672/0094/2021', '1', 14, 1, 7, 3, '55.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2874, 'NS2521/0024/2021', '1', 14, 1, 7, 3, '67.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2875, 'NS1581/0075/2023', '1', 14, 1, 7, 3, '65.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2876, 'NS2315/0115/2021', '1', 14, 1, 7, 3, '63.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2877, 'NS2171/0052/2023', '1', 14, 1, 7, 3, '69.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2878, 'NS2424/0074/2023', '1', 14, 1, 7, 3, '36.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2879, 'NS0632/0053/2023', '1', 14, 1, 7, 3, '57.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2880, 'NS0672/0135/2023', '1', 14, 1, 7, 3, '33.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2881, 'NS5376/0082/2023', '1', 14, 1, 7, 3, '59.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2882, 'NS3228/0285/2022', '1', 14, 1, 7, 3, '55.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2883, 'NS0541/0100/2023', '1', 14, 1, 7, 3, '60.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2884, 'NS3534/0025/2023', '1', 14, 1, 7, 3, '52.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2885, 'NS5251/0066/2023', '1', 14, 1, 7, 3, '39.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2886, 'NS5298/0057/2023', '1', 14, 1, 7, 3, '38.50', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2887, 'NS4897/0091/2023', '1', 14, 1, 7, 3, '48.00', 'superadmin', '2025-04-19 22:16:35', '2025-04-19 22:16:35'),
(2888, 'NS0772/0099/2020', '1', 14, 1, 7, 4, '80.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2889, 'NS5289/0024/2023', '1', 14, 1, 7, 4, '79.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2890, 'NP1153/0013/2023', '1', 14, 1, 7, 4, '72.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2891, 'NS5357/0001/2023', '1', 14, 1, 7, 4, '69.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2892, 'NS0672/0001/2023', '1', 14, 1, 7, 4, '70.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2893, 'NS2367/0005/2023', '1', 14, 1, 7, 4, '55.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2894, 'NS0294/0005/2023', '1', 14, 1, 7, 4, '69.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2895, 'NS0916/0003/2023', '1', 14, 1, 7, 4, '78.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2896, 'NS1375/0002/2023', '1', 14, 1, 7, 4, '48.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2897, 'NS0547/0015/2023', '1', 14, 1, 7, 4, '66.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2898, 'NS0345/0172/2023', '1', 14, 1, 7, 4, '70.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2899, 'NS1394/0007/2023', '1', 14, 1, 7, 4, '58.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2900, 'NS4740/0008/2023', '1', 14, 1, 7, 4, '68.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2901, 'NEQ2022001913/2020', '1', 14, 1, 7, 4, '65.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2902, 'NS3371/0102/2023', '1', 14, 1, 7, 4, '66.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2903, 'NS3897/0088/2023', '1', 14, 1, 7, 4, '73.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2904, 'NS3757/0023/2023', '1', 14, 1, 7, 4, '57.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2905, 'NS3981/0011/2023', '1', 14, 1, 7, 4, '84.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2906, 'NS3453/0010/2023', '1', 14, 1, 7, 4, '55.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2907, 'NS5156/0084/2023', '1', 14, 1, 7, 4, '77.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2908, 'NS2510/0010/2023', '1', 14, 1, 7, 4, '84.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2909, 'NS0970/0015/2023', '1', 14, 1, 7, 4, '59.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2910, 'NS3834/0019/2018', '1', 14, 1, 7, 4, '69.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2911, 'NS0850/0022/2022', '1', 14, 1, 7, 4, '52.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2912, 'NS1027/0179/2023', '1', 14, 1, 7, 4, '75.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2913, 'NS4569/0030/2023', '1', 14, 1, 7, 4, '74.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2914, 'NS4740/0041/2023', '1', 14, 1, 7, 4, '46.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2915, 'NS1618/0012/2023', '1', 14, 1, 7, 4, '61.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2916, 'NS1060/0017/2023', '1', 14, 1, 7, 4, '71.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2917, 'NS5033/0020/2022', '1', 14, 1, 7, 4, '89.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2918, 'NS0722/0031/2023', '1', 14, 1, 7, 4, '55.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2919, 'NS4740/0048/2023', '1', 14, 1, 7, 4, '59.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2920, 'NS4498/0051/2020', '1', 14, 1, 7, 4, '55.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2921, 'NS0241/0039/2020', '1', 14, 1, 7, 4, '54.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2922, 'NS0414/0019/2023', '1', 14, 1, 7, 4, '85.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2923, 'NS0197/0009/2020', '1', 14, 1, 7, 4, '57.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2924, 'NS3893/0156/2023', '1', 14, 1, 7, 4, '62.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2925, 'NS0672/0057/2023', '1', 14, 1, 7, 4, '64.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2926, 'NS4816/0040/2021', '1', 14, 1, 7, 4, '68.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2927, 'NS1633/0164/2023', '1', 14, 1, 7, 4, '46.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2928, 'NS4208/0008/2022', '1', 14, 1, 7, 4, '46.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2929, 'NS3897/0105/2023', '1', 14, 1, 7, 4, '84.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2930, 'NS0526/0115/2021', '1', 14, 1, 7, 4, '79.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2931, 'NS0274/0046/2023', '1', 14, 1, 7, 4, '78.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2932, 'NS6048/0056/2023', '1', 14, 1, 7, 4, '81.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2933, 'NS4006/0030/2021', '1', 14, 1, 7, 4, '80.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2934, 'NS2505/0044/2017', '1', 14, 1, 7, 4, '60.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2935, 'NS4238/0026/2021', '1', 14, 1, 7, 4, '66.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2936, 'NS3351/0179/2023', '1', 14, 1, 7, 4, '68.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2937, 'NS4117/0256/2022', '1', 14, 1, 7, 4, '47.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2938, 'NS3321/0044/2021', '1', 14, 1, 7, 4, '58.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2939, 'NS5551/0011/2021', '1', 14, 1, 7, 4, '66.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2940, 'NS0345/0088/2023', '1', 14, 1, 7, 4, '87.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2941, 'NS4710/0030/2023', '1', 14, 1, 7, 4, '61.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2942, 'NS5822/0117/2023', '1', 14, 1, 7, 4, '60.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2943, 'NS1097/0129/2021', '1', 14, 1, 7, 4, '66.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2944, 'NS1633/0136/2021', '1', 14, 1, 7, 4, '81.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2945, 'NS0672/0094/2021', '1', 14, 1, 7, 4, '69.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2946, 'NS2521/0024/2021', '1', 14, 1, 7, 4, '76.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2947, 'NS1581/0075/2023', '1', 14, 1, 7, 4, '69.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2948, 'NS2315/0115/2021', '1', 14, 1, 7, 4, '66.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2949, 'NS2171/0052/2023', '1', 14, 1, 7, 4, '77.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2950, 'NS2424/0074/2023', '1', 14, 1, 7, 4, '55.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2951, 'NS0632/0053/2023', '1', 14, 1, 7, 4, '54.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2952, 'NS0672/0135/2023', '1', 14, 1, 7, 4, '63.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2953, 'NS5376/0082/2023', '1', 14, 1, 7, 4, '67.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2954, 'NS3228/0285/2022', '1', 14, 1, 7, 4, '55.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2955, 'NS0541/0100/2023', '1', 14, 1, 7, 4, '67.50', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2956, 'NS3534/0025/2023', '1', 14, 1, 7, 4, '75.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2957, 'NS5251/0066/2023', '1', 14, 1, 7, 4, '47.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2958, 'NS5298/0057/2023', '1', 14, 1, 7, 4, '56.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2959, 'NS4897/0091/2023', '1', 14, 1, 7, 4, '64.00', 'superadmin', '2025-04-19 22:17:03', '2025-04-19 22:17:03'),
(2960, 'NS0772/0099/2020', '1', 14, 1, 7, 6, '98.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2961, 'NS5289/0024/2023', '1', 14, 1, 7, 6, '99.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2962, 'NP1153/0013/2023', '1', 14, 1, 7, 6, '88.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2963, 'NS5357/0001/2023', '1', 14, 1, 7, 6, '78.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2964, 'NS0672/0001/2023', '1', 14, 1, 7, 6, '98.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2965, 'NS2367/0005/2023', '1', 14, 1, 7, 6, '94.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2966, 'NS0294/0005/2023', '1', 14, 1, 7, 6, '84.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2967, 'NS0916/0003/2023', '1', 14, 1, 7, 6, '91.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2968, 'NS1375/0002/2023', '1', 14, 1, 7, 6, '70.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2969, 'NS0547/0015/2023', '1', 14, 1, 7, 6, '72.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2970, 'NS0345/0172/2023', '1', 14, 1, 7, 6, '70.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2971, 'NS1394/0007/2023', '1', 14, 1, 7, 6, '51.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2972, 'NS4740/0008/2023', '1', 14, 1, 7, 6, '82.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2973, 'NEQ2022001913/2020', '1', 14, 1, 7, 6, '86.00', 'superadmin', '2025-04-19 22:17:47', '2025-04-19 22:17:47'),
(2974, 'NS3371/0102/2023', '1', 14, 1, 7, 6, '86.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2975, 'NS3897/0088/2023', '1', 14, 1, 7, 6, '86.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2976, 'NS3757/0023/2023', '1', 14, 1, 7, 6, '58.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2977, 'NS3981/0011/2023', '1', 14, 1, 7, 6, '78.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2978, 'NS3453/0010/2023', '1', 14, 1, 7, 6, '76.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2979, 'NS5156/0084/2023', '1', 14, 1, 7, 6, '92.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2980, 'NS2510/0010/2023', '1', 14, 1, 7, 6, '99.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2981, 'NS0970/0015/2023', '1', 14, 1, 7, 6, '89.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2982, 'NS3834/0019/2018', '1', 14, 1, 7, 6, '97.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2983, 'NS0850/0022/2022', '1', 14, 1, 7, 6, '79.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2984, 'NS1027/0179/2023', '1', 14, 1, 7, 6, '98.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2985, 'NS4569/0030/2023', '1', 14, 1, 7, 6, '96.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2986, 'NS4740/0041/2023', '1', 14, 1, 7, 6, '78.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2987, 'NS1618/0012/2023', '1', 14, 1, 7, 6, '90.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2988, 'NS1060/0017/2023', '1', 14, 1, 7, 6, '83.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2989, 'NS5033/0020/2022', '1', 14, 1, 7, 6, '97.00', 'superadmin', '2025-04-19 22:17:48', '2025-04-19 22:17:48'),
(2990, 'NS0722/0031/2023', '1', 14, 1, 7, 6, '96.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(2991, 'NS4740/0048/2023', '1', 14, 1, 7, 6, '94.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(2992, 'NS4498/0051/2020', '1', 14, 1, 7, 6, '80.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(2993, 'NS0241/0039/2020', '1', 14, 1, 7, 6, '96.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(2994, 'NS0414/0019/2023', '1', 14, 1, 7, 6, '92.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(2995, 'NS0197/0009/2020', '1', 14, 1, 7, 6, '70.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(2996, 'NS3893/0156/2023', '1', 14, 1, 7, 6, '94.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(2997, 'NS0672/0057/2023', '1', 14, 1, 7, 6, '93.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(2998, 'NS4816/0040/2021', '1', 14, 1, 7, 6, '88.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(2999, 'NS1633/0164/2023', '1', 14, 1, 7, 6, '91.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(3000, 'NS4208/0008/2022', '1', 14, 1, 7, 6, '74.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(3001, 'NS3897/0105/2023', '1', 14, 1, 7, 6, '89.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(3002, 'NS0526/0115/2021', '1', 14, 1, 7, 6, '98.00', 'superadmin', '2025-04-19 22:17:49', '2025-04-19 22:17:49'),
(3003, 'NS0274/0046/2023', '1', 14, 1, 7, 6, '100.00', 'superadmin', '2025-04-19 22:17:50', '2025-04-19 22:17:50'),
(3004, 'NS6048/0056/2023', '1', 14, 1, 7, 6, '90.00', 'superadmin', '2025-04-19 22:17:50', '2025-04-19 22:17:50'),
(3005, 'NS4006/0030/2021', '1', 14, 1, 7, 6, '100.00', 'superadmin', '2025-04-19 22:17:50', '2025-04-19 22:17:50'),
(3006, 'NS2505/0044/2017', '1', 14, 1, 7, 6, '51.00', 'superadmin', '2025-04-19 22:17:50', '2025-04-19 22:17:50'),
(3007, 'NS4238/0026/2021', '1', 14, 1, 7, 6, '90.00', 'superadmin', '2025-04-19 22:17:50', '2025-04-19 22:17:50'),
(3008, 'NS3351/0179/2023', '1', 14, 1, 7, 6, '92.00', 'superadmin', '2025-04-19 22:17:50', '2025-04-19 22:17:50'),
(3009, 'NS4117/0256/2022', '1', 14, 1, 7, 6, '72.00', 'superadmin', '2025-04-19 22:17:50', '2025-04-19 22:17:50'),
(3010, 'NS3321/0044/2021', '1', 14, 1, 7, 6, '96.00', 'superadmin', '2025-04-19 22:17:50', '2025-04-19 22:17:50'),
(3011, 'NS5551/0011/2021', '1', 14, 1, 7, 6, '96.00', 'superadmin', '2025-04-19 22:17:50', '2025-04-19 22:17:50'),
(3012, 'NS0345/0088/2023', '1', 14, 1, 7, 6, '98.00', 'superadmin', '2025-04-19 22:17:50', '2025-04-19 22:17:50'),
(3013, 'NS4710/0030/2023', '1', 14, 1, 7, 6, '62.00', 'superadmin', '2025-04-19 22:17:51', '2025-04-19 22:17:51'),
(3014, 'NS5822/0117/2023', '1', 14, 1, 7, 6, '98.00', 'superadmin', '2025-04-19 22:17:51', '2025-04-19 22:17:51'),
(3015, 'NS1097/0129/2021', '1', 14, 1, 7, 6, '96.00', 'superadmin', '2025-04-19 22:17:51', '2025-04-19 22:17:51'),
(3016, 'NS1633/0136/2021', '1', 14, 1, 7, 6, '96.00', 'superadmin', '2025-04-19 22:17:51', '2025-04-19 22:17:51'),
(3017, 'NS0672/0094/2021', '1', 14, 1, 7, 6, '98.00', 'superadmin', '2025-04-19 22:17:51', '2025-04-19 22:17:51'),
(3018, 'NS2521/0024/2021', '1', 14, 1, 7, 6, '94.00', 'superadmin', '2025-04-19 22:17:51', '2025-04-19 22:17:51'),
(3019, 'NS1581/0075/2023', '1', 14, 1, 7, 6, '89.00', 'superadmin', '2025-04-19 22:17:51', '2025-04-19 22:17:51'),
(3020, 'NS2315/0115/2021', '1', 14, 1, 7, 6, '92.00', 'superadmin', '2025-04-19 22:17:51', '2025-04-19 22:17:51'),
(3021, 'NS2171/0052/2023', '1', 14, 1, 7, 6, '98.00', 'superadmin', '2025-04-19 22:17:52', '2025-04-19 22:17:52'),
(3022, 'NS2424/0074/2023', '1', 14, 1, 7, 6, '51.00', 'superadmin', '2025-04-19 22:17:52', '2025-04-19 22:17:52'),
(3023, 'NS0632/0053/2023', '1', 14, 1, 7, 6, '60.00', 'superadmin', '2025-04-19 22:17:52', '2025-04-19 22:17:52'),
(3024, 'NS0672/0135/2023', '1', 14, 1, 7, 6, '62.00', 'superadmin', '2025-04-19 22:17:52', '2025-04-19 22:17:52'),
(3025, 'NS5376/0082/2023', '1', 14, 1, 7, 6, '98.00', 'superadmin', '2025-04-19 22:17:52', '2025-04-19 22:17:52'),
(3026, 'NS3228/0285/2022', '1', 14, 1, 7, 6, '94.00', 'superadmin', '2025-04-19 22:17:52', '2025-04-19 22:17:52'),
(3027, 'NS0541/0100/2023', '1', 14, 1, 7, 6, '80.00', 'superadmin', '2025-04-19 22:17:52', '2025-04-19 22:17:52'),
(3028, 'NS3534/0025/2023', '1', 14, 1, 7, 6, '90.00', 'superadmin', '2025-04-19 22:17:52', '2025-04-19 22:17:52'),
(3029, 'NS5251/0066/2023', '1', 14, 1, 7, 6, '87.00', 'superadmin', '2025-04-19 22:17:53', '2025-04-19 22:17:53'),
(3030, 'NS5298/0057/2023', '1', 14, 1, 7, 6, '96.00', 'superadmin', '2025-04-19 22:17:53', '2025-04-19 22:17:53'),
(3031, 'NS4897/0091/2023', '1', 14, 1, 7, 6, '98.00', 'superadmin', '2025-04-19 22:17:53', '2025-04-19 22:17:53'),
(3032, 'NS0772/0099/2020', '1', 14, 1, 7, 5, '81.50', 'superadmin', '2025-04-19 22:19:12', '2025-04-19 22:19:12'),
(3033, 'NS5289/0024/2023', '1', 14, 1, 7, 5, '86.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3034, 'NP1153/0013/2023', '1', 14, 1, 7, 5, '81.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3035, 'NS5357/0001/2023', '1', 14, 1, 7, 5, '79.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3036, 'NS0672/0001/2023', '1', 14, 1, 7, 5, '82.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3037, 'NS2367/0005/2023', '1', 14, 1, 7, 5, '76.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3038, 'NS0294/0005/2023', '1', 14, 1, 7, 5, '78.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3039, 'NS0916/0003/2023', '1', 14, 1, 7, 5, '70.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3040, 'NS1375/0002/2023', '1', 14, 1, 7, 5, '64.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3041, 'NS0547/0015/2023', '1', 14, 1, 7, 5, '73.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3042, 'NS0345/0172/2023', '1', 14, 1, 7, 5, '78.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3043, 'NS1394/0007/2023', '1', 14, 1, 7, 5, '77.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3044, 'NS4740/0008/2023', '1', 14, 1, 7, 5, '75.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3045, 'NEQ2022001913/2020', '1', 14, 1, 7, 5, '74.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3046, 'NS3371/0102/2023', '1', 14, 1, 7, 5, '77.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3047, 'NS3897/0088/2023', '1', 14, 1, 7, 5, '83.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3048, 'NS3757/0023/2023', '1', 14, 1, 7, 5, '83.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3049, 'NS3981/0011/2023', '1', 14, 1, 7, 5, '86.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3050, 'NS3453/0010/2023', '1', 14, 1, 7, 5, '68.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3051, 'NS5156/0084/2023', '1', 14, 1, 7, 5, '83.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3052, 'NS2510/0010/2023', '1', 14, 1, 7, 5, '88.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3053, 'NS0970/0015/2023', '1', 14, 1, 7, 5, '82.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3054, 'NS3834/0019/2018', '1', 14, 1, 7, 5, '86.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3055, 'NS0850/0022/2022', '1', 14, 1, 7, 5, '69.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3056, 'NS1027/0179/2023', '1', 14, 1, 7, 5, '80.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3057, 'NS4569/0030/2023', '1', 14, 1, 7, 5, '77.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3058, 'NS4740/0041/2023', '1', 14, 1, 7, 5, '75.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3059, 'NS1618/0012/2023', '1', 14, 1, 7, 5, '80.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3060, 'NS1060/0017/2023', '1', 14, 1, 7, 5, '72.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3061, 'NS5033/0020/2022', '1', 14, 1, 7, 5, '80.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3062, 'NS0722/0031/2023', '1', 14, 1, 7, 5, '70.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3063, 'NS4740/0048/2023', '1', 14, 1, 7, 5, '77.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3064, 'NS4498/0051/2020', '1', 14, 1, 7, 5, '64.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3065, 'NS0241/0039/2020', '1', 14, 1, 7, 5, '82.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3066, 'NS0414/0019/2023', '1', 14, 1, 7, 5, '87.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3067, 'NS0197/0009/2020', '1', 14, 1, 7, 5, '58.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3068, 'NS3893/0156/2023', '1', 14, 1, 7, 5, '68.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3069, 'NS0672/0057/2023', '1', 14, 1, 7, 5, '78.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3070, 'NS4816/0040/2021', '1', 14, 1, 7, 5, '77.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3071, 'NS1633/0164/2023', '1', 14, 1, 7, 5, '76.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3072, 'NS4208/0008/2022', '1', 14, 1, 7, 5, '73.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3073, 'NS3897/0105/2023', '1', 14, 1, 7, 5, '86.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3074, 'NS0526/0115/2021', '1', 14, 1, 7, 5, '97.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3075, 'NS0274/0046/2023', '1', 14, 1, 7, 5, '96.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3076, 'NS6048/0056/2023', '1', 14, 1, 7, 5, '75.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3077, 'NS4006/0030/2021', '1', 14, 1, 7, 5, '78.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3078, 'NS2505/0044/2017', '1', 14, 1, 7, 5, '74.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3079, 'NS4238/0026/2021', '1', 14, 1, 7, 5, '74.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3080, 'NS3351/0179/2023', '1', 14, 1, 7, 5, '84.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3081, 'NS4117/0256/2022', '1', 14, 1, 7, 5, '70.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3082, 'NS3321/0044/2021', '1', 14, 1, 7, 5, '76.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3083, 'NS5551/0011/2021', '1', 14, 1, 7, 5, '83.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3084, 'NS0345/0088/2023', '1', 14, 1, 7, 5, '92.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3085, 'NS4710/0030/2023', '1', 14, 1, 7, 5, '73.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3086, 'NS5822/0117/2023', '1', 14, 1, 7, 5, '85.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3087, 'NS1097/0129/2021', '1', 14, 1, 7, 5, '86.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3088, 'NS1633/0136/2021', '1', 14, 1, 7, 5, '81.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3089, 'NS0672/0094/2021', '1', 14, 1, 7, 5, '75.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3090, 'NS2521/0024/2021', '1', 14, 1, 7, 5, '85.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3091, 'NS1581/0075/2023', '1', 14, 1, 7, 5, '76.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3092, 'NS2315/0115/2021', '1', 14, 1, 7, 5, '66.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3093, 'NS2171/0052/2023', '1', 14, 1, 7, 5, '82.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3094, 'NS2424/0074/2023', '1', 14, 1, 7, 5, '60.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3095, 'NS0632/0053/2023', '1', 14, 1, 7, 5, '65.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3096, 'NS0672/0135/2023', '1', 14, 1, 7, 5, '54.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3097, 'NS5376/0082/2023', '1', 14, 1, 7, 5, '64.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3098, 'NS3228/0285/2022', '1', 14, 1, 7, 5, '50.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3099, 'NS0541/0100/2023', '1', 14, 1, 7, 5, '93.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3100, 'NS3534/0025/2023', '1', 14, 1, 7, 5, '95.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3101, 'NS5251/0066/2023', '1', 14, 1, 7, 5, '94.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3102, 'NS5298/0057/2023', '1', 14, 1, 7, 5, '93.00', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3103, 'NS4897/0091/2023', '1', 14, 1, 7, 5, '70.50', 'superadmin', '2025-04-19 22:19:13', '2025-04-19 22:19:13'),
(3104, 'NS0772/0099/2020', '1', 14, 1, 7, 7, '94.00', 'superadmin', '2025-04-19 22:20:08', '2025-04-19 22:20:08'),
(3105, 'NS5289/0024/2023', '1', 14, 1, 7, 7, '91.00', 'superadmin', '2025-04-19 22:20:08', '2025-04-19 22:20:08'),
(3106, 'NP1153/0013/2023', '1', 14, 1, 7, 7, '94.00', 'superadmin', '2025-04-19 22:20:08', '2025-04-19 22:20:08'),
(3107, 'NS5357/0001/2023', '1', 14, 1, 7, 7, '94.00', 'superadmin', '2025-04-19 22:20:08', '2025-04-19 22:20:08'),
(3108, 'NS0672/0001/2023', '1', 14, 1, 7, 7, '94.00', 'superadmin', '2025-04-19 22:20:08', '2025-04-19 22:20:08'),
(3109, 'NS2367/0005/2023', '1', 14, 1, 7, 7, '85.00', 'superadmin', '2025-04-19 22:20:08', '2025-04-19 22:20:08'),
(3110, 'NS0294/0005/2023', '1', 14, 1, 7, 7, '95.00', 'superadmin', '2025-04-19 22:20:08', '2025-04-19 22:20:08'),
(3111, 'NS0916/0003/2023', '1', 14, 1, 7, 7, '90.00', 'superadmin', '2025-04-19 22:20:09', '2025-04-19 22:20:09'),
(3112, 'NS1375/0002/2023', '1', 14, 1, 7, 7, '90.00', 'superadmin', '2025-04-19 22:20:09', '2025-04-19 22:20:09'),
(3113, 'NS0547/0015/2023', '1', 14, 1, 7, 7, '88.00', 'superadmin', '2025-04-19 22:20:09', '2025-04-19 22:20:09'),
(3114, 'NS0345/0172/2023', '1', 14, 1, 7, 7, '92.00', 'superadmin', '2025-04-19 22:20:09', '2025-04-19 22:20:09'),
(3115, 'NS1394/0007/2023', '1', 14, 1, 7, 7, '90.00', 'superadmin', '2025-04-19 22:20:09', '2025-04-19 22:20:09'),
(3116, 'NS4740/0008/2023', '1', 14, 1, 7, 7, '93.00', 'superadmin', '2025-04-19 22:20:09', '2025-04-19 22:20:09'),
(3117, 'NEQ2022001913/2020', '1', 14, 1, 7, 7, '50.00', 'superadmin', '2025-04-19 22:20:10', '2025-04-19 22:20:10'),
(3118, 'NS3371/0102/2023', '1', 14, 1, 7, 7, '89.00', 'superadmin', '2025-04-19 22:20:10', '2025-04-19 22:20:10'),
(3119, 'NS3897/0088/2023', '1', 14, 1, 7, 7, '90.00', 'superadmin', '2025-04-19 22:20:10', '2025-04-19 22:20:10'),
(3120, 'NS3757/0023/2023', '1', 14, 1, 7, 7, '85.00', 'superadmin', '2025-04-19 22:20:10', '2025-04-19 22:20:10'),
(3121, 'NS3981/0011/2023', '1', 14, 1, 7, 7, '92.00', 'superadmin', '2025-04-19 22:20:10', '2025-04-19 22:20:10'),
(3122, 'NS3453/0010/2023', '1', 14, 1, 7, 7, '77.00', 'superadmin', '2025-04-19 22:20:10', '2025-04-19 22:20:10'),
(3123, 'NS5156/0084/2023', '1', 14, 1, 7, 7, '88.00', 'superadmin', '2025-04-19 22:20:10', '2025-04-19 22:20:10'),
(3124, 'NS2510/0010/2023', '1', 14, 1, 7, 7, '94.00', 'superadmin', '2025-04-19 22:20:10', '2025-04-19 22:20:10'),
(3125, 'NS0970/0015/2023', '1', 14, 1, 7, 7, '88.00', 'superadmin', '2025-04-19 22:20:11', '2025-04-19 22:20:11'),
(3126, 'NS3834/0019/2018', '1', 14, 1, 7, 7, '90.00', 'superadmin', '2025-04-19 22:20:11', '2025-04-19 22:20:11'),
(3127, 'NS0850/0022/2022', '1', 14, 1, 7, 7, '92.00', 'superadmin', '2025-04-19 22:20:11', '2025-04-19 22:20:11'),
(3128, 'NS1027/0179/2023', '1', 14, 1, 7, 7, '94.00', 'superadmin', '2025-04-19 22:20:11', '2025-04-19 22:20:11'),
(3129, 'NS4569/0030/2023', '1', 14, 1, 7, 7, '87.00', 'superadmin', '2025-04-19 22:20:11', '2025-04-19 22:20:11'),
(3130, 'NS4740/0041/2023', '1', 14, 1, 7, 7, '80.00', 'superadmin', '2025-04-19 22:20:11', '2025-04-19 22:20:11'),
(3131, 'NS1618/0012/2023', '1', 14, 1, 7, 7, '73.00', 'superadmin', '2025-04-19 22:20:11', '2025-04-19 22:20:11'),
(3132, 'NS1060/0017/2023', '1', 14, 1, 7, 7, '93.00', 'superadmin', '2025-04-19 22:20:12', '2025-04-19 22:20:12'),
(3133, 'NS5033/0020/2022', '1', 14, 1, 7, 7, '98.00', 'superadmin', '2025-04-19 22:20:12', '2025-04-19 22:20:12'),
(3134, 'NS0722/0031/2023', '1', 14, 1, 7, 7, '80.00', 'superadmin', '2025-04-19 22:20:12', '2025-04-19 22:20:12'),
(3135, 'NS4740/0048/2023', '1', 14, 1, 7, 7, '92.00', 'superadmin', '2025-04-19 22:20:12', '2025-04-19 22:20:12'),
(3136, 'NS4498/0051/2020', '1', 14, 1, 7, 7, '77.00', 'superadmin', '2025-04-19 22:20:12', '2025-04-19 22:20:12'),
(3137, 'NS0241/0039/2020', '1', 14, 1, 7, 7, '91.00', 'superadmin', '2025-04-19 22:20:12', '2025-04-19 22:20:12'),
(3138, 'NS0414/0019/2023', '1', 14, 1, 7, 7, '96.00', 'superadmin', '2025-04-19 22:20:12', '2025-04-19 22:20:12'),
(3139, 'NS0197/0009/2020', '1', 14, 1, 7, 7, '83.00', 'superadmin', '2025-04-19 22:20:12', '2025-04-19 22:20:12'),
(3140, 'NS3893/0156/2023', '1', 14, 1, 7, 7, '92.00', 'superadmin', '2025-04-19 22:20:13', '2025-04-19 22:20:13'),
(3141, 'NS0672/0057/2023', '1', 14, 1, 7, 7, '96.00', 'superadmin', '2025-04-19 22:20:13', '2025-04-19 22:20:13'),
(3142, 'NS4816/0040/2021', '1', 14, 1, 7, 7, '95.00', 'superadmin', '2025-04-19 22:20:13', '2025-04-19 22:20:13'),
(3143, 'NS1633/0164/2023', '1', 14, 1, 7, 7, '91.00', 'superadmin', '2025-04-19 22:20:13', '2025-04-19 22:20:13'),
(3144, 'NS4208/0008/2022', '1', 14, 1, 7, 7, '92.00', 'superadmin', '2025-04-19 22:20:13', '2025-04-19 22:20:13'),
(3145, 'NS3897/0105/2023', '1', 14, 1, 7, 7, '95.00', 'superadmin', '2025-04-19 22:20:13', '2025-04-19 22:20:13'),
(3146, 'NS0526/0115/2021', '1', 14, 1, 7, 7, '98.00', 'superadmin', '2025-04-19 22:20:13', '2025-04-19 22:20:13'),
(3147, 'NS0274/0046/2023', '1', 14, 1, 7, 7, '100.00', 'superadmin', '2025-04-19 22:20:14', '2025-04-19 22:20:14'),
(3148, 'NS6048/0056/2023', '1', 14, 1, 7, 7, '96.00', 'superadmin', '2025-04-19 22:20:14', '2025-04-19 22:20:14'),
(3149, 'NS4006/0030/2021', '1', 14, 1, 7, 7, '99.00', 'superadmin', '2025-04-19 22:20:14', '2025-04-19 22:20:14'),
(3150, 'NS2505/0044/2017', '1', 14, 1, 7, 7, '89.00', 'superadmin', '2025-04-19 22:20:14', '2025-04-19 22:20:14'),
(3151, 'NS4238/0026/2021', '1', 14, 1, 7, 7, '89.00', 'superadmin', '2025-04-19 22:20:14', '2025-04-19 22:20:14'),
(3152, 'NS3351/0179/2023', '1', 14, 1, 7, 7, '95.00', 'superadmin', '2025-04-19 22:20:14', '2025-04-19 22:20:14'),
(3153, 'NS4117/0256/2022', '1', 14, 1, 7, 7, '92.00', 'superadmin', '2025-04-19 22:20:14', '2025-04-19 22:20:14'),
(3154, 'NS3321/0044/2021', '1', 14, 1, 7, 7, '97.00', 'superadmin', '2025-04-19 22:20:15', '2025-04-19 22:20:15'),
(3155, 'NS5551/0011/2021', '1', 14, 1, 7, 7, '94.00', 'superadmin', '2025-04-19 22:20:15', '2025-04-19 22:20:15'),
(3156, 'NS0345/0088/2023', '1', 14, 1, 7, 7, '95.00', 'superadmin', '2025-04-19 22:20:15', '2025-04-19 22:20:15'),
(3157, 'NS4710/0030/2023', '1', 14, 1, 7, 7, '64.00', 'superadmin', '2025-04-19 22:20:15', '2025-04-19 22:20:15'),
(3158, 'NS5822/0117/2023', '1', 14, 1, 7, 7, '99.00', 'superadmin', '2025-04-19 22:20:15', '2025-04-19 22:20:15'),
(3159, 'NS1097/0129/2021', '1', 14, 1, 7, 7, '92.00', 'superadmin', '2025-04-19 22:20:15', '2025-04-19 22:20:15'),
(3160, 'NS1633/0136/2021', '1', 14, 1, 7, 7, '94.00', 'superadmin', '2025-04-19 22:20:15', '2025-04-19 22:20:15'),
(3161, 'NS0672/0094/2021', '1', 14, 1, 7, 7, '100.00', 'superadmin', '2025-04-19 22:20:16', '2025-04-19 22:20:16'),
(3162, 'NS2521/0024/2021', '1', 14, 1, 7, 7, '95.00', 'superadmin', '2025-04-19 22:20:16', '2025-04-19 22:20:16'),
(3163, 'NS1581/0075/2023', '1', 14, 1, 7, 7, '92.00', 'superadmin', '2025-04-19 22:20:16', '2025-04-19 22:20:16'),
(3164, 'NS2315/0115/2021', '1', 14, 1, 7, 7, '88.00', 'superadmin', '2025-04-19 22:20:16', '2025-04-19 22:20:16'),
(3165, 'NS2171/0052/2023', '1', 14, 1, 7, 7, '100.00', 'superadmin', '2025-04-19 22:20:16', '2025-04-19 22:20:16'),
(3166, 'NS2424/0074/2023', '1', 14, 1, 7, 7, '84.00', 'superadmin', '2025-04-19 22:20:16', '2025-04-19 22:20:16'),
(3167, 'NS0632/0053/2023', '1', 14, 1, 7, 7, '72.00', 'superadmin', '2025-04-19 22:20:16', '2025-04-19 22:20:16');
INSERT INTO `exam_category_results` (`id`, `reg_no`, `year_of_study`, `year_id`, `semester_id`, `course_id`, `exam_category_id`, `exam_score`, `uploadedby`, `created_at`, `updated_at`) VALUES
(3168, 'NS0672/0135/2023', '1', 14, 1, 7, 7, '92.00', 'superadmin', '2025-04-19 22:20:16', '2025-04-19 22:20:16'),
(3169, 'NS5376/0082/2023', '1', 14, 1, 7, 7, '94.00', 'superadmin', '2025-04-19 22:20:17', '2025-04-19 22:20:17'),
(3170, 'NS3228/0285/2022', '1', 14, 1, 7, 7, '76.00', 'superadmin', '2025-04-19 22:20:17', '2025-04-19 22:20:17'),
(3171, 'NS0541/0100/2023', '1', 14, 1, 7, 7, '94.00', 'superadmin', '2025-04-19 22:20:17', '2025-04-19 22:20:17'),
(3172, 'NS3534/0025/2023', '1', 14, 1, 7, 7, '92.00', 'superadmin', '2025-04-19 22:20:17', '2025-04-19 22:20:17'),
(3173, 'NS5251/0066/2023', '1', 14, 1, 7, 7, '87.00', 'superadmin', '2025-04-19 22:20:17', '2025-04-19 22:20:17'),
(3174, 'NS5298/0057/2023', '1', 14, 1, 7, 7, '89.00', 'superadmin', '2025-04-19 22:20:17', '2025-04-19 22:20:17'),
(3175, 'NS4897/0091/2023', '1', 14, 1, 7, 7, '98.00', 'superadmin', '2025-04-19 22:20:17', '2025-04-19 22:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `exam_scores`
--

CREATE TABLE `exam_scores` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_category_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploadedby` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment1` decimal(4,1) DEFAULT NULL,
  `assignment2` decimal(4,1) DEFAULT NULL,
  `test1` decimal(4,1) DEFAULT NULL,
  `test2` decimal(4,1) DEFAULT NULL,
  `ese` decimal(4,1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pract1` decimal(8,1) NOT NULL,
  `pract2` decimal(8,1) NOT NULL,
  `pract_ese` decimal(8,1) NOT NULL,
  `exam_remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint UNSIGNED NOT NULL,
  `campus_id` bigint UNSIGNED NOT NULL,
  `faculty_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_acronym` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `campus_id`, `faculty_name`, `faculty_acronym`, `address`, `email`, `tel`, `location`, `created_at`, `updated_at`) VALUES
(1, 1, 'Faculty of Science', 'FS', NULL, NULL, NULL, NULL, '2021-08-06 05:21:41', '2021-08-06 05:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_settings`
--

CREATE TABLE `faculty_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `faculty_id` bigint UNSIGNED NOT NULL,
  `intake_category_id` bigint UNSIGNED DEFAULT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `sem1` tinyint NOT NULL DEFAULT '0',
  `sem1_ca` tinyint NOT NULL DEFAULT '0',
  `sem2` tinyint NOT NULL DEFAULT '0',
  `sem2_ca` tinyint NOT NULL DEFAULT '0',
  `sem3` tinyint NOT NULL DEFAULT '0',
  `sem3_ca` tinyint NOT NULL DEFAULT '0',
  `sem4` tinyint NOT NULL DEFAULT '0',
  `sem4_ca` tinyint NOT NULL DEFAULT '0',
  `sem1_upload` tinyint NOT NULL DEFAULT '0',
  `sem2_upload` tinyint NOT NULL DEFAULT '0',
  `sem3_upload` tinyint NOT NULL DEFAULT '0',
  `sem4_upload` tinyint NOT NULL DEFAULT '0',
  `sup_upload` tinyint NOT NULL DEFAULT '0',
  `registration` tinyint NOT NULL DEFAULT '0',
  `sem1_registration` tinyint NOT NULL DEFAULT '0',
  `sem2_registration` tinyint NOT NULL DEFAULT '0',
  `sem1_status` tinyint NOT NULL DEFAULT '0',
  `sem2_status` tinyint NOT NULL DEFAULT '0',
  `sem1_finalist` tinyint NOT NULL DEFAULT '0',
  `sem2_finalist` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_rates`
--

CREATE TABLE `fee_rates` (
  `id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `fee_type_id` bigint UNSIGNED NOT NULL,
  `program_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(15,2) NOT NULL,
  `pay_exact` tinyint NOT NULL,
  `first_instalment` double DEFAULT NULL,
  `second_instalment` double DEFAULT NULL,
  `third_instalment` double DEFAULT NULL,
  `fourth_instalment` double DEFAULT NULL,
  `debtor_limit` double DEFAULT NULL,
  `year_of_study` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_types`
--

CREATE TABLE `fee_types` (
  `id` bigint UNSIGNED NOT NULL,
  `fee_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int UNSIGNED NOT NULL COMMENT 'eg.1:Direct cost, 2: Tuition fee',
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TZS',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gpa_classifications`
--

CREATE TABLE `gpa_classifications` (
  `id` bigint UNSIGNED NOT NULL,
  `study_level_id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `class_award` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `high_gpa` decimal(5,2) NOT NULL,
  `low_gpa` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gpa_classifications`
--

INSERT INTO `gpa_classifications` (`id`, `study_level_id`, `year_id`, `class_award`, `high_gpa`, `low_gpa`, `created_at`, `updated_at`) VALUES
(6, 3, 1, 'First class', '3.50', '4.00', '2021-02-15 23:27:48', '2021-02-15 23:28:21'),
(7, 3, 1, 'Second class', '3.00', '3.40', '2021-02-15 23:45:02', '2021-02-15 23:45:02'),
(8, 3, 1, 'Pass', '2.00', '2.90', '2021-02-15 23:45:59', '2021-02-15 23:45:59'),
(9, 4, 1, 'First class', '3.50', '4.00', '2021-02-17 02:08:43', '2021-07-09 12:34:19'),
(10, 4, 1, 'Second class', '3.00', '3.40', '2021-02-17 02:09:18', '2021-02-17 02:09:18'),
(11, 4, 1, 'Pass', '2.00', '2.90', '2021-02-17 02:23:19', '2021-02-17 02:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint UNSIGNED NOT NULL,
  `study_level_id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `grade` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `high_value` double(5,2) NOT NULL,
  `low_value` double(4,2) NOT NULL,
  `grade_point` double(4,2) NOT NULL,
  `left_value` decimal(8,4) NOT NULL,
  `operator` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_value` decimal(8,4) NOT NULL,
  `point_decimal_place` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `study_level_id`, `year_id`, `grade`, `high_value`, `low_value`, `grade_point`, `left_value`, `operator`, `right_value`, `point_decimal_place`, `created_at`, `updated_at`) VALUES
(7, 3, 12, 'A', 100.00, 80.00, 4.00, '0.0000', '+', '0.0000', 0, '2021-02-15 23:54:15', '2025-04-10 09:48:08'),
(8, 3, 12, 'B', 79.00, 65.00, 3.00, '0.0000', '+', '0.0000', 0, '2021-02-15 23:55:18', '2025-04-10 09:50:11'),
(9, 3, 1, 'C', 64.00, 50.00, 2.00, '0.0000', '+', '0.0000', 0, '2021-02-15 23:56:50', '2021-02-16 04:32:35'),
(10, 3, 1, 'D', 49.00, 40.00, 1.00, '0.0000', '+', '0.0000', 0, '2021-02-15 23:57:31', '2021-02-16 04:32:47'),
(11, 3, 1, 'F', 39.00, 0.00, 0.00, '0.0000', '+', '0.0000', 0, '2021-02-15 23:58:33', '2021-02-16 04:32:59'),
(12, 4, 1, 'A', 100.00, 80.00, 4.00, '0.0000', '+', '0.0000', 0, '2021-02-17 01:29:45', '2021-02-17 01:29:45'),
(13, 4, 1, 'B', 79.00, 65.00, 3.00, '0.0000', '+', '0.0000', 0, '2021-02-17 01:33:58', '2021-02-17 01:33:58'),
(14, 4, 1, 'C', 64.00, 50.00, 2.00, '0.0000', '+', '0.0000', 0, '2021-02-17 01:34:40', '2021-02-17 01:36:30'),
(15, 4, 1, 'D', 49.00, 40.00, 1.00, '0.0000', '+', '0.0000', 0, '2021-02-17 01:35:24', '2021-02-17 01:35:24'),
(16, 4, 1, 'F', 39.00, 0.00, 0.00, '0.0000', '+', '0.0000', 0, '2021-02-17 01:36:04', '2021-02-17 01:36:04'),
(23, 6, 11, 'A', 100.00, 75.00, 5.00, '78.0000', '+', '77.0000', 5, '2021-08-04 16:43:55', '2021-08-04 16:43:55'),
(24, 8, 11, 'A', 100.00, 75.00, 5.00, '2.0000', '+', '5.0000', 2, '2021-08-05 09:13:25', '2021-08-05 09:13:25'),
(25, 5, 11, 'A', 100.00, 70.00, 5.00, '0.0000', '+', '0.0000', 1, '2021-08-10 12:08:11', '2021-08-10 12:08:11'),
(26, 5, 11, 'B+', 69.00, 60.00, 4.00, '0.0000', '+', '0.0000', 1, '2021-08-10 12:09:08', '2021-08-10 12:09:08'),
(27, 5, 11, 'B', 59.00, 50.00, 3.00, '0.0000', '+', '0.0000', 1, '2021-08-10 12:09:37', '2021-08-12 11:48:40'),
(28, 5, 11, 'C', 49.00, 40.00, 2.00, '0.0000', '+', '0.0000', 1, '2021-08-10 12:10:18', '2021-08-10 12:10:18'),
(29, 5, 11, 'D', 39.00, 35.00, 1.00, '0.0000', '+', '0.0000', 1, '2021-08-10 12:10:46', '2021-08-10 12:10:46'),
(30, 5, 11, 'E', 34.00, 0.00, 0.00, '0.0000', '+', '0.0000', 1, '2021-08-10 12:11:13', '2021-08-10 12:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostel_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostel_capacity` int NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` bigint UNSIGNED NOT NULL,
  `institution_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_acronym` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `institution_name`, `institution_acronym`, `address`, `tel`, `fax`, `email`, `website`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Kange Secondary School', 'KASS', 'P.O BOX 5079 TANGA', '0672187936', NULL, 'kacohas2022@gmail.com', 'kacohas.ac.tz', 'TANGA', '2020-12-30 15:35:32', '2025-07-07 08:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `intake_categories`
--

CREATE TABLE `intake_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `year_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intake_categories`
--

INSERT INTO `intake_categories` (`id`, `name`, `descriptions`, `status`, `year_id`, `created_at`, `updated_at`) VALUES
(1, 'Form I', NULL, 'active', 14, '2020-12-31 01:42:41', '2025-07-07 08:48:05'),
(6, 'Form II', 'Form II student will be registered here', 'active', 14, '2025-07-07 08:53:58', '2025-07-07 08:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED DEFAULT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee_type_id` bigint UNSIGNED DEFAULT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(100,2) NOT NULL,
  `gfs_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `control_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent` tinyint NOT NULL DEFAULT '0',
  `invoice_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee_amount` double(100,2) NOT NULL,
  `fee_category` int UNSIGNED DEFAULT NULL,
  `nta_level` int UNSIGNED DEFAULT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `print_invoice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `print_transfer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `equivalent_amount` double(100,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `debt_status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `limit_course_registrations`
--

CREATE TABLE `limit_course_registrations` (
  `id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `semester_id` bigint UNSIGNED NOT NULL,
  `campus_id` bigint UNSIGNED DEFAULT NULL,
  `faculty_id` bigint UNSIGNED DEFAULT NULL,
  `intake_category_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL,
  `dead_line` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_histories`
--

CREATE TABLE `login_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipaddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_histories`
--

INSERT INTO `login_histories` (`id`, `username`, `user_id`, `device`, `ipaddress`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'NS0241/0039/2020', '36', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 09:16:13', '2025-04-16 06:16:13', '2025-04-16 06:16:13'),
(2, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 09:17:52', '2025-04-16 06:17:52', '2025-04-16 06:17:52'),
(3, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:08:00', '2025-04-16 09:08:00', '2025-04-16 09:08:00'),
(4, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:08:07', '2025-04-16 09:08:07', '2025-04-16 09:08:07'),
(5, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:09:53', '2025-04-16 09:09:53', '2025-04-16 09:09:53'),
(6, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:10:22', '2025-04-16 09:10:22', '2025-04-16 09:10:22'),
(7, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:10:28', '2025-04-16 09:10:28', '2025-04-16 09:10:28'),
(8, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:10:54', '2025-04-16 09:10:54', '2025-04-16 09:10:54'),
(9, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:11:07', '2025-04-16 09:11:07', '2025-04-16 09:11:07'),
(10, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:11:18', '2025-04-16 09:11:18', '2025-04-16 09:11:18'),
(11, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:11:44', '2025-04-16 09:11:44', '2025-04-16 09:11:44'),
(12, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:11:54', '2025-04-16 09:11:54', '2025-04-16 09:11:54'),
(13, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:12:05', '2025-04-16 09:12:05', '2025-04-16 09:12:05'),
(14, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:12:13', '2025-04-16 09:12:13', '2025-04-16 09:12:13'),
(15, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:12:20', '2025-04-16 09:12:20', '2025-04-16 09:12:20'),
(16, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:12:27', '2025-04-16 09:12:27', '2025-04-16 09:12:27'),
(17, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:12:39', '2025-04-16 09:12:39', '2025-04-16 09:12:39'),
(18, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:13:15', '2025-04-16 09:13:15', '2025-04-16 09:13:15'),
(19, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-16 12:20:03', '2025-04-16 09:20:03', '2025-04-16 09:20:03'),
(20, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-18 05:39:44', '2025-04-18 02:39:44', '2025-04-18 02:39:44'),
(21, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-18 05:40:04', '2025-04-18 02:40:04', '2025-04-18 02:40:04'),
(22, 'examofficer', '75', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-18 05:43:16', '2025-04-18 02:43:16', '2025-04-18 02:43:16'),
(23, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-18 06:55:41', '2025-04-18 03:55:41', '2025-04-18 03:55:41'),
(24, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-18 06:57:19', '2025-04-18 03:57:19', '2025-04-18 03:57:19'),
(25, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 12:20:20', '2025-04-20 09:20:20', '2025-04-20 09:20:20'),
(26, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 15:52:05', '2025-04-20 12:52:05', '2025-04-20 12:52:05'),
(27, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 16:59:55', '2025-04-20 13:59:55', '2025-04-20 13:59:55'),
(28, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:01:29', '2025-04-20 14:01:29', '2025-04-20 14:01:29'),
(29, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:01:43', '2025-04-20 14:01:43', '2025-04-20 14:01:43'),
(30, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:12:03', '2025-04-20 14:12:03', '2025-04-20 14:12:03'),
(31, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:12:31', '2025-04-20 14:12:31', '2025-04-20 14:12:31'),
(32, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:24:01', '2025-04-20 14:24:01', '2025-04-20 14:24:01'),
(33, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:25:12', '2025-04-20 14:25:12', '2025-04-20 14:25:12'),
(34, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:25:41', '2025-04-20 14:25:41', '2025-04-20 14:25:41'),
(35, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:25:58', '2025-04-20 14:25:58', '2025-04-20 14:25:58'),
(36, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:26:06', '2025-04-20 14:26:06', '2025-04-20 14:26:06'),
(37, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:30:22', '2025-04-20 14:30:22', '2025-04-20 14:30:22'),
(38, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:31:58', '2025-04-20 14:31:58', '2025-04-20 14:31:58'),
(39, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 17:46:42', '2025-04-20 14:46:42', '2025-04-20 14:46:42'),
(40, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:03:03', '2025-04-20 15:03:03', '2025-04-20 15:03:03'),
(41, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:03:53', '2025-04-20 15:03:53', '2025-04-20 15:03:53'),
(42, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:12:17', '2025-04-20 15:12:17', '2025-04-20 15:12:17'),
(43, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:15:19', '2025-04-20 15:15:19', '2025-04-20 15:15:19'),
(44, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:17:41', '2025-04-20 15:17:41', '2025-04-20 15:17:41'),
(45, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:18:47', '2025-04-20 15:18:47', '2025-04-20 15:18:47'),
(46, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:20:18', '2025-04-20 15:20:18', '2025-04-20 15:20:18'),
(47, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:21:20', '2025-04-20 15:21:20', '2025-04-20 15:21:20'),
(48, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:22:17', '2025-04-20 15:22:17', '2025-04-20 15:22:17'),
(49, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:22:36', '2025-04-20 15:22:36', '2025-04-20 15:22:36'),
(50, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:23:42', '2025-04-20 15:23:42', '2025-04-20 15:23:42'),
(51, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:23:56', '2025-04-20 15:23:56', '2025-04-20 15:23:56'),
(52, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:24:30', '2025-04-20 15:24:30', '2025-04-20 15:24:30'),
(53, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:26:14', '2025-04-20 15:26:14', '2025-04-20 15:26:14'),
(54, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:28:39', '2025-04-20 15:28:39', '2025-04-20 15:28:39'),
(55, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:29:58', '2025-04-20 15:29:58', '2025-04-20 15:29:58'),
(56, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:33:36', '2025-04-20 15:33:36', '2025-04-20 15:33:36'),
(57, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:39:31', '2025-04-20 15:39:31', '2025-04-20 15:39:31'),
(58, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:40:37', '2025-04-20 15:40:37', '2025-04-20 15:40:37'),
(59, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:54:58', '2025-04-20 15:54:58', '2025-04-20 15:54:58'),
(60, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:56:47', '2025-04-20 15:56:47', '2025-04-20 15:56:47'),
(61, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:58:33', '2025-04-20 15:58:33', '2025-04-20 15:58:33'),
(62, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 18:58:42', '2025-04-20 15:58:42', '2025-04-20 15:58:42'),
(63, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:00:06', '2025-04-20 16:00:06', '2025-04-20 16:00:06'),
(64, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:00:08', '2025-04-20 16:00:08', '2025-04-20 16:00:08'),
(65, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:00:36', '2025-04-20 16:00:36', '2025-04-20 16:00:36'),
(66, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:00:44', '2025-04-20 16:00:44', '2025-04-20 16:00:44'),
(67, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:02:19', '2025-04-20 16:02:19', '2025-04-20 16:02:19'),
(68, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:05:19', '2025-04-20 16:05:19', '2025-04-20 16:05:19'),
(69, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:06:46', '2025-04-20 16:06:46', '2025-04-20 16:06:46'),
(70, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:06:56', '2025-04-20 16:06:56', '2025-04-20 16:06:56'),
(71, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:07:04', '2025-04-20 16:07:04', '2025-04-20 16:07:04'),
(72, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:07:13', '2025-04-20 16:07:13', '2025-04-20 16:07:13'),
(73, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:10:51', '2025-04-20 16:10:51', '2025-04-20 16:10:51'),
(74, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:13:03', '2025-04-20 16:13:03', '2025-04-20 16:13:03'),
(75, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:14:10', '2025-04-20 16:14:10', '2025-04-20 16:14:10'),
(76, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:15:28', '2025-04-20 16:15:28', '2025-04-20 16:15:28'),
(77, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:18:50', '2025-04-20 16:18:50', '2025-04-20 16:18:50'),
(78, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:22:46', '2025-04-20 16:22:46', '2025-04-20 16:22:46'),
(79, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:27:10', '2025-04-20 16:27:10', '2025-04-20 16:27:10'),
(80, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-20 19:29:39', '2025-04-20 16:29:39', '2025-04-20 16:29:39'),
(81, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 07:38:37', '2025-04-21 04:38:37', '2025-04-21 04:38:37'),
(82, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 07:41:26', '2025-04-21 04:41:26', '2025-04-21 04:41:26'),
(83, 'NS4710/0030/2023', '56', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:17:46', '2025-04-21 05:17:46', '2025-04-21 05:17:46'),
(84, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:19:24', '2025-04-21 05:19:24', '2025-04-21 05:19:24'),
(85, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:29:43', '2025-04-21 05:29:43', '2025-04-21 05:29:43'),
(86, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:29:46', '2025-04-21 05:29:46', '2025-04-21 05:29:46'),
(87, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:29:50', '2025-04-21 05:29:50', '2025-04-21 05:29:50'),
(88, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:29:54', '2025-04-21 05:29:54', '2025-04-21 05:29:54'),
(89, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:32:58', '2025-04-21 05:32:58', '2025-04-21 05:32:58'),
(90, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:36:52', '2025-04-21 05:36:52', '2025-04-21 05:36:52'),
(91, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:36:53', '2025-04-21 05:36:53', '2025-04-21 05:36:53'),
(92, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:38:59', '2025-04-21 05:38:59', '2025-04-21 05:38:59'),
(93, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:40:47', '2025-04-21 05:40:47', '2025-04-21 05:40:47'),
(94, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:46:48', '2025-04-21 05:46:48', '2025-04-21 05:46:48'),
(95, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 08:47:25', '2025-04-21 05:47:25', '2025-04-21 05:47:25'),
(96, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:00:32', '2025-04-21 06:00:32', '2025-04-21 06:00:32'),
(97, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:00:33', '2025-04-21 06:00:33', '2025-04-21 06:00:33'),
(98, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:01:36', '2025-04-21 06:01:36', '2025-04-21 06:01:36'),
(99, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:02:38', '2025-04-21 06:02:38', '2025-04-21 06:02:38'),
(100, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:03:16', '2025-04-21 06:03:16', '2025-04-21 06:03:16'),
(101, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:03:34', '2025-04-21 06:03:34', '2025-04-21 06:03:34'),
(102, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:03:42', '2025-04-21 06:03:42', '2025-04-21 06:03:42'),
(103, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:03:54', '2025-04-21 06:03:54', '2025-04-21 06:03:54'),
(104, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:05:55', '2025-04-21 06:05:55', '2025-04-21 06:05:55'),
(105, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:06:17', '2025-04-21 06:06:17', '2025-04-21 06:06:17'),
(106, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:06:18', '2025-04-21 06:06:18', '2025-04-21 06:06:18'),
(107, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:06:31', '2025-04-21 06:06:31', '2025-04-21 06:06:31'),
(108, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:08:40', '2025-04-21 06:08:40', '2025-04-21 06:08:40'),
(109, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:08:41', '2025-04-21 06:08:41', '2025-04-21 06:08:41'),
(110, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:09:14', '2025-04-21 06:09:14', '2025-04-21 06:09:14'),
(111, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:10:08', '2025-04-21 06:10:08', '2025-04-21 06:10:08'),
(112, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:10:09', '2025-04-21 06:10:09', '2025-04-21 06:10:09'),
(113, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:12:19', '2025-04-21 06:12:19', '2025-04-21 06:12:19'),
(114, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:12:20', '2025-04-21 06:12:20', '2025-04-21 06:12:20'),
(115, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:13:41', '2025-04-21 06:13:41', '2025-04-21 06:13:41'),
(116, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:14:15', '2025-04-21 06:14:15', '2025-04-21 06:14:15'),
(117, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:14:41', '2025-04-21 06:14:41', '2025-04-21 06:14:41'),
(118, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:17:16', '2025-04-21 06:17:16', '2025-04-21 06:17:16'),
(119, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:17:23', '2025-04-21 06:17:23', '2025-04-21 06:17:23'),
(120, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:17:24', '2025-04-21 06:17:24', '2025-04-21 06:17:24'),
(121, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:18:05', '2025-04-21 06:18:05', '2025-04-21 06:18:05'),
(122, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:18:21', '2025-04-21 06:18:21', '2025-04-21 06:18:21'),
(123, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:18:22', '2025-04-21 06:18:22', '2025-04-21 06:18:22'),
(124, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:18:41', '2025-04-21 06:18:41', '2025-04-21 06:18:41'),
(125, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:19:44', '2025-04-21 06:19:44', '2025-04-21 06:19:44'),
(126, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:20:09', '2025-04-21 06:20:09', '2025-04-21 06:20:09'),
(127, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:20:41', '2025-04-21 06:20:41', '2025-04-21 06:20:41'),
(128, 'NS5289/0024/2023', '3', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:21:28', '2025-04-21 06:21:28', '2025-04-21 06:21:28'),
(129, 'NS5289/0024/2023', '3', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:22:08', '2025-04-21 06:22:08', '2025-04-21 06:22:08'),
(130, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:22:51', '2025-04-21 06:22:51', '2025-04-21 06:22:51'),
(131, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:22:52', '2025-04-21 06:22:52', '2025-04-21 06:22:52'),
(132, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:23:40', '2025-04-21 06:23:40', '2025-04-21 06:23:40'),
(133, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:26:41', '2025-04-21 06:26:41', '2025-04-21 06:26:41'),
(134, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:35:16', '2025-04-21 06:35:16', '2025-04-21 06:35:16'),
(135, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:35:29', '2025-04-21 06:35:29', '2025-04-21 06:35:29'),
(136, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:35:31', '2025-04-21 06:35:31', '2025-04-21 06:35:31'),
(137, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:36:09', '2025-04-21 06:36:09', '2025-04-21 06:36:09'),
(138, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:36:10', '2025-04-21 06:36:10', '2025-04-21 06:36:10'),
(139, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:36:25', '2025-04-21 06:36:25', '2025-04-21 06:36:25'),
(140, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:36:33', '2025-04-21 06:36:33', '2025-04-21 06:36:33'),
(141, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:36:41', '2025-04-21 06:36:41', '2025-04-21 06:36:41'),
(142, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:37:41', '2025-04-21 06:37:41', '2025-04-21 06:37:41'),
(143, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:37:49', '2025-04-21 06:37:49', '2025-04-21 06:37:49'),
(144, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:37:57', '2025-04-21 06:37:57', '2025-04-21 06:37:57'),
(145, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:38:02', '2025-04-21 06:38:02', '2025-04-21 06:38:02'),
(146, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:38:06', '2025-04-21 06:38:06', '2025-04-21 06:38:06'),
(147, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:38:08', '2025-04-21 06:38:08', '2025-04-21 06:38:08'),
(148, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:38:38', '2025-04-21 06:38:38', '2025-04-21 06:38:38'),
(149, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:38:49', '2025-04-21 06:38:49', '2025-04-21 06:38:49'),
(150, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:39:41', '2025-04-21 06:39:41', '2025-04-21 06:39:41'),
(151, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:40:02', '2025-04-21 06:40:02', '2025-04-21 06:40:02'),
(152, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:40:23', '2025-04-21 06:40:23', '2025-04-21 06:40:23'),
(153, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:40:40', '2025-04-21 06:40:40', '2025-04-21 06:40:40'),
(154, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:40:49', '2025-04-21 06:40:49', '2025-04-21 06:40:49'),
(155, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:41:21', '2025-04-21 06:41:21', '2025-04-21 06:41:21'),
(156, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 09:41:38', '2025-04-21 06:41:38', '2025-04-21 06:41:38'),
(157, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:01:57', '2025-04-21 07:01:57', '2025-04-21 07:01:57'),
(158, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:04:31', '2025-04-21 07:04:31', '2025-04-21 07:04:31'),
(159, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:04:43', '2025-04-21 07:04:43', '2025-04-21 07:04:43'),
(160, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:05:13', '2025-04-21 07:05:13', '2025-04-21 07:05:13'),
(161, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:07:01', '2025-04-21 07:07:01', '2025-04-21 07:07:01'),
(162, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:07:53', '2025-04-21 07:07:53', '2025-04-21 07:07:53'),
(163, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:10:13', '2025-04-21 07:10:13', '2025-04-21 07:10:13'),
(164, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:11:27', '2025-04-21 07:11:27', '2025-04-21 07:11:27'),
(165, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:15:29', '2025-04-21 07:15:29', '2025-04-21 07:15:29'),
(166, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:16:23', '2025-04-21 07:16:23', '2025-04-21 07:16:23'),
(167, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:17:39', '2025-04-21 07:17:39', '2025-04-21 07:17:39'),
(168, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:17:45', '2025-04-21 07:17:45', '2025-04-21 07:17:45'),
(169, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:17:55', '2025-04-21 07:17:55', '2025-04-21 07:17:55'),
(170, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:18:04', '2025-04-21 07:18:04', '2025-04-21 07:18:04'),
(171, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:19:16', '2025-04-21 07:19:16', '2025-04-21 07:19:16'),
(172, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:20:01', '2025-04-21 07:20:01', '2025-04-21 07:20:01'),
(173, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:21:41', '2025-04-21 07:21:41', '2025-04-21 07:21:41'),
(174, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:22:13', '2025-04-21 07:22:13', '2025-04-21 07:22:13'),
(175, 'accountant', '77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:23:27', '2025-04-21 07:23:27', '2025-04-21 07:23:27'),
(176, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:32:26', '2025-04-21 07:32:26', '2025-04-21 07:32:26'),
(177, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:34:42', '2025-04-21 07:34:42', '2025-04-21 07:34:42'),
(178, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:35:04', '2025-04-21 07:35:04', '2025-04-21 07:35:04'),
(179, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:36:55', '2025-04-21 07:36:55', '2025-04-21 07:36:55'),
(180, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 10:37:41', '2025-04-21 07:37:41', '2025-04-21 07:37:41'),
(181, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 20:35:29', '2025-04-21 17:35:29', '2025-04-21 17:35:29'),
(182, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 20:36:04', '2025-04-21 17:36:04', '2025-04-21 17:36:04'),
(183, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 20:36:50', '2025-04-21 17:36:50', '2025-04-21 17:36:50'),
(184, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 20:37:37', '2025-04-21 17:37:37', '2025-04-21 17:37:37'),
(185, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 20:37:54', '2025-04-21 17:37:54', '2025-04-21 17:37:54'),
(186, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 20:39:59', '2025-04-21 17:39:59', '2025-04-21 17:39:59'),
(187, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 20:45:58', '2025-04-21 17:45:58', '2025-04-21 17:45:58'),
(188, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-21 20:52:13', '2025-04-21 17:52:13', '2025-04-21 17:52:13'),
(189, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-23 21:35:25', '2025-04-23 18:35:25', '2025-04-23 18:35:25'),
(190, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-04-24 12:44:30', '2025-04-24 09:44:30', '2025-04-24 09:44:30'),
(191, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-05-07 03:53:21', '2025-05-07 00:53:21', '2025-05-07 00:53:21'),
(192, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '127.0.0.1', '2025-05-16 09:56:02', '2025-05-16 06:56:02', '2025-05-16 06:56:02'),
(193, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '127.0.0.1', '2025-06-22 14:02:12', '2025-06-22 11:02:12', '2025-06-22 11:02:12'),
(194, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '127.0.0.1', '2025-06-22 14:35:33', '2025-06-22 11:35:33', '2025-06-22 11:35:33'),
(195, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '127.0.0.1', '2025-07-06 09:22:00', '2025-07-06 06:22:00', '2025-07-06 06:22:00'),
(196, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '127.0.0.1', '2025-07-07 06:37:58', '2025-07-07 03:37:58', '2025-07-07 03:37:58'),
(197, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '127.0.0.1', '2025-07-07 06:44:44', '2025-07-07 03:44:44', '2025-07-07 03:44:44'),
(198, 'superadmin', '1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', '127.0.0.1', '2025-07-07 08:14:00', '2025-07-07 05:14:00', '2025-07-07 05:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `manner_of_entries`
--

CREATE TABLE `manner_of_entries` (
  `id` bigint UNSIGNED NOT NULL,
  `manner_of_entry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manner_of_entries`
--

INSERT INTO `manner_of_entries` (`id`, `manner_of_entry`, `created_at`, `updated_at`) VALUES
(1, 'Direct', NULL, NULL),
(2, 'Equivalent', NULL, NULL),
(3, 'Mature Entry', NULL, NULL),
(4, 'Pre-Entry', NULL, NULL),
(5, 'Transfered', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(237, '2017_10_10_170707_create_manner_of_entries_table', 1),
(238, '2017_10_10_170707_create_semesters_table', 1),
(239, '2017_10_15_110920_create_buildings_table', 1),
(240, '2017_10_15_110921_create_study_levels_table', 1),
(241, '2017_10_23_100726_create_academic_years_table', 1),
(242, '2017_10_23_120041_create_intake_categories_table', 1),
(243, '2017_10_23_192010_create_positions_table', 1),
(244, '2017_10_25_125941_create_institutions_table', 1),
(245, '2017_10_25_134653_create_campuses_table', 1),
(246, '2017_10_25_135959_create_faculties_table', 1),
(247, '2017_10_25_135963_create_departments_table', 1),
(248, '2018_10_23_000000_create_users_table', 1),
(249, '2018_10_23_100000_create_password_resets_table', 1),
(250, '2018_10_23_100726_create_permission_tables', 1),
(251, '2018_10_23_198010_create_staffs_table', 1),
(252, '2018_10_23_201239_create_students_table', 1),
(253, '2018_10_23_234912_create_settings_table', 1),
(254, '2018_10_24_075913_create_programs_table', 1),
(255, '2018_10_30_193713_create_comments_table', 1),
(257, '2018_10_31_065954_create_mean_tests_table', 1),
(258, '2018_10_31_071232_create_student_transactions_table', 1),
(259, '2018_10_31_172423_create_direct_costs_table', 1),
(260, '2018_11_09_162509_create_grades_table', 1),
(261, '2018_11_09_163406_create_gpas_table', 1),
(262, '2018_11_10_124006_create_courses_table', 1),
(263, '2018_11_12_044018_create_course_program_table', 1),
(264, '2018_11_12_050018_create_course_student_table', 1),
(265, '2018_11_14_104645_create_file_histories_table', 1),
(266, '2018_11_19_155423_create_course_staff_table', 1),
(267, '2018_11_25_010707_create_faculty_settings_table', 1),
(268, '2018_12_05_185811_create_publishers_table', 1),
(269, '2018_12_24_215317_create_student_classes_table', 1),
(270, '2019_08_19_000000_create_failed_jobs_table', 1),
(271, '2019_09_17_003258_create_gpa_classifications_table', 1),
(272, '2020_06_26_190953_create_annual_report_remarks_table', 1),
(273, '2020_09_15_153134_create_sponsors_table', 1),
(274, '2020_09_15_153212_create_student_sponsors_table', 1),
(275, '2020_09_16_093243_create_attachments_table', 1),
(276, '2020_09_16_093338_create_student_attachments_table', 1),
(277, '2020_09_18_124257_create_exam_categories_table', 1),
(278, '2020_09_22_120157_create_applicant_details_table', 1),
(279, '2020_10_02_105015_create_student_banks_table', 1),
(280, '2020_10_02_105452_create_next_of_kin_table', 1),
(281, '2020_10_02_105659_create_dependants_table', 1),
(282, '2020_10_02_105718_create_education_histories_table', 1),
(283, '2020_10_02_123426_create_payment_types_table', 1),
(284, '2020_10_02_123504_create_student_payments_table', 1),
(285, '2020_10_02_124451_create_student_contacts_table', 1),
(286, '2020_11_21_152631_create_exam_category_results_table', 1),
(287, '2020_11_21_152736_create_course_results_table', 1),
(288, '2020_11_21_152813_create_semester_results_table', 1),
(289, '2020_11_21_152831_create_annual_results_table', 1),
(290, '2020_11_21_152851_create_transcripts_table', 1),
(291, '2020_11_21_152904_create_course_result_summaries_table', 1),
(292, '2020_11_21_152929_create_semester_result_summaries_table', 1),
(293, '2020_11_21_153009_create_annual_result_summaries_table', 1),
(294, '2020_11_30_210454_create_course_exam_categories_table', 1),
(295, '2020_12_19_162934_create_exam_lookups_table', 1),
(296, '2021_01_04_133657_drop_permision_table', 2),
(297, '2021_01_05_085719_create_bouncer_tables', 2),
(298, '2021_01_10_083334_create_fee_types_table', 3),
(299, '2021_01_10_083344_create_fee_rates_table', 3),
(300, '2021_01_10_083349_create_invoices_table', 3),
(301, '2021_01_10_181103_add_program_code_to_studets_table', 3),
(302, '2021_01_10_181201_add_program_code_to_studet_classes_table', 3),
(303, '2021_01_10_184304_create_payments_table', 3),
(304, '2021_01_15_140419_create_upload_limits_table', 4),
(305, '2021_01_15_140740_create_publish_exams_table', 4),
(306, '2021_01_16_124829_add_program_code_to_course_programs_table', 4),
(307, '2021_01_16_135247_create_limit_course_registrations_table', 4),
(308, '2021_01_18_231139_add_ca_score_and_se_score_in_course_results_table', 5),
(309, '2021_02_19_090339_addcolumn_to_course_results_summary', 6),
(310, '2021_02_19_124140_addrenamecolumn_tocourseresultsummary', 7),
(311, '2021_02_19_125409_addcolumn_to_coursesummaryresult', 7),
(312, '2021_02_19_135052_addclomn_to_coursesummary', 7),
(313, '2021_03_01_200518_creat_table__semesterresult', 7),
(314, '2021_03_01_203424_creat_table__semestertableresult', 7),
(315, '2021_03_01_221246_creat_table__semestertable', 7),
(316, '2021_03_01_221758_creat_table__semester', 7),
(317, '2021_03_04_190012_create_election_posts_table', 7),
(318, '2021_03_04_190046_create_election_candidates_table', 7),
(319, '2021_03_04_190122_create_election_votes_table', 7),
(320, '2021_03_04_233216_create_login_histories_table', 7),
(321, '2021_03_05_144407_modifycolumn_to_electioncandidate', 8),
(322, '2021_03_05_144742_modifycolumn_to_elections', 8),
(323, '2021_04_13_153539_create_exam_scores_table', 9),
(324, '2021_04_14_135353_create_unpaid_students_table', 10),
(325, '2021_04_22_170123_update_exam_scores_table', 11),
(326, '2021_04_22_170811_update_exam_scores_tables', 11),
(327, '2021_04_23_163545_update_courses_tabless', 12),
(328, '2021_04_29_184724_update_exam_scores', 13),
(329, '2021_05_05_101227_create_criterias_table', 14),
(330, '2021_06_01_171405_create_hostels_table', 14),
(331, '2021_06_02_092427_create_blocks_table', 14),
(332, '2021_06_02_093000_create_rooms_table', 14),
(333, '2021_06_02_094004_create_allocations_table', 14),
(334, '2021_06_03_124026_create_roomapplications_table', 14),
(335, '2019_12_14_000001_create_personal_access_tokens_table', 15),
(336, '2023_02_16_122610_create_combinations_table', 15),
(337, '2023_02_17_113458_create_combination_courses_table', 15),
(338, '2023_10_27_094706_create_transactions_table', 15),
(339, '2023_11_14_061331_create_debtors_table', 15),
(340, '2023_11_14_072848_change_data_type_in_invoices', 15),
(341, '2023_11_14_073238_add_column_to_transactions', 15),
(342, '2023_11_16_094852_add_column_to_invoices', 15),
(343, '2023_11_16_095824_add_new_column_to_transactions', 15),
(344, '2024_10_20_082507_create_centers_table', 15),
(345, '2024_10_20_205020_add_center_to_students_table', 15),
(346, '2024_10_20_205042_add_center_to_student_classes_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `next_of_kin`
--

CREATE TABLE `next_of_kin` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ega_reference` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` int UNSIGNED DEFAULT NULL,
  `control_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double(65,2) DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_channel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent` tinyint NOT NULL DEFAULT '0',
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `print_receipt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `ability_id` bigint UNSIGNED NOT NULL,
  `entity_id` bigint UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `scope` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `ability_id`, `entity_id`, `entity_type`, `forbidden`, `scope`) VALUES
(442, 52, 9, 'roles', 0, NULL),
(443, 54, 9, 'roles', 0, NULL),
(2710, 66, 6, 'roles', 0, NULL),
(2711, 107, 6, 'roles', 0, NULL),
(2712, 108, 6, 'roles', 0, NULL),
(2713, 109, 6, 'roles', 0, NULL),
(2714, 110, 6, 'roles', 0, NULL),
(2715, 111, 6, 'roles', 0, NULL),
(2716, 112, 6, 'roles', 0, NULL),
(5111, 56, 8, 'roles', 0, NULL),
(5112, 149, 8, 'roles', 0, NULL),
(10985, 54, 2, 'roles', 0, NULL),
(10986, 57, 2, 'roles', 0, NULL),
(10987, 65, 2, 'roles', 0, NULL),
(10988, 66, 2, 'roles', 0, NULL),
(10989, 67, 2, 'roles', 0, NULL),
(10990, 92, 2, 'roles', 0, NULL),
(10991, 93, 2, 'roles', 0, NULL),
(10992, 94, 2, 'roles', 0, NULL),
(10993, 95, 2, 'roles', 0, NULL),
(12601, 1, 12, 'roles', 0, NULL),
(12602, 2, 12, 'roles', 0, NULL),
(12603, 3, 12, 'roles', 0, NULL),
(12604, 4, 12, 'roles', 0, NULL),
(12605, 6, 12, 'roles', 0, NULL),
(12606, 7, 12, 'roles', 0, NULL),
(12607, 8, 12, 'roles', 0, NULL),
(12608, 9, 12, 'roles', 0, NULL),
(12609, 11, 12, 'roles', 0, NULL),
(12610, 12, 12, 'roles', 0, NULL),
(12611, 16, 12, 'roles', 0, NULL),
(12612, 17, 12, 'roles', 0, NULL),
(12613, 18, 12, 'roles', 0, NULL),
(12614, 19, 12, 'roles', 0, NULL),
(12615, 20, 12, 'roles', 0, NULL),
(12616, 21, 12, 'roles', 0, NULL),
(12617, 72, 12, 'roles', 0, NULL),
(12618, 73, 12, 'roles', 0, NULL),
(12619, 74, 12, 'roles', 0, NULL),
(12620, 75, 12, 'roles', 0, NULL),
(12621, 76, 12, 'roles', 0, NULL),
(12622, 102, 12, 'roles', 0, NULL),
(12623, 103, 12, 'roles', 0, NULL),
(12624, 135, 12, 'roles', 0, NULL),
(12625, 137, 12, 'roles', 0, NULL),
(12719, 21, 5, 'roles', 0, NULL),
(12720, 52, 5, 'roles', 0, NULL),
(12721, 53, 5, 'roles', 0, NULL),
(12722, 54, 5, 'roles', 0, NULL),
(12723, 55, 5, 'roles', 0, NULL),
(12724, 56, 5, 'roles', 0, NULL),
(12725, 57, 5, 'roles', 0, NULL),
(12726, 58, 5, 'roles', 0, NULL),
(12727, 59, 5, 'roles', 0, NULL),
(12728, 71, 5, 'roles', 0, NULL),
(12729, 77, 5, 'roles', 0, NULL),
(12730, 78, 5, 'roles', 0, NULL),
(12731, 79, 5, 'roles', 0, NULL),
(12732, 80, 5, 'roles', 0, NULL),
(12733, 81, 5, 'roles', 0, NULL),
(12734, 104, 5, 'roles', 0, NULL),
(12735, 129, 5, 'roles', 0, NULL),
(12736, 130, 5, 'roles', 0, NULL),
(12737, 131, 5, 'roles', 0, NULL),
(12738, 132, 5, 'roles', 0, NULL),
(12739, 133, 5, 'roles', 0, NULL),
(12740, 134, 5, 'roles', 0, NULL),
(12741, 150, 5, 'roles', 0, NULL),
(12742, 174, 5, 'roles', 0, NULL),
(12853, 66, 11, 'roles', 0, NULL),
(12854, 87, 11, 'roles', 0, NULL),
(12855, 89, 11, 'roles', 0, NULL),
(12856, 107, 11, 'roles', 0, NULL),
(12857, 109, 11, 'roles', 0, NULL),
(12858, 118, 11, 'roles', 0, NULL),
(12859, 119, 11, 'roles', 0, NULL),
(12860, 120, 11, 'roles', 0, NULL),
(12861, 121, 11, 'roles', 0, NULL),
(12862, 123, 11, 'roles', 0, NULL),
(12863, 137, 11, 'roles', 0, NULL),
(12864, 151, 11, 'roles', 0, NULL),
(12865, 160, 11, 'roles', 0, NULL),
(12866, 161, 11, 'roles', 0, NULL),
(12867, 174, 11, 'roles', 0, NULL),
(12868, 175, 11, 'roles', 0, NULL),
(15146, 106, 1, 'roles', 0, NULL),
(15222, 32, 4, 'roles', 0, NULL),
(15223, 33, 4, 'roles', 0, NULL),
(15224, 34, 4, 'roles', 0, NULL),
(15225, 35, 4, 'roles', 0, NULL),
(15226, 36, 4, 'roles', 0, NULL),
(15227, 65, 4, 'roles', 0, NULL),
(15228, 66, 4, 'roles', 0, NULL),
(15229, 105, 4, 'roles', 0, NULL),
(15230, 113, 4, 'roles', 0, NULL),
(15231, 114, 4, 'roles', 0, NULL),
(15232, 115, 4, 'roles', 0, NULL),
(15233, 116, 4, 'roles', 0, NULL),
(15234, 117, 4, 'roles', 0, NULL),
(15235, 118, 4, 'roles', 0, NULL),
(15236, 119, 4, 'roles', 0, NULL),
(15237, 120, 4, 'roles', 0, NULL),
(15238, 121, 4, 'roles', 0, NULL),
(15239, 122, 4, 'roles', 0, NULL),
(15240, 123, 4, 'roles', 0, NULL),
(15241, 134, 4, 'roles', 0, NULL),
(15242, 136, 4, 'roles', 0, NULL),
(15243, 143, 4, 'roles', 0, NULL),
(15244, 152, 4, 'roles', 0, NULL),
(15245, 153, 4, 'roles', 0, NULL),
(15246, 160, 4, 'roles', 0, NULL),
(15247, 161, 4, 'roles', 0, NULL),
(15248, 170, 4, 'roles', 0, NULL),
(15249, 174, 4, 'roles', 0, NULL),
(15250, 199, 4, 'roles', 0, NULL),
(15251, 21, 15, 'roles', 0, NULL),
(15252, 22, 15, 'roles', 0, NULL),
(15253, 23, 15, 'roles', 0, NULL),
(15254, 24, 15, 'roles', 0, NULL),
(15255, 25, 15, 'roles', 0, NULL),
(15256, 26, 15, 'roles', 0, NULL),
(15257, 27, 15, 'roles', 0, NULL),
(15258, 28, 15, 'roles', 0, NULL),
(15259, 29, 15, 'roles', 0, NULL),
(15260, 30, 15, 'roles', 0, NULL),
(15261, 31, 15, 'roles', 0, NULL),
(15262, 32, 15, 'roles', 0, NULL),
(15263, 33, 15, 'roles', 0, NULL),
(15264, 34, 15, 'roles', 0, NULL),
(15265, 35, 15, 'roles', 0, NULL),
(15266, 36, 15, 'roles', 0, NULL),
(15267, 37, 15, 'roles', 0, NULL),
(15268, 38, 15, 'roles', 0, NULL),
(15269, 39, 15, 'roles', 0, NULL),
(15270, 40, 15, 'roles', 0, NULL),
(15271, 41, 15, 'roles', 0, NULL),
(15272, 42, 15, 'roles', 0, NULL),
(15273, 43, 15, 'roles', 0, NULL),
(15274, 44, 15, 'roles', 0, NULL),
(15275, 45, 15, 'roles', 0, NULL),
(15276, 46, 15, 'roles', 0, NULL),
(15277, 60, 15, 'roles', 0, NULL),
(15278, 61, 15, 'roles', 0, NULL),
(15279, 62, 15, 'roles', 0, NULL),
(15280, 63, 15, 'roles', 0, NULL),
(15281, 64, 15, 'roles', 0, NULL),
(15282, 65, 15, 'roles', 0, NULL),
(15283, 66, 15, 'roles', 0, NULL),
(15284, 67, 15, 'roles', 0, NULL),
(15285, 68, 15, 'roles', 0, NULL),
(15286, 69, 15, 'roles', 0, NULL),
(15287, 71, 15, 'roles', 0, NULL),
(15288, 82, 15, 'roles', 0, NULL),
(15289, 83, 15, 'roles', 0, NULL),
(15290, 84, 15, 'roles', 0, NULL),
(15291, 85, 15, 'roles', 0, NULL),
(15292, 86, 15, 'roles', 0, NULL),
(15293, 87, 15, 'roles', 0, NULL),
(15294, 88, 15, 'roles', 0, NULL),
(15295, 89, 15, 'roles', 0, NULL),
(15296, 90, 15, 'roles', 0, NULL),
(15297, 91, 15, 'roles', 0, NULL),
(15298, 110, 15, 'roles', 0, NULL),
(15299, 111, 15, 'roles', 0, NULL),
(15300, 112, 15, 'roles', 0, NULL),
(15301, 113, 15, 'roles', 0, NULL),
(15302, 114, 15, 'roles', 0, NULL),
(15303, 115, 15, 'roles', 0, NULL),
(15304, 116, 15, 'roles', 0, NULL),
(15305, 117, 15, 'roles', 0, NULL),
(15306, 118, 15, 'roles', 0, NULL),
(15307, 120, 15, 'roles', 0, NULL),
(15308, 123, 15, 'roles', 0, NULL),
(15309, 134, 15, 'roles', 0, NULL),
(15310, 135, 15, 'roles', 0, NULL),
(15311, 136, 15, 'roles', 0, NULL),
(15312, 137, 15, 'roles', 0, NULL),
(15313, 138, 15, 'roles', 0, NULL),
(15314, 139, 15, 'roles', 0, NULL),
(15315, 140, 15, 'roles', 0, NULL),
(15316, 141, 15, 'roles', 0, NULL),
(15317, 142, 15, 'roles', 0, NULL),
(15318, 143, 15, 'roles', 0, NULL),
(15319, 144, 15, 'roles', 0, NULL),
(15320, 145, 15, 'roles', 0, NULL),
(15321, 146, 15, 'roles', 0, NULL),
(15322, 147, 15, 'roles', 0, NULL),
(15323, 148, 15, 'roles', 0, NULL),
(15324, 153, 15, 'roles', 0, NULL),
(15325, 154, 15, 'roles', 0, NULL),
(15326, 156, 15, 'roles', 0, NULL),
(15327, 157, 15, 'roles', 0, NULL),
(15328, 159, 15, 'roles', 0, NULL),
(15329, 160, 15, 'roles', 0, NULL),
(15330, 161, 15, 'roles', 0, NULL),
(15331, 163, 15, 'roles', 0, NULL),
(15332, 164, 15, 'roles', 0, NULL),
(15333, 166, 15, 'roles', 0, NULL),
(15334, 167, 15, 'roles', 0, NULL),
(15335, 169, 15, 'roles', 0, NULL),
(15336, 170, 15, 'roles', 0, NULL),
(15337, 171, 15, 'roles', 0, NULL),
(15338, 172, 15, 'roles', 0, NULL),
(15339, 173, 15, 'roles', 0, NULL),
(15340, 174, 15, 'roles', 0, NULL),
(15341, 175, 15, 'roles', 0, NULL),
(15342, 184, 15, 'roles', 0, NULL),
(15343, 199, 15, 'roles', 0, NULL),
(16006, 21, 7, 'roles', 0, NULL),
(16007, 71, 7, 'roles', 0, NULL),
(16008, 92, 7, 'roles', 0, NULL),
(16009, 93, 7, 'roles', 0, NULL),
(16010, 94, 7, 'roles', 0, NULL),
(16011, 95, 7, 'roles', 0, NULL),
(16012, 96, 7, 'roles', 0, NULL),
(16013, 105, 7, 'roles', 0, NULL),
(16014, 149, 7, 'roles', 0, NULL),
(16015, 150, 7, 'roles', 0, NULL),
(16016, 191, 7, 'roles', 0, NULL),
(16017, 192, 7, 'roles', 0, NULL),
(16018, 200, 7, 'roles', 0, NULL),
(16019, 201, 7, 'roles', 0, NULL),
(16020, 202, 7, 'roles', 0, NULL),
(16021, 203, 7, 'roles', 0, NULL),
(16022, 204, 7, 'roles', 0, NULL),
(16207, 1, 1, 'roles', 0, NULL),
(16208, 2, 1, 'roles', 0, NULL),
(16209, 3, 1, 'roles', 0, NULL),
(16210, 4, 1, 'roles', 0, NULL),
(16211, 5, 1, 'roles', 0, NULL),
(16212, 6, 1, 'roles', 0, NULL),
(16213, 7, 1, 'roles', 0, NULL),
(16214, 8, 1, 'roles', 0, NULL),
(16215, 9, 1, 'roles', 0, NULL),
(16216, 10, 1, 'roles', 0, NULL),
(16217, 11, 1, 'roles', 0, NULL),
(16218, 12, 1, 'roles', 0, NULL),
(16219, 13, 1, 'roles', 0, NULL),
(16220, 14, 1, 'roles', 0, NULL),
(16221, 15, 1, 'roles', 0, NULL),
(16222, 16, 1, 'roles', 0, NULL),
(16223, 17, 1, 'roles', 0, NULL),
(16224, 18, 1, 'roles', 0, NULL),
(16225, 19, 1, 'roles', 0, NULL),
(16226, 20, 1, 'roles', 0, NULL),
(16227, 21, 1, 'roles', 0, NULL),
(16228, 22, 1, 'roles', 0, NULL),
(16229, 23, 1, 'roles', 0, NULL),
(16230, 24, 1, 'roles', 0, NULL),
(16231, 25, 1, 'roles', 0, NULL),
(16232, 26, 1, 'roles', 0, NULL),
(16233, 27, 1, 'roles', 0, NULL),
(16234, 28, 1, 'roles', 0, NULL),
(16235, 29, 1, 'roles', 0, NULL),
(16236, 30, 1, 'roles', 0, NULL),
(16237, 31, 1, 'roles', 0, NULL),
(16238, 32, 1, 'roles', 0, NULL),
(16239, 33, 1, 'roles', 0, NULL),
(16240, 34, 1, 'roles', 0, NULL),
(16241, 35, 1, 'roles', 0, NULL),
(16242, 36, 1, 'roles', 0, NULL),
(16243, 37, 1, 'roles', 0, NULL),
(16244, 38, 1, 'roles', 0, NULL),
(16245, 39, 1, 'roles', 0, NULL),
(16246, 40, 1, 'roles', 0, NULL),
(16247, 41, 1, 'roles', 0, NULL),
(16248, 42, 1, 'roles', 0, NULL),
(16249, 43, 1, 'roles', 0, NULL),
(16250, 44, 1, 'roles', 0, NULL),
(16251, 45, 1, 'roles', 0, NULL),
(16252, 46, 1, 'roles', 0, NULL),
(16253, 47, 1, 'roles', 0, NULL),
(16254, 48, 1, 'roles', 0, NULL),
(16255, 49, 1, 'roles', 0, NULL),
(16256, 50, 1, 'roles', 0, NULL),
(16257, 51, 1, 'roles', 0, NULL),
(16258, 52, 1, 'roles', 0, NULL),
(16259, 53, 1, 'roles', 0, NULL),
(16260, 54, 1, 'roles', 0, NULL),
(16261, 55, 1, 'roles', 0, NULL),
(16262, 56, 1, 'roles', 0, NULL),
(16263, 57, 1, 'roles', 0, NULL),
(16264, 58, 1, 'roles', 0, NULL),
(16265, 59, 1, 'roles', 0, NULL),
(16266, 60, 1, 'roles', 0, NULL),
(16267, 61, 1, 'roles', 0, NULL),
(16268, 62, 1, 'roles', 0, NULL),
(16269, 63, 1, 'roles', 0, NULL),
(16270, 64, 1, 'roles', 0, NULL),
(16271, 65, 1, 'roles', 0, NULL),
(16272, 66, 1, 'roles', 0, NULL),
(16273, 67, 1, 'roles', 0, NULL),
(16274, 68, 1, 'roles', 0, NULL),
(16275, 69, 1, 'roles', 0, NULL),
(16276, 70, 1, 'roles', 0, NULL),
(16277, 71, 1, 'roles', 0, NULL),
(16278, 72, 1, 'roles', 0, NULL),
(16279, 73, 1, 'roles', 0, NULL),
(16280, 74, 1, 'roles', 0, NULL),
(16281, 75, 1, 'roles', 0, NULL),
(16282, 76, 1, 'roles', 0, NULL),
(16283, 77, 1, 'roles', 0, NULL),
(16284, 78, 1, 'roles', 0, NULL),
(16285, 79, 1, 'roles', 0, NULL),
(16286, 80, 1, 'roles', 0, NULL),
(16287, 81, 1, 'roles', 0, NULL),
(16288, 82, 1, 'roles', 0, NULL),
(16289, 83, 1, 'roles', 0, NULL),
(16290, 84, 1, 'roles', 0, NULL),
(16291, 85, 1, 'roles', 0, NULL),
(16292, 86, 1, 'roles', 0, NULL),
(16293, 87, 1, 'roles', 0, NULL),
(16294, 88, 1, 'roles', 0, NULL),
(16295, 89, 1, 'roles', 0, NULL),
(16296, 90, 1, 'roles', 0, NULL),
(16297, 91, 1, 'roles', 0, NULL),
(16298, 92, 1, 'roles', 0, NULL),
(16299, 93, 1, 'roles', 0, NULL),
(16300, 94, 1, 'roles', 0, NULL),
(16301, 95, 1, 'roles', 0, NULL),
(16302, 96, 1, 'roles', 0, NULL),
(16303, 97, 1, 'roles', 0, NULL),
(16304, 98, 1, 'roles', 0, NULL),
(16305, 99, 1, 'roles', 0, NULL),
(16306, 100, 1, 'roles', 0, NULL),
(16307, 101, 1, 'roles', 0, NULL),
(16308, 102, 1, 'roles', 0, NULL),
(16309, 103, 1, 'roles', 0, NULL),
(16310, 104, 1, 'roles', 0, NULL),
(16311, 105, 1, 'roles', 0, NULL),
(16312, 107, 1, 'roles', 0, NULL),
(16313, 108, 1, 'roles', 0, NULL),
(16314, 109, 1, 'roles', 0, NULL),
(16315, 110, 1, 'roles', 0, NULL),
(16316, 111, 1, 'roles', 0, NULL),
(16317, 112, 1, 'roles', 0, NULL),
(16318, 113, 1, 'roles', 0, NULL),
(16319, 114, 1, 'roles', 0, NULL),
(16320, 115, 1, 'roles', 0, NULL),
(16321, 116, 1, 'roles', 0, NULL),
(16322, 117, 1, 'roles', 0, NULL),
(16323, 118, 1, 'roles', 0, NULL),
(16324, 119, 1, 'roles', 0, NULL),
(16325, 120, 1, 'roles', 0, NULL),
(16326, 121, 1, 'roles', 0, NULL),
(16327, 122, 1, 'roles', 0, NULL),
(16328, 123, 1, 'roles', 0, NULL),
(16329, 124, 1, 'roles', 0, NULL),
(16330, 125, 1, 'roles', 0, NULL),
(16331, 126, 1, 'roles', 0, NULL),
(16332, 127, 1, 'roles', 0, NULL),
(16333, 128, 1, 'roles', 0, NULL),
(16334, 129, 1, 'roles', 0, NULL),
(16335, 130, 1, 'roles', 0, NULL),
(16336, 131, 1, 'roles', 0, NULL),
(16337, 132, 1, 'roles', 0, NULL),
(16338, 133, 1, 'roles', 0, NULL),
(16339, 134, 1, 'roles', 0, NULL),
(16340, 135, 1, 'roles', 0, NULL),
(16341, 136, 1, 'roles', 0, NULL),
(16342, 137, 1, 'roles', 0, NULL),
(16343, 138, 1, 'roles', 0, NULL),
(16344, 139, 1, 'roles', 0, NULL),
(16345, 140, 1, 'roles', 0, NULL),
(16346, 141, 1, 'roles', 0, NULL),
(16347, 142, 1, 'roles', 0, NULL),
(16348, 143, 1, 'roles', 0, NULL),
(16349, 144, 1, 'roles', 0, NULL),
(16350, 145, 1, 'roles', 0, NULL),
(16351, 146, 1, 'roles', 0, NULL),
(16352, 147, 1, 'roles', 0, NULL),
(16353, 148, 1, 'roles', 0, NULL),
(16354, 149, 1, 'roles', 0, NULL),
(16355, 151, 1, 'roles', 0, NULL),
(16356, 152, 1, 'roles', 0, NULL),
(16357, 153, 1, 'roles', 0, NULL),
(16358, 154, 1, 'roles', 0, NULL),
(16359, 155, 1, 'roles', 0, NULL),
(16360, 156, 1, 'roles', 0, NULL),
(16361, 157, 1, 'roles', 0, NULL),
(16362, 158, 1, 'roles', 0, NULL),
(16363, 159, 1, 'roles', 0, NULL),
(16364, 160, 1, 'roles', 0, NULL),
(16365, 161, 1, 'roles', 0, NULL),
(16366, 162, 1, 'roles', 0, NULL),
(16367, 163, 1, 'roles', 0, NULL),
(16368, 164, 1, 'roles', 0, NULL),
(16369, 165, 1, 'roles', 0, NULL),
(16370, 166, 1, 'roles', 0, NULL),
(16371, 167, 1, 'roles', 0, NULL),
(16372, 168, 1, 'roles', 0, NULL),
(16373, 169, 1, 'roles', 0, NULL),
(16374, 170, 1, 'roles', 0, NULL),
(16375, 171, 1, 'roles', 0, NULL),
(16376, 172, 1, 'roles', 0, NULL),
(16377, 173, 1, 'roles', 0, NULL),
(16378, 174, 1, 'roles', 0, NULL),
(16379, 175, 1, 'roles', 0, NULL),
(16380, 176, 1, 'roles', 0, NULL),
(16381, 184, 1, 'roles', 0, NULL),
(16382, 191, 1, 'roles', 0, NULL),
(16383, 192, 1, 'roles', 0, NULL),
(16384, 193, 1, 'roles', 0, NULL),
(16385, 199, 1, 'roles', 0, NULL),
(16386, 200, 1, 'roles', 0, NULL),
(16387, 201, 1, 'roles', 0, NULL),
(16388, 202, 1, 'roles', 0, NULL),
(16389, 203, 1, 'roles', 0, NULL),
(16390, 204, 1, 'roles', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint UNSIGNED NOT NULL,
  `position_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', NULL, '2020-12-30 15:35:38', '2021-03-01 10:28:49'),
(2, 'Registrar', NULL, '2021-01-07 18:12:34', '2021-01-07 18:12:34'),
(3, 'Timetable', NULL, '2021-01-07 18:12:41', '2021-01-07 18:12:41'),
(4, 'Accommodation', NULL, '2021-01-07 18:12:53', '2021-01-07 18:12:53'),
(5, 'Examofficer', NULL, '2021-01-07 18:13:01', '2021-01-07 18:13:01'),
(10, 'Student', NULL, '2021-01-07 18:13:58', '2021-01-07 18:13:58'),
(12, 'SystemAdmin', NULL, '2021-03-01 10:27:58', '2021-03-01 10:27:58'),
(16, 'Dean of Students', NULL, '2021-03-11 09:57:37', '2021-03-11 09:57:37'),
(17, 'TUTOR', NULL, '2021-03-19 05:31:06', '2021-03-19 05:31:06'),
(18, 'Accountant', NULL, '2021-03-19 18:11:03', '2025-04-21 06:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint UNSIGNED NOT NULL,
  `faculty_id` bigint UNSIGNED DEFAULT NULL,
  `year_id` bigint UNSIGNED DEFAULT NULL,
  `program_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_acronym` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_category` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `program_duration` smallint NOT NULL,
  `program_weight` smallint DEFAULT NULL,
  `is_approved` tinyint NOT NULL COMMENT '0:No,1:Yes',
  `tuition_fee` double(15,2) DEFAULT NULL,
  `tag` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `faculty_id`, `year_id`, `program_name`, `program_code`, `program_acronym`, `program_type`, `program_category`, `program_duration`, `program_weight`, `is_approved`, `tuition_fee`, `tag`, `created_at`, `updated_at`) VALUES
(8, 1, 14, 'Basic Technician Certificate in Clinical Medicine', 'CMT4', 'BTCCM', 'Certificate', 'Undergraduate', 1, 500, 1, 1400000.00, NULL, '2021-08-06 05:24:52', '2025-04-10 08:13:02'),
(9, NULL, 12, 'Technician Certificate in Clinical Medicine', 'CMT5', 'TCCM', 'Certificate', 'Undergraduate', 1, NULL, 1, NULL, NULL, '2025-04-10 08:15:18', '2025-04-10 08:15:18'),
(10, NULL, 12, 'Ordinary Diploma in Clinical Medicine', 'CMT6', 'ODCM', 'Diploma', 'Undergraduate', 1, NULL, 1, NULL, NULL, '2025-04-10 08:16:13', '2025-04-10 08:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint UNSIGNED NOT NULL,
  `staff_id` bigint UNSIGNED NOT NULL,
  `faculty_id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `semester` bigint UNSIGNED NOT NULL,
  `yos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'All Students',
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publish_exams`
--

CREATE TABLE `publish_exams` (
  `id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `semester_id` bigint UNSIGNED NOT NULL,
  `campus_id` bigint UNSIGNED DEFAULT NULL,
  `faculty_id` bigint UNSIGNED DEFAULT NULL,
  `intake_category_id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED DEFAULT NULL,
  `program_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL,
  `dead_line` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publish_exams`
--

INSERT INTO `publish_exams` (`id`, `year_id`, `semester_id`, `campus_id`, `faculty_id`, `intake_category_id`, `program_id`, `program_code`, `status`, `dead_line`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 1, NULL, 1, 8, 'CMT4', 1, NULL, '2025-04-13 21:58:18', '2025-04-13 21:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int UNSIGNED DEFAULT NULL,
  `scope` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `level`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'Super admin', NULL, NULL, '2021-01-05 12:09:41', '2021-01-05 12:09:41'),
(2, 'Student', 'Student', NULL, NULL, '2021-01-05 12:10:23', '2021-01-05 12:10:23'),
(4, 'ExamOfficer', 'Exam officer', NULL, NULL, '2021-01-05 13:22:40', '2021-01-05 13:22:40'),
(5, 'AdmissionOfficer', 'Registrar', NULL, NULL, '2021-01-05 13:23:05', '2021-03-09 12:10:24'),
(6, 'Timetable', 'Timetable', NULL, NULL, '2021-01-05 13:23:25', '2021-01-05 13:23:25'),
(7, 'Accountant', 'Billing', NULL, NULL, '2021-01-05 13:23:48', '2025-04-21 05:28:23'),
(8, 'Accommodation', 'Accommodation', NULL, NULL, '2021-01-05 13:24:08', '2021-01-05 13:24:08'),
(9, 'OAS', 'O a s', NULL, NULL, '2021-01-05 13:24:23', '2021-01-05 13:24:23'),
(11, 'Lecturer', 'Lecturer', NULL, NULL, '2021-02-14 13:44:50', '2021-02-14 13:44:50'),
(12, 'SystemAdmin', 'Systemadmin', NULL, NULL, '2021-03-01 10:20:37', '2021-03-01 10:23:59'),
(15, 'academic', 'Academic', NULL, NULL, '2021-03-09 09:16:04', '2021-03-09 09:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `roomapplications`
--

CREATE TABLE `roomapplications` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` bigint UNSIGNED DEFAULT NULL,
  `criteria_id` bigint UNSIGNED DEFAULT NULL,
  `reason` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `received` timestamp NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `processed` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `hostel_id` bigint UNSIGNED DEFAULT NULL,
  `block_id` bigint UNSIGNED DEFAULT NULL,
  `room_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint UNSIGNED NOT NULL,
  `semester` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'FIRST TERM', 1, '2024-04-10 06:11:03', '2025-07-07 11:32:08'),
(2, 2, 'SECOND TERM', 0, '2024-04-10 06:11:03', '2025-07-07 11:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `semester_results`
--

CREATE TABLE `semester_results` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `semester_id` bigint UNSIGNED NOT NULL,
  `total_credits` decimal(8,0) NOT NULL,
  `total_points` decimal(8,0) NOT NULL,
  `gpa` decimal(8,1) NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year_of_study` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester_results`
--

INSERT INTO `semester_results` (`id`, `reg_no`, `year_id`, `semester_id`, `total_credits`, `total_points`, `gpa`, `remarks`, `classification`, `created_at`, `updated_at`, `year_of_study`) VALUES
(1, 'NS0772/0099/2020', 14, 1, '63', '246', '3.9', 'Pass', 'Pass', '2025-04-13 19:15:36', '2025-04-19 22:20:08', 1),
(2, 'NS5289/0024/2023', 14, 1, '63', '246', '3.9', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:08', 1),
(3, 'NP1153/0013/2023', 14, 1, '63', '196', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:08', 1),
(4, 'NS5357/0001/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:08', 1),
(5, 'NS0672/0001/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:08', 1),
(6, 'NS2367/0005/2023', 14, 1, '63', '199', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:08', 1),
(7, 'NS0294/0005/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:09', 1),
(8, 'NS0916/0003/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:09', 1),
(9, 'NS1375/0002/2023', 14, 1, '63', '199', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:20:09', 1),
(10, 'NS0547/0015/2023', 14, 1, '63', '197', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:09', 1),
(11, 'NS0345/0172/2023', 14, 1, '63', '208', '3.3', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:09', 1),
(12, 'NS1394/0007/2023', 14, 1, '63', '197', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:09', 1),
(13, 'NS4740/0008/2023', 14, 1, '63', '225', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:09', 1),
(14, 'NEQ2022001913/2020', 14, 1, '63', '193', '3.0', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(15, 'NS3371/0102/2023', 14, 1, '63', '218', '3.4', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(16, 'NS3897/0088/2023', 14, 1, '63', '219', '3.4', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(17, 'NS3757/0023/2023', 14, 1, '63', '205', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(18, 'NS3981/0011/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(19, 'NS3453/0010/2023', 14, 1, '63', '178', '2.8', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(20, 'NS5156/0084/2023', 14, 1, '63', '223', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:10', 1),
(21, 'NS2510/0010/2023', 14, 1, '63', '252', '4.0', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(22, 'NS0970/0015/2023', 14, 1, '63', '230', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(23, 'NS3834/0019/2018', 14, 1, '63', '246', '3.9', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(24, 'NS0850/0022/2022', 14, 1, '63', '203', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(25, 'NS1027/0179/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(26, 'NS4569/0030/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:20:11', 1),
(27, 'NS4740/0041/2023', 14, 1, '63', '209', '3.3', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:11', 1),
(28, 'NS1618/0012/2023', 14, 1, '63', '207', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:11', 1),
(29, 'NS1060/0017/2023', 14, 1, '63', '219', '3.4', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(30, 'NS5033/0020/2022', 14, 1, '63', '230', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(31, 'NS0722/0031/2023', 14, 1, '63', '192', '3.0', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(32, 'NS4740/0048/2023', 14, 1, '63', '196', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(33, 'NS4498/0051/2020', 14, 1, '63', '220', '3.4', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(34, 'NS0241/0039/2020', 14, 1, '63', '229', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(35, 'NS0414/0019/2023', 14, 1, '63', '246', '3.9', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:12', 1),
(36, 'NS0197/0009/2020', 14, 1, '63', '221', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:13', 1),
(37, 'NS3893/0156/2023', 14, 1, '63', '201', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:13', 1),
(38, 'NS0672/0057/2023', 14, 1, '63', '223', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:13', 1),
(39, 'NS4816/0040/2021', 14, 1, '63', '229', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:20:13', 1),
(40, 'NS1633/0164/2023', 14, 1, '63', '201', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:13', 1),
(41, 'NS4208/0008/2022', 14, 1, '63', '208', '3.3', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:13', 1),
(42, 'NS3897/0105/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:13', 1),
(43, 'NS0526/0115/2021', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(44, 'NS0274/0046/2023', 14, 1, '63', '230', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(45, 'NS6048/0056/2023', 14, 1, '63', '219', '3.4', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(46, 'NS4006/0030/2021', 14, 1, '63', '229', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(47, 'NS2505/0044/2017', 14, 1, '63', '214', '3.3', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(48, 'NS4238/0026/2021', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(49, 'NS3351/0179/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:20:14', 1),
(50, 'NS4117/0256/2022', 14, 1, '63', '179', '2.8', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:14', 1),
(51, 'NS3321/0044/2021', 14, 1, '63', '189', '3.0', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(52, 'NS5551/0011/2021', 14, 1, '63', '229', '3.6', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(53, 'NS0345/0088/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(54, 'NS4710/0030/2023', 14, 1, '63', '196', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(55, 'NS5822/0117/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(56, 'NS1097/0129/2021', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(57, 'NS1633/0136/2021', 14, 1, '63', '240', '3.8', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:15', 1),
(58, 'NS0672/0094/2021', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:20:16', 1),
(59, 'NS2521/0024/2021', 14, 1, '63', '246', '3.9', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(60, 'NS1581/0075/2023', 14, 1, '63', '223', '3.5', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(61, 'NS2315/0115/2021', 14, 1, '63', '215', '3.4', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(62, 'NS2171/0052/2023', 14, 1, '63', '236', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(63, 'NS2424/0074/2023', 14, 1, '63', '163', '2.5', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(64, 'NS0632/0053/2023', 14, 1, '63', '180', '2.8', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:16', 1),
(65, 'NS0672/0135/2023', 14, 1, '63', '186', '2.9', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:17', 1),
(66, 'NS5376/0082/2023', 14, 1, '63', '202', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:20:17', 1),
(67, 'NS3228/0285/2022', 14, 1, '63', '201', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:17', 1),
(68, 'NS0541/0100/2023', 14, 1, '63', '220', '3.4', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:17', 1),
(69, 'NS3534/0025/2023', 14, 1, '63', '239', '3.7', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:17', 1),
(70, 'NS5251/0066/2023', 14, 1, '63', '203', '3.2', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:17', 1),
(71, 'NS5298/0057/2023', 14, 1, '63', '189', '3.0', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:17', 1),
(72, 'NS4897/0091/2023', 14, 1, '63', '200', '3.1', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:20:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester_result_summaries`
--

CREATE TABLE `semester_result_summaries` (
  `id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `semester_id` bigint UNSIGNED NOT NULL,
  `total_male_pass` int UNSIGNED NOT NULL,
  `total_male_fail` int UNSIGNED NOT NULL,
  `total_female_pass` int UNSIGNED NOT NULL,
  `total_female_fail` int UNSIGNED NOT NULL,
  `total_pass` int UNSIGNED NOT NULL,
  `total_fail` int UNSIGNED NOT NULL,
  `grand_total` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester_result_summaries`
--

INSERT INTO `semester_result_summaries` (`id`, `program_id`, `year_id`, `semester_id`, `total_male_pass`, `total_male_fail`, `total_female_pass`, `total_female_fail`, `total_pass`, `total_fail`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 8, 14, 1, 35, 0, 37, 0, 72, 0, 72, '2025-04-13 19:15:36', '2025-04-19 22:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `app_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `login_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'login.png',
  `mode` tinyint NOT NULL DEFAULT '0',
  `row_per_page` int UNSIGNED NOT NULL DEFAULT '10',
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1.0.0',
  `date_format` int UNSIGNED NOT NULL DEFAULT '1',
  `default_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_reg` tinyint NOT NULL DEFAULT '0',
  `captcha` tinyint NOT NULL DEFAULT '0',
  `reg_ver` tinyint NOT NULL DEFAULT '0',
  `allow_reg` tinyint NOT NULL DEFAULT '0',
  `reg_notification` tinyint NOT NULL DEFAULT '0',
  `corn` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `logo`, `login_logo`, `mode`, `row_per_page`, `version`, `date_format`, `default_email`, `auto_reg`, `captcha`, `reg_ver`, `allow_reg`, `reg_notification`, `corn`, `created_at`, `updated_at`) VALUES
(1, 'SAMIS', 'logo.png', 'login.png', 0, 10, '1.0.0', 1, 'info@gmail.com', 0, 0, 0, 0, 0, '2011-04-14 10:09:38', '2020-12-30 15:35:32', '2020-12-30 15:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint UNSIGNED NOT NULL,
  `sponsor_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` bigint UNSIGNED NOT NULL,
  `campus_id` bigint UNSIGNED DEFAULT NULL,
  `salutation` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `building_id` bigint UNSIGNED DEFAULT NULL,
  `office_room_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` bigint UNSIGNED NOT NULL,
  `mobile_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `campus_id`, `salutation`, `department_id`, `building_id`, `office_room_number`, `position_id`, `mobile_number`, `office_phone_number`, `email_address`, `user_id`, `year_id`, `created_at`, `updated_at`) VALUES
(72, 1, 'Mr', 1, NULL, NULL, 1, NULL, NULL, 'jodam@gmail.com', 1, 14, NULL, '2025-04-21 11:12:49'),
(76, 1, 'Mr', NULL, NULL, 'FF44', 5, '0689966978', 'FF44', 'ariana@gmail.com', 75, 14, '2025-04-13 07:29:18', '2025-04-13 07:29:18'),
(77, 1, 'Ms', NULL, NULL, 'tyy', 18, NULL, 'tyy', 'ariana@gmail.com', 77, 14, '2025-04-21 05:32:27', '2025-04-21 06:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `campus_id` bigint UNSIGNED DEFAULT NULL,
  `faculty_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED DEFAULT NULL,
  `form4_index_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `form6_index_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int DEFAULT NULL,
  `program_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_year` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduation_year` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob_place` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_study` int NOT NULL,
  `email_address` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issued_date` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_date` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_descriptions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `reg_status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0:partial,1:full',
  `sponsorship` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admitted_by` int DEFAULT NULL,
  `is_disabled` tinyint DEFAULT NULL,
  `manner_of_entry_id` bigint UNSIGNED DEFAULT NULL,
  `intake_category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `class_year` int NOT NULL,
  `center_id` bigint UNSIGNED DEFAULT NULL,
  `rsv1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rsv2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rsv3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `reg_no`, `campus_id`, `faculty_id`, `user_id`, `year_id`, `form4_index_no`, `form6_index_no`, `admission_no`, `marital_status`, `program_id`, `program_code`, `admission_year`, `graduation_year`, `dob`, `dob_place`, `year_of_study`, `email_address`, `issued_date`, `admission_date`, `mobile_no`, `status`, `status_descriptions`, `reg_status`, `sponsorship`, `citizenship`, `admitted_by`, `is_disabled`, `manner_of_entry_id`, `intake_category_id`, `created_at`, `updated_at`, `deleted_at`, `class_year`, `center_id`, `rsv1`, `rsv2`, `rsv3`) VALUES
(1, 'NS0772/0099/2020', 1, NULL, 2, 15, 'S0772/0099/2020', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 6, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 6, '2025-04-11 18:23:11', '2025-07-07 10:56:32', NULL, 15, NULL, NULL, NULL, NULL),
(2, 'NS5289/0024/2023', 1, NULL, 3, 15, 'S5289/0024/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 6, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 6, '2025-04-11 18:23:11', '2025-07-07 10:56:32', NULL, 15, NULL, NULL, NULL, NULL),
(3, 'NP1153/0013/2023', 1, NULL, 4, 15, 'P1153/0013/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 6, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 6, '2025-04-11 18:23:11', '2025-07-07 10:56:32', NULL, 15, NULL, NULL, NULL, NULL),
(4, 'NS5357/0001/2023', 1, NULL, 5, 14, 'S5357/0001/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, NULL, NULL, NULL, NULL),
(5, 'NS0672/0001/2023', 1, NULL, 6, 14, 'S0672/0001/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, NULL, NULL, NULL, NULL),
(6, 'NS2367/0005/2023', 1, NULL, 7, 14, 'S2367/0005/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, NULL, NULL, NULL, NULL),
(7, 'NS0294/0005/2023', 1, NULL, 8, 14, 'S0294/0005/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, NULL, NULL, NULL, NULL),
(8, 'NS0916/0003/2023', 1, NULL, 9, 14, 'S0916/0003/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, NULL, NULL, NULL, NULL),
(9, 'NS1375/0002/2023', 1, NULL, 10, 14, 'S1375/0002/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, NULL, NULL, NULL, NULL),
(10, 'NS0547/0015/2023', 1, NULL, 11, 14, 'S0547/0015/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, NULL, NULL, NULL, NULL),
(11, 'NS0345/0172/2023', 1, NULL, 12, 14, 'S0345/0172/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, NULL, NULL, NULL, NULL),
(12, 'NS1394/0007/2023', 1, NULL, 13, 14, 'S1394/0007/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, NULL, NULL, NULL, NULL),
(13, 'NS4740/0008/2023', 1, NULL, 14, 14, 'S4740/0008/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, NULL, NULL, NULL, NULL),
(14, 'NEQ2022001913/2020', 1, NULL, 15, 14, 'EQ2022001913/2020', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, NULL, NULL, NULL, NULL),
(15, 'NS3371/0102/2023', 1, NULL, 16, 14, 'S3371/0102/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(16, 'NS3897/0088/2023', 1, NULL, 17, 14, 'S3897/0088/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(17, 'NS3757/0023/2023', 1, NULL, 18, 14, 'S3757/0023/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(18, 'NS3981/0011/2023', 1, NULL, 19, 14, 'S3981/0011/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(19, 'NS3453/0010/2023', 1, NULL, 20, 14, 'S3453/0010/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(20, 'NS5156/0084/2023', 1, NULL, 21, 14, 'S5156/0084/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(21, 'NS2510/0010/2023', 1, NULL, 22, 14, 'S2510/0010/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(22, 'NS0970/0015/2023', 1, NULL, 23, 14, 'S0970/0015/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(23, 'NS3834/0019/2018', 1, NULL, 24, 14, 'S3834/0019/2018', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(24, 'NS0850/0022/2022', 1, NULL, 25, 14, 'S0850/0022/2022', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(25, 'NS0418/0004/2022', 1, NULL, 26, 14, 'S0418/0004/2022', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(26, 'NS1027/0179/2023', 1, NULL, 27, 14, 'S1027/0179/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(27, 'NS4569/0030/2023', 1, NULL, 28, 14, 'S4569/0030/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(28, 'NS4740/0041/2023', 1, NULL, 29, 14, 'S4740/0041/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(29, 'NS1618/0012/2023', 1, NULL, 30, 14, 'S1618/0012/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(30, 'NS1060/0017/2023', 1, NULL, 31, 14, 'S1060/0017/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(31, 'NS5033/0020/2022', 1, NULL, 32, 14, 'S5033/0020/2022', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, NULL, NULL, NULL, NULL),
(32, 'NS0722/0031/2023', 1, NULL, 33, 14, 'S0722/0031/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(33, 'NS4740/0048/2023', 1, NULL, 34, 14, 'S4740/0048/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(34, 'NS4498/0051/2020', 1, NULL, 35, 14, 'S4498/0051/2020', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(35, 'NS0241/0039/2020', 1, NULL, 36, 14, 'S0241/0039/2020', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(36, 'NS0414/0019/2023', 1, NULL, 37, 14, 'S0414/0019/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(37, 'NS0197/0009/2020', 1, NULL, 38, 14, 'S0197/0009/2020', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(38, 'NS3893/0156/2023', 1, NULL, 39, 14, 'S3893/0156/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(39, 'NS0672/0057/2023', 1, NULL, 40, 14, 'S0672/0057/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(40, 'NS4816/0040/2021', 1, NULL, 41, 14, 'S4816/0040/2021', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(41, 'NS1633/0164/2023', 1, NULL, 42, 14, 'S1633/0164/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(42, 'NS4208/0008/2022', 1, NULL, 43, 14, 'S4208/0008/2022', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(43, 'NS3897/0105/2023', 1, NULL, 44, 14, 'S3897/0105/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(44, 'NS0526/0115/2021', 1, NULL, 45, 14, 'S0526/0115/2021', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(45, 'NS0274/0046/2023', 1, NULL, 46, 14, 'S0274/0046/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(46, 'NS6048/0056/2023', 1, NULL, 47, 14, 'S6048/0056/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(47, 'NS4006/0030/2021', 1, NULL, 48, 14, 'S4006/0030/2021', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, NULL, NULL, NULL, NULL),
(48, 'NS2505/0044/2017', 1, NULL, 49, 14, 'S2505/0044/2017', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(49, 'NS4238/0026/2021', 1, NULL, 50, 14, 'S4238/0026/2021', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(50, 'NS3351/0179/2023', 1, NULL, 51, 14, 'S3351/0179/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(51, 'NS4117/0256/2022', 1, NULL, 52, 14, 'S4117/0256/2022', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(52, 'NS3321/0044/2021', 1, NULL, 53, 14, 'S3321/0044/2021', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(53, 'NS5551/0011/2021', 1, NULL, 54, 14, 'S5551/0011/2021', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(54, 'NS0345/0088/2023', 1, NULL, 55, 14, 'S0345/0088/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(55, 'NS4710/0030/2023', 1, NULL, 56, 14, 'S4710/0030/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(56, 'NS5822/0117/2023', 1, NULL, 57, 14, 'S5822/0117/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(57, 'NS1097/0129/2021', 1, NULL, 58, 14, 'S1097/0129/2021', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(58, 'NS1633/0136/2021', 1, NULL, 59, 14, 'S1633/0136/2021', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(59, 'NS0672/0094/2021', 1, NULL, 60, 14, 'S0672/0094/2021', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(60, 'NS2521/0024/2021', 1, NULL, 61, 14, 'S2521/0024/2021', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(61, 'NS1581/0075/2023', 1, NULL, 62, 14, 'S1581/0075/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(62, 'NS2315/0115/2021', 1, NULL, 63, 14, 'S2315/0115/2021', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(63, 'NS2171/0052/2023', 1, NULL, 64, 14, 'S2171/0052/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(64, 'NS2424/0074/2023', 1, NULL, 65, 14, 'S2424/0074/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, NULL, NULL, NULL, NULL),
(65, 'NS0632/0053/2023', 1, NULL, 66, 14, 'S0632/0053/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, NULL, NULL, NULL, NULL),
(66, 'NS0672/0135/2023', 1, NULL, 67, 14, 'S0672/0135/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, NULL, NULL, NULL, NULL),
(67, 'NS5376/0082/2023', 1, NULL, 68, 14, 'S5376/0082/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, NULL, NULL, NULL, NULL),
(68, 'NS3228/0285/2022', 1, NULL, 69, 14, 'S3228/0285/2022', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, NULL, NULL, NULL, NULL),
(69, 'NS0541/0100/2023', 1, NULL, 70, 14, 'S0541/0100/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, NULL, NULL, NULL, NULL),
(70, 'NS3534/0025/2023', 1, NULL, 71, 14, 'S3534/0025/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, NULL, NULL, NULL, NULL),
(71, 'NS5251/0066/2023', 1, NULL, 72, 14, 'S5251/0066/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, NULL, NULL, NULL, NULL),
(72, 'NS5298/0057/2023', 1, NULL, 73, 14, 'S5298/0057/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, NULL, NULL, NULL, NULL),
(73, 'NS4897/0091/2023', 1, NULL, 74, 14, 'S4897/0091/2023', NULL, NULL, NULL, 8, 'CMT4', '2025', NULL, NULL, NULL, 1, NULL, NULL, '11-04-2025', NULL, 'Admitted', NULL, '0', NULL, 'Tanzanian', 1, NULL, NULL, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_attachments`
--

CREATE TABLE `student_attachments` (
  `id` bigint UNSIGNED NOT NULL,
  `attachment_id` bigint UNSIGNED NOT NULL,
  `attachment_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` bigint UNSIGNED NOT NULL,
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_banks`
--

CREATE TABLE `student_banks` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `intake_category_id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `program_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int UNSIGNED NOT NULL,
  `session` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `class_year` int NOT NULL,
  `year_of_study` int NOT NULL,
  `rsv1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rsv2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rsv3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `user_id`, `reg_no`, `year_id`, `intake_category_id`, `program_id`, `program_code`, `year`, `session`, `created_at`, `updated_at`, `deleted_at`, `class_year`, `year_of_study`, `rsv1`, `rsv2`, `rsv3`) VALUES
(1, 2, 'NS0772/0099/2020', 15, 6, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-07-07 10:56:32', NULL, 15, 6, NULL, NULL, NULL),
(2, 3, 'NS5289/0024/2023', 15, 6, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-07-07 10:56:32', NULL, 15, 6, NULL, NULL, NULL),
(3, 4, 'NP1153/0013/2023', 15, 6, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-07-07 10:56:32', NULL, 15, 6, NULL, NULL, NULL),
(4, 5, 'NS5357/0001/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, 1, NULL, NULL, NULL),
(5, 6, 'NS0672/0001/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, 1, NULL, NULL, NULL),
(6, 7, 'NS2367/0005/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, 1, NULL, NULL, NULL),
(7, 8, 'NS0294/0005/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, 1, NULL, NULL, NULL),
(8, 9, 'NS0916/0003/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, 1, NULL, NULL, NULL),
(9, 10, 'NS1375/0002/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, 1, NULL, NULL, NULL),
(10, 11, 'NS0547/0015/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, 1, NULL, NULL, NULL),
(11, 12, 'NS0345/0172/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, 1, NULL, NULL, NULL),
(12, 13, 'NS1394/0007/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, 1, NULL, NULL, NULL),
(13, 14, 'NS4740/0008/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, 1, NULL, NULL, NULL),
(14, 15, 'NEQ2022001913/2020', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL, 0, 1, NULL, NULL, NULL),
(15, 16, 'NS3371/0102/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(16, 17, 'NS3897/0088/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(17, 18, 'NS3757/0023/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(18, 19, 'NS3981/0011/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(19, 20, 'NS3453/0010/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(20, 21, 'NS5156/0084/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(21, 22, 'NS2510/0010/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(22, 23, 'NS0970/0015/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(23, 24, 'NS3834/0019/2018', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(24, 25, 'NS0850/0022/2022', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(25, 26, 'NS0418/0004/2022', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(26, 27, 'NS1027/0179/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(27, 28, 'NS4569/0030/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(28, 29, 'NS4740/0041/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(29, 30, 'NS1618/0012/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(30, 31, 'NS1060/0017/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(31, 32, 'NS5033/0020/2022', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL, 0, 1, NULL, NULL, NULL),
(32, 33, 'NS0722/0031/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(33, 34, 'NS4740/0048/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(34, 35, 'NS4498/0051/2020', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(35, 36, 'NS0241/0039/2020', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(36, 37, 'NS0414/0019/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(37, 38, 'NS0197/0009/2020', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(38, 39, 'NS3893/0156/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(39, 40, 'NS0672/0057/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(40, 41, 'NS4816/0040/2021', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(41, 42, 'NS1633/0164/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(42, 43, 'NS4208/0008/2022', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(43, 44, 'NS3897/0105/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(44, 45, 'NS0526/0115/2021', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(45, 46, 'NS0274/0046/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(46, 47, 'NS6048/0056/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(47, 48, 'NS4006/0030/2021', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL, 0, 1, NULL, NULL, NULL),
(48, 49, 'NS2505/0044/2017', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(49, 50, 'NS4238/0026/2021', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(50, 51, 'NS3351/0179/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(51, 52, 'NS4117/0256/2022', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(52, 53, 'NS3321/0044/2021', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(53, 54, 'NS5551/0011/2021', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(54, 55, 'NS0345/0088/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(55, 56, 'NS4710/0030/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(56, 57, 'NS5822/0117/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(57, 58, 'NS1097/0129/2021', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(58, 59, 'NS1633/0136/2021', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(59, 60, 'NS0672/0094/2021', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(60, 61, 'NS2521/0024/2021', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(61, 62, 'NS1581/0075/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(62, 63, 'NS2315/0115/2021', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(63, 64, 'NS2171/0052/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(64, 65, 'NS2424/0074/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL, 0, 1, NULL, NULL, NULL),
(65, 66, 'NS0632/0053/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, 1, NULL, NULL, NULL),
(66, 67, 'NS0672/0135/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, 1, NULL, NULL, NULL),
(67, 68, 'NS5376/0082/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, 1, NULL, NULL, NULL),
(68, 69, 'NS3228/0285/2022', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, 1, NULL, NULL, NULL),
(69, 70, 'NS0541/0100/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, 1, NULL, NULL, NULL),
(70, 71, 'NS3534/0025/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, 1, NULL, NULL, NULL),
(71, 72, 'NS5251/0066/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, 1, NULL, NULL, NULL),
(72, 73, 'NS5298/0057/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, 1, NULL, NULL, NULL),
(73, 74, 'NS4897/0091/2023', 14, 1, 8, NULL, 0, 1, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL, 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_contacts`
--

CREATE TABLE `student_contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_payments`
--

CREATE TABLE `student_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type_id` bigint UNSIGNED NOT NULL,
  `year_of_study` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_paid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_sponsors`
--

CREATE TABLE `student_sponsors` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_id` bigint UNSIGNED DEFAULT NULL,
  `sponsor_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_transactions`
--

CREATE TABLE `student_transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `staff_id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `billing_id` bigint UNSIGNED NOT NULL,
  `is_tuition_fee` tinyint NOT NULL COMMENT '0:direct cost,1:tuition fee',
  `semester` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1:semester one,2:semester 2',
  `amount_payed` double(15,2) NOT NULL,
  `payed_by` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_via` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `study_levels`
--

CREATE TABLE `study_levels` (
  `id` bigint UNSIGNED NOT NULL,
  `level_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study_levels`
--

INSERT INTO `study_levels` (`id`, `level_name`, `year_id`, `created_at`, `updated_at`) VALUES
(3, 'ORDINARY LEVEL', 14, '2025-04-09 23:25:46', '2025-07-07 11:46:29'),
(4, 'ADVANCED LEVEL', 14, '2025-04-09 23:25:46', '2025-07-07 11:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `payerName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `amountType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentReference` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payerMobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentDesc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payerID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionRef` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionChannel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year_id` bigint DEFAULT NULL,
  `account_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debt_status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `payerName`, `amount`, `amountType`, `currency`, `paymentReference`, `paymentType`, `payerMobile`, `paymentDesc`, `payerID`, `transactionRef`, `transactionChannel`, `receipt`, `transactionDate`, `created_at`, `updated_at`, `year_id`, `account_year`, `debt_status`) VALUES
(33, 'TUMBO ABDUL K', '1000.00', 'flexible', 'TZS', 'NS0772/0099/2020', '001', NULL, 'Tuition fee for (Basic Technician Certificate in Clinical Medicine)', 'NS0772/0099/2020', '53163448661', 'TIGO_C2B', 'K5PWRXQ', '2023-11-30', '2023-11-30 07:31:24', '2023-11-30 07:32:01', 17, '2022/2023', 1),
(34, 'TUMBO ABDUL K', '1000.00', 'flexible', 'TZS', 'NS0772/0099/2020', '001', NULL, 'Tuition fee for (Basic Technician Certificate in Clinical Medicine)', 'NS0772/0099/2020', '77421876663', 'TIGO_C2B', '0C5IXLA', '2023-12-02', '2023-12-02 10:25:06', '2023-12-02 10:26:01', 17, '2022/2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transcripts`
--

CREATE TABLE `transcripts` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `year_of_study` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester_id` bigint UNSIGNED NOT NULL,
  `total_credits` decimal(8,2) NOT NULL,
  `total_points` decimal(8,2) NOT NULL,
  `gpa` decimal(8,2) NOT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transcripts`
--

INSERT INTO `transcripts` (`id`, `reg_no`, `year_id`, `year_of_study`, `semester_id`, `total_credits`, `total_points`, `gpa`, `remarks`, `classification`, `created_at`, `updated_at`) VALUES
(1, 'NS0772/0099/2020', 0, '1', 0, '63.00', '206.00', '3.27', 'Pass', 'Pass', '2025-04-13 19:15:36', '2025-04-19 22:17:47'),
(2, 'NS5289/0024/2023', 0, '1', 0, '63.00', '206.00', '3.27', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:17:47'),
(3, 'NP1153/0013/2023', 0, '1', 0, '63.00', '156.00', '2.48', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:17:47'),
(4, 'NS5357/0001/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:17:47'),
(5, 'NS0672/0001/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:17:47'),
(6, 'NS2367/0005/2023', 0, '1', 0, '63.00', '169.00', '2.68', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:17:47'),
(7, 'NS0294/0005/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:17:47'),
(8, 'NS0916/0003/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:27', '2025-04-19 22:17:47'),
(9, 'NS1375/0002/2023', 0, '1', 0, '63.00', '169.00', '2.68', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:47'),
(10, 'NS0547/0015/2023', 0, '1', 0, '63.00', '167.00', '2.65', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:47'),
(11, 'NS0345/0172/2023', 0, '1', 0, '63.00', '178.00', '2.83', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:47'),
(12, 'NS1394/0007/2023', 0, '1', 0, '63.00', '167.00', '2.65', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:47'),
(13, 'NS4740/0008/2023', 0, '1', 0, '63.00', '185.00', '2.94', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:47'),
(14, 'NEQ2022001913/2020', 0, '1', 0, '63.00', '163.00', '2.59', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(15, 'NS3371/0102/2023', 0, '1', 0, '63.00', '178.00', '2.83', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(16, 'NS3897/0088/2023', 0, '1', 0, '63.00', '179.00', '2.84', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(17, 'NS3757/0023/2023', 0, '1', 0, '63.00', '175.00', '2.78', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(18, 'NS3981/0011/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(19, 'NS3453/0010/2023', 0, '1', 0, '63.00', '148.00', '2.35', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(20, 'NS5156/0084/2023', 0, '1', 0, '63.00', '183.00', '2.90', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(21, 'NS2510/0010/2023', 0, '1', 0, '63.00', '212.00', '3.37', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(22, 'NS0970/0015/2023', 0, '1', 0, '63.00', '190.00', '3.02', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(23, 'NS3834/0019/2018', 0, '1', 0, '63.00', '206.00', '3.27', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(24, 'NS0850/0022/2022', 0, '1', 0, '63.00', '173.00', '2.75', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(25, 'NS1027/0179/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(26, 'NS4569/0030/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:28', '2025-04-19 22:17:48'),
(27, 'NS4740/0041/2023', 0, '1', 0, '63.00', '179.00', '2.84', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:48'),
(28, 'NS1618/0012/2023', 0, '1', 0, '63.00', '177.00', '2.81', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:48'),
(29, 'NS1060/0017/2023', 0, '1', 0, '63.00', '189.00', '3.00', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:48'),
(30, 'NS5033/0020/2022', 0, '1', 0, '63.00', '190.00', '3.02', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:49'),
(31, 'NS0722/0031/2023', 0, '1', 0, '63.00', '162.00', '2.57', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:49'),
(32, 'NS4740/0048/2023', 0, '1', 0, '63.00', '156.00', '2.48', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:49'),
(33, 'NS4498/0051/2020', 0, '1', 0, '63.00', '190.00', '3.02', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:49'),
(34, 'NS0241/0039/2020', 0, '1', 0, '63.00', '189.00', '3.00', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:49'),
(35, 'NS0414/0019/2023', 0, '1', 0, '63.00', '206.00', '3.27', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:49'),
(36, 'NS0197/0009/2020', 0, '1', 0, '63.00', '191.00', '3.03', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:49'),
(37, 'NS3893/0156/2023', 0, '1', 0, '63.00', '171.00', '2.71', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:49'),
(38, 'NS0672/0057/2023', 0, '1', 0, '63.00', '183.00', '2.90', 'Pass', 'Pass', '2025-04-19 19:06:29', '2025-04-19 22:17:49'),
(39, 'NS4816/0040/2021', 0, '1', 0, '63.00', '189.00', '3.00', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:17:49'),
(40, 'NS1633/0164/2023', 0, '1', 0, '63.00', '171.00', '2.71', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:17:49'),
(41, 'NS4208/0008/2022', 0, '1', 0, '63.00', '178.00', '2.83', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:17:49'),
(42, 'NS3897/0105/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:17:49'),
(43, 'NS0526/0115/2021', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:17:50'),
(44, 'NS0274/0046/2023', 0, '1', 0, '63.00', '190.00', '3.02', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:17:50'),
(45, 'NS6048/0056/2023', 0, '1', 0, '63.00', '179.00', '2.84', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:17:50'),
(46, 'NS4006/0030/2021', 0, '1', 0, '63.00', '189.00', '3.00', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:17:50'),
(47, 'NS2505/0044/2017', 0, '1', 0, '63.00', '184.00', '2.92', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:17:50'),
(48, 'NS4238/0026/2021', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:30', '2025-04-19 22:17:50'),
(49, 'NS3351/0179/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:17:50'),
(50, 'NS4117/0256/2022', 0, '1', 0, '63.00', '149.00', '2.37', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:17:50'),
(51, 'NS3321/0044/2021', 0, '1', 0, '63.00', '149.00', '2.37', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:17:50'),
(52, 'NS5551/0011/2021', 0, '1', 0, '63.00', '189.00', '3.00', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:17:50'),
(53, 'NS0345/0088/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:17:51'),
(54, 'NS4710/0030/2023', 0, '1', 0, '63.00', '166.00', '2.63', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:17:51'),
(55, 'NS5822/0117/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:17:51'),
(56, 'NS1097/0129/2021', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:17:51'),
(57, 'NS1633/0136/2021', 0, '1', 0, '63.00', '200.00', '3.17', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:17:51'),
(58, 'NS0672/0094/2021', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:31', '2025-04-19 22:17:51'),
(59, 'NS2521/0024/2021', 0, '1', 0, '63.00', '206.00', '3.27', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:17:51'),
(60, 'NS1581/0075/2023', 0, '1', 0, '63.00', '183.00', '2.90', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:17:51'),
(61, 'NS2315/0115/2021', 0, '1', 0, '63.00', '185.00', '2.94', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:17:52'),
(62, 'NS2171/0052/2023', 0, '1', 0, '63.00', '196.00', '3.11', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:17:52'),
(63, 'NS2424/0074/2023', 0, '1', 0, '63.00', '143.00', '2.27', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:17:52'),
(64, 'NS0632/0053/2023', 0, '1', 0, '63.00', '150.00', '2.38', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:17:52'),
(65, 'NS0672/0135/2023', 0, '1', 0, '63.00', '156.00', '2.48', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:17:52'),
(66, 'NS5376/0082/2023', 0, '1', 0, '63.00', '162.00', '2.57', 'Pass', 'Pass', '2025-04-19 19:06:32', '2025-04-19 22:17:52'),
(67, 'NS3228/0285/2022', 0, '1', 0, '63.00', '171.00', '2.71', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:17:52'),
(68, 'NS0541/0100/2023', 0, '1', 0, '63.00', '180.00', '2.86', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:17:52'),
(69, 'NS3534/0025/2023', 0, '1', 0, '63.00', '199.00', '3.16', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:17:53'),
(70, 'NS5251/0066/2023', 0, '1', 0, '63.00', '163.00', '2.59', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:17:53'),
(71, 'NS5298/0057/2023', 0, '1', 0, '63.00', '149.00', '2.37', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:17:53'),
(72, 'NS4897/0091/2023', 0, '1', 0, '63.00', '160.00', '2.54', 'Pass', 'Pass', '2025-04-19 19:06:33', '2025-04-19 22:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `unpaid_students`
--

CREATE TABLE `unpaid_students` (
  `id` bigint UNSIGNED NOT NULL,
  `reg_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked_date` timestamp NOT NULL,
  `unblocked_by` int DEFAULT NULL,
  `unblocked_date` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `intake_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload_limits`
--

CREATE TABLE `upload_limits` (
  `id` bigint UNSIGNED NOT NULL,
  `year_id` bigint UNSIGNED NOT NULL,
  `semester_id` bigint UNSIGNED NOT NULL,
  `campus_id` bigint UNSIGNED DEFAULT NULL,
  `faculty_id` bigint UNSIGNED DEFAULT NULL,
  `intake_category_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL,
  `dead_line` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_limits`
--

INSERT INTO `upload_limits` (`id`, `year_id`, `semester_id`, `campus_id`, `faculty_id`, `intake_category_id`, `status`, `dead_line`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 1, NULL, 1, 1, NULL, '2025-04-13 08:07:00', '2025-04-13 08:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `type` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0:student,1:staff,2:normal user',
  `gender` enum('M','F') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `email`, `password`, `status`, `avatar`, `type`, `gender`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Systemadmin', 'jodam', 'jodam', 'superadmin', 'jodam@gmail.com', '$2y$10$nTZMnS//KuyXLDFS2wGp/O89.xfUvfjiBn/wg3LZgX.YBdhRcP6Im', '1', 'http://127.0.0.1:8000/assets/uploads/avatars/1744240142_QK_1.jpeg', '1', 'M', 'Du63dX9SPaF8zlU7hbKlz27a7UyglloAlfu8oLD9VZct7FthmyfALoapXHtc', '2020-12-30 12:35:38', '2025-04-09 20:09:02', NULL),
(2, 'ABDUL', 'K', 'TUMBO', 'NS0772/0099/2020', NULL, '$2y$10$u5uf7jJRCwy3biUAWakFlOc0wkSZ.3IJfBLpwezzUa0U3MUFvlxum', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(3, 'ABEDI', 'AWADHI', 'MNGAZA', 'NS5289/0024/2023', NULL, '$2y$10$OLHxb3uYjHocn97dbiEXuOKFYS5vQYsI9LxPt9x5FHw9pcP.6NgZu', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(4, 'ABEL', 'MIHAYO', 'NDALAHWA', 'NP1153/0013/2023', NULL, '$2y$10$06bwxzYocTmFjPRlrudvduywHVPuOO5bX/f5Ca42isWPfQKjr4qp2', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(5, 'ABUBAKAR', 'BASHIRU', 'KHALIFA', 'NS5357/0001/2023', NULL, '$2y$10$bteUvYeqN2TDCAIF7XsjmOfb2yvmWf/zYs09/LqMwfmu0BzMhcOye', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(6, 'AGNES', 'ANDREA', 'BOHA', 'NS0672/0001/2023', NULL, '$2y$10$NXobGbotB0Wt9V5lh7VM1u1II7i5JvQYNtrTCZUgHcRJNKp7Q.RAW', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(7, 'AISHA', 'SELEMANI', 'MSUMARI', 'NS2367/0005/2023', NULL, '$2y$10$4xbIpvviwFkc393bJ/eyf.5WPZgkCqVu.LhtNuEiJYIdSohX6ji6i', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(8, 'ANETH', 'THOBIAS', 'HENRY', 'NS0294/0005/2023', NULL, '$2y$10$B.GYLPpAw.xasoL2AQDM4OvB7GdKp5tXBAJmEO0Oi63NAxHN/ljJa', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(9, 'ANJELA', 'WILLISON', 'CHEDIELI', 'NS0916/0003/2023', NULL, '$2y$10$Tc2Jlt/u4xq3CON4vmmvU.cKiGVeCvSUi95s7Tikjm.tJ/K4cDyn2', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(10, 'ANNA', 'AUDAX', 'GERVAS', 'NS1375/0002/2023', NULL, '$2y$10$0Flgf1t9gxgonUsXuzYjWeqfhs4MECYMfh345syZ3gbx6NOG4cUV.', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(11, 'ANNAH', 'DAUDI', 'KILEGE', 'NS0547/0015/2023', NULL, '$2y$10$mnILlV2XBoT4pAXjoXO2sOiQ8ATFsPuHwzeSdZAaXiOxbDS8ilG.W', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(12, 'ATHUMANI', 'HASANI', 'KASIRANI', 'NS0345/0172/2023', NULL, '$2y$10$AS.SUKKb0EzL/E53usBEW.4JhDh7alxFdbqovU/FF/o5Aie7N8d32', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(13, 'AUFATH', 'ADINANI', 'MUTABAZI', 'NS1394/0007/2023', NULL, '$2y$10$FGWqWj4mQm1QG3BRAMGLPexywj6/QDOuWJprq9lxWNaPGzs5TRYMa', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(14, 'AYUBU', 'JUMA', 'AYUBU', 'NS4740/0008/2023', NULL, '$2y$10$RXX.1WRe8h2WqqWjukrgLOFAhYQa7vH0OWJloUyMc67CPJRVPCH1i', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(15, 'AZZA', 'ABDULLAH', 'MOHAMED', 'NEQ2022001913/2020', NULL, '$2y$10$FLzJKordRwlretNd88K6se7B.uJJmTyD26QKVsGomFzjZQkNMk6wC', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:11', '2025-04-11 18:23:11', NULL),
(16, 'BAKARI', 'SALIMU', 'MMANGA', 'NS3371/0102/2023', NULL, '$2y$10$eaoWMSSg3csz7jxK7MWuau3P9I.NPf8ToOBEYW4DdhsD/SnoXKf5W', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(17, 'BARAKA', 'BWIRE', 'MNUBI', 'NS3897/0088/2023', NULL, '$2y$10$fQE0WwdkttANEVyPagTPfuj/qCasKgz4m23C5Q1Ztl6TSbxL.zBDK', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(18, 'BARAKA', 'EMANUELI', 'NADA', 'NS3757/0023/2023', NULL, '$2y$10$Cdvj78ad4R..wdZyg.One.uyNVV07EylwI/of1GSaabTabIoIUPW2', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(19, 'BISHEA', 'BASHIRU', 'KALINDA', 'NS3981/0011/2023', NULL, '$2y$10$dQIV67nQ56Z9qc2Jo8GkZ.U4E9awgMvDoLQaTpTU.4pdl4OVr6zXG', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(20, 'BLANDINA', 'PETER', 'MALALE', 'NS3453/0010/2023', NULL, '$2y$10$/moFM2RrnqntjiyJblb.BOS0QJUn5Yy2Lcy.IT15q75DvWAu/0V.K', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(21, 'CHARLES', 'FITINA', 'CHARLES', 'NS5156/0084/2023', NULL, '$2y$10$Y3cpfJttQklUudIKnNXpluH6Kxz8srM4ZGBJqa9ZFKa8voQprO9xy', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(22, 'CHARLES', 'JAMES', 'WAMBURA', 'NS2510/0010/2023', NULL, '$2y$10$eGRoqO0SGwZvHUXEwEvZw.5gIsiD6fIbk3ylTpwLRiRCGhSuMx2Vm', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(23, 'DEBORA', 'SAMSON', 'KASUKA', 'NS0970/0015/2023', NULL, '$2y$10$6rbjXQOzZZqMA7iGAvjkwOyHThK1KHxlfP2xSRyy0yxjznJWKL9JS', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(24, 'DESLAUS', 'P', 'KABETE', 'NS3834/0019/2018', NULL, '$2y$10$1ye03RFCtxhvieYk/Fbtken2Xyus.BVD3aKAxBsjQ4ctR0k.GO0Tm', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(25, 'DEVOTA', 'TUNZO', 'GODSON', 'NS0850/0022/2022', NULL, '$2y$10$okRgd33d6mRWiZKEXumN0eQIQTt4RG1WWWp.3NkGJqV1CMtGFdJA6', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(26, 'DORKAS', 'ANDENGENYE', 'MWASILE', 'NS0418/0004/2022', NULL, '$2y$10$QSXz8Ylfg3HSwy/BwUizAuhcscv7qp5Y5rg9rIynhdPwo9/HmvXme', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(27, 'EDWIN', 'KEDMON', 'MANYONO', 'NS1027/0179/2023', NULL, '$2y$10$P4W9LmWYHshcvf6Oe2/BNex94N1DYM7S8vc8bUkBj.mdPgQMKQ6z6', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(28, 'ELIZABETH', 'CHARLES', 'MHINA', 'NS4569/0030/2023', NULL, '$2y$10$UthNBfNtr9tVpJXrYLemHuxJZMcf1ohOSAI36FvuCCq0o8eGkdIUa', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(29, 'EMMANUEL', 'ELISA', 'MRUTU', 'NS4740/0041/2023', NULL, '$2y$10$aCqSPFDROEZAqpIkz2IWyuoryMgNe.60V0qHg1.zhf2AQd6y/Idpu', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(30, 'ERICK', 'BONIFASI', 'NG\'UMBI', 'NS1618/0012/2023', NULL, '$2y$10$JqLBMCo7R22NNxSfg6EXmuxSHjnjxz5DpzPgsc7KGkW7pcTCjMMJK', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(31, 'FAIDHA', 'JORDAN', 'MWAKYEMBE', 'NS1060/0017/2023', NULL, '$2y$10$vj4WBpRYv5aDkPT5UUBMvuA/YVpQW7JCMPmJ.nvK5OzmJvL0fZrZ.', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(32, 'FATNA', 'IBRAHIM', 'KIOSI', 'NS5033/0020/2022', NULL, '$2y$10$AV4tswB0er9WesRlPzzfCeLMtsBi.QO9d.ys9SJgGjxj48.xhevUe', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:12', '2025-04-11 18:23:12', NULL),
(33, 'FRANCIS', 'JOAKIMU', 'BARNABA', 'NS0722/0031/2023', NULL, '$2y$10$CA59PF9lwwopjeES3X2EBO2AqNEs9XQrwtzzWrLD2DG6yGDzoKcPW', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(34, 'FRUMENCE', 'AVIRT', 'MVUNGI', 'NS4740/0048/2023', NULL, '$2y$10$GksFC/HRG8anPERvB.ZHdOl6/0djyJe73dYDgJXIVCxjSV183t936', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(35, 'GEORGE', 'L', 'ZACHARIA', 'NS4498/0051/2020', NULL, '$2y$10$3Vfnxc0nyKSOYHE5UZxO2.tvSOL9tGyENORSa3NIsuRoFJosQqx9e', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(36, 'GRACE', 'SAWEMA', 'MGONO', 'NS0241/0039/2020', NULL, '$2y$10$jeA955qhRAuIrjuafdhkPuK4r/2T7O0XjyVrHfh3tBhXmb2n4FLDq', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(37, 'GRAYSON', 'GOERGE', 'ZEFANIA', 'NS0414/0019/2023', NULL, '$2y$10$ckjtSjr7gYxQtc/2Z30sxu5UbDol6RyqgQSa2fSUg13NWFmkF9qxe', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(38, 'HALIMA', 'KISUWA', 'KASSIM', 'NS0197/0009/2020', NULL, '$2y$10$qoMOA9am5Nw9lD2WhJ0SzepXTnkj8OgIky.daF2q8Vaa9B4ov6l9m', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(39, 'HARITH', 'FAKI', 'MOHAMED', 'NS3893/0156/2023', NULL, '$2y$10$ngXqh5Uf03GBZmEBZ5rOIO2pl5JO6NanLqP/8a6m5UZmAUk.ib8RG', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(40, 'HERIETH', 'JOHN', 'MATHEW', 'NS0672/0057/2023', NULL, '$2y$10$TbJyXARq96pJCLHbOSomlexDTOS4xpWxpiqxk31uek0R.dqZRO2ry', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(41, 'HERYETH', 'EBENEZER', 'KIMARO', 'NS4816/0040/2021', NULL, '$2y$10$SqIZw7kyM9Nl6sduKJEi2OfV8q0tfkQuXkXb2XWiQIB8ylxzIKuEG', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(42, 'IBRAHIM', 'IDRISA', 'MBONDERA', 'NS1633/0164/2023', NULL, '$2y$10$YZmRJB9cKd87pb.q0H0HPePv6R4L5XEJ0qg8KLOr1stnH7E8e0ki.', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(43, 'JOHARI', 'JACKSON', 'KHANDO', 'NS4208/0008/2022', NULL, '$2y$10$bOT3fnrkEUDBNJ6MNw/epuPgjVIpupjv.w2xPhWsfsvL/SKEjexIi', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(44, 'LATWIFU', 'HAMISI', 'KIMWAGA', 'NS3897/0105/2023', NULL, '$2y$10$rK7dNKcNUQ3bT70ImfYKie/6WAAZnpHeqCyXWv2mW2oWJVq.KmLnO', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(45, 'LIGHTNESS', 'JOSEPH', 'MKANZA', 'NS0526/0115/2021', NULL, '$2y$10$ZGnVAmZfG4igi1PL1g4GMuWU9OZtiaLwlhT2zIynhVSeZ9mayu30K', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(46, 'LOVENESS', 'REUBEN', 'MAXIMILIAN', 'NS0274/0046/2023', NULL, '$2y$10$wfPwkhkpp5SsZRZQLZ8h.O1rUimzma.IC6oJ.hL4toKkzdcK6ZnZi', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(47, 'MAGASHI', 'MESHACK', 'NYUMBI', 'NS6048/0056/2023', NULL, '$2y$10$Ou4g2Qve33s/wpTrnuET/uBLwDyvoWY2jQiJKbubESD9KtePlOk0m', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(48, 'MARIAMU', 'RASHIDI', 'HIZA', 'NS4006/0030/2021', NULL, '$2y$10$nJnto2G/wV0YBQjJGKVMHuBzB96.kuZ7.8DC3oALqBp9cGmEH3tSO', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:13', '2025-04-11 18:23:13', NULL),
(49, 'MICHAEL', 'CHARLES', 'MLEKWA', 'NS2505/0044/2017', NULL, '$2y$10$aNNwwSPd1YkT9ID6WrojROR6oxkpdglpaUpiMI5Ko.Hb2fhCnfqgG', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(50, 'MUSSA', 'SALIM', 'MUSSA', 'NS4238/0026/2021', NULL, '$2y$10$fKbklrcbsW2z11b5RA4IgO/oDdE5Z5QgM0PVWaEzY4q5kQ0eHnTLu', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(51, 'MUSTAFA', 'SHABANI', 'MUSTAFA', 'NS3351/0179/2023', NULL, '$2y$10$6Clv69vEt20jsfg3HvqCMOtFdSZVZ0JDJARNA5nc3MwkTM/lS8dNq', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(52, 'MWADINI', 'RASHIDI', 'MAKAME', 'NS4117/0256/2022', NULL, '$2y$10$wTH8X.Q1wrklQzIdZJ5dXuPanbTwqD.uX8sF4vYMs5BAtMwgwPXai', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(53, 'MWANAHAMISI', 'HAMZA', 'OMARY', 'NS3321/0044/2021', NULL, '$2y$10$CGNIZ7psyeGsHZ3YwpavveQWHkc231Es1swOPPJd/D5CAk5L1c9X6', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(54, 'MWANAISHA', 'JUMAA', 'KIMBUNGA', 'NS5551/0011/2021', NULL, '$2y$10$YnMjvOIQjsxmot4IqbECT.rDF/TjGILoMBmPkTHtpCt7YTE3I4uYe', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(55, 'NAYFAT', 'HEMED', 'RASHID', 'NS0345/0088/2023', NULL, '$2y$10$YMDW85ereagktrZh4UvfEe6U71B294DZkJeER3qCfOoX0gqaZIdaG', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(56, 'PASKALI', 'BOAY', 'BURA', 'NS4710/0030/2023', NULL, '$2y$10$5WqACeadnlez7v7a4wJVK.1wIAjb17eDiEuj6x3XWAZDRhg9w0kgi', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(57, 'RAHABU', 'VITUS', 'MDEMU', 'NS5822/0117/2023', NULL, '$2y$10$GuvIlWjAyKfGAU8cMeRpTeY7j5SHTyXaCrHu4bhf1tR2bUEm1CpDa', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(58, 'RAMADHANI', 'LEWI', 'URIO', 'NS1097/0129/2021', NULL, '$2y$10$9FYZVag7kyBkJSiyLKNNF.YbuBOPOV5go3t4Ttb8CX9oM0ee0h/3K', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(59, 'REHEMA', 'MWINSHEHE', 'MGUNYA', 'NS1633/0136/2021', NULL, '$2y$10$LVWQ0xe7qPJzmNlOkO5M0uYuFuEVqN6jAWHw1Z2.RkglJbaRWtyD.', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(60, 'REHEMA', 'SALIMU', 'MDOE', 'NS0672/0094/2021', NULL, '$2y$10$dc0J/aAruofUxp10GOrVBub7OYCGPr2ji231of8ALlAoVPLDi2OUW', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(61, 'ROGATHE', 'RAPHAEL', 'MOLLEL', 'NS2521/0024/2021', NULL, '$2y$10$McIslIM2RuehjN/F7Mc86eR2J0i8LviscfdVSzFsGWVMzNgtdLcWu', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(62, 'SADA', 'SHABANI', 'NJUNJA', 'NS1581/0075/2023', NULL, '$2y$10$5G/423s/UQGBkpCukDDg0.csV6bJW3aqmTVrSvUj.gkPzuHZaxa1u', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(63, 'SAIDA', 'MASOUD', 'MTWENGE', 'NS2315/0115/2021', NULL, '$2y$10$8c5LiDW1yGaVgzsb0ziaw.jKNefHfFGRSPp3btBVWgVYMiYAh7P0i', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(64, 'SAMILA', 'SALEHE', 'HABIBU', 'NS2171/0052/2023', NULL, '$2y$10$3veNPGxCzRTr5LsLzSs1we6bUnoAjf43i/Mh4nKOLgYD//mgKmrby', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(65, 'SELEMANI', 'RASHIDI', 'BAKARI', 'NS2424/0074/2023', NULL, '$2y$10$Xo98aZG1.fwvnEZfgCMrxeFiNXzEldY45cWSV8KAbfpQEqqyXaZbK', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:14', '2025-04-11 18:23:14', NULL),
(66, 'SHABANI', 'MOSHI', 'RASHIDI', 'NS0632/0053/2023', NULL, '$2y$10$EXVWGtQXakN4fx2cGnAyYeKXB3OPmINw1N/bmaELhAQc1nk4A0p9.', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL),
(67, 'SHAMIMU', 'RASHID', 'RAMADHANI', 'NS0672/0135/2023', NULL, '$2y$10$HSwstW5gMf71pyndeSfWxOqdvUS/lJ0M.hUrPjtCV90FxqXAsfFMq', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL),
(68, 'SHEDRACK', 'ADAM', 'SHAO', 'NS5376/0082/2023', NULL, '$2y$10$HynwIvLEA6pTwGjTdZ7IkOI3nCHVsKG1J/0BmO/mDJ/RFicEmw3Bq', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL),
(69, 'TYANGA', 'MOHAMED', 'SAIDI', 'NS3228/0285/2022', NULL, '$2y$10$PfC6HCrmJL3.TwiH5uxCnO9OhEn9i59MS3LErdPZK7PNE/REE/57.', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL),
(70, 'UMMUAYMAN', 'ABDALLAH', 'OMARI', 'NS0541/0100/2023', NULL, '$2y$10$BhIJLFeII5Iutj7.c2/QTuUQFa38FdLFwx/dDvtjicEZX4II/sMJW', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL),
(71, 'VALENTINA', 'JOACHIMU', 'MAGANGA', 'NS3534/0025/2023', NULL, '$2y$10$HDWg3uGsTWjYaENibGT5j..hPVTn4lGKZxA747vS/HFAEqXqAnXPC', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL),
(72, 'VERONIKA', 'FIDELIS', 'RENALD', 'NS5251/0066/2023', NULL, '$2y$10$qn4yc1w7UNGOwvdQfdvZfevBo623kq/Mjpf/cJq39s1SjOpozXE9y', '1', 'logo.png', '0', 'F', NULL, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL),
(73, 'YUSUFU', 'ISSA', 'ABDALLAH', 'NS5298/0057/2023', NULL, '$2y$10$wwX43C91zw18c.ZGmY8KBuZYnUQfoPBaP7WVeIIURLaNVpkd0LVp.', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL),
(74, 'ZACHARIA', 'JOHANES', 'SANDO', 'NS4897/0091/2023', NULL, '$2y$10$b0jQdpUAXJaRCCrUtwkv1OLhl6ujVCv2GFSPkWG2ZuiHZyMTYkfP.', '1', 'logo.png', '0', 'M', NULL, '2025-04-11 18:23:15', '2025-04-11 18:23:15', NULL),
(75, 'ARIANA', 'DOTO', 'OSEBAGA', 'examofficer', NULL, '$2y$10$Bd8YqMDXTd7NoUhbbrt3OO4QbfADUow0n8APiSItY7mld10xFJSkC', '1', 'logo.png', '1', 'F', NULL, '2025-04-13 07:29:18', '2025-04-13 07:29:18', NULL),
(77, 'ARIANA', 'DOTO', 'OSEBAGA', 'accountant', NULL, '$2y$10$U2e5iVMVl0FUaA4neihMFuUDaP7vBJ2BTSlMaEuWDTB2XXJgf.gyi', '1', 'logo.png', '1', 'F', NULL, '2025-04-21 05:32:27', '2025-04-21 05:32:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abilities_scope_index` (`scope`);

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allocations`
--
ALTER TABLE `allocations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `allocations_reg_no_room_id_unique` (`reg_no`,`room_id`),
  ADD KEY `allocations_hostel_id_index` (`hostel_id`),
  ADD KEY `allocations_room_id_index` (`room_id`),
  ADD KEY `allocations_year_id_index` (`year_id`);

--
-- Indexes for table `annual_report_remarks`
--
ALTER TABLE `annual_report_remarks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `annual_report_remarks_reg_no_year_id_unique` (`reg_no`,`year_id`),
  ADD KEY `annual_report_remarks_year_id_foreign` (`year_id`),
  ADD KEY `annual_report_remarks_program_id_index` (`program_id`);

--
-- Indexes for table `annual_results`
--
ALTER TABLE `annual_results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `annual_results_reg_no_year_id_unique` (`reg_no`,`year_id`),
  ADD KEY `annual_results_reg_no_index` (`reg_no`);

--
-- Indexes for table `annual_result_summaries`
--
ALTER TABLE `annual_result_summaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `annual_result_summaries_program_id_year_id_unique` (`program_id`,`year_id`);

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_roles_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `assigned_roles_role_id_index` (`role_id`),
  ADD KEY `assigned_roles_scope_index` (`scope`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blocks_hostel_id_index` (`hostel_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campuses`
--
ALTER TABLE `campuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `campuses_campus_acronym_unique` (`campus_acronym`),
  ADD KEY `campuses_institution_id_foreign` (`institution_id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `centers_campus_id_foreign` (`campus_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_code_year_id_department_id_unique` (`course_code`,`year_id`,`department_id`),
  ADD KEY `courses_department_id_index` (`department_id`),
  ADD KEY `courses_year_id_index` (`year_id`),
  ADD KEY `courses_course_code_index` (`course_code`),
  ADD KEY `courses_study_level_id_index` (`study_level_id`);

--
-- Indexes for table `course_exam_categories`
--
ALTER TABLE `course_exam_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_exam_categories_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_program`
--
ALTER TABLE `course_program`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_program_course_id_program_id_year_id_year_unique` (`course_id`,`program_id`,`year_id`,`year`),
  ADD KEY `course_program_course_id_index` (`course_id`),
  ADD KEY `course_program_program_id_index` (`program_id`),
  ADD KEY `course_program_year_id_index` (`year_id`),
  ADD KEY `course_program_year_index` (`year`),
  ADD KEY `course_program_semester_index` (`semester`);

--
-- Indexes for table `course_results`
--
ALTER TABLE `course_results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_results_reg_no_year_id_semester_id_course_id_unique` (`reg_no`,`year_id`,`semester_id`,`course_id`),
  ADD KEY `course_results_reg_no_index` (`reg_no`);

--
-- Indexes for table `course_result_summaries`
--
ALTER TABLE `course_result_summaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_result_summaries_course_id_year_id_semester_id_unique` (`course_id`,`year_id`,`semester_id`);

--
-- Indexes for table `course_staff`
--
ALTER TABLE `course_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_staff_course_id_staff_id_year_id_stream_unique` (`course_id`,`staff_id`,`year_id`,`stream`),
  ADD KEY `course_staff_staff_id_index` (`staff_id`),
  ADD KEY `course_staff_course_id_index` (`course_id`),
  ADD KEY `course_staff_assigned_by_index` (`assigned_by`),
  ADD KEY `course_staff_year_id_foreign` (`year_id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_student_reg_no_course_id_year_id_unique` (`reg_no`,`course_id`,`year_id`),
  ADD KEY `course_student_student_id_index` (`student_id`),
  ADD KEY `course_student_course_id_index` (`course_id`),
  ADD KEY `course_student_semester_index` (`semester`),
  ADD KEY `course_student_year_id_index` (`year_id`);

--
-- Indexes for table `debtors`
--
ALTER TABLE `debtors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `dependants`
--
ALTER TABLE `dependants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dependants_reg_no_foreign` (`reg_no`);

--
-- Indexes for table `education_histories`
--
ALTER TABLE `education_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_histories_reg_no_foreign` (`reg_no`);

--
-- Indexes for table `election_candidates`
--
ALTER TABLE `election_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_posts`
--
ALTER TABLE `election_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_votes`
--
ALTER TABLE `election_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_categories`
--
ALTER TABLE `exam_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_category_results`
--
ALTER TABLE `exam_category_results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reg_year_sem_course_exam_unique` (`reg_no`,`year_id`,`semester_id`,`course_id`,`exam_category_id`),
  ADD KEY `exam_category_results_reg_no_index` (`reg_no`);

--
-- Indexes for table `exam_scores`
--
ALTER TABLE `exam_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_scores_reg_no_index` (`reg_no`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculties_campus_id_foreign` (`campus_id`) USING BTREE;

--
-- Indexes for table `faculty_settings`
--
ALTER TABLE `faculty_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_settings_intake_category_id_foreign` (`intake_category_id`),
  ADD KEY `faculty_settings_faculty_id_index` (`faculty_id`),
  ADD KEY `faculty_settings_year_id_index` (`year_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_rates`
--
ALTER TABLE `fee_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_types`
--
ALTER TABLE `fee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpa_classifications`
--
ALTER TABLE `gpa_classifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gpa_classifications_study_level_id_index` (`study_level_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_study_level_id_index` (`study_level_id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hostels_code_unique` (`code`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `institutions_institution_acronym_unique` (`institution_acronym`);

--
-- Indexes for table `intake_categories`
--
ALTER TABLE `intake_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `intake_categories_year_id_foreign` (`year_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limit_course_registrations`
--
ALTER TABLE `limit_course_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_histories`
--
ALTER TABLE `login_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manner_of_entries`
--
ALTER TABLE `manner_of_entries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manner_of_entries_manner_of_entry_unique` (`manner_of_entry`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `next_of_kin`
--
ALTER TABLE `next_of_kin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `next_of_kin_reg_no_foreign` (`reg_no`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_types_name_unique` (`name`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `permissions_ability_id_index` (`ability_id`),
  ADD KEY `permissions_scope_index` (`scope`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `positions_position_name_unique` (`position_name`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programs_year_id_program_code_unique` (`year_id`,`program_code`),
  ADD KEY `programs_program_code_index` (`program_code`),
  ADD KEY `programs_faculty_id_index` (`faculty_id`),
  ADD KEY `programs_year_id_index` (`year_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publishers_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `publish_exams`
--
ALTER TABLE `publish_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`,`scope`),
  ADD KEY `roles_scope_index` (`scope`);

--
-- Indexes for table `roomapplications`
--
ALTER TABLE `roomapplications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roomapplications_reg_no_unique` (`reg_no`),
  ADD KEY `roomapplications_year_id_index` (`year_id`),
  ADD KEY `roomapplications_criteria_id_index` (`criteria_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_hostel_id_block_id_room_number_unique` (`hostel_id`,`block_id`,`room_number`),
  ADD KEY `rooms_hostel_id_index` (`hostel_id`),
  ADD KEY `rooms_block_id_index` (`block_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_results`
--
ALTER TABLE `semester_results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semester_results_reg_no_year_id_semester_id_unique` (`reg_no`,`year_id`,`semester_id`),
  ADD KEY `semester_results_reg_no_index` (`reg_no`);

--
-- Indexes for table `semester_result_summaries`
--
ALTER TABLE `semester_result_summaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semester_result_summaries_program_id_year_id_semester_id_unique` (`program_id`,`year_id`,`semester_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffs_department_id_index` (`department_id`),
  ADD KEY `staffs_building_id_index` (`building_id`),
  ADD KEY `staffs_position_id_index` (`position_id`),
  ADD KEY `staffs_user_id_index` (`user_id`),
  ADD KEY `staffs_year_id_index` (`year_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_reg_no_year_id_unique` (`reg_no`,`year_id`),
  ADD KEY `students_reg_no_index` (`reg_no`),
  ADD KEY `students_campus_id_index` (`campus_id`),
  ADD KEY `students_faculty_id_index` (`faculty_id`),
  ADD KEY `students_user_id_index` (`user_id`),
  ADD KEY `students_year_id_index` (`year_id`),
  ADD KEY `students_program_id_index` (`program_id`),
  ADD KEY `students_admitted_by_index` (`admitted_by`),
  ADD KEY `students_intake_category_id_index` (`intake_category_id`),
  ADD KEY `students_manner_of_entry_id_foreign` (`manner_of_entry_id`),
  ADD KEY `students_center_id_index` (`center_id`);

--
-- Indexes for table `student_attachments`
--
ALTER TABLE `student_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_attachments_attachment_id_foreign` (`attachment_id`);

--
-- Indexes for table `student_banks`
--
ALTER TABLE `student_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_banks_reg_no_foreign` (`reg_no`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_reg_no_year_id_unique` (`reg_no`,`year_id`),
  ADD UNIQUE KEY `student_classes_user_id_unique` (`user_id`);

--
-- Indexes for table `student_contacts`
--
ALTER TABLE `student_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_contacts_reg_no_foreign` (`reg_no`);

--
-- Indexes for table `student_payments`
--
ALTER TABLE `student_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_payments_reg_no_foreign` (`reg_no`),
  ADD KEY `student_payments_payment_type_id_foreign` (`payment_type_id`);

--
-- Indexes for table `student_sponsors`
--
ALTER TABLE `student_sponsors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_sponsors_reg_no_foreign` (`reg_no`),
  ADD KEY `student_sponsors_sponsor_id_foreign` (`sponsor_id`);

--
-- Indexes for table `student_transactions`
--
ALTER TABLE `student_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_transactions_staff_id_foreign` (`staff_id`),
  ADD KEY `student_transactions_reg_no_foreign` (`reg_no`),
  ADD KEY `student_transactions_year_id_foreign` (`year_id`),
  ADD KEY `student_transactions_billing_id_foreign` (`billing_id`);

--
-- Indexes for table `study_levels`
--
ALTER TABLE `study_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_transactionref_unique` (`transactionRef`);

--
-- Indexes for table `transcripts`
--
ALTER TABLE `transcripts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transcripts_reg_no_year_id_semester_id_unique` (`reg_no`,`year_id`,`semester_id`),
  ADD KEY `transcripts_reg_no_index` (`reg_no`);

--
-- Indexes for table `unpaid_students`
--
ALTER TABLE `unpaid_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unpaid_students_reg_no_index` (`reg_no`);

--
-- Indexes for table `upload_limits`
--
ALTER TABLE `upload_limits`
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
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `allocations`
--
ALTER TABLE `allocations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `annual_report_remarks`
--
ALTER TABLE `annual_report_remarks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `annual_results`
--
ALTER TABLE `annual_results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `annual_result_summaries`
--
ALTER TABLE `annual_result_summaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1390;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campuses`
--
ALTER TABLE `campuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_exam_categories`
--
ALTER TABLE `course_exam_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_program`
--
ALTER TABLE `course_program`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `course_results`
--
ALTER TABLE `course_results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT for table `course_result_summaries`
--
ALTER TABLE `course_result_summaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_staff`
--
ALTER TABLE `course_staff`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `course_student`
--
ALTER TABLE `course_student`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3888;

--
-- AUTO_INCREMENT for table `debtors`
--
ALTER TABLE `debtors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dependants`
--
ALTER TABLE `dependants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education_histories`
--
ALTER TABLE `education_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `election_candidates`
--
ALTER TABLE `election_candidates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `election_posts`
--
ALTER TABLE `election_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `election_votes`
--
ALTER TABLE `election_votes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_categories`
--
ALTER TABLE `exam_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam_category_results`
--
ALTER TABLE `exam_category_results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3176;

--
-- AUTO_INCREMENT for table `exam_scores`
--
ALTER TABLE `exam_scores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faculty_settings`
--
ALTER TABLE `faculty_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_rates`
--
ALTER TABLE `fee_rates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_types`
--
ALTER TABLE `fee_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gpa_classifications`
--
ALTER TABLE `gpa_classifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `intake_categories`
--
ALTER TABLE `intake_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `limit_course_registrations`
--
ALTER TABLE `limit_course_registrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_histories`
--
ALTER TABLE `login_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `manner_of_entries`
--
ALTER TABLE `manner_of_entries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT for table `next_of_kin`
--
ALTER TABLE `next_of_kin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16391;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publish_exams`
--
ALTER TABLE `publish_exams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roomapplications`
--
ALTER TABLE `roomapplications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester_results`
--
ALTER TABLE `semester_results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `semester_result_summaries`
--
ALTER TABLE `semester_result_summaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `student_attachments`
--
ALTER TABLE `student_attachments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_banks`
--
ALTER TABLE `student_banks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `student_contacts`
--
ALTER TABLE `student_contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_payments`
--
ALTER TABLE `student_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_sponsors`
--
ALTER TABLE `student_sponsors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_transactions`
--
ALTER TABLE `student_transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_levels`
--
ALTER TABLE `study_levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transcripts`
--
ALTER TABLE `transcripts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `unpaid_students`
--
ALTER TABLE `unpaid_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_limits`
--
ALTER TABLE `upload_limits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocations`
--
ALTER TABLE `allocations`
  ADD CONSTRAINT `allocations_hostel_id_foreign` FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `allocations_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `allocations_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `academic_years` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `annual_report_remarks`
--
ALTER TABLE `annual_report_remarks`
  ADD CONSTRAINT `annual_report_remarks_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `annual_report_remarks_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `academic_years` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_hostel_id_foreign` FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `campuses`
--
ALTER TABLE `campuses`
  ADD CONSTRAINT `campuses_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `centers`
--
ALTER TABLE `centers`
  ADD CONSTRAINT `centers_campus_id_foreign` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_study_level_id_foreign` FOREIGN KEY (`study_level_id`) REFERENCES `study_levels` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `academic_years` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `course_exam_categories`
--
ALTER TABLE `course_exam_categories`
  ADD CONSTRAINT `course_exam_categories_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_program`
--
ALTER TABLE `course_program`
  ADD CONSTRAINT `course_program_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_program_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_program_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `academic_years` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `course_staff`
--
ALTER TABLE `course_staff`
  ADD CONSTRAINT `course_staff_assigned_by_foreign` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_staff_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_staff_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_staff_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_student_reg_no_foreign` FOREIGN KEY (`reg_no`) REFERENCES `students` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_student_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `academic_years` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `dependants`
--
ALTER TABLE `dependants`
  ADD CONSTRAINT `dependants_reg_no_foreign` FOREIGN KEY (`reg_no`) REFERENCES `students` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education_histories`
--
ALTER TABLE `education_histories`
  ADD CONSTRAINT `education_histories_reg_no_foreign` FOREIGN KEY (`reg_no`) REFERENCES `students` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_category_results`
--
ALTER TABLE `exam_category_results`
  ADD CONSTRAINT `exam_category_results_reg_no_foreign` FOREIGN KEY (`reg_no`) REFERENCES `students` (`reg_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_institution_id_foreign` FOREIGN KEY (`campus_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
