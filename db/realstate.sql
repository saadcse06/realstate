-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 02:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realstate`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amenitis_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenitis_name`, `created_at`, `updated_at`) VALUES
(3, 'Air Condition', '2024-02-22 11:03:44', '2024-02-22 11:03:44'),
(4, 'Car', '2024-02-22 11:04:36', '2024-02-22 11:04:36'),
(5, 'Kitchen Hood', '2024-02-22 11:04:48', '2024-02-22 11:04:48'),
(6, 'Air Cooler', '2024-02-22 11:04:56', '2024-02-22 11:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'Property Type', '2024-02-21 00:05:18', '2024-02-21 00:14:15'),
(3, 'Amenities', '2024-02-21 00:05:43', '2024-02-21 00:05:43'),
(7, 'Role', '2024-03-02 02:45:50', '2024-03-02 02:45:50'),
(8, 'Permission', '2024-03-02 02:46:39', '2024-03-02 02:46:39'),
(9, 'Group', '2024-03-02 02:46:52', '2024-03-02 02:46:52'),
(10, 'User', '2024-03-02 02:47:01', '2024-03-02 02:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_17_044143_create_property_types_table', 2),
(6, '2024_02_18_085330_create_amenities_table', 3),
(7, '2024_02_20_093053_create_permission_tables', 3),
(8, '2024_02_21_050621_create_groups_table', 4),
(9, '2024_03_03_054350_create_cache_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 12),
(7, 'App\\Models\\User', 17),
(8, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'type.type_list', 'web', 'Property Type', '2024-02-21 00:35:30', '2024-03-02 10:19:58'),
(2, 'type.type_add', 'web', 'Property Type', '2024-02-21 00:36:38', '2024-03-02 10:19:47'),
(3, 'type.edit', 'web', 'Property Type', '2024-02-21 00:36:49', '2024-02-21 00:36:49'),
(4, 'type.store', 'web', 'Property Type', '2024-02-21 00:37:04', '2024-02-21 00:37:04'),
(5, 'type.update', 'web', 'Property Type', '2024-02-21 00:37:55', '2024-02-21 00:37:55'),
(6, 'type.destroy', 'web', 'Property Type', '2024-02-21 00:38:05', '2024-02-21 00:38:05'),
(15, 'amenity.amenity_list', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-03-02 10:22:20'),
(16, 'amenity.create', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-02-22 09:05:15'),
(17, 'amenity.edit', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-02-22 09:05:15'),
(18, 'amenity.store', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-02-22 09:05:15'),
(19, 'amenity.update', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-02-22 09:05:15'),
(20, 'amenity.destroy', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-02-22 09:05:15'),
(21, 'type.menu', 'web', 'Property Type', '2024-02-24 10:43:13', '2024-02-24 10:43:13'),
(22, 'amenity.menu', 'web', 'Amenities', '2024-02-24 10:43:40', '2024-02-24 10:43:40'),
(23, 'role.menu', 'web', 'Role', '2024-03-02 02:49:03', '2024-03-02 02:49:03'),
(24, 'role.role_list', 'web', 'Role', '2024-03-02 02:49:22', '2024-03-02 10:20:22'),
(25, 'role.role_add', 'web', 'Role', '2024-03-02 02:52:12', '2024-03-02 10:24:32'),
(26, 'role.store', 'web', 'Role', '2024-03-02 02:52:37', '2024-03-02 02:52:37'),
(27, 'role.edit', 'web', 'Role', '2024-03-02 02:52:55', '2024-03-02 02:52:55'),
(28, 'role.update', 'web', 'Role', '2024-03-02 02:53:09', '2024-03-02 02:53:09'),
(29, 'role.destroy', 'web', 'Role', '2024-03-02 02:53:23', '2024-03-02 02:53:23'),
(30, 'all.role.permission', 'web', 'Role', '2024-03-02 02:54:02', '2024-03-02 02:54:02'),
(31, 'role.add.permission', 'web', 'Role', '2024-03-02 02:54:13', '2024-03-02 02:54:13'),
(32, 'role.permission.store', 'web', 'Role', '2024-03-02 02:54:24', '2024-03-02 02:54:24'),
(33, 'edit.role.permission', 'web', 'Role', '2024-03-02 02:54:47', '2024-03-02 02:54:47'),
(34, 'update.role.permission', 'web', 'Role', '2024-03-02 02:55:08', '2024-03-02 02:55:08'),
(35, 'destroy.role.permission', 'web', 'Role', '2024-03-02 02:55:20', '2024-03-02 02:55:20'),
(36, 'permission.menu', 'web', 'Permission', '2024-03-02 02:56:20', '2024-03-02 02:56:20'),
(37, 'permission.permission_list', 'web', 'Permission', '2024-03-02 02:56:26', '2024-03-02 10:20:50'),
(38, 'permission.permission_add', 'web', 'Permission', '2024-03-02 02:56:52', '2024-03-02 10:24:06'),
(39, 'permission.store', 'web', 'Permission', '2024-03-02 02:57:03', '2024-03-02 02:57:03'),
(40, 'permission.edit', 'web', 'Permission', '2024-03-02 02:57:16', '2024-03-02 02:57:16'),
(41, 'permission.update', 'web', 'Permission', '2024-03-02 02:57:29', '2024-03-02 02:57:29'),
(42, 'permission.destroy', 'web', 'Permission', '2024-03-02 02:57:39', '2024-03-02 02:57:39'),
(43, 'permission.import', 'web', 'Permission', '2024-03-02 02:57:51', '2024-03-02 02:57:51'),
(44, 'permission.store_import_data', 'web', 'Permission', '2024-03-02 02:58:04', '2024-03-02 02:58:04'),
(45, 'permission.export', 'web', 'Permission', '2024-03-02 02:58:17', '2024-03-02 02:58:17'),
(46, 'permission.download', 'web', 'Permission', '2024-03-02 02:58:41', '2024-03-02 02:58:41'),
(47, 'group.menu', 'web', 'Group', '2024-03-02 02:59:30', '2024-03-02 02:59:30'),
(48, 'group.group_list', 'web', 'Group', '2024-03-02 02:59:40', '2024-03-02 10:21:07'),
(49, 'group.group_add', 'web', 'Group', '2024-03-02 03:01:46', '2024-03-02 10:23:47'),
(50, 'group.store', 'web', 'Group', '2024-03-02 03:02:10', '2024-03-02 03:02:10'),
(51, 'group.edit', 'web', 'Group', '2024-03-02 03:02:31', '2024-03-02 03:02:31'),
(52, 'group.update', 'web', 'Group', '2024-03-02 03:03:01', '2024-03-02 03:03:01'),
(53, 'group.destroy', 'web', 'Group', '2024-03-02 03:03:20', '2024-03-02 03:03:20'),
(54, 'admin.menu', 'web', 'User', '2024-03-02 03:03:49', '2024-03-02 03:04:05'),
(55, 'admin.admin_list', 'web', 'User', '2024-03-02 03:04:12', '2024-03-02 10:21:49'),
(56, 'admin.admin_add', 'web', 'User', '2024-03-02 03:04:28', '2024-03-02 10:22:50'),
(57, 'admin.store', 'web', 'User', '2024-03-02 03:04:40', '2024-03-02 03:04:40'),
(58, 'admin.edit', 'web', 'User', '2024-03-02 03:04:52', '2024-03-02 03:04:52'),
(59, 'admin.destroy', 'web', 'User', '2024-03-02 03:05:03', '2024-03-02 03:05:03'),
(60, 'admin.update', 'web', 'User', '2024-03-02 03:05:13', '2024-03-02 03:05:13'),
(61, 'permission.permission_pdf_download', 'web', 'Permission', '2024-03-09 06:46:50', '2024-03-09 06:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `type_name`, `type_icon`, `created_at`, `updated_at`) VALUES
(1, 'Appartment', 'icon-1', '2024-02-17 02:12:12', '2024-02-17 02:12:12'),
(2, 'Office', 'Icon-2', '2024-02-17 03:02:52', '2024-02-17 03:02:52'),
(3, 'Floor', 'icon-3', '2024-02-18 03:03:19', '2024-02-17 03:03:19'),
(4, 'Duplex', 'icon-4', '2024-02-18 03:03:46', '2024-02-17 03:03:46'),
(5, 'Hostel', 'Icon-5', '2024-03-08 04:08:53', '2024-03-09 04:08:53'),
(6, 'Ladies Hotel', 'Icon-6', '2024-03-09 04:10:38', '2024-03-09 04:10:38'),
(7, 'Teachers Quarter', 'Icon-7', '2024-03-09 04:11:27', '2024-03-09 04:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Employee', 'web', '2024-02-22 10:57:27', '2024-03-02 03:11:57'),
(7, 'Admin', 'web', '2024-03-02 03:20:18', '2024-03-02 03:20:18'),
(8, 'Superadmin', 'web', '2024-03-02 05:27:12', '2024-03-02 05:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 7),
(1, 8),
(2, 2),
(2, 7),
(2, 8),
(3, 7),
(3, 8),
(4, 2),
(4, 7),
(4, 8),
(5, 7),
(5, 8),
(6, 7),
(6, 8),
(15, 2),
(15, 7),
(15, 8),
(16, 2),
(16, 7),
(16, 8),
(17, 7),
(17, 8),
(18, 2),
(18, 7),
(18, 8),
(19, 7),
(19, 8),
(20, 7),
(20, 8),
(21, 2),
(21, 7),
(21, 8),
(22, 2),
(22, 7),
(22, 8),
(23, 8),
(24, 8),
(25, 8),
(26, 8),
(27, 8),
(28, 8),
(29, 8),
(30, 8),
(31, 8),
(32, 8),
(33, 8),
(34, 8),
(35, 8),
(36, 8),
(37, 8),
(38, 8),
(39, 8),
(40, 8),
(41, 8),
(42, 8),
(43, 8),
(44, 8),
(45, 8),
(46, 8),
(47, 7),
(47, 8),
(48, 7),
(48, 8),
(49, 7),
(49, 8),
(50, 7),
(50, 8),
(51, 7),
(51, 8),
(52, 7),
(52, 8),
(53, 7),
(53, 8),
(54, 8),
(55, 8),
(56, 8),
(57, 8),
(58, 8),
(59, 8),
(60, 8),
(61, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('superadmin','admin','user','employee') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `photo`, `phone`, `address`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', 'admin@gmail.com', '/upload/admin_img/1791474201011629.jpg', '01723207577', 'SB', 'admin', 'active', NULL, '$2y$12$Y7DZk09fIA2DM/riotb2c.RK6s1sD8TNEQTwrgN2MqULma/V1ON/K', NULL, NULL, '2024-03-02 05:52:10'),
(7, 'User', NULL, 'user@gmail.com', NULL, NULL, NULL, 'user', 'active', NULL, '$2y$12$1UabmXGcASbLdAXQroJ5tuvJpGVUL7v/1Ai.rqx84/oH5Bg.nY1vK', NULL, '2024-02-15 07:14:36', '2024-02-15 07:14:36'),
(12, 'Saad', 'Saad', 'saad@gmail.com', '/upload/admin_img/1791799938419665.jpg', '018708393402', 'Dhaka', 'admin', 'active', NULL, '$2y$12$5DNwiva8zBzA522aU17qYeNOFgqCvWHGXEqSphWCOfl6uZPbRQj8C', NULL, '2024-02-24 04:35:18', '2024-02-24 10:53:01'),
(17, 'Office Admin', 'office-admin', 'ad@gmail.com', NULL, '0153207577', 'Dhaka', 'admin', 'active', NULL, '$2y$12$w4gbSqAhtupL9T8ZqVqNmekqP3Dq.iFxzOikb0lNmsk8140Nfw3ZC', NULL, '2024-03-02 05:30:55', '2024-03-02 06:35:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
