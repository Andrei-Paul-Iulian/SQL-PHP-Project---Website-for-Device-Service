-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 04:03 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `angajat`
--

CREATE TABLE `angajat` (
  `ID_Angajat` int(11) NOT NULL,
  `Nume_Angajat` varchar(20) NOT NULL,
  `Prenume_Angajat` varchar(20) NOT NULL,
  `E-mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angajat`
--

INSERT INTO `angajat` (`ID_Angajat`, `Nume_Angajat`, `Prenume_Angajat`, `E-mail`) VALUES
(1, 'Andrei', 'Paul', 'andreipaul@gmail.com'),
(2, 'Grosoiu', 'Andrei', 'grosoiuandrei@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `ID_Client` int(11) NOT NULL,
  `textNume` varchar(20) NOT NULL,
  `textPrenume` varchar(20) NOT NULL,
  `textTelefon` varchar(10) NOT NULL,
  `textEmail` varchar(30) NOT NULL,
  `textAdresa` varchar(30) NOT NULL,
  `textOras` varchar(20) NOT NULL,
  `textJudet` varchar(20) NOT NULL,
  `textParola` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`ID_Client`, `textNume`, `textPrenume`, `textTelefon`, `textEmail`, `textAdresa`, `textOras`, `textJudet`, `textParola`) VALUES
(2, 'Paul-Iulian', 'Andrei', '0766233270', 'andreipauliulian16@gmail.com', 'calea vitan', 'Bucuresti', 'Bucuresti', 'abc'),
(6, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `corespondenta`
--

CREATE TABLE `corespondenta` (
  `ID_Client` int(11) NOT NULL,
  `ID_Serviciu` int(11) NOT NULL,
  `ID_Angajat` int(11) NOT NULL,
  `ID_Dispozitiv` int(11) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dispozitive`
--

CREATE TABLE `dispozitive` (
  `ID_Dispozitiv` int(11) NOT NULL,
  `Nume_dispozitiv` varchar(20) NOT NULL,
  `Tip_Dispozitiv` varchar(40) NOT NULL,
  `Nume_Serviciu` varchar(40) NOT NULL,
  `ID_Client` int(11) NOT NULL,
  `ID_Angajat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dispozitive`
--

INSERT INTO `dispozitive` (`ID_Dispozitiv`, `Nume_dispozitiv`, `Tip_Dispozitiv`, `Nume_Serviciu`, `ID_Client`, `ID_Angajat`) VALUES
(14, 'Iphone 8', 'Telefon', 'Instalare OS', 6, 1),
(15, 'ASUS TUF', 'Laptop', 'Schimbare Baterie', 6, 2),
(16, 'PC Intel 7', 'Calculator', 'Curatare', 6, 1),
(17, 'Tableta Xiaomi', 'Tableta', 'Schimbare Baterie', 6, 2),
(20, 'Samsung S8', 'Telefon', 'Schimbare Baterie', 2, 2),
(22, 'ASUS Vivo Book', 'Laptop', 'Curatare', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facturi`
--

CREATE TABLE `facturi` (
  `ID_Factura` int(11) NOT NULL,
  `ID_Client` int(11) NOT NULL,
  `ID_Dispozitiv` int(11) NOT NULL,
  `Cost_Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `servicii`
--

CREATE TABLE `servicii` (
  `ID_Serviciu` int(11) NOT NULL,
  `Nume_Serviciu` varchar(20) NOT NULL,
  `Durata_Reparatie` int(11) NOT NULL,
  `Cost_Serviciu` int(11) NOT NULL,
  `ID_Angajat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicii`
--

INSERT INTO `servicii` (`ID_Serviciu`, `Nume_Serviciu`, `Durata_Reparatie`, `Cost_Serviciu`, `ID_Angajat`) VALUES
(1, 'Curatare', 2, 200, 1),
(2, 'Schimbare Baterie', 3, 400, 2),
(3, 'Reconfigurare', 6, 650, 2),
(4, 'Instalare OS', 8, 1100, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angajat`
--
ALTER TABLE `angajat`
  ADD PRIMARY KEY (`ID_Angajat`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`ID_Client`);

--
-- Indexes for table `corespondenta`
--
ALTER TABLE `corespondenta`
  ADD PRIMARY KEY (`Data`);

--
-- Indexes for table `dispozitive`
--
ALTER TABLE `dispozitive`
  ADD PRIMARY KEY (`ID_Dispozitiv`);

--
-- Indexes for table `facturi`
--
ALTER TABLE `facturi`
  ADD PRIMARY KEY (`ID_Factura`);

--
-- Indexes for table `servicii`
--
ALTER TABLE `servicii`
  ADD PRIMARY KEY (`ID_Serviciu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angajat`
--
ALTER TABLE `angajat`
  MODIFY `ID_Angajat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `ID_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dispozitive`
--
ALTER TABLE `dispozitive`
  MODIFY `ID_Dispozitiv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `facturi`
--
ALTER TABLE `facturi`
  MODIFY `ID_Factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicii`
--
ALTER TABLE `servicii`
  MODIFY `ID_Serviciu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dispozitive`
--
ALTER TABLE `dispozitive`
  ADD CONSTRAINT `dispozitive_ibfk_1` FOREIGN KEY (`ID_Client`) REFERENCES `clienti` (`ID_Client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
