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
	protected $primaryKey = 'course_id';
}
