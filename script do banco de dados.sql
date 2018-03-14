CREATE SCHEMA IF NOT EXISTS `banco_de_dados` DEFAULT CHARACTER SET utf8 ;
USE `banco_de_dados` ;

CREATE TABLE IF NOT EXISTS `banco_de_dados`.`nivel_user` (
  `nivel_user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo_user` VARCHAR(20) NOT NULL,
  `criacao` DATETIME NOT NULL,
  `modificacao` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`nivel_user_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `banco_de_dados`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(120) NOT NULL,
  `sexo` ENUM('M','F') NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `telefone` varchar(45) not null,
  `email` VARCHAR(120) NOT NULL,
  `senha` VARCHAR(200) NOT NULL,
  `chave_de_cadastro` VARCHAR(200) NOT NULL,
  `nivel_user_id` INT(11) NOT NULL,
  `situacao_usuario_id` ENUM('0','1') NOT NULL,
  `endereco` VARCHAR(45) NULL DEFAULT NULL,
  `bairro` VARCHAR(45) NULL DEFAULT NULL,
  `cidade` VARCHAR(45) NULL DEFAULT NULL,
  `uf` VARCHAR(45) NULL DEFAULT NULL,
  `criacao` DATETIME NOT NULL,
  `modificacao` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
