-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.20-log - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных task3
CREATE DATABASE IF NOT EXISTS `task3` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `task3`;

-- Дамп структуры для таблица task3.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы task3.migrations: ~11 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_08_15_165421_create_participant_table', 1),
	(4, '2018_08_15_171910_create_roles_table', 1),
	(5, '2018_08_18_092424_create_participants_table', 1),
	(6, '2018_08_18_190626_delete_users_roles_table', 1),
	(7, '2018_08_18_190928_delete_roles_table', 1),
	(8, '2018_08_18_191103_delete_participant_table', 1),
	(9, '2018_08_20_091647_create_countries_table', 1),
	(10, '2018_08_22_145652_add_field_show_to_participants_table', 1),
	(11, '2018_08_27_142723_delete_countries_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Дамп структуры для таблица task3.participants
CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `reportsubject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutme` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `participants_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы task3.participants: ~10 rows (приблизительно)
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` (`id`, `firstname`, `lastname`, `birthdate`, `reportsubject`, `country`, `phone`, `email`, `company`, `position`, `aboutme`, `photo`, `show`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Karelle', 'Veum', '1974-11-12', 'Vel ut necessitatibus in.', 'Somalia', '+1 214 088-5081', 'calista15@deckow.com', 'Spencer and Sons', 'Irradiated-Fuel Handler', 'Perferendis perferendis omnis nulla voluptatem et. Maxime perspiciatis facilis et et et. Qui id qui tenetur similique.', 'https://lorempixel.com/200/200/cats/?61467', 0, NULL, '2006-08-17 09:51:12', '1988-12-31 03:06:36'),
	(2, 'Duncan', 'Waelchi', '1994-07-24', 'Consequatur culpa beatae.', 'New Zealand', '+1 372 870-7224', 'watsica.walton@swaniawski.com', 'Zboncak PLC', 'Machine Operator', 'Autem aut sapiente et id voluptatem cumque qui sapiente. Doloribus laudantium ut enim. Quo qui praesentium dolor illo nostrum velit.', 'https://lorempixel.com/200/200/cats/?31042', 0, NULL, '1983-05-06 02:47:02', '2000-02-06 12:54:38'),
	(3, 'Vicente', 'Kshlerin', '1988-02-18', 'Perferendis voluptas quidem voluptate ipsam.', 'Solomon Islands', '+1 959 838-2653', 'roberts.malinda@gmail.com', 'Roob-Bernier', 'Insurance Sales Agent', 'Quia perferendis sequi repellat corporis. Blanditiis ut sunt in enim. Iusto maiores et ut vel qui. Consequatur ut quia voluptatibus est.', 'https://lorempixel.com/200/200/cats/?50171', 0, NULL, '1996-04-07 07:17:02', '2004-07-28 03:35:19'),
	(4, 'Herman', 'Gleason', '1982-08-06', 'Id omnis.', 'Egypt', '+1 733 575-7170', 'elena05@hotmail.com', 'Bergstrom-Deckow', 'Cutting Machine Operator', 'Qui dolore ea et et. Optio reiciendis et ut autem sunt corporis.', 'https://lorempixel.com/200/200/cats/?45152', 0, NULL, '1990-12-11 11:28:00', '1999-08-03 20:58:43'),
	(5, 'Elissa', 'Hintz', '1992-12-11', 'Non qui adipisci error.', 'Reunion', '+1 300 776-8080', 'triston55@hane.com', 'Paucek-Tillman', 'Control Valve Installer', 'Labore dolore voluptas non porro rerum quae. Tenetur ullam ullam enim inventore nemo suscipit debitis. Voluptas esse expedita corporis id eaque et.', 'https://lorempixel.com/200/200/cats/?23151', 0, NULL, '1985-05-04 13:13:14', '2018-01-03 15:53:57'),
	(6, 'Logan', 'Heathcote', '1986-12-24', 'Impedit consequatur adipisci qui.', 'Hong Kong', '+1 333 909-1396', 'burley.berge@crooks.com', 'Emard, Gerhold and Maggio', 'Skin Care Specialist', 'Ut doloribus animi voluptatum enim consequatur rerum sapiente. Corporis quibusdam quia quo fuga. Est voluptatem sunt aliquid distinctio dolorum cum. Est animi id maiores.', 'https://lorempixel.com/200/200/cats/?94150', 0, NULL, '1978-03-10 13:43:19', '2012-04-16 14:32:13'),
	(7, 'Yoshiko', 'Kuvalis', '1981-12-22', 'Repudiandae hic voluptatem occaecati.', 'Bahrain', '+1 711 461-7933', 'deven.koelpin@hotmail.com', 'Pfannerstill Inc', 'Cartoonist', 'Inventore enim sint in perspiciatis quos. Autem aliquam repudiandae numquam similique consequatur illum ut voluptas. Laborum eos vero aut impedit doloremque.', 'https://lorempixel.com/200/200/cats/?45238', 0, NULL, '1995-10-20 20:34:49', '1972-01-15 16:42:15'),
	(8, 'Lia', 'Walter', '1984-07-13', 'Qui iure qui.', 'Jersey', '+1 447 031-6046', 'elizabeth.koelpin@wintheiser.com', 'Kling LLC', 'Plumber OR Pipefitter OR Steamfitter', 'Libero modi voluptatum sequi provident molestiae sit. Odit at eos culpa quidem velit blanditiis reprehenderit error. Dolores fuga aperiam vel ut. Magni incidunt nihil maiores est.', 'https://lorempixel.com/200/200/cats/?18626', 0, NULL, '1991-06-17 09:57:38', '2014-02-28 13:05:39'),
	(9, 'Ulices', 'Mraz', '1997-01-24', 'Provident nemo.', 'Bosnia and Herzegovina', '+1 166 827-7885', 'maximo23@gmail.com', 'Stracke-Becker', 'Auditor', 'Ducimus quo aliquam illum qui dolore. Esse laudantium molestiae et quaerat vitae debitis sint. Et quos debitis odio exercitationem iusto optio rerum.', 'https://lorempixel.com/200/200/cats/?14184', 0, NULL, '2002-01-26 09:40:44', '2006-12-31 21:24:12'),
	(10, 'Jamie', 'Monahan', '1987-11-28', 'Harum eos rerum.', 'Azerbaijan', '+1 944 003-3679', 'gaylord.vito@donnelly.com', 'Labadie PLC', 'Welder and Cutter', 'Quia inventore rem eius incidunt aliquam exercitationem eum. Est nam quia reiciendis totam voluptatem neque illum. Consequatur quidem vitae fuga itaque in magni suscipit eligendi.', 'https://lorempixel.com/200/200/cats/?27548', 0, NULL, '1980-01-27 08:12:18', '1996-01-04 17:58:10');
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;

-- Дамп структуры для таблица task3.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы task3.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Дамп структуры для таблица task3.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы task3.users: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Christina Miller', 'erick.sipes@bauch.org', '$2y$10$9HT3JLn9CBfJVLX8kWOTOezUet3S.csCRYn.A81uxClTGkGKIkdp2', NULL, NULL, NULL),
	(2, 'Prof. Greta Buckridge', 'fatima.gusikowski@hotmail.com', '$2y$10$yCHJ5xWJSv91u6izUVG59uml/0HIAWOFF07j7Ot9pKGGgLllrl3k2', NULL, NULL, NULL),
	(3, 'Victor Mann I', 'dare.carson@purdy.biz', '$2y$10$j4tkIEUVJuqJVol3H9hD5.oxE2V3UalvexZ1pPuvyUQTm0q0JdZ3a', NULL, NULL, NULL),
	(4, 'Dustin Graham', 'roosevelt.upton@hotmail.com', '$2y$10$XbTNZbtIEQCNw0BfnVog0uhWov5Y.Elgius1IxJQuNz7Scy/ODw6q', NULL, NULL, NULL),
	(5, 'Keagan Zulauf', 'hermina45@runolfsson.net', '$2y$10$HCeZG3FKggxahaA9SdROSO5D.PuPfYDAsiNUwKeOlGpRQhI8uKwmK', NULL, NULL, NULL),
	(6, 'Prof. Irma Kunde', 'vivian.kemmer@hartmann.com', '$2y$10$aKOph/HsrfqNwENuj/R5AuG6ujhfLiZf4VtSgFVC8sXeQQ3aZ/ff6', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
