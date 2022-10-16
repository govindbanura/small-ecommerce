-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2022 at 10:02 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `small_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Footwear', 'Shoes', 'cat-3.jpg', '2022-10-15 07:18:07', '2022-10-15 07:18:07'),
(2, 'Camera', 'camera', 'cat-2.jpg', '2022-10-15 07:18:07', '2022-10-15 07:18:07'),
(3, 'Cosmetics', 'cosmetics', 'cat-4.jpg', '2022-10-15 07:18:07', '2022-10-15 07:18:07'),
(4, 'Clothing', 'cloths', 'cat-1.jpg', '2022-10-15 07:18:07', '2022-10-15 07:18:07'),
(5, 'Furniture', 'furniture', 'cat-5.jpg', '2022-10-15 07:18:07', '2022-10-15 07:18:07'),
(6, 'Home & Decor', 'Home & Decor', 'cat-6.jpg', '2022-10-15 07:18:07', '2022-10-15 07:18:07'),
(7, 'Appliances', 'Appliances', 'cat-7.jpg', '2022-10-15 07:18:07', '2022-10-15 07:18:07'),
(8, 'Mobiles', 'mobiles', 'cat-8.jpg', '2022-10-15 07:18:07', '2022-10-15 07:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_15_112052_create_categories_table', 1),
(6, '2022_10_15_112219_create_products_table', 1),
(7, '2022_10_16_060542_create_carts_table', 2),
(9, '2022_10_16_105217_create_order_items_table', 3),
(12, '2022_10_16_092917_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tracking_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staus` tinyint(4) NOT NULL DEFAULT '0',
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_tracking_id_unique` (`tracking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_id`, `user_id`, `fname`, `lname`, `email`, `mobile`, `address1`, `address2`, `country`, `city`, `state`, `pincode`, `staus`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 'ORD3462754151', '1', 'Govind', 'banura', 'govindbanura2310@gmail.com', '7086581398', 'aaa', 'aa', 'aaa', 'aaa', 'aaaa', '123456', 0, '2001', '2022-10-16 09:05:12', '2022-10-16 09:05:12'),
(2, 'ORD7151166334', '1', 'Govind', 'banura', 'govindbanura2310@gmail.com', '7086581398', 'Bilpar Road', NULL, 'India', 'Silchar', 'Assam', '788001', 0, '976', '2022-10-16 10:07:06', '2022-10-16 10:07:06'),
(3, 'ORD9217038493', '2', 'User', 'UserLast', 'user@gmail.com', '9876543210', '123 lane', NULL, 'India', 'Mumbai', 'Maharastra', '123456', 0, '9357', '2022-10-16 10:58:06', '2022-10-16 10:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_qty`, `product_price`, `created_at`, `updated_at`) VALUES
(10, '1', '8', '3', '152.00', '2022-10-16 09:05:12', '2022-10-16 09:05:12'),
(11, '1', '9', '4', '75.00', '2022-10-16 09:05:12', '2022-10-16 09:05:12'),
(12, '1', '3', '5', '249.00', '2022-10-16 09:05:12', '2022-10-16 09:05:12'),
(13, '2', '7', '2', '483.00', '2022-10-16 10:07:06', '2022-10-16 10:07:06'),
(14, '3', '6', '1', '348.00', '2022-10-16 10:58:06', '2022-10-16 10:58:06'),
(15, '3', '16', '1', '8999.00', '2022-10-16 10:58:06', '2022-10-16 10:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `stock_status` enum('instock','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '10',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `stock_status`, `quantity`, `image`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Leather Formal Shoes', 'corporis-beatae-est-iure', 'Deserunt minus rem nobis illum quod esse rerum qui. Aspernatur neque id earum veritatis. Debitis ut autem suscipit consequatur itaque impedit cumque. Et ut aut illo omnis.', 'Libero magni maxime sit vel rerum natus illum libero. Dolor eum id temporibus sit. Cupiditate praesentium repellat ut voluptatem earum reprehenderit eaque sit. Molestiae quisquam voluptas recusandae sunt. Quam pariatur modi ipsum saepe. Architecto consequatur qui consequatur commodi dolores rem.', '103.00', '99.00', 'instock', 358, 'product-6.jpg', NULL, 1, '2022-10-15 07:18:07', '2022-10-15 07:18:07'),
(2, 'Face Cream Combo', 'saepe-vel-qui-ut', 'Officiis ea architecto error est dolores molestias. Dolorum aut distinctio assumenda perspiciatis provident accusamus consequatur. Consequatur hic vel iusto pariatur.', 'Tempore ut quo blanditiis odit. Aut voluptates omnis non vel. Corrupti quos modi modi quia est. Nobis quod qui cum non ratione perspiciatis id. Necessitatibus eius suscipit recusandae similique eum et eligendi. Et maxime in consectetur est deserunt consectetur est. Sint nihil sunt dicta eligendi in qui illo. Eius aut vel soluta aspernatur tenetur eius vel. Rerum deserunt reiciendis quisquam iste a. Quo rerum eum quaerat sit. Ad veritatis illo hic impedit nisi in.', '999.00', '899.00', 'instock', 184, 'cat-4.jpg', NULL, 3, '2022-10-15 07:18:07', '2022-10-15 07:18:07'),
(3, 'Leather Shoes', 'excepturi-sit-iusto-dolore', 'Fuga dolor dolore reiciendis. Dolor officiis itaque laborum cupiditate. Est non voluptatum mollitia dolor ipsum dignissimos.', 'Nihil debitis eius temporibus ex optio eum eum. Consequatur minima iure ab. Id rem ipsam laborum enim aperiam molestias. Dolor sunt pariatur officia vitae ipsam non tenetur. Molestiae facere laborum occaecati autem. Illo occaecati rerum et blanditiis dolorem. Asperiores facilis autem atque aliquam et. Pariatur et assumenda numquam dolorem. Beatae maiores eligendi aut sequi quo.', '279.00', '249.00', 'instock', 288, 'cat-3.jpg', NULL, 1, '2022-10-15 07:18:08', '2022-10-15 07:18:08'),
(4, 'Men\'s T-Shirt', 'optio-ad-ut-non', 'Repellendus ut officia sed. Deserunt dolores et cum vel. Eos quasi est vero molestias ex odio. Qui voluptas dolores accusamus ut tempora est voluptatem. Dolorum cumque harum cupiditate earum.', 'Hic adipisci sunt ex sapiente. Natus perspiciatis nulla laudantium ullam blanditiis adipisci architecto. Nostrum nostrum aut perspiciatis totam ex. Et nisi dolores aut velit commodi. Exercitationem blanditiis et adipisci et. Voluptatem quia dicta in sint eligendi est. Adipisci labore ratione vero aut et quod aut. Debitis et et et nostrum sunt.', '227.00', NULL, 'instock', 478, 'product-2.jpg', NULL, 4, '2022-10-15 07:18:08', '2022-10-15 07:18:08'),
(5, 'Stylistico Women\'s Top', 'Stylistico Women\'s Top', 'Stylistico Women\'s Top Stylistico Women\'s Top', 'Wash Care: Machine Wash\r\nFabric Type: Poly Cotton\r\nPattern Name: Striped; Closure Type: Pull On\r\nSleeve Type: 3/4 Sleeve; Collar Style: Mandarin; Fit Type: Regular Fit\r\nOccasion Type: Casual; Pattern Type: Floral; Material Type: Polycotton; Material Composition: 80% Cotton, 20% Polyester', '599.00', NULL, 'instock', 475, 'cat-1.jpg', NULL, 4, '2022-10-15 07:18:08', '2022-10-15 07:18:08'),
(6, 'Sports Shoes', 'asperiores-praesentium-aspernatur-quam', 'Deserunt velit accusantium quibusdam in iusto laudantium laborum. Vero amet molestiae eligendi nulla rem dolorem. Incidunt harum voluptas blanditiis vel.', 'Iusto aut et ad animi quod possimus necessitatibus. Et est nesciunt perferendis rerum. Ut dolore voluptatem blanditiis eius. Ratione reiciendis ab et quasi consequatur. Quod facilis eligendi eos corporis et in occaecati nisi. Eaque voluptas et est. Consequatur blanditiis non rem molestiae aliquam. Quo error dicta est minus ut. Accusamus aliquam sit ducimus facere.', '348.00', NULL, 'instock', 167, 'product-4.jpg', NULL, 1, '2022-10-15 07:18:08', '2022-10-15 07:18:08'),
(7, 'Chair With Wheels', 'qui-soluta-fugit-quis', 'At veritatis cumque inventore totam. Ut vero magnam magni dolore quibusdam quia debitis. Iste et possimus repellat ducimus. Alias ducimus labore iste quis.', 'Tenetur illum debitis aut eum. Sed unde cum ut qui aperiam. Ut et aperiam necessitatibus non qui voluptas. Labore a labore asperiores qui est recusandae sint quia. Officia voluptatem fugit quia ab aut qui dicta. Ipsum quis optio occaecati laboriosam enim nemo. Dolorem ratione enim culpa rerum aliquam eos voluptatem. Fuga blanditiis ad iure nesciunt. Dolores sed molestiae culpa debitis ad sint et. Dolor cum eligendi ipsum.', '483.00', NULL, 'instock', 474, 'product-9.jpg', NULL, 5, '2022-10-15 07:18:08', '2022-10-15 07:18:08'),
(8, 'Camera DSLR', 'Camera-DSLR', 'Aut quia sit id ipsa. Doloremque cupiditate reiciendis excepturi dolor laudantium voluptas sint. Accusantium nisi esse eveniet quia impedit corrupti. Et est ducimus necessitatibus illum in.', 'Quibusdam doloremque enim magni aut voluptates. Odit molestias ipsum quo veniam debitis quos. Corrupti culpa doloremque architecto numquam expedita at dolorum nemo. Sed perspiciatis sed quis quaerat aut excepturi quae. Sint aut consectetur vero ab aut neque quasi. Corrupti nobis earum nam sed. In recusandae et fuga ratione repudiandae enim. Accusamus nostrum consequatur non quo. Reiciendis dolor hic corporis voluptas molestias voluptatem rerum.', '39999.00', '36499.00', 'instock', 270, 'product-1.jpg', NULL, 2, '2022-10-15 07:18:08', '2022-10-15 07:18:08'),
(9, 'Table Lamp', 'sit-est-explicabo-quia', 'Quam ea asperiores facilis id sequi. Molestias quasi occaecati non nesciunt similique. Quasi dolor dolor omnis et tempora possimus provident.', 'Possimus totam eveniet quia odio. Voluptatem veritatis id perspiciatis soluta sint. Expedita repellendus harum ipsam vitae aut reprehenderit reprehenderit. Qui nihil dolorem consequuntur nam. Nihil similique distinctio eum quia. Magni omnis quo in amet itaque et. Eveniet odit similique dolores et illo. Earum commodi unde illo hic dolorem exercitationem molestiae quam. Aut saepe odit illum voluptatem vitae voluptas.', '589.00', '599.00', 'instock', 383, 'product-3.jpg', NULL, 6, '2022-10-15 07:18:08', '2022-10-15 07:18:08'),
(10, 'Camera DSLR 2', 'Camera-DSLR-2', 'Sensor: APS-C CMOS Sensor with 24.1 MP (high resolution for large prints and image cropping).', 'Sensor: APS-C CMOS Sensor with 24.1 MP (high resolution for large prints and image cropping). Transmission frequency (central frequency):Frequency: 2 412 to 2 462MHz. Standard diopter :-2.5 - +0.5m-1 (dpt)\r\nISO: 100-6400 sensitivity range (critical for obtaining grain-free pictures, especially in low light)\r\nImage Processor: DIGIC 4+ with 9 autofocus points (important for speed and accuracy of autofocus and burst photography)\r\nVideo Resolution: Full HD video with fully manual control and selectable frame rates (great for precision and high-quality video work)\r\nConnectivity: WiFi, NFC and Bluetooth built-in (useful for remotely controlling your camera and transferring pictures wirelessly as you shoot)', '29999.00', '24999.00', 'instock', 270, 'cat-2.jpg', NULL, 2, '2022-10-15 07:18:08', '2022-10-15 07:18:08'),
(13, 'Allen Solly Men Polo', 'Allen Solly Men Polo', 'Allen Solly Men\'s Plain Regular Fit Polo', 'Allen Solly Men\'s Plain Regular Fit Polo', '1099.00', '799.00', 'instock', 270, 'product-10.jpg', NULL, 4, '2022-10-15 07:18:08', '2022-10-15 07:18:08'),
(14, 'Small Table', 'Small Table', 'At veritatis cumque inventore totam. Ut vero magnam magni dolore quibusdam quia debitis. Iste et possimus repellat ducimus. Alias ducimus labore iste quis.', 'Tenetur illum debitis aut eum. Sed unde cum ut qui aperiam. Ut et aperiam necessitatibus non qui voluptas. Labore a labore asperiores qui est recusandae sint quia. Officia voluptatem fugit quia ab aut qui dicta. Ipsum quis optio occaecati laboriosam enim nemo. Dolorem ratione enim culpa rerum aliquam eos voluptatem. Fuga blanditiis ad iure nesciunt. Dolores sed molestiae culpa debitis ad sint et. Dolor cum eligendi ipsum.', '483.00', '450.00', 'instock', 474, 'cat-5.jpg', NULL, 5, '2022-10-15 07:18:08', '2022-10-15 07:18:08'),
(15, 'Photo Frames Combo', 'Photo Frames Combo', 'Quam ea asperiores facilis id sequi. Molestias quasi occaecati non nesciunt similique. Quasi dolor dolor omnis et tempora possimus provident.', 'Possimus totam eveniet quia odio. Voluptatem veritatis id perspiciatis soluta sint. Expedita repellendus harum ipsam vitae aut reprehenderit reprehenderit. Qui nihil dolorem consequuntur nam. Nihil similique distinctio eum quia. Magni omnis quo in amet itaque et. Eveniet odit similique dolores et illo. Earum commodi unde illo hic dolorem exercitationem molestiae quam. Aut saepe odit illum voluptatem vitae voluptas.', '699.00', '659.00', 'instock', 383, 'cat-6.jpg', NULL, 6, '2022-10-15 07:18:08', '2022-10-15 07:18:08'),
(16, 'Mobile', 'mobile', '6.56\" HD+ Dot Notch display for binge Watching | 120Hz touch sampling rate for smooth touch response ', '6.56\" HD+ Dot Notch display for binge Watching | 120Hz touch sampling rate for smooth touch response | 270PPI High Pixel Density for Sharp and vivid color reproduction | No support for Africa\'s frequency bands | Warranty In India Only', '10999.00', '8999.00', 'instock', 100, 'cat-8.jpg', NULL, 8, '2022-10-16 16:22:42', '2022-10-16 16:22:42'),
(17, 'Refrigerator', 'Refrigerator', 'Whirlpool 292 L 2 Star Frost-Free Double Door Refrigerator (NEOFRESH 305 GD PRM 2S, Pixel Black)', 'Frost Free Refrigerator : Auto defrost function to prevent ice-build up\r\nCapacity: 292 litres Suitable for families with 3 to 4 members | Freezer capacity: ‎75 Litres, Fresh food capacity: 210 litres\r\nEnergy rating: 2 Star- energy efficiency, Annual energy consumption : 259\r\nWarranty: 1 year on product, 10 years on compressor\r\nCompressor: On-Off compressor\r\nShelf type: Toughened Glass Shelves\r\nIncluded in the box: ‎‎‎Refrigerator, User manual, Warranty card\r\nSpecial Features: 6th Sense DeepFreeze Technology,microblock technology,freshflow air tower,Honey comb moisture control system, Active Deo,Chilling Gel,Ice twister', '25999.00', '22999.00', 'instock', 100, 'cat-7.jpg', NULL, 7, '2022-10-16 16:24:31', '2022-10-16 16:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Govind Banura', 'govindbanura2310@gmail.com', NULL, '$2y$10$RYS./FN1a.a9h.9MKObs9OJou0/X3Lla1O4sEeWOQIgjUdhbfkSXm', NULL, '2022-10-15 23:58:39', '2022-10-15 23:58:39'),
(2, 'user', 'user@gmail.com', NULL, '$2y$10$Mc3VewKASN5LNoQWFrcp4u6xuPUxxMXB2SXFiHF1D91DvEgP4o7ym', NULL, '2022-10-16 10:08:08', '2022-10-16 10:08:08');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
