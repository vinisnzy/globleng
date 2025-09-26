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
  `check_in` date NOT NULL,
  `check_out` date DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `passagens`
--

INSERT INTO `passagens` (`id`, `cidade_origem_id`, `cidade_destino_id`, `duracao_voo`, `check_in`, `check_out`, `preco`, `data_criacao`) VALUES
(1, 9, 1, '23:40:00', '2025-01-10', '2025-01-25', 5600.00, '2025-09-20 21:27:07'),
(2, 9, 2, '11:20:00', '2025-02-05', '2025-02-18', 3400.00, '2025-09-20 21:27:07'),
(3, 9, 3, '13:30:00', '2025-03-12', '2025-03-25', 3550.00, '2025-09-20 21:27:07'),
(4, 9, 4, '03:10:00', '2025-04-07', '2025-04-15', 1850.00, '2025-09-20 21:27:07'),
(5, 9, 5, '12:15:00', '2025-05-03', '2025-05-15', 3700.00, '2025-09-20 21:27:07'),
(6, 9, 6, '09:45:00', '2025-06-14', '2025-06-28', 3100.00, '2025-09-20 21:27:07'),
(7, 9, 7, '14:25:00', '2025-07-09', '2025-07-21', 4200.00, '2025-09-20 21:27:07'),
(8, 9, 8, '20:00:00', '2025-08-02', '2025-08-17', 6950.00, '2025-09-20 21:27:07'),
(9, 10, 1, '22:55:00', '2025-01-20', '2025-02-05', 5400.00, '2025-09-20 21:27:07'),
(10, 10, 2, '11:40:00', '2025-02-12', '2025-02-25', 3250.00, '2025-09-20 21:27:07'),
(11, 10, 3, '12:20:00', '2025-03-22', '2025-04-02', 3350.00, '2025-09-20 21:27:07'),
(12, 10, 4, '03:35:00', '2025-04-14', '2025-04-21', 1950.00, '2025-09-20 21:27:07'),
(13, 10, 5, '11:30:00', '2025-05-25', '2025-06-08', 3600.00, '2025-09-20 21:27:07'),
(14, 10, 6, '09:15:00', '2025-06-30', '2025-07-12', 3000.00, '2025-09-20 21:27:07'),
(15, 10, 7, '14:50:00', '2025-07-18', '2025-07-30', 4150.00, '2025-09-20 21:27:07'),
(16, 10, 8, '19:45:00', '2025-08-25', '2025-09-10', 7100.00, '2025-09-20 21:27:07'),
(17, 11, 1, '24:00:00', '2025-01-05', '2025-01-20', 5800.00, '2025-09-20 21:27:07'),
(18, 11, 2, '10:50:00', '2025-02-15', '2025-02-28', 3200.00, '2025-09-20 21:27:07'),
(19, 11, 3, '12:10:00', '2025-03-30', '2025-04-12', 3450.00, '2025-09-20 21:27:07'),
(20, 11, 4, '03:20:00', '2025-04-19', '2025-04-25', 1800.00, '2025-09-20 21:27:07'),
(21, 11, 5, '12:05:00', '2025-05-11', '2025-05-23', 3750.00, '2025-09-20 21:27:07'),
(22, 11, 6, '09:30:00', '2025-06-08', '2025-06-20', 3100.00, '2025-09-20 21:27:07'),
(23, 11, 7, '15:00:00', '2025-07-01', '2025-07-15', 4250.00, '2025-09-20 21:27:07'),
(24, 11, 8, '20:25:00', '2025-08-05', '2025-08-18', 7000.00, '2025-09-20 21:27:07'),
(25, 12, 1, '23:20:00', '2025-01-18', '2025-02-02', 5500.00, '2025-09-20 21:27:07'),
(26, 12, 2, '11:10:00', '2025-02-22', '2025-03-05', 3300.00, '2025-09-20 21:27:07'),
(27, 12, 3, '13:00:00', '2025-03-09', '2025-03-20', 3500.00, '2025-09-20 21:27:07'),
(28, 12, 4, '03:25:00', '2025-04-03', '2025-04-12', 1900.00, '2025-09-20 21:27:07'),
(29, 12, 5, '11:45:00', '2025-05-20', '2025-06-01', 3650.00, '2025-09-20 21:27:07'),
(30, 12, 6, '09:55:00', '2025-06-11', '2025-06-24', 3150.00, '2025-09-20 21:27:07'),
(31, 12, 7, '14:40:00', '2025-07-23', '2025-08-05', 4300.00, '2025-09-20 21:27:07'),
(32, 12, 8, '19:30:00', '2025-08-29', '2025-09-12', 7050.00, '2025-09-20 21:27:07'),
(33, 13, 1, '23:55:00', '2025-01-28', '2025-02-12', 5650.00, '2025-09-20 21:27:07'),
(34, 13, 2, '12:20:00', '2025-02-08', '2025-02-22', 3450.00, '2025-09-20 21:27:07'),
(35, 13, 3, '12:45:00', '2025-03-15', '2025-03-28', 3550.00, '2025-09-20 21:27:07'),
(36, 13, 4, '03:40:00', '2025-04-08', '2025-04-16', 2000.00, '2025-09-20 21:27:07'),
(37, 13, 5, '12:30:00', '2025-05-14', '2025-05-27', 3800.00, '2025-09-20 21:27:07'),
(38, 13, 6, '09:25:00', '2025-06-18', '2025-07-01', 3250.00, '2025-09-20 21:27:07'),
(39, 13, 7, '15:05:00', '2025-07-10', '2025-07-23', 4350.00, '2025-09-20 21:27:07'),
(40, 13, 8, '20:15:00', '2025-08-20', '2025-09-03', 7150.00, '2025-09-20 21:27:07'),
(41, 14, 1, '22:40:00', '2025-01-13', '2025-01-29', 5450.00, '2025-09-20 21:27:07'),
(42, 14, 2, '11:25:00', '2025-02-17', '2025-03-01', 3350.00, '2025-09-20 21:27:07'),
(43, 14, 3, '13:10:00', '2025-03-19', '2025-03-31', 3400.00, '2025-09-20 21:27:07'),
(44, 14, 4, '03:05:00', '2025-04-21', '2025-04-28', 1750.00, '2025-09-20 21:27:07'),
(45, 14, 5, '11:50:00', '2025-05-17', '2025-05-30', 3550.00, '2025-09-20 21:27:07'),
(46, 14, 6, '09:10:00', '2025-06-25', '2025-07-07', 3050.00, '2025-09-20 21:27:07'),
(47, 14, 7, '14:35:00', '2025-07-28', '2025-08-09', 4200.00, '2025-09-20 21:27:07'),
(48, 14, 8, '19:55:00', '2025-08-15', '2025-08-29', 6900.00, '2025-09-20 21:27:07'),
(49, 14, 2, '11:40:00', '2025-09-10', '2025-09-22', 3400.00, '2025-09-20 21:27:07'),
(50, 14, 5, '12:10:00', '2025-10-03', '2025-10-16', 3650.00, '2025-09-20 21:27:07');

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
  ADD UNIQUE KEY `uq_usuario_passagem` (`usuario_id`,`passagem_id`),
  ADD KEY `FK_avaliacoes_2` (`passagem_id`);

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
