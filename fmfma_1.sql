-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Nov 25, 2014 as 10:07 PM
-- Versão do Servidor: 5.1.66
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `fmfma_1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arbitragem`
--

CREATE TABLE IF NOT EXISTS `arbitragem` (
  `idarbitragem` int(11) NOT NULL AUTO_INCREMENT,
  `idarbitro` int(11) NOT NULL,
  `idjogo` int(11) NOT NULL,
  `observacoes` text,
  PRIMARY KEY (`idarbitragem`,`idjogo`,`idarbitro`),
  KEY `idarbitro` (`idarbitro`),
  KEY `fk_arbitragem_jogo1` (`idjogo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `arbitragem`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `arbitro`
--

CREATE TABLE IF NOT EXISTS `arbitro` (
  `idarbitro` int(11) NOT NULL AUTO_INCREMENT,
  `indicacao_data_hora` varchar(100) DEFAULT NULL,
  `nome` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `profissao` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `cargo_fmf` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `categoria` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ano_formacao` int(11) DEFAULT NULL,
  `ano_inclusao` int(11) DEFAULT NULL,
  `filiacao` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `sexo` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `naturalidade` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `escolaridade` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `estado_civil` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `titulo_eleitor` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `reservista` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cpfr` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `rg` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `endereco` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `numero_quadra` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `bairro` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `telefone` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `celular` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `altura` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `peso` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `dados_bancario` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `PIS` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `manequim` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `tipo_sanguineo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idarbitro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `arbitro`
--

INSERT INTO `arbitro` (`idarbitro`, `indicacao_data_hora`, `nome`, `nascimento`, `idade`, `profissao`, `cargo_fmf`, `categoria`, `ano_formacao`, `ano_inclusao`, `filiacao`, `sexo`, `naturalidade`, `escolaridade`, `estado_civil`, `titulo_eleitor`, `reservista`, `cpfr`, `rg`, `endereco`, `numero_quadra`, `bairro`, `telefone`, `celular`, `altura`, `peso`, `dados_bancario`, `PIS`, `manequim`, `tipo_sanguineo`) VALUES
(1, '12/2/2013 17:36:54', 'Marcelo Bispo Nunes Filho', '1961-02-10', 52, 'Policial Militar', 'Assessor', 'ASP/FIFA', 1983, 1989, 'Marcelo Bispo Nunes Filho e Raimundo Antonia Campo Nunes', 'Masculino', 'Pinheiro', 'Segundo Grau Completo', 'Casado', '1014131171', '', '', '', 'Rua Itatiaia 4038 Edificio Tulipa Apt. 01', 'Quadra das Flores -Condominio Novo Tempo II', 'Cohafuma', '32433869', '', '1,7', '95', 'Agencia 3650-1 Conta Corrente 24.940-8 Banco Brasil', '11131724741', 'Calça G - Camisa G - Calçado 40', 'A Positivo'),
(2, '12/2/2013 18:08:45', 'Carlos André Pereira Sousa', '1990-03-17', 23, 'Aux de Secretaria', 'Assistente', 'CBF - 2', 2008, 2008, 'Francisca Dilma Pereira Sousa / Genival dos Santos Sousa', 'Masculino', 'Imperatriz - MA', 'Cursando ensino superior.', 'Solteiro', '61591481138', '', '3592559303', '203986120021', 'Rua Heráclito Graça n 03', '3', 'Pq Anhanguera', '81416183', '', '1,73', '73', 'Conta poupança Banco do Brasil/ agência 4466-0/ conta 9.035-2/ variação 51', '16188189390', 'M', 'O+'),
(3, '12/2/2013 18:20:51', 'ANTONIO FERNANDO DE SOUSA SANTOS', '0000-00-00', 38, 'AUXLLIAR DE CONTABILIDADE', 'Assistente', 'CBF - 2', 0, 0, 'JOSEFAUSTINO DOS SANTOS', 'Masculino', 'IMPERATRIZ-MA', 'SEGUNDO GRAU COMPLETO', 'CASADO', '', '12363636363645', '', '75913208315', '10733293-0', 'RUA SÃO  DOMINGOS', '97', 'VILA COELHO DIAS', '', '(99) 8206-1683', '1,67', '73 KG', 'CAIXA ECONOMICA FEDERAL  AGENCIA 0764  OPERAÇÃO 013  CONTA 87241-1', '12996996374', '44'),
(4, '12/2/2013 20:23:13', 'OTÁVIO JOSÉ DE  ARAÚJO NETO', '0000-00-00', 27, 'ESTUDANTE', 'Arbitro', 'FMF - 2', 0, 0, '2013', 'Masculino', 'SÃO LUÍS - MA', 'ENSINO SUPERIOR INCOMPLETO TURISMO', 'SOLTEIRO', '', '57870371139', '', '2040963324', '140766520008', 'RUA AGOSTINHO TORRES', '257', 'JOÃO PAULO', '32491391', '88162748', '1.80', '86', 'CONTA CORRENTE 36.072-4  AGÊNCIA 1414-1 BANCO DO BRASIL', '168978657-1', 'G'),
(5, '12/2/2013 21:32:39', 'Luciano Borges Barbosa', '0000-00-00', 22, 'Serviços Gerais', 'Assistente', 'FMF - 2', 0, 0, 'LIF', 'Masculino', 'Imperatriz ma', 'Ensino medio', 'Solteiro', '', '65272981163', '', '5941367333', '207311520025', 'Rua Nativa', '13', 'Parque Amazonas', '9996438011', '9991209657', '1.74', '68', 'Conta: 00307841 Agencia: 3151 Operaçao: 013', '16361424090', 'G'),
(6, '12/2/2013 22:15:03', 'SANDRO DO NASCIMENTO MEDEIROS', '0000-00-00', 38, 'PROF. DE EDUCAÇÃO FÍSICA', 'Assistente', 'CBF - 2', 0, 0, 'REINALDO BARBOSA MEDEIROS E NILSA DO NASCIMENTO MEDEIROS', 'Masculino', 'SÃO JOÃO DO CARÚ-MA', 'ENSINO SUPERIOR EM LICENCIATURA PLENA EM EDUCAÇÃO FÍSICA. PÓS GRADUADO EM DIDÁTICA UNIVERSITÁRIA E PERSONAL TRAINER.', 'CASADO', '', '24968821104', '', '61418293334', '55419933', 'RUA GODOFREDO VIANA 385', '385', 'NOVA IMPERATRIZ', '', '99 81527873', '1,73', '77KG', 'CONTA POUPANÇA 00229091-3 AG: 0644 OP:013 CAIXA ECONOMICA', '1287652/6370', 'G'),
(7, '2/3/2013 0:37:12', 'RANILTON OLIVEIRA DE SOUSA', '0000-00-00', 31, 'TECNOLOGO EM RH', 'Arbitro', 'CBF - 2', 0, 0, 'LIGA IMPERATRIZENSE DE FUTEBOL', 'Masculino', 'IMPERATRIZ-MA', 'ENSINO SUPERIOR COMPLETO EM GESTÃO EM RECURSOS HUMANOS', 'CASADO', '', '38013361139', '', '96244755391', '158789620003', 'RUA: PEDRO AMERICO', 'Nº 15 /  QD - 13', 'OURO VERDE', '', '9991578138 / 9988523', '1,72', '71 kg', 'C/P:3140-4  AG:3151 OP: 013   CAIXA ECONOMICA FEDERAL', '16588301945', 'MEDIO'),
(8, '12/3/2013 8:53:37', 'Mayron Frederico Novais', '0000-00-00', 35, 'Contador', 'Arbitro', 'CBF - 1', 0, 0, 'José Martins Novais / Celeste Maria dos Reis Novais', 'Masculino', 'São Luis - MA', 'Pós Graduado em Auditoria, Controladoria e Finanças.', 'Casado', '', '298737849187', '', '62252267372', '214410943', 'Avenida Jeronimo de Albuquerque Maranhao 306 CONDOMINIO COSTA DO SAUIPE BLOCO VI', 'Apt 306, Blc VI, Condominio Costa do Sauípe', 'Angelim', '9832341575', '9888087513', '1,76', '76', 'CC 830604 AG1576 013', '12635628626', 'M'),
(9, '12/3/2013 11:05:21', 'Raphael Max Borges Pereira', '0000-00-00', 19, 'Designer Gráfico', 'Assistente', 'FMF - 2', 0, 0, 'Filho', 'Masculino', 'São Luís - MA', 'Ensino médio completo', 'Maranhão', '', '72361811163', '', '5150547395', '361320620080', 'Rua Flávio Bezerra', '543', 'São Cristovão', '(98) 325-88172', '(98) 8244-7624', '1,73', '65', 'C/P AG: 3273 OP 013 Conta : 00014345-1 Caixa Economica', '12562138378', 'P'),
(10, '12/3/2013 12:25:56', 'RANILTON OLIVEIRA DE SOUSA', '0000-00-00', 31, 'TECNOLOGO EM RH', 'Arbitro', 'CBF - 2', 0, 0, 'FRANCISCO CLARINDO DE SOUSA E ARINEIA MARQUES DE OLIVEIRA', 'Masculino', 'IMPERATRIZ-MA', 'ENSINO SUPERIOR COMPLETO EM RECURSOS HUMANOS  E  CURSANDO QUARTO PERÍODO DE GEOGRAFIA.', 'CASADO', '', '38013361139', '', '96244755391', '158789620003', 'RUA: PEDRO AMERICO', 'Nº 15 /  QD - 13', 'OURO VERDE', '', '9991578138 / 9988523', '1,72', '71 kg', 'CONTA POUPANCA:3140-4  AGENCIA:3151 OPERAÇÃO: 013   CAIXA ECONOMICA FEDERAL', '16588301945', 'MEDIO'),
(11, '12/3/2013 21:13:10', 'JORGE LUIS VIANA DA SILVA', '0000-00-00', 39, 'ADMINISTRADOR', 'Arbitro', 'FMF - 1', 0, 0, 'FEDERAÇÃO MARANHENSE DE FUTEBOL', 'Masculino', 'SÃO LUIS- MA', 'ENSINO SUPERIOR INCOMPLETO EM BACHAREL EM ADMINISTRAÇÃO DE EMPRESAS', 'CASADO', '', '25874361155', '', '51567768334', '1540935', 'RUA AMÁLIA SALDANHA,', '105', 'COROADINHO', 'XXXXXXXXXXXXXXXX', '8839 4743', '1,76', '74K', 'C/P: 39213-1   AG:1649   OP: 013 CEF', '12656415375', 'M(40-'),
(12, '12/3/2013 22:47:30', 'Jose Henrique de Azevedo Junior', '0000-00-00', 21, 'Professor de Educação Física', 'Arbitro', 'FMF - 2', 0, 0, 'Jose Henrique de Azevedo e Ana Cristina de Almeida Azevedo', 'Masculino', 'São Luis-MA', 'Ensino superior completo em Educação Física', 'Maranhão', '', '65641051112', '', '4853722319', '155117520004', 'rua 3 quadra casa 1', '2', 'Jardim America', '9832471824', '88435236', '1.84m', '88.5kg', 'Conta Poupança agencia:1413 conta:00018021-1', '11498038047', 'G'),
(13, '12/4/2013 14:49:40', 'adriana oliveira carvalho', '0000-00-00', 18, 'serviços gerais', 'Assistente', 'FMF - 2', 0, 0, 'liga imperatrizense de futebol', 'Feminino', 'imperatriz-ma', 'Ensino médio', 'solteira', '', '0731 0428 1104', '', '068.259.343-50', '035405382008-6', 'rua euclides da cunha', '12', 'Bacuri', '', '99 9177-0036', '1.60', '46', 'conta:013.00.052.271-0 Agencia 0644 Banco Caixa economica', '206.18529.37-8', 'p'),
(14, '12/4/2013 17:47:53', 'JONATHAN ALMEIDA', '0000-00-00', 30, 'OP. DE MÁQUINAS PESADAS', 'Assistente', 'FMF - 2', 0, 0, 'SEBASTIANA ALMEIDA', 'Masculino', 'PINHEIRO - MA', 'ENSINO MÉDIO COMPLETO', 'CASADO', '', '002483002593 247', '', '51338173200', '205522520023', 'RUA 07 CASA 01', 'CASA 01', 'ALTO BONITO MARACANÃ', '', '96059542', '169', '68', '0', '20951150949', 'M'),
(15, '12/5/2013 11:54:16', 'RAIMUNDO NUNES DA CONCEICAO', '0000-00-00', 40, 'VIGILANTE', 'Arbitro', 'FMF - 2', 0, 0, 'JOAQUIM DA CONCEICAO E MARIA DO CARMO NUNES', 'Masculino', 'CODO', 'CURSANDO ENSINO MEDIO', 'CASADO', '', '28260594-0', '', '746.514.803-06', '282605940 SSP MA', 'RUA RAIMUNDO GRANDAO', '246', 'JOSE CASTRO', 'NAO TEM', '99 88447323', '1,75', '77 KLS', 'CONTA CORRENTE 46.258-6 AGENCIA 0124-4 DO BANCO DO BRASIL', '1258057837-6', 'MEDIO'),
(16, '12/5/2013 11:54:38', 'Djavan Costa da Silva', '0000-00-00', 29, 'Função Professor, Cargo =Supervisor Escolar', 'Arbitro', 'FMF - 2', 0, 0, '''05/12/2007', 'Masculino', 'Colinas - MA', 'Graduado em pedagogia,Pós-Graduado em Psicopedagogia,Pós-Graduando em Gestão e Supervisão Escolar e Pós- Graduando em Educação de Jovens e Adultos e Idosos,UEMA. e Bacharelando em Direito 5º Período ,', 'Casado', '', '040475521120 Zona 19, Seção 0307', '', '993255943-15', '2274349 SSP/PI', 'Rua 23 Nº 138', 'Não têm', 'Cidade Nova II, Timon- Ma', '86-8823-5298', '86-8839-3857', '1,69 cm', '65 Kg', 'Agencia 2442, Operação 013, Conta 00034608-0 Caixa Econômica', '127.62512.48-6', 'Camis'),
(18, '12/9/2013 16:08:35', 'RILDO LOPES DE MIRANDA', '0000-00-00', 35, 'POLICIAL MILITAR', 'Arbitro', 'FMF - 2', 0, 0, '2013', 'Masculino', 'CONCEIÇÃO DO ARAGUAIA-PA', 'ENSINO SUPERIOR EM COMPLETO EM GESTÃO PUBLICA', 'CASADO', '', '32887671112', '', '805814633-15', '14639 PMMA', 'RUA ALMIR SILVA', '3000', 'ALTAMIRA', '', '99 8821 1355', '1,67', '72', 'C/C 17435-1 AG0782-X BANCO DO BRASIL', '1822155056-1', 'M'),
(19, '12/12/2013 21:17:32', 'ANTONIO JEAN LIMA DOS SANTOS', '0000-00-00', 39, 'POLICIAL MILITAR', 'Arbitro', 'ASP/FIFA', 0, 0, 'JOSE RIBAMAR DOS SANTOS E MARIA JOSE LIMA DOS SANTOS', 'Masculino', 'SÃO LUIS', 'ENSINO MEDIO COMPLETO', 'CASADO', '', '21944641147', '', '556994803-15', '12.182 PMMA', 'RUA GABRIELA MISTRAL', '84', 'VILA PALMEIRA', '98-3243-2626', '98-88863544', '1.65', '66', 'AGÉNCIA-29548 CONTA-198684', '1904400237-9', 'CAMIS'),
(20, '12/21/2013 9:16:18', 'CÍCERO ROMÃO BATISTA SILVA', '0000-00-00', 40, 'AGENTE DOS CORREIOS (CARTEIRO)', 'Assistente', 'CBF - 2', 0, 0, 'ERMETO VIEIRA DA SILVA E SÔNIA DE OLIVEIRA SILVA', 'Masculino', 'IMPERATRIZ - MA', 'ENSINO SUPERIOR COMPLETO EM PEDAGOGIA.', 'SOLTERO', '', '20993061147', '', '40214885372', '144770520000', 'AVENIDA FIQUENE', '10', 'RIBEIRÃO DA ROÇA, GOVERNADOR EDISON LOBÃO - MA', '', '(99)8823-2909/911009', '1,72', '73', 'CONTA CORRENTE 0076790-5 AGÊNCIA 2218-7 BANCO BRADESCO', '12529063828', 'CAMIS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo_competicao`
--

CREATE TABLE IF NOT EXISTS `arquivo_competicao` (
  `idarquivo_competicao` int(11) NOT NULL AUTO_INCREMENT,
  `idcompeticao` int(11) NOT NULL,
  `iddocumento` int(11) NOT NULL,
  PRIMARY KEY (`idarquivo_competicao`,`idcompeticao`,`iddocumento`),
  KEY `fk_arquivo_competicao_competicao1` (`idcompeticao`),
  KEY `fk_arquivo_competicao_documento1` (`iddocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `arquivo_competicao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo_jogo`
--

CREATE TABLE IF NOT EXISTS `arquivo_jogo` (
  `idarquivo_jogo` int(11) NOT NULL AUTO_INCREMENT,
  `idjogo` int(11) NOT NULL,
  `iddocumento` int(11) NOT NULL,
  PRIMARY KEY (`idarquivo_jogo`,`idjogo`,`iddocumento`),
  KEY `fk_arquivo_jogo_documento1` (`iddocumento`),
  KEY `fk_arquivo_jogo_jogo1` (`idjogo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `arquivo_jogo`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` int(11) NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(125) COLLATE utf8_bin NOT NULL,
  `last_activity` int(11) NOT NULL,
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
(0, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0', 1398385160, ''),
(9, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0', 1398386425, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao`
--

CREATE TABLE IF NOT EXISTS `classificacao` (
  `idclassificacao` int(11) NOT NULL AUTO_INCREMENT,
  `idconvidado` int(11) NOT NULL,
  `jogos` int(11) NOT NULL,
  `pontos` int(11) DEFAULT NULL,
  `vitorias` int(11) DEFAULT NULL,
  `derrotas` int(11) DEFAULT NULL,
  `empates` int(11) DEFAULT NULL,
  `gols_pro` int(11) DEFAULT NULL,
  `gols_contra` int(11) DEFAULT NULL,
  `aproveitamento` int(11) DEFAULT NULL,
  `eliminado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idclassificacao`,`idconvidado`),
  KEY `fk_classificacao_convidado1` (`idconvidado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `classificacao`
--

INSERT INTO `classificacao` (`idclassificacao`, `idconvidado`, `jogos`, `pontos`, `vitorias`, `derrotas`, `empates`, `gols_pro`, `gols_contra`, `aproveitamento`, `eliminado`) VALUES
(1, 1, 0, 9, 3, 1, 0, 9, 6, 75, 0),
(2, 3, 0, 6, 2, 2, 0, 9, 6, 50, 0),
(3, 2, 0, 6, 2, 2, 0, 7, 6, 50, 1),
(4, 4, 0, 6, 2, 2, 0, 6, 6, 50, 1),
(5, 5, 0, 3, 1, 3, 0, 2, 9, 25, 1),
(6, 6, 0, 10, 3, 0, 1, 8, 1, 83, 0),
(7, 7, 0, 9, 3, 1, 0, 5, 5, 75, 0),
(8, 8, 0, 5, 1, 1, 2, 5, 1, 41, 1),
(9, 9, 0, 4, 1, 2, 1, 2, 3, 33, 1),
(10, 10, 0, 0, 0, 0, 4, 0, 7, 0, 1),
(11, 13, 0, 12, 4, 1, 0, 9, 3, 80, 0),
(12, 14, 0, 12, 4, 1, 0, 11, 6, 80, 0),
(13, 15, 0, 11, 3, 0, 2, 9, 3, 73, 1),
(14, 16, 0, 7, 2, 2, 1, 7, 4, 46, 1),
(15, 17, 0, 6, 2, 3, 0, 4, 6, 40, 1),
(16, 26, 0, 9, 3, 2, 0, 6, 2, 60, 0),
(17, 30, 0, 9, 3, 2, 0, 5, 3, 60, 0),
(18, 29, 0, 3, 1, 4, 0, 3, 14, 20, 1),
(19, 27, 0, 2, 0, 3, 2, 4, 7, 13, 1),
(20, 28, 0, 1, 0, 4, 1, 4, 14, 6, 1),
(21, 32, 0, 0, 0, 2, 0, 1, 6, 0, 1),
(22, 31, 0, 6, 2, 0, 0, 6, 1, 100, 0),
(23, 33, 0, 1, 0, 1, 1, 4, 7, 16, 1),
(24, 34, 0, 4, 1, 0, 1, 7, 4, 74, 0),
(25, 35, 0, 3, 1, 1, 0, 2, 1, 50, 0),
(26, 36, 0, 3, 1, 1, 0, 1, 2, 50, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clube`
--

CREATE TABLE IF NOT EXISTS `clube` (
  `idclube` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `apelido` varchar(45) DEFAULT NULL,
  `bandeira` varchar(100) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `fundacao` date DEFAULT NULL,
  `categoria` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idclube`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `clube`
--

INSERT INTO `clube` (`idclube`, `nome`, `apelido`, `bandeira`, `url`, `fundacao`, `categoria`) VALUES
(1, 'Sampaio Corrêa Futebol Clube', 'Sampaio Correa', 'sampaio.png', 'sampaio', '1923-03-25', 'Profissional'),
(2, 'Moto Club de São Luis', 'Moto Club', 'moto.png', 'moto-club', '1937-09-13', 'Profissional'),
(3, 'Maranhão Atlético Clube', 'Maranhão', 'mac.png', 'mac', '1923-09-24', 'Profissional'),
(4, 'Cordino Esporte Clube', 'Cordino', 'cordino.png', 'cordino', '2010-03-08', 'Profissional'),
(5, 'São José de Ribamar Esporte Clube', 'São Jose', 'sao jose.png', 'sao-jose', '2007-05-14', 'Profissional'),
(6, 'Sociedade Atlética Imperatriz', 'Imperatriz', 'imperatriz.png', 'imperatriz', NULL, 'Profissional'),
(7, 'Bacabal Esporte Clube', 'Bacabal', 'bacabal.png', 'bacabal', '1974-05-14', 'Profissional'),
(8, 'Sociedade Esportiva Balsas Futebol Clube', 'Balsas', 'balsas.png', 'balsas', '1999-05-25', 'Profissional'),
(9, 'Santa Quitéria Futebol Clube', 'Santa Quitéria', 'santa.png', 'santa-quiteria', '2005-04-16', 'Profissional'),
(10, 'Araioses', 'Araioses', 'araioses.png', 'araioses', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `competicao`
--

CREATE TABLE IF NOT EXISTS `competicao` (
  `idcompeticao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `ano` int(11) NOT NULL,
  `ativa` tinyint(1) DEFAULT '1',
  `n_modulos` int(11) NOT NULL,
  `n_rebaixados` int(11) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcompeticao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `competicao`
--

INSERT INTO `competicao` (`idcompeticao`, `nome`, `apelido`, `ano`, `ativa`, `n_modulos`, `n_rebaixados`, `url`) VALUES
(1, 'Campeonato Maranhense Série A', 'Maranhense Série "A"', 2014, 1, 3, 2, 'maranhense-serie-a'),
(2, 'Campeonato Maranhense Serie "B"', 'Maranhense Série "B"', 2014, 1, 3, 4, 'maranhense-serie-b'),
(3, 'Campeonato Maranhense Serie "A"', 'Maranhense Série "A"', 2013, 1, 6, 4, 'maranhense-serie-a'),
(8, 'Torneio de Verão 2015', 'Torneio de Verão', 2014, 1, 2, 3, 'torneio-verao-2015'),
(9, 'Taça Cidade de São Luis', 'Taça Cidade', 2014, 1, 2, 2, 'taca-cidade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE IF NOT EXISTS `contrato` (
  `idcontrato` int(11) NOT NULL AUTO_INCREMENT,
  `idjogador` int(11) NOT NULL,
  `idclube` int(11) NOT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `observacoes` text,
  PRIMARY KEY (`idcontrato`,`idjogador`,`idclube`),
  KEY `fk_contrato_jogador1` (`idjogador`),
  KEY `fk_contrato_clube1` (`idclube`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `contrato`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `convidado`
--

CREATE TABLE IF NOT EXISTS `convidado` (
  `idconvidado` int(11) NOT NULL AUTO_INCREMENT,
  `idgrupo` int(11) NOT NULL,
  `idclube` int(11) NOT NULL,
  `idfase` int(11) NOT NULL,
  PRIMARY KEY (`idconvidado`,`idgrupo`,`idclube`,`idfase`),
  KEY `fk_convidado_grupo1` (`idgrupo`),
  KEY `fk_convidado_clube1` (`idclube`),
  KEY `fk_convidado_fase1` (`idfase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Extraindo dados da tabela `convidado`
--

INSERT INTO `convidado` (`idconvidado`, `idgrupo`, `idclube`, `idfase`) VALUES
(1, 1, 2, 1),
(2, 1, 6, 1),
(3, 1, 10, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 2, 1, 1),
(7, 2, 9, 1),
(8, 2, 3, 1),
(9, 2, 8, 1),
(10, 2, 7, 1),
(11, 3, 1, 2),
(12, 3, 2, 2),
(13, 11, 2, 4),
(14, 11, 4, 4),
(15, 11, 6, 4),
(16, 11, 5, 4),
(17, 11, 10, 4),
(26, 12, 1, 4),
(27, 12, 3, 4),
(28, 12, 7, 4),
(29, 12, 8, 4),
(30, 12, 9, 4),
(31, 13, 1, 5),
(32, 13, 4, 5),
(33, 13, 9, 5),
(34, 13, 2, 5),
(35, 15, 1, 6),
(36, 15, 2, 6),
(39, 16, 4, 12),
(40, 16, 5, 12),
(41, 17, 1, 12),
(42, 17, 2, 12),
(43, 18, 1, 15),
(44, 18, 2, 15),
(45, 19, 9, 16),
(46, 19, 10, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhe_jogador`
--

CREATE TABLE IF NOT EXISTS `detalhe_jogador` (
  `iddetalhe_jogador` int(11) NOT NULL AUTO_INCREMENT,
  `idcompeticao` int(11) NOT NULL,
  `idcontrato` int(11) NOT NULL,
  `n_gols_feitos` int(11) DEFAULT NULL,
  `n_gols_contra` int(11) DEFAULT NULL,
  `n_cartoes_vermelhos` int(11) DEFAULT NULL,
  `n_cartoes_amarelos` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddetalhe_jogador`,`idcompeticao`,`idcontrato`),
  KEY `fk_detalhe_jogador_competicao1` (`idcompeticao`),
  KEY `fk_detalhe_jogador_contrato1` (`idcontrato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `detalhe_jogador`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `divisao`
--

CREATE TABLE IF NOT EXISTS `divisao` (
  `iddivisao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `n_times` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddivisao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `divisao`
--

INSERT INTO `divisao` (`iddivisao`, `nome`, `n_times`) VALUES
(1, 'Série A', 10),
(2, 'Série B', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `divisao_clube`
--

CREATE TABLE IF NOT EXISTS `divisao_clube` (
  `idclube` int(11) NOT NULL,
  `iddivisao` int(11) NOT NULL,
  `ano` int(11) DEFAULT NULL,
  PRIMARY KEY (`idclube`,`iddivisao`),
  KEY `fk_clube_has_divisao_divisao1` (`iddivisao`),
  KEY `fk_clube_has_divisao_clube1` (`idclube`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `divisao_clube`
--

INSERT INTO `divisao_clube` (`idclube`, `iddivisao`, `ano`) VALUES
(1, 1, 2014),
(2, 1, 2014),
(3, 1, 2014),
(4, 1, 2014),
(5, 1, 2014);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `iddocumento` int(11) NOT NULL AUTO_INCREMENT,
  `idsetor` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `data` date NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iddocumento`),
  KEY `idsetor` (`idsetor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `documento`
--

INSERT INTO `documento` (`iddocumento`, `idsetor`, `titulo`, `descricao`, `data`, `url`) VALUES
(11, 1, 'Convocação', 'Convocação 1ª Reunião Congresso Técnico', '2014-11-12', 'CONVOCAÇÃO_1º_REUNIÃO_CONGRESSO_TECNICO.PDF'),
(13, 1, 'Publicação do Regulamento para atender o Estatuto do Torcedor', 'Regulamento do CAMPEONATO MARANHENSE SÉRIE "A" 2015', '2014-11-14', 'REGULAMENTO_DO_CAMPEONATO_MARANHENSE_SÉRIE_A_-_2015.pdf'),
(14, 1, 'Reunião do Congresso Técnico 2014', 'Ata da 1ª Reunião do Congresso Técnico 2014', '2014-11-14', 'CAMPEONATO_MARANHENSE_2015_-_ATA_DO_CONGRESSO_TÉCNICO_-_14-11-2.pdf'),
(15, 1, 'Calendário 2015', 'Calendário de Competições 2015', '2014-11-14', 'CALENDÁRIO_DE_COMPETIÇÕES_-_2015.pdf'),
(16, 1, 'ATA - IV REUNIÃO DO CONGRESSO TÉCNICO DAS COMPETIÇÕES DA FMF', 'ATA - IV REUNIÃO DO CONGRESSO TÉCNICO DAS COMPETIÇÕES DA FMF', '2014-11-21', 'ATA_-_IV_REUNIÃO_DO_CONGRESSO_TÉCNICO_DAS_COMPETIÇÕES_DA_FMF.pdf'),
(17, 1, 'CONVOCAÇÃO', 'Edital de Convocação para Recadastramento de Clubes ', '2014-11-24', 'Recadastramento.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadio`
--

CREATE TABLE IF NOT EXISTS `estadio` (
  `idestadio` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idestadio`),
  KEY `idestadio` (`idestadio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `estadio`
--

INSERT INTO `estadio` (`idestadio`, `nome`, `apelido`, `cidade`, `url`) VALUES
(1, 'Estádio Governador João Castelo', 'Castelão', 'São Luis', 'estadio-governador-joao-castelo'),
(2, 'Estádio Nhozinho Santos', 'Nhozinho Santos', 'São Luis', 'estadio-nhozinho-santos'),
(3, 'sem estadio', 'sem estadio', 'sem estadio', 'sem-estadio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fase`
--

CREATE TABLE IF NOT EXISTS `fase` (
  `idfase` int(11) NOT NULL AUTO_INCREMENT,
  `idtipo_fase` int(11) NOT NULL,
  `idmodulo` int(11) NOT NULL,
  `n_jogos` int(11) DEFAULT NULL,
  `n_grupos` int(11) NOT NULL,
  `regra_ida_e_volta` tinyint(1) DEFAULT '0',
  `descricao` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idfase`),
  KEY `fk_modulo_has_tipo_fase_modulo1` (`idmodulo`),
  KEY `fk_modulo_has_tipo_fase_tipo_fase1` (`idtipo_fase`),
  KEY `idfase` (`idfase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `fase`
--

INSERT INTO `fase` (`idfase`, `idtipo_fase`, `idmodulo`, `n_jogos`, `n_grupos`, `regra_ida_e_volta`, `descricao`, `url`) VALUES
(1, 1, 1, 20, 2, 0, '1ª Fase do 1º Turno', NULL),
(2, 2, 1, 0, 1, 0, '2ª Fase do 1º Turno', NULL),
(3, 3, 1, 2, 1, 1, 'Descrição da 3ª Fase', NULL),
(4, 1, 2, 25, 0, 0, '1ª Fase do 2º Turno', NULL),
(5, 2, 2, 4, 0, 1, 'Semi Finais 2º Turno', NULL),
(6, 3, 2, 2, 0, 0, 'Finais do 1º Turno', NULL),
(11, 8, 3, 10, 2, 0, 'descricao', NULL),
(12, 1, 59, 2, 2, 0, 'Descricao II', NULL),
(15, 1, 60, 2, 2, 0, '', NULL),
(16, 1, 61, 2, 2, 0, '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `idimagem` int(11) NOT NULL,
  `idnoticia` int(11) NOT NULL,
  PRIMARY KEY (`idimagem`,`idnoticia`),
  KEY `idnoticia` (`idnoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `galeria`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `idgrupo` int(11) NOT NULL AUTO_INCREMENT,
  `idtipo_grupo` int(11) NOT NULL,
  `idfase` int(11) NOT NULL,
  `n_classificados` int(11) DEFAULT NULL,
  PRIMARY KEY (`idgrupo`,`idtipo_grupo`),
  KEY `fk_grupo_tipo_grupo1` (`idtipo_grupo`),
  KEY `idfase` (`idfase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `idtipo_grupo`, `idfase`, `n_classificados`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 2),
(3, 3, 2, NULL),
(4, 3, 3, NULL),
(11, 1, 4, 2),
(12, 2, 4, 2),
(13, 3, 5, 2),
(15, 3, 6, 1),
(16, 1, 12, 2),
(17, 3, 12, 1),
(18, 1, 15, 2),
(19, 1, 16, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE IF NOT EXISTS `imagem` (
  `idimagem` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idimagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `imagem`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE IF NOT EXISTS `jogador` (
  `idjogador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `idade` int(11) DEFAULT NULL,
  `sexo` varchar(12) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idjogador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `jogador`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE IF NOT EXISTS `jogo` (
  `idjogo` int(11) NOT NULL AUTO_INCREMENT,
  `n_jogo` int(11) NOT NULL,
  `time_casa` int(11) DEFAULT NULL,
  `time_visitante` int(11) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `hora` varchar(10) DEFAULT NULL,
  `gols_casa` int(11) DEFAULT NULL,
  `gols_visitante` int(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `alterado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idjogo`),
  KEY `fk_jogo_convidado1` (`time_casa`),
  KEY `fk_jogo_convidado2` (`time_visitante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`idjogo`, `n_jogo`, `time_casa`, `time_visitante`, `data`, `hora`, `gols_casa`, `gols_visitante`, `ativo`, `alterado`) VALUES
(1, 1, 4, 3, '2014-01-26 16:00:00', NULL, 3, 2, 1, 0),
(2, 2, 1, 2, '2014-01-27 20:30:00', NULL, 3, 2, 1, 0),
(3, 3, 7, 8, '2014-01-26 15:45:00', NULL, 3, 2, 1, 0),
(4, 4, 10, 6, '2014-01-26 17:00:00', NULL, 0, 3, 1, 0),
(5, 5, 2, 3, '2014-01-30 20:15:00', NULL, 3, 1, 1, 0),
(6, 6, 5, 1, '2014-05-04 20:15:00', NULL, 0, 5, 1, 0),
(7, 7, 9, 7, '2014-01-29 20:15:00', NULL, 0, 1, 1, 0),
(8, 8, 8, 10, '2014-01-29 20:15:00', NULL, 2, 0, 1, 0),
(9, 9, 3, 5, '2014-02-02 16:00:00', NULL, 2, 0, 1, 0),
(10, 10, 4, 2, '2014-02-02 16:00:00', NULL, 1, 2, 1, 0),
(11, 11, 6, 8, '2014-02-02 16:00:00', NULL, 1, 1, 1, 0),
(12, 12, 10, 9, '2014-05-02 17:00:00', NULL, 0, 1, 1, 0),
(13, 13, 3, 1, '2014-02-05 16:00:00', NULL, 4, 0, 1, 0),
(14, 14, 5, 4, '2014-02-06 16:00:00', NULL, 1, 2, 1, 0),
(15, 15, 7, 10, '2014-02-05 15:45:00', NULL, 1, 0, 1, 0),
(16, 16, 9, 6, '2014-02-06 16:00:00', NULL, 0, 1, 1, 0),
(17, 17, 2, 5, '2014-02-09 17:00:00', NULL, 0, 1, 1, 0),
(18, 18, 1, 4, '2014-02-09 17:00:00', NULL, 1, 0, 1, 0),
(19, 19, 8, 9, '2014-02-10 20:15:00', NULL, 1, 1, 1, 0),
(20, 20, 6, 7, '2014-02-10 20:15:00', NULL, 3, 0, 1, 0),
(21, 21, 7, 1, '2014-05-18 13:07:32', NULL, 1, 0, 1, 0),
(22, 22, 3, 6, '2014-02-13 16:00:00', NULL, 1, 2, 1, 0),
(23, 23, 1, 7, '2014-05-18 13:07:32', NULL, 3, 2, 1, 0),
(24, 24, 6, 3, '2014-02-16 16:00:00', NULL, 3, 1, 1, 0),
(25, 25, 1, 6, '2014-02-19 20:30:00', NULL, 1, 1, 1, 0),
(26, 26, 6, 1, '2014-02-23 17:00:00', NULL, 2, 2, 1, 0),
(27, 1, 17, 30, '2014-02-16 16:00:00', '16h', 0, 3, 1, 0),
(28, 2, 14, 29, '2014-02-26 16:00:00', '16:00', 3, 0, 1, 0),
(29, 3, 15, 26, '2014-02-26 18:00:00', NULL, 1, 0, 1, 0),
(30, 4, 14, 28, '2014-02-26 20:30:00', NULL, 3, 1, 1, 0),
(31, 5, 16, 27, '2014-02-27 20:30:00', NULL, 1, 1, 1, 0),
(32, 6, 30, 16, '2014-03-06 15:45:00', NULL, 1, 0, 1, 0),
(33, 7, 26, 14, '2014-03-06 20:30:00', NULL, 3, 0, 1, 0),
(34, 8, 28, 15, '2014-03-06 20:30:00', NULL, 2, 2, 1, 0),
(35, 9, 29, 17, '2014-03-06 20:30:00', NULL, 1, 0, 1, 0),
(36, 10, 27, 13, '2014-03-03 20:30:00', NULL, 0, 1, 1, 0),
(37, 11, 17, 27, '2014-03-09 16:00:00', NULL, 1, 0, 1, 0),
(38, 12, 14, 28, '2014-03-09 16:00:00', NULL, 3, 0, 1, 0),
(39, 13, 13, 30, '2014-03-09 17:00:00', NULL, 0, 1, 1, 0),
(40, 14, 26, 16, '2014-03-09 17:00:00', NULL, 1, 0, 1, 0),
(41, 15, 15, 28, '2014-03-09 19:00:00', NULL, 4, 1, 1, 0),
(42, 16, 14, 30, '2014-03-12 16:00:00', NULL, 0, 1, 1, 0),
(43, 17, 28, 16, '2014-03-12 20:30:00', NULL, 1, 3, 1, 0),
(44, 18, 13, 29, '2014-03-16 16:00:00', NULL, 1, 4, 1, 0),
(45, 19, 27, 15, '2014-03-16 17:00:00', NULL, 0, 0, 1, 0),
(46, 20, 26, 17, '2014-03-16 19:00:00', NULL, 2, 0, 1, 0),
(47, 21, 13, 26, '2014-03-23 16:00:00', NULL, 1, 0, 1, 0),
(48, 22, 17, 28, '2014-03-23 16:00:00', NULL, 3, 0, 1, 0),
(49, 23, 15, 30, '2014-03-23 16:00:00', NULL, 2, 0, 1, 0),
(50, 24, 14, 27, '2014-03-23 16:00:00', NULL, 4, 3, 1, 0),
(51, 25, 16, 29, '2014-03-23 16:00:00', NULL, 3, 0, 1, 0),
(52, 1, 32, 31, '2014-03-27 16:00:00', NULL, 1, 5, 1, 0),
(53, 2, 33, 34, '2014-03-27 20:15:00', NULL, 1, 4, 1, 0),
(54, 3, 31, 32, '2014-03-31 20:15:00', NULL, 1, 0, 1, 0),
(55, 4, 34, 33, '2014-03-30 17:00:00', NULL, 3, 3, 1, 0),
(56, 1, 35, 36, '2014-04-03 20:15:00', NULL, 2, 0, 1, 0),
(57, 2, 36, 35, '2014-04-05 17:00:00', NULL, 1, 0, 1, 0),
(68, 1, 39, 40, NULL, NULL, NULL, NULL, 1, 0),
(69, 2, 40, 39, NULL, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo_new`
--

CREATE TABLE IF NOT EXISTS `jogo_new` (
  `idjogo_new` int(11) NOT NULL AUTO_INCREMENT,
  `n_jogo` int(11) NOT NULL,
  `time_casa` int(11) DEFAULT NULL,
  `time_visitante` int(11) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `hora` varchar(10) DEFAULT NULL,
  `gols_casa` int(11) DEFAULT NULL,
  `gols_visitante` int(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `alterado` tinyint(1) DEFAULT '0',
  `idrodada` int(11) DEFAULT NULL,
  `bordero` varchar(200) NOT NULL,
  `sumula` varchar(200) NOT NULL,
  `idestadio` int(11) DEFAULT '3',
  PRIMARY KEY (`idjogo_new`),
  KEY `fk_jogo_new_convidado1` (`time_casa`),
  KEY `fk_jogo_new_convidado2` (`time_visitante`),
  KEY `idrodada` (`idrodada`),
  KEY `idrodada_2` (`idrodada`),
  KEY `idestadio` (`idestadio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Extraindo dados da tabela `jogo_new`
--

INSERT INTO `jogo_new` (`idjogo_new`, `n_jogo`, `time_casa`, `time_visitante`, `data`, `hora`, `gols_casa`, `gols_visitante`, `ativo`, `alterado`, `idrodada`, `bordero`, `sumula`, `idestadio`) VALUES
(1, 1, 4, 3, '2014-01-26 16:00:00', NULL, 3, 2, 1, 0, NULL, '', '', NULL),
(2, 2, 1, 2, '2014-01-27 20:30:00', NULL, 3, 2, 1, 0, NULL, '', '', NULL),
(3, 3, 7, 8, '2014-01-26 15:45:00', NULL, 3, 2, 1, 0, NULL, '', '', NULL),
(4, 4, 10, 6, '2014-01-26 17:00:00', NULL, 0, 3, 1, 0, NULL, '', '', NULL),
(5, 5, 2, 3, '2014-01-30 20:15:00', NULL, 3, 1, 1, 0, NULL, '', '', NULL),
(6, 6, 5, 1, '2014-05-04 20:15:00', NULL, 0, 5, 1, 0, NULL, '', '', NULL),
(7, 7, 9, 7, '2014-01-29 20:15:00', NULL, 0, 1, 1, 0, NULL, '', '', NULL),
(8, 8, 8, 10, '2014-01-29 20:15:00', NULL, 2, 0, 1, 0, NULL, '', '', NULL),
(9, 9, 3, 5, '2014-02-02 16:00:00', NULL, 2, 0, 1, 0, NULL, '', '', NULL),
(10, 10, 4, 2, '2014-02-02 16:00:00', NULL, 1, 2, 1, 0, NULL, '', '', NULL),
(11, 11, 6, 8, '2014-02-02 16:00:00', NULL, 1, 1, 1, 0, NULL, '', '', NULL),
(12, 12, 10, 9, '2014-05-02 17:00:00', NULL, 0, 1, 1, 0, NULL, '', '', NULL),
(13, 13, 3, 1, '2014-02-05 16:00:00', NULL, 4, 0, 1, 0, NULL, '', '', NULL),
(14, 14, 5, 4, '2014-02-06 16:00:00', NULL, 1, 2, 1, 0, NULL, '', '', NULL),
(15, 15, 7, 10, '2014-02-05 15:45:00', NULL, 1, 0, 1, 0, NULL, '', '', NULL),
(16, 16, 9, 6, '2014-02-06 16:00:00', NULL, 0, 1, 1, 0, NULL, '', '', NULL),
(17, 17, 2, 5, '2014-02-09 17:00:00', NULL, 0, 1, 1, 0, NULL, '', '', NULL),
(18, 18, 1, 4, '2014-02-09 17:00:00', NULL, 1, 0, 1, 0, NULL, '', '', NULL),
(19, 19, 8, 9, '2014-02-10 20:15:00', NULL, 1, 1, 1, 0, NULL, '', '', NULL),
(20, 20, 6, 7, '2014-02-10 20:15:00', NULL, 3, 0, 1, 0, NULL, '', '', NULL),
(21, 21, 7, 1, '2014-05-18 13:07:32', NULL, 1, 0, 1, 0, NULL, '', '', NULL),
(22, 22, 3, 6, '2014-02-13 16:00:00', NULL, 1, 2, 1, 0, NULL, '', '', NULL),
(23, 23, 1, 7, '2014-05-18 13:07:32', NULL, 3, 2, 1, 0, NULL, '', '', NULL),
(24, 24, 6, 3, '2014-02-16 16:00:00', NULL, 3, 1, 1, 0, NULL, '', '', NULL),
(25, 25, 1, 6, '2014-02-19 20:30:00', NULL, 1, 1, 1, 0, NULL, '', '', NULL),
(26, 26, 6, 1, '2014-02-23 17:00:00', NULL, 2, 2, 1, 0, NULL, '', '', NULL),
(27, 1, 17, 30, '2014-02-16 16:00:00', '16h', 0, 3, 1, 0, NULL, '', '', NULL),
(28, 2, 14, 29, '2014-02-26 16:00:00', '16:00', 3, 0, 1, 0, NULL, '', '', NULL),
(29, 3, 15, 26, '2014-02-26 18:00:00', NULL, 1, 0, 1, 0, NULL, '', '', NULL),
(30, 4, 14, 28, '2014-02-26 20:30:00', NULL, 3, 1, 1, 0, NULL, '', '', NULL),
(31, 5, 16, 27, '2014-02-27 20:30:00', NULL, 1, 1, 1, 0, NULL, '', '', NULL),
(32, 6, 30, 16, '2014-03-06 15:45:00', NULL, 1, 0, 1, 0, NULL, '', '', NULL),
(33, 7, 26, 14, '2014-03-06 20:30:00', NULL, 3, 0, 1, 0, NULL, '', '', NULL),
(34, 8, 28, 15, '2014-03-06 20:30:00', NULL, 2, 2, 1, 0, NULL, '', '', NULL),
(35, 9, 29, 17, '2014-03-06 20:30:00', NULL, 1, 0, 1, 0, NULL, '', '', NULL),
(36, 10, 27, 13, '2014-03-03 20:30:00', NULL, 0, 1, 1, 0, NULL, '', '', NULL),
(37, 11, 17, 27, '2014-03-09 16:00:00', NULL, 1, 0, 1, 0, NULL, '', '', NULL),
(38, 12, 14, 28, '2014-03-09 16:00:00', NULL, 3, 0, 1, 0, NULL, '', '', NULL),
(39, 13, 13, 30, '2014-03-09 17:00:00', NULL, 0, 1, 1, 0, NULL, '', '', NULL),
(40, 14, 26, 16, '2014-03-09 17:00:00', NULL, 1, 0, 1, 0, NULL, '', '', NULL),
(41, 15, 15, 28, '2014-03-09 19:00:00', NULL, 4, 1, 1, 0, NULL, '', '', NULL),
(42, 16, 14, 30, '2014-03-12 16:00:00', NULL, 0, 1, 1, 0, NULL, '', '', NULL),
(43, 17, 28, 16, '2014-03-12 20:30:00', NULL, 1, 3, 1, 0, NULL, '', '', NULL),
(44, 18, 13, 29, '2014-03-16 16:00:00', NULL, 1, 4, 1, 0, NULL, '', '', NULL),
(45, 19, 27, 15, '2014-03-16 17:00:00', NULL, 0, 0, 1, 0, NULL, '', '', NULL),
(46, 20, 26, 17, '2014-03-16 19:00:00', NULL, 2, 0, 1, 0, NULL, '', '', NULL),
(47, 21, 13, 26, '2014-03-23 16:00:00', NULL, 1, 0, 1, 0, NULL, '', '', NULL),
(48, 22, 17, 28, '2014-03-23 16:00:00', NULL, 3, 0, 1, 0, NULL, '', '', NULL),
(49, 23, 15, 30, '2014-03-23 16:00:00', NULL, 2, 0, 1, 0, NULL, '', '', NULL),
(50, 24, 14, 27, '2014-03-23 16:00:00', NULL, 4, 3, 1, 0, NULL, '', '', NULL),
(51, 25, 16, 29, '2014-03-23 16:00:00', NULL, 3, 0, 1, 0, NULL, '', '', NULL),
(52, 1, 32, 31, '2014-03-27 16:00:00', NULL, 1, 5, 1, 0, NULL, '', '', NULL),
(53, 2, 33, 34, '2014-03-27 20:15:00', NULL, 1, 4, 1, 0, NULL, '', '', NULL),
(54, 3, 31, 32, '2014-03-31 20:15:00', NULL, 1, 0, 1, 0, NULL, '', '', NULL),
(55, 4, 34, 33, '2014-03-30 17:00:00', NULL, 3, 3, 1, 0, NULL, '', '', NULL),
(56, 1, 35, 36, '2014-04-03 20:15:00', NULL, 2, 0, 1, 0, NULL, '', '', 3),
(57, 2, 36, 35, '2014-04-05 17:00:00', NULL, 1, 0, 1, 0, NULL, '', '', 3),
(68, 1, 39, 40, NULL, NULL, NULL, NULL, 1, 0, NULL, '', '', 3),
(69, 2, 40, 39, NULL, NULL, NULL, NULL, 1, 0, NULL, '', '', 3),
(75, 1, 39, 40, NULL, NULL, NULL, NULL, 1, 0, 2, '', '', 3),
(76, 3, 41, 42, '2014-08-13 00:00:00', '', NULL, NULL, 1, 0, 1, 'cap1-introd.pdf', 'cap2-proc.pdf', 1),
(77, 1, 43, 44, NULL, NULL, NULL, NULL, 1, 0, 3, '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE IF NOT EXISTS `local` (
  `idestadio` int(11) NOT NULL,
  `idjogo` int(11) NOT NULL,
  `observacoes` text,
  PRIMARY KEY (`idestadio`,`idjogo`),
  KEY `fk_estadio_has_jogo_jogo1` (`idjogo`),
  KEY `fk_estadio_has_jogo_estadio1` (`idestadio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `local`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `idmodulo` int(11) NOT NULL AUTO_INCREMENT,
  `idcompeticao` int(11) NOT NULL,
  `idturno` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `n_jogos` int(11) NOT NULL,
  `n_fases` int(11) NOT NULL,
  PRIMARY KEY (`idmodulo`,`idcompeticao`,`idturno`),
  KEY `fk_competicao_has_turno_turno1` (`idturno`),
  KEY `fk_competicao_has_turno_competicao` (`idcompeticao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Extraindo dados da tabela `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `idcompeticao`, `idturno`, `descricao`, `n_jogos`, `n_fases`) VALUES
(1, 1, 1, '1ª Turno do Campeonato Maranhense 2014', 26, 3),
(2, 1, 2, '2ª Turno do Campeonato Maranhense 2014', 31, 0),
(3, 1, 3, '3ª Turno do Campeonato Maranhense 2014', 2, 0),
(59, 9, 1, 'Teste 2', 0, 0),
(60, 8, 1, '', 0, 0),
(61, 2, 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `idnoticia` int(11) NOT NULL AUTO_INCREMENT,
  `idtipo_noticia` int(11) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `texto` text,
  `autor` varchar(45) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `fmf_acontece` tinyint(1) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `destaque` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idnoticia`),
  KEY `idtipo_noticia` (`idtipo_noticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`idnoticia`, `idtipo_noticia`, `titulo`, `descricao`, `url`, `texto`, `autor`, `data`, `fmf_acontece`, `imagem`, `destaque`) VALUES
(1, 4, 'Competições da FMF', 'Campeonatos Sub-19 e Sub-13 terão jogos no fim de semana', 'competicoes-sub19-sub13', '<p> <p>CAMPEONATO MARANHENSE DE FUTEBOL SUB-19</p><br />\r\n<p>JOGOS DO FINAL DE SEMANA</p><br />\r\n<p><strong>S&Aacute;BADO DIA 26 &ndash; MODULO I &ndash; PRIMEIRA FASE &ndash; 3&ordf; RODADA</strong></p><br />\r\n<p>08H00 &ndash; Campo Terra Livre &ndash; XV DE NOVEMBRO&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp; S&Atilde;O LUIS</p><br />\r\n<p>10H00 &ndash; Campo Terra Livre &ndash; GR&Ecirc;MIO MARANHENSE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; INDEPENDENTE</p><br />\r\n<p>08H00 &ndash; Campo George Willian &ndash; S&Atilde;O JOS&Eacute; DE RIBAMAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SANTA QUIT&Eacute;RIA</p><br />\r\n<p>10H00 &ndash; Campo George Willian &ndash; CRUZEIRO DO ANIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ASCREP DO LUMIAR</p><br />\r\n<p>&nbsp;</p><br />\r\n<p>S&Aacute;BADO DIA 26 &ndash; MODULO II &ndash; PRIMEIRA FASE &ndash; 3&ordf; RODADA</p><br />\r\n<p>08H00 &ndash; CT Pereira dos Santos &ndash; BABA&Ccedil;U/CEFAMA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; EXPRESSINHO</p><br />\r\n<p>10H00 &ndash; CT Pereira dos Santos &ndash; MOTO CLUBE DE S&Atilde;O LUIS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AMERICANO</p><br />\r\n<p>09H00 &ndash; Campo do Israel &ndash; PITANGUENSE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SPORTING BRAGA</p><br />\r\n<p>DOMINGO DIA 27</p><br />\r\n<p>09H00 &ndash; CT Jos&eacute; Carlos Macieira &ndash; SAMPAIO CORREA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MARANH&Atilde;O ATL&Eacute;TICO</p><br />\r\n<p>&nbsp;</p><br />\r\n<p>S&Aacute;BADO DIA 26 - MODULO III &ndash; REGI&Atilde;O SUL DO MARANH&Atilde;O &ndash; 1&ordf; FASE &ndash; 1&ordf; RODADA</p><br />\r\n<p>16H00 &ndash; Est&aacute;dio Frei Epif&acirc;nio D&rsquo;Abadia &ndash; IMPERATRIZ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CORDINO</p><br />\r\n<p>16H00 &ndash; Est&aacute;dio Cazuza Ribeiro &ndash; BALSAS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; JV LIDERAL</p><br />\r\n<p>&nbsp;</p><br />\r\n<p>S&Aacute;BADO DIA 26 - MODULO IV &ndash; REGI&Atilde;O DOS COCAIS &ndash; 1&ordf; FASE 1&ordf; RODADA</p><br />\r\n<p>16H00 &ndash; Est&aacute;dio Rodolf&atilde;o &ndash; ITAPECURUENSE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ARAIOSES</p><br />\r\n<p>&nbsp;</p><br />\r\n<p>CAMPEONATO MARANHENSE SUB-13 &ndash; SEMIFINAIS</p><br />\r\n<p>S&Aacute;BADO DIA 26</p><br />\r\n<p>08H30 &ndash; CT do Cefama &ndash; BOA VONTADE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; XV DE NOVEMBRO</p><br />\r\n<p>09H30 &ndash; CT do Cefama &ndash; BABA&Ccedil;U/CEFAMA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ASCREP DO LUMIAR</p></p> ', NULL, '2014-04-26 20:01:00', 1, 'maranhense-sub19-sub13-2014.jpg', 0),
(2, 2, 'Série B do Campeonato Brasileiro', 'Sampaio teve o melhor público da primeira rodada da competição', 'serie-b-sampaio-melhor-publico-2014', '<p> <p align="left">O Sampaio Corr&ecirc;a &eacute; destaque nacional. O time boliviano perdeu o jogo para o Paran&aacute; por 2 x 0, no Castel&atilde;o, mas apresentou o maior p&uacute;blico da primeira rodada da S&eacute;rie B do Campeonato Brasileiro. Apesar do feriad&atilde;o da Semana Santa, que esvaziou a cidade, a torcida marcou presen&ccedil;a presen&ccedil;a no est&aacute;dio. Entre pagantes e n&atilde;o-pagantes, o Sampaio levou ao Castel&atilde;o quase 20 mil pessoas.</p><br />\r\n<p align="left">O p&uacute;blico pagante, que &eacute; levado em conta na estat&iacute;stica da CBF, registrou 14.470 torcedores. O Sampaio teve um p&uacute;blico pagante maior do que Santa Cruz-PE e Cear&aacute;-CE, que tamb&eacute;m bancaram seus jogos e ficaram muito abaixo do total do Sampaio, o que demonstra a for&ccedil;a da torcida do representante maranhense.</p><br />\r\n<p align="left">No site oficial da CBF. a entidade ainda n&atilde;o teve condi&ccedil;&atilde;o de fazer uma atualiza&ccedil;&atilde;o completa, porque alguns clubes n&atilde;o mandaram ainda o boletim financeiro dos seus jogos.</p><br />\r\n<p align="left">&nbsp;</p><br />\r\n<p align="left">Os tr&ecirc;s melhores p&uacute;blicos da rodada inicial s&atilde;o estes:</p><br />\r\n<p align="left">Sampaio 0 x 2 Paran&aacute;</p><br />\r\n<p align="left">14.470 pagantes</p><br />\r\n<p align="left">Santa Cruz 1 x ABC</p><br />\r\n<p align="left">10.024 paganmtes</p><br />\r\n<p align="left">Cear&aacute; 1 x 0 Oeste</p><br />\r\n<p align="left">9.577 pagantes</p><br />\r\n<p align="left">&nbsp;</p><br />\r\n<p align="left">Entre os p&uacute;blicos divulgados, o menor deles foi no jogo Bragantino 2 x N&aacute;utico, com apenas 884 pagantes, no Est&aacute;dio do Bragantino.</p></p>', NULL, '2014-04-26 20:05:47', 0, 'serie-b-sampaio-melhor-publico-2014.jpg', 0),
(3, 4, 'Campeonato Maranhense Sub-19', 'Com jogos nos módulos da capital e interior, competição terá rodada completa no fim de semana', 'maranhense-sub-19-rodada-completa', '<div>Depois de uma paralisa&ccedil;&atilde;o de uma semana, devido ao feriado da Semana Santa, prossegue neste fim de semana o Campeonato Maranhense de Futebol Sub-19, promovido pela FMF na sua terceira rodada, com os seguintes jogos.</div><br />\r\n<div>&nbsp;</div><br />\r\n<div>S&Aacute;BADO DIA 26</div><br />\r\n<div>08h - Campo Terra Livre - Xv de Novembro &nbsp; &nbsp; &nbsp; &nbsp; x &nbsp; &nbsp;S&atilde;o Luis</div><br />\r\n<div>10h - Campo Terra Livre - Gr&ecirc;mio Maranhense &nbsp;x &nbsp; &nbsp; Independente</div><br />\r\n<div>08:h - Campo G. Willian &nbsp;- S&atilde;o Jos&eacute; Ribamar &nbsp; &nbsp; x &nbsp; &nbsp;Santa Quit&eacute;ria</div><br />\r\n<div>10h - Campo G. Willian &nbsp;- Cruzeiro do Anil &nbsp; &nbsp; &nbsp; &nbsp; x &nbsp; &nbsp;Ascrep Lumiar</div><br />\r\n<div>08h - CT Moto Paran&atilde; &nbsp; &nbsp;- Baba&ccedil;u/Cefama &nbsp; &nbsp; &nbsp; &nbsp; x &nbsp; &nbsp;Expressinho</div><br />\r\n<div>10h - CT Moto Paran&atilde; &nbsp; &nbsp;- Moto Clube &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;x &nbsp; &nbsp;Americano</div><br />\r\n<div>09h - Campo do Israel &nbsp; &nbsp;- Pitanguense &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;x &nbsp; &nbsp;Sporting Braga</div><br />\r\n<div>&nbsp;</div><br />\r\n<div>DOMINGO DIA 27</div><br />\r\n<div>09h - CT Jos&eacute; C/Macieira - Sampaio Correa &nbsp; &nbsp; &nbsp;x &nbsp; &nbsp;Maranh&atilde;o</div><br />\r\n<div>&nbsp;</div><br />\r\n<div>M&Oacute;DULO III - REGI&Atilde;O SUL DO MARANH&Atilde;O</div><br />\r\n<div>S&Aacute;BADO DIA 26</div><br />\r\n<div>16h - Frei Epif&acirc;nio &nbsp; &nbsp; - Imperatriz &nbsp; &nbsp; x &nbsp; &nbsp; Cordino</div><br />\r\n<div>16h - Cazuza Ribeiro - Balsas &nbsp; &nbsp; &nbsp; &nbsp; x &nbsp; &nbsp; JV Lideral</div><br />\r\n<div>&nbsp;</div><br />\r\n<div>M&Oacute;DULO IV - REGI&Atilde;O DOS COCAIS</div><br />\r\n<div>S&Aacute;BADO DIA 26</div><br />\r\n<div>16h - Rodolf&atilde;o &nbsp; &nbsp; - Itapecuruense &nbsp; &nbsp; x &nbsp; &nbsp;Araioses&nbsp;</div><br />\r\n<div>&nbsp;</div><br />\r\n<div>CAMPEONATO MARANHENSE SUB-13 - SEMIFINAIS</div><br />\r\n<div>S&Aacute;BADO DIA 26</div><br />\r\n<div>08h30 - Campo do Cefama - Boa Vontade &nbsp; &nbsp;x &nbsp; &nbsp;XV de Novembro</div><br />\r\n<div>09h30 - Campo do Cefama - Baba&ccedil;u/Cefama &nbsp; x &nbsp; Ascrep Lumiar</div><br />\r\n<div>&nbsp;&nbsp;</div><br />\r\n', NULL, '2014-04-26 20:23:13', 1, 'maranhense-sub-19-rodada-completa.jpg', 0),
(4, 4, 'Campanha', 'FMF apoia CBF nas ações contra o preconceito racial', 'campanha-cbf-acaoes-contra-preconceito', '<p> <p align="left">A FMF est&aacute; engajada na campanha que a CBF lan&ccedil;ou contra o racismo. A entidade maranhense apoiar&aacute; todas as a&ccedil;&otilde;es da CBF contra o preconceito racial.&nbsp;</p><br />\r\n<p align="left">Campanha&nbsp;</p><br />\r\n<p align="left">A Confedera&ccedil;&atilde;o Brasileira de Futebol decidiu entrar de vez em campo na luta contra qualquer tipo de preconceito e discrimina&ccedil;&atilde;o. No dia 16 de abril, quarta-feira, durante a Assembleia da CBF, a entidade deu in&iacute;cio &agrave; campanha &ldquo;Somos Iguais&rdquo;, idealizada ap&oacute;s os &uacute;ltimos acontecimentos de racismo no futebol brasileiro, como os casos envolvendo os jogadores Tinga, do Cruzeiro, e Arouca, do Santos, e o &aacute;rbitro da Federa&ccedil;&atilde;o Ga&uacute;cha de Futebol, M&aacute;rcio Chagas da Silva.</p><br />\r\n<p align="left">O objetivo da campanha &eacute; a conscientiza&ccedil;&atilde;o e o rep&uacute;dio sobre qualquer ato de preconceito, seja racial, econ&ocirc;mico, religioso, social, sexual, dentre outros. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><br />\r\n<p align="left">- A&ccedil;&otilde;es da campanha</p><br />\r\n<p align="left">Para alcan&ccedil;ar o objetivo da campanha e mover a sociedade contra o preconceito, a CBF far&aacute; a&ccedil;&otilde;es na primeira fase das S&eacute;ries A e B do Campeonato Brasileiro de 2014 e tamb&eacute;m nos dois amistosos que a Sele&ccedil;&atilde;o Brasileira far&aacute; antes do in&iacute;cio da disputa da Copa do Mundo FIFA 2014. Dentre elas, est&atilde;o:&nbsp;</p><br />\r\n<p align="left">Aplicativo de celular para den&uacute;ncia:</p><br />\r\n<p align="left">Foi criado um aplicativo para as pessoas que presenciem qualquer tipo de manifesta&ccedil;&atilde;o preconceituosa em eventos esportivos possam denunci&aacute;-la atrav&eacute;s deste. As den&uacute;ncias que chegarem ser&atilde;o encaminhadas para as autoridades competentes.&nbsp;</p><br />\r\n<p align="left">Patch - &Aacute;rbitros</p><br />\r\n<p align="left">Os &aacute;rbitros de todas as partidas das S&eacute;ries A e B do Campeonato Brasileiro de 2014 ter&atilde;o nos bolsos de seus uniformes o patch com o logo da campanha &ldquo;Somos Iguais&rdquo;.</p><br />\r\n<p align="left">Faixas&nbsp;</p><br />\r\n<p align="left">Faixas com a mensagem da campanha ser&atilde;o levadas a campo antes do in&iacute;cio de cada partida, quando transmitidas por TV Aberta, podendo assim serem vistas pelos torcedores presentes nos est&aacute;dios e pelos que assistirem pela televis&atilde;o.</p><br />\r\n<p align="left">Placas de publicidade</p><br />\r\n<p align="left">Placas publicit&aacute;rias, localizadas em volta dos campos, aparecer&atilde;o com o logo da campanha &ldquo;Somos Iguais&rdquo;.</p><br />\r\n<p align="left">Bolas personalizadas</p><br />\r\n<p align="left">Nos jogos da primeira fase do Campeonato Brasileiro de 2014, das S&eacute;ries A e B, quando forem transmitidas por TV aberta, ser&atilde;o distribu&iacute;das 10 bolas personalizadas com o logo da campanha e o texto &ldquo;fa&ccedil;a um selfie com a bola usando #somosiguais e sua foto poder&aacute; aparecer nas redes sociais da CBF&rdquo; tendo como objetivo fazer o torcedor participar ativamente da campanha.</p><br />\r\n<p align="left">Locu&ccedil;&atilde;o</p><br />\r\n<p align="left">Antes do in&iacute;cio das partidas do Campeonato Brasileiro, S&eacute;ries A e B, ser&aacute; feita locu&ccedil;&atilde;o resumida da campanha &ldquo;Somos Iguais&rdquo;.</p><br />\r\n<p align="left">V&iacute;deo</p><br />\r\n<p align="left">A CBF TV produzir&aacute; um v&iacute;deo de divulga&ccedil;&atilde;o da campanha, transmitindo a mensagem de rep&uacute;dio a qualquer tipo de preconceito. Um dos elementos do v&iacute;deo &eacute; o texto produzido pelo jornalista Mauro Betting, interpretado por atletas e personalidades. Este v&iacute;deo ser&aacute; exibido nos tel&otilde;es de est&aacute;dios do Brasil, al&eacute;m de ficar dispon&iacute;vel no site da entidade e em suas respectivas redes sociais.</p><br />\r\n<p align="left">Sele&ccedil;&atilde;o Brasileira</p><br />\r\n<p align="left">As a&ccedil;&otilde;es propostas na campanha &ldquo;Somos Iguais&rdquo; tamb&eacute;m ser&atilde;o realizadas nos dois amistosos que a Sele&ccedil;&atilde;o Brasileira far&aacute; antes da Copa do Mundo 2014. Os jogadores do Brasil entrar&atilde;o com a faixa contendo a mensagem da campanha. O v&iacute;deo produzido pela CBF TV tamb&eacute;m ser&aacute; transmitido nas partidas. A primeira ser&aacute; realizada no dia 3 de junho, no Est&aacute;dio Serra Dourada, em Goi&acirc;nia, contra o Panam&aacute;. Depois, no dia 6, no Morumbi, em S&atilde;o Paulo, o amistoso ser&aacute; contra a S&eacute;rvia.</p></p>\r\n', NULL, '2014-04-26 20:23:13', 1, 'campanha-cbf-acaoes-contra-preconceito.jpg', 0),
(5, 4, 'Boas notícias', 'CBF montará em São Luís um Centro de Treinamento e ajudará na criação da Escola de Árbitros', 'boas-noticias-cbf-ajudara-criacao-escola-arbitro', '<p> <p>N&atilde;o poderia ter sido mais proveitosa a estada, no Rio de Janeiro, do presidente da Federa&ccedil;&atilde;o Maranhense de Futebol (FMF), Ant&ocirc;nio Am&eacute;rico Lobato Gon&ccedil;alves. Nos quatro dias que passou na cidade maravilhosa, ele recebeu boas not&iacute;cias. A primeira delas foi a informa&ccedil;&atilde;o de que a Confedera&ccedil;&atilde;o Brasileira de Futebol (CBF) construir&aacute; um Centro de Treinamento, para as divis&otilde;es de base (sub-13, Sub-15. Sub-17 e Sub-19) em S&atilde;o Lu&iacute;s.</p><br />\r\n<p>Segundo Am&eacute;rico, a capital maranhense foi escolhida para ganhar o Centro de Treinamento pelo presidente eleito da CBF, Marco Polo Del Nero. &ldquo;Esse &eacute; o resultado de reivindica&ccedil;&atilde;o que v&iacute;nhamos fazendo h&aacute; algum tempo. O presidente Del Nero, na quarta-feira, logo depois de ter sido eleito para comandar a CBF a partir de 2015, me deu a boa nova. O bom &eacute; que o Centro de Treinamento ser&aacute; constru&iacute;do ainda em 2014. Pretendemos inaugur&aacute;-lo entre outrubro e novembro&rdquo;, adiantou o dirigente.&nbsp;</p><br />\r\n<p align="left">O Centro de Treinamento ser&aacute; constru&iacute;do e ser&aacute; de propriedade da CBF, mas que ser&aacute; administrado pela FMF. "O presidente Del Nero j&aacute; havia prometido que o nosso estado ganharia uma obra desse porte para que os jovens atletas sejam lapidados para nossas equipes profissionais e de todo o Brasil&rdquo;, pontuou o presidente da FMF.</p><br />\r\n<p align="left">No projeto, o Centro de Treinamento ter&aacute; dois campos, com medidas oficiais, uma quadra polivalente e ser&aacute; equipado com modernos aparelhos para a pr&aacute;tica de exerc&iacute;cios f&iacute;sicos.</p><br />\r\n<p align="left">&nbsp;</p><br />\r\n<p align="left"><strong>Escola de &aacute;rbitros</strong> &ndash; Outra boa not&iacute;cia trazida pelo presidente da FMF &eacute; de que o Maranh&atilde;o tamb&eacute;m ganhar&aacute; uma Escola de Forma&ccedil;&atilde;o de &Aacute;rbitros de Futebol, nos moldes da que foi montada recentemente em Recife. &ldquo;O presidente Del Nero nos prometeu ajudar na cria&ccedil;&atilde;o da Escola de Forma&ccedil;&atilde;o de &Aacute;rbitros. Queremos implant&aacute;-la ainda este ano&rdquo;, disse Am&eacute;rico.</p><br />\r\n<p>Caber&aacute; &agrave; Escola de Forma&ccedil;&atilde;o propiciar meios de forma&ccedil;&atilde;o inicial e continuada, a especializa&ccedil;&atilde;o e o aprimoramento dos &aacute;rbitros, assistentes e assessores. A FMF, para montar a escola dever&aacute; firmar conv&ecirc;nio com uma unidade de ensino da capital maranhense para paerticipar do projeto, que &eacute; um velho sonho dos respons&aacute;veis pela arbitragem local. "A cria&ccedil;&atilde;o da Escola de Forma&ccedil;&atilde;o ser&aacute; importante. Temos muitos jovens interessados em seguir a profiss&atilde;o. Queremos, com ajuda da CBF, oferecer uma forma&ccedil;&atilde;o qualificada e uniforme, com professores especializados. Vamos tirar isso do papel para tornar realidade&rdquo;, disse o presidente da FMF, que est&aacute; muito interessado em renovar a arbitragem maranhense e preparar &aacute;rbitros de qualidade para o futebol brasileiro.</p></p>', NULL, '2014-04-26 20:23:13', 1, 'boas-noticias-cbf-ajudara-criacao-escola-arbitro.jpg', 0),
(6, 4, 'Copa do Nordeste 2015', 'CBF confirma para a FMF a entrada de dois times do Maranhão e do Piauí', 'copa-nordeste-cbf-confirma-times-maranhao-piaui', '<p> <p>Confirmado: Maranh&atilde;o e Piau&iacute; ter&atilde;o mesmo dois representantes (cada) na Copa do Nordeste de 2015. O presidente da FMF, Ant&ocirc;nio Am&eacute;rico Lobato Gon&ccedil;alves, voltou do Rio de Janeiro, onde participou da elei&ccedil;&atilde;o da CBF, trazendo a confirma&ccedil;&atilde;o sobre a participa&ccedil;&atilde;o dos times maranhenses e piauiense na competi&ccedil;&atilde;o. &ldquo;O novo presidente da CBF, Marco Polo Del Nero, que tinha pedido que ficasse tranquilo, quando foi especulado de que apenas uma equipe de cada estado participaria do torneio, garantiu as duas vagas j&aacute; para a Copa do Nordeste de 2015&rdquo;, informou o dirigente da Federa&ccedil;&atilde;o.</p><br />\r\n<p align="left">Del Nero at&eacute; concedeu entrevista &agrave; imprensa nacional falando sobre o assunto. &ldquo;O presidente da CBF colocou um ponto final nos coment&aacute;rios que alguns dirigentes de Federa&ccedil;&otilde;es do Nordeste vinham fazendo, especulando de que s&oacute; um time de cada estado entraria no Nordest&atilde;o de 2015. Ele bateu o martelo e n&atilde;o h&aacute; mais como mudar&rdquo;, ressaltou o presidente da FMF.</p><br />\r\n<p align="left">Em 2015, a f&oacute;rmula de disputa do torneio, que passar&aacute; das 16 equipes atuais para 20, com a entrada dos representantes de Maranh&atilde;o e Piau&iacute;. &ldquo;Com 20 clubes, a Copa do Nordeste ter&aacute; cinco chaves de quatro&rdquo;, antecipou Ant&ocirc;nio Am&eacute;rico.</p><br />\r\n<p align="left">A nova chave ser&aacute; formada por Sampaio e Moto, representantes do Maranh&atilde;o, e mais Piau&iacute; Esporte Clube e um segundo time ainda a ser classificado no Campeonato Piauiense, que ainda est&aacute; em andamento. Na primeira fase, as equipes maranhenses e piauienses jogar&atilde;o entre si, se classificando quem tiver melhor aproveitamento t&eacute;cnico para as quartas de final, juntamente com os melhores de cada uma das outras chaves e mais tr&ecirc;s times de melhor &iacute;ndice t&eacute;cnico, independentemente de grupo. As quartas de final ter&atilde;o oito equipes, que jogar&atilde;o entre si para que sejam apontados quatro times para a fase semifinal. &ldquo;Com essa f&oacute;rmula, as chances dos times maranhenses de classifica&ccedil;&atilde;o ser&atilde;o boas. Com todo o respeito que as equipes do Piau&iacute; merecem, Sampaio e Moto t&ecirc;m amplas condi&ccedil;&otilde;es de avan&ccedil;ar na disputa&rdquo;, analisou Ant&ocirc;nio Am&eacute;rico.</p><br />\r\n<p align="left">A Copa do Nordeste &eacute; uma competi&ccedil;&atilde;o oficial da CBF, que reserva uma vaga na Copa Sul-Americana para quem for campe&atilde;o do torneio. O patroc&iacute;nio &eacute; do Esporte Interativo.</p><br />\r\n<p align="left">&nbsp;</p></p>', NULL, '2014-04-26 20:23:13', 1, 'copa-nordeste-cbf-confirma-times-maranhao-piaui.jpg', 1),
(7, 2, 'Série B', 'Sampaio sente peso da estreia e perde para o Paraná no Castelão', 'serie-b-sampaio-perde-parana-castelao', '<p> <p>O Sampaio Corr&ecirc;a sentiu o peso da estreia e n&atilde;o resistiu &agrave; maior experi&ecirc;ncia do advers&aacute;rio e perdeu por 2 x 0, nesta sexta-feira &agrave; noite, no Est&aacute;dio Castel&atilde;o, na primeira rodada da S&eacute;rie B do Campeonato Brasileiro de 2014. Ainda se ressentindo de refor&ccedil;os em determinadas posi&ccedil;&otilde;es, o Tricolor maranhense n&atilde;o teve como evitar a derrota.</p><br />\r\n<p>O Paran&aacute; marcou 1 x 0 aos oito minutos, do segundo tempo, com Edson Sitta. Depois, aos 34 minutos, Carlinhos marcou 2 x 0.</p><br />\r\n<p>O Sampaio voltar&aacute; a jogar sexta-feira pr&oacute;xima. Desta feita, enfrentar&aacute; o Icasa, no interior do Cear&aacute;. O Paran&aacute; Clube far&aacute; sua primeira partida em casa na S&eacute;rie B na pr&oacute;xima sexta-feira contra o Joinville.</p><br />\r\n<p>&nbsp;</p><br />\r\n<p>&nbsp;</p></p>', NULL, '2014-04-26 20:23:13', 0, 'serie-b-sampaio-perde-parana-castelao.jpg', 1),
(8, 2, 'Copa do Brasil 2014', 'MAC perde em Belém e está eliminado da competição', 'copa-do-brasil-2014-mac-perde-belem', '<p> <p>O Maranh&atilde;o Atl&eacute;tico Clube (MAC) foi eliminado da Copa do Brasil ao perder por 2 x 1 para o Paysandu-PA, na noite desta quarta-feira, no Est&aacute;dio Ol&iacute;mpico do Par&aacute;, em Bel&eacute;m. O MAC saiu na frente do placar, dando um susto no Paysandu. Elton marcou 1 x 0, mas ainda no primeiro tempo, o time paraense empatou. Na fase final, virou parta 2 x 1.&nbsp;</p><br />\r\n<p>O MAC jogou jogou uma bola na trave, com Raimundinho, e perdeu v&aacute;rias oportunidades de gol. Na soma dos resultados, o Paysandu venceu por 4 x 3 e enfrentar&aacute; Brasiliense ou Sport, na segunda fase da competi&ccedil;&atilde;o. O MAC n&atilde;o tem mais jogos este ano, pois, at&eacute; para a Copa Cidade de S&atilde;o Lu&iacute;s, no segundo semestre, n&atilde;o conseguiu ficar entre os oito clubes que se classificaram para o torneio. Em 2015, o MAC disputar&aacute; a S&eacute;rie B do maranhense.</p></p>\r\n', NULL, '2014-04-26 20:23:13', 0, 'copa-do-brasil-2014-mac-perde-belem.jpg', 0),
(9, 4, 'Luta bem-sucedida', 'Américo considera uma vitória Maranhão e Piauí na Copa do Nordeste', 'americo-considera-uma-vitoria-maranhao-e-piaui-na-copa-do-nordeste', '<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Pela primeira vez na hist&oacute;ria, em 2015, dois times do Maranh&atilde;o e dois times do Piau&iacute; disputar&aacute; a Copa do Nordeste. A entrada de maranhenses e piauienses na competi&ccedil;&atilde;o tem muito a ver com o empenho do presidente da Federa&ccedil;&atilde;o Maranhense de Futebol (FMF), Ant&ocirc;nio Am&eacute;rico Lobato Gon&ccedil;alves. Desde que assumiu o comando da entidade, h&aacute; tr&ecirc;s anos, ele levantou a bandeira da corre&ccedil;&atilde;o do mapa do futebol brasileiro, que coloca&ccedil;&atilde;o Maranh&atilde;o e Piau&iacute; como integrantes da regi&atilde;o Norte.&nbsp; &ldquo;Lutamos muito na Confedera&ccedil;&atilde;o Brasileira de Futebol para que o mapa fosse reformulado, porque n&atilde;o nos interessava continuar na regi&atilde;o Norte, que nada tem a ver conosco. Ainda n&atilde;o foi feita a oficializa&ccedil;&atilde;o, pois a CBF somente no come&ccedil;o de 2015 reunir&aacute; sua assembleia geral para definir o assunto. Por&eacute;m, temos a certeza do presidente Marco Polo Del Nero, que isso ser&aacute; feito&rdquo;, disse Ant&ocirc;nio Am&eacute;rico.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">O mandat&aacute;rio da FMF ressaltou tamb&eacute;m o empenho do presidente da Federa&ccedil;&atilde;o Piauiense de Futebol, Cesarino&nbsp; Oliveira, que ajudou muito nessa luta. &ldquo;Fizemos uma parceria forte e pressionamos a CBF e as outras Federa&ccedil;&otilde;es do Nordeste, que vinham resistindo, mas acabaram cedendo&nbsp; e logramos &ecirc;xito em nosso pleito&rdquo;, lembrou Am&eacute;rico.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">O dirigente lembrou ainda que as Federa&ccedil;&otilde;es do Maranh&atilde;o e do Piau&iacute; tiveram de se responsabilizar pela garantia do pagamento das despesas de Moto Clube e Piau&iacute;, vice-campe&otilde;es, que n&atilde;o ser&atilde;o custeadas pela Liga do Nordeste, cujo or&ccedil;amento n&atilde;o cobrir&aacute; as participa&ccedil;&otilde;es de Sampaio e River, os campe&otilde;es dos dois estados, na primeira fase do torneio. &ldquo;Se n&atilde;o fiz&eacute;ssemos isso, Moto e Piau&iacute; n&atilde;o jogariam o campeonato&rdquo;, frisou.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Para Ant&ocirc;nio Am&eacute;rico, os torcedores dos dois estados ter&atilde;o um torneio dos mais interessantes para iniciar a temporada.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">&nbsp;</span></p>', '', '2014-10-20 18:57:10', 1, 'antonio_americo.jpg', NULL),
(11, 2, 'Copa do Nordeste 2015', 'Sampaio estreará contra o Sport, em São Luís, e Moto enfrentará o Piauí, em Teresina', 'sampaio-estreara-contra-o-sport--em-sao-luis--e-moto-enfrentara-o-piaui--em-teresina', '<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">A CBF divulgou a tabela da Copa do Nordeste de 2015 na &uacute;ltima semana. O Sampaio, que est&aacute; no grupo B, ao lado Sport-PE, Socorrense-SE e Coruripe-AL, enquanto que o Moto ter&aacute; como advers&aacute;rios N&aacute;utico-PE, Piau&iacute;-PE e Salgueiro-PE.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">O Sampaio estrear&aacute; dia 4 de fevereiro diante do Sport-PE, em S&atilde;o Lu&iacute;s, e o Moto, no mesmo dia jogar&aacute; diante do Piau&iacute;-PI, em Teresina.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Primeira rodada</span></p>\n<p style="font-family: verdana, Helvetica, sans-serif; font-size: 13px; margin: 0cm 0cm 7.5pt; text-align: justify; line-height: 15.6pt;"><strong>Veja os jogos da primeira rodada:</strong></p>\n<p style="font-family: verdana, Helvetica, sans-serif; font-size: 13px; margin: 0cm 0cm 7.5pt; text-align: justify; line-height: 15.6pt;">Confian&ccedil;a/SE x Vit&oacute;ria/BA</p>\n<p style="font-family: verdana, Helvetica, sans-serif; font-size: 13px; margin: 0cm 0cm 7.5pt; text-align: justify; line-height: 15.6pt;">Serrano/BA x Am&eacute;rica/RN</p>\n<p style="font-family: verdana, Helvetica, sans-serif; font-size: 13px; margin: 0cm 0cm 7.5pt; text-align: justify; line-height: 15.6pt;">Sampaio Corr&ecirc;a/MA x Sport/PE</p>\n<p style="font-family: verdana, Helvetica, sans-serif; font-size: 13px; margin: 0cm 0cm 7.5pt; text-align: justify; line-height: 15.6pt;">Coruripe/AL x Socorrense/SE</p>\n<p style="font-family: verdana, Helvetica, sans-serif; font-size: 13px; margin: 0cm 0cm 7.5pt; text-align: justify; line-height: 15.6pt;">Piau&iacute;/PI x Moto Club/MA</p>\n<p style="font-family: verdana, Helvetica, sans-serif; font-size: 13px; margin: 0cm 0cm 7.5pt; text-align: justify; line-height: 15.6pt;">N&aacute;utico/PE x Salgueiro/PE</p>\n<p style="font-family: verdana, Helvetica, sans-serif; font-size: 13px; margin: 0cm 0cm 7.5pt; text-align: justify; line-height: 15.6pt;">Botafogo/PB x River/PI</p>\n<p style="font-family: verdana, Helvetica, sans-serif; font-size: 13px; margin: 0cm 0cm 7.5pt; text-align: justify; line-height: 15.6pt;">Cear&aacute;/CE x Fortaleza/CE</p>\n<p style="font-family: verdana, Helvetica, sans-serif; font-size: 13px; margin: 0cm 0cm 7.5pt; text-align: justify; line-height: 15.6pt;">Bahia/BA x Campinense/PB</p>\n<p style="font-family: verdana, Helvetica, sans-serif; font-size: 13px; margin: 0cm 0cm 7.5pt; text-align: justify; line-height: 15.6pt;">Globo/RN x CRB/AL</p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><strong><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Jogos do Sampaio na Copa do Nordeste</span></strong></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Sampaio x Sport-PE &ndash; 04/02</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Socorrense - SE x Sampaio &ndash; 11/02</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Sampaio x Coruripe-AL &ndash; 18/02</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><strong><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Volta</span></strong></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Coruripe-AL x Sampaio &ndash; 04/03</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Sampaio x Socorrense-SE &ndash; 11/03</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Sport-PE x Sampaio &ndash; 18/03</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><strong><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Jogos do Moto Clube na Copa do Nordeste</span></strong></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Piau&iacute;-PI x Moto &ndash; 04/02</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Moto x N&aacute;utico-PE &ndash; 11/02</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Salgueiro-PE x Moto &ndash; 18/02</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><strong><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Volta</span></strong></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Moto x Salgueiro-PE &ndash; 04/03</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">N&aacute;utico-PE x Moto &ndash; 11/03</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Moto x Piau&iacute;-PI &ndash; 18/03</span></p>', '', '2014-10-20 19:03:28', 0, 'copa_do_nordeste.jpg', 1),
(12, 2, 'Série B do Brasileiro', 'Sampaio empata pela 14ª, sendo nove vezes só no Estádio Castelão', 'sampaio-empata-pela-14---sendo-nove-vezes-so-no-estadio-castelao', '<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">O Sampaio Corr&ecirc;a saiu na frente, neste s&aacute;bado, mas cedeu o empate por 1 x 1 ao N&aacute;utico-PE, pela 30&ordf; rodada da S&eacute;rie B do Campeonato Brasileiro. Foi o 14&ordm; empate do time maranhense na competi&ccedil;&atilde;o, sendo nove deles em casa em 15 jogos realizados. Com isso, o Tricolor caiu para a nona coloca&ccedil;&atilde;o na classifica&ccedil;&atilde;o, com 44 pontos, ficando mais distante do G4 (grupo dos classificados).</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">O novo empate reduziu bastante as chances de o Sampaio brigar pelo acesso. Como consolo, fica a certeza de que o campe&atilde;o maranhense n&atilde;o corre mais risco de ser rebaixado para a S&eacute;rie C. O Sampaio disputar&aacute; novamente a S&eacute;rie B em 2015.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">No jogo de s&aacute;bado, o Sampaio marcou 1 x 0, com Mimica, de cabe&ccedil;a, aos 12 minutos do primeiro tempo, mas levou o empate aos 23 minutos do segundo tempo, com Paulinho assinalando para o N&aacute;utico. A renda do jogo foi de R$ 209.049,00, com 17.5515 pessoas no est&aacute;dio. O p&uacute;blico pagante foi de 14.394 torcedores.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">O pr&oacute;ximo jogo do Sampaio ser&aacute; contra o Bragantino-SP, ter&ccedil;a-feira, &agrave;s 19h30, no Est&aacute;dio Castel&atilde;o.</span></p>', '', '2014-10-20 19:06:49', 0, 'sampaio_x_nautico.jpg', 1),
(13, 4, 'Super Copa Maranhão', 'Torneio interestadual abrirá a temporada de 2015 no Castelão', 'torneio-interestadual-abrira-a-temporada-de-2015-no-castelao', '<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">A temporada de 2015 no futebol do Maranh&atilde;o come&ccedil;ar&aacute; antes da largada da Copa do Nordeste, dia 4 de fevereiro, com as participa&ccedil;&otilde;es de Sampaio Corr&ecirc;a e Moto Clube pela primeira vez na hist&oacute;ria jogando o torneio, que &eacute; uma competi&ccedil;&atilde;o oficial dirigida pela Liga do Nordeste e oficializada pela Confedera&ccedil;&atilde;o Brasileira de Futebol (CBF). Nos dis 22 e 25 de janeiro, a bola rolar&aacute; no Est&aacute;dio Castel&atilde;o. &Eacute; que a Federa&ccedil;&atilde;o Maranhense de Futebol (FMF) confirmou para esses dois dias a efetiva&ccedil;&atilde;o da Super Copa Maranh&atilde;o.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">O presidente Ant&ocirc;nio Am&eacute;rico Lobato Gon&ccedil;alves informou que o torneio ter&aacute; as participa&ccedil;&otilde;es de Sampaio Corr&ecirc;a e Moto Clube, como representantes do Maranh&atilde;o, e de Cear&aacute; Sporting e Fortaleza, pelo Cear&aacute;.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">O torneio interestadual ter&aacute; duas rodadas duplas. No dia 22 de janeiro, o primeiro jogo ser&aacute; o cl&aacute;ssico Cear&aacute; x Fortaleza, ficando para a principal o supercl&aacute;ssico Sampaio x Moto. No dia 25, os vencedores da rodada inicial decidir&atilde;o o t&iacute;tulo, jogando na principal, enquanto que na preliminar os perdedores decidir&atilde;o terceiro e quarto lugares.</span></p>', '', '2014-10-20 19:13:41', 1, 'escudo_fmf.jpg', 1),
(14, 2, 'Série D', 'Moto perde e é eliminado do Brasileiro ', 'moto-perde-e-e-eliminado-do-brasileiro', '<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">O Moto Clube precisava vencer, mas acabou perdendo por 2 x 0 para o Tombense-MG, no Est&aacute;dio Almeid&atilde;o, na cidade de Tombos, interior de Minas Gerais, e acabou eliminado da S&eacute;rie D do Campeonato Brasileiro. No jogo realizado neste domingo, o Moto teve de se render ao melhor futebol da equipe advers&aacute;ria, que j&aacute; havia empatado o jogo de ida por 2 x 2 em S&atilde;o Lu&iacute;s. Apesar da elimina&ccedil;&atilde;o e de ter acabado o sonho do acesso para a S&eacute;rie C, a campanha do Moto no campeonato foi considerada boa. O time, montado de &uacute;ltima hora, chegou &agrave;s quartas-de-final do Brasileiro perdendo apenas dois jogos - para o Ituano por 1 x 0 e para o Tombense por 2 x 0.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">Fora do Brasileiro, o Moto voltar&aacute; a jogar somente em 2015. Dia 22 de janeiro, o Moto enfrentar&aacute; o Sampaio pela Super Copa Maranh&atilde;o, a ser promovida pela FMF, com participa&ccedil;&otilde;es de Cear&aacute; e Fortaleza, al&eacute;m do Sampaio Corr&ecirc;a. No torneio, jogar&aacute; tamb&eacute;m dia 25. Se vencer o supercl&aacute;ssico decidir&aacute; o t&iacute;tulo contra o ganhador do cl&aacute;ssico cearense entre Cear&aacute; e Fortaleza, que ser&aacute; realizado na preliminar de Moto x Sampaio, dia 22, na abertura da competi&ccedil;&atilde;o.</span></p>\n<p class="MsoNormal" style="font-family: verdana, Helvetica, sans-serif; font-size: 13px;"><span style="font-size: 12pt; line-height: 18.3999996185303px; font-family: ''Times New Roman'', serif;">O Moto tamb&eacute;m tem estreia definida na Copa do Nordeste. Ser&aacute; dia 4 de fevereiro contra o Piau&iacute;, em Teresina. No Nordest&atilde;o, o Moto faz parte do grupo C ao lado de Piau&iacute;, Salgueiro-PE e N&aacute;utico-PE.&nbsp;</span></p>', '', '2014-10-20 19:15:46', 0, 'moto_x_tombense.jpg', 1),
(15, 4, 'Super Copa Maranhão', 'Competição será mesmo realizada dias 22 e 25 de janeiro de 2015', 'competicao-sera-mesmo-realizada-dias-22-e-25-de-janeiro-de-2015', '<p class="MsoNormal">O presidente da Federa&ccedil;&atilde;o Maranhense de Futebol (FMF), Ant&ocirc;nio Am&eacute;rico Lobato Gon&ccedil;alves, confirmou para os dias 22 e 25 de janeiro de 2015 os jogos da Super Copa Maranh&atilde;o, que ter&aacute; as participa&ccedil;&otilde;es de Sampaio Corr&ecirc;a e Moto Clube, Cear&aacute; Sporting e Fortaleza. Os times cearenses queriam antecipar as datas dos jogos, por&eacute;m, o dirigente da entidade maranhense, promotora do torneio, preferiu manter as datas anteriormente programadas, haja vista n&atilde;o ser permitido realizar jogos antes do dia 20 de janeiro, por causa das f&eacute;rias anuais dos jogadores do futebol. Al&eacute;m disso, como as equipes dever&atilde;o iniciar treinos depois do dia 1&ordm; de janeiro, os quatro times que jogar&atilde;o a Super Copa Maranh&atilde;o ter&atilde;o tempo suficiente para se preparar.</p>\n<p class="MsoNormal">O an&uacute;ncio da realiza&ccedil;&atilde;o do torneio foi bem recebido pela imprensa e pelos torcedores. &ldquo;Ser&aacute; um in&iacute;cio de temporada em alto estilo&rdquo;, ressaltou Ant&ocirc;nio Am&eacute;rico.</p>', '', '2014-11-02 19:29:13', 1, 'super_copa_maranhao_2015.jpg', NULL),
(16, 4, 'Premiação', 'Times da Super Copa Maranhão jogarão pela premiação por posição', 'times-da-super-copa-maranhao-jogarao-pela-premiacao-por-posicao', '<p class="MsoNormal">J&aacute; est&aacute; definida a premia&ccedil;&atilde;o para os clubes que dever&atilde;o participar da Super Copa Maranh&atilde;o. Nenhum deles ter&aacute; cota fixa. Os quatro times ter&atilde;o todas as despesas pagas pela FMF e pelos parceiros, que bancar&atilde;o o torneio.</p>\n<p class="MsoNormal">A compensa&ccedil;&atilde;o financeira de cada um deles ser&aacute; de acordo com a classifica&ccedil;&atilde;o que obtiverem no quadrangular, segundo informou o presidente da FMF, Ant&ocirc;nio Am&eacute;rico Gon&ccedil;alves.</p>\n<p class="MsoNormal">A premia&ccedil;&atilde;o &eacute; a seguinte:</p>\n<p class="MsoNormal">R$ 100 mil para o campe&atilde;o</p>\n<p class="MsoNormal">R$ 80 mil para o vice-campe&atilde;o</p>\n<p class="MsoNormal">R$ 60 mil para o 3&ordm; colocado</p>\n<p class="MsoNormal">R$ 60 mil para o 4&ordm; colocado</p>', '', '2014-11-02 19:30:53', 1, 'premiacao_copa_maranhao.jpg', 1),
(17, 4, 'FMF adia reunião', 'Campeonato Maranhense de 2015 será discutido no Conselho Arbitral dia 21', 'campeonato-maranhense-de-2015-sera-discutido-no-conselho-arbitral-dia-21', '<p class="MsoNormal">N&atilde;o ser&aacute; mais dia 14 e sim dia 21 a reuni&atilde;o do Conselho Arbitral, que dever&aacute; discutir na FMF sobre o Campeonato Maranhense de 2015. O adiamento da reuni&atilde;o deu-se para permitir a presen&ccedil;a de um diretor do Esporte Interativo, que tem interesse em transmitir,&nbsp; mais uma vez, os jogos do Estadual para todo o Brasil.</p>\n<p class="MsoNormal">O diretor de competi&ccedil;&otilde;es da FMF, Ant&ocirc;nio Henrique de Moraes Rego, tem tudo pronto para apresentar aos dirigentes dos clubes, que discutir&atilde;o, apresentar&atilde;o sugest&otilde;es e aprovar&atilde;o sobre a competi&ccedil;&atilde;o oficial do pr&oacute;ximo ano, que ser&aacute; realizada paralelamente &agrave; Copa do Nordeste, que ter&aacute; participa&ccedil;&otilde;es de Sampaio e Moto.</p>\n<p class="MsoNormal">Os times participantes ser&atilde;o:</p>\n<p class="MsoNormal">Sampaio Corr&ecirc;a</p>\n<p class="MsoNormal">Moto Clube</p>\n<p class="MsoNormal">Imperatriz</p>\n<p class="MsoNormal">Santa Quit&eacute;ria</p>\n<p class="MsoNormal">Arai&oacute;ses</p>\n<p class="MsoNormal">Cordino</p>\n<p class="MsoNormal">S&atilde;o Jos&eacute; de Ribamar</p>\n<p class="MsoNormal">Sabi&aacute; (suibiu)</p>\n<p class="MsoNormal">Expressinho (subiu)</p>', '', '2014-11-02 19:31:39', 1, 'campeonato_maranhense_de_2015_arte.jpg', 1),
(19, 4, 'CONVOCAÇÃO', 'Convocação 1ª reunião do Congresso Técnico FMF - 14 de Novembro de 2014', 'convocacao-1--reuniao-do-congresso-tecnico-fmf---14-de-novembro-de-2014', '<p class="MsoNormal" style="text-align: justify; text-indent: 35.4pt; line-height: 150%;"><span style="font-size: 14.0pt; line-height: 150%; font-family: ''Arial'',''sans-serif'';">O diretor de competi&ccedil;&otilde;es da Federa&ccedil;&atilde;o Maranhense de Futebol &ndash; FMF, <strong>CONVOCA</strong> todos os presidentes dos clubes que integram a 1&ordf; divis&atilde;o do Campeonato Maranhense de Futebol 2015, para que compare&ccedil;am &agrave; sede da Federa&ccedil;&atilde;o Maranhense de Futebol, no dia <strong>14 de Novembro de 2014, &agrave;s 15h00m</strong>, para a 1&ordf; Reuni&atilde;o do Congresso T&eacute;cnico da FMF, com a finalidade de discutir e deliberar acerca do Calend&aacute;rio de Competi&ccedil;&otilde;es e do Regulamento do Campeonato Maranhense de Futebol 2015.</span></p>', '', '2014-11-12 23:57:09', 1, 'convocacao.jpg', 1),
(20, 1, 'CONFIRMADO - Flamengo e Criciúma no Castelão.', 'Flamengo x Criciúma será no Castelão; ingressos serão vendidos na segunda-feira, 17/11.', 'flamengo-x-criciuma-sera-no-castelao--ingressos-serao-vendidos-na-segunda-feira--17-11-', '<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify; line-height: 150%; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size: 14.0pt; line-height: 150%;">S&eacute;rie A do Brasileiro 2014</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify; line-height: 150%; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size: 14.0pt; line-height: 150%;">&nbsp;</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify; line-height: 150%; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size: 14.0pt; line-height: 150%;">Flamengo x Crici&uacute;ma ser&aacute; no Castel&atilde;o; ingressos ser&atilde;o vendidos a partir de segunda-feira, dia 17 de Novembro.</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify; line-height: 150%; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size: 14.0pt; line-height: 150%;">&nbsp;</span>&nbsp;</p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify; line-height: 150%; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size: 14.0pt; line-height: 150%;">A CBF (Confedera&ccedil;&atilde;o Brasileira de Futebol) modificou o palco do duelo entre Flamengo e Crici&uacute;ma, v&aacute;lido pela 36&ordf; rodada do Campeonato Brasileiro. O compromisso, inicialmente agendado para o Maracan&atilde;, ocorrer&aacute; no Est&aacute;dio Castel&atilde;o, em S&atilde;o Lu&iacute;s. O confronto ser&aacute; realizado no dia 23 de novembro, domingo, &agrave;s 17 horas (de Bras&iacute;lia).</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify; line-height: 150%; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size: 14.0pt; line-height: 150%;">Em nota divulgada pela entidade, a altera&ccedil;&atilde;o &eacute; decorrente de um acordo comercial da Federa&ccedil;&atilde;o do Rio de Janeiro com o &oacute;rg&atilde;o respons&aacute;vel por reger o futebol no estado do Maranh&atilde;o. Por&eacute;m, antes de mandar a partida no Nordeste, o Rubro-Negro carioca ter&aacute; pela frente o Coritiba (16/11, no Maracan&atilde;) e o Atl&eacute;tico-MG (19/11, no Est&aacute;dio Independ&ecirc;ncia).</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify; line-height: 150%; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size: 14.0pt; line-height: 150%;">Por sua vez, o Tigre carvoeiro, amea&ccedil;ado pelo rebaixamento, antes de medir for&ccedil;as com a representa&ccedil;&atilde;o da G&aacute;vea, enfrenta o Gr&ecirc;mio (15/11, no Heriberto Hulse) e o Bahia (19/11, tamb&eacute;m em Santa Catarina).</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify; line-height: 150%; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size: 14.0pt; line-height: 150%;">A equipe dirigida por Vanderlei Luxemburgo figura na 11&ordf; posi&ccedil;&atilde;o da elite nacional, com 44 pontos, trilhando o retrospecto de 12 vit&oacute;rias, oito empates e 13 derrotas. J&aacute; os pressionados comandados de Toninho Cec&iacute;lio figuram na lanterna, somando apenas 30 unidades (com sete triunfos, nove igualdades e 17 insucessos).</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify; line-height: 150%; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><span style="font-size: 14.0pt; line-height: 150%;">Os ingressos para Flamengo x Crici&uacute;ma dever&atilde;o come&ccedil;ar a ser vendidos na pr&oacute;xima semana, possivelmente na segunda-feira, dia 17, nas bilheterias do Castel&atilde;o e do Nhozinho Santos.&nbsp;</span></p>\n<p>&nbsp;</p>\n<p class="MsoNormal" style="text-align: justify; line-height: 150%;"><span style="font-size: 14.0pt; line-height: 150%;">&nbsp;</span></p>', '', '2014-11-14 13:17:15', 0, 'Criciúma-x-Flamengo.jpg', 1);
INSERT INTO `noticia` (`idnoticia`, `idtipo_noticia`, `titulo`, `descricao`, `url`, `texto`, `autor`, `data`, `fmf_acontece`, `imagem`, `destaque`) VALUES
(21, 4, 'Copa São Paulo de Juniores', 'São Mateus/Babaçu e Sampaio já sabem contra quem vão jogar.', 'sao-mateus-babacu-e-sampaio-ja-sabem-contra-quem-vao-jogar-', '<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;text-align:\njustify;text-indent:70.9pt;line-height:150%"><span style="font-size:14.0pt;\nline-height:150%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;;\ncolor:#262626;mso-fareast-language:PT-BR">A Federa&ccedil;&atilde;o paulista de Futebol divulgou na tarde desta sexta-feira (14) os grupos da 46&ordf; edi&ccedil;&atilde;o da Copa S&atilde;o Paulo de Futebol J&uacute;nior. Ao todo ser&atilde;o 26 sedes, sendo 24 no interior e duas na capital, com a presen&ccedil;a de 104 equipes de todo o Brasil.</span></p>\n<p class="MsoNormal" style="margin: 0px; color: #222222; font-family: arial, sans-serif; font-size: 12.7272720336914px; text-align: justify;">&nbsp;</p>\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;text-align:\njustify;text-indent:70.9pt;line-height:150%"><span style="font-size:14.0pt;\nline-height:150%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:&quot;Times New Roman&quot;;\ncolor:#262626;mso-fareast-language:PT-BR">O S&atilde;o Mateus/Baba&ccedil;u caiu no grupo D, que ter&aacute; como sede a cidade de Lins. O S&atilde;o Mateus/Baba&ccedil;u jogar&aacute; contra Linense, Santos-SP e Penapolense-SP. J&aacute; o Sampaio Corr&ecirc;a, que ficou no grupo Q, ter&aacute; como concorrentes: Osasco-SP, Flamengo-RJ e Vilhena-RO. O grupo do Sampaio ser&aacute; na cidade de Osasco. &nbsp;</span></p>\n<p class="MsoNormal" style="margin: 0px; color: #222222; font-family: arial, sans-serif; font-size: 12.7272720336914px; text-align: justify;">&nbsp;</p>', '', '2014-11-15 12:15:55', 1, 'copa_sao_paulo_de_juniores_logo_marca.jpg', 1),
(22, 4, 'Campeonato Maranhense 2015', 'FMF antecipa o início e sorteio times para os dois grupos do Estadual.', 'fmf-antecipa-o-inicio-e-sorteio-times-para-os-dois-grupos-do-estadual-', '<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: justify; text-indent: 70.9pt; line-height: 150%;"><span style="font-size: 14.0pt; line-height: 150%; font-family: ''Arial'',''sans-serif''; mso-fareast-font-family: ''Times New Roman''; color: #262626; mso-fareast-language: PT-BR;">O in&iacute;cio do Campeonato Maranhense de 2015 foi mesmo antecipado para o dia 14 de janeiro. O t&eacute;rmino ficou mantido para o dia 3 de maio, conforme calend&aacute;rio nacional divulgado pela CBF. A decis&atilde;o de antecipar o come&ccedil;o da competi&ccedil;&atilde;o, que estava prevista para come&ccedil;ar no 4 de fevereiro, segundo o presidente da FMF, Ant&ocirc;nio Am&eacute;rico Lobato Gon&ccedil;alves, foi uma forma de aumentar o n&uacute;mero de datas para a competi&ccedil;&atilde;o. A CBF reserva apenas 12 datas para os Campeonatos Estaduais.</span></p>\n<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: justify; text-indent: 70.9pt; line-height: 150%;"><span style="font-size: 14.0pt; line-height: 150%; font-family: ''Arial'',''sans-serif''; mso-fareast-font-family: ''Times New Roman''; color: #262626; mso-fareast-language: PT-BR;">O Maranhense de 2015 ser&aacute; jogada em dois turnos, com os 10 clubes divididos em duas chaves de cinco.</span></p>\n<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: justify; text-indent: 70.9pt; line-height: 150%;"><span style="font-size: 14.0pt; line-height: 150%; font-family: ''Arial'',''sans-serif''; mso-fareast-font-family: ''Times New Roman''; color: #262626; mso-fareast-language: PT-BR;">Eis os grupos, que foram definidas por sorteio, realizado na sede da entidade, na reuni&atilde;o realizada na tarde desta sexta-feira:</span></p>\n<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: justify; text-indent: 70.9pt; line-height: 150%;"><span style="font-size: 14.0pt; line-height: 150%; font-family: ''Arial'',''sans-serif''; mso-fareast-font-family: ''Times New Roman''; color: #262626; mso-fareast-language: PT-BR;">Grupo A:</span></p>\n<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: justify; text-indent: 70.9pt; line-height: 150%;"><span style="font-size: 14.0pt; line-height: 150%; font-family: ''Arial'',''sans-serif''; mso-fareast-font-family: ''Times New Roman''; color: #262626; mso-fareast-language: PT-BR;">Sampaio Corr&ecirc;a, Araioses, S&atilde;o Jos&eacute; de Ribamar, Imperatriz e Cordino.</span></p>\n<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: justify; text-indent: 70.9pt; line-height: 150%;"><span style="font-size: 14.0pt; line-height: 150%; font-family: ''Arial'',''sans-serif''; mso-fareast-font-family: ''Times New Roman''; color: #262626; mso-fareast-language: PT-BR;">Grupo B:</span></p>\n<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: justify; text-indent: 70.9pt; line-height: 150%;"><span style="font-size: 14.0pt; line-height: 150%; font-family: ''Arial'',''sans-serif''; mso-fareast-font-family: ''Times New Roman''; color: #262626; mso-fareast-language: PT-BR;">Moto Clube, Santa Quit&eacute;ria, Expressinho, Sabi&aacute; e Balsas</span></p>\n<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: justify; text-indent: 70.9pt; line-height: 150%;"><span style="font-size: 14.0pt; line-height: 150%; font-family: ''Arial'',''sans-serif''; mso-fareast-font-family: ''Times New Roman''; color: #262626; mso-fareast-language: PT-BR;">No primeiro turno, na primeira fase, os jogos ser&atilde;o entre os integrantes do mesmo grupo. No segundo turno, os times do grupo A se defrontar&atilde;o contra as equipes do grupo B.</span></p>\n<p>&nbsp;</p>\n<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: justify; text-indent: 70.9pt; line-height: 150%;"><span style="font-size: 14.0pt; line-height: 150%; font-family: ''Arial'',''sans-serif''; mso-fareast-font-family: ''Times New Roman''; color: #262626; mso-fareast-language: PT-BR;">O S&atilde;o Mateus/Baba&ccedil;u caiu no grupo D, que ter&aacute; como sede a cidade de Lins. O S&atilde;o Mateus/Baba&ccedil;u jogar&aacute; contra Linense, Santos-SP e Penapolense-SP. J&aacute; o Sampaio Corr&ecirc;a, que ficou no grupo Q, ter&aacute; como concorrentes: Osasco-SP, Flamengo-RJ e Vilhena-RO. O grupo do Sampaio ser&aacute; na cidade de Osasco. &nbsp;</span></p>', '', '2014-11-15 12:23:55', 1, 'CAMPEONATO_MARANHENSE_DE_2015_ARTE.jpg', NULL),
(25, 4, 'CONVOCAÇÃO', 'Edital de Convocação para recadastramento dos Clubes', 'edital-de-convocacao-para-recadastramento-dos-clubes', '<p class="MsoNormal" style="margin-bottom: 0.0001pt;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">Edital de Convoca&ccedil;&atilde;o.</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">&nbsp;</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">Recadastramento de clubes.</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">&nbsp;</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">A CBF, atrav&eacute;s da sua Diretoria de Registros, estar&aacute; abrindo o recadastramento de clubes profissionais para o ano de 2015.</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">&nbsp;</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">O per&iacute;odo ser&aacute; de 25 de novembro a 30 de Dezembro de 2014.</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">Valores que ser&atilde;o cobrados:</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">&nbsp;</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">Clubes s&eacute;rie A, B e C &ndash; R$ 4.000,00 at&eacute; 30 de Dezembro de 2014;</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">A partir de 01 de Janeiro R$ 5.000,00</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">&nbsp;</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">Demais Clubes &ndash; R$ 2.000,00 at&eacute; 30 de Dezembro de 2014;</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">A partir de 01 de Janeiro R$ 2.500,00.</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">&nbsp;</span></p>\n<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span style="font-size: 14.0pt; font-family: ''Arial'',''sans-serif'';">Os Clubes que n&atilde;o se recadastrarem, n&atilde;o poder&atilde;o registrar contratos de jogadores.</span></p>\n<p class="MsoNormal"><span style="font-size: 14.0pt; line-height: 107%; font-family: ''Arial'',''sans-serif'';">&nbsp;</span></p>\n<p>&nbsp;</p>\n<p class="MsoNormal"><span style="font-size: 14.0pt; line-height: 107%; font-family: ''Arial'',''sans-serif'';">&nbsp;</span></p>', '', '2014-11-24 23:27:13', 1, 'IMAGEM_CONVOCAÇÃO3.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia_arbitro`
--

CREATE TABLE IF NOT EXISTS `noticia_arbitro` (
  `idnoticia` int(11) NOT NULL,
  `idarbitro` int(11) NOT NULL,
  KEY `idarbitro` (`idarbitro`),
  KEY `idnoticia` (`idnoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticia_arbitro`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia_clube`
--

CREATE TABLE IF NOT EXISTS `noticia_clube` (
  `idnoticia` int(11) NOT NULL,
  `clube_idclube` int(11) NOT NULL,
  PRIMARY KEY (`idnoticia`,`clube_idclube`),
  KEY `fk_noticia_clube_noticia1` (`idnoticia`),
  KEY `fk_noticia_clube_clube1` (`clube_idclube`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticia_clube`
--

INSERT INTO `noticia_clube` (`idnoticia`, `clube_idclube`) VALUES
(11, 1),
(12, 1),
(14, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia_competicao`
--

CREATE TABLE IF NOT EXISTS `noticia_competicao` (
  `idcompeticao` int(11) NOT NULL,
  `idnoticia` int(11) NOT NULL,
  PRIMARY KEY (`idcompeticao`,`idnoticia`),
  KEY `fk_noticia_competicao_competicao1` (`idcompeticao`),
  KEY `fk_noticia_competicao_noticia1` (`idnoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticia_competicao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `rodada`
--

CREATE TABLE IF NOT EXISTS `rodada` (
  `fase_idfase` int(11) NOT NULL,
  `jogo_idjogo` int(11) DEFAULT NULL,
  `apelido` varchar(45) DEFAULT NULL,
  `n_jogos` int(11) NOT NULL,
  KEY `fk_fase_has_jogo_jogo1` (`jogo_idjogo`),
  KEY `fk_fase_has_jogo_fase1` (`fase_idfase`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rodada`
--

INSERT INTO `rodada` (`fase_idfase`, `jogo_idjogo`, `apelido`, `n_jogos`) VALUES
(1, 1, '1ª Rodada', 4),
(1, 2, '1ª Rodada', 4),
(1, 3, '1ª Rodada', 4),
(1, 4, '1ª Rodada', 4),
(1, 5, '2ª Rodada', 4),
(1, 6, '2ª Rodada', 4),
(1, 7, '2ª Rodada', 4),
(1, 8, '2ª Rodada', 4),
(1, 9, '3ª Rodada', 4),
(1, 10, '3ª Rodada', 4),
(1, 11, '3ª Rodada', 4),
(1, 12, '3ª Rodada', 4),
(1, 13, '4ª Rodada', 4),
(1, 14, '4ª Rodada', 4),
(1, 15, '4ª Rodada', 4),
(1, 16, '4ª Rodada', 4),
(1, 17, '5ª Rodada', 4),
(1, 18, '5ª Rodada', 4),
(1, 19, '5ª Rodada', 4),
(1, 20, '5ª Rodada', 4),
(2, 21, '6ª Rodada - Semi Final', 2),
(2, 22, '6ª Rodada - Semi Final', 2),
(2, 23, '7ª Rodada - Semi Final', 2),
(2, 24, '7ª Rodada - Semi Final', 2),
(3, 25, '8ª Rodada - Final', 1),
(3, 26, '9ª Rodada - Final', 1),
(4, 27, '1ª Rodada', 5),
(4, 28, '1ª Rodada', 5),
(4, 29, '1ª Rodada', 5),
(4, 30, '1ª Rodada', 5),
(4, 31, '1ª Rodada', 5),
(4, 32, '2ª Rodada', 5),
(4, 33, '2ª Rodada', 5),
(4, 34, '2ª Rodada', 5),
(4, 35, '2ª Rodada', 5),
(4, 36, '2ª Rodada', 5),
(4, 37, '3ª Rodada', 5),
(4, 38, '3ª Rodada', 5),
(4, 39, '3ª Rodada', 5),
(4, 40, '3ª Rodada', 5),
(4, 41, '3ª Rodada', 5),
(4, 42, '4ª Rodada', 5),
(4, 43, '4ª Rodada', 5),
(4, 44, '4ª Rodada', 5),
(4, 45, '4ª Rodada', 5),
(4, 46, '4ª Rodada', 5),
(4, 47, '5ª Rodada', 5),
(4, 48, '5ª Rodada', 5),
(4, 49, '5ª Rodada', 5),
(4, 50, '5ª Rodada', 5),
(4, 51, '5ª Rodada', 5),
(5, 52, '6ª Rodada - Semi Final', 2),
(5, 53, '6ª Rodada - Semi Final', 2),
(5, 54, '7ª Rodada - Semi Final', 2),
(5, 55, '7ª Rodada - Semi Final', 2),
(6, 56, '8ª Rodada - FInal', 1),
(6, 57, '9ª Rodada - Final', 1),
(12, 68, 'Rodada Teste', 4),
(12, 69, 'Rodada Teste', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rodada_fix`
--

CREATE TABLE IF NOT EXISTS `rodada_fix` (
  `idrodada` int(11) NOT NULL AUTO_INCREMENT,
  `idfase` int(11) DEFAULT NULL,
  `apelido` varchar(200) NOT NULL,
  `n_jogos` int(11) NOT NULL,
  PRIMARY KEY (`idrodada`),
  KEY `idfase` (`idfase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `rodada_fix`
--

INSERT INTO `rodada_fix` (`idrodada`, `idfase`, `apelido`, `n_jogos`) VALUES
(1, 12, 'Roda Teste Fix', 5),
(2, 12, 'Rodada 2', 2),
(3, 15, '1ª Rodada', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
  `idsetor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`idsetor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`idsetor`, `nome`) VALUES
(1, 'Presidência'),
(2, 'CEAF'),
(3, 'Diretoria Administrativa'),
(4, 'Registro'),
(5, 'Financeiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_fase`
--

CREATE TABLE IF NOT EXISTS `tipo_fase` (
  `idtipo_fase` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtipo_fase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tipo_fase`
--

INSERT INTO `tipo_fase` (`idtipo_fase`, `nome`) VALUES
(1, '1ª Fase'),
(2, '2ª Fase'),
(3, '3ª Fase'),
(4, '4ª Fase'),
(5, '5ª Fase'),
(6, '6ª Fase'),
(7, '7ª Fase'),
(8, 'Fase Única');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_grupo`
--

CREATE TABLE IF NOT EXISTS `tipo_grupo` (
  `idtipo_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipo_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tipo_grupo`
--

INSERT INTO `tipo_grupo` (`idtipo_grupo`, `nome`) VALUES
(1, 'Grupo A'),
(2, 'Grupo B'),
(3, 'Sem Grupo'),
(4, 'Grupo C'),
(5, 'Grupo D'),
(6, 'Grupo E'),
(7, 'Grupo F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_noticia`
--

CREATE TABLE IF NOT EXISTS `tipo_noticia` (
  `idtipo_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  PRIMARY KEY (`idtipo_noticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tipo_noticia`
--

INSERT INTO `tipo_noticia` (`idtipo_noticia`, `nome`) VALUES
(1, 'Ultimas'),
(2, 'Clubes'),
(3, 'Arbitragem'),
(4, 'FMF_Acontece');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
  `idturno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`idturno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `turno`
--

INSERT INTO `turno` (`idturno`, `nome`) VALUES
(1, '1º Turno'),
(2, '2º Turno'),
(3, '3º Turno'),
(4, 'Turno Único');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `user` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `pass` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `user`, `pass`, `url`, `admin`) VALUES
(1, 'Administrador', 'joasramos@uol.com.br', 'admin', 'root123', 'administrador', 1),
(2, 'Ericeira', NULL, 'ericeira', 'fmf2014', NULL, 3),
(3, 'Edvan', NULL, 'edvan', 'edvan2014', NULL, 4);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `arbitragem`
--
ALTER TABLE `arbitragem`
  ADD CONSTRAINT `arbitragem_ibfk_1` FOREIGN KEY (`idarbitro`) REFERENCES `arbitro` (`idarbitro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_arbitragem_jogo1` FOREIGN KEY (`idjogo`) REFERENCES `jogo` (`idjogo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `arquivo_competicao`
--
ALTER TABLE `arquivo_competicao`
  ADD CONSTRAINT `fk_arquivo_competicao_competicao1` FOREIGN KEY (`idcompeticao`) REFERENCES `competicao` (`idcompeticao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_arquivo_competicao_documento1` FOREIGN KEY (`iddocumento`) REFERENCES `documento` (`iddocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `arquivo_jogo`
--
ALTER TABLE `arquivo_jogo`
  ADD CONSTRAINT `fk_arquivo_jogo_documento1` FOREIGN KEY (`iddocumento`) REFERENCES `documento` (`iddocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_arquivo_jogo_jogo1` FOREIGN KEY (`idjogo`) REFERENCES `jogo` (`idjogo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `classificacao`
--
ALTER TABLE `classificacao`
  ADD CONSTRAINT `fk_classificacao_convidado1` FOREIGN KEY (`idconvidado`) REFERENCES `convidado` (`idconvidado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_contrato_clube1` FOREIGN KEY (`idclube`) REFERENCES `clube` (`idclube`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contrato_jogador1` FOREIGN KEY (`idjogador`) REFERENCES `jogador` (`idjogador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `convidado`
--
ALTER TABLE `convidado`
  ADD CONSTRAINT `fk_convidado_clube1` FOREIGN KEY (`idclube`) REFERENCES `clube` (`idclube`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_convidado_fase1` FOREIGN KEY (`idfase`) REFERENCES `fase` (`idfase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_convidado_grupo1` FOREIGN KEY (`idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `detalhe_jogador`
--
ALTER TABLE `detalhe_jogador`
  ADD CONSTRAINT `fk_detalhe_jogador_competicao1` FOREIGN KEY (`idcompeticao`) REFERENCES `competicao` (`idcompeticao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalhe_jogador_contrato1` FOREIGN KEY (`idcontrato`) REFERENCES `contrato` (`idcontrato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `divisao_clube`
--
ALTER TABLE `divisao_clube`
  ADD CONSTRAINT `fk_clube_has_divisao_clube1` FOREIGN KEY (`idclube`) REFERENCES `clube` (`idclube`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clube_has_divisao_divisao1` FOREIGN KEY (`iddivisao`) REFERENCES `divisao` (`iddivisao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`idsetor`) REFERENCES `setor` (`idsetor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `fase`
--
ALTER TABLE `fase`
  ADD CONSTRAINT `fk_modulo_has_tipo_fase_modulo1` FOREIGN KEY (`idmodulo`) REFERENCES `modulo` (`idmodulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_modulo_has_tipo_fase_tipo_fase1` FOREIGN KEY (`idtipo_fase`) REFERENCES `tipo_fase` (`idtipo_fase`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`idimagem`) REFERENCES `imagem` (`idimagem`),
  ADD CONSTRAINT `galeria_ibfk_2` FOREIGN KEY (`idnoticia`) REFERENCES `noticia` (`idnoticia`);

--
-- Restrições para a tabela `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_grupo_tipo_grupo1` FOREIGN KEY (`idtipo_grupo`) REFERENCES `tipo_grupo` (`idtipo_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`idfase`) REFERENCES `fase` (`idfase`);

--
-- Restrições para a tabela `jogo`
--
ALTER TABLE `jogo`
  ADD CONSTRAINT `fk_jogo_convidado1` FOREIGN KEY (`time_casa`) REFERENCES `convidado` (`idconvidado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogo_convidado2` FOREIGN KEY (`time_visitante`) REFERENCES `convidado` (`idconvidado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `jogo_new`
--
ALTER TABLE `jogo_new`
  ADD CONSTRAINT `fk_estadio` FOREIGN KEY (`idestadio`) REFERENCES `estadio` (`idestadio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogo_new_convidado1` FOREIGN KEY (`time_casa`) REFERENCES `convidado` (`idconvidado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogo_new_convidado2` FOREIGN KEY (`time_visitante`) REFERENCES `convidado` (`idconvidado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rodada` FOREIGN KEY (`idrodada`) REFERENCES `rodada_fix` (`idrodada`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `fk_estadio_has_jogo_estadio1` FOREIGN KEY (`idestadio`) REFERENCES `estadio` (`idestadio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estadio_has_jogo_jogo1` FOREIGN KEY (`idjogo`) REFERENCES `jogo` (`idjogo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `fk_competicao_has_turno_competicao` FOREIGN KEY (`idcompeticao`) REFERENCES `competicao` (`idcompeticao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_competicao_has_turno_turno1` FOREIGN KEY (`idturno`) REFERENCES `turno` (`idturno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_tipo_noticia` FOREIGN KEY (`idtipo_noticia`) REFERENCES `tipo_noticia` (`idtipo_noticia`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Restrições para a tabela `noticia_arbitro`
--
ALTER TABLE `noticia_arbitro`
  ADD CONSTRAINT `noticia_arbitro_ibfk_1` FOREIGN KEY (`idnoticia`) REFERENCES `noticia` (`idnoticia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `noticia_arbitro_ibfk_2` FOREIGN KEY (`idarbitro`) REFERENCES `arbitro` (`idarbitro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `noticia_clube`
--
ALTER TABLE `noticia_clube`
  ADD CONSTRAINT `fk_noticia_clube_clube1` FOREIGN KEY (`clube_idclube`) REFERENCES `clube` (`idclube`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_noticia_clube_noticia1` FOREIGN KEY (`idnoticia`) REFERENCES `noticia` (`idnoticia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `noticia_competicao`
--
ALTER TABLE `noticia_competicao`
  ADD CONSTRAINT `fk_noticia_competicao_competicao1` FOREIGN KEY (`idcompeticao`) REFERENCES `competicao` (`idcompeticao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_noticia_competicao_noticia1` FOREIGN KEY (`idnoticia`) REFERENCES `noticia` (`idnoticia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `rodada`
--
ALTER TABLE `rodada`
  ADD CONSTRAINT `fk_fase_has_jogo_fase1` FOREIGN KEY (`fase_idfase`) REFERENCES `fase` (`idfase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fase_has_jogo_jogo1` FOREIGN KEY (`jogo_idjogo`) REFERENCES `jogo` (`idjogo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `rodada_fix`
--
ALTER TABLE `rodada_fix`
  ADD CONSTRAINT `fk_idfase` FOREIGN KEY (`idfase`) REFERENCES `fase` (`idfase`) ON DELETE NO ACTION ON UPDATE NO ACTION;
