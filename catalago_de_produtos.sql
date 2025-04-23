-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Abr-2025 às 20:50
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `catalago_de_produtos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `estudante_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `cc_1` tinyint(4) DEFAULT NULL CHECK (`cc_1` between 1 and 5),
  `cc_2` tinyint(4) DEFAULT NULL CHECK (`cc_2` between 1 and 5),
  `cc_3` tinyint(4) DEFAULT NULL CHECK (`cc_3` between 1 and 5),
  `cc_4` tinyint(4) DEFAULT NULL CHECK (`cc_4` between 1 and 5),
  `cc_5` tinyint(4) DEFAULT NULL CHECK (`cc_5` between 1 and 5),
  `cc_6` tinyint(4) DEFAULT NULL CHECK (`cc_6` between 1 and 5),
  `cc_7` tinyint(4) DEFAULT NULL CHECK (`cc_7` between 1 and 5),
  `cc_8` tinyint(4) DEFAULT NULL CHECK (`cc_8` between 1 and 5),
  `cc_9` tinyint(4) DEFAULT NULL CHECK (`cc_9` between 1 and 5),
  `cc_10` tinyint(4) DEFAULT NULL CHECK (`cc_10` between 1 and 5),
  `cc_11` tinyint(4) DEFAULT NULL CHECK (`cc_11` between 1 and 5),
  `cc_12` tinyint(4) DEFAULT NULL CHECK (`cc_12` between 1 and 5),
  `cc_13` tinyint(4) DEFAULT NULL CHECK (`cc_13` between 1 and 5),
  `rc_1` tinyint(4) DEFAULT NULL CHECK (`rc_1` between 1 and 5),
  `rc_2` tinyint(4) DEFAULT NULL CHECK (`rc_2` between 1 and 5),
  `rc_3` tinyint(4) DEFAULT NULL CHECK (`rc_3` between 1 and 5),
  `rc_4` tinyint(4) DEFAULT NULL CHECK (`rc_4` between 1 and 5),
  `rc_5` tinyint(4) DEFAULT NULL CHECK (`rc_5` between 1 and 5),
  `rc_6` tinyint(4) DEFAULT NULL CHECK (`rc_6` between 1 and 5),
  `rc_7` tinyint(4) DEFAULT NULL CHECK (`rc_7` between 1 and 5),
  `ag_1` tinyint(4) DEFAULT NULL CHECK (`ag_1` between 1 and 5),
  `ag_2` tinyint(4) DEFAULT NULL CHECK (`ag_2` between 1 and 5),
  `ag_3` tinyint(4) DEFAULT NULL CHECK (`ag_3` between 1 and 5),
  `ag_4` tinyint(4) DEFAULT NULL CHECK (`ag_4` between 1 and 5),
  `ag_5` tinyint(4) DEFAULT NULL CHECK (`ag_5` between 1 and 5),
  `ag_6` tinyint(4) DEFAULT NULL CHECK (`ag_6` between 1 and 5),
  `ag_7` tinyint(4) DEFAULT NULL CHECK (`ag_7` between 1 and 5),
  `comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `resumo` varchar(100) NOT NULL,
  `vagas` int(11) NOT NULL,
  `materiais` text DEFAULT NULL,
  `carga_horaria` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `titulo`, `resumo`, `vagas`, `materiais`, `carga_horaria`, `data_inicio`, `data_fim`, `imagem`) VALUES
(4, 'Ruptura', 'Em \"Ruptura\", uma empresa chamada Lumon Industries utiliza um procedimento experimental que separa p', 30, '', 30, '2025-05-04', '2222-02-22', 'imagem_68092ac84d8f1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudantes`
--

CREATE TABLE `estudantes` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` char(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ocupacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE `postagens` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`id`, `titulo`, `descricao`, `foto`, `projeto_id`, `data_criacao`) VALUES
(21, 'Postagem 1', 'um resgate das tradicionais receitas probióticas do Leste Asiático', '67f01760645cf.png', 4, '2025-04-04 00:00:00'),
(22, 'Naturologia', 'monhada', '67f0185149ac2.png', 3, '2025-04-04 00:00:00'),
(23, 'Cozinha do Farmácia', 'monhada', '67f019f98a48f.png', 3, '2025-04-04 00:00:00'),
(24, 'SDADSA', 'sssss', '67f01a66a5946.png', 4, '2025-04-04 00:00:00'),
(25, 'Halemonos laros', 'vugnaes sreo', '67f3b4e1a2c9e.jpg', 3, '2025-04-07 00:00:00'),
(27, 'Tecnico em Impressora', 'DAmmn', '67f4359a2a877.jpg', 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `capa` varchar(255) NOT NULL,
  `cor1` char(7) NOT NULL,
  `cor2` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `titulo`, `descricao`, `capa`, `cor1`, `cor2`) VALUES
(3, 'Cozinha do Farmácia', 'um resgate das tradicionais receitas probióticas do Leste Asiático', '67ea899a630a3.png', '#a92828', '#476a25'),
(4, 'Farmácia Verde', 'Projeto farmácia verde', '67ea8ad00d828.png', '#0e8906', '#a0fe62'),
(5, 'Tecendo Saberes', 'projeto do farmácia', '67f3b8663fe06.jpg', '#efff0f', '#ffcf66');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `ingredientes` text NOT NULL,
  `modo_preparo` text NOT NULL,
  `tempo_preparo` int(11) DEFAULT NULL,
  `rendimento` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `data_criacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`id`, `titulo`, `descricao`, `ingredientes`, `modo_preparo`, `tempo_preparo`, `rendimento`, `categoria`, `imagem`, `data_criacao`) VALUES
(1, 'Lasanha', 'delicinha', '2 ovos, 1 xicara de farinha, molho, queijo', 'só meter ', 40, '5 fatias', 'Salgado', '67f6a74a2e424.jpg', '2025-04-09 00:00:00'),
(2, 'Paqueca', 'yummy', ' 1 e 1/4 xícara (chá) de farinha de trigo, 3 colheres (chá) de fermento em pó,  1 xícara (chá) de leite,  pitada de sal,  1 colher (sopa) de açúcar, 2 ovos levemente batidos, 2 colheres (sopa) de manteiga derretida, óleo', 'Misture em um recipiente: a farinha, o açúcar, o fermento e o sal.\r\n\r\n2\r\nEm outro recipiente, misture os ovos, o leite e a manteiga.\r\n\r\n3\r\nAcrescente os líquidos aos secos, sem misturar em excesso.\r\n\r\n4\r\nO ponto da massa não deve ser muito líquido, deve escorrer lentamente.\r\n\r\n5\r\nAqueça e unte a frigideira com óleo, coloque a massa no centro, cerca de 1/4 xícara por panqueca.\r\n\r\n6\r\nVire a massa para assar do outro lado e está pronto!', 40, '10 paquecas', 'Café da manhã', '67f94ea1b43f1.webp', '2025-04-11 00:00:00'),
(3, 'bronie', 'UAAAAAAAAAAAAU', '1 xicara de açucar, 2 ovo, 4 colheres de manteiga, 1/2 xicara de cacau 70%, 1 xicara de farinha de trigo', 'Mete tudo e mistura, depois cuzinha', 30, '20 bronie', 'Doce', '67f94fe14f913.webp', '2025-04-11 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel` enum('1','2','3') NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` char(11) NOT NULL,
  `ocupacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nivel`, `email`, `cpf`, `ocupacao`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 'admin@gmail.com', '00000000000', 'Adimininastrô'),
(9, 'aluno', 'ca0cd09a12abade3bf0777574d9f987f', '3', 'aluno@gmail.com', '00000000001', 'Aluno');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudante_id` (`estudante_id`),
  ADD KEY `fk_avaliacoes_curso` (`curso_id`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estudantes`
--
ALTER TABLE `estudantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Índices para tabela `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projeto_id` (`projeto_id`);

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `estudantes`
--
ALTER TABLE `estudantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`estudante_id`) REFERENCES `estudantes` (`id`),
  ADD CONSTRAINT `fk_avaliacoes_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Limitadores para a tabela `estudantes`
--
ALTER TABLE `estudantes`
  ADD CONSTRAINT `estudantes_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Limitadores para a tabela `postagens`
--
ALTER TABLE `postagens`
  ADD CONSTRAINT `postagens_ibfk_1` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
