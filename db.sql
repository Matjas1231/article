-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Wrz 2021, 15:26
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `articles`
--
CREATE DATABASE IF NOT EXISTS `articles` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `articles`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `id_category` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `status`, `created`, `id_category`) VALUES
(2, 'title0', 'description0', 0, '2021-09-21 12:29:47', 3),
(3, 'title1', 'description1', 1, '2021-09-21 12:29:47', 3),
(4, 'title2', 'description2', 1, '2021-09-21 12:29:47', 4),
(5, 'title3', 'description3', 1, '2021-09-21 12:29:47', 2),
(6, 'title4', 'description4', 0, '2021-09-21 12:29:47', 2),
(7, 'title5', 'description5', 0, '2021-09-21 12:29:47', 1),
(8, 'title6', 'description6', 1, '2021-09-21 12:29:47', 2),
(9, 'title7', 'description7', 0, '2021-09-21 12:29:47', 4),
(10, 'title8', 'description8', 0, '2021-09-21 12:29:47', 3),
(11, 'title9', 'description9', 1, '2021-09-21 12:29:47', 1),
(12, 'title10', 'description10', 0, '2021-09-21 12:29:47', 2),
(13, 'title11', 'description11', 1, '2021-09-21 12:29:47', 2),
(14, 'title12', 'description12', 0, '2021-09-21 12:29:47', 2),
(15, 'title13', 'description13', 0, '2021-09-21 12:29:47', 3),
(16, 'title14', 'description14', 1, '2021-09-21 12:29:47', 4),
(17, 'title15', 'description15', 1, '2021-09-21 12:29:47', 1),
(18, 'title16', 'description16', 1, '2021-09-21 12:29:47', 3),
(19, 'title17', 'description17', 0, '2021-09-21 12:29:47', 2),
(20, 'title18', 'description18', 1, '2021-09-21 12:29:47', 1),
(21, 'title19', 'description19', 1, '2021-09-21 12:29:47', 4),
(22, 'title20', 'description20', 0, '2021-09-21 12:29:47', 1),
(23, 'title21', 'description21', 0, '2021-09-21 12:29:47', 1),
(24, 'title22', 'description22', 1, '2021-09-21 12:29:47', 1),
(25, 'title23', 'description23', 1, '2021-09-21 12:29:47', 3),
(26, 'title24', 'description24', 0, '2021-09-21 12:29:47', 4),
(27, 'title25', 'description25', 0, '2021-09-21 12:29:47', 3),
(28, 'title26', 'description26', 0, '2021-09-21 12:29:47', 3),
(29, 'title27', 'description27', 0, '2021-09-21 12:29:47', 1),
(30, 'title28', 'description28', 1, '2021-09-21 12:29:47', 2),
(31, 'title29', 'description29', 0, '2021-09-21 12:29:47', 2),
(32, 'title30', 'description30', 0, '2021-09-21 12:29:47', 3),
(33, 'title31', 'description31', 0, '2021-09-21 12:29:47', 4),
(34, 'title32', 'description32', 0, '2021-09-21 12:29:47', 4),
(35, 'title33', 'description33', 0, '2021-09-21 12:29:47', 1),
(36, 'title34', 'description34', 1, '2021-09-21 12:29:47', 2),
(37, 'title35', 'description35', 0, '2021-09-21 12:29:47', 3),
(38, 'title36', 'description36', 0, '2021-09-21 12:29:47', 2),
(39, 'title37', 'description37', 0, '2021-09-21 12:29:47', 1),
(40, 'title38', 'description38', 0, '2021-09-21 12:29:47', 3),
(41, 'title39', 'description39', 0, '2021-09-21 12:29:47', 4),
(42, 'title40', 'description40', 0, '2021-09-21 12:29:47', 4),
(43, 'title41', 'description41', 0, '2021-09-21 12:29:47', 1),
(44, 'title42', 'description42', 0, '2021-09-21 12:29:47', 3),
(45, 'title43', 'description43', 0, '2021-09-21 12:29:47', 1),
(46, 'title44', 'description44', 1, '2021-09-21 12:29:47', 4),
(47, 'title45', 'description45', 1, '2021-09-21 12:29:47', 1),
(48, 'title46', 'description46', 0, '2021-09-21 12:29:47', 4),
(49, 'title47', 'description47', 0, '2021-09-21 12:29:47', 2),
(50, 'title48', 'description48', 0, '2021-09-21 12:29:47', 3),
(51, 'title49', 'description49', 0, '2021-09-21 12:29:47', 3),
(54, '11', '11', 0, '2021-09-21 15:58:16', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Ogólne'),
(4, 'Pilne'),
(3, 'Rzadkie'),
(2, 'Specjalne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'user123', '$2y$10$jkHMaQzKviDKrEyUxYPBNOw9PD5srgCUnh2ismyJlChKhdqKTotVW'),
(3, 'user2', '$2y$10$TNp79N3CPAtSs96nQMNfde9YikCP6nSR2c5Zr6JjxGJ6OqHK/QV7O'),
(4, 'usertwo', '$2y$10$LP566UbgNnFJk3Rc3KANuOISE2Nr8M5lsk70rtYOxlrHZ4O31jXfi'),
(5, 'zaq1@WSX', '$2y$10$Fu/9VGZcA3hw6P6mXIHyJOxdRvVMHeosPKTNq2NmkuBLaTTCDWy0O'),
(6, 'testowy', '$2y$10$ArmOhexh2vhqCwl.WJXD.OWRSYYJnbg0iz3S5XXMqW/8EDljR87v2'),
(7, 'uz', '$2y$10$I90qFkmWPur2WLQNy6RkIeTTt3hAjrtR.Z5lG/VqVb4gMyzwnfPqO');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
