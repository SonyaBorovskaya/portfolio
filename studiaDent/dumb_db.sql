-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 10 2023 г., 19:27
-- Версия сервера: 8.0.31
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `studiadent`
--

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id_p` int NOT NULL AUTO_INCREMENT,
  `PFname` varchar(50) NOT NULL,
  `PSname` varchar(60) NOT NULL,
  `PTname` varchar(50) NOT NULL,
  `PPhone` varchar(20) NOT NULL,
  `speciality_p` varchar(100) NOT NULL,
  `staff_p` varchar(100) NOT NULL,
  `PDate` varchar(40) NOT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id_p`, `PFname`, `PSname`, `PTname`, `PPhone`, `speciality_p`, `staff_p`, `PDate`) VALUES
(17, 'Вахубов', 'Дмитрий', 'Сергеевич', '+7 (915) 33-21-453', '3', 'Долгопрудова', '0000-00-00 00:00:00'),
(24, 'Анатолий', 'Гусев', 'Дмитриевич', '+7 (915) 63-87-625', '3', 'Королева', '0000-00-00 00:00:00'),
(25, 'Анастасия', 'Плетнева', 'Михайловна', '+7 (915) 53-72-942', '9', 'Фролов', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `reviewID` int NOT NULL AUTO_INCREMENT,
  `userFname` varchar(100) NOT NULL,
  `userSname` varchar(100) NOT NULL,
  `userTname` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPhone` varchar(15) NOT NULL,
  `review_text` text NOT NULL,
  `date_review` date NOT NULL,
  `agree` varchar(20) NOT NULL,
  PRIMARY KEY (`reviewID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`reviewID`, `userFname`, `userSname`, `userTname`, `userEmail`, `userPhone`, `review_text`, `date_review`, `agree`) VALUES
(12, 'протаскина', 'ксюша', 'юрьевна', 'ks@mail.ru', '+7 (333) 33-33-', 'ксюша', '2023-05-11', 'нет');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `speciality` int NOT NULL,
  `nameServices` varchar(300) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nameServices` (`nameServices`),
  KEY `speciality` (`speciality`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `speciality`, `nameServices`, `price`) VALUES
(1, 3, 'Профессиональная гигиена полости рта', '4000'),
(2, 3, 'Отбеливание офисное ', '1800'),
(3, 3, 'Лечение кариеса обновил', '9999999'),
(4, 3, 'Эндодонтическое лечение каналов зуба под микроскопом (без пломбы)\r\n', '3000'),
(5, 3, 'Перелечивание канала зуба под микроскопом (без пломбы)\r\n', '3500'),
(6, 3, 'Временная пломбировка 1 корневого канала\r\n', '5000'),
(7, 9, 'Коронка металлокерамическая', '10000'),
(8, 9, 'Коронка временная из пластмассы Luxatemp', '11000'),
(9, 9, 'Коронка на основе диоксида циркония (технология CEREC)', '11000'),
(10, 9, 'Коронка /вкладка/накладка/ из безметалловой керамики, (технология CEREC', '15000'),
(11, 9, 'Винир керамический (технологии CEREC с индивидуализацией)', '25000'),
(12, 9, 'Абатмент индивидуальный на основе диоксида циркония (технология CEREC)', '10000'),
(13, 9, 'Полный съемный протез', '13000'),
(14, 5, 'Удаление однокорневого зуба', '3000'),
(15, 5, 'Удаление многокорневого зуба', '5000'),
(16, 5, 'Удаление верхнего зуба мудрости', '7000'),
(17, 5, 'Удаление нижнего зуба мудрости', '8000'),
(18, 5, 'Использование хирургического шаблона при имплантации', '14000'),
(19, 5, 'Удаление молочного зуба', '1500'),
(20, 1, 'Консультация (прием, осмотр) врача-стоматолога ', '800'),
(21, 1, 'Ортопантомография (панорамный снимок)', '1900'),
(22, 1, 'Слепок силиконовый', '3000'),
(23, 1, 'Аппарат Твин-Блок', '40000'),
(24, 1, 'Элайнер', '15000'),
(43, 1, 'Лечение аномалий прикуса на простой вестибулярной пластинке MUPPY', '8500'),
(58, 1, '0', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `specialty`
--

DROP TABLE IF EXISTS `specialty`;
CREATE TABLE IF NOT EXISTS `specialty` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_specialty` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `specialty`
--

INSERT INTO `specialty` (`id`, `name_specialty`) VALUES
(1, 'Ортодонтия'),
(3, 'Терапия'),
(5, 'Хирургия'),
(9, 'Ортопедия');

-- --------------------------------------------------------

--
-- Структура таблицы `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staffID` int NOT NULL AUTO_INCREMENT,
  `staffName` varchar(50) NOT NULL,
  `staffSname` varchar(50) NOT NULL,
  `staffTname` varchar(50) NOT NULL,
  PRIMARY KEY (`staffID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffSname`, `staffTname`) VALUES
(1, 'Лариса', 'Кобникова', 'Владимировна'),
(2, 'Валерия', 'Долгопрудова', 'Михайловна'),
(3, 'Елизавета ', 'Быкова ', 'Савельевна'),
(4, 'Кристина', 'Голубева ', 'Дмитриевна'),
(5, 'Лев ', 'Фролов ', 'Степанович'),
(6, 'Алиса ', 'Королева ', 'Сергеевна');

-- --------------------------------------------------------

--
-- Структура таблицы `staff_specalty`
--

DROP TABLE IF EXISTS `staff_specalty`;
CREATE TABLE IF NOT EXISTS `staff_specalty` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cpecialty` int NOT NULL,
  `id_staff` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_staff` (`id_staff`),
  KEY `id_cpecialty` (`id_cpecialty`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `staff_specalty`
--

INSERT INTO `staff_specalty` (`id`, `id_cpecialty`, `id_staff`) VALUES
(1, 1, 1),
(2, 3, 2),
(9, 1, 4),
(10, 9, 2),
(11, 5, 1),
(12, 3, 6),
(13, 9, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int NOT NULL AUTO_INCREMENT,
  `fname` tinytext NOT NULL,
  `sname` tinytext NOT NULL,
  `tname` tinytext NOT NULL,
  `userPhone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idUsers`, `fname`, `sname`, `tname`, `userPhone`, `emailUsers`, `pwdUsers`) VALUES
(5, 'admin', 'admin', 'admin', '+7 (000) 00-00-', 'admin@mail.ru', '$2y$10$JpMrMFBngWZmavM57sp7neqsuvhBS3/cGq0fxxNED4ZI5Tuwt0wM2'),
(6, 'протаскина', 'ксюша', 'юрьевна', '+7 (333) 33-33-', 'ks@mail.ru', '$2y$10$sJNqEeo9SXkVDzX9YnoJRuVwwQnGdr8lyFVEJhkfFSLVSwHHt1ake');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`speciality`) REFERENCES `specialty` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `staff_specalty`
--
ALTER TABLE `staff_specalty`
  ADD CONSTRAINT `staff_specalty_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`staffID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `staff_specalty_ibfk_2` FOREIGN KEY (`id_cpecialty`) REFERENCES `specialty` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
