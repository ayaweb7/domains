-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 25 2016 г., 18:14
-- Версия сервера: 5.5.33
-- Версия PHP: 5.4.4-14+deb7u7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `c1hotel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent` int(10) unsigned NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent`, `sort`) VALUES
(1, 'Автомобили', 0, 1),
(2, 'Мотоциклы', 0, 2),
(3, 'Мазда', 1, 1),
(4, 'Хонда', 1, 2),
(5, 'Кавасаки', 2, 2),
(6, 'Харлей', 2, 1),
(7, 'Мазда 3', 3, 2),
(8, 'Мазда 6', 3, 1),
(9, 'Седан', 7, 2),
(10, 'Хечбэк', 7, 1),
(11, 'Лодки', 0, 3),
(12, 'Лифтбэк', 8, 2),
(13, 'Кроссовер', 8, 1),
(14, 'Белый', 13, 1),
(15, 'Красный', 13, 2),
(16, 'Черный', 13, 3),
(17, 'Зеленый', 13, 4),
(18, 'Мазда CX', 3, 3),
(19, 'Мазда MX', 3, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
