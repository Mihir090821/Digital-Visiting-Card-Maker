-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 10:22 PM
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
-- Database: `digital_visa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin1`
--

CREATE TABLE `admin1` (
  `Id` int(11) NOT NULL,
  `Rol` tinyint(4) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Sname` varchar(30) NOT NULL,
  `Uname` varchar(30) NOT NULL,
  `Pass` varchar(30) NOT NULL,
  `Mo` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`Id`, `Rol`, `Fname`, `Sname`, `Uname`, `Pass`, `Mo`, `Email`) VALUES
(1, 1, 'Mihir', 'Rathod', 'Mihir', 'M123', '8469555907', 'Mihir@gmail.com'),
(2, 0, 'Rohan', 'Rathod', 'Rohan', 'R123', '988787675', 'Rohan@gmail.com'),
(3, 1, 'Nirav', 'Kansara', 'Nirav', 'Nirav123', '8767764343', 'Nirav@gmail.com'),
(4, 1, 'Ajay', 'Rathod', 'Ajay', 'aj123', '5455466565', 'Ajaya@gmail.com'),
(5, 1, 'Rohit', 'Rathod', 'Rohit', '73932cffc38b7c34be040ddfea62da', '6565656544', 'Rohit@gmail.com'),
(6, 1, 'Ghanesh', 'vasava', 'Ganesh', 'f287551224fc89c798130411ec1da8', '4565654565', 'Ganesh@gamil.com'),
(7, 1, 'Sagar', 'Rathod', 'Sagar', '825f9e987933c2e093590348c615aa', '6656565541', 'Sagar@gmail.com'),
(8, 1, 'Rajubhai', 'Rathod', 'Rajesh', 'ddb7f46d5532b7c7d3eeed48b2285f', '5556555444', 'Rajesh@gmail.com'),
(9, 1, 'Mihir', 'RAthod', 'Mihirr', '9dcef918bcf1255f6cf07f6638ad1b', '886755656', 'Rathodmihir@gmail.com'),
(11, 0, 'Dinesh', 'Kartik', 'Dinesh', '667e637599947726ab8d004569992e', '8676556565', 'Dinesh@gmail.com'),
(12, 0, 'Piyush', 'Rathod', 'Piyush', 'P123', '8766565767', 'Piyush@gmail.com'),
(13, 1, 'Mahadev', 'Bhole', 'Mahadev', '2e33a9b0b06aa0a01ede70995674ee', '6767654545', 'mahadev@gmail.com'),
(14, 1, 'Admin', 'Rathod', 'admin', '21232f297a57a5a743894a0e4a801f', '5454566546', 'Admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categary`
--

CREATE TABLE `categary` (
  `cat_id` int(11) NOT NULL,
  `categary` varchar(20) NOT NULL,
  `post` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categary`
--

INSERT INTO `categary` (`cat_id`, `categary`, `post`) VALUES
(1, 'College', 0),
(11, 'Tution', 2),
(13, 'Programer', 2),
(14, 'Business', 1),
(15, 'Freelancer', 1),
(16, 'Sports', 0);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `cid` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `adminn` int(11) NOT NULL,
  `Pdate` varchar(30) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`cid`, `cat`, `adminn`, `Pdate`, `img`) VALUES
(16, 11, 1, '11 05,2021', '1620696796Image-1.jpg'),
(18, 13, 1, '11 May, 2021', '1620697266Image-1.jpg'),
(19, 14, 1, '11 05,2021', '1620697538image-2.jpg'),
(20, 15, 1, '11 05,2021', '1620697305image-2.jpg'),
(22, 11, 1, '12 05,2021', '1620799496image-4.jpg'),
(24, 13, 1, '12 May, 2021', '1620800901image-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `rev` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `rev`) VALUES
(2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio, maxime? Ut laboriosam recusandae, mollitia praesentium vel ipsa fugit tempora commodi!'),
(3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo blanditiis possimus enim placeat quibusdam molestiae magni, perferendis neque dolorem laudantium inventore non, quasi temporibus! Magnam temporibus accusamus placeat aspernatur dolores!'),
(4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quo consectetur aspernatur, cupiditate consequuntur perferendis quibusdam ea distinctio iusto perspiciatis sequi ipsam maiores.'),
(5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, temporibus nobis. Voluptas, qui quidem.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `cname` varchar(20) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `mo1` varchar(20) DEFAULT NULL,
  `sname` varchar(20) DEFAULT NULL,
  `mo2` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `cat` int(11) NOT NULL,
  `tmp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `cname`, `fname`, `mo1`, `sname`, `mo2`, `email`, `color`, `logo`, `cat`, `tmp`) VALUES
(1, 'krm', 'Mihir', '767676767', 'Rohan', '666566565', 'krm@gmail.com', '#6511e4', '1620715684Logo.png', 15, '1620697814image-3.png '),
(2, 'It sollution', 'Mihir', '66767676', 'Rohan', '666566565', 'roni@gmail.com', '#563d7c', '1620715960Show.png', 15, '1620697305image-2.jpg '),
(3, 'N.T.C.E', 'nirav', '776767676', 'jigisha', '7767676', 'mtce@gmail.com', '#563d7c', '1620716127Dlete.png', 13, '1620697266Image-1.jpg  '),
(4, 'KRM Soluation', 'rohan ghoghari', '9913325528', '', '', '', '#dfd9e8', '1620778223Logo.png', 15, '1620697305image-2.jpg '),
(5, 'Mihir', 'Mihir', '5554545454', 'Piyush', '6565666766', 'krm@gmail.com', '#563d7c', '1620786865image-3.png', 14, '1620697538image-2.jpg  '),
(6, 'KRM', 'Mihir', '9913325528', 'Rohan', '666566565', 'krm@gmail.com', '#f2f0f5', '1620797764image-3.png', 13, '1620697266Image-1.jpg  '),
(7, 'Sports', 'Mihir', '66767676', 'Rohan', '6565666766', 'mtce@gmail.com', '#563d7c', '1620799918image-2.jpg', 15, '1620697814image-3.png  '),
(8, 'Sports', 'Mihir', '66767676', 'Rohan', '6565666766', 'mtce@gmail.com', '#563d7c', '1620799987image-2.jpg', 15, '1620697814image-3.png  '),
(9, 'It sollution', 'rohan ghoghari', '9913325528', 'mihir', '6565666766', 'roni@gmail.com', '#563d7c', '1620800390image-4.jpg', 15, '1620697305image-2.jpg  '),
(10, 'It sollution', 'rohan ghoghari', '9913325528', 'mihir', '6565666766', 'roni@gmail.com', '#563d7c', '1620800402Image-1.jpg', 15, '1620697305image-2.jpg  '),
(11, 'It sollution', 'rohan ghoghari', '9913325528', 'mihir', '6565666766', 'roni@gmail.com', '#563d7c', '1620800483Image-1.jpg', 15, '1620697305image-2.jpg  '),
(12, 'It sollution', 'rohan ghoghari', '9913325528', 'mihir', '6565666766', 'roni@gmail.com', '#563d7c', '1620800553image-5.jpg', 15, '1620697305image-2.jpg  '),
(13, 'It sollution', 'rohan ghoghari', '9913325528', 'mihir', '6565666766', 'roni@gmail.com', '#563d7c', '1620800586image-6.png', 15, '1620697305image-2.jpg  '),
(14, 'It sollution', 'rohan ghoghari', '9913325528', 'mihir', '6565666766', 'roni@gmail.com', '#fa9200', '1620800603image-6.png', 15, '1620697305image-2.jpg  '),
(15, 'It sollution', 'Mihir', '66767676', 'jigisha', '6565666766', 'mtce@gmail.com', '#6a08fd', '1620800734image-3.png', 13, '1620697266Image-1.jpg  '),
(16, 'It sollution', 'Mihir', '66767676', 'jigisha', '6565666766', 'mtce@gmail.com', '#6a08fd', '1620800796image-3.png', 13, '1620697266Image-1.jpg  ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin1`
--
ALTER TABLE `admin1`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Uname` (`Uname`),
  ADD UNIQUE KEY `Pass` (`Pass`),
  ADD UNIQUE KEY `Mo` (`Mo`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `categary`
--
ALTER TABLE `categary`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `categary` (`categary`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `image` (`img`),
  ADD KEY `cat` (`cat`),
  ADD KEY `adminn` (`adminn`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `cat` (`cat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin1`
--
ALTER TABLE `admin1`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categary`
--
ALTER TABLE `categary`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`cat`) REFERENCES `categary` (`cat_id`),
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`adminn`) REFERENCES `admin1` (`Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`cat`) REFERENCES `categary` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
