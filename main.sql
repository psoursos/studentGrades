-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: db
-- Χρόνος δημιουργίας: 28 Νοε 2019 στις 20:20:56
-- Έκδοση διακομιστή: 5.7.20
-- Έκδοση PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `main`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Students`
--

CREATE TABLE `Students` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `grade` float NOT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `Students`
--

INSERT INTO `Students` (`id`, `name`, `surname`, `fathername`, `grade`, `mobilenumber`, `birthday`) VALUES
(39, 'Petros', 'Soursos', 'Athanasios', 6.5, '6984099924', '1990-03-21'),
(47, 'Petros', 'Fotiou', 'Fotis', 5, '6940179928', '2019-11-15'),
(55, 'Manos', 'Stokos', 'Panos', 1.7, '6984056724', '2019-11-16'),
(56, 'Giannis', 'Mpezos', 'Manos', 7.6, '6924963921', '2019-11-16'),
(65, 'Manos', 'Pepis', 'Athanasios', 6, '6932844958', '2019-11-05'),
(68, 'Sam', 'Bridges', 'Porter', 7.6, '6932345456', '2019-11-15'),
(71, 'Thanos', 'Veggos', 'Patera', 10, '698000000', '2019-11-09'),
(122, 'Panagiotis', 'mixas', 'Stamatis', 7.6, '6984839972', '2019-11-17'),
(123, 'Mixalis', 'Stathis', 'Georgios', 7.9, '6984439016', '2019-11-17'),
(124, 'Maria', 'Petrou', 'Stamos', 6.9, '6973329341', '2019-11-17'),
(125, 'Gianna', 'Foka', 'Fotis', 8, '695499923', '2019-11-18'),
(126, 'Stamatina', 'Georgiou', 'Manos', 7.2, '6942199123', '2019-11-08'),
(127, 'Lampis', 'Lamprou', 'Manolis', 5.8, '6986270023', '2019-11-19'),
(128, 'Marina', 'Soti', 'Xaris', 8.4, '6978999306', '2019-11-16');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Teachers`
--

CREATE TABLE `Teachers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `Teachers`
--

INSERT INTO `Teachers` (`id`, `name`, `surname`, `username`, `password`, `email`) VALUES
(1, 'nteacher1', 'steacher1', 'teacher1', 'teacher1', 'teacher1@teacher1.com'),
(2, 'ds', 'dsf', 'ds', 'ds', 'PETROS_DKS@HOTMAIL.COM'),
(3, 'sa', 'sa', 'sa', 'sa', 'sa');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `Teachers`
--
ALTER TABLE `Teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `Students`
--
ALTER TABLE `Students`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT για πίνακα `Teachers`
--
ALTER TABLE `Teachers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
