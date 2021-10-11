-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Жов 10 2021 р., 22:15
-- Версія сервера: 5.7.33
-- Версія PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `first_team_news`
--

-- --------------------------------------------------------

--
-- Структура таблиці `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdate` timestamp NOT NULL,
  `updatedate` timestamp NULL DEFAULT NULL,
  `author` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `createdate`, `updatedate`, `author`) VALUES
(1, 'New news', 'Some text', '2021-10-09 20:26:55', '2021-10-09 20:26:59', 'Some author'),
(2, 'Second new', 'Some text for second news', '2021-10-10 17:36:31', NULL, 'Korchevskii'),
(3, 'Third new', 'Some text for third news', '2021-10-10 17:46:18', NULL, 'Korchevskii'),
(4, 'Fourth new', 'Some text was update', '2021-10-10 17:48:08', '2021-10-10 19:14:05', 'Korchevskii');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
