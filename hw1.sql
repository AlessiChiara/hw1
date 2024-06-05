-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 05, 2024 alle 19:09
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `corso`
--

CREATE TABLE `corso` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `prezzo` float NOT NULL,
  `n_iscritti` int(11) NOT NULL,
  `max_iscritti` int(30) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `back_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `corso`
--

INSERT INTO `corso` (`id`, `name`, `prezzo`, `n_iscritti`, `max_iscritti`, `descrizione`, `image`, `back_image`) VALUES
(1, 'Ninjutsu', 55, 1, 50, 'Esplora il Ninjutsu, l\'antica arte marziale per la sopravvivenza e la difesa personale. \r\nImpara le tecniche tradizionali integrate con l\'uso di oggetti comuni.', 'class-icon-1.png', 'class-1.jpg'),
(3, 'Allenamento Funzionale', 50, 1, 30, 'Scopri l’allenamento funzionale! \r\nUnisciti a noi per un’esperienza di fitness unica, potenzia il tuo corpo e la tua mente, e raggiungi nuovi obiettivi.', 'class-icon-2.png', 'class-2.jpg'),
(4, 'Yoga', 50, 1, 30, 'Unisciti a noi e vivi l’esperienza unica di praticare Yoga con la guida dei nostri insegnanti.\r\nTroverai ogni settimana lezioni diverse e uniche!', 'class-icon-3.png', 'class-3.jpg'),
(5, 'Ginnastica Posturale', 50, 1, 25, 'Riscopri il benessere attraverso la ginnastica posturale! \r\nMigliora la tua postura, allevia il dolore e rafforza il corpo.', 'class-icon-4.png', 'class-4.png'),
(6, 'Karate', 55, 1, 80, 'Iscriviti oggi per esplorare l\'arte del karate e scoprire il tuo vero potenziale! \r\nUnisciti a noi per un\'avventura di crescita e autodisciplina. ', 'class-icon-5.png', 'class-5.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `iscrizione`
--

CREATE TABLE `iscrizione` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `corso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `iscrizione`
--

INSERT INTO `iscrizione` (`id`, `user_id`, `corso_id`) VALUES
(5, 1, 1),
(6, 1, 3),
(7, 1, 6),
(8, 1, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`name`, `email`, `number`, `password`, `id`) VALUES
('Chiara', 'chiara.ale01@outlook.com', '2147483647', 'e34c12f17b281464eea5e139b2229ee0594cc4df', 1),
('Giuseppe', 'pepperavesi@gmail.com', '12345', 'ad70ffa16db35d6ae0cafe4b4ba4ba61279d14b4', 2),
('dario', 'alessi.dario@hotmail.com', '34565034', 'e34c12f17b281464eea5e139b2229ee0594cc4df', 4);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `corso`
--
ALTER TABLE `corso`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `iscrizione`
--
ALTER TABLE `iscrizione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `corso_id_fk` (`corso_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `corso`
--
ALTER TABLE `corso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `iscrizione`
--
ALTER TABLE `iscrizione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `iscrizione`
--
ALTER TABLE `iscrizione`
  ADD CONSTRAINT `corso_id_fk` FOREIGN KEY (`corso_id`) REFERENCES `corso` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
