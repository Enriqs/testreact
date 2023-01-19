-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-12-21 20:12
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
(3001, 'Jenna\'s house', 2147483647, 98, 920, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2012-12-01', 'It is a homestay famous for good transportation and good food near UBC.', 4001),
(3002, 'We are the one', 2147483647, 45, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4001),
(3003, 'JWE', 2147483647, 55, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4002),
(3004, 'Apple', 2147483647, 67, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4004),
(3005, 'Lemon', 2147483647, 78, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4001),
(3006, 'Tree', 2147483647, 89, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4001),
(3007, 'Off the record', 2147483647, 76, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4001),
(3008, 'Lulu\'s house', 2147483647, 89, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4001),
(3009, 'Leaving LV', 2147483647, 90, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4001),
(3010, 'Earth', 2147483647, 98, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4001),
(3011, 'Sailor Moon', 2147483647, 92, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4001),
(3012, 'Rose', 2147483647, 83, 470, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4002),
(3013, 'Papa\'s', 2147483647, 64, 570, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4003),
(3014, 'LALA land', 2147483647, 99, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4003),
(3015, 'KOSPI', 2147483647, 90, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4002),
(3016, 'NASDAC', 2147483647, 88, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4002),
(3017, 'Saint', 2147483647, 79, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4003),
(3018, 'Juli\'s home', 2147483647, 82, 470, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4003),
(3019, 'Dongle', 2147483647, 71, 570, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4001),
(3020, 'Wild future', 2147483647, 81, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4003),
(3021, 'Zoo', 2147483647, 89, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4003),
(3022, 'Africa', 2147483647, 78, 370, 'BC', 'Vancouver', 'V6Z1L5', 'Washin', '2002-03-14', 'It is a homestay famous for good transportation and good food near UBC.', 4002);

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
(4001, 3, 'meat', 18, 'cucumber', 'One meal is served out of pork, chicken, and beef every meal. Also, three meals are provided every day, and if you get caught, you cannot get a discount.'),
(4002, 2, 'vegi', 25, 'cucumber', 'Meals made from a variety of fresh vegetables are served every morning and evening.'),
(4003, 1, 'Vegan ', 37, 'none', 'We aim for strong vegetarianism. So we only deal with vegetables and fruits except dairy products and meat.'),
(4004, 2, 'Vegi, meat', 50, 'none', 'We aim for strong vegetarianism. So we only deal with vegetables and fruits except dairy products and meat.'),
(4005, 2, 'All', 50, 'none', 'We aim for strong vegetarianism. So we only deal with vegetables and fruits except dairy products and meat.');

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
(1001, '1234', 'Jenny', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1996-01-04', 3001),
(1002, '1234', 'Hochan', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1003, '1234', 'Kyuyoung', 'Park', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1004, '1234', 'Chanyoung', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1005, '1234', 'Jiyoung', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1006, '1234', 'Yuri', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1007, '1234', 'Eunyoung', 'Park', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1008, '1234', 'Kuyoung', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1009, '1234', 'HochSanghe', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1010, '1234', 'James', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1011, '1234', 'Floiyia', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1012, '1234', 'Valerina', 'Park', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1013, '1234', 'Choice', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1014, '1234', 'Willy', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1015, '1234', 'Donun', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1016, '1234', 'Suhee', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002),
(1017, '1234', 'Amelia', 'Kim', 'It is a homestay famous for good transportation and good food near UBC.', 2147483647, '1995-01-04', 3002);

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

--
-- 테이블의 덤프 데이터 `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`reservation_id`, `student_id`, `home_id`, `school_id`, `start_date`, `end_date`, `meal_id`, `total_price`) VALUES
(6001, 2001, 3001, 5001, '2023-01-01', '2023-05-31', 4001, 400),
(6002, 2002, 3002, 5002, '2023-01-01', '2023-05-30', 4002, 800),
(6003, 2003, 3001, 5002, '2023-01-01', '2023-05-30', 4001, 800);

-- --------------------------------------------------------

--
-- 테이블 구조 `tbl_school`
--

CREATE TABLE `tbl_school` (
  `school_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location1` varchar(10) NOT NULL,
  `location2` varchar(10) NOT NULL,
  `zip_number` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 테이블의 덤프 데이터 `tbl_school`
--

INSERT INTO `tbl_school` (`school_id`, `name`, `location1`, `location2`, `zip_number`) VALUES
(5001, 'Tamwood', 'BC', 'Vancouver', 'V6Z1L5'),
(5002, 'SFU', 'BC', 'Vancouver', 'V6Z1L5'),
(5003, 'VBAC', 'BC', 'Vancouver', 'V6Z1L5'),
(5004, 'PST', 'BC', 'Vancouver', 'V6Z1L5'),
(5005, 'WPVS', 'BC', 'Vancouver', 'V6Z1L5');

-- --------------------------------------------------------

--
-- 테이블 구조 `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `cell_number` int(50) NOT NULL,
  `dob` date NOT NULL,
  `school_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 테이블의 덤프 데이터 `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `pass`, `fname`, `lname`, `cell_number`, `dob`, `school_id`) VALUES
(2001, '1234', 'Tom', 'Ginger', 1382741642, '1992-11-05', 5001),
(2002, '1234', 'Cong', 'Shawadi', 2001342342, '2000-05-06', 5002),
(2003, '1234', 'July', 'kim', 2014283742, '1969-03-24', 5003),
(2004, '1234', 'Wild', 'Bore', 2015283742, '1969-03-24', 5004),
(2005, '1234', 'Willy', 'Bore', 2015283742, '1979-03-24', 5004),
(2006, '1234', 'Chan', 'Gil', 2015283742, '1979-03-24', 5004),
(2007, '1234', 'Biden', 'Joe', 2015283742, '1979-03-24', 5004),
(2008, '1234', 'Talye', 'Sun', 2015283742, '1979-03-24', 5004),
(2009, '1234', 'Tail', 'Jae', 2015283742, '1979-03-24', 5004),
(2010, '1234', 'Suhee', 'Jang', 2015283742, '1979-03-24', 5004),
(2011, '1234', 'Kyuri', 'Lee', 2015283742, '1979-03-24', 5004),
(2012, '1234', 'Sanghee', 'Jo', 2015283742, '1979-03-24', 5004),
(2013, '1234', 'Willy', 'Bore', 2015283742, '1979-03-24', 5004),
(2014, '1234', 'Jone', 'Bore', 2015283742, '1979-03-24', 5004),
(2015, '1234', 'Jane', 'Kim', 2015283742, '1979-03-24', 5004),
(2016, '1234', 'Willy', 'Bore', 2015283742, '1979-03-24', 5004),
(2017, '1234', 'Willy', 'Bore', 2015283742, '1979-03-24', 5004),
(2018, '1234', 'Willy', 'Bore', 2015283742, '1979-03-24', 5004),
(2019, '1234', 'Willy', 'Bore', 2015283742, '1979-03-24', 5004),
(2020, '1234', 'Willy', 'Bore', 2015283742, '1979-03-24', 5004),
(2021, '1234', 'Willy', 'Bore', 2015283742, '1979-03-24', 5004),
(2022, '1234', 'Willy', 'Bore', 2015283742, '1979-03-24', 5004);

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
  MODIFY `home_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3023;

--
-- 테이블의 AUTO_INCREMENT `tbl_meal`
--
ALTER TABLE `tbl_meal`
  MODIFY `meal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4006;

--
-- 테이블의 AUTO_INCREMENT `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `owner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;

--
-- 테이블의 AUTO_INCREMENT `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `reservation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6004;

--
-- 테이블의 AUTO_INCREMENT `tbl_school`
--
ALTER TABLE `tbl_school`
  MODIFY `school_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5006;

--
-- 테이블의 AUTO_INCREMENT `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023;

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
