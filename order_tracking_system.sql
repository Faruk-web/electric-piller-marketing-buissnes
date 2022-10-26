-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 12:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_tracking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `material_name`, `unit_type`, `price`, `note`, `created_at`, `updated_at`) VALUES
(1, 'bali', '10kg', '15421.00', 'sdgfdsfgf', '2022-10-24 05:25:40', '2022-10-24 05:25:40'),
(3, 'hdhfhh', 'kg', '424.00', 'gddgdf', '2022-10-24 05:28:06', '2022-10-24 05:28:06'),
(5, 'siment', '12kg', '42.00', 'vfbbb', '2022-10-24 23:22:37', '2022-10-24 23:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `material_info_to_make_products`
--

CREATE TABLE `material_info_to_make_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_amount` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_info_to_make_products`
--

INSERT INTO `material_info_to_make_products` (`id`, `material_id`, `product_id`, `unit_amount`, `price`, `total_price`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '74.00', '47.00', '77.00', '2022-10-13', '2022-10-22 03:02:24', '2022-10-22 03:02:24'),
(2, 1, 2, '455.00', '452.00', '45.00', '2022-10-25', '2022-10-22 03:04:11', '2022-10-22 03:04:11'),
(3, 1, 2, '45.00', '455.00', '4425.00', '2022-10-25', '2022-10-22 03:04:11', '2022-10-22 03:04:11'),
(4, 1, 2, '0.00', '45563.00', '182252.00', '2022-10-26', '2022-10-24 03:08:59', '2022-10-24 03:08:59'),
(5, 4, 2, '0.00', '445.00', '445.00', '2022-10-13', '2022-10-24 03:37:01', '2022-10-24 03:37:01');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_12_15_102336_create_sessions_table', 1),
(14, '2022_10_20_162913_create_purchase_invoices_table', 4),
(15, '2022_10_21_172117_create_purchase_materials_table', 5),
(16, '2022_10_21_173119_create_raw_material_stocks_table', 6),
(18, '2022_10_22_050155_create_products_table', 7),
(19, '2022_10_22_074144_create_material_info_to_make_products_table', 8),
(20, '2022_10_22_100822_create_product_invoices_table', 9),
(21, '2022_10_22_114623_create_production_materials_table', 10),
(22, '2022_10_23_065705_create_production_to_product_outputs_table', 11),
(23, '2022_10_23_065932_create_product_stocks_table', 12),
(24, '2022_10_20_111212_create_materials_table', 13),
(25, '2022_10_20_112408_create_suppliers_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `production_materials`
--

CREATE TABLE `production_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_materials`
--

INSERT INTO `production_materials` (`id`, `raw_material_id`, `invioce_number`, `price`, `total_price`, `quantity`, `date`, `created_at`, `updated_at`) VALUES
(3, 1, 'P94643', '42.00', '630.00', 15, '2022-10-19', '2022-10-22 22:58:11', '2022-10-22 22:58:11'),
(4, 1, 'P32603', '4.00', '8.00', 2, '2022-10-25', '2022-10-22 23:11:07', '2022-10-22 23:11:07'),
(5, 1, 'P15553', '42.00', '190890.00', 4545, '2022-10-18', '2022-10-22 23:32:12', '2022-10-22 23:32:12'),
(6, 1, 'P14123', '20.00', '40.00', 2, '2022-10-27', '2022-10-23 00:06:55', '2022-10-23 00:06:55'),
(7, 1, 'P51463', '47.00', '94.00', 2, '2022-10-26', '2022-10-23 00:10:32', '2022-10-23 00:10:32'),
(8, 1, 'P59623', '2.00', '2.00', 1, '2022-10-20', '2022-10-23 00:11:40', '2022-10-23 00:11:40'),
(9, 4, 'P15303', '445.00', '445.00', 1, '2022-10-26', '2022-10-24 03:47:45', '2022-10-24 03:47:45'),
(10, 4, 'P95443', '445.00', '445.00', 1, '2022-10-11', '2022-10-24 03:48:02', '2022-10-24 03:48:02'),
(11, 1, 'P97353', '15421.00', '185052.00', 12, '2022-10-25', '2022-10-24 09:53:43', '2022-10-24 09:53:43'),
(12, 1, 'P13953', '15421.00', '107947.00', 7, '2022-10-26', '2022-10-25 00:15:17', '2022-10-25 00:15:17'),
(13, 1, 'P1212', '15421.00', '15421.00', 1, '2022-10-26', '2022-10-25 01:01:39', '2022-10-25 01:01:39'),
(14, 1, 'P1212', '15421.00', '15421.00', 1, '2022-10-26', '2022-10-25 01:03:20', '2022-10-25 01:03:20'),
(15, 1, 'P77333', '15421.00', '15421.00', 1, '2022-10-27', '2022-10-25 01:06:25', '2022-10-25 01:06:25'),
(16, 1, 'P1212', '15421.00', '15421.00', 1, '2022-10-26', '2022-10-25 01:08:13', '2022-10-25 01:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `production_to_product_outputs`
--

CREATE TABLE `production_to_product_outputs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cost` decimal(8,2) NOT NULL,
  `total_production` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_to_product_outputs`
--

INSERT INTO `production_to_product_outputs` (`id`, `product_id`, `invioce_number`, `product_cost`, `total_production`, `quantity`, `date`, `created_at`, `updated_at`) VALUES
(1, 2, 'P66803', '10.00', '120.00', 12, '2022-10-27', '2022-10-23 01:15:22', '2022-10-23 01:15:22'),
(2, 3, 'P29293', '2.00', '2.00', 1, '2022-10-25', '2022-10-24 03:53:21', '2022-10-24 03:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `production_cost` decimal(8,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `class`, `unit_type`, `size`, `price`, `production_cost`, `date`, `created_at`, `updated_at`) VALUES
(1, 'rygghgdhg', 'ygjhgjh', 'kg', 'gju', '989.00', '656.00', '2022-10-27', '2022-10-21 23:18:41', '2022-10-21 23:18:41'),
(2, 'building', 'gdgdfg', 'kg', '20feet', '4524.00', '4425.00', '2022-10-26', '2022-10-21 23:20:16', '2022-10-21 23:20:16'),
(3, 'table', 'gdgdfg', '41', '(12*12)feet', '442.00', '144.00', '2022-10-20', '2022-10-23 04:45:49', '2022-10-23 04:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_invoices`
--

CREATE TABLE `product_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_invoices`
--

INSERT INTO `product_invoices` (`id`, `invioce_number`, `total_cost`, `status`, `note`, `date`, `created_at`, `updated_at`) VALUES
(1, 'P1211', '542.00', 'complete', 'ghgggdgf', '2022-10-22', '2022-10-22 04:17:12', '2022-10-22 04:17:12'),
(2, 'P1212', '4524.00', 'processing', 'gdfhfhdhh', '2022-10-22', '2022-10-22 04:17:57', '2022-10-22 04:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `stock_quantity`, `date`, `created_at`, `updated_at`) VALUES
(1, 2, 12, '2022-10-27', '2022-10-23 01:15:22', '2022-10-23 01:15:22'),
(2, 3, 13, '2022-10-25', '2022-10-24 03:53:21', '2022-10-24 03:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoices`
--

CREATE TABLE `purchase_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_gross` decimal(8,2) DEFAULT NULL,
  `date` date NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_invoices`
--

INSERT INTO `purchase_invoices` (`id`, `supplier_id`, `invioce_number`, `total_gross`, `date`, `note`, `created_at`, `updated_at`) VALUES
(6, 1, 'S46946', '142.00', '2022-10-24', 'gdfhgfhd', '2022-10-24 10:46:57', '2022-10-24 10:46:57'),
(7, 1, 'S52522', '15421.00', '2022-10-26', NULL, '2022-10-24 11:06:40', '2022-10-24 11:06:40'),
(8, 1, 'S37483', '15421.00', '2022-10-27', NULL, '2022-10-24 22:45:55', '2022-10-24 22:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_materials`
--

CREATE TABLE `purchase_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `invioce_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `total_price` decimal(8,2) DEFAULT NULL,
  `date` date NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_materials`
--

INSERT INTO `purchase_materials` (`id`, `supplier_id`, `material_id`, `invioce_number`, `price`, `total_price`, `date`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'S1212', '4242.00', '444.00', '2022-10-20', '4545', '2022-10-21 12:01:46', '2022-10-21 12:01:46'),
(2, 1, 1, 'S12142441', '4242.00', '444.00', '2022-10-20', '4545', '2022-10-21 12:04:26', '2022-10-21 12:04:26'),
(3, 3, 1, 'S1212', '4242.00', '444.00', '2022-10-20', '4545', '2022-10-21 12:04:26', '2022-10-21 12:04:26'),
(4, 3, 1, 'S1212', '4242.00', '444.00', '2022-10-20', '4545', '2022-10-21 12:12:14', '2022-10-21 12:12:14'),
(5, 3, 1, 'S1212', '4242.00', '444.00', '2022-10-19', '4545', '2022-10-21 12:13:54', '2022-10-21 12:13:54'),
(6, 3, 1, 'S1212', '4242.00', '444.00', '2022-10-13', '4545', '2022-10-21 12:14:51', '2022-10-21 12:14:51'),
(7, 3, 1, 'S1212', '4242.00', '444.00', '2022-10-27', '4545', '2022-10-21 12:18:43', '2022-10-21 12:18:43'),
(8, 5, 1, 'S31863', '10.00', '120.00', '2022-10-12', '12', '2022-10-23 04:05:43', '2022-10-23 04:05:43'),
(9, 1, 1, 'S17743', '22.00', '902.00', '2022-10-20', '41', '2022-10-23 04:19:19', '2022-10-23 04:19:19'),
(10, 1, 1, 'S89283', '10.00', '120.00', '2022-10-21', '12', '2022-10-23 04:26:11', '2022-10-23 04:26:11'),
(11, 1, 1, 'S28166', '12.00', '492.00', '2022-10-26', '41', '2022-10-23 04:41:52', '2022-10-23 04:41:52'),
(12, 1, 1, 'S81196', '1.00', '41.00', '2022-10-24', '41', '2022-10-23 11:04:42', '2022-10-23 11:04:42'),
(13, 1, 4, 'S95116', '445.00', '445.00', '2022-10-26', '1', '2022-10-24 03:35:58', '2022-10-24 03:35:58'),
(14, 2, 1, 'S36016', '10.00', '100.00', '2022-10-24', '10', '2022-10-24 04:14:09', '2022-10-24 04:14:09'),
(15, 2, 1, 'S36016', '445.00', '22250.00', '2022-10-24', '50', '2022-10-24 04:14:09', '2022-10-24 04:14:09'),
(16, 1, 1, 'S55516', '445.00', '445.00', '2022-10-27', '1', '2022-10-24 04:45:12', '2022-10-24 04:45:12'),
(17, 1, 5, 'S51926', '445.00', '2225.00', '2022-10-27', '5', '2022-10-24 04:46:52', '2022-10-24 04:46:52'),
(18, 1, 5, 'S50556', '445.00', '445.00', '2022-10-27', '1', '2022-10-24 04:48:26', '2022-10-24 04:48:26'),
(19, 1, 1, 'S92116', '445.00', '890.00', '2022-10-26', '2', '2022-10-24 04:49:37', '2022-10-24 04:49:37'),
(20, 1, 1, 'S17176', '445.00', '445.00', '2022-10-27', '1', '2022-10-24 04:50:35', '2022-10-24 04:50:35'),
(21, 1, 1, 'S56146', '445.00', '890.00', '2022-10-27', '2', '2022-10-24 04:51:30', '2022-10-24 04:51:30'),
(22, 1, 1, 'S34606', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 09:24:04', '2022-10-24 09:24:04'),
(23, 1, 1, 'S90956', '15421.00', '15421.00', '2022-10-25', '1', '2022-10-24 09:36:59', '2022-10-24 09:36:59'),
(24, 1, 1, 'S37546', '15421.00', '15421.00', '2022-10-25', '1', '2022-10-24 09:39:29', '2022-10-24 09:39:29'),
(25, 1, 1, 'S72566', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 09:48:17', '2022-10-24 09:48:17'),
(26, 1, 1, 'S64676', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 09:57:42', '2022-10-24 09:57:42'),
(27, 1, 3, 'S38766', '424.00', '424.00', '2022-10-25', '1', '2022-10-24 09:59:00', '2022-10-24 09:59:00'),
(28, 1, 3, 'S76536', '424.00', '424.00', '2022-10-26', '1', '2022-10-24 10:02:16', '2022-10-24 10:02:16'),
(29, 1, 1, 'S45546', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 10:03:43', '2022-10-24 10:03:43'),
(30, 1, 1, 'S66006', '15421.00', '30842.00', '2022-10-25', '2', '2022-10-24 10:04:17', '2022-10-24 10:04:17'),
(31, 1, 1, 'S66576', '15421.00', '30842.00', '2022-10-26', '2', '2022-10-24 10:05:06', '2022-10-24 10:05:06'),
(32, 1, 1, 'S44946', '15421.00', '30842.00', '2022-10-26', '2', '2022-10-24 10:13:39', '2022-10-24 10:13:39'),
(33, 1, 1, 'S56796', '15421.00', '30842.00', '2022-10-25', '2', '2022-10-24 10:20:27', '2022-10-24 10:20:27'),
(34, 1, 1, 'S49976', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 10:26:07', '2022-10-24 10:26:07'),
(35, 1, 3, 'S81256', '424.00', '424.00', '2022-10-26', '1', '2022-10-24 10:26:45', '2022-10-24 10:26:45'),
(36, 1, 3, 'S64776', '424.00', '8480.00', '2022-10-26', '20', '2022-10-24 10:27:22', '2022-10-24 10:27:22'),
(37, 1, 1, 'S47452', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 11:05:32', '2022-10-24 11:05:32'),
(38, 1, 1, 'S11162', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 11:06:09', '2022-10-24 11:06:09'),
(39, 1, 1, 'S52522', '15421.00', '15421.00', '2022-10-26', '1', '2022-10-24 11:06:40', '2022-10-24 11:06:40'),
(40, 1, 1, 'S37483', '15421.00', '15421.00', '2022-10-27', '1', '2022-10-24 22:45:55', '2022-10-24 22:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_stocks`
--

CREATE TABLE `raw_material_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` int(11) DEFAULT NULL,
  `stock_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raw_material_stocks`
--

INSERT INTO `raw_material_stocks` (`id`, `material_id`, `stock_quantity`, `date`, `created_at`, `updated_at`) VALUES
(24, 1, '46', '2022-10-27', '2022-10-24 04:50:35', '2022-10-25 01:08:13'),
(32, 3, '21', '2022-10-26', '2022-10-24 10:26:45', '2022-10-24 10:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KG7mZaQI2VHRHDrYfN0XDSs6QG9JGuikHn1Oq9eL', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36 Edg/106.0.1370.52', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoielYzajE4QXFVR2lqeGZWZXFwMnpZWXdJS0d3clQxVnRqY2kwNHdDRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZHVjdC9pbnZvaWNlL2xpc3QvZWRpdC8yIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFg1Nk1UUWhHUmNzbGw4OEhNWHNwbHVVRkt2Tmo5SUdpWGFiLjlIVEJ6SkdrMXUvLks4T3FxIjt9', 1666682338);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `email`, `phone`, `date`, `note`, `balance`, `created_at`, `updated_at`) VALUES
(1, 'omar', 'admin@gmail.com', '0121545245', '2022-10-25', 'degfgvdfgdfg', '0.00', '2022-10-24 09:23:36', '2022-10-24 09:23:36'),
(3, 'omar faruk', 'admin@gmail.com', '0121545246', '2022-10-26', 'bfdgfghhs', '0.00', '2022-10-24 23:24:30', '2022-10-24 23:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ridoy\'s Team', 1, '2021-12-15 05:41:16', '2021-12-15 05:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Ridoy Paul', 'admin@gmail.com', NULL, '$2y$10$X56MTQhGRcsll88HMXspluUFKvNj9IGiXab.9HTBzJGk1u/.K8Oqq', NULL, NULL, NULL, NULL, NULL, '2021-12-15 05:41:16', '2021-12-15 05:41:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_material_name_unique` (`material_name`);

--
-- Indexes for table `material_info_to_make_products`
--
ALTER TABLE `material_info_to_make_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `production_materials`
--
ALTER TABLE `production_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_to_product_outputs`
--
ALTER TABLE `production_to_product_outputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_invoices`
--
ALTER TABLE `product_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_materials`
--
ALTER TABLE `purchase_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_material_stocks`
--
ALTER TABLE `raw_material_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_info_to_make_products`
--
ALTER TABLE `material_info_to_make_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_materials`
--
ALTER TABLE `production_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `production_to_product_outputs`
--
ALTER TABLE `production_to_product_outputs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_invoices`
--
ALTER TABLE `product_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase_materials`
--
ALTER TABLE `purchase_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `raw_material_stocks`
--
ALTER TABLE `raw_material_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
