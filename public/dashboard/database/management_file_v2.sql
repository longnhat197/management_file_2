-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 02:33 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management_file`
--

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

CREATE TABLE `contractors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contractors`
--

INSERT INTO `contractors` (`id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'ANSV', 'Hà Đông - Hà Nội', '0988866286', 'nhathau1@gmail.com', '2022-09-29 07:32:39', '2022-11-02 03:03:33'),
(2, 'VNPT IT', 'Cầu Giấy - Hà Nội', '0928268682', 'nhathau2@gmail.com', '2022-09-30 02:46:04', '2022-11-02 03:03:09'),
(3, 'VNPT Net', 'Hoàng Quốc Việt', '0943657910', 'net@net.com.vn', '2022-11-02 02:24:02', '2022-11-02 02:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_goi_thau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_du_an` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_thong_bao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_moi_thau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_thuc_thau` int(11) NOT NULL,
  `hinh_thuc_tham_du` int(11) NOT NULL,
  `uy_quyen` int(11) NOT NULL,
  `time_phat_hanh` date NOT NULL,
  `time_mo_thau` datetime NOT NULL,
  `time_dong_thau` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_temps`
--

CREATE TABLE `detail_temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detail_id` int(11) NOT NULL,
  `tem_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contractor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `contractor_id`, `created_at`, `updated_at`) VALUES
(1, 'Báo cáo thành tích cá nhân', 1, '2022-09-29 08:19:46', '2022-09-29 08:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `file_paths`
--

CREATE TABLE `file_paths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `file_paths`
--

INSERT INTO `file_paths` (`id`, `file_id`, `path`, `created_at`, `updated_at`) VALUES
(2, 1, 'bao-cao-tuan-34-thang-8-nam-20222_63356103ec041_220929_041027.xlsx', '2022-09-29 09:10:27', '2022-09-29 09:10:27'),
(3, 1, 'kpi-monthly_6335641bf152b_220929_042339.XLSX', '2022-09-29 09:23:39', '2022-09-29 09:23:39'),
(9, 1, 'vien-thong-export-hieutx_6336968575424_220930_021101.xlsx', '2022-09-30 07:11:01', '2022-09-30 07:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `list_users`
--

CREATE TABLE `list_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(6, '2022_09_22_085428_add_path_to_files_table', 2),
(8, '2014_10_12_000000_create_users_table', 3),
(9, '2014_10_12_100000_create_password_resets_table', 3),
(10, '2019_08_19_000000_create_failed_jobs_table', 3),
(11, '2022_09_22_031855_create_contractors_table', 3),
(12, '2022_09_22_031923_create_files_table', 3),
(13, '2022_09_29_094909_create_file_paths_table', 3),
(25, '2022_11_01_105314_create_projects_table', 4),
(26, '2022_11_01_153610_create_customers_table', 4),
(27, '2022_11_02_151938_add_address_to_customers_table', 4),
(28, '2022_11_02_152342_create_packages_table', 4),
(29, '2022_11_03_160122_create_list_users_table', 4),
(30, '2022_11_03_162640_add_type_to_list_users_table', 4),
(31, '2022_11_14_092913_create_details_table', 4),
(32, '2022_11_16_143521_create_templates0_table', 4),
(33, '2022_11_16_143653_create_templates1_table', 4),
(34, '2022_11_17_105453_create_detail_temps_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates0`
--

CREATE TABLE `templates0` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates0`
--

INSERT INTO `templates0` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Mẫu 01. ĐƠN DỰ THẦU (thuộc HSĐXKT)', './template/1', NULL, NULL),
(2, 'Mẫu 02. GIẤY ỦY QUYỀN', './template/2', NULL, NULL),
(3, 'Mẫu 04 (a). BẢO LÃNH DỰ THẦU', './template/4', NULL, NULL),
(4, 'Mẫu 05 (a). BẢN KÊ KHAI THÔNG TIN VỀ NHÀ THẦU', './template/5', NULL, NULL),
(5, 'Mẫu 06. HỢP ĐỒNG KHÔNG HOÀN THÀNH TRONG QUÁ KHỨ DO LỖI CỦA NHÀ THẦU', './template/6', NULL, NULL),
(6, 'Mẫu 07. KIỆN TỤNG ĐANG GIẢI QUYẾT', './template/7', NULL, NULL),
(7, 'Mẫu 08. HỢP ĐỒNG TƯƠNG TỰ DO NHÀ THẦU THỰC HIỆN', './template/8', NULL, NULL),
(8, 'Mẫu 09. TÌNH HÌNH TÀI CHÍNH CỦA NHÀ THẦU', './template/9', NULL, NULL),
(9, 'Mẫu 10. NGUỒN LỰC TÀI CHÍNH', './template/10', NULL, NULL),
(10, 'Mẫu 11. NGUỒN LỰC TÀI CHÍNH HÀNG THÁNG CHO CÁC HỢP ĐỒNG ĐANG THỰC HIỆN', './template/11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `templates1`
--

CREATE TABLE `templates1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$5uO1Qst3d4tlEWx/BbhTRecdTgLc9DmckHx4zkif1T1FJUHTedXCa', 'cMTm24oCt4W9ZkazPTDXf88yhOs3e367jvvjx0nsCQKJWiPOzJrdELM5kBnF', NULL, NULL),
(2, 'user1', 'buiductien@ansv.vn', NULL, '$2y$10$oPJTc.VaXUlX1/6evpGJp.EGuQdhDxYD5xb0anjdMVJ3cLxx4.8WC', NULL, NULL, '2022-11-15 07:08:15'),
(5, NULL, 'nguyenvanceo@ansv.vn', NULL, '$2y$10$fQYaU911GdUTS6LUkjUN.ubezL6jtLG9c.1FsKhCzUdJM5mwcVoL2', NULL, '2022-11-15 07:17:21', '2022-11-15 07:17:21'),
(6, NULL, 'levanthanh@ansv.vn', NULL, '$2y$10$2gsLSXFexVVKxRqMfUTAg.LfayAkY37dXxsjRAqzewnEjtNked/p6', NULL, '2022-11-15 07:44:18', '2022-11-15 07:44:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_temps`
--
ALTER TABLE `detail_temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_paths`
--
ALTER TABLE `file_paths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_users`
--
ALTER TABLE `list_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates0`
--
ALTER TABLE `templates0`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates1`
--
ALTER TABLE `templates1`
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
-- AUTO_INCREMENT for table `contractors`
--
ALTER TABLE `contractors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_temps`
--
ALTER TABLE `detail_temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `file_paths`
--
ALTER TABLE `file_paths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `list_users`
--
ALTER TABLE `list_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates0`
--
ALTER TABLE `templates0`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `templates1`
--
ALTER TABLE `templates1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
