-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 01, 2023 lúc 08:51 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhomf`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_07_111134_create_tbl_admin_table', 1),
(6, '2023_05_09_181417_create_tbl_manu', 1),
(7, '2023_05_09_193916_create_tbl_category', 1),
(8, '2023_05_14_123804_create_tbl_sanpham', 1),
(9, '2023_05_20_050836_create_tbl_user', 1),
(10, '2023_11_30_110022_create_tbl_trans', 2),
(11, '2023_11_30_160144_create_tbl_voucher', 3),
(12, '2023_11_30_160238_create_tbl_pay', 3),
(13, '2023_11_30_160338_create_tbl_area', 3),
(14, '2023_11_30_160354_create_tbl_info', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(130) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '1', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_area`
--

DROP TABLE IF EXISTS `tbl_area`;
CREATE TABLE IF NOT EXISTS `tbl_area` (
  `area_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `area_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_status` int(11) NOT NULL,
  `area_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_area`
--

INSERT INTO `tbl_area` (`area_id`, `area_name`, `area_status`, `area_desc`, `created_at`, `updated_at`) VALUES
(10, '1', 0, NULL, NULL, NULL),
(2, '2', 0, NULL, NULL, NULL),
(3, '3', 0, NULL, NULL, NULL),
(4, '4', 0, NULL, NULL, NULL),
(5, '5', 0, NULL, NULL, NULL),
(6, '6', 0, NULL, NULL, NULL),
(7, '7', 0, NULL, NULL, NULL),
(8, '8', 0, NULL, NULL, NULL),
(9, '9', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `category_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_status`, `category_desc`, `created_at`, `updated_at`) VALUES
(11, 'Cate2', 0, NULL, NULL, NULL),
(10, 'Cate1', 0, NULL, NULL, NULL),
(8, 'Sandals', 0, NULL, NULL, NULL),
(9, 'Sport', 0, NULL, NULL, NULL),
(7, 'Sneaker', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_info`
--

DROP TABLE IF EXISTS `tbl_info`;
CREATE TABLE IF NOT EXISTS `tbl_info` (
  `info_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `info_number` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`info_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_info`
--

INSERT INTO `tbl_info` (`info_id`, `user_id`, `pay_id`, `info_number`, `created_at`, `updated_at`) VALUES
(21, 1, 1, '34', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_manu`
--

DROP TABLE IF EXISTS `tbl_manu`;
CREATE TABLE IF NOT EXISTS `tbl_manu` (
  `manu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manu_status` int(11) NOT NULL,
  `manu_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_manu`
--

INSERT INTO `tbl_manu` (`manu_id`, `manu_name`, `manu_status`, `manu_desc`, `created_at`, `updated_at`) VALUES
(14, 'Manu4', 0, NULL, NULL, NULL),
(13, 'Manu3', 0, NULL, NULL, NULL),
(6, 'Bitis', 0, NULL, NULL, NULL),
(9, 'Adidas', 0, NULL, NULL, NULL),
(10, 'Puma', 0, NULL, NULL, NULL),
(11, 'Manu1', 0, NULL, NULL, NULL),
(12, 'Manu2', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_pay`
--

DROP TABLE IF EXISTS `tbl_pay`;
CREATE TABLE IF NOT EXISTS `tbl_pay` (
  `pay_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pay_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_status` int(11) NOT NULL,
  `pay_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_pay`
--

INSERT INTO `tbl_pay` (`pay_id`, `pay_name`, `pay_status`, `pay_desc`, `created_at`, `updated_at`) VALUES
(1, 'COD1', 0, NULL, NULL, NULL),
(2, 'Banking', 0, NULL, NULL, NULL),
(3, 'VNPAY', 0, NULL, NULL, NULL),
(4, 'MoMo', 0, NULL, NULL, NULL),
(5, 'Nhan Hang Truc Tiep', 0, NULL, NULL, NULL),
(6, '1', 0, NULL, NULL, NULL),
(8, 'QR', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

DROP TABLE IF EXISTS `tbl_sanpham`;
CREATE TABLE IF NOT EXISTS `tbl_sanpham` (
  `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `manu_id` int(11) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`product_id`, `category_id`, `manu_id`, `product_image`, `product_name`, `product_price`, `product_status`, `product_desc`, `created_at`, `updated_at`) VALUES
(25, 7, 12, 'OIP.png', 'Giay9', '30000', 0, NULL, NULL, NULL),
(24, 9, 14, 'OIP.png', 'Giay8', '900000', 0, NULL, NULL, NULL),
(14, 9, 10, 'OIP.png', 'Giay 1', '1000000', 0, NULL, NULL, NULL),
(15, 8, 6, 'OIP.png', 'Giay 2', '300000', 0, NULL, NULL, NULL),
(16, 9, 10, 'OIP.png', 'Giay 3', '1000000', 0, NULL, NULL, NULL),
(17, 7, 9, 'OIP.png', 'Giay 4', '5555555', 0, NULL, NULL, NULL),
(18, 9, 10, 'OIP.png', 'Giay 6', '4500000', 0, NULL, NULL, NULL),
(19, 8, 9, 'OIP.png', 'Giay 7', '300000', 0, NULL, NULL, NULL),
(26, 9, 11, 'OIP.png', 'Giay10', '300000', 0, NULL, NULL, NULL),
(27, 8, 13, 'OIP.png', 'Giay11', '450000', 0, NULL, NULL, NULL),
(28, 7, 10, 'OIP.png', 'Giay12', '370000', 0, NULL, NULL, NULL),
(29, 8, 14, 'OIP.png', 'Giay13', '444444', 0, NULL, NULL, NULL),
(30, 9, 9, 'OIP.png', 'Giay15', '500000', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_trans`
--

DROP TABLE IF EXISTS `tbl_trans`;
CREATE TABLE IF NOT EXISTS `tbl_trans` (
  `trans_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `trans_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_status` int(11) NOT NULL,
  `trans_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_trans`
--

INSERT INTO `tbl_trans` (`trans_id`, `trans_name`, `trans_status`, `trans_desc`, `created_at`, `updated_at`) VALUES
(4, 'GHST', 0, NULL, NULL, NULL),
(5, '1', 0, NULL, NULL, NULL),
(6, '2', 0, NULL, NULL, NULL),
(7, '3', 0, NULL, NULL, NULL),
(8, '4', 0, NULL, NULL, NULL),
(9, '5', 0, NULL, NULL, NULL),
(10, 'vvvvv', 0, NULL, NULL, NULL),
(11, 'vvvvv', 0, NULL, NULL, NULL),
(12, '<!DOCTYPE html>  <head>     <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Home :: w3layouts</title>     <meta name=\"viewport\" content=\"width=device-width, initial-sc', 0, NULL, NULL, NULL),
(13, 'abc', 0, '<!DOCTYPE html>\r\n\r\n<head>\r\n    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Home :: w3layouts</title>\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-sc', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `tbl_user_user_email_unique` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'user1@user1.com', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_voucher`
--

DROP TABLE IF EXISTS `tbl_voucher`;
CREATE TABLE IF NOT EXISTS `tbl_voucher` (
  `vou_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vou_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vou_status` int(11) NOT NULL,
  `vou_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`vou_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_voucher`
--

INSERT INTO `tbl_voucher` (`vou_id`, `vou_name`, `vou_status`, `vou_desc`, `created_at`, `updated_at`) VALUES
(5, 'v1', 0, NULL, NULL, NULL),
(2, 'v2', 0, '33%', NULL, NULL),
(3, 'v3', 0, NULL, NULL, NULL),
(4, 'v4', 0, NULL, NULL, NULL),
(6, 'v5', 0, NULL, NULL, NULL),
(7, 'v6', 0, NULL, NULL, NULL),
(8, 'v7', 0, NULL, NULL, NULL),
(9, 'v9', 0, '10%', NULL, NULL),
(10, 'm99', 0, '90000', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_name_unique` (`user_name`),
  UNIQUE KEY `users_user_email_unique` (`user_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
