-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-25 06:46:54
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `ppyweb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `identity` enum('user','creator') NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`identity`, `name`, `email`, `password`) VALUES
('user', 'ppy', 'ppy@gmail.com', 123),
('user', 'ppy2', 'ppy2@gmail.com', 123),
('user', 'ppy3', 'ppy3', 123),
('user', 'ppy4', 'ppy4@gmail.com', 123),
('user', 'ppy5', 'ppy5@gmail.com', 123);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
