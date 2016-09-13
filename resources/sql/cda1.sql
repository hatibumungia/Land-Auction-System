-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2016 at 07:43 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cda`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `area_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`area_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kisasa', '2016-09-01 12:25:22', '2016-09-01 12:25:22'),
(2, 'Nkuhungu', '2016-09-01 12:25:34', '2016-09-01 12:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `area_assignment`
--

CREATE TABLE `area_assignment` (
  `areas_type_id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `area_assignment`
--

INSERT INTO `area_assignment` (`areas_type_id`, `area_id`, `price`) VALUES
(1, 1, '250'),
(2, 1, '350'),
(1, 2, '500'),
(2, 2, '450');

-- --------------------------------------------------------

--
-- Table structure for table `area_types`
--

CREATE TABLE `area_types` (
  `areas_type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `area_types`
--

INSERT INTO `area_types` (`areas_type_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Residential', '2016-09-01 12:25:47', '2016-09-01 12:25:47'),
(2, 'Commercial', '2016-09-01 12:25:53', '2016-09-01 12:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `block_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`block_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A', '2016-09-01 12:26:07', '2016-09-01 12:26:07'),
(2, 'B', '2016-09-01 12:26:14', '2016-09-01 12:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `block_assignment`
--

CREATE TABLE `block_assignment` (
  `area_id` int(10) UNSIGNED NOT NULL,
  `areas_type_id` int(10) UNSIGNED NOT NULL,
  `block_id` int(10) UNSIGNED NOT NULL,
  `file_name` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `block_assignment`
--

INSERT INTO `block_assignment` (`area_id`, `areas_type_id`, `block_id`, `file_name`) VALUES
(1, 1, 1, '1472743795 - 1472709052 - 2index.jpg'),
(1, 1, 2, '1472743814 - 1472709052 - 2index.jpg'),
(1, 2, 1, '1472743764 - 1472709052 - 2index.jpg'),
(1, 2, 2, '1472743780 - 1472709052 - 2index.jpg'),
(2, 1, 1, '1472743873 - 1472709052 - 2index.jpg'),
(2, 1, 2, '1472743892 - 1472709052 - 2index.jpg'),
(2, 2, 1, '1472743839 - 1472709052 - 2index.jpg'),
(2, 2, 2, '1472743857 - 1472709052 - 2index.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_08_15_172631_create_plots_table', 1),
('2016_08_15_203738_create_areas_table', 1),
('2016_08_16_003009_create_area_types_table', 1),
('2016_08_16_003218_create_blocks_table', 1),
('2016_08_16_135243_area_assignment', 1),
('2016_08_16_135253_block_assignment', 1),
('2016_08_16_135304_plot_assignment', 1),
('2016_08_19_170045_create_user_details_table', 1),
('2016_08_19_171102_create_user_credentials_table', 1),
('2016_08_19_172025_create_plot_reservation_table', 1),
('2016_08_27_091528_create_plot_status_table', 1),
('2016_08_27_092156_create_plot_transactions_table', 1),
('2016_08_27_145945_create_transaction_numbers_table', 1),
('2016_08_28_080050_create_user_credentials_trigger', 1),
('2016_09_01_151128_create_plot_reservation_view', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plots`
--

CREATE TABLE `plots` (
  `plot_id` int(10) UNSIGNED NOT NULL,
  `plot_no` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plots`
--

INSERT INTO `plots` (`plot_id`, `plot_no`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-09-01 12:32:26', '2016-09-01 12:32:26'),
(2, 2, '2016-09-01 12:32:26', '2016-09-01 12:32:26'),
(3, 3, '2016-09-01 12:32:27', '2016-09-01 12:32:27'),
(4, 4, '2016-09-01 12:32:27', '2016-09-01 12:32:27'),
(5, 5, '2016-09-01 12:32:27', '2016-09-01 12:32:27'),
(6, 6, '2016-09-01 12:32:27', '2016-09-01 12:32:27'),
(7, 7, '2016-09-01 12:32:27', '2016-09-01 12:32:27'),
(8, 8, '2016-09-01 12:32:27', '2016-09-01 12:32:27'),
(9, 9, '2016-09-01 12:32:27', '2016-09-01 12:32:27'),
(10, 10, '2016-09-01 12:32:28', '2016-09-01 12:32:28'),
(11, 11, '2016-09-01 12:33:02', '2016-09-01 12:33:02'),
(12, 12, '2016-09-01 12:33:02', '2016-09-01 12:33:02'),
(13, 13, '2016-09-01 12:33:03', '2016-09-01 12:33:03'),
(14, 14, '2016-09-01 12:33:03', '2016-09-01 12:33:03'),
(15, 15, '2016-09-01 12:33:03', '2016-09-01 12:33:03'),
(16, 16, '2016-09-01 12:33:03', '2016-09-01 12:33:03'),
(17, 17, '2016-09-01 12:33:03', '2016-09-01 12:33:03'),
(18, 18, '2016-09-01 12:33:03', '2016-09-01 12:33:03'),
(19, 19, '2016-09-01 12:33:03', '2016-09-01 12:33:03'),
(20, 20, '2016-09-01 12:33:03', '2016-09-01 12:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `plot_assignment`
--

CREATE TABLE `plot_assignment` (
  `area_id` int(10) UNSIGNED NOT NULL,
  `areas_type_id` int(10) UNSIGNED NOT NULL,
  `block_id` int(10) UNSIGNED NOT NULL,
  `plot_id` int(10) UNSIGNED NOT NULL,
  `size` double NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plot_assignment`
--

INSERT INTO `plot_assignment` (`area_id`, `areas_type_id`, `block_id`, `plot_id`, `size`, `status`) VALUES
(1, 1, 1, 1, 572, 0),
(1, 1, 1, 2, 327, 0),
(1, 1, 1, 3, 475, 0),
(1, 1, 1, 4, 530, 1),
(1, 1, 1, 5, 380, 0),
(1, 1, 1, 6, 650, 0),
(1, 1, 1, 7, 430, 1),
(1, 1, 1, 8, 100, 1),
(1, 1, 1, 9, 150, 0),
(1, 1, 1, 10, 400, 0),
(1, 1, 2, 11, 572, 0),
(1, 1, 2, 12, 327, 0),
(1, 1, 2, 13, 475, 0),
(1, 1, 2, 14, 530, 1),
(1, 1, 2, 15, 380, 1),
(1, 1, 2, 16, 650, 0),
(1, 1, 2, 17, 430, 1),
(1, 1, 2, 18, 100, 0),
(1, 1, 2, 19, 150, 0),
(1, 1, 2, 20, 400, 0),
(1, 2, 1, 11, 572, 0),
(1, 2, 1, 12, 327, 0),
(1, 2, 1, 13, 475, 0),
(1, 2, 1, 14, 530, 0),
(1, 2, 1, 15, 380, 1),
(1, 2, 1, 16, 650, 0),
(1, 2, 1, 17, 430, 0),
(1, 2, 1, 18, 100, 0),
(1, 2, 1, 19, 150, 0),
(1, 2, 1, 20, 400, 0),
(2, 1, 1, 1, 572, 0),
(2, 1, 2, 1, 572, 0),
(2, 1, 1, 2, 327, 0),
(2, 1, 2, 2, 327, 0),
(2, 1, 1, 3, 475, 0),
(2, 1, 2, 3, 475, 0),
(2, 1, 1, 4, 530, 1),
(2, 1, 2, 4, 530, 0),
(2, 1, 1, 5, 380, 1),
(2, 1, 2, 5, 380, 1),
(2, 1, 1, 6, 650, 0),
(2, 1, 2, 6, 650, 0),
(2, 1, 1, 7, 430, 0),
(2, 1, 2, 7, 430, 0),
(2, 1, 1, 8, 100, 0),
(2, 1, 2, 8, 100, 0),
(2, 1, 1, 9, 150, 0),
(2, 1, 2, 9, 150, 0),
(2, 1, 1, 10, 400, 0),
(2, 1, 2, 10, 400, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plot_reservation`
--

CREATE TABLE `plot_reservation` (
  `area_id` int(10) UNSIGNED NOT NULL,
  `areas_type_id` int(10) UNSIGNED NOT NULL,
  `block_id` int(10) UNSIGNED NOT NULL,
  `plot_id` int(10) UNSIGNED NOT NULL,
  `user_detail_id` int(10) UNSIGNED NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `plot_reservation`
--
DELIMITER $$
CREATE TRIGGER `plot_assignment_rollback` BEFORE DELETE ON `plot_reservation` FOR EACH ROW UPDATE plot_assignment SET plot_assignment.status = 0 
WHERE plot_assignment.area_id = OLD.area_id
AND plot_assignment.areas_type_id = OLD.areas_type_id
AND plot_assignment.block_id=OLD.block_id
AND plot_assignment.plot_id=OLD.plot_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `plot_reservation_view`
--
CREATE TABLE `plot_reservation_view` (
`plot_no` int(11)
,`block` varchar(255)
,`location` varchar(255)
,`land_use` varchar(255)
,`size` double
,`price` varchar(255)
,`total_price` double
,`deadline` timestamp
,`first_name` varchar(255)
,`middle_name` varchar(255)
,`last_name` varchar(255)
,`address` varchar(255)
,`region` varchar(255)
,`created_at` timestamp
,`user_credential_id` int(10) unsigned
,`photo` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `plot_status`
--

CREATE TABLE `plot_status` (
  `area_id` int(10) UNSIGNED NOT NULL,
  `areas_type_id` int(10) UNSIGNED NOT NULL,
  `block_id` int(10) UNSIGNED NOT NULL,
  `plot_id` int(10) UNSIGNED NOT NULL,
  `balance` double NOT NULL,
  `user_detail_id` int(10) UNSIGNED NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plot_status`
--

INSERT INTO `plot_status` (`area_id`, `areas_type_id`, `block_id`, `plot_id`, `balance`, `user_detail_id`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 300, 4, '2016-09-03 14:26:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plot_transactions`
--

CREATE TABLE `plot_transactions` (
  `area_id` int(10) UNSIGNED NOT NULL,
  `areas_type_id` int(10) UNSIGNED NOT NULL,
  `block_id` int(10) UNSIGNED NOT NULL,
  `plot_id` int(10) UNSIGNED NOT NULL,
  `transaction_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `user_detail_id` int(10) UNSIGNED NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_numbers`
--

CREATE TABLE `transaction_numbers` (
  `transaction_number_id` int(10) UNSIGNED NOT NULL,
  `transaction_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_detail_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction_numbers`
--

INSERT INTO `transaction_numbers` (`transaction_number_id`, `transaction_number`, `status`, `user_detail_id`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 5, NULL, NULL),
(2, '2', 1, 5, NULL, NULL),
(3, '3', 1, 7, NULL, NULL),
(4, '4', 0, 0, NULL, NULL),
(5, '5', 0, 0, NULL, NULL),
(6, '6', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@cda.co.tz', '$2y$10$ib2fSlRCKn50SgeIzmeA7.obMWe577AZFpAIPG5AVJ5FqdvCNq4HW', 'eZ2JjGVQcqz2w9x76uytOeGqqbB0pZRWobB1PIKWEeF3kBNOISlWNDkSvH4l', '2016-09-01 12:24:50', '2016-09-01 12:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_detail_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`id`, `username`, `password`, `user_detail_id`, `created_at`, `updated_at`) VALUES
(1, '0767259025', '$2y$10$y1LV7hc/SX.7KIcLjV.yHOuHCsZOATYnPgFum1kYcYlyUsZ3sdCKe', 1, '2016-09-01 15:38:34', '2016-09-01 15:38:34'),
(3, '0719961077', '$2y$10$XPLPqRz072QbxGJuXZSIY.Td0mb0J7mTDHu0wUjPK6tlnTF3ajk1a', 3, '2016-09-02 19:41:07', '2016-09-02 19:41:07'),
(4, '0713882972', '$2y$10$1lyst9pOAvODIOft5AOL2e1GDhGkEYDn6dOoeyGlfF44jqQfYbk.u', 4, '2016-09-03 09:03:31', '2016-09-03 09:03:31'),
(5, '0789106396', '$2y$10$uRqto9Hri2USdUXw2V6Z/uY/54w3By.Kef0k6.N7ZzYg1Wrs.IExC', 5, '2016-09-03 14:38:41', '2016-09-03 14:38:41'),
(6, '0712882972', '$2y$10$iCpGG..k3I8H36Ut9ctFvuRBdkpKkH7I7QB6VE9FUuFY4QfoAHb4y', 6, '2016-09-03 16:46:51', '2016-09-03 16:46:51'),
(7, '0769370256', '$2y$10$zSPB0sXvcMrtk8x4dewPB.OJltvG8ETcV1RxkZzDPUKn2c25Q9WMK', 7, '2016-09-03 16:56:50', '2016-09-03 16:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_detail_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `house_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_detail_id`, `first_name`, `middle_name`, `last_name`, `email_address`, `phone_number`, `password`, `district`, `region`, `ward`, `house_number`, `address`, `photo`, `registration_status`, `created_at`, `updated_at`) VALUES
(1, 'Cyrus', 'Simon Maddox', 'Velasquez', 'biniwyre@yahoo.com', '0767259025', '$2y$10$y1LV7hc/SX.7KIcLjV.yHOuHCsZOATYnPgFum1kYcYlyUsZ3sdCKe', 'Placeat dolor incididunt dolore sint mollit voluptate et ab incididunt aliquam dignissimos quod quasi fugit dolorum', 'Sed reiciendis consectetur minima sint reprehenderit illum officia est adipisicing qui amet blanditiis neque et', 'Eos voluptas ab minima mollitia dolores aut dolore aspernatur', '136', 'Ipsam est minim minus incidunt, qui ducimus, cupidatat non id eum illo.', '11472844008 - DSC06775.JPG', 0, '2016-09-01 12:38:34', '2016-09-02 16:20:08'),
(3, 'Joseph', 'P', 'Mtinangi', 'josephmtinangi@gmail.com', '0719961077', '$2y$10$XPLPqRz072QbxGJuXZSIY.Td0mb0J7mTDHu0wUjPK6tlnTF3ajk1a', 'Manyoni', 'Singida', 'Relini', '4657', 'The University of Dodoma,\r\nCollege of Informatics and Virtual Education,\r\nP. O. Box 359,\r\nDodoma,\r\nTanzania', '3 @ 1472886089 - DSC06775.JPG', 1, '2016-09-02 16:41:07', '2016-09-03 04:01:29'),
(4, 'MASOUD', 'MICKIDARD', 'MASOUD', 'bigutu@yahoo.com', '0713882972', '$2y$10$1lyst9pOAvODIOft5AOL2e1GDhGkEYDn6dOoeyGlfF44jqQfYbk.u', 'DODOMA MJINI', 'DODOMA', 'KISASA', '251', 'P,O.BOX 490\r\nDODOMA', '4 @ 1472894720 - DSC06775.JPG', 1, '2016-09-03 06:03:31', '2016-09-03 06:25:20'),
(5, 'Joseph', 'P', 'Mtinangi', 'josephmtinangi@outlook.com', '0789106396', '$2y$10$uRqto9Hri2USdUXw2V6Z/uY/54w3By.Kef0k6.N7ZzYg1Wrs.IExC', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-03 11:38:41', '2016-09-03 11:38:41'),
(6, 'TUNU', 'JUMA', 'SIZA', 'mmasoud@yahoo.com', '0712882972', '$2y$10$iCpGG..k3I8H36Ut9ctFvuRBdkpKkH7I7QB6VE9FUuFY4QfoAHb4y', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2016-09-03 13:46:51', '2016-09-03 13:46:51'),
(7, 'First', 'Middle', 'Last', 'fml@gmail.com', '0769370256', '$2y$10$zSPB0sXvcMrtk8x4dewPB.OJltvG8ETcV1RxkZzDPUKn2c25Q9WMK', 'Dodoma Mjini', 'Dodoma', 'Kisasa', 'Street', '677', '7 @ 1472922466 - DSC06775.JPG', 1, '2016-09-03 13:56:50', '2016-09-03 14:07:46');

--
-- Triggers `user_details`
--
DELIMITER $$
CREATE TRIGGER `tr_User_Credentials` AFTER INSERT ON `user_details` FOR EACH ROW BEGIN
                INSERT INTO user_credentials (username, password, user_detail_id, created_at, updated_at) VALUES(NEW.phone_number, NEW.password, NEW.user_detail_id, NOW(), NOW());
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `plot_reservation_view`
--
DROP TABLE IF EXISTS `plot_reservation_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `plot_reservation_view`  AS  (select `plots`.`plot_no` AS `plot_no`,`blocks`.`name` AS `block`,`areas`.`name` AS `location`,`area_types`.`name` AS `land_use`,`plot_assignment`.`size` AS `size`,`area_assignment`.`price` AS `price`,(`plot_assignment`.`size` * `area_assignment`.`price`) AS `total_price`,`plot_reservation`.`deadline` AS `deadline`,`user_details`.`first_name` AS `first_name`,`user_details`.`middle_name` AS `middle_name`,`user_details`.`last_name` AS `last_name`,`user_details`.`address` AS `address`,`user_details`.`region` AS `region`,`plot_reservation`.`created_at` AS `created_at`,`plot_reservation`.`user_detail_id` AS `user_credential_id`,`user_details`.`photo` AS `photo` from (((((((`user_details` join `plots`) join `blocks`) join `areas`) join `area_types`) join `plot_assignment`) join `area_assignment`) join `plot_reservation`) where ((`user_details`.`user_detail_id` = `plot_reservation`.`user_detail_id`) and (`plots`.`plot_id` = `plot_reservation`.`plot_id`) and (`blocks`.`block_id` = `plot_reservation`.`block_id`) and (`areas`.`area_id` = `plot_reservation`.`area_id`) and (`area_types`.`areas_type_id` = `plot_reservation`.`areas_type_id`) and (`plot_assignment`.`area_id` = `plot_reservation`.`area_id`) and (`plot_assignment`.`areas_type_id` = `plot_reservation`.`areas_type_id`) and (`plot_assignment`.`block_id` = `plot_reservation`.`block_id`) and (`plot_assignment`.`plot_id` = `plot_reservation`.`plot_id`) and (`area_assignment`.`areas_type_id` = `plot_reservation`.`areas_type_id`) and (`area_assignment`.`area_id` = `plot_reservation`.`area_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`area_id`),
  ADD UNIQUE KEY `areas_name_unique` (`name`);

--
-- Indexes for table `area_assignment`
--
ALTER TABLE `area_assignment`
  ADD PRIMARY KEY (`area_id`,`areas_type_id`),
  ADD KEY `area_assignment_areas_type_id_foreign` (`areas_type_id`);

--
-- Indexes for table `area_types`
--
ALTER TABLE `area_types`
  ADD PRIMARY KEY (`areas_type_id`),
  ADD UNIQUE KEY `area_types_name_unique` (`name`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`block_id`),
  ADD UNIQUE KEY `blocks_name_unique` (`name`);

--
-- Indexes for table `block_assignment`
--
ALTER TABLE `block_assignment`
  ADD PRIMARY KEY (`area_id`,`areas_type_id`,`block_id`),
  ADD KEY `block_assignment_areas_type_id_foreign` (`areas_type_id`),
  ADD KEY `block_assignment_block_id_foreign` (`block_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `plots`
--
ALTER TABLE `plots`
  ADD PRIMARY KEY (`plot_id`),
  ADD UNIQUE KEY `plots_plot_no_unique` (`plot_no`);

--
-- Indexes for table `plot_assignment`
--
ALTER TABLE `plot_assignment`
  ADD PRIMARY KEY (`area_id`,`areas_type_id`,`plot_id`,`block_id`),
  ADD KEY `plot_assignment_areas_type_id_foreign` (`areas_type_id`),
  ADD KEY `plot_assignment_block_id_foreign` (`block_id`),
  ADD KEY `plot_assignment_plot_id_foreign` (`plot_id`);

--
-- Indexes for table `plot_reservation`
--
ALTER TABLE `plot_reservation`
  ADD PRIMARY KEY (`area_id`,`areas_type_id`,`plot_id`,`block_id`),
  ADD KEY `plot_reservation_areas_type_id_foreign` (`areas_type_id`),
  ADD KEY `plot_reservation_block_id_foreign` (`block_id`),
  ADD KEY `plot_reservation_plot_id_foreign` (`plot_id`),
  ADD KEY `plot_reservation_user_detail_id_foreign` (`user_detail_id`);

--
-- Indexes for table `plot_status`
--
ALTER TABLE `plot_status`
  ADD PRIMARY KEY (`area_id`,`areas_type_id`,`plot_id`,`block_id`),
  ADD KEY `plot_status_areas_type_id_foreign` (`areas_type_id`),
  ADD KEY `plot_status_block_id_foreign` (`block_id`),
  ADD KEY `plot_status_plot_id_foreign` (`plot_id`),
  ADD KEY `plot_status_user_detail_id_foreign` (`user_detail_id`);

--
-- Indexes for table `plot_transactions`
--
ALTER TABLE `plot_transactions`
  ADD UNIQUE KEY `plot_transactions_transaction_number_unique` (`transaction_number`),
  ADD KEY `plot_transactions_area_id_foreign` (`area_id`),
  ADD KEY `plot_transactions_areas_type_id_foreign` (`areas_type_id`),
  ADD KEY `plot_transactions_block_id_foreign` (`block_id`),
  ADD KEY `plot_transactions_plot_id_foreign` (`plot_id`),
  ADD KEY `plot_transactions_user_detail_id_foreign` (`user_detail_id`);

--
-- Indexes for table `transaction_numbers`
--
ALTER TABLE `transaction_numbers`
  ADD PRIMARY KEY (`transaction_number_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_credentials_user_detail_id_foreign` (`user_detail_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_detail_id`),
  ADD UNIQUE KEY `user_details_email_address_unique` (`email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `area_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `area_types`
--
ALTER TABLE `area_types`
  MODIFY `areas_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `block_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `plots`
--
ALTER TABLE `plots`
  MODIFY `plot_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `transaction_numbers`
--
ALTER TABLE `transaction_numbers`
  MODIFY `transaction_number_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_credentials`
--
ALTER TABLE `user_credentials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `area_assignment`
--
ALTER TABLE `area_assignment`
  ADD CONSTRAINT `area_assignment_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`area_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `area_assignment_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `area_types` (`areas_type_id`) ON DELETE CASCADE;

--
-- Constraints for table `block_assignment`
--
ALTER TABLE `block_assignment`
  ADD CONSTRAINT `block_assignment_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `area_assignment` (`area_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `block_assignment_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `area_assignment` (`areas_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `block_assignment_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `blocks` (`block_id`) ON DELETE CASCADE;

--
-- Constraints for table `plot_assignment`
--
ALTER TABLE `plot_assignment`
  ADD CONSTRAINT `plot_assignment_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `block_assignment` (`area_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_assignment_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `block_assignment` (`areas_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_assignment_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `block_assignment` (`block_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_assignment_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plots` (`plot_id`) ON DELETE CASCADE;

--
-- Constraints for table `plot_reservation`
--
ALTER TABLE `plot_reservation`
  ADD CONSTRAINT `plot_reservation_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `plot_assignment` (`area_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_reservation_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `plot_assignment` (`areas_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_reservation_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `plot_assignment` (`block_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_reservation_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plot_assignment` (`plot_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_reservation_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`user_detail_id`) ON DELETE CASCADE;

--
-- Constraints for table `plot_status`
--
ALTER TABLE `plot_status`
  ADD CONSTRAINT `plot_status_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `plot_assignment` (`area_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_status_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `plot_assignment` (`areas_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_status_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `plot_assignment` (`block_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_status_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plot_assignment` (`plot_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_status_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`user_detail_id`) ON DELETE CASCADE;

--
-- Constraints for table `plot_transactions`
--
ALTER TABLE `plot_transactions`
  ADD CONSTRAINT `plot_transactions_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `plot_reservation` (`area_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_transactions_areas_type_id_foreign` FOREIGN KEY (`areas_type_id`) REFERENCES `plot_reservation` (`areas_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_transactions_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `plot_reservation` (`block_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_transactions_plot_id_foreign` FOREIGN KEY (`plot_id`) REFERENCES `plot_reservation` (`plot_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plot_transactions_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`user_detail_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD CONSTRAINT `user_credentials_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`user_detail_id`) ON DELETE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `e_hourly` ON SCHEDULE EVERY 3 MINUTE STARTS '2016-09-03 17:31:53' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Clears out plot status table each hour.' DO DELETE FROM plot_reservation WHERE plot_reservation.status = 0 AND now()>=ADDTIME(plot_reservation.created_at, '0:03:00')$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
