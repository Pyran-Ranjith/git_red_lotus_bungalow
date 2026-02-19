-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2026 at 03:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `red_lotus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `room_type` varchar(50) DEFAULT NULL,
  `guests` int(11) DEFAULT 1,
  `message` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_name`, `email`, `phone`, `room_id`, `check_in`, `check_out`, `total_price`, `status`, `room_type`, `guests`, `message`, `created_at`) VALUES
(1, 'John Silva', 'john@example.com', '0771234567', 1, '2026-03-01', '2026-03-05', 480.00, 'Confirmed', NULL, 1, NULL, '2026-02-14 09:05:04'),
(2, 'Nadeesha Perera', 'nadeesha@example.com', '0719876543', 2, '2026-03-10', '2026-03-12', 500.00, 'Pending', NULL, 1, NULL, '2026-02-14 09:05:04'),
(3, 'Michael Fernando', 'michael@example.com', '0754567890', 3, '2026-04-01', '2026-04-07', 1080.00, 'Cancelled', NULL, 1, NULL, '2026-02-14 09:05:04'),
(4, 'Mahi Jayawardana', 'mahi@gmail.com', '0718111800', 2, '2026-02-18', '2026-02-20', NULL, 'Pending', NULL, 1, NULL, '2026-02-16 01:56:25'),
(37, 'test', 'test@gmail.com', '11111111', NULL, '2026-02-19', '2026-02-21', NULL, 'Pending', 'Grand Villa', 3, 'Please confirm this booking', '2026-02-19 02:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `capacity` int(11) DEFAULT 2,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `type`, `price`, `capacity`, `description`, `image`, `status`, `created_at`) VALUES
(1, 'Deluxe Garden Room', 'Deluxe', 15000.00, 2, 'Spacious room with garden view.', 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?q=80&w=2670', 'Available', '2026-02-14 09:05:04'),
(2, 'Royal Loft', 'Suite', 18500.00, 4, 'Elevated views of misty hills, private timber balcony, and a cozy fireplace for romantic evenings', 'https://images.unsplash.com/photo-1505693416388-b0346efee539?q=80&w=2670', 'Available', '2026-02-14 09:05:04'),
(3, 'Grand Villa', 'Family', 25000.00, 5, 'Spacious living area, two master bedrooms, private dining, and exclusive butler service.', 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=2670', 'Available', '2026-02-14 09:05:04'),
(5, 'test', NULL, 30000.00, 2, 'testDescription', NULL, 'Available', '2026-02-19 02:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$yxwljCym4lJP5d6XMp9hL.1H2jRK70w10t3LoBUDtsaRRoi3X0VCS', 'admin', '2026-02-14 09:05:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
