-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 25 2022 г., 19:08
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
-- Структура таблицы `store`
--

CREATE TABLE `store` (
  `store_id` int(3) NOT NULL,
  `store_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town_id` int(3) NOT NULL,
  `store_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `street`, `house`, `phone`, `town_id`, `store_date`) VALUES
(1, 'Реал Маркет', 'Гледенская', '61', '', 1, '2022-10-07'),
(2, 'Реал Маркет', 'Архангельская', '4', '921-074-22-75 921-671-46-58', 3, '2022-10-07'),
(3, 'Реал Маркет', 'Кузнецова', '17-а', '', 4, '2022-10-07'),
(4, 'Артеевы', 'Мичурина', '3', '996-468-55-47 999-791-48-39', 5, '2022-10-07'),
(5, 'Попов Николай Валерьевич', 'Верхняя Дача', '23', '', 5, '2022-10-07'),
(6, 'Сила тока', 'Ломоносова', '5', '921-295-00-05', 3, '2022-10-15'),
(7, 'Минимакс Двина', 'Ленина', '176', '(818-37) 2-07-90', 4, '2022-10-15'),
(8, 'Сидорук Ольга Геннадьевна', 'Некрасова', '7, кв.23', '921-970-06-75', 6, '2022-10-22'),
(9, 'УФК по Вологодской области', '(Управление Федеральной службы государственной регистрации, кадастра и картографии', 'по Вологодской области)', '', 7, '2022-10-25'),
(10, 'АкваЛайн', 'Ветошкина', '15', '817-258-99-85; www.aqaline35.ru; info@tko35.ru', 7, '2022-10-25'),
(11, 'Газпром МежрегионГаз Вологда', 'Октябрьская', '51', '817-382-65-15, 817-382-89-97, 817-382-17-55, 817-382-17-44; www.vologdarg.ru; ustug@vologdarg.ru', 7, '2022-10-25'),
(12, 'Газпром Газораспределение Вологда', 'Саммера', '4-а', '', 7, '2022-10-25'),
(13, 'Северная Сбытовая Компания', 'Советский пр-т', '66', '817-382-09-50; www.sevesk.ru; vopros@sevesk.ru', 1, '2022-10-25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `town_id` (`town_id`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
