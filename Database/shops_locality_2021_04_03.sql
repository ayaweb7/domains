-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 03 2021 г., 23:06
-- Версия сервера: 10.3.13-MariaDB-log
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
-- База данных: `agency`
--

-- --------------------------------------------------------

--
-- Структура таблицы `locality`
--

CREATE TABLE `locality` (
  `loc_id` int(3) NOT NULL,
  `town` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `locality`
--

INSERT INTO `locality` (`loc_id`, `town`, `code`) VALUES
(1, 'Великий Устюг', 'VUS'),
(2, 'Вологда', 'VOL'),
(3, 'Вычегодский', 'VYC'),
(4, 'Екатеринбург', 'EKA'),
(5, 'Китай', 'CHI'),
(6, 'Коряжма', 'KOR'),
(7, 'Котлас', 'KOT'),
(8, 'Красавино', 'KRA'),
(9, 'Москва', 'MOS'),
(10, 'Нижнекамск', 'NIZ'),
(11, 'Приводино', 'PRI'),
(12, 'Сыктывкар', 'SYK'),
(13, 'Челябинск', 'CHE'),
(14, 'Эжва', 'EZV');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `locality`
--
ALTER TABLE `locality`
  ADD PRIMARY KEY (`loc_id`),
  ADD KEY `town` (`town`),
  ADD KEY `code` (`code`),
  ADD KEY `town_2` (`town`),
  ADD KEY `code_2` (`code`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `locality`
--
ALTER TABLE `locality`
  MODIFY `loc_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
