-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 29 Mar 2020, 12:47
-- Wersja serwera: 8.0.19
-- Wersja PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bukieciarnia_sandomierz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `const_field`
--

DROP TABLE IF EXISTS `const_field`;
CREATE TABLE IF NOT EXISTS `const_field` (
  `id_const_field` int NOT NULL AUTO_INCREMENT,
  `const_field_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `const_field_text` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `const_field_lang` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT 'pl',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_const_field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `const_field`
--

INSERT INTO `const_field` (`id_const_field`, `const_field_name`, `const_field_text`, `const_field_lang`, `created_at`, `updated_at`) VALUES
(1, 'phone_1', '+48 784 475 530', 'pl', '0000-00-00 00:00:00', '2020-03-01 22:14:32'),
(2, 'phone_2', NULL, 'pl', '0000-00-00 00:00:00', '2020-03-01 22:14:32'),
(3, 'email_1', 'biuro@bukieciarstwosandomierz.pl', 'pl', '0000-00-00 00:00:00', '2020-03-01 22:14:32'),
(4, 'email_2', NULL, 'pl', '0000-00-00 00:00:00', '2020-03-01 22:14:32'),
(5, 'address', '<p><strong>Studio Florystyczne<br />\r\nAnna Świerkula</strong><br />\r\n27-600 Sandomierz,<br />\r\nul. Mickiewicza 47a</p>', 'pl', '0000-00-00 00:00:00', '2020-03-01 22:14:32'),
(6, 'nip', NULL, 'pl', '0000-00-00 00:00:00', '2020-03-01 22:14:32'),
(7, 'page_name', 'BukieciarniaSandomierz.pl', 'pl', '0000-00-00 00:00:00', '2020-03-01 22:14:32'),
(8, 'page_owner', 'Anna Świerkula', '', '0000-00-00 00:00:00', '2020-03-01 22:14:32'),
(9, 'company_name', NULL, '', '0000-00-00 00:00:00', '2020-03-01 22:14:32'),
(10, 'fb_link', 'https://facebook.com', '', '0000-00-00 00:00:00', '2020-03-01 22:14:32'),
(11, 'map_link', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2527.721572866697!2d21.72849431573996!3d50.687992979508856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4722b501c2ab41e5%3A0x402f9bc8238b89e8!2sAdama%20Mickiewicza%2047a%2C%2027-600%20Sandomierz!5e0!3m2!1spl!2spl!4v1581778944410!5m2!1spl!2spl', '', '0000-00-00 00:00:00', '2020-03-01 22:14:32');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `field`
--

DROP TABLE IF EXISTS `field`;
CREATE TABLE IF NOT EXISTS `field` (
  `id_field` int NOT NULL AUTO_INCREMENT,
  `id_page` int NOT NULL,
  `field_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `field_value` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `field_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT 'text',
  `field_position` int NOT NULL DEFAULT '0',
  `field_lang` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT 'pl',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int NOT NULL AUTO_INCREMENT,
  `source_table` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `source_id` int NOT NULL DEFAULT '0',
  `gallery_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `gallery_lang` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT 'pl',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery_item`
--

DROP TABLE IF EXISTS `gallery_item`;
CREATE TABLE IF NOT EXISTS `gallery_item` (
  `id_gallery_item` int NOT NULL AUTO_INCREMENT,
  `id_gallery` int NOT NULL,
  `gallery_item_src` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT 'default.png',
  `gallery_item_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT '',
  `gallery_item_position` int NOT NULL DEFAULT '0',
  `gallery_item_lang` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT 'pl',
  `gallery_item_status` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_gallery_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;


--
-- Struktura tabeli dla tabeli `offer`
--

DROP TABLE IF EXISTS `offer`;
CREATE TABLE IF NOT EXISTS `offer` (
  `id_offer` int NOT NULL AUTO_INCREMENT,
  `id_seo` int NOT NULL,
  `offer_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `offer_lead` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT '',
  `offer_text` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `offer_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT '',
  `offer_external_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT '',
  `offer_position` int NOT NULL DEFAULT '0',
  `offer_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_offer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;



--
-- Struktura tabeli dla tabeli `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id_page` int NOT NULL AUTO_INCREMENT,
  `id_seo` int NOT NULL,
  `page_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `page_module` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `page_position` int NOT NULL DEFAULT '0',
  `page_status` int NOT NULL DEFAULT '0',
  `page_lang` varchar(10) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL DEFAULT 'pl',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;



--
-- Struktura tabeli dla tabeli `realization`
--

DROP TABLE IF EXISTS `realization`;
CREATE TABLE IF NOT EXISTS `realization` (
  `id_realization` int NOT NULL AUTO_INCREMENT,
  `id_seo` int NOT NULL,
  `realization_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `realization_lead` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT '',
  `realization_text` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `realization_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `realization_position` int NOT NULL DEFAULT '0',
  `realization_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_realization`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seo`
--

DROP TABLE IF EXISTS `seo`;
CREATE TABLE IF NOT EXISTS `seo` (
  `id_seo` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `seo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `seo_tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `seo_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_seo`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;


--
-- Struktura tabeli dla tabeli `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT '',
  `email_verified_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@palmax.com.pl', '$2y$10$e7DfQ58vV65y2ZUlrmV3j.8qjx0XpQMn3DF9JVwrb5rgc4d1AR7Ly', 'bP4DFvzOw8OSbVPXo3G0kTJbeCYtSq2OHuTW53gD8os6whuZfmrd5egNNDBx', NULL, '2020-02-25 19:13:01', '2020-03-07 22:59:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
