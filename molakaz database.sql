-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2023 at 12:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `molakaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'jack', '1234'),
(2, 'monkey', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advert_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `advert_image` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `org_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advert_id`, `name`, `date`, `advert_image`, `status`, `org_id`) VALUES
(1, 'Discount at mcdonald', '2023-07-20', 'mc.png', 1, 2),
(5, 'Mercedes', '2023-07-20', 'mer.webp', 1, 4),
(6, 'Ford mustang advert', '2023-07-22', 'ford.jpg', 1, 5),
(7, 'kia cars', '2023-08-01', 'kia.jpg', 1, 9),
(8, 'painting', '2023-08-01', 'paster.jpg', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `askquotation`
--

CREATE TABLE `askquotation` (
  `askid` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `portfolioid` int(11) NOT NULL,
  `contractorid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `askquotation`
--

INSERT INTO `askquotation` (`askid`, `description`, `portfolioid`, `contractorid`, `userid`, `status`) VALUES
(1, 'test', 7, 5, 29, 0),
(3, 'test', 8, 5, 29, 0),
(4, 'i want it to be 5ft tall and with tek wood', 8, 5, 31, 0),
(5, 'i want it in 3 of my room', 9, 5, 29, 0),
(6, 'i want it for 4 room 2 toilet and 1 bathroom', 10, 5, 36, 0),
(7, 'i want my house to be of 5 rooms', 10, 5, 47, 0),
(8, 'ddd', 10, 5, 29, 0),
(9, 'ffff', 10, 5, 29, 0),
(10, 'xxx', 10, 5, 29, 0),
(11, 'my house is very wide and i need quoting for five room', 11, 10, 48, 0),
(13, 'i want the marbles to be pastered in four rooms of 12ft', 16, 12, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(1, 'outdoor'),
(2, 'indoor'),
(3, 'classic'),
(4, 'modern'),
(5, 'swimming'),
(11, 'balcony'),
(12, 'wall pastering');

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE `contractor` (
  `contractor_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phonenumber` int(8) NOT NULL,
  `work_rating` varchar(255) NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `loc_id` int(11) DEFAULT NULL,
  `portfolio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`contractor_id`, `firstname`, `lastname`, `email`, `password`, `phonenumber`, `work_rating`, `profile_img`, `status`, `description`, `address`, `user_id`, `loc_id`, `portfolio_id`) VALUES
(1, 'shiv', 'deenoo', 'shiv@gmail.com', '1234', 54968588, 'high', NULL, 1, 'test description', 'port louis', NULL, NULL, NULL),
(4, 'zoro', 'nico', 'roronoa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed0', 54968588, 'high', 'avatar4.png', 1, 'ccc', 'port louis', NULL, NULL, NULL),
(5, 'test', 'nico', 'el@gmail.com', '12345', 54968588, 'high', 'avatar3.png', 1, 'ccc', 'port louis', NULL, NULL, NULL),
(6, 'ttttt', 'ttttt', 'tttt@gmail.com', '1234', 54968588, 'high', 'ba.jpg', 1, 'cccddd', 'port louis', NULL, NULL, NULL),
(7, 'markun', 'markun', 'markun@gmail.com', '1234', 54968588, 'high', 'ba.jpg', 1, 'i have experience in electrical etc...', 'port louis', NULL, NULL, NULL),
(8, 'garp', 'monkeyD', 'gogeyec931@quipas.com', 'garp1234', 56478788, 'high', 'g.jpg', 1, 'i have experience in electrical etc...', 'port louis', NULL, NULL, NULL),
(9, 'xavier', 'test', '2wen1s34@qiott.com', '111111', 54968588, 'high', 'bana.png', 1, 'i have experience in electrical etc...', 'port louis', NULL, NULL, NULL),
(10, 'mary', 'jeane', 'bcyiysvgtz@exelica.com', 'jean12345', 54789899, 'high', NULL, 1, 'i have experience in electrical etc...', 'rosehill', NULL, NULL, NULL),
(11, 'contracboss', 'giesel', 'c@gmail.com', '111111', 43332344, 'medium', '44767706-removebg-preview (1).png', 1, 'we have experience in outdoor and indoor', 'port louis', NULL, NULL, NULL),
(12, 'jhonnie', 'depp', 'ibasic123@beaufortschool.org', 'contractor1234', 54908944, 'medium', NULL, 1, 'wall pastering professional', 'port louis', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int(8) NOT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `org_name`, `email`, `password`, `phone_number`, `status`) VALUES
(1, 'kfc', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 1),
(2, 'mcdonald', 'mcdo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 54968588, 1),
(4, 'Mercedes', 'merco@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968555, 1),
(5, 'ford', 'ford@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, 1),
(6, 'zoross', 'gogeyec931@quipas.com', 'c4d1f46dba7ced2f9fba8a3eb737c751', 54968588, 1),
(7, 'test', 'jowekaqi@tutuapp.bid', '96e79218965eb72c92a549dd5a330112', 54968665, 1),
(8, '', 'el@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1),
(9, 'kia', 'kia@gmail.com', 'cdac6e0ebb15f30038faa1910d847ba3', 54787866, 1),
(10, 'mauvilac', 'nathanf01@bityemedia.com', '0612755e270725f25f6c3298d428d1d2', 4345922, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(255) NOT NULL,
  `amount` int(10) NOT NULL,
  `juiceref` varchar(255) NOT NULL,
  `proceed_id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `date`, `detail`, `amount`, `juiceref`, `proceed_id`, `contractor_id`, `user_id`) VALUES
(1, '0000-00-00', 'sdfadfa', 33333, 'sdbvsdvs', 14, 5, 29),
(2, '0000-00-00', 'ADadD', 21212, 'dwefwefwefw', 14, 5, 29),
(3, '0000-00-00', 'rgergerg', 3332, 'dfberbebr', 14, 5, 29),
(4, '0000-00-00', 'gnfgnfg', 455, ' gf dgbdgbd', 14, 5, 29),
(5, '0000-00-00', 'sdvsdvs', 222, 'vsdvsdvs', 1, 5, 29),
(6, '2023-07-30', 'This is partial payment of the work', 15000, 'rs500', 2, 5, 29),
(7, '2023-07-30', 'this is details', 1000, 'ddedwdew', 3, 5, 29),
(8, '2023-07-30', 'cwecwec', 111, 'cadcadc', 4, 5, 29),
(9, '2023-07-30', 'cdcsd', 1000, 'deded', 6, 5, 29),
(10, '2023-07-30', 'cdsc sda', 1500, 'dewecwec', 7, 5, 29),
(11, '2023-07-30', 'dfgbfgb', 3232, 'fwefwef', 8, 5, 29),
(12, '2023-07-30', 'fefe', 3323, 'bgfbfgbf', 9, 5, 29),
(13, '2023-07-30', 'This is a payment', 1000, 'jxxxxccfttd', 10, 5, 29),
(14, '2023-07-30', 'bbb', 1500, 'rxtffgtrf', 12, 5, 29),
(15, '2023-07-30', 'dddd', 1500, 'rxtyyhg', 10, 5, 29),
(16, '2023-07-31', 'fffff', 1500, 'rxtvvt', 1, 5, 29),
(17, '2023-07-31', 'ddd', 1500, 'dwewef', 10, 5, 29),
(18, '2023-07-31', 'dsdsds', 1223, 'dsdsdsdsds', 2, 5, 29),
(19, '2023-07-31', 'ok proceed', 1500, 'fsdcsdcd', 15, 5, 47),
(20, '2023-07-31', 'dsaede', 1500, 'csacdvsdv', 15, 5, 47),
(21, '2023-07-31', 'vfvfv', 1500, 'fnfgnfn', 15, 5, 47),
(22, '2023-07-31', 'cdcdcvsf', 1500, 'dvsvsvs', 15, 5, 47),
(23, '2023-07-31', 'this is a detail', 1500, 'ghhjffhji', 15, 5, 47),
(24, '2023-07-31', 'cccc', 1500, 'cccccccc', 15, 5, 47),
(25, '2023-07-31', 'sfasf', 1500, 'asfasfa', 15, 5, 47),
(26, '2023-07-31', 'details', 15000, 'bbbgdddf', 17, 5, 29),
(27, '2023-08-01', 'this is your payment thank you', 45000, 'xxfggthj', 18, 10, 48),
(28, '2023-08-01', 'this is the payment', 1500, 'vvdxsddc', 19, 11, 49),
(29, '2023-08-01', 'thank you for your quotation i will gladly proceed', 15000, 'jxxxctyy', 20, 12, 50);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `gallery` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `contractor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `description`, `gallery`, `date`, `status`, `user_id`, `category_id`, `contractor_id`) VALUES
(7, 'swimming pool', 'Rectangle-Inground-Pool-Kit.jpg', '2023-07-17', 0, NULL, 1, 5),
(8, 'carpenter', '483717698ConstructionLaborer.jpg', '2023-07-18', 0, NULL, 2, 5),
(9, 'Fake ceiling', 'fc.jpg', '2023-07-19', 0, NULL, 2, 5),
(10, 'House Base', 'wh.jpg', '2023-07-23', 0, NULL, 4, 5),
(11, 'water proofing', 'water.jpg', '2023-07-31', 0, NULL, 1, 10),
(16, 'wall pastering', 'marble.jpg', '2023-08-01', 0, NULL, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `proceed`
--

CREATE TABLE `proceed` (
  `proceed_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `quotation` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proceed`
--

INSERT INTO `proceed` (`proceed_id`, `user_id`, `contractor_id`, `quotation`, `status`) VALUES
(1, 29, 5, 'the amount is 100000', 0),
(2, 29, 5, 'this will cost rs10000', 0),
(3, 29, 5, 'this is a test', 0),
(4, 29, 5, 'testt', 0),
(5, 29, 5, 'xxx', 0),
(6, 29, 5, 'xxx', 0),
(7, 29, 5, 'ttt', 0),
(8, 29, 5, 'ffff', 0),
(9, 29, 5, 'yyyy', 0),
(10, 29, 5, '100000', 0),
(11, 36, 5, 'it will cost 3000000', 1),
(12, 29, 5, '111', 0),
(13, 31, 5, 'it will cost 300000', 1),
(14, 29, 5, 'it will be expensive', 0),
(15, 47, 5, '1500', 1),
(16, 29, 5, '15000', 0),
(17, 29, 5, '15000', 0),
(18, 48, 10, '45000', 0),
(19, 49, 11, '1500', 0),
(20, 50, 12, '15000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quo_id` int(11) NOT NULL,
  `quotation` varchar(255) NOT NULL,
  `quotation_date` date NOT NULL,
  `amount` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `testimonial` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `rating` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testimonial`, `date`, `rating`, `status`, `user_id`) VALUES
(1, 'very good', '2023-07-22', 'very good experience', 1, 4),
(2, '\"good service provider\"', '2023-07-22', 'top tier experience', 1, 35),
(3, 'eeeee', '2023-07-23', 'high', 1, 29),
(4, 'This website is very easy to use', '2023-08-01', 'had a great time and good experience', 1, 48),
(6, 'i have a thrilled experience it was very good to use', '2023-08-01', 'very good service', 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int(8) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `phone_number`, `profile_image`, `status`, `description`, `address`, `location_id`) VALUES
(2, 'waren', 'arna', 'waren@gmail.com', '1234', 54968588, '', 0, 'this is a test user', 'pte aux sables', NULL),
(4, 'zoro', 'roronoa', 'roronoa@gmail.com', '1234', 54968588, '', 0, '', 'port louis', NULL),
(8, 'robin', 'nico', 'robin@gmail.com', '1234', 54968588, '', 0, '', 'port louis', NULL),
(12, 'test2', 'test', 'test@gmail.com', 'test1234', 54968588, '', 0, '', 'port louis', NULL),
(13, 'randi', 'vanmaterhorn', 'van@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, '', 1, '', 'port louis', NULL),
(14, 'xxx', 'xxx', 'xxx', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, '', 0, '', 'port louis', NULL),
(15, 'test', 'golberg', 'h', '81dc9bdb52d04dc20036dbd8313ed055', 0, '', 1, '', 'port louis', NULL),
(16, 'zoro', 'nico', 'rogronoa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, '', 1, '', 'port louis', NULL),
(17, 'zoro', 'nico', 'robrin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, '', 1, '', 'port louis', NULL),
(18, 'zoro', 'nico', 'roronoa@gmail.com', '1234', 54968588, '', 1, '', 'port louis', NULL),
(19, '', '', '', '', 0, '', 1, '', '', NULL),
(20, '', '', '', '', 0, '', 1, '', '', NULL),
(21, 'zoro', 'golberg', 'roronoa@gmail.com', '1234', 54968588, '54968588', 1, '', 'avatar4.png', NULL),
(22, 'joe', 'test', 'roronoa@gmail.com', '1234', 54968588, '54968588', 1, '', 'e1.jpg', NULL),
(23, 'zoro', 'nico', 'roronoa@gmail.com', '1234', 54968588, 'avatar3.png', 1, '', 'port louis', NULL),
(24, 'zoro', 'test', 'le@gmail.com', '1234', 54968588, 'avatar4.png', 1, '', 'port louis', NULL),
(25, 'zoro', 'roronoa', 'ryoronoa@gmail.com', '1234', 54968588, 'svicc.jpg', 1, '', 'port louis', NULL),
(26, 'test', 'toretto', 'roronwoa@gmail.com', '1234', 54968588, 'mcb.jpeg', 1, '', 'port louis', NULL),
(27, 'joe', 'golberg', 'rorodddnoa@gmail.com', '1234', 54968588, 'avatar4.png', 1, '', 'port louis', NULL),
(28, 'test', 'nico', 'roroaaanoa@gmail.com', '1234', 54968588, 'c4.jpg', 1, '', 'port louis', NULL),
(29, 'zoro', 'roronoa', 'rorfonoa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 54968588, '', 1, '', 'port louis', NULL),
(30, 'luffy', 'monkey', 'luff@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, '1972310.jpg', 1, '', 'port louis', NULL),
(31, 'wakanda', 'test', 'wako@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, 'wedding.jpg', 1, '', 'port louis', NULL),
(32, 'zainab', 'Baichoo', 'zai@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968555, 'avatar4.png', 1, '', 'rosehill', NULL),
(33, 'zainab', 'baichoo', 'azi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 12544323, 'avatar4.png', 1, '', 'rosehill', NULL),
(34, 'test', 'test', 'testss@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, 'avatar2.png', 1, '', 'port louis', NULL),
(35, 'wew', 'toretto', 'rorfonweqewqoa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, 'avatar5.jpg', 1, '', 'port louis', NULL),
(36, 'testuser', 'test', 'testuser@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, '1972310.jpg', 1, '', 'port louis', NULL),
(37, 'www', 'www', 'ell@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, 'ba.jpg', 1, '', 'port louis', NULL),
(38, 'blocktest', 'blocktest', 'blocktest@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, 'ba.jpg', 0, '', 'port louis', NULL),
(39, 'zainabbaichoo', 'baichoo', 'zainab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 54968588, 'Screenshot_20230617_192821_TikTok.jpg', 0, '', 'kotmoi', NULL),
(40, 'ze', 'ew', 'jinsama16@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 54968588, 'Screenshot_20230617_192821_TikTok.jpg', 0, '', 'port louis', NULL),
(41, 'dddd', 'dddddd', 'ddddd@gmail.com', '96e79218965eb72c92a549dd5a330112', 54968588, 'toon background.jpg', 1, '', 'port louis', NULL),
(42, 'dddd', 'dddddd', 'shivs@gmail.com', 'af15d5fdacd5fdfea300e88a8e253e82', 54968588, 'toon background.jpg', 1, '', 'port louis', NULL),
(43, 'rrrr', 'rrrr', 'rrrr@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 54968588, 'toon background.jpg', 1, '', 'kotmoi', NULL),
(44, 'ww', 'www', 'www@gmail.com', 'd785c99d298a4e9e6e13fe99e602ef42', 54968588, 'toon background (1).jpg', 1, '', 'port louis', NULL),
(45, 'vvvv', 'vvvv', 'vvv@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 54968555, 'toon background.jpg', 1, '', 'kotmoi', NULL),
(46, 'cedric', 'meriza', 'cedric@gmail.com', '96e79218965eb72c92a549dd5a330112', 54968588, 'peakpx.jpg', 1, '', 'port louis', NULL),
(47, 'ruben', 'law', 'jevahi6314@wiemei.com', '5f4dcc3b5aa765d61d8327deb882cf99', 54968665, 'bana.png', 1, '', 'port louis', NULL),
(48, 'boaa', 'hancock', 'gogeyec931@quipas.com', '5fec04df0428df959cafe0c6ae993642', 45679899, 'hancock.jpg', 0, '', 'port louis', NULL),
(49, 'zoro', 'chopper', 'elle@gmail.com', '96e79218965eb72c92a549dd5a330112', 54968588, 'apple-health-vectorportal.jpg', 1, '', 'port louis', NULL),
(50, 'robertt', 'downey', 'yamchikovvalera@afractalreality.com', '80ec08504af83331911f5882349af59d', 49098488, 'p2.jpg', 1, '', 'port louis', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advert_id`),
  ADD KEY `org_id` (`org_id`);

--
-- Indexes for table `askquotation`
--
ALTER TABLE `askquotation`
  ADD PRIMARY KEY (`askid`),
  ADD KEY `portfolio_ask` (`portfolioid`),
  ADD KEY `contractor_ask` (`contractorid`),
  ADD KEY `user_ask` (`userid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contractor`
--
ALTER TABLE `contractor`
  ADD PRIMARY KEY (`contractor_id`),
  ADD KEY `user_id_portfolio_fk` (`user_id`),
  ADD KEY `location_id_contractor_fk` (`loc_id`),
  ADD KEY `portfolio_id_contractor_fk` (`portfolio_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `proceed_fk` (`proceed_id`),
  ADD KEY `contra_fk` (`contractor_id`),
  ADD KEY `user_fk_p` (`user_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`),
  ADD KEY `cat_id_portfolio_fk` (`category_id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `contractor_fk` (`contractor_id`);

--
-- Indexes for table `proceed`
--
ALTER TABLE `proceed`
  ADD PRIMARY KEY (`proceed_id`),
  ADD KEY `user_id_fk_p` (`user_id`),
  ADD KEY `contractor_id_fk_p` (`contractor_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`quo_id`),
  ADD KEY `user_id_quo_fk` (`user_id`),
  ADD KEY `contractor_id_quo_fk` (`contractor_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`),
  ADD KEY `user_id_testi_fk` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `loc_id_fk` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `askquotation`
--
ALTER TABLE `askquotation`
  MODIFY `askid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contractor`
--
ALTER TABLE `contractor`
  MODIFY `contractor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `proceed`
--
ALTER TABLE `proceed`
  MODIFY `proceed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `quo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `org_id` FOREIGN KEY (`org_id`) REFERENCES `organization` (`org_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `askquotation`
--
ALTER TABLE `askquotation`
  ADD CONSTRAINT `contractor_ask` FOREIGN KEY (`contractorid`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `portfolio_ask` FOREIGN KEY (`portfolioid`) REFERENCES `portfolio` (`portfolio_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ask` FOREIGN KEY (`userid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contractor`
--
ALTER TABLE `contractor`
  ADD CONSTRAINT `location_id_contractor_fk` FOREIGN KEY (`loc_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `portfolio_id_contractor_fk` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio` (`portfolio_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_portfolio_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `contra_fk` FOREIGN KEY (`contractor_id`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proceed_fk` FOREIGN KEY (`proceed_id`) REFERENCES `proceed` (`proceed_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk_p` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `cat_id_portfolio_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contractor_fk` FOREIGN KEY (`contractor_id`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proceed`
--
ALTER TABLE `proceed`
  ADD CONSTRAINT `contractor_id_fk_p` FOREIGN KEY (`contractor_id`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk_p` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `contractor_id_quo_fk` FOREIGN KEY (`contractor_id`) REFERENCES `contractor` (`contractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_quo_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD CONSTRAINT `user_id_testi_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `loc_id_fk` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
