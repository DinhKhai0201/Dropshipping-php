--
-- Cơ sở dữ liệu: `dropshiping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_types`
--

CREATE TABLE `category_types` (
  `_id` int(11) NOT NULL,
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `parentId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rankingNo` int(11) DEFAULT '0',
  `categoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_types`
--
ALTER TABLE `category_types`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
