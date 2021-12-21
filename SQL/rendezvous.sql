-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 11:02 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rendezvous`
--

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `section` varchar(5) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` varchar(5) DEFAULT NULL,
  `isCompleted` int(1) DEFAULT NULL,
  `resultDeclared` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `name`, `section`, `addedOn`, `type`, `isCompleted`, `resultDeclared`) VALUES
(5, 'MASTER PLAN', 'gn', '2021-03-07 01:07:53', 'g', 0, NULL),
(6, 'PPT PRESENTATION', 'gn', '2021-03-07 01:07:53', 'g', 0, NULL),
(7, 'CHANNEL DISCUSSION', 'gn', '2021-03-07 01:07:53', 'g', 0, NULL),
(8, 'KATHA PRASANGAM', 'gn', '2021-03-07 01:07:53', 'g', 0, NULL),
(9, 'MAPPILAPPATTU', 'gn', '2021-03-07 01:07:53', 's', 0, NULL),
(10, 'MADH SONG', 'gn', '2021-03-07 01:07:53', 's', 0, NULL),
(11, 'BURDA', 'gn', '2021-03-07 01:07:53', 'g', NULL, NULL),
(12, 'NASHEEDA', 'gn', '2021-03-07 01:07:53', 'g', NULL, NULL),
(13, 'QAWWALI', 'gn', '2021-03-07 01:07:53', 'g', NULL, NULL),
(14, 'CAMPUS SONG', 'gn', '2021-03-07 01:07:53', 'g', NULL, NULL),
(15, 'NEWS BULLETTIN MAL', 'gn', '2021-03-07 01:07:53', 'g', NULL, NULL),
(16, 'MASALA SHURA', 'gn', '2021-03-07 01:07:53', 'g', NULL, NULL),
(17, 'TRANSILATION DIALOGUE', 'gn', '2021-03-07 01:07:53', 'g', NULL, NULL),
(18, 'SELF TRANSILATION', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(19, 'LIVE TRANSILATION E-M', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(20, 'THAFSEER TALK', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(21, 'VA-ALU ', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(22, 'GLOBAL DARS', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(23, 'SHARIA TALK ENG', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(24, 'SPOT MAGAZINE', 'gn', '2021-03-07 01:07:53', 'g', NULL, NULL),
(25, 'PHOTOGRAPHY', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(26, 'CASE STUDY', 'gn', '2021-03-07 01:07:53', 'g', NULL, NULL),
(27, 'RISALA CREATION', 'gn', '2021-03-07 01:07:53', 'g', NULL, NULL),
(28, 'MUSABAQATHU ALFIYYA', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(29, ' MUSABAQATHU JOUHARTHUTHOUHEED', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(30, 'THAHFEEZ', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(31, ' DIGITAL DESIGNING', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(32, ' VLOGGING', 'gn', '2021-03-07 01:07:53', 'g', NULL, NULL),
(33, 'CHARITHRAKYANAM MAL', 'gn', '2021-03-07 01:07:53', 's', NULL, NULL),
(34, 'THARTHEEL', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(35, 'PUBLIC TALK', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(36, 'ELOCUTION (MAL)', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(37, 'ELOCUTION (ARB)', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(38, 'ELOCUTION (URD)', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(39, 'LIVE EXTEMPORE', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(40, 'ESSAY MAL', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(41, 'ESSAY ARA', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(42, 'ESSAY ENG', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(43, 'ESSAY URD', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(44, 'POEM MAL', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(45, 'POEM ENG', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(46, 'POEM ARB', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(47, 'POEM URD', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(48, 'STORY MAL', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(49, 'STORY ENG', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(50, 'STORY ARA', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(51, 'STORY URD', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(52, 'TRANS A-E', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(53, 'TRANS M-E', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(54, 'TRANS E-U', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(55, 'LECTURING', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(56, 'QUIZ', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(57, 'CALLIGRAPHY', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(58, 'KITHABIC QUIZ', 'sr', '2021-03-07 01:07:53', 'g', NULL, NULL),
(59, 'CARTOON SCAPE', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(60, 'PHILOSOPHICAL SLICE', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(61, 'BOOK TEST', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(62, 'RESEARCH PAPER', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(63, 'MADH SONG WRITING', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(64, 'CAPTION WRITING', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(65, 'SUDOKU', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(66, 'CHESS', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(67, 'SHOT PUT', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(68, 'TUG OF WAR', 'sr', '2021-03-07 01:07:53', 'g', 1, NULL),
(69, 'TWEETING', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(70, 'SOP WRITING', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(71, 'BLURB WRITING', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(72, 'IBARATH WRITING', 'sr', '2021-03-07 01:07:53', 's', NULL, NULL),
(73, 'THARTHEEL', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(74, 'PUBLIC TALK', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(75, 'ELOCUTION (MAL)', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(76, 'ELOCUTION (ARB)', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(77, 'ELOCUTION (URD)', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(78, 'LIVE EXTEMPORE', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(79, 'ESSAY MAL', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(80, 'ESSAY ARA', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(81, 'ESSAY ENG', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(82, 'ESSAY URD', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(83, 'POEM MAL', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(84, 'POEM ENG', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(85, 'POEM ARB', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(86, 'POEM URD', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(87, 'STORY MAL', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(88, 'STORY ENG', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(89, 'STORY ARA', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(90, 'STORY URD', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(91, 'TRANS M-E', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(92, 'TRANS A-E', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(93, 'TRANS E-U', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(94, 'IBARAT WRITING', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(95, 'QUIZ', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(96, 'CALLIGRAPHY', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(97, 'KITHABIC QUIZ', 'jr', '2021-03-07 01:07:53', 'g', NULL, NULL),
(98, 'CARTOON SCAPE', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(99, 'PHILOSOPHICAL SLICE', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(100, 'BOOK TEST', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(101, 'RESEARCH PAPER', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(102, 'MADH SONG WRITING', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(103, 'CAPTION WRITING', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(104, 'SUDOKU', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(105, 'CHESS', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(106, 'SHOT PUT', 'jr', '2021-03-07 01:07:53', 's', NULL, NULL),
(107, 'TUG OF WAR', 'jr', '2021-03-07 01:07:53', 'g', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programlist`
--

CREATE TABLE `programlist` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `programid` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `rank` int(1) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `groupId` varchar(10) DEFAULT NULL,
  `point` int(5) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programlist`
--

INSERT INTO `programlist` (`id`, `studentid`, `programid`, `grade`, `rank`, `addedOn`, `groupId`, `point`, `type`) VALUES
(58, 43, 10, 'A', 2, '2021-12-21 09:54:34', 'cc', 8, 's'),
(59, 72, 10, '', 0, '2021-12-21 09:54:40', 'cc', NULL, 's'),
(60, 71, 10, 'A', 2, '2021-12-21 09:54:43', 'cc', 8, 's'),
(61, 88, 10, 'B', 2, '2021-12-21 09:54:46', 'cc', 6, 's'),
(62, 124, 10, 'APLUS', 1, '2021-12-21 09:54:49', 'ag', 11, 's');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `level` int(5) NOT NULL,
  `team1` int(11) NOT NULL,
  `team2` int(11) NOT NULL,
  `team3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `campus` varchar(10) NOT NULL,
  `team` varchar(10) NOT NULL,
  `chest` int(5) NOT NULL,
  `section` varchar(5) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `point` int(11) NOT NULL,
  `floor` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `code`, `point`, `floor`) VALUES
(1, 'Anatolian Gazhis', 'ag', 0, 1),
(2, 'Caucasian Cavalries', 'cc', 0, 2),
(3, 'Iberian Mariners', 'ib', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programlist`
--
ALTER TABLE `programlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `programlist`
--
ALTER TABLE `programlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
