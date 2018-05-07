-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 5 朁E07 日 06:01
-- サーバのバージョン： 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `account`
--

CREATE TABLE `account` (
  `ID` tinyint(10) NOT NULL,
  `MAil` varchar(50) NOT NULL,
  `PASS` varchar(20) NOT NULL,
  `QRPASS` varchar(5) NOT NULL,
  `PHONE` tinyint(15) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `PREMIER` tinyint(1) NOT NULL,
  `RECORD_ID` tinyint(30) NOT NULL,
  `SKIN_ID` tinyint(10) NOT NULL,
  `FRUIT_ID` tinyint(10) NOT NULL,
  `QR_URL` varchar(60) NOT NULL,
  `ICON_URL` varchar(60) NOT NULL,
  `PARTNER_ID` tinyint(30) NOT NULL,
  `ITEM_ID` tinyint(30) NOT NULL,
  `ITEM_NAME` varchar(20) NOT NULL,
  `CONTENT` varchar(130) NOT NULL,
  `REAL_NAME` varchar(20) NOT NULL,
  `GROUP` varchar(15) DEFAULT NULL,
  `SUBJECT` varchar(20) DEFAULT NULL,
  `S_or_T` tinyint(1) NOT NULL,
  `P_or_P` tinyint(1) NOT NULL,
  `I_or_M` tinyint(1) NOT NULL,
  `W_or_O` tinyint(1) NOT NULL,
  `I_or_C` tinyint(1) NOT NULL,
  `DISPLAY` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `account`
--

INSERT INTO `account` (`ID`, `MAil`, `PASS`, `QRPASS`, `PHONE`, `NAME`, `PREMIER`, `RECORD_ID`, `SKIN_ID`, `FRUIT_ID`, `QR_URL`, `ICON_URL`, `PARTNER_ID`, `ITEM_ID`, `ITEM_NAME`, `CONTENT`, `REAL_NAME`, `GROUP`, `SUBJECT`, `S_or_T`, `P_or_P`, `I_or_M`, `W_or_O`, `I_or_C`, `DISPLAY`) VALUES
(1, 'sample@sample.com', 'abc1', 'aaaaa', 127, '無料', 0, 2, 0, 0, '', '', 2, 0, '', '', 'テスト１', 'A社', 'プログラム', 1, 1, 1, 0, 0, 0),
(2, 'sample2@sample.com', 'abc2', 'bbbbb', 127, '有料', 1, 1, 0, 0, '', '', 1, 0, '', '', 'テスト２', 'B社', 'DB', 0, 1, 0, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
