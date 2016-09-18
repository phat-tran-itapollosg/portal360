ALTER TABLE  `alpha_classroom` CHANGE  `classroom_id`  `alpha_classroom_id` INT( 10 ) NOT NULL AUTO_INCREMENT ;
ALTER TABLE  `alpha_students` CHANGE  `student_id`  `alpha_student_id` INT( 10 ) NOT NULL AUTO_INCREMENT ;
ALTER TABLE  `alpha_classroom` ADD  `time_retrieve` DATETIME NULL DEFAULT NULL ;
