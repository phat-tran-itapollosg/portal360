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
	protected $primaryKey = 'student_id';
}
