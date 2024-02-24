-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 06:51 PM
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
(2, 'State', '2024-02-21 00:05:34', '2024-02-21 00:05:34'),
(3, 'Amenities', '2024-02-21 00:05:43', '2024-02-21 00:05:43'),
(4, 'Property', '2024-02-21 00:06:09', '2024-02-21 00:06:09'),
(5, 'Property Message', '2024-02-21 00:06:20', '2024-02-21 00:06:20');

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
(8, '2024_02_21_050621_create_groups_table', 4);

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
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 14),
(4, 'App\\Models\\User', 12);

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
(1, 'type.list', 'web', 'Property Type', '2024-02-21 00:35:30', '2024-02-21 01:02:03'),
(2, 'type.add', 'web', 'Property Type', '2024-02-21 00:36:38', '2024-02-21 00:36:38'),
(3, 'type.edit', 'web', 'Property Type', '2024-02-21 00:36:49', '2024-02-21 00:36:49'),
(4, 'type.store', 'web', 'Property Type', '2024-02-21 00:37:04', '2024-02-21 00:37:04'),
(5, 'type.update', 'web', 'Property Type', '2024-02-21 00:37:55', '2024-02-21 00:37:55'),
(6, 'type.destroy', 'web', 'Property Type', '2024-02-21 00:38:05', '2024-02-21 00:38:05'),
(15, 'amenity.list', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-02-22 09:05:15'),
(16, 'amenity.add', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-02-22 09:05:15'),
(17, 'amenity.edit', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-02-22 09:05:15'),
(18, 'amenity.store', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-02-22 09:05:15'),
(19, 'amenity.update', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-02-22 09:05:15'),
(20, 'amenity.destroy', 'web', 'Amenities', '2024-02-22 09:05:15', '2024-02-22 09:05:15'),
(21, 'type.menu', 'web', 'Property Type', '2024-02-24 10:43:13', '2024-02-24 10:43:13'),
(22, 'amenity.menu', 'web', 'Amenities', '2024-02-24 10:43:40', '2024-02-24 10:43:40');

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
(3, 'Floor', 'icon-3', '2024-02-17 03:03:19', '2024-02-17 03:03:19'),
(4, 'Duplex', 'icon-4', '2024-02-17 03:03:46', '2024-02-17 03:03:46');

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
(1, 'Superadmin', 'web', '2024-02-22 10:57:07', '2024-02-22 10:57:20'),
(2, 'Manager', 'web', '2024-02-22 10:57:27', '2024-02-22 10:57:27'),
(3, 'Admin', 'web', '2024-02-22 10:57:42', '2024-02-22 10:57:42'),
(4, 'Sales', 'web', '2024-02-22 10:57:53', '2024-02-22 10:57:53');

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
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 3),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 3),
(21, 1),
(21, 4),
(22, 1),
(22, 4);

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
  `role` enum('admin','student','user','agent') NOT NULL DEFAULT 'user',
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
(1, 'Admin', 'admin', 'admin@gmail.com', '/upload/admin_img/1791474201011629.jpg', '01723207577', 'SB', 'admin', 'active', NULL, '$2y$12$Y7DZk09fIA2DM/riotb2c.RK6s1sD8TNEQTwrgN2MqULma/V1ON/K', NULL, NULL, '2024-02-20 20:35:34'),
(2, 'Delilah Daniel', 'alessandra.gusikowski', 'trent41@example.net', 'https://via.placeholder.com/60x60.png/002288?text=nesciunt', '+1-774-701-2799', '99696 Anna Plains\nAlanisfurt, NY 04214-2873', 'user', 'inactive', '2024-02-15 07:13:51', '$2y$12$mdubyhJEv1uHORqe160KyOwh0M9w62GchMBTQwaYqGmJKDt/0xVcm', 'EI1LkGbw8y', '2024-02-15 07:13:51', '2024-02-15 07:13:51'),
(4, 'Elmore Waelchi', 'bkassulke', 'jacobi.helen@example.com', 'https://via.placeholder.com/60x60.png/00cc22?text=optio', '774.810.8701', '390 Meghan Prairie Apt. 971\nNew Medabury, MD 75073-5900', 'agent', 'active', '2024-02-15 07:13:51', '$2y$12$mdubyhJEv1uHORqe160KyOwh0M9w62GchMBTQwaYqGmJKDt/0xVcm', 'be9lyt2asG', '2024-02-15 07:13:51', '2024-02-15 07:13:51'),
(5, 'Malcolm Ebert', 'schuster.maegan', 'delfina73@example.com', 'https://via.placeholder.com/60x60.png/00bb44?text=natus', '+1-773-814-5081', '955 Tremaine Mountains Suite 338\nTurnerbury, SC 09091-5536', 'student', 'active', '2024-02-15 07:13:51', '$2y$12$mdubyhJEv1uHORqe160KyOwh0M9w62GchMBTQwaYqGmJKDt/0xVcm', '5Vvfwl8lOy', '2024-02-15 07:13:51', '2024-02-15 07:13:51'),
(6, 'Dedric Jacobs', 'heber49', 'mayer.vance@example.com', 'https://via.placeholder.com/60x60.png/00ccff?text=harum', '+16829782172', '815 Isobel Ways\nOletastad, HI 13802-3804', 'user', 'inactive', '2024-02-15 07:13:51', '$2y$12$mdubyhJEv1uHORqe160KyOwh0M9w62GchMBTQwaYqGmJKDt/0xVcm', 'hzbsoPgGEr', '2024-02-15 07:13:51', '2024-02-15 07:13:51'),
(7, 'User', NULL, 'user@gmail.com', NULL, NULL, NULL, 'user', 'active', NULL, '$2y$12$1UabmXGcASbLdAXQroJ5tuvJpGVUL7v/1Ai.rqx84/oH5Bg.nY1vK', NULL, '2024-02-15 07:14:36', '2024-02-15 07:14:36'),
(8, 'Agent', NULL, 'agent@gmail.com', NULL, NULL, NULL, 'agent', 'active', NULL, '$2y$12$U74yosumf1.bbPK1/GWfWORXKvwBSw3CZbOrJDRpIfKP3SqKtL7/S', NULL, '2024-02-15 07:15:29', '2024-02-15 07:15:29'),
(12, 'Saad', 'Saad', 'saad@gmail.com', '/upload/admin_img/1791799938419665.jpg', '018708393402', 'Dhaka', 'admin', 'active', NULL, '$2y$12$5DNwiva8zBzA522aU17qYeNOFgqCvWHGXEqSphWCOfl6uZPbRQj8C', NULL, '2024-02-24 04:35:18', '2024-02-24 10:53:01'),
(14, 'Manager', 'manager', 'siam@gmail.com', NULL, '01589634581', 'Dhaka', 'admin', 'active', NULL, '$2y$12$CnOn3TAzhvXuNqSfhjnDV.qmg1hcwmTOpoQAHcKSH6wHXldl6Fc3.', NULL, '2024-02-24 10:28:50', '2024-02-24 10:28:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
