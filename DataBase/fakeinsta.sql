-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Fev-2022 às 15:41
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fakeinsta`
--
CREATE DATABASE IF NOT EXISTS `fakeinsta` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fakeinsta`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `imagePost` blob NOT NULL,
  `descPost` varchar(255) NOT NULL,
  `userPost` varchar(255) NOT NULL,
  `likesPost` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `login`, `senha`, `image`, `email`) VALUES
(1, 'Henrique', 'Konac', '20511226a', 'null', 'Konac@outlook.com.br'),
(2, 'Nome', 'User', 'Senha', NULL, 'Email'),
(3, 'Teste 2', 'Teste 2', 'Teste 2', NULL, 'Teste 2'),
(4, 'sadasdas', 'dasdasdas', 'dasdasd', NULL, 'dsadsad'),
(5, 'sadasdas', 'dasdasdas', 'dasdasd', NULL, 'dsadsad'),
(6, 'sadasdas', 'dasdasdas', 'dasdasd', NULL, 'dsadsad'),
(7, 'tetste', ' teste ', 'teste ', NULL, 'Teste '),
(8, 'PAblo escobar', 'Pablito', '20154569', NULL, 'Pablo'),
(9, 'dsadas', 'dasdas', 'dads', NULL, 'Rodrigo'),
(10, 'Ednilson Henrique', 'Rickplays', '20511226a', NULL, 'rick.plays@hotmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
