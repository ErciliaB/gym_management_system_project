-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2026 at 08:39 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aura_fitness_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `class_id` int NOT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_status` varchar(50) DEFAULT 'Confirmed',
  PRIMARY KEY (`booking_id`),
  KEY `user_id` (`user_id`),
  KEY `class_id` (`class_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `class_id`, `booking_date`, `booking_status`) VALUES
(1, 1, 1, '2026-05-22 06:07:37', 'Confirmed'),
(2, 2, 2, '2026-05-23 07:50:16', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) NOT NULL,
  `class_date` date NOT NULL,
  `class_time` time NOT NULL,
  `capacity` int NOT NULL,
  `class_description` text,
  `trainer_id` int DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  KEY `trainer_id` (`trainer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `class_date`, `class_time`, `capacity`, `class_description`, `trainer_id`) VALUES
(1, 'Morning Yoga', '2026-06-01', '08:00:00', 20, 'Relaxing yoga session for all levels', 3),
(2, 'HIIT Training', '2026-06-02', '18:00:00', 15, 'High intensity workout class', 2),
(3, 'Strength Basics', '2026-06-03', '17:30:00', 18, 'Beginner strength training session', 1),
(4, 'Pilates Core', '2026-06-04', '09:00:00', 16, 'Improve flexibility, posture and core strength.', 1),
(5, 'Advanced Strength', '2026-06-05', '18:30:00', 12, 'Strength training using free weights and machines.', 3),
(6, 'Boxing Fitness', '2026-06-06', '17:00:00', 20, 'Cardio boxing workout focused on endurance and coordination.', 2),
(7, 'Functional Training', '2026-06-07', '10:00:00', 15, 'Full-body workout for everyday movement and strength.', 3),
(8, 'Spin Class', '2026-06-08', '06:30:00', 18, 'Indoor cycling class with music and resistance training.', 2),
(10, 'Bootcamp Challenge', '2026-06-10', '18:00:00', 25, 'Circuit training with high-energy exercises.', 2),
(11, 'Women Strength Club', '2026-06-11', '17:30:00', 15, 'Strength and confidence focused training for women.', 3),
(12, 'Elite Athlete Conditioning', '2026-06-12', '19:00:00', 10, 'Advanced conditioning program for experienced members.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `message_id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`message_id`, `full_name`, `email`, `message`, `submitted_at`) VALUES
(1, 'John Smith', 'john@example.com', 'I would like more information about membership plans.', '2026-05-23 08:42:06'),
(2, 'Emily Brown', 'emily@example.com', 'What classes are available for beginners?', '2026-05-23 08:42:06'),
(3, 'David Wilson', 'david@example.com', 'Can I book classes online through the website?', '2026-05-23 08:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

DROP TABLE IF EXISTS `memberships`;
CREATE TABLE IF NOT EXISTS `memberships` (
  `membership_id` int NOT NULL AUTO_INCREMENT,
  `membership_name` varchar(100) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `benefits` text,
  PRIMARY KEY (`membership_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`membership_id`, `membership_name`, `duration`, `price`, `benefits`) VALUES
(5, 'Gold', '2 months', 230.00, 'Access to all equipment and access to private carpark'),
(2, 'Premium', '3 Months', 129.99, 'Gym access and group classes'),
(3, 'Elite', '6 Months', 249.99, 'Gym access, classes, and personal training discount'),
(4, 'Star membership', '14 days', 220.00, 'Breakfast included and access to all classes'),
(6, 'Gold', '2 months', 230.00, 'Access to carpark and private exercise room');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

DROP TABLE IF EXISTS `trainers`;
CREATE TABLE IF NOT EXISTS `trainers` (
  `trainer_id` int NOT NULL AUTO_INCREMENT,
  `trainer_name` varchar(100) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`trainer_id`, `trainer_name`, `specialization`, `email`, `phone_number`) VALUES
(1, 'Sarah Johnson', 'Strength Training', 'sarah@aurafitness.com', '0400000001'),
(2, 'Michael Lee', 'Cardio Fitness', 'michael@aurafitness.com', '0400000002'),
(3, 'Amina Grace', 'Yoga and Pilates', 'amina@aurafitness.com', '0400000003');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `role` enum('member','admin') DEFAULT 'member',
  `membership_id` int DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `membership_id` (`membership_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `role`, `membership_id`) VALUES
(1, 'Ercilia', 'Bucuane', 'ercilliabucuane@gmail.com', '$2y$10$fLldMZQVd292hBrnv3KbK.qCk99RevzNcN5emX7Bq.zsY5P8cuxlW', NULL, 'admin', NULL),
(2, 'diane', 'rosa', 'DianaR@gmail.com', '$2y$10$kypBxIJS3UkKgTqYSZeGluvuCml2P24mCQK9KLznK/8E5lR09bBW6', '0452269384', 'member', 1),
(3, 'lenny', 'ross', 'lennyr@gmail.com', '$2y$10$VExKOmlF/RsMDA2QKrFIjuzEXYXm0YTRqP42w5kV1m6LRMBEjlirO', '0452269384', 'member', 2),
(4, 'Melly', 'Jacob', 'mellyjacob@gmail.com', '$2y$10$Gb7M9lWyoeNrA876fdNz2es8o.JaoxIGFHefNujLIExlkcZgng3HK', '7231657', 'member', 3),
(5, 'lenny', 'Jacob', 'dvfhwjalkr34@gmail.com', '$2y$10$X7NAuNpSkS8JhtieNlSl4./BDw0dauFFYoCbTOu4cNq1Q0oZE9Mvq', 'u3876747', 'member', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
