-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jan-2022 às 19:31
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

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `imagePost`, `descPost`, `userPost`, `likesPost`, `comment`) VALUES
(19, 0x31353134613332636630643563343263393932303563656233353261356633662e6a7067, 'Testando primeiro post', 'Konac', NULL, NULL),
(20, 0x34643439306138666330386234316663313837613734336636383434323063642e6a7067, 'Teste 2', 'Pablito', NULL, NULL),
(21, 0x36306663373135306565363764333034633032643562656632386262656631662e706e67, 'TEstando 3 AHHAHAHAH', 'User', NULL, NULL),
(22, 0x61636261366531353863373061393430363232323836353363366566326663392e6a7067, 'Rickplays post teste', 'Rickplays', NULL, NULL),
(23, 0x30396362613537336165616430636237373265323166383235383331316533342e6a7067, 'uyryfrhgfghfhjk gfhjg fhgdfj', 'Konac', NULL, NULL),
(24, 0x63356138623061623732363934373436383366363833366438656466633339652e706e67, 'TEstando alteraçoes na URL', 'Konac', NULL, NULL),
(25, 0x62306538646535656634636635633937323233613166313538383233316165382e6a7067, 'Testando alteraçoes na URL', 'Konac', NULL, NULL),
(26, 0x30646534373462663261633531633466353530313138333038636633373737352e6a7067, 'Testando alteraçdsadasoes na URL', 'Konac', NULL, NULL);

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
