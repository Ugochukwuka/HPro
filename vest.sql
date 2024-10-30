-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 04:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vest`
--

-- --------------------------------------------------------

--
-- Table structure for table `deposit_tb`
--

CREATE TABLE `deposit_tb` (
  `id` int(12) NOT NULL,
  `deposit_id` varchar(121) DEFAULT NULL,
  `users_unique_id` varchar(121) NOT NULL,
  `username` varchar(121) NOT NULL,
  `email` varchar(121) NOT NULL,
  `plan` varchar(121) NOT NULL,
  `coin_type` varchar(121) NOT NULL,
  `amount` varchar(121) NOT NULL DEFAULT '0',
  `interest` varchar(121) NOT NULL DEFAULT '0',
  `referral` varchar(121) DEFAULT NULL,
  `ref_id` varchar(121) NOT NULL,
  `ref` varchar(121) DEFAULT '0',
  `day_counter` varchar(121) NOT NULL DEFAULT '0',
  `status` varchar(121) NOT NULL DEFAULT 'pending',
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `image` varchar(111) NOT NULL,
  `plan_percent` varchar(121) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposit_tb`
--

INSERT INTO `deposit_tb` (`id`, `deposit_id`, `users_unique_id`, `username`, `email`, `plan`, `coin_type`, `amount`, `interest`, `referral`, `ref_id`, `ref`, `day_counter`, `status`, `created_at`, `image`, `plan_percent`) VALUES
(208, '66c8ea56ba83b', '66c2e03fc7f75', 'Marrtino', 'orallemartino87@gmail.com', 'Builderr Plan', 'Bitcoin', '500', '0', '', '71976', '', '0', 'pending', '2024-08-23 21:00:22.764994', '172444322266c8ea56ba8ed.png', '4'),
(209, '66c964cc944c5', '66c963a43767f', 'Araun', 'ensuearauan328@gmail.com', 'Builderr Plan', 'Bitcoin', '500', '0', '70698', '96583', '1', '0', 'confirmed', '2024-08-24 05:42:52.834140', '172447457266c964cc98dc7.png', '4');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(12) NOT NULL,
  `plan_id` varchar(111) NOT NULL,
  `plan_name` varchar(111) NOT NULL,
  `plan_percent` int(12) NOT NULL,
  `plan_duration` varchar(111) NOT NULL,
  `plan_period` varchar(111) NOT NULL,
  `plan_min` varchar(111) NOT NULL,
  `plan_max` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `plan_id`, `plan_name`, `plan_percent`, `plan_duration`, `plan_period`, `plan_min`, `plan_max`) VALUES
(8, '6453ca1ed2122', 'Builderr Plan', 4, 'Daily', '9', '100', '999'),
(10, '6453ca702ffce', 'Silverr Plan', 7, 'Daily', '14', '5000', '9999'),
(13, '645bc477b77af', 'Diamondd Plan', 5, 'Daily', '14', '1000', '3999'),
(14, '6469f980846d5', 'Advanced', 9, 'Daily', '7', '30000', '40000');

-- --------------------------------------------------------

--
-- Table structure for table `referral_tb`
--

CREATE TABLE `referral_tb` (
  `id` int(12) NOT NULL,
  `referral_id` varchar(121) NOT NULL,
  `users_unique_id` varchar(121) NOT NULL,
  `username` varchar(121) NOT NULL,
  `plan` varchar(121) NOT NULL,
  `coin_type` varchar(121) NOT NULL,
  `amount` varchar(121) NOT NULL DEFAULT '0',
  `ref_id` varchar(121) NOT NULL,
  `referral` varchar(121) NOT NULL,
  `ref_amount` varchar(121) NOT NULL DEFAULT '0',
  `status` varchar(121) NOT NULL DEFAULT 'pending',
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referral_tb`
--

INSERT INTO `referral_tb` (`id`, `referral_id`, `users_unique_id`, `username`, `plan`, `coin_type`, `amount`, `ref_id`, `referral`, `ref_amount`, `status`, `created_at`) VALUES
(110, '66ca1c58866b2', '66c963a43767f', 'Araun', 'Builderr Plan', 'Bitcoin', '500', '96583', '70698', '60', 'pending', '2024-08-24 18:46:00.551265');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(12) NOT NULL,
  `site_name` varchar(111) NOT NULL,
  `short_name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `address` varchar(111) NOT NULL,
  `description` varchar(111) NOT NULL,
  `refpercent` int(12) NOT NULL,
  `companylogo` varchar(122) NOT NULL,
  `livechatcode` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `short_name`, `email`, `phone`, `address`, `description`, `refpercent`, `companylogo`, `livechatcode`) VALUES
(28, 'ATU', 'ATU Invest', 'micheal@gmail.com', '+1498263744', 'Stadium Crescent 9C', 'We Trade and Teach People On the Market', 12, '169396851964f7e8870d5df.jpeg', 'pFUYLEIzYf');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(12) NOT NULL,
  `fullname` varchar(121) NOT NULL,
  `email` varchar(121) NOT NULL,
  `message` varchar(121) NOT NULL,
  `create_at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `users_unique_id` varchar(121) NOT NULL,
  `fullname` varchar(121) NOT NULL,
  `username` varchar(121) NOT NULL,
  `email` varchar(121) NOT NULL,
  `number` varchar(121) NOT NULL,
  `password` varchar(121) NOT NULL,
  `con_password` varchar(122) NOT NULL,
  `ref_id` varchar(6) NOT NULL,
  `referral` varchar(6) DEFAULT NULL,
  `balance` varchar(121) NOT NULL DEFAULT '0',
  `type_of_user` varchar(12) NOT NULL DEFAULT 'users',
  `status` varchar(121) NOT NULL DEFAULT 'pending',
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `image_name` varchar(131) NOT NULL DEFAULT 'prof_icon.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `users_unique_id`, `fullname`, `username`, `email`, `number`, `password`, `con_password`, `ref_id`, `referral`, `balance`, `type_of_user`, `status`, `created_at`, `image_name`) VALUES
(170, '66c8e4154aa74', 'Oralle', 'Martino', 'orallemartino87@gmail.com', '122121212212', '834e35817419b06b1f4db46610931f298af21bfa4b8551d6c8acc9f35c9da399', '834e35817419b06b1f4db46610931f298af21bfa4b8551d6c8acc9f35c9da399', '70698', '', '0', 'admin', 'confirmed', '2024-08-23 20:33:41.306114', 'prof_icon.png'),
(171, '66c963a43767f', 'Ensue', 'Araun', 'ensuearauan328@gmail.com', '22434454534', '834e35817419b06b1f4db46610931f298af21bfa4b8551d6c8acc9f35c9da399', '834e35817419b06b1f4db46610931f298af21bfa4b8551d6c8acc9f35c9da399', '96583', '70698', '0', 'users', 'confirmed', '2024-08-24 05:37:56.227242', 'prof_icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(12) NOT NULL,
  `payment_method` varchar(111) NOT NULL,
  `payment_address` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `payment_method`, `payment_address`) VALUES
(5, 'Bitcoin', 'jhajdajhjsysruiwbbnhweyuwy'),
(6, 'Ethereum', 'jasjwnamavejesj'),
(7, 'Usdt', 'dafgsjdh');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(12) NOT NULL,
  `withdraw_id` varchar(121) NOT NULL,
  `users_unique_id` varchar(121) NOT NULL,
  `username` varchar(121) NOT NULL,
  `email` varchar(121) NOT NULL,
  `wallet` varchar(121) NOT NULL,
  `coin_type` varchar(121) NOT NULL,
  `amount` varchar(121) NOT NULL,
  `status` varchar(121) NOT NULL DEFAULT 'pending',
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `withdraw_id`, `users_unique_id`, `username`, `email`, `wallet`, `coin_type`, `amount`, `status`, `created_at`) VALUES
(148, '64723800ac286', '643c52f61e84b', 'Naija', 'naija@yahoo.com', 'hjmmmmmmbbbiiyy', 'Bitcoin', '100', 'confirmed', '2023-05-27 10:04:00.705855'),
(149, '649004791595f', '643c52f61e84b', 'Naija', 'naija@yahoo.com', 'aaaaaaaaaaaaa', 'Bitcoin', '100', 'pending', '2023-06-19 00:32:09.145377');

-- --------------------------------------------------------

--
-- Table structure for table `with_amount`
--

CREATE TABLE `with_amount` (
  `id` int(12) NOT NULL,
  `withdraw_id` varchar(121) NOT NULL,
  `users_unique_id` varchar(121) NOT NULL,
  `username` varchar(121) NOT NULL,
  `email` varchar(121) NOT NULL,
  `wallet` varchar(121) NOT NULL,
  `coin_type` varchar(121) NOT NULL,
  `amount` varchar(121) NOT NULL,
  `status` varchar(121) NOT NULL DEFAULT 'pending',
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `with_amount`
--

INSERT INTO `with_amount` (`id`, `withdraw_id`, `users_unique_id`, `username`, `email`, `wallet`, `coin_type`, `amount`, `status`, `created_at`) VALUES
(33, '649004bf7bc18', '643c52f61e84b', 'Naija', 'naija@yahoo.com', 'kk', 'Ethereum', '200', 'pending', '2023-06-19 00:33:19.508252'),
(31, '6472425220e4f', '643c52f61e84b', 'Naija', 'naija@yahoo.com', 'hjmmmmmmbbbiiyy', 'Bitcoin', '500', 'pending', '2023-05-27 10:48:02.135582'),
(30, '646ea02f9d4a3', '643c52f61e84b', 'Naija', 'naija@yahoo.com', 'sssssssssssssssssssssssssssss', 'Bitcoin', '200', 'confirmed', '2023-05-24 16:39:27.644852');

-- --------------------------------------------------------

--
-- Table structure for table `with_bonus`
--

CREATE TABLE `with_bonus` (
  `id` int(12) NOT NULL,
  `withbouns_id` varchar(121) NOT NULL,
  `users_unique_id` varchar(133) NOT NULL,
  `username` varchar(121) NOT NULL,
  `email` varchar(121) NOT NULL,
  `wallet` varchar(121) NOT NULL,
  `coin_type` varchar(121) NOT NULL,
  `amount` varchar(121) NOT NULL,
  `status` varchar(121) NOT NULL DEFAULT 'pending',
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `with_bonus`
--

INSERT INTO `with_bonus` (`id`, `withbouns_id`, `users_unique_id`, `username`, `email`, `wallet`, `coin_type`, `amount`, `status`, `created_at`) VALUES
(28, '646e7cc0660d3', '643c52f61e84b', 'Naija', 'naija@yahoo.com', 'sssssssssssssssssssssssssssss', 'Bitcoin', '100', 'pending', '2023-05-24 14:08:16.418509'),
(30, '6472455164340', '643c52f61e84b', 'Naija', 'naija@yahoo.com', 'bbbbbbbbbbb', 'Bitcoin', '300', 'pending', '2023-05-27 11:00:49.410671');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deposit_tb`
--
ALTER TABLE `deposit_tb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deposit_id` (`deposit_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_tb`
--
ALTER TABLE `referral_tb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referral_id` (`referral_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_unique_id` (`users_unique_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `withdraw_id` (`withdraw_id`);

--
-- Indexes for table `with_amount`
--
ALTER TABLE `with_amount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `withdraw_id` (`withdraw_id`);

--
-- Indexes for table `with_bonus`
--
ALTER TABLE `with_bonus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `withbouns_id` (`withbouns_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deposit_tb`
--
ALTER TABLE `deposit_tb`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `referral_tb`
--
ALTER TABLE `referral_tb`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=466;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `with_amount`
--
ALTER TABLE `with_amount`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `with_bonus`
--
ALTER TABLE `with_bonus`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
