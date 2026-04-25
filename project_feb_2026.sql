-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2026 pada 03.55
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_feb_2026`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `averages`
--

CREATE TABLE `averages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_saham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_average` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_awal` decimal(12,2) NOT NULL,
  `jumlah_awal` int(11) DEFAULT NULL,
  `harga_baru` decimal(12,2) NOT NULL,
  `jumlah_baru` int(11) DEFAULT NULL,
  `average` decimal(12,2) DEFAULT NULL,
  `recorded_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `averages`
--

INSERT INTO `averages` (`id`, `user_id`, `nama_saham`, `jenis_average`, `harga_awal`, `jumlah_awal`, `harga_baru`, `jumlah_baru`, `average`, `recorded_date`, `created_at`, `updated_at`) VALUES
(23, 4, 'ELTY', 'Down', '500.00', 12, '300.00', 4, '450.00', '2026-03-14', '2026-03-14 02:36:00', '2026-03-14 02:36:00'),
(27, 4, 'BNBR', 'Down', '600.00', 12, '100.00', 28, '250.00', '2026-04-12', '2026-04-11 19:29:51', '2026-04-11 19:29:51'),
(28, 4, 'INET', 'Up', '400.00', 12, '800.00', 8, '560.00', '2026-04-13', '2026-04-13 07:29:04', '2026-04-13 07:29:04'),
(30, 4, 'EMAS', 'Down', '400.00', 12, '100.00', 8, '280.00', '2026-04-13', '2026-04-13 07:29:48', '2026-04-13 07:29:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `key`, `value`, `link`, `link2`, `link3`, `created_at`, `updated_at`) VALUES
(1, 'user_section_collapse', '1', 'https://drive.google.com/file/bukureza', NULL, NULL, '2026-04-10 07:13:48', '2026-04-14 07:56:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `images`
--

INSERT INTO `images` (`id`, `title`, `image_path`, `deskripsi`, `custom`, `created_at`, `updated_at`) VALUES
(2, 'okok', 'images/WkM5V6A1HvZh1RnTpUDwHtfmRA3fT66stQ1tkzgb.jpg', NULL, NULL, '2026-04-05 00:22:17', '2026-04-05 00:22:17'),
(3, 'right issue', 'images/RslaX69sKmjTkJC9oloIL1yqFUyElgtf5KbASVil.jpg', NULL, NULL, '2026-04-05 00:35:25', '2026-04-05 00:35:25'),
(4, 'Right Issue', 'images/Pq7n2tSgoOXawvGYnOhWCmPYBrhQXvDBohqBUm4I.png', NULL, '0', '2026-04-11 08:28:07', '2026-04-11 08:38:10'),
(5, 'Stock Split', 'images/0vpu1eppXSAhVxPoidR3Deo83w6PPK429l7BJyKK.png', NULL, '0', '2026-04-11 08:35:17', '2026-04-11 08:38:10'),
(6, 'Right Issue', 'images/I4PWbCJyYZkGFv7NUZCoUq8rqfj8UBQdtc3wTRhY.png', NULL, '0', '2026-04-11 18:31:06', '2026-04-11 18:32:28'),
(7, 'Coba pertama', 'images/g1PNUqqGYEIwSnONAwI6eenQTGHcdZCxDVQJqhhp.jpg', NULL, '0', '2026-04-15 06:09:33', '2026-04-15 06:11:06'),
(8, 'coba2', 'images/yroYXWUO8PACw8TKMHbApG4dPYk3R9IIjhB6g7Hz.jpg', NULL, '1', '2026-04-15 08:39:53', '2026-04-15 08:39:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_user_reads`
--

CREATE TABLE `image_user_reads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `customfree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `image_user_reads`
--

INSERT INTO `image_user_reads` (`id`, `user_id`, `image_id`, `customfree`, `created_at`, `updated_at`) VALUES
(1, 1, 8, NULL, '2026-04-15 08:41:34', '2026-04-15 08:41:34'),
(2, 3, 8, NULL, '2026-04-15 08:51:53', '2026-04-15 08:51:53'),
(3, 4, 8, NULL, '2026-04-17 08:04:08', '2026-04-17 08:04:08'),
(4, 2, 8, NULL, '2026-04-17 19:49:24', '2026-04-17 19:49:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `langganan`
--

CREATE TABLE `langganan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_02_07_071927_create_posts_table', 1),
(6, '2026_02_07_091328_create_products_table', 1),
(7, '2026_02_15_080513_create_packages_table', 2),
(8, '2026_02_15_083200_create_paket_table', 2),
(9, '2026_02_15_083452_create_langganan_table', 2),
(10, '2026_02_22_070916_create_subs_table', 3),
(11, '2026_02_22_091756_create_paketnews_table', 4),
(13, '2026_03_01_004812_create_user_statuses_table', 5),
(16, '2026_03_12_141941_creates_averages_table', 6),
(17, '2026_03_15_042351_create_teoritis_table', 7),
(19, '2026_03_15_101727_create_tebusris_table', 9),
(20, '2026_04_04_143950_create_roles_table', 10),
(21, '2026_04_04_145209_add_role_id_to_users_table', 11),
(22, '2026_04_05_040803_create_images_table', 12),
(23, '2026_04_10_133948_create_books_table', 13),
(24, '2026_04_13_115129_create_rasios_table', 14),
(25, '2026_04_15_144914_create_image_user_reads_table', 15),
(26, '2026_04_16_141635_add_otp_expired_to_users_table', 16),
(27, '2026_04_21_202747_create_user_monitor_table', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 100000, 'monthly', '2026-02-15 08:42:04', '2026-02-15 08:42:04'),
(2, 'Pro', 250000, 'monthly', '2026-02-15 08:42:04', '2026-02-15 08:42:04'),
(3, 'Enterprise', 500000, 'monthly', '2026-02-15 08:43:59', '2026-02-15 08:43:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paketnews`
--

CREATE TABLE `paketnews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paketnews`
--

INSERT INTO `paketnews` (`id`, `name`, `price`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1 Bulan', 20000, 30, NULL, '2026-02-22 09:31:06', '2026-02-22 09:31:06'),
(2, '2 Bulan', 30000, 60, NULL, '2026-02-22 09:31:06', '2026-02-22 09:31:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'BCA', 'Bank Central Asia', 700000, '2026-02-21 23:02:55', '2026-02-21 23:02:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rasios`
--

CREATE TABLE `rasios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_saham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beredar_awal` int(11) DEFAULT NULL,
  `beredar_tambahan` int(11) DEFAULT NULL,
  `beredar_total` int(11) DEFAULT NULL,
  `rasio_kiri` int(11) DEFAULT NULL,
  `rasio_kanan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rasios`
--

INSERT INTO `rasios` (`id`, `user_id`, `nama_saham`, `beredar_awal`, `beredar_tambahan`, `beredar_total`, `rasio_kiri`, `rasio_kanan`, `created_at`, `updated_at`) VALUES
(1, 4, 'ENRG', 15000000, 20000000, NULL, 3, 4, '2026-04-13 06:06:31', '2026-04-13 06:06:31'),
(3, 4, 'EMAS', 60, 30, NULL, 2, 1, '2026-04-13 06:28:01', '2026-04-13 06:28:01'),
(4, 4, 'CBDK', 50, 25, 75, 2, 1, '2026-04-13 06:30:09', '2026-04-13 06:30:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akses` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `deskripsi`, `permission`, `akses`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL, NULL, NULL, NULL),
(2, 'superadmin', NULL, NULL, NULL, NULL, NULL),
(3, 'admin', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subs`
--

CREATE TABLE `subs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `subs`
--

INSERT INTO `subs` (`id`, `user_id`, `username`, `package_id`, `duration`, `transaction_id`, `status`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 3, 'Yani', 1, '30', '699ad1a98a8a2', 'pending', NULL, NULL, '2026-02-22 02:51:39', '2026-02-22 02:51:39'),
(2, 2, 'Reza Ammar', 1, '30', '699e272fe8bc2', 'pending', NULL, NULL, '2026-02-24 15:33:20', '2026-02-24 15:33:20'),
(3, 2, 'Reza Ammar', 1, '30', '699e2d3bc5fa8', 'pending', NULL, NULL, '2026-02-24 15:59:08', '2026-02-24 15:59:08'),
(4, 2, 'Reza Ammar', 1, '30', '699e2d5ddb549', 'pending', NULL, NULL, '2026-02-24 15:59:42', '2026-02-24 15:59:42'),
(5, 2, 'Reza Ammar', 1, '30', '699e2e0b35de9', 'pending', NULL, NULL, '2026-02-24 16:02:35', '2026-02-24 16:02:35'),
(6, 2, 'Reza Ammar', 1, '30', '699e2ea80ccb7', 'pending', NULL, NULL, '2026-02-24 16:05:12', '2026-02-24 16:05:12'),
(7, 2, 'Reza Ammar', 1, '30', '69a2b67d7c405', 'pending', NULL, NULL, '2026-02-28 02:33:51', '2026-02-28 02:33:51'),
(8, 2, 'Reza Ammar', 1, '30', '69a2bcffd4427', 'pending', NULL, NULL, '2026-02-28 03:01:37', '2026-02-28 03:01:37'),
(9, 2, 'Reza Ammar', 1, '30', '69a2bff932faa', 'pending', NULL, NULL, '2026-02-28 03:14:19', '2026-02-28 03:14:19'),
(10, 2, 'Reza Ammar', 1, '30', '69a36c4096d8a', 'pending', NULL, NULL, '2026-02-28 15:29:21', '2026-02-28 15:29:21'),
(11, 2, 'Reza Ammar', 2, '60', '69a37a5f8a30a', 'active', '2026-02-28', '2026-03-28', '2026-02-28 16:29:35', '2026-02-28 16:29:59'),
(12, 2, 'Reza Ammar', 1, '30', '69a37bd32a866', 'paid', '2026-03-01', '2026-03-31', '2026-02-28 16:35:47', '2026-02-28 17:50:22'),
(13, 2, 'Reza Ammar', 2, '60', '69a385b987d67', 'active', '2026-03-01', '2026-03-01', '2026-02-28 17:18:02', '2026-02-28 17:18:37'),
(14, 2, 'Reza Ammar', 1, '30', '69a3875720377', 'pending', NULL, NULL, '2026-02-28 17:24:56', '2026-02-28 17:24:56'),
(15, 2, 'Reza Ammar', 1, '30', '69a38783dbc91', 'pending', NULL, NULL, '2026-02-28 17:25:40', '2026-02-28 17:25:40'),
(16, 2, 'Reza Ammar', 1, '30', '69a38893324b6', 'active', '2026-03-01', '2026-03-01', '2026-02-28 17:30:12', '2026-02-28 17:30:34'),
(17, 2, 'Reza Ammar', 2, '60', '69a3891cf240d', 'active', '2026-03-01', '2026-04-30', '2026-02-28 17:32:29', '2026-02-28 17:32:47'),
(18, 2, 'Reza Ammar', 1, '30', '69a38d24e84c2', 'pending', NULL, NULL, '2026-02-28 17:49:41', '2026-02-28 17:49:41'),
(19, 2, 'Reza Ammar', 1, '30', '69a3b52d37ca8', 'pending', NULL, NULL, '2026-02-28 20:40:29', '2026-02-28 20:40:29'),
(20, 7, 'coba1', 2, '60', '69a3c91c28742', 'paid', '2026-03-01', '2026-04-30', '2026-02-28 22:05:32', '2026-02-28 22:06:21'),
(21, 4, 'irfan', 1, '30', '69b4ce72d4f02', 'pending', NULL, NULL, '2026-03-13 19:56:51', '2026-03-13 19:56:51'),
(22, 5, 'qwer', 1, '30', '69b68c508d09f', 'pending', NULL, NULL, '2026-03-15 03:39:12', '2026-03-15 03:39:12'),
(23, 5, 'qwer', 1, '30', '69d7b7db5419b', 'pending', NULL, NULL, '2026-04-09 07:29:47', '2026-04-09 07:29:47'),
(24, 5, 'qwer', 2, '60', '69d7bd9034ee9', 'pending', NULL, NULL, '2026-04-09 07:54:08', '2026-04-09 07:54:08'),
(25, 3, 'Yani', 1, '30', '69d9056a3a729', 'pending', NULL, NULL, '2026-04-10 07:12:58', '2026-04-10 07:12:58'),
(26, 1, 'reza', 1, '30', '69df9152e485d', 'pending', NULL, NULL, '2026-04-15 06:23:31', '2026-04-15 06:23:31'),
(27, 45, 'joy', 2, '60', '69e249ce27baf', 'pending', NULL, NULL, '2026-04-17 07:55:11', '2026-04-17 07:55:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `package_id`, `transaction_id`, `status`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '699187b0b798f', 'pending', NULL, NULL, '2026-02-15 01:45:37', '2026-02-15 01:45:37'),
(2, 3, 2, '699189642ffc5', 'pending', NULL, NULL, '2026-02-15 01:52:52', '2026-02-15 01:52:52'),
(3, 3, 1, '69918be9e5516', 'pending', NULL, NULL, '2026-02-15 02:03:38', '2026-02-15 02:03:38'),
(4, 2, 2, '69918f75b6bc2', 'pending', NULL, NULL, '2026-02-15 02:18:46', '2026-02-15 02:18:46'),
(5, 2, 1, '699a9a9287e91', 'pending', NULL, NULL, '2026-02-21 22:56:34', '2026-02-21 22:56:34'),
(6, 2, 2, '699a9bb3acc6f', 'pending', NULL, NULL, '2026-02-21 23:01:24', '2026-02-21 23:01:24'),
(7, 2, 2, '699a9bd2ebbc7', 'pending', NULL, NULL, '2026-02-21 23:01:55', '2026-02-21 23:01:55'),
(8, 2, 1, '699aa06756ff9', 'pending', NULL, NULL, '2026-02-21 23:21:29', '2026-02-21 23:21:29'),
(9, 2, 1, '699aa47c22711', 'pending', NULL, NULL, '2026-02-21 23:38:52', '2026-02-21 23:38:52'),
(10, 2, 1, '699aa5eb4e0ab', 'pending', NULL, NULL, '2026-02-21 23:45:01', '2026-02-21 23:45:01'),
(11, 2, 2, '699aa63963e47', 'pending', NULL, NULL, '2026-02-21 23:46:17', '2026-02-21 23:46:17'),
(12, 2, 1, '699aa755d1962', 'pending', NULL, NULL, '2026-02-21 23:51:02', '2026-02-21 23:51:02'),
(13, 2, 1, '699aa771aead3', 'pending', NULL, NULL, '2026-02-21 23:51:32', '2026-02-21 23:51:32'),
(14, 2, 1, '699aa9eeb3035', 'pending', NULL, NULL, '2026-02-22 00:02:07', '2026-02-22 00:02:07'),
(15, 3, 1, '699ac390638d0', 'pending', NULL, NULL, '2026-02-22 01:51:30', '2026-02-22 01:51:30'),
(16, 3, 1, '699acef71e596', 'pending', NULL, NULL, '2026-02-22 02:40:09', '2026-02-22 02:40:09'),
(17, 3, 1, '699ad1a98a8a2', 'pending', NULL, NULL, '2026-02-22 02:51:39', '2026-02-22 02:51:39'),
(18, 2, 1, '69a2bcffd4427', 'pending', NULL, NULL, '2026-02-28 03:01:37', '2026-02-28 03:01:37'),
(19, 2, 1, '69a2bff932faa', 'pending', NULL, NULL, '2026-02-28 03:14:19', '2026-02-28 03:14:19'),
(20, 2, 1, '69a36c4096d8a', 'active', '2026-02-28', '2026-03-28', '2026-02-28 15:29:21', '2026-02-28 15:29:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tebusris`
--

CREATE TABLE `tebusris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_saham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_lot` int(11) DEFAULT NULL,
  `harga_avg` decimal(12,2) DEFAULT NULL,
  `harga_tebus` decimal(12,2) DEFAULT NULL,
  `rasio_kiri` decimal(12,2) DEFAULT NULL,
  `rasio_kanan` decimal(12,2) DEFAULT NULL,
  `lot_tebus` decimal(12,2) DEFAULT NULL,
  `biaya_tebus` decimal(12,2) DEFAULT NULL,
  `harga_avg_final` decimal(12,2) DEFAULT NULL,
  `total_lot_final` decimal(12,2) DEFAULT NULL,
  `recorded_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tebusris`
--

INSERT INTO `tebusris` (`id`, `user_id`, `nama_saham`, `jumlah_lot`, `harga_avg`, `harga_tebus`, `rasio_kiri`, `rasio_kanan`, `lot_tebus`, `biaya_tebus`, `harga_avg_final`, `total_lot_final`, `recorded_date`, `created_at`, `updated_at`) VALUES
(1, 4, 'INET', 19, '515.00', '250.00', NULL, NULL, '25.00', NULL, '364.43', NULL, '2026-03-22', '2026-03-21 18:24:15', '2026-03-21 18:24:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teoritis`
--

CREATE TABLE `teoritis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_saham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_cum` decimal(12,2) DEFAULT NULL,
  `rasio_kiri` decimal(12,2) DEFAULT NULL,
  `harga_tebus` decimal(12,2) DEFAULT NULL,
  `rasio_kanan` decimal(12,2) DEFAULT NULL,
  `harga_teoritis` decimal(12,2) DEFAULT NULL,
  `recorded_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teoritis`
--

INSERT INTO `teoritis` (`id`, `user_id`, `nama_saham`, `harga_cum`, `rasio_kiri`, `harga_tebus`, `rasio_kanan`, `harga_teoritis`, `recorded_date`, `created_at`, `updated_at`) VALUES
(1, 4, 'INET', '775.00', '3.00', '250.00', '3.00', '475.00', '2026-03-15', '2026-03-15 00:54:56', '2026-03-15 00:54:56'),
(4, 5, 'BNBR', '500.00', '10.00', '120.00', '4.00', '391.43', '2026-03-15', '2026-03-15 02:01:40', '2026-03-15 02:01:40'),
(5, 5, 'ENRG', '2100.00', '3.00', '800.00', '2.00', '1580.00', '2026-03-15', '2026-03-15 02:14:49', '2026-03-15 02:14:49'),
(6, 5, 'CBDK', '9000.00', '5.00', '4000.00', '2.00', '7571.43', '2026-03-15', '2026-03-15 02:15:36', '2026-03-15 02:15:36'),
(7, 5, 'INET', '775.00', '3.00', '250.00', '4.00', '475.00', '2026-03-15', '2026-03-15 02:16:18', '2026-03-15 02:16:18'),
(8, 5, 'EMAS', '9800.00', '2.00', '4000.00', '3.00', '6320.00', '2026-03-15', '2026-03-15 02:17:02', '2026-03-15 02:17:02'),
(11, 4, 'BNBR', '800.00', '4.00', '200.00', '5.00', '466.67', '2026-04-12', '2026-04-11 19:33:13', '2026-04-11 19:33:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `role_id`, `otp`, `email_verified_at`, `otp_expires_at`) VALUES
(1, 'reza', 'reza12345@gmail.com', '$2y$12$jp4TSh31odPLFzzuSLBonOyreJPcn.qO1JwUE2b2WdH4JSfoco4m.', '2026-02-15 01:39:34', '2026-02-15 01:39:34', 2, NULL, NULL, NULL),
(2, 'Reza Ammar', 'rezaammar69@gmail.com', '$2y$12$Azdf4QZvVUDu392QVY0dGOyo4GzXNrGt3JO4K/PErdPiMw8VYFL5S', '2026-02-15 01:40:59', '2026-04-17 20:41:48', 2, NULL, NULL, NULL),
(3, 'Yanii', 'srimaryani1803@gmail.com', '$2y$12$kKXAkO7MqaIHfoTc0uR3vunDQ4WH0NQBQRSvt0hUJO9SYAosZMJP.', '2026-02-15 01:51:57', '2026-04-14 05:53:17', 3, NULL, NULL, NULL),
(4, 'irfanAmir', 'irfan@gmail.com', '$2y$12$JC7TSauVflNYGXUcYRyFzutXwgeAsA9wKt3Pm.narl2NOJoC5.zf6', '2026-02-28 21:08:43', '2026-04-12 03:06:16', 1, NULL, NULL, NULL),
(5, 'qwer', 'qwer@gmail.com', '$2y$12$XaBbDaYqLw0OKr3sYA108uisfpIoAAwAE6CbLnWrw1ut95p.I2F56', '2026-02-28 21:18:09', '2026-02-28 21:18:09', 1, NULL, NULL, NULL),
(6, 'asdf', 'asdf@gmail.com', '$2y$12$8Ev3cVScOKHcWRdemmi8EOFtGMuGLjvTcbhtxa4mP7HU6Eo5HJyce', '2026-02-28 21:40:17', '2026-02-28 21:40:17', 1, NULL, NULL, NULL),
(7, 'coba1', 'coba1@gmail.com', '$2y$12$lKnw54QdxuHM1.yqbipMku21KCqK.mJUXu.lrtHebCm2BSyRE6xaC', '2026-02-28 22:04:28', '2026-02-28 22:04:28', 1, NULL, NULL, NULL),
(8, 'zxcv', 'zxcv@gmail.com', '$2y$12$4z.sdl1a/ap83d151bTKRep./m106mslVS0r4WOq8DCXQw58rODTG', '2026-03-07 17:09:40', '2026-03-07 17:09:40', 1, NULL, NULL, NULL),
(9, 'Roni', 'roni@gmail.com', '$2y$12$JyDa/0F/gb13bQYJ6Ty08uA0Ib7IE7LhW6LMwkCju9KqlcTvIvbVW', '2026-04-04 20:53:00', '2026-04-04 20:53:00', 1, NULL, NULL, NULL),
(10, 'Diki', 'diki@gmail.com', '$2y$12$bMfR2KAqV8AeK80os.cNTurQMq5DAhA8XRLIGzXgbQY0XOlTJuUQK', '2026-04-13 08:08:45', '2026-04-13 08:08:45', 1, NULL, NULL, NULL),
(11, 'Koplak', 'koplak@gmail.com', '$2y$12$NjR85U9GucunOJs478iHTuf3yoRjjcQgFEiVzq2Rhj8LFX3tQj3RG', '2026-04-13 08:10:07', '2026-04-13 08:10:07', 1, NULL, NULL, NULL),
(12, 'latihan', 'latihan@gmail.com', '$2y$12$az2UPw0y5CppY1wa45MG.eKUIIHCWgWakP5IUD4sQqMT90qN7oPF.', '2026-04-16 08:43:26', '2026-04-16 08:43:26', 1, '420284', NULL, '2026-04-16 08:48:26'),
(13, 'Ammar', 'rezaammar28@gmail.com', '$2y$12$MAiHtYsrtNHvewBSsNUKvO0QpW3bVB2Ur2S5F6ulGIJizbmXP0bgO', '2026-04-16 08:46:56', '2026-04-16 08:46:56', 1, '137175', NULL, '2026-04-16 08:51:56'),
(14, 'daruak', 'darupurba@gmail.com', '$2y$12$6.ADhBfVjE24TLGo5A4lzeVccFGEZBIBBrCR19WQ1fXJZLxHpGZTK', '2026-04-16 09:04:34', '2026-04-16 09:04:34', 1, '911011', NULL, '2026-04-16 09:09:34'),
(15, 'daruuuu', 'daru@gmail.com', '$2y$12$4cnfAYthSF79WHYHLzsqG.6cP4rND/a6zPNiz3c5IeYoT78eItN66', '2026-04-16 09:13:27', '2026-04-16 09:13:27', 1, '938601', NULL, '2026-04-16 09:18:27'),
(16, 'bagas12', 'bagaspurbalingga1@gmail.com', '$2y$12$JvJBqWHiotjSVNTjor9h1.JywamXL3/01mp4G1yUOji2v0cjBMMOi', '2026-04-16 09:29:53', '2026-04-17 18:57:56', 1, '309118', NULL, '2026-04-16 09:34:53'),
(17, 'Ammaralexo', 'bagus68@gmail.com', '$2y$12$AKWP35uaQrSF7F24klw3JOOiGa0nK6Nn9QuFO89vUa50j3BGscCZS', '2026-04-16 09:40:55', '2026-04-16 09:40:55', 1, '124007', NULL, '2026-04-16 09:45:55'),
(18, 'daruakbar7', 'darupurbalingga@gmail.com', '$2y$12$wiQf6GRH0QgLda9dct99DOjaSlyAS3QK1dbChLW7PG8023Y28LhwG', '2026-04-16 09:42:57', '2026-04-16 09:42:57', 1, '304136', NULL, '2026-04-16 09:47:57'),
(20, 'Yumna asli', 'yumnapemalang1@gmail.com', '$2y$12$ZgS2mP6C/QouIeDUHI4mIOizl9Wbc6ER4YtsM7Mfc81ZnD88MDikS', '2026-04-16 10:17:35', '2026-04-17 18:44:10', NULL, NULL, '2026-04-16 10:18:25', NULL),
(23, 'yumna', 'ulip@gmail.com', '$2y$12$0wNM8sg5wBzAzqAWeotFSOMp2E3oewF6/nRI6v5auBmGri.348Kvu', '2026-04-16 10:23:36', '2026-04-16 10:23:36', 1, NULL, NULL, NULL),
(25, 'kirun', 'kirun@gmail.com', '$2y$12$lUsUCNjMXpvTRff5rpjOMO9XgLmUkKxa79ppKJ9QwGvQ9.daJ3dCO', '2026-04-17 04:33:38', '2026-04-17 04:33:38', 1, NULL, NULL, NULL),
(26, NULL, NULL, NULL, '2026-04-17 05:17:28', '2026-04-17 05:18:10', NULL, NULL, '2026-04-17 05:18:10', NULL),
(27, 'Rizki', 'rizki@gmail.com', '$2y$12$0LHp2GVRLIvsJMJ/P4JFbeQ32cPItkcdVOrq5P.iCORs6FAgE7r/u', '2026-04-17 05:18:10', '2026-04-17 05:18:10', 1, NULL, NULL, NULL),
(28, 'Roki', 'roki@gmail.com', '$2y$12$HuvSApeNfw5OGNDr2V.ZwOhT2Hwi0xRBrHkVgPgmbZle9Lsttck3i', '2026-04-17 05:21:06', '2026-04-17 05:22:07', 1, NULL, '2026-04-17 05:22:07', NULL),
(29, 'rondaldo', 'rondaldo@gmail.com', '$2y$12$24Wqx9qIv4v0MNPLX1LOD.fZCtsXmZwFsC95ALH2VArDiMgcDY2.K', '2026-04-17 06:10:35', '2026-04-17 06:11:39', 1, NULL, '2026-04-17 06:11:39', NULL),
(37, 'rey', 'rey@gmail.com', '$2y$12$BMQhN3RJexfPtRBn0pbXt.e1PmmIrelW6lGXjyYwckrtSRaVqCHUO', '2026-04-17 06:53:39', '2026-04-17 06:54:21', 1, NULL, '2026-04-17 06:54:21', NULL),
(44, 'redi', 'redi@gmail.com', '$2y$12$SEzGeP9imxveWxtmf9Z2WODkw3FcSYdDq0gXXyWJBNSp5LaxnnLdu', '2026-04-17 07:34:04', '2026-04-17 07:35:15', 1, NULL, '2026-04-17 07:35:15', NULL),
(45, 'joy', 'joy@gmail.com', '$2y$12$XqK5oFj2s76KPoCXSNedOudrs..mlJYf72S5SriLxUKwu0a2bw/XK', '2026-04-17 07:46:40', '2026-04-17 07:47:42', 1, NULL, '2026-04-17 07:47:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_monitor`
--

CREATE TABLE `user_monitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `non_active` int(11) NOT NULL DEFAULT 0,
  `total_user` int(11) NOT NULL DEFAULT 0,
  `custom1` int(11) NOT NULL DEFAULT 0,
  `custom2` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_monitor`
--

INSERT INTO `user_monitor` (`id`, `active`, `non_active`, `total_user`, `custom1`, `custom2`, `remark`, `created_at`, `updated_at`) VALUES
(1, 5, 6, 11, 0, 0, NULL, '2026-04-18 13:53:32', '2026-04-18 13:53:32'),
(2, 5, 21, 26, 0, 0, NULL, '2026-04-19 13:55:18', '2026-04-19 13:55:18'),
(3, 5, 21, 26, 0, 0, NULL, '2026-04-20 13:58:10', '2026-04-20 13:58:10'),
(4, 5, 21, 26, 0, 0, NULL, '2026-04-21 14:50:04', '2026-04-21 14:50:04'),
(5, 5, 21, 26, 0, 0, NULL, '2026-04-22 14:23:14', '2026-04-22 14:23:14'),
(6, 5, 21, 26, 0, 0, NULL, '2026-04-23 01:30:35', '2026-04-23 01:30:35'),
(7, 5, 21, 26, 0, 0, NULL, '2026-04-24 01:31:29', '2026-04-24 01:31:29'),
(8, 5, 21, 26, 0, 0, NULL, '2026-04-25 01:35:13', '2026-04-25 01:35:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_statuses`
--

CREATE TABLE `user_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-avatar.png',
  `birth_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_statuses`
--

INSERT INTO `user_statuses` (`id`, `user_id`, `username`, `email`, `status`, `start_date`, `end_date`, `address`, `phone`, `bio`, `avatar`, `birth_date`, `created_at`, `updated_at`) VALUES
(1, 6, 'asdf', 'asdf@gmail.com', 'Not-active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-02-28 21:40:17', '2026-02-28 21:40:17'),
(2, 7, 'coba1', 'coba1@gmail.com', 'Not-active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-02-28 22:04:28', '2026-03-16 16:11:23'),
(3, 5, 'qwer', 'qwer@gmail.com', 'Not-active', NULL, '2026-03-17', 'Bekasi', '089512345678', 'Keren', 'profile/sz2fjNjFdbOoVL0dUzvP2YJ6hTXwViUNI9z9X1PI.jpg', '2006-03-01', NULL, '2026-04-15 05:38:55'),
(4, 8, 'irfan amir', 'zxcv@gmail.com', 'Not-active', NULL, '2026-04-15', 'Jakarta', '089512345678', 'Keren ok', 'default-avatar.png', NULL, '2026-03-07 17:09:40', '2026-04-18 01:34:32'),
(5, 4, 'irfanAmir', 'irfan@gmail.com', 'Active', NULL, '2026-12-31', 'Semarang', '089522227878', 'Mancing', 'profile/Tec9RSSwEBtzccYvmRJaVL1Ewn7aiPywWTWu9U9t.jpg', NULL, '2026-03-08 00:13:03', '2026-04-18 01:16:57'),
(6, 3, 'Yanii', 'srimaryani1803@gmail.com', 'Active', NULL, '2070-12-31', NULL, '087987676890', 'Baik Cantik Sholeh', 'default-avatar.png', NULL, '2026-03-04 02:48:35', '2026-04-14 05:53:17'),
(7, 1, 'reza', 'reza12345@gmail.com', 'Active', NULL, '2070-12-31', NULL, NULL, NULL, 'default-avatar.png', NULL, NULL, '2026-04-04 08:55:37'),
(8, 9, 'Roni', 'roni@gmail.com', 'Not-active', NULL, '2026-04-15', NULL, NULL, NULL, 'profile/IUpESdAqdGGg2AIBmhh0iLvX0X4ZWgnkGduH1k4y.png', NULL, '2026-04-04 20:53:00', '2026-04-15 05:58:00'),
(9, 10, 'Diki', 'diki@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-13 08:08:45', '2026-04-13 08:08:45'),
(10, 11, 'Koplak', 'koplak@gmail.com', 'Active', NULL, '2026-04-15', NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-13 08:10:07', '2026-04-14 07:53:04'),
(11, 2, 'Reza Ammar', 'rezaammar69@gmail.com', 'Active', NULL, '2070-12-31', NULL, NULL, NULL, 'default-avatar.png', NULL, NULL, '2026-04-15 09:04:40'),
(12, 12, 'latihan', 'latihan@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-16 08:43:26', '2026-04-16 08:43:26'),
(13, 13, 'Ammar', 'rezaammar28@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-16 08:46:56', '2026-04-16 08:46:56'),
(14, 14, 'daruakbar', 'darupurbalingga@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-16 09:04:34', '2026-04-16 09:04:34'),
(15, 15, 'daruuuu', 'daru@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-16 09:13:27', '2026-04-16 09:13:27'),
(16, 16, 'bagas12', 'bagaspurbalingga1@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-16 09:29:53', '2026-04-16 09:29:53'),
(17, 17, 'Ammaralexo', 'bagus68@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-16 09:40:55', '2026-04-16 09:40:55'),
(19, 23, 'yumna', 'ulip@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-16 10:23:36', '2026-04-16 10:23:36'),
(20, 25, 'kirun', 'kirun@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-17 04:33:38', '2026-04-17 04:33:38'),
(21, 26, 'Rizki', 'rizki@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-17 05:18:10', '2026-04-17 05:18:10'),
(22, 28, 'Roki', 'roki@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-17 05:22:07', '2026-04-17 05:22:07'),
(23, 29, 'rondaldo', 'rondaldo@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-17 06:11:39', '2026-04-17 06:11:39'),
(24, 37, 'rey', 'rey@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-17 06:54:21', '2026-04-17 06:54:21'),
(25, 44, 'redi', 'redi@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-17 07:35:15', '2026-04-17 07:35:15'),
(26, 45, 'joy', 'joy@gmail.com', 'Not-Active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, '2026-04-17 07:47:42', '2026-04-17 07:47:42'),
(27, 20, 'Yumna asli', 'yumnapemalang1@gmail.com', 'Not-active', NULL, NULL, NULL, NULL, NULL, 'default-avatar.png', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `averages`
--
ALTER TABLE `averages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `averages_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_key_unique` (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `image_user_reads`
--
ALTER TABLE `image_user_reads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_user_reads_user_id_image_id_unique` (`user_id`,`image_id`),
  ADD KEY `image_user_reads_image_id_foreign` (`image_id`);

--
-- Indeks untuk tabel `langganan`
--
ALTER TABLE `langganan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `langganan_user_id_foreign` (`user_id`),
  ADD KEY `langganan_package_id_foreign` (`package_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paketnews`
--
ALTER TABLE `paketnews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rasios`
--
ALTER TABLE `rasios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rasios_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subs_user_id_foreign` (`user_id`),
  ADD KEY `subs_package_id_foreign` (`package_id`);

--
-- Indeks untuk tabel `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tebusris`
--
ALTER TABLE `tebusris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tebusris_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `teoritis`
--
ALTER TABLE `teoritis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teoritis_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `user_monitor`
--
ALTER TABLE `user_monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_statuses_email_unique` (`email`),
  ADD UNIQUE KEY `user_statuses_username_unique` (`username`),
  ADD UNIQUE KEY `user_statuses_address_unique` (`address`),
  ADD KEY `user_statuses_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `averages`
--
ALTER TABLE `averages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `image_user_reads`
--
ALTER TABLE `image_user_reads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `langganan`
--
ALTER TABLE `langganan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `paketnews`
--
ALTER TABLE `paketnews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rasios`
--
ALTER TABLE `rasios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `subs`
--
ALTER TABLE `subs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tebusris`
--
ALTER TABLE `tebusris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `teoritis`
--
ALTER TABLE `teoritis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `user_monitor`
--
ALTER TABLE `user_monitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_statuses`
--
ALTER TABLE `user_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `averages`
--
ALTER TABLE `averages`
  ADD CONSTRAINT `averages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `image_user_reads`
--
ALTER TABLE `image_user_reads`
  ADD CONSTRAINT `image_user_reads_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `image_user_reads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `langganan`
--
ALTER TABLE `langganan`
  ADD CONSTRAINT `langganan_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `langganan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rasios`
--
ALTER TABLE `rasios`
  ADD CONSTRAINT `rasios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `subs`
--
ALTER TABLE `subs`
  ADD CONSTRAINT `subs_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `subs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tebusris`
--
ALTER TABLE `tebusris`
  ADD CONSTRAINT `tebusris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `teoritis`
--
ALTER TABLE `teoritis`
  ADD CONSTRAINT `teoritis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD CONSTRAINT `user_statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
