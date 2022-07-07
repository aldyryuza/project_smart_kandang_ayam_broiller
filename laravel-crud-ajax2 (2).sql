-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 05:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-crud-ajax2`
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
-- Table structure for table `master_kandang`
--

CREATE TABLE `master_kandang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alamat_kandang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac` bigint(20) UNSIGNED DEFAULT NULL,
  `populasi_ayam` int(11) NOT NULL,
  `tanggal_ayam_masuk` date DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_kandang`
--

INSERT INTO `master_kandang` (`id`, `alamat_kandang`, `mac`, `populasi_ayam`, `tanggal_ayam_masuk`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Kademangan', NULL, 0, '2022-06-30', '1', '2022-06-09 14:45:25', '2022-06-30 07:13:12'),
(7, 'Bangsri 3', 2, 100, '2022-06-30', '0', '2022-06-27 16:06:49', '2022-06-30 05:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `master_pakan`
--

CREATE TABLE `master_pakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_pakan` int(11) NOT NULL,
  `jenis_pakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_pakan`
--

INSERT INTO `master_pakan` (`id`, `total_pakan`, `jenis_pakan`, `created_at`, `updated_at`) VALUES
(1, 87, 'Katul', '2022-06-06 10:24:36', '2022-06-14 03:19:17'),
(2, 100, 'Sentart', '2022-06-14 03:19:39', '2022-06-14 03:19:39');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_26_121740_create_siswas_table', 1),
(6, '2022_05_20_124212_create_master_pakan', 1),
(7, '2022_05_22_105745_create_tabel_iot', 1),
(8, '2022_05_22_110030_create_master_kandang', 1),
(9, '2022_05_22_111210_create_panen', 1),
(10, '2022_05_22_111537_create_rekap_harian', 1),
(11, '2022_06_26_151438_add_deleted_at_to_rekap_harian_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `panen`
--

CREATE TABLE `panen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kandang` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `umur_panen` int(11) NOT NULL,
  `populasi_akhir` int(11) NOT NULL,
  `bobot_panen` int(11) NOT NULL,
  `harga_panen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panen`
--

INSERT INTO `panen` (`id`, `id_kandang`, `tanggal`, `umur_panen`, `populasi_akhir`, `bobot_panen`, `harga_panen`, `created_at`, `updated_at`) VALUES
(13, 5, '2022-06-27', 19, 981, 50, 6000000, '2022-06-27 16:51:53', '2022-06-27 16:51:53'),
(14, 5, '2022-06-30', 0, 990, 50, 6000000, '2022-06-30 07:13:12', '2022-06-30 07:13:12');

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
-- Table structure for table `rekap_harian`
--

CREATE TABLE `rekap_harian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kandang` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `ayam_mati` int(11) NOT NULL,
  `id_pakan` bigint(20) UNSIGNED NOT NULL,
  `pakan_keluar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekap_harian`
--

INSERT INTO `rekap_harian` (`id`, `id_kandang`, `tanggal`, `ayam_mati`, `id_pakan`, `pakan_keluar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(25, 5, '2022-06-26', 10, 1, 2, '2022-06-25 15:05:51', '2022-06-27 16:51:53', '2022-06-26 17:00:00'),
(28, 5, '2022-06-26', 10, 1, 2, '2022-06-26 10:44:28', '2022-06-27 16:51:53', '2022-06-26 17:00:00'),
(29, 5, '2022-06-27', 0, 1, 0, '2022-06-27 17:00:48', '2022-06-30 07:12:42', '2022-06-30 07:12:42'),
(30, 5, '2022-06-30', 4, 1, 2, '2022-06-30 07:11:20', '2022-06-30 07:11:49', '2022-06-30 07:11:49'),
(31, 5, '2022-06-30', 10, 1, 2, '2022-06-30 07:12:54', '2022-06-30 07:13:12', '2022-06-29 17:00:00');

--
-- Triggers `rekap_harian`
--
DELIMITER $$
CREATE TRIGGER `hapus ayam` BEFORE DELETE ON `rekap_harian` FOR EACH ROW UPDATE master_kandang b set 
b.populasi_ayam = b.populasi_ayam + old.ayam_mati WHERE 
b.id = old.id_kandang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus_pakan` BEFORE DELETE ON `rekap_harian` FOR EACH ROW UPDATE master_pakan b set 
b.total_pakan = b.total_pakan + old.pakan_keluar WHERE 
b.id = old.id_pakan
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangi ayam` BEFORE INSERT ON `rekap_harian` FOR EACH ROW UPDATE master_kandang b set b.populasi_ayam = b.populasi_ayam - new.ayam_mati WHERE b.id = new.id_kandang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangi_pakan` BEFORE INSERT ON `rekap_harian` FOR EACH ROW UPDATE master_pakan b set b.total_pakan = b.total_pakan - new.pakan_keluar WHERE b.id = new.id_pakan
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubah_ayam` BEFORE UPDATE ON `rekap_harian` FOR EACH ROW UPDATE master_kandang b set b.populasi_ayam = b.populasi_ayam + old.ayam_mati - new.ayam_mati WHERE b.id = old.id_kandang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubah_pakan` BEFORE UPDATE ON `rekap_harian` FOR EACH ROW UPDATE master_pakan b set b.total_pakan = b.total_pakan + old.pakan_keluar - new.pakan_keluar WHERE b.id = old.id_pakan
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_iot`
--

CREATE TABLE `tabel_iot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelembapan` double DEFAULT NULL,
  `suhu` double DEFAULT NULL,
  `amonia` double DEFAULT NULL,
  `relay1` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relay2` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_iot`
--

INSERT INTO `tabel_iot` (`id`, `kelembapan`, `suhu`, `amonia`, `relay1`, `relay2`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 5, '0', '1', '2022-06-06 10:22:55', '2022-06-14 08:51:29'),
(2, 2, NULL, NULL, '1', '1', '2022-06-09 14:40:25', '2022-06-30 05:09:53'),
(3, NULL, NULL, NULL, NULL, NULL, '2022-06-25 14:42:55', '2022-06-25 14:42:55');

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
(1, 'admin', 'user@email.com', NULL, '$2y$10$ZlOE5PvNKKc9i7OtKbaO4eR45mg3C6fEgHGatOP00qQdfE7TTCSWi', NULL, '2022-06-06 10:30:47', '2022-06-06 10:30:47');

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
-- Indexes for table `master_kandang`
--
ALTER TABLE `master_kandang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_kandang_mac_foreign` (`mac`);

--
-- Indexes for table `master_pakan`
--
ALTER TABLE `master_pakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panen`
--
ALTER TABLE `panen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panen_id_kandang_foreign` (`id_kandang`);

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
-- Indexes for table `rekap_harian`
--
ALTER TABLE `rekap_harian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekap_harian_id_kandang_foreign` (`id_kandang`),
  ADD KEY `rekap_harian_id_pakan_foreign` (`id_pakan`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_iot`
--
ALTER TABLE `tabel_iot`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_kandang`
--
ALTER TABLE `master_kandang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_pakan`
--
ALTER TABLE `master_pakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `panen`
--
ALTER TABLE `panen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekap_harian`
--
ALTER TABLE `rekap_harian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_iot`
--
ALTER TABLE `tabel_iot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_kandang`
--
ALTER TABLE `master_kandang`
  ADD CONSTRAINT `master_kandang_mac_foreign` FOREIGN KEY (`mac`) REFERENCES `tabel_iot` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panen`
--
ALTER TABLE `panen`
  ADD CONSTRAINT `panen_id_kandang_foreign` FOREIGN KEY (`id_kandang`) REFERENCES `master_kandang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rekap_harian`
--
ALTER TABLE `rekap_harian`
  ADD CONSTRAINT `rekap_harian_id_kandang_foreign` FOREIGN KEY (`id_kandang`) REFERENCES `master_kandang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekap_harian_id_pakan_foreign` FOREIGN KEY (`id_pakan`) REFERENCES `master_pakan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
