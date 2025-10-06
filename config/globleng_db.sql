-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/09/2025 às 20:03
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
  `cidade_id` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `data_avaliacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `reviews` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome`, `pais`, `reviews`) VALUES
(1, 'Tóquio', 'Japão', 12184),
(2, 'Toronto', 'Canadá', 8184),
(3, 'Zermatt', 'Suiça', 10184),
(4, 'Bariloche', 'Argentina', 5184),
(5, 'Londres', 'Reino Unido', 22184),
(6, 'Cidade do Cabo', 'África do Sul', 6184),
(7, 'Dubai', 'Emirados Árabes Unidos', 5184),
(8, 'Queenstown', 'Nova Zelândia', 1184),
(9, 'São Paulo', 'Brasil', 15632),
(10, 'Rio de Janeiro', 'Brasil', 17852),
(11, 'Brasília', 'Brasil', 7451),
(12, 'Curitiba', 'Brasil', 9047),
(13, 'Fortaleza', 'Brasil', 10073),
(14, 'Cascavel', 'Brasil', 5223);

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
  `cidade_origem_id` int(11) NOT NULL,
  `cidade_destino_id` int(11) NOT NULL,
  `duracao_voo` time NOT NULL,
  `check_in` timestamp NOT NULL,
  `check_out` timestamp,
  `preco` decimal(10,2) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `passagens`
--

INSERT INTO `passagens` (`id`, `cidade_origem_id`, `cidade_destino_id`, `duracao_voo`, `check_in`, `check_out`, `preco`) VALUES
(1, 9, 1, '23:40:00', '2025-01-10 23:40:00', '2025-01-25 08:15:00', 5600.00),
(2, 9, 2, '11:20:00', '2025-02-05 11:20:00', '2025-02-18 19:40:00', 3400.00),
(3, 9, 3, '13:30:00', '2025-03-12 13:30:00', '2025-03-25 09:25:00', 3550.00),
(4, 9, 4, '03:10:00', '2025-04-07 03:10:00', '2025-04-15 17:55:00', 1850.00),
(5, 9, 5, '12:15:00', '2025-05-03 12:15:00', '2025-05-15 21:20:00', 3700.00),
(6, 9, 6, '09:45:00', '2025-06-14 09:45:00', '2025-06-28 14:05:00', 3100.00),
(7, 9, 7, '14:25:00', '2025-07-09 14:25:00', '2025-07-21 06:50:00', 4200.00),
(8, 9, 8, '20:00:00', '2025-08-02 20:00:00', '2025-08-17 10:10:00', 6950.00),
(9, 10, 1, '22:55:00', '2025-01-20 22:55:00', '2025-02-05 07:25:00', 5400.00),
(10, 10, 2, '11:40:00', '2025-02-12 11:40:00', '2025-02-25 15:30:00', 3250.00),
(11, 10, 3, '12:20:00', '2025-03-22 12:20:00', '2025-04-02 18:45:00', 3350.00),
(12, 10, 4, '03:35:00', '2025-04-14 03:35:00', '2025-04-21 09:10:00', 1950.00),
(13, 10, 5, '11:30:00', '2025-05-25 11:30:00', '2025-06-08 22:20:00', 3600.00),
(14, 10, 6, '09:15:00', '2025-06-30 09:15:00', '2025-07-12 19:50:00', 3000.00),
(15, 10, 7, '14:50:00', '2025-07-18 14:50:00', '2025-07-30 11:05:00', 4150.00),
(16, 10, 8, '19:45:00', '2025-08-25 19:45:00', '2025-09-10 08:40:00', 7100.00),
(17, 11, 1, '23:59:00', '2025-01-05 23:59:00', '2025-01-20 17:25:00', 5800.00),
(18, 11, 2, '10:50:00', '2025-02-15 10:50:00', '2025-02-28 20:55:00', 3200.00),
(19, 11, 3, '12:10:00', '2025-03-30 12:10:00', '2025-04-12 13:15:00', 3450.00),
(20, 11, 4, '03:20:00', '2025-04-19 03:20:00', '2025-04-25 08:00:00', 1800.00),
(21, 11, 5, '12:05:00', '2025-05-11 12:05:00', '2025-05-23 16:50:00', 3750.00),
(22, 11, 6, '09:30:00', '2025-06-08 09:30:00', '2025-06-20 18:30:00', 3100.00),
(23, 11, 7, '15:00:00', '2025-07-01 15:00:00', '2025-07-15 07:40:00', 4250.00),
(24, 11, 8, '20:25:00', '2025-08-05 20:25:00', '2025-08-18 09:55:00', 7000.00),
(25, 12, 1, '23:20:00', '2025-01-18 23:20:00', '2025-02-02 18:10:00', 5500.00),
(26, 12, 2, '11:10:00', '2025-02-22 11:10:00', '2025-03-05 21:30:00', 3300.00),
(27, 12, 3, '13:00:00', '2025-03-09 13:00:00', '2025-03-20 07:55:00', 3500.00),
(28, 12, 4, '03:25:00', '2025-04-03 03:25:00', '2025-04-12 10:15:00', 1900.00),
(29, 12, 5, '11:45:00', '2025-05-20 11:45:00', '2025-06-01 15:45:00', 3650.00),
(30, 12, 6, '09:55:00', '2025-06-11 09:55:00', '2025-06-24 19:25:00', 3150.00),
(31, 12, 7, '14:40:00', '2025-07-23 14:40:00', '2025-08-05 06:30:00', 4300.00),
(32, 12, 8, '19:30:00', '2025-08-29 19:30:00', '2025-09-12 09:20:00', 7050.00),
(33, 13, 1, '23:55:00', '2025-01-28 23:55:00', '2025-02-12 20:45:00', 5650.00),
(34, 13, 2, '12:20:00', '2025-02-08 12:20:00', '2025-02-22 18:55:00', 3450.00),
(35, 13, 3, '12:45:00', '2025-03-15 12:45:00', '2025-03-28 16:10:00', 3550.00),
(36, 13, 4, '03:40:00', '2025-04-08 03:40:00', '2025-04-16 08:25:00', 2000.00),
(37, 13, 5, '12:30:00', '2025-05-14 12:30:00', '2025-05-27 19:35:00', 3800.00),
(38, 13, 6, '09:25:00', '2025-06-18 09:25:00', '2025-07-01 15:40:00', 3250.00),
(39, 13, 7, '15:05:00', '2025-07-10 15:05:00', '2025-07-23 11:55:00', 4350.00),
(40, 13, 8, '20:15:00', '2025-08-20 20:15:00', '2025-09-03 07:05:00', 7150.00),
(41, 14, 1, '22:40:00', '2025-01-13 22:40:00', '2025-01-29 06:30:00', 5450.00),
(42, 14, 2, '11:25:00', '2025-02-17 11:25:00', '2025-03-01 17:20:00', 3350.00),
(43, 14, 3, '13:10:00', '2025-03-19 13:10:00', '2025-03-31 21:50:00', 3400.00),
(44, 14, 4, '03:05:00', '2025-04-21 03:05:00', '2025-04-28 09:00:00', 1750.00),
(45, 14, 5, '11:50:00', '2025-05-17 11:50:00', '2025-05-30 19:15:00', 3550.00),
(46, 14, 6, '09:10:00', '2025-06-25 09:10:00', '2025-07-07 13:55:00', 3050.00),
(47, 14, 7, '14:35:00', '2025-07-28 14:35:00', '2025-08-09 08:40:00', 4200.00),
(48, 14, 8, '19:55:00', '2025-08-15 19:55:00', '2025-08-29 10:25:00', 6900.00),
(49, 14, 2, '11:40:00', '2025-09-10 11:40:00', '2025-09-22 16:30:00', 3400.00),
(50, 14, 5, '12:10:00', '2025-10-03 12:10:00', '2025-10-16 18:00:00', 3650.00);


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

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cpf`, `senha`) VALUES
(1, 'Teste', 'teste@gmail.com', '12345678901', '$2y$10$iRKImLEgubhV7qCXPsxJ8.trYnwmul3HGtgVDY8OXed6ZyiMvLuWm');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_usuario_passagem` (`usuario_id`,`cidade_id`),
  ADD KEY `FK_avaliacoes_2` (`cidade_id`);

--
-- Índices de tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacoes`, `compras`, `favoritos` e `passagens`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `FK_avaliacoes_2` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_avaliacoes_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

ALTER TABLE `compras`
  ADD CONSTRAINT `FK_compras_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_compras_passagem` FOREIGN KEY (`passagem_id`) REFERENCES `passagens` (`id`) ON DELETE CASCADE;

ALTER TABLE `favoritos`
  ADD CONSTRAINT `FK_favoritos_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_favoritos_passagem` FOREIGN KEY (`passagem_id`) REFERENCES `passagens` (`id`) ON DELETE CASCADE;

ALTER TABLE `passagens`
  ADD CONSTRAINT `FK_passagens_origem` FOREIGN KEY (`cidade_origem_id`) REFERENCES `cidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_passagens_destino` FOREIGN KEY (`cidade_destino_id`) REFERENCES `cidades` (`id`) ON DELETE CASCADE;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
