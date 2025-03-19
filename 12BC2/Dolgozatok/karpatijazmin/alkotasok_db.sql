-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Feb 11. 10:54
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
-- Adatbázis: `alkotasok_db`
--
CREATE DATABASE IF NOT EXISTS `alkotasok_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci;
USE `alkotasok_db`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `alkotasok`
--

CREATE TABLE `alkotasok` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `tipus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `alkotasok`
--

INSERT INTO `alkotasok` (`id`, `nev`, `tipus`) VALUES
(8, 'sddsaa', 'Festmeny'),
(9, 'sfrf', 'Fenykep'),
(10, 'sfrf', 'Szobor'),
(11, 'sfrfgh', 'Epulet');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `alkotasok`
--
ALTER TABLE `alkotasok`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `alkotasok`
--
ALTER TABLE `alkotasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
