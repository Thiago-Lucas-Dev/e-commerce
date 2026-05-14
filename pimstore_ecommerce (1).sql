-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/05/2026 às 22:49
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
-- Banco de dados: `pimstore_ecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administradores`
--

INSERT INTO `administradores` (`id`, `nome`, `senha`, `criado_em`) VALUES
(2, 'admin', '$2y$10$Fpt4NVvYPFvAP2UyKeuIY.ayAAOVjUC8tRIDbnLH8V1phz2bpBsAu', '2026-05-14 03:48:36'),
(3, 'thiago', '$2y$10$vwso9S./e/YMbweKq1CSRuCvSEnvMq8K.OGaw9/0HP1RcJJK5nd32', '2026-05-14 10:02:52'),
(4, 'gui', '$2y$10$SchNmpwILjhSDasfTEVcheIHdxtVuBVVtB2lZUtRFMoJBUqVtYpna', '2026-05-14 10:05:16'),
(5, 'teste', '$2y$10$pk1vfexEzEpPYTgzJ0nyK.2oDy7J8atyazKnQ0DJ3CAihhtOAkoTm', '2026-05-14 10:08:59'),
(6, 'gej8fejfje', '$2y$10$RgefwugtIoo6ion.ME7ah.albsP/5dQUGQxS770M2OogVD3Osrrvq', '2026-05-14 10:21:23'),
(7, 'iejifgejifeife', '$2y$10$0zbhtxVR2uGhsWwrZI1ey.DgVCtWPQp6ECAO9zOq.IB9Ob6jCTzZK', '2026-05-14 10:22:13'),
(8, 'fefefeffe', '$2y$10$31e.IbXEC/Pxm3CHv2r9tuIhnrNacwLnj9kSj2.77KR.6GfRF5ERW', '2026-05-14 10:23:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `produto_nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_nome` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `condicao_pagamento` varchar(100) NOT NULL,
  `metodo_pagamento` varchar(100) NOT NULL,
  `criado_em` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `preco`, `descricao`, `criado_em`, `imagem`) VALUES
(14, 'teste', 123121.00, NULL, '2026-05-14 20:38:27', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `criado_em`) VALUES
(7, 'admin', 'admin@gmail.com.br', '$2y$10$47XOv.4kQkyZ7k0OzGuciOsMxo0g4wnpVMbPyiQ3DjdYKAKnFccAG', '2026-05-14 01:48:58'),
(8, 'grgorjgorjgr', 'gemkgem@gmail', '$2y$10$zpvIZ6YF0VEGWJTGdcoJZuX7kS11rqzkW6wpRkV/.qqborcL9wBxi', '2026-05-14 02:25:39'),
(9, 'gui', 'gui@gmail.com.br', '$2y$10$fNKhhXfExF28U4n0j14Geeob/0rfpDbeG7f5XyDI1kTJNnZKkcsVm', '2026-05-14 02:49:47'),
(10, 'thiago', 'thiago@gmail.com', '$2y$10$fHqbxAf09YLvTNqdvF7pvuwXjMzcp2m/NIDPmcyJBBxD7lcI/6cIy', '2026-05-14 03:00:00'),
(11, 'thiago', 'thiageifjeifke@gmail.com', '$2y$10$VFesLMxpTni0yfL1qLi0E.icf2AhlN7rgr5cPa1zRrX3hPf7SgFiW', '2026-05-14 03:06:07'),
(12, 'gerjjegjeij', 'fgeijeifjej@gmail.com', '$2y$10$vRJqFa23OXi2gIUeyFWpbux0boWMJdqE32.i5IJRXyugLsj1LGgmm', '2026-05-14 03:07:55'),
(13, 'testeconta', 'testeconta@gmail.com', '$2y$10$X8jVaqPgCYfwMemgzpG3/OPNi./r9y3Z0IGa92e5lmWKjMIud6sBm', '2026-05-14 10:02:36'),
(14, 'testefdedei', 'testefefe@gmail.com', '$2y$10$2xmlyae6bnJr4VaLByZ4xu9S0Lzg8NXsvnYV6htC.dxwIQNP1vy3i', '2026-05-14 10:20:38');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
