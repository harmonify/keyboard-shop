-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 10:45 AM
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
(2, 'wendy', '$2y$10$FbLIolIbJffgKPOmKZUKpuxcFHb5AV2TL3WlGOaNPZWp9vPf6H0O.', 'keyboard10.jpg', 'user'),
(3, 'admin2', '$2y$10$z8fUE/gIO00FyEeTbnx9AOzZr25hQr6JsO88xDWKOtW5NkSYnwRiu', 'keyboard1.jpg', 'administrator'),
(4, 'ryan', '$2y$10$FnWgCFsd.QNl.EnB6UAWbuCgtV2FVAPIc.Gr.ONsPvvB3wEOGfwhe', 'keyboard11.jpg', 'user'),
(5, 'bian', '$2y$10$itZD1GUrf7dW9RCIzDgKAe023HcXl6/lJJ/W2qDMYAsXov/IuEyMG', 'default_user_img.png', 'user'),
(6, 'asdf', '$2y$10$e5Ax1rAsOVyt4ygvvbtrnOJg1eY2ii.6WbFP0TKH61k2KbJSCGKMy', 'default_user_img.png', 'administrator'),
(7, 'jekyll', '$2y$10$cVCS8chBK6nge0qxso8zs.Y5VX/lm2zdSqh6pUHN7k3A1ee9rECP2', 'keyboard4.jpg', 'user'),
(8, 'deyy', '$2y$10$JBrQRWEtnOOMKTwvlzpyueHR8XmaC.mpZgF9.VcC9Dw9XYrsGS19G', 'keyboard6.jpg', 'administrator'),
(9, 'eyy', '$2y$10$S/9T4W3zPf.snoa8I51aU.FJX.VhsoDm77xATdKrYBZQW07pDL9tm', 'keyboard7.jpg', 'user'),
(10, 'fff', '$2y$10$ih3LMjBXKg2SmTm4pf7baOYg.yL0bKzHdMRe7oUFM4W7IuTnOha0G', 'keyboard10.jpg', 'user'),
(11, 'gell', '$2y$10$bwuFIwYfcpwonmTPgOJnyeRdu4tI3Vd0o/qMWtT2LeUybmuS0dnEO', 'keyboard2.jpg', 'administrator'),
(12, 'harley', '$2y$10$cejsh/ifCqCjTIKiJbmLg.zaJ7wMDshUzF445O8K79RHP4X1zSDgW', 'keyboard9.jpg', 'user'),
(13, 'ian', '$2y$10$QPkAhlVv9O.lDw64qe97Rua3im99.NxDvqIPkLX2kyBg.HHdJCGeO', 'keyboard8.jpg', 'user'),
(14, 'jean', '$2y$10$5pwBMzf0sg2VRyFu3Sdo.OcFlWCrIoQR94tut.g8gcQ.F4lSCe.qO', 'keyboard5.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
