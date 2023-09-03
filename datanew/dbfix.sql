-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 09:59 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfix`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `last_activity` varchar(255) NOT NULL,
  `user_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1f93e43277066b76d85385d8298aa042', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '1688125742', 'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"LoggedIn\";b:1;s:5:\"email\";s:16:\"amrit@dsmnru.com\";}'),
('4870b2502b8e7454502c8aaf64155773', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '1688122674', 'a:3:{s:9:\"user_data\";s:0:\"\";s:8:\"LoggedIn\";b:1;s:5:\"email\";s:16:\"amrit@dsmnru.com\";}');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `id` int(4) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `indirizzo` varchar(30) NOT NULL,
  `citta` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `vat` varchar(30) NOT NULL,
  `cf` varchar(30) NOT NULL,
  `data` date NOT NULL,
  `commenti` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`id`, `nome`, `cognome`, `telefono`, `indirizzo`, `citta`, `email`, `vat`, `cf`, `data`, `commenti`) VALUES
(3, 'Krishna', 'Sohane', '89877989878', 'Orai', 'Orai', 'ashhu@jij.com', '123@as', '123@a', '2023-02-04', ''),
(4, 'Ranjeet', 'kumar', '829899', 'ora', 'vn', 'Ran@123.com', '001', '909', '2023-02-04', 'anvjnerjvnj'),
(5, 'Prem', ' Babu', '9892789838', 'Kushinagar', 'Vedvayaspuri', 'admin@ooo.com', '90990', '0000', '2023-06-08', ''),
(6, 'Dev', 'Sir', '8797797367', 'Lucknow', 'Lucknow', 'admin@ooo.com', '121', '121', '2023-06-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `impostazioni`
--

CREATE TABLE `impostazioni` (
  `id` int(4) NOT NULL,
  `titolo` text NOT NULL,
  `lingua` text NOT NULL,
  `showcredit` int(11) NOT NULL,
  `disclaimer` varchar(370) NOT NULL,
  `skebby_user` text NOT NULL,
  `skebby_pass` text NOT NULL,
  `skebby_name` text NOT NULL,
  `skebby_method` text NOT NULL,
  `admin_user` varchar(40) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `valuta` text NOT NULL,
  `indirizzo` varchar(40) NOT NULL,
  `invoice_mail` varchar(40) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `invoice_type` text NOT NULL,
  `tax` decimal(30,0) NOT NULL,
  `invoice_name` text NOT NULL,
  `categorie` varchar(500) NOT NULL,
  `twilio_mode` varchar(20) NOT NULL,
  `twilio_account_sid` varchar(90) NOT NULL,
  `twilio_auth_token` varchar(90) NOT NULL,
  `twilio_number` varchar(20) NOT NULL,
  `prefix_number` int(5) NOT NULL,
  `usesms` int(2) NOT NULL,
  `r_apertura` varchar(200) NOT NULL,
  `r_chiusura` varchar(200) NOT NULL,
  `colore1` text NOT NULL,
  `colore2` text NOT NULL,
  `colore3` text NOT NULL,
  `colore4` text NOT NULL,
  `colore5` text NOT NULL,
  `colore_prim` varchar(24) NOT NULL,
  `logo` varchar(24) NOT NULL,
  `campi_personalizzati` varchar(500) NOT NULL,
  `stampadue` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `impostazioni`
--

INSERT INTO `impostazioni` (`id`, `titolo`, `lingua`, `showcredit`, `disclaimer`, `skebby_user`, `skebby_pass`, `skebby_name`, `skebby_method`, `admin_user`, `admin_password`, `valuta`, `indirizzo`, `invoice_mail`, `telefono`, `vat`, `invoice_type`, `tax`, `invoice_name`, `categorie`, `twilio_mode`, `twilio_account_sid`, `twilio_auth_token`, `twilio_number`, `prefix_number`, `usesms`, `r_apertura`, `r_chiusura`, `colore1`, `colore2`, `colore3`, `colore4`, `colore5`, `colore_prim`, `logo`, `campi_personalizzati`, `stampadue`) VALUES
(1, 'dsmnru-repair', 'english', 0, 'Insert here your disclaimer. (Visible on invoice footer)', '', '', '', '', 'amrit@dsmnru.com', 'amrit', 'INR', 'Your complete address', 'yourbusiness@mail.com', '(39)0000000000', '##00000000000', 'INR', '7', 'Nome Cognome', 'Computer\r\nSmartphone', 'prod', '', '', '', 91, 1, 'Hello %customer%, your order/repair for %model% was opened by %businessname%. Check the state of repair on %fixbookurl%.\nStatus code: (%statuscode%)', 'Hello %customer%, your order/repair fo %model% has been completed, come to %businessname% for take it. Thanks for choosing us.', '#3dc45b', '#f27705', '#a8a8a8', '#d61a1a', '#2b2b2b', '#940d6e', 'logo_nav.png?7', 'YToyOntpOjA7czo0OiJJTUVJIjtpOjE7czo2OiJDdXN0b20iO30=', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oggetti`
--

CREATE TABLE `oggetti` (
  `ID` int(255) NOT NULL,
  `Nominativo` varchar(255) NOT NULL,
  `ID_Nominativo` int(11) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `sms` int(1) NOT NULL DEFAULT '0',
  `Tipo` int(1) NOT NULL,
  `Guasto` text NOT NULL,
  `Categoria` varchar(255) NOT NULL,
  `Modello` varchar(255) NOT NULL,
  `Pezzo` varchar(255) DEFAULT NULL,
  `Anticipo` int(11) NOT NULL,
  `Prezzo` int(255) NOT NULL,
  `dataApertura` datetime NOT NULL,
  `dataChiusura` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '3',
  `Commenti` varchar(500) NOT NULL,
  `codice` varchar(20) NOT NULL,
  `custom_field` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oggetti`
--

INSERT INTO `oggetti` (`ID`, `Nominativo`, `ID_Nominativo`, `Telefono`, `sms`, `Tipo`, `Guasto`, `Categoria`, `Modello`, `Pezzo`, `Anticipo`, `Prezzo`, `dataApertura`, `dataChiusura`, `status`, `Commenti`, `codice`, `custom_field`) VALUES
(1, 'John Doe', 1, '0000000000', 0, 2, 'Virus - Not start', 'Computer', 'Compaq', '', 20, 50, '2015-08-28 17:06:00', NULL, 5, 'Formatting system', 'compjohn', '{\"494d4549\":\"IMEI Value\",\"437573746f6d\":\"Custom Value\"}'),
(5, 'Mario Rossi', 2, '0000000000', 0, 1, 'Glass Broken', 'Smartphone', 'Lumia 635', 'ljkljk', 10, 20, '2015-10-28 13:36:55', NULL, 1, 'Comment here', 'test', '{\"494d4549\":\"IMEI Value\",\"437573746f6d\":\"Custom Value\"}'),
(6, 'Krishna Sohane', 3, '89877989878', 0, 1, 'screen replacement', 'Computer', 'note 7', 'screen', 0, 676, '2023-02-04 09:03:34', '2023-02-04 09:04:09', 2, 'jijijji', '8889', '{\"494d4549\":\"86888868hgyy\",\"437573746f6d\":\",lmlm\"}'),
(7, 'Krishna Sohane', 3, '89877989878', 0, 2, 'screen replacement', 'Smartphone', 'note 7', '', 0, 676, '2023-02-04 09:18:41', NULL, 3, '', '', '{\"494d4549\":\"\",\"437573746f6d\":\"\"}'),
(8, 'Krishna Sohane', 3, '89877989878', 0, 1, 'screen replacement', 'Smartphone', 'note 7', 'screen', 0, 676, '2023-02-04 10:04:13', NULL, 1, '', '999', '{\"494d4549\":\"\",\"437573746f6d\":\"\"}'),
(9, 'Ranjeet kumar', 4, '829899', 0, 1, 'camera', 'Smartphone', 'realme', '89', 0, 9000, '2023-02-04 10:44:09', NULL, 0, '', '12111', '{\"494d4549\":\"hrfrh2943\",\"437573746f6d\":\",lmlm\"}'),
(18, 'Dev Sir', 6, '8797797367', 0, 1, 'Ram relacement', 'Computer', 'DDR2', '01', 2111, 4111, '2023-06-20 11:08:13', NULL, 2, '', '111777', '{\"494d4549\":\"\",\"437573746f6d\":\"none\"}'),
(11, 'Krishna Sohane', 3, '89877989878', 0, 1, 'screen replacement', 'Smartphone', 'realme', '909090', 2333, 6766, '2023-02-04 18:12:04', NULL, 2, '', '4545', '{\"494d4549\":\"8968986\",\"437573746f6d\":\"\"}'),
(19, 'Dev Sir', 6, '8797797367', 0, 1, 'screen replacement', 'Smartphone', 'realme', '909090', 0, 6766, '2023-06-30 13:45:22', '2023-06-30 13:47:08', 0, '', '45455', '{\"494d4549\":\"8968986\",\"437573746f6d\":\",lmlm\"}'),
(13, 'Ranjeet kumar', 4, '829899', 0, 2, 'screen replacement', 'Smartphone', 'note 7', '', 300, 500, '2023-03-14 10:44:20', '2023-06-05 06:40:41', 1, '', '2222', '{\"494d4549\":\"8764648623627\",\"437573746f6d\":\"\"}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impostazioni`
--
ALTER TABLE `impostazioni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oggetti`
--
ALTER TABLE `oggetti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `impostazioni`
--
ALTER TABLE `impostazioni`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oggetti`
--
ALTER TABLE `oggetti`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
