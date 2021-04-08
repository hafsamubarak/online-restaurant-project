-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 10:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `food_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_name`) VALUES
(0, ''),
(1, 'Aliquam sagittis'),
(4, 'Aliquam sagittis'),
(8, 'Donec porta consequat'),
(2, 'Fusce dictum finibus'),
(5, 'Maecenas eget justo'),
(6, 'Quisque et felis eros'),
(7, 'Sed ultricies dui'),
(3, 'Sed varius turpis');

-- --------------------------------------------------------

--
-- Table structure for table `food_images`
--

CREATE TABLE `food_images` (
  `id` int(11) NOT NULL,
  `food_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(150) NOT NULL,
  `email` char(100) NOT NULL,
  `phone` char(15) NOT NULL,
  `password` char(50) NOT NULL,
  `userMessage` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `userMessage`) VALUES
(7, 'Maxwell Campbell', 'jenyxotyci@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Libero dolore aut in'),
(8, 'Henry Young', 'fyzeha@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Facilis sunt sint do'),
(9, 'Blythe Graves', 'naso@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Laboriosam excepteu'),
(10, 'Regina Berger', 'sojyryzyq@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'In exercitationem si'),
(11, 'Amaya Bowman', 'vyxyd@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Doloremque officia a'),
(12, 'Dawn Stokes', 'soxe@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Laborum deserunt aut'),
(13, 'Lacota Hansen', 'finewo@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Rerum a quo assumend'),
(14, 'Castor Shannon', 'xiko@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Deleniti eum minim d'),
(15, 'Daquan Bird', 'xusezijyd@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Molestiae ea consect'),
(16, 'hafsa', 'hafsamubarak96@gmail.com', '01113417881', '25f9e794323b453885f5181f1b624d0b', 'Nesciunt magna est'),
(17, 'hafsa', 'hafsamubarak96@gmail.com', '01113417881', '25f9e794323b453885f5181f1b624d0b', 'Nesciunt magna est'),
(18, 'Ciaran Chambers', 'kuwozomija@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'In soluta ea incidid'),
(19, 'Hiroko Nielsen', 'jukuwo@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Dolorem enim cupidat'),
(20, 'Hiroko Nielsen', 'jukuwo@mailinator.com', '01113417881', '777d7ca88d628d2400809da11eda6ccf', 'Dolorem enim cupidat'),
(21, 'Jessamine Burnett', 'duxukibera@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Magni qui beatae aut'),
(22, 'hafsa', 'hafsamubarak96@gmail.com', '01113417881', '25f9e794323b453885f5181f1b624d0b', ',dvknm'),
(23, 'hafsa', 'hafsamubarak96@gmail.com', '01113417881', '1e40c16750d7bb122fdbdb2fd3c1a3c8', ',dvknm'),
(24, 'Hafsa', 'hafsamubarak96@gmail.com', '01113417881', '33102945afd31ea690ca5d0650017094', ',dvknm'),
(25, 'ELIANA MOLINA', 'ruduke@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Consequuntur eius se'),
(26, 'Gil Montgomery', 'ranag@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Nisi voluptate ratio'),
(27, 'hafsa', 'hafsamubarak96@gmail.com', '01113417881', '25f9e794323b453885f5181f1b624d0b', 'fkvnjfdnmjf'),
(28, 'Lunea Gould', 'qaxakakig@mailinator.com', '01113417881', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Optio aperiam verit');

-- --------------------------------------------------------

--
-- Table structure for table `user_food`
--

CREATE TABLE `user_food` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_name` (`food_name`);

--
-- Indexes for table `food_images`
--
ALTER TABLE `food_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_image` (`food_image`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_food`
--
ALTER TABLE `user_food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `food_id` (`food_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_images`
--
ALTER TABLE `food_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_food`
--
ALTER TABLE `user_food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_images`
--
ALTER TABLE `food_images`
  ADD CONSTRAINT `food_images_ibfk_1` FOREIGN KEY (`food_image`) REFERENCES `food` (`food_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_food`
--
ALTER TABLE `user_food`
  ADD CONSTRAINT `user_food_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_food_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
