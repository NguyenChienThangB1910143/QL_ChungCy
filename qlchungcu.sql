-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2023 lúc 05:20 PM
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
(1, 'A001', 'Xe máy', 1, 300000, '2023-08-28 19:56:14', '2023-11-16 06:47:23'),
(2, 'A002', 'Ô tô', 1, 200000, '2023-11-23 09:27:55', '2023-11-23 09:33:05');

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
  `hinh` varchar(255) NOT NULL,
  `thoigian` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baocaosc`
--

INSERT INTO `baocaosc` (`id_baocao`, `id_user`, `id_phong`, `tieude`, `noidung`, `hinh`, `thoigian`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Sửa chữa', 'hệ thống vòi sen', '', '2023-10-12 14:47:45', '2023-10-12 07:47:45', '2023-10-12 07:47:45'),
(2, 2, 1, 'Sửa chữa', 'hệ thống vòi sen', '', '2023-10-12 14:48:14', '2023-10-12 07:48:14', '2023-10-12 07:48:14'),
(3, 2, 1, 'Sửa chữa', 'hệ thống vòi sen', '', '2023-10-12 14:48:52', '2023-10-12 07:48:52', '2023-10-12 07:48:52'),
(4, 2, 1, 'báo cáo', 'ngày 13/10', '', '2023-10-13 02:59:33', '2023-10-12 19:59:33', '2023-10-12 19:59:33'),
(5, 2, 1, 'Sửa chữa', 'hệ thống vòi sen', '', '2023-10-24 08:04:48', '2023-10-24 01:04:48', '2023-10-24 01:04:48'),
(6, 2, 1, 'Tin 6', 'acsac', '', '2023-10-27 07:37:55', '2023-10-27 00:37:55', '2023-10-27 00:37:55'),
(7, 2, 1, 'Tin 3', 'sằe', 'C:\\xampp\\tmp\\php3B71.tmp', '2023-10-31 11:04:08', '2023-10-31 04:04:08', '2023-10-31 04:04:08'),
(8, 2, 1, 'Tin 3', 'sẽ được sửa ngày 16/10', 'C:\\xampp\\tmp\\php77AC.tmp', '2023-10-31 11:08:46', '2023-10-31 04:08:46', '2023-10-31 04:08:46'),
(9, 2, 1, 'Tin 3', 'sadfasf', 'uploads/1698751428.png', '2023-10-31 11:23:48', '2023-10-31 04:23:48', '2023-10-31 04:23:48'),
(10, 2, 1, 'sfa', 'àvasd', 'uploads/1698751710.jpg', '2023-10-31 11:28:30', '2023-10-31 04:28:30', '2023-10-31 04:28:30');

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
  `thanhtien` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dien`
--

INSERT INTO `dien` (`id`, `id_phong`, `chiso_cu`, `chiso_moi`, `thoigian`, `dongia`, `thanhtien`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 3, '2023-09-28', 10000, NULL, '2023-09-27 21:46:32', '2023-09-27 21:46:32'),
(2, 1, 3, 10, '2023-10-24', 7000, NULL, '2023-10-24 00:28:34', '2023-10-24 00:28:34'),
(3, 4, 0, 7, '2023-11-18', 10000, 70000, '2023-11-18 09:41:40', '2023-11-18 09:41:40'),
(4, 5, 0, 7, '2023-11-23', 10000, 70000, '2023-11-23 09:37:03', '2023-11-23 09:37:03');

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
  `tienbaixe` int(11) DEFAULT NULL,
  `khac` varchar(255) DEFAULT NULL,
  `thuthem` int(11) DEFAULT NULL,
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
(20, 1, '2023-10-24', 49000, 40000, 100000, 'Phụ thu', 100000, 289000, 0, '2023-10-24 01:03:59', '2023-10-24 01:03:59'),
(21, 4, '2023-11-18', 70000, 100000, NULL, '', 0, 170000, 1, '2023-11-18 09:43:33', '2023-11-18 09:50:49'),
(22, 5, '2023-11-23', 70000, 70000, 200000, '', 0, 340000, 0, '2023-11-23 09:38:05', '2023-11-23 09:38:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `id_hopdong` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ql` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `id_baixe` int(11) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `gia` varchar(50) DEFAULT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hopdong`
--

INSERT INTO `hopdong` (`id_hopdong`, `id_user`, `id_ql`, `id_phong`, `id_baixe`, `noidung`, `gia`, `ngaybatdau`, `ngayketthuc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, NULL, '2023-08-29', '2023-10-20', '2023-08-28 19:56:43', '2023-11-18 08:00:30'),
(2, 2, 1, 1, 1, NULL, NULL, '2023-10-01', '2023-11-02', '2023-10-09 11:47:58', '2023-10-18 11:13:55'),
(3, 3, 1, 2, 1, NULL, NULL, '2023-09-25', '2023-10-27', '2023-10-12 10:58:19', '2023-10-12 10:58:19'),
(4, 4, 1, 2, 1, NULL, NULL, '2023-11-16', '2023-12-10', '2023-11-16 06:47:23', '2023-11-16 06:47:23'),
(5, 4, 1, 3, NULL, 'Đã thuê phòng xxx chấp nhận điều khoản,....', '200000/tháng', '2023-11-18', '2023-11-18', '2023-11-18 07:58:33', '2023-11-18 08:13:16'),
(6, 2, 1, 4, NULL, 'Ông Văn A đã chấp nhận mọi điều khoản,....', '1000000000/năm', '2023-11-18', '2023-11-19', '2023-11-18 08:17:54', '2023-11-18 08:17:54'),
(7, 4, 1, 1, NULL, 'ằdvsdvs', '200.000.000/năm', '2023-11-16', '2023-11-17', '2023-11-18 08:19:39', '2023-11-18 08:19:39'),
(8, 5, 1, 5, 2, 'Hợp đồng thuê được cả hai bên chấp nhận mọi .......', '1000000000/năm', '2023-11-23', '2023-11-23', '2023-11-23 09:33:05', '2023-11-23 09:33:05');

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
  `thanhtien` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nuoc`
--

INSERT INTO `nuoc` (`id`, `id_phong`, `chiso_cu`, `chiso_moi`, `thoigian`, `dongia`, `thanhtien`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 3, '2023-09-28', 20000, NULL, '2023-09-27 22:07:47', '2023-09-27 22:07:47'),
(2, 1, 3, 7, '2023-10-24', 10000, NULL, '2023-10-24 00:29:13', '2023-10-24 00:29:13'),
(3, 4, 0, 10, '2023-11-18', 10000, 100000, '2023-11-18 09:41:58', '2023-11-18 09:41:58'),
(4, 5, 0, 10, '2023-11-23', 7000, 70000, '2023-11-23 09:37:38', '2023-11-23 09:37:38');

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
(7, 1, 5, 'Sửa chữa', 'hệ thống vòi sen', '2023-10-24 13:09:57', '2023-10-24 06:09:57', '2023-10-24 06:09:57'),
(8, 1, 10, 'ưdf', 'fdswfvds', '2023-10-31 12:28:26', '2023-10-31 05:28:26', '2023-10-31 05:28:26');

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
(1, 'P101', 1, 0, '2023-08-28 19:54:40', '2023-11-18 08:20:05'),
(2, 'P2', 1, 1, '2023-10-12 10:57:33', '2023-11-16 06:47:23'),
(3, 'P101-2', 2, 0, '2023-10-24 00:57:36', '2023-11-18 08:20:05'),
(4, 'P201-2', 2, 1, '2023-11-18 08:15:40', '2023-11-18 08:17:54'),
(5, 'P101-3', 3, 1, '2023-11-23 09:27:03', '2023-11-23 09:33:05');

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
(2, 'Tầng 2-2', 2, '2023-10-24 00:52:44', '2023-10-24 00:53:06'),
(3, 'T1-3', 3, '2023-11-23 09:26:35', '2023-11-23 09:26:35');

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
(7, 1, 'Thông báo', 'ácvdava', '2023-10-24 15:01:13', 2, '2023-10-24 08:01:13', '2023-10-24 08:01:13'),
(8, 1, 'Thông báo mới', 'Thực hiện PCCC', '2023-11-01 14:29:34', 0, '2023-11-01 07:29:34', '2023-11-01 07:29:34'),
(9, 1, 'Thông báo 23/11', 'Thông báo phòng P101-3 ồn ào', '2023-11-23 16:36:22', 5, '2023-11-23 09:36:22', '2023-11-23 09:36:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `tieude`, `id_user`, `hinhanh`, `noidung`, `thoigian`, `created_at`, `updated_at`) VALUES
(14, 'Gía chung cư', 1, 'upload/1698844968.jpg', '<p>Bạn cần phải làm gì để đầu tư Bất động sản hiệu quả? Đây là câu hỏi luôn được đặt ra nhiều năm trở lại đây.</p><p>Ai cũng biết rằng, các tỉ phú thế giới hiện nay. Có rất nhiều người xuất thân từ Bất động sản. Bất động sản không phải là lĩnh vực mới, mang lại lợi nhuận cao và rủi ro cũng cao.</p><p>Luôn có nhiều và đầy đủ nguồn thông tin. Chúng tôi xử lý và đánh giá thông tin liên quan tới thị trường, xu hướng,… Vinh dự luôn cùng đồng hành với nhiều đối tác, bạn bè để cùng đầu tư sinh lợi nhuận trong lĩnh vực Bất động sản.</p><p>Liên hệ ngay 0916.199.656 để tham gia câu lạc bộ đầu tư Bất động sản. Bạn có thể tham khảo các dự án Bất động sản bằng cách sử dụng chức năng tìm kiếm bên dưới.</p>', '2023-10-24', '2023-10-24 00:35:58', '2023-11-01 06:22:48'),
(15, 'Thông báo', 1, 'upload/1698844980.png', '<p>Bạn cần phải làm gì để đầu tư Bất động sản hiệu quả? Đây là câu hỏi luôn được đặt ra nhiều năm trở lại đây.</p><p>Ai cũng biết rằng, các tỉ phú thế giới hiện nay. Có rất nhiều người xuất thân từ Bất động sản. Bất động sản không phải là lĩnh vực mới, mang lại lợi nhuận cao và rủi ro cũng cao.</p><p>Luôn có nhiều và đầy đủ nguồn thông tin. Chúng tôi xử lý và đánh giá thông tin liên quan tới thị trường, xu hướng,… Vinh dự luôn cùng đồng hành với nhiều đối tác, bạn bè để cùng đầu tư sinh lợi nhuận trong lĩnh vực Bất động sản.</p><p>Liên hệ ngay 0916.199.656 để tham gia câu lạc bộ đầu tư Bất động sản. Bạn có thể tham khảo các dự án Bất động sản bằng cách sử dụng chức năng tìm kiếm bên dưới.</p>', '2023-11-01', '2023-11-01 03:57:13', '2023-11-01 06:23:00'),
(16, 'ĐỂ ĐẦU TƯ BẤT ĐỘNG SẢN HIỆU QUẢ', 1, 'upload/1698839724.jpg', '<p>Bạn cần phải làm gì để đầu tư Bất động sản hiệu quả? Đây là câu hỏi luôn được đặt ra nhiều năm trở lại đây.</p><p>Ai cũng biết rằng, các tỉ phú thế giới hiện nay. Có rất nhiều người xuất thân từ Bất động sản. Bất động sản không phải là lĩnh vực mới, mang lại lợi nhuận cao và rủi ro cũng cao.</p><p>Luôn có nhiều và đầy đủ nguồn thông tin. Chúng tôi xử lý và đánh giá thông tin liên quan tới thị trường, xu hướng,… Vinh dự luôn cùng đồng hành với nhiều đối tác, bạn bè để cùng đầu tư sinh lợi nhuận trong lĩnh vực Bất động sản.</p><p>Liên hệ ngay 0916.199.656 để tham gia câu lạc bộ đầu tư Bất động sản. Bạn có thể tham khảo các dự án Bất động sản bằng cách sử dụng chức năng tìm kiếm bên dưới.</p>', '2023-11-01', '2023-11-01 04:55:24', '2023-11-01 04:55:24'),
(17, 'Tin tức 23/11/2023', 1, 'upload/1700757319.png', '<p>tình hình chung cư</p>', '2023-11-23', '2023-11-23 09:35:19', '2023-11-23 09:35:19');

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
(2, 'T2', '2023-10-24 00:52:20', '2023-10-24 00:52:20'),
(3, 'T3', '2023-11-23 09:26:09', '2023-11-23 09:26:09');

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
(2, 'Khách Văn A', '1999-11-25', 'a@gmail.com', '02118512', '$2y$10$WdQ97EnrxgHmuDDhQA9afOKwMV6l3BC43H/MC.rBn6eDE8DwCyMMC', 2, '6415684', 1, '2023-10-07 07:26:31', '2023-10-27 07:30:54'),
(3, 'Khách Văn A', '2002-10-13', 'b@gmail.com', '024654511', '$2y$10$6VNxhYx3POKU1qSWHTTg9e5jvv5FHM6S4.mWEB6ArDFvL9He9Imse', 2, '6415684152', 1, '2023-10-12 10:56:43', '2023-10-12 10:56:43'),
(4, 'Văn C', '1999-12-24', 'c@gmail.com', '0154651554', '$2y$10$znNHeK2uGgahTBKVdrkp0OGU638f8EKQ3914uRZFmCqSmRM/VJnSy', 2, '564532154', 1, '2023-10-24 00:54:38', '2023-10-24 01:00:54'),
(5, 'Nguyễn Văn D', '1999-01-01', 'd@gmail.com', '0254651515', '$2y$10$f8KKbCYmfrM/fLfD8mIc9.fRaLTz92pZptGptAXFvhIJ3iYlMyX2C', 2, '21561665452554', 1, '2023-11-23 09:31:49', '2023-11-23 09:31:49');

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
  MODIFY `id_baixe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `baocaosc`
--
ALTER TABLE `baocaosc`
  MODIFY `id_baocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `dien`
--
ALTER TABLE `dien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id_hopdong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `nuoc`
--
ALTER TABLE `nuoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `id_phanhoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id_phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tang`
--
ALTER TABLE `tang`
  MODIFY `id_tang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id_thongbao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `toa`
--
ALTER TABLE `toa`
  MODIFY `id_toa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
