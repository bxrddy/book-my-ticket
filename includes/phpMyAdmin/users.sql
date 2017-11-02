-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 08:56 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book-my-ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT 'Maharashtra',
  `address` varchar(255) DEFAULT NULL,
  `pincode` int(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `balance` int(50) NOT NULL DEFAULT '100',
  `security_code` int(11) NOT NULL DEFAULT '321'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `city`, `state`, `address`, `pincode`, `password`, `balance`, `security_code`) VALUES
(1, 'Brijesh', 'brijesh.reddy15@siesgst.ac.in', 'Male', 'Mumbai', 'Maharashtra', 'Chembur', 400089, 'brijesh', 870, 222),
(2, 'Ronaldo', 'cristiano.ronaldo07@gmail.com', 'Male', 'Madrid', 'Community of Madrid', 'Santiago Bernabeu', 28052, 'halamadrid', 80, 333),
(3, 'Messi', 'lionel.messi10@gmail.com', 'Male', 'Barcelona', 'Catalonia', 'Camp Nou', 8019, 'forcabarca', 100, 444),
(4, 'Mark', 'mark.zuck@facebook.com', 'Male', 'New York', 'U.S Ville', 'White Plains', 10029, 'facebook', 300, 555),
(5, 'Marcelo', 'marcelo12@realmadrid.com', 'Male', 'Madrid', 'Community of Madrid', 'Santiago Bernabeu', 28059, 'halamadrid', 100, 666),
(6, 'Arpita', 'arpita.arpita15@siesgst.ac.in', 'Female', 'Navi mumbai', 'Maharashtra', 'Airoli', 400708, 'arpita', 1870, 777),
(7, 'Omkar', 'omkar.prabhu15@siesgst.ac.in', 'Male', 'Mumbai', 'Maharashtra', 'Badlapur', 421503, 'omkar', 750, 888),
(8, 'Aditya', 'aditya.kulkarni15@siesgst.ac.in', 'Male', 'Navi Mumbai', 'Maharashtra', 'Koparkhairane ', 400709, 'aditya', 520, 999),
(9, 'Mohit', 'mohit.parulekar15@siesgst.ac.in', 'Male', 'Mumbai', 'Maharashtra', 'Tilak Nagar', 400089, 'mohit', 210, 223),
(10, 'Hailee', 'haileesteinfeld@rockbottom.com', 'Female', 'Greenville', 'Maharashtra', 'Santa Monica', 29601, 'hailee', 790, 334),
(11, 'Kygo', 'kygo@thistown.com', 'Male', 'Mumbai', 'Maharashtra', 'Orchard Road', 80019, 'kygo', 140, 445);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
