-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 14, 2019 lúc 11:11 AM
-- Phiên bản máy phục vụ: 5.7.27-0ubuntu0.19.04.1
-- Phiên bản PHP: 7.2.19-0ubuntu0.19.04.2

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
(1, 'dell', 'dell', NULL, '2019-10-08 09:09:31', '2019-10-11 11:50:14'),
(2, 'mac', 'mac', NULL, '2019-10-08 09:09:32', '2019-10-11 11:50:24'),
(3, 'none', 'None', NULL, '2019-10-11 09:38:01', '2019-10-11 09:38:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(1, 'laptop', 'laptop', 1, '2019-09-25 08:33:40', '2019-10-11 04:49:34'),
(2, 'desktop', 'desktop', 0, '2019-10-11 04:49:10', '2019-10-11 04:49:10');

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
(7, 'asd d', 'asd-d', 'sdf11', 0, '<p>asdasdasddasdasdasd</p>\r\n\r\n<p>sadasdasd</p>\r\n\r\n<p>asdasd</p>\r\n', 1, 0, 10000, '2019-10-01 04:00:00', '2019-10-01 13:39:05', '2019-10-01 01:39:05', '2019-10-04 10:37:50');

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
  `user_id` int(11) NOT NULL,
  `required_date` datetime NOT NULL,
  `shipped_date` datetime NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `supplier_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `list_price` int(11) NOT NULL,
  `size` int(5) NOT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `num_of_view` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `products` (`id`, `sku`, `name`, `slug`, `image`, `description`, `category_id`, `store_id`, `brand_id`, `num_of_view`, `price`, `quantity`, `num_of_brought`, `product_detail_orther`, `status`, `best_selling`, `created`, `updated`) VALUES
(1, '12312', 'asdasd1', 'asdasd', '123123', '123123sdas', 1, 1, 2, 0, 0, 0, 0, NULL, 0, 0, '2019-10-02 14:53:14', '2019-10-11 10:38:21'),
(2, '12312', 'asdasd2', 'asdasd', '123123', '123123sdas', 1, 1, 1, 0, 0, 0, 0, NULL, 1, 0, '2019-10-02 14:53:21', '2019-10-11 10:38:25'),
(3, 'dasdasdasf', 'ff\'jfjfjfnjnf ', 'ff-jfjfjfnjnf', '2', '\r\nn wwf', 2, 1, 2, 0, 140000, 0, 0, NULL, 0, 0, '2019-10-11 12:00:34', '2019-10-11 12:00:34');

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
-- Cấu trúc bảng cho bảng `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `stores`
--

INSERT INTO `stores` (`id`, `slug`, `name`, `phone`, `email`, `street`, `city`, `state`, `zip_code`, `created`, `updated`) VALUES
(1, 'Mircosoft', 'microsoft', 123123123, 'a@gmail.com', 'a1', 'a2', 'a3', 'a4', '2019-10-11 10:16:44', '2019-10-11 11:51:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_social` varchar(100) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `id_social`, `email`, `password`, `avata`, `firstname`, `lastname`, `phone`, `address`, `remember_token`, `token`, `reset_token`, `remember_me_identify`, `remember_me_token`, `remember_active_token`, `identification_tax_code`, `role`, `status`, `created`, `updated`) VALUES
(1, NULL, 'user2@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'khai', 'khai', '2435454564747', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-09-11 09:42:31', '2019-10-14 11:09:57'),
(2, NULL, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '156929299986865.png', 'An AN aâ', 'Tran', '09876577654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-09-11 09:48:13', '2019-10-14 10:03:37'),
(3, NULL, 'user@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'b', 'a', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-10-08 03:45:40', '2019-10-08 03:45:40'),
(4, NULL, 'user3@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '157077949929210.png', 'dfsdf', 'sdfsdf', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-10-11 02:38:19', '2019-10-11 02:38:19'),
(5, NULL, 'a@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '157078522763788.png', 'asdasd', 'asdasdasd', '0123456789', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '2019-10-11 04:13:48', '2019-10-14 10:24:58'),
(6, NULL, 'supplier@gmail.com', '99b0e8da24e29e4ccb5d7d76e677c2ac', '157101998041153.png', 'suplier', 'supplier', '0123456789', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, '2019-10-14 09:26:20', '2019-10-14 10:45:00');

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
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
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
-- Chỉ mục cho bảng `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `stores`
--
ALTER TABLE `stores`
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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT cho bảng `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
