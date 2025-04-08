-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Ápr 01. 12:12
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
-- Adatbázis: `etterem_db`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `etelek`
--

CREATE TABLE `etelek` (
  `id` int(11) NOT NULL,
  `nev` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `etelek`
--

INSERT INTO `etelek` (`id`, `nev`) VALUES
(1, 'Leves'),
(2, 'Pörkölt'),
(3, 'Sült csirke'),
(4, 'Halászlé'),
(5, 'Lángos'),
(6, 'Rakott krumpli'),
(7, 'Töltött káposzta'),
(8, 'Pasta Bolognese'),
(9, 'Pizzaszelet'),
(10, 'Grillezett zöldségek'),
(11, 'Sült krumpli'),
(12, 'Schnitzel'),
(13, 'Túrós csusza'),
(14, 'Káposztás tészta'),
(15, 'Lencsefőzelék'),
(16, 'Képviselőfánk'),
(17, 'Túrós lepény'),
(18, 'Töltött pulyka'),
(19, 'Rántott sajt'),
(20, 'Gulyásleves'),
(21, 'Kacsacomb'),
(22, 'Gyümölcssaláta'),
(23, 'Húsleves'),
(24, 'Csevapcici'),
(25, 'Padlizsános rakottas'),
(26, 'Frittata'),
(27, 'Hortobágyi palacsinta'),
(28, 'Túros lepény'),
(29, 'Májgaluska leves'),
(30, 'Sajtos pogácsa'),
(31, 'Cukkinis tészta'),
(32, 'Leves'),
(33, 'Pörkölt'),
(34, 'Sült csirke'),
(35, 'Halászlé'),
(36, 'Lángos'),
(37, 'Rakott krumpli'),
(38, 'Töltött káposzta'),
(39, 'Pasta Bolognese'),
(40, 'Pizzaszelet'),
(41, 'Grillezett zöldségek'),
(42, 'Sült krumpli'),
(43, 'Schnitzel'),
(44, 'Túrós csusza'),
(45, 'Káposztás tészta'),
(46, 'Lencsefőzelék'),
(47, 'Képviselőfánk'),
(48, 'Túrós lepény'),
(49, 'Töltött pulyka'),
(50, 'Rántott sajt'),
(51, 'Gulyásleves'),
(52, 'Kacsacomb'),
(53, 'Gyümölcssaláta'),
(54, 'Húsleves'),
(55, 'Csevapcici'),
(56, 'Padlizsános rakottas'),
(57, 'Frittata'),
(58, 'Hortobágyi palacsinta'),
(59, 'Túros lepény'),
(60, 'Májgaluska leves'),
(61, 'Sajtos pogácsa'),
(62, 'Cukkinis tészta');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendelesek`
--

CREATE TABLE `rendelesek` (
  `id` int(11) NOT NULL,
  `asztal` int(200) NOT NULL,
  `etelid` int(200) NOT NULL,
  `mennyiseg` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `etelek`
--
ALTER TABLE `etelek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `etelek`
--
ALTER TABLE `etelek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT a táblához `rendelesek`
--
ALTER TABLE `rendelesek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
