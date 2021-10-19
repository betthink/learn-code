-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2021 at 04:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `crudsys`
--

CREATE TABLE `crudsys` (
  `no` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crudsys`
--

INSERT INTO `crudsys` (`no`, `name`, `email`, `password`) VALUES
(1, 'Robetson', 'first@mail.com', '435'),
(2, 'Teguh', 'teguh@mail.com', '123'),
(3, 'heri', 'heri@email.com', '231'),
(7, 'herli', 'herli@mail.com', '987'),
(8, 'ahmadi', 'ahmadi@mail.com', '657'),
(9, 'spider', 'spider@mail.com', '437');

-- --------------------------------------------------------

--
-- Table structure for table `loginsys`
--

CREATE TABLE `loginsys` (
  `id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginsys`
--

INSERT INTO `loginsys` (`id`, `username`, `password`) VALUES
(1, 'pertama', '123'),
(2, 'john', '$2y$10$KBE8mZbGUGXYauXCs6yRY.iI4TCv3bY.oMQj5/X76rT81nnhsadJe'),
(3, 'elish', '$2y$10$Sj9rrVmqe.cApZ80/2mD4.kKyXa0V5yFVbImnhi2.J6uyXSFIDyF2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crudsys`
--
ALTER TABLE `crudsys`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `loginsys`
--
ALTER TABLE `loginsys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crudsys`
--
ALTER TABLE `crudsys`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loginsys`
--
ALTER TABLE `loginsys`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
