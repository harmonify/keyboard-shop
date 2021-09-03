-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 09:20 PM
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
-- Database: `db_finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_roles`
--

CREATE TABLE `tb_roles` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(50) NOT NULL,
  `roleby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_roles`
--

INSERT INTO `tb_roles` (`roleid`, `rolename`, `roleby`) VALUES
(1, 'user', 'admin'),
(2, 'administrator', 'admin'),
(4, 'developer', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `userimg` varchar(100) DEFAULT 'default_user_img.png',
  `userrole` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `userpass`, `userimg`, `userrole`) VALUES
(1, 'admin', '$2y$10$w/RhD/jDR0H7Y3cE07e5CubJe0JNBw9slKh9OCLLbsLrGevcZwCB.', 'default_user_img.png', 'administrator'),
(2, 'wendy', '$2y$10$/Gsl2zmvMWDTgxpuqu8cG.4itEEgxWFpXXpI.bj3PSlk6v8d3AnqO', 'keyboard1.jpg', 'user'),
(3, 'admin2', '$2y$10$z8fUE/gIO00FyEeTbnx9AOzZr25hQr6JsO88xDWKOtW5NkSYnwRiu', 'keyboard1.jpg', 'administrator'),
(4, 'ryan', '$2y$10$ADQQuMGRLtLGf1QG.LpRiubDHvj.SHvH5qGPGPReNkF8/DZYTh1ia', 'keyboard5_020920212043000000.jpg', 'administrator'),
(12, 'harley', '$2y$10$cejsh/ifCqCjTIKiJbmLg.zaJ7wMDshUzF445O8K79RHP4X1zSDgW', 'keyboard9.jpg', 'user'),
(13, 'ian', '$2y$10$QPkAhlVv9O.lDw64qe97Rua3im99.NxDvqIPkLX2kyBg.HHdJCGeO', 'keyboard8.jpg', 'user'),
(14, 'jean', '$2y$10$5pwBMzf0sg2VRyFu3Sdo.OcFlWCrIoQR94tut.g8gcQ.F4lSCe.qO', 'keyboard5.jpg', 'user'),
(20, 'well', '$2y$10$ixx/CBInxSiUzI7/azC8xuBFX.ZuJOLjSz0c19Dt6ItAUoIeMH0Km', 'AbsoluteAnxiousHyracotherium-mobile020920212036000000.jpg', 'administrator'),
(21, 'wellplayed', '$2y$10$tkXW8c8Pvs.daDVWrl1bbeyFew.CqCR.A5U71l76T32Iixq17J3cS', 'AbsoluteAnxiousHyracotherium-mobile020920212036000000.jpg', 'user'),
(22, 'hmm', '$2y$10$cooY0TKJZBAnBIOIFfBbTudINN9Oo.uLrI3.14/y8tom4M4ukLLlG', 'keyboard3020920212037000000.jpg', 'user'),
(23, 'humu', '$2y$10$ADMhCZRMcXqFYNRwii1xGOjcMCbnXN4YDPXhJlCqEg5u7DDNNRVU2', 'default_user_img.png', 'user'),
(24, 'mana', '$2y$10$y.Opsq1lLd/0VI.kUfXPnuj5PoNR9rbfU76WDa7qvXIgiT1hn3XV.', 'keyboard1020920212040000000.jpg', 'user'),
(25, 'yup', '$2y$10$CN8XzityB7uNfBcgUKrqxuzb1AFjYKNkSRkThH591GoEiyuK1NciG', 'keyboard2_020920212041000000.jpg', 'user'),
(26, 'maan', '$2y$10$GxXK0YOSLSr6MfEJP0XT/uQUWxXisnmryCVrCZJkN0g9r3C8DIMKS', 'keyboard3_020920212042000000.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
