-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 22 2016 г., 15:15
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `new`
--

-- --------------------------------------------------------

--
-- Структура таблицы `inventars`
--

CREATE TABLE `inventars` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `inventar_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `inventars`
--

INSERT INTO `inventars` (`id`, `product_id`, `inventar_nr`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '111', 'brivs', NULL, '2016-10-11 21:25:15', '2016-10-19 17:59:23'),
(2, 1, '112', 'brivs', NULL, '2016-10-11 21:27:16', '2016-10-19 17:59:23'),
(3, 2, '222', 'brivs', NULL, '2016-10-11 21:39:01', '2016-10-17 11:42:02'),
(5, 18, 'aaa543', 'brivs', NULL, '2016-10-12 12:59:14', '2016-10-12 12:59:14'),
(6, 1, '123141', 'aiznemts', '1', '2016-10-13 12:57:32', '2016-10-19 12:26:45'),
(7, 1, '21', 'brivs', NULL, '2016-10-13 12:58:10', '2016-10-13 15:41:28'),
(8, 12, '123', 'brivs', NULL, '2016-10-13 13:00:52', '2016-10-19 17:59:23'),
(9, 1, '1234', 'brivs', NULL, '2016-10-13 13:01:01', '2016-10-13 13:01:01'),
(10, 1, '12341', 'brivs', NULL, '2016-10-13 13:02:43', '2016-10-13 13:02:43'),
(11, 1, '1231231', 'brivs', NULL, '2016-10-13 13:03:08', '2016-10-13 13:03:08'),
(12, 1, '321', 'brivs', NULL, '2016-10-13 13:04:56', '2016-10-13 13:04:56'),
(13, 1, '21241', 'brivs', NULL, '2016-10-13 13:05:49', '2016-10-13 13:05:49'),
(14, 1, '11111', 'brivs', NULL, '2016-10-13 14:02:02', '2016-10-13 14:02:02');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_24_111039_create_preces_table', 1),
('2016_09_25_074136_create_archive_table', 1),
('2016_10_01_143730_create_norakstits_table', 2),
('2016_10_06_103453_entrust_setup_tables', 3),
('2016_10_11_170309_create_inventar_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `norakstits`
--

CREATE TABLE `norakstits` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` text COLLATE utf8_unicode_ci NOT NULL,
  `inventar_nr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statuss` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `choices` enum('gb.','iepk.','komp.','m') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `norakstits`
--

INSERT INTO `norakstits` (`id`, `product_name`, `inventar_nr`, `statuss`, `user_id`, `amount`, `choices`, `created_at`, `updated_at`) VALUES
(1, 'Tīkla kabelis 305m', NULL, '', NULL, 10, 'm', '2016-10-05 18:47:20', '2016-10-13 17:43:31'),
(2, 'Tīkla kabelis 305m', NULL, '', NULL, 9, 'm', '2016-10-05 18:58:58', '2016-10-13 17:43:31'),
(3, 'Tīkla kabelis 305m', NULL, '', NULL, 10, 'm', '2016-10-05 19:32:53', '2016-10-13 17:43:31'),
(4, 'Tīkla kabelis 305m', NULL, '', NULL, 10, 'm', '2016-10-05 19:42:52', '2016-10-13 17:43:31'),
(5, 'Tīkla kabelis 305m', NULL, '', NULL, 0, 'm', '2016-10-12 12:28:27', '2016-10-13 17:43:31'),
(6, 'Tīkla kabelis 305m', NULL, '', NULL, 10, 'm', '2016-10-12 12:29:18', '2016-10-13 17:43:31'),
(7, 'Skrūvgriezis ar uzgaļiem 29gab', NULL, '', NULL, 10, 'komp.', '2016-10-12 12:48:56', '2016-10-13 17:43:32'),
(8, 'Tīkla kabelis 305m', NULL, '', NULL, 10, 'm', '2016-10-12 22:36:09', '2016-10-13 17:43:32'),
(18, 'Tīkla kabelis 305m', NULL, NULL, NULL, 10, 'm', '2016-10-13 15:49:20', '2016-10-13 15:49:20'),
(19, 'Tīkla kabelis 305m', NULL, NULL, NULL, 0, 'm', '2016-10-13 15:49:26', '2016-10-13 15:49:26'),
(20, 'Tīkla kabelis 305m', NULL, NULL, NULL, 0, 'm', '2016-10-13 15:53:14', '2016-10-13 15:53:14');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivered_at` date NOT NULL,
  `product_name` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(21) NOT NULL,
  `choices` enum('gb.','iepk.','komp.','m') COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `invoice_nr`, `provider`, `delivered_at`, `product_name`, `amount`, `choices`, `note`, `created_at`, `updated_at`) VALUES
(1, 'SFP-002291', 'SIA SF Projekts', '2016-06-16', 'Tīkla kabelis 305m', 10, 'm', '', '2016-09-11 12:02:54', '2016-10-13 12:53:18'),
(2, 'SFP-002291', 'SIA SF Projekts', '2016-06-16', 'Neilona savilcējs 2.5x100mm 100 g', 50, 'iepk.', '', '2016-09-11 12:02:54', '2016-10-12 09:17:47'),
(3, 'SFP-002291', 'SIA SF Projekts', '2016-06-16', 'Skrūvgriezis ar akumulatoru Bosch PSR 1200', 5, 'gb.', '', '2016-09-11 12:02:54', '2016-10-12 09:17:56'),
(4, 'SFP-002291', 'SIA SF Projekts', '2016-06-16', 'Lāzera tālmērs Bosch PSR 1200', 2, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(5, 'SFP-002291', 'SIA SF Projekts', '2016-06-16', 'Mērlente ar magn. 8mx25', 5, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(6, 'SFP-002291', 'SIA SF Projekts', '2016-06-16', 'Nazītis ar fiksatoru 18mm asm.', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(7, 'SFP-002291', 'SIA SF Projekts', '2016-06-16', 'Kāpnes AL trīsdaļīgas multif 3x7', 1, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(8, 'SFP-002291', 'SIA SF Projekts', '2016-06-16', 'Instr. OK ar somu 40 gab', 5, 'komp.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(9, 'SFP-002291', 'SIA SF Projekts', '2016-06-16', 'Skrūvgriezis ar uzgaļiem 29gab', 10, 'komp.', '', '2016-09-11 12:02:54', '2016-10-12 09:49:13'),
(10, 'SFP-002291', 'SIA SF Projekts', '2016-06-16', 'Knaibles 160mm', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(11, 'ART11603021', 'Argus RT, SIA', '2016-06-22', 'Opt. Patch LC/SC spr.2.00m Multimode OM2', 5, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(12, 'ART11602988', 'Argus RT, SIA', '2016-06-20', 'UPS Cobalt 960+ mājai/ofisam 960V/A 480W', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(13, 'ART11602988', 'Argus RT, SIA', '2016-06-20', 'Vads USB A spraudnis ligzda 5m USB2.0 high', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(14, 'ART11602988', 'Argus RT, SIA', '2016-06-20', 'Vads Mini Display port S uz HDMI L 0.2m', 5, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(15, 'ART11602988', 'Argus RT, SIA', '2016-06-20', 'Modul. Spraudnis RJ45 Apaļam Cietam kabelim', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(16, 'ART11602988', 'Argus RT, SIA', '2016-06-20', 'Gumijas protektors 8p spraudņiem Pelēks', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(17, 'ART11602988', 'Argus RT, SIA', '2016-06-20', 'Analog Tone & Probe kit ģenerators', 2, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(18, 'ART11602988', 'Argus RT, SIA', '2016-06-20', 'Barošanas adapteris 2xRJ45 un 5.5/2.1mm ligzda', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(19, 'MSR 116644', 'Multisistēma Rīga SIA', '2016-06-21', 'Knaibles Multimodullar tooll RJ11/12/45 Loglink', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(20, 'MSR 116644', 'Multisistēma Rīga SIA', '2016-06-21', 'Kabelis VGA 15m/15m 15m Unitek Y-C507A', 8, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(21, 'MSR 116644', 'Multisistēma Rīga SIA', '2016-06-21', 'Panelis 19" Digitus Patch 24-portway UTP kat.5E (/A-DN-91524U)', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(22, 'MSR 116644', 'Multisistēma Rīga SIA', '2016-06-21', 'Tīkla rozete Equip - Network surface mount box - RJ45 X 2 - white 2XRJ45 cat 6 235212', 50, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(23, 'MSR 116644', 'Multisistēma Rīga SIA', '2016-06-21', 'Adapteris SC-SC MM duplex  ADSCSCUUMMD Klinkman', 15, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(24, 'MSR 116644', 'Multisistēma Rīga SIA', '2016-06-21', 'Pigtail SC 50/125 mkm MM simplex 2m', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(25, 'MSR 116644', 'Multisistēma Rīga SIA', '2016-06-21', 'Termocaurule', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(26, 'MSR 116644', 'Multisistēma Rīga SIA', '2016-06-21', 'Pāreja Cable ACC IN-LINE Coupier 8C Gembird/TA-350/1', 100, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(27, 'MSR 116644', 'Multisistēma Rīga SIA', '2016-06-21', 'Dators INTEL Computestick 32GB Win10 RAM 2GB Intel Processor X5-Z8300', 7, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(28, 'MSR 116644', 'Multisistēma Rīga SIA', '2016-06-21', 'Papildu modulis MikroTik S+85DLC03D 10GbE SFP=SR LC(MM) 85nm for CCR1036-8GB-2S+/EM Un', 4, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(29, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Monitoru kronšteins 4World Wall Mount for LCD 15"-22" VESA 75/100', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(30, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Atmiņa SODIMM 4Gb DDR3 1600Mhz PC12800 Kingston /KVR16S11S8/4/nocen', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(31, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'SSD datora disks SATA2.5" 120Gb Kingston SUV400S37/120G', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(32, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Dators CMD-N3150/GB-BACE-3150 GIGABYTE1xM.2 DDR3 SATA 1xD-sub, 1xHDMI, 4xUSB 3.0', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(33, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Monitors 19.5" Skārienjūtīgais ASUS VT207N', 9, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(34, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Diskdzinis DVD+RW 24X SATA Samsung (melns)', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(35, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Kabelis HDMI A - HDMI A Unitek 20m, premium. Y-C508A', 5, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(36, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Skaļruņi 2.1 Gembird Desktop Multimedia Stereo Speakers System, Output power 340W SPK631', 9, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(37, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Projektora turētājs Vogels PPC1555', 3, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(38, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Atmiņa USB 64Gb USB3.0 Kingston DTIG4/64GB', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(39, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Dokstacija cietam diskam HDD USB2.0 2.5&3.5" SATA Gembord HD32-U2S-3', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(40, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Pele Logitech optiskā USB B100 melna/910-003357/', 40, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(41, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Klaviatūra Logitech K120 USB RU/US /920-002506/', 4, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(42, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Austiņas Logitech Dialog-220 980177-0000', 11, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(43, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Mikrofons 57198 HAMA CS-198 Desktop', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(44, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Atmiņa 8Gb DDR3 1600Mhz PC12800 Kingston /KVR16LN11/8/', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(45, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Elektroniskā grāmata PocketBook Touch 624 PB624-Y-WW (melna)', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(46, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Video karte MSI GTX950 2Gb GDDR5 PCIE16 GTX 950 2GD5 OC', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(47, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Cietais disks 1Tb 2.5" USB3.0 StoreJet Transcend /TS1TSJ25M3B/Blue', 9, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(48, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Adapteris Wireless High Gain USB2.0 802.11n 300Mbps Edimax EW-7612UAn V2', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(49, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Planšetdators 10.1" Prestigio MultiPad Visconte 3 PMP811TDBS', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(50, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Print./kopēt./skeneris CANON i-SENSYS MF226dn Mono MFP', 3, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(51, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Cietais disks 2Tb/7200/6GB/S 64Mb Seagate /ST2000VX000/', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(52, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Cietais disks 1Tb 2.5" USB3.0 StoreJet Transcend /TS1TSJ25H3B/', 1, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(53, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Termopasta Arctic MX-2 Thermal Grease 8g', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(54, 'MSR 116643', 'Multisistēma Rīga SIA', '2016-06-21', 'Konvertieris HDMI to VGA+Audio Sandberg', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(55, 'MSR116672', 'Multisistēma Rīga SIA', '2016-06-29', 'Skaļruņi 2.1 Gembird Desktop Multimedia Stereo Speakers System, Output power 340W SPK631', 1, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(56, 'MSR116672', 'Multisistēma Rīga SIA', '2016-06-29', 'Projektor ceiling mount Vogels PPC1555', 5, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(57, 'MSR116672', 'Multisistēma Rīga SIA', '2016-06-29', 'Arduino Starter Kit with UNO board', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(58, 'MSR116672', 'Multisistēma Rīga SIA', '2016-06-29', 'ZyXEL Wireless AC750 Range Extender WRE6505', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(59, 'MSR116672', 'Multisistēma Rīga SIA', '2016-06-29', 'Skeneris EPSON Perfection V550 Photo', 5, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(60, 'MSR116672', 'Multisistēma Rīga SIA', '2016-06-29', 'Presenter Wireless R400 Logitech /910-001357/', 10, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(61, 'MSR116672', 'Multisistēma Rīga SIA', '2016-06-29', 'Klaviatūra Logitech K120 USB RU/US /920-002522/', 36, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(62, 'MSR116672', 'Multisistēma Rīga SIA', '2016-06-29', 'RouterBoard wAP ac Mikrotik (Balts) RBwAPG-5HacT2HnD', 16, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(63, 'MSR116672', 'Multisistēma Rīga SIA', '2016-06-29', 'Kabelis optiskais 90015001427D Opt kabelis A-DQ(ZN)B2y 8mm PE Klinkmann', 620, 'm', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(64, 'MSR116672', 'Multisistēma Rīga SIA', '2016-06-29', 'Kab. VGA 15M/15M 15m Unitek Y-C507A', 2, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(65, '', '', '2016-08-10', 'Monitors 23" Samsung', 20, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54'),
(66, 'ART11603716', 'Argus RT, SIA', '2016-08-10', 'Barošanas adapteris 2xRJ45 un 5.5/2.1mm ligzda', 30, 'gb.', '', '2016-09-11 12:02:54', '2016-09-11 12:02:54');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', NULL, '2016-09-28 16:58:28', '2016-09-28 16:58:34'),
(2, 'teacher', 'Teacher', NULL, '2016-10-06 10:56:21', '2016-10-06 10:56:24');

-- --------------------------------------------------------

--
-- Структура таблицы `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Richard Tagil', 'tagils@mail.ru', '$2y$10$aRyYfVgpgMRmtp45EpGtEObYMlukKvgVP7l8h8bjGvcOwHxsHWxMa', 'pRHPHdJ4aUzXWoQytNSkDBBd8VTnDh9bl4ABhZ8tn4NR36JbRc74b31Lhu3X', NULL, '2016-10-19 15:01:35'),
(2, 'TEST', 'test@mail.ru', '$2y$10$3eOsC5F65yzHCgIfjtsTPuJXPyYtpHFdniFtpFjA9VIlMX5njv2rO', NULL, '2016-10-22 10:08:42', '2016-10-22 10:09:14'),
(3, 'TEST 2', 'test2@mail.ru', '$2y$10$cxhACuwO1cjFn/oxD85SIOL7F6YWI82gYt3YFLf.voKh03WHzhlDq', NULL, '2016-10-22 10:08:54', '2016-10-22 10:09:25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `inventars`
--
ALTER TABLE `inventars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventars_product_id_foreign` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `inventar_nr` (`inventar_nr`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `norakstits`
--
ALTER TABLE `norakstits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `inventar_nr` (`inventar_nr`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Индексы таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Индексы таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `inventars`
--
ALTER TABLE `inventars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `norakstits`
--
ALTER TABLE `norakstits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `inventars`
--
ALTER TABLE `inventars`
  ADD CONSTRAINT `inventars_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `norakstits`
--
ALTER TABLE `norakstits`
  ADD CONSTRAINT `norakstits_ibfk_1` FOREIGN KEY (`inventar_nr`) REFERENCES `inventars` (`inventar_nr`);

--
-- Ограничения внешнего ключа таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
