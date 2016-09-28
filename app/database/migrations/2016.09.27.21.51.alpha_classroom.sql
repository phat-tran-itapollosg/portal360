ALTER TABLE  `alpha_classroom` CHANGE  `name`  `name` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
ALTER TABLE  `alpha_classroom` CHANGE  `alpha_classroom_id`  `alpha_classroom_id` VARCHAR( 250 ) NOT NULL ;
ALTER TABLE  `alpha_classroom` CHANGE  `alpha_classroom_id`  `alpha_classroom_id` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE  `alpha_students` CHANGE  `alpha_student_id`  `alpha_student_id` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE  `alpha_classroom_id`  `alpha_classroom_id` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
ALTER TABLE  `alpha_courses` CHANGE  `alpha_course_id`  `alpha_course_id` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE  `alpha_student_id`  `alpha_student_id` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE  `alpha_classroom_id`  `alpha_classroom_id` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;

ALTER TABLE  `alpha_lessons` CHANGE  `lesson_id`  `alpha_lesson_id` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE  `alpha_course_id`  `alpha_course_id` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE  `alpha_student_id`  `alpha_student_id` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
CHANGE  `alpha_classroom_id`  `alpha_classroom_id` VARCHAR( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;

ALTER TABLE  `alpha_lessons` ADD  `alpha_delete` INT NOT NULL DEFAULT  '0';
ALTER TABLE  `alpha_courses` ADD  `alpha_delete` INT NOT NULL DEFAULT  '0';
ALTER TABLE  `alpha_students` ADD  `alpha_delete` INT NOT NULL DEFAULT  '0';
ALTER TABLE  `alpha_classroom` ADD  `alpha_delete` INT NOT NULL DEFAULT  '0';