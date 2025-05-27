CREATE SCHEMA `vendasmanager` ;

CREATE TABLE `vendasmanager`.`clientes` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nomeCliente` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE `vendasmanager`.`agendamentos` (
  `idAgendamento` INT NOT NULL AUTO_INCREMENT,
  `dataInicio` DATE NOT NULL,
  `dataFim` DATE NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(150) NOT NULL,
  `idCliente` INT NOT NULL,
  PRIMARY KEY (`idAgendamento`),
  INDEX `fk_agendamentos_clientes_idx` (`idCliente` ASC) VISIBLE,
  CONSTRAINT `fk_agendamentos_clientes`
    FOREIGN KEY (`idCliente`)
    REFERENCES `vendasmanager`.`clientes` (`idCliente`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;
