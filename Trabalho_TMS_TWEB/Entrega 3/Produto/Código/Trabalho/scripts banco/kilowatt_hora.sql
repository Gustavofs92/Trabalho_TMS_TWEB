-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2015 às 10:40
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kilowatt_hora`
--
CREATE DATABASE IF NOT EXISTS `kilowatt_hora` DEFAULT CHARACTER SET latin7 COLLATE latin7_general_ci;
USE `kilowatt_hora`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
CREATE TABLE IF NOT EXISTS `tbl_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `voltagem` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `potencia_uso` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `potencia_standby` varchar(255) NOT NULL,
  PRIMARY KEY (`descricao`),
  UNIQUE KEY `id` (`id`),
  KEY `kw_h` (`potencia_uso`),
  FULLTEXT KEY `marca` (`voltagem`),
  FULLTEXT KEY `potencia_standby` (`potencia_standby`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin7 COMMENT='Tabela para guardar os produtos' AUTO_INCREMENT=7 ; Estrutura da tabela `tbl_produto_usuario`
--

DROP TABLE IF EXISTS `tbl_produto_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_produto_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `id_produto` (`id_produto`,`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='TABELA QUE RELACIONA O PERFIL MONTADO PELO USUARIO' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senha` char(255) NOT NULL,
  `nome` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sobrenome` char(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `rua` char(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` char(255) NOT NULL,
  `cidade` char(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` enum('M','F') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `id` (`id`),
  FULLTEXT KEY `sobrenome` (`sobrenome`),
  FULLTEXT KEY `email` (`usuario`),
  FULLTEXT KEY `logradouro` (`rua`),
  FULLTEXT KEY `bairro` (`bairro`),
  FULLTEXT KEY `cidade` (`cidade`),
  FULLTEXT KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin7 COMMENT='Tabela para usuário e senha' AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `senha`, `nome`, `sobrenome`, `cpf`, `usuario`, `rua`, `numero`, `bairro`, `cidade`, `data_nascimento`, `sexo`) VALUES
(1, 'admin', 'admin', 'admin', '00000000001', admin', 'Rua Abelha', 12, 'Novo Riacho', 'Contagem', '1990-10-04', 'M');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
