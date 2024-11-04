-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Out-2024 às 14:53
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

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
-- Estrutura da tabela `dispositivo`
--

CREATE TABLE `dispositivo` (
  `ID_dispositivo` int(255) NOT NULL,
  `Tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dispositivo`
--

INSERT INTO `dispositivo` (`ID_dispositivo`, `Tipo`) VALUES
(1, 'Mouse'),
(2, 'Monitor'),
(3, 'Teclado'),
(4, 'Carregador'),
(5, 'Gabinete'),
(6, 'Pasta Térmica'),
(7, 'Ventoinha'),
(8, 'Televisão'),
(9, 'Porta USB'),
(10, 'Porta RJ45'),
(11, 'Fonte'),
(12, 'Roteador'),
(13, 'Memória'),
(14, 'Indefinido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `Id_pedido` int(255) NOT NULL,
  `Data` date DEFAULT NULL,
  `Descrição` varchar(255) DEFAULT NULL,
  `Solucao` varchar(255) DEFAULT NULL,
  `ID_usuario` int(255) DEFAULT NULL,
  `ID_status` int(255) DEFAULT NULL,
  `ID_tecnico` int(255) DEFAULT NULL,
  `ID_dispositivo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `ID_status` int(255) NOT NULL,
  `Tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `ID_tecnico` int(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telefone` int(11) DEFAULT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Formação` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(255) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Cpf` int(11) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `Administrator` bit(1) DEFAULT NULL,
  `Complemento` int(255) DEFAULT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Cidade` varchar(255) DEFAULT NULL,
  `Numero` int(255) DEFAULT NULL,
  `Rua` varchar(255) DEFAULT NULL,
  `Cep` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`ID_dispositivo`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id_pedido`),
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `ID_dispositivo` (`ID_dispositivo`),
  ADD KEY `ID_tecnico` (`ID_tecnico`),
  ADD KEY `ID_status` (`ID_status`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_status`);

--
-- Índices para tabela `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`ID_tecnico`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`ID_dispositivo`) REFERENCES `dispositivo` (`ID_dispositivo`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`ID_tecnico`) REFERENCES `tecnico` (`ID_tecnico`),
  ADD CONSTRAINT `pedido_ibfk_4` FOREIGN KEY (`ID_status`) REFERENCES `status` (`ID_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
