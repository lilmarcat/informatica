-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 21, 2023 alle 12:44
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_lilmarcat`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `billion_articoli`
--

CREATE TABLE `billion_articoli` (
  `codice` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `prezzo` float NOT NULL,
  `quantita` int(11) NOT NULL,
  `testo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `billion_carrelli`
--

CREATE TABLE `billion_carrelli` (
  `id` int(11) NOT NULL,
  `idUtente` int(11) NOT NULL,
  `dataCreazone` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `billion_categoria`
--

CREATE TABLE `billion_categoria` (
  `cod` int(11) NOT NULL,
  `idArticolo` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `billion_contiene`
--

CREATE TABLE `billion_contiene` (
  `idCarrello` int(11) NOT NULL,
  `idArticolo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `billion_ordini`
--

CREATE TABLE `billion_ordini` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `ora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prezzo` int(11) NOT NULL,
  `idCarrello` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `billion_recensioni`
--

CREATE TABLE `billion_recensioni` (
  `id` int(11) NOT NULL,
  `testo` text NOT NULL,
  `idUtente` int(11) NOT NULL,
  `idArticolo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `billion_utenti`
--

CREATE TABLE `billion_utenti` (
  `ID` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `cf` varchar(16) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `billion_articoli`
--
ALTER TABLE `billion_articoli`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `billion_carrelli`
--
ALTER TABLE `billion_carrelli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vincolo1` (`idUtente`);

--
-- Indici per le tabelle `billion_categoria`
--
ALTER TABLE `billion_categoria`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `vincolo5` (`idArticolo`);

--
-- Indici per le tabelle `billion_contiene`
--
ALTER TABLE `billion_contiene`
  ADD KEY `vincolo2` (`idArticolo`),
  ADD KEY `vincolo3` (`idCarrello`);

--
-- Indici per le tabelle `billion_ordini`
--
ALTER TABLE `billion_ordini`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vincolo4` (`idCarrello`);

--
-- Indici per le tabelle `billion_recensioni`
--
ALTER TABLE `billion_recensioni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vincolo6` (`idUtente`),
  ADD KEY `vincolo7` (`idArticolo`);

--
-- Indici per le tabelle `billion_utenti`
--
ALTER TABLE `billion_utenti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `billion_articoli`
--
ALTER TABLE `billion_articoli`
  MODIFY `codice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `billion_carrelli`
--
ALTER TABLE `billion_carrelli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `billion_categoria`
--
ALTER TABLE `billion_categoria`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `billion_ordini`
--
ALTER TABLE `billion_ordini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `billion_recensioni`
--
ALTER TABLE `billion_recensioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `billion_utenti`
--
ALTER TABLE `billion_utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `billion_carrelli`
--
ALTER TABLE `billion_carrelli`
  ADD CONSTRAINT `vincolo1` FOREIGN KEY (`idUtente`) REFERENCES `billion_utenti` (`ID`);

--
-- Limiti per la tabella `billion_categoria`
--
ALTER TABLE `billion_categoria`
  ADD CONSTRAINT `vincolo5` FOREIGN KEY (`idArticolo`) REFERENCES `billion_articoli` (`codice`);

--
-- Limiti per la tabella `billion_contiene`
--
ALTER TABLE `billion_contiene`
  ADD CONSTRAINT `vincolo2` FOREIGN KEY (`idArticolo`) REFERENCES `billion_articoli` (`codice`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vincolo3` FOREIGN KEY (`idCarrello`) REFERENCES `billion_carrelli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `billion_ordini`
--
ALTER TABLE `billion_ordini`
  ADD CONSTRAINT `vincolo4` FOREIGN KEY (`idCarrello`) REFERENCES `billion_carrelli` (`id`);

--
-- Limiti per la tabella `billion_recensioni`
--
ALTER TABLE `billion_recensioni`
  ADD CONSTRAINT `vincolo6` FOREIGN KEY (`idUtente`) REFERENCES `billion_utenti` (`ID`),
  ADD CONSTRAINT `vincolo7` FOREIGN KEY (`idArticolo`) REFERENCES `billion_articoli` (`codice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
