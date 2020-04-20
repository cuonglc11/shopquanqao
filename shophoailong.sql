-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 19, 2020 lúc 04:32 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shophoailong`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(10) UNSIGNED NOT NULL,
  `name_category` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Hoa Lụa'),
(2, 'Áo Dài');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colorboard`
--

CREATE TABLE `colorboard` (
  `id_color` int(10) UNSIGNED NOT NULL,
  `name_color` varchar(225) NOT NULL,
  `code_color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `colorboard`
--

INSERT INTO `colorboard` (`id_color`, `name_color`, `code_color`) VALUES
(1, 'Đỏ', '#FF0000'),
(2, 'Blue', '#0000FF');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_flower`
--

CREATE TABLE `db_flower` (
  `id_flower` int(10) UNSIGNED NOT NULL,
  `name_flower` varchar(225) NOT NULL,
  `still` int(11) NOT NULL,
  `pic_flower` varchar(225) NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `id_clorb` int(10) UNSIGNED NOT NULL,
  `soluong` int(112) NOT NULL,
  `price` double NOT NULL,
  `total_money` double NOT NULL,
  `sold` int(11) NOT NULL,
  `proceeds` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `db_flower`
--

INSERT INTO `db_flower` (`id_flower`, `name_flower`, `still`, `pic_flower`, `id_category`, `id_clorb`, `soluong`, `price`, `total_money`, `sold`, `proceeds`) VALUES
(25, 'ww', 0, 'yy.png', 1, 1, 11, 11, 121, 8, 88),
(26, 'sss', 2, 'yy.png', 1, 1, 123, 123, 15129, 121, 14883);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_size`
--

CREATE TABLE `db_size` (
  `id_size` int(10) UNSIGNED NOT NULL,
  `name_size` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `db_size`
--

INSERT INTO `db_size` (`id_size`, `name_size`) VALUES
(1, 'M'),
(2, 'X'),
(3, 'XX'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_su`
--

CREATE TABLE `lich_su` (
  `id` int(11) NOT NULL,
  `time_ban` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tongnhap` double NOT NULL,
  `tongban` double NOT NULL,
  `sl_ban` int(11) NOT NULL,
  `sl_nhap` int(11) NOT NULL,
  `con_hang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lich_su`
--

INSERT INTO `lich_su` (`id`, `time_ban`, `tongnhap`, `tongban`, `sl_ban`, `sl_nhap`, `con_hang`) VALUES
(1, '2020-04-13 13:30:32', 1334674, 666743, 13, 34, 21),
(2, '2020-04-13 15:02:44', 15361, 14981, 139, 245, 106),
(3, '2020-04-13 15:06:25', 15361, 14981, 139, 245, 106),
(4, '2020-04-13 15:17:49', 15361, 14992, 150, 245, 95);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `longdress`
--

CREATE TABLE `longdress` (
  `id_longdress` int(10) UNSIGNED NOT NULL,
  `name_longdress` varchar(255) NOT NULL,
  `pic_longdress` varchar(255) NOT NULL,
  `size_longdress` int(10) UNSIGNED NOT NULL,
  `color_longdress` int(10) UNSIGNED NOT NULL,
  `soluong_longdress` double NOT NULL,
  `picre_longdress` double NOT NULL,
  `conhang_longdress` int(11) NOT NULL,
  `tongtien_longdress` double NOT NULL,
  `daban_longdress` int(11) NOT NULL,
  `thu_longdress` double NOT NULL,
  `cat_longdress` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `longdress`
--

INSERT INTO `longdress` (`id_longdress`, `name_longdress`, `pic_longdress`, `size_longdress`, `color_longdress`, `soluong_longdress`, `picre_longdress`, `conhang_longdress`, `tongtien_longdress`, `daban_longdress`, `thu_longdress`, `cat_longdress`) VALUES
(2, 'f', 'yy.png', 1, 1, 111, 1, 80, 111, 21, 21, 1);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hoailong', 'lucuong837@gmail.com', NULL, '$2y$10$ZfjBx/mWFOgBxZF9CeI2NuJJxleBBM5NU.OkvA6fLGQfvIngk.izi', NULL, '2020-04-11 00:34:45', '2020-04-11 00:34:45');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `colorboard`
--
ALTER TABLE `colorboard`
  ADD PRIMARY KEY (`id_color`);

--
-- Chỉ mục cho bảng `db_flower`
--
ALTER TABLE `db_flower`
  ADD PRIMARY KEY (`id_flower`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_clorb` (`id_clorb`);

--
-- Chỉ mục cho bảng `db_size`
--
ALTER TABLE `db_size`
  ADD PRIMARY KEY (`id_size`);

--
-- Chỉ mục cho bảng `lich_su`
--
ALTER TABLE `lich_su`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `longdress`
--
ALTER TABLE `longdress`
  ADD PRIMARY KEY (`id_longdress`),
  ADD KEY `size_longdress` (`size_longdress`),
  ADD KEY `color_longdress` (`color_longdress`),
  ADD KEY `cat_longdress` (`cat_longdress`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `colorboard`
--
ALTER TABLE `colorboard`
  MODIFY `id_color` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `db_flower`
--
ALTER TABLE `db_flower`
  MODIFY `id_flower` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `db_size`
--
ALTER TABLE `db_size`
  MODIFY `id_size` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lich_su`
--
ALTER TABLE `lich_su`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `longdress`
--
ALTER TABLE `longdress`
  MODIFY `id_longdress` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_flower`
--
ALTER TABLE `db_flower`
  ADD CONSTRAINT `db_flower_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `db_flower_ibfk_2` FOREIGN KEY (`id_clorb`) REFERENCES `colorboard` (`id_color`);

--
-- Các ràng buộc cho bảng `longdress`
--
ALTER TABLE `longdress`
  ADD CONSTRAINT `longdress_ibfk_1` FOREIGN KEY (`size_longdress`) REFERENCES `db_size` (`id_size`),
  ADD CONSTRAINT `longdress_ibfk_2` FOREIGN KEY (`color_longdress`) REFERENCES `colorboard` (`id_color`),
  ADD CONSTRAINT `longdress_ibfk_3` FOREIGN KEY (`cat_longdress`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
