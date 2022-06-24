CREATE DATABASE SALOJAVENDAS;

CREATE TABLE IF NOT EXISTS `SALOJAVENDAS`.`categorias` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SALOJAVENDAS`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SALOJAVENDAS`.`produtos` (
  `idProduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `preco` DECIMAL(8,2) NOT NULL,
  `categorias_idCategoria` INT NOT NULL,
  PRIMARY KEY (`idProduto`),
  INDEX `fk_produtos_categorias_idx` (`categorias_idCategoria` ASC) ,
  CONSTRAINT `fk_produtos_categorias`
    FOREIGN KEY (`categorias_idCategoria`)
    REFERENCES `SALOJAVENDAS`.`categorias` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SALOJAVENDAS`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SALOJAVENDAS`.`usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nomeCompleto` VARCHAR(255) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `cpf` BIGINT(11) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `senha` CHAR(32) NOT NULL,
  `cep` INT NOT NULL,
  `numero` INT(6) NOT NULL,
  `nivel` TINYINT NOT NULL COMMENT '1- Gerente / 2-Cliente',
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SALOJAVENDAS`.`compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SALOJAVENDAS`.`compras` (
  `idCompra` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `formaPagamento` TINYINT NOT NULL,
  `usuarios_idUsuario` INT NOT NULL,
  `status` TINYINT NOT NULL COMMENT '1-andamento/2-finalizado/3-cancelado',
  PRIMARY KEY (`idCompra`),
  INDEX `fk_compras_usuarios1_idx` (`usuarios_idUsuario` ASC) ,
  CONSTRAINT `fk_compras_usuarios1`
    FOREIGN KEY (`usuarios_idUsuario`)
    REFERENCES `SALOJAVENDAS`.`usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SALOJAVENDAS`.`produtos_has_compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SALOJAVENDAS`.`produtos_has_compras` (
  `produtos_idProduto` INT NOT NULL,
  `compras_idCompra` INT NOT NULL,
  `quantidade` INT(4) NOT NULL,
  PRIMARY KEY (`produtos_idProduto`, `compras_idCompra`),
  INDEX `fk_produtos_has_compras_compras1_idx` (`compras_idCompra` ASC) ,
  INDEX `fk_produtos_has_compras_produtos1_idx` (`produtos_idProduto` ASC) ,
  CONSTRAINT `fk_produtos_has_compras_produtos1`
    FOREIGN KEY (`produtos_idProduto`)
    REFERENCES `SALOJAVENDAS`.`produtos` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_has_compras_compras1`
    FOREIGN KEY (`compras_idCompra`)
    REFERENCES `SALOJAVENDAS`.`compras` (`idCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
