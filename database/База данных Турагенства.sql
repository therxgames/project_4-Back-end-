-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 03 2020 г., 17:22
-- Версия сервера: 5.6.41
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `agency`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` int(11) UNSIGNED DEFAULT NULL,
  `name` int(11) UNSIGNED DEFAULT NULL,
  `surname` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `phone` int(11) UNSIGNED DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `login`, `name`, `surname`, `email`, `phone`, `password`) VALUES
(1, 123, 123, 123, '123@mail.ru', 123, '$2y$10$sFLQMNN4YBdZv.w2OGh4ZOlY9KFt3LSiGDKaMK4sB09TpyFuuiDn.');

-- --------------------------------------------------------

--
-- Структура таблицы `gorog`
--

CREATE TABLE `gorog` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `land` int(11) DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gorog`
--

INSERT INTO `gorog` (`id`, `name`, `land`, `image`, `description`) VALUES
(1, 'Берлин', 2, 'images/Без названия (1).jpg', 'Берлин – столица Германии, история которой восходит к XIII в. О непростой истории города в XX в. напоминают Мемориал жертвам Холокоста и граффити на руинах Берлинской стены. Бранденбургские ворота, возведенные в XVIII в., известны как символ воссоединения Берлина, разделенного во время Холодной войны на две части. Также город славится своими художественными галереями и современными достопримечательностями, например построенной в 1963 г. филармонией золотого цвета с крышей в форме циркового шатра.'),
(2, 'Сидней', 1, 'images/sydnei.jpg', 'Сидней – крупнейший город Австралии и столица штата Новый Южный Уэльс. Его главная достопримечательность – здание Сиднейской оперы, которое напоминает взметнувшиеся в небо паруса, вырастающие прямо из вод гавани. Дарлинг-Харбор и Круговая пристань – самые оживленные прибрежные районы Сиднея. Именно там находятся арочный мост Харбор-Бридж и Королевский ботанический сад. С открытой смотровой площадки \"Скайуок\" на Сиднейской башне открывается панорамный вид на город и его окрестности.');

-- --------------------------------------------------------

--
-- Структура таблицы `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `names` varchar(30) NOT NULL,
  `stars` int(11) NOT NULL,
  `gorod` int(11) NOT NULL,
  `price2` float NOT NULL,
  `image` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hotel`
--

INSERT INTO `hotel` (`id`, `names`, `stars`, `gorod`, `price2`, `image`, `description`) VALUES
(1, 'Sytel', 3, 1, 1200, 'images/hotel_1.jpg', 'Отель Sytel расположен в Берлине,. К услугам гостей бассейн на крыше, терраса для загара, бесплатный Wi-Fi и несколько ресторанов.'),
(2, 'Beerotel', 4, 2, 3000, 'images/hotel_2.jpg', 'Отель типа «постель и завтрак» Beerotel с террасой расположен в поселке Имеровигли. К услугам гостей бесплатный Wi-Fi.'),
(3, 'Hoopa', 5, 1, 5000, 'images/hotel_parig.jpg', 'Стильные апартаменты Hoopa Hotel с кондиционером и бесплатным Wi-Fi находятся всего в 500 метрах от Эйфелевой башни и в 5 минутах ходьбы от станции метро Marble Arch.');

-- --------------------------------------------------------

--
-- Структура таблицы `land`
--

CREATE TABLE `land` (
  `id` int(11) NOT NULL,
  `names` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `land`
--

INSERT INTO `land` (`id`, `names`) VALUES
(1, 'Австралия'),
(2, 'Германия'),
(3, 'Франция');

-- --------------------------------------------------------

--
-- Структура таблицы `prodazha`
--

CREATE TABLE `prodazha` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `tour` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prodazha`
--

INSERT INTO `prodazha` (`id`, `client`, `date`, `price`, `tour`) VALUES
(1, 5, '2019-05-29', 8000, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `type_tour` int(11) NOT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `hotel` int(11) NOT NULL,
  `gorod` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tour`
--

INSERT INTO `tour` (`id`, `type_tour`, `date_begin`, `date_end`, `hotel`, `gorod`, `price`) VALUES
(7, 1, '2019-06-10', '2019-10-09', 2, 2, 1000);

-- --------------------------------------------------------

--
-- Структура таблицы `type_tour`
--

CREATE TABLE `type_tour` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_tour`
--

INSERT INTO `type_tour` (`id`, `type`) VALUES
(1, 'Туристический'),
(2, 'Образовательный'),
(3, 'Религиозный');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `root` tinyint(1) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `root`, `password`, `name`, `surname`, `email`, `phone`) VALUES
(5, 'admin', 1, '$2y$10$UswarrY/Ju0lWCJOCYQfrOyrI3iMr.bRgBedF4ECs6R3vHlnkrs3G', 'Ростислав', 'Михайлов', 'therxgames02@gmail.com', 5553535),
(6, 'emma4ka', 0, '$2y$10$.lIMNnIcMMNG2B0.qWhieeMpXfsRHu8qwGSdeE.g2HqzBBQrE8SkW', 'Эмма', 'Стоун', 'emmastone@gmail.com', 12345);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gorog`
--
ALTER TABLE `gorog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_land` (`land`);

--
-- Индексы таблицы `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_gorod` (`gorod`);

--
-- Индексы таблицы `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `prodazha`
--
ALTER TABLE `prodazha`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_tour` (`tour`),
  ADD KEY `client_login` (`client`);

--
-- Индексы таблицы `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_type_tour` (`type_tour`),
  ADD KEY `gorod` (`gorod`),
  ADD KEY `hotel` (`hotel`);

--
-- Индексы таблицы `type_tour`
--
ALTER TABLE `type_tour`
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
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `gorog`
--
ALTER TABLE `gorog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `land`
--
ALTER TABLE `land`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `prodazha`
--
ALTER TABLE `prodazha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `type_tour`
--
ALTER TABLE `type_tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `gorog`
--
ALTER TABLE `gorog`
  ADD CONSTRAINT `f_land` FOREIGN KEY (`land`) REFERENCES `land` (`id`);

--
-- Ограничения внешнего ключа таблицы `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `f_gorod` FOREIGN KEY (`gorod`) REFERENCES `gorog` (`id`);

--
-- Ограничения внешнего ключа таблицы `prodazha`
--
ALTER TABLE `prodazha`
  ADD CONSTRAINT `f_tour` FOREIGN KEY (`tour`) REFERENCES `tour` (`id`),
  ADD CONSTRAINT `prodazha_ibfk_1` FOREIGN KEY (`client`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `f_hotel` FOREIGN KEY (`hotel`) REFERENCES `hotel` (`id`),
  ADD CONSTRAINT `f_type_tour` FOREIGN KEY (`type_tour`) REFERENCES `type_tour` (`id`),
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`gorod`) REFERENCES `gorog` (`id`),
  ADD CONSTRAINT `tour_ibfk_2` FOREIGN KEY (`hotel`) REFERENCES `hotel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
