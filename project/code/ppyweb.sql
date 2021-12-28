-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-28 15:45:03
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
('creator', 'ppy3', 'ppy3@gmail.com', 123),
('creator', 'ppy4', 'ppy4@gmail.com', 123),
('user', 'ppy6', 'ppy6@gmail.com', 123),
('creator', 'ppy7', 'ppy7@gmail.com', 123);

-- --------------------------------------------------------

--
-- 資料表結構 `gamelist`
--

CREATE TABLE `gamelist` (
  `gameName` text NOT NULL,
  `introduction` text NOT NULL,
  `classification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `gamelist`
--

INSERT INTO `gamelist` (`gameName`, `introduction`, `classification`) VALUES
('章魚吃葉葉', '--我是介紹--', '街機'),
('我是遊戲1', '--介紹--', '休閒'),
('我是遊戲2', '--介紹--', '冒險'),
('我是遊戲3', '--介紹--', '益智'),
('躲貓貓', '---我是簡介---', '冒險'),
('翹翹板', '123', '休閒');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
