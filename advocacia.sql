-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jun-2021 às 18:01
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `advocacia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advogados`
--

CREATE TABLE `advogados` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `especialidade` varchar(35) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `biografia` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `advogados`
--

INSERT INTO `advogados` (`id`, `nome`, `cpf`, `telefone`, `email`, `especialidade`, `foto`, `biografia`) VALUES
(9, 'Advogado Teste', '000.000.000-10', '(00) 00000-0000', 'advogado@hotmail.com', 'Familiar', 'hugo-profile.jpeg', 'Atuo ja hÃ¡ mais de 30 anos no direito familiar, jÃ¡ consegui ganhar centenas de processos, sempre com muito comprometimento e responsabilidade .....'),
(10, 'Pedro Freitas', '777.777.777-77', '(77) 77777-7777', 'pedro@hotmail.com', 'Criminal', '20200127_134456.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,'),
(12, 'Advgo', '789.999.999-99', '(33) 33333-3333', 'adva@hotmail.com', 'Trabalhista', '20200125_083610.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,'),
(13, 'aaaaaaaaaaa', '565.544.545-45', '(11) 21212-2225', 'aaasss@hugocursos.com.br', '', '', NULL),
(15, 'Advogado Teste 2', '455.484.851-54', '(54) 84514-4545', 'adv@hotmail.com', '', 'sem-perfil.jpg', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `audiencias`
--

CREATE TABLE `audiencias` (
  `id` int(11) NOT NULL,
  `processo` varchar(35) NOT NULL,
  `descricao` varchar(35) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `local` varchar(35) NOT NULL,
  `advogado` varchar(20) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `obs` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `audiencias`
--

INSERT INTO `audiencias` (`id`, `processo`, `descricao`, `data`, `hora`, `local`, `advogado`, `cliente`, `obs`) VALUES
(1, '8888888-88.8888.888.8888', 'AudiÃªncia de ConciliaÃ§Ã£o', '2020-05-05', '20:00:00', 'FÃ³run Lafaiete', '000.000.000-10', '888.888.888-88', ''),
(2, '8795689-78.7878.788.5558', 'AudiÃªncia Acordo', '2020-05-05', '19:00:00', 'Forun X', '000.000.000-10', '111.111.111-11', ''),
(3, '8888888-88.8888.888.8888', 'Audiencia XX', '2021-05-31', '10:30:00', 'Rua A', '000.000.000-10', '888.888.888-88', ''),
(4, '8795689-78.7878.788.5558', 'Audiencia Teste', '2021-05-31', '11:30:00', 'Rua XXXX', '000.000.000-10', '111.111.111-11', ''),
(5, '5555555-55.5555.555.5555', 'Audiência XXXX', '2021-05-31', '13:50:00', 'Rua SSSS', '000.000.000-10', '11.212.122/2121-23', ''),
(8, '1545021-55.4545.454.5548', 'aaaaaaaaaaaaaaa', '2021-05-31', '10:00:00', 'ssssssssssss', '777.777.777-77', '545.455.554-55', 'dfsfaffafadfdasfas'),
(9, '1545021-55.4545.454.5548', 'Nova Audiência', '2021-05-31', '11:00:00', 'Rua X', '777.777.777-77', '545.455.554-55', ''),
(10, '1545021-55.4545.454.5548', 'sssssss', '2021-05-31', '15:00:00', 'zzzzzzzzzz', '777.777.777-77', '545.455.554-55', ''),
(11, '1545021-55.4545.454.5548', 'eeeeeeeeee', '2021-05-31', '11:01:00', 'eeeeeeeeeee', '777.777.777-77', '545.455.554-55', ''),
(12, '1545021-55.4545.454.5548', 'fdsafdsafdsafdsa', '2021-05-31', '10:14:00', 'fadfdsafdafa', '777.777.777-77', '545.455.554-55', ''),
(15, '1545021-55.4545.454.5548', 'Audiência XXX', '2021-06-01', '11:15:00', 'Fórum ABC', '777.777.777-77', '545.455.554-55', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(1, 'Advogado'),
(2, 'Tesoureiro'),
(3, 'Recepcionista'),
(4, 'Motoboy');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `advogado` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `obs` varchar(350) NOT NULL,
  `tipo_pessoa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `advogado`, `data`, `obs`, `tipo_pessoa`) VALUES
(1, 'Marcos Souza', '111.111.111-11', '(22) 22222-2222', 'marcos@gmail.com', 'Rua A', '000.000.000-10', '2020-04-27', 'Rua A', 'Pessoa Jurídica'),
(3, 'Matheus Campos', '112.332.556-66', '(66) 66666-6666', 'mateus@hotmail.com', 'Rua 5', '000.000.000-10', '2020-04-28', 'aa', 'Pessoa Física'),
(4, 'Empresa X', '11.212.122/2121-23', '(33) 33333-3333', 'empresa@hotmail.com', 'Rua A', '000.000.000-10', '2020-04-28', 'AAAAA', 'Pessoa Jurídica'),
(10, 'Hugo Vasconcelos', '888.888.888-88', '(88) 88888-8888', 'hugovasconcelosf@hotmail.com', 'Rua A', '000.000.000-10', '2020-05-05', 'aaaa', 'Pessoa FÃ­sica'),
(11, 'Marta Silva', '545.455.554-55', '(54) 54555-4555', 'marta@hotmail.com', 'Rua X', '777.777.777-77', '2021-05-31', 'fdfdfsdfds', 'Pessoa Física');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `processo` varchar(30) NOT NULL,
  `arquivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `documentos`
--

INSERT INTO `documentos` (`id`, `descricao`, `data`, `processo`, `arquivo`) VALUES
(1, 'Identidade', '2020-05-04', '8795689-78.7878.788.5558', 'SITE + SISTEMA + APP.jpg'),
(7, 'Documento de identidade', '2020-05-05', '8888888-88.8888.888.8888', 'curso-de-sistema-gestao-advocacia.jpeg'),
(8, 'Documento do Processo', '2020-05-05', '8888888-88.8888.888.8888', 'modelos-de-peticoes-gratis-peticoesonline.jpg'),
(20, 'Arquivos Iniciais do Projeto', '2021-05-31', '1545021-55.4545.454.5548', '31-05-2021-19-20-43-euepedro.zip'),
(21, 'PDF com os documentos', '2021-05-31', '1545021-55.4545.454.5548', '31-05-2021-19-21-11-HISTÓRIA-3º-ATIV-SEM-20.pdf'),
(22, 'Imagens do Processo', '2021-05-31', '1545021-55.4545.454.5548', '31-05-2021-19-21-21-man-in-tweed-suit-with-barett-4386ld.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `especialidades`
--

INSERT INTO `especialidades` (`id`, `nome`) VALUES
(1, 'Criminal'),
(2, 'Trabalhista'),
(3, 'Familiar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `telefone`, `email`, `cargo`) VALUES
(20, 'Advogado Teste', '000.000.000-10', '(00) 00000-0000', 'advogado@hotmail.com', 'Advogado'),
(22, 'Pedro Freitas', '777.777.777-77', '(77) 77777-7777', 'pedro@hotmail.com', 'Advogado'),
(24, 'Advgo', '789.999.999-99', '(33) 33333-3333', 'adva@hotmail.com', 'Advogado'),
(25, 'Tesoureiro', '111.111.111-11', '(11) 11111-1111', 'tesoureiro@hotmail.c', 'Tesoureiro'),
(27, 'Paloma Campos', '444.444.444-44', '(22) 22222-2222', 'paloma@hotmail.com', 'Recepcionista'),
(30, 'Advogado Teste 2', '455.484.851-54', '(54) 84514-4545', 'adv@hotmail.com', 'Advogado'),
(31, 'Administrador', '000.000.000-00', '(00)00000-0000', 'hvfadvocacia@gmail.c', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `obs` varchar(350) DEFAULT NULL,
  `data` date NOT NULL,
  `processo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `titulo`, `obs`, `data`, `processo`) VALUES
(2, 'Entrega de Documentos', 'Foram Entregados documentos que estavam pendentes para ....', '2020-05-04', '8795689-78.7878.788.5558'),
(4, 'Movimentação Dois', 'Segunda movimentação para o processo', '2020-05-13', '8795689-78.7878.788.5558'),
(5, 'Documentos no Forun', 'Ouve uma movimentaÃ§Ã£o no processo, os documentos...', '2020-05-05', '8888888-88.8888.888.8888'),
(6, 'Entrada nos Documentos', 'Na Data de hoje entramos com os documentos para o processo, agora Ã© sÃ³ ....', '2020-05-05', '8888888-88.8888.888.8888'),
(7, 'Audiência Inicial', 'Ficou resolvido......', '2021-05-31', '1545021-55.4545.454.5548'),
(13, 'Audiência Conciliação', 'Nessa audiencia ....', '2021-05-31', '1545021-55.4545.454.5548');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `movimento` varchar(35) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `id_movimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `valor`, `tesoureiro`, `data`, `id_movimento`) VALUES
(1, 'Entrada', 'Processo', '1800.00', '444.444.444-44', '2020-04-29', 2),
(2, 'Entrada', 'Processo', '1450.00', '444.444.444-44', '2020-04-29', 3),
(3, 'Saída', 'Pagamento Conta', '560.00', '444.444.444-44', '2020-04-29', 1),
(4, 'Saída', 'Pgto Funcionário', '2500.00', '444.444.444-44', '2020-04-29', 1),
(6, 'Saída', 'Pgto Funcionário', '850.00', '444.444.444-44', '2020-04-29', 3),
(7, 'Saída', 'Pgto Funcionário', '680.00', '444.444.444-44', '2020-04-30', 4),
(8, 'Entrada', 'Processo', '1900.00', '111.111.111-11', '2020-04-30', 4),
(9, 'Saída', 'Pagamento Conta', '690.00', '111.111.111-11', '2020-04-30', 6),
(10, 'Saída', 'Pgto Funcionário', '1600.00', '111.111.111-11', '2020-04-30', 5),
(11, 'Entrada', 'Processo', '2500.00', '444.444.444-44', '2020-04-30', 5),
(12, 'Saída', 'Pgto Funcionário', '1800.00', '444.444.444-44', '2020-05-04', 6),
(13, 'SaÃ­da', 'Pgto FuncionÃ¡rio', '1250.00', '444.444.444-44', '2020-05-05', 7),
(14, 'Saída', 'Pgto Funcionário', '600.00', '111.111.111-11', '2021-05-31', 8),
(15, 'Saída', 'Pagamento Conta', '30.99', '111.111.111-11', '2021-05-31', 16),
(16, 'Saída', 'Pgto Funcionário', '800.00', '111.111.111-11', '2021-05-31', 9),
(17, 'Saída', 'Pgto Funcionário', '600.00', '000.000.000-00', '2021-05-31', 10),
(18, 'Saída', 'Pgto Funcionário', '200.00', '000.000.000-00', '2021-05-31', 11),
(19, 'Saída', 'Pagamento Conta', '50.00', '000.000.000-00', '2021-05-31', 17),
(20, 'Entrada', 'Processo', '1000.00', '111.111.111-11', '2021-05-31', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `nome_funcionario` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `funcionario`, `valor`, `tesoureiro`, `data`, `nome_funcionario`) VALUES
(1, '000.000.000-10', '2500.00', '444.444.444-44', '2020-04-29', 'Advogado Teste'),
(3, '444.444.444-44', '850.00', '444.444.444-44', '2020-04-29', 'Paloma Campos'),
(4, '444.444.444-44', '680.00', '444.444.444-44', '2020-04-30', 'Paloma Campos'),
(5, '111.111.111-11', '1600.00', '111.111.111-11', '2020-04-30', 'Tesoureiro'),
(6, '789.999.999-99', '1800.00', '444.444.444-44', '2020-05-04', 'Advgo'),
(7, '444.444.444-44', '1250.00', '444.444.444-44', '2020-05-05', 'Paloma Campos'),
(8, '789.999.999-99', '600.00', '111.111.111-11', '2021-05-31', 'Advgo'),
(9, '444.444.444-44', '800.00', '111.111.111-11', '2021-05-31', 'Paloma Campos'),
(10, '111.111.111-11', '600.00', '000.000.000-00', '2021-05-31', 'Tesoureiro'),
(11, '000.000.000-10', '200.00', '000.000.000-00', '2021-05-31', 'Advogado Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagar`
--

CREATE TABLE `pagar` (
  `id` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `pagamento` date DEFAULT NULL,
  `pago` varchar(5) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagar`
--

INSERT INTO `pagar` (`id`, `descricao`, `valor`, `vencimento`, `pagamento`, `pago`, `funcionario`, `foto`) VALUES
(1, 'Conta de Luz', '560.00', '2020-04-29', '2020-04-29', 'Sim', '444.444.444-44', 'curso-de-sistema-de-controle-de-cobrancas.jpeg'),
(3, 'Conta de Água', '350.00', '2020-04-29', NULL, 'Não', '444.444.444-44', 'sem-foto.png'),
(4, 'Pagamento Eletrecista', '450.00', '2020-04-29', NULL, 'Não', '444.444.444-44', 'sem-foto.png'),
(5, 'Conta de Telefone', '890.00', '2020-04-29', NULL, 'Não', '111.111.111-11', 'conta3.jpg'),
(6, 'Conta de Água', '690.00', '2020-04-30', '2020-04-30', 'Sim', '111.111.111-11', 'conta3.jpg'),
(7, 'Conta de Luz', '980.00', '2020-04-30', NULL, 'Não', '444.444.444-44', 'sem-foto.png'),
(8, 'Conta de Água', '590.00', '2020-04-30', NULL, 'Não', '444.444.444-44', 'sem-foto.png'),
(9, 'Eletrecista', '550.00', '2020-04-30', NULL, 'Não', '444.444.444-44', 'sem-foto.png'),
(10, 'Compra de Cadeiras', '890.00', '2020-04-30', NULL, 'Não', '444.444.444-44', 'sem-foto.png'),
(12, 'Conta de Luz', '1400.00', '2020-05-04', NULL, 'Não', '444.444.444-44', 'sem-foto.png'),
(13, 'Conta de Luz', '680.00', '2020-05-05', NULL, 'NÃ£o', '444.444.444-44', 'sem-foto.png'),
(14, 'Conta de Ãgua', '890.00', '2020-05-05', NULL, 'NÃ£o', '444.444.444-44', 'sem-foto.png'),
(15, 'Conta de Luz', '500.00', '2021-05-31', NULL, 'Não', '111.111.111-11', 'man-in-tweed-suit-with-barett-4386ld.png'),
(16, 'aaaa', '30.99', '2021-05-31', '2021-05-31', 'Sim', '111.111.111-11', 'HISTÓRIA 3º ATIV SEM 20.pdf'),
(17, 'cxsdfsd', '50.00', '2021-05-31', '2021-05-31', 'Sim', '000.000.000-00', 'guia (1).pdf'),
(18, 'fdafdasfa', '50.00', '2021-05-31', NULL, 'Não', '000.000.000-00', 'sem-foto.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `peticoes`
--

CREATE TABLE `peticoes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `acao` varchar(50) DEFAULT NULL,
  `processo` varchar(35) DEFAULT NULL,
  `agravante` varchar(35) DEFAULT NULL,
  `agravado` varchar(35) DEFAULT NULL,
  `texto` varchar(1500) DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `peticoes`
--

INSERT INTO `peticoes` (`id`, `titulo`, `acao`, `processo`, `agravante`, `agravado`, `texto`, `data`) VALUES
(1, 'PetiÃ§Ã£o Criminal', 'Criminal', '8888888-88.8888.888.8888', 'Marcio Silva', 'Silverio Campos', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-05-05'),
(3, 'zzzzzzzaaa', 'ccccccccc', '8795689-78.7878.788.5558', 'ccccccccccc', 'ccccccccc', 'ccccccccc', '2020-05-05'),
(4, 'PetiÃ§Ã£o Inicial CÃ­vil', 'Civil', '7878999-99.9999.999.9999', 'Pedro Campos Souza', 'Marcos Pedro Silva', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-05-05'),
(5, 'Titulo da Petição', 'Criminal', '1545021-55.4545.454.5548', 'Agravante informação', 'Agravado', 'Texto da Petição', '2021-05-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `processados`
--

CREATE TABLE `processados` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `advogado` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `obs` varchar(350) NOT NULL,
  `tipo_pessoa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `processados`
--

INSERT INTO `processados` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `advogado`, `data`, `obs`, `tipo_pessoa`) VALUES
(1, 'Paola Silva', '444.445.566-66', '(55) 55555-5555', 'paola@hotmail.com', 'Rua 5', '000.000.000-10', '2020-04-28', 'Nenhuma', 'Pessoa Física'),
(2, 'Empreza Z', '44.444.444/4444-44', '(66) 66666-6666', 'emprezaz@hotmail.com', 'Rua 5', '000.000.000-10', '2020-04-28', 'Nenhuma', 'Pessoa Jurídica'),
(3, 'Fabricio Silva', '655.456.554-55', '(66) 26545-5545', 'fabricioss@hotmail.com', 'Rua Almeida Campos 150', '777.777.777-77', '2021-05-31', 'FFFFFFFFFFFFFFFFFFF', 'Pessoa Física'),
(5, 'Marcia Santos', '255.514.545-55', '(54) 54545-4545', '', '', '777.777.777-77', '2021-05-31', '', 'Pessoa Física');

-- --------------------------------------------------------

--
-- Estrutura da tabela `processos`
--

CREATE TABLE `processos` (
  `id` int(11) NOT NULL,
  `num_processo` varchar(35) DEFAULT NULL,
  `vara` varchar(35) NOT NULL,
  `tipo_acao` varchar(35) NOT NULL,
  `advogado` varchar(20) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `processado` varchar(20) DEFAULT NULL,
  `data_audiencia` date DEFAULT NULL,
  `hora_audiencia` time DEFAULT NULL,
  `data_peticao` date DEFAULT NULL,
  `data_abertura` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `tipo_pessoa` varchar(20) NOT NULL,
  `audiencias` int(11) NOT NULL,
  `obs` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `processos`
--

INSERT INTO `processos` (`id`, `num_processo`, `vara`, `tipo_acao`, `advogado`, `cliente`, `processado`, `data_audiencia`, `hora_audiencia`, `data_peticao`, `data_abertura`, `status`, `tipo_pessoa`, `audiencias`, `obs`) VALUES
(1, '5555555-55.5555.555.5555', '2', '3', '000.000.000-10', '11.212.122/2121-23', '444.445.566-66', '2021-05-31', '20:12:00', '2020-04-28', '2020-04-28', 'Andamento', 'Pessoa Física', 10, NULL),
(2, '2222222-22.2222.222.2229', '2', '3', '000.000.000-10', '112.332.556-66', '444.445.566-66', '2020-04-29', '10:30:00', '0000-00-00', '2020-04-28', 'Cancelado', 'Pessoa Física', 3, NULL),
(3, '7878999-99.9999.999.9999', '2', '2', '000.000.000-10', '111.111.111-11', '44.444.444/4444-44', '2020-05-04', '11:10:00', '2020-05-05', '2020-04-28', 'ConcluÃ­do', 'Pessoa Jurídica', 4, NULL),
(4, '8795689-78.7878.788.5558', '2', '3', '000.000.000-10', '111.111.111-11', '44.444.444/4444-44', '2021-05-31', '11:30:00', '2020-05-05', '2020-04-28', 'Andamento', 'Pessoa Jurídica', 7, 'Esta é a observação do Processo xxxx Esta é a observação do Processo xxxx Esta é a observação do Processo xxxx Esta é a observação do Processo xxxx '),
(5, '8888888-88.8888.888.8888', '1', '1', '000.000.000-10', '888.888.888-88', '444.445.566-66', '2021-05-31', '10:30:00', '2020-05-05', '2020-05-05', 'Aberto', 'Pessoa FÃ­sica', 3, 'Documentos despachados para o FÃ³run, aguardando anÃ¡lise.'),
(6, '1545021-55.4545.454.5548', '1', '1', '777.777.777-77', '545.455.554-55', '655.456.554-55', '2021-06-01', '11:15:00', '2021-05-31', '2021-05-31', 'Aberto', 'Pessoa Física', 6, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receber`
--

CREATE TABLE `receber` (
  `id` int(11) NOT NULL,
  `descricao` varchar(35) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `advogado` varchar(20) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `pago` varchar(5) NOT NULL,
  `processo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `receber`
--

INSERT INTO `receber` (`id`, `descricao`, `valor`, `advogado`, `cliente`, `data`, `pago`, `processo`) VALUES
(2, 'Custas Iniciais', '1800.00', '000.000.000-10', '111.111.111-11', '2020-04-29', 'sim', 3),
(3, 'Custas Iniciais', '1450.00', '000.000.000-10', '112.332.556-66', '2020-04-29', 'sim', 2),
(4, 'Custas Iniciais', '1900.00', '000.000.000-10', '111.111.111-11', '2020-04-30', 'sim', 3),
(5, 'Custas Iniciais', '2500.00', '000.000.000-10', '111.111.111-11', '2020-04-30', 'sim', 4),
(6, 'Custas de Documentos', '1500.00', '000.000.000-10', '111.111.111-11', '2020-05-04', 'nao', 4),
(7, 'Custas Iniciais', '1600.00', '000.000.000-10', '888.888.888-88', '2020-05-05', 'nao', 5),
(8, 'Valor Inicial', '1000.00', '777.777.777-77', '545.455.554-55', '2021-05-31', 'sim', 6),
(9, 'Teste', '50.00', '777.777.777-77', '545.455.554-55', '2021-05-31', 'nao', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `hora` time DEFAULT NULL,
  `advogado` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `nome`, `descricao`, `data`, `hora`, `advogado`, `status`) VALUES
(1, 'Reunião com Cliente', 'Marcos Paulo', '2020-04-27', '16:30:00', '000.000.000-10', 'Agendada'),
(7, 'Encontar com Cliente', 'Empresa SysMedical', '2020-04-27', '15:30:00', '000.000.000-10', 'Agendada'),
(8, 'Ir ao Fórum', 'Verificar Papelada', '2020-04-27', '16:50:00', '000.000.000-10', 'Agendada'),
(9, 'Almoço com Cliente', 'Marta Silva', '2020-04-27', '12:30:00', '000.000.000-10', 'Agendada'),
(10, 'Teste', 'aaaaa', '2020-04-29', '12:00:00', '000.000.000-10', 'Agendada'),
(11, 'Reunião com Cliente', 'Marcos Paulo', '2020-04-28', '10:30:00', '000.000.000-10', 'Concluida'),
(12, 'Almoço com Cliente', 'Marcia Correa', '2020-04-28', '12:30:00', '000.000.000-10', 'Agendada'),
(13, 'Visita a Empresa X', 'Fechamento de Contrato', '2020-04-28', '17:20:00', '000.000.000-10', 'Agendada'),
(14, 'Ir ao Fórum', 'Atraso nos documentos', '2020-04-28', '15:30:00', '000.000.000-10', 'Agendada'),
(15, 'Reunião com Cliente', 'Marcos Paulo', '2020-04-30', '10:30:00', '000.000.000-10', 'Agendada'),
(16, 'Almoço com Cliente', 'Marcos Paulo', '2020-04-30', '12:30:00', '000.000.000-10', 'Agendada'),
(17, 'Ir ao Fórum', 'Fórun Lafaeite', '2020-04-30', '13:30:00', '000.000.000-10', 'Agendada'),
(18, 'ReuniÃ£o com Cliente', 'AlmoÃ§o na casa do cliente', '2020-05-05', '12:30:00', '000.000.000-10', 'Agendada'),
(19, 'Ir ao FÃ³rum', 'Levar Documentos', '2020-05-05', '20:30:00', '000.000.000-10', 'Agendada'),
(20, 'Audiência João', 'Audiencia no fórum XX', '2021-05-31', '20:00:00', '777.777.777-77', 'Agendada'),
(21, 'Tarefa Teste', 'Descrição da Tarefa', '2021-05-31', '16:00:00', '777.777.777-77', 'Agendada'),
(24, 'Audiência', 'Audiência XXX', '2021-06-01', '11:15:00', '777.777.777-77', 'Agendada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `usuario` varchar(35) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `senha_original` varchar(20) NOT NULL,
  `nivel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `usuario`, `senha`, `senha_original`, `nivel`) VALUES
(14, 'Advogado Teste', '000.000.000-10', 'advogado@hotmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Advogado'),
(16, 'Pedro Freitas', '777.777.777-77', 'pedro@hotmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Advogado'),
(17, 'Advgo', '789.999.999-99', 'adva@hotmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Advogado'),
(18, 'Marcos Souza', '111.111.111-11', 'marcos@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Cliente'),
(20, 'Matheus Campos', '112.332.556-66', 'mateus@hotmail.com', 'ad8df87f9d73022bc9a5d95e3539bcda', '11233255666', 'Cliente'),
(21, 'Empresa X', '11.212.122/2121-23', 'empresa@hotmail.com', '149f0f9c61a9a38e352f05eeb2f03a48', '11212122212123', 'Cliente'),
(26, 'Tesoureiro', '111.111.111-11', 'tesoureiro@hotmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Tesoureiro'),
(27, 'Paloma Campos', '444.444.444-44', 'paloma@hotmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Recepcionista'),
(29, 'Hugo Vasconcelos', '888.888.888-88', 'hugovasconcelosf@hotmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Cliente'),
(30, 'aaaaaaaaaaa', '565.544.545-45', 'aaasss@hugocursos.com.br', '27e2ca2d011c975e9950b282ca1db4a9', '56554454545', 'Advogado'),
(32, 'Advogado Teste 2', '455.484.851-54', 'adv@hotmail.com', 'e56f2e604ab001031c08fdbb1283ed4d', '45548485154', 'Advogado'),
(34, 'Administrador', '000.000.000-00', 'hvfadvocacia@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 'admin'),
(35, 'Marta Silva', '545.455.554-55', 'marta@hotmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `varas`
--

CREATE TABLE `varas` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `varas`
--

INSERT INTO `varas` (`id`, `nome`) VALUES
(1, 'Vara 1'),
(2, 'Vara 2'),
(3, 'Vara 3');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `advogados`
--
ALTER TABLE `advogados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `audiencias`
--
ALTER TABLE `audiencias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagar`
--
ALTER TABLE `pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `peticoes`
--
ALTER TABLE `peticoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `processados`
--
ALTER TABLE `processados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `processos`
--
ALTER TABLE `processos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `receber`
--
ALTER TABLE `receber`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `varas`
--
ALTER TABLE `varas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `advogados`
--
ALTER TABLE `advogados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `audiencias`
--
ALTER TABLE `audiencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `pagar`
--
ALTER TABLE `pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `peticoes`
--
ALTER TABLE `peticoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `processados`
--
ALTER TABLE `processados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `processos`
--
ALTER TABLE `processos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `receber`
--
ALTER TABLE `receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `varas`
--
ALTER TABLE `varas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
