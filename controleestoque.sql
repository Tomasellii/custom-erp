-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 02:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controleestoque`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `cnpj` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `telefone` varchar(220) NOT NULL,
  `endereco` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cnpj`, `email`, `telefone`, `endereco`) VALUES
(1, 'cliente_teste', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) DEFAULT NULL,
  `setor` varchar(220) DEFAULT NULL,
  `funcao` varchar(220) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `telefone` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `nome`, `setor`, `funcao`, `email`, `telefone`) VALUES
(1, 'funcionario_teste', 'Operacional', 'gestor', '', ''),
(2, 'comercial_teste', 'Comercial', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) DEFAULT NULL,
  `cnpj` varchar(220) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `telefone` varchar(220) DEFAULT NULL,
  `endereco` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `cnpj`, `email`, `telefone`, `endereco`) VALUES
(1, 'fornecedor_teste', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL,
  `dat` timestamp NOT NULL DEFAULT current_timestamp(),
  `operacao` varchar(220) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `produto` varchar(220) DEFAULT NULL,
  `cli_for` varchar(220) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `quantidade` float DEFAULT NULL,
  `proposta` int(11) DEFAULT NULL,
  `destino` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movimentacoes`
--

INSERT INTO `movimentacoes` (`id`, `dat`, `operacao`, `nota`, `produto`, `cli_for`, `valor`, `quantidade`, `proposta`, `destino`) VALUES
(1, '2024-05-01 03:00:00', 'Entrada', 3553, 'produto_teste', 'fornecedor_teste', 35.9, 1, 569, 'teste');

-- --------------------------------------------------------

--
-- Table structure for table `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int(11) NOT NULL,
  `numero_memorial` int(11) NOT NULL,
  `servico` varchar(255) DEFAULT NULL,
  `responsavel_tecnico` varchar(255) DEFAULT NULL,
  `responsavel_comercial` varchar(255) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `modelo_setor_tag` varchar(255) DEFAULT NULL,
  `numero_serie` varchar(255) DEFAULT NULL,
  `pecas` int(11) NOT NULL,
  `servicos` int(11) NOT NULL,
  `total_pecas` decimal(10,2) DEFAULT NULL,
  `total_servicos` decimal(10,2) DEFAULT NULL,
  `impostos_icms` decimal(10,2) DEFAULT NULL,
  `impostos_iss` decimal(10,2) DEFAULT NULL,
  `margem_pecas` int(11) DEFAULT NULL,
  `margem_servicos` decimal(10,2) DEFAULT NULL,
  `total_orcamento` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `numero_memorial`, `servico`, `responsavel_tecnico`, `responsavel_comercial`, `cliente`, `modelo_setor_tag`, `numero_serie`, `pecas`, `servicos`, `total_pecas`, `total_servicos`, `impostos_icms`, `impostos_iss`, `margem_pecas`, `margem_servicos`, `total_orcamento`) VALUES
(1, 568, 'servico_teste', 'funcionario_teste', ' comercial_teste', 'cliente_teste', 'Chiller 30RBA', '3550311E221', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) DEFAULT NULL,
  `descricao` varchar(220) DEFAULT NULL,
  `unidade` varchar(220) DEFAULT NULL,
  `quantidade` float DEFAULT NULL,
  `ncm` int(11) DEFAULT NULL,
  `minimo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `unidade`, `quantidade`, `ncm`, `minimo`) VALUES
(1, 'produto_teste', 'descricao', 'Unidade', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicos`
--

INSERT INTO `servicos` (`id`, `nome`) VALUES
(1, 'servico_teste');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
