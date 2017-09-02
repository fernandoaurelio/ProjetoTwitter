-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Set-2017 às 18:53
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `tweetada` text COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `Datatweet` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tweets`
--

INSERT INTO `tweets` (`id`, `tweetada`, `user_id`, `Datatweet`) VALUES
(2, 'Maravilha de Tweeter do Fer ', 31, '2017-08-31 18:05:00'),
(3, 'Dia Lindo para se Twittar sobre esse novo twitter do Fer.!', 31, '2017-08-31 18:11:03'),
(4, 'Namaste, Ã© lindo dizer! Hakunamatata sim vai intender!', 31, '2017-08-31 18:13:11'),
(5, 'Lindo dia', 31, '2017-08-31 18:54:14'),
(6, 'Atualiza sem F5, isso Ã© lindo!', 31, '2017-08-31 19:31:10'),
(7, 'Foi top', 31, '2017-08-31 19:32:14'),
(8, 'Lindo sem Refresh', 31, '2017-08-31 19:32:57'),
(9, 'O tweeter do Fer, Ã© muito melhor que o Original', 31, '2017-08-31 20:00:36'),
(10, 'Teste', 32, '2017-08-31 21:16:30'),
(11, 'testando', 32, '2017-08-31 21:21:58'),
(12, 'fe', 31, '2017-08-31 22:33:50'),
(13, 'Linda essa vida!', 31, '2017-09-01 12:49:32'),
(14, 'que lindo esse blond', 33, '2017-09-01 14:16:02'),
(15, 'Gente, estou amando fazer meu cabelo aqui na Miss e Mister Cabeleireiros', 33, '2017-09-01 14:19:32'),
(19, 'Hoje o dia foi corrido! SÃ³ quero minha cama #Cansado', 31, '2017-09-01 18:29:37'),
(27, 'TEste de post da Celina ', 33, '2017-09-02 08:53:42'),
(28, 'Que Delicia esse twitter do Fer. Ele funciona sem LentidÃ£o!', 31, '2017-09-02 12:14:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usuario` varchar(299) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `senha` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `usuario`, `email`, `senha`) VALUES
(29, 'JackBala', 'jackson@gmail.com', 'ffcc2739839a5968f13810ac94e76c6f'),
(30, 'Fernando', 'fer@fer.com.br', 'ffcc2739839a5968f13810ac94e76c6f'),
(31, 'FernandoSlivera', 'fernandoaurelios@gmail.com', 'ffcc2739839a5968f13810ac94e76c6f'),
(32, 'Cleiton', 'cleiton@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(33, 'CelinaMartins', 'celinama@teste.com.br', 'bcfad6f6870c76b6916cdcd5e5e5c133');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_seguidores`
--

CREATE TABLE `usuario_seguidores` (
  `id_usuario_seguidor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `seguido_id_usuario` int(11) NOT NULL,
  `data_registro` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuario_seguidores`
--

INSERT INTO `usuario_seguidores` (`id_usuario_seguidor`, `id_usuario`, `seguido_id_usuario`, `data_registro`) VALUES
(16, 31, 32, '2017-09-02 09:28:54'),
(17, 31, 29, '2017-09-02 11:17:17'),
(18, 31, 33, '2017-09-02 11:17:19'),
(19, 33, 31, '2017-09-02 12:15:12'),
(20, 33, 32, '2017-09-02 12:15:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_seguidores`
--
ALTER TABLE `usuario_seguidores`
  ADD PRIMARY KEY (`id_usuario_seguidor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `usuario_seguidores`
--
ALTER TABLE `usuario_seguidores`
  MODIFY `id_usuario_seguidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
