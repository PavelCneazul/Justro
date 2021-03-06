-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 11 Oct 2017 la 02:01
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
-- Salvarea datelor din tabel `vehicle_brands`
--

INSERT INTO `vehicle_brands` (`id`, `name`, `description`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ALFA ROMEO                              ', 'ALFA ROMEO                              ', 1, NULL, '2017-04-06 11:36:15', '2017-04-06 11:36:15'),
(2, 'AUDI                                    ', 'AUDI                                    ', 1, NULL, '2017-04-06 11:36:15', '2017-04-06 11:36:15'),
(3, 'BMW                                     ', 'BMW                                     ', 1, NULL, '2017-04-06 11:36:15', '2017-04-06 11:36:15'),
(4, 'CHEVROLET                               ', 'CHEVROLET                               ', 1, NULL, '2017-04-06 11:36:16', '2017-04-06 11:36:16'),
(5, 'CHRYSLER                                ', 'CHRYSLER                                ', 1, NULL, '2017-04-06 11:36:16', '2017-04-06 11:36:16'),
(6, 'CITROEN                                 ', 'CITROEN                                 ', 1, NULL, '2017-04-06 11:36:16', '2017-04-06 11:36:16'),
(7, 'DACIA                                   ', 'DACIA                                   ', 1, NULL, '2017-04-06 11:36:17', '2017-04-06 11:36:17'),
(8, 'DAEWOO                                  ', 'DAEWOO                                  ', 1, NULL, '2017-04-06 11:36:17', '2017-04-06 11:36:17'),
(9, 'DAIHATSU                                ', 'DAIHATSU                                ', 1, NULL, '2017-04-06 11:36:17', '2017-04-06 11:36:17'),
(10, 'DODGE                                   ', 'DODGE                                   ', 1, NULL, '2017-04-06 11:36:17', '2017-04-06 11:36:17'),
(11, 'FIAT                                    ', 'FIAT                                    ', 1, NULL, '2017-04-06 11:36:18', '2017-04-06 11:36:18'),
(12, 'FORD                                    ', 'FORD                                    ', 1, NULL, '2017-04-06 11:36:18', '2017-04-06 11:36:18'),
(13, 'HONDA                                   ', 'HONDA                                   ', 1, NULL, '2017-04-06 11:36:18', '2017-04-06 11:36:18'),
(14, 'HYUNDAI                                 ', 'HYUNDAI                                 ', 1, NULL, '2017-04-06 11:36:19', '2017-04-06 11:36:19'),
(15, 'INFINITI                                ', 'INFINITI                                ', 1, NULL, '2017-04-06 11:36:19', '2017-04-06 11:36:19'),
(16, 'JAGUAR                                  ', 'JAGUAR                                  ', 1, NULL, '2017-04-06 11:36:19', '2017-04-06 11:36:19'),
(17, 'KIA                                     ', 'KIA                                     ', 1, NULL, '2017-04-06 11:36:19', '2017-04-06 11:36:19'),
(18, 'LADA                                    ', 'LADA                                    ', 1, NULL, '2017-04-06 11:36:20', '2017-04-06 11:36:20'),
(19, 'LANCIA                                  ', 'LANCIA                                  ', 1, NULL, '2017-04-06 11:36:20', '2017-04-06 11:36:20'),
(20, 'LEXUS                                   ', 'LEXUS                                   ', 1, NULL, '2017-04-06 11:36:20', '2017-04-06 11:36:20'),
(21, 'MASERATI                                ', 'MASERATI                                ', 1, NULL, '2017-04-06 11:36:20', '2017-04-06 11:36:20'),
(22, 'MAZDA                                   ', 'MAZDA                                   ', 1, NULL, '2017-04-06 11:36:20', '2017-04-06 11:36:20'),
(23, 'MERCEDES-BENZ                           ', 'MERCEDES-BENZ                           ', 1, NULL, '2017-04-06 11:36:21', '2017-04-06 11:36:21'),
(24, 'MG                                      ', 'MG                                      ', 1, NULL, '2017-04-06 11:36:21', '2017-04-06 11:36:21'),
(25, 'MINI (BMW)                              ', 'MINI (BMW)                              ', 1, NULL, '2017-04-06 11:36:21', '2017-04-06 11:36:21'),
(26, 'MITSUBISHI                              ', 'MITSUBISHI                              ', 1, NULL, '2017-04-06 11:36:21', '2017-04-06 11:36:21'),
(27, 'NISSAN                                  ', 'NISSAN                                  ', 1, NULL, '2017-04-06 11:36:22', '2017-04-06 11:36:22'),
(28, 'OPEL                                    ', 'OPEL                                    ', 1, NULL, '2017-04-06 11:36:22', '2017-04-06 11:36:22'),
(29, 'PEUGEOT                                 ', 'PEUGEOT                                 ', 1, NULL, '2017-04-06 11:36:23', '2017-04-06 11:36:23'),
(30, 'PORSCHE                                 ', 'PORSCHE                                 ', 1, NULL, '2017-04-06 11:36:23', '2017-04-06 11:36:23'),
(31, 'PROTON                                  ', 'PROTON                                  ', 1, NULL, '2017-04-06 11:36:24', '2017-04-06 11:36:24'),
(32, 'RENAULT                                 ', 'RENAULT                                 ', 1, NULL, '2017-04-06 11:36:24', '2017-04-06 11:36:24'),
(33, 'ROVER                                   ', 'ROVER                                   ', 1, NULL, '2017-04-06 11:36:24', '2017-04-06 11:36:24'),
(34, 'SAAB                                    ', 'SAAB                                    ', 1, NULL, '2017-04-06 11:36:24', '2017-04-06 11:36:24'),
(35, 'SEAT                                    ', 'SEAT                                    ', 1, NULL, '2017-04-06 11:36:25', '2017-04-06 11:36:25'),
(36, 'SKODA                                   ', 'SKODA                                   ', 1, NULL, '2017-04-06 11:36:25', '2017-04-06 11:36:25'),
(37, 'SMART                                   ', 'SMART                                   ', 1, NULL, '2017-04-06 11:36:26', '2017-04-06 11:36:26'),
(38, 'SSANGYONG                               ', 'SSANGYONG                               ', 1, NULL, '2017-04-06 11:36:26', '2017-04-06 11:36:26'),
(39, 'SUBARU                                  ', 'SUBARU                                  ', 1, NULL, '2017-04-06 11:36:26', '2017-04-06 11:36:26'),
(40, 'SUZUKI                                  ', 'SUZUKI                                  ', 1, NULL, '2017-04-06 11:36:26', '2017-04-06 11:36:26'),
(41, 'TOYOTA                                  ', 'TOYOTA                                  ', 1, NULL, '2017-04-06 11:36:26', '2017-04-06 11:36:26'),
(42, 'VOLVO                                   ', 'VOLVO                                   ', 1, NULL, '2017-04-06 11:36:27', '2017-04-06 11:36:27'),
(43, 'VOLKSWAGEN                                      ', 'VOLKSWAGEN                                      ', 1, NULL, '2017-04-06 11:36:27', '2017-04-06 11:36:27'),
(44, 'ARO                                     ', 'ARO                                     ', 1, NULL, '2017-04-06 11:36:28', '2017-04-06 11:36:28'),
(45, 'AVIA                                    ', 'AVIA                                    ', 1, NULL, '2017-04-06 11:36:28', '2017-04-06 11:36:28'),
(46, 'DAF                                     ', 'DAF                                     ', 3, NULL, '2017-04-06 11:36:28', '2017-04-06 11:36:28'),
(47, 'ISUZU                                   ', 'ISUZU                                   ', 3, NULL, '2017-04-06 11:36:30', '2017-04-06 11:36:30'),
(48, 'IVECO                                   ', 'IVECO                                   ', 3, NULL, '2017-04-06 11:36:30', '2017-04-06 11:36:30'),
(49, 'IVECO EURO CARGO                        ', 'IVECO EURO CARGO                        ', 1, NULL, '2017-04-06 11:36:34', '2017-04-06 11:36:34'),
(50, 'JELCZ                                   ', 'JELCZ                                   ', 1, NULL, '2017-04-06 11:36:36', '2017-04-06 11:36:36'),
(51, 'KAMAZ                                   ', 'KAMAZ                                   ', 1, NULL, '2017-04-06 11:36:36', '2017-04-06 11:36:36'),
(52, 'LAND ROVER                              ', 'LAND ROVER                              ', 1, NULL, '2017-04-06 11:36:36', '2017-04-06 11:36:36'),
(53, 'LIAZ                                    ', 'LIAZ                                    ', 3, NULL, '2017-04-06 11:36:36', '2017-04-06 11:36:36'),
(54, 'MAN                                     ', 'MAN                                     ', 1, NULL, '2017-04-06 11:36:36', '2017-04-06 11:36:36'),
(55, 'MAZ                                     ', 'MAZ                                     ', 1, NULL, '2017-04-06 11:36:42', '2017-04-06 11:36:42'),
(56, 'MITSUBISHI FUSO                         ', 'MITSUBISHI FUSO                         ', 1, NULL, '2017-04-06 11:36:51', '2017-04-06 11:36:51'),
(57, 'MULTICAR                                ', 'MULTICAR                                ', 1, NULL, '2017-04-06 11:36:51', '2017-04-06 11:36:51'),
(58, 'SCANIA                                  ', 'SCANIA                                  ', 3, NULL, '2017-04-06 11:36:56', '2017-04-06 11:36:56'),
(59, 'STAR                                    ', 'STAR                                    ', 3, NULL, '2017-04-06 11:36:58', '2017-04-06 11:36:58'),
(60, 'STEYR                                   ', 'STEYR                                   ', 3, NULL, '2017-04-06 11:36:59', '2017-04-06 11:36:59'),
(61, 'TATRA                                   ', 'TATRA                                   ', 3, NULL, '2017-04-06 11:36:59', '2017-04-06 11:36:59'),
(62, 'AEON                                    ', 'AEON                                    ', 2, NULL, '2017-04-06 11:37:03', '2017-04-06 11:37:03'),
(63, 'ALPHA                                   ', 'ALPHA                                   ', 2, NULL, '2017-04-06 11:37:03', '2017-04-06 11:37:03'),
(64, 'APRILIA                                 ', 'APRILIA                                 ', 2, NULL, '2017-04-06 11:37:03', '2017-04-06 11:37:03'),
(65, 'ATALA                                   ', 'ATALA                                   ', 2, NULL, '2017-04-06 11:37:03', '2017-04-06 11:37:03'),
(66, 'BAJAJ                                   ', 'BAJAJ                                   ', 2, NULL, '2017-04-06 11:37:03', '2017-04-06 11:37:03'),
(67, 'BENELLI                                 ', 'BENELLI                                 ', 2, NULL, '2017-04-06 11:37:03', '2017-04-06 11:37:03'),
(68, 'BETAMOTOR                               ', 'BETAMOTOR                               ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(69, 'BIMOTA                                  ', 'BIMOTA                                  ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(70, 'BUELL                                   ', 'BUELL                                   ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(71, 'CAGIVA                                  ', 'CAGIVA                                  ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(72, 'CAN-AM BOMBARDIER                       ', 'CAN-AM BOMBARDIER                       ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(73, 'CEZET                                   ', 'CEZET                                   ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(74, 'CPI                                     ', 'CPI                                     ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(75, 'DAELIM                                  ', 'DAELIM                                  ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(76, 'DERBI                                   ', 'DERBI                                   ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(77, 'DNEPR                                   ', 'DNEPR                                   ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(78, 'DUCATI                                  ', 'DUCATI                                  ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(79, 'FANTIC                                  ', 'FANTIC                                  ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(80, 'GARELLI                                 ', 'GARELLI                                 ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(81, 'GAS GAS                                 ', 'GAS GAS                                 ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(82, 'GENERIC                                 ', 'GENERIC                                 ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(83, 'GILERA                                  ', 'GILERA                                  ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(84, 'HARLEY-DAVIDSON                         ', 'HARLEY-DAVIDSON                         ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(85, 'HERCULES                                ', 'HERCULES                                ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(86, 'HUSABERG                                ', 'HUSABERG                                ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(87, 'HUSQVARNA                               ', 'HUSQVARNA                               ', 2, NULL, '2017-04-06 11:37:04', '2017-04-06 11:37:04'),
(88, 'HYOSUNG                                 ', 'HYOSUNG                                 ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(89, 'ITALJET                                 ', 'ITALJET                                 ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(90, 'JAWA                                    ', 'JAWA                                    ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(91, 'JIALING / ZONG-SHEN                     ', 'JIALING / ZONG-SHEN                     ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(92, 'JINCHENG                                ', 'JINCHENG                                ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(93, 'JUNAK                                   ', 'JUNAK                                   ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(94, 'KAWASAKI                                ', 'KAWASAKI                                ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(95, 'KEEWAY                                  ', 'KEEWAY                                  ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(96, 'KOMAR                                   ', 'KOMAR                                   ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(97, 'KTM                                     ', 'KTM                                     ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(98, 'KYMCO                                   ', 'KYMCO                                   ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(99, 'LAVERDA                                 ', 'LAVERDA                                 ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(100, 'LIFAN                                   ', 'LIFAN                                   ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(101, 'MAL                                     ', 'MAL                                     ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(102, 'MALAGUTI                                ', 'MALAGUTI                                ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(103, 'MBK                                     ', 'MBK                                     ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(104, 'MINSK                                   ', 'MINSK                                   ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(105, 'MORINI                                  ', 'MORINI                                  ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(106, 'MOTOBI                                  ', 'MOTOBI                                  ', 2, NULL, '2017-04-06 11:37:05', '2017-04-06 11:37:05'),
(107, 'MOTOGUZZI                               ', 'MOTOGUZZI                               ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(108, 'MV AUGUSTA                              ', 'MV AUGUSTA                              ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(109, 'MZ/MUZ                                  ', 'MZ/MUZ                                  ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(110, 'P.G.O.                                  ', 'P.G.O.                                  ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(111, 'PIAGGIO / VESPA                         ', 'PIAGGIO / VESPA                         ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(112, 'POLARIS                                 ', 'POLARIS                                 ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(113, 'PRAGA                                   ', 'PRAGA                                   ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(114, 'PUCH / HERO PUCH                        ', 'PUCH / HERO PUCH                        ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(115, 'QUEST                                   ', 'QUEST                                   ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(116, 'RIEJU                                   ', 'RIEJU                                   ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(117, 'RM MOTOR                                ', 'RM MOTOR                                ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(118, 'ROMET                                   ', 'ROMET                                   ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(119, 'ROYAL ENFIELD BULLET                    ', 'ROYAL ENFIELD BULLET                    ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(120, 'SACHS                                   ', 'SACHS                                   ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(121, 'SIAMOTO                                 ', 'SIAMOTO                                 ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(122, 'SIMSON                                  ', 'SIMSON                                  ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(123, 'SOLO                                    ', 'SOLO                                    ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(124, 'SUNDIRO                                 ', 'SUNDIRO                                 ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(125, 'SYM                                     ', 'SYM                                     ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(126, 'TGB                                     ', 'TGB                                     ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(127, 'TM RACING                               ', 'TM RACING                               ', 2, NULL, '2017-04-06 11:37:06', '2017-04-06 11:37:06'),
(128, 'TOMOS                                   ', 'TOMOS                                   ', 2, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(129, 'TRIUMPH                                 ', 'TRIUMPH                                 ', 2, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(130, 'URAL                                    ', 'URAL                                    ', 2, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(131, 'VERTEMATI                               ', 'VERTEMATI                               ', 2, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(132, 'VOR                                     ', 'VOR                                     ', 2, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(133, 'VOXAN                                   ', 'VOXAN                                   ', 2, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(134, 'WFM                                     ', 'WFM                                     ', 2, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(135, 'YAMAHA                                  ', 'YAMAHA                                  ', 2, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(136, 'ZIPP                                    ', 'ZIPP                                    ', 2, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(137, 'Altele', 'Altele', 1, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(138, 'Altele', 'Altele', 2, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(139, 'Altele', 'Altele', 3, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(140, 'Altele', 'Altele', 4, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(141, 'Altele', 'Altele', 5, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(142, 'Altele', 'Altele', 6, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(143, 'Altele', 'Altele', 7, NULL, '2017-04-06 11:37:07', '2017-04-06 11:37:07'),
(144, 'MAN', NULL, 4, '2017-04-19 12:59:26', '2017-04-19 12:58:52', '2017-04-19 12:59:26'),
(145, 'Man', NULL, 3, NULL, '2017-04-19 12:59:34', '2017-04-19 12:59:34'),
(146, 'Mercedes Benz', NULL, 3, NULL, '2017-04-19 13:02:03', '2017-04-19 13:02:03'),
(147, 'SCHMITZ', NULL, 6, NULL, '2017-04-20 07:21:52', '2017-04-20 07:21:52'),
(148, 'VOLVO', NULL, 3, NULL, '2017-04-20 08:11:09', '2017-04-20 08:11:09'),
(149, 'RENAULT', NULL, 3, NULL, '2017-04-24 08:19:24', '2017-04-24 08:19:24'),
(150, 'FORD', NULL, 3, NULL, '2017-04-24 13:33:27', '2017-04-24 13:33:27'),
(151, 'Krone', NULL, 6, NULL, '2017-04-25 08:30:17', '2017-04-25 08:30:17'),
(152, 'MERCEDES BENZ', NULL, 5, NULL, '2017-04-26 11:26:49', '2017-04-26 11:26:49'),
(153, 'Mercedes-Benz', NULL, 3, NULL, '2017-04-27 07:38:59', '2017-04-27 07:38:59'),
(154, 'BREDA', NULL, 5, NULL, '2017-05-17 11:53:48', '2017-05-17 11:53:48'),
(155, 'JEEP', NULL, 2, '2017-05-19 07:29:45', '2017-05-19 07:29:30', '2017-05-19 07:29:45'),
(156, 'JEEP', NULL, 1, NULL, '2017-05-19 07:29:55', '2017-05-19 07:29:55'),
(157, 'CADILLAC', NULL, 1, NULL, '2017-05-24 14:59:32', '2017-05-24 14:59:32'),
(158, 'Rema', NULL, 6, NULL, '2017-06-12 12:18:15', '2017-06-12 12:18:15'),
(159, 'ROLFO', NULL, 6, NULL, '2017-06-12 12:54:35', '2017-06-12 12:54:35'),
(160, 'HM', NULL, 2, NULL, '2017-06-13 08:02:57', '2017-06-13 08:02:57'),
(161, 'Piaggio', NULL, 1, NULL, '2017-06-13 12:19:44', '2017-06-13 12:19:44'),
(162, 'Meier', NULL, 6, NULL, '2017-06-13 12:52:53', '2017-06-13 12:52:53'),
(163, 'Honda', NULL, 2, NULL, '2017-06-15 06:25:22', '2017-06-15 06:25:22'),
(164, 'VanHool', NULL, 6, NULL, '2017-06-20 10:36:54', '2017-06-20 10:36:54'),
(165, 'Suzuki', NULL, 2, NULL, '2017-06-21 07:00:45', '2017-06-21 07:00:45'),
(166, 'Setra', NULL, 5, NULL, '2017-07-27 04:49:51', '2017-07-27 04:49:51'),
(167, 'SCHWARZMULLER', NULL, 6, NULL, '2017-08-01 14:10:32', '2017-08-01 14:10:32'),
(168, 'Kogel', NULL, 6, NULL, '2017-08-29 11:55:32', '2017-08-29 11:55:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
