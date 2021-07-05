# financeiro
O sistema feito em PHP e MYSQL, consistem em cadastro do parceiro que após o seu cadastro realizara o cadastro do cliente, cadastro de sua conta. Este sistema faz parte de uma implemente feita para uma aplicação chamada Vendoon (www.vendoon.com.br), funcionando como uma espécie de "RH" e controle financeiro do parceiro que prestará serviço para a plataforma. Após o cadastro do usuário o mesmo terá como objetivo cadastrar todos os seus clientes que forem a ser captados, contendo valores e data de quando este cliente entrou. Sendo assim o prestador de serviço terá a sua carteira financeira sendo 1 cliente para plataforma e outro cliente para para ele, mantendo assim o valor em 50% para cada. 


 Vai upar o sistema que esta na pasta zipada como Parceiro, depois criar o banco de dados, copiar o código do banco de dados abaixo. No arquivo conexão colocar o nome do banco, usuario e senha. Nas páginas conta.php e cliente.php colocar também as configurações do banco. 

<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "parceiro";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	




-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05/07/2021 às 07:44
-- Versão do servidor: 10.4.15-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u857042521_vendoon`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ws_parceiros_clientes`
--

CREATE TABLE `ws_parceiros_clientes` (
  `id_parceiro_cli` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plano` int(255) NOT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `ws_parceiros_clientes`
--

INSERT INTO `ws_parceiros_clientes` (`id_parceiro_cli`, `id_user`, `nome`, `endereco`, `telefone`, `plano`, `data`) VALUES
(1, 1, 'Demontração', 'Rua Diogo Martins 510', '11954568511', 350, '2021-05-31'),
(2, 1, 'Marcio dos Santos Muniz', 'R DIOGO MARTINS', '11954568511', 1500, '2021-06-11'),
(3, 1, 'Lacombe', 'R DIOGO MARTINS', '11954568511', 1500, '2021-06-14'),
(4, 2, 'Marcela Santos ', 'R DIOGO MARTINS', '9456546546', 1500, '2021-06-07'),
(5, 3, 'Marcio dos Santos Muniz', 'R DIOGO MARTINS', '11954568511', 1500, '2021-06-03'),
(6, 3, 'Atlético Clube Goianiense', 'R DIOGO MARTINS', '11954568511', 150, '2021-06-14'),
(7, 2, 'Marcio dos Santos Muniz', 'R DIOGO MARTINS', '11954568511', 1500, '2021-06-30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ws_parceiros_conta`
--

CREATE TABLE `ws_parceiros_conta` (
  `id_conta` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nome_conta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf_conta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `ws_parceiros_conta`
--

INSERT INTO `ws_parceiros_conta` (`id_conta`, `id_users`, `nome_conta`, `banco`, `agencia`, `conta`, `cpf_conta`) VALUES
(1, 1, 'Demonstração', '77 -Banco Inter S.A.', '0001', '105879', '39987138837'),
(2, 2, 'Cleide silva santos', '290 -PagSeguro Internet S.A.', '0001', '105879', '11954566564'),
(3, 3, 'Marcio dos Santos Muniz', '290 -PagSeguro Internet S.A.', '0001', '105879', '11954566564');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ws_parceiros_usuarios`
--

CREATE TABLE `ws_parceiros_usuarios` (
  `id_parceiro` int(11) NOT NULL,
  `nome_usuario` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(520) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveis_acesso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `ws_parceiros_usuarios`
--

INSERT INTO `ws_parceiros_usuarios` (`id_parceiro`, `nome_usuario`, `email`, `senha`, `niveis_acesso_id`) VALUES
(1, 'demo', 'demo@demo.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'Lucas Silva Oliveira', 'tarjapreta@tarjapreta.com.br', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'Adriel', 'adriel@adriel.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ws_parceiros_clientes`
--
ALTER TABLE `ws_parceiros_clientes`
  ADD PRIMARY KEY (`id_parceiro_cli`);

--
-- Índices de tabela `ws_parceiros_conta`
--
ALTER TABLE `ws_parceiros_conta`
  ADD PRIMARY KEY (`id_conta`);

--
-- Índices de tabela `ws_parceiros_usuarios`
--
ALTER TABLE `ws_parceiros_usuarios`
  ADD PRIMARY KEY (`id_parceiro`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `ws_parceiros_clientes`
--
ALTER TABLE `ws_parceiros_clientes`
  MODIFY `id_parceiro_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `ws_parceiros_conta`
--
ALTER TABLE `ws_parceiros_conta`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ws_parceiros_usuarios`
--
ALTER TABLE `ws_parceiros_usuarios`
  MODIFY `id_parceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

