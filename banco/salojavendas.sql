-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 12-Jul-2022 às 03:34
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `salojavendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nome`) VALUES
(2, 'Computador'),
(3, 'Periférico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL,
  `data` date NOT NULL,
  `formaPagamento` tinyint(4) NOT NULL,
  `usuarios_idUsuario` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1-andamento/2-finalizado/3-cancelado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`idCompra`, `data`, `formaPagamento`, `usuarios_idUsuario`, `status`) VALUES
(2, '2022-07-12', 1, 2, 1),
(3, '0000-00-00', 1, 2, 1),
(4, '2022-07-11', 2, 2, 1),
(5, '2022-07-12', 3, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `categorias_idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idProduto`, `nome`, `descricao`, `preco`, `categorias_idCategoria`) VALUES
(1, 'Master Dragon', 'Computador Gamer', '3000.00', 2),
(2, 'GX 440', 'Mause Gamer', '500.00', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_has_compras`
--

CREATE TABLE `produtos_has_compras` (
  `produtos_idProduto` int(11) NOT NULL,
  `compras_idCompra` int(11) NOT NULL,
  `quantidade` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos_has_compras`
--

INSERT INTO `produtos_has_compras` (`produtos_idProduto`, `compras_idCompra`, `quantidade`) VALUES
(1, 3, 1),
(1, 5, 1),
(2, 2, 1),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomeCompleto` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `senha` char(32) NOT NULL,
  `cep` int(11) NOT NULL,
  `numero` int(6) NOT NULL,
  `nivel` tinyint(4) NOT NULL COMMENT '1- Gerente / 2-Cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomeCompleto`, `email`, `cpf`, `telefone`, `senha`, `cep`, `numero`, `nivel`) VALUES
(1, 'Gerente 01', 'gerente@gmail.com', 99999999999, '999999999', '827ccb0eea8a706c4c34a16891f84e7b', 4569328, 123, 1),
(2, 'Cliente', 'cliente@gmail.com', 88888888888, '999999999', '827ccb0eea8a706c4c34a16891f84e7b', 88888888, 1465, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices para tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `fk_compras_usuarios1_idx` (`usuarios_idUsuario`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `fk_produtos_categorias_idx` (`categorias_idCategoria`);

--
-- Índices para tabela `produtos_has_compras`
--
ALTER TABLE `produtos_has_compras`
  ADD PRIMARY KEY (`produtos_idProduto`,`compras_idCompra`),
  ADD KEY `fk_produtos_has_compras_compras1_idx` (`compras_idCompra`),
  ADD KEY `fk_produtos_has_compras_produtos1_idx` (`produtos_idProduto`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_usuarios1` FOREIGN KEY (`usuarios_idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_categorias` FOREIGN KEY (`categorias_idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos_has_compras`
--
ALTER TABLE `produtos_has_compras`
  ADD CONSTRAINT `fk_produtos_has_compras_compras1` FOREIGN KEY (`compras_idCompra`) REFERENCES `compras` (`idCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produtos_has_compras_produtos1` FOREIGN KEY (`produtos_idProduto`) REFERENCES `produtos` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
