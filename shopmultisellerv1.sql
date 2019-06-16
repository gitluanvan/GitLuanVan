-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 23, 2019 lúc 04:30 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopmultisellerv1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_BinhLuan` int(11) NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `id_User` int(11) NOT NULL,
  `id_SanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_BinhLuan`, `NoiDung`, `id_User`, `id_SanPham`) VALUES
(1, 'cách nào bật lez', 43, 17),
(2, 'Bao lâu thầy có hàng giao tới nơi', 38, 17),
(19, 'qq', 43, 2),
(20, 'hello', 51, 1),
(21, 'sản phẩm nghe êm tai không', 51, 17),
(23, 'phát sóng khoảng bao nhiêu m?', 52, 22),
(24, 'sài tốt ko?', 52, 22),
(25, 'QQ', 51, 17),
(26, 'Hello', 52, 22),
(27, 'Mua rồi có xài được hok mại', 42, 17),
(28, 'bán giá sao', 42, 5),
(29, 'Máy xài tốt ko vậy ?', 52, 24),
(30, 'Chiến game nổi ko?', 52, 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `DanhGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `id_donhang`, `id_sp`, `soluong`, `dongia`, `DanhGia`) VALUES
(28, 8, 1, 2, 4290000, 1),
(29, 8, 17, 1, 450000, 1),
(30, 9, 2, 1, 2290000, 0),
(31, 10, 8, 1, 122000, 0),
(32, 10, 3, 1, 9990000, 0),
(33, 11, 17, 1, 450000, 0),
(34, 12, 2, 1, 2290000, 0),
(35, 13, 17, 1, 450000, 1),
(36, 14, 2, 1, 2290000, 0),
(37, 15, 2, 1, 2290000, 0),
(38, 15, 1, 1, 4290000, 0),
(39, 16, 3, 1, 9990000, 0),
(40, 17, 2, 1, 2290000, 0),
(42, 22, 17, 1, 450000, 1),
(43, 23, 5, 3, 70209000, 0),
(44, 24, 17, 1, 450000, 1),
(45, 25, 1, 1, 4290000, 0),
(46, 25, 9, 1, 26990000, 0),
(47, 25, 5, 1, 23403000, 0),
(48, 25, 7, 1, 179000, 0),
(49, 26, 21, 1, 270000, 0),
(50, 27, 5, 1, 23403000, 1),
(51, 28, 2, 1, 2290000, 0),
(52, 28, 1, 1, 4290000, 0),
(53, 29, 2, 1, 2290000, 0),
(54, 30, 7, 1, 179000, 0),
(55, 30, 5, 1, 23403000, 0),
(56, 31, 4, 1, 359000, 0),
(57, 32, 2, 1, 2290000, 0),
(58, 32, 5, 1, 23403000, 0),
(59, 33, 2, 1, 2290000, 0),
(60, 34, 8, 1, 122000, 0),
(61, 35, 5, 1, 23403000, 0),
(62, 35, 1, 1, 4290000, 0),
(63, 36, 8, 1, 122000, 0),
(64, 37, 1, 1, 4290000, 0),
(65, 37, 9, 1, 26990000, 0),
(66, 38, 1, 1, 4290000, 0),
(67, 39, 6, 1, 14200000, 0),
(68, 40, 5, 1, 23403000, 0),
(69, 41, 2, 1, 2290000, 0),
(70, 41, 7, 1, 179000, 0),
(71, 42, 8, 1, 122000, 0),
(72, 42, 4, 1, 359000, 0),
(73, 42, 6, 1, 14200000, 0),
(74, 43, 1, 1, 4290000, 0),
(75, 44, 2, 1, 2290000, 0),
(76, 45, 3, 1, 9990000, 0),
(77, 46, 5, 1, 23403000, 0),
(78, 47, 8, 1, 122000, 0),
(79, 48, 1, 1, 4290000, 0),
(80, 49, 4, 1, 359000, 0),
(81, 50, 3, 1, 9990000, 0),
(82, 50, 4, 1, 359000, 0),
(83, 51, 8, 1, 122000, 0),
(84, 51, 3, 1, 9990000, 0),
(85, 52, 1, 1, 4290000, 0),
(86, 53, 1, 1, 4290000, 0),
(87, 53, 2, 1, 2290000, 0),
(88, 53, 5, 1, 23403000, 0),
(89, 54, 1, 1, 4290000, 0),
(90, 54, 2, 1, 2290000, 0),
(91, 55, 4, 1, 359000, 0),
(92, 56, 1, 1, 4290000, 0),
(93, 56, 2, 1, 2290000, 0),
(94, 56, 7, 1, 179000, 0),
(95, 57, 6, 1, 14200000, 0),
(96, 58, 1, 1, 4290000, 0),
(97, 58, 5, 1, 23403000, 0),
(98, 58, 2, 1, 2290000, 0),
(99, 58, 9, 1, 26990000, 0),
(100, 59, 1, 1, 4290000, 0),
(101, 59, 2, 1, 2290000, 0),
(102, 59, 5, 1, 23403000, 0),
(103, 60, 3, 1, 9990000, 0),
(104, 60, 4, 1, 359000, 0),
(105, 61, 7, 1, 179000, 0),
(106, 61, 5, 1, 23403000, 0),
(107, 61, 2, 1, 2290000, 0),
(108, 61, 1, 1, 4290000, 0),
(109, 62, 16, 1, 21690000, 0),
(110, 62, 21, 1, 270000, 0),
(111, 62, 17, 1, 450000, 0),
(112, 63, 7, 1, 179000, 0),
(113, 63, 9, 1, 26990000, 0),
(114, 64, 12, 1, 9290000, 0),
(115, 65, 2, 1, 2290000, 0),
(116, 66, 2, 2, 2290000, 0),
(117, 67, 1, 2, 8580000, 0),
(118, 68, 2, 1, 2290000, 0),
(119, 69, 1, 4, 17160000, 0),
(120, 70, 4, 3, 1077000, 0),
(121, 71, 2, 3, 6870000, 0),
(122, 71, 5, 2, 46806000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietloaisanpham`
--

CREATE TABLE `chitietloaisanpham` (
  `id_ChiTietLoai` int(11) NOT NULL,
  `TenChiTietLoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_LoaiSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietloaisanpham`
--

INSERT INTO `chitietloaisanpham` (`id_ChiTietLoai`, `TenChiTietLoai`, `id_LoaiSanPham`) VALUES
(1, 'Điện thoại di động', 1),
(2, 'Máy tính bảng', 2),
(3, 'Tai nghe', 3),
(4, 'Loa di động', 3),
(5, 'Loa thông minh', 3),
(6, 'Laptop cơ bản', 4),
(7, 'Laptop chơi game', 4),
(8, 'Macbook', 4),
(9, 'Máy tính chơi game', 5),
(10, 'Máy tính nguyên bộ', 5),
(11, 'Màn hình', 5),
(12, 'Ốp lưng & bao da điện thoại', 6),
(13, 'Sim & Thẻ cào', 6),
(14, 'Sạc dự phòng', 6),
(15, 'Cáp & Dock sạc', 6),
(16, 'Chuột', 7),
(17, 'Mainboard - Bo Mạch Chủ', 7),
(18, 'Miến lót chuột', 7),
(19, 'Dây cáp & Adaptor', 7),
(20, 'Bộ phát sóng Wifi', 8),
(21, 'Bộ Khuếch đại Wifi', 8),
(22, 'Router', 8),
(23, 'Bộ thu sóng Wifi', 8),
(24, 'Modems', 8),
(29, 'Quần nam', 10),
(30, 'Túi xách nam', 10),
(31, 'Đồng hồ nữ', 11),
(32, 'Đồng hồ nam', 11),
(33, 'Kính mát', 11),
(34, 'Kính áp tròng', 11),
(35, 'Trang sức nữ', 11),
(36, 'Trang sức nam', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id_DanhGia` int(11) NOT NULL,
  `DanhGiaSanPham` int(11) NOT NULL,
  `NoiDungSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DanhGiaShop` int(11) NOT NULL,
  `NoiDungShop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ThoiGianDanhGia` datetime NOT NULL,
  `id_SanPham` int(11) NOT NULL,
  `id_DonHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`id_DanhGia`, `DanhGiaSanPham`, `NoiDungSanPham`, `DanhGiaShop`, `NoiDungShop`, `ThoiGianDanhGia`, `id_SanPham`, `id_DonHang`) VALUES
(1, 5, 'Sản phẩm tốt', 5, 'tốt', '2019-04-23 15:04:31', 1, 8),
(2, 5, 'Giao hàng nhanh', 5, 'tốt', '2019-04-23 19:48:07', 17, 22),
(3, 5, 'DC đấy', 5, 'ok', '2019-04-23 19:48:24', 17, 8),
(4, 4, 'Sản phẩm tốt', 5, 'ok', '2019-04-23 19:50:11', 17, 13),
(5, 5, 'Sản phẩm cùi bắp', 5, 'Shop làm ăn ẩu tả, gian dối', '2019-05-11 13:34:56', 17, 24),
(6, 4, '', 3, '', '2019-05-12 09:53:11', 5, 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `id_User` int(11) NOT NULL,
  `DiaChiGiaoHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `TenKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `id_Shop` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NumKey` int(11) NOT NULL,
  `date_Created` datetime NOT NULL,
  `LyDoHuy` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `id_User`, `DiaChiGiaoHang`, `SDT`, `TenKH`, `Status`, `SoLuong`, `TongTien`, `id_Shop`, `NumKey`, `date_Created`, `LyDoHuy`) VALUES
(9, 53, 'CT', '0817233044', 'Liên Nhựt Khang', 'Đã Hủy', 1, 2290000, '38', 1269626696, '2019-04-20 00:00:00', 'không mua'),
(10, 53, 'CT', '0817233044', 'Liên Nhựt Khang', 'Đã Xác Nhận', 2, 10112000, '1', 1373490375, '2019-04-20 00:00:00', ''),
(11, 51, 'ct', '0343606417', 'huutrong', 'Đã Giao Hàng', 1, 450000, '1', 1357904800, '2019-04-20 00:00:00', ''),
(12, 51, 'ct', '0343606417', 'huutrong', 'Chưa Xác Nhận', 1, 2290000, '38', 1909687918, '2019-04-20 00:00:00', ''),
(13, 52, 'CT', '0817233044', 'Huỳnh Hữu Trọng', 'Đã Giao Hàng', 1, 450000, '1', 620773339, '2019-04-20 00:00:00', ''),
(14, 51, 'bjb ', '0817233044', 'huutrong', 'Chưa Xác Nhận', 1, 2290000, '38', 275462462, '2019-04-20 00:00:00', ''),
(15, 51, 'ct', '0817233044', 'huutrong', 'Chưa Xác Nhận', 2, 6580000, '38', 1051504360, '2019-04-20 00:00:00', ''),
(16, 51, 'ct', '0817233044', 'huutrong', 'Đã Xác Nhận', 1, 9990000, '1', 950360063, '2019-04-20 00:00:00', ''),
(17, 51, 'hb', '0817233044', 'huutrong', 'Chưa Xác Nhận', 1, 2290000, '38', 105797311, '2019-04-20 16:40:46', ''),
(22, 51, 'CT', '0817233044', 'huutrong', 'Đã Giao Hàng', 1, 450000, '1', 753511198, '2019-04-23 19:44:42', ''),
(23, 42, 'Cần Thơ', '0817233044', 'Khang Nhựt Liên', 'Đã Hủy', 3, 70209000, '38', 1212004977, '2019-05-11 08:26:08', 'Không mua thì hủy'),
(24, 42, 'Cần Thơ', '0817233044', 'Khang Nhựt Liên', 'Đã Giao Hàng', 1, 450000, '1', 1591519483, '2019-05-11 13:24:32', ''),
(25, 42, 'CT', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 4, 54862000, '38', 1823677240, '2019-05-12 09:34:44', ''),
(26, 42, 'CT', '0817233044', 'Khang Nhựt Liên', 'Đã Hủy', 1, 270000, '1', 906312720, '2019-05-12 04:50:55', 'fssdg'),
(27, 42, 'CT', '0817233044', 'Khang Nhựt Liên', 'Đã Giao Hàng', 1, 23403000, '38', 1984960407, '2019-05-12 09:44:31', ''),
(28, 42, 'ct', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 2, 6580000, '38', 1945218337, '2019-05-13 14:20:59', ''),
(29, 42, 'ưd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 2290000, '38', 1619045663, '2019-05-13 14:22:00', ''),
(30, 42, 'ct', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 2, 23582000, '38', 369238339, '2019-05-13 14:24:24', ''),
(31, 42, 'ct', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 359000, '1', 1187446674, '2019-05-13 14:25:18', ''),
(32, 42, 'ct', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 2, 25693000, '38', 1207001679, '2019-05-13 14:25:18', ''),
(33, 42, 'ưa', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 2290000, '38', 86461286, '2019-05-13 14:26:56', ''),
(34, 42, 'ưa', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 122000, '1', 1655755724, '2019-05-13 14:26:56', ''),
(35, 42, 'ưd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 2, 27693000, '38', 454315867, '2019-05-13 14:27:37', ''),
(36, 42, 'xds', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 122000, '1', 595616924, '2019-05-13 14:28:52', ''),
(37, 42, 'xds', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 2, 31280000, '38', 403127845, '2019-05-13 14:28:52', ''),
(38, 42, 'ct', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 4290000, '38', 844581423, '2019-05-13 14:40:01', ''),
(39, 42, 'ct', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 14200000, '1', 502780513, '2019-05-13 14:40:01', ''),
(40, 42, 'ưdx', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 23403000, '38', 2125843765, '2019-05-13 14:42:53', ''),
(41, 42, 'ưd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 2, 2469000, '38', 634731363, '2019-05-13 14:44:20', ''),
(42, 42, 'qsq', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 3, 14681000, '1', 556542115, '2019-05-13 14:45:26', ''),
(43, 42, 'd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 4290000, '38', 497154134, '2019-05-13 14:45:43', ''),
(44, 42, 'ưqd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 2290000, '38', 884727881, '2019-05-13 14:45:59', ''),
(45, 42, 'ưqd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 9990000, '1', 1844888774, '2019-05-13 14:45:59', ''),
(46, 42, 'ưs', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 23403000, '38', 245340292, '2019-05-13 14:46:16', ''),
(47, 42, 'ưs', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 122000, '1', 584732559, '2019-05-13 14:46:16', ''),
(48, 42, 'x', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 4290000, '38', 2043092661, '2019-05-13 14:46:52', ''),
(49, 42, 'x', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 359000, '1', 1757543977, '2019-05-13 14:46:52', ''),
(50, 42, '32ed', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 2, 10349000, '1', 1420156158, '2019-05-13 14:47:07', ''),
(51, 42, 'ưd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 2, 10112000, '1', 635833829, '2019-05-15 10:39:17', ''),
(52, 42, 'ưd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 4290000, '38', 756615727, '2019-05-15 10:39:17', ''),
(53, 42, 'dxw', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 3, 29983000, '38', 968836448, '2019-05-15 10:40:04', ''),
(54, 42, 'qd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 2, 6580000, '38', 2047378188, '2019-05-15 10:40:24', ''),
(55, 42, 'qd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 359000, '1', 2111840370, '2019-05-15 10:40:24', ''),
(56, 42, 'sa', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 3, 6759000, '38', 1315641188, '2019-05-15 10:41:10', ''),
(57, 42, 'sa', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 14200000, '1', 1299913229, '2019-05-15 10:41:10', ''),
(58, 42, 'qưd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 4, 56973000, '38', 900653161, '2019-05-17 09:36:06', ''),
(59, 42, 'w', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 3, 29983000, '38', 851912440, '2019-05-17 09:36:39', ''),
(60, 42, 'w', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 2, 10349000, '1', 103534040, '2019-05-17 09:36:39', ''),
(61, 42, '3r', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 4, 30162000, '38', 1985981870, '2019-05-17 09:37:40', ''),
(62, 42, 'qd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 3, 22410000, '1', 280395737, '2019-05-17 09:38:06', ''),
(63, 42, '', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 2, 27169000, '38', 1015729255, '2019-05-17 09:38:59', ''),
(64, 42, '', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 9290000, '1', 107358325, '2019-05-17 09:38:59', ''),
(65, 42, 'è', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 2290000, '38', 115714797, '2019-05-19 10:52:24', ''),
(66, 42, 'd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 2290000, '38', 1719594555, '2019-05-19 11:03:39', ''),
(67, 42, 'fe', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 4290000, '38', 852157757, '2019-05-19 11:06:16', ''),
(68, 42, 'ewrfd', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 1, 2290000, '38', 1769900236, '2019-05-19 11:09:48', ''),
(69, 42, 'rgf', '0817233044', 'Khang Nhựt Liên', 'Đã Hủy', 4, 17160000, '38', 1422681237, '2019-05-19 07:13:24', 'jkyj'),
(70, 42, 'e', '0817233044', 'Khang Nhựt Liên', 'Chưa Xác Nhận', 3, 1077000, '1', 1713537273, '2019-05-20 14:54:23', ''),
(71, 55, 'thrt', '0817233044', 'Liên Nhựt Khang', 'Đã Xác Nhận', 5, 53676000, '38', 1733023743, '2019-05-20 14:56:06', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu`
--

CREATE TABLE `lichsu` (
  `id` int(11) NOT NULL,
  `id_Item` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsu`
--

INSERT INTO `lichsu` (`id`, `id_Item`) VALUES
(13, '16,14,6'),
(14, '1'),
(15, '1,2'),
(16, '6,16'),
(17, '1,14'),
(18, '2,14'),
(19, '29'),
(20, '16,1,2'),
(21, '1,1,6'),
(22, '1,1,14'),
(23, '1,1,6,16'),
(24, '1,6,1,6'),
(25, '1,1,2,14,6'),
(26, '16,6,1,1'),
(27, '2,13,3'),
(28, '16,6,1'),
(29, '16,14,7,6'),
(30, '6,1,7,2'),
(31, '1,2,6'),
(32, '1,6,2,7'),
(33, '1'),
(34, '1'),
(35, '1'),
(36, '1'),
(37, '1'),
(38, '14'),
(39, '1,6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id_LoaiSanPham` int(11) NOT NULL,
  `TenLoaiSanPham` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id_LoaiSanPham`, `TenLoaiSanPham`, `id_menu`) VALUES
(1, 'Điện thoại di động', 1),
(2, 'Máy tính bảng', 1),
(3, 'Thiết bị âm thanh', 1),
(4, 'Laptop', 1),
(5, 'Máy tính để bàn', 1),
(6, 'Phụ kiện di động', 2),
(7, 'Phụ kiện máy tính', 2),
(8, 'Thiết bị mạng', 2),
(9, 'Thời trang nữ', 3),
(10, 'Thời trang nam', 3),
(11, 'Phụ kiện thời trang', 3),
(12, 'Trang điểm', 4),
(13, 'Chăm sóc da', 4),
(14, 'Chăm sóc tóc', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luatkethop`
--

CREATE TABLE `luatkethop` (
  `id` int(11) NOT NULL,
  `id_Sp` int(11) NOT NULL,
  `Array_LKH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `luatkethop`
--

INSERT INTO `luatkethop` (`id`, `id_Sp`, `Array_LKH`, `Count`) VALUES
(18, 16, '6', 100),
(19, 14, '16', 100),
(20, 6, '14', 100),
(21, 1, '16', 100),
(22, 2, '6', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_SanPham` int(11) NOT NULL,
  `TenSanPham` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ChiTietSanPham` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(11) NOT NULL,
  `Kho` int(11) NOT NULL,
  `id_ChiTietLoai` int(11) NOT NULL,
  `id_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_SanPham`, `TenSanPham`, `Hinh`, `Hinh1`, `Hinh2`, `ChiTietSanPham`, `MoTa`, `Gia`, `Kho`, `id_ChiTietLoai`, `id_User`) VALUES
(1, 'Điện thoại Samsung Galaxy M20 (3GB/32GB)', 'SamsungGalaxyM20(3GB32GB)1.jpg', 'SamsungGalaxyM20(3GB32GB).jpg', 'SamsungGalaxyM20(3GB32GB)2.jpg', 'SamSung:Samsung Galaxy A7 2018:Hơn 128 GB:LTE:Dual:No:5.8:Android 8:6GB:16MP:10MP:Yes:Có:3.0 Type-C:3300:Xanh:24 Tháng', 'Mới mua còn bao hành đến 18.1.2021. 2 năm nữa. Cần tiền tiêu tết bán gấp sam sung a7 2018 ram 6gb, bộ nhớ 128gb. Bán gấp tiêu tết', 4290000, 50, 1, 38),
(2, 'Điện thoại OPPO F9', 'OPPOF9.jpg', 'OPPOF9.jpg', 'OPPOF9.jpg', 'OPPO:OPPO F9:64 GB:Hỗ trợ 4G:2 Nano SIM:No:6.3\":ColorOS 5.2 (Android 8.1):4 GB:16 MP:25 MP:Yes:Có:3.0:3500:Xanh:11.5 Tháng:5:HCM', 'Đặc điểm nổi bật của OPPO F9\r\nTìm hiểu thêm\r\nTìm hiểu thêm\r\nTìm hiểu thêm\r\nBộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, Cáp, Cây lấy sim, Ốp lưng\r\n\r\nLà chiếc điện thoại OPPO mới nhất sở hữu công nghệ sạc VOOC đột phá, OPPO F9 còn được ưu ái nhiều tính năng nổi trội như thiết kế mặt lưng chuyển màu độc đáo, màn hình tràn viền giọt nước và camera chụp chân dung tích hợp trí tuệ nhân tạo A.I hoàn hảo.\r\nSạc VOOC nhanh đột phá\r\nTrong những giây phút gay cấn như chơi game điện thoại báo hết pin hay sáng dậy đi làm nhưng phát hiện quên sạc pin thì bộ sạc của OPPO F9 sẽ đem lại sự cứu trợ ngay lập tức.\r\n\r\nVới sạc VOOC 5V/AA, tốc độ sạc trở nên nhanh chóng so với các bộ sạc thông thường.', 2290000, 0, 1, 38),
(3, 'Apple iPad 2018 Wi-Fi 128GB', '7603956.jpg', '2238960.jpg', '56626948.jpg', 'Apple:Apple iPhone 6s Plus:128GB:LTE:Single:Yes:5.5:IOS:16MB:19MP:3.2MP:Yes:Có:3.1 Type-C:5000:Hồng:6 Tháng', 'Màn hình Retina 9.7inch\r\nBộ vi xử lí A10 cho hiệu năng hoạt động mạnh mẽ\r\nROM 128GB\r\nCamera 8 MP, FaceTime với độ phân giải HD\r\nTouch ID\r\nHỗ trợ bút Apple Pencil', 9990000, 50, 2, 1),
(4, 'Pin sạc dự phòng Samsung EB-P1100 10.000mAh Micro-USB', 'Samsung-B-P1100-10.000mAh-Micro-USB.jpg', 'Samsung-B-P1100-10.000mAh-Micro-USB.jpg', 'Samsung-B-P1100-10.000mAh-Micro-USB.jpg', 'SamSung:Nhiều dòng máy:Cao su:Sạc dự phòng:10 Tháng', 'Dung lượng Pin: 10,000 mAh\r\nMàu sắc: bạc\r\nNguồn điện đầu vào: 5V-2A (sạc thường) 9V-1.67A (sạc nhanh)\r\nNguồn điện đầu ra:5V-2A (sạc thường) 9V-1.67A (sạc nhanh)\r\nPhụ kiện trong hộp: Pin, Cáp sạc, Hướng dẫn sử dụng\r\nĐộ mỏng 14mm', 359000, 10, 14, 1),
(5, 'Laptop Xiaomi Mi Notebook Pro 15.6inch i5 8G', 'Laptop-Xiaomi-Mi Notebook-Pro-15.6inch-i5-8G.jpg', 'Laptop-Xiaomi-Mi Notebook-Pro-15.6inch-i5-8G.jpg', 'Laptop-Xiaomi-Mi Notebook-Pro-15.6inch-i5-8G.jpg', 'XIAOMI:6 tháng:5:Quận Đống Đa, Hà Nội', 'Chuẩn wifi 802.11ac nhanh gấp 6 lần\r\nCông nghệ sạc Quick Charge 3.0 chỉ cần 30 phút sạc được 50% pin.\r\nCard đồ họa NVIDIA GeForce MX150 cùng bộ nhớ 2GB\r\nLoa Harman Infinity cho trải nghiệm âm thanh Cinema với âm thanh tần số thấp sâu hơn.\r\nMàn hình 15.6 inch cùng độ phân giải Full HD.\r\nThương hiệu Xiaomi uy tín và thời thượng.', 23403000, 0, 6, 38),
(6, 'Laptop Dell Inspiron 7559: I5 6300H RAM 8GB HDD 1TB NVIDIA GTX960M 15.6 inch FullHD', 'Laptop-Dell-Inspiron-7559.jpg', 'Laptop-Dell-Inspiron-7559.jpg', 'Laptop-Dell-Inspiron-7559.jpg', 'DELL:12 Tháng', 'CPU: Intel® Skylake Core™ i5 6300HQ (2.3GHz, 6M Cache, up to 3.20GHz)\r\nRAM: 8GB 1600MHz DDR3L (có thể nâng cấp thêm)\r\nHDD: 1TB 5400RPM SATA (có thể nâng cấp thêm)\r\nVGA: Integrated Intel® HD Graphics 530 + NVIDIA® GeForce® GTX 960M 4GB GDDR5\r\nLCD: 15.6 inch FHD (1920 x 1080) Anti-Glare LED Backlit Display\r\nÂm thanh: Waves MaxxAudio® Pro\r\nĐọc thẻ nhớ 8 in 1, HDMI, Wifi , Bluetooth 4.0, USB 3.0.\r\nTrọng lượng: 2.57 kg\r\nHệ điều hành tương thích: Windows\r\nMàu sắc: Đen, Đỏ', 14200000, 50, 6, 1),
(7, 'Chuột quang không dây Rapoo 3100P', 'Rapoo-3100P.jpg', 'Rapoo-3100P.jpg', 'Rapoo-3100P.jpg', 'No brand:6 Thang:5:Quận Tân Bình, TP. Hồ Chí Minh', 'Chuột quang (ẩn) không dây, sóng 5Ghz đầu tiên trên thế giới kết nổi ổn định và tiết kiệm pin hơn. Phạm vi họat động 10m - Độ phân giải 1000dpi.\r\nThiết kế các rãnh cao su bên hông chuột cảm giác thoải mái khi điều khiển\r\nTuổi thọ pin 18 tháng\r\n3 Màu: Xanh, Đen, Trắng', 179000, 10, 16, 38),
(8, 'Chuột Game thủ PANGYINGO Y09 phiên bản 2018 có đèn LED đổi màu cực đẹp', 'PANGYINGO-Y09.jpg', 'PANGYINGO-Y09.jpg', 'PANGYINGO-Y09.jpg', 'No brand:6 Thang:5:Quận Tân Bình, TP. Hồ Chí Minh', 'Thiết kế cực độc lạ, thanh lịch, tiện dụng, hoàn hảo và phù hợp với cả laptop hay PC\r\nDễ cài Đặt, dễ sử dụng.\r\nTương thích với nhiều dòng máy tính, laptop\r\nNhựa an toàn ABS và thép không gỉ\r\nLED nhiều màu\r\nĐộ phân giải quang học 3200 (dpi)\r\nGiao diện kết nối: cổng USB', 122000, 10, 16, 1),
(9, 'Laptop Asus UX430UN-GV096T', 'UX430UN-GV096T.jpg', 'UX430UN-GV096T.jpg', 'UX430UN-GV096T.jpg', 'ASUS:12 tháng:5:Quận Đống Đa, Hà Nội', 'Chất liệu cao cấp\r\nĐộ bền cao\r\nAn toàn khi sử dụng', 26990000, 10, 6, 38),
(10, 'Loa Bluetooth P88 P89 NT88 Âm thanh cực chuẩn tặng kèm Micro hát Karaoke', 'Bluetooth-P88-P89-NT88.jpg', 'Bluetooth-P88-P89-NT881.jpg', 'Bluetooth-P88-P89-NT882.jpg', 'BT:3 tháng:3: Hồ Chí Minh', 'Hỗ trợ nghe nhạc qua kết nối không dây với các thiết bị.\r\nTích hợp thêm 2 cổng nghe nhạc từ USB và thẻ nhớ.\r\nP-88 còn có thêm cổng cắm mic có dây: chúng ta có thể dùng chức năng này cho việc đáp ứng các nhu cầu: đào tạo, bán hàng, quảng bá, hướng dẫn, ca hát giải trí ....', 264000, 10, 3, 1),
(11, 'Điện thoại iphonex 64gb', 'iphonex-64gb.jpg', 'iphonex-64gb.jpg', '12018776.jpg', 'Apple:Apple iPhone X:64GB:LTE:Single:Yes:6:IOS:3GB:12MP:7MP:Yes:Có:3.1 Type-C:2750:Nhiều màu:6 Tháng', 'Màn hình:LTPS LCD, 5.8\", Full HD+\r\nHệ điều hành:ColorOS 5.2 (Android 8.0)\r\nCamera sau:16 MP và 2 MP (2 camera)\r\nCamera trước:25 MP\r\nCPU:MediaTek Helio P60 8 nhân 64-bit\r\nRAM:3GB\r\nBộ nhớ trong: 128 GB', 2800000, 10, 1, 1),
(12, 'Apple iPhone 6s Plus 32GB', 'iPhone-6s-Plus-32GB.jpg', 'iPhone-6s-Plus-32GB.jpg', 'iPhone-6s-Plus-32GB.jpg', ' Apple:Apple iPhone 6s Plus:32GB:LTE:Single:Yes:18.4:IOS:16MB:19MP:3.2MP:Yes:Có:3.1 Type-C:5000:Hồng:6 Tháng:2:Quận Hà Đông, Hà Nội', 'Hàng chính hãng, mã hàng VN/A\r\nMàn hình: 5.5\", Retina HD\r\nHệ điều hành: iOS 11\r\nRAM: 2 GB, ROM: 32 GB\r\nCamera: 12 MP, Selfie: 5 MP\r\nPIN: 2750 mAh', 9290000, 0, 1, 1),
(13, 'Laptop Dell Inspiron 3576 i5 8250U/4GB/1TB/Win10/(P63F002N76F)', 'Laptop-Dell-Inspiron-3576-i5-8250U.png', 'Laptop-Dell-Inspiron-3576-i5-8250U.png', 'Laptop-Dell-Inspiron-3576-i5-8250U.png', 'Dell:6 tháng:5:Quận Đống Đa, Hà Nội\r\n', 'Bộ xử lý\r\nCông nghệ CPU	Intel Core i5 Kabylake Refresh\r\nLoại CPU	8250U\r\nTốc độ CPU	1.60 GHz\r\nTốc độ tối đa	Turbo Boost 3.4 GHz\r\nTốc độ Bus	2400 MHz\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM	4 GB\r\nLoại RAM	DDR4 (2 khe)\r\nTốc độ Bus RAM	2400 MHz\r\nHỗ trợ RAM tối đa	16 GB\r\nỔ cứng	HDD: 1 TB\r\nMàn hình\r\nKích thước màn hình	15.6 inch\r\nĐộ phân giải	Full HD (1920 x 1080)\r\nCông nghệ màn hình	TrueLife LED-Backlit Display\r\nMàn hình cảm ứng	Không\r\nĐồ họa và Âm thanh\r\nThiết kế card	Card đồ họa tích hợp\r\nCard đồ họa	Intel® UHD Graphics 620\r\nCông nghệ âm thanh	Waves MaxxAudio, Combo Microphone & Headphone, Loa kép (2 kênh)\r\nCổng kết nối & tính năng mở rộng\r\nCổng giao tiếp	HDMI 1.4, 2 x USB 3.0, LAN (RJ45), USB 2.0\r\nKết nối không dây	Bluetooth 4.1, Wi-Fi 802.11 a/b/g/n/ac\r\nKhe đọc thẻ nhớ	SD\r\nỔ đĩa quang	Có (đọc, ghi dữ liệu)\r\nWebcam	HD webcam\r\nĐèn bàn phím	Không\r\nTính năng khác	Multi TouchPad\r\nPIN\r\nLoại PIN	PIN rời\r\nThông tin Pin	Li-Ion 4 cell\r\nHệ điều hành\r\nHệ điều hành	Windows 10 Home SL\r\nKích thước & trọng lượng\r\nKích thước	Dài 380 mm - Rộng 260.3 mm - Dày 23.65 mm\r\nTrọng lượng	2.3 Kg\r\nChất liệu	Vỏ nhựa', 14690000, 0, 6, 1),
(14, 'Tai Nghe Gaming Corsair HS50 Stereo - Carbon CA-9011170-AP', 'GamingCorsairHS50Stereo.jpg', 'GamingCorsairHS50Stereo1.jpg', 'GamingCorsairHS50Stereo2.jpg', 'No brand:24 tháng:5:Quận Đống Đa, Hà Nội', '* Thông tin sản phẩm:\r\n- Tên sản phẩm: Tai nghe Corsair HS50 Stereo - Carbon\r\n- Thương hiệu: USA\r\n- Sản xuất: China\r\n- Sản phẩm được phân phối bởi KTC (Công ty TNHH Khải Thiên)\r\n- Bảo hành: 24 tháng\r\n\r\n* Thông số kỹ thuật:\r\n- Loại Tai nghe: HS50\r\n- Màu: Carbon\r\n- Dải tần số: \r\n+ Headphone: 20 – 20.000 Hz\r\n+ Microphone: 100 – 100.000 Hz\r\n- Trở kháng:\r\n+ Headphone: 32k Ohms @ 1 kHz\r\n+ Microphone: 2.0k Ohms\r\n- Drivers:	50mm\r\n- Jack cắm	3.5mm\r\n- Độ nhạy ( Microphone ): -40dB (+/-3dB)', 1450000, 0, 3, 38),
(15, 'Tai Nghe Nhét Tai Earphone Langsdom JM26 Super Bass (Đen)', 'EarphoneLangsdomJM26SuperBass.jpg', 'EarphoneLangsdomJM26SuperBass1.jpg', 'EarphoneLangsdomJM26SuperBass2.jpg', 'No Brand:10 Tháng', 'Chú ý: Đang khuyến mại, đơn hàng tối thiểu 20k mới đặt được hàng trên shopee, quý khách ghép đơn với các sản phẩn khách để có thể mua hàng khuyến mại được\r\n\r\nNên các bạn thêm các sản phẩm khác của shop để đặt được hàng nhé.\r\nI. Giới thiệu sản phẩm\r\n\r\nTai nghe Langsdom JM26 phiên bản mới ra mắt thị trường vào cuối năm 2017 và hiện tại đang nắm giữ vị trí tai nghe bán chạy nhất trong dòng tai nghe nhét tai trên thị trường châu Á. Chiếc tai nghe này được đánh giá sẽ trở thành trào lưu mới trong năm 2018 này.\r\n\r\nMặc dù là chiếc tai nghe tập trung dành cho các loại nhạc nhiều Bass như Hiphop, EDM,... nhưng Langsdom JM26 vẫn khắc họa được âm Mid và Treble ở một cách trung thực, rõ ràng và chi tiết.\r\n\r\nChiếc tai nghe tích hợp microphone, nút điều khiển bài hát Play/Pause và nhận cuộc gọi:', 55000, 0, 3, 1),
(16, 'Điện Thoại Samsung Galaxy Note 9 (512GB - Xanh Dương) - Hãng Phân Phối Chính Thức', '45681142.jpg', '4189120.jpg', '19874482.jpg', 'SamSung:Acer Iconica W3-810:64GB:GSM:Dual:Yes:5.5:Android 4.0.4:4GB:16MP:10MP:Yes:Yes:3.0 Type-C:4000:Bạc:12 Tháng', 'Chụp ảnh nâng cao	Zoom quang học (Camera kép), Chụp ảnh xóa phông, Chế độ Slow Motion, A.I Camera, Điều chỉnh khẩu độ, Super Slow motion (quay siêu chậm), Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS), Beautify, Chế độ chụp chuyên nghiệp\r\n', 21690000, 50, 2, 1),
(17, 'Tai Nghe Chuyên Game Each G2000', '71292838.jpg', '5462322.jpg', '9232796.jpg', ':10 Tháng', '- Tai nghe chuyên game Each G2000 sử dụng màng loa 50mm, mang lại cho bạn âm thanh sống động, âm thanh rõ nét, cảm giác thực trong các trò chơi khác nhau. \r\n- Tai nghe che kín tai giảm tiếng ồn tối đa. Phần đệm tai sử dụng chất liệu da thân thiện với da và siêu mềm giúp thoải mái hơn trong thời gian dài. \r\n- Đèn LED được thiết kế trên đệm tai và microphone, làm nổi bật không khí của trò chơi. \r\n- Dây tai nghe được bọc tăng độ bền.\r\n- Trên dây có trang bị một bộ điều khiển âm lượng quay, tắt mở Mic, thuận tiện hơn để sử dụng.', 450000, 34, 3, 1),
(20, 'Ốp Lưng Huawei P20 Pro Vân Da Siêu Bền Siêu Chống Sốc', '96454125.jpg', '81607369.jpg', '51757262.jpg', 'Huawei Nova 3e:Tất cả dòng máy:Da:Chống sốc:1 Tháng', 'Ốp lưng Huawei p20 pro vân da baseus cực đẹp\r\n_ Sang trọng lịch lãm đẳng cấp phái mạnh\r\n_ Dạy dặn chống va đập tuyệt vời, bao bọc toàn bộ viền và lưng máy\r\n_ Vân da chống trơn trượt, chống trày xước, không bám vân tay\r\n_ Lưng có các khe rãnh chống nóng, giúp thoát nhiệt\r\n_ Thiết kế tinh xảo không bavia lồi lõm, Phong cách mới\r\n_ Siêu bền bỉ, dùng vài năm không hỏng\r\n_ Không bị ố vàng ngả màu cháo lòng không dão ốp cực chặt', 80000, 5, 12, 1),
(21, 'Sim 4G Viettel D500 D900 Trọn Gói 1 Năm Không Nạp Tiền', '29045298.jpg', '72458456.jpg', '57243797.jpg', 'Viettel:Không Bảo Hành', 'CTY TNHH CHUẨN STORE LÀ ĐẠI LÝ CẤP 1 VIETTEL, MOBI, VINA, VNMB. TẤT CẢ SẢN PHẨM BÁN RA LÀ CHÍNH HÃNG VÀ BẢO HÀNH 1 NĂM ĐÚNG CAM KẾT.\r\nSim đã tuân thủ các quy định pháp luật hiện hành về đăng ký thông tin thuê bao.\r\n-----------------------------\r\nQUÝ KHÁCH CHÚ Ý: SP CÓ 2 LOẠI HÀNG\r\nD500 ( 4GB X 12 THÁNG)\r\nD900 ( 7GB X 12 THÁNG)\r\n---------------------------------\r\nLà tập đoàn viễn thông lớn nhất Việt Nam, SIM 4G Viettel luôn là sự lựa chọn hàng đầu về chất lượng ổn định của sóng. Nếu bạn là người dùng internet ở mức độ bình thường, yêu cầu sự ổn định, đặc biệt là hay di chuyển, du lịch đến những nơi vùng sâu vùng xa, thì SIM 4G VIETTEL D500 và D700 trọn gói 1 năm không nạp tiền chắc chắn sẽ là sản phẩm đồng hành cùng bạn trong mỗi chuyến đi. \r\nThông tin chi tiết Sim 4G Viettel trọn gói 1 năm như sau: \r\n- Sim mới 100%, có sẵn 4GB - 7GB DATA tốc độ cao. \r\n- Dùng hết tốc độ cao hệ thống chuyển xuống tốc độ 128kb/s và không gới hạn. \r\n- Dung lượng tương ứng 48GB~84GBnăm ( Tặng 4GB~7GB tháng x 12 tháng liên tục)\r\n - KHÔNG CẦN NẠP TIỀN, không mất thêm phí duy trì hàng tháng\r\n - Sim 11 số KHÔNG Nghe – Gọi – SMS được\r\n - Sim 3 trong 1 ( MICRO, NANO) phù hợp với mọi thiết bị sử dụng \r\n- Có thể sử dụng cho Điện thoại, bộ phát wifi, USB, máy tính bảng, camera an nin', 270000, 50, 13, 1),
(22, 'Bộ Phát Wifi Tenda AC7 5 Râu Xuyên Tường Siêu Mạnh - Nâng Cấp Của Tenda AC6', '18848937.jpg', '3519578.jpg', '48707754.jpg', 'Tenda:5 Tháng', 'Tenda AC7 là sản phẩm Router Wifi vừa được hãng Tenda ra mắt hướng tới hộ gia đình và doanh nghiệp nhỏ với tốc độ cao hỗ trợ 2 băng tần 2.4Ghz/5Ghz chuẩn 802.11b/g/n/ac Wave 2 1167Mbps và khả năng phát sóng mạnh mẽ với 5 anten 6dBi. \r\nTenda AC7 sử dụng chipset Broadcom của Mỹ nên cho khả năng hoạt động bền bỉ, ổn định. Với sức chịu tải tối đa 32 user trên cả 2 băng tần. Hỗ trợ bảo mật WPA-PSK/WPA2-PSK, WPA/WPA2, Mac Filter, Hẹn giờ tắt mở wifi', 525000, 50, 20, 1),
(23, 'Laptop Doanh Nhân Cao Cấp HP Elitebook 8470P Chíp Core i5 3320M, Ram 4G, Ổ 250G Mới 99%, Zin 100%', '77378737.jpg', '62294179.jpg', '11426368.jpg', 'HP:12 Tháng', 'Laptop HP Elitebook 8470P trong hình, mình chụp tại nhà. Máy còn mới 99%, đặc biệt, Zin 100%. \r\n????Các bạn lưu ý: Trọng Đức không cộng thêm tiền máy đẹp. Máy được tuyển chọn rất kỹ qua nhiều khâu kiểm định 10 máy đẹp cả 10.\r\n????Dòng máy HP Elitebook là dòng máy doanh nhân cao cấp, khung và vỏ máy bằng hợp kim rất chắc chắn, giúp chống va đập và tản nhiệt tốt hơn, tăng thêm độ bền và ổn định vượt trội - đạt tiêu chuẩn kiểm nghiệm quân sự USA. \r\n????Cấu hình của máy: \r\n- Chip i5: Intel(R) Core i5 thế hệ mới 3320M.\r\n- Ram DDR3: 4Gb ( Up tối đa 16Gb).\r\n- Ổ cứng HDD: 250Gb chuẩn SATA.\r\n- Cạc màn hình: Intel HD 4000. \r\n- Với cấu hình mạnh của máy đáp ứng được mọi công việc, học tập, văn phòng Word, Excell, thiết kế đồ hoạ 3D và các loại Game: LOL,..rất mượt.\r\n- Pin: hơn 2, 3h.\r\n- Camera đầy đủ: Siêu nét.\r\n- Wifi: Chuẩn N vượt trội bắt xa, mạnh và ổn định hơn.\r\n- Màn hình: 14 inh sáng, đẹp.\r\n- Bàn Phím rất nhạy và nhẹ.\r\n- Ổ DVD: Không kén đĩa.\r\n- Các cổng hỗ trợ: VGA, USB, Mạng Lan..\r\n????Các bạn chú ý: Mình đảm bảo máy chính hãng USA????????, các bạn có thể vào trang chủ HP và check Số Seri ( Serial Number). \r\n???? Máy kèm Khuyến Mại: Sạc Zin theo máy + Tặng Cặp Chống sốc cao cấp chính hãng + Chuột quang không dây cao cấp.\r\n???? Trọng Đức bảo hành sản phẩm 1 tháng 1 đổi 1 và bảo hành thỏa thuận đến 2-3 năm tùy theo nhu cầu của các bạn. Máy được cài đặt phần mềm và vệ sinh miễn phí trọng đời, các bạn test và dùng thoải mái nhé.\r\n⏰Trọng Đức mở đến 20h hàng ngày.\r\n☎️ Các bạn xin vui lòng kích chuột vào cửa hàng tham khảo còn nhiều model khác của các thương hiệu nổi tiếng toàn cầu như HP, Dell, Fujitsu hoặc để lại số điện thoại hoặc điện thoại trực tiếp cho shop để được tư vấn nhiệt tình các bạn nhé. Hotline: 0901727233', 48000000, 50, 6, 1),
(24, '[NEW] Laptop Asus VivoBook S15 S510UA i3 7100U/4GB/1TB/Win10/Bảo Hành 12 Tháng', '30903053.jpg', '89065244.jpg', '50713572.jpg', 'Asus:12 Tháng', 'Thông số kỹ thuật chi tiết Laptop Asus VivoBook S15 S510UA i3 7100U \r\nBộ xử lý\r\n•	Công nghệ CPU:Intel Core i3 Kabylake\r\n•	Loại CPU:7100U\r\n•	Tốc độ CPU:2.30 GHz\r\n•	Tốc độ Bus:2133 MHz\r\nBộ nhớ, RAM, Ổ cứng\r\n•	RAM:4 GB\r\n•	Loại RAM:DDR4 (2 khe)\r\n•	Tốc độ Bus RAM:2133 MHz\r\n•	Hỗ trợ RAM tối đa:16 GB\r\n•	Ổ cứng:HDD: 1 TB, Hỗ trợ khe cắm SSD M.2 SATA3\r\nMàn hình\r\n•	Kích thước màn hình:15.6 inch\r\n•	Độ phân giải:Full HD (1920 x 1080)\r\n•	Công nghệ màn hình:Màn hình chống chói, Tấm nền IPS, Viền màn hình mỏng, LED Backlit\r\nĐồ họa và Âm thanh\r\n•	Thiết kế card:Card đồ họa tích hợp\r\n•	Card đồ họa:Intel® HD Graphics 620\r\n•	Công nghệ âm thanh:Combo Microphone & Headphone, SonicMaster audio, Loa kép (2 kênh)\r\nCổng kết nối & tính năng mở rộng\r\n•	Cổng giao tiếp:2 x USB 2.0, HDMI, USB Type-C, USB 3.0\r\n•	Kết nối không dây:Bluetooth 4.1, Wi-Fi 802.11 a/b/g/n/ac\r\n•	Khe đọc thẻ nhớ:SD, SDHC, SDXC\r\n•	Webcam:VGA Webcam\r\n•	Đèn bàn phím:Có\r\n•	Tính năng khác:Bảo mật vân tay, Multi TouchPad\r\nPIN\r\n•	Loại PIN:PIN liền\r\n•	Thông tin Pin:Li-Ion 3 cell\r\nHệ điều hành\r\n•	Hệ điều hành:Windows 10 Home SL\r\nKích thước & trọng lượng\r\n•	Kích thước:Dài 361.4 mm - Rộng 243.5 mm - Dày 17.9 mm\r\n•	Trọng lượng:1.5 kg\r\n•	Chất liệu:Vỏ nhựa - nắp lưng bằng kim loại\r\nBảo Hành\r\n•	Thời gian bảo hành: 12 tháng', 9500000, 24, 6, 1),
(25, 'Laptop Dell E6410 ,E6420,6430 Core i5 Ram 4G ổ cứng SSD 120G Màn 14 + Tặng Sạc , túi ,, chuột không ', '6213941.jpg', '8804363.jpg', '56228383.jpg', 'DELL:12 Tháng', '1>>Dòng laptop Dell 6410 Core i5 520M/ 540M Ram ổ cứng tùy chọn / Màn 14.0\r\n2>>Dòng laptop Dell 6420 Core i5 2520M/ 2540M Ram ổ cứng tùy chọn / Màn 14.0\r\n3>>Dòng laptop Dell 6430 Core i5 3210M/ 3230M/3240 Ram ổ cứng tùy chọn / Màn 14.0\r\nDòng chíp về lô nào shop chuyển theo lô đó cam kết đầu chíp là chuẩn.\r\nBảo hành siêu Tốc 1 đổi 1 Trong 30 ngày nếu máy lỗi phần cứng \r\nLaptop dell bên chúng tôi phân phối chọn loại ổ SSD giúp máy chạy nhanh hơn , máy ít nóng hoạt động bền bỉ mà giá thành lại tốt .\r\n>>>>>>>>> LapTop Hòa Phong\r\nĐiện Thoại tư vấn miễn Phí Gọi hoặc zalo : 0965.993.903\r\nWeb: Laptophoaphong.com\r\nFacebook : https://www.facebook.com/laptophoaphong/\r\nHỗ trợ trả góp từ xa qua thẻ tín dụng ( 23 ngân hàng)\r\nHỗ trợ trả góp trực tiếp tại cửa hàng qua giấy phép lái xe và hộ khẩu\r\nCam kết :\r\n•	Bán đúng sản phẩm chính hãng nhập khẩu Mỹ , châu âu , Nhật\r\n•	Giá sản phẩm luôn tốt nhất\r\n•	Bảo Hành 1 đổi 1 trong 1 tháng  ( gói bảo hành 6 và 12 tháng quý khách liên hệ : 0965.993.903)\r\n•	Sản phẩm đúng cấu hình , hình ảnh của sản phẩm được chụp thật từ cửa hàng chúng tôi\r\n•	sản phẩm cung cấp điện thoại , laptop , linh kiện iphone, linh kiện laptop\r\n•	Laptophoaphong.com chuyên kinh doanh điện thoại iphone cũ,laptop cũ mới chính hãng nhập từ mỹ , châu âu , nhật bản  giá rẻ phù hợp với mọi người mọi lứa tuổi . \r\n Địa Chỉ cơ sở 1 : số 50 ngõ 108B - nguyễn trãi - thượng đình - thanh xuân -hà nội\r\nĐịa chỉ cơ sở 2 : Hồ chí minh', 5490000, 12, 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `traloi`
--

CREATE TABLE `traloi` (
  `id_TraLoi` int(11) NOT NULL,
  `NoiDungTraLoi` text COLLATE utf8_unicode_ci NOT NULL,
  `id_BinhLuan` int(11) NOT NULL,
  `id_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `traloi`
--

INSERT INTO `traloi` (`id_TraLoi`, `NoiDungTraLoi`, `id_BinhLuan`, `id_User`) VALUES
(1, 'Led bật tự động nhé bạn', 1, 1),
(2, '2-3 ngày ạ', 2, 1),
(3, 'uk', 1, 1),
(9, '', 20, 38),
(10, 'êm', 21, 1),
(12, '50 m', 23, 1),
(13, 'tốt', 24, 1),
(14, 'noi8s j z mại', 25, 1),
(15, '', 26, 1),
(16, '', 27, 1),
(17, 'mua hok', 28, 38),
(18, '', 29, 1),
(19, '', 30, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_User` int(11) NOT NULL,
  `HoTen` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` int(1) NOT NULL,
  `NgaySinh` date NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenShop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AnhBia` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `Banner` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `Ma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_User`, `HoTen`, `GioiTinh`, `NgaySinh`, `Email`, `MatKhau`, `SDT`, `DiaChi`, `Avatar`, `TenShop`, `AnhBia`, `Banner`, `Active`, `Ma`) VALUES
(1, 'Huỳnh Hữu Trọng', 1, '1997-01-29', 'huutrong@gmail.com', '4297f44b13955235245b2497399d7a93', '034606417', 'Cần Thơ', '8619495.jpg', 'ZxHeroxZ', '92354488.png', '15723310.jpg', 1, 0),
(36, 'asd', 0, '2019-03-15', 'asd@gmail.com', '4297f44b13955235245b2497399d7a93', '2500321313', 'ffffffffafasfasfa', '', '', '', '', 0, 0),
(37, 'lên văn b', 1, '2019-03-19', 'levana@gmail.com', '4297f44b13955235245b2497399d7a93', '1131', 'không biết có', '', '', '', '', 0, 0),
(38, 'Liên Nhựt Khang', 1, '0000-00-00', 'nhutkhangit@gmail.com', '4297f44b13955235245b2497399d7a93', '0817233044', 'HCM', '7994724.png', 'Khang', '', '38706933.png', 1, 0),
(42, 'Khang Nhựt Liên', 1, '1999-01-01', 'nhutkhangit1@gmail.com', '4297f44b13955235245b2497399d7a93', '0817233044', 'Cần Thơ', '7309458.png', 'Khang d', '42051889.png', '38777481.png', 1, 0),
(43, 'huỳnh hữu trọng', 1, '0000-00-00', 'trong@gmail.com', '4297f44b13955235245b2497399d7a93', '', '255 - Nguyễn Văn Cừ - An Hòa - Cần Thơ', '', 'Gaming', '', '', 0, 0),
(51, 'huutrong', 1, '0000-00-00', 'huynhhuutrong1997@gmail.com', '4297f44b13955235245b2497399d7a93', '0817233044', 'Cần Thơ', '', 'QQ', '', '', 1, 0),
(52, 'Huỳnh Hữu Trọng', 1, '0000-00-00', 'huutrong.bas@gmail.com', '4297f44b13955235245b2497399d7a93', '', '', '', '', '', '', 1, 0),
(53, 'Liên Nhựt Khang', 1, '0000-00-00', 'nhutkhangit12@gmail.com', '4297f44b13955235245b2497399d7a93', '', '', '', '', '', '', 1, 0),
(54, 'Khang Nhựt Liên', 1, '0000-00-00', 'nhutkhangit5@gmail.com', '4297f44b13955235245b2497399d7a93', '', '', '', '', '', '', 0, 1204),
(55, 'Liên Nhựt Khang', 1, '0000-00-00', 'nhutkhangit11@gmail.com', '4297f44b13955235245b2497399d7a93', '', '', '', '', '', '', 1, 8471);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_BinhLuan`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietloaisanpham`
--
ALTER TABLE `chitietloaisanpham`
  ADD PRIMARY KEY (`id_ChiTietLoai`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_DanhGia`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsu`
--
ALTER TABLE `lichsu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id_LoaiSanPham`);

--
-- Chỉ mục cho bảng `luatkethop`
--
ALTER TABLE `luatkethop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_SanPham`),
  ADD KEY `id_LoaiSanPham` (`id_ChiTietLoai`) USING BTREE;

--
-- Chỉ mục cho bảng `traloi`
--
ALTER TABLE `traloi`
  ADD PRIMARY KEY (`id_TraLoi`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_User`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_BinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `chitietloaisanpham`
--
ALTER TABLE `chitietloaisanpham`
  MODIFY `id_ChiTietLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_DanhGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `lichsu`
--
ALTER TABLE `lichsu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_LoaiSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `luatkethop`
--
ALTER TABLE `luatkethop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `traloi`
--
ALTER TABLE `traloi`
  MODIFY `id_TraLoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
