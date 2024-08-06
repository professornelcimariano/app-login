-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/08/2024 às 02:58
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
-- Banco de dados: `app-login`
--
CREATE DATABASE IF NOT EXISTS `app-login` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `app-login`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`, `slug`, `image`) VALUES
(8, 'NELCI MARIANO', 'nelcijunior@yahoo.com.br', 'b22bc9ac1d796c451473e99fc06fd566', '', ''),
(12, 'NELCI MARIANO', 'nelcijunior@yahoo.com.br', 'b22bc9ac1d796c451473e99fc06fd566', '', ''),
(13, 'NELCI MARIANO', 'nelcijunior@yahoo.com.br', 'b22bc9ac1d796c451473e99fc06fd566', '', 'user.png'),
(14, 'NELCI MARIANO', 'nelcijunior@yahoo.com.br', 'b22bc9ac1d796c451473e99fc06fd566', '', 'user.png'),
(15, 'NELCI MARIANO', 'nelcijunior@yahoo.com.br', 'b22bc9ac1d796c451473e99fc06fd566', 'nelci-mariano', 'be277c77d242fc0d657b3492872b045e2879c3958c92c7fe2bdfe6342f73489b.png'),
(16, 'NELCI MARIANO P', 'nelcijunior@yahoo.com.br', 'b22bc9ac1d796c451473e99fc06fd566', 'nelci-mariano-p', 'be277c77d242fc0d657b3492872b045e2879c3958c92c7fe2bdfe6342f73489b.png'),
(17, 'NELCI MARIANO', 'nelcijunior@yahoo.com.br', 'b22bc9ac1d796c451473e99fc06fd566', 'nelci-mariano-1', 'be277c77d242fc0d657b3492872b045e2879c3958c92c7fe2bdfe6342f73489b.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
