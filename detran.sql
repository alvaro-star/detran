-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2022 às 15:08
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `detran`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carro`
--

CREATE TABLE `tb_carro` (
  `idtb_carro` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `placa` varchar(20) DEFAULT NULL,
  `postado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_carro`
--

INSERT INTO `tb_carro` (`idtb_carro`, `usuario_id`, `nome`, `placa`, `postado_em`) VALUES
(11, 13, 'Ferr', 'BBB1234', '2022-06-29 11:56:39'),
(13, 13, 'AAA', 'safdjfdbk', '2022-06-29 12:16:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_infracao`
--

CREATE TABLE `tb_infracao` (
  `idtb_infracao` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `pontos` int(11) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_infracao`
--

INSERT INTO `tb_infracao` (`idtb_infracao`, `descricao`, `pontos`, `valor`) VALUES
(6, 'Matar dois Policiais', 500, 30.66),
(7, 'Correr Muito Rapido', 600, 700);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_multa`
--

CREATE TABLE `tb_multa` (
  `idtb_multa` int(10) UNSIGNED NOT NULL,
  `ano` int(11) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `tb_carro_idtb_carro` int(10) UNSIGNED NOT NULL,
  `tb_infracao_idtb_infracao` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_multa`
--

INSERT INTO `tb_multa` (`idtb_multa`, `ano`, `cidade`, `tb_carro_idtb_carro`, `tb_infracao_idtb_infracao`) VALUES
(4, 2017, 'Corumba', 11, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `idtb_usuario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`idtb_usuario`, `nome`, `email`, `senha`, `criado_em`) VALUES
(13, 'Alvaro Vargas', 'alvaro@gmail.com', 'fa916f02ddb45f4ab01d3c48eabe8799', '2022-06-29 11:56:10');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_carro`
--
ALTER TABLE `tb_carro`
  ADD PRIMARY KEY (`idtb_carro`),
  ADD KEY `tb_carro_FKIndex1` (`usuario_id`);

--
-- Índices para tabela `tb_infracao`
--
ALTER TABLE `tb_infracao`
  ADD PRIMARY KEY (`idtb_infracao`),
  ADD UNIQUE KEY `idtb_infracao_UNIQUE` (`idtb_infracao`);

--
-- Índices para tabela `tb_multa`
--
ALTER TABLE `tb_multa`
  ADD PRIMARY KEY (`idtb_multa`),
  ADD KEY `fk_tb_multa_tb_carro_idx` (`tb_carro_idtb_carro`),
  ADD KEY `fk_tb_multa_tb_infracao1_idx` (`tb_infracao_idtb_infracao`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idtb_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_carro`
--
ALTER TABLE `tb_carro`
  MODIFY `idtb_carro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_infracao`
--
ALTER TABLE `tb_infracao`
  MODIFY `idtb_infracao` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_multa`
--
ALTER TABLE `tb_multa`
  MODIFY `idtb_multa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `idtb_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;