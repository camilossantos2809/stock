create database stock;
use stock;

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Table `usuario_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario_grupo`
(
    `id`        INT         NOT NULL AUTO_INCREMENT,
    `descricao` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario`
(
    `id`               INT          NOT NULL AUTO_INCREMENT,
    `login`            VARCHAR(50)  NOT NULL,
    `nome`             VARCHAR(100) NOT NULL,
    `senha`            VARCHAR(100) NULL,
    `usuario_grupo_id` INT          NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_usuario_usuario_grupo`
        FOREIGN KEY (`usuario_grupo_id`)
            REFERENCES `usuario_grupo` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;

CREATE INDEX `fk_usuario_usuario_grupo_idx` ON `usuario` (`usuario_grupo_id` ASC);

CREATE UNIQUE INDEX `login_UNIQUE` ON `usuario` (`login` ASC);


-- -----------------------------------------------------
-- Table `produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produto`
(
    `id`                 INT            NOT NULL AUTO_INCREMENT,
    `cod_barras`         VARCHAR(14)    NOT NULL,
    `descricao`          VARCHAR(100)   NOT NULL,
    `marca`              VARCHAR(50)    NOT NULL,
    `preco`              DECIMAL(15, 5) NOT NULL,
    `usuario_cadastro`   INT            NOT NULL,
    `data_hora_cadastro` DATETIME       NOT NULL,
    `estoque`            DECIMAL(15, 5) NOT NULL DEFAULT 0,
    `custo`              DECIMAL(15, 5) NOT NULL DEFAULT 0.0,
    `status`             VARCHAR(1)     NOT NULL DEFAULT 'N',
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_produto_usuario1`
        FOREIGN KEY (`usuario_cadastro`)
            REFERENCES `usuario` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;

CREATE UNIQUE INDEX `cod_barras_UNIQUE` ON `produto` (`cod_barras` ASC);

CREATE INDEX `fk_produto_usuario1_idx` ON `produto` (`usuario_cadastro` ASC);


-- -----------------------------------------------------
-- Table `produto_usuario_alteracao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produto_usuario_alteracao`
(
    id                    INT      NOT NULL AUTO_INCREMENT,
    `produto_id`          INT      NOT NULL,
    `usuario_id`          INT      NOT NULL,
    `data_hora_alteracao` DATETIME NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `fk_produto_has_usuario_produto1`
        FOREIGN KEY (`produto_id`)
            REFERENCES `produto` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_produto_has_usuario_usuario1`
        FOREIGN KEY (`usuario_id`)
            REFERENCES `usuario` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;

CREATE INDEX `fk_produto_has_usuario_usuario1_idx` ON `produto_usuario_alteracao` (`usuario_id` ASC);

CREATE INDEX `fk_produto_has_usuario_produto1_idx` ON `produto_usuario_alteracao` (`produto_id` ASC);


-- -----------------------------------------------------
-- Table `cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cliente`
(
    `id`     INT          NOT NULL AUTO_INCREMENT,
    `nome`   VARCHAR(100) NOT NULL,
    `cpf`    VARCHAR(11)  NOT NULL,
    `rg`     VARCHAR(45)  NULL,
    `status` VARCHAR(1)   NOT NULL DEFAULT 'N',
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fornecedor`
(
    `id`            INT          NOT NULL AUTO_INCREMENT,
    `razao_social`  VARCHAR(100) NOT NULL,
    `nome_fantasia` VARCHAR(45)  NOT NULL,
    `cnpj`          VARCHAR(14)  NOT NULL,
    `status`        VARCHAR(1)   NOT NULL DEFAULT 'N',
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `endereco`
(
    `id`            INT         NOT NULL AUTO_INCREMENT,
    `endereco`      VARCHAR(50) NULL,
    `bairro`        VARCHAR(50) NULL,
    `numero`        VARCHAR(10) NULL,
    `complemento`   VARCHAR(30) NULL,
    `cliente_id`    INT         NULL,
    `fornecedor_id` INT         NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_endereco_cliente1`
        FOREIGN KEY (`cliente_id`)
            REFERENCES `cliente` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_endereco_fornecedor1`
        FOREIGN KEY (`fornecedor_id`)
            REFERENCES `fornecedor` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;

CREATE INDEX `fk_endereco_cliente1_idx` ON `endereco` (`cliente_id` ASC);

CREATE INDEX `fk_endereco_fornecedor1_idx` ON `endereco` (`fornecedor_id` ASC);


-- -----------------------------------------------------
-- Table `telefone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `telefone`
(
    `id`            INT         NOT NULL AUTO_INCREMENT,
    `tipo`          VARCHAR(45) NULL,
    `numero`        VARCHAR(45) NULL,
    `fornecedor_id` INT         NULL,
    `cliente_id`    INT         NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_telefone_fornecedor1`
        FOREIGN KEY (`fornecedor_id`)
            REFERENCES `fornecedor` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_telefone_cliente1`
        FOREIGN KEY (`cliente_id`)
            REFERENCES `cliente` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;

CREATE INDEX `fk_telefone_fornecedor1_idx` ON `telefone` (`fornecedor_id` ASC);

CREATE INDEX `fk_telefone_cliente1_idx` ON `telefone` (`cliente_id` ASC);


-- -----------------------------------------------------
-- Table `cliente_usuario_alteracao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cliente_usuario_alteracao`
(
    id                    INT      NOT NULL AUTO_INCREMENT,
    `usuario_id`          INT      NOT NULL,
    `cliente_id`          INT      NOT NULL,
    `data_hora_alteracao` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_usuario_has_cliente_usuario1`
        FOREIGN KEY (`usuario_id`)
            REFERENCES `usuario` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_usuario_has_cliente_cliente1`
        FOREIGN KEY (`cliente_id`)
            REFERENCES `cliente` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;

CREATE INDEX `fk_usuario_has_cliente_cliente1_idx` ON `cliente_usuario_alteracao` (`cliente_id` ASC);

CREATE INDEX `fk_usuario_has_cliente_usuario1_idx` ON `cliente_usuario_alteracao` (`usuario_id` ASC);


-- -----------------------------------------------------
-- Table `fornecedor_usuario_alteracao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fornecedor_usuario_alteracao`
(
    id                         INT NOT NULL AUTO_INCREMENT,
    `fornecedor_id`            INT NOT NULL,
    `usuario_id`               INT NOT NULL,
    `usuario_usuario_grupo_id` INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `fk_fornecedor_has_usuario_fornecedor1`
        FOREIGN KEY (`fornecedor_id`)
            REFERENCES `fornecedor` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_fornecedor_has_usuario_usuario1`
        FOREIGN KEY (`usuario_id`)
            REFERENCES `usuario` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;

CREATE INDEX `fk_fornecedor_has_usuario_usuario1_idx` ON `fornecedor_usuario_alteracao` (`usuario_id` ASC, `usuario_usuario_grupo_id` ASC);

CREATE INDEX `fk_fornecedor_has_usuario_fornecedor1_idx` ON `fornecedor_usuario_alteracao` (`fornecedor_id` ASC);


-- -----------------------------------------------------
-- Table `mov_estoque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mov_estoque`
(
    `id`            INT            NOT NULL AUTO_INCREMENT,
    `entr_saida`    VARCHAR(1)     NOT NULL,
    `numero_nf`     VARCHAR(45)    NOT NULL,
    `data_mvto`     DATE           NOT NULL,
    `valor_total`   DECIMAL(15, 5) NOT NULL,
    `usuario_id`    INT            NOT NULL,
    `cliente_id`    INT            NULL,
    `fornecedor_id` INT            NULL,
    `status`        VARCHAR(1)     NOT NULL DEFAULT 'P',
    PRIMARY KEY (`id`, `entr_saida`, `numero_nf`),
    CONSTRAINT `fk_mov_estoque_usuario1`
        FOREIGN KEY (`usuario_id`)
            REFERENCES `usuario` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_mov_estoque_cliente1`
        FOREIGN KEY (`cliente_id`)
            REFERENCES `cliente` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_mov_estoque_fornecedor1`
        FOREIGN KEY (`fornecedor_id`)
            REFERENCES `fornecedor` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;

CREATE INDEX `fk_mov_estoque_usuario1_idx` ON `mov_estoque` (`usuario_id` ASC);

CREATE INDEX `fk_mov_estoque_cliente1_idx` ON `mov_estoque` (`cliente_id` ASC);

CREATE INDEX `fk_mov_estoque_fornecedor1_idx` ON `mov_estoque` (`fornecedor_id` ASC);


-- -----------------------------------------------------
-- Table `mov_estoque_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mov_estoque_produto`
(
    `mov_estoque_id` INT            NOT NULL,
    `produto_id`     INT            NOT NULL,
    `qtde_unitaria`  DECIMAL(15, 5) NOT NULL,
    `valor_total`    DECIMAL(15, 5) NOT NULL,
    PRIMARY KEY (`mov_estoque_id`, `produto_id`),
    CONSTRAINT `fk_mov_estoque_has_produto_mov_estoque1`
        FOREIGN KEY (`mov_estoque_id`)
            REFERENCES `mov_estoque` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
    CONSTRAINT `fk_mov_estoque_has_produto_produto1`
        FOREIGN KEY (`produto_id`)
            REFERENCES `produto` (`id`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION
)
    ENGINE = InnoDB;

CREATE INDEX `fk_mov_estoque_has_produto_produto1_idx` ON `mov_estoque_produto` (`produto_id` ASC);

CREATE INDEX `fk_mov_estoque_has_produto_mov_estoque1_idx` ON `mov_estoque_produto` (`mov_estoque_id` ASC);


SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;
