-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 18, 2024 lúc 07:28 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dn1_webshoes_nike`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `created_at`, `updated_at`) VALUES
(30, 'Sports', 'Giày thể thao (sports shoes) được thiết kế chuyên dụng để hỗ trợ tối ưu cho các hoạt động vận động mạnh như chạy bộ, bóng đá, bóng rổ, và các môn thể thao khác.', '2024-11-14 17:48:19', '2024-11-14 17:48:19'),
(31, 'Giày thể thao', 'Phần đế: Được làm từ cao su hoặc các chất liệu chịu lực tốt, có độ bám cao giúp tránh trơn trượt, đồng thời có khả năng giảm sốc để bảo vệ bàn chân. Đế có thể được thiết kế với các gờ hoặc rãnh nhằm tạo độ ma sát tốt hơn trên mặt sân.', '2024-11-15 15:20:05', '2024-11-15 15:20:05'),
(38, 'Giày bóng rổ', 'Giày sneaker là loại giày thời trang kết hợp sự thoải mái và phong cách, rất phổ biến trong các hoạt động hằng ngày và thể thao. ', '2024-11-15 15:20:53', '2024-11-15 15:20:53'),
(39, 'Giày lười ', 'Giày sneaker có nhiều kiểu dáng khác nhau, từ cổ thấp (low-top), cổ trung (mid-top) đến cổ cao (high-top), phù hợp với từng nhu cầu và sở thích của người dùng. Những đôi sneaker cổ thấp thường gọn nhẹ', '2024-11-15 15:21:13', '2024-11-15 15:21:13'),
(40, 'Giày Sneaker', 'Thiết kế: Giày thể thao có đa dạng mẫu mã và màu sắc, phù hợp với phong cách thời trang cũng như nhu cầu của từng môn thể thao. Nhiều mẫu còn tích hợp công nghệ theo dõi bước chân hoặc nhịp tim, hỗ trợ trong việc rèn luyện và cải thiện hiệu suất thể thao.', '2024-11-14 17:03:43', '2024-11-14 17:03:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','Shipped','Delivered','Cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` enum('Credit Card','Paypal','Cash on Delivery') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) DEFAULT '0.00',
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `price` decimal(10,2) NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `material` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stock_quantity` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_image`, `description`, `price`, `brand`, `model`, `color`, `size`, `material`, `stock_quantity`, `created_at`, `updated_at`) VALUES
(3, 31, 'Giay nike air 1', 'product/1731868724-Screenshot_2024-10-09_181151-removebg-preview.png', 'dsfsdfsdf', 25.00, 'BIKE', '150', 'Nau', '', 'vai', 46, '2024-11-17 18:38:44', '2024-11-17 18:38:44'),
(6, 38, 'dddddddddddddddddddddddddddddddddddd', NULL, 'rtyui', 21.00, 'nike', 'jkh', 'nau', '50', 'vsi', 17, '2024-11-16 05:44:03', '2024-11-16 05:44:03'),
(7, 30, '34567', NULL, 'hfhjhg', 27.00, 'nike', 'jkh', 'nau', '50', 'vsi', 24, '2024-11-16 06:35:28', '2024-11-16 06:35:28'),
(8, 31, '155555', 'product/1731865474-nen-mua-dien-thoai-nao-thumb.jpeg', 'hjgjh', 11.00, 'nike', 'jkh', 'nau', '50', 'hjg', 651, '2024-11-17 17:44:34', '2024-11-17 17:44:34'),
(9, 31, '432', 'products/1731743839-Screenshot_2024-11-07_020714-removebg-preview.png', 'fsd', 25.00, 'BIKE', '150', 'Nau', '42', 'fsdfs', 4545, '2024-11-16 07:57:19', '2024-11-16 07:57:19'),
(10, 38, 'Giay nike air 1', 'product/1731864493-nen-mua-dien-thoai-nao-thumb.jpeg', 'ffsdfsdf', 555550.00, 'BIKE', '1505', 'Nau', '42', 'vai', 23, '2024-11-17 17:28:13', '2024-11-17 17:28:13'),
(11, 30, 'ewrwerew', 'products/1731862839-Screenshot 2024-11-08 105239.png', 'ưerwerwerw', 4.00, '', '150', 'Nau', '42', 'vai', 17, '2024-11-17 17:00:39', '2024-11-17 17:00:39'),
(12, 31, 'Giay nike air 1', 'products/1731863526-Screenshot_2024-11-07_020714-removebg-preview.png', 'rewrwerwerw', 20.00, 'BIKE', '150', 'Nau', '42', 'Vải', 21, '2024-11-17 17:12:06', '2024-11-17 17:12:06'),
(13, 31, 'Giay nike air 1', 'product/1731868302-Screenshot_2024-11-07_020714-removebg-preview.png', '5hhhhh', 25.00, 'kekekek', '150', 'Nau', '42', 'Vải', 20, '2024-11-17 18:31:42', '2024-11-17 18:31:42'),
(14, 31, 'Giay nike air 1', 'products/1731866491-Screenshot_2024-11-07_020714-removebg-preview.png', 'hgfhfgh', 28.00, 'BIKE', '150', 'Nau', '42', 'Vải', 545, '2024-11-17 18:01:31', '2024-11-17 18:01:31'),
(15, 31, 'Giay nike air 1', 'products/1731868275-nen-mua-dien-thoai-nao-thumb.jpeg', '67576567', 16.00, 'BIKE', '150', 'Nau', '42', 'ưerwerewr', 14, '2024-11-17 18:31:15', '2024-11-17 18:31:15'),
(16, 39, 'Giay nike air 1', 'products/1731914240-pexels-christian-heitz-285904-842711.jpg', 'hhjh', 13.00, 'BIKE', '150', 'Nau', '', 'Vải', 3, '2024-11-18 07:17:20', '2024-11-18 07:17:20'),
(17, 39, 'Giay nike air 1', 'products/1731914790-Screenshot_2024-11-07_031839-removebg-preview (1).png', 'jgj', 546546.00, 'BIKE', '150', 'Nau', '42', 'Vải', 564, '2024-11-18 07:26:30', '2024-11-18 07:26:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `review_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--


-- Cấu trúc cho bảng `interface`



-- Cấu trúc cho bảng `interface`
CREATE TABLE IF NOT EXISTS `interface` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` TEXT COLLATE utf8mb4_unicode_ci NOT NULL,
    `image` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
    `user_id` INT DEFAULT NULL,
    `status` ENUM('Active', 'Inactive', 'Archived') DEFAULT 'Active',
    `type` VARCHAR(100) NOT NULL,
    CONSTRAINT fk_user_id FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
);

-- Thêm chỉ mục cho các trường `name` và `created_at` để cải thiện hiệu suất truy vấn
CREATE INDEX idx_name ON interface(name);
CREATE INDEX idx_created_at ON interface(created_at);

-- 
-- 
-- 
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
