-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2025 at 03:30 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id_contact` bigint UNSIGNED NOT NULL,
  `name_contact` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `name_alias` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `info_contact` text COLLATE utf8mb4_general_ci,
  `id_group` bigint UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id_contact`, `name_contact`, `name_alias`, `phone`, `email`, `address`, `info_contact`, `id_group`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Paris Ana Rahayu S.Farm', NULL, '0690 5028 7769', 'lsitorus@yahoo.co.id', 'Ki. Pelajar Pejuang 45 No. 262, Padang 58532, Sumut', NULL, 1, '2025-04-11 05:50:53', NULL, NULL),
(4, 'Wadi Prabowo M.Kom.', NULL, '0807 482 949', 'candrakanta31@yahoo.com', 'Jr. Sunaryo No. 50, Kotamobagu 65002, Kalbar', NULL, 1, '2025-04-11 05:50:53', NULL, NULL),
(5, 'Umi Suryatmi', NULL, '0851 9918 6920', 'elma37@gmail.co.id', 'Ds. Lembong No. 755, Bandar Lampung 35133, Jabar', NULL, 1, '2025-04-11 05:50:53', NULL, NULL),
(6, 'Hardi Tasnim Wahyudin S.E.I', NULL, '029 3746 9753', 'uchita.oktaviani@yahoo.co.id', 'Ki. Gambang No. 804, Lhokseumawe 12630, Sumsel', NULL, 1, '2025-04-11 05:50:53', NULL, NULL),
(7, 'Hafshah Nasyiah', NULL, '(+62) 756 3426 4517', 'prastuti.yono@gmail.com', 'Jln. Wahidin Sudirohusodo No. 633, Surabaya 43571, Lampung', NULL, 1, '2025-04-11 05:50:53', NULL, NULL),
(8, 'Uda Simanjuntak', NULL, '0288 6602 273', 'llaksmiwati@gmail.co.id', 'Ki. Yos No. 236, Tual 53467, Aceh', NULL, 1, '2025-04-11 05:50:53', NULL, NULL),
(9, 'Mutia Lestari', NULL, '(+62) 584 2979 389', 'maimunah17@yahoo.co.id', 'Kpg. Baladewa No. 374, Banda Aceh 29218, Maluku', NULL, 1, '2025-04-11 05:50:53', NULL, NULL),
(10, 'Nova Genta Riyanti S.Farm', NULL, '(+62) 997 2722 150', 'zulaikha.prakasa@yahoo.co.id', 'Jln. Jamika No. 264, Lubuklinggau 91323, Jambi', NULL, 1, '2025-04-11 05:50:53', NULL, NULL),
(11, 'Malik Jarwi Kusumo', NULL, '0209 9483 497', 'wirda.mardhiyah@gmail.co.id', 'Kpg. Cikutra Barat No. 772, Palopo 51754, Riau', NULL, 1, '2025-04-11 05:50:53', NULL, NULL),
(12, 'Dono Budiyanto', NULL, '0524 0449 7672', 'nadia88@yahoo.com', 'Ds. Pacuan Kuda No. 574, Pekalongan 95880, DKI', NULL, 1, '2025-04-11 05:50:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gawe`
--

CREATE TABLE `gawe` (
  `id_gawe` bigint UNSIGNED NOT NULL,
  `name_gawe` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `title_gawe` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `place_gawe` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_gawe` text COLLATE utf8mb4_general_ci,
  `date_gawe` datetime DEFAULT NULL,
  `end_gawe` datetime DEFAULT NULL,
  `info_gawe` text COLLATE utf8mb4_general_ci,
  `image_gawe` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gawe`
--

INSERT INTO `gawe` (`id_gawe`, `name_gawe`, `title_gawe`, `place_gawe`, `address_gawe`, `date_gawe`, `end_gawe`, `info_gawe`, `image_gawe`) VALUES
(1, 'Lee Ochoa', 'Dolor laborum A vol', 'Elit id occaecat ra', 'Facere voluptatem e', '1977-06-28 00:00:00', '2005-10-07 00:00:00', 'Deserunt eu aliquid ', '1744359647_96bd2119d1559394ef34.png');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id_group` bigint UNSIGNED NOT NULL,
  `name_group` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `info_group` text COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id_group`, `name_group`, `info_group`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Default Group', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(8, '2025-04-07-084729', 'App\\Database\\Migrations\\Gawe', 'default', 'App', 1744350269, 1),
(9, '2025-04-07-125102', 'App\\Database\\Migrations\\CreateUsers', 'default', 'App', 1744350269, 1),
(10, '2025-04-08-031514', 'App\\Database\\Migrations\\CreateGroups', 'default', 'App', 1744350269, 1),
(11, '2025-04-08-103536', 'App\\Database\\Migrations\\CreateContacts', 'default', 'App', 1744350269, 1),
(12, '2025-04-09-134752', 'App\\Database\\Migrations\\AddFieldGaweTable', 'default', 'App', 1744350269, 1),
(13, '2025-04-11-042235', 'App\\Database\\Migrations\\CreateMoneyTable', 'default', 'App', 1744350269, 1);

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `id_money` bigint UNSIGNED NOT NULL,
  `id_gawe` bigint UNSIGNED NOT NULL,
  `detail` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` int NOT NULL,
  `date_money` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `type_money` enum('in','out') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`id_money`, `id_gawe`, `detail`, `nominal`, `date_money`, `description`, `type_money`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Tabungan', 100000, NULL, 'Modal nikah', 'in', NULL, NULL, NULL),
(2, 1, 'Tabungan', 100000, NULL, 'Modal nikah', 'in', NULL, '2025-04-11 13:59:29', '2025-04-11 13:59:29'),
(3, 1, 'Tabungan', 100000, NULL, 'Modal nikah', 'out', NULL, NULL, NULL),
(4, 1, 'Tabungan', 100000, NULL, 'Modal nikah', 'out', NULL, NULL, NULL),
(5, 1, 'Tabungan', 100000, NULL, 'Modal nikah', 'in', NULL, '2025-04-11 13:58:57', '2025-04-11 13:58:57'),
(6, 1, '', 28, '2002-08-18', 'Tempor velit rem rec', 'in', '2025-04-11 13:33:52', '2025-04-11 13:58:53', '2025-04-11 13:58:53'),
(7, 1, '', 15, '2016-08-27', 'Dolorem nisi maxime ', 'in', '2025-04-11 13:34:17', '2025-04-11 13:58:48', '2025-04-11 13:58:48'),
(8, 1, '', 9812345, '2024-04-01', 'awertyiuo', 'in', '2025-04-11 14:02:04', '2025-04-11 14:59:42', NULL),
(9, 1, '', 44, '1987-10-24', 'Provident quo rerum', 'in', '2025-04-11 15:17:06', '2025-04-11 15:20:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint UNSIGNED NOT NULL,
  `name_user` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `email_user` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password_user` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `info_user` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `email_user`, `password_user`, `info_user`) VALUES
(1, 'Admin', 'admin@app.com', '$2y$10$umtstdb15nXmV0lOK/PIoOmlz5dyy95L72vqEm6WvYZ4iShVQvxea', NULL),
(2, 'User', 'user@app.com', '$2y$10$YVyeAK3J880S6g1ipdRKjO5kLnv/5vKmtSSq95dlHL8mSHKjsvHge', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contact`),
  ADD KEY `contacts_id_group_foreign` (`id_group`);

--
-- Indexes for table `gawe`
--
ALTER TABLE `gawe`
  ADD PRIMARY KEY (`id_gawe`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`id_money`),
  ADD KEY `id_gawe_relation` (`id_gawe`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contact` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gawe`
--
ALTER TABLE `gawe`
  MODIFY `id_gawe` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `id_money` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_id_group_foreign` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id_group`);

--
-- Constraints for table `money`
--
ALTER TABLE `money`
  ADD CONSTRAINT `id_gawe_relation` FOREIGN KEY (`id_gawe`) REFERENCES `gawe` (`id_gawe`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
