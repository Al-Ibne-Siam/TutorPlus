-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 11:45 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_email` varchar(30) NOT NULL,
  `institution` varchar(30) DEFAULT NULL,
  `background` enum('Science','Commerce','Arts') DEFAULT NULL,
  `curriculum` enum('English Medium','Bangla Medium') DEFAULT NULL,
  `more_info` varchar(150) DEFAULT NULL,
  `min_fees` smallint(5) DEFAULT NULL,
  `max_fees` smallint(5) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_email`, `institution`, `background`, `curriculum`, `more_info`, `min_fees`, `max_fees`, `location`) VALUES
('donut@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('fasbir@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('sam@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_shortlist`
--

CREATE TABLE `student_shortlist` (
  `tutor_email` varchar(30) NOT NULL,
  `student_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_shortlist`
--

INSERT INTO `student_shortlist` (`tutor_email`, `student_email`) VALUES
('siam@gmail.com', 'donut@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `user_email` varchar(30) NOT NULL,
  `curriculum` enum('English Medium','Bangla Medium') DEFAULT NULL,
  `background` enum('Science','Commerce','Arts') DEFAULT NULL,
  `about_me` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`user_email`, `curriculum`, `background`, `about_me`) VALUES
('siam@gmail.com', 'English Medium', 'Science', 'I have changed my school. Yay');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_shortlist`
--

CREATE TABLE `tutor_shortlist` (
  `tutor_email` varchar(30) NOT NULL,
  `student_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutor_shortlist`
--

INSERT INTO `tutor_shortlist` (`tutor_email`, `student_email`) VALUES
('siam@gmail.com', 'donut@gmail.com');

--
-- Triggers `tutor_shortlist`
--
DELIMITER $$
CREATE TRIGGER `before_tutor_shortlist_delete` BEFORE DELETE ON `tutor_shortlist` FOR EACH ROW BEGIN
Delete from student_shortlist
where tutor_email = old.tutor_email and student_email = old.student_email;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `password` char(40) DEFAULT NULL,
  `pnum` varchar(11) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `fname`, `lname`, `password`, `pnum`, `gender`) VALUES
('donut@gmail.com', 'donut', 'media', '3da541559918a808c2402bba5012f6c60b27661c', '01990188461', 'Male'),
('fasbir@gmail.com', 'fasbir', 'hossain', '3da541559918a808c2402bba5012f6c60b27661c', '01990188461', 'Male'),
('sam@gmail.com', 'siam', 'sam', '3da541559918a808c2402bba5012f6c60b27661c', '01990188461', 'Male'),
('siam@gmail.com', 'siam', 'ibne', '3da541559918a808c2402bba5012f6c60b27661c', '01990188461', 'Male');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `before_user_delete` BEFORE DELETE ON `user` FOR EACH ROW BEGIN 
Delete from student_shortlist
where tutor_email = old.email or student_email = old.email;
Delete from tutor_shortlist
where tutor_email = old.email or student_email = old.email;
DELETE from tutor
where user_email = old.email;
Delete from student
where user_email = old.email;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_email`);

--
-- Indexes for table `student_shortlist`
--
ALTER TABLE `student_shortlist`
  ADD PRIMARY KEY (`tutor_email`,`student_email`),
  ADD KEY `fk_tutor_has_student_student2_idx` (`student_email`),
  ADD KEY `fk_tutor_has_student_tutor2_idx` (`tutor_email`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`user_email`);

--
-- Indexes for table `tutor_shortlist`
--
ALTER TABLE `tutor_shortlist`
  ADD PRIMARY KEY (`tutor_email`,`student_email`),
  ADD KEY `fk_tutor_has_student_student1_idx` (`student_email`),
  ADD KEY `fk_tutor_has_student_tutor1_idx` (`tutor_email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_shortlist`
--
ALTER TABLE `student_shortlist`
  ADD CONSTRAINT `fk_tutor_has_student_student2` FOREIGN KEY (`student_email`) REFERENCES `student` (`user_email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tutor_has_student_tutor2` FOREIGN KEY (`tutor_email`) REFERENCES `tutor` (`user_email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `fk_tutor_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tutor_shortlist`
--
ALTER TABLE `tutor_shortlist`
  ADD CONSTRAINT `fk_tutor_has_student_student1` FOREIGN KEY (`student_email`) REFERENCES `student` (`user_email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tutor_has_student_tutor1` FOREIGN KEY (`tutor_email`) REFERENCES `tutor` (`user_email`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
