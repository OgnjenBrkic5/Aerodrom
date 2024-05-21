-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 10:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aerodrom`
--

-- --------------------------------------------------------

--
-- Table structure for table `avioni`
--

CREATE TABLE `avioni` (
  `id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `broj_sedista` int(11) NOT NULL,
  `avion_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `avioni`
--

INSERT INTO `avioni` (`id`, `model`, `broj_sedista`, `avion_id`) VALUES
(1, 'boing747', 123, 0),
(2, 'JAT 45', 45, 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lozinka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `email`, `lozinka`) VALUES
(1, 'Brad Pitt', 'admin@gmail.com', '$2y$10$dWZy5p0NRGXCFviG9aj1FetajlbSMI2cru1iNk.VCU9qtD7wcKqqm'),
(2, 'Marko Kraljevic', 'admir@gmail.com', '$2y$10$mmoA0bKSYntMz5zIarFYi.sFKcQ/Wmy5PhFdPo7VB7I28CMv498Ke'),
(3, 'Jane Doe', 'janedoe7@gmail.com', '$2y$10$VmFkdezhwWRHY9Dq6rRAMutW/0pMyV72ssm1qZ.lEyRd4SgBzGpGu'),
(4, 'Koviljka Spasic', 'kspasic123@gmail.com', '$2y$10$0BvsFYX3Li9z3w1aDMZmYOoCNK0hxN0391bPATWUuAjttxlditmdO'),
(5, 'Bogdan Vejnovic', 'bogdv89@gmail.com', '$2y$10$FgODnTo5BGS9Tnc1BUyMOO0BfACRHzs9B8t2jN0rBjNsuVyPhaiku');

-- --------------------------------------------------------

--
-- Table structure for table `letovi`
--

CREATE TABLE `letovi` (
  `id` int(11) NOT NULL,
  `broj_leta` int(30) NOT NULL,
  `polazni_grad` varchar(100) NOT NULL,
  `dolazni_grad` varchar(100) NOT NULL,
  `vreme_polaska` datetime NOT NULL,
  `vreme_dolaska` datetime NOT NULL,
  `avion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `letovi`
--

INSERT INTO `letovi` (`id`, `broj_leta`, `polazni_grad`, `dolazni_grad`, `vreme_polaska`, `vreme_dolaska`, `avion_id`) VALUES
(7, 747, 'Madrid', 'Beograd', '2024-05-20 12:06:00', '2024-05-20 15:06:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prtljag`
--

CREATE TABLE `prtljag` (
  `id` int(11) NOT NULL,
  `sifra_prtljaga` int(50) NOT NULL,
  `tezina` float NOT NULL,
  `putnik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `putnici`
--

CREATE TABLE `putnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `broj_pasosa` int(255) NOT NULL,
  `let_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avioni`
--
ALTER TABLE `avioni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letovi`
--
ALTER TABLE `letovi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_avion` (`avion_id`);

--
-- Indexes for table `prtljag`
--
ALTER TABLE `prtljag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_putnik` (`putnik_id`);

--
-- Indexes for table `putnici`
--
ALTER TABLE `putnici`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Veza` (`let_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avioni`
--
ALTER TABLE `avioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `letovi`
--
ALTER TABLE `letovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prtljag`
--
ALTER TABLE `prtljag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `putnici`
--
ALTER TABLE `putnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `letovi`
--
ALTER TABLE `letovi`
  ADD CONSTRAINT `fk_avion` FOREIGN KEY (`avion_id`) REFERENCES `avioni` (`id`);

--
-- Constraints for table `prtljag`
--
ALTER TABLE `prtljag`
  ADD CONSTRAINT `fk_putnik` FOREIGN KEY (`putnik_id`) REFERENCES `putnici` (`id`);

--
-- Constraints for table `putnici`
--
ALTER TABLE `putnici`
  ADD CONSTRAINT `Veza` FOREIGN KEY (`let_id`) REFERENCES `letovi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
