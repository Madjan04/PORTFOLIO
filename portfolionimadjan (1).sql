-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 04:49 AM
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
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`title`, `content`) VALUES
('Year after year,', '           My mind consistently became more exposed to the programming languages included in our college, namely: C++, Java, Python, PHP. For styling: CSS, Javascript, and HTML. Additionally, C# which I studied during the development of a game that I built called Codyssey.\r\n             \r\n            I have also joined workshops about becoming a better Frontend Developer. I am confident I can design layouts that are both visually appealing and easily comprehensible.\r\n                Now, I want to showcase my potential and introduce modern designs that can cater a wide range of age. At the same time, build connections and exchange knowledge regarding web development.');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `top` varchar(255) NOT NULL,
  `bot` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`top`, `bot`, `title`, `content`) VALUES
('', '', 'Love for Art', 'Ive always admired artists/creatives who give attention to detail in every project they work on—each produced efficiently and effectively. I see art as a handy tool to catch the attention of people and inform them regarding a subject through visuals.'),
('1', '', 'Desire to Grow', 'Though I may have adequate knowledge on art, I believe that there is still a vast amount of uncharted waters to explore. An opportunity to learn and improve is my vessel to be prepared in every challenge that may arrive.');

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

-- --------------------------------------------------------

--
-- Table structure for table `portfolio2`
--

CREATE TABLE `portfolio2` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio3`
--

CREATE TABLE `portfolio3` (
  `overview` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio3`
--

INSERT INTO `portfolio3` (`overview`) VALUES
('A Frontend Developer that finds joy in layouting modern designs to improve user experience.');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_content`
--

CREATE TABLE `portfolio_content` (
  `id` int(11) NOT NULL,
  `identifier` varchar(50) NOT NULL,
  `paragraph_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio_content`
--

INSERT INTO `portfolio_content` (`id`, `identifier`, `paragraph_content`) VALUES
(1, 'overview', 'Default overview content goes here.');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `proficiency_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `proficiency_level`) VALUES
(5, 'CSS', 59),
(6, 'Javascript', 100);

-- --------------------------------------------------------

--
-- Table structure for table `socmed_entries`
--

CREATE TABLE `socmed_entries` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socmed_entries`
--

INSERT INTO `socmed_entries` (`id`, `link`, `image`) VALUES
(7, 'https://www.facebook.com/AJTriesEverything', 0x75706c6f6164732f363632633565313063323531315f66616365626f6f6b2e706e67),
(8, 'https://www.instagram.com/madj.angel/?hl=en', 0x75706c6f6164732f363632633565323831323161365f696e7374616772616d2e706e67),
(9, '', 0x75706c6f6164732f363632633630306530306532655f74776974746572202831292e706e67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`top`,`bot`);

--
-- Indexes for table `madjan`
--
ALTER TABLE `madjan`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `portfolio2`
--
ALTER TABLE `portfolio2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_content`
--
ALTER TABLE `portfolio_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socmed_entries`
--
ALTER TABLE `socmed_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `madjan`
--
ALTER TABLE `madjan`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `portfolio2`
--
ALTER TABLE `portfolio2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_content`
--
ALTER TABLE `portfolio_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `socmed_entries`
--
ALTER TABLE `socmed_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
