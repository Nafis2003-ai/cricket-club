-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2025 at 04:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricket`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` varchar(25) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `coach_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`, `start_date`, `end_date`, `coach_id`) VALUES
(5, 'sher-e-bangla', '2024-11-13', '2024-12-14', 5),
(6, 'sher-e-bangla', '2024-11-13', '2024-12-14', 5);

-- --------------------------------------------------------

--
-- Table structure for table `batsman`
--

CREATE TABLE `batsman` (
  `player_id` int(11) DEFAULT NULL,
  `average_score` int(11) DEFAULT NULL,
  `strike_rate` int(11) DEFAULT NULL,
  `total_run` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batsman`
--

INSERT INTO `batsman` (`player_id`, `average_score`, `strike_rate`, `total_run`) VALUES
(6, 20, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bowler`
--

CREATE TABLE `bowler` (
  `player_id` int(11) DEFAULT NULL,
  `total_wicket` int(11) NOT NULL,
  `bowling_average` int(11) DEFAULT NULL,
  `economic_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bowler`
--

INSERT INTO `bowler` (`player_id`, `total_wicket`, `bowling_average`, `economic_rate`) VALUES
(NULL, 4, 4, 4),
(4, 4, 6, 4),
(5, 4, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(25) DEFAULT NULL,
  `location` varchar(25) DEFAULT NULL,
  `established_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`club_id`, `club_name`, `location`, `established_date`) VALUES
(1, 'bashundhara kings', 'dhaka', '2024-11-12'),
(6, 'Abahoni', 'dhaka', '1995-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `coach_id` int(11) NOT NULL,
  `coach_name` varchar(25) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`coach_id`, `coach_name`, `DOB`, `mobile`, `club_id`) VALUES
(4, 'Hathure singh', '2024-11-21', 184937873, 1),
(5, 'Hathure singh', '2024-11-01', 138273493, 1),
(6, 'Hathure singh', '2024-11-01', 138273493, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ground_booking`
--

CREATE TABLE `ground_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` varchar(25) DEFAULT NULL,
  `duration` varchar(25) DEFAULT NULL,
  `venue_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ground_booking`
--

INSERT INTO `ground_booking` (`booking_id`, `booking_date`, `booking_time`, `duration`, `venue_id`) VALUES
(1, '2024-12-03', '18:12', '3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `head_coach`
--

CREATE TABLE `head_coach` (
  `coach_id` int(11) DEFAULT NULL,
  `head_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `manager_name` varchar(25) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `manager_name`, `contact`, `join_date`, `club_id`) VALUES
(2, 'hafiz', 1702324353, '2024-11-22', 1),
(3, 'hafiz', 1702324353, '2024-11-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `match_score`
--

CREATE TABLE `match_score` (
  `match_id` int(11) NOT NULL,
  `home_id` int(11) NOT NULL,
  `away_id` int(11) NOT NULL,
  `home_score` int(11) DEFAULT NULL,
  `away_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `match_score`
--

INSERT INTO `match_score` (`match_id`, `home_id`, `away_id`, `home_score`, `away_score`) VALUES
(3, 1, 6, 82, 32),
(4, 1, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(25) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mtch`
--

CREATE TABLE `mtch` (
  `match_id` int(11) NOT NULL,
  `match_date` date DEFAULT NULL,
  `match_time` varchar(10) DEFAULT NULL,
  `home_club` int(25) DEFAULT NULL,
  `away_club` int(11) DEFAULT NULL,
  `venue_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mtch`
--

INSERT INTO `mtch` (`match_id`, `match_date`, `match_time`, `home_club`, `away_club`, `venue_id`) VALUES
(3, '2024-11-28', '15:19', 1, 6, NULL),
(4, '2024-11-28', '15:19', 1, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `description` varchar(70) DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `description`, `posted_date`, `expiration_date`, `club_id`) VALUES
(1, 'The inter club tournament going to start soon', '2024-11-29', '2024-12-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `player_id` int(11) NOT NULL,
  `player_name` varchar(25) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `match_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`player_id`, `player_name`, `DOB`, `mobile`, `match_id`) VALUES
(4, 'nafis', '2024-11-21', 85948, NULL),
(5, 'nafis', '2024-11-21', 85948, NULL),
(6, 'rafid hasan', '2004-06-15', 19876543, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `player_statistics`
--

CREATE TABLE `player_statistics` (
  `stat_id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `matches_played` int(11) DEFAULT NULL,
  `avg_run` int(11) DEFAULT NULL,
  `avg_wicket` int(11) DEFAULT NULL,
  `strike_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player_statistics`
--

INSERT INTO `player_statistics` (`stat_id`, `player_id`, `matches_played`, `avg_run`, `avg_wicket`, `strike_rate`) VALUES
(3, 4, 43, 54, 34, 0),
(4, 5, 43, 54, 34, 0),
(5, 6, 10, 20, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `plays`
--

CREATE TABLE `plays` (
  `player_id` int(11) DEFAULT NULL,
  `match_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `sponsor_id` int(11) NOT NULL,
  `sponsor_name` varchar(25) DEFAULT NULL,
  `contact_info` varchar(25) DEFAULT NULL,
  `sponsorship_detail` varchar(75) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `sponsor_name`, `contact_info`, `sponsorship_detail`, `club_id`) VALUES
(2, 'pran', '01702324353', 'Drinks Partner', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `reg_date`) VALUES
(3, 'nuzha', '$2y$10$7CPiI5QPF7Gf1/KafC.q.eS3rt3zi/2cIU/AGf1TqSJpOdvIjAbUS', '2024-11-20 01:37:13'),
(4, 'nafiskarim', '$2y$10$m9pdGA9lIYUMnji6QoHCjONiVC2Lb6IqJPQb6gHbIm87RGbHI1rQG', '2024-11-20 01:44:03'),
(5, 'nafiskarim', '$2y$10$ZDso8vjT5Xj9niXZSjY59uSB/nOo8GRKVKcLxepykv5BC8tmJS5.a', '2024-11-20 01:45:17'),
(6, 'nuzhakar', '$2y$10$9XvY/0cCLRRnMnVU3He5TeRCLC8RNiPU/fQuy1j5T8JKfV2/Plh6G', '2024-11-20 01:45:45'),
(7, 'nuzhakar', '$2y$10$t6WxFY9cRhXzIsVpM0MUEeHgZ7t0h/kfdLwcRzfkss9YFv./EsmUm', '2024-11-20 01:47:11'),
(8, 'hati', '$2y$10$TsV49lgjTMWNtejf1VLkj.MTl2vSgZZ4mKHFEunUzkCSEfb1Tz9l.', '2024-11-20 01:47:44'),
(9, 'nafiss', '$2y$10$lcngdDOS708nvjBHScmkfen1HVWzJhEhmhXc/ZRzb/dPkTebMC/CW', '2025-09-01 04:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `location` varchar(25) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `contact_info` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `name`, `location`, `capacity`, `contact_info`) VALUES
(4, 'shahjalal Stadium', 'dhaka', 20000, 1605843483),
(8, 'sher-e-bangla', 'dhaka', 100000, 19876787);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Indexes for table `batsman`
--
ALTER TABLE `batsman`
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `bowler`
--
ALTER TABLE `bowler`
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`coach_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `ground_booking`
--
ALTER TABLE `ground_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `venue_id` (`venue_id`);

--
-- Indexes for table `head_coach`
--
ALTER TABLE `head_coach`
  ADD PRIMARY KEY (`head_id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `match_score`
--
ALTER TABLE `match_score`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `mtch`
--
ALTER TABLE `mtch`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `mtch_ibfk_1` (`home_club`),
  ADD KEY `away_club` (`away_club`),
  ADD KEY `venue_id` (`venue_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`player_id`),
  ADD KEY `match_id` (`match_id`);

--
-- Indexes for table `player_statistics`
--
ALTER TABLE `player_statistics`
  ADD PRIMARY KEY (`stat_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `plays`
--
ALTER TABLE `plays`
  ADD KEY `player_id` (`player_id`),
  ADD KEY `match_id` (`match_id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sponsor_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ground_booking`
--
ALTER TABLE `ground_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `head_coach`
--
ALTER TABLE `head_coach`
  MODIFY `head_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mtch`
--
ALTER TABLE `mtch`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `player_statistics`
--
ALTER TABLE `player_statistics`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`coach_id`);

--
-- Constraints for table `batsman`
--
ALTER TABLE `batsman`
  ADD CONSTRAINT `batsman_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`);

--
-- Constraints for table `bowler`
--
ALTER TABLE `bowler`
  ADD CONSTRAINT `bowler_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`);

--
-- Constraints for table `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- Constraints for table `ground_booking`
--
ALTER TABLE `ground_booking`
  ADD CONSTRAINT `ground_booking_ibfk_1` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`);

--
-- Constraints for table `head_coach`
--
ALTER TABLE `head_coach`
  ADD CONSTRAINT `head_coach_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`coach_id`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- Constraints for table `match_score`
--
ALTER TABLE `match_score`
  ADD CONSTRAINT `match_score_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `mtch` (`match_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- Constraints for table `mtch`
--
ALTER TABLE `mtch`
  ADD CONSTRAINT `mtch_ibfk_1` FOREIGN KEY (`home_club`) REFERENCES `club` (`club_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mtch_ibfk_2` FOREIGN KEY (`away_club`) REFERENCES `club` (`club_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mtch_ibfk_3` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`venue_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `mtch` (`match_id`);

--
-- Constraints for table `player_statistics`
--
ALTER TABLE `player_statistics`
  ADD CONSTRAINT `player_statistics_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`);

--
-- Constraints for table `plays`
--
ALTER TABLE `plays`
  ADD CONSTRAINT `plays_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `player` (`player_id`),
  ADD CONSTRAINT `plays_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `mtch` (`match_id`);

--
-- Constraints for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD CONSTRAINT `sponsor_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`club_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
