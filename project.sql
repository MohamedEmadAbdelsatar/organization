-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 02:25 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `governorate_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guaranator_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guaranator_city_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guaranator_governorate_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guaranator_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guaranator_national_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guaranator_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `guaranator_job` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `name`, `city_id`, `governorate_id`, `phone`, `national_id`, `location`, `job`, `guaranator_name`, `guaranator_city_id`, `guaranator_governorate_id`, `guaranator_phone`, `guaranator_national_id`, `guaranator_location`, `guaranator_job`, `created_at`, `updated_at`) VALUES
(1, 'محمد', '1', '1', '21655613419', '0123456', 'شبرا', 'مهندس', 'أحمد', '3', '1', '01003621629', '1515151', 'رمسيس', 'مدرس', '2021-07-07 09:47:35', '2021-07-07 09:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `governorate_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `governorate_id`, `created_at`, `updated_at`) VALUES
(1, 'شبرا', '1', '2021-07-06 12:28:55', '2021-07-06 12:28:55'),
(2, '6أكتوبر', '2', NULL, NULL),
(3, 'رمسيس', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', '2021-07-06 12:08:49', '2021-07-06 12:08:49'),
(2, 'الجيزة', NULL, NULL),
(3, 'الإسكندرية', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `borrower_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `earn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `installment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remaining` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_paid` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `borrower_id`, `value`, `earn`, `installment`, `start`, `end`, `created_at`, `updated_at`, `remaining`, `start_year`, `end_year`, `total`, `total_paid`, `status`) VALUES
(7, '1', '1000', '16', '96.67', '5', '4', '2021-07-10 12:57:19', '2021-07-10 13:07:08', '1063.33', '2021', '2022', '1160.00', '96.67', '0');

-- --------------------------------------------------------

--
-- Table structure for table `loans_months`
--

CREATE TABLE `loans_months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `index` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `late` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `month_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `borrower_id` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans_months`
--

INSERT INTO `loans_months` (`id`, `index`, `year`, `value`, `loan_id`, `created_at`, `updated_at`, `status`, `late`, `month_name`, `borrower_id`) VALUES
(50, '5', '2021', '116.004', '7', '2021-07-10 12:57:19', '2021-07-10 20:14:41', '0', '2', 'مايو', '1'),
(51, '6', '2021', '106.337', '7', '2021-07-10 12:57:19', '2021-07-10 20:17:40', '0', '1', 'يونيو', '1'),
(52, '7', '2021', '96.67', '7', '2021-07-10 12:57:19', '2021-07-10 12:57:19', '0', '0', 'يوليو', '1'),
(53, '8', '2021', '96.67', '7', '2021-07-10 12:57:19', '2021-07-10 12:57:19', '0', '0', 'أغسطس', '1'),
(54, '9', '2021', '96.67', '7', '2021-07-10 12:57:19', '2021-07-10 12:57:19', '0', '0', 'سبتمبر', '1'),
(55, '10', '2021', '96.67', '7', '2021-07-10 12:57:19', '2021-07-10 12:57:19', '0', '0', 'أكتوبر', '1'),
(56, '11', '2021', '96.67', '7', '2021-07-10 12:57:19', '2021-07-10 12:57:19', '0', '0', 'نوفمبر', '1'),
(57, '12', '2021', '96.67', '7', '2021-07-10 12:57:19', '2021-07-10 12:57:19', '0', '0', 'ديسمبر', '1'),
(58, '1', '2022', '96.67', '7', '2021-07-10 12:57:19', '2021-07-10 12:57:19', '0', '0', 'يناير', '1'),
(59, '2', '2022', '96.67', '7', '2021-07-10 12:57:19', '2021-07-10 12:57:19', '0', '0', 'فبراير', '1'),
(60, '3', '2022', '96.67', '7', '2021-07-10 12:57:19', '2021-07-10 12:57:19', '0', '0', 'مارس', '1'),
(61, '4', '2022', '96.67', '7', '2021-07-10 12:57:19', '2021-07-10 12:57:19', '0', '0', 'إبريل', '1');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_05_235018_create_governorate_table', 2),
(5, '2021_07_05_235209_create_cities_table', 2),
(6, '2021_07_06_143930_create_suppliers_table', 3),
(7, '2021_07_06_154740_create_borrowers_table', 4),
(8, '2021_07_07_120659_create_loans_table', 5),
(11, '2021_07_07_162106_create_loans_months_table', 6),
(12, '2021_07_10_063639_add_year_to_loans_table', 7),
(13, '2021_07_10_072454_add_status_to_loans_months_table', 8),
(14, '2021_07_10_072934_add_total_paid_to_loans_table', 9),
(15, '2021_07_10_080114_add_status_to_loans_table', 10),
(16, '2021_07_10_144503_add_month_name_to_loans_months_table', 11),
(17, '2021_07_10_212133_add_borrower_id_to_loans_months_table', 12);

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
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `percent`, `created_at`, `updated_at`) VALUES
(1, 'محمد', '10', '2021-07-06 12:53:31', '2021-07-06 12:53:31');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.com', NULL, '$2y$10$tPWIVB8dtC/BTYgDdL.oY.aKdq3kU/w40kKKGOsoKjcU2C8R7uX3e', 'JxwdssVV6bOTvicN7b5YgJqAk5SnvBUXkYZ0TJV90vc0xnZOiHibSAvYFMLO', '2021-07-05 21:12:10', '2021-07-05 21:12:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans_months`
--
ALTER TABLE `loans_months`
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
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loans_months`
--
ALTER TABLE `loans_months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
