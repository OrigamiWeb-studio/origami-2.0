-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 29 2018 г., 10:29
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `origami_2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `developers`
--

CREATE TABLE `developers` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(11) NOT NULL,
  `rate` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `developers`
--

INSERT INTO `developers` (`id`, `profile_id`, `rate`) VALUES
(1, 1, '7.00'),
(2, 2, '7.00'),
(3, 3, '7.00'),
(4, 4, '7.00');

-- --------------------------------------------------------

--
-- Структура таблицы `developer_educations`
--

CREATE TABLE `developer_educations` (
  `id` int(10) UNSIGNED NOT NULL,
  `developer_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `developer_educations`
--

INSERT INTO `developer_educations` (`id`, `developer_id`, `date_from`, `date_to`) VALUES
(1, 1, '2015-02-14', '2016-05-18'),
(2, 1, '2012-05-01', '2014-05-05');

-- --------------------------------------------------------

--
-- Структура таблицы `developer_experiences`
--

CREATE TABLE `developer_experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `developer_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `developer_experiences`
--

INSERT INTO `developer_experiences` (`id`, `developer_id`, `date_from`, `date_to`) VALUES
(1, 1, '2012-05-21', '2013-05-22'),
(2, 1, '2014-05-03', '2017-05-19');

-- --------------------------------------------------------

--
-- Структура таблицы `developer_languages`
--

CREATE TABLE `developer_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `developer_id` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `developer_languages`
--

INSERT INTO `developer_languages` (`id`, `developer_id`, `icon`, `value`) VALUES
(1, 1, 'uk-ico', 10),
(2, 1, 'ru-ico', 10),
(3, 1, 'pl-ico', 7),
(4, 1, 'en-ico', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `developer_skills`
--

CREATE TABLE `developer_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `developer_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `developer_skills`
--

INSERT INTO `developer_skills` (`id`, `developer_id`, `value`) VALUES
(1, 1, 7),
(2, 1, 8),
(3, 1, 8),
(4, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `developer_skill_translations`
--

CREATE TABLE `developer_skill_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `developer_skill_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `developer_skill_translations`
--

INSERT INTO `developer_skill_translations` (`id`, `developer_skill_id`, `title`, `locale`) VALUES
(1, 1, 'PHP', 'en'),
(2, 2, 'HTML', 'en'),
(3, 3, 'CSS', 'en'),
(4, 4, 'Тест-укр', 'uk'),
(5, 4, 'Тест-рус', 'ru'),
(6, 4, 'Test-eng', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `developer_translations`
--

CREATE TABLE `developer_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `developer_id` int(10) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interests` text COLLATE utf8mb4_unicode_ci,
  `position` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `developer_translations`
--

INSERT INTO `developer_translations` (`id`, `developer_id`, `location`, `interests`, `position`, `locale`) VALUES
(1, 1, 'Poland, Lodz', 'My interests', 'Back-end developer', 'en'),
(2, 1, 'Польща, Лодзь', 'Мої інтереси', 'Back-end розробник', 'uk'),
(3, 1, 'Польша, Лодзь', 'Мои интересы', 'Back-end разработчик', 'ru'),
(4, 2, 'Ukraine', 'Interests', 'Designer', 'en'),
(5, 2, 'Украина', 'Интересы', 'Дизайнер', 'ru'),
(6, 2, 'Україна', 'Інтереси', 'Дизайнер', 'uk'),
(7, 3, 'Poland', 'Interests', 'Front-end developer', 'en'),
(8, 3, 'Польша', 'Интересы', 'Front-end разработчик', 'ru'),
(9, 3, 'Польща', 'Інтереси', 'Front-end розробник', 'uk'),
(10, 4, 'Ukraine', 'My interests', 'Back-end developer', 'en'),
(11, 4, 'Украина', 'Мої інтереси', 'Back-end розробник', 'uk'),
(12, 4, 'Україна', 'Мои интересы', 'Back-end разработчик', 'ru');

-- --------------------------------------------------------

--
-- Структура таблицы `dev_edu_trans`
--

CREATE TABLE `dev_edu_trans` (
  `id` int(10) UNSIGNED NOT NULL,
  `developer_education_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dev_edu_trans`
--

INSERT INTO `dev_edu_trans` (`id`, `developer_education_id`, `title`, `location`, `profession`, `locale`) VALUES
(1, 1, 'Коледж харчової промисловості НУХТ', 'Кам\'янець-Подільський, Україна', 'Розробка програмних систем і комплексів', 'uk'),
(2, 1, 'Колледж пищевой промышленности НУПТ', 'Каменец-Подольский, Украина', 'Разработка програмных систем и комплексов', 'ru'),
(3, 1, 'College of food industry NUFI', 'Kamianets-Podilskyi', 'Development of software systems and complexes', 'en'),
(4, 2, 'Загальноосвітня школа якась там', 'К-П, Україна', 'Розробка ніхєра', 'uk'),
(5, 2, 'ООШ какая то там', 'Каменец-Подольский, Украина', 'Мастер ничегонеделанья', 'ru'),
(6, 2, 'School number ?', 'K-P, Ukraine', 'Nothink to show', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `dev_exp_trans`
--

CREATE TABLE `dev_exp_trans` (
  `id` int(10) UNSIGNED NOT NULL,
  `developer_experience_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dev_exp_trans`
--

INSERT INTO `dev_exp_trans` (`id`, `developer_experience_id`, `title`, `location`, `position`, `description`, `locale`) VALUES
(1, 1, 'Казкова робота номер один', 'Кам\'янець-Подільський, Україна', 'Казковий менеджер', 'Лорем іпсум долор сіт аммет! Лорем іпсум долор сіт аммет! Лорем іпсум долор сіт аммет! Лорем іпсум долор сіт аммет! Лорем іпсум долор сіт аммет! Лорем іпсум долор сіт аммет! Лорем іпсум долор сіт аммет!', 'uk'),
(2, 1, 'Сказочная работа номер один', 'Каменец-Подольский, Украина', 'Сказочный менеджер', 'Лорем ипсум долор сит аммет! Лорем ипсум долор сит аммет! Лорем ипсум долор сит аммет! Лорем ипсум долор сит аммет! Лорем ипсум долор сит аммет! Лорем ипсум долор сит аммет! Лорем ипсум долор сит аммет!', 'ru'),
(3, 1, 'Magic work number one', 'Kamianets-Podilskyi, Ukraine', 'Magic manager', 'Lorem ipsum dolor sit ammet! Lorem ipsum dolor sit ammet! Lorem ipsum dolor sit ammet! Lorem ipsum dolor sit ammet! Lorem ipsum dolor sit ammet! Lorem ipsum dolor sit ammet! Lorem ipsum dolor sit ammet!', 'en'),
(4, 2, 'Робота два', 'Лодзь, Польща', 'Головний розробник', 'Курва я пєрдолє, цо то єст? Нє вєм. Курва я пєрдолє, цо то єст? Нє вєм. Курва я пєрдолє, цо то єст? Нє вєм. Курва я пєрдолє, цо то єст? Нє вєм. Курва я пєрдолє, цо то єст? Нє вєм. Курва я пєрдолє, цо то єст? Нє вєм.', 'uk'),
(5, 2, 'Работа два', 'Лодзь, Польша', 'Главный разработчик', 'Курва, я пердоле, цо то ест? Не вем! Курва, я пердоле, цо то ест? Не вем! Курва, я пердоле, цо то ест? Не вем! Курва, я пердоле, цо то ест? Не вем! Курва, я пердоле, цо то ест? Не вем! Курва, я пердоле, цо то ест? Не вем! Курва, я пердоле, цо то ест? Не вем!', 'ru'),
(6, 2, 'Second work', 'Lodz, Poland', 'Main developer', 'Kurwa ja pierdole, co to jest? Nie wiem kurwa! Kurwa ja pierdole, co to jest? Nie wiem kurwa! Kurwa ja pierdole, co to jest? Nie wiem kurwa! Kurwa ja pierdole, co to jest? Nie wiem kurwa! Kurwa ja pierdole, co to jest? Nie wiem kurwa! Kurwa ja pierdole, co to jest? Nie wiem kurwa! Kurwa ja pierdole, co to jest? Nie wiem kurwa!', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `dev_lang_trans`
--

CREATE TABLE `dev_lang_trans` (
  `id` int(10) UNSIGNED NOT NULL,
  `developer_language_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dev_lang_trans`
--

INSERT INTO `dev_lang_trans` (`id`, `developer_language_id`, `title`, `locale`) VALUES
(1, 1, 'Українська', 'uk'),
(2, 2, 'Російська', 'uk'),
(3, 3, 'Польська', 'uk'),
(4, 4, 'Англійська', 'uk'),
(5, 1, 'Украинский', 'ru'),
(6, 2, 'Русский', 'ru'),
(7, 3, 'Польский', 'ru'),
(8, 4, 'Английский', 'ru'),
(9, 1, 'Ukrainian', 'en'),
(10, 2, 'Russian', 'en'),
(11, 3, 'Polish', 'en'),
(12, 4, 'English', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `email_requests`
--

CREATE TABLE `email_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_category_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `email_requests`
--

INSERT INTO `email_requests` (`id`, `type`, `name`, `user_id`, `user_ip`, `company`, `email`, `phone`, `budget`, `project_category_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Start project', 'Олександр Солодовніков', 1, '127.0.0.1', 'Веб-студія Орігамі', 'sanek.solodovnikov.94@gmail.com', '+48535764974', '$2500 - $5000', 4, 'Мій ігровий портал має бути самий кращий.', '2017-07-23 08:22:51', '2017-07-23 08:22:51'),
(2, 'Contact us', 'Oleksandr Solodovnikov', 1, '127.0.0.1', NULL, 'sanek.solodovnikov.94@gmail.com', NULL, NULL, NULL, 'Опис чогось там.', '2017-07-23 08:36:46', '2017-07-23 08:36:46'),
(3, 'Contact us', 'Test name', 1, '127.0.0.1', NULL, 'sanek.solodovnikov.94@gmail.com', NULL, NULL, NULL, 'Tstt sdes sfdf dsf', '2017-07-23 08:54:09', '2017-07-23 08:54:09'),
(4, 'Start project', 'Саньок', 1, '127.0.0.1', 'Компанія', 'email@email.com', '+48535764974', '$5000 - $10000', 2, 'fksdhgkjdsgfkjsdh gkjdshgkjhdsg', '2017-07-23 12:05:02', '2017-07-23 12:05:02'),
(5, 'Contact us', 'Test name', NULL, '127.0.0.1', NULL, 'sanek.solodovnikov.94@gmail.com', NULL, NULL, NULL, 'Тест', '2017-08-30 06:38:29', '2017-08-30 06:38:29'),
(6, 'Contact us', 'Sanek', NULL, '188.190.59.48', NULL, 'sanek.solodovnikov.94@gmail.com', NULL, NULL, NULL, 'Detali project\'s', '2017-09-20 15:01:11', '2017-09-20 15:01:11'),
(7, 'Contact us', 'Oleksandr Solodovnikov', NULL, '188.190.59.48', NULL, 'sanek.solodovnikov.94@gmail.com', NULL, NULL, NULL, 'dfsdfsdfdsf', '2017-09-20 15:01:57', '2017-09-20 15:01:57'),
(8, 'Contact us', 'Oleksandr Solodovnikov', 1, '188.190.59.48', NULL, 'sanek.solodovnikov.94@gmail.com', '+444555666888', NULL, NULL, 'dfsdsfdf', '2017-09-24 21:03:45', '2017-09-24 21:03:45'),
(9, 'Contact us', 'Oleksandr Solodovnikov', 1, '188.190.59.48', NULL, 'sanek.solodovnikov.94@gmail.com', NULL, NULL, NULL, 'dfjkhgkjdg', '2017-09-24 21:04:04', '2017-09-24 21:04:04'),
(10, 'Start project', 'Oleksandr Solodovnikov', 1, '188.190.59.48', 'fgd', 'sanek.solodovnikov.94@gmail.com', '+48555777977', '$5000 - $10000', 1, 'dgfgfdg', '2017-09-24 21:04:25', '2017-09-24 21:04:25'),
(11, 'Contact us', 'Oleksandr Solodovnikov', 1, '188.190.59.48', NULL, 'sanek.solodovnikov.94@gmail.com', NULL, NULL, NULL, 'вереае', '2017-09-24 21:05:46', '2017-09-24 21:05:46'),
(12, 'Start project', 'Menetué', NULL, '46.171.148.141', 'mycompany1', 'sss@gmail.com', '+38(096)386-45-52', '< $2500', 1, 'фвфівфівфівфівфі', '2017-09-25 11:47:08', '2017-09-25 11:47:08'),
(13, 'Contact us', 'zdasti', NULL, '46.171.148.141', NULL, 'zdrasto@mail.com', '232132', NULL, NULL, 'asdfadsfasfasdf', '2017-09-25 11:48:50', '2017-09-25 11:48:50');

-- --------------------------------------------------------

--
-- Структура таблицы `locales`
--

CREATE TABLE `locales` (
  `id` int(10) UNSIGNED NOT NULL,
  `order` tinyint(3) UNSIGNED NOT NULL,
  `code` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `locales`
--

INSERT INTO `locales` (`id`, `order`, `code`, `name`, `active`) VALUES
(1, 0, 'en', 'English', 1),
(2, 1, 'ru', 'Русский', 1),
(3, 2, 'uk', 'Українська', 1),
(4, 3, 'pl', 'Polski', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2017_05_07_143722_entrust_setup_tables', 2),
(12, '2017_05_07_181110_create_profiles_table', 3),
(13, '2017_05_07_183213_create_profile_phones_table', 4),
(14, '2017_05_07_184808_create_profile_emails_table', 5),
(16, '2017_05_07_190717_create_profile_socials_table', 6),
(17, '2017_05_07_193103_create_developers_table', 7),
(23, '2017_05_07_195717_create_developer_skills_table', 9),
(24, '2017_05_08_101628_create_developer_educations_table', 9),
(25, '2017_05_07_194709_create_developer_languages_table', 10),
(26, '2017_05_08_111529_create_developer_experiences_table', 11),
(28, '2017_05_08_115655_create_projects_table', 12),
(29, '2017_05_08_121009_create_project_categories_table', 13),
(30, '2017_05_08_122838_create_project_developer_table', 14),
(31, '2017_05_08_124746_create_project_stages_table', 15),
(32, '2017_05_08_125059_create_project_stage_table', 16),
(34, '2017_05_08_130808_create_project_screenshots_table', 17),
(35, '2017_05_08_131846_create_project_comments_table', 18),
(37, '2017_05_08_144323_create_tickets_table', 19),
(38, '2017_05_08_150902_create_ticket_steps_table', 20),
(39, '2017_05_08_152113_create_ticket_comments_table', 21),
(41, '2017_05_13_124402_add_client_review_field_to_projects_table', 22),
(42, '2017_05_13_133016_add_cover_field_to_projects_table', 23),
(44, '2017_05_13_162116_create_locales_table', 24),
(45, '2017_05_28_162452_add_is_developer_field_to_users_table', 25),
(47, '2017_07_13_153447_add_fields_to_projects_table', 26),
(48, '2017_07_13_193949_add_main_image_field_to_projects_table', 27),
(49, '2017_07_13_214441_add_position_field_to_developers_table', 28),
(50, '2017_07_14_095647_add_parent_id_field_to_project_comments_table', 29),
(51, '2017_07_18_163730_change_total_time_and_total_price_default_values__in_projects_table', 30),
(55, '2017_07_23_111642_create_email_requests_table', 31),
(56, '2017_09_13_142147_add_order_and_description_fields_to_project_stages_table', 32),
(57, '2017_09_22_151245_add_order_field_to_project_screenshots_table', 33),
(58, '2017_10_11_150820_add_soft_deletes_to_projects_table', 34),
(59, '2017_10_11_153942_add_soft_deletes_to_project_comments_table', 35),
(60, '2017_10_11_154030_add_soft_deletes_to_project_screenshots_table', 35),
(61, '2017_10_11_154211_add_soft_deletes_to_tickets_table', 35),
(62, '2017_10_11_154237_add_soft_deletes_to_ticket_comments_table', 35),
(63, '2017_10_11_154257_add_soft_deletes_to_ticket_steps_table', 35),
(64, '2017_10_19_082245_add_slug_field_to_projects_table', 36),
(65, '2017_10_20_101022_add_last_edit_by_field_to_projects_table', 37),
(66, '2017_10_24_110814_add_name_field_to_project_comments_table', 38),
(67, '2017_10_24_111253_add_confirmed_field_to_project_comments_table', 39);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'project-create', '2017-04-30 22:00:00', '2017-04-30 22:00:00'),
(2, 'project-edit', '2017-04-30 22:00:00', '2017-04-30 22:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `permission_translations`
--

CREATE TABLE `permission_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permission_translations`
--

INSERT INTO `permission_translations` (`id`, `permission_id`, `display_name`, `description`, `locale`) VALUES
(1, 1, 'Project: create', 'Project: create', 'en'),
(2, 1, 'Проект: додати', 'Проект: додати', 'uk'),
(3, 1, 'Проект: добавить', 'Проект: добавить', 'ru'),
(4, 2, 'Project: edit', 'Project: edit', 'en'),
(5, 2, 'Проект: редагувати', 'Проект: редагувати', 'uk'),
(6, 2, 'Проект: редактировать', 'Проект: редактировать', 'ru');

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `photo`, `sex`) VALUES
(1, 1, 'https://s-media-cache-ak0.pinimg.com/736x/77/0b/c3/770bc3c00bfcb0e523e8a4c075c82c0b--green-eyes-blue-eyes.jpg', 1),
(2, 2, 'https://s-media-cache-ak0.pinimg.com/736x/77/0b/c3/770bc3c00bfcb0e523e8a4c075c82c0b--green-eyes-blue-eyes.jpg', 1),
(3, 3, 'https://s-media-cache-ak0.pinimg.com/736x/77/0b/c3/770bc3c00bfcb0e523e8a4c075c82c0b--green-eyes-blue-eyes.jpg', 1),
(4, 4, 'https://s-media-cache-ak0.pinimg.com/736x/77/0b/c3/770bc3c00bfcb0e523e8a4c075c82c0b--green-eyes-blue-eyes.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `profile_emails`
--

CREATE TABLE `profile_emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(11) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `value` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profile_emails`
--

INSERT INTO `profile_emails` (`id`, `profile_id`, `type`, `value`) VALUES
(1, 1, 0, 'age007nt@gmail.com'),
(2, 1, 1, 'sanek.solodovnikov.94@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `profile_phones`
--

CREATE TABLE `profile_phones` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(11) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `value` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profile_phones`
--

INSERT INTO `profile_phones` (`id`, `profile_id`, `type`, `value`) VALUES
(1, 1, 0, '+48 535 764 974'),
(2, 1, 1, '+380 970 549 722');

-- --------------------------------------------------------

--
-- Структура таблицы `profile_socials`
--

CREATE TABLE `profile_socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profile_socials`
--

INSERT INTO `profile_socials` (`id`, `profile_id`, `icon`, `value`, `class`, `type`) VALUES
(1, 1, 'fa fa-vk', 'http://vk.com/id1', 'social-vk', 1),
(2, 1, 'fa fa-skype', 's_a_n_y_a_2010', 'social-skype', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `profile_translations`
--

CREATE TABLE `profile_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `profile_translations`
--

INSERT INTO `profile_translations` (`id`, `profile_id`, `first_name`, `last_name`, `about`, `locale`) VALUES
(1, 1, 'Олександр', 'Солодовніков', NULL, 'uk'),
(2, 1, 'Александр', 'Солодовников', NULL, 'ru'),
(3, 1, 'Oleksandr', 'Solodovnikov', NULL, 'en'),
(4, 2, 'Віктор', 'Собищанський', NULL, 'uk'),
(5, 2, 'Виктор', 'Собищанский', NULL, 'ru'),
(6, 2, 'Viktor', 'Sobyshchanskyi', NULL, 'en'),
(7, 3, 'Гліб', 'Ляпота', NULL, 'uk'),
(8, 3, 'Глеб', 'Ляпота', NULL, 'ru'),
(9, 3, 'Hlib', 'Liapota', NULL, 'en'),
(10, 4, 'Віталій', 'Лошній', NULL, 'uk'),
(11, 4, 'Виталий', 'Лошний', NULL, 'ru'),
(12, 4, 'Vitalii', 'Loshnii', NULL, 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `current_stage_id` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_time` int(11) NOT NULL DEFAULT '0',
  `total_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `us_choice` tinyint(1) NOT NULL DEFAULT '0',
  `client_review` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_edit_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `closed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `client_id`, `category_id`, `current_stage_id`, `link`, `slug`, `cover`, `main_image`, `total_time`, `total_price`, `visible`, `us_choice`, `client_review`, `last_edit_by`, `created_at`, `updated_at`, `deleted_at`, `closed_at`) VALUES
(3, 0, 8, 7, NULL, 'photographer_portfolio', 'uploads/projects/placeholders/tadTH15067165544itNM.png', 'uploads/projects/main_images/q80td1506716554idyIM.png', 0, '0.00', 0, 0, NULL, 1, '2017-09-29 22:22:34', '2017-10-20 08:50:26', NULL, '2017-10-05 22:00:00'),
(4, 0, 5, 7, NULL, 'valentus_project', 'uploads/projects/placeholders/o56F615067170643QGQs.png', 'uploads/projects/main_images/lE6el1506717380clVV8.jpg', 0, '0.00', 1, 1, NULL, 1, '2017-09-29 22:31:04', '2017-10-20 06:54:43', NULL, '2017-10-05 22:00:00'),
(5, 0, 3, 3, NULL, '', 'uploads/projects/placeholders/1d3b41508347618hgInS.png', 'uploads/projects/main_images/aWk1V15083476184cIPr.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 17:26:58', '2017-10-18 17:26:58', NULL, '2017-10-17 22:00:00'),
(6, 0, 2, 3, NULL, 'tst', 'uploads/projects/placeholders/fHAo11508349214BJAL2.png', 'uploads/projects/main_images/KJESJ15083492141X5WC.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 17:53:34', '2017-10-20 06:45:47', '2017-10-20 06:45:47', '2017-10-17 22:00:00'),
(7, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/I2gHa1508349285Sq0Ki.png', 'uploads/projects/main_images/gACAO1508349285OeG3m.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 17:54:45', '2017-10-18 18:38:38', '2017-10-18 18:38:38', '2017-10-17 22:00:00'),
(8, 0, 1, 4, NULL, '', 'uploads/projects/placeholders/dBlXZ1508349418u3tkV.png', 'uploads/projects/main_images/cJQkx15083494189rsPt.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 17:56:58', '2017-10-18 18:38:31', '2017-10-18 18:38:31', '2017-10-17 22:00:00'),
(9, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/WyfYJ1508349874oUw43.png', 'uploads/projects/main_images/I3yRJ1508349874CmHrR.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:04:34', '2017-10-18 18:38:29', '2017-10-18 18:38:29', '2017-10-17 22:00:00'),
(10, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/SkLX01508349948YTfhL.png', 'uploads/projects/main_images/4381X1508349948240FA.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:05:48', '2017-10-18 18:38:27', '2017-10-18 18:38:27', '2017-10-17 22:00:00'),
(11, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/qyuaI1508349973BZPCc.png', 'uploads/projects/main_images/s6Q371508349973R547D.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:06:13', '2017-10-18 18:38:24', '2017-10-18 18:38:24', '2017-10-17 22:00:00'),
(12, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/s1oSV1508349984KTDQk.png', 'uploads/projects/main_images/dkqZu1508349984E41Wj.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:06:24', '2017-10-18 18:38:21', '2017-10-18 18:38:21', '2017-10-17 22:00:00'),
(13, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/gPCRp1508349995tQouz.png', 'uploads/projects/main_images/GMh8p15083499953yBXp.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:06:35', '2017-10-18 18:38:19', '2017-10-18 18:38:19', '2017-10-17 22:00:00'),
(14, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/EhQBt1508350013R4yMN.png', 'uploads/projects/main_images/LWbVR1508350013dDkco.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:06:53', '2017-10-18 18:38:15', '2017-10-18 18:38:15', '2017-10-17 22:00:00'),
(15, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/wfPIW15083500537NAuf.png', 'uploads/projects/main_images/YDF2b1508350053PsrOY.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:07:33', '2017-10-18 18:38:11', '2017-10-18 18:38:11', '2017-10-17 22:00:00'),
(16, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/TGXBB1508350064iYkxf.png', 'uploads/projects/main_images/egvAC1508350064oTD17.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:07:44', '2017-10-18 18:38:08', '2017-10-18 18:38:08', '2017-10-17 22:00:00'),
(17, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/sSvw01508350270YJgmz.png', 'uploads/projects/main_images/qQZoZ1508350270GbygT.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:11:10', '2017-10-18 18:38:05', '2017-10-18 18:38:05', '2017-10-17 22:00:00'),
(18, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/HGXae1508350282ay8eN.png', 'uploads/projects/main_images/j7it91508350282F6T0t.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:11:22', '2017-10-18 18:38:02', '2017-10-18 18:38:02', '2017-10-17 22:00:00'),
(19, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/FAJLb1508350289Xx61W.png', 'uploads/projects/main_images/Qm0Bx1508350289IaoUH.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:11:29', '2017-10-18 18:37:59', '2017-10-18 18:37:59', '2017-10-17 22:00:00'),
(20, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/pDEXX1508350298UvPWU.png', 'uploads/projects/main_images/Sn2X11508350298hHUkK.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:11:38', '2017-10-18 18:37:56', '2017-10-18 18:37:56', '2017-10-17 22:00:00'),
(21, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/p3xWq15083503320bU5l.png', 'uploads/projects/main_images/dKRKd1508350332FB6KM.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:12:12', '2017-10-18 18:37:51', '2017-10-18 18:37:51', '2017-10-17 22:00:00'),
(22, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/XAs7F15083503481AqE4.png', 'uploads/projects/main_images/G9dwM1508350348gNXMH.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:12:28', '2017-10-18 18:37:47', '2017-10-18 18:37:47', '2017-10-17 22:00:00'),
(23, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/CaNWH1508350364DpooD.png', 'uploads/projects/main_images/yIbCR1508350364g5Qws.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:12:44', '2017-10-18 18:37:45', '2017-10-18 18:37:45', '2017-10-17 22:00:00'),
(24, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/jJo7w1508350374pqPGv.png', 'uploads/projects/main_images/I2trY15083503744C34u.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:12:54', '2017-10-18 18:37:42', '2017-10-18 18:37:42', '2017-10-17 22:00:00'),
(25, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/RI4c315083503800RIRk.png', 'uploads/projects/main_images/H1VIj1508350380nU1Eb.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:13:00', '2017-10-18 18:37:39', '2017-10-18 18:37:39', '2017-10-17 22:00:00'),
(26, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/zUqIz1508350579sw5cs.png', 'uploads/projects/main_images/gzzPA1508350579IOz3h.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:16:19', '2017-10-18 18:37:37', '2017-10-18 18:37:37', '2017-10-17 22:00:00'),
(27, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/1PZNg1508350625tAnPB.png', 'uploads/projects/main_images/BPyK61508350625bwBp8.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:17:05', '2017-10-18 18:37:33', '2017-10-18 18:37:33', '2017-10-17 22:00:00'),
(28, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/QVh241508350655kbucT.png', 'uploads/projects/main_images/sDvZg1508350655V01SM.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:17:35', '2017-10-18 18:37:30', '2017-10-18 18:37:30', '2017-10-17 22:00:00'),
(29, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/t2END1508350665Tv68K.png', 'uploads/projects/main_images/v3sKp1508350665tMH7P.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:17:45', '2017-10-18 18:37:27', '2017-10-18 18:37:27', '2017-10-17 22:00:00'),
(30, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/lG5sB1508350711f2j3Z.png', 'uploads/projects/main_images/FIH2Q1508350711m0Rk3.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:18:31', '2017-10-18 18:37:25', '2017-10-18 18:37:25', '2017-10-17 22:00:00'),
(31, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/86j4Q1508351433fMkZE.png', 'uploads/projects/main_images/5ihxD1508351433V1Ryf.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:30:33', '2017-10-18 18:37:23', '2017-10-18 18:37:23', '2017-10-17 22:00:00'),
(32, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/0NJm91508351508ke2Dj.png', 'uploads/projects/main_images/bl1Nr1508351508jZxsa.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:31:48', '2017-10-18 18:36:58', '2017-10-18 18:36:58', '2017-10-17 22:00:00'),
(33, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/rfHkc15083515173WpYq.png', 'uploads/projects/main_images/PAf6Z1508351517iuI5S.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:31:57', '2017-10-18 18:36:56', '2017-10-18 18:36:56', '2017-10-17 22:00:00'),
(34, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/5xLrp1508351534ZHADL.png', 'uploads/projects/main_images/5cCbJ1508351534BXT4m.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:32:14', '2017-10-18 18:36:53', '2017-10-18 18:36:53', '2017-10-17 22:00:00'),
(35, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/lQ6511508351618QUd3R.png', 'uploads/projects/main_images/Ui1CZ1508351618wMyAH.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:33:38', '2017-10-18 18:36:50', '2017-10-18 18:36:50', '2017-10-17 22:00:00'),
(36, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/DpPRu1508351655d46Xa.png', 'uploads/projects/main_images/3PbHB1508351655hLCsJ.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:34:15', '2017-10-18 18:36:48', '2017-10-18 18:36:48', '2017-10-17 22:00:00'),
(37, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/u2jVo1508351671WpeCl.png', 'uploads/projects/main_images/1lCV21508351671Jwj1s.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:34:31', '2017-10-18 18:36:46', '2017-10-18 18:36:46', '2017-10-17 22:00:00'),
(38, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/lbHaQ1508351683D87xd.png', 'uploads/projects/main_images/NchEo1508351683EdS2O.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:34:43', '2017-10-18 18:36:44', '2017-10-18 18:36:44', '2017-10-17 22:00:00'),
(39, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/xW3bT1508351706EDkf7.png', 'uploads/projects/main_images/UCdQ41508351706CzDVH.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:35:06', '2017-10-18 18:36:42', '2017-10-18 18:36:42', '2017-10-17 22:00:00'),
(40, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/slQhU1508351727MxdNY.png', 'uploads/projects/main_images/6mGV115083517277YY1R.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:35:27', '2017-10-18 18:36:40', '2017-10-18 18:36:40', '2017-10-17 22:00:00'),
(41, 0, 2, 2, NULL, '', 'uploads/projects/placeholders/fDiEh1508351760AusmT.png', 'uploads/projects/main_images/Xmf6H15083517608bKIg.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:36:00', '2017-10-18 18:36:37', '2017-10-18 18:36:37', '2017-10-17 22:00:00'),
(42, 0, 1, 3, NULL, 't_1', 'uploads/projects/placeholders/Au3pb15083519667r8Yt.png', 'uploads/projects/main_images/orYGn1508351966fg9j7.png', 0, '0.00', 0, 0, NULL, NULL, '2017-10-18 18:39:26', '2017-10-20 06:45:07', '2017-10-20 06:45:07', '2017-10-17 22:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `project_categories`
--

CREATE TABLE `project_categories` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_categories`
--

INSERT INTO `project_categories` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

-- --------------------------------------------------------

--
-- Структура таблицы `project_cat_trans`
--

CREATE TABLE `project_cat_trans` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_cat_trans`
--

INSERT INTO `project_cat_trans` (`id`, `project_category_id`, `title`, `locale`) VALUES
(1, 1, 'Інтернет магазин', 'uk'),
(2, 1, 'Интернет магазин', 'ru'),
(3, 1, 'Internet shop', 'en'),
(6, 2, 'vCard', 'en'),
(7, 3, 'Соціальна мережа', 'uk'),
(8, 3, 'Социальная сеть', 'ru'),
(9, 3, 'Social network', 'en'),
(10, 4, 'Ігровий портал', 'uk'),
(11, 4, 'Игровой портал', 'ru'),
(12, 4, 'Game portal', 'en'),
(13, 5, 'Промо-сайт', 'uk'),
(14, 5, 'Промо-сайт', 'ru'),
(15, 5, 'Promotional website', 'en'),
(16, 6, 'Блог', 'uk'),
(17, 6, 'Блог', 'ru'),
(18, 6, 'Blog', 'en'),
(19, 7, 'Персональний сайт', 'uk'),
(20, 7, 'Персональный сайт', 'ru'),
(21, 7, 'Personal website', 'en'),
(22, 8, 'Корпоративний сайт', 'uk'),
(23, 8, 'Корпоративный сайт', 'ru'),
(24, 8, 'Corporate website', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `project_comments`
--

CREATE TABLE `project_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `project_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_comments`
--

INSERT INTO `project_comments` (`id`, `parent_id`, `confirmed`, `project_id`, `user_id`, `user_ip`, `name`, `email`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 0, 4, 1, '192.168.1.1', NULL, 'sanek.solodovnikov.94@gmail.com', 'Lorem ipsum dolor sit ammet!', '2017-10-22 22:00:00', '2017-10-22 22:00:00', NULL),
(2, 1, 0, 4, 2, '127.0.0.1', NULL, 'email@gmail.com', 'Message', '2017-10-22 22:00:00', '2017-10-23 22:00:00', NULL),
(3, 1, 0, 4, NULL, '111.111.111.111', NULL, 'mail@e.com', 'Test message', '2017-10-08 22:00:00', '2017-10-09 22:00:00', NULL),
(4, NULL, 0, 4, 1, '127.0.0.1', 'Oleksandr Solodovnikov', 'sanek.solodovnikov.94@gmail.com', 'fdsdsf', '2017-11-07 12:42:19', '2017-11-07 12:42:19', NULL),
(5, NULL, 0, 4, 1, '127.0.0.1', 'Олександр Солодовніков', 'sanek.solodovnikov.94@gmail.com', 'тест', '2017-11-07 14:22:59', '2017-11-07 14:22:59', NULL),
(6, NULL, 0, 4, NULL, '127.0.0.1', 'Guest name', 'guest@email.com', 'message', '2017-11-07 14:35:39', '2017-11-07 14:35:39', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `project_developer`
--

CREATE TABLE `project_developer` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `developer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_developer`
--

INSERT INTO `project_developer` (`id`, `project_id`, `developer_id`) VALUES
(5, 2, 2),
(7, 3, 2),
(9, 4, 2),
(10, 1, 2),
(11, 2, 3),
(12, 4, 3),
(13, 5, 1),
(14, 5, 2),
(15, 5, 3),
(16, 6, 1),
(17, 6, 3),
(18, 6, 4),
(19, 7, 2),
(20, 8, 2),
(21, 41, 1),
(22, 42, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `project_screenshots`
--

CREATE TABLE `project_screenshots` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `order_` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_screenshots`
--

INSERT INTO `project_screenshots` (`id`, `project_id`, `order_`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(39, 3, 0, 'uploads/projects/slider_images/3hAHd71506716939gLvov.jpg', '2017-09-29 22:28:59', '2017-09-29 22:28:59', NULL),
(40, 3, 0, 'uploads/projects/slider_images/3o0BBW1506716939JDmWx.jpg', '2017-09-29 22:28:59', '2017-09-29 22:28:59', NULL),
(41, 3, 0, 'uploads/projects/slider_images/3ZhoMo1506716957gfdgc.jpg', '2017-09-29 22:29:17', '2017-09-29 22:29:17', NULL),
(42, 3, 0, 'uploads/projects/slider_images/3JpgTf1506716968IDf0Z.jpg', '2017-09-29 22:29:28', '2017-09-29 22:29:28', NULL),
(43, 4, 0, 'uploads/projects/slider_images/4glawR1506717184j5eOU.jpg', '2017-09-29 22:33:04', '2017-09-29 22:33:04', NULL),
(44, 4, 0, 'uploads/projects/slider_images/4AUn0l15067171843WrZH.jpg', '2017-09-29 22:33:04', '2017-09-29 22:33:04', NULL),
(45, 4, 0, 'uploads/projects/slider_images/4uu25Q1506717204mw0hX.jpg', '2017-09-29 22:33:24', '2017-09-29 22:33:24', NULL),
(46, 4, 0, 'uploads/projects/slider_images/4kcLwO1506717211ku5hK.jpg', '2017-09-29 22:33:31', '2017-09-29 22:33:31', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `project_stage`
--

CREATE TABLE `project_stage` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_stage`
--

INSERT INTO `project_stage` (`id`, `project_id`, `stage_id`) VALUES
(3, 2, 5),
(4, 2, 7),
(8, 1, 1),
(9, 1, 3),
(13, 3, 3),
(14, 4, 1),
(15, 4, 2),
(16, 4, 3),
(17, 1, 2),
(18, 2, 1),
(19, 2, 2),
(20, 2, 3),
(21, 2, 4),
(22, 2, 6),
(23, 3, 1),
(24, 3, 2),
(25, 4, 4),
(26, 4, 5),
(27, 4, 6),
(28, 4, 7),
(29, 5, 1),
(30, 5, 2),
(31, 5, 4),
(32, 6, 1),
(33, 6, 2),
(34, 6, 3),
(35, 7, 1),
(36, 7, 2),
(37, 7, 3),
(38, 8, 2),
(39, 8, 3),
(40, 41, 1),
(41, 42, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `project_stages`
--

CREATE TABLE `project_stages` (
  `id` int(10) UNSIGNED NOT NULL,
  `curator_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_stages`
--

INSERT INTO `project_stages` (`id`, `curator_id`, `order`) VALUES
(1, 1, 0),
(2, 1, 1),
(3, 1, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `project_stages_trans`
--

CREATE TABLE `project_stages_trans` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_stage_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_stages_trans`
--

INSERT INTO `project_stages_trans` (`id`, `project_stage_id`, `title`, `description`, `locale`) VALUES
(1, 1, 'Аналіз проекту', 'Розмова з клієнтом, аналіз потреб та конкурентів, визначення фінансової доцільності розробки сайту.', 'uk'),
(2, 1, 'Анализ проекта', 'Разговор с клиентом, анализ потребностей и конкурентов, определение финансовой целесообразности разработки сайта.', 'ru'),
(3, 1, 'Project analysis', 'Conversation with client, decomposing of needs and competitors, determining the financial feasibility of developing.', 'en'),
(4, 2, 'Прототипування', 'З клієнтом працюють дизайнери щоб дізнатись що саме бажає клієнт, як він бачить майбутній сайт, разом створюють прототип дизайну.', 'uk'),
(5, 2, 'Прототипирование', 'С клиентом работают дизайнеры чтобы узнать что именно желает клиент, как он видит будущий сайт, вместе создают прототип дизайна.', 'ru'),
(6, 2, 'Prototyping', 'Designers work with client to find out how client imagines his future site. Client gets advices and coordinates website prototyping.', 'en'),
(7, 3, 'Design development', 'Designers create model of the site making it corresponding to client\'s wishes.', 'en'),
(8, 3, 'Разработка дизайна', 'Дизайнеры разрабатывают макет, подстраивая его под нужды и предпочтения клиента, время от времени показывая результаты работы.', 'ru'),
(9, 3, 'Розробка дизайну', 'Дизайнери розробляють макет, підлаштовуючи його під потреби і вподобання клієнта, час від часу показуючи результати роботи.', 'uk'),
(10, 4, 'Template development', 'Front-end developers create pages templates using designers\' models', 'en'),
(11, 4, 'Разработка шаблона', 'Front-end разработчики разрабатывают шаблоны страниц, используя макеты от дизайнеров.', 'ru'),
(12, 4, 'Розробка шаблону', 'Front-end розробники розробляють шаблони сторінок, використовуючи макети від дизайнерів.', 'uk'),
(13, 5, 'Development of functionality', 'Development and implementation functionality of pages.', 'en'),
(14, 5, 'Разработка функциональности', 'Разработка и реализация ранее оговорённого функционала страниц.', 'ru'),
(15, 5, 'Розробка функціональності', 'Розробка і реалізація попередньо обумовленого функціоналу сторінок.', 'uk'),
(16, 6, 'SEO optimization', 'SEO optimization for better search results and promoting.', 'en'),
(17, 6, 'SEO оптимизация', 'Проведение SEO-оптимизации для улучшения поисковой выдачи и продвижение сайта в поисковых системах.', 'ru'),
(18, 6, 'SEO оптимізація', 'Проведення SEO-оптимізації для покращення пошукової видачі та просування сайту в пошукових системах.', 'uk'),
(19, 7, 'Site support', 'Supporting site, including upgrading, fixing bugs and resolving your questions.', 'en'),
(20, 7, 'Поддержка сайта', 'Поддержка сайта, включая доработки, исправления ошибок в работе, решение Ваших вопросов и т.д.', 'ru'),
(21, 7, 'Підтримка сайту', 'Підтримка сайту, включаючи допрацювання, виправлення помилок в роботі, вирішення Ваших питань і т.д.', 'uk');

-- --------------------------------------------------------

--
-- Структура таблицы `project_translations`
--

CREATE TABLE `project_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `project_translations`
--

INSERT INTO `project_translations` (`id`, `project_id`, `title`, `description`, `short_description`, `locale`) VALUES
(6, 3, 'Photographer Portfolio', 'dfgdf', 'fdgdfg', 'en'),
(7, 4, 'Valentus Project', 'впвап', 'вапвапвап', 'en'),
(8, 4, 'Valentus Project', 'Ми повністю задовільнили клієнта, запустивши новий веб-сайт для просування продукції компанії. Користувачі можуть без проблем знайти всю необхідну інформацію про послуги, переглянути та замовити потрібні товари. Таким чином, всі задачі, поставлені замовником, були успішно вирішені.', 'Valentus — маркетингова компанія, яка спеціалізується на харчових добавках. Клієнт звернувся до нас з проханням створити сучасний веб-сайт з каталогом продукції, зокрема кави, для схуднення.', 'uk'),
(9, 3, 'Photographer Portfolio', 'В результаті був створений дизайн на основі сітки Bootstrap, який відповідає усім вимогам замовника по кольористиці та функціоналу веб-сайту. Відштовхуючись від ідеї, користувачі можуть створювати особисті професійні портфоліо, або ж знайти фотографа, який підійде індивідуально під потреби клієнта.', 'Ідея полягала в розробці майданчику для професійних фотографів. Тут кожен зможе показати та розказати про свої послуги, тим самим зацікавити потенційних клієнтів. Замовник хотів \"чистий\" і гарно структурований дизайн в мінімальному стилі.', 'uk'),
(10, 4, 'Valentus Project', 'Мы полностью удовлетворили клиента, запустив новый веб-сайт для продвижения продукции компании. Пользователи могут без проблем найти всю необходимую информацию про услуги, просмотреть и заказать нужные товары. Таким образом, все задачи, поставленные заказчиком, были успешно решены.', 'Valentus — маркетинговая компания, которая специализируется на пищевых добавках. Клиент обратился к нам с просьбой создать современный веб-сайт с каталогом продукции, в частности кофе, для похудения.', 'ru'),
(11, 3, 'Photographer Portfolio', 'В результате был создан дизайн на основе сетки Bootstrap, который отвечает всем требованиям заказчика по цветовой гамме и функционалу веб-сайта. Отталкиваясь от идеи, с помощью сайта пользователи могут создавать собственные профессиональные портфолио, или же найти фотографа, который подойдет индивидуально под требования клиента.', 'Идея состояла в разработке площадки для профессиональных фотографов. Здесь каждый сможет показать и рассказать о своих услугах, тем самым заинтересовать потенциальных клиентов. Заказчик хотел \"чистый\" и хорошо структурированный дизайн в минимальном стиле.', 'ru'),
(12, 5, 'Тестова назва проекту', 'Довгий як мій члєн опис', 'Короткий опис', 'uk'),
(13, 6, 'ngvdksdkg gdkj', 'dsfsdfdsf', 'dsfdsfdsfdsf', 'en'),
(14, 7, 'sfdsfdsf', 'sdgdsgdsg', 'sgdsgdsg', 'ru'),
(15, 8, 'fdgdfg dfhdfh', 'fdgfdgfdg', 'dffdgfdg', 'ru'),
(16, 9, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(17, 10, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(18, 11, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(19, 12, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(20, 13, 'test', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(21, 14, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(22, 15, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(23, 16, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(24, 17, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(25, 18, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(26, 19, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(27, 20, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(28, 21, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(29, 22, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(30, 23, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(31, 24, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(32, 25, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(33, 26, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(34, 27, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(35, 28, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(36, 29, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(37, 30, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(38, 31, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(39, 32, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(40, 33, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(41, 34, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(42, 34, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'en'),
(43, 35, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(44, 36, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(45, 37, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(46, 37, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'en'),
(47, 38, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(48, 39, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(49, 40, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(50, 40, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'en'),
(51, 41, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'ru'),
(52, 41, 'sdfghj', 'frghjrfdg', 'rfghjrfgh', 'en'),
(53, 42, 'Тестовый проект', 'Лоооло', 'Ололо', 'ru'),
(54, 42, 'Тестовый проект', 'Лоооло', 'Ололо', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'owner', '2017-04-30 22:00:00', '2017-04-30 22:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `role_translations`
--

CREATE TABLE `role_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_translations`
--

INSERT INTO `role_translations` (`id`, `role_id`, `display_name`, `description`, `locale`) VALUES
(1, 1, 'Владелец', 'Владелец сайта', 'ru'),
(2, 1, 'Власник', 'Власник сайту', 'uk'),
(3, 1, 'Owner', 'Site owner', 'en');

-- --------------------------------------------------------

--
-- Структура таблицы `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `same_projects`
--

CREATE TABLE `same_projects` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `same_project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `same_projects`
--

INSERT INTO `same_projects` (`id`, `project_id`, `same_project_id`) VALUES
(1, 3, 4),
(2, 3, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `developer_id` int(11) NOT NULL,
  `current_stage_id` int(11) NOT NULL,
  `total_time` int(11) NOT NULL,
  `total_price` decimal(6,2) NOT NULL,
  `notify_client` tinyint(1) DEFAULT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL,
  `status_code` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `closed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ticket_comments`
--

CREATE TABLE `ticket_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ticket_steps`
--

CREATE TABLE `ticket_steps` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `developer_id` int(11) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(3,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `is_developer` tinyint(1) NOT NULL DEFAULT '0',
  `last_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '192.168.1.1',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `language_code` char(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `online`, `active`, `is_developer`, `last_ip`, `last_login`, `language_code`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sanek', 'sanek.solodovnikov.94@gmail.com', 0, 1, 1, '127.0.0.1', '2017-11-07 14:35:17', 'uk', '$2y$10$am4/RI1w0Pfj0xr2julBoOF.p2eprmQkCK4zfR7eGafIvRk/W967q', 'NGXr3PjS2Wh3ilXnwwDAi58uBpPphBM3Y3FKE6f3Yk3Rv3eS6AJhEyUIyiLQ', '2017-05-07 12:13:40', '2017-11-07 13:05:48'),
(2, 'mod', 'victor58@ukr.net', 0, 1, 1, '46.171.148.141', '2017-10-07 11:58:11', 'ru', '$2y$10$am4/RI1w0Pfj0xr2julBoOF.p2eprmQkCK4zfR7eGafIvRk/W967q', 'sQvYYO6KEuXyuTk1f7fkwDcru8FXnu7bbky8hjOoMGfxbCRxKFkE1qvF3WLV', '2017-05-08 11:37:51', '2017-10-07 13:58:11'),
(3, 'falcornus', 'transcend0808@gmail.com', 0, 1, 1, '46.171.148.141', '2017-10-11 13:15:46', 'en', '$2y$10$am4/RI1w0Pfj0xr2julBoOF.p2eprmQkCK4zfR7eGafIvRk/W967q', 'pTUgw0h2lC6NaaRsqjN0eP2GyOrwBngDN9rSXO0uLJzd6CoGQe5vFozIIl5r', '2017-07-13 15:49:29', '2017-10-09 14:59:55'),
(4, 'ananas33', 'porsche839@gmail.com', 0, 1, 1, '178.54.99.103', '2017-10-09 16:28:06', 'uk', '$2y$10$am4/RI1w0Pfj0xr2julBoOF.p2eprmQkCK4zfR7eGafIvRk/W967q', 'Th8BD6c7Wi7Y0Xa28E82jVul6SksXIas2oDrtJfBHwGXmgnDEWL00SHyMaZR', '2017-07-18 11:21:43', '2017-10-09 16:28:06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `developer_educations`
--
ALTER TABLE `developer_educations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `developer_experiences`
--
ALTER TABLE `developer_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `developer_languages`
--
ALTER TABLE `developer_languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `developer_skills`
--
ALTER TABLE `developer_skills`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `developer_skill_translations`
--
ALTER TABLE `developer_skill_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `developer_skill_translations_developer_skill_id_locale_unique` (`developer_skill_id`,`locale`),
  ADD KEY `developer_skill_translations_locale_index` (`locale`);

--
-- Индексы таблицы `developer_translations`
--
ALTER TABLE `developer_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `developer_translations_developer_id_locale_unique` (`developer_id`,`locale`),
  ADD KEY `developer_translations_locale_index` (`locale`);

--
-- Индексы таблицы `dev_edu_trans`
--
ALTER TABLE `dev_edu_trans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dev_edu_trans_developer_education_id_locale_unique` (`developer_education_id`,`locale`),
  ADD KEY `dev_edu_trans_locale_index` (`locale`);

--
-- Индексы таблицы `dev_exp_trans`
--
ALTER TABLE `dev_exp_trans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dev_exp_trans_developer_experience_id_locale_unique` (`developer_experience_id`,`locale`),
  ADD KEY `dev_exp_trans_locale_index` (`locale`);

--
-- Индексы таблицы `dev_lang_trans`
--
ALTER TABLE `dev_lang_trans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dev_lang_trans_developer_language_id_locale_unique` (`developer_language_id`,`locale`),
  ADD KEY `dev_lang_trans_locale_index` (`locale`);

--
-- Индексы таблицы `email_requests`
--
ALTER TABLE `email_requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Индексы таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `permission_translations`
--
ALTER TABLE `permission_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_translations_permission_id_locale_unique` (`permission_id`,`locale`),
  ADD KEY `permission_translations_locale_index` (`locale`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile_emails`
--
ALTER TABLE `profile_emails`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile_phones`
--
ALTER TABLE `profile_phones`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile_socials`
--
ALTER TABLE `profile_socials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile_translations`
--
ALTER TABLE `profile_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profile_translations_profile_id_locale_unique` (`profile_id`,`locale`),
  ADD KEY `profile_translations_locale_index` (`locale`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_cat_trans`
--
ALTER TABLE `project_cat_trans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_cat_trans_project_category_id_locale_unique` (`project_category_id`,`locale`),
  ADD KEY `project_cat_trans_locale_index` (`locale`);

--
-- Индексы таблицы `project_comments`
--
ALTER TABLE `project_comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_developer`
--
ALTER TABLE `project_developer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_screenshots`
--
ALTER TABLE `project_screenshots`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_stage`
--
ALTER TABLE `project_stage`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_stages`
--
ALTER TABLE `project_stages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_stages_trans`
--
ALTER TABLE `project_stages_trans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_stages_trans_project_stage_id_locale_unique` (`project_stage_id`,`locale`),
  ADD KEY `project_stages_trans_locale_index` (`locale`);

--
-- Индексы таблицы `project_translations`
--
ALTER TABLE `project_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_translations_project_id_locale_unique` (`project_id`,`locale`),
  ADD KEY `project_translations_locale_index` (`locale`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Индексы таблицы `role_translations`
--
ALTER TABLE `role_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_translations_role_id_locale_unique` (`role_id`,`locale`),
  ADD KEY `role_translations_locale_index` (`locale`);

--
-- Индексы таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `same_projects`
--
ALTER TABLE `same_projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticket_steps`
--
ALTER TABLE `ticket_steps`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `developer_educations`
--
ALTER TABLE `developer_educations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `developer_experiences`
--
ALTER TABLE `developer_experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `developer_languages`
--
ALTER TABLE `developer_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `developer_skills`
--
ALTER TABLE `developer_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `developer_skill_translations`
--
ALTER TABLE `developer_skill_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `developer_translations`
--
ALTER TABLE `developer_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `dev_edu_trans`
--
ALTER TABLE `dev_edu_trans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `dev_exp_trans`
--
ALTER TABLE `dev_exp_trans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `dev_lang_trans`
--
ALTER TABLE `dev_lang_trans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `email_requests`
--
ALTER TABLE `email_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `permission_translations`
--
ALTER TABLE `permission_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `profile_emails`
--
ALTER TABLE `profile_emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `profile_phones`
--
ALTER TABLE `profile_phones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `profile_socials`
--
ALTER TABLE `profile_socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `profile_translations`
--
ALTER TABLE `profile_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT для таблицы `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `project_cat_trans`
--
ALTER TABLE `project_cat_trans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `project_comments`
--
ALTER TABLE `project_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `project_developer`
--
ALTER TABLE `project_developer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `project_screenshots`
--
ALTER TABLE `project_screenshots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблицы `project_stage`
--
ALTER TABLE `project_stage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT для таблицы `project_stages`
--
ALTER TABLE `project_stages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `project_stages_trans`
--
ALTER TABLE `project_stages_trans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `project_translations`
--
ALTER TABLE `project_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `role_translations`
--
ALTER TABLE `role_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `same_projects`
--
ALTER TABLE `same_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ticket_comments`
--
ALTER TABLE `ticket_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ticket_steps`
--
ALTER TABLE `ticket_steps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `developer_skill_translations`
--
ALTER TABLE `developer_skill_translations`
  ADD CONSTRAINT `developer_skill_translations_developer_skill_id_foreign` FOREIGN KEY (`developer_skill_id`) REFERENCES `developer_skills` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `developer_translations`
--
ALTER TABLE `developer_translations`
  ADD CONSTRAINT `developer_translations_developer_id_foreign` FOREIGN KEY (`developer_id`) REFERENCES `developers` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `dev_edu_trans`
--
ALTER TABLE `dev_edu_trans`
  ADD CONSTRAINT `dev_edu_trans_developer_education_id_foreign` FOREIGN KEY (`developer_education_id`) REFERENCES `developer_educations` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `dev_exp_trans`
--
ALTER TABLE `dev_exp_trans`
  ADD CONSTRAINT `dev_exp_trans_developer_experience_id_foreign` FOREIGN KEY (`developer_experience_id`) REFERENCES `developer_experiences` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `dev_lang_trans`
--
ALTER TABLE `dev_lang_trans`
  ADD CONSTRAINT `dev_lang_trans_developer_language_id_foreign` FOREIGN KEY (`developer_language_id`) REFERENCES `developer_languages` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `permission_translations`
--
ALTER TABLE `permission_translations`
  ADD CONSTRAINT `permission_translations_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profile_translations`
--
ALTER TABLE `profile_translations`
  ADD CONSTRAINT `profile_translations_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `project_cat_trans`
--
ALTER TABLE `project_cat_trans`
  ADD CONSTRAINT `project_cat_trans_project_category_id_foreign` FOREIGN KEY (`project_category_id`) REFERENCES `project_categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `project_stages_trans`
--
ALTER TABLE `project_stages_trans`
  ADD CONSTRAINT `project_stages_trans_project_stage_id_foreign` FOREIGN KEY (`project_stage_id`) REFERENCES `project_stages` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `project_translations`
--
ALTER TABLE `project_translations`
  ADD CONSTRAINT `project_translations_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_translations`
--
ALTER TABLE `role_translations`
  ADD CONSTRAINT `role_translations_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
