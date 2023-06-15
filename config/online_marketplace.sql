-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2023-06-15 14:59:14
-- 服务器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `online_marketplace`
--

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `parent_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `parent_category_id`) VALUES
(0, 'all', 0),
(1, 'electronics', 0),
(2, 'clothing', 0),
(3, 'books', 0);

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `order_date` int(11) NOT NULL,
  `shipping_address` varchar(250) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `product_id`, `quantity`, `unit_price`, `order_date`, `shipping_address`, `payment_method`, `order_status`) VALUES
(1, 1, 1, 3, 50, 1686832974, 'Wehlistraße 35-43 6  602', 1, 0),
(2, 2, 2, 2, 20, 1686833364, 'Wehlistraße 35-43 6  602', 2, 0),
(3, 3, 3, 6, 10, 1686833409, 'Wehlistraße 35-43 6  602', 3, 0),
(4, 4, 4, 1, 50, 1686833460, 'Wehlistraße 35-43 6  602', 2, 0),
(5, 5, 5, 4, 50, 1686833510, 'Wehlistraße 39700 6 52', 3, 0),
(6, 6, 6, 10, 20, 1686833560, 'Wehlistraße 66 9 91001', 1, 0),
(7, 7, 8, 4, 10, 1686833770, 'Wehlistraße 35-43 8 008', 1, 0),
(8, 7, 8, 1, 10, 1686833788, 'Wehlistraße 35-43 8 008', 3, 0),
(9, 7, 8, 4, 10, 1686833800, 'Wehlistraße 35-43 8 008', 2, 0),
(10, 1, 4, 4, 50, 1686833867, 'Wehlistraße 35-43 6  602', 1, 0),
(11, 1, 4, 20, 50, 1686833877, 'Wehlistraße 35-43 6  602', 2, 0),
(12, 1, 5, 1, 50, 1686833898, 'Wehlistraße 35-43 6  602', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(999) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_image`, `product_price`, `category_id`) VALUES
(1, 'Headphones', 'These headphones are a high-quality audio device designed to provide excellent sound quality and a comfortable wearing experience. It uses advanced audio technology with superior audio resolution and clarity to provide users with an immersive music experience. The headphones are beautifully designed, lightweight and portable for outdoor, travel or everyday use. It comes with comfortable earbuds and adjustable headband to ensure comfort during extended wear.', 'res/img/Headphones.jpg', 50, 1),
(2, 'T-shirt', 'This T-shirt is a stylish and comfortable clothing choice. It is made from high-quality materials to ensure comfort and durability.The T-shirt has a clean and classic design that is suitable for a variety of occasions and styles. It has a comfortable fit and a form-fitting silhouette that showcases a stylish silhouette. This T-shirt is made of soft fabric to give you a comfortable wearing experience. It also has excellent color stability, and the colors remain vibrant and unfaded even after multiple washes.', 'res/img/T-shirt.jpg', 20, 2),
(3, 'Book', 'This is an enthralling book that takes the reader into a world of fantasy and thrill. The storyline is gripping, full of suspense and unexpected twists and turns. Each page is filled with incredible adventure and delicate emotional descriptions that will keep the reader engaged. The author skillfully weaves a story full of puzzles and mysteries, and the intriguing plot takes the reader on a mysterious journey. This book is more than a form of entertainment, it is an opportunity to inspire thought and exploration.', 'res/img/Book.jpg', 10, 3),
(4, 'Headphones', 'These headphones are a high-quality audio device designed to provide excellent sound quality and a comfortable wearing experience. It uses advanced audio technology with superior audio resolution and clarity to provide users with an immersive music experience. The headphones are beautifully designed, lightweight and portable for outdoor, travel or everyday use. It comes with comfortable earbuds and adjustable headband to ensure comfort during extended wear.', 'res/img/Headphones1.jpg', 50, 1),
(5, 'Headphones', 'These headphones are a high-quality audio device designed to provide excellent sound quality and a comfortable wearing experience. It uses advanced audio technology with superior audio resolution and clarity to provide users with an immersive music experience. The headphones are beautifully designed, lightweight and portable for outdoor, travel or everyday use. It comes with comfortable earbuds and adjustable headband to ensure comfort during extended wear.', 'res/img/Headphones2.jpg', 50, 1),
(6, 'T-shirt', 'This T-shirt is a stylish and comfortable clothing choice. It is made from high-quality materials to ensure comfort and durability.The T-shirt has a clean and classic design that is suitable for a variety of occasions and styles. It has a comfortable fit and a form-fitting silhouette that showcases a stylish silhouette. This T-shirt is made of soft fabric to give you a comfortable wearing experience. It also has excellent color stability, and the colors remain vibrant and unfaded even after multiple washes.', 'res/img/T-shirt1.jpg', 20, 2),
(7, 'T-shirt', 'This T-shirt is a stylish and comfortable clothing choice. It is made from high-quality materials to ensure comfort and durability.The T-shirt has a clean and classic design that is suitable for a variety of occasions and styles. It has a comfortable fit and a form-fitting silhouette that showcases a stylish silhouette. This T-shirt is made of soft fabric to give you a comfortable wearing experience. It also has excellent color stability, and the colors remain vibrant and unfaded even after multiple washes.', 'res/img/T-shirt2.jpg', 20, 2),
(8, 'Book', 'This is an enthralling book that takes the reader into a world of fantasy and thrill. The storyline is gripping, full of suspense and unexpected twists and turns. Each page is filled with incredible adventure and delicate emotional descriptions that will keep the reader engaged. The author skillfully weaves a story full of puzzles and mysteries, and the intriguing plot takes the reader on a mysterious journey. This book is more than a form of entertainment, it is an opportunity to inspire thought and exploration.', 'res/img/Book1.jpg', 10, 3),
(9, 'Book', 'This is an enthralling book that takes the reader into a world of fantasy and thrill. The storyline is gripping, full of suspense and unexpected twists and turns. Each page is filled with incredible adventure and delicate emotional descriptions that will keep the reader engaged. The author skillfully weaves a story full of puzzles and mysteries, and the intriguing plot takes the reader on a mysterious journey. This book is more than a form of entertainment, it is an opportunity to inspire thought and exploration.', 'res/img/Book2.jpg', 10, 3);

-- --------------------------------------------------------

--
-- 表的结构 `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `store_logo` varchar(50) NOT NULL,
  `store_description` varchar(9999) NOT NULL,
  `store_contact` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 转存表中的数据 `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_logo`, `store_description`, `store_contact`) VALUES
(1, 'Online Marketplace', 'res//img//logo.png', 'Welcome to our online marketplace! Our platform is designed to help sellers sell their products and services online. For sellers who lack the resources and expertise to build and manage their own e-commerce website, we offer an easy-to-use interface to build and manage their merchandise while providing customers with a convenient and user-friendly shopping experience. On our platform, you can find a wide variety of products and services, from fashion apparel to home furnishings, electronics to gourmet delicacies. Whether you are a buyer or a seller, we are committed to providing you with an enjoyable and convenient online shopping and selling experience. Join our online marketplace to discover more business opportunities and expand your business!', '+1-800-123-4567 info@examplemarketplace.com');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `state` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `shipping_address`, `admin`, `state`) VALUES
(1, 'admin@admin.com', '$2y$10$.NFCLtZWBMt7KzlsI17TsOt1.QDyPJ1j4gibbbTFA9jsvh7vKngMK', 'admin', 'admin', 'admin', 1, 1),
(2, 'test01@test.com', '$2y$10$B6giZKiyMS1rxSdnETFXOezwqw5dheJy1uHjFuw6v2VO3sJ0v/g3S', 'test01', 'test01', 'test01', 1, 1),
(3, 'test02@test.com', '$2y$10$gOltpPKuj.V0.OZkKW8nJurR6OSLzKZl.oeufSvoB2fwbWKeWytdy', 'test02', 'test02', 'test02', 0, 1),
(4, 'test03@test.com', '$2y$10$wTCi/fznjoXpeSsJ9TujUu.F1LDEnlAL7yPi.pHPD6qAnNvZYUJaS', 'test03', 'test03', 'test03', 0, 0),
(5, 'myshop@test.at', '$2y$10$yQSpZvg0RJ7.gdRRpMMBb.sCkEVvVSKkV/1PwotRhGFwd19zvgB26', 'my', 'shop', 'my shop', 0, 1),
(6, 'market@shop.cn', '$2y$10$lbANzHQ9m58hAq4dvsf3S.BgFWlLowcX3SkXRvUOTIAyO2mzsBzze', 'market', 'market', 'market', 0, 1),
(7, 'peter@icloud.com', '$2y$10$PzoYMYCulrNwID.5O/SFsO.1fqME12iTxYQKYAtNo1eCC70teK..q', 'peter', 'G', 'Wehlistraße 35-43 5 530', 0, 1);

--
-- 转储表的索引
--

--
-- 表的索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- 表的索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- 表的索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- 表的索引 `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
