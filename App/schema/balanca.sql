CREATE TABLE IF NOT EXISTS `Balanca`.`Pesagem` (
  `ps_id` INT NOT NULL AUTO_INCREMENT,
  `ps_peso` FLOAT NOT NULL,
  `ps_data` DATE NOT NULL,
  PRIMARY KEY (`ps_id`))
ENGINE = InnoDB;
