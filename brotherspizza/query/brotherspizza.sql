-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 07:08 PM
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
-- Database: `brotherspizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `i_id` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `i_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `d_id` varchar(10) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_price` int(10) NOT NULL,
  `d_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`d_id`, `d_name`, `d_price`, `d_image`) VALUES
('d1', 'Classic Lemonade', 120, './images/classic-lemonade.jpg'),
('d2', 'Lemon Iced Tea', 120, './images/lemon-iced-tea.jpg'),
('d3', 'Masala Lemonade', 135, './images/masala-lemonade.jpg'),
('d4', 'Cocoa Frappe', 215, './images/cocoa-frappe.jpg'),
('d5', 'Coffee Frappe', 215, './images/coffee-frappe.jpg'),
('d6', 'Mango Frappe', 215, './images/mango-frappe.jpg'),
('d7', 'Strawberry Frappe', 215, './images/strawberry-frappe.jpg'),
('d8', 'Vanilla Frappe', 190, './images/vanilla-frappe.jpg'),
('d9', 'Lemon Grass Iced Tea', 195, './images/lemon-grass-iced-tea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `p_id` varchar(10) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` int(10) NOT NULL,
  `p_type` varchar(10) NOT NULL,
  `p_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`p_id`, `p_name`, `p_price`, `p_type`, `p_image`) VALUES
('cp1', 'Chicken Pepperoni Pizza', 480, 'Non Veg', './images/chicken-pepperoni-pizza.jpeg'),
('cp2', 'Chicken Sausage Pizza', 239, 'Non Veg', './images/chicken-sausage-pizza.jpeg'),
('cp3', 'Grilled Chicken & Peppers Pizza', 315, 'Non Veg', './images/grilled-chicken-peppers-pizza.jpeg'),
('cp4', 'Spicy Chicken Barbeque Pizza', 359, 'Non Veg', './images/spicy-chicken-barbeque-pizza.jpeg'),
('cp5', 'Spicy Chicken Tandoori Pizza', 465, 'Non Veg', './images/spicy-chicken-tandoori-pizza.jpeg'),
('cp6', 'Chicken Supreme Pizza', 480, 'Non Veg', './images/chicken-supreme-pizza.jpeg'),
('cp7', 'Chicken Cafreal & Onions Pizza', 355, 'Non Veg', './images/chicken-cafreal-onions-pizza.jpeg'),
('vp1', 'Double Cheese Margarita Pizza', 265, 'Veg', './images/double-cheese-margarita-pizza.jpeg'),
('vp2', 'Spicy Mushroom Peppers Pizza', 265, 'Veg', './images/spicy-mushroom-peppers-pizza.jpeg'),
('vp3', 'Veg Margarita Pizza', 189, 'Veg', './images/veg-margarita-pizza.jpeg'),
('vp4', 'Spicy Tandoori Paneer Pizza', 399, 'Veg', './images/spicy-tandoori-paneer-pizza.jpeg'),
('vp5', 'Tomato Fresh Veggie Pizza', 265, 'Veg', './images/tomato-fresh-veggie-pizza.jpeg'),
('vp6', 'Premium Veggie Pizza', 399, 'Veg', './images/premium-veggie-pizza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `u_post` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `firstname`, `lastname`, `email`, `password`, `u_post`) VALUES
('cl1708', 'Rashok', 'Katwal', 'rkatwal903@rku.ac.in', 'password123', 'admin'),
('cl8432', 'Ashim', 'Raja', 'mraja233@rku.ac.in', 'password1234', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
