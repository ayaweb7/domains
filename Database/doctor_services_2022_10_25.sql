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
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `service_id` int(5) NOT NULL,
  `serv_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `performer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serv_quantity` decimal(7,3) DEFAULT NULL,
  `serv_item` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serv_price` decimal(7,2) DEFAULT NULL,
  `serv_amount` decimal(7,2) DEFAULT NULL,
  `store_id` int(5) NOT NULL,
  `town_id` int(3) NOT NULL,
  `serv_date` date NOT NULL,
  `input_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`service_id`, `serv_name`, `performer`, `serv_quantity`, `serv_item`, `serv_price`, `serv_amount`, `store_id`, `town_id`, `serv_date`, `input_date`) VALUES
(1, 'Первичный осмотр дома на предмет перепланировки и подведения коммуникаций (вода, канализация, электричество). Уборка территории от зарослей малины.', 'Николай, Елена', NULL, NULL, NULL, NULL, 4, 5, '2022-10-01', '2022-10-07'),
(3, 'Заделка слуховых (подвальных) окон к зиме. Начало приборки в доме.', 'Николай, Елена', NULL, NULL, NULL, NULL, 4, 5, '2022-10-07', '2022-10-07'),
(4, 'Начало работ по приведению в порядок придомовой территории: выкошена старая трава и заросли малины вдоль западного забора. Приборка в доме: выбросили старый хлам, одежду.', 'Николай, Елена', NULL, NULL, NULL, NULL, 4, 5, '2022-10-08', '2022-10-09'),
(5, 'Продолжали приводить территорию в порядок с восточной стороны дома (перед домом). Скошена и убрана трава вперемежку с малиной и кустарником. Спилены и убраны крупные деревья вдоль забора: черёмуха, ирга, терновник.', 'Николай, Елена, Евгений', NULL, NULL, NULL, NULL, 4, 5, '2022-10-09', '2022-10-09'),
(6, 'Уборка территории с северной стороны дома: скошена и убрана трава вперемежку с малиной и кустарником. Целый день горит костер - сжигаем ветки деревьев, сухую малину, деревянный мусор. Первый раз затопили печку.', 'Николай, Елена, Евгений', NULL, NULL, NULL, NULL, 4, 5, '2022-10-10', '2022-10-11'),
(7, 'Зачистка территории с северной стороны дома. Опять целый день горит костер - сжигаем остатки веток деревьев, сухой малины, и мусора. Корчевание маленьких пней. Второй день топится печка.', 'Николай, Елена', NULL, NULL, NULL, NULL, 4, 5, '2022-10-11', '2022-10-11'),
(8, 'Корчевание больших и маленьких пней. Убрали черёмуху и рябину за забором. Топили нижнюю печку - сильно дымит (надо чистить канал и заделывать плиту).', 'Николай, Елена', '600.000', 'кв.м.', '1000.00', '6000.00', 4, 5, '2022-10-15', '2022-10-15'),
(9, 'Демонтаж стены в прихожем помещении. Уборка хлама. Подготовка материала (досок) для строительства уличного туалета. Выполнение с 17 по 18 октября 2022г.', 'Николай', '1.000', 'шт.', '1000.00', '1000.00', 4, 5, '2022-10-18', '2022-10-19'),
(10, 'Окончательная уборка всей территории дома. Гребём остатки сухой травы, малины, корни кустарника и мелких деревьев. Опять  горит костер - сжигаем ветки деревьев и выкорчеванные корни. Топили русскую печку.', 'Николай, Елена', NULL, NULL, NULL, NULL, 4, 5, '2022-10-19', '2022-10-19'),
(11, 'Строительство уличного туалета. Выполнение работ с 20 по 26 октября 2022г.', 'Николай', '1.000', 'шт.', '5000.00', '5000.00', 4, 5, '2022-10-26', '2022-10-26');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `store_id` (`store_id`) USING BTREE,
  ADD KEY `town_id` (`town_id`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
