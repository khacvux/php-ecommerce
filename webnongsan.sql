-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2021 lúc 02:59 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webnongsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `IdAccount` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PhoneNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `BirthDay` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AddressAcc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RoleAcc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`IdAccount`, `Email`, `Pass`, `Username`, `PhoneNumber`, `Gender`, `BirthDay`, `AddressAcc`, `Img`, `RoleAcc`) VALUES
(4, 'nhanvien@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Văn B', '0123456789', 1, '2001-01-28', 'Đà Nẵng', 'v0PCWID9AQm7dzeh.jpg', 2),
(8, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Tuấn Lê', '0968604438', 1, '2002-02-28', 'Hưng Xá', 'PrMmj0d8xcOL29Tl.jpg', 1),
(10, 'khach1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn a', NULL, 1, '2002-02-28', NULL, 'ekcyg2luA473ZBxG.jpg', 0),
(11, 'khach2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Hoàng Thủy', NULL, 0, '2002-02-02', NULL, 'CcUuNrJVwW9zgvfK.jpeg', 0),
(12, 'khach3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Văn B', NULL, 1, '2002-01-01', NULL, 'JetpMUCTZ29c3mDI.jpg', 0),
(13, 'khach4@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Văn C', NULL, 0, '2002-02-25', NULL, 'zXEd7Mb5TV8QJygm.jpg', 0),
(14, 'khach5@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Văn D', NULL, 0, '2002-02-25', NULL, 'z90XtCJ2YIGhvWob.jpg', 0),
(16, 'khach6@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, -1, NULL, NULL, NULL, 0),
(17, 'khach7@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, -1, NULL, NULL, NULL, 0),
(18, 'khach8@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, -1, NULL, NULL, NULL, 0),
(19, 'nguyenvana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, -1, NULL, NULL, NULL, 0),
(20, 'nguyenvanb@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Hải Yến', NULL, 0, '2004-06-16', NULL, 'O2cugAB7nYh3o9Sj.jpg', 0),
(21, 'nguyenvanc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Lê Phúc', NULL, 1, '2002-05-15', NULL, 'IVO8PaKvrMWGNi5E.jpg', 0),
(22, 'nguyenvand@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nam Trần', NULL, 1, '2000-04-24', NULL, 'VG1f928xpWuoThgS.jpg', 0),
(23, 'nguyenvane@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Lê Hiếu', NULL, 1, '2000-03-23', NULL, '9ydUWoEqe4DTm5wC.png', 0),
(24, 'nguyenvanf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Văn F', NULL, 1, '2001-02-12', NULL, 'tVQmqEFiPzG4cAy1.jpg', 0),
(25, 'nhanvien2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Khắc Vũ', '0123456789', 1, '2002-01-21', 'Hà Tĩnh', 'Czv07Tu9pRaqgG3E.jpg', 2),
(26, 'khachhang@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Tuấn Lê', NULL, 1, '2002-02-28', NULL, '2DgoCpBXe1FUtdGz.jpg', 0),
(27, 'nhanvien3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(28, 'khachhang15@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Tuấn Lê Anh', NULL, 1, '2002-02-28', NULL, 'pLveImKR9UXjYCiH.jpg', 0),
(29, 'nhanvien4@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, NULL, 2),
(30, 'khachkhua@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Tuấn Tuấn ', NULL, 1, '2002-02-28', NULL, 'fMzYej6i5v4wqJG2.jpg', 0),
(31, 'khachhaha@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Tuấn Haha', NULL, 1, '2002-02-28', NULL, 'MO4S3BGh6giZHJwe.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `IdCategory` int(11) NOT NULL,
  `NameCategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`IdCategory`, `NameCategory`, `Title`, `img`) VALUES
(1, 'Rau xanh', '<p>Nh&oacute;m cải bắp l&agrave; một loại thực phẩm bổ dưỡng, vừa d&ugrave;ng để ăn, chữa bệnh, vừa d&ugrave;ng để l&agrave;m đẹp, gi&agrave;u Vitamin A, P.</p>\r\n', 'JbUqwTlyeHPomWaf.jpeg'),
(2, 'Trái cây', '<p>M&ocirc; tả th&ocirc;ng tin c&oacute; gi&aacute; trị, những điểm nổi bật, lời giới thiệu hấp dẫn về sản phẩm dịch vụ, gi&uacute;p người xem dễ d&agrave;ng t&igrave;m thấy nội dung.</p>\r\n', 'cMrWXxFyKfmSq6dR.jpeg'),
(3, 'Củ, quả', '<p>Bổ sung nhiều vi ch&aacute;t, nh&oacute;m củ - quả gi&uacute;p phối hợp hiệu quả để l&agrave;m đa dạng c&aacute;c m&oacute;n ăn thuần văn h&oacute;a Việt Nam.</p>\r\n', 'JhDnXz18fFjyAb06.jpeg'),
(4, 'Các loại hạt', '<p>C&aacute;c loại hạt c&oacute; vỏ chứa một nguồn chất xơ v&agrave; protein mang lại nhiều lợi &iacute;ch sức khỏe, đặc biệt l&agrave; li&ecirc;n quan đến việc giảm c&aacute;c yếu tố nguy cơ mắc bệnh tim mạch.</p>\r\n', 'uLBRbnit53087N1W.jpeg'),
(5, 'Trái cây nhập ngoại', '<p>Với nhiều loại tr&aacute;i c&acirc;y nổi tiếng được nhập khẩu từ c&aacute;c nước tr&ecirc;n thế giới.</p>\r\n', 'Br5Pf9vOHFqSE3ox.jpeg'),
(17, 'Nấm', '<p>Nấm đ&atilde; được con người sử dụng để chế biến v&agrave; bảo quản thức ăn một c&aacute;ch rộng r&atilde;i v&agrave; l&acirc;u d&agrave;i.</p>\r\n', 'KtsolSiOE3RbIP0m.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `IdVote` int(11) NOT NULL,
  `Title` text COLLATE utf8_unicode_ci NOT NULL,
  `Rate` int(11) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `IdAccount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`IdVote`, `Title`, `Rate`, `IdProduct`, `IdAccount`) VALUES
(64, '<p>Sản phẩm rất tốt</p>\n', 5, 23, 11),
(72, '<p>Chất lượng tuyệt vời</p>\n', 5, 27, 11),
(76, '<p>Sản phẩm tươi, ngon. C&aacute;ch phục vụ rất tuyệt vời</p>\n', 5, 23, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `imglandingpage`
--

CREATE TABLE `imglandingpage` (
  `IdImg` int(11) NOT NULL,
  `Img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `imglandingpage`
--

INSERT INTO `imglandingpage` (`IdImg`, `Img`, `Title`) VALUES
(2, '2Vl6LE07fDqsJAy5.jpg', 'Slider'),
(3, 'AXMSkCL9Y1PHbaON.jpg', 'Session2'),
(5, 'rBesMQ9pbiGCTFhV.jpg', 'Session4_a'),
(6, 't3ldmH7GKpYgXsoQ.jpg', 'Session4_b'),
(7, 'Lhn6OmtXxQUd5vMA.jpeg', 'Session5_a'),
(8, 'JvfE0euyzamMCKF7.jpeg', 'Session5_b'),
(9, 'qxoOrKDJzE8uiS3T.jpeg', 'Session5_c'),
(10, 'AS5YukQpts12vrh7.jpeg', 'Session5_d');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `IdAccount` int(11) NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `StatusInfo` int(11) NOT NULL,
  `PhoneNumber` int(11) DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`IdAccount`, `Address`, `StatusInfo`, `PhoneNumber`, `Name`) VALUES
(4, 'Hưng Xá, Hưng Nguyên, Nghệ An', 1, 968604438, ''),
(11, 'Bố Trạch, Quảng Bình', 0, 123456789, 'Thủy'),
(11, 'Quảng Bình', 1, 123456789, 'Thủyff'),
(12, 'Nghệ An', 1, 968604438, 'Nguyễn Văn B'),
(13, 'Nghệ An', 1, 123456789, 'Tuấn'),
(14, 'Đà Nẵng', 1, 123456789, 'Nguyễn Văn D'),
(26, 'Nghệ An', 1, 123456789, 'Lê Đức Anh Tuấn'),
(28, 'Nghệ An', 1, 123456789, 'Lê Đức Anh Tuấn'),
(30, 'Nghệ An', 1, 123456789, 'Lê Đức Anh Tuấn'),
(31, 'Nghệ An', 1, 123456789, 'Lê Đức Anh Tuấn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `infoweb`
--

CREATE TABLE `infoweb` (
  `IdWeb` int(11) NOT NULL,
  `webname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phoneNumber` int(11) DEFAULT NULL,
  `fanpage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addressWeb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QRCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `infoweb`
--

INSERT INTO `infoweb` (`IdWeb`, `webname`, `email`, `phoneNumber`, `fanpage`, `title`, `addressWeb`, `logo`, `favicon`, `QRCode`) VALUES
(1, 'TFarm ', 'tfarm@gmail.com                                                  ', 123456789, 'https://www.facebook.com/TFarm-103143542006139/?ref=pages_you_manage                      ', '<p>TRANG TRẠI RAU SẠCH LỚN NHẤT BẮC TRUNG BỘ</p>\r\n', ' 460 Trần Đại Nghĩa, quận Ngũ Hành Sơn, TP. Đà Nẵng                  ', 'u5aP7lmBoUVWHfAq.png', 'piC7KYnFoklRcZvz.png', 'https://chart.googleapis.com/chart?cht=qr&chs=500x500&chl=https://www.facebook.com/TFarm-103143542006139/?ref=pages_you_manage                      &chld=<L>|<1>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `IdOrder` int(11) NOT NULL,
  `IdAccount` int(11) NOT NULL,
  `DateOrder` datetime NOT NULL,
  `Receiver` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PhoneOrder` int(11) NOT NULL,
  `AddressOrder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Total` double NOT NULL,
  `PaymentMethods` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `StatusOrder` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`IdOrder`, `IdAccount`, `DateOrder`, `Receiver`, `PhoneOrder`, `AddressOrder`, `Total`, `PaymentMethods`, `StatusOrder`, `Email`) VALUES
(13752482, 11, '2021-11-21 19:38:33', 'Hoàng Thủy', 123456789, 'Quảng Bình', 25000, 'Thanh toán khi nhận hàng(COD)', 4, ''),
(14644611, 28, '2021-12-04 20:45:29', 'Tuấn Lê Anh', 123456789, 'Nghệ An', 200000, 'Thanh toán khi nhận hàng(COD)', 3, 'khachhang15@gmail.com'),
(16405855, 12, '2021-11-30 15:54:28', 'Nguyễn Văn B', 968604438, 'Nghệ An', 190000, 'Thanh toán khi nhận hàng(COD)', 2, 'khach3@gmail.com'),
(20442644, 11, '2021-11-19 21:02:27', 'Hoàng Thủy', 123456789, 'Quảng Bình', 55000, 'Thanh toán khi nhận hàng(COD)', 3, ''),
(22964850, 13, '2021-12-01 10:05:27', 'Nguyễn Văn C', 123456789, 'Nghệ An', 40000, 'Thanh toán khi nhận hàng(COD)', 2, 'khach4@gmail.com'),
(25728107, 31, '2021-12-05 16:26:32', 'Tuấn Haha', 123456789, 'Nghệ An', 20000, 'Thanh toán khi nhận hàng(COD)', 3, 'khachhaha@gmail.com'),
(25786479, 13, '2021-12-01 10:07:29', 'Nguyễn Văn C', 123456789, 'Nghệ An', 40000, 'Thanh toán khi nhận hàng(COD)', 2, 'khach4@gmail.com'),
(26012972, 12, '2021-11-30 15:58:07', 'Nguyễn Văn B', 968604438, 'Nghệ An', 250000, 'Thanh toán khi nhận hàng(COD)', 1, 'khach3@gmail.com'),
(33023693, 30, '2021-12-04 21:13:08', 'Tuấn Tuấn ', 123456789, 'Nghệ An', 20000, 'Thanh toán khi nhận hàng(COD)', 1, 'khachkhua@gmail.com'),
(37055478, 11, '2021-12-08 14:53:40', 'Hoàng Thủy', 123456789, 'Quảng Bình', 286000, 'Thanh toán khi nhận hàng(COD)', 1, 'khach2@gmail.com'),
(38922838, 11, '2021-11-27 21:06:23', 'Hoàng Thủy', 123456789, 'Quảng Bình', 25000, 'Thanh toán khi nhận hàng(COD)', 1, ''),
(46931231, 13, '2021-12-03 11:06:55', 'Nguyễn Văn C', 123456789, 'Nghệ An', 40000, 'Thanh toán khi nhận hàng(COD)', 1, 'khach4@gmail.com'),
(60710854, 28, '2021-12-04 20:50:42', 'Tuấn Lê Anh', 123456789, 'Nghệ An', 40000, 'Thanh toán khi nhận hàng(COD)', 4, 'khachhang15@gmail.com'),
(62916173, 26, '2021-12-04 20:31:59', 'Tuấn Lê', 123456789, 'Nghệ An', 20000, 'Thanh toán khi nhận hàng(COD)', 2, 'khachhang@gmail.com'),
(82711424, 12, '2021-11-30 15:58:37', 'Nguyễn Văn B', 968604438, 'Nghệ An', 403000, 'Thanh toán khi nhận hàng(COD)', 1, 'khach3@gmail.com'),
(86697491, 14, '2021-12-04 11:33:59', 'Nguyễn Văn D', 123456789, 'Đà Nẵng', 130000, 'Thanh toán khi nhận hàng(COD)', 3, 'khach5@gmail.com'),
(96337320, 11, '2021-11-18 20:49:37', 'Hoàng Thủy', 123456789, 'Quảng Bình', 20000, 'Thanh toán khi nhận hàng(COD)', 2, ''),
(97667242, 11, '2021-11-30 11:51:18', 'Hoàng Thủy', 123456789, 'Quảng Bình', 325000, 'Thanh toán khi nhận hàng(COD)', 4, 'khach2@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `IdOrder` int(11) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `QuantityOrder` int(11) NOT NULL,
  `SumOrder` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`IdOrder`, `IdProduct`, `QuantityOrder`, `SumOrder`) VALUES
(13752482, 22, 1, '20000'),
(13752482, 32, 1, '5000'),
(14644611, 45, 1, '200000'),
(16405855, 27, 2, '40000'),
(16405855, 36, 1, '150000'),
(20442644, 23, 1, '5000'),
(20442644, 27, 2, '40000'),
(20442644, 32, 2, '10000'),
(22964850, 30, 2, '40000'),
(25728107, 25, 2, '20000'),
(25786479, 25, 3, '30000'),
(25786479, 41, 1, '10000'),
(26012972, 46, 1, '100000'),
(26012972, 47, 1, '150000'),
(33023693, 25, 2, '20000'),
(37055478, 22, 1, '16000'),
(37055478, 49, 1, '270000'),
(38922838, 22, 1, '20000'),
(38922838, 32, 1, '5000'),
(46931231, 22, 2, '40000'),
(60710854, 22, 2, '40000'),
(62916173, 25, 2, '20000'),
(82711424, 33, 1, '3000'),
(82711424, 43, 1, '400000'),
(86697491, 23, 2, '10000'),
(86697491, 35, 1, '120000'),
(96337320, 22, 1, '20000'),
(97667242, 38, 1, '175000'),
(97667242, 42, 1, '150000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `IdProduct` int(11) NOT NULL,
  `NameProduct` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Price` double NOT NULL,
  `QuantityProduct` int(11) NOT NULL,
  `ProductImg1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ProductImg2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductImg3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductImg4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductImg5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Descrip` text COLLATE utf8_unicode_ci NOT NULL,
  `IdSale` int(11) NOT NULL,
  `IdCategory` int(11) NOT NULL,
  `IdSupplier` int(11) NOT NULL,
  `IdType` int(11) NOT NULL,
  `StatusProduct` int(11) NOT NULL,
  `TimeAdd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`IdProduct`, `NameProduct`, `Price`, `QuantityProduct`, `ProductImg1`, `ProductImg2`, `ProductImg3`, `ProductImg4`, `ProductImg5`, `Descrip`, `IdSale`, `IdCategory`, `IdSupplier`, `IdType`, `StatusProduct`, `TimeAdd`) VALUES
(20, 'Súp lơ xanh', 10000, 50, 'IOuXYqoVZhx81QK6.jpg', 'fhdEleS85wVKyXzo.jpg', '0N57lCoLtIQU1nah.jpg', 'rxpuPbQTA0oUDC58.jpg', 'i9TAl4bwNkDgQtZW.jpg', '<p>Nhiều nghi&ecirc;n cứu cho thấy s&uacute;p lơ c&oacute; chứa h&agrave;m lượng chất phytochemical cao c&ugrave;ng c&aacute;c vitamin thiết yếu, carotenoid, chất xơ, đường h&ograve;a tan, kho&aacute;ng chất v&agrave; c&aacute;c hợp chất phenolic, s&uacute;p lơ v&agrave; c&aacute;c loại rau họ cải l&agrave; nguồn cung cấp chất chống oxy h&oacute;a tự nhi&ecirc;n tuyệt vời.</p>\r\n', 1, 1, 1, 3, 1, '2021-09-25 19:24:36'),
(21, 'Cà rốt', 5000, 150, 'p0boj4M7vIszdnZG.jpg', '1d4aKXDJnPAYtZcu.jpg', 'sCY0J8x1uoprdkby.jpg', 'VpQBGLD0yZCfxgYN.jpg', 'GI7CKJ8HZywBLuDs.jpg', '<p><em>Với h&agrave;m lượng chất chống oxy h&oacute;a, beta carotene, c&aacute;c vitamin v&agrave; kho&aacute;ng chất dồi d&agrave;o, c&agrave; rốt được xem l&agrave; một trong những thực phẩm cực tốt cho sức khỏe ch&uacute;ng ta. C&agrave; rốt l&agrave;m tốt vai tr&ograve; cải thiện thị lực, ngăn chặn tế b&agrave;o ung thư, tốt cho bệnh tiểu đường, l&agrave;m đẹp da, giữ d&aacute;ng thậm ch&iacute; c&ograve;n được sử dụng để l&agrave;m vắc xin chống lại virus HIV.</em></p>\r\n', 1, 3, 3, 2, 1, '2021-09-25 19:26:04'),
(22, 'Bí ngô', 20000, 100, 'UWIvTJEHL30ePgNG.jpg', 'mKRWcDPlUNBI9f60.jpg', 'uaF0xPVSXwBgWRAm.jpg', 'VKhpSNMl8Hwoe9WG.jpg', 'UDWB3NXLO5lhbjmH.jpg', '<p>Trong b&iacute; đỏ c&oacute; chứa sắt, kali, phosphor, nước, protein thực vật, gluxit,.. c&aacute;c axit b&eacute;o linoleic, c&ugrave;ng c&aacute;c vitamin C, vitamin B1, B2, B5, B6, PP. Ăn b&iacute; đỏ rất tốt cho n&atilde;o bộ, l&agrave;m tăng cường miễn dịch, gi&uacute;p tim khỏe mạnh, mắt s&aacute;ng, cho giấc ngủ ngon hơn v&agrave; hỗ trợ cho việc chăm s&oacute;c da cũng như l&agrave;m đẹp, gi&uacute;p giảm c&acirc;n...</p>\r\n', 2, 3, 3, 1, 1, '2021-12-03 16:28:35'),
(23, 'Dưa leo', 5000, 150, 'Drkq3iTZaLf1hNAj.jpg', 'EoIu03aJdkzSLpnN.jpg', 'ENFX7xqnrVi6ftZ5.jpg', 'sv36zrdgYVpELaOj.jpg', 'JPUz39eADVSO4aTE.png', '<p>Dưa chuột rất gi&agrave;u chất chống oxi h&oacute;a&nbsp;như tannin&nbsp;v&agrave; flavonoid, c&oacute; khả năng ức chế&nbsp;sự hoạt động của c&aacute;c gốc tự do&nbsp;g&acirc;y hại, nhờ đ&oacute; giảm thiểu nguy cơ mắc phải c&aacute;c bệnh m&atilde;n t&iacute;nh thường gặp như bệnh tim, bệnh phổi, bệnh tự miễn dịch v&agrave; ung thư.</p>\r\n', 1, 3, 1, 2, 1, '2021-09-25 19:43:44'),
(24, 'Nấm kim châm', 10000, 300, 'uA8IWpnDEGT2aZNH.jpg', 'LU0ukIWt1QFlhSZc.jpg', '90v6WdaNOT584AeE.jpg', 'hc73ZHK958qDBP2E.jpg', 'GkLSI7X6NpRAT9fv.jpg', '<p>Nấm kim ch&acirc;m l&agrave; một trong những loại nấm c&oacute; gi&aacute; trị dinh dưỡng v&agrave; tốt cho sức khỏe. Với đặc điểm c&oacute; vị ngọt thanh n&ecirc;n loại nấm n&agrave;y thường được lựa chọn để chế biến c&aacute;c m&oacute;n ăn như lẩu, nướng, x&agrave;o thịt b&ograve;,... Ngo&agrave;i ra, n&oacute; c&ograve;n rất tốt cho sức khỏe.</p>\r\n', 1, 17, 4, 2, 1, '2021-09-25 19:50:48'),
(25, 'Cam', 10000, 300, '5JmBxMw3vD8pSPE1.jpg', 'cV1MjbNnQDO0RZxW.jpg', '0gfTOl5mB2Znjkr3.jpg', 'Wm85KI3Yt76yhiLz.png', 'KEkgtaHb9fOQrvsn.jpg', '<p>Cam v&agrave;ng mỹ&nbsp;c&oacute; trọng lượng to trung b&igrave;nh 250g một quả. Hơn nữa c&acirc;y ra rất sai quả v&agrave; nhanh cho thu hoạch n&ecirc;n được hứa hẹn l&agrave; giống c&acirc;y trồng mang gi&aacute; trị kinh tế cao.</p>\r\n', 1, 2, 1, 3, 1, '2021-09-25 20:12:20'),
(27, 'Táo ', 20000, 50, 'fKM2mPUVNTcxCHLI.jpg', 'Rmh0OgVlAatUWDec.jpg', 'gj8liesrLC4Kp9Ev.jpg', '5ZnWD3JR0YuNxy7s.jpg', 'uNejf6Q2B9OEkoS3.png', '<p>T&aacute;o l&agrave; một trong những loại tr&aacute;i c&acirc;y phổ biến nhất thế giới. Ch&uacute;ng c&oacute; nhiều chất xơ, vitamin C v&agrave; c&aacute;c chất chống oxy h&oacute;a kh&aacute;c nhau. Duy tr&igrave; th&oacute;i quen ăn t&aacute;o mỗi ng&agrave;y c&oacute; thể l&agrave;m giảm lượng calo h&agrave;ng ng&agrave;y v&agrave; th&uacute;c đẩy giảm c&acirc;n l&acirc;u d&agrave;i.</p>\r\n', 1, 2, 4, 3, 1, '2021-09-25 21:06:33'),
(29, 'Khoai lang', 15000, 50, '7wNg0VoBOmjEiHkK.jpg', 'frGdw1yEcL7SBY2l.png', '6BluvcfNzko70xwY.jpg', 'Wp3s6xiI9XZFt5y2.jpg', 'qhQuj2AXB9kyZrJV.jpg', '<p>Khoai lang l&agrave; một nguồn &iacute;t chất b&eacute;o chứa nhiều chất dinh dưỡng c&oacute; lợi quan trọng đối với sức khỏe của bạn. Đặc biệt gi&agrave;u vitamin, đặc biệt l&agrave; vitamin A, chất xơ v&agrave; chất chống oxy h&oacute;a, khoai lang n&ecirc;n được coi l&agrave; một bổ sung l&agrave;nh mạnh cho chế độ ăn uống của bạn.</p>\r\n', 1, 3, 4, 2, 1, '2021-09-26 10:11:51'),
(30, 'Hạt óc chó', 20000, 150, '9UAWC76MZiLhxNj3.jpg', '9zBTOfb2LuoIphtC.jpg', 'k4s6fZEoPbGV7My1.jpg', 'TuWr8CivSIqdUQLZ.jpg', '8zAlqVNtue2fJCwm.jpg', '<p>Quả &oacute;c ch&oacute; c&oacute; nguồn gốc ở khu vực Địa Trung Hải v&agrave; Trung &Aacute;. &Oacute;c ch&oacute; gi&agrave;u chất b&eacute;o omega-3 v&agrave; chứa lượng chất chống oxy h&oacute;a cao hơn hầu hết c&aacute;c loại thực phẩm kh&aacute;c.Quả &oacute;c ch&oacute;&nbsp;thường được ăn một m&igrave;nh như một m&oacute;n ăn nhẹ nhưng cũng c&oacute; thể được th&ecirc;m v&agrave;o m&oacute;n salad, m&igrave; ống, ngũ cốc ăn s&aacute;ng, s&uacute;p, v&agrave; c&aacute;c m&oacute;n nướng.</p>\r\n', 1, 4, 4, 3, 1, '2021-09-26 10:18:22'),
(31, 'Rau muống', 2000, 100, 'whazxLjKmPocG75t.jpg', 'zGegfrKUMQNtmTDs.jpeg', 'wIqLub1gREVQ5MAY.png', '3GJDravgeUlI50cu.png', 'g0thadFcLIeDljui.jpg', '<p>Gi&aacute; trị dinh dưỡng c&oacute; trong rau muống gồm c&oacute; vitamin A, B, C, canxi, phospho, c&aacute;c chất dinh dưỡng v&agrave; đặc biệt l&agrave; h&agrave;m lượng chất sắt dồi d&agrave;o. Ăn rau muống một c&aacute;ch hợp l&yacute; sẽ c&oacute; rất nhiều c&ocirc;ng dụng như: Thanh nhiệt giải độc, ph&ograve;ng chống tiểu đường, ph&ograve;ng chống c&aacute;c bệnh tim mạch...</p>\r\n', 1, 1, 1, 2, 1, '2021-12-05 16:27:25'),
(32, 'Rau ngót', 5000, 150, 'vhbNaoF1nXxT6VYE.jpg', 'rQZSxNLm7dEcgtK1.gif', 'NORTu58ZsybUX0YW.jpg', '2VMKBDfY8N0WvwgX.jpg', '0dtfC5khAMeBS6uR.jpg', '<p>Rau ng&oacute;t sinh trưởng nhanh v&agrave; đặc biệt &iacute;t s&acirc;u bệnh, kh&ocirc;ng phải d&ugrave;ng đến thuốc trừ s&acirc;u, v&igrave; vậy rau ng&oacute;t ăn rất l&agrave;nh v&agrave; an to&agrave;n. Người ta sử dụng l&aacute; rau ng&oacute;t để nấu canh với thịt, xương, hay t&ocirc;m, hến cũng đều rất ngon v&agrave; bổ dưỡng cho bữa ăn gia đ&igrave;nh, lại th&ecirc;m t&aacute;c dụng giải nhiệt m&ugrave;a h&egrave;. Người thể hư h&agrave;n ki&ecirc;ng d&ugrave;ng hoặc nếu d&ugrave;ng n&ecirc;n cho th&ecirc;m mấy l&aacute;t gừng.</p>\r\n', 1, 1, 3, 2, 1, '2021-10-01 16:23:50'),
(33, 'Rau mùng tơi', 3000, 100, 'x5jVzLQwNRAI8sd9.jpg', 'uVo0sWOFhfqXd2Qb.jpg', 'Fi6oVH8nNX7I395v.jpg', 'j9Sy8QWh7v1mO4L3.png', '58VSTPqupNBHdsgJ.jpg', '<p>Mồng tơi m&aacute;t v&agrave; m&ugrave;a n&egrave; n&oacute;ng nực n&oacute; được xem như thứ rau vua. Trong Đ&ocirc;ng y, mồng tơi c&oacute; t&iacute;nh h&agrave;n, vị chua, kh&ocirc;ng độc, đi v&agrave;o 5 kinh t&acirc;m, t&igrave;, can, đại trường, t&aacute; tr&agrave;ng, gi&uacute;p lợi tiểu, t&aacute;n nhiệt, giải độc, l&agrave;m đẹp da, trị r&ocirc;m sảy, mụn nhọt.</p>\r\n\r\n<p>Chất nhầy pectin c&oacute; trong mồng tơi c&oacute; t&aacute;c dụng nhuận tr&agrave;ng, trừ thấp nhiệt, giảm b&eacute;o, chống b&eacute;o ph&igrave;, do đ&oacute; loại rau n&agrave;y đặc biệt th&iacute;ch hợp cho những người c&oacute; mỡ m&aacute;u, đường huyết cao, muốn giảm c&acirc;n.</p>\r\n', 1, 1, 3, 1, 1, '2021-10-01 16:27:00'),
(34, 'Hạt chia', 18000, 200, 'XAduZ95xfYpFq40c.png', '7exFEmS6RuWaz8sC.jpg', '2SVAJa0DujxLyhwK.jpg', 'p1BmJeFW6jG9Aklu.jpg', 'E3w6xk91HA2fdRKO.png', '<p>Hạt chia được ưa chuộng bởi th&agrave;nh phần dinh dưỡng&nbsp;cao v&agrave; mang lại nhiều lợi &iacute;ch sức khỏe tuyệt vời như: hỗ trợ giảm c&acirc;n, duy tr&igrave; hệ đường ruột khỏe mạnh, b&agrave;i trừ độc tố ra khỏi cơ thể, bảo vệ bạn khỏi nguy cơ mắc bệnh tim mạch v&agrave; v&ocirc; v&agrave;n những c&ocirc;ng dụng đ&aacute;ng qu&yacute; kh&aacute;c.</p>\r\n', 1, 4, 4, 2, 1, '2021-10-01 16:31:13'),
(35, 'Hạt điều', 120000, 300, 'yTtOeZz9X6B0buH1.jpg', 'v8WwdIr2koRJchYT.jpg', 'J6qeYFtr3GQvSx1j.jpg', '21nscFThuAm8fBLQ.jpg', 'PX4lAIBswN1OKTcM.jpg', '<p>Hạt điều rất gi&agrave;u vitamin, kho&aacute;ng chất, chất chống oxy h&oacute;a, chất xơ v&agrave; c&aacute;c chất dinh dưỡng kh&aacute;c.&nbsp;Hạt điều c&oacute; t&aacute;c dụng hỗ trợ giảm c&acirc;n v&agrave; tốt cho tim mạch.</p>\r\n', 1, 4, 4, 2, 1, '2021-10-01 16:33:46'),
(36, 'Hạnh nhân', 150000, 150, 'AOzwv5G09QZ7yEo2.png', 'roDgFzBHMLbxRQ7I.jpg', '0DtHJyl8hqIKYFRk.jpg', '8lHu759KNXTsAcDj.jpg', 'YbCukIi5oxwpl0XB.jpg', '<p>Hạnh nh&acirc;n l&agrave; một trong những loại hạt phổ biến tr&ecirc;n thế giới. Th&agrave;nh phần dinh dưỡng của hạnh nh&acirc;n gi&agrave;u chất b&eacute;o l&agrave;nh mạnh, chất chống oxy h&oacute;a, vitamin v&agrave; kho&aacute;ng chất.</p>\r\n', 1, 4, 3, 2, 1, '2021-10-01 16:38:22'),
(37, 'Hạt hồ trăn', 160000, 300, 'HtlW0CFS3Qh2GYeb.jpg', 'kt43cDXaUNWZgeuT.jpg', '1YmypFRcxNdkOK5h.png', 'RquBGNd9lE184jhn.jpg', '9lqgHLdKJxaDWi02.jpg', '<p>Hạt hồ trăn kh&ocirc;ng chỉ ngon v&agrave; th&uacute; vị khi ăn m&agrave; c&ograve;n si&ecirc;u tốt cho sức khỏe.Những hạt ăn được của c&acirc;y&nbsp;<em>Pistacia vera</em>&nbsp;chứa chất b&eacute;o&nbsp;l&agrave;nh mạnh v&agrave; l&agrave; một nguồn protein, chất xơ v&agrave; chất chống oxy h&oacute;a tốt.Hơn thế nữa, ch&uacute;ng c&oacute; chứa một số chất dinh dưỡng thiết yếu v&agrave; c&oacute; thể hỗ trợ giảm c&acirc;n v&agrave; sức khỏe của tim v&agrave; ruột.Thật th&uacute; vị, mọi người đ&atilde; ăn quả hồ trăn từ năm 7000 trước C&ocirc;ng nguy&ecirc;n. Ng&agrave;y nay, ch&uacute;ng rất phổ biến trong nhiều m&oacute;n ăn, bao gồm cả kem v&agrave; m&oacute;n tr&aacute;ng miệng.</p>\r\n', 1, 4, 4, 2, 1, '2021-10-01 16:41:21'),
(38, 'Hạt hồ đào', 175000, 100, 'pqLCa85wbPJ34SKf.jpg', 'pjqCzDwyAZ5XPMKi.jpg', '9ipPEKLQonWHvCdw.jpg', 'DBlImsYGV9UCJ02E.jpg', 'NMaOvn125itJkKYc.jpg', '<p>Theo c&aacute;c chuy&ecirc;n gia, hạt từ quả hồ đ&agrave;o chứa nhiều chất b&eacute;o c&oacute; lợi cho tim mạch. B&ecirc;n cạnh đ&oacute;, loại quả hạch n&agrave;y c&ograve;n cung cấp một số vitamin v&agrave; kho&aacute;ng chất tốt nhằm bảo vệ bạn, chống lại sự thiếu hụt dinh dưỡng v&agrave; tối ưu h&oacute;a sức khỏe tổng thể.</p>\r\n', 1, 4, 4, 1, 1, '2021-10-01 16:43:11'),
(39, 'Hạt Macca', 80000, 150, '6EuWpCxS0Krk9s5g.jpg', 'byRkc9js54DJTgzw.jpg', '9HYjvBRMqGfcIQWg.jpg', 'o8DTp4y7RLPi9stg.png', 'GThSd5PtvFukp0gB.jpg', '<p>Hạt macca c&ograve;n c&oacute; t&ecirc;n gọi kh&aacute;c l&agrave; hạt macadamia, c&oacute; xuất xứ từ &Uacute;c v&agrave; ng&agrave;y nay đ&atilde; xuất hiện tại nhiều nơi tr&ecirc;n thế giới, trong đ&oacute; c&oacute; Việt Nam. Loại hạt n&agrave;y nổi tiếng với hương vị b&eacute;o ngậy đặc trưng, c&ugrave;ng với gi&aacute; trị dinh dưỡng cao, mang lại nhiều lợi &iacute;ch cho sức khỏe tổng thể.</p>\r\n', 1, 4, 4, 2, 1, '2021-10-01 16:45:31'),
(41, 'Gạo', 10000, 50, '9HCYsDR7A5TXj1ye.png', '8huvKSX2CEOl790G.jpg', 'Jxy5lQ1Aq4MTcd0H.jpg', 'BZ4YzQPfkF9XoD8U.png', 'yndDeKAiqOt6k7zP.png', '<p>Gạo l&agrave; một trong những loại ngũ cốc phổ biến nhất tr&ecirc;n thế giới, được trồng ở mọi ch&acirc;u lục, trừ Nam Cực. Theo thống k&ecirc;, hiện nay c&oacute; hơn 40,000 giống gạo kh&aacute;c nhau, được người d&acirc;n sử dụng như một m&oacute;n ăn ch&iacute;nh trong c&aacute;c bữa ăn h&agrave;ng ng&agrave;y.</p>\r\n', 1, 4, 3, 3, 1, '2021-11-24 10:06:02'),
(42, 'Kiwi', 150000, 100, 'NZYvIkhRiHpnCBtD.jpg', 'Ew4iLOG5px1cWSI8.jpg', '2UrIQyTpSA8q7eDC.jpg', 'wc2hnzmHkOR48FoD.jpg', 'G64ItVCoq3rspYuf.jpg', '<p>Kiwi l&agrave; loại tr&aacute;i c&acirc;y c&oacute; nhiều hương vị tuy k&iacute;ch thước kh&aacute; nhỏ v&agrave; rất nhiều lợi &iacute;ch cho sức khỏe. Thịt xanh của ch&uacute;ng thơm v&agrave; ngọt.</p>\r\n\r\n<p>Ch&uacute;ng cũng chứa đầy c&aacute;c chất dinh dưỡng như vitamin C, vitamin K, vitamin E, folate v&agrave; kali.</p>\r\n\r\n<p>Ngo&agrave;i ra, ch&uacute;ng cũng c&oacute; rất nhiều chất chống oxy h&oacute;a v&agrave; l&agrave; nguồn cung cấp dồi d&agrave;o chất xơ.</p>\r\n', 1, 5, 1, 2, 1, '2021-11-24 09:39:26'),
(43, 'Mâm xôi', 400000, 100, '7lNd1pi4sEjwYHJR.jpg', 'rYvQqUMyTjhBcGo3.jpg', 'vdCeKjf3qZy1Q5WH.jpg', 'dqeQgUziTkHpwxNF.jpg', 'Ob9k6gBMY0e4lvzW.jpg', '<p>Quả ph&uacute;c bồn tử c&oacute; h&agrave;m lượng dinh dưỡng cao, chứa c&aacute;c chất kho&aacute;ng v&agrave; vitamin như: hợp chất flavonoid (kaempferol, anthocyanin, quercetin&hellip;), vitamin C (53,7%), chất xơ (31%), acid folic, omega-3, vitamin K, vitamin E v&agrave; c&aacute;c loại kho&aacute;ng chất như mangan (41%), Mg, Cu, Zn, K&hellip; V&igrave; vậy, thường xuy&ecirc;n sử dụng quả ph&uacute;c bồn tử sẽ gi&uacute;p bổ sung dưỡng chất đồng thời gi&uacute;p cơ thể ngăn ngừa bệnh tật.</p>\r\n', 1, 5, 1, 2, 1, '2021-12-04 20:33:17'),
(44, 'Táo Envy', 150000, 100, 'RWTz12iAeYJD6H8F.jpg', 'bNO6JiVkuj8PAKwM.jpg', 'xRp9jvOuDzY3t7gT.png', '3lXuBFA0kN9R61MY.jpg', 'sL8NotJB9GiqwuA6.png', '<p>Giống t&aacute;o Envy c&oacute; quả to tr&ograve;n, với vỏ m&agrave;u đỏ điểm th&ecirc;m c&aacute;c sọc m&agrave;u v&agrave;ng, thịt gi&ograve;n, ngọt, thơm đ&atilde; trở th&agrave;nh&nbsp;giống t&aacute;o cao cấp nhất, đặc biệt t&aacute;o Envy khi cắt ra vẫn giữ được m&agrave;u trắng tinh kh&ocirc;i trong nhiều giờ đ&atilde; l&agrave;m say đắm c&aacute;c đầu bếp v&agrave; những người s&agrave;nh về tr&aacute;i c&acirc;y tr&ecirc;n to&agrave;n thế giới.</p>\r\n', 1, 5, 6, 2, 1, '2021-11-24 10:11:44'),
(45, 'Sầu riêng', 200000, 50, 'Ycio7AsDKIlRjrO8.png', '5XtqfwbPlMRmA1oL.jpg', '3HSKjU8fEb94cB2i.jpg', 'xRn4wKfATXzNY7yF.png', '0s5i6w7EU1pJbuAN.png', '<p>Sầu ri&ecirc;ng l&agrave; một loại tr&aacute;i c&acirc;y lớn, c&oacute; m&ugrave;i kh&aacute; nồng v&agrave; nặng, nhưng cực kỳ gi&agrave;u c&aacute;c chất dinh dưỡng, chẳng hạn như vitamin C, vitamin B, kho&aacute;ng chất, chất b&eacute;o l&agrave;nh mạnh, chất xơ v&agrave; một số hợp chất thực vật c&oacute; lợi kh&aacute;c. Sầu ri&ecirc;ng thường c&oacute; mặt tại nhiều quốc gia trong khu vực Đ&ocirc;ng Nam &Aacute;, điển h&igrave;nh l&agrave; Việt Nam.&nbsp;</p>\r\n', 1, 2, 8, 3, 1, '2021-11-24 10:16:52'),
(46, 'Nho đen', 100000, 100, 'Tacj9PWgVR4ZGOdX.jpg', '75vJU8mKMbOQaBfI.jpg', 'j4W2k8H1PZ6wB7gx.jpg', 'WwypIX8lhVvCQOKg.jpg', '75tSWjBymUp9e3RY.jpg', '<p>Nho&nbsp;l&agrave; một loại quả mọng xuất ph&aacute;t&nbsp;từ c&aacute;c lo&agrave;i c&acirc;y th&acirc;n leo thuộc chi Nho (<em>Vitis</em>). Quả nho mọc th&agrave;nh ch&ugrave;m từ 6 đến 300 quả, ch&uacute;ng c&oacute; m&agrave;u sắc kh&aacute;c nhau như&nbsp;v&agrave;ng, lam, lục, đen,&nbsp;đỏ &ndash; t&iacute;a hay trắng. Khi ch&iacute;n, quả nho c&oacute; thể &nbsp;được sấy kh&ocirc; để l&agrave;m nho kh&ocirc; hoặc ăn tươi, cũng như được d&ugrave;ng để sản xuất c&aacute;c loại rượu vang, nước quả,&nbsp;thạch nho, dầu hạt nho, mật nho, ...</p>\r\n', 1, 2, 8, 2, 1, '2021-11-24 10:20:27'),
(47, 'Nấm hương', 150000, 50, 'qc50zevwmytFDQHB.jpg', 'Q8aNBy5ljYWuVZr2.jpg', 'XqymunIHrwGUJBVh.jpg', 'iujq8XnSyBoK6dEz.png', 'VZ1nB5Em6RteOUrb.png', '<p>Nấm hương l&agrave; loại nấm phổ biến nhất tr&ecirc;n thế giới. Loại nấm n&agrave;y c&oacute; hương vị thơm ngon v&agrave; nhiều lợi &iacute;ch cho sức khỏe như tốt cho tim mạch, kh&aacute;ng khuẩn, đẹp da,&hellip;</p>\r\n', 1, 17, 4, 2, 1, '2021-11-24 10:26:27'),
(48, 'Nấm bào ngư xám', 80000, 100, 'vbunrmFJRNh6Tw45.jpg', '3BfN4JIjektWCTU5.jpg', 'ZYQzskERb3thvT1J.jpg', '0UGEY6tRQpgqsMlh.jpg', 'tWphaJ1Cfe6djuT4.jpg', '<p>Nấm b&agrave;o ngư&nbsp;hay c&ograve;n được gọi l&agrave;&nbsp;nấm s&ograve;&nbsp;c&oacute; nguồn gốc từ Đức n&oacute; mọc ở tr&ecirc;n c&aacute;c c&acirc;y gốc mục hay yếu để h&uacute;t chất dinh dưỡng v&igrave; kh&ocirc;ng c&oacute; diệp lục n&ecirc;n&nbsp;nấm b&agrave;o ngư&nbsp;c&oacute; m&agrave;u trắng ng&agrave; như vỏ s&ograve; v&agrave; kh&ocirc;ng thể tự tổng hợp thức ăn n&ecirc;n dinh dưỡng chỉ phụ thuộc ch&iacute;nh v&agrave;o c&aacute;c dưỡng chất h&uacute;t được từ c&acirc;y mẹ, n&ecirc;n bởi vậy&nbsp;nấm b&agrave;o ngư&nbsp;rất bổ v&agrave; tốt cho sức khỏe.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 4, 17, 4, 2, 1, '2021-11-24 10:43:48'),
(49, 'Nấm mối', 300000, 50, 'ofyPzc0b6RXJFlg2.jpg', 'Z2KGY0Wo7Cxdkmpr.jpg', 'H2hYMlTopfqdLcFO.jpg', 'ub0D1NyTOcMHESI6.jpg', 'riw3GFSLefXCJm7U.jpg', '<p>Sở dĩ c&oacute; t&ecirc;n gọi l&agrave;&nbsp;nấm mối&nbsp;l&agrave; bởi v&igrave; loại nấm n&agrave;y chỉ mọc được những nơi c&oacute; mối l&agrave;m tổ, đất bị đ&ugrave;n xốp l&ecirc;n v&agrave;&nbsp;nấm mối&nbsp;mọc, bởi vậy&nbsp;nấm mối&nbsp;kh&aacute; &iacute;t v&agrave; hiếm nhưng đồng thời lại rất bổ dưỡng v&agrave; ngon miệng.</p>\r\n', 4, 17, 4, 2, 1, '2021-11-24 10:52:08'),
(50, 'Cải ngọt', 22000, 100, 'BeKVLyskQP2MEJ3g.jpg', 'gu8CPYRctisxIreq.jpg', 'TZYM0iJCdcFHABhU.png', '3nHJqR0iCoVzBy6v.jpg', 'Schy9q6NuawDvsog.jpg', '<p>C&oacute; thể n&oacute;i, rau cải l&agrave; một trong những loại thực phẩm đ&atilde; qu&aacute; quen thuộc với m&acirc;m cơm Việt. &ldquo;Họ h&agrave;ng&rdquo; nh&agrave; rau cải v&ocirc; c&ugrave;ng đa dạng, cải th&igrave;a, cải xoong, cải bẹ, cải rổ&hellip;. v&agrave; đương nhi&ecirc;n kh&ocirc;ng thể thiếu &ldquo;người anh em&rdquo; cải ngọt. Họ nh&agrave; cải sở hữu rất nhiều lợi &iacute;ch v&agrave;&nbsp;cải ngọt&nbsp;cũng kh&ocirc;ng ngoại lệ.</p>\r\n', 2, 1, 1, 2, 1, '2021-12-03 10:02:43'),
(51, 'Mướp đắng', 15000, 100, 'k3XD9dShC1Tt5YFR.png', 'vKMd0FtcUGrILn25.png', 'wTu7UsF0YnpxrciG.jpg', 'YV1ClZuNPzWaXsni.jpg', 'XWhPRgF6yTNVLbrn.jpg', '<p>Mướp đắng&nbsp;l&agrave; một loại quả non, mềm, ăn được thuộc chi Momordica của lo&agrave;i d&acirc;y leo. Mặc d&ugrave; vị đắng của n&oacute; c&oacute; thể khiến một số người cảm thấy kh&oacute; chịu, nhưng n&oacute; thực sự c&oacute; thể cải thiện sức khỏe của ch&uacute;ng ta nhờ c&aacute;c hợp chất phytochemical ngăn ngừa bệnh tật v&agrave; tăng cường sức khỏe.</p>\r\n', 2, 3, 3, 2, 1, '2021-12-03 10:12:45'),
(52, 'Khế', 10000, 50, 'Oa5EqS19ohZPl4k3.jpg', 'mIMSt6rGQ2hK3p7d.png', 'CP95l4nWFgJzOGSM.jpg', 'y2BE63ozYxV4WInC.jpg', 'j8hkQ6JF1qi5OWK2.jpg', '<p>Tr&aacute;i khế c&oacute; vị chua chua, ngọt ngọt rất độc đ&aacute;o v&agrave; hấp dẫn n&ecirc;n được nhiều người y&ecirc;u th&iacute;ch. Khế c&oacute; m&agrave;u xanh hoặc m&agrave;u v&agrave;ng v&agrave; c&oacute; hai loại l&agrave; khế ngọt v&agrave; khế chua. Khế ngọt khi ch&iacute;n cũng c&oacute; m&agrave;u xanh đặc trưng v&agrave; mọng nước. Khế chua khi ch&iacute;n thường c&oacute; m&agrave;u v&agrave;ng.</p>\r\n', 2, 2, 3, 2, 1, '2021-12-03 10:20:11'),
(53, 'Lựu đỏ Peru', 335000, 50, '8kdsWO4t7f1BRyqe.jpg', 'VeQBGpNnA3YqMSEX.jpg', 'Sxfj6Yut3y9GKMX8.jpg', 'sZnmkaMOxtXK3LRI.jpg', 'uAbQjMaJqSw7PDZF.png', '<p><strong>Lựu Peru&nbsp;</strong>l&agrave; loại tr&aacute;i c&acirc;y nhập khẩu&nbsp;c&oacute; vỏ m&agrave;u v&agrave;ng, tr&aacute;i tương đối lớn (khoảng 500 &ndash; 600g/ tr&aacute;i), hạt đỏ thẫm, nhiều nước, đặc biệt ăn rất ngọt v&agrave; nhiều nước.</p>\r\n', 2, 5, 8, 2, 1, '2021-12-03 10:29:29'),
(54, 'Cherry đỏ Mỹ', 290000, 100, 'qed2vE1x74jp9RMh.jpg', 'KdujYoOS0gFrkzCf.jpg', 'xk2wCZpJF7auHWUA.jpg', 'PpU3Jqfrd4xv9ycF.jpg', 'oeYyOXPk4sVRTtDS.jpg', '<p><strong>Cherry đỏ Mỹ</strong>&nbsp;được canh t&aacute;c chủ yếu ở c&aacute;c v&ugrave;ng Bakerfield, Arvin, Lodi, Stockton v&agrave; Linden nơi kh&iacute; hậu ấm &aacute;p, kh&ocirc; n&oacute;ng, th&iacute;ch hợp để c&acirc;y cherry ph&aacute;t triển. Quả cherry ở đ&acirc;y được tắm no nắng n&ecirc;n ngọt đậm đ&agrave;,hương quyến rũ.</p>\r\n', 1, 5, 8, 2, 1, '2021-12-03 10:33:25'),
(55, 'Nấm rơm', 25000, 100, 'oPWSxLyrn64FOH8s.jpg', 'hG7axV8o9FiXvknJ.jpg', 'NYD5hTU38GsnEgIo.png', 'SFNV8LrkebJl0gnX.jpg', '4y7qNSnRAkUojiB5.jpg', '<p>Nấm rơm (nấm mũ rơm) được ph&acirc;n bổ chủ yếu ở c&aacute;c nước c&oacute; kh&iacute; hậu nhiệt đới như ch&acirc;u &Aacute;, Ch&acirc;u &Uacute;c&hellip;Nấm rơm l&agrave; loại nấm sinh trưởng v&agrave; ph&aacute;t triển từ rơm rạ. N&oacute; được chia th&agrave;nh nhiều lo&agrave;i kh&aacute;c nhau: nấm m&agrave;u x&aacute;m, trắng, x&aacute;m đen&hellip; Nấm rơm sống chủ yếu ở c&aacute;c v&ugrave;ng th&ocirc;n qu&ecirc; Việt Nam.</p>\r\n', 2, 17, 4, 2, 1, '2021-12-03 10:39:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sale`
--

CREATE TABLE `sale` (
  `IdSale` int(11) NOT NULL,
  `NameSale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DescripSale` text COLLATE utf8_unicode_ci NOT NULL,
  `Percent` double NOT NULL,
  `DateStart` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sale`
--

INSERT INTO `sale` (`IdSale`, `NameSale`, `DescripSale`, `Percent`, `DateStart`) VALUES
(1, 'Không', '<p>Kh&ocirc;ng c&oacute; khuyến m&atilde;i</p>\r\n', 0, '2021-11-29 12:12:35'),
(2, 'Giảm giá 20%', '<p>Giảm gi&aacute; nh&acirc;n dịp khai trương</p>\r\n', 20, '2021-12-08 19:54:09'),
(3, 'Giảm giá cực sốc', '<p>Giảm gi&aacute; cực sốc l&ecirc;n đến 50%</p>\r\n', 50, '2021-11-29 12:13:42'),
(4, 'Giảm giá cuối năm', '<p>Giảm gi&aacute; cuối năm, k&iacute;ch cầu mua sắm</p>\r\n', 10, '2021-11-29 12:14:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `IdSupplier` int(11) NOT NULL,
  `NameSupplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AddressSupplier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkWebsite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `QRCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`IdSupplier`, `NameSupplier`, `AddressSupplier`, `linkWebsite`, `QRCode`) VALUES
(1, 'TFarm', '460, Trần Đại Nghĩa, Ngũ Hành Sơn, TP.Đà Nẵng', 'https://bactom.com/', 'https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=https://bactom.com/'),
(3, 'VietFarm', 'Xóm 1, xã Long Xá, huyện Hưng Nguyên, tỉnh Nghệ An', 'https://kingfoodmart.com/', 'https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=https://kingfoodmart.com/'),
(4, 'Dũng Hà', 'Phúc Trạch, Hương Khê, tỉnh Hà Tĩnh', 'https://nongsandungha.com/', 'https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=https://nongsandungha.com/'),
(6, 'Ruby Fruits', 'Đà Nẵng', 'https://shopnongsansach.com/', 'https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=https://shopnongsansach.com/'),
(8, 'VinFruits', '169 Nguyễn Đình Chiểu, Phường 6, Quận 3, TP.HCM, Việt Nam', 'https://vinfruits.com/', 'https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=https://vinfruits.com/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `IdType` int(11) NOT NULL,
  `NameType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Mass` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`IdType`, `NameType`, `Mass`) VALUES
(1, 'Loại 0.5 kg', '0.5'),
(2, 'Loại 1 kg', '1'),
(3, 'Loại 2 kg', '2'),
(4, 'Loại 5 kg', '5');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`IdAccount`,`Email`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`IdCategory`,`NameCategory`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`IdVote`),
  ADD KEY `IdProduct` (`IdProduct`),
  ADD KEY `IdAccount` (`IdAccount`);

--
-- Chỉ mục cho bảng `imglandingpage`
--
ALTER TABLE `imglandingpage`
  ADD PRIMARY KEY (`IdImg`);

--
-- Chỉ mục cho bảng `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`IdAccount`,`Address`);

--
-- Chỉ mục cho bảng `infoweb`
--
ALTER TABLE `infoweb`
  ADD PRIMARY KEY (`IdWeb`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`IdOrder`),
  ADD KEY `IdAccount` (`IdAccount`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`IdOrder`,`IdProduct`),
  ADD KEY `IdProduct` (`IdProduct`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IdProduct`),
  ADD KEY `IdCategory` (`IdCategory`),
  ADD KEY `IdSupplier` (`IdSupplier`),
  ADD KEY `IdType` (`IdType`),
  ADD KEY `IdSale` (`IdSale`);

--
-- Chỉ mục cho bảng `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`IdSale`,`NameSale`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`IdSupplier`,`NameSupplier`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`IdType`,`NameType`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `IdAccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `IdCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `IdVote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `imglandingpage`
--
ALTER TABLE `imglandingpage`
  MODIFY `IdImg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `infoweb`
--
ALTER TABLE `infoweb`
  MODIFY `IdWeb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `IdOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97667243;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `IdProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `sale`
--
ALTER TABLE `sale`
  MODIFY `IdSale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `IdSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `IdType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`IdAccount`);

--
-- Các ràng buộc cho bảng `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`IdAccount`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`IdAccount`) REFERENCES `account` (`IdAccount`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`IdOrder`) REFERENCES `order` (`IdOrder`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`IdCategory`) REFERENCES `category` (`IdCategory`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`IdSupplier`) REFERENCES `supplier` (`IdSupplier`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`IdType`) REFERENCES `type` (`IdType`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`IdSale`) REFERENCES `sale` (`IdSale`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
