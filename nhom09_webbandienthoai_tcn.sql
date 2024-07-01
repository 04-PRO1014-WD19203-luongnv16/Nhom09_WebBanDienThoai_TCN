-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2024 at 02:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom09_webbandienthoai_tcn`
--

-- --------------------------------------------------------

--
-- Table structure for table `bien_thes`
--

CREATE TABLE `bien_thes` (
  `id` int NOT NULL,
  `id_san_phams` int NOT NULL,
  `mau_sac` varchar(255) NOT NULL,
  `dung_luong` varchar(255) NOT NULL,
  `so_luong` int NOT NULL,
  `gia_goc` double NOT NULL,
  `gia_ban` double NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `id_don_hangs` int NOT NULL,
  `id_bien_thes` int NOT NULL,
  `id_san_phams` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_gias`
--

CREATE TABLE `danh_gias` (
  `id` int NOT NULL,
  `diem_so` float NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ngay_danh_gia` date NOT NULL,
  `id_tai_khoans` int NOT NULL,
  `id_bien_thes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(3, 'OPPO');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `id_tai_khoans` int NOT NULL,
  `tong_tien` double NOT NULL,
  `ngay_dat_hang` date NOT NULL,
  `id_ma_giam_gias` int NOT NULL,
  `id_thanh_toans` int NOT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `id_san_phams` int NOT NULL,
  `id_bien_thes` int NOT NULL,
  `so_luong` int NOT NULL,
  `id_tai_khoans` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_giam_gias`
--

CREATE TABLE `ma_giam_gias` (
  `id` int NOT NULL,
  `ten_ma` varchar(255) NOT NULL,
  `shortcode` varchar(255) NOT NULL,
  `muc_giam` double NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `ngay_tao` date NOT NULL,
  `ngay_het_han` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `anh_chinh` varchar(255) NOT NULL,
  `anh_phu_1` varchar(255) NOT NULL,
  `anh_phu_2` varchar(255) NOT NULL,
  `anh_phu_3` varchar(255) NOT NULL,
  `mo_ta_ngan` varchar(555) NOT NULL,
  `mo_ta` varchar(555) NOT NULL,
  `ngay_tao` date NOT NULL,
  `id_danh_mucs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `tai_khoan` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `vai_tro` int NOT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanh_toans`
--

CREATE TABLE `thanh_toans` (
  `id` int NOT NULL,
  `ten_thanh_toan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `thanh_toans`
--

INSERT INTO `thanh_toans` (`id`, `ten_thanh_toan`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Thanh toán online');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chờ duyệt'),
(2, 'Đang giao'),
(3, 'Đã giao');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_tai_khoans`
--

CREATE TABLE `trang_thai_tai_khoans` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_tai_khoans`
--

INSERT INTO `trang_thai_tai_khoans` (`id`, `ten_trang_thai`) VALUES
(1, 'Người dùng'),
(2, 'Quản trị viên'),
(3, 'Khóa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bien_thes`
--
ALTER TABLE `bien_thes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_san_phams` (`id_san_phams`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_hangs` (`id_don_hangs`),
  ADD KEY `chi_tiet_don_hangs_ibfk_2` (`id_bien_thes`),
  ADD KEY `id_san_phams` (`id_san_phams`);

--
-- Indexes for table `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tai_khoans` (`id_tai_khoans`),
  ADD KEY `id_bien_thes` (`id_bien_thes`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hangs` (`id_tai_khoans`),
  ADD KEY `id_ma_giam_gias` (`id_ma_giam_gias`),
  ADD KEY `id_thanh_toans` (`id_thanh_toans`),
  ADD KEY `trang_thai` (`trang_thai`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tai_khoans` (`id_tai_khoans`),
  ADD KEY `id_san_phams` (`id_bien_thes`),
  ADD KEY `id_san_phams_2` (`id_san_phams`);

--
-- Indexes for table `ma_giam_gias`
--
ALTER TABLE `ma_giam_gias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_danh_mucs` (`id_danh_mucs`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `tai_khoan` (`tai_khoan`),
  ADD KEY `trang_thai` (`trang_thai`);

--
-- Indexes for table `thanh_toans`
--
ALTER TABLE `thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai_tai_khoans`
--
ALTER TABLE `trang_thai_tai_khoans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bien_thes`
--
ALTER TABLE `bien_thes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_gias`
--
ALTER TABLE `danh_gias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_giam_gias`
--
ALTER TABLE `ma_giam_gias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thanh_toans`
--
ALTER TABLE `thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trang_thai_tai_khoans`
--
ALTER TABLE `trang_thai_tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bien_thes`
--
ALTER TABLE `bien_thes`
  ADD CONSTRAINT `bien_thes_ibfk_1` FOREIGN KEY (`id_san_phams`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_1` FOREIGN KEY (`id_don_hangs`) REFERENCES `don_hangs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_2` FOREIGN KEY (`id_bien_thes`) REFERENCES `bien_thes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_3` FOREIGN KEY (`id_san_phams`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD CONSTRAINT `danh_gias_ibfk_1` FOREIGN KEY (`id_tai_khoans`) REFERENCES `tai_khoans` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `danh_gias_ibfk_2` FOREIGN KEY (`id_bien_thes`) REFERENCES `bien_thes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_ibfk_1` FOREIGN KEY (`id_tai_khoans`) REFERENCES `tai_khoans` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `don_hangs_ibfk_2` FOREIGN KEY (`id_ma_giam_gias`) REFERENCES `ma_giam_gias` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `don_hangs_ibfk_3` FOREIGN KEY (`id_thanh_toans`) REFERENCES `thanh_toans` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `don_hangs_ibfk_4` FOREIGN KEY (`trang_thai`) REFERENCES `trang_thai_don_hangs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `gio_hangs_ibfk_1` FOREIGN KEY (`id_tai_khoans`) REFERENCES `tai_khoans` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `gio_hangs_ibfk_2` FOREIGN KEY (`id_bien_thes`) REFERENCES `bien_thes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `gio_hangs_ibfk_3` FOREIGN KEY (`id_san_phams`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_ibfk_1` FOREIGN KEY (`id_danh_mucs`) REFERENCES `danh_mucs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD CONSTRAINT `tai_khoans_ibfk_1` FOREIGN KEY (`trang_thai`) REFERENCES `trang_thai_tai_khoans` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
