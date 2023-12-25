-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2023 lúc 06:33 AM
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
-- Cơ sở dữ liệu: `chungcutest`
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
(3, 'A001', 'Ô tô', 1, 100000, '2023-12-04 21:37:57', '2023-12-08 04:23:05'),
(4, 'B001', 'Xe máy', 1, 50000, '2023-12-04 21:38:21', '2023-12-08 04:26:12'),
(5, 'A002', 'Ô tô', 0, 200000, '2023-12-08 04:32:02', '2023-12-08 04:32:02');

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
(10, 12, 0, 10, '2023-02-01', 3000, 30000, '2023-12-08 04:41:41', '2023-12-08 04:41:41'),
(11, 12, 10, 25, '2023-03-01', 10000, 150000, '2023-12-08 05:11:02', '2023-12-08 05:11:02');

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
(29, 12, '2023-02-01', 30000, 49000, NULL, 'Tiền sửa chữa hệ thống vòi sen', 100000, 179000, 0, '2023-12-08 04:44:04', '2023-12-08 04:44:04'),
(30, 12, '2023-03-01', 150000, 56000, NULL, '', 0, 206000, 0, '2023-12-08 05:12:03', '2023-12-08 05:12:03');

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
(12, 7, 1, 9, 3, 'ông Nguyễn Phát Đức đã thuê căn hộ chung cư số P102-T1 tòa T1 đã thanh toán toàn bộ số tiền thuê trong 1 năm', '200.000.000/năm', '2023-12-08', '2024-12-08', '2023-12-08 04:23:04', '2023-12-08 04:23:04'),
(13, 8, 1, 10, 4, 'ông Nguyễn Minh Khôi đã thuê căn hộ số P103-T1 tòa T1 đã thanh toán trước nữa năm tiền căn hộ', '200.000.000/năm', '2023-12-07', '2024-05-07', '2023-12-08 04:26:12', '2023-12-08 04:26:12'),
(14, 9, 1, 11, NULL, 'ông Nguyễn Hữu Tín đã thuê căn hộ P104-T1 tòa T1 hợp đồng thuê được thực thi ngày 07/12/2023', '200.000.000/năm', '2023-12-07', '2023-12-31', '2023-12-08 04:30:08', '2023-12-08 04:30:08'),
(15, 10, 1, 12, NULL, 'ông Huỳnh Văn Định đã thuê căn hộ số P105-T1 thời hạn nữa năm.', '200.000.000/năm', '2023-01-01', '2023-06-01', '2023-12-08 04:39:20', '2023-12-08 04:39:20'),
(16, 10, 1, 12, NULL, 'ông Huỳnh Văn Định đã thuê căn hộ số P105-T1 thời hạn nữa năm.', '200.000.000/năm', '2023-08-01', '2023-12-01', '2023-12-08 05:31:48', '2023-12-08 05:31:48');

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
(10, 12, 0, 7, '2023-02-01', 7000, 49000, '2023-12-08 04:42:39', '2023-12-08 04:42:39'),
(11, 12, 7, 15, '2023-03-01', 7000, 56000, '2023-12-08 05:11:36', '2023-12-08 05:11:36');

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
(8, 'P101-T1', 4, 0, '2023-12-04 21:35:05', '2023-12-04 21:35:05'),
(9, 'P102-T1', 4, 1, '2023-12-04 21:35:30', '2023-12-08 04:23:05'),
(10, 'P103-T1', 4, 1, '2023-12-04 21:35:52', '2023-12-08 04:26:12'),
(11, 'P104-T1', 4, 1, '2023-12-04 21:36:18', '2023-12-08 04:30:08'),
(12, 'P105-T1', 4, 1, '2023-12-04 21:36:44', '2023-12-08 05:31:48');

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
(4, 'Tầng 1-T1', 4, '2023-12-04 21:33:43', '2023-12-04 21:33:43'),
(5, 'Tầng 1-T2', 5, '2023-12-04 21:34:03', '2023-12-04 21:34:03'),
(6, 'Tầng 1-T3', 6, '2023-12-04 21:34:14', '2023-12-04 21:34:14'),
(7, 'Tầng 1-T4', 7, '2023-12-04 21:34:29', '2023-12-04 21:34:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id_thongbao` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `noidung` varchar(2000) DEFAULT NULL,
  `thoigian` datetime DEFAULT NULL,
  `nhan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id_thongbao`, `id_user`, `tieude`, `noidung`, `thoigian`, `nhan`, `created_at`, `updated_at`) VALUES
(10, 1, 'VỆ SINH MÔI TRƯỜNG', 'Vệ sinh môi trường là một trong những vấn đề quan trọng trong quản lý chung cư. Việc đảm bảo vệ sinh môi trường chính là đảm bảo cho cư dân cuộc sống trong lành, khỏe mạnh. Dưới đây là những tiêu chuẩn tối thiểu nhằm đảm bảo vệ sinh môi trường trong đời sống chung cư:\r\n\r\nMỗi gia đình cần có một thùng rác có nắp đậy với kích cỡ thích hợp;  nhân viên làm sạch sẽ tiến hành dọn dẹp theo lịch trình cố định trong ngày. Không được để thùng đựng rác trong hành lang chung và lối đi vì có thể gây cản trở cho người qua lại cũng như thu hút chuột, gián và các loài sâu bọ khác.\r\nThường xuyên tiến hành dọn dẹp và bảo trì máng rác và họng rác. Rác tích tụ trên bề mặt của hành lang, mái nhà, sân… cũng cần được dọn dẹp ngay để tránh gây tắc nghẽn đường cống. Cần xử lý ngay các dấu hiệu tắc nghẽn trên.\r\nCác khu vực của tòa nhà như mái nhà, giếng trời, vườn và khối đế cũng cần được kiểm tra thường xuyên để tránh nước tù đọng và loại bỏ nơi trú ngụ của muỗi.\r\n Không được để các đồ nội thất và các vật dụng cồng kềnh ở khu vực cửa thoát hiểm. Công ty quản lý sẽ có lịch trình dọn dẹp định kỳ tại các khu vực cần thiết trong tòa  nhà cư.\r\nCác vật dụng có cạnh sắc nhọn hoặc có tính chất nguy hiểm (như vật liệu dễ cháy nổ, ăn mòn) phải được đóng gói và xử lý riêng. Các loại rác thải như báo cũ, nhựa, kim loại, chai nhựa cũng như các vật liệu tương tự khác phải được phân loại cho mục đích tái chế.', '2023-12-08 07:47:24', 0, '2023-12-08 00:47:24', '2023-12-08 00:47:24'),
(11, 1, 'Thanh toán hóa đơn tháng 2023-03-01', 'Vui lòng thanh toán hóa đơn điện nước trong vòng 7 ngày sau khi nhận thông báo', '2023-03-01 00:00:00', 12, '2023-12-08 05:12:03', '2023-12-08 05:12:03'),
(12, 1, 'VỆ SINH MÔI TRƯỜNG', 'Kiểm tra vệ sinh ngày 12/8/2023', '2023-12-08 12:17:46', 11, '2023-12-08 05:17:46', '2023-12-08 05:17:46');

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
(18, 'An toàn PCCC các chung cư: Không chủ quan với hệ thống điện', 1, 'upload/1701996313.webp', '<p><strong>Nhiều vi phạm PCCC có liên quan đến điện</strong></p><p>Theo Tổng Công ty điện lực TP.HCM (EVN HCMC) thời gian qua, đơn vị này đã phối hợp với Cảnh sát PCCC cùng các đơn vị liên quan kiểm tra an toàn điện gần 42.000 cơ sở là chung cư, quán bar, vũ trường, khách sạn, khu dân cư, chợ, cửa hàng gas… Riêng công tác kiểm tra an toàn điện trong PCCC đối với chung cư là 1349 lượt. Qua kiểm tra phát hiện vi phạm&nbsp;quy định về sử dụng điện có 709 lỗi trong hơn 10.000 vi phạm về PCCC (chiếm 6,85% tổng số lỗi vi phạm).</p>', '2023-12-08', '2023-12-08 00:45:13', '2023-12-08 00:45:13'),
(19, 'NỘI QUY VỀ VIỆC ĐẢM BẢO MỸ QUAN – AN TOÀN SỨC KHỎE – VỆ SINH MÔI TRƯỜNG TẠI CHUNG CƯ CAO CẤP', 1, 'upload/1701996660.jpg', '<p>Để đảm bảo và duy trì mỹ quan, an toàn sức khỏe, vệ sinh môi trường, chất lượng sống cũng như nâng cao giá trị của Tòa nhà, các căn hộ và phần sở hữu chung, cư dân phải tuân theo những quy định chung. Dưới đây là một số quy định mà cư dân không được làm:</p><p>_ Phơi quần áo, vải vóc, chăn, màn, khăn hoặc bất kỳ vật dụng nào khác bên trên hoặc vắt ngang lan can, ban công, cửa sổ hay ngoài cửa ra vào của Căn hộ hoặc tại Phần sở hữu chung;</p><p>_ Đặt hoặc chất bất kỳ đồ đạc nào trước cửa ra vào của Căn hộ hoặc tại Phần sở hữu chung. Nếu Cư dân không tuân thủ quy định này, đồ đạc được đặt ở những nơi nói trên sẽ bị xem là vô chủ và sẽ do Đơn vị quản lý vận hành tòa nhà xử lý, thu hồi. Mọi chi phí của việc xử lý này sẽ hoàn toàn do Cư dân gánh chịu và thanh toán lại cho Đơn vị quản lý vận hành tòa nhà khi được yêu cầu dựa trên các chứng từ thanh toán hợp lệ do Đơn vị quản lý vận hành tòa nhà cung cấp;</p>', '2023-12-08', '2023-12-08 00:51:00', '2023-12-08 00:51:00'),
(20, 'Cần nắm rõ những điều này để không bị phạt khi sử dụng nhà chung cư', 1, 'upload/1701996962.jpg', '<p><strong>Các tranh chấp, khiếu nại liên quan đến việc quản lý, sử dụng nhà chung cư được giải quyết theo quy định của Luật Nhà ở, quy chế này và pháp luật có liên quan.&nbsp;</strong></p><p>Thông tư 02/2016/TT-BXD quy định rõ: Nhà chung cư phải được sử dụng đúng công năng, mục đích thiết kế và nội dung dự án được phê duyệt. Việc quản lý, sử dụng nhà chung cư phải tuân thủ nội quy quản lý, sử dụng của từng nhà chung cư, quy định của pháp luật về nhà ở, Quy chế ban hành kèm Thông tư này và pháp luật có liên quan.</p><p>Việc đóng kinh phí quản lý vận hành nhà chung cư được thực hiện theo thỏa thuận giữa chủ sở hữu, người sử dụng nhà chung cư với đơn vị quản lý vận hành trên cơ sở các quy định của pháp luật về nhà ở. Việc sử dụng kinh phí quản lý vận hành, kinh phí bảo trì phần sở hữu chung của nhà chung cư phải bảo đảm đúng mục đích, công khai, minh bạch, theo đúng quy định của pháp luật về nhà ở và Quy chế này; việc đóng góp các khoản phí, lệ phí trong quá trình sử dụng nhà chung cư phải tuân thủ các quy định của pháp luật.</p><p>Chủ sở hữu, người sử dụng nhà chung cư phải đóng kinh phí bảo trì, kinh phí quản lý vận hành, kinh phí hoạt động của Ban quản trị nhà chung cư và các khoản phí, lệ phí khác trong quá trình sử dụng nhà chung cư theo quy định của Quy chế này và pháp luật có liên quan; phải chấp hành nội quy quản lý, sử dụng nhà chung cư, quy định của pháp luật về nhà ở, Quy chế này và pháp luật có liên quan trong quá trình quản lý, sử dụng nhà chung cư.</p><p>Ban quản trị nhà chung cư thay mặt cho các chủ sở hữu, người đang sử dụng để thực hiện các quyền và trách nhiệm liên quan đến việc quản lý, sử dụng nhà chung cư theo quy định của pháp luật về nhà ở và Quy chế này.</p><p>Bản nội quy quản lý, sử dụng nhà chung cư phải có các nội dung chủ yếu như:</p><p>- Quy định áp dụng đối với chủ sở hữu, người sử dụng, người tạm trú và khách ra vào nhà chung cư.</p><p>- Các hành vi bị nghiêm cấm trong sử dụng nhà chung cư và việc xử lý các hành vi vi phạm nội quy quản lý, sử dụng nhà chung cư.</p><p>- Quy định về việc sử dụng phần sở hữu chung của nhà chung cư.</p><p>- Quy định về việc sửa chữa các hư hỏng, thay đổi thiết bị trong phần sở hữu riêng và việc xử lý khi có sự cố nhà chung cư.</p><p>- Quy định về phòng, chống cháy nổ trong nhà chung cư.</p><p>- Quy định về việc công khai các thông tin có liên quan đến việc sử dụng nhà chung cư.</p><p>- Quy định về các nghĩa vụ của chủ sở hữu, người sử dụng nhà chung cư và các quy định tùy thuộc vào đặc điểm của từng nhà chung cư.</p><p>Các tranh chấp, khiếu nại liên quan đến việc quản lý, sử dụng nhà chung cư được giải quyết theo quy định của Luật Nhà ở, quy chế này và pháp luật có liên quan. Trường hợp không thương lượng, hòa giải được thì yêu cầu tòa án giải quyêt theo đúng quy định của pháp luật.</p><p>Các tranh chấp về kinh phí quản lý vận hành nhà chung cư, việc bàn giao, quản lý, sử dụng kinh phí bảo trì phần sở hữu chung của nhà chung cư do UBND cấp tỉnh nơi có nhà chung cư đó giải quyết. Trường hợp không đồng ý với giải quyết của UBND cấp tỉnh thì có quyền yêu cầu tòa án giải quyết theo quy định của pháp luật.</p><figure class=\"table\"><table><tbody><tr><td><figure class=\"image\"><img src=\"https://vietnammoi.mediacdn.vn/stores/news_dataimages/thuandx/112018/07/07/0637_mua-chung-cu_FHFJ.jpg\" alt=\"nhung hanh vi bi cam trong su dung nha chung cu can biet de khong bi phat\"></figure></td></tr><tr><td>Ảnh minh họa.</td></tr></tbody></table></figure><h2><strong>Các hành vi bị nghiêm cấm trong sử dụng nhà chung cư</strong></h2><p>Gây mất an ninh, trật tự, nói tục, chửi bậy, sử dụng truyền thanh, truyền hình hoặc các thiết bị phát ra âm thanh gây ồn ào làm ảnh hưởng đến sinh hoạt của các chủ sở hữu, người sử dụng nhà chung cư.</p><p>Phóng uế, xả rác hoặc các loại chất thải, chất độc hại không đúng nơi quy định, gây ô nhiễm môi trường nhà chung cư; Ném bất cứ vật gì từ cửa sổ, ban công của căn hộ; Chăn, thả, nuôi gia súc, gia cầm trong nhà chung cư.</p><p>Đốt vàng mã, đốt lửa trong nhà chung cư, trừ địa điểm được đốt vàng mã theo quy định tại nhà chung cư; Phơi, để quần áo và bất cứ vật dụng nào trên lan can hoặc tại phần không gian từ lan can trở lên hoặc vắt ngang cửa sổ của căn hộ; Đánh bạc, hoạt động mại dâm trong nhà chung cư.</p><p>Kinh doanh các ngành nghề có liên quan đến vật liệu nổ, dễ cháy, gây nguy hiểm cho tính mạng, tài sản của người sử dụng nhà chung cư; Mua, bán, tàng trữ, sử dụng trái phép chất ma túy tại căn hộ và các khu vực khác trong nhà chung cư; Tự ý chuyển đổi công năng, mục đích sử dụng phần diện tích, các thiết bị thuộc sở hữu chung, sử dụng chung của nhà chung cư.</p><p>Các hành vi khác theo quy định của pháp luật có liên quan đến nhà chung cư: do Hội nghị nhà chung cư quy định thêm cho phù hợp với từng nhà chung cư; Các hành vi bị nghiêm cấm khác theo quy định của pháp luật</p><h2><strong>Hợp đồng mua bán nhà chung cư phải ghi rõ chỗ để xe ô tô</strong></h2><p>Chỗ để xe của nhà chung cư được xây dựng căn cứ vào tiêu chuẩn, quy chuẩn xây dựng và hồ sơ thiết kế được duyệt. Chỗ để xe có thể được bố trí tại tầng hầm, tầng 1, tại phần diện tích khác trong hoặc ngoài tòa nhà chung cư và được ghi rõ trong hợp đồng mua bán, thuê mua căn hộ.</p><p>Đối với nhà chung cư chỉ có một chủ sở hữu thì chỗ để xe thuộc quyền sở hữu, quản lý của chủ sở hữu nhưng phải được sử dụng theo đúng nội dung dự án được phê duyệt.</p><p>Trường hợp nhà chung cư phải có đơn vị quản lý vận hành thì do đơn vị quản lý vận hành thực hiện quản lý chỗ để xe này; nếu thuộc diện không phải có đơn vị quản lý vận hành thì chủ sở hữu tự quản lý hoặc thuê đơn vị khác thực hiện quản lý.</p><p>Nếu không phải có đơn vị quản lý vận hành nhưng thuộc diện phải có Ban Quản trị nhà chung cư theo quy định của Luật Nhà ở thì hội nghị nhà chung cư quyết định giao cho Ban Quản trị hoặc đơn vị khác thay mặt các chủ sở hữu để quản lý chỗ để xe. Nếu không có cả hai đơn vị này thì các chủ sở hữu thống nhất tự tổ chức, quản lý hoặc thuê đơn vị khác thực hiện quản lý chỗ để xe.</p><p>Quy chế nêu rõ người mua, thuê mua căn hộ quyết định mua hoặc thuê chỗ để xe ô tô. Trường hợp nhà chung cư có đủ chỗ để xe ô tô dành cho mỗi căn hộ và người mua căn hộ có nhu cầu mua hoặc thuê chỗ để xe này thì chủ đầu tư phải giải quyết bán hoặc cho thuê chỗ để xe.</p><p>Tuy nhiên phải đảm bảo nguyên tắc mỗi chủ sở hữu căn hộ không được mua, thuê vượt quá số chỗ để xe được thiết kế, xây dựng theo dự án được phê duyệt dành cho một căn hộ hoặc một phần diện tích thuộc sở hữu riêng trong nhà chung cư.</p><p>Trường hợp nhà chung cư không có đủ chỗ để xe ô tô dành cho mỗi căn hộ thì chủ đầu tư phải giải quyết bán, cho thuê chỗ đỗ xe này trên cơ sở thỏa thuận của những người mua căn hộ với nhau. Trường hợp những người mua căn hộ không thỏa thuận được thì chủ đầu tư giải quyết theo phương thức bốc thăm để được mua, thuê chỗ để xe này.</p><p>Việc mua bán, cho thuê chỗ để xe có thể ghi chung trong hợp đồng mua bán, cho thuê căn hộ hoặc lập một hợp đồng riêng. Tiền thuê chỗ để xe được trả hàng tháng hoặc theo định kỳ. Tiền mua chỗ để xe được trả một lần hoặc trả chậm, trả dần theo thỏa thuận của các bên.</p><p>Người mua chỗ để xe ô tô nếu có nhu cầu chuyển nhượng hoặc cho thuê chỗ để xe thì chỉ được chuyển nhượng, cho thuê cho các chủ sở hữu, người đang sử dụng nhà chung cư đó hoặc chuyển nhượng lại cho chủ đầu tư.</p><p>Nếu người mua, thuê mua căn hộ không mua chỗ đỗ xe ô tô thì các bên phải ghi rõ vào trong hợp đồng là phần diện tích này thuộc quyền sở hữu, quản lý của chủ đầu tư và chủ đầu tư không được tính chi phí đầu tư xây dựng chỗ để xe này vào giá bán căn hộ.</p><p>Tổ chức cá nhân sở hữu chỗ để xe có trách nhiệm đóng kinh phí quản lý vận hành và thực hiện bảo trì chỗ để xe này. Trường hợp thuê chỗ để xe thì trách nhiệm bảo trì được thực hiện theo thỏa thuận trong hợp đồng thuê chỗ để xe.</p>', '2023-12-08', '2023-12-08 00:56:02', '2023-12-08 00:56:02');

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
(4, 'Tòa T1', '2023-12-04 21:32:51', '2023-12-04 21:32:51'),
(5, 'Tòa T2', '2023-12-04 21:33:00', '2023-12-04 21:33:00'),
(6, 'Tòa T3', '2023-12-04 21:33:10', '2023-12-04 21:33:10'),
(7, 'Tòa T4', '2023-12-04 21:33:22', '2023-12-04 21:33:22');

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
(1, 'Nguyen Chien Thang', '2001-03-26', 'nguyenchienthang2632001@gmail.com', '0582427509', '$2y$10$SxP62ScawJ1/0p5Z1a.abuD/SD6Jx6i3fLJ7hGurI5XMRNDW/E402', 0, '6546545466', 1, NULL, '2023-11-27 04:43:20'),
(6, 'Nguyen Van A', '2023-12-08', 'a@gmail.com', '0545154815', '$2y$10$886oVFZFLkfpyjHaJsEDcOHqhUWV8BBoecl2p44Z5ZqfF5W31yTzK', 2, '165512185151', 1, '2023-12-08 00:41:54', '2023-12-08 00:41:54'),
(7, 'Nguyễn Phát Đức', '2001-11-02', 'duc@gmail.com', '0548941518', '$2y$10$NsaU/BV/FA2Fyj/cwMOeKuKCu4k5RJrlZIaFZFmyV1cSHkojxcC8i', 2, '5626461654555', 1, '2023-12-08 04:16:17', '2023-12-08 04:16:17'),
(8, 'Nguyễn Minh Khôi', '2001-08-29', 'khoi@gmail.com', '0564851561', '$2y$10$3HDpHXykcV5qYhqSe2WU2.VHBBVWNOLRxJ/rrv5/PLdCJnX76HUWK', 2, '498165815155', 1, '2023-12-08 04:17:12', '2023-12-08 04:17:12'),
(9, 'Nguyễn Hữu Tín', '2001-02-13', 'tin@gmail.com', '0651451548', '$2y$10$iZuzcPN5JqqvjuecV77WlOpKAVI8G21DU1MyQvdIvHli4YaHLSULW', 2, '654516855544', 1, '2023-12-08 04:19:15', '2023-12-08 04:19:15'),
(10, 'Huỳnh Văn Định', '2001-06-13', 'dinh@gmail.com', '056481518', '$2y$10$UOlGthD2J10OtAQezeMssuX8gH1QlNust0O4RBFIJKy57r5FCvCKu', 2, '514568158155', 1, '2023-12-08 04:37:37', '2023-12-08 04:37:37');

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
  MODIFY `id_baixe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `baocaosc`
--
ALTER TABLE `baocaosc`
  MODIFY `id_baocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `dien`
--
ALTER TABLE `dien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id_hopdong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `nuoc`
--
ALTER TABLE `nuoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  MODIFY `id_phanhoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id_phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tang`
--
ALTER TABLE `tang`
  MODIFY `id_tang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id_thongbao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `toa`
--
ALTER TABLE `toa`
  MODIFY `id_toa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
