-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Квт 19 2017 р., 05:31
-- Версія сервера: 10.1.21-MariaDB
-- Версія PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `mvc_coments`
--

-- --------------------------------------------------------

--
-- Структура таблиці `coments`
--

CREATE TABLE `coments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `coments`
--

INSERT INTO `coments` (`id`, `user_id`, `parent_id`, `text`) VALUES
(1, 6, 0, 'salam baeti'),
(2, 6, 1, 'salut baeti sanatate la niamuri'),
(3, 5, 1, 'salut baeti sanatate la niamuri'),
(4, 5, 3, 'salut baeti sanatate la niamuri'),
(6, 5, 5, 'salut baeti sanatate la niamuri'),
(9, 5, 2, 'salut baeti sanatate la niamuri'),
(10, 5, 8, 'slavic ce cu tine'),
(12, 5, 1, 'salut baeti sanatate la niamuri'),
(15, 5, 8, 'salut '),
(16, 5, 8, 'salut baeti sanatate la niamuri'),
(17, 5, 15, 'salut baeti sanatate la niamuri'),
(21, 5, 20, 'salut baeti sanatate la niamuri'),
(22, 5, 20, 'salut baeti sanatate la niamuri'),
(23, 5, 8, 'salut baeti sanatate la niamuri'),
(25, 5, 18, 'salut baeti sanatate la niamuri'),
(26, 5, 0, 'salut baeti sanatate la niamuri'),
(27, 5, 0, 'salut baeti sanatate la niamuri'),
(29, 5, 0, 'salut baeti sanatate la niamuri'),
(36, 5, 8, 'salut baeti sanatate la niamuri'),
(37, 5, 15, 'salut baeti sanatate la niamuri'),
(38, 5, 25, 'salut baeti sanatate la niamuri'),
(46, 5, 32, 'Вячеслав,прол');

-- --------------------------------------------------------

--
-- Структура таблиці `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coment_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `marks`
--

INSERT INTO `marks` (`id`, `user_id`, `coment_id`, `mark`) VALUES
(3, 5, 1, 5);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Password`) VALUES
(5, 'Вячеслав', 'Vgantyuk2@gmail.com', '$2y$10$gvU1dHyeCYXFU1wNMZxlEeg1Gn3tymFVlxx3fbgyWU5/2PtqIbkwS'),
(6, 'Гость', 'Slavik@ghj', '$2y$10$DXyUGlq.gfDE8bVKXHG3I.aDE5ZVFLmaqsM95udDW.vCUkSaSDT1e'),
(7, 'Гость', 'Slavik@fg', '$2y$10$OFJ3e/2melaVS6wA/6sqoO5muFKTkdMJ71aw7bL7eNRA4GsLT055S');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `coments`
--
ALTER TABLE `coments`
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_2` (`id`);

--
-- Індекси таблиці `marks`
--
ALTER TABLE `marks`
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `coment_id` (`coment_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `coments`
--
ALTER TABLE `coments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблиці `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `coments`
--
ALTER TABLE `coments`
  ADD CONSTRAINT `coments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`coment_id`) REFERENCES `coments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
