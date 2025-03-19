-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 12:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `behejezett`
--

CREATE TABLE IF NOT EXISTS `behejezett` (
  `tipus` varchar(200) NOT NULL,
  `zsak` int(200) NOT NULL,
  `szalitas` varchar(200) NOT NULL,
  `megjegyzes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `behejezett`
--

INSERT INTO `behejezett` (`tipus`, `zsak`, `szalitas`, `megjegyzes`) VALUES
('Hagyományos zöld', 20, 'pozsony', '      oke'),
('Hagyományos zöld', 20, 'pozsony', '      oke'),
('Hagyományos zöld', 20, 'pozsony', '      oke'),
('Hagyományos zöld', 20, 'pozsony', '      oke'),
('Hagyományos zöld', 20, 'pozsony', '      oke'),
('Hagyományos zöld', 10, 'pozsony', '      er');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
