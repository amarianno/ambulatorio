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
-- Estrutura da tabela `enfermagem`
--

DROP TABLE IF EXISTS `enfermagem`;
CREATE TABLE IF NOT EXISTS `enfermagem` (
  `codigo` int(3) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(10) DEFAULT NULL,
  `data` date NOT NULL,
  `tipo_funcionario` int(1) NOT NULL,
  `procedimento` int(1) NOT NULL,
  `obs` varchar(250) DEFAULT NULL,
  `usuario` int(7) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `usuario` (`usuario`),
  KEY `procedimento` (`procedimento`),
  KEY `matricula` (`matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `enfermagem`
--

INSERT INTO `enfermagem` (`codigo`, `matricula`, `data`, `tipo_funcionario`, `procedimento`, `obs`, `usuario`) VALUES
(1, '21089868', '2014-02-23', 1, 1, '', 1),
(4, '21089868', '2014-02-23', 1, 8, 'ddd', 1),
(6, NULL, '2014-02-23', 2, 3, NULL, 1),
(12, NULL, '2014-02-23', 1, 1, '', 1),
(13, NULL, '2014-02-23', 1, 1, '', 1),
(14, NULL, '2014-02-23', 3, 5, '', 1),
(15, NULL, '2014-02-23', 2, 7, '', 1),
(16, NULL, '2014-02-23', 3, 3, '', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `enfermagem`
--
ALTER TABLE `enfermagem`
  ADD CONSTRAINT `enfermagem_ibfk_1` FOREIGN KEY (`matricula`) REFERENCES `empregado` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `enfermagem_ibfk_2` FOREIGN KEY (`procedimento`) REFERENCES `enferm_procedimento` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `enfermagem_ibfk_3` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
