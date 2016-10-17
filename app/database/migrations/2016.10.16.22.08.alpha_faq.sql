ALTER TABLE  `alpha_faq` ADD  `lang` INT NOT NULL DEFAULT  '0';
ALTER TABLE  `alpha_faq` CHANGE  `iduser`  `iduser` TEXT NULL DEFAULT NULL ;
ALTER TABLE  `alpha_news` ADD  `lang` INT NOT NULL DEFAULT  '0';