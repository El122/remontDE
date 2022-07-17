-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 08 2021 г., 11:19
-- Версия сервера: 5.5.62
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `remont2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cats`
--

CREATE TABLE `cats` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cats`
--

INSERT INTO `cats` (`c_id`, `c_name`) VALUES
(1, 'Капитальный ремонт'),
(2, 'Косметический ремонт'),
(4, 'Замена окон'),
(5, 'Строительство'),
(6, 'Копание бассейнов');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `o_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_cat` int(11) NOT NULL,
  `o_maxPrice` bigint(20) NOT NULL,
  `o_finishPrice` bigint(20) DEFAULT NULL,
  `o_photoBefore` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_photoAfter` text COLLATE utf8mb4_unicode_ci,
  `o_date` date NOT NULL,
  `o_user` int(11) NOT NULL,
  `o_stat` enum('Новая','Ремонтируется','Отремонтировано') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Новая'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`o_id`, `o_address`, `o_desc`, `o_cat`, `o_maxPrice`, `o_finishPrice`, `o_photoBefore`, `o_photoAfter`, `o_date`, `o_user`, `o_stat`) VALUES
(1, 'Южные Тирисфальские леса, Лордерон, крепость Лордерон', 'Поменять окна, сделать потолок, поменять пол, наклеить обои', 2, 120000, 0, '2306fcd60e4be9c56ef145cafcd06b67.jpg', 'ebd11ab605c0f4b626a49ca232c0866a-1.png', '2021-04-02', 2, 'Отремонтировано'),
(2, 'Стратхольм', 'Сделать что-нибудь', 1, 20000, 49000, 'mosremontcity.ru-img-2268.jpg', NULL, '2021-04-10', 2, 'Новая'),
(3, 'Деревня старосты Пачу', 'Снести деревню и построить летний домик. С бассейном', 5, 200000, 0, 'ггшл.jpg', 'disney-locations-real-life-inspirations-3.jpg', '2021-04-10', 3, 'Отремонтировано'),
(4, 'Дворец великого императора Кузко', 'Сделать красиво для императора', 2, 50000, 0, '074278b1b5df59303e813921155c19d8.jpg', NULL, '2021-04-10', 3, 'Ремонтируется'),
(6, 'Г. Г. 180/6', 'Сделать красиво', 1, 12000, 49000, 'Remont-kvartiryi-svoimi-rukami-52.jpg', NULL, '2021-04-10', 5, 'Ремонтируется'),
(8, 'Восточная часть Арды (земли смертных), Средиземье, Шир, уютная нора Бильбо Бэггинса', 'Сделать очень капитальный ремонт после нашествия гномов и родственников', 1, 120000, 0, 'before1.jpg', 'm3-homepage-desktop.jpeg', '2021-05-01', 7, 'Отремонтировано');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_pass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_isAdm` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`u_id`, `u_fio`, `u_login`, `u_email`, `u_pass`, `u_isAdm`) VALUES
(1, 'Администратор', 'admin', 'admin@mail.ru', '925000c815f042fa0cdf840d14d32bb9', 1),
(2, 'Артас Менетил', 'kingLich', 'kingLich@wow', '202cb962ac59075b964b07152d234b70', 0),
(3, 'Император Кузко', 'kuzkoImperror', 'empeRRorKUZKO@king.world', '202cb962ac59075b964b07152d234b70', 0),
(4, 'Мистер Краббс', 'crabbs', 'mrCrabsBB@bbottom.dno', '202cb962ac59075b964b07152d234b70', 0),
(5, 'Вероника С', 'veroNIKA', 'ver@mail.ru', '202cb962ac59075b964b07152d234b70', 0),
(6, 'Елена', 'Ielliena', 'lazyelf472@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(7, 'Тосака Рин', 'Rin', 'finff@to.r', '202cb962ac59075b964b07152d234b70', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`c_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `o_cat` (`o_cat`),
  ADD KEY `o_user` (`o_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cats`
--
ALTER TABLE `cats`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`o_user`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`o_cat`) REFERENCES `cats` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
