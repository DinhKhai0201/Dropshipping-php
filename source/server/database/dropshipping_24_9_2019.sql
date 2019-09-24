-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 24, 2019 lúc 09:24 AM
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
  `position` int(11) NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `num_of_click` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `page` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `position`, `url`, `image`, `num_of_click`, `status`, `page`, `created`, `updated`) VALUES
(38, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', '154445755840383.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(39, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-1.jpg', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(40, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-2.jpg', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(42, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-4.jpg', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(43, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-5.jpg', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(44, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-6.jpg', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(45, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-6.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(46, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-5.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(47, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-4.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(48, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-3.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(49, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-2.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(50, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-1.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(51, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-4.png', 0, 1, 4, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(52, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-5.png', 0, 1, 4, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(53, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-6.png', 0, 1, 4, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(54, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-6.jpg', 0, 1, 4, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(55, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-5.jpg', 0, 1, 4, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(56, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-4.jpg', 0, 1, 4, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(57, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-3.jpg', 0, 1, 4, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(58, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-2.jpg', 0, 1, 4, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(59, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-1.jpg', 0, 1, 4, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(60, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-1.jpg', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(61, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-2.jpg', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(62, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-3.jpg', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(63, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-4.jpg', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(64, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-5.jpg', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(65, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-6.jpg', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(66, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-6.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(67, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-5.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(68, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-4.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(74, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'top2.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(75, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'top3.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(76, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'top4.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(77, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'top2.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(78, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'top1.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(79, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'top3.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(80, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'top4.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(81, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'top1.png', 0, 1, 3, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(82, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long3.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(83, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long2.png', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(84, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long1.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(85, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long2.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(86, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long5.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(87, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long4.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(88, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long3.jpg', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(89, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long2.png', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(90, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long1.jpg', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(91, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long2.jpg', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(92, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long5.jpg', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(93, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long4.jpg', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(94, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-4.png', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(101, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-1.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(102, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-2.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(103, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-3.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(104, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-4.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(105, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-5.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(106, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-6.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(107, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-6.png', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(108, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-5.png', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(109, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-4.png', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(110, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long3.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(111, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long2.png', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(112, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long1.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(113, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long2.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(114, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long5.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(115, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long4.jpg', 0, 1, 5, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(116, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-3.jpg', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(117, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-4.jpg', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(118, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-5.jpg', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(119, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-6.jpg', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(120, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-6.png', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(121, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 1, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-5.png', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(122, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 2, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'job-view-right-4.png', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(123, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long3.jpg', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(124, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long2.png', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(125, 'Tuyển dụng, tìm việc làm Cần Tuyển Gấp', 'Công ty TNHH ABC là công ty 100% vốn đầu tư Hàn Quốc, chuyên sản xuất hàng may mặc', 3, 'https://getbootstrap.com/docs/4.0/utilities/spacing/', 'long1.jpg', 0, 1, 6, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(126, 'Click để gủi CV cho chúng tôi', 'Click để gủi CV cho chúng tôi', 5, 'https://vieclamdanang.vn/page/index/applycv', '2019/03/19/2019-03-19-155296279552504.png', 0, 1, 1, '2018-12-10 02:59:18', '2018-12-10 02:59:18'),
(141, 'ok', 'ok', 4, 'https://vieclamdanang.vn', '2019/05/02/2019-05-02-155678357353485.png', 0, 1, 1, '2019-03-18 08:48:11', '2019-03-18 08:48:11'),
(142, 'ok', 'ok', 4, 'https://vieclamdanang.vn', '2019/03/18/2019-03-18-155289897539442.jpeg', 0, 1, 1, '2019-03-18 08:49:36', '2019-03-18 08:49:36'),
(143, 'ok', 'ok', 4, 'https://vieclamdanang.vn', '2019/05/02/2019-05-02-155678358846305.jpeg', 0, 1, 1, '2019-03-19 02:23:15', '2019-03-19 02:23:15'),
(144, 'ok', 'ok', 4, 'https://vieclamdanang.vn', '2019/05/02/2019-05-02-155678360190772.jpeg', 0, 1, 1, '2019-03-19 02:24:17', '2019-03-19 02:24:17'),
(145, 'ok', 'ok', 4, 'https://vieclamdanang.vn', '2019/05/02/2019-05-02-155678364858915.jpeg', 0, 1, 1, '2019-03-19 02:24:31', '2019-03-19 02:24:31'),
(146, 'ok', 'ok', 4, 'https://vieclamdanang.vn', '2019/03/19/2019-03-19-155296267539054.png', 0, 1, 1, '2019-03-19 02:31:15', '2019-03-19 02:31:15'),
(147, 'ok', 'ok', 1, 'https://vieclamdanang.vn', '2019/03/19/2019-03-19-155296268926377.png', 0, 1, 3, '2019-03-19 02:31:29', '2019-03-19 02:31:29'),
(148, 'ok', 'ok', 4, 'https://vieclamdanang.vn', '2019/03/19/2019-03-19-155296270526923.png', 0, 1, 1, '2019-03-19 02:31:45', '2019-03-19 02:31:45'),
(150, 'ok', 'ok', 2, 'https://vieclamdanang.vn', '2019/03/19/2019-03-19-155298374586324.png', 0, 1, 1, '2019-03-19 08:22:25', '2019-03-19 08:22:25'),
(151, 'Việc làm mới nhất trong ngày', 'Việc làm mới nhất trong ngày', 2, 'https://vieclamdanang.vn/viec-lam-trong-ngay', '2019/03/19/2019-03-19-155298375691013.png', 0, 1, 1, '2019-03-19 08:22:37', '2019-03-19 08:22:37'),
(152, 'ok', 'ok', 2, 'https://vieclamdanang.vn', '2019/03/19/2019-03-19-155298376623635.png', 0, 1, 1, '2019-03-19 08:22:47', '2019-03-19 08:22:47'),
(155, 'ads', 'ads', 1, 'ads', '2019/03/20/2019-03-20-155304992985259.jpeg', 0, 1, 6, '2019-03-20 02:45:29', '2019-03-20 02:45:29'),
(167, 'ok', 'ok', 5, 'https://vieclamdanang.vn', '2019/03/21/2019-03-21-155313898189306.png', 0, 1, 3, '2019-03-21 03:29:43', '2019-03-21 03:29:43'),
(168, 'ok', 'ok', 5, 'https://vieclamdanang.vn', '2019/03/21/2019-03-21-155313899787341.png', 0, 1, 3, '2019-03-21 03:29:58', '2019-03-21 03:29:58'),
(169, 'ok', 'ok', 5, 'https://vieclamdanang.vn', '2019/03/21/2019-03-21-155313901475872.png', 0, 1, 3, '2019-03-21 03:30:16', '2019-03-21 03:30:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(10, 'An Ninh / Bảo Vệi', 'an-ninh-bao-vei', 1, '2019-03-02 08:51:21', '2019-09-23 08:37:01'),
(11, 'An toàn lao động', 'an-toan-lao-dong', 0, '2019-03-02 08:51:38', '2019-03-02 08:51:38'),
(12, 'CNTT - Phần cứng / Mạng', 'cntt-phan-cung-mang', 1, '2019-03-02 08:51:53', '2019-03-02 08:51:53'),
(13, 'Bán hàng / Kinh doanh', 'ban-hang-kinh-doanh', 1, '2019-03-02 08:52:14', '2019-03-02 08:52:14'),
(14, 'Bán lẻ / Bán sỉ', 'ban-le-ban-si', 1, '2019-03-02 08:59:00', '2019-03-02 08:59:00'),
(15, 'Bảo hiểm', 'bao-hiem', 1, '2019-03-02 08:59:10', '2019-03-02 08:59:10'),
(16, '  Bất động sản', 'bat-dong-san', 1, '2019-03-02 08:59:24', '2019-03-02 08:59:24'),
(17, '  Biên phiên dịch', 'bien-phien-dich', 1, '2019-03-02 08:59:34', '2019-03-02 08:59:34'),
(18, ' Bưu chính viễn thông', 'buu-chinh-vien-thong', 1, '2019-03-02 08:59:42', '2019-03-02 08:59:42'),
(19, ' Chăn nuôi / Thú y', 'chan-nuoi-thu-y', 1, '2019-03-02 08:59:50', '2019-03-02 08:59:50'),
(20, 'Chứng khoán', 'chung-khoan', 1, '2019-03-02 09:00:02', '2019-03-02 09:00:02'),
(21, 'CNTT - Phần mềm', 'cntt-phan-mem', 1, '2019-03-02 09:00:16', '2019-03-02 09:00:16'),
(22, 'Công nghệ sinh học', 'cong-nghe-sinh-hoc', 1, '2019-03-02 09:00:26', '2019-03-02 09:00:26'),
(23, 'Công nghệ thực phẩm / Dinh dưỡng', 'cong-nghe-thuc-pham-dinh-duong', 1, '2019-03-02 09:00:37', '2019-03-02 09:00:37'),
(24, 'Cơ khí / Ô tô / Tự động hóa', 'co-khi-o-to-tu-dong-hoa', 1, '2019-03-02 09:00:44', '2019-03-02 09:00:44'),
(25, ' Dầu khí', 'dau-khi', 1, '2019-03-02 09:00:50', '2019-03-02 09:00:50'),
(26, 'Dịch vụ khách hàng', 'dich-vu-khach-hang', 1, '2019-03-02 09:01:09', '2019-03-02 09:01:09'),
(27, ' Du lịch', 'du-lich', 1, '2019-03-02 09:01:16', '2019-03-02 09:01:16'),
(28, 'Dược phẩm', 'duoc-pham', 1, '2019-03-02 09:01:22', '2019-03-02 09:01:22'),
(29, 'Điện / Điện tử / Điện lạnh', 'dien-dien-tu-dien-lanh', 1, '2019-03-02 09:01:28', '2019-03-02 09:01:28'),
(30, 'Đồ gỗ', 'do-go', 1, '2019-03-02 09:01:49', '2019-03-02 09:01:49'),
(31, 'Giải trí', 'giai-tri', 1, '2019-03-02 09:01:59', '2019-03-02 09:01:59'),
(32, 'Giáo dục / Đào tạo', 'giao-duc-dao-tao', 1, '2019-03-02 09:02:10', '2019-03-02 09:02:10'),
(33, 'Hàng gia dụng / Chăm sóc cá nhân', 'hang-gia-dung-cham-soc-ca-nhan', 1, '2019-03-02 09:02:26', '2019-03-02 09:02:26'),
(34, 'Hàng hải', 'hang-hai', 1, '2019-03-02 09:02:32', '2019-03-02 09:02:32'),
(35, 'Hàng không', 'hang-khong', 1, '2019-03-02 09:02:38', '2019-03-02 09:02:38'),
(36, 'Hành chính / Thư ký', 'hanh-chinh-thu-ky', 1, '2019-03-02 09:02:45', '2019-03-02 09:02:45'),
(37, 'Hóa học', 'hoa-hoc', 1, '2019-03-02 09:02:51', '2019-03-02 09:02:51'),
(38, 'In ấn / Xuất bản', 'in-an-xuat-ban', 1, '2019-03-02 09:02:57', '2019-03-02 09:02:57'),
(39, 'Kế toán / Kiểm toán', 'ke-toan-kiem-toan', 1, '2019-03-02 09:03:05', '2019-03-02 09:03:05'),
(40, 'Khoáng sản', 'khoang-san', 1, '2019-03-02 09:03:10', '2019-03-02 09:03:10'),
(41, 'Kiến trúc', 'kien-truc', 1, '2019-03-02 09:03:16', '2019-03-02 09:03:16'),
(42, 'Lao động phổ thông', 'lao-dong-pho-thong', 1, '2019-03-02 09:03:37', '2019-03-02 09:03:37'),
(43, 'Lâm Nghiệp', 'lam-nghiep', 1, '2019-03-02 09:03:43', '2019-03-02 09:03:43'),
(44, 'Luật / Pháp lý', 'luat-phap-ly', 1, '2019-03-02 09:03:49', '2019-03-02 09:03:49'),
(45, ' Môi trường', 'moi-truong', 1, '2019-03-02 09:03:56', '2019-03-02 09:03:56'),
(46, 'Mới tốt nghiệp / Thực tập', 'moi-tot-nghiep-thuc-tap', 1, '2019-03-02 09:04:01', '2019-03-02 09:04:01'),
(47, ' Mỹ thuật / Nghệ thuật / Thiết kế', 'my-thuat-nghe-thuat-thiet-ke', 1, '2019-03-02 09:04:08', '2019-03-02 09:04:08'),
(48, 'Ngân hàng', 'ngan-hang', 1, '2019-03-02 09:04:13', '2019-03-02 09:04:13'),
(49, 'Nhà hàng / Khách sạn', 'nha-hang-khach-san', 1, '2019-03-02 09:04:19', '2019-03-02 09:04:19'),
(50, 'Nhân sự', 'nhan-su', 1, '2019-03-02 09:04:25', '2019-03-02 09:04:25'),
(51, 'Nội ngoại thất', 'noi-ngoai-that', 1, '2019-03-02 09:04:37', '2019-03-02 09:04:37'),
(52, 'Nông nghiệp', 'nong-nghiep', 1, '2019-03-02 09:04:44', '2019-03-02 09:04:44'),
(53, 'Phi chính phủ / Phi lợi nhuận', 'phi-chinh-phu-phi-loi-nhuan', 1, '2019-03-02 09:05:02', '2019-03-02 09:05:02'),
(54, 'Quản lý chất lượng (QA/QC)', 'quan-ly-chat-luong-qa-qc', 1, '2019-03-02 09:05:09', '2019-03-02 09:05:09'),
(55, 'Quản lý điều hành', 'quan-ly-dieu-hanh', 1, '2019-03-02 09:05:15', '2019-03-02 09:05:15'),
(56, 'Quảng cáo / Đối ngoại / Truyền Thông', 'quang-cao-doi-ngoai-truyen-thong', 1, '2019-03-02 09:05:21', '2019-03-02 09:05:21'),
(57, 'Sản xuất / Vận hành sản xuất', 'san-xuat-van-hanh-san-xuat', 1, '2019-03-02 09:05:27', '2019-03-02 09:05:27'),
(58, 'Tài chính / Đầu tư', 'tai-chinh-dau-tu', 1, '2019-03-02 09:05:34', '2019-03-02 09:05:34'),
(59, 'Thống kê', 'thong-ke', 1, '2019-03-02 09:05:40', '2019-03-02 09:05:40'),
(60, 'Thu mua / Vật tư', 'thu-mua-vat-tu', 1, '2019-03-02 09:05:46', '2019-03-02 09:05:46'),
(61, 'Thủy lợi', 'thuy-loi', 1, '2019-03-02 09:05:52', '2019-03-02 09:05:52'),
(62, 'Thủy sản / Hải sản', 'thuy-san-hai-san', 1, '2019-03-02 09:05:58', '2019-03-02 09:05:58'),
(63, 'Thư viện', 'thu-vien', 1, '2019-03-02 09:06:07', '2019-03-02 09:06:07'),
(64, 'Thực phẩm - Đồ uống', 'thuc-pham-do-uong', 1, '2019-03-02 09:06:15', '2019-03-02 09:06:15'),
(65, 'Tiếp thị / Marketing', 'tiep-thi-marketing', 1, '2019-03-02 09:06:31', '2019-03-02 09:06:31'),
(66, 'Tiếp thị trực tuyến', 'tiep-thi-truc-tuyen', 1, '2019-03-02 09:06:37', '2019-03-02 09:06:37'),
(67, 'Tổ chức sự kiện', 'to-chuc-su-kien', 1, '2019-03-02 09:06:43', '2019-03-02 09:06:43'),
(68, 'Trắc địa / Địa Chất', 'trac-dia-dia-chat', 1, '2019-03-02 09:06:53', '2019-03-02 09:06:53'),
(69, 'Truyền hình / Báo chí / Biên tập', 'truyen-hinh-bao-chi-bien-tap', 1, '2019-03-02 09:07:11', '2019-03-02 09:07:11'),
(70, 'Tư vấn', 'tu-van', 1, '2019-03-02 09:07:20', '2019-03-02 09:07:20'),
(71, 'Vận chuyển / Giao nhận /  Kho vận', 'van-chuyen-giao-nhan-kho-van', 1, '2019-03-02 09:07:29', '2019-03-02 09:07:29'),
(72, 'Xây dựng', 'xay-dung', 1, '2019-03-02 09:07:35', '2019-03-02 09:07:35'),
(73, 'Xuất nhập khẩu', 'xuat-nhap-khau', 1, '2019-03-02 09:07:41', '2019-03-02 09:07:41'),
(74, 'Y tế / Chăm sóc sức khỏe', 'y-te-cham-soc-suc-khoe', 1, '2019-03-02 09:07:47', '2019-03-02 09:07:47'),
(75, 'Bảo trì / Sửa chữa', 'bao-tri-sua-chua', 1, '2019-03-02 09:07:54', '2019-03-02 09:07:54'),
(76, 'Ngành khác', 'nganh-khac', 1, '2019-03-02 09:08:03', '2019-03-02 09:08:03'),
(77, 'Chăm Sóc Khách Hàng', 'cham-soc-khach-hang', 1, '2019-03-11 08:22:30', '2019-03-11 08:22:30'),
(78, 'Nhân Viên Kỹ Thuật', 'nhan-vien-ky-thuat', 1, '2019-03-11 09:46:26', '2019-03-11 09:46:26'),
(79, 'Công nhân', 'cong-nhan', 1, '2019-03-15 08:35:45', '2019-03-15 08:35:45'),
(80, 'May mặc', 'may-mac', 1, '2019-03-15 08:36:07', '2019-03-15 08:36:07'),
(81, 'Vệ sinh công nghiệp', 've-sinh-cong-nghiep', 1, '2019-03-16 02:41:42', '2019-03-16 02:41:42'),
(82, 'Lái xe', 'lai-xe', 1, '2019-03-16 03:35:25', '2019-03-16 03:35:25'),
(83, 'Lễ tân', 'le-tan', 0, '2019-03-22 07:24:47', '2019-03-22 07:24:47'),
(84, 'Phone', 'phone', 0, '2019-09-23 08:35:48', '2019-09-23 08:35:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contents` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_type_id` int(11) NOT NULL,
  `coupon_manage_id` int(11) NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon_manages`
--

CREATE TABLE `coupon_manages` (
  `id` int(11) NOT NULL,
  `num_of_use` int(11) NOT NULL,
  `product_use_coupon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon_types`
--

CREATE TABLE `coupon_types` (
  `id` int(11) NOT NULL,
  `purpose` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value_percent` int(11) NOT NULL,
  `value_fix_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `required_date` datetime NOT NULL,
  `shipped_date` datetime NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `list_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL
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
  `payment_method_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_display` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `num_of_view` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `num_of_brought` int(11) NOT NULL,
  `product_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_use_coupons`
--

CREATE TABLE `product_use_coupons` (
  `id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
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
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `static_pages`
--

INSERT INTO `static_pages` (`id`, `title`, `title_slug`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Introduce', 'introduce', '<p>TRang giới thiệu<em>&aacute;d&aacute;dasd</em></p>\n', '2019-09-24 09:12:21', '2019-09-24 09:16:46'),
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
  `zip_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, NULL, 'user2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'An ANa', 'ACC', '2435454564747', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-09-11 09:42:31', '2019-09-23 13:34:05'),
(2, NULL, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'An AN', 'Tran', '09876577654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-09-11 09:48:13', '2019-09-24 08:41:50'),
(4, NULL, 'tuananh.pham81196@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019/09/11/2019-09-11-156817403011106anh2.jpeg', 'Danh', 'Admin', '09876567765', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-09-11 10:53:50', '2019-09-11 10:53:50'),
(5, NULL, 'a@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '2019/09/23/2019-09-23-156922603727423Screenshot%20from%202019-09-23%2014-38-54.png', 'a', '1', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2019-09-23 15:04:22', '2019-09-23 15:07:17'),
(6, NULL, 'user3@gmail.com', '4297f44b13955235245b2497399d7a93', '2019/09/23/2019-09-23-156922628136517Screenshot%20from%202019-09-23%2014-38-54.png', 'b', 'b', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-09-23 15:11:21', '2019-09-23 15:11:21'),
(7, NULL, 'user22@gmail.com', '4297f44b13955235245b2497399d7a93', '2019/09/23/2019-09-23-156922974145587Screenshot%20from%202019-09-23%2015-54-52.png', 'asdasd', '1', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '2019-09-23 16:07:29', '2019-09-23 16:41:05'),
(8, NULL, 'user222@gmail.com', '4297f44b13955235245b2497399d7a93', '156922980040196.png', 'asdasd', '123', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-09-23 16:10:00', '2019-09-23 16:10:00'),
(9, NULL, 'user33@gmail.com', '4297f44b13955235245b2497399d7a93', '2019/09/23/2019-09-23-156923072918485Screenshot%20from%202019-09-23%2015-54-52.png', '123123', '123123', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-09-23 16:12:18', '2019-09-23 16:25:29'),
(10, NULL, 'admin@vieclamdanang.vn', '4297f44b13955235245b2497399d7a93', '156923248450851.png', 'b', 'a', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '2019-09-23 16:54:44', '2019-09-23 16:54:44'),
(11, NULL, 'admin1@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '156929048363049.png', 'b', 'a', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-09-24 08:43:28', '2019-09-24 09:01:23');

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
-- Chỉ mục cho bảng `coupon_manages`
--
ALTER TABLE `coupon_manages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupon_types`
--
ALTER TABLE `coupon_types`
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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `coupon_manages`
--
ALTER TABLE `coupon_manages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `coupon_types`
--
ALTER TABLE `coupon_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
