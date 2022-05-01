-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 01 Maj 2022, 09:56
-- Wersja serwera: 5.7.37-0ubuntu0.18.04.1
-- Wersja PHP: 7.2.24-0ubuntu0.18.04.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `trap`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `1nmp`
--

CREATE TABLE `1nmp` (
  `id` int(11) NOT NULL,
  `alarmid` int(11) NOT NULL,
  `objname` varchar(250) NOT NULL,
  `info` varchar(150) NOT NULL,
  `address` varchar(15) NOT NULL,
  `severity` varchar(12) NOT NULL,
  `state` varchar(12) NOT NULL,
  `time` datetime NOT NULL,
  `timestamp` float NOT NULL,
  `alarmed1` int(11) NOT NULL,
  `alarmed2` int(11) NOT NULL,
  `alarmed_one` int(11) NOT NULL,
  `alarmed_all` int(11) NOT NULL,
  `alarmed` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `disable_trap`
--

CREATE TABLE `disable_trap` (
  `id` int(11) NOT NULL,
  `nazwa` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `1nmp`
--
ALTER TABLE `1nmp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `objname` (`objname`),
  ADD KEY `timestamp` (`timestamp`);

--
-- Indexes for table `disable_trap`
--
ALTER TABLE `disable_trap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `1nmp`
--
ALTER TABLE `1nmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `disable_trap`
--
ALTER TABLE `disable_trap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
