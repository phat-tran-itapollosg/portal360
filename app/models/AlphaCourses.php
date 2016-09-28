<?php

// use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableInterface;implements UserInterface, RemindableInterface 

class AlphaCourses extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alpha_courses';
	public $timestamps  = false;
	protected $primaryKey = 'alpha_course_id';
	public $incrementing = false;
	public function lessons()
    {
        return $this->hasMany('AlphaLessons', 'alpha_course_id', 'alpha_course_id');
    }
    public function student()
    {
        return $this->hasOne('AlphaStudents', 'alpha_student_id', 'alpha_student_id');
    }

}
