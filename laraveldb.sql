-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 08:19 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(10, '2021_05_15_080853_create_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `item_id`, `name`, `price`, `description`, `image`, `gender`, `size`, `color`, `created_date`, `modify_date`) VALUES
(2, 'QWZ5671', 'Cardigan Sweater', '41.95', 'Cardigan Sweater', '20210522040820.jpg', 'Women\'s', 'Medium', 'Green,Blue', '2021-05-15 08:58:26', '2021-05-22 04:14:56'),
(3, 'QWZ5671', 'Cardigan Sweater', '41.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Small', 'Red,Navy,Burgundy', '2021-05-15 08:58:26', NULL),
(4, 'QWZ5698', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(5, 'QWZ5698', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(6, 'QWZ5697', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(7, 'QWZ5697', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(8, 'QWZ5696', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(9, 'QWZ5696', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(10, 'QWZ5695', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(11, 'QWZ5695', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(12, 'QWZ5694', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(13, 'QWZ5694', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(14, 'QWZ5693', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(15, 'QWZ5693', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(16, 'QWZ5690', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(17, 'QWZ5690', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(18, 'QWZ5689', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(19, 'QWZ5689', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(20, 'QWZ5689', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Small', 'Red,Navy,Burgundy', '2021-05-15 08:58:26', NULL),
(21, 'QWZ5688', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(22, 'QWZ5688', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(23, 'QWZ5687', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(24, 'QWZ5687', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(25, 'QWZ5686', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(26, 'QWZ5686', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(27, 'QWZ5685', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(28, 'QWZ5685', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(29, 'QWZ5685', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Small', 'Red,Navy,Burgundy', '2021-05-15 08:58:26', NULL),
(30, 'QWZ5684', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(31, 'QWZ5684', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(32, 'QWZ5684', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Small', 'Red,Navy,Burgundy', '2021-05-15 08:58:26', NULL),
(33, 'QWZ5683', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(34, 'QWZ5683', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(35, 'QWZ5682', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(36, 'QWZ5682', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(37, 'QWZ5682', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Small', 'Red,Navy,Burgundy', '2021-05-15 08:58:26', NULL),
(38, 'QWZ5691', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(39, 'QWZ5691', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(40, 'QWZ5681', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(41, 'QWZ5681', 'Cardigan Sweater', '39.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Medium', 'Red,Burgundy', '2021-05-15 08:58:26', NULL),
(42, 'RRX9859', 'Cardigan Sweater', '41.50', 'Cardigan Sweater', 'cardigan.jpg', 'Women\'s', 'Large', 'Navy,Black', '2021-05-15 08:58:26', NULL),
(43, 'RRX9859', 'Cardigan Sweater', '41.50', 'Cardigan Sweater', 'cardigan.jpg', 'Women\'s', 'Medium', 'Red,Navy,Burgundy,Black', '2021-05-15 08:58:26', NULL),
(44, 'RRX9859', 'Cardigan Sweater', '41.50', 'Cardigan Sweater', 'cardigan.jpg', 'Women\'s', 'Small', 'Red,Navy,Burgundy', '2021-05-15 08:58:26', NULL),
(45, 'RRX9859', 'Cardigan Sweater', '41.50', 'Cardigan Sweater', 'cardigan.jpg', 'Women\'s', 'Extra Large', 'Burgundy,Black', '2021-05-15 08:58:26', NULL),
(46, 'QWZ5671', 'Cardigan Sweater', '41.95', 'Cardigan Sweater', 'cardigan.jpg', 'Men\'s', 'Large', 'Red,Burgundy', '2021-05-15 11:13:57', NULL),
(47, 'BSP7524', 'Demo product', '63.21', 'Demo product Winter collection', '20210522055727.jpg', 'Man\'s', 'Small', 'Red,Green', '2021-05-22 05:57:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raj', 'raj@test.com', NULL, '$2y$10$kzu37mvLKTFuyUsU8DtHzOWybyZYIRvTL8l39drN.nBBNCWoHVptS', NULL, '2021-05-10 20:04:41', '2021-05-10 20:04:41'),
(2, 'Rajdev', 'rajdev@gmail.com', NULL, '$2y$10$EZ7n5dUeJBPZg.nVcdR3wefAPdfNWKgb8aql0BBbzJXpUb54PN/n.', NULL, '2021-05-15 05:49:36', '2021-05-15 05:49:36'),
(3, 'Raj', 'developer1@gmail.com', NULL, '$2y$10$0FB8wBPZ14xwGYCke8BLg.eoxYn/RbjrOZAiTpTW67j2Rr6SsLHtG', NULL, '2021-05-22 00:43:11', '2021-05-22 00:43:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
