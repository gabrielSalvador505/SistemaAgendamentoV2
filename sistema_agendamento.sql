-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 16-Nov-2022 às 03:28
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_agendamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `data_agenda` date DEFAULT NULL,
  `hora_agenda` time DEFAULT NULL,
  `status_agenda` char(1) DEFAULT NULL,
  `id_cli_agen` int(11) DEFAULT NULL,
  `cod_serv_agen` int(11) DEFAULT NULL,
  `FK_func_agenda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cli` int(11) NOT NULL,
  `nome_cli` varchar(45) DEFAULT NULL,
  `tel_cli` varchar(15) DEFAULT NULL,
  `end_cli` varchar(50) DEFAULT NULL,
  `dt_nasc_cli` date DEFAULT NULL,
  `email_cli` varchar(40) DEFAULT NULL,
  `senha_cli` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_func` int(11) NOT NULL,
  `nome_func` varchar(45) DEFAULT NULL,
  `tel_func` varchar(15) DEFAULT NULL,
  `endereco_func` varchar(45) DEFAULT NULL,
  `dt_nasc_func` date DEFAULT NULL,
  `senha_func` varchar(32) DEFAULT NULL,
  `email_func` varchar(45) DEFAULT NULL,
  `FK_cod_jorn` int(11) DEFAULT NULL,
  `nivel_acesso` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jornada`
--

CREATE TABLE `jornada` (
  `cod_jorn` int(11) NOT NULL,
  `ini_jorn` time DEFAULT NULL,
  `ini_pausa_jorn` time DEFAULT NULL,
  `fim_pausa_jorn` time DEFAULT NULL,
  `fim_jorn` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `cod_serv` int(11) NOT NULL,
  `nome_serv` varchar(45) DEFAULT NULL,
  `desc_serv` varchar(200) DEFAULT NULL,
  `img_serv` varchar(50) DEFAULT NULL,
  `duracao_serv` time DEFAULT NULL,
  `vlr_serv` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico_funcionario`
--

CREATE TABLE `servico_funcionario` (
  `id_serv_func` int(11) NOT NULL,
  `FK_cod_serv` int(11) DEFAULT NULL,
  `FK_id_func` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `FK_func_agenda` (`FK_func_agenda`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cli`),
  ADD UNIQUE KEY `tel_cli` (`tel_cli`),
  ADD UNIQUE KEY `email_cli` (`email_cli`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_func`),
  ADD UNIQUE KEY `email_func` (`email_func`),
  ADD KEY `FK_CodJornada` (`FK_cod_jorn`);

--
-- Índices para tabela `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`cod_jorn`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`cod_serv`);

--
-- Índices para tabela `servico_funcionario`
--
ALTER TABLE `servico_funcionario`
  ADD PRIMARY KEY (`id_serv_func`),
  ADD KEY `FK_cod_serv` (`FK_cod_serv`),
  ADD KEY `FK_id_func` (`FK_id_func`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_func` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jornada`
--
ALTER TABLE `jornada`
  MODIFY `cod_jorn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `cod_serv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico_funcionario`
--
ALTER TABLE `servico_funcionario`
  MODIFY `id_serv_func` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `FK_func_agenda` FOREIGN KEY (`FK_func_agenda`) REFERENCES `funcionario` (`id_func`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `FK_CodJornada` FOREIGN KEY (`FK_cod_jorn`) REFERENCES `jornada` (`cod_jorn`);

--
-- Limitadores para a tabela `servico_funcionario`
--
ALTER TABLE `servico_funcionario`
  ADD CONSTRAINT `FK_cod_serv` FOREIGN KEY (`FK_cod_serv`) REFERENCES `servico` (`cod_serv`),
  ADD CONSTRAINT `FK_id_func` FOREIGN KEY (`FK_id_func`) REFERENCES `funcionario` (`id_func`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
