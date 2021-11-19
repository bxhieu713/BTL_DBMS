-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2021 lúc 09:46 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB-log
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlsanbbong`
--
CREATE DATABASE IF NOT EXISTS `qlsanbong` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `qlsanbong`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` char(10) NOT NULL,
  `tenkhachhang` varchar(45) DEFAULT NULL,
  `gioitinh` varchar(45) DEFAULT NULL,
  `diachi` varchar(45) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `sodt` char(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `diemthuong` varchar(45) DEFAULT NULL,
  `updatedDate` timestamp NULL DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `tenkhachhang`, `gioitinh`, `diachi`, `ngaysinh`, `sodt`, `email`, `diemthuong`, `updatedDate`, `createdDate`) VALUES
('1', 'Bùi Xuân Hiếu', 'Nam', 'Hải Phòng', '2001-03-03', '0336603923', 'bhieu713@gmail.com', '12', NULL, '2021-11-04 17:00:00'),
('2', 'Khách hàng', 'Nam', 'Thái Bình', '2001-03-03', '356545215', '123@gmail.com', '1836', NULL, '2021-01-13 17:00:00'),
('4', 'Nhân viên', 'nam', 'thaibinh', '2001-03-03', '0336603923', 'hieu713@gmail.com', '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dichvu`
--

CREATE TABLE `tbl_dichvu` (
  `iddichvu` char(10) NOT NULL,
  `tendichvu` varchar(30) DEFAULT NULL,
  `dongia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_dichvu`
--

INSERT INTO `tbl_dichvu` (`iddichvu`, `tendichvu`, `dongia`, `soluong`, `updatedDate`, `createdDate`) VALUES
('1', 'Nước', 6000, 500, '2021-01-10 09:23:45', '2021-11-04 17:00:00'),
('2', 'Thach bich ngọt', 6000, 500, '2021-01-05 02:42:06', '2021-11-04 17:00:00'),
('3', 'Coca', 9000, 500, '2021-01-10 09:23:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `idhoadon` char(10) NOT NULL,
  `idsan` char(10) DEFAULT NULL,
  `iduser` char(10) DEFAULT NULL,
  `timeStart` time DEFAULT NULL,
  `timeEnd` time DEFAULT NULL,
  `ngaydat` date DEFAULT NULL,
  `tongthanhtoan` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `updatedDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdDate` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadon`
--

-- INSERT INTO `tbl_hoadon` (`idhoadon`, `idsan`, `iduser`, `timeStart`, `timeEnd`, `ngaydat`, `tongthanhtoan`, `status`, `updatedDate`, `createdDate`) VALUES
-- ('4081424352', '10', '2', '10:30:00', '11:30:00', '2021-11-19', 512000, 0, '2021-11-17 17:35:20', '2021-11-17 11:35:20'),
-- ('6216884703', '2', '2', '18:00:00', '18:30:00', '2021-11-17', 131000, 0, '2021-11-16 11:10:51', '2021-11-16 05:10:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadondichvu`
--

CREATE TABLE `tbl_hoadondichvu` (
  `iddichvu` char(10) NOT NULL,
  `idhoadon` char(10) NOT NULL,
  `dongia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `thanhtien` int(11) DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadondichvu`
--

-- INSERT INTO `tbl_hoadondichvu` (`iddichvu`, `idhoadon`, `dongia`, `soluong`, `thanhtien`, `updatedDate`, `createdDate`) VALUES
-- ('2', '6216884703', 6000, 1, 6000, '2021-11-16 11:10:51', '2021-11-16 05:10:51'),
-- ('2', '4081424352', 6000, 1, 6000, '2021-11-17 17:35:20', '2021-11-17 11:35:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaisan`
--

CREATE TABLE `tbl_loaisan` (
  `idloaisan` char(10) NOT NULL,
  `loaisan` char(10) DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaisan`
--

INSERT INTO `tbl_loaisan` (`idloaisan`, `loaisan`, `updatedDate`, `createdDate`) VALUES
('1', 'Sân 5', '2021-11-04 07:08:54', '2021-11-01 17:00:00'),
('2', 'Sân 7', '2021-11-04 07:08:54', '2021-11-01 17:00:00'),
('3', 'Sân 11', '2021-11-04 07:08:54', '2021-11-01 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_role`
--

CREATE TABLE `tbl_role` (
  `idrole` char(10) NOT NULL,
  `rolename` varchar(45) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT NULL,
  `updatedDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_role`
--

INSERT INTO `tbl_role` (`idrole`, `rolename`, `createdDate`, `updatedDate`) VALUES
('1', 'admin', NULL, NULL),
('2', 'Nhân viên', NULL, NULL),
('3', 'Khách hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_san`
--

CREATE TABLE `tbl_san` (
  `idsan` char(10) NOT NULL,
  `tensan` char(10) DEFAULT NULL,
  `loaisan` char(10) DEFAULT NULL,
  `dongia` int(11) DEFAULT NULL,
  `updatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_san`
--

INSERT INTO `tbl_san` (`idsan`, `tensan`, `loaisan`, `dongia`, `updatedDate`, `createdDate`) VALUES
('1', '1-A', '1', 250000, '2021-11-04 08:33:03', '2021-11-01 17:00:00'),
('10', '3-C', '3', 500000, '2021-11-04 08:33:03', '2021-11-01 17:00:00'),
('11', '3-D', '3', 500000, '2021-11-04 08:33:03', '2021-11-01 17:00:00'),
('12', '1-D', '1', 250000, '2021-11-04 08:33:03', '2021-11-04 08:33:03'),
('2', '1-B', '1', 250000, '2021-11-04 08:33:03', '2021-11-01 17:00:00'),
('3', '1-C', '1', 250000, '2021-11-04 08:33:03', '2021-11-01 17:00:00'),
('4', '2-A', '2', 300000, '2021-11-04 08:33:03', '2021-11-01 17:00:00'),
('5', '2-B', '2', 300000, '2021-11-04 08:33:03', '2021-11-01 17:00:00'),
('6', '2-C', '2', 300000, '2021-11-04 08:33:03', '2021-11-01 17:00:00'),
('7', '2-D', '2', 300000, '2021-11-04 08:33:03', '2021-11-01 17:00:00'),
('8', '3-A', '3', 500000, '2021-11-04 08:33:03', '2021-11-01 17:00:00'),
('9', '3-B', '3', 500000, '2021-11-04 08:33:03', '2021-11-01 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_taikhoan`
--

CREATE TABLE `tbl_taikhoan` (
  `id_taikhoan` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `idkh` char(10) DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL,
  `idrole` char(10) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT NULL,
  `updatedDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_taikhoan`
--

INSERT INTO `tbl_taikhoan` (`id_taikhoan`, `username`, `password`, `idkh`, `trangthai`, `idrole`, `createdDate`, `updatedDate`) VALUES
(0, 'nhanvien', '200133', '4', NULL, '2', NULL, NULL),
(1, 'hieu', '200133', '1', 1, '1', NULL, '2021-11-04 17:00:00'),
(2, 'khachhang', '200133', '2', 1, '3', NULL, '2021-01-13 17:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_dichvu`
--
ALTER TABLE `tbl_dichvu`
  ADD PRIMARY KEY (`iddichvu`);

--
-- Chỉ mục cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`idhoadon`);

--
-- Chỉ mục cho bảng `tbl_hoadondichvu`
--
ALTER TABLE `tbl_hoadondichvu`
  ADD KEY `fgkey_iddv_idx` (`iddichvu`),
  ADD KEY `fgkey_hoadon_idx` (`idhoadon`);

--
-- Chỉ mục cho bảng `tbl_loaisan`
--
ALTER TABLE `tbl_loaisan`
  ADD PRIMARY KEY (`idloaisan`);

--
-- Chỉ mục cho bảng `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`idrole`);

--
-- Chỉ mục cho bảng `tbl_san`
--
ALTER TABLE `tbl_san`
  ADD PRIMARY KEY (`idsan`);

--
-- Chỉ mục cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`),
  ADD KEY `idrole` (`idrole`),
  ADD KEY `idkh` (`idkh`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_hoadondichvu`
--
ALTER TABLE `tbl_hoadondichvu`
  ADD CONSTRAINT `fgkey_hoadon` FOREIGN KEY (`idhoadon`) REFERENCES `tbl_hoadon` (`idhoadon`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fgkey_iddv` FOREIGN KEY (`iddichvu`) REFERENCES `tbl_dichvu` (`iddichvu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD CONSTRAINT `tbl_taikhoan_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `tbl_role` (`idrole`),
  ADD CONSTRAINT `tbl_taikhoan_ibfk_2` FOREIGN KEY (`idkh`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
