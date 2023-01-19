-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-12-20 22:49
-- 서버 버전: 10.4.27-MariaDB
-- PHP 버전: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `crud_homestay`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `tbl_home`
--

CREATE TABLE `tbl_home` (
  `home_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `score` int(3) NOT NULL,
  `price` int(5) NOT NULL,
  `location1` varchar(10) NOT NULL,
  `location2` varchar(10) NOT NULL,
  `zip_number` varchar(6) NOT NULL,
  `amenities` varchar(6) NOT NULL,
  `start_date` date NOT NULL,
  `introduction` varchar(500) NOT NULL,
  `meal_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 테이블의 덤프 데이터 `tbl_home`
--

INSERT INTO `tbl_home` (`home_id`, `name`, `phone_number`, `score`, `price`, `location1`, `location2`, `zip_number`, `amenities`, `start_date`, `introduction`, `meal_id`) VALUES
(3001, 'Jenna\'s house', 2147483647, 98, 920, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2012-12-01', 'It is a homestay famous for good transportation and good food near UBC.', 4001);

-- --------------------------------------------------------

--
-- 테이블 구조 `tbl_meal`
--

CREATE TABLE `tbl_meal` (
  `meal_id` int(10) NOT NULL,
  `meal_count` int(1) NOT NULL,
  `meal_kind` varchar(10) NOT NULL,
  `meal_price` int(5) NOT NULL,
  `allergies` varchar(100) NOT NULL,
  `introduction` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 테이블의 덤프 데이터 `tbl_meal`
--

INSERT INTO `tbl_meal` (`meal_id`, `meal_count`, `meal_kind`, `meal_price`, `allergies`, `introduction`) VALUES
(4001, 3, 'meat', 18, 'cucumber', 'One meal is served out of pork, chicken, and beef every meal. Also, three meals are provided every day, and if you get caught, you cannot get a discount.');

-- --------------------------------------------------------

--
-- 테이블 구조 `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 테이블의 덤프 데이터 `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `owner_id`, `student_id`) VALUES
(1, 1001, 2001);

-- --------------------------------------------------------

--
-- 테이블 구조 `tbl_owner`
--

CREATE TABLE `tbl_owner` (
  `owner_id` int(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `introduction` varchar(200) NOT NULL,
  `cell_number` int(11) NOT NULL,
  `dob` date NOT NULL,
  `home_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 테이블의 덤프 데이터 `tbl_owner`
--

INSERT INTO `tbl_owner` (`owner_id`, `pass`, `fname`, `lname`, `introduction`, `cell_number`, `dob`, `home_id`) VALUES
(1001, '1234', 'Jenny', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1996-01-04', 3001);

-- --------------------------------------------------------

--
-- 테이블 구조 `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `reservation_id` int(10) NOT NULL,
  `student_id` int(11) NOT NULL,
  `home_id` int(10) NOT NULL,
  `school_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `meal_id` int(10) NOT NULL,
  `total_price` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `tbl_school`
--

CREATE TABLE `tbl_school` (
  `school_id` int(10) NOT NULL,
  `location1` varchar(10) NOT NULL,
  `location2` varchar(10) NOT NULL,
  `zip_number` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 테이블의 덤프 데이터 `tbl_school`
--

INSERT INTO `tbl_school` (`school_id`, `location1`, `location2`, `zip_number`) VALUES
(5001, 'BC', 'Vancouver', 'V6Z1L5');

-- --------------------------------------------------------

--
-- 테이블 구조 `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `cell_number` int(11) NOT NULL,
  `dob` date NOT NULL,
  `school_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 테이블의 덤프 데이터 `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `pass`, `fname`, `lname`, `cell_number`, `dob`, `school_id`) VALUES
(2001, '1234', 'Tom', 'Ginger', 1382741642, '1992-11-05', 5001);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `tbl_home`
--
ALTER TABLE `tbl_home`
  ADD PRIMARY KEY (`home_id`),
  ADD KEY `relate_meal` (`meal_id`);

--
-- 테이블의 인덱스 `tbl_meal`
--
ALTER TABLE `tbl_meal`
  ADD PRIMARY KEY (`meal_id`);

--
-- 테이블의 인덱스 `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relate_owner` (`owner_id`),
  ADD KEY `relate_student` (`student_id`);

--
-- 테이블의 인덱스 `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD PRIMARY KEY (`owner_id`),
  ADD KEY `relate_home` (`home_id`);

--
-- 테이블의 인덱스 `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- 테이블의 인덱스 `tbl_school`
--
ALTER TABLE `tbl_school`
  ADD PRIMARY KEY (`school_id`);

--
-- 테이블의 인덱스 `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `relate_school` (`school_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `tbl_home`
--
ALTER TABLE `tbl_home`
  MODIFY `home_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3002;

--
-- 테이블의 AUTO_INCREMENT `tbl_meal`
--
ALTER TABLE `tbl_meal`
  MODIFY `meal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4002;

--
-- 테이블의 AUTO_INCREMENT `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `owner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- 테이블의 AUTO_INCREMENT `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `reservation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6000;

--
-- 테이블의 AUTO_INCREMENT `tbl_school`
--
ALTER TABLE `tbl_school`
  MODIFY `school_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5002;

--
-- 테이블의 AUTO_INCREMENT `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2002;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `tbl_home`
--
ALTER TABLE `tbl_home`
  ADD CONSTRAINT `relate_meal` FOREIGN KEY (`meal_id`) REFERENCES `tbl_meal` (`meal_id`) ON UPDATE CASCADE;

--
-- 테이블의 제약사항 `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD CONSTRAINT `relate_owner` FOREIGN KEY (`owner_id`) REFERENCES `tbl_owner` (`owner_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `relate_student` FOREIGN KEY (`student_id`) REFERENCES `tbl_student` (`student_id`) ON UPDATE CASCADE;

--
-- 테이블의 제약사항 `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD CONSTRAINT `relate_home` FOREIGN KEY (`home_id`) REFERENCES `tbl_home` (`home_id`) ON UPDATE CASCADE;

--
-- 테이블의 제약사항 `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `relate_school` FOREIGN KEY (`school_id`) REFERENCES `tbl_school` (`school_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
