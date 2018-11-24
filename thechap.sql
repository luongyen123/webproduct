-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2018 lúc 12:54 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 5.6.37

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
  `role_type` char(1) COLLATE utf8_unicode_ci NOT NULL,
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
(1, 'superadmin', '970e2c62764be29be3aa407ab63ac5de', 'tunn.paraline@gmail.com', '2', '2018-05-09 04:00:23', '2018-05-09 04:00:23', '0', '', '', 0),
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'tunguyenngoc24@gmail.com', '1', '2018-05-09 04:00:52', '2018-05-15 23:56:09', '0', '', '', 0),
(3, 'admin3', 'c6d56970e05606d1d7f2b9a2a99ad742', 'tunguyenngoc241@gmail.com', '1', '2018-05-11 04:27:56', '0000-00-00 00:00:00', '0', '', '', 0),
(8, 'admin321', '25d55ad283aa400af464c76d713c07ad', 'admin5@admin.com', '1', '2018-05-11 04:43:53', '0000-00-00 00:00:00', '0', '', '', 0),
(10, 'hoàng diệu trinh', 'e10adc3949ba59abbe56e057f20f883e', 'hoangdieutrinh96@gmail.com', '', '2018-09-20 09:58:41', '0000-00-00 00:00:00', '0', 'ha noi 2', '09876543345', 12345678),
(12, 'hoàng thị linh', 'e10adc3949ba59abbe56e057f20f883e', 'test1@gmail.com', '', '2018-09-20 15:45:28', '0000-00-00 00:00:00', '0', 'hanoi2', '0987543312', 12345667),
(14, 'admin123', 'e10adc3949ba59abbe56e057f20f883e', 'hoangdieutrinh1996@gmail.com', '', '2018-09-21 03:12:37', '0000-00-00 00:00:00', '0', 'hanoi32', '016588987', 12345678),
(15, 'admin12345', 'e10adc3949ba59abbe56e057f20f883e', 'test2@gmail.com', '', '2018-09-21 04:14:37', '0000-00-00 00:00:00', '0', 'hà nội', '12378896423', 1234567),
(16, 'trinh gdragon ', 'e10adc3949ba59abbe56e057f20f883e', 'trinhgd@gmail.com', '', '2018-09-21 04:16:56', '0000-00-00 00:00:00', '0', 'hà nội', '12378896423', 2147483647),
(17, 'hoanglan7', '25d55ad283aa400af464c76d713c07ad', 'test@1gmail.com', '', '2018-09-23 07:55:46', '0000-00-00 00:00:00', '0', 'hanoi2', '0978675853', 12345678),
(19, 'lanhanh90', 'e10adc3949ba59abbe56e057f20f883e', ' lananh@gmail.com', '', '2018-09-26 06:58:01', '0000-00-00 00:00:00', '0', ' vĩnh phúc ', ' 0916829783', 12345678);

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
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `note`, `admin_id`, `createdat`, `updatedat`) VALUES
(18, 0, 'xe máy', 'xe máy ', 10, '2018-11-11 22:27:00', '2018-11-11 22:27:00'),
(19, 0, 'Laptop', 'danh mục laptop', 10, '2018-11-11 22:27:22', '2018-11-11 22:27:22'),
(20, 0, 'ô tô', 'danh mục ô tô', 10, '2018-11-11 22:27:59', '2018-11-11 22:27:59'),
(21, 0, 'Điện thoại ', 'danh mục điện thoại ', 10, '2018-11-11 22:28:34', '2018-11-11 22:28:34'),
(23, 1, 'xe máy honda', 'xe máy honda ', 10, '2018-11-11 22:29:37', '2018-11-11 22:29:37'),
(24, 5, 'vespa', 'xe máy vespa', 10, '2018-11-11 22:37:43', '2018-11-11 22:37:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birrthday` date NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `createdat` datetime NOT NULL,
  `updateat` datetime NOT NULL,
  `interested_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `address` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex` bit(2) NOT NULL,
  `createdby` int(11) NOT NULL,
  `loandate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `birrthday`, `phone`, `money`, `createdat`, `updateat`, `interested_id`, `category_id`, `address`, `note`, `sex`, `createdby`, `loandate`) VALUES
(4, 'nguyễn thế anh', '0000-00-00', '986682755', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1111111111, 0, 'HCM', '', b'00', 0, '0000-00-00'),
(5, 'hoàng thị lan anh ', '0000-00-00', '0916829783', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1234567890, 0, 'ha nội', '', b'00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `historypaid`
--

CREATE TABLE `historypaid` (
  `id` int(11) NOT NULL,
  `money` float(50,0) NOT NULL,
  `paiddate` datetime NOT NULL,
  `typepaid` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(4) NOT NULL,
  `createdat` datetime NOT NULL,
  `updatedat` datetime NOT NULL,
  `createdby` datetime NOT NULL,
  `updateby` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bks` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sk` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sm` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` float DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `historypaid`
--

INSERT INTO `historypaid` (`id`, `money`, `paiddate`, `typepaid`, `note`, `status`, `createdat`, `updatedat`, `createdby`, `updateby`, `customer_id`, `bks`, `sk`, `sm`, `type`, `category_id`) VALUES
(4, 1111111, '0000-00-00 00:00:00', '1', 'ahihi', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '1234', '124', '1212121', 3, 7),
(5, 100000000, '0000-00-00 00:00:00', '2', 'ahihi', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, '1234', '124', '1212121', 3, 6),
(6, 10000000, '0000-00-00 00:00:00', '1', 'ưefrgthy', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, '22G89543', '56DFGHJ3', '567DFGH', 3, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_interestrate`
--

CREATE TABLE `history_interestrate` (
  `id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `percent` float NOT NULL,
  `note` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bit(2) NOT NULL,
  `interestrate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_interestrate`
--

INSERT INTO `history_interestrate` (`id`, `startdate`, `percent`, `note`, `status`, `interestrate_id`) VALUES
(1, '2018-10-20', 0.03, 'db', b'01', 1),
(4, '0000-00-00', 0.03, 'vgbhnj', b'00', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `interest_rate`
--

CREATE TABLE `interest_rate` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bit(2) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` datetime NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `interest_rate`
--

INSERT INTO `interest_rate` (`id`, `name`, `note`, `status`, `createdat`, `updatedat`, `admin_id`) VALUES
(1, 'lãi suất 2%', 'fabr', b'01', '2018-10-20 09:00:45', '2018-10-20 00:00:00', 10),
(2, 'lãi suất 3%', 'zvb', b'01', '2018-10-20 10:11:08', '2018-10-20 00:00:00', 10),
(3, 'lãi suất 1,5', 'gfbx', b'01', '2018-10-20 10:33:10', '2018-10-20 00:00:00', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `paid_historys`
--

CREATE TABLE `paid_historys` (
  `id` int(11) NOT NULL,
  `id_paid` int(11) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `money` float NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `paid_historys`
--

INSERT INTO `paid_historys` (`id`, `id_paid`, `date_paid`, `money`, `status`) VALUES
(4, 5, '2018-11-02 16:18:40', 100000000, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interested_id` (`interested_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `historypaid`
--
ALTER TABLE `historypaid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `history_interestrate`
--
ALTER TABLE `history_interestrate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `interestrate_id` (`interestrate_id`);

--
-- Chỉ mục cho bảng `interest_rate`
--
ALTER TABLE `interest_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Chỉ mục cho bảng `paid_historys`
--
ALTER TABLE `paid_historys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `historypaid`
--
ALTER TABLE `historypaid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `history_interestrate`
--
ALTER TABLE `history_interestrate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `interest_rate`
--
ALTER TABLE `interest_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `paid_historys`
--
ALTER TABLE `paid_historys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Các ràng buộc cho bảng `history_interestrate`
--
ALTER TABLE `history_interestrate`
  ADD CONSTRAINT `history_interestrate_ibfk_1` FOREIGN KEY (`interestrate_id`) REFERENCES `interest_rate` (`id`);

--
-- Các ràng buộc cho bảng `interest_rate`
--
ALTER TABLE `interest_rate`
  ADD CONSTRAINT `interest_rate_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
