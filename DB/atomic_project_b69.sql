-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2017 at 05:54 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atomic_project_b69`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE `birthday` (
  `id` int(13) NOT NULL,
  `birthday` date NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `birthday`, `name`, `is_trashed`) VALUES
(1, '2017-10-02', 'Rahim mia', 'NO'),
(2, '2008-06-10', 'hamid', 'NO'),
(3, '2005-01-01', 'Tushar', 'NO'),
(4, '2017-10-27', 'Ami tumi', 'NO'),
(6, '2017-10-25', 'Rahim', 'NO'),
(9, '1998-12-30', 'COmputer', 'NO'),
(10, '1984-02-01', 'hamid', 'NO'),
(11, '2017-10-26', 'hamid', 'NO'),
(12, '2017-10-26', 'Rahim afroz', 'NO'),
(13, '2017-10-26', 'Nojrul', 'NO'),
(14, '2017-10-26', 'chumki', 'NO'),
(15, '2017-10-26', 'akib ict', 'NO'),
(17, '2017-10-13', 'Rahul', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `book_title`
--

CREATE TABLE `book_title` (
  `id` int(13) NOT NULL,
  `book_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book_title`
--

INSERT INTO `book_title` (`id`, `book_title`, `author_name`, `is_trashed`) VALUES
(5, 'Satkahan', 'Shamresh Mojumder', 'NO'),
(33, 'Programming', 'A K Akib', 'NO'),
(68, 'Kamal er Golgo', 'Niton', 'NO'),
(72, 'Redmi 4x', 'lokman', 'NO'),
(74, 'Hamid', 'KAmal', '2017-10-02 11:07:57'),
(78, 'Redmi Y6II', 'Tarek', 'NO'),
(79, 'Akib ', 'Mitun', 'NO'),
(80, 'mitun\'s life 5434343', 'charls 34', 'NO'),
(81, 'mitun\'s life 2', 'charls', 'NO'),
(83, 'Akib ', 'charls akib', 'NO'),
(84, 'mitun\'s life 2', 'uuuuuuuuuuuuuuuu', 'NO'),
(85, 'Provdffdf', 'A K Akib', 'NO'),
(86, 'ppppppppppppppppp', 'A K Akib', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(13) NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `is_trashed`) VALUES
(1, 'Chittagong', 'NO'),
(4, 'Kulna', 'NO'),
(5, 'Chittagong', 'NO'),
(6, 'Dhaka', 'NO'),
(7, 'Dhaka', 'NO'),
(9, 'Dhaka', 'NO'),
(10, 'Chittagong', 'NO'),
(11, 'Dhaka', 'NO'),
(12, 'Ctg', 'NO'),
(13, 'Ctg', 'NO'),
(14, 'Comilla', 'NO'),
(15, 'Bangladesh', 'NO'),
(16, 'Chittagong', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `city_list`
--

CREATE TABLE `city_list` (
  `id` int(13) NOT NULL,
  `city_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city_list`
--

INSERT INTO `city_list` (`id`, `city_name`) VALUES
(1, 'Chittagong'),
(2, 'Dhaka'),
(3, 'Comilla'),
(4, 'Bangladesh'),
(5, 'Slyet');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(13) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `name`, `email`, `is_trashed`) VALUES
(101, 'Rahim', 'rahil@gmail.com', 'NO'),
(102, 'fatema1232yahoo.com', 'Fatema jahan', '2017-10-03 21:59:56'),
(104, 'mitun', 'minyun1299@live.com', 'NO'),
(105, 'Arjit', 'arjit@puc.com', 'NO'),
(106, 'Rumana', 'rumana786@yahoo.com', 'NO'),
(108, 'Akib', 'akakib.ctg@gmail.com', 'NO'),
(109, 'Akib', 'akakib.ctg@gmail.com', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(13) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `gender`, `is_trashed`) VALUES
(105, 'Ebril', 'female', 'NO'),
(109, 'hamid', 'Male', 'NO'),
(110, 'Ebril New', 'Female', 'NO'),
(111, 'Rahim afroz', 'Male', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(13) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hobbies` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `hobbies`, `is_trashed`) VALUES
(1, 'aaaaa', 'Eating, Photography', '2017-09-24 18:21:23'),
(2, 'Rahim', 'Eating, Riding', '2017-09-24 18:21:29'),
(3, 'fhfjhgb', 'Riding', 'NO'),
(4, 'fdssertwser', 'Photography', 'NO'),
(5, 'vgjhgjg', 'Eating', 'NO'),
(6, 'fhghf', 'Riding, Photography', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `profile_picture`
--

CREATE TABLE `profile_picture` (
  `id` int(13) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile_picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile_picture`
--

INSERT INTO `profile_picture` (`id`, `name`, `profile_picture`, `is_trashed`) VALUES
(8, 'pic6', '1506310369gallery-img1.jpg', 'NO'),
(9, 'Akib', '150692803119247818_244613182699556_3541546016579412341_n.jpg', 'NO'),
(10, 'Rahim afroz', '1506928169800px_COLOURBOX2616305.jpg', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `summary_of_org`
--

CREATE TABLE `summary_of_org` (
  `id` int(13) NOT NULL,
  `company_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `summary_of_org`
--

INSERT INTO `summary_of_org` (`id`, `company_name`, `summary`, `is_trashed`) VALUES
(101, 'Binary ICT care', 'Binary (Kay Tse album), 2008 Binary (Ani DiFranco album), 2017 Binary (comics), a superheroine in the Marvel Universe Binary (novel), a 1972 novel by Michael Crichton (writing as John Lange) \"Binary\" (song), a 2007 single by Assemblage 23 Binary form, a way of structuring a piece of music Binary, an evil organization in the novel InterWorld Binary (Doctor Who audio)', 'NO'),
(102, 'BITM', '1972 novel by Michael Crichton (writing as John Lange) \"Binary\" (song), a 2007 single by Assemblage 23 Binary form, a way of structuring a piece of music Binary, an evil organization in the novel InterWorld Binary (Doctor Who audio) Binary (Kay Tse album), 2008 Binary (Ani DiFranco album), 2017 Binary (comics), a superheroine in the Marvel Universe Binary (novel', 'NO'),
(103, 'Redmi', 'Redmi (Kay Tse album), 2008 Binary (Ani DiFranco album), 2017 Binary (comics), a superheroine in the Marvel Universe Binary (novel) Binary (Kay Tse album), 2008 Binary (Ani DiFranco album), 2017 Binary (comics), a superheroine in the Marvel Universe Binary (novel', '2017-10-03 23:17:11'),
(104, 'Nokia', 'Nokia Corporation, stylised as NOKIA, is a Finnish multinational communications, information technology and consumer electronics company, founded in 1865. Nokia\'s headquarters are in Espoo, Uusimaa, in the greater Helsinki metropolitan area. Wikipedia', 'NO'),
(106, 'Redmi MI', 'test demo', 'NO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_title`
--
ALTER TABLE `book_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_list`
--
ALTER TABLE `city_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_picture`
--
ALTER TABLE `profile_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summary_of_org`
--
ALTER TABLE `summary_of_org`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `book_title`
--
ALTER TABLE `book_title`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `city_list`
--
ALTER TABLE `city_list`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile_picture`
--
ALTER TABLE `profile_picture`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `summary_of_org`
--
ALTER TABLE `summary_of_org`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
