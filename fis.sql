-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2023 at 06:37 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fis`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

DROP TABLE IF EXISTS `abilities`;
CREATE TABLE IF NOT EXISTS `abilities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` bigint UNSIGNED DEFAULT NULL,
  `entity_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT '0',
  `options` json DEFAULT NULL,
  `scope` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abilities_scope_index` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `options`, `scope`, `created_at`, `updated_at`) VALUES
(1, '*', 'All abilities', NULL, '*', 0, NULL, NULL, '2022-12-10 02:29:52', '2022-12-10 02:29:52'),
(2, 'manage-users', 'Manage Users', NULL, NULL, 0, NULL, NULL, '2022-12-10 02:29:52', '2022-12-10 02:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

DROP TABLE IF EXISTS `assigned_roles`;
CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint UNSIGNED NOT NULL,
  `entity_id` bigint UNSIGNED NOT NULL,
  `entity_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restricted_to_id` bigint UNSIGNED DEFAULT NULL,
  `restricted_to_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_entity_index` (`entity_id`,`entity_type`,`scope`),
  KEY `assigned_roles_role_id_index` (`role_id`),
  KEY `assigned_roles_scope_index` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `role_id`, `entity_id`, `entity_type`, `restricted_to_id`, `restricted_to_type`, `scope`) VALUES
(1, 1, 1, 'App\\Models\\User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `heading`, `content`, `btn_text`, `btn_link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Omnis voluptatum ut', 'Quia accusamus ex id', 'Adipisci tempora omn', 'Laboris praesentium', '/storage/banner/1670679026aramex.webp', 1, '2022-12-10 09:30:26', '2022-12-10 09:30:45'),
(2, 'Et consequatur volu', 'Nihil id nihil labo', 'Inventore quia offic', 'Tenetur et minim fac', '/storage/banner/1670679042minus.png', 1, '2022-12-10 09:30:42', '2022-12-10 09:30:42'),
(4, 'Sequi et dolorum fug', 'Est sunt qui paria', 'Consequuntur perfere', 'Eu suscipit ut unde', '/storage/banner/16711086692029165.webp', 1, '2022-12-15 08:51:09', '2022-12-15 08:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `image_alt`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'jkbasskak', 'kakjsdaksdjk', 'kakjsdaksdjk', 'kakjsdaksdjk', 1, 'aaaaa', '2022-12-23 14:03:34', '2022-12-23 14:03:34'),
(2, 'Lorem repellendus M', '<p>sasdasd</p>', '/storage/blogs/1671806389bg.jpg', 'At quidem et consequ', 1, 'Officia molestiae es', '2022-12-23 14:39:49', '2022-12-23 14:39:49'),
(3, 'Lorem repellendus M', '<p>sasdasd</p>', '/storage/blogs/1671806402bg.jpg', 'At quidem et consequ', 1, 'a', '2022-12-23 14:40:02', '2022-12-23 14:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `description`, `image`, `image_alt`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Quos numquam enim ad', '<p>Quos numquaQuos numquaQuos numquaQuos numquaQuos numquaQuos numquaQuos numquaQuos numquaQuos numquaQuos numquaQuos numquaQuos numquaQuos numquaQuos numqua</p>', '/storage/brands/1671108133Hd3a2d6dfd468496784b9ae753fd123cfk-2.webp', 'Vel sunt officia nul', 1, '2022-12-15 08:42:13', '2022-12-15 08:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
CREATE TABLE IF NOT EXISTS `careers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Dolor velit dolores', '<p>Sint</p>', 1, '2022-12-14 07:13:36', '2022-12-14 08:46:29'),
(3, 'Do irure dolor excep', '<p>asdasdads</p>', 0, '2022-12-14 07:18:59', '2022-12-14 08:46:36'),
(4, 'Do irure dolor excep', '<p>asdasdads</p>', 1, '2022-12-14 07:19:31', '2022-12-14 07:19:31'),
(5, 'Ad in saepe deserunt', '<p>asdasdadsa</p>', 1, '2022-12-14 07:19:55', '2022-12-14 07:19:55'),
(6, 'Ad vitae et qui est', '<p>asasdasd</p>', 1, '2022-12-14 07:29:39', '2022-12-14 07:29:39'),
(7, 'Dolore commodo reici', '<p>Dolore commodo reiciDolore commodo reiciDolore commodo reiciDolore commodo reiciDolore commodo reiciDolore commodo reiciDolore commodo reici</p>', 1, '2022-12-14 07:41:36', '2022-12-14 07:41:36'),
(8, 'Quia dolore sequi qu', '<p>aasdasd</p>', 1, '2022-12-14 07:47:36', '2022-12-14 07:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

DROP TABLE IF EXISTS `enquiries`;
CREATE TABLE IF NOT EXISTS `enquiries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Frederik Douglas IV', 'stephania.okon@example.org', '+1-757-919-7192', 'Sed dicta et rerum eos dolores similique nam nulla. Odit non adipisci quia nulla reiciendis. Ut necessitatibus id excepturi ut consequatur vel adipisci. Eos dolore nemo dolore quo.', 1, '2022-12-21 08:54:01', '2022-12-21 08:54:01'),
(2, 'Talia Stracke', 'davonte.hodkiewicz@example.com', '+1 (937) 390-1461', 'Ut inventore eius eveniet. Reprehenderit veniam unde aut ratione aut perferendis natus. Qui voluptas optio et.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(3, 'Marlon Schiller', 'terry.lauren@example.org', '(215) 323-3869', 'Cum rerum et autem. Praesentium molestiae est repellat consequatur voluptate. Et nobis laudantium dicta suscipit. Et qui corporis beatae aut excepturi.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(4, 'Bridget Bechtelar', 'nathen20@example.com', '1-218-351-5234', 'Et magnam ut qui et sint cum. Animi modi deserunt ut minima dolores dolorem dolorum.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(5, 'Mrs. Jaclyn Will', 'damion38@example.org', '586-759-0738', 'Fugit sint velit eligendi ad molestiae eum. Perspiciatis debitis distinctio dolores exercitationem voluptatem corrupti impedit. Itaque dignissimos deserunt aut qui dignissimos qui sed.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(6, 'Miss Lauryn Metz', 'torp.may@example.com', '(703) 828-5971', 'Quibusdam non nemo earum culpa et et. Similique numquam repellendus saepe accusantium officia harum excepturi. Minima dolorum labore voluptatem aut est ea adipisci.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(7, 'Ms. Aaliyah Bergnaum DDS', 'lakin.jalyn@example.net', '+1.256.633.8213', 'Qui perferendis perferendis omnis laboriosam. Dignissimos voluptate ut et consequatur fugit. Qui impedit eveniet rerum dolorum. Reiciendis laudantium culpa omnis facere reprehenderit.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(8, 'Lamar Boehm', 'rahul.shields@example.org', '+1-743-341-5092', 'Est vel quod libero similique magnam nam dolores. Id tempore quia et ut ducimus. Omnis quam laboriosam eos tenetur et. Nihil ea voluptatum omnis et quis est impedit.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(9, 'Pattie Wintheiser', 'hahn.isabel@example.org', '(743) 860-4092', 'Corrupti et officia iste eveniet. Omnis velit aut suscipit libero.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(10, 'Ms. Everette Murphy', 'houston67@example.org', '1-517-526-7874', 'Id assumenda inventore ratione cupiditate et. Nam at quia rerum adipisci voluptatem optio in. Nesciunt ab perspiciatis voluptatibus.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(11, 'Alysson Kozey', 'destini.morissette@example.com', '(667) 839-1023', 'Consequatur quam sint modi. Laudantium voluptas est aut nihil voluptatum. Odit aspernatur impedit sint provident. Vitae sapiente fugiat minus temporibus.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(12, 'Miss Era Mayert', 'crist.mae@example.com', '(703) 943-7824', 'Hic facilis quia laboriosam minima. Accusamus alias iure sed dolor enim mollitia quos nobis. Iure eaque voluptatem ex illo eos libero. Rem molestiae expedita beatae laudantium iure.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(13, 'Imogene Macejkovic Sr.', 'damore.casey@example.com', '715.838.2176', 'Qui est et ea et est eum. Neque aliquam vel reprehenderit. Modi dolor atque tempora molestias ducimus. Sint sapiente quaerat odit magnam cum in qui.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(14, 'Gina Kunze', 'hborer@example.net', '+1-765-467-1934', 'Commodi eos id sit vitae sed aut suscipit. Sequi sapiente minus perferendis doloremque id provident. Illo delectus eos autem tempora ipsum. Molestiae libero explicabo hic labore.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(15, 'Mr. Stephan Gaylord', 'gibson.imani@example.com', '912-639-5047', 'Omnis non incidunt est omnis non. Reprehenderit non fuga explicabo quis aut exercitationem et. Dolor dolor vel in quod et. Est sit voluptatibus sunt quam.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(16, 'Riley Quigley', 'pwest@example.com', '1-540-947-9235', 'Est deserunt placeat optio. Iusto unde accusamus omnis sint provident. Quos aut dicta occaecati saepe aliquam.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(17, 'Dorcas Daugherty V', 'earline62@example.org', '832-480-0545', 'Vel cumque laboriosam ut cumque sapiente minima eveniet. Eum molestiae dolores voluptas minima. Commodi maiores officia praesentium pariatur.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(18, 'Dr. Edythe Breitenberg II', 'brendan66@example.com', '+1.779.810.2954', 'Enim deleniti voluptas porro tenetur. Facilis aut velit porro vel fugit animi eum atque. Ab officiis tenetur quos. Debitis ab nam dolores dolore.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(19, 'Breanne Raynor', 'misael.jenkins@example.net', '585-671-6696', 'Omnis animi culpa in illum quidem qui. Esse aspernatur pariatur blanditiis aliquid aut dignissimos. Qui at omnis nam ut tempora rem et. Eius voluptatum iusto magni eveniet quisquam.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(20, 'Zora DuBuque II', 'annette01@example.net', '1-678-310-6357', 'Consequatur voluptate qui sed aut ut fuga at. Magni commodi illo quidem culpa in expedita. Voluptates odit impedit odio et. Ut dolores asperiores sit inventore adipisci vero.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04'),
(21, 'Dr. Whitney Hintz', 'bartoletti.meta@example.org', '1-507-283-6414', 'Hic minus sed praesentium. Dolores eius sequi consequuntur. Iure consectetur aliquid et consequatur libero ut cumque.', 1, '2022-12-21 08:54:04', '2022-12-21 08:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `media_id` int NOT NULL,
  `media_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `media_id`, `media_type`, `type`, `url`, `alt`, `status`, `created_at`, `updated_at`) VALUES
(3, 0, 'Clients', 'clients', '/storage/clients/16711072682029165.webp', 'aaaaaaaaaaaaa', 1, '2022-12-15 03:46:48', '2022-12-15 08:27:48'),
(4, 0, 'Clients', 'clients', '/storage/clients/1671090459aramex.webp', 'Ut mollit mollit qui', 1, '2022-12-15 03:47:39', '2022-12-15 03:47:39'),
(5, 0, 'Clients', 'clients', '/storage/clients/1671090472Fb8cWsAaAAA5hj1.jpg', 'Ut eu consequuntur d', 1, '2022-12-15 03:47:52', '2022-12-15 03:47:52'),
(6, 0, 'Clients', 'clients', '/storage/clients/1671090651aramex.webp', 'Nulla irure ratione ', 1, '2022-12-15 03:50:51', '2022-12-15 03:50:51'),
(7, 0, 'Clients', 'clients', '/storage/clients/1671091084aramex.webp', 'Reiciendis sunt in s', 1, '2022-12-15 03:58:04', '2022-12-15 03:58:04'),
(8, 0, 'Clients', 'clients', '/storage/clients/1671091113aramex.webp', 'Aliquam assumenda se', 0, '2022-12-15 03:58:33', '2022-12-15 03:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_05_25_122618_add_details_to_users_table', 1),
(7, '2022_05_25_130315_create_bouncer_tables', 1),
(9, '2022_12_10_072410_create_settings_table', 2),
(13, '2022_12_10_093301_create_banners_table', 3),
(14, '2022_12_10_134629_create_careers_table', 4),
(15, '2022_12_14_131710_create_blogs_table', 5),
(16, '2022_12_14_144248_add_image_alt_to_blogs_table', 6),
(18, '2022_12_15_062145_create_media_table', 7),
(20, '2022_12_15_100840_create_brands_table', 8),
(21, '2022_12_15_124315_create_products_table', 9),
(23, '2022_12_16_060230_create_seos_table', 10),
(24, '2022_12_16_060930_add_slug_to_blogs_table', 10),
(25, '2022_12_16_095437_create_galleries_table', 11),
(27, '2022_12_21_081321_create_enquiries_table', 12),
(28, '2022_12_21_135649_create_pages_table', 13),
(29, '2022_12_21_135711_create_modules_table', 13),
(32, '2022_12_21_140555_create_services_table', 14),
(33, '2022_12_22_171559_create_store_loctions_table', 15),
(34, '2022_12_23_181523_add_keywords_to_seos_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci,
  `sub_heading` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `has_image` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_btn` tinyint(1) NOT NULL DEFAULT '0',
  `btn_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modules_pages_id_foreign` (`pages_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_id_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_btn_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_btn_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_id_name`, `page_name`, `banner_text`, `banner_content`, `banner_btn_text`, `banner_btn_link`, `banner_image`, `seo_url`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Home', '', 'asd [hello title=\'1111\'] asd', '', '', '', '', '2022-12-24 06:09:21', '2022-12-24 06:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ability_id` bigint UNSIGNED NOT NULL,
  `entity_id` bigint UNSIGNED DEFAULT NULL,
  `entity_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `scope` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_entity_index` (`entity_id`,`entity_type`,`scope`),
  KEY `permissions_ability_id_index` (`ability_id`),
  KEY `permissions_scope_index` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `ability_id`, `entity_id`, `entity_type`, `forbidden`, `scope`) VALUES
(1, 1, 1, 'roles', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `image_alt`, `link`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Rerum sint quo fugi', '/storage/products/1671186645aramex.webp', 'Qui incididunt sapie', 'https://www.fiqipujejyzaxaw.com.au', 1, '2022-12-16 06:30:32', '2022-12-16 06:30:45'),
(4, 'Iste  asdsad', '/storage/products/1671111132banner-25-11-01.webp', 'Sunt accusantium ita', 'https://www.nemywoda.t', 1, '2022-12-15 09:26:29', '2022-12-22 14:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`,`scope`),
  KEY `roles_scope_index` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Super Admin', NULL, '2022-12-10 02:29:52', '2022-12-10 02:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

DROP TABLE IF EXISTS `seos`;
CREATE TABLE IF NOT EXISTS `seos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `seo_id` int NOT NULL,
  `seo_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `seo_id`, `seo_type`, `title`, `og_title`, `twitter_title`, `description`, `og_description`, `twitter_description`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 2, 'App\\Models\\Blog', 'Omnis sint eu quod a', 'Duis fugit ut liber', 'Aut recusandae Opti', NULL, NULL, NULL, NULL, '2022-12-16 02:55:32', '2022-12-16 02:55:32'),
(2, 1, 'App\\Models\\Blog', 'Sit in ad laborum ', 'In aut rerum corrupt', 'Quis rem dolore inci', 'Eum nulla ea ut eum ', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Do nesciunt occaeca', NULL, '2022-12-16 02:57:35', '2022-12-16 05:04:15'),
(5, 4, 'App\\Models\\Blog', 'Consequat Aliquip a', 'Labore voluptatibus ', 'Modi veniam placeat', 'Deserunt et cillum s', 'Nostrum temporibus e', 'Enim explicabo Aper', NULL, '2022-12-21 10:46:39', '2022-12-21 10:46:39'),
(6, 5, 'App\\Models\\Blog', 'Quaerat inventore co', 'Tempore veniam dol', 'Aut totam deleniti e', 'Quia quia nihil offi', 'Minima voluptas iste', 'Nemo animi deserunt', NULL, '2022-12-21 10:58:24', '2022-12-21 10:58:24'),
(7, 6, 'App\\Models\\Blog', 'Aut vitae proident ', 'Amet rerum et bland', 'Sint provident lore', 'Reiciendis aliquip c', 'Id corporis eum even', 'Ut inventore velit e', NULL, '2022-12-21 11:16:14', '2022-12-21 11:16:14'),
(8, 7, 'App\\Models\\Blog', 'Ab officia cumque qu', 'Corrupti voluptatem', 'Sit assumenda beata', 'Ullam quia voluptati', 'Eum delectus sit iu', 'Ad qui exercitation ', NULL, '2022-12-21 11:17:06', '2022-12-21 11:17:06'),
(9, 8, 'App\\Models\\Blog', 'Laudantium architec', 'Assumenda perspiciat', 'Odio consequatur Ex', 'Aut quis hic ullam i', 'Ipsum id adipisci sa', 'Explicabo Exercitat', NULL, '2022-12-21 11:19:11', '2022-12-21 11:19:11'),
(10, 9, 'App\\Models\\Blog', 'Libero sunt ab et co', 'Minus ipsum maxime ', 'Sit hic sapiente et ', 'Consequatur dolorem ', 'Fugit aut beatae qu', 'Laborum molestias de', NULL, '2022-12-21 14:17:08', '2022-12-21 14:17:08'),
(11, 10, 'App\\Models\\Blog', 'Explicabo Magnam mo', 'Sit ducimus ratione', 'Sit sed molestiae h', 'Et ullamco necessita', 'Dolor dolorum quasi ', 'Culpa nulla quo fug', NULL, '2022-12-21 14:23:42', '2022-12-21 14:23:42'),
(12, 11, 'App\\Models\\Blog', 'Lorem autem quod cup', 'Quo et excepturi adi', 'Veritatis ad qui des', 'Cupiditate amet con', 'Dolore enim magna su', 'Excepteur voluptas v', NULL, '2022-12-22 10:03:01', '2022-12-22 10:03:01'),
(13, 12, 'App\\Models\\Blog', 'Vitae id fugiat aut ', 'Sunt pariatur Id ', 'Ducimus minima non ', 'Velit corporis exce', 'Voluptates ut nihil ', 'Dolorem aut dolor ve', NULL, '2022-12-22 10:20:01', '2022-12-22 10:20:01'),
(14, 13, 'App\\Models\\Blog', 'Eos vel porro cupidi', 'Deleniti eos delect', 'Aliquid placeat ame', 'Autem dolorem volupt', 'Esse commodi dicta v', 'Sit quia quia exerc', NULL, '2022-12-22 10:21:19', '2022-12-22 10:21:19'),
(15, 14, 'App\\Models\\Blog', 'Rem suscipit pariatu', 'Voluptatem sit vol', 'Quas qui ipsum nobi', 'Cupiditate autem vol', 'In eaque possimus r', 'Fugiat culpa occaeca', NULL, '2022-12-22 10:26:35', '2022-12-22 10:26:35'),
(16, 2, 'App\\Models\\Services', 'Officia dolorem vel ', 'At totam reiciendis ', 'Voluptatum quia itaq', 'Dolores eos beatae r', 'Aut dolore voluptate', 'Tempore facilis ea ', NULL, '2022-12-22 11:22:05', '2022-12-22 11:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `sub_title`, `image`, `content`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Quam quaerat volupta ', 'Nesciunt molestias ', '/storage/services/1671708066banner-25-11-01.webp', '<p>asasdasdasdasdasdasdas</p>', 1, 'quam-quaerat-volupta', '2022-12-22 11:21:06', '2022-12-22 12:43:15'),
(2, 'Quam ab excepturi nia', 'Expedita a numquam a', '/storage/services/16717081251.jpg', '<p>Expedita a numquam aExpedita a numquam aExpedita a numquam aExpedita a numquam aExpedita a numquam aExpedita a numquam aExpedita a numquam aExpedita a numquam aExpedita a numquam a</p>', 1, 'quam-ab-excepturi-nia', '2022-12-22 11:22:05', '2022-12-22 12:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `text`, `type`, `group`, `created_at`, `updated_at`) VALUES
(1, 'address', 'Office No.: 3702, ASPECT Tower D,\r\nBusiness Bay, Dubai, United Arab Emirates', 'Address', 'text', 'head', '2022-12-10 07:46:27', '2022-12-10 07:46:27'),
(2, 'email', 'sales@farook.ae', 'E-mail', 'email', 'head', '2022-12-10 07:46:27', '2022-12-10 07:46:27'),
(3, 'phone', '+971 4 579 2000', 'Phone', 'text', 'head', '2022-12-10 07:46:27', '2022-12-10 07:46:27'),
(4, 'working_time', 'Mon-Fri: 8:00 AM - 06:30 PM', 'Working Time', 'text', 'head', '2022-12-10 07:46:27', '2022-12-10 04:01:09'),
(5, 'facebook', 'https://facebook.com', 'Facebook', 'url', 'social', '2022-12-10 08:30:12', '2022-12-10 05:03:59'),
(6, 'instagram', '#', 'Instagram', 'url', 'social', '2022-12-10 08:30:12', '2022-12-10 08:30:12'),
(7, 'twitter', '#', 'Twitter', 'url', 'social', '2022-12-10 08:30:12', '2022-12-10 08:30:12'),
(8, 'linkedin', '#', 'Linkedin', 'url', 'social', '2022-12-10 08:30:12', '2022-12-10 08:30:12'),
(9, 'youtube', '#', 'Youtube', 'url', 'social', '2022-12-10 08:30:12', '2022-12-10 08:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `store_loctions`
--

DROP TABLE IF EXISTS `store_loctions`;
CREATE TABLE IF NOT EXISTS `store_loctions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iframe` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_loctions`
--

INSERT INTO `store_loctions` (`id`, `name`, `location`, `iframe`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Repudiandae saepe mo', 'Nihil corporis aliqu', 'Sint in eum non ist', 1, '2022-12-22 14:23:41', '2022-12-22 14:25:16'),
(2, 'aasasd', 'Temporibus harum vol', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14436.162203357262!2d55.2900642156601!3d25.235559127463304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f42db20d99d41%3A0xf93035af01a85798!2sThe%20Dubai%20Frame!5e0!3m2!1sen!2sae!4v1671719423400!5m2!1sen!2sae\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2022-12-22 14:23:51', '2022-12-22 14:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Admin', 'admin@fis.com', NULL, '$2y$10$TEBvOdonF8RsgVXDrsVPp.NMLkqO843OpN8L4VjoMVJyC87tkzW/m', NULL, NULL, NULL, NULL, 1, '2022-12-10 02:29:52', '2022-12-10 02:29:52', NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
