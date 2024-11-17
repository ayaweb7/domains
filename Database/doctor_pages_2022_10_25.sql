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
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `page_id` int(3) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marker` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_alt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`page_id`, `name`, `title`, `url`, `menu`, `h1`, `h2`, `marker`, `photo_alt`, `photo_name`, `page_date`) VALUES
(1, 'Главная страница', 'Главная', '/', NULL, 'Ремонт дома', 'Верхняя Дача, 23', 'index', NULL, NULL, '2022-10-07'),
(2, 'Главная страница администратора', 'Админ111', 'admin', NULL, 'Вы находитесь в панели администратора', 'Все введённые вами данные будут сразу отображены на сайте', 'admin', NULL, NULL, '2022-10-07'),
(3, 'Страница не найдена', 'Не найдена', '404', NULL, 'Страница', 'не найдена', 'service', NULL, NULL, '2022-10-07'),
(4, 'Информация о себе', 'О себе', 'about', NULL, 'Немного', 'о себе', 'index', NULL, NULL, '2022-10-07'),
(6, 'Блог последних новостей', 'Блог', 'blog', NULL, 'Выполненные работы', 'за последний период', 'statistic', NULL, NULL, '2022-10-09'),
(7, 'Таблица расходов на строительство и ремонт', 'Покупки', 'shops', NULL, 'Приобретение материалов', 'для строительства и ремонта', 'statistic', NULL, NULL, '2022-10-09');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
