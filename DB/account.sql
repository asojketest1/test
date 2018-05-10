-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 5 朁E09 日 04:56
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
  `MAIL` varchar(50) NOT NULL,
  `PASS` varchar(20) NOT NULL,
  `QRPASS` varchar(5) NOT NULL,
  `PHONE` varchar(13) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `PREMIER` tinyint(1) NOT NULL,
  `SKIN_ID` tinyint(10) NOT NULL,
  `FRUIT_ID` tinyint(10) NOT NULL,
  `QR_URL` varchar(60) NOT NULL,
  `ICON_URL` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `account`
--

INSERT INTO `account` (`ID`, `MAIL`, `PASS`, `QRPASS`, `PHONE`, `NAME`, `PREMIER`, `SKIN_ID`, `FRUIT_ID`, `QR_URL`, `ICON_URL`) VALUES
(1, 'sample@sample.com', 'abc1', 'aaaaa', '090-1111-2222', '無料', 0, 0, 0, '0', '0'),
(2, 'sample2@sample.com', 'abc2', 'bbbbb', '090-2222-1111', '有料', 1, 0, 0, '0', '0');

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
