-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 04:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_hotelrie`
-- Created by Youness Erridhi

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID_CAT` varchar(10) NOT NULL,
  `NAME` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID_CAT`, `NAME`) VALUES
('room_dbl', 'double'),
('room_fml', 'famille'),
('room_mlt', 'multi'),
('room_sgl', 'single'),
('room_suit', 'suite'),
('room_twin', 'twin');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `CIN` varchar(10) NOT NULL,
  `FIRST_NAME` varchar(10) NOT NULL,
  `LAST_NAME` varchar(10) NOT NULL,
  `TELE` varchar(10) NOT NULL,
  `EMAIL` varchar(25) NOT NULL,
  `GENDER` enum('male','female') NOT NULL
) ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`CIN`, `FIRST_NAME`, `LAST_NAME`, `TELE`, `EMAIL`, `GENDER`) VALUES
('bk10', 'youness', 'err', '0603010405', 'err@gmm.am', 'male'),
('bk12', 'asmaa', 'jazoli', '0872676276', 'AS@gmail.co', 'female'),
('BK4550', 'ZAKARIA', 'KHASSA', '8887643277', 'ZAK@GMAIL.COM', 'male'),
('user', 'user', 'user', '0876524456', 'user@user.com', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ID` int(11) NOT NULL,
  `CHEK_IN_DT` datetime NOT NULL,
  `CIN` varchar(10) NOT NULL,
  `NUM_ROOM` int(11) NOT NULL
) ;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ID`, `CHEK_IN_DT`, `CIN`, `NUM_ROOM`) VALUES
(27, '2021-06-17 00:00:00', 'bk12', 1),
(28, '2021-06-17 00:00:00', 'bk12', 2),
(29, '2021-06-18 10:30:00', 'user', 17);

--
-- Triggers `reservations`
--
DELIMITER $$
CREATE TRIGGER `after_delete_reservation` AFTER DELETE ON `reservations` FOR EACH ROW UPDATE rooms SET ETAT = 'available'where NUMERO = old.NUM_ROOM
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_reservation` AFTER INSERT ON `reservations` FOR EACH ROW UPDATE rooms SET ETAT = 'pending'where NUMERO = new.NUM_ROOM
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `NUMERO` int(11) NOT NULL,
  `TELE_ROOM` varchar(10) NOT NULL,
  `ETAT` varchar(20) DEFAULT 'available',
  `ID_CAT` varchar(10) NOT NULL
) ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`NUMERO`, `TELE_ROOM`, `ETAT`, `ID_CAT`) VALUES
(1, '0500000011', 'unavailable', 'room_fml'),
(2, '0500000012', 'pending', 'room_fml'),
(3, '0500000013', 'available', 'room_suit'),
(4, '0500000014', 'available', 'room_suit'),
(5, '0500000015', 'available', 'room_mlt'),
(6, '0500000016', 'available', 'room_mlt'),
(7, '0500000017', 'available', 'room_dbl'),
(8, '0500000018', 'available', 'room_dbl'),
(9, '0500000019', 'available', 'room_dbl'),
(10, '0500000020', 'available', 'room_dbl'),
(11, '0500000021', 'available', 'room_dbl'),
(12, '0500000022', 'available', 'room_dbl'),
(13, '0500000023', 'available', 'room_dbl'),
(14, '0500000024', 'available', 'room_dbl'),
(15, '0500000025', 'available', 'room_dbl'),
(16, '0500000026', 'available', 'room_dbl'),
(17, '0500000027', 'unavailable', 'room_twin'),
(18, '0500000028', 'available', 'room_twin'),
(19, '0500000029', 'available', 'room_twin'),
(20, '0500000030', 'available', 'room_twin'),
(21, '0500000031', 'available', 'room_twin'),
(22, '0500000032', 'available', 'room_sgl'),
(23, '0500000033', 'available', 'room_sgl'),
(24, '0500000034', 'available', 'room_sgl'),
(25, '0500000035', 'available', 'room_sgl'),
(26, '0500000036', 'available', 'room_sgl'),
(27, '0500000037', 'available', 'room_sgl'),
(28, '0500000038', 'available', 'room_sgl'),
(29, '0500000039', 'available', 'room_sgl'),
(30, '0500000040', 'available', 'room_sgl'),
(31, '0500000041', 'available', 'room_sgl'),
(32, '0500000042', 'available', 'room_sgl'),
(33, '0500000043', 'available', 'room_sgl'),
(34, '0500000044', 'available', 'room_sgl'),
(35, '0500000014', 'available', 'room_sgl'),
(36, '0500000046', 'available', 'room_sgl');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'admin', '2021-06-13 15:21:00'),
(2, 'a', 'a', '2021-06-13 15:30:55'),
(3, 'admin1', 'admin1', '2021-06-13 15:51:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_CAT`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`CIN`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `NUM_ROOM` (`NUM_ROOM`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`NUMERO`),
  ADD KEY `fk_id_cat` (`ID_CAT`);

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
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`CIN`) REFERENCES `clients` (`CIN`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`NUM_ROOM`) REFERENCES `rooms` (`NUMERO`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_id_cat` FOREIGN KEY (`ID_CAT`) REFERENCES `categories` (`ID_CAT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
