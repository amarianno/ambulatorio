-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Fev-2014 às 01:30
-- Versão do servidor: 5.5.35-0ubuntu0.12.04.2
-- versão do PHP: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `ambulatorio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `enferm_procedimento`
--

DROP TABLE IF EXISTS `enferm_procedimento`;
CREATE TABLE IF NOT EXISTS `enferm_procedimento` (
  `codigo` int(3) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `enferm_procedimento`
--

INSERT INTO `enferm_procedimento` (`codigo`, `descricao`) VALUES
(1, 'CONSULTAS MEDICAS'),
(2, 'ATENDIMENTOS DE URGENCIA'),
(3, 'PA'),
(4, 'PESO'),
(5, 'CURATIVOS'),
(6, 'MEDICAÇÃO ORAL'),
(7, 'MEDICAÇÃO PARENTERAL'),
(8, 'OUTROS');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
