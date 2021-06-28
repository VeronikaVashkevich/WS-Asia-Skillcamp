-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 28 2021 г., 11:21
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `designpro`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(903, 'Пентхаус'),
(905, 'Дом'),
(907, '2d дизайн'),
(908, 'Квартира'),
(909, '3d дизайн');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `complited` tinyint(1) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `category` varchar(40) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_login` int DEFAULT NULL,
  `design` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `title`, `date`, `complited`, `description`, `category`, `photo`, `status`, `user_login`, `design`, `comment`) VALUES
(26, 'Дом на Рублевке', '2021-06-24', 0, 'Да да я достаточно богат, чтоб позволить себе подобное', 'Дом', 'assets/img/1624551790f4a7dc00b97c4a9fecf51016c9f96d89.jpg', 'Принято в работу', 4, NULL, 'test test test'),
(27, 'Пентхаус на крыше Сан-Франциско', '2021-06-25', 0, 'Тут жил жид', 'Пентхаус', 'assets/img/1624644243photo.jpg', 'Принято в работу', 4, NULL, 'Проверка ололололо'),
(28, 'Квартира профиля 1', '2021-06-26', 0, 'Квартира профиля 1', 'Квартира', 'assets/img/1624732886f4a7dc00b97c4a9fecf51016c9f96d89.jpg', 'Принято в работу', 8, NULL, 'Комментарий для продвижения видео'),
(30, 'Профиль 2 3д', '2021-06-27', 0, 'Три кольца - премудрым эльфам - для добра их гордого.', '3d дизайн', 'assets/img/1624798676photo.jpg', 'Выполнено', 9, 'assets/img/16248161432522.jpg', NULL),
(31, 'Профиль 2 2д', '2021-06-27', 0, 'Семь колец - пещерным гномам - для труда их горного.', '2d дизайн', 'assets/img/1624798719kadastroviy-plan-kvartiry-dokumenty.jpg', 'Выполнено', 9, 'assets/img/16248163753d-dmax-kat-ve-daire-tasarım-modlleri-14.webp', NULL),
(32, 'Профиль 3 квартира', '2021-06-27', 0, 'Профиль 3 квартира', 'Квартира', 'assets/img/1624816299kadastroviy-plan-kvartiry-dokumenty.jpg', 'Выполнено', 10, 'assets/img/1624816403dizajn-kvartiry-100-kv_5d2f4ec39d032.jpg', NULL),
(33, 'Профиль 3 пентхаус', '2021-06-27', 0, 'Профиль 3 пентхаус', 'Пентхаус', 'assets/img/1624816338fdeaa02f30fd7a2033a73443fd0ab265.jpg', 'Выполнено', 10, 'assets/img/1624816431scale_1200.webp', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int NOT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `status`) VALUES
(1, 'Новая'),
(2, 'Принято в работу'),
(3, 'Выполнено');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `login` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `status`) VALUES
(2, 'veronika vashkevich', 'login', 'em@google.com', '63a9f0ea7bb98050796b649e85481845', 1),
(4, 'Вероника', 'veronikaaa', 'veronik.vashkevich@gmail.com', '927d68afb6a6a06543ebcd886b7b8d5b', 1),
(5, 'Паша', 'pavel', 'pavel@email.com', 'ef1652b79c940145b600de7a2fe0288e', 1),
(6, 'Super admin', 'admin', 'admin@gmail.com', 'b136b8d882359128ef7c4eb8ad7390f7', 10),
(7, 'Анна', 'anna', 'anna@gmail.com', 'a70f9e38ff015afaa9ab0aacabee2e13', 1),
(8, 'Профиль 1', 'prof1', 'prof1@rfg.rt', '4f5fdb3de5aa701eae2961743a00c01c', 1),
(9, 'Профиль 2', 'prof2', 'prof2@fd.ro', 'c52a44b3378c9ef375b7dadecd783921', 1),
(10, 'Профиль 3', 'prof3', 'prof3@fgol.sdfop', '1eff3c8299b8fa754815d590badcf98f', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
