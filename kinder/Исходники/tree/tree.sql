--
-- База данных: `ox2.ru-test-base`
--
CREATE DATABASE `ox2.ru-test-base` DEFAULT CHARACTER SET cp1251 COLLATE cp1251_general_ci;
USE `ox2.ru-test-base`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(1, 'Главная', 0),
(2, 'Услуги', 0),
(3, 'Наши работы', 0),
(4, 'Создание интернет магазина', 2),
(5, 'Создание сайта', 2),
(6, 'Продвижение сайта', 2),
(13, 'Продвижение по позициям', 6),
(7, 'Тариф «Оптимальный»', 4),
(8, 'Тариф «Расширенный»', 4),
(9, 'Тариф «Максимальный»', 4),
(10, 'Сайт визитка', 5),
(11, 'Фирменный сайт', 5),
(12, 'Корпоративный сайт', 5),
(14, 'Продвижение по трафику', 6),
(15, 'Сроки и гарантии', 6),
(16, 'Создание интернет магазина', 3),
(17, 'Создание сайта', 3);
