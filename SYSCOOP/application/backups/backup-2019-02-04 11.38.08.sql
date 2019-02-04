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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `agricultores` (`id`, `nome`, `cpf`, `telefone`, `email`, `uf`, `cep`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`) VALUES (1, 'Antonio', '12452120103', '5499912287855', 'antonio@gmail.com', 'rs', '99700000', 'erechim', 'rua rua', '432423fdsjfoisdjf04urjfipdsjfoisdfjsodifj', '2019-01-31', 'ativo', '26');


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

INSERT INTO `agricultores_has_cooperativas` (`agricultor`, `cooperativa`) VALUES (1, 2);


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

INSERT INTO `agricultores_has_produtos` (`agricultor`, `produto`) VALUES (1, 1);


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
  PRIMARY KEY (`id`),
  KEY `fk_cooperativas_cooperativas1_idx` (`cooperativa`),
  CONSTRAINT `fk_cooperativas_cooperativas1` FOREIGN KEY (`cooperativa`) REFERENCES `cooperativas` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `cooperativas` (`id`, `nomeFantasia`, `responsavel`, `cnpj`, `telefone`, `cooperativa`, `email`, `banco`, `agencia`, `numeroContaCorrente`, `cep`, `uf`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`) VALUES (1, 'emater', NULL, '00.957.722/0001-39', '4327480230948320', NULL, 'emater@outloook.com', 'bradesco', '3242', '432850923', '00990000', 'rs', 'erechim', 'rua santos dumont', '432428-9318irjwfsdi4234', '2019-01-25', 'ativo', NULL);
INSERT INTO `cooperativas` (`id`, `nomeFantasia`, `responsavel`, `cnpj`, `telefone`, `cooperativa`, `email`, `banco`, `agencia`, `numeroContaCorrente`, `cep`, `uf`, `cidade`, `endereco`, `dapNumero`, `dapValidade`, `status`, `dapLimite`) VALUES (2, 'eutacia', 1, '83.897.806/0001-51', '34243423', 1, 'sdhfj@c.com', 'Cresol', '4324', '34234', '32424234234', 'rsss', 'sdsada', 're21erdqwd', 'asdJD82309DKAS09UJFD9QWJE0D2D', '2019-01-25', 'ativo', NULL);


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

INSERT INTO `entidadesexecutoras` (`id`, `nomeFantasia`, `email`, `cnpj`, `telefone`, `representante`, `cpfRepresentante`, `cep`, `uf`, `cidade`, `endereco`, `status`) VALUES (1, 'geny', 'eumesmo@teste.com', '49574229000129', '439918829992', 'eu', '51151189804', '99700000', 'rs', 'erechim', 'tuya tua', 'ativo');


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `email`, `telefone`, `cep`, `uf`, `cidade`, `endereco`, `senha`, `cooperativa`, `status`) VALUES (1, 'administrador', '03024875069', 'ezequielmenegas@outlook.com', '54991287278', '99700000', 'rs', 'erechim', 'av salgado filho', '$2y$10$27sEWpTIiwVixG03ZB0Z4.S1mt7dfMezxIKt6fMjZ0xXn5K0Nihgq', NULL, 'ativo');
INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `email`, `telefone`, `cep`, `uf`, `cidade`, `endereco`, `senha`, `cooperativa`, `status`) VALUES (3, 'TESTE', '44251132254', 'teste@outlook.com', '48329048029', '40000033', 'rs', 'erechim', 'rua amintas', '$2y$10$9xHnhr3HeakvHW1zMdTtcu5oJcZTzewejaXquU0qCowYlnBgaxSJ2', 1, 'ativo');
INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `email`, `telefone`, `cep`, `uf`, `cidade`, `endereco`, `senha`, `cooperativa`, `status`) VALUES (4, 'teste eutacia', '84715715872', 'dsajdha@oofd.com', '3479', '99700-012', 'RS', 'Erechim', 'Avenida Maurício Cardoso - até 678 - lado par', '$2y$10$89KEK0T/9ePlY5MVK/hOuOIv2E6Ek6CKj2aGidRfLtXm2ubXS.yvq', 2, 'ativo');


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `itens_do_projeto` (`id`, `projeto`, `produto`, `nomeProduto`, `agricultor`, `dapAgricultor`, `unidadeMedida`, `quantidade`, `precoUnidade`, `totalItem`, `nomeAgricultor`, `cpf`, `data`, `descricaoProd`, `cronogramaEntregaProd`) VALUES (1, 1, 1, 'cenoura', 1, '432423fdsjfoisdjf04urjfipdsjfoisdfjsodifj', 'Pacote 1KG', '2', '13.00', '26.00', 'Antonio', '12452120103', '2019-01-30 16:29:08', 'PRODUTO - TIPO 1. ISENTO DE MATÉRIAS ESTRANHAS, IMPUREZAS, INSETOS VIVOS OU MORTOS, EMBALAGEM DE POLIETILENO TRANSPARENTE, ATÓXICO, DE 1KG, ROTULAGEM DE ACORDO COM AS NORMAS DA ANVISA, VALIDADE DE 12 MESES A PARTIR DA DATA DE ENTREGA', 'Os produtos de periodicidade semestral deverão ser entregues no almoxarifado da Secretaria de Educação, de acordo com os pedidos realizados pela Secretaria.');


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `produtos` (`id`, `nome`, `unidadeMedida`, `tipo`, `epoca`) VALUES (1, 'cenoura', 'Pacote 1KG', 'Transgênico', 'Verão');
INSERT INTO `produtos` (`id`, `nome`, `unidadeMedida`, `tipo`, `epoca`) VALUES (2, 'maça', 'Pacote 1KG', 'N/A', 'N/A');


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `projetos` (`id`, `nomeEdital`, `arquivoEdital`, `cooperativa`, `coopNomeFantasia`, `coopRepresentante`, `coopCpfRepresentante`, `coopUfRepresentante`, `coopEnderecoRepresentante`, `coopCidadeRepresentante`, `coopTelefoneRepresentante`, `coopNomeRepresentante`, `coopEmail`, `coopCnpj`, `coopTelefone`, `coopDapJuridica`, `coopBanco`, `coopAgencia`, `coopNumeroContaCorrente`, `coopEndereco`, `coopCidade`, `coopCep`, `coopUf`, `entidadeExecutora`, `entNomeFantasia`, `entEmail`, `entCnpj`, `entTelefone`, `entRepresentante`, `entCpfRepresentante`, `entEndereco`, `entCidade`, `entCep`, `entUf`, `data`, `totalProjeto`, `status`, `homologacaoCodigo`, `dataEncerramento`, `caracteristicasCoop`) VALUES (1, '32423423', '/Project-SysCoop/SYSCOOP/application/arquivoE', 2, 'eutacia', 1, '03024875069', 'rs', 'av salgado filho', 'erechim', '54991287278', 'administrador', 'sdhfj@c.com', '83.897.806/0001-51', '34243423', 'asdJD82309DKAS09UJFD9QWJE0D2D', 'Cresol', '4324', '34234', 're21erdqwd', 'sdsada', '32424234234', 'rsss', 1, 'geny', 'eumesmo@teste.com', '49574229000129', '439918829992', 'eu', '51151189804', 'tuya tua', 'erechim', '99700000', 'rs', '2019-01-30 16:24:11', '26.00', 'inativo', '23123', '2019-01-31', '432423');
INSERT INTO `projetos` (`id`, `nomeEdital`, `arquivoEdital`, `cooperativa`, `coopNomeFantasia`, `coopRepresentante`, `coopCpfRepresentante`, `coopUfRepresentante`, `coopEnderecoRepresentante`, `coopCidadeRepresentante`, `coopTelefoneRepresentante`, `coopNomeRepresentante`, `coopEmail`, `coopCnpj`, `coopTelefone`, `coopDapJuridica`, `coopBanco`, `coopAgencia`, `coopNumeroContaCorrente`, `coopEndereco`, `coopCidade`, `coopCep`, `coopUf`, `entidadeExecutora`, `entNomeFantasia`, `entEmail`, `entCnpj`, `entTelefone`, `entRepresentante`, `entCpfRepresentante`, `entEndereco`, `entCidade`, `entCep`, `entUf`, `data`, `totalProjeto`, `status`, `homologacaoCodigo`, `dataEncerramento`, `caracteristicasCoop`) VALUES (2, '312321', '/Project-SysCoop/SYSCOOP/application/arquivoE', 2, 'eutacia', 1, '03024875069', 'rs', 'av salgado filho', 'erechim', '54991287278', 'administrador', 'sdhfj@c.com', '83.897.806/0001-51', '34243423', 'asdJD82309DKAS09UJFD9QWJE0D2D', 'Cresol', '4324', '34234', 're21erdqwd', 'sdsada', '32424234234', 'rsss', 1, 'geny', 'eumesmo@teste.com', '49574229000129', '439918829992', 'eu', '51151189804', 'tuya tua', 'erechim', '99700000', 'rs', '2019-02-04 10:21:11', NULL, 'inativo', '312312312', '2019-02-14', '321312');


