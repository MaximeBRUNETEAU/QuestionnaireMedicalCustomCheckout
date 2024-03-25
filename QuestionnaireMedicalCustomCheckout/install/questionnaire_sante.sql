CREATE TABLE IF NOT EXISTS `ps_questionnaire_sante` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `age` INT(1) NOT NULL,
    `taille` INT(1) NOT NULL,
    `poids` INT(1) NOT NULL,
    `tabac` VARCHAR(10) NOT NULL,
    `alcool` VARCHAR(10) NOT NULL,
    `traitement` VARCHAR(10) NOT NULL,
    `handicap` VARCHAR(10) NOT NULL,
    `maladie` VARCHAR(10) NOT NULL,
    `hospitalisation` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;