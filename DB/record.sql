-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 5 朁E14 日 03:52
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
-- テーブルの構造 `record`
--

CREATE TABLE `record` (
  `ID` tinyint(10) NOT NULL,
  `RECORD_ID` tinyint(30) NOT NULL,
  `ITEM_ID` tinyint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `record`
--

INSERT INTO `record` (`ID`, `RECORD_ID`, `ITEM_ID`) VALUES
(1, 2, 0),
(2, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`ID`,`RECORD_ID`,`ITEM_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
