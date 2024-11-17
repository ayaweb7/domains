-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 25 2022 г., 19:07
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
-- Структура таблицы `page_select`
--

CREATE TABLE `page_select` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `page_select`
--

INSERT INTO `page_select` (`id`, `name`, `text`, `category_id`) VALUES
(1, 'Урок 1 - Первая программа (скрипт) на PHP', 'Текст урока\r\n...', 1),
(2, 'Урок 2 - Переменные в PHP', 'Текст урока\r\n...', 1),
(3, 'Урок 3 - Массивы в PHP', 'Текст урока\r\n...', 1),
(4, 'Урок 1 - Первая программа (скрипт) на JavaScript', 'Текст урока\r\n...', 2),
(5, 'Урок 2 - Выводим сообщения на JavaScript', 'Текст урока\r\n...', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `page_select`
--
ALTER TABLE `page_select`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `page_select`
--
ALTER TABLE `page_select`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
