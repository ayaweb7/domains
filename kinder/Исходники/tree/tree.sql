--
-- ���� ������: `ox2.ru-test-base`
--
CREATE DATABASE `ox2.ru-test-base` DEFAULT CHARACTER SET cp1251 COLLATE cp1251_general_ci;
USE `ox2.ru-test-base`;

-- --------------------------------------------------------

--
-- ��������� ������� `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=18 ;

--
-- ���� ������ ������� `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(1, '�������', 0),
(2, '������', 0),
(3, '���� ������', 0),
(4, '�������� �������� ��������', 2),
(5, '�������� �����', 2),
(6, '����������� �����', 2),
(13, '����������� �� ��������', 6),
(7, '����� ������������', 4),
(8, '����� ������������', 4),
(9, '����� �������������', 4),
(10, '���� �������', 5),
(11, '��������� ����', 5),
(12, '������������� ����', 5),
(14, '����������� �� �������', 6),
(15, '����� � ��������', 6),
(16, '�������� �������� ��������', 3),
(17, '�������� �����', 3);
