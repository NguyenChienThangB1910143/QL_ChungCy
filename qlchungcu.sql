-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2023 lúc 09:21 AM
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
(1, 'A001', 'Xe máy', 1, 300000, '2023-08-28 19:56:14', '2023-12-02 01:03:10'),
(2, 'A002', 'Xe máy', 0, 200000, '2023-11-23 09:27:55', '2023-12-02 01:01:54');

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
(7, 1, 0, 5, '2023-12-02', 10000, 50000, '2023-12-02 00:47:13', '2023-12-02 00:47:13'),
(8, 1, 5, 10, '2023-12-03', 10000, 50000, '2023-12-02 00:53:16', '2023-12-02 00:53:16'),
(9, 2, 0, 10, '2023-12-02', 10000, 100000, '2023-12-02 01:04:11', '2023-12-02 01:04:11');

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
(25, 1, '2023-12-02', 0, 0, NULL, '', 0, 0, 0, '2023-12-02 00:47:55', '2023-12-02 00:47:55'),
(26, 1, '2023-12-02', 50000, 100000, NULL, '', 0, 150000, 0, '2023-12-02 00:58:29', '2023-12-02 00:58:29'),
(27, 2, '2023-12-02', 100000, 100000, NULL, '', 0, 200000, 0, '2023-12-02 01:05:17', '2023-12-02 01:05:17'),
(28, 2, '2023-12-02', 70000, 100000, 300000, 'Sửa chữa', 100000, 570000, 0, '2023-12-02 01:05:58', '2023-12-02 01:05:58');

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
(10, 2, 1, 1, NULL, 'Hợp đồng được ký kết và thỏa thuận đôi bên', '200000000/năm', '2023-12-02', '2023-12-29', '2023-12-02 00:46:39', '2023-12-02 00:46:39'),
(11, 2, 1, 2, 1, 'Ban quản lý và Người thuê đã thỏa thuận', '200000000/năm', '2023-12-02', '2023-12-28', '2023-12-02 01:03:10', '2023-12-02 01:03:10');

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
(7, 1, 0, 10, '2023-12-02', 10000, 100000, '2023-12-02 00:47:36', '2023-12-02 00:47:36'),
(8, 1, 10, 20, '2023-12-03', 10000, 100000, '2023-12-02 00:54:06', '2023-12-02 00:54:06'),
(9, 2, 0, 10, '2023-12-02', 10000, 100000, '2023-12-02 01:04:56', '2023-12-02 01:04:56');

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
(1, 1, 1, 'phản hồi', 'ngày 13/10', '2023-10-12 17:07:31', '2023-10-12 10:07:31', '2023-10-12 10:07:31');

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
(1, 'P101', 1, 1, '2023-08-28 19:54:40', '2023-12-02 00:46:39'),
(2, 'P2', 1, 1, '2023-10-12 10:57:33', '2023-12-02 01:03:10'),
(3, 'P101-2', 2, 0, '2023-10-24 00:57:36', '2023-11-18 08:20:05'),
(4, 'P201-2', 2, 0, '2023-11-18 08:15:40', '2023-11-27 04:30:41'),
(5, 'P101-3', 3, 0, '2023-11-23 09:27:03', '2023-11-27 04:30:41'),
(6, 'P109-1', 1, 0, '2023-11-28 08:30:15', '2023-11-28 08:30:15'),
(7, 'P105-1', 1, 0, '2023-11-28 08:38:25', '2023-11-28 08:44:53');

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
(1, 1, 'Thông báo', 'Phòng cháy', '2023-10-24 14:42:18', 0, '2023-10-24 07:42:18', '2023-10-24 07:42:18');

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
(1, 'Nguyen Chien Thang', NULL, 'nguyenchienthang2632001@gmail.com', '0582427509', '$2y$10$SxP62ScawJ1/0p5Z1a.abuD/SD6Jx6i3fLJ7hGurI5XMRNDW/E402', 0, '6546545466', NULL, NULL, '2023-11-27 04:43:20'),
(2, 'Khách Văn A', '1999-11-25', 'a@gmail.com', '02118512', '$2y$10$WdQ97EnrxgHmuDDhQA9afOKwMV6l3BC43H/MC.rBn6eDE8DwCyMMC', 2, '6415684', 1, '2023-10-07 07:26:31', '2023-10-27 07:30:54');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id_hopdong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nuoc`
--
ALTER TABLE `nuoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `id_phanhoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id_phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
