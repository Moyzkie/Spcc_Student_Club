-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 12:14 PM
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
-- Database: `club`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `profile`) VALUES
(6, 'Ricky Amante', 'moyzkies', '12345', 'IMG20210119112610.jpg'),
(7, 'Christian Rubiato', 'Christian04', '12345', 'Teacher3.jpg'),
(8, '', '', '', ''),
(9, '', '', '', ''),
(10, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `slide1` varchar(50) NOT NULL,
  `slide2` varchar(50) NOT NULL,
  `slide3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `slide1`, `slide2`, `slide3`) VALUES
(1, 'maxresdefault.jpg', 'slide2.jpg', 'slide3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `club_event`
--

CREATE TABLE `club_event` (
  `id` int(11) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club_event`
--

INSERT INTO `club_event` (`id`, `club_name`, `event_name`, `description`, `image`) VALUES
(1, 'ML Gaming', 'turnament', 'ererr', '1.PNG'),
(2, 'ML Gaming', 'turnament', 'err', '2.PNG'),
(3, 'Math club', 'turnament', '', ''),
(4, 'music club', 'turnament', 'eee', '2021-04-21 19-48-51.mp4'),
(5, 'music club', 'battle of brain', 'fdf', '2021-04-23 16-12-35.mp4'),
(6, 'Database Club', 'battle of brain', 'Before we learn about a database, let us understand -\r\nWhat is Data?\r\nIn simple words, data can be facts related to any object in consideration. For example, your name, age, height, weight, etc. are some data related to you. A picture, image, file, pdf,', '123138493_105818304669021_1977863383417118459_n.png'),
(7, 'music club', 'fdgrg', ' wewewe', 'kan.mp4'),
(8, 'Database Club', 'sql competation', 'Let us discuss a database example: An online telephone directory uses a database to store data of people, phone numbers, and other contact details. Your electricity service provider uses a database to manage billing, client-related issues, handle fault da', 'main-qimg-ab4d4b12d42e4b47ba3d3d8ccbf0eba0.png'),
(9, 'Database Club', 'turnament', 'Before we learn about a database, let us understand -\r\nWhat is Data?\r\nIn simple words, data can be facts related to any object in consideration. For example, your name, age, height, weight, etc. are some data related to you. A picture, image, file, pdf,', 'coding.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `club_lessons`
--

CREATE TABLE `club_lessons` (
  `id` int(11) NOT NULL,
  `club_name` varchar(50) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `discusion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club_lessons`
--

INSERT INTO `club_lessons` (`id`, `club_name`, `topic`, `description`, `discusion`) VALUES
(1, 'music club', 'trrtrtrtr', 'trtrtttrt', 'change oil.mp4'),
(2, 'music club', 'helool', 'wesd', '2021-04-23 16-12-35_Trim_Trim.mp4'),
(3, 'music club', 'helool', 'tuyuyutuyuuy', 'change oil.mp4'),
(7, 'Math club', 'hirrerer', 'rererer', 'Programming Expectations vs Reality_Trim.mp4'),
(8, 'Database Club', 'insert data', 'eryyytyy', '2021-04-26 20-42-20.mp4'),
(9, 'Database Club', 'helool', 'tfyg', 'kan.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `club_list`
--

CREATE TABLE `club_list` (
  `id` int(11) NOT NULL,
  `club_name` varchar(100) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `club_banner` varchar(100) NOT NULL,
  `teacher_profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club_list`
--

INSERT INTO `club_list` (`id`, `club_name`, `teacher_name`, `club_banner`, `teacher_profile`) VALUES
(179, 'English Club', 'Jeahren Rosales', '421929_155816664573707_439650535_n.jpg', 'Teacher8.jpg'),
(180, 'programming ', 'Rammeses Dela Cruz', 'coding.jpg', 'Teacher6.jpg'),
(181, 'photoshop club', 'Ronal Adel', '12644751_10153919245549308_7869932933374493555_n.jpg', 'Teacher7.jpg'),
(182, 'Art Club', 'Rochell Teves', 'Art Club.jpg', 'Teacher5.jpg'),
(183, 'anime club', 'Reymond Duenas', '123138493_105818304669021_1977863383417118459_n.png', 'Teacher10.jpg'),
(184, 'Database Club', 'Christian Rubiato', 'Database club.jpg', 'Teacher3.jpg'),
(193, 'Math club', 'Angelito Derama', 'Math club.jpg', 'Teacher4.jpg'),
(195, 'ML Gaming', 'Dexter Antigua', 'ml.jpg', 'Teacher7.jpg'),
(196, 'music club', 'Jhonell Garchitorena', 'Guitar Club.jpg', 'Teacher1.jpg'),
(197, 'pscology club', 'Jullie Reyna Flores', 'Guitar Club.jpg', 'Teacher9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `club_works`
--

CREATE TABLE `club_works` (
  `id` int(11) NOT NULL,
  `club_name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club_works`
--

INSERT INTO `club_works` (`id`, `club_name`, `description`, `image`, `video`) VALUES
(38, 'photoshop club', 'bastano', 'Teacher7.jpg', '2021-04-21 19-48-51.mp4'),
(39, 'Computer', 'open docx', 'Teacher8.jpg', '2021-04-20 19-54-13.mp4'),
(43, 'Math club', 'addtwo numbers', '12644751_10153919245549308_7869932933374493555_n.jpg', '2021-04-20 19-59-36.mp4'),
(44, 'Math club', 'ralationship', 'Teacher6.jpg', '2021-04-21 19-48-51.mp4'),
(45, 'gaming club', 'counter attack strategy', 'e1.PNG', '2021-04-23 16-12-35_Trim_Trim.mp4'),
(47, 'Art Club', 'basic drawing', 'Guitar Club.jpg', '2021-04-20 19-59-36.mp4'),
(55, 'ML Gaming', 'tggf', '1.PNG', 'change oil.mp4'),
(56, 'ML Gaming', 'h', '', ''),
(59, 'music club', 'tyt', '1.PNG', 'change oil.mp4'),
(62, 'Database Club', 'hello ate mitch', '138622256_424412319008155_6181849911142112618_n.jpg', '2021-04-23 16-12-35_Trim_Trim.mp4'),
(63, 'Database Club', 'Before we learn about a database, let us understand -\r\nWhat is Data?\r\nIn simple words, data can be facts related to any object in consideration. For example, your name, age, height, weight, etc. are some data related to you. A picture, image, file, pdf,', 'main-qimg-ab4d4b12d42e4b47ba3d3d8ccbf0eba0.png', 'kan.mp4'),
(64, 'Database Club', 'Before we learn about a database, let us understand -\r\nWhat is Data?\r\nIn simple words, data can be facts related to any object in consideration. For example, your name, age, height, weight, etc. are some data related to you. A picture, image, file, pdf,', 'Computer.jpg', '2021-05-11 21-05-52.mp4'),
(65, 'Database Club', '6', '123138493_105818304669021_1977863383417118459_n.png', 'kan.mp4'),
(66, 'programming ', 'add two number ', 'coding.jpg', '2021-04-15 15-21-04.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `Student_Number` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Code` mediumint(50) NOT NULL,
  `Status` text NOT NULL,
  `Club` varchar(50) NOT NULL,
  `Attempt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`Student_Number`, `FullName`, `UserName`, `Email`, `Password`, `Code`, `Status`, `Club`, `Attempt`) VALUES
(123, 'Yuan rodriguez', 'Yuan', 'michellerodriguez092787@gmail.com', '$2y$10$.lT1fFC4QERojYlKtD3Fpe0snKRWowwibXFhU0Mm0yC32w04i/WAm', 0, 'verified', 'Database Club', 0),
(41930910, 'Froilan Castillo', 'Castillo09', 'Castillo09@gmail.com', '$2y$10$iiYqJ6sjURE9hoXqIE1yTOg065X6HXJBP7Hw/wxk4QJUu4fu5fngm', 0, 'verified', 'Database Club', 2),
(41930911, 'Froilan Castilo2', 'froi', 'froilan.castillo29@gmail.com', '$2y$10$qf0UAoDajgYcNYrT8S5gUOjXcwl/Wa.FqTVIWxdlrUvwYKF.CVxSK', 0, 'verified', 'programming', 2),
(41930915, 'Jemilie Irysh Joy Alban', 'Irysh09', 'Irysh09@gmail.com', '$2y$10$hU5LCdSNlbBHLIWUhYEapuOkg2YQX29U3IFXJrcrlSUehOkwFtRP6', 0, 'verified', 'Computer', 3),
(41930916, 'Christian Sagusay G', ' Sagusay09', 'Sagusay09@gmail.com', '$2y$10$W.jsIkxbT19312kEqyk/GeSN6UYejx0bYQTdeesWgumq27cg7C5o2', 0, 'verified', 'Guitar Club', 3),
(41930928, 'Jhovince Co', 'jhovince09', 'jhovince09@gmail.com', '$2y$10$0TjoynJ90ukcorFWGF/5u.wNTn3cAO1QDflvBxC1R6b8BiL.zrq5K', 0, 'verified', 'ML Gaming', 2),
(41930929, 'Glen Van Senillio', 'Senillio09', 'Senillio@gmail.com', '$2y$10$B10HApduKcS4BQoEAz8X8.2QnX69iE52eSoJSMZTE6AHVScYS2HW2', 0, 'verified', 'gaming club', 2),
(41930930, 'Aries Cabansag', 'cabansag09', 'cabansag09@gmail.com', '$2y$10$LnvCkP2Zc41SluJlUGtvEuq4xDcjJ3ofuCKwuv6uNgtWTUwbxQYo6', 0, 'verified', 'Guitar Club', 3),
(41930931, 'Rommel Ebarola', 'Ebarola09', 'Ebarola09@gmail.com', '$2y$10$xTgUHBNMnVBxAnlAaJpJIegcei0pDy6BB9fsFRr4Mqmec1Tz.p07K', 0, 'verified', 'Computer', 3),
(41930953, 'Harold Chris Austria T', 'austria09', 'austria09@gmail.com', '$2y$10$Y9v/iwu8Qg93PxVSOmLYhO.MllGFck3F37QhqLhIIubCMGwAEsaUy', 0, 'verified', 'Art Club', 3),
(41930962, 'Ricky Amante', 'moyzkies', 'rockyelicana@gmail.com', '$2y$10$GYL3Hde/27g6hrtd.X8QnuFjs0n.3wPo.fEuMqhYAvRYsmD31gP6O', 0, 'verified', 'programming', 0),
(41930963, 'Rommel ebarola', 'romel', 'amante_ricky@spcc.edu.ph', '$2y$10$PAxqnUZaKpo8FrpLsdEzm.Oec.jpcPjVVddEUcVxXFi0fX2WFwPia', 0, 'verified', 'Art Club', 3),
(41930978, 'arnel esperitu', 'arnel', 'mrick0092@gmail.com', '$2y$10$80P8.NKlGAI7bB1h9TT4CeyVejtu8N3eF6G8mJruigILapWVLVpEK', 0, 'verified', 'Computer Club', 3),
(41931007, 'Erica Mae Daino', 'Erica09', 'Erica09@gmail.com', '$2y$10$EW073SLct0PnepHu6288pOZEeq1pTxcnJdH5tEdHVV/hlf/6iIT/i', 0, 'verified', 'gaming club', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_info`
--

CREATE TABLE `teachers_info` (
  `id` int(11) NOT NULL COMMENT '123',
  `teachers_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `club` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers_info`
--

INSERT INTO `teachers_info` (`id`, `teachers_id`, `fullname`, `gender`, `username`, `email`, `password`, `profile`, `club`) VALUES
(13, 41930902, 'Christian Rubiato', 'Maled', 'Christian04', 'ChristianRubiato@spcc.edu.ph', '12345', 'Teacher3.jpg', 'Database Club'),
(15, 41930903, 'Jhonell Garchitorena', 'Male', 'Garchitorena06', 'JhonellGarchitorena@spcc.edu.ph', '12345', 'Teacher1.jpg', 'music club'),
(16, 412453, 'Jeahren Rosales', 'Female', 'Rosales05', 'JeahrenRosales@spcc.edu.ph', '12345', 'Teacher8.jpg', 'English Club'),
(17, 41930904, 'Reymond Duenas', 'Male', ' Duenas05', 'ReymondDuenas@spcc.edu.ph', '12345', 'Teacher10.jpg', 'anime club'),
(18, 4673485, 'Rammeses Dela Cruz', 'Male', 'LanceParker', 'LanceParker@gmail.com', '12345', 'Teacher6.jpg', 'programming '),
(19, 4233746, 'Ronal Adel', 'Male', 'Adel09', 'RonalAdel@spcc.edu.ph', '12345', 'Teacher7.jpg', 'photoshop club'),
(20, 4483437, 'Jullie Reyna Flores', 'Female', 'REyna223', 'Flores@spcc.edu.ph', '12345', 'Teacher9.jpg', 'pscology club'),
(21, 4457736, 'Dexter Antigua', 'Male', 'Dexter96', 'DexterAntigua@spcc.deu.ph', '12345', 'Teacher7.jpg', 'ML Gaming'),
(22, 4567373, 'Alfred Custodio', 'Male', 'Alfred65', 'AlfredCustodio@spcc.edu.ph', '12345', 'Teacher4.jpg', ''),
(23, 4244838, 'Rochell Teves', 'female', ' Teves34', 'RochellTeves@spcc.edu.ph', '12345', 'Teacher5.jpg', 'Art Club'),
(25, 418344, 'Angelito Derama', 'Male', 'Derama09', 'derama@spcc.edu.ph', '12345', 'Teacher4.jpg', 'Math club');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_event`
--
ALTER TABLE `club_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_lessons`
--
ALTER TABLE `club_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_list`
--
ALTER TABLE `club_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_works`
--
ALTER TABLE `club_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Student_Number`);

--
-- Indexes for table `teachers_info`
--
ALTER TABLE `teachers_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `club_event`
--
ALTER TABLE `club_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `club_lessons`
--
ALTER TABLE `club_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `club_list`
--
ALTER TABLE `club_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `club_works`
--
ALTER TABLE `club_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `Student_Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `teachers_info`
--
ALTER TABLE `teachers_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '123', AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
