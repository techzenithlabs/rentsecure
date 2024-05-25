-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2024 at 06:30 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentsecure`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('1b6453892473a467d07372d45eb05abc2031647a', 'i:1;', 1716655964),
('1b6453892473a467d07372d45eb05abc2031647a:timer', 'i:1716655964;', 1716655964),
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:1;', 1716655720),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1716655720;', 1716655720),
('da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1716655306),
('da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1716655306;', 1716655306);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso`, `created_at`, `updated_at`) VALUES
(1, 'United States', 'US', NULL, NULL),
(2, 'India', 'IN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_05_121243_add_columns_users', 2),
(5, '2024_05_05_122007_rename_columns_name', 3),
(6, '2024_05_05_123912_create_user__documents_table', 4),
(7, '2024_05_05_124814_default_column_is_verified', 5),
(8, '2024_05_05_125121_create_roles_table', 6),
(9, '2024_05_05_125325_add_role_id_to_users_table', 7),
(10, '2024_05_05_143241_add_status_users', 8),
(11, '2024_05_05_145714_increase_zipcode_length_in_users_table', 9),
(12, '2024_05_17_185526_add_email_verification_to_users_table', 10),
(13, '2024_05_19_094422_create_countries_table', 11),
(14, '2024_05_19_094434_create_states_table', 11),
(15, '2024_05_19_110741_add_country', 12),
(16, '2024_05_19_110917_add_country', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', '2024-05-05 07:39:10', '2024-05-05 07:39:10'),
(2, 'Landlord', '2024-05-05 07:39:10', '2024-05-05 07:39:10'),
(3, 'Tenant', '2024-05-05 07:39:10', '2024-05-05 07:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2MhU7A1RfODwQlDgro4OdW2IP8OvuA1vqCxc02if', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicXM2c0tvOGZwWkdJZldpMk9Lc0dTZzRqRTg5dDNpVTF4T3BoU3FFMCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxNzc6Imh0dHA6Ly9sb2NhbGhvc3QvcmVudHNlY3VyZS92ZXJpZnktZW1haWwvNC8yOGNlMjNmODExYjQ5YTNmOGY2MGQ4YWE1YjUyNTMwMWRiYjg4ODQ1P2V4cGlyZXM9MTcxNjY1OTQ2NSZzaWduYXR1cmU9MDZhNGQxOGJjNmJlZWUwNWNmOWU1MzBiZGU3YjdjNDk3ZDUyZjU1NDRiNTU4MDYzOGMyYWE0MTkxZmVjZmEwMiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vbG9jYWxob3N0L3JlbnRzZWN1cmUvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716655884),
('9CF1LSLcJ3wW5kJn83yaTaN50oikH1R9zLqsWvZi', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieEo5TEZ2cHQ5VU9IQ2w5UExWNXB4NGQ0cnZXbDVvemdGQ3FuSjQ5MyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3QvcmVudHNlY3VyZS9zY3JlZW5pbmcvbGFuZGxvcmQiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1716661567);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alabama', NULL, NULL),
(2, 1, 'Alaska', NULL, NULL),
(3, 1, 'Arizona', NULL, NULL),
(4, 1, 'Arkansas', NULL, NULL),
(5, 1, 'California', NULL, NULL),
(6, 1, 'Colorado', NULL, NULL),
(7, 1, 'Connecticut', NULL, NULL),
(8, 1, 'Delaware', NULL, NULL),
(9, 1, 'Florida', NULL, NULL),
(10, 1, 'Georgia', NULL, NULL),
(11, 1, 'Hawaii', NULL, NULL),
(12, 1, 'Idaho', NULL, NULL),
(13, 1, 'Illinois', NULL, NULL),
(14, 1, 'Indiana', NULL, NULL),
(15, 1, 'Iowa', NULL, NULL),
(16, 1, 'Kansas', NULL, NULL),
(17, 1, 'Kentucky', NULL, NULL),
(18, 1, 'Louisiana', NULL, NULL),
(19, 1, 'Maine', NULL, NULL),
(20, 1, 'Maryland', NULL, NULL),
(21, 1, 'Massachusetts', NULL, NULL),
(22, 1, 'Michigan', NULL, NULL),
(23, 1, 'Minnesota', NULL, NULL),
(24, 1, 'Mississippi', NULL, NULL),
(25, 1, 'Missouri', NULL, NULL),
(26, 1, 'Montana', NULL, NULL),
(27, 1, 'Nebraska', NULL, NULL),
(28, 1, 'Nevada', NULL, NULL),
(29, 1, 'New Hampshire', NULL, NULL),
(30, 1, 'New Jersey', NULL, NULL),
(31, 1, 'New Mexico', NULL, NULL),
(32, 1, 'New York', NULL, NULL),
(33, 1, 'North Carolina', NULL, NULL),
(34, 1, 'North Dakota', NULL, NULL),
(35, 1, 'Ohio', NULL, NULL),
(36, 1, 'Oklahoma', NULL, NULL),
(37, 1, 'Oregon', NULL, NULL),
(38, 1, 'Pennsylvania', NULL, NULL),
(39, 1, 'Rhode Island', NULL, NULL),
(40, 1, 'South Carolina', NULL, NULL),
(41, 1, 'South Dakota', NULL, NULL),
(42, 1, 'Tennessee', NULL, NULL),
(43, 1, 'Texas', NULL, NULL),
(44, 1, 'Utah', NULL, NULL),
(45, 1, 'Vermont', NULL, NULL),
(46, 1, 'Virginia', NULL, NULL),
(47, 1, 'Washington', NULL, NULL),
(48, 1, 'West Virginia', NULL, NULL),
(49, 1, 'Wisconsin', NULL, NULL),
(50, 1, 'Wyoming', NULL, NULL),
(51, 2, 'Andhra Pradesh', NULL, NULL),
(52, 2, 'Arunachal Pradesh', NULL, NULL),
(53, 2, 'Assam', NULL, NULL),
(54, 2, 'Bihar', NULL, NULL),
(55, 2, 'Chhattisgarh', NULL, NULL),
(56, 2, 'Goa', NULL, NULL),
(57, 2, 'Gujarat', NULL, NULL),
(58, 2, 'Haryana', NULL, NULL),
(59, 2, 'Himachal Pradesh', NULL, NULL),
(60, 2, 'Jharkhand', NULL, NULL),
(61, 2, 'Karnataka', NULL, NULL),
(62, 2, 'Kerala', NULL, NULL),
(63, 2, 'Madhya Pradesh', NULL, NULL),
(64, 2, 'Maharashtra', NULL, NULL),
(65, 2, 'Manipur', NULL, NULL),
(66, 2, 'Meghalaya', NULL, NULL),
(67, 2, 'Mizoram', NULL, NULL),
(68, 2, 'Nagaland', NULL, NULL),
(69, 2, 'Odisha', NULL, NULL),
(70, 2, 'Punjab', NULL, NULL),
(71, 2, 'Rajasthan', NULL, NULL),
(72, 2, 'Sikkim', NULL, NULL),
(73, 2, 'Tamil Nadu', NULL, NULL),
(74, 2, 'Telangana', NULL, NULL),
(75, 2, 'Tripura', NULL, NULL),
(76, 2, 'Uttar Pradesh', NULL, NULL),
(77, 2, 'Uttarakhand', NULL, NULL),
(78, 2, 'West Bengal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` text COLLATE utf8mb4_unicode_ci,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `role_id`, `email`, `email_verified_at`, `verification_token`, `phone`, `password`, `company`, `country`, `street_address`, `city`, `state`, `zipcode`, `remember_token`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'Admin', 1, 'superadmin@yopmail.com', '2024-05-24 18:21:42', NULL, NULL, '$2y$12$BG9BfRKWSwaVru0E2REjLe9KzI4UH.DXAM.2vtsUfBLcsjrMAGPKm', NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, '2024-05-24 18:21:42', '2024-05-24 13:02:15'),
(2, 'Yogesh', 'Raghav', 2, 'yogeshraghav3043@gmail.com', '2024-05-25 11:10:46', NULL, '09717797354', '$2y$12$Hf1fExtCZAsKHTvvpyJg5..sZu4NyHHQ/9OIaaMe8UvZM6LM1baDG', NULL, '2', 'Village Sehjawas, Sehjawas 85, Po', 'Gurgan', '52', '23333', NULL, 0, 0, '2024-05-25 11:08:51', '2024-05-25 11:10:46'),
(3, 'Neeraj', 'Raj', 2, 'neerajrai@yopmail.com', '2024-05-25 11:17:40', NULL, '45445454545', '$2y$12$OFefVs7Kmet4F8.2JjR7KO89317nc3hA75NGZyUK9HQjUtKe6.nx2', NULL, '2', 'store 102, near jeevan hospital,po: Rithoj,landmark: chicken farm', 'Gurgaon', '54', '122103', NULL, 0, 0, '2024-05-25 11:17:16', '2024-05-25 11:17:40'),
(4, 'Rahul', 'Tomar', 2, 'rahultomar@yopmail.com', '2024-05-25 11:21:44', NULL, '34343434343', '$2y$12$WDfmZ7VY2eRV.LzowhH0lukcx3buv801GDBTiwl/4xmoq0UtIqLbS', NULL, '2', 'Village Sehjawas, Sehjawas 85, Po', 'Aruna', '52', '232233', NULL, 0, 0, '2024-05-25 11:21:05', '2024-05-25 11:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `document_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` text COLLATE utf8mb4_unicode_ci,
  `expiry_date` date DEFAULT NULL,
  `is_verified` tinyint NOT NULL DEFAULT '0' COMMENT '0 for not verified, 1 for verified',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_documents`
--

INSERT INTO `user_documents` (`id`, `user_id`, `document_type`, `documents`, `expiry_date`, `is_verified`, `created_at`, `updated_at`) VALUES
(17, 2, 'application/pdf', 'public/document_uploaded/zk6WsLud55JFSSErnXyrutyXs0elmFJLkefos1ha.pdf', NULL, 0, '2024-05-25 11:08:59', '2024-05-25 11:08:59'),
(18, 3, 'application/pdf', 'public/document_uploaded/Zbel9WZEvjQI1xaLDP26bJdYaw8CPzMIvKlkzbk5.pdf', NULL, 0, '2024-05-25 11:17:21', '2024-05-25 11:17:21'),
(19, 4, 'application/pdf', 'public/document_uploaded/XT0sG15ZDZiABUlGNhiE5ROESTIUSt4ikjZtQXNA.pdf', NULL, 0, '2024-05-25 11:21:09', '2024-05-25 11:21:09');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_documents_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD CONSTRAINT `user_documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
