-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2024 at 08:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

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
  `id_mau_sacs` int NOT NULL,
  `id_dung_luongs` int NOT NULL,
  `so_luong` int NOT NULL,
  `gia_goc` double NOT NULL,
  `gia_ban` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bien_thes`
--

INSERT INTO `bien_thes` (`id`, `id_san_phams`, `id_mau_sacs`, `id_dung_luongs`, `so_luong`, `gia_goc`, `gia_ban`) VALUES
(1, 1, 5, 3, 20, 25000000, 24000000),
(2, 1, 6, 4, 20, 37000000, 34000000),
(3, 1, 5, 4, 17, 37000000, 34000000),
(4, 1, 6, 3, 20, 25000000, 24000000),
(5, 2, 3, 3, 12, 30000000, 28000000),
(6, 2, 3, 4, 18, 37000000, 31000000),
(7, 3, 6, 4, 11, 35000000, 30000000),
(8, 4, 6, 3, 14, 9000000, 8900000),
(9, 5, 4, 3, 20, 25000000, 24000000),
(10, 7, 3, 1, 20, 7300000, 7000000),
(11, 7, 2, 2, 20, 8000000, 7600000);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `id_don_hangs` int NOT NULL,
  `id_bien_thes` int NOT NULL,
  `id_san_phams` int NOT NULL,
  `so_luong` int NOT NULL,
  `gia_san_pham` double NOT NULL,
  `danh_gia` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `id_don_hangs`, `id_bien_thes`, `id_san_phams`, `so_luong`, `gia_san_pham`, `danh_gia`) VALUES
(13, 24, 8, 4, 1, 8900000, 1),
(14, 25, 7, 3, 3, 30000000, 1),
(15, 25, 5, 2, 2, 28000000, 1),
(16, 27, 7, 3, 1, 30000000, NULL),
(17, 27, 5, 2, 1, 28000000, NULL),
(18, 28, 5, 2, 2, 28000000, NULL),
(19, 29, 5, 2, 1, 28000000, NULL),
(20, 30, 6, 2, 1, 31000000, NULL),
(21, 31, 7, 3, 1, 30000000, NULL),
(22, 31, 8, 4, 3, 8900000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `danh_gias`
--

CREATE TABLE `danh_gias` (
  `id` int NOT NULL,
  `diem_so` float NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ngay_danh_gia` datetime NOT NULL,
  `id_tai_khoans` int NOT NULL,
  `id_bien_thes` int NOT NULL,
  `id_san_phams` int NOT NULL,
  `trang_thai` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_gias`
--

INSERT INTO `danh_gias` (`id`, `diem_so`, `noi_dung`, `ngay_danh_gia`, `id_tai_khoans`, `id_bien_thes`, `id_san_phams`, `trang_thai`) VALUES
(3, 5, 'Sản phẩm đúng với mô tả', '2024-08-06 00:00:00', 3, 5, 2, 1),
(4, 5, 'Sản phẩm rất tuyệt vời', '2024-08-08 11:11:28', 3, 7, 3, 1),
(5, 4.5, 'Rất ok', '2024-08-08 11:29:01', 3, 8, 4, 1);

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
(5, 'Xiaomi'),
(7, 'Vivoaaa');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `id_tai_khoans` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(50) NOT NULL,
  `tong_tien` double NOT NULL,
  `ngay_dat_hang` datetime NOT NULL,
  `id_ma_giam_gias` int DEFAULT NULL,
  `id_thanh_toans` int NOT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `id_tai_khoans`, `ten_nguoi_nhan`, `dia_chi`, `email`, `so_dien_thoai`, `tong_tien`, `ngay_dat_hang`, `id_ma_giam_gias`, `id_thanh_toans`, `trang_thai`) VALUES
(24, 3, 'tuyen123', 'Bắc Giang', 'tuyen123@gmail.com', '0252525233', 8900000, '2024-07-26 22:25:59', NULL, 1, 4),
(25, 3, 'tuyen123', 'Bắc Giang', 'tuyen123@gmail.com', '0252525233', 146000000, '2024-07-27 14:27:55', NULL, 1, 4),
(27, 3, 'tuyen123', 'Bắc Giang', 'tuyen123@gmail.com', '0252525233', 58000000, '2024-07-27 14:43:47', NULL, 1, 2),
(28, 7, 'Tuyến', 'Bắc Giang', 'tuyen123@gmail.com', '0252525233', 56000000, '2024-07-30 14:15:25', NULL, 1, 1),
(29, 7, 'tuyen123', 'Bắc Giang', 'tuyen123@gmail.com', '0252525233', 28000000, '2024-07-30 14:46:07', NULL, 1, 5),
(30, 7, 'tuyen123', 'Bắc Giang', 'tuyen123@gmail.com', '0252525233', 31000000, '2024-08-02 10:49:30', NULL, 1, 1),
(31, 3, 'Hoàng Tuyến', 'Bắc Giang', 'tuyen123@gmail.com', '0252525233', 56700000, '2024-08-03 14:37:11', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dung_luongs`
--

CREATE TABLE `dung_luongs` (
  `id` int NOT NULL,
  `ten_dung_luong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dung_luongs`
--

INSERT INTO `dung_luongs` (`id`, `ten_dung_luong`) VALUES
(1, '64 GB'),
(2, '128 GB'),
(3, '256 GB'),
(4, '512 GB'),
(5, '1 TB');

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `id_bien_thes` int NOT NULL,
  `so_luong` int NOT NULL,
  `id_tai_khoans` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mau_sacs`
--

CREATE TABLE `mau_sacs` (
  `id` int NOT NULL,
  `ten_mau_sac` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mau_sacs`
--

INSERT INTO `mau_sacs` (`id`, `ten_mau_sac`) VALUES
(1, 'Đỏ'),
(2, 'Cam'),
(3, 'Vàng'),
(4, 'Xanh'),
(5, 'Xám'),
(6, 'Tím');

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

--
-- Dumping data for table `ma_giam_gias`
--

INSERT INTO `ma_giam_gias` (`id`, `ten_ma`, `shortcode`, `muc_giam`, `trang_thai`, `ngay_tao`, `ngay_het_han`) VALUES
(1, 'mã giảm 10k', 'giam10k', 10000, 1, '2024-07-23', '2024-07-31');

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

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `anh_chinh`, `anh_phu_1`, `anh_phu_2`, `anh_phu_3`, `mo_ta_ngan`, `mo_ta`, `ngay_tao`, `id_danh_mucs`) VALUES
(1, 'Samsung Galaxy S23 Ultra', './public/images/samsung-galaxy-s23-ultra-1-2.jpg ', './public/images/samsung-galaxy-s23-ultra-1-2.jpg ', './public/images/samsung-galaxy-s23-ultra-1-2.jpg', './public/images/samsung-galaxy-s23-ultra-1-2.jpg', 'Hệ điều hành: Android.Chip: Snapdragon 8 Gen 2 for Galaxy.Ram: 8 GBDung lượng: 256 GB ||512 GBPin: 5000 mAhHãng: Samsung ', ' Samsung Galaxy S23 Ultra 5G 256GB là chiếc smartphone cao cấp nhất của nhà Samsung, sở hữu cấu hình không tưởng với con chip khủng được Qualcomm tối ưu riêng cho dòng Galaxy và camera lên đến 200 MP, xứng danh là chiếc flagship Android được mong đợi nhất trong năm 2023.', '2018-07-24', 2),
(2, 'Samsung Galaxy S24 Ultra', './public/images/samsung-galaxy-s24-ultra-xam-1.jpg ', './public/images/samsung-galaxy-s24-ultra-xam-1.jpg ', './public/images/samsung-galaxy-s24-ultra-xam-1.jpg', './public/images/samsung-galaxy-s24-ultra-xam-1.jpg', 'Hệ điều hành: AndroidRAM: 8GBDung lượng: 256 GB || 512 GB || 1GBPin: 5000 mAhHãng: Samsung ', ' Samsung Galaxy S24 Ultra 5G 512GB khi ra mắt đã tạo nên cơn sốt thị trường, đặc điểm nổi bật là chip Snapdragon 8 Gen 3 for Galaxy và camera 200 MP tích hợp AI. Mẫu điện thoại này hứa hẹn làm nổi bật trong năm 2024 với sức mạnh và nhiều tính năng đỉnh cao.', '2018-07-24', 2),
(3, 'iPhone 15 Pro Max', './public/images/iphone-15-pro-max-blue-2-1.jpg ', './public/images/iphone-15-pro-max-blue-2-1.jpg ', './public/images/iphone-15-pro-max-blue-2-1.jpg', './public/images/iphone-15-pro-max-blue-2-1.jpg', 'Hệ điều hành: IOSRAM: 8 GBDung lượng: 256 GB || 512 GB || 1 TBPin: 4422 mAhHãng: Iphone ', ' iPhone 15 Pro Max mẫu điện thoại mới nhất của Apple cuối cùng cũng đã chính thức được ra mắt vào tháng 09/2023. Mẫu điện thoại này sở hữu một con chip với hiệu năng mạnh mẽ Apple A17 Pro, màn hình đẹp mắt và cụm camera vô cùng chất lượng.', '2018-07-24', 1),
(4, 'OPPO Reno11 F', './public/images/oppo-reno-11-pro-xam-1-1.jpg ', './public/images/oppo-reno-11-pro-xam-1-1.jpg ', './public/images/oppo-reno-11-pro-xam-1-1.jpg', './public/images/oppo-reno-11-pro-xam-1-1.jpg', 'Hệ điều hành: AndroidRAM: 8 GBDung lượng: 256 GB || 512 GBPin: 5000 mAhHãng: OPPO ', ' OPPO Reno11 F 5G là một chiếc điện thoại tầm trung mới được OPPO ra mắt trong thời gian gần đây. Máy sở hữu nhiều ưu điểm nổi bật như thiết kế trẻ trung, màn hình đẹp, hiệu năng mạnh mẽ nhờ chip Dimensity 7050 5G, hứa hẹn mang đến trải nghiệm tốt khi sử dụng.', '2018-07-24', 5),
(5, 'iPhone 15 Pro', './public/images/iphone-15-pro-max-white-2-1.jpg', './public/images/iphone-15-pro-max-white-2-1.jpg', './public/images/iphone-15-pro-max-white-2-1.jpg', './public/images/iphone-15-pro-max-white-2-1.jpg', 'Hệ điều hành: iOS 17 | RAM:  8 GB | Pin, Sạc:  4422 mAh20 W | Hãng: iPhone', 'iPhone 15 Pro Max mẫu điện thoại mới nhất của Apple cuối cùng cũng đã chính thức được ra mắt vào tháng 09/2023. Mẫu điện thoại này sở hữu một con chip với hiệu năng mạnh mẽ Apple A17 Pro, màn hình đẹp mắt và cụm camera vô cùng chất lượng.', '2017-07-24', 1),
(7, 'Xiaomi Redmi Note 13 Pro', './public/images/vivo-y28-cam-1.jpg ', './public/images/vivo-y28-cam-1.jpg ', './public/images/vivo-y28-cam-1.jpg', './public/images/vivo-y28-cam-1.jpg', 'Ram: 8GB | Dung lượng: 64GB,128GB   ', '   Sự bùng nổ của công nghệ di động trong những năm gần đây đã mang đến cho người dùng vô số lựa chọn smartphone đa dạng. Trong phân khúc tầm trung, Xiaomi Redmi Note 13 Pro 128GB nổi lên như một ứng cử viên sáng giá với những ưu điểm vượt trội về thiết kế, hiệu năng nhờ chip Helio G99-Ultra, camera 200 MP và kết hợp sạc nhanh 67 W.', '2003-08-24', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `tai_khoan` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `gioi_tinh` int NOT NULL,
  `vai_tro` int DEFAULT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `tai_khoan`, `mat_khau`, `hinh_anh`, `email`, `so_dien_thoai`, `dia_chi`, `gioi_tinh`, `vai_tro`, `trang_thai`) VALUES
(1, 'admin123', 'admin123', NULL, 'admin123@gmail.com', '0', 'Hà Nội', 1, 2, 2),
(3, 'tuyen123', 'tuyen123', './public/images/4f7d3e21e82e95ffd779172277fcb040.jpg', 'tuyen123@gmail.com', '0252525233', 'Bắc Giang', 0, 1, 1),
(7, 'tuyen', '123', './public/images/4f7d3e21e82e95ffd779172277fcb040.jpg', 'ductuyen@gmail.com', '098956666', 'Bắc Giang', 1, NULL, 1);

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
(1, 'Thanh toán khi nhận hàng');

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
(2, 'Xác nhận'),
(3, 'Đang giao'),
(4, 'Đã giao'),
(5, 'Hủy');

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
  ADD KEY `id_san_phams` (`id_san_phams`),
  ADD KEY `id_dung_luongs` (`id_dung_luongs`),
  ADD KEY `id_mau_sacs` (`id_mau_sacs`);

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
  ADD KEY `id_bien_thes` (`id_bien_thes`),
  ADD KEY `id_san_phams` (`id_san_phams`);

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
-- Indexes for table `dung_luongs`
--
ALTER TABLE `dung_luongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tai_khoans` (`id_tai_khoans`),
  ADD KEY `id_san_phams` (`id_bien_thes`);

--
-- Indexes for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `danh_gias`
--
ALTER TABLE `danh_gias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dung_luongs`
--
ALTER TABLE `dung_luongs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `mau_sacs`
--
ALTER TABLE `mau_sacs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ma_giam_gias`
--
ALTER TABLE `ma_giam_gias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thanh_toans`
--
ALTER TABLE `thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `bien_thes_ibfk_1` FOREIGN KEY (`id_san_phams`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `bien_thes_ibfk_2` FOREIGN KEY (`id_dung_luongs`) REFERENCES `dung_luongs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `bien_thes_ibfk_3` FOREIGN KEY (`id_mau_sacs`) REFERENCES `mau_sacs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `danh_gias_ibfk_2` FOREIGN KEY (`id_bien_thes`) REFERENCES `bien_thes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `danh_gias_ibfk_3` FOREIGN KEY (`id_san_phams`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `gio_hangs_ibfk_2` FOREIGN KEY (`id_bien_thes`) REFERENCES `bien_thes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
