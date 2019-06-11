-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 11 Oct 2017 la 02:00
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
-- Salvarea datelor din tabel `vehicle_categories`
--

INSERT INTO `vehicle_categories` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'A', 'A - autoturism', NULL, '2017-04-06 11:36:12', '2017-04-06 11:36:12'),
(2, 'B', 'B - motociclu', NULL, '2017-04-06 11:36:12', '2017-04-06 11:36:12'),
(3, 'C', 'C - autocamion sau tractor', NULL, '2017-04-06 11:36:12', '2017-04-06 11:36:12'),
(4, 'D', 'D - bicicleta cu motor', NULL, '2017-04-06 11:36:12', '2017-04-06 11:36:12'),
(5, 'E', 'E - autobus sau autocar', NULL, '2017-04-06 11:36:12', '2017-04-06 11:36:12'),
(6, 'F', 'F - remorca', NULL, '2017-04-06 11:36:12', '2017-04-06 11:36:12'),
(7, 'G', 'G - altele', NULL, '2017-04-06 11:36:12', '2017-04-06 11:36:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
