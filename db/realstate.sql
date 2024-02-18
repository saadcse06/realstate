-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 12:00 PM
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, NULL, NULL, 'admin', 'active', NULL, '$2y$12$KshRbrHIcW0DMCLcNWr/JuYXiGBDpyWpqk7q8hR7dAbxcWpJXFHTK', NULL, NULL, NULL),
(2, 'Dallas Murazik V', 'tatyana.stracke', 'earline.nicolas@example.com', 'https://via.placeholder.com/60x60.png/00ee88?text=doloribus', '+1-541-329-3268', '9445 Moen Port Suite 698\nAmelyborough, LA 96836', 'agent', 'inactive', '2024-02-15 01:24:02', '$2y$12$7nkAW7chOmInKDJ8y7./XOZq1WLV4TA54THk9ny0TLP02yHE9Fw0K', 'yhCdCA5AhR', '2024-02-15 01:24:02', '2024-02-15 01:24:02'),
(3, 'Milo Bradtke', 'prohaska.doris', 'cedrick72@example.net', 'https://via.placeholder.com/60x60.png/0099ff?text=delectus', '1-347-314-6490', '33712 Ana Passage\nOkunevahaven, HI 84212-7224', 'student', 'active', '2024-02-15 01:24:02', '$2y$12$7nkAW7chOmInKDJ8y7./XOZq1WLV4TA54THk9ny0TLP02yHE9Fw0K', 'JG9wJXHh91', '2024-02-15 01:24:02', '2024-02-15 01:24:02'),
(4, 'Mrs. Yoshiko Jast', 'tess44', 'emard.brady@example.org', 'https://via.placeholder.com/60x60.png/0022cc?text=exercitationem', '+1 (623) 828-5417', '25949 Magnus Cove Suite 273\nMaryjaneville, MA 27396', 'student', 'active', '2024-02-15 01:24:02', '$2y$12$7nkAW7chOmInKDJ8y7./XOZq1WLV4TA54THk9ny0TLP02yHE9Fw0K', 'nmSaCGLCeZ', '2024-02-15 01:24:02', '2024-02-15 01:24:02'),
(5, 'Miss Blanche Beier PhD', 'dannie08', 'granville54@example.net', 'https://via.placeholder.com/60x60.png/009933?text=accusamus', '+1.563.609.4301', '725 Mraz Heights\nEast Marlene, CA 45694', 'admin', 'active', '2024-02-15 01:24:02', '$2y$12$7nkAW7chOmInKDJ8y7./XOZq1WLV4TA54THk9ny0TLP02yHE9Fw0K', 'kWYbIVpI4N', '2024-02-15 01:24:02', '2024-02-15 01:24:02'),
(6, 'Silas Legros Sr.', 'emard.fritz', 'faustino89@example.net', 'https://via.placeholder.com/60x60.png/006688?text=odio', '(458) 545-7421', '2757 Laurence Ville Apt. 100\nRunolfsdottirside, NY 03409', 'student', 'active', '2024-02-15 01:24:02', '$2y$12$7nkAW7chOmInKDJ8y7./XOZq1WLV4TA54THk9ny0TLP02yHE9Fw0K', 'QO76ynyPzj', '2024-02-15 01:24:02', '2024-02-15 01:24:02'),
(7, 'Student', NULL, 'student@gmail.com', NULL, NULL, NULL, 'user', 'active', NULL, '$2y$12$l2vn/mDKGeZAvGeomuUVfuZUZLgCJ/c.SWSSdQ2znBgeRxu4tkG72', NULL, '2024-02-15 01:31:26', '2024-02-15 01:31:26'),
(8, 'Agent', NULL, 'agent@gmail.com', NULL, NULL, NULL, 'agent', 'active', NULL, '$2y$12$u.c63LrTRyQgXG0kD0y40.7wnCBSfYXteTSAZopqNRkQGVxFiPYTi', NULL, '2024-02-15 02:27:59', '2024-02-15 02:27:59');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
