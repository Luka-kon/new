-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 31 2022 г., 13:22
-- Версия сервера: 8.0.24
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lib`
--

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint NOT NULL,
  `fio_doc` varchar(250) NOT NULL,
  `year_b` smallint DEFAULT NULL,
  `year_d` smallint DEFAULT NULL,
  `medwork` tinyint(1) DEFAULT NULL,
  `discipline` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `comment` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `fio_doc`, `year_b`, `year_d`, `medwork`, `discipline`, `comment`) VALUES
(1, 'Профессор Хренов', 1945, 2017, 1, 'гигиена', NULL),
(2, 'Врач Алексеев', 1945, 2007, 0, 'терапевт', NULL),
(3, 'Доктор Петров', 1850, 1920, 1, 'окулист', NULL),
(4, 'Специалист Трупняков', 1945, 2017, 1, 'патологоанатом', NULL),
(5, 'Врач Родов', 1945, 2017, 0, 'акушер', NULL),
(6, 'Костоправ Костоломов', 1817, 1864, 1, 'травматолог', NULL),
(7, 'Зубодёр Зубняк', 1902, 1985, 1, 'стоматолог', NULL),
(8, 'Доктор Раков', 1920, 1989, 0, 'онколог', NULL),
(9, 'Врачеватель Ножечников', 1874, 1943, 1, 'хирург', NULL),
(10, 'Лекарь Орлов', 1920, 1975, 0, 'ординатор', NULL),
(11, 'Какой-то врач', 1922, 2000, 0, 'фельшер', NULL),
(14, 'Ещё один врач', 1852, 1930, 1, 'венеролог', NULL),
(16, 'Ну и ещё на всякий случай', 1982, NULL, 1, 'уролог', NULL),
(17, 'Кто-то там', 1932, 1980, 0, 'гигиена', NULL),
(18, 'Врач чего-то там', 1950, 2014, 1, 'физиология', NULL),
(19, 'Доктор Смотрин', 1945, 2020, 0, 'уролог', NULL),
(20, 'Доктор ещё чего-то', 1921, 1980, 0, 'венеролог', NULL),
(21, 'Лекарь кое-чего', 1920, 1995, 1, 'гинеколог', NULL),
(22, 'Кромсальщик', 1901, 1979, 0, 'хирург', NULL),
(23, 'Врач Травмин', 1845, 1923, 1, 'травматолог', NULL),
(24, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(25, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(26, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(27, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(28, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(29, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(30, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(31, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(32, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(33, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(34, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(35, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(36, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(37, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(38, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(39, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(40, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(41, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(42, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(43, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(44, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(45, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(46, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(47, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(48, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(49, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL),
(50, 'Врач Врачев тест', 1002, 2001, 1, 'ВСЁ СРАЗУ', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `fields`
--

CREATE TABLE `fields` (
  `id` int NOT NULL,
  `field` varchar(250) NOT NULL,
  `describe_ru` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `describe_ua` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `fields`
--

INSERT INTO `fields` (`id`, `field`, `describe_ru`, `describe_ua`) VALUES
(1, 'id', '№', '№'),
(2, 'fio_doc', 'ФИО', 'ПІБ'),
(3, 'year_b', 'Год рождения', 'Рік народження'),
(4, 'year_d', 'Год смерти', 'Рік смерті'),
(5, 'medwork', 'Работал в медине?', 'Працював в медині?'),
(6, 'discipline', 'Дисциплина', 'Дисципліна'),
(7, 'comment', 'Комментарий', 'Коментар');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
