-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 29 2018 г., 09:32
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `agency`
--

-- --------------------------------------------------------

--
-- Структура таблицы `flats`
--

CREATE TABLE IF NOT EXISTS `flats` (
  `id_flat` int(4) NOT NULL AUTO_INCREMENT,
  `rooms` varchar(20) NOT NULL,
  `flat_street` varchar(20) NOT NULL,
  `flat_house` varchar(20) NOT NULL,
  `square` int(3) NOT NULL,
  `balcony` varchar(20) NOT NULL,
  `floor` int(3) NOT NULL,
  `price` int(5) NOT NULL,
  `note` varchar(150) CHARACTER SET cp1251 NOT NULL,
  `trade` varchar(20) NOT NULL,
  `flat_dt` date NOT NULL,
  PRIMARY KEY (`id_flat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `flats`
--

INSERT INTO `flats` (`id_flat`, `rooms`, `flat_street`, `flat_house`, `square`, `balcony`, `floor`, `price`, `note`, `trade`, `flat_dt`) VALUES
(1, '1-комнатная', 'Архангельская', '', 0, 'балкон', 1, 0, 'Хороший ремонт. 1 собственник.', 'продажа', '2018-10-28'),
(2, '1-комнатные', 'Набережная', '', 0, 'балкон', 1, 0, '', 'продажа', '2018-10-28'),
(3, '1-комнатные', 'Набережная', '48', 30, 'балкон', 3, 1440, 'Косметический ремонт, частично обставлена мебелью. 1 собственник.', 'продажа', '2018-10-28'),
(4, '1-комнатные', 'Набережная', '42-а', 30, 'балкон', 2, 1150, 'Косметический ремонт, стелопакеты.', 'продажа', '2018-10-28'),
(5, '1-комнатные', 'Ломоносова', '6', 32, 'балкон', 1, 1270, ' Тёплая, косметический ремонт.', 'продажа', '2018-10-28'),
(6, '1-?????????', 'Сафьяна', '13', 32, 'балкон', 5, 1100, '????????????? ??????, ???????? ?????????? ???????. 1 ???????????.????.', '???????', '2018-10-29'),
(7, '1-комнатные', 'Ленина', '45-а', 36, 'балкон', 3, 1600, 'Хороший ремонт. 1 собственник.', 'продажа', '2018-10-29'),
(8, '1-комнатные', 'Сафьяна', '19', 30, 'балкон', 2, 1100, 'Чистая. Торг.', 'продажа', '2018-10-29'),
(9, '1-комнатные', 'Ломоносова', '3', 29, 'балкон', 1, 1200, 'Хорошее состояние. Торг.', 'продажа', '2018-10-29'),
(10, 'гостинки', 'Кирова', '15', 26, 'балкон', 3, 780, 'Хороший ремонт, частично обставлена мебелью.', 'продажа', '2018-10-29'),
(11, 'гостинки', 'Кирова', '15', 20, 'балкон', 2, 960, 'Хороший ремонт, частично обставлена мебелью. Свой санузел. Торг.', 'продажа', '2018-10-29'),
(12, 'гостинки', 'Кирова', '15', 20, 'балкон', 2, 735, 'Чистая. Имеется ванна.', 'продажа', '2018-10-29'),
(13, 'гостинки', 'Дыбцына', '14', 13, 'без балкона', 3, 480, 'Чистая, тёплая, пластиковые окна, металлическая дверь.', 'продажа', '2018-10-29'),
(14, 'гостинки', 'Дыбцына', '14', 24, 'без балкона', 5, 800, '2-х комнатная гостинка. Чистая. Имеется душ, пластиковые окна. Торг.', 'продажа', '2018-10-29'),
(15, 'гостинки', 'Пушкина', '12-а', 13, 'балкон', 3, 620, 'Идеальное состояние. Имеется душ, туалет. Металлическая дверь.', 'продажа', '2018-10-29'),
(16, 'гостинки', 'Пушкина', '12-а', 20, 'балкон', 5, 800, 'Хороший ремонт. Имеется душ, стеклопакеты, шкаф-купе.', 'продажа', '2018-10-29'),
(17, 'гостинки', 'Пушкина', '12-а', 26, 'без балкона', 3, 770, 'Чистая, тёплая. Санузел.', 'продажа', '2018-10-29'),
(18, 'гостинки', 'Пушкина', '22', 12, 'балкон', 4, 550, 'Чистая. Санузел.', 'продажа', '2018-10-29'),
(19, '2-х комнатные', 'Ленина', '10', 42, 'балкон', 5, 2200, '', 'продажа', '2018-10-29'),
(20, '2-х комнатные', 'Ленина', '10', 44, 'балкон', 4, 1300, '', 'продажа', '2018-10-29'),
(21, '2-х комнатные', 'Ленина', '4', 42, 'без балкона', 1, 1150, '', 'продажа', '2018-10-29'),
(22, '2-х комнатные', 'Ленина', '24', 45, 'балкон', 4, 1500, '', 'продажа', '2018-10-29'),
(23, '2-х комнатные', 'Архангельская', '25', 47, 'балкон', 3, 1700, '', 'продажа', '2018-10-29'),
(24, '3-х комнатные', 'Ленина', '43', 60, 'балкон', 3, 2200, '', 'продажа', '2018-10-29'),
(25, '3-х комнатные', 'Ленина', '43', 60, 'балкон', 2, 2200, '', 'продажа', '2018-10-29'),
(26, '3-х комнатные', 'Ленина', '46', 60, 'балкон', 3, 2200, '', 'продажа', '2018-10-29'),
(27, '3-х комнатные', 'Советская', '2-а', 60, 'без балкона', 1, 2400, '', 'продажа', '2018-10-29'),
(28, '3-х комнатные', 'Советская', '2-а', 60, 'балкон', 4, 2350, '', 'продажа', '2018-10-29'),
(29, '3-х комнатные', 'Советская', '2-а', 60, 'балкон', 5, 2200, '', 'продажа', '2018-10-29'),
(30, '3-х комнатные', 'Архангельская', '29-а', 60, 'балкон', 3, 2200, '', 'продажа', '2018-10-29'),
(31, '3-х комнатные', 'Ленина', '51', 60, 'балкон', 1, 2150, '', 'продажа', '2018-10-29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
