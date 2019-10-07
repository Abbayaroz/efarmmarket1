-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 06:05 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `user_id`, `action`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Logged in', NULL, '2019-02-19 15:37:57', '2019-02-19 15:37:57'),
(2, '1', 'Uploaded a property for Advert', NULL, '2019-02-19 16:36:15', '2019-02-19 16:36:15'),
(3, '1', ' Paid for a transaction', NULL, '2019-02-19 16:36:16', '2019-02-19 16:36:16'),
(4, '1', ' Paid for a transaction', NULL, '2019-02-19 16:36:23', '2019-02-19 16:36:23'),
(5, '1', 'Logged in', NULL, '2019-02-19 17:01:43', '2019-02-19 17:01:43'),
(6, '1', ' Updated his/her Profile', NULL, '2019-02-19 17:02:53', '2019-02-19 17:02:53'),
(7, '1', 'Uploaded a property for Advert', NULL, '2019-02-19 17:39:40', '2019-02-19 17:39:40'),
(8, '1', ' Paid for a transaction', NULL, '2019-02-19 17:39:40', '2019-02-19 17:39:40'),
(9, '1', ' Paid for a transaction', NULL, '2019-02-19 17:40:09', '2019-02-19 17:40:09'),
(10, '1', 'Uploaded a property for Advert', NULL, '2019-02-19 17:44:49', '2019-02-19 17:44:49'),
(11, '1', ' Paid for a transaction', NULL, '2019-02-19 17:44:50', '2019-02-19 17:44:50'),
(12, '1', ' Paid for a transaction', NULL, '2019-02-19 17:44:52', '2019-02-19 17:44:52'),
(13, '1', 'Logged in', NULL, '2019-02-20 03:09:10', '2019-02-20 03:09:10'),
(14, '1', 'Uploaded a property for Advert', NULL, '2019-02-20 03:57:22', '2019-02-20 03:57:22'),
(15, '1', ' Paid for a transaction', NULL, '2019-02-20 03:57:22', '2019-02-20 03:57:22'),
(16, '1', 'Uploaded a property for Advert', NULL, '2019-02-20 04:00:05', '2019-02-20 04:00:05'),
(17, '1', ' Paid for a transaction', NULL, '2019-02-20 04:00:05', '2019-02-20 04:00:05'),
(18, '1', 'logged out', NULL, '2019-02-20 06:07:45', '2019-02-20 06:07:45'),
(19, '2', 'Logged in', NULL, '2019-02-20 06:15:07', '2019-02-20 06:15:07'),
(20, '2', ' Updated his/her Profile', NULL, '2019-02-20 06:15:27', '2019-02-20 06:15:27'),
(21, '2', 'Uploaded a property for Advert', NULL, '2019-02-20 06:17:29', '2019-02-20 06:17:29'),
(22, '2', ' Paid for a transaction', NULL, '2019-02-20 06:17:29', '2019-02-20 06:17:29'),
(23, '2', 'Logged in', NULL, '2019-02-20 06:19:06', '2019-02-20 06:19:06'),
(24, '2', ' Paid for a transaction', NULL, '2019-02-20 06:19:43', '2019-02-20 06:19:43'),
(25, '2', ' Paid for a transaction', NULL, '2019-02-20 06:19:57', '2019-02-20 06:19:57'),
(26, '2', ' Paid for a transaction', NULL, '2019-02-20 06:20:42', '2019-02-20 06:20:42'),
(27, '2', 'logged out', NULL, '2019-02-20 06:21:15', '2019-02-20 06:21:15'),
(28, '2', ' Paid for Property Access', NULL, '2019-02-20 06:24:50', '2019-02-20 06:24:50'),
(29, '2', ' Paid for Property Access', NULL, '2019-02-20 06:25:29', '2019-02-20 06:25:29'),
(30, '2', 'logged out', NULL, '2019-02-20 06:26:24', '2019-02-20 06:26:24'),
(31, '3', 'Logged in', NULL, '2019-02-20 06:28:00', '2019-02-20 06:28:00'),
(32, '3', ' Paid for Property Access', NULL, '2019-02-20 06:28:13', '2019-02-20 06:28:13'),
(33, '3', ' Paid for Property Access', NULL, '2019-02-20 06:28:27', '2019-02-20 06:28:27'),
(34, '3', ' Paid for Property Access', NULL, '2019-02-20 06:28:30', '2019-02-20 06:28:30'),
(35, '3', ' Paid for Property Access', NULL, '2019-02-20 06:28:49', '2019-02-20 06:28:49'),
(36, '3', 'Recharge his/her Wallet', NULL, '2019-02-20 06:32:13', '2019-02-20 06:32:13'),
(37, '3', 'Logged in', NULL, '2019-02-20 14:53:46', '2019-02-20 14:53:46'),
(38, '3', ' Paid for Property Access', NULL, '2019-02-20 15:21:25', '2019-02-20 15:21:25'),
(39, '2', 'Logged in', NULL, '2019-02-22 06:55:48', '2019-02-22 06:55:48'),
(40, '2', ' Paid for Property Access', NULL, '2019-02-22 06:59:48', '2019-02-22 06:59:48'),
(41, '2', 'logged out', NULL, '2019-02-22 07:00:06', '2019-02-22 07:00:06'),
(42, '4', 'Logged in', NULL, '2019-02-23 07:25:45', '2019-02-23 07:25:45'),
(43, '4', ' Paid for Property Access', NULL, '2019-02-23 07:26:04', '2019-02-23 07:26:04'),
(44, '4', ' Paid for Property Access', NULL, '2019-02-23 07:26:34', '2019-02-23 07:26:34'),
(45, '2', 'Logged in', NULL, '2019-02-27 06:11:02', '2019-02-27 06:11:02'),
(46, '2', 'logged out', NULL, '2019-02-27 06:12:40', '2019-02-27 06:12:40'),
(47, '1', 'Logged in', NULL, '2019-03-01 12:40:36', '2019-03-01 12:40:36'),
(48, '2', 'Logged in', NULL, '2019-03-01 23:23:05', '2019-03-01 23:23:05'),
(49, '2', 'logged out', NULL, '2019-03-02 01:05:39', '2019-03-02 01:05:39'),
(50, '1', 'Logged in', NULL, '2019-03-02 01:33:03', '2019-03-02 01:33:03'),
(51, '1', 'Logged in', NULL, '2019-03-04 04:05:21', '2019-03-04 04:05:21'),
(52, '1', 'logged out', NULL, '2019-03-04 04:07:56', '2019-03-04 04:07:56'),
(53, '1', 'Logged in', NULL, '2019-03-04 04:11:47', '2019-03-04 04:11:47'),
(54, '1', ' Paid for Property Access', NULL, '2019-03-04 04:12:07', '2019-03-04 04:12:07'),
(55, '1', ' Paid for Property Access', NULL, '2019-03-04 04:12:20', '2019-03-04 04:12:20'),
(56, '1', ' Paid for Property Access', NULL, '2019-03-04 04:13:09', '2019-03-04 04:13:09'),
(57, '1', ' Paid for Property Access', NULL, '2019-03-04 04:13:21', '2019-03-04 04:13:21'),
(58, '1', 'Uploaded a property for Advert', NULL, '2019-03-04 04:16:40', '2019-03-04 04:16:40'),
(59, '1', ' Paid for a transaction', NULL, '2019-03-04 04:16:40', '2019-03-04 04:16:40'),
(60, '1', 'logged out', NULL, '2019-03-04 04:22:39', '2019-03-04 04:22:39'),
(61, '1', 'Logged in', NULL, '2019-03-06 13:27:50', '2019-03-06 13:27:50'),
(62, '1', ' Paid for Property Access', NULL, '2019-03-06 13:28:44', '2019-03-06 13:28:44'),
(63, '1', ' Paid for Property Access', NULL, '2019-03-06 13:28:48', '2019-03-06 13:28:48'),
(64, '1', ' Paid for Property Access', NULL, '2019-03-06 13:31:17', '2019-03-06 13:31:17'),
(65, '1', ' Paid for Property Access', NULL, '2019-03-06 13:31:22', '2019-03-06 13:31:22'),
(66, '1', 'Logged in', NULL, '2019-03-07 10:43:30', '2019-03-07 10:43:30'),
(67, '1', 'Uploaded a property for Advert', NULL, '2019-03-07 10:46:00', '2019-03-07 10:46:00'),
(68, '1', ' Paid for a transaction', NULL, '2019-03-07 10:46:00', '2019-03-07 10:46:00'),
(69, '1', 'logged out', NULL, '2019-03-07 10:51:46', '2019-03-07 10:51:46'),
(70, '2', 'Logged in', NULL, '2019-03-07 10:52:03', '2019-03-07 10:52:03'),
(71, '2', ' Paid for Property Access', NULL, '2019-03-07 10:52:56', '2019-03-07 10:52:56'),
(72, '2', ' Paid for Property Access', NULL, '2019-03-07 10:53:02', '2019-03-07 10:53:02'),
(73, '2', 'Uploaded a property for Advert', NULL, '2019-03-06 10:57:44', '2019-03-06 10:57:44'),
(74, '2', ' Paid for a transaction', NULL, '2019-03-06 10:57:44', '2019-03-06 10:57:44'),
(75, '2', ' Paid for a transaction', NULL, '2019-03-06 10:57:49', '2019-03-06 10:57:49'),
(76, '2', 'logged out', NULL, '2019-03-06 10:58:05', '2019-03-06 10:58:05'),
(77, '1', 'Logged in', NULL, '2019-03-06 10:58:26', '2019-03-06 10:58:26'),
(78, '1', 'Uploaded a property for Advert', NULL, '2019-03-06 11:01:47', '2019-03-06 11:01:47'),
(79, '1', ' Paid for a transaction', NULL, '2019-03-06 11:01:47', '2019-03-06 11:01:47'),
(80, '1', 'logged out', NULL, '2019-03-06 11:51:04', '2019-03-06 11:51:04'),
(81, '5', 'Logged in', NULL, '2019-03-06 18:03:54', '2019-03-06 18:03:54'),
(82, '2', 'Logged in', NULL, '2019-03-07 20:29:51', '2019-03-07 20:29:51'),
(83, '2', ' Paid for Property Access', NULL, '2019-03-07 20:31:26', '2019-03-07 20:31:26'),
(84, '2', ' Paid for Property Access', NULL, '2019-03-07 20:31:31', '2019-03-07 20:31:31'),
(85, '2', 'Logged in', NULL, '2019-03-07 20:32:49', '2019-03-07 20:32:49'),
(86, '2', ' Paid for Property Access', NULL, '2019-03-07 20:33:19', '2019-03-07 20:33:19'),
(87, '2', ' Paid for Property Access', NULL, '2019-03-07 20:33:35', '2019-03-07 20:33:35'),
(88, '2', ' Paid for Property Access', NULL, '2019-03-07 20:34:44', '2019-03-07 20:34:44'),
(89, '2', ' Paid for Property Access', NULL, '2019-03-07 20:34:59', '2019-03-07 20:34:59'),
(90, '2', 'logged out', NULL, '2019-03-07 20:36:57', '2019-03-07 20:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `add_admin`
--

CREATE TABLE `add_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previlage` int(11) NOT NULL,
  `profilePicture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_admin`
--

INSERT INTO `add_admin` (`id`, `username`, `firstName`, `lastName`, `phone`, `email`, `password`, `previlage`, `profilePicture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shamsuddeen', 'shamsuddeen', 'yusuf ibrahim', '08065601971', 'shamsou124@yahoo.com', '$2y$10$HD8AMH/YyiFzv7nla8DcWeKoy5XRwpUsQZZG7Y1DtkQ6yYia9sm9O', 1, NULL, 'yVvtT5BB3QPNEIDiLextBi3RatAByOkgCUppZwuyvg6qZ5LX2P2UlJ0nx8tt', NULL, '2019-02-19 16:00:29'),
(2, 'mal-baffa', 'usman', 'suleiman', '08036539554', 'supervisor@gmail.com', '$2y$10$8wK1b4m1pQn/y2bxXYUUyeqets2OC/T3/lDWjyeceQokRKBjxJUvu', 1, NULL, 'Jl5DD7MXktynSb9YdWcWBGj0nxu3JjbNfRDwU2j5dO1CDtV99ga53RscTNRX', '2019-02-19 16:07:02', '2019-02-19 16:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`id`, `user_id`, `action`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'logged in', NULL, '2019-02-19 15:32:42', '2019-02-19 15:32:42'),
(2, 1, 'updated his status', NULL, '2019-02-19 16:00:29', '2019-02-19 16:00:29'),
(3, 1, 'Updated Admin\'s Privilege', NULL, '2019-02-19 16:09:06', '2019-02-19 16:09:06'),
(4, 1, 'Updated Admin\'s Privilege', NULL, '2019-02-19 16:09:10', '2019-02-19 16:09:10'),
(5, 1, 'Updated Admin\'s Privilege', NULL, '2019-02-19 16:11:40', '2019-02-19 16:11:40'),
(6, 1, 'Updated Admin\'s Privilege', NULL, '2019-02-19 16:11:41', '2019-02-19 16:11:41'),
(7, 1, 'verified a new user', NULL, '2019-02-19 16:52:03', '2019-02-19 16:52:03'),
(8, 1, 'Deleted an Admin', NULL, '2019-02-19 18:20:28', '2019-02-19 18:20:28'),
(9, 1, 'logged out', NULL, '2019-02-19 18:20:57', '2019-02-19 18:20:57'),
(10, 2, 'logged in', NULL, '2019-02-19 18:21:10', '2019-02-19 18:21:10'),
(11, 2, 'logged in', NULL, '2019-02-19 23:30:36', '2019-02-19 23:30:36'),
(12, 2, 'Update Footer Nav', NULL, '2019-02-20 00:07:08', '2019-02-20 00:07:08'),
(13, 2, 'Update Footer Nav', NULL, '2019-02-20 00:07:19', '2019-02-20 00:07:19'),
(14, 2, 'Update Footer Nav', NULL, '2019-02-20 00:07:30', '2019-02-20 00:07:30'),
(15, 2, 'Update Footer Nav', NULL, '2019-02-20 00:07:40', '2019-02-20 00:07:40'),
(16, 2, 'Update Footer Nav', NULL, '2019-02-20 00:19:16', '2019-02-20 00:19:16'),
(17, 2, 'Update Footer Nav', NULL, '2019-02-20 00:19:25', '2019-02-20 00:19:25'),
(18, 2, 'Update Footer Nav', NULL, '2019-02-20 00:19:35', '2019-02-20 00:19:35'),
(19, 2, 'Update Footer Nav', NULL, '2019-02-20 00:19:43', '2019-02-20 00:19:43'),
(20, 2, 'Update Footer Nav', NULL, '2019-02-20 00:21:37', '2019-02-20 00:21:37'),
(21, 1, 'logged in', NULL, '2019-02-20 02:52:16', '2019-02-20 02:52:16'),
(22, 1, 'change charges amount', NULL, '2019-02-20 03:02:21', '2019-02-20 03:02:21'),
(23, 2, 'logged in', NULL, '2019-02-20 06:22:31', '2019-02-20 06:22:31'),
(24, 2, 'logged in', NULL, '2019-02-20 15:03:37', '2019-02-20 15:03:37'),
(25, 2, 'logged in', NULL, '2019-03-01 12:42:58', '2019-03-01 12:42:58'),
(26, 2, 'logged in', NULL, '2019-03-01 23:04:13', '2019-03-01 23:04:13'),
(27, 2, 'logged in', NULL, '2019-03-03 15:21:11', '2019-03-03 15:21:11'),
(28, 1, 'logged in', NULL, '2019-03-04 04:10:27', '2019-03-04 04:10:27'),
(29, 1, 'logged out', NULL, '2019-03-04 04:20:26', '2019-03-04 04:20:26'),
(30, 2, 'logged in', NULL, '2019-03-06 13:11:34', '2019-03-06 13:11:34'),
(31, 1, 'logged in', NULL, '2019-03-07 10:41:13', '2019-03-07 10:41:13'),
(32, 1, 'requery advert transaction', NULL, '2019-03-06 11:42:48', '2019-03-06 11:42:48'),
(33, 1, 'verified a new user', NULL, '2019-03-06 11:59:18', '2019-03-06 11:59:18'),
(34, 2, 'logged in', NULL, '2019-03-07 20:37:32', '2019-03-07 20:37:32'),
(35, 2, 'requery for property access', NULL, '2019-03-07 20:38:59', '2019-03-07 20:38:59'),
(36, 2, 'logged out', NULL, '2019-03-07 20:39:20', '2019-03-07 20:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyertransaction`
--

CREATE TABLE `buyertransaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_transaction_id` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyertransaction`
--

INSERT INTO `buyertransaction` (`id`, `user_id`, `gallery_id`, `transaction_id`, `v_transaction_id`, `payment_status`, `amount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'B-shamsuddeen-9629-6017', NULL, 1, 260, '2019-03-07 10:52:55', '2019-03-07 10:53:01'),
(2, 2, 1, 'B-shamsuddeen-5415-3781', NULL, NULL, 260, '2019-03-07 20:31:26', '2019-03-07 20:31:26'),
(3, 2, 1, 'B-shamsuddeen-4900-8158', NULL, 1, 260, '2019-03-07 20:33:18', '2019-03-07 20:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(1) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `type`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2000, NULL, '2019-02-20 03:02:21'),
(2, 0, 260, NULL, '2018-12-08 02:06:58'),
(3, 2, 110, NULL, '2018-12-08 02:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `type`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 'shamsou124@gmail.com', '2018-12-25 17:48:23', '2018-12-26 01:48:23'),
(2, 2, '08065601971', '2018-12-25 17:47:57', '2018-12-26 01:47:57'),
(3, 3, 'Main Campus: Is located at Kofar Kabuga - Kofar Ruwa Road, Kano State Fax: 064402560,P.M.B.: 3220', '2018-12-25 17:45:53', '2018-12-14 13:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(14) NOT NULL,
  `best_time_call` int(11) DEFAULT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `attended_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `fullname`, `email`, `phone`, `best_time_call`, `body`, `created_at`, `updated_at`, `attended_status`) VALUES
(1, 'shamsuddeen yusuf ibrahim', 'shamsou124@gmail.com', '08099056751', 3, 'message', '2019-03-01 23:14:54', '2019-03-01 23:14:54', NULL),
(2, 'shamsuddeen yusuf ibrahim', 'shamsou124@gmail.com', '08099056751', 2, 'message', '2019-03-01 23:16:40', '2019-03-01 23:16:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentStatus` int(11) DEFAULT NULL,
  `transactionId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL,
  `bought` tinyint(1) NOT NULL,
  `bought_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `description`, `price`, `address`, `ownership`, `paymentStatus`, `transactionId`, `v_transaction_id`, `amount`, `bought`, `bought_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'a beautiful house 4 bedrooms 2 toilet and one kitchen', 30000000, 'railway quarters abdullahi bayero way kano', '337208412272.pdf', 1, 'O-shamsu124-3173-9348', NULL, 2000, 0, NULL, '2019-03-07 10:46:00', '2019-03-07 10:46:00'),
(2, 2, 'bungalo', 20000000, 'tarauni', '8254403276176.pdf', 1, 'O-shamsuddeen-3461-5667', NULL, 2000, 0, NULL, '2019-03-06 10:57:43', '2019-03-06 10:57:48'),
(3, 1, 'container house', 2000000, 'bompai', '6738147308833.pdf', 1, 'O-shamsu124-7170-7957', NULL, 2000, 0, NULL, '2019-03-06 11:01:47', '2019-03-06 11:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_pictures`
--

CREATE TABLE `gallery_pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `gallery_id` int(10) UNSIGNED NOT NULL,
  `pictures` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_pictures`
--

INSERT INTO `gallery_pictures` (`id`, `gallery_id`, `pictures`, `created_at`, `updated_at`) VALUES
(1, 1, '2659494495272.jpg', '2019-03-07 10:46:00', '2019-03-07 10:46:00'),
(2, 2, '8292025878657.jpg', '2019-03-06 10:57:43', '2019-03-06 10:57:43'),
(3, 3, '8333698641787.jpg', '2019-03-06 11:01:47', '2019-03-06 11:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `manage_footer`
--

CREATE TABLE `manage_footer` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_footer`
--

INSERT INTO `manage_footer` (`id`, `body`, `category`, `created_at`, `updated_at`) VALUES
(1, '<p>shamsuddeen</p>', 1, '2019-02-20 00:19:16', '2019-02-20 00:21:37'),
(2, '<p>hello</p>', 2, '2019-02-20 00:19:25', '2019-02-20 00:19:25'),
(3, '<p>hello</p>', 3, '2019-02-20 00:19:35', '2019-02-20 00:19:35'),
(4, '<p>hello</p>', 4, '2019-02-20 00:19:43', '2019-02-20 00:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2018_10_26_212318_create_users_table', 1),
(22, '2018_11_02_214314_create_gallery_table', 1),
(23, '2018_11_03_125600_create_property_gallery_table', 1),
(24, '2018_11_04_211153_create_charges_table', 1),
(25, '2018_11_08_085924_create_charts_table', 1),
(26, '2018_11_10_174642_create_wallet_table', 1),
(27, '2018_11_10_175015_create_wallet_recharge_transaction_table', 1),
(28, '2018_11_15_095724_create_add_admin_table', 1),
(29, '2018_11_18_214530_create_buyertransaction_table', 1),
(30, '2018_11_19_213233_create_request_bonus_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requestonfivepayment`
--

CREATE TABLE `requestonfivepayment` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `bought_id` int(10) UNSIGNED NOT NULL,
  `payment_status` int(10) UNSIGNED DEFAULT NULL,
  `paid_by` int(10) UNSIGNED DEFAULT NULL,
  `amount` double NOT NULL,
  `v_transaction_id` int(11) DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `customerType` int(11) NOT NULL,
  `modeOfId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `profilePicture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `phone`, `email`, `password`, `gender`, `customerType`, `modeOfId`, `verified`, `profilePicture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shamsu124', 'shamsuddeen yusuf', 'ibrahim', '08065601971', 'shamsou124@gmail.com', '$2y$10$/4AHEy0MUeX6.RxM/68vIuOS8Od73E1/EEyZYy4ad1xctYf/uAffu', 1, 1, '4053584946939.pdf', 1, NULL, '9rHs35wxbMdZdWPFed72d4ewMEiljQcQQQyVTeksmK8huPZvQK2oDNh6FD1c', '2019-02-19 15:36:57', '2019-02-19 17:02:53'),
(2, 'shamsuddeen', 'shamsudden', 'yusuf', '08099056157', 'shamsou12@gmail.com', '$2y$10$hUXc0zMI2diYonkveZTCiOgT/Ncu6uNMytGoP6tVJII1KtxroNtsK', 1, 1, '1766829632855.pdf', NULL, '8092097453265.jpg', 'HjLwLAXkwauaXqCf5Rd6HaYuevoSFzffUOfv3TvrtjpSUGdUllqsUlCUGqEc', '2019-02-20 06:14:43', '2019-02-20 06:15:27'),
(3, 'haruna', 'haruna', 'yusuf', '07058396966', 'haruna@gmail.com', '$2y$10$m50bW2dKxpKIr/.JB1SszuivfUJ76FiytmyV1t6LtGN/SQG64Eevm', 1, 0, NULL, 1, '8873639392655.jpg', NULL, '2019-02-20 06:27:46', '2019-02-20 06:27:46'),
(4, 'elaj', 'musa', 'sabiu', '08032485945', 'msabiunuhu@gmail.com', '$2y$10$LtWCMBzk237iX0Bl3x/yrOqCi7CVeTOUHnamH0jSzHHcHVj8wgkN.', 1, 0, NULL, 1, NULL, NULL, '2019-02-23 07:25:30', '2019-02-23 07:25:30'),
(5, 'SHAMSU', 'MUHAMMAD', 'ISA', '08099046751', 'shamsou@gmail.com', '$2y$10$2BX4i2yIN5KTkE0rQceb9ePuiRyfnFTrBeovA9aT3Y7eSt5zGrAGy', 1, 1, '4218783783676.pdf', NULL, NULL, NULL, '2019-03-06 18:03:32', '2019-03-06 18:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 520, '2019-02-19 15:36:58', '2019-03-06 13:31:21'),
(2, 2, 1220, '2019-02-20 06:14:43', '2019-03-07 20:34:59'),
(3, 3, 1740, '2019-02-20 06:27:46', '2019-02-20 06:28:49'),
(4, 4, 0, '2019-02-23 07:25:31', '2019-02-23 07:25:31'),
(5, 5, 0, '2019-03-06 18:03:32', '2019-03-06 18:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_recharge_transaction`
--

CREATE TABLE `wallet_recharge_transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_recharge_transaction`
--

INSERT INTO `wallet_recharge_transaction` (`id`, `user_id`, `transaction_id`, `v_transaction_id`, `payment_status`, `amount`, `created_at`, `updated_at`) VALUES
(1, 3, 'W-haruna-8686-2821', NULL, NULL, 5000, '2019-02-20 06:32:13', '2019-02-20 06:32:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_admin`
--
ALTER TABLE `add_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyertransaction`
--
ALTER TABLE `buyertransaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_pictures`
--
ALTER TABLE `gallery_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_footer`
--
ALTER TABLE `manage_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestonfivepayment`
--
ALTER TABLE `requestonfivepayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_recharge_transaction`
--
ALTER TABLE `wallet_recharge_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `add_admin`
--
ALTER TABLE `add_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyertransaction`
--
ALTER TABLE `buyertransaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery_pictures`
--
ALTER TABLE `gallery_pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manage_footer`
--
ALTER TABLE `manage_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `requestonfivepayment`
--
ALTER TABLE `requestonfivepayment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wallet_recharge_transaction`
--
ALTER TABLE `wallet_recharge_transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
