-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018 年 5 月 14 日 05:42
-- サーバのバージョン： 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydata`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `fruit`
--

CREATE TABLE `fruit` (
  `ID` tinyint(10) NOT NULL,
  `ITEM_ID` tinyint(30) NOT NULL,
  `ITEM_NAME` varchar(50) NOT NULL,
  `CONTENT` varchar(100) NOT NULL,
  `DISPLAY` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `fruit`
--

INSERT INTO `fruit` (`ID`, `ITEM_ID`, `ITEM_NAME`, `CONTENT`, `DISPLAY`) VALUES
(1, 1, '趣味', '音楽鑑賞', 1),
(1, 2, '好きなアーティスト', 'とぅわいす', 0),
(2, 2, '好きなアーティスト', 'らっどうぃんぷす', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fruit`
--
ALTER TABLE `fruit`
  ADD PRIMARY KEY (`ID`,`ITEM_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
