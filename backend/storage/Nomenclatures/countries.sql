-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 11 Oct 2017 la 01:57
-- Versiune server: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baar`
--

--
-- Salvarea datelor din tabel `countries`
--

INSERT INTO `countries` (`id`, `name`, `name_ro`, `code`, `rmu_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Romania', 'Romania', 'RO', 1, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(2, 'Islands', 'Islanda', 'IS', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(3, 'Albania', 'Albania', 'AL', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(4, 'Andorra', 'Andora', 'AND', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(5, 'Belarus', 'Belarus', 'BY', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(6, 'Belgium', 'Belgia', 'B', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(7, 'Bosnia and Herzegovina', 'Bosnia si Hertegovina', 'BH', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(8, 'Bulgaria', 'Bulgaria', 'BG', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(9, 'Denmark', 'Danemarca', 'DK', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(10, 'Germany', 'Germania', 'D', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(11, 'Estonia', 'Estonia', 'EST', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(12, 'Faroe Islands', 'Insulele Feroe', 'FO', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(13, 'Finland', 'Finlanda', 'FIN', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(14, 'France', 'Franta', 'F', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(15, 'Gibraltar', 'Gibraltar', 'GI', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(16, 'Greece', 'Grecia', 'GR', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(17, 'Guernsey', 'Insula Guernsey', 'GG', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(18, 'Isle of Man', 'Insula Man', 'IM', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(19, 'Ireland', 'Irlanda', 'IRL', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(20, 'Iceland', 'Islanda', 'IS', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(21, 'Italy', 'Italia', 'I', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(22, 'Jersey', 'Insula Jersey', 'JE', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(23, 'Kosovo', 'Kosovo', 'XK', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(24, 'Croatia', 'Croatia', 'HR', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(25, 'Latvia', 'Letonia', 'LV', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(26, 'Liechtenstein', 'Liechtenstein', 'LI', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(27, 'Lithuania', 'Lituania', 'LT', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(28, 'Luxembourg', 'Luxembourg', 'L', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(29, 'Malta', 'Malta', 'M', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(30, 'Macedonia', 'Macedonia', 'MK', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(31, 'Moldova', 'Moldova', 'MD', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(32, 'Monaco', 'Monaco', 'MC', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(33, 'Montenegro', 'Muntenegru', 'MNE', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(34, 'Netherlands', 'Olanda', 'NL', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(35, 'Norway', 'Norvegia', 'N', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(36, 'Austria', 'Austria', 'A', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(37, 'Poland', 'Polonia', 'PL', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(38, 'Portugal', 'Portugalia', 'P', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(39, 'Russia', 'Rusia', 'RU', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(40, 'San Marino', 'San Marino', 'SM', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(41, 'Sweden', 'Suedia', 'S', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(42, 'Switzerland', 'Elvetia', 'CH', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(43, 'Serbia', 'Serbia', 'SRB', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(44, 'Slovakia', 'Slovacia', 'SK', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(45, 'Slovenia', 'Slovenia', 'SLO', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(46, 'Spain', 'Spania', 'E', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(47, 'Svalbard', 'Insula Svalbard', 'SJ', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(48, 'Czech Republic', 'Cehia', 'CZ', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(49, 'Ukraine', 'Ucraina', 'UA', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(50, 'Hungary', 'Ungaria', 'H', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(51, 'Holy See (Vatican City)', 'Vatican', 'VA', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(52, 'United Kingdom', 'Marea Britanie', 'GB', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(53, 'Altele', 'Altele', 'ALT', 99, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(54, 'Azerbaijan', 'Azerbaijan', 'AZ', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(55, 'Israel', 'Israel', 'IL', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(56, 'Maroc', 'Maroc', 'MA', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(57, 'Cypru', 'Cipru', 'CY', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(58, 'Rusia', 'Rusia', 'RUS', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(59, 'Suedia', 'Suedia', 'S', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(60, 'Tunisia', 'Tunisia', 'TN', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(61, 'Turcia', 'Turcia', 'TR', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(62, 'Ukraina', 'Ucraina', 'UA', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(63, 'Hungary', 'Ungaria', 'H', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL),
(64, 'Iran', 'Iran ', 'IR', 0, '2017-04-06 11:33:18', '2017-04-11 15:06:55', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
