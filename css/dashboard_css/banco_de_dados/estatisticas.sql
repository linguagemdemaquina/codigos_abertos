-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/07/2025 às 21:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `indicadores_manutencao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `estatisticas`
--

CREATE TABLE `estatisticas` (
  `cod` int(11) NOT NULL,
  `tipo_de_falha` varchar(32) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `mes` varchar(3) NOT NULL,
  `resolucao` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estatisticas`
--

INSERT INTO `estatisticas` (`cod`, `tipo_de_falha`, `quantidade`, `mes`, `resolucao`) VALUES
(1, 'Elétrica', 2, '1', 'resolvidas'),
(2, 'Mecânica', 6, '1', 'resolvidas'),
(3, 'Instrumentação', 9, '1', 'resolvidas'),
(4, 'Elétrica', 3, '2', 'resolvidas'),
(5, 'Mecânica', 7, '2', 'resolvidas'),
(6, 'Instrumentação', 6, '2', 'com pendências'),
(7, 'Elétrica', 1, '3', 'resolvidas'),
(8, 'Mecânica', 4, '3', 'com pendências'),
(9, 'Instrumentação', 5, '3', 'em andamento'),
(10, 'Elétrica', 3, '4', 'em andamento'),
(11, 'Mecânica', 5, '4', 'em andamento'),
(12, 'Instrumentação', 8, '4', 'não resolvidas'),
(13, 'Elétrica', 4, '5', 'não resolvidas'),
(14, 'Mecânica', 8, '5', 'em andamento'),
(15, 'Instrumentação', 4, '5', 'não resolvidas'),
(16, 'Elétrica', 2, '6', 'não resolvidas'),
(17, 'Mecânica', 3, '6', 'não resolvidas'),
(18, 'Instrumentação', 4, '6', 'não resolvidas'),
(19, 'Elétrica', 7, '7', 'não resolvidas'),
(20, 'Mecânica', 2, '7', 'não resolvidas'),
(21, 'Instrumentação', 3, '7', 'não resolvidas');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `estatisticas`
--
ALTER TABLE `estatisticas`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estatisticas`
--
ALTER TABLE `estatisticas`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
