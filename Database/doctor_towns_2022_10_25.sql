-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 25 2022 г., 19:09
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `doctor`
--

-- --------------------------------------------------------

--
-- Структура таблицы `towns`
--

CREATE TABLE `towns` (
  `town_id` int(3) NOT NULL,
  `town_ru` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town_en` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `towns`
--

INSERT INTO `towns` (`town_id`, `town_ru`, `town_en`, `town_code`, `town_date`) VALUES
(1, 'Великий Устюг', 'Velykij Ustug', 'vus', '2022-10-07'),
(2, 'Китай', 'China', 'chi', '2022-10-07'),
(3, 'Коряжма', 'Koryazhma', 'kor', '2022-10-07'),
(4, 'Котлас', 'Kotlas', 'kot', '2022-10-07'),
(5, 'Красавино', 'Krasavino', 'kra', '2022-10-07'),
(6, 'С-Петербург', 'S-Petersburg', 'spb', '2022-10-22'),
(7, 'Вологда', 'Vologda', 'vol', '2022-10-25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`town_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `towns`
--
ALTER TABLE `towns`
  MODIFY `town_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
