-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2016 at 05:00 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eling_bening`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `nama`, `email`, `pesan`, `status`, `created_at`, `updated_at`) VALUES
(3, 'wahyu dhira ashandy', 'wahyu.dhiraashandy8@gmail.com', 'I would like to meet you to discuss the latest news about the arrival of the new theme. They say it is going to be one the best themes on the market', '0', '2016-11-24 20:32:36', '2016-11-24 13:48:21'),
(4, 'wahyu dhira ashandy', 'wahyu.dhiraashandy8@gmail.com', 'I would like to meet you to discuss the latest news about the arrival of the new theme. They say it is going to be one the best themes on the market', '1', '2016-11-24 20:33:34', '2016-11-24 13:39:56'),
(5, 'admin', 'admin2@admin.com', 'I would like to meet you to discuss the latest news about the arrival of the new theme. They say it is going to be one the best themes on the market', '1', '2016-11-24 20:33:58', '2016-11-24 13:39:58'),
(6, 'wahyu', 'dialovers_fc@yahoo.com', 'I would like to meet you to discuss the latest news about the arrival of the new theme. They say it is going to be one the best themes on the market', '1', '2016-11-24 20:35:11', '2016-11-24 20:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_23_204357_create_tikets_table', 2),
(4, '2016_11_23_205244_create_pegawais_table', 2),
(5, '2016_11_23_220147_create_user_table', 2),
(6, '2016_11_24_170143_create_pesans_table', 3),
(7, '2016_11_24_170931_create_messages_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `kode_pegawai` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('administrator','casier') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`kode_pegawai`, `name`, `picture`, `gender`, `phone`, `level`, `created_at`, `updated_at`) VALUES
('PG001', 'wahyu dhira ashandy', 'wahyu-dhira-ashandy-37928-EB.jpg', 'male', '(0857) 28-669-878', 'casier', '2016-11-23 17:30:05', '2016-11-25 10:18:22'),
('PG002', 'wwwwwwwwww', 'wwwwwwwwww-63281-EB.jpg', 'male', '(1111) 11-111-111', 'casier', '2016-11-25 10:14:18', '2016-11-25 10:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `tikets`
--

CREATE TABLE `tikets` (
  `no_tiket` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tahun` int(4) NOT NULL,
  `phone` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `price` int(20) NOT NULL,
  `total_cost` int(20) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `msg` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tikets`
--

INSERT INTO `tikets` (`no_tiket`, `nama`, `alamat`, `tanggal`, `tahun`, `phone`, `jumlah`, `price`, `total_cost`, `status`, `msg`, `created_at`, `updated_at`) VALUES
('T0001', 'wahyu dhira ashandy', 'surakarta', '2016-11-27', 2016, '(9876) 54-345-678', 1, 15000, 15000, '1', '1', '2016-11-25 01:18:50', '2016-11-25 01:19:05'),
('T0002', 'aaaaaaaaaaa', 'surakarta', '2016-11-28', 2016, '(3456) 78-622-345', 2, 15000, 30000, '1', '1', '2016-11-25 01:30:46', '2016-11-25 07:35:39'),
('T0003', 'wahyu dhira ashandy', 'surakarta', '2016-12-02', 2016, '(2222) 22-222-222', 3, 15000, 45000, '1', '1', '2016-11-25 05:56:08', '2016-11-25 07:35:37'),
('T0004', 'validassi', 'surakarta', '2016-10-07', 2016, '(1111) 11-111-111', 5, 15000, 75000, '1', '1', '2016-11-25 06:24:35', '2016-11-25 07:35:34'),
('T0005', 'wahyu dhira ashandy', 'surakarta', '2016-11-30', 2016, '(1111) 11-111-111', 2, 15000, 30000, '1', '1', '2016-11-25 08:55:36', '2016-11-25 10:00:17'),
('T0006', 'aaaaaaaaaaa', 'aaa', '2016-11-28', 2016, '(4444) 44-444-444', 2, 15000, 30000, '1', '1', '2016-11-25 08:55:53', '2016-11-25 10:00:23'),
('T0008', 'wahyu dhira ashandy', 'surakarta', '2016-11-29', 2016, '(2222) 22-222-222', 1, 15000, 15000, '1', '1', '2016-11-25 08:57:27', '2016-11-25 10:00:20'),
('T0009', 'wahyu dhira ashandy', 'surakarta', '2016-11-30', 2016, '(1111) 11-111-111', 1, 15000, 15000, '1', '1', '2016-11-25 10:50:31', '2016-11-26 02:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expired` timestamp NULL DEFAULT NULL,
  `pegawai_kode` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `expired`, `pegawai_kode`, `created_at`, `updated_at`) VALUES
(1, 'wahyu', 'wahyu.dhiraashandy8@gmail.com', '$2y$10$L2Cm7eVq6U4AAmtUBAY1Y.lhHFJyWz8lXhbYPrkm47Vy9v8Fv6oh.', '2xGKcIAUr8jXzKXUq5WIDkG4xdjXbhja0VwxbETvQdzIEgIi6TxecRvQLfvf', '2016-11-26 09:49:46', 'PG001', '2016-11-23 17:30:06', '2016-11-26 02:49:46'),
(5, 'PG002', 'wwwwwwwwww@gmail.com', '$2y$10$mJARWeo.GHVE8Yr9zp923upvX5MWvbAaz0E.FYA7A5kdRPxUBYBHi', NULL, NULL, 'PG002', '2016-11-25 10:14:18', '2016-11-25 10:14:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kode_pegawai`);

--
-- Indexes for table `tikets`
--
ALTER TABLE `tikets`
  ADD PRIMARY KEY (`no_tiket`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_pegawai_kode_foreign` (`pegawai_kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_pegawai_kode_foreign` FOREIGN KEY (`pegawai_kode`) REFERENCES `pegawai` (`kode_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
