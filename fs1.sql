-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 10:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fs1`
--

-- --------------------------------------------------------

--
-- Table structure for table `dich_vu`
--

CREATE TABLE `dich_vu` (
  `id_dv` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dich_vu`
--

INSERT INTO `dich_vu` (`id_dv`, `name`, `gia`) VALUES
(1, 'Sting', 10000),
(2, 'nước lọc', 15000),
(3, 'mì tôm', 20000);

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
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id_hd` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gio_bat_dau` datetime NOT NULL,
  `tg_tao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`id_hd`, `id_phong`, `id_user`, `gio_bat_dau`, `tg_tao`) VALUES
(1, 1, 2, '2022-08-08 02:10:00', '2022-08-08 04:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_ct`
--

CREATE TABLE `hoa_don_ct` (
  `id_hdct` int(11) NOT NULL,
  `id_hd` int(11) NOT NULL,
  `id_dich_vu` int(11) NOT NULL,
  `gio_ket_thuc` datetime NOT NULL,
  `thanh_toan` tinyint(4) NOT NULL,
  `gio_tao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don_ct`
--

INSERT INTO `hoa_don_ct` (`id_hdct`, `id_hd`, `id_dich_vu`, `gio_ket_thuc`, `thanh_toan`, `gio_tao`) VALUES
(2, 1, 2, '2022-08-08 04:15:00', 0, '2022-08-08 04:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_dv`
--

CREATE TABLE `hoa_don_dv` (
  `id_hddv` int(11) NOT NULL,
  `id_dv` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don_dv`
--

INSERT INTO `hoa_don_dv` (`id_hddv`, `id_dv`, `so_luong`, `create_at`) VALUES
(1, 1, 2, '2022-02-08 03:10:00'),
(2, 2, 2, '2022-02-08 05:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don _dv_ct`
--

CREATE TABLE `hoa_don _dv_ct` (
  `id_hd_dv_ct` int(11) NOT NULL,
  `id_hddv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loai_phong`
--

CREATE TABLE `loai_phong` (
  `id_loai` int(11) NOT NULL,
  `loai` varchar(50) NOT NULL,
  `gia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loai_phong`
--

INSERT INTO `loai_phong` (`id_loai`, `loai`, `gia`) VALUES
(1, 'thường', 300000),
(2, 'vip', 500000),
(3, 'nike', 100000000),
(4, 'nike5', 100000000),
(5, 'nike5', 100000000),
(6, 'nike5', 10);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `phongloai`
--

CREATE TABLE `phongloai` (
  `id` int(11) NOT NULL,
  `loai` varchar(50) NOT NULL,
  `gia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phongloai`
--

INSERT INTO `phongloai` (`id`, `loai`, `gia`) VALUES
(1, 'vip', 200000),
(2, 'thường', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `phong_nghi`
--

CREATE TABLE `phong_nghi` (
  `id_room` int(11) NOT NULL,
  `so_phong` int(11) NOT NULL,
  `loai_phong` int(11) NOT NULL,
  `tinh_trang` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phong_nghi`
--

INSERT INTO `phong_nghi` (`id_room`, `so_phong`, `loai_phong`, `tinh_trang`) VALUES
(1, 101, 1, 0),
(2, 102, 1, 1),
(3, 103, 2, 0),
(4, 104, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `phone` char(10) NOT NULL,
  `quyen` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`, `phone`, `quyen`) VALUES
(1, 'hiep1', '123', '123456789', 1),
(2, 'hiep2', '123', '123456889', 0);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD PRIMARY KEY (`id_dv`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `id_phong` (`id_phong`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `hoa_don_ct`
--
ALTER TABLE `hoa_don_ct`
  ADD PRIMARY KEY (`id_hdct`),
  ADD KEY `id_dich_vu` (`id_dich_vu`),
  ADD KEY `id_hd` (`id_hd`);

--
-- Indexes for table `hoa_don_dv`
--
ALTER TABLE `hoa_don_dv`
  ADD PRIMARY KEY (`id_hddv`);

--
-- Indexes for table `hoa_don _dv_ct`
--
ALTER TABLE `hoa_don _dv_ct`
  ADD PRIMARY KEY (`id_hd_dv_ct`),
  ADD KEY `id_hddv` (`id_hddv`);

--
-- Indexes for table `loai_phong`
--
ALTER TABLE `loai_phong`
  ADD PRIMARY KEY (`id_loai`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phongloai`
--
ALTER TABLE `phongloai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phong_nghi`
--
ALTER TABLE `phong_nghi`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `loai_phong` (`loai_phong`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `dich_vu`
--
ALTER TABLE `dich_vu`
  MODIFY `id_dv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoa_don_ct`
--
ALTER TABLE `hoa_don_ct`
  MODIFY `id_hdct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoa_don_dv`
--
ALTER TABLE `hoa_don_dv`
  MODIFY `id_hddv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoa_don _dv_ct`
--
ALTER TABLE `hoa_don _dv_ct`
  MODIFY `id_hd_dv_ct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_phong`
--
ALTER TABLE `loai_phong`
  MODIFY `id_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `phongloai`
--
ALTER TABLE `phongloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phong_nghi`
--
ALTER TABLE `phong_nghi`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`id_phong`) REFERENCES `phong_nghi` (`id_room`),
  ADD CONSTRAINT `hoa_don_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `hoa_don_ct`
--
ALTER TABLE `hoa_don_ct`
  ADD CONSTRAINT `hoa_don_ct_ibfk_1` FOREIGN KEY (`id_dich_vu`) REFERENCES `dich_vu` (`id_dv`),
  ADD CONSTRAINT `hoa_don_ct_ibfk_2` FOREIGN KEY (`id_hd`) REFERENCES `hoa_don` (`id_hd`);

--
-- Constraints for table `phong_nghi`
--
ALTER TABLE `phong_nghi`
  ADD CONSTRAINT `phong_nghi_ibfk_1` FOREIGN KEY (`loai_phong`) REFERENCES `loai_phong` (`id_loai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
