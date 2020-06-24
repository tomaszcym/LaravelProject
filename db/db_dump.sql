-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 24 Cze 2020, 19:26
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
-- Baza danych: `tomsolution`
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `const_field`
--

INSERT INTO `const_field` (`id_const_field`, `const_field_name`, `const_field_text`, `const_field_lang`, `created_at`, `updated_at`) VALUES
(1, 'phone_1', '+48 555 999 222', 'pl', '0000-00-00 00:00:00', '2020-06-24 19:01:06'),
(2, 'phone_2', NULL, 'pl', '0000-00-00 00:00:00', '2020-06-24 19:01:06'),
(3, 'email_1', 'kontakt@tomsolution.pl', 'pl', '0000-00-00 00:00:00', '2020-06-24 19:01:06'),
(4, 'email_2', NULL, 'pl', '0000-00-00 00:00:00', '2020-06-24 19:01:06'),
(5, 'address', '<p>&nbsp;</p>\r\n\r\n<p><strong>Nazwa firmy</strong><br />\r\nul. Podkarpacka 3a,<br />\r\n00-000 Rzesz&oacute;w<br />\r\n55 886 548 99</p>', 'pl', '0000-00-00 00:00:00', '2020-06-24 19:01:06'),
(6, 'nip', '55 886 548 99', 'pl', '0000-00-00 00:00:00', '2020-06-24 19:01:06'),
(7, 'page_name', 'TomSolution.pl', 'pl', '0000-00-00 00:00:00', '2020-06-24 19:01:06'),
(8, 'page_owner', 'Tomasz Cymerys', '', '0000-00-00 00:00:00', '2020-06-24 19:01:06'),
(9, 'company_name', 'Nazwa firmy', '', '0000-00-00 00:00:00', '2020-06-24 19:01:06'),
(10, 'fb_link', NULL, '', '0000-00-00 00:00:00', '2020-06-24 19:01:06'),
(11, 'map_link', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2564.1252852624652!2d21.962361915932537!3d50.00900692695467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473cfbce332bb47b%3A0x48c84aba82858b99!2sPodkarpacka%2C%2035-082%20Rzesz%C3%B3w!5e0!3m2!1spl!2spl!4v1593025243615!5m2!1spl!2spl', '', '0000-00-00 00:00:00', '2020-06-24 19:01:06');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `field`
--

INSERT INTO `field` (`id_field`, `id_page`, `field_name`, `field_value`, `field_type`, `field_position`, `field_lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'text1', 'TomSolution', 'input', 0, 'pl', '2020-03-29 16:44:33', '2020-06-24 19:06:57'),
(2, 1, 'text2', '<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</h3>', 'text', 0, 'pl', '2020-03-29 16:44:52', '2020-06-24 19:06:57'),
(3, 1, 'text3', 'ullamco laboris', 'input', 0, 'pl', '2020-03-29 16:45:20', '2020-06-24 19:06:57'),
(4, 1, 'text4', 'consequuntur magni', 'input', 0, 'pl', '2020-03-29 16:45:25', '2020-06-24 19:06:57'),
(5, 1, 'text5', 'quis nostrum exercitationem', 'input', 0, 'pl', '2020-03-29 16:45:26', '2020-06-24 19:06:57'),
(6, 1, 'text6', 'voluptas nulla pariatur', 'input', 0, 'pl', '2020-03-29 16:45:28', '2020-06-24 19:06:57'),
(7, 1, 'text7', 'explorer of', 'input', 0, 'pl', '2020-03-29 16:45:43', '2020-06-24 19:06:57'),
(8, 1, 'text8', '<h2>this mistaken</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut</p>\r\n\r\n<p>rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>\r\n\r\n<p>&nbsp;</p>', 'text', 0, 'pl', '2020-03-29 16:46:49', '2020-06-24 19:06:57'),
(9, 1, 'text9', '<h2>occasionally circumstances</h2>\r\n\r\n<h3>nd expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences th</h3>', 'text', 0, 'pl', '2020-03-29 16:47:30', '2020-06-24 19:06:57'),
(10, 1, 'text10', '<h3>beatae vitae dicta sunt explicabo. Nemo enim ipsam?</h3>\r\n\r\n<h4>because occasionally circumstances occur</h4>', 'text', 0, 'pl', '2020-03-29 16:50:27', '2020-06-24 19:06:57'),
(11, 1, 'text11', '<h3>Lorem ipsum dolor sit amet, consectetur adipisicingsdf</h3>\r\n\r\n<h4>aspernatur aut consectetur debitis doloremque ducimus enim doloremque ducimus enim enim doloremque ducimus enim enim doloremque</h4>', 'text', 0, 'pl', '2020-03-29 16:53:21', '2020-03-29 16:54:05'),
(12, 1, 'text12', '<h2>builder of human</h2>', 'text', 0, 'pl', '2020-03-29 16:54:12', '2020-06-24 19:06:57'),
(13, 2, 'text13', '<h2>error sit voluptatem</h2>\r\n\r\n<h3>beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</h3>', 'text', 0, 'pl', '2020-03-29 17:35:31', '2020-06-24 19:13:22'),
(14, 3, 'text14', '<h2>Galeria</h2>\r\n\r\n<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aspernatur aut consectetur debitis doloremque ducimus enim fuga iste itaque molestias neque nobis, possimus sit unde</h3>', 'text', 0, 'pl', '2020-03-29 17:57:31', '2020-03-29 17:57:40'),
(15, 4, 'text15', '<h2>enim ad minima veniam</h2>\r\n\r\n<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aspernatur aut consectetur debitis doloremque ducimus enim fuga iste itaque molestias neque nobis, possimus sit unde</h3>', 'text', 0, 'pl', '2020-03-29 18:10:37', '2020-06-24 19:16:54'),
(16, 4, 'text16', '<p>d ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci</p>', 'text', 0, 'pl', '2020-03-29 18:11:21', '2020-06-24 19:16:54');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `source_table`, `source_id`, `gallery_name`, `gallery_lang`, `created_at`, `updated_at`) VALUES
(1, 'page', 1, 'slider', 'pl', '2020-03-29 16:38:34', '2020-03-29 16:38:34'),
(2, 'offer', 1, 'gallery1', 'pl', '2020-03-29 16:58:21', '2020-03-29 16:58:21'),
(3, 'offer', 2, 'gallery1', 'pl', '2020-03-29 16:58:29', '2020-03-29 16:58:29'),
(4, 'offer', 3, 'gallery1', 'pl', '2020-03-29 16:58:37', '2020-03-29 16:58:37'),
(5, 'offer', 4, 'gallery1', 'pl', '2020-03-29 16:58:48', '2020-03-29 16:58:48'),
(6, 'offer', 5, 'gallery1', 'pl', '2020-03-29 16:58:59', '2020-03-29 16:58:59'),
(7, 'offer', 6, 'gallery1', 'pl', '2020-03-29 16:59:16', '2020-03-29 16:59:16'),
(8, 'offer', 7, 'gallery1', 'pl', '2020-03-29 16:59:25', '2020-03-29 16:59:25'),
(9, 'offer', 8, 'gallery1', 'pl', '2020-03-29 16:59:34', '2020-03-29 16:59:34'),
(13, 'realization', 1, 'gallery1', 'pl', '2020-03-29 18:39:26', '2020-03-29 18:39:26'),
(14, 'realization', 2, 'gallery1', 'pl', '2020-03-29 18:39:46', '2020-03-29 18:39:46'),
(15, 'page', 3, 'gallery1', 'pl', '2020-06-24 19:14:32', '2020-06-24 19:14:32'),
(16, 'page', 4, 'gallery1', 'pl', '2020-06-24 19:17:08', '2020-06-24 19:17:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gallery_item`
--

INSERT INTO `gallery_item` (`id_gallery_item`, `id_gallery`, `gallery_item_src`, `gallery_item_title`, `gallery_item_position`, `gallery_item_lang`, `gallery_item_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'gallery/gallery_1/1593024954.jpg', 'Harley Davidson Lorem ipsum dolor sit amet, consectetur adipiscing elit', 0, 'pl', 1, '2020-03-29 16:38:55', '2020-06-24 18:55:55'),
(2, 1, 'gallery/gallery_1/1593024965.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit', 0, 'pl', 1, '2020-03-29 16:39:30', '2020-06-24 18:56:06'),
(3, 1, 'gallery/gallery_1/1593024972.jpg', 'Dolor sit amet, consectetur adipiscing elit adipiscing elit', 0, 'pl', 1, '2020-03-29 16:39:39', '2020-06-24 18:56:12'),
(4, 2, 'gallery/gallery_2/1593025716.jpg', NULL, 0, 'pl', 1, '2020-03-29 17:47:06', '2020-06-24 19:08:37'),
(5, 3, 'gallery/gallery_3/1593025734.jpg', NULL, 0, 'pl', 1, '2020-03-29 17:47:26', '2020-06-24 19:08:56'),
(6, 4, 'gallery/gallery_4/1593025745.jpg', NULL, 0, 'pl', 1, '2020-03-29 17:47:49', '2020-06-24 19:09:06'),
(7, 5, 'gallery/gallery_5/1593025755.jpg', NULL, 0, 'pl', 1, '2020-03-29 17:48:02', '2020-06-24 19:09:15'),
(8, 6, 'gallery/gallery_6/1593026044.jpg', NULL, 0, 'pl', 1, '2020-03-29 17:48:17', '2020-06-24 19:14:04'),
(9, 7, 'gallery/gallery_7/1593025775.webp', NULL, 0, 'pl', 1, '2020-03-29 17:48:31', '2020-06-24 19:09:36'),
(10, 8, 'gallery/gallery_8/1585504125.jpg', NULL, 0, 'pl', 1, '2020-03-29 17:48:45', '2020-03-29 17:48:45'),
(11, 9, 'gallery/gallery_9/1585504140.jpg', NULL, 0, 'pl', 1, '2020-03-29 17:49:00', '2020-03-29 17:49:00'),
(61, 15, 'gallery/gallery_15/159302607958.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:14:39', '2020-06-24 19:14:39'),
(62, 15, 'gallery/gallery_15/15930260795.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:14:39', '2020-06-24 19:14:39'),
(68, 15, 'gallery/gallery_15/159302610843.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:15:08', '2020-06-24 19:15:08'),
(69, 15, 'gallery/gallery_15/159302610994.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:15:09', '2020-06-24 19:15:09'),
(70, 15, 'gallery/gallery_15/15930261092.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:15:09', '2020-06-24 19:15:09'),
(74, 15, 'gallery/gallery_15/159302613194.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:15:31', '2020-06-24 19:15:31'),
(75, 15, 'gallery/gallery_15/159302613156.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:15:31', '2020-06-24 19:15:31'),
(76, 15, 'gallery/gallery_15/159302614511.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:15:45', '2020-06-24 19:15:45'),
(77, 15, 'gallery/gallery_15/159302614512.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:15:45', '2020-06-24 19:15:45'),
(78, 15, 'gallery/gallery_15/159302615494.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:15:54', '2020-06-24 19:15:54'),
(79, 15, 'gallery/gallery_15/159302615536.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:15:55', '2020-06-24 19:15:55'),
(80, 16, 'gallery/gallery_16/159302623735.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:17:17', '2020-06-24 19:17:17'),
(81, 16, 'gallery/gallery_16/159302623863.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:17:18', '2020-06-24 19:17:18'),
(82, 16, 'gallery/gallery_16/159302623898.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:17:18', '2020-06-24 19:17:18'),
(83, 16, 'gallery/gallery_16/159302625085.jpg', NULL, 0, 'pl', 1, '2020-06-24 19:17:30', '2020-06-24 19:17:30');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `offer`
--

INSERT INTO `offer` (`id_offer`, `id_seo`, `offer_title`, `offer_lead`, `offer_text`, `offer_price`, `offer_external_url`, `offer_position`, `offer_status`, `created_at`, `updated_at`) VALUES
(1, 7, 'Lorem ipsum dolor sit', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NULL, 0, 1, '2020-03-29 16:58:21', '2020-06-24 18:43:53'),
(2, 8, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris&nbsp;</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NULL, 0, 1, '2020-03-29 16:58:29', '2020-06-24 18:44:44'),
(3, 9, 'Lorem ipsum dolor', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NULL, 0, 1, '2020-03-29 16:58:37', '2020-06-24 18:44:58'),
(4, 10, 'Consectetur adipiscing elit', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut e</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, NULL, 0, 1, '2020-03-29 16:58:48', '2020-06-24 18:45:10'),
(5, 11, 'Voluptatem accusantium doloremque', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', NULL, NULL, 0, 1, '2020-03-29 16:58:59', '2020-06-24 18:46:11'),
(6, 12, 'Quae ab illo inventore veritatis', '<p>Iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam</p>', NULL, NULL, 0, 1, '2020-03-29 16:59:16', '2020-06-24 18:46:42');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `page`
--

INSERT INTO `page` (`id_page`, `id_seo`, `page_name`, `page_module`, `page_position`, `page_status`, `page_lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Strona główna', 'default', 0, 1, 'pl', '2020-03-29 13:12:27', '2020-03-29 13:12:27'),
(2, 2, 'Oferta', 'offer', 0, 1, 'pl', '2020-03-29 13:13:00', '2020-03-29 13:13:00'),
(3, 3, 'Galeria', 'default', 0, 1, 'pl', '2020-03-29 13:13:09', '2020-03-29 13:13:09'),
(4, 4, 'Realizacje', 'default', 0, 1, 'pl', '2020-03-29 13:13:17', '2020-06-24 19:18:18'),
(6, 6, 'Kontakt', 'default', 0, 1, 'pl', '2020-03-29 13:13:38', '2020-03-29 13:13:38');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `realization`
--

INSERT INTO `realization` (`id_realization`, `id_seo`, `realization_title`, `realization_lead`, `realization_text`, `realization_img`, `realization_position`, `realization_status`, `created_at`, `updated_at`) VALUES
(1, 15, 'Opinia 1', 'Aperiam Consequatur', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias corporis delectus eum, exercitationem, fuga fugit ipsam mollitia nemo non omnis quasi quo saepe sunt voluptates. Eligendi est maxime voluptates? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aut autem cum earum eius eveniet minima modi possimus quae quisquam, soluta, vitae voluptates? Aperiam consequatur delectus eaque odit veniam voluptatum.</p>', NULL, 0, 1, '2020-03-29 18:39:26', '2020-03-29 18:39:26'),
(2, 16, 'Opinia 2', 'Vitae Voluptates', '<p>A alias corporis delectus eum, exercitationem, fuga fugit ipsam mollitia nemo non omnis quasi quo saepe sunt voluptates. Eligendi est maxime voluptates? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aut autem cum earum eius eveniet minima modi possimus quae quisquam, soluta, vitae voluptates?&nbsp;</p>', NULL, 0, 1, '2020-03-29 18:39:46', '2020-03-29 18:39:46');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `seo`
--

INSERT INTO `seo` (`id_seo`, `url`, `seo_title`, `seo_tags`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, '/', 'Strona główna', NULL, NULL, '2020-03-29 13:12:27', '2020-03-29 13:12:27'),
(2, 'oferta', 'Oferta', NULL, NULL, '2020-03-29 13:13:00', '2020-03-29 13:13:00'),
(3, 'galeria', 'Galeria', NULL, NULL, '2020-03-29 13:13:09', '2020-03-29 13:13:09'),
(4, 'realizacje', 'Realizacje', NULL, NULL, '2020-03-29 13:13:17', '2020-06-24 19:18:19'),
(6, 'kontakt', 'Kontakt', NULL, NULL, '2020-03-29 13:13:38', '2020-03-29 13:13:38'),
(7, 'oferta/lorem-ipsum-dolor-sit', 'Lorem ipsum dolor sit', NULL, NULL, '2020-03-29 16:58:21', '2020-06-24 18:43:53'),
(8, 'oferta/lorem-ipsum-dolor-sit-amet', 'Lorem ipsum dolor sit amet', NULL, NULL, '2020-03-29 16:58:29', '2020-06-24 18:44:44'),
(9, 'oferta/lorem-ipsum-dolor', 'Lorem ipsum dolor', NULL, NULL, '2020-03-29 16:58:37', '2020-06-24 18:44:58'),
(10, 'oferta/consectetur-adipiscing-elit', 'Consectetur adipiscing elit', NULL, NULL, '2020-03-29 16:58:48', '2020-06-24 18:45:10'),
(11, 'oferta/voluptatem-accusantium-doloremque', 'Voluptatem accusantium doloremque', NULL, NULL, '2020-03-29 16:58:59', '2020-06-24 18:46:11'),
(12, 'oferta/quae-ab-illo-inventore-veritatis', 'Quae ab illo inventore veritatis', NULL, NULL, '2020-03-29 16:59:16', '2020-06-24 18:46:42'),
(15, 'opinia-1', 'Opinia 1', NULL, NULL, '2020-03-29 18:39:26', '2020-03-29 18:39:26'),
(16, 'opinia-2', 'Opinia 2', NULL, NULL, '2020-03-29 18:39:46', '2020-03-29 18:39:46');

-- --------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@tomsolution.pl', '$2y$10$Ip1N0agUeWpSisiJf2vHx.VqcnN74LrM6C3oaohwqHadtgDO5hFiu', '', NULL, '2020-06-24 18:35:58', '2020-06-24 18:35:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
