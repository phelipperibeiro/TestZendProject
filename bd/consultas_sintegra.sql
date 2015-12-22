-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Dez-2015 às 06:06
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `consultas_sintegra`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

CREATE TABLE IF NOT EXISTS `consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(18) DEFAULT NULL,
  `inscricao_estadual` varchar(12) DEFAULT NULL,
  `razao_social` varchar(200) DEFAULT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `numero` varchar(6) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `atividade` varchar(100) DEFAULT NULL,
  `data_inicio` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `data_status` varchar(10) DEFAULT NULL,
  `regime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `consultas`
--

INSERT INTO `consultas` (`id`, `cnpj`, `inscricao_estadual`, `razao_social`, `logradouro`, `numero`, `complemento`, `bairro`, `municipio`, `cep`, `uf`, `telefone`, `atividade`, `data_inicio`, `status`, `data_status`, `regime`) VALUES
(1, '31.804.115/0002-43', '082.254.28-1', 'CEREAIS DO NICO LTDA', 'RUA IPE', '10', '', 'MOVELAR', 'LINHARES', '29906-120', 'ES', '        ', 'COMERCIO ATACADISTA DE CEREAIS E LEGUMINOSAS BENEFICIADAS', '26/03/2004', 'HABILITADO', '26/03/2004', 'ORDINARIO'),
(2, '31.804.115/0002-43', '082.254.28-1', 'CEREAIS DO NICO LTDA', 'RUA IPE', '10', '', 'MOVELAR', 'LINHARES', '29906-120', 'ES', '        ', 'COMERCIO ATACADISTA DE CEREAIS E LEGUMINOSAS BENEFICIADAS', '26/03/2004', 'HABILITADO', '26/03/2004', 'ORDINARIO'),
(3, '31.804.115/0002-43', '082.254.28-1', 'CEREAIS DO NICO LTDA', 'RUA IPE', '10', '', 'MOVELAR', 'LINHARES', '29906-120', 'ES', '        ', 'COMERCIO ATACADISTA DE CEREAIS E LEGUMINOSAS BENEFICIADAS', '26/03/2004', 'HABILITADO', '26/03/2004', 'ORDINARIO'),
(4, '31.804.115/0002-43', '082.254.28-1', 'CEREAIS DO NICO LTDA', 'RUA IPE', '10', '', 'MOVELAR', 'LINHARES', '29906-120', 'ES', '        ', 'COMERCIO ATACADISTA DE CEREAIS E LEGUMINOSAS BENEFICIADAS', '26/03/2004', 'HABILITADO', '26/03/2004', 'ORDINARIO'),
(5, '31.804.115/0002-43', '082.254.28-1', 'CEREAIS DO NICO LTDA', 'RUA IPE', '10', '', 'MOVELAR', 'LINHARES', '29906-120', 'ES', '        ', 'COMERCIO ATACADISTA DE CEREAIS E LEGUMINOSAS BENEFICIADAS', '26/03/2004', 'HABILITADO', '26/03/2004', 'ORDINARIO'),
(6, '31.804.115/0002-43', '082.254.28-1', 'CEREAIS DO NICO LTDA', 'RUA IPE', '10', '', 'MOVELAR', 'LINHARES', '29906-120', 'ES', '        ', 'COMERCIO ATACADISTA DE CEREAIS E LEGUMINOSAS BENEFICIADAS', '26/03/2004', 'HABILITADO', '26/03/2004', 'ORDINARIO'),
(7, '31.804.115/0002-43', '082.254.28-1', 'CEREAIS DO NICO LTDA', 'RUA IPE', '10', '', 'MOVELAR', 'LINHARES', '29906-120', 'ES', '        ', 'COMERCIO ATACADISTA DE CEREAIS E LEGUMINOSAS BENEFICIADAS', '26/03/2004', 'HABILITADO', '26/03/2004', 'ORDINARIO'),
(8, '31.804.115/0002-43', '082.254.28-1', 'CEREAIS DO NICO LTDA', 'RUA IPE', '10', '', 'MOVELAR', 'LINHARES', '29906-120', 'ES', '        ', 'COMERCIO ATACADISTA DE CEREAIS E LEGUMINOSAS BENEFICIADAS', '26/03/2004', 'HABILITADO', '26/03/2004', 'ORDINARIO'),
(9, '31.804.115/0002-43', '082.254.28-1', 'CEREAIS DO NICO LTDA', 'RUA IPE', '10', '', 'MOVELAR', 'LINHARES', '29906-120', 'ES', '        ', 'COMERCIO ATACADISTA DE CEREAIS E LEGUMINOSAS BENEFICIADAS', '26/03/2004', 'HABILITADO', '26/03/2004', 'ORDINARIO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `login`, `pass`) VALUES
(1, 'admin', 's1nt3gr4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
