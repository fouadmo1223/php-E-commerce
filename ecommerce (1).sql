-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 12:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'iphone'),
(2, 'samsung'),
(3, 'oppo'),
(4, 'zara'),
(5, 'nike'),
(6, 'addidas'),
(7, 'hp'),
(8, 'accer'),
(9, 'adidas'),
(10, 'Calvin Klein'),
(11, 'casio');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'mobile'),
(2, 'laptope'),
(3, 'clothes'),
(4, 'accessories'),
(5, 'cars'),
(6, 'wathces'),
(7, 'bags'),
(8, 'boats');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `string` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `string`, `value`) VALUES
(14, '9InomKI3', 40),
(15, 'zwnFd1Xl', 50),
(16, 'zGOsBUiC', 30);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`) VALUES
(7, 1, 16),
(10, 11, 27),
(19, 1, 15),
(23, 2, 21),
(24, 1, 24),
(25, 1, 18),
(26, 1, 21),
(27, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(18, 2, 14, 12),
(60, 11, 14, 1),
(61, 11, 15, 3),
(63, 11, 22, 3),
(64, 11, 21, 1),
(74, 1, 28, 5),
(75, 1, 23, 1),
(76, 1, 24, 1),
(77, 1, 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(1, 'owner'),
(2, 'admin'),
(3, 'user'),
(4, 'blocked');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `describtion` text NOT NULL,
  `count` int(1) NOT NULL,
  `brand` int(1) NOT NULL,
  `category` int(1) NOT NULL,
  `views` int(1) NOT NULL,
  `sale` int(11) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `describtion`, `count`, `brand`, `category`, `views`, `sale`, `new`, `rate`) VALUES
(14, 'jacket', 750, '837f91c65f33c0e34f90518e3671b97e.jpg', 'it\'s warmy and has nice design and tecketcher', 526, 4, 3, 0, 250, 0, 4),
(15, 'iphone7', 8000, '0894d9c1ae1403dc97afe8457a37febf.jpg', 'has i vey defficult os and expensive', 19, 1, 1, 0, 5000, 1, 4),
(16, 'samsung', 7500, '939df24282911a9dfc1dfbfd989c141f.jpg', 'vey easy to use and sheap\r\n', 199, 2, 1, 0, 0, 0, 5),
(17, 'T-shirs', 350, 'db095b8e6263780423dd3d7c8d600486.jpg', 'good looking t-shit and brand', 400, 4, 3, 0, 0, 1, 5),
(18, 'comp', 25000, '3af6b321fa4012edb26f142caa70edf8.jpg', 'don\'t have any thing to say', 13, 8, 2, 0, 0, 0, 4),
(21, 'clivin shirt', 1000, '9649c180624378e15016e1cb02eb642f.webp', 'Cotton Short Sleeve Stripe T-Shirt & Shorts Pyjama Set, Green/Blue/Multi', 77, 10, 3, 0, 0, 0, 5),
(22, 'clivin shirt', 750, '53a5c9a7ffdd52ca597e838065390737.webp', 'X LOONEY TUNES What\'s Up Doc? T-Shirt, Ecru/Green Red', 200, 10, 3, 0, 300, 0, 5),
(23, 'clivin chemese', 1500, 'fec18243f7a9bf4b7d45a74d6471ae07.webp', 'Men’s Crew Neck Kangaroo Pocket Cotton Blend Sweatshirt', 423, 10, 3, 0, 0, 0, 5),
(24, 'clivin chemese', 2500, '6b946126f125c0b54f991be6f938a63e.webp', 'Men\'s Lacoste Loose Fit Two-ply Piqué Sweatshirt', 499, 10, 3, 0, 0, 0, 5),
(25, 'casio watch', 6000, '7d6dfb8a644cda3277d48de15c765bc7.jpg', 'Michael Kors Casual Watch Unisex , Quartz Movement, Analog Display, Brown Brown Strap-Gage', 200, 11, 6, 0, 0, 0, 5),
(26, 'casio watch', 20000, '5238c325cb1f66195a47224174a572d3.jpg', 'Casio Men\'s Dial Stainless Steel Band Watch - MTP-1374D-1AVDF', 40, 11, 6, 0, 0, 0, 5),
(27, 'bag', 2000, 'a13aa270f62659d2ed6065c1bd796f07.jpg', 'BODI Men\'s Bag, Black - Wristlets', 500, 4, 7, 0, 0, 0, 5),
(28, 'adidas shoose', 3000, 'fd19dc92bd1d6fc3734f8bea1536b49a.jpeg', 'Adidas kaiser 5 team boots football/soccer shoes for men', 195, 9, 8, 0, 0, 0, 5),
(31, 't0shirt', 300, 'cb7935ece2247877ebc2ccd62fab53aa.jpg', 'nicccccccccccce', 100, 10, 3, 0, 0, 0, 5),
(32, 'shose', 200, '55f8198fdaadc594f67983ddfce16835.jpg', 'amaaaaazaaaaaainng', 150, 9, 8, 0, 199, 0, 5),
(33, 'clivin shirt', 123, '1d7e92f33aaf1b0e0c01c9df58aea455.jpeg', 'newwwwwwww', 122, 10, 3, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(2, 14, 'jacket2.jpg'),
(3, 14, '3558860b61f43cf6a900f7530a5020ab.jpeg'),
(4, 14, 'jacket4.jpg'),
(5, 14, 'da03c8da15dcf4e2a568adf0837d86da.jpeg'),
(6, 15, '14d6726454c32b8eb55580da7d027c74.jpeg'),
(7, 15, 'c128b54943f1b56c52a7203fa4d6e8b0.jpg'),
(8, 15, '62935bf21d4ff0541ed421db02d57622.jpeg'),
(9, 15, 'a95d05a6e79b3f5054de24105bfb877b.jpeg'),
(10, 25, '568bf2c37be9fe84f133f52cbc70884d.jpeg'),
(11, 25, '954ba129340915e4cbb73578c7bd8f60.jpeg'),
(12, 25, 'ae843b9f0b67518e629d46843dc9bc38.jpeg'),
(13, 25, '2e96c708a34696c17af645f02eba3dda.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `describition` varchar(255) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `describition`, `rate`) VALUES
(19, 1, 15, 'soooo goood', 4),
(20, 1, 15, 'sooooo gooood ', 5),
(21, 1, 15, 'not badd', 3),
(30, 2, 22, 'goood', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` int(1) NOT NULL,
  `beforeblocked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `gender`, `email`, `password`, `permission`, `beforeblocked`) VALUES
(1, 'fouad', 1, 'fouadddd@gmail.com', 'fouad123', 1, 1),
(2, 'fatma', 2, 'fatma@gmail.com', 'fatma123', 3, 3),
(4, 'Abdelkader', 1, 'abdo@abdo.com', 'abdo123', 2, 2),
(9, 'fouadd', 1, 'fm0850020@gmail.com', 'fouad123456', 3, 3),
(10, 'Fouash', 1, 'fm08500020@gmail.com', 'fouadmo20@@@', 4, 3),
(11, 'fouaddd', 1, 'fm08505020@gmail.com', '12345678910', 3, 3),
(12, 'sssssss', 1, 'fm085ff0020@gmail.com', 'fm0850020@gmail.com', 3, 3),
(13, 'fddddddddddddd', 1, 'fm085002ds0@gmail.com', 'fouadmo20@@', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `wait-list`
--

CREATE TABLE `wait-list` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL,
  `beforeblock` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `otp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wait-list`
--

INSERT INTO `wait-list` (`id`, `username`, `email`, `password`, `permission`, `beforeblock`, `gender`, `otp`) VALUES
(1, 'sddddddddd', 'fm08500sd20@gmail.com', 'fm085sd0020@gmail.com', 3, 3, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `brand` (`brand`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender` (`gender`),
  ADD KEY `permission` (`permission`),
  ADD KEY `beforelocked` (`beforeblocked`);

--
-- Indexes for table `wait-list`
--
ALTER TABLE `wait-list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission` (`permission`),
  ADD KEY `beforeblock` (`beforeblock`),
  ADD KEY `gender` (`gender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wait-list`
--
ALTER TABLE `wait-list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand`) REFERENCES `brand` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`permission`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`beforeblocked`) REFERENCES `permissions` (`id`);

--
-- Constraints for table `wait-list`
--
ALTER TABLE `wait-list`
  ADD CONSTRAINT `wait-list_ibfk_1` FOREIGN KEY (`permission`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `wait-list_ibfk_2` FOREIGN KEY (`beforeblock`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `wait-list_ibfk_3` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
