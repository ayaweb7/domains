-- phpMyAdmin SQL Dump
-- version 3.4.7
-- http://www.phpmyadmin.net
--
-- ����: localhost
-- ����� ��������: ��� 04 2012 �., 12:31
-- ������ �������: 5.1.40
-- ������ PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES cp1251 */;

--
-- ���� ������: `ox2.ru-test-base`
--
CREATE DATABASE `ox2.ru-test-base` DEFAULT CHARACTER SET cp1251 COLLATE cp1251_general_ci;
USE `ox2.ru-test-base`;

-- --------------------------------------------------------

--
-- ��������� ������� `category`
--

CREATE TABLE IF NOT EXISTS `category_select` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- ���� ������ ������� `category_select``
--

INSERT INTO `category_select` (`id`, `name`) VALUES
(1, '����� PHP'),
(2, '����� JS');

-- --------------------------------------------------------

--
-- ��������� ������� `page`
--

CREATE TABLE IF NOT EXISTS `page_select` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `text` text,
  `category_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=6 ;

--
-- ���� ������ ������� `page`
--

INSERT INTO `page_select` (`id`, `name`, `text`, `category_id`) VALUES
(1, '���� 1 - ������ ��������� (������) �� PHP', '����� �����\r\n...', 1),
(2, '���� 2 - ���������� � PHP', '����� �����\r\n...', 1),
(3, '���� 3 - ������� � PHP', '����� �����\r\n...', 1),
(4, '���� 1 - ������ ��������� (������) �� JavaScript', '����� �����\r\n...', 2),
(5, '���� 2 - ������� ��������� �� JavaScript', '����� �����\r\n...', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
