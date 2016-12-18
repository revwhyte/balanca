CREATE TABLE IF NOT EXISTS `balanca`.`pesagem` (
  `ps_id` INT NOT NULL AUTO_INCREMENT,
  `ps_peso` VARCHAR(5) NOT NULL,
  `ps_data` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`ps_id`))
ENGINE = InnoDB;
