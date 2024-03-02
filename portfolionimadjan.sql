-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 02:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolionimadjan`
--

-- --------------------------------------------------------

--
-- Table structure for table `madjan`
--

CREATE TABLE `madjan` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `project_desc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `project_img` varchar(88) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `madjan`
--

INSERT INTO `madjan` (`project_id`, `project_name`, `project_desc`, `project_link`, `project_img`) VALUES
(6, 'CYBER+', 'A website produced in February 2024. This is a game store that has this cyberpunk feeling to it in terms of the design, structure, and colors used.', 'http://google.com', 'uploads/CYBER+.jpeg'),
(8, 'Codyssey', 'An e-learning game about Python programming. It contains the fundamentals of the involved language in order to foster growth through an interactive and fun method.', 'http://google.com', 'uploads/cod.jpg'),
(9, 'Administrative Office Facility Reservation System', 'A website produced in February 2024. I\'ve conducted research and gathered colors that complement together and reflect the organization\'s branding.', 'http://google.com', 'uploads/aofrs.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `madjan`
--
ALTER TABLE `madjan`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `madjan`
--
ALTER TABLE `madjan`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
