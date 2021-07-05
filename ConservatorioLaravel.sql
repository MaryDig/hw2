-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Lug 05, 2021 alle 18:02
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ConservatorioLaravel`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `books`
--

CREATE TABLE `books` (
  `user_id` int(11) NOT NULL,
  `book_id` varchar(100) NOT NULL,
  `titolo` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `thumbnail` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `books`
--

INSERT INTO `books` (`user_id`, `book_id`, `titolo`, `created_at`, `updated_at`, `thumbnail`) VALUES
(1, 'EY0pDwAAQBAJ', 'Rock Therapy', '2021-07-05 13:09:03', '2021-07-05 13:09:03', 'http:@@books.google.com@books@content|id=EY0pDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api');

-- --------------------------------------------------------

--
-- Struttura della tabella `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `Materia` varchar(30) NOT NULL,
  `aula` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `prenotati` int(11) NOT NULL,
  `appello` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `exams`
--

INSERT INTO `exams` (`id`, `Materia`, `aula`, `data`, `created_at`, `updated_at`, `prenotati`, `appello`) VALUES
(1, 'Storia della musica', 1, '2021-06-26 17:25:01', '2021-06-26 15:02:55', '0000-00-00 00:00:00', 0, 1),
(2, 'Prassi Pianistica', 3, '2021-07-06 12:53:11', '2021-07-05 10:57:20', '0000-00-00 00:00:00', 0, 2),
(3, 'Coro2', 5, '2021-07-29 12:53:11', '2021-07-05 10:57:34', '0000-00-00 00:00:00', 0, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `reservations`
--

CREATE TABLE `reservations` (
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `strumento` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `matricola` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `nome`, `cognome`, `strumento`, `email`, `password`, `created_at`, `updated_at`, `matricola`) VALUES
(1, 'Mary', 'Di Gregorio', 'Pianoforte', 'm@email.com', '1234', '2021-06-15 15:01:28', '2021-06-15 15:01:28', ''),
(4, 'Davide', 'Grim', 'Sassofono', 'd@email.com', '12348', '2021-06-20 15:01:43', '2021-06-20 15:01:43', '777'),
(9, 'pippo', 'Rapisarda', 'Sassofono', 'c@email.com', '3456', '2021-06-20 15:06:17', '2021-06-20 15:06:17', 'C43'),
(10, 'Francesca', 'Ninni', 'Chitarra', 'f@email.com', '5678', '2021-06-20 15:07:55', '2021-06-20 15:07:55', '509');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`user_id`,`exam_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
