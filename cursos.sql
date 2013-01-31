-- Tempo de Geração: 24/01/2013 às 19h59min
-- Versão do Servidor: 5.5.28
-- Versão do PHP: 5.4.9-4~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de Dados: `PortalCursos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campus`
--

CREATE TABLE IF NOT EXISTS `campus` (
  `id_campus` int(5) NOT NULL,
  `nome_campus` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mapa_nome_arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_campus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campus`
--

INSERT INTO `campus` (`id_campus`, `nome_campus`, `mapa_nome_arquivo`) VALUES
(1, 'Campus Teste', '1.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_nivel` int(5) NOT NULL,
  `id_campus` int(5) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `carga_horaria` int(5) DEFAULT NULL,
  `area_atuacao` text,
  `duracao_semestral` int(5) DEFAULT NULL,
  `turno` text,
  `vagas` int(5) DEFAULT NULL,
  `coordenador` varchar(128) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `publico_alvo` text,
  `perfil_profissional` text,
  `certificacao` text,
  `forma_ingresso` text,
  `local` text,
  `projeto_pedagogico` varchar(100) DEFAULT NULL,
  `projeto_tipo` varchar(12) DEFAULT NULL,
  `projeto_nome` varchar(128) DEFAULT NULL,
  `projeto_detalhes` text,
  PRIMARY KEY (`id`),
  KEY `fk_cursos_campus_idx` (`id_campus`),
  KEY `fk_cursos_nivel_idx` (`id_nivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `id_nivel`, `id_campus`, `nome`, `descricao`, `carga_horaria`, `area_atuacao`, `duracao_semestral`, `turno`, `vagas`, `coordenador`, `email`, `telefone`, `publico_alvo`, `perfil_profissional`, `certificacao`, `forma_ingresso`, `local`, `projeto_pedagogico`, `projeto_tipo`, `projeto_nome`, `projeto_detalhes`) VALUES
(1, 1, 1, 'Curso Teste', 'É um curso técnico de nível médio na área de teste. Possibilita atuação em empresas públicas e privadas, escritórios de projetos e de construção civil e em canteiro de obras. Trabalha em parceria com engenheiros civis, eletricistas e agrimensores. Estamos estudando possibilidades de atendimentos personalizados conforme demanda on-line de stokeholders, e tal processo viabiliza uma transferência de matérias através de vários estágios nas sete dimensões definidas pela teoria da relatividade.', 120, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi convallis, turpis et condimentum luctus, odio leo eleifend nisi, in vestibulum elit ligula a metus. Nam fermentum consequat felis, eget dapibus ipsum venenatis in. Sed vehicula lacinia sapien, ut cursus neque sodales vitae. Praesent arcu ante, porta a semper et, fermentum vel nulla. Duis felis lorem, vestibulum quis suscipit a, consectetur ut dui. ', 2, 'ENUM', 35, 'Coordenador Teste', 'curso@instituto.edu.br', '4838884455', 'Proin rutrum dui sed turpis tempor nec dignissim nibh molestie. Fusce pulvinar mattis mi, sit amet placerat nisl cursus at.', 'Perfil de Teste', 'Certificado em nível de teste', 'Definido através da instituição', 'INSTITUTO FEDERAL DE SANTA CATARINA\nCampus Florianópolis\nAvenida Mauro Ramos, 950, Centro\nCEP 88020-300 – Florianópolis (SC)', '75a0547a78b0fdd4166821b3c900e392.pdf', 'Pesquisa', 'Nome do Projeto', 'Detalhes do Projeto Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `id_imagem` int(5) NOT NULL,
  `nome_arquivo` varchar(45) NOT NULL,
  KEY `fk_imagens_cursos_idx` (`id_imagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id_imagem`, `nome_arquivo`) VALUES
(1, '1.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `infraestruturas`
--

CREATE TABLE IF NOT EXISTS `infraestruturas` (
  `id_infraestrutura` int(5) NOT NULL,
  `tipo` varchar(64) NOT NULL,
  `nome` varchar(255) NOT NULL,
  KEY `fk_infraestrutura_cursos_idx` (`id_infraestrutura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `infraestruturas`
--

INSERT INTO `infraestruturas` (`id_infraestrutura`, `tipo`, `nome`) VALUES
(1, 'laboratorio', 'Laboratório');

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

CREATE TABLE IF NOT EXISTS `niveis` (
  `id_nivel` int(5) NOT NULL,
  `nome_nivel` varchar(200) NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `niveis`
--

INSERT INTO `niveis` (`id_nivel`, `nome_nivel`) VALUES
(1, 'Curso de Nível Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS user
(
    user_id       INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    username      VARCHAR(255) DEFAULT NULL UNIQUE,
    email         VARCHAR(255) DEFAULT NULL UNIQUE,
    display_name  VARCHAR(50) DEFAULT NULL,
    password      VARCHAR(128) NOT NULL,
    state         SMALLINT,
    UNIQUE KEY `username` (`username`),
    KEY `fk_usuarios_cursos_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `user` (`user_id`,`email`, `username`, `display_name`, `password`) VALUES
(1, 'teste@if.edu.br','admin','Senha: 123mudar','$2y$14$rZZVY6y/MEUpvmHVj12zl.TYCyHUBdzuaopQ4FsTQzIX5vqYaU75G');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_cursos_campus` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cursos_nivel` FOREIGN KEY (`id_nivel`) REFERENCES `niveis` (`id_nivel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `fk_imagens_cursos` FOREIGN KEY (`id_imagem`) REFERENCES `cursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `infraestruturas`
--
ALTER TABLE `infraestruturas`
  ADD CONSTRAINT `fk_infraestrutura_cursos` FOREIGN KEY (`id_infraestrutura`) REFERENCES `cursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_cursos` FOREIGN KEY (`id_usuario`) REFERENCES `cursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
