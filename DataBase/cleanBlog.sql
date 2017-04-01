-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2015 at 02:33 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cleanBlog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `header` text COLLATE utf8_unicode_ci NOT NULL,
  `sub_header` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `header`, `sub_header`, `body`, `image`, `user_id`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'start Gaming Rising in Middle East', 'Contemporary medicine applies biomedical sciences, biomedical research, genetics', 'Contemporary medicine applies biomedical sciences, biomedical research, genetics Contemporary medicine applies biomedical sciences, biomedical research, genetics Contemporary medicine applies biomedical sciences, biomedical research, genetics Contemporary medicine applies biomedical sciences, biomedical research, genetics', '/img/images (3).jpg', 1, '2015-09-02 22:00:00', '2015-09-10 17:38:31', '2015-09-10 17:38:31'),
(6, 'Nutrition and healthy eating', 'Nutrition and healthy eating', 'Nutrition and healthy eating Nutrition and healthy eating Nutrition and healthy eating Nutrition and healthy eating Nutrition and healthy eating Nutrition and healthy eating ', '/img/images (5).jpg', 1, '2015-09-03 22:00:00', '2015-09-10 19:46:53', '2015-09-10 19:46:53'),
(7, 'Nutrition and healthy eating', 'osama Nutrition and healthy eating', 'Nutrition and healthy eating Nutrition and healthy eating Nutrition and healthy eating Nutrition and healthy eating Nutrition and healthy eating Nutrition and healthy eating ', '/img/clinck.jpg', 1, '2015-09-02 22:00:00', '2015-09-10 19:50:54', '2015-09-10 19:50:54'),
(8, 'Nutrition and healthy eating', 'Contemporary medicine applies biomedical sciences, biomedical research, genetics', 'Contemporary medicine applies biomedical sciences, biomedical research, genetics Contemporary medicine applies biomedical sciences, biomedical research, genetics', '/img/images (4).jpg', 1, '2015-09-01 22:00:00', '2015-09-10 20:05:02', '2015-09-10 20:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `articles_tags`
--

CREATE TABLE IF NOT EXISTS `articles_tags` (
  `articles_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles_tags`
--

INSERT INTO `articles_tags` (`articles_id`, `tags_id`, `created_at`, `updated_at`) VALUES
(7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_09_05_192527_posts', 2),
('2015_09_05_232411_articles', 3),
('2015_09_06_084720_sections', 3),
('2015_09_10_193146_Tags', 3),
('2015_09_10_193430_articles_tags', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `header` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sections_article_id_foreign` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `header`, `body`, `image`, `article_id`, `created_at`, `updated_at`) VALUES
(1, 'Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog', 'Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog', '/img/images (1).jpg', 1, '2015-09-10 17:39:02', '2015-09-10 17:39:02'),
(2, 'Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog', 'Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog', '/img/images (4).jpg', 1, '2015-09-10 17:39:50', '2015-09-10 17:39:50'),
(4, 'Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog', 'Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog', '/img/images (9).jpg', 1, '2015-09-10 17:43:58', '2015-09-10 17:43:58'),
(5, 'Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog', 'Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog', '/img/images (8).jpg', 1, '2015-09-10 17:51:21', '2015-09-10 17:51:21'),
(6, 'osama Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog', 'osama Clean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean BlogClean Blog', '/img/Egypt.jpg', 1, '2015-09-10 17:51:21', '2015-09-10 17:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PHP', '2015-09-10 19:46:52', '2015-09-10 19:46:52'),
(2, 'CSS', '2015-09-10 19:46:53', '2015-09-10 19:46:53'),
(3, 'JS', '2015-09-10 20:05:02', '2015-09-10 20:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'osamamohsen', 'example@yahoo.com', '$2y$10$CE0Fop9O.6pD2FvGUez0j.zjJl35MsXyYDTc.Fr7SWnVHikV7fkpK', 'd4KLH7JR2pgxvekCUMmxDG90eeEncvhne9pgMCaXGULsMy836bQ30iV17qRk', '2015-09-05 17:29:17', '2015-09-10 21:04:57'),
(2, 'ahmedmohsen', 'ex@yahoo.com', '$2y$10$a4Ucd5Ayh/dkfiXqJyn5DOAH3kftG4g3GKBA5tsZKaEb72mTIeYSC', NULL, '2015-09-05 17:29:34', '2015-09-05 17:29:34');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
