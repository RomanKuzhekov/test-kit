-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 13 2022 г., 11:31
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test-kit`
--

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `text` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `text`, `parent_id`) VALUES
(20, 'Птицы', 'Описание птиц', NULL),
(21, 'Рыбы', 'Описание всех рыб', NULL),
(22, 'Насекомые', 'Описание насекомых', NULL),
(23, 'Пауки', 'Описание пауков', 22),
(24, 'Цветочный паук', 'Описание - Цветочный паук', 23),
(25, 'Домовой паук', 'Описание - Домовой паук', 23),
(26, 'Голубь', 'Описание голубей', 20),
(27, 'Воробей', 'Описание -воробей', 20),
(28, 'тарантул', 'описание - тарантул', 24);

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `sid` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`sid`, `user_id`, `last_update`) VALUES
('fchpyvjKrb', 1, '2022-10-11 17:52:36'),
('mpYvAi0587', 1, '2022-10-11 18:17:30'),
('9ZIZBXkbon', 2, '2022-10-11 18:18:23'),
('4YPoRx78Hu', 2, '2022-10-11 18:20:03'),
('ydWTvmheQ0', 2, '2022-10-11 18:20:11'),
('YqVBlhOr9P', 2, '2022-10-11 18:28:48'),
('3KcuYNEpWw', 2, '2022-10-11 18:29:02'),
('cdmBMf4zgp', 4, '2022-10-11 18:29:37'),
('b1MpMFiA7b', 4, '2022-10-11 18:29:55'),
('hFjweoSIMQ', 4, '2022-10-11 18:30:33'),
('UxX4wQaDDA', 4, '2022-10-11 18:30:58'),
('UjX7dIu5sy', 4, '2022-10-11 18:31:19'),
('iRMnU5MI0B', 4, '2022-10-11 18:31:55'),
('XnFipy4yc6', 4, '2022-10-11 18:32:57'),
('ydBayv9XpI', 4, '2022-10-11 18:33:03'),
('uOvsKiwxIT', 4, '2022-10-11 18:33:20'),
('VZFrJRcvql', 4, '2022-10-11 18:33:48'),
('uyAs5H9VTx', 4, '2022-10-11 18:34:16'),
('kQTmg84b1y', 4, '2022-10-11 18:35:12'),
('9nM8BafFME', 4, '2022-10-11 18:35:17'),
('QBRLvHy9Bu', 4, '2022-10-11 18:35:21'),
('i9vEsEsi0b', 4, '2022-10-11 18:35:39'),
('7DBBYUWI38', 4, '2022-10-11 18:35:54'),
('3L98zssXZZ', 2, '2022-10-11 18:36:01'),
('e93yqe4Xlc', 2, '2022-10-11 18:36:14'),
('V1zUE62Ocf', 2, '2022-10-11 18:36:33'),
('TgMQ2iJpSG', 2, '2022-10-11 18:36:39'),
('MZDSbvxXPr', 2, '2022-10-11 18:37:09'),
('RPpSKfH8PP', 2, '2022-10-11 18:37:18'),
('bwz249AkuZ', 2, '2022-10-11 18:37:42'),
('vkJ2AOnNs2', 2, '2022-10-11 18:37:48'),
('AkrPIIYyVM', 2, '2022-10-11 18:38:09'),
('zfHkKAKHUG', 1, '2022-10-11 19:18:47'),
('t0mc9DMZuN', 1, '2022-10-11 19:19:49'),
('8gpU9lbcr2', 1, '2022-10-11 19:21:12'),
('wfpC41hA7s', 1, '2022-10-11 21:02:55'),
('L1cikf04Es', 1, '2022-10-11 21:04:10'),
('s3UketQveK', 1, '2022-10-11 21:07:06'),
('PzIiKy1S3v', 15, '2022-10-11 21:15:31'),
('f7AWwfdfMp', 15, '2022-10-11 21:16:07'),
('uhNMx6m5TO', 15, '2022-10-11 21:26:53'),
('PD9X0DHDAz', 15, '2022-10-12 09:59:25'),
('o2EQbVNLS7', 15, '2022-10-12 22:28:59'),
('HcqIruO9LQ', 15, '2022-10-12 22:32:21'),
('22mRV8utNo', 15, '2022-10-13 11:19:26');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `status`, `created_at`) VALUES
(15, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2022-10-11 21:15:31');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
