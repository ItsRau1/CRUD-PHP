-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/09/2023 às 03:12
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ads_si_umc23`
--
CREATE DATABASE IF NOT EXISTS `ads_si_umc23` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ads_si_umc23`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ruan_comment`
--

CREATE TABLE `ruan_comment` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `liked` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ruan_post`
--

CREATE TABLE `ruan_post` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `content` varchar(300) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ruan_post`
--

INSERT INTO `ruan_post` (`id`, `title`, `sub_title`, `content`, `publisher_id`, `created_at`) VALUES
(2, 'titulo', 'sub-titulo', 'conteudo', 2, '2023-09-05 00:29:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ruan_user`
--

CREATE TABLE `ruan_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `question` varchar(8) NOT NULL,
  `response` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ruan_user`
--

INSERT INTO `ruan_user` (`id`, `name`, `email`, `password`, `question`, `response`, `is_admin`, `created_at`) VALUES
(1, 'admin', 'admin@email.com', 'admin', 'animal', 'dog', 1, '2023-09-04 23:08:03'),
(2, 'ruan', 'ruan@email.com', '123456', 'animal', 'dog', 0, '2023-09-05 00:26:31'),
(3, 'yasmin', 'yasmin@email.com', '123456', 'animal', 'cat', 0, '2023-09-05 00:30:49');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ruan_comment`
--
ALTER TABLE `ruan_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher_id` (`publisher_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Índices de tabela `ruan_post`
--
ALTER TABLE `ruan_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Índices de tabela `ruan_user`
--
ALTER TABLE `ruan_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ruan_comment`
--
ALTER TABLE `ruan_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ruan_post`
--
ALTER TABLE `ruan_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ruan_user`
--
ALTER TABLE `ruan_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `ruan_comment`
--
ALTER TABLE `ruan_comment`
  ADD CONSTRAINT `ruan_comment_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `ruan_user` (`id`),
  ADD CONSTRAINT `ruan_comment_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `ruan_user` (`id`),
  ADD CONSTRAINT `ruan_comment_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `ruan_post` (`id`);

--
-- Restrições para tabelas `ruan_post`
--
ALTER TABLE `ruan_post`
  ADD CONSTRAINT `ruan_post_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `ruan_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
