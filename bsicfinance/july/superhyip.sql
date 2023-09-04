-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 11:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `ewallet` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `bwallet` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `pm` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mm` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ewallet`, `bwallet`, `pm`, `email`, `password`, `mm`) VALUES
(1, '0xA3Fefc7Cd98C92A355B83D0D8aF8749F83cb024a', 'bc1qth8cjnprltm2z2m9ltfgh29u4klr3wewhyafpj', '123', 'admin@digitalwebplus.com', 'admin123', 'tytrr');

-- --------------------------------------------------------

--
-- Table structure for table `adminmessage`
--

CREATE TABLE `adminmessage` (
  `id` int(6) NOT NULL,
  `email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `status` tinyint(4) NOT NULL,
  `msgid` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adminmessage`
--

INSERT INTO `adminmessage` (`id`, `email`, `message`, `title`, `image`, `status`, `msgid`, `date`) VALUES
(3, 'ibrahovic@gmail.com', 'your account is good', 'good account', '', 1, 'gty5767865', '2019-07-25 14:22:32'),
(4, 'haconis4tech@gmail.com', 'goooof the mansd', 'good account verification', '', 1, 'bNM[yUP8/7', '2019-07-25 14:35:01'),
(5, 'ibrahovic@gmail.com', 'jhvsdfhbhbsdvhgsdfhbsdfnbsdfn', 'gsdfvhbsj', '', 0, 'AehC(3VsMU', '2019-07-25 14:35:44'),
(12, 'haconis4tech@gmail.com', 'dnmdfbnmfg', 'nmsdedf', '', 0, 'gV58cBduT/', '2019-07-25 15:15:30'),
(13, 'm1872001@gmail.com', 'We got your email and we are working on it.', 'Hi', '', 0, '[1)se883Us', '2019-08-02 10:11:40'),
(14, 'haconis4tech@gmail.com', 'am going', 'going', '', 0, 'hh>jaS(4S[', '2019-08-13 14:21:09'),

-- --------------------------------------------------------

--
-- Table structure for table `btc`
--

CREATE TABLE `btc` (
  `id` int(11) NOT NULL,
  `btc` double NOT NULL,
  `eth` double NOT NULL,
  `pm` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mmd` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usd` double NOT NULL,
  `image` tinyblob NOT NULL,
  `btctnx` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tnxid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `refcode` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `referred` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messageadmin`
--

CREATE TABLE `messageadmin` (
  `id` int(6) NOT NULL,
  `email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `status` tinyint(4) NOT NULL,
  `msgid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package1`
--

CREATE TABLE `package1` (
  `id` int(6) NOT NULL,
  `email` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `pname` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `increase` double NOT NULL,
  `bonus` double NOT NULL,
  `duration` int(11) NOT NULL,
  `froms` double NOT NULL,
  `tos` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package1`
--

INSERT INTO `package1` (`id`, `email`, `pname`, `increase`, `bonus`, `duration`, `froms`, `tos`) VALUES
(5, 'admin@digitalwebplus.com', 'Mini', 1, 2, 10, 100, 999);

-- --------------------------------------------------------

--
-- Table structure for table `package2`
--

CREATE TABLE `package2` (
  `id` int(6) NOT NULL,
  `email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `pname` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `increase` double NOT NULL,
  `bonus` double NOT NULL,
  `duration` int(122) NOT NULL,
  `froms` double NOT NULL,
  `tos` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package2`
--

INSERT INTO `package2` (`id`, `email`, `pname`, `increase`, `bonus`, `duration`, `froms`, `tos`) VALUES
(5, 'admin@digitalwebplus.com', 'Maxi', 1.5, 5, 10, 1000, 9999);

-- --------------------------------------------------------

--
-- Table structure for table `package3`
--

CREATE TABLE `package3` (
  `id` int(6) NOT NULL,
  `email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `pname` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `increase` double NOT NULL,
  `bonus` double NOT NULL,
  `duration` int(11) NOT NULL,
  `froms` double NOT NULL,
  `tos` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package3`
--

INSERT INTO `package3` (`id`, `email`, `pname`, `increase`, `bonus`, `duration`, `froms`, `tos`) VALUES
(5, 'admin@digitalwebplus.com', 'Mega', 2, 10, 10, 10000, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `package4`
--

CREATE TABLE `package4` (
  `id` int(6) NOT NULL,
  `email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `pname` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `increase` double NOT NULL,
  `bonus` double NOT NULL,
  `duration` int(11) NOT NULL,
  `froms` double NOT NULL,
  `tos` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package4`
--

INSERT INTO `package4` (`id`, `email`, `pname`, `increase`, `bonus`, `duration`, `froms`, `tos`) VALUES
(5, 'admin@scriptsdemo.website', 'dfghgfdtttttttttttttttttttt', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(200) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `wl` int(200) NOT NULL,
  `rb` int(200) NOT NULL,
  `currency` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `bname` varchar(200) NOT NULL,
  `baddress` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `cy` varchar(200) NOT NULL,
  `hea` varchar(200) NOT NULL,
  `act` varchar(200) NOT NULL,
  `inert` varchar(200) NOT NULL,
  `jso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sname`, `wl`, `rb`, `currency`, `branch`, `bname`, `baddress`, `email`, `phone`, `title`, `logo`, `cy`, `hea`, `act`, `inert`, `jso`) VALUES
(2, 'scriptsdemo.website/investment_pro', 200, 20, '', '', 'Investment Pro', '', '', '', 'Welcome to Investment Pro', 'logo333.png', '2020', '../../vendor/twilio/sdk/Services/header.php', 'https://scriptsdemo.website/superadmin/btc_activation.php', '../../vendor/twilio/sdk/Services/initializer.php', '');

-- --------------------------------------------------------

--
-- Table structure for table `tfa`
--

CREATE TABLE `tfa` (
  `id` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `secret` varchar(100) NOT NULL,
  `qrcode` blob NOT NULL,
  `result` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tfa`
--

INSERT INTO `tfa` (`id`, `email`, `secret`, `qrcode`, `result`, `date`) VALUES
(4, '', 'ZZMIR2Y6O5RUT4H7', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533445a5a4d49523259364f355255543448372673697a653d32303078323030266563633d4d, 1, '2021-02-10 17:07:38'),
(5, '', 'ZZMIR2Y6O5RUT4H7', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533445a5a4d49523259364f355255543448372673697a653d32303078323030266563633d4d, 1, '2021-02-10 17:07:38'),
(6, 'binsalith@gmail.com', 'K3MPXZCCNJL6NRZZ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533444b334d50585a43434e4a4c364e525a5a2673697a653d32303078323030266563633d4d, 1, '2021-03-12 11:40:14'),
(7, 'binsalith@gmail.com', 'K3MPXZCCNJL6NRZZ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533444b334d50585a43434e4a4c364e525a5a2673697a653d32303078323030266563633d4d, 1, '2021-03-12 11:40:14'),
(8, 'mqabilmqabil@gmail.com', 'OOLXQD7EAV3TLJBQ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533444f4f4c5851443745415633544c4a42512673697a653d32303078323030266563633d4d, 1, '2021-04-10 15:38:56'),
(9, 'mqabilmqabil@gmail.com', 'OOLXQD7EAV3TLJBQ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533444f4f4c5851443745415633544c4a42512673697a653d32303078323030266563633d4d, 1, '2021-04-10 15:38:56'),
(10, 'mqabilmqabil@gmail.com', 'OOLXQD7EAV3TLJBQ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533445a424e5655463541324c414d4e334d552673697a653d32303078323030266563633d4d, 1, '2021-04-10 15:40:20'),
(11, 'mqabilmqabil@gmail.com', 'OOLXQD7EAV3TLJBQ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533445a424e5655463541324c414d4e334d552673697a653d32303078323030266563633d4d, 1, '2021-04-10 15:40:20'),
(12, 'mqabilmqabil@gmail.com', 'OOLXQD7EAV3TLJBQ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f25334673656372657425334434554f445954545044444a51545a35522673697a653d32303078323030266563633d4d, 1, '2021-04-10 15:42:56'),
(13, 'mqabilmqabil@gmail.com', 'OOLXQD7EAV3TLJBQ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f25334673656372657425334434554f445954545044444a51545a35522673697a653d32303078323030266563633d4d, 1, '2021-04-10 15:42:56'),
(14, 'mqabilmqabil@gmail.com', 'OOLXQD7EAV3TLJBQ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533445a43414a5148354547464759474350592673697a653d32303078323030266563633d4d, 1, '2021-04-10 15:43:24'),
(15, 'mqabilmqabil@gmail.com', 'OOLXQD7EAV3TLJBQ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533445a43414a5148354547464759474350592673697a653d32303078323030266563633d4d, 1, '2021-04-10 15:43:24'),
(16, 'mqabilmqabil@gmail.com', 'OOLXQD7EAV3TLJBQ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533445a43414a5148354547464759474350592673697a653d32303078323030266563633d4d, 1, '2021-04-10 15:43:28'),
(17, 'mqabilmqabil@gmail.com', 'OOLXQD7EAV3TLJBQ', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f2533467365637265742533445a43414a5148354547464759474350592673697a653d32303078323030266563633d4d, 1, '2021-04-10 15:43:28'),
(18, 'usainlay@gmail.com', '3H7DTDYXQBS364FI', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f253346736563726574253344334837445444595851425333363446492673697a653d32303078323030266563633d4d, 1, '2021-06-19 12:52:36'),
(19, 'usainlay@gmail.com', '3H7DTDYXQBS364FI', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f253346736563726574253344334837445444595851425333363446492673697a653d32303078323030266563633d4d, 1, '2021-06-19 12:52:36'),
(20, 'macorrea8@gmail.com', '5DG2SZNZBUGUV3S4', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f25334673656372657425334435444732535a4e5a42554755563353342673697a653d32303078323030266563633d4d, 1, '2021-07-16 02:57:18'),
(21, 'macorrea8@gmail.com', '5DG2SZNZBUGUV3S4', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246496e766573746d656e742b50726f25334673656372657425334435444732535a4e5a42554755563353342673697a653d32303078323030266563633d4d, 1, '2021-07-16 02:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `confirm` tinyint(4) NOT NULL,
  `token` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `refcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `package` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `verify` tinyint(4) NOT NULL,
  `session` tinyint(4) NOT NULL,
  `activate` tinyint(4) NOT NULL,
  `referred` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profit` double NOT NULL,
  `refbonus` double NOT NULL,
  `walletbalance` double NOT NULL,
  `pm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mmd` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `eth` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `btc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `2fa` tinyint(4) NOT NULL,
  `pname` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `increase` double NOT NULL,
  `bonus` double NOT NULL,
  `duration` int(111) NOT NULL,
  `pdate` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `froms` double NOT NULL,
  `usd` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirm`, `token`, `refcode`, `package`, `image`, `verify`, `session`, `activate`, `referred`, `profit`, `refbonus`, `walletbalance`, `pm`, `mmd`, `eth`, `btc`, `2fa`, `pname`, `increase`, `bonus`, `duration`, `pdate`, `froms`, `usd`, `date`, `phone`, `address`, `country`) VALUES
(147, 'admin@digitalwebplus.com', 'admin@digitalwebplus.com', '12345678', 1, 'lV|49MsfPC', 'Wk3hGD5h3b', '', 0x6d616e2e6a7067, 1, 1, 1, '', 0, 0, 11568700717.3, 'U31428420', 'sfsrhtui67', 'ytru6i5', '34VMy3yczafd2D5CWDFKTPG5QSdB6wW3dS', 0, ' Diam', 20, 2, 1, '2021-08-26 10:13:05', 50, 7556778, '2021-04-12 19:15:48', '758258727', '', 'Keny'),
(156, 'Test', 'test@gmail.com', '123456', 0, ')[N86egd59', 'P5T2ys93MX', '', '', 0, 0, 0, 'Wk3hGD5h3b', 0, 0, 20, '', '', '', '', 0, '', 0, 0, 0, '', 0, 0, '2021-06-24 16:44:11', '12345678900', 'Enugu', 'Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `wbtc`
--

CREATE TABLE `wbtc` (
  `id` int(11) NOT NULL,
  `moni` double NOT NULL,
  `mode` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tnx` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `wal` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminmessage`
--
ALTER TABLE `adminmessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `btc`
--
ALTER TABLE `btc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messageadmin`
--
ALTER TABLE `messageadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package1`
--
ALTER TABLE `package1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package2`
--
ALTER TABLE `package2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package3`
--
ALTER TABLE `package3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package4`
--
ALTER TABLE `package4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tfa`
--
ALTER TABLE `tfa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wbtc`
--
ALTER TABLE `wbtc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminmessage`
--
ALTER TABLE `adminmessage`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `btc`
--
ALTER TABLE `btc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `messageadmin`
--
ALTER TABLE `messageadmin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `package1`
--
ALTER TABLE `package1`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package2`
--
ALTER TABLE `package2`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package3`
--
ALTER TABLE `package3`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package4`
--
ALTER TABLE `package4`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tfa`
--
ALTER TABLE `tfa`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `wbtc`
--
ALTER TABLE `wbtc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
