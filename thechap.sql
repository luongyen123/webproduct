-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2018 at 11:24 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thechap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
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
(17, 'hoanglan7', '25d55ad283aa400af464c76d713c07ad', 'test@1gmail.com', '', '2018-09-23 07:55:46', '0000-00-00 00:00:00', '0', 'hanoi2', '0978675853', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `manufacture` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attribute`
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
-- Table structure for table `banggia`
--

CREATE TABLE `banggia` (
  `bg_id` int(11) NOT NULL,
  `bg_loai` varchar(10) NOT NULL,
  `bg_ten` varchar(255) NOT NULL,
  `bg_data` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banggia`
--

INSERT INTO `banggia` (`bg_id`, `bg_loai`, `bg_ten`, `bg_data`) VALUES
(3, 'ngay', 'Bảng giá lãi suất ngày', '{\"ngay2\":\"7\",\"ngay5\":\"5\",\"ngay10\":\"2\"}'),
(4, 'tuan', 'Bảng giá lãi suất tuần', '{\"tuan2\":\"6\",\"tuan5\":\"4\",\"tuan10\":\"1\"}');

-- --------------------------------------------------------

--
-- Table structure for table `category`
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
-- Dumping data for table `category`
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `phone`, `address`) VALUES
(4, 'nguyễn thế anh', '986682755', 'HCM'),
(5, 'hoàng thị lan anh ', '0916829783', 'ha nội');

-- --------------------------------------------------------

--
-- Table structure for table `historypaid`
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
-- Dumping data for table `historypaid`
--

INSERT INTO `historypaid` (`id`, `money`, `paiddate`, `typepaid`, `note`, `status`, `createdat`, `updatedat`, `createdby`, `updateby`, `customer_id`, `bks`, `sk`, `sm`, `type`, `category_id`) VALUES
(4, 1111111, '0000-00-00 00:00:00', '1', 'ahihi', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '1234', '124', '1212121', 3, 7),
(5, 100000000, '0000-00-00 00:00:00', '2', 'ahihi', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, '1234', '124', '1212121', 3, 6),
(6, 10000000, '0000-00-00 00:00:00', '1', 'ưefrgthy', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, '22G89543', '56DFGHJ3', '567DFGH', 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `history_interestrate`
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
-- Dumping data for table `history_interestrate`
--

INSERT INTO `history_interestrate` (`id`, `startdate`, `percent`, `note`, `status`, `interestrate_id`) VALUES
(1, '2018-10-20', 0.03, 'db', b'01', 1),
(4, '0000-00-00', 0.03, 'vgbhnj', b'00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `interest_rate`
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
-- Dumping data for table `interest_rate`
--

INSERT INTO `interest_rate` (`id`, `name`, `note`, `status`, `createdat`, `updatedat`, `admin_id`) VALUES
(1, 'lãi suất 2%', 'fabr', b'01', '2018-10-20 09:00:45', '2018-10-20 00:00:00', 10),
(2, 'lãi suất 3%', 'zvb', b'01', '2018-10-20 10:11:08', '2018-10-20 00:00:00', 10),
(3, 'lãi suất 1,5', 'gfbx', b'01', '2018-10-20 10:33:10', '2018-10-20 00:00:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `paid_historys`
--

CREATE TABLE `paid_historys` (
  `id` int(11) NOT NULL,
  `id_paid` int(11) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `money` float NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paid_historys`
--

INSERT INTO `paid_historys` (`id`, `id_paid`, `date_paid`, `money`, `status`) VALUES
(4, 5, '2018-11-02 16:18:40', 100000000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `phieucamdo`
--

CREATE TABLE `phieucamdo` (
  `phieucam_id` int(11) NOT NULL,
  `maphieu` varchar(50) NOT NULL,
  `sotien` float NOT NULL,
  `khach_id` int(11) NOT NULL,
  `ngayhethan` int(10) NOT NULL,
  `banggia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banggia`
--
ALTER TABLE `banggia`
  ADD PRIMARY KEY (`bg_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historypaid`
--
ALTER TABLE `historypaid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `history_interestrate`
--
ALTER TABLE `history_interestrate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `interestrate_id` (`interestrate_id`);

--
-- Indexes for table `interest_rate`
--
ALTER TABLE `interest_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `paid_historys`
--
ALTER TABLE `paid_historys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `phieucamdo`
--
ALTER TABLE `phieucamdo`
  ADD PRIMARY KEY (`phieucam_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banggia`
--
ALTER TABLE `banggia`
  MODIFY `bg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `historypaid`
--
ALTER TABLE `historypaid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history_interestrate`
--
ALTER TABLE `history_interestrate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `interest_rate`
--
ALTER TABLE `interest_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paid_historys`
--
ALTER TABLE `paid_historys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phieucamdo`
--
ALTER TABLE `phieucamdo`
  MODIFY `phieucam_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `history_interestrate`
--
ALTER TABLE `history_interestrate`
  ADD CONSTRAINT `history_interestrate_ibfk_1` FOREIGN KEY (`interestrate_id`) REFERENCES `interest_rate` (`id`);

--
-- Constraints for table `interest_rate`
--
ALTER TABLE `interest_rate`
  ADD CONSTRAINT `interest_rate_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
