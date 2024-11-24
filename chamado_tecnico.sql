-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/11/2024 às 21:16
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
-- Banco de dados: `chamado_tecnico`
--
CREATE DATABASE IF NOT EXISTS `chamado_tecnico` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chamado_tecnico`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `servico` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `ID_tecnico` int(11) DEFAULT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `ID_usuario`, `servico`, `descricao`, `data_pedido`, `ID_tecnico`, `Status`) VALUES
(12, 9, 'infraestrutura', 'Teste final', '2024-11-24 20:09:42', NULL, 'Pendente'),
(13, 9, 'software', 'aa', '2024-11-24 20:10:50', 3, 'Andamento');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `ID_tecnico` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `telefone` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tecnico`
--

INSERT INTO `tecnico` (`ID_tecnico`, `nome`, `email`, `senha`, `cpf`, `telefone`) VALUES
(2, 'Thiago', 'thiagomorangoni@gmail.com', '$2y$10$hLFbt7RemGFxYjoTclLoJuJpKxPCh05Ot/DJWsOfXGhKdkRIg6R8e', '30299510816', 2147483647),
(3, 'teste', 'teste@email.com', '$2y$10$Jm5sOCy56TF/SD/ecmUareCUbd9ivhdQgW6cca/cpf6ZFAhkmtIq.', '12345678900', 999999999);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(255) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `telefone` int(11) DEFAULT NULL,
  `Administrator` bit(1) DEFAULT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `Nome`, `Email`, `telefone`, `Administrator`, `senha`) VALUES
(9, 'Joao Pedro', 'jao@email.com', 999999999, b'1', '$2y$10$p/EufVJPUoqyM/sc5yrPTOU9tkPKCxOQSYDJ9sIj857jRuLhUaciG'),
(10, 'sla', 'sla@gmail.com', 908876543, NULL, '$2y$10$I4zA19iTww.cn4OR1h3CgOw7X1zo/TnC1lVwEi8Lpcg6aDDlpE0tu');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `ID_tecnico` (`ID_tecnico`);

--
-- Índices de tabela `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`ID_tecnico`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `ID_tecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`ID_tecnico`) REFERENCES `tecnico` (`ID_tecnico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
