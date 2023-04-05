-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 12:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(3) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'PHP'),
(2, 'JavaScripts'),
(3, 'Java');

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE `client_info` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`id`, `name`, `email`, `body`, `date`) VALUES
(1, 'tobi', 'g3osunleye@outlook.com', 'I need financial services please', '2023-02-21 12:00:19'),
(2, 'Olutobilola Osunleye', 'g3osunleye@outlook.com', 'Contact me. 0705943458', '2023-02-21 12:00:52'),
(13, 'Tobi', 'losunleye@gmail.com', 'new', '2023-03-30 18:36:43'),
(14, 'Olutobilola Osunleye', 'g3osunleye@outlook.com', 'sdfghjk', '2023-03-30 18:37:04'),
(16, 'Olutobilola Osunleye', 'g3osunleye@outlook.com', 'rty', '2023-03-30 18:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `image`, `name`, `bio`) VALUES
(1, 'https://randomuser.me/api/portraits/men/11.jpg', 'John Doe', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n                  Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.'),
(2, 'https://randomuser.me/api/portraits/women/11.jpg', 'Jane Doe', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.'),
(3, 'https://randomuser.me/api/portraits/men/12.jpg', 'Steve Smith', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.'),
(4, 'https://randomuser.me/api/portraits/women/12.jpg', 'Sara Smith', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n                  Assumenda accusamus nobis sed cupiditate iusto? Quibusdam.');

-- --------------------------------------------------------

--
-- Table structure for table `learning_modes`
--

CREATE TABLE `learning_modes` (
  `id` int(11) NOT NULL DEFAULT 0,
  `icon` text NOT NULL,
  `mode` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learning_modes`
--

INSERT INTO `learning_modes` (`id`, `icon`, `mode`, `description`) VALUES
(1, 'bi bi-laptop', 'Virtual', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit.\r\n                  Iure, quas quidem possimus dolorum esse eligendi?'),
(2, 'bi bi-person-square', 'Hybrid', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit.\r\n                  Iure, quas quidem possimus dolorum esse eligendi?'),
(3, 'bi bi-people', 'In Person', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit.\r\n                  Iure, quas quidem possimus dolorum esse eligendi?');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL DEFAULT current_timestamp(),
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'CMS blog', 'Tobi', '2023-04-26', '', 'Interesting course', 'course, cms, blog, Tobi', 0, 'draft'),
(2, 2, 'JavaScript Course', 'Lexy', '2023-04-02', '', 'This course is an amazing course with over 200 successful students who have benefited from it.', 'javascript, course, Lexy, amazing', 0, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `name`, `description`) VALUES
(1, 'bi bi-filetype-js', 'Frontend Development', 'Creating meaningful and transformative steps toward success'),
(2, 'bi bi-filetype-php', 'Backend Development', 'Creating meaningful and transformative steps toward success'),
(3, 'bi bi-stack', 'Fullstack Development', 'Creating meaningful and transformative steps toward success');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client_info`
--
ALTER TABLE `client_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `client_info`
--
ALTER TABLE `client_info`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
