DROP TABLE IF EXISTS advogados;

CREATE TABLE `advogados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `especialidade` varchar(35) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO advogados VALUES("9","Advogado Teste","000.000.000-10","(00) 00000-0000","advogado@hotmail.com","Familiar","hugo-profile.jpeg");
INSERT INTO advogados VALUES("10","Pedro Freitas","777.777.777-77","(77) 77777-7777","pedro@hotmail.com","Criminal","01.jpg");
INSERT INTO advogados VALUES("12","Advgo","789.999.999-99","(33) 33333-3333","adva@hotmail.com",NULL,NULL);


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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO audiencias VALUES("4","2222222-22.2222.222.2229","Audiência X","2020-04-30","10:45:00","Rua A","789.999.999-99","111.111.111-11",NULL);
INSERT INTO audiencias VALUES("6","5555555-55.5555.555.5555","Audiencia","2020-04-30","15:15:00","teste","000.000.000-10","11.212.122/2121-23","Na audiência ficou definido que .....");
INSERT INTO audiencias VALUES("7","2222222-22.2222.222.2229","Audiencia Teste2","2020-04-29","10:30:00","Teste2","000.000.000-10","112.332.556-66",NULL);
INSERT INTO audiencias VALUES("11","5555555-55.5555.555.5555","Teste Adiencia","2020-05-07","11:50:00","Local Teset","000.000.000-10","11.212.122/2121-23",NULL);
INSERT INTO audiencias VALUES("12","5555555-55.5555.555.5555","Audiencia de Conciliação","2020-04-30","12:30:00","Forun Lafaiete","000.000.000-10","11.212.122/2121-23",NULL);
INSERT INTO audiencias VALUES("13","7878999-99.9999.999.9999","Audiencia Inicial","2020-05-04","13:50:00","Fórum XX","000.000.000-10","111.111.111-11","Ficou decidido nessa audiencia ....");
INSERT INTO audiencias VALUES("14","8795689-78.7878.788.5558","Audiencia Teste2","2020-05-04","16:30:00","Teste","000.000.000-10","111.111.111-11",NULL);
INSERT INTO audiencias VALUES("15","7878999-99.9999.999.9999","Testee","2020-05-04","11:10:00","testee","000.000.000-10","111.111.111-11",NULL);
INSERT INTO audiencias VALUES("16","8795689-78.7878.788.5558","Audiencia de Conciliação","2020-05-04","21:30:00","Fórun X","000.000.000-10","111.111.111-11",NULL);
INSERT INTO audiencias VALUES("17","8795689-78.7878.788.5558","Audiencia Teste","2020-05-04","15:30:00","Local da Audiencia","000.000.000-10","111.111.111-11",NULL);


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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO clientes VALUES("1","Marcos Souza","111.111.111-11","(22) 22222-2222","marcos@gmail.com","Rua A","000.000.000-10","2020-04-27","Rua A","Pessoa Jurídica");
INSERT INTO clientes VALUES("3","Matheus Campos","112.332.556-66","(66) 66666-6666","mateus@hotmail.com","Rua 5","000.000.000-10","2020-04-28","aa","Pessoa Física");
INSERT INTO clientes VALUES("4","Empresa X","11.212.122/2121-23","(33) 33333-3333","empresa@hotmail.com","Rua A","000.000.000-10","2020-04-28","AAAAA","Pessoa Jurídica");


DROP TABLE IF EXISTS documentos;

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `processo` varchar(30) NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO documentos VALUES("1","Identidade","2020-05-04","8795689-78.7878.788.5558","SITE + SISTEMA + APP.jpg");


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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO funcionarios VALUES("20","Advogado Teste","000.000.000-10","(00) 00000-0000","advogado@hotmail.com","Advogado");
INSERT INTO funcionarios VALUES("22","Pedro Freitas","777.777.777-77","(77) 77777-7777","pedro@hotmail.com","Advogado");
INSERT INTO funcionarios VALUES("24","Advgo","789.999.999-99","(33) 33333-3333","adva@hotmail.com","Advogado");
INSERT INTO funcionarios VALUES("25","Tesoureiro","111.111.111-11","(11) 11111-1111","tesoureiro@hotmail.c","Tesoureiro");
INSERT INTO funcionarios VALUES("27","Paloma Campos","444.444.444-44","(22) 22222-2222","paloma@hotmail.com","Recepcionista");


DROP TABLE IF EXISTS historico;

CREATE TABLE `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `obs` varchar(350) DEFAULT NULL,
  `data` date NOT NULL,
  `processo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO historico VALUES("2","Entrega de Documentos","Foram Entregados documentos que estavam pendentes para ....","2020-05-04","8795689-78.7878.788.5558");
INSERT INTO historico VALUES("4","Movimentação Dois","Segunda movimentação para o processo","2020-05-13","8795689-78.7878.788.5558");


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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

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


DROP TABLE IF EXISTS pagamentos;

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario` varchar(20) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `nome_funcionario` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO pagamentos VALUES("1","000.000.000-10","2500.00","444.444.444-44","2020-04-29","Advogado Teste");
INSERT INTO pagamentos VALUES("3","444.444.444-44","850.00","444.444.444-44","2020-04-29","Paloma Campos");
INSERT INTO pagamentos VALUES("4","444.444.444-44","680.00","444.444.444-44","2020-04-30","Paloma Campos");
INSERT INTO pagamentos VALUES("5","111.111.111-11","1600.00","111.111.111-11","2020-04-30","Tesoureiro");
INSERT INTO pagamentos VALUES("6","789.999.999-99","1800.00","444.444.444-44","2020-05-04","Advgo");


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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO processados VALUES("1","Paola Silva","444.445.566-66","(55) 55555-5555","paola@hotmail.com","Rua 5","000.000.000-10","2020-04-28","Nenhuma","Pessoa Física");
INSERT INTO processados VALUES("2","Empreza Z","44.444.444/4444-44","(66) 66666-6666","emprezaz@hotmail.com","Rua 5","000.000.000-10","2020-04-28","Nenhuma","Pessoa Jurídica");


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO processos VALUES("1","5555555-55.5555.555.5555","2","3","000.000.000-10","11.212.122/2121-23","444.445.566-66","2020-04-30","12:30:00","2020-04-28","2020-04-28","Andamento","Pessoa Física","9",NULL);
INSERT INTO processos VALUES("2","2222222-22.2222.222.2229","2","3","000.000.000-10","112.332.556-66","444.445.566-66","2020-04-29","10:30:00","0000-00-00","2020-04-28","Cancelado","Pessoa Física","3",NULL);
INSERT INTO processos VALUES("3","7878999-99.9999.999.9999","2","2","000.000.000-10","111.111.111-11","44.444.444/4444-44","2020-05-04","11:10:00","2020-04-28","2020-04-28","Concluído","Pessoa Jurídica","4",NULL);
INSERT INTO processos VALUES("4","8795689-78.7878.788.5558","2","3","000.000.000-10","111.111.111-11","44.444.444/4444-44","2020-05-04","15:30:00","2020-04-28","2020-04-28","Concluído","Pessoa Jurídica","5","Esta é a observação do Processo xxxx Esta é a observação do Processo xxxx Esta é a observação do Processo xxxx Esta é a observação do Processo xxxx ");


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO receber VALUES("2","Custas Iniciais","1800.00","000.000.000-10","111.111.111-11","2020-04-29","sim","3");
INSERT INTO receber VALUES("3","Custas Iniciais","1450.00","000.000.000-10","112.332.556-66","2020-04-29","sim","2");
INSERT INTO receber VALUES("4","Custas Iniciais","1900.00","000.000.000-10","111.111.111-11","2020-04-30","sim","3");
INSERT INTO receber VALUES("5","Custas Iniciais","2500.00","000.000.000-10","111.111.111-11","2020-04-30","sim","4");
INSERT INTO receber VALUES("6","Custas de Documentos","1500.00","000.000.000-10","111.111.111-11","2020-05-04","nao","4");


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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

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
INSERT INTO tarefas VALUES("18","Reunião com Cliente","Almoço na casa do cliente","2020-05-05","12:30:00","000.000.000-10","Agendada");


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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES("2","Administrador","000.000.000-00","hvfadvocacia@gmail.com","202cb962ac59075b964b07152d234b70","123","admin");
INSERT INTO usuarios VALUES("14","Advogado Teste","000.000.000-10","advogado@hotmail.com","202cb962ac59075b964b07152d234b70","123","Advogado");
INSERT INTO usuarios VALUES("16","Pedro Freitas","777.777.777-77","pedro@hotmail.com","202cb962ac59075b964b07152d234b70","123","Advogado");
INSERT INTO usuarios VALUES("17","Advgo","789.999.999-99","adva@hotmail.com","2c1d9c8c25c80e32c28a0aaba49fdfc5","78999999999","Advogado");
INSERT INTO usuarios VALUES("18","Marcos Souza","111.111.111-11","marcos@gmail.com","202cb962ac59075b964b07152d234b70","123","Cliente");
INSERT INTO usuarios VALUES("20","Matheus Campos","112.332.556-66","mateus@hotmail.com","ad8df87f9d73022bc9a5d95e3539bcda","11233255666","Cliente");
INSERT INTO usuarios VALUES("21","Empresa X","11.212.122/2121-23","empresa@hotmail.com","149f0f9c61a9a38e352f05eeb2f03a48","11212122212123","Cliente");
INSERT INTO usuarios VALUES("26","Tesoureiro","111.111.111-11","tesoureiro@hotmail.com","202cb962ac59075b964b07152d234b70","123","Tesoureiro");
INSERT INTO usuarios VALUES("27","Paloma Campos","444.444.444-44","paloma@hotmail.com","202cb962ac59075b964b07152d234b70","123","Recepcionista");


DROP TABLE IF EXISTS varas;

CREATE TABLE `varas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO varas VALUES("1","Vara 1");
INSERT INTO varas VALUES("2","Vara 2");
INSERT INTO varas VALUES("3","Vara 3");


