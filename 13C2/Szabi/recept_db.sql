-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Feb 27. 12:36
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `recept_db`
--
CREATE DATABASE IF NOT EXISTS `recept_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `recept_db`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hozzavalok`
--

DROP TABLE IF EXISTS `hozzavalok`;
CREATE TABLE IF NOT EXISTS `hozzavalok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(255) NOT NULL,
  `mertekegyseg` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `hozzavalok`
--

INSERT INTO `hozzavalok` (`id`, `nev`, `mertekegyseg`) VALUES
(1, 'Liszt', 'g'),
(2, 'Cukor', 'g'),
(3, 'Só', 'g'),
(4, 'Víz', 'ml'),
(5, 'Tej', 'ml'),
(6, 'Vaj', 'g'),
(7, 'Tojás', 'db'),
(8, 'Élesztő', 'g'),
(9, 'Olaj', 'ml'),
(10, 'Sajt', 'g');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kapcsolo`
--

DROP TABLE IF EXISTS `kapcsolo`;
CREATE TABLE IF NOT EXISTS `kapcsolo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recept_id` int(11) NOT NULL,
  `hozzavalo_id` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `receptek`
--

DROP TABLE IF EXISTS `receptek`;
CREATE TABLE IF NOT EXISTS `receptek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(250) NOT NULL,
  `ido` int(11) NOT NULL,
  `nehezseg` varchar(250) NOT NULL,
  `leiras` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
