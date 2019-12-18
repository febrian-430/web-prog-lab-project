-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 03:14 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poster_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `poster_id`, `movie_id`, `content`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'good shit man', '2019-12-18 04:49:49', '2019-12-18 04:49:49'),
(3, 1, 3, 'lit', '2019-12-18 06:17:05', '2019-12-18 06:17:05'),
(4, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:18:53', '2019-12-18 06:18:53'),
(5, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:18:56', '2019-12-18 06:18:56'),
(6, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:00', '2019-12-18 06:19:00'),
(7, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:02', '2019-12-18 06:19:02'),
(8, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:04', '2019-12-18 06:19:04'),
(9, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:07', '2019-12-18 06:19:07'),
(10, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:09', '2019-12-18 06:19:09'),
(11, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:11', '2019-12-18 06:19:11'),
(12, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:13', '2019-12-18 06:19:13'),
(13, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:17', '2019-12-18 06:19:17'),
(14, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:19', '2019-12-18 06:19:19'),
(15, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:21', '2019-12-18 06:19:21'),
(16, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:25', '2019-12-18 06:19:25'),
(17, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:27', '2019-12-18 06:19:27'),
(18, 1, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus recusandae nulla odit necessitatibus. Hic, ipsum neque. Quibusdam quia aliquam pariatur a voluptas ratione eius mollitia, optio eveniet fugiat dolores?', '2019-12-18 06:19:36', '2019-12-18 06:19:36'),
(19, 2, 3, 'dude stfu', '2019-12-18 06:22:17', '2019-12-18 06:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Action', NULL, NULL),
(2, 'Thriller', NULL, NULL),
(3, 'Sci-fi', NULL, NULL),
(4, 'Drama', NULL, NULL),
(5, 'Horror', NULL, NULL),
(6, 'Documentary', '2019-12-14 01:13:49', '2019-12-14 01:13:49'),
(7, 'Fantasy', '2019-12-17 09:43:59', '2019-12-17 09:43:59'),
(8, 'Dark Comedy', '2019-12-18 05:35:22', '2019-12-18 05:35:22'),
(9, 'Comedy', '2019-12-18 05:36:04', '2019-12-18 05:36:04'),
(10, 'Crime', '2019-12-18 05:42:27', '2019-12-18 05:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `password`, `gender`, `address`, `birthday`, `profile_picture`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin', '$2y$10$JX955JYnVmzrpHgrgW2.Eushsxv0ZfF4VTVixVAjYfmL3yMGBcpP.', 'Male', 'OH BO HOO', '1993-01-25', 'd1c988ac-7ca6-3d83-ba2c-89081174ce15.png', 'Administrator', NULL, '2019-12-13 23:46:21', '2019-12-18 05:08:35'),
(2, 'brah', 'brah@brah', '$2y$10$2nhPziYU0Eyo11aZZeB4Ke463QbISTFQ0/w7kG5/Db074yPbZB5BS', 'Male', 'GROVE STREET', '2007-01-31', '5ab8f463-01c3-3506-8306-ade5c395aacb.png', 'Member', 'gA9OlyQLSbdwILo9CjVnWWUSJNVfUPf0kudxJ9qQP5LfjlO0eweYHSvOlBoh', '2019-12-13 23:46:21', '2019-12-18 06:15:44'),
(3, 'gitgud', 'git@gud', '$2y$10$l1FDRAmV8l9Tgdy044hv4eFhxM4u8Tib2GYqmuYZpU4.yKDUrufxi', 'Male', 'gitgudo', '1987-01-12', '8a1405ab-4846-3536-a540-d7b691dddc9b.jpg', 'Member', NULL, '2019-12-14 01:00:50', '2019-12-14 01:00:50'),
(4, 'Aldous Huxley', 'huxley@aldous.com', '$2y$10$kpTT74P5MzhHSmoUjdt6Eu3FztzfGqYgI9qqqYY6dasWfA8HmB5Y.', 'Male', 'Street of the world of braves', '2019-12-10', 'bc35af77-ee6f-3304-ad82-aa013ffd146a.jpg', 'Member', NULL, '2019-12-17 08:38:44', '2019-12-18 05:14:03'),
(5, 'Roger Waters', 'waters@floyd.com', '$2y$10$F7hTKUToQ93GyVKzVm6SKeWpa0Q/02cQyd3Pyf9iSYfrem.dyv7LK', 'Male', 'brah please', '1943-09-06', '7e064433-1ed6-3513-85f7-553f4183958a.jpg', 'Member', NULL, '2019-12-17 09:35:13', '2019-12-17 09:35:13'),
(6, 'David Gilmour', 'gilmour@floyd.com', '$2y$10$fXGlVHSBTZIOLDZQQg3oYuDpc0wSEWswKWpN4DWKZulFtDiEnmsyq', 'Male', 'No.', '1999-01-01', 'b71ae6a8-de86-3eea-8c51-f2131cd30daa.jpg', 'Member', NULL, '2019-12-18 05:15:57', '2019-12-18 05:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `receiver_id`, `sender_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'sup dude', '2019-12-14 00:27:06', '2019-12-14 00:27:06'),
(2, 2, 1, 'sup doohd', '2019-12-14 00:29:39', '2019-12-14 00:29:39'),
(3, 1, 2, 'NM WBVU', '2019-12-14 00:30:02', '2019-12-14 00:30:02'),
(4, 1, 2, 'kek', '2019-12-14 00:30:43', '2019-12-14 00:30:43'),
(5, 4, 1, 'Hello', '2019-12-17 10:56:55', '2019-12-17 10:56:55'),
(6, 2, 1, 'Sup dude?', '2019-12-17 11:00:34', '2019-12-17 11:00:34'),
(7, 2, 1, 'Cool story bro', '2019-12-17 11:15:26', '2019-12-17 11:15:26'),
(9, 1, 2, 'lorem', '2019-12-18 06:38:01', '2019-12-18 06:38:01'),
(10, 1, 2, 'lorem', '2019-12-18 06:38:02', '2019-12-18 06:38:02'),
(11, 1, 2, 'lorem', '2019-12-18 06:38:03', '2019-12-18 06:38:03'),
(12, 1, 2, 'lorem', '2019-12-18 06:38:04', '2019-12-18 06:38:04'),
(13, 1, 2, 'lorem', '2019-12-18 06:38:06', '2019-12-18 06:38:06'),
(14, 1, 2, 'lorem', '2019-12-18 06:38:07', '2019-12-18 06:38:07'),
(15, 1, 2, 'lorem', '2019-12-18 06:38:08', '2019-12-18 06:38:08'),
(16, 1, 2, 'lorem', '2019-12-18 06:38:10', '2019-12-18 06:38:10'),
(17, 1, 2, 'lorem', '2019-12-18 06:38:11', '2019-12-18 06:38:11'),
(18, 1, 2, 'lorem', '2019-12-18 06:38:12', '2019-12-18 06:38:12'),
(19, 1, 2, 'lorem', '2019-12-18 06:38:14', '2019-12-18 06:38:14'),
(20, 1, 2, 'lorem', '2019-12-18 06:38:15', '2019-12-18 06:38:15'),
(21, 1, 2, 'lorem', '2019-12-18 06:38:16', '2019-12-18 06:38:16'),
(22, 1, 2, 'lorem', '2019-12-18 06:38:17', '2019-12-18 06:38:17'),
(23, 1, 2, 'lorem', '2019-12-18 06:38:20', '2019-12-18 06:38:20'),
(24, 1, 2, 'CANNOT SEE UR INBOX? HAHA TOO BAD SO SAD', '2019-12-18 06:54:08', '2019-12-18 06:54:08'),
(25, 1, 2, 'CANNOT SEE UR INBOX? HAHA TOO BAD SO SAD', '2019-12-18 06:54:08', '2019-12-18 06:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(37, '2019_11_19_073820_create_members_table', 1),
(38, '2019_11_19_074122_create_movies_table', 1),
(39, '2019_11_19_074218_create_messages_table', 1),
(40, '2019_11_19_074250_create_genres_table', 1),
(41, '2019_11_19_074304_create_comments_table', 1),
(42, '2019_11_20_084813_create_saved_movies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(8,2) NOT NULL,
  `movie_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `poster_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `rating`, `movie_image`, `genre_id`, `poster_id`, `created_at`, `updated_at`) VALUES
(1, 'Joker', 'Forever alone in a crowd, failed comedian Arthur Fleck seeks connection as he walks the streets of Gotham City', 8.70, '151d5a2f-0a1d-3028-af43-6ef92a653da8.jpg', 2, 1, '2019-12-13 23:46:21', '2019-12-18 06:09:53'),
(2, 'The Dark Knight', 'After Gordon, Dent and Batman begin an assault on Gotham\'s organised crime, the mobs hire the Joker, a psychopathic criminal mastermind, who wants to bring all the heroes down to his level.', 9.00, '6a66a4e7-e01e-3622-ad11-93f2a533cdb2.jpg', 2, 1, '2019-12-13 23:46:21', '2019-12-18 05:52:44'),
(3, 'Shutter Island', 'The implausible escape of a brilliant murderess brings U.S. Marshal Teddy Daniels (Leonardo DiCaprio) and his new partner (Mark Ruffalo) to Ashecliffe Hospital, a fortress-like insane asylum located on a remote, windswept island', 8.10, '2f305795-d0ed-3086-9fe6-24b50bf0da1a.jpg', 2, 1, '2019-12-14 01:08:13', '2019-12-14 01:08:13'),
(5, 'Inglourious Basterds', 'A few Jewish soldiers are on an undercover mission to bring down the Nazi government and put an end to the war. Meanwhile, a woman wants to avenge the death of her family from a German officer.', 8.30, '183be474-9618-369b-92c6-338d74768bce.jpg', 1, 1, '2019-12-14 01:34:47', '2019-12-14 01:34:47'),
(6, 'The Green Mile', 'Paul Edgecomb, the head guard of a prison, meets an inmate, John Coffey, a black man who is accused of murdering two girls. His life changes drastically when he discovers that John has a special gift.', 8.60, 'ae2f3845-96bc-338e-bde0-e63487629792.jpg', 4, 1, '2019-12-17 09:05:37', '2019-12-18 06:16:26'),
(7, 'The Boys', 'A group of vigilantes set out to take down corrupt superheroes who abuse their superpowers.', 8.80, 'df853300-1364-3498-a751-fd797a5af351.jpg', 8, 1, '2019-12-18 05:37:00', '2019-12-18 05:37:00'),
(8, 'Zodiac', 'In the late 1960s/early 1970s, a San Francisco cartoonist becomes an amateur detective obsessed with tracking down the Zodiac Killer, an unidentified individual who terrorizes Northern California with a killing spree.', 7.70, 'c3d6dcc8-6c69-3ee6-95b9-601ee6126c46.jpg', 10, 1, '2019-12-18 05:46:13', '2019-12-18 05:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `saved_movies`
--

CREATE TABLE `saved_movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_movies`
--

INSERT INTO `saved_movies` (`id`, `member_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(3, 3, 2, NULL, NULL),
(4, 3, 3, NULL, NULL),
(11, 5, 3, NULL, NULL),
(22, 2, 5, NULL, NULL),
(24, 2, 1, NULL, NULL),
(25, 2, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_movies`
--
ALTER TABLE `saved_movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `saved_movies`
--
ALTER TABLE `saved_movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
