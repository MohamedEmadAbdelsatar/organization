-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 11:44 AM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `charge`, `created_at`, `updated_at`) VALUES
(1, 'حساب الجمعية', '1498096.67', NULL, '2021-07-13 12:20:17'),
(2, 'حساب الموردين', '73333.33', NULL, '2021-07-13 12:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `account_logs`
--

CREATE TABLE `account_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_id` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_logs`
--

INSERT INTO `account_logs` (`id`, `type`, `user_id`, `interest_id`, `body`, `method`, `created_at`, `updated_at`, `account_id`) VALUES
(2, '1', '1', '9', 'تم سحب مبلغ 1000 من حساب الجمعية لعمل قرض', 'minus', '2021-07-13 12:19:07', '2021-07-13 12:19:07', '1'),
(3, '1', '1', '9', 'قام المقترض محمد بتسديد مبلغ 96.67 من القرض وتم إضافته فى حساب الجمعية', 'add', '2021-07-13 12:20:17', '2021-07-13 12:20:17', '1'),
(4, '2', '1', '9', ' تم تسديد قسط بقيمة  إلى المورد محمد قسط من الأساسى', 'minus', '2021-07-13 12:49:33', '2021-07-13 12:49:33', '2'),
(5, '2', '1', '9', ' تم تسديد قسط بقيمة  إلى المورد محمد قسط من الفوائد', 'minus', '2021-07-13 12:50:05', '2021-07-13 12:50:05', '2');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `import_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `month_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `late` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `supplier_id`, `import_id`, `year`, `month`, `type`, `month_name`, `status`, `late`, `created_at`, `updated_at`, `value`) VALUES
(89, '1', '9', '2021', '1', '1', 'يناير', '1', '0', '2021-07-12 16:14:31', '2021-07-12 23:48:03', '166666.67'),
(90, '1', '9', '2021', '7', '1', 'يوليو', '1', '0', '2021-07-12 16:14:31', '2021-07-13 12:49:33', '166666.67'),
(91, '1', '9', '2022', '1', '1', 'يناير', '0', '0', '2021-07-12 16:14:31', '2021-07-12 16:14:31', '166666.67'),
(92, '1', '9', '2022', '7', '1', 'يوليو', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '166666.67'),
(93, '1', '9', '2023', '1', '1', 'يناير', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '166666.67'),
(94, '1', '9', '2023', '7', '1', 'يوليو', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '166666.67'),
(95, '1', '9', '2021', '1', '2', 'يناير', '1', '0', '2021-07-12 16:14:32', '2021-07-12 23:50:08', '10000.00'),
(96, '1', '9', '2021', '4', '2', 'إبريل', '1', '0', '2021-07-12 16:14:32', '2021-07-13 12:50:05', '10000.00'),
(97, '1', '9', '2021', '7', '2', 'يوليو', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '10000.00'),
(98, '1', '9', '2021', '10', '2', 'أكتوبر', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '10000.00'),
(99, '1', '9', '2022', '1', '2', 'يناير', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '10000.00'),
(100, '1', '9', '2022', '4', '2', 'إبريل', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '10000.00'),
(101, '1', '9', '2022', '7', '2', 'يوليو', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '10000.00'),
(102, '1', '9', '2022', '10', '2', 'أكتوبر', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '10000.00'),
(103, '1', '9', '2023', '1', '2', 'يناير', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '10000.00'),
(104, '1', '9', '2023', '4', '2', 'إبريل', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '10000.00'),
(105, '1', '9', '2023', '7', '2', 'يوليو', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '10000.00'),
(106, '1', '9', '2023', '10', '2', 'أكتوبر', '0', '0', '2021-07-12 16:14:32', '2021-07-12 16:14:32', '10000.00');

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
(1, 'محمد', '1', '1', '21655613419', '12121212121212', 'شبرا', 'مهندس', 'أحمد', '3', '1', '01103621629', '15151515151515', 'رمسيس', 'مدرس', '2021-07-07 09:47:35', '2021-07-11 23:30:50'),
(3, 'محمد عماد', '1', '1', '01003621629', '13131313131313', 'شبرا', 'مهندس', 'وائل صلاح', '1', '1', '01103621629', '16161616161616', 'رمسيس', 'مدرس', '2021-07-13 10:24:45', '2021-07-13 10:44:39');

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
(2, '6أكتوبر', '2', NULL, '2021-07-11 21:54:33'),
(3, 'مدينة نصر', '1', NULL, NULL),
(4, 'العباسية', '1', '2021-07-17 07:30:01', '2021-07-17 07:30:01');

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
(2, 'الجيزه', NULL, '2021-07-11 21:15:54'),
(4, 'القليوبية', '2021-07-11 21:19:06', '2021-07-11 21:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `earn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_installment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_installment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_remaining` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `interest_remaining` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `base_payment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_payment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `interest_status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `base_total_paid` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `interest_total_paid` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `period` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `n_base` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `n_interest` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `account_id` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imports`
--

INSERT INTO `imports` (`id`, `supplier_id`, `value`, `earn`, `base_installment`, `interest_installment`, `total`, `interest`, `base_remaining`, `interest_remaining`, `base_payment`, `interest_payment`, `base_status`, `interest_status`, `base_total_paid`, `interest_total_paid`, `period`, `start`, `end`, `start_year`, `end_year`, `created_at`, `updated_at`, `n_base`, `n_interest`, `account_id`) VALUES
(9, '1', '1000000', '12', '166666.67', '10000.00', '1120000.00', '120000', '666666.66', '100000', '6', '3', '0', '0', '333333.34', '20000', '36', '1', '1', '2021', '2024', '2021-07-12 16:14:31', '2021-07-13 12:50:05', '0', '0', '2');

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
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `account_id` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `borrower_id`, `value`, `earn`, `installment`, `start`, `end`, `created_at`, `updated_at`, `remaining`, `start_year`, `end_year`, `total`, `total_paid`, `status`, `account_id`) VALUES
(9, '1', '1000', '16', '96.67', '1', '12', '2021-07-13 12:19:07', '2021-07-13 14:38:52', '1063.33', '2021', '2021', '1160.00', '96.67', '1', '1'),
(10, '1', '928.02', '16', '89.71', '4', '3', '2021-07-13 14:38:53', '2021-07-13 22:00:42', '1076.50', '2021', '2022', '1076.50', '0', '1', '1'),
(11, '1', '1076.52', '16', '104.06', '8', '7', '2021-07-13 22:00:42', '2021-07-17 06:17:47', '1248.76', '2021', '2022', '1248.76', '0', '1', '1'),
(12, '1', '1248.72', '16', '120.71', '1', '12', '2021-07-17 06:17:47', '2021-07-17 06:21:54', '1448.52', '2021', '2021', '1448.52', '0', '1', '1'),
(13, '1', '1448.52', '16', '140.02', '1', '12', '2021-07-17 06:21:54', '2021-07-17 06:24:14', '1680.28', '2021', '2021', '1680.28', '0', '1', '1'),
(14, '1', '1680.24', '16', '162.42', '1', '12', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '1949.08', '2021', '2021', '1949.08', '0', '0', '1');

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
(62, '1', '2021', '96.67', '9', '2021-07-13 12:19:08', '2021-07-13 12:20:17', '1', '0', 'يناير', '1'),
(63, '2', '2021', '96.67', '9', '2021-07-13 12:19:08', '2021-07-13 12:19:08', '1', '0', 'فبراير', '1'),
(64, '3', '2021', '96.67', '9', '2021-07-13 12:19:08', '2021-07-13 12:19:08', '1', '0', 'مارس', '1'),
(122, '1', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'يناير', '1'),
(123, '2', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'فبراير', '1'),
(124, '3', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'مارس', '1'),
(125, '4', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'إبريل', '1'),
(126, '5', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'مايو', '1'),
(127, '6', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'يونيو', '1'),
(128, '7', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'يوليو', '1'),
(129, '8', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'أغسطس', '1'),
(130, '9', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'سبتمبر', '1'),
(131, '10', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'أكتوبر', '1'),
(132, '11', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'نوفمبر', '1'),
(133, '12', '2021', '162.42', '14', '2021-07-17 06:24:15', '2021-07-17 06:24:15', '0', '0', 'ديسمبر', '1');

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
(17, '2021_07_10_212133_add_borrower_id_to_loans_months_table', 12),
(18, '2021_07_11_131605_create_import_table', 13),
(19, '2021_07_12_160710_create_batches_table', 14),
(20, '2021_07_12_173406_add_value_to_batches_table', 15),
(21, '2021_07_13_013232_add_count_to_imports_table', 16),
(22, '2021_07_13_022353_create_accounts_table', 17),
(23, '2021_07_13_032455_add_account_to_loans_table', 18),
(24, '2021_07_13_033826_add_account_to_imports_table', 19),
(25, '2021_07_13_135104_create_account_logs_table', 20),
(26, '2021_07_13_140452_add_source_to_logs_table', 21);

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
(1, 'test', 'test@test.com', NULL, '$2y$10$tPWIVB8dtC/BTYgDdL.oY.aKdq3kU/w40kKKGOsoKjcU2C8R7uX3e', 'WhiARuuThIGDydZqXSMbG3Mc9YwjAYBZ33XuXlQlmCReDaEvBdKOSGZuDiEw', '2021-07-05 21:12:10', '2021-07-05 21:12:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_logs`
--
ALTER TABLE `account_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `imports`
--
ALTER TABLE `imports`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_logs`
--
ALTER TABLE `account_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `loans_months`
--
ALTER TABLE `loans_months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
