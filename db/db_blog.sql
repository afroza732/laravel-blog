-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 10:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `created_at`, `updated_at`) VALUES
(1, 'afroza', 'afroza@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 'This mobile is very nice', 1, NULL, NULL),
(2, 'Dress', 'This dress are needed at 11 am', 0, NULL, NULL),
(3, 'news', 'This news will started at 10 am', 1, NULL, NULL),
(4, 'freze', 'This news will started at 10 am', 0, NULL, NULL),
(8, 'বন্ধুসভা সংবাদ', 'গোপালগঞ্জ বন্ধুসভার সাবেক সহসভাপতি পিয়াস রায়ের প্রথম মৃত্যুবার্ষিকীতে স্মরণসভার আয়োজন করে গোপালগঞ্জ বন্ধুসভা। মেডিকেলের ছাত্র পিয়াস রায় ২০১৮ সালের ১২ মার্চ ইউএস-বাংলার বিমান দুর্ঘটনায় মৃত্যুবরণ করেন। তিনি ২০১৪ সাল থেকে বন্ধুসভার সঙ্গে যুক্ত ছিলেন। তাঁর মৃত্যুতে এক কর্তব্যপরায়ণ ও নিষ্ঠাবান সংগঠক হারায় গোপালগঞ্জ বন্ধুসভা', 1, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_12_153305_create_admin_table', 2),
(4, '2019_03_12_153856_create_blog_table', 3),
(5, '2019_03_13_195020_create_category_table', 3),
(6, '2019_03_12_181230_create_test_table', 4),
(7, '2019_03_16_215227_create_post_table', 4),
(8, '2019_03_17_105811_create_post_table', 5),
(9, '2019_03_17_115443_create_post_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit_counter` tinyint(4) NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `category_id`, `post_short_description`, `post_long_description`, `post_image`, `author_name`, `hit_counter`, `publication_status`, `created_at`, `updated_at`) VALUES
(3, 'পিয়াস রায়ের প্রথম মৃত্যুবার্ষিকী পালিত', 8, 'গোপালগঞ্জ বন্ধুসভার সাবেক সহসভাপতি পিয়াস রায়ের প্রথম মৃত্যুবার্ষিকীতে স্মরণসভার আয়োজন করে গোপালগঞ্জ বন্ধুসভা। মেডিকেলের ছাত্র পিয়াস রায় ২০১৮ সালের ১২ মার্চ ইউএস-বাংলার বিমান দুর্ঘটনায় মৃত্যুবরণ করেন। তিনি ২০১৪ সাল থেকে বন্ধুসভার সঙ্গে যুক্ত ছিলেন। তাঁর মৃত্যুতে এক কর্তব্যপরায়ণ ও নিষ্ঠাবান সংগঠক হারায় গোপালগঞ্জ বন্ধুসভাগোপালগঞ্জ বন্ধুসভার সাবেক সহসভাপতি পিয়াস রায়ের প্রথম মৃত্যুবার্ষিকীতে স্মরণসভার আয়োজন করে গোপালগঞ্জ বন্ধুসভা। মেডিকেলের ছাত্র পিয়াস রায় ২০১৮ সালের ১২ মার্চ ইউএস-বাংলার বিমান দুর্ঘটনায় মৃত্যুবরণ করেন। তিনি ২০১৪ সাল থেকে বন্ধুসভার সঙ্গে যুক্ত ছিলেন। তাঁর মৃত্যুতে এক কর্তব্যপরায়ণ ও নিষ্ঠাবান সংগঠক হারায় গোপালগঞ্জ বন্ধুসভাগোপালগঞ্জ বন্ধুসভার সাবেক সহসভাপতি পিয়াস রায়ের প্রথম মৃত্যুবার্ষিকীতে স্মরণসভার আয়োজন করে গোপালগঞ্জ বন্ধুসভা। মেডিকেলের ছাত্র পিয়াস রায় ২০১৮ সালের ১২ মার্চ ইউএস-বাংলার বিমান দুর্ঘটনায় মৃত্যুবরণ করেন। তিনি ২০১৪ সাল থেকে বন্ধুসভার সঙ্গে যুক্ত ছিলেন। তাঁর মৃত্যুতে এক কর্তব্যপরায়ণ ও নিষ্ঠাবান সংগঠক হারায় গোপালগঞ্জ বন্ধুসভা|গোপালগঞ্জ বন্ধুসভার সাবেক সহসভাপতি পিয়াস রায়ের প্রথম মৃত্যুবার্ষিকীতে স্মরণসভার আয়োজন করে গোপালগঞ্জ বন্ধুসভা। মেডিকেলের ছাত্র পিয়াস রায় ২০১৮ সালের ১২ মার্চ ইউএস-বাংলার বিমান দুর্ঘটনায় মৃত্যুবরণ করেন। তিনি ২০১৪ সাল থেকে বন্ধুসভার সঙ্গে যুক্ত ছিলেন। তাঁর মৃত্যুতে এক কর্তব্যপরায়ণ ও নিষ্ঠাবান সংগঠক হারায় গোপালগঞ্জ বন্ধুসভাগোপালগঞ্জ বন্ধুসভার সাবেক সহসভাপতি পিয়াস রায়ের প্রথম মৃত্যুবার্ষিকীতে স্মরণসভার আয়োজন করে গোপালগঞ্জ বন্ধুসভা। মেডিকেলের ছাত্র পিয়াস রায় ২০১৮ সালের ১২ মার্চ ইউএস-বাংলার বিমান দুর্ঘটনায় মৃত্যুবরণ করেন। তিনি ২০১৪ সাল থেকে বন্ধুসভার সঙ্গে যুক্ত ছিলেন। তাঁর মৃত্যুতে এক কর্তব্যপরায়ণ ও নিষ্ঠাবান সংগঠক হারায় গোপালগঞ্জ বন্ধুসভা', 'গোপালগঞ্জ বন্ধুসভার সাবেক সহসভাপতি পিয়াস রায়ের প্রথম মৃত্যুবার্ষিকীতে স্মরণসভার আয়োজন করে গোপালগঞ্জ বন্ধুসভা। মেডিকেলের ছাত্র পিয়াস রায় ২০১৮ সালের ১২ মার্চ ইউএস-বাংলার বিমান দুর্ঘটনায় মৃত্যুবরণ করেন। তিনি ২০১৪ সাল থেকে বন্ধুসভার সঙ্গে যুক্ত ছিলেন। তাঁর মৃত্যুতে এক কর্তব্যপরায়ণ ও নিষ্ঠাবান সংগঠক হারায় গোপালগঞ্জ বন্ধুসভাগোপালগঞ্জ বন্ধুসভার সাবেক সহসভাপতি পিয়াস রায়ের প্রথম মৃত্যুবার্ষিকীতে স্মরণসভার আয়োজন করে গোপালগঞ্জ বন্ধুসভা। মেডিকেলের ছাত্র পিয়াস রায় ২০১৮ সালের ১২ মার্চ ইউএস-বাংলার বিমান দুর্ঘটনায় মৃত্যুবরণ করেন। তিনি ২০১৪ সাল থেকে বন্ধুসভার সঙ্গে যুক্ত ছিলেন। তাঁর মৃত্যুতে এক কর্তব্যপরায়ণ ও নিষ্ঠাবান সংগঠক হারায় গোপালগঞ্জ বন্ধুসভাগোপালগঞ্জ বন্ধুসভার সাবেক সহসভাপতি পিয়াস রায়ের প্রথম মৃত্যুবার্ষিকীতে স্মরণসভার আয়োজন করে গোপালগঞ্জ বন্ধুসভা। মেডিকেলের ছাত্র পিয়াস রায় ২০১৮ সালের ১২ মার্চ ইউএস-বাংলার বিমান দুর্ঘটনায় মৃত্যুবরণ করেন। তিনি ২০১৪ সাল থেকে বন্ধুসভার সঙ্গে যুক্ত ছিলেন। তাঁর মৃত্যুতে এক কর্তব্যপরায়ণ ও নিষ্ঠাবান সংগঠক হারায় গোপালগঞ্জ বন্ধুসভাগোপালগঞ্জ বন্ধুসভার সাবেক সহসভাপতি পিয়াস রায়ের প্রথম মৃত্যুবার্ষিকীতে স্মরণসভার আয়োজন করে গোপালগঞ্জ বন্ধুসভা। মেডিকেলের ছাত্র পিয়াস রায় ২০১৮ সালের ১২ মার্চ ইউএস-বাংলার বিমান দুর্ঘটনায় মৃত্যুবরণ করেন। তিনি ২০১৪ সাল থেকে বন্ধুসভার সঙ্গে যুক্ত ছিলেন। তাঁর মৃত্যুতে এক কর্তব্যপরায়ণ ও নিষ্ঠাবান সংগঠক হারায় গোপালগঞ্জ বন্ধুসভা', 'public/post_image/162106about.jpg', 'admin', 9, 1, '2019-03-17 15:29:48', NULL),
(4, 'সুবিধাবঞ্চিত শিশুদের আনন্দ দান', 8, '১৩ নভেম্বর ২০১৮, ১৪:৩৬\r\nআপডেট: ১৩ নভেম্বর ২০১৮, ১৪:৫৭\r\n \r\n \r\n\r\nপ্রথম আলোর ২০ বছরপূর্তি উপলক্ষে ২০ জন সুবিধাবঞ্চিত শিশুদের নিয়ে আনন্দ ভ্রমণ ও সিলেট এমসি কলেজ বন্ধুসভার বন্ধু (সভাপতি) আমিনুল ইসলাম ২০তম বারের মতো একজন বৃদ্ধ বাবাকে স্বেচ্ছায় রক্ত দান করেন। এমসি কলেজ বন্ধুসভার বন্ধু আনোয়ার হোসেন তপু একটি ভালো কাজ হিসেবে একজন বৃদ্ধ মায়ের জন্য স্বেচ্ছায় রক্ত দান করেন ।', '১৩ নভেম্বর ২০১৮, ১৪:৩৬\r\nআপডেট: ১৩ নভেম্বর ২০১৮, ১৪:৫৭\r\n \r\n \r\n\r\nপ্রথম আলোর ২০ বছরপূর্তি উপলক্ষে ২০ জন সুবিধাবঞ্চিত শিশুদের নিয়ে আনন্দ ভ্রমণ ও সিলেট এমসি কলেজ বন্ধুসভার বন্ধু (সভাপতি) আমিনুল ইসলাম ২০তম বারের মতো একজন বৃদ্ধ বাবাকে স্বেচ্ছায় রক্ত দান করেন। এমসি কলেজ বন্ধুসভার বন্ধু আনোয়ার হোসেন তপু একটি ভালো কাজ হিসেবে একজন বৃদ্ধ মায়ের জন্য স্বেচ্ছায় রক্ত দান করেন ।\r\n১৩ নভেম্বর ২০১৮, ১৪:৩৬\r\nআপডেট: ১৩ নভেম্বর ২০১৮, ১৪:৫৭\r\n \r\n \r\n\r\nপ্রথম আলোর ২০ বছরপূর্তি উপলক্ষে ২০ জন সুবিধাবঞ্চিত শিশুদের নিয়ে আনন্দ ভ্রমণ ও সিলেট এমসি কলেজ বন্ধুসভার বন্ধু (সভাপতি) আমিনুল ইসলাম ২০তম বারের মতো একজন বৃদ্ধ বাবাকে স্বেচ্ছায় রক্ত দান করেন। এমসি কলেজ বন্ধুসভার বন্ধু আনোয়ার হোসেন তপু একটি ভালো কাজ হিসেবে একজন বৃদ্ধ মায়ের জন্য স্বেচ্ছায় রক্ত দান করেন ।\r\n১৩ নভেম্বর ২০১৮, ১৪:৩৬\r\nআপডেট: ১৩ নভেম্বর ২০১৮, ১৪:৫৭\r\n \r\n \r\n\r\nপ্রথম আলোর ২০ বছরপূর্তি উপলক্ষে ২০ জন সুবিধাবঞ্চিত শিশুদের নিয়ে আনন্দ ভ্রমণ ও সিলেট এমসি কলেজ বন্ধুসভার বন্ধু (সভাপতি) আমিনুল ইসলাম ২০তম বারের মতো একজন বৃদ্ধ বাবাকে স্বেচ্ছায় রক্ত দান করেন। এমসি কলেজ বন্ধুসভার বন্ধু আনোয়ার হোসেন তপু একটি ভালো কাজ হিসেবে একজন বৃদ্ধ মায়ের জন্য স্বেচ্ছায় রক্ত দান করেন ।', 'public/post_image/162137c99bc0cb984dfdecd08ee0f35d0e047a-5bea8e20df5eb.jpg', 'admin', 3, 1, '2019-03-17 17:24:24', NULL),
(6, 'PHP title go here', 1, 'Content goes here\"? If you have, you\'ll know how this can make a design look less \"real\". With dummy text you can view your website as it\'s supposed to look, without being distracted by familiar, readable text.', 'Content goes here\"? If you have, you\'ll know how this can make a design look less \"real\". With dummy text you can view your website as it\'s supposed to look, without being distracted by familiar, readable text.Content goes here\"? If you have, you\'ll know how this can make a design look less \"real\". With dummy text you can view your website as it\'s supposed to look, without being distracted by familiar, readable text.', 'public/post_image/151837post1.jpg', 'admin', 6, 1, '2019-03-18 18:42:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'afroza', 'afroza@gmail.com', NULL, '$2y$10$YGeXQfOhiNWA6W4qVsMc7.3uc6WQHBgc6JX3bGDA6ny5tcrT8Kb0e', NULL, '2019-03-12 09:56:39', '2019-03-12 09:56:39'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$FNznB1fhDv69vznN0jg9VuQz3sFsgl31iXanPbWnZ8dns5BtWFrXC', 'fPt1g5rH3cafPp28UFpDpKE6LusDF0zfnpjjT8llebFvIwPVzkNvb2oC7TJv', '2019-03-19 14:28:12', '2019-03-19 14:28:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
