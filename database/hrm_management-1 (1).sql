-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2018 at 09:31 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tbl`
--

CREATE TABLE `attendance_tbl` (
  `attendance_id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New', 'New', 'Active', '2018-08-09 09:07:27', '2018-08-16 11:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` int(10) UNSIGNED NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `department`, `designation_name`, `designation_description`, `designation_status`, `created_at`, `updated_at`) VALUES
(1533398141, 'Department', 'Testing', 'SSS', 'Active', '2018-08-04 09:55:41', '2018-08-16 11:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `employee_bankaccount_details`
--

CREATE TABLE `employee_bankaccount_details` (
  `employee_bankaccount_details_id` int(10) UNSIGNED NOT NULL,
  `employee_personal_details_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_bankaccount_details`
--

INSERT INTO `employee_bankaccount_details` (`employee_bankaccount_details_id`, `employee_personal_details_id`, `account_holder_name`, `account_number`, `bank_name`, `branch_name`, `created_at`, `updated_at`) VALUES
(1533827329, '1533827329', 'Shakil Ahmmed', '1', '1', '1', '2018-08-09 09:08:49', '2018-08-09 09:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `employee_company_details`
--

CREATE TABLE `employee_company_details` (
  `employee_company_details_id` int(10) UNSIGNED NOT NULL,
  `employee_personal_details_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_joining` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_sallary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_company_details`
--

INSERT INTO `employee_company_details` (`employee_company_details_id`, `employee_personal_details_id`, `employee_code`, `department`, `designation_name`, `date_of_joining`, `joining_sallary`, `shift`, `status`, `created_at`, `updated_at`) VALUES
(1533827329, '1533827329', '1', 'New', 'Testing', '2018-08-01', '10000', '1', 'Active', '2018-08-09 09:08:49', '2018-08-09 09:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `employee_documents`
--

CREATE TABLE `employee_documents` (
  `employee_documents_id` int(10) UNSIGNED NOT NULL,
  `employee_personal_details_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_documents`
--

INSERT INTO `employee_documents` (`employee_documents_id`, `employee_personal_details_id`, `document_file_name`, `document`, `created_at`, `updated_at`) VALUES
(1, '1533827329', 'File', 'admin_asset/backend/employee/documents/1533827329.jpg', '2018-08-09 09:08:49', '2018-08-09 09:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `employee_job_history`
--

CREATE TABLE `employee_job_history` (
  `employee_job_history_id` int(10) UNSIGNED NOT NULL,
  `employee_personal_details_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_job_history`
--

INSERT INTO `employee_job_history` (`employee_job_history_id`, `employee_personal_details_id`, `company_name`, `job_department`, `designation`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '1533827329', 'Cf', 'c', 'c', '2018-08-01', '2018-08-09', '2018-08-09 09:08:49', '2018-08-09 09:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `employee_login_details`
--

CREATE TABLE `employee_login_details` (
  `employee_login_details_id` int(10) UNSIGNED NOT NULL,
  `employee_personal_details_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_login_details`
--

INSERT INTO `employee_login_details` (`employee_login_details_id`, `employee_personal_details_id`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1533827329, '1533827329', 'shakil@codebool.com', '$2y$10$5.NDQUCl1oUOvKa0r/g3t.KkjJnnm8YkMKWjtw8nd10BEwn22Km6.', 'Admin', '2018-08-09 09:08:49', '2018-08-09 09:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `employee_personal_details`
--

CREATE TABLE `employee_personal_details` (
  `employee_personal_details_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_bith` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_personal_details`
--

INSERT INTO `employee_personal_details` (`employee_personal_details_id`, `name`, `father_name`, `date_of_bith`, `gender`, `phone`, `present_address`, `permanent_address`, `nationality`, `marital_status`, `profile_image`, `created_at`, `updated_at`) VALUES
(1533827329, 'Shakil Ahmmed', 'Haroun Aur Roshid', '2018-08-09', 'Male', '01849942053', 'Abdur Rehman B.Com Bhuiyan Bari', 'Abdur Rehman B.Com Bhuiyan Bari', 'Bangladesh', 'Married', 'admin_asset/backend/employee/1533827329.jpg', '2018-08-09 09:08:49', '2018-08-09 09:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) UNSIGNED NOT NULL,
  `expense_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(10) UNSIGNED NOT NULL,
  `occassion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `occassion`, `description`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Eid Day', 'Eid Day', '2018-08-01', 'Inactive', '2018-08-04 10:37:50', '2018-08-07 11:49:08'),
(2, 'Friday', 'Friday', '2018-08-04', 'Inactive', '2018-08-05 11:12:36', '2018-08-07 11:49:13'),
(3, 'August', 'August', '2018-08-06', 'Inactive', '2018-08-05 11:23:20', '2018-08-07 11:57:24'),
(4, 'Grened', 'Grened', '2018-08-16', 'Active', '2018-08-05 11:23:43', '2018-08-05 11:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `employee_code`, `leave_type`, `from_date`, `to_date`, `reason`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1533919321, '1', 'Sick', '2018-08-01', '2018-08-31', 'Sick', 'Active', '2018-08-10 10:42:01', '2018-08-10 10:42:01', NULL),
(1533919337, '1', 'Sick', '2018-08-01', '2018-08-31', 'Sick', 'Active', '2018-08-10 10:42:17', '2018-08-10 10:42:17', NULL),
(1533919399, '1', 'Sick', '2018-08-01', '2018-08-31', 'Sick', 'Active', '2018-08-10 10:43:19', '2018-08-10 10:43:19', NULL),
(1533919416, '1', 'Sick', '2018-08-01', '2018-08-31', 'Sick', 'Active', '2018-08-10 10:43:36', '2018-08-10 10:43:36', NULL),
(1533919727, '1', 'Sick', '2018-08-01', '2018-08-31', 'a', 'Active', '2018-08-10 10:48:47', '2018-08-10 10:48:47', NULL),
(1533920969, '1', 'Sick', '2018-08-01', '2018-08-31', 'a', 'Active', '2018-08-10 11:09:29', '2018-08-10 11:09:29', NULL),
(1533921125, '1', 'Sick', '2018-08-01', '2018-08-31', 'a', 'Active', '2018-08-10 11:12:05', '2018-08-10 11:12:05', NULL),
(1533921131, '1', 'Sick', '2018-08-01', '2018-08-31', 'a', 'Active', '2018-08-10 11:12:11', '2018-08-10 11:12:11', NULL),
(1533921298, '1', 'Sick', '2018-08-01', '2018-08-31', 'a', 'Active', '2018-08-10 11:14:58', '2018-08-10 11:14:58', NULL),
(1533921339, '1', 'Sick', '2018-08-01', '2018-08-31', 'a', 'Active', '2018-08-10 11:15:39', '2018-08-10 11:15:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE `leavetype` (
  `id` int(10) UNSIGNED NOT NULL,
  `leave_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`id`, `leave_type_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sick', 'Sick', 'Active', '2018-08-10 09:51:11', '2018-08-10 09:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_02_185331_create_designation', 1),
(4, '2018_05_02_190352_create_department', 1),
(5, '2018_05_03_044241_create_vacancies_models_table', 1),
(6, '2018_05_03_044344_create_applications_models_table', 1),
(7, '2018_05_03_181042_create_expense', 1),
(8, '2018_05_03_212009_create_leavetype', 1),
(10, '2018_05_05_155948_create_holiday', 1),
(11, '2018_05_06_171328_create_employee', 1),
(12, '2018_05_08_180707_create_task_models_table', 1),
(13, '2018_05_13_171849_create_notice_borad', 1),
(14, '2018_06_09_031129_create_attendance_models_table', 1),
(15, '2018_08_07_163150_create_payslip_basic_models_table', 2),
(16, '2018_08_07_163347_create_payslip_allowance_models_table', 2),
(17, '2018_08_07_163432_create_payslip_deduction_models_table', 2),
(18, '2018_05_03_224558_create_leave', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `notice_board_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`notice_board_id`, `title`, `subject`, `author`, `type`, `to`, `notice`, `created_at`, `updated_at`) VALUES
(1533919676, 'An Example of a Google Bar Chart', 't', 'Admin', 'Individual', '1533827329', 'A', '2018-08-10 10:47:56', '2018-08-10 10:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payslip_allowance_tbl`
--

CREATE TABLE `payslip_allowance_tbl` (
  `payslip_allowance_id` int(10) UNSIGNED NOT NULL,
  `payslip_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allowances_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allowances_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payslip_allowance_tbl`
--

INSERT INTO `payslip_allowance_tbl` (`payslip_allowance_id`, `payslip_id`, `allowances_type`, `allowances_amount`, `created_at`, `updated_at`) VALUES
(1, '1533827338', 'Mobile', '120', '2018-08-09 09:10:14', '2018-08-09 09:10:14'),
(2, '1533827338', 'Rent', '5000', '2018-08-09 09:10:14', '2018-08-09 09:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `payslip_basic_tbl`
--

CREATE TABLE `payslip_basic_tbl` (
  `payslip_id` int(10) UNSIGNED NOT NULL,
  `department` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `allowances` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deductions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payslip_basic_tbl`
--

INSERT INTO `payslip_basic_tbl` (`payslip_id`, `department`, `employee_name`, `month`, `year`, `basic`, `allowances`, `deductions`, `net_salary`, `status`, `created_at`, `updated_at`) VALUES
(1533827338, 'New', '10000', 'January', '2018', '10000', '5120', '700', '14420', 'Paid', '2018-08-09 09:10:14', '2018-08-09 09:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `payslip_deduction_tbl`
--

CREATE TABLE `payslip_deduction_tbl` (
  `payslip_deduction_id` int(10) UNSIGNED NOT NULL,
  `payslip_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deductions_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deductions_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payslip_deduction_tbl`
--

INSERT INTO `payslip_deduction_tbl` (`payslip_deduction_id`, `payslip_id`, `deductions_type`, `deductions_amount`, `created_at`, `updated_at`) VALUES
(1, '1533827338', 'Leave', '200', '2018-08-09 09:10:14', '2018-08-09 09:10:14'),
(2, '1533827338', 'Leave Test', '500', '2018-08-09 09:10:15', '2018-08-09 09:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applications`
--

CREATE TABLE `tbl_applications` (
  `id` int(10) UNSIGNED NOT NULL,
  `application_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimated_hour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`id`, `title`, `description`, `assign_to`, `start_date`, `end_date`, `estimated_hour`, `progress`, `status`, `created_at`, `updated_at`) VALUES
(1534266497, 'An Example of a Google Bar Chart', 'as', 'as', '2018-08-01', '2018-08-31', '1', '1', 'Active', '2018-08-14 11:08:17', '2018-08-14 11:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vacancies`
--

CREATE TABLE `tbl_vacancies` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_vacation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_date_of` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `employee_bankaccount_details`
--
ALTER TABLE `employee_bankaccount_details`
  ADD PRIMARY KEY (`employee_bankaccount_details_id`);

--
-- Indexes for table `employee_company_details`
--
ALTER TABLE `employee_company_details`
  ADD PRIMARY KEY (`employee_company_details_id`);

--
-- Indexes for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD PRIMARY KEY (`employee_documents_id`);

--
-- Indexes for table `employee_job_history`
--
ALTER TABLE `employee_job_history`
  ADD PRIMARY KEY (`employee_job_history_id`);

--
-- Indexes for table `employee_login_details`
--
ALTER TABLE `employee_login_details`
  ADD PRIMARY KEY (`employee_login_details_id`);

--
-- Indexes for table `employee_personal_details`
--
ALTER TABLE `employee_personal_details`
  ADD PRIMARY KEY (`employee_personal_details_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavetype`
--
ALTER TABLE `leavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`notice_board_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payslip_allowance_tbl`
--
ALTER TABLE `payslip_allowance_tbl`
  ADD PRIMARY KEY (`payslip_allowance_id`);

--
-- Indexes for table `payslip_basic_tbl`
--
ALTER TABLE `payslip_basic_tbl`
  ADD PRIMARY KEY (`payslip_id`);

--
-- Indexes for table `payslip_deduction_tbl`
--
ALTER TABLE `payslip_deduction_tbl`
  ADD PRIMARY KEY (`payslip_deduction_id`);

--
-- Indexes for table `tbl_applications`
--
ALTER TABLE `tbl_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vacancies`
--
ALTER TABLE `tbl_vacancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  MODIFY `attendance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1533398142;

--
-- AUTO_INCREMENT for table `employee_bankaccount_details`
--
ALTER TABLE `employee_bankaccount_details`
  MODIFY `employee_bankaccount_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1533827330;

--
-- AUTO_INCREMENT for table `employee_company_details`
--
ALTER TABLE `employee_company_details`
  MODIFY `employee_company_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1533827330;

--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `employee_documents_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_job_history`
--
ALTER TABLE `employee_job_history`
  MODIFY `employee_job_history_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_login_details`
--
ALTER TABLE `employee_login_details`
  MODIFY `employee_login_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1533827330;

--
-- AUTO_INCREMENT for table `employee_personal_details`
--
ALTER TABLE `employee_personal_details`
  MODIFY `employee_personal_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1533827330;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1533921340;

--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `notice_board_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1533919677;

--
-- AUTO_INCREMENT for table `payslip_allowance_tbl`
--
ALTER TABLE `payslip_allowance_tbl`
  MODIFY `payslip_allowance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payslip_basic_tbl`
--
ALTER TABLE `payslip_basic_tbl`
  MODIFY `payslip_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1533827339;

--
-- AUTO_INCREMENT for table `payslip_deduction_tbl`
--
ALTER TABLE `payslip_deduction_tbl`
  MODIFY `payslip_deduction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_applications`
--
ALTER TABLE `tbl_applications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1534266498;

--
-- AUTO_INCREMENT for table `tbl_vacancies`
--
ALTER TABLE `tbl_vacancies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
