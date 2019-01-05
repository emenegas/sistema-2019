#
# TABLE STRUCTURE FOR: agricultores
#

DROP TABLE IF EXISTS `agricultores`;

CREATE TABLE `agricultores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `uf` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `dapNumero` varchar(45) DEFAULT NULL,
  `dapValidade` date DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'ativo',
  `dapLimite` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `agricultores` (`id`, `nome`, `cpf`, `telefone`, `email`, `uf`, `cep`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`) VALUES (1, 'ADAIR JOSE RONSONI', '284.474.040-56', '54999558877', 'adair@gmail.com', 'rs', '99732001', 'erechim', 'rua louro martes', 'RS43070050301195900001739', '2018-11-24', 'ativo', '192');
INSERT INTO `agricultores` (`id`, `nome`, `cpf`, `telefone`, `email`, `uf`, `cep`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`) VALUES (2, 'ZUMILDA ANA BONATTO', '372.623.290-73', '54992141578', 'zbonatto@yahoo.com', 'rs', '99660555', 'erechim', 'rua sergipe', 'RS43070050301195900001067', '2018-11-15', 'ativo', '0');
INSERT INTO `agricultores` (`id`, `nome`, `cpf`, `telefone`, `email`, `uf`, `cep`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`) VALUES (3, 'CELSO ANTONIO FERRARI', '699.820.240-78', '54992356545', 'celso@hotmail.com', 'rs', '99774225', 'erechim', 'av salgado filho, 85 centro', 'RS43070050801093000001615', '2019-01-18', 'ativo', '0');
INSERT INTO `agricultores` (`id`, `nome`, `cpf`, `telefone`, `email`, `uf`, `cep`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`) VALUES (4, 'Bruna Alessandra Fiorentin', '244.007.320-29', '54995778222', 'brunafior@gmail.com', 'rs', '99887722', 'erechim', 'lot Marques rua 4', 'SDW0033769550420912160905', '2018-11-09', 'ativo', NULL);
INSERT INTO `agricultores` (`id`, `nome`, `cpf`, `telefone`, `email`, `uf`, `cep`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`) VALUES (5, 'BRUNO KRIGER', '837.208.530-71', '5433225566', 'bruno@gmail.com', 'rs', '99660555', 'jacutinga', 'av principal 34', 'RS43070050301195900002365', '2018-11-24', 'ativo', '0');


#
# TABLE STRUCTURE FOR: agricultores_has_cooperativas
#

DROP TABLE IF EXISTS `agricultores_has_cooperativas`;

CREATE TABLE `agricultores_has_cooperativas` (
  `agricultor` int(11) NOT NULL,
  `cooperativa` int(11) NOT NULL,
  PRIMARY KEY (`agricultor`,`cooperativa`),
  KEY `fk_agricultores_has_cooperativas_cooperativas1_idx` (`cooperativa`),
  KEY `fk_agricultores_has_cooperativas_agricultores1_idx` (`agricultor`),
  CONSTRAINT `fk_agricultores_has_cooperativas_agricultores1` FOREIGN KEY (`agricultor`) REFERENCES `agricultores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_agricultores_has_cooperativas_cooperativas1` FOREIGN KEY (`cooperativa`) REFERENCES `cooperativas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `agricultores_has_cooperativas` (`agricultor`, `cooperativa`) VALUES (1, 1);
INSERT INTO `agricultores_has_cooperativas` (`agricultor`, `cooperativa`) VALUES (2, 1);
INSERT INTO `agricultores_has_cooperativas` (`agricultor`, `cooperativa`) VALUES (3, 2);
INSERT INTO `agricultores_has_cooperativas` (`agricultor`, `cooperativa`) VALUES (4, 1);
INSERT INTO `agricultores_has_cooperativas` (`agricultor`, `cooperativa`) VALUES (5, 1);


#
# TABLE STRUCTURE FOR: agricultores_has_produtos
#

DROP TABLE IF EXISTS `agricultores_has_produtos`;

CREATE TABLE `agricultores_has_produtos` (
  `agricultor` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  PRIMARY KEY (`agricultor`,`produto`),
  KEY `fk_agricultores_has_produtos_produtos1_idx` (`produto`),
  KEY `fk_agricultores_has_produtos_agricultores1_idx` (`agricultor`),
  CONSTRAINT `fk_agricultores_has_produtos_agricultores1` FOREIGN KEY (`agricultor`) REFERENCES `agricultores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_agricultores_has_produtos_produtos1` FOREIGN KEY (`produto`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `agricultores_has_produtos` (`agricultor`, `produto`) VALUES (1, 2);
INSERT INTO `agricultores_has_produtos` (`agricultor`, `produto`) VALUES (1, 3);
INSERT INTO `agricultores_has_produtos` (`agricultor`, `produto`) VALUES (2, 1);
INSERT INTO `agricultores_has_produtos` (`agricultor`, `produto`) VALUES (2, 2);
INSERT INTO `agricultores_has_produtos` (`agricultor`, `produto`) VALUES (3, 1);
INSERT INTO `agricultores_has_produtos` (`agricultor`, `produto`) VALUES (3, 2);
INSERT INTO `agricultores_has_produtos` (`agricultor`, `produto`) VALUES (3, 3);
INSERT INTO `agricultores_has_produtos` (`agricultor`, `produto`) VALUES (4, 1);
INSERT INTO `agricultores_has_produtos` (`agricultor`, `produto`) VALUES (5, 2);
INSERT INTO `agricultores_has_produtos` (`agricultor`, `produto`) VALUES (5, 3);


#
# TABLE STRUCTURE FOR: cooperativas
#

DROP TABLE IF EXISTS `cooperativas`;

CREATE TABLE `cooperativas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFantasia` varchar(250) NOT NULL,
  `responsavel` int(11) DEFAULT NULL,
  `cnpj` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cooperativa` int(11) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `banco` varchar(15) DEFAULT NULL,
  `agencia` varchar(7) DEFAULT NULL,
  `numeroContaCorrente` varchar(10) DEFAULT NULL,
  `cep` varchar(45) NOT NULL,
  `uf` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `dapNumero` varchar(45) NOT NULL,
  `dapValidade` date NOT NULL,
  `status` varchar(45) DEFAULT 'ativo',
  `dapLimite` double DEFAULT NULL,
  `caracteristicasCoop` text,
  PRIMARY KEY (`id`),
  KEY `fk_cooperativas_cooperativas1_idx` (`cooperativa`),
  CONSTRAINT `fk_cooperativas_cooperativas1` FOREIGN KEY (`cooperativa`) REFERENCES `cooperativas` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `cooperativas` (`id`, `nomeFantasia`, `responsavel`, `cnpj`, `telefone`, `cooperativa`, `email`, `banco`, `agencia`, `numeroContaCorrente`, `cep`, `uf`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`, `caracteristicasCoop`) VALUES (1, 'COOPERATIVA DOS AGRICULTORES FAMILIARES ECOLOGISTAS SOLIDARIOS', 1, '67.160.900/0001-77', '5433215566', 2, 'ecologistas@outlook.com', 'Caixa Federal', '0245', '5645-5', '99704520', 'rs', 'erechim', 'Rua santos dumont', 'SDW0596368800012411140957', '2018-11-16', 'ativo', NULL, 'A Cooperativa de Produção e consumo Familiar COOPERATIVA DOS AGRICULTORES FAMILIARES ECOLOGISTAS SOLIDARIOS vem desenvolvendo trabalhos na área de comercialização e entrega de produtos de agricultura familiar desde 2001, coloca a disposição para a realização das entregas caminhão furgão/VUC.');
INSERT INTO `cooperativas` (`id`, `nomeFantasia`, `responsavel`, `cnpj`, `telefone`, `cooperativa`, `email`, `banco`, `agencia`, `numeroContaCorrente`, `cep`, `uf`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`, `caracteristicasCoop`) VALUES (2, 'COOPERATIVA DE PRODUÇÃO E CONSUMO FAMILIAR NOSSA TERRA Ltda', 2, '61.212.778/0001-59', '5433212135', NULL, 'marcelo@coopnossaterra.com', 'Itau', '1232', '5243-5', '99700554', 'rs', 'erechim', 'rua joão pessoa, 174- Fátima', 'SDW0504708600012708180531', '2018-11-23', 'ativo', NULL, NULL);
INSERT INTO `cooperativas` (`id`, `nomeFantasia`, `responsavel`, `cnpj`, `telefone`, `cooperativa`, `email`, `banco`, `agencia`, `numeroContaCorrente`, `cep`, `uf`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`, `caracteristicasCoop`) VALUES (3, 'AGRICOOP COOPERATIVA CENTRAL AGROFAMILIAR', 1, '08.011.039/0001-16', '5433216565', 2, 'mateus@agricoop.com.br', 'Banrisul', '2342', '5642-7', '99703456', 'rs', 'erechim', 'rua miguel moysin, 300 - atlântico', 'SDW7232798400012908180124', '2019-01-26', 'ativo', NULL, NULL);
INSERT INTO `cooperativas` (`id`, `nomeFantasia`, `responsavel`, `cnpj`, `telefone`, `cooperativa`, `email`, `banco`, `agencia`, `numeroContaCorrente`, `cep`, `uf`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`, `caracteristicasCoop`) VALUES (4, 'COOPERATIVA DOS PRODUTORES RURAIS DO ALTO URUGUAI LTDA', 1, '85.696.707/0001-37', '5433219874', 2, 'janaina@coop.com.br', 'Caixa Federal', '2587', '1123-5', '99660000', 'rs', 'campinas do sul', 'rua santos dumont', 'SDW7232798400012908180124', '2018-11-23', 'ativo', NULL, NULL);
INSERT INTO `cooperativas` (`id`, `nomeFantasia`, `responsavel`, `cnpj`, `telefone`, `cooperativa`, `email`, `banco`, `agencia`, `numeroContaCorrente`, `cep`, `uf`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`, `caracteristicasCoop`) VALUES (5, 'Associação dos Produtores da Feira Central do Produtor de Erechim', 1, '54.784.889/0001-74', '5433216665', 2, 'miranda@assoc.com.br', 'Bradesco', '4234', '4324-0', '99774213', 'rs', 'erechim', 'rua marista, 155 - centro', 'SDW2107291800012001160729', '2019-03-22', 'ativo', NULL, NULL);


#
# TABLE STRUCTURE FOR: entidadesexecutoras
#

DROP TABLE IF EXISTS `entidadesexecutoras`;

CREATE TABLE `entidadesexecutoras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFantasia` varchar(250) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `telefone` varchar(250) NOT NULL,
  `representante` varchar(40) NOT NULL,
  `cpfRepresentante` varchar(30) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `uf` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `status` varchar(45) DEFAULT 'ativo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `entidadesexecutoras` (`id`, `nomeFantasia`, `email`, `cnpj`, `telefone`, `representante`, `cpfRepresentante`, `cep`, `uf`, `cidade`, `endereco`, `status`) VALUES (1, 'PREFEITURA MUNICIPAL DE ITAQUI', 'jarbas@prefeitura.com.br', '88120662000146', '5433662125', 'Jarbas da Silva Martini', '13063197068', '99788002', 'RS', 'erechim', 'rua bento gonçalves', 'ativo');


#
# TABLE STRUCTURE FOR: funcionarios
#

DROP TABLE IF EXISTS `funcionarios`;

CREATE TABLE `funcionarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `uf` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `senha` varchar(250) NOT NULL,
  `cooperativa` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'ativo',
  PRIMARY KEY (`id`),
  KEY `fk_funcionarios_cooperativas1_idx` (`cooperativa`),
  CONSTRAINT `fk_funcionarios_cooperativas1` FOREIGN KEY (`cooperativa`) REFERENCES `cooperativas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `email`, `telefone`, `cep`, `uf`, `cidade`, `endereco`, `senha`, `cooperativa`, `status`) VALUES (1, 'Ezequiel menegas', '03024875069', 'ezequielmenegas@outlook.com', '54991287278', '99700080', 'rs', 'erechim', 'av salgado filho', '$2y$10$WnKFcu3cMpXqy5C/jzQ.i.vFV8Ns7zxjxNer8KIxHdSQsZrLDMqjW', NULL, 'ativo');
INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `email`, `telefone`, `cep`, `uf`, `cidade`, `endereco`, `senha`, `cooperativa`, `status`) VALUES (2, 'Aldemir Gaiardo', '345.841.040-69', 'Aldemir@gmail.com', '54986545254', '99700900', 'rs', 'erechim', 'ruao joão mendes', '$2y$10$XL7tEtJZBTfVezH0K3nbyOEvk10fNt4UVDdAWmQ04TgVCaaaNZUem', 1, 'ativo');


#
# TABLE STRUCTURE FOR: itens_do_projeto
#

DROP TABLE IF EXISTS `itens_do_projeto`;

CREATE TABLE `itens_do_projeto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projeto` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `nomeProduto` varchar(45) NOT NULL,
  `agricultor` int(11) DEFAULT NULL,
  `dapAgricultor` varchar(45) DEFAULT NULL,
  `unidadeMedida` varchar(45) NOT NULL,
  `quantidade` varchar(45) NOT NULL,
  `precoUnidade` decimal(10,2) NOT NULL,
  `totalItem` decimal(10,2) NOT NULL,
  `nomeAgricultor` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `data` datetime NOT NULL,
  `descricaoProd` varchar(250) DEFAULT 'PRODUTO - TIPO 1. ISENTO DE MATERIAS ESTRANHAS, IMPUREZAS, INSETOS VIVOS OU MORTOS, EMBRALAGEM DE POLIETILENO TRANSPARENTE, ATÓXICO, DE 1KG, ROTULAGEM DE ACORDO COM AS NORMAS DA ANVISA, VALIDADE DE 12 MESES A PARTIR DA DATA DE ENTREGA.',
  `cronogramaEntregaProd` varchar(250) DEFAULT 'Os produtos de periodicidade semestral deverão ser entregues no almoxarifado da Secretaria de Educação, de acordo com os pedidos realizados pela Secretaria.',
  PRIMARY KEY (`id`),
  KEY `fk_projetos_has_produtos_produtos1_idx` (`produto`),
  KEY `fk_projetos_has_produtos_projetos1_idx` (`projeto`),
  KEY `fk_itens_do_projeto_agricultores1_idx` (`agricultor`),
  CONSTRAINT `fk_itens_do_projeto_agricultores1` FOREIGN KEY (`agricultor`) REFERENCES `agricultores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projetos_has_produtos_produtos1` FOREIGN KEY (`produto`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projetos_has_produtos_projetos1` FOREIGN KEY (`projeto`) REFERENCES `projetos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `itens_do_projeto` (`id`, `projeto`, `produto`, `nomeProduto`, `agricultor`, `dapAgricultor`, `unidadeMedida`, `quantidade`, `precoUnidade`, `totalItem`, `nomeAgricultor`, `cpf`, `data`, `descricaoProd`, `cronogramaEntregaProd`) VALUES (1, 1, 3, 'leite em pó integral', 3, NULL, 'Pacote 1KG', '52', '17.00', '0.00', 'CELSO ANTONIO FERRARI', '699.820.240-78', '2018-11-04 19:04:46', 'PRODUTO - TIPO 1. ISENTO DE MATERIAS ESTRANHAS, IMPUREZAS, INSETOS VIVOS OU MORTOS, EMBRALAGEM DE POLIETILENO TRANSPARENTE, ATÓXICO, DE 1KG, ROTULAGEM DE ACORDO COM AS NORMAS DA ANVISA, VALIDADE DE 12 MESES A PARTIR DA DATA DE ENTREGA', 'Os produtos de periodicidade semestral deverão ser entregues no almoxarifado da Secretaria de Educação, de acordo com os pedidos realizados pela Secretaria.');
INSERT INTO `itens_do_projeto` (`id`, `projeto`, `produto`, `nomeProduto`, `agricultor`, `dapAgricultor`, `unidadeMedida`, `quantidade`, `precoUnidade`, `totalItem`, `nomeAgricultor`, `cpf`, `data`, `descricaoProd`, `cronogramaEntregaProd`) VALUES (2, 1, 3, 'leite em pó integral', 1, NULL, 'Pacote 1KG', '45', '23.00', '0.00', 'ADAIR JOSE RONSONI', '284.474.040-56', '2018-11-04 19:05:04', 'PRODUTO - TIPO 1. ISENTO DE MATERIAS ESTRANHAS, IMPUREZAS, INSETOS VIVOS OU MORTOS, EMBRALAGEM DE POLIETILENO TRANSPARENTE, ATÓXICO, DE 1KG, ROTULAGEM DE ACORDO COM AS NORMAS DA ANVISA, VALIDADE DE 12 MESES A PARTIR DA DATA DE ENTREGA', 'Os produtos de periodicidade semestral deverão ser entregues no almoxarifado da Secretaria de Educação, de acordo com os pedidos realizados pela Secretaria.');
INSERT INTO `itens_do_projeto` (`id`, `projeto`, `produto`, `nomeProduto`, `agricultor`, `dapAgricultor`, `unidadeMedida`, `quantidade`, `precoUnidade`, `totalItem`, `nomeAgricultor`, `cpf`, `data`, `descricaoProd`, `cronogramaEntregaProd`) VALUES (3, 1, 1, 'feijão preto', 2, NULL, 'Pacote 1KG', '800', '8.00', '0.00', 'ZUMILDA ANA BONATTO', '372.623.290-73', '2018-11-04 19:05:37', 'PRODUTO - TIPO 1. ISENTO DE MATERIAS ESTRANHAS, IMPUREZAS, INSETOS VIVOS OU MORTOS, EMBRALAGEM DE POLIETILENO TRANSPARENTE, ATÓXICO, DE 1KG, ROTULAGEM DE ACORDO COM AS NORMAS DA ANVISA, VALIDADE DE 12 MESES A PARTIR DA DATA DE ENTREGA', 'Os produtos de periodicidade semestral deverão ser entregues no almoxarifado da Secretaria de Educação, de acordo com os pedidos realizados pela Secretaria.');
INSERT INTO `itens_do_projeto` (`id`, `projeto`, `produto`, `nomeProduto`, `agricultor`, `dapAgricultor`, `unidadeMedida`, `quantidade`, `precoUnidade`, `totalItem`, `nomeAgricultor`, `cpf`, `data`, `descricaoProd`, `cronogramaEntregaProd`) VALUES (5, 3, 2, 'arroz branco polido', 1, 'RS43070050301195900001739', 'Pacote 5KG', '1', '10.00', '10.00', 'ADAIR JOSE RONSONI', '284.474.040-56', '2018-11-09 20:41:13', 'PRODUTO - TIPO 1. ISENTO DE MATERIAS ESTRANHAS, IMPUREZAS, INSETOS VIVOS OU MORTOS, EMBRALAGEM DE POLIETILENO TRANSPARENTE, ATÓXICO, DE 1KG, ROTULAGEM DE ACORDO COM AS NORMAS DA ANVISA, VALIDADE DE 12 MESES A PARTIR DA DATA DE ENTREGA', 'Os produtos de periodicidade semestral deverão ser entregues no almoxarifado da Secretaria de Educação, de acordo com os pedidos realizados pela Secretaria.');
INSERT INTO `itens_do_projeto` (`id`, `projeto`, `produto`, `nomeProduto`, `agricultor`, `dapAgricultor`, `unidadeMedida`, `quantidade`, `precoUnidade`, `totalItem`, `nomeAgricultor`, `cpf`, `data`, `descricaoProd`, `cronogramaEntregaProd`) VALUES (6, 4, 3, 'leite em pó integral', 1, 'RS43070050301195900001739', 'Pacote 1KG', '4', '43.00', '172.00', 'ADAIR JOSE RONSONI', '284.474.040-56', '2018-11-09 20:41:39', 'PRODUTO - TIPO 1. ISENTO DE MATERIAS ESTRANHAS, IMPUREZAS, INSETOS VIVOS OU MORTOS, EMBRALAGEM DE POLIETILENO TRANSPARENTE, ATÓXICO, DE 1KG, ROTULAGEM DE ACORDO COM AS NORMAS DA ANVISA, VALIDADE DE 12 MESES A PARTIR DA DATA DE ENTREGA', 'Os produtos de periodicidade semestral deverão ser entregues no almoxarifado da Secretaria de Educação, de acordo com os pedidos realizados pela Secretaria.');


#
# TABLE STRUCTURE FOR: produtos
#

DROP TABLE IF EXISTS `produtos`;

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `unidadeMedida` varchar(250) DEFAULT NULL COMMENT 'kg, g, und, cx, pct',
  `tipo` varchar(50) DEFAULT NULL COMMENT 'transgenico, organico',
  `epoca` varchar(45) DEFAULT NULL COMMENT 'verão, inverno',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `produtos` (`id`, `nome`, `unidadeMedida`, `tipo`, `epoca`) VALUES (1, 'feijão preto', 'Pacote 1KG', 'N/A', 'N/A');
INSERT INTO `produtos` (`id`, `nome`, `unidadeMedida`, `tipo`, `epoca`) VALUES (2, 'arroz branco polido', 'Pacote 5KG', 'N/A', 'N/A');
INSERT INTO `produtos` (`id`, `nome`, `unidadeMedida`, `tipo`, `epoca`) VALUES (3, 'leite em pó integral', 'Pacote 1KG', 'N/A', 'N/A');


#
# TABLE STRUCTURE FOR: projetos
#

DROP TABLE IF EXISTS `projetos`;

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeEdital` varchar(250) DEFAULT NULL,
  `arquivoEdital` varchar(45) DEFAULT NULL,
  `cooperativa` int(11) NOT NULL,
  `coopNomeFantasia` varchar(250) DEFAULT NULL,
  `coopRepresentante` int(11) DEFAULT NULL,
  `coopCpfRepresentante` varchar(45) DEFAULT NULL,
  `coopUfRepresentante` varchar(45) DEFAULT NULL,
  `coopEnderecoRepresentante` varchar(45) DEFAULT NULL,
  `coopCidadeRepresentante` varchar(45) DEFAULT NULL,
  `coopTelefoneRepresentante` varchar(45) DEFAULT NULL,
  `coopNomeRepresentante` varchar(250) DEFAULT NULL,
  `coopEmail` varchar(250) DEFAULT NULL,
  `coopCnpj` varchar(250) DEFAULT NULL,
  `coopTelefone` varchar(250) DEFAULT NULL,
  `coopDapJuridica` varchar(250) DEFAULT NULL,
  `coopBanco` varchar(45) DEFAULT NULL,
  `coopAgencia` varchar(45) DEFAULT NULL,
  `coopNumeroContaCorrente` varchar(45) DEFAULT NULL,
  `coopEndereco` varchar(250) DEFAULT NULL,
  `coopCidade` varchar(45) DEFAULT NULL,
  `coopCep` varchar(250) DEFAULT NULL,
  `coopUf` varchar(250) DEFAULT NULL,
  `entidadeExecutora` int(11) NOT NULL,
  `entNomeFantasia` varchar(250) DEFAULT NULL,
  `entEmail` varchar(250) DEFAULT NULL,
  `entCnpj` varchar(250) DEFAULT NULL,
  `entTelefone` varchar(250) DEFAULT NULL,
  `entRepresentante` varchar(250) DEFAULT NULL,
  `entCpfRepresentante` varchar(250) DEFAULT NULL,
  `entEndereco` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `entCidade` varchar(45) DEFAULT NULL,
  `entCep` varchar(45) DEFAULT NULL,
  `entUf` varchar(250) DEFAULT NULL,
  `data` datetime NOT NULL,
  `totalProjeto` decimal(10,2) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'ativo',
  `homologacaoCodigo` varchar(45) DEFAULT NULL,
  `dataEncerramento` date NOT NULL,
  `caracteristicasCoop` text,
  PRIMARY KEY (`id`),
  KEY `fk_projeto_cooperativas1_idx` (`cooperativa`),
  KEY `fk_projeto_entidadeExecutora1_idx` (`entidadeExecutora`),
  CONSTRAINT `fk_projeto_cooperativas1` FOREIGN KEY (`cooperativa`) REFERENCES `cooperativas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_projeto_entidadeExecutora1` FOREIGN KEY (`entidadeExecutora`) REFERENCES `entidadesexecutoras` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `projetos` (`id`, `nomeEdital`, `arquivoEdital`, `cooperativa`, `coopNomeFantasia`, `coopRepresentante`, `coopCpfRepresentante`, `coopUfRepresentante`, `coopEnderecoRepresentante`, `coopCidadeRepresentante`, `coopTelefoneRepresentante`, `coopNomeRepresentante`, `coopEmail`, `coopCnpj`, `coopTelefone`, `coopDapJuridica`, `coopBanco`, `coopAgencia`, `coopNumeroContaCorrente`, `coopEndereco`, `coopCidade`, `coopCep`, `coopUf`, `entidadeExecutora`, `entNomeFantasia`, `entEmail`, `entCnpj`, `entTelefone`, `entRepresentante`, `entCpfRepresentante`, `entEndereco`, `entCidade`, `entCep`, `entUf`, `data`, `totalProjeto`, `status`, `homologacaoCodigo`, `dataEncerramento`, `caracteristicasCoop`) VALUES (1, '001/2018', 'TCC.pdf', 1, 'COOPERATIVA DOS AGRICULTORES FAMILIARES ECOLOGISTAS SOLIDARIOS', NULL, '03024875069', 'rs', 'av salgado filho', 'erechim', '54991287278', NULL, 'ecologistas@outlook.com', '67.160.900/0001-77', '5433215566', 'SDW0596368800012411140957', 'Caixa Federal', '0245', '5645-5', 'Rua santos dumont', 'erechim', '99704520', 'rs', 1, 'PREFEITURA MUNICIPAL DE ITAQUI', 'jarbas@prefeitura.com.br', '88120662000146', '5433662125', 'Jarbas da Silva Martini', '13063197068', 'rua bento gonçalves', 'erechim', '99788002', 'RS', '2018-11-04 14:44:55', '8319.00', 'inativo', 'dasdasdas', '2018-11-08', 'Digite aqui os detalhes de comercialização e entrega dos produtos!');
INSERT INTO `projetos` (`id`, `nomeEdital`, `arquivoEdital`, `cooperativa`, `coopNomeFantasia`, `coopRepresentante`, `coopCpfRepresentante`, `coopUfRepresentante`, `coopEnderecoRepresentante`, `coopCidadeRepresentante`, `coopTelefoneRepresentante`, `coopNomeRepresentante`, `coopEmail`, `coopCnpj`, `coopTelefone`, `coopDapJuridica`, `coopBanco`, `coopAgencia`, `coopNumeroContaCorrente`, `coopEndereco`, `coopCidade`, `coopCep`, `coopUf`, `entidadeExecutora`, `entNomeFantasia`, `entEmail`, `entCnpj`, `entTelefone`, `entRepresentante`, `entCpfRepresentante`, `entEndereco`, `entCidade`, `entCep`, `entUf`, `data`, `totalProjeto`, `status`, `homologacaoCodigo`, `dataEncerramento`, `caracteristicasCoop`) VALUES (3, '00255d', 'cristcc.docx', 1, 'COOPERATIVA DOS AGRICULTORES FAMILIARES ECOLOGISTAS SOLIDARIOS', 1, '03024875069', 'rs', 'av salgado filho', 'erechim', '54991287278', 'Ezequiel menegas', 'ecologistas@outlook.com', '67.160.900/0001-77', '5433215566', 'SDW0596368800012411140957', 'Caixa Federal', '0245', '5645-5', 'Rua santos dumont', 'erechim', '99704520', 'rs', 1, 'PREFEITURA MUNICIPAL DE ITAQUI', 'jarbas@prefeitura.com.br', '88120662000146', '5433662125', 'Jarbas da Silva Martini', '13063197068', 'rua bento gonçalves', 'erechim', '99788002', 'RS', '2018-11-09 20:41:04', '10.00', 'ativo', '', '2018-11-23', 'Digite aqui os detalhes de comercialização e entrega dos produtos!');
INSERT INTO `projetos` (`id`, `nomeEdital`, `arquivoEdital`, `cooperativa`, `coopNomeFantasia`, `coopRepresentante`, `coopCpfRepresentante`, `coopUfRepresentante`, `coopEnderecoRepresentante`, `coopCidadeRepresentante`, `coopTelefoneRepresentante`, `coopNomeRepresentante`, `coopEmail`, `coopCnpj`, `coopTelefone`, `coopDapJuridica`, `coopBanco`, `coopAgencia`, `coopNumeroContaCorrente`, `coopEndereco`, `coopCidade`, `coopCep`, `coopUf`, `entidadeExecutora`, `entNomeFantasia`, `entEmail`, `entCnpj`, `entTelefone`, `entRepresentante`, `entCpfRepresentante`, `entEndereco`, `entCidade`, `entCep`, `entUf`, `data`, `totalProjeto`, `status`, `homologacaoCodigo`, `dataEncerramento`, `caracteristicasCoop`) VALUES (4, 'teste2', 'Modelo TCC.docx', 1, 'COOPERATIVA DOS AGRICULTORES FAMILIARES ECOLOGISTAS SOLIDARIOS', 1, '03024875069', 'rs', 'av salgado filho', 'erechim', '54991287278', 'Ezequiel menegas', 'ecologistas@outlook.com', '67.160.900/0001-77', '5433215566', 'SDW0596368800012411140957', 'Caixa Federal', '0245', '5645-5', 'Rua santos dumont', 'erechim', '99704520', 'rs', 1, 'PREFEITURA MUNICIPAL DE ITAQUI', 'jarbas@prefeitura.com.br', '88120662000146', '5433662125', 'Jarbas da Silva Martini', '13063197068', 'rua bento gonçalves', 'erechim', '99788002', 'RS', '2018-11-09 20:41:31', '172.00', 'ativo', '', '2018-11-30', 'Digite aqui os detalhes de comercialização e entrega dos produtos!');


