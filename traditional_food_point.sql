-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2016 at 01:43 PM
-- Server version: 5.5.49
-- PHP Version: 5.3.10-1ubuntu3.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `traditional_food_point`
--

-- --------------------------------------------------------

--
-- Table structure for table `babyfashion`
--

CREATE TABLE IF NOT EXISTS `babyfashion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Names` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `babyfashion`
--

INSERT INTO `babyfashion` (`Id`, `Names`) VALUES
(1, 'Frocks'),
(2, 'Shorts'),
(3, 'Booties'),
(4, 'Tops & Tees'),
(5, 'Onesies'),
(6, 'Party Wear'),
(7, 'Inner Wear'),
(8, 'Nightwear');

-- --------------------------------------------------------

--
-- Table structure for table `CoolDrinks`
--

CREATE TABLE IF NOT EXISTS `CoolDrinks` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Names` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `CoolDrinks`
--

INSERT INTO `CoolDrinks` (`Id`, `Names`) VALUES
(1, 'Maza'),
(2, 'Lemon Juice'),
(3, 'Grapes Juice');

-- --------------------------------------------------------

--
-- Table structure for table `CustomerOrder`
--

CREATE TABLE IF NOT EXISTS `CustomerOrder` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Phone` int(20) NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `OrderLocation` varchar(50) NOT NULL,
  `OrderDate` varchar(50) NOT NULL,
  `OrderTime` varchar(50) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total` double NOT NULL,
  `Message` text NOT NULL,
  `CreatedDate` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `CustomerOrder`
--

INSERT INTO `CustomerOrder` (`Id`, `FirstName`, `LastName`, `Gender`, `Phone`, `ItemName`, `OrderLocation`, `OrderDate`, `OrderTime`, `Cost`, `Quantity`, `Total`, `Message`, `CreatedDate`) VALUES
(56, 'Anil', 'kumar', 'Male', 1234567, 'Frocks', '', '15/08/2016', '3PM', 5, 10, 0, 'hi', '2016-08-12 14:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `pwd`, `role`) VALUES
(0, 'anil', '71b9b5bc1094ee6eaeae8253e787d654', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `non_vegetarian`
--

CREATE TABLE IF NOT EXISTS `non_vegetarian` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Names` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `non_vegetarian`
--

INSERT INTO `non_vegetarian` (`Id`, `Names`) VALUES
(1, 'Chicken Biryani'),
(2, 'Egg Biryani');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(50) NOT NULL,
  `Code` varchar(200) NOT NULL,
  `ItemCategories` varchar(50) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `Image` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `ItemName`, `Code`, `ItemCategories`, `Cost`, `Quantity`, `TotalPrice`, `Image`) VALUES
(1, 'Frocks', 'AbdF43f', 'Baby Fashion (0-2 Years)', 5, 1, 5, ''),
(2, 'Frocks', 'JhkHhd243', 'Baby Fashion (0-2 Years)', 12, 1, 12, ''),
(3, 'Shorts', '', 'Baby Fashion (0-2 Years)', 9, 1, 9, ''),
(4, 'Frocks', '', 'Baby Fashion (0-2 Years)', 500, 1, 500, ''),
(5, 'Green Tea', '', 'Breakfast', 8, 1, 8, ''),
(6, 'Block Tea', '', 'Breakfast', 10, 1, 10, ''),
(7, 'Lemon Tea', '', 'Breakfast', 10, 1, 10, ''),
(8, 'Chicken Biryani', '', 'Non Vegetarian', 250, 1, 250, ''),
(9, 'Egg Biryani', '', 'Non Vegetarian', 220, 1, 220, ''),
(10, 'Maza', '', 'Cool Drinks', 26, 1, 26, ''),
(11, 'Lemon Juice', '', 'Cool Drinks', 10, 1, 10, ''),
(12, 'Grapes Juice', '', 'Cool Drinks', 10, 1, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_title`
--

CREATE TABLE IF NOT EXISTS `product_title` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `FolderName` varchar(50) NOT NULL,
  `glyphicons_class` varchar(50) NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product_title`
--

INSERT INTO `product_title` (`product_id`, `name`, `FolderName`, `glyphicons_class`, `path`) VALUES
(1, 'Baby Fashion (0-2 Years)', 'babyfashion', './images/baby_0_1.jpeg', './babyfashion/index.php'),
(2, 'Boys Fashion (2-8 Years)', 'boysfashion', './images/boys_2_8.jpg', './boysfashion/index.php'),
(3, 'Girls Fashion (2-8 Years)', 'girls_fashion', './images/girl_2_8.jpg', './girls_fashion/index.php'),
(4, 'Bay Care (0-2 Years)', 'baby_care', './images/Babycare-top-baby-care.jpg', './baby_care/index.php');

-- --------------------------------------------------------

--
-- Table structure for table `vegetarian`
--

CREATE TABLE IF NOT EXISTS `vegetarian` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Names` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vegetarian`
--

INSERT INTO `vegetarian` (`Id`, `Names`) VALUES
(1, 'Roti'),
(2, 'Dosa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
