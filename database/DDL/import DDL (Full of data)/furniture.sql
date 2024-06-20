-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 02:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `type_id` int(11) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`, `fname`, `lname`, `telephone`, `type_id`, `last_login`, `created_at`, `modified_at`) VALUES
(1, 'arsanyosama@gmail.com', 'Arsto', '123456', 'Arsany', 'Osama', '01212006503', 1, '2024-06-17 21:10:58', '2024-06-17 21:10:58', '2024-06-17 21:10:58'),
(2, 'ahmedbekhit@gmail.com', 'B5eto', '123456', 'Ahmed', 'Bekhit', '201100573160', 8, '2024-06-17 21:21:28', '2024-06-17 21:21:28', '2024-06-17 21:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `admin_address`
--

CREATE TABLE `admin_address` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `address` varchar(80) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_address`
--

INSERT INTO `admin_address` (`id`, `admin_id`, `address`, `city`, `country`) VALUES
(1, 1, 'Faculty of Computers and Information, Alexandria National University', 'Alexandria', 'Egypt'),
(2, 2, 'Faculty of Computers and Information, Alexandria National University', 'Alexandria', 'Egypt');

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE `admin_type` (
  `id` int(11) NOT NULL,
  `admin_type` varchar(20) NOT NULL,
  `permissions` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`id`, `admin_type`, `permissions`, `created_at`, `modified_at`) VALUES
(1, 'admin1', 'ARAR', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(2, 'admin2', 'ARAx', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(3, 'admin3', 'ARxR', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(4, 'admin4', 'AxAR', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(5, 'admin5', 'xRAR', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(6, 'admin6', 'ARxx', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(7, 'admin7', 'AxxR', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(8, 'admin8', 'xxAR', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(9, 'admin9', 'xRAx', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(10, 'admin10', 'AxAx', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(11, 'admin11', 'xRxR', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(12, 'admin12', 'Axxx', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(13, 'admin13', 'xRxx', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(14, 'admin14', 'xxAx', '2024-06-17 21:01:43', '2024-06-17 21:01:43'),
(15, 'admin15', 'xxxR', '2024-06-17 21:01:43', '2024-06-17 21:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `modified_at`) VALUES
(1, 1, 12, 1, '2024-06-18 23:51:48', '2024-06-18 23:51:48'),
(2, 1, 1, 2, '2024-06-18 23:51:48', '2024-06-18 23:51:48'),
(3, 1, 20, 1, '2024-06-18 23:51:48', '2024-06-18 23:51:48'),
(4, 1, 13, 1, '2024-06-18 23:51:48', '2024-06-18 23:51:48'),
(5, 1, 9, 5, '2024-06-18 23:51:48', '2024-06-18 23:51:48'),
(6, 1, 4, 1, '2024-06-18 23:51:48', '2024-06-18 23:51:48'),
(7, 1, 16, 1, '2024-06-18 23:51:48', '2024-06-18 23:51:48'),
(8, 1, 5, 1, '2024-06-18 23:51:48', '2024-06-18 23:51:48'),
(9, 1, 3, 1, '2024-06-18 23:51:48', '2024-06-18 23:51:48'),
(10, 1, 17, 1, '2024-06-18 23:51:48', '2024-06-18 23:51:48'),
(11, 2, 11, 1, '2024-06-18 23:55:16', '2024-06-18 23:55:16'),
(12, 2, 6, 2, '2024-06-18 23:55:16', '2024-06-18 23:55:16'),
(13, 2, 18, 1, '2024-06-18 23:55:16', '2024-06-18 23:55:16'),
(14, 2, 15, 1, '2024-06-18 23:55:16', '2024-06-18 23:55:16'),
(15, 2, 10, 2, '2024-06-18 23:55:16', '2024-06-18 23:55:16'),
(16, 2, 7, 1, '2024-06-18 23:55:16', '2024-06-18 23:55:16'),
(17, 2, 14, 5, '2024-06-18 23:55:16', '2024-06-18 23:55:16'),
(18, 2, 8, 1, '2024-06-18 23:55:16', '2024-06-18 23:55:16'),
(19, 2, 2, 1, '2024-06-18 23:55:16', '2024-06-18 23:55:16'),
(20, 2, 19, 1, '2024-06-18 23:55:16', '2024-06-18 23:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_percent` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `inventory_id`, `name`, `price`, `discount`, `discount_percent`, `description`, `image`, `added_by`, `created_at`, `modified_at`) VALUES
(1, 1, 1, 'Black Chair', 500, 0, 0, 'Really comfortable!', 'uploads/6670c0d24df8a.jpg', 1, '2024-06-17 21:37:46', '2024-06-17 22:03:46'),
(2, 2, 2, 'Black Glass Table', 470, 10, 2, 'Its appearance speaks for itself!', 'uploads/6671ec3ea7baa.jpg', 1, '2024-06-17 23:06:38', '2024-06-18 19:21:18'),
(3, 2, 3, 'Wooden Table', 460, 10, 2, 'The meaning of strength and durability is present here!', 'uploads/desk.jpg', 1, '2024-06-17 23:08:43', '2024-06-17 23:08:43'),
(4, 10, 4, 'Living Room', 1515, 15, 1, 'Total comfort!', 'uploads/left.jpeg', 1, '2024-06-17 23:10:43', '2024-06-17 23:10:43'),
(5, 3, 5, 'White Sofa', 300, 0, 0, 'This sofa will stay with you for years and the sofa will never complain!', 'uploads/sofa.jpg', 1, '2024-06-17 23:12:55', '2024-06-17 23:12:55'),
(6, 1, 6, 'White Chair', 500, 0, 0, 'Elegance has a address, and congratulations, you have reached its address!', 'uploads/whitechair.avif', 1, '2024-06-17 23:19:05', '2024-06-17 23:19:05'),
(7, 10, 7, 'Children room', 1515, 15, 1, 'Let the children play in this room with peace of mind', 'uploads/PH188366.jpg', 1, '2024-06-18 19:54:08', '2024-06-18 19:54:08'),
(8, 3, 8, 'Grey Sofa', 500, 0, 0, 'The art piece in the room!', 'uploads/PE797254-crop001.jpg', 1, '2024-06-18 19:56:44', '2024-06-18 19:56:44'),
(9, 4, 9, 'Modern Lamp', 10, 0, 0, 'Very elegant for night lighting!', 'uploads/6671ea70baf86.jpg', 1, '2024-06-18 20:00:07', '2024-06-18 19:13:36'),
(10, 4, 10, 'Bedroom Lamp', 15, 0, 0, 'Its appearance is actually very attractive, which makes the bedroom more elegant, especially when it is turned on in the dark!', 'uploads/6533e6def47cdc6cd54deb17-small-table-lamp-for-bedroom-bedside.jpg', 1, '2024-06-18 20:24:21', '2024-06-18 20:24:21'),
(11, 5, 11, 'Normal Bed With Storage', 515, 0, 0, 'The storage feature is one of the important things in this product, which makes it distinct from other beds that makes you cannot exploit what is under the bed!', 'uploads/data_bed-with-storage_walken-bed-with-storage_updated_updated_honey_new-logo_2-750x650.jpg', 1, '2024-06-18 20:30:25', '2024-06-18 20:30:25'),
(12, 5, 12, 'Bunk Bed', 600, 15, 3, 'To make good use of space in the room!', 'uploads/bunk-bed-ideas-becki-owens-add-a-gold-rim-1651172789.jpg', 1, '2024-06-18 20:35:06', '2024-06-18 20:35:06'),
(13, 6, 13, 'White Wood Dresser', 480, 0, 0, 'Good materials for sturdy use!', 'uploads/White-4-Drawer-Wood-Dressers-for-Bedroom_d03cb6c9-65e2-47a1-aed6-2683e5fbb3c0.90bd18b381bef1a55b2d86daef4055c0.jpeg', 1, '2024-06-18 20:38:08', '2024-06-18 20:38:08'),
(14, 7, 14, 'Grey with White lines Rug', 50, 0, 0, 'Its beauty is its color and its elegance!', 'uploads/scandi-berber-g257-grey-cream-shaggy-rug-8.jpg', 1, '2024-06-18 20:40:37', '2024-06-18 20:40:37'),
(15, 6, 15, 'Fabric Tower Dresser', 490, 5, 1, 'Soft like the high fabric that represents the elegant black tower!', 'uploads/fabric-tower-best-dressers.jpg', 1, '2024-06-18 20:44:39', '2024-06-18 20:44:39'),
(16, 7, 16, 'Antique Rug', 35, 0, 0, 'For lovers of old fashion and lovers of old times', 'uploads/antique-persian-mohtasham-kashan-rug-71617-nazmiyal-1546x2048.jpg', 1, '2024-06-18 20:49:17', '2024-06-18 20:49:17'),
(17, 8, 17, 'Natural Wood Vases & Bowls', 40, 0, 0, 'Handicrafts like this are more professional!', 'uploads/coastal-bowls-vases-d7932-202237-0058-coastal-natural-wood-bowls-vases-z.jpg', 1, '2024-06-18 20:53:57', '2024-06-18 20:53:57'),
(18, 9, 18, 'Modern Wood Door', 600, 10, 2, 'Very modern and gives an important address to the interior of the house!', 'uploads/sd1.jpg', 1, '2024-06-18 20:57:16', '2024-06-18 20:57:16'),
(19, 8, 19, 'Modern Vases & Bowls', 50, 5, 10, 'Oh, the flowers that will be included in this product!', 'uploads/163423468-163423468-HC21062021_05-2100.jpg', 1, '2024-06-18 21:00:43', '2024-06-18 21:00:43'),
(20, 9, 20, 'Classic Wood Door', 650, 40, 6, 'Old but still elegant amidst all the current developments in the world of furniture!', 'uploads/1.jpg', 1, '2024-06-18 21:03:40', '2024-06-18 21:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `added_by`, `created_at`, `modified_at`) VALUES
(1, 'Chairs', 1, '2024-06-17 21:23:01', '2024-06-17 21:23:01'),
(2, 'Tables', 1, '2024-06-17 21:23:22', '2024-06-17 21:23:22'),
(3, 'Sofas', 1, '2024-06-17 21:24:17', '2024-06-17 21:27:19'),
(4, 'Lamps', 1, '2024-06-17 21:25:28', '2024-06-17 21:25:28'),
(5, 'Beds', 1, '2024-06-17 21:25:49', '2024-06-17 21:25:49'),
(6, 'Dressers', 1, '2024-06-17 21:26:17', '2024-06-17 21:26:17'),
(7, 'Rugs', 1, '2024-06-17 21:27:55', '2024-06-17 21:27:55'),
(8, 'vases and bowls', 1, '2024-06-17 21:28:59', '2024-06-17 21:28:59'),
(9, 'Doors', 1, '2024-06-17 21:33:30', '2024-06-17 21:33:30'),
(10, 'Rooms', 1, '2024-06-17 21:35:06', '2024-06-17 21:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory`
--

CREATE TABLE `product_inventory` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL CHECK (`quantity` >= 0),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_inventory`
--

INSERT INTO `product_inventory` (`id`, `quantity`, `created_at`, `modified_at`) VALUES
(1, 28, '2024-06-17 21:37:46', '2024-06-17 22:03:46'),
(2, 29, '2024-06-17 23:06:38', '2024-06-18 19:21:18'),
(3, 29, '2024-06-17 23:08:43', '2024-06-17 23:08:43'),
(4, 9, '2024-06-17 23:10:43', '2024-06-17 23:10:43'),
(5, 29, '2024-06-17 23:12:55', '2024-06-17 23:12:55'),
(6, 28, '2024-06-17 23:19:05', '2024-06-17 23:19:05'),
(7, 9, '2024-06-18 19:54:08', '2024-06-18 19:54:08'),
(8, 29, '2024-06-18 19:56:44', '2024-06-18 19:56:44'),
(9, 95, '2024-06-18 20:00:07', '2024-06-18 19:13:36'),
(10, 98, '2024-06-18 20:24:21', '2024-06-18 20:24:21'),
(11, 14, '2024-06-18 20:30:25', '2024-06-18 20:30:25'),
(12, 9, '2024-06-18 20:35:06', '2024-06-18 20:35:06'),
(13, 34, '2024-06-18 20:38:08', '2024-06-18 20:38:08'),
(14, 55, '2024-06-18 20:40:37', '2024-06-18 20:40:37'),
(15, 29, '2024-06-18 20:44:39', '2024-06-18 20:44:39'),
(16, 4, '2024-06-18 20:49:17', '2024-06-18 20:49:17'),
(17, 19, '2024-06-18 20:53:57', '2024-06-18 20:53:57'),
(18, 24, '2024-06-18 20:57:16', '2024-06-18 20:57:16'),
(19, 14, '2024-06-18 21:00:43', '2024-06-18 21:00:43'),
(20, 9, '2024-06-18 21:03:40', '2024-06-18 21:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `fname`, `lname`, `telephone`, `created_at`, `modified_at`) VALUES
(1, 'markmagdy@gmail.com', 'Marko', '123456', 'Mark', 'Magdy', '201210480491', '2024-06-17 21:03:03', '2024-06-17 21:03:03'),
(2, 'ahmedelseht@gmail.com', 'S7to', '123456', 'Ahmed', 'Elseht', '201118449729', '2024-06-17 21:06:08', '2024-06-17 21:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(80) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `address`, `city`, `country`, `created_at`, `modified_at`) VALUES
(1, 1, 'Faculty of Computers and Information, Alexandria National University', 'Alexandria', 'Egypt', '2024-06-17 21:03:03', '2024-06-17 21:03:03'),
(2, 2, 'Faculty of Computers and Information, Alexandria National University', 'Alexandria', 'Egypt', '2024-06-17 21:06:08', '2024-06-17 21:06:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `admin_index` (`id`),
  ADD KEY `admin_type_id_admin_type` (`type_id`);

--
-- Indexes for table `admin_address`
--
ALTER TABLE `admin_address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_address_index` (`id`),
  ADD KEY `admin_address_admin_id_admin` (`admin_id`);

--
-- Indexes for table `admin_type`
--
ALTER TABLE `admin_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_item_index` (`id`),
  ADD KEY `order_item_order_id_user` (`user_id`),
  ADD KEY `order_item_product_id_product` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `product_index` (`id`),
  ADD KEY `product_category_id_category` (`category_id`),
  ADD KEY `product_inventory_id_product_inventory` (`inventory_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `product_category_index` (`id`),
  ADD KEY `product_category_id_admin` (`added_by`);

--
-- Indexes for table `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_inventory_index` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_index` (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_address_index` (`id`),
  ADD KEY `user_address_user_id_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_address`
--
ALTER TABLE `admin_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_type`
--
ALTER TABLE `admin_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_type_id_admin_type` FOREIGN KEY (`type_id`) REFERENCES `admin_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_address`
--
ALTER TABLE `admin_address`
  ADD CONSTRAINT `admin_address_admin_id_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_order_id_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_product_id_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_category` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_inventory_id_product_inventory` FOREIGN KEY (`inventory_id`) REFERENCES `product_inventory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_id_admin` FOREIGN KEY (`added_by`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_user_id_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
