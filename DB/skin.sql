-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 5 朁E11 日 04:06
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
-- テーブルの構造 `skin`
--

CREATE TABLE `skin` (
  `ID` tinyint(10) NOT NULL,
  `REAL_NAME` varchar(20) NOT NULL,
  `TEAM` varchar(15) DEFAULT NULL,
  `SUBJECT` varchar(20) DEFAULT NULL,
  `S_or_T` tinyint(1) NOT NULL,
  `P_or_P` tinyint(1) NOT NULL,
  `I_or_M` tinyint(1) NOT NULL,
  `W_or_O` tinyint(1) NOT NULL,
  `I_or_C` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `skin`
--

INSERT INTO `skin` (`ID`, `REAL_NAME`, `TEAM`, `SUBJECT`, `S_or_T`, `P_or_P`, `I_or_M`, `W_or_O`, `I_or_C`) VALUES
(1, 'テスト1', 'A社', 'プログラム', 1, 4, 1, 0, 4),
(2, 'テスト2', 'B社', 'DB', 0, 2, 0, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skin`
--
ALTER TABLE `skin`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
