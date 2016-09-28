ALTER TABLE  `alpha_students` ADD  `sis_student_id` VARCHAR( 250 ) NULL DEFAULT NULL ;
ALTER TABLE  `alpha_students` ADD  `classroom_id` INT NULL DEFAULT NULL ;
ALTER TABLE  `alpha_students` ADD  `session_id` INT NULL DEFAULT NULL ;
ALTER TABLE  `alpha_students` CHANGE  `session_id`  `session_id` TEXT NULL DEFAULT NULL ;