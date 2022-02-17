-- phpMyAdmin SQL Dump
-- version 5.1.1deb3+bionic1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2022 at 08:21 PM
-- Server version: 5.7.37-0ubuntu0.18.04.1
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nkssa`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_token`
--

CREATE TABLE `account_token` (
  `id` int(16) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` varchar(70) NOT NULL,
  `expired` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_token`
--

INSERT INTO `account_token` (`id`, `email`, `token`, `created_at`, `expired`) VALUES
(1, 'maxwellwachira67@gmail.com', 'd9237142ce3a40cb09aed85f7e3321ca', '2022/02/08 02:04:45', NULL),
(2, 'maxwellwachira67@gmail.com', '7ae39dbda868d94428ccd42e8a28f24c', '2022/02/08 02:06:58', NULL),
(3, 'maxwellwachira67@gmail.com', '3da832d1d180e1467e51f3eeabdc2540', '2022/02/08 02:10:27', NULL),
(4, 'maxwellwachira67@gmail.com', 'dda09785fab665803e7edc9bdbde4df3', '2022/02/08 02:28:12', NULL),
(5, 'maxwellwachira67@gmail.com', 'ff4bda6db22781ab829bdddd21d55506', '2022/02/08 02:28:16', NULL),
(6, 'maxwellwachira67@gmail.com', '7c4494dae740dd9648dffdf6cb7be353', '2022/02/08 02:28:18', NULL),
(7, 'maxwellwachira67@gmail.com', '79eb9bd00183fa6f81d70f7583c0f8f2', '2022/02/08 02:28:36', NULL),
(8, 'maxwellwachira67@gmail.com', '89085801e3d5a17cf71f484d812fea90', '2022/02/08 02:28:52', NULL),
(9, 'maxwellwachira67@gmail.com', '1fc6e98eaf6b5b18d4d5382042501104', '2022/02/08 02:36:52', NULL),
(10, 'maxwellwachira67@gmail.com', '0325c0e72f3003b2fa75a9de3b72b7f3', '2022/02/08 02:43:24', NULL),
(11, 'maxwellwachira67@gmail.com', '7820139183f1474e56631bd9a32bf47d', '2022/02/08 02:43:38', NULL),
(12, 'maxwellwachira67@gmail.com', 'b4ddbd6185601a6d231bd1a8251dbacc', '2022/02/08 02:51:36', NULL),
(13, 'maxwellwachira67@gmail.com', '5f9fef8ae967ff73482d12dba5db039e', '2022/02/08 02:52:03', NULL),
(14, 'maxwellwachira67@gmail.com', 'a6b7fadf6b0b6d1c5bd2c2a64ead2352', '2022/02/08 02:53:47', NULL),
(15, 'maxwell@gearbox.co.ke', 'e06456491dfa002d6b7f04ef6a9988c8', '2022/02/09 20:47:30', NULL),
(16, 'maxwell@gearbox.co.ke', '8c0ede4aa71f0d921d695766cf9c8c16', '2022/02/09 20:48:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(16) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(16) NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `token`, `user_id`, `status`, `created_at`) VALUES
(1, '15df793cf05350b467ae223b74e48b5c', 3, 0, '2022/02/08 05:13:08'),
(2, 'c5a10710f5391e854b3c0c82c0e53be6', 3, 0, '2022/02/08 05:14:46'),
(3, 'd46c199c556cc2112ae2c0081d864dae', 3, 0, '2022/02/08 05:15:47'),
(4, 'ce6ceb918b0bd918eee8e688ce600c1e', 3, 0, '2022/02/08 05:16:12'),
(5, 'ae77ab779743a46604ed57e73e5958e8', 3, 0, '2022/02/09 19:38:22'),
(6, '9a38842ccaaed8757eacbdd613dcdcd6', 3, 0, '2022/02/09 20:49:53'),
(7, 'ab07ef78353c6c00f08a963961d8bee3', 4, 0, '2022/02/17 21:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(16) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `secondname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `year` int(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `membership` int(2) NOT NULL,
  `verified_account` int(2) NOT NULL,
  `pending_payment` int(2) DEFAULT NULL,
  `profilephoto` varchar(100) DEFAULT NULL,
  `created_at` varchar(70) NOT NULL,
  `deleted` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `secondname`, `email`, `phonenumber`, `year`, `password`, `membership`, `verified_account`, `pending_payment`, `profilephoto`, `created_at`, `deleted`) VALUES
(3, 'Maxwell', 'Wachira', 'maxwellwachira67@gmail.com', '+254703519593', 2016, '$2y$10$1FZWlDYNs7UrUlWvPg8hNuS36fYtNXH0uMqseyfZaQhB3TX1poXZC', 1, 1, 1, NULL, '2022/02/08 02:43:24', 0),
(4, 'Maxwell', 'Mwangi', 'maxwell@gearbox.co.ke', '+254703519593', 2016, '$2y$10$4aJaUxjLfsN0917RwWJWGOKsM5eKs6vIfxKMGBQMFo4M08533COWG', 1, 1, 1, NULL, '2022/02/09 20:47:30', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_token`
--
ALTER TABLE `account_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_token`
--
ALTER TABLE `account_token`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
