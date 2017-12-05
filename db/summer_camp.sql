-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2017 at 02:49 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `summer_camp`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activityID` int(11) NOT NULL,
  `a_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `a_date` datetime DEFAULT NULL,
  `location` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activityID`, `a_name`, `description`, `price`, `min_age`, `a_date`, `location`, `image`) VALUES
(1, 'Basketball', 'Basketball tournament', 10, 10, '2017-11-23 00:00:00', '2317 E. WT Harris Charlotte NC 28213', 'images/bball.jpg'),
(2, 'Swimming', 'Campers will have the opportunity to swim and learn how to swim from our life guards on duty.', 5, 8, '2017-11-22 00:00:00', '450 Sharon Amity Rd. 28211', 'images/Camp swimming.jpg'),
(3, 'Kayaking', 'Campers are taught the basics of Kayaking with an interactive tutorial included.', 15, 12, '2017-11-22 00:00:00', '16358 Jetton Rd Cornelius, NC 28031', 'images/kayaking.jpg'),
(4, 'Arts and Crafts', 'Campers will make their own take home projects using Forty Niner themed art materials', 5, 12, '2017-11-22 00:00:00', '1236 Old Statesville Rd. Charlotte,NC 28269', 'images/summer cap arts and crafts.jpg'),
(5, 'White Water Rafting', 'Campers are taken on an exhilarating experience through the rocky and rugged FortyNiner Falls.', 20, 12, '2017-11-22 00:00:00', '16358 Jetton Rd Cornelius, NC 28031', 'images/white water rafting.jpg'),
(6, 'Football', 'Campers form teams of 8 and compete in a tournament of flag football. Winner receives a trophy.', 5, 10, '2017-11-22 00:00:00', '1967 Patriot Dr. Charlotte, NC 28227', 'images/camp football.jpg'),
(7, 'Volleyball', 'Campers will learn the fundamentals of Volleyball', 10, 10, '2017-11-22 00:00:00', '1967 Patriot Dr. 28227 Charlotte, NC', 'images/camp volleyball.jpg'),
(8, 'Dodge Ball', 'Campers form teams of 7 to compete against each other in a friendly game of dodge ball ', 5, 10, '2017-11-22 00:00:00', '2317 E. WT Harris Charlotte NC 28213', 'images/Camp Dodgeball.jpg'),
(9, 'Water Balloon Event', 'Water Guns and Summer Fun everyone willing to get wet is welcomed to attend.', 1, 10, '2017-11-22 00:00:00', '1967 Patriot Dr. Charlotte, NC 28227', 'images/Water balloon event.jpg'),
(10, 'Doughnut Eating Contest', 'Campers will get a chance to compete in a Doughnut eating contest. Whoever eats the most doughnuts wins.', 5, 10, '2017-11-22 00:00:00', '1236 Old Statesville Rd. Charlotte,NC 28269', 'images/doughnut eating contest.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `reg_activities`
--

CREATE TABLE `reg_activities` (
  `regID` int(11) NOT NULL,
  `actID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_activities`
--

INSERT INTO `reg_activities` (`regID`, `actID`, `userID`, `timestamp`) VALUES
(105, 1, 5, '2017-12-01 01:18:51'),
(111, 4, 5, '2017-12-01 01:19:49'),
(112, 10, 5, '2017-12-01 01:19:53'),
(113, 5, 5, '2017-12-01 01:21:00'),
(115, 1, 19, '2017-12-02 02:19:25'),
(116, 1, 19, '2017-12-02 02:21:30'),
(117, 1, 19, '2017-12-02 02:21:48'),
(118, 1, 19, '2017-12-02 02:22:10'),
(119, 1, 19, '2017-12-02 02:22:42'),
(120, 1, 19, '2017-12-02 02:23:32'),
(121, 1, 19, '2017-12-02 02:24:16'),
(122, 1, 19, '2017-12-02 02:25:11'),
(123, 1, 19, '2017-12-02 02:25:21'),
(124, 1, 19, '2017-12-02 02:26:28'),
(125, 1, 19, '2017-12-02 02:31:19'),
(126, 1, 19, '2017-12-02 02:31:33'),
(128, 1, 19, '2017-12-02 02:34:15'),
(129, 1, 19, '2017-12-02 02:36:07'),
(130, 1, 19, '2017-12-02 02:38:50'),
(131, 1, 19, '2017-12-02 02:59:47'),
(132, 1, 19, '2017-12-02 04:05:31'),
(136, 10, 19, '2017-12-02 04:11:50'),
(137, 1, 3, '2017-12-02 04:19:17'),
(138, 10, 3, '2017-12-02 04:19:34'),
(162, 3, 2, '2017-12-04 09:04:56'),
(163, 2, 2, '2017-12-04 09:04:58'),
(164, 3, 1, '2017-12-04 11:32:41'),
(166, 5, 2, '2017-12-04 23:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `member_since` varchar(20) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `f_name`, `l_name`, `password`, `email`, `phone`, `age`, `member_since`, `image`, `isAdmin`) VALUES
(1, 'admin', 'fadmin', 'ladmin', '123', 'admin@admin.com', 1234567890, 36, '0000-00-00', 'images/email.png', 1),
(2, 'user', 'qsfasdfsd', 'asdf', '123', 'user@user.com', 123123, 1234, '0000-00-00', 'img/1289786949038.png', 0),
(3, 'moh', 'Mohamed', 'Eltanani', '123', 'moeltanani@hotmail.com', 704252447, 52, '0000-00-00', NULL, 0),
(5, 'wowo', 'aleck', 'good', '123', 'mdoh@hotmail.com', 666, 33, '0000-00-00', NULL, 0),
(15, 'k', 'Khalid', 'Hijazi', '123', 'moeltanani@hot3mail.com', 7773737, 33, '', NULL, 0),
(18, '88', '88', '88', '88', '88@h.com', 88, 88, '', NULL, 0),
(19, 'kk', 'kk', 'kk', 'kk', 'moeltanani@hotmail.com', 777, 34, 'Dec/02/17', NULL, 0),
(31, 'test', 'test', 'test', '123', 'asdfaf3@gmail.com', 123, 1234, 'Dec/04/17', 'img/535106-user_512x512.png', 0),
(34, 'tester', 'tester', 'tester', 'tester', 'tester@test.com', 123123, 21, 'Dec/05/17', 'img/default.png', 0),
(35, 'testerasdf', 'tester', 'testser', '123', 'asdfkajsdlfkj@gmail.com', 123, 123, 'Dec/05/17', 'img/default.png', 0),
(36, 'yas', 'yaseen', 'ek', '123', 'moh@hhh.com', 66364663, 122, 'Dec/05/17', 'img/default.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activityID`);

--
-- Indexes for table `reg_activities`
--
ALTER TABLE `reg_activities`
  ADD PRIMARY KEY (`regID`),
  ADD KEY `actID` (`actID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `reg_activities`
--
ALTER TABLE `reg_activities`
  MODIFY `regID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reg_activities`
--
ALTER TABLE `reg_activities`
  ADD CONSTRAINT `actID` FOREIGN KEY (`actID`) REFERENCES `activities` (`activityID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
