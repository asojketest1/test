-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 5 朁E07 日 08:02
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
-- テーブルの構造 `skin table`
--

CREATE TABLE `skin table` (
  `ID` tinyint(10) NOT NULL,
  `REAL_NAME` varchar(20) NOT NULL,
  `GROUP` varchar(15) DEFAULT NULL,
  `SUBJECT` varchar(20) DEFAULT NULL,
  `S_or_T` tinyint(1) NOT NULL,
  `P_or_P` tinyint(1) NOT NULL,
  `I_or_M` tinyint(1) NOT NULL,
  `W_or_O` tinyint(1) NOT NULL,
  `I_or_C` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `skin table`
--

INSERT INTO `skin table` (`ID`, `REAL_NAME`, `GROUP`, `SUBJECT`, `S_or_T`, `P_or_P`, `I_or_M`, `W_or_O`, `I_or_C`) VALUES
(1, 'テスト1', 'A社', 'プログラム', 1, 1, 1, 0, 0),
(2, 'テスト2', 'B社', 'DB', 0, 1, 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skin table`
--
ALTER TABLE `skin table`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
