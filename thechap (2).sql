-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2018 lúc 06:46 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thechap`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `role_type` tinyint(1) NOT NULL DEFAULT '2',
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `del_flag` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `address` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `idcard` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`, `role_type`, `createdat`, `updatedat`, `del_flag`, `address`, `phone`, `idcard`) VALUES
(1, 'superadmin', '970e2c62764be29be3aa407ab63ac5de', 'tunn.paraline@gmail.com', 2, '2018-05-09 04:00:23', '2018-05-09 04:00:23', '0', '', '', 0),
(10, 'hoàng diệu trinh', 'e10adc3949ba59abbe56e057f20f883e', 'hoangdieutrinh96@gmail.com', 1, '2018-09-20 09:58:41', '0000-00-00 00:00:00', '0', 'ha noi 2', '09876543345', 12345678),
(12, 'hoàng thị linh', 'e10adc3949ba59abbe56e057f20f883e', 'test1@gmail.com', 2, '2018-09-20 15:45:28', '0000-00-00 00:00:00', '0', 'hanoi2', '0987543312', 12345667),
(18, 'nhanvien1', 'e10adc3949ba59abbe56e057f20f883e', 'nhanvien1@gmail.com', 2, '2018-12-07 14:52:16', '0000-00-00 00:00:00', '0', 'Trâu Quỳ - Gia Lâm- ', '0123456789', 123456788);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `manufacture` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attribute`
--

INSERT INTO `attribute` (`id`, `manufacture`, `type`, `color`, `year`) VALUES
(1, 'honda ', 'honda xfs', 'white', 2000),
(2, 'vespa', 'vespa 123', 'red', 2008),
(4, 'Futture', 'futture345', 'blue', 2005),
(5, 'honda', 'fghjk', 'color', 0),
(6, 'honda123456', 'fghjk', 'color', 0),
(7, 'Vision ', 'beaty', 'red', 1998);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banggia`
--

CREATE TABLE `banggia` (
  `bg_id` int(11) NOT NULL,
  `bg_loai` varchar(10) NOT NULL,
  `bg_ten` varchar(255) NOT NULL,
  `bg_data` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banggia`
--

INSERT INTO `banggia` (`bg_id`, `bg_loai`, `bg_ten`, `bg_data`) VALUES
(3, 'ngay', 'Bảng giá lãi suất ngày tháng 12', '{\"ngay2\":\"7\",\"ngay5\":\"5\",\"ngay10\":\"2\"}'),
(4, 'tuan', 'Bảng giá lãi suất tuần', '{\"tuan2\":\"6\",\"tuan5\":\"4\",\"tuan10\":\"1\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CMND` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `phone`, `address`, `CMND`) VALUES
(6, 'Lê Văn A', '01236795734', 'Trâu Quỳ - Gia Lâm', '123456789'),
(7, 'Hoàng diệu trinh', '01236795734', 'Trâu Quỳ - Gia Lâm- ', '5678903456'),
(8, 'Hoàng anh tuấn ', '0123675734', 'Hà nội ', '1234234567');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongxe`
--

CREATE TABLE `dongxe` (
  `id` int(11) NOT NULL,
  `tendong` varchar(50) NOT NULL,
  `loaixe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dongxe`
--

INSERT INTO `dongxe` (`id`, `tendong`, `loaixe`) VALUES
(1, 'A8', 'Oto'),
(2, 'Q8', 'Oto'),
(3, 'A6', 'Oto'),
(4, 'Q3', 'Oto'),
(5, 'Q5', 'Oto'),
(6, 'X5', 'Oto'),
(7, '320i', 'Oto'),
(8, 'X4', 'Oto'),
(9, 'X3', 'Oto'),
(10, 'X7', 'Oto'),
(11, 'Accent', 'Oto'),
(12, 'Grand I10', 'Oto'),
(13, 'Sanraphe', 'Oto'),
(14, 'Kona', 'Oto'),
(15, 'Celerio', 'Oto'),
(16, 'Swift', 'Oto'),
(17, 'Ertiga', 'Oto'),
(18, 'Wave Alpha', 'xemay'),
(19, 'Future', 'xemay'),
(20, 'Wave RSX', 'xemay'),
(21, 'SH Mode', 'xemay'),
(22, 'Jupiter', 'xemay'),
(23, 'Janus', 'xemay'),
(24, 'Sirius', 'xemay'),
(25, 'VIVA', 'xemay'),
(26, 'Impulse', 'xemay'),
(27, '5', 'dienthoai'),
(28, 'f1s', 'dienthoai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangxe`
--

CREATE TABLE `hangxe` (
  `id` int(11) NOT NULL,
  `tenhang` varchar(50) NOT NULL,
  `loaixe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hangxe`
--

INSERT INTO `hangxe` (`id`, `tenhang`, `loaixe`) VALUES
(1, 'Audi', 'Oto'),
(2, 'BMW', 'Oto'),
(3, 'Hyunda', 'Oto'),
(4, 'Suzuki', 'Oto'),
(5, 'Honda', 'xemay'),
(6, 'Yamaha', 'xemay'),
(7, 'Suzuki', 'xemay'),
(8, 'iphone', 'dienthoai'),
(9, 'oppo', 'dienthoai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieucamdo`
--

CREATE TABLE `phieucamdo` (
  `phieucam_id` int(11) NOT NULL,
  `sotien` varchar(50) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `ngayhethan` varchar(10) NOT NULL,
  `ngaycam` int(11) NOT NULL,
  `banggia` int(11) NOT NULL,
  `loaisp` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `CMND` varchar(20) NOT NULL,
  `thongtinsp` text NOT NULL,
  `tienlai` text,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phieucamdo`
--

INSERT INTO `phieucamdo` (`phieucam_id`, `sotien`, `fullname`, `ngayhethan`, `ngaycam`, `banggia`, `loaisp`, `phone`, `address`, `CMND`, `thongtinsp`, `tienlai`, `trangthai`) VALUES
(4, '₫3,000,000', 'Lê Văn A', '2018-12-31', 1542236400, 3, 'Oto', '01236795734', 'Trâu Quỳ - Gia Lâm', '174500860', 'Audi A8 2014', '[\"{\\\"ngaydong\\\":\\\"2018-12-01\\\",\\\"sotiendong\\\":\\\"2000000\\\"}\"]', 1),
(5, '₫3,000,000', 'Hoàng diệu trinh', '2018-12-06', 1542236400, 3, 'xemay', '01236795734', 'Trâu Quỳ - Gia Lâm- ', '5678903456', 'Honda Wave Alpha 2015', '[\"{\\\"ngaydong\\\":\\\"2018-12-09\\\",\\\"sotiendong\\\":\\\"3000000\\\"}\"]', 0),
(9, '₫50,000,000', 'Lê Văn A', '2018-12-31', 1544325403, 3, 'Oto', '01236795734', 'Trâu Quỳ - Gia Lâm', '123456789', 'Audi Q8 2014', NULL, 0),
(10, '₫10,000,000', 'Hoàng anh tuấn ', '2018-12-20', 1544325611, 3, 'xemay', '0123675734', 'Hà nội ', '1234234567', 'Honda Wave Alpha 2014', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `hangxe_id` int(11) NOT NULL,
  `dongxe_id` int(11) NOT NULL,
  `namsx` int(11) NOT NULL,
  `gia` float NOT NULL,
  `loaixe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `hangxe_id`, `dongxe_id`, `namsx`, `gia`, `loaixe`) VALUES
(1, 1, 1, 2018, 5830000000, 'Oto'),
(2, 1, 1, 2017, 5710000000, 'Oto'),
(3, 1, 2, 2018, 4500000000, 'Oto'),
(4, 1, 2, 2017, 4400000000, 'Oto'),
(5, 1, 3, 2018, 2250000000, 'Oto'),
(6, 1, 3, 2017, 2150000000, 'Oto'),
(7, 1, 4, 2018, 1075000000, 'Oto'),
(8, 1, 4, 2017, 992000000, 'Oto'),
(9, 1, 5, 2018, 2666000000, 'Oto'),
(10, 1, 5, 2017, 2500000000, 'Oto'),
(11, 2, 6, 2018, 3599000000, 'Oto'),
(12, 2, 6, 2017, 3199000000, 'Oto'),
(13, 2, 7, 2018, 1689000000, 'Oto'),
(14, 2, 7, 2017, 1439000000, 'Oto'),
(15, 2, 8, 2018, 2399000000, 'Oto'),
(16, 2, 8, 2017, 2390000000, 'Oto'),
(17, 2, 9, 2018, 2063000000, 'Oto'),
(18, 2, 9, 2017, 1999000000, 'Oto'),
(19, 2, 10, 2018, 4200000000, 'Oto'),
(20, 2, 10, 2017, 3860000000, 'Oto'),
(21, 3, 11, 2018, 475000000, 'Oto'),
(22, 3, 11, 2017, 435000000, 'Oto'),
(23, 3, 12, 2018, 375000000, 'Oto'),
(24, 3, 12, 2017, 370000000, 'Oto'),
(25, 3, 13, 2018, 120000000, 'Oto'),
(26, 3, 13, 2017, 970000000, 'Oto'),
(27, 3, 14, 2018, 615000000, 'Oto'),
(28, 3, 14, 2017, 585000000, 'Oto'),
(29, 4, 15, 2018, 410000000, 'Oto'),
(30, 4, 15, 2017, 359000000, 'Oto'),
(31, 4, 16, 2018, 549000000, 'Oto'),
(32, 4, 16, 2017, 359000000, 'Oto'),
(33, 4, 17, 2018, 689000000, 'Oto'),
(34, 4, 17, 2017, 639000000, 'Oto'),
(35, 5, 18, 2018, 17790000, 'xemay'),
(36, 5, 18, 2017, 17700000, 'xemay'),
(37, 5, 18, 2016, 17000000, 'xemay'),
(38, 5, 19, 2018, 31200000, 'xemay'),
(39, 5, 19, 2017, 30990000, 'xemay'),
(40, 5, 19, 2016, 29990000, 'xemay'),
(41, 5, 20, 2018, 22490000, 'xemay'),
(42, 5, 20, 2017, 21500000, 'xemay'),
(43, 5, 20, 21990000, 21990000, 'xemay'),
(44, 5, 21, 2018, 68500000, 'xemay'),
(45, 5, 21, 2017, 60400000, 'xemay'),
(46, 5, 21, 2016, 50490000, 'xemay'),
(47, 6, 22, 2018, 29000000, 'xemay'),
(48, 6, 22, 2017, 28000000, 'xemay'),
(49, 6, 22, 2016, 26000000, 'xemay'),
(50, 6, 23, 2018, 33800000, 'xemay'),
(51, 6, 23, 2017, 31490000, 'xemay'),
(52, 6, 23, 2016, 29500000, 'xemay'),
(53, 6, 24, 2018, 22000000, 'xemay'),
(54, 6, 24, 2017, 19800000, 'xemay'),
(55, 6, 24, 2016, 19100000, 'xemay'),
(56, 7, 25, 2018, 22990000, 'xemay'),
(57, 7, 25, 2017, 21600000, 'xemay'),
(58, 7, 25, 2016, 20800000, 'xemay'),
(59, 7, 26, 2018, 31490000, 'xemay'),
(60, 7, 26, 2017, 31300000, 'xemay'),
(62, 8, 27, 32, 3990000, 'dienthoai'),
(63, 8, 27, 64, 5500000, 'dienthoai'),
(64, 8, 27, 16, 1780000, 'dienthoai'),
(65, 9, 28, 32, 4500000, 'dienthoai');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banggia`
--
ALTER TABLE `banggia`
  ADD PRIMARY KEY (`bg_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dongxe`
--
ALTER TABLE `dongxe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hangxe`
--
ALTER TABLE `hangxe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phieucamdo`
--
ALTER TABLE `phieucamdo`
  ADD PRIMARY KEY (`phieucam_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hangxe_id` (`hangxe_id`),
  ADD KEY `dongxe_id` (`dongxe_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `banggia`
--
ALTER TABLE `banggia`
  MODIFY `bg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `dongxe`
--
ALTER TABLE `dongxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `hangxe`
--
ALTER TABLE `hangxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phieucamdo`
--
ALTER TABLE `phieucamdo`
  MODIFY `phieucam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`hangxe_id`) REFERENCES `hangxe` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`dongxe_id`) REFERENCES `dongxe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
