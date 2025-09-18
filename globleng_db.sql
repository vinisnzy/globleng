-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/09/2025 às 03:05
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
-- Banco de dados: `globleng_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `passagem_id` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `data_avaliacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `passagem_id` int(11) NOT NULL,
  `valor_pago` decimal(10,2) NOT NULL,
  `status` enum('pendente','confirmada','cancelada','reembolsada') NOT NULL DEFAULT 'confirmada',
  `data_compra` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `passagem_id` int(11) NOT NULL,
  `data_favoritado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `passagens`
--

CREATE TABLE `passagens` (
  `id` int(11) NOT NULL,
  `origem` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `duracao_voo` time NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `passagens`
--

INSERT INTO `passagens` (`id`, `origem`, `destino`, `duracao_voo`, `check_in`, `check_out`, `preco`, `data_criacao`) VALUES
(1, 'São Paulo', 'Tóquio', '23:30:00', '2025-09-05', '2025-09-20', 4500.00, '2025-08-30 13:05:27'),
(2, 'Rio de Janeiro', 'Tóquio', '23:45:00', '2025-09-10', '2025-09-25', 4700.50, '2025-08-30 13:05:27'),
(3, 'Brasília', 'Tóquio', '24:00:00', '2025-09-15', '2025-09-30', 4600.75, '2025-08-30 13:05:27'),
(4, 'Curitiba', 'Tóquio', '23:50:00', '2025-10-01', '2025-10-16', 4800.20, '2025-08-30 13:05:27'),
(5, 'Fortaleza', 'Tóquio', '24:10:00', '2025-10-05', '2025-10-20', 4900.00, '2025-08-30 13:05:27'),
(6, 'São Paulo', 'Toronto', '10:30:00', '2025-09-05', '2025-09-15', 3200.00, '2025-08-30 13:25:21'),
(7, 'Rio de Janeiro', 'Toronto', '11:00:00', '2025-09-10', '2025-09-20', 3400.50, '2025-08-30 13:25:21'),
(8, 'Brasília', 'Toronto', '10:45:00', '2025-09-12', '2025-09-22', 3300.75, '2025-08-30 13:25:21'),
(9, 'Curitiba', 'Toronto', '10:50:00', '2025-10-01', '2025-10-11', 3500.20, '2025-08-30 13:25:21'),
(10, 'Fortaleza', 'Toronto', '11:15:00', '2025-10-05', '2025-10-15', 3600.00, '2025-08-30 13:25:21'),
(11, 'São Paulo', 'Zermatt', '14:30:00', '2025-09-05', '2025-09-15', 5200.00, '2025-08-30 13:25:54'),
(12, 'Rio de Janeiro', 'Zermatt', '14:50:00', '2025-09-10', '2025-09-20', 5400.50, '2025-08-30 13:25:54'),
(13, 'Brasília', 'Zermatt', '15:10:00', '2025-09-12', '2025-09-22', 5300.75, '2025-08-30 13:25:54'),
(14, 'Curitiba', 'Zermatt', '14:45:00', '2025-10-01', '2025-10-11', 5500.20, '2025-08-30 13:25:54'),
(15, 'Fortaleza', 'Zermatt', '15:20:00', '2025-10-05', '2025-10-15', 5600.00, '2025-08-30 13:25:54'),
(16, 'São Paulo', 'Bariloche', '03:00:00', '2025-09-05', '2025-09-10', 850.00, '2025-08-30 13:26:21'),
(17, 'Rio de Janeiro', 'Bariloche', '03:15:00', '2025-09-08', '2025-09-13', 900.50, '2025-08-30 13:26:21'),
(18, 'Brasília', 'Bariloche', '03:10:00', '2025-09-12', '2025-09-17', 880.75, '2025-08-30 13:26:21'),
(19, 'Curitiba', 'Bariloche', '03:05:00', '2025-10-01', '2025-10-06', 920.20, '2025-08-30 13:26:21'),
(20, 'Fortaleza', 'Bariloche', '03:20:00', '2025-10-05', '2025-10-10', 940.00, '2025-08-30 13:26:21'),
(21, 'São Paulo', 'Londres', '11:15:00', '2025-09-05', '2025-09-20', 4200.00, '2025-08-30 13:27:34'),
(22, 'Rio de Janeiro', 'Londres', '11:30:00', '2025-09-10', '2025-09-25', 4300.50, '2025-08-30 13:27:34'),
(23, 'Brasília', 'Londres', '11:20:00', '2025-09-15', '2025-09-30', 4250.75, '2025-08-30 13:27:34'),
(24, 'Curitiba', 'Londres', '11:25:00', '2025-10-01', '2025-10-16', 4400.20, '2025-08-30 13:27:34'),
(25, 'Fortaleza', 'Londres', '11:40:00', '2025-10-05', '2025-10-20', 4500.00, '2025-08-30 13:27:34'),
(26, 'São Paulo', 'Cidade do Cabo', '10:50:00', '2025-09-05', '2025-09-20', 4800.00, '2025-08-30 13:27:34'),
(27, 'Rio de Janeiro', 'Cidade do Cabo', '11:05:00', '2025-09-10', '2025-09-25', 4900.50, '2025-08-30 13:27:34'),
(28, 'Brasília', 'Cidade do Cabo', '10:55:00', '2025-09-15', '2025-09-30', 4850.75, '2025-08-30 13:27:34'),
(29, 'Curitiba', 'Cidade do Cabo', '11:00:00', '2025-10-01', '2025-10-16', 5000.20, '2025-08-30 13:27:34'),
(30, 'Fortaleza', 'Cidade do Cabo', '11:15:00', '2025-10-05', '2025-10-20', 5100.00, '2025-08-30 13:27:34'),
(31, 'São Paulo', 'Dubai', '14:30:00', '2025-09-05', '2025-09-20', 5500.00, '2025-08-30 13:27:34'),
(32, 'Rio de Janeiro', 'Dubai', '14:45:00', '2025-09-10', '2025-09-25', 5600.50, '2025-08-30 13:27:34'),
(33, 'Brasília', 'Dubai', '14:40:00', '2025-09-15', '2025-09-30', 5550.75, '2025-08-30 13:27:34'),
(34, 'Curitiba', 'Dubai', '14:50:00', '2025-10-01', '2025-10-16', 5700.20, '2025-08-30 13:27:34'),
(35, 'Fortaleza', 'Dubai', '15:00:00', '2025-10-05', '2025-10-20', 5800.00, '2025-08-30 13:27:34'),
(36, 'São Paulo', 'Queenstown', '20:30:00', '2025-09-05', '2025-09-25', 6200.00, '2025-08-30 13:27:34'),
(37, 'Rio de Janeiro', 'Queenstown', '20:45:00', '2025-09-10', '2025-09-30', 6300.50, '2025-08-30 13:27:34'),
(38, 'Brasília', 'Queenstown', '20:40:00', '2025-09-15', '2025-10-05', 6250.75, '2025-08-30 13:27:34'),
(39, 'Curitiba', 'Queenstown', '20:50:00', '2025-10-01', '2025-10-21', 6400.20, '2025-08-30 13:27:34'),
(40, 'Fortaleza', 'Queenstown', '21:00:00', '2025-10-05', '2025-10-25', 6500.00, '2025-08-30 13:27:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cpf`, `senha`, `data_criacao`) VALUES
(1, 'Vinícius de Paula Moraes', 'vinicius@gmail.com', '12377576907', '$2y$10$iRKImLEgubhV7qCXPsxJ8.trYnwmul3HGtgVDY8OXed6ZyiMvLuWm', '2025-08-22 11:56:08');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_usuario_passagem` (`usuario_id`,`passagem_id`),
  ADD KEY `FK_avaliacoes_2` (`passagem_id`);

--
-- Índices de tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id` (`usuario_id`,`passagem_id`);

--
-- Índices de tabela `passagens`
--
ALTER TABLE `passagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `passagens`
--
ALTER TABLE `passagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `FK_avaliacoes_2` FOREIGN KEY (`passagem_id`) REFERENCES `passagens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_avaliacoes_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
