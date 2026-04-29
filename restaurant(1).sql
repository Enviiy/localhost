-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 29 2026 г., 14:25
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `restaurant`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `guests` int NOT NULL,
  `table_id` int NOT NULL,
  `booking_date` date NOT NULL,
  `time_slot_id` int NOT NULL,
  `id_status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `name`, `surname`, `phone`, `guests`, `table_id`, `booking_date`, `time_slot_id`, `id_status`, `created_at`, `updated_at`) VALUES
(13, 4, 'admin', 'admin', '77777777777', 3, 41, '2026-04-29', 5, 2, '2026-04-28 16:59:48', '2026-04-28 18:04:54');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `quantity`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'De Luxe', 'Ролл \"Лосось Эби\" - тигровая креветка, опаленный лосось, сыр филадельфия, икра черная тобико. Ролл \"Фуллхаус\" - лосось охлажденный, филе тунца, крабовая палочка, икра красная тобико. Ролл \"Лосось люкс\" - лосось охлажденный, гребешок, икра лососевая, икра красная тобико, сыр филадельфия.', 40, 'public/assets/img/rr_046_JLO_8271__1_-768x767.webp', '6400.00', '2026-04-26 19:48:02', '2026-04-29 11:23:03'),
(2, 'Гункан Сет', 'Гункан с лососем 2шт., Гункан со снежным крабом 2шт., Гункан с чукой 2шт., Гункан с тунцом 2шт., соус гамадари, спайси соус (острый), имбирь, соевый соус, васаби', 8, 'public/assets/img/rr_053_GUNKAN_SET-768x768.jpg', '890.00', '2026-04-26 19:48:02', '2026-04-26 19:48:02'),
(3, 'Сет №1', 'Изуми, Шиитаке, Ика, Биг Хот с окунем, имбирь, соевый соус, васаби. В составе роллов: окунь, грибы Шиитаке, кальмар, сыр творожный, майонез, огурцы, томаты, лук порей, омлет Тамаго.', 32, 'public/assets/img/1-768x768.jpg', '1220.00', '2026-04-26 19:48:02', '2026-04-26 19:48:02'),
(4, 'Маки Сет', 'Маки с огурцом, Маки с курицей, Маки с авокадо, Маки с томатом, имбирь, соевый соус, васаби', 32, 'public/assets/img/rr_052_MAKI_SET-768x768.jpg', '540.00', '2026-04-26 19:48:02', '2026-04-26 19:48:02'),
(9, 'Биг Хот с крабом', 'Рис, нори, снежный краб (имитация), томат, сыр творожный, кляр.', 8, 'public\\assets\\img\\rr_032_big-hot-kurica-768x768.webp', '290.00', '2026-04-27 18:01:05', '2026-04-28 20:36:22'),
(10, 'Спайс с лососем', 'Рис, нори, лосось, огурец, сыр творожный, кунжут, соус спайс.', 8, 'public\\assets\\img\\jlo_7520-768x768.webp', '690.00', '2026-04-27 18:01:48', '2026-04-27 18:06:47'),
(11, 'Ролл Дракон', 'Рис, нори, сыр творожный, угорь, снежный краб (имитация), томат.', 8, 'public\\assets\\img\\jlo_7475-768x768.webp', '760.00', '2026-04-27 18:02:24', '2026-04-27 18:07:12'),
(12, 'Горячий ролл Асама', 'Рис, нори, микс лосося и морского окуня, сыр творожный,  кунжут черный/белый, соус для запекания.', 8, 'public\\assets\\img\\rr_029_asama-768x768.webp', '430.00', '2026-04-27 18:03:04', '2026-04-27 18:07:49'),
(13, 'Суши с креветкой', 'Рис, креветка тигровая.', 1, 'public\\assets\\img\\sushi-krevetka-300x300.jpg.webp', '170.00', '2026-04-27 18:03:56', '2026-04-27 18:09:27'),
(14, 'Суши с лососем', 'Рис, лосось охлаждённый.', 1, 'public\\assets\\img\\sushi-losos-300x300.jpg.webp', '240.00', '2026-04-27 18:04:13', '2026-04-27 18:09:27'),
(15, 'Суши с тунцом', 'Рис, тунец охлаждённый.', 1, 'public\\assets\\img\\sushi-tunec-300x300.jpg.webp', '170.00', '2026-04-27 18:04:34', '2026-04-27 18:09:27'),
(16, 'Суши с угрём', 'Рис, угорь жареный, соус унаги, кунжут.', 1, 'public\\assets\\img\\sushi-ugor-300x300.jpg.webp', '240.00', '2026-04-27 18:04:57', '2026-04-27 18:09:27');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Новое'),
(2, 'Подтверждено'),
(3, 'Отменено'),
(4, 'Завершено'),
(5, 'Ожидание');

-- --------------------------------------------------------

--
-- Структура таблицы `tables`
--

CREATE TABLE `tables` (
  `id` int NOT NULL,
  `table_number` int NOT NULL,
  `capacity` int NOT NULL DEFAULT '4',
  `is_active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tables`
--

INSERT INTO `tables` (`id`, `table_number`, `capacity`, `is_active`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 4, 1),
(6, 6, 2, 1),
(7, 7, 2, 1),
(8, 8, 2, 1),
(9, 9, 2, 1),
(10, 10, 4, 1),
(11, 11, 4, 1),
(12, 12, 8, 1),
(13, 13, 8, 1),
(14, 14, 2, 1),
(15, 15, 2, 1),
(16, 16, 2, 1),
(30, 30, 6, 1),
(31, 31, 2, 1),
(32, 32, 2, 1),
(33, 33, 4, 1),
(34, 34, 4, 1),
(35, 35, 4, 1),
(40, 40, 4, 1),
(41, 41, 4, 1),
(42, 42, 4, 1),
(43, 43, 1, 1),
(44, 44, 1, 1),
(45, 45, 1, 1),
(46, 46, 1, 1),
(50, 50, 8, 1),
(51, 51, 4, 1),
(52, 52, 6, 1),
(53, 53, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `table_availability`
--

CREATE TABLE `table_availability` (
  `id` int NOT NULL,
  `table_id` int NOT NULL,
  `booking_date` date NOT NULL,
  `time_slot_id` int NOT NULL,
  `is_booked` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `table_availability`
--

INSERT INTO `table_availability` (`id`, `table_id`, `booking_date`, `time_slot_id`, `is_booked`) VALUES
(8, 1, '2026-04-29', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `time_slots`
--

CREATE TABLE `time_slots` (
  `id` int NOT NULL,
  `slot_time` time NOT NULL,
  `is_active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `time_slots`
--

INSERT INTO `time_slots` (`id`, `slot_time`, `is_active`) VALUES
(1, '12:00:00', 1),
(2, '13:00:00', 1),
(3, '14:00:00', 1),
(4, '15:00:00', 1),
(5, '16:00:00', 1),
(6, '17:00:00', 1),
(7, '18:00:00', 1),
(8, '19:00:00', 1),
(9, '20:00:00', 1),
(10, '21:00:00', 1),
(11, '22:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `role_id` int NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `surname`, `phone`, `email`, `password`, `created_at`, `updated_at`) VALUES
(4, 2, 'admin', 'admin', '88888888888', 'admin@gmail.com', '$2y$10$jpih295jsQvOSIBBTYminOVVmqNFz2XHKtMQFbU54Cvz9VlLUdwC6', '2026-04-28 13:20:53', '2026-04-28 21:04:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `table_id` (`table_id`),
  ADD KEY `bookings_id_status_foreign` (`id_status`),
  ADD KEY `time_slot_id` (`time_slot_id`) USING BTREE;

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_number_unique` (`table_number`);

--
-- Индексы таблицы `table_availability`
--
ALTER TABLE `table_availability`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_table_time` (`table_id`,`booking_date`,`time_slot_id`),
  ADD KEY `time_slot_id` (`time_slot_id`);

--
-- Индексы таблицы `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slot_time_unique` (`slot_time`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `table_availability`
--
ALTER TABLE `table_availability`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`);

--
-- Ограничения внешнего ключа таблицы `table_availability`
--
ALTER TABLE `table_availability`
  ADD CONSTRAINT `table_availability_ibfk_1` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `table_availability_ibfk_2` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slots` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
