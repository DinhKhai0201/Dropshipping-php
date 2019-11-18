-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 15, 2019 lúc 05:01 PM
-- Phiên bản máy phục vụ: 5.7.27-0ubuntu0.19.04.1
-- Phiên bản PHP: 7.2.24-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dropshipping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `user_id` int(11) NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `num_of_click` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `page` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `user_id`, `url`, `image`, `num_of_click`, `status`, `page`, `position`, `created`, `updated`) VALUES
(1, 'asdasd', 'asdasdasd', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', '2019/10/14/2019-10-14-157102027979178.png', 0, 1, 1, 5, '2019-10-14 02:31:19', '2019-10-14 02:36:16'),
(2, 'adasd', '<p>&aacute;dasdasd&aacute;dasd</p>\r\n', 5, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', '2019/10/14/2019-10-14-157102345792747.png', 0, 0, 1, 4, '2019-10-14 02:35:39', '2019-10-14 03:24:20'),
(3, 'adasd', NULL, 5, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', '2019/10/14/2019-10-14-157102105462131.png', 0, 1, 1, 4, '2019-10-14 02:44:14', '2019-10-14 02:44:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `slug`, `name`, `logo`, `created`, `updated`) VALUES
(1, 'Adidas', 'adidas', NULL, '2019-10-08 09:09:31', '2019-10-23 20:49:19'),
(2, 'Camel', 'camel', NULL, '2019-10-08 09:09:32', '2019-10-23 20:49:23'),
(3, 'Chanel', 'chanel', NULL, '2019-10-11 09:38:01', '2019-10-23 20:49:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_types`
--

CREATE TABLE `category_types` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `parentId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rankingNo` int(11) DEFAULT '0',
  `categoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_types`
--

INSERT INTO `category_types` (`id`, `level`, `parentId`, `rankingNo`, `categoryName`, `slug`, `status`) VALUES
(5, 1, '', 0, 'Fashion women', 'fashion-women', 'active'),
(6, 1, '', 0, 'Fashion Men', 'fashion-men', 'active'),
(7, 2, '5', 0, 'Skirt', 'skirt', 'active'),
(8, 2, '5', 0, 'Dress', 'dress', 'active'),
(9, 2, '6', 0, 'Short', 'short', 'active'),
(10, 3, '7', 0, 'Long Skirt', 'long-skirt', 'active'),
(11, 4, '10', 0, 'Long skirt axcd', 'long-skirt-axcd', 'active'),
(12, 4, '10', 0, 'Long skirt axcd2', 'long-skirt-axcd2', 'active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contents` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `decription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `percent_value` int(11) NOT NULL DEFAULT '0',
  `fix_value` int(11) NOT NULL DEFAULT '0',
  `time_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_end` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `slug`, `coupon_code`, `status`, `decription`, `type`, `percent_value`, `fix_value`, `time_start`, `time_end`, `created`, `updated`) VALUES
(1, 'assasd', 'assasd', 'sdf', 1, 'asdasd', 0, 9, 0, '2019-10-01 02:00:00', '2019-10-01 00:15:00', '2019-10-01 11:46:09', '2019-10-09 09:27:59'),
(7, 'asd d', 'asd-d', 'sdf11', 1, '<p>asdasdasddasdasdasd</p>\r\n\r\n<p>sadasdasd</p>\r\n\r\n<p>asdasd</p>\r\n', 1, 0, 10000, '2019-10-01 04:00:00', '2019-10-01 13:39:05', '2019-10-01 01:39:05', '2019-10-15 01:28:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `image`, `created`, `updated`) VALUES
(44, 81, '93c11a30adb8da50b269267974cf4ec2Screenshot from 2019-10-21 20-16-53.png', '2019-10-23 08:19:56', '2019-10-23 08:19:56'),
(45, 81, '6e08f95606e700994eb632f6a21f48ecScreenshot from 2019-09-24 08-43-20.png', '2019-10-23 08:19:56', '2019-10-23 08:19:56'),
(46, 81, '7686cf15772c064c55ada7f9a995deb6Screenshot from 2019-09-23 16-40-52.png', '2019-10-23 08:19:56', '2019-10-23 08:19:56'),
(47, 81, '7985a16ffc99a7a608aad37e5b50f26bScreenshot from 2019-09-23 15-54-52.png', '2019-10-23 08:19:56', '2019-10-23 08:19:56'),
(48, 81, '41140933c69a030d67c4f554e58ee698Screenshot from 2019-09-23 14-38-54.png', '2019-10-23 08:19:56', '2019-10-23 08:19:56'),
(49, 84, '89db634c9306ccd461f76723964d44fbScreenshot from 2019-10-21 20-16-53.png', '2019-10-25 03:26:50', '2019-10-25 03:26:50'),
(50, 85, '5b2757a07b4c30c0f69eebf4d7cc19e6Screenshot from 2019-09-23 15-54-52.png', '2019-10-25 03:26:50', '2019-11-01 09:02:52'),
(51, 84, '1261ba4322d0d117397c1d03a7c8db16Screenshot from 2019-09-23 14-38-54.png', '2019-10-25 03:26:51', '2019-10-25 03:26:51'),
(52, 86, '352dd2467574ac7a8827dc892ba73993image8.jpg', '2019-10-31 04:10:24', '2019-10-31 04:10:24'),
(53, 86, '2484ff451eaee8f288738517884b9c81image7.jpg', '2019-10-31 04:10:24', '2019-10-31 04:10:24'),
(54, 87, 'ad28f53c26a71ce28e088c9510930db9image3.jpg', '2019-10-31 04:46:35', '2019-10-31 04:46:35'),
(55, 87, '3f1c8a646280307ca28f2c4b09303a51image2.jpeg', '2019-10-31 04:46:35', '2019-10-31 04:46:35'),
(56, 98, '265bdacd52b4f996722bdb48fead0465image5.jpg', '2019-11-05 09:36:58', '2019-11-05 09:36:58'),
(57, 98, '9f958c27da9c1c4b00c92fd5a8dda697image4.jpeg', '2019-11-05 09:36:58', '2019-11-05 09:36:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipped_date` datetime DEFAULT NULL,
  `order_status` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `to_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` int(255) NOT NULL,
  `shipping_fee` int(11) DEFAULT '0',
  `currency` int(11) NOT NULL DEFAULT '0',
  `info` text COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `token`, `user_id`, `shipped_date`, `order_status`, `supplier_id`, `to_address`, `total_price`, `shipping_fee`, `currency`, `info`, `created`, `updated`) VALUES
(18, '', 1, NULL, 'Pendding', NULL, 'a', 12, 0, 0, NULL, '2019-11-15 10:51:27', '2019-11-15 14:04:57'),
(19, '', 1, NULL, 'Pendding', NULL, 'a', 6, 0, 0, NULL, '2019-11-15 11:32:31', '2019-11-15 14:05:00'),
(20, '', 1, NULL, 'Pendding', NULL, 'a', 0, 0, 0, NULL, '2019-11-15 11:33:32', '2019-11-15 14:05:03'),
(21, '$2y$10$cXkRh5SPVgKnVuzaOeDtKA==', 1, NULL, 'Pendding', NULL, 'a', 6, 0, 0, NULL, '2019-11-15 11:44:01', '2019-11-15 14:05:06'),
(22, '334b0487d492ecd5550913beeac3db43', 1, NULL, 'Pendding', NULL, 'a', 3, 0, 0, NULL, '2019-11-15 12:02:11', '2019-11-15 14:05:08'),
(23, '66f6589f3f3f76369c0a65442dc418fd', 1, NULL, 'Pendding', NULL, 'a', 3, 0, 0, NULL, '2019-11-15 12:28:04', '2019-11-15 14:05:13'),
(24, '594a4378866932b6169c4a3af8a0c71d', 1, NULL, 'Pendding', NULL, 'a', 3, 0, 0, NULL, '2019-11-15 12:29:19', '2019-11-15 14:05:17'),
(25, '58799eb2ee1d2c9309a668d801d29051', 1, NULL, 'Pendding', NULL, 'a', 6, 0, 0, NULL, '2019-11-15 12:30:07', '2019-11-15 14:05:10'),
(26, '9c8c74c6c55dfd4cb53b3e62fe8de84e', 1, NULL, 'Pendding', NULL, 'a', 3, 0, 0, NULL, '2019-11-15 12:32:33', '2019-11-15 14:05:20'),
(27, '725f7588fbf609b497d51e1573525574', 1, NULL, 'Pendding', NULL, 'a', 3, 0, 0, NULL, '2019-11-15 12:36:46', '2019-11-15 14:05:15'),
(28, '8f28f96e7ff297a60d25c04b8d407829', 1, NULL, 'Pendding', NULL, 'a', 3, 0, 0, NULL, '2019-11-15 12:37:40', '2019-11-15 14:05:18'),
(29, '5a9523e679dc5918e544b7a2d217fcbe', 1, NULL, 'Pendding', NULL, 'a', 3, 0, 0, NULL, '2019-11-15 12:40:59', '2019-11-15 14:05:23'),
(30, '211c74d274e03dc36a25964998be5378', 1, NULL, 'Pendding', NULL, 'a', 3, 0, 0, NULL, '2019-11-15 01:11:46', '2019-11-15 14:05:25'),
(31, 'cfc38d583521b5aac4107eacf198f5dd', 1, NULL, 'Pendding', NULL, 'a', 3, 0, 0, '12 thanh 2 huy ,buooir toois ', '2019-11-15 01:35:04', '2019-11-15 14:05:27'),
(32, '0a60ba24c543c9cf871b7098812d41bf', 1, NULL, 'Pendding', NULL, 'a', 3, 0, 0, 'asdasdasdasdasd', '2019-11-15 02:30:52', '2019-11-15 02:30:52'),
(33, '6c67ddaff94ee2058fdb5dfbd4b689eb', 1, NULL, 'Pendding', NULL, 'a', 45, 0, 0, 'ok ', '2019-11-15 04:16:14', '2019-11-15 04:16:14'),
(34, '7d828dd926197025005007212f3becbb', 1, NULL, 'Pendding', NULL, 'a', 15, 0, 0, '', '2019-11-15 04:46:39', '2019-11-15 04:46:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `size`, `color`, `discount`, `created`, `updated`) VALUES
(9, 18, 85, 1, 3, '', 'green', NULL, '2019-11-15 10:51:27', '2019-11-15 10:51:27'),
(10, 18, 85, 1, 3, '', 'green', NULL, '2019-11-15 10:51:27', '2019-11-15 10:51:27'),
(11, 18, 85, 1, 3, '', 'green', NULL, '2019-11-15 10:51:27', '2019-11-15 10:51:27'),
(12, 18, 85, 1, 3, '', 'green', NULL, '2019-11-15 10:51:27', '2019-11-15 10:51:27'),
(13, 19, 85, 1, 3, '', 'green', NULL, '2019-11-15 11:32:31', '2019-11-15 11:32:31'),
(14, 19, 85, 1, 3, '', 'green', NULL, '2019-11-15 11:32:31', '2019-11-15 11:32:31'),
(15, 21, 85, 1, 3, '', 'green', NULL, '2019-11-15 11:44:01', '2019-11-15 11:44:01'),
(16, 21, 85, 1, 3, '', 'green', NULL, '2019-11-15 11:44:01', '2019-11-15 11:44:01'),
(17, 22, 85, 1, 3, '', 'green', NULL, '2019-11-15 12:02:11', '2019-11-15 12:02:11'),
(18, 23, 85, 1, 3, '', 'green', NULL, '2019-11-15 12:28:04', '2019-11-15 12:28:04'),
(19, 24, 85, 1, 3, '', 'green', NULL, '2019-11-15 12:29:20', '2019-11-15 12:29:20'),
(20, 25, 85, 1, 3, '', 'green', NULL, '2019-11-15 12:30:07', '2019-11-15 12:30:07'),
(21, 25, 85, 1, 3, '', 'green', NULL, '2019-11-15 12:30:07', '2019-11-15 12:30:07'),
(22, 26, 85, 1, 3, '', 'green', NULL, '2019-11-15 12:32:33', '2019-11-15 12:32:33'),
(23, 27, 85, 1, 3, '', 'green', NULL, '2019-11-15 12:36:46', '2019-11-15 12:36:46'),
(24, 28, 85, 1, 3, '', 'green', NULL, '2019-11-15 12:37:40', '2019-11-15 12:37:40'),
(25, 29, 85, 1, 3, '', 'green', NULL, '2019-11-15 12:40:59', '2019-11-15 12:40:59'),
(26, 30, 85, 1, 3, '', 'green', NULL, '2019-11-15 01:11:46', '2019-11-15 01:11:46'),
(27, 31, 85, 1, 3, '', 'green', NULL, '2019-11-15 01:35:04', '2019-11-15 01:35:04'),
(28, 32, 85, 1, 3, '', 'green', NULL, '2019-11-15 02:30:52', '2019-11-15 02:30:52'),
(29, 33, 85, 8, 3, '', 'green', NULL, '2019-11-15 04:16:14', '2019-11-15 04:16:14'),
(30, 33, 85, 7, 3, '', 'green', NULL, '2019-11-15 04:16:14', '2019-11-15 04:16:14'),
(31, 34, 85, 5, 3, '', 'green', NULL, '2019-11-15 04:46:40', '2019-11-15 04:46:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_type_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `num_of_view` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `num_of_brought` int(11) NOT NULL DEFAULT '0',
  `product_detail_orther` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `best_selling` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `slug`, `description`, `category_type_id`, `user_id`, `brand_id`, `num_of_view`, `price`, `quantity`, `color`, `num_of_brought`, `product_detail_orther`, `status`, `best_selling`, `discount`, `created`, `updated`) VALUES
(81, 'asdfghjk123456', 'Skirt t20', 'skirt-20', '<p>beautiful</p>\r\n', '5', 1, 1, 0, 9, 6, 'red', 0, NULL, 1, 1, 0, '2019-10-23 08:19:56', '2019-11-01 13:52:52'),
(84, '123asd', 'Skirt t21', 'skirt-t21', '<p>good</p>\r\n', '5', 1, 1, 0, 3, 2, 'blue', 0, NULL, 1, 0, 0, '2019-10-25 03:26:50', '2019-11-01 13:52:57'),
(85, 'asd', 'asdasd', 'asdasd', '<p>abcd</p>\r\n', '5,7,10,11', 1, 2, 0, 3, 0, 'green', 0, NULL, 1, 0, 0, '2019-10-31 04:10:04', '2019-11-01 13:53:01'),
(86, 'asd', 'asdasd', 'asdasd', '<p>abcd</p>\r\n', '6,9', 1, 2, 0, 3, 0, 'black,blue,brown,green,grey,pink,yellow,white', 0, NULL, 1, 0, 0, '2019-10-31 04:10:24', '2019-11-05 10:38:50'),
(87, 'dasdasdasf', 'DASASDA ASDASD ASD AS ', 'dasasda-asdasd-asd-as', '<p>&aacute;dsa</p>\r\n', '5,7,10,12', 1, 1, 0, 2, 2, 'green,pink', 0, NULL, 0, 0, 0, '2019-10-31 04:46:35', '2019-11-01 13:53:11'),
(88, 'asdfghjk123456', 'Skirt t22', 'skirt-22', '<p>beautiful</p>\r\n', '5', 1, 1, 0, 9, 6, 'red,blue', 0, NULL, 1, 1, 0, '2019-10-23 08:19:56', '2019-11-01 13:52:52'),
(89, 'asdfghjk123456', 'Skirt t23', 'skirt-23', '<p>beautiful</p>\r\n', '5', 1, 1, 0, 9, 0, 'black,blue,red', 0, NULL, 1, 1, 0, '2019-10-23 08:19:56', '2019-11-05 10:15:06'),
(90, 'asdfghjk123456', 'Skirt t24', 'skirt-t24', '<p>beautiful</p>\r\n', '5', 1, 1, 0, 9, 6, 'red,black', 0, NULL, 1, 1, 0, '2019-10-23 08:19:56', '2019-11-01 13:52:52'),
(91, 'asdfghjk123456', 'Skirt t25', 'skirt-t25', '<p>beautiful</p>\r\n', '5', 1, 1, 0, 9, 6, 'black', 0, NULL, 1, 1, 0, '2019-10-23 08:19:56', '2019-11-01 13:52:52'),
(92, 'asdfghjk123456', 'Skirt t26', 'skirt-t26', '<p>beautiful</p>\r\n', '5', 1, 1, 0, 9, 6, 'black', 0, NULL, 1, 1, 0, '2019-10-23 08:19:56', '2019-11-01 13:52:52'),
(93, 'asdfghjk123456', 'Skirt t27', 'skirt-t27', '<p>beautiful</p>\r\n', '5', 1, 1, 0, 9, 6, 'black', 0, NULL, 1, 1, 0, '2019-10-23 08:19:56', '2019-11-01 13:52:52'),
(94, 'asdfghjk123456', 'Skirt t28', 'skirt-t28', '<p>beautiful</p>\r\n', '5', 1, 1, 0, 9, 6, 'black', 0, NULL, 1, 1, 0, '2019-10-23 08:19:56', '2019-11-01 13:52:52'),
(95, 'asdfghjk123456', 'Skirt t29', 'skirt-t29', '<p>beautiful</p>\r\n', '5', 1, 1, 0, 9, 6, 'black', 0, NULL, 1, 1, 0, '2019-10-23 08:19:56', '2019-11-01 13:52:52'),
(96, 'asdfghjk123456', 'Skirt t30', 'skirt-t30', '<p>beautiful</p>\r\n', '5', 1, 1, 0, 9, 6, 'black', 0, NULL, 1, 1, 0, '2019-10-23 08:19:56', '2019-11-01 13:52:52'),
(97, 'asdfghjk123456', 'Skirt t31', 'skirt-t31', '<p>beautiful</p>\r\n', '5', 1, 1, 0, 9, 6, 'black', 0, NULL, 1, 1, 0, '2019-10-23 08:19:56', '2019-11-01 13:52:52'),
(98, 'asdasd', 'asda', 'asda', '<p>asdasdasd</p>\r\n', '6', 1, 2, 0, 100, 100, 'black,blue,brown', 0, NULL, 1, 0, 0, '2019-11-05 09:36:58', '2019-11-05 09:36:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_use_coupons`
--

CREATE TABLE `product_use_coupons` (
  `id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipments`
--

CREATE TABLE `shipments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `static_pages`
--

CREATE TABLE `static_pages` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `title_slug` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `static_pages`
--

INSERT INTO `static_pages` (`id`, `title`, `title_slug`, `content`, `created`, `updated`) VALUES
(1, 'Introduce', 'introduce', '<p>TRang giới thiệu<em>&aacute;d&aacute;dasdasdasdasdasd asdasdasd<span style=\"color:#2ecc71\">&nbsp;asdasdasdasd&nbsp;</span><span style=\"color:null\"> asdasdasdasdasd</span></em></p>\n', '2019-09-24 09:12:21', '2019-09-24 02:55:25'),
(2, 'Contact us', 'contact-us', 'Contact us', '2019-09-24 09:12:56', '2019-09-24 09:14:01'),
(3, 'About us', 'about-us', '<p>About us</p>\n', '2019-09-24 09:15:01', '2019-09-24 09:15:01'),
(5, 'Term of Service', 'term-of-service', '<p>Term of Service</p>\n', '2019-09-24 09:15:55', '2019-09-24 09:15:55'),
(6, 'Support', 'support', '<p>Suport</p>\n', '2019-09-24 09:21:04', '2019-09-24 09:21:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `avata` varchar(255) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `remember_token` text,
  `token` varchar(225) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `remember_me_identify` text,
  `remember_me_token` text,
  `remember_active_token` varchar(250) DEFAULT NULL,
  `identification_tax_code` varchar(20) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '2',
  `status` tinyint(1) NOT NULL DEFAULT '2',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `avata`, `firstname`, `lastname`, `phone`, `address`, `remember_token`, `token`, `reset_token`, `remember_me_identify`, `remember_me_token`, `remember_active_token`, `identification_tax_code`, `role`, `status`, `created`, `updated`) VALUES
(1, 'user2@gmail.com', 'c93ccd78b2076528346216b3b2f701e6', NULL, 'khai', 'khai', '2435454564747', 'a', '$2y$10$YX6vK27ZMmVFaF9qjV3rDQ==', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-09-11 09:42:31', '2019-11-11 04:43:20'),
(2, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '156929299986865.png', 'An AN aâ', 'Tran', '09876577654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-09-11 09:48:13', '2019-10-14 10:03:37'),
(3, 'user@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'b', 'a', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-10-08 03:45:40', '2019-10-08 03:45:40'),
(4, 'user3@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '157077949929210.png', 'dfsdf', 'sdfsdf', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-10-11 02:38:19', '2019-10-11 02:38:19'),
(5, 'oneoneq.001@gmail.com', '9a78a344c4142058204619dd826e3de8', '157078522763788.png', 'asdasd', 'asdasdasd', '0123456789', NULL, '', NULL, '157173510741496', NULL, NULL, NULL, NULL, 5, 1, '2019-10-11 04:13:48', '2019-10-22 04:05:26'),
(6, 'supplier@gmail.com', '99b0e8da24e29e4ccb5d7d76e677c2ac', '157101998041153.png', 'suplier', 'supplier', '0123456789', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, '2019-10-14 09:26:20', '2019-10-14 10:45:00'),
(7, 'admin1@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', NULL, 'asdasd', 'a', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-10-22 04:28:54', '2019-11-08 11:19:19'),
(8, 'user11@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', NULL, 'asdasd', 'a', '0123456789', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-10-22 04:35:43', '2019-10-23 08:24:07'),
(9, 'nguyendinhkhai2111997@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', NULL, 'asdasd', '123123', '0123456789', NULL, '', NULL, NULL, NULL, NULL, '157173767475990', NULL, 2, 1, '2019-10-22 04:47:54', '2019-10-22 05:02:13'),
(10, 'user2222@gmail.com', 'e19d5cd5af0378da05f63f891c7467af', 'asdasdasdad.png', 'abc', 'abc', '0123123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-11-04 14:16:24', '2019-11-08 11:19:22'),
(11, 'user222442@gmail.com', 'f30aa7a662c728b7407c54ae6bfd27d1', 'asdasdasdvad.png', 'abcvv', 'abcvv', '0123123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-11-04 14:16:48', '2019-11-08 11:19:25'),
(12, 'user2224dsds42@gmail.com', '40c5585fa36f49ef5e90a1583a413d32', 'asdasddsdsdasdvad.png', 'abcvddv', 'abcvv', '01237123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-11-04 14:17:01', '2019-11-08 11:19:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `user_id`, `quantity`, `price`, `color`, `size`, `image`, `created`, `updated`) VALUES
(2, 85, 2, 1, 3, 'green', NULL, '5b2757a07b4c30c0f69eebf4d7cc19e6Screenshot from 2019-09-23 15-54-52.png', '2019-11-15 08:13:17', '2019-11-15 13:55:28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_use_coupons`
--
ALTER TABLE `product_use_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT cho bảng `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT cho bảng `product_use_coupons`
--
ALTER TABLE `product_use_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
