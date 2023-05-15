-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2023-05-15 12:12:35
-- 服务器版本： 10.4.27-MariaDB
-- PHP 版本： 8.1.12

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
-- 表的结构 `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `parent_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` int(11) NOT NULL,
  `shipping_address` varchar(250) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_image`, `product_price`, `category_id`) VALUES
(1, 'Smart Watch X1', 'Smart Watch X1 is a powerful smart watch with multiple functions such as health monitoring, notification reminders, and exercise tracking.', '', 199, 0),
(2, 'Wireless Headphones Z2', 'Wireless Earphone Z2 is a high-fidelity sound quality wireless earphone, using the latest Bluetooth technology, allowing you to enjoy music anywhere.', '', 149, 0),
(3, 'Sports Windbreaker', 'Sports Windbreaker is a lightweight, windproof and waterproof jacket. Made of high-quality fabric, it\'s breathable and comfortable for outdoor sports and everyday wear.', '', 79, 0),
(4, 'Business Shirt', 'Business Shirt is a classic and elegant men\'s shirt for formal occasions and business events.', '', 59, 0),
(5, 'A Beginner\'s Guide to Psychology', 'An Introductory Guide to Psychology is an easy-to-understand introductory book on psychology, which aims to help readers understand the basic principles and concepts of psychology.', '', 20, 0),
(6, 'Science Fiction Collection \"Mystery of the Future\"', 'Science fiction collection \"Mysteries of the Future\" is a collection of short science fiction stories created by many well-known writers.', '', 15, 0);

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
  `payment_method` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 转储表的索引
--

--
-- 表的索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

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
-- 表的索引 `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

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
-- 使用表AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 限制导出的表
--

--
-- 限制表 `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
