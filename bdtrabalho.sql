-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Ago-2017 às 03:52
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdtrabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `cd_conta` int(11) NOT NULL,
  `nm_conta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vl_conta` decimal(10,2) NOT NULL,
  `cd_transacao_conta` int(11) NOT NULL,
  `dt_vencimento_conta` date NOT NULL,
  `dt_pagamento_conta` date DEFAULT NULL,
  `cd_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`cd_conta`, `nm_conta`, `vl_conta`, `cd_transacao_conta`, `dt_vencimento_conta`, `dt_pagamento_conta`, `cd_pessoa`) VALUES
(2, 'teste15.08', '1.00', 1, '2017-08-09', '2017-08-03', 1),
(3, 'teste15.08', '1.00', 1, '2017-08-03', '2017-08-03', 2),
(4, 'teste15.08', '1.00', 1, '2017-08-03', '2017-08-03', 2),
(5, 'teste15.083', '0.00', 1, '2017-08-01', '2017-08-02', 2),
(6, 'teste', '-2.00', 1, '2017-08-03', '2017-08-11', 2),
(7, 'teste', '10.00', 1, '2017-08-07', '2017-08-16', 2),
(8, 'teste', '1.00', 1, '2017-08-16', '2017-08-11', 2),
(9, 'teste', '1.00', 1, '2017-08-01', '2017-08-15', 1),
(10, 'teste', '-3.00', 1, '2017-08-24', '2017-08-02', 1),
(11, 'teste', '-4.00', 1, '2017-08-16', '2017-08-21', 1),
(12, 'teste', '1.00', 1, '2017-08-17', '2017-08-18', 1),
(13, 'teste', '-1.00', 1, '2017-08-09', '2017-08-09', 1),
(14, '', '0.00', 1, '0000-00-00', '0000-00-00', 1),
(15, '', '0.00', 1, '0000-00-00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `cd_pessoa` int(11) NOT NULL,
  `nm_pessoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cd_documento_pessoa` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nm_endereco_pessoa` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cd_ddd_pessoa` int(11) NOT NULL,
  `cd_telefone_pessoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nm_tipo_pessoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cd_cep_pessoa` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nm_email_pessoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nm_status_pessoa` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`cd_pessoa`, `nm_pessoa`, `cd_documento_pessoa`, `nm_endereco_pessoa`, `cd_ddd_pessoa`, `cd_telefone_pessoa`, `nm_tipo_pessoa`, `cd_cep_pessoa`, `nm_email_pessoa`, `nm_status_pessoa`) VALUES
(1, 'AndrÃ©', '11111111111', 'rua falsa', 0, '', 'Fisica', 'andre@.com', '123456789', 'Cliente'),
(2, 'anna', '33333333333', 'rua falsa', 0, '13', 'Fisica', 'andre@.com', '1234567', 'Cliente'),
(3, 'AndrÃ©', '44444444444', 'rua falsa', 11111, '13', 'Fisica', 'andre@.com', '1234567', 'Cliente'),
(4, 'empresa falsa', '22222222222222', 'rua', 13, '9874561', 'Juridica', '11701-190', 'asdf@.com', 'Fornecedor'),
(24, 'Empresa boa', '22222222222222', '5', 5, '5', 'Juridica', '5', '5', 'Cliente'),
(30, 'teste', '22222222222222', '5', 5, '5', 'Juridica', '5', '5', 'Cliente'),
(31, '5', '22222222222222', '5', 5, '5', 'Juridica', '5', '5', 'Cliente'),
(32, '5', '5', '5', 5, '5', 'Fisica', '5', '5', 'Cliente'),
(33, 'teste2', '11111111112', '5', 5, '5', 'Fisica', '5', '5', 'Cliente'),
(34, 'empresa teste', '33333333333333', '5', 5, '5', 'Juridica', '5', '5', 'Cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`cd_conta`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`cd_pessoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `cd_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `cd_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
