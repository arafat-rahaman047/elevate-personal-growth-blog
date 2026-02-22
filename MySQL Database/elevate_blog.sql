-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2026 at 06:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elevate_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$Iyn/RbjkCJy1hOw9qcsKveQw7Gx5TiUlZWme3ZR9HUJJ1WPVYY8ZO');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Mindset'),
(2, 'Productivity'),
(3, 'Habits'),
(4, 'Goal Setting'),
(5, 'Motivation');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `category_id`, `created_at`) VALUES
(1, '🌱 The Power of a Growth Mindset', 'In life, the difference between those who succeed and those who stay stuck often comes down to one powerful concept: mindset.\r\n\r\nA growth mindset is the belief that your abilities, intelligence, and skills can be developed through effort, learning, and persistence. Instead of saying, “I can’t do this,” people with a growth mindset say, “I can’t do this yet.”\r\nFailure is not the opposite of success — it is part of the journey. Every mistake teaches a lesson. Every challenge builds resilience. When you view problems as opportunities to grow, you unlock your true potential.\r\n\r\nTo develop a growth mindset:\r\n\r\n1. Embrace challenges instead of avoiding them.\r\n2. Learn from criticism instead of fearing it.\r\n3. Celebrate effort, not just results.\r\n4. Replace negative self-talk with constructive thoughts.\r\n\r\nRemember, success is not about being perfect. It is about improving 1% every single day.', NULL, 1, '2026-02-22 14:37:10'),
(3, '🔁 Small Daily Habits That Change Your Life', 'Big success doesn’t come from big actions. It comes from small daily habits repeated consistently over time.\r\n\r\nWaking up 30 minutes earlier. Reading 10 pages a day. Drinking more water. Writing down your goals. These small actions may seem insignificant, but over months and years, they compound into massive results.\r\nHabits shape your identity. If you exercise daily, you become a healthy person. If you study daily, you become knowledgeable. Your habits define who you are becoming.\r\n\r\nHow to build better habits:\r\n\r\n1. Start small.\r\n2. Be consistent.\r\n3. Track your progress.\r\n4. Focus on long-term growth.\r\n\r\nDiscipline is choosing what you want most over what you want now.', NULL, 3, '2026-02-22 16:32:16'),
(4, '🎯 How to Set Goals and Actually Achieve Them', 'Setting goals is easy. Achieving them is the real challenge.\r\nMany people fail because their goals are vague. “I want to be successful” is not a goal. “I will study 2 hours daily for the next 90 days” is a goal.\r\n\r\nUse the SMART method:\r\n\r\n1. Specific\r\n2. Measurable\r\n3. Achievable\r\n4. Relevant\r\n5. Time-bound\r\n6. Break big goals into smaller tasks. Focus on progress, not perfection.\r\n\r\nAnd most importantly — take action daily. Motivation fades, but discipline keeps you moving forward.\r\nDream big. Start small. Act now.', NULL, 4, '2026-02-22 16:34:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
