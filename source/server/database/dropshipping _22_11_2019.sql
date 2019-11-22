-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 22, 2019 lúc 11:17 AM
-- Phiên bản máy phục vụ: 5.7.28-0ubuntu0.19.04.2
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
  `supplier_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `supplier_id`, `quantity`, `price`, `color`, `size`, `image`, `created`, `updated`) VALUES
(7, 103, 1, 1, 3, 11, 'black,blue', 'M', '4642aef345df2c7718182be299095b6b10dbe070-1efb-11e8-bd51-594056be2a3d.png', '2019-11-22 11:05:18', '2019-11-22 11:13:06');

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
(12, 4, '10', 0, 'Long skirt axcd2', 'long-skirt-axcd2', 'active'),
(13, 1, '', 0, 'Accessories', 'accessories', 'active'),
(14, 2, '13', 0, 'Glasses', 'glasses', 'active'),
(15, 2, '13', 0, 'Hat', 'hat', 'active'),
(16, 1, '', 0, 'Shoes', 'shoes', 'active'),
(17, 2, '13', 0, 'Jewelry', 'jewelry', 'active'),
(18, 2, '13', 0, 'Belt', 'belt', 'active'),
(19, 1, '', 0, 'Children\'s wear', 'children-s-wear', 'active'),
(20, 2, '5', 0, 'Legging', 'legging', 'active'),
(21, 2, '5', 0, 'Sport', 'sport', 'active'),
(22, 2, '5', 0, 'Swim', 'swim', 'active'),
(23, 2, '5', 0, 'Shirt', 'shirt', 'active'),
(24, 3, '7', 0, 'Short skirt', 'short-skirt', 'active'),
(25, 2, '5', 0, 'Short', 'short', 'active');

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

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `contents`, `created`, `updated`) VALUES
(38, 106, 1, 'ok', '2019-11-22 09:25:40', '2019-11-22 09:25:40');

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
(7, 'asd d', 'asd-d', 'sdf11', 1, '<p>asdasdasddasdasdasd</p>\r\n\r\n<p>sadasdasd</p>\r\n\r\n<p>asdasd</p>\r\n', 1, 0, 10000, '2019-10-01 04:00:00', '2019-10-01 13:39:05', '2019-10-01 01:39:05', '2019-10-15 01:28:35'),
(8, 'asdasdasd', 'asdasdasd', 'asdasd', 1, '<p>asdasd</p>\r\n', 0, 0, 0, '2019-11-22 03:01:00', '2019-11-22 14:01:00', '2019-11-21 11:39:08', '2019-11-21 11:39:08'),
(9, 'a', 'a', 'asdasdasd', 1, '<p>asdasda</p>\r\n', 0, 6, 0, '2019-11-21 15:02:00', '2019-11-23 02:01:00', '2019-11-21 11:39:54', '2019-11-21 11:39:54');

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
(60, 100, 'ea6ce4d663141601303494beed345324ao-thun-nu-co-tron-havi-store-hcm-1.jpg', '2019-11-22 08:43:55', '2019-11-22 08:43:55'),
(61, 100, '6a99c650e8f1bf03986ba4c8142ede7eao-thun-nu-co-tim-havi-store-hcm-1.jpg', '2019-11-22 08:43:55', '2019-11-22 08:43:55'),
(62, 101, 'ab542ca7667202b79fe66b2c3a22856eao_nu_co_v_vien_tay_xinh_xan_c8e5.jpg', '2019-11-22 08:51:39', '2019-11-22 08:51:39'),
(63, 101, '31ed2462101be583db66ee6f3a810c47ao_nu_co_sen_soc_de_thuong_54c2.jpg', '2019-11-22 08:51:39', '2019-11-22 08:51:39'),
(64, 102, 'f5f1bd4c387a39fb05a29e70bad69469ao_voan_tay_loe_big_size_BS033__1__800x800.jpg', '2019-11-22 08:54:52', '2019-11-22 08:54:52'),
(65, 103, '4642aef345df2c7718182be299095b6b10dbe070-1efb-11e8-bd51-594056be2a3d.png', '2019-11-22 08:57:06', '2019-11-22 08:57:06'),
(66, 104, '4f1419743e1ac95950e9d2a4139c4d2d20160825170847_48879.jpg', '2019-11-22 08:58:25', '2019-11-22 08:58:25'),
(67, 104, '32354e3c170eaa1b41f1f5fa6c5db6991-ao-kieu-nu-soc-tre-vai.jpg', '2019-11-22 08:58:25', '2019-11-22 08:58:25'),
(68, 105, 'fa4ad31cecfd86a016d1beca6856c4f0images (1).jpeg', '2019-11-22 09:10:44', '2019-11-22 09:10:44'),
(69, 105, '3624af701573cdc09fb776e55b54b89b1947440_L.jpg', '2019-11-22 09:10:44', '2019-11-22 09:10:44'),
(70, 106, '6f2ef40dfc84ef8adeaef55d24a3b330gong-kinh-thay-the-ts-hinh-1.jpg', '2019-11-22 09:16:11', '2019-11-22 09:16:11'),
(71, 106, 'ab8efa0502453fc765e2c2c1d07778711bb9cdd3f6efed63f3020b98526b7409.jpg', '2019-11-22 09:16:11', '2019-11-22 09:16:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
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
  `to_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` int(255) NOT NULL,
  `currency` int(11) NOT NULL DEFAULT '0',
  `info` text COLLATE utf8_unicode_ci,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `token`, `user_id`, `shipped_date`, `to_address`, `total_price`, `currency`, `info`, `order_status`, `created`, `updated`) VALUES
(44, '20fe5911c7d948c9167b8b82dac03450', 1, NULL, 'khai khaii,user2@gmail.com,2435454564747,12 thanh huy 3,Quận thanh khê,Đà nẵng,Viet nam,5001', 24, 0, 'ok', 0, '2019-11-22 09:23:36', '2019-11-22 09:23:36'),
(45, 'b9d65c37b914ec720a243a9fb37fd0b3', 15, NULL, 'abc abc,oneoneq.001@gmail.com,129031627,12 thanh huy 4,Thanh Khe,Da nang,Viet Nam,6000', 162, 0, 'ok', 0, '2019-11-22 09:40:31', '2019-11-22 09:40:31'),
(46, '05c7bb3f0e89f2ddc8e56a0892bd5a95', 1, NULL, 'khai khai,user2@gmail.com,2435454564747,12 thanh huy 3,Quận thanh khê,Đà nẵng,Viet nam,5001', 196, 0, '', 2, '2019-11-22 10:21:09', '2019-11-22 11:09:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `supplier_id`, `quantity`, `price`, `size`, `color`, `discount`, `status`, `created`, `updated`) VALUES
(48, 44, 103, 1, 2, 11, 'M', 'black', NULL, 0, '2019-11-22 09:23:36', '2019-11-22 09:23:36'),
(49, 45, 106, 1, 4, 40, '', 'black', NULL, 0, '2019-11-22 09:40:31', '2019-11-22 09:40:31'),
(50, 46, 103, 1, 2, 11, 'M', 'black,blue', NULL, 0, '2019-11-22 10:21:09', '2019-11-22 10:21:09'),
(51, 46, 106, 1, 2, 40, '', 'black', NULL, 0, '2019-11-22 10:21:09', '2019-11-22 10:21:09'),
(52, 46, 106, 1, 2, 40, '', 'black', NULL, 1, '2019-11-22 10:21:09', '2019-11-22 11:09:06'),
(53, 46, 103, 1, 2, 11, 'M', 'black,blue', NULL, 1, '2019-11-22 10:21:09', '2019-11-22 11:09:04');

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
  `size` text COLLATE utf8_unicode_ci,
  `num_of_brought` int(11) NOT NULL DEFAULT '0',
  `product_detail_orther` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `best_selling` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `slug`, `description`, `category_type_id`, `user_id`, `brand_id`, `num_of_view`, `price`, `quantity`, `color`, `size`, `num_of_brought`, `product_detail_orther`, `status`, `best_selling`, `created`, `updated`) VALUES
(100, 'adf123', 'Áo thun', 'ao-thun', '<p>&aacute;o đẹp</p>\r\n', '5,23', 1, 2, 4, 6, 50, 'black,blue,green,pink,yellow,red', 'S,M,L,XL,XXL', 0, NULL, 0, 0, '2019-11-22 08:43:55', '2019-11-22 11:02:07'),
(101, 'akhu1836', 'Áo t12', 'ao-t12', '<p>beautiful.</p>\r\n', '5,23', 1, 1, 0, 7, 70, 'blue,red', 'S,M,L,XL,XXL', 0, NULL, 0, 0, '2019-11-22 08:51:39', '2019-11-22 08:51:39'),
(102, 'kljh1234', 'Skirt t21', 'skirt-t21', '<p>pretty.</p>\r\n', '5,7,24', 1, 3, 0, 10, 99, 'white', 'S,M,L', 0, NULL, 0, 0, '2019-11-22 08:54:52', '2019-11-22 08:54:52'),
(103, 'poiu8764', 'Short abv', 'short-abv', '<p>ok</p>\r\n', '5,23', 1, 2, 6, 11, 78, 'black,blue', 'S,M,XXL', 0, NULL, 1, 0, '2019-11-22 08:57:06', '2019-11-22 11:07:16'),
(104, 'piut765', 'Short nm', 'short-nm', '<p>ok</p>\r\n', '5,25', 1, 3, 5, 20, 70, 'pink,yellow,white,red', 'M,L,XL,XXL', 0, NULL, 0, 0, '2019-11-22 08:58:25', '2019-11-22 10:59:05'),
(105, 'poiu0987', 'Skirt t203', 'skirt-t203', '<p>ok</p>\r\n', '5,7,10', 1, 2, 23, 30, 76, 'black,white', 'S,M,L,XL,XXL', 0, NULL, 0, 1, '2019-11-22 09:10:44', '2019-11-22 11:16:06'),
(106, 'asdf456', 'Glass sun', 'glass-sun', '<p>ok</p>\r\n', '13,14', 1, 1, 23, 40, 79, 'black', '', 0, NULL, 0, 1, '2019-11-22 09:16:11', '2019-11-22 11:15:26');

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

--
-- Đang đổ dữ liệu cho bảng `product_use_coupons`
--

INSERT INTO `product_use_coupons` (`id`, `coupon_id`, `product_id`, `created`, `updated`) VALUES
(3, 9, 106, '2019-11-22 09:50:59', '2019-11-22 09:50:59'),
(4, 1, 105, '2019-11-22 09:51:01', '2019-11-22 09:51:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `contents` text COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `product_id`, `rating`, `contents`, `created`, `updated`) VALUES
(22, 1, 106, 1, 'bad.', '2019-11-22 09:26:03', '2019-11-22 09:26:03'),
(23, 1, 103, 5, 'asdasd', '2019-11-22 11:08:22', '2019-11-22 11:08:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `replies`
--

INSERT INTO `replies` (`id`, `product_id`, `user_id`, `comment_id`, `content`, `created`, `updated`) VALUES
(59, 106, 1, 38, 'what', '2019-11-22 09:25:50', '2019-11-22 09:25:50');

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
(1, 'user2@gmail.com', 'c93ccd78b2076528346216b3b2f701e6', NULL, 'khai', 'khai', '2435454564747', '12 thanh huy 3,Quận thanh khê,Đà nẵng,Viet nam,5001', '$2y$10$7w.xfXIS5rC5LGdaFftImw==', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-09-11 09:42:31', '2019-11-22 09:50:12'),
(2, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '156929299986865.png', 'An AN aâ', 'Tran', '09876577654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-09-11 09:48:13', '2019-10-14 10:03:37'),
(3, 'user@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'b', 'a', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-10-08 03:45:40', '2019-10-08 03:45:40'),
(4, 'user3@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '157077949929210.png', 'dfsdf', 'sdfsdf', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-10-11 02:38:19', '2019-10-11 02:38:19'),
(6, 'supplier@gmail.com', '99b0e8da24e29e4ccb5d7d76e677c2ac', '157101998041153.png', 'suplier', 'supplier', '0123456789', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, '2019-10-14 09:26:20', '2019-10-14 10:45:00'),
(7, 'admin1@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', NULL, 'asdasd', 'a', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-10-22 04:28:54', '2019-11-08 11:19:19'),
(8, 'user11@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', NULL, 'asdasd', 'a', '0123456789', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-10-22 04:35:43', '2019-10-23 08:24:07'),
(9, 'nguyendinhkhai2111997@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', NULL, 'asdasd', '123123', '0123456789', NULL, '', NULL, NULL, NULL, NULL, '157173767475990', NULL, 2, 1, '2019-10-22 04:47:54', '2019-10-22 05:02:13'),
(10, 'user2222@gmail.com', 'e19d5cd5af0378da05f63f891c7467af', 'asdasdasdad.png', 'abc', 'abc', '0123123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-11-04 14:16:24', '2019-11-08 11:19:22'),
(11, 'user222442@gmail.com', 'f30aa7a662c728b7407c54ae6bfd27d1', 'asdasdasdvad.png', 'abcvv', 'abcvv', '0123123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-11-04 14:16:48', '2019-11-08 11:19:25'),
(12, 'user2224dsds42@gmail.com', '40c5585fa36f49ef5e90a1583a413d32', 'asdasddsdsdasdvad.png', 'abcvddv', 'abcvv', '01237123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-11-04 14:17:01', '2019-11-08 11:19:28'),
(15, 'oneoneq.001@gmail.com', '73a5032afcbcbd3caac03cad2facdaad', NULL, 'abc', 'abc', '129031627', NULL, '$2y$10$6t2jRp8bv7pBLs.nZysrRQ==', NULL, NULL, NULL, NULL, '157439020584823', NULL, 2, 1, '2019-11-22 09:36:44', '2019-11-22 09:37:57'),
(16, 'oneoneq.002@gmail.com', '73a5032afcbcbd3caac03cad2facdaad', NULL, 'abc', 'abc', '81926371823', NULL, NULL, NULL, NULL, NULL, NULL, '157439054745615', NULL, 2, 0, '2019-11-22 09:42:27', '2019-11-22 09:42:27'),
(17, 'aasdasdasd@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, 'asdasd', 'a', '123987123', NULL, NULL, NULL, NULL, NULL, NULL, '157439099260609', NULL, 2, 0, '2019-11-22 09:49:52', '2019-11-22 09:49:52');

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
  `supplier_id` int(11) NOT NULL,
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

INSERT INTO `wishlists` (`id`, `product_id`, `user_id`, `supplier_id`, `quantity`, `price`, `color`, `size`, `image`, `created`, `updated`) VALUES
(2, 85, 2, 1, 1, 3, 'green', NULL, '5b2757a07b4c30c0f69eebf4d7cc19e6Screenshot from 2019-09-23 15-54-52.png', '2019-11-15 08:13:17', '2019-11-18 09:21:34'),
(17, 103, 1, 1, 1, 11, 'black,blue', 'M', '4642aef345df2c7718182be299095b6b10dbe070-1efb-11e8-bd51-594056be2a3d.png', '2019-11-22 10:20:42', '2019-11-22 10:20:42');

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
-- Chỉ mục cho bảng `replies`
--
ALTER TABLE `replies`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT cho bảng `product_use_coupons`
--
ALTER TABLE `product_use_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT cho bảng `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT cho bảng `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
