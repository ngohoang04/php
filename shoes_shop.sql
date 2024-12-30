-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th12 23, 2024 lúc 05:30 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoes_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ProductId` int(11) NOT NULL,
  `SellerId` int(11) DEFAULT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ProductId`, `SellerId`, `ProductName`, `Description`, `Price`, `Quantity`, `CreatedDate`, `image_url`) VALUES
(6, 1, 'Sản phẩm 1', 'Mô tả sản phẩm 1', 100000.00, 10, '2024-12-22 10:57:56', 'images/product1.jpg'),
(8, 3, 'Sản phẩm 3', 'Mô tả sản phẩm 3', 150000.00, 7, '2024-12-22 10:57:56', 'images/product3.jpg'),
(9, 1, 'Sản phẩm 4', 'Mô tả sản phẩm 4', 250000.00, 3, '2024-12-22 10:57:56', 'images/product4.jpg'),
(21, 4, '34342', '1232132', 99999999.99, 2147483647, '2024-12-23 17:24:30', '../assets/img/fishtacos.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userrolerequests`
--

CREATE TABLE `userrolerequests` (
  `RequestId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `RequestDate` datetime DEFAULT current_timestamp(),
  `Status` enum('Pending','Approved','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Role` enum('User','Seller','Admin') DEFAULT 'User',
  `IsApproved` tinyint(1) DEFAULT 0,
  `Avatar` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `DateOfBirth` date DEFAULT '2000-01-01',
  `Gender` varchar(10) NOT NULL,
  `CartTotal` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`UserId`, `Username`, `Password`, `Email`, `Role`, `IsApproved`, `Avatar`, `Address`, `FullName`, `DateOfBirth`, `Gender`, `CartTotal`) VALUES
(1, 'anhankhe', '1231', 'admin@example.com', 'User', 0, NULL, 'Thái Bình', 'Ngô Trọng Hoàng', '2024-12-04', 'Nam', 0),
(3, 'Seller 2', 'password456', 'seller2@example.com', 'Seller', 0, NULL, NULL, NULL, '2000-01-01', '', 0),
(4, 'Seller 3', 'password789', 'seller3@example.com', 'Seller', 0, NULL, NULL, NULL, '2000-01-01', '', 0),
(5, 'anhankhe98', '123', 'admin@example.com', 'User', 0, NULL, 'Thái Bình', 'Ngô Trọng Hoàng', '0000-00-00', 'Nam', 0),
(6, 'admin_username', 'admin_password', 'admin_email@example.com', 'Admin', 1, 'default_avatar.jpg', 'Admin Address', 'Admin Name', '1990-01-01', 'Male', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `SellerId` (`SellerId`);

--
-- Chỉ mục cho bảng `userrolerequests`
--
ALTER TABLE `userrolerequests`
  ADD PRIMARY KEY (`RequestId`),
  ADD KEY `UserId` (`UserId`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `userrolerequests`
--
ALTER TABLE `userrolerequests`
  MODIFY `RequestId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`SellerId`) REFERENCES `users` (`UserId`);

--
-- Các ràng buộc cho bảng `userrolerequests`
--
ALTER TABLE `userrolerequests`
  ADD CONSTRAINT `userrolerequests_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
