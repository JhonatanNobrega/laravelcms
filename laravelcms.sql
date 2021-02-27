-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jan-2021 às 04:06
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laravelcms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `body` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `body`) VALUES
(1, 'Modelo', 'modelo', '<p class=\"MsoNormal\"><strong><span style=\"font-size: 12.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; color: black; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">PREGA&Ccedil;&Atilde;O DEZEMBRO</span></strong></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; color: black; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">Boa tarde, eu me chamo Jhonatan. E hoje de forma voluntaria estamos levando uma mensagem que ajuda as pessoas a ser feliz.</span></p>\r\n<p class=\"MsoNormal\"><strong><span style=\"font-size: 12.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; color: black; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">Onde podemos encontrar bons conselhos para termos uma vida feliz?</span></strong></p>\r\n<p class=\"MsoNormal\"><u><span style=\"font-size: 12.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; color: black; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">{<span style=\"mso-spacerun: yes;\">&nbsp; </span>Quem voc&ecirc; acha de pode nos der bom conselhos? }</span></u></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; color: black; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">Obrigado pela sua opini&atilde;o, {concordar no que for poss&iacute;vel}.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; color: black; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">Eu gostaria de ler para voc&ecirc; na b&iacute;blia o <strong>SALMOS 1:1-2</strong>.<span style=\"mso-spacerun: yes;\">&nbsp; </span></span></p>\r\n<p class=\"MsoNormal\"><span class=\"cl\"><strong><span style=\"font-family: \'Arial\',sans-serif; color: #00b050; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">1 </span></strong></span><span class=\"v\"><span style=\"font-family: \'Arial\',sans-serif; color: #00b050; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">Feliz &eacute; o homem que n&atilde;o anda segundo o conselho dos maus, N&atilde;o pisa no caminho dos pecadores, Nem se senta com o grupo dos zombadores. </span></span><span class=\"vl\"><strong><span style=\"font-family: \'Arial\',sans-serif; color: #00b050; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">2 </span></strong></span><span class=\"v\"><span style=\"font-family: \'Arial\',sans-serif; color: #00b050; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">Mas seu prazer est&aacute; na lei de&nbsp;Jeov&aacute;, E ele l&ecirc; a Sua lei em voz baixa dia e noite.</span></span></p>\r\n<p class=\"MsoNormal\"><span class=\"v\"><span style=\"font-size: 12.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; color: black; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">Percebeu, aqui falou que para sermos felizes n&atilde;o podemos seguir conselhos dos maus, n&atilde;o seguir caminho dos pecadores. Isso mostra que devemos escolher bem nossos amigos.</span></span></p>\r\n<p class=\"MsoNormal\"><span class=\"v\"><span style=\"font-size: 12.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; color: black; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">Al&eacute;m disso o melhor amigo que algu&eacute;m pode ter &eacute; Deus n&atilde;o concorda?</span></span></p>\r\n<p class=\"MsoNormal\"><span class=\"v\"><span style=\"font-size: 12.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; color: black; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">Ainda nesse mesmo texto mostra onde temos bom conselhos que nos ajuda a ter uma vida feliz. Nos aqui no texto &lsquo;seu prazer est&aacute; na lei de Jeov&aacute;&rsquo; e &lsquo;l&ecirc; dia e noite a sua lei.&rsquo; Ent&atilde;o na b&iacute;blia podemos encontrar bons conselhos.</span></span></p>\r\n<p class=\"MsoNormal\"><span class=\"v\"><strong><span style=\"font-size: 12.0pt; line-height: 107%; font-family: \'Arial\',sans-serif; color: black; border: none windowtext 1.0pt; mso-border-alt: none windowtext 0cm; padding: 0cm;\">Por que &eacute; ruim amar o dinheiro e buscar ter muitas coisas?</span></strong></span></p>'),
(3, 'Seja bem vindo', 'seja-bem-vindo', '<p><strong>Sej&aacute; bem vindo ao site feito em Laravel!</strong></p>\r\n<p><img src=\"http://127.0.0.1:8000/media/images/1609726508.png\" alt=\"\" width=\"200\" height=\"200\" /></p>\r\n<p>Criado por Jhonatan Nobrega</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`id`, `name`, `content`) VALUES
(1, 'title', 'Pizza Boa'),
(2, 'subtitle', 'Sub titulo novo'),
(3, 'email', 'contato@site.com.br'),
(4, 'bgcolor', '#d30d0d'),
(5, 'textcolor', '#000000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `admin`) VALUES
(1, 'Jhonatan Nobrega', 'jhonatan_nobrega@hotmail.com', '$2y$10$NEgBSi3I6Ll.DgBBZWqWteSSm8p33LlRtePNnmpzT2cazjRtjrrzm', '2iDpUhFMMHTijEHTDv3IX1pxXh6SRmPLBf6l6urRFyH2C3AchYtQu9cgmqBs', 1),
(4, 'Ingryd Nobrega', 'jhonataningryd@gmail.com', '$2y$10$5GpvBxad45fFlSGn8Rw7FOkJwvTybjm8KWNGLzA0d9QQW5L5RHGhu', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `date_access` datetime DEFAULT NULL,
  `page` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `date_access`, `page`) VALUES
(1, '123.123.123.123', '2021-01-03 18:28:29', '/'),
(2, '123', '2021-01-03 18:40:33', '/'),
(3, '123', '2021-01-03 19:03:41', '/teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
