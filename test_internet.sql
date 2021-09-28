-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 09:48 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_internet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(2, 'testint', '448ed7416fce2cb66c285d182b1ba3df1e90016d');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_img` text NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_coauthors` varchar(255) NOT NULL,
  `book_pubYear` varchar(255) NOT NULL,
  `book_desc` varchar(255) NOT NULL,
  `book_code` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `cat_id`, `book_title`, `book_img`, `book_author`, `book_coauthors`, `book_pubYear`, `book_desc`, `book_code`) VALUES
(1, 5, 'Fables of Fortune', 'fables.JPG', 'Richard Watts ', '', '2012', 'Its a book that teaches about the principles of wealth.', 'ISBN 23456'),
(2, 11, 'Pitch Anthing', 'pitch.jpg', 'Oren Klaff', '', '2011', 'yet to read the book', 'ISBN 234111'),
(3, 11, 'Lean Thinking', 'lean.jpg', 'James P.Womack', 'Daniel T. Jones', '1996', 'Yet to read the book', 'ISBN 23456'),
(4, 11, 'A Sense of Where You Are', 'where.jpg', 'John McPhee', '', '1999', 'yet to read it', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL,
  `id_parent` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `id_parent`, `name`) VALUES
(1, 0, 'Business'),
(3, 1, 'Agriculture'),
(4, 1, 'Agriculture Development'),
(5, 3, 'fiction'),
(6, 3, 'diagonal 45"'),
(7, 4, 'diagonal less than 47"'),
(8, 4, 'diagonal more than 40"'),
(9, 11, 'DvD player '),
(10, 11, 'Blu ray player'),
(11, 0, 'Philosophy ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `product_title` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `product_title`) VALUES
(1, 3, 'Reused Tv''S at an affordable prices'),
(2, 4, 'New Items');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
