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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

