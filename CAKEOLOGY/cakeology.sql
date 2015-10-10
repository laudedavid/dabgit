-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2015 at 05:07 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cakeology`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE IF NOT EXISTS `buyer` (
  `buyerId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fbId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`buyerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=479 ;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyerId`, `name`, `fbId`, `email`, `created_at`, `updated_at`) VALUES
(465, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-08-14 09:25:21', '2015-08-14 09:25:21'),
(466, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-08-14 09:27:08', '2015-08-14 09:27:08'),
(467, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-08-14 09:31:23', '2015-08-14 09:31:23'),
(468, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-08-14 09:32:39', '2015-08-14 09:32:39'),
(469, 'Lovelyn Flores Q', '1041334209218100', 'lovenze14@gmail.com', '2015-08-15 09:13:46', '2015-08-15 09:13:46'),
(470, 'Lovelyn Flores Q', '1041334209218100', 'lovenze14@gmail.com', '2015-08-15 09:30:11', '2015-08-15 09:30:11'),
(471, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-08-18 22:43:15', '2015-08-18 22:43:15'),
(472, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-08-18 22:56:07', '2015-08-18 22:56:07'),
(473, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-08-21 01:18:31', '2015-08-21 01:18:31'),
(474, 'Lovelyn Flores Q', '1041334209218100', 'lovenze14@gmail.com', '2015-08-21 04:10:23', '2015-08-21 04:10:23'),
(475, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-09-10 06:50:02', '2015-09-10 06:50:02'),
(476, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-09-10 08:35:27', '2015-09-10 08:35:27'),
(477, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-09-22 07:58:01', '2015-09-22 07:58:01'),
(478, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-09-22 08:14:51', '2015-09-22 08:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `cake`
--

CREATE TABLE IF NOT EXISTS `cake` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `sellersName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cake`
--

INSERT INTO `cake` (`id`, `name`, `price`, `category`, `description`, `sellersName`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Chocolate Cake', '500.00', 'Birthday', 'cake', 'I-am Don Rey', 1, 'wmpMwyWK1rcsDvmuuG7jZ5Pw6as3ke.jpg', '2015-09-23 22:51:28', '2015-09-23 22:51:28');

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
('2015_08_03_063610_create_user_table', 1),
('2015_08_03_074724_create_buyer_table', 2),
('2015_08_03_075059_create_seller_table', 3),
('2015_08_05_171014_create_users_table', 4),
('2015_08_19_061200_create_user_table', 5),
('2015_09_22_171606_create_cake_table', 6),
('2015_09_24_064239_create_cake_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
  `sellerId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fbId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`sellerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellerId`, `name`, `fbId`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-08-14 09:40:13', '2015-08-14 09:40:13'),
(2, 'Lovelyn Flores Q', '1041334209218100', 'lovenze14@gmail.com', '2015-08-15 10:00:03', '2015-08-15 10:00:03'),
(3, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-08-18 22:41:27', '2015-08-18 22:41:27'),
(4, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-08-18 23:00:42', '2015-08-18 23:00:42'),
(5, 'Lovelyn Flores Q', '1041334209218100', 'lovenze14@gmail.com', '2015-08-21 04:10:47', '2015-08-21 04:10:47'),
(6, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-09-10 07:03:35', '2015-09-10 07:03:35'),
(7, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-09-22 09:12:48', '2015-09-22 09:12:48'),
(8, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-09-23 22:15:28', '2015-09-23 22:15:28'),
(9, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-09-23 22:29:37', '2015-09-23 22:29:37'),
(10, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-09-23 22:29:39', '2015-09-23 22:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fbId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `fbId`, `email`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-08-18 22:13:48', '2015-08-18 22:14:03', 'uaJ8EFdqYixNQde6SYNzPRJ9Nd6NrOawj4xYToEEPoRoNjso2GF7RD7tV3m2'),
(2, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-08-18 22:14:15', '2015-08-18 22:26:27', 'CSnyAjS99NSokKs9gm0ysHCF2bBJaWjRfmUINwGqOPk6W7bUpGz2zMiXpnAn'),
(3, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-08-18 22:26:34', '2015-08-18 22:26:43', 'wumfEUztz7pkJ9IkcfyGmowng8CkqvfeFY2f1hdHhVwGhAyvh2PgQokNBr1w'),
(4, 'Lovelyn Flores Q', '1041334209218100', 'lovenze14@gmail.com', '2015-08-18 22:29:21', '2015-08-18 22:29:28', 'n7JSZJxJxpV8pAx4HUOyt0E5lcoy3GvX5AMkJXF0dgKoRv5l98fSaB8DXe6X'),
(5, 'Lovelyn Flores Q', '1041334209218100', 'lovenze14@gmail.com', '2015-08-18 22:31:05', '2015-08-18 22:33:38', 'lON5PxoOijWvYbpdgU0B2grNT0lFmRZu8F347Q26y0Tevh8HXhNJdRpkqv1t'),
(6, 'Lovelyn Flores Q', '1041334209218100', 'lovenze14@gmail.com', '2015-08-18 22:34:07', '2015-08-18 22:39:07', 'OlvvHYYnQ2WpYou8uT7l1Xw6OJkGBGtlThWEwEfuTKefqNpf6qi5nOgOUl8f'),
(7, 'Lovelyn Flores Q', '1041334209218100', 'lovenze14@gmail.com', '2015-08-18 22:39:13', '2015-08-18 22:39:23', 'mNQIYMSGHyMHbDTuBCV9cAYr2BZFlCzq63RctrxHiagGbCbImddwuuhjWfU7'),
(8, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-08-18 22:41:20', '2015-08-18 22:41:20', NULL),
(9, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-08-18 23:00:31', '2015-08-18 23:00:31', NULL),
(10, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-08-21 01:18:23', '2015-08-21 01:18:23', NULL),
(11, 'Lovelyn Flores Q', '1041334209218100', 'lovenze14@gmail.com', '2015-08-21 04:10:07', '2015-08-21 04:11:09', 'M1DSNJdwCZLP81RSHEiXaJIolOBNf4dehSozliTkYclfaWmsHJmExebgb2S4'),
(12, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-09-10 06:49:44', '2015-09-10 06:49:44', NULL),
(13, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-09-10 07:03:26', '2015-09-10 07:03:26', NULL),
(14, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-09-10 08:35:17', '2015-09-10 08:35:17', NULL),
(15, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-09-22 07:57:22', '2015-09-22 07:57:22', NULL),
(16, 'Kim Kimii Carulasan', '10153485697683023', 'coolchix_fas@yahoo.com.sg', '2015-09-22 08:14:44', '2015-09-22 08:14:44', NULL),
(17, 'I-am Don Rey', '1626103514325068', 'donrey53@gmail.com', '2015-09-23 21:55:46', '2015-09-23 21:55:46', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
