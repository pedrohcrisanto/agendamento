-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jun-2016 às 19:56
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agendamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `data_consulta`
--

CREATE TABLE IF NOT EXISTS `data_consulta` (
  `data_consulta_id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`data_consulta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario_consulta`
--

CREATE TABLE IF NOT EXISTS `horario_consulta` (
  `horario_consulta_id` int(11) NOT NULL AUTO_INCREMENT,
  `horario` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `data_consulta_id` int(11) NOT NULL,
  PRIMARY KEY (`horario_consulta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacao`
--

CREATE TABLE IF NOT EXISTS `marcacao` (
  `marcacao_id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_id` int(11) NOT NULL,
  `horario_consulta_id` int(11) NOT NULL,
  PRIMARY KEY (`marcacao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `paciente_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nascimento` varchar(10) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `sus` varchar(18) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `observacao` varchar(255) NOT NULL,
  PRIMARY KEY (`paciente_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `sus` (`sus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `usuario`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
