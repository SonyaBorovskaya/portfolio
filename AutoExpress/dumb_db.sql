-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 10 2023 г., 19:11
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
-- База данных: `autoexpress`
--

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `idRequests` int NOT NULL AUTO_INCREMENT,
  `fname` tinytext NOT NULL,
  `sname` tinytext NOT NULL,
  `phoneUsers` varchar(45) NOT NULL,
  `msgUsers` text NOT NULL,
  PRIMARY KEY (`idRequests`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`idRequests`, `fname`, `sname`, `phoneUsers`, `msgUsers`) VALUES
(56, 'iiiiii', 'yyyyy', '+7 (555) 55-55-555', 'ppppppppppppppp'),
(12, 'Василий', 'Гоников', '+7 (951) 64-77-893', 'Комментарий....'),
(57, 'ввв', 'вввв', '+7 (333) 33-33-333', ''),
(52, 'gsgs', 'gsgs', '+7 (444) 44-44-444', ''),
(53, 'sdvsvds', 'vdsv', '+7 (666) 66-66-666', ''),
(54, 'fefw', 'wfefw', '+7 (333) 33-33-333', ''),
(55, 'gweg', 'gsegs', '+7 (333) 33-33-333', 'ffffff');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int NOT NULL AUTO_INCREMENT,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(7, 'Fushiko', 'test@mail.ru', '$2y$10$Nr7pu15VefhC2s9OOT4ULuW2o4UCltED8pMEzrEQngCq2acfNfrNq'),
(12, 'admin', 'admin@mail.ru', '$2y$10$HbEfgyga6BRI2FHdP956Ruv04g1rwcsQgyU3dCcFHpXQ3OtQ1YqMi'),
(13, 'Ghost', 'test@mail.ru', '$2y$10$JX7YNmWBwNjUqaDCZdwQKOLaFAVC2ludeQSRVSJh1aOvhGpO2HI5q');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
