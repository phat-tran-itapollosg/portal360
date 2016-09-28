<?php

// use Illuminate\Auth\UserInterface;
// use Illuminate\Auth\Reminders\RemindableInterface;implements UserInterface, RemindableInterface 

class AlphaStudents extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alpha_students';
	public $timestamps  = false;
	protected $primaryKey = 'alpha_student_id';
	public $incrementing = false;
	public function courses()
    {
        return $this->hasMany('AlphaCourses', 'alpha_student_id', 'alpha_student_id');
    }
    public function classroom()
    {
        return $this->hasOne('AlphaClassroom', 'alpha_classroom_id', 'alpha_classroom_id');
    }
}
