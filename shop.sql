-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2021 lúc 04:38 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_accs`
--

CREATE TABLE `class_accs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class_accs`
--

INSERT INTO `class_accs` (`id`, `class`, `created_at`, `updated_at`) VALUES
(1, 'Kiếm', NULL, NULL),
(2, 'Tiêu', NULL, NULL),
(3, 'Kunai', NULL, NULL),
(4, 'Cung', NULL, NULL),
(5, 'Đao', NULL, NULL),
(6, 'Quạt', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(34, '2014_10_12_000000_create_users_table', 1),
(35, '2021_08_24_090220_create_servers_table', 1),
(36, '2021_08_24_090314_create_class_accs_table', 1),
(37, '2021_08_24_090337_create_nicks_table', 1),
(38, '2021_08_24_090426_create_reciepts_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nicks`
--

CREATE TABLE `nicks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ingame` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,0) NOT NULL,
  `clan` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 1,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `sv_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nicks`
--

INSERT INTO `nicks` (`id`, `ingame`, `price`, `clan`, `level`, `class_id`, `sv_id`, `images`, `notes`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'c5cotos2', '480', 0, 90, 3, 4, '[\"c5cotos20.jpg\",\"c5cotos21.jpg\",\"c5cotos22.jpg\"]', NULL, 'cotos2', '123456', 1, NULL, NULL),
(2, 's2vuaninja', '3750', 0, 59, 6, 2, '[\"s2vuaninja0.jpg\",\"s2vuaninja1.jpg\",\"s2vuaninja2.jpg\",\"s2vuaninja3.jpg\",\"s2vuaninja4.jpg\"]', '<p>QUẠT 59 SV2 GẦN FULL SET MCS S&Oacute;I TL652 C&Ograve;N 1 TỈ 123M Y&Ecirc;N</p>', 's2vuaninja', '123456', 1, NULL, NULL),
(3, 'x1nloibome', '1300', 0, 70, 6, 1, '[\"x1nloibome0.jpg\",\"x1nloibome1.jpg\",\"x1nloibome2.jpg\",\"x1nloibome3.jpg\",\"x1nloibome4.jpg\",\"x1nloibome5.jpg\"]', '<p>QUẠT 70 SV1 S&Oacute;I TL6664 C&Ograve;N 17M Y&Ecirc;N</p>', 'xinloibome', '123456', 1, NULL, NULL),
(4, 'toilakunai', '300', 0, 70, 3, 6, '[\"toilakunai0.jpg\",\"toilakunai1.jpg\",\"toilakunai2.jpg\"]', '<p>Full 12&nbsp;</p>', 'kunai1', 'kunai1', 1, NULL, NULL),
(5, 'conandms4', '150', 0, 76, 6, 4, '[\"conandms40.jpg\",\"conandms41.jpg\",\"conandms42.jpg\"]', '<p>Quạt max buff</p>', 'connan1', '123456', 1, NULL, NULL),
(6, '6789dkmn', '1400', 0, 98, 2, 5, '[\"6789dkmn0.jpg\",\"6789dkmn1.jpg\",\"6789dkmn2.jpg\",\"6789dkmn3.jpg\",\"6789dkmn4.jpg\",\"6789dkmn5.jpg\",\"6789dkmn6.jpg\",\"6789dkmn7.jpg\"]', '<p>TI&Ecirc;U98 VK13 FULL1314 S&Oacute;I5S XỊN</p>', 'toiladuy', '123456', 1, NULL, NULL),
(7, 'cdh69a', '260', 0, 79, 1, 3, '[\"cdh69a0.jpg\",\"cdh69a1.jpg\",\"cdh69a2.jpg\"]', '<p>&nbsp;KIEM 79; FULL+8; CON 55M Y&Ecirc;N</p>', 'cdh69a', '123456', 0, NULL, '2021-12-10 07:07:55'),
(8, 'toithanhcon', '2000', 1, 90, 3, 2, '[\"toithanhcon0.jpg\",\"toithanhcon1.jpg\",\"toithanhcon2.jpg\",\"toithanhcon3.jpg\",\"toithanhcon4.jpg\"]', '<p>Tộc trưởng gia tộc</p>', 'ailatoi', '123456', 1, NULL, NULL),
(9, '10diemnha', '3000', 0, 123, 2, 7, '[\"10diemnha0.jpg\",\"10diemnha1.jpg\",\"10diemnha2.jpg\",\"10diemnha3.jpg\",\"10diemnha4.jpg\"]', '<p>Lv 123 Full 16</p>', 'khonghack', '123456', 1, NULL, NULL),
(10, 'gamedequa', '9000', 0, 90, 2, 7, '[\"gamedequa0.jpg\",\"gamedequa1.jpg\",\"gamedequa2.jpg\",\"gamedequa3.jpg\",\"gamedequa4.jpg\"]', '<p>Full 16 tinh luyện 9</p>', 'nsoddd', '123456', 1, NULL, NULL),
(11, 'ninjane', '3240', 0, 69, 5, 7, '[\"ninjane0.jpg\",\"ninjane1.jpg\",\"ninjane2.jpg\"]', '<p>Full 14 tinh luyện 6</p>', 'ninjane', 'ninjane', 1, '2021-12-10 06:01:59', '2021-12-10 06:01:59'),
(12, 'khongconick', '69000', 1, 130, 2, 6, '[\"khongconick0.jpg\",\"khongconick1.jpg\",\"khongconick2.jpg\",\"khongconick3.jpg\",\"khongconick4.jpg\",\"khongconick5.jpg\"]', '<p>Full 16 tinh luyện 9, full ngọc 6 s&oacute;i 5 sao chỉ số ngon, tộc trưởng gia tộc</p>', 'khongconick', '123456', 1, '2021-12-10 06:03:26', '2021-12-10 06:03:26'),
(13, 'nickcuoine', '3000', 0, 120, 4, 2, '[\"nickcuoine0.jpg\",\"nickcuoine1.jpg\",\"nickcuoine2.jpg\",\"nickcuoine3.jpg\",\"nickcuoine4.jpg\",\"nickcuoine5.jpg\"]', '<p>Full 12, vũ kh&iacute; 14</p>', 'nickcuoine', '345621', 1, '2021-12-10 06:04:24', '2021-12-10 06:04:24'),
(14, 'trum9x', '9200', 0, 90, 1, 3, '[\"trum9x0.jpg\",\"trum9x1.jpg\",\"trum9x2.jpg\",\"trum9x3.jpg\",\"trum9x4.jpg\",\"trum9x5.jpg\",\"trum9x6.jpg\"]', '<p>Full 16</p>', 'trum9x', 'trum9x', 1, '2021-12-10 06:09:02', '2021-12-10 06:09:02'),
(15, 'ulatroi', '3430', 0, 123, 4, 4, '[\"ulatroi0.jpg\",\"ulatroi1.jpg\",\"ulatroi2.jpg\",\"ulatroi3.jpg\",\"ulatroi4.jpg\",\"ulatroi5.jpg\"]', '<p>Cung full 14</p>', 'ulatroi', 'ulatroi', 1, '2021-12-10 06:09:46', '2021-12-10 06:09:46'),
(16, 'khongconai', '900', 0, 100, 2, 2, '[\"khongconai0.jpg\",\"khongconai1.jpg\",\"khongconai2.jpg\",\"khongconai3.jpg\"]', '<p>Ti&ecirc;u full 12</p>', 'khongconai', 'khongconai', 1, '2021-12-10 06:10:39', '2021-12-10 06:10:39'),
(17, 'danchoisome', '1230', 0, 100, 2, 2, '[\"danchoisome0.jpg\",\"danchoisome1.jpg\",\"danchoisome2.jpg\"]', '<p>Full 12</p>', 'conbocuoi', '1234', 1, '2021-12-10 06:11:54', '2021-12-10 06:11:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reciepts`
--

CREATE TABLE `reciepts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nick_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reciepts`
--

INSERT INTO `reciepts` (`id`, `code`, `user_id`, `nick_id`, `created_at`, `updated_at`) VALUES
(1, '2797269', 2, 7, '2021-12-10 07:07:55', '2021-12-10 07:07:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `servers`
--

CREATE TABLE `servers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sv_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `servers`
--

INSERT INTO `servers` (`id`, `sv_name`, `created_at`, `updated_at`) VALUES
(1, 'Bokken', NULL, NULL),
(2, 'Shuriken', NULL, NULL),
(3, 'Tessen', NULL, NULL),
(4, 'Kunai', NULL, NULL),
(5, 'Katana', NULL, NULL),
(6, 'Tone', NULL, NULL),
(7, 'Sanzu', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money` decimal(12,0) NOT NULL DEFAULT 0,
  `admin` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `google_id`, `avatar`, `money`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$ID1SBmg2eX35yBZyUOAlxeWxo8oTd9blUsCaLtyU2rxobCbkQhv8a', NULL, NULL, '0', 0, NULL, NULL, NULL),
(2, 'Người dùng 1', 'nguoidung1@gmail.com', '$2y$10$wRvN.mR/VldBQaMTV9D8lunRROK7435LMCZ368AH0r3sDvUARCwn.', NULL, 'nguoidung1@gmail.com.jpeg', '8740', 1, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `class_accs`
--
ALTER TABLE `class_accs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nicks`
--
ALTER TABLE `nicks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nicks_class_id_foreign` (`class_id`),
  ADD KEY `nicks_sv_id_foreign` (`sv_id`);

--
-- Chỉ mục cho bảng `reciepts`
--
ALTER TABLE `reciepts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reciepts_code_unique` (`code`),
  ADD KEY `reciepts_user_id_foreign` (`user_id`),
  ADD KEY `reciepts_nick_id_foreign` (`nick_id`);

--
-- Chỉ mục cho bảng `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `class_accs`
--
ALTER TABLE `class_accs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `nicks`
--
ALTER TABLE `nicks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `reciepts`
--
ALTER TABLE `reciepts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `servers`
--
ALTER TABLE `servers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nicks`
--
ALTER TABLE `nicks`
  ADD CONSTRAINT `nicks_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class_accs` (`id`),
  ADD CONSTRAINT `nicks_sv_id_foreign` FOREIGN KEY (`sv_id`) REFERENCES `servers` (`id`);

--
-- Các ràng buộc cho bảng `reciepts`
--
ALTER TABLE `reciepts`
  ADD CONSTRAINT `reciepts_nick_id_foreign` FOREIGN KEY (`nick_id`) REFERENCES `nicks` (`id`),
  ADD CONSTRAINT `reciepts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
