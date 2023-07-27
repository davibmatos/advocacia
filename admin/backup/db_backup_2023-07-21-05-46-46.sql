DROP TABLE IF EXISTS advogados;

CREATE TABLE `advogados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `especialidade` varchar(35) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `biografia` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO advogados VALUES("9","Advogado Teste","000.000.000-10","(00) 00000-0000","advogado@hotmail.com","Familiar","hugo-profile.jpeg","Atuo ja hÃ¡ mais de 30 anos no direito familiar, jÃ¡ consegui ganhar centenas de processos, sempre com muito comprometimento e responsabilidade .....");
INSERT INTO advogados VALUES("10","Pedro Freitas","777.777.777-77","(77) 77777-7777","pedro@hotmail.com","Criminal","20200127_134456.jpg","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,");
INSERT INTO advogados VALUES("12","Advgo","789.999.999-99","(33) 33333-3333","adva@hotmail.com","Trabalhista","20200125_083610.jpg","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,");
INSERT INTO advogados VALUES("13","aaaaaaaaaaa","565.544.545-45","(11) 21212-2225","aaasss@hugocursos.com.br",NULL,NULL,NULL);
INSERT INTO advogados VALUES("15","Advogado Teste 2","455.484.851-54","(54) 84514-4545","adv@hotmail.com",NULL,"sem-perfil.jpg",NULL);


DROP TABLE IF EXISTS audiencias;

CREATE TABLE `audiencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `processo` varchar(35) NOT NULL,
  `descricao` varchar(35) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `local` varchar(35) NOT NULL,
  `advogado` varchar(20) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `obs` varchar(350) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO audiencias VALUES("1","8888888-88.8888.888.8888","AudiÃªncia de ConciliaÃ§Ã£o","2020-05-05","20:00:00","FÃ³run Lafaiete","000.000.000-10","888.888.888-88",NULL);
INSERT INTO audiencias VALUES("2","8795689-78.7878.788.5558","AudiÃªncia Acordo","2020-05-05","19:00:00","Forun X","000.000.000-10","111.111.111-11",NULL);
INSERT INTO audiencias VALUES("3","8888888-88.8888.888.8888","Audiencia XX","2021-05-31","10:30:00","Rua A","000.000.000-10","888.888.888-88",NULL);
INSERT INTO audiencias VALUES("4","8795689-78.7878.788.5558","Audiencia Teste","2021-05-31","11:30:00","Rua XXXX","000.000.000-10","111.111.111-11",NULL);
INSERT INTO audiencias VALUES("5","5555555-55.5555.555.5555","Audiência XXXX","2021-05-31","13:50:00","Rua SSSS","000.000.000-10","11.212.122/2121-23",NULL);
INSERT INTO audiencias VALUES("8","1545021-55.4545.454.5548","aaaaaaaaaaaaaaa","2021-05-31","10:00:00","ssssssssssss","777.777.777-77","545.455.554-55","dfsfaffafadfdasfas");
INSERT INTO audiencias VALUES("9","1545021-55.4545.454.5548","Nova Audiência","2021-05-31","11:00:00","Rua X","777.777.777-77","545.455.554-55",NULL);
INSERT INTO audiencias VALUES("10","1545021-55.4545.454.5548","sssssss","2021-05-31","15:00:00","zzzzzzzzzz","777.777.777-77","545.455.554-55",NULL);
INSERT INTO audiencias VALUES("11","1545021-55.4545.454.5548","eeeeeeeeee","2021-05-31","11:01:00","eeeeeeeeeee","777.777.777-77","545.455.554-55",NULL);
INSERT INTO audiencias VALUES("12","1545021-55.4545.454.5548","fdsafdsafdsafdsa","2021-05-31","10:14:00","fadfdsafdafa","777.777.777-77","545.455.554-55",NULL);
INSERT INTO audiencias VALUES("15","1545021-55.4545.454.5548","Audiência XXX","2021-06-01","11:15:00","Fórum ABC","777.777.777-77","545.455.554-55",NULL);
INSERT INTO audiencias VALUES("16","0101010-10.1010.101.0101","audiencia inicial","2023-07-27","10:00:00","autram nunes 7a vara","789.999.999-99","025.396.193-98",NULL);


DROP TABLE IF EXISTS cargos;

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO cargos VALUES("1","Advogado");
INSERT INTO cargos VALUES("2","Tesoureiro");
INSERT INTO cargos VALUES("3","Recepcionista");
INSERT INTO cargos VALUES("4","Motoboy");


DROP TABLE IF EXISTS clientes;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `advogado` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `obs` varchar(350) NOT NULL,
  `tipo_pessoa` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO clientes VALUES("1","Marcos Souza","111.111.111-11","(22) 22222-2222","marcos@gmail.com","Rua A","000.000.000-10","2020-04-27","Rua A","Pessoa Jurídica");
INSERT INTO clientes VALUES("3","Matheus Campos","112.332.556-66","(66) 66666-6666","mateus@hotmail.com","Rua 5","000.000.000-10","2020-04-28","aa","Pessoa Física");
INSERT INTO clientes VALUES("4","Empresa X","11.212.122/2121-23","(33) 33333-3333","empresa@hotmail.com","Rua A","000.000.000-10","2020-04-28","AAAAA","Pessoa Jurídica");
INSERT INTO clientes VALUES("10","Hugo Vasconcelos","888.888.888-88","(88) 88888-8888","hugovasconcelosf@hotmail.com","Rua A","000.000.000-10","2020-05-05","aaaa","Pessoa FÃ­sica");
INSERT INTO clientes VALUES("11","Marta Silva","545.455.554-55","(54) 54555-4555","marta@hotmail.com","Rua X","777.777.777-77","2021-05-31","fdfdfsdfds","Pessoa Física");
INSERT INTO clientes VALUES("12","davi matos","025.396.193-98","(85) 99734-7796","davibmatos@gmail.com","pereira de miranda","789.999.999-99","2023-07-21",NULL,"Pessoa Física");


DROP TABLE IF EXISTS documentos;

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `processo` varchar(30) NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

INSERT INTO documentos VALUES("1","Identidade","2020-05-04","8795689-78.7878.788.5558","SITE + SISTEMA + APP.jpg");
INSERT INTO documentos VALUES("7","Documento de identidade","2020-05-05","8888888-88.8888.888.8888","curso-de-sistema-gestao-advocacia.jpeg");
INSERT INTO documentos VALUES("8","Documento do Processo","2020-05-05","8888888-88.8888.888.8888","modelos-de-peticoes-gratis-peticoesonline.jpg");
INSERT INTO documentos VALUES("20","Arquivos Iniciais do Projeto","2021-05-31","1545021-55.4545.454.5548","31-05-2021-19-20-43-euepedro.zip");
INSERT INTO documentos VALUES("21","PDF com os documentos","2021-05-31","1545021-55.4545.454.5548","31-05-2021-19-21-11-HISTÓRIA-3º-ATIV-SEM-20.pdf");
INSERT INTO documentos VALUES("22","Imagens do Processo","2021-05-31","1545021-55.4545.454.5548","31-05-2021-19-21-21-man-in-tweed-suit-with-barett-4386ld.png");


DROP TABLE IF EXISTS especialidades;

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO especialidades VALUES("1","Criminal");
INSERT INTO especialidades VALUES("2","Trabalhista");
INSERT INTO especialidades VALUES("3","Familiar");


DROP TABLE IF EXISTS funcionarios;

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO funcionarios VALUES("20","Advogado Teste","000.000.000-10","(00) 00000-0000","advogado@hotmail.com","Advogado");
INSERT INTO funcionarios VALUES("22","Pedro Freitas","777.777.777-77","(77) 77777-7777","pedro@hotmail.com","Advogado");
INSERT INTO funcionarios VALUES("24","Advgo","789.999.999-99","(33) 33333-3333","adva@hotmail.com","Advogado");
INSERT INTO funcionarios VALUES("25","Tesoureiro","111.111.111-11","(11) 11111-1111","tesoureiro@hotmail.c","Tesoureiro");
INSERT INTO funcionarios VALUES("27","Paloma Campos","444.444.444-44","(22) 22222-2222","paloma@hotmail.com","Recepcionista");
INSERT INTO funcionarios VALUES("30","Advogado Teste 2","455.484.851-54","(54) 84514-4545","adv@hotmail.com","Advogado");
INSERT INTO funcionarios VALUES("31","Administrador","000.000.000-00","(00)00000-0000","hvfadvocacia@gmail.c","admin");


DROP TABLE IF EXISTS historico;

CREATE TABLE `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `obs` varchar(350) DEFAULT NULL,
  `data` date NOT NULL,
  `processo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO historico VALUES("2","Entrega de Documentos","Foram Entregados documentos que estavam pendentes para ....","2020-05-04","8795689-78.7878.788.5558");
INSERT INTO historico VALUES("4","Movimentação Dois","Segunda movimentação para o processo","2020-05-13","8795689-78.7878.788.5558");
INSERT INTO historico VALUES("5","Documentos no Forun","Ouve uma movimentaÃ§Ã£o no processo, os documentos...","2020-05-05","8888888-88.8888.888.8888");
INSERT INTO historico VALUES("6","Entrada nos Documentos","Na Data de hoje entramos com os documentos para o processo, agora Ã© sÃ³ ....","2020-05-05","8888888-88.8888.888.8888");
INSERT INTO historico VALUES("7","Audiência Inicial","Ficou resolvido......","2021-05-31","1545021-55.4545.454.5548");
INSERT INTO historico VALUES("13","Audiência Conciliação","Nessa audiencia ....","2021-05-31","1545021-55.4545.454.5548");
INSERT INTO historico VALUES("14","Aguardando aprovação do juri.","Enviado via e-mail para audiência.","2023-07-17",NULL);


DROP TABLE IF EXISTS movimentacoes;

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) NOT NULL,
  `movimento` varchar(35) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `id_movimento` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

INSERT INTO movimentacoes VALUES("1","Entrada","Processo","1800.00","444.444.444-44","2020-04-29","2");
INSERT INTO movimentacoes VALUES("2","Entrada","Processo","1450.00","444.444.444-44","2020-04-29","3");
INSERT INTO movimentacoes VALUES("3","Saída","Pagamento Conta","560.00","444.444.444-44","2020-04-29","1");
INSERT INTO movimentacoes VALUES("4","Saída","Pgto Funcionário","2500.00","444.444.444-44","2020-04-29","1");
INSERT INTO movimentacoes VALUES("6","Saída","Pgto Funcionário","850.00","444.444.444-44","2020-04-29","3");
INSERT INTO movimentacoes VALUES("7","Saída","Pgto Funcionário","680.00","444.444.444-44","2020-04-30","4");
INSERT INTO movimentacoes VALUES("8","Entrada","Processo","1900.00","111.111.111-11","2020-04-30","4");
INSERT INTO movimentacoes VALUES("9","Saída","Pagamento Conta","690.00","111.111.111-11","2020-04-30","6");
INSERT INTO movimentacoes VALUES("10","Saída","Pgto Funcionário","1600.00","111.111.111-11","2020-04-30","5");
INSERT INTO movimentacoes VALUES("11","Entrada","Processo","2500.00","444.444.444-44","2020-04-30","5");
INSERT INTO movimentacoes VALUES("12","Saída","Pgto Funcionário","1800.00","444.444.444-44","2020-05-04","6");
INSERT INTO movimentacoes VALUES("13","SaÃ­da","Pgto FuncionÃ¡rio","1250.00","444.444.444-44","2020-05-05","7");
INSERT INTO movimentacoes VALUES("14","Saída","Pgto Funcionário","600.00","111.111.111-11","2021-05-31","8");
INSERT INTO movimentacoes VALUES("15","Saída","Pagamento Conta","30.99","111.111.111-11","2021-05-31","16");
INSERT INTO movimentacoes VALUES("16","Saída","Pgto Funcionário","800.00","111.111.111-11","2021-05-31","9");
INSERT INTO movimentacoes VALUES("17","Saída","Pgto Funcionário","600.00","000.000.000-00","2021-05-31","10");
INSERT INTO movimentacoes VALUES("18","Saída","Pgto Funcionário","200.00","000.000.000-00","2021-05-31","11");
INSERT INTO movimentacoes VALUES("19","Saída","Pagamento Conta","50.00","000.000.000-00","2021-05-31","17");
INSERT INTO movimentacoes VALUES("20","Entrada","Processo","1000.00","111.111.111-11","2021-05-31","8");
INSERT INTO movimentacoes VALUES("21","Entrada","Processo","19.77","000.000.000-10","2023-07-17","10");
INSERT INTO movimentacoes VALUES("22","Entrada","Processo","100.00","000.000.000-10","2023-07-17","11");
INSERT INTO movimentacoes VALUES("23","Entrada","Processo","0.00","000.000.000-10","2023-07-17","12");


DROP TABLE IF EXISTS pagamentos;

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario` varchar(20) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `nome_funcionario` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO pagamentos VALUES("1","000.000.000-10","2500.00","444.444.444-44","2020-04-29","Advogado Teste");
INSERT INTO pagamentos VALUES("3","444.444.444-44","850.00","444.444.444-44","2020-04-29","Paloma Campos");
INSERT INTO pagamentos VALUES("4","444.444.444-44","680.00","444.444.444-44","2020-04-30","Paloma Campos");
INSERT INTO pagamentos VALUES("5","111.111.111-11","1600.00","111.111.111-11","2020-04-30","Tesoureiro");
INSERT INTO pagamentos VALUES("6","789.999.999-99","1800.00","444.444.444-44","2020-05-04","Advgo");
INSERT INTO pagamentos VALUES("7","444.444.444-44","1250.00","444.444.444-44","2020-05-05","Paloma Campos");
INSERT INTO pagamentos VALUES("8","789.999.999-99","600.00","111.111.111-11","2021-05-31","Advgo");
INSERT INTO pagamentos VALUES("9","444.444.444-44","800.00","111.111.111-11","2021-05-31","Paloma Campos");
INSERT INTO pagamentos VALUES("10","111.111.111-11","600.00","000.000.000-00","2021-05-31","Tesoureiro");
INSERT INTO pagamentos VALUES("11","000.000.000-10","200.00","000.000.000-00","2021-05-31","Advogado Teste");


DROP TABLE IF EXISTS pagar;

CREATE TABLE `pagar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `pagamento` date DEFAULT NULL,
  `pago` varchar(5) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO pagar VALUES("1","Conta de Luz","560.00","2020-04-29","2020-04-29","Sim","444.444.444-44","curso-de-sistema-de-controle-de-cobrancas.jpeg");
INSERT INTO pagar VALUES("3","Conta de Água","350.00","2020-04-29",NULL,"Não","444.444.444-44","sem-foto.png");
INSERT INTO pagar VALUES("4","Pagamento Eletrecista","450.00","2020-04-29",NULL,"Não","444.444.444-44","sem-foto.png");
INSERT INTO pagar VALUES("5","Conta de Telefone","890.00","2020-04-29",NULL,"Não","111.111.111-11","conta3.jpg");
INSERT INTO pagar VALUES("6","Conta de Água","690.00","2020-04-30","2020-04-30","Sim","111.111.111-11","conta3.jpg");
INSERT INTO pagar VALUES("7","Conta de Luz","980.00","2020-04-30",NULL,"Não","444.444.444-44","sem-foto.png");
INSERT INTO pagar VALUES("8","Conta de Água","590.00","2020-04-30",NULL,"Não","444.444.444-44","sem-foto.png");
INSERT INTO pagar VALUES("9","Eletrecista","550.00","2020-04-30",NULL,"Não","444.444.444-44","sem-foto.png");
INSERT INTO pagar VALUES("10","Compra de Cadeiras","890.00","2020-04-30",NULL,"Não","444.444.444-44","sem-foto.png");
INSERT INTO pagar VALUES("12","Conta de Luz","1400.00","2020-05-04",NULL,"Não","444.444.444-44","sem-foto.png");
INSERT INTO pagar VALUES("13","Conta de Luz","680.00","2020-05-05",NULL,"NÃ£o","444.444.444-44","sem-foto.png");
INSERT INTO pagar VALUES("14","Conta de Ãgua","890.00","2020-05-05",NULL,"NÃ£o","444.444.444-44","sem-foto.png");
INSERT INTO pagar VALUES("15","Conta de Luz","500.00","2021-05-31",NULL,"Não","111.111.111-11","man-in-tweed-suit-with-barett-4386ld.png");
INSERT INTO pagar VALUES("16","aaaa","30.99","2021-05-31","2021-05-31","Sim","111.111.111-11","HISTÓRIA 3º ATIV SEM 20.pdf");
INSERT INTO pagar VALUES("17","cxsdfsd","50.00","2021-05-31","2021-05-31","Sim","000.000.000-00","guia (1).pdf");
INSERT INTO pagar VALUES("18","fdafdasfa","50.00","2021-05-31",NULL,"Não","000.000.000-00","sem-foto.png");


DROP TABLE IF EXISTS peticoes;

CREATE TABLE `peticoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `acao` varchar(50) DEFAULT NULL,
  `processo` varchar(35) DEFAULT NULL,
  `agravante` varchar(35) DEFAULT NULL,
  `agravado` varchar(35) DEFAULT NULL,
  `texto` varchar(1500) DEFAULT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO peticoes VALUES("1","PetiÃ§Ã£o Criminal","Criminal","8888888-88.8888.888.8888","Marcio Silva","Silverio Campos","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","2020-05-05");
INSERT INTO peticoes VALUES("3","zzzzzzzaaa","ccccccccc","8795689-78.7878.788.5558","ccccccccccc","ccccccccc","ccccccccc","2020-05-05");
INSERT INTO peticoes VALUES("4","PetiÃ§Ã£o Inicial CÃ­vil","Civil","7878999-99.9999.999.9999","Pedro Campos Souza","Marcos Pedro Silva","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","2020-05-05");
INSERT INTO peticoes VALUES("5","Titulo da Petição","Criminal","1545021-55.4545.454.5548","Agravante informação","Agravado","Texto da Petição","2021-05-31");


DROP TABLE IF EXISTS processados;

CREATE TABLE `processados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `advogado` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `obs` varchar(350) NOT NULL,
  `tipo_pessoa` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO processados VALUES("1","Paola Silva","444.445.566-66","(55) 55555-5555","paola@hotmail.com","Rua 5","000.000.000-10","2020-04-28","Nenhuma","Pessoa Física");
INSERT INTO processados VALUES("2","Empreza Z","44.444.444/4444-44","(66) 66666-6666","emprezaz@hotmail.com","Rua 5","000.000.000-10","2020-04-28","Nenhuma","Pessoa Jurídica");
INSERT INTO processados VALUES("3","Fabricio Silva","655.456.554-55","(66) 26545-5545","fabricioss@hotmail.com","Rua Almeida Campos 150","777.777.777-77","2021-05-31","FFFFFFFFFFFFFFFFFFF","Pessoa Física");
INSERT INTO processados VALUES("5","Marcia Santos","255.514.545-55","(54) 54545-4545",NULL,NULL,"777.777.777-77","2021-05-31",NULL,"Pessoa Física");
INSERT INTO processados VALUES("6","fulano","04.040.404/0404-04","(85) 33333-3333","alana@hotmail.com","contraria","789.999.999-99","2023-07-21",NULL,"Pessoa Jurídica");


DROP TABLE IF EXISTS processos;

CREATE TABLE `processos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `obs` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO processos VALUES("1","5555555-55.5555.555.5555","2","3","000.000.000-10","11.212.122/2121-23","444.445.566-66","2021-05-31","20:12:00","2020-04-28","2020-04-28","Andamento","Pessoa Física","10",NULL);
INSERT INTO processos VALUES("2","2222222-22.2222.222.2229","2","3","000.000.000-10","112.332.556-66","444.445.566-66","2020-04-29","10:30:00","0000-00-00","2020-04-28","Cancelado","Pessoa Física","3",NULL);
INSERT INTO processos VALUES("3","7878999-99.9999.999.9999","2","2","000.000.000-10","111.111.111-11","44.444.444/4444-44","2020-05-04","11:10:00","2020-05-05","2020-04-28","ConcluÃ­do","Pessoa Jurídica","4",NULL);
INSERT INTO processos VALUES("4","8795689-78.7878.788.5558","2","3","000.000.000-10","111.111.111-11","44.444.444/4444-44","2021-05-31","11:30:00","2020-05-05","2020-04-28","Andamento","Pessoa Jurídica","7","Esta é a observação do Processo xxxx Esta é a observação do Processo xxxx Esta é a observação do Processo xxxx Esta é a observação do Processo xxxx ");
INSERT INTO processos VALUES("5","8888888-88.8888.888.8888","1","1","000.000.000-10","888.888.888-88","444.445.566-66","2021-05-31","10:30:00","2020-05-05","2020-05-05","Aberto","Pessoa FÃ­sica","3","Documentos despachados para o FÃ³run, aguardando anÃ¡lise.");
INSERT INTO processos VALUES("6","1545021-55.4545.454.5548","1","1","777.777.777-77","545.455.554-55","655.456.554-55","2021-06-01","11:15:00","2021-05-31","2021-05-31","Aberto","Pessoa Física","6",NULL);
INSERT INTO processos VALUES("7",NULL,"1","1","000.000.000-10","888.888.888-88","44.444.444/4444-44",NULL,NULL,"0000-00-00","2023-07-17","Concluído","Pessoa Jurídica",NULL,NULL);
INSERT INTO processos VALUES("8","0101010-10.1010.101.0101","1","1","789.999.999-99","025.396.193-98","04.040.404/0404-04","2023-07-27","10:00:00",NULL,"2023-07-21","Aberto","Pessoa Jurídica","1",NULL);


DROP TABLE IF EXISTS receber;

CREATE TABLE `receber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(35) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `advogado` varchar(20) NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `pago` varchar(5) NOT NULL,
  `processo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO receber VALUES("2","Custas Iniciais","1800.00","000.000.000-10","111.111.111-11","2020-04-29","sim","3");
INSERT INTO receber VALUES("3","Custas Iniciais","1450.00","000.000.000-10","112.332.556-66","2020-04-29","sim","2");
INSERT INTO receber VALUES("4","Custas Iniciais","1900.00","000.000.000-10","111.111.111-11","2020-04-30","sim","3");
INSERT INTO receber VALUES("5","Custas Iniciais","2500.00","000.000.000-10","111.111.111-11","2020-04-30","sim","4");
INSERT INTO receber VALUES("6","Custas de Documentos","1500.00","000.000.000-10","111.111.111-11","2020-05-04","nao","4");
INSERT INTO receber VALUES("7","Custas Iniciais","1600.00","000.000.000-10","888.888.888-88","2020-05-05","nao","5");
INSERT INTO receber VALUES("8","Valor Inicial","1000.00","777.777.777-77","545.455.554-55","2021-05-31","sim","6");
INSERT INTO receber VALUES("9","Teste","50.00","777.777.777-77","545.455.554-55","2021-05-31","nao","6");
INSERT INTO receber VALUES("10",NULL,"19.77","000.000.000-10","888.888.888-88","2023-07-17","sim","7");
INSERT INTO receber VALUES("11","Honorários","100.00","000.000.000-10","888.888.888-88","2023-07-17","sim","7");
INSERT INTO receber VALUES("12",NULL,"0.00","000.000.000-10","888.888.888-88","2023-07-17","sim","7");


DROP TABLE IF EXISTS tarefas;

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `hora` time DEFAULT NULL,
  `advogado` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

INSERT INTO tarefas VALUES("1","Reunião com Cliente","Marcos Paulo","2020-04-27","16:30:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("7","Encontar com Cliente","Empresa SysMedical","2020-04-27","15:30:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("8","Ir ao Fórum","Verificar Papelada","2020-04-27","16:50:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("9","Almoço com Cliente","Marta Silva","2020-04-27","12:30:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("10","Teste","aaaaa","2020-04-29","12:00:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("11","Reunião com Cliente","Marcos Paulo","2020-04-28","10:30:00","000.000.000-10","Concluida");
INSERT INTO tarefas VALUES("12","Almoço com Cliente","Marcia Correa","2020-04-28","12:30:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("13","Visita a Empresa X","Fechamento de Contrato","2020-04-28","17:20:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("14","Ir ao Fórum","Atraso nos documentos","2020-04-28","15:30:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("15","Reunião com Cliente","Marcos Paulo","2020-04-30","10:30:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("16","Almoço com Cliente","Marcos Paulo","2020-04-30","12:30:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("17","Ir ao Fórum","Fórun Lafaeite","2020-04-30","13:30:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("18","ReuniÃ£o com Cliente","AlmoÃ§o na casa do cliente","2020-05-05","12:30:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("19","Ir ao FÃ³rum","Levar Documentos","2020-05-05","20:30:00","000.000.000-10","Agendada");
INSERT INTO tarefas VALUES("20","Audiência João","Audiencia no fórum XX","2021-05-31","20:00:00","777.777.777-77","Agendada");
INSERT INTO tarefas VALUES("21","Tarefa Teste","Descrição da Tarefa","2021-05-31","16:00:00","777.777.777-77","Agendada");
INSERT INTO tarefas VALUES("24","Audiência","Audiência XXX","2021-06-01","11:15:00","777.777.777-77","Agendada");
INSERT INTO tarefas VALUES("25","Reunião","Reunião com todos os advogados.","2023-07-17","18:44:00","000.000.000-10","Concluida");
INSERT INTO tarefas VALUES("26","asdasdasd","asdasdasd","2023-07-18","00:00:00","000.000.000-10","Concluida");
INSERT INTO tarefas VALUES("27","Prazo para Contrarrazões","Prazo fatal para contrarrazoar o processo 0000000-","2023-07-27","10:00:00","789.999.999-99","Agendada");
INSERT INTO tarefas VALUES("28","Audiência","audiencia inicial","2023-07-27","10:00:00","789.999.999-99","Agendada");


DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `usuario` varchar(35) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `senha_original` varchar(20) NOT NULL,
  `nivel` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES("14","Advogado Teste","000.000.000-10","advogado@hotmail.com","202cb962ac59075b964b07152d234b70","123","Advogado");
INSERT INTO usuarios VALUES("16","Pedro Freitas","777.777.777-77","pedro@hotmail.com","202cb962ac59075b964b07152d234b70","123","Advogado");
INSERT INTO usuarios VALUES("17","Advgo","789.999.999-99","adva@hotmail.com","202cb962ac59075b964b07152d234b70","123","Advogado");
INSERT INTO usuarios VALUES("18","Marcos Souza","111.111.111-11","marcos@gmail.com","202cb962ac59075b964b07152d234b70","123","Cliente");
INSERT INTO usuarios VALUES("20","Matheus Campos","112.332.556-66","mateus@hotmail.com","ad8df87f9d73022bc9a5d95e3539bcda","11233255666","Cliente");
INSERT INTO usuarios VALUES("21","Empresa X","11.212.122/2121-23","empresa@hotmail.com","149f0f9c61a9a38e352f05eeb2f03a48","11212122212123","Cliente");
INSERT INTO usuarios VALUES("26","Tesoureiro","111.111.111-11","tesoureiro@hotmail.com","202cb962ac59075b964b07152d234b70","123","Tesoureiro");
INSERT INTO usuarios VALUES("27","Paloma Campos","444.444.444-44","paloma@hotmail.com","202cb962ac59075b964b07152d234b70","123","Recepcionista");
INSERT INTO usuarios VALUES("29","Hugo Vasconcelos","888.888.888-88","hugovasconcelosf@hotmail.com","202cb962ac59075b964b07152d234b70","123","Cliente");
INSERT INTO usuarios VALUES("30","aaaaaaaaaaa","565.544.545-45","aaasss@hugocursos.com.br","27e2ca2d011c975e9950b282ca1db4a9","56554454545","Advogado");
INSERT INTO usuarios VALUES("32","Advogado Teste 2","455.484.851-54","adv@hotmail.com","e56f2e604ab001031c08fdbb1283ed4d","45548485154","Advogado");
INSERT INTO usuarios VALUES("34","Administrador","000.000.000-00","hvfadvocacia@gmail.com","202cb962ac59075b964b07152d234b70","123","admin");
INSERT INTO usuarios VALUES("35","Marta Silva","545.455.554-55","marta@hotmail.com","202cb962ac59075b964b07152d234b70","123","Cliente");
INSERT INTO usuarios VALUES("36","davi matos","025.396.193-98","davibmatos@gmail.com","cf6ee57b4f9df76773acf2222b72d391","02539619398","Cliente");


DROP TABLE IF EXISTS varas;

CREATE TABLE `varas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO varas VALUES("1","Vara 1");
INSERT INTO varas VALUES("2","Vara 2");
INSERT INTO varas VALUES("3","Vara 3");


