-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2023 lúc 05:02 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlchungcu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baixe`
--

CREATE TABLE `baixe` (
  `id_baixe` int(11) NOT NULL,
  `ms` varchar(255) NOT NULL,
  `loaixe` varchar(255) NOT NULL,
  `tinhtrang` int(11) DEFAULT NULL,
  `gia` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baixe`
--

INSERT INTO `baixe` (`id_baixe`, `ms`, `loaixe`, `tinhtrang`, `gia`, `created_at`, `updated_at`) VALUES
(1, 'A001', 'Xe máy', 0, 300000, '2023-08-28 19:56:14', '2023-08-28 19:56:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baocaosc`
--

CREATE TABLE `baocaosc` (
  `id_baocao` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `noidung` varchar(255) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baocaosc`
--

INSERT INTO `baocaosc` (`id_baocao`, `id_user`, `id_phong`, `tieude`, `noidung`, `thoigian`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Sửa chữa', 'hệ thống vòi sen', '2023-10-12 14:47:45', '2023-10-12 07:47:45', '2023-10-12 07:47:45'),
(2, 2, 1, 'Sửa chữa', 'hệ thống vòi sen', '2023-10-12 14:48:14', '2023-10-12 07:48:14', '2023-10-12 07:48:14'),
(3, 2, 1, 'Sửa chữa', 'hệ thống vòi sen', '2023-10-12 14:48:52', '2023-10-12 07:48:52', '2023-10-12 07:48:52'),
(4, 2, 1, 'báo cáo', 'ngày 13/10', '2023-10-13 02:59:33', '2023-10-12 19:59:33', '2023-10-12 19:59:33'),
(5, 2, 1, 'Sửa chữa', 'hệ thống vòi sen', '2023-10-24 08:04:48', '2023-10-24 01:04:48', '2023-10-24 01:04:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietthongbao`
--

CREATE TABLE `chitietthongbao` (
  `id_chitiettb` int(11) NOT NULL,
  `id_thongbao` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `trangthai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chungcu`
--

CREATE TABLE `chungcu` (
  `id_chungcu` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `chudautu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dien`
--

CREATE TABLE `dien` (
  `id` int(11) NOT NULL,
  `id_phong` int(11) DEFAULT NULL,
  `chiso_cu` int(11) NOT NULL,
  `chiso_moi` int(11) NOT NULL,
  `thoigian` date NOT NULL,
  `dongia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dien`
--

INSERT INTO `dien` (`id`, `id_phong`, `chiso_cu`, `chiso_moi`, `thoigian`, `dongia`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 3, '2023-09-28', 10000, '2023-09-27 21:46:32', '2023-09-27 21:46:32'),
(2, 1, 3, 10, '2023-10-24', 7000, '2023-10-24 00:28:34', '2023-10-24 00:28:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `thoigian` date NOT NULL,
  `tiendien` int(11) NOT NULL,
  `tiennuoc` int(11) NOT NULL,
  `tienbaixe` int(11) NOT NULL,
  `khac` varchar(255) NOT NULL,
  `thuthem` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_phong`, `thoigian`, `tiendien`, `tiennuoc`, `tienbaixe`, `khac`, `thuthem`, `thanhtien`, `tinhtrang`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-09-28', 30000, 60000, 30000, 'Sửa chữa', 100000, 220000, 1, '2023-09-27 22:30:08', '2023-10-17 07:29:33'),
(2, 1, '2023-10-11', 30000, 60000, 20000, 'Bảo trì', 100000, 210000, 1, '2023-10-11 08:01:31', '2023-10-11 08:09:21'),
(3, 1, '2023-10-11', 30000, 60000, 20000, 'dvđzv', 100000, 210000, 1, '2023-10-11 08:11:37', '2023-10-11 08:12:30'),
(4, 1, '2023-10-11', 30000, 60000, 20000, 'cfdzvgx', 100000, 210000, 1, '2023-10-11 08:11:50', '2023-10-11 08:11:58'),
(5, 1, '2023-10-11', 30000, 60000, 20000, 'jhvj b hv', 100000, 210000, 1, '2023-10-11 08:20:59', '2023-10-11 08:21:03'),
(6, 1, '2023-10-11', 30000, 60000, 20000, 'bdfnsdb', 100000, 210000, 1, '2023-10-11 08:48:57', '2023-10-11 08:49:04'),
(9, 1, '2023-10-11', 30000, 60000, 20000, 'ưadfcasdva', 100000, 210000, 1, '2023-10-11 09:42:33', '2023-10-11 09:43:07'),
(10, 1, '2023-10-12', 30000, 60000, 20000, 'dsfdsac', 100000, 210000, 1, '2023-10-11 23:58:16', '2023-10-11 23:59:22'),
(11, 1, '2023-10-12', 30000, 60000, 20000, 'reqvdfv', 100000, 210000, 1, '2023-10-12 00:00:25', '2023-10-12 00:00:54'),
(12, 1, '2023-09-12', 30000, 60000, 20000, 'jytjnfgnm', 100000, 210000, 1, '2023-10-12 00:58:36', '2023-10-12 01:59:26'),
(13, 1, '2023-10-13', 30000, 60000, 20000, 'sửa chữa', 100000, 210000, 1, '2023-10-12 22:20:56', '2023-10-12 22:21:52'),
(14, 1, '2023-10-17', 30000, 60000, 20000, 'ưaqdqf', 100000, 210000, 1, '2023-10-17 05:38:44', '2023-10-17 11:18:39'),
(15, 1, '2023-10-17', 30000, 60000, 20000, 'jhbnjb j', 100000, 210000, 1, '2023-10-17 07:27:22', '2023-10-24 00:41:09'),
(16, 1, '2023-10-17', 30000, 60000, 20000, 'sdfcava', 100000, 210000, 1, '2023-10-17 07:33:10', '2023-10-17 11:18:17'),
(17, 1, '2023-10-17', 30000, 60000, 20000, 'đsfsd', 100000, 210000, 1, '2023-10-17 07:54:14', '2023-10-17 11:17:41'),
(18, 1, '2023-10-17', 30000, 60000, 20000, 'adv', 100000, 210000, 1, '2023-10-17 08:43:05', '2023-10-17 08:43:39'),
(19, 1, '2023-10-24', 49000, 40000, 100000, 'Sửa chữa', 100000, 289000, 0, '2023-10-24 00:29:55', '2023-10-24 00:29:55'),
(20, 1, '2023-10-24', 49000, 40000, 100000, 'Phụ thu', 100000, 289000, 0, '2023-10-24 01:03:59', '2023-10-24 01:03:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `id_hopdong` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ql` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `id_baixe` int(11) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hopdong`
--

INSERT INTO `hopdong` (`id_hopdong`, `id_user`, `id_ql`, `id_phong`, `id_baixe`, `ngaybatdau`, `ngayketthuc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2023-08-29', '2023-10-20', '2023-08-28 19:56:43', '2023-10-18 11:15:38'),
(2, 2, 1, 1, 1, '2023-10-01', '2023-11-02', '2023-10-09 11:47:58', '2023-10-18 11:13:55'),
(3, 3, 1, 2, 1, '2023-09-25', '2023-10-27', '2023-10-12 10:58:19', '2023-10-12 10:58:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nuoc`
--

CREATE TABLE `nuoc` (
  `id` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `chiso_cu` int(11) NOT NULL,
  `chiso_moi` int(11) NOT NULL,
  `thoigian` date NOT NULL,
  `dongia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nuoc`
--

INSERT INTO `nuoc` (`id`, `id_phong`, `chiso_cu`, `chiso_moi`, `thoigian`, `dongia`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 3, '2023-09-28', 20000, '2023-09-27 22:07:47', '2023-09-27 22:07:47'),
(2, 1, 3, 7, '2023-10-24', 10000, '2023-10-24 00:29:13', '2023-10-24 00:29:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

CREATE TABLE `phanhoi` (
  `id_phanhoi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_baocao` int(11) NOT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `noidung` varchar(255) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanhoi`
--

INSERT INTO `phanhoi` (`id_phanhoi`, `id_user`, `id_baocao`, `tieude`, `noidung`, `thoigian`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'phản hồi', 'ngày 13/10', '2023-10-12 17:07:31', '2023-10-12 10:07:31', '2023-10-12 10:07:31'),
(2, 1, 2, 'sửa chữa', 'sẽ được sửa ngày 16/10', '2023-10-12 17:37:27', '2023-10-12 10:37:27', '2023-10-12 10:37:27'),
(3, 1, 3, 'Sửa chữa', 'hệ thống vòi sen', '2023-10-13 03:53:57', '2023-10-12 20:53:57', '2023-10-12 20:53:57'),
(4, 1, 4, 'ưgdfvsd', 'dsvfsv', '2023-10-13 05:23:46', '2023-10-12 22:23:46', '2023-10-12 22:23:46'),
(5, 1, 4, 'Sửa chữa', 'hệ thống vòi sen', '2023-10-17 14:21:39', '2023-10-17 07:21:39', '2023-10-17 07:21:39'),
(6, 1, 1, 'sửa chữa', 'sẽ được sửa ngày', '2023-10-24 08:05:40', '2023-10-24 01:05:40', '2023-10-24 01:05:40'),
(7, 1, 5, 'Sửa chữa', 'hệ thống vòi sen', '2023-10-24 13:09:57', '2023-10-24 06:09:57', '2023-10-24 06:09:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `id_phong` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `id_tang` int(11) NOT NULL,
  `tinhtrang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`id_phong`, `ten`, `id_tang`, `tinhtrang`, `created_at`, `updated_at`) VALUES
(1, 'P101', 1, 1, '2023-08-28 19:54:40', '2023-10-09 11:47:58'),
(2, 'P2', 1, 1, '2023-10-12 10:57:33', '2023-10-12 10:58:19'),
(3, 'P101-2', 2, 0, '2023-10-24 00:57:36', '2023-10-24 00:57:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tang`
--

CREATE TABLE `tang` (
  `id_tang` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `id_toa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tang`
--

INSERT INTO `tang` (`id_tang`, `ten`, `id_toa`, `created_at`, `updated_at`) VALUES
(1, 'Tầng 1-1', 1, '2023-08-28 19:50:30', '2023-10-24 00:53:18'),
(2, 'Tầng 2-2', 2, '2023-10-24 00:52:44', '2023-10-24 00:53:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id_thongbao` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `noidung` varchar(255) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `nhan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id_thongbao`, `id_user`, `tieude`, `noidung`, `thoigian`, `nhan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Thông báo', 'Phòng cháy', '2023-10-24 14:42:18', 0, '2023-10-24 07:42:18', '2023-10-24 07:42:18'),
(2, 1, 'Thông báo', 'An toàn', '2023-10-24 14:45:41', 0, '2023-10-24 07:45:41', '2023-10-24 07:45:41'),
(3, 1, 'Thông báo', 'avd', '2023-10-24 14:47:23', 0, '2023-10-24 07:47:23', '2023-10-24 07:47:23'),
(4, 1, 'Thông báo', 'sầdvs', '2023-10-24 14:49:13', 0, '2023-10-24 07:49:13', '2023-10-24 07:49:13'),
(5, 1, 'Thông báo', 'ầvsav', '2023-10-24 14:50:13', 0, '2023-10-24 07:50:13', '2023-10-24 07:50:13'),
(6, 1, 'Thông báo', 'ấvadvdv', '2023-10-24 15:00:54', 1, '2023-10-24 08:00:54', '2023-10-24 08:00:54'),
(7, 1, 'Thông báo', 'ácvdava', '2023-10-24 15:01:13', 2, '2023-10-24 08:01:13', '2023-10-24 08:01:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `tieude`, `id_user`, `noidung`, `thoigian`, `created_at`, `updated_at`) VALUES
(14, 'Gía chung cư', 1, '<p><strong>(VTC News) -</strong></p><h2><strong>Từ năm 2015 đến nay, chỉ số tăng giá chung cư ở Hà Nội và TP.HCM đã vượt tốc độ tăng thu nhập của người dân, khiến loại hình bất động sản này ngày càng đắt đỏ.</strong></h2><p>Báo cáo của batdongsan.com.vn vừa công bố cho thấy, Quý III/2023, nhu cầu tìm mua chung cư tiếp tục tăng 1% và tìm thuê tăng 6% so với quý trước. Trong đó, các căn hộ có giá 2 - 4 tỷ đồng được tìm kiếm nhiều nhất.</p><p>Trong năm 2023, giá rao bán chung cư không có nhiều thay đổi, tăng từ 1 - 5% tại Hà Nội và gần như đi ngang ở TP.HCM. Tuy nhiên, xét trong giai đoạn dài từ năm 2015 đến nay, chỉ số tăng giá chung cư Hà Nội và TP.HCM đã vượt tốc độ tăng thu nhập của người dân. Sau 8 năm, giá chung cư TP.HCM và Hà Nội tăng lần lượt là 82% và 56%, trong khi thu nhập của người dân khu vực thành thị chỉ tăng 39%.&nbsp;</p><p>Ông Lê Bảo Long, Giám đốc chiến lược của Batdongsan.com.vn nhận định: “<i>Việc mua chung cư đang ngày càng khó đối với người dân khi tốc độ tăng thu nhập không bắt kịp tốc độ tăng giá nhà. Trong tương lai, các dự án chung cư sơ cấp cũng sẽ có mặt bằng giá cao vì chủ đầu tư phải tối ưu lợi nhuận khi các chi phí bị đẩy lên. Theo báo cáo của Batdongsan.com.vn về tâm lý người </i><a href=\"https://vtc.vn/bao-ve-nguoi-tieu-dung-51.html\"><i>tiêu dùng</i></a><i> bất động sản, trong bối cảnh giá nhà neo cao, người dân đang chuyển sang hướng đi thuê hoặc tìm cách vay mua nhà. Nhưng hiện tại, nhiều người mua vẫn chưa tiến hành vay mua vì họ còn quan ngại về lãi suất</i>”.</p>', '2023-10-24', '2023-10-24 00:35:58', '2023-10-24 00:35:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `toa`
--

CREATE TABLE `toa` (
  `id_toa` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `toa`
--

INSERT INTO `toa` (`id_toa`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'T1', NULL, NULL),
(2, 'T2', '2023-10-24 00:52:20', '2023-10-24 00:52:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `quyen` int(11) NOT NULL,
  `STK` varchar(255) NOT NULL,
  `trangthai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `ngaysinh`, `email`, `sdt`, `password`, `quyen`, `STK`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Chien Thang', NULL, 'nguyenchienthang2632001@gmail.com', '0582427509', '$2y$10$YzX7O1nQayboyc/jl7wSD.9MK7uZ2XrKJzDAB4Nx4l0ulaUDlRgQ6', 0, '6546545466', NULL, NULL, NULL),
(2, 'Khách B', '1999-11-25', 'a@gmail.com', '02118512', '$2y$10$WdQ97EnrxgHmuDDhQA9afOKwMV6l3BC43H/MC.rBn6eDE8DwCyMMC', 2, '6415684', 1, '2023-10-07 07:26:31', '2023-10-11 08:17:01'),
(3, 'Khách Văn A', '2002-10-13', 'b@gmail.com', '024654511', '$2y$10$6VNxhYx3POKU1qSWHTTg9e5jvv5FHM6S4.mWEB6ArDFvL9He9Imse', 2, '6415684152', 1, '2023-10-12 10:56:43', '2023-10-12 10:56:43'),
(4, 'Văn C', '1999-12-24', 'c@gmail.com', '0154651554', '$2y$10$znNHeK2uGgahTBKVdrkp0OGU638f8EKQ3914uRZFmCqSmRM/VJnSy', 2, '564532154', 1, '2023-10-24 00:54:38', '2023-10-24 01:00:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baixe`
--
ALTER TABLE `baixe`
  ADD PRIMARY KEY (`id_baixe`);

--
-- Chỉ mục cho bảng `baocaosc`
--
ALTER TABLE `baocaosc`
  ADD PRIMARY KEY (`id_baocao`);

--
-- Chỉ mục cho bảng `chitietthongbao`
--
ALTER TABLE `chitietthongbao`
  ADD PRIMARY KEY (`id_chitiettb`);

--
-- Chỉ mục cho bảng `chungcu`
--
ALTER TABLE `chungcu`
  ADD PRIMARY KEY (`id_chungcu`);

--
-- Chỉ mục cho bảng `dien`
--
ALTER TABLE `dien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`id_hopdong`);

--
-- Chỉ mục cho bảng `nuoc`
--
ALTER TABLE `nuoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD PRIMARY KEY (`id_phanhoi`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id_phong`);

--
-- Chỉ mục cho bảng `tang`
--
ALTER TABLE `tang`
  ADD PRIMARY KEY (`id_tang`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id_thongbao`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `toa`
--
ALTER TABLE `toa`
  ADD PRIMARY KEY (`id_toa`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baixe`
--
ALTER TABLE `baixe`
  MODIFY `id_baixe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `baocaosc`
--
ALTER TABLE `baocaosc`
  MODIFY `id_baocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chitietthongbao`
--
ALTER TABLE `chitietthongbao`
  MODIFY `id_chitiettb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chungcu`
--
ALTER TABLE `chungcu`
  MODIFY `id_chungcu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dien`
--
ALTER TABLE `dien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id_hopdong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nuoc`
--
ALTER TABLE `nuoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `id_phanhoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id_phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tang`
--
ALTER TABLE `tang`
  MODIFY `id_tang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id_thongbao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `toa`
--
ALTER TABLE `toa`
  MODIFY `id_toa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
