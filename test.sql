-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Maio-2020 às 18:42
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `drink`
--

CREATE TABLE `drink` (
  `id` int(11) NOT NULL,
  `ml` int(50) NOT NULL,
  `id_users` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `drink`
--

INSERT INTO `drink` (`id`, `ml`, `id_users`, `data`) VALUES
(1, 100, 5, '2020-05-18 00:00:00'),
(2, 50, 5, '2020-05-19 00:00:00'),
(3, 60, 2, '2020-05-19 00:00:00'),
(4, 200, 1, '2020-05-18 00:00:00'),
(5, 10, 1, '2020-05-17 00:00:00'),
(6, 100, 1, '2020-05-18 06:36:39'),
(7, 60, 2, '2020-05-18 06:37:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`) VALUES
(1, 'Miguel Honorio Silva Matos', 'm_h@gmail.com', '123', '202cb962ac59075b964b07152d234b70'),
(2, 'Ana Carolina Silva Matos', 'ana_ca@gmail.com', '123465', 'dshbkhsdbhfskbhf'),
(5, 'Tiago Silva Matos', 'tiagotiago@gmail.com', '12345', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'tiago honoiro', 'tiago@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e'),
(17, 'tiago honoiro', 'tiago2@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e'),
(19, 'tiago honoiro todo', 'tiago2@gmail.com.br', '123456', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `drink`
--
ALTER TABLE `drink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
