-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-01-09 13:19:18
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `ppy_web`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `id` int(20) NOT NULL,
  `identity` enum('user','creator') NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`id`, `identity`, `name`, `email`, `password`) VALUES
(1, 'user', 'nain2', 'nain2@gmail.com', 123),
(2, 'user', 'nian', 'nian@gmail.com', 1234),
(3, 'user', 'ppy', 'ppy@gmail.com', 123),
(4, 'user', 'ppy2', 'ppy2@gmail.com', 123),
(5, 'creator', 'ppy3', 'ppy3', 123),
(6, 'creator', 'ppy4', 'ppy4@gmail.com', 123),
(7, 'user', 'ppy7', 'ppy7@gmail.com', 123),
(8, 'user', '123', '123', 123),
(9, 'creator', 'ttt', 'ttt', 123);

-- --------------------------------------------------------

--
-- 資料表結構 `creator_income`
--

CREATE TABLE `creator_income` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `income_gameName` varchar(40) NOT NULL,
  `income` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `creator_income`
--

INSERT INTO `creator_income` (`id`, `creator_id`, `income_gameName`, `income`) VALUES
(1, 3, '我是遊戲1', 700),
(2, 2, '我是遊戲2', 400),
(3, 3, '我是遊戲3', 100),
(4, 5, '我是遊戲1', 600),
(5, 2, '翹翹板', 2200),
(6, 1, '我是遊戲2', 40),
(7, 4, '章魚吃葉葉', 10000),
(8, 3, '我是遊戲1', 700),
(9, 2, '我是遊戲2', 400),
(10, 3, '我是遊戲3', 100),
(11, 5, '我是遊戲1', 600),
(12, 2, '翹翹板', 2200),
(13, 1, '我是遊戲2', 40),
(14, 4, '章魚吃葉葉', 10000),
(15, 4, '我是遊戲1', 640),
(16, 3, '我是遊戲1', 700),
(17, 2, '我是遊戲2', 400),
(18, 3, '我是遊戲3', 100),
(19, 5, '我是遊戲1', 600),
(20, 2, '翹翹板', 2200),
(21, 1, '我是遊戲2', 40),
(22, 4, '章魚吃葉葉', 10000),
(23, 3, '我是遊戲1', 700),
(24, 2, '我是遊戲2', 400),
(25, 3, '我是遊戲3', 100),
(26, 5, '我是遊戲1', 600),
(27, 2, '翹翹板', 2200),
(28, 1, '我是遊戲2', 40),
(29, 4, '章魚吃葉葉', 10000),
(30, 4, '我是遊戲1', 640),
(31, 3, '我是遊戲1', 700),
(32, 2, '我是遊戲2', 400),
(33, 3, '我是遊戲3', 100),
(34, 5, '我是遊戲1', 600),
(35, 2, '翹翹板', 2200),
(36, 1, '我是遊戲2', 40),
(37, 4, '章魚吃葉葉', 10000),
(38, 3, '我是遊戲1', 700),
(39, 2, '我是遊戲2', 400),
(40, 3, '我是遊戲3', 100),
(41, 5, '我是遊戲1', 600),
(42, 2, '翹翹板', 2200),
(43, 1, '我是遊戲2', 40),
(44, 4, '章魚吃葉葉', 10000),
(45, 4, '我是遊戲1', 640);

-- --------------------------------------------------------

--
-- 資料表結構 `creator_upload`
--

CREATE TABLE `creator_upload` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `upload_gameName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `creator_upload`
--

INSERT INTO `creator_upload` (`id`, `creator_id`, `upload_gameName`) VALUES
(1, 1, '我是遊戲1'),
(2, 1, '我是遊戲2'),
(3, 1, '我是遊戲3'),
(4, 2, '我是遊戲4'),
(5, 2, '翹翹板'),
(6, 2, '我是遊戲5'),
(7, 3, '章魚吃葉葉'),
(8, 3, '我是遊戲6'),
(9, 5, '我是遊戲1'),
(10, 5, '我是遊戲2'),
(11, 5, '我是遊戲3'),
(12, 5, '我是遊戲1'),
(13, 5, '翹翹板');

-- --------------------------------------------------------

--
-- 資料表結構 `gamelist`
--

CREATE TABLE `gamelist` (
  `gameName` text NOT NULL,
  `introduction` text NOT NULL,
  `classification` text NOT NULL,
  `gameQR` longblob DEFAULT NULL,
  `gameIcon` longblob DEFAULT NULL,
  `gamePic1` longblob DEFAULT NULL,
  `gamePic2` longblob DEFAULT NULL,
  `gamePic3` longblob DEFAULT NULL,
  `gamePic4` longblob DEFAULT NULL,
  `gamePic5` longblob DEFAULT NULL,
  `creatorName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `gamelist`
--

INSERT INTO `gamelist` (`gameName`, `introduction`, `classification`, `gameQR`, `gameIcon`, `gamePic1`, `gamePic2`, `gamePic3`, `gamePic4`, `gamePic5`, `creatorName`) VALUES
('章魚吃葉葉', '', '', '', '', '', '', '', '', '', ''),
('我是遊戲1', '', '', '', '', '', '', '', '', '', ''),
('我是遊戲2', '', '', '', '', '', '', '', '', '', ''),
('', '', '冒險', '', '', '', '', '', '', '', ''),
('', '', '休閒', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `user_record`
--

CREATE TABLE `user_record` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `record_gameName` varchar(200) NOT NULL,
  `record` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user_record`
--

INSERT INTO `user_record` (`id`, `user_id`, `record_gameName`, `record`) VALUES
(1, 1, '我是遊戲1', '得分100'),
(2, 2, '躲貓貓', '得分200'),
(3, 4, '章魚吃葉葉', '得分10000'),
(4, 5, '我是遊戲1', '得分10'),
(5, 7, '翹翹板', '得分0'),
(6, 6, '我是遊戲2', '得分100'),
(7, 6, '翹翹板', '第一名'),
(8, 3, '我是遊戲1', '得分100'),
(9, 1, '躲貓貓', '得分100'),
(10, 2, '章魚吃葉葉', '第一名'),
(11, 3, '我是遊戲3', '得分100'),
(12, 7, '章魚吃葉葉', '第一名');

-- --------------------------------------------------------

--
-- 資料表結構 `user_topup`
--

CREATE TABLE `user_topup` (
  `id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `topup_gameName` varchar(40) NOT NULL,
  `topup` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user_topup`
--

INSERT INTO `user_topup` (`id`, `user_id`, `topup_gameName`, `topup`) VALUES
(1, 1, '我是遊戲1', 700),
(2, 2, '我是遊戲2', 400),
(3, 3, '我是遊戲3', 100),
(4, 5, '我是遊戲1', 600),
(5, 2, '翹翹板', 2200),
(6, 1, '我是遊戲2', 40),
(7, 4, '章魚吃葉葉', 10000),
(8, 4, '我是遊戲1', 640);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `creator_income`
--
ALTER TABLE `creator_income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- 資料表索引 `creator_upload`
--
ALTER TABLE `creator_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- 資料表索引 `user_record`
--
ALTER TABLE `user_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `user_topup`
--
ALTER TABLE `user_topup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `account`
--
ALTER TABLE `account`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `creator_income`
--
ALTER TABLE `creator_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `creator_upload`
--
ALTER TABLE `creator_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_record`
--
ALTER TABLE `user_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_topup`
--
ALTER TABLE `user_topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `creator_income`
--
ALTER TABLE `creator_income`
  ADD CONSTRAINT `creator_income_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `account` (`id`);

--
-- 資料表的限制式 `creator_upload`
--
ALTER TABLE `creator_upload`
  ADD CONSTRAINT `creator_upload_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `account` (`id`);

--
-- 資料表的限制式 `user_record`
--
ALTER TABLE `user_record`
  ADD CONSTRAINT `user_record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);

--
-- 資料表的限制式 `user_topup`
--
ALTER TABLE `user_topup`
  ADD CONSTRAINT `user_topup_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
